-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 03:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `asig_transv`
--

CREATE TABLE `asig_transv` (
  `id_asig` int(11) NOT NULL,
  `doc_trans` int(11) NOT NULL,
  `id_transv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asig_transv`
--

INSERT INTO `asig_transv` (`id_asig`, `doc_trans`, `id_transv`) VALUES
(1, 65789123, 2),
(2, 90909090, 2),
(3, 123412341, 1);

-- --------------------------------------------------------

--
-- Table structure for table `competencia`
--

CREATE TABLE `competencia` (
  `id_compe` int(11) NOT NULL,
  `competencia` varchar(100) NOT NULL,
  `id_transv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `competencia`
--

INSERT INTO `competencia` (`id_compe`, `competencia`, `id_transv`) VALUES
(1, 'Interactuar en Lengua Inglesa', 2),
(2, 'Razonar cuantitativamente', 1),
(3, 'Aplicacion Ciencias Naturales', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fichas`
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
-- Table structure for table `tip_use`
--

CREATE TABLE `tip_use` (
  `id_tip_use` int(11) NOT NULL,
  `tip_use` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tip_use`
--

INSERT INTO `tip_use` (`id_tip_use`, `tip_use`) VALUES
(1, 'Administrador'),
(3, 'Instructor Transversal');

-- --------------------------------------------------------

--
-- Table structure for table `transversal`
--

CREATE TABLE `transversal` (
  `id_transv` int(11) NOT NULL,
  `transversal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transversal`
--

INSERT INTO `transversal` (`id_transv`, `transversal`) VALUES
(1, 'Matematicas'),
(2, 'Ingles');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `doc` varchar(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `edad` int(11) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `contrasena` varchar(600) NOT NULL,
  `email` varchar(40) NOT NULL,
  `id_tip_user` int(11) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`doc`, `name`, `edad`, `apellidos`, `contrasena`, `email`, `id_tip_user`, `estado`) VALUES
('1107975321', 'DIEGO ALEXANDER', 18, 'betancourt ortega', '12', 'sena@sena.com', 1, '2'),
('1107975322', 'CRISTIAN JULIAN', 12, 'figueroa armero', '12', 'armero@sena.com', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asig_transv`
--
ALTER TABLE `asig_transv`
  ADD PRIMARY KEY (`id_asig`);

--
-- Indexes for table `competencia`
--
ALTER TABLE `competencia`
  ADD PRIMARY KEY (`id_compe`);

--
-- Indexes for table `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`ficha`);

--
-- Indexes for table `tip_use`
--
ALTER TABLE `tip_use`
  ADD PRIMARY KEY (`id_tip_use`);

--
-- Indexes for table `transversal`
--
ALTER TABLE `transversal`
  ADD PRIMARY KEY (`id_transv`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`doc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asig_transv`
--
ALTER TABLE `asig_transv`
  MODIFY `id_asig` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `competencia`
--
ALTER TABLE `competencia`
  MODIFY `id_compe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tip_use`
--
ALTER TABLE `tip_use`
  MODIFY `id_tip_use` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transversal`
--
ALTER TABLE `transversal`
  MODIFY `id_transv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
