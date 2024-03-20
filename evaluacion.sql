-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2024 a las 17:30:35
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
-- Base de datos: `evaluacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `id_auto` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(80) NOT NULL,
  `año` date NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id_auto`, `marca`, `modelo`, `año`, `tipo`) VALUES
(254789, 'Chevrolet', 'tracker', '2024-03-03', 'SUV'),
(434434, 'Ford', 'nose', '2023-11-01', 'camioneta'),
(546584, 'Chevrolet', 'spark', '2014-12-29', 'Sedán'),
(2549546, 'Ford', 'Ranger', '2021-05-20', 'SUV'),
(4344343, 'Honda', '4434', '2024-04-01', 'SUV'),
(56666666, 'Chevrolet', 'spark', '2024-03-20', 'Sedán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(12) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `correo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `correo`) VALUES
(1016007855, 'ANDREA ', 'SILVA', 'ajsilva55@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` int(11) NOT NULL,
  `id_cliente` int(12) NOT NULL,
  `id_auto` int(11) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `km_inicial` float NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `id_cliente`, `id_auto`, `destino`, `km_inicial`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 1016007855, 2549546, 'Bogota', 25000, '2024-03-20', '2024-03-27'),
(2, 1016007855, 2549546, 'IBAGUE', 2222, '2024-03-21', '2024-03-24'),
(3, 1016007855, 254789, 'manizales', 25000, '2024-03-20', '2024-03-27'),
(4, 1016007855, 2549546, 'Huila', 25000, '2024-03-05', '2024-03-28'),
(5, 1016007855, 546584, 'boyaca', 3200, '2024-03-12', '2024-04-04'),
(6, 1016007855, 56666666, 'santa catalina', 5100, '2024-04-05', '2024-02-27'),
(7, 1016007855, 4344343, 'tunja', 41000, '2024-03-21', '2024-03-31'),
(8, 1016007855, 546584, 'rovira', 5132, '2024-03-05', '2024-03-29'),
(9, 1016007855, 254789, 'Neiva', 11000, '2024-02-25', '2024-02-27'),
(10, 1016007855, 254789, 'bucaramanga', 50000, '2024-03-20', '2024-03-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_auto`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `fk_prestamos_cliente` (`id_cliente`),
  ADD KEY `fk_prestamos_auto` (`id_auto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56666667;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1016007856;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_prestamos_auto` FOREIGN KEY (`id_auto`) REFERENCES `autos` (`id_auto`),
  ADD CONSTRAINT `fk_prestamos_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
