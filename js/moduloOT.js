//SELECT
$(document).ready(function() {
    $('#cliente').select2();
});
$(document).ready(function() {
    $('#servicio').select2();
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
    var servicio = document.getElementById('servicio').value;
    var datosServicio = servicio.split(',');
    var precioServicio = Number.parseInt(datosServicio[2]);
    console.log(precioServicio);
    var fecha = document.getElementById('fecha').value;
    var fechaTermino = document.getElementById('fechaTermino').value;
    var formaPago = document.getElementById('formaPago').value;
    var estadoInical = document.getElementById('estadoInicial').value;
    var diagnostico = document.getElementById('diagnostico').value;
    //
    if (discounted.checked) {
        montoDescuento = 0;
        discount_percentage.value = "0";
    } else if (no_discounted.checked) {
        montoDescuento = Number.parseInt(document.getElementById('discountPercentage').value);
    }

    if (!(cliente == "")) {
        if (!(servicio == "")) {
            if (!(precioServicio <= 0 || precioServicio == "" || isNaN(precioServicio))) {
                if (!(fecha == "")) {
                    if (!(fechaTermino == "")) {
                        if (!(formaPago == "") || formaPago == "Transferencia" || formaPago == "Credito" || formaPago == "Debito" || formaPago == "Paypal") {
                            if (!(estadoInical == "" || estadoInical.length > 300)) {
                                if (!(diagnostico == "" || diagnostico.length > 300)) {
                                    var total = precioServicio - montoDescuento;
                                    document.getElementById('total').innerHTML = '<h5> Precio del producto: $' + precioServicio + '<br> Total descuento: $' +
                                        montoDescuento + ' <br> <hr style="width:30%;"> <br> TOTAL: $' + total + '</h5> <input type="hidden" name="total" value=' + total + '>';
                                    document.getElementById('registrar').disabled = false;
                                } else {
                                    alert("Ingrese un diagnostico");
                                }
                            } else {
                                alert("Ingrese una estado inicial");
                            }
                        } else {
                            alert("Seleccione una forma de pago valida");
                        }
                    } else {
                        alert("Seleccione una fecha de termino");
                    }
                } else {
                    alert("Ingrese la fecha actual");
                }
            } else {
                alert("Ingrese el precio del servicio");
            }
        } else {
            alert("Seleccione un servicio");
        }

    } else {
        alert("Seleccione un cliente");
    }
}