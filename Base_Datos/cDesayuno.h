class Desayuno : public Productos
{
protected:
	std::string saludable;

public:
	Desayuno();
	void setSaludable();
	std::string getSaludable();
	void registrarProductos();
	void printProductos();
};