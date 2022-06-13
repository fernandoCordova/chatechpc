<?php
require_once "recursos/conexionBD.php";
session_start();
if ($_SESSION['estado'] == 'Inactivo' || $_SESSION['estado'] == '') {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<style>
input:invalid,
textarea:invalid {
  border-color: red;
}
</style>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>CRUD clientes</title>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
  </script>
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
            <a class="nav-link collapsed active" href="#" data-bs-toggle="collapse" data-bs-target="#clientes" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
              Clientes
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="clientes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link active" href="administrar_clientes.php">Administrar clientes</a>
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
                <a class="nav-link" href="administrar_categoriasProductos.php">Administrar categorías</a>
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
          <h1 class="mt-4">Módulo de clientes</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
            <li class="breadcrumb-item active">Administrar clientes</li>
          </ol>
          <div class="card mb-4">
            <div class="card-body">
              <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Agregar
                cliente</button>
            </div>
          </div>
          <div class="card mb-4" id="tablausuarios">
            <div class="card-header">
              <i class="fas fa-table me-1"></i> Listado de clientes
            </div>
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr>
                    <th>RUT</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Edad</th>
                    <th>Cedula</th>
                    <th>estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT `idcliente`,`rut`,`nombres`,`apellidos`,`direccion`,`telefono`,`correo`,`edad`,`cedula`,`estado` FROM `cliente` WHERE 1";
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
                      <td><a target="_blank" href="<?php echo $ver[8] ?>">Imagen</a></td>
                      <td><?php echo $ver[9] ?></td>
                      <th>
                        <button onclick="GetUserDetails('<?php echo $ver[0] ?>')" class="btn btn-warning">Modificar</button>
                        <button onclick="DeleteUser('<?php echo $ver[0] ?>')" class="btn btn-danger">Eliminar</button>
                      </th>
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
  <!-- Modal - agregar cliente -->
  <div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="datosAgregar"></div>
          <div class="form-group">
            <label for="RUN">RUT</label>
            <input type="text" id="rut" class="form-control" placeholder="Ingrese el RUN del usuario" minlength="9" maxlength="10" require />
            <div id="errorRut"></div>
          </div>
          <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" id="correo" class="form-control" placeholder="Ingrese el correo del usuario" minlength="1" maxlength="100" require />
            <div id="errorCorreo"></div>
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" class="form-control" placeholder="Ingrese el teléfono del usuario" minlength="1" maxlength="11" require />
            <div id="errorTelefono"></div>
          </div>
          <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" class="form-control" placeholder="Ingrese la dirección del usuario" minlength="1" maxlength="100" require />
            <div id="errorDireccion"></div>
          </div>
          <div class="form-group">
            <label for="nombre">Nombres:</label>
            <input type="text" id="nombre" class="form-control" placeholder="Ingrese los nombres del usuario" minlength="1" maxlength="100" require />
            <div id="errorNombre"></div>
          </div>
          <div class="form-group">
            <label for="apellido">Apellidos:</label>
            <input type="text" id="apellido" class="form-control" placeholder="Ingrese los apellidos del usuario" minlength="1" maxlength="100" require />
            <div id="errorApellido"></div>
          </div>
          <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" id="edad" class="form-control" placeholder="Ingrese la edad del usuario" min="14" max="100" require />
            <div id="errorEdad"></div>
          </div>
          <div class="form-group">
            <label for="cedula">Cedula:</label>
            <input type="text" id="cedula" class="form-control" placeholder="Ingrese el enlace de la imagen del usuario" minlength="1" maxlength="100" require />
            <div id="errorImagen"></div>
          </div>
          <div class="form-group">
            <label for="estado">Seleccionar el estado:</label>
            <select class="form-control" id="estado" require>
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
            <div id="errorEstado"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success" onclick="addRecord()">Agregar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- // Modal -->
  <!-- Modal - Modificar cliente -->
  <div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Actualizar cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="datosAgregar"></div>
          <div class="form-group">
            <label for="RUN">RUT</label>
            <input type="text" id="update_rut" class="form-control" placeholder="Ingrese el RUN del usuario" minlength="9" maxlength="10" require />
            <div id="update_errorRut"></div>
          </div>
          <div class="form-group">
            <label for="correo">Correo:</label>
            <input type="email" id="update_correo" class="form-control" placeholder="Ingrese el correo del usuario" minlength="1" maxlength="100" require />
            <div id="update_errorCorreo"></div>
          </div>
          <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" id="update_telefono" class="form-control" placeholder="Ingrese el teléfono del usuario" minlength="1" maxlength="11" require />
            <div id="update_errorTelefono"></div>
          </div>
          <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" id="update_direccion" class="form-control" placeholder="Ingrese la dirección del usuario" minlength="1" maxlength="100" require />
            <div id="update_errorDireccion"></div>
          </div>
          <div class="form-group">
            <label for="nombre">Nombres:</label>
            <input type="text" id="update_nombre" class="form-control" placeholder="Ingrese los nombres del usuario" minlength="1" maxlength="100" require />
            <div id="update_errorNombre"></div>
          </div>
          <div class="form-group">
            <label for="apellido">Apellidos:</label>
            <input type="text" id="update_apellido" class="form-control" placeholder="Ingrese los apellidos del usuario" minlength="1" maxlength="100" require />
            <div id="update_errorApellido"></div>
          </div>
          <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" id="update_edad" class="form-control" placeholder="Ingrese la edad del usuario" min="14" max="100" require />
            <div id="update_errorEdad"></div>
          </div>
          <div class="form-group">
            <label for="cedula">Cedula:</label>
            <input type="text" id="update_cedula" class="form-control" placeholder="Ingrese el enlace de la imagen del usuario" minlength="1" maxlength="100" require />
            <div id="update_errorImagen"></div>
          </div>
          <div class="form-group">
            <label for="estado">Seleccionar el estado:</label>
            <select class="form-control" id="update_estado" require>
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
            <div id="update_errorEstado"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-warning" onclick="UpdateUserDetails()">Guardar Cambios</button>
          <input type="hidden" id="hidden_user_id">
        </div>
      </div>
    </div>
  </div>
  <!-- // Modal -->
  <!--DEPENDENCIAS JS DE BOOTSTRAP-->
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="https://unpkg.com/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!--DEPENDENCIAS JS DE LA PLANTILLA-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>
  <script src="js/simple-datatables@latest.js" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
  <script src="js/moduloClientes.js"></script>
</body>

</html>