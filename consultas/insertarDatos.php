<?php

include_once("conexion.php");

/* Recoger datos del formulario y mandarlos a la base de datos */

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dni = $_POST["dni"];
    $contrasenya = $_POST["contrasenya"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $tfno = $_POST["tfno"];
    $direccion = $_POST["direccion"];
    $fecha = $_POST["fecha"];
    $correo = $_POST["correo"];

    $nombre_imagen = $_FILES["imagen"]["name"];
    $carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . "../images";
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_destino . $nombre_imagen);
}

// Comprueba si el usuario ya existe en la base de datos
$consulta_existe = "SELECT dni FROM usuario WHERE dni = '$dni'";
$resultado_existe = mysqli_query($conexion, $consulta_existe);

// Corrige el nombre de la variable $_FILES
if (mysqli_num_rows($resultado_existe) > 0) {
    echo "<script>alert('El usuario ya existe en la base de datos. No se puede duplicar.')</script>";
} else {
    $insertar = "INSERT INTO usuario (dni, nombre, apellidos, contrasenya, tfno, direccion, fecha, correo, imagen) VALUES ('$dni', '$nombre', '$apellidos', '$contrasenya', '$tfno', '$direccion', '$fecha', '$correo', '$nombre_imagen')";
    $resultado = mysqli_query($conexion, $insertar) or die("Algo ha ido mal en la consulta a la base de datos");
    
    // Una vez insertado el usuario, se creará en la tabla de movimientos una fila default para cuando se muestre la tabla movimientos esté a 0 todo y no de error
    $insertar2 = "INSERT INTO movimientos (id_cliente, saldo_total, importe, fecha, concepto) VALUES ('$dni', 0, 0, NOW(), 'Nuevo Usuario')";
    $resultado2 = mysqli_query($conexion, $insertar2) or die("Algo ha ido mal en la consulta a la base de datos");
    header("location: ../banco.php");
}
