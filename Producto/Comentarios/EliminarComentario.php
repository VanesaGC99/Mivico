<?php
    require '../../PHP/ConectarBD.php';
    require '../../PHP/BD/DAOComentarios.php';
    $conexion = conectar();

    $id = $_POST['id'];
    echo $id;
    $comentario = eliminarComentario($conexion, $id);

    if($comentario){
        header('Location: ../Producto.php');
    }
    else{
        header('Location: Eliminar.php?id='.$id);
    }
?>