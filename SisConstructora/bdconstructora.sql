-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2019 a las 19:49:41
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdconstructora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `apellidoP` varchar(500) NOT NULL,
  `apellidoM` varchar(500) NOT NULL,
  `telefono` char(10) NOT NULL,
  `tipodeempleado` text NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `salario_hora` decimal(15,2) NOT NULL,
  `idobra_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idempleado`, `nombre`, `apellidoP`, `apellidoM`, `telefono`, `tipodeempleado`, `imagen`, `salario_hora`, `idobra_fk`) VALUES
(6, 'Pedro', 'hernandez', 'garcia', '7687987897', 'Alvañil', '1561947556.png', '300.00', 1),
(7, 'luis', 'hernandez', 'garcia', '7687987897', 'Alvañil', '1561946855.png', '300.00', 1),
(8, 'Alberto', 'hernandez', 'garcia', '7687987897', 'Alvañil', '1561946886.png', '300.00', 1),
(9, 'juan', 'hernandez', 'garcia', '7687987897', 'Alvañil', '1561946873.jpg', '300.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materialentrada`
--

CREATE TABLE `materialentrada` (
  `identrada_mat` int(11) NOT NULL,
  `codigodebarras` varchar(500) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `marca` varchar(500) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad_medida` varchar(500) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `fecha` datetime NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `idprovedor_fk` int(11) DEFAULT NULL,
  `idobra_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materialsalida`
--

CREATE TABLE `materialsalida` (
  `idsalida_material` int(11) NOT NULL,
  `codigodebarras` varchar(500) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `marca` varchar(500) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `unidad_medida` varchar(500) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL,
  `idbodega_material_fk` int(11) DEFAULT NULL,
  `idempleado_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_bodega`
--

CREATE TABLE `material_bodega` (
  `idstock` int(11) NOT NULL,
  `codigodebarras` varchar(500) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `marca` varchar(500) NOT NULL,
  `cantidad_existente` int(11) NOT NULL,
  `unidad_medida` varchar(500) NOT NULL,
  `descripcion_material` varchar(500) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `idobra_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `material_bodega`
--

INSERT INTO `material_bodega` (`idstock`, `codigodebarras`, `nombre`, `marca`, `cantidad_existente`, `unidad_medida`, `descripcion_material`, `imagen`, `idobra_fk`) VALUES
(1, '5423123456', 'Cemento', 'Cemex', 10, 'kilogramos', 'cemento por bulto de 20kg', 'qr.jpg', 1),
(9, '', 'ijn', 'uhiu', 7, 'jn', '', '1562001067.png', 1),
(11, '', 'ggh', 'gjh', 6, 'gy', '', '1562001778.png', 1),
(13, '65465', 'jlj', 'lkj', 3, 'jh', 'klj', '1562001971.png', 1),
(14, '67567', 'fghfg', 'jklk', 1, 'kjhjk', 'jhkj', '1562002175.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE `obra` (
  `idobra` int(11) NOT NULL,
  `nombreobra` varchar(400) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `encargado` varchar(500) NOT NULL,
  `nombre_dueño` varchar(500) NOT NULL,
  `fechadeinicio` datetime NOT NULL,
  `fechadetermino` datetime NOT NULL,
  `costofinal` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`idobra`, `nombreobra`, `direccion`, `encargado`, `nombre_dueño`, `fechadeinicio`, `fechadetermino`, `costofinal`) VALUES
(1, 'Edificio Cruz del sur', 'avenida forjadores #3 col independecia', 'luis angel', 'martin martinez', '2019-06-17 00:00:00', '2019-06-28 00:00:00', '5.00'),
(17, 'Lomas cruz del zur', 'Independencia #4 col villa olimpica', 'JKN', 'mUNDO', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00'),
(21, 'Torre zavaleta', 'Avenida recta cholula #1503 col zavaleta', 'luis', 'fernando', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00'),
(22, 'Rancho colorado puebla', 'Calle ·3 col nopalito', 'Alfonso herrera', 'Juan de diios', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00'),
(24, 'Triangulo las animas', 'avenida zapata #10 col las animas puebla', 'Martin martinez', 'Jelipe', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `nombre_empresa` varchar(200) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` char(10) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `nombre_empresa`, `direccion`, `telefono`, `correo`, `imagen`) VALUES
(8, 'hola', 'xd', '666', 'luis', '1561760149.png'),
(10, 'kjhg', 'yiujghjg', '7686', 'jbmnb', '1561763792.jpg'),
(16, 'bjjh', 'uhihi', 'uhiuh', 'jkhjk', '1561613533.png'),
(17, 'homdepot', 'caller 5 sur col centro', '2224147377', 'homdepot', '1561763900.jpg'),
(19, 'luis', 'citlaltepetl ·52', '5642637', 'luis@gmail.com', '1561946831.png'),
(21, 'angel', 'jkj', 'jknjn', 'njknjn', '1561764376.png'),
(22, '', '', '', '', ''),
(23, '', '', '', '', ''),
(24, '', '', '', '', '1561763928.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `idregistro` int(11) NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `hora_entrada` datetime NOT NULL,
  `hora_salida` datetime NOT NULL,
  `idempleado_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sueldos`
--

CREATE TABLE `sueldos` (
  `idsueldo` int(11) NOT NULL,
  `sueldo` decimal(15,2) NOT NULL,
  `horas_Trabajadas` int(11) NOT NULL,
  `fechadepago` datetime NOT NULL,
  `idempleado_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`),
  ADD KEY `fk_empleado_obra` (`idobra_fk`);

--
-- Indices de la tabla `materialentrada`
--
ALTER TABLE `materialentrada`
  ADD PRIMARY KEY (`identrada_mat`),
  ADD KEY `fk_entrada_provedor` (`idprovedor_fk`),
  ADD KEY `fk_entrada_obra` (`idobra_fk`);

--
-- Indices de la tabla `materialsalida`
--
ALTER TABLE `materialsalida`
  ADD PRIMARY KEY (`idsalida_material`),
  ADD KEY `fk_salida_bodega` (`idbodega_material_fk`),
  ADD KEY `fk_salida_empleado` (`idempleado_fk`);

--
-- Indices de la tabla `material_bodega`
--
ALTER TABLE `material_bodega`
  ADD PRIMARY KEY (`idstock`),
  ADD KEY `fk_mate_obra` (`idobra_fk`);

--
-- Indices de la tabla `obra`
--
ALTER TABLE `obra`
  ADD PRIMARY KEY (`idobra`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`idregistro`),
  ADD KEY `fk_regis_empl` (`idempleado_fk`);

--
-- Indices de la tabla `sueldos`
--
ALTER TABLE `sueldos`
  ADD PRIMARY KEY (`idsueldo`),
  ADD KEY `fk_sueldo_empl` (`idempleado_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idempleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `materialentrada`
--
ALTER TABLE `materialentrada`
  MODIFY `identrada_mat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materialsalida`
--
ALTER TABLE `materialsalida`
  MODIFY `idsalida_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `material_bodega`
--
ALTER TABLE `material_bodega`
  MODIFY `idstock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `obra`
--
ALTER TABLE `obra`
  MODIFY `idobra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `idregistro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sueldos`
--
ALTER TABLE `sueldos`
  MODIFY `idsueldo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_obra` FOREIGN KEY (`idobra_fk`) REFERENCES `obra` (`idobra`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `materialentrada`
--
ALTER TABLE `materialentrada`
  ADD CONSTRAINT `fk_entrada_obra` FOREIGN KEY (`idobra_fk`) REFERENCES `obra` (`idobra`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_entrada_provedor` FOREIGN KEY (`idprovedor_fk`) REFERENCES `proveedor` (`idproveedor`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `materialsalida`
--
ALTER TABLE `materialsalida`
  ADD CONSTRAINT `fk_salida_bodega` FOREIGN KEY (`idbodega_material_fk`) REFERENCES `material_bodega` (`idstock`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_salida_empleado` FOREIGN KEY (`idempleado_fk`) REFERENCES `empleado` (`idempleado`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `material_bodega`
--
ALTER TABLE `material_bodega`
  ADD CONSTRAINT `fk_mate_obra` FOREIGN KEY (`idobra_fk`) REFERENCES `obra` (`idobra`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CON	STRAINT `fk_regis_empl` FOREIGN KEY (`idempleado_fk`) REFERENCES `empleado` (`idempleado`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `sueldos`
--
ALTER TABLE `sueldos`
  ADD CONSTRAINT `fk_sueldo_empl` FOREIGN KEY (`idempleado_fk`) REFERENCES `empleado` (`idempleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
