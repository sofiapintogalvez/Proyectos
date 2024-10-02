<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Boogaloo|Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<title>LOCAL DE VICTOR</title>
<link href="todo.css" rel="stylesheet">
</head>
<body>
<div id="fondo"></div>
<div id="titulo">Guardados</div>
<ul>
<li><a href="Inicio.html">INICIO</a></li>
<li><a href="ubicanos.html">UBICANOS</a></li>
<li><a href="empleos.html">EMPLEOS</a></li>
<li><a href="productos.html">PRODUCTOS</a></li>
</ul><BR><BR>
<div id="respuesta">
<b>
<?php
$CLAVE=$_POST['codigo'];
if($CLAVE=="48648600"){
$fp=fopen("fichero2.txt","r");
while(!feof($fp)){
$linea=fgets($fp);
echo $linea. "<br/>";
}
fclose($fp);
}else {
echo "ACCESO DENEGADO";
}
?>
</b>
<div id="boton"><a href="codigo2.html">REGRESAR</a></div>
</div>
</body>
</html>