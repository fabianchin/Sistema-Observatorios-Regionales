USE sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de Variables CRUD*/
DELIMITER //
Create or replace procedure insertVariable (dimension int, name varchar(50))
BEGIN
INSERT INTO tb_obs_variable (variable_dimension_id,variable_name) values (dimension,name);
END

DELIMITER //
Create or replace procedure deleteVariable (id int)
BEGIN
DELETE FROM tb_obs_variable WHERE variable_id=id;
END

DELIMITER //
Create or replace procedure updateVariable (id int, dimension int, name varchar(50))
BEGIN
UPDATE tb_obs_variable SET  tb_obs_variable.variable_dimension_id=dimension,tb_obs_variable.variable_name=name
WHERE tb_obs_variable.variable_id=id;
END

DELIMITER //
Create or replace procedure getAllVariables ()
BEGIN
SELECT * FROM tb_obs_variable;
END


DELIMITER //
Create or replace procedure getVariablebyId (id int)
BEGIN
SELECT * FROM tb_obs_variable where tb_obs_variable.variable_id=id;
END

DELIMITER //



