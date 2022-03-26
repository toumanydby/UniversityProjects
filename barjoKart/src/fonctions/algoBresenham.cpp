#include "../headers/algoBresenham.hpp"

AlgoBresenham::AlgoBresenham(Point pointDepart, Point pointArrivee)
{
    this->pointDepart = pointDepart;
    this->pointArrivee = pointArrivee;

    int x1, y1, x2, y2, dx, dy;

    x1 = pointDepart.get_x();
    y1 = pointDepart.get_y();
    x2 = pointArrivee.get_x();
    y2 = pointArrivee.get_y();


    if ((dx = x2 - x1) != 0)
    {
        if (dx > 0)
        {
            if ((dy = y2 - y1) != 0)
            {
                if (dy > 0)
                {
                    // vecteur oblique dans le 1er cadran
                    if (dx >= dy)
                    {
                        // vecteur diagonal ou oblique proche de l’horizontale, dans le 1er octant
                        int e = dx;
                        dx = e * 2;
                        dy = dy * 2;
                        while (true)
                        {
                            this->vectPoint.push_back(Point(x1, y1));
                            if ((x1 = x1 + 1) == x2)
                            {
                                break;
                            }
                            if ((e = e - dy) < 0)
                            {
                                y1 = y1 + 1;
                                e = e + dx;
                            }
                        }
                    }
                    else
                    {
                        // vecteur oblique proche de la verticale, dans le 2d octant
                        int e = dy;
                        dy = e * 2;
                        dx = dx * 2;
                        while (true)
                        {
                            this->vectPoint.push_back(Point(x1, y1));
                            if ((y1 = y1 + 1) == y2)
                            {
                                break;
                            }
                            if ((e = e - dx) < 0)
                            {
                                x1 = x1 + 1;
                                e = e + dy;
                            }
                        }
                    }
                }
                else // dy < 0 (et dx > 0)
                // vecteur oblique dans le 4e cadran
                {
                    if (dx >= -dy)
                    {
                        // vecteur diagonal ou oblique proche de l’horizontale, dans le 8e octant
                        int e = dx;
                        dx = e * 2;
                        dy = dy * 2;
                        while (true)
                        {
                            this->vectPoint.push_back(Point(x1, y1));
                            if ((x1 = x1 + 1) == x2)
                            {
                                break;
                            }
                            if ((e = e + dy) < 0)
                            {
                                y1 = y1 - 1;
                                e = e + dx;
                            }
                        }
                    }
                    else // vecteur oblique proche de la verticale, dans le 7e octant
                    {
                        int e = dy;
                        dy = e * 2;
                        dx = dx * 2;
                        while (true)
                        {
                            this->vectPoint.push_back(Point(x1, y1));
                            if ((y1 = y1 - 1) == y2)
                            {
                                break;
                            }
                            if ((e = e + dx) > 0)
                            {
                                x1 = x1 + 1;
                                e = e + dy;
                            }
                        }
                    }
                }
            }
            else
            {
                // dy = 0 (et dx > 0)

                // vecteur horizontal vers la droite

                while (x1 != x2)
                {
                    this->vectPoint.push_back(Point(x1, y1));
                    x1 += 1;
                }
            }
        }
        else // dx < 0
        {
            if ((dy = y2 - y1) != 0)
            {
                if (dy > 0)
                {
                    // vecteur oblique dans le 2d cadran
                    if (-dx >= dy)
                    {
                        // vecteur diagonal ou oblique proche de l’horizontale, dans le 4e octant
                        int e = dx;
                        dx = e * 2;
                        dy = dy * 2;
                        while (true)
                        {
                            this->vectPoint.push_back(Point(x1, y1));
                            if ((x1 = x1 - 1) == x2)
                            {
                                break;
                            }
                            if ((e = e + dy) >= 0)
                            {
                                y1 = y1 + 1;
                                e = e + dx;
                            }
                        }
                    }
                    else
                    {
                        // vecteur oblique proche de la verticale, dans le 3e octant
                        int e = dy;
                        dy = e * 2;
                        dx = dx * 2;
                        while (true)
                        {
                            this->vectPoint.push_back(Point(x1, y1));
                            if ((y1 = y1 + 1) == y2)
                            {
                                break;
                            }
                            if ((e = e + dx) >= 0)
                            {
                                x1 = x1 - 1;
                                e = e + dy;
                            }
                        }
                    }
                }
                else
                {
                    // dy < 0 (et dx < 0)
                    // vecteur oblique dans le 3e cadran
                    if (dx <= dy)
                    {
                        // vecteur diagonal ou oblique proche de l’horizontale, dans le 5e octant
                        int e = dx;
                        dx = e * 2;
                        dy = dy * 2;
                        while (true)
                        {
                            this->vectPoint.push_back(Point(x1, y1));
                            if ((x1 = x1 - 1) == x2)
                            {
                                break;
                            }
                            if ((e = e - dy) >= 0)
                            {
                                y1 = y1 - 1;
                                e = e + dx;
                            }
                        }
                    }
                    else
                    {
                        // vecteur oblique proche de la verticale, dans le 6e octant
                        int e = dy;
                        dy = e * 2;
                        dx = dx * 2;
                        while (true)
                        {
                            this->vectPoint.push_back(Point(x1, y1));
                            if ((y1 = y1 - 1) == y2)
                            {
                                break;
                            }
                            if ((e = e - dx) >= 0)
                            {
                                x1 = x1 - 1;
                                e = e + dy;
                            }
                        }
                    }
                }
            }
            else
            {
                // dy = 0 (et dx < 0)

                // vecteur horizontal vers la gauche

                while (x1 != x2)
                {
                    this->vectPoint.push_back(Point(x1, y1));
                    x1 -= 1;
                }
            }
        }
    }
    else
    {
        // dx = 0
        if ((dy = y2 - y1) != 0)
        {
            if (dy > 0)
            {
                // vecteur vertical croissant

                while (y1 != y2)
                {
                    this->vectPoint.push_back(Point(x1, y1));
                    y1 += 1;
                }
            }
            else
            {
                // dy < 0 (et dx = 0)

                // vecteur vertical décroissant

                while (y1 != y2)
                {
                    this->vectPoint.push_back(Point(x1, y1));
                    y1 -= 1;
                }
            }
        }
    }

    // // AFFICHAGE
    // for (size_t i = 0; i < this->vectPoint.size(); i++)
    // {
    //     std::cout << this->vectPoint.at(i);
    // }
    // std::cout << "\n";
}

Point AlgoBresenham::getPointByID ( size_t id)
{
    return this->vectPoint.at(id);
}

std::vector<Point> AlgoBresenham::getVectPoint()
{
    return this->vectPoint;
}

AlgoBresenham::~AlgoBresenham()
{
    std::cout << "Classe de type AlgoBresenham detruite \n";
}