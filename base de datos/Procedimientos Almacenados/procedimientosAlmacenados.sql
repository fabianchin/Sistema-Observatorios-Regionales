
/*PROCEDIMIENTOS ALMACENADOS PARA LA TABLA DE DIMENSION*/

DELIMITER //

CREATE   PROCEDURE  insertDimension(nombre varchar(50) )
BEGIN
INSERT INTO tb_obs_dimension (dimension_name) values(nombre);
END

DELIMITER //

CREATE   PROCEDURE deleteDimension( id int)
BEGIN
DELETE FROM tb_obs_dimension WHERE tb_obs_dimension.dimension_id = id;
END

//

DELIMITER //

CREATE PROCEDURE updateDimension(id int, nombre varchar(50))
BEGIN
UPDATE  tb_obs_dimension SET tb_obs_dimension.dimension_name = nombre 
WHERE tb_obs_dimension.dimension_id = id;
END

DELIMITER //

CREATE PROCEDURE getAllDimension()
BEGIN
	SELECT *  FROM tb_obs_dimension;
END //

DELIMITER //

CREATE PROCEDURE getDimensionById(id int)
BEGIN
	SELECT *  FROM tb_obs_dimension WHERE tb_obs_dimension.dimension_id = id;
END //


/*PROCEDIMEINTOS ALMACENADOS PARA LA TABLA INDICADOR*/

DELIMITER //

CREATE  PROCEDURE  insertIndicator(nombre varchar(50),sub_variable_id int  )
BEGIN
INSERT INTO tb_obs_indicator (indicator_name, indicator_sub_variable_id) values(nombre,sub_variable_id );
END

//

DELIMITER //

CREATE  PROCEDURE deleteIndicator( id int)
BEGIN
DELETE FROM tb_obs_indicator WHERE tb_obs_indicator.indicator_id = id;
END

//

DELIMITER //

CREATE PROCEDURE updateIndicator(id int, nombre varchar(50), sub_variable_id int)
BEGIN
UPDATE  tb_obs_indicator SET tb_obs_indicator.indicator_name = nombre ,
tb_obs_indicator.indicator_sub_variable_id = sub_variable_id
WHERE tb_obs_indicator.indicator_id = id;
END

DELIMITER //

CREATE PROCEDURE getAllIndicator()
BEGIN
	SELECT *  FROM tb_obs_indicator;
END //

DELIMITER //

CREATE PROCEDURE getIndicatorById(id int)
BEGIN
	SELECT *  FROM tb_obs_indicator WHERE tb_obs_indicator.indicator_id = id;
END //


/*Procedimientos almacenados para la tabla de Variables CRUD*/
DELIMITER //
Create  procedure insertVariable (dimension int, name varchar(50))
BEGIN
INSERT INTO tb_obs_variable (variable_dimension_id,variable_name) values (dimension,name);
END

DELIMITER //
Create  procedure deleteVariable (id int)
BEGIN
DELETE FROM tb_obs_variable WHERE tb_obs_variable.variable_id=id;
END

DELIMITER //
Create  procedure updateVariable (id int, dimension int, name varchar(50))
BEGIN
UPDATE tb_obs_variable SET  tb_obs_variable.variable_dimension_id=dimension,tb_obs_variable.variable_name=name
WHERE tb_obs_variable.variable_id=id;
END

DELIMITER //
Create  procedure getAllVariables ()
BEGIN
SELECT * FROM tb_obs_variable;
END


DELIMITER //
Create  procedure getVariablebyId (id int)
BEGIN
SELECT * FROM tb_obs_variable where tb_obs_variable.variable_id=id;
END