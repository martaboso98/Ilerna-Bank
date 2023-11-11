<?php

    include_once("conexion.php");

    /* Nombre */
    $dni = $_SESSION['dni'];

    $consultaSaldoTotal = "SELECT saldo_total FROM movimientos WHERE id_cliente = '$dni'";
    $resultadoSaldoTotal = mysqli_query($conexion, $consultaSaldoTotal) or die("Algo ha ido mal en la consulta a la base de datos");

    $fila = mysqli_fetch_assoc($resultadoSaldoTotal);
    echo $fila['saldo_total'] . " €";
    