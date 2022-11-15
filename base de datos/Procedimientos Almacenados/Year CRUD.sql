USE sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de Year CRUD*/
DELIMITER //
Create or replace procedure insertYearIndicatorDataCuantitative (year int,value decimal(10,2), indicator_id int, region_id int,measurement_unit_id int)
BEGIN
INSERT INTO tb_obs_year (year_id,year_value,indicator_id,indicator_region_id,measurement_unit_id) 
values (year,value,indicador_id,region_id,measurement_unit_id);
END

DELIMITER //
Create or replace procedure deleteYearIndicatorDataCuantitative (id int,region_id int,year int)
BEGIN
DELETE FROM tb_obs_year WHERE year_id=year and indicator_region_id=region_id and indicator_id=id;
END

DELIMITER //
Create or replace procedure updateYearIndicatorDataCuantitative (year int,value decimal(10,2), id int, region_id int, measurement_unit int)
BEGIN
UPDATE tb_obs_year SET  year_id=year, year_value=value, measurement_unit_id=measurement_unit
WHERE indicator_id=id and indicator_region_id=region_id;
END

DELIMITER //
Create or replace procedure getAllYearIndicatorDataCuantitative ()
BEGIN
SELECT * FROM tb_obs_year;
END

DELIMITER //
Create or replace procedure getYearIndicatorDataCualitativebyYear (year int,id int,region_id int)
BEGIN
SELECT * FROM tb_obs_year
where indicator_id=id and indicator_region_id=region_id and year_id=year;
END

DELIMITER //



