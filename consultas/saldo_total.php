<?php

include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

//Obtener saldo actual
$consultarSaldo = "SELECT saldo_total FROM movimientos WHERE id_cliente='$dni' ORDER BY fecha DESC LIMIT 1";
$resultadoSaldo = mysqli_query($conexion, $consultarSaldo);

$saldoAnterior = 0;

if ($resultadoSaldo && mysqli_num_rows($resultadoSaldo) > 0) {
    $filaSaldo = mysqli_fetch_assoc($resultadoSaldo);
    $saldoAnterior = $filaSaldo["saldo_total"];
}

// Inicializar variables
$importe = 0;
$concepto = "";
$accion = "";

$importe = isset($_SESSION['importe']) ? $_SESSION['importe'] : null;
$concepto = isset($_SESSION['concepto']) ? $_SESSION['concepto'] : null;

$saldoTotal = $saldoAnterior + $importe;
echo $saldoTotal . " €";

