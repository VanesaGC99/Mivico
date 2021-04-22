<?php
    //Recoger 
    require '../../PHP/ConectarBD.php';

    $conexion = conectar();

    //Recoger datos

    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $dni = $_POST['dni'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $email =$_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $codigoP = $_POST['codigo'];
    $provincia = $_POST['provincia'];
    $comunidadA = $_POST['comunidadAutonoma'];

    $consultar = "Select * from Usuario Where DNI = '$dni' ";
?>