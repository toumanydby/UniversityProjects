#include "../headers/recupTomlFile.hpp"
#include "../headers/readPng.hpp"
#include "../headers/algoBresenham.hpp"
#include "../headers/algoBarjoKart.hpp"

#include <iostream>
#include <string>
#include <vector>
#include <map>

// std::vector<int> rbgToVect (rgb_pixel & pixel){
//     std::cout << pixel.blue << std::endl;
// }

int main(int argc, char **argv)
{
    // Read a .toml file
    
    tomlFile fusee = tomlFile(argv[1]);
    //std::cout << fusee << std::endl;

    // Read a .png file
    readPng png_info = readPng(argv[2], fusee);
    // std::cout << png_info;
    // exit(EXIT_FAILURE);
    
    // std::cout << png_info;
    // std::cout << "--------------------------------------------------------------\n" << std::endl;

    AlgoBarjoKart algoTest = AlgoBarjoKart(png_info,fusee);
    


    return 0;
}