<?php

include_once("conexion.php");
$validator = array("success" => false, "messages" => array());

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

if (!empty($_FILES["archivo"]["name"])){
    $fileName = basename($_FILES["archivo"]["name"]);
    $targetFilePath = "../images/.$fileName";
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $allowType = array("jpg", "png", "jpeg");

    if (in_array($fileType, $allowType)) {
        if (copy ($_FILES["archivo"]["tmp_name"], $targetFilePath)){
            $uploadedFile = $fileName;
            $validator["success"] = true;
            $validator["messages"] = "Imagen subida."; 
        } else {
            $validator["messages"] = "Imagen no subida.";        
        }
    } else {
        $validator["messages"] = "Solo se permiten formatos JPG, PNG y JPEG.";
    }
} else {
    $validator["messages"] = "No se proporcionó ninguna imagen.";
}

//Comprueba si el usuario ya existe en la base de datos
$consulta_existe = "SELECT dni FROM usuario WHERE dni = '$dni'";
$resultado_existe = mysqli_query($conexion, $consulta_existe);

if (mysqli_num_rows($resultado_existe) > 0) {
    echo "<script>alert('El usuario ya existe en la base de datos. No se puede duplicar.')</script>";
} else {
    $rutaDestino = "../images/" . $fileName;

    $insertar = "INSERT INTO usuario (dni, nombre, apellidos, contrasenya, tfno, direccion, fecha, correo, imagen) VALUES ('$dni' ,'$nombre', '$apellidos', '$contrasenya', '$tfno', '$direccion', '$fecha', '$correo', '$rutaDestino')";
    $resultado = mysqli_query($conexion, $insertar) or die("Algo ha ido mal en la consulta a la base de datos");
    
    //Una vez insertado el usuario, se creará en la tabla de movimientos una fila default para cuando se muestre la tabla movimientos esté a 0 todo y no de error
    $insertar2 = "INSERT INTO movimientos (id_cliente, saldo_total, importe, fecha, concepto) VALUES ('$dni', 0, 0, NOW(), 'Nuevo Usuario')";
    $resultado2 = mysqli_query($conexion, $insertar2) or die("Algo ha ido mal en la consulta a la base de datos");
    header("location: ../banco.php");
}

