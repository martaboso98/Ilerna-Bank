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

//Inicializar variables
$importe = 0;
$concepto = "";
$accion = "";
$fecha = date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $importe = $_POST["importe"];
    $concepto = $_POST["concepto"];

    //Para ver si la acción es retirar o ingresar, según cuál pues suma o resta el importe
    $esRetiro = ($_POST["accion"] === "retiro");
    $importe = $esRetiro ? -$importe : $importe;

    //Calcular nuevo saldo
    $saldoTotal = $saldoAnterior + $importe;
}


$insertar = "INSERT INTO movimientos (id_cliente, importe, concepto, fecha, saldo_total) VALUES ('$dni', '$importe' ,'$concepto', '$fecha', '$saldoTotal')";
$resultado = mysqli_query($conexion, $insertar) or die("Algo ha ido mal en la consulta a la base de datos");
header("location: ../banco.php");

