<?php
    require '../../../PHP/ConectarBD.php';
    require '../../../PHP/BD/DAOProducto.php';
    $conexion = conectar();

    //Datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $imagen = $_FILES['imagen']['name'];
    $descripcion = $_POST['descripcion'];
    
    //Comapara imagen con la de la base de datos
    $producto =buscarProducto($conexion, $id);
    
    $producto = mysqli_fetch_array($producto);

    if($producto['Imagen'] != $imagen){
        unlink('../../../IMAGE/'.$producto['Imagen']);
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/PHP/Mivico/IMAGE/productos/';
        move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$imagen);
    }

    $modificar =  modificarProducto($conexion, $id, $nombre, $tipo, $precio, $stock, $imagen, $descripcion);

    if($modificar){
        header('Location: ../GestionProducto.php');
    }
    else{
        header('Location: AñadirProducto.php');
    }
?>