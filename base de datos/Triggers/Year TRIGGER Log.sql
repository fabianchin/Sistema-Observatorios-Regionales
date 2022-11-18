use  sistema_observatorio_regional;
/*Triggers para la tabla de year*/
DELIMITER //
CREATE TRIGGER after_insert_year AFTER INSERT ON tb_obs_year
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_year',CONCAT('insert the year: ',NEW.year_id,'-',NEW.year_value,'-',NEW.indicator_id,'-',NEW.indicator_region_id));
//
DELIMITER //
CREATE TRIGGER after_delete_year AFTER delete ON tb_obs_year
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_year',CONCAT('delete the year: ',OLD.year_id,'-',OLD.year_value));
//
DELIMITER //
CREATE TRIGGER after_update_year AFTER update ON tb_obs_year
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_year',CONCAT('update the year: ',OLD.year_id,'-',OLD.year_value,'-',NEW.year_id,'-',NEW.year_value));
//