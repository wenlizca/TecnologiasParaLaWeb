-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2021 a las 23:35:57
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

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

CREATE TABLE `alumno` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `boleta` varchar(10) NOT NULL,
  `programa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `boleta`, `programa`) VALUES
(1, 'ALBERTO FLORES GARCIA', '2016670111', 'INGENIERIA MECATRONICA'),
(2, 'JOSE GONZALO LIZARDO GONZALEZ', '2016670112', 'SISTEMAS COMPUTACIONALES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constancia`
--

CREATE TABLE `constancia` (
  `id` int(11) NOT NULL,
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
  `alumno_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `constancia`
--

INSERT INTO `constancia` (`id`, `actividad`, `fecha_inicio`, `fecha_fin`, `horas`, `archivo`, `observaciones`, `valida`, `observaciones_encargado`, `creditos`, `denominacion_id`, `alumno_id`) VALUES
(1, 'Curso de Flutter', '2021-05-31', '2021-06-04', 20, 'constancia.pdf', 'Ninguna', -1, 'Ninguna', 0, 50, 1),
(2, 'Curso de react', '2021-05-03', '2021-05-07', 30, '', 'Ninguna', -1, 'Ninguna', 0, 50, 1),
(3, 'Curso de Angular', '2021-05-03', '2021-06-25', 40, 'costancia_2.pdf', 'Me podría validar la constancia', -1, NULL, 0, 50, 2),
(11, 'Kasandra Rivera Carrillo', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(17, 'Kasandra', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(18, 'Kasandra', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(19, 'Kasandra', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(20, 'Kasandra Rivera Carrillo', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(21, 'Kasandra Rivera Carrillo', '0000-00-00', '0000-00-00', 20, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(22, 'Kasandra', '0000-00-00', '0000-00-00', 500, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(23, 'Kasandra', '0000-00-00', '0000-00-00', 7, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(24, 'Curso de Android', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(25, 'Curso de Android', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(26, 'wennnnn', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(27, 'Kasandra', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(28, 'l', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(29, 'Curso de Android', '2021-06-01', '2021-06-02', 7, 'C:fakepathPractica04_Acondicionamiento de Señal e ', 's ', NULL, NULL, NULL, NULL, NULL),
(30, 'Kas', '2021-06-01', '2021-06-02', 7, 'C:fakepathPractica04_Acondicionamiento de Señal e ', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(31, 'Curso de Android', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL),
(32, 'JAAAA', '0000-00-00', '0000-00-00', 0, '', ' Ingrese las observaciones que considere necesarias ', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constancia_electiva`
--

CREATE TABLE `constancia_electiva` (
  `id` int(11) NOT NULL,
  `creditos` float DEFAULT NULL,
  `constancia_id` int(11) DEFAULT NULL,
  `electiva_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denominacion`
--

CREATE TABLE `denominacion` (
  `id` int(11) NOT NULL,
  `eje_tematico` varchar(50) NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `factor` int(11) NOT NULL,
  `ejemplos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `denominacion`
--

INSERT INTO `denominacion` (`id`, `eje_tematico`, `modalidad`, `descripcion`, `factor`, `ejemplos`) VALUES
(50, 'Inquietudes  vocacionales  propias ', 'Independientes', '1 crédito  por cada 20  horas', 20, 'Emprendedores: incubación de empresas\nTalleres\nCursos\nDiplomados\nClases\n'),
(69, 'DATOS ACTUALIZADO', 'En línea 1 ', '1 crédito por cada 50 horas ', 3, 'Talleres\nCursos\nDiplomados\nClases'),
(71, 'Inquietudes  vocacionales  propias', 'Docencia', '1 crédito  por cada 16  horas', 20, 'Talleres\nCursos\nDiplomados\nClases'),
(72, 'Inquietudes  vocacionales  propias', 'Docencia', '1 crédito  por cada 16  horas', 16, 'Simposio de Metalúrgica'),
(73, 'Sin eje temático', 'Sin modalidad', 'Sin descripción', 0, 'Ninguno'),
(74, '', 'Kasandra', '', 0, ''),
(75, 'Curso de Android', 'Curso de Android', 'una cada 30', 3, 'dsasd'),
(76, 'YAAA', '', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `electiva`
--

CREATE TABLE `electiva` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `creditos` float DEFAULT NULL,
  `creditos_acumulados` float DEFAULT NULL,
  `alumno_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `electiva`
--

INSERT INTO `electiva` (`id`, `nombre`, `creditos`, `creditos_acumulados`, `alumno_id`) VALUES
(1, 'ELECTIVA 1', 20, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `usuario` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `Name`, `usuario`, `pass`) VALUES
(1, 'admin', 'admin', '123abc'),
(2, 'ALBERTO FLORES GARCIA', '2016670111', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `constancia`
--
ALTER TABLE `constancia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `denominacion_id` (`denominacion_id`),
  ADD KEY `alumno_id` (`alumno_id`);

--
-- Indices de la tabla `constancia_electiva`
--
ALTER TABLE `constancia_electiva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constancia_id` (`constancia_id`),
  ADD KEY `electiva_id` (`electiva_id`);

--
-- Indices de la tabla `denominacion`
--
ALTER TABLE `denominacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `electiva`
--
ALTER TABLE `electiva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno_id` (`alumno_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `constancia`
--
ALTER TABLE `constancia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `constancia_electiva`
--
ALTER TABLE `constancia_electiva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `denominacion`
--
ALTER TABLE `denominacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `electiva`
--
ALTER TABLE `electiva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
