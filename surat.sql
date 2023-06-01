-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2023 at 03:43 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisi`
--

CREATE TABLE `disposisi` (
  `id` bigint NOT NULL,
  `kepada` varchar(255) NOT NULL,
  `tenggat` date NOT NULL,
  `disposisi_kbnn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `disposisi_kabid` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` bigint NOT NULL,
  `surat_id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `disposisi`
--

INSERT INTO `disposisi` (`id`, `kepada`, `tenggat`, `disposisi_kbnn`, `disposisi_kabid`, `status`, `surat_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'JenderalSudimara', '2023-03-25', 'Hayolooo', 'Bisa Please!', 1, 4, 2, '2023-03-24 04:38:52', '2023-03-24 06:01:52'),
(6, 'Bapak Kabid', '2023-03-24', 'Disposisi ke kabids test rutess', 'cepet ya!! lama banget!', 1, 5, 2, '2023-03-24 06:05:18', '2023-04-02 03:26:34'),
(15, 's', '2023-04-06', 'a', NULL, 1, 5, 2, '2023-04-02 03:52:07', '2023-04-02 03:52:07'),
(22, 'ini van', '2023-04-04', 'tapi belum checkbox, aku', 'eww', 1, 17, 2, '2023-04-02 07:50:16', '2023-04-02 19:09:07'),
(42, 'P2M', '2023-04-04', 'ini van aku check 2', 'ini', 2, 16, 2, '2023-04-02 19:43:52', '2023-04-02 19:44:08'),
(43, 'Pemberantasan', '2023-04-04', 'ini van aku check 2', 'sssssserr', 2, 16, 2, '2023-04-02 19:43:52', '2023-04-02 19:44:20'),
(44, 'Pemberantasan', '2023-04-12', 'rawrr', 'rawrr jg', 2, 19, 2, '2023-04-09 17:15:11', '2023-04-09 17:15:19'),
(48, 'Pemberantasan', '2023-04-13', 'asdasd', NULL, 2, 2, 2, '2023-04-12 23:44:59', '2023-04-12 23:44:59'),
(49, 'Rehabilitasi', '2023-04-13', 'asdasd', NULL, 2, 2, 2, '2023-04-12 23:44:59', '2023-04-12 23:44:59'),
(52, 'Umum', '2023-04-27', 'Test aja bank', NULL, 1, 20, 2, '2023-04-29 23:52:33', '2023-04-29 23:52:33'),
(53, 'Pemberantasan', '2023-04-27', 'Test aja bank', NULL, 1, 20, 2, '2023-04-29 23:52:33', '2023-04-29 23:52:33'),
(54, 'Rehabilitasi', '2023-04-27', 'Test aja bank', NULL, 1, 20, 2, '2023-04-29 23:52:33', '2023-04-29 23:52:33'),
(55, 'P2M', '2023-05-02', 'Laksanakan!', 'Laksanakan untuk anggota P2M', 1, 21, 2, '2023-05-01 05:42:06', '2023-05-01 05:42:20'),
(56, 'Pemberantasan', '2023-05-02', 'Laksanakan!', NULL, 1, 21, 2, '2023-05-01 05:42:06', '2023-05-01 05:42:06'),
(57, 'Humas', '2023-05-02', 'Laksanakan!', NULL, 1, 21, 2, '2023-05-01 05:42:06', '2023-05-01 05:42:06');

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
-- Table structure for table `kepada_surat`
--

CREATE TABLE `kepada_surat` (
  `id` bigint NOT NULL,
  `surat_id` bigint NOT NULL,
  `pegawai_id` bigint NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kepada_surat`
--

INSERT INTO `kepada_surat` (`id`, `surat_id`, `pegawai_id`, `created_at`, `updated_at`) VALUES
(26, 58, 1, '2023-05-01 05:37:32', '2023-05-01 05:37:32'),
(27, 58, 8, '2023-05-01 05:37:32', '2023-05-01 05:37:32'),
(28, 63, 7, '2023-05-31 03:26:53', '2023-05-31 03:26:53');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama`, `nip`, `jabatan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Purge', '520192382112', 'Sekretaris', 'ASN', '2023-04-07 18:46:25', '2023-05-01 01:27:12'),
(7, 'Tuturu', NULL, 'Staff', 'Kontrak', '2023-04-30 22:27:20', '2023-04-30 22:27:20'),
(8, 'Tapaluna', NULL, 'Staff', 'Kontrak', '2023-05-01 01:26:29', '2023-05-01 01:26:29'),
(9, 'Tapanuli', '10847287173', 'Penyuluh Narkoba', 'ASN', '2023-05-01 01:27:03', '2023-05-01 01:27:03');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` bigint NOT NULL,
  `user_id` int NOT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bidang` varchar(255) NOT NULL,
  `no_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sifat` int DEFAULT NULL,
  `topik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sebagai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kepada` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `isilain` text,
  `kesimpulan` text,
  `tanggal_pelaksanaan` date DEFAULT NULL,
  `tempat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mulai` time DEFAULT NULL,
  `selesai` time DEFAULT NULL,
  `menimbang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `untuk` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `dasar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `status` int DEFAULT NULL,
  `tanggal_surat` date NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `user_id`, `kategori`, `bidang`, `no_surat`, `type`, `hal`, `sifat`, `topik`, `sebagai`, `kepada`, `isi`, `isilain`, `kesimpulan`, `tanggal_pelaksanaan`, `tempat`, `mulai`, `selesai`, `menimbang`, `untuk`, `dasar`, `status`, `tanggal_surat`, `created_at`, `updated_at`) VALUES
(58, 2, NULL, 'Bidang P2M Cegah', 'Sprin/001/III/KA/PM.00/2023/BNNP-BALI', 'Sprin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry.<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, '2023-05-01', '2023-05-01 05:34:25', '2023-05-02 01:02:28'),
(59, 2, 'Lain', 'Bidang Rehabilitasi', 'B/002/IV/Ka/KU.06.01/2023/BNNP-Bali', 'Biasa', 'Seminar Terbuka', 1, 'Taktaulah', 'Pemateri', 'Ir.Irianto S.Pd., M.Pd.', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 'Dengan demikian blabla', NULL, NULL, NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', '', '', 1, '2023-05-01', '2023-05-01 05:35:34', '2023-05-01 05:38:15'),
(60, 2, 'Undangan', 'Bidang Humas', 'B/003/ll/Ka/BU.00.00/2023/BNNP-Bali', 'Biasa', 'Nasabah Kita Bersama', 1, 'Taraktampolinn', 'Peserta', 'Jokowi Dodo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', NULL, NULL, '2023-05-17', 'BNDCC Nusa Dua', '11:00:00', NULL, '', '', '', 1, '2023-05-01', '2023-05-01 05:36:48', '2023-05-01 05:39:16'),
(61, 2, 'Lain', 'Bidang P2M Pemberdayaan Masyarakat', 'B/004/II/KA/PM.01/2023/BNNP-Bali', 'Biasa', 'Tarataktul', NULL, NULL, 'Pemateri', 'Bidang Masyarakat', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500sasdmnbasmnbd mnabsmdnbamns', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', NULL, NULL, NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s<br />\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '', '', 1, '2023-05-03', '2023-05-02 00:52:35', '2023-05-02 00:52:35'),
(62, 2, 'Undangan', 'Bidang P2M Pemberdayaan Masyarakat', 'B/005/II/KA/PM.01/2023/BNNP-Bali', 'Biasa', 'Pembicara Nasabah Bank', NULL, 'Bank BRI Pusat', 'Pemateri', 'JenderalTarampolin', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', NULL, NULL, '2023-05-04', 'BNDCC Nusa Dua', '11:00:00', NULL, '', '', '', 1, '2023-05-03', '2023-05-02 00:53:38', '2023-05-02 00:53:38'),
(63, 2, NULL, 'Bidang P2M Cegah', 'Sprin/006/III/KA/PC.01/2023/BNNP-BALI', 'Sprin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdasda', 'asdasd', 'asdasdasd', 1, '2023-05-03', '2023-05-31 03:26:53', '2023-05-31 03:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` bigint NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `dari` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `kepada` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tanggal_surat` date DEFAULT NULL,
  `tanggal_terima` date DEFAULT NULL,
  `perihal` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `file` text,
  `id_klasifikasi` bigint DEFAULT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `no_surat`, `dari`, `kepada`, `tanggal_surat`, `tanggal_terima`, `perihal`, `keterangan`, `file`, `id_klasifikasi`, `user_id`, `created_at`, `updated_at`) VALUES
(21, '074.A/DIRAKAKEM/WRI/ITBSTIKOM/II/22', 'STIKOM Bali', 'Kepala Direktur BNN', '2023-04-30', '2023-05-01', 'Surat Terkait KP', 'Penting!', '1682948494_1181-Article Text-1881-1-10-20230227.pdf', NULL, 2, '2023-05-01 05:41:34', '2023-05-01 05:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'adi', 'adi@gmail.com', 'Admin', '2023-03-20 22:44:21', '$2y$10$rP7sc/cpRtqm/Uca3D0/rO4n52DH2zEQ/xYXzSqz7Uj6W5M2Wj29C', 'e0KibR5SHApdgyuMd2oc4uDSJUSdQRTdqewqDIGpxfwFbi6B5grp7DShgmpl', '2023-03-20 22:44:21', '2023-03-20 22:44:21'),
(4, 'jovans', 'jovan@gmail.com', 'Pegawai', NULL, '$2y$10$rP7sc/cpRtqm/Uca3D0/rO4n52DH2zEQ/xYXzSqz7Uj6W5M2Wj29C', NULL, '2023-03-21 02:49:24', '2023-03-27 01:41:16'),
(5, 'jovans', 'asd@gmail.com', 'Pegawai', '2023-03-21 02:49:47', '$2y$10$lJ8/JNlk2pd7Mdil/cgkN.lxdfYj/VcTvR7Eiw92VW6cHDwHVq36S', NULL, '2023-03-21 02:49:47', '2023-04-28 16:48:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kepada_surat`
--
ALTER TABLE `kepada_surat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_id` (`surat_id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
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
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kepada_surat`
--
ALTER TABLE `kepada_surat`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kepada_surat`
--
ALTER TABLE `kepada_surat`
  ADD CONSTRAINT `pegawai_id` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `surat_id` FOREIGN KEY (`surat_id`) REFERENCES `surat_keluar` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
