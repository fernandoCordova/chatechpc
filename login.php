<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>LOGIN</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- ICONO DE LA PAGINA -->
    <link href="assets/img/logo.PNG" rel="icon">
    <link href="assets/img/logo.PNG" rel="apple-touch-icon">
    <!-- ESTILOS DE LA PLANTILLA -->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <!-- FORMULARIO PARA LOGIN -->
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Iniciar sesión</h3>
                                </div>
                                <div class="card-body">
                                    <form action="clases/login/ingresar.php" method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="usuario" type="text" placeholder="name@example.com" name="usuario" />
                                            <label for="inputEmail">Usuario</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="clave" type="password" placeholder="Password" name="clave" />
                                            <label for="inputPassword">Contraseña</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input type="submit" class="btn btn-dark" value="Ingresar" onclick="validarLogin()">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- FIN LOGIN -->
            </main>
        </div>
        <!-- FOOTER -->
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; CHATECHPC 2021</div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- FIN FOOTER -->
    </div>
    <!-- JS DE LA PLANTILLA -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="js/login.js"></script>
</body>

</html>