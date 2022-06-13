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
  <title>HISTORIAL OT</title>
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
            <a class="nav-link active" href="historialOT.php">
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
          <h1 class="mt-4">Historial de OT</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
            <li class="breadcrumb-item active">Historial de OT</li>
          </ol>
          <div class="card mb-4">
          </div>
          <div class="card mb-4" id="tablausuarios">
            <div class="card-header">
              <i class="fas fa-table me-1"></i> Historial
            </div>
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr>
                    <th>Codigo</th>
                    <th>Fecha</th>
                    <th>Rut cliente</th>
                    <th>Rut empleado</th>
                    <th>Servicio</th>
                    <th>Fecha termino</th>
                    <th>Forma pago</th>
                    <th>Promocion</th>
                    <th>Valor promocion</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM `historial_ot`";
                  $resultado = mysqli_query($conexion, $sql);
                  while ($ver = mysqli_fetch_row($resultado)) {
                  ?>
                    <tr>
                      <td><?php echo $ver[1] ?></td>
                      <td><?php echo $ver[2] ?></td>
                      <td><?php echo $ver[3] ?></td>
                      <td><?php echo $ver[4] ?></td>
                      <td><?php echo $ver[5] ?></td>
                      <td><?php echo $ver[6] ?></td>
                      <td><?php echo $ver[7] ?></td>
                      <td><?php echo $ver[8] ?></td>
                      <td>$<?php echo $ver[9] ?></td>
                      <td>$<?php echo $ver[10] ?></td>
                    </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
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
  <!-- Modal - agregar usuario -->
  <div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload();">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="rut">RUT:</label>
            <input type="text" id="rut" value="" class="form-control" placeholder="Ingrese el rut" />
          </div>
          <div class="form-group">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" id="usuario" value="" class="form-control" placeholder="Ingrese el nombre de usuario" />
          </div>
          <div class="form-group">
            <label for="clave">Clave:</label>
            <input type="text" id="clave" value="" class="form-control" placeholder="Ingrese la contraseña" />
          </div>
          <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" id="correo" value="" class="form-control" placeholder="Ingrese el correo" />
          </div>
          <div class="form-group">
            <label for="telefono">Telefono:</label>
            <input type="email" id="telefono" value="" class="form-control" placeholder="Ingrese el Telefono" />
          </div>
          <div class="form-group">
            <label for="direccion">Direccion:</label>
            <input type="text" id="direccion" value="" class="form-control" placeholder="Ingrese la direccion" />
          </div>
          <div class="form-group">
            <label for="nombre">Nombres:</label>
            <input type="text" id="nombre" value="" class="form-control" placeholder="Ingrese los nombres" />
          </div>
          <div class="form-group">
            <label for="apellido">Apellidos:</label>
            <input type="text" id="apellido" value="" class="form-control" placeholder="Ingrese los apellidos" />
          </div>
          <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" value="" class="form-control" placeholder="Ingrese la edad" />
          </div>
          <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="text" id="imagen" value="" class="form-control" placeholder="Ingrese el enlace de la imagen" />
          </div>
          <div class="form-group">
            <label for="tipo">Seleccionar el tipo de usuario:</label>
            <select class="form-control" id="tipo">
              <option value="Administrador">Administrador</option>
              <option value="Bodeguero">Bodeguero</option>
            </select>
          </div>
          <div class="form-group">
            <label for="estado">Seleccionar el estado:</label>
            <select class="form-control" id="estado">
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.reload();">Cancelar</button>
          <button type="button" class="btn btn-success" onclick="addRecord()">Agregar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- // Modal -->
  <!-- Modal - Modificar usuario -->
  <div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Actualizar usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="window.location.reload();">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="update_rut">RUT:</label>
            <input type="text" id="update_rut" value="" class="form-control" placeholder="Ingrese el rut" />
          </div>
          <div class="form-group">
            <label for="update_usuario">Nombre de usuario:</label>
            <input type="text" id="update_usuario" value="" class="form-control" placeholder="Ingrese el nombre de usuario" />
          </div>
          <div class="form-group">
            <label for="update_clave">Clave:</label>
            <input type="text" id="update_clave" value="" class="form-control" placeholder="Ingrese la contraseña" />
          </div>
          <div class="form-group">
            <label for="update_correo">Correo:</label>
            <input type="email" id="update_correo" value="" class="form-control" placeholder="Ingrese el correo" />
          </div>
          <div class="form-group">
            <label for="update_telefono">Telefono:</label>
            <input type="email" id="update_telefono" value="" class="form-control" placeholder="Ingrese el Telefono" />
          </div>
          <div class="form-group">
            <label for="update_direccion">Direccion:</label>
            <input type="text" id="update_direccion" value="" class="form-control" placeholder="Ingrese la direccion" />
          </div>
          <div class="form-group">
            <label for="update_nombre">Nombres:</label>
            <input type="text" id="update_nombre" value="" class="form-control" placeholder="Ingrese los nombres" />
          </div>
          <div class="form-group">
            <label for="update_apellido">Apellidos:</label>
            <input type="text" id="update_apellido" value="" class="form-control" placeholder="Ingrese los apellidos" />
          </div>
          <div class="form-group">
            <label for="update_edad">Edad:</label>
            <input type="number" id="update_edad" value="" class="form-control" placeholder="Ingrese la edad" />
          </div>
          <div class="form-group">
            <label for="update_imagen">Imagen:</label>
            <input type="text" id="update_imagen" value="" class="form-control" placeholder="Ingrese el enlace de la imagen" />
          </div>
          <div class="form-group">
            <label for="update_tipo">Seleccionar el tipo de usuario:</label>
            <select class="form-control" id="update_tipo">
              <option value="Administrador">Administrador</option>
              <option value="Bodeguero">Bodeguero</option>
            </select>
          </div>
          <div class="form-group">
            <label for="update_estado">Seleccionar el estado:</label>
            <select class="form-control" id="update_estado">
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.reload();">Cancelar</button>
          <button type="button" class="btn btn-warning" onclick="UpdateUserDetails()">Guardar Cambios</button>
          <input type="hidden" id="hidden_user_id">
        </div>
      </div>
    </div>
  </div>
  <?php
  mysqli_close($conexion);
  ?>
  <!-- // Modal -->
  <!--DEPENDENCIAS JS DE BOOTSTRAP-->
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!--DEPENDENCIAS JS DE LA PLANTILLA-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script src="js/simple-datatables@latest.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
  <script src="js/moduloUsuarios.js"></script>
  <script type="javascript"></script>
</body>

</html>