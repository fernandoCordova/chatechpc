<?php
if (
  isset($_POST['nombre']) && isset($_POST['nombre_contacto']) && isset($_POST['cargo_contacto'])
  && isset($_POST['direccion']) && isset($_POST['pais']) && isset($_POST['telefono'])
  && isset($_POST['correo']) && isset($_POST['estado']) && isset($_POST['id'])
) {
  if (
    !empty($_POST['nombre']) && !empty($_POST['nombre_contacto']) && !empty($_POST['cargo_contacto'])  && !empty($_POST['direccion']) &&
    !empty($_POST['pais']) && !empty($_POST['telefono']) && !empty($_POST['correo']) && !empty($_POST['estado']) && !empty($_POST['id'])
  ) {
    // include Database connection file 
    include("../../recursos/conexionBD.php");
    // get values 
    $id       = $_POST['id'];
    $nombre    = $_POST['nombre'];
    $nombre_contacto  = $_POST['nombre_contacto'];
    $cargo_contacto = $_POST['cargo_contacto'];
    $direccion  = $_POST['direccion'];
    $pais  = $_POST['pais'];
    $telefono  = $_POST['telefono'];
    $correo  = $_POST['correo'];
    $estado  = $_POST['estado'];
    // crear query a la base de datos
    $query = "UPDATE `proveedor` 
                 SET `nombre`='$nombre',`nombre_contacto`='$nombre_contacto',`cargo_contacto`='$cargo_contacto',
                     `direccion`='$direccion',`pais`='$pais',`telefono`='$telefono',`correo`='$correo',
                     `estado`='$estado' 
               WHERE idproveedor = '$id'";
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
