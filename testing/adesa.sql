-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2023 at 03:34 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `car_make_id` bigint UNSIGNED NOT NULL,
  `car_model_id` bigint UNSIGNED NOT NULL,
  `fuel_type_id` int DEFAULT NULL,
  `auction_source` int NOT NULL DEFAULT '1',
  `transmission` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `car_make_id`, `car_model_id`, `fuel_type_id`, `auction_source`, `transmission`, `created_at`, `updated_at`) VALUES
(1, '118 ATTIVA', 1, 1, 1, 1, 'Automatic', '2023-02-26 02:50:41', '2023-02-26 02:50:41'),
(2, '120D M SPORT', 1, 1, 1, 1, 'Automatic', '2023-02-26 02:51:14', '2023-02-26 02:51:14'),
(3, '118D URBAN LINE', 1, 1, 1, 1, 'Manual', '2023-02-26 02:51:53', '2023-02-26 02:51:53'),
(4, 'ACTIVE TOURER 225I M SPORT', 1, 2, 2, 0, 'Automatic', '2023-02-26 02:53:53', '2023-02-26 02:53:53'),
(5, 'GRAN TOURER 216D ADVANTAGE', 1, 2, 1, 1, 'Automatic', '2023-02-26 02:55:30', '2023-02-26 02:55:30'),
(6, 'Orlando 2.0', 2, 10, 1, 1, 'Manual', '2023-02-26 03:47:23', '2023-02-26 03:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `car_makes`
--

CREATE TABLE `car_makes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_makes`
--

INSERT INTO `car_makes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BMW', '2023-02-24 02:49:03', '2023-02-24 02:49:03'),
(2, 'Chevrolet', '2023-02-24 02:49:34', '2023-02-24 02:49:34'),
(3, 'GMC', '2023-02-24 02:49:45', '2023-02-24 02:49:45'),
(4, 'Honda', '2023-02-24 02:50:01', '2023-02-24 02:50:01'),
(5, 'Suzuki', '2023-02-24 02:50:18', '2023-02-24 02:50:18'),
(6, 'Toyota', '2023-02-24 02:50:32', '2023-02-24 02:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id` bigint UNSIGNED NOT NULL,
  `car_make_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id`, `car_make_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '1 Series', '2023-02-24 03:16:31', '2023-02-24 03:16:31'),
(2, 1, '2 Series', '2023-02-24 03:17:26', '2023-02-24 03:17:26'),
(3, 1, '3 Series', '2023-02-24 03:17:42', '2023-02-24 03:17:42'),
(4, 1, '4 Series', '2023-02-24 03:17:49', '2023-02-24 03:17:49'),
(5, 1, '5 Series', '2023-02-24 03:17:56', '2023-02-24 03:17:56'),
(6, 1, 'Alpina B10', '2023-02-24 03:18:50', '2023-02-24 03:18:50'),
(7, 1, 'Alpina B12', '2023-02-24 03:18:59', '2023-02-24 03:18:59'),
(8, 1, 'Alpina D3', '2023-02-24 03:19:11', '2023-02-24 03:19:11'),
(9, 2, 'Captiva', '2023-02-24 03:19:38', '2023-02-24 03:19:38'),
(10, 2, 'Orlando', '2023-02-24 03:19:50', '2023-02-24 03:19:50'),
(11, 3, 'Acadia', '2023-02-24 03:21:55', '2023-02-24 03:21:55'),
(12, 3, 'Savana', '2023-02-24 03:22:07', '2023-02-24 03:22:07'),
(13, 4, 'Civic', '2023-02-24 03:22:33', '2023-02-24 03:22:33'),
(14, 4, 'CRV', '2023-02-24 03:22:45', '2023-02-24 03:22:45'),
(15, 4, 'Jazz', '2023-02-24 03:22:57', '2023-02-24 03:22:57'),
(16, 5, 'Alto', '2023-02-24 03:23:47', '2023-02-24 03:23:47'),
(17, 5, 'Swift', '2023-02-24 03:31:22', '2023-02-24 03:31:22'),
(18, 5, 'Vitara', '2023-02-24 03:32:05', '2023-02-24 03:32:05'),
(19, 6, 'ProAce', '2023-02-24 03:32:27', '2023-02-24 03:32:27'),
(20, 6, 'C-HR', '2023-02-24 03:32:44', '2023-02-24 03:32:44');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fuel_types`
--

CREATE TABLE `fuel_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fuel_types`
--

INSERT INTO `fuel_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Diesel', '2023-02-27 02:40:18', '2023-02-27 02:40:18'),
(2, 'Petrol', '2023-02-27 02:44:09', '2023-02-27 02:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_24_084920_create_car_makes_table', 1),
(7, '2023_02_24_092536_create_car_models_table', 2),
(8, '2023_02_26_081838_create_cars_table', 3),
(9, '2023_02_27_053602_create_fuel_types_table', 4);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_makes`
--
ALTER TABLE `car_makes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fuel_types`
--
ALTER TABLE `fuel_types`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car_makes`
--
ALTER TABLE `car_makes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuel_types`
--
ALTER TABLE `fuel_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
