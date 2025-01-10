import os
import pandas as pd
from tkinter import Tk, Label, Button, Entry, filedialog, Text, messagebox, StringVar

TIPOS_DE_DATOS = {
    "INTEGER": 4,
    "VARCHAR": lambda length: length + 1,
    "DECIMAL": 6,
}

class Sector:
    def __init__(self, sector_size):
        self.data = bytearray(sector_size)
        self.bytes_ocupados = 0
        self.datos_escritos = []

    def escribir_data(self, fila, size):
        fila_bytes = fila.encode('utf-8').ljust(size, b'\x00') 
        espacio_libre = len(self.data) - self.bytes_ocupados

        if len(fila_bytes) <= espacio_libre:
            self.data[self.bytes_ocupados:self.bytes_ocupados + len(fila_bytes)] = fila_bytes
            self.bytes_ocupados += len(fila_bytes)
            self.datos_escritos.append((fila, size))
            return ""
        else:
            parte_que_cabe = fila_bytes[:espacio_libre]
            parte_restante = fila_bytes[espacio_libre:]
            self.data[self.bytes_ocupados:] = parte_que_cabe
            self.bytes_ocupados += len(parte_que_cabe)
            self.datos_escritos.append((fila[:len(parte_que_cabe)], len(parte_que_cabe)))
            return fila[len(parte_que_cabe):]  

    def buscar_dato(self, termino):
        resultados = []
        for idx, (dato, size) in enumerate(self.datos_escritos):
            if termino in dato:
                resultados.append((idx, dato, size))
        return resultados

class Pista:
    def __init__(self, sector_por_pista, sector_size):
        self.sectores = [Sector(sector_size) for _ in range(sector_por_pista)]

class Plato:
    def __init__(self, pista_por_plato, sector_por_pista, sector_size):
        self.pistas = [Pista(sector_por_pista, sector_size) for _ in range(pista_por_plato)]

class Disco:
    def __init__(self, platos_size, pista_por_pista, sector_por_pista, sector_size):
        self.platos = [
            Plato(pista_por_pista, sector_por_pista, sector_size)
            for _ in range(platos_size)
        ]

    def escribir_data(self, filas):
        for idx, (fila, size) in enumerate(filas):
            data_restante = fila
            for plato in self.platos:
                for pista in plato.pistas:
                    for sector in pista.sectores:
                        if data_restante:
                            data_restante = sector.escribir_data(data_restante, size)
                        else:
                            break
                    if not data_restante:
                        break
                if not data_restante:
                    break

            if data_restante:
                print(f"No hay suficiente espacio para almacenar toda la fila {idx + 1}.")
                return False
        return True

    def visualizar_disco(self):
        resultado = []
        for i, plato in enumerate(self.platos):
            resultado.append(f"PLATO {i + 1}")
            for j, pista in enumerate(plato.pistas):
                resultado.append(f"  Pista {j + 1}")
                for k, sector in enumerate(pista.sectores):
                    estado = "LLENO" if sector.bytes_ocupados == len(sector.data) else (
                        "PARCIALMENTE LLENO" if sector.bytes_ocupados > 0 else "VACÍO"
                    )
                    espacio_libre = len(sector.data) - sector.bytes_ocupados
                    resultado.append(
                        f"    Sector {k + 1}: {estado} - {sector.bytes_ocupados} bytes ocupados, {espacio_libre} bytes libres"
                    )
                    for fila, size in sector.datos_escritos:
                        resultado.append(f"      {fila:<60} ... {size} bytes")
        return "\n".join(resultado)

    def buscar_dato(self, termino):
        resultados = []
        for i, plato in enumerate(self.platos):
            for j, pista in enumerate(plato.pistas):
                for k, sector in enumerate(pista.sectores):
                    coincidencias = sector.buscar_dato(termino)
                    for idx, dato, size in coincidencias:
                        resultados.append(
                            f"PLATO {i + 1}, PISTA {j + 1}, SECTOR {k + 1}, Dato: {dato}, Tamaño: {size} bytes"
                        )
        return resultados

def cargar_desde_excel(ruta_excel, tipos):
    try:
        df = pd.read_csv(ruta_excel, header=None, skip_blank_lines=True, quotechar='"', skipinitialspace=True)
        filas = []
        for _, row in df.iterrows():
            fila = []
            total_size = 0
            for i, valor in enumerate(row):
                tipo = tipos[i]
                if tipo.startswith("VARCHAR"):
                    max_length = int(tipo.split("(")[1].split(")")[0])
                    size = TIPOS_DE_DATOS["VARCHAR"](max_length)
                else:
                    size = TIPOS_DE_DATOS[tipo]
                fila.append(str(valor))  
                total_size += size
            filas.append(("|".join(fila), total_size))
        return filas
    except Exception as e:
        print(f"Error al leer el archivo: {e}")
        return []

def cargar_estructura_txt():
    archivo = filedialog.askopenfilename(filetypes=[("Archivos de texto", "*.txt")])
    if not archivo:
        messagebox.showerror("Error", "No se seleccionó un archivo válido.")
        return None

    try:
        with open(archivo, 'r') as f:
            contenido = f.read()
            tipos = []
            for linea in contenido.splitlines():
                if "VARCHAR" in linea:
                    max_length = int(linea.split("VARCHAR(")[1].split(")")[0])
                    tipos.append(f"VARCHAR({max_length})")
                elif "INTEGER" in linea:
                    tipos.append("INTEGER")
                elif "DECIMAL" in linea:
                    tipos.append("DECIMAL")
            messagebox.showinfo("Estructura Cargada", f"Tipos detectados: {', '.join(tipos)}")
            return tipos
    except Exception as e:
        messagebox.showerror("Error", f"Error al procesar el archivo: {e}")
        return None

def interfaz():
    def cargar_archivo():
        archivo = filedialog.askopenfilename(filetypes=[("CSV files", "*.csv")])
        if archivo:
            ruta_archivo.set(archivo)
            messagebox.showinfo("Archivo Cargado", f"Se cargó el archivo:\n{archivo}")

    def cargar_estructura():
        global tipos
        nuevos_tipos = cargar_estructura_txt()
        if nuevos_tipos:
            tipos = nuevos_tipos

    def procesar_disco():
        try:
            sector_size = int(sector_size_var.get())
            sector_count = int(sector_count_var.get())
            pistas = int(pistas_var.get())
            platos = int(platos_var.get())
        except ValueError:
            messagebox.showerror("Error", "Los valores no son válidos.")
            return

        ruta = ruta_archivo.get()
        if not os.path.exists(ruta):
            messagebox.showerror("Error", "No se seleccionó un archivo válido.")
            return

        filas = cargar_desde_excel(ruta, tipos)
        if not filas:
            messagebox.showerror("Error", "No se pudo procesar el archivo.")
            return

        global disco
        disco = Disco(platos, pistas, sector_count, sector_size)
        disco.escribir_data(filas)
        resultado = disco.visualizar_disco()
        text_resultado.delete(1.0, "end")
        text_resultado.insert("end", resultado)

    def buscar_en_disco():
        if not disco:
            messagebox.showerror("Error", "El disco no ha sido procesado todavía.")
            return
        termino = termino_busqueda_var.get().strip()
        if not termino:
            messagebox.showerror("Error", "Ingrese un término de búsqueda válido.")
            return
        resultados = disco.buscar_dato(termino)
        if resultados:
            text_resultado.delete(1.0, "end")
            text_resultado.insert("end", "\n".join(resultados))
        else:
            messagebox.showinfo("Búsqueda", "No se encontró el término en el disco.")

    root = Tk()
    root.title("Simulador de Disco")

    global disco
    disco = None

    global tipos
    tipos = ["INTEGER", "VARCHAR(40)", "DECIMAL", "DECIMAL", "DECIMAL"]

    ruta_archivo = StringVar()
    sector_size_var = StringVar(value="512")
    sector_count_var = StringVar(value="8")
    pistas_var = StringVar(value="4")
    platos_var = StringVar(value="2")
    termino_busqueda_var = StringVar()

    Label(root, text="Ruta del Archivo CSV:").pack(pady=5)
    Entry(root, textvariable=ruta_archivo, width=50).pack(pady=5)
    Button(root, text="Cargar Archivo", command=cargar_archivo).pack(pady=5)

    Button(root, text="Cargar Estructura TXT", command=cargar_estructura).pack(pady=5)

    Label(root, text="Tamaño del Sector (bytes):").pack(pady=5)
    Entry(root, textvariable=sector_size_var, width=10).pack(pady=5)

    Label(root, text="Cantidad de Sectores por Pista:").pack(pady=5)
    Entry(root, textvariable=sector_count_var, width=10).pack(pady=5)

    Label(root, text="Número de Pistas por Plato:").pack(pady=5)
    Entry(root, textvariable=pistas_var, width=10).pack(pady=5)

    Label(root, text="Número de Platos:").pack(pady=5)
    Entry(root, textvariable=platos_var, width=10).pack(pady=5)

    Button(root, text="Procesar y Visualizar Disco", command=procesar_disco).pack(pady=10)

    Label(root, text="Estado del Disco:").pack(pady=5)
    text_resultado = Text(root, width=80, height=20)
    text_resultado.pack(pady=5)

    Label(root, text="Buscar en el Disco:").pack(pady=5)
    Entry(root, textvariable=termino_busqueda_var, width=30).pack(pady=5)
    Button(root, text="Buscar", command=buscar_en_disco).pack(pady=5)

    root.mainloop()

if __name__ == "__main__":
    interfaz()
