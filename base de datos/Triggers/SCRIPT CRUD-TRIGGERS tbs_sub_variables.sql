use  sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de dimension CRUD*/
DELIMITER //
Create or replace procedure insertSubVariable (variable_id int,name varchar(50))
BEGIN
INSERT INTO tb_obs_sub_variable (sub_variable_variable_id,sub_variable_name) 
values (variable_id,name);
END
DELIMITER //
Create or replace procedure deleteSubVariable (id int)
BEGIN
DELETE FROM tb_obs_sub_variable WHERE tb_obs_sub_variable.sub_variable_id=id;
END
DELIMITER //
Create or replace procedure updateSubVariable (id int, variable_id int,name varchar(50))
BEGIN
UPDATE tb_obs_sub_variable SET  tb_obs_sub_variable.sub_variable_variable_id=variable_id,
tb_obs_sub_variable.sub_variable_name=name
WHERE tb_obs_sub_variable.sub_variable_id=id;
END
DELIMITER //
Create or replace procedure getAllSubVariables ()
BEGIN
SELECT * FROM tb_obs_sub_variables;
END
DELIMITER //
Create or replace procedure getSubVariablebyId (id int)
BEGIN
SELECT * FROM tb_obs_sub_variable where tb_obs_sub_variable.sub_variable_id=id;
END
DELIMITER //
/*Triggers para la tabla de subvariables*/
CREATE TRIGGER after_insert_subVariable AFTER INSERT ON tb_obs_sub_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_sub_variable',CONCAT('insert the sub variable: ',NEW.sub_variable_name));
DELIMITER //
CREATE TRIGGER after_delete_subVariable AFTER delete ON tb_obs_sub_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_sub_variable',CONCAT('delete the sub variable: ',old.sub_variable_name));
DELIMITER //
CREATE TRIGGER after_update_sub_variable AFTER update ON tb_obs_sub_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_sub_variable',CONCAT('update the sub variable: ',old.sub_variable_name,' for ',new.sub_variable_name));
