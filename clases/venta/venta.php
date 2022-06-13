<?php
session_start();
include("../../recursos/conexionBD.php");
if (
  isset($_POST['cantidad'])   && isset($_POST['total'])  && isset($_POST['formaPago']) &&
  isset($_POST['servicio1']) && isset($_POST['servicio2']) && isset($_POST['cliente'])  && isset($_POST['producto'])
) {
  if (
    !empty($_POST['cantidad'])   && !empty($_POST['total'])  && !empty($_POST['formaPago']) &&
    !empty($_POST['servicio1']) && !empty($_POST['servicio2']) && !empty($_POST['cliente']) && !empty($_POST['producto'])
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
    $idventa = rand();
    $fecha = date('d-m-Y');
    $cantidad = $_POST['cantidad'];
    $total = $_POST['total'];
    $formaPago = $_POST['formaPago'];
    $servicio1 = $_POST['servicio1'];
    $servicio2 = $_POST['servicio2'];
    $cliente = $_POST['cliente'];
    $datoscliente = explode(",", $cliente);
    $idcliente = $datoscliente[0];
    $producto = $_POST['producto'];
    $datosProducto = explode(",", $producto);
    $idproducto = $datosProducto[0];
    $idcategoria = $datosProducto[2];
    $rutcliente = $datoscliente[1];
    $nombreProducto = $datosProducto[3];
    $nombreCategoria = $datosProducto[4];
    $idusuario = $_SESSION['idusuario'];
    $rutUsuario = $_SESSION['rut'];
    echo $idusuario;
    
    //Ingresar venta
    $query = "INSERT INTO `venta`(`idventa`,`fecha`, `promociones`, `monto_promocion`, `cantidad`, `total`, `forma_pago`, `servicio1`, `servicio2`, `cliente_idcliente`)
               VALUES        ('$idventa','$fecha','$promocion','$totalPromocion','$cantidad','$total','$formaPago','$servicio1','$servicio2','$idcliente')";
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
    //Ingresar boleta
    $query = "INSERT INTO `boleta`(`producto_idproducto`, `producto_categoria_idcategoria`, `venta_idventa`, `venta_cliente_idcliente`, `usuario_idusuario`) 
               VALUES         ('$idproducto','$idcategoria','$idventa','$idcliente','$idusuario')";
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
    //Ingresar historial boleta
    $_SESSION['rutClienteVenta'] = $rutcliente;
    $_SESSION['idVenta'] = $idventa;
    $_SESSION['fechaVenta'] = $fecha;
    $_SESSION['nombreProductoVenta'] = $nombreProducto;
    $_SESSION['nombreCategoriaVenta'] = $nombreCategoria;
    $_SESSION['promocionVenta'] = $promocion;
    $_SESSION['totalPromocionVenta'] = $totalPromocion;
    $_SESSION['cantidadVenta'] = $cantidad;
    $_SESSION['totalVenta'] = $total;
    $query = "INSERT INTO `historial_boleta`(`rutCliente`, `rutVendedor`, `codigoVenta`, `fechaEmision`, `nombreProducto`, `categoriaProducto`, `promocion`, `valorPromocion`, `cantidadProducto`,`total`)
               VALUES                   ('$rutcliente','$rutUsuario',$idventa,'$fecha','$nombreProducto','$nombreCategoria','$promocion','$totalPromocion','$cantidad','$total')";
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
    //Actualizar stock
    $query = "UPDATE `producto` SET `cantidad`= producto.cantidad - $cantidad WHERE producto.idproducto = $idproducto";
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
    //Cuando se acaba el stock
    $query = "UPDATE producto 
             SET estado = CASE
            WHEN cantidad = 0 
            THEN 'No disponible'
            WHEN cantidad > 0
            THEN 'Disponible'
             END
           WHERE idproducto =  $idproducto";
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
    header("Location: ../../detallesBoleta.php");
  } else {
    header("Location: ../../negocio.php");
  }
} else {
  header("Location: ../../negocio.php");
}
