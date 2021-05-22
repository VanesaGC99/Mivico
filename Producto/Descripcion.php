<?php
    //Conexion a la base de datos
    require '../PHP/ConectarBD.php';
    $conexion = conectar();

    $id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.goolgeapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
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
                            <div><a href='Producto.php'>Catálogo</a></div>
                          </div>
                          
                    
                    <div class='navegacion_usuario'>
                        <div><a href='../Administrador/Gestion/menuGestion.php'>Gestión</a></div>
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

                $productos= "Select * from Producto Where idProducto = '$id'";

                $query = mysqli_query($conexion, $productos);

                while($fila = mysqli_fetch_array($query)){
                    
                ?>
                    <div class="flexible">
                        <div class="imagen"><img src="../IMAGE/<?php echo $fila['Imagen']; ?>"></div>
                        <div>
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
                <?php
                }
                if(isset($_SESSION['Rol'])){

                ?>
                <div class="comentario">
                    <form action="" method="post">
                        <fieldset>
                        <legend>Añadir comentario</legend>
                        <p>En los comentarios se pueden poner máximo 500 caracteres: </p>
                        <textarea name="contenido" rows="10" style= "width: 100%;" maxlength="500"></textarea>
                        <input type="hidden" name="dni" value="<?php echo $_SESSION['DNI'] ?>" id="dni">
                        <input type="hidden" name="producto" value="<?php echo $id ?>" id="producto">
                        </fieldset>
                    </form>
                </div>
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
    <script src="../JS/comentario.js">
</body>
</html>