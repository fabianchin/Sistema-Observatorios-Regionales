use  sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de Indicator-Reference CRUD*/
DELIMITER //
Create or replace procedure insertIndicatorReference (indicator_id int,indicator_region_id int, indicator reference_id int)
BEGIN
INSERT INTO tb_obs_indicator_reference (indicator_id, indicator_region_id,indicator_reference_id) 
values (indicator_id,indicator_region_id,indicator_reference_id);
END
DELIMITER //
Create or replace procedure deleteIndicatorReference (id int,region_id int,reference_id int)
BEGIN
DELETE FROM tb_obs_indicator_reference 
WHERE indicator_id=id and indicator_reference_id= reference_id and indicator_region_id=region_id;
END
DELIMITER //
Create or replace procedure updateIndicatorReference (id int,region_id int, reference_id int)
BEGIN
UPDATE tb_obs_indicator_reference  SET  indicator_region_id=region_id, indicator_reference_id=reference_id 
WHERE indicator_id=id;
END
DELIMITER //
Create or replace procedure getAllIndicatorReferences ()
BEGIN
SELECT * FROM tb_obs_indicator_reference;
END
DELIMITER //
Create or replace procedure getIndicatorReferencebyId (id int)
BEGIN
SELECT * FROM tb_obs_indicator_reference where indicator_reference_id=id;
END
DELIMITER //
