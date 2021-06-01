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
                    <p><a href="Perfil.php">Mi Perfil<a></p>
                    <p><a class="seleccionado">Editar</a></p>
                    <p><a href="Eliminar.php">Eliminar</a></p>
                    <p><a href="Desloguear.php">Cerrar sesión</a></p>
                </div>
                <div class="contenidoPerfil">
                    <h2 class = "inicioH2 tituloPerfil">Editar</h2>
                    <hr>
                    <br>
                    <form action="Acciones/Editar.php" method="POST" id="formulario">
                        <label for="Nombre">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" value='<?php echo $_SESSION['Nombre']?>'>
                        <br><br>
                        <label for="Apellido1">Apellido 1: </label>
                        <input type="text" name="apellido1" id="apellido1" value='<?php echo $_SESSION['Apellido1']?>'>
                        <br><br>
                        <label for="Apellido2">Apellido 2: </label>
                        <input type="text" name="apellido2" id="apellido2" value='<?php echo $_SESSION['Apellido2']?>'>
                        <br><br>
                        <label for="DNI">DNI: </label>
                        <abbr title="No se puede modificar el DNI, puesto que es un campo clave" >
                            <input type="text" name="dni" id="dni" value='<?php echo $_SESSION['DNI']?>' readonly>
                        </abbr>
                        <br><br>
                        <label for="Usuario">Usuario: </label>
                        <input type="text" name="usuario" id="usuario" value='<?php echo $_SESSION['Usuario']?>'>
                        <br><br>
                        <label for="Password">Contraseña: </label>
                        <input type="password" name="password" id="password" value='<?php echo $_SESSION['Password']?>'>
                        <br><br>
                        <label for="rePassword">Repetir Contraseña: </label>
                        <input type="password" name="rePassword" id="rePassword" value='<?php echo $_SESSION['Password']?>'>
                        <br><br>
                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email" value='<?php echo $_SESSION['Email']?>'>
                        <br><br>
                        <label for="Telefono">Teléfono: </label>
                        <input type="text" name="telefono" id="telefono" value='<?php echo $_SESSION['Telefono']?>'>
                        <br><br>
                        <label for="Direccion">Dirección: </label>
                        <input type="text" name="direccion" id="direccion" value='<?php echo $_SESSION['Dirección']?>'>
                        <br><br>
                        <label for="CP">Código Postal: </label>
                        <input type="text" name="codigoP" id="codigoP" value='<?php echo $_SESSION['CP']?>'>
                        <br><br>
                        <label for="Provincia">Provincia: </label>
                        <input type="text" name="provincia" id="provincia" value='<?php echo $_SESSION['Provincia']?>'>
                        <br><br>
                        <label for="ComunidadAutonoma">Comunidad Autonóma: </label>
                        <input type="text" name="comunidadAutonoma" id="comunidadAutonoma" value='<?php echo $_SESSION['ComunidadAutonoma']?>'>
                        <br><br>
                        <input type="hidden" name="pagina" value="registro">
                        <input type="hidden" name="idUsuario" value="<?php echo $_SESSION['DNI'] ?>">
                        <input type="submit" value="Moificar datos" class="botonFormulario" name>
                    </form>
                </div>
            </div>
        </section>
        <footer>
            <div><a href="../../Nosotros.php">Nosotros</a></div>
            <div><a href="../../Contacto.php">Contacto</a></div>
            <div><a href="../../SitioWeb.php">Sitio Web</a></div>
        </footer>
        <script src="../../JS/Editar.js"></script>
</body>
</html>
