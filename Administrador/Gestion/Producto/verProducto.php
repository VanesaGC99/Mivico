<?php
    session_start();

    if(empty($_SESSION['Rol'] == 'Administrador' || $_SESSION['Rol'] == 'administrador')){
        header("Location: ../../../IniciarSesion/IniciarSesion.html");
    }

    require '../../../PHP/ConectarBD.php';
    require '../../../PHP/BD/DAOProducto.php';
    $conexion = conectar();

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../CSS/estilos.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
        <title>Mivico</title>
    </head>
    <body>
        <header>
            <img src="../../../IMAGE/imagenCorporativa.png" alt="Imagen inicio" class="imagenInicio">
        </header>
        <nav>
            <div class="navegacion_categoria">
                <div><a href="../../Home.php">Inicio</a></div>
                <div><a href="../../../Producto/Producto.php">Catálogo</a></div>
            </div>
            <div class="navegacion_usuario">
                <div><a href="../menuGestion.php"> Menú gestión</a></div>
                <div><a href="../../../Usuario/Perfil/Desloguear.php">Cerrar sesión</a></div>
            </div>
        </nav>
        <section>
            <div class="apariencia">
                <p><a href="../GestionProducto.php">Gestion producto</a> / <a href="">Ver producto</a></p>
                <?php

                //si recoge el id 
                    $id = $_GET['id'];
                
                $query = buscarProducto($conexion, $id);

                while($fila = mysqli_fetch_array($query)){
                    
                ?>
                <div class="flexible">
                    <div class="imagen"><img src="../../../IMAGE/<?php echo $fila['Imagen']; ?>"></div>
                    <div style="margin:auto;">
                        <h2><?php echo $fila['Nombre']; ?></h2>
                        <p><strong>Tipo: </strong><?php echo $fila['Tipo']; ?></p>
                        <p><strong>Precio: </strong> <?php echo $fila['Precio']; ?></p>
                        <p><strong>Stock: </strong> <?php echo $fila['Stock']; ?></p>
                        <p><strong>Likes: </strong> <?php echo $fila['likes']; ?></p>
                    </div>
                </div>
                <div class="descripcion">
                    <p><strong>Descripción: </strong></p>
                    <p> <?php echo nl2br($fila['Descripcion']); ?></p>
                </div>
                <?php
                }
                ?>
            </div>
        </section>
        <footer>
            <div><a href="../Nosotros.php">Nosotros</a></div>
            <div><a href="../Contacto.php">Contacto</a></div>
            <div><a href="../SitioWeb.php">Sitio Web</a></div>
        </footer>
        <script type="text/javascript" src="../JS/menuComentario.js"></script>
    </body>
</html>