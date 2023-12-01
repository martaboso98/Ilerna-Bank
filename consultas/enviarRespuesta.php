<?php
include_once("conexion.php");

// Verificar si se ha iniciado sesión
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$dni = isset($_SESSION['dni']) ? $_SESSION['dni'] : null;

$consultaNombre = "SELECT nombre FROM usuario WHERE dni = '$dni'";
$resultadoNombre = mysqli_query($conexion, $consultaNombre) or die("Algo ha ido mal en la consulta a la base de datos");

// Verifica si se obtuvieron resultados
if ($filaNombre = mysqli_fetch_assoc($resultadoNombre)) {
    $destinatario = $filaNombre['nombre'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mensaje = $_POST["mensaje"];

    $consultaRemitente = "SELECT nombre FROM usuario WHERE dni = '$dni'";
    $resultadoRemitente = mysqli_query($conexion, $consultaRemitente) or die("Algo ha ido mal en la consulta a la base de datos");
    
    if ($fila = mysqli_fetch_assoc($resultadoRemitente)) {
        $remitente = $fila['nombre'];
    }

    $insertarMensaje = "INSERT INTO mensajes (remitente, destinatario, mensaje) VALUES ('$remitente', '$destinatario', '$mensaje')";
    $resultado_usuario = mysqli_query($conexion, $insertarMensaje);

}

header ("location: ../mensajes.php");

 // Formulario para responder al mensaje
 /*echo "<form method='post' action='consultas/enviarRespuesta.php'>";
 echo "<input type='hidden' name='remitente' value='$dni'>";
 echo "<input type='hidden' name='destinatario' value='" . $fila["remitente"] . "'>";
 echo "<input type='hidden' name='mensaje_original' value='" . $fila["mensaje"] . "'>";
 echo "<textarea name='mensaje_respuesta' placeholder='Responder al mensaje'></textarea>";
 echo "<input type='submit' value='Responder'>";
 echo "</form>";*/