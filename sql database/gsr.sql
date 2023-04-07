-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2023 a las 17:10:42
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gsr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `car_id` int(11) NOT NULL,
  `car_tipo` varchar(30) NOT NULL,
  `car_nivel` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`car_id`, `car_tipo`, `car_nivel`) VALUES
(1, 'Presidente/a', 1),
(2, 'Secretario/a', 1),
(3, 'Vicesecretario/a', 1),
(4, 'Vicepresidente/a 1', NULL),
(5, 'Vicepresidente/a 2', NULL),
(6, 'Vicepresidente/a 3', NULL),
(7, 'Vicepresidente/a 4', NULL),
(8, 'Tesorero/a', NULL),
(9, 'Contador/a', NULL),
(10, 'Vicecontador/a', NULL),
(11, 'Festejos', 2),
(12, 'Diversos', 2),
(13, 'Eventos', 2),
(14, 'Protocolo', 2),
(15, 'Deportes', 2),
(16, 'Bar', NULL),
(17, 'Casal', NULL),
(18, 'Infantiles', 2),
(19, 'Bibliotecario/a', NULL),
(20, 'Fallera_mayor', NULL),
(21, 'Fallera_mayor_infantil', NULL),
(22, 'Presidente_infantil', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `precio` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id`, `titulo`, `precio`) VALUES
(1, 'ninos_0', 0),
(2, 'ninos_1a4', 0),
(3, 'ninos_5a16', 0),
(4, 'hombres', 150),
(5, 'mujeres', 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directiva`
--

CREATE TABLE `directiva` (
  `jun_id` int(4) NOT NULL,
  `jun_nombre` text NOT NULL,
  `jun_apellidos` varchar(30) DEFAULT NULL,
  `jun_img` varchar(60) DEFAULT NULL,
  `jun_anyo` int(4) NOT NULL,
  `jun_cargo_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `directiva`
--

INSERT INTO `directiva` (`jun_id`, `jun_nombre`, `jun_apellidos`, `jun_img`, `jun_anyo`, `jun_cargo_id`) VALUES
(1, 'Cales BA', '', './imagenes/Presidentes/Carles.jpg', 2023, 1),
(2, 'Josep NT', '', NULL, 2023, 2),
(3, 'Jorge PM', '', NULL, 2023, 4),
(4, 'Antonio NB', '', NULL, 2017, 5),
(5, 'Amparo', 'G.S.', NULL, 2023, 6),
(6, 'Enrique', 'S.M.', NULL, 2023, 7),
(7, 'Joano', 'O.V.', NULL, 2023, 3),
(8, 'Ana', 'P.P.', NULL, 2023, 5),
(9, 'Sonia', 'N.T.', NULL, 2023, 13),
(10, 'Sabrina', 'V.P.', NULL, 2023, 8),
(11, 'Cora', 'S.C.', NULL, 2023, 9),
(12, 'Sunny', 'S.F.', NULL, 2023, 10),
(13, 'Jesus Daniel', 'V.L.', NULL, 2023, 11),
(14, 'Luis', 'M.A.', NULL, 2023, 12),
(15, 'Cristòfor', 'M.L.', NULL, 2023, 14),
(16, 'David', 'F.P.', NULL, 2023, 15),
(17, 'Francisco', 'N.T.', NULL, 2023, 16),
(18, 'Antonio', 'N.T.', NULL, 2023, 17),
(19, 'Aida', 'F.P.', NULL, 2023, 18),
(20, 'Sandra', 'O.B.', NULL, 2023, 19),
(21, '', '', NULL, 0, 0),
(22, '', '', NULL, 0, 0),
(23, '', '', NULL, 0, 0),
(24, '', '', NULL, 0, 0),
(25, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2022, 1),
(26, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2021, 1),
(27, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2020, 1),
(28, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2019, 1),
(29, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2018, 1),
(30, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2017, 1),
(32, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2016, 1),
(33, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2015, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `eve_id` int(4) NOT NULL,
  `eve_fecha` date NOT NULL,
  `eve_fecha_limite_inscripcion` date DEFAULT NULL,
  `eve_titulo` varchar(50) NOT NULL,
  `eve_detalles` text DEFAULT NULL,
  `eve_subscripcion` tinyint(1) DEFAULT 0,
  `eve_url_ima` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`eve_id`, `eve_fecha`, `eve_fecha_limite_inscripcion`, `eve_titulo`, `eve_detalles`, `eve_subscripcion`, `eve_url_ima`) VALUES
(1, '2023-04-07', '2023-04-14', 'junta general', 'disolucion de junta directiva', 0, './imagenes/imagenesEventos/escudo-falla.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos_eventos`
--

CREATE TABLE `inscritos_eventos` (
  `ins_id` int(11) NOT NULL,
  `ins_eve_id` int(11) NOT NULL,
  `ins_nombre` varchar(30) NOT NULL,
  `ins_apellidos` varchar(30) NOT NULL,
  `ins_email` varchar(40) DEFAULT NULL,
  `ins_texto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla de inscritos a eventos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE `precios` (
  `niños_16a18` int(11) NOT NULL,
  `niños_4a16` int(11) NOT NULL,
  `niños_1a4` int(11) NOT NULL,
  `niños_0` int(11) NOT NULL,
  `hombres` int(11) NOT NULL,
  `mujeres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`niños_16a18`, `niños_4a16`, `niños_1a4`, `niños_0`, `hombres`, `mujeres`) VALUES
(50, 30, 20, 0, 150, 150),
(50, 30, 20, 0, 150, 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `rec_id` int(11) NOT NULL,
  `rec_nombre` varchar(30) NOT NULL,
  `rec_anyo` int(11) NOT NULL,
  `rec_tipo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `rec_url` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla insercion de archivos(patrocinador,llibret,monumento))';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(4) NOT NULL,
  `user_login` varchar(20) NOT NULL,
  `user_contraseña` varchar(20) NOT NULL,
  `user_rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_login`, `user_contraseña`, `user_rol`) VALUES
(1, 'admin', 'rex', 1),
(2, 'festejos', 'beta', 2),
(3, 'infantiles', 'beta', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`car_id`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `directiva`
--
ALTER TABLE `directiva`
  ADD PRIMARY KEY (`jun_id`),
  ADD UNIQUE KEY `id` (`jun_id`),
  ADD KEY `jun_cargo_id` (`jun_cargo_id`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`eve_id`),
  ADD UNIQUE KEY `id` (`eve_id`);

--
-- Indices de la tabla `inscritos_eventos`
--
ALTER TABLE `inscritos_eventos`
  ADD PRIMARY KEY (`ins_id`),
  ADD KEY `ins_eve_id` (`ins_eve_id`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `directiva`
--
ALTER TABLE `directiva`
  MODIFY `jun_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `eve_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `inscritos_eventos`
--
ALTER TABLE `inscritos_eventos`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscritos_eventos`
--
ALTER TABLE `inscritos_eventos`
  ADD CONSTRAINT `FKidevento` FOREIGN KEY (`ins_eve_id`) REFERENCES `eventos` (`eve_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
