<?php

    //require
    require '../../../PHP/ConectarBD.php';
    require '../../../PHP/BD/DAOUsuario.php';
    $conexion = conectar();

    //recoger datos del formulario

    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $dni = $_POST['dni'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $email =$_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $codigoP = $_POST['codigoP'];
    $provincia = $_POST['provincia'];
    $comunidadA = $_POST['comunidadAutonoma'];

    //
    $modificar= modificarUsuario($conexion, $dni, $nombre, $apellido1, $apellido2, $usuario, $password, $email, $telefono, $direccion, $codigoP, $provincia, $comunidadA);
    
    if($modificar){
        if($_POST['pagina']=="registro"){
            
        }
        else if ($_POST['pagina'] == "administracion"){
            
        }
    }
    else{
        if($_POST['pagina']=="registro"){
            
        }
        else if ($_POST['pagina'] == "administracion"){
            
        }
    }

?>