#include <iostream>
#include <string>
#include "cProductos.h"
#include "cPanaderia.h"

Panaderia::Panaderia()
{
    sabor = "";
}

void Panaderia::setSabor()
{
    std::cout << "\tSabor: ";
    std::getline(std::cin >> std::ws, sabor);
}

std::string Panaderia::getSabor()
{
    return sabor;
}

void Panaderia::registrarProductos()
{
    setTipo();
    setSabor();
    setStock();
    setPrecio();
    std::cout << "\n";
}

void Panaderia::printProductos()
{
    std::cout << "\tTipo-nombre: " << getTipo() << "\n";
    std::cout << "\tSabor: " << getSabor() << "\n";
    std::cout << "\tStock: " << getStock() << "\n";
    std::cout << "\tPrecio: " << getPrecio() << "\n";
    std::cout << "\t-----------------------\n";
}