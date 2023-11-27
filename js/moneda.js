"use strict";

function seleccionarMoneda(nuevaMoneda) {
    // Realizar una solicitud AJAX para actualizar la moneda en la base de datos
    $.ajax({
        url: 'consultas/actualizarMoneda.php',
        type: 'POST',
        data: { nuevaMoneda: nuevaMoneda },
        success: function () {
            // Actualizar la moneda en el Navbar
            $('#moneda-actual').text(nuevaMoneda);
        },
        error: function (error) {
            console.error('Error al actualizar la moneda', error);
        }
    });
}