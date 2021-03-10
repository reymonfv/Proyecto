-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2021 a las 10:35:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examdespliegue`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `codigo` int(11) NOT NULL,
  `descipcion` varchar(40) NOT NULL,
  `precio` int(11) NOT NULL,
  `albaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `dirrecion` varchar(30) NOT NULL,
  `telefono` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`dni`, `nombre`, `dirrecion`, `telefono`) VALUES
('asa', 'ramon', 'dsdsd', '21'),
('2222222g', 'ramon', 'dsdsd', '2323232'),
('22222222g', 'ramon', 'dsdsd', '433424');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `listadocompleto`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `listadocompleto` (
`dni` varchar(20)
,`nombre` varchar(30)
,`factura` varchar(30)
,`fecha` date
,`total` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `albaran` varchar(30) NOT NULL,
  `factura` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `dni` varchar(20) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`albaran`, `factura`, `fecha`, `dni`, `Total`) VALUES
('holaa', 'factura2', '2021-03-09', '22222222g', 20);

-- --------------------------------------------------------

--
-- Estructura para la vista `listadocompleto`
--
DROP TABLE IF EXISTS `listadocompleto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `listadocompleto`  AS SELECT `c`.`dni` AS `dni`, `c`.`nombre` AS `nombre`, `v`.`factura` AS `factura`, `v`.`fecha` AS `fecha`, `v`.`Total` AS `total` FROM (`clientes` `c` join `ventas` `v`) WHERE `c`.`dni` = `v`.`dni` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
