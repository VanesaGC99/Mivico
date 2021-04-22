<?php
    session_start();

    if(empty($_SESSION['idUsuario'])){
        header("Location: ../IniciarSesion/IniciarSesion.html");
    }

    //Conexion a la base de datos
    require 'ConectarBD.php';
    $conexion = conectar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.goolgeapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <title>Mivico</title>
</head>
<body>
    <header>
        <img src="IMAGE/fondo.png" alt="Imagen inicio" class="imagenInicio">
    </header>
    <nav>
        <div class="navegacion_categoria">
            <div><a href="../index.html">Inicio</a></div>
            <div><a href="">Productos</a></div>
        </div>
        <div class="navegacion_usuario">
            <div><a href="../IniciarSesion/IniciarSesion.html">Iniciar Sesión</a></div>
        </div>
    </nav>
    <section class="productos">
        <?php

            $productos= "Select * from Producto";

            $query = mysqli_query($conexion, $productos);

            while(mysqli_num_rows($query)){
                echo "<div>";
                echo ""; 
                echo "</div>";
            }
        ?>
    </section>
</body>
</html>