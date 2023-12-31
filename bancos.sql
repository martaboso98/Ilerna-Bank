DROP DATABASE IF EXISTS bancos;
CREATE DATABASE bancos;
USE bancos;

CREATE TABLE roles (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(50) NOT NULL
);

CREATE TABLE usuario (
    dni INT PRIMARY KEY,
    nombre VARCHAR(40) DEFAULT '-',
    apellidos VARCHAR(80) DEFAULT '-',
    contrasenya VARCHAR(250) DEFAULT '-',
    tfno INT DEFAULT NULL,
    direccion VARCHAR(80) DEFAULT '-',
    fecha DATE DEFAULT NULL,
    correo VARCHAR(70) DEFAULT '-',
    imagen LONGBLOB,
    iban VARCHAR(50) DEFAULT '-',
    codigo_postal INT DEFAULT NULL,
    ciudad VARCHAR(50) DEFAULT '-',
    provincia VARCHAR(50) DEFAULT '-',
    pais VARCHAR(50) DEFAULT '-',
    moneda VARCHAR(50),
    id_rol INT,
    FOREIGN KEY (id_rol)
        REFERENCES roles (id_rol)
);

CREATE TABLE movimientos (
    id_movimiento INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    saldo_total VARCHAR(100),
    importe FLOAT,
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    hora TIME NOT NULL,
    concepto VARCHAR(80),
    FOREIGN KEY (id_cliente)
        REFERENCES usuario (dni)
);

CREATE TABLE prestamos (
    id_prestamos INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT NOT NULL,
    fecha_prestamo DATE,
    cantidad_prestada VARCHAR(100),
    plazo INT default 22,
    interes FLOAT,
    motivo VARCHAR(200),
    estado ENUM ("pendiente", "aprobado", "rechazado") DEFAULT "pendiente",
    FOREIGN KEY (id_cliente)
        REFERENCES usuario (dni)
);

CREATE TABLE pagos (
    id_pagos INT AUTO_INCREMENT PRIMARY KEY,
    id_prestamos INT NOT NULL,
    fecha_pago DATETIME DEFAULT CURRENT_TIMESTAMP,
    capital_mensual FLOAT,
    saldo_pendiente FLOAT,
    total_pagado FLOAT,
    FOREIGN KEY (id_prestamos)
        REFERENCES prestamos (id_prestamos)
);

CREATE TABLE mensajes (
    id_mensaje INT AUTO_INCREMENT PRIMARY KEY,
    remitente VARCHAR(50),
    destinatario VARCHAR(50),
    fecha_envio DATETIME DEFAULT CURRENT_TIMESTAMP,
    mensaje TEXT
);

insert into roles (nombre_rol) values ("administrador");

