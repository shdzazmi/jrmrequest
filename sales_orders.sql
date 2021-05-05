-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 07:11 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jrmportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_orders`
--

CREATE TABLE `sales_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `uid` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `operator` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_orders`
--

INSERT INTO `sales_orders` (`id`, `uid`, `nama`, `tanggal`, `status`, `created_at`, `updated_at`, `deleted_at`, `operator`) VALUES
(1, 'e718739ce8ff', 'Sadaz', '27-04-2021 14:15:11', 'Void', '2021-04-27 06:18:30', '2021-05-04 02:41:19', NULL, 'Shadaz'),
(2, 'b34ab4e42bdb', 'marisa', '28-04-2021 12:54:39', 'Void', '2021-04-28 04:44:58', '2021-05-04 02:41:14', NULL, ''),
(3, '4ed99e745287', 'tacik rewel', '29-04-2021 08:49:04', 'Proses', '2021-04-29 00:39:18', '2021-04-29 00:39:18', NULL, ''),
(4, '9025fa42aaeb', 'cash', '29-04-2021 08:56:53', 'Proses', '2021-04-29 00:47:12', '2021-04-29 00:47:12', NULL, ''),
(5, '8827470fde07', 'iyus', '29-04-2021 09:15:18', 'Proses', '2021-04-29 01:08:59', '2021-04-29 01:08:59', NULL, ''),
(6, '86e530b50615', 'Mitra Alam Pekasa', '29-04-2021 12:05:48', 'Proses', '2021-04-29 04:37:14', '2021-04-29 04:37:14', NULL, ''),
(9, 'a8a533f85f1c', 'damat lag', '30-04-2021 09:46:42', 'Void', '2021-04-30 01:36:41', '2021-05-01 03:36:37', NULL, ''),
(10, 'e6ae42550fe9', 'pak erwin', '30-04-2021 09:53:08', 'Proses', '2021-04-30 01:45:37', '2021-04-30 01:45:37', NULL, ''),
(11, '428dc2ac33e8', 'SPRING', '30-04-2021 11:41:55', 'Proses', '2021-04-30 03:35:47', '2021-04-30 03:35:47', NULL, ''),
(12, 'bb5a7936dace', 'SPRING', '30-04-2021 00:00:00', 'Proses', '2021-04-30 03:46:01', '2021-04-30 03:46:01', NULL, ''),
(13, 'fe902f2cc800', 'natan', '30-04-2021 13:23:06', 'Proses', '2021-04-30 05:13:41', '2021-04-30 05:13:41', NULL, ''),
(14, '13141bcb5035', 'gunawan mahindra', '30-04-2021 16:00:44', 'Proses', '2021-04-30 08:09:48', '2021-04-30 08:09:48', NULL, ''),
(15, 'f2bd057298e6', 'pak teguh', '30-04-2021 16:24:22', 'Proses', '2021-04-30 08:16:20', '2021-04-30 08:16:20', NULL, ''),
(16, '8aba8676876b', 'jempol cash', '01-05-2021 00:00:00', 'Proses', '2021-05-01 00:46:59', '2021-05-01 00:46:59', NULL, 'grace alfania zai'),
(17, 'c25d1bf76b64', 'rezar balikpapan', '01-05-2021 09:15:31', 'Proses', '2021-05-01 01:08:27', '2021-05-01 01:08:27', NULL, 'grace alfania zai'),
(18, 'ef76a9a34c15', 'anna carros cash', '01-05-2021 09:46:24', 'Proses', '2021-05-01 01:36:04', '2021-05-01 01:36:04', NULL, 'grace alfania zai'),
(19, '669be5c31aa1', 'gunawan cash', '01-05-2021 10:01:45', 'Proses', '2021-05-01 01:53:10', '2021-05-01 01:53:10', NULL, 'grace alfania zai'),
(20, 'c6e515cf9659', 'BORNEO BERAU(OK 1 MEI 001)', '01-05-2021 10:10:12', 'Proses', '2021-05-01 02:15:12', '2021-05-01 02:15:12', NULL, 'Muhammad Hazlansyah'),
(21, '22acb91dc087', 'pak susilo', '01-05-2021 10:28:49', 'Proses', '2021-05-01 02:19:02', '2021-05-01 02:19:02', NULL, 'grace alfania zai'),
(22, '69694ba1a0af', 'pak herman kjb', '01-05-2021 10:32:17', 'Proses', '2021-05-01 02:22:17', '2021-05-01 02:22:17', NULL, 'grace alfania zai'),
(23, 'e2dec5327af8', 'tono abadi  teknik', '01-05-2021 10:27:49', 'Proses', '2021-05-01 02:22:41', '2021-05-01 02:22:41', NULL, 'citradewipuspita'),
(24, 'f4eb728a60e2', 'OK 01MEI 002(BORNEO BERAU)', '01-05-2021 10:58:53', 'Proses', '2021-05-01 03:04:27', '2021-05-01 03:04:27', NULL, 'Muhammad Hazlansyah'),
(25, '7bdfa98c1e21', 'OK 01MEI-016', '01-05-2021 14:59:17', 'Proses', '2021-05-01 06:52:13', '2021-05-01 06:52:13', NULL, 'robin gandaria'),
(26, '3eba001784e9', 'OK 01MEI-18  GADING', '01-05-2021 15:07:27', 'Selesai', '2021-05-01 06:57:14', '2021-05-03 00:30:31', NULL, 'robin gandaria'),
(27, 'b18c74983950', 'pak deddy cash', '01-05-2021 15:14:48', 'Proses', '2021-05-01 07:07:14', '2021-05-01 07:07:14', NULL, 'grace alfania zai'),
(28, '3c9e1721244b', 'OK 01MEI-019', '01-05-2021 15:27:00', 'Proses', '2021-05-01 07:30:31', '2021-05-01 07:30:31', NULL, 'robin gandaria'),
(29, '232c07053475', 'OK 1MEI-21  SIS BERAU', '01-05-2021 16:18:59', 'Selesai', '2021-05-01 08:16:08', '2021-05-03 00:30:15', NULL, 'robin gandaria'),
(30, '8887e883f58a', 'OK 1MEI-015/16  AHO', '01-05-2021 16:41:20', 'Proses', '2021-05-01 08:37:54', '2021-05-01 08:37:54', NULL, 'robin gandaria'),
(31, '8887e883f58a', 'OK 1MEI-015/16  AHO', '01-05-2021 16:41:20', 'Void', '2021-05-01 08:37:54', '2021-05-03 00:29:44', NULL, 'robin gandaria'),
(32, '0b0d86fa9db5', 'OK 2MEI-02', '02-05-2021 08:11:21', 'Proses', '2021-05-02 00:03:37', '2021-05-02 00:03:37', NULL, 'robin gandaria'),
(33, 'e69759ddb627', 'OK 2MEI-04  PPA AMM', '02-05-2021 08:24:21', 'Selesai', '2021-05-02 00:16:33', '2021-05-03 00:29:54', NULL, 'robin gandaria'),
(34, 'df08be3ff7ea', 'OK 2MEI-07  TJM KALIORANG', '02-05-2021 11:23:48', 'Proses', '2021-05-02 03:14:50', '2021-05-02 03:14:50', NULL, 'robin gandaria'),
(35, '3344e7ae0b44', 'PARI', '02-05-2021 11:37:48', 'Proses', '2021-05-02 03:29:22', '2021-05-02 03:29:22', NULL, 'Acuan'),
(36, 'd85454add9be', 'haji amir cash', '03-05-2021 08:30:14', 'Proses', '2021-05-03 00:20:49', '2021-05-03 00:20:49', NULL, 'grace alfania zai'),
(37, '0259a0293a22', 'pak aji nusa', '03-05-2021 08:35:04', 'Proses', '2021-05-03 00:24:29', '2021-05-03 00:24:29', NULL, 'grace alfania zai'),
(38, 'caf7ea993852', 'OK 3MEI-001 AWAL JAYA', '03-05-2021 08:16:57', 'Proses', '2021-05-03 00:28:46', '2021-05-03 00:28:46', NULL, 'Muhammad Hazlansyah'),
(39, '0bfa1ba528f1', 'ok 3mei-002 BPM', '03-05-2021 00:00:00', 'Proses', '2021-05-03 00:31:52', '2021-05-03 00:31:52', NULL, 'adriyadi'),
(40, 'dc2a296e6678', 'bkl  prima jaya cash', '03-05-2021 08:52:38', 'Proses', '2021-05-03 00:42:19', '2021-05-03 00:42:19', NULL, 'grace alfania zai'),
(41, '986262f46bf5', 'OK 3MEI-003 AHO BPP', '03-05-2021 08:53:16', 'Proses', '2021-05-03 00:50:26', '2021-05-03 00:50:26', NULL, 'adriyadi'),
(42, '7913df8e919c', 'OK 3MEI-007 SIMA AGUNG', '03-05-2021 09:01:04', 'Proses', '2021-05-03 00:53:27', '2021-05-03 01:18:26', NULL, 'Muhammad Hazlansyah'),
(43, '7d29687e4249', 'anna carros', '03-05-2021 09:08:14', 'Proses', '2021-05-03 01:02:39', '2021-05-03 01:02:39', NULL, 'citradewipuspita'),
(44, 'f931b7c9f9d3', 'OK 3MEI-006', '03-05-2021 09:10:43', 'Proses', '2021-05-03 01:17:01', '2021-05-03 01:17:01', NULL, 'adriyadi'),
(45, 'd8cd7e3e098b', 'KPUC Tarakan', '03-05-2021 09:31:06', 'Proses', '2021-05-03 01:23:29', '2021-05-03 01:23:29', NULL, 'Felix'),
(47, '9a9cdac407ed', 'OK 3MEI-012 WAHYU MAHULU', '03-05-2021 09:34:47', 'Proses', '2021-05-03 01:30:38', '2021-05-03 01:30:38', NULL, 'adriyadi'),
(48, '2ccdffe8f180', 'OK 3MEI-001 BPM', '03-05-2021 09:46:09', 'Proses', '2021-05-03 01:39:35', '2021-05-03 01:39:35', NULL, 'adriyadi'),
(49, 'bbd39704f5c4', 'OK 3MEI-019 KRI', '03-05-2021 10:06:04', 'Proses', '2021-05-03 01:59:15', '2021-05-03 01:59:15', NULL, 'Muhammad Hazlansyah'),
(50, 'faffc325dd52', 'pak fahrian cash', '03-05-2021 10:38:25', 'Proses', '2021-05-03 02:28:44', '2021-05-03 02:28:44', NULL, 'grace alfania zai'),
(51, '1922ba333637', 'bengkel ketok magic cash', '03-05-2021 10:41:38', 'Proses', '2021-05-03 02:31:39', '2021-05-03 02:31:39', NULL, 'grace alfania zai'),
(52, '8e09b3257d26', 'haji amir cash', '03-05-2021 10:55:17', 'Proses', '2021-05-03 02:44:52', '2021-05-03 02:44:52', NULL, 'grace alfania zai'),
(53, '54ed68e78ae4', 'pak yied inv', '03-05-2021 10:57:14', 'Proses', '2021-05-03 02:47:14', '2021-05-03 02:47:14', NULL, 'grace alfania zai'),
(54, 'a0e48a4fc324', 'OK 3MEI-024 MIZAN BPP', '03-05-2021 11:07:11', 'Proses', '2021-05-03 03:00:53', '2021-05-03 03:00:53', NULL, 'Muhammad Hazlansyah'),
(55, '0b0befaa75a5', 'pak mudhar', '03-05-2021 11:14:53', 'Proses', '2021-05-03 03:04:45', '2021-05-03 03:04:45', NULL, 'grace alfania zai'),
(56, 'eb9c2467eb0f', 'OK 3MEI-030 PPA-MHU', '03-05-2021 11:43:42', 'Proses', '2021-05-03 03:44:37', '2021-05-03 03:44:37', NULL, 'Muhammad Hazlansyah'),
(57, '50b3b03aaf6c', 'OK 3MEI-34', '03-05-2021 11:58:07', 'Proses', '2021-05-03 03:52:27', '2021-05-03 03:52:27', NULL, 'adriyadi'),
(58, '90a172cdfcae', 'OK 3MEI-035', '03-05-2021 12:09:32', 'Proses', '2021-05-03 04:03:10', '2021-05-03 04:03:10', NULL, 'adriyadi'),
(59, '2e7659b5a9d5', 'OK 3MEI-036 BUANA JAYA BONTANG', '03-05-2021 12:21:54', 'Proses', '2021-05-03 04:44:23', '2021-05-03 04:44:23', NULL, 'adriyadi'),
(60, '3bba88bb1d25', 'OK 3MEI-044   AHO BPPN', '03-05-2021 13:56:00', 'Proses', '2021-05-03 05:46:41', '2021-05-03 05:46:41', NULL, 'robin gandaria'),
(61, '5d492fc75965', 'OK 3MEI-045 VERA UTAMA', '03-05-2021 13:48:46', 'Proses', '2021-05-03 06:01:54', '2021-05-03 06:01:54', NULL, 'Muhammad Hazlansyah'),
(62, '686a3cf90157', 'OK 3MEI-048   RENTALINDO', '03-05-2021 14:18:36', 'Proses', '2021-05-03 06:11:06', '2021-05-03 06:11:06', NULL, 'robin gandaria'),
(63, 'bee4e62b436b', 'OK 3MEI-058 HARIS BPP', '03-05-2021 14:42:07', 'Proses', '2021-05-03 06:49:03', '2021-05-03 06:49:03', NULL, 'Muhammad Hazlansyah'),
(64, '2e3f054a8bba', 'OK 3MEI-058 AWAL JAYA', '03-05-2021 14:53:02', 'Proses', '2021-05-03 06:50:42', '2021-05-03 06:50:42', NULL, 'Adriyadi'),
(65, '513391f6be5a', 'OK 3MEI-050 TENAGA INTI AGRO', '03-05-2021 15:06:10', 'Proses', '2021-05-03 07:00:39', '2021-05-03 07:00:39', NULL, 'Muhammad Hazlansyah'),
(66, '9f75ea63901b', 'OK 3MEI-056 WARGI SENTOSA', '03-05-2021 15:13:54', 'Proses', '2021-05-03 07:11:24', '2021-05-03 07:11:24', NULL, 'Muhammad Hazlansyah'),
(67, 'f20e705621bb', 'OK 3MEI-065  EKA HUTAMA', '03-05-2021 15:34:59', 'Proses', '2021-05-03 07:27:05', '2021-05-03 07:27:05', NULL, 'Robin Gandaria'),
(68, '9d45af4a3d42', 'OK 3MEI-051 TENAGA INTI AGRO', '03-05-2021 15:44:57', 'Proses', '2021-05-03 07:58:19', '2021-05-03 07:58:19', NULL, 'Muhammad Hazlansyah'),
(69, '39e7842d33c4', 'OK 3MEI 066  PAULUS', '03-05-2021 16:56:45', 'Proses', '2021-05-03 08:47:16', '2021-05-03 08:47:16', NULL, 'Robin Gandaria'),
(70, 'fb64746b47ed', 'OK 3MEI-053 TENAGA INTI AGRO', '04-05-2021 08:19:29', 'Proses', '2021-05-04 00:12:58', '2021-05-04 00:12:58', NULL, 'Muhammad Hazlansyah'),
(71, '43dc19d0c714', 'OK 3MEI-054 TENAGA INTI AGRO', '04-05-2021 08:28:53', 'Proses', '2021-05-04 00:20:22', '2021-05-04 00:20:22', NULL, 'Muhammad Hazlansyah'),
(72, '6ca4d6f3107c', 'OK 4MEI-001 SJM', '04-05-2021 08:20:10', 'Proses', '2021-05-04 00:22:02', '2021-05-04 00:22:02', NULL, 'Adriyadi'),
(73, 'f7a07741a605', 'OK 3MEI-072 BORNEO BERAU', '04-05-2021 08:54:40', 'Proses', '2021-05-04 00:47:46', '2021-05-04 00:47:46', NULL, 'Muhammad Hazlansyah'),
(74, '4766a0ca514e', 'OK 4MEI-002 SJM', '04-05-2021 08:41:58', 'Proses', '2021-05-04 00:56:51', '2021-05-04 00:56:51', NULL, 'Adriyadi'),
(75, 'bcf82e3a5593', 'OK 4MEI-003 BDE', '04-05-2021 09:26:47', 'Proses', '2021-05-04 01:23:22', '2021-05-04 01:23:22', NULL, 'Muhammad Hazlansyah'),
(76, 'b6f3ce9e97b7', 'PENAWARAN BENGKEL KPC \"INOVA BENSIN\"', '04-05-2021 09:13:07', 'Proses', '2021-05-04 01:26:43', '2021-05-04 01:26:43', NULL, 'Fachdiansyah'),
(77, '5d287dc1ba8f', 'OK 4MEI-008 PLM', '04-05-2021 10:01:26', 'Proses', '2021-05-04 01:55:32', '2021-05-04 01:56:21', NULL, 'Muhammad Hazlansyah'),
(78, '83cefbdf3ede', '04 MEI-005 SUMBER MAS', '04-05-2021 09:26:47', 'Proses', '2021-05-04 02:03:49', '2021-05-04 02:03:49', NULL, 'Adriyadi'),
(79, 'df93a545c1a9', 'OK 4MEI-006 BSS', '04-05-2021 10:14:31', 'Proses', '2021-05-04 02:05:37', '2021-05-04 02:05:37', NULL, 'Muhammad Hazlansyah'),
(82, '48aaaf7c8dbb', 'OK 3MEI-071 ANDALAN MINING', '04-05-2021 11:43:20', 'Proses', '2021-05-04 03:40:13', '2021-05-04 03:40:13', NULL, NULL),
(83, '261455c3f158', 'ADRIANUS', '04-05-2021 00:00:00', 'Proses', '2021-05-04 03:52:46', '2021-05-04 03:52:46', NULL, NULL),
(84, '00c7b2222c18', 'OK 4MEI-013 TUNAS HIJAU', '04-05-2021 12:05:41', 'Proses', '2021-05-04 04:00:57', '2021-05-04 04:00:57', NULL, NULL),
(85, 'bd518fe3cfc7', 'OK 4MEI-014 SARTAM', '04-05-2021 12:14:30', 'Proses', '2021-05-04 04:06:02', '2021-05-04 04:06:02', NULL, NULL),
(86, 'a6ae0938d938', 'OK 4MEI-012 BENGKEL 168', '04-05-2021 12:22:17', 'Proses', '2021-05-04 04:13:46', '2021-05-04 04:13:46', NULL, NULL),
(87, 'cadd5b07046f', '04 MEI 016 SATRIO', '04-05-2021 13:00:54', 'Proses', '2021-05-04 04:57:54', '2021-05-04 04:57:54', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_orders`
--
ALTER TABLE `sales_orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_orders`
--
ALTER TABLE `sales_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
