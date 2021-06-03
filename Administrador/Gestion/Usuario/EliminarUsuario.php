<?php
    session_start();

    if(empty($_SESSION['Rol'] == 'Administrador' || $_SESSION['Rol'] == 'administrador')){
        header("Location: ../../../IniciarSesion/IniciarSesion.html");
    }

    require '../../../PHP/ConectarBD.php';
    require '../../../PHP/BD/DAOUsuario.php';
    $conexion = conectar();

    $dni=$_GET['dni'];
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
            <h1 class="inicioH1">Eliminar Usuario</h1>
            <p><a href="../menuGestion.php">Menú gestión</a><strong>/</strong><a href="../GestionUsuario.php">Gestión usuario</a><strong>/</strong><a href="EliminarUsuario.php">Eliminar usuario</a></p>
            <br><br>
            <div class="formulario">
                <div>
                <p id="mensaje"><strong>¿Desea eliminar su cuenta en Mivico?</strong></p>
                    <div id="confirmacion" style= "display:none;">
                        <p>
                            Al realizar esta acción los cambios serán permanentes, no podrá recuperar su cuenta
                            después de realizar esta acción.
                        </p>
                        <p>¿Esta seguro/a?</p>
                        <form action="../../../Usuario/Perfil/Acciones/Eliminar.php" method="POST">
                            <input type="hidden" name="dni" value="<?php echo $dni; ?>">
                            <input type="hidden" name="pagina" value="administracion">
                            <button class="aparienciaBoton" onclick="location.href='Acciones/Eliminar.php'">Eliminar cuenta</buton>
                        </form>
                    </div>
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
        <script>
            $('#mensaje').click(function(){
                var x = document.getElementById("confirmacion");

                if(x.style.display === "none"){
                    x.style.display = "block";
                }else{
                    x.style.display = "none";
                }
            });
        </script>
</body>
</html>