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
    echo "<h2>¿Qué chat quieres mostrar?</h2>";
    echo "<label for='destinatario' class='label'>Destinatario:</label>";
    echo "<form method='post' action=''>"; // Cambiado el action a una cadena vacía
    echo "<select name='destinatario' id='destinatario' required>";
    echo "<option value=''></option>";

    while ($filaUsuario = mysqli_fetch_assoc($resultadoUsuarios)) {
        echo "<option value='" . $filaUsuario["dni"] . "'>" . $filaUsuario["nombre"] . "</option>";
    }

    echo "</select>";
    echo "<input type='submit' value='Mostrar Mensajes'>";
    echo "</form>";

    // Mostrar mensajes del destinatario seleccionado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $destinatarioSeleccionado = $_POST['destinatario'];

        $consultaMensajesDestinatario = "SELECT * FROM mensajes WHERE (remitente = '$dni' AND destinatario = '$destinatarioSeleccionado') OR (remitente = '$destinatarioSeleccionado' AND destinatario = '$dni')";
        $resultadoMensajesDestinatario = mysqli_query($conexion, $consultaMensajesDestinatario) or die("Algo ha ido mal en la consulta a la base de datos");

        if (mysqli_num_rows($resultadoMensajesDestinatario) > 0) {
            echo "<ul>";
            while ($fila = mysqli_fetch_assoc($resultadoMensajesDestinatario)) {
                echo "<li>" . $fila["mensaje"] . " (" . $fila["fecha_envio"] . ")</li>";
            }
            echo "</ul>";

        } else {
            echo "No hay mensajes para mostrar.";
        }
    }
} else {
    echo "No se pudo obtener información del usuario.";
}
