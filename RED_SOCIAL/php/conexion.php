<?php
$servidor="localhost";
$usuario="root";
$contrasenha="";
$BD="red_social";
$conexion=mysqli_connect($servidor, $usuario, $contrasenha, $BD);
if(!$conexion){
    echo "Falló la conexión";
    echo "<br>";
    die("Connection failed: " . mysqli_connect_error());
}/*else{
    echo "Cenexión exitosa";
}*/
?>