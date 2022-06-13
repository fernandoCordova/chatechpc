<?php
if (
  isset($_POST['rut'])      && isset($_POST['nombre']) && isset($_POST['apellido'])  && isset($_POST['direccion']) &&
  isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['edad'])      && isset($_POST['cedula'])    &&
  isset($_POST['estado'])   && isset($_POST['id'])
) {
  if (
    !empty($_POST['rut'])      && !empty($_POST['nombre']) && !empty($_POST['apellido'])  && !empty($_POST['direccion']) &&
    !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['edad'])      && !empty($_POST['cedula'])    &&
    !empty($_POST['estado'])   && !empty($_POST['id'])
  ) {
    // include Database connection file 
    include("../../recursos/conexionBD.php");
    // get values 
    $id       = $_POST['id'];
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
    $query = "UPDATE `cliente` 
                 SET `rut`='$rut',`nombres`='$nombre',`apellidos`='$apellido',`direccion`='$direccion',
                     `telefono`='$telefono',`correo`='$correo',`edad`='$edad',`cedula`='$cedula',
                     `estado`='$estado' 
               WHERE idcliente = '$id'";
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
