-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2019 a las 02:24:26
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(20) NOT NULL,
  `categoria` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `compras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

CREATE TABLE `dispositivos` (
  `idDispositivo` int(11) NOT NULL,
  `imagen` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `NumeroOrden` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idTipoReparacion` int(11) NOT NULL,
  `descripcionFalla` text COLLATE utf8_spanish2_ci NOT NULL,
  `imei` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `presupuesto` double NOT NULL,
  `recibio` text COLLATE utf8_spanish2_ci NOT NULL,
  `fechaEntrada` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fechaAproximada` text COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `optimizarproductos`
--

CREATE TABLE `optimizarproductos` (
  `id` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `optimizarproductos`
--

INSERT INTO `optimizarproductos` (`id`, `estado`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precioCompra` double NOT NULL,
  `precioVenta` int(11) NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporeparacion`
--

CREATE TABLE `tiporeparacion` (
  `idTipoReparacion` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tiporeparacion`
--

INSERT INTO `tiporeparacion` (`idTipoReparacion`, `nombre`) VALUES
(2, 'prueba1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(10, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/420.jpg', 1, '2019-08-11 19:21:08', '2019-08-12 00:21:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVenta` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `productos` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `impuesto` double NOT NULL,
  `neto` double NOT NULL,
  `total` double NOT NULL,
  `metodoPago` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `codigoFactura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`idDispositivo`);

--
-- Indices de la tabla `optimizarproductos`
--
ALTER TABLE `optimizarproductos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `tiporeparacion`
--
ALTER TABLE `tiporeparacion`
  ADD PRIMARY KEY (`idTipoReparacion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVenta`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `idDispositivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `optimizarproductos`
--
ALTER TABLE `optimizarproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tiporeparacion`
--
ALTER TABLE `tiporeparacion`
  MODIFY `idTipoReparacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
