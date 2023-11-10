<?php

    include_once("conexion.php");

    /*Recoger datos del formulario y mandarlos a la base de datos*/

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $dni = $_POST["dni"];
        $contrasenya = $_POST["contrasenya"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $tfno = $_POST["tfno"];
        $direccion = $_POST["direccion"];
        $fecha = $_POST["fecha"];
        $correo = $_POST["correo"];
    }

    //Comprueba si el usuario ya existe en la base de datos
    $consulta_existe = "SELECT dni FROM usuario WHERE dni = '$dni'";
    $resultado_existe = mysqli_query($conexion, $consulta_existe);

    if (mysqli_num_rows($resultado_existe) > 0){
        echo "<script>alert('El usuario ya existe en la base de datos. No se puede duplicar.')</script>";
    } else {
        $insertar = "INSERT INTO usuario VALUES ('$dni' ,'$nombre', '$apellidos', '$contrasenya', '$tfno', '$direccion', '$fecha', '$correo')";
        $resultado = mysqli_query($conexion, $insertar) or die ( "Algo ha ido mal en la consulta a la base de datos");
        header("location: ../banco.php");
    }

