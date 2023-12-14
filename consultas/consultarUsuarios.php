<?php
include_once("conexion.php");

// Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

//Seleccionar usuarios
$consultaNombreUsuario = "SELECT nombre, dni FROM usuario";
$resultadoNombreUsuario = mysqli_query($conexion, $consultaNombreUsuario) or die("Algo ha ido mal en la consulta a la base de datos");

if ($resultadoNombreUsuario) {
    echo "<form action='' method='post' class='text-white'>";
    echo "<label for='usuario'>Seleccione un usuario:</label>";
    echo "<select name='usuario' class='form-select' id='usuario'>";
    echo "<option value=''></option>";

    while ($filaNombre = mysqli_fetch_assoc($resultadoNombreUsuario)) {
        echo "<option value='" . $filaNombre["dni"] . "'>" . $filaNombre["nombre"] . "</option>";
    }

    echo "</select>";
    echo "<br>";
    echo "<input type='submit' class='btn btn-amarillo text-dark' value='Mostrar Usuario'>";
    echo "</form>";
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}


