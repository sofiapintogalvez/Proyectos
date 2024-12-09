class Persona
{
protected:
	std::string nombre, apellido;
	int DNI, telefono;

public:
	Persona();
	void setNombre();
	void setApellido();
	void setDNI();
	void setTelefono();
	std::string getNombre();
	std::string getApellido();
	int getDNI();
	int getTelefono();
	void printPersona();
	virtual std::string lineaString();
};