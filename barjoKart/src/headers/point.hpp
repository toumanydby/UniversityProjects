#ifndef POINT_HPP
#define POINT_HPP

#include <iostream>

class Point {

    private: 
        int x;
        int y;
    public:
        Point();
        Point(int _x, int _y);
        Point(const Point &p);
        ~Point() { ; }

        int get_x() { return x; }
        int get_y() { return y; }

        /* Les accesseurs constants seront appelés sur un objet déclaré const */
        int get_x() const { return x; }
        int get_y() const { return y; }

        /* ===== Opérateurs unaires ===== */
        Point operator-();
        Point& operator++(); /* préfixe */
        /* postfixe --- (int) permet de surcharger */
        Point operator++(int);

        /* ===== Opérateurs de comparaison ===== */
        bool operator> (const Point &p1);
        /* Nécessaire pour que p.operator> fonctionne si p est const */
        bool operator> (const Point &p1) const;
        friend bool operator== (const Point &p, const Point &p1);

        /* ===== Opérateurs arithmétiques ===== */
        Point operator+(const Point &p1);
        Point operator-(const Point &p1);
        Point operator+(int _x);
        friend Point operator+(int _x, const Point &p);

        /* ===== Opérateurs flux ===== */
        friend std::istream& operator>> (std::istream &in, Point &p);

        /* ===== Opérateurs de classe ===== */
        int& operator[](std::size_t id);
        Point& operator=(const Point& p);

};

/* ===== Opérateurs flux ===== */
std::ostream& operator<< (std::ostream &os, const Point &p);
bool operator< (const Point &lhs, const Point &rhs);
#endif