-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2024 a las 17:36:14
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
-- Base de datos: `login`
--

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
  `estado` char(1) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`doc`, `name`, `contrasena`, `email`, `id_tip_user`, `estado`, `direccion`, `telefono`) VALUES
('', '', '$2y$10$7mHmr9lIsIhQ8Z27CH3qf.g/Wqmkr8MZ6iOpsHxBXZXT13kfCj0km', '', 1, '2', '', 0),
('1000795194', 'JUAN PABLO', '$2y$10$Y/IUKi1uFmBBuxY91O89X.wJZsYey8Vl07P5G3CHh8ilbrkR4FtvC', 'jdjdhdh@djdj.com.co', 2, '1', '', 0),
('1007384714', 'LEIDY', '$2y$10$fyzS6GFP4WCWY5qyl9wvBeySe9Mfd0nYi/7Sfg1KRvldQ5AANYfQu', 'leidy@houu.com', 1, '2', '', 0),
('123412341', 'Jorge Gutierrez', '12345678', 'dkjd@did.com', 3, '1', '', 0),
('65789123', 'Maria Lozano', '87654321', 'jdkdk@hd.com', 3, '1', '', 0),
('90909090', 'Sergio Ocampo', '12345678', 'ser@gmail.com', 3, '1', '', 0),
('93409436', 'Cesar Esquivel', '87654321', 'esquivel7809@gmail.com', 1, '2', '', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`doc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
