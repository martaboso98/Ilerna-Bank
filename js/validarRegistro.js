$(document).ready(function() {
    //Controlador de eventos para el envío del formulario
    $("#miFormulario").submit(function(event) {
        //Evitar el envío del formulario por defecto
        event.preventDefault();

        //Validar el DNI
        logIn();
    });

    function logIn() {
        let dniPattern = "/^\d{8}$/"; //DNI debe tener exactamente 8 dígitos
        let dniInput = document.getElementById("dni").value;

        if (dniInput.match(dniPattern)) {
            //Cuando los datos son incorrectos

            // Ahora puedes enviar el formulario si es necesario
            $("#miFormulario").submit();
        } else {
            alert("DNI incorrecto. Introduce 8 dígitos.");
            // Aquí puedes realizar otras acciones si el DNI es incorrecto
        }
    }
});