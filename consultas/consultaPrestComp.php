<?php
include_once("conexion.php");

// Obtener préstamos completados
$consultaPrestamos = "SELECT * FROM prestamos WHERE estado != 'pendiente'";
$resultadoPrestamos = mysqli_query($conexion, $consultaPrestamos) or die("Error en la consulta de préstamos completados");

echo "<table border='1' class='tablas mt-5'>";
echo "<tr>";
echo "<th>Cliente</th>";
echo "<th>Fecha Préstamo</th>";
echo "<th>Cantidad Prestada</th>";
echo "<th>Motivo</th>";
echo "<th>Estado</th>";
echo "</tr>";

while ($fila = mysqli_fetch_assoc($resultadoPrestamos)) {
    echo "<tr>";
    echo "<td>{$fila['id_cliente']}</td>";
    echo "<td>{$fila['fecha_prestamo']}</td>";
    echo "<td>{$fila['cantidad_prestada']}</td>";
    echo "<td>{$fila['motivo']}</td>";
    echo "<td>{$fila['estado']}</td>";
    echo "</tr>";
}

echo "</table>";


