USE sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de List CRUD*/
DELIMITER //
Create or replace procedure insertListIndicatorDataCualitative (name varchar(45),value decimal(10,2), indicator_id int, region_id int,measurement_unit_id int)
BEGIN
INSERT INTO tb_obs_list (list_name,list_value,indicator_id,indicator_region_id,measurement_unit_id) 
values (name,value,indicador_id,region_id,measurement_unit_id);
END

DELIMITER //
Create or replace procedure deleteListIndicatorDataCualitative (id int,region_id int,name varchar(45))
BEGIN
DELETE FROM tb_obs_list WHERE list_name=name and indicator_region_id=region_id and indicator_id=id;
END

DELIMITER //
Create or replace procedure updateListIndicatorDataCualitative (name varchar(45),value decimal(10,2), id int, region_id int,measurement_unit int)
BEGIN
UPDATE tb_obs_list SET  list_name=name, list_value=value, measurement_unit_id=measurement_unit
WHERE indicator_id=id and indicator_region_id=region_id;
END

DELIMITER //
Create or replace procedure getAllListIndicatorDataCualitative ()
BEGIN
SELECT * FROM tb_obs_list;
END

DELIMITER //
Create or replace procedure getListIndicatorDataCualitativebyName (name varchar(45),id int,region_id int)
BEGIN
SELECT * FROM tb_obs_list
where indicator_id=id and indicator_region_id=region_id and list_name=name;
END

DELIMITER //



