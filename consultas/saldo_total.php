<?php

include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

//Obtener moneda del usuario
$consultaUsuario = "SELECT moneda FROM usuario WHERE dni = '$dni'";
$resultadoUsuario = mysqli_query($conexion, $consultaUsuario) or die("Error al obtener datos del usuario");

if ($filaUsuario = mysqli_fetch_assoc($resultadoUsuario)) {
    $monedaUsuario = $filaUsuario['moneda'];
} 

//Obtener saldo actual
$consultarSaldo = "SELECT saldo_total FROM movimientos WHERE id_cliente='$dni' ORDER BY fecha DESC LIMIT 1";
$resultadoSaldo = mysqli_query($conexion, $consultarSaldo);

$saldoAnterior = 0;

if ($resultadoSaldo && mysqli_num_rows($resultadoSaldo) > 0) {
    $filaSaldo = mysqli_fetch_assoc($resultadoSaldo);

    //Ver si no está vacío
    if (isset($filaSaldo["saldo_total"])) {
        // Convertir de hexadecimal a decimal
        $saldoAnterior = hexdec($filaSaldo["saldo_total"]);
    } 
}

// Inicializar variables
$importe = 0;
$concepto = "";
$accion = ""; 

$importe = isset($_SESSION['importe']) ? $_SESSION['importe'] : null;
$concepto = isset($_SESSION['concepto']) ? $_SESSION['concepto'] : null;

// Aplicar la conversión de moneda al importe y al saldo total
switch ($monedaUsuario) {
    case "euros":
        // Sin conversión porque la moneda base es euros
        break;
    case "dolares":
        $importe *= 1.1;
        $saldoAnterior *= 1.1;
        break;
    case "libras":
        $importe *= 0.9;
        $saldoAnterior *= 0.9;
        break;
    case "yenes":
        $importe /= 160;
        $saldoAnterior /= 160;
        break;
    case "rublos":
        $importe /= 95;
        $saldoAnterior /= 95;
        break;
}

$saldoTotal = $saldoAnterior + $importe;
$saldo_formateado = number_format($saldoTotal, 2);

echo $saldoTotal . " " . $monedaUsuario;

