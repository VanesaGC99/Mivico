<?php
    require 'PHP/ConectarBD.php';
    $conexion = conectar();

?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/estilos.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.goolgeapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
        <title>Mivico</title>
    </head>
    <body>
        <header>
            <img src="IMAGE/fondo.png" alt="Imagen inicio" class="imagenInicio">
        </header>
        <nav>
            <div class="navegacion_categoria">
                <div class="seleccionado"><a>Inicio</a></div>
            </div>
            <div class="navegacion_usuario">
                <div><a href="IniciarSesion/IniciarSesion.html">Iniciar Sesión</a></div>
            </div>
        </nav>
        <section >
            <div class="aparienciaSeccion">
                <h1 class = "inicioH1">Bienvenido a Mivico</h1>
                <h2 class = "inicioH2">En esta página web podras encontrar productos naturales respetuosos con el medio ambiente</h2>
                <br><br>
                <div class="slidershow">
                    <div class="left">
                        <img src="IMAGE/slider/flecha-izquierda.png" width="50" >
                    </div>
                    <div id="slider">
                        <?php
                            //Tamaño de las imagenes del slider
                            $tamaño= "100%";
                            foreach(arrayImagenes($conexion) as $valor){
                                echo "<img src='IMAGE/$valor' width=$tamaño>";
                            }
                        ?>
                    </div>
                    <div class="right">
                        <img src="IMAGE/slider/flecha-derecha.png" width="50" >
                    </div>
                </div>
            </div>
        </section>
    </body>
    <script src='JS/Slider.js'></script>
    </html>

<?php
    //Funcion para hacer un array con 4 imagenes aleatorias de la base de datos
    
    function arrayImagenes($conexion){
        $arrayImagenes = [];
        $consulta = "Select * from Producto ORDER BY RAND() LIMIT 4";
        $imagenes = mysqli_query($conexion, $consulta);
        $i = 0;
        
        while($fila = mysqli_fetch_array($imagenes)){    
            $arrayImagenes[$i] = $fila['Imagen'];
            $i++;
       }

       return $arrayImagenes;
    }
?>