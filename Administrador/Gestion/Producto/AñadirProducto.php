<?php
    session_start();

    if(empty($_SESSION['Rol'] == 'Administrador' || $_SESSION['Rol'] == 'administrador')){
        header("Location: ../../../IniciarSesion/IniciarSesion.html");
    }

    require '../../../PHP/ConectarBD.php';
    require '../../../PHP/BD/DAOUsuario.php';
    $conexion = conectar();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../CSS/estilos.css">
    <link rel="stylesheet" href="../../../CSS/richtext.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
    <title>Mivico</title>
    <script src="../../../JS/jquery.richtext.js"></script>
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
    <section class="centrarContenido">
        <div class="apariencia">
            <h1 class="inicioH1">Añadir usuario</h1>
            <p><a href="../menuGestion.php">Menú gestión</a><strong>/</strong><a href="../GestionProducto.php">Gestión producto</a><strong>/</strong><a href="AñadirProducto.php">Añadir producto</a></p>
            <br><br>
            <div class="formulario">
                <div>
                    <form action="InsertarProducto.php" method="POST" id="formulario" autocomplete="off" enctype="multipart/form-data">
                        <label for="Nombre">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" autofocus>
                        <br><br>
                        <label for="Tipo">Tipo: </label>
                        <input type="text" name="tipo" id="tipo">
                        <br><br>
                        <label for="Precio">Precio: </label>
                        <input type="text" name="precio" id="precio">
                        <br><br>
                        <label for="Stock">Stock: </label>
                        <input type="text" name="stock" id="stock">
                        <br><br>
                        <label for="Imagen">Imagen: </label>
                        <input type="file" name="imagen">
                        <br><br>
                        <label for="Descripcion">Descripcion: </label>
                        <input type="text" name="descripcion" id="richText">
                        <br><br>
                        <input type="submit" value="Añadir usuario" class="botonFormulario" name="boton">
                    </form>
                </div>
            </div>
        </div>
    </section>
        <footer>
            <div><a href="../../../Nosotros.php">Nosotros</a></div>
            <div><a href="../../../Contacto.php">Contacto</a></div>
            <div><a href="../../../SitioWeb.php">Sitio Web</a></div>
        </footer>
        <script src="../../../JS/richText.js"></script>
        <script src="../../../JS/formularios.js"></script>
</body>
</html>