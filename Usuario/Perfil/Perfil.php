<?php
    session_start();

    if(empty($_SESSION['Rol'] == 'Usuario' || $_SESSION['Rol'] == 'usuario')){
        header("Location: ../../IniciarSesion/IniciarSesion.html");
    }

    require '../../PHP/ConectarBD.php';
    require '../../PHP/BD/DAOUsuario.php';
    $conexion = conectar();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
    <title>Mivico</title>
</head>
<body>
    <header>
        <img src="../../IMAGE/imagenCorporativa.png" alt="Imagen inicio" class="imagenInicio">
    </header>
    <nav>
        <div class="navegacion_categoria">
            <div class="seleccionado"><a>Inicio</a></div>
            <div><a href="../../Producto/Producto.php">Catálogo</a></div>
        </div>
        <div class="navegacion_usuario">
            <div><a href="Perfil.php"><?php echo $_SESSION['Usuario']; ?></a></div>
            <div>
                <a href="../Carrito/Carrito.php" class="carrito">
                    <img src="../../IMAGE/shopping-cart-solid.svg" class="carritoImagen">
                    Carrito
                </a>
            </div>
        </div>
    </nav>
    <section>
            <div class="apariencia flexible">
                <div class="menu">
                    <p><a class="seleccionado">Mi Perfil<a></p>
                    <p><a href="Editar.php">Editar</a></p>
                    <p><a href="Eliminar.php">Eliminar</a></p>
                    <p><a href="Desloguear.php">Cerrar sesión</a></p>
                </div>
                <div class="contenidoPerfil">
                <h2 class = "inicioH2 tituloPerfil">Mi Perfil</h2>
                <hr>
                    <?php
                        foreach($_SESSION as $atributo => $valor){
                            if($atributo == "Password"){
                                echo "<p><strong>$atributo</strong> ********* </p>";
                            }
                            else{
                                echo "<p><strong>$atributo </strong> $valor </p>";
                            }
                        }
                    ?>
                </div>
            </div>
        </section>
        <footer>
            <div><a href="../../Nosotros.php">Nosotros</a></div>
            <div><a href="../../Contacto.php">Contacto</a></div>
            <div><a href="../../SitioWeb.php">Sitio Web</a></div>
        </footer>
</body>
</html>