<?php

    //Buscar comentarios

    function mostrarComentarios($conexion, $producto){

        if($producto == "todo" || $producto == ""){
            $productos= "Select * from Comentario";
        }
        else{
            $productos= "Select * from Comentario where idProducto = '$producto'";
        }
        $mostrar = mysqli_query($conexion, $productos);

        return $mostrar;
    }

    //Insertar un comentario
    function insertarComentario($conexion, $usuario, $contenido, $producto, $fecha){

        $insertar = "Insert into Comentario (DNI, Contenido, idProducto, fechaComentario) value ('$usuario', '$contenido', '$producto', '$fecha')";

        $query = mysqli_query($conexion, $insertar);

        return $query;
    }

    //Modificar un comentario
    function modificarComentario($conexion, $id, $contenido, $fecha){
        $modificar = "Update Comentario set Contenido = '$contenido', fechaComentario='$fecha' where idComentario ='$id'";

        $query =mysqli_query($conexion, $modificar);

        return $query;
    }
    //eliminar el comentario
    function eliminarComentario($conexion, $id){
        $comentario = "Delete from Comentario where idComentario = '$id'";
        
        $query = mysqli_query($conexion, $comentario);

        return $query;
    }

    //Eliminar los comentarios con la ip de un producto
    function eliminarProductoComentario($conexion, $id){
        $comentario = "Delete from Comentario where idProducto = '$id'";

        $query = mysqli_query($conexion, $comentario);

        return $query;
    }

    //Busca un comentario segun la ip
    function buscarID($conexion, $id){
        $comentario = "Select * from Comentario where idComentario = '$id'";

        $query = mysqli_query($conexion, $comentario);

        return $query;
    }
?>