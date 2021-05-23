<?php

    //Muestra todos los productos de la base de datos
    function catalogo($conexion, $categoria){

        if($categoria == "todo" || $categoria == ""){
            $productos= "Select * from Producto";
        }
        else{
            $productos= "Select * from Producto where Tipo = '$categoria'";
        }
        $mostrar = mysqli_query($conexion, $productos);

        return $mostrar;
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

    //Buscar un producto por su id

    function buscarProducto($conexion, $id){

        $productos= "Select * from Producto Where idProducto = '$id'";

        $query = mysqli_query($conexion, $productos);

        return $query;
    }
?>