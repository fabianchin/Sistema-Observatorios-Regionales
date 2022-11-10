use sistema_observatorio_regional;
/*Tablas y Triggers para alimentar la bitácora de uso del sistema*/
CREATE TABLE tb_obs_log(
id INT auto_increment PRIMARY KEY,
user VARCHAR(30),
table_name VARCHAR(30),
description VARCHAR(50),
date  TIMESTAMP DEFAULT NOW()
)

/*Triggers para dimensión*/
drop trigger after_insert_dimension
DELIMITER $$
CREATE TRIGGER after_insert_dimension AFTER INSERT ON tb_obs_dimension
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_dimension',CONCAT('insert the dimention: ',NEW.dimension_name));
$$
drop trigger after_delete_dimension
DELIMITER $$
CREATE TRIGGER after_delete_dimension AFTER delete ON tb_obs_dimension
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_dimension',CONCAT('delete the dimention: ',old.dimension_name));
$$
drop trigger after_update_dimension
DELIMITER $$
CREATE TRIGGER after_update_dimension AFTER update ON tb_obs_dimension
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_dimension',CONCAT('update the dimention: ',old.dimension_name,' for ',new.dimension_name));
$$
/*Triggers para variables*/
drop trigger after_insert_variable
DELIMITER $$
CREATE TRIGGER after_insert_variable AFTER INSERT ON tb_obs_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_variable',CONCAT('insert the variable: ',NEW.variable_name));
$$
drop trigger after_delete_variable
DELIMITER $$
CREATE TRIGGER after_delete_variable AFTER delete ON tb_obs_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_variable',CONCAT('delete the variable: ',old.variable_name));
$$
drop trigger after_update_variable
DELIMITER $$
CREATE TRIGGER after_update_variable AFTER update ON tb_obs_variable
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_variable',CONCAT('update the variable: ',old.variable_name,' for ',new.variable_name));
$$
/*Triggers para indicadores*/
drop trigger after_insert_indicator
DELIMITER $$
CREATE TRIGGER after_insert_indicator AFTER INSERT ON tb_obs_indicator
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator',CONCAT('insert the indicator: ',NEW.indicator_name));
$$
drop trigger after_delete_indicator
DELIMITER $$
CREATE TRIGGER after_delete_indicator AFTER delete ON tb_obs_indicator
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator',CONCAT('delete the indicator: ',old.indicator_name));
$$
drop trigger after_update_indicator
DELIMITER $$
CREATE TRIGGER after_update_indicator AFTER update ON tb_obs_indicator
FOR each row
  INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_indicator',CONCAT('update the indicator: ',old.indicator_name,' for ',new.indicator_name));
$$

