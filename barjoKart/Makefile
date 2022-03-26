# define the Cpp compiler to use
CXX = g++

# define any compile-time flags
CXXFLAGS := -std=c++17 -Wall -Wextra -g

EXEC = project

EXEC_MAIN = main

SRC = src/fonctions/*

SRC_MAIN = src/fonctions/main.cpp \
			src/fonctions/point.cpp \
			src/fonctions/recupTomlFile.cpp \
			src/fonctions/readPng.cpp \
			src/fonctions/algoBresenham.cpp \
			src/fonctions/algoBarjoKart.cpp 

TOML_FILE =  circuits/fast_food/fast_food.toml #circuits/fast_food/fast_food.toml #circuits/ever_given/ever_given.toml #circuits/adaptallure/adaptallure.toml #circuits/prairie/prairie.toml #circuits/surprise/surprise.toml #circuits/trois_quatorze/trois_quatorze.toml #circuits/adaptallure/adaptallure.toml #circuits/balladeAmnesique/mulholland_drive.toml #circuits/monpremiercircuit/circuit1.toml #circuits/basique/basique.toml #circuits/fusee/fusee.toml # circuits/athens/bcnr.toml

PNG_FILE = circuits/fast_food/fast_food.png #circuits/fast_food/fast_food.png #circuits/ever_given/ever_given.png #circuits/adaptallure/adaptallure.png #circuits/prairie/prairie.png #circuits/surprise/surprise.png #circuits/trois_quatorze/trois_quatorze.png #circuits/adaptallure/adaptallure.png #circuits/balladeAmnesique/mulholland_drive.png #circuits/monpremiercircuit/circuit0.png  #circuits/basique/basique.png #circuits/fusee/fusee.png # circuits/athens/bcnr.png

LIB =

DIRH = -I src/headers/

OBJECTS	:= $(SRC:.cpp=.o)

OBJECTS_MAIN := $(SRC_MAIN:.cpp=.o)

LDFLAGS = -lpng -Linclude

all : $(EXEC)


$(EXEC): $(OBJECTS)
	$(CXX) -o output/$@ $(DIRH) $^ $(LDFLAGS)


$(EXEC_MAIN): $(OBJECTS_MAIN)
	$(CXX) -o output/$@ $(DIRH) $^ $(LDFLAGS)


%.o:%.cpp
	$(CXX) $(CXXFLAGS) -o $@ -c $< 

memoire : $(EXEC)
	valgrind --leak-check=full ./output/$(EXEC_MAIN)

.PHONY: clean
clean:
	rm -f src/fonctions/*.o $(EXEC)
	@echo Cleanup complete!

run : $(EXEC)
	output/$(EXEC)
	@echo Executing 'run: all' complete!


run_main : $(EXEC_MAIN)
	./output/$(EXEC_MAIN) $(TOML_FILE) $(PNG_FILE)
	@echo Executing 'run: all' complete!

memoire_main : $(EXEC_MAIN)
	valgrind --leak-check=full -s ./output/$(EXEC_MAIN)
