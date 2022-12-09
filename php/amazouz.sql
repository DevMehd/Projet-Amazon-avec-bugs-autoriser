-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 09 déc. 2022 à 14:45
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `amazouz`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `temp_id` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `temp_id`, `email`, `password`, `ip`) VALUES
(1, 'acb045d3911643e690b24efad6fdf8f828f58cdfbed2d3b3ae9d47fe52c40653702912b0b410b5b19fe43c0aaba638762a8e', 'mbourouih94@gmail.com', '$2y$12$KmMBgiC/mkOThglJOP35a.SSC4AAMeEn1c5OBoGvLVNMJFJ25MKhC', '::1');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'enceinte'),
(2, 'ecran'),
(3, 'chaise'),
(4, 'peripherique'),
(5, 'smartphone');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date_added` timestamp NULL DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL COMMENT 'customer_id = user_id buyer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `picture_file_name` varchar(100) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `price` float NOT NULL,
  `description` longtext CHARACTER SET utf8,
  `date_added` datetime DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `main_picture` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `promo` int(11) DEFAULT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `date_added`, `category_id`, `main_picture`, `promo`, `slug`, `stock`) VALUES
(51, 'JBL Flip 5 Portable Bluetooth Speaker', 79.99, 'Portable Bluetooth speaker with powerful sound and stunning design', '2022-12-07 14:38:34', 1, NULL, NULL, 'jbl-flip', 20),
(52, 'Bose SoundLink Color Bluetooth Speaker II', 111.99, 'Wireless Bluetooth connectivity for streaming music', NULL, 1, NULL, 45, 'bose-soundlink', 15),
(53, 'Sony SRS-XB12 Mini Bluetooth Speaker', 39.99, 'Extra bass and compact design for powerful sound', NULL, 1, NULL, NULL, 'sony-srs', 25),
(54, 'Ultimate Ears WONDERBOOM 2 Portable Bluetooth Speaker', 99.99, '360-degree sound and waterproof design', NULL, 1, NULL, NULL, 'ultimate-ears-wonderboom-2', 10),
(55, 'JBL Boombox 2 Portable Bluetooth Speaker', 399.99, 'Powerful sound with up to 24 hours of playtime', NULL, 1, NULL, NULL, 'jbl-boombox-2', 5),
(56, 'Bose SoundLink Revolve+ Portable Bluetooth Speaker', 299.99, 'Deep, loud, and immersive sound', NULL, 1, NULL, NULL, 'bose-soundlink-reveolve', 8),
(58, 'Anker Soundcore Motion+ Bluetooth Speaker', 149.99, 'Hi-Res Audio with enhanced bass and extended playtime', NULL, 1, NULL, NULL, 'anker-soundcore-motion', 20),
(59, 'Marshall Kilburn II Portable Bluetooth Speaker', 199.99, 'Vintage design with modern sound and up to 20 hours of playtime', NULL, 1, NULL, NULL, 'marshall-kilburn-ii', 10),
(60, 'Bose Portable Home Speaker', 349.99, '360-degree sound and built-in voice control with Amazon Alexa', NULL, 1, NULL, NULL, 'bose-portable-home', 7),
(61, 'LG 32-inch 720p Smart LED TV', 169.99, '720p HD resolution with smart functionality and built-in streaming apps', NULL, 2, NULL, NULL, 'lg-32-inch-samrt-led-tv', 10),
(62, 'Samsung 43-inch 4K Ultra HD Smart TV', 329.99, '4K Ultra HD resolution with smart functionality and built-in streaming apps', NULL, 2, NULL, NULL, 'samsung-43-inch-4k-ultra-hd', 5),
(63, 'VIZIO 50-inch 4K Ultra HD LED Smart TV', 269.99, '4K Ultra HD resolution with smart functionality and built-in streaming apps', NULL, 2, NULL, NULL, 'vizio-50-inch-4k-ultra-hd', 7),
(64, 'Insignia 39-inch 1080p Full HD Smart TV', 149.99, '1080p Full HD resolution with smart functionality and built-in streaming apps', NULL, 2, NULL, NULL, 'insignia-39-inch', 15),
(65, 'TCL 55-inch 4K Ultra HD Roku Smart TV', 429.99, '4K Ultra HD resolution with Roku smart functionality and built-in streaming apps', NULL, 2, NULL, NULL, 'tcl-55-inch-4k', 10),
(66, 'Sony 65-inch 4K Ultra HD Smart TV', 999.99, '4K Ultra HD resolution with smart functionality and built-in streaming apps', NULL, 2, NULL, NULL, 'sony-65-inch-4k', 5),
(67, 'Sharp 50-inch 4K Ultra HD Smart xc', 42.99, '4K Ultra HD resolution functionality and built-in streaming apps', NULL, 2, NULL, 70, 'sharp-50-inch-4k', 8),
(68, 'LG 49-inch 4K Ultra HD Smart TV', 399.99, '4K Ultra HD resolution with smart functionality and built-in streaming apps', NULL, 2, NULL, NULL, 'lg-49-inch-4k', 12),
(69, 'Samsung 55-inch 4K Ultra HD Curved Smart TV', 799.99, '4K Ultra HD resolution with curved screen and smart functionality', NULL, 2, NULL, NULL, 'samsung-55-inch-4k', 20),
(70, 'VIZIO 75-inch 4K Ultra HD LED Smart TV', 999.99, '4K Ultra HD resolution with smart functionality and built-in streaming apps', NULL, 2, NULL, NULL, 'vizio-75-inch-4k', 10),
(71, 'Flash Furniture HERCULES Series Big & Tall 400 lb. Rated Black Leather Office Chair', 109.99, 'Ergonomic office chair with 400 lb. weight capacity and adjustable lumbar support', NULL, 3, NULL, NULL, 'flash-furniture-hercules', 10),
(72, 'Serta Works Executive Office Chair', 259.99, 'Ergonomic office chair with memory foam cushions and adjustable lumbar support', NULL, 3, NULL, NULL, 'serta-works-executive', 5),
(73, 'AmazonBasics High-Back Executive Swivel Office Computer Desk Chair', 149.99, 'Ergonomic office chair with adjustable seat height and lumbar support', NULL, 3, NULL, NULL, 'amazon-basics-high-back', 7),
(74, 'Modway Articulate Ergonomic Mesh Office Chair', 199.99, 'Ergonomic office chair with breathable mesh back and adjustable lumbar support', NULL, 3, NULL, NULL, 'modway-articulate-ergonomic', 15),
(75, 'OFM Essentials Collection Racing Style Bonded Leather Gaming Chair', 199.99, 'Ergonomic gaming chair with adjustable lumbar support and armrests', NULL, 3, NULL, NULL, 'ofm-essentials-collection', 10),
(76, 'Herman Miller Aeron Task Chair', 999.99, 'Ergonomic office chair with adjustable lumbar support and PostureFit technology', NULL, 3, NULL, NULL, NULL, 5),
(77, 'La-Z-Boy Fairmont Big & Tall Executive Bonded Leather Office Chair', 379.99, 'Ergonomic office chair with 400 lb. weight capacity and adjustable lumbar support', NULL, 3, NULL, NULL, NULL, 8),
(78, 'Steelcase Leap Fabric Chair', 999.99, 'Ergonomic office chair with adjustable lumbar support and LiveBack technology', NULL, 3, NULL, NULL, NULL, 12),
(79, 'Ergohuman High Back Swivel Chair with Headrest', 999.99, 'Ergonomic office chair with adjustable lumbar support and headrest', NULL, 3, NULL, NULL, NULL, 20),
(80, 'Modway Edge Mesh Back and Black Vinyl Seat Office Chair', 179.99, 'Ergonomic office chair with adjustable lumbar support and armrests', NULL, 3, NULL, NULL, 'mod-way-edge-mesh-black-and-black', 10),
(81, 'Apple iPad Pro (12.9-inch, Wi-Fi, 64GB) - Silver (4th Generation)', 799.99, '12.9-inch iPad Pro with Wi-Fi and 64GB of storage in silver', NULL, 4, NULL, NULL, NULL, 10),
(82, 'Microsoft Surface Pro 7 – 12.3\" Touch-Screen - 10th Gen Intel Core i5 - 8GB Memory - 256GB SSD', 899.99, '12.3-inch Microsoft Surface Pro with 10th Gen Intel Core i5 processor and 8GB of memory', NULL, 4, NULL, NULL, 'microsoft-surface-pro-7', 5),
(83, 'HP 14 Laptop, Intel Core i5-1035G1, 8 GB SDRAM, 256 GB Solid-State Drive, Windows 10 Home (14-dq1038nr, Natural Silver)', 649.99, '14-inch HP laptop with Intel Core i5 processor and 8GB of memory', NULL, 4, NULL, NULL, NULL, 7),
(84, 'Lenovo Chromebook C340-11 Touch - 11.6\" - Celeron N4020 - 4 GB RAM - 32 GB eMMC', 199.99, '11.6-inch Lenovo Chromebook with touch screen and Intel Celeron N4020 processor', NULL, 4, NULL, NULL, NULL, 15),
(85, 'Samsung Galaxy Tab S6 Lite - 10.4\" - 64 GB - Wi-Fi - Oxford Gray', 329.99, '10.4-inch Samsung Galaxy Tab S6 Lite with 64GB of storage and Wi-Fi', NULL, 4, NULL, NULL, 'samsung-galaxy-tab-s6-lite', 10),
(86, 'Acer Predator Helios 300 Gaming Laptop, Intel i7-10750H, NVIDIA GeForce RTX 2060 6GB, 15.6\" Full HD 144Hz 3ms IPS Display, 16GB Dual-Channel DDR4, 512GB NVMe SSD, Wi-Fi 6, RGB Keyboard, PH315-53-72XD', 999.99, '15.6-inch Acer Predator gaming laptop with Intel i7 processor and NVIDIA GeForce RTX 2060 graphics card', NULL, 4, NULL, NULL, NULL, 5),
(87, 'Google Pixel 4a with 5G - Just Black - Unlocked - 128 GB', 499.99, 'Google Pixel 4a with 5G support and 128GB of storage in black', NULL, 4, NULL, NULL, NULL, 8),
(88, 'Apple Watch SE (GPS) - 44mm - Space Gray Aluminum Case with Black Sport Band', 279.99, 'Apple Watch SE with GPS and 44mm space gray aluminum case', NULL, 4, NULL, NULL, NULL, 12),
(89, 'Samsung Galaxy S20 FE 5G - 128GB - Cloud Navy - Unlocked', 699.99, 'Samsung Galaxy S20 FE with 5G support and 128GB of storage in cloud navy', NULL, 4, NULL, NULL, 'samsung-galaxy-s20-fe', 20),
(90, 'Amazon Fire HD 10 Tablet (10.1\" 1080p full HD display, 32 GB) - Black', 149.99, '10.1-inch Amazon Fire HD tablet with 32GB of storage and full HD display', NULL, 4, NULL, NULL, NULL, 10),
(91, 'Apple iPhone 12 Pro Max - 128GB - Pacific Blue - Unlocked', 999.99, '128GB iPhone 12 Pro Max with Pacific Blue finish and unlocked for all carriers', NULL, 5, NULL, NULL, NULL, 10),
(92, 'Samsung Galaxy S20+ 5G - 128GB - Cosmic Black - Unlocked', 799.99, '128GB Samsung Galaxy S20+ 5G with Cosmic Black finish and unlocked for all carriers', NULL, 5, NULL, NULL, 'samsung-galazy-s20+', 5),
(93, 'OnePlus 8 Pro - Onyx Black - Unlocked - 128 GB - 5G', 799.99, '128GB OnePlus 8 Pro with Onyx Black finish and 5G support', NULL, 5, NULL, NULL, 'oneplus-8-pro', 7),
(94, 'Google Pixel 5 - Just Black - Unlocked - 128GB', 699.99, '128GB Google Pixel 5 with Just Black finish and unlocked for all carriers', NULL, 5, NULL, NULL, NULL, 15),
(95, 'LG V60 ThinQ 5G - 128GB - Classy Blue - Unlocked', 699.99, '128GB LG V60 ThinQ 5G with Classy Blue finish and unlocked for all carriers', NULL, 5, NULL, NULL, 'lg-v60-thinq-5g', 10),
(96, 'Motorola Moto G Power - Unlocked - 64 GB - Marine Blue (US Warranty) - Verizon, AT&T, T-Mobile, Sprint, Boost, Cricket, Metro', 229.99, '64GB Motorola Moto G Power with Marine Blue finish and unlocked for all carriers', NULL, 5, NULL, NULL, 'motorola-moto-G', 8),
(97, 'Apple iPhone SE (2020) - 64GB - Black - Unlocked', 399.99, '64GB iPhone SE (2020) with black finish and unlocked for all carriers', NULL, 5, NULL, NULL, NULL, 12),
(98, 'OnePlus Nord N10 5G - 128GB - Midnight Ice - Unlocked', 399.99, '128GB OnePlus Nord N10 5G with Midnight Ice finish and unlocked for all carriers', NULL, 5, NULL, NULL, 'oneplus-nord-n10', 20),
(99, 'Google Pixel 4a - Just Black - Unlocked - 128 GB', 349.99, '128GB Google Pixel 4a with Just Black finish and unlocked for all carriers', NULL, 5, NULL, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL COMMENT 'value from 1 to 5',
  `comments` longtext COMMENT 'actual content or text user posted when user reviewed the product.',
  `date_added` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comments`, `date_added`) VALUES
(1, 1, 58, 4, 'REVIEWS Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dictum quam vel finibus hendrerit. Nam suscipit eu sapien ut porttitor. Curabitur eu egestas sapien, eu lobortis ipsum.', '2022-12-08 12:39:49'),
(2, 2, 51, 3, 'REVIEWS Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dictum quam vel finibus hendrerit. Nam suscipit eu sapien ut porttitor. Curabitur eu egestas sapien, eu lobortis ipsum. Fusce tortor felis, varius vitae suscipit vitae, consequat id massa. Phasellus tempor ante in fermentum ultrices. Etiam eu rhoncus magna.', '2022-12-08 12:39:49'),
(3, 13, 51, 4, 'REVIEWS Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dictum quam vel finibus hendrerit. Nam suscipit eu sapien ut porttitor. Curabitur eu egestas sapien, eu lobortis ipsum.', '2022-12-08 12:39:49'),
(4, 13, 52, 5, 'REVIEWS Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dictum quam vel finibus hendrerit. Nam suscipit eu sapien ut porttitor. Curabitur eu egestas sapien, eu lobortis ipsum. Fusce tortor felis, varius vitae suscipit vitae, consequat id massa. Phasellus tempor ante in fermentum ultrices. Etiam eu rhoncus magna.', '2022-12-08 12:39:49'),
(5, 13, 52, 2, 'REVIEWS Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dictum quam vel finibus hendrerit. Nam suscipit eu sapien ut porttitor. Curabitur eu egestas sapien, eu lobortis ipsum. Fusce tortor felis, varius vitae suscipit vitae, consequat id massa. Phasellus tempor ante in fermentum ultrices. Etiam eu rhoncus magna.', '2022-12-08 12:39:49'),
(6, 12, 52, 1, 'REVIEWS Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dictum quam vel finibus hendrerit. Nam suscipit eu sapien ut porttitor. Curabitur eu egestas sapien, eu lobortis ipsum.', '2022-12-08 12:39:49');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `type` enum('buyer','admin') DEFAULT NULL,
  `postal_address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `type`, `postal_address`) VALUES
(1, 'Kevin', 'kevin@example.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 'adresse 1 kevin', 'buyer', 'postal adresse 1 kevin'),
(2, 'Mehdi', 'mehdi@example.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5', 'adresse 1 mehdi', 'buyer', 'postal adresse 1 mehdi'),
(12, 'VONG KEVIN', 'vongkevin.c@gmail.com', '7e01d4a6a28659c5c0844f75c1e864ec5d09bca7d3d5a9b4c6a32dadf9e6296c', NULL, 'buyer', NULL),
(13, 'qwe qwe', 'qweqwe@gmail.com', '7e01d4a6a28659c5c0844f75c1e864ec5d09bca7d3d5a9b4c6a32dadf9e6296c', NULL, 'buyer', NULL),
(14, 'mehdi', 'mbourouih94@gmail.com', '852e0d5dca38c938fe86abaa2177c9ff759a4c349cca6cb750a802d39ef5f0c8', NULL, 'buyer', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id_fk_idx` (`customer_id`);

--
-- Index pour la table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_fk_idx` (`product_id`),
  ADD KEY `order_id_fk` (`order_id`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_idx` (`product_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id_fk_idx` (`category_id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk_idx` (`user_id`),
  ADD KEY `product_id_fk_idx` (`product_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customer_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `order_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `product_id_fk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
