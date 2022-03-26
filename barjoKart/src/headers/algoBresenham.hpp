#ifndef DEF_ALGO_BRESENHAM_HPP
#define DEF_ALGO_BRESENHAM_HPP

#include "readPng.hpp"
#include "recupTomlFile.hpp"

/**
 * @brief Classe representant l'algo de Bresenham dans sa version optimale d'un octant.
 * 
 */
class AlgoBresenham
{
private:
    Point pointDepart;
    Point pointArrivee;
    std::vector<Point> vectPoint;

public:
    /**
     * @brief Construct a new Algo Bresenham object
     * 
     * @param pointDepart 
     * @param pointArrivee 
     */
    AlgoBresenham(Point pointDepart, Point pointArrivee);
    Point getPointByID ( size_t id);
    std::vector<Point> getVectPoint();
    /**
     * @brief Destroy the Algo Bresenham object
     * 
     */
    ~AlgoBresenham();
};




#endif