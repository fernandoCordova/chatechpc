<?php
// include Database connection file
include("../../recursos/conexionBD.php");

// check request
if (isset($_POST['id']) && !empty($_POST['id'])) {
  // get User ID
  $idproveedor = $_POST['id'];

  // Get User Details
  $query = "SELECT * FROM proveedor WHERE idproveedor = '$idproveedor'";
  if (!$result = mysqli_query($conexion, $query)) {
    exit(mysqli_error($conexion));
  }
  $response = array();
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $response = $row;
    }
  } else {
    $response['status'] = 200;
    $response['message'] = "Data not found!";
  }
  // display JSON data
  echo json_encode($response);
} else {
  $response['status'] = 200;
  $response['message'] = "Invalid Request!";
}
