-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 09:15 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sas`
--

-- --------------------------------------------------------

--
-- Table structure for table `akuns`
--

CREATE TABLE `akuns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_akun` bigint(20) DEFAULT NULL,
  `saldo` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akuns`
--

INSERT INTO `akuns` (`id`, `name`, `kode`, `kategori`, `sub_akun`, `saldo`, `created_at`, `updated_at`) VALUES
(1, 'Kas', 'bnk-0001', 'Banking', 0, 28481100, '2023-01-21 08:30:03', '2023-01-30 09:15:58'),
(2, 'Bank BCA', 'bnk-0002', 'Banking', 0, 424844015, '2023-01-21 08:30:03', '2023-01-30 05:12:08'),
(3, 'Giro', 'bnk-0003', 'Banking', 0, 10000000, '2023-01-21 08:30:03', '2023-01-21 08:30:03'),
(4, 'Piutang Usaha', '3-019918', 'Akun Piutang', NULL, NULL, '2023-01-23 05:35:56', '2023-01-23 05:35:56'),
(5, 'Hutang Usaha', '3-019917', 'Akun Hutang', NULL, NULL, '2023-01-23 07:55:55', '2023-01-23 07:55:55'),
(6, 'Uang Muka', '3-019919', 'Akun Hutang', NULL, NULL, '2023-01-23 07:59:51', '2023-01-23 07:59:51'),
(7, 'Kartu Kredit BRI', '1-001293', 'Banking', NULL, NULL, '2023-01-23 11:40:24', '2023-01-23 11:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pembelian` datetime NOT NULL,
  `harga_nilai` bigint(20) NOT NULL,
  `qty` bigint(20) NOT NULL,
  `satuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `harga_total` bigint(20) NOT NULL,
  `akun_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `gambar`, `kode`, `tanggal_pembelian`, `harga_nilai`, `qty`, `satuan_id`, `harga_total`, `akun_id`, `created_at`, `updated_at`) VALUES
(1, 'Gedung Kantor', NULL, 'AST/001', '2023-01-08 19:10:15', 212783503, 9, 3, 120333367, NULL, '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(2, 'Mobil Kantor Xpander', NULL, 'AST/002', '2023-01-18 11:38:30', 715429795, 2, 3, 320577593, NULL, '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(3, 'Imac Pro', NULL, 'AST/003', '2023-01-26 19:55:00', 633957286, 8, 3, 371928438, NULL, '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(4, 'Gedung Kantor', NULL, 'AST/001', '2023-01-29 11:49:56', 969396111, 5, 3, 895789068, NULL, '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(5, 'Mobil Kantor Xpander', NULL, 'AST/002', '2023-01-21 10:45:39', 469857844, 8, 3, 384222094, NULL, '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(6, 'Imac Pro', NULL, 'AST/003', '2023-01-23 20:24:52', 223886209, 10, 3, 706238950, NULL, '2023-01-21 08:30:03', '2023-01-21 08:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `biayas`
--

CREATE TABLE `biayas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `piutang` bigint(20) DEFAULT NULL,
  `hutang` bigint(20) DEFAULT NULL,
  `kontak_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_jatuh_tempo` datetime DEFAULT NULL,
  `tanggal_pelunasan` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biayas`
--

INSERT INTO `biayas` (`id`, `kode`, `piutang`, `hutang`, `kontak_id`, `tanggal_transaksi`, `tanggal_jatuh_tempo`, `tanggal_pelunasan`, `created_at`, `updated_at`) VALUES
(1, 'yawb/9832', 9710800, 7984275, 5, '2023-02-02 19:46:41', '2023-01-21 23:36:21', NULL, '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(2, 'viof/2707', 5418335, 5492815, 1, '2023-01-20 00:36:49', '2023-01-21 07:03:46', NULL, '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(3, 'znbv/8837', 3423992, 2589193, 2, '2023-01-22 22:08:15', '2023-02-02 18:29:26', NULL, '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(4, 'wmqt/8265', 2691036, 8392260, 2, '2023-01-13 00:33:10', '2023-01-30 10:21:18', NULL, '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(5, 'jrgn/2573', 8223612, 8611195, 9, '2023-01-16 22:05:47', '2023-01-17 07:24:36', NULL, '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(6, 'zupf/1248', 7431894, 3355536, 10, '2023-01-29 22:35:10', '2023-01-24 00:13:00', NULL, '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(7, 'vdsl/6999', 7592782, 8264960, 10, '2023-01-20 18:08:55', '2023-01-24 18:50:11', NULL, '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(8, 'hpgr/2728', 1955818, 7045100, 6, '2023-02-01 18:54:17', '2023-02-01 20:15:36', NULL, '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(9, 'fndf/3571', 1427577, 4380942, 9, '2023-01-27 01:26:31', '2023-02-18 01:59:11', NULL, '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(10, 'jkfe/0993', 1359925, 5035912, 9, '2023-01-15 02:43:07', '2023-02-04 22:28:34', NULL, '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(11, 'kpnv/9371', 6081195, 7701953, 1, '2023-02-03 19:55:54', '2023-01-21 03:54:38', NULL, '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(12, 'sagc/7320', 6536045, 6575331, 1, '2023-02-01 05:23:34', '2023-02-13 15:04:47', NULL, '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(13, 'orhp/3449', 9983397, 3751194, 9, '2023-01-17 02:28:54', '2023-01-20 00:55:55', NULL, '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(14, 'swab/4548', 9828406, 2554308, 6, '2023-01-11 19:06:31', '2023-01-25 12:52:08', NULL, '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(15, 'aogu/8588', 9940599, 1341009, 5, '2023-01-15 23:13:34', '2023-01-21 18:50:55', NULL, '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(16, 'sony/9197', 9943054, 8238283, 4, '2023-01-17 13:21:11', '2023-02-16 05:18:52', NULL, '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(17, 'INV/09000', 0, 17200000, 6, '2023-01-30 12:10:29', '2023-02-14 12:10:29', NULL, '2023-01-30 05:12:08', '2023-01-30 05:12:08'),
(18, 'INV/00001', 10506300, NULL, 26, '2023-01-30 15:50:40', '2023-02-14 15:50:40', NULL, '2023-01-30 09:10:24', '2023-01-30 09:10:24'),
(19, 'INV/00002', 10100000, NULL, 2, '2023-01-30 16:15:03', '2023-02-06 16:15:03', NULL, '2023-01-30 09:15:58', '2023-01-30 09:15:58'),
(20, 'PI/00001', 3288600, NULL, 1, '2023-01-30 19:50:15', '2023-03-01 19:50:15', NULL, '2023-01-30 12:50:51', '2023-01-30 12:50:51'),
(21, 'PI/00002', 100000, NULL, 2, '2023-01-30 17:23:10', '2023-02-14 17:23:10', NULL, '2023-01-30 13:11:07', '2023-01-30 13:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gudangs`
--

CREATE TABLE `gudangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_jumlah` bigint(20) DEFAULT NULL,
  `total_nilai` bigint(20) DEFAULT NULL,
  `stok_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gudangs`
--

INSERT INTO `gudangs` (`id`, `name`, `kode`, `deskripsi`, `total_jumlah`, `total_nilai`, `stok_id`, `created_at`, `updated_at`) VALUES
(1, 'Gudang Utama', 'G-001', 'penyimpanan utama', NULL, NULL, NULL, '2023-01-23 12:01:04', '2023-01-23 12:01:04');

-- --------------------------------------------------------

--
-- Table structure for table `item_pembelian_pemesanans`
--

CREATE TABLE `item_pembelian_pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembelian_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `satuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_pembelian_pemesanans`
--

INSERT INTO `item_pembelian_pemesanans` (`id`, `produk_id`, `pembelian_id`, `deskripsi`, `qty`, `satuan_id`, `discount`, `harga`, `pajak`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, 1, 1, '0.00', 100000, NULL, 100000, '2023-01-30 10:23:51', '2023-01-30 10:23:51'),
(2, 2, 4, NULL, 2, 2, '30.00', 9000000, NULL, 12600000, '2023-01-30 10:52:33', '2023-01-30 10:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `item_pembelian_penawarans`
--

CREATE TABLE `item_pembelian_penawarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembelian_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `satuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_pembelian_penawarans`
--

INSERT INTO `item_pembelian_penawarans` (`id`, `produk_id`, `pembelian_id`, `deskripsi`, `qty`, `satuan_id`, `discount`, `harga`, `pajak`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, 2, 2, '30.00', 9000000, NULL, 12600000, '2023-01-30 09:45:06', '2023-01-30 09:45:06');

-- --------------------------------------------------------

--
-- Table structure for table `item_pembelian_pengirimen`
--

CREATE TABLE `item_pembelian_pengirimen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembelian_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `satuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_pembelian_pengirimen`
--

INSERT INTO `item_pembelian_pengirimen` (`id`, `produk_id`, `pembelian_id`, `deskripsi`, `qty`, `satuan_id`, `discount`, `harga`, `pajak`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 2, 11, NULL, 2, 2, NULL, 9000000, NULL, 12600000, '2023-01-30 11:15:34', '2023-01-30 11:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `item_pembelian_tagihans`
--

CREATE TABLE `item_pembelian_tagihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembelian_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `satuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_pembelian_tagihans`
--

INSERT INTO `item_pembelian_tagihans` (`id`, `produk_id`, `pembelian_id`, `deskripsi`, `qty`, `satuan_id`, `discount`, `harga`, `pajak`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 4, 1, '13.00', 900000, NULL, 3132000, '2023-01-30 12:50:51', '2023-01-30 12:50:51'),
(2, 1, 2, NULL, 1, 1, '0.00', 100000, NULL, 100000, '2023-01-30 13:11:07', '2023-01-30 13:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `item_penjualan_pemesanans`
--

CREATE TABLE `item_penjualan_pemesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penjualan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `satuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_penjualan_pemesanans`
--

INSERT INTO `item_penjualan_pemesanans` (`id`, `produk_id`, `penjualan_id`, `deskripsi`, `qty`, `satuan_id`, `discount`, `harga`, `pajak`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, 3, 3, '0.00', 5000000, NULL, 15000000, '2023-01-30 08:54:48', '2023-01-30 08:54:48');

-- --------------------------------------------------------

--
-- Table structure for table `item_penjualan_penawarans`
--

CREATE TABLE `item_penjualan_penawarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penjualan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `satuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_penjualan_penawarans`
--

INSERT INTO `item_penjualan_penawarans` (`id`, `produk_id`, `penjualan_id`, `deskripsi`, `qty`, `satuan_id`, `discount`, `harga`, `pajak`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, 3, 3, '0.00', 5000000, NULL, 15000000, '2023-01-30 08:17:48', '2023-01-30 08:17:48');

-- --------------------------------------------------------

--
-- Table structure for table `item_penjualan_pengirimen`
--

CREATE TABLE `item_penjualan_pengirimen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penjualan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `satuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_penjualan_pengirimen`
--

INSERT INTO `item_penjualan_pengirimen` (`id`, `produk_id`, `penjualan_id`, `deskripsi`, `qty`, `satuan_id`, `discount`, `harga`, `pajak`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 3, 8, NULL, 3, 3, NULL, 5000000, NULL, 15000000, '2023-01-30 09:02:24', '2023-01-30 09:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `item_penjualan_tagihans`
--

CREATE TABLE `item_penjualan_tagihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penjualan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `satuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `harga` bigint(20) NOT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `jumlah` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_penjualan_tagihans`
--

INSERT INTO `item_penjualan_tagihans` (`id`, `produk_id`, `penjualan_id`, `deskripsi`, `qty`, `satuan_id`, `discount`, `harga`, `pajak`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, 3, 3, NULL, 5000000, NULL, 15000000, '2023-01-30 09:10:24', '2023-01-30 09:10:24'),
(2, 1, 2, NULL, 1, 3, '0.00', 10000000, NULL, 10000000, '2023-01-30 09:15:58', '2023-01-30 09:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('Administrasi','IT','Finance','Direktur','HRD') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `tipe`, `name`, `biaya_id`, `alamat`, `email`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'Administrasi', 'Dhimas Dwi Cahyo', NULL, 'Jl. Melati No.64 Jatiwaringin Bekasi', 'dhimas@gmail.com', '912388123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kendaraan', '2023-01-23 12:45:28', '2023-01-23 12:45:28'),
(2, 'Laptop', '2023-01-27 00:08:25', '2023-01-27 00:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `kontaks`
--

CREATE TABLE `kontaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('karyawan','vendor','pelanggan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontaks`
--

INSERT INTO `kontaks` (`id`, `tipe`, `name`, `perusahaan`, `alamat`, `email`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'karyawan', 'Fajar Zidan', 'PT. Fajar Senja', 'Komplek BDN Pondok Gede Bekasi', 'Fazid@gmail.com', '08128301291', '2023-01-21 08:30:03', '2023-01-21 08:30:03'),
(2, 'vendor', 'Bagas Raya', 'CV. Raya Abadi', 'Jl. Jembatan 3 Rawalumbu Bekasi', 'Bagasry@gmail.com', '08971624667', '2023-01-21 08:30:03', '2023-01-21 08:30:03'),
(3, 'karyawan', 'Suryo Affandi', 'PT. Angkot Utama', 'Jl. Rambutan Jaha Bekasi', 'Suryo@gmail.com', '0812772316', '2023-01-21 08:30:03', '2023-01-21 08:30:03'),
(4, 'pelanggan', 'Ludy Hambali', 'PT. Gabe Sejahtera', 'Grand Galaxy Bekasi', 'Gabe@gmail.com', '0880127', '2023-01-21 08:30:03', '2023-01-21 08:30:03'),
(5, 'karyawan', 'Reja Pranz', 'PT. Pranz Steel', 'Jl. Wibawa Mukti jatibening Bekasi', 'Pranz@gmail.com', '087726162', '2023-01-21 08:30:03', '2023-01-21 08:30:03'),
(6, 'pelanggan', 'I Made Wahyu', 'CV. IndoTech', 'Jl.Dewata Bali', 'Made@gmail.com', '0872512313', '2023-01-21 08:30:03', '2023-01-21 08:30:03'),
(7, 'vendor', 'Dwi Cahyo Putra', 'PT. Fintec Ojrap', 'Jl. Kejaksaan Kav. Pondok bambu Jakarta', 'Ojrap@gmail.com', '0889126371', '2023-01-21 08:30:03', '2023-01-21 08:30:03'),
(8, 'karyawan', 'Aship Ryando', 'PT. Ando IT', 'Summarecon Bekasi', 'Aship@gmail.com', '0876123772', '2023-01-21 08:30:03', '2023-01-21 08:30:03'),
(9, 'pelanggan', 'Dhimas Atmojo', 'PT. Akselerasi IT', 'Jatiwaringin Bekasi', 'Dhimasdc@gmail.com', '083663267823', '2023-01-21 08:30:03', '2023-01-21 08:30:03'),
(23, 'vendor', 'Fariz Azhari', 'PT. Bulan Purnama', 'Jl. Ratna Cikunir Bekasi', 'Fariz@gmail.com', '09123098376', '2023-01-23 03:38:33', '2023-01-23 03:38:33'),
(24, 'karyawan', 'Fariz Azhari', 'PT. Bulan Purnama', 'jl. melati no 65 cilkunir bekasi', 'fariz@dc.com', '090987213', '2023-01-23 03:41:32', '2023-01-23 03:41:32'),
(25, 'pelanggan', 'Abil Milzam', 'PT. Agrotekno Indonesia', 'Jl. Mawar no.64 Jakarta Timur', 'Abil@gmail.com', '09123712377', '2023-01-23 11:25:07', '2023-01-23 11:25:07'),
(26, 'pelanggan', 'Rendy Putra', 'Kemen. PUPR', 'Jl. patimura no20 keb. baru jakarta selatan 12110', 'Rendy@gmail.com', '099382872821', '2023-01-26 23:49:46', '2023-01-26 23:49:46');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_01_09_104013_create_roles_table', 1),
(7, '2023_01_09_104014_add_roles_fields_to_users_table', 1),
(8, '2023_01_21_091517_create_sessions_table', 1),
(9, '2023_01_16_002913_create_biayas_table', 2),
(10, '2023_01_16_003030_create_pajaks_table', 2),
(11, '2023_01_16_003221_create_kategoris_table', 2),
(12, '2023_01_16_003303_create_satuans_table', 2),
(13, '2023_01_16_003339_create_kontaks_table', 2),
(14, '2023_01_16_003356_create_karyawans_table', 2),
(15, '2023_01_16_003420_create_pengirimen_table', 2),
(16, '2023_01_16_003452_create_akuns_table', 2),
(17, '2023_01_16_003456_create_transaksis_table', 2),
(18, '2023_01_16_003508_create_assets_table', 2),
(19, '2023_01_16_003541_create_pengeluarans_table', 2),
(20, '2023_01_16_003611_create_stoks_table', 2),
(21, '2023_01_16_003616_create_gudangs_table', 2),
(22, '2023_01_16_003617_create_produks_table', 2),
(33, '2023_01_29_000344_create_tags_table', 5),
(34, '2023_01_29_021301_create_termins_table', 6),
(35, '2023_01_30_000333_add_pemesanan_fields_to_pengirimen', 7),
(37, '2023_01_16_033840_create_pembelian__pesanans_table', 9),
(38, '2023_01_16_033731_create_pembelian__tagihans_table', 10),
(61, '2023_01_24_023323_create_item_penjualan_pemesanans_table', 11),
(62, '2023_01_24_023402_create_item_penjualan_pengirimen_table', 11),
(63, '2023_01_24_023422_create_item_penjualan_penawarans_table', 11),
(64, '2023_01_30_141656_create_item_pembelian_tagihans_table', 11),
(65, '2023_01_30_141720_create_item_pembelian_pengirimen_table', 11),
(66, '2023_01_30_141749_create_item_pembelian_penawarans_table', 11),
(67, '2023_01_30_141819_create_item_pembelian_pemesanans_table', 11),
(72, '2023_01_30_150114_create_item_tagihan_penjualans_table', 14),
(73, '2023_01_30_145312_create_item_penjualan_tagihans_table', 15),
(76, '2023_01_16_033958_create_penjualan__penawarans_table', 16),
(77, '2023_01_16_033913_create_pembelian__penawarans_table', 17),
(78, '2023_01_16_034031_create_penjualan__pesanans_table', 18),
(79, '2023_01_16_034101_create_penjualan__tagihans_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `pajaks`
--

CREATE TABLE `pajaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pajaks`
--

INSERT INTO `pajaks` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'PPN', '0.11', '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(2, 'PPH5', '0.05', '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(3, 'PPN', '0.11', '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(4, 'PPH5', '0.05', '2023-01-21 08:30:02', '2023-01-21 08:30:02');

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
-- Table structure for table `pembelian__penawarans`
--

CREATE TABLE `pembelian__penawarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `kadaluarsa` datetime DEFAULT NULL,
  `status` enum('Open','Disetujui','Ditolak','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `biaya_pengiriman` bigint(20) DEFAULT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `total` bigint(20) NOT NULL,
  `termin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian__penawarans`
--

INSERT INTO `pembelian__penawarans` (`id`, `kode`, `kontak_id`, `referensi`, `tags`, `tanggal_transaksi`, `kadaluarsa`, `status`, `sub_total`, `biaya_pengiriman`, `diskon`, `pajak`, `total`, `termin`, `attachment`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'PQ/0001', 3, NULL, NULL, '2023-01-30 16:41:14', '2023-03-31 16:41:14', 'Open', 6300000, 0, 0, 693000, 6993000, '60', NULL, NULL, '2023-01-30 09:41:59', '2023-01-30 09:41:59'),
(2, 'PQ/0001', 3, NULL, NULL, '2023-01-30 16:43:47', '2023-03-01 16:43:47', 'Disetujui', 12600000, 0, 0, 1386000, 13986000, '30', NULL, NULL, '2023-01-30 09:45:05', '2023-01-30 10:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian__pesanans`
--

CREATE TABLE `pembelian__pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_jatuh_tempo` datetime DEFAULT NULL,
  `termin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Open','Selesai','Dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sisa_tagihan` bigint(20) DEFAULT NULL,
  `sub_total` bigint(20) NOT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `biaya_pengiriman` bigint(20) DEFAULT NULL,
  `uang_muka` bigint(20) DEFAULT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `info_pengiriman` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal_pengiriman` datetime DEFAULT NULL,
  `kurir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gudang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian__pesanans`
--

INSERT INTO `pembelian__pesanans` (`id`, `kode`, `kontak_id`, `referensi`, `tags`, `tanggal_transaksi`, `tanggal_jatuh_tempo`, `termin`, `status`, `sisa_tagihan`, `sub_total`, `diskon`, `biaya_pengiriman`, `uang_muka`, `pajak`, `total`, `info_pengiriman`, `tanggal_pengiriman`, `kurir`, `resi`, `gudang_id`, `attachment`, `pesan`, `created_at`, `updated_at`) VALUES
(3, 'SO/00002', 2, NULL, NULL, '2023-01-30 17:23:10', '2023-02-14 17:23:10', '15', 'Dibatalkan', NULL, 100000, 10000, 0, NULL, 11000, 101000, 0, NULL, NULL, NULL, 1, NULL, NULL, '2023-01-30 10:23:51', '2023-01-30 10:40:38'),
(4, 'PO/00002', 3, NULL, NULL, '2023-01-30 17:51:56', '2023-03-01 17:51:56', '30', 'Open', NULL, 12600000, 0, 0, NULL, 1386000, 13986000, 0, NULL, NULL, NULL, 1, NULL, NULL, '2023-01-30 10:52:33', '2023-01-30 10:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian__tagihans`
--

CREATE TABLE `pembelian__tagihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_jatuh_tempo` datetime DEFAULT NULL,
  `status` enum('Lunas','Dibayar Sebagian','Belum Dibayar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sisa_tagihan` bigint(20) DEFAULT NULL,
  `sub_total` bigint(20) NOT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `biaya_pengiriman` bigint(20) DEFAULT NULL,
  `uang_muka` bigint(20) DEFAULT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `termin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_pengiriman` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal_pengiriman` datetime DEFAULT NULL,
  `kurir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gudang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian__tagihans`
--

INSERT INTO `pembelian__tagihans` (`id`, `kode`, `kontak_id`, `referensi`, `tanggal_transaksi`, `tanggal_jatuh_tempo`, `status`, `tags`, `sisa_tagihan`, `sub_total`, `diskon`, `biaya_pengiriman`, `uang_muka`, `pajak`, `total`, `termin`, `info_pengiriman`, `tanggal_pengiriman`, `kurir`, `resi`, `gudang_id`, `attachment`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'PI/00001', 1, NULL, '2023-01-30 19:50:15', '2023-03-01 19:50:15', 'Belum Dibayar', NULL, 3288600, 3132000, 0, 0, 0, 156600, 3288600, '30', 0, NULL, NULL, NULL, 1, NULL, NULL, '2023-01-30 12:50:51', '2023-01-30 12:50:51'),
(2, 'PI/00002', 2, NULL, '2023-01-30 17:23:10', '2023-02-14 17:23:10', 'Belum Dibayar', NULL, 100000, 100000, 0, 0, 0, 0, 100000, '15', 0, NULL, NULL, NULL, 1, NULL, NULL, '2023-01-30 13:11:07', '2023-01-30 13:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluarans`
--

CREATE TABLE `pengeluarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `biaya_id` bigint(20) UNSIGNED DEFAULT NULL,
  `transaksi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kontak_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_jatuh_tempo` datetime DEFAULT NULL,
  `status` enum('Dibayar','Dibayar Sebagian','Lunas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sisa_tagihan` bigint(20) DEFAULT NULL,
  `sub_total` bigint(20) NOT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `total` bigint(20) NOT NULL,
  `termin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akun_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengirimen`
--

CREATE TABLE `pengirimen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('penjualan','pembelian') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pembelian_pemesanan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kontak_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_pengiriman` datetime NOT NULL,
  `biaya_pengiriman` bigint(20) NOT NULL,
  `status` enum('Diproses','Dikirim','Sampai','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kurir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gudang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pemesanan_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengirimen`
--

INSERT INTO `pengirimen` (`id`, `kode`, `jenis`, `kode_pemesanan`, `pembelian_pemesanan_id`, `kontak_id`, `referensi`, `tanggal_pengiriman`, `biaya_pengiriman`, `status`, `tags`, `kurir`, `resi`, `gudang_id`, `created_at`, `updated_at`, `pemesanan_id`) VALUES
(8, 'SD/5464', 'penjualan', 'SO/00001', NULL, 26, NULL, '2023-01-30 16:01:43', 9000, 'Diproses', NULL, NULL, NULL, 1, '2023-01-30 09:02:24', '2023-01-30 09:02:24', 1),
(11, 'PD/00001', 'pembelian', 'PO/00002', 4, 3, NULL, '2023-01-30 18:15:10', 10000, 'Diproses', NULL, NULL, NULL, 1, '2023-01-30 11:15:34', '2023-01-30 11:15:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan__penawarans`
--

CREATE TABLE `penjualan__penawarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sales_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `kadaluarsa` datetime DEFAULT NULL,
  `status` enum('Open','Disetujui','Ditolak','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `biaya_pengiriman` bigint(20) DEFAULT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `total` bigint(20) NOT NULL,
  `termin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan__penawarans`
--

INSERT INTO `penjualan__penawarans` (`id`, `kode`, `kontak_id`, `sales_id`, `referensi`, `tags`, `tanggal_transaksi`, `kadaluarsa`, `status`, `sub_total`, `biaya_pengiriman`, `diskon`, `pajak`, `total`, `termin`, `attachment`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'QU/0001', 26, NULL, NULL, NULL, '2023-01-30 15:15:04', '2023-02-14 15:15:04', 'Disetujui', 15000000, 0, 0, 750000, 15750000, '15', NULL, NULL, '2023-01-30 08:17:48', '2023-01-30 10:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan__pesanans`
--

CREATE TABLE `penjualan__pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sales_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_jatuh_tempo` datetime DEFAULT NULL,
  `termin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Open','Selesai','Dibatalkan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sisa_tagihan` bigint(20) DEFAULT NULL,
  `sub_total` bigint(20) NOT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `biaya_pengiriman` bigint(20) DEFAULT NULL,
  `uang_muka` bigint(20) DEFAULT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `info_pengiriman` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal_pengiriman` datetime DEFAULT NULL,
  `kurir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gudang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan__pesanans`
--

INSERT INTO `penjualan__pesanans` (`id`, `kode`, `kontak_id`, `sales_id`, `referensi`, `tags`, `tanggal_transaksi`, `tanggal_jatuh_tempo`, `termin`, `status`, `sisa_tagihan`, `sub_total`, `diskon`, `biaya_pengiriman`, `uang_muka`, `pajak`, `total`, `info_pengiriman`, `tanggal_pengiriman`, `kurir`, `resi`, `gudang_id`, `attachment`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'SO/00001', 26, NULL, NULL, NULL, '2023-01-30 15:50:40', '2023-02-14 15:50:40', '15', 'Open', NULL, 15000000, 0, 0, NULL, 0, 15000000, 0, NULL, NULL, NULL, 1, NULL, NULL, '2023-01-30 08:54:47', '2023-01-30 08:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan__tagihans`
--

CREATE TABLE `penjualan__tagihans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sales_id` bigint(20) UNSIGNED DEFAULT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_jatuh_tempo` datetime DEFAULT NULL,
  `status` enum('Lunas','Dibayar Sebagian','Belum Dibayar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sisa_tagihan` bigint(20) DEFAULT NULL,
  `sub_total` bigint(20) NOT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `biaya_pengiriman` bigint(20) DEFAULT NULL,
  `uang_muka` bigint(20) DEFAULT NULL,
  `pajak` bigint(20) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `termin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_pengiriman` tinyint(1) NOT NULL DEFAULT 0,
  `tanggal_pengiriman` datetime DEFAULT NULL,
  `kurir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gudang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan__tagihans`
--

INSERT INTO `penjualan__tagihans` (`id`, `kode`, `kontak_id`, `sales_id`, `referensi`, `tanggal_transaksi`, `tanggal_jatuh_tempo`, `status`, `tags`, `sisa_tagihan`, `sub_total`, `diskon`, `biaya_pengiriman`, `uang_muka`, `pajak`, `total`, `termin`, `info_pengiriman`, `tanggal_pengiriman`, `kurir`, `resi`, `gudang_id`, `attachment`, `pesan`, `created_at`, `updated_at`) VALUES
(1, 'INV/00001', 26, NULL, NULL, '2023-01-30 15:50:40', '2023-02-14 15:50:40', 'Dibayar Sebagian', NULL, 10506300, 15000000, 0, 9000, 4502700, 0, 15009000, '15', 1, '2023-01-30 16:01:43', '1', 'sadasd12312', 1, NULL, NULL, '2023-01-30 09:10:24', '2023-01-30 09:10:24'),
(2, 'INV/00002', 2, NULL, NULL, '2023-01-30 16:15:03', '2023-02-06 16:15:03', 'Dibayar Sebagian', NULL, 10100000, 10000000, 0, 0, 1000000, 1100000, 11100000, '7', 0, NULL, NULL, NULL, 1, NULL, NULL, '2023-01-30 09:15:58', '2023-01-30 09:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Produk','Paket','Manufaktur') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `akun_inventory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gudang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `satuan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` bigint(20) DEFAULT NULL,
  `harga_jual` bigint(20) DEFAULT NULL,
  `grosir_minimal` bigint(20) DEFAULT NULL,
  `grosir_tipe` enum('Rp','%') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grosir_harga` bigint(20) DEFAULT NULL,
  `stok_min` bigint(20) DEFAULT NULL,
  `manufaktur_produk` bigint(20) DEFAULT NULL,
  `manufaktur_kuantitas` bigint(20) DEFAULT NULL,
  `manufaktur_harga` bigint(20) DEFAULT NULL,
  `akun_manufaktur_id` bigint(20) UNSIGNED DEFAULT NULL,
  `stok_id` bigint(20) DEFAULT NULL,
  `produksi_biaya` bigint(20) DEFAULT NULL,
  `total_dibayar` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produks`
--

INSERT INTO `produks` (`id`, `kategori_id`, `name`, `jenis`, `sku`, `gambar`, `akun_inventory_id`, `gudang_id`, `satuan_id`, `deskripsi`, `attachment`, `harga_beli`, `harga_jual`, `grosir_minimal`, `grosir_tipe`, `grosir_harga`, `stok_min`, `manufaktur_produk`, `manufaktur_kuantitas`, `manufaktur_harga`, `akun_manufaktur_id`, `stok_id`, `produksi_biaya`, `total_dibayar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Avansa', 'Produk', 'otm/012301', NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 'Toyota Avanza', 'Produk', 'OTM/00123', NULL, NULL, NULL, 3, 'Mobil Kantor', NULL, 250000000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-24 06:08:10', '2023-01-24 06:08:10'),
(3, 2, 'Asus Rog Zephyrus', 'Produk', 'Ass/503', NULL, NULL, NULL, 3, 'asus rog zephyrus 2022', NULL, 25000000, 25500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-27 00:22:24', '2023-01-27 00:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2023-01-21 14:44:03', '0000-00-00 00:00:00'),
(2, 'User', NULL, NULL),
(3, 'Admin', '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(4, 'User', '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(5, 'Admin', '2023-01-21 08:30:02', '2023-01-21 08:30:02'),
(6, 'User', '2023-01-21 08:30:02', '2023-01-21 08:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `satuans`
--

CREATE TABLE `satuans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `satuans`
--

INSERT INTO `satuans` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pcs', '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(2, 'Kg', '2023-01-21 08:28:59', '2023-01-21 08:28:59'),
(3, 'Unit', '2023-01-21 08:28:59', '2023-01-21 08:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lzNMRGWUIYOx8qmV7KsYDxezfwPL7uuIS590x4Xt', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoieE02MG02S1p1T0Rud0cyeTkxSXNsaGs3TUNrRlNPZmpWTzJyMzB0TCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRPdnZYTDRlZjJ6bjRJdTNMQzZzUW1lLk1VWmt2aVY2YlNKeFZ0OUVoOXNpU1N6VVJGb1ROSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly9zYXMtYWt1bnRpbmcudGVzdC91c2VyL3BlbWJlbGlhbi90YWdpaGFuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1675109474);

-- --------------------------------------------------------

--
-- Table structure for table `stoks`
--

CREATE TABLE `stoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipe` enum('Perhitungan Stok','Stok Masuk/Keluar') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akun_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `qty_tercatat` bigint(20) NOT NULL,
  `qty_aktual` bigint(20) NOT NULL,
  `qty_selisih` bigint(20) NOT NULL,
  `satuan` bigint(20) DEFAULT NULL,
  `harga_rata` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kendaraan', NULL, NULL),
(2, 'Elektronik', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `termins`
--

CREATE TABLE `termins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termins`
--

INSERT INTO `termins` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'N-7', 7, NULL, NULL),
(2, 'N-15', 15, NULL, NULL),
(3, 'N-30', 30, NULL, NULL),
(4, 'N-45', 45, NULL, NULL),
(5, 'N-60', 60, NULL, NULL),
(6, 'Cash on Delivery', 1, NULL, NULL),
(7, 'Custom', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `akun_id` bigint(20) UNSIGNED DEFAULT NULL,
  `penjualan_tagihan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pembelian_tagihan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_dibayar` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `akun_id`, `penjualan_tagihan_id`, `pembelian_tagihan_id`, `tanggal_transaksi`, `attachment`, `referensi`, `total_dibayar`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2023-01-30 15:50:40', NULL, NULL, 4502700, '2023-01-30 09:10:24', '2023-01-30 09:10:24'),
(2, 1, 2, NULL, '2023-01-30 16:15:03', NULL, NULL, 1000000, '2023-01-30 09:15:58', '2023-01-30 09:15:58'),
(3, NULL, NULL, 1, '2023-01-30 19:50:15', NULL, NULL, 0, '2023-01-30 12:50:51', '2023-01-30 12:50:51'),
(4, NULL, NULL, 2, '2023-01-30 17:23:10', NULL, NULL, 0, '2023-01-30 13:11:07', '2023-01-30 13:11:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `mobile` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `role_id`, `mobile`) VALUES
(1, 'Dhimas Dwi Cahyo', 'user@123.com', NULL, '$2y$10$OvvXL4ef2zn4Iu3LC6sQme.MUZkviV6bSJxVt9Eh9siSSzURFoTNK', NULL, NULL, NULL, 'jL1PN2Bmpo12yycVEUbNMP1JKktwkR5OoXAiU1LPy65olmtmjpg0oikEjKUo', NULL, NULL, '2023-01-21 07:53:07', '2023-01-21 07:53:07', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akuns`
--
ALTER TABLE `akuns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assets_akun_id_foreign` (`akun_id`),
  ADD KEY `assets_satuan_id_foreign` (`satuan_id`);

--
-- Indexes for table `biayas`
--
ALTER TABLE `biayas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gudangs`
--
ALTER TABLE `gudangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gudangs_stok_id_foreign` (`stok_id`);

--
-- Indexes for table `item_pembelian_pemesanans`
--
ALTER TABLE `item_pembelian_pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_pembelian_pemesanans_produk_id_foreign` (`produk_id`),
  ADD KEY `item_pembelian_pemesanans_satuan_id_foreign` (`satuan_id`),
  ADD KEY `item_pembelian_pemesanans_pembelian_id_foreign` (`pembelian_id`);

--
-- Indexes for table `item_pembelian_penawarans`
--
ALTER TABLE `item_pembelian_penawarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_pembelian_penawarans_produk_id_foreign` (`produk_id`),
  ADD KEY `item_pembelian_penawarans_satuan_id_foreign` (`satuan_id`),
  ADD KEY `item_pembelian_penawarans_pembelian_id_foreign` (`pembelian_id`);

--
-- Indexes for table `item_pembelian_pengirimen`
--
ALTER TABLE `item_pembelian_pengirimen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_pembelian_pengirimen_produk_id_foreign` (`produk_id`),
  ADD KEY `item_pembelian_pengirimen_satuan_id_foreign` (`satuan_id`),
  ADD KEY `item_pembelian_pengirimen_pembelian_id_foreign` (`pembelian_id`);

--
-- Indexes for table `item_pembelian_tagihans`
--
ALTER TABLE `item_pembelian_tagihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_pembelian_tagihans_produk_id_foreign` (`produk_id`),
  ADD KEY `item_pembelian_tagihans_satuan_id_foreign` (`satuan_id`),
  ADD KEY `item_pembelian_tagihans_pembelian_id_foreign` (`pembelian_id`);

--
-- Indexes for table `item_penjualan_pemesanans`
--
ALTER TABLE `item_penjualan_pemesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_penjualan_pemesanans_produk_id_foreign` (`produk_id`),
  ADD KEY `item_penjualan_pemesanans_satuan_id_foreign` (`satuan_id`),
  ADD KEY `item_penjualan_pemesanans_penjualan_id_foreign` (`penjualan_id`);

--
-- Indexes for table `item_penjualan_penawarans`
--
ALTER TABLE `item_penjualan_penawarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_penjualan_penawarans_produk_id_foreign` (`produk_id`),
  ADD KEY `item_penjualan_penawarans_satuan_id_foreign` (`satuan_id`),
  ADD KEY `item_penjualan_penawarans_penjualan_id_foreign` (`penjualan_id`);

--
-- Indexes for table `item_penjualan_pengirimen`
--
ALTER TABLE `item_penjualan_pengirimen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_penjualan_pengirimen_produk_id_foreign` (`produk_id`),
  ADD KEY `item_penjualan_pengirimen_satuan_id_foreign` (`satuan_id`),
  ADD KEY `item_penjualan_pengirimen_penjualan_id_foreign` (`penjualan_id`);

--
-- Indexes for table `item_penjualan_tagihans`
--
ALTER TABLE `item_penjualan_tagihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_penjualan_tagihans_produk_id_foreign` (`produk_id`),
  ADD KEY `item_penjualan_tagihans_satuan_id_foreign` (`satuan_id`),
  ADD KEY `item_penjualan_tagihans_penjualan_id_foreign` (`penjualan_id`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawans_biaya_id_foreign` (`biaya_id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontaks`
--
ALTER TABLE `kontaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pajaks`
--
ALTER TABLE `pajaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembelian__penawarans`
--
ALTER TABLE `pembelian__penawarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian__penawarans_kontak_id_foreign` (`kontak_id`);

--
-- Indexes for table `pembelian__pesanans`
--
ALTER TABLE `pembelian__pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian__pesanans_kontak_id_foreign` (`kontak_id`),
  ADD KEY `pembelian__pesanans_gudang_id_foreign` (`gudang_id`);

--
-- Indexes for table `pembelian__tagihans`
--
ALTER TABLE `pembelian__tagihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian__tagihans_kontak_id_foreign` (`kontak_id`),
  ADD KEY `pembelian__tagihans_gudang_id_foreign` (`gudang_id`);

--
-- Indexes for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengeluarans_biaya_id_foreign` (`biaya_id`),
  ADD KEY `pengeluarans_transaksi_id_foreign` (`transaksi_id`),
  ADD KEY `pengeluarans_kontak_id_foreign` (`kontak_id`),
  ADD KEY `pengeluarans_akun_id_foreign` (`akun_id`);

--
-- Indexes for table `pengirimen`
--
ALTER TABLE `pengirimen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengirimen_kontak_id_foreign` (`kontak_id`),
  ADD KEY `nomor_resi` (`resi`),
  ADD KEY `pengirimen_gudang_id_foreign` (`gudang_id`),
  ADD KEY `pengirimen_pemesanan_id_foreign` (`pemesanan_id`),
  ADD KEY `pembelian_pemesanan_id` (`pembelian_pemesanan_id`);

--
-- Indexes for table `penjualan__penawarans`
--
ALTER TABLE `penjualan__penawarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan__penawarans_kontak_id_foreign` (`kontak_id`),
  ADD KEY `penjualan__penawarans_sales_id_foreign` (`sales_id`);

--
-- Indexes for table `penjualan__pesanans`
--
ALTER TABLE `penjualan__pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan__pesanans_kontak_id_foreign` (`kontak_id`),
  ADD KEY `penjualan__pesanans_sales_id_foreign` (`sales_id`),
  ADD KEY `penjualan__pesanans_gudang_id_foreign` (`gudang_id`);

--
-- Indexes for table `penjualan__tagihans`
--
ALTER TABLE `penjualan__tagihans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan__tagihans_kontak_id_foreign` (`kontak_id`),
  ADD KEY `penjualan__tagihans_sales_id_foreign` (`sales_id`),
  ADD KEY `penjualan__tagihans_gudang_id_foreign` (`gudang_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produks_kategori_id_foreign` (`kategori_id`),
  ADD KEY `produks_akun_inventory_id_foreign` (`akun_inventory_id`),
  ADD KEY `produks_akun_manufaktur_id_foreign` (`akun_manufaktur_id`),
  ADD KEY `produks_gudang_id_foreign` (`gudang_id`),
  ADD KEY `satuan_id` (`satuan_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuans`
--
ALTER TABLE `satuans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stoks`
--
ALTER TABLE `stoks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stoks_akun_id_foreign` (`akun_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termins`
--
ALTER TABLE `termins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_akun_id_foreign` (`akun_id`),
  ADD KEY `penjualan_tagihan_id` (`penjualan_tagihan_id`),
  ADD KEY `pembelian_tagihan_id` (`pembelian_tagihan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akuns`
--
ALTER TABLE `akuns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `biayas`
--
ALTER TABLE `biayas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudangs`
--
ALTER TABLE `gudangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_pembelian_pemesanans`
--
ALTER TABLE `item_pembelian_pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_pembelian_penawarans`
--
ALTER TABLE `item_pembelian_penawarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_pembelian_pengirimen`
--
ALTER TABLE `item_pembelian_pengirimen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_pembelian_tagihans`
--
ALTER TABLE `item_pembelian_tagihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item_penjualan_pemesanans`
--
ALTER TABLE `item_penjualan_pemesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_penjualan_penawarans`
--
ALTER TABLE `item_penjualan_penawarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_penjualan_pengirimen`
--
ALTER TABLE `item_penjualan_pengirimen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `item_penjualan_tagihans`
--
ALTER TABLE `item_penjualan_tagihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontaks`
--
ALTER TABLE `kontaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `pajaks`
--
ALTER TABLE `pajaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian__penawarans`
--
ALTER TABLE `pembelian__penawarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian__pesanans`
--
ALTER TABLE `pembelian__pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian__tagihans`
--
ALTER TABLE `pembelian__tagihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengirimen`
--
ALTER TABLE `pengirimen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penjualan__penawarans`
--
ALTER TABLE `penjualan__penawarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan__pesanans`
--
ALTER TABLE `penjualan__pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan__tagihans`
--
ALTER TABLE `penjualan__tagihans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `satuans`
--
ALTER TABLE `satuans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stoks`
--
ALTER TABLE `stoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `termins`
--
ALTER TABLE `termins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_akun_id_foreign` FOREIGN KEY (`akun_id`) REFERENCES `akuns` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `assets_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `gudangs`
--
ALTER TABLE `gudangs`
  ADD CONSTRAINT `gudangs_stok_id_foreign` FOREIGN KEY (`stok_id`) REFERENCES `stoks` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `item_pembelian_pemesanans`
--
ALTER TABLE `item_pembelian_pemesanans`
  ADD CONSTRAINT `item_pembelian_pemesanans_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian__pesanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_pembelian_pemesanans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `item_pembelian_pemesanans_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `item_pembelian_penawarans`
--
ALTER TABLE `item_pembelian_penawarans`
  ADD CONSTRAINT `item_pembelian_penawarans_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian__penawarans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_pembelian_penawarans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `item_pembelian_penawarans_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `item_pembelian_pengirimen`
--
ALTER TABLE `item_pembelian_pengirimen`
  ADD CONSTRAINT `item_pembelian_pengirimen_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pengirimen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_pembelian_pengirimen_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `item_pembelian_pengirimen_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `item_pembelian_tagihans`
--
ALTER TABLE `item_pembelian_tagihans`
  ADD CONSTRAINT `item_pembelian_tagihans_pembelian_id_foreign` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian__tagihans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_pembelian_tagihans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `item_pembelian_tagihans_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `item_penjualan_pemesanans`
--
ALTER TABLE `item_penjualan_pemesanans`
  ADD CONSTRAINT `item_penjualan_pemesanans_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan__pesanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_penjualan_pemesanans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `item_penjualan_pemesanans_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `item_penjualan_penawarans`
--
ALTER TABLE `item_penjualan_penawarans`
  ADD CONSTRAINT `item_penjualan_penawarans_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan__penawarans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_penjualan_penawarans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `item_penjualan_penawarans_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `item_penjualan_pengirimen`
--
ALTER TABLE `item_penjualan_pengirimen`
  ADD CONSTRAINT `item_penjualan_pengirimen_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `pengirimen` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_penjualan_pengirimen_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `item_penjualan_pengirimen_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `item_penjualan_tagihans`
--
ALTER TABLE `item_penjualan_tagihans`
  ADD CONSTRAINT `item_penjualan_tagihans_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan__tagihans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `item_penjualan_tagihans_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `item_penjualan_tagihans_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD CONSTRAINT `karyawans_biaya_id_foreign` FOREIGN KEY (`biaya_id`) REFERENCES `biayas` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pembelian__penawarans`
--
ALTER TABLE `pembelian__penawarans`
  ADD CONSTRAINT `pembelian__penawarans_kontak_id_foreign` FOREIGN KEY (`kontak_id`) REFERENCES `kontaks` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pembelian__pesanans`
--
ALTER TABLE `pembelian__pesanans`
  ADD CONSTRAINT `pembelian__pesanans_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudangs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pembelian__pesanans_kontak_id_foreign` FOREIGN KEY (`kontak_id`) REFERENCES `kontaks` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pembelian__tagihans`
--
ALTER TABLE `pembelian__tagihans`
  ADD CONSTRAINT `pembelian__tagihans_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudangs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pembelian__tagihans_kontak_id_foreign` FOREIGN KEY (`kontak_id`) REFERENCES `kontaks` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pengeluarans`
--
ALTER TABLE `pengeluarans`
  ADD CONSTRAINT `pengeluarans_akun_id_foreign` FOREIGN KEY (`akun_id`) REFERENCES `akuns` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengeluarans_biaya_id_foreign` FOREIGN KEY (`biaya_id`) REFERENCES `biayas` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengeluarans_kontak_id_foreign` FOREIGN KEY (`kontak_id`) REFERENCES `kontaks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengeluarans_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksis` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pengirimen`
--
ALTER TABLE `pengirimen`
  ADD CONSTRAINT `pengirimen_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudangs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengirimen_kontak_id_foreign` FOREIGN KEY (`kontak_id`) REFERENCES `kontaks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pengirimen_pembelian_pemesanan_id_foreign ` FOREIGN KEY (`pembelian_pemesanan_id`) REFERENCES `pembelian__pesanans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pengirimen_pemesanan_id_foreign` FOREIGN KEY (`pemesanan_id`) REFERENCES `penjualan__pesanans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penjualan__penawarans`
--
ALTER TABLE `penjualan__penawarans`
  ADD CONSTRAINT `penjualan__penawarans_kontak_id_foreign` FOREIGN KEY (`kontak_id`) REFERENCES `kontaks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `penjualan__penawarans_sales_id_foreign` FOREIGN KEY (`sales_id`) REFERENCES `karyawans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `penjualan__pesanans`
--
ALTER TABLE `penjualan__pesanans`
  ADD CONSTRAINT `penjualan__pesanans_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudangs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `penjualan__pesanans_kontak_id_foreign` FOREIGN KEY (`kontak_id`) REFERENCES `kontaks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `penjualan__pesanans_sales_id_foreign` FOREIGN KEY (`sales_id`) REFERENCES `karyawans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `penjualan__tagihans`
--
ALTER TABLE `penjualan__tagihans`
  ADD CONSTRAINT `penjualan__tagihans_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudangs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `penjualan__tagihans_kontak_id_foreign` FOREIGN KEY (`kontak_id`) REFERENCES `kontaks` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `penjualan__tagihans_sales_id_foreign` FOREIGN KEY (`sales_id`) REFERENCES `karyawans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `produks`
--
ALTER TABLE `produks`
  ADD CONSTRAINT `produks_akun_inventory_id_foreign` FOREIGN KEY (`akun_inventory_id`) REFERENCES `akuns` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `produks_akun_manufaktur_id_foreign` FOREIGN KEY (`akun_manufaktur_id`) REFERENCES `akuns` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `produks_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudangs` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `produks_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `produks_satuan_id_foreign` FOREIGN KEY (`satuan_id`) REFERENCES `satuans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `stoks`
--
ALTER TABLE `stoks`
  ADD CONSTRAINT `stoks_akun_id_foreign` FOREIGN KEY (`akun_id`) REFERENCES `akuns` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_akun_id_foreign` FOREIGN KEY (`akun_id`) REFERENCES `akuns` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transaksis_pembelian_tagihan_id_foreign` FOREIGN KEY (`pembelian_tagihan_id`) REFERENCES `pembelian__tagihans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transaksis_penjualan_tagihan_id_foreign` FOREIGN KEY (`penjualan_tagihan_id`) REFERENCES `penjualan__tagihans` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
