<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.goolgeapis.com/css2?family=Caveat&display=swap" rel="stylesheet">
    <title>Mivico</title>
</head>
<body>
    <header>
        <img src="IMAGE/imagenCorporativa.png" alt="Imagen inicio" class="imagenInicio">
    </header>
    <nav>
        <?php
            session_start();

            if(isset($_SESSION['Rol'])){
                if($_SESSION['Rol'] == 'Usuario'){
                    echo "<div class='navegacion_categoria'>";
                    echo "<div><a href='Usuario/Home.php'>Inicio</a></div>";
                    echo "</div>";
                }
                else if($_SESSION['Rol'] == 'administrador'){
                    echo "<div class='navegacion_categoria'>";
                    echo "<div><a href='Usuario/Home.php'>Inicio</a></div>";
                    echo "</div>";
                }
                
            }
            else{

            }
        ?>
        <div class="navegacion_categoria">
            <div><a>Inicio</a></div>
        </div>
    </nav>
    <section>
        <div class="apariencia nosotros">
            <div><img src="IMAGE/logotipo.png" alt="Logotipo de Mivico" width="100%"></div>
            <div>
            <h2>¿Que es Mivico?</h2>
            <p>El nombre de <b>Mivico</b> proviene de <i>Mi vida eco</i>.</p>
            <p>Esta empresa se dedica a la creación y venta de productos naturales respetuosos con el medio ambiente y cero residuos, 
                tambien se pretende conseguir que sean accesibles a todo tipo de cliente</p>
            <h2>Misión</h2>
            <p>La misión de Mivico es proporcionar a las personas productos, con los que poder satisfacer los cuidados de su piel y cabello,
                que sean más sostenibles, libres de plásticos y con ingredientes naturales, por ende más saludable.</p>
            <h2>Visión</h2>
            <p>Como empresa queremos que todo tipo de cliente con todo tipo de bolsillo pueda tener acceso a nuestros productos y que estos 
                puedan solventar las necesidades de cada tipo de piel o cabello</p>
            </div>
        </div>
    </section>
    <footer>
        <div class="seleccionado"><a href="Nosotros.html">Nosotros</a></div>
        <div><a href="Contacto.html">Contacto</a></div>
        <div><a href="SitioWeb.html">Sitio Web</a></div>
    </footer>
</body>
</html>