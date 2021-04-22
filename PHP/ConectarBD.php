<?php
    
    function conectar(){

        $server= "bdvanesagarcia.cmwqevhayaxy.eu-west-3.rds.amazonaws.com:3306";
        $usuario= "admin";
        $password= "Alumno2020";
        $BD= "Mivico";

        $conexion = mysqli_connect($server,$usuario, $password, $BD);

        if($conexion){
            return $conexion;
        }
        else{
            echo "<h2>ERROR. Se ha producido un error de conexión.</h2>";
            echo "<p> ".mysqli_connect_error()." </p>";
            return false;
        }
    }
?>