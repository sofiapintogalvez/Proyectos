<?php 
include "productos_model.php";
?>
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="icon" href="img/icono.ico">
</head> 
<body>
<div class="top-bar" id="mainNavigation">
  <div class="top-bar-left">
    <ul class="menu vertical medium-horizontal">
      <img src="img/logo.png" width="65px">
    </ul>
  </div>
  <div class="top-bar-right">
    <ul class="menu vertical medium-horizontal">
        <a>
      <form action="administrador.php" method="post">
            <input type="text" name="buscar" placeholder="Buscar">
            <input type="image" src="img/buscar.png" id="sombra" width="50px">
      </form>
        </a>
      <a href="index.php"><img id="sombra" src="img/inicio.png" width="50px"></a>
    </ul>
  </div>
</div>
    <div class="titulo">
    <h3>ADMINISTRADOR</h3>
    </div>
<table id="tabla" border=2>
<tr>
<td id="negrita">Código Producto</td>
<td id="negrita">Marca</td>
<td id="negrita">Talla</td>
<td id="negrita">Color</td>
<td id="negrita">Categoría</td>
<td id="negrita">Producto</td>
<td id="negrita">Precio (S/.)</td>
<td id="negrita">Stock (und)</td>
<td id="negrita">Opciones</td>
</tr>
<?php
if($_POST){
    $resultado=obtener_producto($_POST["buscar"]);
}else{
    $resultado=obtener_producto();
}
while($row=mysqli_fetch_array($resultado)){?>
<tr>
<td><?php echo $row['codigo_producto'];?></td>
<td><?php echo $row['nombre_marca'];?></td>
<td><?php echo $row['nombre_talla'];?></td>
<td><?php echo $row['nombre_color'];?></td>
<td><?php echo $row['nombre_categoria'];?></td>
<td><?php echo $row['nombre_producto'];?></td>
<td><?php echo $row['precio'];?></td>
<td><?php echo $row['stock'];?></td>
<td><a href="editar_producto.php?cod=<?php echo $row['codigo_producto'];?>"><img src="img/lapiz.png" width="30px" height="30px"></a><a href="borrar_producto.php?codigo=<?php echo $row['codigo_producto'];?>"><img src="img/x.png" width="30px" height="30px"></a></td>
</tr>  
<?php }?>
</table>
<div class="titulo">
    <h3>CLIENTES</h3>
    </div>
<table id="tabla" border=2>
<tr>
<td id="negrita">Código Cliente</td>
<td id="negrita">Nombre</td>
<td id="negrita">Apellido</td>
<td id="negrita">DNI</td>
<td id="negrita">Teléfono</td>
<td id="negrita">Correo</td>
<td id="negrita">Dirección</td>
<td id="negrita">Fecha Nacimiento</td>
<td id="negrita">N° Tarjeta</td>
<td id="negrita">Clave</td>
</tr>
<?php
if($_POST){
    $resultado2=obtener_cliente($_POST["buscar"]);
}else{
    $resultado2=obtener_cliente();
}
while($row2=mysqli_fetch_array($resultado2)){?>
<tr>
<td><?php echo $row2['codigo_cliente'];?></td>
<td><?php echo $row2['nombre_cliente'];?></td>
<td><?php echo $row2['apellido_cliente'];?></td>
<td><?php echo $row2['dni'];?></td>
<td><?php echo $row2['telefono'];?></td>
<td><?php echo $row2['correo'];?></td>
<td><?php echo $row2['direccion'];?></td>
<td><?php echo $row2['fecha_nacimiento'];?></td>
<td><?php echo $row2['numero_tarjeta'];?></td>
<td><?php echo $row2['clave'];?></td>
</tr>  
<?php }?>
</table>
<div class="titulo">
    <h3>PEDIDOS</h3>
    </div>
<table id="tabla" border=2>
<tr>
<td id="negrita">Código Cliente</td>
<td id="negrita">Cliente</td>
<td id="negrita">Código Producto</td>
<td id="negrita">Producto</td>
<td id="negrita">Precio (S/.)</td>
<td id="negrita">Cantidad</td>
<td id="negrita">Fecha Pedido</td>
<td id="negrita">Fecha Entrega</td>
<td id="negrita">Estado</td>
</tr>
<?php
$consulta="SELECT * FROM producto pr INNER JOIN carrito c ON pr.codigo_producto=c.codigo_producto INNER JOIN pedido p ON c.codigo_pedido=p.codigo_pedido INNER JOIN cliente cl ON cl.codigo_cliente=p.codigo_cliente ORDER BY cl.codigo_cliente";
$datos=mysqli_query($link, $consulta);
while($fila=mysqli_fetch_array($datos)){
?>
<tr>
<td><?php echo $fila['codigo_cliente'];?></td>
<td><?php echo $fila['nombre_cliente'];?></td>
<td><?php echo $fila['codigo_producto'];?></td>
<td><?php echo $fila['nombre_producto'];?></td>
<td><?php echo $fila['precio'];?></td>
<td><?php echo $fila['cantidad'];?></td>
<td><?php echo $fila['fecha_pedido'];?></td>
<td><?php echo $fila['fecha_entrega'];?></td>
<td><?php echo $fila['estado_pedido'];?></td>
<?php }?>
</tr> 
</table>
<a href="ingresar_producto.php"><img id="compras" src="img/ingresar.png" width="150px"></a>
    <br>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</body>
</html>