-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2023 at 10:33 AM
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
(54, 'Rehabilitasi', '2023-04-27', 'Test aja bank', NULL, 1, 20, 2, '2023-04-29 23:52:33', '2023-04-29 23:52:33');

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
(5, 52, 1, '2023-05-01 01:15:14', '2023-05-01 01:15:14'),
(6, 52, 7, '2023-05-01 01:15:14', '2023-05-01 01:15:14'),
(7, 53, 1, '2023-05-01 01:30:40', '2023-05-01 01:30:40'),
(8, 53, 7, '2023-05-01 01:30:40', '2023-05-01 01:30:40'),
(9, 53, 8, '2023-05-01 01:30:40', '2023-05-01 01:30:40'),
(10, 53, 9, '2023-05-01 01:30:40', '2023-05-01 01:30:40'),
(20, 55, 1, '2023-05-01 02:12:01', '2023-05-01 02:12:01'),
(21, 55, 9, '2023-05-01 02:12:01', '2023-05-01 02:12:01'),
(22, 55, 7, '2023-05-01 02:12:01', '2023-05-01 02:12:01');

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
(1, 'Purge', '520192382112', 'Sekretaris', 'PNS', '2023-04-07 18:46:25', '2023-05-01 01:27:12'),
(7, 'Tuturu', NULL, 'Staff', 'Kontrak', '2023-04-30 22:27:20', '2023-04-30 22:27:20'),
(8, 'Tapaluna', NULL, 'Staff', 'Kontrak', '2023-05-01 01:26:29', '2023-05-01 01:26:29'),
(9, 'Tapanuli', '10847287173', 'Penyuluh Narkoba', 'PNS', '2023-05-01 01:27:03', '2023-05-01 01:27:03');

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
(9, 2, 'Undangan', 'Bidang P2M Cegah', 'B/002/V/Ka/PC.01/2022/BNNP-BALI', 'Biasa', 'Pembicara', 1, 'Sistem Informasi Ajaah', 'Pemateri', 'Bidang Masyarakat', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', NULL, NULL, '2023-04-12', 'rawr', '02:45:00', '00:46:00', '', '', '', 1, '2023-04-13', '2023-04-11 08:45:44', '2023-05-01 01:39:23'),
(10, 2, 'Undangan', '', 'B/003/V/Ka/PC.01/2022/BNNP-BALI', 'Biasa', 'we', 1, 'wa', 'Pemateri', 'Bidang Masyarakat', 'waw\r\nwaw\r\nawaw\r\nAwaw', NULL, NULL, '2023-04-11', 'raw', '02:35:00', '02:35:00', '', '', '', 0, '2023-04-12', '2023-04-11 09:34:38', '2023-04-30 01:51:06'),
(11, 2, 'Undangan', '', 'B/004/V/Ka/PC.01/2022/BNNP-BALI', 'Biasa', 'wa', 1, 'we', 'Pemateri', 'JenderalSudimara', 'A<br />\r\nb<br />\r\nc', NULL, NULL, '2023-04-11', 'raw', '02:42:00', '02:42:00', '', '', '', 0, '2023-04-12', '2023-04-11 09:42:19', '2023-04-11 09:42:19'),
(12, 2, 'Undangan', 'Bidang Rehabilitasi', 'B/008/IV/Ka/KU.06.01/2023/BNNP-Bali', 'Biasa', 'wasa', 1, 'dsa', 'Pemateri', 'raaaaaa', '. melaksanakan Kegiatan Koordinasi Persiapan Pengembangan Soft Skill di SMA Negeri 1 Kediri Kabupaten Tabanan pada tanggal 11 April 20222. melaporkan hasil pelaksanaannya kepada Kepala BNNP3. melaksanakan tugas ini dengan sebaik-baiknya dan dengan penuh rasa tanggungjawab.', NULL, NULL, '2023-04-12', 'arrrrrrrr', '02:48:00', '01:48:00', '', '', '', 0, '2023-04-12', '2023-04-11 09:47:53', '2023-04-20 07:20:41'),
(19, 2, NULL, 'Bidang P2M Cegah', 'Sprin/006/III/KA/RH.00.00/2023/BNNP-BALI', 'Sprin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Test test test testter<br />\r\nTest aja brok<br />\r\nTest aja cok dah dblg', '1. Test test test testraw<br />\r\n1. Test test test testraw<br />\r\n1. Test test test testqas<br />\r\n1. Test test test testrewww', '3. Test test test testraw<br />\r\n4. Test test test testraw<br />\r\n5. Tarararara qo', 0, '2023-04-21', '2023-04-20 06:24:22', '2023-04-30 22:09:01'),
(20, 2, 'Undangan', 'Bidang P2M Cegah', 'B/007/II/KA/PM.01/2023/BNNP-Bali', 'Biasa', 'Pembicara', 1, 'Sistem Informasi Ajaah', 'Pemateri', 'Satrianto Ariardi', 'Abogoboga', NULL, NULL, '2023-04-28', 'Jl. Bogorrr', '22:46:00', '02:52:00', '', '', '', 0, '2023-04-21', '2023-04-20 06:47:08', '2023-04-20 06:48:03'),
(21, 2, 'Undangan', 'Bidang P2M Cegah', 'B/008II/KA/PC.01/2023/BNNP-Bali', 'Biasa', 'Pidato', 2, 'Narkoba Untuk Bangsa', 'Pemateri', 'Nyoman Suayana', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', NULL, NULL, '2023-04-20', 'Gor Ngurah Rai', '23:34:00', '03:39:00', '', '', '', 0, '2023-04-20', '2023-04-20 07:34:40', '2023-04-20 07:34:40'),
(22, 2, 'Undangan', 'Bidang Umum', 'B/009/II/KA/KP.03.01/2023/BNNP-Bali', 'Biasa', 'Pembicara', 1, 'rara rere', 'Peserta', 'Bidang Masyarakat', 'Aku adalah anak gembala selalu riang serta gembira, karena aku senang bekerja tak pernah malas ataupun lelah, la lala lala la la la la la lala lalala. Balonku ada lima rupa rupa warnanya hijau kuning kelabu merah muda dan biru meletus balon hijau dar hatiku sangat kacau balonku tinggal empat ku pegang erat erat ea eae a ea eae ae ae a ea eae ae aea ea ea ea ea ea ea eaeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee kita bisa', NULL, NULL, '2023-04-21', 'Gorontalo', '10:19:00', '12:17:00', '', '', '', 0, '2023-04-22', '2023-04-20 18:17:17', '2023-04-20 18:17:17'),
(33, 2, 'Undangan', 'Bidang P2M Pemberdayaan Masyarakat', 'B/010/II/KA/PM.01/2023/BNNP-Bali', 'Biasa', 'wawa', 1, 'wawan', 'Pemateri', 'wewe', 'wawan', NULL, NULL, '2023-04-30', 'rarararara', '15:45:00', NULL, '', '', '', 1, '2023-04-04', '2023-04-29 23:45:19', '2023-04-29 23:45:19'),
(35, 2, 'Lain', 'Bidang P2M Pemberdayaan Masyarakat', 'B/011/II/KA/PM.01/2023/BNNP-Bali', 'Biasa', 'Pembicara', 1, 'Sistem Informasi Ajaah', 'Peserta', 'JenderalSudimara', NULL, 'Iya kita sangatlah bebas jalani hidup kita mimpi kita satu judi kita satu one hear one hear satu langganan bersama satu hati wkakwkwakwoakwoak nyoba tes aja ngawur wkowkowk cepet kek asidaldkjsa', 'Demikian dengan surat ini abjgasdacw22', NULL, NULL, NULL, NULL, '1. Kami putra dan putri indoneisa mengaku berbahasa satu bahasa indonesia<br />\n2. kami putra dan putri indonesia mengaku bertumpah darah satu tumpah darah indonesia<br />\n3. kami putra dan putri indonesia mengaku berbangsa satu bangsa indonesia', '', '', 1, '2023-05-10', '2023-04-30 21:21:30', '2023-04-30 21:38:40'),
(36, 2, 'Lain', 'Bidang P2M Pemberdayaan Masyarakat', 'B/012/II/KA/PM.01/2023/BNNP-Bali', 'Biasa', 'Pembicara', 1, 'Sistem Informasi Surat', 'Pemateri', 'Bidang Masyarakat', NULL, 'asdadererere', 'asdasdasd', NULL, NULL, NULL, NULL, 'Peraturan Kepala Kepolisian Negara Republik Indonesia Nomor 13 Tahun 2014 tentang Perubahan Atas Peraturan Kepala Kepolisian Negara Republik Indonesia Nomor 1 Tahun 2013 tentang Penugasan Anggota Kepolisian Negara Republik Indonesia di Luar Struktur Organisasi Kepolisian Negara Republik Indonesia.<br />\nSurat Perintah Kapolri Nomor : Sprin/1251/V/KEP./2018 tanggal 15 Mei 2018 tentang Penugasan Dilingkungan Badan Narkotika Nasional Republik Indonesia sebagai Kepala Bagian Umum Badan Narkotika Nasional Provinsi Bali.<br />\nSurat Keputusan Kepala Badan Narkotika Nasional Nomor : KEP/136/III/SU/KP.02.00.2017/BNN tentang Pemberhentian dan Pengangkatan dari dan Dalam Jabatan di Lingkungan Badan Narkotika Nasional.', '', '', 1, '2023-05-10', '2023-04-30 21:33:58', '2023-04-30 21:53:16'),
(48, 2, NULL, 'Bidang P2M Cegah', 'Sprin/012/III/KA/PC.01/2023/BNNP-BALI', 'Sprin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ara', 'rara', 'rara', 1, '2023-05-08', '2023-05-01 01:09:14', '2023-05-01 01:09:14'),
(52, 2, NULL, 'Bidang P2M Pemberdayaan Masyarakat', 'Sprin/013/III/KA/PM.00/2023/BNNP-BALI', 'Sprin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Peraturan Kepala Kepolisian Negara Republik Indonesia Nomor 13 Tahun 2014 tentang Perubahan Atas Peraturan Kepala Kepolisian Negara Republik Indonesia Nomor 1 Tahun 2013 tentang Penugasan Anggota Kepolisian Negara Republik Indonesia di Luar Struktur Organisasi Kepolisian Negara Republik Indonesia.<br />\r\nSurat Perintah Kapolri Nomor : Sprin/1251/V/KEP./2018 tanggal 15 Mei 2018 tentang Penugasan Dilingkungan Badan Narkotika Nasional Republik Indonesia sebagai Kepala Bagian Umum Badan Narkotika Nasional Provinsi Bali.<br />\r\nSurat Keputusan Kepala Badan Narkotika Nasional Nomor : KEP/136/III/SU/KP.02.00.2017/BNN tentang Pemberhentian dan Pengangkatan dari dan Dalam Jabatan di Lingkungan Badan Narkotika Nasional.', 'asdasdas', '3. Abcedjlakjsgkljasflkjas<br />\r\n4. wakhdskjahkjhehehehe', 1, '2023-05-08', '2023-05-01 01:15:14', '2023-05-01 01:15:14'),
(53, 2, NULL, 'Bidang P2M Pemberdayaan Masyarakat', 'Sprin/014/III/KA/PM.00/2023/BNNP-BALI', 'Sprin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Peraturan Kepala Kepolisian Negara Republik Indonesia Nomor 13 Tahun 2014 tentang Perubahan Atas Peraturan Kepala Kepolisian Negara Republik Indonesia Nomor 1 Tahun 2013 tentang Penugasan Anggota Kepolisian Negara Republik Indonesia di Luar Struktur Organisasi Kepolisian Negara Republik Indonesia.<br />\r\nSurat Perintah Kapolri Nomor : Sprin/1251/V/KEP./2018 tanggal 15 Mei 2018 tentang Penugasan Dilingkungan Badan Narkotika Nasional Republik Indonesia sebagai Kepala Bagian Umum Badan Narkotika Nasional Provinsi Bali.<br />\r\nSurat Keputusan Kepala Badan Narkotika Nasional Nomor : KEP/136/III/SU/KP.02.00.2017/BNN tentang Pemberhentian dan Pengangkatan dari dan Dalam Jabatan di Lingkungan Badan Narkotika Nasional.', 'asreewww', '3. aksjdkajsdkajsd<br />\r\n4. aksdjaksdj', 1, '2023-05-11', '2023-05-01 01:30:40', '2023-05-01 01:30:40'),
(55, 2, NULL, 'Bidang P2M Cegah', 'Sprin/015/III/KA/PC.01/2023/BNNP-BALI', 'Sprin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'purge isindahaus', 'asdre', 'recc', 1, '2023-05-10', '2023-05-01 01:49:30', '2023-05-01 02:12:01'),
(57, 2, 'Undangan', 'Bidang Rehabilitasi', 'B/016/IV/Ka/KU.06.01/2023/BNNP-Bali', 'Biasa', 'Pembicara', 2, 'Sistem Informasi Ajaah', 'Peserta', 'Bidang Masyarakat', 'Abogoboga', NULL, NULL, '2023-05-12', 'Cileungsi', '18:14:00', NULL, '', '', '', 1, '2023-05-11', '2023-05-01 02:14:54', '2023-05-01 02:14:54');

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
(2, '074.A/DIRAKAKEM/WRI/ITBSTIKOM/II/22', 'Saya', 'Jenderal', '2023-03-15', '2023-03-23', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel nunc vitae diam auctor viverra. Nulla in lectus nec ligula gravida porta. Nulla rutrum convallis mollis.', 'wq', NULL, NULL, 2, '2023-03-23 04:41:54', '2023-03-23 08:02:56'),
(17, '074.A/DIRAKAKEM/WRI/ITBSTIKOM/II/26', 'Terra', 'asd', '2023-03-30', '2023-03-30', 'Perihal GEge', 'Teras', '1680230257_surat_undangan_lampiran.pdf', NULL, 2, '2023-03-30 18:37:37', '2023-03-30 18:37:37'),
(19, '074.A/TES/SRM/JOVAN/II/22s', 'Saya', 'Bidang Masyarakat', '2023-04-11', '2023-04-11', 'wea', 'wa', '1681089284_Tugas1_190030581.pdf', NULL, 2, '2023-04-09 17:14:44', '2023-04-09 17:14:44');

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
(2, 'adi', 'adi@gmail.com', 'Admin', '2023-03-20 22:44:21', '$2y$10$rP7sc/cpRtqm/Uca3D0/rO4n52DH2zEQ/xYXzSqz7Uj6W5M2Wj29C', 'pZtY57N7qO4NKiyOlzy8zT7ORG0yThkgYk5iQdYFeBcoGcNolD0JaKluhO1T', '2023-03-20 22:44:21', '2023-03-20 22:44:21'),
(4, 'jovans', 'jovan@gmail.com', 'Pegawai', NULL, '$2y$10$rP7sc/cpRtqm/Uca3D0/rO4n52DH2zEQ/xYXzSqz7Uj6W5M2Wj29C', NULL, '2023-03-21 02:49:24', '2023-03-27 01:41:16'),
(5, 'jovans', 'asd@gmail.com', 'Pegawai', '2023-03-21 02:49:47', '$2y$10$lJ8/JNlk2pd7Mdil/cgkN.lxdfYj/VcTvR7Eiw92VW6cHDwHVq36S', NULL, '2023-03-21 02:49:47', '2023-04-28 16:48:02'),
(6, 'tarata', 'tarataktum@gmail.com', 'Pegawai', NULL, '$2y$10$coXDcd9.TWbhWtaNtk12EeMet5ZsOgf7sg7mhbHdvlNr.Yl2qEqUa', NULL, '2023-04-28 18:15:03', '2023-04-29 21:09:18');

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
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kepada_surat`
--
ALTER TABLE `kepada_surat`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
