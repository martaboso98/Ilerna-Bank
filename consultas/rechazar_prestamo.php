<?php
include_once("conexion.php");

if (isset($_GET['id'])) {
    $idPrestamo = $_GET['id'];

    // Actualizar el estado del préstamo a "rechazado"
    $consultaRechazarPrestamo = "UPDATE prestamos SET estado = 'rechazado' WHERE id_prestamos = $idPrestamo";
    mysqli_query($conexion, $consultaRechazarPrestamo) or die("Error al rechazar el préstamo");
    header("Location: ../prestamosAdmin.php");
}

