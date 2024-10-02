<?php
include("php/conexion.php");
include("php/ValidarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Buscar</title>
    <meta charset="utf-8">
    <link href="css/estilo.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id="logo">
            <img src="img/logo.jpg" alt="logo">
        </div>
        <nav class="menu">
            <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="perfil.php">Mi Perfil</a></li>
            <li><a href="amigos.php">Mis Amigos</a></li>
            <li><a href="fotos.php">Mis Fotos</a></li>
            <li><a href="buscar.php">Buscar Amigos</a></li>
            <li><a href="php/CerrarSesion.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
   <section id="recuadros">
        <h2>Encuentra Nuevos Amigos</h2>
        <?php
        $consulta="SELECT * FROM persona p WHERE p.Nickname!='$nickname' AND p.Nickname NOT IN (SELECT a.Nickname2 FROM amistad a WHERE a.Nickname1='$nickname')";
        $datos=mysqli_query($conexion, $consulta);
        while($fila=mysqli_fetch_array($datos)){
        ?>
        <section class="recuadro">
            <img src="<?php echo $fila['FotoPerfil'];?>" height="150px">
            <h2><?php echo $fila['Nombre'] . " " .$fila['Apellidos'];?></h2>
            <p class="parrafo"><?php echo $fila['Descripcion'];?></p>
            <a href="<?php echo "PerfilAmigo.php?nickname=".$fila['Nickname'];?>" class="boton">Ver Perfil</a>
            <a href="<?php echo "php/AgregarAmigo.php?nickname=".$fila['Nickname'];?>" class="boton">Agregar</a><br><br>
        </section>
        <?php }?>
    </section>
    <footer>
        <p>Copyright &copy; 2021, Sofía Pinto</p>
    </footer>
</body>
</html>