<?php

include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destinatario = $_POST["destinatario"];
    $mensaje = $_POST["mensaje"];

    if (isset($_POST["remitente"])) {
        $remitente = $_POST["remitente"];
    } else {
        $consultaRemitente = "SELECT nombre FROM usuario WHERE dni = '$dni'";
        $resultadoRemitente = mysqli_query($conexion, $consultaRemitente) or die("Algo ha ido mal en la consulta a la base de datos");
        if ($fila = mysqli_fetch_assoc($resultadoRemitente)) {
            $remitente = $fila['nombre'];
        }
    }

    $insertarMensaje = "INSERT INTO mensajes (remitente, destinatario, mensaje) VALUES ('$remitente', '$destinatario', '$mensaje')";
    $resultado_usuario = mysqli_query($conexion, $insertarMensaje);
}
