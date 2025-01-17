-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql57_container
-- Generation Time: Jan 17, 2025 at 12:39 PM
-- Server version: 5.7.44
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devis`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, 'wassim', 'eheller@example.com', '2025-01-16 13:32:08', '2025-01-16 22:02:22'),
(2, 'Miss Janet Muller', 'aida.lockman@example.com', '2025-01-16 13:32:08', '2025-01-16 13:32:08'),
(3, 'Prof. Keegan Lubowitz', 'arvid.pfannerstill@example.net', '2025-01-16 13:32:08', '2025-01-16 13:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `object` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `reference_number`, `client_id`, `invoice_date`, `total_amount`, `created_at`, `updated_at`, `object`, `responsable`) VALUES
(15, 'MAK/MAB/LB/180/2024/', 3, '2025-01-17', 1410.00, '2025-01-17 11:39:33', '2025-01-17 11:39:33', 'PRELEVEMENTS ET ANALYSES DES EAUX DESTINEES A LA CONSOMMATION HUMAINE', 'Wassim');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_items`
--

CREATE TABLE `invoice_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_items`
--

INSERT INTO `invoice_items` (`id`, `invoice_id`, `product_id`, `quantity`, `unit_price`, `total_price`, `created_at`, `updated_at`) VALUES
(42, 15, 23, 1, 300.00, 300.00, '2025-01-17 11:39:33', '2025-01-17 11:39:33'),
(43, 15, 38, 1, 250.00, 250.00, '2025-01-17 11:39:33', '2025-01-17 11:39:33'),
(44, 15, 41, 1, 250.00, 250.00, '2025-01-17 11:39:33', '2025-01-17 11:39:33'),
(45, 15, 49, 1, 60.00, 60.00, '2025-01-17 11:39:33', '2025-01-17 11:39:33'),
(46, 15, 64, 1, 100.00, 100.00, '2025-01-17 11:39:33', '2025-01-17 11:39:33'),
(47, 15, 72, 1, 150.00, 150.00, '2025-01-17 11:39:33', '2025-01-17 11:39:33'),
(48, 15, 69, 1, 150.00, 150.00, '2025-01-17 11:39:33', '2025-01-17 11:39:33'),
(49, 15, 71, 1, 150.00, 150.00, '2025-01-17 11:39:33', '2025-01-17 11:39:33');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_01_16_131858_create_clients_table', 1),
(5, '2025_01_16_131858_create_invoices_table', 1),
(6, '2025_01_16_131858_create_products_table', 1),
(7, '2025_01_16_131859_create_invoice_items_table', 1),
(8, '2025_01_16_181634_responsable_table', 2),
(9, '2025_01_16_223445_add_object_and_responsable_to_invoices_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(23, 'Fluorures', 300.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(24, 'Couleur', 100.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(25, 'Clostridium sulfito-réducteurs', 60.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(26, 'Nitrates', 250.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(27, 'Chlorures', 130.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(28, 'Azote ammoniacal', 200.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(29, 'Coliformes totaux', 250.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(30, 'Hydrocarbures aromatiques polycycliques (HAP)', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(31, 'Chlore libre résiduel', 100.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(32, 'Fluorures', 300.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(33, 'Coliformes totaux', 250.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(34, 'Oxydabilité au permanganate', 300.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(35, 'Odeur', 100.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(36, 'Escherichia coli', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(37, 'Clostridium sulfito-réducteurs', 70.00, '2025-01-17 11:36:53', '2025-01-17 12:19:49'),
(38, 'Nitrates', 250.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(39, 'Chlorures', 130.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(40, 'Nitrates', 250.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(41, 'Coliformes totaux', 250.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(42, 'Hydrocarbures aromatiques polycycliques (HAP)', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(43, 'Métaux lourds par ICP (Al, As, Ba, Cd, CrT, Cu, Fe, Mn, Ni, Pb, Se, Zn, Co, Mo, Sb, Sn, V) + Mercure', 1500.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(44, 'Calcium', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(45, 'Nitrites', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(46, 'Odeur', 100.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(47, 'Chlorures', 130.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(48, 'TAC', 100.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(49, 'Clostridium sulfito-réducteurs', 60.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(50, 'Hydrocarbures aromatiques polycycliques (HAP)', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(51, 'TAC', 100.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(52, 'Odeur', 100.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(53, 'Oxygène dissous', 90.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(54, 'Hydrocarbures aromatiques polycycliques (HAP)', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(55, 'Analyses bactériologiques', 250.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(56, 'Nitrites', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(57, 'Hydrocarbures aromatiques polycycliques (HAP)', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(58, 'Saveur', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(59, 'Turbidité', 200.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(60, 'Escherichia coli', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(61, 'Germes totaux à 37°C', 60.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(62, 'Escherichia coli', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(63, 'Métaux lourds par ICP (Al, As, Ba, Cd, CrT, Cu, Fe, Mn, Ni, Pb, Se, Zn, Co, Mo, Sb, Sn, V) + Mercure', 1500.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(64, 'Chlore libre résiduel', 100.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(65, 'Nitrates', 250.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(66, 'Analyses physico-chimiques', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(67, 'Calcium', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(68, 'Entérocoques intestinaux', 60.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(69, 'Hydrocarbures aromatiques polycycliques (HAP)', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(70, 'TA', 90.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(71, 'TH', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(72, 'Saveur', 150.00, '2025-01-17 11:36:53', '2025-01-17 11:36:53'),
(73, 'Timothy Marquez', 667.03, '2025-01-17 12:21:47', '2025-01-17 12:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `responsable`
--

CREATE TABLE `responsable` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('rincJtD1oT0sj7nRhAYdmb609ugUgeTe5WLSXq4l', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiams4WEQ2Y09DUHhoQ01qa242ZjNCT1lwVkRLRGd5VjE3QmRiT00zTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1737117403);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wassim Ajbili', 'admin@gmail.com', NULL, '$2y$12$m0gm.q.Or7xgHRojgwUgG.m622PsmAxIY0jQKjLewOvYrLa3KxvNS', NULL, '2025-01-17 12:31:12', '2025-01-17 12:31:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_client_id_foreign` (`client_id`);

--
-- Indexes for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_items_invoice_id_foreign` (`invoice_id`),
  ADD KEY `invoice_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `responsable`
--
ALTER TABLE `responsable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `invoice_items`
--
ALTER TABLE `invoice_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `responsable`
--
ALTER TABLE `responsable`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice_items`
--
ALTER TABLE `invoice_items`
  ADD CONSTRAINT `invoice_items_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoice_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
