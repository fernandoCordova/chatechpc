<?php
require_once "recursos/conexionBD.php";
session_start();
if ($_SESSION['estado'] == 'Inactivo' || $_SESSION['estado'] == '') {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>COMPRAS</title>
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
          <h1 class="mt-4">Módulo de compras a proveedores</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar compras</li>
          </ol>
          <hr>
          <div class="row">
            <div class="col">
              <form action="clases/compras/compras.php" method="POST">
                <div class="form-group">
                  <h1 class="text-center">Compras</h1>
                  <h5>Datos del proveedor</h5>
                  <select class="form-control" id="proveedor" name="proveedor">
                    <option value="">Seleccione el proveedor</option>
                    <?php
                    $sql = "SELECT * 
                              FROM proveedor 
                             WHERE proveedor.estado = 'Activo'";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($ver = mysqli_fetch_row($resultado)) {
                    ?>
                      <option value="<?php echo $ver[0] ?>,<?php echo $ver[1] ?>,<?php echo $ver[2] ?>,<?php echo $ver[3] ?>,<?php echo $ver[6] ?>,<?php echo $ver[7] ?>">
                        <?php echo "Nombre: " . $ver[1] . " | Direccion: " . $ver[4] . " | Pais: " . $ver[5] . " | Correo: " . $ver[7] . " | Telefono: " . $ver[6] ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <h5>Datos de la compra</h5>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha actual:</label>
                    <input type="text" class="form-control" name="fecha" id="fecha" value="<?php echo date('d-m-Y') ?>" disabled>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="">Seleccione el producto que va a comprar</label>
                    <br>
                    <select class="form-control" id="producto" name="producto">
                      <option value="">Seleccione un producto</option>
                      <?php
                      $sql = "SELECT * 
                              FROM producto";
                      $resultado = mysqli_query($conexion, $sql);
                      while ($ver = mysqli_fetch_row($resultado)) {
                      ?>
                        <option value="<?php echo $ver[0] ?>,<?php echo $ver[1] ?>">
                          <?php echo "Nombre: " . $ver[1] . " | Estado: " . $ver[2] ?>
                        </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="">Seleccione la categoria del producto</label>
                    <br>
                    <select class="form-control" id="categoria" name="categoria">
                      <option value="">Seleccione una categoria</option>
                      <?php
                      $sql = "SELECT * 
                              FROM categoria 
                             WHERE categoria.estado = 'Disponible'";
                      $resultado = mysqli_query($conexion, $sql);
                      while ($ver = mysqli_fetch_row($resultado)) {
                      ?>
                        <option value="<?php echo $ver[0] ?>,<?php echo $ver[1] ?>">
                          <?php echo "Nombre: " . $ver[1] . " | Estado: " . $ver[2] ?>
                        </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Cantidad:</label>
                    <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese una cantidad">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Precio:</label>
                    <input type="number" class="form-control" name="precio" id="precio" placeholder="Ingrese un precio">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha estimada de llegada:</label>
                    <input type="date" class="form-control" name="fechaLlegada" id="fechaLlegada">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pago">Metodo de pago</label>
                    <select class="custom-select" id="formaPago" name="formaPago">
                      <option value="" selected>Seleccione un metodo de pago</option>
                      <option value="Transferencia">Pago en linea / Transferencia</option>
                      <option value="Credito">Tarjeta de credito</option>
                      <option value="Debito">Tarjeta de debito</option>
                      <option value="Paypal">Paypal</option>
                    </select>
                  </div>
                </div>
                <hr>
                <div class="form-group col-md-6">
                  <h5 id="total">
                    Precio del servicio:
                    <br>
                    Total descuento:
                    <br>
                    <hr style="width:30%;">
                    TOTAL:
                  </h5>
                </div>
                <button type="submit" class="btn btn-success" disabled id="registrar">Generar factura</button>
              </form>
              <hr>
              <button class="btn btn-success" onclick="calcularTotal()">Calcular total</button>
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
  <?php
  mysqli_close($conexion);
  ?>
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
  <script src="js/moduloCompras.js"></script>
  <script type="javascript"></script>
</body>

</html>