create database curso;

use curso;

create table usuario (
  id int(11) auto_increment,
  nome varchar(32),
  email varchar(50),
  data_cadastro datetime,
  login varchar(20),
  senha varchar(20),
  constraint key1 primary key (id));
  
GRANT ALL PRIVILEGES ON curso.* TO 'curso'@'%' IDENTIFIED BY '123456';  

create table produto (
   id int(11) auto_increment,
   nome varchar(32),
   descricao varchar(255),
   preco_unitario decimal(10,2),
   fabricante varchar(20),
   data_cadastro datetime,
   constraint keyprod primary key (id));
