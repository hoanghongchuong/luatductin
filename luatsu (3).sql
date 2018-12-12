-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2018 lúc 11:29 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `luatsu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `mota` longtext COLLATE utf8_unicode_ci,
  `link` text COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `title` text COLLATE utf8_unicode_ci,
  `keyword` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `com` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `user_id`, `name`, `alias`, `photo`, `mota`, `link`, `content`, `status`, `title`, `keyword`, `description`, `com`, `created_at`, `updated_at`) VALUES
(1, 8, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'gioi-thieu', '2018-11-08 19:15:32', '2018-11-08 19:15:32'),
(2, 8, NULL, '', NULL, NULL, NULL, '<p><strong>C&Ocirc;NG TY LUẬT ĐỨC T&Iacute;N</strong></p>\r\n<p>Trụ sở: Số 31 ng&otilde; 73, phố Nguyễn Lương Bằng, phường Nam Đồng, quận Đống Đa, H&agrave; Nội</p>\r\n<p><strong>&nbsp;</strong>Điện thoại: 098 882 33 38 &nbsp;-&nbsp; Email: <a title=\"\">luatsuduclong@gmail.com</a></p>\r\n<p><strong>LUẬT SƯ TƯ VẤN PH&Aacute;P LUẬT TRỰC TUYẾN&nbsp;GỌI: 098 882 33 38</strong></p>\r\n<p><strong></strong></p>', 1, NULL, NULL, NULL, 'lien-he', '2018-11-09 02:26:09', '2018-11-08 19:26:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `avatar` varchar(250) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `level` int(1) DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `email`, `phone`, `avatar`, `active`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'Quản trị viên', 'admin', '$2y$10$VPi7aYLYXKA21uVUWfxuE.vFP.dGVN76YOmLWkZWiTDaxqtM484oO', 'admin@team.vn', '0987654321', 'public/uploads/admins/1542183090.jpg', 1, 1, 'Xk2MCik2LusDC1SE4uv8vOV9eeohsGvp9ODvYayfVLbjcTHpMjjasgXzERQH', '2018-11-14 09:05:35', '2018-11-14 01:20:42'),
(23, 'Chuonghh', 'chuonghh', '$2y$10$HGSIsJhvgyD2wlj6t8AuUe/7.Jsj7ffHwirGYtw.nPZCJksJFt1Aq', 'chuong1194@yahoo.com', '0987654321', 'public/uploads/admins/1542188189.jpg', 1, 0, NULL, '2018-11-14 09:36:29', '2018-11-14 02:36:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `id` int(11) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `status` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `admin_id`, `member_id`, `content`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, NULL, 2, '<p>df sdf sdf&nbsp;</p>', 1, '2018-11-29 02:55:14', '2018-11-28 19:55:14'),
(7, 1, 23, NULL, '<p>Luaatj sw tra loi</p>', 1, '2018-11-29 02:15:36', '2018-11-14 02:36:07'),
(8, 1, NULL, 2, '<p>tesst tra loi</p>', 0, '2018-11-29 02:55:27', '2018-11-28 19:55:27'),
(9, 1, NULL, 5, '<p>tesst a vatar</p>', 1, '2018-11-29 03:20:16', '2018-11-28 20:20:16'),
(10, 2, 16, NULL, '<p>sdf sdf sdf</p>', 1, '2018-11-30 21:55:56', '2018-11-30 21:55:56'),
(11, 2, NULL, 2, '<p>tra loi cau hoi test 2</p>', 1, '2018-12-01 04:56:52', '2018-11-30 21:56:52'),
(12, 2, 16, NULL, '<p>trả lời ban chuonghh</p>', 1, '2018-11-30 21:57:11', '2018-11-30 21:57:11'),
(13, 2, NULL, 2, '<p>dsfsf</p>', 0, '2018-12-01 00:00:41', '2018-12-01 00:00:41'),
(14, 2, NULL, 2, '<p>sdf sdf</p>', 0, '2018-12-01 00:16:44', '2018-12-01 00:16:44'),
(15, 2, NULL, 2, '<p>test email g</p>', 0, '2018-12-01 00:20:39', '2018-12-01 00:20:39'),
(16, 2, NULL, 2, '<p>dsf s</p>', 0, '2018-12-01 01:25:08', '2018-12-01 01:25:08'),
(17, 4, NULL, 6, '<p>sdf ds</p>', 1, '2018-12-07 09:50:56', '2018-12-07 02:50:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authorizations`
--

CREATE TABLE `authorizations` (
  `id` int(11) UNSIGNED NOT NULL,
  `admin_id` int(11) UNSIGNED NOT NULL,
  `is_super_admin` int(1) NOT NULL DEFAULT '0',
  `can_setting` int(1) NOT NULL DEFAULT '0',
  `can_category_news` int(1) NOT NULL DEFAULT '0',
  `can_news` int(1) NOT NULL DEFAULT '0',
  `can_contact` int(1) NOT NULL DEFAULT '0',
  `can_question` int(1) NOT NULL DEFAULT '0',
  `can_delete_question` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `authorizations`
--

INSERT INTO `authorizations` (`id`, `admin_id`, `is_super_admin`, `can_setting`, `can_category_news`, `can_news`, `can_contact`, `can_question`, `can_delete_question`, `created_at`, `updated_at`) VALUES
(1, 10, 0, 1, 0, 1, 1, 0, 0, '2018-11-13 19:57:42', '2018-11-13 19:57:42'),
(2, 11, 0, 0, 1, 0, 0, 1, 1, '2018-11-13 20:02:29', '2018-11-13 20:02:29'),
(3, 16, 1, 0, 1, 1, 1, 0, 0, '2018-11-14 04:19:09', '2018-11-13 20:04:41'),
(4, 20, 0, 0, 0, 0, 0, 1, 0, '2018-11-14 08:26:42', '2018-11-14 01:26:42'),
(5, 17, 0, 0, 0, 0, 0, 1, 0, '2018-11-14 08:47:49', '2018-11-14 01:47:49'),
(6, 21, 0, 0, 0, 0, 0, 1, 0, '2018-11-14 01:55:40', '2018-11-14 01:55:40'),
(7, 22, 0, 0, 0, 0, 0, 1, 0, '2018-11-14 02:02:23', '2018-11-14 02:02:23'),
(8, 23, 0, 0, 0, 0, 1, 1, 0, '2018-11-14 09:35:00', '2018-11-14 02:35:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stt` int(11) NOT NULL DEFAULT '0',
  `com` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner_content`
--

CREATE TABLE `banner_content` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `banner_content`
--

INSERT INTO `banner_content` (`id`, `image`, `link`, `position`, `updated_at`, `created_at`) VALUES
(8, '1510106818_banner-1.jpg', NULL, 3, '2017-11-07 19:06:58', '2017-11-07 19:06:58'),
(9, '1510106829_banner-1.jpg', NULL, 4, '2017-11-07 19:07:09', '2017-11-07 19:07:09'),
(10, '1510106837_banner-1.jpg', NULL, 6, '2017-11-07 19:07:17', '2017-11-07 19:07:17'),
(11, '1510106849_banner-1.jpg', NULL, 7, '2017-11-07 19:07:29', '2017-11-07 19:07:29'),
(12, '1510106862_banner-1.jpg', NULL, 2, '2017-11-07 19:07:42', '2017-11-07 19:07:42'),
(13, '1510107779_banner-1.jpg', NULL, 5, '2017-11-07 19:22:59', '2017-11-07 19:22:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner_position`
--

CREATE TABLE `banner_position` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `banner_position`
--

INSERT INTO `banner_position` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', '2017-09-20 08:29:24', '2017-09-20 01:29:24'),
(2, 'Tin tức', '2017-10-14 03:36:18', '2017-10-13 20:36:18'),
(3, 'Trang giới thiệu', '2017-11-08 02:03:36', '2017-11-07 19:03:36'),
(4, 'Trang sản phẩm', '2017-11-08 02:03:51', '2017-11-07 19:03:51'),
(5, 'Trang chi tiết sản phẩm', '2017-10-16 02:47:30', '2017-10-15 19:47:30'),
(6, 'Trang bảng giá', '2017-11-07 19:05:03', '2017-11-07 19:05:03'),
(7, 'Trang chứng chỉ kĩ thuật', '2017-11-07 19:05:29', '2017-11-07 19:05:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET latin1 DEFAULT NULL,
  `address` text,
  `content` text CHARACTER SET latin1,
  `status` tinyint(2) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `district_name` varchar(250) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`id`, `district_name`, `province_id`, `created_at`, `updated_at`) VALUES
(1, 'Ba Đình', 4, '2017-09-24 18:03:47', '2017-09-24 18:03:47'),
(2, 'Từ Liêm', 4, '2017-09-24 18:04:29', '2017-09-24 18:04:29'),
(3, 'Hoàn Kiếm', 4, '2017-09-24 18:04:40', '2017-09-24 18:04:40'),
(4, 'Cầu giấy', 4, '2017-09-25 00:14:58', '2017-09-25 00:14:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `photo` text,
  `position` varchar(250) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `footer`
--

CREATE TABLE `footer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `codemap` longtext COLLATE utf8_unicode_ci,
  `desc` longtext COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `stt` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioithieu`
--

CREATE TABLE `gioithieu` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `alias` varchar(250) DEFAULT NULL,
  `image` text,
  `mota` text,
  `content` text,
  `title` varchar(250) DEFAULT NULL,
  `keyword` varchar(250) DEFAULT NULL,
  `description` text,
  `status` int(2) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `guest_online`
--

CREATE TABLE `guest_online` (
  `guest_id` varchar(100) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `number` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `guest_online`
--

INSERT INTO `guest_online` (`guest_id`, `time`, `number`, `created_at`, `updated_at`) VALUES
('q83v3pbuoo7th7a598pmnhio4l', 1544603970, 0, '2018-12-12 08:15:21', '2018-12-12 08:39:30'),
('l9v2of4c1p84g83f7d5iojiem9', 1544603979, 0, '2018-12-12 08:39:36', '2018-12-12 08:39:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `image_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stt` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienket`
--

CREATE TABLE `lienket` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `link` text COLLATE utf8_unicode_ci,
  `photo` text COLLATE utf8_unicode_ci,
  `mota` longtext COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `noibat` int(11) NOT NULL DEFAULT '0',
  `com` text COLLATE utf8_unicode_ci,
  `stt` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `members`
--

CREATE TABLE `members` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `address` text NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `active` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `members`
--

INSERT INTO `members` (`id`, `name`, `phone`, `email`, `username`, `password`, `photo`, `address`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Hoàng Đức A', '0987654321', 'a@gmail.com', 'duca', '$2y$10$i1nxY.Vjd3HM3c9E3bMuIe.73c/.OpC.PcuMPd2r.U0ulNy1LSRtS', NULL, 'Vạn Phúc, Hà Đông, Hà Nọi', NULL, 0, '2018-11-09 01:45:20', '2018-11-09 01:45:20'),
(2, 'Hoàng Hồng Chương', '0987654321', 'chuonghh@gmail.com', 'chuonghh', '$2y$10$hXf0hOM1PifMR1iM5irDE.dbrylflOa5IjA9RiWKjRjG2WH24gCDa', NULL, 'Vạn Phúc, Hà Đông, Hà Nọi', 'Dfjwti77UsV0WgiCwKb6vcwYe4mc2Y01N1qFix1331JXpi0wwoCGvI349uJ8', 0, '2018-11-29 02:59:09', '2018-11-11 19:25:44'),
(3, 'Nguyễn Nam', '9876543210', 'nam@gmail.com', 'namnguyen', '$2y$10$5L0f1Jth0mQ7qRZBHTsSuOPW8lTgV6B..eW180p4f6xYhcEKN2U1.', NULL, 'Vạn Phúc, Hà Đông, Hà Nọi', 'zHFsAuc1PbVSxF6gNdXyWqJnWOy8pGtmLicsCRBvtDJI2IwZbcvPIKzTujeo', 0, '2018-11-14 08:35:29', '2018-11-14 01:21:28'),
(5, 'Trần Văn A', '0987654321', 'trana@gmail.com', 'vana', '$2y$10$qvhD76wrAEnRQMgCdCUeLOAa.S2nz7hTwwNjSARra/6eY/DnQdzTa', 'upload/users/1543461359.png', 'Vạn Phúc, Hà Đông, Hà Nọi', NULL, 0, '2018-11-29 03:31:16', '2018-11-28 20:15:59'),
(6, 'chuonghhh', '12345678', 'admin@team.vn', 'chuonghhh', '$2y$10$6FYtRu9ncsFJoayeH97DROWxWEOBBjtrH2cdo44bWr.CWKXkIfwEO', 'upload/users/1544176182.jpg', 'Hà Nội', 'NDzSeQR9qOOWDkUiezjMLhEyGluQcFG5WPlJf14DPC8aIcQPrkTsqZ4XmTUO', 0, '2018-12-07 09:55:50', '2018-12-07 02:49:42'),
(7, 'Hoàng Hồng Chương', '0987654321', 'adminx@team.vn', 'chuonghhjjj', '$2y$10$eF0zT39.QE64DTn4dVUGsOwflXdUzlYuYLDZEVVPAWskBy1p5OC3m', 'upload/users/1544176578.jpg', 'Hà Nội', NULL, 0, '2018-12-07 02:56:18', '2018-12-07 02:56:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` text COLLATE utf8_unicode_ci,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `lever` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `title` text COLLATE utf8_unicode_ci,
  `keyword` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `com` text COLLATE utf8_unicode_ci,
  `stt` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_06_05_042524_create_products_table', 1),
('2017_06_05_045215_create_images_table', 1),
('2017_06_07_033057_create_news_categories_table', 1),
('2017_06_07_033135_create_news_table', 1),
('2017_06_07_033425_create_setting_table', 1),
('2017_06_07_033619_create_pages_table', 1),
('2017_06_07_033944_create_contact_table', 1),
('2017_06_07_034012_create_footer_table', 1),
('2017_06_07_034035_create_slider_table', 1),
('2017_06_07_034117_create_useronline_table', 1),
('2017_06_07_034335_create_order_table', 1),
('2017_06_07_034407_create_order_detail_table', 1),
('2017_06_07_034448_create_newsletter_table', 1),
('2017_06_07_034655_create_order_status_table', 1),
('2017_06_07_064339_create_counter_table', 1),
('2017_06_07_070934_create_partner_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `background` text COLLATE utf8_unicode_ci,
  `mota` longtext COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `noibat` int(11) DEFAULT '0',
  `title` text COLLATE utf8_unicode_ci,
  `keyword` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `com` text COLLATE utf8_unicode_ci,
  `stt` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `cate_id`, `user_id`, `name`, `alias`, `photo`, `background`, `mota`, `content`, `status`, `noibat`, `title`, `keyword`, `description`, `com`, `stt`, `created_at`, `updated_at`) VALUES
(1, 5, 8, 'Dịch vụ Luật sư đại diện giải quyết tranh chấp dân sự', 'dich-vu-luat-su-dai-dien-giai-quyet-tranh-chap-dan-su', '1541662498_news1.jpg', '', 'Công ty Luật Minh Gia cung cấp dịch vụ luật sư tham gia đại diện giải quyết tranh chấp dân sự (tranh chấp về dân sự và yêu cầu về dân sự), nội dung cụ thể như sau:', '<div>C&ocirc;ng ty Luật Minh Gia cung cấp dịch vụ luật sư tham gia đại diện giải quyết tranh chấp d&acirc;n sự (tranh chấp về d&acirc;n sự v&agrave; y&ecirc;u cầu về d&acirc;n sự), nội dung cụ thể như sau:</div>\r\n<div class=\"article-mainRelate\">&nbsp;</div>\r\n<div>\r\n<p><strong>1. C&aacute;c tranh chấp về d&acirc;n sự:</strong></p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Tranh chấp về quyền sở hữu t&agrave;i sản;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Tranh chấp về hợp đồng d&acirc;n sự;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Tranh chấp về thừa kế t&agrave;i sản;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Tranh chấp về bồi thường thiệt hại ngo&agrave;i hợp đồng;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Tranh chấp về quyền sử dụng đất v&agrave; t&agrave;i sản gắn liền với đất;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Tranh chấp li&ecirc;n quan đến hoạt động nghiệp vụ b&aacute;o ch&iacute;;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Tranh chấp về quốc tịch;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Tranh chấp về quyền sở hữu tr&iacute; tuệ, chuyển giao c&ocirc;ng nghệ;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; C&aacute;c tranh chấp kh&aacute;c về d&acirc;n sự m&agrave; ph&aacute;p luật c&oacute; quy định.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>2. C&aacute;c y&ecirc;u cầu về d&acirc;n sự:</strong></p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Y&ecirc;u cầu tuy&ecirc;n bố hoặc hủy bỏ tuy&ecirc;n bố một người mất năng lực h&agrave;nh vi d&acirc;n sự hoặc bị hạn chế năng lực h&agrave;nh vi d&acirc;n sự;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Y&ecirc;u cầu th&ocirc;ng b&aacute;o t&igrave;m kiếm người vắng mặt tại nơi cư tr&uacute; v&agrave; quản l&yacute; t&agrave;i sản của người đ&oacute;;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Y&ecirc;u cầu tuy&ecirc;n bố hoặc huỷ bỏ quyết định tuy&ecirc;n bố một người mất t&iacute;ch;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Y&ecirc;u cầu tuy&ecirc;n bố hoặc hủy bỏ quyết định tuy&ecirc;n bố một người l&agrave; đ&atilde; chết;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; Y&ecirc;u cầu c&ocirc;ng nhận hoặc kh&ocirc;ng nhận v&agrave; cho thi h&agrave;nh tại Việt Nam bản &aacute;n, quyết định về d&acirc;n sự của To&agrave; &aacute;n nước ngo&agrave;i;</p>\r\n<p>&nbsp;</p>\r\n<p>+&nbsp; C&aacute;c y&ecirc;u cầu kh&aacute;c về d&acirc;n sự m&agrave; ph&aacute;p luật c&oacute; quy định.</p>\r\n<p><br /><img src=\"https://luatminhgia.com.vn/Uploads/images/DichVu/luat%20su%20tham%20gia%20dai%20giai%20gq%20tranh%20chap%20dan%20su.jpg\" alt=\"Dịch vụ Luật sư đại diện giải quyết tranh chấp d&acirc;n sự\" /></p>\r\n<p>Luật sư đại diện giải quyết tranh chấp d&acirc;n sự</p>\r\n<p>&nbsp;</p>\r\n<p><strong>2.&nbsp; Quy tr&igrave;nh thực hiện của luật sư đại diện giải quyết tranh chấp d&acirc;n sự được tiến h&agrave;nh theo c&aacute;c bước như sau:</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Bước 1:</strong>&nbsp;Tiếp nhận th&ocirc;ng tin v&agrave; hồ sơ vụ việc v&agrave; c&aacute;c chứng cứ, giấy tờ li&ecirc;n quan đến vụ việc tranh chấp thực tế khi đương sự y&ecirc;u cầu.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Bước 2:</strong>&nbsp;X&aacute;c định về điều kiện, thẩm quyền giải quyết, thời gian thực hiện v&agrave; ph&acirc;n c&ocirc;ng luật sư tham gia đại diện giải quyết tranh chấp d&acirc;n sự, việc d&acirc;n sự.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Bước 3:</strong>&nbsp;Thu thập chứng cứ, t&agrave;i liệu v&agrave; c&aacute;c điều kiện chứng minh kh&aacute;c theo quy định ph&aacute;p luật để thực hiện nhiệm vụ đại diện giải quyết tranh chấp d&acirc;n sự, việc d&acirc;n sự.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Bước 4:</strong>&nbsp;Ho&agrave;n thiện hồ sơ tham gia đại diện giải quyết tranh chấp hoặc tham gia tố tụng gửi c&aacute;c cơ quan tiến h&agrave;nh tố tụng v&agrave; triển khai nghi&ecirc;n cứu hồ sơ vụ &aacute;n.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Bước 5:</strong>&nbsp;Luật sư tham gia giải quyết tranh chấp hoặc tham gia tố tụng tại cơ quan tiến h&agrave;nh tố tụng theo nhiệm vụ đ&atilde; ph&acirc;n c&ocirc;ng nhằmbảo vệ quyền v&agrave; lợi &iacute;ch hợp ph&aacute;p của nguy&ecirc;n đơn, bị đơn, người bị hại, người li&ecirc;n quan v&agrave; đương sự kh&aacute;c trong vụ &aacute;n d&acirc;n sự.</p>\r\n<p>&nbsp;</p>\r\n<p>Li&ecirc;n hệ với ch&uacute;ng t&ocirc;i theo th&ocirc;ng tin dưới đ&acirc;y để được tư vấn, hỗ trợ</p>\r\n<p>&nbsp;</p>\r\n<p><em><strong>C&ocirc;ng ty Luật Minh Gia</strong></em></p>\r\n<p><em><strong>Địa chỉ:</strong>&nbsp;Ph&ograve;ng 12A09 T&ograve;a nh&agrave; 17T7 - Trung H&ograve;a Nh&acirc;n Ch&iacute;nh, đường Ho&agrave;ng Đạo Th&uacute;y, Thanh Xu&acirc;n, H&agrave; Nội​</em></p>\r\n<p><strong><em>Điện thoại:&nbsp;</em></strong><em>024 6683 1212&nbsp; -&nbsp;&nbsp;<strong>Hotline:</strong>&nbsp;<a href=\"tel:19001933\">19001933</a></em></p>\r\n<p><strong><em>Website:&nbsp;</em></strong><em><a href=\"https://luatminhgia.com.vn/\">https://luatminhgia.com.vn</a>&nbsp; -&nbsp;&nbsp;</em><strong><em>Email:&nbsp;</em></strong><a href=\"mailto:lienhe@luatminhgia.vn\"><em>lienhe@luatminhgia.vn</em></a></p>\r\n<p>&nbsp;</p>\r\n<p>Tr&acirc;n trọng</p>\r\n<p>P. Luật sư tranh tụng - C&ocirc;ng ty Luật Minh Gia</p>\r\n</div>', 1, 1, NULL, NULL, NULL, 'bai-viet', 0, '2018-11-08 08:21:22', '2018-11-08 01:21:22'),
(2, 5, 8, 'Dịch vụ tham gia tố tụng tại nhà', 'dich-vu-tham-gia-to-tung-tai-nha', '1541731045_news2.png', '', 'Theo quy định, Luật sư được đương sự mời và được Toà án chấp nhận để tham gia tố tụng bảo vệ quyền và lợi ích hợp pháp của đương sự là người bảo vệ quyền và lợi ích hợp pháp của đương sự, giải quyết cách tranh chấp về dân sự như:', NULL, 1, 1, NULL, NULL, NULL, 'bai-viet', 0, '2018-11-08 19:37:25', '2018-11-08 19:37:25'),
(3, 9, 8, 'Luật sư tranh tụng trong vụ án hình sự', 'luat-su-tranh-tung-trong-vu-an-hinh-su', '1541731817_6.png', '', 'Công ty Luật Minh Gia tiếp nhận dịch vụ pháp lý của cá nhân, tổ chức, doanh nghiệp và cử luật sư tham gia tố tụng với tư cách là người bào chữa cho người bị tạm giữ, bị can, bị cáo hoặc là người bảo vệ quyền lợi của người bị hại, nguyên đơn dân sự, bị đơn dân sự, người có quyền lợi, nghĩa vụ liên quan trong vụ án hình sự.', NULL, 1, 1, NULL, NULL, NULL, 'bai-viet', 0, '2018-11-08 19:50:17', '2018-11-08 19:50:17'),
(4, 14, 8, 'Tư vấn thủ tục ly hôn', 'tu-van-thu-tuc-ly-hon', '1541732467_9.jpg', '', 'Luật sư Luật Minh Gia thực hiện tư vấn thủ tục ly hôn bằng hình thức tư vấn trực tiếp, tư vấn qua tổng đài luật sư 1900.1933 và qua Email đối với các vấn đề liên quan đến đơn phương/thuận tình ly hôn, vấn đề về tài sản, quyền nuôi con và các nội dung khác liên quan.', NULL, 1, 1, NULL, NULL, NULL, 'bai-viet', 0, '2018-11-08 20:01:07', '2018-11-08 20:01:07'),
(5, 6, 8, 'kiến thức dân sự 1', 'kien-thuc-dan-su-1', '1541735647_9.jpg', '', 'Luật sư tư vấn trực tuyến trường hợp hỏi về các điều kiện để hưởng chế độ thai sản theo quy định luật Bảo hiểm xã hội năm 2014 và các quy định pháp luật liên quan.', NULL, 1, 1, NULL, NULL, NULL, 'bai-viet', 0, '2018-11-09 04:01:47', '2018-11-08 21:01:47'),
(6, 6, 8, 'Kiến thức dân sự 2', 'kien-thuc-dan-su-2', '1541736379_10.png', '', 'Đối với vấn đề giải quyết tranh chấp và khởi kiện vụ án dân sự cũng như bảo vệ quyền lợi cho nguyên đơn, bị đơn, người liên quan, người bị hại,', NULL, 1, 1, NULL, NULL, NULL, 'bai-viet', 0, '2018-11-09 04:06:26', '2018-11-08 21:06:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `name` text COLLATE utf8_unicode_ci,
  `link` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci,
  `photo` text COLLATE utf8_unicode_ci,
  `mota` longtext COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `noibat` int(11) NOT NULL DEFAULT '0',
  `com` text COLLATE utf8_unicode_ci,
  `stt` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `lever` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) DEFAULT '0',
  `title` text COLLATE utf8_unicode_ci,
  `keyword` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `com` text COLLATE utf8_unicode_ci,
  `home` int(1) DEFAULT '0',
  `stt` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `background` text COLLATE utf8_unicode_ci,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_categories`
--

INSERT INTO `news_categories` (`id`, `name`, `alias`, `photo`, `mota`, `status`, `lever`, `parent_id`, `title`, `keyword`, `description`, `com`, `home`, `stt`, `created_at`, `background`, `updated_at`) VALUES
(1, 'Giới thiệu', 'gioi-thieu', '', NULL, 1, 0, 0, NULL, NULL, NULL, 'bai-viet', 0, 1, '2018-11-09 03:28:22', '', '2018-11-08 20:28:22'),
(2, 'Về chúng tôi', 've-chung-toi', '', '<h1>Giới thiệu chung về Luật Đức T&iacute;n</h1>\r\n<div class=\"category-description\">\r\n<div>Chuy&ecirc;n mục giới thiệu chung về C&ocirc;ng ty Luật Minh Gia bao gồm c&aacute;c lĩnh vực ph&aacute;p l&yacute; cung cấp, đội ngũ luật sư, m&ocirc; h&igrave;nh hoạt động v&agrave; c&aacute;c hoạt động kh&aacute;c tại Luật Minh Gia</div>\r\n</div>', 1, 0, 1, NULL, NULL, NULL, 'bai-viet', NULL, 2, '2018-11-08 04:16:45', '', '2018-11-07 21:16:45'),
(3, 'Tin luật Đức Tín', 'tin-luat-duc-tin', '', '<h1>Tin tức về Luật Đức T&iacute;n</h1>\r\n<p>Cập nhật th&ocirc;ng tin về Luật Minh Gia v&agrave; th&ocirc;ng tin luật sư li&ecirc;n quan như: Th&ocirc;ng tin nội bộ, th&ocirc;ng tin tuyển dụng, th&ocirc;ng tin chung về luật sư v&agrave; nghề luật sư.</p>\r\n<div class=\"category-description\">&nbsp;</div>', 1, 0, 1, NULL, NULL, NULL, 'bai-viet', NULL, 3, '2018-11-07 21:18:27', '', '2018-11-07 21:18:27'),
(4, 'Dân sự', 'dan-su', '', NULL, 1, 0, 0, NULL, NULL, NULL, 'bai-viet', 1, 4, '2018-11-09 03:28:50', '', '2018-11-08 20:28:50'),
(5, 'Luật sư dân sự', 'luat-su-dan-su', '', NULL, 1, 0, 4, NULL, NULL, NULL, 'bai-viet', NULL, 5, '2018-11-08 04:19:20', '', '2018-11-07 21:19:20'),
(6, 'Kiến thức dân sự', 'kien-thuc-dan-su', '', NULL, 1, 0, 4, NULL, NULL, NULL, 'bai-viet', NULL, 6, '2018-11-07 21:19:48', '', '2018-11-07 21:19:48'),
(7, 'Hình sự', 'hinh-su', '', NULL, 1, 0, 0, NULL, NULL, NULL, 'bai-viet', NULL, 7, '2018-11-07 21:22:25', '', '2018-11-07 21:22:25'),
(8, 'Luật sư hình sự', 'luat-su-hinh-su', '', NULL, 1, 0, 7, NULL, NULL, NULL, 'bai-viet', 1, 8, '2018-11-09 03:28:56', '', '2018-11-08 20:28:56'),
(9, 'Kiến thức hình sự', 'kien-thuc-hinh-su', '', NULL, 1, 0, 7, NULL, NULL, NULL, 'bai-viet', NULL, 9, '2018-11-07 21:22:54', '', '2018-11-07 21:22:54'),
(10, 'Đất đai', 'dat-dai', '', NULL, 1, 0, 0, NULL, NULL, NULL, 'bai-viet', 1, 10, '2018-11-09 03:29:01', '', '2018-11-08 20:29:01'),
(11, 'Luật sư đất đai', 'luat-su-dat-dai', '', NULL, 1, 0, 10, NULL, NULL, NULL, 'bai-viet', NULL, 11, '2018-11-07 21:24:14', '', '2018-11-07 21:24:14'),
(12, 'Kiến thức đất đai', 'kien-thuc-dat-dai', '', NULL, 1, 0, 10, NULL, NULL, NULL, 'bai-viet', NULL, 12, '2018-11-07 21:24:53', '', '2018-11-07 21:24:53'),
(13, 'Hôn nhân', 'hon-nhan', '', NULL, 1, 0, 0, NULL, NULL, NULL, 'bai-viet', 1, 13, '2018-11-09 03:29:05', '', '2018-11-08 20:29:05'),
(14, 'Luật sư hôn nhân', 'luat-su-hon-nhan', '', NULL, 1, 0, 13, NULL, NULL, NULL, 'bai-viet', NULL, 14, '2018-11-07 21:26:44', '', '2018-11-07 21:26:44'),
(15, 'Kiến thức hôn nhân', 'kien-thuc-hon-nhan', '', NULL, 1, 0, 13, NULL, NULL, NULL, 'bai-viet', NULL, 15, '2018-11-07 21:27:05', '', '2018-11-07 21:27:05'),
(16, 'Lao động', 'lao-dong', '', NULL, 1, 0, 0, NULL, NULL, NULL, 'bai-viet', 1, 16, '2018-11-09 03:29:09', '', '2018-11-08 20:29:09'),
(17, 'Luật sư lao động', 'luat-su-lao-dong', '', NULL, 1, 0, 16, NULL, NULL, NULL, 'bai-viet', NULL, 17, '2018-11-07 21:29:31', '', '2018-11-07 21:29:31'),
(18, 'Kiến thức lao động', 'kien-thuc-lao-dong', '', NULL, 1, 0, 16, NULL, NULL, NULL, 'bai-viet', NULL, 18, '2018-11-07 21:29:45', '', '2018-11-07 21:29:45'),
(19, 'Doanh nghiệp', 'doanh-nghiep', '', NULL, 1, 0, 0, NULL, NULL, NULL, 'bai-viet', NULL, 19, '2018-11-07 21:30:09', '', '2018-11-07 21:30:09'),
(20, 'Luật sư doanh nghiệp', 'luat-su-doanh-nghiep', '', NULL, 1, 0, 19, NULL, NULL, NULL, 'bai-viet', NULL, 20, '2018-11-07 21:30:24', '', '2018-11-07 21:30:24'),
(21, 'Kiến thức doanh nghiệp', 'kien-thuc-doanh-nghiep', '', NULL, 1, 0, 19, NULL, NULL, NULL, 'bai-viet', NULL, 21, '2018-11-07 21:30:38', '', '2018-11-07 21:30:38'),
(22, 'SHTT', 'shtt', '', NULL, 1, 0, 0, NULL, NULL, NULL, 'bai-viet', NULL, 22, '2018-11-07 21:31:20', '', '2018-11-07 21:31:20'),
(23, 'Dịch vụ sở hữu trí tuệ', 'dich-vu-so-huu-tri-tue', '', NULL, 1, 0, 22, NULL, NULL, NULL, 'bai-viet', NULL, 23, '2018-11-07 21:31:44', '', '2018-11-07 21:31:44'),
(24, 'Tư vấn sở hữu trí tuệ', 'tu-van-so-huu-tri-tue', '', NULL, 1, 0, 22, NULL, NULL, NULL, 'bai-viet', NULL, 24, '2018-11-07 21:31:59', '', '2018-11-07 21:31:59'),
(25, 'VBPL', 'vbpl', '', NULL, 1, 0, 0, NULL, NULL, NULL, 'bai-viet', NULL, 25, '2018-11-07 21:32:33', '', '2018-11-07 21:32:33'),
(26, 'lao dong x df', 'lao-dong-x-df', '', NULL, 1, 0, 16, NULL, NULL, NULL, 'bai-viet', 0, 26, '2018-11-14 02:38:04', '', '2018-11-14 02:38:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partner`
--

CREATE TABLE `partner` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci,
  `photo` text COLLATE utf8_unicode_ci,
  `desc` longtext COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `com` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `stt` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text CHARACTER SET utf8,
  `photo` text COLLATE utf8_unicode_ci,
  `noibat` int(2) DEFAULT '0',
  `status` int(11) NOT NULL,
  `lever` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `parent_id`, `stt`, `name`, `alias`, `mota`, `photo`, `noibat`, `status`, `lever`, `title`, `keyword`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Dân sự', 'dan-su', NULL, '', 0, 1, 0, NULL, NULL, NULL, '2018-11-12 07:36:15', '2018-11-12 00:36:15'),
(2, 0, NULL, 'Hình sự', 'hinh-su', NULL, '', 0, 1, 0, NULL, NULL, NULL, '2018-11-12 00:35:28', '2018-11-12 00:35:28'),
(3, 0, NULL, 'Hôn nhân', 'hon-nhan', NULL, '', 0, 1, 0, NULL, NULL, NULL, '2018-11-12 00:35:33', '2018-11-12 00:35:33'),
(4, 0, NULL, 'Doanh nghiệp', 'doanh-nghiep', NULL, '', 0, 1, 0, NULL, NULL, NULL, '2018-11-12 00:35:40', '2018-11-12 00:35:40'),
(5, 0, NULL, 'Đất đai', 'dat-dai', NULL, '', 0, 1, 0, NULL, NULL, NULL, '2018-11-12 00:35:49', '2018-11-12 00:35:49'),
(6, 0, NULL, 'Lao động', 'lao-dong', NULL, '', 0, 1, 0, NULL, NULL, NULL, '2018-11-12 00:35:56', '2018-11-12 00:35:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `province_name` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(11) UNSIGNED NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `name` text NOT NULL,
  `alias` text NOT NULL,
  `content` text NOT NULL,
  `status` int(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `member_id`, `admin_id`, `cate_id`, `name`, `alias`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 1, 'Câu hỏi test 1', 'cau-hoi-test-1', '<p>Nội dung c&acirc;u hỏi test 1</p>', 1, '2018-11-14 08:30:05', '2018-11-14 01:30:05'),
(2, 2, NULL, 1, 'Câu hỏi test 2', 'cau-hoi-test-2', '<p>Nội dung c&acirc;u hỏi test 2 abc</p>', 1, '2018-11-14 09:08:09', '2018-11-14 02:08:09'),
(3, 2, NULL, 2, 'ssss', 'ssss', '<p>sdf sdf</p>', 0, '2018-12-01 01:03:42', '2018-12-01 01:03:42'),
(4, 6, NULL, 1, 'tét image', 'tet-image', '<p>sd fs</p>', 1, '2018-12-07 09:50:34', '2018-12-07 02:50:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `title` text COLLATE utf8_unicode_ci,
  `company` text COLLATE utf8_unicode_ci,
  `website` text COLLATE utf8_unicode_ci,
  `address` text COLLATE utf8_unicode_ci,
  `phone` text COLLATE utf8_unicode_ci,
  `hotline` text COLLATE utf8_unicode_ci,
  `fax` text COLLATE utf8_unicode_ci,
  `email` text COLLATE utf8_unicode_ci,
  `photo` text COLLATE utf8_unicode_ci,
  `favico` text COLLATE utf8_unicode_ci,
  `title_index` text COLLATE utf8_unicode_ci,
  `mota` longtext COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `facebook` text COLLATE utf8_unicode_ci,
  `twitter` text COLLATE utf8_unicode_ci,
  `skype` text COLLATE utf8_unicode_ci,
  `google` text COLLATE utf8_unicode_ci,
  `youtube` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT '0',
  `toado` text COLLATE utf8_unicode_ci,
  `copyright` text COLLATE utf8_unicode_ci,
  `iframemap` text COLLATE utf8_unicode_ci,
  `codechat` longtext COLLATE utf8_unicode_ci,
  `analytics` longtext COLLATE utf8_unicode_ci,
  `keyword` longtext COLLATE utf8_unicode_ci,
  `description` longtext COLLATE utf8_unicode_ci,
  `number_view` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `name`, `title`, `company`, `website`, `address`, `phone`, `hotline`, `fax`, `email`, `photo`, `favico`, `title_index`, `mota`, `content`, `facebook`, `twitter`, `skype`, `google`, `youtube`, `status`, `toado`, `copyright`, `iframemap`, `codechat`, `analytics`, `keyword`, `description`, `number_view`, `created_at`, `updated_at`) VALUES
(1, 'Đức Tín', 'Đức Tín', 'Đức Tín', NULL, 'Số 31 ngõ 73, phố Nguyễn Lương Bằng, phường Nam Đồng, quận Đống Đa, Hà Nội', '0987654321', NULL, '<div class=\"title_company_name\" style=\"text-align: center;\"><strong>VĂN PH&Ograve;NG LUẬT ĐỨC T&Iacute;N</strong></div>\r\n<p style=\"text-align: center;\">Địa chỉ: Số 31 ng&otilde; 73, phố Nguyễn Lương Bằng, phường Nam Đồng, quận Đống Đa, H&agrave; Nội</p>\r\n<p style=\"text-align: center;\">Điện thoại:&nbsp;<span class=\"phone\">098 882 33 38</span>&nbsp;&nbsp;- Email:&nbsp;<a title=\"\">luatsuduclong@gmail.com</a></p>\r\n<p style=\"text-align: center;\">Chịu tr&aacute;ch nhiệm về nội dung: Luật sư Nguyễn Đức Long - Gi&aacute;m đốc điều h&agrave;nh</p>\r\n<p style=\"text-align: center;\"><a title=\"\">Ch&iacute;nh s&aacute;ch &amp; v&agrave; quy định chung</a>&nbsp;|&nbsp;<a title=\"\">Ch&iacute;nh s&aacute;ch bảo mật th&ocirc;ng tin</a></p>\r\n<h3 style=\"text-align: center;\">LUẬT SƯ TƯ VẤN PH&Aacute;P LUẬT TRỰC TUYẾN QUA ĐIỆN THOẠI - 098 882 33 38</h3>', 'chuonghoanghong@gmail.com', '1541650115_logo.png', '1541650115_logo.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.3892012719148!2d105.82722721432398!3d21.01710758600471!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab82655128d7%3A0x2dd2aba13aeba6d9!2zVsSDbiBQaMOybmcgTHXhuq10IFPGsCDEkOG7qWMgVMOtbg!5e0!3m2!1svi!2s!4v1541730221220\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', NULL, NULL, NULL, NULL, 7, '2018-12-12 08:39:36', '2018-12-01 00:16:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` text COLLATE utf8_unicode_ci,
  `link` text COLLATE utf8_unicode_ci,
  `photo` text COLLATE utf8_unicode_ci,
  `photo1` text CHARACTER SET utf8,
  `photo2` text CHARACTER SET utf8,
  `icon` text COLLATE utf8_unicode_ci,
  `mota` longtext COLLATE utf8_unicode_ci,
  `content` longtext COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `noibat` int(11) NOT NULL DEFAULT '0',
  `com` text COLLATE utf8_unicode_ci,
  `stt` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`id`, `user_id`, `name`, `link`, `photo`, `photo1`, `photo2`, `icon`, `mota`, `content`, `status`, `noibat`, `com`, `stt`, `created_at`, `updated_at`) VALUES
(1, 8, '1', NULL, '1538493354_a.png', '', '', NULL, NULL, NULL, 1, 0, 'gioi-thieu', 1, '2018-10-02 15:15:54', '2018-10-02 08:15:54'),
(2, 8, '2', NULL, '1538493364_a.png', '', '', NULL, NULL, NULL, 1, 0, 'gioi-thieu', 2, '2018-10-02 15:16:04', '2018-10-02 08:16:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slogan`
--

CREATE TABLE `slogan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `photo` text,
  `content` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `level` int(11) DEFAULT '2',
  `photo` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `phone`, `address`, `level`, `photo`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'admin', '$2y$10$Yd5tYn7HBT/jbSJQmHmo5ezBYuRVqzQSbOtYIHoUAsCgPa4Eb89ky', 'admin', 'admin@team.vn', NULL, NULL, 1, NULL, 1, 'xhGGs1aS8PzkBIZtCMBFG9ZqYlrnUa7rQQVt2dyJwRD8OuTNCfyPh9gXPaWU', '2018-11-13 03:36:13', '2018-06-27 06:57:22'),
(12, 'chuonghh', '$2y$10$S42DCDELsRPJPa18O1Iw8uYVgkN.kMg1TU8e35l8lqgcptLfWP64y', 'Hoàng Hồng Chương', 'admin@team.vn', '0987654321', 'Hà Nội', 2, 'public/uploads/admins/1542164681.jpg', 1, NULL, '2018-11-13 20:04:41', '2018-11-13 20:04:41');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `authorizations`
--
ALTER TABLE `authorizations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner_content`
--
ALTER TABLE `banner_content`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner_position`
--
ALTER TABLE `banner_position`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gioithieu`
--
ALTER TABLE `gioithieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `lienket`
--
ALTER TABLE `lienket`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slogan`
--
ALTER TABLE `slogan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `authorizations`
--
ALTER TABLE `authorizations`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `banner_content`
--
ALTER TABLE `banner_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `banner_position`
--
ALTER TABLE `banner_position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gioithieu`
--
ALTER TABLE `gioithieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lienket`
--
ALTER TABLE `lienket`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `slogan`
--
ALTER TABLE `slogan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
