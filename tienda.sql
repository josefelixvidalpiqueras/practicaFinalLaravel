-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2024 a las 19:25:36
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
-- Base de datos: `tienda`
--
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
(1, 'Adidas', 'Classics', 'Camiseta clásica de manga corta.', 33, 10, 0, 'images/AdidasClassics.jpg', '2024-02-04 13:38:34', '2024-02-09 16:50:59'),
(3, 'Adidas', 'Premium', 'Camisa elegante de manga corta.', 100, 4, 15, 'images/AdidasPremium.jpg', '2024-02-04 13:42:28', '2024-02-08 22:51:17'),
(4, 'Adidas', 'Graphic', 'Camiseta violeta de manga corta.', 38, 13, 20, 'images/AdidasGraphic.jpg', '2024-02-04 17:57:30', '2024-02-09 17:00:52'),
(5, 'Adidas', 'SST', 'Camiseta gris oversized de manga corta.', 38, 1, 25, 'images/AdidasSST.jpg', '2024-02-04 18:01:10', '2024-02-04 18:01:10'),
(6, 'Nike', 'Hyverse', 'Camiseta de diseño azul.', 42.99, 0, 0, 'images/NikeHyverse.jpg', '2024-02-04 18:12:34', '2024-02-04 18:12:34'),
(7, 'Nike', 'Jordan', 'Camiseta para niño estilo Jordan.', 24.99, 2, 5, 'images/NikeJordan.jpg', '2024-02-04 18:15:04', '2024-02-08 18:05:46'),
(8, 'Nike', 'Pro', 'Camiseta de deporte de manga larga.', 39.99, 0, 0, 'images/NikePro.jpg', '2024-02-04 18:16:34', '2024-02-04 18:16:34'),
(9, 'Nike', 'Sportswear', 'Camiseta verde de manga corta.', 20.97, 30, 45, 'images/NikeSportswear.jpg', '2024-02-04 18:19:53', '2024-02-04 18:19:53'),
(10, 'Puma', 'Ferrari', 'Edición especial Ferrari de manga corta.', 30.95, 8, 30, 'images/PumaFerrari.jpg', '2024-02-04 18:28:27', '2024-02-04 18:28:27'),
(11, 'Puma', 'TheJoker', 'Edición especial TheJoker de manga corta.', 35, 10, 10, 'images/PumaTheJoker.jpg', '2024-02-04 18:29:26', '2024-02-04 18:29:26'),
(12, 'Puma', 'Mercedes', 'Edición especial Puma x Mercedes.', 30.95, 6, 10, 'images/PumaMercedes.jpg', '2024-02-05 13:34:28', '2024-02-05 13:34:28'),
(13, 'Puma', 'Basket', 'Camisa diseño basket de manga corta.', 20.95, 0, 0, 'images/PumaBasket.jpg', '2024-02-05 13:45:52', '2024-02-05 13:45:52'),
(14, 'Vans', 'Disney', 'Camiseta de manga corta edición Disney.', 40, 5, 30, 'images/1707435387.jpg', '2024-02-08 22:36:27', '2024-02-09 16:24:55'),
(15, 'Vans', 'Disney', 'Camiseta de manga corta edición Rock.', 38, 11, 30, 'images/1707435682.jpg', '2024-02-08 22:41:22', '2024-02-08 22:54:31'),
(16, 'Vans', 'Spidey', 'Camiseta de manga corta edición Spidey.', 38, 5, 50, 'images/1707435740.jpg', '2024-02-08 22:42:20', '2024-02-09 15:53:13'),
(17, 'Vans', 'Voltage', 'Camiseta de manga corta edición Voltage.', 38, 30, 0, 'images/1707435810.jpg', '2024-02-08 22:43:30', '2024-02-08 22:43:30');

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
(6, '2024_02_04_073409_create_ventas_table', 1),
(8, '2024_02_09_082203_create_noticias_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titular` varchar(255) NOT NULL,
  `cuerpo` varchar(1000) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titular`, `cuerpo`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Nike, la marca número 1 para la Gen Z en ropa y calzado', 'De acuerdo con la 46ª encuesta semestral Taking Stock With Teens de la firma de investigación de equidad Piper Sandler, Nike mantiene su posición como la marca preferida entre el público más joven en los Estados Unidos, tanto en ropa como en calzado.', 'images/NikeLogo.jpg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Adidas, la favorita de los argentinos', 'La firma alemana de indumentaria deportiva encabeza el ranking desde 2019, y superó a su principal competidor, Nike, que en años anteriores llegó a estar en el primer puesto, aunque en esta última edición ocupa el sexto lugar.', 'images/1707493200.jpeg', '2024-02-09 14:40:00', '2024-02-09 14:40:00'),
(3, 'VANS x DIME', 'Vans Skateboarding se enorgullece de anunciar su colaboración con Dime en una actualización de las Rowley XLT, uno de los modelos de archivo más populares de la marca, y la primera de una Serie de reediciones de los diseños Classics de Vans. El modelo estará disponible en la tienda efímera Vans x Dime Pop-Up, que se inaugurará en París el 29 de septiembre y permanecerá abierta hasta el 1 de octubre de 2023.', 'images/1707493801.jpg', '2024-02-09 14:50:01', '2024-02-09 14:50:01');

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
(3, 'José Félix', 'josefelix.vidal.piqueras@ces-vegamedia.es', NULL, '$2y$10$BAT4WKBStvXj9/JMfIXNse9K.cOPTx6b8uMYs/Kh0y6602il4lqNK', NULL, '48751655G', 'C/La Viña Nº106 30509 Llano de Molina (Murcia)', 654950001, 0, 1, '2024-02-04 12:50:38', '2024-02-07 14:39:37'),
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
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_camiseta`, `id_user`, `estado`, `precio_venta`, `descuento_venta`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'Entregado', 33, 0, '2024-02-08 16:32:32', '2024-02-08 16:32:32'),
(2, 4, 5, 'Entregado', 38, 20, '2024-02-08 16:32:32', '2024-02-08 16:32:32'),
(3, 3, 5, 'Entregado', 100, 15, '2024-02-08 16:32:32', '2024-02-08 16:32:32'),
(4, 3, 5, 'Entregado', 100, 15, '2024-02-08 16:32:32', '2024-02-08 20:43:03'),
(5, 3, 5, 'En envío', 100, 15, '2024-02-08 16:47:17', '2024-02-08 16:47:17'),
(6, 1, 5, 'En envío', 33, 0, '2024-02-08 16:55:18', '2024-02-08 16:55:18'),
(7, 10, 5, 'En envío', 30.95, 30, '2024-02-08 16:55:18', '2024-02-08 16:55:18'),
(8, 10, 5, 'En envío', 30.95, 30, '2024-02-08 16:55:18', '2024-02-08 16:55:18'),
(9, 9, 3, 'En envío', 20.97, 45, '2024-02-08 16:59:26', '2024-02-09 16:58:54'),
(10, 10, 3, 'En envío', 30.95, 30, '2024-02-08 16:59:26', '2024-02-09 16:59:11'),
(11, 7, 5, 'Preparando', 24.99, 5, '2024-02-08 18:05:46', '2024-02-08 18:05:46'),
(12, 14, 5, 'Preparando', 40, 30, '2024-02-08 22:51:17', '2024-02-08 22:51:17'),
(13, 3, 5, 'Preparando', 100, 15, '2024-02-08 22:51:17', '2024-02-08 22:51:17'),
(14, 15, 5, 'Preparando', 38, 30, '2024-02-08 22:54:31', '2024-02-08 22:54:31'),
(15, 16, 3, 'Preparando', 38, 50, '2024-02-09 15:53:13', '2024-02-09 15:53:13'),
(16, 14, 3, 'Preparando', 40, 30, '2024-02-09 16:24:55', '2024-02-09 16:24:55'),
(17, 4, 3, 'Preparando', 38, 20, '2024-02-09 16:24:55', '2024-02-09 16:24:55'),
(18, 4, 5, 'Preparando', 38, 20, '2024-02-09 17:00:52', '2024-02-09 17:00:52');

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
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
