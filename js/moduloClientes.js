// Add Record
function addRecord() {
    // get values
    var rut = $("#rut").val();
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var direccion = $("#direccion").val();
    var telefono = $("#telefono").val();
    var correo = $("#correo").val();
    var edad = $("#edad").val();
    var cedula = $("#cedula").val();
    var estado = $("#estado").val();

    // Add record
    if (validaRut(rut) == false || validaCorreo(correo) == false || validaTelefono(telefono) == false || validaDireccion(direccion) == false ||
        validaNombre(nombre) == false || validaApellido(apellido) == false || validaEdad(edad) == false || validaImagen(cedula) == false ||
        validaEstado(estado) == false) {
        alert("Los datos ingresados son incorrectos");

    } else {
        $.post("clases/cliente/insertarCliente.php", {
            rut: rut,
            nombre: nombre,
            apellido: apellido,
            direccion: direccion,
            telefono: telefono,
            correo: correo,
            edad: edad,
            cedula: cedula,
            estado: estado,
        }, function(data, status) {
            // close the popup
            $("#add_new_record_modal").modal("hide");
            // clear fields from the popup
            $("#rut").val("");
            $("#nombre").val("");
            $("#apellido").val("");
            $("#direccion").val("");
            $("#telefono").val("");
            $("#correo").val("");
            $("#edad").val("");
            $("#cedula").val("");
            $("#estado").val("");
            // Recargar la tabla
            window.location.reload();
        });
    }
}

function DeleteUser(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("clases/cliente/eliminarCliente.php", {
                id: id
            },
            function(data, status) {
                // Recargar la tabla
                window.location.reload();
            }
        );
    }
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("clases/cliente/obtenerInformacionCliente.php", {
            id: id
        },
        function(data, status) {
            // PARSE json data
            var cliente = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_rut").val(cliente.rut);
            $("#update_nombre").val(cliente.nombres);
            $("#update_apellido").val(cliente.apellidos);
            $("#update_direccion").val(cliente.direccion);
            $("#update_telefono").val(cliente.telefono);
            $("#update_correo").val(cliente.correo);
            $("#update_edad").val(cliente.edad);
            $("#update_cedula").val(cliente.cedula);
            $("#update_estado").val(cliente.estado);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var rut = $("#update_rut").val();
    var nombre = $("#update_nombre").val();
    var apellido = $("#update_apellido").val();
    var direccion = $("#update_direccion").val();
    var telefono = $("#update_telefono").val();
    var correo = $("#update_correo").val();
    var edad = $("#update_edad").val();
    var cedula = $("#update_cedula").val();
    var estado = $("#update_estado").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();
    console.log(id);
    // Update the details by requesting to the server using ajax
    if (update_validaRut(rut) == false || update_validaCorreo(correo) == false || update_validaTelefono(telefono) == false ||
        update_validaDireccion(direccion) == false || update_validaNombre(nombre) == false || update_validaApellido(apellido) == false ||
        update_validaEdad(edad) == false || update_validaImagen(cedula) == false || update_validaEstado(estado) == false) {
        alert("Los datos ingresados son incorrectos");

    } else {
        $.post("clases/cliente/actualizarCliente.php", {
                id: id,
                rut: rut,
                nombre: nombre,
                apellido: apellido,
                direccion: direccion,
                telefono: telefono,
                correo: correo,
                edad: edad,
                cedula: cedula,
                estado: estado
            },
            function(data, status) {
                // hide modal popup
                $("#update_user_modal").modal("hide");
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





function validaCorreo(correo) {
    'use strict';
    var expresion = /^(\w|\W)+\@+(gmail|yahoo|outlook|hotmail)+\.+(com)$/;
    if (correo == "") {
        $(".correo").addClass("form-control is-invalid");
        document.getElementById('errorCorreo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el correo del cliente</strong></div>";
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
        document.getElementById('errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el teléfono del cliente</strong></div>";
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
        document.getElementById('errorDireccion').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la dirección del cliente</strong></div>";
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
        document.getElementById('errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Ingrese los nombres del cliente</strong></div>";
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
        document.getElementById('errorApellido').innerHTML = "<div class='alert alert-danger'><strong>Ingrese los apellidos del cliente</strong></div>";
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
        document.getElementById('errorEdad').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la edad del cliente</strong></div>";
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

function validaImagen(cedula) {
    var expresion = /^https?:\/\/[\w\-]+(\.[\w\-]+)+[/#?]?.*$/;
    if (cedula == "") {
        $(".cedula").addClass("form-control is-invalid");
        document.getElementById('errorImagen').innerHTML = "<div class='alert alert-danger'><strong>Debe seleccionar una imagen</strong></div>";
        error(cedula);
        return false;
    } else if (!expresion.test(cedula)) {
        $(".cedula").addClass("form-control is-invalid");
        document.getElementById('errorImagen').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar un enlace</strong></div>";
        error(cedula);
        return false;
    }
    $(".cedula").removeClass("form-control is-invalid");
    $(".cedula").addClass("form-control is-valid");
    document.getElementById('errorImagen').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}



function validaEstado(estado) {
    if (estado == "") {
        $(".estado").addClass("form-control is-invalid");
        document.getElementById('errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar el estado del cliente</strong></div>";
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




function update_validaCorreo(correo) {
    'use strict';
    var expresion = /^(\w|\W)+\@+(gmail|yahoo|outlook|hotmail)+\.+(com)$/;
    if (correo == "") {
        $(".update_correo").addClass("form-control is-invalid");
        document.getElementById('update_errorCorreo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el correo del cliente</strong></div>";
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
        document.getElementById('update_errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el teléfono del cliente</strong></div>";
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
        document.getElementById('update_errorDireccion').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la dirección del cliente</strong></div>";
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
        document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Ingrese los nombres del cliente</strong></div>";
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
        document.getElementById('update_errorApellido').innerHTML = "<div class='alert alert-danger'><strong>Ingrese los apellidos del cliente</strong></div>";
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
        document.getElementById('update_errorEdad').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la edad del cliente</strong></div>";
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

function update_validaImagen(cedula) {
    var expresion = /^https?:\/\/[\w\-]+(\.[\w\-]+)+[/#?]?.*$/;
    if (cedula == "") {
        $(".update_cedula").addClass("form-control is-invalid");
        document.getElementById('update_errorImagen').innerHTML = "<div class='alert alert-danger'><strong>Debe seleccionar una imagen</strong></div>";
        error(cedula);
        return false;
    } else if (!expresion.test(cedula)) {
        $(".update_cedula").addClass("form-control is-invalid");
        document.getElementById('update_errorImagen').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar un enlace</strong></div>";
        error(cedula);
        return false;
    }
    $(".update_cedula").removeClass("form-control is-invalid");
    $(".update_cedula").addClass("form-control is-valid");
    document.getElementById('update_errorImagen').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}


function update_validaEstado(estado) {
    if (estado == "") {
        $(".update_estado").addClass("form-control is-invalid");
        document.getElementById('update_errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar el estado del cliente</strong></div>";
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