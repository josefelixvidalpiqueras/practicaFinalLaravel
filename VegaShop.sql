-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2024 a las 21:00:52
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
-- Base de datos: `cesvm`
--
DROP DATABASE IF EXISTS `cesvm`;
CREATE DATABASE IF NOT EXISTS `cesvm` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `cesvm`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cubrir`
--

DROP TABLE IF EXISTS `cubrir`;
CREATE TABLE `cubrir` (
  `id` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_falta` int(11) NOT NULL,
  `id_tarea` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cubrir`
--

INSERT INTO `cubrir` (`id`, `id_personal`, `id_falta`, `id_tarea`) VALUES
(5, 2, 8, 3),
(6, 2, 8, 4),
(8, 25, 15, 32),
(9, 3, 15, 33),
(10, 5, 17, 39),
(11, 5, 18, 42),
(12, 3, 18, 41),
(13, 2, 18, 40),
(14, 3, 8, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faltas`
--

DROP TABLE IF EXISTS `faltas`;
CREATE TABLE `faltas` (
  `id` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `fecha_falta` date NOT NULL,
  `dias` int(11) NOT NULL,
  `horas` varchar(30) NOT NULL,
  `motivo` varchar(30) NOT NULL,
  `justificada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `faltas`
--

INSERT INTO `faltas` (`id`, `id_personal`, `fecha_falta`, `dias`, `horas`, `motivo`, `justificada`) VALUES
(8, 25, '2023-11-27', 1, '1 3 5', 'Retraso por tráfico', 1),
(12, 25, '2023-11-02', 1, '1 2 3 4 5 6', 'ÚLTIMA PRUEBA', 1),
(13, 2, '2023-11-15', 1, ' 4 5 6', 'Motivos personales', 1),
(14, 2, '2023-11-01', 1, '1 3 6', 'Revisión Médica', 1),
(15, 2, '2023-11-01', 1, ' 4 6', '', 0),
(16, 2, '2023-07-20', 1, '1 3 6', 'Asuntos personales', 1),
(17, 25, '2023-08-24', 1, '1 3 6', '', 0),
(18, 25, '2023-12-22', 1, '1 3 6', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarioguardia`
--

DROP TABLE IF EXISTS `horarioguardia`;
CREATE TABLE `horarioguardia` (
  `id` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `dia` int(30) NOT NULL,
  `hora` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horarioguardia`
--

INSERT INTO `horarioguardia` (`id`, `id_personal`, `dia`, `hora`) VALUES
(188, 2, 1, 1),
(189, 4, 2, 1),
(190, 3, 3, 1),
(191, 5, 4, 2),
(192, 25, 5, 2),
(193, 3, 1, 2),
(194, 2, 2, 3),
(195, 4, 3, 3),
(196, 3, 4, 3),
(197, 5, 5, 4),
(198, 25, 1, 4),
(199, 3, 2, 4),
(200, 5, 3, 5),
(201, 25, 4, 5),
(202, 3, 5, 5),
(203, 5, 1, 6),
(204, 25, 2, 6),
(205, 3, 3, 6),
(206, 2, 4, 1),
(207, 4, 5, 1),
(208, 3, 1, 1),
(209, 5, 2, 2),
(210, 25, 3, 2),
(211, 3, 4, 2),
(212, 2, 5, 3),
(213, 4, 1, 3),
(214, 3, 2, 3),
(215, 5, 3, 4),
(216, 25, 4, 4),
(217, 3, 5, 4),
(218, 5, 1, 5),
(219, 25, 2, 5),
(220, 3, 3, 5),
(221, 5, 4, 6),
(222, 25, 5, 6),
(223, 3, 1, 6),
(224, 2, 2, 1),
(225, 4, 3, 1),
(226, 3, 4, 1),
(227, 5, 5, 2),
(228, 25, 1, 2),
(229, 3, 2, 2),
(230, 2, 3, 3),
(231, 4, 4, 3),
(232, 3, 5, 3),
(233, 5, 1, 4),
(234, 25, 2, 4),
(235, 3, 3, 4),
(236, 5, 4, 5),
(237, 25, 5, 5),
(238, 3, 1, 5),
(239, 5, 2, 6),
(240, 25, 3, 6),
(241, 3, 4, 6),
(242, 2, 5, 1),
(243, 4, 1, 1),
(244, 3, 2, 1),
(245, 5, 3, 2),
(246, 25, 4, 2),
(247, 3, 5, 2),
(248, 2, 1, 3),
(249, 4, 2, 3),
(250, 3, 3, 3),
(251, 5, 4, 4),
(252, 25, 5, 4),
(253, 3, 1, 4),
(254, 5, 2, 5),
(255, 25, 3, 5),
(256, 3, 4, 5),
(257, 5, 5, 6),
(258, 25, 1, 6),
(259, 3, 2, 6),
(260, 2, 3, 1),
(261, 4, 4, 1),
(262, 3, 5, 1),
(263, 5, 1, 2),
(264, 25, 2, 2),
(265, 3, 3, 2),
(266, 2, 4, 3),
(267, 4, 5, 3),
(268, 3, 1, 3),
(269, 5, 2, 4),
(270, 25, 3, 4),
(271, 3, 4, 4),
(272, 5, 5, 5),
(273, 25, 1, 5),
(274, 3, 2, 5),
(275, 5, 3, 6),
(276, 25, 4, 6),
(277, 3, 5, 6),
(283, 26, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `dni` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `direccion` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` int(9) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `foto` varchar(30) DEFAULT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `dni`, `password`, `nombre`, `apellidos`, `fecha_nac`, `direccion`, `email`, `telefono`, `cargo`, `foto`, `activo`) VALUES
(2, '12345678A', '1234', 'Fernando', 'Ureña Herrero', '1990-08-12', 'C/Palmeras Nº20', 'fernando@ces-vegamedia.es', 666666666, 'JefeEstudios', 'images/1234567810.jpg', 1),
(3, '12345678B', '1234', 'Víctor José', 'Verdú López', '1985-03-20', 'C/Manzano Nº35', 'victor@ces-vegamedia.es', 666666665, 'Profesor', 'images/12345678B.jpg', 0),
(4, '12345678C', '1234', 'José Antonio', 'Pascual Hernández', '1988-12-15', 'C/Alamillo Nº7', 'joseantonio@ces-vegamedia.es', 666666664, 'Profesor', 'images/12345678C.jpg', 1),
(5, '12345678D', '1234', 'María José', 'Pérez Sanz', '1989-05-09', 'C/Peral Nº73', 'mariajose@ces-vegamedia.es', 666666663, 'Profesor', 'images/12345678D.jpg', 1),
(25, '48751655G', '1234', 'José Félix', 'Vidal Piqueras', '1996-02-28', 'C/La Viña Nº 106', 'josefelix.vidal.piqueras@ces-vegamedia.es', 654950001, 'Profesor', 'images/487516558.jpg', 1),
(26, '49476587E', '1234', 'Yifan', 'Sun', '1997-06-15', 'C/Olivo Nº27', 'yifan.sun@ces-vegamedia.es', 666666662, 'Profesor', 'images/default.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms`
--

DROP TABLE IF EXISTS `sms`;
CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `consulta` varchar(500) NOT NULL,
  `atendido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sms`
--

INSERT INTO `sms` (`id`, `email`, `consulta`, `atendido`) VALUES
(1, 'anonimo@gmail.com', 'Buenas, ¿dónde puedo obtener los horarios del centro?', 1),
(2, 'josefelixvidalpiqueras@gmail.com', 'Tengo una duda sobre el registro de faltas.', 1),
(3, 'yifan.sun@ces-vegamedia.es', 'Soy nuevo en el centro. Me puedes activar la cuenta?', 0),
(4, 'mariajose@ces-vegamedia.es', 'Hola, mis faltas no funcionan. ¿Se ha caído el portal?', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

DROP TABLE IF EXISTS `tareas`;
CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `id_falta` int(11) NOT NULL,
  `tarea` varchar(100) NOT NULL,
  `hora` int(30) NOT NULL,
  `fecha_tarea` date NOT NULL,
  `cubierta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `id_falta`, `tarea`, `hora`, `fecha_tarea`, `cubierta`) VALUES
(3, 8, 'Repasar String', 1, '2023-11-27', 1),
(4, 8, 'Ejercicios Array', 3, '2023-11-27', 1),
(5, 8, 'Práctica PHP', 5, '2023-11-27', 1),
(20, 12, 'Repasar String', 1, '2023-11-02', 1),
(21, 12, 'Ejercicios Array', 2, '2023-11-02', 0),
(22, 12, 'Práctica PHP', 3, '2023-11-02', 0),
(23, 12, 'Diapositivas Tema 3 Despliegue FTP ', 4, '2023-11-02', 0),
(24, 12, 'Repaso SQL', 5, '2023-11-02', 0),
(25, 12, 'Hora Libre', 6, '2023-11-02', 0),
(26, 13, 'Repasar para boletín de Cliente', 4, '2023-11-15', 0),
(27, 13, 'Repasar Strings', 5, '2023-11-15', 0),
(28, 13, 'Hora libre', 6, '2023-11-15', 0),
(29, 14, 'Repasar String', 1, '2023-11-01', 0),
(30, 14, 'Práctica PHP', 3, '2023-11-01', 0),
(31, 14, 'Hora Libre', 6, '2023-11-01', 0),
(32, 15, 'Diapositivas Tema 3 Despliegue FTP ', 4, '2023-11-01', 1),
(33, 15, 'Hora Libre', 6, '2023-11-01', 1),
(34, 16, 'Repasar String', 1, '2023-07-20', 0),
(35, 16, 'Hora libre', 3, '2023-07-20', 0),
(36, 16, 'Hora Libre', 6, '2023-07-20', 0),
(37, 17, 'Repasar para boletín de Cliente', 1, '2023-08-24', 0),
(38, 17, 'Práctica PHP', 3, '2023-08-24', 0),
(39, 17, 'Hora Libre', 6, '2023-08-24', 1),
(40, 18, 'php', 1, '2023-12-22', 1),
(41, 18, 'repaso script', 3, '2023-12-22', 1),
(42, 18, 'libre', 6, '2023-12-22', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cubrir`
--
ALTER TABLE `cubrir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_falta` (`id_falta`),
  ADD KEY `id_tarea` (`id_tarea`);

--
-- Indices de la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_personal` (`id_personal`);

--
-- Indices de la tabla `horarioguardia`
--
ALTER TABLE `horarioguardia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_personal` (`id_personal`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nif` (`dni`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_falta` (`id_falta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cubrir`
--
ALTER TABLE `cubrir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `faltas`
--
ALTER TABLE `faltas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `horarioguardia`
--
ALTER TABLE `horarioguardia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cubrir`
--
ALTER TABLE `cubrir`
  ADD CONSTRAINT `cubrir_ibfk_1` FOREIGN KEY (`id_tarea`) REFERENCES `tareas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cubrir_ibfk_2` FOREIGN KEY (`id_falta`) REFERENCES `faltas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD CONSTRAINT `faltas_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horarioguardia`
--
ALTER TABLE `horarioguardia`
  ADD CONSTRAINT `horarioguardia_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`id_falta`) REFERENCES `faltas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Base de datos: `daw`
--
DROP DATABASE IF EXISTS `daw`;
CREATE DATABASE IF NOT EXISTS `daw` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `daw`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

DROP TABLE IF EXISTS `peliculas`;
CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `ejemplares` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `descripcion`, `ejemplares`) VALUES
(1, 'Pelicula 1', 'Una emocionante película de acción', 7),
(2, 'Pelicula 2', 'Una conmovedora película de drama', 5),
(3, 'Pelicula 3', 'Una divertida comedia familiar', 6),
(4, 'Pelicula 4', 'Un thriller de misterio intrigante', 4),
(5, 'Pelicula 5', 'Una película de ciencia ficción épica', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_alquiladas`
--

DROP TABLE IF EXISTS `peliculas_alquiladas`;
CREATE TABLE `peliculas_alquiladas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `peliculas_alquiladas`
--

INSERT INTO `peliculas_alquiladas` (`id`, `id_usuario`, `id_pelicula`) VALUES
(9, 1, 1),
(10, 1, 1),
(11, 1, 1),
(16, 1, 3),
(12, 1, 5),
(13, 1, 5),
(14, 1, 5),
(15, 1, 5),
(2, 2, 3),
(4, 3, 2),
(5, 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `clave`, `rol`) VALUES
(1, 'Usuario1', 'usuario1@example.com', 'clave1', 'Admin'),
(2, 'Usuario2', 'usuario2@example.com', 'clave2', 'User'),
(3, 'Usuario3', 'usuario3@example.com', 'clave3', 'User'),
(4, 'Usuario4', 'usuario4@example.com', 'clave4', 'User'),
(5, 'Usuario5', 'usuario5@example.com', 'clave5', 'User');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `peliculas_alquiladas`
--
ALTER TABLE `peliculas_alquiladas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`,`id_pelicula`),
  ADD KEY `id_pelicula` (`id_pelicula`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `peliculas_alquiladas`
--
ALTER TABLE `peliculas_alquiladas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas_alquiladas`
--
ALTER TABLE `peliculas_alquiladas`
  ADD CONSTRAINT `peliculas_alquiladas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peliculas_alquiladas_ibfk_2` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Base de datos: `phpmyadmin`
--
DROP DATABASE IF EXISTS `phpmyadmin`;
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

DROP TABLE IF EXISTS `pma__bookmark`;
CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

DROP TABLE IF EXISTS `pma__central_columns`;
CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

DROP TABLE IF EXISTS `pma__column_info`;
CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

DROP TABLE IF EXISTS `pma__designer_settings`;
CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Volcado de datos para la tabla `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"relation_lines\":\"true\",\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

DROP TABLE IF EXISTS `pma__export_templates`;
CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

DROP TABLE IF EXISTS `pma__favorite`;
CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

DROP TABLE IF EXISTS `pma__history`;
CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

DROP TABLE IF EXISTS `pma__navigationhiding`;
CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

DROP TABLE IF EXISTS `pma__pdf_pages`;
CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_nr`, `page_descr`) VALUES
('cesvm', 2, 'cesvm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

DROP TABLE IF EXISTS `pma__recent`;
CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"tienda\",\"table\":\"users\"},{\"db\":\"tienda\",\"table\":\"camisetas\"},{\"db\":\"tienda\",\"table\":\"migrations\"},{\"db\":\"tienda\",\"table\":\"ventas\"},{\"db\":\"cesvm\",\"table\":\"personal\"},{\"db\":\"cesvm\",\"table\":\"cubrir\"},{\"db\":\"cesvm\",\"table\":\"horarioguardia\"},{\"db\":\"cesvm\",\"table\":\"faltas\"},{\"db\":\"cesvm\",\"table\":\"tareas\"},{\"db\":\"cesvm\",\"table\":\"sms\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

DROP TABLE IF EXISTS `pma__relation`;
CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

DROP TABLE IF EXISTS `pma__savedsearches`;
CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

DROP TABLE IF EXISTS `pma__table_coords`;
CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- Volcado de datos para la tabla `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('cesvm', 'cubrir', 2, 725, 454),
('cesvm', 'faltas', 2, 725, 153),
('cesvm', 'horarioguardia', 2, 336, 551),
('cesvm', 'personal', 2, 335, 109),
('cesvm', 'sms', 2, 90, 29),
('cesvm', 'tareas', 2, 1069, 156);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

DROP TABLE IF EXISTS `pma__table_info`;
CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

DROP TABLE IF EXISTS `pma__table_uiprefs`;
CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'cesvm', 'cubrir', '{\"sorted_col\":\"`cubrir`.`id` DESC\"}', '2023-12-22 20:56:40'),
('root', 'cesvm', 'horarioguardia', '{\"sorted_col\":\"`horarioguardia`.`id` DESC\"}', '2023-12-20 17:25:35'),
('root', 'cesvm', 'tareas', '{\"sorted_col\":\"`tareas`.`id` ASC\"}', '2023-11-28 17:28:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

DROP TABLE IF EXISTS `pma__tracking`;
CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

DROP TABLE IF EXISTS `pma__userconfig`;
CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-02-05 17:32:55', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"es\",\"NavigationWidth\":201}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

DROP TABLE IF EXISTS `pma__usergroups`;
CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

DROP TABLE IF EXISTS `pma__users`;
CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `test`
--
DROP DATABASE IF EXISTS `test`;
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Base de datos: `tienda`
--
DROP DATABASE IF EXISTS `tienda`;
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camisetas`
--

DROP TABLE IF EXISTS `camisetas`;
CREATE TABLE `camisetas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `caracteristicas` varchar(255) NOT NULL,
  `precio` double NOT NULL,
  `stock` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `camisetas`
--

INSERT INTO `camisetas` (`id`, `marca`, `modelo`, `caracteristicas`, `precio`, `stock`, `descuento`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 'Classics', 'Camiseta clásica de manga corta.', 33, 10, 0, 'images/AdidasClassics.jpg', '2024-02-04 13:38:34', '2024-02-04 13:41:06'),
(3, 'Adidas', 'Premium', 'Camisa elegante de manga corta.', 100, 5, 15, 'images/AdidasPremium.jpg', '2024-02-04 13:42:28', '2024-02-04 13:42:28'),
(4, 'Adidas', 'Graphic', 'Camiseta violeta de manga corta.', 38, 15, 20, 'images/AdidasGraphic.jpg', '2024-02-04 17:57:30', '2024-02-04 17:57:30'),
(5, 'Adidas', 'SST', 'Camiseta gris oversized de manga corta.', 38, 1, 25, 'images/AdidasSST.jpg', '2024-02-04 18:01:10', '2024-02-04 18:01:10'),
(6, 'Nike', 'Hyverse', 'Camiseta de diseño azul.', 42.99, 0, 0, 'images/NikeHyverse.jpg', '2024-02-04 18:12:34', '2024-02-04 18:12:34'),
(7, 'Nike', 'Jordan', 'Camiseta para niño estilo Jordan.', 24.99, 3, 5, 'images/NikeJordan.jpg', '2024-02-04 18:15:04', '2024-02-04 18:15:04'),
(8, 'Nike', 'Pro', 'Camiseta de deporte de manga larga.', 39.99, 0, 0, 'images/NikePro.jpg', '2024-02-04 18:16:34', '2024-02-04 18:16:34'),
(9, 'Nike', 'Sportswear', 'Camiseta verde de manga corta.', 20.97, 30, 45, 'images/NikeSportswear.jpg', '2024-02-04 18:19:53', '2024-02-04 18:19:53'),
(10, 'Puma', 'Ferrari', 'Edición especial Ferrari de manga corta.', 30.95, 8, 30, 'images/PumaFerrari.jpg', '2024-02-04 18:28:27', '2024-02-04 18:28:27'),
(11, 'Puma', 'TheJoker', 'Edición especial TheJoker de manga corta.', 35, 10, 10, 'images/PumaTheJoker.jpg', '2024-02-04 18:29:26', '2024-02-04 18:29:26'),
(12, 'Puma', 'Mercedes', 'Edición especial Puma x Mercedes.', 30.95, 6, 10, 'images/PumaMercedes.jpg', '2024-02-05 13:34:28', '2024-02-05 13:34:28'),
(13, 'Puma', 'Basket', 'Camisa diseño basket de manga corta.', 20.95, 0, 0, 'images/PumaBasket.jpg', '2024-02-05 13:45:52', '2024-02-05 13:45:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_04_073350_create_camisetas_table', 1),
(6, '2024_02_04_073409_create_ventas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `nif` varchar(9) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `nif`, `direccion`, `telefono`, `is_admin`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Normal User', 'user@email.com', NULL, '$2y$10$CrdlsxXITrjXoVLkoITBYeUA6vs9nWvHJTOT2V5a1mBbCI6tbVlsC', NULL, '12345678A', 'C/Primera Nº1 30509 Llano de Molina (Murcia)', 611111111, 0, 0, '2024-02-04 07:16:49', '2024-02-05 18:45:08'),
(3, 'José Félix', 'josefelix.vidal.piqueras@ces-vegamedia.es', NULL, '$2y$10$BAT4WKBStvXj9/JMfIXNse9K.cOPTx6b8uMYs/Kh0y6602il4lqNK', NULL, '48751655G', 'C/La Viña Nº106 30509 Llano de Molina (Murcia)', 654950001, 0, 1, '2024-02-04 12:50:38', '2024-02-05 18:46:37'),
(4, 'Yifan Sun', 'yifan.sun@ces-vegamedia.es', NULL, '$2y$10$lG2/snwjuk6FDOEkrpnB.uvxuNyIj6P3BHkIpfKQwF1Tkij504cUi', NULL, '43567877F', 'C/Cervantes Nº16 30565 Torres de Cotillas (Murcia)', 625649822, 0, 0, '2024-02-04 12:58:29', '2024-02-05 16:37:10'),
(5, 'Admin User', 'admin@email.com', NULL, '$2y$10$Po4I9cubmorqde75UOXccekDoXej4N8d0DR1HbcQCNmiHGYtcA0cy', NULL, '12345678B', 'C/Segunda Nº2 30500 Molina de Segura (Murcia)', 622222222, 1, 1, '2024-02-04 17:39:22', '2024-02-05 16:30:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_camiseta` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) NOT NULL,
  `precio_venta` double NOT NULL,
  `descuento_venta` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `camisetas`
--
ALTER TABLE `camisetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nif_unique` (`nif`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ventas_id_camiseta_foreign` (`id_camiseta`),
  ADD KEY `ventas_id_user_foreign` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camisetas`
--
ALTER TABLE `camisetas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_id_camiseta_foreign` FOREIGN KEY (`id_camiseta`) REFERENCES `camisetas` (`id`),
  ADD CONSTRAINT `ventas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
