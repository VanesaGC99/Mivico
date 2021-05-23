<?php
    require '../ConectarBD.php';
    require '../BD/DAOLikes.php';
    $conexion = conectar();

    session_start();
    $producto = $_POST['id'];
    $usuario = $_SESSION['DNI'];

    $comprobar = comprobarLike($conexion, $producto, $usuario);
    $count = mysqli_num_rows($comprobar);

    if($count == 0){

        $insert = insertarLike($conexion, $usuario, $producto);
        $update = modificarLike($conexion, $usuario, $producto);
    }
    else{
        
        $delete = eliminarLike($conexion, $usuario, $producto);
        $update = modificarLike($conexion, $usuario, $producto);
    }

    if($count >= 1){
        $megusta = "<img src='../IMAGE/likes/like.png' width=10%> Me gusta"; 
        
    }
    else{
        $megusta="<img src='../IMAGE/likes/dislike.png' width=10%> No me gusta";
        
    }

    $datos = array('text' => $megusta);

    echo json_encode($datos);
?>