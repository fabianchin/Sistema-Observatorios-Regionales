use  sistema_observatorio_regional;
/*Triggers para la tabla de List*/
DELIMITER //
CREATE TRIGGER after_insert_List AFTER INSERT ON tb_obs_list
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_list',CONCAT('insert the list: ',NEW.list_name,'-',NEW.list_value,'-',NEW.indicator_id,'-',NEW.indicator_region_id));
//
DELIMITER //
CREATE TRIGGER after_delete_list AFTER delete ON tb_obs_list
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_list',CONCAT('delete the list: ',OLD.list_name,'-',OLD.list_value));
//
DELIMITER //
CREATE TRIGGER after_update_list AFTER update ON tb_obs_list
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_list',CONCAT('update the list: ',OLD.list_name,'-',OLD.list_value,'-',NEW.list_name,'-',NEW.list_value));
//