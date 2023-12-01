<?php
include_once("conexion.php");

// Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensaje = $_POST["mensaje"];
    $destinatario = $_POST["destinatario"];  //Obtén el destinatario del formulario

    $insertarMensaje = "INSERT INTO mensajes (remitente, destinatario, mensaje) VALUES ('$dni', '$destinatario', '$mensaje')";
    $resultado_usuario = mysqli_query($conexion, $insertarMensaje);
}

header("location: ../mensajes.php");
