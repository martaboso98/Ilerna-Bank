DROP DATABASE IF EXISTS bancos;
CREATE DATABASE bancos;
USE bancos;

create table usuario (
	dni int auto_increment primary key,
    nombre varchar (40),
    apellidos varchar (80),
    contrasenya varchar (25),
    prestamo boolean default false
);

