-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 18-12-2018 a las 22:14:25
-- Versión del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.13-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_master`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Manga corta'),
(2, 'Tirantes'),
(3, 'Manga larga'),
(4, 'Sudaderas'),
(7, 'El Purete'),
(8, 'El purrete2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

CREATE TABLE `order_details` (
  `id` int(255) NOT NULL,
  `header_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `unidades` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_headers`
--

CREATE TABLE `order_headers` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `price` float(200,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `categorie_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `price` float(100,2) NOT NULL,
  `stock` int(255) NOT NULL,
  `offer` varchar(2) DEFAULT NULL,
  `created_at` date NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `categorie_id`, `name`, `description`, `price`, `stock`, `offer`, `created_at`, `image`) VALUES
(1, 1, 'Box Box supreme', 'Bluethooh Radio', 100.00, 20, NULL, '2018-12-02', 'jbl.jpg'),
(3, 7, 'Polo Cuero', 'Talla 15 For Men', 100.00, 20, NULL, '2018-12-02', 'polo.png'),
(18, 7, 'Vans Skate', 'Vans Skate 360', 1500.00, 20, NULL, '2018-12-15', 'vans.png'),
(19, 1, 'Camiseta Sport', 'Barcelona FC 2018', 120.00, 50, NULL, '2018-12-16', 'barca.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `profile`, `image`) VALUES
(1, 'Admin', 'Admin', 'admin@admin.com', '123', 'admin', NULL),
(2, 'Matias', 'Quevedo', 'matiasmartinezquevedo22@gmail.com', '$2y$04$LROO6d.KOkLOwf87e711xegoZY51vizFM620KibYNZTpOkidrrlmW', 'user', 'null'),
(3, 'Mati', 'Quevedo', 'm@gmail.com', '$2y$04$SleBzAUSrfP1NOWH6N6o7.yZw8jsSQhn7Sx0wrAILEnDUkLnU11DC', 'user', 'null'),
(4, 'Matiassd', 'Quevedos', 'matias22@gmail.com', '$2y$04$SUSqme7cPgfPctmDH0dCLuyxsmjZ4mfKEQgm0V3GfDZ7x/d8tCM2a', 'user', 'null'),
(8, 'Matias', 'Quevedo', 'matiasquevedo22@gmail.com', '$2y$04$BPxVSsYhJZ10SEukP4o0ee63U45kzHb.V9YMJMvmjsv7Kn/apG5sm', 'user', 'null'),
(9, 'Mati', 'Quevedo', 'mati@mati.com', '$2y$04$PqduU1WjJokIgtYtM2MXIOjiBDUfspQe9np27Bfa4C.hL8QWu1z3e', 'admin', 'null');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_details` (`header_id`),
  ADD KEY `fk_products_order_details` (`product_id`);

--
-- Indices de la tabla `order_headers`
--
ALTER TABLE `order_headers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_user` (`user_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_categorie` (`categorie_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `order_headers`
--
ALTER TABLE `order_headers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details` FOREIGN KEY (`header_id`) REFERENCES `order_headers` (`id`),
  ADD CONSTRAINT `fk_products_order_details` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `order_headers`
--
ALTER TABLE `order_headers`
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
