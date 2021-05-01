<?php
    //requiere conexión
    require '../PHP/ConectarBD.php';
    require '../PHP/BD/DAOUsuario.php';

    //Conectar a la base de datos
    $conexion = conectar();

    //Recoger datos
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    //Hacer consulta

    $resultado = comprobarUsuario($conexion, $usuario, $password);

    if(mysqli_num_rows($resultado)){
        $fila= mysqli_fetch_assoc($resultado);

        if($fila['Rol']== "usuario" || $fila['Rol']== "Usuario"){
            iniciarSesion($fila);
            header('Location: ../Usuario/Home.php');
        }
        else if($fila['Rol']== "administrador" || $fila['Rol']== "Administrador"){
            iniciarSesion($fila);
            header('Location: ../Administrador/Home.php');
        }
    }
    else{
        header('Location: IniciarSesion.html');
    }
?>