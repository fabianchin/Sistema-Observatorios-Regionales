use  sistema_observatorio_regional;
/*Procedimientos almacenados para la tabla de References CRUD*/
DELIMITER //
Create or replace procedure insertReference (reference_id int,link varchar(50))
BEGIN
INSERT INTO tb_obs_reference (reference_id,reference_link) 
values (reference_id,link);
END
DELIMITER //
Create or replace procedure deleteReference (id int)
BEGIN
DELETE FROM tb_obs_reference WHERE tb_obs_reference.reference_id=id;
END
DELIMITER //
Create or replace procedure updateReference (id int,link varchar(50))
BEGIN
UPDATE tb_obs_reference SET  tb_obs_reference.reference_link=link
WHERE tb_obs_reference.reference_id=id;
END
DELIMITER //
Create or replace procedure getAllReferences ()
BEGIN
SELECT * FROM tb_obs_reference;
END
DELIMITER //
Create or replace procedure getReferencebyId (id int)
BEGIN
SELECT * FROM tb_obs_reference where tb_obs_reference_id=id;
END
DELIMITER //
/*Triggers para la tabla de references*/
CREATE TRIGGER after_insert_reference AFTER INSERT ON tb_obs_reference
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_reference',CONCAT('insert the reference: ',NEW.reference_link));
DELIMITER //
CREATE TRIGGER after_delete_reference AFTER delete ON tb_obs_reference
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_reference',CONCAT('delete the reference: ',old.reference_link));
DELIMITER //
CREATE TRIGGER after_update_reference AFTER update ON tb_obs_reference
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_reference',CONCAT('update the reference: ',old.reference_link,' for ',new.reference_link));
