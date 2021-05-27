<?php
  //Conexion
  require '../../../PHP/ConectarBD.php';
  $conexion = conectar();

  $id = $_GET['id'];
  
  $usuario = buscarDNI($conexion, $dni);
  
  if(mysqli_num_rows($usuario)){
    while($fila = mysqli_fetch_assoc($usuario)){
      
    }
  }
?>
