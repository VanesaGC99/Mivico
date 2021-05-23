<?php

    //Buscar comentarios

    function mostrarComentarios($conexion){

        $comentarios = "Select * from Comentario";

        $query = mysqli_query($conexion, $comentarios);

        return $query;
    }

    //Insertar un comentario
    function insertarComentario($conexion, $usuario, $contenido, $producto, $fecha){

        $insertar = "Insert into Comentario (DNI, Contenido, idProducto, fechaComentario) value ('$usuario', '$contenido', '$producto', '$fecha')";

        $query = mysqli_query($conexion, $insertar);

        return $query;
    }

    //
?>