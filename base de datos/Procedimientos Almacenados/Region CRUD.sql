use  sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de Region CRUD*/
DELIMITER //
Create or replace procedure insertRegion (name varchar(50))
BEGIN
INSERT INTO tb_obs_region (region_name) 
values (name);
END
DELIMITER //
Create or replace procedure deleteRegion (id int)
BEGIN
DELETE FROM tb_obs_region WHERE region_id=id;
END
DELIMITER //
Create or replace procedure updateRegion (id int,name varchar(50))
BEGIN
UPDATE tb_obs_region SET  region_id=name
WHERE region_id=id;
END
DELIMITER //
Create or replace procedure getAllRegions ()
BEGIN
SELECT * FROM tb_obs_region;
END
DELIMITER //
Create or replace procedure getRegionbyId (id int)
BEGIN
SELECT * FROM tb_obs_region where region_id=id;
END
DELIMITER //
