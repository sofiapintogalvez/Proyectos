#include <iostream>
#include <sstream>
#include <fstream>
#include <string>
#include "LibBD.h"
#include "cPersona.h"
#include "cTrabajador.h"

Trabajador::Trabajador()
{
    sueldo = 0;
    ocupacion = "";
}

void Trabajador::setSueldo()
{
    std::cout << "\tSueldo: ";
    std::cin >> sueldo;
}

void Trabajador::setOcupacion()
{
    std::cout << "\tOcupacion: ";
    std::cin >> ocupacion;
}

float Trabajador::getSueldo()
{
    return sueldo;
}

std::string Trabajador::getOcupacion()
{
    return ocupacion;
}

void Trabajador::printTrabajador()
{
    printPersona();
    std::cout << "\tSueldo: " << getSueldo() << "\n";
    std::cout << "\tOcupacion: " << getOcupacion() << "\n";
    std::cout << "\t-------------------------\n";
}

std::string Trabajador::lineaString() 
{
    std::ostringstream oss;
    oss << "Trabajador," << Persona::lineaString()  << "," << sueldo << "," << ocupacion;
    return oss.str();
}

//INICIO LISTA TRABAJADORES

Lista_Trabajadores::Lista_Trabajadores(int size)
{
    ptr_trabajadores = nullptr;
    this-> size = size;

    if(ptr_trabajadores != nullptr)
    {
        delete[] ptr_trabajadores;
        ptr_trabajadores = nullptr;
    }
    ptr_trabajadores = new Trabajador[size];
}

Lista_Trabajadores::~Lista_Trabajadores()
{
    delete[] ptr_trabajadores;
}

void Lista_Trabajadores::escribirArchivo() 
{
    std::ofstream file("D:\\LabCompiler\\ProjectTest_PathCompiler\\src\\Base_Datos\\trabajadores.txt");
    for(int f=0; f<size; f++) 
    {
        file << ptr_trabajadores[f].lineaString() << std::endl;
    }
    file.close();
}

void Lista_Trabajadores::registrarLista()
{
    system("cls");
    identificacion_alumno();
    std::cout << "\n\t\tREGISTRO TRABAJADORES\n\n"; 
    for(int i=0; i<size; i++)
    {
        ptr_trabajadores[i].setNombre();
        ptr_trabajadores[i].setApellido();
        ptr_trabajadores[i].setDNI();
        ptr_trabajadores[i].setTelefono();
        ptr_trabajadores[i].setSueldo();
        ptr_trabajadores[i].setOcupacion();
        std::cout << "\n";
        escribirArchivo();
    }
}

void Lista_Trabajadores::printLista()
{
    system("cls");
    identificacion_alumno();
    std::cout << "\n\t\tVISUALIZACION TRABAJADORES\n\n";
    for(int i=0; i<size; i++)
    {
        ptr_trabajadores[i].printTrabajador();
        std::cout << "\n";
    }
}