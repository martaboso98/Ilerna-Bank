<?php

include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

$cantidadMinimaParaPrestamo = 1000;
$interes = 8.14;

//Saldo Total
$consultarSaldo = "SELECT saldo_total FROM movimientos WHERE id_cliente='$dni' ORDER BY fecha DESC LIMIT 1";
$resultadoSaldo = mysqli_query($conexion, $consultarSaldo);
$saldoAnterior = 0;
if ($resultadoSaldo && mysqli_num_rows($resultadoSaldo) > 0) {
    $filaSaldo = mysqli_fetch_assoc($resultadoSaldo);
    $saldoAnterior = $filaSaldo["saldo_total"];
}
$importe = 0;
$concepto = "";
$accion = "";
$importe = isset($_SESSION['importe']) ? $_SESSION['importe'] : null;
$concepto = isset($_SESSION['concepto']) ? $_SESSION['concepto'] : null;
$saldoTotal = $saldoAnterior + $importe;

//Fecha Nacimiento
$consultaFechaNacimiento = "SELECT fecha FROM usuario WHERE dni = '$dni'";
$resultadoFechaNacimiento = mysqli_query($conexion, $consultaFechaNacimiento) or die("Algo ha ido mal en la consulta a la base de datos");
$filaFechaNacimiento = mysqli_fetch_assoc($resultadoFechaNacimiento);
$FechaNacimiento = $filaFechaNacimiento["fecha"];

function obtenerEdad($FechaNacimiento)
{
    $nacimiento = new DateTime($FechaNacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}

$edad = obtenerEdad($FechaNacimiento);

//Si se cumplen los dos requisitos te deja hacer el préstamo sino no
if ($saldoTotal >= $cantidadMinimaParaPrestamo && $edad >= 18) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $cantidadPrestamo = $_POST["cantidad_prestada"];
        $motivo = $_POST["motivo"];
        $plazo = $_POST["plazo"]; //meses
    }

    //Interés Mensual
    $interesMensual = ($interes / 100) / 12;

    //Cuota Mensual
    $cuotaMensual = ($cantidadPrestamo * $interesMensual) / (1 - pow(1 + $interesMensual, -$plazo));

    //Fecha finalización a partir del plazo
    $fechaInicio = new DateTime();
    $fechaFinalizacion = clone $fechaInicio;
    $fechaFinalizacion->add(new DateInterval("P{$plazo}M")); // Plazo en meses
    $fechaPago = clone $fechaInicio; //Para no cambiar la original

    //Representación fecha
    $fechaInicioString = $fechaInicio->format('Y-m-d');
    $fechaFinalizacionString = $fechaFinalizacion->format('Y-m-d');

    $motivo = strtoupper($motivo);
    $saldoPendiente = 0;

    $insertarPrestamo = "INSERT INTO prestamos (id_cliente, fecha_prestamo, cantidad_prestada, plazo, interes, motivo) VALUES ('$dni', '$fechaFinalizacionString', '$cantidadPrestamo', '$plazo', '$interes', '$motivo')";
    $resultadoInsertarPrestamo = mysqli_query($conexion, $insertarPrestamo) or die("Algo ha ido mal en la consulta a la base de datos");

    header ("location: pagos.php");

} else {
    echo "No tienes suficiente saldo para realizar un préstamo.";
}
