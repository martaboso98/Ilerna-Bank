<?php

include_once("conexion.php");

/* Nombre */
$dni = $_SESSION['dni'];

$consultaUsuario = "SELECT moneda FROM usuario WHERE dni = '$dni'";
$resultadoUsuario = mysqli_query($conexion, $consultaUsuario) or die("Error al obtener datos del usuario");

if ($filaUsuario = mysqli_fetch_assoc($resultadoUsuario)) {
    $monedaUsuario = $filaUsuario['moneda'];
}

$consultaMovimientos = "SELECT fecha, hora, concepto, importe FROM movimientos WHERE id_cliente = '$dni'";
$resultadoMovimientos = mysqli_query($conexion, $consultaMovimientos) or die("Algo ha ido mal en la consulta a la base de datos");

echo "<table class='tablas'>";
echo "<tr>";
echo "<th>Fecha</th>";
echo "<th>Hora</th>";
echo "<th>Concepto</th>";
echo "<th>Importe</th>";
echo "<th>Saldo</th>";
echo "</tr>";

$saldoAnterior = 0;

while ($fila = mysqli_fetch_assoc($resultadoMovimientos)) {

    switch ($monedaUsuario) {
        case "euros":
            $fila['importe'] *= 1;
            break;
        case "dolares":
            $fila['importe'] *= 1.1;
            break;
        case "libras":
            $fila['importe'] *= 0.9;
            break;
        case "yenes":
            $fila['importe'] /= 160;
            break;
        case "rublos":
            $fila['importe'] /= 95;
            break;
    }

    // Actualizar el saldo
    $saldoAnterior += $fila['importe'];

    // Aplicar formato de dos decimales
    $importe_formateado = number_format($fila['importe'], 2);
    $saldo_formateado = number_format($saldoAnterior, 2);

    echo "<tr>";
    echo "<td>" . $fila['fecha'] . "</td>";
    echo "<td>" . $fila['hora'] . "</td>";
    echo "<td>" . $fila['concepto'] . "</td>";
    echo "<td>" . $importe_formateado . " " . $monedaUsuario . "</td>";
    echo "<td>" . $saldo_formateado . " " . $monedaUsuario . "</td>";
    echo "</tr>";

}

echo "</table>";
