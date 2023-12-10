$(document).ready(function () {
    //Controlador de eventos para el envío del formulario
    $("#miFormulario").submit(function (event) {
        //Evitar el envío del formulario por defecto
        event.preventDefault();

        logIn();
    });

    function logIn() {
        let dniInput = $("#dni").val();
        let contrasenyaInput = $("#contrasenya").val();

        if (dniInput.match(dniPattern)) {
            // Realizar una solicitud AJAX al servidor
            $.ajax({
                type: 'POST',
                url: 'consultas/consulta1.php', // Ruta al script PHP en el servidor
                data: { dni: dniInput, contrasenya: contrasenyaInput },
                success: function(response) {
                    // Manejar la respuesta del servidor
                    console.log(response);
                    // Redirigir o realizar acciones adicionales según sea necesario
                },
                error: function(error) {
                    // Manejar errores de la solicitud
                    console.error('Error en la solicitud AJAX: ', error);
                }
            });
        } else {
            alert("DNI incorrecto. Introduce 8 dígitos.");
            // Aquí puedes realizar otras acciones si el DNI es incorrecto
        }
    }
});

