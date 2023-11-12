<?php
    include_once("conexion.php");

    //Verificar si se ha iniciado sesión
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

    //Comprobar que la contraseña actual es la que ha introducido
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $contrasenyaInsertada = $_POST["contrasenya"];
        $nuevaContrasenya = $_POST["nuevaContrasenya"];
        $nuevaContrasenyaComprobar = $_POST["nuevaContrasenyaComprobar"];
    }

    $consultarContrasenya = "SELECT contrasenya FROM usuario WHERE dni='$dni'";
    $resultadoContrasenya = mysqli_query($conexion, $consultarContrasenya);

    $fila = mysqli_fetch_assoc($resultadoContrasenya);
    $contrasenya = $fila['contrasenya'];

    if ($nuevaContrasenya === $nuevaContrasenyaComprobar) {
        if ($contrasenyaInsertada === $contrasenya) {
            $insertar = "UPDATE usuario SET contrasenya = '$nuevaContrasenya' WHERE dni='$dni'";
            $resultado = mysqli_query($conexion, $insertar) or die ( "Algo ha ido mal en la consulta a la base de datos");
            header ("location: ../areapersonal.php");
        } else {
            echo "La contraseña actual no es correcta.";
        }
    } else {
        echo "La contraseña no coincide";
    }
    
