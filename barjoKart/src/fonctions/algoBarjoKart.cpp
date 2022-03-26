#include "../headers/algoBarjoKart.hpp"
#include <chrono>
#include <thread>
#include <queue>
#include <fstream>

using namespace std;

std::vector<Point> AlgoBarjoKart::voisins(Point point)
{

  std::vector<Point> voisins;
  std::tuple<int, int, int> color{0, 0, 0};
  std::tuple<int, int, int> notGood{-1, -1, -1};
  int height = this->pngInfo.getHeight();
  int width = this->pngInfo.getWidth();
  std::vector<Point> liste = {Point(0, 1), Point(1, 0), Point(-1, 0), Point(0, -1), Point(-1, 1), Point(1, -1), Point(1, 1), Point(-1, -1)};
  int x = point.get_x();
  int y = point.get_y();

  // Permet de construire la liste des voisins
  for (auto &i : liste)
  {
    int ix = i.get_x();
    int iy = i.get_y();
    Point p = Point(ix + x, iy + y);
    if (p.get_x() < width && p.get_y() < height)
    {
      if (p.get_x() >= 0 && p.get_y() >= 0)
      {
        if (this->pngInfo.getRbgByPosition(p.get_x(), p.get_y()) != notGood && this->pngInfo.getRbgByPosition(p.get_x(), p.get_y()) != color)
        {
          voisins.push_back(p);
        }
      }
    }
  }

  // // Permet d'afficher les voisins
  // for (size_t i = 0; i < voisins.size(); i++)
  // {
  //   std::cout << voisins.at(i) << std::endl;
  // }

  return voisins;
}

std::map<Point, vector<Point>> AlgoBarjoKart::listeAdjacence(readPng pngInfo)
{

  // Liste d'adjacence
  std::map<Point, vector<Point>> liste;

  // couleur noire
  std::tuple<int, int, int> color{0, 0, 0};

  std::map<Point, std::tuple<int, int, int>> mapPix = this->pngInfo.getMapPixels();
  std::map<Point, std::tuple<int, int, int>>::iterator itr;

  for (itr = mapPix.begin(); itr != mapPix.end(); itr++)
  {
    Point p = itr->first;

    if (this->pngInfo.getRbgByPosition(p.get_x(), p.get_y()) != color)
    {
      std::vector<Point> vP = voisins(p);

      // ajout de pixel visiter dans la liste d'adjacence
      liste.insert(std::pair<Point, std::vector<Point>>(p, vP));
    }
  }

  std::cout << "La liste d'adjacence a été créé !"
            << "\n";

  return liste;
}

std::map<Point, Point> AlgoBarjoKart::algoParcours(std::map<Point, vector<Point>> listeAdjacence)
{

  std::cout << "Le parcours en largeur a commencé !"
            << "\n";
  std::map<Point, bool> visited;
  std::map<Point, Point> pere;
  std::queue<Point> q;

  // on met la tête de la queue sur le point de départ
  q.push(pointDepart);
  visited[pointDepart] = true;

  std::cout << "tout a été initialisé !"
            << "\n";
  // voisins courants
  while (!(q.empty()))
  {

    Point tete = q.front();
    for (Point point : listeAdjacence[tete])
    {
      // rajouter l'element dans la queue , mettre comme visite si ce n'est pas fait et lui assigner son pere
      if (!(visited[point]))
      {
        q.push(point);
        visited[point] = true;
        pere[point] = tete;
      }
    }
    q.pop();
  }

  std::cout << "Parcours termine \n";

  std::map<Point, Point>::iterator itr;

  return pere;
}

AlgoBarjoKart::AlgoBarjoKart(readPng pngInfo, tomlFile tomlInfo)
{
  this->pngInfo = pngInfo;
  this->tomlInfo = tomlInfo;
  this->accMax = tomlInfo.getAccMax();
  this->pointDepart = tomlInfo.getPointDepart();
  this->pointArrivee = pngInfo.getPointByRbg(tomlInfo.getCouleurArrive());

  std::map<Point, vector<Point>> adjacent = listeAdjacence(pngInfo);
  std::map<Point, Point> myMap = algoParcours(adjacent);

  std::map<Point, Point>::iterator itr;

  Point pointCourant;

  for (itr = myMap.begin(); itr != myMap.end(); itr++)
  {
    Point p = itr->first;
    if (pngInfo.getRbgByPosition(p.get_x(),p.get_y()) == tomlInfo.getCouleurArrive())
    {
      pointCourant = p;
      break;
    }
  }

  while (!(pointCourant == pointDepart))
  {
    this->trajectoire.push_back(pointCourant);
    
    pointCourant = myMap[pointCourant];
  }

  trajectoire.push_back(pointDepart);
  reverse(this->trajectoire.begin(), this->trajectoire.end());

  for (int i = 0; i < trajectoire.size(); i++)
  {
    cout << trajectoire[i] << endl;
  }

  int i = 0;
  Point pCourant = trajectoire[i];
  int pos = i + accMax;
  vector<Point> traj;
  traj.push_back(pCourant);

  while (!(pCourant == trajectoire[trajectoire.size() - 1]))
  {
    if (pos >= trajectoire.size())
    {
      pos--;
    }
    else
    {
      Point p = this->trajectoire[pos] - this->trajectoire[i];
      int v = abs(p.get_x()) + abs(p.get_y());
      cout << "v = " << v << endl;
      if (v <= accMax)
      {
        AlgoBresenham bresn = AlgoBresenham(pCourant, trajectoire.at(pos));
        vector<Point> vectBresn = bresn.getVectPoint();
        bool good = true;
        for (int i = 0; i < vectBresn.size(); i++)
        {
          if (isPixelBlack(vectBresn[i]))
          {
            good = false;
            pos--;
            break;
          }
        }

        if (good)
        {
          pngInfo.setColorByposition(pCourant.get_x(), pCourant.get_y(), pointArrivee.get_x(), pointArrivee.get_y());
          traj.push_back(trajectoire.at(pos));
          pCourant = trajectoire[pos];
          i++;
          pos = accMax + i;
        }
      }
      else
      {
        pos--;
      }
    }
  }

  vector<Point> traj2;
  

  cout << "\nTRAJ\n";

  for (int i = 0; i < traj.size(); i++)
  {
    cout << traj[i] << endl;
  }

  ofstream fout;
  std::ofstream outfile("output/trajet.bin", std::ofstream::binary);
  fout.open("output/trajet.bin"); // opens the file
  for (size_t i = 0; i < traj.size() - 1; i++)
  {
    int x = traj[i + 1].get_x() - traj[i].get_x();
    int y = traj[i + 1].get_y() - traj[i].get_y();
    fout.write((char *)&x, sizeof(x));
    fout.write((char *)&y, sizeof(y));
  }

  fout.close();
}

bool AlgoBarjoKart::isPixelBlack(Point p)
{
  std::tuple<int, int, int> t{0, 0, 0};
  if (pngInfo.getRbgByPosition(p.get_x(), p.get_y()) == t)
  {
    return true;
  }
  return false;
}

AlgoBarjoKart::~AlgoBarjoKart()
{
}