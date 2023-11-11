<?php

    include_once("conexion.php");

    /* Nombre */
    $dni = $_SESSION['dni'];

    $consultaMovimientos = "SELECT fecha, concepto, importe, saldo_total FROM movimientos WHERE id_cliente = '$dni'";
    $resultadoMovimientos = mysqli_query($conexion, $consultaMovimientos) or die("Algo ha ido mal en la consulta a la base de datos");
    
    echo "<table class='tablas'>";
        echo "<tr>";
            echo "<th>Fecha</th>";
            echo "<th>Concepto</th>";
            echo "<th>Importe</th>";
            echo "<th>Saldo</th>";
    echo "</tr>";

    while ($fila = mysqli_fetch_assoc($resultadoMovimientos)) {
        echo "<tr>";
        echo "<td>" . ($fila['fecha']) . "</td>";
        echo "<td>" . ($fila['concepto']) . "</td>";
        echo "<td>" . ($fila['importe']) . " €</td>";
        echo "<td>" . ($fila['saldo_total']) . " €</td>";
        echo "</tr>";
    }

    echo "</table>";