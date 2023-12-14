<?php
include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuarioSeleccionado = $_POST['usuario'];

    //Seleccionar dato usuario seleccionado
    $consultaUsuario = "SELECT * FROM usuario WHERE dni = '$usuarioSeleccionado'";
    $resultadoUsuario = mysqli_query($conexion, $consultaUsuario) or die("Algo ha ido mal en la consulta a la base de datos");

    echo "<table class='tablas mt-5'>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Apellidos</th>";
    echo "<th>DNI</th>";
    echo "</tr>";

    while ($fila = mysqli_fetch_assoc($resultadoUsuario)) {

        echo "<tr>";
        echo "<td>" . ($fila['nombre']) . "</td>";
        echo "<td>" . ($fila['apellidos']) . "</td>";
        echo "<td>" . ($fila['dni']) . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>Teléfono</th>";
        echo "<th>Fecha de nacimiento</th>";
        echo "<th>Email</th>";
        echo "<th>País</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" . ($fila['tfno']) . "</td>";
        echo "<td>" . ($fila['fecha']) . "</td>";
        echo "<td>" . ($fila['correo']) . "</td>";
        echo "<td>" . ($fila['pais']) . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<th>Dirección</th>";
        echo "<th>Código Postal</th>";
        echo "<th>Provincia</th>";
        echo "<th>Ciudad</th>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" . ($fila['direccion']) . "</td>";
        echo "<td>" . ($fila['codigo_postal']) . "</td>";
        echo "<td>" . ($fila['provincia']) . "</td>";
        echo "<td>" . ($fila['ciudad']) . "</td>";
        echo "</tr>";

    }

    echo "</table>";
}
