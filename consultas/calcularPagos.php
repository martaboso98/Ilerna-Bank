<?php

include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

//Cantidad Prestada
$consultaCantidad = "SELECT cantidad_prestada FROM prestamos WHERE id_cliente = '$dni'";
$resultadoCantidad = mysqli_query($conexion, $consultaCantidad) or die("Algo ha ido mal en la consulta a la base de datos");
$filaCantidad = mysqli_fetch_assoc($resultadoCantidad);
$cantidadPrestamo = $filaCantidad["cantidad_prestada"];

//Plazo
$consultaPlazo = "SELECT plazo FROM prestamos WHERE id_cliente = '$dni'";
$resultadoPlazo = mysqli_query($conexion, $consultaPlazo) or die("Algo ha ido mal en la consulta a la base de datos");
$filaPlazo = mysqli_fetch_assoc($resultadoPlazo);
$plazo = $filaPlazo["plazo"];

//ID préstamo
$consultaIDPrestamos = "SELECT id_prestamos FROM prestamos WHERE id_cliente = '$dni'";
$resultadoIDPrestamos = mysqli_query($conexion, $consultaIDPrestamos) or die("Algo ha ido mal en la consulta a la base de datos");
$filaIDPrestamos = mysqli_fetch_assoc($resultadoIDPrestamos);
$IDPrestamos = $filaIDPrestamos["id_prestamos"];

//Interés Mensual
$interes = 8.14;
$interesMensual = ($interes / 100) / 12;

if ($plazo != 0) {
    $cuotaMensual = ($cantidadPrestamo * $interesMensual) / (1 - pow(1 + $interesMensual, -$plazo));
} else {
    echo "<p class='text-white'>Error: El plazo no puede ser cero.</p>";
}

//Cuota Mensual
$capitalMensual = ($cantidadPrestamo * $interesMensual) / (1 - pow(1 + $interesMensual, -$plazo));
$cantidadADevolver = $capitalMensual * $plazo;

//Fecha finalización a partir del plazo
$fechaInicio = new DateTime();
$fechaFinalizacion = clone $fechaInicio;
$fechaFinalizacion->add(new DateInterval("P{$plazo}M")); //Plazo en meses
$fechaPago = clone $fechaInicio; //Para no cambiar la original
$fechaInicioString = $fechaInicio->format('Y-m-d');
$fechaFinalizacionString = $fechaFinalizacion->format('Y-m-d');

$saldoPendiente = 0;
$totalPagado = 0;

// Verificar si ya existen pagos para el préstamo para que no se vuelva a mostrar la tabla repetida al refrescar la pagina
$consultaPagos = "SELECT * FROM pagos WHERE id_prestamos='$IDPrestamos'";
$resultadoPagos = mysqli_query($conexion, $consultaPagos) or die("Algo ha ido mal en la consulta a la base de datos");
if (mysqli_num_rows($resultadoPagos) === 0) {
    for ($mes = 1; $mes <= $plazo; $mes++) {
        $interesMensual = $cantidadPrestamo * $interesMensual;

        //Total pagado
        $totalPagado = $totalPagado + $capitalMensual;
        //Saldo pendiente
        $saldoPendiente = $cantidadADevolver - $totalPagado;

        //Fecha de cada pago
        $fechaPago->add(new DateInterval("P1M")); //Sumar un mes a la fecha del pago actual
        $fechaPagoString = $fechaPago->format('Y-m-d');

        $insertarPrestamo = "INSERT INTO pagos (id_prestamos, fecha_pago, capital_mensual, saldo_pendiente, total_pagado) VALUES ('$IDPrestamos', '$fechaPagoString', '$capitalMensual', '$saldoPendiente', '$totalPagado')";
        $resultadoInsertarPrestamo = mysqli_query($conexion, $insertarPrestamo) or die("Algo ha ido mal en la consulta a la base de datos");
    }
}

echo "Préstamo solicitado con éxito.";

// Obtener los pagos relacionados con el préstamo
$consultaPagos = "SELECT * FROM pagos WHERE id_prestamos='$IDPrestamos'";
$resultadoPagos = mysqli_query($conexion, $consultaPagos) or die("Algo ha ido mal en la consulta a la base de datos");

echo "<table class='text-white'>
        <tr>
            <th>Fecha de Pago</th>
            <th>Capital Mensual</th>
            <th>Saldo Pendiente</th>
            <th>Total Pagado</th>
        </tr>";

while ($filaPago = mysqli_fetch_assoc($resultadoPagos)) {
    echo "<tr>
            <td>{$filaPago['fecha_pago']}</td>
            <td>{$filaPago['capital_mensual']}</td>
            <td>{$filaPago['saldo_pendiente']}</td>
            <td>{$filaPago['total_pagado']}</td>
            </tr>";
}

echo "</table>";


