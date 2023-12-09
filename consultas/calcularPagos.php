<?php

include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

// Obtener información del préstamo
$consultaPrestamo = "SELECT * FROM prestamos WHERE id_cliente = '$dni'";
$resultadoPrestamo = mysqli_query($conexion, $consultaPrestamo) or die("Algo ha ido mal en la consulta a la base de datos");

while ($filaPrestamo = mysqli_fetch_assoc($resultadoPrestamo)) {
    $estadoPrestamo = $filaPrestamo["estado"];
    $cantidadPrestamo = $filaPrestamo["cantidad_prestada"];
    $IDPrestamo = $filaPrestamo["id_prestamos"];
    $motivoPrestamo = $filaPrestamo["motivo"];

    if ($estadoPrestamo == "aprobado") {
        $plazo = 22;

        //Interés Mensual
        $interes = 8.14;
        $interesMensual = ($interes / 100) / 12;

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
        $consultaPagos = "SELECT * FROM pagos WHERE id_prestamos='$IDPrestamo'";
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

                $insertarPrestamo = "INSERT INTO pagos (id_prestamos, fecha_pago, capital_mensual, saldo_pendiente, total_pagado) VALUES ('$IDPrestamo', '$fechaPagoString', '$capitalMensual', '$saldoPendiente', '$totalPagado')";
                $resultadoInsertarPrestamo = mysqli_query($conexion, $insertarPrestamo) or die("Algo ha ido mal en la consulta a la base de datos");
            }
        }

        // Obtener los pagos relacionados con el préstamo
        $consultaPagos = "SELECT * FROM pagos WHERE id_prestamos='$IDPrestamo'";
        $resultadoPagos = mysqli_query($conexion, $consultaPagos) or die("Algo ha ido mal en la consulta a la base de datos");

        echo "<table class='tablas mt-5'>
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

    }
}

// Obtener información de todos los préstamos del cliente nuevamente para mostrar préstamos rechazados o pendientes
mysqli_data_seek($resultadoPrestamo, 0);

// Mostrar préstamos rechazados o pendientes
while ($filaPrestamo = mysqli_fetch_assoc($resultadoPrestamo)) {
    $estadoPrestamo = $filaPrestamo["estado"];
    $cantidadPrestamo = $filaPrestamo["cantidad_prestada"];
    $motivoPrestamo = $filaPrestamo["motivo"];

    if ($estadoPrestamo != "aprobado") {
        echo "<table class='tablas mt-5'>
            <tr>
                <th>Estado del préstamo</th>
                <th>Cantidad solicitada</th>
                <th>Motivo del préstamo</th>
            </tr>
            <tr>
                <td>$estadoPrestamo</td>
                <td>$cantidadPrestamo</td>
                <td>$motivoPrestamo</td>
            </tr>
            </table>";
    }
}

// Mostrar mensaje si no hay préstamos
if (mysqli_num_rows($resultadoPrestamo) == 0) {
    echo "<p class='text-white'>No tienes préstamos solicitados en este momento.</p>";
}



