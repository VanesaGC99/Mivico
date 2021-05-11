<?php
    require '../ConectarBD.php';
    $conexion = conectar();

    session_start();
    $producto = $_POST['id'];
    $usuario = $_SESSION['DNI'];

    $comprobar = mysqli_query($conexion,"Select * from Likes Where idProducto = '" .$producto."' And DNI = '" .$usuario."'");
    $count = mysqli_num_rows($comprobar);

    if($count == 0){

        $insert = mysqli_query($conexion, "Insert into Likes (DNI, idProducto, fechaLike) values ('$usuario', '$producto', '".date('d')."/".date('m')."/".date('Y')."')");
        $update = mysqli_query($conexion, "Update Producto set likes = likes+1 where idProducto = '$producto' and DNI = '$usuario'");
    }
    else{
        
        $delete = mysqli_query($conexion, "Delete from Likes Where idProducto = '$producto' and DNI = '$usuario'");
        $update = mysqli_query($conexion, "Update Producto set likes = likes-1 where idProducto = '$producto' and DNI = '$usuario'");
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