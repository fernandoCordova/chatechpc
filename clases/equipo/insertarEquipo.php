<?php
if (
  isset($_POST['tipo']) && isset($_POST['marca']) && isset($_POST['modelo'])
  && isset($_POST['os'])  && isset($_POST['cliente'])
) {
  if (
    !empty($_POST['tipo']) && !empty($_POST['marca']) && !empty($_POST['modelo'])
    && !empty($_POST['os']) && !empty($_POST['cliente'])
  ) {
    // include Database connection file 
    include("../../recursos/conexionBD.php");

    // get values 
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $os = $_POST['os'];
    $cliente = $_POST['cliente'];

    $query = "INSERT INTO `equipo`(`tipo`, `marca`, `modelo`, `sistema_operativo`, `cliente_idcliente`) 
                   VALUES         ('$tipo','$marca','$modelo','$os','$cliente')";
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
  } else {
    echo 'error';
  }
} else {
  echo 'error';
}
