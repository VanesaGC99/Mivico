<?php
    //Conexion a la base de datos
    require '../PHP/ConectarBD.php';
    require '../PHP/BD/DAOProducto.php';
    require '../PHP/BD/DAOComentarios.php';
    require '../PHP/BD/DAOUsuario.php';
    $conexion = conectar();
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.goolgeapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js" type="text/javascript"></script>
    <title>Mivico</title>
</head>
<body>
    <header>
        <img src="../IMAGE/imagenCorporativa.png" alt="Imagen inicio" class="imagenInicio">
    </header>
    <nav>
    <?php
        //Cambia la barra de navegación seegún sea usuario, administrador o un cliente no logueado.
            session_start();

            if(isset($_SESSION['Rol'])){
                if($_SESSION['Rol'] == 'Usuario'){
                    echo "<div class='navegacion_categoria'>
                        <div><a href='../Usuario/Home.php'>Inicio</a></div>
                        <div><a href='../Producto/Producto.php'>Catálogo</a></div>
                    </div>
                    
                    <div class='navegacion_usuario'>
                    <div><a href='../Usuario/Perfil/Perfil.php'> ". $_SESSION['Usuario']."</a></div>
                    <div>
                            <a href='Carrito/Carrito.php' class='carrito'>
                                <img src='../IMAGE/shopping-cart-solid.svg' width='30px'>
                                Carrito
                            </a>
                        </div>
                    </div>";
                }
                else if($_SESSION['Rol'] == 'Administrador'){
                    echo "<div class='navegacion_categoria'>
                            <div><a href='../Administrador/Home.php'>Inicio</a></div>
                            <div><a href='../Producto/Producto.php'>Catálogo</a></div>
                          </div>
                          
                    
                    <div class='navegacion_usuario'>
                        <div><a href='../Administrador/Gestion/menuGestion.php'> Menú gestión </a></div>
                        <div><a href='../Usuario/Perfil/Desloguear.php'>Cerrar sesión</a></div>
                    </div>";
                }
                
            }
            else{
                echo "<div class='navegacion_categoria'>
                    <div><a href='../'>Inicio</a></div>
                        <div><a href='Producto.php'>Catálogo</a></div>
                    </div>
                    <div class='navegacion_usuario'>
                        <div><a href='../IniciarSesion/IniciarSesion.html'>Iniciar Sesión</a></div>
                    </div>";
            }
        ?>
    </nav>
    <section>
        
        <div class="apariencia">
        <p><a href="Producto.php">Catálogo</a> / <a href="">Descripción</a></p>
                <?php

                //si recoge el id 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                
                $query = buscarProducto($conexion, $id);

                while($fila = mysqli_fetch_array($query)){
                    
                ?>
                    <div class="flexible">
                        <div class="imagen"><img src="../IMAGE/<?php echo $fila['Imagen']; ?>"></div>
                        <div style="margin:auto;">
                            <h2><?php echo $fila['Nombre']; ?></h2>
                            <p><strong>Tipo: </strong><?php echo $fila['Tipo']; ?></p>
                            <p><strong>Precio: </strong> <?php echo $fila['Precio']; ?></p>
                            <p><strong>Stock: </strong> <?php echo $fila['Stock']; ?></p>
                            <p><strong>Likes: </strong> <?php echo $fila['likes']; ?></p>
                        </div>
                    </div>
                    <div class="descripcion">
                        <p><strong>Descripción: </strong></p>
                        <p> <?php echo nl2br($fila['Descripcion']); ?></p>
                    </div>
                    <div class="contenidoComentarios">
                        <div>
                        <?php
                        }
                        if(isset($_SESSION['Rol'])){

                        ?>
                    
                            <div class="comentario">

                                <div>
                                <form action="../PHP/Funciones/Comentarios.php" method="post" id="formulario">
                                    <fieldset>
                                    <legend>Añadir comentario</legend>
                                    <p>En los comentarios se pueden poner máximo 500 caracteres: </p>
                                    <textarea name="contenido" rows="3" style= "width: 100%;" maxlength="500"></textarea>
                                    <input type="hidden" name="dni" value="<?php echo $_SESSION['DNI'] ?>" id="dni">
                                    <input type="hidden" name="producto" value="<?php echo $id ?>" id="producto">
                                    <br>
                                    <input type="submit" name="botonComentario" id= "botonComentario" value="Enviar">
                                    </fieldset>
                                </form>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        
                            <div class="comentario">
                                <div>
                                <button class="verComentario">Ver comentarios</button>
                                <br>
                                    <div id="mostrarComentarios" style="display:none">
                                    <?php
                                        //Mostrar comentarios

                                            
                                            $comentarios = mostrarComentarios($conexion);

                                            while($comentario = mysqli_fetch_array($comentarios)){

                                                $nombreUsuario = buscarDNI($conexion, $comentario['DNI']);
                                                
                                                $nombre = mysqli_fetch_assoc($nombreUsuario);
                                            ?>
                                            <div>

                                                <div class="texto">
                                                <p><strong><?php echo $nombre['Usuario']; ?></strong></p>
                                                <p><?php echo $comentario['fechaComentario']; ?></p>
                                                <p><?php echo $comentario['Contenido']; ?></p>
                                                </div>

                                                <!-- Menu de opciones para los comentarios -->
                                                <div class="Menu">
                                                    <div class="titulo botonMenu">
                                                    <p>Opciones</p>
                                                    </div>
                                                    <div class="contenidoMenu">
                                                        <ul>
                                                            <li><a href="Comentario/ModificarComentario.php">Modificar</a></li>
                                                            <li><a href="Comentario/EliminarComentario.php">Eliminar</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            
                                            }
                                        
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                else{
                    ?>
                    <h1 class = 'inicioH1'>Lo sentimos, ha habido un error al cargar la página.</h1>
                    <h2 class = 'inicioH2'>Vuelva al <a href="Producto.php">catálogo</a> para ver algún otro producto.</h2>
                    <?php
                }
                ?>
        </div>
    </section>
    <footer>
        <div><a href="../Nosotros.php">Nosotros</a></div>
        <div><a href="../Contacto.php">Contacto</a></div>
        <div><a href="../SitioWeb.php">Sitio Web</a></div>
    </footer>
    <script type='text/javascript' src="../JS/menuComentario.js"></script>
</body>
</html>