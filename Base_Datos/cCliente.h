class Cliente : public Persona
{
protected:
	int n_orden;
	bool afiliado;

public:
	Cliente();
	void setN_Orden();
	void setAfiliado();
	int getN_Orden();
	bool getAfiliado();
	void printCliente();
	std::string lineaString() override;
};

class Lista_Clientes
{
public:
	Cliente *ptr_clientes;
	int size;

	Lista_Clientes(int);
	~Lista_Clientes();
	void escribirArchivo();
	void registrarLista();
	void printLista();
};