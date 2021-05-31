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
    <section class="centrarContenido">
        <div class="apariencia">
            <h1 class="inicioH1">Añadir usuario</h1>
            <p><a href="../menuGestion.php">Menú gestión</a><strong>/</strong><a href="../GestionUsuario.php">Gestión usuario</a><strong>/</strong><a href="AñadirUsuario.php">Añadir usuario</a></p>
            <br><br>
            <div class="formulario">
                <div>
                    <form action="../../../IniciarSesion/Registrarse/Registrarse.php" method="POST" id="formulario" autocomplete="off">
                        <label for="Nombre">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" autofocus >
                        <br><br>
                        <label for="Apellido1">Apellido 1: </label>
                        <input type="text" name="apellido1" id="apellido1">
                        <br><br>
                        <label for="Apellido2">Apellido 2: </label>
                        <input type="text" name="apellido2" id="apellido2">
                        <br><br>
                        <label for="DNI">DNI: </label>
                        <input type="text" name="dni" id="dni">
                        <br><br>
                        <label for="Usuario">Usuario: </label>
                        <input type="text" name="usuario" id="usuario">
                        <br><br>
                        <label for="Password">Contraseña: </label>
                        <input type="password" name="password" id="password">
                        <br><br>
                        <label for="rePassword">Repetir Contraseña: </label>
                        <input type="password" name="rePassword" id="rePassword">
                        <br><br>
                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email">
                        <br><br>
                        <label for="Telefono">Teléfono: </label>
                        <input type="text" name="telefono" id="telefono">
                        <br><br>
                        <label for="Direccion">Dirección: </label>
                        <input type="text" name="direccion" id="direccion">
                        <br><br>
                        <label for="CP">Código Postal: </label>
                        <input type="text" name="codigoP" id="codigoP">
                        <br><br>
                        <label for="Provincia">Provincia: </label>
                        <input type="text" name="provincia" id="provincia">
                        <br><br>
                        <label for="ComunidadAutonoma">Comunidad Autonóma: </label>
                        <input type="text" name="comunidadAutonoma" id="comunidadAutonoma">
                        <br><br>
                        <input type="hidden" name="pagina" value="administracion">
                        <input type="submit" value="Añadir usuario" class="botonFormulario">
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
        <script src="../../../JS/formularios.js"></script>
        
</body>
</html>