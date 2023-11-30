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

    $consultaMensaje = ($idRolUsuario == '1')
        ? "SELECT * FROM mensajes"  // Consulta para administradores
        : "SELECT * FROM mensajes WHERE remitente = '$dni'";  // Consulta para usuarios normales

    $resultadoMensaje = mysqli_query($conexion, $consultaMensaje) or die("Algo ha ido mal en la consulta a la base de datos");

    if (mysqli_num_rows($resultadoMensaje) > 0) {
        while ($fila = mysqli_fetch_assoc($resultadoMensaje)) {
            echo "<hr>";
            echo "De: " . $nombreUsuario . "<br>";
            echo "Para: " . $fila["destinatario"] . "<br>";
            echo "Mensaje: " . $fila["mensaje"] . "<br>";
            echo "Fecha: " . $fila["fecha_envio"] . "<br>";

            // Formulario para responder al mensaje
            echo "<form method='post' action='enviarRespuesta.php'>";
            echo "<input type='hidden' name='remitente' value='$dni'>";
            echo "<input type='hidden' name='destinatario' value='" . $fila["remitente"] . "'>";
            echo "<input type='hidden' name='mensaje_original' value='" . $fila["mensaje"] . "'>";
            echo "<textarea name='mensaje_respuesta' placeholder='Responder al mensaje'></textarea>";
            echo "<input type='submit' value='Responder'>";
            echo "</form>";

            echo "<hr>";
        }
    } else {
        echo "No hay mensajes.";
    }
} else {
    echo "No se pudo obtener información del usuario.";
}

?>
