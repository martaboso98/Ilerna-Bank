<?php

include_once("conexion.php");

// Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

$consultaNombre = "SELECT nombre, id_rol FROM usuario WHERE dni = '$dni'";
$resultadoNombre = mysqli_query($conexion, $consultaNombre) or die("Algo ha ido mal en la consulta a la base de datos");

// Verifica si se obtuvieron resultados
if ($filaNombre = mysqli_fetch_assoc($resultadoNombre)) {
    $nombreUsuario = $filaNombre['nombre'];
    $idRolUsuario = $filaNombre['id_rol'];

    // Obtener la lista de usuarios (excluyendo al usuario actual)
    $consultaUsuarios = "SELECT dni, nombre FROM usuario WHERE dni != '$dni'";
    $resultadoUsuarios = mysqli_query($conexion, $consultaUsuarios) or die("Algo ha ido mal en la consulta a la base de datos");

    // Mostrar lista de usuarios en un formulario
    echo "<div class='col-md-4'>";
        echo "<form method='post' action=''>";
            echo "<h2 class='text-white text-center'>¿Qué chat quieres mostrar?</h2>";
            echo "<label for='destinatario' class='form-label text-white'>Destinatario:</label>";
            echo "<select name='destinatario' class='form-select' id='destinatario' required>";
            echo "<option value=''></option>";

            while ($filaUsuario = mysqli_fetch_assoc($resultadoUsuarios)) {
                echo "<option value='" . $filaUsuario["dni"] . "'>" . $filaUsuario["nombre"] . "</option>";
            }

            echo "</select>";
            echo "<br>";
            echo "<input type='submit' class='btn btn-amarillo text-dark' value='Mostrar Mensajes'>";
        echo "</form>"; 
    echo "</div>";   

    // Mostrar mensajes y formulario para responder
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $destinatarioSeleccionado = $_POST['destinatario'];

        $consultaMensajesDestinatario = "SELECT * FROM mensajes WHERE (remitente = '$dni' AND destinatario = '$destinatarioSeleccionado') OR (remitente = '$destinatarioSeleccionado' AND destinatario = '$dni')";
        $resultadoMensajesDestinatario = mysqli_query($conexion, $consultaMensajesDestinatario) or die("Algo ha ido mal en la consulta a la base de datos");

        if (mysqli_num_rows($resultadoMensajesDestinatario) > 0) {
            
            echo "<div class='col-md-4'>";
            echo "<ul class='listaMensaje'>";
                while ($fila = mysqli_fetch_assoc($resultadoMensajesDestinatario)) {
                    echo "<li class='p-2'>De: " . $fila["remitente"] . " Para: " . $fila["destinatario"] . " - Mensaje: " . $fila["mensaje"] . " (" . $fila["fecha_envio"] . ")</li>";
                }
                echo "</ul>";

                // Formulario para responder a los mensajes
                echo "<form method='POST' action='consultas/enviarRespuesta.php'>"; // Puedes crear un nuevo archivo para procesar la respuesta
                    echo "<h3 class='text-white'>Responder al mensaje:</h3>";
                    echo "<input type='hidden' name='destinatario' value='$destinatarioSeleccionado'>";
                    echo "<textarea name='mensaje' placeholder='Escribe tu respuesta...' class='form-control' required></textarea>";
                    echo "<br>";
                    echo "<input type='submit' class='btn btn-amarillo text-dark' value='Enviar respuesta'>";
                    echo "</form>";
                    echo "</div>";
        } else {
            echo "<p class='text-white'>No hay mensajes para mostrar.</p>";
        }
    }
} else {
    echo "No se pudo obtener información del usuario.";
}
