#ifndef DEF_RECUP_TOML_FILE_HPP
#define DEF_RECUP_TOML_FILE_HPP

#include <iostream>
#include <vector>
#include <string>
#include "point.hpp"
#include "../../include/toml/toml.hpp"

class tomlFile
{
private:
    int accMax;
    std::tuple<int,int,int> couleurArrive;
    Point pointDepart;

public:
    /**
     * @brief Construct a new toml File object
     * 
     */
    tomlFile();

    /**
     * @brief Construct a new toml File object
     * 
     * @param fileName 
     */
    tomlFile(char *);

    /**
     * @brief Destroy the toml File object
     * 
     */
    ~tomlFile() { std::cout << "La classe de lecture du fichier .toml a ete detruite" << std::endl;}


    /**
     * @brief Get the Acc Max object
     * 
     * @return int 
     */
    int getAccMax() { return accMax; }

    /**
     * @brief Get the Couleur Arrive object
     * 
     * @return std::tuple<int,int,int> 
     */
    std::tuple<int,int,int> getCouleurArrive() { return couleurArrive; }

    /**
     * @brief Get the Point Depart object
     * 
     * @return Point 
     */
    Point getPointDepart() { return pointDepart;}
    
    /* Les accesseurs constants seront appelés sur un objet déclaré const */

    /**
     * @brief Get the Acc Max object
     * 
     * @return int 
     */
    int getAccMax() const { return accMax; }

    /**
     * @brief Get the Couleur Arrive object
     * 
     * @return std::tuple<int,int,int> 
     */
    std::tuple<int,int,int> getCouleurArrive() const { return couleurArrive; }

    /**
     * @brief Get the Point Depart object
     * 
     * @return Point 
     */
    Point getPointDepart() const { return pointDepart;}

};

/**
 * @brief Opérateurs flux pour l'affichage
 * 
 * @param os 
 * @param p 
 * @return std::ostream& 
 */
std::ostream& operator<< (std::ostream &os, const tomlFile &p);
#endif