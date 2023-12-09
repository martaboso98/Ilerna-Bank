<?php
include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

// Obtener préstamos pendientes
$consultaPrestamos = "SELECT * FROM prestamos WHERE estado = 'pendiente'";
$resultadoPrestamos = mysqli_query($conexion, $consultaPrestamos) or die("Error en la consulta de préstamos");

echo "<table border='1' class='tablas mt-5'>";
echo "<tr>";
echo "<th>Nº Préstamo</th>";
echo "<th>Cliente</th>";
echo "<th>Fecha Préstamo</th>";
echo "<th>Cantidad Prestada</th>";
echo "<th>Plazo (meses)</th>";
echo "<th>Interés</th>";
echo "<th>Motivo</th>";
echo "<th>Acciones</th>";
echo "</tr>";

while ($fila = mysqli_fetch_assoc($resultadoPrestamos)) {
    echo "<tr>";
    echo "<td>{$fila['id_prestamos']}</td>";
    echo "<td>{$fila['id_cliente']}</td>";
    echo "<td>{$fila['fecha_prestamo']}</td>";
    echo "<td>{$fila['cantidad_prestada']}</td>";
    echo "<td>{$fila['plazo']}</td>";
    echo "<td>{$fila['interes']}%</td>";
    echo "<td>{$fila['motivo']}</td>";
    echo "<td>";
    echo "<a href='consultas/aprobar_prestamo.php?id={$fila['id_prestamos']}'>Aprobar</a> | ";
    echo "<a href='consultas/rechazar_prestamo.php?id={$fila['id_prestamos']}'>Rechazar</a>";
    echo "</td>";
    echo "</tr>";
}

echo "</table>";

