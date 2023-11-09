<?php

    //Datos base de datos
    $usuario = "root";
    $password = "";
    $servidor = "localhost";
    $basededatos = "bancos";

    //Crear conexión base de datos
    $conexion = mysqli_connect($servidor, $usuario, $password, $basededatos) or die ("No se ha podido conectar al servidor de Base de datos");

