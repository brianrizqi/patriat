-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 03:57 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekspatriat`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Adm dan Pergudangan', '2019-12-11 08:14:39', '2019-12-11 18:11:04', NULL),
(2, 'Keuangan', '2019-12-11 08:15:37', '2019-12-11 18:11:50', NULL),
(3, 'Personalia', '2019-12-15 00:51:54', '2019-12-15 00:51:54', NULL),
(4, 'Umum', '2019-12-15 00:52:02', '2019-12-15 00:52:02', NULL),
(5, 'Pemasaran', '2019-12-15 00:52:08', '2019-12-15 00:52:08', NULL),
(6, 'Produksi', '2019-12-15 00:52:12', '2019-12-15 00:52:12', NULL),
(7, 'Regional', '2019-12-15 00:52:20', '2019-12-15 00:52:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `division_details`
--

CREATE TABLE `division_details` (
  `id` int(11) NOT NULL,
  `division_a` int(11) NOT NULL,
  `division_b` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division_details`
--

INSERT INTO `division_details` (`id`, `division_a`, `division_b`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 3, '2019-12-15 00:54:09', '2019-12-15 00:54:09', NULL),
(4, 1, 4, '2019-12-15 00:54:20', '2019-12-15 00:54:20', NULL),
(5, 1, 5, '2019-12-15 00:54:27', '2019-12-15 00:54:27', NULL),
(6, 1, 7, '2019-12-15 00:54:32', '2019-12-15 00:54:32', NULL),
(7, 2, 4, '2019-12-15 01:00:08', '2019-12-15 01:00:08', NULL),
(8, 2, 5, '2019-12-15 01:00:16', '2019-12-15 01:00:16', NULL),
(9, 2, 6, '2019-12-15 01:00:23', '2019-12-15 01:00:23', NULL),
(10, 2, 7, '2019-12-15 01:00:34', '2019-12-15 01:00:34', NULL),
(11, 3, 6, '2019-12-15 01:01:17', '2019-12-15 01:01:17', NULL),
(12, 3, 7, '2019-12-15 01:01:25', '2019-12-15 01:01:25', NULL),
(13, 4, 5, '2019-12-15 01:01:46', '2019-12-15 01:01:46', NULL),
(14, 4, 6, '2019-12-15 01:01:54', '2019-12-15 01:01:54', NULL),
(15, 5, 7, '2019-12-15 01:02:38', '2019-12-15 01:02:38', NULL),
(16, 6, 6, '2019-12-15 01:03:01', '2019-12-15 01:03:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expatriates`
--

CREATE TABLE `expatriates` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expatriates`
--

INSERT INTO `expatriates` (`id`, `name`, `address`, `gender`, `email`, `username`, `password`, `phone`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Andrima', 'Jalan Jawa No 54 Jember', 'Perempuan', 'andrima10@gmail.com', 'andrima', 'andrima123', '089999120938', '2019-12-11 08:28:01', '2020-01-18 05:18:27', NULL),
(2, 'Cecilius', 'Jalan Jawa No 89 Jember', 'Perempuan', 'cecilius10@gmail.com', 'cecii', 'cecii123', '087723896292', '2019-12-13 23:23:17', '2020-01-18 05:19:35', NULL),
(3, 'Ambrosius', 'Jalan Kalimantan No 1', 'Laki-laki', 'ambrosius03@gmail.com', 'ambro', 'ambro123', '083984826481', '2019-12-16 06:03:32', '2020-01-18 06:21:51', NULL),
(4, 'Chokito', 'Jalan Jawa sumbersari no 2', 'Laki-laki', 'chokito76@gmail.com', 'choki', 'choki123', '083123456892', '2019-12-16 06:03:46', '2020-01-18 06:22:10', NULL),
(5, 'Fogi Erling', 'Jember Kaliwates No 1', 'Laki-laki', 'fogierlingga2@gmail.com', 'fogi', 'fogi123', '084129834568', '2019-12-16 06:04:09', '2020-01-18 06:22:27', NULL),
(6, 'Bram Storep', 'Jalan Sumatra no 2 Jember', 'Laki-laki', 'bramStr12@gmail.com', '', '', '087643456891', '2019-12-16 06:04:15', '2019-12-16 07:35:27', NULL),
(7, 'Bleecker', 'Jalan Jember No 12', 'Laki-laki', 'bleeckernoo@gmail.com', '', '', '083749797622', '2019-12-16 06:04:21', '2019-12-16 07:35:40', NULL),
(8, 'Devries', 'Jalan Baturaden No 2 Jember', 'Perempuan', 'devriess22@gmail.com', '', '', '089865366711', '2019-12-16 06:04:28', '2019-12-16 07:35:18', NULL),
(9, 'Citrase Syahbi', 'Jalan Riau No 35 Jember', 'Perempuan', 'expatriat9@gmail.com', '', '', '086743521678', '2019-12-16 06:04:34', '2019-12-16 07:35:01', NULL),
(10, 'Brilliant Agastia', 'Jalan Karimata No 10 Jember', 'Perempuan', 'agastiaaaa34@gmail.com', '', '', '0867732556120', '2019-12-16 06:04:41', '2019-12-16 07:29:23', NULL),
(11, 'Dewitt Omas', 'Jalan Jawa 4 No 2 Jember', 'Perempuan', 'dewittomas@gmail.com', '', '', '0798123768345', '2019-12-16 06:04:48', '2019-12-16 07:30:27', NULL),
(12, 'Shashanti', 'Patrang Jember', 'Perempuan', 'shasantii287@gmail.com', '', '', '0987675392812', '2019-12-16 06:04:54', '2019-12-16 07:31:24', NULL),
(13, 'Brian', 'Kaliurang Jember', 'Laki-laki', 'Briannn34@gmail.com', '', '', '089786453627', '2019-12-16 06:04:59', '2019-12-16 07:32:16', NULL),
(14, 'Ester Pradani', 'Jalan kalimantan 5 No 2 Jember', 'Perempuan', 'esterpradaa@gmail.com', '', '', '0897675234156', '2019-12-16 06:05:04', '2019-12-16 07:33:25', NULL),
(15, 'Alice rest', 'Jalan Mastrip No 2 Jember', 'Perempuan', 'aluceee5@gmail.com', '', '', '082635222689', '2019-12-16 06:05:10', '2019-12-18 10:07:43', NULL),
(16, 'Beatrix', 'Jalan Patrang No 16 Jember', 'Laki-laki', 'beatrix16@gmail.com', '', '', '654231957864', '2019-12-16 06:05:16', '2019-12-18 10:09:27', NULL),
(17, 'Eloise Saudi', 'Jalan kalimantan 17 Jember', 'Laki-laki', 'expatriat17@gmail.com', '', '', '008412345689', '2019-12-16 06:05:22', '2019-12-18 10:11:00', NULL),
(18, 'Greisy', 'Jalan Jawa 2 no 2 Jember', 'Perempuan', 'greisyyyy18@gmail.com', '', '', '136582345689', '2019-12-16 06:05:29', '2019-12-18 10:12:40', NULL),
(19, 'Brian Rizqi', 'Pondok Bedadung Indah Q8 Kebonsari, Sumbersari, Jember', 'Laki-laki', 'expatriat19@gmail.com', '162410101007', '123123123', '085231193649', '2020-02-04 04:12:20', '2020-02-04 04:12:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expatriate_details`
--

CREATE TABLE `expatriate_details` (
  `id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `expatriate_id` int(11) NOT NULL,
  `periode_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expatriate_details`
--

INSERT INTO `expatriate_details` (`id`, `division_id`, `expatriate_id`, `periode_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 1, '2019-12-11 08:47:27', '2019-12-11 17:44:00', NULL),
(2, 1, 8, 1, '2019-12-11 08:48:28', '2019-12-11 18:33:46', NULL),
(3, 1, 15, 1, '2019-12-16 06:09:45', '2019-12-16 06:09:45', NULL),
(4, 1, 7, 1, '2019-12-16 06:09:54', '2019-12-16 06:09:54', NULL),
(5, 1, 17, 1, '2019-12-16 06:09:58', '2019-12-16 06:09:58', NULL),
(6, 2, 2, 1, '2019-12-16 06:12:16', '2019-12-16 06:12:16', NULL),
(7, 2, 9, 1, '2019-12-16 06:12:23', '2019-12-16 06:12:23', NULL),
(8, 2, 16, 1, '2019-12-16 06:12:26', '2019-12-16 06:12:26', NULL),
(9, 2, 11, 1, '2019-12-16 06:12:32', '2019-12-16 06:12:32', NULL),
(10, 2, 6, 1, '2019-12-16 06:12:35', '2019-12-16 06:12:35', NULL),
(11, 3, 3, 1, '2019-12-16 06:12:52', '2019-12-16 06:12:52', NULL),
(12, 3, 10, 1, '2019-12-16 06:12:56', '2019-12-16 06:12:56', NULL),
(13, 3, 8, 1, '2019-12-16 06:13:02', '2019-12-16 06:13:02', NULL),
(14, 3, 13, 1, '2019-12-16 06:13:06', '2019-12-16 06:13:06', NULL),
(15, 3, 14, 1, '2019-12-16 06:13:10', '2019-12-16 06:13:10', NULL),
(16, 4, 4, 1, '2019-12-16 06:13:50', '2019-12-16 06:13:50', NULL),
(17, 4, 11, 1, '2019-12-16 06:13:53', '2019-12-16 06:13:53', NULL),
(18, 4, 1, 1, '2019-12-16 06:13:58', '2019-12-16 06:13:58', NULL),
(19, 4, 9, 1, '2019-12-16 06:14:02', '2019-12-16 06:14:02', NULL),
(20, 4, 12, 1, '2019-12-16 06:14:06', '2019-12-16 06:14:06', NULL),
(21, 5, 5, 1, '2019-12-16 06:14:20', '2019-12-16 06:14:20', NULL),
(22, 5, 12, 1, '2019-12-16 06:14:23', '2019-12-16 06:14:23', NULL),
(23, 5, 2, 1, '2019-12-16 06:14:26', '2019-12-16 06:14:26', NULL),
(24, 5, 15, 1, '2019-12-16 06:14:32', '2019-12-16 06:14:32', NULL),
(25, 5, 17, 1, '2019-12-16 06:14:36', '2019-12-16 06:14:36', NULL),
(26, 6, 6, 1, '2019-12-16 06:14:58', '2019-12-16 06:14:58', NULL),
(27, 6, 13, 1, '2019-12-16 06:15:04', '2019-12-16 06:15:04', NULL),
(28, 6, 4, 1, '2019-12-16 06:15:07', '2019-12-16 06:15:07', NULL),
(29, 6, 18, 1, '2019-12-16 06:15:11', '2019-12-16 06:15:11', NULL),
(30, 6, 3, 1, '2019-12-16 06:15:18', '2019-12-16 06:15:18', NULL),
(31, 7, 7, 1, '2019-12-16 06:15:28', '2019-12-16 06:15:28', NULL),
(32, 7, 14, 1, '2019-12-16 06:15:31', '2019-12-16 06:15:31', NULL),
(33, 7, 10, 1, '2019-12-16 06:15:35', '2019-12-16 06:15:35', NULL),
(34, 7, 5, 1, '2019-12-16 06:15:40', '2019-12-16 06:15:40', NULL),
(35, 7, 16, 1, '2019-12-16 06:15:44', '2019-12-16 06:15:44', NULL),
(37, 1, 19, 1, '2020-02-04 04:12:35', '2020-02-04 04:12:35', NULL),
(38, 7, 18, 1, '2020-02-05 06:55:13', '2020-02-05 06:55:13', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `periodes`
--

CREATE TABLE `periodes` (
  `id` int(11) NOT NULL,
  `month` varchar(191) NOT NULL,
  `year` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periodes`
--

INSERT INTO `periodes` (`id`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 'Januari - Juni', '2019', '2020-01-22 13:08:32', NULL),
(2, 'Juli - Desember', '2020', '2020-01-23 06:35:32', '2020-01-23 06:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ruang Rapat Gedung B', '2019-12-11 08:19:25', '2019-12-12 02:35:11', NULL),
(2, 'Ruang Rapat Gedung A', '2019-12-12 02:32:33', '2019-12-13 22:58:53', NULL),
(3, 'Ruang Rapat Gedung C', '2019-12-16 22:08:45', '2019-12-16 22:08:45', NULL),
(4, 'Aula Gedung A', '2019-12-16 22:09:04', '2019-12-16 22:09:04', NULL),
(5, 'Aula Gedung C', '2019-12-16 22:09:44', '2019-12-16 22:09:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedulings`
--

CREATE TABLE `schedulings` (
  `id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `periode_id` int(11) NOT NULL,
  `day` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `division_details`
--
ALTER TABLE `division_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_a` (`division_a`,`division_b`),
  ADD KEY `division_b` (`division_b`);

--
-- Indexes for table `expatriates`
--
ALTER TABLE `expatriates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expatriate_details`
--
ALTER TABLE `expatriate_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`,`expatriate_id`),
  ADD KEY `expatriate_id` (`expatriate_id`),
  ADD KEY `periode_id` (`periode_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedulings`
--
ALTER TABLE `schedulings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `division_id` (`division_id`,`place_id`),
  ADD KEY `place_id` (`place_id`),
  ADD KEY `periode_id` (`periode_id`);

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
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `division_details`
--
ALTER TABLE `division_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `expatriates`
--
ALTER TABLE `expatriates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `expatriate_details`
--
ALTER TABLE `expatriate_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedulings`
--
ALTER TABLE `schedulings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `division_details`
--
ALTER TABLE `division_details`
  ADD CONSTRAINT `division_details_ibfk_1` FOREIGN KEY (`division_a`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `division_details_ibfk_2` FOREIGN KEY (`division_b`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expatriate_details`
--
ALTER TABLE `expatriate_details`
  ADD CONSTRAINT `expatriate_details_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expatriate_details_ibfk_2` FOREIGN KEY (`expatriate_id`) REFERENCES `expatriates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expatriate_details_ibfk_3` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedulings`
--
ALTER TABLE `schedulings`
  ADD CONSTRAINT `schedulings_ibfk_1` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedulings_ibfk_2` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedulings_ibfk_3` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
