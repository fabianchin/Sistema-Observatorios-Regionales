USE sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de Indicator CRUD*/
DELIMITER //
Create or replace procedure insertIndicator (name varchar(50),sub_variable_id int, type_id int)
BEGIN
INSERT INTO tb_obs_indicator (indicator_name,indicator_sub_variable,indicator_sub_variable_type) 
values (name,sub_variabl_id,type_id);
END

DELIMITER //
Create or replace procedure deleteIndicator (id int)
BEGIN
DELETE FROM tb_obs_indicator WHERE indicator_id=id;
END

DELIMITER //
Create or replace procedure updateIndicator (id int, name varchar(50),sub_variable int,sub_variable_type int)
BEGIN
UPDATE tb_obs_indicator SET  indicator_name=name,indicator_sub_variable=sub_variable, indicator_sub_variable_type=sub_variable_type
WHERE tb_obs_indicator_id=id;
END

DELIMITER //
Create or replace procedure getAllIndicator ()
BEGIN
SELECT * FROM tb_obs_indicator;
END

DELIMITER //
Create or replace procedure getIndicatorbyId (id int)
BEGIN
SELECT * FROM tb_obs_indicator where indicator_id=id;
END

DELIMITER //



