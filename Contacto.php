<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
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
                        <div><a href=''>Gestión</a></div>
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
                <h2>Contacto</h2>
                <p>En <strong>Mivico</strong> disponemos de un correo el cual se revisa diariamente.</p>
                <p><strong>Correo electronico: </strong> contacto.mivico@gmail.com</p>
                <p>Aquí puedes enviar un mensaje a nuestro correo, al que te responderemos lo antes posible:</p>
                <div>
                <br>
                <form action="PHP/Funciones/envioCorreo.php" method="POST">
                    <fieldset>
                        <label for="correoCliente">Tu correo: </label>
                        <?php
                        if(isset($_SESSION['Rol'])){
                            echo "<input type='text' name='correoCliente' id='correoCliente' value = '".$_SESSION['Email']."'>";
                        }
                        else{
                            echo "<input type='text' name='correoCliente' id='correoCliente'>";
                        }
                        ?>
                        <br>
                        <label>Asunto: </label>
                        <select name="asunto">
                            <option value="seleccion">Selecciona una opcion</option>
                            <option value="atencionCliente">Atencion al cliente</option>
                            <option value="problema">Problema</option>
                            <option value="otro">Otro</option>
                        </select>
                        <label>Contenido del email: </label><br>
                        <textarea name="contenido" rows="10" style= "width: 100%;"></textarea>
                        <input type="submit" name="enviarCorreo" id="enviarCorreo" value="Enivar">
                    </fieldset>
                </form>
            </div>
            </div>
        </div>
        
    </section>
    <footer>
        <div><a href="Nosotros.php">Nosotros</a></div>
        <div><a href="Contacto.php">Contacto</a></div>
        <div><a href="SitioWeb.php">Sitio Web</a></div>
    </footer>
</body>
</html>