<?php

    include_once("conexion.php");

    /*Recoger datos del formulario y mandarlos a la base de datos*/

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $tfno = $_POST["tfno"];
        $direccion = $_POST["direccion"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];
    }

    $insertar = "INSERT INTO usuario (nombre, apellidos, tfno, direccion, fecha, correo) VALUES ('$nombre', '$apellidos', '$tfno', '$direccion', '$fecha', '$correo')";
    $resultado = mysqli_query($conexion, $insertar) or die ( "Algo ha ido mal en la consulta a la base de datos");

    include "banco.php";
