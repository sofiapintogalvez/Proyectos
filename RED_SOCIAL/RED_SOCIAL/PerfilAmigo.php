<?php
include("php/conexion.php");
include("php/ValidarSesion.php");

$nicknameA=$_GET["nickname"];
include("php/DatosAmigo.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mi Perfil</title>
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
    <section id="miperfil">
        <img src="<?php echo "$fotoPerfilA";?>" alt="foto perfil">
        <h1><?php echo "$nombreA $apellidosA";?></h1>
        <p><?php echo "$descripcionA";?></p>
    </section>
    <section id="recuadros">
        <h2>Mis Amigos</h2>
        <?php
        $consulta="SELECT * FROM persona p WHERE p.Nickname IN (SELECT a.Nickname2 FROM amistad a WHERE a.Nickname1='$nicknameA') LIMIT 3";
        $datos=mysqli_query($conexion, $consulta);
        while($fila=mysqli_fetch_array($datos)){
        ?>
        <section class="recuadro">
            <img src="<?php echo $fila['FotoPerfil'];?>" height="150px">
            <h2><?php echo $fila['Nombre'] . " " .$fila['Apellidos'];?></h2>
            <p class="parrafo"><?php echo $fila['Descripcion'];?></p>
            <a href="<?php echo "PerfilAmigo.php?nickname=".$fila['Nickname'];?>" class="boton">Ver Perfil</a><br><br>
        </section>
        <?php }?>
    </section>
    <section id="recuadros">
        <h2>Mis Fotos</h2>
        <?php
        $consulta="SELECT * FROM fotos f WHERE f.Nickname='$nicknameA' LIMIT 3";
        $datos=mysqli_query($conexion, $consulta);
        while($fila=mysqli_fetch_array($datos)){
        ?>
        <section class="recuadro">
            <img id="extra" src="<?php echo $fila['NombreFoto'];?>" height="200px" width="280px">
        </section>
        <?php }?>
    </section>
    <footer>
        <p>Copyright &copy; 2021, Sofía Pinto</p>
    </footer>
</body>
</html>