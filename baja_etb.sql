-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2023 a las 15:45:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `baja_etb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anexos`
--

CREATE TABLE `anexos` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `tipoAnexo_id` int(11) NOT NULL,
  `bajas_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajas`
--

CREATE TABLE `bajas` (
  `id` varchar(11) NOT NULL,
  `asunto` varchar(250) DEFAULT NULL,
  `type_elem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bajas_has_usuarios`
--

CREATE TABLE `bajas_has_usuarios` (
  `bajas_id` varchar(11) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos`
--

CREATE TABLE `elementos` (
  `id` int(11) NOT NULL,
  `element` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `bajas_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'Para'),
(2, 'De'),
(3, 'Elaborado'),
(4, 'Revisado'),
(5, 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoanexo`
--

CREATE TABLE `tipoanexo` (
  `id` int(11) NOT NULL,
  `anexos` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoanexo`
--

INSERT INTO `tipoanexo` (`id`, `anexos`) VALUES
(1, 'Memorando Vicepresidencia'),
(2, 'Memorando Contabilidad'),
(3, 'Formato solicitud de baja de activos'),
(4, 'Registro fotográfico'),
(5, 'Concepto técnico de baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `etb` varchar(20) DEFAULT NULL,
  `profesional` varchar(30) DEFAULT NULL,
  `campo` varchar(50) DEFAULT NULL,
  `equipo` varchar(45) DEFAULT NULL,
  `firma` varchar(200) DEFAULT NULL,
  `alcance` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `etb`, `profesional`, `campo`, `equipo`, `firma`, `alcance`, `estado`) VALUES
(1, 'ARMANDO LÓPEZ CHAVARRÍO', '24641', 'Profesional especializado II', 'Vicepresidencia de Tecnología', 'Equipo de Acceso y Facilities', '../assets/image/signa/armando_lopez_chavarrio.png', 2, 1),
(2, 'GENARO LOZANO CARRILLO', '24953', 'Profesional III', 'Vicepresidencia de Tecnología', 'Equipo de Acceso y Facilities', '0', 2, 1),
(3, 'JUAN MANUEL GUTIÉRREZ APONTE', '22163', 'Profesional I', 'Vicepresidencia de Tecnología', 'Equipo de Acceso y Facilities', '../assets/image/signa/juan_manuel_gutierrez.jpg', 2, 1),
(4, 'CÉSAR AUGUSTO QUINTERO GIRALDO', NULL, 'Gerente', 'Vicepresidencia de Tecnología', 'Gerencia Planta Externa', '0', 3, 1),
(5, 'EFRAÍN MARTÍNEZ MONROY', NULL, NULL, 'Vicepresidencia de Tecnología', '0', '0', 3, 1),
(6, 'ALBA MARINA ROMERO MENDOZA', NULL, NULL, 'Gerencia Contabilidad e Impuestos', '0', '0', 3, 1),
(7, 'GUILLERMO ANTONIO JIMÉNEZ CAMELO', '23529', NULL, NULL, 'Equipo de Acceso y Facilities', '0', 4, 1),
(8, 'JOSÉ FERNEY MEJÍA GARNICA', '26423', NULL, NULL, 'Equipo de Acceso y Facilities', '0', 4, 1),
(9, 'CAMILO TORRES NÚÑEZ', '37895', NULL, NULL, 'Equipo de Acceso y Facilities', '0', 4, 1),
(10, 'ELVIS HERNANDO BARAHONA ALVARADO', '12328', NULL, NULL, 'Equipo de Acceso y Facilities', '0', 4, 1),
(11, 'ESTEBAN GARCÍA HERRERA', '19611', 'Líder', 'Vicepresidencia de Tecnología', 'Gerencia Planta Externa', '../assets/image/signa/esteban_garcia_herrera.png', 2, 1),
(12, 'MAURICIO CAÑÓN GUERRERO', '14806', NULL, NULL, 'Equipo de Acceso y Facilities', '0', 4, 1),
(13, 'JORGE PINTO GALEANO', '30980', NULL, NULL, 'Equipo de Acceso y Facilities', '../assets/image/signa/jorge_pinto_galeano.png\n', 2, 1),
(14, 'OSCAR FRANCISCO GARCÍA FORERO', '19795', NULL, NULL, 'Equipo de Acceso y Facilities', '0', 4, 1),
(15, 'BAIRO RAMÓN MALDONADO RODRÍGUEZ', '25248', NULL, NULL, 'Equipo de Acceso y Facilities', '0', 4, 1),
(16, 'SERGIO ANDRES CASTELLANOS CORZO', '15618', 'Profesional I', 'Vicepresidencia de Tecnología', 'Equipo de Acceso y Facilities', '../assets/image/signa/sergio_andres_castellanos_corzo.jpg', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bajas_id` (`bajas_id`);

--
-- Indices de la tabla `bajas`
--
ALTER TABLE `bajas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bajas_has_usuarios`
--
ALTER TABLE `bajas_has_usuarios`
  ADD KEY `bajas_id` (`bajas_id`),
  ADD KEY `usuarios_id` (`usuarios_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bajas_id` (`bajas_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipoanexo`
--
ALTER TABLE `tipoanexo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anexos`
--
ALTER TABLE `anexos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `elementos`
--
ALTER TABLE `elementos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoanexo`
--
ALTER TABLE `tipoanexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anexos`
--
ALTER TABLE `anexos`
  ADD CONSTRAINT `anexos_ibfk_1` FOREIGN KEY (`bajas_id`) REFERENCES `bajas` (`id`);

--
-- Filtros para la tabla `bajas_has_usuarios`
--
ALTER TABLE `bajas_has_usuarios`
  ADD CONSTRAINT `bajas_has_usuarios_ibfk_1` FOREIGN KEY (`bajas_id`) REFERENCES `bajas` (`id`),
  ADD CONSTRAINT `bajas_has_usuarios_ibfk_2` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `bajas_has_usuarios_ibfk_3` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`);

--
-- Filtros para la tabla `elementos`
--
ALTER TABLE `elementos`
  ADD CONSTRAINT `elementos_ibfk_1` FOREIGN KEY (`bajas_id`) REFERENCES `bajas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
