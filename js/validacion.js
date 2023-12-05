$(document).ready(function(){
    $("#cantidadConcepto").validate({
        rules: {
            'importe': {
                required: true,
                number: true  // Añadido para validar que sea un número
            }
        },
        messages: {
            'importe': {
                required: "Este campo es obligatorio",
                number: "Inserte un número válido"  // Mensaje para números inválidos
            }
        },
        debug: true,
        errorElement: "label",
        submitHandler: function(form){
            $("#alert").show();
            $("#alert").html("<img src='images/ajax-loader.gif' style='vertical-align:middle;margin:0 10px 0 0' /><strong>Enviando mensaje...</strong>");
            setTimeout(function() {
                $('#alert').fadeOut('slow');
            }, 5000);
            $.ajax({
                type: "POST",
                url: "send.php",
                data: "importe=" + escape($('#importe').val()),
                success: function(msg){
                    $("#alert").html(msg);
                    document.getElementById("importe").value = "";
                    setTimeout(function() {
                        $('#alert').fadeOut('slow');
                    }, 5000);
                }
            });
        }
    });
});
