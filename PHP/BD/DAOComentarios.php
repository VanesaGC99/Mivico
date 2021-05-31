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

    //
?>