-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2024 at 06:36 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logistics_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `status` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_supports`
--

CREATE TABLE `customer_supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_type` enum('received','sent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'received',
  `status` enum('pending','progress','active','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_supports`
--

INSERT INTO `customer_supports` (`id`, `user_id`, `parent_id`, `first_name`, `last_name`, `email`, `mobile_number`, `subject`, `message`, `support_type`, `status`, `created_at`, `updated_at`) VALUES
(3, 3, 0, 'suvan ', 'sahu', 'suvam@gmail.com', '8840086173', 'What is Lorem Ipsum?\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'received', 'pending', NULL, NULL),
(6, 1, 3, 'suvan', 'sahu', 'suvam@gmail.com', '8840086173', 'What is Lorem Ipsum?', 'aDAda DADADADAda', 'sent', 'progress', '2024-07-29 20:20:45', '2024-07-29 20:20:45'),
(7, 1, 0, 'sfsafsaf', 'safaf', 'mohdkaif984@gmail.com', '8004002312', NULL, 'eferwrwrwrrew', 'sent', 'progress', '2024-07-29 20:25:11', '2024-07-29 20:25:11'),
(8, 1, 0, 'Mohammad', 'kaif', 'mohdkaif984+2@gmail.com', '2342343222', 'TEST EMAIL TEST', 'TEST EMAIL TESTTEST EMAIL TESTTEST EMAIL TESTTEST EMAIL TESTTEST EMAIL TESTTEST EMAIL TESTTEST EMAIL TESTTEST EMAIL TESTTEST EMAIL TESTTEST EMAIL TESTTEST EMAIL TESTTEST EMAIL TESTTEST EMAIL TEST', 'sent', 'progress', '2024-07-30 04:32:17', '2024-07-30 04:32:17'),
(9, 1, 0, 'Mohammad', 'kaif', 'mohdkaif984+2@gmail.com', '2244244122', 'saddadasdad', 'asdasdaddsadasd', 'sent', 'progress', '2024-07-30 04:33:37', '2024-07-30 04:33:37'),
(10, 1, 0, 'Mohammad', 'kaif', 'mohdkaif984@gmail.com', '424', 'asddaDAA', 'ADDDADADAd', 'sent', 'progress', '2024-07-30 04:39:54', '2024-07-30 04:39:54'),
(11, 1, 9, 'Mohammad', 'kaif', 'mohdkaif984+2@gmail.com', '2244244122', 'saddadasdad', 'rePLIED asdasdaddsadasdasdasdaddsadasdasdasdaddsadasd asdasdaddsadasdasdasdaddsadasd', 'sent', 'active', '2024-07-30 04:41:34', '2024-07-30 04:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `db_backups`
--

CREATE TABLE `db_backups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) NOT NULL DEFAULT 0,
  `minute` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_week` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `backup_period` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','success','failed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs_queues`
--

CREATE TABLE `jobs_queues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jobs` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `queue_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`queue_data`)),
  `status` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT 0,
  `deleted_at` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_05_13_151021_create_activity_logs_table', 1),
(2, '2022_05_13_151021_create_db_backups_table', 1),
(3, '2022_05_13_151021_create_failed_jobs_table', 1),
(4, '2022_05_13_151021_create_jobs_queues_table', 1),
(5, '2022_05_13_151021_create_jobs_table', 1),
(6, '2022_05_13_151021_create_users_table', 1),
(7, '2024_07_29_221808_create_table_orders', 1),
(10, '2024_07_29_221951_create_table_customer_support', 2),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 0,
  `pickup_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pickup_date_time` timestamp NULL DEFAULT NULL,
  `delivery_date_time` timestamp NULL DEFAULT NULL,
  `status` enum('dispatched','inactive','pending','in_transit','cancelled','out_for_delivery') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `pickup_address`, `delivery_address`, `size`, `weight`, `pickup_date_time`, `delivery_date_time`, `status`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'Bengaluru', 'Delhi', 'Big', '100kg', '2024-07-29 17:34:47', '2024-07-31 17:34:47', 'dispatched', 1, NULL, '2024-07-29 18:18:47'),
(2, 4, 'Mumbai', 'Agra', 'Medium', '200kg', '2024-07-29 17:34:47', '2024-07-31 17:34:47', 'in_transit', 0, NULL, NULL),
(3, 4, 'Lucknow', 'Patna', 'Medium', '200kg', '2024-07-29 17:34:47', '2024-07-31 17:34:47', 'in_transit', 0, NULL, NULL),
(4, 5, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', 0, '2024-07-30 15:11:22', '2024-07-30 15:11:22');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(5, 'App\\User', 5, 'auth_token', '471c5cf1c74359eba27b754fc829f302d608f0816cc9d4732f996c46984f7cbd', '[\"*\"]', '2024-07-30 15:17:22', NULL, '2024-07-30 15:08:49', '2024-07-30 15:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` tinyint(1) NOT NULL DEFAULT 0,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_auth` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `otp` int(10) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `mobile_number`, `profile_image`, `role`, `email_verified_at`, `password`, `two_factor_auth`, `otp`, `remember_token`, `status`, `created_by`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mohd', 'kaif', 'mohdkaif984@gmail.com', '8840086174', NULL, 'admin', 1, '$2y$10$Jrx9OZJ4tcmb0.4uRqVr9.EhhUUVn2mP2b5yBv5DMqcP0k1tevhX6', 'false', NULL, '4eF7i6lVea704zL3xnOJkeOaEbiBMK1jqofHecf4ykVqPLZ4pVT57FYrhn1J', 'active', 0, 0, NULL, '2024-07-29 17:06:35', '2024-07-30 04:06:01'),
(2, 'Mohd', 'Admin', 'admin@gmail.com', '8840086175', NULL, 'admin', 1, '$2y$10$Jrx9OZJ4tcmb0.4uRqVr9.EhhUUVn2mP2b5yBv5DMqcP0k1tevhX6', 'false', NULL, NULL, 'active', 0, 0, NULL, '2024-07-29 17:06:35', '2024-07-29 18:35:20'),
(3, 'sadsada', 'asdad', 'mohdkaif98a@gmail.com', '8840086112', NULL, 'admin', 0, '$2y$10$WJnIeMnhh6ot.0L6hWa7QeC6df8HTVGu8bToBRW8RTKOb8zz1LGCe', 'false', NULL, 'JN0kYwth0f4d0lFSyayaMtWjTZTjdcYGXwuGulvPHGXi5p4NiGgZILQlAReW', 'pending', 1, 1, '2024-07-29 18:35:14', '2024-07-29 18:24:12', '2024-07-29 18:35:14'),
(4, 'Mohammad', 'kaif', 'mohdkaif984+1@gmail.com', NULL, NULL, 'admin', 0, '$2y$10$B.9lrrLRFuumGcdOBJl0KeStcjT0eCeTc2QyxRlrXr24tt2luVrn6', 'false', NULL, 'ieTKBrbIlF4oAzDZBOrMSKXB8cBCUmEzj1SMlJvvu4hklBC4CGJUcRu9eZiC', 'pending', 1, 1, NULL, '2024-07-30 04:23:08', '2024-07-30 04:23:08'),
(5, NULL, NULL, 'john@example.com', NULL, NULL, NULL, 0, '$2y$10$Dk.Ti32oAoQVp/c6HcctZ.CHypwRbshFYSuAGngDfwUKHR1/mbF9e', 'false', NULL, NULL, 'pending', 0, 0, NULL, '2024-07-30 14:18:08', '2024-07-30 14:18:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `causer` (`causer_id`,`causer_type`),
  ADD KEY `subject` (`subject_id`,`subject_type`),
  ADD KEY `activity_logs_log_name_index` (`log_name`);

--
-- Indexes for table `customer_supports`
--
ALTER TABLE `customer_supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_backups`
--
ALTER TABLE `db_backups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `jobs_queues`
--
ALTER TABLE `jobs_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_supports`
--
ALTER TABLE `customer_supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `db_backups`
--
ALTER TABLE `db_backups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs_queues`
--
ALTER TABLE `jobs_queues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
