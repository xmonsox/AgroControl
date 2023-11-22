-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2023 a las 23:32:09
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agrocontrol`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` char(10) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(1000) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `estado` enum('DISPONIBLE','NO DISPONIBLE') DEFAULT NULL,
  `prioridad` enum('ALTA','MEDIA','BAJA','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `nombre`, `descripcion`, `ubicacion`, `estado`, `prioridad`) VALUES
('AnnSNGxZ4m', 'Limpieza de los jardines', 'Se solicita a los empleados hacer una limpieza y mantenimiento en la zona de los jardines', 'Jardin trasero', 'DISPONIBLE', 'MEDIA'),
('TSd6ueLBIz', 'Recoger la tierra abonada', 'Recoger la tierra almacenada en las cestas de abono para proceder con la utilización de esta', 'Zona de cultivos', 'NO DISPONIBLE', 'BAJA'),
('yd0Q22aQi5', 'arreglar la cosechadora', 'los empleados del area de mecanica deben reparar las fallas en el motor de la cosechadora #1', 'zona de garajes', 'DISPONIBLE', 'ALTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `id_asignacion` char(10) NOT NULL,
  `id_actividad` char(10) DEFAULT NULL,
  `id_usuario` char(10) DEFAULT NULL,
  `id_maquinaria` char(10) DEFAULT NULL,
  `estado` enum('En progreso','Completada','Pendiente','Suspendida','Cancelada','Atrasada') DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_finalizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mante_repuest`
--

CREATE TABLE `mante_repuest` (
  `id_mante_repuest` int(11) NOT NULL,
  `id_asignacion` char(10) DEFAULT NULL,
  `id_repuesto` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinaria`
--

CREATE TABLE `maquinaria` (
  `id_maquinaria` char(10) NOT NULL,
  `num_serie` char(10) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `fabricante` varchar(25) DEFAULT NULL,
  `fecha_adquisicion` date DEFAULT NULL,
  `costo_adquisicion` bigint(20) DEFAULT NULL,
  `tipo_maquinaria` enum('Maquinaria Pesada','Maquinaria Ligera','Equipos Manuales','Equipos Automatizados') DEFAULT NULL,
  `estado` enum('ACTIVA','INACTIVA','SUSPENDIDA','MANTENIMIENTO') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `maquinaria`
--

INSERT INTO `maquinaria` (`id_maquinaria`, `num_serie`, `nombre`, `fabricante`, `fecha_adquisicion`, `costo_adquisicion`, `tipo_maquinaria`, `estado`) VALUES
('6qQNB56e6l', '5555fs', 'Guadaña', 'Shindaiwa', '2023-11-01', 500000, 'Maquinaria Ligera', 'ACTIVA'),
('Djqdth50Y0', '9990ffw', 'Aspersor', 'PlastiCOL S.A.S', '2023-11-16', 200000, 'Equipos Automatizados', 'ACTIVA'),
('hLbs723ASx', '000-AAA', 'Tractor', 'Ettore Bugatti ', '2022-11-18', 8000000, 'Maquinaria Pesada', 'INACTIVA'),
('k3bmxiKifQ', '0909', 'Cosechadora', 'Mack Insdustries', '2021-01-01', 150000000, 'Maquinaria Pesada', 'SUSPENDIDA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` char(10) NOT NULL,
  `nit` char(9) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `codpostal` varchar(6) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nit`, `nombre`, `codpostal`, `direccion`, `telefono`, `email`) VALUES
('gGcmKCbXLt', '7823728', 'CarTuner', '100001', 'Calle 63g #27a-72, Bogota', '3131321', 'cartuner@mail.com'),
('O9VpXodeDx', '1212210', 'Macintosh', '551050', 'California - Los Angeles', '5556840', 'apple.inc@mail.com'),
('VgCKXtPrKh', '2139123', 'Mercedez Benz', '110010', 'Calle 165  #12 - 38 (Bogota)', '3123932', 'merch_benz@col.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id_repuesto` char(10) NOT NULL,
  `codigo` char(10) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `tipo_repuesto` enum('Motor','Transmision','Suspension','Frenos','Electricos','Carroceria','Neumaticos','Herramientas/Taller') DEFAULT NULL,
  `cantidad` int(10) DEFAULT NULL,
  `precio_compra` int(10) DEFAULT NULL,
  `descripcion` varchar(220) DEFAULT NULL,
  `id_proveedor` char(10) DEFAULT NULL,
  `estado` enum('DISPONIBLE','NO DISPONIBLE','PEDIDO') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`id_repuesto`, `codigo`, `nombre`, `tipo_repuesto`, `cantidad`, `precio_compra`, `descripcion`, `id_proveedor`, `estado`) VALUES
('Rwt1deAbbi', '077812', 'Aspas para cortadora', 'Herramientas/Taller', 2, 320000, 'Aspas de doble filo para equipar en cortadoras de cesped', 'gGcmKCbXLt', 'PEDIDO'),
('Wn5uLstfnP', '21321', 'LLantas para tractor', 'Neumaticos', 4, 730000, 'llantas para tractor con certificacion M&S', 'VgCKXtPrKh', 'DISPONIBLE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` char(10) NOT NULL,
  `documento` varchar(10) DEFAULT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `apellido` varchar(25) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `rol` enum('SUPERADMIN','ADMIN','AGRICULTORES','JARDINEROS','OPERADOR MAQUINARIA','GANADEROS','ASEADOR','PERSONAL MANTENIMIENTO') DEFAULT NULL,
  `estado` enum('ACTIVO','INACTIVO') NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `passw` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `documento`, `nombre`, `apellido`, `telefono`, `direccion`, `rol`, `estado`, `email`, `passw`) VALUES
('7Yetby6bBP', '1004669734', 'Sebastian', 'Garcia Murillo', '3103323002', 'Parque Industrial', 'SUPERADMIN', 'ACTIVO', 'sebastian@mail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('HnWCXtI0VA', '1070467254', 'Luigi Julian', 'Mansion broi', '23334', 'Anything', 'PERSONAL MANTENIMIENTO', 'INACTIVO', 'luisi@joij.com', '67cb9898ef05ca12c237632585707ac7'),
('KING027JSX', '1111661815', 'Juan Sebastian', 'Pechene Colorado', '3212272155', 'Ulloa - Valle', 'SUPERADMIN', 'ACTIVO', 'sebas@mail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
('P9IvAMR3tq', '1113858179', 'Juan David', 'Monsalve Estupiñan', '3113437503', 'Cartago - Valle', 'SUPERADMIN', 'ACTIVO', 'monsalve@mail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('wUaCOJyOxO', '1109185526', 'Andrey Johan', 'Franco Bernal', '3103836118', 'Perla Del Sur - Pereira (Risaralda)', 'SUPERADMIN', 'ACTIVO', 'andrey@mail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('zC0cCGlheg', '1088004610', 'Oscar Andres', 'Loaiza Pabon', '3164502339', 'Calle 20 Pereira', 'ADMIN', 'ACTIVO', 'oscar@mail.com', '1d72310edc006dadf2190caad5802983');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`);

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_maquinaria` (`id_maquinaria`);

--
-- Indices de la tabla `mante_repuest`
--
ALTER TABLE `mante_repuest`
  ADD PRIMARY KEY (`id_mante_repuest`),
  ADD KEY `id_asignacion` (`id_asignacion`),
  ADD KEY `id_repuesto` (`id_repuesto`);

--
-- Indices de la tabla `maquinaria`
--
ALTER TABLE `maquinaria`
  ADD PRIMARY KEY (`id_maquinaria`),
  ADD UNIQUE KEY `matricula` (`num_serie`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id_repuesto`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `documento` (`documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mante_repuest`
--
ALTER TABLE `mante_repuest`
  MODIFY `id_mante_repuest` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividades` (`id_actividad`),
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `asignaciones_ibfk_3` FOREIGN KEY (`id_maquinaria`) REFERENCES `maquinaria` (`id_maquinaria`);

--
-- Filtros para la tabla `mante_repuest`
--
ALTER TABLE `mante_repuest`
  ADD CONSTRAINT `mante_repuest_ibfk_1` FOREIGN KEY (`id_asignacion`) REFERENCES `asignaciones` (`id_asignacion`),
  ADD CONSTRAINT `mante_repuest_ibfk_2` FOREIGN KEY (`id_repuesto`) REFERENCES `repuestos` (`id_repuesto`);

--
-- Filtros para la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD CONSTRAINT `repuestos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
