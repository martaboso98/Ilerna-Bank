<?php

    include_once("conexion.php");

    /*Nombre*/
          
    if (isset($_SESSION["dni"])) {
        $dniUsuario = $_SESSION["dni"];
        $consultaNombre = "SELECT nombre FROM usuario WHERE dni = '$dniUsuario'";

        $resultadoNombre = mysqli_query($conexion, $consultaNombre) or die ("Algo ha ido mal en la consulta a la base de datos");

        $fila = mysqli_fetch_assoc($resultadoNombre);
        //Obtener el nombre del array asociativo
        $nombreUsuario = $fila['nombre'];
        echo $nombreUsuario;
    }

    