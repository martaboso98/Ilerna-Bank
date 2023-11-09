<?php

    include_once("conexion.php");

    /*Recoger datos del formulario y mandarlos a la base de datos*/

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $dni = $_POST["dni"];
        $contrasenya = $_POST["contrasenya"];

        $_SESSION["dni"] = $dni;
        $_SESSION["contrasenya"] = $contrasenya;
    }
            
    //Comprueba si el usuario ya existe en la base de datos
    $consulta_existe = "SELECT dni FROM usuario WHERE dni = '$dni'";
    $resultado_existe = mysqli_query($conexion, $consulta_existe);

    if (mysqli_num_rows($resultado_existe) > 0){
        echo "<script>alert('El usuario ya existe en la base de datos. No se puede duplicar.')</script>";
    } else {
        $consulta = "INSERT INTO usuario (dni, contrasenya) VALUES ('$dni', '$contrasenya')";
        $resultado1 = mysqli_query($conexion, $consulta) or die ( "Algo ha ido mal en la consulta a la base de datos");
    }

    include "banco.php";
