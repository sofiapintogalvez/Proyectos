#include <iostream>
#include <sstream>
#include <fstream>
#include <string>
#include "cPersona.h"

Persona::Persona()
{
	nombre = "";
    apellido = "";
    DNI = -1;
    telefono = 0;
}

void Persona::setNombre()
{
    std::cout << "\tNombre: ";
    std::getline(std::cin >> std::ws, nombre);
}

void Persona::setApellido()
{
    std::cout << "\tApellido: ";
    std::getline(std::cin, apellido);
}

void Persona::setDNI()
{
    std::cout << "\tDNI: ";
    std::cin >> DNI;
}

void Persona::setTelefono()
{
    std::cout << "\tTelefono: ";
    std::cin >> telefono;
}

std::string Persona::getNombre()
{
    return nombre;
}

std::string Persona::getApellido()
{
    return apellido;
}

int Persona::getDNI()
{
    return DNI;
}

int Persona::getTelefono()
{
    return telefono;
}

void Persona::printPersona()
{
    std::cout << "\tNombre: " << getNombre() << "\n";
    std::cout << "\tApellido: " << getApellido() << "\n";
    std::cout << "\tDNI: " << getDNI() << "\n";
    std::cout << "\tTelefono: " << getTelefono() << "\n";
}

std::string Persona::lineaString()
{
    std::ostringstream oss;
    oss << nombre << "," << apellido << "," << DNI << "," << telefono;
    return oss.str();
}