<?php
    require '../ConectarBD.php';
    $conexion = conectar();

    session_start();

    $post = $_POST['id'];
    $usuario = $_SESSION['DNI'];

    $likes = mysqli_query($conexion, "Select * from Likes where idProducto = '".$post."' and DNI = '" .$usuario."'");

    if(mysqli_num_rows($likes) == 0){

        $insert = mysqli_query($conexion, "Insert into Likes (DNI, idProducto,fechaLike) values ('$usuario', '$post', '" .date(d)."/".date(m)."/".date(Y)."')");
        $update = mysqli_query($conexion, "Update Producto set likes = likes+1 where idProducto = ' $post '");
    }
    else{

        $delete = mysqli_query($conexion, "delete from Likes where idProducto = '". $post ."' and DNI = '". $usuario ."'");
        $update = mysqli_query($conexion, "Update Producto set likes = likes-1 where idProducto = '" . $post . "'");
    }


    if($likes){
        $megusta = "<img src='../IMAGE/likes/like.png' width=10%>Me gusta";
    }else{
        $megusta = "<img src='../IMAGE/likes/dislike.png' width=10%>No me gusta";
    }

    $datos = array('text' => $megusta);

    echo json_encode($datos);
?>