<?php
if (
  isset($_POST['rut'])      && isset($_POST['usuario'])   && isset($_POST['clave'])  && isset($_POST['correo'])   &&
  isset($_POST['telefono']) && isset($_POST['direccion']) && isset($_POST['nombre']) && isset($_POST['apellido']) &&
  isset($_POST['edad'])     && isset($_POST['imagen'])    && isset($_POST['tipo'])   && isset($_POST['estado'])   &&
  isset($_POST['id'])
) {
  if (
    !empty($_POST['rut'])      && !empty($_POST['usuario'])   && !empty($_POST['clave'])  && !empty($_POST['correo']) &&
    !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) &&
    !empty($_POST['edad'])     && !empty($_POST['imagen'])    && !empty($_POST['tipo'])   && !empty($_POST['estado'])
  ) {
    // include Database connection file 
    include("../../recursos/conexionBD.php");
    // get values 
    $id        = $_POST['id'];
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
    $query = "UPDATE 
             `usuario` 
              SET 
             `rut`='$rut',`nombre_perfil`='$usuario',`clave`='$clave',`correo`='$correo',
             `telefono`='$telefono',`direccion`='$direccion',`nombres`='$nombre',`apellidos`='$apellido',
             `edad`='$edad',`imagen`='$imagen',`tipo_usuario`='$tipo',`estado`= '$estado' 
              WHERE idusuario = '$id'";
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