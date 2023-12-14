<?php
include_once("conexion.php");

// Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

// Obtener préstamos pendientes
$consultaPrestamosPendientes = "SELECT * FROM prestamos WHERE estado = 'pendiente'";
$resultadoPrestamosPendientes = mysqli_query($conexion, $consultaPrestamosPendientes) or die("Error en la consulta de préstamos pendientes");

echo "<table border='1' class='tablas mt-5'>";
echo "<tr>";
echo "<th>Cliente</th>";
echo "<th>Fecha Préstamo</th>";
echo "<th>Cantidad Prestada</th>";
echo "<th>Motivo</th>";
echo "<th>Acciones</th>";
echo "</tr>";

while ($fila = mysqli_fetch_assoc($resultadoPrestamosPendientes)) {
    echo "<tr>";
    echo "<td>{$fila['id_cliente']}</td>";
    echo "<td>{$fila['fecha_prestamo']}</td>";
    echo "<td>{$fila['cantidad_prestada']}</td>";
    echo "<td>{$fila['motivo']}</td>";
    echo "<td>";
    echo "<a href='consultas/aprobar_prestamo.php?id={$fila['id_prestamos']}'>Aprobar</a> | ";
    echo "<a href='consultas/rechazar_prestamo.php?id={$fila['id_prestamos']}'>Rechazar</a>";
    echo "</td>";
    echo "</tr>";
}

echo "</table>";
