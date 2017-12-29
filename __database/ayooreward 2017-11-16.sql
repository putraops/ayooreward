-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 10:48 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayooreward`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_barang`
--

CREATE TABLE `db_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(8) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `isDelete` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `db_brand`
--

CREATE TABLE `db_brand` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_brand`
--

INSERT INTO `db_brand` (`id`, `nama`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'XYZ', 0, '2017-11-14 00:00:00', '2017-11-14 00:00:00'),
(2, 'ABC', 0, '2017-11-16 11:42:07', '2017-11-16 11:42:07'),
(3, 'zxc', 0, '2017-11-16 11:42:31', '2017-11-16 11:42:31'),
(4, 'TOUCH', 0, '2017-11-16 11:44:21', '2017-11-16 11:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `db_cabang`
--

CREATE TABLE `db_cabang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kontak_person` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_cabang`
--

INSERT INTO `db_cabang` (`id`, `nama`, `kontak_person`, `email`, `no_telp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Surabaya', 'Pak Gunawanz', 'gunawan@gmail.com123', '089999999', 0, '2017-09-27 20:37:48', '2017-09-27 22:29:56'),
(2, 'Jakarta', 'Pak Budi', 'budi@gmail.com', '081353463412', 0, '2017-09-27 20:39:48', '2017-09-27 20:39:48'),
(3, 'Bandung', 'Pak Bandung', 'bandung@gmail.com', '08456454555', 0, '2017-09-27 21:06:57', '2017-09-29 15:31:39'),
(4, 'Surabaya', 'Pak Gunawan', 'gunawan@gmail.com', '081353463412', 0, '2017-09-27 21:16:50', '2017-09-27 21:16:50'),
(5, 'Ayooklik Surabaya', 'Suryono Ken', 'kenina@amtech.co.id', '08123457788', 1, '2017-10-03 20:32:39', '2017-10-22 13:54:05'),
(6, 'Ayooklik Jogja', 'Indra', 'indra@airmasgroup.co.id', '081288210183', 1, '2017-10-03 20:33:34', '2017-10-03 20:33:34'),
(7, 'Ayooklik Bali', 'Ulfa', 'dwiulfayurikasari@amtech.co.id', '08999272317', 1, '2017-10-03 20:35:52', '2017-10-03 20:35:52'),
(8, 'Ayooklik Jakarta', 'Agustina', 'agustina@airmasgroup.co.id', '08125795230', 1, '2017-11-01 18:38:34', '2017-11-01 18:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `db_contactperson`
--

CREATE TABLE `db_contactperson` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `isdelete` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_contactperson`
--

INSERT INTO `db_contactperson` (`id`, `nama`, `email`, `telp`, `isdelete`, `created_at`, `updated_at`) VALUES
(1, 'Ken', 'kenina@amtech.co.id', '08123457788', 0, '2017-10-18 19:36:36', '2017-10-22 12:26:05'),
(2, 'Tika', 'sartika@harrisma.com', '08118118123', 0, '2017-10-22 12:13:48', '2017-10-22 12:13:48'),
(3, 'Yudis', 'Yudistiro@fujixerox.com', '08156930444', 0, '2017-10-22 12:14:53', '2017-10-22 12:14:53'),
(4, 'Susanto', 'susanto.liu@brother.co.id', '085959111125', 0, '2017-10-22 12:17:41', '2017-10-22 12:17:41'),
(5, 'Yulius Avnet', 'yulius.sugianto@techdata.com', '085640017368', 0, '2017-10-22 12:20:09', '2017-10-22 12:20:09'),
(6, 'Daru', 'daru.brilyantarto@hp.com', '0816565682', 0, '2017-10-22 12:29:12', '2017-10-22 12:29:12'),
(7, 'Redy', 'redy.manlin@brother.co.id', '081290022500', 0, '2017-10-22 12:34:39', '2017-10-22 12:34:39'),
(8, 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 0, '2017-10-22 12:35:52', '2017-10-22 12:35:52'),
(9, 'Wijaya Jayadi', 'Wijaya.Jayadi@fujixerox.com', '08118018686', 0, '2017-10-22 12:40:40', '2017-10-22 12:40:40'),
(10, 'Syafril Tanjuang', 'Syafril.Tanjuang@fujixerox.com', '08129348231', 0, '2017-10-22 12:42:38', '2017-10-22 12:42:38'),
(11, 'Chandra Gupta', 'chandra.gupta@hp.com', '08112533699', 0, '2017-10-22 12:45:37', '2017-10-22 12:45:37'),
(12, 'Sri HP', 'sri.rezeki.dewi@hp.com', '0811139490', 0, '2017-10-22 12:46:44', '2017-11-05 08:43:01'),
(13, 'Handy', 'handy.gunawan@harrisma.com', '081210003880', 0, '2017-10-22 12:50:19', '2017-10-22 12:50:19'),
(14, 'Teddy Harisma', 'teddy@harrisma.com', '08118409090', 0, '2017-10-22 12:51:06', '2017-10-22 12:51:06'),
(15, 'Selvie Harrisma', 'selvie@harrisma.com', '081250050084', 0, '2017-10-22 12:52:27', '2017-10-22 12:52:27'),
(16, 'Budi Harrisma Honeywell', 'buditrianto@harrisma.com', '081213143215', 0, '2017-10-22 12:53:46', '2017-10-22 12:54:01'),
(17, 'David Hung', 'david.suryanto@brother.co.id', '081803248488', 0, '2017-10-22 12:55:10', '2017-10-22 12:55:10'),
(18, 'Leo ECS', 'lukas_leo@ecsindo.com', '08179200630', 0, '2017-10-22 12:56:10', '2017-10-22 12:56:10'),
(19, 'Cia ECS', 'lauren@ecsindo.com', '082210253555', 0, '2017-10-22 12:58:00', '2017-10-22 12:58:00'),
(20, 'Indra Brother', 'indra@brother.co.id', '0811307896', 0, '2017-10-22 13:00:06', '2017-11-05 07:52:34'),
(21, 'rud', 'Desy.agnes@post.asaba.co.id', '08111111111', 1, '2017-10-22 14:49:21', '2017-10-22 14:55:58'),
(22, 'Anton Asaba', 'antonius@post.asaba.co.id', '081808977980', 0, '2017-10-22 14:56:49', '2017-11-06 14:22:57'),
(23, 'Ruddd', 'Rud.hart@mjkt.indo.co.id', '0813737378', 0, '2017-10-22 14:58:54', '2017-10-22 14:58:54'),
(24, 'Weidy', 'weidy.hartono@hp.com', '08170077595', 0, '2017-10-22 17:11:39', '2017-11-05 08:45:02'),
(25, 'Silvia Brother', 'silvia@brother.co.id', '08158815179', 0, '2017-11-05 08:46:52', '2017-11-05 08:46:52'),
(26, 'Slamet Ariyadi', 'slamet.ariyadi@brother.co.id', '081317308090', 0, '2017-11-05 08:47:54', '2017-11-05 08:47:54'),
(27, 'Indrawati', 'pikai@airmasgroup.co.id', '08121832888', 0, '2017-11-05 09:25:06', '2017-11-05 09:25:06'),
(28, 'Ahmad', 'Ahmad@panasonic-itcomm.com', '+62 21 5362005 /', 0, '2017-11-06 10:23:35', '2017-11-06 10:23:35'),
(29, 'Marcheila', 'mmarcheilla@lenovo.com', '+62 21 300 21079 / +6282 1115 33140 ', 0, '2017-11-06 13:35:09', '2017-11-06 13:35:09'),
(30, 'Silfany Citra', 'Silfany.Asmarani@metrodata.co.id', '0821 2149 1990', 0, '2017-11-06 15:04:33', '2017-11-06 15:04:33'),
(31, 'Jonathan Chen', 'Jonathan@jessilindo.com', '0818 049 2333 1', 0, '2017-11-06 17:03:11', '2017-11-06 17:03:11'),
(32, 'Tiar', 'telesales@imv.co.id', '+62 21 65830421/ 085715528581', 0, '2017-11-07 09:42:28', '2017-11-07 09:42:28'),
(33, 'Griya Tari', 'Griya.Tari@metrodata.co.id', '0812 839 88832', 0, '2017-11-07 10:10:36', '2017-11-07 10:10:36'),
(34, 'Katarina Siena', 'katarina.siena@brother.co.id', '+6221 57 444 77', 0, '2017-11-07 12:07:54', '2017-11-07 12:07:54'),
(35, 'Casey', 'casey.ntoma@id.panasonic.com', '0816833456', 0, '2017-11-07 13:39:02', '2017-11-07 13:39:02'),
(36, 'Irene Pahala Dewi', 'Irene.Dewi@ingrammicro.com', '+62-21-571-1717 / +62-812-861-88858', 0, '2017-11-07 15:18:29', '2017-11-07 15:18:29'),
(37, 'Kian Yong Tjhin', 'Kian.Yong.Tjhin@acer.com', '+62 818 0880 9099', 0, '2017-11-07 16:57:54', '2017-11-07 16:57:54'),
(38, 'Pandu Herwandono', 'pandu.herwandono@schneider-electric.com', '+62 21 750 4406 x2339 / +62 813 1807 3565', 0, '2017-11-08 10:17:34', '2017-11-08 10:17:34'),
(39, 'Anggoro', 'anggoro@brother.co.id', '+62.21.574.4477 / +62.812.597.45677', 0, '2017-11-08 11:57:53', '2017-11-08 11:57:53'),
(40, 'Yunni shelvia', 'Yunni.shelvia@metrodata.co.id', '0813-1143-4308', 0, '2017-11-08 13:48:26', '2017-11-08 13:48:26'),
(41, 'Bramasto Ari Wibowo', 'bramasto.ari.wibowo@hp.com', '0811 8412 615', 0, '2017-11-08 14:24:40', '2017-11-08 14:24:40'),
(42, 'Aulia Savitri', 'Aulia.Savitri@dell.com', '+62 21 2358 4339, +62 811 880 860', 0, '2017-11-10 10:25:37', '2017-11-10 10:25:37'),
(43, 'Eva Yuliana', 'eyuliana@lenovo.com', '+62 813 1763 5569', 0, '2017-11-10 16:13:55', '2017-11-10 16:13:55'),
(44, 'Erna Kuswandari', 'erna@ptgmt.com', '0877-7717-8951', 0, '2017-11-10 16:41:12', '2017-11-10 16:41:12'),
(45, 'Eric Suwandi', 'Eric.Suwandi@metrodata.co.id', '081333826000', 0, '2017-11-11 08:37:33', '2017-11-11 08:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `db_event`
--

CREATE TABLE `db_event` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `db_history_status_reward`
--

CREATE TABLE `db_history_status_reward` (
  `id` int(11) NOT NULL,
  `id_reward` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_history_status_reward`
--

INSERT INTO `db_history_status_reward` (`id`, `id_reward`, `id_status`, `id_user`, `created_at`) VALUES
(1, 1, 2, 1, '2017-09-24 10:47:41'),
(2, 1, 1, 1, '2017-09-24 10:48:03'),
(3, 2, 2, 12, '2017-09-24 12:06:15'),
(4, 2, 1, 1, '2017-09-24 12:11:36'),
(5, 20, 7, 1, '2017-09-28 08:51:54'),
(6, 16, 7, 1, '2017-09-28 08:52:06'),
(7, 15, 7, 1, '2017-09-28 08:52:12'),
(8, 14, 7, 1, '2017-09-28 08:53:03'),
(9, 21, 7, 1, '2017-09-28 09:01:34'),
(10, 22, 7, 1, '2017-09-29 15:34:00'),
(11, 22, 1, 1, '2017-09-29 15:34:11'),
(12, 22, 7, 1, '2017-09-29 15:34:23'),
(13, 22, 1, 1, '2017-09-29 15:34:40'),
(14, 22, 7, 1, '2017-09-29 15:35:01'),
(15, 22, 1, 1, '2017-09-29 15:38:13'),
(16, 37, 7, 1, '2017-09-29 15:38:25'),
(17, 37, 1, 1, '2017-09-29 15:38:38'),
(18, 37, 2, 1, '2017-09-29 15:38:43'),
(19, 23, 7, 1, '2017-10-03 20:49:46'),
(20, 24, 7, 1, '2017-10-04 05:38:19'),
(21, 0, 0, 0, '2017-10-07 04:26:13'),
(22, 19, 7, 1, '2017-10-08 10:44:33'),
(23, 37, 1, 1, '2017-10-08 10:44:50'),
(24, 32, 7, 1, '2017-10-08 11:06:39'),
(25, 33, 7, 1, '2017-10-08 11:08:49'),
(26, 33, 7, 1, '2017-10-08 11:08:50'),
(27, 38, 7, 1, '2017-10-08 11:35:06'),
(28, 37, 7, 1, '2017-10-08 11:35:15'),
(29, 39, 7, 1, '2017-10-08 11:53:11'),
(30, 39, 7, 1, '2017-10-08 11:53:12'),
(31, 44, 7, 1, '2017-10-08 12:11:29'),
(32, 43, 7, 1, '2017-10-08 12:11:35'),
(33, 45, 7, 1, '2017-10-08 12:16:55'),
(34, 46, 7, 1, '2017-10-08 12:17:06'),
(35, 46, 7, 1, '2017-10-08 12:17:09'),
(36, 46, 8, 1, '2017-10-08 12:22:39'),
(37, 2, 8, 1, '2017-10-08 12:23:23'),
(38, 7, 8, 1, '2017-10-08 12:23:53'),
(39, 12, 8, 1, '2017-10-08 12:25:09'),
(40, 13, 8, 1, '2017-10-08 12:25:23'),
(41, 10, 8, 1, '2017-10-08 12:27:27'),
(42, 9, 8, 1, '2017-10-08 12:29:29'),
(43, 47, 8, 1, '2017-10-08 12:32:51'),
(44, 48, 8, 1, '2017-10-08 12:36:29'),
(45, 14, 8, 1, '2017-10-08 12:50:32'),
(46, 39, 1, 1, '2017-10-08 12:55:00'),
(47, 37, 7, 1, '2017-10-08 12:55:07'),
(48, 37, 8, 1, '2017-10-08 12:55:24'),
(49, 37, 2, 1, '2017-10-08 12:55:32'),
(50, 40, 7, 1, '2017-10-08 12:58:17'),
(51, 37, 1, 1, '2017-10-08 12:58:29'),
(52, 37, 8, 1, '2017-10-08 12:58:40'),
(53, 41, 8, 1, '2017-10-08 12:58:49'),
(54, 37, 1, 1, '2017-10-08 12:59:00'),
(55, 37, 1, 1, '2017-10-08 12:59:13'),
(56, 42, 7, 1, '2017-10-08 12:59:33'),
(57, 37, 8, 1, '2017-10-08 12:59:41'),
(58, 37, 1, 1, '2017-10-08 12:59:49'),
(59, 49, 7, 1, '2017-10-08 13:00:45'),
(60, 50, 7, 1, '2017-10-08 13:03:20'),
(61, 51, 7, 1, '2017-10-08 13:04:56'),
(62, 50, 1, 1, '2017-10-09 07:45:20'),
(63, 53, 7, 1, '2017-10-18 13:09:19'),
(64, 37, 1, 1, '2017-10-18 13:09:45'),
(65, 53, 1, 1, '2017-10-18 13:32:15'),
(66, 52, 7, 1, '2017-10-18 13:32:24'),
(67, 37, 1, 1, '2017-10-18 13:32:52'),
(68, 52, 1, 1, '2017-10-18 13:33:17'),
(69, 53, 7, 1, '2017-10-18 14:09:46'),
(70, 37, 1, 1, '2017-10-18 14:10:28'),
(71, 54, 7, 1, '2017-10-18 19:38:31'),
(72, 37, 8, 1, '2017-10-18 19:38:39'),
(73, 54, 1, 1, '2017-10-18 19:38:53'),
(74, 54, 2, 1, '2017-10-18 19:39:11'),
(75, 54, 3, 1, '2017-10-18 20:55:48'),
(76, 53, 8, 1, '2017-10-19 11:02:39'),
(77, 37, 7, 1, '2017-10-19 11:03:02'),
(78, 37, 1, 1, '2017-10-19 11:03:17'),
(79, 37, 2, 1, '2017-10-19 11:03:26'),
(80, 54, 1, 1, '2017-10-19 11:03:53'),
(81, 54, 8, 1, '2017-10-19 11:10:16'),
(82, 54, 1, 1, '2017-10-19 11:10:46'),
(83, 51, 1, 1, '2017-10-19 11:10:47'),
(84, 37, 8, 1, '2017-10-19 11:10:52'),
(85, 37, 7, 1, '2017-10-19 11:10:54'),
(86, 37, 2, 1, '2017-10-19 11:10:57'),
(87, 37, 8, 1, '2017-10-19 11:11:01'),
(88, 37, 1, 1, '2017-10-19 11:11:06'),
(89, 37, 7, 1, '2017-10-19 11:11:13'),
(90, 54, 2, 1, '2017-10-19 11:11:19'),
(91, 37, 3, 1, '2017-10-19 11:11:21'),
(92, 54, 1, 1, '2017-10-19 11:11:29'),
(93, 37, 7, 1, '2017-10-19 11:11:34'),
(94, 37, 8, 1, '2017-10-19 11:11:38'),
(95, 37, 2, 1, '2017-10-19 11:11:42'),
(96, 54, 2, 1, '2017-10-19 11:12:01'),
(97, 54, 3, 1, '2017-10-19 12:28:25'),
(98, 1, 7, 14, '2017-10-19 14:06:45'),
(99, 1, 1, 14, '2017-10-19 14:06:51'),
(100, 1, 8, 14, '2017-10-19 14:07:02'),
(101, 1, 2, 14, '2017-10-19 14:07:08'),
(102, 1, 3, 14, '2017-10-19 14:07:14'),
(103, 1, 1, 14, '2017-10-19 14:07:18'),
(104, 2, 1, 14, '2017-10-19 14:07:23'),
(105, 2, 8, 14, '2017-10-19 14:07:28'),
(106, 1, 2, 14, '2017-10-19 14:07:32'),
(107, 1, 1, 14, '2017-10-19 14:07:37'),
(108, 53, 1, 14, '2017-10-21 09:15:38'),
(109, 53, 8, 14, '2017-10-21 09:15:48'),
(110, 53, 7, 14, '2017-10-21 09:16:37'),
(111, 52, 8, 14, '2017-10-21 09:16:44'),
(112, 53, 7, 14, '2017-10-21 09:17:08'),
(113, 52, 8, 14, '2017-10-21 09:17:15'),
(114, 53, 1, 14, '2017-10-21 09:17:25'),
(115, 52, 8, 14, '2017-10-21 09:17:32'),
(116, 53, 7, 14, '2017-10-21 09:17:41'),
(117, 53, 8, 14, '2017-10-21 09:18:10'),
(118, 52, 1, 14, '2017-10-21 09:18:20'),
(119, 53, 7, 14, '2017-10-21 09:22:36'),
(120, 52, 7, 14, '2017-10-21 09:22:42'),
(121, 53, 8, 14, '2017-10-21 09:22:54'),
(122, 52, 1, 14, '2017-10-21 09:23:00'),
(123, 53, 2, 1, '2017-10-21 11:08:26'),
(124, 52, 8, 1, '2017-10-21 11:08:31'),
(125, 52, 1, 1, '2017-10-21 11:08:35'),
(126, 53, 8, 1, '2017-10-21 11:08:44'),
(127, 53, 1, 14, '2017-10-21 11:09:45'),
(128, 52, 7, 14, '2017-10-21 11:09:51'),
(129, 53, 7, 14, '2017-10-21 11:09:56'),
(130, 53, 1, 14, '2017-10-21 11:10:02'),
(131, 53, 8, 14, '2017-10-21 11:10:07'),
(132, 52, 1, 14, '2017-10-21 11:10:12'),
(133, 52, 7, 1, '2017-10-21 11:42:38'),
(134, 53, 7, 1, '2017-10-21 11:42:48'),
(135, 53, 8, 1, '2017-10-21 11:42:57'),
(136, 52, 1, 1, '2017-10-21 11:43:05'),
(137, 53, 1, 10, '2017-10-22 12:28:09'),
(138, 49, 8, 1, '2017-10-23 13:50:38'),
(139, 49, 7, 1, '2017-10-23 13:50:46'),
(140, 49, 1, 1, '2017-10-23 13:50:54'),
(141, 49, 8, 1, '2017-10-23 13:51:01'),
(142, 49, 2, 1, '2017-10-23 13:51:09'),
(143, 49, 7, 1, '2017-10-23 13:51:16'),
(144, 49, 3, 1, '2017-10-23 13:51:27'),
(145, 49, 7, 1, '2017-10-23 13:51:33'),
(146, 39, 3, 10, '2017-11-06 14:28:39'),
(147, 69, 7, 10, '2017-11-06 19:38:07'),
(148, 68, 8, 10, '2017-11-06 19:38:15'),
(149, 69, 1, 10, '2017-11-06 19:39:25'),
(150, 68, 1, 10, '2017-11-06 19:39:32'),
(151, 69, 8, 10, '2017-11-06 19:39:58'),
(152, 69, 1, 1, '2017-11-06 19:53:41'),
(153, 40, 1, 10, '2017-11-07 15:16:22'),
(154, 38, 1, 10, '2017-11-07 15:16:48'),
(155, 37, 1, 10, '2017-11-07 15:17:45'),
(156, 100, 7, 20, '2017-11-08 18:09:18'),
(157, 99, 7, 20, '2017-11-08 18:09:30'),
(158, 98, 7, 20, '2017-11-08 18:09:48'),
(159, 97, 7, 20, '2017-11-08 18:10:02'),
(160, 96, 7, 20, '2017-11-08 18:10:19'),
(161, 95, 7, 20, '2017-11-08 18:10:29'),
(162, 94, 7, 20, '2017-11-08 18:10:39'),
(163, 93, 7, 20, '2017-11-08 18:10:50'),
(164, 89, 7, 20, '2017-11-08 18:12:30'),
(165, 85, 7, 20, '2017-11-08 18:13:43'),
(166, 116, 7, 20, '2017-11-10 10:27:03'),
(167, 19, 1, 27, '2017-11-10 14:16:57'),
(168, 117, 2, 12, '2017-11-10 17:27:45'),
(169, 60, 8, 20, '2017-11-10 17:54:31'),
(170, 34, 2, 12, '2017-11-10 18:03:51'),
(171, 32, 7, 12, '2017-11-10 18:04:54'),
(172, 32, 2, 12, '2017-11-10 18:06:14'),
(173, 29, 2, 12, '2017-11-10 18:08:50'),
(174, 28, 1, 12, '2017-11-10 18:09:21'),
(175, 28, 2, 12, '2017-11-10 18:09:47'),
(176, 26, 2, 12, '2017-11-10 18:10:54'),
(177, 4, 2, 12, '2017-11-10 18:15:07'),
(178, 3, 2, 12, '2017-11-10 18:16:57'),
(179, 120, 7, 1, '2017-11-11 07:01:20'),
(180, 42, 1, 27, '2017-11-11 07:04:14'),
(181, 42, 1, 27, '2017-11-11 07:04:18'),
(182, 33, 1, 27, '2017-11-11 07:06:07'),
(183, 24, 3, 27, '2017-11-11 07:06:27'),
(184, 32, 1, 1, '2017-11-11 07:39:57'),
(185, 121, 7, 27, '2017-11-11 07:45:09'),
(186, 44, 1, 27, '2017-11-11 07:58:22'),
(187, 43, 1, 27, '2017-11-11 07:58:30'),
(188, 21, 1, 27, '2017-11-11 07:59:35'),
(189, 127, 7, 27, '2017-11-11 08:54:28'),
(190, 128, 2, 1, '2017-11-11 09:44:48'),
(191, 128, 2, 1, '2017-11-11 09:46:27'),
(192, 128, 2, 1, '2017-11-11 09:47:28'),
(193, 128, 2, 1, '2017-11-11 09:47:49'),
(194, 128, 7, 1, '2017-11-11 09:48:17'),
(195, 1, 7, 1, '2017-11-11 10:02:24'),
(196, 128, 8, 1, '2017-11-11 10:03:55'),
(197, 128, 8, 1, '2017-11-11 10:04:29'),
(198, 128, 7, 1, '2017-11-11 10:05:08'),
(199, 128, 8, 1, '2017-11-11 11:19:41'),
(200, 128, 2, 1, '2017-11-11 11:22:51'),
(201, 128, 1, 1, '2017-11-11 11:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `db_jenis_reward`
--

CREATE TABLE `db_jenis_reward` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `isDelete` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_jenis_reward`
--

INSERT INTO `db_jenis_reward` (`id`, `nama`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'VOUCHER', 0, '2017-09-24 10:21:49', '2017-09-24 10:21:49'),
(2, 'MONEY', 0, '2017-09-24 10:22:24', '2017-10-08 12:56:21'),
(3, 'TIKET', 1, '2017-09-24 10:22:59', '2017-09-28 07:50:46'),
(4, 'TRIP TIKET', 0, '2017-09-24 10:23:34', '2017-09-28 07:50:59'),
(5, 'CREDIT NOTE', 0, '2017-09-24 10:23:47', '2017-09-24 10:23:47'),
(6, 'DEBIT NOTE', 1, '2017-09-24 10:23:57', '2017-09-28 07:51:57'),
(7, 'GOLD BAR', 0, '2017-09-24 10:24:14', '2017-09-24 10:24:14'),
(8, 'FREE UNIT', 0, '2017-09-24 10:24:22', '2017-09-24 10:24:22'),
(9, 'DEMO UNIT', 0, '2017-09-24 10:24:28', '2017-09-24 10:24:28'),
(10, 'MOTOR', 0, '2017-09-24 10:25:45', '2017-09-24 10:25:45'),
(11, 'MOBIL', 0, '2017-09-24 10:25:50', '2017-09-24 10:25:50'),
(12, 'Hadiah 1', 1, '2017-09-29 15:32:47', '2017-09-29 15:41:07'),
(13, 'SMARTPHONE', 0, '2017-11-07 09:28:59', '2017-11-07 09:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `db_privileges`
--

CREATE TABLE `db_privileges` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_privileges`
--

INSERT INTO `db_privileges` (`id`, `nama`, `desc`) VALUES
(1, 'Lihat', 'Lihat daftar status pada Master Status'),
(2, 'Tambah', 'Tambah status pada Master Status'),
(3, 'Atur Urutan', 'Atur urutan pada Master Status'),
(4, 'Lihat', 'Lihat daftar status pada Master User'),
(5, 'Tambah', 'Tambah user baru'),
(6, 'Atur Akses', 'Atur akses masing-masing user'),
(7, 'Aktif / Non Aktifkan', 'Aktif / Nonaktifkan masing-masing user'),
(8, 'Lihat', 'Lihat daftar status pada Master Vendor'),
(9, 'Tambah', 'Tambah vendor baru pada Master Vendor'),
(10, 'Ubah', 'Ubah data vendor'),
(11, 'Hapus', 'Hapus vendor dari Master Vendor'),
(12, 'Lihat', 'Tambah barang pada Master Barang'),
(13, 'Tambah', 'Tambah barang baru pada Master Barang'),
(14, 'Ubah', 'Ubah data Barang'),
(15, 'Hapus', 'Hapus barang dari Master Barang'),
(16, 'Lihat', 'Lihat daftar pembelian pada Master Pembelian'),
(17, 'Tambah', 'Tambah Pembelian baru pada Master Pembelian'),
(18, 'Ubah', 'Ubah data pembelian pada Master Pembelian'),
(19, 'Hapus', 'Hapus data pembelian pada Master Pembelian'),
(20, 'Laporan', 'Lihat Laporan Pembelian'),
(21, 'Lihat', 'Lihat daftar reward pada Master Reward'),
(22, 'Tambah', 'Tambah reward baru pada Master Reward'),
(23, 'Ubah', 'Ubah data reward pada Master Reward'),
(24, 'Hapus', 'Hapus data reward pada Master Reward'),
(25, 'Laporan', 'Lihat Laporan Reward'),
(26, 'Lihat', 'Lihat daftar jenis reward pada Master Jenis Reward'),
(27, 'Tambah', 'Tambah jenis reward baru pada Master Jenis Reward'),
(28, 'Ubah', 'Ubah data jenis reward pada Master Jenis Reward'),
(29, 'Hapus', 'Hapus data jenis reward baru pada Master Jenis Reward'),
(30, 'Lihat', 'Lihat kontak person pada Master Kontak Person'),
(31, 'Tambah', 'Tambah kontak person baru pada Master KontaK Person'),
(32, 'Ubah', 'Ubah data kontak person pada Master Kontak Person'),
(33, 'Hapus', 'Hapus data kontak person pada Master Kontak Person');

-- --------------------------------------------------------

--
-- Table structure for table `db_privileges_detail`
--

CREATE TABLE `db_privileges_detail` (
  `id_privileges` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_privileges_detail`
--

INSERT INTO `db_privileges_detail` (`id_privileges`, `id_user`) VALUES
(21, 15),
(22, 15),
(23, 15),
(24, 15),
(25, 15),
(26, 15),
(27, 15),
(28, 15),
(29, 15),
(8, 15),
(9, 15),
(10, 15),
(11, 15),
(4, 15),
(5, 15),
(30, 15),
(6, 15),
(7, 15),
(1, 15),
(2, 15),
(3, 15),
(30, 15),
(31, 15),
(32, 15),
(33, 15),
(21, 10),
(22, 10),
(23, 10),
(24, 10),
(25, 10),
(26, 10),
(27, 10),
(28, 10),
(29, 10),
(8, 10),
(9, 10),
(10, 10),
(11, 10),
(4, 10),
(5, 10),
(30, 10),
(6, 10),
(7, 10),
(1, 10),
(2, 10),
(3, 10),
(30, 10),
(31, 10),
(32, 10),
(33, 10),
(21, 16),
(22, 16),
(23, 16),
(24, 16),
(25, 16),
(26, 16),
(27, 16),
(28, 16),
(29, 16),
(8, 16),
(9, 16),
(10, 16),
(11, 16),
(4, 16),
(5, 16),
(30, 16),
(6, 16),
(7, 16),
(1, 16),
(2, 16),
(3, 16),
(30, 16),
(31, 16),
(32, 16),
(33, 16),
(30, 18),
(21, 24),
(22, 24),
(23, 24),
(24, 24),
(25, 24),
(26, 24),
(27, 24),
(28, 24),
(29, 24),
(8, 24),
(9, 24),
(10, 24),
(11, 24),
(4, 24),
(5, 24),
(30, 24),
(6, 24),
(7, 24),
(1, 24),
(2, 24),
(3, 24),
(30, 24),
(31, 24),
(32, 24),
(33, 24),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(4, 1),
(5, 1),
(30, 1),
(6, 1),
(7, 1),
(1, 1),
(2, 1),
(3, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(21, 11),
(22, 11),
(23, 11),
(24, 11),
(25, 11),
(26, 11),
(27, 11),
(28, 11),
(29, 11),
(8, 11),
(9, 11),
(10, 11),
(11, 11),
(4, 11),
(5, 11),
(30, 11),
(6, 11),
(7, 11),
(1, 11),
(30, 11),
(31, 11),
(32, 11),
(33, 11),
(21, 12),
(22, 12),
(23, 12),
(25, 12),
(26, 12),
(27, 12),
(28, 12),
(8, 12),
(9, 12),
(10, 12),
(4, 12),
(5, 12),
(1, 12),
(30, 12),
(31, 12),
(32, 12),
(21, 13),
(22, 13),
(23, 13),
(25, 13),
(26, 13),
(27, 13),
(28, 13),
(8, 13),
(9, 13),
(10, 13),
(4, 13),
(5, 13),
(1, 13),
(30, 13),
(31, 13),
(32, 13),
(21, 17),
(22, 17),
(25, 17),
(26, 17),
(27, 17),
(8, 17),
(9, 17),
(4, 17),
(5, 17),
(1, 17),
(30, 17),
(31, 17),
(21, 19),
(22, 19),
(23, 19),
(25, 19),
(26, 19),
(27, 19),
(8, 19),
(9, 19),
(10, 19),
(4, 19),
(5, 19),
(1, 19),
(30, 19),
(31, 19),
(32, 19),
(21, 20),
(22, 20),
(23, 20),
(25, 20),
(26, 20),
(27, 20),
(28, 20),
(29, 20),
(8, 20),
(9, 20),
(10, 20),
(11, 20),
(4, 20),
(5, 20),
(30, 20),
(6, 20),
(7, 20),
(1, 20),
(30, 20),
(31, 20),
(32, 20),
(33, 20),
(21, 22),
(22, 22),
(25, 22),
(26, 22),
(27, 22),
(8, 22),
(9, 22),
(10, 22),
(4, 22),
(5, 22),
(1, 22),
(30, 22),
(31, 22),
(32, 22),
(21, 23),
(22, 23),
(25, 23),
(26, 23),
(27, 23),
(8, 23),
(9, 23),
(10, 23),
(4, 23),
(5, 23),
(1, 23),
(30, 23),
(31, 23),
(32, 23),
(21, 27),
(22, 27),
(23, 27),
(24, 27),
(25, 27),
(26, 27),
(27, 27),
(28, 27),
(29, 27),
(8, 27),
(9, 27),
(10, 27),
(11, 27),
(4, 27),
(5, 27),
(30, 27),
(6, 27),
(7, 27),
(1, 27),
(2, 27),
(3, 27),
(30, 27),
(31, 27),
(32, 27),
(33, 27),
(21, 21),
(22, 21),
(23, 21),
(25, 21),
(26, 21),
(27, 21),
(28, 21),
(8, 21),
(9, 21),
(10, 21),
(4, 21),
(5, 21),
(30, 21),
(1, 21),
(30, 21),
(31, 21),
(32, 21);

-- --------------------------------------------------------

--
-- Table structure for table `db_purchase`
--

CREATE TABLE `db_purchase` (
  `no_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `kode_vendor` int(11) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `no_po` varchar(20) NOT NULL,
  `no_do` varchar(20) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `tanggal_lunas` date NOT NULL,
  `total_beli` int(11) NOT NULL,
  `status_order` int(11) NOT NULL,
  `reward` varchar(500) NOT NULL,
  `is_reward` int(11) NOT NULL COMMENT '0 = tidak ada reward, 1 = ada reward, 2 = belum tau ada reward',
  `isDelete` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_purchase`
--

INSERT INTO `db_purchase` (`no_order`, `id_user`, `subject`, `kode_vendor`, `no_invoice`, `no_po`, `no_do`, `tanggal_beli`, `tanggal_lunas`, `total_beli`, `status_order`, `reward`, `is_reward`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 5, 'Perlengkapan Ruang Rapat Baru', 7, '485215410', '4511041', '154745', '2017-08-06', '0000-00-00', 2500000, 2, 'Jalan Ke Singapore', 1, 0, '2017-08-06 22:18:04', '2017-08-22 15:45:52'),
(2, 5, 'Pembelian Botol', 7, '', '', '', '2017-08-21', '0000-00-00', 5000000, 1, 'voucher 100rb', 1, 0, '2017-08-21 19:13:20', '2017-08-21 19:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `db_purchase_detail`
--

CREATE TABLE `db_purchase_detail` (
  `no_order` int(11) NOT NULL,
  `kode_barang` int(11) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_purchase_detail`
--

INSERT INTO `db_purchase_detail` (`no_order`, `kode_barang`, `keterangan`) VALUES
(1, 3, 'Merk Informa'),
(2, 21, 'beli 100 buah'),
(2, 17, '10 kotak');

-- --------------------------------------------------------

--
-- Table structure for table `db_rewards`
--

CREATE TABLE `db_rewards` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis_reward` int(11) NOT NULL,
  `id_contactperson` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `Quartal` varchar(5) NOT NULL,
  `keterangan_reward` varchar(1000) NOT NULL,
  `kode_vendor` int(11) NOT NULL,
  `idbrand` int(11) NOT NULL,
  `no_po` varchar(200) NOT NULL,
  `tanggal_buat` date NOT NULL,
  `tanggal_tagih` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `nama_cp` varchar(50) NOT NULL,
  `email_cp` varchar(50) NOT NULL,
  `telp_cp` varchar(50) NOT NULL,
  `user_selesai` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `memo` varchar(1000) NOT NULL DEFAULT '-',
  `keteranganclose` varchar(200) NOT NULL,
  `isDelete` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_rewards`
--

INSERT INTO `db_rewards` (`id`, `id_user`, `id_jenis_reward`, `id_contactperson`, `id_cabang`, `Quartal`, `keterangan_reward`, `kode_vendor`, `idbrand`, `no_po`, `tanggal_buat`, `tanggal_tagih`, `tanggal_selesai`, `nama_cp`, `email_cp`, `telp_cp`, `user_selesai`, `status`, `memo`, `keteranganclose`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, 5, '', 'RP 30.000.000,-', 2, 1, 'FX 1ST CN Q4 2015', '2017-09-24', '2017-09-25', '2017-10-19', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 1, 1, 'REBATE 1ST CHANNEL Q4 2015', '', 0, '2017-09-24 10:31:56', '2017-11-11 10:02:24'),
(2, 1, 2, 3, 5, 'Q4', 'US 5100', 2, 1, 'FX 1ST CN Q3 Q4 2016', '2017-09-24', '2017-09-25', '2017-09-24', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 14, 8, 'REBATE 1ST CHANNEL Q3 2016 SENILAI US3205 DAN Q4 Q2016 SENILAI US 3490, TOTAL US 6695.<br />FINAL DI KOREKSI SENILAI US 5100.', '', 0, '2017-09-24 10:51:37', '0000-00-00 00:00:00'),
(3, 12, 8, 8, 5, 'Q2', 'CONVERT T300 QTY 20', 1, 1, 'SUPPORT SERVICE CENTER 2017', '2017-09-24', '2017-09-25', '2017-11-10', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 12, 2, 'CONVERT SUPPORT SERVICE CENTER 40JT CONVERT T300 QTY 20 UNIT', '', 0, '2017-09-24 12:10:06', '0000-00-00 00:00:00'),
(4, 1, 8, 8, 5, 'Q4', 'CONVERT J3720 QTY 12, BT5000 QTY 7.', 1, 1, 'SUPPORT LKPP2', '2017-09-27', '2017-09-29', '2017-11-10', 'Desy', 'Desy.agnes@post.asaba.co.id', '081802399777', 12, 2, 'SUPPORT LKPP2 SENILAI 66JT CONVERT FREE UNIT J3720 QTY 12, BT5000 QTY 7.', '', 0, '2017-09-28 06:46:41', '0000-00-00 00:00:00'),
(6, 1, 2, 0, 5, '', 'RP 7.000.000,-', 2, 1, 'FX ROADSHOW JATIM', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 0, 1, 'SUPPORT ROADHSOW JATIM (DEDY, MARDI, INDRA)', '', 0, '2017-09-28 07:02:53', '2017-09-28 07:02:53'),
(7, 1, 2, 14, 5, 'Q4', 'US 5060', 6, 1, 'FX PAKET COLOUR Q4 2016', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistriro', 'yudistiro@fujixerox.com', '08156930444', 1, 8, 'BONUS PAKET COLOUR Q4 2016', '', 0, '2017-09-28 07:05:42', '0000-00-00 00:00:00'),
(8, 1, 4, 0, 5, '', 'TIKET VIETNAM', 2, 1, 'FX SELISIH 5K POINT ', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 0, 1, 'CONVERT 5K POINT SELISIH PEMBELIAN METRODATA', '', 0, '2017-09-28 07:44:18', '2017-09-28 07:44:18'),
(9, 1, 5, 14, 5, 'Q1', 'CN SENILAI 25% DARI PEMBELIAN TONER P115W', 6, 1, 'FX SUPPORT TONER P115W', '2017-09-28', '2017-09-29', '0000-00-00', 'Tika', 'sartika@harrisma.com', '08118118123', 1, 8, 'CN PRICE PROTECTION UTK TONER P115W QTY 300 UNIT', '', 0, '2017-09-28 07:56:06', '0000-00-00 00:00:00'),
(10, 1, 2, 10, 5, 'Q2', 'RP 3.500.000,-', 10, 1, 'FX COPIER SALES INSENTIF 2016', '2017-09-28', '2017-09-29', '0000-00-00', 'Syafril Tanjuang', 'Syafril.Tanjuang@fujixerox.com', '081', 1, 8, 'SALES INSENTIF PROGRAM FX COPIER', '', 0, '2017-09-28 08:01:35', '0000-00-00 00:00:00'),
(11, 1, 2, 14, 5, 'Q4', 'US 3626', 6, 1, 'FX PAKET TONER Q4 2016', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 0, 1, 'REBATE PAKET TONER Q4 2016', '', 0, '2017-09-28 08:04:17', '0000-00-00 00:00:00'),
(12, 1, 2, 3, 5, 'Q2', 'US 500.', 2, 1, 'FX SUPPORT ROADSHOW JATIM', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 1, 8, 'SUPPORT ROADSHOW AYOOKLIK JATIM P115W CONVERT US 500.', '', 0, '2017-09-28 08:07:40', '0000-00-00 00:00:00'),
(13, 1, 2, 3, 5, 'Q3', 'CASH 9.000.000,-', 2, 1, 'SUPPORT PAMERAN JOGJA', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 1, 8, 'SUPPORT PAMERAN JOGJA SENILAI 9JT', '', 0, '2017-09-28 08:08:55', '0000-00-00 00:00:00'),
(14, 1, 2, 14, 5, 'Q4', 'LENY UPDATE', 6, 1, 'FX PAKET MONO MIX Q4 2016', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudis', 'yudistiro@fujixerox.com', '08156930444', 1, 8, 'BONUS PAKET MONO MIX Q4 2016, MASIH DI HITUNG TIKA - RP 17.096.545 + 50RB X TOTAL UNIT', '', 0, '2017-09-28 08:12:08', '0000-00-00 00:00:00'),
(15, 1, 5, 6, 5, 'Q4', 'ANTHONY UPDATE', 8, 1, 'HP CONSUMER Q4 2016', '2017-09-28', '2017-09-29', '0000-00-00', 'Daru', 'Daru.brilyantarto@hp.com', '0816565682', 1, 7, 'HP CONSUMER REBATE Q4 2016', '', 0, '2017-09-28 08:21:23', '0000-00-00 00:00:00'),
(16, 1, 5, 0, 5, 'Q1', 'ANTHONY UPDATE', 8, 1, 'HP CONSUMER Q1 2017', '2017-09-28', '2017-09-29', '0000-00-00', 'Daru', 'Daru.brilyantarto@hp.com', '0816565682', 1, 7, 'HP CONSUMER REBATE Q1 2017', '', 0, '2017-09-28 08:28:47', '0000-00-00 00:00:00'),
(17, 1, 2, 0, 5, '', 'RP 120.000.000,-', 11, 1, 'PEMBELIAN 3 TIKET NZ', '2017-09-28', '2017-09-29', '0000-00-00', 'Indrawati CEO', 'pikai@airmasgroup.co.id', '08121832888', 0, 1, 'PEMBELIAN 3 TIKET NZ', '', 0, '2017-09-28 08:33:41', '2017-09-28 08:33:41'),
(18, 1, 4, 9, 5, 'Q2', 'TRIP THAILAND 1 TIKET', 10, 1, 'FX COPIER', '2017-09-28', '2017-09-29', '0000-00-00', 'Wijaya Jayadi', 'Wijaya.Jayadi@fujixerox.com', '08118018686', 0, 1, 'ARCHIEVMENT FX COPIER', '', 0, '2017-09-28 08:36:25', '0000-00-00 00:00:00'),
(19, 1, 1, 14, 5, 'Q1', 'VOUCHER RP 5.100.000,-', 6, 1, 'BROTHER SCANNER VOUCHER', '2017-09-28', '2017-09-29', '0000-00-00', 'Tika', 'sartika@harrisma.com', '08118118123', 27, 1, 'BONUS VOUCHER PEMBELIAN ADS1100 + ADS2100 + ADS2800 Q2 2017 DARI HARRISMA', '', 0, '2017-09-28 08:40:09', '2017-11-10 14:16:57'),
(20, 1, 5, 14, 5, 'Q1', 'JULI UPDATE', 6, 1, 'PANASONIC SCANNER', '2017-09-28', '2017-09-29', '0000-00-00', 'Handy', 'Handy.gunawan@harrisma.com', '081210003880', 1, 7, 'Selisih harga KVS1015 harga awal 3450, harga deal 3200.', '', 0, '2017-09-28 08:49:40', '0000-00-00 00:00:00'),
(21, 1, 5, 0, 5, '', 'RP 98.160.000,-', 3, 1, 'BROTHER T300 QTY 240', '2017-09-28', '2017-09-29', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '085959111125', 27, 1, 'Selisih harga support projek T300 qty 240', '', 0, '2017-09-28 08:58:13', '2017-11-11 07:59:35'),
(23, 1, 2, 6, 5, 'Q3', '50JT', 8, 1, 'HP PAMERAN EASTCOST', '2017-10-03', '2017-10-04', '0000-00-00', 'DARU', 'daru@gmail.com', '081', 1, 7, 'SUPPORT HP CONSUMER PAMERAN EASTCOST', '', 0, '2017-10-03 20:42:39', '0000-00-00 00:00:00'),
(24, 1, 2, 17, 5, 'Q3', 'RP 4.400.000,-', 3, 1, 'SUPPORT PPN J200', '2017-10-03', '2017-10-05', '2017-11-11', 'David', 'david.suryanto@brother.co.id', '081', 27, 3, 'SUPPORT PPN 22 UNIT J200 RETURN HARTONO ELECTRONIC', '', 0, '2017-10-04 05:38:04', '2017-11-11 07:06:27'),
(25, 1, 2, 12, 5, 'Q4', 'US500 / MONTH', 9, 1, 'HP SALES CABANG', '2017-10-03', '2017-10-05', '0000-00-00', 'Sri', 'sri.rezeki.dewi@hp.com', '081', 0, 1, 'SUPPORT SALES HP COMERCIAL UNTUK CABANG EKATALOG SELURUH INDONESIA TIMUR (BASE SURABAYA)', '', 0, '2017-10-04 05:52:24', '0000-00-00 00:00:00'),
(26, 1, 8, 19, 5, 'Q4', 'CONVERT BROTHER HL1211W QTY 3UNIT', 4, 1, 'BLUE ENGINE 2016', '2017-10-08', '2017-10-09', '2017-11-10', 'Cia', 'lauren@ecsindo.com', '082210253555', 12, 2, 'BLUE ENGINE FEBRUARI - MARET 2017 NOMINAL 3JT CONVERT KE BROTHER HL1211W QTY 3 UNIT', '', 0, '2017-10-08 10:22:12', '0000-00-00 00:00:00'),
(27, 1, 2, 27, 5, 'Q4', 'CASH 20JT UTK PEMBELIAN TIKET CHINA TOUR 2 TIKET', 11, 1, 'SCANNER PTOUCH 2016', '2017-10-08', '2017-11-02', '0000-00-00', 'David', 'david.suryanto@brother.co.id', '081803248488', 0, 1, 'ARCHIEVMENT BROTHER SCANNER N PTOUCH 2017<br />1 Tiket buat Teddy Harrisma, dan 2 Tiket di jual ke AMP. (TAGIHAN KE AMP)', '', 0, '2017-10-08 10:25:09', '0000-00-00 00:00:00'),
(28, 1, 8, 8, 5, 'Q4', 'CONVERT FREE UNIT BROTHER J3530 QTY 44 UNIT', 1, 1, 'BROTHER BONUS YEARLY', '2017-10-08', '2017-10-09', '2017-11-10', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 12, 2, 'BROTHER ADDITIONAL BONUS 1.5% ARCHIEVMENT YEARLY 2016 SENILAI 201.597.000,- CONVERT FREE UNIT', '', 0, '2017-10-08 10:30:46', '0000-00-00 00:00:00'),
(29, 1, 8, 8, 5, 'Q3', 'CONVERT T500 QTY 28 UNIT', 1, 1, 'PAKET TINTA DEALER 2016', '2017-10-08', '2017-10-09', '2017-11-10', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 12, 2, 'BROTHER INKJET PROGRAM DEALER PEMBELIAN PAKET TINTA 2016', '', 0, '2017-10-08 10:47:46', '0000-00-00 00:00:00'),
(30, 1, 2, 0, 5, 'Q2', 'CASH 25.000.000,-', 3, 1, 'BROTHER BONUS TN261', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '085959111125', 0, 1, 'SUPPORT BONUS DARI PEMBELIAN TN261 QTY 1200 PCS', '', 0, '2017-10-08 10:50:07', '2017-10-08 10:50:07'),
(31, 1, 8, 0, 5, 'Q3', 'SUPPORT TINTA SENILAI 3JT', 1, 1, 'ASABA SUPPORT TINTA ', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 0, 1, 'ASABA ANTON SUPPORT 3JT FREE TINTA UTK PEMBELIAN 2016', '', 0, '2017-10-08 10:54:47', '2017-10-08 10:54:47'),
(32, 1, 5, 8, 5, 'Q1', 'LADY UPDATE', 1, 1, 'REBATE Q1 BROTHER 2017', '2017-10-08', '2017-10-09', '2017-11-10', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 1, 1, 'REBATE Q1 BROTHER 2017 PERIODE APRIL SD JUNI, DISKON DAN BLINK BONUS.', '', 0, '2017-10-08 11:06:21', '0000-00-00 00:00:00'),
(33, 1, 5, 8, 5, 'Q2', 'LADY UPDATE', 1, 1, 'REBATE Q2 BROTHER 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 27, 1, 'REBATE Q2 BROTHER JULI SEPTEMBER, REBATE 1% PAKET BONUS BANYAK AGUSTUS DAN BLINK BONUS 2%', '', 0, '2017-10-08 11:08:22', '0000-00-00 00:00:00'),
(34, 1, 8, 8, 5, 'Q1', 'CONVERT 3520 QTY 4 UNIT', 1, 1, 'BROTHER PROJEK PEMKOT SURABAYA', '2017-10-08', '2017-10-09', '2017-11-10', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 12, 2, 'SUPPORT PROJEK PEMKOT CONVERT J3520 QTY 4 ', '', 0, '2017-10-08 11:12:51', '0000-00-00 00:00:00'),
(35, 1, 5, 8, 5, 'Q1', 'CN 23.900.000,-', 1, 1, 'SUPPORT J SERIES', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 0, 1, 'SUPPORT J105, J200 @50rb, J3520 @100rb.', '', 0, '2017-10-08 11:16:53', '0000-00-00 00:00:00'),
(36, 1, 2, 0, 5, 'Q4', 'NILAI SELISIH 982.085', 4, 1, 'SELISIH REBATE Q2 Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 0, 1, 'SELISIH PERHITUNGAN REBATE Q2, Q3 2016', '', 0, '2017-10-08 11:20:32', '0000-00-00 00:00:00'),
(37, 1, 8, 18, 5, 'Q4', 'CASH 6.011.400', 4, 1, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '2017-10-19', 'Leo', 'lukas_leo@ecsindo.com', '081', 10, 1, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', '', 0, '2017-10-08 11:22:42', '0000-00-00 00:00:00'),
(38, 1, 5, 19, 5, 'Q4', 'CN 12JT', 4, 1, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 10, 1, 'BONUS PEMBELIAN PAKET PRINTER BROTHER 4% Q4 2016', '', 0, '2017-10-08 11:24:43', '0000-00-00 00:00:00'),
(39, 1, 2, 0, 5, 'Q1', 'CASH 7.714.000,-', 3, 1, 'SUPPORT PPN J3520', '2017-10-08', '2017-10-09', '2017-11-06', 'Susanto', 'susanto.liu@brother.co.id', '081', 10, 3, 'SUPPORT RETURN PPN HARTONO J3520 QTY 14', '', 0, '2017-10-08 11:52:14', '2017-11-06 14:28:39'),
(40, 1, 5, 19, 5, 'Q2', 'LADY UPDATE', 4, 1, 'PROJEK 2540 + 2700', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 10, 1, 'SUPPORT CN PROJEK 2540 + 2700, NILAI REAL 1.950.000,-', '', 0, '2017-10-08 11:55:44', '0000-00-00 00:00:00'),
(41, 1, 2, 17, 5, 'Q2', 'CASH 10.500.000,-', 3, 1, 'PROMOTOR HARTONO', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 1, 8, 'SUPPORT PROMOTOR HARTONO ELECTRONIC 3 BULAN @3.5JT (JULI SD SEPTEMBER)', '', 0, '2017-10-08 12:01:58', '0000-00-00 00:00:00'),
(42, 1, 2, 17, 5, 'Q1', 'CASH 15.000.000,-', 3, 1, 'PROMOTOR PTOUCH HITECH', '2017-10-08', '2017-10-09', '0000-00-00', 'Redy', 'redy.manlin@brother.co.id', '081', 27, 1, 'SUPPORT PROMOTOR PTOUCH HITECHMALL @3JT / BULAN, START DARI JUNI SD OKTOBER', '', 0, '2017-10-08 12:06:28', '0000-00-00 00:00:00'),
(43, 1, 2, 17, 5, 'Q2', 'JULI UPDATE', 3, 1, 'KONSINYASI HARTONO', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 27, 1, 'SUPPORT KONSINYASI 1% UNTUK HARTONO ELECTRONIK SELAMA 3 BULAN', '', 0, '2017-10-08 12:09:32', '2017-11-11 07:58:30'),
(44, 1, 2, 17, 5, 'Q1', 'JULI UPDATE', 3, 1, 'KONSINYASI DEALER', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 27, 1, 'SUPPORT KONSINYASI DEALER 1% / BULAN START JULI', '', 0, '2017-10-08 12:10:41', '2017-11-11 07:58:22'),
(45, 1, 4, 17, 5, 'Q1', 'TIKET KOREA 20 DEALER', 3, 1, 'BROTHER TRIP KOREA', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 1, 7, 'PROGRAM PAKET INKJET DEALER TRIP KOREA 20 TIKET', '', 0, '2017-10-08 12:13:12', '0000-00-00 00:00:00'),
(46, 1, 2, 17, 5, 'Q1', 'CASH 5JT', 3, 1, 'BROTHER ISHOP VAGANZA', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 1, 8, 'PROGRAM BROTHER ISHOP VAGANZA 2016 SENILAI 5JT', '', 0, '2017-10-08 12:14:53', '0000-00-00 00:00:00'),
(47, 1, 2, 3, 5, 'Q1', 'US 2200,-', 2, 1, 'FX SUPPORT P115W', '2017-10-08', '2017-10-09', '0000-00-00', 'Yudistiro', 'Yudistiro@fujixerox.com', '081', 1, 8, 'SUPPORT PROTEKSI HARGA PRINTER P115W SENILAI 30JT CONVERT US 2200.', '', 0, '2017-10-08 12:32:04', '0000-00-00 00:00:00'),
(48, 1, 2, 14, 5, 'Q1', 'LENI UPDATE', 6, 1, 'FX SUPPORT PRINTER TYPE VALUE', '2017-10-08', '2017-10-09', '0000-00-00', 'Tika', 'sartika@harrisma.com', '081', 1, 8, 'FX SUPPORT PRINTER TYPE VALUE - SELVIE', '', 0, '2017-10-08 12:36:00', '0000-00-00 00:00:00'),
(49, 1, 5, 0, 5, 'Q2', 'LENI UPDATE', 8, 1, 'HP CONSUMER Q2 2017', '2017-10-08', '2017-10-09', '2017-10-23', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 7, 'HP CONSUMER REBATE Q2 2017', '', 0, '2017-10-08 12:59:43', '2017-10-23 13:51:33'),
(50, 1, 2, 0, 5, 'Q3', 'CASH 72.327.776,-', 8, 1, 'HP CONSUMER Q3 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 1, 'HP CONSUMER Q3 2017', '', 0, '2017-10-08 13:02:20', '2017-10-09 07:45:20'),
(51, 1, 5, 6, 5, 'Q4', 'PPFR + Linnearity (2.5%+0.8%) dari achievement 1.500.000.000,- ( cap 150%)<br />', 8, 1, 'HP CONSUMER Q4 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 1, 'HP CONSUMER Q4 2017', '', 0, '2017-10-08 13:04:36', '0000-00-00 00:00:00'),
(52, 1, 2, 6, 5, 'Q3', 'CASH 24.640.000 ', 8, 1, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 1, 'SUPPORT CLOSING Q3 2017 & SUPPORT untuk 2529 + 3835<br />sudah dibuatkan invoice ke M3kom', '', 0, '2017-10-08 13:06:59', '0000-00-00 00:00:00'),
(53, 1, 4, 5, 5, 'Q4', '1 TIKET BANGKOK - di convert ke uang, senilai 7jt (blm dipot dengan admin travel agent)', 14, 1, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '2017-10-21', 'Yulius', 'yulius.sugianto@techdata.com', '081', 10, 1, '1 TIKET TRIP BANGKOK', '', 0, '2017-10-14 23:52:17', '0000-00-00 00:00:00'),
(56, 1, 9, 13, 5, 'Q3', 'Demo unit CM225FW<br />qty 5', 6, 1, 'CM225FW', '2017-11-01', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'berdasarkan MOM kita diberikan CM225FW qty 5', '', 0, '2017-11-01 18:34:55', '0000-00-00 00:00:00'),
(58, 20, 4, 28, 8, 'Q4', 'Trip ke Singapore selama 3 hari 2 malam ', 15, 1, 'Support Trip Singapura', '2017-11-06', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Based on Promo Confirmation no.546/ECOM/IV/2017, Target PO Rp 250.000.000 (sebelum PPn)', '', 0, '2017-11-06 10:29:20', '0000-00-00 00:00:00'),
(59, 0, 1, 29, 5, 'Q3', 'Package A: Total CA 300 unit, Reward DJI Drone/Fujifilm Mirrorless X-A3<br />\rPackage B: Total CA 200 unit, Reward Go Pro Hero<br />\rPackage C: Total CA 100 unit, Reward Travel Voucher @IDR 2.000.000', 16, 1, 'LENOVO CON T2 ST Package Q3 FY1718', '2017-11-06', '2017-11-20', '0000-00-00', '', '', '', 0, 1, 'Detail Paket Mandatory Based on PRF6361 - CON T2 FY17 Q3 ID', '', 0, '2017-11-06 13:35:24', '2017-11-06 13:35:24'),
(60, 20, 1, 29, 8, 'Q3', 'Package A: Target 300 unit, Reward DJI Drone/Fujifilm Mirrorless X-A3<br />Package B: Target 200 unit, Reward Go Pro Hero<br />Package C: Target 100 unit, Reward Travel Voucher @ IDR 2.000.000', 16, 1, 'LENOVO CON T2 ST Package Q3 FY1718', '2017-11-06', '2017-11-20', '0000-00-00', '', '', '', 20, 8, 'Detail paket mandatory based on PRF6361 - CON T2 FY17 Q3 ID', '', 0, '2017-11-06 13:39:32', '2017-11-10 17:54:31'),
(62, 10, 5, 17, 5, 'Q3', 'CASH 6.150.000,-', 3, 1, 'PRICE PROTECTION H105', '2017-11-06', '2017-11-07', '0000-00-00', '', '', '', 0, 1, 'SUPPORT PRICE PROTECTION PTOUCH H105 @150RB / UNIT.', '', 0, '2017-11-06 14:12:16', '2017-11-06 14:12:16'),
(63, 10, 1, 17, 5, 'Q2', 'VOUCHER 1JT', 3, 1, 'BROTHER SCANNER ADS2100', '2017-11-06', '2017-11-07', '0000-00-00', '', '', '', 0, 1, 'SUPPORT FREE VOUCHER ADS 2100 @200RB.', '', 0, '2017-11-06 14:14:43', '2017-11-06 14:14:43'),
(64, 10, 5, 8, 5, 'Q2', 'CN 16.8JT', 1, 1, 'SUPPORT SALES INCENTIF T300', '2017-11-06', '2017-11-08', '0000-00-00', '', '', '', 0, 1, 'SUPPORT T300 @25.000,- PER UNIT (KLAIM 672 UNIT / 270 UNIT)', '', 0, '2017-11-06 14:18:39', '0000-00-00 00:00:00'),
(65, 20, 2, 29, 8, 'Q3', 'Lenovo Sell Out Booster for Entry Category Celeron 11\\", additional incentive 10.000/unit', 16, 1, 'LENOVO SELL OUT BOOSTER Q3 FY17FY18', '2017-11-06', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Based on PRF6456 CON T2 FY17 Q3 ID', '', 0, '2017-11-06 14:30:00', '2017-11-06 14:30:00'),
(66, 20, 2, 29, 8, 'Q3', 'Lenovo ST PRM Q3 FY1718<br />Quota Revenue NB IDR 984.000.000<br />Quota Revenue DT IDR 986.000.000', 16, 1, 'LENOVO ST PRM Q3 FY1718', '2017-11-06', '2017-11-07', '0000-00-00', '', '', '', 0, 1, 'Update achievement per ST PRM 03 Nov 2017, Achievement 139.78% Achievement DT 145.68% ', '', 0, '2017-11-06 14:46:21', '2017-11-06 14:46:21'),
(67, 20, 1, 30, 8, 'Q4', 'Get Shopping Voucher IDR 500.000 with min revenue IDR 25.000.000 or IDR 1.200.000 with min revenue IDR 50.000.000 or 2.600.000 with min revenue 100.000.000 (per 20 Oct 17 - 31 Dec 17)', 7, 1, 'EXCITING REWARDS ON SYMANTEC', '2017-11-06', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Promo Synnex Symantec product Per 20 Oct 2017 - 31 Dec 2017', '', 0, '2017-11-06 15:04:52', '2017-11-06 15:04:52'),
(68, 20, 4, 4, 8, 'Q1', 'Brother promo trip to Mongolia dengan pembelian printer & consumables senilai IDR 500.000.000 (exc ppn) per @Distri', 3, 1, 'ADVENTURE MONGOLIA', '2017-11-06', '2018-04-01', '0000-00-00', '', '', '', 10, 1, 'Periode promo 01 Sep 17 - 31 Mar 18, berlaku kelipatan, Jadwal penerbangan TBA', '', 0, '2017-11-06 15:48:47', '2017-11-06 19:39:32'),
(69, 20, 1, 31, 8, 'Q4', 'Setiap pembelian AV121 dapat voucher Rp200.000, Pembelian AD240 dapat voucher Rp500.000', 17, 1, 'Beli Scanner Avision dapat Voucher', '2017-11-06', '2017-12-31', '0000-00-00', '', '', '', 1, 1, 'Periode Promo 01 Oct 2017 -  30 Dec 2017', '', 0, '2017-11-06 17:03:35', '2017-11-06 19:53:41'),
(77, 20, 13, 32, 8, 'Q4', 'Point achievement bottom 5000 point to get Smartphone Axioo m5, top 60000 point to get Honda Vario 150cc&lt;br /&gt;(Periode 01Oct&#039;17-31Dec17)', 18, 1, 'Rainer Promo Okdes', '2017-11-07', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Detail Rainer Model dan Point based on flyer Promo Okdes Terangkanlah', '', 0, '2017-11-07 09:42:41', '2017-11-07 09:42:41'),
(78, 20, 1, 33, 8, 'Q4', 'Microsoft On Premise: Target Revenue IDR 250.000.000 get Voucher IDR 1.250.000&lt;br /&gt;Microsoft Cloud: Target Revenue IDR 100.000.000 get Voucher IDR 1.000.000&lt;br /&gt;(Periode 01Jul17 -  20Dec17)', 7, 1, 'SMI MICROSOFT YEAR END PROMO', '2017-11-07', '2017-12-21', '0000-00-00', '', '', '', 0, 1, 'Based on flyer promo SMI Microsoft Year End Promo&lt;br /&gt;Promo berlaku kelipatan', '', 0, '2017-11-07 10:10:49', '2017-11-07 10:10:49'),
(79, 20, 7, 33, 8, 'Q4', 'Buy 50 Lisensi Microsoft Cloud, get Logam Mulia 10gr. Buy 100 Lisensi Microsoft Cloud, get Logam Mulia 15gr&lt;br /&gt;Buy all Produk Microsoft Rp 200jt, get Logam Mulia 10gr. Buy all Produk Microsoft Rp 600jt, get Logam Mulia 20gr&lt;br /&gt;(Periode 02Oct17-15Dec17) ', 7, 1, 'SMI MICROSOFT PESTA EMAS', '2017-11-07', '2017-12-16', '0000-00-00', '', '', '', 0, 1, 'Tidak berlaku kelipatan, Tidak berlaku untuk pembelian tipe lic academic, government, charity; Tidak berlaku untuk penggunaan rumahan', '', 0, '2017-11-07 10:38:48', '2017-11-07 10:38:48'),
(80, 20, 7, 33, 8, 'Q4', 'Buy License Cloud 50unit, Reward LM 5gr. License Cloud 100unit, Reward LM 10gr. License On Prem 200jt, Reward LM 2gr. License On Prem 600jt, Reward LM 10gr&lt;br /&gt;(Periode 02Oct17-30Nov17)', 7, 1, 'SMI MICROSOFT PESTA LOGAM MULIA', '2017-11-07', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Promo untuk SMB Partner. Tidak berlaku kelipatan. Tidak berlaku untuk pembelian tipe Lic Academic, Government, Charity. Tidak berlaku untuk lic penggunaan rumahan', '', 0, '2017-11-07 11:07:14', '2017-11-07 11:07:14'),
(81, 20, 7, 33, 8, 'Q4', 'Target Rev CSP Lic based (O365,Dynamic,EMS) IDR10jt, Reward LM 5gr. Target Rev CSP Usage based (MS Azure) IDR30jt, Reward LM 5gr (Periode 02Oct17-08Jan18) ', 7, 1, 'SMI CSP PARTNER INCENTIVES LM', '2017-11-07', '2018-01-09', '0000-00-00', '', '', '', 0, 1, 'Berlaku untuk produk Microsoft Cloud CSP, Tidak berlaku pembelian lic untuk penggunaan rumahan', '', 0, '2017-11-07 11:21:40', '2017-11-07 11:21:40'),
(82, 20, 1, 33, 8, 'Q4', 'Dapatkan Shopping Voucher 500rb dengan min transaksi Ms CSP 2jt (Periode Agustus - December 2017)', 7, 1, 'SMI MICROSOFT CSP', '2017-11-07', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Hanya untuk cust baru selama periode promo. Min 3 cust', '', 0, '2017-11-07 11:40:29', '2017-11-07 11:40:29'),
(83, 20, 2, 34, 8, 'Q4', 'Support Branding Mobil AirMas Rp. 11.000.000 incl PPN', 3, 1, 'BROTHER BRANDING MOBIL BOX AIR', '2017-11-07', '2017-11-08', '0000-00-00', '', '', '', 0, 1, 'Invoice sudah dibuat dan dikirim ke vendor', '', 0, '2017-11-07 12:08:40', '2017-11-07 12:08:40'),
(84, 0, 2, 35, 5, 'Q4', 'Support Branding Mobil AirMas Rp. 11.000.000 incl PPN', 19, 1, 'PANASONIC BRANDING MOBIL BOX AIR', '2017-11-07', '2017-11-08', '0000-00-00', '', '', '', 0, 1, 'Invoice sudah di buat dan di kirim ke vendor', '', 0, '2017-11-07 13:39:20', '2017-11-07 13:39:20'),
(85, 20, 11, 35, 8, 'Q4', 'Support Branding Mobil AirMas Rp. 11.000.000 incl PPN', 19, 1, 'PANASONIC BRANDING MOBIL BOX AIR', '2017-11-07', '2017-11-08', '0000-00-00', '', '', '', 20, 7, 'Invoice sudah dibuat dan dikirim ke vendor ', '', 0, '2017-11-07 13:41:07', '2017-11-08 18:13:43'),
(86, 20, 1, 36, 8, 'Q4', 'Total Pembelian APC HBN sebelum PPN IDR 25jt Reward Shopping Voucher IDR 150rb, 50jt Reward 350rb, 100jt Reward 1,75jt, 200jt Reward 4jt, 350jt Reward 9jt, 500jt Reward 1pax HK&amp;Macau Tour, 750jt Reward 2pax HK&amp;Macau Tour (Periode 09Oct17-29Dec17)', 20, 1, 'INGRAM APC HBN PROGRAM', '2017-11-07', '2017-12-30', '0000-00-00', '', '', '', 0, 1, 'Tidak berlaku untuk special project price', '', 0, '2017-11-07 15:18:39', '2017-11-07 15:18:39'),
(87, 20, 5, 37, 8, 'Q4', 'Target Sell in dengan pengambilan ke Distri Resmi (Synnex, Visiland, Galva) Tot IDR 800jt (Periode 27Sept17-15Dec17)&lt;br /&gt;&gt;=100% incentive 0.5% . &gt;=80% - &lt;100% proporsional incentive', 21, 1, 'ACER ELITE PARTNER (AEP) DESKTOP', '2017-11-07', '2017-12-16', '0000-00-00', '', '', '', 0, 1, ' Closing Date sebagai berikut : Oct : 26 Oct 2017, Nov : 24 Nov 2017, Dec : 15 Dec 2017', '', 0, '2017-11-07 16:58:24', '2017-11-07 16:58:24'),
(88, 20, 2, 38, 8, 'Q4', 'Rebate FY17 Total IDR 2.000.000.000 (Target Q1 Rp 380jt, Q2 Rp 480jt, Q3 Rp 500jt, Q4 Rp 640jt)', 22, 1, 'APC REBATE FY17', '2017-11-08', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Q1 achieve Rp 875.218.945, Q2 achieve Rp 963.585.710, Q3 achieve Rp 859.209.404', '', 0, '2017-11-08 10:22:15', '2017-11-08 10:22:15'),
(89, 20, 2, 39, 8, 'Q4', 'LKPP REBATE CLAIM BROTHER BIP 2016 Batch 1 (Rp 157.107.000)', 3, 1, 'REBATE CLAIM BROTHER BIP 2016', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Rebate Rp 157.107.000 sudah dibayarkan oleh Brother&lt;br /&gt;cc. Finance, bantu check ya', '', 0, '2017-11-08 12:01:14', '2017-11-08 18:12:30'),
(90, 20, 2, 39, 8, 'Q4', 'LKPP REBATE CLAIM BROTHER BIP 2016 - batch 2 (Rp. 16.771.000 incl PPN)', 3, 1, 'REBATE CLAIM BROTHER BIP 2016', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 0, 1, 'cc. Finance, tolong dibuatkan invoice ke PT.Brother Indonesia', '', 0, '2017-11-08 12:06:02', '2017-11-08 12:06:02'),
(91, 0, 5, 40, 5, 'Q4', 'Desktop AIO Acer Sell Thru Program AC22-760 (DQ.B6VSN.004/UD.B6VSD.002)&lt;br /&gt;Package S: Qty 5 unit, Reward IDR 400.000&lt;br /&gt;Package L: Qty 20 unit, Reward IDR 4.000.000', 7, 1, 'SMI AIO ACER PROGRAM NOV 2017', '2017-11-08', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Promo selama Nov 2017', '', 0, '2017-11-08 13:49:41', '2017-11-08 13:49:41'),
(92, 20, 5, 40, 8, 'Q4', 'Desktop AIO Sell Thru Program AC22-760 (PN DQ.B6VSN.004/UD.B6VSD.002)&lt;br /&gt;Package S: Qty 5 unit, Reward cashback IDR 400.000&lt;br /&gt;Package L: Qty 20 unit, Reward cashback IDR 4.000.000', 7, 1, 'SMI AIO ACER PROGRAM NOV 2017', '2017-11-08', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Periode Promo selama bulan Nov 2107', '', 0, '2017-11-08 13:54:29', '2017-11-08 13:54:29'),
(93, 20, 2, 41, 8, 'Q2', 'Payout ID ID60REA170810_0170, Program ID ID1702128117 (Total Amount Rp 91.399.779) ', 23, 1, 'ARMINDO - Q2FY17 5T Consumer T2 Program', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0017&lt;br /&gt;CC.Finance', '', 0, '2017-11-08 14:24:49', '2017-11-08 18:10:50'),
(94, 20, 2, 41, 8, 'Q3', 'Payout ID #ID60REA171009_0043, Program ID #ID1705131286 (Total Amount Rp 4.797.100)', 24, 1, 'ARMINDO - Q3FY17 OPS HW Stretch Program', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0016&lt;br /&gt;cc. Finance', '', 0, '2017-11-08 15:45:13', '2017-11-08 18:10:39'),
(95, 20, 2, 41, 8, 'Q2', 'Payout ID #ID60REA171018_0069, Program ID #ID1702128117 (Total Amount Rp 91.399.778)', 23, 1, 'ARMINDO - Q2FY17 5T Consumer T2 Program', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0018&lt;br /&gt;cc. Finance', '', 0, '2017-11-08 15:51:26', '2017-11-08 18:10:29'),
(96, 20, 2, 41, 8, 'Q1', 'Add Deal Coop Q1 2017 (Total Amount Rp 27.000.000)', 24, 1, 'ARMINDO - Add Deal Coop Q1 2017', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0020&lt;br /&gt;cc. Finance', '', 0, '2017-11-08 15:56:43', '2017-11-08 18:10:19'),
(97, 20, 2, 41, 8, 'Q2', 'Add Deal Coop Q2 2017 (Total Amount Rp 27.000.000)', 24, 1, 'ARMINDO - Add Deal Coop Q2 2017', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0021&lt;br /&gt;cc. Finance', '', 0, '2017-11-08 15:58:36', '2017-11-08 18:10:02'),
(98, 20, 2, 41, 8, 'Q3', 'Add Deal Coop Q3 2017 (Total Amount Rp 27.000.000)', 24, 1, 'ARMINDO - Add Deal Coop Q3 2017', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0019&lt;br /&gt;cc. Finance', '', 0, '2017-11-08 16:00:18', '2017-11-08 18:09:48'),
(99, 20, 2, 41, 8, 'Q2', 'Payout ID#ID60REA170814_0030, Program ID#ID1702128141 (Total Amount Rp 158.400.000)', 23, 1, 'ARMINDO - 1N Q2FY17  T2 Program - Consumer Jabo', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/VIII/0014', '', 0, '2017-11-08 16:54:43', '2017-11-08 18:09:30'),
(100, 20, 2, 41, 8, 'Q2', 'Payout ID #ID60REA171024_0171, Program ID #ID60REA1702128141 (Total Amount Rp 160.319.818)', 23, 1, 'ARMINDO - 1N Q2FY17 T2 Program - Consumer Jabo', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0019&lt;br /&gt;cc. Finance', '', 0, '2017-11-08 16:56:42', '2017-11-08 18:09:18'),
(101, 20, 2, 24, 8, 'Q2', 'Rebate Total Rp 1.492.719.041', 24, 1, 'PPS-PPFR2017Q2', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Payout ID#1812011 Invoice Tagihan #IN/AMP/2017/XI/0250 cc. Finance', '', 0, '2017-11-09 11:46:32', '0000-00-00 00:00:00'),
(102, 20, 2, 24, 8, 'Q3', 'Rebate MVC Total Rp  1.059.629.695', 24, 1, 'MVC2017Q3Jul', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Payout ID#1814707 Invoice Tagihan #IN/AMP/2017/XI/0245 cc. Finance', '', 0, '2017-11-09 12:02:42', '0000-00-00 00:00:00'),
(103, 20, 2, 24, 8, 'Q2', 'ASPEN Q2 Total Rp 375.072.842', 25, 1, 'Q2FY17 5T Commercial T2 Program', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Payout ID#ID60REA170810_0002, Program ID#ID1702128114, Invoice Tagih #IN/AMP/2017/XI/0247<br />cc. Finance', '', 0, '2017-11-09 13:38:15', '0000-00-00 00:00:00'),
(104, 20, 2, 24, 8, 'Q2', 'Total Payout Rp 345.846.566', 25, 1, '1N Q2FY17 T2 Program - Commercial', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Payout ID#ID60REA170811_0014 Program ID#ID1702128125, Invoice Tagih #IN/AMP/2017/XI/0248 cc. Finance', '', 0, '2017-11-09 13:48:19', '0000-00-00 00:00:00'),
(105, 20, 2, 24, 8, 'Q4', 'Total Payable Rp 140.411.326', 24, 1, 'Support Roadshow Ayooklik', '2017-11-09', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Support Roadshow Ayooklik Kota Banjarmasin, Banten, Pontianak, Ternate, Lampung (invoice to PT Bright Brilliant #IN/AMP/2017/IX/0311) Pending akhir tahun', '', 0, '2017-11-09 14:01:11', '0000-00-00 00:00:00'),
(106, 20, 2, 24, 8, 'Q2', 'Total Payout Rp 11.000.000', 24, 1, 'Support Q2FY17', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Claim Support Gathering Airmas 2017 (invoice to PT Quantum Ciptakreasi #IN/AMP/2017/VIII/0366) cc. Finance', '', 0, '2017-11-09 14:13:49', '0000-00-00 00:00:00'),
(107, 20, 2, 24, 8, 'Q2', 'Total Payable Rp 1.500.746.566', 24, 1, 'PPS-PPFR Q2FY2017', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Payout ID#1797045, Invoice Tagih #IN/AMP/2017/VI/01254 cc. Finance', '', 0, '2017-11-09 14:29:30', '0000-00-00 00:00:00'),
(108, 20, 2, 24, 8, 'Q4', 'Total Payable Rp 57.000.000', 24, 1, 'Support Elite X2 Digital Advertising', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagih #IN/AMP/2017/IV/00923 (bill to SMI)... Pending Bu Irma, ganti jd 2u NB (dipakai Pak Hendra dan Bu Dilla)', '', 0, '2017-11-09 14:47:21', '0000-00-00 00:00:00'),
(109, 20, 2, 24, 8, 'Q4', 'Total Rp 299.188.930', 24, 1, 'MVC2017Q4Aug', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Rebate MVC Payout ID#1836110 Invoice Tagih #IN/AMP/2017/XI/0246 cc. Finance', '', 0, '2017-11-09 14:58:09', '0000-00-00 00:00:00'),
(110, 20, 2, 24, 8, 'Q4', 'Total Rp  175.437.577', 24, 1, 'MVC2017Q4Sep', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Rebate Payout ID#1838797 Invoice Tagih #IN/AMP/2017/XI/0249 cc. Finance', '', 0, '2017-11-09 15:04:20', '0000-00-00 00:00:00'),
(111, 20, 2, 24, 8, 'Q4', 'Total Rp 70.000.000', 24, 1, 'Support Gathering Airmas Group 2017', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagih #IN/AMP/2017/V/01127 cc. Finance', '', 0, '2017-11-09 15:24:17', '0000-00-00 00:00:00'),
(112, 20, 2, 24, 8, 'Q4', 'Total Rp 104.869.270', 24, 1, 'HP Vehicle Branding For Air Mas', '2017-11-09', '2017-11-13', '0000-00-00', '', '', '', 0, 1, 'Payout ID #10672168, Invoice Tagih #IN/AMP/2017/X/0339 cc. Finance', '', 0, '2017-11-09 15:30:00', '0000-00-00 00:00:00'),
(113, 20, 2, 24, 8, 'Q4', 'Total Rp 92.984.100', 24, 1, 'HP Digital Advertising with AMP', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Entry ID#1170, Invoice Tagih #IN/AMP/2017/X/0341 (bill to PT Quantum Ciptakreasi)', '', 0, '2017-11-09 15:35:27', '0000-00-00 00:00:00'),
(114, 20, 2, 24, 8, 'Q4', 'Total Rp 104.869.270', 24, 1, 'HP Champion Program for AMP', '2017-11-09', '2017-11-13', '0000-00-00', '', '', '', 0, 1, 'Entry ID #10672169, Invoice Tagih #IN/AMP/2017/X/0340', '', 0, '2017-11-09 15:44:37', '0000-00-00 00:00:00'),
(115, 20, 2, 24, 8, 'Q4', 'Total Rp 48.939.000', 24, 1, 'Closing LKPP Ayooklik', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Entry ID #10672208, Invoice Tagih #IN/AMP/2017/X/0342 (Inv bill to PT Quantum Ciptakreasi)', '', 0, '2017-11-09 15:59:54', '0000-00-00 00:00:00'),
(116, 20, 2, 42, 8, 'Q3', 'REBATE INCENTIVE IDR 28,875,000 (before vat)', 26, 1, 'Q3FY17 T2 Dell Incentive Program (DIP)', '2017-11-10', '2017-11-11', '0000-00-00', '', '', '', 20, 7, 'Program Code #9725372, Program Duration 30th Jul 2016 to 28th Oct 2016 (invoice to PT. Integritas Training Idea)&lt;br /&gt;Sudah terima transferan IDR 27.431.250&lt;br /&gt;CC. Finance &amp; Bu Rini, tolong FU WHT (PPh 23 badan 15%) dari Integra untuk close program ini', '', 0, '2017-11-10 10:26:02', '2017-11-10 10:27:03'),
(117, 27, 2, 27, 5, 'Q1', 'PENJUALAN TIKET NZ SENILAI 80JT', 11, 1, 'TIKET NZ', '2017-11-10', '2017-11-11', '2017-11-10', '', '', '', 12, 2, 'PENJUALAN TIKET NZ SENILAI 80JT (DIBELI AMP)', '', 0, '2017-11-10 14:38:55', '2017-11-10 17:27:45'),
(118, 20, 2, 43, 8, 'Q3', 'Min Payout: 2000000 (Quota 200u)', 16, 1, 'LENOVO Q3 FY1718 SMB T2 LGP', '2017-11-10', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Program PRF CID90201710200012 Period: 01Oct17-31Dec17', '', 0, '2017-11-10 16:15:30', '2017-11-10 16:15:30'),
(119, 20, 4, 44, 8, 'Q4', 'Trip to Mono Shanghai + DisneyLand', 27, 1, 'Campaign Point Trip LG Year End 2017', '2017-11-10', '2018-02-01', '0000-00-00', '', '', '', 0, 1, 'Period 01Jul17-31Jan18 Target Point 125 (PV150,PH150G,PH300,PH550,PH450UG,PW800G)', '', 0, '2017-11-10 16:41:39', '2017-11-10 16:41:39'),
(120, 1, 2, 4, 5, 'Q1', 'CASH 40JT', 3, 1, 'SUPPORT SERVICE CENTER 2018', '2017-11-10', '2018-01-01', '0000-00-00', '', '', '', 1, 7, 'SUPPORT SERVICE CENTER 2018 SENILAI 40JT', '', 0, '2017-11-11 07:01:07', '2017-11-11 07:01:20'),
(121, 27, 5, 8, 5, 'Q3', 'LADY UPDATE', 1, 1, 'REBATE Q3 BROTHER INKJET 2017', '2017-11-11', '2018-02-01', '0000-00-00', '', '', '', 27, 7, 'REBATE Q3 BROTHER 2017 OKTOBER SD DESEMBER', '', 0, '2017-11-11 07:43:02', '2017-11-11 07:45:09'),
(122, 27, 5, 19, 5, 'Q2', 'JULI UPDATE', 4, 1, 'PROJECT TN2280', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'JULI UPDATE', '', 0, '2017-11-11 08:27:31', '2017-11-11 08:27:31'),
(123, 13, 2, 6, 5, 'Q4', 'Rebate Country <br />2% untuk achievement 150% dan 3,5% untuk tambahan achievement 50% ( cap 200% ) = +/- 17.500.000,-<br />Add 1% untuk item barang HP laserjet', 8, 1, 'HP Consumer Q4 2017', '2017-11-11', '2017-11-30', '0000-00-00', '', '', '', 0, 1, ' Menunggu notifikasi dari HP untuk dibuatkan invoice', '', 0, '2017-11-11 08:29:40', '0000-00-00 00:00:00'),
(124, 13, 2, 6, 5, 'Q3', 'Rebate country <br />1.5% dari 1.050.000.000 ( cap 105%)<br />Add 1% untuk item laserjet M1 Q3', 8, 1, 'HP Consumer Q3 2017', '2017-11-11', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'Menunggu notifikasi dari HP untuk dibuatkan invoice', '', 0, '2017-11-11 08:31:32', '0000-00-00 00:00:00'),
(125, 27, 5, 19, 5, 'Q1', 'JULI UPDATE', 4, 1, 'REBATE Q1 BROTHER LASER ECS 2017', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'PERIODE APRIL SD JUNI', '', 0, '2017-11-11 08:50:03', '0000-00-00 00:00:00'),
(126, 27, 5, 19, 5, 'Q2', 'JULI UPDATE', 4, 1, 'REBATE Q2 BROTHER LASER ECS 2017', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'PERIODE JULI SD SEPTEMBER', '', 0, '2017-11-11 08:50:59', '0000-00-00 00:00:00'),
(127, 27, 4, 17, 5, 'Q4', 'TRIP MONGOLIA 1 TIKET', 5, 4, 'BROTHER LASER TIXPRO PAKET MONGOLIA', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 27, 7, 'TRIP MONGOLIA 1 TIKET UNTUK PEMBELIAN 500JT SD AKHIR DESEMBER 2017', '', 0, '2017-11-11 08:54:04', '0000-00-00 00:00:00'),
(128, 27, 2, 3, 5, 'Q4', 'US 1100.', 2, 4, 'FX 1ST CHANNEL Q4 2016 SELISIH', '2017-11-11', '2017-11-12', '2017-11-11', '', '', '', 1, 1, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 'sudah diterima oleh '' &quot;\n\nasdad &lt;\n&gt;', 0, '2017-11-11 09:17:54', '0000-00-00 00:00:00'),
(129, 1, 9, 39, 5, 'Q2', 'asdasdas', 3, 0, 'Good Time', '2017-11-16', '2017-10-31', '0000-00-00', '', '', '', 0, 1, 'adadasd', '', 1, '2017-11-16 11:45:00', '2017-11-16 11:46:08'),
(130, 1, 9, 22, 6, 'Q3', 'Prktis Ekonomis', 1, 3, 'Jolly', '2017-11-16', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'asdasdas', '', 0, '2017-11-16 11:50:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `db_rewards_history`
--

CREATE TABLE `db_rewards_history` (
  `id` int(11) NOT NULL,
  `id_reward` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis_reward` int(11) NOT NULL,
  `id_contactperson` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `Quartal` varchar(5) NOT NULL,
  `keterangan_reward` varchar(100) NOT NULL,
  `kode_vendor` int(11) NOT NULL,
  `idbrand` int(11) NOT NULL,
  `no_po` varchar(20) NOT NULL,
  `tanggal_buat` date NOT NULL,
  `tanggal_tagih` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `nama_cp` varchar(50) NOT NULL,
  `email_cp` varchar(50) NOT NULL,
  `telp_cp` varchar(50) NOT NULL,
  `user_selesai` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `memo` varchar(1000) NOT NULL DEFAULT '-',
  `isDelete` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_rewards_history`
--

INSERT INTO `db_rewards_history` (`id`, `id_reward`, `id_user`, `id_jenis_reward`, `id_contactperson`, `id_cabang`, `Quartal`, `keterangan_reward`, `kode_vendor`, `idbrand`, `no_po`, `tanggal_buat`, `tanggal_tagih`, `tanggal_selesai`, `nama_cp`, `email_cp`, `telp_cp`, `user_selesai`, `status`, `memo`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 2, 0, 5, '', 'RP 30.000.000,-', 2, 0, 'FX 1ST CN Q4 2015', '2017-09-24', '2017-09-25', '2017-09-24', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 1, 1, 'REBATE 1ST CHANNEL Q4 2015', 0, '2017-09-24 10:31:56', '0000-00-00 00:00:00'),
(2, 0, 1, 2, 0, 5, 'Q4', 'US 6695', 2, 0, 'FX 1ST CN Q3 Q4 2016', '2017-09-24', '2017-09-25', '2017-09-24', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 1, 8, 'REBATE 1ST CHANNEL Q3 2016 SENILAI US3205 DAN Q4 Q2016 SENILAI US 3490, TOTAL US 6695', 0, '2017-09-24 10:51:37', '0000-00-00 00:00:00'),
(3, 0, 12, 8, 0, 5, '', 'T300 QTY 20', 1, 0, 'SUPPORT SERVICE CENT', '2017-09-24', '2017-09-25', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 0, 1, 'CONVERT SUPPORT SERVICE CENTER 40JT', 0, '2017-09-24 12:10:06', '0000-00-00 00:00:00'),
(4, 0, 1, 8, 0, 5, '', 'J3720 QTY 12, BT5000 QTY 7.', 1, 0, 'SUPPORT LKPP2', '2017-09-27', '2017-09-29', '0000-00-00', 'Desy', 'Desy.agnes@post.asaba.co.id', '081802399777', 0, 1, 'SUPPORT LKPP2 SENILAI 66JT', 0, '2017-09-28 06:46:41', '0000-00-00 00:00:00'),
(5, 0, 1, 2, 0, 5, '', 'US 3490', 2, 0, 'FX 1ST CN Q4 2016', '2017-09-27', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 0, 1, 'REBATE 1ST CHANNEL Q4 2016', 1, '2017-09-28 06:56:25', '2017-10-08 12:48:15'),
(6, 0, 1, 2, 0, 5, '', 'RP 7.000.000,-', 2, 0, 'FX ROADSHOW JATIM', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 0, 1, 'SUPPORT ROADHSOW JATIM (DEDY, MARDI, INDRA)', 0, '2017-09-28 07:02:53', '2017-09-28 07:02:53'),
(7, 0, 1, 2, 0, 5, '', 'US 5060', 2, 0, 'FX PAKET COLOUR Q4 2', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistriro', 'yudistiro@fujixerox.com', '08156930444', 1, 8, 'BONUS PAKET COLOUR Q4 2016', 0, '2017-09-28 07:05:42', '2017-10-08 12:23:53'),
(8, 0, 1, 4, 0, 5, '', 'TIKET VIETNAM', 2, 0, 'FX SELISIH 5K POINT ', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 0, 1, 'CONVERT 5K POINT SELISIH PEMBELIAN METRODATA', 0, '2017-09-28 07:44:18', '2017-09-28 07:44:18'),
(9, 0, 1, 5, 0, 5, 'Q1', 'CN SENILAI 25% DARI PEMBELIAN TONER P115W', 6, 0, 'FX SUPPORT TONER P11', '2017-09-28', '2017-09-29', '0000-00-00', 'Tika', 'sartika@harrisma.com', '08118118123', 1, 8, 'CN PRICE PROTECTION UTK TONER P115W QTY 300 UNIT', 0, '2017-09-28 07:56:06', '2017-10-08 12:29:29'),
(10, 0, 1, 2, 0, 5, '', 'RP 3.500.000,-', 10, 0, 'FX COPIER SALES INSE', '2017-09-28', '2017-09-29', '0000-00-00', 'Syafril Tanjuang', 'Syafril.Tanjuang@fujixerox.com', '081', 1, 8, 'SALES INSENTIF PROGRAM FX COPIER', 0, '2017-09-28 08:01:35', '2017-10-08 12:27:27'),
(11, 0, 1, 2, 0, 5, '', 'US 3626', 2, 0, 'FX PAKET TONER Q4 2', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 0, 1, 'BONUS PAKET TONER Q4 2016', 0, '2017-09-28 08:04:17', '2017-09-28 08:04:17'),
(12, 0, 1, 8, 0, 5, '', 'P115W QTY 10', 2, 0, 'SUPPORT ROADSHOW AYO', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 1, 8, 'SUPPORT ROADSHOW AYOOKLIK', 0, '2017-09-28 08:07:40', '2017-10-08 12:25:09'),
(13, 0, 1, 2, 0, 5, '', 'RP 9.000.000,-', 2, 0, 'SUPPORT PAMERAN JOGJ', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 1, 8, 'SUPPORT PAMERAN JOGJA', 0, '2017-09-28 08:08:55', '2017-10-08 12:25:23'),
(14, 0, 1, 2, 0, 5, '', 'LENY UPDATE', 2, 0, 'FX PAKET MONO MIX Q4', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudis', 'yudistiro@fujixerox.com', '08156930444', 1, 8, 'BONUS PAKET MONO MIX Q4 2016, MASIH DI HITUNG TIKA - RP 17.096.545 + 50RB X TOTAL UNIT', 0, '2017-09-28 08:12:08', '2017-10-08 12:50:32'),
(15, 0, 1, 5, 0, 5, 'Q4', 'ANTHONY UPDATE', 8, 0, 'HP CONSUMER Q4 2016', '2017-09-28', '2017-09-29', '0000-00-00', 'Daru', 'Daru.brilyantarto@hp.com', '0816565682', 1, 7, 'HP CONSUMER REBATE Q4 2016', 0, '2017-09-28 08:21:23', '0000-00-00 00:00:00'),
(16, 0, 1, 5, 0, 5, 'Q1', 'ANTHONY UPDATE', 8, 0, 'HP CONSUMER Q1 2017', '2017-09-28', '2017-09-29', '0000-00-00', 'Daru', 'Daru.brilyantarto@hp.com', '0816565682', 1, 7, 'HP CONSUMER REBATE Q1 2017', 0, '2017-09-28 08:28:47', '0000-00-00 00:00:00'),
(17, 0, 1, 2, 0, 5, '', 'RP 120.000.000,-', 11, 0, 'PEMBELIAN 3 TIKET NZ', '2017-09-28', '2017-09-29', '0000-00-00', 'Indrawati CEO', 'pikai@airmasgroup.co.id', '08121832888', 0, 1, 'PEMBELIAN 3 TIKET NZ', 0, '2017-09-28 08:33:41', '2017-09-28 08:33:41'),
(18, 0, 1, 4, 0, 5, '', 'TRIP THAILAND 1 TIKET', 10, 0, 'FX COPIER', '2017-09-28', '2017-09-29', '0000-00-00', 'Wijaya Jayadi', 'Wijaya.Jayadi@fujixerox.com', '08118018686', 0, 1, 'ARCHIEVMENT FX COPIER', 0, '2017-09-28 08:36:25', '2017-09-28 08:36:25'),
(19, 0, 1, 1, 0, 5, '', 'VOUCHER RP 5.100.000,-', 6, 0, 'BRO SCANNER VOUCHER', '2017-09-28', '2017-09-29', '0000-00-00', 'Tika', 'sartika@harrisma.com', '08118118123', 1, 7, 'BONUS VOUCHER PEMBELIAN ADS1100 + ADS2100 + ADS2800 Q2 2017', 0, '2017-09-28 08:40:09', '2017-10-08 10:44:33'),
(20, 0, 1, 5, 0, 5, '', 'LADY UPDATE', 6, 0, 'PANA SCANNER', '2017-09-28', '2017-09-29', '0000-00-00', 'Handy', 'Handy.gunawan@harrisma.com', '081210003880', 1, 7, 'Selisih harga KVS1015 harga awal 3450, harga deal 3200.', 0, '2017-09-28 08:49:40', '2017-09-28 08:51:54'),
(21, 0, 1, 5, 0, 5, '', 'RP 98.160.000,-', 3, 0, 'BROTHER T300 QTY 240', '2017-09-28', '2017-09-29', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '085959111125', 1, 7, 'Selisih harga support projek T300 qty 240', 0, '2017-09-28 08:58:13', '2017-09-28 09:01:34'),
(22, 0, 1, 12, 0, 5, 'Q1', 'Detail 12', 7, 0, 'Reward 1', '2017-09-29', '2017-09-29', '0000-00-00', 'Nama 12', 'email 12', '081232332', 1, 1, 'Keterangan 12', 1, '2017-09-29 15:33:26', '2017-09-29 15:41:16'),
(23, 0, 1, 2, 0, 5, 'Q3', '50JT', 8, 0, 'HP PAMERAN EASTCOST', '2017-10-03', '2017-10-04', '0000-00-00', 'DARU', 'daru@gmail.com', '081', 1, 7, 'SUPPORT HP CONSUMER PAMERAN EASTCOST', 0, '2017-10-03 20:42:39', '2017-10-03 20:49:46'),
(24, 0, 1, 2, 0, 5, 'Q3', 'RP 4.400.000,-', 3, 0, 'SUPPORT PPN J200', '2017-10-03', '2017-10-05', '0000-00-00', 'David', 'david.suryanto@brother.co.id', '081', 1, 7, 'SUPPORT PPN 22 UNIT J200 RETURN HARTONO ELECTRONIC', 0, '2017-10-04 05:38:04', '2017-10-04 05:38:19'),
(25, 0, 1, 2, 0, 5, 'Q4', 'US500 / MONTH', 9, 0, 'HP SALES CABANG', '2017-10-03', '2017-10-05', '0000-00-00', 'Sri', 'sri.rezeki.dewi@hp.com', '081', 0, 1, 'SUPPORT SALES UNTUK CABANG EKATALOG SELURUH INDONESIA TIMUR (BASE SURABAYA)', 0, '2017-10-04 05:52:24', '2017-10-04 05:52:24'),
(26, 0, 1, 8, 0, 5, 'Q4', 'BROTHER HL1211W QTY 3UNIT', 4, 0, 'BLUE ENGINE FEB MARE', '2017-10-08', '2017-10-09', '0000-00-00', 'Cia', 'lauren@ecsindo.com', '082210253555', 0, 1, 'BLUE ENGINE FEBRUARI - MARET 2017 NOMINAL 3JT CONVERT KE BROTHER HL1211W', 0, '2017-10-08 10:22:12', '0000-00-00 00:00:00'),
(27, 0, 1, 4, 0, 5, 'Q4', 'TIKET CHINA TOUR 3 TIKET', 3, 0, 'SCANNER PTOUCH 2016', '2017-10-08', '2017-11-02', '0000-00-00', 'David', 'david.suryanto@brother.co.id', '081803248488', 0, 1, 'ARCHIEVMENT BROTHER SCANNER N PTOUCH 2017', 0, '2017-10-08 10:25:09', '0000-00-00 00:00:00'),
(28, 0, 1, 8, 0, 5, 'Q4', 'BROTHER J3530 QTY 44 UNIT', 1, 0, 'BROTHER BONUS YEARLY', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 0, 1, 'BROTHER ADDITIONAL BONUS 1.5% ARCHIEVMENT YEARLY 2016', 0, '2017-10-08 10:30:46', '2017-10-08 10:30:46'),
(29, 0, 1, 8, 0, 5, 'Q3', 'CONVERT T500 QTY 28 UNIT', 1, 0, 'PAKET TINTA DEALER', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 0, 1, 'BROTHER INKJET PROGRAM DEALER PEMBELIAN PAKET TINTA 2016', 0, '2017-10-08 10:47:46', '0000-00-00 00:00:00'),
(30, 0, 1, 2, 0, 5, 'Q2', 'CASH 25.000.000,-', 3, 0, 'BROTHER BONUS TN261', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '085959111125', 0, 1, 'SUPPORT BONUS DARI PEMBELIAN TN261 QTY 1200 PCS', 0, '2017-10-08 10:50:07', '2017-10-08 10:50:07'),
(31, 0, 1, 8, 0, 5, 'Q3', 'SUPPORT TINTA SENILAI 3JT', 1, 0, 'ASABA SUPPORT TINTA ', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 0, 1, 'ASABA ANTON SUPPORT 3JT FREE TINTA UTK PEMBELIAN 2016', 0, '2017-10-08 10:54:47', '2017-10-08 10:54:47'),
(32, 0, 1, 5, 0, 5, 'Q1', 'LADY UPDATE', 1, 0, 'ASABA REBATE Q1 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 1, 7, 'REBATE Q1 2017 DISKON DAN BLINK BONUS', 0, '2017-10-08 11:06:21', '2017-10-08 11:06:39'),
(33, 0, 1, 5, 0, 5, 'Q2', 'LADY UPDATE', 1, 0, 'ASABA REBATE Q2 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 1, 7, 'REBATE 1% PAKET BONUS BANYAK AGUSTUS DAN BLINK BONUS 2%', 0, '2017-10-08 11:08:22', '2017-10-08 11:08:50'),
(34, 0, 1, 8, 0, 5, 'Q1', 'CONVERT 3520 QTY 4 UNIT', 1, 0, 'BROTHER PROJEK PEMKO', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 0, 1, 'SUPPORT PROJEK PEMKOT CONVERT J3520 QTY 4 ', 0, '2017-10-08 11:12:51', '0000-00-00 00:00:00'),
(35, 0, 1, 5, 0, 5, 'Q1', 'CN 29.750.000,-', 1, 0, 'SUPPORT J SERIES', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 0, 1, 'SUPPORT J105, J200 @50rb, J3520 @100rb.', 0, '2017-10-08 11:16:53', '0000-00-00 00:00:00'),
(36, 0, 1, 2, 0, 5, 'Q4', 'NILAI SELISIH 982.085', 4, 0, 'SELISIH REBATE Q2 Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 0, 1, 'SELISIH PERHITUNGAN REBATE Q2, Q3 2016', 0, '2017-10-08 11:20:32', '0000-00-00 00:00:00'),
(37, 0, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '2017-10-08', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 1, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-08 11:22:42', '2017-10-08 12:59:49'),
(38, 0, 1, 5, 0, 5, 'Q4', 'CN 12JT', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 7, 'BONUS PEMBELIAN PAKET PRINTER BROTHER 4% Q4 2016', 0, '2017-10-08 11:24:43', '2017-10-08 11:35:06'),
(39, 0, 1, 2, 0, 5, 'Q1', 'CASH 7.714.000,-', 3, 0, 'SUPPORT PPN J3520', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 1, 1, 'SUPPORT RETURN PPN HARTONO J3520 QTY 14', 0, '2017-10-08 11:52:14', '2017-10-08 12:55:00'),
(40, 0, 1, 5, 0, 5, 'Q2', 'LADY UPDATE', 4, 0, 'PROJEK 2540 + 2700', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 7, 'SUPPORT CN PROJEK 2540 + 2700, NILAI REAL 1.950.000,-', 0, '2017-10-08 11:55:44', '2017-10-08 12:58:17'),
(41, 0, 1, 2, 0, 5, 'Q2', 'CASH 10.500.000,-', 3, 0, 'PROMOTOR HARTONO', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 1, 8, 'SUPPORT PROMOTOR HARTONO ELECTRONIC 3 BULAN @3.5JT (JULI SD SEPTEMBER)', 0, '2017-10-08 12:01:58', '2017-10-08 12:58:49'),
(42, 0, 1, 2, 0, 5, 'Q1', 'CASH 10.500.000,-', 3, 0, 'PROMOTOR PTOUCH HITE', '2017-10-08', '2017-10-09', '0000-00-00', 'Redy', 'redy.manlin@brother.co.id', '081', 1, 7, 'SUPPORT PROMOTOR PTOUCH HITECHMALL @3.5JT / BULAN', 0, '2017-10-08 12:06:28', '2017-10-08 12:59:33'),
(43, 0, 1, 2, 0, 5, 'Q2', 'JULI UPDATE', 3, 0, 'KONSINYASI HARTONO', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 1, 7, 'SUPPORT KONSINYASI 1% UNTUK HARTONO ELECTRONIK SELAMA 3 BULAN', 0, '2017-10-08 12:09:32', '2017-10-08 12:11:35'),
(44, 0, 1, 2, 0, 5, 'Q1', 'JULI UPDATE', 3, 0, 'KONSINYASI DEALER', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 1, 7, 'SUPPORT KONSINYASI DEALER 1% / BULAN START JULI', 0, '2017-10-08 12:10:41', '2017-10-08 12:11:29'),
(45, 0, 1, 4, 0, 5, 'Q1', 'JULI UPDATE', 3, 0, 'BROTHER TRIP KOREA', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 1, 7, 'PROGRAM PAKET INKJET DEALER TRIP KOREA 20 TIKET', 0, '2017-10-08 12:13:12', '2017-10-08 12:16:55'),
(46, 0, 1, 2, 0, 5, 'Q1', 'CASH 5JT', 3, 0, 'BROTHER ISHOP VAGANZ', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 1, 8, 'PROGRAM BROTHER ISHOP VAGANZA 2016', 0, '2017-10-08 12:14:53', '0000-00-00 00:00:00'),
(47, 0, 1, 2, 0, 5, 'Q1', 'CASH 30.000.000,-', 2, 0, 'FX SUPPORT P115W', '2017-10-08', '2017-10-09', '0000-00-00', 'Yudistiro', 'Yudistiro@fujixerox.com', '081', 1, 8, 'SUPPORT PROTEKSI HARGA PRINTER P115W SENILAI 30JT', 0, '2017-10-08 12:32:04', '0000-00-00 00:00:00'),
(48, 0, 1, 2, 0, 5, 'Q1', 'LENI UPDATE', 6, 0, 'FX SUPPORT PRINTER V', '2017-10-08', '2017-10-09', '0000-00-00', 'Tika', 'sartika@harrisma.com', '081', 1, 8, 'FX SUPPORT PRINTER TYPE VALUE - SELVIE', 0, '2017-10-08 12:36:00', '0000-00-00 00:00:00'),
(49, 0, 1, 5, 0, 5, 'Q2', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q2 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 7, 'HP CONSUMER REBATE Q2 2017', 0, '2017-10-08 12:59:43', '2017-10-08 13:00:45'),
(50, 0, 1, 2, 0, 5, 'Q3', 'CASH 72.327.776,-', 8, 0, 'HP CONSUMER Q3 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 1, 'HP CONSUMER Q3 2017', 0, '2017-10-08 13:02:20', '2017-10-09 07:45:20'),
(51, 0, 1, 5, 0, 5, 'Q4', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q4 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 7, 'HP CONSUMER Q4 2017', 0, '2017-10-08 13:04:36', '2017-10-08 13:04:56'),
(52, 0, 1, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 0, 1, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-08 13:06:59', '0000-00-00 00:00:00'),
(53, 0, 1, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 0, 1, '1 TIKET TRIP BANGKOK', 0, '2017-10-14 23:52:17', '2017-10-14 23:52:17'),
(54, 53, 1, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 1, 7, '1 TIKET TRIP BANGKOK', 0, '2017-10-18 13:09:19', '2017-10-18 13:09:19'),
(55, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 1, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-18 13:09:45', '2017-10-18 13:09:45'),
(56, 53, 1, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 1, 1, '1 TIKET TRIP BANGKOK', 0, '2017-10-18 13:32:15', '2017-10-18 13:32:15'),
(57, 52, 1, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 7, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-18 13:32:24', '2017-10-18 13:32:24'),
(58, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 1, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-18 13:32:52', '2017-10-18 13:32:52'),
(59, 52, 1, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 1, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-18 13:33:17', '2017-10-18 13:33:17'),
(60, 53, 1, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 1, 7, '1 TIKET TRIP BANGKOK', 0, '2017-10-18 14:09:46', '2017-10-18 14:09:46'),
(61, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 1, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-18 14:10:28', '2017-10-18 14:10:28'),
(62, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 0, 1, 'Ket testing', 0, '2017-10-18 19:38:11', '2017-10-18 19:38:11'),
(63, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 1, 7, 'Ket testing', 0, '2017-10-18 19:38:31', '2017-10-18 19:38:31'),
(64, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 8, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-18 19:38:39', '2017-10-18 19:38:39'),
(65, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 1, 1, 'Ket testing', 0, '2017-10-18 19:38:53', '2017-10-18 19:38:53'),
(66, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 1, 2, 'Ket testing', 0, '2017-10-18 19:39:11', '2017-10-18 19:39:11'),
(67, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 1, 3, 'Ket testing', 0, '2017-10-18 20:55:48', '2017-10-18 20:55:48'),
(68, 53, 1, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 1, 8, '1 TIKET TRIP BANGKOK', 0, '2017-10-19 11:02:39', '2017-10-19 11:02:39'),
(69, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 7, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:03:02', '2017-10-19 11:03:02'),
(70, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 1, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:03:17', '2017-10-19 11:03:17'),
(71, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 2, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:03:26', '2017-10-19 11:03:26'),
(72, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 1, 1, 'Ket testing', 0, '2017-10-19 11:03:53', '2017-10-19 11:03:53'),
(73, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 1, 8, 'Ket testing', 0, '2017-10-19 11:10:16', '2017-10-19 11:10:16'),
(74, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 1, 1, 'Ket testing', 0, '2017-10-19 11:10:46', '2017-10-19 11:10:46'),
(75, 51, 1, 5, 0, 5, 'Q4', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q4 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 1, 'HP CONSUMER Q4 2017', 0, '2017-10-19 11:10:47', '2017-10-19 11:10:47'),
(76, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 8, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:10:52', '2017-10-19 11:10:52'),
(77, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 7, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:10:54', '2017-10-19 11:10:54'),
(78, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 2, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:10:57', '2017-10-19 11:10:57'),
(79, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 8, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:11:01', '2017-10-19 11:11:01'),
(80, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 1, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:11:06', '2017-10-19 11:11:06'),
(81, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 7, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:11:13', '2017-10-19 11:11:13'),
(82, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 1, 2, 'Ket testing', 0, '2017-10-19 11:11:19', '2017-10-19 11:11:19'),
(83, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 3, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:11:21', '2017-10-19 11:11:21'),
(84, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 1, 1, 'Ket testing', 0, '2017-10-19 11:11:29', '2017-10-19 11:11:29'),
(85, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 7, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:11:34', '2017-10-19 11:11:34'),
(86, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 8, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:11:38', '2017-10-19 11:11:38'),
(87, 37, 1, 8, 0, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 1, 2, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-19 11:11:42', '2017-10-19 11:11:42'),
(88, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 1, 2, 'Ket testing', 0, '2017-10-19 11:12:01', '2017-10-19 11:12:01'),
(89, 54, 1, 5, 1, 5, 'Q1', 'Testing', 11, 0, 'Tes', '2017-10-18', '2017-10-28', '0000-00-00', '', '', '', 1, 3, 'Ket testing', 0, '2017-10-19 12:28:25', '2017-10-19 12:28:25'),
(90, 55, 14, 5, 1, 5, 'Q2', '123123', 11, 0, 'SO123456', '2017-10-19', '2017-10-28', '0000-00-00', '', '', '', 0, 1, '123123', 0, '2017-10-19 14:03:43', '2017-10-19 14:03:43'),
(91, 1, 14, 2, 0, 5, '', 'RP 30.000.000,-', 2, 0, 'FX 1ST CN Q4 2015', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 14, 7, 'REBATE 1ST CHANNEL Q4 2015', 0, '2017-10-19 14:06:45', '2017-10-19 14:06:45'),
(92, 1, 14, 2, 0, 5, '', 'RP 30.000.000,-', 2, 0, 'FX 1ST CN Q4 2015', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 14, 1, 'REBATE 1ST CHANNEL Q4 2015', 0, '2017-10-19 14:06:51', '2017-10-19 14:06:51'),
(93, 1, 14, 2, 0, 5, '', 'RP 30.000.000,-', 2, 0, 'FX 1ST CN Q4 2015', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 14, 8, 'REBATE 1ST CHANNEL Q4 2015', 0, '2017-10-19 14:07:02', '2017-10-19 14:07:02'),
(94, 1, 14, 2, 0, 5, '', 'RP 30.000.000,-', 2, 0, 'FX 1ST CN Q4 2015', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 14, 2, 'REBATE 1ST CHANNEL Q4 2015', 0, '2017-10-19 14:07:08', '2017-10-19 14:07:08'),
(95, 1, 14, 2, 0, 5, '', 'RP 30.000.000,-', 2, 0, 'FX 1ST CN Q4 2015', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 14, 3, 'REBATE 1ST CHANNEL Q4 2015', 0, '2017-10-19 14:07:14', '2017-10-19 14:07:14'),
(96, 1, 14, 2, 0, 5, '', 'RP 30.000.000,-', 2, 0, 'FX 1ST CN Q4 2015', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 14, 1, 'REBATE 1ST CHANNEL Q4 2015', 0, '2017-10-19 14:07:18', '2017-10-19 14:07:18'),
(97, 2, 14, 2, 0, 5, 'Q4', 'US 6695', 2, 0, 'FX 1ST CN Q3 Q4 2016', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 14, 1, 'REBATE 1ST CHANNEL Q3 2016 SENILAI US3205 DAN Q4 Q2016 SENILAI US 3490, TOTAL US 6695', 0, '2017-10-19 14:07:23', '2017-10-19 14:07:23'),
(98, 2, 14, 2, 0, 5, 'Q4', 'US 6695', 2, 0, 'FX 1ST CN Q3 Q4 2016', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 14, 8, 'REBATE 1ST CHANNEL Q3 2016 SENILAI US3205 DAN Q4 Q2016 SENILAI US 3490, TOTAL US 6695', 0, '2017-10-19 14:07:28', '2017-10-19 14:07:28'),
(99, 1, 14, 2, 0, 5, '', 'RP 30.000.000,-', 2, 0, 'FX 1ST CN Q4 2015', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 14, 2, 'REBATE 1ST CHANNEL Q4 2015', 0, '2017-10-19 14:07:32', '2017-10-19 14:07:32'),
(100, 1, 14, 2, 0, 5, '', 'RP 30.000.000,-', 2, 0, 'FX 1ST CN Q4 2015', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 14, 1, 'REBATE 1ST CHANNEL Q4 2015', 0, '2017-10-19 14:07:37', '2017-10-19 14:07:37'),
(101, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 1, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 09:15:38', '2017-10-21 09:15:38'),
(102, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 8, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 09:15:48', '2017-10-21 09:15:48'),
(103, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 7, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 09:16:37', '2017-10-21 09:16:37'),
(104, 52, 14, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 14, 8, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 09:16:44', '2017-10-21 09:16:44'),
(105, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 7, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 09:17:08', '2017-10-21 09:17:08'),
(106, 52, 14, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 14, 8, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 09:17:15', '2017-10-21 09:17:15'),
(107, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 1, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 09:17:25', '2017-10-21 09:17:25'),
(108, 52, 14, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 14, 8, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 09:17:32', '2017-10-21 09:17:32'),
(109, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 7, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 09:17:41', '2017-10-21 09:17:41'),
(110, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 8, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 09:18:10', '2017-10-21 09:18:10'),
(111, 52, 14, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 14, 1, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 09:18:20', '2017-10-21 09:18:20'),
(112, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 7, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 09:22:36', '2017-10-21 09:22:36'),
(113, 52, 14, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 14, 7, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 09:22:42', '2017-10-21 09:22:42'),
(114, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 8, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 09:22:54', '2017-10-21 09:22:54'),
(115, 52, 14, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 14, 1, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 09:23:00', '2017-10-21 09:23:00'),
(116, 53, 1, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 1, 2, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 11:08:26', '2017-10-21 11:08:26'),
(117, 52, 1, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 8, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 11:08:31', '2017-10-21 11:08:31'),
(118, 52, 1, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 1, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 11:08:35', '2017-10-21 11:08:35'),
(119, 53, 1, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 1, 8, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 11:08:44', '2017-10-21 11:08:44'),
(120, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 1, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 11:09:45', '2017-10-21 11:09:45'),
(121, 52, 14, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 14, 7, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 11:09:51', '2017-10-21 11:09:51'),
(122, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 7, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 11:09:56', '2017-10-21 11:09:56'),
(123, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 1, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 11:10:02', '2017-10-21 11:10:02'),
(124, 53, 14, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 14, 8, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 11:10:07', '2017-10-21 11:10:07'),
(125, 52, 14, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 14, 1, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 11:10:12', '2017-10-21 11:10:12'),
(126, 52, 1, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 7, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 11:42:38', '2017-10-21 11:42:38'),
(127, 53, 1, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 1, 7, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 11:42:48', '2017-10-21 11:42:48'),
(128, 53, 1, 4, 0, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 1, 8, '1 TIKET TRIP BANGKOK', 0, '2017-10-21 11:42:57', '2017-10-21 11:42:57'),
(129, 52, 1, 2, 0, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 1, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-21 11:43:05', '2017-10-21 11:43:05'),
(130, 53, 10, 4, 5, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 0, 1, '1 TIKET TRIP BANGKOK', 0, '2017-10-22 12:22:22', '2017-10-22 12:22:22'),
(131, 53, 10, 4, 5, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', '', '', '', 0, 1, '1 TIKET TRIP BANGKOK', 0, '2017-10-22 12:26:29', '2017-10-22 12:26:29'),
(132, 53, 10, 4, 5, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', 'Yulius', 'yulius.sugianto@techdata.com', '081', 10, 1, '1 TIKET TRIP BANGKOK', 0, '2017-10-22 12:28:09', '2017-10-22 12:28:09'),
(133, 52, 10, 2, 6, 5, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 0, 1, 'SUPPORT ADDITIONAL PEMBELIAN Q3 UTK 2529 + 3835', 0, '2017-10-22 12:29:24', '2017-10-22 12:29:24'),
(134, 48, 10, 2, 2, 5, 'Q1', 'LENI UPDATE', 6, 0, 'FX SUPPORT PRINTER V', '2017-10-08', '2017-10-09', '0000-00-00', 'Tika', 'sartika@harrisma.com', '081', 0, 1, 'FX SUPPORT PRINTER TYPE VALUE - SELVIE', 0, '2017-10-22 12:29:53', '2017-10-22 12:29:53'),
(135, 47, 10, 2, 3, 5, 'Q1', 'CASH 30.000.000,-', 2, 0, 'FX SUPPORT P115W', '2017-10-08', '2017-10-09', '0000-00-00', 'Yudistiro', 'Yudistiro@fujixerox.com', '081', 0, 1, 'SUPPORT PROTEKSI HARGA PRINTER P115W SENILAI 30JT', 0, '2017-10-22 12:30:14', '2017-10-22 12:30:14'),
(136, 35, 10, 5, 8, 5, 'Q1', 'CN 29.750.000,-', 1, 0, 'SUPPORT J SERIES', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 0, 1, 'SUPPORT J105, J200 @50rb, J3520 @100rb.', 0, '2017-10-22 12:36:19', '2017-10-22 12:36:19'),
(137, 53, 10, 4, 5, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', '', '', '', 0, 1, '1 TIKET TRIP BANGKOK', 0, '2017-10-22 12:36:40', '2017-10-22 12:36:40'),
(138, 18, 10, 4, 9, 5, 'Q2', 'TRIP THAILAND 1 TIKET', 10, 0, 'FX COPIER', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'ARCHIEVMENT FX COPIER', 0, '2017-10-22 12:41:12', '2017-10-22 12:41:12'),
(139, 10, 10, 2, 10, 5, 'Q2', 'RP 3.500.000,-', 10, 0, 'FX COPIER SALES INSE', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'SALES INSENTIF PROGRAM FX COPIER', 0, '2017-10-22 12:43:00', '2017-10-22 12:43:00'),
(140, 51, 10, 5, 6, 5, 'Q4', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q4 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 0, 1, 'HP CONSUMER Q4 2017', 0, '2017-10-22 12:43:47', '2017-10-22 12:43:47'),
(141, 23, 10, 2, 6, 5, 'Q3', '50JT', 8, 0, 'HP PAMERAN EASTCOST', '2017-10-03', '2017-10-04', '0000-00-00', 'DARU', 'daru@gmail.com', '081', 0, 1, 'SUPPORT HP CONSUMER PAMERAN EASTCOST', 0, '2017-10-22 12:44:13', '2017-10-22 12:44:13'),
(142, 53, 1, 4, 5, 5, 'Q4', '1 TIKET BANGKOK', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', '', '', '', 0, 1, '1 TIKET TRIP BANGKOK', 0, '2017-10-22 12:44:34', '2017-10-22 12:44:34'),
(143, 15, 10, 5, 6, 5, 'Q4', 'ANTHONY UPDATE', 8, 0, 'HP CONSUMER Q4 2016', '2017-09-28', '2017-09-29', '0000-00-00', 'Daru', 'Daru.brilyantarto@hp.com', '0816565682', 0, 1, 'HP CONSUMER REBATE Q4 2016', 0, '2017-10-22 12:44:40', '2017-10-22 12:44:40'),
(144, 25, 10, 2, 12, 5, 'Q4', 'US500 / MONTH', 9, 0, 'HP SALES CABANG', '2017-10-03', '2017-10-05', '0000-00-00', 'Sri', 'sri.rezeki.dewi@hp.com', '081', 0, 1, 'SUPPORT SALES UNTUK CABANG EKATALOG SELURUH INDONESIA TIMUR (BASE SURABAYA)', 0, '2017-10-22 12:47:17', '2017-10-22 12:47:17'),
(145, 25, 10, 2, 12, 5, 'Q4', 'US500 / MONTH', 9, 0, 'HP SALES CABANG', '2017-10-03', '2017-10-05', '0000-00-00', '', '', '', 0, 1, 'SUPPORT SALES HP COMERCIAL UNTUK CABANG EKATALOG SELURUH INDONESIA TIMUR (BASE SURABAYA)', 0, '2017-10-22 12:47:38', '2017-10-22 12:47:38'),
(146, 38, 10, 5, 18, 5, 'Q4', 'CN 12JT', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 0, 1, 'BONUS PEMBELIAN PAKET PRINTER BROTHER 4% Q4 2016', 0, '2017-10-22 12:56:25', '2017-10-22 12:56:25'),
(147, 37, 10, 8, 18, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 0, 1, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-10-22 12:56:54', '2017-10-22 12:56:54'),
(148, 26, 10, 8, 19, 5, 'Q4', 'BROTHER HL1211W QTY 3UNIT', 4, 0, 'BLUE ENGINE FEB MARE', '2017-10-08', '2017-10-09', '0000-00-00', 'Cia', 'lauren@ecsindo.com', '082210253555', 0, 1, 'BLUE ENGINE FEBRUARI - MARET 2017 NOMINAL 3JT CONVERT KE BROTHER HL1211W', 0, '2017-10-22 12:58:18', '2017-10-22 12:58:18'),
(149, 24, 10, 2, 17, 5, 'Q3', 'RP 4.400.000,-', 3, 0, 'SUPPORT PPN J200', '2017-10-03', '2017-10-05', '0000-00-00', 'David', 'david.suryanto@brother.co.id', '081', 0, 1, 'SUPPORT PPN 22 UNIT J200 RETURN HARTONO ELECTRONIC', 0, '2017-10-22 12:58:47', '2017-10-22 12:58:47'),
(150, 27, 10, 4, 17, 5, 'Q4', 'TIKET CHINA TOUR 3 TIKET', 3, 0, 'SCANNER PTOUCH 2016', '2017-10-08', '2017-11-02', '0000-00-00', 'David', 'david.suryanto@brother.co.id', '081803248488', 0, 1, 'ARCHIEVMENT BROTHER SCANNER N PTOUCH 2017', 0, '2017-10-22 13:01:30', '2017-10-22 13:01:30'),
(151, 3, 10, 8, 8, 5, 'Q2', 'T300 QTY 20', 1, 0, 'SUPPORT SERVICE CENT', '2017-09-24', '2017-09-25', '0000-00-00', '', '', '', 0, 1, 'CONVERT SUPPORT SERVICE CENTER 40JT', 0, '2017-10-22 13:07:45', '2017-10-22 13:07:45'),
(152, 49, 1, 5, 0, 5, 'Q2', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q2 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 8, 'HP CONSUMER REBATE Q2 2017', 0, '2017-10-23 13:50:38', '2017-10-23 13:50:38'),
(153, 49, 1, 5, 0, 5, 'Q2', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q2 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 7, 'HP CONSUMER REBATE Q2 2017', 0, '2017-10-23 13:50:46', '2017-10-23 13:50:46'),
(154, 49, 1, 5, 0, 5, 'Q2', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q2 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 1, 'HP CONSUMER REBATE Q2 2017', 0, '2017-10-23 13:50:54', '2017-10-23 13:50:54'),
(155, 49, 1, 5, 0, 5, 'Q2', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q2 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 8, 'HP CONSUMER REBATE Q2 2017', 0, '2017-10-23 13:51:01', '2017-10-23 13:51:01'),
(156, 49, 1, 5, 0, 5, 'Q2', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q2 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 2, 'HP CONSUMER REBATE Q2 2017', 0, '2017-10-23 13:51:09', '2017-10-23 13:51:09'),
(157, 49, 1, 5, 0, 5, 'Q2', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q2 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 7, 'HP CONSUMER REBATE Q2 2017', 0, '2017-10-23 13:51:16', '2017-10-23 13:51:16'),
(158, 49, 1, 5, 0, 5, 'Q2', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q2 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 3, 'HP CONSUMER REBATE Q2 2017', 0, '2017-10-23 13:51:27', '2017-10-23 13:51:27'),
(159, 49, 1, 5, 0, 5, 'Q2', 'LENI UPDATE', 8, 0, 'HP CONSUMER Q2 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Daru', 'daru.brilyantarto@hp.com', '081', 1, 7, 'HP CONSUMER REBATE Q2 2017', 0, '2017-10-23 13:51:33', '2017-10-23 13:51:33'),
(160, 46, 10, 2, 17, 5, 'Q1', 'CASH 5JT', 3, 0, 'BROTHER ISHOP VAGANZ', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 0, 1, 'PROGRAM BROTHER ISHOP VAGANZA 2016', 0, '2017-10-27 22:37:41', '2017-10-27 22:37:41'),
(161, 35, 10, 5, 8, 5, 'Q1', 'CN 23.900.000,-', 1, 0, 'SUPPORT J SERIES', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT J105, J200 @50rb, J3520 @100rb.', 0, '2017-10-28 20:35:59', '2017-10-28 20:35:59'),
(162, 56, 1, 9, 13, 5, 'Q3', 'Demo unit CM225FW qty 5', 6, 0, 'CM225FW', '2017-11-01', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'berdasarkan MOM kita diberikan CM225FW qty 5', 0, '2017-11-01 18:34:55', '2017-11-01 18:34:55'),
(163, 51, 13, 5, 6, 5, 'Q4', 'PPFR + Linnearity (2.5%+0.8%)\r\nRebate country 2% untuk achievement 150%, 3.5% untuk achievement 50% ', 8, 0, 'HP CONSUMER Q4 2017', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'HP CONSUMER Q4 2017', 0, '2017-11-02 10:00:35', '2017-11-02 10:00:35'),
(164, 51, 13, 5, 6, 5, 'Q4', 'PPFR + Linnearity (2.5%+0.8%)\r\nRebate country 2% untuk achievement 150%, 3.5% untuk achievement 50% ', 8, 0, 'HP CONSUMER Q4 2017', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'HP CONSUMER Q4 2017', 0, '2017-11-02 10:00:40', '2017-11-02 10:00:40'),
(165, 57, 24, 5, 24, 5, 'Q1', 'asd', 11, 0, 'Tiket', '2017-11-05', '2017-11-06', '0000-00-00', '', '', '', 0, 1, 'asd', 0, '2017-11-05 08:14:26', '2017-11-05 08:14:26'),
(166, 27, 10, 2, 17, 5, 'Q4', 'CASH 20JT UTK PEMBELIAN TIKET CHINA TOUR 2 TIKET', 11, 0, 'SCANNER PTOUCH 2016', '2017-10-08', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'ARCHIEVMENT BROTHER SCANNER N PTOUCH 2017\r\n1 Tiket buat Teddy Harrisma, dan 2 Tiket di jual ke AMP. (TAGIHAN KE AMP)', 0, '2017-11-05 09:23:49', '2017-11-05 09:23:49'),
(167, 56, 1, 9, 13, 5, 'Q3', 'Demo unit CM225FW<br />\rqty 5<br />\rbagi 2', 6, 0, 'CM225FW', '2017-11-01', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'berdasarkan MOM kita diberikan CM225FW qty 5', 0, '2017-11-05 10:03:44', '2017-11-05 10:03:44'),
(168, 56, 1, 9, 13, 5, 'Q3', 'Demo unit CM225FW<br />\rqty 5<br />\rasdasdasd', 6, 0, 'CM225FW', '2017-11-01', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'berdasarkan MOM kita diberikan CM225FW qty 5', 0, '2017-11-05 10:10:27', '2017-11-05 10:10:27'),
(169, 56, 1, 9, 13, 5, 'Q3', 'Demo unit CM225FW<br />\rqty 5<br />\rasdasdasd<br />\rasdasdasdasd', 6, 0, 'CM225FW', '2017-11-01', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'berdasarkan MOM kita diberikan CM225FW qty 5', 0, '2017-11-05 10:14:20', '2017-11-05 10:14:20'),
(170, 56, 1, 9, 13, 5, 'Q3', 'Demo unit CM225FW<br />\rqty 5', 6, 0, 'CM225FW', '2017-11-01', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'berdasarkan MOM kita diberikan CM225FW qty 5', 0, '2017-11-05 10:14:57', '2017-11-05 10:14:57'),
(171, 56, 1, 9, 13, 5, 'Q3', 'Demo unit CM225FW<br />qty 5<br />asdasdasd', 6, 0, 'CM225FW', '2017-11-01', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'berdasarkan MOM kita diberikan CM225FW qty 5', 0, '2017-11-05 10:18:34', '2017-11-05 10:18:34'),
(172, 56, 1, 9, 13, 5, 'Q3', 'Demo unit CM225FW<br />qty 5', 6, 0, 'CM225FW', '2017-11-01', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'berdasarkan MOM kita diberikan CM225FW qty 5', 0, '2017-11-05 10:18:44', '2017-11-05 10:18:44'),
(173, 56, 1, 9, 13, 5, 'Q3', 'Demo unit CM225FW<br />qty 5', 6, 0, 'CM225FW', '2017-11-01', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'berdasarkan MOM kita diberikan CM225FW qty 5<br />ya qty 5', 0, '2017-11-05 10:20:03', '2017-11-05 10:20:03'),
(174, 56, 1, 9, 13, 5, 'Q3', 'Demo unit CM225FW<br />qty 5', 6, 0, 'CM225FW', '2017-11-01', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'berdasarkan MOM kita diberikan CM225FW qty 5', 0, '2017-11-05 10:21:01', '2017-11-05 10:21:01'),
(175, 58, 20, 4, 28, 8, 'Q4', 'Trip ke Singapore selama 3 hari 2 malam ', 15, 0, 'Support Trip Singapu', '2017-11-06', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Based on Promo Confirmation no.546/ECOM/IV/2017, Target PO Rp 250.000.000 (sebelum PPn)', 0, '2017-11-06 10:29:20', '2017-11-06 10:29:20'),
(176, 59, 0, 1, 29, 5, 'Q3', 'Package A: Total CA 300 unit, Reward DJI Drone/Fujifilm Mirrorless X-A3<br />\rPackage B: Total CA 20', 16, 0, 'LENOVO CON T2 ST Pac', '2017-11-06', '2017-11-20', '0000-00-00', '', '', '', 0, 1, 'Detail Paket Mandatory Based on PRF6361 - CON T2 FY17 Q3 ID', 0, '2017-11-06 13:35:24', '2017-11-06 13:35:24'),
(177, 60, 20, 1, 29, 8, 'Q3', 'Package A: Target 300 unit, Reward DJI Drone/Fujifilm Mirrorless X-A3<br />\rPackage B: Target 200 un', 16, 0, 'LENOVO CON T2 ST Pac', '2017-11-06', '2017-11-20', '0000-00-00', '', '', '', 0, 1, 'Detail paket mandatory based on PRF6361 - CON T2 FY17 Q3 ID', 0, '2017-11-06 13:39:32', '2017-11-06 13:39:32'),
(178, 45, 1, 4, 17, 5, 'Q1', 'TIKET KOREA 21 DEALER', 3, 0, 'BROTHER TRIP KOREA', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 0, 1, 'PROGRAM PAKET INKJET DEALER TRIP KOREA 20 TIKET', 0, '2017-11-06 13:42:48', '2017-11-06 13:42:48'),
(179, 61, 1, 9, 28, 5, 'Q3', 'DEMO YA<br />aku mau nya ini tidak ada enter lagi<br /><br />iya dong harus gk ada enter<br /><br />', 4, 0, 'PUTRA testing', '2017-11-06', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'asdasdasd', 0, '2017-11-06 14:06:02', '2017-11-06 14:06:02'),
(180, 35, 10, 5, 8, 5, 'Q1', 'CN 23.900.000,-', 1, 0, 'SUPPORT J SERIES', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT J105, J200 @50rb, J3520 @100rb.', 0, '2017-11-06 14:08:11', '2017-11-06 14:08:11'),
(181, 45, 10, 4, 17, 5, 'Q1', 'TIKET KOREA 20 DEALER', 3, 0, 'BROTHER TRIP KOREA', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'PROGRAM PAKET INKJET DEALER TRIP KOREA 20 TIKET', 0, '2017-11-06 14:09:03', '2017-11-06 14:09:03'),
(182, 61, 1, 9, 28, 5, 'Q3', 'DEMO YA<br />aku mau nya ini tidak ada enter lagi<br /><br />iya dong harus gk ada enter<br /><br />', 4, 0, 'PUTRA testing', '2017-11-06', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'asdasdasd<br />asda<br />zzz<br />asdasdasgdf gdfgdf gd<br />fgdfgdfg dfg asdasd<br />zzz', 0, '2017-11-06 14:09:08', '2017-11-06 14:09:08'),
(183, 62, 10, 5, 17, 5, 'Q3', 'CASH 6.150.000,-', 3, 0, 'PRICE PROTECTION H10', '2017-11-06', '2017-11-07', '0000-00-00', '', '', '', 0, 1, 'SUPPORT PRICE PROTECTION PTOUCH H105 @150RB / UNIT.', 0, '2017-11-06 14:12:17', '2017-11-06 14:12:17'),
(184, 19, 10, 1, 14, 5, 'Q1', 'VOUCHER RP 5.100.000,-', 6, 0, 'BROTHER SCANNER VOUC', '2017-09-28', '2017-09-29', '0000-00-00', 'Tika', 'sartika@harrisma.com', '08118118123', 0, 1, 'BONUS VOUCHER PEMBELIAN ADS1100 + ADS2100 + ADS2800 Q2 2017 DARI HARRISMA', 0, '2017-11-06 14:13:22', '2017-11-06 14:13:22'),
(185, 63, 10, 1, 17, 5, 'Q2', 'VOUCHER 1JT', 3, 0, 'BROTHER SCANNER ADS2', '2017-11-06', '2017-11-07', '0000-00-00', '', '', '', 0, 1, 'SUPPORT FREE VOUCHER ADS 2100 @200RB.', 0, '2017-11-06 14:14:43', '2017-11-06 14:14:43'),
(186, 3, 10, 8, 8, 5, 'Q2', 'T300 QTY 20', 1, 0, 'SUPPORT SERVICE CENT', '2017-09-24', '2017-09-25', '0000-00-00', '', '', '', 0, 1, 'CONVERT SUPPORT SERVICE CENTER 40JT', 0, '2017-11-06 14:15:47', '2017-11-06 14:15:47'),
(187, 64, 10, 5, 8, 5, 'Q2', 'CN 16.8JT', 1, 0, 'SUPPORT SALES INCNET', '2017-11-06', '2017-11-08', '0000-00-00', '', '', '', 0, 1, 'SUPPORT T300 @25.000,- PER UNIT (KLAIM 672 UNIT / 270 UNIT)', 0, '2017-11-06 14:18:39', '2017-11-06 14:18:39'),
(188, 44, 10, 2, 17, 5, 'Q1', 'JULI UPDATE', 3, 0, 'KONSINYASI DEALER', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 0, 1, 'SUPPORT KONSINYASI DEALER 1% / BULAN START JULI', 0, '2017-11-06 14:23:37', '2017-11-06 14:23:37'),
(189, 43, 10, 2, 17, 5, 'Q2', 'JULI UPDATE', 3, 0, 'KONSINYASI HARTONO', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 0, 1, 'SUPPORT KONSINYASI 1% UNTUK HARTONO ELECTRONIK SELAMA 3 BULAN', 0, '2017-11-06 14:24:03', '2017-11-06 14:24:03'),
(190, 42, 10, 2, 17, 5, 'Q1', 'CASH 10.500.000,-', 3, 0, 'PROMOTOR PTOUCH HITE', '2017-10-08', '2017-10-09', '0000-00-00', 'Redy', 'redy.manlin@brother.co.id', '081', 0, 1, 'SUPPORT PROMOTOR PTOUCH HITECHMALL @3.5JT / BULAN', 0, '2017-11-06 14:25:10', '2017-11-06 14:25:10'),
(191, 42, 10, 2, 17, 5, 'Q1', 'CASH 10.500.000,-', 3, 0, 'PROMOTOR PTOUCH HITE', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT PROMOTOR PTOUCH HITECHMALL @3.5JT / BULAN, START DARI JUNI', 0, '2017-11-06 14:27:27', '2017-11-06 14:27:27');
INSERT INTO `db_rewards_history` (`id`, `id_reward`, `id_user`, `id_jenis_reward`, `id_contactperson`, `id_cabang`, `Quartal`, `keterangan_reward`, `kode_vendor`, `idbrand`, `no_po`, `tanggal_buat`, `tanggal_tagih`, `tanggal_selesai`, `nama_cp`, `email_cp`, `telp_cp`, `user_selesai`, `status`, `memo`, `isDelete`, `created_at`, `updated_at`) VALUES
(192, 39, 10, 2, 0, 5, 'Q1', 'CASH 7.714.000,-', 3, 0, 'SUPPORT PPN J3520', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 10, 3, 'SUPPORT RETURN PPN HARTONO J3520 QTY 14', 0, '2017-11-06 14:28:39', '2017-11-06 14:28:39'),
(193, 65, 20, 2, 29, 8, 'Q3', 'Lenovo Sell Out Booster for Entry Category Celeron 11", additional incentive 10.000/unit', 16, 0, 'LENOVO SELL OUT BOOS', '2017-11-06', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Based on PRF6456 - CON T2 FY17 Q3 ID', 0, '2017-11-06 14:30:00', '2017-11-06 14:30:00'),
(194, 42, 10, 2, 17, 5, 'Q1', 'CASH 10.500.000,-', 3, 0, 'PROMOTOR PTOUCH HITE', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT PROMOTOR PTOUCH HITECHMALL @3JT / BULAN, START DARI JUNI', 0, '2017-11-06 14:30:50', '2017-11-06 14:30:50'),
(195, 66, 20, 2, 29, 8, 'Q3', 'Lenovo ST PRM Q3 FY1718<br />Quota Revenue NB IDR 984.000.000<br />Quota Revenue DT IDR 986.000.000', 16, 0, 'LENOVO ST PRM Q3 FY1', '2017-11-06', '2017-11-07', '0000-00-00', '', '', '', 0, 1, 'Update achievement per ST PRM 03 Nov 2017, Achievement 139.78% Achievement DT 145.68% ', 0, '2017-11-06 14:46:21', '2017-11-06 14:46:21'),
(196, 67, 20, 1, 30, 8, 'Q4', 'Get Shopping Voucher IDR 500.000 with min revenue IDR 25.000.000 or IDR 1.200.000 with min revenue I', 7, 0, 'EXCITING REWARDS ON ', '2017-11-06', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Promo Synnex Symantec product Per 20 Oct 2017 - 31 Dec 2017', 0, '2017-11-06 15:04:52', '2017-11-06 15:04:52'),
(197, 68, 20, 4, 4, 8, 'Q1', 'Brother promo trip to Mongolia dengan pembelian printer & consumables senilai IDR 500.000.000 (exc p', 3, 0, 'ADVENTURE MONGOLIA', '2017-11-06', '2018-04-01', '0000-00-00', '', '', '', 0, 1, 'Periode promo 01 Sep 17 - 31 Mar 18, berlaku kelipatan, Jadwal penerbangan TBA', 0, '2017-11-06 15:48:47', '2017-11-06 15:48:47'),
(198, 69, 20, 1, 31, 8, 'Q4', 'Setiap pembelian AV121 dapat voucher Rp200.000, Pembelian AD240 dapat voucher Rp500.000', 17, 0, 'Beli Scanner Avision', '2017-11-06', '2017-12-31', '0000-00-00', '', '', '', 0, 1, 'Periode Promo 01 Oct 2017 -  30 Dec 2017', 0, '2017-11-06 17:03:35', '2017-11-06 17:03:35'),
(199, 70, 1, 8, 19, 5, 'Q2', 'asdasd asd''a sdasd''asdas "asdasdasd a''''<br /><br />asdasda''', 3, 0, 'apsdpadoaps', '2017-11-06', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'asdasd asd''a sdasd''asdas "asdasdasd a''''<br /><br />asdasda''', 0, '2017-11-06 17:52:42', '2017-11-06 17:52:42'),
(200, 71, 1, 5, 11, 5, 'Q1', 'asd asd 12"', 4, 0, 'apsdpadoaps', '2017-11-06', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'asd asd 12"', 0, '2017-11-06 17:55:45', '2017-11-06 17:55:45'),
(201, 72, 1, 9, 22, 5, 'Q2', 'asdasdasd-', 1, 0, 'apsdpadoaps', '2017-11-06', '2017-11-22', '0000-00-00', '', '', '', 0, 1, 'ZZZZZ"', 0, '2017-11-06 18:00:08', '2017-11-06 18:00:08'),
(202, 73, 1, 8, 22, 5, 'Q2', 'asdasdad&#39;', 1, 0, 'apsdpadoaps', '2017-11-06', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'asdasdad&#39;', 0, '2017-11-06 18:01:25', '2017-11-06 18:01:25'),
(203, 74, 1, 9, 19, 5, 'Q4', 'asdasdasdasd&#34;<br /><br />asdasd&#39;<br />asda<br /><br />asdasd&#34;&#34;&#34;&#34;<br />asdasd', 3, 0, 'apsdpadoaps', '2017-11-06', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'asdasdasdasd&#34;<br /><br />asdasd&#39;<br />asda<br /><br />asdasd&#34;&#34;&#34;&#34;<br />asdasd&#39;', 0, '2017-11-06 18:03:23', '2017-11-06 18:03:23'),
(204, 75, 1, 9, 19, 5, 'Q2', '&#34;&#34;&#34;&#34;&#34;asdajsdk asdkasd&#39;&#39;&#39;&#39;&#39;', 3, 0, 'asdasdasd', '2017-11-06', '2017-11-30', '0000-00-00', '', '', '', 0, 1, '&#34;&#34;&#34;&#34;&#34;asdajsdk asdkasd&#39;&#39;&#39;&#39;&#39;', 0, '2017-11-06 18:05:27', '2017-11-06 18:05:27'),
(205, 69, 1, 1, 31, 5, 'Q4', 'Setiap pembelian AV121 dapat voucher Rp200.000, Pembelian AD240 dapat voucher Rp500.000%', 17, 0, 'Beli Scanner Avision', '2017-11-06', '2017-12-31', '0000-00-00', '', '', '', 0, 1, 'Periode Promo 01 Oct 2017 -  30 Dec 2017', 0, '2017-11-06 18:07:27', '2017-11-06 18:07:27'),
(206, 69, 1, 1, 31, 5, 'Q4', 'Setiap pembelian AV121 dapat voucher Rp200.000, Pembelian AD240 dapat voucher Rp500.000', 17, 0, 'Beli Scanner Avision', '2017-11-06', '2017-12-31', '0000-00-00', '', '', '', 0, 1, 'Periode Promo 01 Oct 2017 -  30 Dec 2017', 0, '2017-11-06 18:08:03', '2017-11-06 18:08:03'),
(207, 76, 1, 8, 16, 5, 'Q3', 'asdas&#039;&lt;br /&gt;asd&quot;&lt;br /&gt;asdasd&#039;&lt;br /&gt;zzz&#039;&quot;', 1, 0, 'asdasdasd', '2017-11-06', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'asdas&#039;&lt;br /&gt;asd&quot;&lt;br /&gt;asdasd&#039;&lt;br /&gt;zzz&#039;&quot;', 0, '2017-11-06 18:14:13', '2017-11-06 18:14:13'),
(208, 69, 10, 1, 31, 5, 'Q4', 'Setiap pembelian AV121 dapat voucher Rp200.000, Pembelian AD240 dapat voucher Rp500.000', 17, 0, 'Beli Scanner Avision', '2017-11-06', '2017-12-31', '0000-00-00', '', '', '', 10, 7, 'Periode Promo 01 Oct 2017 -  30 Dec 2017', 0, '2017-11-06 19:38:07', '2017-11-06 19:38:07'),
(209, 68, 10, 4, 4, 5, 'Q1', 'Brother promo trip to Mongolia dengan pembelian printer & consumables senilai IDR 500.000.000 (exc p', 3, 0, 'ADVENTURE MONGOLIA', '2017-11-06', '2018-04-01', '0000-00-00', '', '', '', 10, 8, 'Periode promo 01 Sep 17 - 31 Mar 18, berlaku kelipatan, Jadwal penerbangan TBA', 0, '2017-11-06 19:38:15', '2017-11-06 19:38:15'),
(210, 69, 10, 1, 31, 5, 'Q4', 'Setiap pembelian AV121 dapat voucher Rp200.000, Pembelian AD240 dapat voucher Rp500.000', 17, 0, 'Beli Scanner Avision', '2017-11-06', '2017-12-31', '0000-00-00', '', '', '', 10, 1, 'Periode Promo 01 Oct 2017 -  30 Dec 2017', 0, '2017-11-06 19:39:25', '2017-11-06 19:39:25'),
(211, 68, 10, 4, 4, 5, 'Q1', 'Brother promo trip to Mongolia dengan pembelian printer & consumables senilai IDR 500.000.000 (exc p', 3, 0, 'ADVENTURE MONGOLIA', '2017-11-06', '2018-04-01', '0000-00-00', '', '', '', 10, 1, 'Periode promo 01 Sep 17 - 31 Mar 18, berlaku kelipatan, Jadwal penerbangan TBA', 0, '2017-11-06 19:39:32', '2017-11-06 19:39:32'),
(212, 69, 10, 1, 31, 5, 'Q4', 'Setiap pembelian AV121 dapat voucher Rp200.000, Pembelian AD240 dapat voucher Rp500.000', 17, 0, 'Beli Scanner Avision', '2017-11-06', '2017-12-31', '0000-00-00', '', '', '', 10, 8, 'Periode Promo 01 Oct 2017 -  30 Dec 2017', 0, '2017-11-06 19:39:58', '2017-11-06 19:39:58'),
(213, 69, 1, 1, 31, 5, 'Q4', 'Setiap pembelian AV121 dapat voucher Rp200.000, Pembelian AD240 dapat voucher Rp500.000', 17, 0, 'Beli Scanner Avision', '2017-11-06', '2017-12-31', '0000-00-00', '', '', '', 1, 1, 'Periode Promo 01 Oct 2017 -  30 Dec 2017', 0, '2017-11-06 19:53:41', '2017-11-06 19:53:41'),
(214, 77, 20, 13, 32, 8, 'Q4', 'Point achievement bottom 5000 point to get Smartphone Axioo m5, top 60000 point to get Honda Vario 1', 18, 0, 'Rainer Promo Okdes', '2017-11-07', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Detail Rainer Model dan Point based on flyer Promo Okdes Terangkanlah', 0, '2017-11-07 09:42:41', '2017-11-07 09:42:41'),
(215, 78, 20, 1, 33, 8, 'Q4', 'Microsoft On Premise: Target Revenue IDR 250.000.000 get Voucher IDR 1.250.000&lt;br /&gt;Microsoft ', 7, 0, 'SMI MICROSOFT YEAR E', '2017-11-07', '2017-12-21', '0000-00-00', '', '', '', 0, 1, 'Based on flyer promo SMI Microsoft Year End Promo&lt;br /&gt;Promo berlaku kelipatan', 0, '2017-11-07 10:10:49', '2017-11-07 10:10:49'),
(216, 79, 20, 7, 33, 8, 'Q4', 'Buy 50 Lisensi Microsoft Cloud, get Logam Mulia 10gr. Buy 100 Lisensi Microsoft Cloud, get Logam Mul', 7, 0, 'SMI MICROSOFT PESTA ', '2017-11-07', '2017-12-16', '0000-00-00', '', '', '', 0, 1, 'Tidak berlaku kelipatan, Tidak berlaku untuk pembelian tipe lic academic, government, charity; Tidak berlaku untuk penggunaan rumahan', 0, '2017-11-07 10:38:48', '2017-11-07 10:38:48'),
(217, 80, 20, 7, 33, 8, 'Q4', 'Buy License Cloud 50unit, Reward LM 5gr. License Cloud 100unit, Reward LM 10gr. License On Prem 200j', 7, 0, 'SMI MICROSOFT PESTA ', '2017-11-07', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Promo untuk SMB Partner. Tidak berlaku kelipatan. Tidak berlaku untuk pembelian tipe Lic Academic, Government, Charity. Tidak berlaku untuk lic penggunaan rumahan', 0, '2017-11-07 11:07:14', '2017-11-07 11:07:14'),
(218, 81, 20, 7, 33, 8, 'Q4', 'Target Rev CSP Lic based (O365,Dynamic,EMS) IDR10jt, Reward LM 5gr. Target Rev CSP Usage based (MS A', 7, 0, 'SMI CSP PARTNER INCE', '2017-11-07', '2018-01-09', '0000-00-00', '', '', '', 0, 1, 'Berlaku untuk produk Microsoft Cloud CSP, Tidak berlaku pembelian lic untuk penggunaan rumahan', 0, '2017-11-07 11:21:40', '2017-11-07 11:21:40'),
(219, 82, 20, 1, 33, 8, 'Q4', 'Dapatkan Shopping Voucher 500rb dengan min transaksi Ms CSP 2jt (Periode Agustus - December 2017)', 7, 0, 'SMI MICROSOFT CSP', '2017-11-07', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Hanya untuk cust baru selama periode promo. Min 3 cust', 0, '2017-11-07 11:40:29', '2017-11-07 11:40:29'),
(220, 83, 20, 2, 34, 8, 'Q4', 'Support Branding Mobil AirMas Rp. 11.000.000 incl PPN', 3, 0, 'BROTHER BRANDING MOB', '2017-11-07', '2017-11-08', '0000-00-00', '', '', '', 0, 1, 'Invoice sudah dibuat dan dikirim ke vendor', 0, '2017-11-07 12:08:40', '2017-11-07 12:08:40'),
(221, 84, 0, 2, 35, 5, 'Q4', 'Support Branding Mobil AirMas Rp. 11.000.000 incl PPN', 19, 0, 'PANASONIC BRANDING M', '2017-11-07', '2017-11-08', '0000-00-00', '', '', '', 0, 1, 'Invoice sudah di buat dan di kirim ke vendor', 0, '2017-11-07 13:39:20', '2017-11-07 13:39:20'),
(222, 85, 20, 11, 35, 8, 'Q4', 'Support Branding Mobil AirMas Rp. 11.000.000 incl PPN', 19, 0, 'PANASONIC BRANDING M', '2017-11-07', '2017-11-08', '0000-00-00', '', '', '', 0, 1, 'Invoice sudah dibuat dan dikirim ke vendor ', 0, '2017-11-07 13:41:07', '2017-11-07 13:41:07'),
(223, 40, 10, 5, 0, 5, 'Q2', 'LADY UPDATE', 4, 0, 'PROJEK 2540 + 2700', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 10, 1, 'SUPPORT CN PROJEK 2540 + 2700, NILAI REAL 1.950.000,-', 0, '2017-11-07 15:16:22', '2017-11-07 15:16:22'),
(224, 38, 10, 5, 18, 5, 'Q4', 'CN 12JT', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 10, 1, 'BONUS PEMBELIAN PAKET PRINTER BROTHER 4% Q4 2016', 0, '2017-11-07 15:16:48', '2017-11-07 15:16:48'),
(225, 37, 10, 8, 18, 5, 'Q4', 'FREE UNIT SENILAI 3% DARI PEMBELIAN PAKET PRINTER Q4 2016', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 10, 1, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-11-07 15:17:45', '2017-11-07 15:17:45'),
(226, 86, 20, 1, 36, 8, 'Q4', 'Total Pembelian APC HBN sebelum PPN IDR 25jt Reward Shopping Voucher IDR 150rb, 50jt Reward 350rb, 1', 20, 0, 'INGRAM APC HBN PROGR', '2017-11-07', '2017-12-30', '0000-00-00', '', '', '', 0, 1, 'Tidak berlaku untuk special project price', 0, '2017-11-07 15:18:39', '2017-11-07 15:18:39'),
(227, 37, 10, 8, 18, 5, 'Q4', 'CASH 6.011.400', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT 3% DARI NOMINAL PEMBELIAN PAKET PRINTER Q4 2016 DI CONVERT KE FREE UNIT', 0, '2017-11-07 15:35:14', '2017-11-07 15:35:14'),
(228, 87, 20, 5, 37, 8, 'Q4', 'Target Sell in dengan pengambilan ke Distri Resmi (Synnex, Visiland, Galva) Tot IDR 800jt (Periode 2', 21, 0, 'ACER ELITE PARTNER (', '2017-11-07', '2017-12-16', '0000-00-00', '', '', '', 0, 1, ' Closing Date sebagai berikut : Oct : 26 Oct 2017, Nov : 24 Nov 2017, Dec : 15 Dec 2017', 0, '2017-11-07 16:58:24', '2017-11-07 16:58:24'),
(229, 88, 20, 2, 38, 8, 'Q4', 'Rebate FY17 Total IDR 2.000.000.000 (Target Q1 Rp 380jt, Q2 Rp 480jt, Q3 Rp 500jt, Q4 Rp 640jt)', 22, 0, 'APC REBATE FY17', '2017-11-08', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Q1 achieve Rp 875.218.945, Q2 achieve Rp 963.585.710, Q3 achieve Rp 859.209.404', 0, '2017-11-08 10:22:16', '2017-11-08 10:22:16'),
(230, 89, 20, 2, 39, 8, 'Q4', 'LKPP REBATE CLAIM BROTHER BIP 2016 Batch 1 (Rp 157.107.000)', 3, 0, 'REBATE CLAIM BROTHER', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 0, 1, 'Rebate Rp 157.107.000 sudah dibayarkan oleh Brother&lt;br /&gt;cc. Finance, bantu check ya', 0, '2017-11-08 12:01:14', '2017-11-08 12:01:14'),
(231, 90, 20, 2, 39, 8, 'Q4', 'LKPP REBATE CLAIM BROTHER BIP 2016 - batch 2 (Rp. 16.771.000 incl PPN)', 3, 0, 'REBATE CLAIM BROTHER', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 0, 1, 'cc. Finance, tolong dibuatkan invoice ke PT.Brother Indonesia', 0, '2017-11-08 12:06:02', '2017-11-08 12:06:02'),
(232, 91, 0, 5, 40, 5, 'Q4', 'Desktop AIO Acer Sell Thru Program AC22-760 (DQ.B6VSN.004/UD.B6VSD.002)&lt;br /&gt;Package S: Qty 5 ', 7, 0, 'SMI AIO ACER PROGRAM', '2017-11-08', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Promo selama Nov 2017', 0, '2017-11-08 13:49:41', '2017-11-08 13:49:41'),
(233, 92, 20, 5, 40, 8, 'Q4', 'Desktop AIO Sell Thru Program AC22-760 (PN DQ.B6VSN.004/UD.B6VSD.002)&lt;br /&gt;Package S: Qty 5 un', 7, 0, 'SMI AIO ACER PROGRAM', '2017-11-08', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Periode Promo selama bulan Nov 2107', 0, '2017-11-08 13:54:29', '2017-11-08 13:54:29'),
(234, 93, 20, 2, 41, 8, 'Q2', 'Payout ID ID60REA170810_0170, Program ID ID1702128117 (Total Amount Rp 91.399.779) ', 23, 0, 'ARMINDO - Q2FY17 5T ', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/ARM/2017/X/0017&lt;br /&gt;CC.Finance', 0, '2017-11-08 14:24:49', '2017-11-08 14:24:49'),
(235, 94, 20, 2, 41, 8, 'Q3', 'Payout ID #ID60REA171009_0043, Program ID #ID1705131286 (Total Amount Rp 4.797.100)', 24, 0, 'ARMINDO - Q3FY17 OPS', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/ARM/2017/X/0016&lt;br /&gt;cc. Finance', 0, '2017-11-08 15:45:13', '2017-11-08 15:45:13'),
(236, 95, 20, 2, 41, 8, 'Q2', 'Payout ID #ID60REA171018_0069, Program ID #ID1702128117 (Total Amount Rp 91.399.778)', 23, 0, 'ARMINDO - Q2FY17 5T ', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/ARM/2017/X/0018&lt;br /&gt;cc. Finance', 0, '2017-11-08 15:51:26', '2017-11-08 15:51:26'),
(237, 96, 20, 2, 41, 8, 'Q1', 'Add Deal Coop Q1 2017 (Total Amount Rp 27.000.000)', 24, 0, 'ARMINDO - Add Deal C', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/ARM/2017/X/0020&lt;br /&gt;cc. Finance', 0, '2017-11-08 15:56:43', '2017-11-08 15:56:43'),
(238, 97, 20, 2, 41, 8, 'Q2', 'Add Deal Coop Q2 2017 (Total Amount Rp 27.000.000)', 24, 0, 'ARMINDO - Add Deal C', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/ARM/2017/X/0021&lt;br /&gt;cc. Finance', 0, '2017-11-08 15:58:37', '2017-11-08 15:58:37'),
(239, 98, 20, 2, 41, 8, 'Q3', 'Add Deal Coop Q3 2017 (Total Amount Rp 27.000.000)', 24, 0, 'ARMINDO - Add Deal C', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/ARM/2017/X/0019&lt;br /&gt;cc. Finance', 0, '2017-11-08 16:00:18', '2017-11-08 16:00:18'),
(240, 99, 20, 2, 41, 8, 'Q2', 'Payout ID#ID60REA170814_0030, Program ID#ID1702128141 (Total Amount Rp 158.400.000)', 23, 0, 'ARMINDO - 1N Q2FY17 ', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/ARM/2017/VIII/0014', 0, '2017-11-08 16:54:43', '2017-11-08 16:54:43'),
(241, 100, 20, 2, 41, 8, 'Q2', 'Payout ID #ID60REA171024_0171, Program ID #ID60REA1702128141 (Total Amount Rp 160.319.818)', 23, 0, 'ARMINDO - 1N Q2FY17 ', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/ARM/2017/X/0019&lt;br /&gt;cc. Finance', 0, '2017-11-08 16:56:42', '2017-11-08 16:56:42'),
(242, 100, 20, 2, 41, 8, 'Q2', 'Payout ID #ID60REA171024_0171, Program ID #ID60REA1702128141 (Total Amount Rp 160.319.818)', 23, 0, 'ARMINDO - 1N Q2FY17 ', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0019&lt;br /&gt;cc. Finance', 0, '2017-11-08 18:09:18', '2017-11-08 18:09:18'),
(243, 99, 20, 2, 41, 8, 'Q2', 'Payout ID#ID60REA170814_0030, Program ID#ID1702128141 (Total Amount Rp 158.400.000)', 23, 0, 'ARMINDO - 1N Q2FY17 ', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/VIII/0014', 0, '2017-11-08 18:09:30', '2017-11-08 18:09:30'),
(244, 98, 20, 2, 41, 8, 'Q3', 'Add Deal Coop Q3 2017 (Total Amount Rp 27.000.000)', 24, 0, 'ARMINDO - Add Deal C', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0019&lt;br /&gt;cc. Finance', 0, '2017-11-08 18:09:48', '2017-11-08 18:09:48'),
(245, 97, 20, 2, 41, 8, 'Q2', 'Add Deal Coop Q2 2017 (Total Amount Rp 27.000.000)', 24, 0, 'ARMINDO - Add Deal C', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0021&lt;br /&gt;cc. Finance', 0, '2017-11-08 18:10:02', '2017-11-08 18:10:02'),
(246, 96, 20, 2, 41, 8, 'Q1', 'Add Deal Coop Q1 2017 (Total Amount Rp 27.000.000)', 24, 0, 'ARMINDO - Add Deal C', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0020&lt;br /&gt;cc. Finance', 0, '2017-11-08 18:10:19', '2017-11-08 18:10:19'),
(247, 95, 20, 2, 41, 8, 'Q2', 'Payout ID #ID60REA171018_0069, Program ID #ID1702128117 (Total Amount Rp 91.399.778)', 23, 0, 'ARMINDO - Q2FY17 5T ', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0018&lt;br /&gt;cc. Finance', 0, '2017-11-08 18:10:29', '2017-11-08 18:10:29'),
(248, 94, 20, 2, 41, 8, 'Q3', 'Payout ID #ID60REA171009_0043, Program ID #ID1705131286 (Total Amount Rp 4.797.100)', 24, 0, 'ARMINDO - Q3FY17 OPS', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0016&lt;br /&gt;cc. Finance', 0, '2017-11-08 18:10:39', '2017-11-08 18:10:39'),
(249, 93, 20, 2, 41, 8, 'Q2', 'Payout ID ID60REA170810_0170, Program ID ID1702128117 (Total Amount Rp 91.399.779) ', 23, 0, 'ARMINDO - Q2FY17 5T ', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Invoice Tagihan #IN/ARM/2017/X/0017&lt;br /&gt;CC.Finance', 0, '2017-11-08 18:10:50', '2017-11-08 18:10:50'),
(250, 89, 20, 2, 39, 8, 'Q4', 'LKPP REBATE CLAIM BROTHER BIP 2016 Batch 1 (Rp 157.107.000)', 3, 0, 'REBATE CLAIM BROTHER', '2017-11-08', '2017-11-09', '0000-00-00', '', '', '', 20, 7, 'Rebate Rp 157.107.000 sudah dibayarkan oleh Brother&lt;br /&gt;cc. Finance, bantu check ya', 0, '2017-11-08 18:12:30', '2017-11-08 18:12:30'),
(251, 85, 20, 11, 35, 8, 'Q4', 'Support Branding Mobil AirMas Rp. 11.000.000 incl PPN', 19, 0, 'PANASONIC BRANDING M', '2017-11-07', '2017-11-08', '0000-00-00', '', '', '', 20, 7, 'Invoice sudah dibuat dan dikirim ke vendor ', 0, '2017-11-08 18:13:43', '2017-11-08 18:13:43'),
(252, 101, 20, 2, 24, 8, 'Q2', 'Rebate Payout ID#1812011 Total Rp 1.492.719.041', 24, 0, 'AirMas - PPS-PPFR201', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/AMP/2017/XI/0250&lt;br /&gt;cc. Finance', 0, '2017-11-09 11:46:32', '2017-11-09 11:46:32'),
(253, 102, 20, 2, 24, 8, 'Q3', 'Rebate MVC Payout ID#1814707 Total Rp  1.059.629.695', 24, 0, 'AirMas - MVC2017Q3Ju', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/AMP/2017/XI/0245&lt;br /&gt;cc. Finance', 0, '2017-11-09 12:02:42', '2017-11-09 12:02:42'),
(254, 103, 20, 2, 24, 8, 'Q2', 'ASPEN Q2 Total Payout Rp 375.072.842', 25, 0, 'AirMas - Q2FY17 5T C', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Payout ID#ID60REA170810_0002, Program ID#ID1702128114, Invoice Tagih #IN/AMP/2017/XI/0247&lt;br /&gt;cc. Finance', 0, '2017-11-09 13:38:15', '2017-11-09 13:38:15'),
(255, 104, 20, 2, 24, 8, 'Q2', 'Payout ID#ID60REA170811_0014 Total Rp 345.846.566', 25, 0, 'AirMas - 1N Q2FY17 T', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Program ID#ID1702128125, Invoice Tagih #IN/AMP/2017/XI/0248&lt;br /&gt;cc. Finance', 0, '2017-11-09 13:48:19', '2017-11-09 13:48:19'),
(256, 105, 20, 2, 24, 8, 'Q4', 'Support Roadshow Ayooklik Total Payable Rp 140.411.326&lt;br /&gt;', 24, 0, 'Support Roadshow Ayo', '2017-11-09', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Support Roadshow Ayooklik Kota Banjarmasin, Banten, Pontianak, Ternate, Lampung (invoice to PT Bright Brilliant #IN/AMP/2017/IX/0311)&lt;br /&gt;', 0, '2017-11-09 14:01:11', '2017-11-09 14:01:11'),
(257, 106, 20, 2, 24, 8, 'Q2', 'Klaim Support Q2FY17 Total Payout Rp 11.000.000', 24, 0, 'Support Q2FY17', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Claim Support Gathering Airmas 2017 (invoice to PT Quantum Ciptakreasi #IN/AMP/2017/VIII/0366)&lt;br /&gt;cc. Finance', 0, '2017-11-09 14:13:49', '2017-11-09 14:13:49'),
(258, 107, 20, 2, 24, 8, 'Q2', 'PPS-PPFR Q2FY17 Total Payable Rp 1.500.746.566', 24, 0, 'PPS-PPFR Q2FY2017', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Payout ID#1797045, Invoice Tagih #IN/AMP/2017/VI/01254&lt;br /&gt;cc. Finance', 0, '2017-11-09 14:29:30', '2017-11-09 14:29:30'),
(259, 105, 20, 2, 24, 8, 'Q4', 'Support Roadshow Ayooklik Total Payable Rp 140.411.326', 24, 0, 'Support Roadshow Ayo', '2017-11-09', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Support Roadshow Ayooklik Kota Banjarmasin, Banten, Pontianak, Ternate, Lampung (invoice to PT Bright Brilliant #IN/AMP/2017/IX/0311) Pending akhir tahun', 0, '2017-11-09 14:42:40', '2017-11-09 14:42:40'),
(260, 105, 20, 2, 24, 8, 'Q4', 'Support Roadshow Ayooklik Total Payable Rp 140.411.326', 24, 0, 'Support Roadshow Ayo', '2017-11-09', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Support Roadshow Ayooklik Kota Banjarmasin, Banten, Pontianak, Ternate, Lampung (invoice to PT Bright Brilliant #IN/AMP/2017/IX/0311) Pending akhir tahun', 0, '2017-11-09 14:42:53', '2017-11-09 14:42:53'),
(261, 108, 20, 2, 24, 8, 'Q4', 'Support Elite X2 Digital Advertising Total Payable Rp 57.000.000', 24, 0, 'Support Elite X2 Dig', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagih #IN/AMP/2017/IV/00923 (bill to SMI)... Pending Bu Irma, ganti jd Laptop?', 0, '2017-11-09 14:47:21', '2017-11-09 14:47:21'),
(262, 109, 20, 2, 24, 8, 'Q4', 'Rebate MVC Payout ID#1836110 Total Rp 299.188.930', 24, 0, 'MVC2017Q4Aug', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagih #IN/AMP/2017/XI/0246&lt;br /&gt;cc. Finance', 0, '2017-11-09 14:58:09', '2017-11-09 14:58:09'),
(263, 110, 20, 2, 24, 8, 'Q4', 'Rebate Payout ID#1838797 Total Rp  175.437.577', 24, 0, 'MVC2017Q4Sep', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagih #IN/AMP/2017/XI/0249', 0, '2017-11-09 15:04:20', '2017-11-09 15:04:20'),
(264, 101, 20, 2, 24, 8, 'Q2', 'Rebate Payout ID#1812011 Total Rp 1.492.719.041', 24, 0, 'PPS-PPFR2017Q2', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/AMP/2017/XI/0250<br />cc. Finance', 0, '2017-11-09 15:06:52', '2017-11-09 15:06:52'),
(265, 102, 20, 2, 24, 8, 'Q3', 'Rebate MVC Payout ID#1814707 Total Rp  1.059.629.695', 24, 0, 'AirMas - MVC2017Q3Ju', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/AMP/2017/XI/0245<br />cc. Finance', 0, '2017-11-09 15:07:22', '2017-11-09 15:07:22'),
(266, 103, 20, 2, 24, 8, 'Q2', 'ASPEN Q2 Total Payout Rp 375.072.842', 25, 0, 'AirMas - Q2FY17 5T C', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Payout ID#ID60REA170810_0002, Program ID#ID1702128114, Invoice Tagih #IN/AMP/2017/XI/0247<br />cc. Finance', 0, '2017-11-09 15:07:54', '2017-11-09 15:07:54'),
(267, 103, 20, 2, 24, 8, 'Q2', 'ASPEN Q2 Total Payout Rp 375.072.842', 25, 0, 'Q2FY17 5T Commercial', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Payout ID#ID60REA170810_0002, Program ID#ID1702128114, Invoice Tagih #IN/AMP/2017/XI/0247<br />cc. Finance', 0, '2017-11-09 15:08:06', '2017-11-09 15:08:06'),
(268, 102, 20, 2, 24, 8, 'Q3', 'Rebate MVC Payout ID#1814707 Total Rp  1.059.629.695', 24, 0, 'MVC2017Q3Jul', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagihan #IN/AMP/2017/XI/0245<br />cc. Finance', 0, '2017-11-09 15:08:35', '2017-11-09 15:08:35'),
(269, 104, 20, 2, 24, 8, 'Q2', 'Payout ID#ID60REA170811_0014 Total Rp 345.846.566', 25, 0, '1N Q2FY17 T2 Program', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Program ID#ID1702128125, Invoice Tagih #IN/AMP/2017/XI/0248<br />cc. Finance', 0, '2017-11-09 15:09:35', '2017-11-09 15:09:35'),
(270, 109, 20, 2, 24, 8, 'Q4', 'Rebate MVC Payout ID#1836110 Total Rp 299.188.930', 24, 0, 'MVC2017Q4Aug', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagih #IN/AMP/2017/XI/0246<br />cc. Finance', 0, '2017-11-09 15:11:27', '2017-11-09 15:11:27'),
(271, 111, 20, 2, 24, 8, 'Q4', 'Support Gathering Airmas Group 2017 Total Rp 70.000.000', 24, 0, 'Support Gathering 20', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagih #IN/AMP/2017/V/01127&lt;br /&gt;cc. Finance', 0, '2017-11-09 15:24:17', '2017-11-09 15:24:17'),
(272, 112, 20, 2, 24, 8, 'Q4', 'Vehicle Branding For Air Mas Total Rp 104.869.270', 24, 0, 'HP Vehicle Branding', '2017-11-09', '2017-11-13', '0000-00-00', '', '', '', 0, 1, 'Payout ID #10672168, Invoice Tagih #IN/AMP/2017/X/0339&lt;br /&gt;cc. Finance', 0, '2017-11-09 15:30:00', '2017-11-09 15:30:00'),
(273, 113, 20, 2, 24, 8, 'Q4', 'Digital Advertising with Air Mas Perkasa Total Rp 92.984.100', 24, 0, 'HP Digital Advertisi', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Entry ID#1170, Invoice Tagih #IN/AMP/2017/X/0341 (bill to PT Quantum Ciptakreasi)', 0, '2017-11-09 15:35:27', '2017-11-09 15:35:27'),
(274, 114, 20, 2, 24, 8, 'Q4', 'HP Champion Program for Air Mas Perkasa Total Rp 104.869.270', 24, 0, 'HP Champion Program', '2017-11-09', '2017-11-13', '0000-00-00', '', '', '', 0, 1, 'Entry ID #10672169, Invoice Tagih #IN/AMP/2017/X/0340', 0, '2017-11-09 15:44:37', '2017-11-09 15:44:37'),
(275, 7, 1, 2, 3, 5, 'Q4', 'US 5060', 2, 0, 'FX PAKET COLOUR Q4 2', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'BONUS PAKET COLOUR Q4 2016', 0, '2017-11-09 15:49:12', '2017-11-09 15:49:12'),
(276, 115, 20, 2, 24, 8, 'Q4', 'Closing LKPP Ayooklik Total Rp 48.939.000', 24, 0, 'Closing LKPP Ayookli', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Entry ID #10672208, Invoice Tagih #IN/AMP/2017/X/0342 (Inv bill to PT Quantum Ciptakreasi)', 0, '2017-11-09 15:59:54', '2017-11-09 15:59:54'),
(277, 101, 20, 2, 24, 8, 'Q2', 'Rebate Total Rp 1.492.719.041', 24, 0, 'PPS-PPFR2017Q2', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Payout ID#1812011 Invoice Tagihan #IN/AMP/2017/XI/0250 cc. Finance', 0, '2017-11-09 17:59:43', '2017-11-09 17:59:43'),
(278, 102, 20, 2, 24, 8, 'Q3', 'Rebate MVC Total Rp  1.059.629.695', 24, 0, 'MVC2017Q3Jul', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Payout ID#1814707 Invoice Tagihan #IN/AMP/2017/XI/0245 cc. Finance', 0, '2017-11-09 18:00:45', '2017-11-09 18:00:45'),
(279, 103, 20, 2, 24, 8, 'Q2', 'ASPEN Q2 Total Rp 375.072.842', 25, 0, 'Q2FY17 5T Commercial', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Payout ID#ID60REA170810_0002, Program ID#ID1702128114, Invoice Tagih #IN/AMP/2017/XI/0247<br />cc. Finance', 0, '2017-11-09 18:01:56', '2017-11-09 18:01:56'),
(280, 104, 20, 2, 24, 8, 'Q2', 'Total Payout Rp 345.846.566', 25, 0, '1N Q2FY17 T2 Program', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Payout ID#ID60REA170811_0014 Program ID#ID1702128125, Invoice Tagih #IN/AMP/2017/XI/0248 cc. Finance', 0, '2017-11-09 18:03:16', '2017-11-09 18:03:16'),
(281, 105, 20, 2, 24, 8, 'Q4', 'Total Payable Rp 140.411.326', 24, 0, 'Support Roadshow Ayo', '2017-11-09', '2017-12-01', '0000-00-00', '', '', '', 0, 1, 'Support Roadshow Ayooklik Kota Banjarmasin, Banten, Pontianak, Ternate, Lampung (invoice to PT Bright Brilliant #IN/AMP/2017/IX/0311) Pending akhir tahun', 0, '2017-11-09 18:04:14', '2017-11-09 18:04:14'),
(282, 106, 20, 2, 24, 8, 'Q2', 'Total Payout Rp 11.000.000', 24, 0, 'Support Q2FY17', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Claim Support Gathering Airmas 2017 (invoice to PT Quantum Ciptakreasi #IN/AMP/2017/VIII/0366) cc. Finance', 0, '2017-11-09 18:05:15', '2017-11-09 18:05:15'),
(283, 107, 20, 2, 24, 8, 'Q2', 'Total Payable Rp 1.500.746.566', 24, 0, 'PPS-PPFR Q2FY2017', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Payout ID#1797045, Invoice Tagih #IN/AMP/2017/VI/01254 cc. Finance', 0, '2017-11-09 18:07:13', '2017-11-09 18:07:13'),
(284, 108, 20, 2, 24, 8, 'Q4', 'Total Payable Rp 57.000.000', 24, 0, 'Support Elite X2 Dig', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagih #IN/AMP/2017/IV/00923 (bill to SMI)... Pending Bu Irma, ganti jd 2u NB (dipakai Pak Hendra dan Bu Dilla)', 0, '2017-11-09 18:08:47', '2017-11-09 18:08:47'),
(285, 109, 20, 2, 24, 8, 'Q4', 'Total Rp 299.188.930', 24, 0, 'MVC2017Q4Aug', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Rebate MVC Payout ID#1836110 Invoice Tagih #IN/AMP/2017/XI/0246 cc. Finance', 0, '2017-11-09 18:09:27', '2017-11-09 18:09:27'),
(286, 110, 20, 2, 24, 8, 'Q4', 'Total Rp  175.437.577', 24, 0, 'MVC2017Q4Sep', '2017-11-09', '2017-12-08', '0000-00-00', '', '', '', 0, 1, 'Rebate Payout ID#1838797 Invoice Tagih #IN/AMP/2017/XI/0249 cc. Finance', 0, '2017-11-09 18:10:15', '2017-11-09 18:10:15'),
(287, 111, 20, 2, 24, 8, 'Q4', 'Total Rp 70.000.000', 24, 0, 'Support Gathering Ai', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Invoice Tagih #IN/AMP/2017/V/01127 cc. Finance', 0, '2017-11-09 18:11:02', '2017-11-09 18:11:02'),
(288, 112, 20, 2, 24, 8, 'Q4', 'Total Rp 104.869.270', 24, 0, 'HP Vehicle Branding ', '2017-11-09', '2017-11-13', '0000-00-00', '', '', '', 0, 1, 'Payout ID #10672168, Invoice Tagih #IN/AMP/2017/X/0339 cc. Finance', 0, '2017-11-09 18:11:49', '2017-11-09 18:11:49'),
(289, 113, 20, 2, 24, 8, 'Q4', 'Total Rp 92.984.100', 24, 0, 'HP Digital Advertisi', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Entry ID#1170, Invoice Tagih #IN/AMP/2017/X/0341 (bill to PT Quantum Ciptakreasi)', 0, '2017-11-09 18:12:38', '2017-11-09 18:12:38'),
(290, 114, 20, 2, 24, 8, 'Q4', 'Total Rp 104.869.270', 24, 0, 'HP Champion Program ', '2017-11-09', '2017-11-13', '0000-00-00', '', '', '', 0, 1, 'Entry ID #10672169, Invoice Tagih #IN/AMP/2017/X/0340', 0, '2017-11-09 18:13:10', '2017-11-09 18:13:10'),
(291, 115, 20, 2, 24, 8, 'Q4', 'Total Rp 48.939.000', 24, 0, 'Closing LKPP Ayookli', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Entry ID #10672208, Invoice Tagih #IN/AMP/2017/X/0342 (Inv bill to PT Quantum Ciptakreasi)', 0, '2017-11-09 18:13:32', '2017-11-09 18:13:32'),
(292, 115, 1, 2, 24, 0, 'Q4', 'Total Rp 48.939.000', 24, 0, 'Closing LKPP Ayookli', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Entry ID #10672208, Invoice Tagih #IN/AMP/2017/X/0342 (Inv bill to PT Quantum Ciptakreasi)', 0, '2017-11-09 22:42:27', '2017-11-09 22:42:27'),
(293, 115, 1, 2, 24, 0, 'Q4', 'Total Rp 48.939.000', 24, 0, 'Closing LKPP Ayookli', '2017-11-09', '2017-11-10', '0000-00-00', '', '', '', 0, 1, 'Entry ID #10672208, Invoice Tagih #IN/AMP/2017/X/0342 (Inv bill to PT Quantum Ciptakreasi)', 0, '2017-11-09 22:42:39', '2017-11-09 22:42:39'),
(294, 64, 24, 5, 8, 0, 'Q2', 'CN 16.8JT', 1, 0, 'SUPPORT SALES INCNET', '2017-11-06', '2017-11-08', '0000-00-00', '', '', '', 0, 1, 'SUPPORT T300 @25.000,- PER UNIT (KLAIM 672 UNIT / 270 UNIT)', 0, '2017-11-09 22:46:10', '2017-11-09 22:46:10'),
(295, 64, 24, 5, 8, 0, 'Q2', 'CN 16.8JT', 1, 0, 'SUPPORT SALES INCNET', '2017-11-06', '2017-11-08', '0000-00-00', '', '', '', 0, 1, 'SUPPORT T300 @25.000,- PER UNIT (KLAIM 672 UNIT / 270 UNIT)', 0, '2017-11-09 22:46:20', '2017-11-09 22:46:20'),
(296, 58, 1, 4, 28, 0, 'Q4', 'Trip ke Singapore selama 3 hari 2 malam ', 15, 0, 'Support Trip Singapu', '2017-11-06', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Based on Promo Confirmation no.546/ECOM/IV/2017, Target PO Rp 250.000.000 (sebelum PPn)', 0, '2017-11-10 09:17:47', '2017-11-10 09:17:47'),
(297, 58, 1, 4, 28, 0, 'Q4', 'Trip ke Singapore selama 3 hari 2 malam ', 15, 0, 'Support Trip Singapu', '2017-11-06', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Based on Promo Confirmation no.546/ECOM/IV/2017, Target PO Rp 250.000.000 (sebelum PPn)', 0, '2017-11-10 09:18:05', '2017-11-10 09:18:05'),
(298, 53, 13, 4, 5, 0, 'Q4', '1 TIKET BANGKOK - di convert ke uang, senilai 7jt (blm dipot dengan admin travel agent)', 14, 0, 'AVNET LOYALTI PROGRA', '2017-10-14', '2017-10-15', '0000-00-00', '', '', '', 0, 1, '1 TIKET TRIP BANGKOK', 0, '2017-11-10 09:44:49', '2017-11-10 09:44:49'),
(299, 116, 20, 2, 42, 8, 'Q3', 'REBATE INCENTIVE IDR 28,875,000 (before vat)', 26, 0, 'Q3FY17 T2 Dell Incen', '2017-11-10', '2017-11-11', '0000-00-00', '', '', '', 0, 1, 'Program Code #9725372, Program Duration 30th Jul 2016 to 28th Oct 2016 (invoice to PT. Integritas Training Idea)&lt;br /&gt;Sudah terima transferan IDR 27.431.250&lt;br /&gt;CC. Finance &amp; Bu Rini, tolong FU WHT (PPh 23 badan 15%) dari Integra untuk close program ini', 0, '2017-11-10 10:26:02', '2017-11-10 10:26:02'),
(300, 116, 20, 2, 42, 0, 'Q3', 'REBATE INCENTIVE IDR 28,875,000 (before vat)', 26, 0, 'Q3FY17 T2 Dell Incen', '2017-11-10', '2017-11-11', '0000-00-00', '', '', '', 20, 7, 'Program Code #9725372, Program Duration 30th Jul 2016 to 28th Oct 2016 (invoice to PT. Integritas Training Idea)&lt;br /&gt;Sudah terima transferan IDR 27.431.250&lt;br /&gt;CC. Finance &amp; Bu Rini, tolong FU WHT (PPh 23 badan 15%) dari Integra untuk close program ini', 0, '2017-11-10 10:27:03', '2017-11-10 10:27:03'),
(301, 19, 27, 1, 14, 0, 'Q1', 'VOUCHER RP 5.100.000,-', 6, 0, 'BROTHER SCANNER VOUC', '2017-09-28', '2017-09-29', '0000-00-00', 'Tika', 'sartika@harrisma.com', '08118118123', 27, 1, 'BONUS VOUCHER PEMBELIAN ADS1100 + ADS2100 + ADS2800 Q2 2017 DARI HARRISMA', 0, '2017-11-10 14:16:57', '2017-11-10 14:16:57'),
(302, 64, 27, 5, 8, 0, 'Q2', 'CN 16.8JT', 1, 0, 'SUPPORT SALES INCNEN', '2017-11-06', '2017-11-08', '0000-00-00', '', '', '', 0, 1, 'SUPPORT T300 @25.000,- PER UNIT (KLAIM 672 UNIT / 270 UNIT)', 0, '2017-11-10 14:20:26', '2017-11-10 14:20:26'),
(303, 64, 27, 5, 8, 0, 'Q2', 'CN 16.8JT', 1, 0, 'SUPPORT SALES INCENT', '2017-11-06', '2017-11-08', '0000-00-00', '', '', '', 0, 1, 'SUPPORT T300 @25.000,- PER UNIT (KLAIM 672 UNIT / 270 UNIT)', 0, '2017-11-10 14:27:27', '2017-11-10 14:27:27'),
(304, 27, 27, 2, 27, 0, 'Q4', 'CASH 20JT UTK PEMBELIAN TIKET CHINA TOUR 2 TIKET', 11, 0, 'SCANNER PTOUCH 2016', '2017-10-08', '2017-11-02', '0000-00-00', '', '', '', 0, 1, 'ARCHIEVMENT BROTHER SCANNER N PTOUCH 2017<br />1 Tiket buat Teddy Harrisma, dan 2 Tiket di jual ke AMP. (TAGIHAN KE AMP)', 0, '2017-11-10 14:37:25', '2017-11-10 14:37:25'),
(305, 117, 27, 2, 27, 5, 'Q1', 'PENJUALAN TIKET NZ SENILAI 80JT', 11, 0, 'TIKET NZ', '2017-11-10', '2017-11-11', '0000-00-00', '', '', '', 0, 1, 'PENJUALAN TIKET NZ SENILAI 80JT (DIBELI AMP)', 0, '2017-11-10 14:38:55', '2017-11-10 14:38:55'),
(306, 118, 20, 2, 43, 8, 'Q3', 'Min Payout: 2000000 (Quota 200u)', 16, 0, 'LENOVO Q3 FY1718 SMB', '2017-11-10', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'Program PRF CID90201710200012 Period: 01Oct17-31Dec17', 0, '2017-11-10 16:15:30', '2017-11-10 16:15:30'),
(307, 119, 20, 4, 44, 8, 'Q4', 'Trip to Mono Shanghai + DisneyLand', 27, 0, 'Campaign Point Trip ', '2017-11-10', '2018-02-01', '0000-00-00', '', '', '', 0, 1, 'Period 01Jul17-31Jan18 Target Point 125 (PV150,PH150G,PH300,PH550,PH450UG,PW800G)', 0, '2017-11-10 16:41:39', '2017-11-10 16:41:39'),
(308, 117, 12, 2, 27, 0, 'Q1', 'PENJUALAN TIKET NZ SENILAI 80JT', 11, 0, 'TIKET NZ', '2017-11-10', '2017-11-11', '0000-00-00', '', '', '', 12, 2, 'PENJUALAN TIKET NZ SENILAI 80JT (DIBELI AMP)', 0, '2017-11-10 17:27:45', '2017-11-10 17:27:45'),
(309, 60, 20, 1, 29, 0, 'Q3', 'Package A: Target 300 unit, Reward DJI Drone/Fujifilm Mirrorless X-A3<br />Package B: Target 200 uni', 16, 0, 'LENOVO CON T2 ST Pac', '2017-11-06', '2017-11-20', '0000-00-00', '', '', '', 20, 8, 'Detail paket mandatory based on PRF6361 - CON T2 FY17 Q3 ID', 0, '2017-11-10 17:54:31', '2017-11-10 17:54:31'),
(310, 34, 12, 8, 0, 0, 'Q1', 'CONVERT 3520 QTY 4 UNIT', 1, 0, 'BROTHER PROJEK PEMKO', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 12, 2, 'SUPPORT PROJEK PEMKOT CONVERT J3520 QTY 4 ', 0, '2017-11-10 18:03:51', '2017-11-10 18:03:51'),
(311, 32, 12, 5, 0, 0, 'Q1', 'LADY UPDATE', 1, 0, 'ASABA REBATE Q1 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 12, 7, 'REBATE Q1 2017 DISKON DAN BLINK BONUS', 0, '2017-11-10 18:04:54', '2017-11-10 18:04:54'),
(312, 32, 12, 5, 0, 0, 'Q1', 'LADY UPDATE', 1, 0, 'ASABA REBATE Q1 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 12, 2, 'REBATE Q1 2017 DISKON DAN BLINK BONUS', 0, '2017-11-10 18:06:14', '2017-11-10 18:06:14'),
(313, 29, 12, 8, 0, 0, 'Q3', 'CONVERT T500 QTY 28 UNIT', 1, 0, 'PAKET TINTA DEALER', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 12, 2, 'BROTHER INKJET PROGRAM DEALER PEMBELIAN PAKET TINTA 2016', 0, '2017-11-10 18:08:50', '2017-11-10 18:08:50'),
(314, 28, 12, 8, 0, 0, 'Q4', 'BROTHER J3530 QTY 44 UNIT', 1, 0, 'BROTHER BONUS YEARLY', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 12, 1, 'BROTHER ADDITIONAL BONUS 1.5% ARCHIEVMENT YEARLY 2016', 0, '2017-11-10 18:09:21', '2017-11-10 18:09:21'),
(315, 28, 12, 8, 0, 0, 'Q4', 'BROTHER J3530 QTY 44 UNIT', 1, 0, 'BROTHER BONUS YEARLY', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 12, 2, 'BROTHER ADDITIONAL BONUS 1.5% ARCHIEVMENT YEARLY 2016', 0, '2017-11-10 18:09:47', '2017-11-10 18:09:47'),
(316, 26, 12, 8, 19, 0, 'Q4', 'BROTHER HL1211W QTY 3UNIT', 4, 0, 'BLUE ENGINE FEB MARE', '2017-10-08', '2017-10-09', '0000-00-00', 'Cia', 'lauren@ecsindo.com', '082210253555', 12, 2, 'BLUE ENGINE FEBRUARI - MARET 2017 NOMINAL 3JT CONVERT KE BROTHER HL1211W', 0, '2017-11-10 18:10:54', '2017-11-10 18:10:54'),
(317, 4, 12, 8, 0, 0, '', 'J3720 QTY 12, BT5000 QTY 7.', 1, 0, 'SUPPORT LKPP2', '2017-09-27', '2017-09-29', '0000-00-00', 'Desy', 'Desy.agnes@post.asaba.co.id', '081802399777', 12, 2, 'SUPPORT LKPP2 SENILAI 66JT', 0, '2017-11-10 18:15:07', '2017-11-10 18:15:07'),
(318, 3, 12, 8, 8, 0, 'Q2', 'T300 QTY 20', 1, 0, 'SUPPORT SERVICE CENT', '2017-09-24', '2017-09-25', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 12, 2, 'CONVERT SUPPORT SERVICE CENTER 40JT', 0, '2017-11-10 18:16:57', '2017-11-10 18:16:57'),
(319, 32, 1, 5, 8, 0, 'Q1', 'LADY UPDATE', 1, 0, 'ASABA REBATE Q1 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 0, 1, 'REBATE Q1 2017 DISKON DAN BLINK BONUS', 0, '2017-11-11 06:44:59', '2017-11-11 06:44:59'),
(320, 34, 1, 8, 8, 0, 'Q1', 'CONVERT 3520 QTY 4 UNIT', 1, 0, 'BROTHER PROJEK PEMKO', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 0, 1, 'SUPPORT PROJEK PEMKOT CONVERT J3520 QTY 4 ', 0, '2017-11-11 06:45:38', '2017-11-11 06:45:38'),
(321, 34, 1, 8, 8, 0, 'Q1', 'CONVERT 3520 QTY 4 UNIT', 1, 0, 'BROTHER PROJEK PEMKO', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT PROJEK PEMKOT CONVERT J3520 QTY 4 ', 0, '2017-11-11 06:45:56', '2017-11-11 06:45:56'),
(322, 29, 1, 8, 8, 0, 'Q3', 'CONVERT T500 QTY 28 UNIT', 1, 0, 'PAKET TINTA DEALER 2', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 0, 1, 'BROTHER INKJET PROGRAM DEALER PEMBELIAN PAKET TINTA 2016', 0, '2017-11-11 06:47:02', '2017-11-11 06:47:02'),
(323, 28, 1, 8, 8, 0, 'Q4', 'BROTHER J3530 QTY 44 UNIT', 1, 0, 'BROTHER BONUS YEARLY', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 0, 1, 'BROTHER ADDITIONAL BONUS 1.5% ARCHIEVMENT YEARLY 2016', 0, '2017-11-11 06:51:09', '2017-11-11 06:51:09'),
(324, 26, 1, 8, 19, 0, 'Q4', 'BROTHER HL1211W QTY 3UNIT', 4, 0, 'BLUE ENGINE CONVERT', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'BLUE ENGINE FEBRUARI - MARET 2017 NOMINAL 3JT CONVERT KE BROTHER HL1211W', 0, '2017-11-11 06:52:03', '2017-11-11 06:52:03'),
(325, 4, 1, 8, 8, 0, 'Q4', 'J3720 QTY 12, BT5000 QTY 7.', 1, 0, 'SUPPORT LKPP2', '2017-09-27', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'SUPPORT LKPP2 SENILAI 66JT', 0, '2017-11-11 06:52:51', '2017-11-11 06:52:51'),
(326, 4, 1, 8, 8, 0, 'Q4', 'J3720 QTY 12, BT5000 QTY 7.', 1, 0, 'SUPPORT LKPP2 CONVER', '2017-09-27', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'SUPPORT LKPP2 SENILAI 66JT CONVERT FREE UNIT J3720 QTY 12, BT5000 QTY 7.', 0, '2017-11-11 06:53:19', '2017-11-11 06:53:19'),
(327, 28, 1, 8, 8, 0, 'Q4', 'CONVERT FREE UNIT BROTHER J3530 QTY 44 UNIT', 1, 0, 'BROTHER BONUS YEARLY', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'BROTHER ADDITIONAL BONUS 1.5% ARCHIEVMENT YEARLY 2016 SENILAI 201.597.000,- CONVERT FREE UNIT', 0, '2017-11-11 06:56:53', '2017-11-11 06:56:53'),
(328, 26, 1, 8, 19, 0, 'Q4', 'CONVERT BROTHER HL1211W QTY 3UNIT', 4, 0, 'BLUE ENGINE 2016', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'BLUE ENGINE FEBRUARI - MARET 2017 NOMINAL 3JT CONVERT KE BROTHER HL1211W QTY 3 UNIT', 0, '2017-11-11 06:57:56', '2017-11-11 06:57:56'),
(329, 4, 1, 8, 8, 0, 'Q4', 'CONVERT J3720 QTY 12, BT5000 QTY 7.', 1, 0, 'SUPPORT LKPP2', '2017-09-27', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'SUPPORT LKPP2 SENILAI 66JT CONVERT FREE UNIT J3720 QTY 12, BT5000 QTY 7.', 0, '2017-11-11 06:58:54', '2017-11-11 06:58:54'),
(330, 3, 1, 8, 8, 0, 'Q2', 'CONVERT T300 QTY 20', 1, 0, 'SUPPORT SERVICE CENT', '2017-09-24', '2017-09-25', '0000-00-00', '', '', '', 0, 1, 'CONVERT SUPPORT SERVICE CENTER 40JT CONVERT T300 QTY 20 UNIT', 0, '2017-11-11 06:59:38', '2017-11-11 06:59:38'),
(331, 3, 1, 8, 8, 0, 'Q2', 'CONVERT T300 QTY 20', 1, 0, 'SUPPORT SERVICE CENT', '2017-09-24', '2017-09-25', '0000-00-00', '', '', '', 0, 1, 'CONVERT SUPPORT SERVICE CENTER 40JT CONVERT T300 QTY 20 UNIT', 0, '2017-11-11 06:59:47', '2017-11-11 06:59:47'),
(332, 120, 1, 2, 4, 5, 'Q1', 'CASH 40JT', 3, 0, 'SUPPORT SERVICE CENT', '2017-11-10', '2018-01-01', '0000-00-00', '', '', '', 0, 1, 'SUPPORT SERVICE CENTER 2018 SENILAI 40JT', 0, '2017-11-11 07:01:07', '2017-11-11 07:01:07'),
(333, 120, 1, 2, 4, 0, 'Q1', 'CASH 40JT', 3, 0, 'SUPPORT SERVICE CENT', '2017-11-10', '2018-01-01', '0000-00-00', '', '', '', 1, 7, 'SUPPORT SERVICE CENTER 2018 SENILAI 40JT', 0, '2017-11-11 07:01:20', '2017-11-11 07:01:20'),
(334, 42, 27, 2, 17, 0, 'Q1', 'CASH 10.500.000,-', 3, 0, 'PROMOTOR PTOUCH HITE', '2017-10-08', '2017-10-09', '0000-00-00', 'Redy', 'redy.manlin@brother.co.id', '081', 27, 1, 'SUPPORT PROMOTOR PTOUCH HITECHMALL @3JT / BULAN, START DARI JUNI', 0, '2017-11-11 07:04:14', '2017-11-11 07:04:14'),
(335, 42, 27, 2, 17, 0, 'Q1', 'CASH 10.500.000,-', 3, 0, 'PROMOTOR PTOUCH HITE', '2017-10-08', '2017-10-09', '0000-00-00', 'Redy', 'redy.manlin@brother.co.id', '081', 27, 1, 'SUPPORT PROMOTOR PTOUCH HITECHMALL @3JT / BULAN, START DARI JUNI', 0, '2017-11-11 07:04:18', '2017-11-11 07:04:18'),
(336, 42, 27, 2, 17, 0, 'Q1', 'CASH 9.000.000,-', 3, 0, 'PROMOTOR PTOUCH HITE', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT PROMOTOR PTOUCH HITECHMALL @3JT / BULAN, START DARI JUNI', 0, '2017-11-11 07:05:39', '2017-11-11 07:05:39'),
(337, 33, 27, 5, 0, 0, 'Q2', 'LADY UPDATE', 1, 0, 'ASABA REBATE Q2 2017', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 27, 1, 'REBATE 1% PAKET BONUS BANYAK AGUSTUS DAN BLINK BONUS 2%', 0, '2017-11-11 07:06:07', '2017-11-11 07:06:07'),
(338, 24, 27, 2, 17, 0, 'Q3', 'RP 4.400.000,-', 3, 0, 'SUPPORT PPN J200', '2017-10-03', '2017-10-05', '0000-00-00', 'David', 'david.suryanto@brother.co.id', '081', 27, 3, 'SUPPORT PPN 22 UNIT J200 RETURN HARTONO ELECTRONIC', 0, '2017-11-11 07:06:27', '2017-11-11 07:06:27'),
(339, 20, 27, 5, 14, 0, 'Q1', 'JULI UPDATE', 6, 0, 'PANASONIC SCANNER', '2017-09-28', '2017-09-29', '0000-00-00', 'Handy', 'Handy.gunawan@harrisma.com', '081210003880', 0, 1, 'Selisih harga KVS1015 harga awal 3450, harga deal 3200.', 0, '2017-11-11 07:11:27', '2017-11-11 07:11:27'),
(340, 48, 27, 2, 2, 0, 'Q1', 'LENI UPDATE', 6, 0, 'FX SUPPORT PRINTER T', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'FX SUPPORT PRINTER TYPE VALUE - SELVIE', 0, '2017-11-11 07:13:29', '2017-11-11 07:13:29'),
(341, 13, 27, 2, 3, 0, 'Q3', 'RP 9.000.000,-', 2, 0, 'SUPPORT PAMERAN JOGJ', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 0, 1, 'SUPPORT PAMERAN JOGJA', 0, '2017-11-11 07:15:28', '2017-11-11 07:15:28'),
(342, 13, 27, 2, 3, 0, 'Q3', 'CASH 9.000.000,-', 2, 0, 'SUPPORT PAMERAN JOGJ', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'SUPPORT PAMERAN JOGJA SENILAI 9JT', 0, '2017-11-11 07:15:44', '2017-11-11 07:15:44'),
(343, 41, 27, 2, 4, 0, 'Q2', 'CASH 10.500.000,-', 3, 0, 'PROMOTOR HARTONO', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 0, 1, 'SUPPORT PROMOTOR HARTONO ELECTRONIC 3 BULAN @3.5JT (JULI SD SEPTEMBER)', 0, '2017-11-11 07:16:25', '2017-11-11 07:16:25'),
(344, 46, 27, 2, 17, 0, 'Q1', 'CASH 5JT', 3, 0, 'BROTHER ISHOP VAGANZ', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'PROGRAM BROTHER ISHOP VAGANZA 2016 SENILAI 5JT', 0, '2017-11-11 07:22:01', '2017-11-11 07:22:01'),
(345, 41, 27, 2, 17, 0, 'Q2', 'CASH 10.500.000,-', 3, 0, 'PROMOTOR HARTONO', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT PROMOTOR HARTONO ELECTRONIC 3 BULAN @3.5JT (JULI SD SEPTEMBER)', 0, '2017-11-11 07:25:01', '2017-11-11 07:25:01'),
(346, 32, 27, 5, 8, 0, 'Q1', 'LADY UPDATE', 1, 0, 'REBATE Q1 BROTHER 20', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'REBATE Q1 BROTHER 2017 PERIODE APRIL SD JULI, DISKON DAN BLINK BONUS.', 0, '2017-11-11 07:37:51', '2017-11-11 07:37:51'),
(347, 32, 1, 5, 8, 0, 'Q1', 'LADY UPDATE', 1, 0, 'REBATE Q1 BROTHER 20', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 1, 1, 'REBATE Q1 BROTHER 2017 PERIODE APRIL SD JULI, DISKON DAN BLINK BONUS.', 0, '2017-11-11 07:39:57', '2017-11-11 07:39:57'),
(348, 33, 27, 5, 8, 0, 'Q2', 'LADY UPDATE', 1, 0, 'REBATE Q2 BROTHER 20', '2017-10-08', '2017-10-09', '0000-00-00', 'Desy', 'desy.agnes@post.asaba.co.id', '081', 0, 1, 'REBATE 1% PAKET BONUS BANYAK AGUSTUS DAN BLINK BONUS 2%', 0, '2017-11-11 07:41:07', '2017-11-11 07:41:07'),
(349, 33, 27, 5, 8, 0, 'Q2', 'LADY UPDATE', 1, 0, 'REBATE Q2 BROTHER 20', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'REBATE Q2 BROTHER JULI SEPTEMBER, REBATE 1% PAKET BONUS BANYAK AGUSTUS DAN BLINK BONUS 2%', 0, '2017-11-11 07:41:46', '2017-11-11 07:41:46'),
(350, 121, 27, 5, 8, 5, 'Q3', 'LADY UPDATE', 1, 0, 'REBATE Q3 BROTHER IN', '2017-11-11', '2018-02-01', '0000-00-00', '', '', '', 0, 1, 'REBATE Q3 BROTHER 2017 OKTOBER SD DESEMBER', 0, '2017-11-11 07:43:02', '2017-11-11 07:43:02'),
(351, 121, 27, 5, 8, 0, 'Q3', 'LADY UPDATE', 1, 0, 'REBATE Q3 BROTHER IN', '2017-11-11', '2018-02-01', '0000-00-00', '', '', '', 27, 7, 'REBATE Q3 BROTHER 2017 OKTOBER SD DESEMBER', 0, '2017-11-11 07:45:09', '2017-11-11 07:45:09'),
(352, 32, 27, 5, 8, 0, 'Q1', 'LADY UPDATE', 1, 0, 'REBATE Q1 BROTHER 20', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'REBATE Q1 BROTHER 2017 PERIODE APRIL SD JUNI, DISKON DAN BLINK BONUS.', 0, '2017-11-11 07:52:34', '2017-11-11 07:52:34'),
(353, 44, 27, 2, 17, 0, 'Q1', 'JULI UPDATE', 3, 0, 'KONSINYASI DEALER', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 27, 1, 'SUPPORT KONSINYASI DEALER 1% / BULAN START JULI', 0, '2017-11-11 07:58:22', '2017-11-11 07:58:22'),
(354, 43, 27, 2, 17, 0, 'Q2', 'JULI UPDATE', 3, 0, 'KONSINYASI HARTONO', '2017-10-08', '2017-10-09', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '081', 27, 1, 'SUPPORT KONSINYASI 1% UNTUK HARTONO ELECTRONIK SELAMA 3 BULAN', 0, '2017-11-11 07:58:30', '2017-11-11 07:58:30'),
(355, 21, 27, 5, 0, 0, '', 'RP 98.160.000,-', 3, 0, 'BROTHER T300 QTY 240', '2017-09-28', '2017-09-29', '0000-00-00', 'Susanto', 'susanto.liu@brother.co.id', '085959111125', 27, 1, 'Selisih harga support projek T300 qty 240', 0, '2017-11-11 07:59:35', '2017-11-11 07:59:35'),
(356, 12, 27, 8, 3, 0, 'Q2', 'P115W QTY 10', 2, 0, 'SUPPORT ROADSHOW AYO', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'SUPPORT ROADSHOW AYOOKLIK JATIM', 0, '2017-11-11 08:03:42', '2017-11-11 08:03:42'),
(357, 10, 27, 2, 10, 0, 'Q2', 'RP 3.500.000,-', 10, 0, 'FX COPIER SALES INSE', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'SALES INSENTIF PROGRAM FX COPIER', 0, '2017-11-11 08:09:16', '2017-11-11 08:09:16'),
(358, 42, 27, 2, 17, 0, 'Q1', 'CASH 15.000.000,-', 3, 0, 'PROMOTOR PTOUCH HITE', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT PROMOTOR PTOUCH HITECHMALL @3JT / BULAN, START DARI JUNI SD OKTOBER', 0, '2017-11-11 08:19:34', '2017-11-11 08:19:34'),
(359, 52, 13, 2, 6, 0, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT CLOSING Q3 2017 & SUPPORT untuk 2529 + 3835', 0, '2017-11-11 08:23:26', '2017-11-11 08:23:26'),
(360, 51, 13, 5, 6, 0, 'Q4', 'PPFR + Linnearity (2.5%+0.8%) dari achievement 1.500.000.000,- ( cap 150%)<br />', 8, 0, 'HP CONSUMER Q4 2017', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'HP CONSUMER Q4 2017', 0, '2017-11-11 08:25:31', '2017-11-11 08:25:31'),
(361, 51, 13, 5, 6, 0, 'Q4', 'PPFR + Linnearity (2.5%+0.8%) dari achievement 1.500.000.000,- ( cap 150%)<br />', 8, 0, 'HP CONSUMER Q4 2017', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'HP CONSUMER Q4 2017', 0, '2017-11-11 08:25:37', '2017-11-11 08:25:37');
INSERT INTO `db_rewards_history` (`id`, `id_reward`, `id_user`, `id_jenis_reward`, `id_contactperson`, `id_cabang`, `Quartal`, `keterangan_reward`, `kode_vendor`, `idbrand`, `no_po`, `tanggal_buat`, `tanggal_tagih`, `tanggal_selesai`, `nama_cp`, `email_cp`, `telp_cp`, `user_selesai`, `status`, `memo`, `isDelete`, `created_at`, `updated_at`) VALUES
(362, 40, 27, 5, 19, 0, 'Q2', 'LADY UPDATE', 4, 0, 'PROJEK 2540 + 2700', '2017-10-08', '2017-10-09', '0000-00-00', 'Leo', 'lukas_leo@ecsindo.com', '081', 0, 1, 'SUPPORT CN PROJEK 2540 + 2700, NILAI REAL 1.950.000,-', 0, '2017-11-11 08:26:35', '2017-11-11 08:26:35'),
(363, 122, 27, 5, 19, 5, 'Q2', 'JULI UPDATE', 4, 0, 'PROJECT TN2280', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'JULI UPDATE', 0, '2017-11-11 08:27:31', '2017-11-11 08:27:31'),
(364, 38, 27, 5, 19, 0, 'Q4', 'CN 12JT', 4, 0, 'PAKET BROTHER Q4', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'BONUS PEMBELIAN PAKET PRINTER BROTHER 4% Q4 2016', 0, '2017-11-11 08:28:01', '2017-11-11 08:28:01'),
(365, 123, 13, 2, 6, 5, 'Q4', 'Rebate Country', 8, 0, 'HP Consumer Q4 2017', '2017-11-11', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'Rebate Country 2% untuk achievement 150% dan 3,5% untuk tambahan achievement 50% ( cap 200% ) = +/- 17.500.000,-&lt;br /&gt;Add 1% untuk item barang HP laserjet', 0, '2017-11-11 08:29:40', '2017-11-11 08:29:40'),
(366, 124, 13, 2, 6, 5, 'Q3', 'Rebate country ', 8, 0, 'HP Consumer Q3 2017', '2017-11-11', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'Rebate country 1.5% dari 1.050.000.000 ( cap 105%)&lt;br /&gt;Add 1% untuk item laserjet M1 Q3', 0, '2017-11-11 08:31:32', '2017-11-11 08:31:32'),
(367, 124, 13, 2, 6, 0, 'Q3', 'Rebate country <br />1.5% dari 1.050.000.000 ( cap 105%)<br />Add 1% untuk item laserjet M1 Q3', 8, 0, 'HP Consumer Q3 2017', '2017-11-11', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'Menunggu notifikasi dari HP untuk dibuatkan invoice', 0, '2017-11-11 08:38:26', '2017-11-11 08:38:26'),
(368, 123, 13, 2, 6, 0, 'Q4', 'Rebate Country <br />2% untuk achievement 150% dan 3,5% untuk tambahan achievement 50% ( cap 200% ) ', 8, 0, 'HP Consumer Q4 2017', '2017-11-11', '2017-11-30', '0000-00-00', '', '', '', 0, 1, ' Menunggu notifikasi dari HP untuk dibuatkan invoice', 0, '2017-11-11 08:39:09', '2017-11-11 08:39:09'),
(369, 52, 13, 2, 6, 0, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT CLOSING Q3 2017 & SUPPORT untuk 2529 + 3835', 0, '2017-11-11 08:39:49', '2017-11-11 08:39:49'),
(370, 52, 13, 2, 6, 0, 'Q3', 'CASH 24.640.000 ', 8, 0, 'HP SUPPORT Q3', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT CLOSING Q3 2017 & SUPPORT untuk 2529 + 3835<br />sudah dibuatkan invoice ke M3kom', 0, '2017-11-11 08:40:11', '2017-11-11 08:40:11'),
(371, 125, 27, 5, 19, 5, 'Q1', 'JULI UPDATE', 4, 0, 'REBATE Q1 BROTHER 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'PERIODE APRIL SD JUNI', 0, '2017-11-11 08:50:03', '2017-11-11 08:50:03'),
(372, 126, 27, 5, 19, 5, 'Q2', 'JULI UPDATE', 4, 0, 'REBATE Q2 BROTHER LA', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'PERIODE JULI SD SEPTEMBER', 0, '2017-11-11 08:50:59', '2017-11-11 08:50:59'),
(373, 125, 27, 5, 19, 0, 'Q1', 'JULI UPDATE', 4, 0, 'REBATE Q1 BROTHER LA', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'PERIODE APRIL SD JUNI', 0, '2017-11-11 08:51:21', '2017-11-11 08:51:21'),
(374, 126, 27, 5, 19, 0, 'Q2', 'JULI UPDATE', 4, 0, 'REBATE Q2 BROTHER LA', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'PERIODE JULI SD SEPTEMBER', 0, '2017-11-11 08:51:49', '2017-11-11 08:51:49'),
(375, 125, 27, 5, 19, 0, 'Q1', 'JULI UPDATE', 4, 0, 'REBATE Q1 BROTHER LA', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'PERIODE APRIL SD JUNI', 0, '2017-11-11 08:52:08', '2017-11-11 08:52:08'),
(376, 127, 27, 4, 17, 5, 'Q4', 'TRIP MONGOLIA 1 TIKET', 5, 0, 'BROTHER LASER TIXPRO', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'TRIP MONGOLIA 1 TIKET UNTUK PEMBELIAN 500JT SD AKHIR DESEMBER 2017', 0, '2017-11-11 08:54:04', '2017-11-11 08:54:04'),
(377, 127, 27, 4, 17, 0, 'Q4', 'TRIP MONGOLIA 1 TIKET', 5, 0, 'BROTHER LASER TIXPRO', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 27, 7, 'TRIP MONGOLIA 1 TIKET UNTUK PEMBELIAN 500JT SD AKHIR DESEMBER 2017', 0, '2017-11-11 08:54:28', '2017-11-11 08:54:28'),
(378, 7, 27, 2, 3, 0, 'Q4', 'US 5060', 2, 0, 'FX PAKET COLOUR Q4 2', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'BONUS PAKET COLOUR Q4 2016', 0, '2017-11-11 08:56:41', '2017-11-11 08:56:41'),
(379, 48, 27, 2, 14, 0, 'Q1', 'LENI UPDATE', 6, 0, 'FX SUPPORT PRINTER T', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'FX SUPPORT PRINTER TYPE VALUE - SELVIE', 0, '2017-11-11 08:57:15', '2017-11-11 08:57:15'),
(380, 9, 27, 5, 14, 0, 'Q1', 'CN SENILAI 25% DARI PEMBELIAN TONER P115W', 6, 0, 'FX SUPPORT TONER P11', '2017-09-28', '2017-09-29', '0000-00-00', 'Tika', 'sartika@harrisma.com', '08118118123', 0, 1, 'CN PRICE PROTECTION UTK TONER P115W QTY 300 UNIT', 0, '2017-11-11 08:57:45', '2017-11-11 08:57:45'),
(381, 9, 27, 5, 14, 0, 'Q1', 'CN SENILAI 25% DARI PEMBELIAN TONER P115W', 6, 0, 'FX SUPPORT TONER P11', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'CN PRICE PROTECTION UTK TONER P115W QTY 300 UNIT', 0, '2017-11-11 08:57:55', '2017-11-11 08:57:55'),
(382, 14, 27, 2, 3, 0, 'Q4', 'LENY UPDATE', 2, 0, 'FX PAKET MONO MIX Q4', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'BONUS PAKET MONO MIX Q4 2016, MASIH DI HITUNG TIKA - RP 17.096.545 + 50RB X TOTAL UNIT', 0, '2017-11-11 08:58:41', '2017-11-11 08:58:41'),
(383, 2, 27, 2, 3, 0, 'Q4', 'US 6695', 2, 0, 'FX 1ST CN Q3 Q4 2016', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 0, 1, 'REBATE 1ST CHANNEL Q3 2016 SENILAI US3205 DAN Q4 Q2016 SENILAI US 3490, TOTAL US 6695', 0, '2017-11-11 08:59:42', '2017-11-11 08:59:42'),
(384, 2, 27, 2, 3, 0, 'Q4', 'US 5100', 2, 0, 'FX 1ST CN Q3 Q4 2016', '2017-09-24', '2017-09-25', '0000-00-00', '', '', '', 0, 1, 'REBATE 1ST CHANNEL Q3 2016 SENILAI US3205 DAN Q4 Q2016 SENILAI US 3490, TOTAL US 6695.<br />FINAL DI KOREKSI SENILAI US 5100.', 0, '2017-11-11 09:08:49', '2017-11-11 09:08:49'),
(385, 47, 27, 2, 3, 0, 'Q1', 'US 2200,-', 2, 0, 'FX SUPPORT P115W', '2017-10-08', '2017-10-09', '0000-00-00', '', '', '', 0, 1, 'SUPPORT PROTEKSI HARGA PRINTER P115W SENILAI 30JT CONVERT US 2200.', 0, '2017-11-11 09:09:44', '2017-11-11 09:09:44'),
(386, 12, 27, 2, 3, 0, 'Q2', 'US 500.', 2, 0, 'FX SUPPORT ROADSHOW ', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'SUPPORT ROADSHOW AYOOKLIK JATIM P115W CONVERT US 500.', 0, '2017-11-11 09:12:05', '2017-11-11 09:12:05'),
(387, 11, 27, 2, 14, 0, 'Q4', 'US 3626', 2, 0, 'FX PAKET TONER Q4 20', '2017-09-28', '2017-09-29', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 0, 1, 'BONUS PAKET TONER Q4 2016', 0, '2017-11-11 09:15:52', '2017-11-11 09:15:52'),
(388, 128, 27, 2, 3, 5, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100.&lt;br /&gt;AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 09:17:54', '2017-11-11 09:17:54'),
(389, 128, 27, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 09:18:33', '2017-11-11 09:18:33'),
(390, 14, 27, 2, 14, 0, 'Q4', 'LENY UPDATE', 6, 0, 'FX PAKET MONO MIX Q4', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'BONUS PAKET MONO MIX Q4 2016, MASIH DI HITUNG TIKA - RP 17.096.545 + 50RB X TOTAL UNIT', 0, '2017-11-11 09:19:32', '2017-11-11 09:19:32'),
(391, 11, 27, 2, 14, 0, 'Q4', 'US 3626', 6, 0, 'FX PAKET TONER Q4 20', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'BONUS PAKET TONER Q4 2016', 0, '2017-11-11 09:20:14', '2017-11-11 09:20:14'),
(392, 11, 27, 2, 14, 0, 'Q4', 'US 3626', 6, 0, 'FX PAKET TONER Q4 20', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'REBATE PAKET TONER Q4 2016', 0, '2017-11-11 09:20:34', '2017-11-11 09:20:34'),
(393, 7, 27, 2, 14, 0, 'Q4', 'US 5060', 6, 0, 'FX PAKET COLOUR Q4 2', '2017-09-28', '2017-09-29', '0000-00-00', '', '', '', 0, 1, 'BONUS PAKET COLOUR Q4 2016', 0, '2017-11-11 09:21:33', '2017-11-11 09:21:33'),
(394, 128, 1, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 1, 2, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 09:44:47', '2017-11-11 09:44:47'),
(395, 128, 1, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 1, 2, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 09:46:27', '2017-11-11 09:46:27'),
(396, 128, 1, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 1, 2, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 09:47:28', '2017-11-11 09:47:28'),
(397, 128, 1, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 1, 2, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 09:47:49', '2017-11-11 09:47:49'),
(398, 128, 1, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 1, 7, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 09:48:17', '2017-11-11 09:48:17'),
(399, 1, 1, 2, 0, 0, '', 'RP 30.000.000,-', 2, 0, 'FX 1ST CN Q4 2015', '2017-09-24', '2017-09-25', '0000-00-00', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 1, 7, 'REBATE 1ST CHANNEL Q4 2015', 0, '2017-11-11 10:02:24', '2017-11-11 10:02:24'),
(400, 128, 1, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 1, 8, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 10:03:55', '2017-11-11 10:03:55'),
(401, 128, 1, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 1, 8, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 10:04:29', '2017-11-11 10:04:29'),
(402, 128, 1, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 1, 7, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 10:05:08', '2017-11-11 10:05:08'),
(403, 128, 1, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 1, 8, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 11:19:41', '2017-11-11 11:19:41'),
(404, 128, 1, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 1, 2, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 11:22:51', '2017-11-11 11:22:51'),
(405, 128, 1, 2, 3, 0, 'Q4', 'US 1100.', 2, 0, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 1, 1, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-11 11:25:34', '2017-11-11 11:25:34'),
(406, 129, 1, 9, 39, 5, 'Q2', 'asdasdas', 3, 0, 'Good Time', '2017-11-16', '2017-10-31', '0000-00-00', '', '', '', 0, 1, 'adadasd', 0, '2017-11-16 11:45:00', '2017-11-16 11:45:00'),
(407, 130, 1, 9, 22, 6, 'Q3', 'Prktis Ekonomis', 1, 1, 'Jolly', '2017-11-16', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'asdasdas', 0, '2017-11-16 11:50:43', '2017-11-16 11:50:43'),
(408, 130, 1, 9, 22, 0, 'Q3', 'Prktis Ekonomis', 1, 3, 'Jolly', '2017-11-16', '2017-11-30', '0000-00-00', '', '', '', 0, 1, 'asdasdas', 0, '2017-11-16 12:08:32', '2017-11-16 12:08:32'),
(409, 127, 24, 4, 17, 0, 'Q4', 'TRIP MONGOLIA 1 TIKET', 5, 4, 'BROTHER LASER TIXPRO', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'TRIP MONGOLIA 1 TIKET UNTUK PEMBELIAN 500JT SD AKHIR DESEMBER 2017', 0, '2017-11-16 13:27:06', '2017-11-16 13:27:06'),
(410, 128, 24, 2, 3, 0, 'Q4', 'US 1100.', 2, 4, 'FX 1ST CHANNEL Q4 20', '2017-11-11', '2017-11-12', '0000-00-00', '', '', '', 0, 1, 'FX 1ST CHANNEL 2016 SELISIH REBATE US 1100. AKAN DIATURKAN PEMBAYARAN OLEH PAK YUDIS (GENTLE AGREEMENT)', 0, '2017-11-16 13:29:54', '2017-11-16 13:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `db_sponsorship`
--

CREATE TABLE `db_sponsorship` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_sponsorship`
--

INSERT INTO `db_sponsorship` (`kode`, `nama`, `status`, `status_hapus`, `created_at`, `updated_at`) VALUES
(1, 'a sdz asd ', 'A', 0, '2017-04-28', '2017-05-18'),
(2, 'gsdf sdf sgh dfg', 'A', 0, '2017-04-28', '2017-04-28'),
(3, 'aasd asdasd', 'A', 0, '2017-04-28', '2017-04-28'),
(4, ' adasd', 'A', 1, '2017-04-28', '2017-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `db_status`
--

CREATE TABLE `db_status` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `warna` varchar(10) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_status`
--

INSERT INTO `db_status` (`kode`, `nama`, `no_urut`, `warna`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'New Reward', 1, '8ADF55', 0, '2017-05-21 17:28:38', '2017-09-24 10:14:22'),
(2, 'Finish', 4, 'EAF752', 0, '2017-05-21 17:28:44', '2017-09-24 10:20:15'),
(3, 'Cancel', 5, '989EA3', 0, '2017-08-24 00:06:34', '2017-11-06 14:29:05'),
(7, 'Pending', 2, '57FFF8', 0, '2017-09-24 10:15:51', '2017-09-29 15:41:38'),
(8, 'URGENT', 3, 'FF3408', 0, '2017-10-08 12:20:25', '2017-10-08 12:21:14');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `kode` int(11) NOT NULL,
  `id_cabang` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jabatan` varchar(20) NOT NULL DEFAULT 'user',
  `status` int(11) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT '0',
  `last_login` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`kode`, `id_cabang`, `name`, `email`, `telp`, `username`, `password`, `jabatan`, `status`, `isDelete`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 0, 'admin', 'admin@admin.com', '08123457788', 'admin', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'admin', 1, 0, '2017-11-16 11:28:14', '2017-08-27 00:00:00', '2017-11-05 07:50:12'),
(10, 0, 'Suryono', 'kenina@amtech.co.id', '08123457788', 'suryono', '25263419ecf5bab9025cc15d308431ea', 'admin', 1, 0, '2017-11-07 17:04:02', '2017-09-24 10:00:41', '2017-11-07 17:02:24'),
(11, 5, 'Anthony', 'anthony@amtech.co.id', '082139039000', 'anthony', '9ae7d0116ac95b46965393a22700fa01', 'user', 1, 0, '0000-00-00 00:00:00', '2017-09-24 10:01:49', '2017-10-08 10:37:58'),
(12, 5, 'Debby Lady', 'lady@amtech.co.id', '089610914431', 'lady', '530e2370ebd8c40d47a1f098db5b8cac', 'user', 1, 0, '2017-11-10 17:59:16', '2017-09-24 10:03:05', '2017-11-10 18:18:47'),
(13, 5, 'Leni', 'leni@amtech.co.id', '081333080481', 'leni', '58cab663b27ceb8a71b6817b6e282876', 'user', 1, 0, '2017-11-11 08:15:46', '2017-09-28 08:15:31', '2017-10-28 17:15:03'),
(14, 6, 'Rudi', 'rudy.130390@gmail.com', '081216976373', 'rudisby', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 1, 1, '2017-10-22 15:03:43', '2017-10-08 13:07:51', '2017-10-22 13:53:23'),
(15, 5, 'fajar', 'fasyh354@gmail.com', '082232337354', 'fajarsby', '7cae155bba86f967c4ec885cebc29c6f', 'user', 1, 1, '2017-10-23 14:26:43', '2017-10-19 10:30:03', '2017-10-23 14:26:29'),
(16, 0, 'fajar s', 'farel_dura@yahoo.com', '08562255021', 'fajar', '7cae155bba86f967c4ec885cebc29c6f', 'user', 1, 1, '2017-10-19 10:41:00', '2017-10-19 10:40:14', '2017-10-19 10:46:31'),
(17, 7, 'Ulfa', 'ulfa@amtech.co.id', '08123457890', 'ulfa', '7cae155bba86f967c4ec885cebc29c6f', 'user', 1, 0, '0000-00-00 00:00:00', '2017-10-19 10:48:56', '2017-11-02 16:34:47'),
(18, 0, 'juliawati', 'juli@amtech.co.id', '081330686311', 'juliawati', '21232f297a57a5a743894a0e4a801fc3', 'user', 0, 1, '0000-00-00 00:00:00', '2017-10-28 17:16:20', '2017-10-28 17:16:20'),
(19, 8, 'Henny', 'henny@airmasgroup.co.id', '081361693399', 'henny', '7305045b89519d31300e000ddfe5d16d', 'user', 1, 0, '2017-11-06 13:47:36', '2017-11-01 18:39:59', '2017-11-06 09:56:35'),
(20, 8, 'Agustina', 'agustina@airmasgroup.co.id', '08125795230', 'nana', '6d225f8b14269cb3cb613758b21975ed', 'user', 1, 0, '2017-11-10 17:53:06', '2017-11-01 18:43:39', '2017-11-02 11:58:09'),
(21, 5, 'Juliawati', 'juli@amtech.co.id', '081330686311', 'juli', 'b6acca4d8b70f09af081559bb4d37d3b', 'user', 1, 0, '2017-11-10 17:05:33', '2017-11-02 16:36:16', '2017-11-10 17:06:24'),
(22, 8, 'Irmawati', 'irma@airmasgroup.co.id', '08111843838', 'irma', '25d55ad283aa400af464c76d713c07ad', 'user', 1, 0, '2017-11-05 08:36:57', '2017-11-05 08:00:27', '2017-11-05 08:05:57'),
(23, 8, 'Sugiharto', 'sugiharto@airmasgroup.co.id', '08119119071', 'sugi', '25d55ad283aa400af464c76d713c07ad', 'user', 1, 0, '2017-11-11 08:05:18', '2017-11-05 08:03:16', '2017-11-05 08:06:37'),
(24, 5, 'Putra', 'putraops@gmail.com', '081340810045', 'putraops', '15ee74b9179978c3bff69fc0a337b91c', 'user', 1, 0, '2017-11-16 12:08:56', '2017-11-05 08:11:08', '2017-11-05 08:11:19'),
(25, 5, 'Erwin', 'erwin@ayooklik.com', '08100000000', 'erwin', '25d55ad283aa400af464c76d713c07ad', 'user', 1, 0, '0000-00-00 00:00:00', '2017-11-06 19:33:33', '2017-11-06 19:34:39'),
(26, 0, 'fajar admin', 'fasyh354@gmail.com', '0813812345', 'fajaradmin', '7cae155bba86f967c4ec885cebc29c6f', 'user', 0, 0, '0000-00-00 00:00:00', '2017-11-07 13:13:17', '2017-11-07 13:13:17'),
(27, 5, 'Ken', 'kenina@amtech.co.id', '08123457788', 'kenina', 'dd18503885a234b6eb93d5d4c5609319', 'user', 1, 0, '2017-11-11 08:35:38', '2017-11-07 17:01:45', '2017-11-07 17:03:00');

-- --------------------------------------------------------

--
-- Table structure for table `db_vendor`
--

CREATE TABLE `db_vendor` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `nama_cp` varchar(50) NOT NULL,
  `email_cp` varchar(50) NOT NULL,
  `telp_cp` varchar(12) NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `ext` varchar(5) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `status_hapus` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `db_vendor`
--

INSERT INTO `db_vendor` (`kode`, `nama`, `email`, `telp`, `alamat`, `npwp`, `nama_cp`, `email_cp`, `telp_cp`, `keterangan`, `ext`, `width`, `height`, `status_hapus`, `created_at`, `updated_at`) VALUES
(1, 'ASABA', 'desy.agnes@post.asaba.co.id', '021', 'Jln. TAIS Nasution No.39, Surabaya 60271', '1234567890', 'Desy', 'desy.agnes@post.asaba.co.id', '081802399777', 'BROTHER INKJET ASABA', '-', 0, 0, 0, '2017-09-24 10:09:41', '2017-11-05 07:51:29'),
(2, 'FUJI XEROX', 'yudistiro@fujixerox.com', '021', 'JAKARTA', '1234567890', 'Yudistiro', 'yudistiro@fujixerox.com', '08156930444', 'FUJI XEROX INDONESIA', '', 0, 0, 0, '2017-09-24 10:28:41', '2017-11-05 08:40:12'),
(3, 'BROTHER', '', '', 'JAKARTA', '123456789', '', '', '', 'BROTHER INDONESIA', '-', 0, 0, 0, '2017-09-28 07:10:40', '2017-09-28 07:10:40'),
(4, 'ECS', '', '', 'JAKARTA', '12345', '', '', '', 'ECS', '-', 0, 0, 0, '2017-09-28 07:11:43', '2017-09-28 07:11:43'),
(5, 'TIXPRO', '', '', 'JAKARTA', '12345', '', '', '', 'TIXPRO', '-', 0, 0, 0, '2017-09-28 07:11:56', '2017-09-28 07:11:56'),
(6, 'HARRISMA', '', '', 'JAKARTA', '12345', '', '', '', 'HARRISMA', '-', 0, 0, 0, '2017-09-28 07:12:37', '2017-09-28 07:12:37'),
(7, 'SYNNEX', '', '', 'JAKARTA', '12345', '', '', '', 'METRODATA', '-', 0, 0, 0, '2017-09-28 07:13:34', '2017-09-28 07:13:34'),
(8, 'HP CONSUMER SURABAYA', '', '', 'SURABAYA', '12345', '', '', '', 'HP CONSUMER SURABAYA', '-', 0, 0, 0, '2017-09-28 07:14:10', '2017-11-05 08:40:58'),
(9, 'HP COMERCIAL SURABAYA', '', '', 'SURABAYA', '12345', '', '', '', 'HP COMERCIAL SURABAYA', '-', 0, 0, 0, '2017-09-28 07:14:27', '2017-11-05 08:41:21'),
(10, 'FX COPIER', '', '', 'JAKARTA', '1234', '', '', '', 'FUJI XEROX COPIER MACHINE', '', 0, 0, 0, '2017-09-28 07:45:54', '2017-09-28 07:45:54'),
(11, 'AMP', '', '', 'KETAPANG', '12345', '', '', '', 'AIR MAS PERKASA', '', 0, 0, 0, '2017-09-28 08:30:42', '2017-09-28 08:30:42'),
(12, 'Testing', '', '', 'Jalan Surabaya', '1234567', '', '', '', 'Testing Team', '-', 0, 0, 1, '2017-09-28 09:05:10', '2017-09-28 09:05:10'),
(13, 'Testing 2', '', '', 'jalanan', '912912118', '', '', '', 'Keterangan 1', '', 0, 0, 1, '2017-09-28 09:10:31', '2017-09-28 09:10:31'),
(14, 'TECHDATA', '', '', 'JAKARTA', '12345', '', '', '', 'TECHDATA AVNET', '-', 0, 0, 0, '2017-10-14 23:47:10', '2017-10-14 23:47:36'),
(15, 'Panasonic-itcomm (PT Damai Sejati)', '', '', 'Sastra Graha Building Lvl. 3, Jl. Raya Pejuangan 21, Kebon Jeruk, Jakarta Barat', '', '', '', '', '', '', 0, 0, 0, '2017-11-06 09:20:52', '2017-11-06 09:20:52'),
(16, 'PT Lenovo Indonesia', '', '', 'Wisma Kota BNI, Lantai 19 #19-05\nJl. Jend. Sudirman, Kav 1 Jakarta Pusat 10220', '', '', '', '', '', '', 0, 0, 0, '2017-11-06 13:06:59', '2017-11-06 13:06:59'),
(17, 'PT Jessilindo Pratama', '', '', 'Rukan Gading Kirana, Jl. Gading Kirana Barat IX Blok D 6 No. 30-31, Jakarta Utara 14240', '', '', '', '', '', '', 0, 0, 0, '2017-11-06 17:01:33', '2017-11-06 17:01:33'),
(18, 'Indo Mega Vision', '', '', 'Gedung Metro Sunter Plaza Lt.4, Jl. Danau Sunter Utara Blok A2, Jakarta Utara 14350', '', '', '', '', '', '', 0, 0, 0, '2017-11-07 09:40:10', '2017-11-07 09:40:10'),
(19, 'PANASONIC', '', '', 'JAKARTA', '', '', '', '', '', '', 0, 0, 0, '2017-11-07 13:09:37', '2017-11-07 13:09:37'),
(20, 'PT. Ingram Micro Indonesia', '', '', 'Wisma Nugra Santana, 9th Floor, Suite # 909 JL. Jend Sudirman Kav 7-8, Jakarta 10220', '', '', '', '', '', '', 0, 0, 0, '2017-11-07 15:14:19', '2017-11-07 15:14:19'),
(21, ' PT. Acer Indonesia', '', '', 'JAKARTA', '', '', '', '', '', '', 0, 0, 0, '2017-11-07 16:54:52', '2017-11-07 16:54:52'),
(22, 'APC', '', '', 'Ventura Building 7th Floor, Jalan R.A. Kartini Kav.26 Cilandak 12430, Jakarta Selatan - Indonesia', '', '', '', '', 'aka SCHNEIDER ELECTRIC', '', 0, 0, 0, '2017-11-08 10:13:39', '2017-11-08 10:13:39'),
(23, 'HP CONSUMER JAKARTA', '', '', 'JAKARTA', '', '', '', '', '', '', 0, 0, 0, '2017-11-08 14:21:02', '2017-11-08 14:21:02'),
(24, 'HP INDONESIA', '', '', 'JAKARTA', '', '', '', '', '', '', 0, 0, 0, '2017-11-08 15:44:12', '2017-11-08 15:44:12'),
(25, 'HP COMMERCIAL JAKARTA', '', '', 'JAKARTA', '', '', '', '', '', '', 0, 0, 0, '2017-11-09 13:37:18', '2017-11-09 13:37:18'),
(26, 'PT. Dell Indonesia', '', '', 'Menara BCA Level 48, Jalan M.H. Thamrin No. 1, Jakarta Pusat, 10310', '', '', '', '', '', '', 0, 0, 0, '2017-11-10 10:17:47', '2017-11-10 10:17:47'),
(27, 'PT. Global Mitra Teknologi', '', '', 'Jl. Batu Ceper IV No. 6M Jakarta', '', '', '', '', '', '', 0, 0, 0, '2017-11-10 15:49:04', '2017-11-10 15:49:04'),
(28, 'ASTRA GRAPHIA XEROX', '', '', 'JAKARTA', '1234', '', '', '', 'FUJI XEROX ASTRA GRAPHIA', '-', 0, 0, 0, '2017-11-11 09:23:12', '2017-11-11 09:23:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_barang`
--
ALTER TABLE `db_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `db_brand`
--
ALTER TABLE `db_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_cabang`
--
ALTER TABLE `db_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_contactperson`
--
ALTER TABLE `db_contactperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_event`
--
ALTER TABLE `db_event`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `db_history_status_reward`
--
ALTER TABLE `db_history_status_reward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_jenis_reward`
--
ALTER TABLE `db_jenis_reward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_privileges`
--
ALTER TABLE `db_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_purchase`
--
ALTER TABLE `db_purchase`
  ADD PRIMARY KEY (`no_order`);

--
-- Indexes for table `db_rewards`
--
ALTER TABLE `db_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_rewards_history`
--
ALTER TABLE `db_rewards_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_sponsorship`
--
ALTER TABLE `db_sponsorship`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `db_status`
--
ALTER TABLE `db_status`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `db_vendor`
--
ALTER TABLE `db_vendor`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_barang`
--
ALTER TABLE `db_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_brand`
--
ALTER TABLE `db_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `db_cabang`
--
ALTER TABLE `db_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `db_contactperson`
--
ALTER TABLE `db_contactperson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `db_event`
--
ALTER TABLE `db_event`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `db_history_status_reward`
--
ALTER TABLE `db_history_status_reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;
--
-- AUTO_INCREMENT for table `db_jenis_reward`
--
ALTER TABLE `db_jenis_reward`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `db_purchase`
--
ALTER TABLE `db_purchase`
  MODIFY `no_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `db_rewards`
--
ALTER TABLE `db_rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `db_rewards_history`
--
ALTER TABLE `db_rewards_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;
--
-- AUTO_INCREMENT for table `db_sponsorship`
--
ALTER TABLE `db_sponsorship`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `db_status`
--
ALTER TABLE `db_status`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `db_vendor`
--
ALTER TABLE `db_vendor`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
