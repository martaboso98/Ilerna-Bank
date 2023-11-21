<?php
include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

if ($dni) {
    $consultaDatos = "SELECT * FROM usuario WHERE dni = '$dni'";
    $resultadoDatos = mysqli_query($conexion, $consultaDatos) or die("Algo ha ido mal en la consulta a la base de datos");
}

echo "<table class='tablas'>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>Apellidos</th>";
echo "</tr>";

while ($fila = mysqli_fetch_assoc($resultadoDatos)) {
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

    //Mostrar la imagen
    echo "<tr>";
    echo "<td><img src='images/" . $fila['imagen'] . "' height='160' width='213' /></td>";
    echo "</tr>";

}

echo "</table>";



