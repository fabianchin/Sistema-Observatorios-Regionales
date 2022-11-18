use  sistema_observatorio_regional;
/*Triggers para la tabla de references*/

DELIMITER //
CREATE TRIGGER after_insert_reference AFTER INSERT ON tb_obs_reference
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_reference',CONCAT('insert the reference: ',NEW.reference_link));
//
DELIMITER //
CREATE TRIGGER after_delete_reference AFTER delete ON tb_obs_reference
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_reference',CONCAT('delete the reference: ',old.reference_link));
//
DELIMITER //
CREATE TRIGGER after_update_reference AFTER update ON tb_obs_reference
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_reference',CONCAT('update the reference: ',old.reference_link,' for ',new.reference_link));
//
