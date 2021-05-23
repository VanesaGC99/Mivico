<?php

    //Conexión
    require "../ConectarBD.php";
    require "../BD/DAOComentarios.php";
    $conexion = conectar();

    //Recoge los datos
    $usuario= $_POST['dni'];
    $contenido=$_POST['contenido'];
    $producto =$_POST['producto'];
    $fecha = date('d') ."/".date('m')."/".date('Y')." ".date('H'). ":" .date('i');
    
    $insertarComentario= insertarComentario($conexion, $usuario, $contenido, $producto, $fecha);

    if($insertarComentario){
        header('Location: ../../Producto/Descripcion.php?id='.$producto);
    }
    else{
        header('Location: ../../Producto/Descripcion.php?id='.$producto);
    }

?>