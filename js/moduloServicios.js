function addRecord() {
    var tipo = $("#tipo").val();
    var monto = $("#monto").val();
    var estado = $("#estado").val();
    if (validaTipo(tipo) == false || validaMonto(monto) == false || validaEstado(estado) == false) {
        alert("Los datos ingresados son incorrectos");
    } else {
        $.post("clases/servicio/insertarServicio.php", {
            tipo: tipo,
            monto: monto,
            estado: estado

        }, function(data, status) {
            // close the popup
            $("#add_new_record_modal").modal("hide");
            // clear fields from the popup
            $("#categoria").val("");
            $("#estado").val("");
            // Recargar la tabla
            window.location.reload();
        });
    }
}

function DeleteUser(id) {
    var conf = confirm("¿Recuerde que las categorias estas asociadas a los productos, desvincule los productos para eliminar la categoria?");
    if (conf == true) {
        $.post("clases/servicio/eliminarServicio.php", {
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
    $.post("clases/servicio/obtenerInformacionServicio.php", {
            id: id
        },
        function(data, status) {
            // PARSE json data
            var servicio = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_tipo").val(servicio.tipo);
            $("#update_monto").val(servicio.monto);
            $("#update_estado").val(servicio.estado);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var tipo = $("#update_tipo").val();
    var monto = $("#update_monto").val();
    var estado = $("#update_estado").val();
    // get hidden field value
    var id = $("#hidden_user_id").val();
    console.log(id);
    // Update the details by requesting to the server using ajax
    if (update_validaTipo(tipo) == false || update_validaMonto(monto) == false || update_validaEstado(estado) == false) {
        alert("Los datos ingresados son incorrectos");
    } else {
        $.post("clases/servicio/actualizarServicio.php", {
                id: id,
                tipo: tipo,
                monto: monto,
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
function validaTipo(tipo) {
    if (tipo == "") {
        $(".tipo").addClass("form-control is-invalid");
        document.getElementById('errorTipo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el nombre del servicio</strong></div>";
        error(tipo);
        return false;
    } else if (tipo.length < 3 || tipo.length > 35) {
        $(".tipo").addClass("form-control is-invalid");
        document.getElementById('errorTipo').innerHTML = "<div class='alert alert-danger'><strong>El nombre del servicio debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(tipo);
        return false;
    }
    $(".tipo").removeClass("form-control is-invalid");
    $(".tipo").addClass("form-control is-valid");
    document.getElementById('errorTipo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaMonto(monto) {
    if (monto == "") {
        $(".monto").addClass("form-control is-invalid");
        document.getElementById('errorMonto').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el precio del servicio</strong></div>";
        error(monto);
        return false;
    } else if (monto.length < 1 || monto.length > 7) {
        $(".monto").addClass("form-control is-invalid");
        document.getElementById('errorMonto').innerHTML = "<div class='alert alert-danger'><strong>Cantidad de dígitos incorrectos</strong></div>";
        error(monto);
        return false;
    } else if (isNaN(monto)) {
        $(".monto").addClass("form-control is-invalid");
        document.getElementById('errorMonto').innerHTML = "<div class='alert alert-danger'><strong>Solo puede ingresar números</strong></div>";
        error(monto);
        return false;
    }
    $(".monto").removeClass("form-control is-invalid");
    $(".monto").addClass("form-control is-valid");
    document.getElementById('errorMonto').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaEstado(estado) {
    if (estado == "") {
        $(".estado").addClass("form-control is-invalid");
        document.getElementById('errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar el estado del usuario</strong></div>";
        error(estado);
        return false;
    } else if (!(estado == "Disponible" || estado == "No disponible")) {
        $(".estado").addClass("form-control is-invalid");
        document.getElementById('errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Solo se puede ingresar el estado 'Disponible' o 'No disponible'</strong></div>";
        error(estado);
        return false;
    }
    $(".estado").removeClass("form-control is-invalid");
    $(".estado").addClass("form-control is-valid");
    document.getElementById('errorEstado').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}
//Validar formulario de modificar
function update_validaTipo(tipo) {
    if (tipo == "") {
        $(".update_tipo").addClass("form-control is-invalid");
        document.getElementById('update_errorTipo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el nombre del servicio</strong></div>";
        error(tipo);
        return false;
    } else if (tipo.length < 3 || tipo.length > 35) {
        $(".update_tipo").addClass("form-control is-invalid");
        document.getElementById('update_errorTipo').innerHTML = "<div class='alert alert-danger'><strong>El nombre del servicio debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(tipo);
        return false;
    }
    $(".update_tipo").removeClass("form-control is-invalid");
    $(".update_tipo").addClass("form-control is-valid");
    document.getElementById('update_errorTipo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaMonto(monto) {
    if (monto == "") {
        $(".update_monto").addClass("form-control is-invalid");
        document.getElementById('update_errorMonto').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el precio del servicio</strong></div>";
        error(monto);
        return false;
    } else if (monto.length < 1 || monto.length > 7) {
        $(".update_monto").addClass("form-control is-invalid");
        document.getElementById('update_errorMonto').innerHTML = "<div class='alert alert-danger'><strong>Cantidad de dígitos incorrectos</strong></div>";
        error(monto);
        return false;
    } else if (isNaN(monto)) {
        $(".update_monto").addClass("form-control is-invalid");
        document.getElementById('update_errorMonto').innerHTML = "<div class='alert alert-danger'><strong>Solo puede ingresar números</strong></div>";
        error(monto);
        return false;
    }
    $(".update_monto").removeClass("form-control is-invalid");
    $(".update_monto").addClass("form-control is-valid");
    document.getElementById('update_errorMonto').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaEstado(estado) {
    if (estado == "") {
        $(".update_estado").addClass("form-control is-invalid");
        document.getElementById('update_errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Debe ingresar el estado del usuario</strong></div>";
        error(estado);
        return false;
    } else if (!(estado == "Disponible" || estado == "No disponible")) {
        $(".update_estado").addClass("form-control is-invalid");
        document.getElementById('update_errorEstado').innerHTML = "<div class='alert alert-danger'><strong>Solo se puede ingresar el estado 'Disponible' o 'No disponible'</strong></div>";
        error(estado);
        return false;
    }
    $(".update_estado").removeClass("form-control is-invalid");
    $(".update_estado").addClass("form-control is-valid");
    document.getElementById('update_errorEstado').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}