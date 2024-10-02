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
<div id="titulo">¡Registrado!</div>
<ul>
<li><a href="Inicio.html">INICIO</a></li>
<li><a href="ubicanos.html">UBICANOS</a></li>
<li><a href="empleos.html">EMPLEOS</a></li>
<li><a href="productos.html">PRODUCTOS</a></li>
</ul><BR><BR><BR>
<div id="class">
<h3>
<?php
$NOMBRES=$_POST['variable1'];
$APELLIDOS=$_POST['variable2'];
$TELEFONO=$_POST['variable3'];
$CORREO=$_POST['variable4'];
$fp=fopen("fichero2.txt","a");
     fputs($fp,"Nombres: $NOMBRES");
fputs($fp,"\r\n");
     fputs($fp,"Apellidos: $APELLIDOS"); 
   fputs($fp,"\r\n");
fputs($fp,"Teléfono: $TELEFONO");
   fputs($fp,"\r\n");
fputs($fp,"Correo: $CORREO");
   fputs($fp,"\r\n");
     fputs($fp,"**************");
fputs($fp,"\r\n");
        fclose($fp);
    echo '<BR>Muy bien ' .$NOMBRES.', tus datos han sido <BR>registrados y en una semana te estaremos llamando<BR> o mandando un correo para que te hagamos la<BR> entrevista oficial y así puedas obtener el empleo.<BR> Gracias por interesarte en el trabajo, con mucha antención, el dueño.';
?>
</h3>
<BR><div id="boton2"><a href="inscripciones.html">REGRESAR</a></div>
<div id="boton3"><a href="codigo2.html">.</a></div>
</div>
</body>
</html>           