use  sistema_observatorio_regional;
/*Triggers para la tabla de Indicator_data_cualitative*/
DELIMITER //
CREATE TRIGGER after_insert_indicator_data_cualitative AFTER INSERT ON tb_obs_indicator_data_cualitative
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator_data_cualitative',CONCAT('insert the indicator-data-cualitative: ',NEW.indicator_data_description,'-',NEW.indicator_data_total));
//
DELIMITER //
CREATE TRIGGER after_delete_indicator_data_cualitative AFTER delete ON tb_obs_indicator_data_cualitative
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator_data_cualitative',CONCAT('delete the indicator_reference: ',OLD.indicator_data_description,'-',OLD.indicator_data_total));
//