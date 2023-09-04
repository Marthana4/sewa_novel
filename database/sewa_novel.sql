-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 04, 2023 at 02:40 PM
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
-- Database: `sewa_novel`
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
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2023_09_01_152103_create_novels_table', 1),
(18, '2023_09_01_152439_create_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `novels`
--

CREATE TABLE `novels` (
  `id_novel` bigint(20) UNSIGNED NOT NULL,
  `nama_novel` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `tgl_cetak` date NOT NULL,
  `deskripsi_novel` varchar(255) NOT NULL,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `novels`
--

INSERT INTO `novels` (`id_novel`, `nama_novel`, `penulis`, `tgl_cetak`, `deskripsi_novel`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Ayat-ayat Cinta', 'Habiburrahman El Shirazy', '2004-12-01', 'Sebuah novel mega best seller Indonesia yang sangat fenomenal. Peraih penghargaan Novel Fiksi Dewasa terbaik tahun 2006. Difilmkan tahun 2008 dan menjadi box office.', 1, '2023-09-03 16:10:19', 0, NULL),
(2, 'Dilan', 'Pidi Baiq', '2014-04-14', 'Siapa tak kenal Dilan? Salah satu novel terlaris karya Pidi Baiq, Novel Dilan bercerita tentang seorang remaja sekolah menengah atas (SMA) dan anggota geng motor di Bandung yang memiliki cara unik dalam mengambil hati wanita yang disukainya.', 1, '2023-09-03 16:12:44', 0, NULL),
(3, '11:11', 'Fiersa Besari', '2018-11-04', 'Novel berjudul 11:11 bisa dibilang begitu identik dengan ungkapan “jodoh enggak akan ke mana.” Buku ini menegaskan bahwa setiap orang sudah ditakdirkan dengan jodohnya masing-masing, dan waktunya akan tiba.', 1, '2023-09-03 16:13:55', 0, NULL),
(4, 'Bumi Manusia', 'Pramoedya Ananta Toer', '2011-07-26', 'Menceritakan perjalanan seorang anak manusia berdarah pribumi dengan seluk beluk Eropa, Minke. Kisah  yang bermula dari dunia pendidikan di sekolah HBS, sekolah bagi kaum totok atau Indo, atau si pribumi yang berkedudukan yang cukup tinggi.', 1, '2023-09-03 16:17:47', 0, NULL),
(5, 'Mariposa', 'Luluk H.F', '2018-03-21', 'Secara garis besar, novel ini menceritakan perjuangan seorang gadis Acha dalam mengejar cinta seorang lelaki yang sulit didekati layaknya kupu-kupu.', 1, '2023-09-03 16:26:48', 0, NULL);

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
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_novel` bigint(20) UNSIGNED NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id_transaksi`, `id`, `id_novel`, `tgl_jatuh_tempo`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 4, '2023-09-10', 'dipinjam', 1, '2023-09-03 16:28:27', 0, NULL),
(2, 3, 2, '2023-09-10', 'dikembalikan', 3, '2023-09-03 16:30:53', 1, '2023-09-03 16:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','penyewa') NOT NULL,
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_by` bigint(20) NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `no_hp`, `email`, `username`, `password`, `role`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Martha', '085606901022', 'admin@sewanovel.id', 'Administrator', '$2y$10$17cWEb.so3UrFKDN7LthiOZ1obcYplfBYot9SfZMEcArwTNubX79.', 'admin', 0, '2023-09-03 16:05:31', 0, '2023-09-03 16:05:31'),
(2, 'Martha Nadiva', '085606901011', 'marthanadivafajriani@gmail.com', 'Marthanadiva', '$2y$10$tmGSp8ik2LksulESWfIvOu5UFItDm5p9k/GsaPV19pU3jMbp0lbaO', 'penyewa', 0, '2023-09-03 16:21:50', 0, NULL),
(3, 'Angelica Stefanny', '081290567088', 'angelica@gmail.com', 'angelicastep', '$2y$10$gehaBFeO3MKv3V5zsodiG.ogIxqyoNMPDXBj8MYcX06BlY0uiyOsS', 'penyewa', 0, '2023-09-03 16:22:40', 0, NULL),
(4, 'Noval Rahman', '082176554323', 'novalrahman12@gmail.com', 'novalrahman12', '$2y$10$YmCXkGuoVGZIknFSm.ZB/.V3fFfFagAmyke8Gw5rHp/INhJA8Gckm', 'penyewa', 0, '2023-09-03 16:23:26', 0, NULL);

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
-- Indexes for table `novels`
--
ALTER TABLE `novels`
  ADD PRIMARY KEY (`id_novel`);

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
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `transaksis_id_foreign` (`id`),
  ADD KEY `transaksis_id_novel_foreign` (`id_novel`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `novels`
--
ALTER TABLE `novels`
  MODIFY `id_novel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaksis_id_novel_foreign` FOREIGN KEY (`id_novel`) REFERENCES `novels` (`id_novel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
