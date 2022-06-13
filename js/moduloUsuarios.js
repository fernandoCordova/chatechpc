//Funcion para agregar un registro
function agregar() {
    //Tomamos los valores de los campos que el formulario HTML
    var rut = $("#rut").val();
    var usuario = $("#usuario").val();
    var clave = $("#clave").val();
    var correo = $("#correo").val();
    var telefono = $("#telefono").val();
    var direccion = $("#direccion").val();
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var edad = $("#edad").val();
    var imagen = $("#imagen").val();
    var tipo = $("#tipo").val();
    var estado = $("#estado").val();
    //Validamos los datos recibidos
    if (validaRut(rut) == false || validaUsuario(usuario) == false || validaClave(clave) == false || validaCorreo(correo) == false || validaTelefono(telefono) == false ||
        validaDireccion(direccion) == false || validaNombre(nombre) == false || validaApellido(apellido) == false || validaEdad(edad) == false || validaImagen(imagen) == false ||
        validaTipo(tipo) == false || validaEstado(estado) == false) {
        alert("Los datos ingresados son incorrectos");

    } else {
        //Mandamos el valor de los campos por el metodo POST a nuestro archivo PHP que se encargar de insertar el registro nuevo en la base de datos 
        $.post("clases/usuario/insertarUsuario.php", {
            rut: rut,
            usuario: usuario,
            clave: clave,
            correo: correo,
            telefono: telefono,
            direccion: direccion,
            nombre: nombre,
            apellido: apellido,
            edad: edad,
            imagen: imagen,
            tipo: tipo,
            estado: estado
        }, function(data, status) {
            // Recargar la tabla
            window.location.reload();
        });
    }
}
//Funcion para eliminar un registro
function eliminar(id) {
    //Confirmamos si realmente queremos eliminar el registro
    var conf = confirm("¿Seguro que desea eliminar el registro?");
    //Se verifica la respuesta
    if (conf == true) {
        //Se manda el ID del usuario por el metodo POST  nuestro archivo PHP que se encarga de eliminar el registro
        $.post("clases/usuario/eliminarUsuario.php", {
                id: id
            },
            function(data, status) {
                // Recargar la tabla
                window.location.reload();
            }
        );
    }
}

function obtenerInformacion(id) {
    // En el formulario HTML tenemos un campo hidden que su valor es el ID del usuario en la fila que corresponde, rescatamos el valor de ese campo hidden
    $("#hidden_user_id").val(id);
    //Mandamos el ID al archivo PHP que nos hace la consulta con la informacion del usuario
    $.post("clases/usuario/obtenerInformacionUsuario.php", {
            id: id
        },
        function(data, status) {
            // Del archivo PHP que obtiene la informacion nos llegara data, esa data la transformamos a un archivo JSON
            var usuario = JSON.parse(data);
            // Cargamos la informacion del usuario en los campos que corresponde en el formulario
            $("#update_rut").val(usuario.rut);
            $("#update_usuario").val(usuario.nombre_perfil);
            $("#update_clave").val(usuario.clave);
            $("#update_correo").val(usuario.correo);
            $("#update_telefono").val(usuario.telefono);
            $("#update_direccion").val(usuario.direccion);
            $("#update_nombre").val(usuario.nombres);
            $("#update_apellido").val(usuario.apellidos);
            $("#update_edad").val(usuario.edad);
            $("#update_imagen").val(usuario.imagen);
            $("#update_tipo").val(usuario.tipo_usuario);
            $("#update_estado").val(usuario.estado);
        }
    );
    // Abrimos el modal de modificar usuario
    $("#update_user_modal").modal("show");
}

function actualizar() {
    // Obtenemos el valor de los campos en el formulario HTML para actualizar el registro
    var rut = $("#update_rut").val();
    var usuario = $("#update_usuario").val();
    var clave = $("#update_clave").val();
    var correo = $("#update_correo").val();
    var telefono = $("#update_telefono").val();
    var direccion = $("#update_direccion").val();
    var nombre = $("#update_nombre").val();
    var apellido = $("#update_apellido").val();
    var edad = $("#update_edad").val();
    var imagen = $("#update_imagen").val();
    var tipo = $("#update_tipo").val();
    var estado = $("#update_estado").val();
    var id = $("#hidden_user_id").val();
    console.log(id);
    // Mandamos los nuevos datos al archivo PHP para actualizar el registro
    if (update_validaRut(rut) == false || update_validaUsuario(usuario) == false || update_validaClave(clave) == false || update_validaCorreo(correo) == false ||
        update_validaTelefono(telefono) == false || update_validaDireccion(direccion) == false || update_validaNombre(nombre) == false || update_validaApellido(apellido) == false ||
        update_validaEdad(edad) == false || update_validaImagen(imagen) == false || update_validaTipo(tipo) == false || update_validaEstado(estado) == false) {
        alert("Los datos ingresados son incorrectos");

    } else {
        $.post("clases/usuario/actualizarUsuario.php", {
                id: id,
                rut: rut,
                usuario: usuario,
                clave: clave,
                correo: correo,
                telefono: telefono,
                direccion: direccion,
                nombre: nombre,
                apellido: apellido,
                edad: edad,
                imagen: imagen,
                tipo: tipo,
                estado: estado
            },
            function(data, status) {
                // Recargar la tabla
                window.location.reload();
            }
        );
    }
}
//Validar formulario de ingreso
function validaRut(rut) {
    var expresion = /^[0-9]+-[0-9kK]{1}$/;
    if (rut == "") {
        $(".rut").addClass("form-control is-invalid");
        document.getElementById('errorRut').innerHTML = "<div class='alert alert-danger'><strong>Ingrese un RUN</strong></div>";
        error(rut)
        return false;
    } else if (rut.length < 9 || rut.length > 10) {
        $(".rut").addClass("form-control is-invalid");
        document.getElementById('errorRut').innerHTML = "<div class='alert alert-danger'><strong>El RUN debe tener entre 9 a 10 caracteres</strong></div>";
        error(rut)
        return false;
    } else if (!expresion.test(rut)) {
        $(".rut").addClass("form-control is-invalid");
        document.getElementById('errorRut').innerHTML = "<div class='alert alert-danger'><strong>El formato del RUN debe ser el siguiente 'bbbbbbbb-b'</strong></div>";
        error(rut)
        return false;
    }
    $(".rut").removeClass("form-control is-invalid");
    $(".rut").addClass("form-control is-valid");
    document.getElementById('errorRut').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaUsuario(usuario) {
    if (usuario == "") {
        $(".usuario").addClass("form-control is-invalid");
        document.getElementById('errorUsuario').innerHTML = "<div class='alert alert-danger'><strong>Ingrese un nombre de usuario</strong></div>";
        error(usuario);
        return false;
    } else if (usuario.length < 3 || usuario.length > 35) {
        $(".usuario").addClass("form-control is-invalid");
        document.getElementById('errorUsuario').innerHTML = "<div class='alert alert-danger'><strong>El nombre de usuario debe tener entre 3 a 35 caracteres</strong></div>";
        error(usuario);
        return false;
    }
    $(".usuario").removeClass("form-control is-invalid");
    $(".usuario").addClass("form-control is-valid");
    document.getElementById('errorUsuario').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaClave(clave) {
    if (clave == "") {
        $(".clave").addClass("form-control is-invalid");
        document.getElementById('errorClave').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la contraseña para el usuario</strong></div>";
        error(clave);
        return false;
    }
    $(".clave").removeClass("form-control is-invalid");
    $(".clave").addClass("form-control is-valid");
    document.getElementById('errorClave').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaCorreo(correo) {
    'use strict';
    var expresion = /^(\w|\W)+\@+(gmail|yahoo|outlook|hotmail)+\.+(com)$/;
    if (correo == "") {
        $(".correo").addClass("form-control is-invalid");
        document.getElementById('errorCorreo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el correo del usuario</strong></div>";
        error(correo);
        return false;
    } else if (correo.length < 11 || correo.length > 45) {
        $(".correo").addClass("form-control is-invalid");
        document.getElementById('errorCorreo').innerHTML = "<div class='alert alert-danger'><strong>El correo debe ser mínimo de 11 caracteres y un máximo de 45 caracteres</strong></div>";
        error(correo);
        return false;
    } else if (!expresion.test(correo)) {
        $(".correo").addClass("form-control is-invalid");
        document.getElementById('errorCorreo').innerHTML = "<div class='alert alert-danger'><strong>El formato del correo debe ser el siguiente 'correo@dominio.com' los dominios permitidos son: gmail/hotmail/yahoo/outlook</strong></div>";
        error(correo);
        return false;
    }
    $(".correo").removeClass("form-control is-invalid");
    $(".correo").addClass("form-control is-valid");
    document.getElementById('errorCorreo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaTelefono(telefono) {
    'use strict';
    var expresion = /^\d+$/;
    if (telefono == "") {
        $(".telefono").addClass("form-control is-invalid");
        document.getElementById('errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el teléfono del usuario</strong></div>";
        error(telefono);
        return false;
    } else if (isNaN(telefono)) {
        $(".telefono").addClass("form-control is-invalid");
        document.getElementById('errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>Solo se pueden ingresar números en el teléfono</strong></div>";
        error(telefono);
        return false;
    } else if (telefono.length < 10 || telefono.length > 11) {
        $(".telefono").addClass("form-control is-invalid");
        document.getElementById('errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>El número de teléfono debe tener entre 10 a 11 caracteres</strong></div>";
        error(telefono);
        return false;
    } else if (!expresion.test(telefono)) {
        $(".telefono").addClass("form-control is-invalid");
        document.getElementById('errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>El formato del teléfono es por ejemplo: 56978068311</strong></div>";
        error(telefono);
        return false;
    }
    $(".telefono").removeClass("form-control is-invalid");
    $(".telefono").addClass("form-control is-valid");
    document.getElementById('errorTelefono').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaDireccion(direccion) {
    if (direccion == "") {
        $(".direccion").addClass("form-control is-invalid");
        document.getElementById('errorDireccion').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la dirección del usuario</strong></div>";
        error(direccion);
        return false;
    } else if (direccion.length < 3 || direccion.length > 35) {
        $(".direccion").addClass("form-control is-invalid");
        document.getElementById('errorDireccion').innerHTML = "<div class='alert alert-danger'><strong>La dirección debe tener al menos 3 caracteres y máximo 35</strong></div>";
        error(direccion);
        return false;
    }
    $(".direccion").removeClass("form-control is-invalid");
    $(".direccion").addClass("form-control is-valid");
    document.getElementById('errorDireccion').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaNombre(nombre) {
    if (nombre == "") {
        $(".nombre").addClass("form-control is-invalid");
        document.getElementById('errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Ingrese los nombres del usuario</strong></div>";
        error(nombre);
        return false;
    } else if (nombre.length < 3 || nombre.length > 35) {
        $(".nombre").addClass("form-control is-invalid");
        document.getElementById('errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Los nombres en conjunto entre 3 a 35 caracteres</strong></div>";
        error(nombre);
        return false;
    }
    $(".nombre").removeClass("form-control is-invalid");
    $(".nombre").addClass("form-control is-valid");
    document.getElementById('errorNombre').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaApellido(apellido) {
    if (apellido == "") {
        $(".apellido").addClass("form-control is-invalid");
        document.getElementById('errorApellido').innerHTML = "<div class='alert alert-danger'><strong>Ingrese los apellidos del usuario</strong></div>";
        error(apellido);
        return false;
    } else if (apellido.length < 3 || apellido.length > 35) {
        $(".apellido").addClass("form-control is-invalid");
        document.getElementById('errorApellido').innerHTML = "<div class='alert alert-danger'><strong>Los apellidos en conjunto entre 3 a 35 caracteres</strong></div>";
        error(nombre);
        return false;
    }
    $(".apellido").removeClass("form-control is-invalid");
    $(".apellido").addClass("form-control is-valid");
    document.getElementById('errorApellido').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaEdad(edad) {
    if (edad == "") {
        $(".edad").addClass("form-control is-invalid");
        document.getElementById('errorEdad').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la edad del usuario</strong></div>";
        error(edad);
        return false;
    } else if (edad.length < 2 || edad.length > 3) {
        $(".edad").addClass("form-control is-invalid");
        document.getElementById('errorEdad').innerHTML = "<div class='alert alert-danger'><strong>Error en la cantidad de caracteres ingresados</strong></div>";
        error(edad);
        return false;
    } else if (edad < 14 || edad > 100) {
        $(".edad").addClass("form-control is-invalid");
        document.getElementById('errorEdad').innerHTML = "<div class='alert alert-danger'><strong>La edad debe ser mayor a 14 y menor que 100</strong></div>";
        error(edad);
        return false;
    } else if (isNaN(edad)) {
        $(".edad").addClass("form-control is-invalid");
        document.getElementById('errorEdad').innerHTML = "<div class='alert alert-danger'><strong>Solo se pueden ingresar numeros en la edad</strong></div>";
        error(edad);
        return false;
    }
    $(".edad").removeClass("form-control is-invalid");
    $(".edad").addClass("form-control is-valid");
    document.getElementById('errorEdad').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaImagen(imagen) {
    var expresion = /^https?:\/\/[\w\-]+(\.[\w\-]+)+[/#?]?.*$/;
    if (imagen == "") {
        $(".imagen").addClass("form-control is-invalid");
        document.getElementById('errorImagen').innerHTML = "<div class='alert alert-danger'><strong>Debe seleccionar una imagen</strong></div>";
        error(imagen);
        return false;
    } else if (!expresion.test(imagen)) {
        $(".imagen").addClass("form-control is-invalid");
        document.getElementById('errorImagen').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar un enlace</strong></div>";
        error(imagen);
        return false;
    }
    $(".imagen").removeClass("form-control is-invalid");
    $(".imagen").addClass("form-control is-valid");
    document.getElementById('errorImagen').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaTipo(tipo) {
    if (tipo == "") {
        $(".tipo").addClass("form-control is-invalid");
        document.getElementById('errorTipo').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar el tipo de usuario</strong></div>";
        error(tipo);
        return false;
    } else if (!(tipo == "Administrador" || tipo == "Cliente")) {
        $(".tipo").addClass("form-control is-invalid");
        document.getElementById('errorTipo').innerHTML = "<div class='alert alert-danger'><strong>Solo se puede ingresar el tipo Administrador o Cliente'</strong></div>";
        error(tipo);
        return false;
    }
    $(".tipo").removeClass("form-control is-invalid");
    $(".tipo").addClass("form-control is-valid");
    document.getElementById('errorTipo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaEstado(estado) {
    if (estado == "") {
        $(".estado").addClass("form-control is-invalid");
        document.getElementById('errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar el estado del usuario</strong></div>";
        error(estado);
        return false;
    } else if (!(estado == "Activo" || estado == "Inactivo")) {
        $(".estado").addClass("form-control is-invalid");
        document.getElementById('errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Solo se puede ingresar el estado 'Activo' o 'Inactivo'</strong></div>";
        error(estado);
        return false;
    }
    $(".estado").removeClass("form-control is-invalid");
    $(".estado").addClass("form-control is-valid");
    document.getElementById('errorEstado').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

//validar formulario de modificar
function update_validaRut(rut) {
    var expresion = /^[0-9]+-[0-9kK]{1}$/;
    if (rut == "") {
        $(".update_rut").addClass("form-control is-invalid");
        document.getElementById('update_errorRut').innerHTML = "<div class='alert alert-danger'><strong>Ingrese un RUN</strong></div>";
        error(rut)
        return false;
    } else if (rut.length < 9 || rut.length > 10) {
        $(".update_rut").addClass("form-control is-invalid");
        document.getElementById('update_errorRut').innerHTML = "<div class='alert alert-danger'><strong>El RUN debe tener entre 9 a 10 caracteres</strong></div>";
        error(rut)
        return false;
    } else if (!expresion.test(rut)) {
        $(".update_rut").addClass("form-control is-invalid");
        document.getElementById('update_errorRut').innerHTML = "<div class='alert alert-danger'><strong>El formato del RUN debe ser el siguiente 'bbbbbbbb-b'</strong></div>";
        error(rut)
        return false;
    }
    $(".update_rut").removeClass("form-control is-invalid");
    $(".update_rut").addClass("form-control is-valid");
    document.getElementById('update_errorRut').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaUsuario(usuario) {
    if (usuario == "") {
        $(".update_usuario").addClass("form-control is-invalid");
        document.getElementById('update_errorUsuario').innerHTML = "<div class='alert alert-danger'><strong>Ingrese un nombre de usuario</strong></div>";
        error(usuario);
        return false;
    } else if (usuario.length < 3 || usuario.length > 35) {
        $(".update_usuario").addClass("form-control is-invalid");
        document.getElementById('update_errorUsuario').innerHTML = "<div class='alert alert-danger'><strong>El nombre de usuario debe tener entre 3 a 35 caracteres</strong></div>";
        error(usuario);
        return false;
    }
    $(".update_usuario").removeClass("form-control is-invalid");
    $(".update_usuario").addClass("form-control is-valid");
    document.getElementById('update_errorUsuario').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaClave(clave) {
    if (clave == "") {
        $(".update_clave").addClass("form-control is-invalid");
        document.getElementById('update_errorClave').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la contraseña para el usuario</strong></div>";
        error(clave);
        return false;
    }
    $(".update_clave").removeClass("form-control is-invalid");
    $(".update_clave").addClass("form-control is-valid");
    document.getElementById('update_errorClave').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaCorreo(correo) {
    'use strict';
    var expresion = /^(\w|\W)+\@+(gmail|yahoo|outlook|hotmail)+\.+(com)$/;
    if (correo == "") {
        $(".update_correo").addClass("form-control is-invalid");
        document.getElementById('update_errorCorreo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el correo del usuario</strong></div>";
        error(correo);
        return false;
    } else if (correo.length < 11 || correo.length > 45) {
        $(".update_correo").addClass("form-control is-invalid");
        document.getElementById('update_errorCorreo').innerHTML = "<div class='alert alert-danger'><strong>El correo debe ser mínimo de 11 caracteres y un máximo de 45 caracteres</strong></div>";
        error(correo);
        return false;
    } else if (!expresion.test(correo)) {
        $(".update_correo").addClass("form-control is-invalid");
        document.getElementById('update_errorCorreo').innerHTML = "<div class='alert alert-danger'><strong>El formato del correo debe ser el siguiente 'correo@dominio.com' los dominios permitidos son: gmail/hotmail/yahoo/outlook</strong></div>";
        error(correo);
        return false;
    }
    $(".update_correo").removeClass("form-control is-invalid");
    $(".update_correo").addClass("form-control is-valid");
    document.getElementById('update_errorCorreo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaTelefono(telefono) {
    'use strict';
    var expresion = /^\d+$/;
    if (telefono == "") {
        $(".update_telefono").addClass("form-control is-invalid");
        document.getElementById('update_errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el teléfono del usuario</strong></div>";
        error(telefono);
        return false;
    } else if (isNaN(telefono)) {
        $(".update_telefono").addClass("form-control is-invalid");
        document.getElementById('update_errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>Solo se pueden ingresar números en el teléfono</strong></div>";
        error(telefono);
        return false;
    } else if (telefono.length < 10 || telefono.length > 11) {
        $(".update_telefono").addClass("form-control is-invalid");
        document.getElementById('update_errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>El número de teléfono debe tener entre 10 a 11 caracteres</strong></div>";
        error(telefono);
        return false;
    } else if (!expresion.test(telefono)) {
        $(".update_telefono").addClass("form-control is-invalid");
        document.getElementById('update_errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>El formato del teléfono es por ejemplo: 56978068311</strong></div>";
        error(telefono);
        return false;
    }
    $(".update_telefono").removeClass("form-control is-invalid");
    $(".update_telefono").addClass("form-control is-valid");
    document.getElementById('update_errorTelefono').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaDireccion(direccion) {
    if (direccion == "") {
        $(".update_direccion").addClass("form-control is-invalid");
        document.getElementById('update_errorDireccion').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la dirección del usuario</strong></div>";
        error(direccion);
        return false;
    } else if (direccion.length < 3 || direccion.length > 35) {
        $(".update_direccion").addClass("form-control is-invalid");
        document.getElementById('update_errorDireccion').innerHTML = "<div class='alert alert-danger'><strong>La dirección debe tener al menos 3 caracteres y máximo 35</strong></div>";
        error(direccion);
        return false;
    }
    $(".update_direccion").removeClass("form-control is-invalid");
    $(".update_direccion").addClass("form-control is-valid");
    document.getElementById('update_errorDireccion').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaNombre(nombre) {
    if (nombre == "") {
        $(".update_nombre").addClass("form-control is-invalid");
        document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Ingrese los nombres del usuario</strong></div>";
        error(nombre);
        return false;
    } else if (nombre.length < 3 || nombre.length > 35) {
        $(".update_nombre").addClass("form-control is-invalid");
        document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Los nombres en conjunto entre 3 a 35 caracteres</strong></div>";
        error(nombre);
        return false;
    }
    $(".update_nombre").removeClass("form-control is-invalid");
    $(".update_nombre").addClass("form-control is-valid");
    document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaApellido(apellido) {
    if (apellido == "") {
        $(".update_apellido").addClass("form-control is-invalid");
        document.getElementById('update_errorApellido').innerHTML = "<div class='alert alert-danger'><strong>Ingrese los apellidos del usuario</strong></div>";
        error(apellido);
        return false;
    } else if (apellido.length < 3 || apellido.length > 35) {
        $(".update_apellido").addClass("form-control is-invalid");
        document.getElementById('update_errorApellido').innerHTML = "<div class='alert alert-danger'><strong>Los apellidos en conjunto entre 3 a 35 caracteres</strong></div>";
        error(nombre);
        return false;
    }
    $(".update_apellido").removeClass("form-control is-invalid");
    $(".update_apellido").addClass("form-control is-valid");
    document.getElementById('update_errorApellido').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaEdad(edad) {
    if (edad == "") {
        $(".update_edad").addClass("form-control is-invalid");
        document.getElementById('update_errorEdad').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la edad del usuario</strong></div>";
        error(edad);
        return false;
    } else if (edad.length < 2 || edad.length > 3) {
        $(".update_edad").addClass("form-control is-invalid");
        document.getElementById('update_errorEdad').innerHTML = "<div class='alert alert-danger'><strong>Error en la cantidad de caracteres ingresados</strong></div>";
        error(edad);
        return false;
    } else if (edad < 14 || edad > 100) {
        $(".update_edad").addClass("form-control is-invalid");
        document.getElementById('update_errorEdad').innerHTML = "<div class='alert alert-danger'><strong>La edad debe ser mayor a 14 y menor que 100</strong></div>";
        error(edad);
        return false;
    } else if (isNaN(edad)) {
        $(".update_edad").addClass("form-control is-invalid");
        document.getElementById('update_errorEdad').innerHTML = "<div class='alert alert-danger'><strong>Solo se pueden ingresar numeros en la edad</strong></div>";
        error(edad);
        return false;
    }
    $(".edad").removeClass("form-control is-invalid");
    $(".edad").addClass("form-control is-valid");
    document.getElementById('update_errorEdad').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaImagen(imagen) {
    var expresion = /^https?:\/\/[\w\-]+(\.[\w\-]+)+[/#?]?.*$/;
    if (imagen == "") {
        $(".update_imagen").addClass("form-control is-invalid");
        document.getElementById('update_errorImagen').innerHTML = "<div class='alert alert-danger'><strong>Debe seleccionar una imagen</strong></div>";
        error(imagen);
        return false;
    } else if (!expresion.test(imagen)) {
        $(".update_imagen").addClass("form-control is-invalid");
        document.getElementById('update_errorImagen').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar un enlace</strong></div>";
        error(imagen);
        return false;
    }
    $(".update_imagen").removeClass("form-control is-invalid");
    $(".update_imagen").addClass("form-control is-valid");
    document.getElementById('update_errorImagen').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaTipo(tipo) {
    if (tipo == "") {
        $(".update_tipo").addClass("form-control is-invalid");
        document.getElementById('update_errorTipo').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar el tipo de usuario</strong></div>";
        error(tipo);
        return false;
    } else if (!(tipo == "Administrador" || tipo == "Cliente")) {
        $(".update_tipo").addClass("form-control is-invalid");
        document.getElementById('update_errorTipo').innerHTML = "<div class='alert alert-danger'><strong>Solo se puede ingresar el tipo Administrador o Cliente'</strong></div>";
        error(tipo);
        return false;
    }
    $(".update_tipo").removeClass("form-control is-invalid");
    $(".update_tipo").addClass("form-control is-valid");
    document.getElementById('update_errorTipo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaEstado(estado) {
    if (estado == "") {
        $(".update_estado").addClass("form-control is-invalid");
        document.getElementById('update_errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar el estado del usuario</strong></div>";
        error(estado);
        return false;
    } else if (!(estado == "Activo" || estado == "Inactivo")) {
        $(".update_estado").addClass("form-control is-invalid");
        document.getElementById('update_errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Solo se puede ingresar el estado 'Activo' o 'Inactivo'</strong></div>";
        error(estado);
        return false;
    }
    $(".update_estado").removeClass("form-control is-invalid");
    $(".update_estado").addClass("form-control is-valid");
    document.getElementById('update_errorEstado').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}