-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 07-07-2021 a las 19:22:03
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `electivas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidoP` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `apellidoM` varchar(100) DEFAULT NULL,
  `boleta` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `programa` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `apellidoP`, `apellidoM`, `boleta`, `programa`) VALUES
(1, 'Alberto Flores García', 'Flores ', 'García', '2016670111', 'Ing. en Mecatronica'),
(2, 'José Gonzalo Lizardo Gonzales', 'Lizardo', 'Gonzales', '2016670112', 'Ing. en Sistemas Comp.'),
(6, 'Wendy Lizeth Carrillo Ceballos', 'Lizardo', 'Gonzales', NULL, 'Ing. en Alimentos'),
(8, 'Esmeralda Ortega Robles', 'Ortega', 'Robles', NULL, 'Ing. Ambiental'),
(9, 'Carlos Ortega Robles', 'Ortega', 'Robles', NULL, 'Ing. Metalurgica'),
(10, 'Kasandra Rivera Carrillo', 'Rivera', 'Carrillo', NULL, 'Ing. en Sistemas Comp.'),
(11, 'Alejandra De Haro Casas', 'De Haro', 'Casas', NULL, 'Ing. en Mecatronica'),
(12, 'Nohemi De Haro Casas', 'De Haro', 'Casas', NULL, 'Ing. en Alimentos'),
(14, 'Paul Alejandro Santana Guzmán', 'Santana ', 'Guzmán', NULL, 'Ing. en Mecatronica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constancia`
--

DROP TABLE IF EXISTS `constancia`;
CREATE TABLE IF NOT EXISTS `constancia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actividad` varchar(50) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `horas` float DEFAULT NULL,
  `archivo` varchar(50) NOT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `valida` tinyint(4) DEFAULT NULL,
  `observaciones_encargado` varchar(100) DEFAULT NULL,
  `creditos` float DEFAULT NULL,
  `denominacion_id` int(11) DEFAULT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `denominacion_id` (`denominacion_id`),
  KEY `alumno_id` (`alumno_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `constancia`
--

INSERT INTO `constancia` (`id`, `actividad`, `fecha_inicio`, `fecha_fin`, `horas`, `archivo`, `observaciones`, `valida`, `observaciones_encargado`, `creditos`, `denominacion_id`, `alumno_id`) VALUES
(1, 'Curso de Flutter', '2021-05-31', '2021-06-04', 20, 'constancia.pdf', 'Ninguna', -1, 'Ninguna', 0, 50, 1),
(2, 'Curso de react', '2021-05-03', '2021-05-07', 30, '', 'Ninguna', -1, 'Ninguna', 0, 50, 1),
(3, 'Curso de Angular', '2021-05-03', '2021-06-25', 40, 'costancia_2.pdf', 'Me podría validar la constancia', -1, NULL, 0, 50, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constancia_electiva`
--

DROP TABLE IF EXISTS `constancia_electiva`;
CREATE TABLE IF NOT EXISTS `constancia_electiva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creditos` float DEFAULT NULL,
  `constancia_id` int(11) DEFAULT NULL,
  `electiva_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `constancia_id` (`constancia_id`),
  KEY `electiva_id` (`electiva_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denominacion`
--

DROP TABLE IF EXISTS `denominacion`;
CREATE TABLE IF NOT EXISTS `denominacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eje_tematico` varchar(50) NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `factor` int(11) NOT NULL,
  `ejemplos` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `denominacion`
--

INSERT INTO `denominacion` (`id`, `eje_tematico`, `modalidad`, `descripcion`, `factor`, `ejemplos`) VALUES
(50, 'Inquietudes  vocacionales  propias ', 'Independientes', '1 crédito  por cada 20  horas', 20, 'Emprendedores: incubación de empresas\nTalleres\nCursos\nDiplomados\nClases\n'),
(69, 'DATOS ACTUALIZADO', 'En línea 1 ', '1 crédito por cada 50 horas ', 3, 'Talleres\nCursos\nDiplomados\nClases'),
(71, 'Inquietudes  vocacionales  propias', 'Docencia', '1 crédito  por cada 16  horas', 20, 'Talleres\nCursos\nDiplomados\nClases'),
(72, 'Inquietudes  vocacionales  propias', 'Docencia', '1 crédito  por cada 16  horas', 16, 'Simposio de Metalúrgica'),
(73, 'Sin eje temático', 'Sin modalidad', 'Sin descripción', 0, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electiva`
--

DROP TABLE IF EXISTS `electiva`;
CREATE TABLE IF NOT EXISTS `electiva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `creditos` float DEFAULT NULL,
  `creditos_acumulados` float DEFAULT NULL,
  `alumno_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_id` (`alumno_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `electiva`
--

INSERT INTO `electiva` (`id`, `nombre`, `creditos`, `creditos_acumulados`, `alumno_id`) VALUES
(1, 'ELECTIVA 1', 20, 0, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `constancia`
--
ALTER TABLE `constancia`
  ADD CONSTRAINT `constancia_ibfk_1` FOREIGN KEY (`denominacion_id`) REFERENCES `denominacion` (`id`),
  ADD CONSTRAINT `constancia_ibfk_2` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`);

--
-- Filtros para la tabla `constancia_electiva`
--
ALTER TABLE `constancia_electiva`
  ADD CONSTRAINT `constancia_electiva_ibfk_1` FOREIGN KEY (`constancia_id`) REFERENCES `constancia` (`id`),
  ADD CONSTRAINT `constancia_electiva_ibfk_2` FOREIGN KEY (`electiva_id`) REFERENCES `electiva` (`id`);

--
-- Filtros para la tabla `electiva`
--
ALTER TABLE `electiva`
  ADD CONSTRAINT `electiva_ibfk_1` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
