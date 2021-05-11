<?php
    session_start();

    if(empty($_SESSION['DNI'])){
        header("Location: ../IniciarSesion/IniciarSesion.html");
    }

    //Conexion a la base de datos
    require '../PHP/ConectarBD.php';
    $conexion = conectar();

    $id =$_POST['id'];
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
        <img src="../IMAGE/imagenCorporativa.png" alt="Imagen inicio" class="imagenInicio">
    </header>
    <nav>
        <div class="navegacion_categoria">
            <div><a href="../Usuario/Home.html">Inicio</a></div>
            <div><a href="Producto.php">Productos</a></div>
        </div>
        <div class="navegacion_usuario">
            <div><a href="../IniciarSesion/IniciarSesion.html">Iniciar Sesión</a></div>
        </div>
    </nav>
    <section>
        
        <div class="apariencia catalogo">
        <p><a href="Producto.php">Catálogo</a> / <a href="">Descripción</p>
            <?php

                $productos= "Select * from Producto Where idProducto = ''";

                $query = mysqli_query($conexion, $productos);
                $producto = mysqli_fetch_assoc();

                while($fila = mysqli_fetch_array($query)){
                    
                    echo "<div>";
                    echo "<p></p>";
                    echo "<div>";
                }
                
            ?>
        </div>
    </section>
</body>
</html>