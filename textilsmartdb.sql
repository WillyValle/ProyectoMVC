-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2024 a las 08:26:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `textilsmartdb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_inventario_mp` (IN `p_id_inventario_mp` INT, IN `p_cantidad_usada` DECIMAL(10,2), IN `p_fecha_produccion` DATE)   BEGIN
    UPDATE inventariomateriaprima
    SET cantidad_disponible = cantidad_disponible - p_cantidad_usada,
        fecha_actualizacion = p_fecha_produccion
    WHERE id_inventario_mp = p_id_inventario_mp;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_producto` (IN `p_id_producto` INT, IN `p_cantidad_producida` DECIMAL(10,2), IN `p_fecha` DATE, IN `p_id_produccion` INT)   BEGIN
    DECLARE v_costo_produccion DECIMAL(10,2);

    -- Calcular el costo de producción
    SELECT SUM(mp.costo_unitario * pr.cantidad_usada) INTO v_costo_produccion
    FROM produccion pr
    JOIN inventariomateriaprima imp ON pr.id_inventario_mp = imp.id_inventario_mp
    JOIN materia_prima mp ON imp.id_materia_prima = mp.id_materia_prima
    WHERE pr.id_produccion = p_id_produccion;

    -- Actualizar la tabla producto
    UPDATE producto
    SET cantidad_disponible = cantidad_disponible + p_cantidad_producida,
        fecha_creacion = p_fecha,
        costo_produccion = v_costo_produccion
    WHERE id_producto = p_id_producto;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `email`, `telefono`, `direccion`) VALUES
(1, 'Pepe', 'pepe@gmail.com', '56214787', 'Ciudad de Guatemala'),
(2, 'Aguapoyo', 'apoyo@outlool.com', '35226789', 'Jocotenango'),
(3, 'Daniel el traviesillo', 'traviesillo@travieso.com', '8565465', 'Antigua'),
(5, 'Willy Wonka', 'wonkainc@humpaloompa.org', '6416546165165', 'Inglaterra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id_detalle_pedido` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventariomateriaprima`
--

CREATE TABLE `inventariomateriaprima` (
  `id_inventario_mp` int(11) NOT NULL,
  `id_materia_prima` int(11) DEFAULT NULL,
  `cantidad_disponible` decimal(10,2) DEFAULT NULL,
  `ubicacion` varchar(100) DEFAULT NULL,
  `fecha_actualizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventariomateriaprima`
--

INSERT INTO `inventariomateriaprima` (`id_inventario_mp`, `id_materia_prima`, `cantidad_disponible`, `ubicacion`, `fecha_actualizacion`) VALUES
(3, 3, 3999.00, 'jooctes', '2024-02-14'),
(4, 1, 4900.00, 'Bodegona', '2024-06-10'),
(5, 3, 8000.00, 'Antigua y Barbuda', '2024-10-13'),
(6, 9, 29000.00, 'Bodega Segundo Nivel', '2024-10-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_producto`
--

CREATE TABLE `inventario_producto` (
  `id_inventario_producto` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad_disponible` decimal(10,2) DEFAULT NULL,
  `ubicacion_almacen` varchar(100) DEFAULT NULL,
  `fecha_entrada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `id_materia_prima` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `unidad_medida` varchar(50) DEFAULT NULL,
  `costo_unitario` decimal(10,2) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_actualizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`id_materia_prima`, `nombre`, `descripcion`, `unidad_medida`, `costo_unitario`, `fecha_ingreso`, `fecha_actualizacion`) VALUES
(1, 'Lana', 'Esto es lana de oveja para hacer prendas calientes', 'kg', 10.00, '2020-06-01', '2021-10-06'),
(2, 'Velcro', 'Unir dos prendas', 'kg', 5.00, '2022-07-07', '2021-10-06'),
(3, 'Algodon', 'Algodon natural para usarlo en prendas flexibles', 'kg', 3.00, '2023-02-01', '2024-05-09'),
(4, 'Seda', 'Suavecito para la piel debil', 'kg', 15.00, '2023-02-01', '2024-05-09'),
(6, 'Perlas', 'Perlas que brillan', 'oz', 50.00, '2023-02-14', '2024-10-05'),
(7, 'Hilo negro', 'lnlkn', 'lb', 6.50, '2024-10-01', '2024-10-05'),
(8, 'Hilo azul', 'Bonito hulo azul', 'lb', 10.05, '2024-10-01', '2024-10-04'),
(9, 'Poliester', 'Poliester dfadsjadslkdas', 'mts', 25.00, '2024-10-02', '2024-10-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra`
--

CREATE TABLE `orden_compra` (
  `id_orden_compra` int(11) NOT NULL,
  `No_OrdenCompra` varchar(50) DEFAULT NULL,
  `id_materia_prima` int(11) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `estado_pedido` varchar(50) DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_produccion`
--

CREATE TABLE `proceso_produccion` (
  `id_proceso` int(11) NOT NULL,
  `nombre_proceso` varchar(100) DEFAULT NULL,
  `descripcion_proceso` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proceso_produccion`
--

INSERT INTO `proceso_produccion` (`id_proceso`, `nombre_proceso`, `descripcion_proceso`) VALUES
(1, 'Teñido', 'El teñido de tejidos es un proceso en el que se aplica color a materiales textiles, como fibras, hilos o telas, para obtener un color permanente y duradero. Este proceso puede realizarse tanto de manera artesanal como industrial, y ha evolucionado significativamente a lo largo de los siglos.'),
(2, 'Tejido', 'El tejido es el proceso de entrelazar hilos para crear una tela o material textil. Este proceso puede realizarse de manera manual o mediante máquinas industriales. Aquí tienes una descripción general:'),
(3, 'Corte', 'El corte de tejidos es un proceso crucial en la producción textil, ya que determina la forma y tamaño de las piezas que se ensamblarán para crear prendas u otros productos textiles.'),
(4, 'Confección', 'La confección es el proceso de ensamblar las piezas de tela cortadas para crear una prenda o producto textil terminado. Este proceso incluye varias etapas y técnicas que aseguran que el producto final sea de alta calidad y cumpla con las especificaciones del diseño.'),
(6, 'Receso', 'receso como en el colegio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `id_produccion` int(11) NOT NULL,
  `id_proceso` int(11) DEFAULT NULL,
  `id_inventario_mp` int(11) DEFAULT NULL,
  `cantidad_usada` decimal(10,2) DEFAULT NULL,
  `fecha_produccion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `produccion`
--

INSERT INTO `produccion` (`id_produccion`, `id_proceso`, `id_inventario_mp`, `cantidad_usada`, `fecha_produccion`) VALUES
(1, 1, 3, 15.00, '2024-10-19'),
(2, 3, 4, 10.00, '2024-10-19'),
(4, 4, 6, 500.00, '2024-06-01'),
(9, 3, 6, 1000.00, '2024-10-21');

--
-- Disparadores `produccion`
--
DELIMITER $$
CREATE TRIGGER `after_insert_produccion` AFTER INSERT ON `produccion` FOR EACH ROW BEGIN
    CALL actualizar_inventario_mp(NEW.id_inventario_mp, NEW.cantidad_usada, NEW.fecha_produccion);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) DEFAULT NULL,
  `descripcion_producto` text DEFAULT NULL,
  `costo_produccion` decimal(10,2) DEFAULT NULL,
  `cantidad_disponible` decimal(10,2) DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `descripcion_producto`, `costo_produccion`, `cantidad_disponible`, `fecha_creacion`) VALUES
(1, 'Zapatos', 'Zapatos bonitos', 50.00, 20.00, '2024-10-03'),
(2, 'Playera', 'bonita playera', 13.00, 85.00, '2024-10-19'),
(3, 'Pants', 'Pants de seda', 90.50, 23.00, '2024-10-11'),
(4, 'Sombrero', 'Esquipulas', 95.00, 500.00, '2024-10-19'),
(5, 'Tela', 'Esquipulas', 45.00, 100.00, '2024-10-21'),
(6, 'tela algodon', 'dqwdsadasd', 12500.00, 900.00, '2024-10-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_produccion`
--

CREATE TABLE `producto_produccion` (
  `id_producto_produccion` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_produccion` int(11) DEFAULT NULL,
  `cantidad_producida` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto_produccion`
--

INSERT INTO `producto_produccion` (`id_producto_produccion`, `id_producto`, `id_produccion`, `cantidad_producida`, `fecha`) VALUES
(1, 1, 2, 90.00, '2024-10-05'),
(3, 2, 4, 83.00, '2024-10-03'),
(4, 1, 4, 75.00, '2024-09-01'),
(5, 5, 1, 100.00, '2024-10-21'),
(6, 6, 4, 900.00, '2024-10-15');

--
-- Disparadores `producto_produccion`
--
DELIMITER $$
CREATE TRIGGER `after_insert_producto_produccion` AFTER INSERT ON `producto_produccion` FOR EACH ROW BEGIN
    CALL actualizar_producto(
        NEW.id_producto,
        NEW.cantidad_producida,
        NEW.fecha,
        NEW.id_produccion
    );
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id_detalle_pedido`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `inventariomateriaprima`
--
ALTER TABLE `inventariomateriaprima`
  ADD PRIMARY KEY (`id_inventario_mp`),
  ADD KEY `id_materia_prima` (`id_materia_prima`);

--
-- Indices de la tabla `inventario_producto`
--
ALTER TABLE `inventario_producto`
  ADD PRIMARY KEY (`id_inventario_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`id_materia_prima`);

--
-- Indices de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD PRIMARY KEY (`id_orden_compra`),
  ADD KEY `id_materia_prima` (`id_materia_prima`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `proceso_produccion`
--
ALTER TABLE `proceso_produccion`
  ADD PRIMARY KEY (`id_proceso`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`id_produccion`),
  ADD KEY `id_proceso` (`id_proceso`),
  ADD KEY `id_inventario_mp` (`id_inventario_mp`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `producto_produccion`
--
ALTER TABLE `producto_produccion`
  ADD PRIMARY KEY (`id_producto_produccion`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_producción` (`id_produccion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id_detalle_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventariomateriaprima`
--
ALTER TABLE `inventariomateriaprima`
  MODIFY `id_inventario_mp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `inventario_producto`
--
ALTER TABLE `inventario_producto`
  MODIFY `id_inventario_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  MODIFY `id_materia_prima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  MODIFY `id_orden_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proceso_produccion`
--
ALTER TABLE `proceso_produccion`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `id_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `producto_produccion`
--
ALTER TABLE `producto_produccion`
  MODIFY `id_producto_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `inventariomateriaprima`
--
ALTER TABLE `inventariomateriaprima`
  ADD CONSTRAINT `inventariomateriaprima_ibfk_1` FOREIGN KEY (`id_materia_prima`) REFERENCES `materia_prima` (`id_materia_prima`);

--
-- Filtros para la tabla `inventario_producto`
--
ALTER TABLE `inventario_producto`
  ADD CONSTRAINT `inventario_producto_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD CONSTRAINT `orden_compra_ibfk_1` FOREIGN KEY (`id_materia_prima`) REFERENCES `materia_prima` (`id_materia_prima`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD CONSTRAINT `produccion_ibfk_1` FOREIGN KEY (`id_proceso`) REFERENCES `proceso_produccion` (`id_proceso`),
  ADD CONSTRAINT `produccion_ibfk_2` FOREIGN KEY (`id_inventario_mp`) REFERENCES `inventariomateriaprima` (`id_inventario_mp`);

--
-- Filtros para la tabla `producto_produccion`
--
ALTER TABLE `producto_produccion`
  ADD CONSTRAINT `producto_produccion_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `producto_produccion_ibfk_2` FOREIGN KEY (`id_produccion`) REFERENCES `produccion` (`id_produccion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
