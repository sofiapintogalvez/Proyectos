#include <iostream>
#include <string>
#include "cProductos.h"
#include "cBebida.h"

Bebida::Bebida()
{
    capacidad = "";
}

void Bebida::setCapacidad()
{
    std::cout << "\tCapacidad: ";
    std::cin >> capacidad;
}

std::string Bebida::getCapacidad()
{
    return capacidad;
}

void Bebida::registrarProductos()
{
    setTipo();
    setStock();
    setPrecio();
    setCapacidad();
    std::cout << "\n";
}

void Bebida::printProductos()
{
    std::cout << "\tTipo-nombre: " << getTipo() << "\n";
    std::cout << "\tStock: " << getStock() << "\n";
    std::cout << "\tPrecio: " << getPrecio() << "\n";
    std::cout << "\tCapacidad: " << getCapacidad() << "\n";
    std::cout << "\t-----------------------\n";
}