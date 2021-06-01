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
            <h1 class="inicioH1">Editar usuario</h1>
            <p><a href="../menuGestion.php">Menú gestión</a><strong>/</strong><a href="../GestionUsuario.php">Gestión usuario</a><strong>/</strong><a href="EditarUsuario.php">Editar usuario</a></p>
            <br><br>
            <div class="formulario">
                <div>
                    <?php
                        if(isset($_GET['dni'])){
                            $dni = $_GET['dni'];
                            $usuario = buscarDNI($conexion, $dni);
                        
                            while($fila = mysqli_fetch_array($usuario)){

                    ?>
                    <form action="../../../Usuario/Perfil/Acciones/Editar.php" method="POST" id="formulario" autocomplete="off">
                        <label for="Nombre">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" autofocus value="<?php echo $fila['Nombre']?>">
                        <br><br>
                        <label for="Apellido1">Apellido 1: </label>
                        <input type="text" name="apellido1" id="apellido1" value="<?php echo $fila['Apellido1']?>">
                        <br><br>
                        <label for="Apellido2">Apellido 2: </label>
                        <input type="text" name="apellido2" id="apellido2" value="<?php echo $fila['Apellido2']?>">
                        <br><br>
                        <label for="DNI">DNI: </label>
                        <input type="text" name="dni" id="dni" value="<?php echo $fila['DNI']?>" readonly>
                        <br><br>
                        <label for="Usuario">Usuario: </label>
                        <input type="text" name="usuario" id="usuario" value="<?php echo $fila['Usuario']?>">
                        <br><br>
                        <label for="Password">Contraseña: </label>
                        <input type="password" name="password" id="password" value="<?php echo $fila['Password']?>">
                        <br><br>
                        <label for="rePassword">Repetir Contraseña: </label>
                        <input type="password" name="rePassword" id="rePassword" value="<?php echo $fila['Password']?>">
                        <br><br>
                        <label for="email">Email: </label>
                        <input type="email" name="email" id="email"  value="<?php echo $fila['Email']?>">
                        <br><br>
                        <label for="Telefono">Teléfono: </label>
                        <input type="text" name="telefono" id="telefono"  value="<?php echo $fila['Telefono']?>">
                        <br><br>
                        <label for="Direccion" >Dirección: </label>
                        <input type="text" name="direccion" id="direccion" style="overflow-x:auto;" value="<?php echo $fila['Dirección']?>">
                        <br><br>
                        <label for="CP">Código Postal: </label>
                        <input type="text" name="codigoP" id="codigoP" value="<?php echo $fila['CP']?>">
                        <br><br>
                        <label for="Provincia">Provincia: </label>
                        <input type="text" name="provincia" id="provincia" value="<?php echo $fila['Provincia']?>">
                        <br><br>
                        <label for="ComunidadAutonoma">Comunidad Autonóma: </label>
                        <input type="text" name="comunidadAutonoma" id="comunidadAutonoma" value="<?php echo $fila['ComunidadAutonoma']?>">
                        <br><br>
                        <label for="Rol">Administrador: </label>
                        <?php
                            if($fila['Rol'] == "Administrador"){
                        ?>
                            <input type="checkbox" name="rol" id="rol" checked>
                        <?php
                            }
                            else{
                        ?>
                            <input type="checkbox" name="rol" id="rol">
                        <?php
                            }
                        ?>
                        <br><br>
                        <input type="hidden" name="pagina" value="administracion">
                        <input type="hidden" name="idUsuario" value="<?php echo $fila['DNI'] ?>">
                        <input type="submit" value="Editar usuario" class="botonFormulario">
                    </form>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
        <footer>
            <div><a href="../../../Nosotros.php">Nosotros</a></div>
            <div><a href="../../../Contacto.php">Contacto</a></div>
            <div><a href="../../../SitioWeb.php">Sitio Web</a></div>
        </footer>
        <script src="../../../JS/Editar.js"></script>
</body>
</html>