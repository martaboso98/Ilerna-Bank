<?php

include_once("conexion.php");

/* Nombre */
$dni = $_SESSION['dni'];

$consultaUsuario = "SELECT moneda FROM usuario WHERE dni = '$dni'";
$resultadoUsuario = mysqli_query($conexion, $consultaUsuario) or die("Error al obtener datos del usuario");

if ($filaUsuario = mysqli_fetch_assoc($resultadoUsuario)) {
    $monedaUsuario = $filaUsuario['moneda'];
} 

$consultaMovimientos = "SELECT fecha, concepto, importe, saldo_total FROM movimientos WHERE id_cliente = '$dni'";
$resultadoMovimientos = mysqli_query($conexion, $consultaMovimientos) or die("Algo ha ido mal en la consulta a la base de datos");

echo "<table class='tablas'>";
echo "<tr>";
echo "<th>Fecha</th>";
echo "<th>Concepto</th>";
echo "<th>Importe</th>";
echo "<th>Saldo</th>";
echo "</tr>";

while ($fila = mysqli_fetch_assoc($resultadoMovimientos)) {
    // Convertir de hexadecimal a decimal
    $importe_decimal = hexdec($fila['importe']);
    $saldo_decimal = hexdec($fila['saldo_total']);

    // Aplicar la conversión de moneda
    switch ($monedaUsuario) {
        case "euros":
            //Sin conversión porque la moneda base es euros
            break;
        case "dolares":
            $importe_decimal *= 1.1;
            $saldo_decimal *= 1.1;
            break;
        case "libras":
            $importe_decimal *= 0.9;
            $saldo_decimal *= 0.9;
            break;
        case "yenes":
            $importe_decimal /= 160;
            $saldo_decimal /= 160;
            break;
        case "rublos":
            $importe_decimal /= 95;
            $saldo_decimal /= 95;
            break;
    }

    echo "<tr>";
    echo "<td>" . $fila['fecha'] . "</td>";
    echo "<td>" . $fila['concepto'] . "</td>";
    echo "<td>" . number_format($importe_decimal, 2) . " " . $monedaUsuario . "</td>";
    echo "<td>" . number_format($saldo_decimal, 2) . " " . $monedaUsuario . "</td>";
    echo "</tr>";
}

echo "</table>";
