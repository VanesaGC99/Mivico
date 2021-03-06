<?php
    session_start();

    if(empty($_SESSION['Rol'] == 'Administrador' || $_SESSION['Rol'] == 'administrador')){
        header("Location: ../IniciarSesion/IniciarSesion.html");
    }

    require '../PHP/ConectarBD.php';
    require '../PHP/BD/DAOProducto.php';
    $conexion = conectar();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
    <script href="JS/jquery-3.6.0.min.js"></script>
    <title>Mivico</title>
</head>
<body>
    <header>
        <img src="../IMAGE/imagenCorporativa.png" alt="Imagen inicio" class="imagenInicio">
    </header>
    <nav>
        <div class="navegacion_categoria">
            <div class="seleccionado"><a>Inicio</a></div>
            <div><a href="../Producto/Producto.php">Catálogo</a></div>
        </div>
        <div class="navegacion_usuario">
            <div><a href="Gestion/menuGestion.php"> Menú gestión </a></div>
            <div><a href="../Usuario/Perfil/Desloguear.php">Cerrar sesión</a></div>
        </div>
    </nav>
    <section>
            <div class="apariencia">
                <h1 class = "inicioH1">¡Bienvenido a Mivico!</h1>
                <h2 class = "inicioH2">En esta página web podras encontrar productos naturales respetuosos con el medio ambiente</h2>
                <br><br>
                <div class="slidershow">

                    <div class="left">
                        <img src="../IMAGE/slider/flecha-izquierda.png" width="50" >
                    </div>

                    <div id="slider">
                        <?php
                            //Tamaño de las imagenes del slider
                            $tamaño= "100%";
                            foreach(arrayImagenes($conexion) as $valor){
                                echo "<img src='../IMAGE/$valor' width=$tamaño>";
                            }
                        ?>
                    </div>

                    <div class="right">
                        <img src="../IMAGE/slider/flecha-derecha.png" width="50" >
                    </div>

                </div>
            </div>
        </section>
        <footer>
            <div><a href="../Nosotros.php">Nosotros</a></div>
            <div><a href="../Contacto.php">Contacto</a></div>
            <div><a href="../SitioWeb.php">Sitio Web</a></div>
        </footer>
        <script src='../JS/Slider.js'></script>
</body>
</html>