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
    echo "<form action='' method='post' class='text-white'>"; // Reemplaza 'tu_script.php' con la acción correcta
    echo "<label for='usuario'>Seleccione un usuario:</label>";
    echo "<select name='usuario' class='form-select' id='usuario'>";
    echo "<option value=''></option>"; // Línea vacía para que no aparezca directamente un nombre

    while ($filaNombre = mysqli_fetch_assoc($resultadoNombreUsuario)) {
        $selected = ($filaNombre['dni'] == $_POST['usuario']) ? 'selected' : '';
        echo "<option value='" . $filaNombre["dni"] . "' $selected>" . $filaNombre["nombre"] . "</option>";
    }

    echo "</select>";
    echo "<br>";
    echo "<input type='submit' class='btn btn-amarillo text-dark' value='Mostrar Usuario'>";
    echo "</form>";

} else {
    echo "Error en la consulta: " . mysqli_error($conexion);
}

// Mostrar mensajes y formulario para responder
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioSeleccionado = $_POST['usuario'];

    //Seleccionar dato usuario seleccionado
    $consultaUsuario = "SELECT * FROM usuario WHERE dni = '$usuarioSeleccionado'";
    $resultadoUsuario = mysqli_query($conexion, $consultaUsuario) or die("Algo ha ido mal en la consulta a la base de datos");

    echo "<table class='tablas mt-5'>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Apellidos</th>";
    echo "</tr>";

    while ($fila = mysqli_fetch_assoc($resultadoUsuario)) {

        echo "<tr>";
        echo "<td>" . ($fila['nombre']) . "</td>";
        echo "<td>" . ($fila['apellidos']) . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>Teléfono</th>";
        echo "<th>DNI</th>";
        echo "<th>Fecha de nacimiento</th>";
        echo "<th>Email</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" . ($fila['tfno']) . "</td>";
        echo "<td>" . ($fila['dni']) . "</td>";
        echo "<td>" . ($fila['fecha']) . "</td>";
        echo "<td>" . ($fila['correo']) . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>Dirección</th>";
        echo "<th>Código Postal</th>";
        echo "<th>Provincia</th>";
        echo "<th>Ciudad</th>";
        echo "<th>País</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" . ($fila['direccion']) . "</td>";
        echo "<td>" . ($fila['codigo_postal']) . "</td>";
        echo "<td>" . ($fila['provincia']) . "</td>";
        echo "<td>" . ($fila['ciudad']) . "</td>";
        echo "<td>" . ($fila['pais']) . "</td>";
        echo "</tr>";

    }

    echo "</table>";
}



