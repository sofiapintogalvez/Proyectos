#include "cProductos.h"

class Lista_Productos
{
protected:
	Productos ***ptr_productos;
	int size;

public:
	Lista_Productos(int);
	~Lista_Productos();
	void registrarLista();
	void buscarLista();
	void printPanaderia();
	void printBebida();
	void printDesayuno();
	void printLista();
};