<?php
if (
  isset($_POST['tipo']) && isset($_POST['marca']) && isset($_POST['modelo'])
  && isset($_POST['os'])  && isset($_POST['cliente']) && isset($_POST['id'])
) {
  if (
    !empty($_POST['tipo']) && !empty($_POST['marca']) && !empty($_POST['modelo'])
    && !empty($_POST['os']) && !empty($_POST['cliente']) && !empty($_POST['id'])
  ) {
    // include Database connection file 
    include("../../recursos/conexionBD.php");
    // get values
    $id = $_POST['id'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $os = $_POST['os'];
    $cliente = $_POST['cliente'];
    // Updaste User details
    $query = "UPDATE `equipo` 
                 SET `tipo`='$tipo',`marca`='$marca',`modelo`='$modelo',
                     `sistema_operativo`='$os',`cliente_idcliente`='$cliente' 
               WHERE  idequipo = '$id'";
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
