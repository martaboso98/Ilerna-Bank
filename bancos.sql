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
    correo varchar (70)
);

create table movimientos (
	id_movimiento int auto_increment primary key, 
    id_cliente int,
    saldo_total float default 0,
    importe float, 
    fecha date,
    concepto varchar (80),
	foreign key (id_cliente) references usuario (dni)
);

create table prestamos (
	id_prestamos int auto_increment primary key,
	id_cliente int,
	fecha_prestamo date,
    cantidad_prestado float,
    interes float,
    plazo int,
    cuota_mensual float,
    saldo_pendiente float,
	foreign key (id_cliente) references usuario (dni)
);

insert into usuario values (30696605, "Marta", "Borreguero", "marta", 672, "avenida", "1998-11/28", "marta@hotmail.com");

insert into movimientos values (1, 30696605, 25.25, 30, "2023-11-11", "Mercadona");

insert into prestamos values (1, 30696605, "2023-12-12", 3000, 0.2, 20, 100, 800);