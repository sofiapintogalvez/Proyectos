<?php
include("php/conexion.php");
include("php/ValidarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Fotos</title>
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
        <img src="<?php echo "$_SESSION[fotoperfil]";?>" alt="foto perfil">
        <h1><?php echo "$_SESSION[nombre] $_SESSION[apellidos]";?></h1>
        <form action="php/CambiarFoto.php" method="post" enctype="multipart/form-data">
        Cambiar foto de perfil: <input name="archivo" id="archivo" type="file" accept=".jpg, .jpeg, .png" required>
        <input type="submit" name="subir" value="Subir">
        </form>
    </section>
    <section id="recuadros">
        <h2>Mis Fotos</h2>
        <h3>
        <form action="php/SubirFoto.php" method="post" enctype="multipart/form-data">
        Añadir imagen: <input name="archivo" id="archivo" type="file" accept=".jpg, .jpeg, .png" required>
        <input type="submit" name="subir" value="Subir">
        </form>
        </h3>
        <?php
        $consulta="SELECT * FROM fotos f WHERE f.Nickname='$nickname'";
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