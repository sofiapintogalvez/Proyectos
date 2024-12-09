class Trabajador : public Persona
{
protected:
	float sueldo;
	std::string ocupacion;

public:
	Trabajador();
	void setSueldo();
	void setOcupacion();
	float getSueldo();
	std::string getOcupacion();
	void printTrabajador();
	std::string lineaString() override;
};

class Lista_Trabajadores
{
protected:
	Trabajador *ptr_trabajadores;
	int size;

public:
	Lista_Trabajadores(int);
	~Lista_Trabajadores();
	void escribirArchivo();
	void registrarLista();
	void printLista();
};