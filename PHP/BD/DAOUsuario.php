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
    function modificarUsuario($conexion, $dni, $nombre, $apellido1, $apellido2, $usuario, $password, $email, $telefono, $direccion, $codigoP, $provincia, $comunidadA){
        
        if($nombre != ""){
            $update = "Update Usuario set Nombre = '$nombre' where DNI = '$dni'";
            $query = mysqli_query($conexion,$update);

        }else if($apellido1 != ""){
            $update = "Update Usuario set Apellido1 = '$apellido1' where DNI = '$dni'";
            $query = mysqli_query($conexion,$update);

        }else if($apellido2 != ""){
            $update = "Update Usuario set Apellido2 = '$apellido2' where DNI = '$dni'";
            $query = mysqli_query($conexion,$update);

        }else if($usuario != ""){
            $update = "Update Usuario set Usuario = '$usuario' where DNI = '$dni'";
            $query = mysqli_query($conexion,$update);

        }else if($password != ""){
            $update = "Update Usuario set Password = '$password' where DNI = '$dni'";
            $query = mysqli_query($conexion,$update);

        }else if($email != ""){
            $update = "Update Usuario set Email = '$email' where DNI = '$dni'";
            $query = mysqli_query($conexion,$update);

        }else if($telefono != ""){
            $update = "Update Usuario set Telefono = '$telefono' where DNI = '$dni'";
            $query = mysqli_query($conexion,$update);

        }else if($codigoP != ""){
            $update = "Update Usuario set CP = '$codigoP' where DNI = '$dni'";
            $query = mysqli_query($conexion,$update);

        }else if($provincia != ""){
            $update = "Update Usuario set Provincia = '$provincia' where DNI = '$dni'";
            $query = mysqli_query($conexion,$update);

        }else if($comunidadA != ""){
            $update = "Update Usuario set ComunidadAutonoma = '$comunidadA' where DNI = '$dni'";
            $query = mysqli_query($conexion,$update);

        }else{
            return false;
        }
        return $query;
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