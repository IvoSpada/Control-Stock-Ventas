-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 05-11-2024 a las 22:35:45
-- Versión del servidor: 8.0.39
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

DROP TABLE IF EXISTS `caja`;
CREATE TABLE IF NOT EXISTS `caja` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuariosID` int DEFAULT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime DEFAULT NULL,
  `total_ventas` int DEFAULT NULL,
  `monto_total` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuariosID` (`usuariosID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Electrónica', 'Productos relacionados con dispositivos electrónicos.'),
(2, 'Hogar', 'Productos para el hogar y la decoración.'),
(3, 'Juguetes', 'Juguetes y productos para niños.'),
(4, 'Ropa', 'Ropa para hombres, mujeres y niños.'),
(5, 'Deportes', 'Artículos deportivos y de entrenamiento.'),
(6, 'Alimentos', 'Alimentos y productos comestibles.'),
(7, 'Libros', 'Libros y material de lectura.'),
(8, 'Música', 'Instrumentos musicales y accesorios.'),
(9, 'Belleza', 'Productos de belleza y cuidado personal.'),
(10, 'Automotriz', 'Productos para automóviles y motocicletas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentacorriente`
--

DROP TABLE IF EXISTS `cuentacorriente`;
CREATE TABLE IF NOT EXISTS `cuentacorriente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(150) NOT NULL,
  `saldo_actual` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

DROP TABLE IF EXISTS `detalleventa`;
CREATE TABLE IF NOT EXISTS `detalleventa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ventaID` int DEFAULT NULL,
  `productoID` int DEFAULT NULL,
  `especificacionesID` int DEFAULT NULL,
  `cantidad` int NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ventaID` (`ventaID`,`productoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificaciones`
--

DROP TABLE IF EXISTS `especificaciones`;
CREATE TABLE IF NOT EXISTS `especificaciones` (
  `id` int NOT NULL,
  `productoID` int NOT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `stock` int NOT NULL,
  PRIMARY KEY (`id`,`productoID`),
  KEY `productoID` (`productoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientoscuentacorriente`
--

DROP TABLE IF EXISTS `movimientoscuentacorriente`;
CREATE TABLE IF NOT EXISTS `movimientoscuentacorriente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cuentaCorrienteID` int DEFAULT NULL,
  `tipo_movimiento` varchar(50) DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `detalle` text,
  PRIMARY KEY (`id`),
  KEY `cuentaCorrienteID` (`cuentaCorrienteID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text,
  `marca` varchar(100) DEFAULT NULL,
  `categoriaID` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categoriaID` (`categoriaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_proveedores`
--

DROP TABLE IF EXISTS `producto_proveedores`;
CREATE TABLE IF NOT EXISTS `producto_proveedores` (
  `idProducto` int NOT NULL,
  `idProveedor` int NOT NULL,
  PRIMARY KEY (`idProducto`,`idProveedor`),
  KEY `idProveedor` (`idProveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `direccion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dni` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `token` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `admin`, `contraseña`, `email`, `token`) VALUES
(11, 46232790, 'Ivo', 1, '$2y$10$3SIbacdhh3An9cjDzuOGAO/ynrvu16a/imkutMMrDP8hfITuma2Ha', NULL, NULL),
(12, 46234790, 'Administrador', 1, '$2y$10$QlkFPbWLhqMOwQz3YeTR6OmMf4NqmIoUbNvtKUpWHeEALSgOjw/KC', 'ignacioguillermoruiz@gmail.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventacuentacorriente`
--

DROP TABLE IF EXISTS `ventacuentacorriente`;
CREATE TABLE IF NOT EXISTS `ventacuentacorriente` (
  `ventaID` int NOT NULL,
  `cuentaCorrienteID` int NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`ventaID`,`cuentaCorrienteID`),
  KEY `cuentaCorrienteID` (`cuentaCorrienteID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total` decimal(10,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `cajaID` int DEFAULT NULL,
  `metodo_pago` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cajaID` (`cajaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caja`
--
ALTER TABLE `caja`
  ADD CONSTRAINT `caja_ibfk_1` FOREIGN KEY (`usuariosID`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`ventaID`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`ventaID`,`productoID`) REFERENCES `especificaciones` (`id`, `productoID`);

--
-- Filtros para la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  ADD CONSTRAINT `especificaciones_ibfk_1` FOREIGN KEY (`productoID`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `movimientoscuentacorriente`
--
ALTER TABLE `movimientoscuentacorriente`
  ADD CONSTRAINT `movimientoscuentacorriente_ibfk_1` FOREIGN KEY (`cuentaCorrienteID`) REFERENCES `cuentacorriente` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoriaID`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `producto_proveedores`
--
ALTER TABLE `producto_proveedores`
  ADD CONSTRAINT `producto_proveedores_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `producto_proveedores_ibfk_2` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`id`);

--
-- Filtros para la tabla `ventacuentacorriente`
--
ALTER TABLE `ventacuentacorriente`
  ADD CONSTRAINT `ventacuentacorriente_ibfk_1` FOREIGN KEY (`ventaID`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `ventacuentacorriente_ibfk_2` FOREIGN KEY (`cuentaCorrienteID`) REFERENCES `cuentacorriente` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cajaID`) REFERENCES `caja` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
