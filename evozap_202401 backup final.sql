-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2024 at 06:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evozap_202401`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `MatricularParticipante` (IN `p_idParticipante` INT)   BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        DECLARE error_code INT;
        DECLARE error_message VARCHAR(255);
        ROLLBACK;
        GET DIAGNOSTICS CONDITION 1
            error_code = MYSQL_ERRNO, error_message = MESSAGE_TEXT;
        INSERT INTO errores (mensaje, fecha_registro) VALUES (CONCAT('Error al matricular al participante (Código: ', error_code, '): ', error_message), CURRENT_TIMESTAMP);
        SELECT 'error' AS status, 'Error al matricular al participante. Contacte al desarrollador.' AS message;
    END;

    START TRANSACTION;

    -- Inserción en la tabla matriculado
    INSERT INTO matriculado (id_registro_participante, fecha_matricula)
    VALUES (p_idParticipante, CURRENT_TIMESTAMP);

    -- Actualización en la tabla participante
    UPDATE participante
    SET estado_matricula = 'Matriculado'
    WHERE id = p_idParticipante;

    COMMIT;

    SELECT 'success' AS status, 'Participante Matriculado correctamente.' AS message;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `errores`
--

CREATE TABLE `errores` (
  `id` int(11) NOT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `errores`
--

INSERT INTO `errores` (`id`, `mensaje`, `fecha_registro`) VALUES
(5, 'Error al matricular al participante (Código: 1452): Cannot add or update a child row: a foreign key constraint fails (`evozap_202401`.`matriculado`, CONSTRAINT `matriculado_ibfk_1` FOREIGN KEY (`id_registro_participante`) REFERENCES `participante` (`id`))', '2024-01-16 17:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `matriculado`
--

CREATE TABLE `matriculado` (
  `id` int(11) NOT NULL,
  `id_registro_participante` int(11) NOT NULL,
  `fecha_matricula` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `matriculado`
--

INSERT INTO `matriculado` (`id`, `id_registro_participante`, `fecha_matricula`) VALUES
(43, 4, '2024-01-16 17:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `participante`
--

CREATE TABLE `participante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `tipo_documento` enum('C.C','C.E','PASAPORTE') NOT NULL,
  `celular` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `objetivos` varchar(100) NOT NULL,
  `tratamiento_psicologico` enum('SI','NO','N/A') NOT NULL,
  `detalle_tratamiento_psicologico` varchar(100) NOT NULL,
  `cedula_referenciado` varchar(15) DEFAULT NULL,
  `nombre_entrenamiento` varchar(20) NOT NULL,
  `fecha_inicio_entrenamiento` varchar(12) NOT NULL,
  `fecha_fin_entrenamineto` varchar(12) NOT NULL,
  `acepta_habeas_data` varchar(2) NOT NULL,
  `estado_matricula` varchar(12) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Dumping data for table `participante`
--

INSERT INTO `participante` (`id`, `nombre`, `cedula`, `tipo_documento`, `celular`, `correo`, `objetivos`, `tratamiento_psicologico`, `detalle_tratamiento_psicologico`, `cedula_referenciado`, `nombre_entrenamiento`, `fecha_inicio_entrenamiento`, `fecha_fin_entrenamineto`, `acepta_habeas_data`, `estado_matricula`, `fecha_registro`) VALUES
(4, 'editando', '1193135910', 'C.E', '3245868015', 'FINAL@HOTMAIL.COM', 'OBJETIVOS', 'SI', 'mentiras', '1193135910', 'PL59', '19/01/2024', '22/01/2024', 'on', 'Matriculado', '2024-01-15 17:24:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `errores`
--
ALTER TABLE `errores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matriculado`
--
ALTER TABLE `matriculado`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_registro_participante` (`id_registro_participante`);

--
-- Indexes for table `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `errores`
--
ALTER TABLE `errores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `matriculado`
--
ALTER TABLE `matriculado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `participante`
--
ALTER TABLE `participante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matriculado`
--
ALTER TABLE `matriculado`
  ADD CONSTRAINT `matriculado_ibfk_1` FOREIGN KEY (`id_registro_participante`) REFERENCES `participante` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

# Privileges for `user_insert`@`localhost`

GRANT SELECT, INSERT, UPDATE, EXECUTE ON *.* TO `user_insert`@`localhost` IDENTIFIED BY PASSWORD '*EF58F0487AB9EA9B5122D125E138EFDF2BC0EFBB';

GRANT INSERT ON `evozap\_202401`.* TO `user_insert`@`localhost`;


# Privileges for `user_registro`@`localhost`

GRANT SELECT, INSERT ON *.* TO `user_registro`@`localhost` IDENTIFIED BY PASSWORD '*FB3B1056E5162DE0B331F99650C5BA1E9262B19B';


# Privileges for `user_update`@`localhost`

GRANT UPDATE ON *.* TO `user_update`@`localhost` IDENTIFIED BY PASSWORD '*E906BE91E8D8D6319B5A448B7FDEF59056EC71B3';

GRANT SELECT (`id`), UPDATE ON `evozap_202401`.`participante` TO `user_update`@`localhost`;
