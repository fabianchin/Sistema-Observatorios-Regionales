-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 10:39 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_observatorio_regional`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteDimension` (`id` INT)  BEGIN
DELETE FROM tb_obs_dimension WHERE tb_obs_dimension.dimension_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteIndicator` (`id` INT)  BEGIN
DELETE FROM tb_obs_indicator WHERE tb_obs_indicator.indicator_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteVariable` (`id` INT)  BEGIN
DELETE FROM tb_obs_variable WHERE tb_obs_variable.variable_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllDimension` ()  BEGIN
	SELECT *  FROM tb_obs_dimension;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllIndicator` ()  BEGIN
	SELECT *  FROM tb_obs_indicator;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAllVariables` ()  BEGIN
SELECT * FROM tb_obs_variable;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDimensionById` (`id` INT)  BEGIN
	SELECT *  FROM tb_obs_dimension WHERE tb_obs_dimension.dimension_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getDimensionByName` (IN `d_name` VARCHAR(50))  BEGIN
	SELECT *  FROM tb_obs_dimension WHERE tb_obs_dimension.dimension_name = d_name;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getIndicatorById` (`id` INT)  BEGIN
	SELECT *  FROM tb_obs_indicator WHERE tb_obs_indicator.indicator_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getVariablebyId` (`id` INT)  BEGIN
SELECT * FROM tb_obs_variable where tb_obs_variable.variable_id=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertDimension` (`nombre` VARCHAR(50))  BEGIN
INSERT INTO tb_obs_dimension (dimension_name) values(nombre);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertIndicator` (`nombre` VARCHAR(50), `sub_variable_id` INT)  BEGIN
INSERT INTO tb_obs_indicator (indicator_name, indicator_sub_variable_id) values(nombre,sub_variable_id );
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertVariable` (`dimension` INT, `name` VARCHAR(50))  BEGIN
INSERT INTO tb_obs_variable (variable_dimension_id,variable_name) values (dimension,name);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateDimension` (`id` INT, `nombre` VARCHAR(50))  BEGIN
UPDATE  tb_obs_dimension SET tb_obs_dimension.dimension_name = nombre 
WHERE tb_obs_dimension.dimension_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateIndicator` (`id` INT, `nombre` VARCHAR(50), `sub_variable_id` INT)  BEGIN
UPDATE  tb_obs_indicator SET tb_obs_indicator.indicator_name = nombre ,
tb_obs_indicator.indicator_sub_variable_id = sub_variable_id
WHERE tb_obs_indicator.indicator_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateVariable` (`id` INT, `dimension` INT, `name` VARCHAR(50))  BEGIN
UPDATE tb_obs_variable SET  tb_obs_variable.variable_dimension_id=dimension,tb_obs_variable.variable_name=name
WHERE tb_obs_variable.variable_id=id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_dimension`
--

CREATE TABLE `tb_obs_dimension` (
  `dimension_id` int(11) NOT NULL,
  `dimension_name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'Dimension no definida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `tb_obs_dimension`
--

INSERT INTO `tb_obs_dimension` (`dimension_id`, `dimension_name`) VALUES
(1, 'Ambiental'),
(2, 'Economica'),
(6, 'Social-Cultural');

--
-- Triggers `tb_obs_dimension`
--
DELIMITER $$
CREATE TRIGGER `after_delete_dimension` AFTER DELETE ON `tb_obs_dimension` FOR EACH ROW INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_dimension',CONCAT('delete the dimention: ',old.dimension_name))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_dimension` AFTER INSERT ON `tb_obs_dimension` FOR EACH ROW INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_dimension',CONCAT('insert the dimention: ',NEW.dimension_name))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_dimension` AFTER UPDATE ON `tb_obs_dimension` FOR EACH ROW INSERT INTO tb_obs_log(user,table_name,description)
  values(user(),'tb_obs_dimension',CONCAT('update the dimention: ',old.dimension_name,' for ',new.dimension_name))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_indicator`
--

CREATE TABLE `tb_obs_indicator` (
  `indicator_id` int(11) NOT NULL,
  `indicator_sub_variable_id` int(11) NOT NULL,
  `indicator_name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'Indicador no definido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_indicator_data`
--

CREATE TABLE `tb_obs_indicator_data` (
  `indicator_data_indicator_id` int(11) NOT NULL,
  `indicator_data_year_id` int(11) DEFAULT NULL,
  `indicator_data_quantitative` decimal(10,0) NOT NULL DEFAULT -1,
  `indicator_data_qualitative` varchar(5000) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'No hay dato disponible',
  `indicator_data_qualitative_total` decimal(10,0) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_indicator_details`
--

CREATE TABLE `tb_obs_indicator_details` (
  `indicator_details_indicator_id` int(11) NOT NULL,
  `indicator_details_variable_type_id` int(11) NOT NULL,
  `indicator_details_region_id` int(11) NOT NULL,
  `indicator_details_detail` varchar(5000) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'No hay dato disponible',
  `indicator_details_state` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_indicator_reference`
--

CREATE TABLE `tb_obs_indicator_reference` (
  `indicator_reference_indicator_id` int(11) NOT NULL,
  `indicator_reference_reference_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_log`
--

CREATE TABLE `tb_obs_log` (
  `id` int(11) NOT NULL,
  `user` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `table_name` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `description` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `tb_obs_log`
--

INSERT INTO `tb_obs_log` (`id`, `user`, `table_name`, `description`, `date`) VALUES
(1, 'root@localhost', 'tb_obs_dimension', 'insert the dimention: Social-Ecomonica', '2022-11-08 17:41:56'),
(2, 'root@localhost', 'tb_obs_dimension', 'delete the dimention: Social-Ecomonica', '2022-11-08 20:00:17'),
(3, 'root@localhost', 'tb_obs_dimension', 'insert the dimention: Social-Economica', '2022-11-08 20:10:43'),
(4, 'root@localhost', 'tb_obs_dimension', 'delete the dimention: Social-Economica', '2022-11-08 20:10:59'),
(5, 'root@localhost', 'tb_obs_dimension', 'insert the dimention: Social-Economica', '2022-11-08 20:11:21'),
(6, 'root@localhost', 'tb_obs_dimension', 'delete the dimention: Social-Economica', '2022-11-08 20:13:46'),
(7, 'root@localhost', 'tb_obs_dimension', 'insert the dimention: Social-Economica', '2022-11-08 20:15:03'),
(8, 'root@localhost', 'tb_obs_dimension', 'delete the dimention: Social-Economica', '2022-11-08 20:21:43'),
(9, 'root@localhost', 'tb_obs_dimension', 'insert the dimention: dimension test', '2022-11-10 17:19:23'),
(10, 'root@localhost', 'tb_obs_dimension', 'insert the dimention: testitester', '2022-11-10 17:20:23'),
(11, 'root@localhost', 'tb_obs_dimension', 'delete the dimention: testitester', '2022-11-10 17:20:34'),
(12, 'root@localhost', 'tb_obs_dimension', 'delete the dimention: dimension test', '2022-11-10 17:20:37'),
(13, 'root@localhost', 'tb_obs_dimension', 'insert the dimention: Test', '2022-11-10 20:13:17'),
(14, 'root@localhost', 'tb_obs_dimension', 'insert the dimention: Test 2', '2022-11-10 20:14:21'),
(15, 'root@localhost', 'tb_obs_dimension', 'delete the dimention: Test 2', '2022-11-10 20:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_reference`
--

CREATE TABLE `tb_obs_reference` (
  `reference_id` int(11) NOT NULL,
  `reference_link` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'Link de referencia no definido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_region`
--

CREATE TABLE `tb_obs_region` (
  `region_id` int(11) NOT NULL,
  `region_name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'Region no definida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_sub_variable`
--

CREATE TABLE `tb_obs_sub_variable` (
  `sub_variable_id` int(11) NOT NULL,
  `sub_variable_variable_id` int(11) NOT NULL,
  `sub_variable_name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'Sub Variable no definida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_users`
--

CREATE TABLE `tb_obs_users` (
  `user` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `name` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telephone` varchar(8) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `method` varchar(20) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `tb_obs_users`
--

INSERT INTO `tb_obs_users` (`user`, `password`, `name`, `telephone`, `email`, `method`) VALUES
('admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Fabian', '3453453', 'asdjfasdf@gmail.com', 'MD5'),
('editor', 'ab41949825606da179db7c89ddcedcc167b64847', 'Luis', '77668877', 'castroluis@hotmail.com', 'SHA1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_variable`
--

CREATE TABLE `tb_obs_variable` (
  `variable_id` int(11) NOT NULL,
  `variable_dimension_id` int(11) NOT NULL,
  `variable_name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'No definido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_variable_type`
--

CREATE TABLE `tb_obs_variable_type` (
  `variable_type_id` int(11) NOT NULL,
  `variable_type_category` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT 'Tipo de variable no definido'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_obs_year`
--

CREATE TABLE `tb_obs_year` (
  `year_id` int(11) NOT NULL,
  `year_year` int(4) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_obs_dimension`
--
ALTER TABLE `tb_obs_dimension`
  ADD PRIMARY KEY (`dimension_id`);

--
-- Indexes for table `tb_obs_indicator`
--
ALTER TABLE `tb_obs_indicator`
  ADD PRIMARY KEY (`indicator_id`),
  ADD KEY `fk_indicator_sub_variable_id` (`indicator_sub_variable_id`);

--
-- Indexes for table `tb_obs_indicator_data`
--
ALTER TABLE `tb_obs_indicator_data`
  ADD KEY `fk_indicator_data_indicator_id` (`indicator_data_indicator_id`),
  ADD KEY `fk_indicator_data_year_id` (`indicator_data_year_id`);

--
-- Indexes for table `tb_obs_indicator_details`
--
ALTER TABLE `tb_obs_indicator_details`
  ADD KEY `fk_indicator_details_indicator_id` (`indicator_details_indicator_id`),
  ADD KEY `fk_indicator_details_variable_type_id` (`indicator_details_variable_type_id`),
  ADD KEY `fk_indicator_details_region_id` (`indicator_details_region_id`);

--
-- Indexes for table `tb_obs_indicator_reference`
--
ALTER TABLE `tb_obs_indicator_reference`
  ADD KEY `fk_indicator_reference_indicator_id` (`indicator_reference_indicator_id`),
  ADD KEY `fk_indicator_reference_reference_id` (`indicator_reference_reference_id`);

--
-- Indexes for table `tb_obs_log`
--
ALTER TABLE `tb_obs_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_obs_reference`
--
ALTER TABLE `tb_obs_reference`
  ADD PRIMARY KEY (`reference_id`);

--
-- Indexes for table `tb_obs_region`
--
ALTER TABLE `tb_obs_region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `tb_obs_sub_variable`
--
ALTER TABLE `tb_obs_sub_variable`
  ADD PRIMARY KEY (`sub_variable_id`),
  ADD KEY `fk_sub_variable_variable_id` (`sub_variable_variable_id`);

--
-- Indexes for table `tb_obs_users`
--
ALTER TABLE `tb_obs_users`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `tb_obs_variable`
--
ALTER TABLE `tb_obs_variable`
  ADD PRIMARY KEY (`variable_id`),
  ADD KEY `fk_variable_dimension_id` (`variable_dimension_id`);

--
-- Indexes for table `tb_obs_variable_type`
--
ALTER TABLE `tb_obs_variable_type`
  ADD PRIMARY KEY (`variable_type_id`);

--
-- Indexes for table `tb_obs_year`
--
ALTER TABLE `tb_obs_year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_obs_dimension`
--
ALTER TABLE `tb_obs_dimension`
  MODIFY `dimension_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_obs_indicator`
--
ALTER TABLE `tb_obs_indicator`
  MODIFY `indicator_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_obs_log`
--
ALTER TABLE `tb_obs_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_obs_reference`
--
ALTER TABLE `tb_obs_reference`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_obs_region`
--
ALTER TABLE `tb_obs_region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_obs_sub_variable`
--
ALTER TABLE `tb_obs_sub_variable`
  MODIFY `sub_variable_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_obs_variable`
--
ALTER TABLE `tb_obs_variable`
  MODIFY `variable_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_obs_variable_type`
--
ALTER TABLE `tb_obs_variable_type`
  MODIFY `variable_type_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_obs_year`
--
ALTER TABLE `tb_obs_year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_obs_indicator`
--
ALTER TABLE `tb_obs_indicator`
  ADD CONSTRAINT `fk_indicator_sub_variable_id` FOREIGN KEY (`indicator_sub_variable_id`) REFERENCES `tb_obs_sub_variable` (`sub_variable_id`);

--
-- Constraints for table `tb_obs_indicator_data`
--
ALTER TABLE `tb_obs_indicator_data`
  ADD CONSTRAINT `fk_indicator_data_indicator_id` FOREIGN KEY (`indicator_data_indicator_id`) REFERENCES `tb_obs_indicator` (`indicator_id`),
  ADD CONSTRAINT `fk_indicator_data_year_id` FOREIGN KEY (`indicator_data_year_id`) REFERENCES `tb_obs_year` (`year_id`);

--
-- Constraints for table `tb_obs_indicator_details`
--
ALTER TABLE `tb_obs_indicator_details`
  ADD CONSTRAINT `fk_indicator_details_indicator_id` FOREIGN KEY (`indicator_details_indicator_id`) REFERENCES `tb_obs_indicator` (`indicator_id`),
  ADD CONSTRAINT `fk_indicator_details_region_id` FOREIGN KEY (`indicator_details_region_id`) REFERENCES `tb_obs_region` (`region_id`),
  ADD CONSTRAINT `fk_indicator_details_variable_type_id` FOREIGN KEY (`indicator_details_variable_type_id`) REFERENCES `tb_obs_variable_type` (`variable_type_id`);

--
-- Constraints for table `tb_obs_indicator_reference`
--
ALTER TABLE `tb_obs_indicator_reference`
  ADD CONSTRAINT `fk_indicator_reference_indicator_id` FOREIGN KEY (`indicator_reference_indicator_id`) REFERENCES `tb_obs_indicator` (`indicator_id`),
  ADD CONSTRAINT `fk_indicator_reference_reference_id` FOREIGN KEY (`indicator_reference_reference_id`) REFERENCES `tb_obs_reference` (`reference_id`);

--
-- Constraints for table `tb_obs_sub_variable`
--
ALTER TABLE `tb_obs_sub_variable`
  ADD CONSTRAINT `fk_sub_variable_variable_id` FOREIGN KEY (`sub_variable_variable_id`) REFERENCES `tb_obs_variable` (`variable_id`);

--
-- Constraints for table `tb_obs_variable`
--
ALTER TABLE `tb_obs_variable`
  ADD CONSTRAINT `fk_variable_dimension_id` FOREIGN KEY (`variable_dimension_id`) REFERENCES `tb_obs_dimension` (`dimension_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
