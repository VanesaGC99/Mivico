<?php
    session_start();

    if(empty($_SESSION['Rol'] == 'Usuario' || $_SESSION['Rol'] == 'usuario')){
        header("Location: ../../IniciarSesion/IniciarSesion.html");
    }
    session_destroy();
    header("Location: ../../");

?>
