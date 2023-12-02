<?php

include_once("conexion.php");

/* Nombre */
$dni = $_SESSION["dni"];

$consultaUsuario = "SELECT moneda FROM usuario WHERE dni = '$dni'";
$resultadoUsuario = mysqli_query($conexion, $consultaUsuario) or die("Error al obtener datos del usuario");

if ($filaUsuario = mysqli_fetch_assoc($resultadoUsuario)) {
    $monedaUsuario = $filaUsuario["moneda"];
}

$consultaMovimientos = "SELECT fecha, concepto, importe FROM movimientos WHERE id_cliente = '$dni'";
$resultadoMovimientos = mysqli_query($conexion, $consultaMovimientos) or die("Algo ha ido mal en la consulta a la base de datos");

$saldoAnterior = 0;

while ($fila = mysqli_fetch_assoc($resultadoMovimientos)) {

    switch ($monedaUsuario) {
        case "euros":
            $fila["importe"] *= 1;
            break;
        case "dolares":
            $fila["importe"] *= 1.1;
            break;
        case "libras":
            $fila["importe"] *= 0.9;
            break;
        case "yenes":
            $fila["importe"] /= 160;
            break;
        case "rublos":
            $fila["importe"] /= 95;
            break;
    }

    // Actualizar el saldo
    $saldoAnterior += $fila["importe"];

    // Aplicar formato de dos decimales
    $importe_formateado = number_format($fila["importe"], 2);
}

// Fuera del bucle, después de procesar todos los movimientos
$saldo_formateado = number_format($saldoAnterior, 2);

echo $saldo_formateado . " " . $monedaUsuario;
?>
