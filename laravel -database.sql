-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 27, 2021 lúc 04:13 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `host_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_price` double NOT NULL,
  `other_price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `host_id`, `room_id`, `from`, `to`, `room_price`, `other_price`, `discount`, `total_price`, `paid`, `created_at`, `updated_at`) VALUES
(28, '1', '14', '2021-11-29', '2021-12-29', 3000000, NULL, NULL, 3575000, '0', '2021-12-27 02:30:53', '2021-12-27 02:30:53'),
(29, '1', '16', '2021-12-01', '2022-01-01', 2000000, NULL, NULL, 2355000, '0', '2021-12-27 02:38:32', '2021-12-27 02:38:32'),
(30, '1', '15', '2021-11-29', '2022-01-01', 1500000, NULL, NULL, 1910000, '1', '2021-12-27 03:08:13', '2021-12-27 03:08:13'),
(31, '1', '16', '2021-12-14', '2022-01-09', 2000000, NULL, NULL, 2453000, '0', '2021-12-27 05:00:01', '2021-12-27 05:00:01'),
(32, '1', '15', '2021-11-29', '2021-12-15', 1500000, NULL, NULL, 1873000, '0', '2021-12-27 05:42:26', '2021-12-27 05:42:26'),
(33, '2', '2', '2021-12-23', '2022-01-13', 2000000, NULL, NULL, 2643000, '0', '2021-12-27 06:10:07', '2021-12-27 06:10:07'),
(35, '2', '1', '2021-12-08', '2022-01-09', 1500000, NULL, NULL, 1931000, '0', '2021-12-27 06:39:50', '2021-12-27 06:39:50'),
(36, '2', '8', '2021-12-01', '2021-12-31', 2000000, NULL, NULL, 2436000, '0', '2021-12-27 08:07:30', '2021-12-27 08:07:30'),
(37, '2', '8', '2022-02-09', '2022-04-22', 2000000, NULL, NULL, 2478000, '0', '2021-12-27 08:09:22', '2021-12-27 08:09:22'),
(38, '2', '13', '2021-12-09', '2022-01-09', 1200000, NULL, NULL, 1695000, '0', '2021-12-27 08:10:42', '2021-12-27 08:10:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bill_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `service_id`, `service_name`, `price`, `quantity`, `note`, `created_at`, `updated_at`) VALUES
(40, '28', '20', 'Internet', 200000, 1, NULL, '2021-12-27 02:30:53', '2021-12-27 02:30:53'),
(41, '28', '21', 'Tiền điện', 2000, 44, NULL, '2021-12-27 02:30:53', '2021-12-27 02:30:53'),
(42, '28', '22', 'Nước', 12000, 21, NULL, '2021-12-27 02:30:53', '2021-12-27 02:30:53'),
(43, '28', '23', 'Gửi xe', 20000, 1, NULL, '2021-12-27 02:30:53', '2021-12-27 02:30:53'),
(44, '28', '24', 'Vệ sinh', 15000, 1, NULL, '2021-12-27 02:30:53', '2021-12-27 02:30:53'),
(45, '29', '20', 'Internet', 150000, 1, NULL, '2021-12-27 02:38:32', '2021-12-27 02:38:32'),
(46, '29', '21', 'Tiền điện', 2000, 55, NULL, '2021-12-27 02:38:32', '2021-12-27 02:38:32'),
(47, '29', '22', 'Nước', 12000, 5, NULL, '2021-12-27 02:38:32', '2021-12-27 02:38:32'),
(48, '29', '23', 'Gửi xe', 15000, 1, NULL, '2021-12-27 02:38:32', '2021-12-27 02:38:32'),
(49, '29', '24', 'Vệ sinh', 20000, 1, NULL, '2021-12-27 02:38:32', '2021-12-27 02:38:32'),
(50, '30', '20', 'Internet', 150000, 1, NULL, '2021-12-27 03:08:13', '2021-12-27 03:08:13'),
(51, '30', '21', 'Tiền điện', 2000, 82, NULL, '2021-12-27 03:08:13', '2021-12-27 03:08:13'),
(52, '30', '22', 'Nước', 12000, 8, NULL, '2021-12-27 03:08:13', '2021-12-27 03:08:13'),
(53, '30', '23', 'Gửi xe', 15000, 0, NULL, '2021-12-27 03:08:13', '2021-12-27 03:08:13'),
(54, '30', '24', 'Vệ sinh', 20000, 0, NULL, '2021-12-27 03:08:13', '2021-12-27 03:08:13'),
(55, '31', '20', 'Internet', 170000, 1, NULL, '2021-12-27 05:00:01', '2021-12-27 05:00:01'),
(56, '31', '21', 'Tiền điện', 2000, 76, NULL, '2021-12-27 05:00:01', '2021-12-27 05:00:01'),
(57, '31', '22', 'Nước', 12000, 8, NULL, '2021-12-27 05:00:01', '2021-12-27 05:00:01'),
(58, '31', '23', 'Gửi xe', 15000, 1, NULL, '2021-12-27 05:00:01', '2021-12-27 05:00:01'),
(59, '31', '24', 'Vệ sinh', 20000, 1, NULL, '2021-12-27 05:00:01', '2021-12-27 05:00:01'),
(60, '32', '20', 'Internet', 170000, 1, NULL, '2021-12-27 05:42:26', '2021-12-27 05:42:26'),
(61, '32', '21', 'Tiền điện', 2000, 42, NULL, '2021-12-27 05:42:26', '2021-12-27 05:42:26'),
(62, '32', '22', 'Nước', 12000, 7, NULL, '2021-12-27 05:42:26', '2021-12-27 05:42:26'),
(63, '32', '23', 'Gửi xe', 20000, 1, NULL, '2021-12-27 05:42:26', '2021-12-27 05:42:26'),
(64, '32', '24', 'Vệ sinh', 15000, 1, NULL, '2021-12-27 05:42:26', '2021-12-27 05:42:26'),
(65, '33', '14', 'Internet', 170000, 1, NULL, '2021-12-27 06:10:07', '2021-12-27 06:10:07'),
(66, '33', '15', 'Tiền điện', 2000, 87, NULL, '2021-12-27 06:10:07', '2021-12-27 06:10:07'),
(67, '33', '16', 'Nước', 12000, 7, NULL, '2021-12-27 06:10:07', '2021-12-27 06:10:07'),
(68, '33', '17', 'Gửi xe', 15000, 1, NULL, '2021-12-27 06:10:07', '2021-12-27 06:10:07'),
(69, '33', '18', 'Vệ sinh', 200000, 1, NULL, '2021-12-27 06:10:07', '2021-12-27 06:10:07'),
(70, '35', '14', 'Internet', 200000, 1, NULL, '2021-12-27 06:39:50', '2021-12-27 06:39:50'),
(71, '35', '15', 'Tiền điện', 2000, 62, NULL, '2021-12-27 06:39:50', '2021-12-27 06:39:50'),
(72, '35', '16', 'Nước', 12000, 6, NULL, '2021-12-27 06:39:50', '2021-12-27 06:39:50'),
(73, '35', '17', 'Gửi xe', 15000, 1, NULL, '2021-12-27 06:39:50', '2021-12-27 06:39:50'),
(74, '35', '18', 'Vệ sinh', 20000, 1, NULL, '2021-12-27 06:39:50', '2021-12-27 06:39:50'),
(75, '36', '14', 'Internet', 170000, 1, NULL, '2021-12-27 08:07:30', '2021-12-27 08:07:30'),
(76, '36', '15', 'Tiền điện', 2000, 77, NULL, '2021-12-27 08:07:30', '2021-12-27 08:07:30'),
(77, '36', '16', 'Nước', 11000, 7, NULL, '2021-12-27 08:07:30', '2021-12-27 08:07:30'),
(78, '36', '17', 'Gửi xe', 15000, 1, NULL, '2021-12-27 08:07:30', '2021-12-27 08:07:30'),
(79, '36', '18', 'Vệ sinh', 20000, 1, NULL, '2021-12-27 08:07:30', '2021-12-27 08:07:30'),
(80, '37', '14', 'Internet', 170000, 1, NULL, '2021-12-27 08:09:22', '2021-12-27 08:09:22'),
(81, '37', '15', 'Tiền điện', 2000, 87, NULL, '2021-12-27 08:09:22', '2021-12-27 08:09:22'),
(82, '37', '16', 'Nước', 11000, 9, NULL, '2021-12-27 08:09:22', '2021-12-27 08:09:22'),
(83, '37', '17', 'Gửi xe', 15000, 1, NULL, '2021-12-27 08:09:22', '2021-12-27 08:09:22'),
(84, '37', '18', 'Vệ sinh', 20000, 1, NULL, '2021-12-27 08:09:22', '2021-12-27 08:09:22'),
(85, '38', '14', 'Internet', 170000, 1, NULL, '2021-12-27 08:10:42', '2021-12-27 08:10:42'),
(86, '38', '15', 'Tiền điện', 2000, 90, NULL, '2021-12-27 08:10:42', '2021-12-27 08:10:42'),
(87, '38', '16', 'Nước', 11000, 10, NULL, '2021-12-27 08:10:42', '2021-12-27 08:10:42'),
(88, '38', '17', 'Gửi xe', 15000, 1, NULL, '2021-12-27 08:10:42', '2021-12-27 08:10:42'),
(89, '38', '18', 'Vệ sinh', 20000, 1, NULL, '2021-12-27 08:10:42', '2021-12-27 08:10:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `host_id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmnd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_at` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `host_id`, `name`, `phone`, `cmnd`, `birthday`, `address`, `room_id`, `rent_at`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 3, 'Thái Viết Hà', '+84338203895', '1232132312', '2001-02-08', '14 Doãn Uẩn', '1', '2021-12-12', 'thaiv21ietha28@gmail.com', NULL, '2021-08-18 09:20:15', '2021-08-18 09:20:15'),
(13, 1, 'Trần Xuân Nam', '0228281919', '13369379', '2001-02-08', 'Gia Lai', '16', '2020-12-08', 'thaiviet3ha28@gmail.com', NULL, '2021-08-19 08:20:07', '2021-09-02 05:59:13'),
(18, 4, 'Thái Viết Hà', '3893843896', '84008', '1212-12-12', '14 Doãn Uẩn', '2', '0121-12-12', 'thaivietha239328@gmail.com', NULL, '2021-08-20 05:08:18', '2021-08-20 05:08:18'),
(23, 2, 'Nguyễn Văn An', '0989923068', '18652278', '2000-02-18', 'Hà Nội', '3', '2020-12-12', 'abc123@gmail.com', NULL, '2021-08-20 07:04:29', '2021-08-20 07:04:29'),
(25, 5, 'Nguyễn Tiến Nam', '0989926068', '15856799', '1999-08-09', 'Hà Tĩnh', '5', '2021-09-01', 'ab12323@gmail.com', NULL, '2021-08-20 07:11:36', '2021-09-02 05:58:29'),
(27, 2, 'Nguyễn Đức Bảo', '089987899', '184384437', '2001-02-08', 'Nghệ An', '6', '2020-12-08', 'thaivietha28@gmail.com', NULL, '2021-08-20 08:09:54', '2021-09-02 06:41:30'),
(28, 2, 'Trần Xuân Đức', '012373672', '133829290', '1999-02-12', 'Gia Lai', '4', '2021-02-07', 'thaivietha2812@gmail.com', NULL, '2021-08-20 08:19:46', '2021-09-02 05:46:46'),
(29, 2, 'Nguyễn Việt Anh', '0935782622', '123445532', '1998-02-08', 'Đà Nẵng', '7', '2021-12-21', 'thaiviettest@gmail.com', NULL, '2021-08-20 08:22:02', '2021-09-02 05:54:10'),
(30, 2, 'Thái Viết Hà', '098252782', '009726788', '1999-12-12', 'Quảng Ngãi', '1', '2020-12-12', 'thaivi22etha28@gmail.com', NULL, '2021-08-20 08:41:02', '2021-09-02 05:47:47'),
(31, 2, 'Nguyễn Văn Nam', '092639378', '172927899', '2001-02-28', 'nam định', '2', '2021-02-22', 'thaivietha2814@gmail.com', NULL, '2021-08-20 08:54:38', '2021-09-01 23:49:47'),
(32, 2, 'Trần Hải Đăng', '097282899', '186829367', '2001-10-10', '14 Doãn Uẩn', '5', '2020-12-08', 'thaiviet221ha28@gmail.com', NULL, '2021-08-21 00:58:52', '2021-09-02 05:53:13'),
(33, 2, 'Trần Đình Cương', '097212839', '123399922', '1995-12-22', 'Quảng Nam', '12', '2021-02-08', 'thaiamsw28@gmail.com', NULL, '2021-08-31 09:05:17', '2021-09-03 07:29:01'),
(34, 2, 'Nguyễn Tiến Lâm', '0928292726', '123234234', '2001-12-31', 'Kỳ Phú', '2', '2020-12-31', '123thth2201124@gmail.com', NULL, '2021-08-31 09:12:12', '2021-09-02 05:52:24'),
(35, 2, 'Nguyễn Văn Khoa', '033420896', '13322243', '1994-08-01', 'Quảng Bình', '5', '2021-12-31', 'tha244a28@gmail.com', NULL, '2021-08-31 09:16:04', '2021-09-02 06:41:59'),
(37, 2, 'Phan Trung Kiên', '0972578266', '123235555', '2000-01-05', 'Quảng Bình', '1', '2021-02-07', 'tha212iv328@gmail.com', NULL, '2021-08-31 09:45:41', '2021-09-02 05:35:14'),
(38, 2, 'Nguyễn Văn Nam', '092722189', '14481292', '2001-12-12', 'Hà Nội', '7', '2020-12-12', 'abc12312@gmail.com', NULL, '2021-08-31 09:50:05', '2021-09-02 05:51:27'),
(39, 2, 'Nguyễn Công Vinh', '0989273788', '18879377', '2002-01-01', 'Đà Nẵng', '12', '2021-01-01', 'thaivietha2228@gmail.com', NULL, '2021-08-31 09:59:20', '2021-09-02 05:45:09'),
(40, 2, 'Hoàng Hữu Minh', '1233123', '22927200', '2001-01-01', 'Hà Tĩnh', '6', '2021-01-01', '1232014@gmail.com', NULL, '2021-08-31 20:21:00', '2021-09-03 07:17:56'),
(42, 3, '12312', '13123', '12312', '0232-12-31', '123', '', '0033-12-23', 'ad', NULL, '2021-09-28 07:49:22', '2021-09-28 07:49:22'),
(44, 2, 'Thái Viết Hà', '0562155273', '0999999', '2021-10-06', 'm', '8', '2021-10-21', 'tvha.20it10@vku.udn.vn', NULL, '2021-10-25 07:41:21', '2021-10-25 07:41:21'),
(45, 2, 'Thái Viết Hà', '05621552732', '138128939', '2001-01-10', 'HT', '3', '2020-01-12', 'tv2ha.20it10@vku.udn.vn', NULL, '2021-11-17 06:53:37', '2021-11-17 06:53:37'),
(46, 2, 'Nguyễn Văn Bảo', '0987766277', '127668888', '1999-09-10', 'Hà Nội', '2', '2021-01-01', '123thth20dg14@gmail.com', NULL, '2021-12-11 05:30:23', '2021-12-11 05:30:23'),
(47, 1, 'Trần Minh Quân', '0987625555', '192678888', '2003-06-30', 'Bình Định', '14', '2021-12-30', 'quan@gmail.com', NULL, '2021-12-21 08:02:18', '2021-12-21 08:02:18'),
(48, 1, 'Nguyễn Văn Hoàng', '0985623068', '12345533', '2021-12-31', 'Hà Nội 1123', '14', '2021-12-09', 'abc12223@gmail.com', NULL, '2021-12-21 08:04:04', '2021-12-21 08:04:04'),
(49, 1, 'Thái Viết Hà', '09725524222', '46767886', '2001-11-29', '14 Doãn Uẩn', '16', '2021-12-17', 'thaivietddha28@gmail.com', NULL, '2021-12-26 02:46:15', '2021-12-26 02:46:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `flights`
--

CREATE TABLE `flights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_08_14_135337_create_flights_table', 1),
(5, '2021_08_16_080627_create_rooms_table', 2),
(6, '2021_08_18_140546_create_customers_table', 3),
(7, '2021_09_04_123714_create_rooms_table', 4),
(8, '2021_09_05_160421_create_bills_table', 5),
(9, '2021_11_18_064605_create_services_table', 6),
(10, '2021_12_24_140207_bill_detail', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tvha.20it10@vku.udn.vn', '$2y$10$7sW7nB7B6PSsrFhsky5JMuP9j3k.wC3N.RFZGQwv04lPV3J./3.Dq', '2021-09-28 06:48:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `host_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_customer` int(11) DEFAULT 0,
  `price` bigint(255) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `host_id`, `name`, `num_customer`, `price`, `type`, `area`, `note`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '2', 'A206', 3, 1500000, 'Đơn', '20', 'note 12', NULL, NULL, NULL),
(2, '2', 'A207', 3, 2000000, 'Ghép', '10', 'note2', NULL, '2021-09-04 07:08:39', '2021-09-04 07:08:39'),
(3, '2', 'A208', 4, 15000000, 'Ghép', NULL, NULL, NULL, '2021-09-04 07:09:39', '2021-09-04 07:09:39'),
(4, '2', 'A209', 1, 15000000, 'Đơn', '20', NULL, NULL, '2021-09-04 07:10:41', '2021-09-04 07:10:41'),
(5, '2', 'A210', 3, 1500000, 'Đơn', '15', NULL, NULL, '2021-09-04 07:11:53', '2021-09-04 07:11:53'),
(6, '2', 'A211', 1, 15000000, 'Đơn', '10', NULL, NULL, '2021-09-04 07:59:48', '2021-09-04 07:59:48'),
(7, '2', 'A212', 1, 15000000, 'Đơn', '15', NULL, NULL, '2021-09-04 08:00:00', '2021-09-04 08:00:00'),
(8, '2', 'A100', 3, 2000000, 'Ghép', '10', 'a', NULL, '2021-09-04 08:36:02', '2021-09-04 08:36:02'),
(12, '2', '99', 2, 120000, 'Ghép', '10', 'm', NULL, '2021-12-10 08:25:01', '2021-12-10 08:25:01'),
(13, '2', 'A88', 0, 1200000, 'Đơn', '12', NULL, NULL, '2021-12-11 05:32:13', '2021-12-11 05:32:13'),
(14, '1', 'B1', 0, 3000000, 'Ghép', '15', NULL, NULL, '2021-12-21 07:12:05', '2021-12-21 07:12:05'),
(15, '1', 'B5', 0, 1500000, 'Đơn', '10', NULL, NULL, '2021-12-21 07:12:24', '2021-12-21 07:12:24'),
(16, '1', 'B32', -3, 2000000, 'Ghép', '15', NULL, NULL, '2021-12-21 07:15:53', '2021-12-21 07:15:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `host_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) DEFAULT NULL,
  `unit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`id`, `host_id`, `code`, `name`, `price`, `unit`, `created_at`, `updated_at`) VALUES
(14, '2', NULL, 'Internet', 170000, 'tháng', '2021-12-26 08:53:37', '2021-12-26 08:53:37'),
(15, '2', NULL, 'Tiền điện', 2000, 'kwh', '2021-12-26 08:53:37', '2021-12-26 08:53:37'),
(16, '2', NULL, 'Nước', 11000, 'm3', '2021-12-26 08:53:37', '2021-12-26 08:53:37'),
(17, '2', NULL, 'Gửi xe', 15000, 'tháng', '2021-12-26 08:53:37', '2021-12-26 08:53:37'),
(18, '2', NULL, 'Vệ sinh', 20000, 'tháng', '2021-12-26 08:53:37', '2021-12-26 08:53:37'),
(20, '1', NULL, 'Internet', NULL, 'tháng', '2021-12-27 00:11:22', '2021-12-27 00:11:22'),
(21, '1', NULL, 'Tiền điện', NULL, 'kwh', '2021-12-27 00:11:22', '2021-12-27 00:11:22'),
(22, '1', NULL, 'Nước', NULL, 'm3', '2021-12-27 00:11:22', '2021-12-27 00:11:22'),
(23, '1', NULL, 'Gửi xe', NULL, 'tháng', '2021-12-27 00:11:22', '2021-12-27 00:11:22'),
(24, '1', NULL, 'Vệ sinh', NULL, 'tháng', '2021-12-27 00:11:22', '2021-12-27 00:11:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ha', 'thaivietha28@gmail.com', NULL, '$2y$10$4FYOvAh8FllKZ/7PmR0h/.lPQe1/yYZEPPk6KuSXxeQ9hI1I00Jdm', 'PPfXDuGgb94GmPYHk8iH0dElhUEfqRsrCI83bxPeM8Et5SVbaB6hWmqVegqv', '2021-08-14 07:03:44', '2021-09-28 06:12:03'),
(2, 'Thái Viết Hà', 'tvha.20it10@vku.udn.vn', NULL, '$2y$10$vLRbTk.36o/yTBuU5ChPoOrsxGum4uoOFz1R536Awf8nLsfJmTWVu', 'vvwzDxKgDlf1dSkK2qtSW6G71TwnJ6hom0LnV0hORzwL6m15I8Lm8Qu66VOg', '2021-08-14 07:35:01', '2021-09-28 04:31:24'),
(3, '123thth2014@', '123thth2014@gmail.com', NULL, '$2y$10$ONLT74NM8wh/pNHSBXf48OT0WMunQwn6nkN7WSlRFrSSO31BaW0/O', NULL, '2021-08-14 23:33:33', '2021-08-14 23:33:33'),
(4, 'Thái Hà', 'homnay@gmail.com', NULL, '$2y$10$oo.fdNfKuIHBdf81k1WAp.nzR4NP1wTahv8hObUID2xH3c27YHgx6', NULL, '2021-08-15 02:02:40', '2021-08-15 02:02:40'),
(5, 'HÀ THÁI', 'abc@gmail.com', NULL, '$2y$10$5x5rGOWPOWgZSuNzo0RDmu/qPeiXj/ScSaryzV5Az.IQC45fHTjGO', 'rsVyB5bzphJJwnbv7ZUb4SAxZPKuIFIuOrqDE4BD3B5T1pHry06XNmwU7NqI', '2021-08-15 06:27:53', '2021-08-15 06:27:53'),
(6, 'Trần Hậu Nam', 'provip@gmail.com', NULL, '$2y$10$lNp5JcRDHlUms77BkxYsU.TQ7PS2oO2Pc1/EH9xRLh6X.Z./WxDaG', NULL, '2021-09-03 08:56:54', '2021-09-03 08:56:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cmnd` (`cmnd`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `host_id` (`host_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_name_unique` (`name`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `flights`
--
ALTER TABLE `flights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD CONSTRAINT `password_resets_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
