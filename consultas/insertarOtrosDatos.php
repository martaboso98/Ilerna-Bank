<?php

include_once("conexion.php");

//Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;


// Recoger datos del formulario y mandarlos a la base de datos
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : '';
    $apellidos = isset($_POST["apellidos"]) ? trim($_POST["apellidos"]) : '';
    $direccion = isset($_POST["direccion"]) ? trim($_POST["direccion"]) : '';
    $codigo_postal = isset($_POST["codigo_postal"]) ? trim($_POST["codigo_postal"]) : '';
    $ciudad = isset($_POST["ciudad"]) ? trim($_POST["ciudad"]) : '';
    $provincia = isset($_POST["provincia"]) ? trim($_POST["provincia"]) : '';
    $pais = isset($_POST["pais"]) ? trim($_POST["pais"]) : '';
    $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"]) : '';
    $tfno = isset($_POST["tfno"]) ? trim($_POST["tfno"]) : '';
    $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : '';
    $imagen = isset($_POST["imagen"]) ? trim($_POST["imagen"]) : '';

    if (isset($_FILES["imagen"]) && isset($_FILES["imagen"]["name"])) {
        $nombre_imagen = $_FILES["imagen"]["name"];
        $carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . "/Ilerna-Bank/images/";

        //Verificar si la imagen ya existe en la carpeta
        if (!file_exists($carpeta_destino . $nombre_imagen)) {
            move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_destino . $nombre_imagen);
        }

    } else {
        echo "Error al subir el archivo: " . $_FILES["imagen"]["error"];
    }

}

//Verificar si el usuario ha cambiado algo en el formulario
$consulta_usuario = "SELECT * FROM usuario WHERE dni = '$dni'";
$resultado_usuario = mysqli_query($conexion, $consulta_usuario);

if (mysqli_num_rows($resultado_usuario) > 0) {
    $fila_usuario = mysqli_fetch_assoc($resultado_usuario);

    //Construir la consulta de actualización solo con los campos proporcionados
    $actualizar = "UPDATE usuario SET ";
    $actualizaciones = [];

    if ($nombre !== '' && $fila_usuario["nombre"] !== $nombre) {
        $actualizaciones[] = "nombre='$nombre'";
    }

    if ($apellidos !== '' && $fila_usuario["apellidos"] !== $apellidos) {
        $actualizaciones[] = "apellidos='$apellidos'";
    }

    if ($tfno !== '' && $fila_usuario["tfno"] !== $tfno) {
        $actualizaciones[] = "tfno='$tfno'";
    }

    if ($direccion !== '' && $fila_usuario["direccion"] !== $direccion) {
        $actualizaciones[] = "direccion='$direccion'";
    }

    if ($fecha !== '' && $fila_usuario["fecha"] !== $fecha) {
        $actualizaciones[] = "fecha='$fecha'";
    }

    if ($correo !== '' && $fila_usuario["correo"] !== $correo) {
        $actualizaciones[] = "correo='$correo'";
    }

    if ($nombre_imagen !== '' && $fila_usuario["imagen"] !== $nombre_imagen) {
        $actualizaciones[] = "imagen='$nombre_imagen'";
    }

    if ($codigo_postal !== '' && $fila_usuario["codigo_postal"] !== $codigo_postal) {
        $actualizaciones[] = "apellidos='$codigo_postal'";
    }

    if ($ciudad !== '' && $fila_usuario["ciudad"] !== $ciudad) {
        $actualizaciones[] = "ciudad='$ciudad'";
    }

    if ($provincia !== '' && $fila_usuario["provincia"] !== $provincia) {
        $actualizaciones[] = "provincia='$provincia'";
    }

    if ($pais !== '' && $fila_usuario["pais"] !== $pais) {
        $actualizaciones[] = "pais='$pais'";
    }

    //Comprobar si se necesita actualizar algún campo
    if (!empty($actualizaciones)) {
        $actualizar .= implode(", ", $actualizaciones);
        $actualizar .= " WHERE dni='$dni'";
        $resultado_actualizar = mysqli_query($conexion, $actualizar) or die("Algo ha ido mal en la consulta de actualización");
    }

    header ("location: ../areapersonal.php");

} else {
    $insertar = "INSERT INTO usuario (dni, nombre, apellidos, tfno, direccion, fecha, correo, imagen, codigo_postal, ciudad, provincia, pais) VALUES ('$dni', '$nombre', '$apellidos', '$tfno', '$direccion', '$fecha', '$correo', '$nombre_imagen', '$codigo_postal', '$ciudad', '$provincia', '$pais')";
    $resultado = mysqli_query($conexion, $insertar) or die("Algo ha ido mal en la consulta a la base de datos");

    header ("location: ../areapersonal.php");

}
