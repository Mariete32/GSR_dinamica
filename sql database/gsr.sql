-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2023 a las 14:38:31
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
  `car_id` int(4) NOT NULL,
  `car_tipo` varchar(40) NOT NULL,
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
(11, 'Delegado/a de festejos', 2),
(12, 'Delegado/a de actividades diversas', 2),
(13, 'Delegado/a de eventos', 2),
(14, 'Delegado/a de protocolo', 2),
(15, 'Delegado/a de deportes', 2),
(16, 'Delegado/a  de bar', NULL),
(17, 'Delegado/a de casal', NULL),
(18, 'Delegado/a de infantiles', 2),
(19, 'Bibliotecario/a', NULL),
(20, 'Fallera mayor', NULL),
(21, 'Fallera mayor infantil', NULL),
(22, 'Presidente infantil', NULL);

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
(12, 'ninos_0', 0),
(13, 'ninos_1a4', 20),
(14, 'ninos_5a16', 30),
(15, 'ninos_16a18', 50),
(16, 'mujeres', 150),
(17, 'hombres', 150);

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
(2, 'Josep ', 'NT', '', 2023, 2),
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
(17, 'Francisco', 'N.T.', '', 2023, 16),
(18, 'Antonio', 'N.T.', NULL, 2023, 17),
(19, 'Aida', 'F.P.', NULL, 2023, 18),
(20, 'Sandra', 'O.B.', '', 2023, 20),
(25, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2022, 1),
(26, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2021, 1),
(27, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2020, 1),
(28, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2019, 1),
(29, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2018, 1),
(30, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2017, 1),
(32, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2016, 1),
(33, 'Carles', 'B.A.', './imagenes/Presidentes/Carles.jpg', 2015, 1),
(34, 'Mara', NULL, NULL, 2023, 21),
(35, 'Sandra', 'O.B.', NULL, 2023, 20),
(38, 'Mario', 'G.R', '', 2024, 15),
(39, 'Josep', 'N.T.', 'Selecciona...', 2024, 2);

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
  `eve_suscripcion` tinyint(1) DEFAULT 0,
  `eve_url_img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`eve_id`, `eve_fecha`, `eve_fecha_limite_inscripcion`, `eve_titulo`, `eve_detalles`, `eve_suscripcion`, `eve_url_img`) VALUES
(3, '2023-06-14', '2023-05-16', 'super partido de futbol hombres y mujeres  ', 'partido solteros contra casadAS', 1, './imagenes/imagenesEventos/deportes.jpg'),
(11, '2023-05-07', NULL, 'torra', 'torra de noche con morcilla 4€', 0, './imagenes/imagenesEventos/ofrenda.jpg'),
(16, '2023-04-29', NULL, 'torra', 'torra de noche con morcilla 4€', 0, 'Seleccionar imagen'),
(17, '2023-04-29', NULL, 'HOLA', 'dddd', 0, './imagenes/imagenesEventos/pasacalles.jpg'),
(18, '2023-04-30', '2023-04-28', 'eeee', 'wwww', 0, './imagenes/imagenesEventos/fiesta_nocturna.jpg'),
(19, '2023-04-30', '2023-04-28', 'eeee', 'wwww', 1, './imagenes/imagenesEventos/fiesta_nocturna.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscritos_eventos`
--

CREATE TABLE `inscritos_eventos` (
  `ins_id` int(11) NOT NULL,
  `ins_eve_id` int(11) DEFAULT NULL,
  `ins_nombre` varchar(30) NOT NULL,
  `ins_apellidos` varchar(30) NOT NULL,
  `ins_email` varchar(40) DEFAULT NULL,
  `ins_texto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla de inscritos a eventos';

--
-- Volcado de datos para la tabla `inscritos_eventos`
--

INSERT INTO `inscritos_eventos` (`ins_id`, `ins_eve_id`, `ins_nombre`, `ins_apellidos`, `ins_email`, `ins_texto`) VALUES
(3, 3, '', '', NULL, NULL),
(6, 3, 'Mario', 'Garcia Reyes', 'mgkm10@gmail.com', 'fff'),
(7, 3, '.', '.', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `rec_id` int(11) NOT NULL,
  `rec_nombre` varchar(30) NOT NULL,
  `rec_anyo` int(11) NOT NULL,
  `rec_tipo` varchar(30) CHARACTER SET utf8 NOT NULL,
  `rec_url` varchar(70) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='tabla insercion de archivos(patrocinador,llibret,monumento))';

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`rec_id`, `rec_nombre`, `rec_anyo`, `rec_tipo`, `rec_url`) VALUES
(5, 'monumento', 1912, 'Boceto_imagen', './imagenes/bocetos/1912.jpg'),
(6, 'premio', 2015, 'Premio_imagen', './imagenes/Premios/2015.jpg'),
(10, 'Aida', 2016, 'FM_imagen', './imagenes/directiva/FM_Aida_2016.jpg'),
(11, 'Alba', 2017, 'FM_imagen', './imagenes/directiva/FM_Alba_2017.jpeg'),
(12, 'AliciaTorresYuste', 1994, 'FM_imagen', './imagenes/directiva/FM_AliciaTorresYuste_1994.jpg'),
(13, 'Amparo', 2021, 'FM_imagen', './imagenes/directiva/FM_Amparo_2021.jpg'),
(14, 'AmparoPM', 2022, 'FM_imagen', './imagenes/directiva/FM_AmparoPM_2022.jpg'),
(15, 'AngelaPerpiña', 1993, 'FM_imagen', './imagenes/directiva/FM_AngelaPerpiñá_1993.jpg'),
(16, 'CarmenPorta', 2021, 'FM_imagen', './imagenes/directiva/FM_CarmenPorta_2021.jpg'),
(17, 'Esperanza', 1982, 'FM_imagen', './imagenes/directiva/FM_Esperanza_1982.jpg'),
(18, 'IsabelAbadgonzalez', 1981, 'FM_imagen', './imagenes/directiva/FM_IsabelAbadgonzalez_1981.jpg'),
(22, 'Maria Jose', 2001, 'FM_imagen', './imagenes/directiva/FM_MariaJose.jpg'),
(23, 'Carles', 2023, 'P_imagen', './imagenes/directiva/P_P_Carles.jpg'),
(24, 'Carles', 2022, 'P_imagen', './imagenes/directiva/P_P_Carles.jpg'),
(25, 'Carles', 2021, 'P_imagen', './imagenes/directiva/P_P_Carles.jpg'),
(26, 'Javier', 2008, 'P_imagen', './imagenes/directiva/P_P_Javier-2008.jpg'),
(27, 'Alan', 2001, 'P_imagen', './imagenes/directiva/P_P_Alan.jpg'),
(28, 'Alan', 2004, 'P_imagen', './imagenes/directiva/P_P_Alan.jpg'),
(29, 'Adrian', 2004, 'PI_imagen', './imagenes/directiva/PI_PI_Adrian-2004.jpg'),
(30, 'Carles', 2017, 'P_imagen', './imagenes/directiva/P_P_Carles.jpg'),
(45, 'Aida', 2000, 'FMI_imagen', './imagenes/directiva/FMI_Aida_2000.jpg'),
(54, 'llibret', 2023, 'pdf_llibret', './llibrets/Llibret_2023.pdf'),
(55, 'llibret', 2017, 'pdf_llibret', './llibrets/Llibret_2017.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_id` int(4) NOT NULL,
  `user_login` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user_id`, `user_login`, `user_password`, `user_rol`) VALUES
(1, 'admin', 'rex', 1),
(3, 'infantiles', 'beta', 2),
(5, 'deportes', 'sport', 2);

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
  ADD KEY `FKidCargo` (`jun_cargo_id`);

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
  ADD KEY `FKidevento` (`ins_eve_id`);

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
  MODIFY `car_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `directiva`
--
ALTER TABLE `directiva`
  MODIFY `jun_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `eve_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `inscritos_eventos`
--
ALTER TABLE `inscritos_eventos`
  MODIFY `ins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `directiva`
--
ALTER TABLE `directiva`
  ADD CONSTRAINT `FKidCargo` FOREIGN KEY (`jun_cargo_id`) REFERENCES `cargos` (`car_id`);

--
-- Filtros para la tabla `inscritos_eventos`
--
ALTER TABLE `inscritos_eventos`
  ADD CONSTRAINT `FKidevento` FOREIGN KEY (`ins_eve_id`) REFERENCES `eventos` (`eve_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
