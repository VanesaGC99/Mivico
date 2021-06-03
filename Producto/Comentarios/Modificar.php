<?php

    //Conexion a la base de datos
    require '../../PHP/ConectarBD.php';
    require '../../PHP/BD/DAOComentarios.php';
    $conexion = conectar();
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.goolgeapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../JS/jquery.min.js"></script>
    <title>Mivico</title>
</head>
<body>
    <header>
        <img src="../../IMAGE/imagenCorporativa.png" alt="Imagen inicio" class="imagenInicio">
    </header>
    <nav>
        <?php
        session_start();

            if(isset($_SESSION['Rol'])){
                if($_SESSION['Rol'] == 'Usuario'){
                    echo "<div class='navegacion_categoria'>
                        <div><a href='../../Usuario/Home.php'>Inicio</a></div>
                        <div><a href='../Producto/Producto.php'>Catálogo</a></div>
                    </div>
                    
                    <div class='navegacion_usuario'>
                    <div><a href='../../Usuario/Perfil/Perfil.php'> ". $_SESSION['Usuario']."</a></div>
                    <div>
                            <a href='../Usuario/Carrito/Carrito.php' class='carrito'>
                                <img src='../../IMAGE/shopping-cart-solid.svg' class='carritoImagen'>
                                Carrito
                            </a>
                        </div>
                    </div>";
                }
                else if($_SESSION['Rol'] == 'Administrador'){
                    echo "<div class='navegacion_categoria'>
                            <div><a href='../../Administrador/Home.php'>Inicio</a></div>
                            <div><a href='../../Producto/Producto.php'>Catálogo</a></div>
                          </div>
                          
                    
                    <div class='navegacion_usuario'>
                        <div><a href='../../Administrador/Gestion/menuGestion.php'> Menú gestión </a></div>
                        <div><a href='../../Usuario/Perfil/Desloguear.php'>Cerrar sesión</a></div>
                    </div>";
                }
                
            }
            else{
                echo "<div class='navegacion_categoria'>
                    <div><a href='../../'>Inicio</a></div>
                        <div><a href='../Producto.php'>Catálogo</a></div>
                    </div>
                    <div class='navegacion_usuario'>
                        <div><a href='../../IniciarSesion/IniciarSesion.html'>Iniciar Sesión</a></div>
                    </div>";
            }
        ?>
    </nav>
    <section>
        <?php
            $id=$_GET['id'];
            $comentario = buscarID($conexion, $id);

            while($fila = mysqli_fetch_array($comentario)){

        ?>
        <div class="apariencia ">
        <p><a href="../Producto.php">Catálogo</a>/ <a href="../Descripcion.php?id=<?php echo $fila['idProducto'];?>">Descripción</a>/ <a href="">Modificar</a></p>
        <div class="formulario">
                    <h2 class = "inicioH2 tituloPerfil">Editar</h2>
                    <hr>
                    <br>
                    <form action="ModificarComentario.php" method="post" id="formulario">
                        <fieldset>
                        <legend>Editar comentario</legend>
                        <p>En los comentarios se pueden poner máximo 500 caracteres: </p>
                        <textarea name="contenido" rows="3" style= "width: 100%;" maxlength="500"><?php echo $fila['Contenido'];?></textarea>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <br>
                        <input type="submit" name="botonComentario" id= "botonComentario" value="Enviar">
                        </fieldset>
                    </form>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div><a href="../Nosotros.php">Nosotros</a></div>
        <div><a href="../Contacto.php">Contacto</a></div>
        <div><a href="../SitioWeb.php">Sitio Web</a></div>
    </footer>
    <script type="text/javascript" src="../JS/menuComentarios.js"></script>
</body>
</html>