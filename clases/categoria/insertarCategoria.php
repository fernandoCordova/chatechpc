<?php
if (
  isset($_POST['nombre']) && isset($_POST['estado']) 
) {
  if (
    !empty($_POST['nombre']) && !empty($_POST['estado']) 
  ) {
    // include Database connection file 
  include("../../recursos/conexionBD.php");

  // get values 
  $nombre = $_POST['nombre'];
  $estado = $_POST['estado'];

  $query = "INSERT INTO `categoria`(`nombre`, `estado`)
                 VALUES            ('$nombre','$estado')";
  if (!$result = mysqli_query($conexion, $query)) {
    exit(mysqli_error($conexion));
  }
  } else {
    echo 'error';
  }
} else {
  echo 'error';
}
