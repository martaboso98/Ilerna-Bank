<?php

include_once("conexion.php");
session_start();

/*Recoger datos del formulario y mandarlos a la base de datos*/

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dni = $_POST["dni"];
    $contrasenya = $_POST["contrasenya"];

    $_SESSION["dni"] = $dni;
    $_SESSION["contrasenya"] = $contrasenya;
    $_SESSION["error"] = [];
}

//Comprueba si el usuario ya existe en la base de datos
$consulta_existe = "SELECT dni, contrasenya FROM usuario WHERE dni = '$dni'";
$resultado_existe = mysqli_query($conexion, $consulta_existe);

if (mysqli_num_rows($resultado_existe) > 0) {
    $fila = mysqli_fetch_assoc($resultado_existe);

    //Para la contraseña cifrada
    if (password_verify($contrasenya, $fila['contrasenya'])) {
        //Para el administrador
        if ($dni == "123") {
            header("Location: ../cuentasAdmin.php");
        } else {
            header("Location: ../banco.php");
        }
    } else {
        array_push($_SESSION["error"], "Datos incorrectos.");
        header("Location: ../index.php");
    }



} else {
    array_push($_SESSION["error"], "Datos incorrectos.");
    header("Location: ../index.php");
}

