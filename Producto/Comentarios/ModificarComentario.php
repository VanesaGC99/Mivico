<?php
    require '../../PHP/ConectarBD.php';
    require '../../PHP/BD/DAOComentarios.php';
    $conexion = conectar();

    $id=$_POST['id'];
    $contenido = $_POST['contenido'];
    $fecha = date('d') ."/".date('m')."/".date('Y')." ".date('H'). ":" .date('i');

    $comentario = modificarComentario($conexion, $id, $contenido, $fecha);

    if($comentario){
        header('Location: ../Producto.php');
    }
    else{
        header('Location:Modificar.php?id='.$id);
    }
?>