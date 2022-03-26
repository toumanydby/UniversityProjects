#include "../headers/point.hpp"

using namespace std;

Point::Point(int _x, int _y) {
    //cout << "Constructeur avec arguments." << endl;
    (*this).x = _x;
    (*this).y = _y;
}

Point::Point(const Point &p) {
    //cout << "Constructeur par recopie." << endl;
    (*this).x = p.get_x();
    (*this).y = p.get_y();
}

Point Point::operator-() {
    //cout << endl << "Surcharge de operator-" << endl;
    return Point(-this->x,-this->y);
}

Point& Point::operator++() {
    //cout << endl << "Surcharge de operator++()" << endl;
    (*this).x++;
    (*this).y++;
    return *this;
}

/* Le paramètre permet de distinguer préfixe et postixe et est ignoré 
 * L'incrémentation postfixe est gérée par p.operator++(0)
 */
Point Point::operator++(int) {
    //cout << endl << "Surcharge de operator++(int)" << endl;
    Point tmp(*this);
    (*this).operator++();
    return tmp;
}

/* La valeur est retournée par référence pour permettre une modification 
 * via l'operator[]
 */
int& Point::operator[](std::size_t id) {
    //cout << endl << "Surcharge de operator[]" << endl;
    /* Toute valeur autre que 0 renvoie l'ordonnée du Point */
    if(id == 0) return (*this).x;
    else return (*this).y;
}

/* Surcharge de l'opérateur d'affectation, créant un nouveau Point à partir d'un autre 
 * et retournant l'objet courant par référence. */
Point& Point::operator=(const Point& p) {
    //cout << endl << "Surcharge de operator=" << endl;
    /* L'operator= ne doit rien faire pour de l'auto-affectation (du type x = x) 
     * this est un pointeur sur l'objet courant, &p contient l'adresse du Point p */
    if(this==&p)
        return (*this);
    (*this).x = p.x;
    (*this).y = p.y;
    return *this;
}

/* Une référence sur l'ostream os est renvoyée (notamment) 
 * pour pouvoir faire cout << p << p1 << endl; 
 */
ostream& operator<<(ostream &os, const Point& p) {
    os << "[" << p.get_x() << "," << p.get_y() << "]";
    return os;
}

/* Une référence sur l'ostream os est renvoyée (notamment) 
 * pour pouvoir faire cout >> p >> p1; 
 */
istream& operator>>(istream &is, Point &p) {
    //cout << endl << "Surcharge de operator>>" << endl;
    cout << "Abscisse : ";
    is >> p.x;
    cout << "Ordonnée : ";
    is >> p.y;
    return is;
}

/* Nécessaire pour que p.operator> fonctionne si p est const 
 * Une méthode membre de classe dont le prototype finit par const 
 * sera _obligatoirement_ appelée sur instance de la classe déclarée const 
 * Si elle n'est pas implémentée, une erreur de compilation sera générée */
bool Point::operator>(const Point &p1) const {
    if(this->x > p1.x)
        return true;
    else if (this->x < p1.x)
        return false;
    else
        return this->y > p1.y;
}

bool Point::operator>(const Point &p1) {
    if(this->x > p1.x)
        return true;
    else if (this->x < p1.x)
        return false;
    else
        return this->y > p1.y;
}

static int cmp(const Point &lhs, const Point &rhs) {
    if (rhs > lhs)
        return 1;
    else if (lhs > rhs)
        return -1;
    else return 0;
}

/* Surcharge de l'operator< en tant que fonction non-membre, 
 * et utilisant un opérateur de comparaison (lui-même utilisant operator>)
 */
bool operator< (const Point &lhs, const Point &rhs) {
    /* Si la fonction de comparaison renvoie 0, les Point sont égaux */
    return cmp(lhs,rhs)==1;
}

Point Point::operator+(const Point &p1) {
    return Point((*this).x+p1.x, (*this).y+p1.y);
}

Point Point::operator-(const Point &p1) {
    return Point((*this).x-p1.x, (*this).y-p1.y);
}


Point Point::operator+(int _x) {
    return Point((*this).x+_x, (*this).y);
}

Point operator+(int _x, const Point &p) {
    return Point(p.x+_x, p.y);
}

/* Les fonctions non-membres */
bool operator == (const Point &p, const Point &p1) {
    return p.x == p1.x && p.y == p1.y;
}

/* Les surcharges non-membres */
bool operator>= (const Point &p, const Point &p1) {
    return !(p < p1);
}
bool operator<= (const Point &p, const Point &p1) {
    return !(p > p1);
}

bool operator!= (const Point &p, const Point &p1) {
    return !(p == p1);
}
