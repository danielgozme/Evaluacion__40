create database QPromotor;
use QPromotor;

create table Perfil
(Codigo int primary key auto_increment,
Descripcion varchar(50));

select * from Perfil;
insert into Perfil(Codigo,Descripcion) values(1,"Admi");
insert into Perfil(Codigo,Descripcion) values(2,"Usuario");

create table Usuario
(Rut varchar(10) primary key ,
Nombre varchar(50),
Apellido_P varchar(50),
Apellido_M varchar(50),
Direccion varchar(50),
Telefono Varchar(20) ,
Clave varchar(25),
perfil_id int null,
foreign key(perfil_id) references Perfil(Codigo));
select * from Usuario;
insert into Usuario(Rut,Nombre,Apellido_P,Apellido_M,Direccion,Telefono,Clave,perfil_id) values("26285278-4","Daniel","Gozme","Cuellar","Av Transito 5550","962782924","1234",1);
insert into Usuario(Rut,Nombre,Apellido_P,Apellido_M,Direccion,Telefono,Clave,perfil_id) values("15293379-4","Tereza","Quezada","Montecinos","Av Pradera 7770","921355665","1234",2);


drop table Usuario;
drop table Perfil;



