<?php
include_once("conexion.php");

// Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

if ($dni) {
    //Seleccionar usuarios
    $consultaUsuario = "SELECT dni, nombre FROM usuario";
    $resultadoUsuario = mysqli_query($conexion, $consultaUsuario) or die("Algo ha ido mal en la consulta a la base de datos");

    //Obtener el ID del rol de administrador
    $consultaRolAdmin = "SELECT id_rol FROM roles WHERE nombre_rol = 'administrador'";
    $resultadoRolAdmin = mysqli_query($conexion, $consultaRolAdmin) or die("Error al obtener el rol de administrador");
    $idRolAdmin = mysqli_fetch_assoc($resultadoRolAdmin)['id_rol'];

    //Seleccionar al administrador
    $consultaAdmin = "SELECT dni, nombre FROM usuario WHERE id_rol = $idRolAdmin";
    $resultadoAdmin = mysqli_query($conexion, $consultaAdmin) or die("Error al obtener al administrador");
}

if ($resultadoUsuario && $resultadoAdmin) {

    mysqli_data_seek($resultadoUsuario, 0);
    echo "<div class='mb-3'>";
    echo "<label for='destinatario' class='form-label text-white'>Destinatario:</label>";
    echo "<select name='destinatario' class='form-select' id='destinatario' required>";
    echo "<option value=''></option>"; //Línea vacía para que no aparezca directamente un nombre

    while ($fila = mysqli_fetch_assoc($resultadoUsuario)) {
        //Verificar si el usuario actual es diferente al usuario de sesión
        if ($fila["dni"] != $dni) {
            echo "<option value='" . $fila["dni"] . "'>" . $fila["nombre"] . "</option>";
        }
    }

    while ($filaAdmin = mysqli_fetch_assoc($resultadoAdmin)) {
        echo "<option value='" . $filaAdmin["dni"] . "'>" . $filaAdmin["nombre"] . " (Admin)</option>";
    }
    echo "</select>";
    echo "</div>";

    echo "<div class='mb-3 text-white'>";
    echo "Mensaje: <textarea name='mensaje' class='form-control'></textarea>";
    echo "<br>";
    echo "<input type='submit' class='btn btn-amarillo text-dark' value='Enviar'>";
    echo "</div>";

} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

