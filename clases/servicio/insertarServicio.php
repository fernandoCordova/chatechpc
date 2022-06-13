<?php
if (
  isset($_POST['tipo']) && isset($_POST['monto']) && isset($_POST['estado'])
) {
  if (
    !empty($_POST['tipo']) && !empty($_POST['monto']) && !empty($_POST['estado'])
  ) {
    // include Database connection file 
    include("../../recursos/conexionBD.php");
    // get values 
    $tipo    = $_POST['tipo'];
    $monto  = $_POST['monto'];
    $estado = $_POST['estado'];
    // crear query a la base de datos
    $query = "INSERT INTO `servicio`(`tipo`, `monto`, `estado`) 
                   VALUES ('$tipo','$monto','$estado')";
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
