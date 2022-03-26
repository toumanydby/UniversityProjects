#ifndef DEF_READ_PNG_HPP
#define DEF_READ_PNG_HPP

#include <iostream>
#include <vector>
#include <string>
#include <tuple>
#include <map>
#include "point.hpp"
#include "recupTomlFile.hpp"
#include "../../include/png++/png.hpp"

class readPng
{

private:
    int height;
    int width;
    tomlFile tomlInfo;
    std::string pngFile;
    std::map<Point, std::tuple<int, int, int>> mapPixels;
    std::vector<Point> pixRouges;
    std::vector<Point> pixNoirs;

public:
    void setColorByposition(int, int,int,int);

    /**
     * @brief Constructeur par defaut 
     * Construct a new read Png object
     * 
     */
    readPng();

    /**
     * @brief Construct a new read Png object
     * 
     */
    readPng(std::string, tomlFile);

    /**
     * @brief Destroy the read Png object
     * 
     */
    ~readPng();

    void readPngPixels();

    /**
     * @brief Get the Height object
     * 
     * @return int 
     */
    int getHeight() { return height; }

    /**
     * @brief Get the Width object
     * 
     * @return int 
     */
    int getWidth() { return width; }

    /**
     * @brief Get the Map Pixels object
     * 
     * @return std::map<Point, std::tuple<int, int, int>> 
     */
    std::map<Point, std::tuple<int, int, int>> getMapPixels() { return this->mapPixels;}

    std::vector<Point> getPixNoirs() { return this->pixNoirs;}

    std::vector<Point> getPixRouges() {return this->pixRouges; }
    /**
     * @brief Get the Rbg By Position object
     * 
     * @param x 
     * @param y 
     * @return std::tuple<int, int, int> 
     */
    std::tuple<int, int, int> getRbgByPosition(int x, int y);
    Point getPointByRbg(std::tuple<int, int, int> t) ;

    /* Les accesseurs constants seront appelés sur un objet déclaré const */
    /**
     * @brief Get the Height object
     * 
     * @return int 
     */
    int getHeight() const { return height; }

    /**
     * @brief Get the Width object
     * 
     * @return int 
     */
    int getWidth() const { return width; }
    /**
     * @brief Get the Map Pixels object
     * 
     * @return std::map<Point, std::tuple<int, int, int>> 
     */
    std::map<Point, std::tuple<int, int, int>> getMapPixels() const { return this->mapPixels; }

    std::vector<Point> getPixNoirs() const { return this->pixNoirs;}

    std::vector<Point> getPixRouges() const { return this->pixRouges; }

    /**
     * @brief Get the Rbg By Position object
     * 
     * @param x 
     * @param y 
     * @return std::tuple<int, int, int> 
     */
    std::tuple<int, int, int> getRbgByPosition(int x, int y) const;

    //Point getPointByRbg(int r, int b, int g) const;
};

/**
 * @brief Opérateurs flux pour l'affichage
 * 
 * @param os 
 * @param mapPixels 
 * @return std::ostream& 
 */
std::ostream &operator<<(std::ostream &os, const readPng &mapPixels);


#endif