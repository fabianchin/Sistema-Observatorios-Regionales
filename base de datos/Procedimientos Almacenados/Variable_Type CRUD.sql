use  sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de variable_type CRUD*/
DELIMITER //
Create or replace procedure insertVariableType (category varchar(50))
BEGIN
INSERT INTO tb_obs_variable_type (variable_type_category) 
values (category);
END
DELIMITER //
Create or replace procedure deleteVariableType (id int)
BEGIN
DELETE FROM tb_obs_variable_type WHERE variable_type_id=id;
END
DELIMITER //
Create or replace procedure updateVariableType (id int, category varchar(50))
BEGIN
UPDATE tb_obs_variable_type SET  variable_type_category=category
WHERE tb_obs_variable_type.variable_type_id=id;
END
DELIMITER //
Create or replace procedure getAllVariableType ()
BEGIN
SELECT * FROM tb_obs_variable_type;
END
DELIMITER //
Create or replace procedure getVariableTypebyId (id int)
BEGIN
SELECT * FROM tb_obs_variable_type where variable_type_id=id;
END
DELIMITER //