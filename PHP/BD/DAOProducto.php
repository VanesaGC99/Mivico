<?php

    //Muestra todos los productos de la base de datos
    function catalogo($conexion){
        $consulta = "Select * from Protucto";
        $mostrar = mysqli_query($conexion, $consulta);

        if($mostrar){
            echo "Se muestran datos";
        }
    }
    
    //Funcion para hacer un array con 4 imagenes aleatorias de la base de datos
    function arrayImagenes($conexion){
        $arrayImagenes = [];
        $consulta = "Select * from Producto ORDER BY RAND() LIMIT 4";
        $imagenes = mysqli_query($conexion, $consulta);
        $i = 0;
        
        while($fila = mysqli_fetch_array($imagenes)){    
            $arrayImagenes[$i] = $fila['Imagen'];
            $i++;
       }

       return $arrayImagenes;
    }

    function insertar(){

    }

    function eliminar(){

    }

    function modificar(){

    }

?>