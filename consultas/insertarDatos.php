<?php

include_once("conexion.php");
session_start();

/* Recoger datos del formulario y mandarlos a la base de datos */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $_SESSION["error"] = [];

    $dni = $_POST["dni"];
    if (strlen($dni) !== 8 || !is_numeric($dni)) {
        array_push($_SESSION["error"], "El DNI debe tener 8 números.");
        header("location: ../datosPersonales.php");
        exit();
    } else {

        $contrasenya = $_POST["contrasenya"];
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $pais = $_POST["pais"];
        $moneda = $_POST["moneda"];
        $correo = $_POST["correo"];

        //Verificar si se seleccionó una imagen
        if (isset($_FILES["imagen"]) && isset($_FILES["imagen"]["name"])) {
            $nombre_imagen = $_FILES["imagen"]["name"];
            $carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . "/Ilerna-Bank/images/";

            //Verificar si la imagen ya existe en la carpeta
            if (!file_exists($carpeta_destino . $nombre_imagen)) {
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_destino . $nombre_imagen);
            } else {
                $nombre_imagen = "usuario.png";
            }

        } 
    }
}

//Comprueba si el usuario ya existe en la base de datos
$consulta_existe = "SELECT dni FROM usuario WHERE dni = '$dni'";
$resultado_existe = mysqli_query($conexion, $consulta_existe);

if (mysqli_num_rows($resultado_existe) > 0) {
    echo "El usuario ya existe.";
} else {
    $fila = mysqli_fetch_assoc($resultado_existe);
    $nombre_original = $fila['nombre'];

    //Si el nombre tiene menos de 3 letras, se añade una Z al final
    if (strlen($nombre_original) <= 3) {
        $nombre_original = $nombre_original . 'z';
    }

    //Posición de una letra en el abecedario: Valor ASCII de la letra $letra - valor ASCII de la letra 'A' y suma 1 para que no empiece desde 0
    function letra_a_posicion($letra)
    {
        $letra = strtoupper($letra);
        $letra = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $letra); //Convertir a caracteres sin acentos
        return ord($letra) - ord('A') + 1;
    }

    $nombre_original = substr($nombre, 0, 4);

    //Convertir cada letra del nombre a su posición en el abecedario y luego a binario
    $nombre_binario = '';
    for ($i = 0; $i < strlen($nombre_original); $i++) {
        $letra_actual = $nombre_original[$i];
        $posicion_letra = letra_a_posicion($letra_actual);
        $binario_letra = decbin($posicion_letra);
        $nombre_binario .= $binario_letra;
    }

    //Ver si el iban ya existe en la base de datos
    $consultaIban = "SELECT iban FROM usuario WHERE iban = '$nombre_binario'";
    $resultadoIban = mysqli_query($conexion, $consultaIban) or die("Algo ha ido mal en la consulta a la base de datos");

    $contrasenyaCifrada = password_hash($contrasenya, PASSWORD_DEFAULT);

    if ($filaIban = mysqli_fetch_assoc($resultadoIban)) {
        //Si ya existe, añadir un 1 o un 0 al final
        $ibanExistente = $filaIban['iban'];
        $nuevoIban = $ibanExistente . rand(0, 1);

        $insertar = "INSERT INTO usuario (dni, nombre, apellidos, contrasenya, pais, correo, imagen, iban, moneda) VALUES ('$dni', '$nombre', '$apellidos', '$contrasenyaCifrada', '$pais', '$correo', '$nombre_imagen', '$nuevoIban', '$moneda')";
        $resultado = mysqli_query($conexion, $insertar) or die("Algo ha ido mal en la consulta a la base de datos");
    } else {
        $insertar = "INSERT INTO usuario (dni, nombre, apellidos, contrasenya, tfno, direccion, correo, imagen, iban, moneda) VALUES ('$dni', '$nombre', '$apellidos', '$contrasenyaCifrada', '$tfno', '$direccion', '$correo', '$nombre_imagen', '$nombre_binario', '$moneda')";
        $resultado = mysqli_query($conexion, $insertar) or die("Algo ha ido mal en la consulta a la base de datos");
    }

    // Una vez insertado el usuario, se creará en la tabla de movimientos una fila default para cuando se muestre la tabla movimientos esté a 0 todo y no de error
    $insertar2 = "INSERT INTO movimientos (id_cliente, saldo_total, importe, fecha, hora, concepto) VALUES ('$dni', 0, 0, NOW(), CURTIME(),  'Nuevo Usuario')";
    $resultado2 = mysqli_query($conexion, $insertar2) or die("Algo ha ido mal en la consulta a la base de datos");

    header("location: ../acceder.php");
}

