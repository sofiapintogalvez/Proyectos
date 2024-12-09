class Bebida : public Productos
{
protected:
	std::string capacidad;

public:
	Bebida();
	void setCapacidad();
	std::string getCapacidad();
	void registrarProductos();
	void printProductos();
};