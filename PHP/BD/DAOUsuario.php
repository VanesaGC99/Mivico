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
    function eliminarUsuario($conexion, $dni){
        $borrar = "Delete from Usuario Where DNI ='$dni'";

        $query = mysqli_query($conexion, $borrar);

        return $query;
    }

    //Modificar usuario
    function modificarUsuario($conexion, $dni, $nombre, $apellido1, $apellido2, $usuario, $password, $email, $telefono, $direccion, $codigoP, $provincia, $comunidadA, $rol, $idUsuario){
        $modificar = "Update Usuario Set DNI = '$dni', Nombre = '$nombre', Apellido1 = '$apellido1', Apellido2 = '$apellido2', Usuario = '$usuario', Password = '$password', 
        Email = '$email', Telefono = '$telefono', Dirección = '$direccion', CP = '$codigoP', Provincia ='$provincia', ComunidadAutonoma = '$comunidadA',
        Rol = '$rol' where DNI = '$idUsuario'";
        
        $query = mysqli_query($conexion, $modificar);

        actualizacionSesion($dni, $nombre, $apellido1, $apellido2, $usuario, $password, $email, $telefono, $direccion, $codigoP, $provincia, $comunidadA, $rol);
        
        return $query;
        
    }

    //Actualizacion de SESSION
    function actualizacionSesion($dni, $nombre, $apellido1, $apellido2, $usuario, $password, $email, $telefono, $direccion, $codigoP, $provincia, $comunidadA, $rol){
        session_id($dni);
        session_start();

        $_SESSION['DNI'] = $dni;
        $_SESSION['Nombre'] = $nombre;
        $_SESSION['Apellido1'] = $apellido1;
        $_SESSION['Apellido2'] = $apellido2;
        $_SESSION['Usuario'] = $usuario;
        $_SESSION['Password'] = $password;
        $_SESSION['Email'] = $email;
        $_SESSION['Telefono'] = $telefono;
        $_SESSION['Dirección'] = $direccion;
        $_SESSION['CP'] = $codigoP;
        $_SESSION['Provincia'] = $provincia;
        $_SESSION['ComunidadAutonoma'] = $comunidadA;
        $_SESSION['Rol'] = $rol;
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