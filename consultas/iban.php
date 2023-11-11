<?php

include_once("conexion.php");

/* Nombre */
$dni =$_SESSION['dni'];

$consultaNombre = "SELECT nombre FROM usuario WHERE dni = '$dni'";
$resultadoNombre = mysqli_query($conexion, $consultaNombre) or die ("Algo ha ido mal en la consulta a la base de datos");
 
if ($fila = mysqli_fetch_assoc($resultadoNombre)) {
    $nombre = $fila['nombre'];

    //Si el nombre tiene menos de 3 letras, se añade una Z al final
    if (strlen($nombre) <= 3) {
        $nombre .= 'z';
    }

    //Posición de una letra en el abecedario: Valor ASCII de la letra $letra - valor ASCII de la letra 'A' y suma 1 para que no empiece desde 0
    function letra_a_posicion($letra) {
        $letra = strtoupper($letra);
        return ord($letra) - ord('A') + 1;
    }

    //Convertir cada letra del nombre a su posición en el abecedario y luego a binario
    $nombre_binario = '';
    for ($i = 0; $i < strlen($nombre); $i++) {
        $letra_actual = $nombre[$i];
        $posicion_letra = letra_a_posicion($letra_actual);
        $binario_letra = decbin($posicion_letra);
        $nombre_binario .= $binario_letra;
    }

    echo $nombre_binario;

} 

