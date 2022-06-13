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
  <title>VENTA</title>
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
            <div class="sb-sidenav-menu-heading">Módulos</div>
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
            <div class="col">
              <form action="clases/venta/venta.php" method="POST">
                <div class="form-group">
                  <h1 class="text-center">Venta de productos</h1>
                  <h5>Datos del cliente</h5>
                  <select class="form-control" id="cliente" name="cliente">
                    <option value="">Seleccione el cliente que desea realizar la compra</option>
                    <?php
                    $sql = "SELECT * FROM cliente WHERE estado = 'Activo'";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($ver = mysqli_fetch_row($resultado)) {
                    ?>
                      <option value="<?php echo $ver[0] ?>,<?php echo $ver[1] ?>">
                        <?php echo "RUT: " . $ver[1] . " | Nombre y apellido: " . $ver[2] . " " . $ver[3] . " | Correo: " . $ver[6] ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <h5>Datos del producto</h5>
                  <select class="form-control" id="producto" name="producto">
                    <option value="">Seleccione el producto</option>
                    <?php
                    $sql = "SELECT producto.idproducto, producto.nombre, producto.cantidad, producto.precio,producto.estado, categoria.idcategoria, categoria.nombre 
                          FROM producto 
                    INNER JOIN categoria 
                            ON categoria.idcategoria = producto.categoria_idcategoria 
                         WHERE producto.estado='Disponible'";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($ver = mysqli_fetch_row($resultado)) {
                    ?>
                      <option value="<?php echo $ver[0] ?>,<?php echo $ver[3] ?>,<?php echo $ver[5] ?>,<?php echo $ver[1] ?>,<?php echo $ver[6] ?>,<?php echo $ver[4] ?>,<?php echo $ver[2] ?>">
                        <?php echo "Producto: " . $ver[1] . " | Cantidad disponible: " . $ver[2] . " | Precio: " . $ver[3] . " | Estado: " . $ver[4] . " | Categoria: " . $ver[6] ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <h5>Datos de la venta</h5>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Fecha actual:</label>
                    <input type="text" class="form-control" id="fecha" name="fecha" value="<?php echo date('d-m-Y') ?>" disabled>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="isProductDiscounted">¿Se aplica algún descuento?</label>
                    <div class="btn-group w-100" data-toggle="buttons" name="isProductDiscounted">
                      <label class="btn btn btn-blue-grey waves-effect w-50 form-check-label active">
                        <input id="isDiscounted" class="form-check-input" name="isDiscounted" type="radio" value=0 th:field="*{discounted}" autocomplete="off" checked> No aplica
                      </label>
                      <label class="btn btn btn-blue-grey waves-effect form-check-label w-50">
                        <input id="isNotDiscounted" class="form-check-input" name="isDiscounted" type="radio" value=1 th:field="*{discounted}"> Si aplica
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="pago">Método de pago</label>
                    <select class="custom-select" id="formaPago" name="formaPago">
                      <option value="" selected>Seleccione un método de pago</option>
                      <option value="Transferencia">Pago en linea / Transferencia</option>
                      <option value="Credito">Tarjeta de crédito</option>
                      <option value="Debito">Tarjeta de débito</option>
                      <option value="Paypal">Paypal</option>
                    </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="descuento">Monto del descuento: </label>
                    <input type="number" class="form-control" id="discountPercentage" th:field="*{discountPercentage}"  name="descuento" value="0" disabled>
                    <small class="form-text text-danger" th:if="${#fields.hasErrors('discountPercentage')}" th:errors="*{discountPercentage}"></small>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Servicios adicionales 1:</label>
                    <select class="form-control" id="servicio1" name="servicio1">
                    <option value="No aplica">No aplica</option>
                    <?php
                    $sql = "SELECT * 
                              FROM servicio
                             WHERE servicio.estado='Disponible'";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($ver = mysqli_fetch_row($resultado)) {
                    ?>
                      <option value="<?php echo $ver[0] ?>,<?php echo $ver[1] ?>,<?php echo $ver[2] ?>">
                       <?php echo "Servicio: " . $ver[1] . " | Precio: " . $ver[2] . " | Estado: " . $ver[3] ?>
                      </option>
                    <?php
                    }
                    ?>
                  </select>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Servicios adicionales 2:</label>
                    <select class="form-control" id="servicio2" name="servicio2">
                    <option value="No aplica">No aplica</option>
                    <?php
                    $sql = "SELECT * 
                              FROM servicio
                             WHERE servicio.estado='Disponible'";
                    $resultado = mysqli_query($conexion, $sql);
                    while ($ver = mysqli_fetch_row($resultado)) {
                    ?>
                      <option value="<?php echo $ver[0] ?>,<?php echo $ver[1] ?>,<?php echo $ver[2] ?>"><?php echo "Servicio: " . $ver[1] . " | Precio: " . $ver[2] . " | Estado: " . $ver[3] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                  <label for="cantidad">Cantidad:</label>
                    <input type="number" class="form-control" id="cantidad" value="0" name="cantidad">
                  </div>
                </div>
                <hr>
                <div class="form-group col-md-6">
                    <h5 id="total">
                      Precio del producto: 
                      <br>
                      Precio del servicio 1: 
                      <br>
                      Precio del servicio 2:
                      <br>
                      Cantidad:
                      <br>
                      Total descuento: 
                      <br>
                      <hr style="width:30%;">
                      TOTAL:
                    </h5>
                  </div>
                <button type="submit" class="btn btn-success" disabled id="registrar">Realizar venta</button>
              </form>
              <hr>
              <button class="btn btn-info" onclick="calcularTotal();">Calcular total</button>
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
  <script src="js/moduloVentas.js"></script>
  <script type="javascript"></script>
</body>

</html>