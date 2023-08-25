-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 04:38 AM
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
-- Database: `jasamu_id`
--

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(15, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2023_06_19_055151_create_sessions_table', 1),
(19, '2023_06_19_055344_create_sessions_table', 2),
(20, '2023_06_19_062146_create_services_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `category`, `price`, `image`, `contact`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Hijrah Media Grafika (Percetakan) ', 'Dokumen dan Percetakan', 1000.00, 'https://www.lalamove.com/hubfs/alat%20percetakan%20%281%29-1.jpg', '0852-7739-2005', 'Jl. Teuku Nyak Arief No.1C, Darussalam, Kec. Syiah Kuala, Kota Banda Aceh', '2023-06-18 23:50:35', '2023-06-18 23:50:35'),
(2, 'Sedot WC', 'Perawatan Rumah Tangga dan Gedung ', 50000.00, 'https://assets.hops.id/crop/0x0:0x0/750x500/webp/photo/2022/07/23/245022297.jpeg', '0813-6054-4440', 'Jl. Nyak Adam Kamil II, Neusu Aceh, Kec. Baiturrahman, Kota Banda Aceh', '2023-06-19 00:41:15', '2023-06-19 00:41:15'),
(3, 'Jasa Tukang Aceh', 'Perawatan Rumah Tangga dan Gedung ', 10000.00, 'https://sp-ao.shortpixel.ai/client/to_auto,q_glossy,ret_img,w_630,h_380/https://tempatwisatadibandung.info/wp-content/uploads/2022/03/Tukang-Sumur-Bor-di-Banda-Aceh-1-630x380.jpg', '0823-4098-1213', 'Sp, Jl. Soekarno-Hatta No.43,Lampeuneurut Gampong, Kec. Banda Raya, Kota Banda Aceh\n', '2023-06-20 03:48:32', '2023-06-20 03:48:32'),
(4, 'Aceh home cleaning (AHC)', 'Perawatan Rumah Tangga dan Gedung ', 10000.00, 'https://pr1.nicelocal.id/LtlVGV6JeANAauB3RTuirg/1120x700,q85/4px-BW84_n0QJGVPszge3NRBsKw-2VcOifrJIjPYFYkOtaCZxxXQ2eKB4R1E8iGFJ3akaAm0JYWg6qw9AF8hO9GD8EXnUhIJOh0KL6SCJre8K4BDdgmh5Q', '0823-6211-8856', 'Lrg. Kesehatan No.4, Geuceu Kayee Jato, Kec. Banda Raya, Kota Banda Aceh', '2023-06-20 06:15:08', '2023-06-20 06:15:08'),
(5, 'Jasa tukang bangunan segala bidang', 'Perawatan Rumah Tangga dan Gedung ', 200000.00, 'https://actionrewards.net/wp-content/uploads/2021/02/Berikut-Tugas-Yang-Dilakukan-Oleh-Jasa-Tukang-Bangunan.jpg', '0853-7180-5040', ' Lampeuneuen, Kec. Darul Imarah, Kabupaten Aceh Besar\n', '2023-06-20 06:17:17', '2023-06-20 06:17:17'),
(6, 'Tukang Cet Bangunan', 'Perawatan Rumah Tangga dan Gedung ', 350000.00, 'https://www.pinhome.id/blog/wp-content/uploads/2022/09/harga-jasa-pengecatan-rumah.jpg', '0852-7750-9414', 'Jl. Utama Gampong Lambung, Surien, Kec. Meuraxa, Kota Banda Aceh\n', '2023-06-20 06:19:58', '2023-06-20 06:19:58'),
(7, 'Tukang Las ', 'Perawatan Rumah Tangga dan Gedung ', 50000.00, 'https://tukanglasjogja.net/wp-content/uploads/2020/04/tukang-las-panggilan-di-jogja.jpg', '0821-1795-5593', 'Jl. Laksamana Malahayati, Baet, Baitussalam, Kabupaten Aceh Besar', '2023-06-20 06:21:21', '2023-06-20 06:21:21'),
(8, 'Kawan Pajak', 'Bisnis dan Ekonomi', 150000.00, 'https://bpkad.kuningankab.go.id/public/img/informasi/berita/1678728371_84107076d066800045a1.jpg', '0852-1021-9606', 'Jl. Seulanga No.11 A, Punge Jurong, Kec. Kuta Alam, Kota Banda Aceh', '2023-06-20 08:55:04', '2023-06-20 08:55:04'),
(9, 'Konsultan Murfa Surya Mahardika', 'Bisnis dan Ekonomi', 200000.00, 'https://siva.jsstatic.com/id/1125/images/photo/6734379.png', '0812-7516-993', 'Jl. T. Nyak Arief No. 160, Jeulingke, Lamgugob, Kec. Syiah Kuala, Kota Banda Aceh', '2023-06-20 09:07:25', '2023-06-20 09:07:25'),
(10, 'Jasa Pajak', 'Bisnis dan Ekonomi', 200000.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwxvaGa8FNBJH6ugzfGF61DwVtdkvfHELpnQ&usqp=CAU', '0852-1021-9606', 'Jl Sta johansyah, Jl. Seulawah agam No.25, Seutui, Kec. Baiturrahman, Kota Banda Aceh', '2023-06-20 09:11:17', '2023-06-20 09:11:17'),
(11, 'Akuntan Publik', 'Bisnis dan Ekonomi', 100000.00, 'https://www.quipper.com/id/blog/wp-content/uploads/2022/01/image-blog-profesi-akuntan-publik.webp', '0811-164-620', 'Jl. Cut Mutia desa No.39, Kp. Baru, Kec. Baiturrahman, Kota Banda Aceh', '2023-06-20 09:13:39', '2023-06-20 09:13:39'),
(12, 'Jasa bayar pajak STNK', 'Bisnis dan Ekonomi', 200000.00, 'https://www.blogotive.com/wp-content/uploads/2021/06/Biro-Jasa-STNK-Perpanjangan-bisa-tanpa-KTP.jpg', '0852-6042-6427', 'Jl. Moh. Jam Jl. Manggis No.05, Kp. Baru, Kec. Baiturrahman, Kota Banda Aceh', '2023-06-20 09:16:39', '2023-06-20 09:16:39'),
(13, 'Spa Jasa Bunda', 'Kesehatan dan Keuangan ', 175000.00, 'https://pr0.nicelocal.id/MzN5ts2C65vL4ElQTAZ72A/1120x700,q85/4px-BW84_n0QJGVPszge3NRBsKw-2VcOifrJIjPYFYkOtaCZxxXQ2WNvNsDRFDUrZbOiCG8rD8hX_9khcn7CWqPe_DoqduXtcLIEFYjFamPJ6OrEI3yNGg', '0812-6951-320', 'Lampasi Engking, Kec. Darul Imarah, Kabupaten Aceh Besar', '2023-06-20 09:19:46', '2023-06-20 09:19:46'),
(14, 'Jasa Pemasangan Gigi Palsu', 'Kesehatan dan Keuangan ', 300000.00, 'https://images.solopos.com/2022/08/harga-pasang-gigi-palsu.jpg', '0813-7738-3939', 'Jl. Llajr, Peurada, Kec. Syiah Kuala, Kota Banda Aceh', '2023-06-20 09:21:26', '2023-06-20 09:21:26'),
(15, 'Jasa Ambulance 24 jam', 'Kesehatan dan Keuangan ', 150000.00, 'https://kamboja.co.id/wp-content/uploads/2022/02/jasa-ambulance-jakarta.jpg', '0853-6273-8066', 'Seuremo, Kec. Indrapuri, Kabupaten Aceh Besar', '2023-06-20 21:30:05', '2023-06-20 21:30:05'),
(16, 'Pusat Alat Bantu Dengar', 'Kesehatan dan Keuangan ', 50000.00, 'https://kasoemhearingcenter.com/wp-content/uploads/2022/10/Pusat-Alat-Bantu-Dengar-Di-Malang-Kasoem-Hearing-Center.jpg', '0855-1837-276', 'Jl. T. Panglima Polem No.139, Peunayong, Kec. Kuta Alam, Kota Banda Aceh', '2023-06-20 21:31:46', '2023-06-20 21:31:46');

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
('KmsGj3ZEUd7hsIak9GIMIGPF8IO6I9mUGD7hi7L4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiT2tHRUE1dUhxeW5yTVYyblR4bFN6SFdidFRvcTZjUFNGbDc3R1lJQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZXJ2aWNlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkN1prUXNaY29ycUZ3RHMyRXNhQm81ZWRGM1JNT2FrTTJLMjdUWWFGQzd0cGN4OXJXZ20xWDYiO30=', 1687448458);

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
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Danial', 'danial.alfa2001@gmail.com', NULL, '$2y$10$7ZkQsZcorqFwDs2EsaBo5edF3RMOakM2K27TYaFC7tpcx9rWgm1X6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-18 23:30:24', '2023-06-20 09:24:38'),
(2, 'Admin', 'maulanar424@gmail.com', NULL, '$2y$10$6SAkEIZd6BETky3DhV6kxONlSgNt9B7GMwjOotcQ4tcf.7LdxC7dG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-06-18 23:58:42', '2023-06-18 23:58:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
