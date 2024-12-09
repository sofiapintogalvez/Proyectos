#include <iostream>
#include <string>
#include "cProductos.h"
#include "cDesayuno.h"

Desayuno::Desayuno()
{
    saludable = "";
}

void Desayuno::setSaludable()
{
    std::cout << "\tSaludable?: ";
    std::getline(std::cin >> std::ws, saludable);
}

std::string Desayuno::getSaludable()
{
    return saludable;
}

void Desayuno::registrarProductos()
{
    setTipo();
    setStock();
    setPrecio();
    setSaludable();
    std::cout << "\n";
}

void Desayuno::printProductos()
{
    std::cout << "\tTipo-nombre: " << getTipo() << "\n";
    std::cout << "\tStock: " << getStock() << "\n";
    std::cout << "\tPrecio: " << getPrecio() << "\n";
    std::cout << "\tSaludable?: " << getSaludable() << "\n";
    std::cout << "\t-----------------------\n";
}