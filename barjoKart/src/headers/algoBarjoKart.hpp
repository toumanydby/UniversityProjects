// #ifndef DEF_ALGO_BARJO_KART_HPP
// #define DEF_ALGO_BARJO_KART_HPP

// #define DIST_INFINI 100

// #include "readPng.hpp"
// #include "recupTomlFile.hpp"
// #include "algoBresenham.hpp"

// /**
//  * @brief Cette classe permettra de determiner la trajectoire a suivre pour un circuit donne. Grace a l'algorithme de Bresenham et une resolution de probleme de graphe !
//  * 
//  */
// class AlgoBarjoKart
// {
// private:
//     int accMax;
//     Point pointDepart;
//     Point pointArrivee;
//     std::map<Point, std::tuple<int, int, int>> mapPixels;
//     std::map<Point,int> distancePoints;
//     std::vector<Point> vectorVitesse;
//     std::vector<Point> trajectoire;

// public:

//     /**
//      * @brief Construct a new Algo Barjo Kart object
//      * 
//      * @param pngInfo 
//      * @param tomlInfo 
//      */
//     AlgoBarjoKart(readPng pngInfo, tomlFile tomlInfo);
//     void initialisation();
//     int isPixelBlack( std::tuple<int,int,int>);
//     int isInPixelBlack(std::vector<Point> vectPointsNoirs, Point p);

//     /**
//      * @brief Destroy the Algo Barjo Kart object
//      * 
//      */
//     ~AlgoBarjoKart();
// };




// #endif



#ifndef DEF_ALGO_BARJO_KART_HPP
#define DEF_ALGO_BARJO_KART_HPP

#include "readPng.hpp"
#include "recupTomlFile.hpp"
#include "../headers/algoBresenham.hpp"


/**
 * @brief Cette classe permettra de determiner la trajectoire a suivre pour un circuit donne. Grace a l'algorithme de Bresenham et une resolution de probleme de graphe !
 * 
 */
class AlgoBarjoKart
{
private:
    readPng pngInfo;
    tomlFile tomlInfo;
    int accMax;
    Point pointDepart;
    Point pointArrivee;
    std::vector<Point> vectorVitesse;
    std::vector<Point> trajectoire;
    std::map<Point, int> mapGraphe;

    

public:

    /**
     * @brief Construct a new Algo Barjo Kart object
     * 
     * @param pngInfo 
     * @param tomlInfo 
     */
    AlgoBarjoKart(readPng pngInfo, tomlFile tomlInfo);
    
    std::vector<Point> voisins(Point point);
    std::map<Point, std::vector<Point>> listeAdjacence(readPng);
    std::map<Point,Point> algoParcours(std::map<Point , std::vector<Point> >);
    bool isPixelBlack(Point);
    
    /**
     * @brief Destroy the Algo Barjo Kart object
     * 
     */
    ~AlgoBarjoKart();
};




#endif