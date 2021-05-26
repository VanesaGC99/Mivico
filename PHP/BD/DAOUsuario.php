<?php

    //comprobar usuario
    function comprobarUsuario($conexion, $usuario, $password){
        $consulta = "Select * from Usuario WHERE Usuario = '$usuario' AND Password = '$password'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    //Iniciar sesion
    function iniciarSesion($usuario){
        session_id($usuario["DNI"]);
        session_start();

        foreach($usuario as $atributo=>$valor){
            $_SESSION[$atributo] = $valor;
            echo "$atributo : $valor <br>";
        }
    }
    
    //Insertar usuario
    function insertarUsuario($conexion, $dni, $nombre, $apellido1, $apellido2, $usuario, $password, $email, $telefono, $direccion, $codigoP, $provincia, $comunidadA){
        $insert = "Insert into Usuario value ('$dni', '$nombre', '$apellido1', '$apellido2', '$usuario', '$password', '$email', '$telefono', '$direccion', '$codigoP', '$provincia', '$comunidadA','Usuario','0')";
        
        $query = mysqli_query($conexion, $insert);
        
        return $query;
    }

    //Eliminar usuario
    function eliminarUsuario(){

    }

    //Modificar usuario
    function modificarUsuario(){

    }

    //Buscar usuario por DNI
    function buscarDNI($conexion, $dni){
        $buscar = "Select * from Usuario where DNI = '$dni'";

        $query = mysqli_query($conexion, $buscar);

        return $query;
    }

    //Listar usuarios
    function listarUsuarios($conexion){
        $buscar = "Select * from Usuario";

        $query = mysqli_query($conexion, $buscar);

        return $query;
    }
?>