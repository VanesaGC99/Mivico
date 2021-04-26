<?php

    //Muestra todos los productos de la base de datos
    function catalogo($conexion){
        $consulta = "Select * from Protucto";
        $mostrar = mysqli_query($conexion, $consulta);

        if($mostrar){
            echo "Se muestran datos";
        }
    }
    function insertar(){

    }

    function eliminar(){

    }

    function modificar(){

    }

?>