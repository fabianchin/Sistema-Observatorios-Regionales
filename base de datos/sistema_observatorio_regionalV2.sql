CREATE SCHEMA IF NOT EXISTS sistema_observatorio_regional DEFAULT CHARACTER SET utf8 ;
USE sistema_observatorio_regional;

-- -----------------------------------------------------
-- Table tb_obs_dimension
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_dimension (
  dimension_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  dimension_name VARCHAR(50) NOT NULL);
  
-- -----------------------------------------------------
-- Table tb_obs_variable
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_variable (
  viarable_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  variable_name VARCHAR(50) NULL,
  variable_dimension INT NOT NULL,
  CONSTRAINT fk_variable_dimension
    FOREIGN KEY (variable_dimension)
    REFERENCES tb_obs_dimension (dimension_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table tb_obs_sub_variable
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_sub_variable (
  sub_variable_id INT AUTO_INCREMENT NOT NULL,
  sub_variable_name VARCHAR(50) NOT NULL,
  sub_variable_variable_id INT NOT NULL,
  PRIMARY KEY (sub_variable_id),
  CONSTRAINT fk_sub_variable_variable
    FOREIGN KEY (sub_variable_variable_id)
    REFERENCES tb_obs_variable (viarable_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table tb_obs_variable_type
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_variable_type (
  variable_type_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  variable_type_category VARCHAR(50) NULL);

-- -----------------------------------------------------
-- Table tb_obs_indicator
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_indicator (
  indicator_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  indicator_name VARCHAR(50) NULL,
  indicator_sub_variable INT NOT NULL,
  indicator_sub_variable_type INT NOT NULL,
  CONSTRAINT fk_indicator_sub_variable
    FOREIGN KEY (indicator_sub_variable)
    REFERENCES tb_obs_sub_variable (sub_variable_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_indicator_variable_type
    FOREIGN KEY (indicator_sub_variable_type)
    REFERENCES tb_obs_variable_type (variable_type_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table tb_obs_reference
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_reference (
  reference_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  reference_link VARCHAR(100) NULL);

-- -----------------------------------------------------
-- Table tb_obs_region
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_region (
  region_id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  region_name VARCHAR(50) NULL);

-- -----------------------------------------------------
-- Table tb_obs_indicador_details
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_indicador_details (
  details_indicator_id INT NOT NULL,
  details_region_id INT NOT NULL,
  PRIMARY KEY (details_indicator_id, details_region_id),
  CONSTRAINT fk_indicador_details_indicator
    FOREIGN KEY (details_indicator_id)
    REFERENCES tb_obs_indicator (indicator_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_indicador_details_region
    FOREIGN KEY (details_region_id)
    REFERENCES tb_obs_region (region_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table tb_obs_indicator_data_cualitative
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_indicator_data_cualitative (
  indicator_data_description VARCHAR(100) NULL,
  indicator_data_total DECIMAL(10) NULL,
  indicador_id INT NOT NULL,
  indicator_region_id INT NOT NULL,
  PRIMARY KEY (indicador_id, indicator_region_id),
CONSTRAINT fk_indicator_data_cualitative_indicador_details
    FOREIGN KEY (indicador_id , indicator_region_id)
    REFERENCES tb_obs_indicador_details (details_indicator_id , details_region_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table tb_obs_indicator_data_cuantitative
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_indicator_data_cuantitative (
  indicator_data_description VARCHAR(45) NULL,
  indicator_id INT NOT NULL,
  indicator_region_id INT NOT NULL,
  PRIMARY KEY (indicator_id, indicator_region_id),
  CONSTRAINT fk_indicator_data_cuantitative_indicador_details
    FOREIGN KEY (indicator_id , indicator_region_id)
    REFERENCES tb_obs_indicador_details (details_indicator_id , details_region_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table tb_obs_year
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_year (
  year_id INT NOT NULL,
  year_value INT NOT NULL,
  indicator_id INT NOT NULL,
  indicator_region_id INT NOT NULL,
  PRIMARY KEY (year_id, indicator_id, indicator_region_id),
  CONSTRAINT fk_year_indicator_data_cuantitative
    FOREIGN KEY (indicator_id , indicator_region_id)
    REFERENCES tb_obs_indicator_data_cuantitative (indicator_id , indicator_region_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table tb_obs_list
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_list (
  list_name VARCHAR(45) NOT NULL,
  list_value INT NULL,
  indicator_id INT NOT NULL,
  indicator_region_id INT NOT NULL,
  PRIMARY KEY (list_name, indicator_id, indicator_region_id),
  CONSTRAINT fk_list_indicator_data_cualitative
    FOREIGN KEY (indicator_id , indicator_region_id)
    REFERENCES tb_obs_indicator_data_cualitative (indicador_id , indicator_region_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table tb_obs_indicador_reference
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_indicador_reference (
  indicator_id INT NOT NULL,
  indicator_region_id INT NOT NULL,
  indicator_reference_id INT NOT NULL,
  PRIMARY KEY (indicator_id, indicator_region_id, indicator_reference_id),
  CONSTRAINT fk_indicador_details_has_reference_indicator
    FOREIGN KEY (indicator_id , indicator_region_id)
    REFERENCES tb_obs_indicador_details (details_indicator_id , details_region_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_indicador_details_has_reference_reference
    FOREIGN KEY (indicator_reference_id)
    REFERENCES tb_obs_reference (reference_id)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table users
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS users (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) NOT NULL,
  email VARCHAR(45) NULL,
  password VARCHAR(45) NULL,
  remember_token VARCHAR(45) NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL,
  PRIMARY KEY (id),
  UNIQUE INDEX name_UNIQUE (name ASC));


-- -----------------------------------------------------
-- Table tb_obs_log
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_obs_log (
  user VARCHAR(45) NULL,
  table_name VARCHAR(45) NULL,
  description VARCHAR(45) NULL,
  date TIMESTAMP NULL,
  INDEX fk_tb_obs_log_users1_idx (user ASC),
  CONSTRAINT fk_tb_obs_log_users1
    FOREIGN KEY (user)
    REFERENCES users (name)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);