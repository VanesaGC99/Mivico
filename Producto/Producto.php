<?php

    //Conexion a la base de datos
    require '../PHP/ConectarBD.php';
    $conexion = conectar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
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
                        <div><a href='Producto.php'>Catálogo</a></div>
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
        <div class="apariencia catalogo">
            <div>
                <div class="busqueda">
                    <form method= "POST">
                        <span>Buscar por categoría: </span>
                        <select name="filtro" id="filtro" onchange='submit()'>
                            <option value="ninguna">Busqueda</option>
                            <option value="todo">Todo</option>
                            <option value="Champú">Champú</option>
                            <option value="Jabón corporal">Jabón corporal</option>
                            <option value="Jabón facial">Jabón facial</option>
                            <option value="Mascarilla">Mascarilla</option>
                            <option value="Balsamo">Bálsamo</option>
                            <option value="Desmaquillante">Desmaquillante</option>
                            <option value="Acondicionador">Acondicionador</option>
                            <option value="Aceite">Aceite</option>
                            <option value="Colonia">Colonia</option>
                            <option value="Desodorante">Desodorante</option>
                        </select>
                    </form>
                </div>
            </div>
            <div>
            <?php

                if(isset($_POST['filtro'])){
                    $categoria = $_POST['filtro'];
                    if($categoria == "todo"){
                        $productos= "Select * from Producto";
                    }
                    else{
                        $productos= "Select * from Producto where Tipo = '$categoria'";
                    }
                    
                }
                else{
                    $productos= "Select * from Producto";
                }
                
                $query = mysqli_query($conexion, $productos);
                
                if(mysqli_num_rows($query) != 0){
                    while($fila = mysqli_fetch_array($query)){
                    $imagen = $fila['Imagen'];
                    $porcentaje = "70%";

                    echo "<a href='Descripcion.php?id=".$fila['idProducto']."'><div class='productos'>
                        <img src='../IMAGE/$imagen' width=$porcentaje height=$porcentaje>
                        <h3>".$fila['Nombre'] ."</h3>
                        <div class='contenedor'>
                        <p style='float:left;'> Precio: ".$fila['Precio']."</p>";

                        if(isset($_SESSION['Rol'])){
                            $likes = mysqli_query($conexion, "Select * from Likes where idProducto = '".$fila['idProducto']."' and DNI = '".$_SESSION['DNI']."'");
            
                            if(mysqli_num_rows($likes) == 0){
                                ?>
                                <button class='like aparienciaBoton' id=".$fila['idProducto']."><img src='../IMAGE/likes/like.png' width=10%> Me gusta </button></div>
                            <?php
                            }
                            else{
                            ?>
                                <button class='like aparienciaBoton' id=".$fila['idProducto']."><img src='../IMAGE/likes/dislike.png' width=10%> No me gusta </button></div>
                            <?php
                            }
                            ?>
                                <a href='Carrito.php'><button class='aparienciaBoton'>Añadir al carro</button></a>
                        <?php
                        }   
                        else{
                        ?>
                            
                            <button class='like aparienciaBoton' id=".$fila['idProducto']."><img src='../IMAGE/likes/like.png' width=10%> Me gusta </button></div>
                        <?php
                            echo "<abbr title='Para añadir productos al carrito debe iniciar sesión'>
                            <a href='Carrito.php'><button class='aparienciaBoton' disabled>Añadir al carro</button></a>
                            </abbr>";
                        }
                        
                    echo "</div></a>";
                    }
                }
                else{
                    echo "<h2 class = 'inicioH2'>Lo sentimos. En estos momentos no se han añadido productos de esta categoría.</h2>";

                }
                
                
            ?>
        </div>
    </section>
    <footer>
            <div><a href="../Nosotros.php">Nosotros</a></div>
            <div><a href="../Contacto.php">Contacto</a></div>
            <div><a href="../SitioWeb.php">Sitio Web</a></div>
        </footer>
    <script type='text/javascript' src='../JS/Likes.js'></script>
    
</body>
</html>