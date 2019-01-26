-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2019 pada 15.44
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinrang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `airlimbahdetails`
--

CREATE TABLE `airlimbahdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `airlimbahMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlUnit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `airlimbahdetails`
--

INSERT INTO `airlimbahdetails` (`id`, `airlimbahMaster_id`, `kecamatan_id`, `jmlUnit`, `created_at`, `updated_at`) VALUES
(13, 2, 1, 12, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(14, 2, 2, 1, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(15, 2, 3, 4, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(16, 2, 4, 1, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(17, 2, 5, 4, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(18, 2, 6, 1, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(19, 2, 7, 2, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(20, 2, 8, 1, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(21, 2, 9, 1, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(22, 2, 10, 7, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(23, 2, 11, 1, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(24, 2, 12, 0, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(25, 3, 1, 12, '2018-07-19 16:12:40', '2018-07-19 16:12:40'),
(26, 3, 2, 1, '2018-07-19 16:12:40', '2018-07-19 16:12:40'),
(27, 3, 3, 4, '2018-07-19 16:12:40', '2018-07-19 16:12:40'),
(28, 3, 4, 1, '2018-07-19 16:12:40', '2018-07-19 16:12:40'),
(29, 3, 5, 4, '2018-07-19 16:12:40', '2018-07-19 16:12:40'),
(30, 3, 6, 1, '2018-07-19 16:12:40', '2018-07-19 16:12:40'),
(31, 3, 7, 2, '2018-07-19 16:12:40', '2018-07-19 16:12:40'),
(32, 3, 8, 1, '2018-07-19 16:12:40', '2018-07-19 16:12:40'),
(33, 3, 9, 1, '2018-07-19 16:12:40', '2018-07-19 16:12:40'),
(34, 3, 10, 7, '2018-07-19 16:12:41', '2018-07-19 16:12:41'),
(35, 3, 11, 1, '2018-07-19 16:12:41', '2018-07-19 16:12:41'),
(36, 3, 12, 0, '2018-07-19 16:12:41', '2018-07-19 16:12:41'),
(37, 4, 1, 11, '2018-07-19 16:14:09', '2018-07-19 16:14:09'),
(38, 4, 2, 1, '2018-07-19 16:14:09', '2018-07-19 16:14:09'),
(39, 4, 3, 4, '2018-07-19 16:14:09', '2018-07-19 16:14:09'),
(40, 4, 4, 1, '2018-07-19 16:14:09', '2018-07-19 16:14:09'),
(41, 4, 5, 4, '2018-07-19 16:14:09', '2018-07-19 16:14:09'),
(42, 4, 6, 1, '2018-07-19 16:14:09', '2018-07-19 16:14:09'),
(43, 4, 7, 1, '2018-07-19 16:14:09', '2018-07-19 16:14:09'),
(44, 4, 8, 1, '2018-07-19 16:14:09', '2018-07-19 16:14:09'),
(45, 4, 9, 1, '2018-07-19 16:14:09', '2018-07-19 16:14:09'),
(46, 4, 10, 4, '2018-07-19 16:14:09', '2018-07-19 16:14:09'),
(47, 4, 11, 2, '2018-07-19 16:14:09', '2019-01-24 07:07:50'),
(48, 4, 12, 0, '2018-07-19 16:14:09', '2018-07-19 16:14:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `airlimbahmasters`
--

CREATE TABLE `airlimbahmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalUnit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `airlimbahmasters`
--

INSERT INTO `airlimbahmasters` (`id`, `ta`, `totalUnit`, `created_at`, `updated_at`) VALUES
(2, 2017, 35, '2018-07-19 16:11:29', '2018-07-19 16:11:29'),
(3, 2016, 35, '2018-07-19 16:12:40', '2018-07-19 16:12:40'),
(4, 2015, 31, '2018-07-19 16:14:09', '2019-01-24 07:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aparatkeamanans`
--

CREATE TABLE `aparatkeamanans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlAparat` int(11) NOT NULL,
  `jmlSatpol` int(11) NOT NULL,
  `jmlLinmas` int(11) NOT NULL,
  `jmlPatroli` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aparatkeamanans`
--

INSERT INTO `aparatkeamanans` (`id`, `ta`, `jmlAparat`, `jmlSatpol`, `jmlLinmas`, `jmlPatroli`, `created_at`, `updated_at`) VALUES
(1, 2017, 272, 272, 0, 0, '2018-07-22 21:36:57', '2018-07-22 21:36:57'),
(2, 2018, 841, 269, 532, 40, '2018-07-22 21:42:43', '2018-07-22 21:42:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `apbds`
--

CREATE TABLE `apbds` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlPendapatan` int(11) NOT NULL,
  `jmlPAD` int(11) NOT NULL,
  `jmlDanaperimbangan` int(11) NOT NULL,
  `jmlPendapatanlain` int(11) NOT NULL,
  `jmlBelanja` int(11) NOT NULL,
  `jmlBelanjatidaklangsung` int(11) NOT NULL,
  `jmlBelanjalangsung` int(11) NOT NULL,
  `jmlPembiayaan` int(11) NOT NULL,
  `jmlPembiayaanpenerimaan` int(11) NOT NULL,
  `jmlPembiayaanpengeluaran` int(11) NOT NULL,
  `jmlSilpa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `apbds`
--

INSERT INTO `apbds` (`id`, `ta`, `jmlPendapatan`, `jmlPAD`, `jmlDanaperimbangan`, `jmlPendapatanlain`, `jmlBelanja`, `jmlBelanjatidaklangsung`, `jmlBelanjalangsung`, `jmlPembiayaan`, `jmlPembiayaanpenerimaan`, `jmlPembiayaanpengeluaran`, `jmlSilpa`, `created_at`, `updated_at`) VALUES
(1, 2018, 1217467, 98986, 972829, 145653, 1234188, 792433, 441755, 16720, 16720, 0, 0, '2018-07-17 21:57:35', '2019-01-20 09:27:08'),
(2, 2017, 1218890, 109986, 935105, 173799, 1367408, 688406, 679002, 148517, 148517, 0, 0, '2018-07-17 22:00:45', '2018-07-17 22:00:45'),
(3, 2016, 1310282, 101829, 1090643, 117810, 1435838, 755527, 680311, 125556, 142684, 17128, 0, '2018-07-17 22:03:49', '2018-07-17 22:03:49'),
(4, 2015, 1181473, 95035, 853258, 233180, 1290366, 658099, 632267, 108892, 111392, 2500, 0, '2018-07-17 22:07:16', '2018-07-17 22:07:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `armadadetails`
--

CREATE TABLE `armadadetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `armadaMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlArmada` int(11) NOT NULL,
  `jmlKapalmotor` int(11) NOT NULL,
  `jmlPerahumotor` int(11) NOT NULL,
  `jmlPerahutanpamotor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `armadadetails`
--

INSERT INTO `armadadetails` (`id`, `armadaMaster_id`, `kecamatan_id`, `jmlArmada`, `jmlKapalmotor`, `jmlPerahumotor`, `jmlPerahutanpamotor`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 0, 0, '2018-07-22 22:48:43', '2018-07-22 22:48:43'),
(2, 1, 2, 0, 0, 0, 0, '2018-07-22 22:48:43', '2018-07-22 22:48:43'),
(3, 1, 3, 1191, 246, 660, 285, '2018-07-22 22:48:43', '2018-07-22 22:48:43'),
(4, 1, 4, 0, 0, 0, 0, '2018-07-22 22:48:43', '2018-07-22 22:48:43'),
(5, 1, 5, 0, 0, 0, 0, '2018-07-22 22:48:43', '2018-07-22 22:48:43'),
(6, 1, 6, 397, 19, 325, 53, '2018-07-22 22:48:43', '2018-07-22 22:48:43'),
(7, 1, 7, 0, 0, 0, 0, '2018-07-22 22:48:43', '2018-07-22 22:48:43'),
(8, 1, 8, 219, 9, 165, 45, '2018-07-22 22:48:43', '2018-07-22 22:48:43'),
(9, 1, 9, 167, 8, 118, 41, '2018-07-22 22:48:43', '2018-07-22 22:48:43'),
(10, 1, 10, 337, 60, 229, 48, '2018-07-22 22:48:43', '2018-07-22 22:48:43'),
(11, 1, 11, 81, 2, 57, 22, '2018-07-22 22:48:43', '2018-07-22 22:48:43'),
(12, 1, 12, 0, 0, 0, 0, '2018-07-22 22:48:43', '2018-07-22 22:48:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `armadamasters`
--

CREATE TABLE `armadamasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalArmada` int(11) NOT NULL,
  `totalKapalmotor` int(11) NOT NULL,
  `totalPerahumotor` int(11) NOT NULL,
  `totalPerahutanpamotor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `armadamasters`
--

INSERT INTO `armadamasters` (`id`, `ta`, `totalArmada`, `totalKapalmotor`, `totalPerahumotor`, `totalPerahutanpamotor`, `created_at`, `updated_at`) VALUES
(1, 2018, 2392, 344, 1554, 494, '2018-07-22 22:48:42', '2018-07-22 22:48:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bangunandetails`
--

CREATE TABLE `bangunandetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `bangunanMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlUnit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bangunandetails`
--

INSERT INTO `bangunandetails` (`id`, `bangunanMaster_id`, `kecamatan_id`, `jmlUnit`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 18172, '2018-07-19 16:18:57', '2018-07-19 16:18:57'),
(2, 1, 2, 8809, '2018-07-19 16:18:57', '2018-07-19 16:18:57'),
(3, 1, 3, 7363, '2018-07-19 16:18:58', '2018-07-19 16:18:58'),
(4, 1, 4, 11123, '2018-07-19 16:18:58', '2018-07-19 16:18:58'),
(5, 1, 5, 12182, '2018-07-19 16:18:58', '2018-07-19 16:18:58'),
(6, 1, 6, 6761, '2018-07-19 16:18:58', '2018-07-19 16:18:58'),
(7, 1, 7, 7732, '2018-07-19 16:18:58', '2018-07-19 16:18:58'),
(8, 1, 8, 11269, '2018-07-19 16:18:58', '2018-07-19 16:18:58'),
(9, 1, 9, 8053, '2018-07-19 16:18:58', '2018-07-19 16:18:58'),
(10, 1, 10, 14462, '2018-07-19 16:18:58', '2018-07-19 16:18:58'),
(11, 1, 11, 6722, '2018-07-19 16:18:58', '2018-07-19 16:18:58'),
(12, 1, 12, 5823, '2018-07-19 16:18:58', '2018-07-19 16:18:58'),
(13, 2, 1, 18029, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(14, 2, 2, 8782, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(15, 2, 3, 7338, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(16, 2, 4, 11050, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(17, 2, 5, 11978, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(18, 2, 6, 6748, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(19, 2, 7, 7656, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(20, 2, 8, 11254, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(21, 2, 9, 8043, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(22, 2, 10, 14418, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(23, 2, 11, 6711, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(24, 2, 12, 5822, '2018-07-19 16:21:28', '2018-07-19 16:21:28'),
(25, 3, 1, 17620, '2018-07-19 16:23:40', '2018-07-19 16:23:40'),
(26, 3, 2, 8757, '2018-07-19 16:23:40', '2018-07-19 16:23:40'),
(27, 3, 3, 7313, '2018-07-19 16:23:40', '2018-07-19 16:23:40'),
(28, 3, 4, 11034, '2018-07-19 16:23:40', '2018-07-19 16:23:40'),
(29, 3, 5, 11790, '2018-07-19 16:23:40', '2018-07-19 16:23:40'),
(30, 3, 6, 6740, '2018-07-19 16:23:40', '2018-07-19 16:23:40'),
(31, 3, 7, 7582, '2018-07-19 16:23:40', '2018-07-19 16:23:40'),
(32, 3, 8, 11250, '2018-07-19 16:23:40', '2018-07-19 16:23:40'),
(33, 3, 9, 8033, '2018-07-19 16:23:40', '2018-07-19 16:23:40'),
(34, 3, 10, 14392, '2018-07-19 16:23:40', '2018-07-19 16:23:40'),
(35, 3, 11, 6706, '2018-07-19 16:23:40', '2018-07-19 16:23:40'),
(36, 3, 12, 5822, '2018-07-19 16:23:40', '2018-07-19 16:23:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bangunanmasters`
--

CREATE TABLE `bangunanmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalUnit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bangunanmasters`
--

INSERT INTO `bangunanmasters` (`id`, `ta`, `totalUnit`, `created_at`, `updated_at`) VALUES
(1, 2017, 118471, '2018-07-19 16:18:57', '2018-07-19 16:18:57'),
(2, 2016, 117829, '2018-07-19 16:21:27', '2018-07-19 16:21:27'),
(3, 2015, 117039, '2018-07-19 16:23:40', '2018-07-19 16:23:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bencanaalamdetails`
--

CREATE TABLE `bencanaalamdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `bencanaalamMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlKejadian` int(11) NOT NULL,
  `jmlBanjir` int(11) NOT NULL,
  `jmlKebakaran` int(11) NOT NULL,
  `jmlKekeringan` int(11) NOT NULL,
  `jmlAnginkencang` int(11) NOT NULL,
  `jmlTanahlongsor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bencanaalamdetails`
--

INSERT INTO `bencanaalamdetails` (`id`, `bencanaalamMaster_id`, `kecamatan_id`, `jmlKejadian`, `jmlBanjir`, `jmlKebakaran`, `jmlKekeringan`, `jmlAnginkencang`, `jmlTanahlongsor`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12, 2, 8, 0, 2, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(2, 1, 2, 9, 5, 2, 0, 2, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(3, 1, 3, 1, 0, 1, 0, 0, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(4, 1, 4, 3, 0, 2, 0, 1, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(5, 1, 5, 3, 1, 0, 0, 2, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(6, 1, 6, 3, 1, 0, 0, 2, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(7, 1, 7, 2, 1, 1, 0, 0, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(8, 1, 8, 5, 3, 0, 0, 2, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(9, 1, 9, 3, 1, 1, 0, 1, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(10, 1, 10, 6, 0, 5, 0, 1, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(11, 1, 11, 1, 0, 1, 0, 0, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(12, 1, 12, 1, 0, 1, 0, 0, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(13, 2, 1, 9, 0, 8, 0, 1, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(14, 2, 2, 5, 0, 5, 0, 0, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(15, 2, 3, 4, 1, 0, 0, 3, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(16, 2, 4, 5, 2, 3, 0, 0, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(17, 2, 5, 10, 0, 10, 0, 0, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(18, 2, 6, 1, 0, 0, 0, 1, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(19, 2, 7, 5, 0, 4, 0, 1, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(20, 2, 8, 4, 0, 3, 0, 1, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(21, 2, 9, 3, 0, 3, 0, 0, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(22, 2, 10, 6, 2, 0, 0, 4, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(23, 2, 11, 2, 0, 2, 0, 0, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(24, 2, 12, 1, 0, 1, 0, 0, 0, '2018-07-17 22:15:32', '2018-07-17 22:15:32'),
(25, 3, 1, 3, 0, 1, 0, 2, 0, '2018-07-17 22:19:29', '2018-07-17 22:19:29'),
(26, 3, 2, 5, 0, 4, 0, 1, 0, '2018-07-17 22:19:29', '2018-07-17 22:19:29'),
(27, 3, 3, 5, 0, 1, 0, 4, 0, '2018-07-17 22:19:29', '2018-07-17 22:19:29'),
(28, 3, 4, 4, 1, 3, 0, 0, 0, '2018-07-17 22:19:29', '2018-07-17 22:19:29'),
(29, 3, 5, 3, 0, 1, 0, 2, 0, '2018-07-17 22:19:29', '2018-07-17 22:19:29'),
(30, 3, 6, 1, 1, 0, 0, 0, 0, '2018-07-17 22:19:29', '2018-07-17 22:19:29'),
(31, 3, 7, 2, 0, 1, 0, 1, 0, '2018-07-17 22:19:29', '2018-07-17 22:19:29'),
(32, 3, 8, 8, 0, 0, 0, 4, 4, '2018-07-17 22:19:29', '2018-07-17 22:19:29'),
(33, 3, 9, 4, 0, 1, 0, 3, 0, '2018-07-17 22:19:29', '2018-07-17 22:19:29'),
(34, 3, 10, 7, 3, 1, 0, 3, 0, '2018-07-17 22:19:29', '2018-07-17 22:19:29'),
(35, 3, 11, 2, 0, 2, 0, 0, 0, '2018-07-17 22:19:29', '2018-07-17 22:19:29'),
(36, 3, 12, 3, 2, 1, 0, 0, 0, '2018-07-17 22:19:29', '2018-07-17 22:19:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bencanaalammasters`
--

CREATE TABLE `bencanaalammasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalKejadian` int(11) NOT NULL,
  `totalBanjir` int(11) NOT NULL,
  `totalKebakaran` int(11) NOT NULL,
  `totalKekeringan` int(11) NOT NULL,
  `totalAnginkencang` int(11) NOT NULL,
  `totalTanahlongsor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bencanaalammasters`
--

INSERT INTO `bencanaalammasters` (`id`, `ta`, `totalKejadian`, `totalBanjir`, `totalKebakaran`, `totalKekeringan`, `totalAnginkencang`, `totalTanahlongsor`, `created_at`, `updated_at`) VALUES
(1, 2017, 49, 14, 22, 0, 13, 0, '2018-07-17 22:12:31', '2018-07-17 22:12:31'),
(2, 2016, 55, 5, 39, 0, 11, 0, '2018-07-17 22:15:31', '2018-07-17 22:15:31'),
(3, 2015, 47, 7, 16, 0, 20, 4, '2018-07-17 22:19:29', '2018-07-17 22:19:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bencanadetails`
--

CREATE TABLE `bencanadetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `bencanaMaster_id` int(11) NOT NULL,
  `bencana_id` int(11) NOT NULL,
  `jmlKejadian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bencanadetails`
--

INSERT INTO `bencanadetails` (`id`, `bencanaMaster_id`, `bencana_id`, `jmlKejadian`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2019-01-25 23:39:15', '2019-01-25 23:39:35'),
(2, 1, 2, 0, '2019-01-25 23:39:15', '2019-01-25 23:39:15'),
(3, 1, 3, 2, '2019-01-25 23:39:15', '2019-01-25 23:39:15'),
(4, 1, 4, 0, '2019-01-25 23:39:15', '2019-01-25 23:39:15'),
(5, 1, 5, 0, '2019-01-25 23:39:16', '2019-01-25 23:39:16'),
(6, 1, 6, 0, '2019-01-25 23:39:16', '2019-01-25 23:39:16'),
(7, 1, 7, 2, '2019-01-25 23:39:16', '2019-01-25 23:39:16'),
(8, 1, 8, 0, '2019-01-25 23:39:16', '2019-01-25 23:39:16'),
(9, 1, 9, 0, '2019-01-25 23:39:16', '2019-01-25 23:39:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bencanamasters`
--

CREATE TABLE `bencanamasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalKejadian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bencanamasters`
--

INSERT INTO `bencanamasters` (`id`, `ta`, `totalKejadian`, `created_at`, `updated_at`) VALUES
(1, 2018, 5, '2019-01-25 23:39:15', '2019-01-25 23:39:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bencanas`
--

CREATE TABLE `bencanas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nmaBencana` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bencanas`
--

INSERT INTO `bencanas` (`id`, `nmaBencana`, `created_at`, `updated_at`) VALUES
(1, 'Banjir', NULL, NULL),
(2, 'Tanah Longsor', NULL, NULL),
(3, 'Kebakaran Hutan', NULL, NULL),
(4, 'Gempa Bumi', NULL, NULL),
(5, 'Tsunami', NULL, NULL),
(6, 'Kekeringan Air', NULL, NULL),
(7, 'Gunung Meletus', NULL, NULL),
(8, 'Angin Topan/Angin Putting Beliung', NULL, NULL),
(9, 'Badai Tropis', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang_izins`
--

CREATE TABLE `bidang_izins` (
  `id` int(10) UNSIGNED NOT NULL,
  `nmaBidang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bidang_izins`
--

INSERT INTO `bidang_izins` (`id`, `nmaBidang`, `created_at`, `updated_at`) VALUES
(1, 'Bidang Pendidikans', NULL, NULL),
(2, 'Bidang Kesehatan', NULL, NULL),
(3, 'Bidang Pariwisata', NULL, NULL),
(4, 'Bidang Penanaman Modal', NULL, NULL),
(5, 'Bidang Perindustrian', NULL, NULL),
(6, 'Bidang Perdagangan', NULL, NULL),
(7, 'Bidang Ketenteraman dan Ketertiban Umum', NULL, NULL),
(8, 'Bidang Perumahan Rakyat dan Penataan Ruang', NULL, NULL),
(9, 'Bidang Perumahan Rakyat Dan Kawasan Permukiman', NULL, NULL),
(10, 'Bidang Pertanahan', NULL, NULL),
(11, 'Bidang Pertanian', NULL, NULL),
(12, 'Bidang Perikanan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `budidayadetails`
--

CREATE TABLE `budidayadetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `budidayaMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlUsaha` int(11) NOT NULL,
  `jmlTambak` int(11) NOT NULL,
  `jmlKolam` int(11) NOT NULL,
  `jmlSawah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `budidayadetails`
--

INSERT INTO `budidayadetails` (`id`, `budidayaMaster_id`, `kecamatan_id`, `jmlUsaha`, `jmlTambak`, `jmlKolam`, `jmlSawah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 105, 42, 11, 52, '2018-07-22 23:00:35', '2019-01-25 15:12:32'),
(2, 1, 2, 261, 129, 2, 130, '2018-07-22 23:00:35', '2018-07-22 23:00:35'),
(3, 1, 3, 1630, 1595, 30, 5, '2018-07-22 23:00:35', '2018-07-22 23:00:35'),
(4, 1, 4, 429, 0, 403, 26, '2018-07-22 23:00:35', '2018-07-22 23:00:35'),
(5, 1, 5, 13, 0, 4, 9, '2018-07-22 23:00:35', '2018-07-22 23:00:35'),
(6, 1, 6, 3883, 3804, 55, 24, '2018-07-22 23:00:35', '2018-07-22 23:00:35'),
(7, 1, 7, 56, 0, 44, 12, '2018-07-22 23:00:35', '2018-07-22 23:00:35'),
(8, 1, 8, 354, 339, 15, 0, '2018-07-22 23:00:35', '2018-07-22 23:00:35'),
(9, 1, 9, 1760, 1671, 69, 20, '2018-07-22 23:00:35', '2018-07-22 23:00:35'),
(10, 1, 10, 5612, 5402, 193, 17, '2018-07-22 23:00:35', '2018-07-22 23:00:35'),
(11, 1, 11, 3180, 2215, 950, 15, '2018-07-22 23:00:35', '2018-07-22 23:00:35'),
(12, 1, 12, 42, 0, 40, 2, '2018-07-22 23:00:35', '2018-07-22 23:00:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `budidayamasters`
--

CREATE TABLE `budidayamasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalUsaha` int(11) NOT NULL,
  `totalTambak` int(11) NOT NULL,
  `totalKolam` int(11) NOT NULL,
  `totalSawah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `budidayamasters`
--

INSERT INTO `budidayamasters` (`id`, `ta`, `totalUsaha`, `totalTambak`, `totalKolam`, `totalSawah`, `created_at`, `updated_at`) VALUES
(1, 2018, 17325, 15197, 1816, 312, '2018-07-22 23:00:35', '2019-01-25 15:12:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_koperasis`
--

CREATE TABLE `daftar_koperasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nmaKoperasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `daftar_koperasis`
--

INSERT INTO `daftar_koperasis` (`id`, `nmaKoperasi`, `created_at`, `updated_at`) VALUES
(1, 'KUD', NULL, NULL),
(2, 'Koperasi Pertanian', NULL, NULL),
(3, 'Koperasi Perikanan', NULL, NULL),
(4, 'Koperasi Perkebunan', NULL, NULL),
(5, 'Koperasi Peternakan', NULL, NULL),
(6, 'Kopontren', NULL, NULL),
(7, 'Kopinkra', NULL, NULL),
(8, 'Kopti', NULL, NULL),
(9, 'Kopra', NULL, NULL),
(10, 'KPRI', NULL, NULL),
(11, 'Kopkar Non Mandiri', NULL, NULL),
(12, 'Kopkar Mandiri', NULL, NULL),
(13, 'Koperasi Angkatan Darat', NULL, NULL),
(14, 'Koperasi Angkatan Laut', NULL, NULL),
(15, 'Koperasi Angkatan Udara', NULL, NULL),
(16, 'Koperasi Kepolisian', NULL, NULL),
(17, 'Koperasi Serba Usaha', NULL, NULL),
(18, 'Koperasi Pasar', NULL, NULL),
(19, 'Koperasi Simpan Pinjam', NULL, NULL),
(20, 'Koperasi Angkutan Darat', NULL, NULL),
(21, 'Koperasi Angkutan Laut', NULL, NULL),
(22, 'Koperasi Angkutan Udara', NULL, NULL),
(23, 'Koperasi Angkutan Sungai', NULL, NULL),
(24, 'Koperasi Wisata', NULL, NULL),
(25, 'Koperasi Telkom', NULL, NULL),
(26, 'Koperasi Perumahan', NULL, NULL),
(27, 'KPBR', NULL, NULL),
(28, 'Koperasi Listrik Pedesaan', NULL, NULL),
(29, 'Koperasi Asuransi Indonesia', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailsdrusak`
--

CREATE TABLE `detailsdrusak` (
  `id` int(11) NOT NULL,
  `detail_id` int(11) NOT NULL,
  `nmaSekolah` varchar(50) NOT NULL,
  `titik` text NOT NULL,
  `deskrib` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detailsdrusak`
--

INSERT INTO `detailsdrusak` (`id`, `detail_id`, `nmaSekolah`, `titik`, `deskrib`, `updated_at`, `created_at`) VALUES
(1, 37, 'ada', 'as', 'asdasd', '2019-01-18 07:04:21', '2019-01-18 07:04:21'),
(2, 37, 'SD Coba', '1221', 'asd', '2019-01-18 07:10:07', '2019-01-18 07:10:07'),
(3, 37, 'sdf', 'sf', 'sdf', '2019-01-18 21:18:48', '2019-01-18 21:18:48'),
(4, 37, 'sdf', 'sf', 'sdf', '2019-01-18 21:18:52', '2019-01-18 21:18:52'),
(5, 37, 'adas', 'asd', 'ad', '2019-01-18 21:21:38', '2019-01-18 21:21:38'),
(6, 37, 'skaklj', 'sfjlk', 'dsf', '2019-01-18 23:53:48', '2019-01-18 23:53:48'),
(7, 37, 'khkh', 'hkh', 'kh', '2019-01-18 23:55:53', '2019-01-18 23:55:53'),
(8, 37, 'lslj', 'sdfjl', 'sdjl', '2019-01-18 23:56:24', '2019-01-18 23:56:24'),
(9, 37, 'jlkj', 'jkl', ',kjkh', '2019-01-18 23:57:07', '2019-01-18 23:57:07'),
(10, 37, 'sadjslj', 'sdjl', 'jsdfsdf', '2019-01-19 00:06:12', '2019-01-19 00:06:12'),
(11, 37, 'asdasd', 'asas', 'asdhkj', '2019-01-19 00:13:20', '2019-01-19 00:13:20'),
(12, 37, 'sjfklj', 'asjl', 'asds', '2019-01-19 00:14:44', '2019-01-19 00:14:44'),
(13, 37, 'sdfk', 'sdfjl', 'hjkh', '2019-01-19 00:20:18', '2019-01-19 00:20:18'),
(14, 37, 'sdfjkldj', 'sdfjl', 'sd', '2019-01-19 01:06:25', '2019-01-19 01:06:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `drainasedetails`
--

CREATE TABLE `drainasedetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `drainaseMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlVol` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `drainasedetails`
--

INSERT INTO `drainasedetails` (`id`, `drainaseMaster_id`, `kecamatan_id`, `jmlVol`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 47, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(2, 1, 2, 13, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(3, 1, 3, 25, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(4, 1, 4, 18, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(5, 1, 5, 14, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(6, 1, 6, 20, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(7, 1, 7, 10, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(8, 1, 8, 24, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(9, 1, 9, 8, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(10, 1, 10, 15, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(11, 1, 11, 8, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(12, 1, 12, 40, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(13, 2, 1, 45, '2018-09-15 22:58:41', '2018-09-15 22:58:41'),
(14, 2, 2, 12, '2018-09-15 22:58:41', '2018-09-15 22:58:41'),
(15, 2, 3, 24, '2018-09-15 22:58:42', '2018-09-15 22:58:42'),
(16, 2, 4, 17, '2018-09-15 22:58:42', '2018-09-15 22:58:42'),
(17, 2, 5, 13, '2018-09-15 22:58:42', '2018-09-15 22:58:42'),
(18, 2, 6, 18, '2018-09-15 22:58:42', '2018-09-15 22:58:42'),
(19, 2, 7, 10, '2018-09-15 22:58:42', '2018-09-15 22:58:42'),
(20, 2, 8, 23, '2018-09-15 22:58:42', '2018-09-15 22:58:42'),
(21, 2, 9, 6, '2018-09-15 22:58:42', '2018-09-15 22:58:42'),
(22, 2, 10, 14, '2018-09-15 22:58:42', '2018-09-15 22:58:42'),
(23, 2, 11, 8, '2018-09-15 22:58:42', '2018-09-15 22:58:42'),
(24, 2, 12, 40, '2018-09-15 22:58:42', '2018-09-15 22:58:42'),
(25, 3, 1, 44, '2018-09-15 23:03:36', '2018-09-15 23:03:36'),
(26, 3, 2, 11, '2018-09-15 23:03:36', '2018-09-15 23:03:36'),
(27, 3, 3, 22, '2018-09-15 23:03:36', '2018-09-15 23:03:36'),
(28, 3, 4, 16, '2018-09-15 23:03:36', '2018-09-15 23:03:36'),
(29, 3, 5, 12, '2018-09-15 23:03:37', '2018-09-15 23:03:37'),
(30, 3, 6, 17, '2018-09-15 23:03:37', '2018-09-15 23:03:37'),
(31, 3, 7, 9, '2018-09-15 23:03:37', '2018-09-15 23:03:37'),
(32, 3, 8, 22, '2018-09-15 23:03:37', '2018-09-15 23:03:37'),
(33, 3, 9, 6, '2018-09-15 23:03:37', '2018-09-15 23:03:37'),
(34, 3, 10, 13, '2018-09-15 23:03:37', '2018-09-15 23:03:37'),
(35, 3, 11, 7, '2018-09-15 23:03:37', '2018-09-15 23:03:37'),
(36, 3, 12, 40, '2018-09-15 23:03:37', '2018-09-15 23:03:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `drainasemasters`
--

CREATE TABLE `drainasemasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalVol` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `drainasemasters`
--

INSERT INTO `drainasemasters` (`id`, `ta`, `totalVol`, `created_at`, `updated_at`) VALUES
(1, 2017, 242, '2018-09-15 22:55:31', '2018-09-15 22:55:31'),
(2, 2016, 230, '2018-09-15 22:58:41', '2018-09-15 22:58:41'),
(3, 2015, 219, '2018-09-15 23:03:36', '2018-09-15 23:03:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `eselons`
--

CREATE TABLE `eselons` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalPejabat` int(11) NOT NULL,
  `eselonIIa` int(11) NOT NULL,
  `eselonIIb` int(11) NOT NULL,
  `eselonIIIa` int(11) NOT NULL,
  `eselonIIIb` int(11) NOT NULL,
  `eselonIVa` int(11) NOT NULL,
  `eselonIVb` int(11) NOT NULL,
  `eselonV` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `eselons`
--

INSERT INTO `eselons` (`id`, `ta`, `totalPejabat`, `eselonIIa`, `eselonIIb`, `eselonIIIa`, `eselonIIIb`, `eselonIVa`, `eselonIVb`, `eselonV`, `created_at`, `updated_at`) VALUES
(1, 2017, 977, 0, 31, 62, 108, 536, 203, 37, '2018-07-17 21:39:47', '2018-07-17 21:39:47'),
(2, 2016, 992, 1, 31, 58, 103, 519, 239, 41, '2018-07-17 21:42:32', '2018-07-17 21:42:32'),
(3, 2015, 997, 1, 30, 57, 109, 523, 237, 40, '2018-07-17 21:47:54', '2018-07-17 21:47:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasjals`
--

CREATE TABLE `fasjals` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Apill` int(11) NOT NULL,
  `Warning` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fasjals`
--

INSERT INTO `fasjals` (`id`, `ta`, `Apill`, `Warning`, `created_at`, `updated_at`) VALUES
(1, 2015, 9, 16, '2018-07-09 17:54:30', '2018-07-09 17:54:30'),
(2, 2016, 6, 16, '2018-07-09 17:57:24', '2018-07-09 17:57:24'),
(3, 2017, 10, 17, '2018-07-09 17:59:33', '2019-01-21 08:29:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotokerusakan`
--

CREATE TABLE `fotokerusakan` (
  `id` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fotokerusakan`
--

INSERT INTO `fotokerusakan` (`id`, `id_lokasi`, `dari`, `foto`, `updated_at`, `created_at`) VALUES
(1, 2, '', 'public/files/5MCY6Y8mclcvW39MQhP3K6P5f74sc7wsm9JvmLQt.pdf', '2019-01-18 07:10:07', '2019-01-18 07:10:07'),
(2, 9, '', 'public/files/tbywkD7F0c2vnPGbQgqy94PM2mGuft7yaAUVINMs.docx', '2019-01-19 00:02:11', '2019-01-19 00:02:11'),
(3, 10, 'sd', 'public/files/cZtZNsEslap6SnydSoP1fdFGRBBE0q5zWLYdl3Nw.docx', '2019-01-19 00:06:16', '2019-01-19 00:06:16'),
(4, 10, 'sd', 'public/files/erzt9u1siBEiS7qL1yWVZk3d4glTStNrUvqwunfl.png', '2019-01-19 00:07:06', '2019-01-19 00:07:06'),
(5, 12, 'sd', 'public/files/iOqXmKsskaAUl5fXTFRXlIghHUJTd49IK1vdC9Jk.png', '2019-01-19 00:14:47', '2019-01-19 00:14:47'),
(6, 12, 'sd', 'public/files/5dLQSl3FAFJSF26mjbRSqJQH5HhVAEnDi0OQUyJs.png', '2019-01-19 00:15:01', '2019-01-19 00:15:01'),
(7, 14, 'sd', 'public/files/Rq1EDfFIum97PuEPq3DxF7UDY8xK7aW7gnhlOVTX.png', '2019-01-19 01:06:31', '2019-01-19 01:06:31'),
(8, 14, 'sd', 'public/files/9iUd1y6nDLsDiRKkjNTnzBKqYyUKLjNtwf4HZynX.png', '2019-01-19 01:06:36', '2019-01-19 01:06:36'),
(9, 14, 'sd', 'public/files/e22wbRmfWMaTLn4JibMllKA8CFdGYqHXtaPVviz1.png', '2019-01-19 01:06:40', '2019-01-19 01:06:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `giziburukdetails`
--

CREATE TABLE `giziburukdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `giziburukMaster_id` int(11) NOT NULL,
  `puskesmas_id` int(11) NOT NULL,
  `jmlKasus` int(11) NOT NULL,
  `jmlPerawatan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `giziburukdetails`
--

INSERT INTO `giziburukdetails` (`id`, `giziburukMaster_id`, `puskesmas_id`, `jmlKasus`, `jmlPerawatan`, `created_at`, `updated_at`) VALUES
(17, 2, 1, 0, 0, '2018-07-10 17:00:39', '2018-07-10 17:00:39'),
(18, 2, 2, 0, 0, '2018-07-10 17:00:39', '2018-07-10 17:00:39'),
(19, 2, 3, 0, 0, '2018-07-10 17:00:39', '2018-07-10 17:00:39'),
(20, 2, 4, 0, 0, '2018-07-10 17:00:39', '2018-07-10 17:00:39'),
(21, 2, 5, 0, 0, '2018-07-10 17:00:39', '2018-07-10 17:00:39'),
(22, 2, 6, 0, 0, '2018-07-10 17:00:39', '2018-07-10 17:00:39'),
(23, 2, 7, 0, 0, '2018-07-10 17:00:39', '2018-07-10 17:00:39'),
(24, 2, 8, 0, 0, '2018-07-10 17:00:39', '2018-07-10 17:00:39'),
(25, 2, 9, 0, 0, '2018-07-10 17:00:39', '2018-07-10 17:00:39'),
(26, 2, 10, 0, 0, '2018-07-10 17:00:40', '2018-07-10 17:00:40'),
(27, 2, 11, 0, 0, '2018-07-10 17:00:40', '2018-07-10 17:00:40'),
(28, 2, 12, 0, 0, '2018-07-10 17:00:40', '2018-07-10 17:00:40'),
(29, 2, 13, 0, 0, '2018-07-10 17:00:40', '2018-07-10 17:00:40'),
(30, 2, 14, 0, 0, '2018-07-10 17:00:40', '2018-07-10 17:00:40'),
(31, 2, 15, 1, 1, '2018-07-10 17:00:40', '2018-07-10 17:00:40'),
(32, 2, 16, 0, 0, '2018-07-10 17:00:40', '2018-07-10 17:00:40'),
(33, 3, 1, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(34, 3, 2, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(35, 3, 3, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(36, 3, 4, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(37, 3, 5, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(38, 3, 6, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(39, 3, 7, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(40, 3, 8, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(41, 3, 9, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(42, 3, 10, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(43, 3, 11, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(44, 3, 12, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(45, 3, 13, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(46, 3, 14, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(47, 3, 15, 1, 1, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(48, 3, 16, 0, 0, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(49, 4, 1, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(50, 4, 2, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(51, 4, 3, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(52, 4, 4, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(53, 4, 5, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(54, 4, 6, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(55, 4, 7, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(56, 4, 8, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(57, 4, 9, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(58, 4, 10, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(59, 4, 11, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(60, 4, 12, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(61, 4, 13, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(62, 4, 14, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(63, 4, 15, 1, 1, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(64, 4, 16, 0, 0, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(65, 5, 1, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(66, 5, 2, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(67, 5, 3, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(68, 5, 4, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(69, 5, 5, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(70, 5, 6, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(71, 5, 7, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(72, 5, 8, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(73, 5, 9, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(74, 5, 10, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(75, 5, 11, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(76, 5, 12, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(77, 5, 13, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(78, 5, 14, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(79, 5, 15, 1, 1, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(80, 5, 16, 0, 0, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(81, 6, 1, 1, 1, '2018-07-10 17:03:25', '2018-07-10 17:03:25'),
(82, 6, 2, 0, 0, '2018-07-10 17:03:25', '2018-07-10 17:03:25'),
(83, 6, 3, 0, 0, '2018-07-10 17:03:25', '2018-07-10 17:03:25'),
(84, 6, 4, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(85, 6, 5, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(86, 6, 6, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(87, 6, 7, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(88, 6, 8, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(89, 6, 9, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(90, 6, 10, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(91, 6, 11, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(92, 6, 12, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(93, 6, 13, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(94, 6, 14, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(95, 6, 15, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(96, 6, 16, 0, 0, '2018-07-10 17:03:26', '2018-07-10 17:03:26'),
(97, 7, 1, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(98, 7, 2, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(99, 7, 3, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(100, 7, 4, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(101, 7, 5, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(102, 7, 6, 1, 1, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(103, 7, 7, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(104, 7, 8, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(105, 7, 9, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(106, 7, 10, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(107, 7, 11, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(108, 7, 12, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(109, 7, 13, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(110, 7, 14, 0, 0, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(111, 7, 15, 0, 0, '2018-07-10 17:04:35', '2018-07-10 17:04:35'),
(112, 7, 16, 0, 0, '2018-07-10 17:04:35', '2018-07-10 17:04:35'),
(113, 8, 1, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(114, 8, 2, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(115, 8, 3, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(116, 8, 4, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(117, 8, 5, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(118, 8, 6, 1, 1, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(119, 8, 7, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(120, 8, 8, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(121, 8, 9, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(122, 8, 10, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(123, 8, 11, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(124, 8, 12, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(125, 8, 13, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(126, 8, 14, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(127, 8, 15, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(128, 8, 16, 0, 0, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(129, 9, 1, 0, 0, '2018-07-10 17:05:18', '2018-07-10 17:05:18'),
(130, 9, 2, 0, 0, '2018-07-10 17:05:18', '2018-07-10 17:05:18'),
(131, 9, 3, 0, 0, '2018-07-10 17:05:18', '2018-07-10 17:05:18'),
(132, 9, 4, 0, 0, '2018-07-10 17:05:18', '2018-07-10 17:05:18'),
(133, 9, 5, 0, 0, '2018-07-10 17:05:18', '2018-07-10 17:05:18'),
(134, 9, 6, 1, 1, '2018-07-10 17:05:18', '2018-07-10 17:05:18'),
(135, 9, 7, 0, 0, '2018-07-10 17:05:18', '2018-07-10 17:05:18'),
(136, 9, 8, 0, 0, '2018-07-10 17:05:18', '2018-07-10 17:05:18'),
(137, 9, 9, 0, 0, '2018-07-10 17:05:18', '2018-07-10 17:05:18'),
(138, 9, 10, 0, 0, '2018-07-10 17:05:19', '2018-07-10 17:05:19'),
(139, 9, 11, 0, 0, '2018-07-10 17:05:19', '2018-07-10 17:05:19'),
(140, 9, 12, 0, 0, '2018-07-10 17:05:19', '2018-07-10 17:05:19'),
(141, 9, 13, 0, 0, '2018-07-10 17:05:19', '2018-07-10 17:05:19'),
(142, 9, 14, 0, 0, '2018-07-10 17:05:19', '2018-07-10 17:05:19'),
(143, 9, 15, 0, 0, '2018-07-10 17:05:19', '2018-07-10 17:05:19'),
(144, 9, 16, 0, 0, '2018-07-10 17:05:19', '2018-07-10 17:05:19'),
(145, 10, 1, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(146, 10, 2, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(147, 10, 3, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(148, 10, 4, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(149, 10, 5, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(150, 10, 6, 1, 1, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(151, 10, 7, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(152, 10, 8, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(153, 10, 9, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(154, 10, 10, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(155, 10, 11, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(156, 10, 12, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(157, 10, 13, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(158, 10, 14, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(159, 10, 15, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(160, 10, 16, 0, 0, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(161, 11, 1, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(162, 11, 2, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(163, 11, 3, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(164, 11, 4, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(165, 11, 5, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(166, 11, 6, 1, 1, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(167, 11, 7, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(168, 11, 8, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(169, 11, 9, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(170, 11, 10, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(171, 11, 11, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(172, 11, 12, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(173, 11, 13, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(174, 11, 14, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(175, 11, 15, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(176, 11, 16, 0, 0, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(177, 12, 1, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(178, 12, 2, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(179, 12, 3, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(180, 12, 4, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(181, 12, 5, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(182, 12, 6, 1, 1, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(183, 12, 7, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(184, 12, 8, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(185, 12, 9, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(186, 12, 10, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(187, 12, 11, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(188, 12, 12, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(189, 12, 13, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(190, 12, 14, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(191, 12, 15, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(192, 12, 16, 0, 0, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(193, 13, 1, 0, 0, '2018-07-10 17:07:06', '2018-07-10 17:07:06'),
(194, 13, 2, 0, 0, '2018-07-10 17:07:06', '2018-07-10 17:07:06'),
(195, 13, 3, 0, 0, '2018-07-10 17:07:06', '2018-07-10 17:07:06'),
(196, 13, 4, 0, 0, '2018-07-10 17:07:06', '2018-07-10 17:07:06'),
(197, 13, 5, 0, 0, '2018-07-10 17:07:06', '2018-07-10 17:07:06'),
(198, 13, 6, 1, 1, '2018-07-10 17:07:07', '2018-07-10 17:07:07'),
(199, 13, 7, 0, 0, '2018-07-10 17:07:07', '2018-07-10 17:07:07'),
(200, 13, 8, 0, 0, '2018-07-10 17:07:07', '2018-07-10 17:07:07'),
(201, 13, 9, 0, 0, '2018-07-10 17:07:07', '2018-07-10 17:07:07'),
(202, 13, 10, 0, 0, '2018-07-10 17:07:07', '2018-07-10 17:07:07'),
(203, 13, 11, 0, 0, '2018-07-10 17:07:07', '2018-07-10 17:07:07'),
(204, 13, 12, 0, 0, '2018-07-10 17:07:07', '2018-07-10 17:07:07'),
(205, 13, 13, 0, 0, '2018-07-10 17:07:07', '2018-07-10 17:07:07'),
(206, 13, 14, 0, 0, '2018-07-10 17:07:07', '2018-07-10 17:07:07'),
(207, 13, 15, 0, 0, '2018-07-10 17:07:07', '2018-07-10 17:07:07'),
(208, 13, 16, 0, 0, '2018-07-10 17:07:07', '2018-07-10 17:07:07'),
(209, 14, 1, 0, 0, '2018-07-10 17:07:26', '2018-07-10 17:07:26'),
(210, 14, 2, 0, 0, '2018-07-10 17:07:26', '2018-07-10 17:07:26'),
(211, 14, 3, 0, 0, '2018-07-10 17:07:26', '2018-07-10 17:07:26'),
(212, 14, 4, 0, 0, '2018-07-10 17:07:26', '2018-07-10 17:07:26'),
(213, 14, 5, 0, 0, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(214, 14, 6, 1, 1, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(215, 14, 7, 0, 0, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(216, 14, 8, 0, 0, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(217, 14, 9, 0, 0, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(218, 14, 10, 0, 0, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(219, 14, 11, 0, 0, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(220, 14, 12, 0, 0, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(221, 14, 13, 0, 0, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(222, 14, 14, 0, 0, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(223, 14, 15, 0, 0, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(224, 14, 16, 0, 0, '2018-07-10 17:07:27', '2018-07-10 17:07:27'),
(225, 15, 1, 0, 0, '2018-07-10 17:07:54', '2018-07-10 17:07:54'),
(226, 15, 2, 0, 0, '2018-07-10 17:07:54', '2018-07-10 17:07:54'),
(227, 15, 3, 0, 0, '2018-07-10 17:07:54', '2018-07-10 17:07:54'),
(228, 15, 4, 0, 0, '2018-07-10 17:07:54', '2018-07-10 17:07:54'),
(229, 15, 5, 0, 0, '2018-07-10 17:07:54', '2018-07-10 17:07:54'),
(230, 15, 6, 2, 2, '2018-07-10 17:07:54', '2018-07-10 17:07:54'),
(231, 15, 7, 0, 0, '2018-07-10 17:07:54', '2018-07-10 17:07:54'),
(232, 15, 8, 0, 0, '2018-07-10 17:07:54', '2018-07-10 17:07:54'),
(233, 15, 9, 0, 0, '2018-07-10 17:07:54', '2018-07-10 17:07:54'),
(234, 15, 10, 0, 0, '2018-07-10 17:07:54', '2018-07-10 17:07:54'),
(235, 15, 11, 0, 0, '2018-07-10 17:07:55', '2018-07-10 17:07:55'),
(236, 15, 12, 0, 0, '2018-07-10 17:07:55', '2018-07-10 17:07:55'),
(237, 15, 13, 0, 0, '2018-07-10 17:07:55', '2018-07-10 17:07:55'),
(238, 15, 14, 0, 0, '2018-07-10 17:07:55', '2018-07-10 17:07:55'),
(239, 15, 15, 0, 0, '2018-07-10 17:07:55', '2018-07-10 17:07:55'),
(240, 15, 16, 0, 0, '2018-07-10 17:07:55', '2018-07-10 17:07:55'),
(241, 16, 1, 0, 0, '2018-07-10 17:08:24', '2018-07-10 17:08:24'),
(242, 16, 2, 0, 0, '2018-07-10 17:08:24', '2018-07-10 17:08:24'),
(243, 16, 3, 0, 0, '2018-07-10 17:08:24', '2018-07-10 17:08:24'),
(244, 16, 4, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(245, 16, 5, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(246, 16, 6, 1, 1, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(247, 16, 7, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(248, 16, 8, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(249, 16, 9, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(250, 16, 10, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(251, 16, 11, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(252, 16, 12, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(253, 16, 13, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(254, 16, 14, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(255, 16, 15, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(256, 16, 16, 0, 0, '2018-07-10 17:08:25', '2018-07-10 17:08:25'),
(257, 17, 1, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(258, 17, 2, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(259, 17, 3, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(260, 17, 4, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(261, 17, 5, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(262, 17, 6, 1, 1, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(263, 17, 7, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(264, 17, 8, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(265, 17, 9, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(266, 17, 10, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(267, 17, 11, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(268, 17, 12, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(269, 17, 13, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(270, 17, 14, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(271, 17, 15, 0, 0, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(272, 17, 16, 0, 0, '2018-07-10 17:08:52', '2018-07-10 17:08:52'),
(273, 18, 1, 0, 0, '2018-07-10 17:09:13', '2018-07-10 17:09:13'),
(274, 18, 2, 0, 0, '2018-07-10 17:09:13', '2018-07-10 17:09:13'),
(275, 18, 3, 0, 0, '2018-07-10 17:09:13', '2018-07-10 17:09:13'),
(276, 18, 4, 0, 0, '2018-07-10 17:09:13', '2018-07-10 17:09:13'),
(277, 18, 5, 0, 0, '2018-07-10 17:09:13', '2018-07-10 17:09:13'),
(278, 18, 6, 1, 1, '2018-07-10 17:09:13', '2018-07-10 17:09:13'),
(279, 18, 7, 0, 0, '2018-07-10 17:09:13', '2018-07-10 17:09:13'),
(280, 18, 8, 0, 0, '2018-07-10 17:09:14', '2018-07-10 17:09:14'),
(281, 18, 9, 0, 0, '2018-07-10 17:09:14', '2018-07-10 17:09:14'),
(282, 18, 10, 0, 0, '2018-07-10 17:09:14', '2018-07-10 17:09:14'),
(283, 18, 11, 0, 0, '2018-07-10 17:09:14', '2018-07-10 17:09:14'),
(284, 18, 12, 0, 0, '2018-07-10 17:09:14', '2018-07-10 17:09:14'),
(285, 18, 13, 0, 0, '2018-07-10 17:09:14', '2018-07-10 17:09:14'),
(286, 18, 14, 0, 0, '2018-07-10 17:09:14', '2018-07-10 17:09:14'),
(287, 18, 15, 0, 0, '2018-07-10 17:09:14', '2018-07-10 17:09:14'),
(288, 18, 16, 0, 0, '2018-07-10 17:09:14', '2018-07-10 17:09:14'),
(289, 19, 1, 0, 0, '2018-07-10 17:10:44', '2018-07-10 17:10:44'),
(290, 19, 2, 0, 0, '2018-07-10 17:10:44', '2018-07-10 17:10:44'),
(291, 19, 3, 0, 0, '2018-07-10 17:10:44', '2018-07-10 17:10:44'),
(292, 19, 4, 1, 1, '2018-07-10 17:10:44', '2018-07-10 17:10:44'),
(293, 19, 5, 0, 0, '2018-07-10 17:10:44', '2018-07-10 17:10:44'),
(294, 19, 6, 0, 0, '2018-07-10 17:10:44', '2018-07-10 17:10:44'),
(295, 19, 7, 0, 0, '2018-07-10 17:10:44', '2018-07-10 17:10:44'),
(296, 19, 8, 0, 0, '2018-07-10 17:10:44', '2018-07-10 17:10:44'),
(297, 19, 9, 0, 0, '2018-07-10 17:10:44', '2018-07-10 17:10:44'),
(298, 19, 10, 0, 0, '2018-07-10 17:10:44', '2018-07-10 17:10:44'),
(299, 19, 11, 0, 0, '2018-07-10 17:10:45', '2018-07-10 17:10:45'),
(300, 19, 12, 0, 0, '2018-07-10 17:10:45', '2018-07-10 17:10:45'),
(301, 19, 13, 0, 0, '2018-07-10 17:10:45', '2018-07-10 17:10:45'),
(302, 19, 14, 0, 0, '2018-07-10 17:10:45', '2018-07-10 17:10:45'),
(303, 19, 15, 0, 0, '2018-07-10 17:10:45', '2018-07-10 17:10:45'),
(304, 19, 16, 0, 0, '2018-07-10 17:10:45', '2018-07-10 17:10:45'),
(305, 20, 1, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(306, 20, 2, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(307, 20, 3, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(308, 20, 4, 1, 1, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(309, 20, 5, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(310, 20, 6, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(311, 20, 7, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(312, 20, 8, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(313, 20, 9, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(314, 20, 10, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(315, 20, 11, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(316, 20, 12, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(317, 20, 13, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(318, 20, 14, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(319, 20, 15, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(320, 20, 16, 0, 0, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(321, 21, 1, 0, 0, '2018-07-10 17:11:29', '2018-07-10 17:11:29'),
(322, 21, 2, 0, 0, '2018-07-10 17:11:29', '2018-07-10 17:11:29'),
(323, 21, 3, 0, 0, '2018-07-10 17:11:29', '2018-07-10 17:11:29'),
(324, 21, 4, 1, 1, '2018-07-10 17:11:29', '2018-07-10 17:11:29'),
(325, 21, 5, 0, 0, '2018-07-10 17:11:29', '2018-07-10 17:11:29'),
(326, 21, 6, 0, 0, '2018-07-10 17:11:29', '2018-07-10 17:11:29'),
(327, 21, 7, 0, 0, '2018-07-10 17:11:29', '2018-07-10 17:11:29'),
(328, 21, 8, 0, 0, '2018-07-10 17:11:30', '2018-07-10 17:11:30'),
(329, 21, 9, 0, 0, '2018-07-10 17:11:30', '2018-07-10 17:11:30'),
(330, 21, 10, 0, 0, '2018-07-10 17:11:30', '2018-07-10 17:11:30'),
(331, 21, 11, 0, 0, '2018-07-10 17:11:30', '2018-07-10 17:11:30'),
(332, 21, 12, 0, 0, '2018-07-10 17:11:30', '2018-07-10 17:11:30'),
(333, 21, 13, 0, 0, '2018-07-10 17:11:30', '2018-07-10 17:11:30'),
(334, 21, 14, 0, 0, '2018-07-10 17:11:30', '2018-07-10 17:11:30'),
(335, 21, 15, 0, 0, '2018-07-10 17:11:30', '2018-07-10 17:11:30'),
(336, 21, 16, 0, 0, '2018-07-10 17:11:30', '2018-07-10 17:11:30'),
(337, 22, 1, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(338, 22, 2, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(339, 22, 3, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(340, 22, 4, 1, 1, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(341, 22, 5, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(342, 22, 6, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(343, 22, 7, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(344, 22, 8, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(345, 22, 9, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(346, 22, 10, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(347, 22, 11, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(348, 22, 12, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(349, 22, 13, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(350, 22, 14, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(351, 22, 15, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(352, 22, 16, 0, 0, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(353, 23, 1, 2, 0, '2019-01-25 00:16:26', '2019-01-25 00:16:26'),
(354, 23, 2, 0, 0, '2019-01-25 00:16:26', '2019-01-25 00:16:26'),
(355, 23, 3, 0, 0, '2019-01-25 00:16:26', '2019-01-25 00:16:26'),
(356, 23, 4, 0, 0, '2019-01-25 00:16:26', '2019-01-25 00:16:26'),
(357, 23, 5, 0, 0, '2019-01-25 00:16:26', '2019-01-25 00:16:26'),
(358, 23, 6, 0, 0, '2019-01-25 00:16:26', '2019-01-25 00:16:26'),
(359, 23, 7, 0, 0, '2019-01-25 00:16:26', '2019-01-25 00:16:26'),
(360, 23, 8, 0, 0, '2019-01-25 00:16:27', '2019-01-25 00:16:27'),
(361, 23, 9, 0, 0, '2019-01-25 00:16:27', '2019-01-25 00:16:27'),
(362, 23, 10, 0, 0, '2019-01-25 00:16:27', '2019-01-25 00:16:27'),
(363, 23, 11, 0, 0, '2019-01-25 00:16:27', '2019-01-25 00:16:27'),
(364, 23, 12, 0, 0, '2019-01-25 00:16:27', '2019-01-25 00:16:27'),
(365, 23, 13, 0, 0, '2019-01-25 00:16:27', '2019-01-25 00:16:27'),
(366, 23, 14, 0, 0, '2019-01-25 00:16:27', '2019-01-25 00:16:27'),
(367, 23, 15, 0, 0, '2019-01-25 00:16:27', '2019-01-25 00:16:27'),
(368, 23, 16, 0, 0, '2019-01-25 00:16:27', '2019-01-25 00:16:27'),
(369, 24, 1, 0, 0, '2019-01-26 00:50:06', '2019-01-26 00:50:06'),
(370, 24, 2, 0, 0, '2019-01-26 00:50:06', '2019-01-26 00:50:06'),
(371, 24, 3, 0, 6, '2019-01-26 00:50:06', '2019-01-26 02:20:43'),
(372, 24, 4, 0, 0, '2019-01-26 00:50:06', '2019-01-26 00:50:06'),
(373, 24, 5, 0, 0, '2019-01-26 00:50:06', '2019-01-26 00:50:06'),
(374, 24, 6, 0, 0, '2019-01-26 00:50:06', '2019-01-26 00:50:06'),
(375, 24, 7, 0, 0, '2019-01-26 00:50:07', '2019-01-26 00:50:07'),
(376, 24, 8, 0, 0, '2019-01-26 00:50:07', '2019-01-26 00:50:07'),
(377, 24, 9, 0, 0, '2019-01-26 00:50:07', '2019-01-26 00:50:07'),
(378, 24, 10, 0, 0, '2019-01-26 00:50:07', '2019-01-26 00:50:07'),
(379, 24, 11, 0, 0, '2019-01-26 00:50:07', '2019-01-26 00:50:07'),
(380, 24, 12, 0, 0, '2019-01-26 00:50:07', '2019-01-26 00:50:07'),
(381, 24, 13, 0, 0, '2019-01-26 00:50:07', '2019-01-26 00:50:07'),
(382, 24, 14, 0, 0, '2019-01-26 00:50:07', '2019-01-26 00:50:07'),
(383, 24, 15, 0, 0, '2019-01-26 00:50:07', '2019-01-26 00:50:07'),
(384, 24, 16, 0, 0, '2019-01-26 00:50:07', '2019-01-26 00:50:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `giziburukmasters`
--

CREATE TABLE `giziburukmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `totalKasus` int(11) NOT NULL,
  `totalPerawatan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `giziburukmasters`
--

INSERT INTO `giziburukmasters` (`id`, `ta`, `bln`, `totalKasus`, `totalPerawatan`, `created_at`, `updated_at`) VALUES
(2, 2015, 2, 1, 1, '2018-07-10 17:00:39', '2018-07-10 17:00:39'),
(3, 2015, 6, 1, 1, '2018-07-10 17:01:14', '2018-07-10 17:01:14'),
(4, 2015, 8, 1, 1, '2018-07-10 17:02:07', '2018-07-10 17:02:07'),
(5, 2015, 11, 1, 1, '2018-07-10 17:02:33', '2018-07-10 17:02:33'),
(6, 2015, 11, 1, 1, '2018-07-10 17:03:25', '2018-07-10 17:03:25'),
(7, 2015, 1, 1, 1, '2018-07-10 17:04:34', '2018-07-10 17:04:34'),
(8, 2015, 2, 1, 1, '2018-07-10 17:04:57', '2018-07-10 17:04:57'),
(9, 2015, 3, 1, 1, '2018-07-10 17:05:18', '2018-07-10 17:05:18'),
(10, 2015, 1, 1, 1, '2018-07-10 17:05:54', '2018-07-10 17:05:54'),
(11, 2015, 5, 1, 1, '2018-07-10 17:06:17', '2018-07-10 17:06:17'),
(12, 2015, 6, 1, 1, '2018-07-10 17:06:44', '2018-07-10 17:06:44'),
(13, 2015, 7, 1, 1, '2018-07-10 17:07:06', '2018-07-10 17:07:06'),
(14, 2015, 8, 1, 1, '2018-07-10 17:07:26', '2018-07-10 17:07:26'),
(15, 2015, 9, 2, 2, '2018-07-10 17:07:54', '2018-07-10 17:07:54'),
(16, 2015, 10, 1, 1, '2018-07-10 17:08:24', '2018-07-10 17:08:24'),
(17, 2015, 11, 1, 1, '2018-07-10 17:08:51', '2018-07-10 17:08:51'),
(18, 2015, 12, 1, 1, '2018-07-10 17:09:13', '2018-07-10 17:09:13'),
(19, 2015, 1, 1, 1, '2018-07-10 17:10:44', '2018-07-10 17:10:44'),
(20, 2015, 2, 1, 1, '2018-07-10 17:11:07', '2018-07-10 17:11:07'),
(21, 2015, 3, 1, 1, '2018-07-10 17:11:29', '2018-07-10 17:11:29'),
(22, 2015, 4, 1, 1, '2018-07-10 17:11:51', '2018-07-10 17:11:51'),
(23, 2018, 1, 2, 0, '2019-01-25 00:16:26', '2019-01-25 00:16:26'),
(24, 2018, 1, 0, 6, '2019-01-26 00:50:06', '2019-01-26 02:20:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongans`
--

CREATE TABLE `golongans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalGol` int(11) NOT NULL,
  `golI` int(11) NOT NULL,
  `golII` int(11) NOT NULL,
  `golIII` int(11) NOT NULL,
  `golIV` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `golongans`
--

INSERT INTO `golongans` (`id`, `ta`, `totalGol`, `golI`, `golII`, `golIII`, `golIV`, `created_at`, `updated_at`) VALUES
(1, 2017, 6053, 33, 946, 3129, 1945, '2018-07-17 21:38:33', '2019-01-20 09:23:15'),
(2, 2016, 6898, 42, 1089, 3568, 2199, '2018-07-17 21:43:45', '2018-07-17 21:43:45'),
(3, 2015, 7038, 44, 1246, 3522, 2226, '2018-07-17 21:49:00', '2018-07-17 21:49:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guruhonordetails`
--

CREATE TABLE `guruhonordetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `guruHonorMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlGuruHonor` int(11) NOT NULL,
  `jmlGuruTKHonor` int(11) NOT NULL,
  `jmlGuruSDHonor` int(11) NOT NULL,
  `jmlGuruSMPHonor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guruhonordetails`
--

INSERT INTO `guruhonordetails` (`id`, `guruHonorMaster_id`, `kecamatan_id`, `jmlGuruHonor`, `jmlGuruTKHonor`, `jmlGuruSDHonor`, `jmlGuruSMPHonor`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 296, 66, 187, 43, '2018-07-17 19:54:25', '2018-07-17 19:54:25'),
(2, 1, 2, 155, 25, 104, 26, '2018-07-17 19:54:25', '2018-07-17 19:54:25'),
(3, 1, 3, 141, 28, 93, 20, '2018-07-17 19:54:25', '2018-07-17 19:54:25'),
(4, 1, 4, 223, 28, 153, 42, '2018-07-17 19:54:25', '2018-07-17 19:54:25'),
(5, 1, 5, 201, 33, 140, 28, '2018-07-17 19:54:25', '2018-07-17 19:54:25'),
(6, 1, 6, 173, 45, 110, 18, '2018-07-17 19:54:25', '2018-07-17 19:54:25'),
(7, 1, 7, 164, 29, 118, 17, '2018-07-17 19:54:26', '2018-07-17 19:54:26'),
(8, 1, 8, 291, 7, 191, 93, '2018-07-17 19:54:26', '2018-07-17 19:54:26'),
(9, 1, 9, 125, 37, 79, 9, '2018-07-17 19:54:26', '2018-07-17 19:54:26'),
(10, 1, 10, 270, 30, 187, 53, '2018-07-17 19:54:26', '2018-07-17 19:54:26'),
(11, 1, 11, 121, 15, 82, 24, '2018-07-17 19:54:26', '2018-07-17 19:54:26'),
(12, 1, 12, 113, 9, 71, 33, '2018-07-17 19:54:26', '2018-07-17 19:54:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guruhonormasters`
--

CREATE TABLE `guruhonormasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalGuruHonor` int(11) NOT NULL,
  `totalGuruTKHonor` int(11) NOT NULL,
  `totalGuruSDHonor` int(11) NOT NULL,
  `totalGuruSMPHonor` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guruhonormasters`
--

INSERT INTO `guruhonormasters` (`id`, `ta`, `totalGuruHonor`, `totalGuruTKHonor`, `totalGuruSDHonor`, `totalGuruSMPHonor`, `created_at`, `updated_at`) VALUES
(1, 2017, 2273, 352, 1515, 406, '2018-07-17 19:54:25', '2018-07-17 19:54:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurupnsdetails`
--

CREATE TABLE `gurupnsdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `guruPNSMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlGuruPNS` int(11) NOT NULL,
  `jmlGuruTKPNS` int(11) NOT NULL,
  `jmlGuruSDPNS` int(11) NOT NULL,
  `jmlGuruSMPPNS` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurupnsdetails`
--

INSERT INTO `gurupnsdetails` (`id`, `guruPNSMaster_id`, `kecamatan_id`, `jmlGuruPNS`, `jmlGuruTKPNS`, `jmlGuruSDPNS`, `jmlGuruSMPPNS`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 579, 0, 394, 185, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(2, 1, 2, 287, 0, 202, 85, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(3, 1, 3, 322, 0, 228, 94, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(4, 1, 4, 423, 0, 305, 118, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(5, 1, 5, 386, 0, 293, 93, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(6, 1, 6, 290, 0, 206, 84, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(7, 1, 7, 378, 0, 274, 104, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(8, 1, 8, 493, 0, 386, 107, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(9, 1, 9, 191, 0, 150, 41, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(10, 1, 10, 368, 0, 367, 137, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(11, 1, 11, 156, 0, 148, 85, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(12, 1, 12, 177, 0, 110, 67, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(13, 2, 1, 579, 0, 394, 185, '2018-07-12 06:22:51', '2018-07-12 06:22:51'),
(14, 2, 2, 287, 0, 202, 85, '2018-07-12 06:22:51', '2018-07-12 06:22:51'),
(15, 2, 3, 322, 0, 228, 94, '2018-07-12 06:22:51', '2018-07-12 06:22:51'),
(16, 2, 4, 423, 0, 305, 118, '2018-07-12 06:22:51', '2018-07-12 06:22:51'),
(17, 2, 5, 386, 0, 293, 93, '2018-07-12 06:22:51', '2018-07-12 06:22:51'),
(18, 2, 6, 290, 0, 206, 84, '2018-07-12 06:22:52', '2018-07-12 06:22:52'),
(19, 2, 7, 378, 0, 274, 104, '2018-07-12 06:22:52', '2018-07-12 06:22:52'),
(20, 2, 8, 493, 0, 386, 107, '2018-07-12 06:22:52', '2018-07-12 06:22:52'),
(21, 2, 9, 191, 0, 150, 41, '2018-07-12 06:22:52', '2018-07-12 06:22:52'),
(22, 2, 10, 368, 0, 367, 137, '2018-07-12 06:22:52', '2018-07-12 06:22:52'),
(23, 2, 11, 156, 0, 148, 85, '2018-07-12 06:22:52', '2018-07-12 06:22:52'),
(24, 2, 12, 176, 0, 109, 67, '2018-07-12 06:22:52', '2018-07-12 06:22:52'),
(25, 3, 1, 1, 0, 0, 1, '2019-01-25 02:02:17', '2019-01-25 02:02:17'),
(26, 3, 2, 0, 0, 0, 0, '2019-01-25 02:02:17', '2019-01-25 02:02:17'),
(27, 3, 3, 0, 0, 0, 0, '2019-01-25 02:02:17', '2019-01-25 02:02:17'),
(28, 3, 4, 0, 0, 0, 0, '2019-01-25 02:02:17', '2019-01-25 02:02:17'),
(29, 3, 5, 0, 0, 0, 0, '2019-01-25 02:02:17', '2019-01-25 02:02:17'),
(30, 3, 6, 0, 0, 0, 0, '2019-01-25 02:02:17', '2019-01-25 02:02:17'),
(31, 3, 7, 0, 0, 0, 0, '2019-01-25 02:02:17', '2019-01-25 02:02:17'),
(32, 3, 8, 0, 0, 0, 0, '2019-01-25 02:02:18', '2019-01-25 02:02:18'),
(33, 3, 9, 0, 0, 0, 0, '2019-01-25 02:02:18', '2019-01-25 02:02:18'),
(34, 3, 10, 0, 0, 0, 0, '2019-01-25 02:02:18', '2019-01-25 02:02:18'),
(35, 3, 11, 0, 0, 0, 0, '2019-01-25 02:02:18', '2019-01-25 02:02:18'),
(36, 3, 12, 0, 0, 0, 0, '2019-01-25 02:02:18', '2019-01-25 02:02:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurupnsmasters`
--

CREATE TABLE `gurupnsmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalGuruPNS` int(11) NOT NULL,
  `totalGuruTKPNS` int(11) NOT NULL,
  `totalGuruSDPNS` int(11) NOT NULL,
  `totalGuruSMPPNS` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurupnsmasters`
--

INSERT INTO `gurupnsmasters` (`id`, `ta`, `totalGuruPNS`, `totalGuruTKPNS`, `totalGuruSDPNS`, `totalGuruSMPPNS`, `created_at`, `updated_at`) VALUES
(1, 2016, 4050, 0, 3063, 1200, '2018-07-12 06:18:45', '2019-01-19 23:17:36'),
(2, 2017, 4049, 0, 3062, 1200, '2018-07-12 06:22:51', '2018-07-12 06:22:51'),
(3, 2018, 1, 0, 0, 1, '2019-01-25 02:02:17', '2019-01-25 02:02:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurusertifikatdetails`
--

CREATE TABLE `gurusertifikatdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `guruSertifikatMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlGuruSertifikat` int(11) NOT NULL,
  `jmlGuruTKSertifikat` int(11) NOT NULL,
  `jmlGuruSDSertifikat` int(11) NOT NULL,
  `jmlGuruSMPSertifikat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurusertifikatdetails`
--

INSERT INTO `gurusertifikatdetails` (`id`, `guruSertifikatMaster_id`, `kecamatan_id`, `jmlGuruSertifikat`, `jmlGuruTKSertifikat`, `jmlGuruSDSertifikat`, `jmlGuruSMPSertifikat`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 300, 0, 182, 118, '2018-07-17 19:46:06', '2018-07-17 19:46:06'),
(2, 1, 2, 152, 0, 108, 44, '2018-07-17 19:46:06', '2018-07-17 19:46:06'),
(3, 1, 3, 178, 0, 127, 51, '2018-07-17 19:46:06', '2018-07-17 19:46:06'),
(4, 1, 4, 223, 0, 154, 69, '2018-07-17 19:46:07', '2018-07-17 19:46:07'),
(5, 1, 5, 177, 0, 119, 58, '2018-07-17 19:46:07', '2018-07-17 19:46:07'),
(6, 1, 6, 137, 0, 97, 40, '2018-07-17 19:46:07', '2018-07-17 19:46:07'),
(7, 1, 7, 207, 0, 147, 60, '2018-07-17 19:46:07', '2018-07-17 19:46:07'),
(8, 1, 8, 217, 0, 171, 46, '2018-07-17 19:46:07', '2018-07-17 19:46:07'),
(9, 1, 9, 106, 0, 83, 23, '2018-07-17 19:46:07', '2018-07-17 19:46:07'),
(10, 1, 10, 234, 0, 164, 70, '2018-07-17 19:46:07', '2018-07-17 19:46:07'),
(11, 1, 11, 112, 0, 71, 41, '2018-07-17 19:46:07', '2018-07-17 19:46:07'),
(12, 1, 12, 56, 0, 46, 10, '2018-07-17 19:46:07', '2018-07-17 19:46:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gurusertifikatmasters`
--

CREATE TABLE `gurusertifikatmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalGuruSertifikat` int(11) NOT NULL,
  `totalGuruTKSertifikat` int(11) NOT NULL,
  `totalGuruSDSertifikat` int(11) NOT NULL,
  `totalGuruSMPSertifikat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurusertifikatmasters`
--

INSERT INTO `gurusertifikatmasters` (`id`, `ta`, `totalGuruSertifikat`, `totalGuruTKSertifikat`, `totalGuruSDSertifikat`, `totalGuruSMPSertifikat`, `created_at`, `updated_at`) VALUES
(1, 2017, 2099, 0, 1469, 630, '2018-07-17 19:46:06', '2018-07-17 19:46:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlWisma` int(11) NOT NULL,
  `jmlHotel` int(11) NOT NULL,
  `jmlMelati1` int(11) NOT NULL,
  `jmlMelati2` int(11) NOT NULL,
  `jmlMelati3` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hotels`
--

INSERT INTO `hotels` (`id`, `ta`, `jmlWisma`, `jmlHotel`, `jmlMelati1`, `jmlMelati2`, `jmlMelati3`, `created_at`, `updated_at`) VALUES
(1, 2018, 6, 0, 0, 0, 0, '2019-01-25 04:35:17', '2019-01-25 04:35:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikanasindetails`
--

CREATE TABLE `ikanasindetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `ikanasinMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlProduksi` int(11) NOT NULL,
  `jmlLaut` int(11) NOT NULL,
  `jmlDarat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ikanasindetails`
--

INSERT INTO `ikanasindetails` (`id`, `ikanasinMaster_id`, `kecamatan_id`, `jmlProduksi`, `jmlLaut`, `jmlDarat`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 44, 40, 4, '2018-07-22 23:34:02', '2018-07-22 23:34:02'),
(2, 1, 2, 2, 1, 1, '2018-07-22 23:34:02', '2018-07-22 23:34:02'),
(3, 1, 3, 1011, 996, 15, '2018-07-22 23:34:02', '2018-07-22 23:34:02'),
(4, 1, 4, 32, 24, 8, '2018-07-22 23:34:02', '2018-07-22 23:34:02'),
(5, 1, 5, 4, 3, 1, '2018-07-22 23:34:02', '2018-07-22 23:34:02'),
(6, 1, 6, 438, 430, 8, '2018-07-22 23:34:02', '2018-07-22 23:34:02'),
(7, 1, 7, 1172, 4, 1168, '2018-07-22 23:34:02', '2019-01-21 17:08:36'),
(8, 1, 8, 426, 422, 4, '2018-07-22 23:34:02', '2018-07-22 23:34:02'),
(9, 1, 9, 309, 302, 7, '2018-07-22 23:34:02', '2018-07-22 23:34:02'),
(10, 1, 10, 324, 314, 10, '2018-07-22 23:34:02', '2018-07-22 23:34:02'),
(11, 1, 11, 150, 147, 3, '2018-07-22 23:34:02', '2018-07-22 23:34:02'),
(12, 1, 12, 1, 1, 0, '2018-07-22 23:34:02', '2018-07-22 23:34:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikanasinmasters`
--

CREATE TABLE `ikanasinmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalProduksi` int(11) NOT NULL,
  `totalLaut` int(11) NOT NULL,
  `totalDarat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ikanasinmasters`
--

INSERT INTO `ikanasinmasters` (`id`, `ta`, `totalProduksi`, `totalLaut`, `totalDarat`, `created_at`, `updated_at`) VALUES
(1, 2017, 3913, 2684, 1229, '2018-07-22 23:34:02', '2019-01-21 17:08:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikansegardetails`
--

CREATE TABLE `ikansegardetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `ikansegarMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlProduksi` int(11) NOT NULL,
  `jmlTambak` int(11) NOT NULL,
  `jmlKolam` int(11) NOT NULL,
  `jmlSawah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ikansegardetails`
--

INSERT INTO `ikansegardetails` (`id`, `ikansegarMaster_id`, `kecamatan_id`, `jmlProduksi`, `jmlTambak`, `jmlKolam`, `jmlSawah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 52, 25, 1, 26, '2018-07-22 23:15:28', '2018-07-22 23:15:28'),
(2, 1, 2, 96, 45, 3, 48, '2018-07-22 23:15:28', '2018-07-22 23:15:28'),
(3, 1, 3, 5129, 5109, 20, 0, '2018-07-22 23:15:28', '2018-07-22 23:15:28'),
(4, 1, 4, 390, 0, 386, 4, '2018-07-22 23:15:28', '2018-07-22 23:15:28'),
(5, 1, 5, 17, 0, 11, 6, '2018-07-22 23:15:28', '2018-07-22 23:15:28'),
(6, 1, 6, 2171, 2131, 38, 2, '2018-07-22 23:15:29', '2018-07-22 23:15:29'),
(7, 1, 7, 26, 0, 23, 3, '2018-07-22 23:15:29', '2018-07-22 23:15:29'),
(8, 1, 8, 134, 119, 15, 0, '2018-07-22 23:15:29', '2018-07-22 23:15:29'),
(9, 1, 9, 1015, 969, 26, 20, '2018-07-22 23:15:29', '2018-07-22 23:15:29'),
(10, 1, 10, 3427, 3294, 130, 3, '2018-07-22 23:15:29', '2018-07-22 23:15:29'),
(11, 1, 11, 1654, 1211, 436, 7, '2018-07-22 23:15:29', '2019-01-21 18:35:46'),
(12, 1, 12, 6, 0, 5, 1, '2018-07-22 23:15:29', '2018-07-22 23:15:29'),
(13, 2, 1, 65, 0, 56, 9, '2018-07-22 23:30:16', '2018-07-22 23:30:16'),
(14, 2, 2, 178, 0, 171, 7, '2018-07-22 23:30:16', '2018-07-22 23:30:16'),
(15, 2, 3, 6986, 6950, 35, 1, '2018-07-22 23:30:16', '2018-07-22 23:30:16'),
(16, 2, 4, 1068, 0, 1049, 19, '2018-07-22 23:30:16', '2018-07-22 23:30:16'),
(17, 2, 5, 30, 0, 24, 6, '2018-07-22 23:30:16', '2018-07-22 23:30:16'),
(18, 2, 6, 6329, 6099, 208, 22, '2018-07-22 23:30:16', '2018-07-22 23:30:16'),
(19, 2, 7, 61, 0, 51, 10, '2018-07-22 23:30:16', '2018-07-22 23:30:16'),
(20, 2, 8, 636, 605, 31, 0, '2018-07-22 23:30:16', '2018-07-22 23:30:16'),
(21, 2, 9, 2590, 2487, 85, 18, '2018-07-22 23:30:16', '2018-07-22 23:30:16'),
(22, 2, 10, 9008, 8590, 406, 12, '2018-07-22 23:30:16', '2018-07-22 23:30:16'),
(23, 2, 11, 4420, 2866, 1524, 30, '2018-07-22 23:30:16', '2018-07-22 23:30:16'),
(24, 2, 12, 105, 0, 104, 1, '2018-07-22 23:30:16', '2018-07-22 23:30:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikansegarmasters`
--

CREATE TABLE `ikansegarmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalProduksi` int(11) NOT NULL,
  `totalTambak` int(11) NOT NULL,
  `totalKolam` int(11) NOT NULL,
  `totalSawah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ikansegarmasters`
--

INSERT INTO `ikansegarmasters` (`id`, `ta`, `totalProduksi`, `totalTambak`, `totalKolam`, `totalSawah`, `created_at`, `updated_at`) VALUES
(1, 2018, 14117, 12903, 1094, 120, '2018-07-22 23:15:28', '2019-01-21 18:35:46'),
(2, 2017, 31476, 27597, 3744, 135, '2018-07-22 23:30:16', '2018-07-22 23:30:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `internetdetails`
--

CREATE TABLE `internetdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `internetMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlDesaterlayani` int(11) NOT NULL,
  `jmlDesabelumterlayani` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `internetdetails`
--

INSERT INTO `internetdetails` (`id`, `internetMaster_id`, `kecamatan_id`, `jmlDesaterlayani`, `jmlDesabelumterlayani`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 6, '2019-01-25 03:10:16', '2019-01-25 03:10:16'),
(2, 1, 2, 0, 0, '2019-01-25 03:10:16', '2019-01-25 03:10:16'),
(3, 1, 3, 0, 0, '2019-01-25 03:10:16', '2019-01-25 03:10:16'),
(4, 1, 4, 0, 0, '2019-01-25 03:10:16', '2019-01-25 03:10:16'),
(5, 1, 5, 0, 0, '2019-01-25 03:10:16', '2019-01-25 03:10:16'),
(6, 1, 6, 0, 0, '2019-01-25 03:10:17', '2019-01-25 03:10:17'),
(7, 1, 7, 0, 0, '2019-01-25 03:10:17', '2019-01-25 03:10:17'),
(8, 1, 8, 0, 0, '2019-01-25 03:10:17', '2019-01-25 03:10:17'),
(9, 1, 9, 0, 0, '2019-01-25 03:10:17', '2019-01-25 03:10:17'),
(10, 1, 10, 0, 0, '2019-01-25 03:10:17', '2019-01-25 03:10:17'),
(11, 1, 11, 0, 0, '2019-01-25 03:10:17', '2019-01-25 03:10:17'),
(12, 1, 12, 0, 0, '2019-01-25 03:10:17', '2019-01-25 03:10:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `internetmasters`
--

CREATE TABLE `internetmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalDesaterlayani` int(11) NOT NULL,
  `totalDesabelumterlayani` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `internetmasters`
--

INSERT INTO `internetmasters` (`id`, `ta`, `totalDesaterlayani`, `totalDesabelumterlayani`, `created_at`, `updated_at`) VALUES
(1, 2018, 0, 6, '2019-01-25 03:10:16', '2019-01-25 03:10:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `irigasidetails`
--

CREATE TABLE `irigasidetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `irigasiMaster_id` int(11) NOT NULL,
  `uptd_psda_id` int(11) NOT NULL,
  `jmlTersier` int(11) NOT NULL,
  `jmlSekunder` int(11) NOT NULL,
  `jmlInduk` int(11) NOT NULL,
  `jmlKuarter` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `irigasidetails`
--

INSERT INTO `irigasidetails` (`id`, `irigasiMaster_id`, `uptd_psda_id`, `jmlTersier`, `jmlSekunder`, `jmlInduk`, `jmlKuarter`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 88, 59, 17, 378, '2018-07-06 03:00:48', '2018-07-06 03:00:48'),
(2, 1, 2, 65, 33, 14, 122, '2018-07-06 03:00:48', '2018-07-06 03:00:48'),
(3, 1, 3, 56, 48, 0, 221, '2018-07-06 03:00:48', '2018-07-06 03:00:48'),
(4, 1, 4, 31, 60, 0, 62, '2018-07-06 03:00:48', '2018-07-06 03:00:48'),
(5, 1, 5, 88, 61, 0, 77, '2018-07-06 03:00:48', '2018-07-06 03:00:48'),
(6, 1, 6, 30, 37, 0, 30, '2018-07-06 03:00:48', '2018-07-06 03:00:48'),
(7, 1, 7, 61, 56, 0, 205, '2018-07-06 03:00:48', '2018-07-06 03:00:48'),
(8, 1, 8, 54, 52, 16, 172, '2018-07-06 03:00:48', '2018-07-06 03:00:48'),
(9, 2, 1, 89, 60, 17, 178, '2018-07-06 03:05:09', '2018-07-06 03:05:09'),
(10, 2, 2, 111, 59, 14, 77, '2018-07-06 03:05:09', '2018-07-06 03:05:09'),
(11, 2, 3, 47, 33, 0, 122, '2018-07-06 03:05:09', '2018-07-06 03:05:09'),
(12, 2, 4, 78, 36, 0, 29, '2018-07-06 03:05:09', '2018-07-06 03:05:09'),
(13, 2, 5, 104, 53, 0, 102, '2018-07-06 03:05:09', '2018-07-06 03:05:09'),
(14, 2, 6, 64, 47, 0, 120, '2018-07-06 03:05:09', '2018-07-06 03:05:09'),
(15, 2, 7, 71, 52, 0, 104, '2018-07-06 03:05:09', '2018-07-06 03:05:09'),
(16, 2, 8, 102, 55, 15, 62, '2018-07-06 03:05:09', '2019-01-21 08:24:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `irigasimasters`
--

CREATE TABLE `irigasimasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalTersier` int(11) NOT NULL,
  `totalSekunder` int(11) NOT NULL,
  `totalInduk` int(11) NOT NULL,
  `totalKuarter` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `irigasimasters`
--

INSERT INTO `irigasimasters` (`id`, `ta`, `totalTersier`, `totalSekunder`, `totalInduk`, `totalKuarter`, `created_at`, `updated_at`) VALUES
(1, 2014, 473, 406, 47, 1267, '2018-07-06 03:00:48', '2018-07-06 03:00:48'),
(2, 2015, 666, 395, 46, 794, '2018-07-06 03:05:09', '2019-01-21 08:24:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jagungdetails`
--

CREATE TABLE `jagungdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `jagungMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlTanam` int(11) NOT NULL,
  `jmlPanen` int(11) NOT NULL,
  `jmlProduksi` int(11) NOT NULL,
  `jmlProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jagungdetails`
--

INSERT INTO `jagungdetails` (`id`, `jagungMaster_id`, `kecamatan_id`, `jmlTanam`, `jmlPanen`, `jmlProduksi`, `jmlProduktivitas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10, 9, 67, 75, '2018-07-18 16:38:05', '2018-07-18 16:38:05'),
(2, 1, 2, 59, 39, 291, 0, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(3, 1, 3, 409, 187, 1394, 0, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(4, 1, 4, 1998, 1854, 13822, 0, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(5, 1, 5, 85, 37, 283, 0, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(6, 1, 6, 85, 11, 82, 0, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(7, 1, 7, 160, 83, 619, 0, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(8, 1, 8, 3225, 2395, 17855, 0, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(9, 1, 9, 991, 485, 3616, 0, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(10, 1, 10, 2830, 2257, 16826, 0, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(11, 1, 11, 1831, 995, 7418, 0, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(12, 1, 12, 4276, 4126, 30759, 0, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(13, 2, 1, 63, 46, 305, 66, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(14, 2, 2, 270, 271, 1799, 0, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(15, 2, 3, 687, 584, 3876, 0, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(16, 2, 4, 2301, 1966, 13048, 0, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(17, 2, 5, 181, 173, 1148, 0, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(18, 2, 6, 102, 166, 1102, 0, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(19, 2, 7, 1474, 943, 6259, 0, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(20, 2, 8, 5452, 5102, 33862, 0, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(21, 2, 9, 951, 1143, 7586, 0, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(22, 2, 10, 3494, 3523, 23382, 0, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(23, 2, 11, 1424, 1598, 10606, 0, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(24, 2, 12, 5478, 5279, 35037, 0, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(25, 3, 1, 14, 27, 220, 70, '2018-07-18 18:14:25', '2018-07-18 18:14:25'),
(26, 3, 2, 171, 44, 358, 0, '2018-07-18 18:14:25', '2018-07-18 18:14:25'),
(27, 3, 3, 426, 515, 4196, 0, '2018-07-18 18:14:25', '2018-07-18 18:14:25'),
(28, 3, 4, 1461, 2100, 17109, 0, '2018-07-18 18:14:25', '2018-07-18 18:14:25'),
(29, 3, 5, 68, 82, 668, 0, '2018-07-18 18:14:25', '2018-07-18 18:14:25'),
(30, 3, 6, 103, 18, 147, 0, '2018-07-18 18:14:25', '2018-07-18 18:14:25'),
(31, 3, 7, 2455, 1773, 14445, 0, '2018-07-18 18:14:25', '2018-07-18 18:14:25'),
(32, 3, 8, 4000, 4205, 34258, 0, '2018-07-18 18:14:25', '2018-07-18 18:14:25'),
(33, 3, 9, 798, 993, 8090, 0, '2018-07-18 18:14:25', '2018-07-18 18:14:25'),
(34, 3, 10, 2184, 1820, 14828, 0, '2018-07-18 18:14:25', '2018-07-18 18:14:25'),
(35, 3, 11, 1222, 1445, 11772, 0, '2018-07-18 18:14:25', '2018-07-18 18:14:25'),
(36, 3, 12, 6173, 6400, 52141, 0, '2018-07-18 18:14:25', '2018-07-18 18:14:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jagungmasters`
--

CREATE TABLE `jagungmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalTanam` int(11) NOT NULL,
  `totalPanen` int(11) NOT NULL,
  `totalProduksi` int(11) NOT NULL,
  `totalProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jagungmasters`
--

INSERT INTO `jagungmasters` (`id`, `ta`, `totalTanam`, `totalPanen`, `totalProduksi`, `totalProduktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 15959, 12478, 93032, 75, '2018-07-18 16:38:05', '2018-07-18 17:20:04'),
(2, 2016, 21877, 20794, 138010, 66, '2018-07-18 17:47:22', '2018-07-18 17:47:22'),
(3, 2017, 19075, 19422, 158232, 70, '2018-07-18 18:14:25', '2018-07-18 18:14:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalandetails`
--

CREATE TABLE `jalandetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `jalanMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlJalan` int(11) NOT NULL,
  `jmlBaik` int(11) NOT NULL,
  `jmlSedang` int(11) NOT NULL,
  `jmlRusakringan` int(11) NOT NULL,
  `jmlRusakberat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalanmasters`
--

CREATE TABLE `jalanmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalJalan` int(11) NOT NULL,
  `totalBaik` int(11) NOT NULL,
  `totalSedang` int(11) NOT NULL,
  `totalRusakringan` int(11) NOT NULL,
  `totalRusakberat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalans`
--

CREATE TABLE `jalans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `panjang` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `sedang` int(11) NOT NULL,
  `rusakringan` int(11) NOT NULL,
  `rusakberat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jalans`
--

INSERT INTO `jalans` (`id`, `ta`, `panjang`, `baik`, `sedang`, `rusakringan`, `rusakberat`, `created_at`, `updated_at`) VALUES
(1, 2015, 747, 444, 167, 68, 68, '2018-07-19 16:15:09', '2018-07-19 16:15:09'),
(2, 2016, 842, 293, 414, 96, 39, '2018-07-19 16:15:58', '2018-07-19 16:15:58'),
(3, 2017, 863, 303, 414, 88, 58, '2018-07-19 16:16:48', '2019-01-20 11:03:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamkesdetails`
--

CREATE TABLE `jamkesdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `jamkesMaster_id` int(11) NOT NULL,
  `puskesmas_id` int(11) NOT NULL,
  `jmlPeserta` int(11) NOT NULL,
  `jmlLaki` int(11) NOT NULL,
  `jmlPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jamkesdetails`
--

INSERT INTO `jamkesdetails` (`id`, `jamkesMaster_id`, `puskesmas_id`, `jmlPeserta`, `jmlLaki`, `jmlPerempuan`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 3, 0, 3, '2018-07-10 17:29:45', '2019-01-26 02:19:41'),
(2, 2, 2, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(3, 2, 3, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(4, 2, 4, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(5, 2, 5, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(6, 2, 6, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(7, 2, 7, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(8, 2, 8, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(9, 2, 9, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(10, 2, 10, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(11, 2, 11, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(12, 2, 12, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(13, 2, 13, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(14, 2, 14, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(15, 2, 15, 19692, 9846, 9846, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(16, 2, 16, 0, 0, 0, '2018-07-10 17:29:45', '2018-07-10 17:29:45'),
(17, 3, 1, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(18, 3, 2, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(19, 3, 3, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(20, 3, 4, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(21, 3, 5, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(22, 3, 6, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(23, 3, 7, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(24, 3, 8, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(25, 3, 9, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(26, 3, 10, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(27, 3, 11, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(28, 3, 12, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(29, 3, 13, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(30, 3, 14, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(31, 3, 15, 20411, 10205, 10206, '2018-07-10 17:30:44', '2018-07-10 17:58:43'),
(32, 3, 16, 0, 0, 0, '2018-07-10 17:30:44', '2018-07-10 17:30:44'),
(33, 4, 1, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(34, 4, 2, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(35, 4, 3, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(36, 4, 4, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(37, 4, 5, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(38, 4, 6, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(39, 4, 7, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(40, 4, 8, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(41, 4, 9, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(42, 4, 10, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(43, 4, 11, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(44, 4, 12, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(45, 4, 13, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(46, 4, 14, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(47, 4, 15, 19607, 9803, 9804, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(48, 4, 16, 0, 0, 0, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(49, 5, 1, 0, 0, 0, '2018-07-10 17:36:26', '2018-07-10 17:36:26'),
(50, 5, 2, 0, 0, 0, '2018-07-10 17:36:26', '2018-07-10 17:36:26'),
(51, 5, 3, 0, 0, 0, '2018-07-10 17:36:26', '2018-07-10 17:36:26'),
(52, 5, 4, 0, 0, 0, '2018-07-10 17:36:26', '2018-07-10 17:36:26'),
(53, 5, 5, 0, 0, 0, '2018-07-10 17:36:26', '2018-07-10 17:36:26'),
(54, 5, 6, 0, 0, 0, '2018-07-10 17:36:26', '2018-07-10 17:36:26'),
(55, 5, 7, 0, 0, 0, '2018-07-10 17:36:26', '2018-07-10 17:36:26'),
(56, 5, 8, 0, 0, 0, '2018-07-10 17:36:26', '2018-07-10 17:36:26'),
(57, 5, 9, 0, 0, 0, '2018-07-10 17:36:27', '2018-07-10 17:36:27'),
(58, 5, 10, 0, 0, 0, '2018-07-10 17:36:27', '2018-07-10 17:36:27'),
(59, 5, 11, 0, 0, 0, '2018-07-10 17:36:27', '2018-07-10 17:36:27'),
(60, 5, 12, 0, 0, 0, '2018-07-10 17:36:27', '2018-07-10 17:36:27'),
(61, 5, 13, 0, 0, 0, '2018-07-10 17:36:27', '2018-07-10 17:36:27'),
(62, 5, 14, 0, 0, 0, '2018-07-10 17:36:27', '2018-07-10 17:36:27'),
(63, 5, 15, 19607, 9820, 9787, '2018-07-10 17:36:27', '2018-07-10 17:36:27'),
(64, 5, 16, 0, 0, 0, '2018-07-10 17:36:27', '2018-07-10 17:36:27'),
(65, 6, 1, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(66, 6, 2, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(67, 6, 3, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(68, 6, 4, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(69, 6, 5, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(70, 6, 6, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(71, 6, 7, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(72, 6, 8, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(73, 6, 9, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(74, 6, 10, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(75, 6, 11, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(76, 6, 12, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(77, 6, 13, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(78, 6, 14, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(79, 6, 15, 19646, 9823, 9823, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(80, 6, 16, 0, 0, 0, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(81, 7, 1, 0, 0, 0, '2018-07-10 17:44:58', '2018-07-10 17:44:58'),
(82, 7, 2, 0, 0, 0, '2018-07-10 17:44:58', '2018-07-10 17:44:58'),
(83, 7, 3, 0, 0, 0, '2018-07-10 17:44:58', '2018-07-10 17:44:58'),
(84, 7, 4, 0, 0, 0, '2018-07-10 17:44:58', '2018-07-10 17:44:58'),
(85, 7, 5, 0, 0, 0, '2018-07-10 17:44:58', '2018-07-10 17:44:58'),
(86, 7, 6, 0, 0, 0, '2018-07-10 17:44:58', '2018-07-10 17:44:58'),
(87, 7, 7, 0, 0, 0, '2018-07-10 17:44:59', '2018-07-10 17:44:59'),
(88, 7, 8, 0, 0, 0, '2018-07-10 17:44:59', '2018-07-10 17:44:59'),
(89, 7, 9, 0, 0, 0, '2018-07-10 17:44:59', '2018-07-10 17:44:59'),
(90, 7, 10, 0, 0, 0, '2018-07-10 17:44:59', '2018-07-10 17:44:59'),
(91, 7, 11, 5955, 2975, 2980, '2018-07-10 17:44:59', '2018-07-10 17:44:59'),
(92, 7, 12, 0, 0, 0, '2018-07-10 17:44:59', '2018-07-10 17:44:59'),
(93, 7, 13, 0, 0, 0, '2018-07-10 17:44:59', '2018-07-10 17:44:59'),
(94, 7, 14, 0, 0, 0, '2018-07-10 17:44:59', '2018-07-10 17:44:59'),
(95, 7, 15, 0, 0, 0, '2018-07-10 17:44:59', '2018-07-10 17:44:59'),
(96, 7, 16, 0, 0, 0, '2018-07-10 17:44:59', '2018-07-10 17:44:59'),
(97, 8, 1, 0, 0, 0, '2018-07-10 17:46:02', '2018-07-10 17:46:02'),
(98, 8, 2, 0, 0, 0, '2018-07-10 17:46:02', '2018-07-10 17:46:02'),
(99, 8, 3, 0, 0, 0, '2018-07-10 17:46:02', '2018-07-10 17:46:02'),
(100, 8, 4, 0, 0, 0, '2018-07-10 17:46:02', '2018-07-10 17:46:02'),
(101, 8, 5, 0, 0, 0, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(102, 8, 6, 0, 0, 0, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(103, 8, 7, 0, 0, 0, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(104, 8, 8, 0, 0, 0, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(105, 8, 9, 0, 0, 0, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(106, 8, 10, 0, 0, 0, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(107, 8, 11, 5955, 2971, 2984, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(108, 8, 12, 0, 0, 0, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(109, 8, 13, 0, 0, 0, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(110, 8, 14, 0, 0, 0, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(111, 8, 15, 0, 0, 0, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(112, 8, 16, 0, 0, 0, '2018-07-10 17:46:03', '2018-07-10 17:46:03'),
(113, 9, 1, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(114, 9, 2, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(115, 9, 3, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(116, 9, 4, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(117, 9, 5, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(118, 9, 6, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(119, 9, 7, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(120, 9, 8, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(121, 9, 9, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(122, 9, 10, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(123, 9, 11, 5955, 2971, 2984, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(124, 9, 12, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(125, 9, 13, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(126, 9, 14, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(127, 9, 15, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(128, 9, 16, 0, 0, 0, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(129, 10, 1, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(130, 10, 2, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(131, 10, 3, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(132, 10, 4, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(133, 10, 5, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(134, 10, 6, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(135, 10, 7, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(136, 10, 8, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(137, 10, 9, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(138, 10, 10, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(139, 10, 11, 5955, 2981, 2974, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(140, 10, 12, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(141, 10, 13, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(142, 10, 14, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(143, 10, 15, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(144, 10, 16, 0, 0, 0, '2018-07-10 17:48:16', '2018-07-10 17:48:16'),
(145, 11, 1, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(146, 11, 2, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(147, 11, 3, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(148, 11, 4, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(149, 11, 5, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(150, 11, 6, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(151, 11, 7, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(152, 11, 8, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(153, 11, 9, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(154, 11, 10, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(155, 11, 11, 5955, 2984, 2971, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(156, 11, 12, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(157, 11, 13, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(158, 11, 14, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(159, 11, 15, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(160, 11, 16, 0, 0, 0, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(161, 12, 1, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(162, 12, 2, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(163, 12, 3, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(164, 12, 4, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(165, 12, 5, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(166, 12, 6, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(167, 12, 7, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(168, 12, 8, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(169, 12, 9, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(170, 12, 10, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(171, 12, 11, 5955, 2954, 3001, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(172, 12, 12, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(173, 12, 13, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(174, 12, 14, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(175, 12, 15, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(176, 12, 16, 0, 0, 0, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(177, 14, 1, 2, 1, 1, '2019-01-25 00:11:08', '2019-01-25 00:11:08'),
(178, 14, 2, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(179, 14, 3, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(180, 14, 4, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(181, 14, 5, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(182, 14, 6, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(183, 14, 7, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(184, 14, 8, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(185, 14, 9, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(186, 14, 10, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(187, 14, 11, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(188, 14, 12, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(189, 14, 13, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(190, 14, 14, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(191, 14, 15, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(192, 14, 16, 0, 0, 0, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(193, 15, 1, 2, 1, 1, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(194, 15, 2, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(195, 15, 3, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(196, 15, 4, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(197, 15, 5, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(198, 15, 6, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(199, 15, 7, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(200, 15, 8, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(201, 15, 9, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(202, 15, 10, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(203, 15, 11, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(204, 15, 12, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(205, 15, 13, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(206, 15, 14, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(207, 15, 15, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(208, 15, 16, 0, 0, 0, '2019-01-25 00:11:10', '2019-01-25 00:11:10'),
(209, 16, 1, 4, 0, 4, '2019-01-26 00:09:49', '2019-01-26 00:09:49'),
(210, 16, 2, 7, 3, 4, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(211, 16, 3, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(212, 16, 4, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(213, 16, 5, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(214, 16, 6, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(215, 16, 7, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(216, 16, 8, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(217, 16, 9, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(218, 16, 10, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(219, 16, 11, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(220, 16, 12, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(221, 16, 13, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(222, 16, 14, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(223, 16, 15, 0, 0, 0, '2019-01-26 00:09:50', '2019-01-26 00:09:50'),
(224, 16, 16, 0, 0, 0, '2019-01-26 00:09:51', '2019-01-26 00:09:51'),
(225, 17, 1, 3, 3, 0, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(226, 17, 2, 5, 2, 3, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(227, 17, 3, 0, 0, 0, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(228, 17, 4, 0, 0, 0, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(229, 17, 5, 0, 0, 0, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(230, 17, 6, 0, 0, 0, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(231, 17, 7, 0, 0, 0, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(232, 17, 8, 0, 0, 0, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(233, 17, 9, 0, 0, 0, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(234, 17, 10, 0, 0, 0, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(235, 17, 11, 0, 0, 0, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(236, 17, 12, 0, 0, 0, '2019-01-26 01:49:09', '2019-01-26 01:49:09'),
(237, 17, 13, 0, 0, 0, '2019-01-26 01:49:10', '2019-01-26 01:49:10'),
(238, 17, 14, 0, 0, 0, '2019-01-26 01:49:10', '2019-01-26 01:49:10'),
(239, 17, 15, 0, 0, 0, '2019-01-26 01:49:10', '2019-01-26 01:49:10'),
(240, 17, 16, 0, 0, 0, '2019-01-26 01:49:10', '2019-01-26 01:49:10'),
(241, 18, 1, 9, 9, 0, '2019-01-26 01:49:35', '2019-01-26 01:49:35'),
(242, 18, 2, 0, 0, 0, '2019-01-26 01:49:35', '2019-01-26 01:49:35'),
(243, 18, 3, 0, 0, 0, '2019-01-26 01:49:35', '2019-01-26 01:49:35'),
(244, 18, 4, 0, 0, 0, '2019-01-26 01:49:35', '2019-01-26 01:49:35'),
(245, 18, 5, 0, 0, 0, '2019-01-26 01:49:35', '2019-01-26 01:49:35'),
(246, 18, 6, 0, 0, 0, '2019-01-26 01:49:36', '2019-01-26 01:49:36'),
(247, 18, 7, 0, 0, 0, '2019-01-26 01:49:36', '2019-01-26 01:49:36'),
(248, 18, 8, 0, 0, 0, '2019-01-26 01:49:36', '2019-01-26 01:49:36'),
(249, 18, 9, 0, 0, 0, '2019-01-26 01:49:36', '2019-01-26 01:49:36'),
(250, 18, 10, 0, 0, 0, '2019-01-26 01:49:36', '2019-01-26 01:49:36'),
(251, 18, 11, 0, 0, 0, '2019-01-26 01:49:36', '2019-01-26 01:49:36'),
(252, 18, 12, 0, 0, 0, '2019-01-26 01:49:36', '2019-01-26 01:49:36'),
(253, 18, 13, 0, 0, 0, '2019-01-26 01:49:36', '2019-01-26 01:49:36'),
(254, 18, 14, 0, 0, 0, '2019-01-26 01:49:36', '2019-01-26 01:49:36'),
(255, 18, 15, 0, 0, 0, '2019-01-26 01:49:36', '2019-01-26 01:49:36'),
(256, 18, 16, 0, 0, 0, '2019-01-26 01:49:36', '2019-01-26 01:49:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamkesmasters`
--

CREATE TABLE `jamkesmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `totalPeserta` int(11) NOT NULL,
  `totalLaki` int(11) NOT NULL,
  `totalPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jamkesmasters`
--

INSERT INTO `jamkesmasters` (`id`, `ta`, `bln`, `totalPeserta`, `totalLaki`, `totalPerempuan`, `created_at`, `updated_at`) VALUES
(2, 2018, 2, 19695, 9846, 9849, '2018-07-10 17:29:45', '2019-01-26 02:19:41'),
(3, 2018, 3, 20411, 10205, 10206, '2018-07-10 17:30:44', '2018-07-10 17:58:43'),
(4, 2018, 4, 19607, 9803, 9804, '2018-07-10 17:32:32', '2018-07-10 17:32:32'),
(5, 2018, 5, 19607, 9820, 9787, '2018-07-10 17:36:26', '2018-07-10 17:36:26'),
(6, 2018, 6, 19646, 9823, 9823, '2018-07-10 17:38:31', '2018-07-10 17:38:31'),
(7, 2018, 1, 5955, 2975, 2980, '2018-07-10 17:44:58', '2018-07-10 17:44:58'),
(8, 2018, 2, 5955, 2971, 2984, '2018-07-10 17:46:02', '2018-07-10 17:46:02'),
(9, 2018, 2, 5955, 2971, 2984, '2018-07-10 17:47:00', '2018-07-10 17:47:00'),
(10, 2018, 3, 5955, 2981, 2974, '2018-07-10 17:48:15', '2018-07-10 17:48:15'),
(11, 2018, 4, 5955, 2984, 2971, '2018-07-10 17:49:18', '2018-07-10 17:49:18'),
(12, 2018, 5, 5955, 2954, 3001, '2018-07-10 17:51:07', '2018-07-10 17:51:07'),
(13, 2018, 1, 2, 1, 1, '2019-01-25 00:10:26', '2019-01-25 00:10:26'),
(14, 2018, 1, 2, 1, 1, '2019-01-25 00:11:08', '2019-01-25 00:11:08'),
(15, 2018, 1, 2, 1, 1, '2019-01-25 00:11:09', '2019-01-25 00:11:09'),
(16, 2018, 1, 11, 3, 8, '2019-01-26 00:09:49', '2019-01-26 00:09:49'),
(17, 2018, 10, 8, 5, 3, '2019-01-26 01:49:09', '2019-01-26 01:52:48'),
(18, 2018, 11, 9, 9, 0, '2019-01-26 01:49:35', '2019-01-26 01:49:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kacanghijaudetails`
--

CREATE TABLE `kacanghijaudetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kacanghijauMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlTanam` int(11) NOT NULL,
  `jmlPanen` int(11) NOT NULL,
  `jmlProduksi` int(11) NOT NULL,
  `jmlProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kacanghijaudetails`
--

INSERT INTO `kacanghijaudetails` (`id`, `kacanghijauMaster_id`, `kecamatan_id`, `jmlTanam`, `jmlPanen`, `jmlProduksi`, `jmlProduktivitas`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, 1, 1, 12, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(2, 2, 2, 0, 0, 0, 0, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(3, 2, 3, 7, 7, 8, 0, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(4, 2, 4, 0, 0, 0, 0, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(5, 2, 5, 0, 0, 0, 0, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(6, 2, 6, 0, 0, 0, 0, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(7, 2, 7, 2, 2, 2, 0, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(8, 2, 8, 25, 26, 31, 0, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(9, 2, 9, 1, 1, 1, 0, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(10, 2, 10, 9, 6, 7, 0, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(11, 2, 11, 0, 0, 0, 0, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(12, 2, 12, 0, 0, 0, 0, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(13, 3, 1, 0, 0, 0, 0, '2018-07-18 17:53:10', '2018-07-18 17:53:10'),
(14, 3, 2, 0, 0, 0, 0, '2018-07-18 17:53:10', '2018-07-18 17:53:10'),
(15, 3, 3, 0, 0, 0, 0, '2018-07-18 17:53:11', '2018-07-18 17:53:11'),
(16, 3, 4, 1, 0, 0, 13, '2018-07-18 17:53:11', '2018-07-18 17:53:11'),
(17, 3, 5, 0, 0, 0, 0, '2018-07-18 17:53:11', '2018-07-18 17:53:11'),
(18, 3, 6, 0, 0, 0, 0, '2018-07-18 17:53:11', '2018-07-18 17:53:11'),
(19, 3, 7, 0, 0, 0, 0, '2018-07-18 17:53:11', '2018-07-18 17:53:11'),
(20, 3, 8, 16, 19, 25, 0, '2018-07-18 17:53:11', '2018-07-18 17:53:11'),
(21, 3, 9, 0, 0, 0, 0, '2018-07-18 17:53:11', '2018-07-18 17:53:11'),
(22, 3, 10, 7, 10, 13, 0, '2018-07-18 17:53:11', '2018-07-18 17:53:11'),
(23, 3, 11, 0, 0, 0, 0, '2018-07-18 17:53:11', '2018-07-18 17:53:11'),
(24, 3, 12, 0, 0, 0, 0, '2018-07-18 17:53:11', '2018-07-18 17:53:11'),
(25, 4, 1, 1, 0, 0, 0, '2018-07-18 18:18:31', '2019-01-22 01:37:57'),
(26, 4, 2, 0, 0, 0, 0, '2018-07-18 18:18:31', '2018-07-18 18:18:31'),
(27, 4, 3, 0, 0, 0, 0, '2018-07-18 18:18:31', '2018-07-18 18:18:31'),
(28, 4, 4, 0, 0, 0, 0, '2018-07-18 18:18:32', '2018-07-18 18:18:32'),
(29, 4, 5, 0, 0, 0, 0, '2018-07-18 18:18:32', '2018-07-18 18:18:32'),
(30, 4, 6, 0, 0, 0, 0, '2018-07-18 18:18:32', '2018-07-18 18:18:32'),
(31, 4, 7, 1, 1, 1, 13, '2018-07-18 18:18:32', '2018-07-18 18:18:32'),
(32, 4, 8, 8, 7, 9, 0, '2018-07-18 18:18:32', '2018-07-18 18:18:32'),
(33, 4, 9, 0, 0, 0, 0, '2018-07-18 18:18:32', '2018-07-18 18:18:32'),
(34, 4, 10, 0, 1, 1, 0, '2018-07-18 18:18:32', '2018-07-18 18:18:32'),
(35, 4, 11, 0, 0, 0, 0, '2018-07-18 18:18:32', '2018-07-18 18:18:32'),
(36, 4, 12, 0, 0, 0, 0, '2018-07-18 18:18:32', '2018-07-18 18:18:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kacanghijaumasters`
--

CREATE TABLE `kacanghijaumasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalTanam` int(11) NOT NULL,
  `totalPanen` int(11) NOT NULL,
  `totalProduksi` int(11) NOT NULL,
  `totalProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kacanghijaumasters`
--

INSERT INTO `kacanghijaumasters` (`id`, `ta`, `totalTanam`, `totalPanen`, `totalProduksi`, `totalProduktivitas`, `created_at`, `updated_at`) VALUES
(2, 2015, 44, 43, 50, 12, '2018-07-18 17:06:15', '2018-07-18 17:06:15'),
(3, 2016, 24, 29, 38, 13, '2018-07-18 17:53:10', '2018-07-18 17:53:10'),
(4, 2017, 10, 9, 11, 13, '2018-07-18 18:18:31', '2019-01-22 01:37:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kacangtanahdetails`
--

CREATE TABLE `kacangtanahdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kacangtanahMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlTanam` int(11) NOT NULL,
  `jmlPanen` int(11) NOT NULL,
  `jmlProduksi` int(11) NOT NULL,
  `jmlProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kacangtanahdetails`
--

INSERT INTO `kacangtanahdetails` (`id`, `kacangtanahMaster_id`, `kecamatan_id`, `jmlTanam`, `jmlPanen`, `jmlProduksi`, `jmlProduktivitas`, `created_at`, `updated_at`) VALUES
(13, 2, 1, 0, 0, 0, 0, '2018-07-18 16:56:14', '2018-07-18 16:56:14'),
(14, 2, 2, 2, 4, 0, 0, '2018-07-18 16:56:14', '2018-07-18 16:56:14'),
(15, 2, 3, 1, 60, 0, 22, '2018-07-18 16:56:14', '2018-07-18 16:56:14'),
(16, 2, 4, 0, 0, 0, 0, '2018-07-18 16:56:14', '2018-07-18 16:56:14'),
(17, 2, 5, 0, 0, 0, 0, '2018-07-18 16:56:14', '2018-07-18 16:56:14'),
(18, 2, 6, 0, 0, 0, 0, '2018-07-18 16:56:14', '2018-07-18 16:56:14'),
(19, 2, 7, 10, 11, 65, 0, '2018-07-18 16:56:14', '2018-07-18 16:59:38'),
(20, 2, 8, 21, 65, 47, 0, '2018-07-18 16:56:14', '2018-07-18 16:59:38'),
(21, 2, 9, 0, 0, 0, 0, '2018-07-18 16:56:14', '2018-07-18 16:56:14'),
(22, 2, 10, 18, 49, 26, 0, '2018-07-18 16:56:14', '2018-07-18 16:59:38'),
(23, 2, 11, 0, 6, 0, 0, '2018-07-18 16:56:14', '2018-07-18 16:56:14'),
(24, 2, 12, 0, 0, 0, 0, '2018-07-18 16:56:14', '2018-07-18 16:56:14'),
(25, 3, 1, 0, 0, 0, 0, '2018-07-18 17:51:31', '2018-07-18 17:51:31'),
(26, 3, 2, 1, 2, 4, 20, '2018-07-18 17:51:31', '2018-07-18 17:51:31'),
(27, 3, 3, 0, 0, 0, 0, '2018-07-18 17:51:31', '2018-07-18 17:51:31'),
(28, 3, 4, 3, 1, 2, 0, '2018-07-18 17:51:31', '2018-07-18 17:51:31'),
(29, 3, 5, 0, 0, 0, 0, '2018-07-18 17:51:31', '2018-07-18 17:51:31'),
(30, 3, 6, 0, 0, 0, 0, '2018-07-18 17:51:31', '2018-07-18 17:51:31'),
(31, 3, 7, 5, 10, 20, 0, '2018-07-18 17:51:31', '2018-07-18 17:51:31'),
(32, 3, 8, 27, 18, 35, 0, '2018-07-18 17:51:31', '2018-07-18 17:51:31'),
(33, 3, 9, 0, 1, 2, 0, '2018-07-18 17:51:31', '2018-07-18 17:51:31'),
(34, 3, 10, 2, 7, 14, 0, '2018-07-18 17:51:31', '2018-07-18 17:51:31'),
(35, 3, 11, 0, 0, 0, 0, '2018-07-18 17:51:32', '2018-07-18 17:51:32'),
(36, 3, 12, 0, 0, 0, 0, '2018-07-18 17:51:32', '2018-07-18 17:51:32'),
(37, 4, 1, 0, 0, 0, 0, '2018-07-18 18:17:07', '2018-07-18 18:17:07'),
(38, 4, 2, 1, 1, 1, 20, '2018-07-18 18:17:07', '2018-07-18 18:17:07'),
(39, 4, 3, 0, 0, 0, 0, '2018-07-18 18:17:07', '2018-07-18 18:17:07'),
(40, 4, 4, 0, 0, 0, 0, '2018-07-18 18:17:07', '2018-07-18 18:17:07'),
(41, 4, 5, 0, 0, 0, 0, '2018-07-18 18:17:07', '2018-07-18 18:17:07'),
(42, 4, 6, 0, 0, 0, 0, '2018-07-18 18:17:07', '2018-07-18 18:17:07'),
(43, 4, 7, 5, 5, 6, 0, '2018-07-18 18:17:07', '2018-07-18 18:17:07'),
(44, 4, 8, 19, 19, 21, 0, '2018-07-18 18:17:07', '2018-07-18 18:17:07'),
(45, 4, 9, 0, 0, 0, 0, '2018-07-18 18:17:07', '2018-07-18 18:17:07'),
(46, 4, 10, 1, 0, 0, 0, '2018-07-18 18:17:07', '2018-07-18 18:17:07'),
(47, 4, 11, 1, 1, 1, 0, '2018-07-18 18:17:07', '2018-07-18 18:17:07'),
(48, 4, 12, 0, 0, 0, 0, '2018-07-18 18:17:07', '2018-07-18 18:17:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kacangtanahmasters`
--

CREATE TABLE `kacangtanahmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalTanam` int(11) NOT NULL,
  `totalPanen` int(11) NOT NULL,
  `totalProduksi` int(11) NOT NULL,
  `totalProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kacangtanahmasters`
--

INSERT INTO `kacangtanahmasters` (`id`, `ta`, `totalTanam`, `totalPanen`, `totalProduksi`, `totalProduktivitas`, `created_at`, `updated_at`) VALUES
(2, 2015, 52, 195, 138, 22, '2018-07-18 16:56:14', '2018-07-18 16:59:38'),
(3, 2016, 38, 39, 77, 20, '2018-07-18 17:51:31', '2018-07-18 17:51:31'),
(4, 2017, 27, 26, 29, 20, '2018-07-18 18:17:07', '2018-07-18 18:17:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartukeluargadetails`
--

CREATE TABLE `kartukeluargadetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kartukeluargaMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlKK` int(11) NOT NULL,
  `jmlMilikiKK` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kartukeluargadetails`
--

INSERT INTO `kartukeluargadetails` (`id`, `kartukeluargaMaster_id`, `kecamatan_id`, `jmlKK`, `jmlMilikiKK`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 17174, 15749, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(2, 1, 2, 7793, 6765, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(3, 1, 3, 10564, 9393, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(4, 1, 4, 11520, 10366, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(5, 1, 5, 12921, 11571, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(6, 1, 6, 9659, 8601, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(7, 1, 7, 9859, 8817, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(8, 1, 8, 13503, 11735, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(9, 1, 9, 6521, 5676, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(10, 1, 10, 15193, 13231, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(11, 1, 11, 6192, 5489, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(12, 1, 12, 3219, 2800, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(13, 2, 1, 2, 5, '2019-01-25 02:53:50', '2019-01-25 02:53:50'),
(14, 2, 2, 0, 0, '2019-01-25 02:53:50', '2019-01-25 02:53:50'),
(15, 2, 3, 0, 0, '2019-01-25 02:53:50', '2019-01-25 02:53:50'),
(16, 2, 4, 0, 0, '2019-01-25 02:53:50', '2019-01-25 02:53:50'),
(17, 2, 5, 0, 0, '2019-01-25 02:53:50', '2019-01-25 02:53:50'),
(18, 2, 6, 0, 0, '2019-01-25 02:53:50', '2019-01-25 02:53:50'),
(19, 2, 7, 0, 0, '2019-01-25 02:53:50', '2019-01-25 02:53:50'),
(20, 2, 8, 0, 0, '2019-01-25 02:53:50', '2019-01-25 02:53:50'),
(21, 2, 9, 0, 0, '2019-01-25 02:53:50', '2019-01-25 02:53:50'),
(22, 2, 10, 0, 0, '2019-01-25 02:53:51', '2019-01-25 02:53:51'),
(23, 2, 11, 0, 0, '2019-01-25 02:53:51', '2019-01-25 02:53:51'),
(24, 2, 12, 0, 0, '2019-01-25 02:53:51', '2019-01-25 02:53:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartukeluargamasters`
--

CREATE TABLE `kartukeluargamasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `totalKK` int(11) NOT NULL,
  `totalMilikiKK` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kartukeluargamasters`
--

INSERT INTO `kartukeluargamasters` (`id`, `ta`, `bln`, `totalKK`, `totalMilikiKK`, `created_at`, `updated_at`) VALUES
(1, 2018, 9, 124118, 110193, '2018-10-18 17:35:16', '2018-10-18 17:35:16'),
(2, 2018, 1, 2, 5, '2019-01-25 02:53:50', '2019-01-25 02:53:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(10) UNSIGNED NOT NULL,
  `nmaKategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nmaKategori`, `created_at`, `updated_at`) VALUES
(1, 'Sarana dan Infrastruktur', NULL, NULL),
(2, 'Ekonomi dan Pembangunan', NULL, NULL),
(3, 'Sosial dan Kesejahteraan Masyarakat', NULL, NULL),
(4, 'Kebijakan dan Legislasi', NULL, NULL),
(5, 'Manajemen Pemerintahans', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kawindetails`
--

CREATE TABLE `kawindetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kawinMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlKawin` int(11) NOT NULL,
  `jmlCerai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kawindetails`
--

INSERT INTO `kawindetails` (`id`, `kawinMaster_id`, `kecamatan_id`, `jmlKawin`, `jmlCerai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 5, '2019-01-25 02:59:15', '2019-01-26 05:12:56'),
(2, 1, 2, 0, 0, '2019-01-25 02:59:15', '2019-01-25 02:59:15'),
(3, 1, 3, 4, 3, '2019-01-25 02:59:15', '2019-01-25 02:59:15'),
(4, 1, 4, 0, 0, '2019-01-25 02:59:15', '2019-01-25 02:59:15'),
(5, 1, 5, 0, 0, '2019-01-25 02:59:15', '2019-01-25 02:59:15'),
(6, 1, 6, 0, 0, '2019-01-25 02:59:15', '2019-01-25 02:59:15'),
(7, 1, 7, 0, 0, '2019-01-25 02:59:15', '2019-01-25 02:59:15'),
(8, 1, 8, 0, 0, '2019-01-25 02:59:15', '2019-01-25 02:59:15'),
(9, 1, 9, 0, 0, '2019-01-25 02:59:15', '2019-01-25 02:59:15'),
(10, 1, 10, 0, 0, '2019-01-25 02:59:15', '2019-01-25 02:59:15'),
(11, 1, 11, 0, 0, '2019-01-25 02:59:15', '2019-01-25 02:59:15'),
(12, 1, 12, 0, 0, '2019-01-25 02:59:15', '2019-01-25 02:59:15'),
(13, 2, 1, 5, 0, '2019-01-26 05:10:19', '2019-01-26 05:10:19'),
(14, 2, 2, 5, 0, '2019-01-26 05:10:19', '2019-01-26 05:10:19'),
(15, 2, 3, 0, 3, '2019-01-26 05:10:19', '2019-01-26 05:10:19'),
(16, 2, 4, 0, 0, '2019-01-26 05:10:19', '2019-01-26 05:10:19'),
(17, 2, 5, 0, 0, '2019-01-26 05:10:19', '2019-01-26 05:10:19'),
(18, 2, 6, 0, 0, '2019-01-26 05:10:19', '2019-01-26 05:10:19'),
(19, 2, 7, 2, 0, '2019-01-26 05:10:20', '2019-01-26 05:10:20'),
(20, 2, 8, 0, 0, '2019-01-26 05:10:20', '2019-01-26 05:10:20'),
(21, 2, 9, 0, 2, '2019-01-26 05:10:20', '2019-01-26 05:10:20'),
(22, 2, 10, 0, 0, '2019-01-26 05:10:20', '2019-01-26 05:10:20'),
(23, 2, 11, 3, 0, '2019-01-26 05:10:20', '2019-01-26 05:10:20'),
(24, 2, 12, 0, 3, '2019-01-26 05:10:20', '2019-01-26 05:10:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kawinmasters`
--

CREATE TABLE `kawinmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `totalKawin` int(11) NOT NULL,
  `totalCerai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kawinmasters`
--

INSERT INTO `kawinmasters` (`id`, `ta`, `bln`, `totalKawin`, `totalCerai`, `created_at`, `updated_at`) VALUES
(1, 2018, 6, 4, 8, '2019-01-25 02:59:14', '2019-01-26 05:12:56'),
(2, 2018, 2, 15, 8, '2019-01-26 05:10:19', '2019-01-26 05:10:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kbaktifdetails`
--

CREATE TABLE `kbaktifdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kbaktifMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlPPMKab` int(11) NOT NULL,
  `jmlPPMProv` int(11) NOT NULL,
  `jmlPPMPusat` int(11) NOT NULL,
  `jmlIUD` int(11) NOT NULL,
  `jmlMOP` int(11) NOT NULL,
  `jmlMOW` int(11) NOT NULL,
  `jmlIMP` int(11) NOT NULL,
  `jmlSTK` int(11) NOT NULL,
  `jmlPIL` int(11) NOT NULL,
  `jmlKDM` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kbaktifdetails`
--

INSERT INTO `kbaktifdetails` (`id`, `kbaktifMaster_id`, `kecamatan_id`, `jmlPPMKab`, `jmlPPMProv`, `jmlPPMPusat`, `jmlIUD`, `jmlMOP`, `jmlMOW`, `jmlIMP`, `jmlSTK`, `jmlPIL`, `jmlKDM`, `created_at`, `updated_at`) VALUES
(49, 5, 1, 2867, 0, 0, 281, 16, 96, 205, 1628, 1125, 14, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(50, 5, 2, 394, 0, 0, 0, 0, 0, 128, 218, 78, 3, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(51, 5, 3, 860, 0, 0, 2, 0, 4, 34, 370, 166, 3, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(52, 5, 4, 669, 0, 0, 37, 0, 2, 159, 316, 73, 26, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(53, 5, 5, 1459, 0, 0, 13, 1, 0, 43, 786, 273, 7, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(54, 5, 6, 458, 0, 0, 14, 0, 0, 38, 257, 127, 4, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(55, 5, 7, 452, 0, 0, 14, 0, 1, 68, 221, 221, 0, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(56, 5, 8, 788, 0, 0, 29, 0, 2, 137, 287, 51, 16, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(57, 5, 9, 1021, 0, 0, 4, 0, 0, 34, 376, 453, 13, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(58, 5, 10, 1143, 0, 0, 149, 1, 6, 133, 521, 386, 65, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(59, 5, 11, 673, 0, 0, 17, 5, 1, 57, 319, 156, 4, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(60, 5, 12, 211, 0, 0, 5, 0, 1, 51, 46, 23, 7, '2018-10-03 17:53:12', '2018-10-03 17:53:12'),
(61, 6, 1, 3378, 0, 0, 272, 1, 123, 94, 1992, 1385, 98, '2018-10-03 18:09:05', '2018-10-03 18:09:05'),
(62, 6, 2, 413, 0, 0, 4, 0, 0, 50, 332, 113, 9, '2018-10-03 18:09:05', '2018-10-03 18:09:05'),
(63, 6, 3, 772, 0, 0, 10, 7, 2, 89, 483, 484, 14, '2018-10-03 18:09:05', '2018-10-03 18:09:05'),
(64, 6, 4, 492, 0, 0, 14, 0, 1, 87, 493, 220, 27, '2018-10-03 18:09:05', '2018-10-03 18:09:05'),
(65, 6, 5, 1110, 0, 0, 51, 0, 0, 131, 1246, 572, 32, '2018-10-03 18:09:05', '2018-10-03 18:09:05'),
(66, 6, 6, 503, 0, 0, 25, 0, 5, 69, 267, 184, 23, '2018-10-03 18:09:05', '2018-10-03 18:09:05'),
(67, 6, 7, 528, 0, 0, 11, 0, 0, 70, 256, 200, 10, '2018-10-03 18:09:05', '2018-10-03 18:09:05'),
(68, 6, 8, 544, 0, 0, 31, 0, 5, 164, 488, 198, 50, '2018-10-03 18:09:05', '2018-10-03 18:09:05'),
(69, 6, 9, 1073, 0, 0, 0, 0, 0, 84, 538, 625, 49, '2018-10-03 18:09:05', '2018-10-03 18:09:05'),
(70, 6, 10, 813, 0, 0, 96, 0, 0, 116, 663, 504, 79, '2018-10-03 18:09:05', '2018-10-03 18:09:05'),
(71, 6, 11, 400, 0, 0, 6, 2, 0, 78, 495, 298, 8, '2018-10-03 18:09:06', '2018-10-03 18:09:06'),
(72, 6, 12, 253, 0, 0, 3, 1, 1, 63, 125, 52, 3, '2018-10-03 18:09:06', '2018-10-03 18:09:06'),
(73, 7, 1, 3250, 0, 0, 185, 0, 114, 280, 966, 501, 11, '2018-10-03 18:15:26', '2018-10-03 18:15:26'),
(74, 7, 2, 431, 0, 0, 3, 0, 0, 89, 205, 91, 2, '2018-10-03 18:15:26', '2018-10-03 18:15:26'),
(75, 7, 3, 955, 0, 0, 0, 6, 3, 14, 329, 177, 0, '2018-10-03 18:15:26', '2018-10-03 18:15:26'),
(76, 7, 4, 737, 0, 0, 18, 26, 1, 99, 264, 25, 5, '2018-10-03 18:15:26', '2018-10-03 18:15:26'),
(77, 7, 5, 1664, 0, 0, 25, 5, 6, 44, 620, 83, 2, '2018-10-03 18:15:27', '2018-10-03 18:15:27'),
(78, 7, 6, 497, 0, 0, 10, 0, 0, 23, 129, 88, 2, '2018-10-03 18:15:27', '2018-10-03 18:15:27'),
(79, 7, 7, 491, 0, 0, 10, 1, 0, 27, 210, 131, 1, '2018-10-03 18:15:27', '2018-10-03 18:15:27'),
(80, 7, 8, 824, 0, 0, 15, 1, 2, 39, 227, 28, 0, '2018-10-03 18:15:27', '2018-10-03 18:15:27'),
(81, 7, 9, 1146, 0, 0, 4, 1, 0, 46, 140, 89, 0, '2018-10-03 18:15:27', '2018-10-03 18:15:27'),
(82, 7, 10, 1263, 0, 0, 31, 17, 4, 28, 522, 159, 9, '2018-10-03 18:15:27', '2018-10-03 18:15:27'),
(83, 7, 11, 759, 0, 0, 10, 8, 5, 31, 294, 190, 4, '2018-10-03 18:15:27', '2018-10-03 18:15:27'),
(84, 7, 12, 215, 0, 0, 2, 1, 1, 35, 66, 36, 1, '2018-10-03 18:15:27', '2018-10-03 18:15:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kbaktifmasters`
--

CREATE TABLE `kbaktifmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalPPMKab` int(11) NOT NULL,
  `totalPPMProv` int(11) NOT NULL,
  `totalPPMPusat` int(11) NOT NULL,
  `totalIUD` int(11) NOT NULL,
  `totalMOP` int(11) NOT NULL,
  `totalMOW` int(11) NOT NULL,
  `totalIMP` int(11) NOT NULL,
  `totalSTK` int(11) NOT NULL,
  `totalPIL` int(11) NOT NULL,
  `totalKDM` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kbaktifmasters`
--

INSERT INTO `kbaktifmasters` (`id`, `ta`, `totalPPMKab`, `totalPPMProv`, `totalPPMPusat`, `totalIUD`, `totalMOP`, `totalMOW`, `totalIMP`, `totalSTK`, `totalPIL`, `totalKDM`, `created_at`, `updated_at`) VALUES
(5, 2016, 10995, 0, 0, 565, 23, 113, 1087, 5345, 3132, 162, '2018-10-03 17:53:11', '2018-10-03 17:53:11'),
(6, 2015, 10279, 0, 0, 523, 11, 137, 1095, 7378, 4835, 402, '2018-10-03 18:09:05', '2018-10-03 18:09:05'),
(7, 2017, 12232, 0, 0, 313, 66, 136, 755, 3972, 1598, 37, '2018-10-03 18:15:26', '2018-10-03 18:15:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_arens`
--

CREATE TABLE `kebun_arens` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_arens`
--

INSERT INTO `kebun_arens` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 397, 461, 152, 0, '2018-07-25 18:17:42', '2018-07-25 18:17:42'),
(2, 2018, 350, 364, 129, 480, '2018-12-27 17:52:55', '2018-12-27 17:52:55'),
(3, 2016, 359, 1451, 130, 455, '2018-12-27 22:21:39', '2018-12-27 22:21:39'),
(4, 2017, 397, 364, 151, 482, '2018-12-27 22:38:38', '2018-12-27 22:38:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_cengkehs`
--

CREATE TABLE `kebun_cengkehs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_cengkehs`
--

INSERT INTO `kebun_cengkehs` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 623, 594, 37, 594, '2018-07-25 18:12:20', '2018-07-25 18:12:20'),
(2, 2018, 630, 869, 31, 406, '2018-12-27 17:49:54', '2018-12-27 17:49:54'),
(3, 2016, 630, 869, 0, 0, '2018-12-27 22:18:07', '2018-12-27 22:18:07'),
(4, 2017, 630, 869, 31, 406, '2018-12-27 22:36:18', '2018-12-27 22:36:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_jambumetes`
--

CREATE TABLE `kebun_jambumetes` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_jambumetes`
--

INSERT INTO `kebun_jambumetes` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 1426, 323, 187, 323, '2018-07-25 18:11:12', '2018-07-25 18:11:12'),
(2, 2018, 1066, 1813, 241, 602, '2018-12-27 17:47:59', '2018-12-27 17:47:59'),
(3, 2016, 1295, 1981, 259, 578, '2018-12-27 22:16:46', '2018-12-27 22:16:46'),
(4, 2017, 1292, 1980, 252, 570, '2018-12-27 22:35:43', '2018-12-27 22:35:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_kakaos`
--

CREATE TABLE `kebun_kakaos` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_kakaos`
--

INSERT INTO `kebun_kakaos` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 20337, 854, 10935, 854, '2018-07-25 18:08:24', '2018-07-25 18:08:24'),
(2, 2018, 9816, 15348, 7101, 940, '2018-12-27 17:42:33', '2018-12-27 17:42:33'),
(3, 2016, 19696, 21280, 12280, 941, '2018-12-27 22:14:18', '2018-12-27 22:14:18'),
(4, 2017, 19585, 21200, 11067, 871, '2018-12-27 22:33:04', '2018-12-27 22:33:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_kapuks`
--

CREATE TABLE `kebun_kapuks` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_kapuks`
--

INSERT INTO `kebun_kapuks` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 232, 302, 11, 0, '2018-07-25 18:15:03', '2018-07-25 18:15:03'),
(2, 2018, 206, 17, 13, 441, '2018-12-27 17:51:31', '2018-12-27 17:51:31'),
(3, 2016, 210, 982, 15, 444, '2018-12-27 22:19:35', '2018-12-27 22:19:35'),
(4, 2017, 210, 196, 14, 446, '2018-12-27 22:37:27', '2018-12-27 22:37:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_kelapadalams`
--

CREATE TABLE `kebun_kelapadalams` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_kelapadalams`
--

INSERT INTO `kebun_kelapadalams` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 9412, 11954, 3406, 762, '2018-07-25 18:03:45', '2018-07-25 18:03:45'),
(2, 2018, 5665, 8699, 5665, 733, '2018-12-27 17:39:46', '2018-12-27 22:41:21'),
(3, 2016, 8682, 9127, 3535, 825, '2018-12-27 22:11:52', '2018-12-27 22:11:52'),
(4, 2017, 8682, 9127, 3270, 772, '2018-12-27 22:28:47', '2018-12-27 22:28:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_kelapahybridas`
--

CREATE TABLE `kebun_kelapahybridas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_kelapahybridas`
--

INSERT INTO `kebun_kelapahybridas` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2018, 1273, 2434, 296, 764, '2018-12-27 17:40:53', '2018-12-27 17:40:53'),
(2, 2016, 1361, 2460, 301, 732, '2018-12-27 22:12:32', '2018-12-27 22:12:32'),
(3, 2017, 1355, 2454, 298, 756, '2018-12-27 22:32:21', '2018-12-27 22:32:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_kelapasawits`
--

CREATE TABLE `kebun_kelapasawits` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_kelapasawits`
--

INSERT INTO `kebun_kelapasawits` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 751, 670, 8, 78, '2018-07-25 18:19:59', '2018-07-25 18:19:59'),
(2, 2018, 730, 524, 3149, 6876, '2018-12-27 17:54:41', '2018-12-27 17:54:41'),
(3, 2016, 764, 1519, 801, 7492, '2018-12-27 22:26:33', '2018-12-27 22:26:33'),
(4, 2017, 766, 675, 3206, 7152, '2018-12-27 22:40:21', '2018-12-27 22:40:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_kemiris`
--

CREATE TABLE `kebun_kemiris` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_kopiarabikas`
--

CREATE TABLE `kebun_kopiarabikas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_kopiarabikas`
--

INSERT INTO `kebun_kopiarabikas` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 428, 735, 228, 735, '2018-07-25 18:10:16', '2018-07-25 18:10:16'),
(2, 2018, 494, 500, 232, 709, '2018-12-27 17:47:11', '2019-01-22 02:03:29'),
(3, 2016, 493, 500, 242, 716, '2018-12-27 22:15:49', '2018-12-27 22:15:49'),
(4, 2017, 493, 500, 232, 709, '2018-12-27 22:35:12', '2018-12-27 22:35:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_kopirobustas`
--

CREATE TABLE `kebun_kopirobustas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_kopirobustas`
--

INSERT INTO `kebun_kopirobustas` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 3766, 799, 2357, 799, '2018-07-25 18:09:24', '2018-07-25 18:09:24'),
(2, 2018, 3774, 5335, 2563, 874, '2018-12-27 17:43:32', '2018-12-27 17:43:32'),
(3, 2016, 3774, 5335, 2558, 873, '2018-12-27 22:15:14', '2018-12-27 22:15:14'),
(4, 2017, 3774, 5335, 2562, 874, '2018-12-27 22:34:25', '2018-12-27 22:34:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_ladas`
--

CREATE TABLE `kebun_ladas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_ladas`
--

INSERT INTO `kebun_ladas` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 84, 119, 5, 0, '2018-07-25 18:13:41', '2018-07-25 18:13:41'),
(2, 2018, 98, 198, 6, 164, '2018-12-27 17:50:31', '2018-12-27 17:50:31'),
(3, 2016, 90, 178, 6, 168, '2018-12-27 22:18:51', '2018-12-27 22:18:51'),
(4, 2017, 105, 198, 6, 165, '2018-12-27 22:37:01', '2018-12-27 22:37:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_nilams`
--

CREATE TABLE `kebun_nilams` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_nilams`
--

INSERT INTO `kebun_nilams` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 2, 5, 0, 0, '2018-07-25 18:23:48', '2018-07-25 18:23:48'),
(2, 2016, 2, 5, 0, 0, '2018-12-27 22:26:57', '2018-12-27 22:26:57'),
(4, 2018, 3, 3, 3, 3, '2019-01-25 23:36:32', '2019-01-25 23:36:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_palas`
--

CREATE TABLE `kebun_palas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_palas`
--

INSERT INTO `kebun_palas` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 72, 285, 0, 0, '2018-07-25 18:19:15', '2018-07-25 18:19:15'),
(2, 2018, 100, 372, 0, 0, '2018-12-27 17:54:06', '2018-12-27 17:54:06'),
(3, 2016, 100, 372, 0, 0, '2018-12-27 22:25:51', '2018-12-27 22:25:51'),
(4, 2017, 100, 372, 0, 0, '2018-12-27 22:39:29', '2018-12-27 22:39:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_panilis`
--

CREATE TABLE `kebun_panilis` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_panilis`
--

INSERT INTO `kebun_panilis` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 66, 276, 6, 0, '2018-07-25 18:16:01', '2018-07-25 18:16:38'),
(2, 2018, 57, 89, 0, 0, '2018-12-27 17:52:09', '2018-12-27 17:52:09'),
(3, 2016, 57, 89, 0, 0, '2018-12-27 22:20:08', '2018-12-27 22:20:08'),
(4, 2017, 57, 89, 0, 0, '2018-12-27 22:37:55', '2018-12-27 22:37:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kebun_pinangs`
--

CREATE TABLE `kebun_pinangs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Areal` int(11) NOT NULL,
  `Petani` int(11) NOT NULL,
  `Produksi` int(11) NOT NULL,
  `Produktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kebun_pinangs`
--

INSERT INTO `kebun_pinangs` (`id`, `ta`, `Areal`, `Petani`, `Produksi`, `Produktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 78, 82, 15, 0, '2018-07-25 18:18:20', '2018-07-25 18:18:20'),
(2, 2018, 62, 8, 13, 388, '2018-12-27 17:53:28', '2018-12-27 17:53:28'),
(3, 2016, 60, 72, 17, 502, '2018-12-27 22:25:04', '2018-12-27 22:25:04'),
(4, 2017, 62, 80, 13, 388, '2018-12-27 22:39:05', '2018-12-27 22:39:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nmaKecamatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `nmaKecamatan`, `created_at`, `updated_at`) VALUES
(1, 'Watang Sawitto', NULL, NULL),
(2, 'Tiroang', NULL, NULL),
(3, 'Suppa', NULL, NULL),
(4, 'Patampanua', NULL, NULL),
(5, 'Paleteang', NULL, NULL),
(6, 'Mattiro Sompe', NULL, NULL),
(7, 'Mattiro Bulu', NULL, NULL),
(8, 'Lembang', NULL, NULL),
(9, 'Lanrisang', NULL, NULL),
(10, 'Duampanua', NULL, NULL),
(11, 'Cempa', NULL, NULL),
(12, 'Batulappa', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kedelaidetails`
--

CREATE TABLE `kedelaidetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kedelaiMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlTanam` int(11) NOT NULL,
  `jmlPanen` int(11) NOT NULL,
  `jmlProduksi` int(11) NOT NULL,
  `jmlProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kedelaidetails`
--

INSERT INTO `kedelaidetails` (`id`, `kedelaiMaster_id`, `kecamatan_id`, `jmlTanam`, `jmlPanen`, `jmlProduksi`, `jmlProduktivitas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 0, 24, '2018-07-18 16:43:27', '2018-07-18 16:43:27'),
(2, 1, 2, 0, 0, 0, 0, '2018-07-18 16:43:27', '2018-07-18 17:20:58'),
(3, 1, 3, 100, 15, 36, 0, '2018-07-18 16:43:27', '2018-07-18 17:20:58'),
(4, 1, 4, 0, 0, 0, 0, '2018-07-18 16:43:27', '2018-07-18 17:20:58'),
(5, 1, 5, 0, 0, 0, 0, '2018-07-18 16:43:27', '2018-07-18 17:20:58'),
(6, 1, 6, 0, 0, 0, 0, '2018-07-18 16:43:27', '2018-07-18 17:20:58'),
(7, 1, 7, 25, 25, 59, 0, '2018-07-18 16:43:27', '2018-07-18 17:20:58'),
(8, 1, 8, 343, 273, 649, 0, '2018-07-18 16:43:27', '2018-07-18 17:20:58'),
(9, 1, 9, 0, 0, 0, 0, '2018-07-18 16:43:28', '2018-07-18 17:20:58'),
(10, 1, 10, 11, 11, 26, 0, '2018-07-18 16:43:28', '2018-07-18 17:20:58'),
(11, 1, 11, 0, 0, 0, 0, '2018-07-18 16:43:28', '2018-07-18 17:20:58'),
(12, 1, 12, 100, 74, 176, 0, '2018-07-18 16:43:28', '2018-07-18 17:20:58'),
(13, 2, 1, 0, 0, 0, 0, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(14, 2, 2, 0, 0, 0, 0, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(15, 2, 3, 0, 0, 0, 0, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(16, 2, 4, 0, 0, 0, 0, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(17, 2, 5, 0, 0, 0, 0, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(18, 2, 6, 0, 0, 0, 0, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(19, 2, 7, 0, 0, 0, 0, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(20, 2, 8, 125, 70, 103, 15, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(21, 2, 9, 0, 0, 0, 0, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(22, 2, 10, 0, 0, 0, 0, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(23, 2, 11, 0, 0, 0, 0, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(24, 2, 12, 25, 25, 37, 0, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(25, 3, 1, 0, 0, 0, 0, '2018-07-18 18:15:32', '2018-07-18 18:15:32'),
(26, 3, 2, 0, 0, 0, 0, '2018-07-18 18:15:32', '2018-07-18 18:15:32'),
(27, 3, 3, 0, 0, 0, 0, '2018-07-18 18:15:32', '2018-07-18 18:15:32'),
(28, 3, 4, 0, 0, 0, 0, '2018-07-18 18:15:32', '2018-07-18 18:15:32'),
(29, 3, 5, 0, 0, 0, 0, '2018-07-18 18:15:32', '2018-07-18 18:15:32'),
(30, 3, 6, 0, 0, 0, 0, '2018-07-18 18:15:32', '2018-07-18 18:15:32'),
(31, 3, 7, 0, 0, 0, 0, '2018-07-18 18:15:32', '2018-07-18 18:15:32'),
(32, 3, 8, 50, 50, 56, 15, '2018-07-18 18:15:32', '2018-07-18 18:15:32'),
(33, 3, 9, 0, 0, 0, 0, '2018-07-18 18:15:32', '2018-07-18 18:15:32'),
(34, 3, 10, 0, 0, 0, 0, '2018-07-18 18:15:32', '2018-07-18 18:15:32'),
(35, 3, 11, 0, 0, 0, 0, '2018-07-18 18:15:32', '2018-07-18 18:15:32'),
(36, 3, 12, 0, 0, 0, 0, '2018-07-18 18:15:32', '2018-07-18 18:15:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kedelaimasters`
--

CREATE TABLE `kedelaimasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalTanam` int(11) NOT NULL,
  `totalPanen` int(11) NOT NULL,
  `totalProduksi` int(11) NOT NULL,
  `totalProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kedelaimasters`
--

INSERT INTO `kedelaimasters` (`id`, `ta`, `totalTanam`, `totalPanen`, `totalProduksi`, `totalProduktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 579, 398, 946, 24, '2018-07-18 16:43:27', '2018-07-18 17:20:58'),
(2, 2016, 150, 95, 140, 15, '2018-07-18 17:48:50', '2018-07-18 17:48:50'),
(3, 2017, 50, 50, 56, 15, '2018-07-18 18:15:32', '2018-07-18 18:15:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelahirandetails`
--

CREATE TABLE `kelahirandetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelahiranMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlKelahiran` int(11) NOT NULL,
  `jmlKematian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelahirandetails`
--

INSERT INTO `kelahirandetails` (`id`, `kelahiranMaster_id`, `kecamatan_id`, `jmlKelahiran`, `jmlKematian`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 7, 3, '2019-01-26 04:28:11', '2019-01-26 04:38:29'),
(2, 1, 2, 3, 0, '2019-01-26 04:28:11', '2019-01-26 04:38:29'),
(3, 1, 3, 0, 3, '2019-01-26 04:28:11', '2019-01-26 04:38:29'),
(4, 1, 4, 0, 0, '2019-01-26 04:28:12', '2019-01-26 04:28:12'),
(5, 1, 5, 0, 0, '2019-01-26 04:28:12', '2019-01-26 04:28:12'),
(6, 1, 6, 0, 0, '2019-01-26 04:28:12', '2019-01-26 04:28:12'),
(7, 1, 7, 0, 0, '2019-01-26 04:28:12', '2019-01-26 04:28:12'),
(8, 1, 8, 0, 0, '2019-01-26 04:28:12', '2019-01-26 04:28:12'),
(9, 1, 9, 0, 0, '2019-01-26 04:28:12', '2019-01-26 04:28:12'),
(10, 1, 10, 0, 0, '2019-01-26 04:28:12', '2019-01-26 04:28:12'),
(11, 1, 11, 0, 0, '2019-01-26 04:28:12', '2019-01-26 04:28:12'),
(12, 1, 12, 0, 0, '2019-01-26 04:28:12', '2019-01-26 04:28:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelahiranmasters`
--

CREATE TABLE `kelahiranmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `totalKelahiran` int(11) NOT NULL,
  `totalKematian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelahiranmasters`
--

INSERT INTO `kelahiranmasters` (`id`, `ta`, `bln`, `totalKelahiran`, `totalKematian`, `created_at`, `updated_at`) VALUES
(1, 2018, 8, 10, 6, '2019-01-26 04:28:11', '2019-01-26 04:38:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraanoperasionals`
--

CREATE TABLE `kendaraanoperasionals` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlKendaraan` int(11) NOT NULL,
  `jmlRoda2` int(11) NOT NULL,
  `jmlRoda4` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kendaraanoperasionals`
--

INSERT INTO `kendaraanoperasionals` (`id`, `ta`, `jmlKendaraan`, `jmlRoda2`, `jmlRoda4`, `created_at`, `updated_at`) VALUES
(1, 2017, 13, 4, 9, '2018-07-22 21:41:05', '2018-07-22 21:41:05'),
(2, 2018, 14, 4, 10, '2018-07-22 21:43:43', '2018-07-22 21:43:43'),
(3, 2016, 7, 3, 4, '2018-07-22 21:45:31', '2018-07-22 21:45:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisipauddetails`
--

CREATE TABLE `kondisipauddetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kondisiPAUDMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlPAUD` int(11) NOT NULL,
  `jmlKondisiBaik` int(11) NOT NULL,
  `jmlRusakRingan` int(11) NOT NULL,
  `jmlRusakBerat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisipaudmasters`
--

CREATE TABLE `kondisipaudmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalPAUD` int(11) NOT NULL,
  `totalKondisiBaik` int(11) NOT NULL,
  `totalRusakRingan` int(11) NOT NULL,
  `totalRusakBerat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisisddetails`
--

CREATE TABLE `kondisisddetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kondisiSDMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlSD` int(11) NOT NULL,
  `jmlKondisiBaik` int(11) NOT NULL,
  `jmlRusakRingan` int(11) NOT NULL,
  `jmlRusakBerat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kondisisddetails`
--

INSERT INTO `kondisisddetails` (`id`, `kondisiSDMaster_id`, `kecamatan_id`, `jmlSD`, `jmlKondisiBaik`, `jmlRusakRingan`, `jmlRusakBerat`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 32, 26, 5, 1, '2018-06-20 07:06:24', '2018-06-20 07:06:24'),
(2, 1, 2, 19, 15, 4, 0, '2018-06-20 07:06:24', '2018-06-20 07:06:24'),
(3, 1, 3, 27, 15, 12, 0, '2018-06-20 07:06:24', '2018-06-20 07:06:24'),
(4, 1, 4, 32, 21, 11, 0, '2018-06-20 07:06:25', '2018-06-20 07:06:25'),
(5, 1, 5, 24, 20, 4, 0, '2018-06-20 07:06:25', '2018-06-20 07:06:25'),
(6, 1, 6, 24, 20, 4, 0, '2018-06-20 07:06:25', '2018-06-20 07:06:25'),
(7, 1, 7, 26, 11, 15, 0, '2018-06-20 07:06:25', '2018-06-20 07:06:25'),
(8, 1, 8, 47, 24, 16, 7, '2018-06-20 07:06:25', '2018-06-20 07:06:25'),
(9, 1, 9, 19, 14, 5, 0, '2018-06-20 07:06:25', '2018-06-20 07:06:25'),
(10, 1, 10, 38, 26, 12, 0, '2018-06-20 07:06:25', '2018-06-20 07:06:25'),
(11, 1, 11, 19, 11, 8, 0, '2018-06-20 07:06:25', '2018-06-20 07:06:25'),
(12, 1, 12, 14, 8, 6, 0, '2018-06-20 07:06:25', '2018-06-20 07:06:25'),
(13, 2, 1, 32, 24, 7, 1, '2018-06-20 07:19:20', '2018-06-20 07:19:20'),
(14, 2, 2, 19, 15, 4, 0, '2018-06-20 07:19:20', '2018-06-20 07:19:20'),
(15, 2, 3, 27, 14, 13, 0, '2018-06-20 07:19:21', '2018-06-20 07:19:21'),
(16, 2, 4, 32, 21, 11, 0, '2018-06-20 07:19:21', '2018-06-20 07:19:21'),
(17, 2, 5, 24, 19, 5, 0, '2018-06-20 07:19:21', '2018-06-20 07:19:21'),
(18, 2, 6, 24, 15, 8, 1, '2018-06-20 07:19:21', '2018-06-20 07:19:21'),
(19, 2, 7, 26, 11, 15, 0, '2018-06-20 07:19:21', '2018-06-20 07:19:21'),
(20, 2, 8, 47, 14, 16, 17, '2018-06-20 07:19:21', '2018-06-20 07:19:21'),
(21, 2, 9, 19, 14, 5, 0, '2018-06-20 07:19:21', '2018-06-20 07:19:21'),
(22, 2, 10, 40, 25, 14, 1, '2018-06-20 07:19:21', '2018-06-20 07:19:21'),
(23, 2, 11, 19, 8, 11, 0, '2018-06-20 07:19:21', '2018-06-20 07:19:21'),
(24, 2, 12, 14, 7, 6, 1, '2018-06-20 07:19:21', '2018-06-20 07:19:21'),
(25, 3, 1, 31, 22, 7, 2, '2018-06-20 07:23:04', '2019-01-25 00:05:29'),
(26, 3, 2, 19, 15, 4, 0, '2018-06-20 07:23:04', '2019-01-24 04:03:05'),
(27, 3, 3, 27, 14, 13, 0, '2018-06-20 07:23:04', '2019-01-24 04:03:05'),
(28, 3, 4, 32, 21, 11, 0, '2018-06-20 07:23:04', '2019-01-24 04:03:05'),
(29, 3, 5, 24, 19, 5, 0, '2018-06-20 07:23:04', '2019-01-24 04:03:05'),
(30, 3, 6, 24, 15, 8, 1, '2018-06-20 07:23:04', '2019-01-24 04:03:05'),
(31, 3, 7, 26, 11, 15, 0, '2018-06-20 07:23:04', '2019-01-24 04:03:05'),
(32, 3, 8, 47, 14, 16, 17, '2018-06-20 07:23:04', '2019-01-24 04:03:05'),
(33, 3, 9, 19, 14, 5, 0, '2018-06-20 07:23:04', '2019-01-24 04:03:05'),
(34, 3, 10, 40, 25, 14, 1, '2018-06-20 07:23:04', '2019-01-24 04:03:05'),
(35, 3, 11, 19, 8, 11, 0, '2018-06-20 07:23:04', '2019-01-24 04:03:05'),
(36, 3, 12, 14, 7, 6, 1, '2018-06-20 07:23:04', '2019-01-24 04:03:05'),
(37, 4, 1, 30, 22, 7, 1, '2018-07-17 19:32:17', '2018-07-17 19:32:17'),
(38, 4, 2, 19, 15, 4, 0, '2018-07-17 19:32:17', '2018-07-17 19:32:17'),
(39, 4, 3, 27, 14, 13, 0, '2018-07-17 19:32:17', '2018-07-17 19:32:17'),
(40, 4, 4, 32, 21, 11, 0, '2018-07-17 19:32:17', '2018-07-17 19:32:17'),
(41, 4, 5, 24, 19, 5, 0, '2018-07-17 19:32:17', '2018-07-17 19:32:17'),
(42, 4, 6, 24, 15, 8, 1, '2018-07-17 19:32:18', '2018-07-17 19:32:18'),
(43, 4, 7, 26, 11, 15, 0, '2018-07-17 19:32:18', '2018-07-17 19:32:18'),
(44, 4, 8, 47, 14, 16, 17, '2018-07-17 19:32:18', '2018-07-17 19:32:18'),
(45, 4, 9, 19, 14, 5, 0, '2018-07-17 19:32:18', '2018-07-17 19:32:18'),
(46, 4, 10, 40, 25, 14, 1, '2018-07-17 19:32:18', '2018-07-17 19:32:18'),
(47, 4, 11, 19, 8, 11, 0, '2018-07-17 19:32:18', '2018-07-17 19:32:18'),
(48, 4, 12, 14, 7, 6, 1, '2018-07-17 19:32:18', '2018-07-17 19:32:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisisdmasters`
--

CREATE TABLE `kondisisdmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalSD` int(11) NOT NULL,
  `totalKondisiBaik` int(11) NOT NULL,
  `totalRusakRingan` int(11) NOT NULL,
  `totalRusakBerat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kondisisdmasters`
--

INSERT INTO `kondisisdmasters` (`id`, `ta`, `totalSD`, `totalKondisiBaik`, `totalRusakRingan`, `totalRusakBerat`, `created_at`, `updated_at`) VALUES
(1, 2017, 321, 211, 102, 8, '2018-06-20 07:06:24', '2018-06-20 07:06:24'),
(2, 2016, 323, 187, 115, 21, '2018-06-20 07:19:20', '2018-06-20 07:19:20'),
(3, 2015, 322, 186, 107, 22, '2018-06-20 07:23:04', '2019-01-25 00:05:29'),
(4, 2018, 321, 185, 115, 21, '2018-07-17 19:32:17', '2018-07-17 19:32:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisismpdetails`
--

CREATE TABLE `kondisismpdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kondisiSMPMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlSMP` int(11) NOT NULL,
  `jmlKondisiBaik` int(11) NOT NULL,
  `jmlRusakRingan` int(11) NOT NULL,
  `jmlRusakBerat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kondisismpdetails`
--

INSERT INTO `kondisismpdetails` (`id`, `kondisiSMPMaster_id`, `kecamatan_id`, `jmlSMP`, `jmlKondisiBaik`, `jmlRusakRingan`, `jmlRusakBerat`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 7, 5, 2, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(2, 1, 2, 4, 4, 0, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(3, 1, 3, 4, 3, 1, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(4, 1, 4, 7, 5, 2, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(5, 1, 5, 2, 2, 0, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(6, 1, 6, 3, 3, 0, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(7, 1, 7, 4, 2, 2, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(8, 1, 8, 11, 7, 4, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(9, 1, 9, 2, 1, 1, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(10, 1, 10, 7, 6, 1, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(11, 1, 11, 3, 2, 1, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(12, 1, 12, 4, 3, 1, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(13, 2, 1, 6, 2, 3, 1, '2018-06-20 15:40:51', '2019-01-25 00:42:43'),
(14, 2, 2, 4, 3, 1, 0, '2018-06-20 15:40:51', '2018-06-20 15:40:51'),
(15, 2, 3, 4, 1, 3, 0, '2018-06-20 15:40:51', '2018-06-20 15:40:51'),
(16, 2, 4, 5, 3, 2, 0, '2018-06-20 15:40:51', '2018-06-20 15:40:51'),
(17, 2, 5, 2, 1, 1, 0, '2018-06-20 15:40:51', '2018-06-20 15:40:51'),
(18, 2, 6, 3, 2, 1, 0, '2018-06-20 15:40:51', '2018-06-20 15:40:51'),
(19, 2, 7, 4, 2, 2, 0, '2018-06-20 15:40:51', '2018-06-20 15:40:51'),
(20, 2, 8, 11, 6, 4, 1, '2018-06-20 15:40:51', '2018-06-20 15:40:51'),
(21, 2, 9, 2, 1, 1, 0, '2018-06-20 15:40:51', '2018-06-20 15:40:51'),
(22, 2, 10, 7, 5, 2, 0, '2018-06-20 15:40:51', '2018-06-20 15:40:51'),
(23, 2, 11, 3, 1, 2, 0, '2018-06-20 15:40:51', '2018-06-20 15:40:51'),
(24, 2, 12, 4, 3, 1, 0, '2018-06-20 15:40:51', '2018-06-20 15:40:51'),
(37, 4, 1, 5, 2, 3, 0, '2018-07-17 19:29:26', '2018-07-17 19:29:26'),
(38, 4, 2, 4, 3, 1, 0, '2018-07-17 19:29:26', '2018-07-17 19:29:26'),
(39, 4, 3, 4, 1, 3, 0, '2018-07-17 19:29:26', '2018-07-17 19:29:26'),
(40, 4, 4, 5, 3, 2, 0, '2018-07-17 19:29:26', '2018-07-17 19:29:26'),
(41, 4, 5, 2, 1, 1, 0, '2018-07-17 19:29:26', '2018-07-17 19:29:26'),
(42, 4, 6, 3, 2, 1, 0, '2018-07-17 19:29:26', '2018-07-17 19:29:26'),
(43, 4, 7, 4, 2, 2, 0, '2018-07-17 19:29:26', '2018-07-17 19:29:26'),
(44, 4, 8, 11, 6, 4, 1, '2018-07-17 19:29:26', '2018-07-17 19:29:26'),
(45, 4, 9, 2, 1, 1, 0, '2018-07-17 19:29:26', '2018-07-17 19:29:26'),
(46, 4, 10, 7, 5, 2, 0, '2018-07-17 19:29:27', '2018-07-17 19:29:27'),
(47, 4, 11, 3, 1, 2, 0, '2018-07-17 19:29:27', '2018-07-17 19:29:27'),
(48, 4, 12, 4, 3, 1, 0, '2018-07-17 19:29:27', '2018-07-17 19:29:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisismpmasters`
--

CREATE TABLE `kondisismpmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalSMP` int(11) NOT NULL,
  `totalKondisiBaik` int(11) NOT NULL,
  `totalRusakRingan` int(11) NOT NULL,
  `totalRusakBerat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kondisismpmasters`
--

INSERT INTO `kondisismpmasters` (`id`, `ta`, `totalSMP`, `totalKondisiBaik`, `totalRusakRingan`, `totalRusakBerat`, `created_at`, `updated_at`) VALUES
(1, 2017, 58, 43, 15, 0, '2018-06-20 15:37:09', '2018-06-20 15:37:09'),
(2, 2016, 55, 32, 23, 2, '2018-06-20 15:40:51', '2019-01-25 00:42:43'),
(4, 2018, 54, 30, 23, 1, '2018-07-17 19:29:26', '2018-07-17 19:29:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisitkdetails`
--

CREATE TABLE `kondisitkdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kondisiTKMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlTK` int(11) NOT NULL,
  `jmlKondisiBaik` int(11) NOT NULL,
  `jmlRusakRingan` int(11) NOT NULL,
  `jmlRusakBerat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kondisitkdetails`
--

INSERT INTO `kondisitkdetails` (`id`, `kondisiTKMaster_id`, `kecamatan_id`, `jmlTK`, `jmlKondisiBaik`, `jmlRusakRingan`, `jmlRusakBerat`, `created_at`, `updated_at`) VALUES
(13, 2, 1, 35, 23, 12, 0, '2018-07-12 05:43:50', '2019-01-19 23:14:30'),
(14, 2, 2, 14, 8, 5, 1, '2018-07-12 05:43:50', '2019-01-19 23:14:30'),
(15, 2, 3, 15, 10, 5, 0, '2018-07-12 05:43:50', '2019-01-19 23:14:30'),
(16, 2, 4, 22, 13, 7, 2, '2018-07-12 05:43:50', '2019-01-19 23:14:30'),
(17, 2, 5, 16, 10, 6, 0, '2018-07-12 05:43:50', '2019-01-19 23:14:30'),
(18, 2, 6, 19, 11, 5, 3, '2018-07-12 05:43:50', '2019-01-19 23:14:30'),
(19, 2, 7, 16, 10, 6, 0, '2018-07-12 05:43:50', '2019-01-19 23:14:30'),
(20, 2, 8, 24, 16, 6, 2, '2018-07-12 05:43:50', '2019-01-19 23:14:30'),
(21, 2, 9, 14, 10, 4, 0, '2018-07-12 05:43:50', '2019-01-19 23:14:30'),
(22, 2, 10, 25, 16, 8, 1, '2018-07-12 05:43:50', '2019-01-19 23:14:30'),
(23, 2, 11, 15, 8, 6, 1, '2018-07-12 05:43:50', '2019-01-19 23:14:30'),
(24, 2, 12, 15, 9, 5, 1, '2018-07-12 05:43:50', '2019-01-19 23:14:31'),
(25, 3, 1, 35, 23, 12, 0, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(26, 3, 2, 14, 8, 5, 1, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(27, 3, 3, 15, 9, 6, 0, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(28, 3, 4, 22, 12, 7, 3, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(29, 3, 5, 15, 9, 6, 0, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(30, 3, 6, 19, 11, 5, 3, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(31, 3, 7, 15, 9, 6, 0, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(32, 3, 8, 22, 14, 6, 2, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(33, 3, 9, 14, 9, 5, 0, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(34, 3, 10, 24, 14, 9, 1, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(35, 3, 11, 11, 4, 5, 2, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(36, 3, 12, 14, 8, 5, 1, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(37, 4, 1, 35, 23, 12, 0, '2018-07-12 05:50:48', '2018-07-12 05:50:48'),
(38, 4, 2, 14, 8, 5, 1, '2018-07-12 05:50:48', '2018-07-12 05:50:48'),
(39, 4, 3, 15, 10, 5, 0, '2018-07-12 05:50:48', '2018-07-12 05:50:48'),
(40, 4, 4, 22, 13, 7, 2, '2018-07-12 05:50:48', '2018-07-12 05:50:48'),
(41, 4, 5, 16, 10, 6, 0, '2018-07-12 05:50:48', '2018-07-12 05:50:48'),
(42, 4, 6, 19, 11, 5, 3, '2018-07-12 05:50:49', '2018-07-12 05:50:49'),
(43, 4, 7, 16, 10, 6, 0, '2018-07-12 05:50:49', '2018-07-12 05:50:49'),
(44, 4, 8, 24, 16, 6, 2, '2018-07-12 05:50:49', '2018-07-12 05:50:49'),
(45, 4, 9, 14, 10, 4, 0, '2018-07-12 05:50:49', '2018-07-12 05:50:49'),
(46, 4, 10, 25, 16, 8, 1, '2018-07-12 05:50:49', '2018-07-12 05:50:49'),
(47, 4, 11, 15, 8, 6, 1, '2018-07-12 05:50:49', '2018-07-12 05:50:49'),
(48, 4, 12, 15, 9, 5, 1, '2018-07-12 05:50:49', '2018-07-12 05:50:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisitkmasters`
--

CREATE TABLE `kondisitkmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalTK` int(11) NOT NULL,
  `totalKondisiBaik` int(11) NOT NULL,
  `totalRusakRingan` int(11) NOT NULL,
  `totalRusakBerat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kondisitkmasters`
--

INSERT INTO `kondisitkmasters` (`id`, `ta`, `totalTK`, `totalKondisiBaik`, `totalRusakRingan`, `totalRusakBerat`, `created_at`, `updated_at`) VALUES
(2, 2015, 211, 110, 77, 24, '2018-07-12 05:43:50', '2018-07-12 05:43:50'),
(3, 2016, 220, 130, 77, 13, '2018-07-12 05:47:32', '2018-07-12 05:47:32'),
(4, 2017, 230, 144, 75, 11, '2018-07-12 05:50:48', '2018-07-12 05:50:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koperasidetails`
--

CREATE TABLE `koperasidetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `koperasiMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlKoperasi` int(11) NOT NULL,
  `jmlAktif` int(11) NOT NULL,
  `jmlTidakaktif` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `koperasidetails`
--

INSERT INTO `koperasidetails` (`id`, `koperasiMaster_id`, `kecamatan_id`, `jmlKoperasi`, `jmlAktif`, `jmlTidakaktif`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 2, 0, 2, '2019-01-25 03:21:40', '2019-01-25 03:21:40'),
(2, 6, 2, 0, 0, 0, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(3, 6, 3, 2, 0, 2, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(4, 6, 4, 0, 0, 0, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(5, 6, 5, 0, 0, 0, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(6, 6, 6, 0, 0, 0, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(7, 6, 7, 0, 0, 0, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(8, 6, 8, 0, 0, 0, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(9, 6, 9, 0, 0, 0, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(10, 6, 10, 0, 0, 0, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(11, 6, 11, 0, 0, 0, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(12, 6, 12, 3, 0, 3, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(13, 6, 13, 0, 0, 0, '2019-01-25 03:21:41', '2019-01-25 03:21:41'),
(14, 6, 14, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(15, 6, 15, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(16, 6, 16, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(17, 6, 17, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(18, 6, 18, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(19, 6, 19, 3, 0, 3, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(20, 6, 20, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(21, 6, 21, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(22, 6, 22, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(23, 6, 23, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(24, 6, 24, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(25, 6, 25, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(26, 6, 26, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(27, 6, 27, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(28, 6, 28, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42'),
(29, 6, 29, 0, 0, 0, '2019-01-25 03:21:42', '2019-01-25 03:21:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `koperasimasters`
--

CREATE TABLE `koperasimasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalKoperasi` int(11) NOT NULL,
  `totalAktif` int(11) NOT NULL,
  `totalTidakaktif` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `koperasimasters`
--

INSERT INTO `koperasimasters` (`id`, `ta`, `totalKoperasi`, `totalAktif`, `totalTidakaktif`, `created_at`, `updated_at`) VALUES
(1, 2016, 288, 229, 59, '2018-10-21 19:39:52', '2018-10-21 19:39:52'),
(2, 2017, 289, 289, 0, '2018-10-21 19:53:08', '2018-10-21 19:53:08'),
(4, 2018, 4, 0, 4, '2019-01-25 03:19:42', '2019-01-25 03:19:42'),
(5, 2018, 7, 0, 7, '2019-01-25 03:20:46', '2019-01-25 03:20:46'),
(6, 2018, 10, 0, 10, '2019-01-25 03:21:40', '2019-01-25 03:21:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `korbanpertikaians`
--

CREATE TABLE `korbanpertikaians` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlKorban` int(11) NOT NULL,
  `jmlMeninggal` int(11) NOT NULL,
  `jmlLuka` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `korbanunjukrasas`
--

CREATE TABLE `korbanunjukrasas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlKorban` int(11) NOT NULL,
  `jmlMeninggal` int(11) NOT NULL,
  `jmlLuka` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungandetails`
--

CREATE TABLE `kunjungandetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `kunjunganMaster_id` int(11) NOT NULL,
  `lokasiperpustakaan_id` int(11) NOT NULL,
  `jmlKunjungan` int(11) NOT NULL,
  `jmlLaki` int(11) NOT NULL,
  `jmlPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kunjungandetails`
--

INSERT INTO `kunjungandetails` (`id`, `kunjunganMaster_id`, `lokasiperpustakaan_id`, `jmlKunjungan`, `jmlLaki`, `jmlPerempuan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 10623, 3618, 7005, '2018-10-21 19:01:07', '2018-10-21 19:01:07'),
(2, 1, 2, 419, 195, 224, '2018-10-21 19:01:07', '2018-10-21 19:01:07'),
(3, 1, 3, 3778, 1955, 1823, '2018-10-21 19:01:07', '2018-10-21 19:01:07'),
(4, 1, 4, 2829, 1235, 1594, '2018-10-21 19:01:07', '2018-10-21 19:01:07'),
(5, 1, 5, 4733, 1304, 3429, '2018-10-21 19:01:07', '2018-10-21 19:01:07'),
(6, 1, 6, 10940, 6558, 4382, '2018-10-21 19:01:07', '2018-10-21 19:01:07'),
(7, 1, 7, 327, 161, 166, '2018-10-21 19:01:07', '2018-10-21 19:01:07'),
(8, 2, 1, 15569, 4608, 10961, '2018-10-21 19:03:48', '2018-10-21 19:03:48'),
(9, 2, 2, 1668, 123, 1545, '2018-10-21 19:03:48', '2018-10-21 19:03:48'),
(10, 2, 3, 3090, 1482, 1608, '2018-10-21 19:03:48', '2018-10-21 19:03:48'),
(11, 2, 4, 4833, 1752, 3081, '2018-10-21 19:03:48', '2018-10-21 19:03:48'),
(12, 2, 5, 4945, 992, 3953, '2018-10-21 19:03:48', '2018-10-21 19:03:48'),
(13, 2, 6, 7221, 2867, 4354, '2018-10-21 19:03:48', '2018-10-21 19:03:48'),
(14, 2, 7, 728, 347, 381, '2018-10-21 19:03:48', '2018-10-21 19:03:48'),
(15, 3, 1, 12080, 4572, 7508, '2018-10-21 19:06:37', '2018-10-21 19:06:37'),
(16, 3, 2, 427, 230, 197, '2018-10-21 19:06:37', '2018-10-21 19:06:37'),
(17, 3, 3, 7003, 3408, 3595, '2018-10-21 19:06:37', '2018-10-21 19:06:37'),
(18, 3, 4, 3802, 1984, 1818, '2018-10-21 19:06:37', '2018-10-21 19:06:37'),
(19, 3, 5, 3146, 743, 2403, '2018-10-21 19:06:37', '2018-10-21 19:06:37'),
(20, 3, 6, 5620, 2509, 3111, '2018-10-21 19:06:37', '2018-10-21 19:06:37'),
(21, 3, 7, 3624, 1741, 1883, '2018-10-21 19:06:37', '2018-10-21 19:06:37'),
(36, 6, 1, 5, 3, 2, '2019-01-26 06:59:10', '2019-01-26 06:59:10'),
(37, 6, 2, 2, 0, 2, '2019-01-26 06:59:10', '2019-01-26 06:59:10'),
(38, 6, 3, 0, 0, 0, '2019-01-26 06:59:10', '2019-01-26 06:59:10'),
(39, 6, 4, 1, 0, 1, '2019-01-26 06:59:10', '2019-01-26 07:25:06'),
(40, 6, 5, 0, 0, 0, '2019-01-26 06:59:10', '2019-01-26 06:59:10'),
(41, 6, 6, 0, 0, 0, '2019-01-26 06:59:11', '2019-01-26 06:59:11'),
(42, 6, 7, 0, 0, 0, '2019-01-26 06:59:11', '2019-01-26 06:59:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjunganmasters`
--

CREATE TABLE `kunjunganmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalKunjungan` int(11) NOT NULL,
  `totalLaki` int(11) NOT NULL,
  `totalPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kunjunganmasters`
--

INSERT INTO `kunjunganmasters` (`id`, `ta`, `totalKunjungan`, `totalLaki`, `totalPerempuan`, `created_at`, `updated_at`) VALUES
(1, 2015, 33649, 15026, 18623, '2018-10-21 19:01:07', '2018-10-21 19:01:07'),
(2, 2016, 38054, 12171, 25883, '2018-10-21 19:03:48', '2018-10-21 19:03:48'),
(3, 2017, 35702, 15187, 20515, '2018-10-21 19:06:36', '2018-10-21 19:06:36'),
(6, 2018, 5, 0, 5, '2019-01-26 06:59:10', '2019-01-26 07:25:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lakalantas`
--

CREATE TABLE `lakalantas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlKejadian` int(11) NOT NULL,
  `Meninggal` int(11) NOT NULL,
  `Lukaberat` int(11) NOT NULL,
  `Lukaringan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lakalantas`
--

INSERT INTO `lakalantas` (`id`, `ta`, `jmlKejadian`, `Meninggal`, `Lukaberat`, `Lukaringan`, `created_at`, `updated_at`) VALUES
(1, 2015, 271, 37, 30, 400, '2018-07-09 17:54:04', '2018-07-09 17:54:04'),
(2, 2016, 382, 84, 5, 519, '2018-07-09 17:55:39', '2018-07-09 17:55:39'),
(3, 2017, 421, 87, 9, 576, '2018-07-09 17:58:10', '2019-01-21 08:28:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasiperpustakaans`
--

CREATE TABLE `lokasiperpustakaans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nmaLokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lokasiperpustakaans`
--

INSERT INTO `lokasiperpustakaans` (`id`, `nmaLokasi`, `created_at`, `updated_at`) VALUES
(1, 'Perpustakaan Umum/Daerah', NULL, NULL),
(2, 'Pameran Pembangunan HUT Kabupaten Pinrang', NULL, NULL),
(3, 'Perpustakaan Keliling', NULL, NULL),
(4, 'Internet Gratis (Hostpot)', NULL, NULL),
(5, 'Pengunjung untuk Peminjam & Pengembalian Buku', NULL, NULL),
(6, 'Lapangan Lasinrang Park', NULL, NULL),
(7, 'Motor Pintar', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lsms`
--

CREATE TABLE `lsms` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlLSM` int(11) NOT NULL,
  `jmlLokalterdaftar` int(11) NOT NULL,
  `jmlLokaltidakterdaftar` int(11) NOT NULL,
  `jmlNasionalterdaftar` int(11) NOT NULL,
  `jmlNasionaltidakterdaftar` int(11) NOT NULL,
  `jmlInterterdaftar` int(11) NOT NULL,
  `jmlIntertidakterdaftar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lsms`
--

INSERT INTO `lsms` (`id`, `ta`, `jmlLSM`, `jmlLokalterdaftar`, `jmlLokaltidakterdaftar`, `jmlNasionalterdaftar`, `jmlNasionaltidakterdaftar`, `jmlInterterdaftar`, `jmlIntertidakterdaftar`, `created_at`, `updated_at`) VALUES
(1, 2018, 31, 30, 1, 0, 0, 0, 0, '2018-07-17 21:53:51', '2019-01-20 09:25:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `luassawahdetails`
--

CREATE TABLE `luassawahdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `uptd_psda_id` int(11) NOT NULL,
  `luassawahMaster_id` int(11) NOT NULL,
  `jmlPetak` int(11) NOT NULL,
  `jmlLuas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `luassawahdetails`
--

INSERT INTO `luassawahdetails` (`id`, `uptd_psda_id`, `luassawahMaster_id`, `jmlPetak`, `jmlLuas`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, 8, '2019-01-25 11:41:15', '2019-01-25 11:41:15'),
(2, 2, 2, 0, 0, '2019-01-25 11:41:15', '2019-01-25 11:41:15'),
(3, 3, 2, 0, 0, '2019-01-25 11:41:16', '2019-01-25 11:41:16'),
(4, 4, 2, 0, 0, '2019-01-25 11:41:16', '2019-01-25 11:41:16'),
(5, 5, 2, 0, 0, '2019-01-25 11:41:16', '2019-01-25 11:41:16'),
(6, 6, 2, 0, 0, '2019-01-25 11:41:16', '2019-01-25 11:41:16'),
(7, 7, 2, 0, 0, '2019-01-25 11:41:16', '2019-01-25 11:41:16'),
(8, 8, 2, 0, 0, '2019-01-25 11:41:16', '2019-01-25 11:41:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `luassawahmasters`
--

CREATE TABLE `luassawahmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalPetak` int(11) NOT NULL,
  `totalLuas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `luassawahmasters`
--

INSERT INTO `luassawahmasters` (`id`, `ta`, `totalPetak`, `totalLuas`, `created_at`, `updated_at`) VALUES
(1, 2017, 161618, 38977, '2018-07-18 22:39:03', '2018-07-18 22:39:03'),
(2, 2018, 0, 8, '2019-01-25 11:41:15', '2019-01-25 11:41:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masalahsosialdetails`
--

CREATE TABLE `masalahsosialdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `masalahsosialMaster_id` int(11) NOT NULL,
  `masalahsosial_id` int(11) NOT NULL,
  `jmlMasalah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masalahsosialdetails`
--

INSERT INTO `masalahsosialdetails` (`id`, `masalahsosialMaster_id`, `masalahsosial_id`, `jmlMasalah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, '2019-01-25 23:45:24', '2019-01-25 23:45:24'),
(2, 1, 2, 0, '2019-01-25 23:45:24', '2019-01-25 23:45:24'),
(3, 1, 3, 0, '2019-01-25 23:45:24', '2019-01-25 23:45:24'),
(4, 1, 4, 0, '2019-01-25 23:45:24', '2019-01-25 23:45:24'),
(5, 1, 5, 0, '2019-01-25 23:45:24', '2019-01-25 23:45:24'),
(6, 1, 6, 0, '2019-01-25 23:45:24', '2019-01-25 23:45:24'),
(7, 1, 7, 5, '2019-01-25 23:45:24', '2019-01-25 23:45:24'),
(8, 1, 8, 0, '2019-01-25 23:45:24', '2019-01-25 23:45:24'),
(9, 1, 9, 0, '2019-01-25 23:45:24', '2019-01-25 23:45:24'),
(10, 1, 10, 0, '2019-01-25 23:45:24', '2019-01-25 23:45:24'),
(11, 1, 11, 0, '2019-01-25 23:45:24', '2019-01-25 23:45:24'),
(12, 1, 12, 0, '2019-01-25 23:45:25', '2019-01-25 23:45:25'),
(13, 1, 13, 0, '2019-01-25 23:45:25', '2019-01-25 23:45:25'),
(14, 1, 14, 0, '2019-01-25 23:45:25', '2019-01-25 23:45:25'),
(15, 1, 15, 0, '2019-01-25 23:45:25', '2019-01-25 23:45:25'),
(16, 1, 16, 0, '2019-01-25 23:45:25', '2019-01-25 23:45:25'),
(17, 1, 17, 0, '2019-01-25 23:45:25', '2019-01-25 23:45:25'),
(18, 1, 18, 0, '2019-01-25 23:45:25', '2019-01-25 23:45:25'),
(19, 1, 19, 0, '2019-01-25 23:45:25', '2019-01-25 23:45:25'),
(20, 1, 20, 0, '2019-01-25 23:45:25', '2019-01-25 23:45:25'),
(21, 1, 21, 0, '2019-01-25 23:45:25', '2019-01-25 23:45:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masalahsosialmasters`
--

CREATE TABLE `masalahsosialmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalMasalah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masalahsosialmasters`
--

INSERT INTO `masalahsosialmasters` (`id`, `ta`, `totalMasalah`, `created_at`, `updated_at`) VALUES
(1, 2018, 5, '2019-01-25 23:45:24', '2019-01-25 23:45:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masalahsosials`
--

CREATE TABLE `masalahsosials` (
  `id` int(10) UNSIGNED NOT NULL,
  `nmaMasalah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masalahsosials`
--

INSERT INTO `masalahsosials` (`id`, `nmaMasalah`, `created_at`, `updated_at`) VALUES
(1, 'Anak Balita Terlantar (ABT)', NULL, NULL),
(2, 'Anak Terlantar (AT)', NULL, NULL),
(3, 'Anak yang Berhadapan dengan hukum', NULL, NULL),
(4, 'Anak Jalanan', NULL, NULL),
(5, 'Anakan dengan kedisabilitas', NULL, NULL),
(6, 'Anak Korban Tindak Kekerasan', NULL, NULL),
(7, 'Anak Yang memerlukan Perlindungan Khusus', NULL, NULL),
(8, 'Lanjut Usia Terlantar', NULL, NULL),
(9, 'Penyandang disabilitas', NULL, NULL),
(10, 'Tuna Susila', NULL, NULL),
(11, 'Gelandangan', NULL, NULL),
(12, 'Pemulung', NULL, NULL),
(13, 'Kelompok Minoritas', NULL, NULL),
(14, 'Bekas Warga Binaan Lembaga Pemasyarakatan (BWBLP)', NULL, NULL),
(15, 'Orang dengan HIV/AIDS (ODHA)', NULL, NULL),
(16, 'Korban Penyalagunaan NAPZA', NULL, NULL),
(17, 'Korban traffiking', NULL, NULL),
(18, 'Perempuan rawan sosial ekonomi', NULL, NULL),
(19, 'Fakir Miskin', NULL, NULL),
(20, 'Keluarga bermasalah sosial psikologis', NULL, NULL),
(21, 'Komunitas Adat Terpencil', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_31_231731_buat_tabel_skpd', 1),
(5, '2018_06_01_124422_create_kondisi_s_d_masters_table', 1),
(6, '2018_06_01_124801_create_kondisi_s_d_details_table', 1),
(7, '2018_06_01_134310_create_kecamatans_table', 1),
(8, '2018_06_02_041319_create_kondisi_s_m_p_masters_table', 1),
(9, '2018_06_02_041329_create_kondisi_s_m_p_details_table', 1),
(10, '2018_06_02_064106_create_kondisi_p_a_u_d_masters_table', 1),
(11, '2018_06_02_064121_create_kondisi_p_a_u_d_details_table', 1),
(12, '2018_06_02_065039_create_kondisi_t_k_masters_table', 1),
(13, '2018_06_02_065048_create_kondisi_t_k_details_table', 1),
(14, '2018_06_02_070624_create_guru_p_n_s_masters_table', 1),
(15, '2018_06_02_070644_create_guru_p_n_s_details_table', 1),
(16, '2018_06_02_082656_create_guru_honor_masters_table', 1),
(17, '2018_06_02_082708_create_guru_honor_details_table', 1),
(18, '2018_06_02_085455_create_guru_sertifikat_masters_table', 1),
(19, '2018_06_02_085502_create_guru_sertifikat_details_table', 1),
(20, '2018_06_02_092014_create_siswa_s_d_masters_table', 1),
(21, '2018_06_02_092026_create_siswa_s_d_details_table', 1),
(22, '2018_06_02_095157_create_siswa_s_m_p_masters_table', 1),
(23, '2018_06_02_095204_create_siswa_s_m_p_details_table', 1),
(24, '2018_06_02_102854_create_siswa_t_k_masters_table', 1),
(25, '2018_06_02_102904_create_siswa_t_k_details_table', 1),
(26, '2018_06_04_031754_create_kategoris_table', 1),
(27, '2018_06_04_131443_create_penduduk_masters_table', 1),
(28, '2018_06_04_131520_create_penduduk_details_table', 1),
(29, '2018_06_04_151929_create_kartukeluarga_masters_table', 1),
(30, '2018_06_04_151941_create_kartukeluarga_details_table', 1),
(31, '2018_06_05_000312_create_kelahiran_masters_table', 1),
(32, '2018_06_05_000322_create_kelahiran_details_table', 1),
(33, '2018_06_05_004057_create_kawin_masters_table', 1),
(34, '2018_06_05_004111_create_kawin_details_table', 1),
(35, '2018_06_05_045644_create_penyakit10Masters_table', 1),
(36, '2018_06_05_045719_create_penyakit10Details_table', 1),
(37, '2018_06_05_050123_create_puskesmas_table', 1),
(38, '2018_06_05_071851_create_penyakits_table', 1),
(39, '2018_06_06_040218_create_jamkes_masters_table', 1),
(40, '2018_06_06_040230_create_jamkes_details_table', 1),
(41, '2018_06_06_050711_create_giziburuk_masters_table', 1),
(42, '2018_06_06_050721_create_giziburuk_details_table', 1),
(43, '2018_06_06_070024_create_uptd_psdas_table', 1),
(44, '2018_06_06_070048_create_luassawah_masters_table', 1),
(45, '2018_06_06_070056_create_luassawah_details_table', 1),
(46, '2018_06_06_094744_create_irigasi_masters_table', 1),
(47, '2018_06_06_094756_create_irigasi_details_table', 1),
(48, '2018_06_07_011128_create_kbaktif_masters_table', 1),
(49, '2018_06_07_011142_create_kbaktif_details_table', 1),
(52, '2018_06_07_151403_create_umkm_masters_table', 1),
(53, '2018_06_07_151410_create_umkm_details_table', 1),
(54, '2018_06_07_212822_create_sawah_masters_table', 1),
(55, '2018_06_07_212832_create_sawah_details_table', 1),
(56, '2018_06_07_220323_create_padi_masters_table', 1),
(57, '2018_06_07_220333_create_padi_details_table', 1),
(58, '2018_06_07_223452_create_jagung_masters_table', 1),
(59, '2018_06_07_223502_create_jagung_details_table', 1),
(60, '2018_06_07_224534_create_kedelai_details_table', 1),
(61, '2018_06_07_224550_create_kedelai_masters_table', 1),
(62, '2018_06_08_013319_create_kacangtanah_masters_table', 1),
(63, '2018_06_08_013334_create_kacangtanah_details_table', 1),
(64, '2018_06_08_014855_create_kacanghijau_masters_table', 1),
(65, '2018_06_08_014904_create_kacanghijau_details_table', 1),
(66, '2018_06_08_015529_create_ubikayu_masters_table', 1),
(67, '2018_06_08_015543_create_ubijalar_details_table', 1),
(68, '2018_06_08_020300_create_ubikayu_details_table', 1),
(69, '2018_06_08_020446_create_ubijalar_masters_table', 1),
(70, '2018_06_08_022719_create_nelayan_masters_table', 1),
(71, '2018_06_08_022728_create_nelayan_details_table', 1),
(72, '2018_06_08_031537_create_armada_details_table', 1),
(73, '2018_06_08_031546_create_armada_masters_table', 1),
(74, '2018_06_08_034033_create_budidaya_masters_table', 1),
(75, '2018_06_08_034042_create_budidaya_details_table', 1),
(76, '2018_06_08_050249_create_produksiikan_details_table', 1),
(77, '2018_06_08_050305_create_produksiikan_masters_table', 1),
(78, '2018_06_08_053121_create_ikanasin_masters_table', 1),
(79, '2018_06_08_053133_create_ikanasin_details_table', 1),
(80, '2018_06_08_055407_create_ikansegar_details_table', 1),
(81, '2018_06_08_055418_create_ikansegar_masters_table', 1),
(82, '2018_06_08_135618_create_ternak_kerbaus_table', 1),
(83, '2018_06_08_203100_create_ternak_kudas_table', 1),
(84, '2018_06_08_212323_create_ternak_sapipotongs_table', 1),
(85, '2018_06_08_213557_create_ternak_sapiperahs_table', 1),
(86, '2018_06_08_214401_create_ternak_babis_table', 1),
(87, '2018_06_08_214933_create_ternak_dombas_table', 1),
(88, '2018_06_08_215443_create_ternak_kambings_table', 1),
(89, '2018_06_08_215853_create_ternak_ayamburas_table', 1),
(90, '2018_06_08_220509_create_ternak_ayamraspedagings_table', 1),
(91, '2018_06_08_221014_create_ternak_ayamraspetelurs_table', 1),
(92, '2018_06_08_221442_create_ternak_itiks_table', 1),
(93, '2018_06_09_084241_create_kebun_kelapadalams_table', 1),
(94, '2018_06_09_092600_create_kebun_kelapahybridas_table', 1),
(95, '2018_06_09_094608_create_kebun_kakaos_table', 1),
(96, '2018_06_09_101845_create_kebun_kopirobustas_table', 1),
(97, '2018_06_09_102508_create_kebun_kopiarabikas_table', 1),
(98, '2018_06_09_110337_create_kebun_jambumetes_table', 1),
(99, '2018_06_09_110757_create_kebun_kemiris_table', 1),
(100, '2018_06_09_111023_create_kebun_cengkehs_table', 1),
(101, '2018_06_09_111434_create_kebun_ladas_table', 1),
(102, '2018_06_09_111731_create_kebun_kapuks_table', 1),
(103, '2018_06_09_112039_create_kebun_panilis_table', 1),
(104, '2018_06_09_112542_create_kebun_arens_table', 1),
(105, '2018_06_09_112914_create_kebun_pinangs_table', 1),
(106, '2018_06_09_134432_create_kebun_palas_table', 1),
(107, '2018_06_09_134823_create_kebun_kelapa_sawits_table', 1),
(108, '2018_06_09_135416_create_kebun_nilams_table', 1),
(109, '2018_06_09_140334_create_transmigrasis_table', 1),
(110, '2018_06_09_153032_create_pencakers_table', 1),
(111, '2018_06_09_203124_create_naker_masters_table', 1),
(112, '2018_06_09_203137_create_naker_details_table', 1),
(113, '2018_06_10_035712_create_lakalantas_table', 1),
(114, '2018_06_10_045506_create_ujikendaraans_table', 1),
(115, '2018_06_10_052526_create_fasjals_table', 1),
(116, '2018_06_10_053750_create_lokasiperpustakaans_table', 1),
(117, '2018_06_13_032443_create_bidang_izins_table', 1),
(118, '2018_06_13_034045_create_penerbitanizin_masters_table', 1),
(119, '2018_06_13_034053_create_penerbitanizin_details_table', 1),
(120, '2018_06_18_022051_create_kunjungan_masters_table', 1),
(121, '2018_06_18_022236_create_kunjungan_details_table', 1),
(122, '2018_06_01_053835_buat_tabel_walidata', 2),
(123, '2018_06_24_004404_create_hotels_table', 3),
(124, '2018_06_24_012734_create_internet_masters_table', 3),
(125, '2018_06_24_012744_create_internet_details_table', 3),
(126, '2018_06_24_030614_create_jalan_details_table', 3),
(127, '2018_06_24_030625_create_jalan_masters_table', 3),
(128, '2018_06_24_040024_create_pegawais_table', 3),
(129, '2018_06_24_114257_create_eselons_table', 3),
(130, '2018_06_25_235110_create_golongans_table', 3),
(131, '2018_06_26_012434_create_perbankans_table', 3),
(132, '2018_06_27_235707_create_pos_masters_table', 3),
(133, '2018_06_27_235721_create_pos_details_table', 3),
(134, '2018_06_28_004249_create_telekomunikasi_masters_table', 3),
(135, '2018_06_28_004309_create_telekomunikasi_details_table', 3),
(136, '2018_07_12_004907_create_bencanas_table', 4),
(137, '2018_07_12_010331_create_masalahsosials_table', 4),
(138, '2018_07_12_015120_create_bencana_masters_table', 4),
(139, '2018_07_12_015137_create_bencana_details_table', 4),
(140, '2018_07_12_033812_create_masalahsosial_details_table', 4),
(141, '2018_07_12_033829_create_masalahsosial_masters_table', 4),
(142, '2018_07_12_051105_create_bencanaalam_masters_table', 4),
(143, '2018_07_12_051119_create_bencanaalam_details_table', 4),
(144, '2018_07_13_001349_create_pelanggaran_k3s_table', 5),
(145, '2018_07_13_014659_create_pertikaians_table', 5),
(146, '2018_07_13_023727_create_korbanpertikaians_table', 5),
(147, '2018_07_13_034049_create_unjukrasas_table', 5),
(148, '2018_07_13_054815_create_korbanunjukrasas_table', 5),
(149, '2018_07_14_005452_create_aparatkeamanans_table', 5),
(150, '2018_07_14_013130_create_saranakeamanans_table', 5),
(151, '2018_07_14_014941_create_kendaraanoperasionals_table', 5),
(152, '2018_07_14_044451_create_apbds_table', 5),
(153, '2018_07_15_012531_create_daftar_koperasis_table', 5),
(154, '2018_07_15_014525_create_koperasi_masters_table', 6),
(155, '2018_07_15_014533_create_koperasi_details_table', 6),
(156, '2018_07_15_031010_create_pegawaipendidikans_table', 6),
(157, '2018_07_15_041640_create_pegawaiagamas_table', 6),
(158, '2018_07_15_044313_create_sppl_masters_table', 6),
(159, '2018_07_15_044323_create_sppl_details_table', 6),
(160, '2018_07_17_004627_create_lsms_table', 6),
(161, '2018_07_19_110732_create_jalans_table', 7),
(162, '2018_07_19_115124_create_airlimbah_masters_table', 7),
(163, '2018_07_19_115134_create_airlimbah_details_table', 7),
(164, '2018_07_19_123409_create_bangunan_details_table', 7),
(165, '2018_07_19_123419_create_bangunan_masters_table', 7),
(166, '2018_07_19_124228_create_drainase_masters_table', 7),
(167, '2018_07_19_124240_create_drainase_details_table', 7),
(168, '2018_07_19_125754_create_pemukiman_masters_table', 7),
(169, '2018_07_19_125805_create_pemukiman_details_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nakerdetails`
--

CREATE TABLE `nakerdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `nakerMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlPerusahaan` int(11) NOT NULL,
  `jmlNaker` int(11) NOT NULL,
  `jmlNakerlaki` int(11) NOT NULL,
  `jmlNakerperempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nakerdetails`
--

INSERT INTO `nakerdetails` (`id`, `nakerMaster_id`, `kecamatan_id`, `jmlPerusahaan`, `jmlNaker`, `jmlNakerlaki`, `jmlNakerperempuan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 198, 2097, 1386, 711, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(2, 1, 2, 8, 167, 53, 114, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(3, 1, 3, 24, 545, 413, 132, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(4, 1, 4, 20, 428, 311, 117, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(5, 1, 5, 47, 407, 276, 131, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(6, 1, 6, 11, 59, 52, 7, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(7, 1, 7, 14, 253, 180, 73, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(8, 1, 8, 3, 162, 155, 7, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(9, 1, 9, 11, 133, 81, 52, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(10, 1, 10, 23, 94, 84, 10, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(11, 1, 11, 10, 108, 98, 10, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(12, 1, 12, 1, 4, 2, 2, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(13, 2, 1, 215, 2228, 1463, 765, '2018-07-18 23:28:58', '2018-07-18 23:28:58'),
(14, 2, 2, 8, 180, 75, 105, '2018-07-18 23:28:58', '2018-07-18 23:28:58'),
(15, 2, 3, 29, 832, 649, 183, '2018-07-18 23:28:58', '2018-07-18 23:28:58'),
(16, 2, 4, 22, 399, 318, 81, '2018-07-18 23:28:59', '2018-07-18 23:28:59'),
(17, 2, 5, 44, 338, 268, 70, '2018-07-18 23:28:59', '2018-07-18 23:28:59'),
(18, 2, 6, 12, 59, 48, 11, '2018-07-18 23:28:59', '2018-07-18 23:28:59'),
(19, 2, 7, 19, 499, 300, 199, '2018-07-18 23:28:59', '2018-07-18 23:28:59'),
(20, 2, 8, 3, 162, 155, 7, '2018-07-18 23:28:59', '2018-07-18 23:28:59'),
(21, 2, 9, 11, 170, 103, 67, '2018-07-18 23:28:59', '2018-07-18 23:28:59'),
(22, 2, 10, 23, 103, 81, 22, '2018-07-18 23:28:59', '2018-07-18 23:28:59'),
(23, 2, 11, 10, 119, 105, 14, '2018-07-18 23:28:59', '2018-07-18 23:28:59'),
(24, 2, 12, 1, 4, 2, 2, '2018-07-18 23:28:59', '2018-07-18 23:28:59'),
(25, 3, 1, 214, 2217, 1454, 763, '2018-07-18 23:35:18', '2018-07-18 23:35:18'),
(26, 3, 2, 8, 180, 75, 105, '2018-07-18 23:35:18', '2018-07-18 23:35:18'),
(27, 3, 3, 29, 667, 649, 183, '2018-07-18 23:35:18', '2018-07-18 23:35:18'),
(28, 3, 4, 22, 399, 318, 81, '2018-07-18 23:35:18', '2018-07-18 23:35:18'),
(29, 3, 5, 46, 356, 283, 73, '2018-07-18 23:35:18', '2018-07-18 23:35:18'),
(30, 3, 6, 12, 59, 48, 11, '2018-07-18 23:35:18', '2018-07-18 23:35:18'),
(31, 3, 7, 19, 499, 300, 199, '2018-07-18 23:35:18', '2018-07-18 23:35:18'),
(32, 3, 8, 3, 162, 155, 7, '2018-07-18 23:35:18', '2018-07-18 23:35:18'),
(33, 3, 9, 11, 170, 103, 67, '2018-07-18 23:35:18', '2018-07-18 23:35:18'),
(34, 3, 10, 23, 103, 81, 22, '2018-07-18 23:35:18', '2018-07-18 23:35:18'),
(35, 3, 11, 10, 119, 105, 14, '2018-07-18 23:35:18', '2018-07-18 23:35:18'),
(36, 3, 12, 1, 4, 2, 2, '2018-07-18 23:35:18', '2018-07-18 23:35:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nakermasters`
--

CREATE TABLE `nakermasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalPerusahaan` int(11) NOT NULL,
  `totalNaker` int(11) NOT NULL,
  `totalNakerlaki` int(11) NOT NULL,
  `totalNakerperempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nakermasters`
--

INSERT INTO `nakermasters` (`id`, `ta`, `totalPerusahaan`, `totalNaker`, `totalNakerlaki`, `totalNakerperempuan`, `created_at`, `updated_at`) VALUES
(1, 2016, 370, 4457, 3091, 1366, '2018-07-18 23:20:50', '2018-07-18 23:20:50'),
(2, 2017, 397, 5093, 3567, 1526, '2018-07-18 23:28:58', '2018-07-18 23:28:58'),
(3, 2018, 398, 5100, 3573, 1527, '2018-07-18 23:35:18', '2018-07-18 23:35:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nelayandetails`
--

CREATE TABLE `nelayandetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `nelayanMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlNelayan` int(11) NOT NULL,
  `jmlNelayanlaut` int(11) NOT NULL,
  `jmlNelayandarat` int(11) NOT NULL,
  `jmlPetanisawah` int(11) NOT NULL,
  `jmlPetanikolam` int(11) NOT NULL,
  `jmlPetanitambak` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nelayandetails`
--

INSERT INTO `nelayandetails` (`id`, `nelayanMaster_id`, `kecamatan_id`, `jmlNelayan`, `jmlNelayanlaut`, `jmlNelayandarat`, `jmlPetanisawah`, `jmlPetanikolam`, `jmlPetanitambak`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 104, 0, 21, 14, 69, 0, '2018-07-22 22:02:21', '2018-07-22 22:02:21'),
(2, 1, 2, 173, 0, 38, 2, 133, 0, '2018-07-22 22:02:21', '2018-07-22 22:02:21'),
(3, 1, 3, 7707, 4414, 10, 3, 25, 3255, '2018-07-22 22:02:21', '2018-07-22 22:02:21'),
(4, 1, 4, 760, 0, 139, 27, 594, 0, '2018-07-22 22:02:21', '2018-07-22 22:02:21'),
(5, 1, 5, 38, 0, 19, 9, 10, 0, '2018-07-22 22:02:21', '2018-07-22 22:02:21'),
(6, 1, 6, 9484, 1829, 78, 22, 85, 7470, '2018-07-22 22:02:21', '2018-07-22 22:02:21'),
(7, 1, 7, 142, 0, 55, 12, 75, 0, '2018-07-22 22:02:21', '2018-07-22 22:02:21'),
(8, 1, 8, 1362, 932, 48, 22, 360, 0, '2018-07-22 22:02:21', '2018-07-22 22:02:21'),
(9, 1, 9, 5112, 876, 10, 20, 45, 4161, '2018-07-22 22:02:21', '2018-07-22 22:02:21'),
(10, 1, 10, 9174, 1040, 76, 18, 255, 7785, '2018-07-22 22:02:22', '2018-07-22 22:02:22'),
(11, 1, 11, 6481, 378, 12, 17, 599, 5475, '2018-07-22 22:02:22', '2018-07-22 22:02:22'),
(12, 1, 12, 107, 0, 45, 7, 55, 0, '2018-07-22 22:02:22', '2018-07-22 22:02:22'),
(13, 2, 1, 104, 0, 21, 14, 69, 0, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(14, 2, 2, 173, 0, 38, 2, 133, 0, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(15, 2, 3, 7796, 4503, 10, 3, 25, 3255, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(16, 2, 4, 760, 0, 139, 27, 594, 0, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(17, 2, 5, 38, 0, 19, 9, 10, 0, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(18, 2, 6, 9484, 1829, 78, 22, 85, 7470, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(19, 2, 7, 142, 0, 55, 12, 75, 0, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(20, 2, 8, 1332, 922, 28, 0, 22, 360, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(21, 2, 9, 5092, 856, 10, 20, 45, 4161, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(22, 2, 10, 9161, 1027, 76, 18, 255, 7785, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(23, 2, 11, 6455, 352, 12, 17, 599, 5475, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(24, 2, 12, 107, 0, 45, 7, 55, 0, '2018-07-22 22:08:00', '2018-07-22 22:08:00'),
(25, 3, 1, 104, 0, 21, 14, 69, 0, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(26, 3, 2, 173, 0, 38, 2, 133, 0, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(27, 3, 3, 7796, 4503, 10, 3, 25, 3255, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(28, 3, 4, 760, 0, 139, 27, 594, 0, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(29, 3, 5, 38, 0, 19, 9, 10, 0, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(30, 3, 6, 9484, 1829, 78, 22, 85, 7470, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(31, 3, 7, 142, 55, 12, 75, 0, 0, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(32, 3, 8, 1332, 922, 28, 0, 22, 360, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(33, 3, 9, 5092, 856, 10, 20, 45, 4161, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(34, 3, 10, 9161, 1027, 76, 18, 255, 7785, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(35, 3, 11, 6455, 352, 12, 17, 599, 5475, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(36, 3, 12, 107, 0, 45, 7, 55, 0, '2018-07-22 22:21:40', '2018-07-22 22:21:40'),
(37, 4, 1, 104, 0, 21, 14, 69, 0, '2018-07-22 22:36:16', '2018-07-22 22:36:16'),
(38, 4, 2, 173, 0, 38, 2, 133, 0, '2018-07-22 22:36:16', '2018-07-22 22:36:16'),
(39, 4, 3, 7796, 4503, 10, 3, 25, 3255, '2018-07-22 22:36:16', '2018-07-22 22:36:16'),
(40, 4, 4, 760, 0, 139, 27, 594, 0, '2018-07-22 22:36:16', '2018-07-22 22:36:16'),
(41, 4, 5, 38, 0, 19, 9, 10, 0, '2018-07-22 22:36:16', '2018-07-22 22:36:16'),
(42, 4, 6, 9484, 1829, 78, 22, 85, 7470, '2018-07-22 22:36:16', '2018-07-22 22:36:16'),
(43, 4, 7, 142, 0, 55, 12, 75, 0, '2018-07-22 22:36:16', '2018-07-22 22:36:16'),
(44, 4, 8, 1332, 922, 28, 0, 22, 360, '2018-07-22 22:36:16', '2018-07-22 22:36:16'),
(45, 4, 9, 5092, 856, 10, 20, 45, 4161, '2018-07-22 22:36:16', '2018-07-22 22:40:30'),
(46, 4, 10, 9161, 1027, 76, 18, 255, 7785, '2018-07-22 22:36:16', '2018-07-22 22:40:30'),
(47, 4, 11, 6455, 352, 12, 17, 599, 5475, '2018-07-22 22:36:16', '2018-07-22 22:40:30'),
(48, 4, 12, 107, 0, 45, 7, 55, 0, '2018-07-22 22:36:16', '2018-07-22 22:40:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nelayanmasters`
--

CREATE TABLE `nelayanmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalNelayan` int(11) NOT NULL,
  `totalNelayanlaut` int(11) NOT NULL,
  `totalNelayandarat` int(11) NOT NULL,
  `totalPetanisawah` int(11) NOT NULL,
  `totalPetanikolam` int(11) NOT NULL,
  `totalPetanitambak` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nelayanmasters`
--

INSERT INTO `nelayanmasters` (`id`, `ta`, `totalNelayan`, `totalNelayanlaut`, `totalNelayandarat`, `totalPetanisawah`, `totalPetanikolam`, `totalPetanitambak`, `created_at`, `updated_at`) VALUES
(1, 2015, 40644, 9469, 551, 173, 2305, 28146, '2018-07-22 22:02:21', '2018-07-22 22:02:21'),
(2, 2016, 40644, 9489, 531, 151, 1967, 28506, '2018-07-22 22:07:59', '2018-07-22 22:07:59'),
(3, 2017, 40644, 9544, 488, 214, 1892, 28506, '2018-07-22 22:21:40', '2018-07-22 22:45:30'),
(4, 2018, 40644, 9489, 531, 151, 1967, 28506, '2018-07-22 22:36:15', '2018-07-22 22:40:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `padidetails`
--

CREATE TABLE `padidetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `padiMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlTanam` int(11) NOT NULL,
  `jmlPanen` int(11) NOT NULL,
  `jmlProduksi` int(11) NOT NULL,
  `jmlProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `padidetails`
--

INSERT INTO `padidetails` (`id`, `padiMaster_id`, `kecamatan_id`, `jmlTanam`, `jmlPanen`, `jmlProduksi`, `jmlProduktivitas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 9078, 9165, 58317, 64, '2018-07-18 16:30:43', '2018-07-18 16:30:43'),
(2, 1, 2, 13648, 12880, 81955, 0, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(3, 1, 3, 2458, 2337, 14870, 0, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(4, 1, 4, 12976, 12144, 77272, 0, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(5, 1, 5, 5286, 5277, 33578, 0, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(6, 1, 6, 8056, 9665, 61498, 0, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(7, 1, 7, 10507, 11462, 72933, 0, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(8, 1, 8, 3617, 5217, 33196, 0, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(9, 1, 9, 8435, 8784, 55893, 0, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(10, 1, 10, 14111, 14243, 90628, 0, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(11, 1, 11, 9563, 9753, 62058, 0, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(12, 1, 12, 3534, 3178, 20222, 0, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(25, 3, 1, 10864, 10253, 61959, 59, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(26, 3, 2, 12916, 11271, 66364, 0, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(27, 3, 3, 2694, 2022, 11906, 0, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(28, 3, 4, 13837, 13062, 76909, 0, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(29, 3, 5, 5188, 5070, 29852, 0, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(30, 3, 6, 9735, 9646, 56796, 0, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(31, 3, 7, 13728, 11979, 70532, 0, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(32, 3, 8, 5907, 5217, 32690, 0, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(33, 3, 9, 7665, 8547, 50325, 0, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(34, 3, 10, 15985, 14599, 85959, 0, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(35, 3, 11, 11069, 9753, 62731, 0, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(36, 3, 12, 3487, 3178, 19289, 0, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(37, 4, 1, 9471, 9282, 57353, 61, '2018-07-18 18:08:02', '2018-07-18 18:08:02'),
(38, 4, 2, 12282, 11366, 70231, 41, '2018-07-18 18:08:02', '2019-01-24 04:05:10'),
(39, 4, 3, 1855, 1528, 9442, 0, '2018-07-18 18:08:02', '2018-07-18 18:08:02'),
(40, 4, 4, 13650, 13384, 82700, 0, '2018-07-18 18:08:02', '2018-07-18 18:08:02'),
(41, 4, 5, 4732, 4768, 29461, 0, '2018-07-18 18:08:02', '2018-07-18 18:08:02'),
(42, 4, 6, 9278, 9598, 59306, 0, '2018-07-18 18:08:02', '2018-07-18 18:08:02'),
(43, 4, 7, 10548, 11697, 72276, 0, '2018-07-18 18:08:02', '2018-07-18 18:08:02'),
(44, 4, 8, 6133, 6040, 37321, 0, '2018-07-18 18:08:02', '2018-07-18 18:08:02'),
(45, 4, 9, 8585, 8158, 50408, 0, '2018-07-18 18:08:02', '2018-07-18 18:08:02'),
(46, 4, 10, 14634, 15328, 94712, 0, '2018-07-18 18:08:02', '2018-07-18 18:08:02'),
(47, 4, 11, 11369, 11081, 68469, 0, '2018-07-18 18:08:02', '2018-07-18 18:08:02'),
(48, 4, 12, 3900, 3609, 22300, 0, '2018-07-18 18:08:02', '2018-07-18 18:08:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `padimasters`
--

CREATE TABLE `padimasters` (
  `id` int(11) NOT NULL,
  `ta` int(11) NOT NULL,
  `totalTanam` int(11) NOT NULL,
  `totalPanen` int(11) NOT NULL,
  `totalProduksi` int(11) NOT NULL,
  `totalProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `padimasters`
--

INSERT INTO `padimasters` (`id`, `ta`, `totalTanam`, `totalPanen`, `totalProduksi`, `totalProduktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 101269, 104105, 662420, 64, '2018-07-18 16:30:43', '2018-07-18 17:17:05'),
(3, 2016, 113075, 104597, 625312, 59, '2018-07-18 17:36:59', '2018-07-18 17:36:59'),
(4, 2017, 106437, 105839, 653979, 102, '2018-07-18 18:08:02', '2019-01-24 04:05:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('babar.klinik@gmail.com', '$2y$10$FuVHXm0r70g4qAhQ0bNiKuVTXZpES5EqwEoADzMa99dgOrILIYvAe', '2018-12-31 17:59:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawaiagamas`
--

CREATE TABLE `pegawaiagamas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlIslam` int(11) NOT NULL,
  `jmlKatolik` int(11) NOT NULL,
  `jmlProtestan` int(11) NOT NULL,
  `jmlBudha` int(11) NOT NULL,
  `jmlHindu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawaiagamas`
--

INSERT INTO `pegawaiagamas` (`id`, `ta`, `jmlIslam`, `jmlKatolik`, `jmlProtestan`, `jmlBudha`, `jmlHindu`, `created_at`, `updated_at`) VALUES
(1, 2017, 5826, 73, 153, 0, 4, '2018-07-17 21:37:29', '2019-01-20 09:23:30'),
(2, 2016, 6645, 80, 169, 0, 4, '2018-07-17 21:44:44', '2018-07-17 21:44:44'),
(3, 2015, 6774, 83, 177, 0, 4, '2018-07-17 21:49:54', '2018-07-17 21:49:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawaipendidikans`
--

CREATE TABLE `pegawaipendidikans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlSD` int(11) NOT NULL,
  `jmlSMP` int(11) NOT NULL,
  `jmlSMA` int(11) NOT NULL,
  `jmlD1` int(11) NOT NULL,
  `jmlD2` int(11) NOT NULL,
  `jmlD3` int(11) NOT NULL,
  `jmlS1` int(11) NOT NULL,
  `jmlS2` int(11) NOT NULL,
  `jmlS3` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawaipendidikans`
--

INSERT INTO `pegawaipendidikans` (`id`, `ta`, `jmlSD`, `jmlSMP`, `jmlSMA`, `jmlD1`, `jmlD2`, `jmlD3`, `jmlS1`, `jmlS2`, `jmlS3`, `created_at`, `updated_at`) VALUES
(1, 2017, 21, 45, 963, 38, 333, 425, 3803, 426, 1, '2018-07-17 21:36:29', '2019-01-20 09:23:47'),
(2, 2016, 22, 53, 1119, 45, 370, 440, 4392, 456, 1, '2018-07-17 21:45:55', '2018-07-17 21:45:55'),
(3, 2015, 22, 55, 1177, 53, 405, 497, 4378, 451, 0, '2018-07-17 21:51:00', '2018-07-17 21:51:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawais`
--

CREATE TABLE `pegawais` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalPegawai` int(11) NOT NULL,
  `totalLaki` int(11) NOT NULL,
  `totalPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawais`
--

INSERT INTO `pegawais` (`id`, `ta`, `totalPegawai`, `totalLaki`, `totalPerempuan`, `created_at`, `updated_at`) VALUES
(1, 2017, 6056, 2532, 3524, '2018-07-17 21:40:29', '2018-07-17 21:40:29'),
(2, 2016, 6898, 2986, 3912, '2018-07-17 21:41:20', '2018-07-17 21:41:20'),
(3, 2015, 7038, 3072, 3966, '2018-07-17 21:46:58', '2018-07-17 21:46:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggarank3`
--

CREATE TABLE `pelanggarank3` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlKasus` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelanggarank3`
--

INSERT INTO `pelanggarank3` (`id`, `ta`, `jmlKasus`, `created_at`, `updated_at`) VALUES
(1, 2017, 9, '2018-07-22 21:35:45', '2018-07-22 21:35:45'),
(2, 2016, 4, '2018-07-22 21:45:02', '2018-07-22 21:45:02'),
(3, 2015, 8, '2018-07-22 21:48:09', '2018-07-22 21:48:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemukimandetails`
--

CREATE TABLE `pemukimandetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `pemukimanMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlLuas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemukimandetails`
--

INSERT INTO `pemukimandetails` (`id`, `pemukimanMaster_id`, `kecamatan_id`, `jmlLuas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 618, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(2, 1, 2, 307, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(3, 1, 3, 475, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(4, 1, 4, 2248, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(5, 1, 5, 951, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(6, 1, 6, 979, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(7, 1, 7, 797, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(8, 1, 8, 54218, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(9, 1, 9, 680, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(10, 1, 10, 1920, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(11, 1, 11, 216, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(12, 1, 12, 4128, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(13, 2, 1, 618, '2018-09-17 02:42:19', '2018-09-17 02:42:19'),
(14, 2, 2, 307, '2018-09-17 02:42:19', '2018-09-17 02:42:19'),
(15, 2, 3, 475, '2018-09-17 02:42:19', '2018-09-17 02:42:19'),
(16, 2, 4, 2248, '2018-09-17 02:42:19', '2018-09-17 02:42:19'),
(17, 2, 5, 951, '2018-09-17 02:42:20', '2018-09-17 02:42:20'),
(18, 2, 6, 979, '2018-09-17 02:42:20', '2018-09-17 02:42:20'),
(19, 2, 7, 797, '2018-09-17 02:42:20', '2018-09-17 02:42:20'),
(20, 2, 8, 54218, '2018-09-17 02:42:20', '2018-09-17 02:42:20'),
(21, 2, 9, 680, '2018-09-17 02:42:20', '2018-09-17 02:42:20'),
(22, 2, 10, 1920, '2018-09-17 02:42:20', '2018-09-17 02:42:20'),
(23, 2, 11, 216, '2018-09-17 02:42:20', '2018-09-17 02:42:20'),
(24, 2, 12, 4128, '2018-09-17 02:42:20', '2018-09-17 02:42:20'),
(25, 3, 1, 618, '2018-09-17 02:44:40', '2018-09-17 02:44:40'),
(26, 3, 2, 307, '2018-09-17 02:44:40', '2018-09-17 02:44:40'),
(27, 3, 3, 475, '2018-09-17 02:44:40', '2018-09-17 02:44:40'),
(28, 3, 4, 2248, '2018-09-17 02:44:40', '2018-09-17 02:44:40'),
(29, 3, 5, 951, '2018-09-17 02:44:40', '2018-09-17 02:44:40'),
(30, 3, 6, 979, '2018-09-17 02:44:40', '2018-09-17 02:44:40'),
(31, 3, 7, 797, '2018-09-17 02:44:40', '2018-09-17 02:44:40'),
(32, 3, 8, 54218, '2018-09-17 02:44:40', '2018-09-17 02:44:40'),
(33, 3, 9, 680, '2018-09-17 02:44:40', '2018-09-17 02:44:40'),
(34, 3, 10, 1920, '2018-09-17 02:44:40', '2018-09-17 02:44:40'),
(35, 3, 11, 216, '2018-09-17 02:44:40', '2018-09-17 02:44:40'),
(36, 3, 12, 4128, '2018-09-17 02:44:40', '2018-09-17 02:44:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemukimanmasters`
--

CREATE TABLE `pemukimanmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalLuas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemukimanmasters`
--

INSERT INTO `pemukimanmasters` (`id`, `ta`, `totalLuas`, `created_at`, `updated_at`) VALUES
(1, 2015, 67537, '2018-07-19 05:37:12', '2018-07-19 05:37:12'),
(2, 2016, 67537, '2018-09-17 02:42:19', '2018-09-17 02:42:19'),
(3, 2017, 67537, '2018-09-17 02:44:39', '2018-09-17 02:44:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencakers`
--

CREATE TABLE `pencakers` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlPencaker` int(11) NOT NULL,
  `pencakerLaki` int(11) NOT NULL,
  `pencakerPerempuan` int(11) NOT NULL,
  `jmlDitempatkan` int(11) NOT NULL,
  `ditempatkanLaki` int(11) NOT NULL,
  `ditempatkanPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pencakers`
--

INSERT INTO `pencakers` (`id`, `ta`, `jmlPencaker`, `pencakerLaki`, `pencakerPerempuan`, `jmlDitempatkan`, `ditempatkanLaki`, `ditempatkanPerempuan`, `created_at`, `updated_at`) VALUES
(1, 2015, 664, 353, 311, 352, 187, 165, '2018-07-18 23:11:21', '2018-07-18 23:11:21'),
(2, 2016, 753, 473, 280, 665, 417, 248, '2018-07-18 23:13:31', '2018-07-18 23:13:31'),
(3, 2017, 2908, 1805, 1103, 1600, 990, 610, '2018-07-18 23:14:33', '2018-07-18 23:14:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendudukdetails`
--

CREATE TABLE `pendudukdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `pendudukMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlPenduduk` int(11) NOT NULL,
  `jmlPendLaki` int(11) NOT NULL,
  `jmlPendPerempuan` int(11) NOT NULL,
  `jmlWKTP` int(11) NOT NULL,
  `jmlWKTPLaki` int(11) NOT NULL,
  `jmlWKTPPerempuan` int(11) NOT NULL,
  `jmlCetak` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendudukdetails`
--

INSERT INTO `pendudukdetails` (`id`, `pendudukMaster_id`, `kecamatan_id`, `jmlPenduduk`, `jmlPendLaki`, `jmlPendPerempuan`, `jmlWKTP`, `jmlWKTPLaki`, `jmlWKTPPerempuan`, `jmlCetak`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 57054, 28056, 28998, 5, 4, 1, 4, '2018-09-24 16:26:38', '2019-01-26 04:20:34'),
(2, 1, 2, 24307, 12050, 12257, 5, 2, 3, 3, '2018-09-24 16:26:38', '2019-01-26 02:56:21'),
(3, 1, 3, 33684, 16707, 16977, 0, 0, 0, 0, '2018-09-24 16:26:38', '2018-09-24 16:26:38'),
(4, 1, 4, 38145, 18771, 19374, 0, 0, 0, 0, '2018-09-24 16:26:38', '2018-09-24 16:26:38'),
(5, 1, 5, 43190, 21557, 21633, 0, 0, 0, 0, '2018-09-24 16:26:38', '2018-09-24 16:26:38'),
(6, 1, 6, 30391, 14846, 15545, 0, 0, 0, 0, '2018-09-24 16:26:38', '2018-09-24 16:26:38'),
(7, 1, 7, 31023, 15214, 15809, 0, 0, 0, 0, '2018-09-24 16:26:38', '2018-09-24 16:26:38'),
(8, 1, 8, 48680, 24481, 24199, 0, 0, 0, 0, '2018-09-24 16:26:38', '2018-09-24 16:26:38'),
(9, 1, 9, 19883, 9683, 10200, 0, 0, 0, 0, '2018-09-24 16:26:38', '2018-09-24 16:26:38'),
(10, 1, 10, 51071, 25075, 25996, 0, 0, 0, 0, '2018-09-24 16:26:38', '2018-09-24 16:26:38'),
(11, 1, 11, 20037, 9888, 10149, 0, 0, 0, 0, '2018-09-24 16:26:38', '2018-09-24 16:26:38'),
(12, 1, 12, 11860, 5945, 5915, 0, 0, 0, 0, '2018-09-24 16:26:38', '2018-09-24 16:26:38'),
(13, 2, 1, 57077, 28060, 29017, 0, 0, 0, 0, '2018-09-24 19:27:30', '2018-09-24 19:27:30'),
(14, 2, 2, 24322, 12055, 12267, 0, 0, 0, 0, '2018-09-24 19:27:30', '2018-09-24 19:27:30'),
(15, 2, 3, 33716, 16720, 16996, 0, 0, 0, 0, '2018-09-24 19:27:30', '2018-09-24 19:27:30'),
(16, 2, 4, 38150, 18767, 19383, 0, 0, 0, 0, '2018-09-24 19:27:31', '2018-09-24 19:27:31'),
(17, 2, 5, 43199, 21561, 21638, 0, 0, 0, 0, '2018-09-24 19:27:31', '2018-09-24 19:27:31'),
(18, 2, 6, 30375, 14854, 15521, 0, 0, 0, 0, '2018-09-24 19:27:31', '2018-09-24 19:27:31'),
(19, 2, 7, 31018, 15220, 15798, 0, 0, 0, 0, '2018-09-24 19:27:31', '2018-09-24 19:27:31'),
(20, 2, 8, 48695, 24509, 24186, 0, 0, 0, 0, '2018-09-24 19:27:31', '2018-09-24 19:27:31'),
(21, 2, 9, 19888, 9693, 10195, 0, 0, 0, 0, '2018-09-24 19:27:31', '2018-09-24 19:27:31'),
(22, 2, 10, 51078, 25078, 26000, 0, 0, 0, 0, '2018-09-24 19:27:31', '2018-09-24 19:27:31'),
(23, 2, 11, 20056, 9897, 10159, 0, 0, 0, 0, '2018-09-24 19:27:31', '2018-09-24 19:27:31'),
(24, 2, 12, 11841, 5934, 5907, 0, 0, 0, 0, '2018-09-24 19:27:31', '2018-09-24 19:27:31'),
(25, 3, 1, 57141, 28102, 29039, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(26, 3, 2, 24382, 12083, 12299, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(27, 3, 3, 33740, 16717, 17023, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(28, 3, 4, 38208, 18799, 19409, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(29, 3, 5, 43185, 21563, 21622, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(30, 3, 6, 30433, 14883, 15550, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(31, 3, 7, 31044, 15244, 15800, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(32, 3, 8, 48774, 24552, 24222, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(33, 3, 9, 19862, 9686, 10176, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(34, 3, 10, 51143, 25117, 26026, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(35, 3, 11, 20071, 9911, 10160, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(36, 3, 12, 11856, 5938, 5918, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(37, 4, 1, 57301, 28189, 29112, 0, 0, 0, 0, '2018-09-24 19:44:26', '2018-09-24 19:44:26'),
(38, 4, 2, 24447, 12132, 12315, 0, 0, 0, 0, '2018-09-24 19:44:26', '2018-09-24 19:44:26'),
(39, 4, 3, 33888, 16786, 17102, 0, 0, 0, 0, '2018-09-24 19:44:26', '2018-09-24 19:44:26'),
(40, 4, 4, 38297, 18847, 19450, 0, 0, 0, 0, '2018-09-24 19:44:27', '2018-09-24 19:44:27'),
(41, 4, 5, 43336, 21656, 21680, 0, 0, 0, 0, '2018-09-24 19:44:27', '2018-09-24 19:44:27'),
(42, 4, 6, 30625, 14979, 15646, 0, 0, 0, 0, '2018-09-24 19:44:27', '2018-09-24 19:44:27'),
(43, 4, 7, 31147, 15309, 15838, 0, 0, 0, 0, '2018-09-24 19:44:27', '2018-09-24 19:44:27'),
(44, 4, 8, 48932, 24630, 24302, 0, 0, 0, 0, '2018-09-24 19:44:27', '2018-09-24 19:44:27'),
(45, 4, 9, 19985, 9753, 10232, 0, 0, 0, 0, '2018-09-24 19:44:27', '2018-09-24 19:44:27'),
(46, 4, 10, 51364, 25244, 26120, 0, 0, 0, 0, '2018-09-24 19:44:27', '2018-09-24 19:44:27'),
(47, 4, 11, 20108, 9945, 10163, 0, 0, 0, 0, '2018-09-24 19:44:27', '2018-09-24 19:44:27'),
(48, 4, 12, 11892, 5960, 5932, 0, 0, 0, 0, '2018-09-24 19:44:27', '2018-09-24 19:44:27'),
(49, 5, 1, 57448, 28263, 29185, 0, 0, 0, 0, '2018-09-24 19:48:49', '2018-09-24 19:48:49'),
(50, 5, 2, 24524, 12172, 12352, 0, 0, 0, 0, '2018-09-24 19:48:49', '2018-09-24 19:48:49'),
(51, 5, 3, 33950, 16829, 17121, 0, 0, 0, 0, '2018-09-24 19:48:49', '2018-09-24 19:48:49'),
(52, 5, 4, 38400, 18896, 19504, 0, 0, 0, 0, '2018-09-24 19:48:49', '2018-09-24 19:48:49'),
(53, 5, 5, 43378, 21683, 21695, 0, 0, 0, 0, '2018-09-24 19:48:49', '2018-09-24 19:48:49'),
(54, 5, 6, 30735, 15041, 15694, 0, 0, 0, 0, '2018-09-24 19:48:49', '2018-09-24 19:48:49'),
(55, 5, 7, 31240, 15369, 15871, 0, 0, 0, 0, '2018-09-24 19:48:49', '2018-09-24 19:48:49'),
(56, 5, 8, 49107, 24745, 24362, 0, 0, 0, 0, '2018-09-24 19:48:50', '2018-09-24 19:48:50'),
(57, 5, 9, 20062, 9802, 10260, 0, 0, 0, 0, '2018-09-24 19:48:50', '2018-09-24 19:48:50'),
(58, 5, 10, 51519, 25328, 26191, 0, 0, 0, 0, '2018-09-24 19:48:50', '2018-09-24 19:48:50'),
(59, 5, 11, 20157, 9977, 10180, 0, 0, 0, 0, '2018-09-24 19:48:50', '2018-09-24 19:48:50'),
(60, 5, 12, 11919, 5973, 5946, 0, 0, 0, 0, '2018-09-24 19:48:50', '2018-09-24 19:48:50'),
(61, 6, 1, 57534, 28291, 29243, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(62, 6, 2, 24549, 12176, 12373, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(63, 6, 3, 34021, 16876, 17145, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(64, 6, 4, 38493, 18952, 19541, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(65, 6, 5, 43459, 21729, 21730, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(66, 6, 6, 30860, 15112, 15748, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(67, 6, 7, 31369, 15435, 15934, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(68, 6, 8, 49189, 24800, 24389, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(69, 6, 9, 20078, 9816, 10262, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(70, 6, 10, 51635, 25405, 26230, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(71, 6, 11, 20164, 9994, 10170, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(72, 6, 12, 11926, 5969, 5957, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(73, 7, 1, 57739, 28412, 29327, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(74, 7, 2, 24581, 12199, 12382, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(75, 7, 3, 34176, 16976, 17200, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(76, 7, 4, 38611, 19011, 19600, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(77, 7, 5, 43562, 21773, 21789, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(78, 7, 6, 30890, 15122, 15768, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(79, 7, 7, 31441, 15475, 15966, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(80, 7, 8, 49234, 24820, 24414, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(81, 7, 9, 20101, 9826, 10275, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(82, 7, 10, 51740, 25462, 26278, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(83, 7, 11, 20179, 9995, 10184, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(84, 7, 12, 11954, 5981, 5973, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(85, 8, 1, 57473, 28292, 29181, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(86, 8, 2, 24616, 12204, 12412, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(87, 8, 3, 34010, 16887, 17123, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(88, 8, 4, 38547, 18967, 19580, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(89, 8, 5, 43121, 21498, 21623, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(90, 8, 6, 30891, 15113, 15778, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(91, 8, 7, 31179, 15295, 15884, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(92, 8, 8, 48907, 24653, 24254, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(93, 8, 9, 20003, 9778, 10225, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(94, 8, 10, 51388, 25262, 26126, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(95, 8, 11, 19891, 9847, 10044, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(96, 8, 12, 11973, 6001, 5972, 0, 0, 0, 0, '2018-09-24 20:00:03', '2018-09-24 20:00:03'),
(97, 9, 1, 57525, 28314, 29211, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(98, 9, 2, 24682, 12239, 12443, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(99, 9, 3, 34048, 16905, 17143, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(100, 9, 4, 38598, 18999, 19599, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(101, 9, 5, 43196, 21533, 21663, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(102, 9, 6, 30942, 15150, 15792, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(103, 9, 7, 31247, 15331, 15916, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(104, 9, 8, 48712, 24523, 24189, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(105, 9, 9, 20066, 9803, 10263, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(106, 9, 10, 51396, 25268, 26128, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(107, 9, 11, 19913, 9857, 10056, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(108, 9, 12, 11776, 5883, 5893, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(109, 10, 1, 4, 2, 2, 4, 2, 2, 3, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(110, 10, 2, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(111, 10, 3, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(112, 10, 4, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(113, 10, 5, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(114, 10, 6, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(115, 10, 7, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(116, 10, 8, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(117, 10, 9, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(118, 10, 10, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(119, 10, 11, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(120, 10, 12, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(121, 11, 1, 4, 2, 2, 4, 2, 2, 3, '2019-01-25 02:47:23', '2019-01-25 02:47:23'),
(122, 11, 2, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:23', '2019-01-25 02:47:23'),
(123, 11, 3, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:23', '2019-01-25 02:47:23'),
(124, 11, 4, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:23', '2019-01-25 02:47:23'),
(125, 11, 5, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:23', '2019-01-25 02:47:23'),
(126, 11, 6, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:23', '2019-01-25 02:47:23'),
(127, 11, 7, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:23', '2019-01-25 02:47:23'),
(128, 11, 8, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:23', '2019-01-25 02:47:23'),
(129, 11, 9, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:24', '2019-01-25 02:47:24'),
(130, 11, 10, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:24', '2019-01-25 02:47:24'),
(131, 11, 11, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:24', '2019-01-25 02:47:24'),
(132, 11, 12, 0, 0, 0, 0, 0, 0, 0, '2019-01-25 02:47:24', '2019-01-25 02:47:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendudukmasters`
--

CREATE TABLE `pendudukmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `totalPenduduk` int(11) NOT NULL,
  `totalPendLaki` int(11) NOT NULL,
  `totalPendPerempuan` int(11) NOT NULL,
  `totalWKTP` int(11) NOT NULL,
  `totalWKTPLaki` int(11) NOT NULL,
  `totalWKTPPerempuan` int(11) NOT NULL,
  `totalCetak` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendudukmasters`
--

INSERT INTO `pendudukmasters` (`id`, `ta`, `bln`, `totalPenduduk`, `totalPendLaki`, `totalPendPerempuan`, `totalWKTP`, `totalWKTPLaki`, `totalWKTPPerempuan`, `totalCetak`, `created_at`, `updated_at`) VALUES
(1, 2018, 1, 409325, 202273, 207052, 10, 6, 4, 7, '2018-09-24 16:26:38', '2019-01-26 04:20:34'),
(2, 2018, 2, 409415, 202348, 207067, 0, 0, 0, 0, '2018-09-24 19:27:30', '2018-09-24 19:27:30'),
(3, 2018, 3, 409839, 202595, 207244, 0, 0, 0, 0, '2018-09-24 19:32:57', '2018-09-24 19:32:57'),
(4, 2018, 4, 411322, 203430, 207892, 0, 0, 0, 0, '2018-09-24 19:44:26', '2018-09-24 19:44:26'),
(5, 2018, 5, 412439, 204078, 208361, 0, 0, 0, 0, '2018-09-24 19:48:49', '2018-09-24 19:48:49'),
(6, 2018, 6, 413277, 204555, 208722, 0, 0, 0, 0, '2018-09-24 19:52:50', '2018-09-24 19:52:50'),
(7, 2018, 7, 414208, 205052, 209156, 0, 0, 0, 0, '2018-09-24 19:56:25', '2018-09-24 19:56:25'),
(8, 2018, 8, 411999, 203797, 208202, 0, 0, 0, 0, '2018-09-24 20:00:02', '2018-09-24 20:00:02'),
(9, 2018, 9, 412101, 203805, 208296, 0, 0, 0, 0, '2018-10-18 17:27:46', '2018-10-18 17:27:46'),
(10, 2018, 1, 4, 2, 2, 4, 2, 2, 3, '2019-01-25 02:47:02', '2019-01-25 02:47:02'),
(11, 2018, 1, 4, 2, 2, 4, 2, 2, 3, '2019-01-25 02:47:23', '2019-01-25 02:47:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbitanizindetails`
--

CREATE TABLE `penerbitanizindetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `penerbitanizinMaster_id` int(11) NOT NULL,
  `bidang_izin_id` int(11) NOT NULL,
  `jmlPenerbitan` int(11) NOT NULL,
  `jmlRetribusi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penerbitanizindetails`
--

INSERT INTO `penerbitanizindetails` (`id`, `penerbitanizinMaster_id`, `bidang_izin_id`, `jmlPenerbitan`, `jmlRetribusi`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(2, 2, 2, 2, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(3, 2, 3, 0, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(4, 2, 4, 22, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(5, 2, 5, 0, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(6, 2, 6, 84, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(7, 2, 7, 53, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(8, 2, 8, 0, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(9, 2, 9, 0, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(10, 2, 10, 0, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(11, 2, 11, 0, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(12, 2, 12, 0, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(13, 3, 1, 4, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(14, 3, 2, 42, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(15, 3, 3, 0, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(16, 3, 4, 46, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(17, 3, 5, 9, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(18, 3, 6, 178, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(19, 3, 7, 102, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(20, 3, 8, 36, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(21, 3, 9, 0, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(22, 3, 10, 0, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(23, 3, 11, 0, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(24, 3, 12, 0, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(25, 4, 1, 3, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(26, 4, 2, 67, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(27, 4, 3, 0, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(28, 4, 4, 71, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(29, 4, 5, 1, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(30, 4, 6, 190, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(31, 4, 7, 117, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(32, 4, 8, 96, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(33, 4, 9, 0, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(34, 4, 10, 0, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(35, 4, 11, 0, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(36, 4, 12, 0, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(37, 5, 1, 1, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(38, 5, 2, 21, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(39, 5, 3, 2, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(40, 5, 4, 35, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(41, 5, 5, 16, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(42, 5, 6, 131, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(43, 5, 7, 76, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(44, 5, 8, 25, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(45, 5, 9, 0, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(46, 5, 10, 0, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(47, 5, 11, 0, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(48, 5, 12, 0, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(49, 6, 1, 6, 0, '2018-10-21 20:05:52', '2018-10-21 20:05:52'),
(50, 6, 2, 25, 0, '2018-10-21 20:05:52', '2018-10-21 20:05:52'),
(51, 6, 3, 0, 0, '2018-10-21 20:05:52', '2018-10-21 20:05:52'),
(52, 6, 4, 22, 0, '2018-10-21 20:05:52', '2018-10-21 20:05:52'),
(53, 6, 5, 9, 0, '2018-10-21 20:05:53', '2018-10-21 20:05:53'),
(54, 6, 6, 107, 0, '2018-10-21 20:05:53', '2018-10-21 20:05:53'),
(55, 6, 7, 68, 0, '2018-10-21 20:05:53', '2018-10-21 20:05:53'),
(56, 6, 8, 103, 0, '2018-10-21 20:05:53', '2018-10-21 20:05:53'),
(57, 6, 9, 0, 0, '2018-10-21 20:05:53', '2018-10-21 20:05:53'),
(58, 6, 10, 0, 0, '2018-10-21 20:05:53', '2018-10-21 20:05:53'),
(59, 6, 11, 0, 0, '2018-10-21 20:05:53', '2018-10-21 20:05:53'),
(60, 6, 12, 0, 0, '2018-10-21 20:05:53', '2018-10-21 20:05:53'),
(61, 7, 1, 1, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(62, 7, 2, 13, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(63, 7, 3, 0, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(64, 7, 4, 20, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(65, 7, 5, 6, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(66, 7, 6, 74, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(67, 7, 7, 38, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(68, 7, 8, 55, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(69, 7, 9, 0, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(70, 7, 10, 0, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(71, 7, 11, 0, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(72, 7, 12, 0, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(73, 8, 1, 0, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(74, 8, 2, 15, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(75, 8, 3, 2, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(76, 8, 4, 22, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(77, 8, 5, 8, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(78, 8, 6, 82, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(79, 8, 7, 50, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(80, 8, 8, 32, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(81, 8, 9, 0, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(82, 8, 10, 0, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(83, 8, 11, 0, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(84, 8, 12, 0, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(85, 9, 1, 6, 0, '2018-10-21 20:08:32', '2018-10-21 20:08:32'),
(86, 9, 2, 9, 0, '2018-10-21 20:08:32', '2018-10-21 20:08:32'),
(87, 9, 3, 2, 0, '2018-10-21 20:08:33', '2018-10-21 20:08:33'),
(88, 9, 4, 17, 0, '2018-10-21 20:08:33', '2018-10-21 20:08:33'),
(89, 9, 5, 8, 0, '2018-10-21 20:08:33', '2018-10-21 20:08:33'),
(90, 9, 6, 114, 0, '2018-10-21 20:08:33', '2018-10-21 20:08:33'),
(91, 9, 7, 75, 0, '2018-10-21 20:08:33', '2018-10-21 20:08:33'),
(92, 9, 8, 34, 0, '2018-10-21 20:08:33', '2018-10-21 20:08:33'),
(93, 9, 9, 0, 0, '2018-10-21 20:08:33', '2018-10-21 20:08:33'),
(94, 9, 10, 0, 0, '2018-10-21 20:08:33', '2018-10-21 20:08:33'),
(95, 9, 11, 0, 0, '2018-10-21 20:08:33', '2018-10-21 20:08:33'),
(96, 9, 12, 0, 0, '2018-10-21 20:08:33', '2018-10-21 20:08:33'),
(97, 10, 1, 2, 0, '2018-10-21 20:10:30', '2018-10-21 20:10:30'),
(98, 10, 2, 45, 0, '2018-10-21 20:10:31', '2018-10-21 20:10:31'),
(99, 10, 3, 0, 0, '2018-10-21 20:10:31', '2018-10-21 20:10:31'),
(100, 10, 4, 15, 0, '2018-10-21 20:10:31', '2018-10-21 20:10:31'),
(101, 10, 5, 5, 0, '2018-10-21 20:10:31', '2018-10-21 20:10:31'),
(102, 10, 6, 92, 0, '2018-10-21 20:10:31', '2018-10-21 20:10:31'),
(103, 10, 7, 50, 0, '2018-10-21 20:10:31', '2018-10-21 20:10:31'),
(104, 10, 8, 31, 0, '2018-10-21 20:10:31', '2018-10-21 20:10:31'),
(105, 10, 9, 0, 0, '2018-10-21 20:10:31', '2018-10-21 20:10:31'),
(106, 10, 10, 0, 0, '2018-10-21 20:10:31', '2018-10-21 20:10:31'),
(107, 10, 11, 0, 0, '2018-10-21 20:10:31', '2018-10-21 20:10:31'),
(108, 10, 12, 0, 0, '2018-10-21 20:10:31', '2018-10-21 20:10:31'),
(109, 11, 1, 3, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(110, 11, 2, 54, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(111, 11, 3, 3, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(112, 11, 4, 20, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(113, 11, 5, 13, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(114, 11, 6, 137, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(115, 11, 7, 72, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(116, 11, 8, 72, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(117, 11, 9, 0, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(118, 11, 10, 0, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(119, 11, 11, 0, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(120, 11, 12, 0, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(121, 12, 1, 2, 0, '2018-10-21 20:12:01', '2018-10-21 20:12:01'),
(122, 12, 2, 181, 0, '2018-10-21 20:12:01', '2018-10-21 20:12:01'),
(123, 12, 3, 4, 0, '2018-10-21 20:12:01', '2018-10-21 20:12:01'),
(124, 12, 4, 26, 0, '2018-10-21 20:12:01', '2018-10-21 20:12:01'),
(125, 12, 5, 13, 0, '2018-10-21 20:12:01', '2018-10-21 20:12:01'),
(126, 12, 6, 123, 0, '2018-10-21 20:12:01', '2018-10-21 20:12:01'),
(127, 12, 7, 65, 358091000, '2018-10-21 20:12:01', '2018-10-21 20:13:03'),
(128, 12, 8, 69, 545356496, '2018-10-21 20:12:01', '2018-10-21 20:13:03'),
(129, 12, 9, 0, 0, '2018-10-21 20:12:01', '2018-10-21 20:12:01'),
(130, 12, 10, 0, 0, '2018-10-21 20:12:01', '2018-10-21 20:12:01'),
(131, 12, 11, 0, 0, '2018-10-21 20:12:02', '2018-10-21 20:12:02'),
(132, 12, 12, 0, 0, '2018-10-21 20:12:02', '2018-10-21 20:12:02'),
(133, 13, 1, 2, 0, '2018-10-21 20:14:19', '2018-10-21 20:14:19'),
(134, 13, 2, 83, 0, '2018-10-21 20:14:19', '2018-10-21 20:14:19'),
(135, 13, 3, 3, 0, '2018-10-21 20:14:19', '2018-10-21 20:14:19'),
(136, 13, 4, 19, 0, '2018-10-21 20:14:20', '2018-10-21 20:14:20'),
(137, 13, 5, 11, 0, '2018-10-21 20:14:20', '2018-10-21 20:14:20'),
(138, 13, 6, 94, 0, '2018-10-21 20:14:20', '2018-10-21 20:14:20'),
(139, 13, 7, 55, 22342000, '2018-10-21 20:14:20', '2018-10-21 20:14:20'),
(140, 13, 8, 156, 168133610, '2018-10-21 20:14:20', '2018-10-21 20:14:20'),
(141, 13, 9, 0, 0, '2018-10-21 20:14:20', '2018-10-21 20:14:20'),
(142, 13, 10, 0, 0, '2018-10-21 20:14:20', '2018-10-21 20:14:20'),
(143, 13, 11, 0, 0, '2018-10-21 20:14:20', '2018-10-21 20:14:20'),
(144, 13, 12, 0, 0, '2018-10-21 20:14:20', '2018-10-21 20:14:20'),
(145, 14, 1, 0, 7, '2019-01-25 10:47:34', '2019-01-25 10:47:34'),
(146, 14, 2, 0, 0, '2019-01-25 10:47:34', '2019-01-25 10:47:34'),
(147, 14, 3, 0, 0, '2019-01-25 10:47:34', '2019-01-25 10:47:34'),
(148, 14, 4, 0, 0, '2019-01-25 10:47:34', '2019-01-25 10:47:34'),
(149, 14, 5, 0, 0, '2019-01-25 10:47:34', '2019-01-25 10:47:34'),
(150, 14, 6, 0, 0, '2019-01-25 10:47:34', '2019-01-25 10:47:34'),
(151, 14, 7, 0, 0, '2019-01-25 10:47:34', '2019-01-25 10:47:34'),
(152, 14, 8, 0, 0, '2019-01-25 10:47:35', '2019-01-25 10:47:35'),
(153, 14, 9, 0, 0, '2019-01-25 10:47:35', '2019-01-25 10:47:35'),
(154, 14, 10, 0, 0, '2019-01-25 10:47:35', '2019-01-25 10:47:35'),
(155, 14, 11, 0, 0, '2019-01-25 10:47:35', '2019-01-25 10:47:35'),
(156, 14, 12, 0, 0, '2019-01-25 10:47:35', '2019-01-25 10:47:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbitanizinmasters`
--

CREATE TABLE `penerbitanizinmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `totalPenerbitan` int(11) NOT NULL,
  `totalRetribusi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penerbitanizinmasters`
--

INSERT INTO `penerbitanizinmasters` (`id`, `ta`, `bln`, `totalPenerbitan`, `totalRetribusi`, `created_at`, `updated_at`) VALUES
(1, 2018, 1, 0, 0, '2018-09-17 20:20:31', '2018-09-17 20:20:31'),
(2, 2017, 1, 165, 0, '2018-10-21 20:01:51', '2018-10-21 20:01:51'),
(3, 2017, 2, 417, 0, '2018-10-21 20:03:23', '2018-10-21 20:03:23'),
(4, 2017, 3, 545, 0, '2018-10-21 20:04:16', '2018-10-21 20:04:16'),
(5, 2017, 4, 307, 0, '2018-10-21 20:05:13', '2018-10-21 20:05:13'),
(6, 2017, 5, 340, 0, '2018-10-21 20:05:52', '2018-10-21 20:05:52'),
(7, 2017, 6, 207, 0, '2018-10-21 20:06:37', '2018-10-21 20:06:37'),
(8, 2017, 7, 211, 0, '2018-10-21 20:07:48', '2018-10-21 20:07:48'),
(9, 2017, 8, 265, 0, '2018-10-21 20:08:32', '2018-10-21 20:08:32'),
(10, 2017, 9, 240, 0, '2018-10-21 20:10:30', '2018-10-21 20:10:30'),
(11, 2017, 10, 374, 0, '2018-10-21 20:11:18', '2018-10-21 20:11:18'),
(12, 2017, 1, 483, 903447496, '2018-10-21 20:12:01', '2018-10-21 20:13:03'),
(13, 2017, 12, 423, 190475610, '2018-10-21 20:14:19', '2018-10-21 20:14:19'),
(14, 2018, 1, 0, 7, '2019-01-25 10:47:34', '2019-01-25 10:47:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit10details`
--

CREATE TABLE `penyakit10details` (
  `id` int(10) UNSIGNED NOT NULL,
  `penyakit10Master_id` int(11) NOT NULL,
  `puskesmas_id` int(11) NOT NULL,
  `penyakit_id` int(11) NOT NULL,
  `jmlKasus` int(11) NOT NULL,
  `jmlRawatJalan` int(11) NOT NULL,
  `jmlRawatInap` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penyakit10details`
--

INSERT INTO `penyakit10details` (`id`, `penyakit10Master_id`, `puskesmas_id`, `penyakit_id`, `jmlKasus`, `jmlRawatJalan`, `jmlRawatInap`, `created_at`, `updated_at`) VALUES
(1, 3, 15, 56, 28, 0, 28, '2018-07-22 15:39:09', '2018-07-22 15:39:09'),
(2, 4, 15, 56, 26, 23, 3, '2018-07-22 15:45:53', '2018-07-22 15:45:53'),
(3, 4, 15, 27, 18, 15, 3, '2018-07-22 15:45:53', '2018-07-22 15:45:53'),
(4, 4, 15, 39, 18, 18, 0, '2018-07-22 15:45:53', '2018-07-22 15:45:53'),
(5, 4, 15, 68, 19, 19, 0, '2018-07-22 15:45:53', '2018-07-22 15:45:53'),
(6, 7, 9, 1, 0, 0, 2, '2019-01-26 01:43:08', '2019-01-26 01:43:08'),
(7, 7, 9, 2, 0, 0, 0, '2019-01-26 01:43:08', '2019-01-26 01:43:08'),
(8, 7, 9, 3, 0, 0, 0, '2019-01-26 01:43:08', '2019-01-26 01:43:08'),
(9, 7, 9, 4, 0, 0, 0, '2019-01-26 01:43:08', '2019-01-26 01:43:08'),
(10, 7, 9, 5, 0, 0, 0, '2019-01-26 01:43:08', '2019-01-26 01:43:08'),
(11, 7, 9, 6, 0, 0, 0, '2019-01-26 01:43:08', '2019-01-26 01:43:08'),
(12, 7, 9, 7, 0, 0, 0, '2019-01-26 01:43:09', '2019-01-26 01:43:09'),
(13, 7, 9, 8, 0, 0, 0, '2019-01-26 01:43:09', '2019-01-26 01:43:09'),
(14, 7, 9, 9, 0, 0, 0, '2019-01-26 01:43:09', '2019-01-26 01:43:09'),
(15, 7, 9, 10, 0, 0, 0, '2019-01-26 01:43:09', '2019-01-26 01:43:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit10masters`
--

CREATE TABLE `penyakit10masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `puskesmas_id` int(11) NOT NULL,
  `totalKasus` int(11) NOT NULL,
  `totalRawatJalan` int(11) NOT NULL,
  `totalRawatInap` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penyakit10masters`
--

INSERT INTO `penyakit10masters` (`id`, `ta`, `bln`, `puskesmas_id`, `totalKasus`, `totalRawatJalan`, `totalRawatInap`, `created_at`, `updated_at`) VALUES
(1, 2018, 1, 1, 0, 0, 0, '2018-07-10 15:57:02', '2018-07-10 15:57:02'),
(2, 2018, 1, 1, 0, 0, 0, '2018-07-10 16:22:48', '2018-07-10 16:22:48'),
(3, 2018, 1, 15, 28, 0, 28, '2018-07-22 15:39:08', '2018-07-22 15:39:08'),
(4, 2018, 1, 15, 81, 75, 6, '2018-07-22 15:45:53', '2018-07-22 15:45:53'),
(5, 2018, 1, 11, 0, 0, 0, '2019-01-26 01:39:42', '2019-01-26 01:39:42'),
(6, 2018, 1, 1, 0, 0, 0, '2019-01-26 01:42:14', '2019-01-26 01:42:14'),
(7, 2018, 1, 9, 0, 0, 0, '2019-01-26 01:43:08', '2019-01-26 01:43:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakits`
--

CREATE TABLE `penyakits` (
  `id` int(10) UNSIGNED NOT NULL,
  `nmaPenyakit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penyakits`
--

INSERT INTO `penyakits` (`id`, `nmaPenyakit`, `created_at`, `updated_at`) VALUES
(1, 'Abortus spontan komplit', NULL, NULL),
(2, 'Abortus mengancam/insipiens', NULL, NULL),
(3, 'Abortus spontan inkomplit', NULL, NULL),
(4, 'Alergi makanan', NULL, NULL),
(5, 'Anemia defisiensi besi', NULL, NULL),
(6, 'Anemia defisiensi besi pada kehamilan', NULL, NULL),
(7, 'Angina pektoris', NULL, NULL),
(8, 'Apendisitis akut', NULL, NULL),
(9, 'Artritis Osteoartritis', NULL, NULL),
(10, 'Artritis Reumatoid', NULL, NULL),
(11, 'Askariasis', NULL, NULL),
(12, 'Asma Bronkial', NULL, NULL),
(13, 'Astigmatism ringan', NULL, NULL),
(14, 'Bell’s Palsy', NULL, NULL),
(15, 'Benda asing di hidung', NULL, NULL),
(16, 'Benda asing di konjungtiva', NULL, NULL),
(17, 'Blefaritis', NULL, NULL),
(18, 'Bronkritis akut', NULL, NULL),
(19, 'Buta senja', NULL, NULL),
(20, 'Cardiorespiratory arrest', NULL, NULL),
(21, 'Cutaneus larva migran', NULL, NULL),
(22, 'Delirium yang diinduksi dan tidak diinduksi oleh alkohol/lainnya', NULL, NULL),
(23, 'Demam dengue, DHF Demam tifoid', NULL, NULL),
(24, 'Demensia', NULL, NULL),
(25, 'Dermatitis atopik (kecuali recalcitrant)', NULL, NULL),
(26, 'Dermatitis kontak alergika', NULL, NULL),
(27, 'Dermatitis kontak iritan', NULL, NULL),
(28, 'Dermatitis numularis', NULL, NULL),
(29, 'Dermatitis seboroik', NULL, NULL),
(30, 'Tinea kapitis', NULL, NULL),
(31, 'Tinea barbae', NULL, NULL),
(32, 'Tinea fasialis', NULL, NULL),
(33, 'Tinea korporis', NULL, NULL),
(34, 'Tinea manum', NULL, NULL),
(35, 'Tinea unguium', NULL, NULL),
(36, 'Tinea kruris', NULL, NULL),
(37, 'Tinea pedis', NULL, NULL),
(38, 'Diabetes melitus tipe 1', NULL, NULL),
(39, 'Diabetes melitus tipe 2', NULL, NULL),
(40, 'Disentri basiler dan amuba', NULL, NULL),
(41, 'Dislipidemia', NULL, NULL),
(42, 'Eklampsia', NULL, NULL),
(43, 'Epilepsi', NULL, NULL),
(44, 'Epistaksis', NULL, NULL),
(45, 'Exanthematous drug eruption', NULL, NULL),
(46, 'Fixed drug eruption', NULL, NULL),
(47, 'Faringitis', NULL, NULL),
(48, 'Filariasis', NULL, NULL),
(49, 'Fluor albus/vaginal discharge non gonorhea', NULL, NULL),
(50, 'Fraktur terbuka, tertutup', NULL, NULL),
(51, 'Furunkel pada hidung', NULL, NULL),
(52, 'Gagal jantung akut', NULL, NULL),
(53, 'Gagal jantung kronik', NULL, NULL),
(54, 'Gangguan campuran anxietas dan depresi', NULL, NULL),
(55, 'Gangguan psikotik', NULL, NULL),
(56, 'Gastritis', NULL, NULL),
(57, 'Gastroenteritis (termasuk kolera, giardiasis)', NULL, NULL),
(58, 'Glaukoma akut', NULL, NULL),
(59, 'Gonore', NULL, NULL),
(60, 'Hemoroid grade 1-2', NULL, NULL),
(61, 'Hepatitis A', NULL, NULL),
(62, 'Hepatitis B', NULL, NULL),
(63, 'Herpes simpleks tanpa komplikasi', NULL, NULL),
(64, 'Herpes zoster tanpa komplikasi', NULL, NULL),
(65, 'Hiperemesis gravidarum', NULL, NULL),
(66, 'Hiperglikemi hiperosmolar non ketotik', NULL, NULL),
(67, 'Hipermetropia ringan', NULL, NULL),
(68, 'Hipertensi esensial', NULL, NULL),
(69, 'Hiperuricemia (Gout)', NULL, NULL),
(70, 'Hipoglikemia ringan', NULL, NULL),
(71, 'HIV AIDS tanpa komplikasi', NULL, NULL),
(72, 'Hordeolum', NULL, NULL),
(73, 'Infark miokard', NULL, NULL),
(74, 'Infark serebral/Stroke', NULL, NULL),
(75, 'Infeksi pada umbilikus', NULL, NULL),
(76, 'Infeksi saluran kemih', NULL, NULL),
(77, 'Influenza', NULL, NULL),
(78, 'Insomnia', NULL, NULL),
(79, 'Intoleransi makanan', NULL, NULL),
(80, 'Kandidiasis mulut', NULL, NULL),
(81, 'Katarak', NULL, NULL),
(82, 'Kehamilan normal', NULL, NULL),
(83, 'Kejang demam', NULL, NULL),
(84, 'Keracunan makanan', NULL, NULL),
(85, 'Ketuban Pecah Dini (KPD)', NULL, NULL),
(86, 'Kolesistitis', NULL, NULL),
(87, 'Konjungtivitis', NULL, NULL),
(88, 'Laringitis', NULL, NULL),
(89, 'Lepra', NULL, NULL),
(90, 'Leptospirosis (tanpa komplikasi)', NULL, NULL),
(91, 'Liken simpleks kronis/ neurodermatitis', NULL, NULL),
(92, 'Limfadenitis', NULL, NULL),
(93, 'Lipoma', NULL, NULL),
(94, 'Luka bakar derajat 1 dan 2', NULL, NULL),
(95, 'Malabsorbsi makanan', NULL, NULL),
(96, 'Malaria', NULL, NULL),
(97, 'Malnutiris energi-protein', NULL, NULL),
(98, 'Mastitis', NULL, NULL),
(99, 'Mata kering', NULL, NULL),
(100, 'Migren', NULL, NULL),
(101, 'Miliaria', NULL, NULL),
(102, 'Miopia ringan', NULL, NULL),
(103, 'Moluskum kontagiosum', NULL, NULL),
(104, 'Morbili tanpa komplikasi', NULL, NULL),
(105, 'Napkin eczema', NULL, NULL),
(106, 'Obesitas', NULL, NULL),
(107, 'Otitis eksterna', NULL, NULL),
(108, 'Otitis media akut', NULL, NULL),
(109, 'Parotitis', NULL, NULL),
(110, 'Pedikulosis kapitis', NULL, NULL),
(111, 'Penyakit cacing tambang', NULL, NULL),
(112, 'Perdarahan saluran cerna bagian atas', NULL, NULL),
(113, 'Perdarahan saluran cerna bagian bawah', NULL, NULL),
(114, 'Perdarahan post partum', NULL, NULL),
(115, 'Perdarahan subkonjungtiva', NULL, NULL),
(116, 'Peritonitis', NULL, NULL),
(117, 'Pertusis', NULL, NULL),
(118, 'Persalinan lama', NULL, NULL),
(119, 'Pitiriasis rosea', NULL, NULL),
(120, 'Pioderma', NULL, NULL),
(121, 'Pitiriasis versikolor', NULL, NULL),
(122, 'Pneumonia aspirasi', NULL, NULL),
(123, 'Pneumonia, bronkopneumonia', NULL, NULL),
(124, 'Polimialgia reumatik', NULL, NULL),
(125, 'Pre-eklampsia', NULL, NULL),
(126, 'Presbiopia', NULL, NULL),
(127, 'Rabies', NULL, NULL),
(128, 'Reaksi anafilaktik', NULL, NULL),
(129, 'Reaksi gigitan serangga', NULL, NULL),
(130, 'Refluks gastroesofageal', NULL, NULL),
(131, 'Rhinitis akut', NULL, NULL),
(132, 'Rhinitis alergika', NULL, NULL),
(133, 'Rhinitis vasomotor', NULL, NULL),
(134, 'Ruptur perineum tingkat 1-2', NULL, NULL),
(135, 'Serumen prop', NULL, NULL),
(136, 'Sifilis stadium 1 dan 2', NULL, NULL),
(137, 'Skabies', NULL, NULL),
(138, 'Skistosomiasis', NULL, NULL),
(139, 'Status Epileptikus', NULL, NULL),
(140, 'Strongiloidiasis', NULL, NULL),
(141, 'Syok (septik), hipovolemik, kardiogenik, neurogenik)', NULL, NULL),
(142, 'Taeniasis', NULL, NULL),
(143, 'Takikardi', NULL, NULL),
(144, 'Tension headache', NULL, NULL),
(145, 'Tetanus', NULL, NULL),
(146, 'Tirotoksikosis', NULL, NULL),
(147, 'Tonsilitis', NULL, NULL),
(148, 'Tuberkulosis paru tanpa komplikasi', NULL, NULL),
(149, 'Urtikaria (akut dan kronis)', NULL, NULL),
(150, 'Vaginitis', NULL, NULL),
(151, 'Varisela tanpa komplikasi', NULL, NULL),
(152, 'Vertigo (Benign paroxysmal positional vertigo)', NULL, NULL),
(153, 'Veruka vulgaris', NULL, NULL),
(154, 'Vulvitis', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbankans`
--

CREATE TABLE `perbankans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlBank` int(11) NOT NULL,
  `BUP` int(11) NOT NULL,
  `BPD` int(11) NOT NULL,
  `BSN` int(11) NOT NULL,
  `BAC` int(11) NOT NULL,
  `BPR` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perbankans`
--

INSERT INTO `perbankans` (`id`, `ta`, `jmlBank`, `BUP`, `BPD`, `BSN`, `BAC`, `BPR`, `created_at`, `updated_at`) VALUES
(2, 2018, 7, 1, 3, 3, 0, 0, '2019-01-26 05:27:11', '2019-01-26 05:27:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertikaians`
--

CREATE TABLE `pertikaians` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlKasus` int(11) NOT NULL,
  `jmlEtnis` int(11) NOT NULL,
  `jmlDesa` int(11) NOT NULL,
  `jmlAgama` int(11) NOT NULL,
  `jmlSimpatisan` int(11) NOT NULL,
  `jmlPelajar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posdetails`
--

CREATE TABLE `posdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `posMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlPos` int(11) NOT NULL,
  `jmlPospembantu` int(11) NOT NULL,
  `jmlDesaterlayani` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posdetails`
--

INSERT INTO `posdetails` (`id`, `posMaster_id`, `kecamatan_id`, `jmlPos`, `jmlPospembantu`, `jmlDesaterlayani`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 8, '2018-10-21 18:48:04', '2018-10-21 18:48:46'),
(2, 1, 2, 0, 0, 5, '2018-10-21 18:48:04', '2018-10-21 18:48:04'),
(3, 1, 3, 0, 0, 10, '2018-10-21 18:48:04', '2018-10-21 18:48:04'),
(4, 1, 4, 0, 0, 11, '2018-10-21 18:48:04', '2018-10-21 18:48:04'),
(5, 1, 5, 0, 0, 6, '2018-10-21 18:48:04', '2018-10-21 18:48:04'),
(6, 1, 6, 1, 0, 9, '2018-10-21 18:48:04', '2018-10-21 18:48:04'),
(7, 1, 7, 0, 0, 9, '2018-10-21 18:48:04', '2018-10-21 18:48:04'),
(8, 1, 8, 1, 0, 16, '2018-10-21 18:48:04', '2018-10-21 18:48:04'),
(9, 1, 9, 0, 0, 7, '2018-10-21 18:48:05', '2018-10-21 18:48:05'),
(10, 1, 10, 1, 0, 15, '2018-10-21 18:48:05', '2018-10-21 18:48:05'),
(11, 1, 11, 0, 0, 7, '2018-10-21 18:48:05', '2018-10-21 18:48:05'),
(12, 1, 12, 0, 0, 5, '2018-10-21 18:48:05', '2018-10-21 18:48:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posmasters`
--

CREATE TABLE `posmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalPos` int(11) NOT NULL,
  `totalPospembantu` int(11) NOT NULL,
  `totalDesaterlayani` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posmasters`
--

INSERT INTO `posmasters` (`id`, `ta`, `totalPos`, `totalPospembantu`, `totalDesaterlayani`, `created_at`, `updated_at`) VALUES
(1, 2018, 4, 1, 108, '2018-10-21 18:48:04', '2018-10-21 18:48:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksiikandetails`
--

CREATE TABLE `produksiikandetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `produksiikanMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlProduksi` int(11) NOT NULL,
  `jmlLaut` int(11) NOT NULL,
  `jmlRawa` int(11) NOT NULL,
  `jmlSungai` int(11) NOT NULL,
  `jmlWaduk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produksiikandetails`
--

INSERT INTO `produksiikandetails` (`id`, `produksiikanMaster_id`, `kecamatan_id`, `jmlProduksi`, `jmlLaut`, `jmlRawa`, `jmlSungai`, `jmlWaduk`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 0, 2, 0, 0, '2018-07-22 23:05:57', '2018-07-22 23:05:57'),
(2, 1, 2, 16, 0, 14, 2, 0, '2018-07-22 23:05:57', '2018-07-22 23:05:57'),
(3, 1, 3, 1264, 1260, 4, 0, 0, '2018-07-22 23:05:57', '2018-07-22 23:05:57'),
(4, 1, 4, 27, 21, 3, 3, 0, '2018-07-22 23:05:57', '2019-01-21 16:48:34'),
(5, 1, 5, 3, 0, 2, 1, 0, '2018-07-22 23:05:57', '2018-07-22 23:05:57'),
(6, 1, 6, 540, 540, 0, 0, 0, '2018-07-22 23:05:57', '2018-07-22 23:05:57'),
(7, 1, 7, 13, 0, 11, 2, 0, '2018-07-22 23:05:58', '2018-07-22 23:05:58'),
(8, 1, 8, 214, 206, 3, 2, 3, '2018-07-22 23:05:58', '2018-07-22 23:05:58'),
(9, 1, 9, 257, 257, 0, 0, 0, '2018-07-22 23:05:58', '2018-07-22 23:05:58'),
(10, 1, 10, 279, 257, 19, 3, 0, '2018-07-22 23:05:58', '2018-07-22 23:05:58'),
(11, 1, 11, 51, 51, 0, 0, 0, '2018-07-22 23:05:58', '2018-07-22 23:05:58'),
(12, 1, 12, 5, 0, 3, 2, 0, '2018-07-22 23:05:58', '2018-07-22 23:05:58'),
(13, 2, 1, 6, 0, 5, 1, 0, '2018-07-22 23:38:46', '2018-07-22 23:38:46'),
(14, 2, 2, 44, 0, 39, 5, 0, '2018-07-22 23:38:46', '2018-07-22 23:38:46'),
(15, 2, 3, 6579, 6568, 11, 0, 0, '2018-07-22 23:38:46', '2018-07-22 23:38:46'),
(16, 2, 4, 75, 0, 56, 8, 11, '2018-07-22 23:38:46', '2018-07-22 23:38:46'),
(17, 2, 5, 10, 0, 7, 3, 0, '2018-07-22 23:38:47', '2018-07-22 23:38:47'),
(18, 2, 6, 2815, 2814, 0, 1, 0, '2018-07-22 23:38:47', '2018-07-22 23:38:47'),
(19, 2, 7, 36, 0, 31, 5, 0, '2018-07-22 23:38:47', '2018-07-22 23:38:47'),
(20, 2, 8, 1096, 1072, 9, 6, 9, '2018-07-22 23:38:47', '2018-07-22 23:38:47'),
(21, 2, 9, 1341, 1340, 0, 1, 0, '2018-07-22 23:38:47', '2018-07-22 23:38:47'),
(22, 2, 10, 1400, 1340, 53, 7, 0, '2018-07-22 23:38:47', '2018-07-22 23:38:47'),
(23, 2, 11, 268, 268, 0, 0, 0, '2018-07-22 23:38:47', '2018-07-22 23:38:47'),
(24, 2, 12, 17, 0, 0, 9, 8, '2018-07-22 23:38:47', '2018-07-22 23:38:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produksiikanmasters`
--

CREATE TABLE `produksiikanmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalProduksi` int(11) NOT NULL,
  `totalLaut` int(11) NOT NULL,
  `totalRawa` int(11) NOT NULL,
  `totalSungai` int(11) NOT NULL,
  `totalWaduk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produksiikanmasters`
--

INSERT INTO `produksiikanmasters` (`id`, `ta`, `totalProduksi`, `totalLaut`, `totalRawa`, `totalSungai`, `totalWaduk`, `created_at`, `updated_at`) VALUES
(1, 2018, 2671, 2592, 61, 15, 3, '2018-07-22 23:05:57', '2019-01-21 16:48:34'),
(2, 2017, 13687, 13402, 211, 46, 28, '2018-07-22 23:38:46', '2018-07-22 23:38:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `puskesmas`
--

CREATE TABLE `puskesmas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nmaPuskesmas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `puskesmas`
--

INSERT INTO `puskesmas` (`id`, `nmaPuskesmas`, `created_at`, `updated_at`) VALUES
(1, 'Puskesmas Suppa', NULL, NULL),
(2, 'Puskesmas Ujunglero', NULL, NULL),
(3, 'Puskesmas Mattombong', NULL, NULL),
(4, 'Puskesmas Lanrisang', NULL, NULL),
(5, 'Puskesmas Mattiro Bulu', NULL, NULL),
(6, 'Puskesmas Salo', NULL, NULL),
(7, 'Puskesmas Sulili', NULL, NULL),
(8, 'Puskesmas Mattiro Deceng', NULL, NULL),
(9, 'Puskesmas Teppo', NULL, NULL),
(10, 'Puskesmas Cempa', NULL, NULL),
(11, 'Puskesmas Tadang Palie', NULL, NULL),
(12, 'Puskesmas Bungi', NULL, NULL),
(13, 'Puskesmas Lampa', NULL, NULL),
(14, 'Puskesmas Batulappa', NULL, NULL),
(15, 'Puskesmas Tuppu', NULL, NULL),
(16, 'Puskesmas Salimbongan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saranakeamanans`
--

CREATE TABLE `saranakeamanans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlSarana` int(11) NOT NULL,
  `jmlPoskeamanan` int(11) NOT NULL,
  `jmlPoskamling` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `saranakeamanans`
--

INSERT INTO `saranakeamanans` (`id`, `ta`, `jmlSarana`, `jmlPoskeamanan`, `jmlPoskamling`, `created_at`, `updated_at`) VALUES
(1, 2017, 22, 10, 12, '2018-07-22 21:40:11', '2018-07-22 21:40:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sawahdetails`
--

CREATE TABLE `sawahdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `sawahMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlLuas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sawahdetails`
--

INSERT INTO `sawahdetails` (`id`, `sawahMaster_id`, `kecamatan_id`, `jmlLuas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4641, '2018-09-15 23:08:04', '2018-09-15 23:08:04'),
(2, 1, 2, 5683, '2018-09-15 23:08:04', '2018-09-15 23:08:04'),
(3, 1, 3, 1475, '2018-09-15 23:08:04', '2018-09-15 23:08:04'),
(4, 1, 4, 6531, '2018-09-15 23:08:04', '2018-09-15 23:08:04'),
(5, 1, 5, 2409, '2018-09-15 23:08:05', '2018-09-15 23:08:05'),
(6, 1, 6, 4823, '2018-09-15 23:08:05', '2018-09-15 23:08:05'),
(7, 1, 7, 5919, '2018-09-15 23:08:05', '2018-09-15 23:08:05'),
(8, 1, 8, 3667, '2018-09-15 23:08:05', '2018-09-15 23:08:05'),
(9, 1, 9, 4113, '2018-09-15 23:08:05', '2018-09-15 23:08:05'),
(10, 1, 10, 7247, '2018-09-15 23:08:05', '2018-09-15 23:08:05'),
(11, 1, 11, 5250, '2018-09-15 23:08:05', '2018-09-15 23:08:05'),
(12, 1, 12, 1826, '2018-09-15 23:08:05', '2018-09-15 23:08:05'),
(13, 2, 1, 4641, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(14, 2, 2, 5683, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(15, 2, 3, 1488, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(16, 2, 4, 6772, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(17, 2, 5, 2409, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(18, 2, 6, 4859, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(19, 2, 7, 5919, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(20, 2, 8, 3710, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(21, 2, 9, 4113, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(22, 2, 10, 7664, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(23, 2, 11, 5531, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(24, 2, 12, 1826, '2018-09-15 23:10:51', '2018-09-15 23:10:51'),
(25, 3, 1, 4642, '2018-09-15 23:12:12', '2019-01-22 00:00:34'),
(26, 3, 2, 5683, '2018-09-15 23:12:12', '2018-09-15 23:14:04'),
(27, 3, 3, 1488, '2018-09-15 23:12:12', '2018-09-15 23:14:04'),
(28, 3, 4, 6772, '2018-09-15 23:12:12', '2018-09-15 23:14:04'),
(29, 3, 5, 2532, '2018-09-15 23:12:12', '2018-09-15 23:14:04'),
(30, 3, 6, 5132, '2018-09-15 23:12:12', '2018-09-15 23:14:04'),
(31, 3, 7, 5919, '2018-09-15 23:12:12', '2018-09-15 23:14:04'),
(32, 3, 8, 3710, '2018-09-15 23:12:13', '2018-09-15 23:14:04'),
(33, 3, 9, 4144, '2018-09-15 23:12:13', '2018-09-15 23:14:04'),
(34, 3, 10, 7664, '2018-09-15 23:12:13', '2018-09-15 23:14:04'),
(35, 3, 11, 5600, '2018-09-15 23:12:13', '2018-09-15 23:14:04'),
(36, 3, 12, 1826, '2018-09-15 23:12:13', '2018-09-15 23:14:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sawahmasters`
--

CREATE TABLE `sawahmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalLuas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sawahmasters`
--

INSERT INTO `sawahmasters` (`id`, `ta`, `totalLuas`, `created_at`, `updated_at`) VALUES
(1, 2015, 53584, '2018-09-15 23:08:04', '2018-09-15 23:08:04'),
(2, 2016, 54615, '2018-09-15 23:10:50', '2018-09-15 23:10:50'),
(3, 2017, 55112, '2018-09-15 23:12:12', '2019-01-22 00:00:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswasddetails`
--

CREATE TABLE `siswasddetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswaSDMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlSiswaSD` int(11) NOT NULL,
  `jmlLaki` int(11) NOT NULL,
  `jmlPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswasddetails`
--

INSERT INTO `siswasddetails` (`id`, `siswaSDMaster_id`, `kecamatan_id`, `jmlSiswaSD`, `jmlLaki`, `jmlPerempuan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6314, 3329, 2985, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(2, 1, 2, 2488, 1267, 1221, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(3, 1, 3, 3249, 1661, 1588, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(4, 1, 4, 3694, 1886, 1808, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(5, 1, 5, 4056, 2141, 1915, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(6, 1, 6, 2874, 1499, 1375, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(7, 1, 7, 2914, 1464, 1450, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(8, 1, 8, 5540, 2869, 2671, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(9, 1, 9, 1748, 890, 858, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(10, 1, 10, 5288, 2743, 2545, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(11, 1, 11, 2016, 1077, 939, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(12, 1, 12, 1214, 633, 581, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(13, 2, 1, 6498, 3385, 3113, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(14, 2, 2, 2583, 1322, 1261, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(15, 2, 3, 3350, 1704, 1646, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(16, 2, 4, 3830, 1992, 1838, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(17, 2, 5, 4103, 2191, 1912, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(18, 2, 6, 3053, 1601, 1452, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(19, 2, 7, 3096, 1599, 1497, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(20, 2, 8, 6106, 3121, 2985, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(21, 2, 9, 1843, 940, 903, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(22, 2, 10, 5596, 2921, 2675, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(23, 2, 11, 2119, 1124, 995, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(24, 2, 12, 1316, 658, 658, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(25, 3, 1, 6330, 3348, 2982, '2018-07-17 21:30:09', '2018-07-17 21:30:09'),
(26, 3, 2, 2492, 1269, 1223, '2018-07-17 21:30:09', '2018-07-17 21:30:09'),
(27, 3, 3, 3247, 1660, 1587, '2018-07-17 21:30:09', '2018-07-17 21:30:09'),
(28, 3, 4, 3692, 1887, 1805, '2018-07-17 21:30:10', '2018-07-17 21:30:10'),
(29, 3, 5, 4030, 2119, 1911, '2018-07-17 21:30:10', '2018-07-17 21:30:10'),
(30, 3, 6, 2876, 1502, 1374, '2018-07-17 21:30:10', '2018-07-17 21:30:10'),
(31, 3, 7, 2924, 1470, 1454, '2018-07-17 21:30:10', '2018-07-17 21:30:10'),
(32, 3, 8, 5540, 2869, 2671, '2018-07-17 21:30:10', '2018-07-17 21:30:10'),
(33, 3, 9, 1750, 891, 859, '2018-07-17 21:30:10', '2018-07-17 21:30:10'),
(34, 3, 10, 5282, 2739, 2543, '2018-07-17 21:30:10', '2018-07-17 21:30:10'),
(35, 3, 11, 2010, 1070, 940, '2018-07-17 21:30:10', '2018-07-17 21:30:10'),
(36, 3, 12, 1213, 634, 579, '2018-07-17 21:30:10', '2018-07-17 21:30:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswasdmasters`
--

CREATE TABLE `siswasdmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalSiswaSD` int(11) NOT NULL,
  `totalLaki` int(11) NOT NULL,
  `totalPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswasdmasters`
--

INSERT INTO `siswasdmasters` (`id`, `ta`, `totalSiswaSD`, `totalLaki`, `totalPerempuan`, `created_at`, `updated_at`) VALUES
(1, 2017, 41395, 21459, 19936, '2018-07-12 05:56:14', '2018-07-12 05:56:14'),
(2, 2016, 43493, 22558, 20935, '2018-07-12 06:10:43', '2018-07-12 06:10:43'),
(3, 2018, 41386, 21458, 19928, '2018-07-17 21:30:09', '2018-07-17 21:30:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswasmpdetails`
--

CREATE TABLE `siswasmpdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswaSMPMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlSiswaSMP` int(11) NOT NULL,
  `jmlLaki` int(11) NOT NULL,
  `jmlPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswasmpdetails`
--

INSERT INTO `siswasmpdetails` (`id`, `siswaSMPMaster_id`, `kecamatan_id`, `jmlSiswaSMP`, `jmlLaki`, `jmlPerempuan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3293, 1681, 1612, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(2, 1, 2, 984, 485, 499, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(3, 1, 3, 1284, 641, 643, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(4, 1, 4, 1673, 847, 826, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(5, 1, 5, 1577, 789, 788, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(6, 1, 6, 1358, 657, 701, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(7, 1, 7, 1465, 730, 735, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(8, 1, 8, 2152, 1077, 1075, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(9, 1, 9, 439, 224, 215, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(10, 1, 10, 2258, 1128, 1130, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(11, 1, 11, 979, 487, 492, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(12, 1, 12, 508, 215, 293, '2018-07-12 06:00:34', '2018-07-12 06:00:34'),
(13, 2, 1, 3293, 1681, 1612, '2018-07-12 06:14:18', '2018-07-12 06:14:18'),
(14, 2, 2, 984, 485, 499, '2018-07-12 06:14:18', '2018-07-12 06:14:18'),
(15, 2, 3, 1284, 641, 643, '2018-07-12 06:14:18', '2018-07-12 06:14:18'),
(16, 2, 4, 1673, 847, 826, '2018-07-12 06:14:18', '2018-07-12 06:14:18'),
(17, 2, 5, 1577, 789, 788, '2018-07-12 06:14:18', '2018-07-12 06:14:18'),
(18, 2, 6, 1358, 657, 701, '2018-07-12 06:14:18', '2018-07-12 06:14:18'),
(19, 2, 7, 1465, 730, 735, '2018-07-12 06:14:18', '2018-07-12 06:14:18'),
(20, 2, 8, 2152, 1077, 1075, '2018-07-12 06:14:18', '2018-07-12 06:14:18'),
(21, 2, 9, 439, 224, 215, '2018-07-12 06:14:18', '2018-07-12 06:14:18'),
(22, 2, 10, 2258, 1128, 1130, '2018-07-12 06:14:18', '2018-07-12 06:14:18'),
(23, 2, 11, 979, 487, 492, '2018-07-12 06:14:18', '2018-07-12 06:14:18'),
(24, 2, 12, 508, 215, 293, '2018-07-12 06:14:18', '2018-07-12 06:14:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswasmpmasters`
--

CREATE TABLE `siswasmpmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalSiswaSMP` int(11) NOT NULL,
  `totalLaki` int(11) NOT NULL,
  `totalPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswasmpmasters`
--

INSERT INTO `siswasmpmasters` (`id`, `ta`, `totalSiswaSMP`, `totalLaki`, `totalPerempuan`, `created_at`, `updated_at`) VALUES
(1, 2017, 17970, 8961, 9009, '2018-07-12 06:00:33', '2018-07-12 06:00:33'),
(2, 2016, 17970, 8961, 9009, '2018-07-12 06:14:18', '2018-07-12 06:14:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswatkdetails`
--

CREATE TABLE `siswatkdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswaTKMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlSiswaTK` int(11) NOT NULL,
  `jmlLaki` int(11) NOT NULL,
  `jmlPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswatkdetails`
--

INSERT INTO `siswatkdetails` (`id`, `siswaTKMaster_id`, `kecamatan_id`, `jmlSiswaTK`, `jmlLaki`, `jmlPerempuan`, `created_at`, `updated_at`) VALUES
(13, 2, 1, 4, 4, 0, '2019-01-26 00:56:19', '2019-01-26 00:56:19'),
(14, 2, 2, 0, 0, 0, '2019-01-26 00:56:19', '2019-01-26 00:56:19'),
(15, 2, 3, 0, 0, 0, '2019-01-26 00:56:20', '2019-01-26 00:56:20'),
(16, 2, 4, 0, 0, 0, '2019-01-26 00:56:20', '2019-01-26 00:56:20'),
(17, 2, 5, 0, 0, 0, '2019-01-26 00:56:20', '2019-01-26 00:56:20'),
(18, 2, 6, 0, 0, 0, '2019-01-26 00:56:20', '2019-01-26 00:56:20'),
(19, 2, 7, 0, 0, 0, '2019-01-26 00:56:20', '2019-01-26 00:56:20'),
(20, 2, 8, 0, 0, 0, '2019-01-26 00:56:20', '2019-01-26 00:56:20'),
(21, 2, 9, 0, 0, 0, '2019-01-26 00:56:20', '2019-01-26 00:56:20'),
(22, 2, 10, 0, 0, 0, '2019-01-26 00:56:20', '2019-01-26 00:56:20'),
(23, 2, 11, 0, 0, 0, '2019-01-26 00:56:20', '2019-01-26 00:56:20'),
(24, 2, 12, 0, 0, 0, '2019-01-26 00:56:20', '2019-01-26 00:56:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswatkmasters`
--

CREATE TABLE `siswatkmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalSiswaTK` int(11) NOT NULL,
  `totalLaki` int(11) NOT NULL,
  `totalPerempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswatkmasters`
--

INSERT INTO `siswatkmasters` (`id`, `ta`, `totalSiswaTK`, `totalLaki`, `totalPerempuan`, `created_at`, `updated_at`) VALUES
(2, 2018, 4, 4, 0, '2019-01-26 00:56:19', '2019-01-26 00:56:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skpd`
--

CREATE TABLE `skpd` (
  `id` int(10) UNSIGNED NOT NULL,
  `nmaSKPD` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skpd`
--

INSERT INTO `skpd` (`id`, `nmaSKPD`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Kesehatan', NULL, NULL),
(2, 'Dinas Pendidikan dan Kebudayaan', NULL, NULL),
(3, 'Badan Kepegawaian Daerah', NULL, NULL),
(4, 'Badan Kesatuan Bangsa dan Politik', NULL, NULL),
(5, 'Badan Keuangan Daerah', NULL, NULL),
(6, 'Badan Penanggulangan Bencana Daerah', NULL, NULL),
(7, 'Badan Perencanaan Pembangunan Daerah', NULL, NULL),
(8, 'Dinas Kependudukan dan Pecatatan Sipil', NULL, NULL),
(9, 'Dinas Ketahanan Pangan', NULL, NULL),
(10, 'Dinas Komunikasi dan Informatika', NULL, NULL),
(11, 'Dinas Koperasi Usaha Kecil dan Menengah', NULL, NULL),
(12, 'Dinas Lingkungan Hidup', NULL, NULL),
(13, 'Dinas Pariwisata Pemuda dan Olahraga', NULL, NULL),
(14, 'Dinas Pekerjaan Umum dan Perumahan Rakyat', NULL, NULL),
(15, 'Dinas Pemberdayaan Masyarakat dan Desa', NULL, NULL),
(16, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', NULL, NULL),
(17, 'Dinas Pengelolaan Sumber Daya Air', NULL, NULL),
(18, 'Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', NULL, NULL),
(19, 'Dinas Perhubungan', NULL, NULL),
(20, 'Dinas Perikanan', NULL, NULL),
(21, 'Dinas Perindustrian, Perdagangan, Energi dan Sumber Daya Mineral', NULL, NULL),
(22, 'Dinas Perpustakaan dan Kearsipan', NULL, NULL),
(23, 'Dinas Pertanian dan Hortikultura', NULL, NULL),
(24, 'Dinas Peternakan dan Perkebunan', NULL, NULL),
(25, 'Dinas Sosial', NULL, NULL),
(26, 'Dinas Tenaga Kerja dan Transmigrasi', NULL, NULL),
(27, 'Inspektorat', NULL, NULL),
(28, 'Kecamatan Batulappa', NULL, NULL),
(29, 'Kecamatan Cempa', NULL, NULL),
(30, 'Kecamatan Duampanua', NULL, NULL),
(31, 'Kecamatan Lanrisang', NULL, NULL),
(32, 'Kecamatan Lembang', NULL, NULL),
(33, 'Kecamatan Mattiro Bulu', NULL, NULL),
(34, 'Kecamatan Mattiro Sompe', NULL, NULL),
(35, 'Kecamatan Paleteang', NULL, NULL),
(36, 'Kecamatan Patampanua', NULL, NULL),
(37, 'Kecamatan Suppa', NULL, NULL),
(38, 'Kecamatan Tiroang', NULL, NULL),
(39, 'Kecamatan Watang Sawitto', NULL, NULL),
(40, 'Rumah Sakit Umum Lasinrang', NULL, NULL),
(41, 'Rumah Sakit Pratama Bungi', NULL, NULL),
(42, 'Satuan Polisi Pamong Praja', NULL, NULL),
(43, 'Sekretariat Daerah', NULL, NULL),
(44, 'Sekretariat Dewan Pengurus KORPRI', NULL, NULL),
(45, 'Sekretariat Dewan Perwakilan Rakyat Daerah', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sppldetails`
--

CREATE TABLE `sppldetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `spplMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlSurat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sppldetails`
--

INSERT INTO `sppldetails` (`id`, `spplMaster_id`, `kecamatan_id`, `jmlSurat`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 35, '2018-10-03 16:29:36', '2019-01-25 03:58:04'),
(2, 1, 2, 2, '2018-10-03 16:29:36', '2018-10-03 16:29:36'),
(3, 1, 3, 10, '2018-10-03 16:29:36', '2018-10-03 16:29:36'),
(4, 1, 4, 10, '2018-10-03 16:29:36', '2018-10-03 16:29:36'),
(5, 1, 5, 16, '2018-10-03 16:29:36', '2018-10-03 16:29:36'),
(6, 1, 6, 7, '2018-10-03 16:29:36', '2018-10-03 16:29:36'),
(7, 1, 7, 5, '2018-10-03 16:29:36', '2018-10-03 16:29:36'),
(8, 1, 8, 2, '2018-10-03 16:29:36', '2018-10-03 16:29:36'),
(9, 1, 9, 0, '2018-10-03 16:29:36', '2018-10-03 16:29:36'),
(10, 1, 10, 7, '2018-10-03 16:29:36', '2018-10-03 16:29:36'),
(11, 1, 11, 5, '2018-10-03 16:29:36', '2018-10-03 16:29:36'),
(12, 1, 12, 2, '2018-10-03 16:29:36', '2018-10-03 16:29:36'),
(13, 2, 1, 30, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(14, 2, 2, 2, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(15, 2, 3, 4, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(16, 2, 4, 3, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(17, 2, 5, 11, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(18, 2, 6, 3, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(19, 2, 7, 9, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(20, 2, 8, 4, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(21, 2, 9, 0, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(22, 2, 10, 8, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(23, 2, 11, 0, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(24, 2, 12, 2, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(25, 3, 1, 42, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(26, 3, 2, 1, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(27, 3, 3, 9, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(28, 3, 4, 4, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(29, 3, 5, 13, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(30, 3, 6, 2, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(31, 3, 7, 7, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(32, 3, 8, 9, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(33, 3, 9, 3, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(34, 3, 10, 6, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(35, 3, 11, 1, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(36, 3, 12, 4, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(37, 4, 1, 24, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(38, 4, 2, 2, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(39, 4, 3, 7, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(40, 4, 4, 5, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(41, 4, 5, 12, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(42, 4, 6, 5, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(43, 4, 7, 8, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(44, 4, 8, 3, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(45, 4, 9, 1, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(46, 4, 10, 6, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(47, 4, 11, 4, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(48, 4, 12, 0, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(49, 5, 1, 23, '2018-10-03 16:39:58', '2018-10-03 16:39:58'),
(50, 5, 2, 2, '2018-10-03 16:39:58', '2018-10-03 16:39:58'),
(51, 5, 3, 4, '2018-10-03 16:39:58', '2018-10-03 16:39:58'),
(52, 5, 4, 9, '2018-10-03 16:39:59', '2018-10-03 16:39:59'),
(53, 5, 5, 12, '2018-10-03 16:39:59', '2018-10-03 16:39:59'),
(54, 5, 6, 1, '2018-10-03 16:39:59', '2018-10-03 16:39:59'),
(55, 5, 7, 4, '2018-10-03 16:39:59', '2018-10-03 16:39:59'),
(56, 5, 8, 1, '2018-10-03 16:39:59', '2018-10-03 16:39:59'),
(57, 5, 9, 1, '2018-10-03 16:39:59', '2018-10-03 16:39:59'),
(58, 5, 10, 7, '2018-10-03 16:39:59', '2018-10-03 16:39:59'),
(59, 5, 11, 3, '2018-10-03 16:39:59', '2018-10-03 16:39:59'),
(60, 5, 12, 0, '2018-10-03 16:39:59', '2018-10-03 16:39:59'),
(61, 6, 1, 16, '2018-10-03 16:41:08', '2018-10-03 16:41:08'),
(62, 6, 2, 0, '2018-10-03 16:41:08', '2018-10-03 16:41:08'),
(63, 6, 3, 1, '2018-10-03 16:41:08', '2018-10-03 16:41:08'),
(64, 6, 4, 2, '2018-10-03 16:41:08', '2018-10-03 16:41:08'),
(65, 6, 5, 1, '2018-10-03 16:41:09', '2018-10-03 16:41:09'),
(66, 6, 6, 2, '2018-10-03 16:41:09', '2018-10-03 16:41:09'),
(67, 6, 7, 3, '2018-10-03 16:41:09', '2018-10-03 16:41:09'),
(68, 6, 8, 0, '2018-10-03 16:41:09', '2018-10-03 16:41:09'),
(69, 6, 9, 0, '2018-10-03 16:41:09', '2018-10-03 16:41:09'),
(70, 6, 10, 5, '2018-10-03 16:41:09', '2018-10-03 16:41:09'),
(71, 6, 11, 2, '2018-10-03 16:41:09', '2018-10-03 16:41:09'),
(72, 6, 12, 0, '2018-10-03 16:41:09', '2018-10-03 16:41:09'),
(73, 7, 1, 19, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(74, 7, 2, 2, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(75, 7, 3, 2, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(76, 7, 4, 2, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(77, 7, 5, 5, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(78, 7, 6, 1, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(79, 7, 7, 3, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(80, 7, 8, 1, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(81, 7, 9, 3, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(82, 7, 10, 9, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(83, 7, 11, 2, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(84, 7, 12, 0, '2018-10-03 16:43:38', '2018-10-03 16:43:38'),
(85, 8, 1, 20, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(86, 8, 2, 0, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(87, 8, 3, 2, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(88, 8, 4, 4, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(89, 8, 5, 11, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(90, 8, 6, 4, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(91, 8, 7, 7, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(92, 8, 8, 1, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(93, 8, 9, 3, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(94, 8, 10, 6, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(95, 8, 11, 2, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(96, 8, 12, 3, '2018-10-03 16:44:50', '2018-10-03 16:44:50'),
(97, 9, 1, 21, '2018-10-03 17:08:48', '2018-10-03 17:08:48'),
(98, 9, 2, 2, '2018-10-03 17:08:48', '2018-10-03 17:08:48'),
(99, 9, 3, 2, '2018-10-03 17:08:48', '2018-10-03 17:08:48'),
(100, 9, 4, 4, '2018-10-03 17:08:48', '2018-10-03 17:08:48'),
(101, 9, 5, 13, '2018-10-03 17:08:48', '2018-10-03 17:08:48'),
(102, 9, 6, 1, '2018-10-03 17:08:48', '2018-10-03 17:08:48'),
(103, 9, 7, 2, '2018-10-03 17:08:48', '2018-10-03 17:08:48'),
(104, 9, 8, 7, '2018-10-03 17:08:48', '2018-10-03 17:08:48'),
(105, 9, 9, 1, '2018-10-03 17:08:49', '2018-10-03 17:08:49'),
(106, 9, 10, 5, '2018-10-03 17:08:49', '2018-10-03 17:08:49'),
(107, 9, 11, 5, '2018-10-03 17:08:49', '2018-10-03 17:08:49'),
(108, 9, 12, 1, '2018-10-03 17:08:49', '2018-10-03 17:08:49'),
(109, 10, 1, 33, '2018-10-03 17:10:15', '2018-10-03 17:10:15'),
(110, 10, 2, 2, '2018-10-03 17:10:15', '2018-10-03 17:10:15'),
(111, 10, 3, 4, '2018-10-03 17:10:15', '2018-10-03 17:10:15'),
(112, 10, 4, 1, '2018-10-03 17:10:15', '2018-10-03 17:10:15'),
(113, 10, 5, 13, '2018-10-03 17:10:15', '2018-10-03 17:10:15'),
(114, 10, 6, 2, '2018-10-03 17:10:16', '2018-10-03 17:10:16'),
(115, 10, 7, 3, '2018-10-03 17:10:16', '2018-10-03 17:10:16'),
(116, 10, 8, 2, '2018-10-03 17:10:16', '2018-10-03 17:10:16'),
(117, 10, 9, 8, '2018-10-03 17:10:16', '2018-10-03 17:10:16'),
(118, 10, 10, 7, '2018-10-03 17:10:16', '2018-10-03 17:10:16'),
(119, 10, 11, 1, '2018-10-03 17:10:16', '2018-10-03 17:10:16'),
(120, 10, 12, 1, '2018-10-03 17:10:16', '2018-10-03 17:10:16'),
(121, 11, 1, 38, '2018-10-03 17:16:58', '2018-10-03 17:16:58'),
(122, 11, 2, 4, '2018-10-03 17:16:59', '2018-10-03 17:16:59'),
(123, 11, 3, 5, '2018-10-03 17:16:59', '2018-10-03 17:16:59'),
(124, 11, 4, 7, '2018-10-03 17:16:59', '2018-10-03 17:16:59'),
(125, 11, 5, 16, '2018-10-03 17:16:59', '2018-10-03 17:16:59'),
(126, 11, 6, 4, '2018-10-03 17:16:59', '2018-10-03 17:16:59'),
(127, 11, 7, 6, '2018-10-03 17:16:59', '2018-10-03 17:16:59'),
(128, 11, 8, 3, '2018-10-03 17:16:59', '2018-10-03 17:16:59'),
(129, 11, 9, 2, '2018-10-03 17:16:59', '2018-10-03 17:16:59'),
(130, 11, 10, 5, '2018-10-03 17:16:59', '2018-10-03 17:16:59'),
(131, 11, 11, 2, '2018-10-03 17:16:59', '2018-10-03 17:16:59'),
(132, 11, 12, 1, '2018-10-03 17:16:59', '2018-10-03 17:16:59'),
(133, 12, 1, 35, '2018-10-03 17:18:01', '2018-10-03 17:18:01'),
(134, 12, 2, 2, '2018-10-03 17:18:01', '2018-10-03 17:18:01'),
(135, 12, 3, 0, '2018-10-03 17:18:01', '2018-10-03 17:18:01'),
(136, 12, 4, 3, '2018-10-03 17:18:01', '2018-10-03 17:18:01'),
(137, 12, 5, 8, '2018-10-03 17:18:01', '2018-10-03 17:18:01'),
(138, 12, 6, 1, '2018-10-03 17:18:02', '2018-10-03 17:18:02'),
(139, 12, 7, 6, '2018-10-03 17:18:02', '2018-10-03 17:18:02'),
(140, 12, 8, 1, '2018-10-03 17:18:02', '2018-10-03 17:18:02'),
(141, 12, 9, 1, '2018-10-03 17:18:02', '2018-10-03 17:18:02'),
(142, 12, 10, 6, '2018-10-03 17:18:02', '2018-10-03 17:18:02'),
(143, 12, 11, 1, '2018-10-03 17:18:02', '2018-10-03 17:18:02'),
(144, 12, 12, 2, '2018-10-03 17:18:02', '2018-10-03 17:18:02'),
(145, 13, 1, 33, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(146, 13, 2, 1, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(147, 13, 3, 1, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(148, 13, 4, 1, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(149, 13, 5, 10, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(150, 13, 6, 3, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(151, 13, 7, 7, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(152, 13, 8, 0, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(153, 13, 9, 3, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(154, 13, 10, 14, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(155, 13, 11, 3, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(156, 13, 12, 0, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(157, 14, 1, 13, '2018-10-03 17:20:06', '2018-10-03 17:20:06'),
(158, 14, 2, 1, '2018-10-03 17:20:06', '2018-10-03 17:20:06'),
(159, 14, 3, 3, '2018-10-03 17:20:07', '2018-10-03 17:20:07'),
(160, 14, 4, 6, '2018-10-03 17:20:07', '2018-10-03 17:20:07'),
(161, 14, 5, 5, '2018-10-03 17:20:07', '2018-10-03 17:20:07'),
(162, 14, 6, 2, '2018-10-03 17:20:07', '2018-10-03 17:20:07'),
(163, 14, 7, 2, '2018-10-03 17:20:07', '2018-10-03 17:20:07'),
(164, 14, 8, 0, '2018-10-03 17:20:07', '2018-10-03 17:20:07'),
(165, 14, 9, 1, '2018-10-03 17:20:07', '2018-10-03 17:20:07'),
(166, 14, 10, 2, '2018-10-03 17:20:07', '2018-10-03 17:20:07'),
(167, 14, 11, 2, '2018-10-03 17:20:07', '2018-10-03 17:20:07'),
(168, 14, 12, 0, '2018-10-03 17:20:07', '2018-10-03 17:20:07'),
(169, 15, 1, 20, '2018-10-03 17:21:01', '2018-10-03 17:21:01'),
(170, 15, 2, 3, '2018-10-03 17:21:01', '2018-10-03 17:21:01'),
(171, 15, 3, 4, '2018-10-03 17:21:01', '2018-10-03 17:21:01'),
(172, 15, 4, 3, '2018-10-03 17:21:01', '2018-10-03 17:21:01'),
(173, 15, 5, 7, '2018-10-03 17:21:02', '2018-10-03 17:21:02'),
(174, 15, 6, 1, '2018-10-03 17:21:02', '2018-10-03 17:21:02'),
(175, 15, 7, 2, '2018-10-03 17:21:02', '2018-10-03 17:21:02'),
(176, 15, 8, 2, '2018-10-03 17:21:02', '2018-10-03 17:21:02'),
(177, 15, 9, 1, '2018-10-03 17:21:02', '2018-10-03 17:21:02'),
(178, 15, 10, 10, '2018-10-03 17:21:02', '2018-10-03 17:21:02'),
(179, 15, 11, 0, '2018-10-03 17:21:02', '2018-10-03 17:21:02'),
(180, 15, 12, 0, '2018-10-03 17:21:02', '2018-10-03 17:21:02'),
(181, 16, 1, 20, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(182, 16, 2, 1, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(183, 16, 3, 1, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(184, 16, 4, 3, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(185, 16, 5, 7, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(186, 16, 6, 5, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(187, 16, 7, 4, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(188, 16, 8, 0, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(189, 16, 9, 3, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(190, 16, 10, 9, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(191, 16, 11, 4, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(192, 16, 12, 1, '2018-10-03 17:22:24', '2018-10-03 17:22:24'),
(193, 17, 1, 13, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(194, 17, 2, 1, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(195, 17, 3, 1, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(196, 17, 4, 4, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(197, 17, 5, 8, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(198, 17, 6, 3, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(199, 17, 7, 3, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(200, 17, 8, 2, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(201, 17, 9, 3, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(202, 17, 10, 10, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(203, 17, 11, 4, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(204, 17, 12, 0, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(205, 18, 1, 25, '2018-10-03 17:24:32', '2018-10-03 17:24:32'),
(206, 18, 2, 1, '2018-10-03 17:24:32', '2018-10-03 17:24:32'),
(207, 18, 3, 4, '2018-10-03 17:24:32', '2018-10-03 17:24:32'),
(208, 18, 4, 2, '2018-10-03 17:24:32', '2018-10-03 17:24:32'),
(209, 18, 5, 18, '2018-10-03 17:24:32', '2018-10-03 17:24:32'),
(210, 18, 6, 4, '2018-10-03 17:24:33', '2018-10-03 17:24:33'),
(211, 18, 7, 7, '2018-10-03 17:24:33', '2018-10-03 17:24:33'),
(212, 18, 8, 3, '2018-10-03 17:24:33', '2018-10-03 17:24:33'),
(213, 18, 9, 3, '2018-10-03 17:24:33', '2018-10-03 17:24:33'),
(214, 18, 10, 8, '2018-10-03 17:24:33', '2018-10-03 17:24:33'),
(215, 18, 11, 3, '2018-10-03 17:24:33', '2018-10-03 17:24:33'),
(216, 18, 12, 1, '2018-10-03 17:24:33', '2018-10-03 17:24:33'),
(217, 19, 1, 20, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(218, 19, 2, 1, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(219, 19, 3, 1, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(220, 19, 4, 3, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(221, 19, 5, 8, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(222, 19, 6, 7, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(223, 19, 7, 4, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(224, 19, 8, 2, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(225, 19, 9, 6, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(226, 19, 10, 3, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(227, 19, 11, 0, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(228, 19, 12, 0, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(229, 20, 1, 20, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(230, 20, 2, 2, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(231, 20, 3, 2, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(232, 20, 4, 2, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(233, 20, 5, 5, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(234, 20, 6, 4, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(235, 20, 7, 9, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(236, 20, 8, 2, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(237, 20, 9, 0, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(238, 20, 10, 5, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(239, 20, 11, 4, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(240, 20, 12, 1, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(241, 21, 1, 0, '2019-01-25 03:24:23', '2019-01-25 03:24:23'),
(242, 21, 2, 6, '2019-01-25 03:24:23', '2019-01-26 05:29:53'),
(243, 21, 3, 0, '2019-01-25 03:24:23', '2019-01-25 03:24:23'),
(244, 21, 4, 0, '2019-01-25 03:24:23', '2019-01-25 03:24:23'),
(245, 21, 5, 0, '2019-01-25 03:24:23', '2019-01-25 03:24:23'),
(246, 21, 6, 0, '2019-01-25 03:24:23', '2019-01-25 03:24:23'),
(247, 21, 7, 0, '2019-01-25 03:24:23', '2019-01-25 03:24:23'),
(248, 21, 8, 0, '2019-01-25 03:24:23', '2019-01-25 03:24:23'),
(249, 21, 9, 0, '2019-01-25 03:24:23', '2019-01-25 03:24:23'),
(250, 21, 10, 0, '2019-01-25 03:24:23', '2019-01-25 03:24:23'),
(251, 21, 11, 0, '2019-01-25 03:24:23', '2019-01-25 03:24:23'),
(252, 21, 12, 0, '2019-01-25 03:24:23', '2019-01-25 03:24:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `spplmasters`
--

CREATE TABLE `spplmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `bln` int(11) NOT NULL,
  `totalSurat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `spplmasters`
--

INSERT INTO `spplmasters` (`id`, `ta`, `bln`, `totalSurat`, `created_at`, `updated_at`) VALUES
(1, 2018, 1, 101, '2018-10-03 16:29:36', '2019-01-25 03:58:03'),
(2, 2018, 2, 76, '2018-10-03 16:32:53', '2018-10-03 16:32:53'),
(3, 2018, 3, 101, '2018-10-03 16:36:54', '2018-10-03 16:36:54'),
(4, 2018, 4, 77, '2018-10-03 16:38:35', '2018-10-03 16:38:35'),
(5, 2018, 5, 67, '2018-10-03 16:39:58', '2018-10-03 16:39:58'),
(6, 2018, 6, 32, '2018-10-03 16:41:08', '2018-10-03 16:41:08'),
(7, 2018, 7, 49, '2018-10-03 16:43:37', '2018-10-03 16:43:37'),
(8, 2018, 8, 63, '2018-10-03 16:44:49', '2018-10-03 16:44:49'),
(9, 2017, 1, 64, '2018-10-03 17:08:48', '2018-10-03 17:08:48'),
(10, 2017, 2, 77, '2018-10-03 17:10:15', '2018-10-03 17:10:15'),
(11, 2017, 3, 93, '2018-10-03 17:16:58', '2018-10-03 17:16:58'),
(12, 2017, 4, 66, '2018-10-03 17:18:01', '2018-10-03 17:18:01'),
(13, 2017, 5, 76, '2018-10-03 17:19:07', '2018-10-03 17:19:07'),
(14, 2017, 6, 37, '2018-10-03 17:20:06', '2018-10-03 17:20:06'),
(15, 2017, 7, 53, '2018-10-03 17:21:01', '2018-10-03 17:21:01'),
(16, 2017, 8, 58, '2018-10-03 17:22:23', '2018-10-03 17:22:23'),
(17, 2017, 9, 52, '2018-10-03 17:23:26', '2018-10-03 17:23:26'),
(18, 2017, 10, 79, '2018-10-03 17:24:32', '2018-10-03 17:24:32'),
(19, 2017, 11, 55, '2018-10-03 17:25:39', '2018-10-03 17:25:39'),
(20, 2017, 12, 56, '2018-10-03 17:26:35', '2018-10-03 17:26:35'),
(21, 2018, 8, 6, '2019-01-25 03:24:23', '2019-01-26 05:29:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `telekomunikasidetails`
--

CREATE TABLE `telekomunikasidetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `telekomunikasiMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlDesaterlayani` int(11) NOT NULL,
  `jmlDesabelumterlayani` int(11) NOT NULL,
  `jmlBTS` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `telekomunikasidetails`
--

INSERT INTO `telekomunikasidetails` (`id`, `telekomunikasiMaster_id`, `kecamatan_id`, `jmlDesaterlayani`, `jmlDesabelumterlayani`, `jmlBTS`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 2, '2019-01-25 03:03:36', '2019-01-25 03:03:36'),
(2, 1, 2, 0, 0, 0, '2019-01-25 03:03:36', '2019-01-25 03:03:36'),
(3, 1, 3, 0, 0, 0, '2019-01-25 03:03:36', '2019-01-25 03:03:36'),
(4, 1, 4, 0, 0, 0, '2019-01-25 03:03:36', '2019-01-25 03:03:36'),
(5, 1, 5, 0, 0, 0, '2019-01-25 03:03:36', '2019-01-25 03:03:36'),
(6, 1, 6, 0, 0, 0, '2019-01-25 03:03:36', '2019-01-25 03:03:36'),
(7, 1, 7, 0, 0, 0, '2019-01-25 03:03:36', '2019-01-25 03:03:36'),
(8, 1, 8, 0, 0, 0, '2019-01-25 03:03:36', '2019-01-25 03:03:36'),
(9, 1, 9, 0, 0, 0, '2019-01-25 03:03:36', '2019-01-25 03:03:36'),
(10, 1, 10, 0, 0, 0, '2019-01-25 03:03:37', '2019-01-25 03:03:37'),
(11, 1, 11, 0, 0, 0, '2019-01-25 03:03:37', '2019-01-25 03:03:37'),
(12, 1, 12, 0, 0, 0, '2019-01-25 03:03:37', '2019-01-25 03:03:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `telekomunikasimasters`
--

CREATE TABLE `telekomunikasimasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalDesaterlayani` int(11) NOT NULL,
  `totalDesabelumterlayani` int(11) NOT NULL,
  `totalBTS` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `telekomunikasimasters`
--

INSERT INTO `telekomunikasimasters` (`id`, `ta`, `totalDesaterlayani`, `totalDesabelumterlayani`, `totalBTS`, `created_at`, `updated_at`) VALUES
(1, 2018, 0, 0, 2, '2019-01-25 03:03:35', '2019-01-25 03:03:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_ayamburas`
--

CREATE TABLE `ternak_ayamburas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Populasi` int(11) NOT NULL,
  `Kematian` int(11) NOT NULL,
  `Kelahiran` int(11) NOT NULL,
  `Masuk` int(11) NOT NULL,
  `Keluar` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `NonRPH` int(11) NOT NULL,
  `jmlPotong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak_ayamburas`
--

INSERT INTO `ternak_ayamburas` (`id`, `ta`, `Populasi`, `Kematian`, `Kelahiran`, `Masuk`, `Keluar`, `RPH`, `NonRPH`, `jmlPotong`, `created_at`, `updated_at`) VALUES
(1, 2015, 1700344, 0, 0, 3695, 1001, 0, 8429, 8429, '2018-07-25 17:59:22', '2018-07-25 17:59:22'),
(2, 2016, 1739268, 0, 0, 2368, 0, 0, 10481, 10481, '2018-07-25 18:30:06', '2018-07-25 18:30:06'),
(3, 2017, 1746790, 34923, 53986, 422, 0, 0, 11963, 11963, '2018-07-27 03:36:44', '2018-07-27 03:36:44'),
(4, 2018, 1746790, 20411, 33809, 1, 0, 0, 0, 0, '2018-12-27 22:03:54', '2019-01-22 02:02:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_ayamraspedagings`
--

CREATE TABLE `ternak_ayamraspedagings` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Populasi` int(11) NOT NULL,
  `Kematian` int(11) NOT NULL,
  `Kelahiran` int(11) NOT NULL,
  `Masuk` int(11) NOT NULL,
  `Keluar` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `NonRPH` int(11) NOT NULL,
  `jmlPotong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak_ayamraspedagings`
--

INSERT INTO `ternak_ayamraspedagings` (`id`, `ta`, `Populasi`, `Kematian`, `Kelahiran`, `Masuk`, `Keluar`, `RPH`, `NonRPH`, `jmlPotong`, `created_at`, `updated_at`) VALUES
(1, 2015, 244966, 0, 0, 120079, 60580, 0, 51643, 51643, '2018-07-25 18:00:17', '2018-07-25 18:00:17'),
(2, 2016, 250941, 0, 0, 127319, 52802, 0, 62653, 62653, '2018-07-25 18:31:06', '2018-07-25 18:31:06'),
(3, 2017, 251535, 3217, 0, 94530, 26100, 0, 64619, 64619, '2018-07-27 03:38:01', '2018-07-27 03:38:01'),
(4, 2018, 251536, 3008, 0, 107000, 0, 0, 0, 0, '2018-12-27 22:04:31', '2019-01-22 02:03:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_ayamraspetelurs`
--

CREATE TABLE `ternak_ayamraspetelurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Populasi` int(11) NOT NULL,
  `Kematian` int(11) NOT NULL,
  `Kelahiran` int(11) NOT NULL,
  `Masuk` int(11) NOT NULL,
  `Keluar` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `NonRPH` int(11) NOT NULL,
  `jmlPotong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak_ayamraspetelurs`
--

INSERT INTO `ternak_ayamraspetelurs` (`id`, `ta`, `Populasi`, `Kematian`, `Kelahiran`, `Masuk`, `Keluar`, `RPH`, `NonRPH`, `jmlPotong`, `created_at`, `updated_at`) VALUES
(1, 2015, 770591, 0, 0, 97720, 53250, 0, 34254, 34254, '2018-07-25 18:01:19', '2018-07-25 18:01:19'),
(2, 2016, 779769, 0, 0, 172473, 122675, 0, 32264, 32264, '2018-07-25 18:32:03', '2018-07-25 18:32:03'),
(3, 2017, 781300, 1455, 0, 79287, 42431, 0, 33870, 33870, '2018-07-27 03:39:40', '2018-07-27 03:39:40'),
(4, 2018, 781300, 1625, 0, 215200, 5000, 0, 0, 0, '2018-12-27 22:05:34', '2018-12-27 22:05:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_babis`
--

CREATE TABLE `ternak_babis` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Populasi` int(11) NOT NULL,
  `Kematian` int(11) NOT NULL,
  `Kelahiran` int(11) NOT NULL,
  `Masuk` int(11) NOT NULL,
  `Keluar` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `NonRPH` int(11) NOT NULL,
  `jmlPotong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak_babis`
--

INSERT INTO `ternak_babis` (`id`, `ta`, `Populasi`, `Kematian`, `Kelahiran`, `Masuk`, `Keluar`, `RPH`, `NonRPH`, `jmlPotong`, `created_at`, `updated_at`) VALUES
(1, 2015, 6563, 0, 0, 544, 232, 0, 256, 256, '2018-07-25 17:56:49', '2018-07-25 17:56:49'),
(2, 2016, 6972, 0, 0, 737, 55, 0, 569, 569, '2018-07-25 18:27:58', '2018-07-25 18:27:58'),
(3, 2017, 6153, 25, 115, 80, 0, 0, 989, 989, '2018-07-27 03:33:18', '2018-07-27 03:33:18'),
(4, 2018, 6153, 4, 43, 0, 0, 0, 0, 0, '2018-12-27 22:03:01', '2019-01-22 02:01:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_dombas`
--

CREATE TABLE `ternak_dombas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Populasi` int(11) NOT NULL,
  `Kematian` int(11) NOT NULL,
  `Kelahiran` int(11) NOT NULL,
  `Masuk` int(11) NOT NULL,
  `Keluar` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `NonRPH` int(11) NOT NULL,
  `jmlPotong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak_dombas`
--

INSERT INTO `ternak_dombas` (`id`, `ta`, `Populasi`, `Kematian`, `Kelahiran`, `Masuk`, `Keluar`, `RPH`, `NonRPH`, `jmlPotong`, `created_at`, `updated_at`) VALUES
(1, 2015, 0, 0, 0, 0, 0, 0, 0, 0, '2018-07-25 17:57:13', '2019-01-22 02:02:17'),
(2, 2018, 3, 4, 0, 3, 0, 4, 0, 4, '2019-01-25 22:49:08', '2019-01-25 22:49:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_itiks`
--

CREATE TABLE `ternak_itiks` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Populasi` int(11) NOT NULL,
  `Kematian` int(11) NOT NULL,
  `Kelahiran` int(11) NOT NULL,
  `Masuk` int(11) NOT NULL,
  `Keluar` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `NonRPH` int(11) NOT NULL,
  `jmlPotong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak_itiks`
--

INSERT INTO `ternak_itiks` (`id`, `ta`, `Populasi`, `Kematian`, `Kelahiran`, `Masuk`, `Keluar`, `RPH`, `NonRPH`, `jmlPotong`, `created_at`, `updated_at`) VALUES
(1, 2015, 1034498, 0, 0, 4259, 35550, 0, 10740, 10740, '2018-07-25 18:02:33', '2018-07-25 18:02:33'),
(2, 2016, 1070126, 0, 0, 15674, 16703, 0, 14081, 14081, '2018-07-25 18:33:58', '2018-07-25 18:33:58'),
(3, 2017, 1086562, 6341, 0, 6181, 16256, 0, 64852, 64852, '2018-07-27 03:40:59', '2018-07-27 03:40:59'),
(4, 2018, 1086562, 3667, 27977, 0, 238, 0, 0, 0, '2018-12-27 22:06:11', '2018-12-27 22:06:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_kambings`
--

CREATE TABLE `ternak_kambings` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Populasi` int(11) NOT NULL,
  `Kematian` int(11) NOT NULL,
  `Kelahiran` int(11) NOT NULL,
  `Masuk` int(11) NOT NULL,
  `Keluar` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `NonRPH` int(11) NOT NULL,
  `jmlPotong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak_kambings`
--

INSERT INTO `ternak_kambings` (`id`, `ta`, `Populasi`, `Kematian`, `Kelahiran`, `Masuk`, `Keluar`, `RPH`, `NonRPH`, `jmlPotong`, `created_at`, `updated_at`) VALUES
(1, 2015, 33452, 0, 0, 2761, 101, 0, 2411, 2411, '2018-07-25 17:58:16', '2018-07-25 17:58:16'),
(2, 2016, 36688, 0, 0, 2143, 471, 0, 2518, 2518, '2018-07-25 18:29:09', '2018-07-25 18:29:09'),
(3, 2017, 35916, 217, 2870, 489, 409, 0, 3505, 3505, '2018-07-27 03:35:02', '2018-07-27 03:35:02'),
(4, 2018, 35916, 136, 1363, 0, 263, 0, 0, 0, '2018-12-27 22:03:29', '2019-01-22 02:02:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_kerbaus`
--

CREATE TABLE `ternak_kerbaus` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Populasi` int(11) NOT NULL,
  `Kematian` int(11) NOT NULL,
  `Kelahiran` int(11) NOT NULL,
  `Masuk` int(11) NOT NULL,
  `Keluar` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `NonRPH` int(11) NOT NULL,
  `jmlPotong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak_kerbaus`
--

INSERT INTO `ternak_kerbaus` (`id`, `ta`, `Populasi`, `Kematian`, `Kelahiran`, `Masuk`, `Keluar`, `RPH`, `NonRPH`, `jmlPotong`, `created_at`, `updated_at`) VALUES
(1, 2015, 3231, 0, 0, 12, 1, 3, 3, 6, '2018-07-25 17:51:06', '2018-07-25 17:51:06'),
(2, 2016, 3500, 0, 0, 19, 3, 0, 4, 4, '2018-07-25 18:24:49', '2018-07-25 18:24:49'),
(3, 2017, 3397, 150, 120, 0, 70, 2, 1, 3, '2018-07-25 18:35:52', '2018-07-25 18:35:52'),
(5, 2018, 3397, 27, 95, 0, 1, 0, 0, 0, '2018-12-27 21:57:55', '2019-01-22 02:01:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_kudas`
--

CREATE TABLE `ternak_kudas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Populasi` int(11) NOT NULL,
  `Kematian` int(11) NOT NULL,
  `Kelahiran` int(11) NOT NULL,
  `Masuk` int(11) NOT NULL,
  `Keluar` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `NonRPH` int(11) NOT NULL,
  `jmlPotong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak_kudas`
--

INSERT INTO `ternak_kudas` (`id`, `ta`, `Populasi`, `Kematian`, `Kelahiran`, `Masuk`, `Keluar`, `RPH`, `NonRPH`, `jmlPotong`, `created_at`, `updated_at`) VALUES
(1, 2015, 2979, 0, 0, 2, 0, 0, 2, 2, '2018-07-25 17:52:23', '2018-07-25 17:52:23'),
(2, 2016, 2988, 0, 0, 1, 0, 0, 2, 2, '2018-07-25 18:25:23', '2018-07-25 18:25:23'),
(4, 2018, 1036, 1, 0, 0, 53, 0, 0, 0, '2018-12-27 21:58:30', '2019-01-22 02:01:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_sapiperahs`
--

CREATE TABLE `ternak_sapiperahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Populasi` int(11) NOT NULL,
  `Kematian` int(11) NOT NULL,
  `Kelahiran` int(11) NOT NULL,
  `Masuk` int(11) NOT NULL,
  `Keluar` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `NonRPH` int(11) NOT NULL,
  `jmlPotong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak_sapiperahs`
--

INSERT INTO `ternak_sapiperahs` (`id`, `ta`, `Populasi`, `Kematian`, `Kelahiran`, `Masuk`, `Keluar`, `RPH`, `NonRPH`, `jmlPotong`, `created_at`, `updated_at`) VALUES
(1, 2015, 24, 0, 0, 0, 0, 0, 0, 0, '2018-07-25 17:55:41', '2018-07-25 17:55:41'),
(2, 2016, 27, 0, 0, 0, 0, 0, 0, 0, '2018-07-25 18:27:08', '2018-07-25 18:27:08'),
(3, 2017, 35, 5, 13, 0, 0, 0, 0, 0, '2018-07-27 03:32:14', '2018-12-27 17:34:00'),
(4, 2018, 35, 8, 3, 0, 4, 0, 0, 0, '2018-12-27 22:00:02', '2019-01-22 02:01:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ternak_sapipotongs`
--

CREATE TABLE `ternak_sapipotongs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Populasi` int(11) NOT NULL,
  `Kematian` int(11) NOT NULL,
  `Kelahiran` int(11) NOT NULL,
  `Masuk` int(11) NOT NULL,
  `Keluar` int(11) NOT NULL,
  `RPH` int(11) NOT NULL,
  `NonRPH` int(11) NOT NULL,
  `jmlPotong` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ternak_sapipotongs`
--

INSERT INTO `ternak_sapipotongs` (`id`, `ta`, `Populasi`, `Kematian`, `Kelahiran`, `Masuk`, `Keluar`, `RPH`, `NonRPH`, `jmlPotong`, `created_at`, `updated_at`) VALUES
(1, 2015, 24913, 0, 0, 505, 495, 1843, 1651, 3494, '2018-07-25 17:54:44', '2018-07-25 17:54:44'),
(2, 2016, 25794, 0, 0, 770, 44, 1617, 2533, 4150, '2018-07-25 18:26:33', '2018-07-25 18:26:33'),
(3, 2017, 26593, 214, 5813, 90, 428, 1738, 2724, 4462, '2018-07-25 23:42:10', '2018-07-25 23:42:10'),
(5, 2018, 26593, 29, 224, 1, 4, 0, 0, 0, '2018-12-27 21:59:34', '2019-01-22 02:01:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transmigrasis`
--

CREATE TABLE `transmigrasis` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Lakilaki` int(11) NOT NULL,
  `Perempuan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transmigrasis`
--

INSERT INTO `transmigrasis` (`id`, `ta`, `Jumlah`, `Lakilaki`, `Perempuan`, `created_at`, `updated_at`) VALUES
(1, 2017, 883, 505, 378, '2018-07-18 23:07:46', '2018-07-18 23:07:46'),
(2, 2016, 883, 505, 378, '2018-07-18 23:08:46', '2018-07-18 23:08:46'),
(3, 2015, 883, 505, 378, '2018-07-18 23:09:57', '2018-07-18 23:09:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ubijalardetails`
--

CREATE TABLE `ubijalardetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `ubijalarMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlTanam` int(11) NOT NULL,
  `jmlPanen` int(11) NOT NULL,
  `jmlProduksi` int(11) NOT NULL,
  `jmlProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ubijalardetails`
--

INSERT INTO `ubijalardetails` (`id`, `ubijalarMaster_id`, `kecamatan_id`, `jmlTanam`, `jmlPanen`, `jmlProduksi`, `jmlProduktivitas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 8, 81, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(2, 1, 2, 0, 0, 0, 0, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(3, 1, 3, 51, 55, 444, 0, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(4, 1, 4, 2, 4, 32, 0, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(5, 1, 5, 1, 2, 16, 0, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(6, 1, 6, 3, 2, 16, 0, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(7, 1, 7, 0, 0, 0, 0, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(8, 1, 8, 15, 15, 121, 0, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(9, 1, 9, 0, 0, 0, 0, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(10, 1, 10, 11, 11, 89, 0, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(11, 1, 11, 0, 0, 0, 0, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(12, 1, 12, 0, 0, 0, 0, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(13, 2, 1, 0, 0, 0, 0, '2018-07-18 18:01:14', '2018-07-18 18:01:14'),
(14, 2, 2, 13, 13, 209, 161, '2018-07-18 18:01:14', '2018-07-18 18:01:14'),
(15, 2, 3, 50, 1, 16, 0, '2018-07-18 18:01:14', '2018-07-18 18:01:14'),
(16, 2, 4, 0, 0, 0, 0, '2018-07-18 18:01:14', '2018-07-18 18:01:14'),
(17, 2, 5, 0, 0, 0, 0, '2018-07-18 18:01:14', '2018-07-18 18:01:14'),
(18, 2, 6, 2, 2, 32, 0, '2018-07-18 18:01:14', '2018-07-18 18:01:14'),
(19, 2, 7, 0, 50, 806, 0, '2018-07-18 18:01:14', '2018-07-18 18:01:14'),
(20, 2, 8, 16, 17, 274, 0, '2018-07-18 18:01:14', '2018-07-18 18:01:14'),
(21, 2, 9, 1, 0, 0, 0, '2018-07-18 18:01:15', '2018-07-18 18:01:15'),
(22, 2, 10, 9, 10, 161, 0, '2018-07-18 18:01:15', '2018-07-18 18:01:15'),
(23, 2, 11, 0, 0, 0, 0, '2018-07-18 18:01:15', '2018-07-18 18:01:15'),
(24, 2, 12, 0, 0, 0, 0, '2018-07-18 18:01:15', '2018-07-18 18:01:15'),
(25, 3, 1, 0, 0, 0, 0, '2018-07-18 18:24:00', '2018-07-18 18:24:00'),
(26, 3, 2, 0, 0, 0, 0, '2018-07-18 18:24:00', '2018-07-18 18:24:00'),
(27, 3, 3, 55, 55, 895, 161, '2018-07-18 18:24:00', '2018-07-18 18:24:00'),
(28, 3, 4, 0, 0, 0, 0, '2018-07-18 18:24:00', '2018-07-18 18:24:00'),
(29, 3, 5, 0, 0, 0, 0, '2018-07-18 18:24:00', '2018-07-18 18:24:00'),
(30, 3, 6, 3, 3, 49, 0, '2018-07-18 18:24:00', '2018-07-18 18:24:00'),
(31, 3, 7, 0, 0, 0, 0, '2018-07-18 18:24:00', '2018-07-18 18:24:00'),
(32, 3, 8, 9, 9, 146, 0, '2018-07-18 18:24:00', '2018-07-18 18:24:00'),
(33, 3, 9, 1, 1, 16, 0, '2018-07-18 18:24:00', '2018-07-18 18:24:00'),
(34, 3, 10, 2, 2, 33, 0, '2018-07-18 18:24:00', '2018-07-18 18:24:00'),
(35, 3, 11, 0, 0, 0, 0, '2018-07-18 18:24:00', '2018-07-18 18:24:00'),
(36, 3, 12, 0, 0, 0, 0, '2018-07-18 18:24:00', '2018-07-18 18:24:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ubijalarmasters`
--

CREATE TABLE `ubijalarmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalTanam` int(11) NOT NULL,
  `totalPanen` int(11) NOT NULL,
  `totalProduksi` int(11) NOT NULL,
  `totalProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ubijalarmasters`
--

INSERT INTO `ubijalarmasters` (`id`, `ta`, `totalTanam`, `totalPanen`, `totalProduksi`, `totalProduktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 84, 90, 726, 81, '2018-07-18 17:14:10', '2018-07-18 17:14:10'),
(2, 2016, 91, 93, 1498, 161, '2018-07-18 18:01:14', '2018-07-18 18:01:14'),
(3, 2017, 70, 70, 1139, 161, '2018-07-18 18:24:00', '2018-07-18 18:24:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ubikayudetails`
--

CREATE TABLE `ubikayudetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `ubikayuMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlTanam` int(11) NOT NULL,
  `jmlPanen` int(11) NOT NULL,
  `jmlProduksi` int(11) NOT NULL,
  `jmlProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ubikayudetails`
--

INSERT INTO `ubikayudetails` (`id`, `ubikayuMaster_id`, `kecamatan_id`, `jmlTanam`, `jmlPanen`, `jmlProduksi`, `jmlProduktivitas`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 8, 183, 229, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(2, 1, 2, 10, 7, 160, 0, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(3, 1, 3, 74, 14, 3343, 0, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(4, 1, 4, 1, 2, 69, 0, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(5, 1, 5, 3, 3, 69, 0, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(6, 1, 6, 3, 6, 46, 0, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(7, 1, 7, 148, 148, 3389, 0, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(8, 1, 8, 14, 2, 343, 0, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(9, 1, 9, 3, 2, 46, 0, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(10, 1, 10, 25, 3, 527, 0, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(11, 1, 11, 0, 15, 92, 0, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(12, 1, 12, 2, 23, 46, 0, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(13, 2, 1, 2, 2, 44, 221, '2018-07-18 17:57:00', '2018-07-18 17:57:00'),
(14, 2, 2, 8, 10, 221, 0, '2018-07-18 17:57:00', '2018-07-18 17:57:00'),
(15, 2, 3, 53, 10, 221, 0, '2018-07-18 17:57:00', '2018-07-18 17:57:00'),
(16, 2, 4, 18, 3, 66, 0, '2018-07-18 17:57:00', '2018-07-18 17:57:00'),
(17, 2, 5, 0, 5, 110, 0, '2018-07-18 17:57:00', '2018-07-18 17:57:00'),
(18, 2, 6, 7, 7, 154, 0, '2018-07-18 17:57:00', '2018-07-18 17:57:00'),
(19, 2, 7, 171, 187, 4127, 0, '2018-07-18 17:57:01', '2018-07-18 17:57:01'),
(20, 2, 8, 13, 12, 265, 0, '2018-07-18 17:57:01', '2018-07-18 17:57:01'),
(21, 2, 9, 0, 1, 22, 0, '2018-07-18 17:57:01', '2018-07-18 17:57:01'),
(22, 2, 10, 18, 22, 485, 0, '2018-07-18 17:57:01', '2018-07-18 17:57:01'),
(23, 2, 11, 0, 1, 22, 0, '2018-07-18 17:57:01', '2018-07-18 17:57:01'),
(24, 2, 12, 0, 0, 0, 0, '2018-07-18 17:57:01', '2018-07-18 17:57:01'),
(25, 3, 1, 0, 0, 0, 0, '2018-07-18 18:22:07', '2018-07-18 18:22:07'),
(26, 3, 2, 4, 4, 96, 221, '2018-07-18 18:22:07', '2018-07-18 18:22:07'),
(27, 3, 3, 87, 87, 2091, 0, '2018-07-18 18:22:07', '2018-07-18 18:22:07'),
(28, 3, 4, 18, 0, 0, 0, '2018-07-18 18:22:07', '2018-07-18 18:22:07'),
(29, 3, 5, 0, 0, 0, 0, '2018-07-18 18:22:07', '2018-07-18 18:22:07'),
(30, 3, 6, 2, 2, 48, 0, '2018-07-18 18:22:07', '2018-07-18 18:22:07'),
(31, 3, 7, 152, 123, 2956, 0, '2018-07-18 18:22:07', '2018-07-18 18:22:07'),
(32, 3, 8, 12, 12, 288, 0, '2018-07-18 18:22:07', '2018-07-18 18:22:07'),
(33, 3, 9, 0, 0, 0, 0, '2018-07-18 18:22:07', '2018-07-18 18:22:07'),
(34, 3, 10, 9, 8, 192, 0, '2018-07-18 18:22:07', '2018-07-18 18:22:07'),
(35, 3, 11, 0, 0, 0, 0, '2018-07-18 18:22:07', '2018-07-18 18:22:07'),
(36, 3, 12, 0, 0, 0, 0, '2018-07-18 18:22:07', '2018-07-18 18:22:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ubikayumasters`
--

CREATE TABLE `ubikayumasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalTanam` int(11) NOT NULL,
  `totalPanen` int(11) NOT NULL,
  `totalProduksi` int(11) NOT NULL,
  `totalProduktivitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ubikayumasters`
--

INSERT INTO `ubikayumasters` (`id`, `ta`, `totalTanam`, `totalPanen`, `totalProduksi`, `totalProduktivitas`, `created_at`, `updated_at`) VALUES
(1, 2015, 286, 233, 8313, 229, '2018-07-18 17:11:00', '2018-07-18 17:11:00'),
(2, 2016, 290, 260, 5737, 221, '2018-07-18 17:57:00', '2018-07-18 17:57:00'),
(3, 2017, 284, 236, 5671, 221, '2018-07-18 18:22:07', '2018-07-18 18:22:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujikendaraans`
--

CREATE TABLE `ujikendaraans` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlKendaraan` int(11) NOT NULL,
  `Mobilpenumpang` int(11) NOT NULL,
  `Mobilbarang` int(11) NOT NULL,
  `Mobilkhusus` int(11) NOT NULL,
  `Keretagandeng` int(11) NOT NULL,
  `Keretatempelan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ujikendaraans`
--

INSERT INTO `ujikendaraans` (`id`, `ta`, `jmlKendaraan`, `Mobilpenumpang`, `Mobilbarang`, `Mobilkhusus`, `Keretagandeng`, `Keretatempelan`, `created_at`, `updated_at`) VALUES
(1, 2015, 7645, 666, 6979, 0, 0, 0, '2018-07-09 17:53:08', '2018-07-09 17:53:08'),
(2, 2016, 6769, 452, 6317, 0, 0, 0, '2018-07-09 17:57:02', '2018-07-09 17:57:02'),
(3, 2017, 4860, 260, 4599, 1, 0, 0, '2018-07-09 17:59:12', '2019-01-21 08:28:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `umkmdetails`
--

CREATE TABLE `umkmdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `umkmMaster_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `jmlUMKM` int(11) NOT NULL,
  `jmlPerdagangan` int(11) NOT NULL,
  `jmlIndustriPertanian` int(11) NOT NULL,
  `jmlIndustriNonPertanian` int(11) NOT NULL,
  `jmlAnekaJasa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `umkmdetails`
--

INSERT INTO `umkmdetails` (`id`, `umkmMaster_id`, `kecamatan_id`, `jmlUMKM`, `jmlPerdagangan`, `jmlIndustriPertanian`, `jmlIndustriNonPertanian`, `jmlAnekaJasa`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3532, 3210, 29, 40, 253, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(2, 1, 2, 436, 337, 31, 26, 42, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(3, 1, 3, 483, 380, 25, 33, 45, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(4, 1, 4, 382, 277, 55, 20, 30, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(5, 1, 5, 2597, 2500, 24, 28, 45, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(6, 1, 6, 461, 339, 30, 37, 55, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(7, 1, 7, 439, 330, 28, 31, 50, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(8, 1, 8, 205, 110, 35, 22, 38, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(9, 1, 9, 342, 250, 25, 24, 43, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(10, 1, 10, 605, 490, 55, 32, 28, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(11, 1, 11, 360, 270, 30, 20, 40, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(12, 1, 12, 174, 80, 35, 28, 31, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(13, 2, 1, 10142, 9572, 42, 106, 422, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(14, 2, 2, 1004, 792, 79, 55, 78, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(15, 2, 3, 1144, 986, 39, 47, 72, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(16, 2, 4, 995, 773, 93, 52, 77, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(17, 2, 5, 7645, 7459, 39, 59, 88, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(18, 2, 6, 1164, 934, 47, 88, 95, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(19, 2, 7, 1086, 804, 97, 80, 105, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(20, 2, 8, 731, 562, 57, 38, 74, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(21, 2, 9, 731, 572, 44, 52, 63, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(22, 2, 10, 2177, 1899, 97, 86, 95, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(23, 2, 11, 985, 785, 57, 76, 67, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(24, 2, 12, 411, 281, 43, 35, 52, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(25, 3, 1, 10188, 9590, 43, 111, 444, '2018-10-21 19:48:37', '2018-10-21 19:48:37'),
(26, 3, 2, 1010, 795, 79, 55, 81, '2018-10-21 19:48:37', '2018-10-21 19:48:37'),
(27, 3, 3, 1160, 991, 39, 53, 77, '2018-10-21 19:48:37', '2018-10-21 19:48:37'),
(28, 3, 4, 1012, 776, 93, 55, 88, '2018-10-21 19:48:37', '2018-10-21 19:48:37'),
(29, 3, 5, 7683, 7473, 39, 61, 110, '2018-10-21 19:48:37', '2018-10-21 19:48:37'),
(30, 3, 6, 1187, 949, 47, 89, 102, '2018-10-21 19:48:38', '2018-10-21 19:48:38'),
(31, 3, 7, 1105, 813, 97, 79, 116, '2018-10-21 19:48:38', '2018-10-21 19:48:38'),
(32, 3, 8, 739, 563, 57, 38, 81, '2018-10-21 19:48:38', '2018-10-21 19:48:38'),
(33, 3, 9, 757, 581, 45, 53, 78, '2018-10-21 19:48:38', '2019-01-24 04:30:00'),
(34, 3, 10, 2188, 1903, 98, 87, 100, '2018-10-21 19:48:38', '2018-10-21 19:48:38'),
(35, 3, 11, 1019, 803, 57, 77, 82, '2018-10-21 19:48:38', '2018-10-21 19:48:38'),
(36, 3, 12, 435, 287, 43, 36, 69, '2018-10-21 19:48:38', '2018-10-21 19:48:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `umkmmasters`
--

CREATE TABLE `umkmmasters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `totalUMKM` int(11) NOT NULL,
  `totalPerdagangan` int(11) NOT NULL,
  `totalIndustriPertanian` int(11) NOT NULL,
  `totalIndustriNonPertanian` int(11) NOT NULL,
  `totalAnekaJasa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `umkmmasters`
--

INSERT INTO `umkmmasters` (`id`, `ta`, `totalUMKM`, `totalPerdagangan`, `totalIndustriPertanian`, `totalIndustriNonPertanian`, `totalAnekaJasa`, `created_at`, `updated_at`) VALUES
(1, 2015, 10016, 8573, 402, 341, 700, '2018-07-17 22:29:02', '2018-07-17 22:29:02'),
(2, 2016, 28215, 25419, 734, 774, 1288, '2018-10-21 19:34:10', '2018-10-21 19:34:10'),
(3, 2017, 28483, 25524, 737, 794, 1428, '2018-10-21 19:48:37', '2019-01-24 04:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unjukrasas`
--

CREATE TABLE `unjukrasas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ta` int(11) NOT NULL,
  `jmlKasus` int(11) NOT NULL,
  `jmlPolitik` int(11) NOT NULL,
  `jmlEkonomi` int(11) NOT NULL,
  `jmlAgama` int(11) NOT NULL,
  `jmlLainnya` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `uptd_psdas`
--

CREATE TABLE `uptd_psdas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nmaUPTD` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `uptd_psdas`
--

INSERT INTO `uptd_psdas` (`id`, `nmaUPTD`, `created_at`, `updated_at`) VALUES
(1, 'UPTD Pekkabata', NULL, NULL),
(2, 'UPTD Sawitto', NULL, NULL),
(3, 'UPTD Salipolo', NULL, NULL),
(4, 'UPTD Cempa', NULL, NULL),
(5, 'UPTD Langnga', NULL, NULL),
(6, 'UPTD Jampue', NULL, NULL),
(7, 'UPTD Alitta Carawali', NULL, NULL),
(8, 'UPTD Tiroang', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skpd_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `skpd_id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dinas Kesehatan', 1, 'dinkes@pinrangkab.go.id', '$2y$10$..Y0NgFqD9fSs7gUSV8O6elL8962YiEmfG.racwQQUVTLQM8fOnfO', '3A0iqwsNXSFWgSqv53H0Dlh6sCl0BtWA53zFS1MXfrE5dQ6EnqEZ8wEVmCKh', NULL, NULL),
(2, 'Dinas Pendidikan dan Kebudayaan', 2, 'diknas@pinrangkab.go.id', '$2y$10$T.FMkt6SQ6Xpd05cIpLomu69zcvZVnEW4ZbI/o2WyKsm8PtHn5LBS', 'FPvqxHVzUuGSmYSFLP9PTvddjRlyBGRJDRWr2rT66kVgEi6K2z7J1Xva6i0i', NULL, NULL),
(3, 'Badan Kepegawaian Daerah', 3, 'bkd@pinrangkab.go.id', '$2y$10$Vg9YTD4At/DUzzkEZ1BwM.qDQMC8u3kNWNI.2JU5yk6ezMB23aiqe', 'xlj8ggJtqfBAkYOQ8QWSUAdYCefQ0UmbJySNZWVT0f05XRRn0uqd3gugN7WP', NULL, NULL),
(4, 'Badan Kesatuan Bangsa dan Politik', 4, 'kesbangpol@pinrangkab.go.id', '$2y$10$mujtI8k7.e6r2OOxHihziuks.QTRkBeIiJ4cXpV3knOt5foCi8JGm', 'hYEojlJWZi6Ou9tXRqRELsKWIhhDKvCjQ1s5LR7uVse4ToFvYJHz8aFxsY33', NULL, NULL),
(5, 'Badan Keuangan Daerah', 5, 'keuangan@pinrangkab.go.id', '$2y$10$0Sowgkwy8uM3urgjWiwGzej7VKy9agK6gNsHoZfxOUhQFl.3h9g6e', 'ESt4rvYpkAsOrmQdD6RSVQ1DV1bEa1NCxLoqjAMHMGC5XmV0mE2xeKpKqEdY', NULL, NULL),
(6, 'Badan Penanggulangan Bencana Daerah', 6, 'bpbd@pinrangkab.go.id', '$2y$10$/.lEqbYaVYzfFchJjoaRJ.q4/0.M9jLIDitc2JRYxW49.ifGuv5DC', 'ml5bj4Q5gMAnqOMkpKt6BaethfUEDDqaPJGNdHmuZz7zCBmUsm8GQTBNZPAw', NULL, NULL),
(7, 'Badan Perencanaan Pembangunan Daerah', 7, 'bappeda@pinrangkab.go.id', '$2y$10$AhDwfhH33HBftevFpCP5Ze11H8yuui1oNtSgODBfytDPfFZfG8gSS', '1', NULL, NULL),
(8, 'Dinas Kependudukan dan Pecatatan Sipil', 8, 'dukcapil@pinrangkab.go.id', '$2y$10$VhKSdikAQ7EG0I8.NuBPPeLhlGYUx67xnLge/Oa9syNYu3Ut3dvoq', 'iX4ubhz7PilRBKRhWcIXJ1i5g9BD9NudMfmuxvWhw0M1No8o5royTiZk9iD6', NULL, NULL),
(9, 'Dinas Ketahanan Pangan', 9, 'pangan@pinrangkab.go.id', '$2y$10$E8J7SaHT3MsxFmSXy8YbAO/lBG9FBKnj7v.23BDb5Lz3oRPeI3V9K', '1', NULL, NULL),
(10, 'Dinas Komunikasi dan Informatika', 10, 'kominfo@pinrangkab.go.id', '$2y$10$qQESlPUXlBn.aWhqDGSYeO/7jpCVWzDMeXL7nafKhffosiY.KC46u', 'NQhrBCZTafPe7oDoUmhuyKKTfwA3hKQxtleB4HC1tcmqZUGjTCNBzkQWDuok', NULL, NULL),
(11, 'Dinas Koperasi, Usaha Kecil dan Menengah', 11, 'koperasi@pinrangkab.go.id', '$2y$10$LCci2iN7t/RwVd71NTJP.eGs1iS8FuLFlD1jXWi3wx5wDKvEtRpHq', 'TEvOmOXC5ExbDjdsYpuPvLhpqSyQpA41ilFTyW81JOxl3cSy87iLU81Ko1db', NULL, NULL),
(12, 'Dinas Lingkungan Hidup', 12, 'dlh@pinrangkab.go.id', '$2y$10$2ZpMRptvuYB4De7plMYhl.H9qCy1Bg.BeKP/jH2Umrn35.ixV3CWa', 'ZcBPLoLo0csXfAf709iU5x6VpU5jG12KB8KKxM1gM9fr89ue6zlGHCfqjDyh', NULL, NULL),
(13, 'Dinas Pariwisata, Pemuda dan Olahraga', 13, 'paripora@pinrangkab.go.id', '$2y$10$KGJ7piLDA8r/V/4ggkrYduywdf0G9TKi6QHejaac622ZEGsKSvErq', 'PBaxGchyguy1AhuMO5k6E1neqF4PnsA2a68dHNu00uEhM9tiUsoYObEOJHmi', NULL, NULL),
(14, 'Dinas Pekerjaan Umum dan Perumahan Rakyat', 14, 'pupr@pinrangkab.go.id', '$2y$10$kHY4F.J5l3Ci3zlThoetMOKjkR8Gw74jk5riB6cSWGddzBHrM3KPG', 'Sx6W1Kh4WCl6DHqzKdBu9Je07UdllAzuIno3alFr1I5xUcw0oPUdAOJSE5XE', NULL, NULL),
(15, 'Dinas Pemberdayaan Masyarakat dan Desa', 15, 'pmd@pinrangkab.go.id', '$2y$10$.uF/tlBL3NPPAkZ8m66tH.G91j9EZHP0mlTZEZzkFAN0NJlquqtgm', '8uNxCiW8gEUeDjWeCpkNoroJ03Cjzy5bLcz6frxp3zCfxULZosKTcL3JaJjE', NULL, NULL),
(16, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', 16, 'pmptsp@pinrangkab.go.id', '$2y$10$FznOqLpb4Cqc3spKGydiE.hNfma0sv2XbKE/cioy7Wuoe4/QWh2WW', 'zsPqEDUtaH623vbEFkuB4MJqkq5vOCT5LZvtprzrxTfPSswnhgnWcEbX7znS', NULL, NULL),
(17, 'Dinas Pengelolaan Sumber Daya Air', 17, 'psda@pinrangkab.go.id', '$2y$10$eitwMUexWkDbnYu.FN.k2eikPB8tzTqXpVss1oDL6f8CwbEm0GRVq', 'C7wH8j86r9xvtcOgRSpLKSw3clcS8eT77sN4bmxleVYTBwDSyVggix5nSAME', NULL, NULL),
(18, 'Dinas Pengendalian Penduduk, Keluarga Berencana, Pemberdayaan Perempuan dan Perlindungan Anak', 18, 'ppkb@pinrangkab.go.id', '$2y$10$TTfaRBnEbpY.RjEUhn8MM.thYddBNWeCbNtQIxIl0OMnFH3wXBHX6', 'BQfHT8ViiM1enA9jpJifBMlwUmZtWK5VkWFzHDTaeMk4d37L3ZOTAxRcqwpx', NULL, NULL),
(19, 'Dinas Perhubungan', 19, 'dishub@pinrangkab.go.id', '$2y$10$2YCuoE3l8mEAOEdlj.01B.Q1Ov1sZiUepgyZtRTx.Dc9KVRiRQOH6', 'URFJBBWWC01kuTE77rVXMtntpogSrJI2NJ0vwjTodi3pqINRHR5O0CCLzihN', NULL, NULL),
(20, 'Dinas Perikanan', 20, 'perikanan@pinrangkab.go.id', '$2y$10$dRyyP6mfhNx4BSuO4.RUtebuATIHhVJ6o9nsvzvqcV71wFz85VEJa', '8EHPdC4d7hwgMtCLHPHTpObKTdUhdIUrz2OCz04k08v4hv6kjDljRGhDIXjR', NULL, NULL),
(21, 'Dinas Perindustrian, Perdagangan, Energi dan Sumber Daya Mineral', 21, 'disperindag@pinrangkab.go.id', '$2y$10$1QJlF/Kzeaeaoq8nf6JIcuMf8lDJhOhgsPYf4PhcMFkiXJ6tkA.Q2', 'JHm2z1qJMgRJ3BgeyY9Dq3q3unuryW1BTEfZip9Wz2jvaWXphJjdhmY5srjX', NULL, NULL),
(22, 'Dinas Perpustakaan dan Kearsipan', 22, 'perpusarsip@pinrangkab.go.id', '$2y$10$0XWHae6jyVesMhZJUVmtIeM65Gk4UUxmEeioU6B8THM1ZUuNCCYpG', 'ca1pmsQDbXrKHy3npyuSHK0x313xp2AmBwfRsg678MNMWx04kQlzdINSUvXz', NULL, NULL),
(23, 'Dinas Pertanian dan Hortikultura', 23, 'pertanian@pinrangkab.go.id', '$2y$10$AqVXsayBmwcjgZKAzMd40uljHxw5H6QFG34eM1.M2JshAQmzrkeAC', 'oTSh0CGBto6hIxdg9xAavGHVjFU7xORJGOX8w761uhx1JiMrpOOK7kCXP4NN', NULL, NULL),
(24, 'Dinas Peternakan dan Perkebunan', 24, 'peternakan@pinrangkab.go.id', '$2y$10$z8m6AkkVu/QcXuZ85rCABOn4JRXv5OayXSAZDTOh6I/QuLq2zOr1e', '6mn2VEJQTHc99I2AoYtPqJr9L5zqm1HbK4TT8U8aYGIQ4Altfug4tAc6o16I', NULL, NULL),
(25, 'Dinas Sosial', 25, 'dinsos@pinrangkab.go.id', '$2y$10$84S3psgF6PVksMw3bM0gwOf8SU898ku0DzLcGJz1EKxe3LTsBpbf.', 'gSKkYuRLmPlWY1VB8XwTR9vQT5TLokzQb59rEDG9WfcrTbKRGBeotJ5Qnbct', NULL, NULL),
(26, 'Dinas Tenaga Kerja dan Transmigrasi', 26, 'nakertrans@pinrangkab.go.id', '$2y$10$GrHW5bt39jbMGAXhxrAUT.lLggR8exf52KrkRCCHm0HI1SeX.g2aK', '4KJZUHuZ6lUvAcrFOq5bRUN5FH9Id1khGzOvVxt5Sq4y0HGF6RgBP8pCAafH', NULL, NULL),
(27, 'Inspektorat', 27, 'inspektorat@pinrangkab.go.id', '$2y$10$FZ58Sa3pEPphfyh6pVj1lO0Z2IXi53DZZo7rBGaAdDIcu32u.DEja', '1', NULL, NULL),
(28, 'Kecamatan Batulappa', 28, 'batulappa@pinrangkab.go.id', '$2y$10$P6c9egoAKXjECM7gz7WY7Oraw33TLKFV..pIdo1Jqwju6vjYmrIjG', '1', NULL, NULL),
(29, 'Kecamatan Cempa', 29, 'cempa@pinrangkab.go.id', '$2y$10$ppaFDPYDNLzcOVI5ct/aFuYjjQu7N9rKRRaZMJ/RNaRdidcc82DYS', '1', NULL, NULL),
(30, 'Kecamatan Duampanua', 30, 'duampanua@pinrangkab.go.id', '$2y$10$y.oCnCNq/y5ETjJq.9n9buvY.WuCgT0DuW6JzxK0aZivmh4hiKXeu', '1', NULL, NULL),
(31, 'Kecamatan Lanrisang', 31, 'lanrisang@pinrangkab.go.id', '$2y$10$4mBdyiQOdfrd66oOtT0XE.dLpA9VYPJgDL.ORaPlKFPbR4/btrjf.', '1', NULL, NULL),
(32, 'Kecamatan Lembang', 32, 'lembang@pinrangkab.go.id', '$2y$10$Dalp8RHzYAZd1IdUel1WcOJNgNXE/YC.12jsvJcGbNPM8GI.igY2G', '1', NULL, NULL),
(33, 'Kecamatan Mattiro Bulu', 33, 'mattirobulu@pinrangkab.go.id', '$2y$10$9GQ2ZqWCFi66zCZSC6ciDeLtbyVZhybDKzig5FFBedTMGGOXC9se2', '1', NULL, NULL),
(34, 'Kecamatan Mattiro Sompe', 34, 'mattirosompe@pinrangkab.go.id', '$2y$10$esa6QRzYMFUDEJbSja8MpunKHuhnJbidcRxmWHG76hb9h7ptVRR2q', '1', NULL, NULL),
(35, 'Kecamatan Paleteang', 35, 'paleteang@pinrangkab.go.id', '$2y$10$UvwfQeicE17vmyFNftUf.eXcRnehUOA7IOAoY8Kjt/yEWWABq3JyG', '1', NULL, NULL),
(36, 'Kecamatan Patampanua', 36, 'patampanua@pinrangkab.go.id', '$2y$10$tBL8u36IR11R2MJJCoGrleNwwVytFHUXIVT6j32cB0I5ntgN0p0gC', '1', NULL, NULL),
(37, 'Kecamatan Suppa', 37, 'suppa@pinrangkab.go.id', '$2y$10$iUDiX092gh9XbeVWc466TeSBZBOxjhIIUujHJbf0CYn.BPobWG6eK', '1', NULL, NULL),
(38, 'Kecamatan Tiroang', 38, 'tiroang@pinrangkab.go.id', '$2y$10$tEADk1vhbDVYaKxMiFXQ5uZaKoppQo0CYtMoUP6/peY.taZCPcCLK', '1', NULL, NULL),
(39, 'Kecamatan Watang Sawitto', 39, 'watangsawitto@pinrangkab.go.id', '$2y$10$1R7suqcVPqLjvV0VSATYnuzUHt2VxfNla7QH8C/J5vpT2HfXMjweG', '1', NULL, NULL),
(40, 'Rumah Sakit Umum Lasinrang', 40, 'rsul@pinrangkab.go.id', '$2y$10$QKQSHwU6wA2B5FdVrJUE/O624rTk9ncTlFAN8mCA/BnHlhN8P2s6m', '1', NULL, NULL),
(41, 'Rumah Sakit Pratama Bungi', 41, 'rspb@pinrangkab.go.id', '$2y$10$iD9A5wupzAA46Qy99Xr40.gq3BnnxFF5D53HGYK599mEGyang26QK', '1', NULL, NULL),
(42, 'Satuan Polisi Pamong Praja', 42, 'satpol@pinrangkab.go.id', '$2y$10$QpJqypp5ao8C7Up3M9bbtux9/IkS7ZgzMs8oad/TOU.su7AXl4.0O', 'AhlBZSAAp8mDWEeA6xgmmF9V7Cil9mG8CEiEeA7MZEUjxSAAEwUcVAcLoxvg', NULL, NULL),
(43, 'Sekretariat Daerah', 43, 'setda@pinrangkab.go.id', '$2y$10$KRyx7aqGiCunPsTN3iCzeunrB6hHKZmnGBA.pyY7FVRMZsnzuEA2e', '1', NULL, NULL),
(44, 'Sekretariat Dewan Pengurus KORPRI', 44, 'korpri@pinrangkab.go.id', '$2y$10$Lf3ftw4q4RIekf1yh31QSud3hDw0M5ke653C2DCvRbd3YPbbx6TpC', '1', NULL, NULL),
(45, 'Sekretariat Dewan Perwakilan Rakyat Daerah', 45, 'sekwan@pinrangkab.go.id', '$2y$10$iFLiKLrQWpfDRBu2LTOjEu7S.vpHTyDE1TqRuE83abDLplbdCXwPq', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `walidata`
--

CREATE TABLE `walidata` (
  `id` int(10) UNSIGNED NOT NULL,
  `skpd_id` int(11) NOT NULL,
  `nmaData` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_view` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `walidata`
--

INSERT INTO `walidata` (`id`, `skpd_id`, `nmaData`, `kategori_id`, `keterangan`, `link_view`, `link_admin`, `tag`, `view_count`, `created_at`, `updated_at`) VALUES
(1, 2, 'Kondisi Bangunan SD dan Sederajat', 1, 'Gedung Sekolah memiliki fungsi sebagai tempat berinteraksinya antara siswa dan guru dalam proses kegiatan belajar mengajar.', '/pendidikan/kondisiSD/view', '/pendidikan/kondisiSD', 'Kondisi Bangunan SD dan Sederajat', NULL, NULL, '2018-07-19 21:08:07'),
(2, 2, 'Kondisi Bangunan SMP Sederajat', 1, 'Kondisi Bangunan SMP Sederajat', '/pendidikan/kondisiSMP/view', '/pendidikan/kondisiSMP', 'Kondisi Bangunan SMP Sederajat', NULL, NULL, NULL),
(3, 2, 'Kondisi Bangunan TK Sederajat', 1, 'Kondisi Bangunan TK Sederajat', '/pendidikan/kondisiTK/view', '/pendidikan/kondisiTK', 'Kondisi Bangunan TK Sederajat', NULL, NULL, NULL),
(4, 2, 'Jumlah Siswa Taman Kanak-kanak', 3, 'Jumlah Siswa Taman Kanak-kanak', '/pendidikan/siswaTK/view', '/pendidikan/siswaTK', 'Jumlah Siswa Taman Kanak-kanak', NULL, NULL, NULL),
(5, 2, 'Jumlah Siswa Sekolah Dasar dan Sederajat', 3, 'Jumlah Siswa Sekolah Dasar dan Sederajat', '/pendidikan/siswaSD/view', '/pendidikan/siswaSD', 'Jumlah Siswa Sekolah Dasar dan Sederajat', NULL, NULL, NULL),
(6, 2, 'Jumlah Siswa Sekolah Menengah Pertama dan Sederajat', 3, 'Jumlah Siswa Sekolah Menengah Pertama dan Sederajat', '/pendidikan/siswaSMP/view', '/pendidikan/siswaSMP', 'Jumlah Siswa Sekolah Menengah Pertama dan Sederajat', NULL, NULL, NULL),
(7, 2, 'Jumlah Guru Berstatus Pegawai Negeri Sipil (PNS)', 3, 'Jumlah Guru Berstatus Pegawai Negeri Sipil (PNS)', '/pendidikan/guruPNS/view', '/pendidikan/guruPNS', 'Jumlah Guru Berstatus Pegawai Negeri Sipil (PNS)', NULL, NULL, NULL),
(8, 2, 'Jumlah Guru Berstatus Honorer', 3, 'Jumlah Guru Berstatus Honorer', '/pendidikan/guruHonor/view', '/pendidikan/guruHonor', 'Jumlah Guru Berstatus Honorer', NULL, NULL, NULL),
(9, 2, 'Jumlah Guru Bersertifikasi', 3, 'Jumlah Guru Bersertifikasi', '/pendidikan/guruSertifikat/view', '/pendidikan/guruSertifikat', 'Jumlah Guru Bersertifikasi', NULL, NULL, NULL),
(10, 8, 'Data Jumlah Penduduk (berdasarkan jenis kelamin)', 3, 'Data Jumlah Penduduk (berdasarkan jenis kelamin)', '/kependudukan/penduduk/view', '/kependudukan/penduduk', 'Data Jumlah Penduduk (berdasarkan jenis kelamin)', NULL, NULL, NULL),
(11, 8, 'Data Kependudukan (Kartu Keluarga)', 3, 'Data Kependudukan (Kartu Keluarga)', '/kependudukan/kartukeluarga/view', '/kependudukan/kartukeluarga', 'Data Kependudukan (Kartu Keluarga)', NULL, NULL, NULL),
(12, 8, 'Data Kependudukan (Kelahiran/Kematian)', 3, 'Data Kependudukan (Kelahiran/Kematian)', '/kependudukan/kelahiran/view', '/kependudukan/kelahiran', 'Data Kependudukan (Kelahiran/Kematian)', NULL, NULL, NULL),
(13, 8, 'Data Kependudukan (Perkawinan/Perceraian)', 3, 'Data Kependudukan (Perkawinan/Perceraian)', '/kependudukan/kawin/view', '/kependudukan/kawin', 'Data Kependudukan (Perkawinan/Perceraian)', NULL, NULL, NULL),
(14, 1, 'Data 10 Penyakit Terbesar Faskes TK.I', 3, 'Data 10 Penyakit Terbesar Faskes TK.I', '/kesehatan/penyakit10/view', '/kesehatan/penyakit10', 'Data 10 Penyakit Terbesar Faskes TK.I', NULL, NULL, NULL),
(15, 1, 'Data Jaminan Kesehatan Penduduk', 3, 'Data Jaminan Kesehatan Penduduk', '/kesehatan/jamkes/view', '/kesehatan/jamkes', 'Data Jaminan Kesehatan Penduduk', NULL, NULL, NULL),
(16, 1, 'Data Kasus Gizi Buruk Mendapat Perawatan', 3, 'Data Kasus Gizi Buruk Mendapat Perawatan', '/kesehatan/giziburuk/view', '/kesehatan/giziburuk', 'Data Kasus Gizi Buruk Mendapat Perawatan', NULL, NULL, NULL),
(17, 17, 'Data Luas Area Persawahan', 2, 'Data Luas Area Persawahan', '/psda/luassawah/view', '/psda/luassawah', 'Data Luas Area Persawahan', NULL, NULL, NULL),
(18, 17, 'Data Panjang Saluran Irigasi', 1, 'Data Panjang Saluran Irigasi', '/psda/irigasi/view', '/psda/irigasi', 'Data Panjang Saluran Irigasi', NULL, NULL, NULL),
(19, 18, 'Data Pencapaian Peserta KB Aktif (CU)', 3, 'Data Pencapaian Peserta KB Aktif (CU)', '/ppkb/kbaktif/view', '/ppkb/kbaktif', 'Data Pencapaian Peserta KB Aktif (CU)', NULL, NULL, NULL),
(20, 11, 'Data Jumlah Usaha Kecil Mikro dan Menengah', 2, 'Data Jumlah Usaha Kecil Mikro dan Menengah', '/koperasi/umkm/view', '/koperasi/umkm', 'Data Jumlah Usaha Kecil Mikro dan Menengah', NULL, NULL, NULL),
(21, 23, 'Data Luas Area Persawahan', 2, 'Data Luas Area Persawahan', '/pertanian/sawah/view', '/pertanian/sawah', 'Data Luas Area Persawahan', NULL, NULL, NULL),
(22, 23, 'Data Komoditi Tanaman Pangan (Padi)', 2, 'Data Komoditi Tanaman Pangan  (Padi)', '/pertanian/padi/view', '/pertanian/padi', 'Data Komoditi Tanaman Pangan (Padi)', NULL, NULL, '2018-07-18 17:22:42'),
(23, 23, 'Data Komoditi Tanaman Pangan (Jagung)', 2, 'Data Komoditi Tanaman Pangan (Jagung)', '/pertanian/jagung/view', '/pertanian/jagung', 'Data Komoditi Tanaman Pangan (Jagung)', NULL, NULL, NULL),
(24, 23, 'Data Komoditi Tanaman Pangan (Kedelai)', 2, 'Data Komoditi Tanaman Pangan (Kedelai)', '/pertanian/kedelai/view', '/pertanian/kedelai', 'Data Komoditi Tanaman Pangan (Kedelai)', NULL, NULL, NULL),
(25, 23, 'Data Komoditi Tanaman Pangan (Kacang tanah)', 2, 'Data Komoditi Tanaman Pangan (Kacang tanah)', '/pertanian/kacangtanah/view', '/pertanian/kacangtanah', 'Data Komoditi Tanaman Pangan (Kacang tanah)', NULL, NULL, '2018-07-25 17:48:01'),
(26, 23, 'Data Komoditi Tanaman Pangan (Kacang hijau)', 2, 'Data Komoditi Tanaman Pangan (Kacang hijau)', '/pertanian/kacanghijau/view', '/pertanian/kacanghijau', 'Data Komoditi Tanaman Pangan (Kacang hijau)', NULL, NULL, NULL),
(27, 23, 'Data Komoditi Tanaman Pangan (Ubi kayu)', 2, 'Data Komoditi Tanaman Pangan (Ubi kayu)', '/pertanian/ubikayu/view', '/pertanian/ubikayu', 'Data Komoditi Tanaman Pangan (Ubi kayu)', NULL, NULL, NULL),
(28, 23, 'Data Komoditi Tanaman Pangan (Ubi jalar)', 2, 'Data Komoditi Tanaman Pangan (Ubi jalar)', '/pertanian/ubijalar/view', '/pertanian/ubijalar', 'Data Komoditi Tanaman Pangan (Ubi jalar)', NULL, NULL, NULL),
(29, 20, 'Data Jumlah Nelayan dan Petani Ikan', 2, 'Data Jumlah Nelayan dan Petani Ikan', '/perikanan/nelayan/view', '/perikanan/nelayan', 'Data Jumlah Nelayan dan Petani Ikan', NULL, NULL, NULL),
(30, 20, 'Data Jumlah Armada Penangkapan Ikan', 2, 'Data Jumlah Armada Penangkapan Ikan', '/perikanan/armada/view', '/perikanan/armada', 'Data Jumlah Armada Penangkapan Ikan', NULL, NULL, NULL),
(31, 20, 'Data Luas Usaha Budidaya Ikan', 2, 'Data Luas Usaha Budidaya Ikan', '/perikanan/budidaya/view', '/perikanan/budidaya', 'Data Luas Usaha Budidaya Ikan', NULL, NULL, NULL),
(32, 20, 'Data Produksi Perikanan', 2, 'Data Produksi Perikanan', '/perikanan/produksiikan/view', '/perikanan/produksiikan', 'Data Produksi Perikanan', NULL, NULL, NULL),
(33, 20, 'Data Produksi Ikan Asin/Olahan', 2, 'Data Produksi Ikan Asin/Olahan', '/perikanan/ikanasin/view', '/perikanan/ikanasin', 'Data Produksi Ikan Asin/Olahan', NULL, NULL, NULL),
(34, 20, 'Data Produksi Ikan Segar', 2, 'Data Produksi Ikan Segar', '/perikanan/ikansegar/view', '/perikanan/ikansegar', 'Data Produksi Ikan Segar', NULL, NULL, NULL),
(35, 24, 'Data Populasi Ternak (Kerbau)', 2, 'Data Populasi Ternak (Kerbau)', '/peternakan/ternakKerbau/view', '/peternakan/ternakKerbau', 'Data Populasi Ternak (Kerbau)', NULL, NULL, NULL),
(36, 24, 'Data Populasi Ternak (Kuda)', 2, 'Data Populasi Ternak (Kuda)', '/peternakan/ternakKuda/view', '/peternakan/ternakKuda', 'Data Populasi Ternak (Kuda)', NULL, NULL, NULL),
(37, 24, 'Data Populasi Ternak (Sapi Potong)', 2, 'Data Populasi Ternak (Sapi Potong)', '/peternakan/ternakSapipotong/view', '/peternakan/ternakSapipotong', 'Data Populasi Ternak (Sapi Potong)', NULL, NULL, NULL),
(38, 24, 'Data Populasi Ternak (Sapi Perah)', 2, 'Data Populasi Ternak (Sapi Perah)', '/peternakan/ternakSapiperah/view', '/peternakan/ternakSapiperah', 'Data Populasi Ternak (Sapi Perah)', NULL, NULL, NULL),
(39, 24, 'Data Populasi Ternak (Babi)', 2, 'Data Populasi Ternak (Babi)', '/peternakan/ternakBabi/view', '/peternakan/ternakBabi', 'Data Populasi Ternak (Babi)', NULL, NULL, NULL),
(40, 24, 'Data Populasi Ternak (Domba)', 2, 'Data Populasi Ternak (Domba)', '/peternakan/ternakDomba/view', '/peternakan/ternakDomba', 'Data Populasi Ternak (Domba)', NULL, NULL, NULL),
(41, 24, 'Data Populasi Ternak (Kambing)', 2, 'Data Populasi Ternak (Kambing)', '/peternakan/ternakKambing/view', '/peternakan/ternakKambing', 'Data Populasi Ternak (Kambing)', NULL, NULL, NULL),
(42, 24, 'Data Populasi Ternak (Ayam Buras)', 2, 'Data Populasi Ternak (Ayam Buras)', '/peternakan/ternakAyamburas/view', '/peternakan/ternakAyamburas', 'Data Populasi Ternak (Ayam Buras)', NULL, NULL, NULL),
(43, 24, 'Data Populasi Ternak (Ayam Ras Pedaging)', 2, 'Data Populasi Ternak (Ayam Ras Pedaging)', '/peternakan/ternakAyamraspedaging/view', '/peternakan/ternakAyamraspedaging', 'Data Populasi Ternak (Ayam Ras Pedaging)', NULL, NULL, NULL),
(44, 24, 'Data Populasi Ternak (Ayam Ras Petelur)', 2, 'Data Populasi Ternak (Ayam Ras Petelur)', '/peternakan/ternakAyamraspetelur/view', '/peternakan/ternakAyamraspetelur', 'Data Populasi Ternak (Ayam Ras Petelur)', NULL, NULL, NULL),
(45, 24, 'Data Populasi Ternak (Itik)', 2, 'Data Populasi Ternak (Itik)', '/peternakan/ternakItik/view', '/peternakan/ternakItik', 'Data Populasi Ternak (Itik)', NULL, NULL, NULL),
(46, 24, 'Data Produktivitas dan Areal Pertanian (Kelapa Dalam)', 2, 'Data Produktivitas dan Areal Pertanian (Kelapa Dalam)', '/perkebunan/kebunKelapadalam/view', '/perkebunan/kebunKelapadalam', 'Data Produktivitas dan Areal Pertanian (Kelapa Dalam)', NULL, NULL, NULL),
(47, 24, 'Data Produktivitas dan Areal Pertanian (Kelapa Hybrida)', 2, 'Data Produktivitas dan Areal Pertanian (Kelapa Hybrida)', '/perkebunan/kebunKelapahybrida/view', '/perkebunan/kebunKelapahybrida', 'Data Produktivitas dan Areal Pertanian (Kelapa Hybrida)', NULL, NULL, NULL),
(48, 24, 'Data Produktivitas dan Areal Pertanian (Kakao)', 2, 'Data Produktivitas dan Areal Pertanian (Kakao)', '/perkebunan/kebunKakao/view', '/perkebunan/kebunKakao', 'Data Produktivitas dan Areal Pertanian (Kakao)', NULL, NULL, NULL),
(49, 24, 'Data Produktivitas dan Areal Pertanian (Kopi Robusta)', 2, 'Data Produktivitas dan Areal Pertanian (Kopi Robusta)', '/perkebunan/kebunKopirobusta/view', '/perkebunan/kebunKopirobusta', 'Data Produktivitas dan Areal Pertanian (Kopi Robusta)', NULL, NULL, NULL),
(50, 24, 'Data Produktivitas dan Areal Pertanian (Kopi Arabika)', 2, 'Data Produktivitas dan Areal Pertanian (Kopi Arabika)', '/perkebunan/kebunKopiarabika/view', '/perkebunan/kebunKopiarabika', 'Data Produktivitas dan Areal Pertanian (Kopi Arabika)', NULL, NULL, NULL),
(51, 24, 'Data Produktivitas dan Areal Pertanian (Jambu Mete)', 2, 'Data Produktivitas dan Areal Pertanian (Jambu Mete)', '/perkebunan/kebunJambumete/view', '/perkebunan/kebunJambumete', 'Data Produktivitas dan Areal Pertanian (Jambu Mete)', NULL, NULL, NULL),
(52, 24, 'Data Produktivitas dan Areal Pertanian (Cengkeh)', 2, 'Data Produktivitas dan Areal Pertanian (Cengkeh)', '/perkebunan/kebunCengkeh/view', '/perkebunan/kebunCengkeh', 'Data Produktivitas dan Areal Pertanian (Cengkeh)', NULL, NULL, NULL),
(53, 24, 'Data Produktivitas dan Areal Pertanian (Lada)', 2, 'Data Produktivitas dan Areal Pertanian (Lada)', '/perkebunan/kebunLada/view', '/perkebunan/kebunLada', 'Data Produktivitas dan Areal Pertanian (Lada)', NULL, NULL, NULL),
(54, 24, 'Data Produktivitas dan Areal Pertanian (Kapuk)', 2, 'Data Produktivitas dan Areal Pertanian (Kapuk)', '/perkebunan/kebunKapuk/view', '/perkebunan/kebunKapuk', 'Data Produktivitas dan Areal Pertanian (Kapuk)', NULL, NULL, NULL),
(55, 24, 'Data Produktivitas dan Areal Pertanian (Panili)', 2, 'Data Produktivitas dan Areal Pertanian (Panili)', '/perkebunan/kebunPanili/view', '/perkebunan/kebunPanili', 'Data Produktivitas dan Areal Pertanian (Panili)', NULL, NULL, NULL),
(56, 24, 'Data Produktivitas dan Areal Pertanian (Aren)', 2, 'Data Produktivitas dan Areal Pertanian (Aren)', '/perkebunan/kebunAren/view', '/perkebunan/kebunAren', 'Data Produktivitas dan Areal Pertanian (Aren)', NULL, NULL, NULL),
(57, 24, 'Data Produktivitas dan Areal Pertanian (Pinang)', 2, 'Data Produktivitas dan Areal Pertanian (Pinang)', '/perkebunan/kebunPinang/view', '/perkebunan/kebunPinang', 'Data Produktivitas dan Areal Pertanian (Pinang)', NULL, NULL, NULL),
(58, 24, 'Data Produktivitas dan Areal Pertanian (Pala)', 2, 'Data Produktivitas dan Areal Pertanian (Pala)', '/perkebunan/kebunPala/view', '/perkebunan/kebunPala', 'Data Produktivitas dan Areal Pertanian (Pala)', NULL, NULL, NULL),
(59, 24, 'Data Produktivitas dan Areal Pertanian (Kelapa Sawit)', 2, 'Data Produktivitas dan Areal Pertanian (Kelapa Sawit)', '/perkebunan/kebunKelapasawit/view', '/perkebunan/kebunKelapasawit', 'Data Produktivitas dan Areal Pertanian (Kelapa Sawit)', NULL, NULL, NULL),
(60, 24, 'Data Produktivitas dan Areal Pertanian (Nilam)', 2, 'Data Produktivitas dan Areal Pertanian (Nilam)', '/perkebunan/kebunNilam/view', '/perkebunan/kebunNilam', 'Data Produktivitas dan Areal Pertanian (Nilam)', NULL, NULL, NULL),
(61, 26, 'Data Transmigrasi', 3, 'Data Transmigrasi', '/nakertrans/transmigrasi/view', '/nakertrans/transmigrasi', 'Data Transmigrasi', NULL, NULL, NULL),
(62, 26, 'Data Pencari Kerja', 3, 'Data Pencari Kerja', '/nakertrans/pencaker/view', '/nakertrans/pencaker', 'Data Pencari Kerja', NULL, NULL, NULL),
(63, 26, 'Data Jumlah PerPerusahaanan dan Tenaga Kerja', 3, 'Data Jumlah PerPerusahaanan dan Tenaga Kerja', '/nakertrans/naker/view', '/nakertrans/naker', 'Data Jumlah PerPerusahaanan dan Tenaga Kerja', NULL, NULL, NULL),
(64, 19, 'Data Jumlah Kecelakaan Lalu Lintas', 3, 'Data Jumlah Kecelakaan Lalu Lintas', '/perhubungan/lakalantas/view', '/perhubungan/lakalantas', 'Data Jumlah Kecelakaan Lalu Lintas', NULL, NULL, NULL),
(65, 19, 'Data Jumlah Kendaraan Uji', 1, 'Data Jumlah Kendaraan Uji', '/perhubungan/ujikendaraan/view', '/perhubungan/ujikendaraan', 'Data Jumlah Kendaraan Uji', NULL, NULL, NULL),
(66, 19, 'Data Fasilitas Perlengkapan Jalan', 2, 'Data Fasilitas Perlengkapan Jalan', '/perhubungan/fasjal/view', '/perhubungan/fasjal', 'Data Fasilitas Perlengkapan Jalan', NULL, NULL, NULL),
(67, 22, 'Data Kunjungan Perpustakaan', 3, 'Data Kunjungan Perpustakaan', '/perpusarsip/kunjungan/view', '/perpusarsip/kunjungan', 'Data Kunjungan Perpustakaan', NULL, NULL, NULL),
(68, 10, 'Data Layanan Telekomunikasi', 1, 'Data Layanan Telekomunikasi', '/kominfo/telekomunikasi/view', '/kominfo/telekomunikasi', 'Data Layanan Telekomunikasi', NULL, '2018-07-06 02:29:15', '2018-07-06 02:29:15'),
(69, 10, 'Data Kantor Pos', 1, 'Data Kantor Pos', '/kominfo/pos/view', '/kominfo/pos', 'Data Kantor Pos', NULL, '2018-07-06 02:30:10', '2018-07-06 02:30:10'),
(70, 13, 'Data Hotel', 2, 'Data Hotel', '/parawisata/hotel/view', '/parawisata/hotel', 'Data Hotel', NULL, '2018-07-06 02:32:05', '2018-07-06 02:32:05'),
(71, 10, 'Data Jangkauan Layanan Internet', 1, 'Data Jangkauan Layanan Internet', '/kominfo/internet/view', '/kominfo/internet', 'Data Jangkauan Layanan Internet', NULL, '2018-07-06 02:32:54', '2018-07-06 02:32:54'),
(72, 14, 'Data Panjang Jalan Kewenangan Kabupaten', 1, 'Data Panjang Jalan Kewenangan Kabupaten', '/pupr/jalan/view', '/pupr/jalan', 'Data Panjang Jalan Kewenangan Kabupaten', NULL, '2018-07-06 02:36:48', '2018-07-06 02:36:48'),
(73, 3, 'Data Pegawai Berdasarkan Jenis Kelamin', 5, 'Data Pegawai Berdasarkan Jenis Kelamin', '/bkd/pegawai/view', '/bkd/pegawai', 'Data Pegawai Berdasarkan Jenis Kelamin', NULL, '2018-07-06 02:38:33', '2018-07-06 02:38:33'),
(74, 3, 'Data Pegawai Berdasarkan Eselon', 5, 'Data Pegawai Berdasarkan Eselon', '/bkd/eselon/view', '/bkd/eselon', 'Data Pegawai Berdasarkan Eselon', NULL, '2018-07-06 02:39:25', '2018-07-06 02:39:25'),
(75, 3, 'Data Pegawai Berdasarkan Golongan', 5, 'Data Pegawai Berdasarkan Golongan', '/bkd/golongan/view', '/bkd/golongan', 'Data Pegawai Berdasarkan Golongan', NULL, '2018-07-06 02:40:08', '2018-07-06 02:40:08'),
(76, 25, 'Data Bencana Alam dan Bencana Sosial', 3, 'Data Bencana Alam dan Bencana Sosial', '/sosial/bencana/view', '/sosial/bencana', 'Data Bencana Alam dan Bencana Sosial', NULL, '2018-07-12 04:03:39', '2018-07-12 04:03:39'),
(77, 25, 'Data Penyandang Masalah Kesejahteraan Sosial', 3, 'Data Penyandang Masalah Kesejahteraan Sosial', '/sosial/masalahsosial/view', '/sosial/masalahsosial', 'Data Penyandang Masalah Kesejahteraan Sosial', NULL, '2018-07-12 04:04:58', '2018-07-12 04:04:58'),
(78, 6, 'Data Kejadian Bencana Alam', 3, 'Data Kejadian Bencana Alam', '/bpbd/bencanaalam/view', '/bpbd/bencanaalam', 'Data Kejadian Bencana Alam', NULL, '2018-07-12 04:10:04', '2018-07-12 04:14:54'),
(79, 11, 'Data Kantor Perbankan', 1, 'Data Kantor Perbankan', '/koperasi/perbankan/view', '/koperasi/perbankan', 'Data Kantor Perbankan', NULL, '2018-07-12 15:57:18', '2018-07-12 15:57:18'),
(80, 42, 'Data Pelanggaran Ketertiban Ketentraman Keindahan - K3', 3, 'Data Pelanggaran Ketertiban Ketentraman Keindahan - K3', '/satpolpp/pelanggaranK3/view', '/satpolpp/pelanggaranK3', 'Data Pelanggaran Ketertiban Ketentraman Keindahan - K3', NULL, '2018-07-17 02:41:19', '2018-07-17 02:41:19'),
(81, 42, 'Data Pertikaian Antar Warga', 3, 'Data Pertikaian Antar Warga', '/satpolpp/pertikaian/view', '/satpolpp/pertikaian', 'Data Pertikaian Antar Warga', NULL, '2018-07-17 02:42:31', '2018-07-17 02:42:31'),
(82, 42, 'Data Korban Pertikaian Antar Warga', 3, 'Data Korban Pertikaian Antar Warga', '/satpolpp/korbanpertikaian/view', '/satpolpp/korbanpertikaian', 'Data Korban Pertikaian Antar Warga', NULL, '2018-07-17 02:43:44', '2018-07-17 02:43:44'),
(83, 42, 'Data Kasus Unjuk Rasa', 3, 'Data Kasus Unjuk Rasa', '/satpolpp/unjukrasa/view', '/satpolpp/unjukrasa', 'Data Kasus Unjuk Rasa', NULL, '2018-07-17 02:44:39', '2018-07-17 02:44:39'),
(84, 42, 'Data Korban Unjuk Rasa', 3, 'Data Korban Unjuk Rasa', '/satpolpp/korbanunjukrasa/view', '/satpolpp/korbanunjukrasa', 'Data Korban Unjuk Rasa', NULL, '2018-07-17 02:45:51', '2018-07-17 02:45:51'),
(85, 42, 'Data Jumlah Aparat Kemanan dan Ketertiban Umum', 3, 'Data Jumlah Aparat Kemanan dan Ketertiban Umum', '/satpolpp/aparatkeamanan/view', '/satpolpp/aparatkeamanan', 'Data Jumlah Aparat Kemanan dan Ketertiban Umum', NULL, '2018-07-17 02:46:41', '2018-07-17 02:46:41'),
(86, 42, 'Data Jumlah Kendaraan Operasional Keamanan dan Ketertiban Umum', 1, 'Data Jumlah Kendaraan Operasional Keamanan dan Ketertiban Umum', '/satpolpp/kendaraanoperasional/view', '/satpolpp/kendaraanoperasional', 'Data Jumlah Kendaraan Operasional Keamanan dan Ketertiban Umum', NULL, '2018-07-17 02:48:08', '2018-07-17 02:48:08'),
(87, 42, 'Data Jumlah Sarana Keamanan dan Ketertiban Umum', 1, 'Data Jumlah Sarana Keamanan dan Ketertiban Umum', '/satpolpp/saranakeamanan/view', '/satpolpp/saranakeamanan', 'Data Jumlah Sarana Keamanan dan Ketertiban Umum', NULL, '2018-07-17 02:49:38', '2018-07-17 02:49:38'),
(88, 11, 'Data Jumlah Koperasi', 2, 'Data Jumlah Koperasi', '/koperasi/koperasi/view', '/koperasi/koperasi', 'Data Jumlah Koperasi', NULL, '2018-07-17 02:50:36', '2018-07-17 02:50:36'),
(89, 3, 'Data Pegawai Berdasarkan Agama', 5, 'Data Pegawai Berdasarkan Agama', '/bkd/pegawaiagama/view', '/bkd/pegawaiagama', 'Data Pegawai Berdasarkan Agama', NULL, '2018-07-17 02:51:28', '2018-07-17 02:51:28'),
(90, 3, 'Data Pegawai Berdasarkan Pendidikan', 5, 'Data Pegawai Berdasarkan Pendidikan', '/bkd/pegawaipendidikan/view', '/bkd/pegawaipendidikan', 'Data Pegawai Berdasarkan Pendidikan', NULL, '2018-07-17 02:52:18', '2018-07-17 02:52:18'),
(91, 12, 'Data Rekomendasi SPPL', 2, 'Data Rekomendasi SPPL', '/lingkungan/sppl/view', '/lingkungan/sppl', 'Data Rekomendasi SPPL', NULL, '2018-07-17 02:53:21', '2018-07-17 02:53:21'),
(92, 4, 'Data Lembaga Swadaya Masyarakat - LSM', 3, 'Data Lembaga Swadaya Masyarakat - LSM', '/kesbangpol/lsm/view', '/kesbangpol/lsm', 'Data Lembaga Swadaya Masyarakat - LSM', NULL, '2018-07-17 02:55:26', '2018-07-17 02:55:26'),
(93, 5, 'Data Anggaran Pendapatan Belanja Daerah', 5, 'Data Anggaran Pendapatan Belanja Daerah', '/bkud/apbd/view', '/bkud/apbd', 'Data Anggaran Pendapatan Belanja Daerah', NULL, '2018-07-17 02:56:25', '2018-07-17 02:56:25'),
(94, 16, 'Data Penerbitan Izin dan Realisasi Retribusi', 2, 'Data Penerbitan Izin dan Realisasi Retribusi', '/pemodal/penerbitanizin/view', '/pemodal/penerbitanizin', 'Data Penerbitan Izin dan Realisasi Retribusi', NULL, '2018-07-17 02:57:44', '2018-07-17 02:57:44'),
(95, 14, 'Data Fasilitas Pengolahan Air Limbah', 1, 'Data Fasilitas Pengolahan Air Limbah', '/pupr/airlimbah/view', '/pupr/airlimbah', 'Data Fasilitas Pengolahan Air Limbah', NULL, '2018-07-19 05:26:49', '2018-07-19 05:26:49'),
(96, 14, 'Data Jumlah Bangunan', 2, 'Data Jumlah Bangunan', '/pupr/bangunan/view', '/pupr/bangunan', 'Data Jumlah Bangunan', NULL, '2018-07-19 05:27:38', '2018-07-19 05:27:38'),
(97, 14, 'Data Panjang Drainase Terhubung Sungai', 1, 'Data Panjang Drainase Terhubung Sungai', '/pupr/drainase/view', '/pupr/drainase', 'Data Panjang Drainase Terhubung Sungai', NULL, '2018-07-19 05:28:33', '2018-07-19 05:28:33'),
(98, 14, 'Data Luas Kawasan Pemukiman', 2, 'Data Luas Kawasan Pemukiman', '/pupr/pemukiman/view', '/pupr/pemukiman', 'Data Luas Kawasan Pemukiman', NULL, '2018-07-19 05:29:17', '2018-07-19 05:29:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `airlimbahdetails`
--
ALTER TABLE `airlimbahdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `airlimbahmasters`
--
ALTER TABLE `airlimbahmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aparatkeamanans`
--
ALTER TABLE `aparatkeamanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `apbds`
--
ALTER TABLE `apbds`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `armadadetails`
--
ALTER TABLE `armadadetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `armadamasters`
--
ALTER TABLE `armadamasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bangunandetails`
--
ALTER TABLE `bangunandetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bangunanmasters`
--
ALTER TABLE `bangunanmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bencanaalamdetails`
--
ALTER TABLE `bencanaalamdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bencanaalammasters`
--
ALTER TABLE `bencanaalammasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bencanadetails`
--
ALTER TABLE `bencanadetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bencanamasters`
--
ALTER TABLE `bencanamasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bencanas`
--
ALTER TABLE `bencanas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bidang_izins`
--
ALTER TABLE `bidang_izins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `budidayadetails`
--
ALTER TABLE `budidayadetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `budidayamasters`
--
ALTER TABLE `budidayamasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_koperasis`
--
ALTER TABLE `daftar_koperasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detailsdrusak`
--
ALTER TABLE `detailsdrusak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_id` (`detail_id`);

--
-- Indeks untuk tabel `drainasedetails`
--
ALTER TABLE `drainasedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `drainasemasters`
--
ALTER TABLE `drainasemasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `eselons`
--
ALTER TABLE `eselons`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fasjals`
--
ALTER TABLE `fasjals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fotokerusakan`
--
ALTER TABLE `fotokerusakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indeks untuk tabel `giziburukdetails`
--
ALTER TABLE `giziburukdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `giziburukmasters`
--
ALTER TABLE `giziburukmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `golongans`
--
ALTER TABLE `golongans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guruhonordetails`
--
ALTER TABLE `guruhonordetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guruhonormasters`
--
ALTER TABLE `guruhonormasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gurupnsdetails`
--
ALTER TABLE `gurupnsdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gurupnsmasters`
--
ALTER TABLE `gurupnsmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gurusertifikatdetails`
--
ALTER TABLE `gurusertifikatdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gurusertifikatmasters`
--
ALTER TABLE `gurusertifikatmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ikanasindetails`
--
ALTER TABLE `ikanasindetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ikanasinmasters`
--
ALTER TABLE `ikanasinmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ikansegardetails`
--
ALTER TABLE `ikansegardetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ikansegarmasters`
--
ALTER TABLE `ikansegarmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `internetdetails`
--
ALTER TABLE `internetdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `internetmasters`
--
ALTER TABLE `internetmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `irigasidetails`
--
ALTER TABLE `irigasidetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `irigasimasters`
--
ALTER TABLE `irigasimasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jagungdetails`
--
ALTER TABLE `jagungdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jagungmasters`
--
ALTER TABLE `jagungmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jalandetails`
--
ALTER TABLE `jalandetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jalanmasters`
--
ALTER TABLE `jalanmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jalans`
--
ALTER TABLE `jalans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jamkesdetails`
--
ALTER TABLE `jamkesdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jamkesmasters`
--
ALTER TABLE `jamkesmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kacanghijaudetails`
--
ALTER TABLE `kacanghijaudetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kacanghijaumasters`
--
ALTER TABLE `kacanghijaumasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kacangtanahdetails`
--
ALTER TABLE `kacangtanahdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kacangtanahmasters`
--
ALTER TABLE `kacangtanahmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kartukeluargadetails`
--
ALTER TABLE `kartukeluargadetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kartukeluargamasters`
--
ALTER TABLE `kartukeluargamasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kawindetails`
--
ALTER TABLE `kawindetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kawinmasters`
--
ALTER TABLE `kawinmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kbaktifdetails`
--
ALTER TABLE `kbaktifdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kbaktifmasters`
--
ALTER TABLE `kbaktifmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_arens`
--
ALTER TABLE `kebun_arens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_cengkehs`
--
ALTER TABLE `kebun_cengkehs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_jambumetes`
--
ALTER TABLE `kebun_jambumetes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_kakaos`
--
ALTER TABLE `kebun_kakaos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_kapuks`
--
ALTER TABLE `kebun_kapuks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_kelapadalams`
--
ALTER TABLE `kebun_kelapadalams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_kelapahybridas`
--
ALTER TABLE `kebun_kelapahybridas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_kelapasawits`
--
ALTER TABLE `kebun_kelapasawits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_kemiris`
--
ALTER TABLE `kebun_kemiris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_kopiarabikas`
--
ALTER TABLE `kebun_kopiarabikas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_kopirobustas`
--
ALTER TABLE `kebun_kopirobustas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_ladas`
--
ALTER TABLE `kebun_ladas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_nilams`
--
ALTER TABLE `kebun_nilams`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_palas`
--
ALTER TABLE `kebun_palas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_panilis`
--
ALTER TABLE `kebun_panilis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kebun_pinangs`
--
ALTER TABLE `kebun_pinangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kedelaidetails`
--
ALTER TABLE `kedelaidetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kedelaimasters`
--
ALTER TABLE `kedelaimasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelahirandetails`
--
ALTER TABLE `kelahirandetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelahiranmasters`
--
ALTER TABLE `kelahiranmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kendaraanoperasionals`
--
ALTER TABLE `kendaraanoperasionals`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisipauddetails`
--
ALTER TABLE `kondisipauddetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisipaudmasters`
--
ALTER TABLE `kondisipaudmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisisddetails`
--
ALTER TABLE `kondisisddetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisisdmasters`
--
ALTER TABLE `kondisisdmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisismpdetails`
--
ALTER TABLE `kondisismpdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisismpmasters`
--
ALTER TABLE `kondisismpmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisitkdetails`
--
ALTER TABLE `kondisitkdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kondisitkmasters`
--
ALTER TABLE `kondisitkmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `koperasidetails`
--
ALTER TABLE `koperasidetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `koperasimasters`
--
ALTER TABLE `koperasimasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `korbanpertikaians`
--
ALTER TABLE `korbanpertikaians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `korbanunjukrasas`
--
ALTER TABLE `korbanunjukrasas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kunjungandetails`
--
ALTER TABLE `kunjungandetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kunjunganmasters`
--
ALTER TABLE `kunjunganmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lakalantas`
--
ALTER TABLE `lakalantas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasiperpustakaans`
--
ALTER TABLE `lokasiperpustakaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lsms`
--
ALTER TABLE `lsms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `luassawahdetails`
--
ALTER TABLE `luassawahdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `luassawahmasters`
--
ALTER TABLE `luassawahmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masalahsosialdetails`
--
ALTER TABLE `masalahsosialdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masalahsosialmasters`
--
ALTER TABLE `masalahsosialmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masalahsosials`
--
ALTER TABLE `masalahsosials`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nakerdetails`
--
ALTER TABLE `nakerdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nakermasters`
--
ALTER TABLE `nakermasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nelayandetails`
--
ALTER TABLE `nelayandetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nelayanmasters`
--
ALTER TABLE `nelayanmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `padidetails`
--
ALTER TABLE `padidetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `padiMaster_id` (`padiMaster_id`);

--
-- Indeks untuk tabel `padimasters`
--
ALTER TABLE `padimasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pegawaiagamas`
--
ALTER TABLE `pegawaiagamas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawaipendidikans`
--
ALTER TABLE `pegawaipendidikans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggarank3`
--
ALTER TABLE `pelanggarank3`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemukimandetails`
--
ALTER TABLE `pemukimandetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pemukimanmasters`
--
ALTER TABLE `pemukimanmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pencakers`
--
ALTER TABLE `pencakers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendudukdetails`
--
ALTER TABLE `pendudukdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendudukmasters`
--
ALTER TABLE `pendudukmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerbitanizindetails`
--
ALTER TABLE `penerbitanizindetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerbitanizinmasters`
--
ALTER TABLE `penerbitanizinmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakit10details`
--
ALTER TABLE `penyakit10details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakit10masters`
--
ALTER TABLE `penyakit10masters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyakits`
--
ALTER TABLE `penyakits`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perbankans`
--
ALTER TABLE `perbankans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pertikaians`
--
ALTER TABLE `pertikaians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posdetails`
--
ALTER TABLE `posdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posmasters`
--
ALTER TABLE `posmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produksiikandetails`
--
ALTER TABLE `produksiikandetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produksiikanmasters`
--
ALTER TABLE `produksiikanmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `saranakeamanans`
--
ALTER TABLE `saranakeamanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sawahdetails`
--
ALTER TABLE `sawahdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sawahmasters`
--
ALTER TABLE `sawahmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswasddetails`
--
ALTER TABLE `siswasddetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswasdmasters`
--
ALTER TABLE `siswasdmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswasmpdetails`
--
ALTER TABLE `siswasmpdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswasmpmasters`
--
ALTER TABLE `siswasmpmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswatkdetails`
--
ALTER TABLE `siswatkdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswatkmasters`
--
ALTER TABLE `siswatkmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sppldetails`
--
ALTER TABLE `sppldetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `spplmasters`
--
ALTER TABLE `spplmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `telekomunikasidetails`
--
ALTER TABLE `telekomunikasidetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `telekomunikasimasters`
--
ALTER TABLE `telekomunikasimasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak_ayamburas`
--
ALTER TABLE `ternak_ayamburas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak_ayamraspedagings`
--
ALTER TABLE `ternak_ayamraspedagings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak_ayamraspetelurs`
--
ALTER TABLE `ternak_ayamraspetelurs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak_babis`
--
ALTER TABLE `ternak_babis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak_dombas`
--
ALTER TABLE `ternak_dombas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak_itiks`
--
ALTER TABLE `ternak_itiks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak_kambings`
--
ALTER TABLE `ternak_kambings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak_kerbaus`
--
ALTER TABLE `ternak_kerbaus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak_kudas`
--
ALTER TABLE `ternak_kudas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak_sapiperahs`
--
ALTER TABLE `ternak_sapiperahs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ternak_sapipotongs`
--
ALTER TABLE `ternak_sapipotongs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transmigrasis`
--
ALTER TABLE `transmigrasis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ubijalardetails`
--
ALTER TABLE `ubijalardetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ubijalarmasters`
--
ALTER TABLE `ubijalarmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ubikayudetails`
--
ALTER TABLE `ubikayudetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ubikayumasters`
--
ALTER TABLE `ubikayumasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ujikendaraans`
--
ALTER TABLE `ujikendaraans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `umkmdetails`
--
ALTER TABLE `umkmdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `umkmmasters`
--
ALTER TABLE `umkmmasters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `unjukrasas`
--
ALTER TABLE `unjukrasas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `uptd_psdas`
--
ALTER TABLE `uptd_psdas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `walidata`
--
ALTER TABLE `walidata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `airlimbahdetails`
--
ALTER TABLE `airlimbahdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `airlimbahmasters`
--
ALTER TABLE `airlimbahmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `aparatkeamanans`
--
ALTER TABLE `aparatkeamanans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `apbds`
--
ALTER TABLE `apbds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `armadadetails`
--
ALTER TABLE `armadadetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `armadamasters`
--
ALTER TABLE `armadamasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bangunandetails`
--
ALTER TABLE `bangunandetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `bangunanmasters`
--
ALTER TABLE `bangunanmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bencanaalamdetails`
--
ALTER TABLE `bencanaalamdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `bencanaalammasters`
--
ALTER TABLE `bencanaalammasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `bencanadetails`
--
ALTER TABLE `bencanadetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `bencanamasters`
--
ALTER TABLE `bencanamasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bencanas`
--
ALTER TABLE `bencanas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `budidayadetails`
--
ALTER TABLE `budidayadetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `budidayamasters`
--
ALTER TABLE `budidayamasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `drainasedetails`
--
ALTER TABLE `drainasedetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `drainasemasters`
--
ALTER TABLE `drainasemasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `eselons`
--
ALTER TABLE `eselons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `fasjals`
--
ALTER TABLE `fasjals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `giziburukdetails`
--
ALTER TABLE `giziburukdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT untuk tabel `giziburukmasters`
--
ALTER TABLE `giziburukmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `golongans`
--
ALTER TABLE `golongans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `gurupnsdetails`
--
ALTER TABLE `gurupnsdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `gurupnsmasters`
--
ALTER TABLE `gurupnsmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `gurusertifikatdetails`
--
ALTER TABLE `gurusertifikatdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `gurusertifikatmasters`
--
ALTER TABLE `gurusertifikatmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ikanasindetails`
--
ALTER TABLE `ikanasindetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `ikanasinmasters`
--
ALTER TABLE `ikanasinmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ikansegardetails`
--
ALTER TABLE `ikansegardetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `ikansegarmasters`
--
ALTER TABLE `ikansegarmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `internetdetails`
--
ALTER TABLE `internetdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `internetmasters`
--
ALTER TABLE `internetmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `irigasidetails`
--
ALTER TABLE `irigasidetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `irigasimasters`
--
ALTER TABLE `irigasimasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jalans`
--
ALTER TABLE `jalans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jamkesdetails`
--
ALTER TABLE `jamkesdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT untuk tabel `jamkesmasters`
--
ALTER TABLE `jamkesmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kacanghijaudetails`
--
ALTER TABLE `kacanghijaudetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `kacanghijaumasters`
--
ALTER TABLE `kacanghijaumasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kacangtanahdetails`
--
ALTER TABLE `kacangtanahdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `kacangtanahmasters`
--
ALTER TABLE `kacangtanahmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kartukeluargadetails`
--
ALTER TABLE `kartukeluargadetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `kartukeluargamasters`
--
ALTER TABLE `kartukeluargamasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kawindetails`
--
ALTER TABLE `kawindetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `kawinmasters`
--
ALTER TABLE `kawinmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kbaktifdetails`
--
ALTER TABLE `kbaktifdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `kbaktifmasters`
--
ALTER TABLE `kbaktifmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kebun_arens`
--
ALTER TABLE `kebun_arens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_cengkehs`
--
ALTER TABLE `kebun_cengkehs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_jambumetes`
--
ALTER TABLE `kebun_jambumetes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_kakaos`
--
ALTER TABLE `kebun_kakaos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_kapuks`
--
ALTER TABLE `kebun_kapuks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_kelapadalams`
--
ALTER TABLE `kebun_kelapadalams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_kelapahybridas`
--
ALTER TABLE `kebun_kelapahybridas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kebun_kelapasawits`
--
ALTER TABLE `kebun_kelapasawits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_kopiarabikas`
--
ALTER TABLE `kebun_kopiarabikas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_kopirobustas`
--
ALTER TABLE `kebun_kopirobustas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_ladas`
--
ALTER TABLE `kebun_ladas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_nilams`
--
ALTER TABLE `kebun_nilams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kebun_palas`
--
ALTER TABLE `kebun_palas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_panilis`
--
ALTER TABLE `kebun_panilis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kebun_pinangs`
--
ALTER TABLE `kebun_pinangs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kedelaidetails`
--
ALTER TABLE `kedelaidetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `kedelaimasters`
--
ALTER TABLE `kedelaimasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kelahirandetails`
--
ALTER TABLE `kelahirandetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kelahiranmasters`
--
ALTER TABLE `kelahiranmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kondisisddetails`
--
ALTER TABLE `kondisisddetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `kondisisdmasters`
--
ALTER TABLE `kondisisdmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kondisismpdetails`
--
ALTER TABLE `kondisismpdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `kondisismpmasters`
--
ALTER TABLE `kondisismpmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kondisitkdetails`
--
ALTER TABLE `kondisitkdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `kondisitkmasters`
--
ALTER TABLE `kondisitkmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `koperasidetails`
--
ALTER TABLE `koperasidetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `koperasimasters`
--
ALTER TABLE `koperasimasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kunjungandetails`
--
ALTER TABLE `kunjungandetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `kunjunganmasters`
--
ALTER TABLE `kunjunganmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `lakalantas`
--
ALTER TABLE `lakalantas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `lokasiperpustakaans`
--
ALTER TABLE `lokasiperpustakaans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `lsms`
--
ALTER TABLE `lsms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `luassawahdetails`
--
ALTER TABLE `luassawahdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `luassawahmasters`
--
ALTER TABLE `luassawahmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `masalahsosialdetails`
--
ALTER TABLE `masalahsosialdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `masalahsosialmasters`
--
ALTER TABLE `masalahsosialmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `nelayandetails`
--
ALTER TABLE `nelayandetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `nelayanmasters`
--
ALTER TABLE `nelayanmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `padidetails`
--
ALTER TABLE `padidetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `padimasters`
--
ALTER TABLE `padimasters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pegawaiagamas`
--
ALTER TABLE `pegawaiagamas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pegawaipendidikans`
--
ALTER TABLE `pegawaipendidikans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pemukimandetails`
--
ALTER TABLE `pemukimandetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `pemukimanmasters`
--
ALTER TABLE `pemukimanmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pendudukdetails`
--
ALTER TABLE `pendudukdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT untuk tabel `pendudukmasters`
--
ALTER TABLE `pendudukmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penerbitanizindetails`
--
ALTER TABLE `penerbitanizindetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT untuk tabel `penerbitanizinmasters`
--
ALTER TABLE `penerbitanizinmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `penyakit10details`
--
ALTER TABLE `penyakit10details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `penyakit10masters`
--
ALTER TABLE `penyakit10masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `perbankans`
--
ALTER TABLE `perbankans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `posdetails`
--
ALTER TABLE `posdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `posmasters`
--
ALTER TABLE `posmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `produksiikandetails`
--
ALTER TABLE `produksiikandetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `produksiikanmasters`
--
ALTER TABLE `produksiikanmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `sawahdetails`
--
ALTER TABLE `sawahdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `sawahmasters`
--
ALTER TABLE `sawahmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswasddetails`
--
ALTER TABLE `siswasddetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `siswasdmasters`
--
ALTER TABLE `siswasdmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswasmpdetails`
--
ALTER TABLE `siswasmpdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `siswasmpmasters`
--
ALTER TABLE `siswasmpmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswatkdetails`
--
ALTER TABLE `siswatkdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `siswatkmasters`
--
ALTER TABLE `siswatkmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sppldetails`
--
ALTER TABLE `sppldetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT untuk tabel `spplmasters`
--
ALTER TABLE `spplmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `telekomunikasidetails`
--
ALTER TABLE `telekomunikasidetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `telekomunikasimasters`
--
ALTER TABLE `telekomunikasimasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ternak_ayamburas`
--
ALTER TABLE `ternak_ayamburas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ternak_ayamraspedagings`
--
ALTER TABLE `ternak_ayamraspedagings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ternak_ayamraspetelurs`
--
ALTER TABLE `ternak_ayamraspetelurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ternak_babis`
--
ALTER TABLE `ternak_babis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ternak_dombas`
--
ALTER TABLE `ternak_dombas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `ternak_itiks`
--
ALTER TABLE `ternak_itiks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ternak_kambings`
--
ALTER TABLE `ternak_kambings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ternak_kerbaus`
--
ALTER TABLE `ternak_kerbaus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ternak_kudas`
--
ALTER TABLE `ternak_kudas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ternak_sapiperahs`
--
ALTER TABLE `ternak_sapiperahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ternak_sapipotongs`
--
ALTER TABLE `ternak_sapipotongs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ubijalardetails`
--
ALTER TABLE `ubijalardetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `ubijalarmasters`
--
ALTER TABLE `ubijalarmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ubikayudetails`
--
ALTER TABLE `ubikayudetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `ubikayumasters`
--
ALTER TABLE `ubikayumasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ujikendaraans`
--
ALTER TABLE `ujikendaraans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `umkmdetails`
--
ALTER TABLE `umkmdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `umkmmasters`
--
ALTER TABLE `umkmmasters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
