USE sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de Indicador_data_cualitative CRUD*/
DELIMITER //
Create or replace procedure insertIndicatorDataCualitative (desctiption varchar(100),total decimal(10,2), indicator_id int, region_id int)
BEGIN
INSERT INTO tb_obs_indicator_data_cualitative (indicator_data_description,indicator_data_total,indicator_id,indicator_region_id) 
values (description,total,indicador_id,region_id);
END

DELIMITER //
Create or replace procedure deleteIndicatorDataCualitative (id int,region_id int)
BEGIN
DELETE FROM tb_obs_indicator_data_cualitative WHERE indicator_id=id and indicator_region_id=region_id;
END

DELIMITER //
Create or replace procedure updateIndicatorDataCualitative (desctiption varchar(100),total decimal(10,2), id int, region_id int)
BEGIN
UPDATE tb_obs_indicator_data_cualitative SET  indicator_data_description=description, indicator_data_total=total
WHERE indicator_id=id and indicator_region_id=region_id;
END

DELIMITER //
Create or replace procedure getAllIndicatorDataCualitative ()
BEGIN
SELECT * FROM tb_obs_idicator_data_cualitative;
END

DELIMITER //
Create or replace procedure getIndicatorDataCualitativebyId (id int,region_id int)
BEGIN
SELECT * FROM tb_obs_idicator_data_cualitative
where indicator_id=id and indicator_region_id=region_id;
END

DELIMITER //



