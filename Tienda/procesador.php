<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Boogaloo|Satisfy" rel="stylesheet">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>LOCAL DE VICTOR</title>
<link href="todo.css" rel="stylesheet">
</head>
<body>
<div id="fondo"></div>
<div id="titulo">¡Comprado!</div>
<ul>
<li><a href="Inicio.html">INICIO</a></li>
<li><a href="ubicanos.html">UBICANOS</a></li>
<li><a href="empleos.html">EMPLEOS</a></li>
<li><a href="productos.html">PRODUCTOS</a></li>
</ul><BR><BR><BR>
<div id="class">
<h3>
<?php
$NOMBRE=$_POST['variable1'];
$DIRECCION=$_POST['variable2'];
$PRODUCTOS=$_POST['variable3'];
$CANTIDAD=$_POST['variable4'];
$fp=fopen("fichero.txt","a");
     fputs($fp,"Nombre: $NOMBRE");
fputs($fp,"\r\n");
     fputs($fp,"Direccion: $DIRECCION"); 
   fputs($fp,"\r\n");
fputs($fp,"Producto: $PRODUCTOS");
   fputs($fp,"\r\n");
fputs($fp,"Cantidad: $CANTIDAD");
   fputs($fp,"\r\n");
     fputs($fp,"**************");
fputs($fp,"\r\n");
        fclose($fp);
switch($PRODUCTOS){
    case 1:
$TOTAL=16*$CANTIDAD;
echo '<BR>¡Excelente '.$NOMBRE.', realizaste la operación con éxito!<BR>su dirección es '.$DIRECCION.',<BR>pidió '.$CANTIDAD.' Guaraná(s) que cuestan S/.16<BR>y el total a pagar sería de S/.'.$TOTAL.'.<BR>El pedido le llegará pronto, gracias por su compra y<BR>¡VISITENOS PRONTO!';
break;
    case 2:
$TOTAL=7*$CANTIDAD;
echo '<BR>¡Excelente '.$NOMBRE.', realizaste la operación con éxito!<BR>su dirección es '.$DIRECCION.',<BR>pidió '.$CANTIDAD.' Agua(s) que cuestan S/.12<BR>y el total a pagar sería de S/.'.$TOTAL.'.<BR>El pedido le llegará pronto, gracias por su compra y<BR>¡VISITENOS PRONTO!';
break;
    case 3:
$TOTAL=18*$CANTIDAD;
echo '<BR>¡Excelente '.$NOMBRE.', realizaste la operación con éxito!<BR>su dirección es '.$DIRECCION.',<BR>pidió '.$CANTIDAD.' Sprite(s) que cuestan S/.18<BR>y el total a pagar sería de S/.'.$TOTAL.'.<BR>El pedido le llegará pronto, gracias por su compra y<BR>¡VISITENOS PRONTO!';
break;
    case 4:
$TOTAL=15*$CANTIDAD;
echo '<BR>¡Excelente '.$NOMBRE.', realizaste la operación con éxito!<BR>su dirección es '.$DIRECCION.',<BR>pidió '.$CANTIDAD.' Inka Cola(s) que cuestan S/.15<BR>y el total a pagar sería de S/.'.$TOTAL.'.<BR>El pedido le llegará pronto, gracias por su compra y<BR>¡VISITENOS PRONTO!';
break;
    case 5:
$TOTAL=17*$CANTIDAD;
echo '<BR>¡Excelente '.$NOMBRE.', realizaste la operación con éxito!<BR>su dirección es '.$DIRECCION.',<BR>pidió '.$CANTIDAD.' Coca Cola(s) que cuestan S/.17<BR>y el total a pagar sería de S/.'.$TOTAL.'.<BR>El pedido le llegará pronto, gracias por su compra y<BR>¡VISITENOS PRONTO!';
break;
    case 6:
$TOTAL=13*$CANTIDAD;
echo '<BR>¡Excelente '.$NOMBRE.', realizaste la operación con éxito!<BR>su dirección es '.$DIRECCION.',<BR>pidió '.$CANTIDAD.' Socosani(s) que cuestan S/.13<BR>y el total a pagar sería de S/.'.$TOTAL.'.<BR>El pedido le llegará pronto, gracias por su compra y<BR>¡VISITENOS PRONTO!';
break;  
}
?>
</h3>
<BR><div id="boton2"><a href="comprar.html">REGRESAR</a></div>
<div id="boton3"><a href="codigo.html">.</a></div>
</div>
</body>
</html>