<?php
    session_start();

    if(empty($_SESSION['DNI'])){
        header("Location: ../IniciarSesion/IniciarSesion.html");
    }

    //Conexion a la base de datos
    require '../PHP/ConectarBD.php';
    $conexion = conectar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.goolgeapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <title>Mivico</title>
</head>
<body>
    <header>
        <img src="../IMAGE/fondo.png" alt="Imagen inicio" class="imagenInicio">
    </header>
    <nav>
        <div class="navegacion_categoria">
            <div><a href="../Usuario/Home.html">Inicio</a></div>
            <div><a href="">Productos</a></div>
        </div>
        <div class="navegacion_usuario">
            <div><a href="../IniciarSesion/IniciarSesion.html">Iniciar Sesión</a></div>
        </div>
    </nav>
    <section>
        <div class="aparienciaSeccion catalogo">
            <?php

                $productos= "Select * from Producto";

                $query = mysqli_query($conexion, $productos);

                while($fila = mysqli_fetch_array($query)){
                    $imagen = $fila['Imagen'];
                    $porcentaje = "60%";
                    echo "<div class='productos'>";
                    echo " <img src='../IMAGE/$imagen' width=$porcentaje height=$porcentaje>";
                    echo "<h3>".$fila['Nombre'] ."</h3>";
                    echo "<p>".$fila['Precio']."</p>";
                    echo "<p><a href=''>Info.</a></p>";
                    echo "</div>";
                }
                
            ?>
        </div>
    </section>
</body>
</html>