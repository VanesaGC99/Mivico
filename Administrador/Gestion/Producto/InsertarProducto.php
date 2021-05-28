<?php
    require '../../../PHP/ConectarBD.php';
    require '../../../PHP/BD/DAOProducto.php';
    $conexion = conectar();
    //Datos del formulario
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $imagen = $_FILES['imagen']['name'];
    $descripcion = $_POST['descripcion'];
    

    //Ruta de la carpeta destino
    $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/PHP/Mivico/IMAGE/productos/';

    $insertar = insertarProducto($conexion, $nombre, $tipo, $precio, $stock, $imagen, $descripcion);


    //mover la imagen del directorio temporal al server
    move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$imagen);
?>