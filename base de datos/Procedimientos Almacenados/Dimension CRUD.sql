USE sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de dimension CRUD*/
DELIMITER //
Create or replace procedure insertDimension (name varchar(50))
BEGIN
INSERT INTO tb_obs (dimension_name) values (name);
END

DELIMITER //
Create or replace procedure deleteDimension (id int)
BEGIN
DELETE FROM tb_obs_dimension WHERE tb_obs_dimension.dimension_id=id;
END

DELIMITER //
Create or replace procedure updateDimension (id int, name varchar(50))
BEGIN
UPDATE tb_obs_dimension SET  tb_obs_dimension.dimension_name=name
WHERE tb_obs_dimension.dimension_id=id;
END

DELIMITER //
Create or replace procedure getAllDimension ()
BEGIN
SELECT * FROM tb_obs_dimension;
END

DELIMITER //
Create or replace procedure getDimensionbyId (id int)
BEGIN
SELECT * FROM tb_obs_dimension where dimension_id=id;
END
DELIMITER //
