<?php
include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

if ($dni) {
    $consultaDatos = "SELECT imagen FROM usuario WHERE dni = '$dni'";
    $resultadoDatos = mysqli_query($conexion, $consultaDatos) or die("Algo ha ido mal en la consulta a la base de datos");
}

while ($fila = mysqli_fetch_assoc($resultadoDatos)) {
    echo "<img src='images/" . $fila['imagen'] . "' class='imagenUsuario'>";
}
