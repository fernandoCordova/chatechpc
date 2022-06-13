<?php
session_start();
include("../../recursos/conexionBD.php");
if (
  isset($_POST['proveedor'])   && isset($_POST['producto'])  && isset($_POST['categoria']) &&
  isset($_POST['cantidad']) && isset($_POST['precio']) && isset($_POST['fechaLlegada'])  && isset($_POST['formaPago'])
) {
  if (
    !empty($_POST['proveedor'])   && !empty($_POST['producto'])  && !empty($_POST['categoria']) &&
    !empty($_POST['cantidad']) && !empty($_POST['precio']) && !empty($_POST['fechaLlegada']) && !empty($_POST['formaPago'])
  ) {
    $idfactura = rand();
    $fecha = date('d-m-Y');
    $proveedor = $_POST['proveedor'];
    $datosProveedor = explode(",", $proveedor);
    $idproveedor = $datosProveedor[0];
    $nombreProveedor = $datosProveedor[1];
    $nombreContacto = $datosProveedor[2];
    $cargoContacto = $datosProveedor[3];
    $telefonoContacto = $datosProveedor[4];
    $correoContacto = $datosProveedor[5];
    $producto = $_POST['producto'];
    $datosProductos = explode(",", $producto);
    $idproducto = $datosProductos[0];
    $nombreProducto = $datosProductos[1];
    $categoria = $_POST['categoria'];
    $datosCategorias = explode(",", $categoria);
    $idCategoria = $datosCategorias[0];
    $nombreCategoria = $datosCategorias[1];
    $precio = $_POST['precio'];
    $fechaLlegada = $_POST['fechaLlegada'];
    $formaPago = $_POST['formaPago'];
    $total = $_POST['total'];
    $cantidad = $_POST['cantidad'];
    $idusuario = $_SESSION['idusuario'];
    $rutUsuario = $_SESSION['rut'];
    //Ingresar factura
    $query = "INSERT INTO `factura`(`idfactura`, `proveedor_idproveedor`, `producto_idproducto`, `producto_categoria_idcategoria`, `usuario_idusuario`,
                                   `producto`, `fecha`, `fechaLlegada`, `cantidad`, `precio`, `total`, `metodo_pago`)
                   VALUES ('$idfactura','$idproveedor','$idproducto','$idCategoria','$idusuario','$nombreProducto','$fecha','$fechaLlegada','$cantidad','$precio','$total','$formaPago')";
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
    //Ingresar historial factura
    $_SESSION['idfactura'] = $idfactura;
    $_SESSION['fecha'] = $fecha;
    $_SESSION['fechaLlegada'] = $fechaLlegada;
    $_SESSION['nombreProveedor'] = $nombreProveedor;
    $_SESSION['nombreContacto'] = $nombreContacto;
    $_SESSION['cargoContacto'] = $cargoContacto;
    $_SESSION['telefonoContacto'] = $telefonoContacto;
    $_SESSION['correoContacto'] = $correoContacto;
    $_SESSION['nombreProducto'] = $nombreProducto;
    $_SESSION['formaPago'] = $formaPago;
    $_SESSION['precio'] = $precio;
    $_SESSION['cantidad'] = $cantidad;
    $_SESSION['total'] = $total;
    $query = "INSERT INTO `historial_factura`(`nombreProveedor`, `rutComprador`, `codigoFactura`, `fechaEmision`, `fechaLlegada`, `nombreProducto`,`categoriaproducto`, `cantidad`, `total`) 
                   VALUES                    ('$nombreProveedor','$rutUsuario','$idfactura','$fecha','$fechaLlegada','$nombreProducto','$nombreCategoria','$cantidad','$total')";
    if (!$result = mysqli_query($conexion, $query)) {
      exit(mysqli_error($conexion));
    }
    header("Location: ../../detalleFactura.php");
  } else {
    header("Location: ../../compras.php");
  }
} else {
  header("Location: ../../compras.php");
}
