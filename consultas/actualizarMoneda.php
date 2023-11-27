<?php
include_once("conexion.php");

// Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;
$nuevaMoneda = isset($_POST['nuevaMoneda']) ? $_POST['nuevaMoneda'] : null;

if ($dni && $nuevaMoneda) {
    // Realizar la actualización en la base de datos
    $actualizarMoneda = "UPDATE usuario SET moneda = '$nuevaMoneda' WHERE dni = '$dni'";
    $resultado = mysqli_query($conexion, $actualizarMoneda);

    if (!$resultado) {
        die("Error al actualizar la moneda en la base de datos");
    }

    // Puedes enviar una respuesta JSON si lo prefieres
    echo json_encode(['success' => true]);
} else {
    // Puedes enviar una respuesta JSON si lo prefieres
    echo json_encode(['success' => false, 'message' => 'Faltan datos']);
}