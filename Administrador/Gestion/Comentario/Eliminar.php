<?php
    require '../../../PHP/ConectarBD.php';
    require '../../../PHP/BD/DAOComentarios.php';
    $conexion = conectar();

    $id = $_POST['id'];

    $comentario = eliminarComentario($conexion, $id);

    if($comentario){
        header('Location: ../GestionComentario.php');
    }
    else{
        header('Location: ../GestionComentario.php');
    }
?>