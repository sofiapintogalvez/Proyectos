<?php
include("ValidarSesion.php");

$ubicacion="../img/" . $nickname . "/Perfil.jpg";
$archivo=$_FILES['archivo']['tmp_name'];

if(move_uploaded_file($archivo, $ubicacion)){
    echo "El archivo ha sido subido";
    header("Location: ../fotos.php");
}else{
    echo "Ha ocurrido un error, intente de nuevo!";
    echo "<a href='../fotos.php'>Volver</a>";
}
?>