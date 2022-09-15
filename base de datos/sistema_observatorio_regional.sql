#Correr solo la primera vez este comando:
CREATE DATABASE sistema_observatorio_regional;

/*  
	DROP DATABASE sistema_observatorio_regional;
*/ 

/* Inicio de seccion OBS BRUNCA */

/* Final de seccion OBS BRUNCA */


/* Inicio de seccion OBS CHOROTEGA */

/* Final de seccion OBS CHOROTEGA */


/* Inicio de seccion OBS HUETAR NORTE */
/* MODULO DE DASHBOARDS */
CREATE table tb_obs_dimension(
	dimension_id int AUTO_INCREMENT NOT NULL,
	dimension_name varchar(50) NOT NULL DEFAULT 'Dimension no definida',
    
	CONSTRAINT pk_dimension_id PRIMARY KEY (dimension_id) 
);

CREATE TABLE tb_obs_variable(
	variable_id int AUTO_INCREMENT NOT NULL,
	variable_dimension_id int NOT NULL,
	variable_name varchar(50) NOT NULL DEFAULT 'No definido',
    
	CONSTRAINT pk_variable_id PRIMARY KEY (variable_id),
	CONSTRAINT fk_variable_dimension_id FOREIGN KEY (variable_dimension_id) REFERENCES tb_obs_dimension (dimension_id)
);

CREATE TABLE tb_obs_sub_variable(
	sub_variable_id int AUTO_INCREMENT NOT NULL,
	sub_variable_variable_id int NOT NULL,
	sub_variable_name varchar(50) NOT NULL DEFAULT 'Sub Variable no definida',
    
	CONSTRAINT pk_sub_variable_id PRIMARY KEY (sub_variable_id),
	CONSTRAINT fk_sub_variable_variable_id FOREIGN KEY (sub_variable_variable_id) REFERENCES tb_obs_variable (variable_id)
);

CREATE TABLE tb_obs_indicator(
	indicator_id int AUTO_INCREMENT NOT NULL,
	indicator_sub_variable_id int NOT NULL,
	indicator_name varchar(50) NOT NULL DEFAULT 'Indicador no definido',
    
	CONSTRAINT pk_indicator_id PRIMARY KEY (indicator_id),
	CONSTRAINT fk_indicator_sub_variable_id FOREIGN KEY (indicator_sub_variable_id) REFERENCES tb_obs_sub_variable (sub_variable_id)
);

CREATE table tb_obs_variable_type(
	variable_type_id int AUTO_INCREMENT NOT NULL,
	variable_type_category varchar(50) NOT NULL DEFAULT 'Tipo de variable no definido',
    
	CONSTRAINT pk_variable_type_id PRIMARY KEY (variable_type_id) 
);

CREATE table tb_obs_region(
	region_id int AUTO_INCREMENT NOT NULL,
	region_name varchar(50) NOT NULL DEFAULT 'Region no definida',
    
	CONSTRAINT pk_region_id PRIMARY KEY (region_id) 
);

CREATE table tb_obs_reference(
	reference_id int AUTO_INCREMENT NOT NULL,
	reference_link varchar(50) NOT NULL DEFAULT 'Link de referencia no definido',
    
	CONSTRAINT pk_reference_id PRIMARY KEY (reference_id) 
);

CREATE table tb_obs_year(
	year_id int AUTO_INCREMENT NOT NULL,
	year_year int(4) NOT NULL DEFAULT -1,
		
	CONSTRAINT pk_year_id PRIMARY KEY (year_id) 
);

/*Tabla intermedia - Weak Entity*/
CREATE TABLE tb_obs_indicator_reference(
    indicator_reference_indicator_id int NOT NULL,
	indicator_reference_reference_id int NOT NULL,
    
	CONSTRAINT fk_indicator_reference_indicator_id FOREIGN KEY (indicator_reference_indicator_id) REFERENCES tb_obs_indicator (indicator_id),
    CONSTRAINT fk_indicator_reference_reference_id FOREIGN KEY (indicator_reference_reference_id) REFERENCES tb_obs_reference (reference_id)
);

/*Tabla intermedia - Weak Entity*/
/*Esta obtiene los datos de la lista y de los años, o sea, cuantitativa y cualitativa. En logica se debe de validar
que, en caso de ser cualitativa, el año se pondrá en algun valor por defecto y se llenara el dato en "dato_indicador_total" */
CREATE TABLE tb_obs_indicator_data(
    indicator_data_indicator_id int NOT NULL,
    indicator_data_year_id int,
    indicator_data_quantitative decimal(10,0) NOT NULL DEFAULT -1,
    indicator_data_qualitative varchar(5000) NOT NULL DEFAULT 'No hay dato disponible',
    indicator_data_qualitative_total decimal(10,0) NOT NULL DEFAULT -1,
    
	CONSTRAINT fk_indicator_data_indicator_id FOREIGN KEY (indicator_data_indicator_id) REFERENCES tb_obs_indicator (indicator_id),
    CONSTRAINT fk_indicator_data_year_id FOREIGN KEY (indicator_data_year_id) REFERENCES tb_obs_year (year_id)
);


CREATE TABLE tb_obs_indicator_details(
	/*indicator_details_id int,*/
    indicator_details_indicator_id int NOT NULL,
	indicator_details_variable_type_id int NOT NULL,
	indicator_details_region_id int NOT NULL,
    indicator_details_detail varchar(5000) NOT NULL DEFAULT 'No hay dato disponible',
	indicator_details_state int NOT NULL DEFAULT 0,
    
	/*CONSTRAINT pk_indicator_details_id PRIMARY KEY (indicator_details_id),*/
	CONSTRAINT fk_indicator_details_indicator_id FOREIGN KEY (indicator_details_indicator_id) REFERENCES tb_obs_indicator (indicator_id),
	CONSTRAINT fk_indicator_details_variable_type_id FOREIGN KEY (indicator_details_variable_type_id) REFERENCES tb_obs_variable_type (variable_type_id),
	CONSTRAINT fk_indicator_details_region_id FOREIGN KEY (indicator_details_region_id) REFERENCES tb_obs_region (region_id)
);
/* Final de seccion OBS HUETAR NORTE */

