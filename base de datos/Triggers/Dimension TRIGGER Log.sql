use sistema_observatorio_regional;

/*Triggers para dimensión*/
drop trigger after_insert_dimension
DELIMITER $$
CREATE TRIGGER after_insert_dimension AFTER INSERT ON tb_obs_dimension
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_dimension',CONCAT('insert the dimention: ',NEW.dimension_name));
$$
DELIMITER $$
CREATE TRIGGER after_delete_dimension AFTER delete ON tb_obs_dimension
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_dimension',CONCAT('delete the dimention: ',old.dimension_name));
$$
DELIMITER $$
CREATE TRIGGER after_update_dimension AFTER update ON tb_obs_dimension
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_dimension',CONCAT('update the dimention: ',old.dimension_name,' for ',new.dimension_name));
$$
