USE SISTEMA_OBSERVATORIO_REGIONAL;
/*Tabla de usuarios del sistema con password encriptado*/
CREATE TABLE tb_obs_users(
user VARCHAR(30) PRIMARY KEY,
password Varchar (50),
name VARCHAR(20),
telephone VARCHAR(8),
email VARCHAR(30),
method VARCHAR(20));
/*Datos de prueba*/
INSERT INTO tb_obs_users(user,password,name, telephone,email,method) 
VALUES('admin',MD5('1234'),'Fabian','3453453','asdjfasdf@gmail.com','MD5');
INSERT INTO tb_obs_users(user,password,name, telephone,email,method) 
VALUES('editor',sha1('editor'),'Luis','77668877','castroluis@hotmail.com','SHA1');

