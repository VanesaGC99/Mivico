<?php
    //Comprobar si el usuario le ha dado like a ese producto
    function comprobarLike($conexion, $producto, $usuario){

        $like = "Select * from Likes where idProducto = '".$producto."' and DNI = '".$usuario."'";

        $query = mysqli_query($conexion, $like);

        return $query;
    }

    //insertar like en la base de datos
    function insertarLike($conexion, $usuario, $producto){
        
        $insertar = "Insert into Likes (DNI, idProducto, fechaLike) values ('$usuario', '$producto', '".date('d')."/".date('m')."/".date('Y')."')";
        
        $query = mysqli_query($conexion, $insertar);
        
        return $query;
    }

    //actualizar likes
    function modificarLike($conexion, $usuario, $producto){
        
        $update ="Update Producto set likes = likes-1 where idProducto = '$producto' and DNI = '$usuario'";

        $query = mysqli_query($conexion, $update);

        return $query;
    }

    //Eliminar likes
    function eliminarLike($conexion, $usuario, $producto){

        $eliminar = "Delete from Likes Where idProducto = '$producto' and DNI = '$usuario'";
        
        $query = mysqli_query($conexion, $eliminar);

        return $query;
    }
?>