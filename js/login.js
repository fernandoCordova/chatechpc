function validarLogin() {
    var usuario = document.getElementById("usuario").value;
    var clave = document.getElementById("clave").value;
    if (!usuario == "") {
        if (!clave == "") {} else {
            alert("Debe ingresar una clave valida");
        }
    } else {
        alert("Debe ingresar un usuario valido");
    }
}