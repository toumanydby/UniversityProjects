#include "../headers/readPng.hpp"

// Il faut reussir a instancier l'attribut pixels pour poivoir avancer. A NE PAS OUBLIER !!!!!

readPng::readPng()
{
}
// Constructeur de la classe readPng qui recupere les infos correspondantes a l'image.
/**
 * @brief Construct a new read Png::read Png object
 *
 * @param pngFile
 */
readPng::readPng(std::string pngFile, tomlFile tomlInfo)
{
    (*this).pngFile = pngFile;
    (*this).tomlInfo = tomlInfo;
    png::image<png::rgb_pixel> image(this->pngFile);
    (*this).height = image.get_height();
    (*this).width = image.get_width();
    (*this).readPngPixels();
}

/**
 * @brief Lit le fichier png et stocke les differents pixels dans notre vecteur de vecteur de tuples appele "pixels"
 *
 * @param pngI
 */
void readPng::readPngPixels()
{
    Point pDepart = tomlInfo.getPointDepart();
    std::tuple<int, int, int> pxArrive = tomlInfo.getCouleurArrive();

    png::image<png::rgb_pixel> pngI(this->pngFile);

    std::tuple<int, int, int> colorBlack{0, 0, 0};
    std::tuple<int, int, int> colorWhite{255, 255, 255};

    for (int i = 0; i < (*this).width; i++)
    {
        for (int j = 0; j < (*this).height; j++)
        {
            png::rgb_pixel pix = pngI.get_pixel(i, j);
            int blue = (int)pix.blue;
            int green = (int)pix.green;
            int red = (int)pix.red;
            std::tuple t{red, blue, green};

            (*this).mapPixels.insert(std::pair<Point, std::tuple<int, int, int>>(Point(i, j), t));

            // if (t == colorBlack || t == colorWhite || Point(i, j) == pDepart || (std::get<0>(t) == 255 && (std::get<1>(t) <= 220 && std::get<1>(t) >= 0) && (std::get<2>(t) <= 220 && std::get<2>(t) >= 0)))
            // {
            //     (*this).mapPixels.insert(std::pair<Point, std::tuple<int, int, int>>(Point(i, j), t));
            // }

            if (t == colorBlack)
            {
                this->pixNoirs.push_back(Point(i, j));
            }

            if (
                std::get<0>(t) == 255 && (std::get<1>(t) <= 220 && std::get<1>(t) >= 0) && (std::get<2>(t) <= 220 && std::get<2>(t) >= 0))
            {
                this->pixRouges.push_back(Point(i, j));
            }
        }
    }
}

std::tuple<int, int, int> readPng::getRbgByPosition(int x, int y)
{

    auto item = this->mapPixels.find(Point(x, y));
    if (item != this->mapPixels.end())
    {
        // std::cout << "Key exists! \n";
        return item->second;
    }
    else
    {
        std::cout << "Key does not exist!" << std::endl;
        return std::tuple{-1, -1, -1};
    }
}

Point readPng::getPointByRbg(std::tuple<int, int, int> t)
{
    for (std::map<Point, std::tuple<int, int, int>>::iterator it = mapPixels.begin(); it != mapPixels.end(); it++)
        if (it->second == t)
            return it->first;
    return Point(-1, -1);
}
void readPng::setColorByposition(int x, int y, int x1, int y1)
{
    png::image<png::rgb_pixel> pngI(this->pngFile);
    png::rgb_pixel pix = pngI.get_pixel(x1, y1);
    pngI.set_pixel(x, y, pix);
    pngI.write("circuits/fast_food/fast_food.png");
}

/* Les accesseurs constants seront appelés sur un objet déclaré const */

std::tuple<int, int, int> readPng::getRbgByPosition(int x, int y) const
{

    auto item = this->mapPixels.find(Point(x, y));
    if (item != this->mapPixels.end())
    {
        std::cout << "Key exists! \n";
        return item->second;
    }
    else
    {
        std::cout << "Key does not exist!" << std::endl;
        return std::tuple{-1, -1, -1};
    }
}

readPng::~readPng()
{
    // std::cout << "Classe de type readPng detruite \n";
}

/* Une référence sur l'ostream os est renvoyée (notamment)
 * pour pouvoir faire cout << p << p1 << endl;
 */
std::ostream &operator<<(std::ostream &os, const readPng &pngFile)
{

    std::map<Point, std::tuple<int, int, int>> mapPixels = pngFile.getMapPixels();
    std::map<Point, std::tuple<int, int, int>>::iterator itr;
    std::cout << "\nThe map mapPixels is : \n";
    std::cout << "\tKEY\tELEMENT\n";
    for (itr = mapPixels.begin(); itr != mapPixels.end(); ++itr)
    {
        os << '\t' << itr->first << '\t' << std::get<0>(itr->second) << "," << std::get<1>(itr->second) << "," << std::get<2>(itr->second)
           << '\n';
    }
    std::cout << std::endl;

    return os;
}
