#include <iostream>
#include <sstream>
#include <fstream>
#include <string>
#include "cProductos.h"

Productos::Productos()
{
    tipo = "";
	stock = 0;
    precio = 0;
}

void Productos::setTipo()
{
    std::cout << "\tTipo-nombre: ";
    std::getline(std::cin >> std::ws, tipo);
}

void Productos::setStock()
{
    std::cout << "\tStock: ";
    std::cin >> stock;
}

void Productos::setPrecio()
{
	std::cout << "\tPrecio: ";
    std::cin >> precio;
}

int Productos::getStock()
{
    return stock;
}

float Productos::getPrecio()
{
	return precio;
}

std::string Productos::getTipo()
{
    return tipo;
}

void Productos::registrarProductos()
{
    setTipo();
    setStock();
    setPrecio();
    std::cout << "\n";
}

void Productos::printProductos()
{
    std::cout << "\tTipo-nombre: " << getTipo() << "\n";
    std::cout << "\tStock: " << getStock() << "\n";
	std::cout << "\tPrecio: " << getPrecio() << "\n";
    std::cout << "\t-----------------------------\n";
}