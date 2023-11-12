<?php

include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

if ($dni) {
    $consultaNombre = "SELECT nombre FROM usuario WHERE dni = '$dni'";
    $resultadoNombre = mysqli_query($conexion, $consultaNombre) or die ("Algo ha ido mal en la consulta a la base de datos");
    
    // Verifica si se obtuvieron resultados
    if ($fila = mysqli_fetch_assoc($resultadoNombre)) {
        echo $fila['nombre'];
    }
} else {
    echo "Invitado";
}