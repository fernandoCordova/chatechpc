<?php
session_start();
include("../../recursos/conexionBD.php");
if (
  isset($_POST['cliente'])  && isset($_POST['servicio'])  &&
  isset($_POST['fechaTermino']) && isset($_POST['formaPago']) && isset($_POST['estadoInicial'])  && isset($_POST['diagnostico'])
) {
  if (
    !empty($_POST['cliente'])   && !empty($_POST['servicio']) &&
    !empty($_POST['fechaTermino']) && !empty($_POST['formaPago']) && !empty($_POST['estadoInicial']) && !empty($_POST['diagnostico'])
  ) {
    if (!isset($_POST['descuento']) || empty($_POST['descuento'])) {
      $totalPromocion = 0;
    } else {
      $totalPromocion = $_POST['descuento'];
    }
    if ($_POST['isDiscounted'] == 0) {
      $promocion = "No";
    } else {
      $promocion = "Si";
    }
    $idot = rand();
    $estadoInicial = $_POST['estadoInicial'];
    $diagnostico = $_POST['diagnostico'];
    $total = $_POST['total'];
    $fecha = date('d-m-Y');
    $fechaTermino = $_POST['fechaTermino'];
    $formaPago = $_POST['formaPago'];
    $servicio = $_POST['servicio'];
    $datosservicio = explode(",", $servicio);
    $idservicio = $datosservicio[0];
    $tipoServicio = $datosservicio[1];
    $precioServicio = $datosservicio[2];
    $cliente = $_POST['cliente'];
    $datoscliente = explode(",", $cliente);
    $idequipo = $datoscliente[1];
    $idcliente = $datoscliente[0];
    $rutcliente = $datoscliente[3];
    $nombrecliente = $datoscliente[4];
    $apellidocliente = $datoscliente[2];
    $correo = $datoscliente[5];
    $telefono = $datoscliente[6];
    $idusuario = $_SESSION['idusuario'];
    $rutUsuario = $_SESSION['rut'];
    echo $idusuario;
    
    //Ingresar ot
    $query = "INSERT INTO `orden_trabajo`(`idsolicitud`, `estadoInicial`, `diagnostico`, `promociones`, `monto_promocion`, `total`, `fecha`, 
                                          `fechaTermino`, `forma_pago`, `servicio_idservicio`, `usuario_idusuario`, `equipo_idequipo`, `equipo_cliente_idcliente`) 
                   VALUES                 ('$idot','$estadoInicial','$diagnostico','$promocion','$totalPromocion','$total','$fecha','$fechaTermino','$formaPago',
                                           '$idservicio','1','$idequipo','$idcliente')";
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
    //Ingresar historial ot
    $_SESSION['idot'] = $idot;
    $_SESSION['fecha'] = $fecha;
    $_SESSION['rutcliente'] = $rutcliente;
    $_SESSION['nombrecliente'] = $nombrecliente;
    $_SESSION['apellidocliente'] = $apellidocliente;
    $_SESSION['correo'] = $correo;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['estadoInicial'] = $estadoInicial;
    $_SESSION['diagnostico'] = $diagnostico;
    $_SESSION['tipoServicio'] = $tipoServicio;
    $_SESSION['precioServicio'] = $precioServicio;
    $_SESSION['fechaTermino'] = $fechaTermino;
    $_SESSION['formaPago'] = $formaPago;
    $_SESSION['promocion'] = $promocion;
    $_SESSION['totalPromocion'] = $totalPromocion;
    $_SESSION['total'] = $total;
    $query = "INSERT INTO `historial_ot`(`codigoot`, `fecha`, `rutcliente`, `rutvendedor`, `tipoServicio`, `fechaTermino`, `metodoPago`, `promocion`, `valorPromocion`, `total`)
                   VALUES               ('$idot','$fecha','$rutcliente','$rutUsuario','$tipoServicio','$fechaTermino','$formaPago','$promocion','$totalPromocion','$total')";
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
    header("Location: ../../detallesOT.php");
  } else {
    header("Location: ../../ot.php");
  }
} else {
  header("Location: ../../ot.php");
}
