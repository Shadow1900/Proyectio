-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 29-11-2022 a las 23:39:34
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_login_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `cuenta` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `bloqueada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `cuenta`, `password`, `bloqueada`) VALUES
(1, 'Ivan Alejandro Lopez Martinez', 'livan7241@gmail.com', 'Normal', '$2y$10$dv5hLanbCtQfcc6Ow5sYK.zSrTGy6//cUnhhnuQBpdWhBIElMAwdS', 1),
(2, 'Armando', 'armando@gmail.com', 'Normal', '$2y$10$0HhzHAV0qeGhHUMpsKKQrOTSjN2Y5C5RSazbbfKKppx/9a.v5lL5i', 0),
(3, 'UAAIALM', 'Ivan.Lopez.17.program@outlook.es', 'Normal', '$2y$10$x4w4/gx21FqgzAKoNJKVb.3AWZCaWMQV6XgXDW4t5J/sziAikygC6', 0),
(4, 'UAA', 'uaa@gmaill.com', 'Normal', '$2y$10$xkgbaaabOUjRUiPP6JXGHOLDOVLDIdaXrcqyU4bW4QMb7Msm/Af3S', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
