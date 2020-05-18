-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 18 mai 2020 à 21:24
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `locatoria`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Car equipment', '', 'car-equipement.jpg', NULL, NULL),
(2, 'Clothes', '', 'clothes.jpg', NULL, NULL),
(3, 'High-Tech/Multimedia', '', 'high-tech.jpg', NULL, NULL),
(4, 'Home-Made', '', 'home-made.jpg', NULL, NULL),
(5, 'House-equipment', '', 'house-equipment.jpg', NULL, NULL),
(6, 'Pets', '', 'pets.jpg', NULL, NULL),
(7, 'Services', '', 'services.jpg', NULL, NULL),
(8, 'Sport-equipment/Hobbies', '', 'sport-equipment.jpg', NULL, NULL),
(9, 'Vehicles', '', 'vehicule.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `commentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `itemphotos`
--

CREATE TABLE `itemphotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `photo_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `itemphotos`
--

INSERT INTO `itemphotos` (`id`, `item_id`, `photo_path`, `created_at`, `updated_at`) VALUES
(38, 14, '3/14/14_image_0_1589765330.jpg', '2020-05-18 01:28:50', '2020-05-18 01:28:50'),
(39, 14, '3/14/14_image_1_1589765330.jpg', '2020-05-18 01:28:50', '2020-05-18 01:28:50'),
(43, 16, '5/16/16_image_0_1589765447.jpg', '2020-05-18 01:30:47', '2020-05-18 01:30:47'),
(44, 16, '5/16/16_image_1_1589765447.png', '2020-05-18 01:30:47', '2020-05-18 01:30:47'),
(45, 17, '5/17/17_image_0_1589767650.jpg', '2020-05-18 02:07:30', '2020-05-18 02:07:30'),
(46, 17, '5/17/17_image_1_1589767650.jpg', '2020-05-18 02:07:31', '2020-05-18 02:07:31'),
(47, 18, '4/18/18_image_0_1589767811.png', '2020-05-18 02:10:11', '2020-05-18 02:10:11'),
(48, 19, '4/19/19_image_0_1589768093.jpg', '2020-05-18 02:14:53', '2020-05-18 02:14:53'),
(49, 20, '4/20/20_image_0_1589768131.jpg', '2020-05-18 02:15:32', '2020-05-18 02:15:32');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `dispo_starts` date NOT NULL,
  `dispo_ends` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `user_id`, `category_id`, `title`, `description`, `thumbnail_path`, `status`, `price`, `dispo_starts`, `dispo_ends`, `created_at`, `updated_at`) VALUES
(14, 3, 3, 'PC', 'high quality PC', '3/14/14_thumbnail.jpg', '0', 120000.00, '2020-05-19', '2020-05-31', '2020-05-18 01:28:50', '2020-05-18 01:28:50'),
(16, 5, 3, 'TV', 'High quality TV', '5/16/16_thumbnail.jpg', '0', 120000.00, '2020-06-01', '2020-06-28', '2020-05-18 01:30:46', '2020-05-18 01:30:47'),
(17, 5, 3, 'PC', 'High quality PC', '5/17/17_thumbnail.jpg', '0', 120000.00, '2020-05-20', '2020-05-30', '2020-05-18 02:07:29', '2020-05-18 02:07:31'),
(18, 4, 3, 'TV', 'Cool TV', '4/18/18_thumbnail.png', '1', 120000.00, '2020-05-28', '2020-05-31', '2020-05-18 02:10:10', '2020-05-18 02:10:11'),
(19, 4, 2, 'Clothe1', 'Very nice Clothe', '4/19/19_thumbnail.jpg', '1', 150.00, '2020-05-22', '2020-05-31', '2020-05-18 02:14:53', '2020-05-18 02:14:53'),
(20, 4, 3, 'TV', 'Cool Tv', '4/20/20_thumbnail.jpg', '0', 120000.00, '2020-05-19', '2020-05-24', '2020-05-18 02:15:31', '2020-05-18 02:15:31'),
(21, 4, 2, 'Clothe', 'Cool', '4/21/21_thumbnail.jpg', '0', 150.00, '2020-05-19', '2020-05-31', '2020-05-18 02:17:46', '2020-05-18 02:17:47');

-- --------------------------------------------------------

--
-- Structure de la table `item_premia`
--

CREATE TABLE `item_premia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `item_premia`
--

INSERT INTO `item_premia` (`id`, `item_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 17, 1, '2020-05-05 00:00:00', NULL),
(2, 20, 1, '2020-05-15 00:00:00', NULL),
(3, 21, 1, '2020-05-21 00:00:00', NULL),
(4, 16, 1, '2020-05-03 00:00:00', NULL),
(5, 14, 1, '2020-05-20 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_05_03_133232_create_items_table', 1),
(4, '2020_05_03_133436_create_comments_table', 1),
(5, '2020_05_03_133516_create_itemphotos_table', 1),
(6, '2020_05_03_133617_create_item_premia_table', 1),
(7, '2020_05_03_133818_create_reservations_table', 1),
(8, '2020_05_03_133921_create_favorites_table', 1),
(9, '2020_05_03_134037_create_categories_table', 1),
(10, '2020_05_03_153501_add_features_to_items', 1),
(11, '2020_05_03_153523_add_features_to_comments', 1),
(12, '2020_05_03_153551_add_features_to_itemphotos', 1),
(13, '2020_05_03_153610_add_features_to_item_premia', 1),
(14, '2020_05_03_153627_add_features_to_reservations', 1),
(15, '2020_05_03_153644_add_features_to_favorites', 1),
(16, '2020_05_03_153658_add_features_to_categories', 1),
(17, '2020_05_03_153816_add_features_to_users', 1),
(18, '2020_05_07_153210_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `user_owner_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `item_id`, `user_owner_id`, `status`, `total_price`, `date_start`, `date_end`, `created_at`, `updated_at`) VALUES
(1, 3, 19, 4, 1, 1650.00, '2020-05-20', '2020-05-30', '2020-05-18 15:33:56', '2020-05-18 15:34:31');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `picture`, `bio`, `phone`, `adresse`, `city`, `zip_code`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'ismail bouazza', '3/3_picture.jpg', 'hello', '0644333332', 'Boujarah', 'Tetouan', '93000', 'ismailbzz1998@gmail.com', NULL, '$2y$10$34UX/p1pn02s8W6NTmaz/uYOnYEV4X99F/6dv6YryKAompyPnlte6', 'JrUVQaI0S0xoEMo2sMmx4hO6KrZClVxcP0ZUHmTCA0Oh6hHztaFgabSDU64r', '2020-05-13 22:50:15', '2020-05-16 20:17:47', NULL),
(4, 'Mohamed touhami', '4/4_picture.jpg', 'hello everybody', '0655555555', 'hhhhhh', 'Tetouan', '93000', 'Admin@gmail.com', NULL, '$2y$10$RWx0mmjRFVLlge2i2Fe6Deo9Ap/oHz9EgM0bWINw0m0xFyfoPAMMq', NULL, '2020-05-14 01:11:40', '2020-05-14 15:12:21', NULL),
(5, 'Ayoub bouazza', '5/5_picture.jpg', 'hello everybody', '888888', 'Boujarah', 'Tetouan', '93000', 'ayoub@gmail.com', NULL, '$2y$10$4eeonD9B0uWZdPLmk31il.sOBXHrFDwQhDpyqGMksGQCFy.RDObie', NULL, '2020-05-16 20:44:13', '2020-05-16 20:44:13', NULL),
(6, 'Miss Catalina Romaguera IV', '6/6_picture.jpg', 'Veritatis qui et enim.', 'Quo ullam iusto eligendi excepturi.', 'Quasi enim expedita est dolores sequi officiis a.', 'Deleniti est distinctio iure deserunt nemo sed et aliquid.', 'Et consequatur eum et fuga.', 'zgleichner@example.org', '2020-05-16 20:46:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RhfVRQILiN7NlwNI9EQ2LwTieOuyMhQhzpoiJ7p4fAopASaKpfYdpjeHOqJk', '2020-05-16 20:46:27', '2020-05-16 20:47:08', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_user_id_item_id_unique` (`user_id`,`item_id`),
  ADD KEY `favorites_item_id_foreign` (`item_id`);

--
-- Index pour la table `itemphotos`
--
ALTER TABLE `itemphotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `itemphotos_item_id_foreign` (`item_id`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_user_id_foreign` (`user_id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

--
-- Index pour la table `item_premia`
--
ALTER TABLE `item_premia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_premia_item_id_foreign` (`item_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`),
  ADD KEY `reservations_item_id_foreign` (`item_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `itemphotos`
--
ALTER TABLE `itemphotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `item_premia`
--
ALTER TABLE `item_premia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `itemphotos`
--
ALTER TABLE `itemphotos`
  ADD CONSTRAINT `itemphotos_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `item_premia`
--
ALTER TABLE `item_premia`
  ADD CONSTRAINT `item_premia_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
