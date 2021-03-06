<?php
session_start();
require_once "recursos/conexionBD.php";
if ($_SESSION['estado'] == 'Inactivo' || $_SESSION['estado'] == '') {
  header('Location: index.php');
}
if (isset($_SESSION['total']) || !empty($_SESSION['total'])) {
  $idfactura = $_SESSION['idfactura'];
  $fecha = $_SESSION['fecha'];
  $fechaLlegada = $_SESSION['fechaLlegada'];
  $nombreProveedor = $_SESSION['nombreProveedor'];
  $nombreContacto = $_SESSION['nombreContacto'];
  $cargoContacto = $_SESSION['cargoContacto'];
  $telefonoContacto = $_SESSION['telefonoContacto'];
  $correoContacto = $_SESSION['correoContacto'];
  $nombreProducto = $_SESSION['nombreProducto'];
  $formaPago = $_SESSION['formaPago'];
  $precio = $_SESSION['precio'];
  $cantidad = $_SESSION['cantidad'];
  $total = $_SESSION['total'];
} else {
  header("Location: compras.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>OT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- ICONO DE LA PAGINA -->
  <link href="assets/img/logo.PNG" rel="icon">
  <link href="assets/img/logo.PNG" rel="apple-touch-icon">
  <!--DEPENDENCIAS CSS DE LA BOOTSTRAP-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!--DEPENDENCIAS CSS DE LA PLANTILLA-->
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
  <!--Navbar-->
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Icono de la empresa-->
    <a class="navbar-brand ps-3" href="home.php">CHATECHPC</a>
    <!-- Boton para minimizar la barra de opciones-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar con las opciones de perfil/cerrar sesion-->
    <ul class="navbar-nav ms-auto ms-auto me-0 me-md-3 my-2 my-md-0">
      <li class=" nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item " href="perfil.php">Perfil</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="clases/login/cerrarSesion.php">Cerrar sesion</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  <!--//Navbar-->
  <div id="layoutSidenav">
    <!--Barra de opciones-->
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <!--modulos-->
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Principal</div>
            <a class="nav-link" href="home.php">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Inicio
            </a>
            <div class="sb-sidenav-menu-heading">M??dulos</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#usuarios" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Usuarios
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="usuarios" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="administrar_usuarios.php">Administrar usuarios</a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#clientes" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Clientes
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="clientes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="administrar_clientes.php">Administrar clientes</a>
              </nav>
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="administrar_equipos.php">Administrar equipos</a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#productos" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Productos
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="productos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="administrar_productos.php">Administrar productos</a>
              </nav>
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="administrar_categoriasProductos.php">Administrar categor??as</a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#servicios" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Servicios
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="servicios" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="administrar_servicios.php">Administrar servicios</a>
              </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#proveedores" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Proveedores
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="proveedores" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="administrar_proveedores.php">Administrar proveedores</a>
              </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Negocio</div>
            <a class="nav-link" href="negocio.php">
              <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
              Ventas
            </a>
            <a class="nav-link" href="ot.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Ordenes de trabajo
            </a>
            <a class="nav-link active" href="compras.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Compras
            </a>
            <div class="sb-sidenav-menu-heading">Historial</div>
            <a class="nav-link" href="historialBoleta.php">
              <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
              Historial de boletas
            </a>
            <a class="nav-link" href="historialFactura.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Historial de facturas
            </a>
            <a class="nav-link" href="historialOT.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Historial de OT
            </a>
          </div>
          <!--fin modulos-->
        </div>
        <div class="sb-sidenav-footer">
          <div class="small"> <?php echo "Nombre: " . $_SESSION['nombres'] . " " . $_SESSION['tipo_usuario'] ?></div>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">M??dulo de compras</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar compras</li>
          </ol>
          <hr>
          <form id="form1">
            <div id="dvContainer">
              <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                  <div class="row">
                    <div class="col-4 text-center">
                      <img src="assets/img/logo.PNG" alt="" class="img-fluid mt-2" width="200">
                    </div>
                    <div class="col-8">
                      <h1>CHATECHPC</h1>
                      <h5>ID de factura: <?php echo $idfactura ?></h5>
                      <h5>Fecha emision: <?php echo $fecha ?></h5>
                      <h5>Fecha de llegada: <?php echo $fechaLlegada ?></h5>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-6">
                      <h4>Datos del proveedor</h4>
                      <h5>Nombre: <?php echo $nombreProveedor ?></h5>
                      <h5>Nombre de contacto: <?php echo $nombreContacto ?></h5>
                      <h5>Cargo de contacto: <?php echo $cargoContacto ?></h5>
                      <h5>Telefono: <?php echo $telefonoContacto ?></h5>
                      <h5>Correo: <?php echo $correoContacto ?></h5>
                    </div>
                    <div class="col-6">
                      <h4>Datos de la empresa</h4>
                      <h5>Nombre: CHATECHPC</h5>
                      <h5>Telefono: 151618661</h5>
                      <h5>Correo: CHATECHPC@CHATECHPC.com</h5>
                      <h5>Responsable: <?php echo $_SESSION['nombres'] . " " . $_SESSION['apellidos'] ?></h5>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-12">
                      <h4>Datos del producto</h4>
                      <h5>Nombre del producto: <?php echo $nombreProducto ?></h5>
                      <h5>Cantidad: <?php echo $cantidad ?></h5>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-12">
                      <h4>Datos del pago</h4>
                      <h5>Metodo de pago: <?php echo $formaPago ?></h5>
                      <h5>Precio del producto: $<?php echo $precio ?></h5>
                      <h5>Total: $<?php echo $total ?></h5>
                    </div>
                  </div>
                </div>
                <div class="col-2"></div>
              </div>
            </div>
            <hr>
            <div class="text-center">
              <button type="button" class="btn btn-success" value="Guardar PDF de la boleta" id="btnPrint"> Guardar PDF de la factura</button>
              <a href="compras.php" type="button" class="btn btn-link">Volver al modulo de compras</a>
            </div>
          </form>
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; CHATECHPC 2021</div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <?php
  mysqli_close($conexion);
  ?>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript">
    $("#btnPrint").live("click", function() {
      var divContents = $("#dvContainer").html();
      var printWindow = window.open('', '', 'height=400,width=800');
      printWindow.document.write('<html>');
      printWindow.document.write('<head>' +
        '<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />' +
        '<link href="css/styles.css" rel="stylesheet" />' +
        '<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />' +
        '</head>');
      printWindow.document.write('<body>');
      printWindow.document.write(divContents);
      printWindow.document.write('</body>');
      printWindow.document.write('</html>');
      printWindow.document.close();
      printWindow.print();
    });
  </script>
  <!--DEPENDENCIAS JS DE BOOTSTRAP-->
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <!--DEPENDENCIAS JS DE LA PLANTILLA-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="js/simple-datatables@latest.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
<?php
unset($_SESSION['idfactura']);
unset($_SESSION['fecha']);
unset($_SESSION['fechaLlegada']);
unset($_SESSION['nombreProveedor']);
unset($_SESSION['nombreContacto']);
unset($_SESSION['cargoContacto']);
unset($_SESSION['telefonoContacto']);
unset($_SESSION['correoContacto']);
unset($_SESSION['nombreProducto']);
unset($_SESSION['formaPago']);
unset($_SESSION['precio']);
unset($_SESSION['cantidad']);
unset($_SESSION['total']);
?>