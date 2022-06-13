<?php
if (
  isset($_POST['nombre']) && isset($_POST['cantidad']) && isset($_POST['estado'])  && isset($_POST['categoria']) &&
  isset($_POST['id']) && isset($_POST['precio'])
) {
  if (
    !empty($_POST['nombre']) && !empty($_POST['cantidad']) && !empty($_POST['estado'])  && !empty($_POST['categoria'])
    && !empty($_POST['id']) && !empty($_POST['precio'])
  ) {
    // include Database connection file 
    include("../../recursos/conexionBD.php");
    // get values 
    $id       = $_POST['id'];
    $nombre    = $_POST['nombre'];
    $cantidad  = $_POST['cantidad'];
    $estado = $_POST['estado'];
    $categoria  = $_POST['categoria'];
    $precio  = $_POST['precio'];
    // crear query a la base de datos
    $query = "UPDATE `producto` 
                 SET `nombre`='$nombre',`cantidad`='$cantidad',`precio`='$precio',`estado`='$estado',`categoria_idcategoria`='$categoria' 
               WHERE idproducto = '$id'";
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
