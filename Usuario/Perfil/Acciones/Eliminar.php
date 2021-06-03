<?php
    require '../../../PHP/ConectarBD.php';
    require '../../../PHP/BD/DAOUsuario.php';
    $conexion = conectar();
    $dni = $_POST['dni'];

    $borra = eliminarUsuario($conexion, $dni);

    if($borra){
        if($_POST['pagina'] == "administracion"){
            header('Location: ../../../Administrador/Gestion/GestionUsuario.php');
        }
        else{
            header('Location: ../../../index.php');
        }
    }
    else{
        if($_POST['pagina'] == "administracion"){
            header('Location: ../../../Administrador/Gestion/Usuario/EliminarUsuario.php');
        }
        else{
            header('Location: ../Eliminar.php');
        }
    }
?>