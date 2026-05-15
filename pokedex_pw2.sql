-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2026 a las 03:22:09
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
-- Base de datos: `pokedex_pw2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE DATABASE pokedex_pw2;
USE pokedex_pw2;

CREATE TABLE `administrador` (
  `usuario` varchar(40) DEFAULT NULL,
  `contrasenia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`usuario`, `contrasenia`) VALUES
('admin', '$2y$10$hLJlRrDPMCAnm45UORGZjOH9Q2GGnP7EgZvLQLv1Q4zUY/fFBtCwi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `numero_identificador` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  `datos_extras` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemon`
--

INSERT INTO `pokemon` (`id`, `numero_identificador`, `imagen`, `nombre`, `tipo`, `descripcion`, `datos_extras`) VALUES
(4, 1, 'imagenes/pokemon/pikachu.jpg', 'Pikachu', 'Electrico', 'Pokemon electrico', 'Rayo'),
(5, 2, 'imagenes/pokemon/bulbasaur.jpg', 'Bulbasaur', 'Acero', 'Pokemon bulbasaur', 'Super golpe'),
(6, 3, 'imagenes/pokemon/charizard.jpg', 'Charizard', 'Dragon,Fuego', 'Super Fuego', 'Rafaga de fuego'),
(7, 4, 'imagenes/pokemon/charmander.jpg', 'Charmander', 'Dragon,Fuego,Volador', 'Dragon Poderoso', 'Evoluciona mas adelante'),
(8, 5, 'imagenes/pokemon/squirtle.jpg', 'Squirtle', 'Agua,Bicho', 'Poder del agua', 'Agua');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
