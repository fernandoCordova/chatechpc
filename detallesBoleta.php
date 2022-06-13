<?php
session_start();
if ($_SESSION['estado'] == 'Inactivo' || $_SESSION['estado'] == '') {
  header('Location: index.php');
}
require_once "recursos/conexionBD.php";
if (isset($_SESSION['totalVenta']) || !empty($_SESSION['totalVenta'])) {
  $rutcliente = $_SESSION['rutClienteVenta'];
  $idventa = $_SESSION['idVenta'];
  $fecha = $_SESSION['fechaVenta'];
  $nombreProducto = $_SESSION['nombreProductoVenta'];
  $nombreCategoria = $_SESSION['nombreCategoriaVenta'];
  $promocion = $_SESSION['promocionVenta'];
  $totalPromocion = $_SESSION['totalPromocionVenta'];
  $cantidad = $_SESSION['cantidadVenta'];
  $total = $_SESSION['totalVenta'];
} else {
  header("Location: negocio.php");
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>BOLETA</title>
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
            <div class="sb-sidenav-menu-heading">Modulos</div>
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
                <a class="nav-link" href="administrar_categoriasProductos.php">Administrar categorias</a>
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
            <a class="nav-link active" href="negocio.php">
              <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
              Ventas
            </a>
            <a class="nav-link" href="ot.php">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Ordenes de trabajo
            </a>
            <a class="nav-link" href="compras.php">
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
          <h1 class="mt-4">Módulo de ventas</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar ventas</li>
          </ol>
          <hr>
          <div class="row">
            <h2 class="text-center">Resumen de la boleta</h2>
            <div class="col" align="center">
              <div class="col"></div>
              <form id="form1">
                <div class="col-6" style="border-style: solid; border-color: black;" id="dvContainer">
                  <img src="assets/img/logo.PNG" alt="" class="img-fluid mt-2" width="200">
                  <h3>BOLETA DE VENTA</h3>
                  <hr>
                  <h5>RUT cliente: <?php echo $rutcliente ?></h5>
                  <h5>RUT vendedor: <?php echo $_SESSION['rut']?></h5>
                  <h5>Codigo de venta: <?php echo $idventa ?></h5>
                  <h5>CHATECHPC - Direccion de la empresa</h5>
                  <h5>Fecha de emisíon: <?php echo $fecha ?></h5>
                  <div class="table-responsive">
                    <table class="table table-bordered" align="center">
                      <thead>
                        <tr>
                          <th scope="col">Producto</th>
                          <th scope="col">Categoria</th>
                          <th scope="col">Promocion</th>
                          <th scope="col">Valor promocion</th>
                          <th scope="col">cantidad</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo $nombreProducto ?></td>
                          <td><?php echo $nombreCategoria ?></td>
                          <td><?php echo $promocion ?></td>
                          <td><?php echo $totalPromocion ?></td>
                          <td><?php echo $cantidad ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <hr>
                  <h3 class="mb-2">TOTAL: $<?php echo $total ?></h3>
                </div>
                <div class="col"></div>
                <hr>
                <button type="button" class="btn btn-success" value="Guardar PDF de la boleta" id="btnPrint"> Guardar PDF de la boleta</button>
                <a href="negocio.php" type="button" class="btn btn-link">Volver al modulo de ventas</a>
              </form>
            </div>
          </div>
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
  <script src="js/moduloVentas.js"></script>
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
      printWindow.document.write('<body align="center">');
      printWindow.document.write(divContents);
      printWindow.document.write('</body></html>');
      printWindow.document.close();
      printWindow.print();
    });
  </script>

</body>

</html>
<?php
unset($_SESSION['rutClienteVenta']);
unset($_SESSION['idVenta']);
unset($_SESSION['fechaVenta']);
unset($_SESSION['nombreProductoVenta']);
unset($_SESSION['nombreCategoriaVenta']);
unset($_SESSION['promocionVenta']);
unset($_SESSION['totalPromocionVenta']);
unset($_SESSION['cantidadVenta']);
unset($_SESSION['totalVenta']);
?>