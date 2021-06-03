<?php
    require '../../../PHP/ConectarBD.php';
    require '../../../PHP/BD/DAOProducto.php';
    require '../../../PHP/BD/DAOLikes.php';
    require '../../../PHP/BD/DAOComentarios.php';
    $conexion = conectar();

    $id = $_POST['id'];

    //Buscar producto en Likes

    $likes = eliminarProductoLike($conexion, $id);

    if($likes){

        $comentarios = eliminarProductoComentario($conexion, $id);

        if($comentarios){
            $imgproducto =buscarProducto($conexion, $id);

            $producto = eliminarProducto($conexion, $id);

            if($producto){
                $imgproducto = mysqli_fetch_array($imgproducto);
                unlink('../../../IMAGE/'.$imgproducto['Imagen']);
                header('Location: ../GestionProducto.php');
            }
            else{
                echo "producto";
            }
        }
        else{
            echo "comentario";
        }
    }
    else{
        echo "likes";
    }
?>