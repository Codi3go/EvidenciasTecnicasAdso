-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-04-2024 a las 04:06:52
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `club_angeles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(25) NOT NULL,
  `codigo_id_estudiante` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id_clase` int(25) NOT NULL,
  `costo` varchar(25) NOT NULL,
  `horario` varchar(25) NOT NULL,
  `categoria` varchar(25) NOT NULL,
  `id_asistencia` varchar(25) NOT NULL,
  `codigo_id_profesor` int(25) NOT NULL,
  `codigo_id_estudiante` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `codigo_id_estudiante` int(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `fecha_de_nacimiento` varchar(30) NOT NULL,
  `edad` int(2) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `fecha_de_ingreso` varchar(25) NOT NULL,
  `pago` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `id_inscripcion` varchar(25) NOT NULL,
  `codigo_id_estudiante` int(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `fecha_de_nacimiento` varchar(25) NOT NULL,
  `edad` int(2) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id_institucion` varchar(40) NOT NULL,
  `id_inscripcion` varchar(25) NOT NULL,
  `id_mensualidad` varchar(25) NOT NULL,
  `id_estudiante` int(25) NOT NULL,
  `id_profesor` int(25) NOT NULL,
  `id_clase` int(25) NOT NULL,
  `id_asistencia` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensualidad`
--

CREATE TABLE `mensualidad` (
  `id_mensualidad` varchar(25) NOT NULL,
  `pago` int(25) NOT NULL,
  `fecha_de_inicio` varchar(25) NOT NULL,
  `fecha_de_vencimiento` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `codigo_id_profesor` int(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `fecha_de_nacimiento` varchar(30) NOT NULL,
  `edad` int(2) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `titulo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD UNIQUE KEY `codigo_id_estudiante` (`codigo_id_estudiante`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id_clase`),
  ADD UNIQUE KEY `codigo_id_profesor` (`codigo_id_profesor`,`codigo_id_estudiante`),
  ADD UNIQUE KEY `id_asistencia` (`id_asistencia`),
  ADD KEY `codigo_id_estudiante` (`codigo_id_estudiante`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`codigo_id_estudiante`),
  ADD UNIQUE KEY `pago` (`pago`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD UNIQUE KEY `codigo_id_estudiante` (`codigo_id_estudiante`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id_institucion`),
  ADD UNIQUE KEY `inscripcion` (`id_inscripcion`),
  ADD UNIQUE KEY `mensualidad` (`id_mensualidad`),
  ADD UNIQUE KEY `estudiantes` (`id_estudiante`),
  ADD UNIQUE KEY `profesor` (`id_profesor`),
  ADD UNIQUE KEY `clase` (`id_clase`),
  ADD UNIQUE KEY `id_clase` (`id_clase`),
  ADD UNIQUE KEY `id_asistencia` (`id_asistencia`);

--
-- Indices de la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  ADD PRIMARY KEY (`id_mensualidad`),
  ADD UNIQUE KEY `pago` (`pago`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`codigo_id_profesor`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`codigo_id_estudiante`) REFERENCES `clase` (`codigo_id_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clase`
--
ALTER TABLE `clase`
  ADD CONSTRAINT `clase_ibfk_1` FOREIGN KEY (`codigo_id_profesor`) REFERENCES `profesor` (`codigo_id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clase_ibfk_2` FOREIGN KEY (`codigo_id_estudiante`) REFERENCES `estudiantes` (`codigo_id_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clase_ibfk_3` FOREIGN KEY (`id_clase`) REFERENCES `institucion` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`codigo_id_estudiante`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`id_inscripcion`) REFERENCES `institucion` (`id_inscripcion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensualidad`
--
ALTER TABLE `mensualidad`
  ADD CONSTRAINT `mensualidad_ibfk_1` FOREIGN KEY (`pago`) REFERENCES `estudiantes` (`pago`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensualidad_ibfk_2` FOREIGN KEY (`id_mensualidad`) REFERENCES `institucion` (`id_mensualidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`codigo_id_profesor`) REFERENCES `clase` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
