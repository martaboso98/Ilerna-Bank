<?php
include_once("conexion.php");

// Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST" && $dni) {
    $destinatario = $_POST["destinatario"];
    $mensaje = $_POST["mensaje"];

    $insertarMensaje = "INSERT INTO mensajes (remitente, destinatario, mensaje) VALUES ('$dni', '$destinatario', '$mensaje')";
    $resultado_usuario = mysqli_query($conexion, $insertarMensaje);

}

header ("location: ../mensajes.php");