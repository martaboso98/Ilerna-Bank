<?php

include_once("conexion.php");

// Recoger datos del formulario y mandarlos a la base de datos
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $fecha = $_POST["fecha"];
    $direccion = $_POST["direccion"];
    $codigo_postal = $_POST["codigo_postal"];
    $ciudad = $_POST["ciudad"];
    $provincia = $_POST["provincia"];
    $pais = $_POST["pais"];
    $contrasenya = $_POST["contrasenya"];
    $tfno = $_POST["tfno"];
    $correo = $_POST["correo"];
    $imagen = $_POST["imagen"];

    $nombre_imagen = $_FILES["imagen"]["name"];
    $carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . "/Ilerna-Bank/images/";
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_destino . $nombre_imagen);

}

// Verificar si el usuario ha cambiado algo en el formulario
$consulta_usuario = "SELECT * FROM usuario WHERE dni = '$dni'";
echo $consulta_usuario;
$resultado_usuario = mysqli_query($conexion, $consulta_usuario);

if (!$resultado_usuario) {
    die("Error en la consulta SQL: " . mysqli_error($conexion));
}

if (mysqli_num_rows($resultado_usuario) > 0) {
    $fila_usuario = mysqli_fetch_assoc($resultado_usuario);

    if (
        $fila_usuario["nombre"] !== $nombre ||
        $fila_usuario["apellidos"] !== $apellidos ||
        $fila_usuario["fecha"] !== $fecha ||
        $fila_usuario["direccion"] !== $direccion ||
        $fila_usuario["codigo_postal"] !== $codigo_postal ||
        $fila_usuario["ciudad"] !== $ciudad ||
        $fila_usuario["provincia"] !== $provincia ||
        $fila_usuario["pais"] !== $pais ||
        $fila_usuario["contrasenya"] !== $contrasenya ||
        $fila_usuario["tfno"] !== $tfno ||
        $fila_usuario["correo"] !== $correo
    ) {
        // Al menos un campo ha cambiado, realizar la actualización
        $actualizar = "UPDATE usuario SET nombre='$nombre', apellidos='$apellidos', fecha='$fecha', direccion='$direccion', codigo_postal='$codigo_postal', ciudad='$ciudad', provincia='$provincia', pais='$pais', contrasenya='$contrasenya', tfno='$tfno', correo='$correo' WHERE dni='$dni'";
        $resultado_actualizar = mysqli_query($conexion, $actualizar) or die("Algo ha ido mal en la consulta de actualización");
    }

} else {
    $insertar = "INSERT INTO usuario (dni, nombre, apellidos, contrasenya, tfno, direccion, fecha, correo, imagen) VALUES ('$dni', '$nombre', '$apellidos', '$contrasenya', '$tfno', '$direccion', '$fecha', '$correo', '$nombre_imagen')";
    $resultado = mysqli_query($conexion, $insertar) or die("Algo ha ido mal en la consulta a la base de datos");
}
