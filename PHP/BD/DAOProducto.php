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

    //Funcion para 
    function insertarProducto($conexion, $nombre, $tipo, $precio, $stock, $imagen, $descripcion){
        $insertar = "Insert into Producto (Nombre, Tipo, Descripcion, Precio, Stock, Imagen, likes) value ('$nombre', '$tipo', '$descripcion', '$precio', '$stock', 'productos/$imagen', '0')";

        $query = mysqli_query($conexion, $insertar);

        return $query;
    }

    function eliminarProducto($conexion,  $id){
        $eliminar = "Delete from Producto where idProducto = '$id'";

        $query = mysqli_query($conexion, $eliminar);

        return $query;
    }

    function modificarProducto($conexion, $id, $nombre, $tipo, $precio, $stock, $imagen, $descripcion){
        $update = "Update Producto set Nombre= '$nombre', Tipo = '$tipo', Precio = '$precio', Stock = $stock, Imagen = '$imagen', Descripcion = '$descripcion' where idProducto = '$id'";
        
        $query = mysqli_query($conexion, $update);

        return $query;
    }

    //Buscar un producto por su id

    function buscarProducto($conexion, $id){

        $productos= "Select * from Producto Where idProducto = '$id'";

        $query = mysqli_query($conexion, $productos);

        return $query;
    }

?>