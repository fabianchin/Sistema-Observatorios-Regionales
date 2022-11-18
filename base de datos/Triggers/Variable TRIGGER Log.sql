use sistema_observatorio_regional;

/*Triggers para variables*/
DELIMITER $$
CREATE TRIGGER after_insert_variable AFTER INSERT ON tb_obs_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_variable',CONCAT('insert the variable: ',NEW.variable_name));
$$

DELIMITER $$
CREATE TRIGGER after_delete_variable AFTER delete ON tb_obs_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_variable',CONCAT('delete the variable: ',old.variable_name));
$$

DELIMITER $$
CREATE TRIGGER after_update_variable AFTER update ON tb_obs_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_variable',CONCAT('update the variable: ',old.variable_name,' for ',new.variable_name));
$$
