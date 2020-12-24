-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-12-2020 a las 02:03:07
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viajemos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id` int(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`id`, `nombre`, `apellido`) VALUES
(1, 'Nombre 1', 'Apellido 1'),
(2, 'Nombre 2', 'Apellido 2'),
(3, 'Nombre 3', 'Apellido 3'),
(4, 'Nombre 4', 'Apellido 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores_has_libros`
--

CREATE TABLE `autores_has_libros` (
  `id` int(11) NOT NULL,
  `autores_id` int(10) NOT NULL,
  `libros_ISBN` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `id` int(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `sede` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `editoriales`
--

INSERT INTO `editoriales` (`id`, `nombre`, `sede`) VALUES
(1, 'Editorial 1', 'Sede 1'),
(2, 'Editorial 2', 'Medellín'),
(3, 'Editorial 3', 'Medellín'),
(4, 'Editorial 4', 'Panamá'),
(5, 'Editorial 5', 'Cali'),
(6, 'Editorial 6', 'Medellín');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ISBN` int(13) NOT NULL,
  `editoriales_id` int(10) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `sinopsin` text NOT NULL,
  `n_paginas` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ISBN`, `editoriales_id`, `titulo`, `sinopsin`, `n_paginas`) VALUES
(1, 1, 'Título 1', 'Ejemplo de sinopsis', '10'),
(2, 1, 'Titulo 2', 'Sin sinopsis 2', '40'),
(3, 1, 'Titulo 3', 'Sin sinopsis 3', '50'),
(4, 1, 'Titulo 3', 'Prueba de sinopsis', '50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `autores_has_libros`
--
ALTER TABLE `autores_has_libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autores_id` (`autores_id`),
  ADD KEY `autores_id_2` (`autores_id`),
  ADD KEY `libros_ISBN` (`libros_ISBN`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `editoriales_id` (`editoriales_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `autores_has_libros`
--
ALTER TABLE `autores_has_libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `ISBN` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autores_has_libros`
--
ALTER TABLE `autores_has_libros`
  ADD CONSTRAINT `autores_has_libros_ibfk_1` FOREIGN KEY (`autores_id`) REFERENCES `autores` (`id`),
  ADD CONSTRAINT `autores_has_libros_ibfk_2` FOREIGN KEY (`libros_ISBN`) REFERENCES `libros` (`ISBN`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`editoriales_id`) REFERENCES `editoriales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
