create database if not exists examenphp;

use examenphp;

create table if not exists Student(
StudentID int unsigned auto_increment primary key,
Voornaam varchar (225), Naam varchar (225),
IsAdmin boolean,
email varchar (225)
);

create table if not exists Leervak(
LeervakID int unsigned auto_increment primary key,
Naam varchar (120)
);

create table if not exists Resultaat (
ResultaatID int unsigned auto_increment primary key,
StudentID int unsigned,
LeervakID int unsigned,
Cijfer int,
constraint fk_student foreign key (StudentID) references Student (StudentID),
constraint fk_leervak foreign key (LeervakID) references Leervak (LeervakID));

create table if not exists Paswoord(
PaswoordID int unsigned auto_increment primary key,
StudentID int unsigned,
Paswoord varchar (500),
constraint fk_tostudent foreign key (StudentID) references Student (StudentID));

insert into Student (voornaam, naam, email, IsAdmin)
values ('Philippe', 'Van Damme', 'admin@gmail.com',1), ('Koen', 'Sorbet', 'student@gmail.com',0), ('Jos', 'DenOs','student2@gmail.com',0);

insert into LeerVak (naam)
values ('PHP'),('FrontEnd'),('Database');

insert into Resultaat (studentid, leervakid, cijfer)
values (1,1,99),(1,2,98),(1,3,97), (2,1,43),(2,2,23),(2,3,56),(3,1,76),(3,2,66),(3,3,88);

insert into paswoord (StudentID, Paswoord)
values (1,'a'),(2,'a'),(3,'a');


