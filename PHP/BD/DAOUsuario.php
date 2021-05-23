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
    /*
    //Insertar datos de productos
    function insertar(){

    }

    //Eliminar datos de productos
    function eliminar(){

    }

    //Modificar datos de productos
    function modificar(){

    }
*/
    //Buscar usuario por DNI
    function buscarDNI($conexion, $dni){
        $buscar = "Select * from Usuario where DNI = '$dni'";

        $query = mysqli_query($conexion, $buscar);

        return $query;
    }
?>