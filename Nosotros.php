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
        //Cambia la barra de navegación seegún sea usuario, administrador o un cliente no logueado.
            session_start();

            if(isset($_SESSION['Rol'])){
                if($_SESSION['Rol'] == 'Usuario'){
                    echo "<div class='navegacion_categoria'>
                        <div><a href='Usuario/Home.php'>Inicio</a></div>
                    </div>
                    
                    <div class='navegacion_usuario'>
                    <div><a href='Usuario/Perfil/Perfil.php'>".$_SESSION['Usuario']."</a></div>
                    <div>
                            <a href='Usuario/Carrito/Carrito.php' class='carrito'>
                                <img src='IMAGE/shopping-cart-solid.svg' width='30px'>
                                Carrito
                            </a>
                        </div>
                    </div>";
                }
                else if($_SESSION['Rol'] == 'administrador'){
                    echo "<div class='navegacion_categoria'>
                        <div><a href='Administrador/Home.php'>Inicio</a></div>
                    </div>
                    
                    <div class='navegacion_usuario'>
                        <div><a href='Administrador/Gestion/Gestion.php'>Gestión</a></div>
                    </div>";
                }
                
            }
            else{
                echo "<div class='navegacion_categoria'>";
                echo "<div><a href='index.php'>Inicio</a></div>";
                echo "</div>";
            }
        ?>
    </nav>
    <section>
        <div class="apariencia flexible">
            <div class="imagen"><img src="IMAGE/logotipo.png" alt="Logotipo de Mivico" width="60%"></div>
            <div>
            <h2>¿Que es Mivico?</h2>
            <p>El nombre de <b>Mivico</b> proviene de <i>Mi vida eco</i>.</p>
            <p>Esta empresa se dedica a la creación y venta de productos naturales respetuosos con el medio ambiente y cero residuos, 
                también se pretende conseguir que sean accesibles a todo tipo de cliente.</p>
            <h2>Misión</h2>
            <p>La misión de Mivico es proporcionar a las personas productos, con los que poder satisfacer los cuidados de su piel y cabello,
                que sean más sostenibles, libres de plásticos y con ingredientes naturales, por ende más saludable.</p>
            <h2>Visión</h2>
            <p>Como empresa queremos que todo tipo de cliente con todo tipo de bolsillo pueda tener acceso a nuestros productos y que estos 
                puedan solventar las necesidades de cada tipo de piel o cabello.</p>
            </div>
        </div>
    </section>
    <footer>
        <div class="seleccionado"><a href="Nosotros.php">Nosotros</a></div>
        <div><a href="Contacto.php">Contacto</a></div>
        <div><a href="SitioWeb.php">Sitio Web</a></div>
    </footer>
</body>
</html>