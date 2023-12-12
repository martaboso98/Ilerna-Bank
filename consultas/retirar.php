<?php

include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION["error"] = [];
$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

//Moneda
$consultaUsuario = "SELECT moneda FROM usuario WHERE dni = '$dni'";
$resultadoUsuario = mysqli_query($conexion, $consultaUsuario) or die("Error al obtener datos del usuario");
if ($filaUsuario = mysqli_fetch_assoc($resultadoUsuario)) {
    $monedaUsuario = $filaUsuario["moneda"];
}

//Inicializar variables
$importe = 0;
$concepto = "";
$accion = "";
$fecha = date('Y-m-d H:i:s');
$hora = date('H:i:s');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $importe = $_POST["importe"];
    $concepto = $_POST["concepto"];

    if (!is_numeric($importe) || $importe <= 0) {
        array_push($_SESSION["error"], "El importe debe ser un número positivo.");
        header("Location: ../retirarMovimiento.php");
        exit();
    }
}

// Obtener el último saldo registrado
$consultaSaldo = "SELECT saldo_total FROM movimientos WHERE id_cliente = '$dni' ORDER BY fecha DESC LIMIT 1";
$resultadoSaldo = mysqli_query($conexion, $consultaSaldo) or die("Error al obtener el último saldo");

$saldoAnterior = 0;

if ($filaSaldo = mysqli_fetch_assoc($resultadoSaldo)) {
    // Convertir de hexadecimal a decimal
    $saldoAnterior = hexdec($filaSaldo["saldo_total"]);
}

//Actualizar el saldo
$importe = -($importe);
$nuevoSaldo = $saldoAnterior + $importe;

if ($nuevoSaldo < 0) {
    array_push($_SESSION["error"], "No puede retirar esa cantidad. Saldo insuficiente.");
    header("Location: ../retirarMovimiento.php");
    exit();
} else {
    //Convertir de decimal a hexadecimal
    $saldoTotal_hexadecimal = dechex($nuevoSaldo);

    $insertar = "INSERT INTO movimientos (id_cliente, importe, concepto, fecha, hora, saldo_total) VALUES ('$dni', '$importe' ,'$concepto', '$fecha', '$hora','$saldoTotal_hexadecimal')";
    $resultado = mysqli_query($conexion, $insertar) or die("Algo ha ido mal en la consulta a la base de datos");
    header("location: ../banco.php");
}