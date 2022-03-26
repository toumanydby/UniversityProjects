#include "../headers/recupTomlFile.hpp"

tomlFile::tomlFile(){
}
tomlFile::tomlFile(char * fileName){

    // On parse le contenu du fichier .toml
    const auto fileToml = toml::parse(fileName);

    // Ensuite on recupere les differents champs du fichier .toml, a savoir  { acc_max, couleurArrive, pointDepart } dans les differentes variables
    const auto acc_max = toml::find<std::int64_t>(fileToml, "acc_max");
    const auto couleurArrive = toml::find<std::tuple<int,int,int>>(fileToml, "couleur_arrivee");

    // Ici on recupere les differentes coordonnes du point de depart qui est en vrai un tableau avec deux champs x et y.
    const auto pointDepart = toml::find(fileToml,"depart");
    const auto x = toml::find<std::int64_t>(pointDepart, "x");    
    const auto y = toml::find<std::int64_t>(pointDepart, "y");    

    // Ici, on cree le point de depart en question !    
    Point p(x,y);

    // On stocke les differentes valeurs dans les champs correspondant a la classe
    (*this).accMax = acc_max;
    (*this).couleurArrive = couleurArrive;
    (*this).pointDepart = p;
}

/* Une référence sur l'ostream os est renvoyée (notamment) 
 * pour pouvoir faire cout << p << p1 << endl; 
 */
std::ostream& operator<<(std::ostream &os, const tomlFile& tf) {
    std::tuple<int,int,int> coulAr = tf.getCouleurArrive();
    os << "acc_max = " << tf.getAccMax() << "\n" << "Couleur arrive en RGB = [ " << std::get<0>(coulAr) <<", " << std::get<1>(coulAr) <<", " << std::get<2>(coulAr) <<" ]"<< "\n" << "Point de depart = " << tf.getPointDepart();
    return os;
}