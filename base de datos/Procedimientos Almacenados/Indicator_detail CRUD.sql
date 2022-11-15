USE sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de Indicador_detail CRUD*/
DELIMITER //
Create or replace procedure insertIndicatorDetail (indicador_id int,region_id int)
BEGIN
INSERT INTO tb_obs_indicator_detail (detail_indicator_id,detail_region_id) 
values (indicador_id,region_id);
END

DELIMITER //
Create or replace procedure deleteIndicatorDetail (indicador_id int,region_id int)
BEGIN
DELETE FROM tb_obs_indicator_detail WHERE detail_indicator_id=id and detail_region_id=region_id;
END

DELIMITER //
Create or replace procedure updateIndicatorDetail (id int,region_id int)
BEGIN
UPDATE tb_obs_indicator_detail SET  detail_region_id=region_id
WHERE detail_indicator_id=id;
END

DELIMITER //
Create or replace procedure getAllIndicatorDetail ()
BEGIN
SELECT * FROM tb_obs_idicator_detail;
END

DELIMITER //
Create or replace procedure getIndicatorDetailbyId (indicador_id int,region_id int)
BEGIN
SELECT * FROM tb_obs_indicator_detail 
where tb_obs_indicator_detail.indicator_id=indicator_id and
   tb_obs_indicator_detail.region_id=region_id;
END

DELIMITER //



