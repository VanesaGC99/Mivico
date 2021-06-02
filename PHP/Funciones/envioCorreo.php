<?php

    $correoCliente =$_POST['correoCliente'];
    $correoMivico = "contacto.mivico@gmail.com";
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['contenido'];
    $headers = "From: $correoCliente ";

    mail($correoMivico, $asunto, $mensaje, $headers);

    header('Location: ../../Contacto.php');
?>