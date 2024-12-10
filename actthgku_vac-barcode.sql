-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2024 at 11:34 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `actthgku_vac-barcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcode_details`
--

CREATE TABLE `barcode_details` (
  `id` int(11) NOT NULL,
  `wo_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `part_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `so_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `operation_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `barcode_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barcode_details`
--

INSERT INTO `barcode_details` (`id`, `wo_no`, `part_no`, `so_no`, `line_no`, `operation_code`, `quantity`, `barcode_path`, `created_at`, `updated_at`) VALUES
(813, '232400003', 'TBP1S010P005A', '232400003', '0', 'OP_10', 1, 'qrcodes/6735a03d5ad61.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(814, '232400003', 'TBP1S010P005A', '232400003', '0', 'OP_20', 10, 'qrcodes/6735a03d71f77.png', '2024-11-14 07:01:17', '2024-11-16 06:50:53'),
(815, '232400003', 'TBP1S010P005A', '232400003', '0', 'OP_30', 1, 'qrcodes/6735a03d7b445.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(816, '232400003', 'TBP1S010P015A', '232400003', '0', 'OP_10', 1, 'qrcodes/6735a03d84cca.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(817, '232400003', 'TBP1S010P015A', '232400003', '0', 'OP_20', 5, 'qrcodes/6735a03d8dfd7.png', '2024-11-14 07:01:17', '2024-11-16 05:47:09'),
(818, '232400003', 'TBP1S010P015A', '232400003', '0', 'OP_30', 1, 'qrcodes/6735a03d97a2c.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(819, '232400003', 'TBP1S010P016A', '232400003', '0', 'OP_10', 2, 'qrcodes/6735a03da5d81.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(820, '232400003', 'TBP1S010P016A', '232400003', '0', 'OP_20', 2, 'qrcodes/6735a03db0506.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(821, '232400003', 'TBP1S010P016A', '232400003', '0', 'OP_30', 2, 'qrcodes/6735a03dba055.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(822, '232400003', 'TBP1S010P019A', '232400003', '0', 'OP_10', 2, 'qrcodes/6735a03dc478f.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(823, '232400003', 'TBP1S010P019A', '232400003', '0', 'OP_20', 2, 'qrcodes/6735a03dcebd9.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(824, '232400003', 'TBP1S010P019A', '232400003', '0', 'OP_30', 2, 'qrcodes/6735a03dd8944.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(825, '232400003', 'TBP1S010P086A', '232400003', '0', 'OP_10', 1, 'qrcodes/6735a03de2c22.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(826, '232400003', 'TBP1S010P086A', '232400003', '0', 'OP_20', 1, 'qrcodes/6735a03debc1a.png', '2024-11-14 07:01:17', '2024-11-14 07:01:17'),
(827, '232400003', 'TBP1S010P086A', '232400003', '0', 'OP_30', 1, 'qrcodes/6735a03e00de2.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(828, '232400003', 'TBP1S010P114A', '232400003', '0', 'OP_10', 1, 'qrcodes/6735a03e09c02.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(829, '232400003', 'TBP1S010P114A', '232400003', '0', 'OP_20', 1, 'qrcodes/6735a03e1289d.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(830, '232400003', 'TBP1S010P114A', '232400003', '0', 'OP_30', 1, 'qrcodes/6735a03e1b434.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(831, '232400003', 'TBP1S010P115A', '232400003', '0', 'OP_10', 1, 'qrcodes/6735a03e25af5.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(832, '232400003', 'TBP1S010P115A', '232400003', '0', 'OP_20', 1, 'qrcodes/6735a03e34689.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(833, '232400003', 'TBP1S010P115A', '232400003', '0', 'OP_30', 1, 'qrcodes/6735a03e41c94.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(834, '232400003', 'TBP1S150P012A', '232400003', '0', 'OP_10', 2, 'qrcodes/6735a03e4dad1.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(835, '232400003', 'TBP1S150P012A', '232400003', '0', 'OP_20', 2, 'qrcodes/6735a03e58bef.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(836, '232400003', 'TBP1S150P012A', '232400003', '0', 'OP_30', 2, 'qrcodes/6735a03e63fd1.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(837, '232400003', 'CMA1S120P070A', '232400004', '0', 'OP_10', 1, 'qrcodes/6735a03e6d6de.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(838, '232400003', 'CMA1S120P070A', '232400004', '0', 'OP_20', 1, 'qrcodes/6735a03e76d4e.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(839, '232400003', 'CMA1S120P070A', '232400004', '0', 'OP_30', 1, 'qrcodes/6735a03e8065c.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(840, '232400003', 'CMA1S120P070A', '232400004', '0', 'OP_40', 1, 'qrcodes/6735a03e8a41e.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(841, '232400003', 'BTALS010P405A', '232400005', '0', 'OP_10', 1, 'qrcodes/6735a03e92fbc.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(842, '232400003', 'BTALS010P405A', '232400005', '0', 'OP_20', 1, 'qrcodes/6735a03ea062c.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(843, '232400003', 'BTALS010P405A', '232400005', '0', 'OP_30', 1, 'qrcodes/6735a03ea9277.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(844, '232400003', 'BTALS010P406A', '232400005', '0', 'OP_10', 1, 'qrcodes/6735a03eb207e.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(845, '232400003', 'BTALS010P406A', '232400005', '0', 'OP_20', 1, 'qrcodes/6735a03ebaeec.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(846, '232400003', 'BTALS010P406A', '232400005', '0', 'OP_30', 1, 'qrcodes/6735a03ec3fcb.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(847, '232400003', 'BTALS010P407A', '232400005', '0', 'OP_10', 1, 'qrcodes/6735a03eccdb3.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(848, '232400003', 'BTALS010P407A', '232400005', '0', 'OP_20', 1, 'qrcodes/6735a03ed7608.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(849, '232400003', 'BTALS010P407A', '232400005', '0', 'OP_30', 1, 'qrcodes/6735a03ee1854.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(850, '232400003', 'DMFS140P254', '232400006', '0', 'OP_10', 1, 'qrcodes/6735a03eebe22.png', '2024-11-14 07:01:18', '2024-11-14 07:01:18'),
(851, '232400003', 'DMFS140P254', '232400006', '0', 'OP_20', 1, 'qrcodes/6735a03f00a5e.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(852, '232400003', 'DMFS140P254', '232400006', '0', 'OP_30', 1, 'qrcodes/6735a03f099de.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(853, '232400003', 'DMFS140P255', '232400006', '0', 'OP_10', 1, 'qrcodes/6735a03f129cb.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(854, '232400003', 'DMFS140P255', '232400006', '0', 'OP_20', 1, 'qrcodes/6735a03f1b89c.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(855, '232400003', 'DMFS140P255', '232400006', '0', 'OP_30', 1, 'qrcodes/6735a03f246b1.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(856, '232400003', 'DMFS140P263', '232400006', '0', 'OP_10', 1, 'qrcodes/6735a03f2d521.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(857, '232400003', 'DMFS140P263', '232400006', '0', 'OP_20', 1, 'qrcodes/6735a03f364a7.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(858, '232400003', 'DMFS140P263', '232400006', '0', 'OP_30', 1, 'qrcodes/6735a03f409d9.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(859, '232400003', 'TBP1S140P085A', '232400007', '0', 'OP_10', 2, 'qrcodes/6735a03f49d3b.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(860, '232400003', 'TBP1S140P085A', '232400007', '0', 'OP_20', 2, 'qrcodes/6735a03f53ee2.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(861, '232400003', 'TBP1S140P085A', '232400007', '0', 'OP_30', 2, 'qrcodes/6735a03f5f3b3.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(862, '232400003', 'TBP1S140P086A', '232400007', '0', 'OP_10', 2, 'qrcodes/6735a03f68235.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(863, '232400003', 'TBP1S140P086A', '232400007', '0', 'OP_20', 2, 'qrcodes/6735a03f74bfa.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(864, '232400003', 'TBP1S140P086A', '232400007', '0', 'OP_30', 2, 'qrcodes/6735a03f7fe88.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(865, '232400003', 'TBP1S140P091A', '232400007', '0', 'OP_10', 1, 'qrcodes/6735a03f89e1b.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(866, '232400003', 'TBP1S140P091A', '232400007', '0', 'OP_20', 1, 'qrcodes/6735a03f93d4a.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(867, '232400003', 'TBP1S140P091A', '232400007', '0', 'OP_30', 1, 'qrcodes/6735a03f9cc46.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(868, '232400003', 'TBP1S170P006A', '232400007', '0', 'OP_10', 1, 'qrcodes/6735a03fa5b13.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(869, '232400003', 'TBP1S170P006A', '232400007', '0', 'OP_20', 1, 'qrcodes/6735a03faec8c.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(870, '232400003', 'TBP1S170P006A', '232400007', '0', 'OP_30', 1, 'qrcodes/6735a03fb7b42.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(871, '232400003', 'TBP1S170P023A', '232400007', '0', 'OP_10', 1, 'qrcodes/6735a03fc07f0.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(872, '232400003', 'TBP1S170P023A', '232400007', '0', 'OP_20', 1, 'qrcodes/6735a03fc9c2e.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(873, '232400003', 'TBP1S170P023A', '232400007', '0', 'OP_30', 1, 'qrcodes/6735a03fd3087.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(874, '232400003', 'TBP1S170P024A', '232400007', '0', 'OP_10', 2, 'qrcodes/6735a03fdcfa0.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(875, '232400003', 'TBP1S170P024A', '232400007', '0', 'OP_20', 2, 'qrcodes/6735a03fe6c22.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(876, '232400003', 'TBP1S170P024A', '232400007', '0', 'OP_30', 2, 'qrcodes/6735a03ff07f7.png', '2024-11-14 07:01:19', '2024-11-14 07:01:19'),
(877, '232400003', 'TBP1S170P028A', '232400007', '0', 'OP_10', 2, 'qrcodes/6735a04005fbe.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20'),
(878, '232400003', 'TBP1S170P028A', '232400007', '0', 'OP_20', 2, 'qrcodes/6735a0400f2ec.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20'),
(879, '232400003', 'TBP1S170P028A', '232400007', '0', 'OP_30', 2, 'qrcodes/6735a040182bb.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20'),
(880, '232400003', 'TBP1S170P067A', '232400007', '0', 'OP_10', 1, 'qrcodes/6735a04021c3a.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20'),
(881, '232400003', 'TBP1S170P067A', '232400007', '0', 'OP_20', 1, 'qrcodes/6735a0402b380.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20'),
(882, '232400003', 'TBP1S170P067A', '232400007', '0', 'OP_30', 1, 'qrcodes/6735a0403483d.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20'),
(883, '232400003', 'TBP1S030P114A', '232400009', '0', 'OP_10', 5, 'qrcodes/6735a0403ddd8.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20'),
(884, '232400003', 'TBP1S030P114A', '232400009', '0', 'OP_20', 5, 'qrcodes/6735a040470ff.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20'),
(885, '232400003', 'TBP1S030P114A', '232400009', '0', 'OP_30', 5, 'qrcodes/6735a04050771.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20'),
(886, '232400003', 'TBP1S140P087A', '232400009', '0', 'OP_10', 2, 'qrcodes/6735a0405a5ec.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20'),
(887, '232400003', 'TBP1S140P087A', '232400009', '0', 'OP_20', 2, 'qrcodes/6735a04063b01.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20'),
(888, '232400003', 'TBP1S140P087A', '232400009', '0', 'OP_30', 2, 'qrcodes/6735a0406cb56.png', '2024-11-14 07:01:20', '2024-11-14 07:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` int(100) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `wo_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `part_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operation_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `user_id`, `wo_no`, `part_no`, `po_no`, `so_no`, `line_no`, `operation_no`, `quantity`, `created_at`, `updated_at`) VALUES
(23, 15, '232400003', 'TBP1S010P016A', '9879779', '232400003', '0', 'OP_10', 1, '2024-11-16 09:04:34', '2024-11-16 09:04:34'),
(24, 16, '232400003', 'TBP1S010P016A', '9879779', '232400003', '0', 'OP_10', 1, '2024-11-16 09:04:50', '2024-11-16 09:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_28_044435_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `packing_histories`
--

CREATE TABLE `packing_histories` (
  `id` int(100) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `wo_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `part_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packing_slips`
--

CREATE TABLE `packing_slips` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wo_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `part_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `po_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `line_no` int(100) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scan_brcodes`
--

CREATE TABLE `scan_brcodes` (
  `id` int(11) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `wo_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `part_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `po_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `line_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `operation_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scan_brcodes`
--

INSERT INTO `scan_brcodes` (`id`, `user_id`, `wo_no`, `part_no`, `po_no`, `so_no`, `line_no`, `operation_no`, `quantity`, `timestamp`, `created_at`, `updated_at`) VALUES
(276, 15, '232400003', 'TBP1S010P016A', '9879779', '232400003', '0', 'OP_10', 2, '2024-11-16 09:04:34', '2024-11-16 09:04:34', '2024-11-16 09:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('119DIQI4CSCn2x8dHILhfgMpCiAs6KHpQi80hvPQ', NULL, '152.42.140.7', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibFpFelRKT1k4QnpWcHFaTGlhUVVsTzdlV3hPSHJmcTZTVm5IbU50WSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vdmFjLWJhcmNvZGUuYWN0dGhvc3QuY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1732939181),
('3TUarDIEQql0KvvIWN9qK4475xro75L9YwrjQqVJ', NULL, '205.210.31.148', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNTFvV3pKVk5naFNheEszamNNZ3FORVZqT3lzWkpsM2JuRjVhaHFYNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vd3d3LnZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733007992),
('54hQnahhCHoktWjLDmVNZLheRuU6fCFTZdhIjJLV', NULL, '199.45.154.112', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNm55bUNQNWdyanlvQlRwR0l1NG41WjF2anhIRktJNVZQT24xSWtpTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vdmFjLWJhcmNvZGUuYWN0dGhvc3QuY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733593157),
('a43PD73NTWiDmNT906lNu1NJHDx1kH9Nayw9qVtR', NULL, '198.235.24.148', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT3hQQzhGakxBTDJTWGRFbWxPQ043TUNPOGl4UzRwQlBBU3cxTzlCcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vd3d3LnZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732905008),
('aFBiLE3rO6OH7K3w6ZrUpsuy61nFZ8RiCezullf6', NULL, '152.42.140.7', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWFppaDh2TnlqTjFKWnF1UG1nTGVzekE3WkdVQXdmdVlBa2QyODhyRSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1732939175),
('B7ptAGczgzRMSFMG0ERqnaxsamECVxoWWlMiXQ4M', NULL, '147.182.250.78', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Edge/120.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGNPRzFXVG91cGhacndhSGdwemNxNVFmdGN0cTB2V2ZyYkxZRHg4NCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vdmFjLWJhcmNvZGUuYWN0dGhvc3QuY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733340716),
('BrB72MnE5txjgfth9DSPX7fhL5PptzxhL1E27oet', NULL, '113.193.21.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY0ZlRGlERUZ3Q2FneUpIN0E5REZPNVpkZXhsZGE3WWRNS3p0S1U1TSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733568599),
('e722SqXRJRQvLh4j5Meqtfg1WVAmLoTTJPoyYnGU', NULL, '167.94.145.96', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYXYybTBITXVHNjBBenZ5ZzVDVnVsOE9QQ2Vkc3VUMjFFMVpLYTlMaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vdmFjLWJhcmNvZGUuYWN0dGhvc3QuY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733597223),
('EMov4bVTvT1hkkx1p7chQJ6mddIUEtdqKMrLlxm8', NULL, '198.235.24.54', '', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUlRadThzblVJT25VeE9BbzhHMnlaWXZ2V0ZuNHJyejBWME5oSFBkViI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1732901138),
('ICG3Z1alEd60upCcr1O00hK4SNyIKENt74Tacypt', NULL, '113.193.21.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicWxuNVZySks2dWdJV1pNTWRDcXBnRXE3UVpYbXF0R3RvUHNSMHhpWSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4OiJodHRwczovL3ZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732878632),
('iTg8v0hrkhd1b7jEBLFtlZIbS4o8vNNrbSiUXD4S', NULL, '198.235.24.148', '', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieEJYQkNRMkRSUjZxd0xDWG9mZ2hETXhObXBTMEQzQXBQeG9uaWJmdiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cHM6Ly93d3cudmFjLWJhcmNvZGUuYWN0dGhvc3QuY29tIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3d3LnZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732905008),
('joYegxTlU09MQW9c9QtkSO9rT7GvklgwcwQv75Xy', NULL, '205.210.31.74', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia0kyUWRWM0NXbk1kclpQbHZNeHFMV1htSTRFczVNbVN6ZEFPeVVIYSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1732945223),
('jsAu1vtxfPDLZv6Kt7bK5jbUXu9Y7JKvOf0v69VT', NULL, '64.227.191.16', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibEpDeFRDdnFGelozcUJxaFVUTmx2a09OcW94SWRWUUFTc0pYUHJWRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vd3d3LnZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733391475),
('L96dwZw52GQfguiDhBYcIFzSYb6ZleM4X7xbjFYW', NULL, '64.227.191.16', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTEZ4b3ViZUt1d1c2Vlg1c3lReVFmdVNXWnY1YjlvZGltSnhndGJhViI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cHM6Ly93d3cudmFjLWJhcmNvZGUuYWN0dGhvc3QuY29tIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3d3LnZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733391474),
('m06caFfelTbaCvHZ7pxFCLZvv1lniZTgRl4HckhH', NULL, '122.168.111.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRnYxdXhzM2NvTll6UU9TdjRsTkFUQzdkSUtPVlpWQXMzbXY3UloxbyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo1MToiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20vcHJvZHVjdGlvbi1wcm9jZXNzIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vdmFjLWJhcmNvZGUuYWN0dGhvc3QuY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1733302467),
('MQtHsH1xyZCBLLg9KIxVr5OezasemCjNnOEIs253', NULL, '205.210.31.171', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTNrZ0Q2RDFPbU5LWFdsTGU2bWhOUTczNncwemdzZ0F3dmtsMkt5dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vdmFjLWJhcmNvZGUuYWN0dGhvc3QuY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1732929766),
('msg0tBnvPccmnjopP8BrrdyyPX0FLikhKPWijnY2', NULL, '198.235.24.143', 'Expanse, a Palo Alto Networks company, searches across the global IPv4 space multiple times per day to identify customers&#39; presences on the Internet. If you would like to be excluded from our scans, please send IP addresses/domains to: scaninfo@paloaltonetworks.com', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZW83VHYybXlOcUdoMVp5czhnVzRkQjZWTGNnSGVZVldqYnVSVVlaayI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cHM6Ly93d3cudmFjLWJhcmNvZGUuYWN0dGhvc3QuY29tIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3d3LnZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732889381),
('P1ywaArv1Hclrq2ErJPCWWKRgzaYBYRHa1jCfkSF', NULL, '198.235.24.54', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSDFqYjZidFVUSlc2RFhrenN2Z3NWcGpJUjlSSW5CWGxaWk9QT3czZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vdmFjLWJhcmNvZGUuYWN0dGhvc3QuY29tL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1732901139),
('QK9ZW5Ijx7eD8GwNqpLn1yDY4xvqxX5vFK6j19dZ', NULL, '199.45.154.112', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSHdIRDJhYXltZVhJVDBLYkR0Q2l4Tm5MOUhpVVY2V1daRlFTOXNOayI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733593138),
('r7FkkIRsbXXovpKOgA07TOCKvnu5LnEeSMuoU1UX', NULL, '205.210.31.171', '', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZVNTTVZNajhCZWdoQU1UTk15NUdsYTFPWk9YNWNJUERHV3kyTHpncyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1732929765),
('rJhLjhUuJOqDKdyilWwmP9N1G2elCnyccnwcTPip', NULL, '171.61.51.110', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVGJoMFJROVJyS3pETHJ6d3JKZGV0MWZhd2Y1RmY1RlVvdmN3cjdNNiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733210960),
('smS8FPHveSL0icQd65EGCGHreuol4qM9bz3FaB67', 1, '122.168.28.123', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicEYyT1JNWWZPRXRVcU9Va013T2J6ZXVtM0wzQmI0U3NOajBLdGpteCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwczovL3ZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbS92aWV3LXVzZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1733478489),
('vaaLSyJf45tpO7JMBsWfnWdhGMHpnxfncnovJCqd', NULL, '113.193.21.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSHVqeU5vUEdsMWgzUDNxZEd6REFjb1c1bzE4a2FPNXg5WFVEQmQyTyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4OiJodHRwczovL3ZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732883249),
('wCetgwpiPio9TjL6CG2KXmanEYdKUE3WfhIF5csb', NULL, '167.94.145.96', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaml3WjVGaXZHVVMwTnhEa28yUHRnNWRqRU1ydmh2a0RpRXVYeVpQcSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733597210),
('xt19U8PJgVF0eHMMRK9P1h9kOhBsRgvztpqQH112', 1, '122.175.209.179', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRzBaU2RBbzNOV2xEblhLdDZqWnh3SUpJbDlDeXNFdjlVdG9lUnNoOSI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwczovL3ZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1732881277),
('XWk8C6qgLjyAwQ6y1q7TzbQm6mIjPHcBOL1dSKu7', NULL, '110.227.168.104', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib2wwSzlWcXlwaDI5OUpBZnZqMnF4Vjhtbmw3OTd2d25nWllFZjZpYSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM4OiJodHRwczovL3ZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbS9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733117144),
('yucLeb5c7GwwtXj27wFeESOaGlPQGyqpDZUhBLol', NULL, '147.182.250.78', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Edge/120.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV3lJTktTaEdFUllMV1JxVm5GeUN5WjJ1SmNqU0hRdTBEQjlYcmhQbiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly92YWMtYmFyY29kZS5hY3R0aG9zdC5jb20iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1733340715),
('yXB4yiaNzzmfgIcijFPrEBcgltNphMMUdbTZ85SW', NULL, '205.210.31.148', '', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidHI0WmlQMG5qOUNXSTI1bXVla01nZ0hlVzBodzVCOGFCTW1hZjhhVyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cHM6Ly93d3cudmFjLWJhcmNvZGUuYWN0dGhvc3QuY29tIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHBzOi8vd3d3LnZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733007991),
('zQi89zJlAzLrKqTXj9Z5LItkGtZvlnBcqtsbRnDy', 1, '113.193.21.74', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMW5jQ0V4czg1SGo3U0ZhblNUcUQzN1RSeGJ3WEhrQTgzRFQ5d1dNVCI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQzOiJodHRwczovL3ZhYy1iYXJjb2RlLmFjdHRob3N0LmNvbS92aWV3LXVzZXJzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1733478249);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `email`, `mobile`, `address`, `show_password`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'V A Corporation', 'actt@gmail.com', NULL, '', '', NULL, '$2y$12$w1NjCmOQlb4Sh4CFt6KSgOcc8FytB.y.AQ3PudL6rlGAACIxWt14C', NULL, NULL, NULL),
(15, 'user', 'Yogesh Jharbade', 'yogesh@acttconnect.com', '9131323213', 'Bhopal', '11111111', NULL, '$2y$12$xe3bCh/4w9k.KAPxk4qS1uT6CEl4ak1k5uBpOSVARk/GKwCVagk/C', NULL, '2024-10-15 23:32:34', '2024-10-15 23:32:34'),
(16, 'user', 'Harshit kumar', 'harshit@gmail.com', '9192928374', 'bhopal', '11111111', NULL, '$2y$12$.FQpdgjRDy1GWiEEdm3Rj.07r1eaJtQE49nyPSQrPYiTe//NfPFIa', NULL, '2024-11-14 06:50:17', '2024-11-14 06:50:17'),
(17, 'user', 'Act T Connect', 'acttconnect@gmail.com', '9876789879', 'Jhansi', '11111111', NULL, '$2y$12$gdztpAUv5z7DuE0w3DkYreCD3JBqS6y.fPrHyX21CB4EvDxGqjKiS', NULL, '2024-11-16 06:41:06', '2024-11-16 06:41:06'),
(19, 'admin', 'admin user', 'admin@gmail.com', '9876543212', 'bhopal', '11111111', NULL, '$2y$12$RNX/TQZeq7lX8fkUI0d8xekR5Cyfb14Dqt5Gs.UGm6SEzbr5Ql//a', NULL, '2024-12-06 09:44:09', '2024-12-06 09:44:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcode_details`
--
ALTER TABLE `barcode_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `packing_histories`
--
ALTER TABLE `packing_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packing_slips`
--
ALTER TABLE `packing_slips`
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
-- Indexes for table `scan_brcodes`
--
ALTER TABLE `scan_brcodes`
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
-- AUTO_INCREMENT for table `barcode_details`
--
ALTER TABLE `barcode_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=889;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packing_histories`
--
ALTER TABLE `packing_histories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `packing_slips`
--
ALTER TABLE `packing_slips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scan_brcodes`
--
ALTER TABLE `scan_brcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
