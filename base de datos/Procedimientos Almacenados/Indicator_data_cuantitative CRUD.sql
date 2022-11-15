USE sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de Indicador_data_cuantitative CRUD*/
DELIMITER //
Create or replace procedure insertIndicatorDataCuantitative (desctiption varchar(100), indicator_id int, region_id int)
BEGIN
INSERT INTO tb_obs_indicator_data_Cuantitative (indicator_data_description,indicator_id,indicator_region_id) 
values (description,indicador_id,region_id);
END

DELIMITER //
Create or replace procedure deleteIndicatorDataCuantitative (id int,region_id int)
BEGIN
DELETE FROM tb_obs_indicator_data_Cuantitative WHERE indicator_id=id and indicator_region_id=region_id;
END

DELIMITER //
Create or replace procedure updateIndicatorDataCuantitative (desctiption varchar(100), id int, region_id int)
BEGIN
UPDATE tb_obs_indicator_data_Cuantitative SET  indicator_data_description=description
WHERE indicator_id=id and indicator_region_id=region_id;
END

DELIMITER //
Create or replace procedure getAllIndicatorDataCuantitative ()
BEGIN
SELECT * FROM tb_obs_idicator_data_Cuantitative;
END

DELIMITER //
Create or replace procedure getIndicatorDataCuantitativebyId (id int,region_id int)
BEGIN
SELECT * FROM tb_obs_idicator_data_Cuantitative
where indicator_id=id and indicator_region_id=region_id;
END

DELIMITER //



