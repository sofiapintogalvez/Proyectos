-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2021 a las 18:39:25
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ropa_samm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `codigo_producto` int(5) NOT NULL,
  `codigo_pedido` int(5) NOT NULL,
  `cantidad` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`codigo_producto`, `codigo_pedido`, `cantidad`) VALUES
(6, 70, 4),
(10, 71, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codigo_categoria` int(5) NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`codigo_categoria`, `nombre_categoria`) VALUES
(1, 'Femenino'),
(2, 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codigo_cliente` int(5) NOT NULL,
  `codigo_postal` int(5) NOT NULL,
  `nombre_cliente` varchar(40) NOT NULL,
  `apellido_cliente` varchar(40) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `clave` varchar(60) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `numero_tarjeta` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codigo_cliente`, `codigo_postal`, `nombre_cliente`, `apellido_cliente`, `dni`, `telefono`, `correo`, `clave`, `direccion`, `fecha_nacimiento`, `numero_tarjeta`) VALUES
(7, 1, 'Valentina', 'Bustamante', '12345678', '961723627', 'valen@gmail.com', '$2y$10$2oyBPVDRA8xCL9RKGMoCOOO3QekU6IDySEXmAIWZOSiYa3h1ApxU.', 'Calle Melocoton 8', '2021-11-03', 12345),
(8, 3, 'Adriana', 'Olivares', '23458724', '236432898', 'adri@gmail.com', '$2y$10$NgLy9vSK1AaDGD8rzPpUYey5zmgLQmuAKgGBbCxZv0Tw1mLqs9EFe', 'Los Panales 876', '2021-11-17', 345627);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `codigo_color` int(5) NOT NULL,
  `nombre_color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`codigo_color`, `nombre_color`) VALUES
(1, 'Negro'),
(2, 'Azul'),
(3, 'Blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `codigo_postal` int(5) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `distrito` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`codigo_postal`, `departamento`, `distrito`) VALUES
(1, 'Arequipa', 'J.L.B. y R.'),
(2, 'Arequipa', 'Paucarpata'),
(3, 'Arequipa', 'Selva Alegre'),
(4, 'Arequipa', 'Cerro Colorado'),
(5, 'Arequipa', 'Cayma');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `codigo_cliente` int(5) NOT NULL,
  `codigo_producto` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feedback`
--

CREATE TABLE `feedback` (
  `codigo_feedback` int(5) NOT NULL,
  `codigo_cliente` int(5) NOT NULL,
  `codigo_pedido` int(5) NOT NULL,
  `opciones_reclamo` varchar(150) NOT NULL,
  `opciones_satisfaccion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `codigo_marca` int(5) NOT NULL,
  `nombre_marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`codigo_marca`, `nombre_marca`) VALUES
(1, 'SAMM'),
(2, 'SAMM2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `codigo_pago` int(5) NOT NULL,
  `codigo_cliente` int(5) NOT NULL,
  `nombre_metodo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`codigo_pago`, `codigo_cliente`, `nombre_metodo`) VALUES
(1, 7, 'Debito'),
(3, 8, 'Debiro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `codigo_pedido` int(5) NOT NULL,
  `codigo_cliente` int(5) NOT NULL,
  `codigo_pago` int(5) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `estado_pedido` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`codigo_pedido`, `codigo_cliente`, `codigo_pago`, `fecha_pedido`, `fecha_entrega`, `estado_pedido`) VALUES
(70, 8, 3, '2021-11-29', '2021-12-14', 'en estado'),
(71, 7, 1, '2021-11-29', '2021-12-14', 'en estado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codigo_producto` int(5) NOT NULL,
  `codigo_marca` int(5) NOT NULL,
  `codigo_talla` int(5) NOT NULL,
  `codigo_color` int(5) NOT NULL,
  `codigo_categoria` int(5) NOT NULL,
  `nombre_producto` varchar(80) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(5) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codigo_producto`, `codigo_marca`, `codigo_talla`, `codigo_color`, `codigo_categoria`, `nombre_producto`, `precio`, `stock`, `descripcion`) VALUES
(1, 1, 1, 1, 1, 'Camiseta con Motivo', '30.99', 10, 'Camiseta de punto con motivo estampado. Modelo manga corta para todos los gustos con tela exterior de algodón reciclado 20%.'),
(2, 1, 3, 3, 1, 'Top Cropped de Punto', '42.00', 10, 'Top cropped en velour suave con copas y laterales fruncidos. Escote doble look: halter o cruzado. Sin cierre.'),
(3, 1, 2, 2, 1, 'Wide High Jeans', '74.50', 10, 'Vaquero de cinco bolsillos en denim de algodón. Modelo de talle alto con perneras amplias rectas y cierre de cremallera con botón.'),
(4, 2, 4, 1, 2, 'Chaqueta THERMOLITE', '55.00', 10, 'Abrigo de botonadura sencilla en mezcla de lana afieltrada con solapas de muesca y bolsillos insertados al bies. Manga forrada.'),
(5, 2, 4, 1, 2, 'Camisa de Franela Regular Fit', '35.50', 10, 'Camisa de algodón con cuello americano, botones delante y canesú de doble capa con pliegue de caja en la espalda. Modelo corte relajado con hombros caídos, mangas largas con puños anchos abotonados y bajo redondeado. Espalda algo más larga.'),
(6, 1, 3, 3, 1, 'Cardigan en Punto Peludo', '60.99', 10, 'Cárdigan ligeramente corto en punto suave de canalé con lana en la trama. Modelo de manga amplia con escote de pico y cierre de botones.'),
(7, 1, 1, 1, 1, 'Vestido Peto de Pana', '63.00', 10, 'Vestido corto en pana de algodón con tirantes ajustables cruzados en la espalda. Costura en la cintura, bolsillos delanteros y cierre oculto de cremallera con botón en un lateral. Sin forrar.'),
(8, 2, 3, 1, 2, 'Joggers Cargo', '39.99', 10, 'Joggers de tela con elástico revestido y cordón de ajuste en la cintura, cierre decorativo, bolsillos al bies y bolsillos traseros con solapa. Perneras con costuras moldeadoras sobre las rodillas, prácticos bolsillos con cremallera y elástico revestido en los bajos.'),
(9, 1, 1, 1, 1, 'Vestido de Punto', '60.00', 10, 'Vestido corto en punto fino con lana en la trama. Modelo de corte relajado con cuello ancho en canalé y abertura en V delante, hombros ligeramente caídos y mangas largas amplias. Puños y bajo en punto de canalé.'),
(10, 1, 4, 3, 1, 'Vestido con Cinturón', '75.00', 10, 'Vestido midi en denim de algodón grueso con cuello elevado y botonadura frontal. Hombros ligeramente caídos, mangas globo largas con elástico fino en los puños y cinturón de anudar extraíble. Sin forrar.'),
(11, 1, 2, 2, 1, 'Falda Denim Tableada', '47.50', 10, 'Minifalda tableada en denim de algodón grueso. Modelo de talle alto con botón de presión y cremallera oculta en un lateral. Sin forrar.'),
(12, 2, 4, 3, 2, 'Jersey de Cuello Alto', '45.00', 10, 'Jersey en punto fino de algodón con cuello alto, mangas largas y puños y parte inferior en punto elástico de canalé.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `codigo_talla` int(5) NOT NULL,
  `nombre_talla` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`codigo_talla`, `nombre_talla`) VALUES
(1, 'Extra Small'),
(4, 'Large'),
(3, 'Medium'),
(2, 'Small');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`codigo_producto`,`codigo_pedido`),
  ADD KEY `codigo_pedido` (`codigo_pedido`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codigo_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo_cliente`),
  ADD KEY `codigo_postal` (`codigo_postal`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`codigo_color`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`codigo_postal`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`codigo_cliente`,`codigo_producto`),
  ADD KEY `codigo_producto` (`codigo_producto`);

--
-- Indices de la tabla `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`codigo_feedback`),
  ADD KEY `codigo_cliente` (`codigo_cliente`),
  ADD KEY `codigo_pedido` (`codigo_pedido`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`codigo_marca`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`codigo_pago`),
  ADD KEY `codigo_cliente` (`codigo_cliente`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`codigo_pedido`),
  ADD KEY `codigo_pedido` (`codigo_pedido`,`codigo_cliente`),
  ADD KEY `codigo_pago` (`codigo_pago`),
  ADD KEY `codigo_cliente` (`codigo_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codigo_producto`),
  ADD KEY `codigo_marca` (`codigo_marca`),
  ADD KEY `codigo_talla` (`codigo_talla`),
  ADD KEY `codigo_color` (`codigo_color`),
  ADD KEY `codigo_categoria` (`codigo_categoria`),
  ADD KEY `nombre_producto` (`nombre_producto`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`codigo_talla`),
  ADD KEY `nombre_talla` (`nombre_talla`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codigo_categoria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigo_cliente` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `codigo_color` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `codigo_postal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `feedback`
--
ALTER TABLE `feedback`
  MODIFY `codigo_feedback` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `codigo_marca` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `codigo_pago` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `codigo_pedido` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codigo_producto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `talla`
--
ALTER TABLE `talla`
  MODIFY `codigo_talla` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`codigo_pedido`) REFERENCES `pedido` (`codigo_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`codigo_postal`) REFERENCES `destino` (`codigo_postal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`codigo_cliente`) REFERENCES `cliente` (`codigo_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`codigo_producto`) REFERENCES `producto` (`codigo_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`codigo_cliente`) REFERENCES `cliente` (`codigo_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`codigo_pedido`) REFERENCES `pedido` (`codigo_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD CONSTRAINT `metodo_pago_ibfk_1` FOREIGN KEY (`codigo_cliente`) REFERENCES `cliente` (`codigo_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`codigo_cliente`) REFERENCES `cliente` (`codigo_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`codigo_pago`) REFERENCES `metodo_pago` (`codigo_pago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`codigo_marca`) REFERENCES `marca` (`codigo_marca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`codigo_talla`) REFERENCES `talla` (`codigo_talla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`codigo_color`) REFERENCES `colores` (`codigo_color`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`codigo_categoria`) REFERENCES `categoria` (`codigo_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
