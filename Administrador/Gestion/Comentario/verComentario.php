<?php
    session_start();

    if(empty($_SESSION['Rol'] == 'Administrador' || $_SESSION['Rol'] == 'administrador')){
        header("Location: ../../IniciarSesion/IniciarSesion.html");
    }

    require '../../../PHP/ConectarBD.php';
    require '../../../PHP/BD/DAOComentarios.php';
    $conexion = conectar();

    $id = $_GET['id'];
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
                <p><a href="../menuGestion.php">Menú gestión</a><strong>/</strong><a href="../GestionComentario.php">Gestión comentario</a><strong>/</strong><a href="">Ver comentario</a></p>
                <br><br>
                <div class="verUsuario">
                
                    <?php
                        $buscar = buscarID($conexion, $id);

                        $fila = mysqli_fetch_assoc($buscar);

                        foreach($fila as $atributo => $valor){
                            echo "<p><strong>$atributo</strong>: $valor</p>";
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
