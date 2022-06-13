//SELECT
$(document).ready(function() {
    $('#cliente').select2();
});
$(document).ready(function() {
    $('#producto').select2();
});
var discounted = document.getElementById('isDiscounted');
var no_discounted = document.getElementById('isNotDiscounted');
var discount_percentage = document.getElementById('discountPercentage');
//DESCUENTO
function updateStatus() {
    if (discounted.checked) {
        discount_percentage.disabled = true;
        discount_percentage.value = "0";
    } else {
        discount_percentage.disabled = false;
        discount_percentage.value = "0";
    }
}

discounted.addEventListener('change', updateStatus)
no_discounted.addEventListener('change', updateStatus)

function calcularTotal() {
    var cliente = document.getElementById('cliente').value;
    var producto = document.getElementById('producto').value;
    var datosProducto = producto.split(',');
    var precioProducto = Number.parseInt(datosProducto[1]);
    var cantidadProducto = Number.parseInt(datosProducto[6]);
    var cantidad = Number.parseInt(document.getElementById('cantidad').value);
    var fecha = document.getElementById('fecha').value;
    var servicio1 = document.getElementById('servicio1').value;
    var datosServicio1 = servicio1.split(',');
    var servicio2 = document.getElementById('servicio2').value;
    var datosServicio2 = servicio2.split(',');
    var formaPago = document.getElementById('formaPago').value;
    //
    if (servicio1 == 'No aplica') {
        montoServicio1 = 0;
    } else {
        var montoServicio1 = Number.parseInt(datosServicio1[2]);
    }
    //
    if (servicio2 == 'No aplica') {
        montoServicio2 = 0;
    } else {
        var montoServicio2 = Number.parseInt(datosServicio2[2]);
    }
    //
    if (discounted.checked) {
        montoDescuento = 0;
        discount_percentage.value = "0";
    } else if (no_discounted.checked) {
        montoDescuento = Number.parseInt(document.getElementById('discountPercentage').value);
    }

    if (!(cliente == "")) {
        if (!(producto == "")) {
            if (!(precioProducto <= 0 || precioProducto == "" || isNaN(precioProducto))) {
                if (!(cantidad > cantidadProducto || cantidad <= 0 || cantidad == "" || isNaN(cantidad))) {
                    if (!(fecha == "")) {
                        if (!(formaPago == "") || formaPago == "Transferencia" || formaPago == "Credito" || formaPago == "Debito" || formaPago == "Paypal") {
                            var total = ((precioProducto + montoServicio1 + montoServicio2) * cantidad - montoDescuento);
                            document.getElementById('total').innerHTML = '<h5> Precio del producto: $' + precioProducto + ' <br> Precio del servicio 1: $' +
                                montoServicio1 + '<br> Precio del servicio 2: $' + montoServicio2 + '<br> Cantidad: ' + cantidad + '<br> Total descuento: $' +
                                montoDescuento + ' <br> <hr style="width:30%;"> <br> TOTAL: $' + total + '</h5> <input type="hidden" name="total" value=' + total + '>';
                            document.getElementById('registrar').disabled = false;

                        } else {
                            alert("Seleccione un método de pago valido");
                        }
                    } else {
                        alert('Debe ingresar una fecha');
                    }
                } else {
                    alert('La cantidad ingresada no es valida');
                }
            } else {
                alert('Precio de producto no valido');
            }
        } else {
            alert('Debe seleccionar un producto');
        }
    } else {
        alert("Debe seleccionar un cliente");
    }
}