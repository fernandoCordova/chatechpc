<?php
//*********PARA VERIFICAR LA CUENTA DE USUARIO***********
include("../../recursos/conexionBD.php");
session_start();
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$consulta = "SELECT * FROM usuario WHERE nombre_perfil	 = '" . $usuario . "' AND clave = '" . $clave . "'";

$resultado = mysqli_query($conexion, $consulta) or die("<strong>Algo Salio mal con la CONSULTA :( </strong>");

$encontrados = mysqli_num_rows($resultado);

if ($encontrados > 0) {
  $filaEncontrada = mysqli_fetch_assoc($resultado);
  $_SESSION['idusuario'] = $filaEncontrada['idusuario'];
  $_SESSION['rut'] = $filaEncontrada['rut'];
  $_SESSION['nombre_perfil'] = $filaEncontrada['nombre_perfil'];
  $_SESSION['clave'] = $filaEncontrada['clave'];
  $_SESSION['correoUsuario'] = $filaEncontrada['correo'];
  $_SESSION['telefonoUsuario'] = $filaEncontrada['telefono'];
  $_SESSION['direccion'] = $filaEncontrada['direccion'];
  $_SESSION['nombres'] = $filaEncontrada['nombres'];
  $_SESSION['apellidos'] = $filaEncontrada['apellidos'];
  $_SESSION['edad'] = $filaEncontrada['edad'];
  $_SESSION['imagen'] = $filaEncontrada['imagen'];
  $_SESSION['tipo_usuario'] = $filaEncontrada['tipo_usuario'];
  $_SESSION['estado'] = $filaEncontrada['estado'];
  if ($_SESSION['estado'] == "Inactivo") {
    header("location: ../../login.php");
  } else {
    header("location: ../../home.php");
  }
} else {
  header("location: ../../login.php");
}
//*********FIN VERIFICAR LA CUENTA DE USUARIO***********
