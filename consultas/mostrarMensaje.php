<?php

include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

$consultaMensaje = "SELECT * FROM mensajes";
$resultadoMensaje = mysqli_query($conexion, $consultaMensaje) or die("Algo ha ido mal en la consulta a la base de datos");


if (mysqli_num_rows($resultadoMensaje) > 0) {
    while ($fila = mysqli_fetch_assoc($resultadoMensaje)) {
        echo "De: " . $fila["remitente"] . "<br>";
        echo "Para: " . $fila["destinatario"] . "<br>";
        echo "Mensaje: " . $fila["mensaje"] . "<br>";
        echo "Fecha: " . $fila["fecha_envio"] . "<br><hr>";
    }
} else {
    echo "No hay mensajes.";
}
