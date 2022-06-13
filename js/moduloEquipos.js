$('#cliente').select2({
    dropdownParent: $('#add_new_record_modal')
});
$('#update_cliente').select2({
    dropdownParent: $('#update_user_modal')
});

function addRecord() {
    var tipo = $("#tipo").val();
    var marca = $("#marca").val();
    var modelo = $("#modelo").val();
    var os = $("#os").val();
    var cliente = $("#cliente").val();
    if (validaTipo(tipo) == false || validaMarca(marca) == false || validaModelo(modelo) == false || validaOS(os) == false || validaCliente(cliente) == false) {
        alert("Los datos ingresados son incorrectos");

    } else {
        $.post("clases/equipo/insertarEquipo.php", {
            tipo: tipo,
            marca: marca,
            modelo: modelo,
            os: os,
            cliente: cliente
        }, function(data, status) {
            // Recargar la tabla
            window.location.reload();
        });
    }

}

function DeleteUser(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("clases/equipo/eliminarEquipo.php", {
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
    $.post("clases/equipo/obtenerInformacionEquipo.php", {
            id: id
        },
        function(data, status) {
            // PARSE json data
            var equipo = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_tipo").val(equipo.tipo);
            $("#update_marca").val(equipo.marca);
            $("#update_modelo").val(equipo.modelo);
            $("#update_os").val(equipo.sistema_operativo);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    var tipo = $("#update_tipo").val();
    var marca = $("#update_marca").val();
    var modelo = $("#update_modelo").val();
    var os = $("#update_os").val();
    var cliente = $("#update_cliente").val();
    var id = $("#hidden_user_id").val();
    console.log(id);
    if (update_validaTipo(tipo) == false || update_validaMarca(marca) == false || update_validaModelo(modelo) == false || update_validaOS(os) == false || update_validaCliente(cliente) == false) {
        alert("Los datos ingresados son incorrectos");

    } else {
        $.post("clases/equipo/actualizarEquipo.php", {
                id: id,
                tipo: tipo,
                marca: marca,
                modelo: modelo,
                os: os,
                cliente: cliente
            },
            function(data, status) {
                window.location.reload();
            }
        );
    }
}
//Validar formulario de ingreso
function validaTipo(tipo) {
    if (tipo == "") {
        $(".tipo").addClass("form-control is-invalid");
        document.getElementById('errorTipo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese un tipo de equipo</strong></div>";
        error(tipo);
        return false;
    } else if (tipo.length < 3 || tipo.length > 35) {
        $(".tipo").addClass("form-control is-invalid");
        document.getElementById('errorTipo').innerHTML = "<div class='alert alert-danger'><strong>El tipo de equipo debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(tipo);
        return false;
    }
    $(".tipo").removeClass("form-control is-invalid");
    $(".tipo").addClass("form-control is-valid");
    document.getElementById('errorTipo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaMarca(marca) {
    if (marca == "") {
        $(".marca").addClass("form-control is-invalid");
        document.getElementById('errorMarca').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la marca del equipo</strong></div>";
        error(marca);
        return false;
    } else if (marca.length < 3 || marca.length > 35) {
        $(".marca").addClass("form-control is-invalid");
        document.getElementById('errorMarca').innerHTML = "<div class='alert alert-danger'><strong>La marca del equipo debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(marca);
        return false;
    }
    $(".marca").removeClass("form-control is-invalid");
    $(".marca").addClass("form-control is-valid");
    document.getElementById('errorMarca').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaModelo(modelo) {
    if (modelo == "") {
        $(".modelo").addClass("form-control is-invalid");
        document.getElementById('errorModelo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el modelo del equipo</strong></div>";
        error(modelo);
        return false;
    } else if (modelo.length < 3 || modelo.length > 35) {
        $(".modelo").addClass("form-control is-invalid");
        document.getElementById('errorModelo').innerHTML = "<div class='alert alert-danger'><strong>El modelo del equipo debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(modelo);
        return false;
    }
    $(".modelo").removeClass("form-control is-invalid");
    $(".modelo").addClass("form-control is-valid");
    document.getElementById('errorModelo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaOS(os) {
    if (os == "") {
        $(".modelo").addClass("form-control is-invalid");
        document.getElementById('errorOS').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el OS del equipo</strong></div>";
        error(os);
        return false;
    } else if (os.length < 3 || os.length > 35) {
        $(".modelo").addClass("form-control is-invalid");
        document.getElementById('errorOS').innerHTML = "<div class='alert alert-danger'><strong>El OS del equipo debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(os);
        return false;
    }
    $(".os").removeClass("form-control is-invalid");
    $(".os").addClass("form-control is-valid");
    document.getElementById('errorOS').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaCliente(cliente) {
    if (cliente == "") {
        $(".cliente").addClass("form-control is-invalid");
        document.getElementById('errorCliente').innerHTML = "<div class='alert alert-danger'><strong>Debe seleccionar un cliente</strong></div>";
        error(cliente);
        return false;
    }
    $(".cliente").removeClass("form-control is-invalid");
    $(".cliente").addClass("form-control is-valid");
    document.getElementById('errorCliente').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}
//validar formulario de modificar
function update_validaTipo(tipo) {
    if (tipo == "") {
        $(".update_tipo").addClass("form-control is-invalid");
        document.getElementById('update_errorTipo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese un tipo de equipo</strong></div>";
        error(tipo);
        return false;
    } else if (tipo.length < 3 || tipo.length > 35) {
        $(".update_tipo").addClass("form-control is-invalid");
        document.getElementById('update_errorTipo').innerHTML = "<div class='alert alert-danger'><strong>El tipo de equipo debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(tipo);
        return false;
    }
    $(".update_tipo").removeClass("form-control is-invalid");
    $(".update_tipo").addClass("form-control is-valid");
    document.getElementById('update_errorTipo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaMarca(marca) {
    if (marca == "") {
        $(".update_marca").addClass("form-control is-invalid");
        document.getElementById('update_errorMarca').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la marca del equipo</strong></div>";
        error(marca);
        return false;
    } else if (marca.length < 3 || marca.length > 35) {
        $(".update_marca").addClass("form-control is-invalid");
        document.getElementById('update_errorMarca').innerHTML = "<div class='alert alert-danger'><strong>La marca del equipo debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(marca);
        return false;
    }
    $("update_.marca").removeClass("form-control is-invalid");
    $(".update_marca").addClass("form-control is-valid");
    document.getElementById('update_errorMarca').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaModelo(modelo) {
    if (modelo == "") {
        $(".update_modelo").addClass("form-control is-invalid");
        document.getElementById('update_errorModelo').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el modelo del equipo</strong></div>";
        error(modelo);
        return false;
    } else if (modelo.length < 3 || modelo.length > 35) {
        $(".update_modelo").addClass("form-control is-invalid");
        document.getElementById('update_errorModelo').innerHTML = "<div class='alert alert-danger'><strong>El modelo del equipo debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(modelo);
        return false;
    }
    $(".update_modelo").removeClass("form-control is-invalid");
    $(".update_modelo").addClass("form-control is-valid");
    document.getElementById('update_errorModelo').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaOS(os) {
    if (os == "") {
        $(".update_modelo").addClass("form-control is-invalid");
        document.getElementById('update_errorOS').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el OS del equipo</strong></div>";
        error(os);
        return false;
    } else if (os.length < 3 || os.length > 35) {
        $(".update_modelo").addClass("form-control is-invalid");
        document.getElementById('update_errorOS').innerHTML = "<div class='alert alert-danger'><strong>El OS del equipo debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(os);
        return false;
    }
    $(".update_os").removeClass("form-control is-invalid");
    $(".update_os").addClass("form-control is-valid");
    document.getElementById('update_errorOS').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaCliente(cliente) {
    if (cliente == "") {
        $(".update_cliente").addClass("form-control is-invalid");
        document.getElementById('update_errorCliente').innerHTML = "<div class='alert alert-danger'><strong>Debe seleccionar un cliente</strong></div>";
        error(cliente);
        return false;
    }
    $(".update_cliente").removeClass("form-control is-invalid");
    $(".update_cliente").addClass("form-control is-valid");
    document.getElementById('update_errorCliente').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}