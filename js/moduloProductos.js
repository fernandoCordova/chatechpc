$('#categoria').select2({
    dropdownParent: $('#add_new_record_modal')
});
$('#update_categoria').select2({
    dropdownParent: $('#update_user_modal')
});

function addRecord() {
    var nombre = $("#nombre").val();
    var cantidad = $("#cantidad").val();
    var estado = $("#estado").val();
    var categoria = $("#categoria").val();
    var precio = $("#precio").val();
    if (validaNombre(nombre) == false || validaCantidad(cantidad) == false || validaPrecio(precio) == false || validaEstado(estado) == false || validaCategoria(categoria) == false) {
        alert("Los datos ingresados son incorrectos");

    } else {
        $.post("clases/producto/insertarProducto.php", {
            nombre: nombre,
            cantidad: cantidad,
            estado: estado,
            categoria: categoria,
            precio: precio
        }, function(data, status) {
            // Recargar la tabla
            window.location.reload();
        });
    }
}

function DeleteUser(id) {
    var conf = confirm("¿Está seguro, realmente desea eliminar el registro?");
    if (conf == true) {
        $.post("clases/producto/eliminarProducto.php", {
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
    $.post("clases/producto/obtenerInformacionProducto.php", {
            id: id
        },
        function(data, status) {
            // PARSE json data
            var producto = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_nombre").val(producto.nombre);
            $("#update_cantidad").val(producto.cantidad);
            $("#update_estado").val(producto.estado);
            $("#update_categoria").val(producto.categoria_idcategoria);
            $("#update_precio").val(producto.precio);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}

function UpdateUserDetails() {
    var nombre = $("#update_nombre").val();
    var cantidad = $("#update_cantidad").val();
    var estado = $("#update_estado").val();
    var categoria = $("#update_categoria").val();
    var precio = $("#update_precio").val();
    var id = $("#hidden_user_id").val();
    console.log(id);
    if (update_validaNombre(nombre) == false || update_validaCantidad(cantidad) == false || update_validaPrecio(precio) == false ||
        update_validaEstado(estado) == false || update_validaCategoria(categoria) == false) {
        alert("Los datos ingresados son incorrectos");

    } else {
        $.post("clases/producto/actualizarProducto.php", {
                id: id,
                nombre: nombre,
                cantidad: cantidad,
                estado: estado,
                categoria: categoria,
                precio: precio
            },
            function(data, status) {
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
        document.getElementById('errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el nombre del producto</strong></div>";
        error(nombre);
        return false;
    } else if (nombre.length < 3 || nombre.length > 35) {
        $(".nombre").addClass("form-control is-invalid");
        document.getElementById('errorNombre').innerHTML = "<div class='alert alert-danger'><strong>El nombre del producto debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(nombre);
        return false;
    }
    $(".nombre").removeClass("form-control is-invalid");
    $(".nombre").addClass("form-control is-valid");
    document.getElementById('errorNombre').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaCantidad(cantidad) {
    if (cantidad == "") {
        $(".cantidad").addClass("form-control is-invalid");
        document.getElementById('errorCantidad').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la cantidad del producto</strong></div>";
        error(cantidad);
        return false;
    } else if (cantidad.length < 1 || cantidad.length > 4) {
        $(".cantidad").addClass("form-control is-invalid");
        document.getElementById('errorCantidad').innerHTML = "<div class='alert alert-danger'><strong>Cantidad de dígitos incorrectos</strong></div>";
        error(nombre);
        return false;
    } else if (isNaN(cantidad)) {
        $(".cantidad").addClass("form-control is-invalid");
        document.getElementById('errorCantidad').innerHTML = "<div class='alert alert-danger'><strong>Solo puede ingresar números</strong></div>";
        error(nombre);
        return false;
    }
    $(".cantidad").removeClass("form-control is-invalid");
    $(".cantidad").addClass("form-control is-valid");
    document.getElementById('errorCantidad').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function validaPrecio(precio) {
    if (precio == "") {
        $(".precio").addClass("form-control is-invalid");
        document.getElementById('errorPrecio').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el precio del producto</strong></div>";
        error(precio);
        return false;
    } else if (precio.length < 1 || precio.length > 7) {
        $(".precio").addClass("form-control is-invalid");
        document.getElementById('errorPrecio').innerHTML = "<div class='alert alert-danger'><strong>Cantidad de dígitos incorrectos</strong></div>";
        error(precio);
        return false;
    } else if (isNaN(precio)) {
        $(".precio").addClass("form-control is-invalid");
        document.getElementById('errorPrecio').innerHTML = "<div class='alert alert-danger'><strong>Solo puede ingresar números</strong></div>";
        error(precio);
        return false;
    }
    $(".precio").removeClass("form-control is-invalid");
    $(".precio").addClass("form-control is-valid");
    document.getElementById('errorPrecio').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
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

function validaCategoria(categoria) {
    if (categoria == "") {
        $(".categoria").addClass("form-control is-invalid");
        document.getElementById('errorCategoria').innerHTML = "<div class='alert alert-danger'><strong>Debe seleccionar una categoria</strong></div>";
        error(categoria);
        return false;
    }
    $(".categoria").removeClass("form-control is-invalid");
    $(".categoria").addClass("form-control is-valid");
    document.getElementById('errorCategoria').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}
//Validar formulario de modificar
function update_validaNombre(nombre) {
    if (nombre == "") {
        $(".update_nombre").addClass("form-control is-invalid");
        document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el nombre del producto</strong></div>";
        error(nombre);
        return false;
    } else if (nombre.length < 3 || nombre.length > 35) {
        $(".update_nombre").addClass("form-control is-invalid");
        document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-danger'><strong>El nombre del producto debe tener mas de 3 caracteres y menos de 35</strong></div>";
        error(nombre);
        return false;
    }
    $(".update_nombre").removeClass("form-control is-invalid");
    $(".update_nombre").addClass("form-control is-valid");
    document.getElementById('update_errorNombre').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaCantidad(cantidad) {
    if (cantidad == "") {
        $(".update_cantidad").addClass("form-control is-invalid");
        document.getElementById('update_errorCantidad').innerHTML = "<div class='alert alert-danger'><strong>Ingrese la cantidad del producto</strong></div>";
        error(cantidad);
        return false;
    } else if (cantidad.length < 1 || cantidad.length > 4) {
        $(".update_cantidad").addClass("form-control is-invalid");
        document.getElementById('update_errorCantidad').innerHTML = "<div class='alert alert-danger'><strong>Cantidad de dígitos incorrectos</strong></div>";
        error(nombre);
        return false;
    } else if (isNaN(cantidad)) {
        $(".update_cantidad").addClass("form-control is-invalid");
        document.getElementById('update_errorCantidad').innerHTML = "<div class='alert alert-danger'><strong>Solo puede ingresar números</strong></div>";
        error(nombre);
        return false;
    }
    $(".update_cantidad").removeClass("form-control is-invalid");
    $(".update_cantidad").addClass("form-control is-valid");
    document.getElementById('update_errorCantidad').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}

function update_validaPrecio(precio) {
    if (precio == "") {
        $(".update_precio").addClass("form-control is-invalid");
        document.getElementById('update_errorPrecio').innerHTML = "<div class='alert alert-danger'><strong>Ingrese el precio del producto</strong></div>";
        error(precio);
        return false;
    } else if (precio.length < 1 || precio.length > 7) {
        $(".update_precio").addClass("form-control is-invalid");
        document.getElementById('update_errorPrecio').innerHTML = "<div class='alert alert-danger'><strong>Cantidad de dígitos incorrectos</strong></div>";
        error(precio);
        return false;
    } else if (isNaN(precio)) {
        $(".update_precio").addClass("form-control is-invalid");
        document.getElementById('update_errorPrecio').innerHTML = "<div class='alert alert-danger'><strong>Solo puede ingresar números</strong></div>";
        error(precio);
        return false;
    }
    $(".update_precio").removeClass("form-control is-invalid");
    $(".update_precio").addClass("form-control is-valid");
    document.getElementById('update_errorPrecio').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
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

function update_validaCategoria(categoria) {
    if (categoria == "") {
        $(".update_categoria").addClass("form-control is-invalid");
        document.getElementById('update_errorCategoria').innerHTML = "<div class='alert alert-danger'><strong>Debe seleccionar una categoria</strong></div>";
        error(categoria);
        return false;
    }
    $(".update_categoria").removeClass("form-control is-invalid");
    $(".update_categoria").addClass("form-control is-valid");
    document.getElementById('update_errorCategoria').innerHTML = "<div class='alert alert-success'><strong>Los datos ingresados son correctos</strong></div>";
    return true;
}