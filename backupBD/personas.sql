-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-03-2019 a las 16:30:08
-- Versión del servidor: 5.5.61-38.13-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `riesgops_bateria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre1` varchar(100) CHARACTER SET latin1 NOT NULL,
  `nombre2` varchar(100) CHARACTER SET latin1 NOT NULL,
  `apellido1` varchar(100) CHARACTER SET latin1 NOT NULL,
  `tipo_documento` varchar(100) CHARACTER SET latin1 NOT NULL,
  `numero_documento` bigint(20) NOT NULL,
  `mail` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_exp_documento` date NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion_residencia` varchar(500) CHARACTER SET latin1 NOT NULL,
  `telefono_celular` bigint(20) NOT NULL,
  `telefono_fijo` int(11) NOT NULL,
  `apellido2` varchar(100) CHARACTER SET latin1 NOT NULL,
  `codigo_empresa` int(11) NOT NULL,
  `tipo_formulario` enum('','A','B') COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre1`, `nombre2`, `apellido1`, `tipo_documento`, `numero_documento`, `mail`, `fecha_exp_documento`, `fecha_nacimiento`, `direccion_residencia`, `telefono_celular`, `telefono_fijo`, `apellido2`, `codigo_empresa`, `tipo_formulario`) VALUES
(1, 'HECTOR', 'ORLANDO', 'PIRACHICAN', 'CC', 80099747, '', '2001-09-06', '1983-09-05', 'CALLE 123', 3007231819, 0, 'CARDOZO', 860067546, 'A'),
(2, 'DANIEL', 'HUMBERTO', 'MEDINA', 'CC', 79576331, '', '1990-09-28', '1972-05-02', 'Carrera 20 # 187-40', 3208351083, 7576635, 'CASTELLANOS', 860067546, 'A'),
(3, 'HENRY', 'HUMBERTO', 'MEDINA', 'CC', 6750942, '', '1971-08-12', '1950-06-19', 'calle 6  5-09', 3108033637, 0, 'VACA', 860067546, 'A'),
(4, 'LUCILA', 'ESTHER', 'CASTELLANOS', 'CC', 23270586, '', '1972-06-21', '1951-01-22', 'calle 6 5-09', 3103215734, 3004151, 'DE MEDINA', 860067546, 'A'),
(5, 'CLARA', 'ISABEL', 'QUINTERO', 'CC', 24138126, '', '1979-03-16', '1957-12-15', '', 0, 0, 'QUINTERO', 860067546, 'A'),
(6, 'CLAUDIA', 'JULIETH', 'MEDINA', 'CC', 1032439687, '', '1990-09-25', '2008-10-30', '', 0, 0, 'CASTELBLANCO', 860067546, 'A'),
(7, 'OMAR ', 'ALDEMAR', 'MARTÍNEZ', 'CC', 80491103, '', '1971-09-12', '1991-06-04', '', 0, 0, 'VELANDIA', 860067546, 'B'),
(8, 'FABIO ', 'ALBERTO', 'VARGAS', 'CC', 74363372, '', '2004-05-07', '1985-08-19', '', 0, 0, 'NIÑO', 860067546, 'B'),
(9, 'JAVIER', 'OSWALDO', 'BARRERA', 'CC', 7220818, '', '1983-05-10', '1964-12-17', '', 0, 0, 'SASTOQUE', 860067546, 'B'),
(11, 'CLAUDIA', '', 'MEDINA', 'CC', 1032439687, '', '0000-00-00', '0000-00-00', 'Cra 66 a #12-65', 3004151, 0, '', 860067546, ''),
(12, 'NIDIA', 'ANDREA', 'MARTINEZ', 'CC', 53016161, 'andreapcw@yahoo.es', '2019-01-01', '0000-00-00', 'Calle 131c #88b-24, Casa 90', 3114728032, 0, '', 830098146, 'B'),
(13, 'OSCAR', 'FERNANDO', 'MARTINEZ', 'CC', 80067683, 'oscar.masmela@gmail.com', '2019-01-01', '1976-08-23', '', 0, 0, '', 830098146, 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
