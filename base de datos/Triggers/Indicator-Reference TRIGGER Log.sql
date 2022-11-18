use  sistema_observatorio_regional;
/*Triggers para la tabla de Indicators references*/
DELIMITER //
CREATE TRIGGER after_insert_indicator_reference AFTER INSERT ON tb_obs_indicator_reference
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator_reference',CONCAT('insert the indicator-reference: ',NEW.indicator_reference_id,'-',NEW.indicator_reference_id));
//
DELIMITER //
CREATE TRIGGER after_delete_indicator_reference AFTER delete ON tb_obs_indicator_reference
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator_reference',CONCAT('delete the indicator_reference: ',OLD.indicator_reference_id,'-',OLD.indicator_reference_id));
//