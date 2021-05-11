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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
    <title>Mivico</title>
</head>
<body>
    <header>
        <img src="../IMAGE/imagenCorporativa.png" alt="Imagen inicio" class="imagenInicio">
    </header>
    <nav>
        <div class="navegacion_categoria">
            <div><a href="../Usuario/Home.php">Inicio</a></div>
            <div class="seleccionado"><a>Catálogo</a></div>
        </div>
        <div class="navegacion_usuario">
            <div><a href="../IniciarSesion/IniciarSesion.html">Iniciar Sesión</a></div>
        </div>
    </nav>
    <section>
        <div class="apariencia catalogo">
            <div class="busqueda">
                <span>Buscar por categoría: </span>
                <form method= "POST">
                    <select name="filtro" id="filtro">
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
                </form>
            </div>
            <?php

                $select = $_POST['valor'];
                echo $select;
                $productos= "Select * from Producto";

                $query = mysqli_query($conexion, $productos);

                while($fila = mysqli_fetch_array($query)){
                    $imagen = $fila['Imagen'];
                    $porcentaje = "60%";
                    echo "<div class='productos'>";
                    echo " <img src='../IMAGE/$imagen' width=$porcentaje height=$porcentaje>";
                    echo "<h3>".$fila['Nombre'] ."</h3>";
                    echo "<p>".$fila['Precio']."</p>";
                    
                    $likes = mysqli_query($conexion, "Select * from Likes where idProducto = '".$fila['idProducto']."' and DNI = '".$_SESSION['DNI']."'");
        
                    if(mysqli_num_rows($likes) == 0){
                        echo "<div class='contenedor'><a href='Descripcion.php?id=".$fila['idProducto']."'>Info.</a> <button class='like' id=".$fila['idProducto']."><img src='../IMAGE/likes/like.png' width=10%> Me gusta </button></div>";
                    }
                    else{
                        echo "<div class='contenedor'><a href='Descripcion.php?id=".$fila['idProducto']."'>Info.</a> <button class='like' id=".$fila['idProducto']."><img src='../IMAGE/likes/dislike.png' width=10%> No me gusta </button></div>";
                    }
                    
                    echo "<a href='Carrito.php'><button class='aparienciaBoton'>Añadir al carro</button></a>";
                    echo "</div>";
                }
                
            ?>
        </div>
    </section>
    <footer>
            <div><a href="../Nosotros.html">Nosotros</a></div>
            <div><a href="../Contacto.html">Contacto</a></div>
            <div><a href="../SitioWeb.html">Sitio Web</a></div>
        </footer>
    <script type='text/javascript' src='../JS/Likes.js'></script>
    
</body>
</html>