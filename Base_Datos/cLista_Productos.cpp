#include <iostream>
#include <string>
#include "LibBD.h"
#include "cLista_Productos.h"
#include "cProductos.h"
#include "cPanaderia.h"
#include "cBebida.h"
#include "cDesayuno.h"

Lista_Productos::Lista_Productos(int size)
{
	ptr_productos = nullptr;
    this-> size = size;

    ptr_productos = new Productos **[size];

    for(int f=0; f<size; f++)
    {
        ptr_productos[f] = new Productos*[5];
        for(int c=0; c<5; c++)
        {
            ptr_productos[f][c] = nullptr;
        }
    }
}

Lista_Productos::~Lista_Productos()
{
    if(ptr_productos != nullptr)
    {
        for(int f=0; f<size; f++)
        {
            for(int c=0; c<5; c++)
            {
                if(ptr_productos[f][c] != nullptr)
                {
                    delete ptr_productos[f][c];    
                }   
            }
            delete[] ptr_productos[f];
            ptr_productos[f] = nullptr;
        }
        delete[] ptr_productos;
        ptr_productos = nullptr;
    }
}

void Lista_Productos::registrarLista()
{
    int seleccion;
    do
    {
        system("cls");
        identificacion_alumno();
        std::cout << "\n\t\tOPCIONES PRODUCTOS\n\n";
        std::cout << "\t1. Ingresar en Panaderia\n";
        std::cout << "\t2. Ingresar en Bebidas\n";
        std::cout << "\t3. Ingresar en Desayunos\n";
        std::cout << "\t4. Regresar\n\n";
        std::cout << "\tIngrese opcion: ";
        std::cin >> seleccion;
        std::cout << "\n";

        switch(seleccion)
        {
            case 1:
            for(int c=0; c<5; c++)
            {
                if(ptr_productos[0][c] == nullptr)
                {
                    Productos *p1 = new Panaderia;
                    p1->registrarProductos();
                    ptr_productos[0][c] = p1;
                    break;
                }
            }
            break;

            case 2:
            for(int c=0; c<5; c++)
            {
                if(ptr_productos[1][c] == nullptr)
                {
                    Productos *p2 = new Bebida;
                    p2->registrarProductos();
                    ptr_productos[1][c] = p2;
                    break;
                }
            }
            break;

            case 3:
            for(int c=0; c<5; c++)
            {
                if(ptr_productos[2][c] == nullptr)
                {
                    Productos *p3 = new Desayuno;
                    p3->registrarProductos();
                    ptr_productos[2][c] = p3;
                    break;
                }
            }
            break;

            case 4:
            break;

            default:
            std::cout << "ERROR";
            continue;
        }
    }while(seleccion != 4);
}

void Lista_Productos::buscarLista()
{
    int seleccion;

    do
    {
        system("cls");
        identificacion_alumno();
        std::cout << "\n\t\tOPCIONES PRODUCTOS\n\n";
        std::cout << "\t1. Buscar en Panaderia\n";
        std::cout << "\t2. Buscar en Bebidas\n";
        std::cout << "\t3. Buscar en Desayunos\n";
        std::cout << "\t4. Regresar\n\n";
        std::cout << "\tIngrese opcion: ";
        std::cin >> seleccion;
        std::cout << "\n";

        std::string busqueda;

        switch(seleccion)
        {
            case 1:
            std::cout << "\tProducto a buscar: ";
            std::getline(std::cin >> std::ws, busqueda);
            std::cout << "\n";
            for(int c=0; c<5; c++)
            {
                if(ptr_productos[0][c]->getTipo() == busqueda)
                {
                    ptr_productos[0][c]->printProductos();
                    system("pause");
                    break;
                }
            }
            break;

            case 2:
            std::cout << "\tProducto a buscar: ";
            std::getline(std::cin >> std::ws, busqueda);
            std::cout << "\n";
            for(int c=0; c<5; c++)
            {
                if(ptr_productos[1][c]->getTipo() == busqueda)
                {
                    ptr_productos[1][c]->printProductos();
                    system("pause");
                    break;
                }
            }
            break;

            case 3:
            std::cout << "\tProducto a buscar: ";
            std::getline(std::cin >> std::ws, busqueda);
            std::cout << "\n";
            for(int c=0; c<5; c++)
            {
                if(ptr_productos[2][c]->getTipo() == busqueda)
                {
                    ptr_productos[2][c]->printProductos();
                    system("pause");
                    break;
                }
            }
            break;

            case 4:
            break;

            default:
            std::cout << "ERROR";
            continue;
        }
    }while(seleccion != 4);
}

void Lista_Productos::printPanaderia()
{
    std::cout << "\n\t\tPANADERIA\n\n";
    for(int c=0; c<5; c++)
    {
        if(ptr_productos[0][c] != nullptr)
        {
            ptr_productos[0][c]->printProductos(); 
        }
    }
}

void Lista_Productos::printBebida()
{
    std::cout << "\n\t\tBEBIDAS\n\n";
    for(int c=0; c<5; c++)
    {
        if(ptr_productos[1][c] != nullptr)
        {
            ptr_productos[1][c]->printProductos();   
        }
    }
}

void Lista_Productos::printDesayuno()
{
    std::cout << "\n\t\tDESAYUNOS\n\n";
    for(int c=0; c<5; c++)
    {
        if(ptr_productos[2][c] != nullptr)
        {
            ptr_productos[2][c]->printProductos();    
        }
    }
}

void Lista_Productos::printLista()
{
    int seleccion;

    do
    {
        system("cls");
        identificacion_alumno();
        std::cout << "\n\t\tOPCIONES PRODUCTOS\n\n";
        std::cout << "\t1. Visualizar Panaderia\n";
        std::cout << "\t2. Visualizar Bebidas\n";
        std::cout << "\t3. Visualizar Desayunos\n";
        std::cout << "\t4. Regresar\n\n";
        std::cout << "\tIngrese opcion: ";
        std::cin >> seleccion;
        std::cout << "\n";

        switch(seleccion)
        {
            case 1:
            printPanaderia();
            system("pause");
            break;

            case 2:
            printBebida();
            system("pause");
            break;

            case 3:
            printDesayuno();
            system("pause");
            break;

            case 4:
            break;

            default:
            std::cout << "ERROR";
            continue;
        }

    }while(seleccion != 4);
}