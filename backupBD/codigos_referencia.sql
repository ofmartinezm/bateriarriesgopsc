-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-03-2019 a las 16:45:23
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
-- Estructura de tabla para la tabla `codigos_referencia`
--

CREATE TABLE `codigos_referencia` (
  `id` int(11) NOT NULL,
  `tipo_referencia` varchar(100) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='codigos de referencia';

--
-- Volcado de datos para la tabla `codigos_referencia`
--

INSERT INTO `codigos_referencia` (`id`, `tipo_referencia`, `codigo`, `descripcion`) VALUES
(1, 'sexo', 'M', 'Masculino'),
(2, 'sexo', 'F', 'Femenino'),
(3, 'estado_civil', 'SO', 'Soltero (a)'),
(4, 'estado_civil', 'CA', 'Casado (a)'),
(5, 'estado_civil', 'UL', 'Unión Libre'),
(6, 'estado_civil', 'SE', 'Separado (a)'),
(7, 'estado_civil', 'DI', 'Divorciado (a)'),
(8, 'estado_civil', 'VI', 'Viudo (a)'),
(9, 'estado_civil', 'SA', 'Sacerdote / Monja'),
(10, 'nivel_estudios', 'NI', 'Ninguno'),
(11, 'nivel_estudios', 'PI', 'Primaria incompleta'),
(12, 'nivel_estudios', 'PC', 'Primaria completa'),
(13, 'nivel_estudios', 'BI', 'Bachillerato in completo'),
(14, 'nivel_estudios', 'BC', 'Bachillerato completo'),
(15, 'nivel_estudios', 'TI', 'Técnico / tecnológico incompleto'),
(16, 'nivel_estudios', 'TC', 'Técnico / tecnológico completo'),
(17, 'nivel_estudios', 'PI', 'Profesional incompleto'),
(18, 'nivel_estudios', 'PC', 'Profesional completo'),
(19, 'nivel_estudios', 'CM', 'Carrera militar / policía'),
(20, 'nivel_estudios', 'PGI', 'Post-grado incompleto'),
(21, 'nivel_estudios', 'PGC', 'Post-grado completo'),
(22, 'lugar_residencia', 'CM', 'Ciudad / municipio'),
(23, 'lugar_residencia', 'DT', 'Departamento'),
(24, 'estrato', '1', '1'),
(25, 'estrato', '2', '2'),
(26, 'estrato', '3', '3'),
(27, 'estrato', '4', '4'),
(28, 'estrato', '5', '5'),
(29, 'estrato', '6', '6'),
(30, 'estrato', 'F', 'Finca'),
(31, 'estrato', 'N', 'No sé'),
(32, 'tipo_vivienda', 'P', 'Propia'),
(33, 'tipo_vivienda', 'A', 'En arriendo'),
(34, 'tipo_vivienda', 'F', 'Familiar'),
(35, 'lugar_trabajo', 'CM', 'Ciudad / municipio'),
(36, 'lugar_trabajo', 'DT', 'Departamento'),
(37, 'tiempo_trabajo', 'ME1', 'Si lleva menos de un año marque esta opción'),
(38, 'tiempo_trabajo', 'MA1', 'Si lleva más de un año, anote cuántos años'),
(39, 'tipo_cargo', 'J', 'Jefatura - ti ene personal a cargo'),
(40, 'tipo_cargo', 'P', 'Profesional, analista, técnico, tecnólogo'),
(41, 'tipo_cargo', 'A', 'Auxiliar, asistente administrativo, asistente técnico'),
(42, 'tipo_cargo', 'O', 'Operario, operador, ayudante, servicios generales'),
(43, 'tipo_contrato', 'TME1', 'Temporal de menos de 1 año'),
(44, 'tipo_contrato', 'TMA1', 'Temporal de 1 año o más'),
(45, 'tipo_contrato', 'TI', 'Término indefinido'),
(46, 'tipo_contrato', 'CO', 'Cooperado (cooperativa)'),
(47, 'tipo_contrato', 'PS', 'Prestación de servicios'),
(48, 'tipo_contrato', 'NS', 'No sé'),
(49, 'tipo_salario', 'FI', 'Fijo (diario, semanal, quincenal o mensual)'),
(50, 'tipo_salario', 'FV', 'Una parte fija y otra variable'),
(51, 'tipo_salario', 'TV', 'Todo variable (a destajo, por producción, por comisión)'),
(52, 'ocasion', 'SI', 'Siempre'),
(53, 'ocasion', 'CS', 'Casi Siempre'),
(54, 'ocasion', 'AV', 'Algunas Veces'),
(55, 'ocasion', 'CN', 'Casi Nunca'),
(56, 'ocasion', 'NU', 'Nunca'),
(57, 'afirmacion', 'S', 'SI'),
(58, 'afirmacion', 'N', 'No'),
(59, 'lugar_residencia', 'CM', 'Ciudad / municipio'),
(60, 'lugar_residencia', 'DT', 'Departamento'),
(61, 'texto_libre', 'TL', 'Texto Libre'),
(62, 'numero', 'NUMERO', 'Texto Numérico Libre'),
(63, 'fecha', 'DATE', 'Fecha MM/DD/AAAA'),
(64, 'tipo_documento', 'CC', 'Cedula Ciudadanía'),
(65, 'tipo_documento', 'CE', 'Cedula Extranjería'),
(66, 'tipo_documento', 'TI', 'Tarjeta Identidad'),
(67, 'tipo_documento', 'PA', 'Pasaporte'),
(68, 'tiempo_libre', 'OT', 'Otro trabajo'),
(69, 'tiempo_libre', 'LB', 'Labores domésticas'),
(70, 'tiempo_libre', 'RC', 'Recreación'),
(71, 'tiempo_libre', 'ES', 'Estudio'),
(72, 'tiempo_libre', 'NG', 'Ninguno'),
(73, 'frecuencia', 'SM', 'Semanal'),
(74, 'frecuencia', 'QN', 'Quincenal'),
(75, 'frecuencia', 'MS', 'Mensual'),
(76, 'frecuencia', 'OC', 'Ocasional'),
(77, 'actividad_salud', 'VC', 'Vacunación'),
(78, 'actividad_salud', 'SO', 'Salud oral'),
(79, 'actividad_salud', 'EL', 'Exámenes de laboratorio y otros'),
(80, 'actividad_salud', 'EM', 'Exámenes medicos anuales'),
(81, 'actividad_salud', 'NG', 'Ninguna'),
(82, 'temporal', 'M1', 'Si lleva menos de un año marque esta opción'),
(83, 'temporal', 'MN', 'Si lleva más de un año, anote cuántos años'),
(84, 'afirmacion_compuesta', 'S', 'SI'),
(85, 'afirmacion_compuesta', 'N', 'NO'),
(86, 'ocasion_compuesto', 'SI', 'Siempre'),
(87, 'ocasion_compuesto', 'CS', 'Casi Siempre'),
(88, 'ocasion_compuesto', 'AV', 'Algunas Veces'),
(89, 'ocasion_compuesto', 'CN', 'Casi Nunca'),
(90, 'ocasion_compuesto', 'NU', 'Nunca'),
(91, 'ocasion_compuesto', 'NA', 'No Aplica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `codigos_referencia`
--
ALTER TABLE `codigos_referencia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `codigos_referencia`
--
ALTER TABLE `codigos_referencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
