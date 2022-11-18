use  sistema_observatorio_regional;
/*Triggers para la tabla de Indicator_data_cuantitative*/
DELIMITER //
CREATE TRIGGER after_insert_indicator_data_cuantitative AFTER INSERT ON tb_obs_indicator_data_cuantitative
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator_data_cuantitative',CONCAT('insert the indicator_data_cuantitative: ',NEW.indicator_data_description,'-',NEW.indicator_id));
//
DELIMITER //
CREATE TRIGGER after_delete_indicator_data_cuantitative AFTER delete ON tb_obs_indicator_data_cuantitative
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator_data_cuantitative',CONCAT('delete the indicator_data_cuantitative: ',OLD.indicator_data_description,'-',OLD.indicator_id));
//
DELIMITER //
CREATE TRIGGER after_update_indicator_data_cuantitative AFTER update ON tb_obs_indicator_data_cuantitative
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator_data_cuantitative',CONCAT('update the indicator_data_cuantitative: ',OLD.indicator_data_description,'-',NEW.indicator_data_description));
//