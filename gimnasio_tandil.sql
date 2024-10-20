-- phpMyAdmin SQL Dump

-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2024 a las 22:28:24
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
-- Base de datos: `gimnasio_tandil`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
<<<<<<< HEAD
  `id_Activity` int(11) NOT NULL,
  `name_activity` varchar(50) NOT NULL,
  `duration` int(20) NOT NULL,
  `capacity_max` int(20) NOT NULL,
  `id_Trainer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `actividades`
--

<<<<<<< HEAD
INSERT INTO `actividades` (`id_Activity`, `name_activity`, `duration`, `capacity_max`, `id_Trainer`) VALUES
(27, 'Basquetball', 120, 30, 5),
(29, 'Softball', 54, 32, 5),
(30, 'Natacion', 75, 15, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_Admin` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_Admin`, `name`, `password`) VALUES
(1, 'webadmin', '$2y$10$KFq.V9Xn5aJkPMjwT0XI9.J5b9vPZWEXPezWXNtrUj8AX.Q0sNYi6');
=======
INSERT INTO `actividades` (`id_Actividad`, `nombre_actividad`, `duracion`, `capacidad_maxima`, `id_Entrenador`) VALUES
(2, 'Musculación', 60, 15, 5),
(3, 'GAP', 60, 10, 6),
(4, 'Spinning', 45, 8, 7);
>>>>>>> 8b6efcef9d684357baedf1addc3a8cec2453fa51

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

CREATE TABLE `entrenadores` (
<<<<<<< HEAD
  `id_Trainer` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contracting` date NOT NULL
=======
  `id_Entrenador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` bigint(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecha_contratacion` date NOT NULL
>>>>>>> 8b6efcef9d684357baedf1addc3a8cec2453fa51
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `entrenadores`
--

<<<<<<< HEAD
INSERT INTO `entrenadores` (`id_Trainer`, `name`, `lastname`, `phone`, `email`, `contracting`) VALUES
(5, 'Eduardo', 'Gomez', 2494555822, 'canterop663@gmail.com', '2016-10-23'),
(6, 'Victoria', 'Flores', 2494602289, 'viquiflores00@gmail.com', '2018-09-13'),
(26, 'Jona', 'Miraglia', 57536554, 'JonaA@gmail.com', '2024-10-04'),
(27, 'Julian', 'Miraglia', 2494003121, 'jmiraglia90@gmail.com', '2023-02-16');
=======
INSERT INTO `entrenadores` (`id_Entrenador`, `nombre`, `apellido`, `telefono`, `email`, `fecha_contratacion`) VALUES
(5, 'Pablo', 'Cantero', 2494555823, 'canterop@gmail.com', '2015-09-23'),
(6, 'Victoria', 'Flores', 2494602289, 'viquiflores00@gmail.com', '2018-09-13'),
(7, 'Brian', 'Sarno', 2494555588, 'brian@gmail.com', '2023-09-14');
>>>>>>> 8b6efcef9d684357baedf1addc3a8cec2453fa51

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
<<<<<<< HEAD
  ADD PRIMARY KEY (`id_Activity`),
  ADD KEY `fk_entrenador` (`id_Trainer`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_Admin`);
=======
  ADD PRIMARY KEY (`id_Actividad`),
  ADD KEY `fk_entrenador` (`id_Entrenador`);
>>>>>>> 8b6efcef9d684357baedf1addc3a8cec2453fa51

--
-- Indices de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
<<<<<<< HEAD
  ADD PRIMARY KEY (`id_Trainer`),
  ADD UNIQUE KEY `telefono` (`phone`),
=======
  ADD PRIMARY KEY (`id_Entrenador`),
  ADD UNIQUE KEY `telefono` (`telefono`),
>>>>>>> 8b6efcef9d684357baedf1addc3a8cec2453fa51
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
<<<<<<< HEAD
  MODIFY `id_Activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
=======
  MODIFY `id_Actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> 8b6efcef9d684357baedf1addc3a8cec2453fa51

--
-- AUTO_INCREMENT de la tabla `entrenadores`
--
ALTER TABLE `entrenadores`
<<<<<<< HEAD
  MODIFY `id_Trainer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
=======
  MODIFY `id_Entrenador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
>>>>>>> 8b6efcef9d684357baedf1addc3a8cec2453fa51

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
<<<<<<< HEAD
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`id_Trainer`) REFERENCES `entrenadores` (`id_Trainer`);
=======
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`id_Entrenador`) REFERENCES `entrenadores` (`id_Entrenador`);
>>>>>>> 8b6efcef9d684357baedf1addc3a8cec2453fa51
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
