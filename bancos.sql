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
);

