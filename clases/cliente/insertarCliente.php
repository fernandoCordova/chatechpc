<?php
include("../../recursos/conexionBD.php");
if (
  isset($_POST['rut'])      && isset($_POST['nombre']) && isset($_POST['apellido'])  && isset($_POST['direccion']) &&
  isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['edad'])      && isset($_POST['cedula'])    &&
  isset($_POST['estado'])
) {
  if (
    !empty($_POST['rut'])      && !empty($_POST['nombre']) && !empty($_POST['apellido'])  && !empty($_POST['direccion']) &&
    !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['edad'])      && !empty($_POST['cedula'])    &&
    !empty($_POST['estado'])
  ) {
    $rut = $_POST['rut'];
    $query = "SELECT * FROM cliente WHERE rut = '$rut'";
    $resultado = mysqli_query($conexion, $query) or die("<strong>Algo Salio mal con la CONSULTA :( </strong>");
    $filas = mysqli_num_rows($resultado);
    if ($filas > 0) {
      echo 'error';
    } else {
      // include Database connection file
      // get values 
      $rut       = $_POST['rut'];
      $nombre    = $_POST['nombre'];
      $apellido  = $_POST['apellido'];
      $direccion = $_POST['direccion'];
      $telefono  = $_POST['telefono'];
      $correo    = $_POST['correo'];
      $edad      = $_POST['edad'];
      $cedula    = $_POST['cedula'];
      $estado    = $_POST['estado'];
      // crear query a la base de datos
      $query = "INSERT INTO `cliente`
                         (`rut`, `nombres`, `apellidos`, `direccion`, `telefono`, `correo`, 
                          `edad`, `cedula`, `estado`) 
                   VALUES ('$rut','$nombre','$apellido','$direccion','$telefono','$correo',
                           '$edad','$cedula','$estado')";
      // ejecutar la query
      if (!$result = mysqli_query($conexion, $query)) {
        exit(mysqli_error($conexion));
      }
    }
  } else {
    echo 'error';
  }
} else {
  echo 'error';
}
