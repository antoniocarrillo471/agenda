-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2020 a las 07:05:12
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_agenda`
--

CREATE TABLE `t_agenda` (
  `id_agenda` int(11) NOT NULL,
  `paterno` varchar(255) NOT NULL,
  `materno` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_agenda`
--

INSERT INTO `t_agenda` (`id_agenda`, `paterno`, `materno`, `nombre`, `telefono`, `email`, `id_categoria`) VALUES
(1, 'Papi', 'chulo', 'Jan', '5588978', 'vik@gmail.com', 2),
(2, 'Papi', 'chulo', 'Jan', '5588978', 'vik@gmail.com', 2),
(7, 'Papi', 'chulo', 'Jan', '5588978', 'vik@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_categoria`
--

CREATE TABLE `t_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombreC` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `t_categoria`
--

INSERT INTO `t_categoria` (`id_categoria`, `nombreC`, `descripcion`) VALUES
(1, 'HDPT', 'AJSDLKJAasa'),
(2, 'HFGS', 'adsad'),
(3, 'Misa', 'putoAM');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_agenda`
--
ALTER TABLE `t_agenda`
  ADD PRIMARY KEY (`id_agenda`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `t_categoria`
--
ALTER TABLE `t_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_agenda`
--
ALTER TABLE `t_agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `t_categoria`
--
ALTER TABLE `t_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_agenda`
--
ALTER TABLE `t_agenda`
  ADD CONSTRAINT `t_agenda_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `t_categoria` (`id_categoria`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
