use  sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de Indicador_References CRUD*/
DELIMITER //
Create or replace procedure insertIndicatorReference (reference_id int,indicator_id int)
BEGIN
INSERT INTO tb_obs_indicator_reference (indicator_reference_indicator_id,indicator_reference_reference_id) 
values (indicator_id,reference_id);
END
DELIMITER //
Create or replace procedure deleteIndicatorReference (reference_id int,indicator_id int)
BEGIN
DELETE FROM tb_obs_indicator_reference WHERE 
tb_obs_indicator_reference.reference_id=reference_id and 
tb_obs_indicator_reference.indicator_id=indicator_id;
END
DELIMITER //
Create or replace procedure getAllIndicatorsReferences ()
BEGIN
SELECT * FROM tb_obs_indicator_reference;
END
DELIMITER //
Create or replace procedure getIndicatorReferencebyId (indicator_id int,reference_id int)
BEGIN
SELECT * FROM tb_obs_indicator_reference where indicator_reference_indicator_id=indicator_id
and indicator_reference_reference_id=reference_id;
END
DELIMITER //
/*Triggers para la tabla de Indicators references*/
CREATE TRIGGER after_insert_indicator_reference AFTER INSERT ON tb_obs_indicator_reference
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator_reference',CONCAT('insert the indicator-reference: ',NEW.indicator_reference_indicator_id,'-',NEW.indicator_reference_reference_id));
DELIMITER //
CREATE TRIGGER after_delete_indicator_reference AFTER delete ON tb_obs_indicator_reference
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator_reference',CONCAT('delete the indicator_reference: ',OLD.indicator_reference_indicator_id,'-',OLD.indicator_reference_reference_id));
