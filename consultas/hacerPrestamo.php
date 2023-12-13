<?php

include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION["error"] = [];
$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

$porcentajeMinimoSaldo = 0.15; //15%
$interes = 8.14;

//Saldo Total
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
$saldo_formateado = number_format($saldoAnterior, 2);

//Fecha Nacimiento
$consultaFechaNacimiento = "SELECT fecha FROM usuario WHERE dni = '$dni'";
$resultadoFechaNacimiento = mysqli_query($conexion, $consultaFechaNacimiento) or die("Algo ha ido mal en la consulta a la base de datos");
$filaFechaNacimiento = mysqli_fetch_assoc($resultadoFechaNacimiento);
$FechaNacimiento = $filaFechaNacimiento["fecha"];

$consultaPrestamos = "SELECT * FROM prestamos WHERE estado = 'pendiente' AND id_cliente = '$dni'";
$resultadoPrestamos = mysqli_query($conexion, $consultaPrestamos) or die("Error en la consulta de préstamos");

function obtenerEdad($FechaNacimiento)
{
    $nacimiento = new DateTime($FechaNacimiento);
    $ahora = new DateTime(date("Y-m-d"));
    $diferencia = $ahora->diff($nacimiento);
    return $diferencia->format("%y");
}

//Si se cumplen los dos requisitos te deja hacer el préstamo sino no
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cantidadPrestamo = $_POST["cantidad_prestada"];
    $motivo = $_POST["motivo"];

    if (!is_numeric($cantidadPrestamo) || $cantidadPrestamo <= 0) {
        array_push($_SESSION["error"], "Ingrese una cantidad válida.");
        header("Location: ../prestamos.php");
    } else {
        $motivo = strtoupper($motivo);
        $saldoPendiente = 0;
    
        //15% del dinero que se quiere pedir
        $porcentaje15 = $cantidadPrestamo * $porcentajeMinimoSaldo;

        //Calcular edad
        $edad = obtenerEdad($FechaNacimiento);
    
        if ($saldo_formateado >= $porcentajeMinimoSaldo && $edad >= 18 && mysqli_num_rows($resultadoPrestamos) == 0) {
            $fechaPrestamo = date("Y-m-d"); // Get current date

            $insertarPrestamo = "INSERT INTO prestamos (id_cliente, fecha_prestamo, cantidad_prestada, interes, motivo) VALUES ('$dni', '$fechaPrestamo', '$cantidadPrestamo', '$interes', '$motivo')";
            $resultadoInsertarPrestamo = mysqli_query($conexion, $insertarPrestamo) or die("Algo ha ido mal en la consulta a la base de datos");
            header("location: ../misPrestamos.php");
        } else {
            array_push($_SESSION["error"], "Disculpe, no cumple alguno de los requisitos.");
            header("Location: ../prestamos.php");
        }
    }
    
} 