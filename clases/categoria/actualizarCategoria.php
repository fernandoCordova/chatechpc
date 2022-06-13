<?php
if (
  isset($_POST['nombre']) && isset($_POST['estado']) && isset($_POST['id'])
) {
  if (
    !empty($_POST['nombre']) && !empty($_POST['estado']) && !empty($_POST['id'])
  ) {
    // include Database connection file 
    include("../../recursos/conexionBD.php");
    // get values
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    // Updaste User details
    $query = "UPDATE `categoria` 
                 SET `nombre`='$nombre',`estado`='$estado'
               WHERE idcategoria = '$id'";
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
    // ejecutar la query
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
  } else {
    echo 'error';
  }
} else {
  echo 'error';
}
