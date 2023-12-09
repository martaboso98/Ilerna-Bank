<?php
include_once("conexion.php");

if (isset($_GET['id'])) {
    $idPrestamo = $_GET['id'];

    // Actualizar el estado del préstamo a "aprobado"
    $consultaAprobarPrestamo = "UPDATE prestamos SET estado = 'aprobado' WHERE id_prestamos = $idPrestamo";
    mysqli_query($conexion, $consultaAprobarPrestamo) or die("Error al aprobar el préstamo");
    header("Location: ../prestamosAdmin.php");
}


