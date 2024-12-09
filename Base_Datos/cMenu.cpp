#include <iostream>
#include "LibBD.h"
#include "cMenu.h"

void Menu::menuPrincipal()
{
	int opcion;

	do
	{
		system("cls");
		identificacion_alumno();
        std::cout << "\n\t\tTIENDA-PANADERIA MERAKI\n\n";
        std::cout << "\t1. Clientes\n";
        std::cout << "\t2. Trabajadores\n";
        std::cout << "\t3. Productos\n";
        std::cout << "\t4. Salir\n\n";
        std::cout << "\tIngrese opcion: ";
        std::cin >> opcion;
        std::cout << "\n";

        switch(opcion)
        {
            case 1:
    		menuCliente();
            break;

            case 2:
    		menuTrabajador();
            break;

            case 3:
            menuProductos();
            break;

            case 4:
            break;

            default:
            std::cout << "ERROR";
            continue;
        }
    }while(opcion != 4);
}