#include <iostream>
#include <sstream>
#include <fstream>
#include <string>
#include "LibBD.h"
#include "cPersona.h"
#include "cCliente.h"

Cliente::Cliente()
{
    n_orden = 0;
    afiliado = false;
}

void Cliente::setN_Orden()
{
    std::cout << "\tNumero de Orden: ";
    std::cin >> n_orden;
}

void Cliente::setAfiliado()
{
    char rpta;

    std::cout << "\tAfiliado? (S-N): ";
    std::cin >> rpta;

    if(rpta == 'S' || rpta == 's')
    {
        afiliado = true;
    }
    else
    {
        afiliado = false;
    }
}

int Cliente::getN_Orden()
{
    return n_orden;
}

bool Cliente::getAfiliado()
{
    return afiliado;
}

void Cliente::printCliente()
{
    printPersona();
    std::cout << "\tNumero de Orden: " << getN_Orden() << "\n";
    std::cout << "\tAfiliado: " << getAfiliado() << "\n";
    std::cout << "\t-------------------------\n";
}

std::string Cliente::lineaString() 
{
    std::ostringstream oss;
    oss << "Cliente," << Persona::lineaString()  << "," << n_orden;
    return oss.str();
}

//INICIO LISTA CLIENTES

Lista_Clientes::Lista_Clientes(int size)
{
    ptr_clientes = nullptr;
    this-> size = size;

    if(ptr_clientes != nullptr)
    {
        delete[] ptr_clientes;
        ptr_clientes = nullptr;
    }
    ptr_clientes = new Cliente[size];
}

Lista_Clientes::~Lista_Clientes()
{
    delete[] ptr_clientes;
}

void Lista_Clientes::escribirArchivo() 
{
    std::ofstream file("D:\\LabCompiler\\ProjectTest_PathCompiler\\src\\Base_Datos\\clientes.txt");
    for(int f=0; f<size; f++) 
    {
        file << ptr_clientes[f].lineaString() << std::endl;
    }
    file.close();
}

void Lista_Clientes::registrarLista()
{
    system("cls");
    identificacion_alumno();
    std::cout << "\n\t\tREGISTRO CLIENTES\n\n"; 
    for(int i=0; i<size; i++)
    {
        ptr_clientes[i].setNombre();
        ptr_clientes[i].setApellido();
        ptr_clientes[i].setDNI();
        ptr_clientes[i].setTelefono();
        ptr_clientes[i].setN_Orden();
        ptr_clientes[i].setAfiliado();
        std::cout << "\n";
        escribirArchivo();
    }
}

void Lista_Clientes::printLista()
{
    system("cls");
    identificacion_alumno();
    std::cout << "\n\t\tVISUALIZACION CLIENTES\n\n";
    for(int i=0; i<size; i++)
    {
        ptr_clientes[i].printCliente();
        std::cout << "\n";
    }
}