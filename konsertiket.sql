-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 02:40 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `konsertiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concerts`
--

CREATE TABLE `concerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `artis` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL DEFAULT 0,
  `kuota` int(11) NOT NULL,
  `kategori` enum('Festival','VIP','Presale') NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concerts`
--

INSERT INTO `concerts` (`id`, `judul`, `artis`, `waktu`, `lokasi`, `harga`, `kuota`, `kategori`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Konser id', 'Brandyn Aufderhar', '2025-07-31 04:13:56', 'Larsonside', 100000, 160, 'Presale', 'https://plus.unsplash.com/premium_photo-1681830630610-9f26c9729b75?q=80&w=1170&auto=format&fit=crop', '2025-06-19 23:56:53', '2025-06-21 05:12:36'),
(2, 'Konser eius', 'Mr. Brock Schumm', '2025-07-11 12:53:43', 'Trentonmouth', 100000, 272, 'Presale', '            https://images.unsplash.com/photo-1429962714451-bb934ecdc4ec?q=80&w=1170&auto=format&fit=crop\n', '2025-06-19 23:56:53', '2025-06-19 23:56:53'),
(3, 'Konser repellendus', 'Tomasa Kub', '2025-07-12 19:47:18', 'New Waylonport', 150000, 76, 'Festival', '            https://plus.unsplash.com/premium_photo-1664304095595-e428558e8161?q=80&w=1170&auto=format&fit=crop', '2025-06-19 23:56:53', '2025-06-19 23:56:53'),
(4, 'Konser sint', 'Mrs. Mellie Wehner', '2025-07-25 06:19:26', 'West Terence', 0, 375, 'Presale', '            https://images.unsplash.com/photo-1507901747481-84a4f64fda6d?q=80&w=1170&auto=format&fit=crop', '2025-06-19 23:56:53', '2025-06-19 23:56:53'),
(5, 'Konser suscipit', 'Elvie Heller', '2025-07-18 10:43:07', 'West Generalborough', 0, 76, 'VIP', '            https://images.unsplash.com/photo-1510682657356-6ee07db8204b?w=600&auto=format&fit=crop&q=60', '2025-06-19 23:56:53', '2025-06-19 23:56:53'),
(6, 'Konser fugiat', 'Judge Wolff', '2025-07-30 10:15:56', 'East Sam', 0, 159, 'VIP', '            https://images.unsplash.com/photo-1515175192010-cf3250992719?w=600&auto=format&fit=crop&q=60', '2025-06-19 23:56:53', '2025-06-19 23:56:53'),
(7, 'Konser illum', 'Claud Spinka', '2025-07-07 21:55:39', 'South Geovany', 0, 128, 'VIP', '            https://images.unsplash.com/photo-1501612780327-45045538702b?w=600&auto=format&fit=crop&q=60', '2025-06-19 23:56:53', '2025-06-19 23:56:53'),
(8, 'Konser autem', 'Prof. Toy Moen', '2025-08-19 00:18:27', 'New Mariannamouth', 150000, 465, 'VIP', '            https://plus.unsplash.com/premium_photo-1683121128953-9a7f08b82198?w=600&auto=format&fit=crop&q=60', '2025-06-19 23:56:53', '2025-06-21 05:16:14'),
(9, 'Konser officia', 'Wilfrid Hintz', '2025-08-02 11:28:09', 'West Robertotown', 0, 118, 'VIP', '            https://images.unsplash.com/photo-1486591978090-58e619d37fe7?w=600&auto=format&fit=crop&q=60', '2025-06-19 23:56:53', '2025-06-19 23:56:53'),
(10, 'Konser dicta', 'Terrell Lueilwitz Jr.', '2025-08-12 02:27:51', 'Wisozkport', 50000, 251, 'Festival', '            https://images.unsplash.com/photo-1573152958734-1922c188fba3?w=600&auto=format&fit=crop&q=60\"', '2025-06-19 23:56:53', '2025-06-19 23:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
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
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
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
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_20_075640_create_concert_table', 1),
(5, '2025_06_20_132934_add_gambar_to_concerts_table', 1),
(6, '2025_06_20_154510_create_ticket_orders_table', 1),
(7, '2025_06_20_221649_ticket_details', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8RF0njm5atZW9QiAboRFvKu00m1R6N734AEAqbNv', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUEFiVWtuR0ZBSGdtMU42am5QVkVqbXdtYVBUYVIyZzh3N3h1UFZKQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1750509605),
('HsMBs2ut6oYKixsWFZnIZxcUXqvEvGkfhs6nGZOZ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVkFnZzc0SDNqTVlOVXo4aUMwUzQ4Sm02S2xFM1ozMmY4SHJoRVdWNyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2JlbGktdGlrZXQiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2JlbGktdGlrZXQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1750481935),
('OsAVOgSXyz7hy0IzY9Ztz2h9F2vKGiWcoEWIwWJp', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOTd4RTRhMktwMFp5clBTQnFWM0dhQllaRzBpTVd6elhJM1Y5blVKWCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb25jZXJ0LzMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1750487253);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

CREATE TABLE `ticket_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_order_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_code` varchar(255) NOT NULL,
  `is_used` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_details`
--

INSERT INTO `ticket_details` (`id`, `ticket_order_id`, `ticket_code`, `is_used`, `created_at`, `updated_at`) VALUES
(14, 6, '1BFDA', 0, '2025-06-21 05:12:36', '2025-06-21 05:12:36'),
(15, 6, 'E0713', 0, '2025-06-21 05:12:36', '2025-06-21 05:12:36'),
(16, 7, '4449E', 0, '2025-06-21 05:16:14', '2025-06-21 05:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_orders`
--

CREATE TABLE `ticket_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `concert_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_orders`
--

INSERT INTO `ticket_orders` (`id`, `user_id`, `concert_id`, `nama_pemesan`, `email`, `jumlah_tiket`, `total_harga`, `created_at`, `updated_at`) VALUES
(6, 2, 1, 'FIRDAUS EKO NURYANTO', 'firdausekon@gmail.com', 2, 200000, '2025-06-21 05:12:36', '2025-06-21 05:12:36'),
(7, 2, 8, 'FIRDAUS EKO NURYANTO', 'firdausekon@gmail.com', 1, 150000, '2025-06-21 05:16:14', '2025-06-21 05:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-06-20 17:30:25', '$2y$12$Gel8Vgd6Jd3UY9pUZKqbxuvg5zb35nHpsNdRak8k3EBXO6PK9Dd.i', 'admin', 'qfzy0NCXdjhUJqUSaCOLtdWFk1om0VIZFnpdBtXAxMYvc3UgMH90YdfjzMfR', '2025-06-20 17:30:25', '2025-06-20 17:30:25'),
(2, 'FIRDAUS EKO NURYANTO', 'firdausekon@gmail.com', NULL, '$2y$12$NXFOsDPAFsaSp1Cy5tc2H.Lw4b7p6pK1ch.zQeb2e7WyuuaM4UNrC', 'user', NULL, '2025-06-20 17:31:36', '2025-06-20 17:31:36'),
(3, 'Yuli Rahmawati', 'yuli@gmail.com', NULL, '$2y$12$Vojv.WnxpCrMBxKwrL9v1.Ok2Acaf1oetgZR1x8OeZ2LWg0A0xMki', 'user', NULL, '2025-06-20 17:39:38', '2025-06-20 17:39:38');

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
-- Indexes for table `concerts`
--
ALTER TABLE `concerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_details_ticket_code_unique` (`ticket_code`),
  ADD KEY `ticket_details_ticket_order_id_foreign` (`ticket_order_id`),
  ADD KEY `ticket_details_ticket_code_index` (`ticket_code`);

--
-- Indexes for table `ticket_orders`
--
ALTER TABLE `ticket_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_orders_user_id_foreign` (`user_id`),
  ADD KEY `ticket_orders_concert_id_foreign` (`concert_id`);

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
-- AUTO_INCREMENT for table `concerts`
--
ALTER TABLE `concerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ticket_details`
--
ALTER TABLE `ticket_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ticket_orders`
--
ALTER TABLE `ticket_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD CONSTRAINT `ticket_details_ticket_order_id_foreign` FOREIGN KEY (`ticket_order_id`) REFERENCES `ticket_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ticket_orders`
--
ALTER TABLE `ticket_orders`
  ADD CONSTRAINT `ticket_orders_concert_id_foreign` FOREIGN KEY (`concert_id`) REFERENCES `concerts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
