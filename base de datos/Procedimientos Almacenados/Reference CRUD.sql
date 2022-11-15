use  sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de Reference CRUD*/
DELIMITER //
Create or replace procedure insertReference (link varchar(100))
BEGIN
INSERT INTO tb_obs_reference (reference_link) 
values (link);
END
DELIMITER //
Create or replace procedure deleteReference (id int)
BEGIN
DELETE FROM tb_obs_reference WHERE reference_id=id;
END
DELIMITER //
Create or replace procedure updateReference (id int,link varchar(50))
BEGIN
UPDATE tb_obs_reference SET  reference_link=link
WHERE reference_id=id;
END
DELIMITER //
Create or replace procedure getAllReferences ()
BEGIN
SELECT * FROM tb_obs_reference;
END
DELIMITER //
Create or replace procedure getReferencebyId (id int)
BEGIN
SELECT * FROM tb_obs_reference where reference_id=id;
END
DELIMITER //
