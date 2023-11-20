DROP DATABASE IF EXISTS bancos;
CREATE DATABASE bancos;
USE bancos;

create table usuario (
	dni int primary key,
    nombre varchar (40),
    apellidos varchar (80),
    contrasenya varchar (25),
    tfno int,
    direccion varchar (80),
    fecha date,
    correo varchar (70),
    imagen varchar (250) default 'usuario.jpg'
);

create table movimientos (
	id_movimiento int auto_increment primary key, 
    id_cliente int not null,
    saldo_total float default 0,
    importe float, 
    fecha date,
    concepto varchar (80),
	foreign key (id_cliente) references usuario (dni)
);

create table prestamos (
	id_prestamos int auto_increment primary key,
	id_cliente int not null,
	fecha_prestamo date,
    cantidad_prestada float,
    plazo int,
    interes float,
    motivo varchar (200),
	foreign key (id_cliente) references usuario (dni)
);

create table pagos (
	id_pagos int auto_increment primary key,
    id_prestamos int not null,
    fecha_pago date,
    capital_mensual float,
    saldo_pendiente float,
    total_pagado float,
	foreign key (id_prestamos) references prestamos (id_prestamos)
);

insert into usuario (dni, nombre, apellidos, contrasenya, tfno, direccion, fecha, correo) values (30696605, "Marta", "Borreguero", "marta", 672, "avenida", "1998-11/28", "marta@hotmail.com");

insert into movimientos values (1, 30696605, 1005, 30, "2023-11-11", "Mercadona");

