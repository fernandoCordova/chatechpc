<?php
// check request
if(isset($_POST['id']) && !empty($_POST['id']))
{
    // include Database connection file
    include("../../recursos/conexionBD.php");

    // get user id
    $idcliente = $_POST['id'];

    // delete User
    $query = "DELETE FROM cliente WHERE idcliente = '$idcliente'";
    if (!$result = mysqli_query($conexion, $query)) {
        exit(mysqli_error($conexion));
    }
}
