USE sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de measurement_unit CRUD*/
DELIMITER //
Create or replace procedure insertMeasurementUnit (name varchar(45))
BEGIN
INSERT INTO tb_obs_measurement_unit (measurerment_unit_description) values (name);
END

DELIMITER //
Create or replace procedure deleteMeasurementUnit (id int)
BEGIN
DELETE FROM tb_obs_measurement_unit WHERE measurement_unit_id=id;
END

DELIMITER //
Create or replace procedure updateMeasurementUnit (id int, name varchar(45))
BEGIN
UPDATE tb_obs_measurement_unit SET  measurement_unit_description=name
WHERE measurement_unit_id=id;
END

DELIMITER //
Create or replace procedure getAllMeasurementUnit ()
BEGIN
SELECT * FROM tb_obs_measurement_unit;
END

DELIMITER //
Create or replace procedure getMeasurementUnitbyId (id int)
BEGIN
SELECT * FROM tb_obs_measurement_unit where measurement_unit_id=id;
END
DELIMITER //
