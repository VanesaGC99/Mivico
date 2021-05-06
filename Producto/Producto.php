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
        <img src="../IMAGE/imagenCorporativa.png" alt="Imagen inicio" class="imagenInicio">
    </header>
    <nav>
        <div class="navegacion_categoria">
            <div><a href="../Usuario/Home.html">Inicio</a></div>
            <div class="seleccionado"><a>Productos</a></div>
        </div>
        <div class="navegacion_usuario">
            <div><a href="../IniciarSesion/IniciarSesion.html">Iniciar Sesión</a></div>
        </div>
    </nav>
    <section>
        <div class="apariencia catalogo">
            <div class="busqueda">
                <span>Buscar producto: </span>
                <select name="filtro">
                    <option value="ninguna">Busqueda</option>
                    <option value="Champú">Champú</option>
                    <option value="Jabón corporal">Jabón corporal</option>
                    <option value="Jabón facial">Jabón facial</option>
                    <option value="Mascarilla">Mascarilla</option>
                    <option value="Balsamo">Bálsamo</option>
                    <option value="Desmaquillante">Desmaquillante</option>
                    <option value="Acondicionador">Acondicionador</option>
                    <option value="Aceite">Aceite</option>
                    <option value="Colonia">Colonia</option>
                    <option value="Desodorante">Desodorante</option>
                </select>
            </div>
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
                    echo "<a href='Carrito.php?id=><button disabled='true'>Añadir al carro</button></a>";
                    echo "</div>";
                }
                
            ?>
        </div>
    </section>
</body>
</html>