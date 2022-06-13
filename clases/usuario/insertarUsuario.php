<?php
include("../../recursos/conexionBD.php");
if (
  isset($_POST['rut'])      && isset($_POST['usuario'])   && isset($_POST['clave'])  && isset($_POST['correo']) &&
  isset($_POST['telefono']) && isset($_POST['direccion']) && isset($_POST['nombre']) && isset($_POST['apellido']) &&
  isset($_POST['edad'])     && isset($_POST['imagen'])    && isset($_POST['tipo'])   && isset($_POST['estado'])
) {
  if (
    !empty($_POST['rut'])      && !empty($_POST['usuario'])   && !empty($_POST['clave'])  && !empty($_POST['correo']) &&
    !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) &&
    !empty($_POST['edad'])     && !empty($_POST['imagen'])    && !empty($_POST['tipo'])   && !empty($_POST['estado'])
  ) {
    $rut = $_POST['rut'];
    $query = "SELECT * FROM usuario WHERE rut = '$rut'";
    $resultado = mysqli_query($conexion, $query) or die("<strong>Algo Salio mal con la CONSULTA :( </strong>");
    $filas = mysqli_num_rows($resultado);
    if ($filas > 0) {
      echo 'error';
    } else {
      // get values 
      $rut       = $_POST['rut'];
      $usuario   = $_POST['usuario'];
      $clave     = $_POST['clave'];
      $correo    = $_POST['correo'];
      $telefono  = $_POST['telefono'];
      $direccion = $_POST['direccion'];
      $nombre    = $_POST['nombre'];
      $apellido  = $_POST['apellido'];
      $edad      = $_POST['edad'];
      $imagen    = $_POST['imagen'];
      $tipo      = $_POST['tipo'];
      $estado    = $_POST['estado'];
      // crear query a la base de datos
      $query = "INSERT INTO `usuario`
                     (`rut`, `nombre_perfil`, `clave`, `correo`, `telefono`, `direccion`, `nombres`, 
                      `apellidos`, `edad`, `imagen`, `tipo_usuario`, `estado`) 
               VALUES('$rut','$usuario','$clave','$correo','$telefono','$direccion','$nombre',
                      '$apellido','$edad','$imagen','$tipo','$estado')";
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
