"use strict";

function mostrarContrasenya(idCampo) {
    var x = document.getElementById(idCampo);
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}