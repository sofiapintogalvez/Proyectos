#include <iostream>
#include <cstdlib>
#include "LibBD.h"
#include "cPersona.H"
#include "cCliente.h"
#include "cTrabajador.h"
#include "cProductos.h"
#include "cLista_Productos.h"

void identificacion_alumno()
{
    std::system("cls");            // Comando para borrar todo el contenido de la pantalla
    std::cout << "\x1B[H";          // Codigo para colocar el cursor en el canto superior izquierdo
    std::cout << "\x1B[3;35m";         // Mostrar el siguiente texto en modo de letra italico "[3;" y color azul "[ ;34m"   
    std::cout << "/***************************************************/" << std::endl; 
    std::cout << "\x1B[m";             // Resetear color a valor por defecto
    std::cout << "Universidad Catolica San Pablo" << std::endl; 
    std::cout << "Escuela Profesional de Ciencia de la Computacion" << std::endl; 
    std::cout << "Curso de Ciencia de la Computacion I" << std::endl; 
    std::cout << "Prof. D.Sc. Manuel Eduardo Loaiza Fernandez" << std::endl;
    std::cout << "Alumna: Sofia Alejandra Pinto Galvez y Maurizio Daniel Luque Soto" << std::endl;
    std::cout << "Arequipa 2023 - I" << std::endl; 
    std::cout << "\x1B[3;35m";         // Mostrar el siguiente texto en modo de letra italico "[3;" y color azul "[ ;34m"   
    std::cout << "/***************************************************/" << std::endl;
    std::cout << "\x1B[m";             // Resetear color a valor por defecto
}

void menuCliente()
{
    Lista_Clientes c(3);

    int opcion;
    do
    {
        system("cls");
        identificacion_alumno();
        std::cout << "\n\t\tMENU CLIENTE\n\n";
        std::cout << "\t1. Agregar datos\n";
        std::cout << "\t2. Visualizar datos\n";
        std::cout << "\t3. Regresar\n\n";
        std::cout << "\tIngrese opcion: ";
        std::cin >> opcion;
        std::cout << "\n";

        switch(opcion)
        {
            case 1:
            c.registrarLista();
            break;

            case 2:
            c.printLista();
            system("pause");
            break;

            case 3:
            break;

            default:
            std::cout << "ERROR";
            continue;
        }
    }while(opcion != 3);
}

void menuTrabajador()
{
    Lista_Trabajadores t(3);

    int opcion;
    do
    {
        system("cls");
        identificacion_alumno();
        std::cout << "\n\t\tMENU TRABAJADOR\n\n";
        std::cout << "\t1. Agregar datos\n";
        std::cout << "\t2. Visualizar datos\n";
        std::cout << "\t3. Regresar\n\n";
        std::cout << "\tIngrese opcion: ";
        std::cin >> opcion;
        std::cout << "\n";

        switch(opcion)
        {
            case 1:
            t.registrarLista();
            break;

            case 2:
            t.printLista();
            system("pause");
            break;

            case 3:
            break;

            default:
            std::cout << "ERROR";
            continue;
        }
    }while(opcion != 3);
}

void menuProductos()
{
    Lista_Productos pr(3);

    int opcion;
    do
    {
        system("cls");
        identificacion_alumno();
        std::cout << "\n\t\tMENU DE PRODUCTOS\n\n";
        std::cout << "\t1. Agregar datos\n";
        std::cout << "\t2. Visualizar datos\n";
        std::cout << "\t3. Buscar datos\n";
        std::cout << "\t4. Regresar\n\n";
        std::cout << "\tIngrese opcion: ";
        std::cin >> opcion;
        std::cout << "\n";

        switch(opcion)
        {
            case 1:
            pr.registrarLista();
            break;

            case 2:
            pr.printLista();
            break;

            case 3:
            pr.buscarLista();
            break;

            case 4:
            break;

            default:
            std::cout << "ERROR";
            continue;
        }
    }while(opcion != 4);
}
