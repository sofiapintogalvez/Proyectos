class Panaderia : public Productos
{
protected:
	std::string sabor;

public:
	Panaderia();
	void setSabor();
	std::string getSabor();
	void registrarProductos();
	void printProductos();
};