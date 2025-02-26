CREATE SCHEMA IF NOT EXISTS Empresa DEFAULT CHARACTER set utf8;
use Empresa;

CREATE TABLE IF NOT EXISTS Departamento(
id int auto_increment not null unique,
nome varchar (255) not null unique,
andar int not null,
PRIMARY KEY(id)    
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS Funcionario(
nome varchar (255) not null,
idade int not null,
cargo varchar(255) not null,
CPF varchar(11)  not null unique ,
telefone varchar(11) not null,    
email varchar(255) not null,
formacao varchar(255) not null,
vencimento decimal(10,2) not null,
numero_faltas int not null,
metas_cumpridas int not null,
remuneracao decimal(10,2) not null,
departamento_id int not null,
PRIMARY KEY(CPF),
foreign key(departamento_id) references Departamento(id)    
)ENGINE=InnoDB;

