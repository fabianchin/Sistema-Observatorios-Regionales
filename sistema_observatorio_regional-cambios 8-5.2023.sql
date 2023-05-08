-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2023 a las 00:58:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_observatorio_regional`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteDimension` (IN `id` INT)   BEGIN
DELETE FROM tb_obs_dimension WHERE tb_obs_dimension.dimension_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteIndicator` (`id` INT)   BEGIN
DELETE FROM tb_obs_indicator WHERE indicator_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteIndicatorDataCualitative` (`id` INT, `region_id` INT)   BEGIN
DELETE FROM tb_obs_indicator_data_cualitative WHERE indicator_id=id and indicator_region_id=region_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteIndicatorDataCuantitative` (`id` INT, `region_id` INT)   BEGIN
DELETE FROM tb_obs_indicator_data_Cuantitative WHERE indicator_id=id and indicator_region_id=region_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteIndicatorDetail` (`indicador_id` INT, `region_id` INT)   BEGIN
DELETE FROM tb_obs_indicator_detail WHERE detail_indicator_id=id and detail_region_id=region_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteIndicatorReference` (`id` INT, `region_id` INT, `reference_id` INT)   BEGIN
DELETE FROM tb_obs_indicator_reference 
WHERE indicator_id=id and indicator_reference_id= reference_id and indicator_region_id=region_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteListIndicatorDataCualitative` (`id` INT, `region_id` INT, `name` VARCHAR(45))   BEGIN
DELETE FROM tb_obs_list WHERE list_name=name and indicator_region_id=region_id and indicator_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteMeasurementUnit` (`id` INT)   BEGIN
DELETE FROM tb_obs_measurement_unit WHERE measurement_unit_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteReference` (`id` INT)   BEGIN
DELETE FROM tb_obs_reference WHERE reference_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteRegion` (`id` INT)   BEGIN
DELETE FROM tb_obs_region WHERE region_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteSubVariable` (`id` INT)   BEGIN
DELETE FROM tb_obs_sub_variable WHERE tb_obs_sub_variable.sub_variable_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteUser` (`id_user` INT)   BEGIN
  DELETE FROM users WHERE id = id_user ;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteVariable` (`id` INT)   BEGIN
DELETE FROM tb_obs_variable WHERE tb_obs_variable.variable_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteVariableType` (`id` INT)   BEGIN
DELETE FROM tb_obs_variable_type WHERE variable_type_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteYearIndicatorDataCuantitative` (`id` INT, `region_id` INT, `year` INT)   BEGIN
DELETE FROM tb_obs_year WHERE year_id=year and indicator_region_id=region_id and indicator_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllDimension` ()   BEGIN
	SELECT *  FROM tb_obs_dimension;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllIndicator` ()   BEGIN
SELECT * FROM tb_obs_indicator;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllIndicatorDataCualitative` ()   BEGIN
SELECT * FROM tb_obs_idicator_data_cualitative;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllIndicatorDataCuantitative` ()   BEGIN
SELECT * FROM tb_obs_idicator_data_Cuantitative;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllIndicatorDetail` ()   BEGIN
SELECT * FROM tb_obs_idicator_detail;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllIndicatorReferences` ()   BEGIN
SELECT * FROM tb_obs_indicator_reference;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllListIndicatorDataCualitative` ()   BEGIN
SELECT * FROM tb_obs_list;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllMeasurementUnit` ()   BEGIN
SELECT * FROM tb_obs_measurement_unit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllReferences` ()   BEGIN
SELECT * FROM tb_obs_reference;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllRegion` ()   BEGIN
SELECT * FROM tb_obs_region;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllSubVariables` ()   BEGIN
SELECT * FROM tb_obs_sub_variable;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllUsers` ()   BEGIN
  SELECT * FROM users;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllVariables` ()   BEGIN
SELECT * FROM tb_obs_variable;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllVariableType` ()   BEGIN
SELECT * FROM tb_obs_variable_type;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllYearIndicatorDataCuantitative` ()   BEGIN
SELECT * FROM tb_obs_year;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDimensionById` (`id` INT)   BEGIN
	SELECT *  FROM tb_obs_dimension WHERE tb_obs_dimension.dimension_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDimensionByName` (IN `d_name` VARCHAR(50))   BEGIN
	SELECT *  FROM tb_obs_dimension WHERE tb_obs_dimension.dimension_name = d_name;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getIndicatorbyId` (`id` INT)   BEGIN
SELECT * FROM tb_obs_indicator where indicator_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getIndicatorDataCualitativebyId` (`id` INT, `region_id` INT)   BEGIN
SELECT * FROM tb_obs_idicator_data_cualitative
where indicator_id=id and indicator_region_id=region_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getIndicatorDataCuantitativebyId` (`id` INT, `region_id` INT)   BEGIN
SELECT * FROM tb_obs_idicator_data_Cuantitative
where indicator_id=id and indicator_region_id=region_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getIndicatorDetailbyId` (`indicador_id` INT, `region_id` INT)   BEGIN
SELECT * FROM tb_obs_indicator_detail 
where tb_obs_indicator_detail.indicator_id=indicator_id and
   tb_obs_indicator_detail.region_id=region_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getIndicatorReferencebyId` (IN `id` INT)   BEGIN
SELECT * FROM tb_obs_indicator_reference where indicator_reference_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getListIndicatorDataCualitativebyName` (IN `name_param` VARCHAR(45), IN `id` INT, IN `region_id` INT)   BEGIN
SELECT * FROM tb_obs_list
where indicator_id=id and indicator_region_id=region_id and list_name=name_param;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getMeasurementUnitbyId` (`id` INT)   BEGIN
SELECT * FROM tb_obs_measurement_unit where measurement_unit_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getReferencebyId` (`id` INT)   BEGIN
SELECT * FROM tb_obs_reference where reference_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getRegionbyId` (`id` INT)   BEGIN
SELECT * FROM tb_obs_region where region_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSubVariablebyId` (`id` INT)   BEGIN
SELECT * FROM tb_obs_sub_variable where tb_obs_sub_variable.sub_variable_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getSubVariableByVariableId` (IN `variable_id_parameter` INT)   BEGIN
SELECT * FROM tb_obs_sub_variable
WHERE tb_obs_sub_variable.sub_variable_variable_id = variable_id_parameter;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVariableByDimensionId` (IN `dimension_id_parameter` INT)   BEGIN
SELECT * FROM tb_obs_variable
WHERE tb_obs_variable.variable_dimension_id = dimension_id_parameter;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVariablebyId` (`id` INT)   BEGIN
SELECT * FROM tb_obs_variable where tb_obs_variable.variable_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVariableBySubVariableVariableId` (`sub_variable_variable_id_par` INT)   BEGIN
	SELECT * FROM tb_obs_variable WHERE tb_obs_variable.variable_dimension_id IN (
    	SELECT variable_id FROM tb_obs_variable WHERE tb_obs_variable.variable_id = sub_variable_variable_id_par
	);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVariableTypebyId` (`id` INT)   BEGIN
SELECT * FROM tb_obs_variable_type where variable_type_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDimension` (IN `name_param` VARCHAR(50), IN `acronym` VARCHAR(5))   BEGIN
INSERT INTO tb_obs_dimension (dimension_name,dimension_acronym) values(name_param,acronym);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIndicator` (IN `name_param` VARCHAR(50), IN `sub_variable_id` INT, IN `type_id` INT, IN `code_param` INT(4))   BEGIN
INSERT INTO tb_obs_indicator (indicator_name,indicator_sub_variable_id,indicator_sub_variable_type,	indicator_code) 
VALUES (name_param,sub_variable_id,type_id,code_param);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIndicatorDataCualitative` (IN `desctiption` VARCHAR(100), IN `total` DECIMAL(10,2), IN `indicator_id` INT, IN `region_id` INT)   BEGIN
INSERT INTO tb_obs_indicator_data_cualitative (indicator_data_description,indicator_data_total,indicador_id,indicator_region_id) 
values (desctiption,total,indicator_id,region_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIndicatorDataCuantitative` (IN `description` VARCHAR(500), IN `indicador_id` INT, IN `region_id` INT)   BEGIN
INSERT INTO tb_obs_indicator_data_Cuantitative (indicator_data_description,indicator_id,indicator_region_id) 
values (description,indicador_id,region_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIndicatorDetail` (IN `indicator_id` INT, IN `region_id` INT)   BEGIN
INSERT INTO tb_obs_indicator_detail (detail_indicator_id,detail_region_id) 
values (indicator_id,region_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIndicatorReference` (IN `indicator_id` INT, IN `indicator_region_id` INT, IN `indicator_reference_id` INT)   BEGIN
INSERT INTO tb_obs_indicator_reference (indicator_id, indicator_region_id,indicator_reference_id) 
values (indicator_id,indicator_region_id,indicator_reference_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertListIndicatorDataCualitative` (IN `name_param` VARCHAR(45), IN `indicator_id` INT, IN `region_id` INT, IN `measurement_unit_id` INT)   BEGIN
INSERT INTO tb_obs_list (list_name,indicator_id,indicator_region_id,measurement_unit_id) 
values (name_param,indicator_id,region_id,measurement_unit_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertMeasurementUnit` (`name` VARCHAR(45))   BEGIN
INSERT INTO tb_obs_measurement_unit (measurerment_unit_description) values (name);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertReference` (IN `link` VARCHAR(200))   BEGIN
INSERT INTO tb_obs_reference (reference_link) 
values (link);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertRegion` (`name_param` VARCHAR(50), `acronym` VARCHAR(2))   BEGIN
INSERT INTO tb_obs_region (region_name,region_acronym) 
values (name_param,acronym);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertSubVariable` (IN `variable_id` INT, IN `name_param` VARCHAR(50), IN `code_param` INT(3))   BEGIN
INSERT INTO tb_obs_sub_variable (sub_variable_variable_id,sub_variable_name, sub_variable_code) 
values (variable_id,name_param,code_param);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertVariable` (IN `dimension` INT, IN `name_param` VARCHAR(50), IN `acronym` VARCHAR(2))   BEGIN
INSERT INTO tb_obs_variable (variable_dimension_id,variable_name,variable_acronym) 
values (dimension,name_param, acronym);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertVariableType` (`category` VARCHAR(50))   BEGIN
INSERT INTO tb_obs_variable_type (variable_type_category) 
values (category);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertYearIndicatorDataCuantitative` (IN `year_param` INT, IN `value_param` DECIMAL(10,2), IN `indicator_id` INT, IN `region_id` INT, IN `measurement_unit_id` INT)   BEGIN
INSERT INTO tb_obs_year (year_id,year_value,indicator_id,indicator_region_id,measurement_unit_id) 
values (year_param,value_param,indicator_id,region_id,measurement_unit_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectLastInsertId` ()   BEGIN
SELECT LAST_INSERT_ID();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateDimension` (IN `id` INT, IN `nombre` VARCHAR(50), IN `acronym` VARCHAR(2))   BEGIN
UPDATE  tb_obs_dimension SET tb_obs_dimension.dimension_name = nombre , tb_obs_dimension.dimension_acronym = acronym
WHERE tb_obs_dimension.dimension_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateIndicator` (IN `id` INT, IN `name_param` VARCHAR(50), IN `sub_variable` INT, IN `sub_variable_type` INT, IN `code_param` INT(4))   BEGIN
UPDATE tb_obs_indicator SET  indicator_name=name_param,indicator_sub_variable_id=sub_variable, indicator_sub_variable_type=sub_variable_type,indicator_code = code_param
WHERE indicator_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateIndicatorDataCualitative` (`desctiption` VARCHAR(100), `total` DECIMAL(10,2), `id` INT, `region_id` INT)   BEGIN
UPDATE tb_obs_indicator_data_cualitative SET  indicator_data_description=description, indicator_data_total=total
WHERE indicator_id=id and indicator_region_id=region_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateIndicatorDataCuantitative` (IN `desctiption` VARCHAR(500), IN `id` INT, IN `region_id` INT)   BEGIN
UPDATE tb_obs_indicator_data_Cuantitative SET  indicator_data_description=desctiption
WHERE indicator_id=id and indicator_region_id=region_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateIndicatorDetail` (IN `indicator_id` INT, IN `region_id` INT)   BEGIN
UPDATE tb_obs_indicator_detail SET  detail_region_id=region_id
WHERE detail_indicator_id=indicator_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateIndicatorReference` (`id` INT, `region_id` INT, `reference_id` INT)   BEGIN
UPDATE tb_obs_indicator_reference  SET  indicator_region_id=region_id, indicator_reference_id=reference_id 
WHERE indicator_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateListIndicatorDataCualitative` (IN `name_param` VARCHAR(45), IN `id` INT, IN `region_id` INT, IN `measurement_unit` INT)   BEGIN
UPDATE tb_obs_list SET  list_name=name_param, measurement_unit_id=measurement_unit
WHERE indicator_id=id and indicator_region_id=region_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateMeasurementUnit` (`id` INT, `name` VARCHAR(45))   BEGIN
UPDATE tb_obs_measurement_unit SET  measurement_unit_description=name
WHERE measurement_unit_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateReference` (IN `id` INT, IN `link` VARCHAR(200))   BEGIN
UPDATE tb_obs_reference SET  reference_link=link
WHERE reference_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateRegion` (`id` INT, `name_param` VARCHAR(50), `acronym` VARCHAR(2))   BEGIN
UPDATE tb_obs_region SET  region_id=name_param,region_acronym = acronym
WHERE region_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateSubVariable` (IN `id` INT, IN `variable_id` INT, IN `name_param` VARCHAR(50), IN `sub_variable_code` INT)   BEGIN
UPDATE tb_obs_sub_variable SET  tb_obs_sub_variable.sub_variable_variable_id=variable_id,
tb_obs_sub_variable.sub_variable_name=name_param,tb_obs_sub_variable.sub_variable_code = sub_variable_code
WHERE tb_obs_sub_variable.sub_variable_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateVariable` (IN `id` INT, IN `dimension` INT, IN `name_param` VARCHAR(50), IN `acronym` VARCHAR(2))   BEGIN
UPDATE tb_obs_variable SET  tb_obs_variable.variable_dimension_id=dimension,tb_obs_variable.variable_name=name_param, tb_obs_variable.variable_acronym = acronym
WHERE tb_obs_variable.variable_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateVariableType` (`id` INT, `category` VARCHAR(50))   BEGIN
UPDATE tb_obs_variable_type SET  variable_type_category=category
WHERE tb_obs_variable_type.variable_type_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateYearIndicatorDataCuantitative` (IN `year_param` INT, IN `value_param` DECIMAL(10,2), IN `id` INT, IN `region_id` INT, IN `measurement_unit` INT)   BEGIN
UPDATE tb_obs_year SET  year_id=year_param, year_value=value_param, measurement_unit_id=measurement_unit
WHERE indicator_id=id and indicator_region_id=region_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_dimension`
--

CREATE TABLE `tb_obs_dimension` (
  `dimension_id` int(11) NOT NULL,
  `dimension_name` varchar(50) NOT NULL,
  `dimension_acronym` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_obs_dimension`
--

INSERT INTO `tb_obs_dimension` (`dimension_id`, `dimension_name`, `dimension_acronym`) VALUES
(1, 'Ambiental', 'DA'),
(2, 'Social-Cultural', 'DS'),
(3, 'Economica-prueba', 'DE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_indicator`
--

CREATE TABLE `tb_obs_indicator` (
  `indicator_id` int(11) NOT NULL,
  `indicator_name` varchar(50) DEFAULT NULL,
  `indicator_sub_variable_id` int(11) NOT NULL,
  `indicator_sub_variable_type` int(11) NOT NULL,
  `indicator_code` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_obs_indicator`
--

INSERT INTO `tb_obs_indicator` (`indicator_id`, `indicator_name`, `indicator_sub_variable_id`, `indicator_sub_variable_type`, `indicator_code`) VALUES
(0, 'Pandas-actualizado', 3, 1, 1),
(12, 'Salario minimo neto por persona cada 500mts', 3, 1, 2),
(13, 'Salario minimo neto por persona cada 500mts', 3, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_indicator_data_cualitative`
--

CREATE TABLE `tb_obs_indicator_data_cualitative` (
  `indicator_data_description` varchar(500) DEFAULT 'Vacio',
  `indicador_id` int(11) NOT NULL,
  `indicator_region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_indicator_data_cuantitative`
--

CREATE TABLE `tb_obs_indicator_data_cuantitative` (
  `indicator_data_description` varchar(500) DEFAULT 'Vacio',
  `indicator_id` int(11) NOT NULL,
  `indicator_region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_obs_indicator_data_cuantitative`
--

INSERT INTO `tb_obs_indicator_data_cuantitative` (`indicator_data_description`, `indicator_id`, `indicator_region_id`) VALUES
('Salario minimo neto por persona cada 500mts', 13, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_indicator_detail`
--

CREATE TABLE `tb_obs_indicator_detail` (
  `detail_indicator_id` int(11) NOT NULL,
  `detail_region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_obs_indicator_detail`
--

INSERT INTO `tb_obs_indicator_detail` (`detail_indicator_id`, `detail_region_id`) VALUES
(13, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_indicator_reference`
--

CREATE TABLE `tb_obs_indicator_reference` (
  `indicator_id` int(11) NOT NULL,
  `indicator_region_id` int(11) NOT NULL,
  `indicator_reference_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_list`
--

CREATE TABLE `tb_obs_list` (
  `list_name` varchar(45) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `indicator_region_id` int(11) NOT NULL,
  `measurement_unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_log`
--

CREATE TABLE `tb_obs_log` (
  `user` varchar(45) DEFAULT NULL,
  `table_name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_measurement_unit`
--

CREATE TABLE `tb_obs_measurement_unit` (
  `measurement_unit_id` int(11) NOT NULL,
  `measurement_unit_description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_obs_measurement_unit`
--

INSERT INTO `tb_obs_measurement_unit` (`measurement_unit_id`, `measurement_unit_description`) VALUES
(1, 'Litros'),
(2, 'Kilos'),
(3, 'Metros'),
(4, 'Kilometros'),
(6, 'No aplica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_reference`
--

CREATE TABLE `tb_obs_reference` (
  `reference_id` int(11) NOT NULL,
  `reference_link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_obs_reference`
--

INSERT INTO `tb_obs_reference` (`reference_id`, `reference_link`) VALUES
(64, 'www.referencias.com'),
(65, 'www.ref1.com'),
(66, 'www.ref2.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_region`
--

CREATE TABLE `tb_obs_region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(50) DEFAULT NULL,
  `region_acronym` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_obs_region`
--

INSERT INTO `tb_obs_region` (`region_id`, `region_name`, `region_acronym`) VALUES
(1, 'Huetar Norte', 'HN'),
(2, 'Huetar Caribe', 'HC'),
(3, 'Chorotega', 'CH'),
(4, 'Brunca', 'BR'),
(5, 'Nacional', 'NA'),
(6, 'En revision', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_sub_variable`
--

CREATE TABLE `tb_obs_sub_variable` (
  `sub_variable_id` int(11) NOT NULL,
  `sub_variable_name` varchar(50) NOT NULL,
  `sub_variable_variable_id` int(11) NOT NULL,
  `sub_variable_code` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_obs_sub_variable`
--

INSERT INTO `tb_obs_sub_variable` (`sub_variable_id`, `sub_variable_name`, `sub_variable_variable_id`, `sub_variable_code`) VALUES
(1, 'Animales en peligro', 4, 1),
(2, 'Salario minimo', 3, 2),
(3, 'Salario maximo', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_variable`
--

CREATE TABLE `tb_obs_variable` (
  `variable_id` int(11) NOT NULL,
  `variable_name` varchar(50) DEFAULT NULL,
  `variable_acronym` varchar(2) NOT NULL,
  `variable_dimension_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_obs_variable`
--

INSERT INTO `tb_obs_variable` (`variable_id`, `variable_name`, `variable_acronym`, `variable_dimension_id`) VALUES
(1, 'Biodiversidad', 'VB', 1),
(2, 'BeGreat', 'VB', 2),
(3, 'Salarios', 'VS', 3),
(4, 'Fauna', 'VF', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_variable_type`
--

CREATE TABLE `tb_obs_variable_type` (
  `variable_type_id` int(11) NOT NULL,
  `variable_type_category` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_obs_variable_type`
--

INSERT INTO `tb_obs_variable_type` (`variable_type_id`, `variable_type_category`) VALUES
(1, 'Cuantitativo'),
(2, 'Cualitativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_year`
--

CREATE TABLE `tb_obs_year` (
  `year_id` int(11) NOT NULL,
  `year_value` decimal(10,2) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `indicator_region_id` int(11) NOT NULL,
  `measurement_unit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_obs_year`
--

INSERT INTO `tb_obs_year` (`year_id`, `year_value`, `indicator_id`, `indicator_region_id`, `measurement_unit_id`) VALUES
(0, 0.00, 13, 3, 6),
(1, 1.00, 13, 3, 6),
(2, 2.00, 13, 3, 6),
(3, 3.00, 13, 3, 6),
(4, 4.00, 13, 3, 6),
(5, 5.00, 13, 3, 6),
(6, 6.00, 13, 3, 6),
(7, 7.00, 13, 3, 6),
(8, 8.00, 13, 3, 6),
(9, 9.00, 13, 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `remember_token` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'yeilan', 'correo@correo.com', '$2y$10$zWaCPfDzBr4JxSpHJha/0uyCLongcPnnZhyKBEtQemgs8pl19Fgo.', NULL, '2023-03-16 23:55:13', '2023-03-16 23:55:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_obs_dimension`
--
ALTER TABLE `tb_obs_dimension`
  ADD PRIMARY KEY (`dimension_id`);

--
-- Indices de la tabla `tb_obs_indicator`
--
ALTER TABLE `tb_obs_indicator`
  ADD PRIMARY KEY (`indicator_id`),
  ADD KEY `fk_indicator_sub_variable_id` (`indicator_sub_variable_id`),
  ADD KEY `fk_indicator_variable_type` (`indicator_sub_variable_type`);

--
-- Indices de la tabla `tb_obs_indicator_data_cualitative`
--
ALTER TABLE `tb_obs_indicator_data_cualitative`
  ADD PRIMARY KEY (`indicador_id`,`indicator_region_id`);

--
-- Indices de la tabla `tb_obs_indicator_data_cuantitative`
--
ALTER TABLE `tb_obs_indicator_data_cuantitative`
  ADD PRIMARY KEY (`indicator_id`,`indicator_region_id`);

--
-- Indices de la tabla `tb_obs_indicator_detail`
--
ALTER TABLE `tb_obs_indicator_detail`
  ADD PRIMARY KEY (`detail_indicator_id`,`detail_region_id`),
  ADD KEY `fk_indicador_details_region` (`detail_region_id`);

--
-- Indices de la tabla `tb_obs_indicator_reference`
--
ALTER TABLE `tb_obs_indicator_reference`
  ADD PRIMARY KEY (`indicator_id`,`indicator_region_id`,`indicator_reference_id`),
  ADD KEY `fk_indicador_detail_has_reference_reference` (`indicator_reference_id`);

--
-- Indices de la tabla `tb_obs_list`
--
ALTER TABLE `tb_obs_list`
  ADD PRIMARY KEY (`list_name`,`indicator_id`,`indicator_region_id`),
  ADD KEY `fk_list_indicator_data_cualitative` (`indicator_id`,`indicator_region_id`),
  ADD KEY `fk_value_measurement_unit` (`measurement_unit_id`);

--
-- Indices de la tabla `tb_obs_log`
--
ALTER TABLE `tb_obs_log`
  ADD KEY `fk_tb_obs_log_users1_idx` (`user`);

--
-- Indices de la tabla `tb_obs_measurement_unit`
--
ALTER TABLE `tb_obs_measurement_unit`
  ADD PRIMARY KEY (`measurement_unit_id`);

--
-- Indices de la tabla `tb_obs_reference`
--
ALTER TABLE `tb_obs_reference`
  ADD PRIMARY KEY (`reference_id`);

--
-- Indices de la tabla `tb_obs_region`
--
ALTER TABLE `tb_obs_region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indices de la tabla `tb_obs_sub_variable`
--
ALTER TABLE `tb_obs_sub_variable`
  ADD PRIMARY KEY (`sub_variable_id`),
  ADD KEY `fk_sub_variable_variable_id` (`sub_variable_variable_id`);

--
-- Indices de la tabla `tb_obs_variable`
--
ALTER TABLE `tb_obs_variable`
  ADD PRIMARY KEY (`variable_id`),
  ADD KEY `fk_variable_dimension_id` (`variable_dimension_id`);

--
-- Indices de la tabla `tb_obs_variable_type`
--
ALTER TABLE `tb_obs_variable_type`
  ADD PRIMARY KEY (`variable_type_id`);

--
-- Indices de la tabla `tb_obs_year`
--
ALTER TABLE `tb_obs_year`
  ADD PRIMARY KEY (`year_id`,`indicator_id`,`indicator_region_id`),
  ADD KEY `fk_year_indicator_data_cuantitative` (`indicator_id`,`indicator_region_id`),
  ADD KEY `fk_year_measurement_unit` (`measurement_unit_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_obs_dimension`
--
ALTER TABLE `tb_obs_dimension`
  MODIFY `dimension_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_obs_indicator`
--
ALTER TABLE `tb_obs_indicator`
  MODIFY `indicator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tb_obs_measurement_unit`
--
ALTER TABLE `tb_obs_measurement_unit`
  MODIFY `measurement_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_obs_reference`
--
ALTER TABLE `tb_obs_reference`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `tb_obs_region`
--
ALTER TABLE `tb_obs_region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_obs_sub_variable`
--
ALTER TABLE `tb_obs_sub_variable`
  MODIFY `sub_variable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_obs_variable`
--
ALTER TABLE `tb_obs_variable`
  MODIFY `variable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_obs_variable_type`
--
ALTER TABLE `tb_obs_variable_type`
  MODIFY `variable_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_obs_indicator`
--
ALTER TABLE `tb_obs_indicator`
  ADD CONSTRAINT `fk_indicator_sub_variable_id` FOREIGN KEY (`indicator_sub_variable_id`) REFERENCES `tb_obs_sub_variable` (`sub_variable_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_indicator_variable_type` FOREIGN KEY (`indicator_sub_variable_type`) REFERENCES `tb_obs_variable_type` (`variable_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_obs_indicator_data_cualitative`
--
ALTER TABLE `tb_obs_indicator_data_cualitative`
  ADD CONSTRAINT `fk_indicator_data_cualitative_indicador_detail` FOREIGN KEY (`indicador_id`,`indicator_region_id`) REFERENCES `tb_obs_indicator_detail` (`detail_indicator_id`, `detail_region_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_obs_indicator_data_cualitative_ibfk_1` FOREIGN KEY (`indicador_id`) REFERENCES `tb_obs_indicator` (`indicator_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_obs_indicator_data_cuantitative`
--
ALTER TABLE `tb_obs_indicator_data_cuantitative`
  ADD CONSTRAINT `fk_indicator_data_cuantitative_indicador_details` FOREIGN KEY (`indicator_id`,`indicator_region_id`) REFERENCES `tb_obs_indicator_detail` (`detail_indicator_id`, `detail_region_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_obs_indicator_data_cuantitative_ibfk_1` FOREIGN KEY (`indicator_id`) REFERENCES `tb_obs_indicator` (`indicator_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_obs_indicator_detail`
--
ALTER TABLE `tb_obs_indicator_detail`
  ADD CONSTRAINT `fk_indicador_details_region` FOREIGN KEY (`detail_region_id`) REFERENCES `tb_obs_region` (`region_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_obs_indicator_detail_ibfk_1` FOREIGN KEY (`detail_indicator_id`) REFERENCES `tb_obs_indicator` (`indicator_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_obs_indicator_reference`
--
ALTER TABLE `tb_obs_indicator_reference`
  ADD CONSTRAINT `fk_indicador_detail_has_reference_reference` FOREIGN KEY (`indicator_reference_id`) REFERENCES `tb_obs_reference` (`reference_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_obs_indicator_reference_ibfk_1` FOREIGN KEY (`indicator_id`) REFERENCES `tb_obs_indicator` (`indicator_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_obs_list`
--
ALTER TABLE `tb_obs_list`
  ADD CONSTRAINT `fk_value_measurement_unit` FOREIGN KEY (`measurement_unit_id`) REFERENCES `tb_obs_measurement_unit` (`measurement_unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_obs_list_ibfk_1` FOREIGN KEY (`indicator_id`,`indicator_region_id`) REFERENCES `tb_obs_indicator_data_cualitative` (`indicador_id`, `indicator_region_id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tb_obs_log`
--
ALTER TABLE `tb_obs_log`
  ADD CONSTRAINT `fk_tb_obs_log_users1` FOREIGN KEY (`user`) REFERENCES `users` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_obs_sub_variable`
--
ALTER TABLE `tb_obs_sub_variable`
  ADD CONSTRAINT `fk_sub_variable_variable_id` FOREIGN KEY (`sub_variable_variable_id`) REFERENCES `tb_obs_variable` (`variable_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_obs_variable`
--
ALTER TABLE `tb_obs_variable`
  ADD CONSTRAINT `fk_variable_dimension_id` FOREIGN KEY (`variable_dimension_id`) REFERENCES `tb_obs_dimension` (`dimension_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tb_obs_year`
--
ALTER TABLE `tb_obs_year`
  ADD CONSTRAINT `fk_year_indicator_data_cuantitative` FOREIGN KEY (`indicator_id`,`indicator_region_id`) REFERENCES `tb_obs_indicator_data_cuantitative` (`indicator_id`, `indicator_region_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_year_measurement_unit` FOREIGN KEY (`measurement_unit_id`) REFERENCES `tb_obs_measurement_unit` (`measurement_unit_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
