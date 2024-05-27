create database sistema_cotizacion;

use sistema_cotizacion;

create table roles
(
id_rol int auto_increment primary key,
nom_rol varchar (150) 
);

insert into roles values (1,"Administrador");
insert into roles values (2,"Supervisor");
insert into roles values (3,"Vendedor");

create table usuarios
(
id int auto_increment primary key,
usuario varchar (150),
password varchar (50),
nombre varchar (150),
rol int,
constraint fk_roles foreign key (rol) references roles(id_rol)
);
ALTER TABLE usuarios MODIFY password VARCHAR(255);

select * from usuarios