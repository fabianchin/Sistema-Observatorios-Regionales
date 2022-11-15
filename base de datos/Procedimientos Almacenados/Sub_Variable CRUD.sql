use  sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de sub_variable CRUD*/
DELIMITER //
Create or replace procedure insertSubVariable (variable_id int,name varchar(50))
BEGIN
INSERT INTO tb_obs_sub_variable (sub_variable_variable_id,sub_variable_name) 
values (variable_id,name);
END
DELIMITER //
Create or replace procedure deleteSubVariable (id int)
BEGIN
DELETE FROM tb_obs_sub_variable WHERE sub_variable_id=id;
END
DELIMITER //
Create or replace procedure updateSubVariable (id int, variable_id int,name varchar(50))
BEGIN
UPDATE tb_obs_sub_variable SET  sub_variable_variable_id=variable_id,
sub_variable_name=name
WHERE sub_variable_id=id;
END
DELIMITER //
Create or replace procedure getAllSubVariable ()
BEGIN
SELECT * FROM tb_obs_sub_variable;
END
DELIMITER //
Create or replace procedure getSubVariablebyId (id int)
BEGIN
SELECT * FROM tb_obs_sub_variable where tb_obs_sub_variable.sub_variable_id=id;
END
DELIMITER //