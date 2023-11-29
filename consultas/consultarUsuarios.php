<?php
include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

if ($dni) {
    $consultaUsuario = "SELECT nombre FROM usuario";
    $resultadoUsuario = mysqli_query($conexion, $consultaUsuario) or die("Algo ha ido mal en la consulta a la base de datos");
}

if ($resultadoUsuario) {
    echo '<select name="remitente" id="remitente" required>';
    echo '<option value=""></option>';
    while ($fila = mysqli_fetch_assoc($resultadoUsuario)) {
        echo '<option value="' . $fila['nombre'] . '</option>';
    }
    echo '</select>';

    mysqli_data_seek($resultadoUsuario, 0);
    echo '<select name="destinatario" id="destinatario" required>';
    echo '<option value=""></option>'; // Opción vacía
    while ($fila = mysqli_fetch_assoc($resultadoUsuario)) {
        echo '<option value="'. $fila['nombre'] . '</option>';
    }
    echo '</select>';
    
    // Libera los resultados
    mysqli_free_result($resultadoUsuario);
} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}