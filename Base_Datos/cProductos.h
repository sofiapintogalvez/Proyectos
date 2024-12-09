#ifndef CPRODUCTOS_H
#define CPRODUCTOS_H

class Productos
{
protected:
	std::string tipo;
	int stock;
	float precio;

public:
	Productos();
	void setTipo();
	void setStock();
	void setPrecio();
	int getStock();
	float getPrecio();
	std::string getTipo();
	virtual void registrarProductos();
	virtual void printProductos();
};

#endif