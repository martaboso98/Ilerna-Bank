<?php
include_once("conexion.php");

// Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

if ($dni) {
    // Seleccionar usuarios
    $consultaUsuario = "SELECT dni, nombre FROM usuario";
    $resultadoUsuario = mysqli_query($conexion, $consultaUsuario) or die("Algo ha ido mal en la consulta a la base de datos");

    // Obtener el ID del rol de administrador
    $consultaRolAdmin = "SELECT id_rol FROM roles WHERE nombre_rol = 'administrador'";
    $resultadoRolAdmin = mysqli_query($conexion, $consultaRolAdmin) or die("Error al obtener el rol de administrador");
    $idRolAdmin = mysqli_fetch_assoc($resultadoRolAdmin)['id_rol'];

    // Seleccionar al administrador
    $consultaAdmin = "SELECT dni, nombre FROM usuario WHERE id_rol = $idRolAdmin";
    $resultadoAdmin = mysqli_query($conexion, $consultaAdmin) or die("Error al obtener al administrador");
}

if ($resultadoUsuario && $resultadoAdmin) {
    echo "<form method='post' action='enviarMensaje.php'>";

    mysqli_data_seek($resultadoUsuario, 0);
    echo "<label for='destinatario' class='label'>Destinatario:</label>";
    echo "<select name='destinatario' id='destinatario' required>";
    echo "<option value=''></option>"; // Opción vacía
    while ($fila = mysqli_fetch_assoc($resultadoUsuario)) {
        echo "<option value='" . $fila["dni"] . "'>" . $fila["nombre"] . "</option>";
    }

    while ($filaAdmin = mysqli_fetch_assoc($resultadoAdmin)) {
        echo "<option value='" . $filaAdmin["dni"] . "'>" . $filaAdmin["nombre"] . " (Admin)</option>";
    }
    echo "</select>";

    echo "Mensaje: <textarea name='mensaje'></textarea>";
    echo "<input type='submit' value='Enviar'>";
    echo "</form>";

} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}
?>
