<?php 
include "productos_model.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMM Tienda de Ropa</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="icon" href="img/icono.ico">
</head>
<body>
<!-- Start Top Bar -->
<div class="top-bar" id="mainNavigation">
  <div class="top-bar-left">
    <ul class="menu vertical medium-horizontal">
      <img src="img/logo.png" width="65px">
      <a href="administrador.php">.</a>
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu vertical medium-horizontal">
    </ul>
  </div>
</div>
<!-- End Top Bar -->
<?php
if($_POST){
    if(insertar_cliente()){
   	 echo "Se registró correctamente";
    }else{
   	 echo " ";
    }
}
?>
    <section id="formulario">
        <p style="font-family:roman">
        <h2>Regístrate</h2>
        <form action="cliente.php" method="post" name="miform2">
            <p style="font-family:tahoma">
            Código Postal:<br>
            <select name="codpostal" required>
            <option value="1">J.L.B. y Rivero</option>
            <option value="2">Paucarpata</option>
            <option value="3">Selva Alegre</option>
            <option value="4">Cerro Colorado</option>
            <option value="5">Cayma</option>
            </select>
            Nombre:
            <input type="text" name="nombre" placeholder="Ingrese su nombre" required>
            Apellido:
            <input type="text" name="apellido" placeholder="Ingrese su apellido" required>
            DNI:
            <input type="text" name="dni" pattern="[a-zA-Z0-9]+" placeholder="Ingrese su DNI" required>
            Telefóno:
            <input type="text" name="telefono" pattern="[a-zA-Z0-9]+" placeholder="Ingrese su teléfono" required>
            Correo:
            <input type="email" name="correo" placeholder="Ingrese su correo" required>
            Clave:
            <input type="password" name="clave" autocomplete="new-password" placeholder="Ingrese su clave" required>
            Dirección:
            <input type="text" name="direccion" placeholder="Ingrese su dirección" required>
            Fecha de Nacimiento:
            <input type="date" name="fecha" required>
			Método de pago:
			<input type="text" name="met" placeholder="Ingrese su método de pago" required>
            Número de Tarjeta:
            <input type="number" name="tarjeta" placeholder="Ingrese su número de tarjeta" required>
            <input type="submit" name="enviar" class="boton" value="Regístrate">
            <input type="reset" class="boton" value="Borrar">
            <hr>
        </form>
    </section>
    <section id="formulario2">
             <p style="font-family:roman">
             <h2>Iniciar sesión</h2>
             <form name="contacto" method="post" action="IniciarSesion.php">
                <p style="font-family:tahoma">
                Correo:
                <input type="email" name="usuario" placeholder="Ingrese su correo" required>
                Contraseña:
                <input type="password" name="clave" autocomplete="off" placeholder="Ingrese su contraseña" required>
                <input type="submit" name="enviar" class="boton" value="Iniciar Sesión">
            </form>    
        </section>
    <footer>
    <p id="pie" style="font-family:tahoma">
    &copy; 2021, SAMM Todos los derechos reservados
    </p>
    </footer>
</body>
</html>