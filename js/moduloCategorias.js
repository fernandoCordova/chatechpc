function addRecord() {
    var nombre = $("#nombre").val();
    var estado = $("#estado").val();
    if (validaNombre(nombre) == false || validaEstado(estado) == false) {
        alert("Los datos ingresados son incorrectos");
    } else {
        $.post("clases/categoria/insertarCategoria.php", {
            nombre: nombre,
            estado: estado

        }, function(data, status) {
            // Recargar la tabla
            window.location.reload();
        });
    }
}

function DeleteUser(id) {
    var conf = confirm("¿Recuerde que las categorias estas asociadas a los productos, desvincule los productos para eliminar la categoria?");
    if (conf == true) {
        $.post("clases/categoria/eliminarCategoria.php", {
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
    $.post("clases/categoria/obtenerInformacionCategoria.php", {
            id: id
        },
        function(data, status) {
            // PARSE json data
            var categoria = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_categoria").val(categoria.nombre);
            $("#update_estado").val(categoria.estado);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var nombre = $("#update_categoria").val();;
    var estado = $("#update_estado").val();;
    // get hidden field value
    var id = $("#hidden_user_id").val();
    console.log(id);
    // Update the details by requesting to the server using ajax
    if (update_validaNombre(nombre) == false || update_validaEstado(estado) == false) {
        alert("Los datos ingresados son incorrectos");
    } else {
        $.post("clases/categoria/actualizarCategoria.php", {
                id: id,
                nombre: nombre,
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
function validaNombre(nombre) {
    if (nombre == "") {
        $(".nombre").addClass("form-control is-invalid");
        document.getElementById('errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el nombre del categoria</strong></div>";
        error(nombre);
        return false;
    } else if (nombre.length < 3 || nombre.length > 35) {
        $(".nombre").addClass("form-control is-invalid");
        document.getElementById('errorNombre').innerHTML = "<div class='alert alert-danger'><strong>El nombre del categoria debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(nombre);
        return false;
    }
    $(".nombre").removeClass("form-control is-invalid");
    $(".nombre").addClass("form-control is-valid");
    document.getElementById('errorNombre').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
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
function update_validaNombre(nombre) {
    if (nombre == "") {
        $(".update_nombre").addClass("form-control is-invalid");
        document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el nombre del categoria</strong></div>";
        error(nombre);
        return false;
    } else if (nombre.length < 3 || nombre.length > 35) {
        $(".update_nombre").addClass("form-control is-invalid");
        document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-danger'><strong>El nombre del categoria debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(nombre);
        return false;
    }
    $(".update_nombre").removeClass("form-control is-invalid");
    $(".update_nombre").addClass("form-control is-valid");
    document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
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