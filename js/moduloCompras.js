//SELECT
$(document).ready(function() {
    $('#proveedor').select2();
});
$(document).ready(function() {
    $('#categoria').select2();
});

$(document).ready(function() {
    $('#producto').select2();
});

function calcularTotal() {
    var proveedor = document.getElementById('proveedor').value;
    var producto = document.getElementById('producto').value;
    var categoria = document.getElementById('categoria').value;
    var cantidad = Number.parseInt(document.getElementById('cantidad').value);
    var precio = Number.parseInt(document.getElementById('precio').value);
    var formaPago = document.getElementById('formaPago').value;
    var fecha = document.getElementById('fecha').value;
    var fechaLlegada = document.getElementById('fechaLlegada').value;
    if (!(proveedor == "")) {
        if (!(producto == "")) {
            if (!(categoria == "")) {
                if (!(fecha == "")) {
                    if (!(fechaLlegada == "")) {
                        if (!(formaPago == "") || formaPago == "Transferencia" || formaPago == "Credito" || formaPago == "Debito" || formaPago == "Paypal") {
                            if (!(cantidad == "" || cantidad == 0 || isNaN(cantidad))) {
                                if (!(precio == "" || precio == 0 || isNaN(precio))) {
                                    var total = precio * cantidad;
                                    document.getElementById('total').innerHTML = '<h5> Precio del producto: $' + precio + '<br> Cantidad: ' +
                                        cantidad + ' <br> <hr style="width:30%;"> <br> TOTAL: $' + total + '</h5> <input type="hidden" name="total" value=' + total + '>';
                                    document.getElementById('registrar').disabled = false;
                                } else {
                                    alert("Ingrese un precio");
                                }
                            } else {
                                alert("Ingrese una cantidad");
                            }
                        } else {
                            alert("Seleccione una forma de pago valida");
                        }
                    } else {
                        alert("Seleccione una fecha de llegada");
                    }
                } else {
                    alert("Ingrese la fecha actual");
                }
            } else {
                alert("Ingrese una categoria");
            }
        } else {
            alert("Seleccione un producto");
        }

    } else {
        alert("Seleccione un proveedor");
    }
}