-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2024 a las 17:28:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd`
--
CREATE DATABASE IF NOT EXISTS `bd` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asig_transv`
--

CREATE TABLE `asig_transv` (
  `id_asig` int(11) NOT NULL,
  `doc_trans` int(11) NOT NULL,
  `id_transv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asig_transv`
--

INSERT INTO `asig_transv` (`id_asig`, `doc_trans`, `id_transv`) VALUES
(1, 65789123, 2),
(2, 90909090, 2),
(3, 123412341, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(3) NOT NULL,
  `ciudad` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `ciudad`) VALUES
(1, 'Ibague'),
(2, 'Bogota'),
(3, 'Medllin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencia`
--

CREATE TABLE `competencia` (
  `id_compe` int(11) NOT NULL,
  `competencia` varchar(100) NOT NULL,
  `id_transv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `competencia`
--

INSERT INTO `competencia` (`id_compe`, `competencia`, `id_transv`) VALUES
(1, 'Interactuar en Lengua Inglesa', 2),
(2, 'Razonar cuantitativamente', 1),
(3, 'Aplicacion Ciencias Naturales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `ficha` int(6) NOT NULL,
  `id_transversal` int(11) NOT NULL,
  `doc` int(11) NOT NULL,
  `id_compet` int(11) NOT NULL,
  `id_hora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(3) NOT NULL,
  `genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_use`
--

CREATE TABLE `tip_use` (
  `id_tip_use` int(11) NOT NULL,
  `tip_use` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tip_use`
--

INSERT INTO `tip_use` (`id_tip_use`, `tip_use`) VALUES
(1, 'Administrador'),
(3, 'Instructor Transversal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transversal`
--

CREATE TABLE `transversal` (
  `id_transv` int(11) NOT NULL,
  `transversal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transversal`
--

INSERT INTO `transversal` (`id_transv`, `transversal`) VALUES
(1, 'Matematicas'),
(2, 'Ingles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `doc` varchar(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `contrasena` varchar(600) NOT NULL,
  `email` varchar(40) NOT NULL,
  `id_tip_user` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `id_genero` int(3) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`doc`, `name`, `contrasena`, `email`, `id_tip_user`, `id_ciudad`, `id_genero`, `estado`) VALUES
('', '', '$2y$10$7mHmr9lIsIhQ8Z27CH3qf.g/Wqmkr8MZ6iOpsHxBXZXT13kfCj0km', '', 1, 0, 0, '2'),
('1000795194', 'JUAN PABLO', '$2y$10$Y/IUKi1uFmBBuxY91O89X.wJZsYey8Vl07P5G3CHh8ilbrkR4FtvC', 'jdjdhdh@djdj.com.co', 2, 0, 0, '1'),
('1007384714', 'LEIDY', '$2y$10$fyzS6GFP4WCWY5qyl9wvBeySe9Mfd0nYi/7Sfg1KRvldQ5AANYfQu', 'leidy@houu.com', 1, 0, 0, '2'),
('123412341', 'Jorge Gutierrez', '12345678', 'dkjd@did.com', 3, 0, 0, '1'),
('65789123', 'Maria Lozano', '87654321', 'jdkdk@hd.com', 3, 0, 0, '1'),
('90909090', 'Sergio Ocampo', '12345678', 'ser@gmail.com', 3, 0, 0, '1'),
('93409436', 'Cesar Esquivel', '87654321', 'esquivel7809@gmail.com', 1, 0, 0, '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asig_transv`
--
ALTER TABLE `asig_transv`
  ADD PRIMARY KEY (`id_asig`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `competencia`
--
ALTER TABLE `competencia`
  ADD PRIMARY KEY (`id_compe`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`ficha`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `tip_use`
--
ALTER TABLE `tip_use`
  ADD PRIMARY KEY (`id_tip_use`);

--
-- Indices de la tabla `transversal`
--
ALTER TABLE `transversal`
  ADD PRIMARY KEY (`id_transv`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`doc`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asig_transv`
--
ALTER TABLE `asig_transv`
  MODIFY `id_asig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `competencia`
--
ALTER TABLE `competencia`
  MODIFY `id_compe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tip_use`
--
ALTER TABLE `tip_use`
  MODIFY `id_tip_use` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `transversal`
--
ALTER TABLE `transversal`
  MODIFY `id_transv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
