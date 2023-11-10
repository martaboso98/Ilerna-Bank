<?php

include_once("conexion.php");
session_start();

/* Nombre */
$dni =$_SESSION['dni'];

$consultaNombre = "SELECT nombre FROM usuario WHERE dni = '$dni'";
$resultadoNombre = mysqli_query($conexion, $consultaNombre) or die ("Algo ha ido mal en la consulta a la base de datos");
 
// Verifica si se obtuvieron resultados
if ($fila = mysqli_fetch_assoc($resultadoNombre)) {
    echo $fila['nombre'];
} else {
    echo "Invitado"; // Valor predeterminado si no se encuentra el nombre
}