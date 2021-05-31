<?php
    session_start();

    if(empty($_SESSION['Rol'] == 'Administrador' || $_SESSION['Rol'] == 'administrador')){
        header("Location: ../../IniciarSesion/IniciarSesion.html");
    }

    require '../../PHP/ConectarBD.php';
    require '../../PHP/BD/DAOProducto.php';
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
                <div><a href="../Home.php">Inicio</a></div>
                <div><a href="../../Producto/Producto.php">Catálogo</a></div>
            </div>
            <div class="navegacion_usuario">
                <div><a href="menuGestion.php"> Menú gestión</a></div>
                <div><a href="../../Usuario/Perfil/Desloguear.php">Cerrar sesión</a></div>
            </div>
        </nav>
        <section>
            <div class="apariencia">
                <h1 class = "inicioH1">Gestión producto</h1>
                <p><a href="menuGestion.php">Menú gestión</a><strong>/</strong><a href="GestionProducto.php.php">Gestión producto</a></p>
                <br><br>
                <div  class="lista">
                    <div>
                        <button class="aparienciaBoton" onclick="location.href='Producto/AñadirProducto.php'">Nuevo producto</button>
                        <br><br>
                        <table>
                            <tr>
                                <td><strong>idProducto</strong></td>
                                <td><strong>Nombre</strong></td>
                                <td><strong>Tipo</strong></td> 
                                <td><strong>Stock</strong></td>
                            </tr>
                        <?php
                            $lista = catalogo($conexion, "todo");

                            while($fila = mysqli_fetch_array($lista)){
                                ?>
                                    <tr>
                                        <td><?php echo $fila['idProducto']?></td>
                                        <td><?php echo $fila['Nombre']?></td>
                                        <td><?php echo $fila['Tipo']?></td>
                                        <td><?php echo $fila['Stock']?></td>
                                        <td><a href="../../Producto/Descripcion.php?id=<?php echo $fila['idProducto']?>">Ver</a></td>
                                        <td><a href="Producto/Editar.php">Editar</a></td>
                                        <td><a href="PRoducto/Eliminar.php">Eliminar</a></td>
                                    </tr>
                                <?php
                            }
                        ?>
                        </table>
                    </div>
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