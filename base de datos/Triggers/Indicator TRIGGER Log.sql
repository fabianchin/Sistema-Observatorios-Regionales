use sistema_observatorio_regional;

/*Triggers para indicadores*/

DELIMITER $$
CREATE TRIGGER after_insert_indicator AFTER INSERT ON tb_obs_indicator
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator',CONCAT('insert the indicator: ',NEW.indicator_name));
$$

DELIMITER $$
CREATE TRIGGER after_delete_indicator AFTER delete ON tb_obs_indicator
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator',CONCAT('delete the indicator: ',old.indicator_name));
$$

DELIMITER $$
CREATE TRIGGER after_update_indicator AFTER update ON tb_obs_indicator
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator',CONCAT('update the indicator: ',old.indicator_name,' for ',new.indicator_name));
$$

