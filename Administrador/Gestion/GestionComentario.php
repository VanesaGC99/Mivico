<?php
    session_start();

    if(empty($_SESSION['Rol'] == 'Administrador' || $_SESSION['Rol'] == 'administrador')){
        header("Location: ../../IniciarSesion/IniciarSesion.html");
    }

    require '../../PHP/ConectarBD.php';
    require '../../PHP/BD/DAOComentarios.php';
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
            <h1 class = "inicioH1">Gestión comentarios</h1>
            <p><a href="menuGestion.php">Menú gestión</a><strong>/</strong><a href="GestionComentario.php">Gestión comentario</a></p>
            <br><br>
            <div class="busqueda">
                    <form method= "POST">
                        <span>Buscar por producto: </span>
                        <select name="filtro" id="filtro" onchange='submit()'>
                            <option value="ninguna">Busqueda</option>
                            <option value="todo">Todo</option>
                            <?php
                                $productos = catalogo($conexion, "todo");
                                
                                while($select  =  mysqli_fetch_array($productos)){
                                    echo "<option value='". $select['idProducto'] ."'>". $select['Nombre'] ."</option>";
                                }
                            ?>
                        </select>
                    </form>
                </div>
            <div  class="lista">
                <div>
                    <table>
                        <tr>
                            <td><strong>DNI</strong></td>
                            <td><strong>Producto</strong></td>
                            <td><strong>Fecha</strong></td>
                            <td><strong>Contenido</strong></td>
                        </tr>
                    <?php

                        if(isset($_POST['filtro'])){
                            $nombre = $_POST['filtro'];
                        }
                        else{
                            $nombre = "";
                        }


                        $lista = mostrarComentarios($conexion, $nombre);

                        while($fila = mysqli_fetch_array($lista)){
                            $miniComentario =  substr($fila['Contenido'], 0, 60);
                            ?>
                                <tr>
                                    <td><?php echo $fila['DNI']?></td>
                                    <?php
                                    $id = $fila['idProducto'];
                                    $buscar = buscarProducto($conexion, $id);

                                    $buscarProducto = mysqli_fetch_assoc($buscar);

                                    echo "<td> ".$buscarProducto['Nombre']."</td>";
                                    ?>
                                    <td><?php echo $fila['fechaComentario']?></td>
                                    <td><?php echo $miniComentario?></td>
                                    <td><a href="Comentario/verComentario.php?id=<?php echo $fila['idComentario'];?>">Ver</a></td>
                                    <td><a href="Comentario/eliminarComentario.php?id=<?php echo $fila['idComentario'];?>">Eliminar</a></td>
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
