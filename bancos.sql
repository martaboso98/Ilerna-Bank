DROP DATABASE IF EXISTS bancos;
CREATE DATABASE bancos;
USE bancos;

create table usuario (
	dni int primary key,
    nombre varchar (40) default "-",
    apellidos varchar (80) default "-",
    contrasenya varchar (25) default "-",
    tfno int default null,
    direccion varchar (80) default "-",
    fecha date default null,
    correo varchar (70) default "-",
    imagen longblob,
    iban varchar(50) default "-",
    codigo_postal int default null,
    ciudad varchar (50) default "-",
    provincia varchar (50) default "-",
    pais varchar (50) default "-"
);

create table movimientos (
	id_movimiento int auto_increment primary key, 
    id_cliente int not null,
    saldo_total float,
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

insert into usuario (dni, nombre, apellidos, contrasenya, tfno, direccion, fecha, correo, imagen) values (30696605, "Marta", "Borreguero", "marta", 672, "avenida", "1998-11/28", "marta@hotmail.com", "usuario.jpg");

insert into movimientos values (1, 30696605, 1005, 30, "2023-11-11", "Mercadona");

