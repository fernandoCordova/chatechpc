<?php
if (
  isset($_POST['tipo']) && isset($_POST['monto']) && isset($_POST['estado'])
  && isset($_POST['id'])
) {
  if (
    !empty($_POST['tipo']) && !empty($_POST['monto']) && !empty($_POST['estado'])
    && !empty($_POST['id'])
  ) {
    // include Database connection file 
    include("../../recursos/conexionBD.php");
    // get values 
    $id       = $_POST['id'];
    $tipo    = $_POST['tipo'];
    $monto  = $_POST['monto'];
    $estado = $_POST['estado'];
    // crear query a la base de datos
    $query = "UPDATE `servicio` 
                 SET `tipo`='$tipo',`monto`='$monto',`estado`='$estado' 
               WHERE idservicio = '$id'";
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
