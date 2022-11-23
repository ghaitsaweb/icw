-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 10:50 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_request`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int(11) NOT NULL,
  `nama_cabang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `nama_cabang`) VALUES
(1, 'WR SUPRATMAN'),
(2, 'TUGU'),
(3, 'MAJAPAHIT'),
(4, 'BANTUL');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_25_112415_create_request_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_req` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pelapor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabang_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penyebab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permintaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `akibat` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chiefstore` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aktor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metode` text COLLATE utf8mb4_unicode_ci,
  `dll_penyebab` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dll_akibat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_approved` datetime DEFAULT NULL,
  `tgl_solved` datetime DEFAULT NULL,
  `tgl_close` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `no_req`, `pelapor`, `cabang_id`, `spk`, `penyebab`, `permintaan`, `akibat`, `status`, `chiefstore`, `aktor`, `metode`, `dll_penyebab`, `dll_akibat`, `tgl_approved`, `tgl_solved`, `tgl_close`, `created_at`, `updated_at`) VALUES
(66, 'REQ/02012020/00001', 'wr user', '1', '345678spk', '2', '321', '4', 'open', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 08:59:51', '2020-01-02 08:59:51'),
(67, 'REQ/02012020/00002', 'tugutes', '3', '345678spk', '2', 'parah', '4', 'open', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-02 09:47:16', '2020-01-02 09:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akibat`
--

CREATE TABLE `tb_akibat` (
  `id` int(5) NOT NULL,
  `akibat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akibat`
--

INSERT INTO `tb_akibat` (`id`, `akibat`) VALUES
(4, 'ertyu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyebab`
--

CREATE TABLE `tb_penyebab` (
  `id` int(5) NOT NULL,
  `penyebab` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyebab`
--

INSERT INTO `tb_penyebab` (`id`, `penyebab`) VALUES
(2, 'cucoklah'),
(3, 'data salah'),
(4, 'add'),
(5, 'kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cabang_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tandatangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `cabang_id`, `email`, `email_verified_at`, `password`, `hak_akses`, `tandatangan`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', '1', 'admin@gmail.com', NULL, '$2y$10$kvuKlG4RcAUDcCJGTQjuaeMthT43ZTvPwimP/CJ5hQ7JIPb2Ojak6', 'Helpdesk', '', NULL, '2019-12-26 19:19:16', '2019-12-26 19:25:08'),
(3, 'tes img', '1', 'tesimg@gmail.com', NULL, '$2y$10$c/wrr/zKp/uP2KvqANZ/6.Nafcxs009MJeW.AI96PlI.p9zXqDWd2', 'Helpdesk', 'C:\\xampp\\tmp\\phpEB25.tmp', NULL, '2019-12-26 19:56:45', '2019-12-26 19:56:45'),
(4, 'adi ramadiyanto', '1', 'adiramadiyanto@gmail.com', NULL, '$2y$10$7VYQ6UwbeVXLTw.ElHpXbeBy9Xlncyal0deCQJhIV8M7NTMGTCUBq', 'User', 'C:\\xampp\\tmp\\php7F49.tmp', NULL, '2019-12-26 20:17:02', '2019-12-26 20:17:02'),
(5, 'Chiefstore', '1', 'danzaerbow@gmail.com', NULL, '$2y$10$tdgZBKMNd52YMzRzrrgsoOUEyeETcL8Kae4Rv41qCfhXIodYdFPC2', 'Chiefstore', '1577416895.jpg', NULL, '2019-12-26 20:21:35', '2019-12-31 10:17:48'),
(7, 'useremail', '1', 'andriawan787@gmail.com', NULL, '$2y$10$.TnZ6OqYiyDyOmH5oDAA..aooQb9CAoVXzGfgycpZeprQ56VEsVQe', 'User', '1577419635.jpg', NULL, '2019-12-26 21:07:15', '2019-12-26 21:07:15'),
(8, 'Infra', '1', 'candrayen30@gmail.com', NULL, '$2y$10$V72gazbqs..2238/1wtvBufOyDYb4iru6jNKCxL8x/71y2cetluca', 'Infra', '1577436457.png', NULL, '2019-12-27 01:47:37', '2019-12-31 10:12:12'),
(9, 'helpdesk', '1', 'agungpriambodo30@gmail.com', NULL, '$2y$10$iWXEMV2MubH07sc5OzOhs.R7Ifse4D1dbBTGlZuOYMbU5ERdVuIqy', 'Helpdesk', '1577676348.jpg', NULL, '2019-12-29 20:25:48', '2019-12-31 10:15:40'),
(10, 'lilik', '1', 'liliksyukur@gmail.com', NULL, '$2y$10$XHzqT6dG.yoSXo5gqFU3ae7LdbpVntAZbMJYkjEjl/BACLm02SD1S', 'User', '1577676649.png', NULL, '2019-12-29 20:30:49', '2019-12-29 20:30:49'),
(11, 'Rnd', '1', 'fs.indraya@gmail.com', NULL, '$2y$10$B6/y4ifxKsquxO9fWq/5sO1psCZNeIf4QacgbBmb/YPEYQuPXVRwO', 'RnD', '1577677431.png', NULL, '2019-12-29 20:43:51', '2019-12-31 10:10:37'),
(12, 'yusuf', '2', 'yusuf@gmail.com', NULL, '$2y$10$lBGDbwS4RFfKxdZ5Q5d6JOVf.HorCJD9DRmR1Lq9JW86yM1QJYKM.', 'RnD', '1577696071.png', NULL, '2019-12-30 01:54:31', '2020-01-02 07:37:48'),
(13, 'amad', '1', 'amad@gmail.com', NULL, '$2y$10$VaU2Ro8b8ZaktY67zFxLEO4KofT4ref6n/NuXw5LuMcZ9TS9aZPZe', 'Infra', '1577696983.png', NULL, '2019-12-30 02:09:43', '2019-12-30 02:09:43'),
(14, 'lukman', '1', 'lukmanpegongsoran@gmail.com', NULL, '$2y$10$BKKcYCyR2rfjsJGLs0NPc.KD.67rtKVFbo7goCOVEBf4uPf.4MX52', 'Helpdesk', '1577699078.png', NULL, '2019-12-30 02:44:38', '2019-12-30 02:44:38'),
(15, 'yusuf', '1', 'yusuffkurniawan91@gmail.com', NULL, '$2y$10$TMNk6/aEAlwOUS1HiVN.NuJOuw32T/UNkF5jl47llNEUwTSz6oika', 'Chiefstore', '1577782331.png', NULL, '2019-12-31 08:52:11', '2019-12-31 08:52:11'),
(16, 'tes', '1', 'enemy@gmail.com', NULL, '$2y$10$OyyhICI.w07KHk6r.MzQ4uh/Fqx5GniHDLHzP9BGmGYdWasDWIpNO', 'Infra', '1577782879.png', NULL, '2019-12-31 09:01:19', '2019-12-31 09:01:19'),
(17, 'tes', '1', 'yusuff@gmail.com', NULL, '$2y$10$.CnP.wa2/yhnl9.Pxst.XOrO/a5XQjpTSt9RB29Eq96oJVGMpaoiO', 'Infra', '1577782963.png', NULL, '2019-12-31 09:02:43', '2019-12-31 09:02:43'),
(19, 'tugutes', '3', 'yusuff91@gmail.com', NULL, '$2y$10$C1VExTiygQZIhE2mr4Hab.zHu3bi9KFI78GC2O7aepsU8oP4N5b.e', 'User', '1577932293.png', NULL, '2020-01-02 02:31:33', '2020-01-02 02:31:33'),
(20, 'mjphttchifhefstore', '3', 'yusuffk91@gmail.com', NULL, '$2y$10$DV/t2dMIc2hXmkmnrXjU7ud6O3DP9ICD7BU/nw6LllASsO8RyOGfS', 'Chiefstore', '1577932334.png', NULL, '2020-01-02 02:32:14', '2020-01-02 02:53:54'),
(21, 'majapahit chefstore', '3', 'yusuffkur91@gmail.com', NULL, '$2y$10$Uz5xWdbczNJFOTJBaiUchuX7YlRmDV0TLVw8mYU3/GFgmbgLV8SZe', 'Chiefstore', '1577933786.png', NULL, '2020-01-02 02:56:26', '2020-01-02 02:56:26'),
(22, 'wr user', '1', 'wruser@gmail.com', NULL, '$2y$10$VDurVg8Yu7846rkTaBM9yuO0sGWvAPLBmzK.FdQ3PfM/CvfIva0li', 'User', '1577955123.png', NULL, '2020-01-02 08:52:03', '2020-01-02 08:52:03'),
(23, 'wrchiefstore', '1', 'wrchiefstore@gmail.com', NULL, '$2y$10$c6a45SAqCmXA8.XPGKQMZe3TQwQ/RjMzhEyqfMWGdKDoxNfmpHBgi', 'Chiefstore', '1577955155.png', NULL, '2020-01-02 08:52:35', '2020-01-02 08:52:35'),
(24, 'tuguuser', '2', 'tugu@gmail.com', NULL, '$2y$10$ENIPYDQuwUyfY0oL0O5PTuMACmCpvR63sMWINW9iFqUtU8WW0Tdf2', 'User', '1577955454.png', NULL, '2020-01-02 08:57:34', '2020-01-02 08:57:34'),
(25, 'tugu chiefstore', '2', 'tuguchiefstore@gmail.com', NULL, '$2y$10$dNXr3bgvB54wk4wmJ0rLmudhRrA6OXrsEQtfPVmyYjITgqD17RbLu', 'Chiefstore', '1577955519.png', NULL, '2020-01-02 08:58:39', '2020-01-02 08:58:39'),
(26, 'lukman', '4', 'infra@gmail.com', NULL, '$2y$10$EOZYnbRlrYXYWbxz0q70RObQ5KQpHw3nnBj6Dnle/64r8eprnn3oK', 'RnD', NULL, NULL, '2020-01-02 09:39:46', '2020-01-02 09:39:46'),
(27, 'lukman', '1', 'lukmaninfra@gmail.com', NULL, '$2y$10$mGwmN84UgNAsRqaCwrbyNuhTjgVSkS.Z/LuXt..6CI5XL9fQVho2O', 'Infra', '1577958281.png', NULL, '2020-01-02 09:44:41', '2020-01-02 09:45:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_akibat`
--
ALTER TABLE `tb_akibat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penyebab`
--
ALTER TABLE `tb_penyebab`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `tb_akibat`
--
ALTER TABLE `tb_akibat`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_penyebab`
--
ALTER TABLE `tb_penyebab`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
