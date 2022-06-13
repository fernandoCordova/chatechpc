<?php
// check request
if (isset($_POST['id']) && !empty($_POST['id'])) {
  // include Database connection file
  include("../../recursos/conexionBD.php");

  // get user id
  $idequipo = $_POST['id'];

  // delete User
  $query = "DELETE FROM equipo WHERE idequipo = '$idequipo'";
  if (!$result = mysqli_query($conexion, $query)) {
    exit(mysqli_error($conexion));
  }
}
