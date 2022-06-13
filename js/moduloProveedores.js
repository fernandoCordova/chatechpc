// Add Record
$('#pais').select2({
    dropdownParent: $('#add_new_record_modal')
});

$('#update_pais').select2({
    dropdownParent: $('#update_user_modal')
});

function addRecord() {
    // get values
    var nombre = $("#nombre").val();
    var nombre_contacto = $("#nombre_contacto").val();
    var cargo_contacto = $("#cargo_contacto").val();
    var direccion = $("#direccion").val();
    var pais = $("#pais").val();
    var telefono = $("#telefono").val();
    var correo = $("#correo").val();
    var estado = $("#estado").val();
    // Add record
    if (validaNombre(nombre) == false || validaNombreContacto(nombre_contacto) == false || validaCargo(cargo_contacto) == false ||
        validaDireccion(direccion) == false || validaPais(pais) == false || validaTelefono(telefono) == false || validaCorreo(correo) == false || validaEstado(estado) == false) {
        alert("Los datos ingresados son incorrectos");

    } else {
        $.post("clases/proveedor/insertarProveedor.php", {
            nombre: nombre,
            nombre_contacto: nombre_contacto,
            cargo_contacto: cargo_contacto,
            direccion: direccion,
            pais: pais,
            telefono: telefono,
            correo: correo,
            estado: estado
        }, function(data, status) {
            // Recargar la tabla
            window.location.reload();
        });
    }
}

function DeleteUser(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("clases/proveedor/eliminarProveedor.php", {
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
    $.post("clases/proveedor/obtenerInformacionProveedor.php", {
            id: id
        },
        function(data, status) {
            // PARSE json data
            var proveedor = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nombre").val(proveedor.nombre);
            $("#update_nombre_contacto").val(proveedor.nombre_contacto);
            $("#update_cargo_contacto").val(proveedor.cargo_contacto);
            $("#update_direccion").val(proveedor.direccion);
            $("#update_pais").val(proveedor.pais);
            $("#update_telefono").val(proveedor.telefono);
            $("#update_correo").val(proveedor.correo);
            $("#update_estado").val(proveedor.estado);
            //chupala julio
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var nombre = $("#update_nombre").val();
    var nombre_contacto = $("#update_nombre_contacto").val();
    var cargo_contacto = $("#update_cargo_contacto").val();
    var direccion = $("#update_direccion").val();
    var pais = $("#update_pais").val();
    var telefono = $("#update_telefono").val();
    var correo = $("#update_correo").val();
    var estado = $("#update_estado").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();
    console.log(id);
    // Update the details by requesting to the server using ajax
    if (update_validaNombre(nombre) == false || update_validaNombreContacto(nombre_contacto) == false || update_validaCargo(cargo_contacto) == false ||
        update_validaDireccion(direccion) == false || update_validaPais(pais) == false || update_validaTelefono(telefono) == false || update_validaCorreo(correo) == false ||
        update_validaEstado(estado) == false) {
        alert("Los datos ingresados son incorrectos");

    } else {
        $.post("clases/proveedor/actualizarProveedor.php", {
                id: id,
                nombre: nombre,
                nombre_contacto: nombre_contacto,
                cargo_contacto: cargo_contacto,
                direccion: direccion,
                pais: pais,
                telefono: telefono,
                correo: correo,
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
//validar formulario de ingreso
function validaNombre(nombre) {
    if (nombre == "") {
        $(".nombre").addClass("form-control is-invalid");
        document.getElementById('errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el nombre del proveedor</strong></div>";
        error(nombre);
        return false;
    } else if (nombre.length < 3 || nombre.length > 35) {
        $(".nombre").addClass("form-control is-invalid");
        document.getElementById('errorNombre').innerHTML = "<div class='alert alert-danger'><strong>El nombre debe tener 3 a 35 caracteres</strong></div>";
        error(nombre);
        return false;
    }
    $(".nombre").removeClass("form-control is-invalid");
    $(".nombre").addClass("form-control is-valid");
    document.getElementById('errorNombre').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaNombreContacto(nombre_contacto) {
    if (nombre_contacto == "") {
        $(".nombre_contacto").addClass("form-control is-invalid");
        document.getElementById('errorContacto').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el nombre del contacto</strong></div>";
        error(nombre_contacto);
        return false;
    } else if (nombre_contacto.length < 3 || nombre_contacto.length > 35) {
        $(".nombre_contacto").addClass("form-control is-invalid");
        document.getElementById('errorContacto').innerHTML = "<div class='alert alert-danger'><strong>El nombre del contacto debe tener entre 3 a 35 caracteres</strong></div>";
        error(nombre_contacto);
        return false;
    }
    $(".nombre_contacto").removeClass("form-control is-invalid");
    $(".nombre_contacto").addClass("form-control is-valid");
    document.getElementById('errorContacto').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaCargo(cargo_contacto) {
    if (cargo_contacto == "") {
        $(".cargo_contacto").addClass("form-control is-invalid");
        document.getElementById('errorCargo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el cargo del contacto</strong></div>";
        error(cargo_contacto);
        return false;
    } else if (cargo_contacto.length < 3 || cargo_contacto.length > 35) {
        $(".cargo_contacto").addClass("form-control is-invalid");
        document.getElementById('errorCargo').innerHTML = "<div class='alert alert-danger'><strong>El cargo del contacto debe tener 3 a 35 caracteres</strong></div>";
        error(nombre);
        return false;
    }
    $(".cargo_contacto").removeClass("form-control is-invalid");
    $(".cargo_contacto").addClass("form-control is-valid");
    document.getElementById('errorCargo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaDireccion(direccion) {
    if (direccion == "") {
        $(".direccion").addClass("form-control is-invalid");
        document.getElementById('errorDireccion').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la dirección del proveedor</strong></div>";
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

function validaTelefono(telefono) {
    'use strict';
    var expresion = /^\d+$/;
    if (telefono == "") {
        $(".telefono").addClass("form-control is-invalid");
        document.getElementById('errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el teléfono del proveedor</strong></div>";
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

function validaCorreo(correo) {
    var expresion = /^(\w|\W)+\@+(gmail|yahoo|outlook|hotmail)+\.+(com)$/;
    if (correo == "") {
        $(".correo").addClass("form-control is-invalid");
        document.getElementById('errorCorreo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el correo del proveedor</strong></div>";
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

function validaEstado(estado) {
    if (estado == "") {
        $(".estado").addClass("form-control is-invalid");
        document.getElementById('errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar el estado del proveedor</strong></div>";
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

function validaPais(pais) {
    if (pais == "") {
        $(".pais").addClass("form-control is-invalid");
        document.getElementById('errorPais').innerHTML = "<div class='alert alert-danger'><strong>Debe seleccionar un pais</strong></div>";
        error(estado);
        return false;
    }
    $(".pais").removeClass("form-control is-invalid");
    $(".pais").addClass("form-control is-valid");
    document.getElementById('errorPais').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}
//validar formulario de modificar
function update_validaNombre(nombre) {
    if (nombre == "") {
        $(".update_nombre").addClass("form-control is-invalid");
        document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el nombre del proveedor</strong></div>";
        error(nombre);
        return false;
    } else if (nombre.length < 3 || nombre.length > 35) {
        $(".update_nombre").addClass("form-control is-invalid");
        document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-danger'><strong>El nombre debe tener 3 a 35 caracteres</strong></div>";
        error(nombre);
        return false;
    }
    $(".update_nombre").removeClass("form-control is-invalid");
    $(".update_nombre").addClass("form-control is-valid");
    document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaNombreContacto(nombre_contacto) {
    if (nombre_contacto == "") {
        $(".update_nombre_contacto").addClass("form-control is-invalid");
        document.getElementById('update_errorContacto').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el nombre del contacto</strong></div>";
        error(nombre_contacto);
        return false;
    } else if (nombre_contacto.length < 3 || nombre_contacto.length > 35) {
        $(".update_nombre_contacto").addClass("form-control is-invalid");
        document.getElementById('update_errorContacto').innerHTML = "<div class='alert alert-danger'><strong>El nombre del contacto debe tener entre 3 a 35 caracteres</strong></div>";
        error(nombre_contacto);
        return false;
    }
    $(".update_nombre_contacto").removeClass("form-control is-invalid");
    $(".update_nombre_contacto").addClass("form-control is-valid");
    document.getElementById('update_errorContacto').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaCargo(cargo_contacto) {
    if (cargo_contacto == "") {
        $(".update_cargo_contacto").addClass("form-control is-invalid");
        document.getElementById('update_errorCargo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el cargo del contacto</strong></div>";
        error(cargo_contacto);
        return false;
    } else if (cargo_contacto.length < 3 || cargo_contacto.length > 35) {
        $(".update_cargo_contacto").addClass("form-control is-invalid");
        document.getElementById('update_errorCargo').innerHTML = "<div class='alert alert-danger'><strong>El cargo del contacto debe tener 3 a 35 caracteres</strong></div>";
        error(nombre);
        return false;
    }
    $(".update_cargo_contacto").removeClass("form-control is-invalid");
    $(".update_cargo_contacto").addClass("form-control is-valid");
    document.getElementById('update_errorCargo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaDireccion(direccion) {
    if (direccion == "") {
        $(".update_direccion").addClass("form-control is-invalid");
        document.getElementById('update_errorDireccion').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la dirección del proveedor</strong></div>";
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

function update_validaTelefono(telefono) {
    'use strict';
    var expresion = /^\d+$/;
    if (telefono == "") {
        $(".update_telefono").addClass("form-control is-invalid");
        document.getElementById('update_errorTelefono').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el teléfono del proveedor</strong></div>";
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

function update_validaCorreo(correo) {
    'use strict';
    var expresion = /^(\w|\W)+\@+(gmail|yahoo|outlook|hotmail)+\.+(com)$/;
    if (correo == "") {
        $(".update_correo").addClass("form-control is-invalid");
        document.getElementById('update_errorCorreo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el correo del proveedor</strong></div>";
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

function update_validaEstado(estado) {
    if (estado == "") {
        $(".update_estado").addClass("form-control is-invalid");
        document.getElementById('update_errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar el estado del proveedor</strong></div>";
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
    document.getElementById('errorEstado').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaPais(pais) {
    if (pais == "") {
        $(".update_pais").addClass("form-control is-invalid");
        document.getElementById('update_errorPais').innerHTML = "<div class='alert alert-danger'><strong>Debe seleccionar un pais</strong></div>";
        error(pais);
        return false;
    }
    $(".update_pais").removeClass("form-control is-invalid");
    $(".update_pais").addClass("form-control is-valid");
    document.getElementById('update_errorPais').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}