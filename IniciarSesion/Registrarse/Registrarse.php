<?php
    //Recoger 
    require '../../PHP/ConectarBD.php';
    require '../../PHP/BD/DAOUsuario.php';

    $conexion = conectar();

    //Recoger datos

    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $dni = $_POST['dni'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $email =$_POST['email'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $codigoP = $_POST['codigoP'];
    $provincia = $_POST['provincia'];
    $comunidadA = $_POST['comunidadAutonoma'];

    $consultar = buscarDNI($conexion, $dni);

    if(mysqli_num_rows($consultar)){
        
        if($_POST['pagina']=="registro"){
            header("Location:Registrarse.php");
        }
        else if ($_POST['pagina'] == "administracion"){
            header("Location:../../Administrador/Gestion/Usuario/AñadirUsuario.php");
        }
    }
    else{

        $insertar= insertarUsuario($conexion, $dni, $nombre, $apellido1, $apellido2, $usuario, $password, $email, $telefono, $direccion, $codigoP, $provincia, $comunidadA);
        
        if($insertar){
            if($_POST['pagina']=="registro"){
                header("Location:../IniciarSesion.php");
            }
            else if ($_POST['pagina'] == "administracion"){
                header("Location:../../Administrador/Gestion/GestionUsuario.php");
            }
        }
        else{
            if($_POST['pagina']=="registro"){
                header("Location:Registrarse.php");
            }
            else if ($_POST['pagina'] == "administracion"){
                header("Location:../../Administrador/Gestion/Usuario/AñadirUsuario.php");
            }
        }
    }

?>