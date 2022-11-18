use  sistema_observatorio_regional;

/*Triggers para la tabla de subvariables*/
DELIMITER $$
CREATE TRIGGER after_insert_subVariable AFTER INSERT ON tb_obs_sub_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_sub_variable',CONCAT('insert the sub variable: ',NEW.sub_variable_name));
$$
DELIMITER $$
CREATE TRIGGER after_delete_subVariable AFTER delete ON tb_obs_sub_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_sub_variable',CONCAT('delete the sub variable: ',old.sub_variable_name));
$$
DELIMITER $$
CREATE TRIGGER after_update_sub_variable AFTER update ON tb_obs_sub_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_sub_variable',CONCAT('update the sub variable: ',old.sub_variable_name,' for ',new.sub_variable_name));
$$
