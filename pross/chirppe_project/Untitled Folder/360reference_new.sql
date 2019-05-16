-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 30, 2018 at 05:16 PM
-- Server version: 5.6.35-1+deb.sury.org~xenial+0.1
-- PHP Version: 7.2.7-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `360reference_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `description`, `added_date`) VALUES
(1, 'Our Mission', '<p><strong>Exercitation ullamco laboris nisi ut aliquip ex ea</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.x</p>', '2018-03-22 01:32:38'),
(2, 'Our Vision', '<p><strong>Exercitation ullamco laboris nisi ut aliquip ex ea</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.x</p>', '2018-03-22 01:32:46'),
(3, 'Who We Are', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.x</p>', '2018-03-22 01:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_banner`
--

CREATE TABLE `about_us_banner` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_banner`
--

INSERT INTO `about_us_banner` (`id`, `title`, `description`, `banner_image`, `added_date`) VALUES
(1, 'Lorem ipsum dolor sit amet consectetur adipisicing', 'Lorem ipsum dolor sit amet consectetur adipisicing', 'crop_20180321102315.jpeg', '2018-03-21 04:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `banner_detail`
--

CREATE TABLE `banner_detail` (
  `banner_detail_id` int(10) UNSIGNED NOT NULL,
  `banner_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_type` enum('ABOUT','HOW IT WORKS','FAQ','CONTACT US','DISCLAIMER','PRIVACY POLICY','TERMS OF USE','INDIVIDUAL SIGNUP','COMPANY SIGNUP','NEWS_FEED','INVITE','JOBS','SIDEBAR') COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_detail`
--

INSERT INTO `banner_detail` (`banner_detail_id`, `banner_title`, `banner_image`, `banner_type`, `added_date`) VALUES
(1, 'See the value of busines', 'crop_20180818161330.jpeg', 'ABOUT', '2018-08-18 10:43:31'),
(2, 'How It Workss', 'crop_20180328061830.jpeg', 'HOW IT WORKS', '2018-03-28 00:48:35'),
(3, 'Frequently Asked Questions', 'crop_20180315135101.jpeg', 'FAQ', '2018-03-15 08:21:03'),
(4, 'Get in touch', 'crop_20180315134410.jpeg', 'CONTACT US', '2018-03-15 08:14:12'),
(5, 'Disclaimer', 'crop_20180319034944.jpeg', 'DISCLAIMER', '2018-03-18 22:19:45'),
(6, 'Privacy Policy', 'crop_20180319035150.jpeg', 'PRIVACY POLICY', '2018-03-18 22:21:51'),
(7, 'Terms of Use', 'crop_20180319035225.jpeg', 'TERMS OF USE', '2018-03-18 22:22:26'),
(8, 'Individual SignUp', 'crop_20180406101136.jpeg', 'INDIVIDUAL SIGNUP', '2018-04-06 04:41:38'),
(9, 'Company SignUp', 'crop_20180406101242.jpeg', 'COMPANY SIGNUP', '2018-04-06 04:42:44'),
(10, 'Newsfeeds', 'crop_20180406101242.jpeg', 'NEWS_FEED', '2018-04-06 04:42:44'),
(11, 'Invited', 'crop_20180426131113.jpeg', 'INVITE', '2018-05-19 15:26:32'),
(12, 'Sidebar', 'crop_20180816185258.png', 'SIDEBAR', '2018-08-16 13:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `chat_group_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_type` enum('text','attachment') COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen_status` enum('sending','sent','delivered','read','trashed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_receiver_status` enum('active','trashed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `delete_sender_status` enum('active','trashed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `chat_group_id`, `message`, `sender_id`, `receiver_id`, `message_type`, `seen_status`, `delete_receiver_status`, `delete_sender_status`, `created_at`, `updated_at`) VALUES
(1, 0, 'scdv', 35, 36, 'text', 'sent', 'active', 'active', '2018-05-18 13:21:31', '2018-05-18 13:21:31'),
(2, 0, 'hi', 35, 28, 'text', 'read', 'active', 'active', '2018-05-18 13:26:54', '2018-07-26 15:35:42'),
(3, 0, 'Hello', 28, 35, 'text', 'read', 'active', 'active', '2018-05-18 13:27:15', '2018-07-16 16:15:28'),
(4, 0, 'qwert', 35, 28, 'text', 'read', 'active', 'active', '2018-05-18 14:52:01', '2018-07-26 15:35:42'),
(5, 0, 'Hello', 32, 35, 'text', 'read', 'active', 'active', '2018-05-18 14:52:25', '2018-07-16 16:15:28'),
(6, 0, 'Message', 32, 35, 'text', 'read', 'active', 'active', '2018-05-18 14:52:29', '2018-07-16 16:15:28'),
(7, 0, 'ok', 28, 35, 'text', 'read', 'active', 'active', '2018-05-18 14:52:56', '2018-07-16 16:15:28'),
(8, 0, 'wde', 35, 28, 'text', 'read', 'active', 'active', '2018-05-18 15:01:18', '2018-07-26 15:35:42'),
(9, 0, 'hii', 28, 35, 'text', 'read', 'active', 'active', '2018-05-18 15:01:31', '2018-07-16 16:15:28'),
(10, 0, 'ok', 28, 35, 'text', 'read', 'active', 'active', '2018-05-18 15:02:09', '2018-07-16 16:15:28'),
(11, 0, 'ok', 28, 35, 'text', 'read', 'active', 'active', '2018-05-18 15:02:34', '2018-07-16 16:15:28'),
(12, 0, 'werf', 35, 28, 'text', 'read', 'active', 'active', '2018-05-18 15:02:40', '2018-07-26 15:35:42'),
(13, 0, 'ok', 32, 35, 'text', 'read', 'active', 'active', '2018-05-18 15:02:44', '2018-07-16 16:15:28'),
(14, 0, 'Hi', 34, 31, 'text', 'read', 'active', 'active', '2018-05-18 16:05:27', '2018-05-19 07:59:32'),
(15, 0, 'hello', 31, 34, 'text', 'read', 'active', 'active', '2018-05-18 16:05:51', '2018-05-18 16:05:51'),
(16, 0, 'hello Saurabh', 31, 33, 'text', 'read', 'active', 'active', '2018-05-18 16:07:05', '2018-05-19 14:51:43'),
(17, 0, 'how are you?', 31, 33, 'text', 'read', 'active', 'active', '2018-05-18 16:07:26', '2018-05-19 14:51:43'),
(18, 0, 'how are you doing?', 31, 33, 'text', 'read', 'active', 'active', '2018-05-18 16:07:45', '2018-05-19 14:51:43'),
(19, 0, 'keep smiling', 31, 33, 'text', 'read', 'active', 'active', '2018-05-18 16:07:50', '2018-05-19 14:51:43'),
(20, 0, 'don\'t do this', 31, 33, 'text', 'read', 'active', 'active', '2018-05-18 16:07:57', '2018-05-19 14:51:43'),
(21, 0, 'hello world', 31, 33, 'text', 'read', 'active', 'active', '2018-05-18 16:08:04', '2018-05-19 14:51:43'),
(22, 0, 'Hello World', 32, 33, 'text', 'read', 'active', 'active', '2018-05-18 16:09:04', '2018-05-19 14:51:43'),
(23, 0, 'nice to meet you!', 32, 33, 'text', 'read', 'active', 'active', '2018-05-18 16:09:19', '2018-05-19 14:51:43'),
(24, 0, 'I am glad', 33, 32, 'text', 'read', 'active', 'active', '2018-05-18 16:09:38', '2018-06-28 14:29:28'),
(25, 0, 'okay', 32, 33, 'text', 'read', 'active', 'active', '2018-05-18 16:10:11', '2018-05-19 14:51:43'),
(26, 0, 'net issue hai bahut', 33, 32, 'text', 'read', 'active', 'active', '2018-05-18 16:10:33', '2018-06-28 14:29:28'),
(27, 0, 'bht', 33, 32, 'text', 'read', 'active', 'active', '2018-05-18 16:10:49', '2018-06-28 14:29:28'),
(28, 0, 'ji', 33, 32, 'text', 'read', 'active', 'active', '2018-05-18 16:11:19', '2018-06-28 14:29:28'),
(29, 0, 'sir', 33, 32, 'text', 'read', 'active', 'active', '2018-05-18 16:11:22', '2018-06-28 14:29:28'),
(30, 0, 'hello', 32, 31, 'text', 'read', 'active', 'active', '2018-05-18 16:13:42', '2018-05-19 07:59:32'),
(31, 0, 'fghjk', 35, 28, 'text', 'read', 'active', 'active', '2018-05-19 07:48:10', '2018-07-26 15:35:42'),
(32, 0, 'Hiii', 35, 28, 'text', 'read', 'active', 'active', '2018-05-19 07:48:19', '2018-07-26 15:35:42'),
(33, 0, 'ghjk', 35, 28, 'text', 'read', 'active', 'active', '2018-05-19 07:49:06', '2018-07-26 15:35:42'),
(34, 0, 'dfgh', 28, 35, 'text', 'read', 'active', 'active', '2018-05-19 09:13:09', '2018-07-16 16:15:28'),
(35, 0, 'sdsd', 35, 28, 'text', 'read', 'active', 'active', '2018-05-19 11:15:04', '2018-07-26 15:35:42'),
(36, 0, 'Hello', 35, 32, 'text', 'read', 'active', 'active', '2018-05-19 13:13:40', '2018-06-28 14:29:28'),
(37, 0, 'hello world', 32, 33, 'text', 'read', 'active', 'active', '2018-05-19 14:50:27', '2018-05-19 14:51:43'),
(38, 0, ':)', 28, 35, 'text', 'read', 'active', 'active', '2018-07-14 13:23:52', '2018-07-16 16:15:28'),
(39, 0, 'hii', 35, 28, 'text', 'read', 'active', 'active', '2018-07-14 13:25:00', '2018-07-26 15:35:42'),
(40, 0, 'chat mene lagayi h', 28, 35, 'text', 'read', 'active', 'active', '2018-07-14 13:25:23', '2018-07-16 16:15:28'),
(41, 0, 'sdfddcdcsccsscc', 35, 28, 'text', 'read', 'active', 'active', '2018-07-14 13:26:03', '2018-07-26 15:35:42'),
(42, 0, 'sdfgh', 35, 28, 'text', 'read', 'active', 'active', '2018-07-14 13:26:50', '2018-07-26 15:35:42'),
(43, 0, 'sxcv', 35, 28, 'text', 'read', 'active', 'active', '2018-07-14 14:43:18', '2018-07-26 15:35:42'),
(44, 0, 'qwert', 35, 28, 'text', 'read', 'active', 'active', '2018-07-14 14:43:20', '2018-07-26 15:35:42'),
(45, 0, 'qwertyj', 35, 28, 'text', 'read', 'active', 'active', '2018-07-14 14:43:22', '2018-07-26 15:35:42'),
(46, 0, 'asdfg', 35, 28, 'text', 'read', 'active', 'active', '2018-07-14 14:43:23', '2018-07-26 15:35:42'),
(47, 0, 'qwerty', 28, 35, 'text', 'read', 'active', 'active', '2018-07-14 14:43:38', '2018-07-16 16:15:28'),
(48, 0, 'qasdas', 35, 28, 'text', 'read', 'active', 'active', '2018-07-14 14:44:35', '2018-07-26 15:35:42'),
(49, 0, 'asd', 35, 28, 'text', 'read', 'active', 'active', '2018-07-16 16:15:32', '2018-07-26 15:35:42'),
(50, 0, 'asdf', 35, 28, 'text', 'read', 'active', 'active', '2018-07-16 16:16:07', '2018-07-26 15:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `chat_group`
--

CREATE TABLE `chat_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_group_user`
--

CREATE TABLE `chat_group_user` (
  `chat_group_user_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `chat_group_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_status`
--

CREATE TABLE `chat_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_group_id` int(11) NOT NULL,
  `status` enum('sending','sent','delivered','read','trashed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_admins`
--

CREATE TABLE `company_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_user_id` int(10) UNSIGNED NOT NULL,
  `admin_user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_admins`
--

INSERT INTO `company_admins` (`id`, `company_user_id`, `admin_user_id`, `created_at`, `updated_at`) VALUES
(1, 33, 32, NULL, NULL),
(2, 33, 34, NULL, NULL),
(4, 30, 35, NULL, NULL),
(5, 11, 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `user_id`, `address`, `description`, `website`, `contact_number`, `contact_email`, `company_banner`, `company_logo`, `youtube_link`, `postal_code`, `created_at`, `updated_at`) VALUES
(14, 30, 'Lucknow', 'qwerty', 'www.abcd.com', '+91-123456789', 'qwert@auytre.cjhg', NULL, 'crop_20180608135637.jpeg', NULL, '226022', '2018-04-19 23:25:30', '2018-04-20 06:00:50'),
(15, 31, 'Enclave City - North Bridge', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'www.microsoft.com', '+65-7654321', 'info@microsoft.com', 'crop_20180420051417.jpeg', 'crop_20180420051332.jpeg', 'https://www.youtube.com/embed/EU7PRmCpx-0', '226025', '2018-04-19 23:27:11', '2018-05-08 08:39:46'),
(16, 33, 'Enclave City - North Bridge', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'www.hp.com', '+65-7654321', 'info@hp.com', NULL, 'crop_20180420130202.jpeg', 'https://www.youtube.com/embed/9h3Jo4rhRv4', '206025', '2018-04-20 00:03:45', '2018-05-07 10:12:32'),
(17, 38, '', '', '', '', NULL, NULL, NULL, NULL, '', '2018-04-24 07:09:31', NULL),
(18, 41, '', '', '', '', NULL, 'crop_20180519172831.jpeg', 'crop_20180519172750.jpeg', NULL, '', '2018-05-19 11:53:49', NULL),
(19, 42, '', '', '', '', NULL, NULL, '', NULL, '', '2018-07-12 11:57:42', NULL),
(20, 43, '', '', '', '', NULL, NULL, '', NULL, '', '2018-07-12 11:58:57', NULL),
(21, 44, '', '', '', '', NULL, NULL, '', NULL, '', '2018-07-12 12:32:12', NULL),
(22, 54, '', '', '', '', NULL, NULL, 'crop_20180726211712.jpeg', NULL, '', '2018-07-26 15:47:18', NULL),
(24, 23, '', '', '', '', NULL, NULL, '', NULL, '', '2018-08-27 09:58:15', NULL),
(25, 24, '', '', '', '', NULL, NULL, '', NULL, '', '2018-08-27 10:23:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `connected_to` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`id`, `user_id`, `connected_to`, `status`, `message`, `created_at`, `updated_at`) VALUES
(1, 18, 15, 'pending', 'Your invitation is on its way. You can add a note to personalize your invitation.', '2018-08-30 06:46:34', NULL),
(2, 18, 13, 'pending', 'Your invitation is on its way. You can add a note to personalize your invitation.', '2018-08-30 06:46:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_personnel`
--

CREATE TABLE `contact_personnel` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_personnel`
--

INSERT INTO `contact_personnel` (`id`, `name`, `designation`, `email`, `mobile`, `fax`, `skype`, `status`, `added_date`) VALUES
(1, 'Mr. Denstun D’suza', 'Cheif Technical Officer', 'denstundsuza234@gmail.com', '+65 23456754', '+65 23456754', 'denstun.dsuza', 'active', '2018-03-15 07:56:30'),
(5, 'Riya Malik', 'General Manager', 'riyamalik@gmail.com', '+65 23456752', '+65 23456752', 'riya.malik', 'active', '2018-03-15 13:27:53'),
(6, 'Nancy Francico', 'Software Engineer', 'nancyfrancico67@gmail.com', '+65 23456755', '+65 23456755', 'nancy.francico12', 'active', '2018-03-15 13:28:44'),
(7, 'Raveena Nigam', 'Senior Software Engineer', 'raveena@singsys.com', '+65 63110030', '65437890', 'raveena.singsys', 'active', '2018-03-22 07:36:51');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_us_id`, `name`, `email`, `message`, `contact_number`, `added_date`) VALUES
(1, 'Sushant', 'sushant@singsys.com', 'This is for testing.', '+91-9453680129', '2018-03-26 04:29:14'),
(2, 'Raveena Nigam', 'raveena@singsys.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '+91-87656789', '2018-03-26 12:13:09'),
(3, 'Raveena', 'raveena@singsys.com', 'This is testing description', '+91-09876543', '2018-04-17 12:15:40'),
(4, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+91-0987654', '2018-05-09 07:27:08'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-09876543', '2018-08-20 07:17:29'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-09876543', '2018-08-20 07:20:02'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-09876543', '2018-08-20 07:22:09'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-09876543', '2018-08-20 07:22:26'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-09876543', '2018-08-20 07:23:25'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-09876543', '2018-08-20 07:23:52'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-09876543', '2018-08-20 07:25:36'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-09876543', '2018-08-20 07:27:58'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-09876543', '2018-08-20 07:29:55'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-23456789', '2018-08-28 11:41:34'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'Hi Dropping msg for check through', '+65-23456789', '2018-08-28 11:56:44'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-12345678', '2018-08-28 12:08:34'),
(0, 'Raveena Nigam', 'raveena@singsys.com', 'This is testing description', '+65-12345678', '2018-08-28 12:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_reply`
--

CREATE TABLE `contact_us_reply` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_us_id` int(11) NOT NULL,
  `reply` int(11) NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us_reply`
--

INSERT INTO `contact_us_reply` (`id`, `contact_us_id`, `reply`, `added_date`) VALUES
(1, 1, 0, '2018-03-25 23:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calling_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`, `calling_code`, `status`, `added_date`) VALUES
(1, 'Afghanistan', '93', 'active', '2018-03-27 05:36:50'),
(2, 'Åland Islands', '358', 'active', '2018-03-15 02:14:50'),
(3, 'Albania', '355', 'active', '2018-03-15 02:14:50'),
(4, 'Algeria', '213', 'active', '2018-03-15 02:14:50'),
(5, 'American Samoa', '1684', 'active', '2018-03-15 02:14:50'),
(6, 'Andorra', '376', 'active', '2018-03-15 02:14:50'),
(7, 'Angola', '244', 'active', '2018-03-15 02:14:50'),
(8, 'Anguilla', '1264', 'active', '2018-03-15 02:14:50'),
(9, 'Antigua and Barbuda', '1268', 'active', '2018-03-15 02:14:50'),
(10, 'Argentina', '54', 'active', '2018-03-15 02:14:50'),
(11, 'Armenia', '374', 'active', '2018-03-15 02:14:50'),
(12, 'Aruba', '297', 'active', '2018-03-15 02:14:50'),
(13, 'Australia', '61', 'active', '2018-03-15 02:14:50'),
(14, 'Austria', '43', 'active', '2018-03-15 02:14:50'),
(15, 'Azerbaijan', '994', 'active', '2018-03-15 02:14:50'),
(16, 'The Bahamas', '1242', 'active', '2018-03-15 02:14:50'),
(17, 'Bahrain', '973', 'active', '2018-03-15 02:14:50'),
(18, 'Bangladesh', '880', 'active', '2018-03-15 02:14:50'),
(19, 'Barbados', '1246', 'active', '2018-03-15 02:14:50'),
(20, 'Belarus', '375', 'active', '2018-03-15 02:14:50'),
(21, 'Belgium', '32', 'active', '2018-03-15 02:14:50'),
(22, 'Belize', '501', 'active', '2018-03-15 02:14:50'),
(23, 'Benin', '229', 'active', '2018-03-15 02:14:50'),
(24, 'Bermuda', '1441', 'active', '2018-03-15 02:14:50'),
(25, 'Bhutan', '975', 'active', '2018-03-15 02:14:50'),
(26, 'Bolivia', '591', 'active', '2018-03-15 02:14:50'),
(27, 'Bonaire', '5997', 'active', '2018-03-15 02:14:50'),
(28, 'Bosnia and Herzegovina', '387', 'active', '2018-03-15 02:14:50'),
(29, 'Botswana', '267', 'active', '2018-03-15 02:14:50'),
(30, 'Brazil', '55', 'active', '2018-03-15 02:14:50'),
(31, 'British Indian Ocean Territory', '246', 'active', '2018-03-15 02:14:50'),
(32, 'Virgin Islands (British)', '1284', 'active', '2018-03-15 02:14:50'),
(33, 'Virgin Islands (U.S.)', '1 340', 'active', '2018-03-15 02:14:50'),
(34, 'Brunei', '673', 'active', '2018-03-15 02:14:50'),
(35, 'Bulgaria', '359', 'active', '2018-03-15 02:14:50'),
(36, 'Burkina Faso', '226', 'active', '2018-03-15 02:14:50'),
(37, 'Burundi', '257', 'active', '2018-03-15 02:14:50'),
(38, 'Cambodia', '855', 'active', '2018-03-15 02:14:50'),
(39, 'Cameroon', '237', 'active', '2018-03-15 02:14:50'),
(40, 'Canada', '1', 'active', '2018-03-15 02:14:50'),
(41, 'Cape Verde', '238', 'active', '2018-03-15 02:14:50'),
(42, 'Cayman Islands', '1345', 'active', '2018-03-15 02:14:50'),
(43, 'Central African Republic', '236', 'active', '2018-03-15 02:14:50'),
(44, 'Chad', '235', 'active', '2018-03-15 02:14:50'),
(45, 'Chile', '56', 'active', '2018-03-15 02:14:50'),
(46, 'China', '86', 'active', '2018-03-15 02:14:50'),
(47, 'Christmas Island', '61', 'active', '2018-03-15 02:14:50'),
(48, 'Cocos (Keeling) Islands', '61', 'active', '2018-03-15 02:14:50'),
(49, 'Colombia', '57', 'active', '2018-03-15 02:14:50'),
(50, 'Comoros', '269', 'active', '2018-03-15 02:14:50'),
(51, 'Republic of the Congo', '242', 'active', '2018-03-15 02:14:50'),
(52, 'Democratic Republic of the Congo', '243', 'active', '2018-03-15 02:14:50'),
(53, 'Cook Islands', '682', 'active', '2018-03-15 02:14:50'),
(54, 'Costa Rica', '506', 'active', '2018-03-15 02:14:50'),
(55, 'Croatia', '385', 'active', '2018-03-15 02:14:50'),
(56, 'Cuba', '53', 'active', '2018-03-15 02:14:50'),
(57, 'Curaçao', '599', 'active', '2018-03-15 02:14:50'),
(58, 'Cyprus', '357', 'active', '2018-03-15 02:14:50'),
(59, 'Czech Republic', '420', 'active', '2018-03-15 02:14:50'),
(60, 'Denmark', '45', 'active', '2018-03-15 02:14:50'),
(61, 'Djibouti', '253', 'active', '2018-03-15 02:14:50'),
(62, 'Dominica', '1767', 'active', '2018-03-15 02:14:50'),
(63, 'Dominican Republic', '1809', 'active', '2018-03-15 02:14:50'),
(64, 'Ecuador', '593', 'active', '2018-03-15 02:14:50'),
(65, 'Egypt', '20', 'active', '2018-03-15 02:14:50'),
(66, 'El Salvador', '503', 'active', '2018-03-15 02:14:50'),
(67, 'Equatorial Guinea', '240', 'active', '2018-03-15 02:14:50'),
(68, 'Eritrea', '291', 'active', '2018-03-15 02:14:50'),
(69, 'Estonia', '372', 'active', '2018-03-15 02:14:50'),
(70, 'Ethiopia', '251', 'active', '2018-03-15 02:14:50'),
(71, 'Falkland Islands', '500', 'active', '2018-03-15 02:14:50'),
(72, 'Faroe Islands', '298', 'active', '2018-03-15 02:14:50'),
(73, 'Fiji', '679', 'active', '2018-03-15 02:14:50'),
(74, 'Finland', '358', 'active', '2018-03-15 02:14:50'),
(75, 'France', '33', 'active', '2018-03-15 02:14:50'),
(76, 'French Guiana', '594', 'active', '2018-03-15 02:14:50'),
(77, 'French Polynesia', '689', 'active', '2018-03-15 02:14:50'),
(78, 'Gabon', '241', 'active', '2018-03-15 02:14:50'),
(79, 'The Gambia', '220', 'active', '2018-03-15 02:14:50'),
(80, 'Georgia', '995', 'active', '2018-03-15 02:14:50'),
(81, 'Germany', '49', 'active', '2018-03-15 02:14:50'),
(82, 'Ghana', '233', 'active', '2018-03-15 02:14:50'),
(83, 'Gibraltar', '350', 'active', '2018-03-15 02:14:50'),
(84, 'Greece', '30', 'active', '2018-03-15 02:14:50'),
(85, 'Greenland', '299', 'active', '2018-03-15 02:14:50'),
(86, 'Grenada', '1473', 'active', '2018-03-15 02:14:50'),
(87, 'Guadeloupe', '590', 'active', '2018-03-15 02:14:50'),
(88, 'Guam', '1671', 'active', '2018-03-15 02:14:50'),
(89, 'Guatemala', '502', 'active', '2018-03-15 02:14:50'),
(90, 'Guernsey', '44', 'active', '2018-03-15 02:14:50'),
(91, 'Guinea', '224', 'active', '2018-03-15 02:14:50'),
(92, 'Guinea-Bissau', '245', 'active', '2018-03-15 02:14:50'),
(93, 'Guyana', '592', 'active', '2018-03-15 02:14:50'),
(94, 'Haiti', '509', 'active', '2018-03-15 02:14:50'),
(95, 'Holy See', '379', 'active', '2018-03-15 02:14:50'),
(96, 'Honduras', '504', 'active', '2018-03-15 02:14:50'),
(97, 'Hong Kong', '852', 'active', '2018-03-15 02:14:50'),
(98, 'Hungary', '36', 'active', '2018-03-15 02:14:50'),
(99, 'Iceland', '354', 'active', '2018-03-15 02:14:50'),
(100, 'India', '91', 'active', '2018-03-15 02:14:50'),
(101, 'Indonesia', '62', 'active', '2018-03-15 02:14:50'),
(102, 'Ivory Coast', '225', 'active', '2018-03-15 02:14:50'),
(103, 'Iran', '98', 'active', '2018-03-15 02:14:50'),
(104, 'Iraq', '964', 'active', '2018-03-15 02:14:50'),
(105, 'Republic of Ireland', '353', 'active', '2018-03-15 02:14:50'),
(106, 'Isle of Man', '44', 'active', '2018-03-15 02:14:50'),
(107, 'Israel', '972', 'active', '2018-03-15 02:14:50'),
(108, 'Italy', '39', 'active', '2018-03-15 02:14:50'),
(109, 'Jamaica', '1876', 'active', '2018-03-15 02:14:50'),
(110, 'Japan', '81', 'active', '2018-03-15 02:14:50'),
(111, 'Jersey', '44', 'active', '2018-03-15 02:14:50'),
(112, 'Jordan', '962', 'active', '2018-03-15 02:14:50'),
(113, 'Kazakhstan', '76', 'active', '2018-03-15 02:14:50'),
(114, 'Kenya', '254', 'active', '2018-03-15 02:14:50'),
(115, 'Kiribati', '686', 'active', '2018-03-15 02:14:50'),
(116, 'Kuwait', '965', 'active', '2018-03-15 02:14:50'),
(117, 'Kyrgyzstan', '996', 'active', '2018-03-15 02:14:50'),
(118, 'Laos', '856', 'active', '2018-03-15 02:14:50'),
(119, 'Latvia', '371', 'active', '2018-03-15 02:14:50'),
(120, 'Lebanon', '961', 'active', '2018-03-15 02:14:50'),
(121, 'Lesotho', '266', 'active', '2018-03-15 02:14:50'),
(122, 'Liberia', '231', 'active', '2018-03-15 02:14:50'),
(123, 'Libya', '218', 'active', '2018-03-15 02:14:50'),
(124, 'Liechtenstein', '423', 'active', '2018-03-15 02:14:50'),
(125, 'Lithuania', '370', 'active', '2018-03-15 02:14:50'),
(126, 'Luxembourg', '352', 'active', '2018-03-15 02:14:50'),
(127, 'Macau', '853', 'active', '2018-03-15 02:14:50'),
(128, 'Republic of Macedonia', '389', 'active', '2018-03-15 02:14:50'),
(129, 'Madagascar', '261', 'active', '2018-03-15 02:14:50'),
(130, 'Malawi', '265', 'active', '2018-03-15 02:14:50'),
(131, 'Malaysia', '60', 'active', '2018-03-15 02:14:50'),
(132, 'Maldives', '960', 'active', '2018-03-15 02:14:50'),
(133, 'Mali', '223', 'active', '2018-03-15 02:14:50'),
(134, 'Malta', '356', 'active', '2018-03-15 02:14:50'),
(135, 'Marshall Islands', '692', 'active', '2018-03-15 02:14:50'),
(136, 'Martinique', '596', 'active', '2018-03-15 02:14:50'),
(137, 'Mauritania', '222', 'active', '2018-03-15 02:14:50'),
(138, 'Mauritius', '230', 'active', '2018-03-15 02:14:50'),
(139, 'Mayotte', '262', 'active', '2018-03-15 02:14:50'),
(140, 'Mexico', '52', 'active', '2018-03-15 02:14:50'),
(141, 'Federated States of Micronesia', '691', 'active', '2018-03-15 02:14:50'),
(142, 'Moldova', '373', 'active', '2018-03-15 02:14:50'),
(143, 'Monaco', '377', 'active', '2018-03-15 02:14:50'),
(144, 'Mongolia', '976', 'active', '2018-03-15 02:14:50'),
(145, 'Montenegro', '382', 'active', '2018-03-15 02:14:50'),
(146, 'Montserrat', '1664', 'active', '2018-03-15 02:14:50'),
(147, 'Morocco', '212', 'active', '2018-03-15 02:14:50'),
(148, 'Mozambique', '258', 'active', '2018-03-15 02:14:50'),
(149, 'Myanmar', '95', 'active', '2018-03-15 02:14:50'),
(150, 'Namibia', '264', 'active', '2018-03-15 02:14:50'),
(151, 'Nauru', '674', 'active', '2018-03-15 02:14:50'),
(152, 'Nepal', '977', 'active', '2018-03-15 02:14:50'),
(153, 'Netherlands', '31', 'active', '2018-03-15 02:14:50'),
(154, 'New Caledonia', '687', 'active', '2018-03-15 02:14:50'),
(155, 'New Zealand', '64', 'active', '2018-03-15 02:14:50'),
(156, 'Nicaragua', '505', 'active', '2018-03-15 02:14:50'),
(157, 'Niger', '227', 'active', '2018-03-15 02:14:50'),
(158, 'Nigeria', '234', 'active', '2018-03-15 02:14:50'),
(159, 'Niue', '683', 'active', '2018-03-15 02:14:50'),
(160, 'Norfolk Island', '672', 'active', '2018-03-15 02:14:50'),
(161, 'North Korea', '850', 'active', '2018-03-15 02:14:50'),
(162, 'Northern Mariana Islands', '1670', 'active', '2018-03-15 02:14:50'),
(163, 'Norway', '47', 'active', '2018-03-15 02:14:50'),
(164, 'Oman', '968', 'active', '2018-03-15 02:14:50'),
(165, 'Pakistan', '92', 'active', '2018-03-15 02:14:50'),
(166, 'Palau', '680', 'active', '2018-03-15 02:14:50'),
(167, 'Palestine', '970', 'active', '2018-03-15 02:14:50'),
(168, 'Panama', '507', 'active', '2018-03-15 02:14:50'),
(169, 'Papua New Guinea', '675', 'active', '2018-03-15 02:14:50'),
(170, 'Paraguay', '595', 'active', '2018-03-15 02:14:50'),
(171, 'Peru', '51', 'active', '2018-03-15 02:14:50'),
(172, 'Philippines', '63', 'active', '2018-03-15 02:14:50'),
(173, 'Pitcairn Islands', '64', 'active', '2018-03-15 02:14:50'),
(174, 'Poland', '48', 'active', '2018-03-15 02:14:50'),
(175, 'Portugal', '351', 'active', '2018-03-15 02:14:50'),
(176, 'Puerto Rico', '1787', 'active', '2018-03-15 02:14:50'),
(177, 'Qatar', '974', 'active', '2018-03-15 02:14:50'),
(178, 'Republic of Kosovo', '383', 'active', '2018-03-15 02:14:50'),
(179, 'Réunion', '262', 'active', '2018-03-15 02:14:50'),
(180, 'Romania', '40', 'active', '2018-03-15 02:14:50'),
(181, 'Russia', '7', 'active', '2018-03-15 02:14:50'),
(182, 'Rwanda', '250', 'active', '2018-03-15 02:14:50'),
(183, 'Saint Barthélemy', '590', 'active', '2018-03-15 02:14:50'),
(184, 'Saint Helena', '290', 'active', '2018-03-15 02:14:50'),
(185, 'Saint Kitts and Nevis', '1869', 'active', '2018-03-15 02:14:50'),
(186, 'Saint Lucia', '1758', 'active', '2018-03-15 02:14:50'),
(187, 'Saint Martin', '590', 'active', '2018-03-15 02:14:50'),
(188, 'Saint Pierre and Miquelon', '508', 'active', '2018-03-15 02:14:50'),
(189, 'Saint Vincent and the Grenadines', '1784', 'active', '2018-03-15 02:14:50'),
(190, 'Samoa', '685', 'active', '2018-03-15 02:14:50'),
(191, 'San Marino', '378', 'active', '2018-03-15 02:14:50'),
(192, 'São Tomé and Príncipe', '239', 'active', '2018-03-15 02:14:50'),
(193, 'Saudi Arabia', '966', 'active', '2018-03-15 02:14:50'),
(194, 'Senegal', '221', 'active', '2018-03-15 02:14:50'),
(195, 'Serbia', '381', 'active', '2018-03-15 02:14:50'),
(196, 'Seychelles', '248', 'active', '2018-03-15 02:14:50'),
(197, 'Sierra Leone', '232', 'active', '2018-03-15 02:14:50'),
(198, 'Singapore', '65', 'active', '2018-03-15 02:14:50'),
(199, 'Sint Maarten', '1721', 'active', '2018-03-15 02:14:50'),
(200, 'Slovakia', '421', 'active', '2018-03-15 02:14:50'),
(201, 'Slovenia', '386', 'active', '2018-03-15 02:14:50'),
(202, 'Solomon Islands', '677', 'active', '2018-03-15 02:14:50'),
(203, 'Somalia', '252', 'active', '2018-03-15 02:14:50'),
(204, 'South Africa', '27', 'active', '2018-03-15 02:14:50'),
(205, 'South Georgia', '500', 'active', '2018-03-15 02:14:50'),
(206, 'South Korea', '82', 'active', '2018-03-15 02:14:50'),
(207, 'South Sudan', '211', 'active', '2018-03-15 02:14:50'),
(208, 'Spain', '34', 'active', '2018-03-15 02:14:50'),
(209, 'Sri Lanka', '94', 'active', '2018-03-15 02:14:50'),
(210, 'Sudan', '249', 'active', '2018-03-15 02:14:50'),
(211, 'Suriname', '597', 'active', '2018-03-15 02:14:50'),
(212, 'Svalbard and Jan Mayen', '4779', 'active', '2018-03-15 02:14:50'),
(213, 'Swaziland', '268', 'active', '2018-03-15 02:14:50'),
(214, 'Sweden', '46', 'active', '2018-03-15 02:14:50'),
(215, 'Switzerland', '41', 'active', '2018-03-15 02:14:50'),
(216, 'Syria', '963', 'active', '2018-03-15 02:14:50'),
(217, 'Taiwan', '886', 'active', '2018-03-15 02:14:50'),
(218, 'Tajikistan', '992', 'active', '2018-03-15 02:14:50'),
(219, 'Tanzania', '255', 'active', '2018-03-15 02:14:50'),
(220, 'Thailand', '66', 'active', '2018-03-15 02:14:50'),
(221, 'East Timor', '670', 'active', '2018-03-15 02:14:50'),
(222, 'Togo', '228', 'active', '2018-03-15 02:14:50'),
(223, 'Tokelau', '690', 'active', '2018-03-15 02:14:50'),
(224, 'Tonga', '676', 'active', '2018-03-15 02:14:50'),
(225, 'Trinidad and Tobago', '1868', 'active', '2018-03-15 02:14:50'),
(226, 'Tunisia', '216', 'active', '2018-03-15 02:14:50'),
(227, 'Turkey', '90', 'active', '2018-03-15 02:14:50'),
(228, 'Turkmenistan', '993', 'active', '2018-03-15 02:14:50'),
(229, 'Turks and Caicos Islands', '1649', 'active', '2018-03-15 02:14:50'),
(230, 'Tuvalu', '688', 'active', '2018-03-15 02:14:50'),
(231, 'Uganda', '256', 'active', '2018-03-15 02:14:50'),
(232, 'Ukraine', '380', 'active', '2018-03-15 02:14:50'),
(233, 'United Arab Emirates', '971', 'active', '2018-03-15 02:14:50'),
(234, 'United Kingdom', '44', 'active', '2018-03-15 02:14:50'),
(235, 'United States', '1', 'active', '2018-03-15 02:14:50'),
(236, 'Uruguay', '598', 'active', '2018-03-15 02:14:50'),
(237, 'Uzbekistan', '998', 'active', '2018-03-15 02:14:50'),
(238, 'Vanuatu', '678', 'active', '2018-03-15 02:14:50'),
(239, 'Venezuela', '58', 'active', '2018-03-15 02:14:50'),
(240, 'Vietnam', '84', 'active', '2018-03-15 02:14:50'),
(241, 'Wallis and Futuna', '681', 'active', '2018-03-15 02:14:50'),
(242, 'Western Sahara', '212', 'active', '2018-03-15 02:14:50'),
(243, 'Yemen', '967', 'active', '2018-03-15 02:14:50'),
(244, 'Zambia', '260', 'active', '2018-03-15 02:14:50'),
(245, 'Zimbabwe', '263', 'active', '2018-03-15 02:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `credit_transaction_detail`
--

CREATE TABLE `credit_transaction_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_type` enum('stripe','awarded') COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_response` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credit_transaction_detail`
--

INSERT INTO `credit_transaction_detail` (`id`, `user_id`, `transaction_id`, `transaction_type`, `credit`, `amount`, `status`, `currency`, `billing`, `message`, `stripe_response`, `created_at`, `updated_at`) VALUES
(3, 30, 'ch_1CpEfMAbBGmUqZdolPu4u49B', 'stripe', 0, '10.00', 'succeeded', 'usd', 'ch_1CpEfMAbBGmUqZdolPu4u49B', 'succeeded', '{\"id\":\"ch_1CpEfMAbBGmUqZdolPu4u49B\",\"object\":\"charge\",\"amount\":1000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CpEfMAbBGmUqZdowD1GevxB\",\"captured\":true,\"created\":1531916520,\"currency\":\"usd\",\"customer\":\"cus_DFk98jOj8Gb0XA\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CpEfMAbBGmUqZdolPu4u49B\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CpEf8AbBGmUqZdoGeyr5yjp\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DFk98jOj8Gb0XA\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2023,\"fingerprint\":\"YVXZbVAFYWQUOuml\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"preetisingh@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-07-18 14:53:06', NULL),
(4, 30, 'ch_1CpEiWAbBGmUqZdoDHpVEOdZ', 'stripe', 0, '10.00', 'succeeded', 'usd', 'ch_1CpEiWAbBGmUqZdoDHpVEOdZ', 'succeeded', '{\"id\":\"ch_1CpEiWAbBGmUqZdoDHpVEOdZ\",\"object\":\"charge\",\"amount\":1000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CpEiWAbBGmUqZdounIoPZ4Y\",\"captured\":true,\"created\":1531916716,\"currency\":\"usd\",\"customer\":\"cus_DFkCKyDVU4jdMm\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CpEiWAbBGmUqZdoDHpVEOdZ\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CpEiHAbBGmUqZdoechhe9E6\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DFkCKyDVU4jdMm\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":3,\"exp_year\":2023,\"fingerprint\":\"YVXZbVAFYWQUOuml\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"preetisingh@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-07-18 14:56:22', NULL),
(5, 54, 'ch_1Cs9RbAbBGmUqZdoauPA8eSR', 'stripe', 0, '200.00', 'succeeded', 'usd', 'ch_1Cs9RbAbBGmUqZdoauPA8eSR', 'succeeded', '{\"id\":\"ch_1Cs9RbAbBGmUqZdoauPA8eSR\",\"object\":\"charge\",\"amount\":20000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1Cs9RbAbBGmUqZdo5cAWUtxo\",\"captured\":true,\"created\":1532611431,\"currency\":\"usd\",\"customer\":\"cus_DIkxyFkiPhEHHX\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1Cs9RbAbBGmUqZdoauPA8eSR\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Cs9RTAbBGmUqZdohyFG2PUr\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DIkxyFkiPhEHHX\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":10,\"exp_year\":2025,\"fingerprint\":\"YVXZbVAFYWQUOuml\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"raveena+paid@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-07-26 15:55:06', NULL),
(6, 30, 'ch_1CsMyYAbBGmUqZdo8Lk6HSkE', 'stripe', 0, '100.00', 'succeeded', 'usd', 'ch_1CsMyYAbBGmUqZdo8Lk6HSkE', 'succeeded', '{\"id\":\"ch_1CsMyYAbBGmUqZdo8Lk6HSkE\",\"object\":\"charge\",\"amount\":10000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CsMyYAbBGmUqZdot9oXFeYr\",\"captured\":true,\"created\":1532663446,\"currency\":\"usd\",\"customer\":\"cus_DIywRbJOuOKgVE\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CsMyYAbBGmUqZdo8Lk6HSkE\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CsMyLAbBGmUqZdoGSa3xVQC\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DIywRbJOuOKgVE\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2023,\"fingerprint\":\"YVXZbVAFYWQUOuml\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"preetisingh+company@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-07-27 06:22:02', NULL),
(7, 30, 'ch_1CsNdQAbBGmUqZdoKcmgHx2F', 'stripe', 0, '150.00', 'succeeded', 'usd', 'ch_1CsNdQAbBGmUqZdoKcmgHx2F', 'succeeded', '{\"id\":\"ch_1CsNdQAbBGmUqZdoKcmgHx2F\",\"object\":\"charge\",\"amount\":15000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CsNdQAbBGmUqZdoLXtIeQ6k\",\"captured\":true,\"created\":1532665980,\"currency\":\"usd\",\"customer\":\"cus_DIzcex1G6tarZ2\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CsNdQAbBGmUqZdoKcmgHx2F\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CsNdDAbBGmUqZdof0txHQpB\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DIzcex1G6tarZ2\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2023,\"fingerprint\":\"YVXZbVAFYWQUOuml\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"preetisingh@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-07-27 07:04:16', NULL),
(8, 54, 'ch_1CtuPFAbBGmUqZdolxNnsyYu', 'stripe', 0, '50.00', 'succeeded', 'usd', 'ch_1CtuPFAbBGmUqZdolxNnsyYu', 'succeeded', '{\"id\":\"ch_1CtuPFAbBGmUqZdolxNnsyYu\",\"object\":\"charge\",\"amount\":5000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CtuPGAbBGmUqZdosK81wDmi\",\"captured\":true,\"created\":1533030281,\"currency\":\"usd\",\"customer\":\"cus_DKZYesHE6JCwXb\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CtuPFAbBGmUqZdolxNnsyYu\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CtuP2AbBGmUqZdoTO6Sn9td\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DKZYesHE6JCwXb\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":10,\"exp_year\":2023,\"fingerprint\":\"kNvYrWGkc5mrgSvS\",\"funding\":\"unknown\",\"last4\":\"1111\",\"metadata\":[],\"name\":\"raveena+paid@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-07-31 12:16:01', NULL),
(9, 30, 'ch_1CuGVGAbBGmUqZdozGjOPtAE', 'stripe', 0, '100.00', 'succeeded', 'usd', 'ch_1CuGVGAbBGmUqZdozGjOPtAE', 'succeeded', '{\"id\":\"ch_1CuGVGAbBGmUqZdozGjOPtAE\",\"object\":\"charge\",\"amount\":10000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CuGVGAbBGmUqZdoZEXVvWwy\",\"captured\":true,\"created\":1533115222,\"currency\":\"usd\",\"customer\":\"cus_DKwOaQ3izdm0Kh\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CuGVGAbBGmUqZdozGjOPtAE\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CuGV3AbBGmUqZdoJmRFc2ff\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DKwOaQ3izdm0Kh\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2023,\"fingerprint\":\"YVXZbVAFYWQUOuml\",\"funding\":\"credit\",\"last4\":\"4242\",\"metadata\":[],\"name\":\"preetisingh+company@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-08-01 11:51:44', NULL),
(10, 54, 'ch_1CuHYFAbBGmUqZdouGN7bXI2', 'stripe', 0, '100.00', 'succeeded', 'usd', 'ch_1CuHYFAbBGmUqZdouGN7bXI2', 'succeeded', '{\"id\":\"ch_1CuHYFAbBGmUqZdouGN7bXI2\",\"object\":\"charge\",\"amount\":10000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CuHYGAbBGmUqZdo1HTlH6aY\",\"captured\":true,\"created\":1533119251,\"currency\":\"usd\",\"customer\":\"cus_DKxTlYArIC01zY\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CuHYFAbBGmUqZdouGN7bXI2\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CuHY7AbBGmUqZdobEPJ3BXZ\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DKxTlYArIC01zY\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":10,\"exp_year\":2022,\"fingerprint\":\"kNvYrWGkc5mrgSvS\",\"funding\":\"unknown\",\"last4\":\"1111\",\"metadata\":[],\"name\":\"raveena@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-08-01 12:58:53', NULL),
(11, 31, 'ch_1Cuc1XAbBGmUqZdovYaQPnw2', 'stripe', 10, '50.00', 'succeeded', 'usd', 'ch_1Cuc1XAbBGmUqZdovYaQPnw2', 'succeeded', '{\"id\":\"ch_1Cuc1XAbBGmUqZdovYaQPnw2\",\"object\":\"charge\",\"amount\":5000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1Cuc1XAbBGmUqZdolMQXbbT9\",\"captured\":true,\"created\":1533197947,\"currency\":\"usd\",\"customer\":\"cus_DLIczveXdxDHZx\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1Cuc1XAbBGmUqZdovYaQPnw2\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Cuc1KAbBGmUqZdo0oyOyPIr\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DLIczveXdxDHZx\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":10,\"exp_year\":2025,\"fingerprint\":\"kNvYrWGkc5mrgSvS\",\"funding\":\"unknown\",\"last4\":\"1111\",\"metadata\":[],\"name\":\"raveena@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-08-02 10:50:29', NULL),
(12, 31, 'ch_1Cuc2SAbBGmUqZdouJmz55kz', 'stripe', 10, '20.00', 'succeeded', 'usd', 'ch_1Cuc2SAbBGmUqZdouJmz55kz', 'succeeded', '{\"id\":\"ch_1Cuc2SAbBGmUqZdouJmz55kz\",\"object\":\"charge\",\"amount\":2000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1Cuc2SAbBGmUqZdoYRMrhBRC\",\"captured\":true,\"created\":1533198004,\"currency\":\"usd\",\"customer\":\"cus_DLIdDLXoXVtqCt\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1Cuc2SAbBGmUqZdouJmz55kz\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1Cuc2JAbBGmUqZdotcL27Exv\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DLIdDLXoXVtqCt\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":10,\"exp_year\":2025,\"fingerprint\":\"kNvYrWGkc5mrgSvS\",\"funding\":\"unknown\",\"last4\":\"1111\",\"metadata\":[],\"name\":\"raveena@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-08-02 10:51:26', NULL),
(13, 31, 'ch_1CwS6PAbBGmUqZdoycXQFHPP', 'stripe', 5, '10.00', 'succeeded', 'usd', 'ch_1CwS6PAbBGmUqZdoycXQFHPP', 'succeeded', '{\"id\":\"ch_1CwS6PAbBGmUqZdoycXQFHPP\",\"object\":\"charge\",\"amount\":1000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CwS6PAbBGmUqZdo3PODT9b6\",\"captured\":true,\"created\":1533636465,\"currency\":\"usd\",\"customer\":\"cus_DNCVbNrEs2LlpQ\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CwS6PAbBGmUqZdoycXQFHPP\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CwS6GAbBGmUqZdojMCHtZNJ\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DNCVbNrEs2LlpQ\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":10,\"exp_year\":2022,\"fingerprint\":\"kNvYrWGkc5mrgSvS\",\"funding\":\"unknown\",\"last4\":\"1111\",\"metadata\":[],\"name\":\"raveena@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-08-07 12:37:46', NULL),
(14, 31, 'ch_1CxBH8AbBGmUqZdour84gbAA', 'stripe', 100, '200.00', 'succeeded', 'usd', 'ch_1CxBH8AbBGmUqZdour84gbAA', 'succeeded', '{\"id\":\"ch_1CxBH8AbBGmUqZdour84gbAA\",\"object\":\"charge\",\"amount\":20000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CxBH9AbBGmUqZdoTTCTaXuc\",\"captured\":true,\"created\":1533810110,\"currency\":\"usd\",\"customer\":\"cus_DNxB06iawQH5Mr\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CxBH8AbBGmUqZdour84gbAA\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CxBH1AbBGmUqZdoCnYWybR6\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DNxB06iawQH5Mr\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":10,\"exp_year\":2025,\"fingerprint\":\"kNvYrWGkc5mrgSvS\",\"funding\":\"unknown\",\"last4\":\"1111\",\"metadata\":[],\"name\":\"raveena@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-08-09 12:51:51', NULL),
(15, 34, 'ch_1CxvSIAbBGmUqZdo6HpObeLL', 'stripe', 10000, '20000.00', 'succeeded', 'usd', 'ch_1CxvSIAbBGmUqZdo6HpObeLL', 'succeeded', '{\"id\":\"ch_1CxvSIAbBGmUqZdo6HpObeLL\",\"object\":\"charge\",\"amount\":2000000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1CxvSIAbBGmUqZdoC0tsWIw7\",\"captured\":true,\"created\":1533987626,\"currency\":\"usd\",\"customer\":\"cus_DOius9JCWmBHpd\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1CxvSIAbBGmUqZdo6HpObeLL\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1CxvSAAbBGmUqZdoY02YJuMy\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DOius9JCWmBHpd\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":2,\"exp_year\":2030,\"fingerprint\":\"kNvYrWGkc5mrgSvS\",\"funding\":\"unknown\",\"last4\":\"1111\",\"metadata\":[],\"name\":\"raveena@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-08-11 14:10:26', NULL),
(16, 21, 'ch_1D1wY2AbBGmUqZdoqffIiJer', 'stripe', 5, '10.00', 'succeeded', 'usd', 'ch_1D1wY2AbBGmUqZdoqffIiJer', 'succeeded', '{\"id\":\"ch_1D1wY2AbBGmUqZdoqffIiJer\",\"object\":\"charge\",\"amount\":1000,\"amount_refunded\":0,\"application\":null,\"application_fee\":null,\"balance_transaction\":\"txn_1D1wY2AbBGmUqZdofp24PPn6\",\"captured\":true,\"created\":1534945138,\"currency\":\"usd\",\"customer\":\"cus_DSsDUB01gW4hHs\",\"description\":null,\"destination\":null,\"dispute\":null,\"failure_code\":null,\"failure_message\":null,\"fraud_details\":[],\"invoice\":null,\"livemode\":false,\"metadata\":[],\"on_behalf_of\":null,\"order\":null,\"outcome\":{\"network_status\":\"approved_by_network\",\"reason\":null,\"risk_level\":\"normal\",\"seller_message\":\"Payment complete.\",\"type\":\"authorized\"},\"paid\":true,\"receipt_email\":null,\"receipt_number\":null,\"refunded\":false,\"refunds\":{\"object\":\"list\",\"data\":[],\"has_more\":false,\"total_count\":0,\"url\":\"\\/v1\\/charges\\/ch_1D1wY2AbBGmUqZdoqffIiJer\\/refunds\"},\"review\":null,\"shipping\":null,\"source\":{\"id\":\"card_1D1wSxAbBGmUqZdoP46vgFwf\",\"object\":\"card\",\"address_city\":null,\"address_country\":null,\"address_line1\":null,\"address_line1_check\":null,\"address_line2\":null,\"address_state\":null,\"address_zip\":null,\"address_zip_check\":null,\"brand\":\"Visa\",\"country\":\"US\",\"customer\":\"cus_DSsDUB01gW4hHs\",\"cvc_check\":\"pass\",\"dynamic_last4\":null,\"exp_month\":10,\"exp_year\":2030,\"fingerprint\":\"kNvYrWGkc5mrgSvS\",\"funding\":\"unknown\",\"last4\":\"1111\",\"metadata\":[],\"name\":\"raveena@singsys.com\",\"tokenization_method\":null},\"source_transfer\":null,\"statement_descriptor\":null,\"status\":\"succeeded\",\"transfer_group\":null}', '2018-08-22 16:08:59', NULL),
(17, 24, '', 'awarded', 20, '0.00', 'succeeded', '', '', 'succeeded', '', '2018-08-27 10:26:03', NULL),
(18, 11, '', 'awarded', 20, '0.00', 'succeeded', '', '', 'succeeded', '', '2018-08-30 08:13:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `email_template_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`email_template_id`, `title`, `subject`, `description`, `added_date`) VALUES
(0, 'subscribe_360', '360 Reference | Subscribe to 360! Individual Premium!', 'Dear {USER},\r\n\r\nCurious to find out more? Subscribe to 360! Individual Premium!\r\n\r\nThanks {SITENAME}', '2018-08-27 11:56:43'),
(1, 'contact_us', '360 Reference - Contact Us', '<p>Dear {NAME},</p>\r\n\r\n<p>Thanks for your response.</p>\r\n\r\n<p>Thanks {SITENAME} Team</p>', '2018-08-28 14:23:51'),
(2, 'contact_us_reply', '360 Reference - Contact Reply', 'Dear {NAME},\r\n\r\nContact Us email reply.\r\n\r\nMessage: {MESSAGE}\r\n\r\nThanks {SITENAME} Team', '2018-03-22 02:21:14'),
(3, 'account_activation', '360 Reference | Account Activation', 'Dear {NAME},\r\n\r\nThank you for signing up at 360 Reference, to activate your corresponding account, visit the following link:\r\n{ACTIVATIONLINK}\r\n\r\nIf you are not able to click on the above link, please copy and paste the URL in the browser.\r\n\r\nThanks {SITENAME}', '2018-03-22 02:21:23'),
(4, 'reset_password', '360 Reference - Reset Password', 'Dear {NAME}, \r\n\r\nWe received your request to Reset the Password. \r\n\r\nPlease click on the link below to Reset your Passsword. \r\n{ACTIVATIONLINK} \r\n\r\nThanks {SITENAME}', '2018-03-22 02:21:31'),
(5, 'same_company_notification', '360 Reference - New Connection', 'Dear {NAME}, A new user-({NEWUSER}) has registered with the same Company Name({COMPANY}) as yours. Thanks {SITENAME} Team', '2018-03-21 05:26:52'),
(6, 'contact_us_admin', '360 Reference - Contact Us', 'Dear Admin,\r\n\r\nNew contact information found.\r\n\r\nName: {NAME}\r\n\r\nEmail: {FROM_EMAIL}\r\n\r\nMessage: {MESSAGE}\r\n\r\nThanks {SITENAME} Team', '2018-03-26 04:33:00'),
(7, 'account_deletion', 'Reference 360 | Account Deletion', 'Dear {NAME},\n\nThis is to inform you that your account has been deleted by the Admin.\n\nThanks {SITENAME}', '2018-04-02 00:08:45'),
(8, 'account_block', 'Reference 360 | Account Blocked', 'Dear {NAME},\r\n\r\nThis is to inform you that your account has been blocked by the Admin.\r\n\r\nThanks {SITENAME}', '2018-04-02 05:26:54'),
(9, 'account_unblock', 'Reference 360 | Account Unblock', 'Dear {NAME},\r\n\r\nThis is to inform you that your account has been unblocked by the Admin.\r\n\r\nThanks {SITENAME}', '2018-04-02 05:27:46'),
(10, 'account_edit', 'Reference 360 | Account Edited', 'Dear {NAME},\r\n\r\nThis is to inform you that your account has been edited by the Admin.\r\n\r\nThanks {SITENAME}', '2018-04-02 05:28:37'),
(11, 'disputed_rating', 'Reference 360 - Disputed Rating Notification', '<p>Dear {NAME},</p>\r\n\r\n<p>Your rating has been disputed by {SENDER}.</p>\r\n\r\n<p>Thanks {SITENAME}</p>', '2018-04-02 05:28:37'),
(12, 'rating_received', 'Reference 360 - Rating Notification', '<p>Dear {NAME},</p>\r\n\r\n<p>You have received rating from {SENDER}.</p>\r\n\r\n<p>Thanks {SITENAME}</p>', '2018-04-17 13:34:06'),
(13, 'rating_received', 'Reference 360 - Rating Notification', '<p>Dear {NAME},</p>\r\n\r\n<p>You have received rating from {SENDER}.</p>\r\n\r\n<p>Thanks {SITENAME}</p>', '2018-04-17 13:34:12'),
(14, 'recommendation_mail', 'Reference 360 - Recommendation Notification', 'Dear {NAME},\r\n\r\n{SENDER} has recommended you to rate {RATE}.To rate please click the below link\r\n{ACTIVATIONLINK}\r\n\r\nIf you are not able to click on the above link, please copy and paste the URL in the browser.', '2018-04-17 13:34:12'),
(15, 'short_rating', '360 reference - Regarding Average Rating', '<p>Dear {NAME},</p>\r\n\r\n<p>You are short of ratings! Invite your connections to rate you so that your average rating is improved and your visibility increases to your employer.</p>\r\n\r\n<p>Thanks {SITENAME} Team</p>', '2018-04-19 09:54:02'),
(16, 'daily_digest', '360 Reference - Daily Digest', '<p>Dear {NAME},</p>\r\n\r\n<p>Daily Digest mails.</p>\r\n\r\n<p>Thanks {SITENAME} Team</p>', '2018-04-19 09:54:43'),
(17, 'invitation_received', 'Reference 360 - Recommendation Notification', 'Dear {NAME},\r\n\r\n{SENDER} has sent you invitation to connect. \r\n\r\n\r\n', '2018-04-19 09:54:43'),
(18, 'keyword_admin', '360 Reference - Review On Hold', '<p>Dear {NAME},</p>\r\n\r\n<p>A new review has been posted which matches with the keyword. Please login the Admin Panel to review.</p>\r\n\r\n<p>Thanks {SITENAME} Team</p>', '2018-04-20 10:39:08'),
(19, 'connection_invitation', '360 Reference - Invite', '<p>Dear {NAME},</p>\r\n\r\n{SENDER} has sent you invitation to connect {SITENAME} .', '2018-04-19 23:39:08'),
(20, 'connection_notification_sucess', '360 Reference - Invite Sent', '<p>Dear {SENDER},</p>\r\n\r\nConnection request to {NAME} has been send sucessfully.', '2018-04-19 23:39:08'),
(21, 'connection_request_accepted', '360 Reference - Invitation Accepted', '<p>Dear {NAME},</p>\r\n\r\n{SENDER} has accepted your connection request.', '2018-04-19 23:39:08'),
(22, 'job_reccomendation', '360 Reference - Job Recommendation', '<p>Dear {RECEIVER},</p>\r\n\r\n{NAME} has recommended you to apply for {JOB} job.', '2018-04-19 23:39:08'),
(23, 'get_to_rate', '360 Reference | Invitation to Rate And Review', 'Dear {RECEIVER},\r\n{NAME} has invite to rate and review.\r\n', '2018-04-19 23:39:08'),
(24, 'new_account_activation', '360 Reference | Account Activation', 'Dear {NAME},\r\n\r\nThank you for signing up at 360 Reference, to activate your corresponding account, visit the following link:\r\n{ACTIVATIONLINK}.\r\nAfter activating account please login using your email and password 123456.\r\n\r\nIf you are not able to click on the above link, please copy and paste the URL in the browser.\r\n\r\nThanks {SITENAME}', '2018-04-19 23:39:08'),
(25, 'account_verification_pending', '360 Reference | Account Verification Pending', 'Dear {NAME},\r\n\r\nPlease verify your mobile number .\r\n\r\nThanks {SITENAME}', '2018-04-19 23:39:08'),
(26, 'job_matching', '360 Reference | Job Matched', 'Dear {NAME},\r\n\r\n{JOB} job is posted matching to your profile.\r\n\r\nThanks {SITENAME}', '2018-04-19 23:39:08'),
(27, 'credibility', '360 Reference | credibility', 'Dear {NAME},\r\n\r\nSo close! You are short of {REQUIRE} 360! to get {REQUIRETYPE} credibility\r\n\r\nThanks {SITENAME}', '2018-04-19 23:39:08'),
(28, 'credit_inform', '360 Reference | credibility', 'Dear {NAME},\r\n\r\n{SENDER} has gotten bronze credibility!\r\n\r\nThanks {SITENAME}', '2018-04-19 23:39:08'),
(29, 'signup_with_360', '360 Reference | Sign Up', '<p>Dear {NAME},</p>\r\n\r\n<p>{USER} gave you a 360! as a {TYPE} (category). Sign up with 360 Reference and verify your profile to view what {USER} thinks of you!</p>\r\n\r\n<p>Thanks {SITENAME}</p>', '2018-08-27 08:20:23');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('General','Admin Functions','Updates','Pricing Plan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`, `category`, `added_date`, `status`) VALUES
(1, 'What is a Company Page?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>', 'General', '2018-03-23 05:53:17', 'active'),
(2, 'How do I edit my individual profile?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>', 'General', '2018-03-15 05:06:43', 'active'),
(3, 'How can I become an administrator on my Company Page?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>', 'Admin Functions', '2018-03-15 05:36:29', 'active'),
(4, 'What can Company Page administrators do and how do I assign one?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>', 'Admin Functions', '2018-03-27 05:22:33', 'inactive'),
(5, 'Who can add a Company Page?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>', 'Admin Functions', '2018-03-15 05:37:29', 'active'),
(6, 'What are how it works for my Company Page?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>', 'Updates', '2018-03-23 05:53:55', 'active'),
(7, 'How do I edit the Profile section?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>', 'Updates', '2018-03-15 05:38:34', 'active'),
(8, 'What are the payment methods that I can use to purchase my subscription?', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>', 'Pricing Plan', '2018-03-27 06:09:57', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `get360`
--

CREATE TABLE `get360` (
  `id` int(10) UNSIGNED NOT NULL,
  `invited_by` int(10) UNSIGNED NOT NULL,
  `invited_to` int(10) UNSIGNED DEFAULT NULL,
  `invited_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invited_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `get360`
--

INSERT INTO `get360` (`id`, `invited_by`, `invited_to`, `invited_email`, `invited_number`, `created_at`, `updated_at`) VALUES
(1, 28, 29, NULL, NULL, '2018-07-11 09:34:25', NULL),
(2, 29, 28, NULL, NULL, '2018-07-11 09:37:02', NULL),
(3, 29, 28, NULL, NULL, '2018-07-11 09:41:10', NULL),
(4, 28, 28, NULL, NULL, '2018-08-02 11:19:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_page_slider`
--

CREATE TABLE `home_page_slider` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page_slider`
--

INSERT INTO `home_page_slider` (`id`, `title`, `description`, `banner_image`, `added_date`) VALUES
(1, 'Find a company that’s right for you!', 'Read company reviews and ratings of over 400,000 companies worldwide. Get to know the inside news. Hear the stories directly from their employees.', 'crop_20180829160529.png', '2018-08-29 10:35:34'),
(2, '360 Reference', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'crop_20180322081736.jpeg', '2018-03-22 08:17:41'),
(3, 'Ut aut reiciendis voluptatibus', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 'crop_20180322082135.jpeg', '2018-03-22 08:21:39');

-- --------------------------------------------------------

--
-- Table structure for table `how_it_works`
--

CREATE TABLE `how_it_works` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('Image','Video') COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('INDIVIDUAL','COMPANY') COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `how_it_works`
--

INSERT INTO `how_it_works` (`id`, `title`, `description`, `image`, `type`, `category`, `added_date`) VALUES
(1, 'Get Registered', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://www.youtube.com/embed/TnAPe3mXOqA', 'Video', 'INDIVIDUAL', '2018-05-07 10:08:56'),
(2, 'Complete Your Profile', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'crop_20180327035208.png', 'Image', 'INDIVIDUAL', '2018-05-07 10:07:16'),
(3, 'Get Found', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'crop_20180327035251.png', 'Image', 'INDIVIDUAL', '2018-05-07 10:07:33'),
(4, 'Post Ratings and Reviews', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'crop_20180327035331.png', 'Image', 'INDIVIDUAL', '2018-05-07 10:07:23'),
(5, 'Chat With Companies Representatives', 'qwert', 'crop_20180327035425.png', 'Image', 'INDIVIDUAL', '2018-03-26 22:24:27'),
(6, 'Get Registered', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'crop_20180315121140.png', 'Image', 'COMPANY', '2018-05-07 10:07:38'),
(7, 'Find Suitable Individuals', 'sdfgfd', 'crop_20180315121247.png', 'Image', 'COMPANY', '2018-03-15 06:42:50'),
(8, 'Get Ratings & Reviews', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'crop_20180315121354.png', 'Image', 'COMPANY', '2018-05-07 10:07:43'),
(9, 'Tell Company Stories', 'asdfg', 'crop_20180315121509.png', 'Image', 'COMPANY', '2018-03-15 06:45:11'),
(10, 'Chat With Individuals', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'https://www.youtube.com/embed/TnAPe3mXOqA', 'Video', 'COMPANY', '2018-05-07 10:06:59');

-- --------------------------------------------------------

--
-- Table structure for table `individual_self_rating`
--

CREATE TABLE `individual_self_rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rating` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `individual_self_rating`
--

INSERT INTO `individual_self_rating` (`id`, `user_id`, `rating`, `created_at`, `updated_at`) VALUES
(4, 32, '4.00', '2018-04-20 00:01:03', '2018-04-20 00:01:10'),
(5, 34, '5.00', '2018-04-20 05:23:11', '2018-04-20 05:23:13'),
(6, 35, '3.40', '2018-04-20 07:48:33', '2018-04-22 23:41:12'),
(7, 28, '4.60', '2018-04-24 08:59:48', '2018-05-23 12:27:53'),
(8, 36, '1.60', '2018-04-24 11:43:12', '2018-04-24 11:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `corporate_id` int(10) UNSIGNED NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsibilities` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `why_apply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `matched_profile` int(11) NOT NULL,
  `status` enum('publish','draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `corporate_id`, `position`, `requirements`, `responsibilities`, `description`, `job_location`, `why_apply`, `job_type`, `matched_profile`, `status`, `created_at`, `updated_at`) VALUES
(1, 54, 'Java Developer', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '198', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', '0', 0, 'publish', '2018-08-08 11:47:48', '2018-08-08 12:58:20'),
(11, 30, 'UI/UX Designer', 'UI/UX Designer', 'UI/UX Designer', 'UI/UX Designer', '198', 'UI/UX Designer', '0', 0, 'publish', '2018-06-08 08:44:59', NULL),
(12, 30, 'PHP Developer', 'PHP Developer', 'PHP Developer', 'PHP Developer', '198', 'PHP Developer', '0', 0, 'publish', '2018-06-08 08:45:27', NULL),
(20, 30, 'Team Lead', 'Team Lead', 'Team Lead', 'Team Lead', '198', 'Team Lead', '0', 0, 'publish', '2018-06-11 08:18:24', NULL),
(22, 30, 'Recruitment Team', 'Recruitment Team', 'Recruitment Team', 'Recruitment Team', '198', 'Recruitment Team', '0', 0, 'publish', '2018-06-11 08:19:36', NULL),
(25, 30, 'The Test', 'The Test', 'The Test', 'The Test', '198', 'The Test', '0', 0, 'publish', '2018-06-11 11:52:21', NULL),
(26, 41, 'The Value', 'The Value', 'The Value', 'The Value', '198', 'The Value', '0', 0, 'publish', '2018-06-11 12:05:38', NULL),
(27, 31, 'Software Engineer', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '198', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '0', 0, 'publish', '2018-06-11 15:50:01', '2018-06-11 16:34:31'),
(28, 31, 'UI/UX Developer', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '198', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', '0', 0, 'publish', '2018-06-11 15:52:53', NULL),
(29, 30, 'sdfgh', 'asdfvgbhj', 'azsxcv', 'asxdcv', '198', 'sxdcfv', '0', 0, 'publish', '2018-06-25 11:56:25', NULL),
(30, 30, 'sdfgh', 'asdfvgbhj', 'azsxcv', 'asxdcv', '198', 'sxdcfv', '0', 0, 'publish', '2018-06-25 11:57:06', NULL),
(31, 30, 'Test', '15', 'the resposibity for you', 'Job Description for the job', '198', 'Why you should aplly for this job', '0', 0, 'publish', '2018-07-18 10:03:18', NULL),
(32, 30, 'Testing All', 'Testing All', 'Testing All', 'Testing All', '198', 'Testing All', '0', 0, 'publish', '2018-07-18 14:55:34', NULL),
(33, 41, 'HTML Developer', '3', 'Responsibility', 'PHP Developer at XYZ', '198', 'PHP Developer at XYZ', '0', 0, 'publish', '2018-07-18 15:21:23', NULL),
(34, 31, 'Software Engineer', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'This is testing description', 'This is testing description', '198', 'This is testing description', '0', 0, 'publish', '2018-07-26 15:43:12', NULL),
(35, 30, 'JOB FIRST', '1234', 'JOB FIRST', 'JOB FIRST', '198', 'JOB FIRST', '0', 0, 'publish', '2018-07-27 07:05:32', NULL),
(36, 54, 'Software Developer (Java)', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '1) Responsible for\r\nRequirements gathering & Analysis \r\nPreparing LLD/HLD \r\nDeveloping software \r\nPerform Unit Testing/Integration Testing \r\n2) To work as a good team player\r\n3) To communicate/Update customers on progress\r\n4) To Lead/Guide team members as required.\r\n5) To be Proactive & Innovative in providing solutions', '1) Responsible for\r\nRequirements gathering & Analysis \r\nPreparing LLD/HLD \r\nDeveloping software \r\nPerform Unit Testing/Integration Testing \r\n2) To work as a good team player\r\n3) To communicate/Update customers on progress\r\n4) To Lead/Guide team members as required.\r\n5) To be Proactive & Innovative in providing solutions', '198', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '0', 0, 'publish', '2018-07-31 12:08:10', NULL),
(37, 54, 'Software Developer (PHP)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '1) Responsible for Requirements gathering & Analysis Preparing LLD/HLD Developing software Perform Unit Testing/Integration Testing 2) To work as a good team player 3) To communicate/Update customers on progress 4) To Lead/Guide team members as required. 5) To be Proactive & Innovative in providing solutions', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '198', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '0', 0, 'publish', '2018-07-31 12:09:51', '2018-07-31 12:13:43'),
(38, 54, 'Software Developer (HTML)', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '1) Responsible for Requirements gathering & Analysis Preparing LLD/HLD Developing software Perform Unit Testing/Integration Testing 2) To work as a good team player 3) To communicate/Update customers on progress 4) To Lead/Guide team members as required. 5) To be Proactive & Innovative in providing solutions', '1) Responsible for Requirements gathering & Analysis Preparing LLD/HLD Developing software Perform Unit Testing/Integration Testing 2) To work as a good team player 3) To communicate/Update customers on progress 4) To Lead/Guide team members as required. 5) To be Proactive & Innovative in providing solutions', '198', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '0', 0, 'draft', '2018-07-31 12:18:44', NULL),
(39, 30, 'The TestIng', '12', 'The TestIng', 'The TestIng', '198', 'The TestIng', '0', 0, 'draft', '2018-08-01 11:44:24', NULL),
(40, 30, 'Assign', 'Assign', 'Assign', 'Assign', '198', 'Assign', '0', 0, 'publish', '2018-08-01 11:45:07', NULL),
(41, 54, 'Software Engineer - JAVA', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '198', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '0', 0, 'publish', '2018-08-02 08:38:10', '2018-08-02 08:46:23'),
(42, 54, 'Software Engineer - HTML', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'On clicking no, it should not redirect user to the listing page ---------- where it should be  redirect ?', 'On clicking no, it should not redirect user to the listing page ---------- where it should be  redirect ?', '198', 'On clicking no, it should not redirect user to the listing page ---------- where it should be  redirect ?', '0', 0, 'publish', '2018-08-02 08:53:16', '2018-08-02 08:53:50'),
(43, 31, '\"de Finibus Bonorum et Malorum\"', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '198', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '0', 0, 'publish', '2018-08-09 10:00:39', '2018-08-09 10:01:23'),
(44, 31, 'UI/UX designer', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '198', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '0', 0, 'publish', '2018-08-09 12:47:44', NULL),
(45, 31, 'UI/UX designer', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '198', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '0', 0, 'publish', '2018-08-09 12:48:43', NULL),
(46, 31, 'Junior Trainee', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '98', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.', '1', 2, 'publish', '2018-08-09 12:52:48', NULL),
(47, 31, 'Software Engineer', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '5', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '0', 0, 'draft', '2018-08-09 14:06:52', NULL),
(48, 31, 'Software Engineer', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '5', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '0', 0, 'draft', '2018-08-09 14:07:14', NULL),
(49, 31, 'Software Developer (Java)', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '4', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '0', 0, 'draft', '2018-08-09 14:09:27', NULL),
(50, 31, 'Software Developer (Java)', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '4', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '0', 0, 'draft', '2018-08-09 14:10:11', NULL),
(51, 34, 'Software Engineer', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '198', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '1', 3, 'publish', '2018-08-11 14:12:42', NULL),
(52, 11, 'Software Engineer', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '100', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '1', 2, 'publish', '2018-08-11 14:29:26', '2018-08-11 14:32:25'),
(53, 11, 'Software Engineer', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '198', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '0', 0, 'publish', '2018-08-30 08:20:52', NULL),
(54, 11, 'Java Developer', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '198', 'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC', '0', 0, 'publish', '2018-08-30 13:56:51', '2018-08-30 13:57:08');

-- --------------------------------------------------------

--
-- Table structure for table `jobs_applied`
--

CREATE TABLE `jobs_applied` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs_applied`
--

INSERT INTO `jobs_applied` (`id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 12, 28, '2018-06-09 08:21:46', NULL),
(15, 12, 39, '2018-06-09 08:22:48', NULL),
(16, 11, 39, '2018-06-09 08:22:52', NULL),
(18, 12, 32, '2018-06-09 08:23:48', NULL),
(19, 11, 32, '2018-06-09 08:24:20', NULL),
(21, 11, 37, '2018-06-09 08:26:10', NULL),
(25, 27, 36, '2018-06-11 15:55:50', NULL),
(26, 27, 32, '2018-06-11 16:03:30', NULL),
(28, 37, 32, '2018-07-31 12:27:16', NULL),
(29, 37, 55, '2018-07-31 12:31:50', NULL),
(30, 41, 32, '2018-08-02 08:49:43', NULL),
(0, 43, 32, '2018-08-09 10:01:46', NULL),
(0, 51, 32, '2018-08-11 14:42:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs_viewed`
--

CREATE TABLE `jobs_viewed` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_attributes`
--

CREATE TABLE `job_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_attributes`
--

INSERT INTO `job_attributes` (`id`, `job_id`, `attribute_id`, `created_at`, `updated_at`) VALUES
(28, 11, 22, '2018-06-08 08:44:59', NULL),
(29, 11, 20, '2018-06-08 08:44:59', NULL),
(30, 11, 16, '2018-06-08 08:44:59', NULL),
(31, 12, 26, '2018-06-08 08:45:27', NULL),
(52, 20, 29, '2018-06-11 08:18:24', NULL),
(53, 20, 28, '2018-06-11 08:18:24', NULL),
(56, 22, 27, '2018-06-11 08:19:37', NULL),
(57, 22, 25, '2018-06-11 08:19:37', NULL),
(66, 25, 28, '2018-06-11 11:52:21', NULL),
(67, 25, 27, '2018-06-11 11:52:21', NULL),
(71, 26, 27, '2018-06-11 12:05:38', NULL),
(78, 28, 10, '2018-06-11 15:52:53', NULL),
(79, 28, 6, '2018-06-11 15:52:53', NULL),
(80, 28, 5, '2018-06-11 15:52:53', NULL),
(81, 27, 29, '2018-06-11 16:34:31', NULL),
(82, 27, 28, '2018-06-11 16:34:31', NULL),
(83, 27, 9, '2018-06-11 16:34:31', NULL),
(87, 29, 27, '2018-06-25 11:56:25', NULL),
(88, 30, 27, '2018-06-25 11:57:06', NULL),
(89, 31, 25, '2018-07-18 10:03:18', NULL),
(90, 32, 28, '2018-07-18 14:55:34', NULL),
(91, 32, 27, '2018-07-18 14:55:34', NULL),
(92, 33, 25, '2018-07-18 15:21:23', NULL),
(93, 34, 27, '2018-07-26 15:43:12', NULL),
(94, 34, 24, '2018-07-26 15:43:12', NULL),
(95, 35, 28, '2018-07-27 07:05:32', NULL),
(96, 36, 17, '2018-07-31 12:08:10', NULL),
(97, 36, 10, '2018-07-31 12:08:10', NULL),
(98, 36, 6, '2018-07-31 12:08:11', NULL),
(99, 36, 5, '2018-07-31 12:08:11', NULL),
(108, 37, 29, '2018-07-31 12:13:43', NULL),
(109, 37, 28, '2018-07-31 12:13:43', NULL),
(110, 38, 28, '2018-07-31 12:18:44', NULL),
(111, 38, 11, '2018-07-31 12:18:44', NULL),
(112, 38, 5, '2018-07-31 12:18:44', NULL),
(113, 39, 29, '2018-08-01 11:44:24', NULL),
(114, 39, 28, '2018-08-01 11:44:24', NULL),
(115, 40, 27, '2018-08-01 11:45:07', NULL),
(116, 40, 26, '2018-08-01 11:45:07', NULL),
(129, 41, 29, '2018-08-02 08:46:23', NULL),
(130, 41, 28, '2018-08-02 08:46:23', NULL),
(131, 41, 11, '2018-08-02 08:46:23', NULL),
(132, 41, 10, '2018-08-02 08:46:23', NULL),
(135, 42, 29, '2018-08-02 08:53:51', NULL),
(136, 42, 28, '2018-08-02 08:53:51', NULL),
(149, 1, 29, '2018-08-08 12:58:21', NULL),
(150, 1, 28, '2018-08-08 12:58:21', NULL),
(151, 1, 15, '2018-08-08 12:58:21', NULL),
(158, 43, 28, '2018-08-09 10:01:23', NULL),
(159, 43, 27, '2018-08-09 10:01:23', NULL),
(160, 43, 5, '2018-08-09 10:01:23', NULL),
(161, 44, 29, '2018-08-09 12:47:44', NULL),
(162, 44, 27, '2018-08-09 12:47:44', NULL),
(163, 44, 12, '2018-08-09 12:47:44', NULL),
(164, 44, 5, '2018-08-09 12:47:44', NULL),
(165, 45, 29, '2018-08-09 12:48:43', NULL),
(166, 45, 27, '2018-08-09 12:48:43', NULL),
(167, 45, 12, '2018-08-09 12:48:43', NULL),
(168, 45, 5, '2018-08-09 12:48:43', NULL),
(169, 46, 29, '2018-08-09 12:52:48', NULL),
(170, 46, 28, '2018-08-09 12:52:48', NULL),
(171, 47, 29, '2018-08-09 14:06:53', NULL),
(172, 47, 28, '2018-08-09 14:06:53', NULL),
(173, 48, 29, '2018-08-09 14:07:14', NULL),
(174, 48, 28, '2018-08-09 14:07:14', NULL),
(175, 49, 29, '2018-08-09 14:09:27', NULL),
(176, 49, 28, '2018-08-09 14:09:27', NULL),
(177, 49, 21, '2018-08-09 14:09:27', NULL),
(178, 50, 29, '2018-08-09 14:10:11', NULL),
(179, 50, 28, '2018-08-09 14:10:11', NULL),
(180, 50, 21, '2018-08-09 14:10:11', NULL),
(181, 51, 29, '2018-08-11 14:12:42', NULL),
(182, 51, 28, '2018-08-11 14:12:42', NULL),
(183, 51, 22, '2018-08-11 14:12:42', NULL),
(184, 51, 5, '2018-08-11 14:12:43', NULL),
(185, 51, 4, '2018-08-11 14:12:43', NULL),
(201, 52, 29, '2018-08-11 14:32:25', NULL),
(202, 52, 28, '2018-08-11 14:32:25', NULL),
(203, 52, 11, '2018-08-11 14:32:25', NULL),
(204, 52, 5, '2018-08-11 14:32:25', NULL),
(205, 52, 4, '2018-08-11 14:32:25', NULL),
(206, 53, 36, '2018-08-30 08:20:52', NULL),
(207, 53, 33, '2018-08-30 08:20:52', NULL),
(208, 53, 27, '2018-08-30 08:20:52', NULL),
(211, 54, 38, '2018-08-30 13:57:08', NULL),
(212, 54, 34, '2018-08-30 13:57:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_candidate_log`
--

CREATE TABLE `job_candidate_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_candidate_log`
--

INSERT INTO `job_candidate_log` (`id`, `user_id`, `job_id`, `created_at`, `updated_at`) VALUES
(1, 30, 16, '2018-07-18 14:56:35', '2018-07-18 14:56:35'),
(2, 30, 9, '2018-07-18 15:06:09', '2018-07-18 15:06:09'),
(3, 30, 16, '2018-07-18 15:06:17', '2018-07-18 15:06:17'),
(4, 30, 9, '2018-07-18 15:06:24', '2018-07-18 15:06:24'),
(5, 41, 26, '2018-07-18 15:20:50', '2018-07-18 15:20:50'),
(6, 41, 26, '2018-07-18 15:21:29', '2018-07-18 15:21:29'),
(7, 30, 16, '2018-07-25 07:00:50', '2018-07-25 07:00:50'),
(8, 30, 9, '2018-07-25 07:00:55', '2018-07-25 07:00:55'),
(9, 30, 16, '2018-07-27 06:34:42', '2018-07-27 06:34:42'),
(10, 30, 9, '2018-07-27 06:35:00', '2018-07-27 06:35:00'),
(11, 54, 37, '2018-07-31 12:30:12', '2018-07-31 12:30:12'),
(12, 54, 37, '2018-07-31 12:30:21', '2018-07-31 12:30:21'),
(13, 31, 27, '2018-08-01 07:58:59', '2018-08-01 07:58:59'),
(14, 31, 34, '2018-08-01 07:59:08', '2018-08-01 07:59:08'),
(15, 30, 40, '2018-08-01 11:45:53', '2018-08-01 11:45:53'),
(16, 30, 40, '2018-08-01 12:15:48', '2018-08-01 12:15:48'),
(17, 31, 27, '2018-08-02 08:31:51', '2018-08-02 08:31:51'),
(18, 31, 27, '2018-08-02 08:32:46', '2018-08-02 08:32:46'),
(19, 54, 41, '2018-08-02 08:50:12', '2018-08-02 08:50:12'),
(20, 30, 11, '2018-08-02 11:04:51', '2018-08-02 11:04:51'),
(21, 30, 12, '2018-08-03 08:47:35', '2018-08-03 08:47:35'),
(22, 30, 12, '2018-08-03 09:48:26', '2018-08-03 09:48:26'),
(0, 31, 43, '2018-08-09 10:04:52', '2018-08-09 10:04:52'),
(0, 31, 43, '2018-08-09 10:12:26', '2018-08-09 10:12:26'),
(0, 34, 51, '2018-08-11 14:42:44', '2018-08-11 14:42:44'),
(0, 34, 51, '2018-08-11 14:42:48', '2018-08-11 14:42:48'),
(0, 34, 51, '2018-08-11 14:44:09', '2018-08-11 14:44:09'),
(0, 34, 51, '2018-08-11 14:44:12', '2018-08-11 14:44:12'),
(0, 34, 51, '2018-08-11 14:44:23', '2018-08-11 14:44:23'),
(0, 34, 51, '2018-08-11 14:44:42', '2018-08-11 14:44:42'),
(0, 34, 51, '2018-08-11 14:45:17', '2018-08-11 14:45:17'),
(0, 34, 51, '2018-08-11 14:45:17', '2018-08-11 14:45:17'),
(0, 34, 51, '2018-08-11 14:45:17', '2018-08-11 14:45:17'),
(0, 34, 51, '2018-08-11 14:45:17', '2018-08-11 14:45:17'),
(0, 34, 51, '2018-08-11 14:45:17', '2018-08-11 14:45:17'),
(0, 34, 51, '2018-08-11 14:45:33', '2018-08-11 14:45:33'),
(0, 34, 51, '2018-08-11 14:45:47', '2018-08-11 14:45:47'),
(0, 34, 51, '2018-08-11 14:46:34', '2018-08-11 14:46:34'),
(0, 34, 51, '2018-08-11 14:47:23', '2018-08-11 14:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `job_credits`
--

CREATE TABLE `job_credits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `credit_amount` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_credits`
--

INSERT INTO `job_credits` (`id`, `user_id`, `credit_amount`, `created_at`, `updated_at`) VALUES
(3, 30, 225, NULL, NULL),
(4, 54, 25, NULL, NULL),
(5, 31, 95, NULL, NULL),
(6, 24, 20, NULL, NULL),
(7, 11, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_credit_log`
--

CREATE TABLE `job_credit_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `credit_amount` int(10) UNSIGNED NOT NULL,
  `type` enum('job_posted','applied_list') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'job_posted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_credit_log`
--

INSERT INTO `job_credit_log` (`id`, `user_id`, `job_id`, `credit_amount`, `type`, `created_at`, `updated_at`) VALUES
(5, 30, 16, 5, 'job_posted', '2018-07-18 14:52:03', NULL),
(6, 30, 32, 10, 'job_posted', '2018-07-18 14:55:34', NULL),
(7, 30, 16, 5, 'job_posted', '2018-07-18 14:55:42', NULL),
(8, 30, 16, 5, 'job_posted', '2018-07-18 14:56:35', NULL),
(9, 30, 9, 5, 'job_posted', '2018-07-18 15:06:09', NULL),
(10, 30, 21, 5, 'job_posted', '2018-07-18 15:06:31', NULL),
(11, 30, 35, 10, 'job_posted', '2018-07-27 07:05:32', NULL),
(12, 54, 36, 10, 'job_posted', '2018-07-31 12:08:11', '2018-07-31 12:08:11'),
(13, 54, 37, 100, 'job_posted', '2018-07-31 12:09:52', '2018-07-31 12:09:52'),
(14, 54, 37, 100, 'job_posted', '2018-07-31 12:11:47', '2018-07-31 12:11:47'),
(15, 54, 38, 100, 'job_posted', '2018-07-31 12:18:45', '2018-07-31 12:18:45'),
(16, 54, 37, 5, 'applied_list', '2018-07-31 12:30:12', '2018-07-31 12:30:12'),
(17, 30, 40, 100, 'job_posted', '2018-08-01 11:45:08', '2018-08-01 11:45:08'),
(18, 30, 40, 5, 'applied_list', '2018-08-01 11:45:53', '2018-08-01 11:45:53'),
(19, 54, 41, 100, 'job_posted', '2018-08-02 08:46:23', '2018-08-02 08:46:23'),
(20, 54, 41, 5, 'applied_list', '2018-08-02 08:50:12', '2018-08-02 08:50:12'),
(21, 54, 42, 100, 'job_posted', '2018-08-02 08:53:17', '2018-08-02 08:53:17'),
(22, 30, 11, 5, 'applied_list', '2018-08-02 11:04:51', '2018-08-02 11:04:51'),
(23, 30, 12, 5, 'applied_list', '2018-08-03 08:47:35', '2018-08-03 08:47:35'),
(0, 54, 0, 5, 'job_posted', '2018-08-08 11:47:48', '2018-08-08 11:47:48'),
(0, 31, 43, 5, 'job_posted', '2018-08-09 10:00:57', '2018-08-09 10:00:57'),
(0, 31, 43, 5, 'applied_list', '2018-08-09 10:04:52', '2018-08-09 10:04:52'),
(0, 31, 44, 5, 'job_posted', '2018-08-09 12:47:44', '2018-08-09 12:47:44'),
(0, 31, 45, 5, 'job_posted', '2018-08-09 12:48:43', '2018-08-09 12:48:43'),
(0, 31, 46, 5, 'job_posted', '2018-08-09 12:52:48', '2018-08-09 12:52:48'),
(0, 34, 51, 5, 'job_posted', '2018-08-11 14:12:43', '2018-08-11 14:12:43'),
(0, 34, 52, 5, 'job_posted', '2018-08-11 14:32:26', '2018-08-11 14:32:26'),
(0, 34, 51, 5, 'applied_list', '2018-08-11 14:42:44', '2018-08-11 14:42:44'),
(0, 11, 53, 5, 'job_posted', '2018-08-30 08:20:52', '2018-08-30 08:20:52'),
(0, 11, 54, 5, 'job_posted', '2018-08-30 13:56:51', '2018-08-30 13:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `job_log`
--

CREATE TABLE `job_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `log` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_log`
--

INSERT INTO `job_log` (`id`, `user_id`, `job_id`, `log`, `created_at`, `updated_at`) VALUES
(6, 28, 12, 1, '2018-06-09 08:21:43', '2018-06-09 08:21:43'),
(7, 39, 12, 1, '2018-06-09 08:22:44', '2018-06-09 08:22:44'),
(8, 39, 11, 1, '2018-06-09 08:22:46', '2018-06-09 08:22:46'),
(10, 32, 12, 1, '2018-06-09 08:23:43', '2018-06-09 08:23:43'),
(11, 32, 11, 1, '2018-06-09 08:23:44', '2018-06-09 08:23:44'),
(12, 37, 11, 1, '2018-06-09 08:26:03', '2018-06-09 08:26:03'),
(111, 41, 26, 1, '2018-06-11 12:07:02', '2018-06-11 12:07:02'),
(112, 41, 26, 1, '2018-06-11 12:07:06', '2018-06-11 12:07:06'),
(191, 36, 27, 1, '2018-06-11 15:54:32', '2018-06-11 15:54:32'),
(192, 32, 28, 1, '2018-06-11 15:54:34', '2018-06-11 15:54:34'),
(193, 32, 27, 1, '2018-06-11 15:54:37', '2018-06-11 15:54:37'),
(194, 32, 27, 1, '2018-06-11 15:59:30', '2018-06-11 15:59:30'),
(195, 32, 27, 1, '2018-06-11 15:59:46', '2018-06-11 15:59:46'),
(196, 32, 27, 1, '2018-06-11 16:03:35', '2018-06-11 16:03:35'),
(197, 32, 28, 1, '2018-06-11 16:04:20', '2018-06-11 16:04:20'),
(198, 32, 27, 1, '2018-06-11 16:04:46', '2018-06-11 16:04:46'),
(199, 31, 27, 1, '2018-06-11 16:11:04', '2018-06-11 16:11:04'),
(200, 31, 27, 1, '2018-06-11 16:11:06', '2018-06-11 16:11:06'),
(201, 31, 27, 1, '2018-06-11 16:11:10', '2018-06-11 16:11:10'),
(202, 31, 27, 1, '2018-06-11 16:23:34', '2018-06-11 16:23:34'),
(203, 31, 27, 1, '2018-06-11 16:29:05', '2018-06-11 16:29:05'),
(204, 32, 27, 1, '2018-06-11 16:31:57', '2018-06-11 16:31:57'),
(205, 32, 27, 1, '2018-06-11 16:32:21', '2018-06-11 16:32:21'),
(206, 31, 27, 1, '2018-06-11 16:34:37', '2018-06-11 16:34:37'),
(207, 31, 27, 1, '2018-06-11 16:34:58', '2018-06-11 16:34:58'),
(224, 28, 27, 1, '2018-07-18 09:58:17', '2018-07-18 09:58:17'),
(231, 28, 33, 1, '2018-07-31 09:49:47', '2018-07-31 09:49:47'),
(232, 54, 36, 1, '2018-07-31 12:08:24', '2018-07-31 12:08:24'),
(233, 32, 37, 1, '2018-07-31 12:10:40', '2018-07-31 12:10:40'),
(234, 32, 37, 1, '2018-07-31 12:12:19', '2018-07-31 12:12:19'),
(235, 54, 38, 1, '2018-07-31 12:25:06', '2018-07-31 12:25:06'),
(236, 32, 37, 1, '2018-07-31 12:27:10', '2018-07-31 12:27:10'),
(237, 32, 37, 1, '2018-07-31 12:28:22', '2018-07-31 12:28:22'),
(238, 32, 38, 1, '2018-07-31 12:28:29', '2018-07-31 12:28:29'),
(239, 55, 37, 1, '2018-07-31 12:31:48', '2018-07-31 12:31:48'),
(240, 32, 37, 1, '2018-07-31 14:06:54', '2018-07-31 14:06:54'),
(241, 31, 27, 1, '2018-08-01 08:07:13', '2018-08-01 08:07:13'),
(242, 28, 35, 1, '2018-08-01 11:31:02', '2018-08-01 11:31:02'),
(243, 30, 35, 1, '2018-08-01 11:43:38', '2018-08-01 11:43:38'),
(244, 30, 35, 1, '2018-08-01 11:44:32', '2018-08-01 11:44:32'),
(245, 30, 39, 1, '2018-08-01 11:44:39', '2018-08-01 11:44:39'),
(246, 30, 35, 1, '2018-08-01 11:45:19', '2018-08-01 11:45:19'),
(247, 28, 35, 1, '2018-08-01 12:15:13', '2018-08-01 12:15:13'),
(248, 30, 11, 1, '2018-08-01 15:31:41', '2018-08-01 15:31:41'),
(249, 54, 41, 1, '2018-08-02 08:38:22', '2018-08-02 08:38:22'),
(250, 54, 41, 1, '2018-08-02 08:40:06', '2018-08-02 08:40:06'),
(251, 54, 41, 1, '2018-08-02 08:41:10', '2018-08-02 08:41:10'),
(252, 54, 41, 1, '2018-08-02 08:46:42', '2018-08-02 08:46:42'),
(253, 54, 41, 1, '2018-08-02 08:47:57', '2018-08-02 08:47:57'),
(254, 32, 41, 1, '2018-08-02 08:49:24', '2018-08-02 08:49:24'),
(0, 54, 1, 1, '2018-08-08 12:42:02', '2018-08-08 12:42:02'),
(0, 32, 43, 1, '2018-08-09 10:01:38', '2018-08-09 10:01:38'),
(0, 34, 51, 1, '2018-08-11 14:42:23', '2018-08-11 14:42:23'),
(0, 32, 51, 1, '2018-08-11 14:42:30', '2018-08-11 14:42:30'),
(0, 34, 51, 1, '2018-08-11 14:42:37', '2018-08-11 14:42:37'),
(0, 13, 43, 1, '2018-08-29 16:33:46', '2018-08-29 16:33:46'),
(0, 16, 52, 1, '2018-08-30 08:52:02', '2018-08-30 08:52:02'),
(0, 16, 52, 1, '2018-08-30 08:56:28', '2018-08-30 08:56:28'),
(0, 11, 53, 1, '2018-08-30 08:59:30', '2018-08-30 08:59:30'),
(0, 11, 53, 1, '2018-08-30 09:00:54', '2018-08-30 09:00:54'),
(0, 11, 53, 1, '2018-08-30 09:01:41', '2018-08-30 09:01:41'),
(0, 11, 53, 1, '2018-08-30 09:02:32', '2018-08-30 09:02:32'),
(0, 11, 53, 1, '2018-08-30 09:02:55', '2018-08-30 09:02:55'),
(0, 16, 52, 1, '2018-08-30 09:03:21', '2018-08-30 09:03:21'),
(0, 16, 52, 1, '2018-08-30 09:04:21', '2018-08-30 09:04:21'),
(0, 16, 52, 1, '2018-08-30 09:05:13', '2018-08-30 09:05:13'),
(0, 16, 52, 1, '2018-08-30 09:06:41', '2018-08-30 09:06:41'),
(0, 16, 52, 1, '2018-08-30 09:06:43', '2018-08-30 09:06:43'),
(0, 16, 52, 1, '2018-08-30 09:07:00', '2018-08-30 09:07:00'),
(0, 16, 52, 1, '2018-08-30 09:07:15', '2018-08-30 09:07:15'),
(0, 16, 52, 1, '2018-08-30 09:07:30', '2018-08-30 09:07:30'),
(0, 16, 52, 1, '2018-08-30 09:07:45', '2018-08-30 09:07:45'),
(0, 16, 52, 1, '2018-08-30 09:08:13', '2018-08-30 09:08:13'),
(0, 16, 52, 1, '2018-08-30 09:08:34', '2018-08-30 09:08:34'),
(0, 16, 52, 1, '2018-08-30 09:09:17', '2018-08-30 09:09:17'),
(0, 16, 52, 1, '2018-08-30 09:09:56', '2018-08-30 09:09:56'),
(0, 16, 52, 1, '2018-08-30 09:12:05', '2018-08-30 09:12:05'),
(0, 16, 52, 1, '2018-08-30 09:12:23', '2018-08-30 09:12:23'),
(0, 16, 52, 1, '2018-08-30 09:12:54', '2018-08-30 09:12:54'),
(0, 16, 52, 1, '2018-08-30 09:13:04', '2018-08-30 09:13:04'),
(0, 16, 52, 1, '2018-08-30 09:13:32', '2018-08-30 09:13:32'),
(0, 16, 52, 1, '2018-08-30 09:13:43', '2018-08-30 09:13:43'),
(0, 16, 52, 1, '2018-08-30 09:14:10', '2018-08-30 09:14:10'),
(0, 13, 40, 1, '2018-08-30 13:56:09', '2018-08-30 13:56:09'),
(0, 13, 54, 1, '2018-08-30 13:57:28', '2018-08-30 13:57:28'),
(0, 13, 54, 1, '2018-08-30 13:58:37', '2018-08-30 13:58:37'),
(0, 13, 54, 1, '2018-08-30 13:58:49', '2018-08-30 13:58:49'),
(0, 13, 54, 1, '2018-08-30 14:01:14', '2018-08-30 14:01:14'),
(0, 13, 54, 1, '2018-08-30 14:01:30', '2018-08-30 14:01:30'),
(0, 13, 54, 1, '2018-08-30 14:02:10', '2018-08-30 14:02:10'),
(0, 13, 54, 1, '2018-08-30 14:12:02', '2018-08-30 14:12:02'),
(0, 13, 54, 1, '2018-08-30 14:12:31', '2018-08-30 14:12:31'),
(0, 13, 54, 1, '2018-08-30 14:13:01', '2018-08-30 14:13:01'),
(0, 13, 54, 1, '2018-08-30 14:13:22', '2018-08-30 14:13:22'),
(0, 13, 54, 1, '2018-08-30 14:13:51', '2018-08-30 14:13:51'),
(0, 13, 54, 1, '2018-08-30 14:13:59', '2018-08-30 14:13:59'),
(0, 13, 54, 1, '2018-08-30 14:15:25', '2018-08-30 14:15:25'),
(0, 13, 54, 1, '2018-08-30 14:16:42', '2018-08-30 14:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `job_matching_log`
--

CREATE TABLE `job_matching_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','send') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_matching_log`
--

INSERT INTO `job_matching_log` (`id`, `user_id`, `job_id`, `profile_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 30, 35, 28, 'pending', '2018-07-27 07:05:32', '2018-07-27 07:05:32'),
(2, 54, 37, 28, 'pending', '2018-07-31 12:09:52', '2018-07-31 12:09:52'),
(3, 54, 38, 28, 'pending', '2018-07-31 12:18:44', '2018-07-31 12:18:44'),
(4, 54, 42, 28, 'pending', '2018-08-02 08:53:17', '2018-08-02 08:53:17'),
(0, 54, 0, 28, 'pending', '2018-08-08 11:47:48', '2018-08-08 11:47:48'),
(0, 31, 43, 32, 'pending', '2018-08-09 10:00:57', '2018-08-09 10:00:57'),
(0, 34, 52, 32, 'pending', '2018-08-11 14:32:25', '2018-08-11 14:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `job_recommendation`
--

CREATE TABLE `job_recommendation` (
  `id` int(10) UNSIGNED NOT NULL,
  `corporae_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_recommendation`
--

INSERT INTO `job_recommendation` (`id`, `corporae_id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(0, 32, 1, 31, '2018-08-08 16:26:24', NULL),
(0, 32, 35, 31, '2018-08-08 16:26:30', NULL),
(0, 32, 35, 29, '2018-08-08 19:03:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keyword_management`
--

CREATE TABLE `keyword_management` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keyword_management`
--

INSERT INTO `keyword_management` (`id`, `keyword`, `created_at`, `updated_at`) VALUES
(1, 'New', '2018-04-17 07:07:15', '2018-05-22 15:17:17'),
(2, 'Good', '2018-04-17 07:07:26', NULL);

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
(2, '2018_03_05_082847_create_settings_table', 1),
(3, '2018_03_05_084523_create_faq_table', 1),
(4, '2018_03_05_085527_add_status_to_faq', 1),
(5, '2018_03_05_120008_create_banner_detail_table', 1),
(6, '2018_03_06_072037_create_static_contents_table', 1),
(7, '2018_03_06_094613_create_contact_us_table', 1),
(8, '2018_03_06_124221_create_email_template_table', 1),
(9, '2018_03_07_041153_create_roles_table', 1),
(10, '2018_03_07_052037_create_countries_table', 1),
(11, '2018_03_07_052219_update_user_table_column', 1),
(12, '2018_03_07_052629_create_user_verification_table', 1),
(13, '2018_03_07_054743_create_user_strengths_table', 1),
(14, '2018_03_07_055328_create_user_industries_table', 1),
(15, '2018_03_07_055959_create_services_offered_table', 1),
(16, '2018_03_07_060222_create_company_profile_table', 1),
(17, '2018_03_07_073550_create_password_reset_table', 1),
(18, '2018_03_12_041418_update_faq_table_column', 1),
(19, '2018_03_12_045847_create_about_us_table', 1),
(20, '2018_03_12_055520_create_about_us_banner_table', 1),
(21, '2018_03_12_070219_update_banner_detail_table_column', 1),
(22, '2018_03_12_071858_create_home_page_slider_table', 1),
(23, '2018_03_12_085825_create_how_it_works_table', 1),
(24, '2018_03_12_103408_create_contact_personnel_table', 1),
(25, '2018_03_13_035702_create_newsletter_table', 1),
(26, '2018_03_13_103716_create_user_account_types', 2),
(27, '2018_03_13_105059_add_account_type_to_users_table', 2),
(28, '2018_03_15_052532_add_category_to_user_account_types_table_column', 3),
(29, '2018_03_15_073506_add_calling_code_to_countries_table_column', 3),
(30, '2018_03_16_080429_create_user_education_table', 4),
(31, '2018_03_16_085537_drop_company_data_from_users_table', 4),
(32, '2018_03_16_090051_create_user_work_experience_table', 4),
(33, '2018_03_16_110836_add_company_naame_to_users_table', 4),
(34, '2018_03_21_040106_create_pending_same_company_notifications_table', 5),
(35, '2018_03_23_040411_create_operating_hours_table', 6),
(36, '2018_03_23_053723_add_charge_to_user_account_types_table', 6),
(37, '2018_03_23_122758_create_transaction_details_table', 7),
(38, '2018_03_23_134628_create_subscriptions_table', 7),
(39, '2018_03_24_035528_add_votes_to_users_table', 7),
(40, '2018_03_24_072455_alter_company_profile', 7),
(41, '2018_03_24_090328_add_contact_number_to_contact_us_table', 7),
(42, '2018_03_24_094540_alter_operating_hours', 8),
(43, '2018_03_24_094540_alter_operating_hours', 7),
(44, '2018_03_24_111028_alter_contact_us_table', 9),
(45, '2018_03_24_112615_alter_company_profile_add_images_column', 9),
(46, '2018_03_26_051426_create_contact_us_reply_table', 10),
(47, '2018_03_28_062459_alter_operating_hours_day', 11),
(48, '2018_03_29_094740_add_browse_profile_limit', 12),
(49, '2018_03_30_044755_create_notification_template_table', 13),
(50, '2018_03_30_045558_create_notification_settings_table', 13),
(51, '2018_03_30_050146_create_notifications_table', 13),
(52, '2018_03_30_051833_create_rating_questions_table', 13),
(53, '2018_04_02_035241_create_keyword_management_table', 14),
(54, '2018_04_02_061405_add_status_to_users', 14),
(55, '2018_04_03_060522_add_industry_to_user_work_experience', 15),
(56, '2018_04_03_083425_add_certification_to_user_education', 15),
(57, '2018_04_04_043805_add_status_to_country', 16),
(58, '2018_04_05_051216_create_rating_as_user', 16),
(59, '2018_04_05_095821_update_rating_questions_taable', 17),
(60, '2018_04_06_095802_update_banner_detail_table', 17),
(61, '2018_04_07_041436_create_individual_self_rating_table', 18),
(62, '2018_04_07_044202_create_ratings_and_reviews_table', 18),
(63, '2018_04_07_045021_create_ratings_table', 18),
(64, '2018_04_07_050442_create_reviews_table', 18),
(65, '2018_04_09_045544_update_user_account_types_table', 19),
(66, '2018_04_14_053333_update_notification_table', 20),
(67, '2018_04_14_053907_update_ratings_and_reviews_table', 20),
(68, '2018_04_14_074224_update_education_table', 20),
(69, '2018_04_16_043956_create_user_profile_logs', 21),
(70, '2018_04_16_083530_update_rating_usertype_table', 22),
(71, '2018_04_16_124504_create_invite_connect_table', 23),
(72, '2018_04_17_041944_create_company_admin_table', 23),
(73, '2018_04_18_035547_add_parameter_to_rating_questions', 24),
(74, '2018_04_18_085133_create_reviews_on_hold_table', 25),
(75, '2018_04_19_054016_create_profile_views', 26),
(76, '2018_04_19_060717_add_month_year_to_profile_views_table', 26),
(77, '2018_04_19_061024_update_notification_table', 26),
(78, '2018_04_26_115625_add_invite_to_banner_detail_table', 27),
(79, '2018_05_04_150156_alter_ratings_question_table', 28),
(80, '2018_05_07_121155_alter_how_it_works', 29),
(81, '2018_05_07_144539_alter_company_profile', 29),
(82, '2018_05_09_112845_create_chat_group_table', 30),
(83, '2018_05_09_113624_create_chat_group_user_table', 30),
(84, '2018_05_09_132122_create_chat_table', 30),
(85, '2018_05_09_185232_create_chat_status_table', 30),
(86, '2018_05_11_132819_update_user_table', 30),
(88, '2018_05_11_195159_update_chat_table', 31),
(89, '2018_05_15_113224_update_chaat_table', 31),
(90, '2018_05_24_125653_add_job_limit_to_user_account_types', 32),
(91, '2018_05_24_172801_add_profile_id_to_profile_views_table', 33),
(92, '2018_05_25_160046_add_slider_detail_to_ratings_and_reviews', 33),
(93, '2018_05_24_182402_create_jobs_table', 34),
(94, '2018_05_24_183752_create_applied_jobs_table', 34),
(95, '2018_05_24_190820_create_jobs_viewed_table', 34),
(96, '2018_05_29_183310_add_url_to_users_table', 34),
(97, '2018_06_01_171253_add_job_banner_to_banner_detail', 34),
(98, '2018_06_02_140502_alter_job_table_remove_attribute', 34),
(99, '2018_06_02_140535_create_job_attributes_table', 34),
(100, '2018_06_08_210221_create_job_log_table', 35),
(101, '2018_06_08_204445_create_shortlisted_profiles_table', 36),
(102, '2018_06_09_122039_update_type_in_notifications_table', 36),
(103, '2018_06_08_200013_alter_ratings_and_reviews', 37),
(104, '2018_06_09_174050_add_job_reccomentdation_to_notifications', 38),
(105, '2018_06_09_214316_create_job_recommendation_table', 39),
(106, '2018_06_11_212513_create_profile_analytics_table', 40),
(107, '2018_06_12_181324_create_users_attributes_table', 41),
(108, '2018_06_12_195113_add_user_attribute_notification_to_natifications_table', 41),
(109, '2018_06_13_212912_create_search_log_table', 41),
(110, '2018_06_14_175137_create_job_reccomendation_unregistered', 42),
(111, '2018_06_15_134429_create_unregisterd_invite_table', 43),
(112, '2018_06_15_205708_create_staff_priority_table', 43),
(113, '2018_06_16_154535_change_type_rate_review_table', 43),
(114, '2018_06_16_181032_create_rating_invite_table', 43),
(115, '2018_06_18_155421_add_invite_to_rate_to_notifications', 44),
(116, '2018_06_18_172403_add_connection_to_notifications', 44),
(117, '2018_07_11_133252_create_get_360_table', 45),
(118, '2018_07_11_143132_add_get_to_rate_to_notification_table', 45),
(119, '2018_07_11_213013_create_newly_added_user', 46),
(120, '2018_07_14_131104_add_signup_notification_to_notifications_table', 47),
(121, '2018_07_14_171315_add_notification_table', 48),
(122, '2018_07_17_132702_create_job_credit_table', 49),
(123, '2018_07_17_132807_create_job_credit_log_table', 49),
(124, '2018_07_17_164428_create_credit_transaction_detail_table', 49),
(125, '2018_07_18_174134_create_job_candidate_log', 50),
(126, '2018_07_20_174129_create_rating_threshold_table', 51),
(127, '2018_07_23_135746_create_rating_credit_log_table', 52),
(128, '2018_07_25_133001_create_job_matching_log', 52),
(129, '2018_07_26_171906_add_options_to_notifications_table', 52),
(130, '2018_07_26_210123_alter_notification_table', 53),
(131, '2018_07_27_125931_add_type_to_job_credit_log_table', 54),
(132, '2018_07_27_184524_alter_notification_table_add_job_profile_match_coloum', 55),
(133, '2018_07_27_184524_alter_notification_table_add_job_profile_match_coloum', 55),
(134, '2018_07_30_204939_alter_job_table_add_status_coloumn', 56),
(135, '2018_08_01_193120_alter_table_credit_transaction_detail_add_credit_coloum', 57),
(136, '2018_08_01_212928_add_creditibilty_to_users_table', 58),
(137, '2018_04_14_053333_update_notification_reference_table', 59),
(138, '2018_05_07_144539_alter_company_profile_youtube', 60),
(139, '2018_08_02_210854_alter_rating_review_add_display', 60),
(140, '2018_08_04_201928_allow_indexing_to_the_column', 60),
(141, '2018_08_07_154111_create_strength_table', 61),
(142, '2018_08_09_165836_create_job_matching_fields', 62),
(143, '2018_08_22_174430_add_customer_id_to_transaction_detail', 63),
(145, '2018_08_22_180505_alter_customer_id_to_user_detail', 64);

-- --------------------------------------------------------

--
-- Table structure for table `newly_added_user`
--

CREATE TABLE `newly_added_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `new_user_id` int(10) UNSIGNED NOT NULL,
  `status` enum('approved','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newly_added_user`
--

INSERT INTO `newly_added_user` (`id`, `user_id`, `new_user_id`, `status`, `created_at`, `updated_at`) VALUES
(10, 15, 16, 'pending', '2018-07-31 12:37:12', NULL),
(11, 17, 20, 'pending', '2018-07-31 12:40:54', NULL),
(12, 17, 21, 'pending', '2018-07-31 15:48:29', NULL),
(13, 32, 24, 'pending', '2018-08-01 15:44:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `title`, `description`, `image`, `added_date`) VALUES
(1, 'Latest News', 'Read company reviews and ratings of over 400,000', 'crop_20180321093521.jpeg', '2018-03-26 22:18:04'),
(2, 'Ut aut reiciendis voluptatibus', 'Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.', 'crop_20180322083728.jpeg', '2018-03-22 08:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('rating_received','job_profile_match','invite_connection_to_rate','experience_match','dispute_rating','invitation_received','short_rating','recommendation_notification','job_viewing_notification','job_reccomendation','user_attribute_notification','invite_to_rate','connection_notification','connection_request_accepted','get_to_rate','signup_notification','expletive_review','credibility','paid_profile_view','unpaid_profile_view','profile_count','individual_profile') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_status` enum('pending','accepted','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `read_status` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_sent` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `reference_id`, `message`, `type`, `type_status`, `sender_id`, `receiver_id`, `read_status`, `email_sent`, `created_at`, `updated_at`) VALUES
(1, 0, '$5 has been deducted from your total Credits.', '', 'pending', 34, 34, 'no', 'yes', '2018-08-11 14:12:42', NULL),
(2, 51, '{JOB} job is posted matching to your profile.', 'job_profile_match', 'pending', 34, 28, 'no', 'yes', '2018-08-11 14:12:43', NULL),
(3, 52, '{JOB} job is posted matching to your profile.', 'job_profile_match', 'pending', 34, 28, 'no', 'yes', '2018-08-11 14:32:25', NULL),
(4, 52, '{JOB} job is posted matching to your profile.', 'job_profile_match', 'pending', 34, 32, 'no', 'yes', '2018-08-11 14:32:25', NULL),
(5, 0, '$5 has been deducted from your total Credits.', '', 'pending', 34, 34, 'no', 'yes', '2018-08-11 14:32:26', NULL),
(6, 51, '{NAME} has viewed your job {PROFILE}.', 'job_viewing_notification', 'pending', 32, 34, 'no', 'yes', '2018-08-11 14:42:29', NULL),
(7, 0, '$5 has been deducted from your total Credits.', '', 'pending', 34, 34, 'no', 'yes', '2018-08-11 14:42:44', NULL),
(8, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 10:47:35', NULL),
(9, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 11:45:31', NULL),
(10, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 11:46:13', NULL),
(11, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 12:01:39', NULL),
(12, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 12:05:13', NULL),
(13, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 12:12:56', NULL),
(14, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 12:39:55', NULL),
(15, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 12:49:32', NULL),
(16, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 12:50:49', NULL),
(17, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 12:53:55', NULL),
(18, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 12:54:02', NULL),
(19, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 12:54:29', NULL),
(20, 36, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 32, 36, 'no', 'yes', '2018-08-14 12:54:34', NULL),
(21, NULL, 'Thank you for signing up with 360 Reference. Start by giving or asking for 360!s. Have fun!', 'signup_notification', 'accepted', 0, 0, 'no', 'yes', '2018-08-22 12:20:25', NULL),
(22, NULL, 'Thank you for signing up with 360 Reference. Start by giving or asking for 360!s. Have fun!', 'signup_notification', 'accepted', 18, 18, 'no', 'no', '2018-08-22 15:12:20', NULL),
(23, 42, 'You might have worked with {NAME} at {COMPANY_NAME} in {YEAR}. Give {NAME} a 360!  ', 'experience_match', 'pending', 18, 0, 'no', 'yes', '2018-08-22 15:12:59', NULL),
(24, NULL, 'Thank you for signing up with 360 Reference. Start by giving or asking for 360!s. Have fun!', 'signup_notification', 'accepted', 19, 19, 'no', 'yes', '2018-08-22 15:49:02', NULL),
(25, 42, 'You might have worked with {NAME} at {COMPANY_NAME} in {YEAR}. Give {NAME} a 360!  ', 'experience_match', 'pending', 19, 0, 'no', 'yes', '2018-08-22 15:49:29', NULL),
(26, 43, 'You might have worked with {NAME} at {COMPANY_NAME} in {YEAR}. Give {NAME} a 360!  ', 'experience_match', 'pending', 19, 18, 'no', 'no', '2018-08-22 15:49:29', NULL),
(27, NULL, 'Thank you for signing up with 360 Reference. Start by giving or asking for 360!s. Have fun!', 'signup_notification', 'accepted', 20, 18, 'no', 'no', '2018-08-22 15:55:20', NULL),
(28, 42, 'You might have worked with {NAME} at {COMPANY_NAME} in {YEAR}. Give {NAME} a 360!  ', 'experience_match', 'pending', 20, 18, 'no', 'no', '2018-08-22 15:56:36', NULL),
(29, 43, 'You might have worked with {NAME} at {COMPANY_NAME} in {YEAR}. Give {NAME} a 360!  ', 'experience_match', 'pending', 20, 18, 'no', 'no', '2018-08-22 15:56:36', NULL),
(30, 44, 'You might have worked with {NAME} at {COMPANY_NAME} in {YEAR}. Give {NAME} a 360!  ', 'experience_match', 'pending', 20, 18, 'no', 'no', '2018-08-22 15:56:36', NULL),
(31, NULL, 'Thank you for signing up with 360 Reference. Start by giving or asking for 360!s. Have fun!', 'signup_notification', 'accepted', 21, 21, 'no', 'yes', '2018-08-22 16:03:10', NULL),
(32, NULL, 'Thank you for signing up with 360 Reference. Start by giving or asking for 360!s. Have fun!', 'signup_notification', 'accepted', 23, 23, 'no', 'yes', '2018-08-27 09:58:26', NULL),
(33, NULL, 'Thank you for signing up with 360 Reference. Start by giving or asking for 360!s. Have fun!', 'signup_notification', 'accepted', 24, 24, 'no', 'yes', '2018-08-27 10:24:04', NULL),
(34, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:11:12', NULL),
(35, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:11:17', NULL),
(36, 90, '{SENDER} has rated on your profile.', 'rating_received', 'accepted', 13, 15, 'no', 'yes', '2018-08-28 15:12:18', NULL),
(37, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:12:35', NULL),
(38, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:13:26', NULL),
(39, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:13:40', NULL),
(40, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:17:10', NULL),
(41, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:17:35', NULL),
(42, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:18:04', NULL),
(43, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:18:53', NULL),
(44, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:19:02', NULL),
(45, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:19:18', NULL),
(46, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:19:33', NULL),
(47, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:23:17', NULL),
(48, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:23:27', NULL),
(49, 91, '{SENDER} has rated on your profile.', 'rating_received', 'accepted', 13, 15, 'no', 'yes', '2018-08-28 15:23:55', NULL),
(50, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 13, 15, 'no', 'yes', '2018-08-28 15:24:02', NULL),
(51, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 18, 15, 'no', 'yes', '2018-08-28 15:24:41', NULL),
(52, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 18, 15, 'no', 'yes', '2018-08-28 15:26:48', NULL),
(53, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 18, 15, 'no', 'yes', '2018-08-28 15:26:59', NULL),
(54, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 18, 15, 'no', 'yes', '2018-08-28 15:28:54', NULL),
(55, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 18, 15, 'no', 'yes', '2018-08-28 15:29:17', NULL),
(56, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 18, 15, 'no', 'yes', '2018-08-28 15:29:59', NULL),
(57, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 18, 15, 'no', 'yes', '2018-08-28 15:30:24', NULL),
(58, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 18, 15, 'no', 'yes', '2018-08-28 15:32:09', NULL),
(59, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 18, 15, 'no', 'yes', '2018-08-28 16:05:08', NULL),
(60, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 18, 15, 'no', 'yes', '2018-08-29 11:01:09', NULL),
(61, 43, '{NAME} has viewed your job {PROFILE}.', 'job_viewing_notification', 'pending', 13, 31, 'no', 'yes', '2018-08-29 16:33:46', NULL),
(62, 15, 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!', 'unpaid_profile_view', 'pending', 18, 15, 'no', 'yes', '2018-08-30 06:31:28', NULL),
(63, 1, '{SENDER} has invite you to connect {SITENAME}.', 'connection_notification', 'pending', 18, 15, 'no', 'yes', '2018-08-30 06:46:39', NULL),
(64, 2, '{SENDER} has invite you to connect {SITENAME}.', 'connection_notification', 'pending', 18, 13, 'no', 'yes', '2018-08-30 06:46:49', NULL),
(65, 20, '{NAME} just viewed  your profile. View {FIRST_NAME}\'s profile!', 'paid_profile_view', 'pending', 11, 20, 'no', 'yes', '2018-08-30 08:11:30', NULL),
(66, 7, '$5 has been deducted from your total Credits.', '', 'pending', 11, 11, 'no', 'yes', '2018-08-30 08:20:52', NULL),
(67, 52, '{NAME} has viewed your job {PROFILE}.', 'job_viewing_notification', 'pending', 16, 34, 'no', 'yes', '2018-08-30 08:52:02', NULL),
(68, 11, '{NAME} just viewed  your profile. View {FIRST_NAME}\'s profile!', 'paid_profile_view', 'pending', 16, 11, 'no', 'yes', '2018-08-30 08:54:03', NULL),
(69, 11, '{NAME} just viewed  your profile. View {FIRST_NAME}\'s profile!', 'paid_profile_view', 'pending', 16, 11, 'no', 'yes', '2018-08-30 08:54:08', NULL),
(70, 92, '{SENDER} has rated on your profile.', 'rating_received', 'accepted', 16, 11, 'no', 'yes', '2018-08-30 08:54:30', NULL),
(71, 11, '{NAME} just viewed  your profile. View {FIRST_NAME}\'s profile!', 'paid_profile_view', 'pending', 16, 11, 'no', 'yes', '2018-08-30 08:54:38', NULL),
(72, 93, '{SENDER} has rated on your profile.', 'rating_received', 'accepted', 16, 11, 'no', 'yes', '2018-08-30 08:55:00', NULL),
(73, 11, '{NAME} just viewed  your profile. View {FIRST_NAME}\'s profile!', 'paid_profile_view', 'pending', 16, 11, 'no', 'yes', '2018-08-30 08:55:05', NULL),
(74, 40, '{NAME} has viewed your job {PROFILE}.', 'job_viewing_notification', 'pending', 13, 30, 'no', 'yes', '2018-08-30 13:56:09', NULL),
(75, 7, '$5 has been deducted from your total Credits.', '', 'pending', 11, 11, 'no', 'yes', '2018-08-30 13:56:51', NULL),
(76, 0, 'You have completed 20% of your profile. Complete your profile to get more views and connections!!!', 'individual_profile', 'pending', 13, 13, 'no', 'yes', '2018-08-30 13:57:20', NULL),
(77, 54, '{NAME} has viewed your job {PROFILE}.', 'job_viewing_notification', 'pending', 13, 11, 'no', 'yes', '2018-08-30 13:57:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification_settings`
--

CREATE TABLE `notification_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('email','daily_digest') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_settings`
--

INSERT INTO `notification_settings` (`id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(2, 28, 'email', NULL, '2018-08-01 13:18:44'),
(3, 29, 'email', NULL, NULL),
(4, 30, 'email', NULL, NULL),
(5, 31, 'email', NULL, NULL),
(6, 32, 'email', NULL, NULL),
(7, 33, 'email', NULL, NULL),
(8, 34, 'email', NULL, NULL),
(9, 35, 'email', NULL, NULL),
(10, 36, 'email', NULL, NULL),
(11, 37, 'email', NULL, NULL),
(12, 38, 'email', NULL, NULL),
(13, 39, 'email', NULL, NULL),
(14, 40, 'email', NULL, NULL),
(15, 41, 'email', NULL, NULL),
(16, 42, 'email', NULL, NULL),
(17, 43, 'email', NULL, NULL),
(18, 44, 'email', NULL, NULL),
(19, 54, 'email', NULL, NULL),
(20, 55, 'email', NULL, NULL),
(21, 56, 'email', NULL, NULL),
(0, 0, 'email', NULL, NULL),
(0, 18, 'email', NULL, NULL),
(0, 19, 'email', NULL, NULL),
(0, 20, 'email', NULL, NULL),
(0, 21, 'email', NULL, NULL),
(0, 23, 'email', NULL, NULL),
(0, 24, 'email', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification_template`
--

CREATE TABLE `notification_template` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_template`
--

INSERT INTO `notification_template` (`id`, `title`, `message`) VALUES
(1, 'rating_received', '{SENDER} has rated on your profile.'),
(2, 'dispute_rating', '{SENDER} has disputed your review.'),
(3, 'short_rating', 'You are short of ratings! Invite your connections to rate you so that your average rating is improved and your visibility increases to your employer.'),
(4, 'invitation_received', '{SENDER} has sent you an invitation to connect.'),
(5, 'recommendation_notification', '{SENDER} has recommended you to rate {RATE}.'),
(6, 'connection_notification', '{SENDER} has invite you to connect {SITENAME}.'),
(7, 'connection_request_accepted', '{SENDER} has accepted your connection request.'),
(8, 'signup_notification', 'Thank you for signing up with 360 Reference. Start by giving or asking for 360!s. Have fun!'),
(9, 'expletive_review', 'It looks like you might have used an expletive in your review to {USER}. 360 Reference encourages mutual respect and constructive, non-abusive feedback. Your review is now pending review'),
(10, 'review_approved', 'Admin has approved your rating on {SENDER}\'s profile.'),
(11, 'job_viewing_notification', '{NAME} has viewed your job {PROFILE}.'),
(12, 'job_reccomendation', '{NAME} has recommended you to apply for {JOB} job.'),
(13, 'invite_to_rate', '{SENDER} has invite you to rate.'),
(14, 'job_profile_match', '{JOB} job is posted matching to your profile.'),
(15, 'user_attribute_notification', 'Job is posted related to your profile'),
(16, 'get_to_rate', '{SENDER} has invited to rate .'),
(17, 'job_viewing_notification', '{NAME} has viewed your job {PROFILE}'),
(18, 'individual_profile', 'You have completed {PROGRESS}% of your profile. Complete your profile to get more views and connections!!!'),
(19, 'unpaid_profile_view', 'Someone just viewed your profile. Subscribe to 360! Individual Premium to find out who\'s interested!'),
(20, 'paid_profile_view', '{NAME} just viewed  your profile. View {FIRST_NAME}\'s profile!'),
(21, 'credibility', 'Congratulations on getting {AMOUNT} 360!s. You have attained {TYPE} credibility.');

-- --------------------------------------------------------

--
-- Table structure for table `operating_hours`
--

CREATE TABLE `operating_hours` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `day` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day_status` enum('open','closed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_time` text COLLATE utf8mb4_unicode_ci,
  `open_meridian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `close_time` text COLLATE utf8mb4_unicode_ci,
  `close_meridian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operating_hours`
--

INSERT INTO `operating_hours` (`id`, `user_id`, `day`, `day_status`, `open_time`, `open_meridian`, `close_time`, `close_meridian`, `created_at`, `updated_at`) VALUES
(211, 30, 'Monday', 'open', '1:00', 'AM', '7:00', 'AM', '2018-04-20 06:00:51', '2018-04-20 06:00:51'),
(212, 30, 'Tuesday', 'open', '1:00', 'AM', '7:00', 'AM', '2018-04-20 06:00:51', '2018-04-20 06:00:51'),
(213, 30, NULL, 'closed', '1:00', 'AM', '1:00', 'AM', '2018-04-20 06:00:51', '2018-04-20 06:00:51'),
(214, 30, NULL, 'closed', '1:00', 'AM', '1:00', 'AM', '2018-04-20 06:00:51', '2018-04-20 06:00:51'),
(215, 30, NULL, 'closed', '1:00', 'AM', '1:00', 'AM', '2018-04-20 06:00:51', '2018-04-20 06:00:51'),
(216, 30, NULL, 'closed', '1:00', 'AM', '1:00', 'AM', '2018-04-20 06:00:51', '2018-04-20 06:00:51'),
(271, 33, 'Monday', 'open', '1:00', 'AM', '1:00', 'AM', '2018-05-07 10:12:32', '2018-05-07 10:12:32'),
(272, 33, 'Tuesday', 'open', '1:00', 'AM', '1:00', 'AM', '2018-05-07 10:12:33', '2018-05-07 10:12:33'),
(273, 33, 'Wednesday', 'open', '1:00', 'AM', '1:00', 'AM', '2018-05-07 10:12:33', '2018-05-07 10:12:33'),
(274, 33, NULL, 'closed', '1:00', 'AM', '1:00', 'AM', '2018-05-07 10:12:33', '2018-05-07 10:12:33'),
(275, 33, NULL, 'closed', '1:00', 'AM', '1:00', 'AM', '2018-05-07 10:12:33', '2018-05-07 10:12:33'),
(276, 33, NULL, 'closed', '1:00', 'AM', '1:00', 'AM', '2018-05-07 10:12:33', '2018-05-07 10:12:33'),
(277, 31, 'Monday', 'open', '5:00', 'AM', '9:00', 'PM', '2018-05-08 08:39:46', '2018-05-08 08:39:46'),
(278, 31, NULL, 'closed', '1:00', 'AM', '1:00', 'AM', '2018-05-08 08:39:46', '2018-05-08 08:39:46'),
(279, 31, 'Wednesday', 'open', '5:00', 'AM', '9:00', 'PM', '2018-05-08 08:39:46', '2018-05-08 08:39:46'),
(280, 31, NULL, 'closed', '1:00', 'AM', '1:00', 'AM', '2018-05-08 08:39:46', '2018-05-08 08:39:46'),
(281, 31, 'Friday', 'open', '5:00', 'AM', '9:00', 'PM', '2018-05-08 08:39:46', '2018-05-08 08:39:46'),
(282, 31, 'Saturday', 'open', '5:00', 'AM', '9:00', 'PM', '2018-05-08 08:39:46', '2018-05-08 08:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `password_resets_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_same_company_notifications`
--

CREATE TABLE `pending_same_company_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pending_same_company_notifications`
--

INSERT INTO `pending_same_company_notifications` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(10, 28, NULL, NULL),
(11, 29, NULL, NULL),
(12, 32, NULL, NULL),
(13, 34, NULL, NULL),
(14, 35, NULL, NULL),
(15, 36, NULL, NULL),
(16, 37, NULL, NULL),
(17, 39, NULL, NULL),
(18, 40, NULL, NULL),
(19, 55, NULL, NULL),
(20, 56, NULL, NULL),
(0, 0, NULL, NULL),
(0, 18, NULL, NULL),
(0, 19, NULL, NULL),
(0, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profile_analytics`
--

CREATE TABLE `profile_analytics` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_analytics`
--

INSERT INTO `profile_analytics` (`id`, `user_id`, `profile_id`, `created_at`, `updated_at`) VALUES
(1, 31, 32, '2018-08-02 13:18:03', '2018-08-02 13:18:03'),
(2, 31, 32, '2018-08-07 13:48:04', '2018-08-07 13:48:04'),
(3, 31, 32, '2018-08-03 13:48:49', '2018-08-03 13:48:49'),
(4, 54, 32, '2018-08-07 13:49:30', '2018-08-07 13:49:30'),
(5, 54, 32, '2018-08-01 13:49:30', '2018-08-01 13:49:30'),
(6, 31, 32, '2018-08-01 13:49:30', '2018-08-01 13:49:30'),
(7, 29, 32, '2018-08-01 13:49:30', '2018-08-01 13:49:30'),
(8, 32, 31, '2018-08-07 13:57:29', '2018-08-07 13:57:29'),
(9, 32, 54, '2018-08-07 13:57:51', '2018-08-07 13:57:51'),
(10, 54, 36, '2018-08-07 14:05:43', '2018-08-07 14:05:43'),
(11, 54, 41, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(12, 51, 41, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(13, 49, 41, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(14, 48, 41, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(15, 40, 41, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(16, 41, 41, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(17, 42, 41, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(18, 43, 41, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(19, 43, 41, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(20, 44, 41, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(21, 45, 41, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(22, 51, 54, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(23, 49, 54, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(24, 48, 54, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(25, 40, 54, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(26, 41, 54, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(27, 42, 54, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(28, 43, 54, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(29, 43, 54, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(30, 44, 54, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(31, 45, 54, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(32, 53, 54, '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(33, 41, 54, '2018-08-08 10:03:40', '2018-08-08 10:03:40'),
(34, 54, 34, '2018-08-08 10:16:27', '2018-08-08 10:16:27'),
(35, 41, 37, '2018-08-08 10:16:42', '2018-08-08 10:16:42'),
(36, 41, 34, '2018-08-08 10:16:47', '2018-08-08 10:16:47'),
(37, 54, 36, '2018-08-08 10:20:44', '2018-08-08 10:20:44'),
(38, 41, 36, '2018-08-08 10:21:03', '2018-08-08 10:21:03'),
(39, 54, 35, '2018-08-08 10:31:44', '2018-08-08 10:31:44'),
(40, 32, 34, '2018-08-10 10:13:44', '2018-08-10 10:13:44'),
(41, 32, 41, '2018-08-10 10:17:46', '2018-08-10 10:17:46'),
(42, 32, 35, '2018-08-11 12:19:41', '2018-08-11 12:19:41'),
(43, 32, 36, '2018-08-14 10:47:35', '2018-08-14 10:47:35'),
(44, 31, 37, '2018-08-16 15:06:38', '2018-08-16 15:06:38'),
(45, 13, 15, '2018-08-28 15:11:12', '2018-08-28 15:11:12'),
(46, 18, 15, '2018-08-28 15:24:41', '2018-08-28 15:24:41'),
(47, 18, 15, '2018-08-29 11:01:09', '2018-08-29 11:01:09'),
(48, 13, 15, '2018-08-29 16:30:24', '2018-08-29 16:30:24'),
(49, 18, 15, '2018-08-30 06:31:28', '2018-08-30 06:31:28'),
(50, 11, 20, '2018-08-30 08:11:27', '2018-08-30 08:11:27'),
(51, 16, 11, '2018-08-30 08:54:03', '2018-08-30 08:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `profile_views`
--

CREATE TABLE `profile_views` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(10) UNSIGNED DEFAULT NULL,
  `views` int(11) NOT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_views`
--

INSERT INTO `profile_views` (`id`, `user_id`, `profile_id`, `views`, `month`, `year`, `created_at`, `updated_at`) VALUES
(16, 28, NULL, 1, '04', '2018', NULL, NULL),
(17, 28, NULL, 1, '04', '2018', NULL, NULL),
(18, 29, NULL, 1, '04', '2018', NULL, NULL),
(19, 29, NULL, 1, '04', '2018', NULL, NULL),
(20, 28, NULL, 1, '04', '2018', NULL, NULL),
(21, 28, NULL, 1, '04', '2018', NULL, NULL),
(22, 28, NULL, 1, '04', '2018', NULL, NULL),
(23, 28, NULL, 1, '04', '2018', NULL, NULL),
(24, 28, NULL, 1, '04', '2018', NULL, NULL),
(25, 28, NULL, 1, '04', '2018', NULL, NULL),
(26, 28, NULL, 1, '04', '2018', NULL, NULL),
(27, 28, NULL, 1, '04', '2018', NULL, NULL),
(28, 28, NULL, 1, '04', '2018', NULL, NULL),
(29, 28, NULL, 1, '04', '2018', NULL, NULL),
(30, 28, NULL, 1, '04', '2018', NULL, NULL),
(31, 30, NULL, 1, '04', '2018', NULL, NULL),
(32, 30, NULL, 1, '04', '2018', NULL, NULL),
(33, 30, NULL, 1, '04', '2018', NULL, NULL),
(34, 30, NULL, 1, '04', '2018', NULL, NULL),
(35, 30, NULL, 1, '04', '2018', NULL, NULL),
(36, 30, NULL, 1, '04', '2018', NULL, NULL),
(37, 30, NULL, 1, '04', '2018', NULL, NULL),
(38, 30, NULL, 1, '04', '2018', NULL, NULL),
(39, 30, NULL, 1, '04', '2018', NULL, NULL),
(40, 30, NULL, 1, '04', '2018', NULL, NULL),
(41, 30, NULL, 1, '04', '2018', NULL, NULL),
(42, 30, NULL, 1, '04', '2018', NULL, NULL),
(43, 30, NULL, 1, '04', '2018', NULL, NULL),
(44, 30, NULL, 1, '04', '2018', NULL, NULL),
(45, 30, NULL, 1, '04', '2018', NULL, NULL),
(46, 30, NULL, 1, '04', '2018', NULL, NULL),
(47, 30, NULL, 1, '04', '2018', NULL, NULL),
(48, 30, NULL, 1, '04', '2018', NULL, NULL),
(49, 30, NULL, 1, '04', '2018', NULL, NULL),
(50, 30, NULL, 1, '04', '2018', NULL, NULL),
(51, 30, NULL, 1, '04', '2018', NULL, NULL),
(52, 30, NULL, 1, '04', '2018', NULL, NULL),
(53, 32, NULL, 1, '04', '2018', NULL, NULL),
(54, 30, NULL, 1, '04', '2018', NULL, NULL),
(55, 30, NULL, 1, '04', '2018', NULL, NULL),
(56, 30, NULL, 1, '04', '2018', NULL, NULL),
(57, 30, NULL, 1, '04', '2018', NULL, NULL),
(58, 32, NULL, 1, '04', '2018', NULL, NULL),
(59, 30, NULL, 1, '04', '2018', NULL, NULL),
(60, 32, NULL, 1, '04', '2018', NULL, NULL),
(61, 34, NULL, 1, '04', '2018', NULL, NULL),
(62, 32, NULL, 1, '04', '2018', NULL, NULL),
(63, 32, NULL, 1, '04', '2018', NULL, NULL),
(64, 30, NULL, 1, '04', '2018', NULL, NULL),
(65, 30, NULL, 1, '04', '2018', NULL, NULL),
(66, 30, NULL, 1, '04', '2018', NULL, NULL),
(67, 32, NULL, 1, '04', '2018', NULL, NULL),
(68, 35, NULL, 1, '04', '2018', NULL, NULL),
(69, 30, NULL, 1, '04', '2018', NULL, NULL),
(70, 30, NULL, 1, '04', '2018', NULL, NULL),
(71, 33, NULL, 1, '04', '2018', NULL, NULL),
(72, 30, NULL, 1, '04', '2018', NULL, NULL),
(73, 35, NULL, 1, '04', '2018', NULL, NULL),
(74, 30, NULL, 1, '04', '2018', NULL, NULL),
(75, 30, NULL, 1, '04', '2018', NULL, NULL),
(76, 35, NULL, 1, '04', '2018', NULL, NULL),
(77, 35, NULL, 1, '04', '2018', NULL, NULL),
(78, 35, NULL, 1, '04', '2018', NULL, NULL),
(79, 35, NULL, 1, '04', '2018', NULL, NULL),
(80, 33, NULL, 1, '04', '2018', NULL, NULL),
(81, 31, NULL, 1, '04', '2018', NULL, NULL),
(82, 33, NULL, 1, '04', '2018', NULL, NULL),
(83, 33, NULL, 1, '04', '2018', NULL, NULL),
(84, 33, NULL, 1, '04', '2018', NULL, NULL),
(85, 31, NULL, 1, '04', '2018', NULL, NULL),
(86, 28, NULL, 1, '04', '2018', NULL, NULL),
(87, 28, NULL, 1, '04', '2018', NULL, NULL),
(88, 28, NULL, 1, '04', '2018', NULL, NULL),
(89, 28, NULL, 1, '04', '2018', NULL, NULL),
(90, 28, NULL, 1, '04', '2018', NULL, NULL),
(91, 28, NULL, 1, '04', '2018', NULL, NULL),
(92, 28, NULL, 1, '04', '2018', NULL, NULL),
(93, 28, NULL, 1, '04', '2018', NULL, NULL),
(94, 28, NULL, 1, '04', '2018', NULL, NULL),
(95, 28, NULL, 1, '04', '2018', NULL, NULL),
(96, 28, NULL, 1, '04', '2018', NULL, NULL),
(97, 28, NULL, 1, '04', '2018', NULL, NULL),
(98, 28, NULL, 1, '04', '2018', NULL, NULL),
(99, 28, NULL, 1, '04', '2018', NULL, NULL),
(100, 35, NULL, 1, '04', '2018', NULL, NULL),
(101, 28, NULL, 1, '04', '2018', NULL, NULL),
(102, 28, NULL, 1, '04', '2018', NULL, NULL),
(103, 35, NULL, 1, '04', '2018', NULL, NULL),
(104, 35, NULL, 1, '04', '2018', NULL, NULL),
(105, 28, NULL, 1, '04', '2018', NULL, NULL),
(106, 28, NULL, 1, '04', '2018', NULL, NULL),
(107, 28, NULL, 1, '04', '2018', NULL, NULL),
(108, 37, NULL, 1, '04', '2018', NULL, NULL),
(109, 37, NULL, 1, '04', '2018', NULL, NULL),
(110, 37, NULL, 1, '04', '2018', NULL, NULL),
(111, 37, NULL, 1, '04', '2018', NULL, NULL),
(112, 37, NULL, 1, '04', '2018', NULL, NULL),
(113, 37, NULL, 1, '04', '2018', NULL, NULL),
(114, 37, NULL, 1, '04', '2018', NULL, NULL),
(115, 37, NULL, 1, '04', '2018', NULL, NULL),
(116, 37, NULL, 1, '04', '2018', NULL, NULL),
(117, 37, NULL, 1, '04', '2018', NULL, NULL),
(118, 37, NULL, 1, '04', '2018', NULL, NULL),
(119, 37, NULL, 1, '04', '2018', NULL, NULL),
(120, 37, NULL, 1, '04', '2018', NULL, NULL),
(121, 37, NULL, 1, '04', '2018', NULL, NULL),
(122, 37, NULL, 1, '04', '2018', NULL, NULL),
(123, 37, NULL, 1, '04', '2018', NULL, NULL),
(124, 37, NULL, 1, '04', '2018', NULL, NULL),
(125, 37, NULL, 1, '04', '2018', NULL, NULL),
(126, 37, NULL, 1, '04', '2018', NULL, NULL),
(127, 37, NULL, 1, '04', '2018', NULL, NULL),
(128, 37, NULL, 1, '04', '2018', NULL, NULL),
(129, 37, NULL, 1, '04', '2018', NULL, NULL),
(130, 37, NULL, 1, '04', '2018', NULL, NULL),
(131, 37, NULL, 1, '04', '2018', NULL, NULL),
(132, 37, NULL, 1, '04', '2018', NULL, NULL),
(133, 37, NULL, 1, '04', '2018', NULL, NULL),
(134, 37, NULL, 1, '04', '2018', NULL, NULL),
(135, 37, NULL, 1, '04', '2018', NULL, NULL),
(136, 37, NULL, 1, '04', '2018', NULL, NULL),
(137, 37, NULL, 1, '04', '2018', NULL, NULL),
(138, 37, NULL, 1, '04', '2018', NULL, NULL),
(139, 28, NULL, 1, '04', '2018', NULL, NULL),
(140, 28, NULL, 1, '04', '2018', NULL, NULL),
(141, 28, NULL, 1, '04', '2018', NULL, NULL),
(142, 36, NULL, 1, '04', '2018', NULL, NULL),
(143, 28, NULL, 1, '04', '2018', NULL, NULL),
(144, 32, NULL, 1, '04', '2018', NULL, NULL),
(145, 32, NULL, 1, '04', '2018', NULL, NULL),
(146, 32, NULL, 1, '04', '2018', NULL, NULL),
(147, 32, NULL, 1, '04', '2018', NULL, NULL),
(148, 35, NULL, 1, '04', '2018', NULL, NULL),
(149, 35, NULL, 1, '04', '2018', NULL, NULL),
(150, 35, NULL, 1, '04', '2018', NULL, NULL),
(151, 35, NULL, 1, '04', '2018', NULL, NULL),
(152, 28, NULL, 1, '04', '2018', NULL, NULL),
(153, 28, NULL, 1, '04', '2018', NULL, NULL),
(154, 35, NULL, 1, '04', '2018', NULL, NULL),
(155, 28, NULL, 1, '04', '2018', NULL, NULL),
(156, 28, NULL, 1, '04', '2018', NULL, NULL),
(157, 28, NULL, 1, '04', '2018', NULL, NULL),
(158, 28, NULL, 1, '04', '2018', NULL, NULL),
(159, 28, NULL, 1, '04', '2018', NULL, NULL),
(160, 28, NULL, 1, '04', '2018', NULL, NULL),
(161, 28, NULL, 1, '04', '2018', NULL, NULL),
(162, 28, NULL, 1, '04', '2018', NULL, NULL),
(163, 28, NULL, 1, '04', '2018', NULL, NULL),
(164, 28, NULL, 1, '04', '2018', NULL, NULL),
(165, 28, NULL, 1, '04', '2018', NULL, NULL),
(166, 28, NULL, 1, '04', '2018', NULL, NULL),
(167, 28, NULL, 1, '04', '2018', NULL, NULL),
(168, 28, NULL, 1, '04', '2018', NULL, NULL),
(169, 28, NULL, 1, '04', '2018', NULL, NULL),
(170, 28, NULL, 1, '04', '2018', NULL, NULL),
(171, 28, NULL, 1, '04', '2018', NULL, NULL),
(172, 28, NULL, 1, '04', '2018', NULL, NULL),
(173, 33, NULL, 1, '04', '2018', NULL, NULL),
(174, 33, NULL, 1, '04', '2018', NULL, NULL),
(175, 28, NULL, 1, '04', '2018', NULL, NULL),
(176, 28, NULL, 1, '04', '2018', NULL, NULL),
(177, 28, NULL, 1, '04', '2018', NULL, NULL),
(178, 28, NULL, 1, '04', '2018', NULL, NULL),
(179, 28, NULL, 1, '04', '2018', NULL, NULL),
(180, 28, NULL, 1, '04', '2018', NULL, NULL),
(181, 28, NULL, 1, '04', '2018', NULL, NULL),
(182, 28, NULL, 1, '04', '2018', NULL, NULL),
(183, 28, NULL, 1, '04', '2018', NULL, NULL),
(184, 28, NULL, 1, '04', '2018', NULL, NULL),
(185, 28, NULL, 1, '04', '2018', NULL, NULL),
(186, 28, NULL, 1, '04', '2018', NULL, NULL),
(187, 28, NULL, 1, '04', '2018', NULL, NULL),
(188, 28, NULL, 1, '04', '2018', NULL, NULL),
(189, 28, NULL, 1, '04', '2018', NULL, NULL),
(190, 28, NULL, 1, '04', '2018', NULL, NULL),
(191, 28, NULL, 1, '04', '2018', NULL, NULL),
(192, 28, NULL, 1, '04', '2018', NULL, NULL),
(193, 28, NULL, 1, '04', '2018', NULL, NULL),
(194, 28, NULL, 1, '04', '2018', NULL, NULL),
(195, 28, NULL, 1, '04', '2018', NULL, NULL),
(196, 28, NULL, 1, '04', '2018', NULL, NULL),
(197, 28, NULL, 1, '04', '2018', NULL, NULL),
(198, 28, NULL, 1, '04', '2018', NULL, NULL),
(199, 28, NULL, 1, '04', '2018', NULL, NULL),
(200, 28, NULL, 1, '04', '2018', NULL, NULL),
(201, 28, NULL, 1, '04', '2018', NULL, NULL),
(202, 28, NULL, 1, '04', '2018', NULL, NULL),
(203, 28, NULL, 1, '04', '2018', NULL, NULL),
(204, 28, NULL, 1, '04', '2018', NULL, NULL),
(205, 28, NULL, 1, '04', '2018', NULL, NULL),
(206, 28, NULL, 1, '04', '2018', NULL, NULL),
(207, 28, NULL, 1, '04', '2018', NULL, NULL),
(208, 36, NULL, 1, '04', '2018', NULL, NULL),
(209, 36, NULL, 1, '04', '2018', NULL, NULL),
(210, 36, NULL, 1, '04', '2018', NULL, NULL),
(211, 36, NULL, 1, '04', '2018', NULL, NULL),
(212, 28, NULL, 1, '04', '2018', NULL, NULL),
(213, 28, NULL, 1, '04', '2018', NULL, NULL),
(214, 28, NULL, 1, '04', '2018', NULL, NULL),
(215, 28, NULL, 1, '04', '2018', NULL, NULL),
(216, 28, NULL, 1, '04', '2018', NULL, NULL),
(217, 28, NULL, 1, '04', '2018', NULL, NULL),
(218, 28, NULL, 1, '04', '2018', NULL, NULL),
(219, 30, NULL, 1, '04', '2018', NULL, NULL),
(220, 30, NULL, 1, '04', '2018', NULL, NULL),
(221, 30, NULL, 1, '04', '2018', NULL, NULL),
(222, 30, NULL, 1, '04', '2018', NULL, NULL),
(223, 30, NULL, 1, '04', '2018', NULL, NULL),
(224, 30, NULL, 1, '04', '2018', NULL, NULL),
(225, 30, NULL, 1, '04', '2018', NULL, NULL),
(226, 30, NULL, 1, '04', '2018', NULL, NULL),
(227, 30, NULL, 1, '04', '2018', NULL, NULL),
(228, 30, NULL, 1, '04', '2018', NULL, NULL),
(229, 30, NULL, 1, '04', '2018', NULL, NULL),
(230, 36, NULL, 1, '04', '2018', NULL, NULL),
(231, 36, NULL, 1, '04', '2018', NULL, NULL),
(232, 36, NULL, 1, '04', '2018', NULL, NULL),
(233, 35, NULL, 1, '04', '2018', NULL, NULL),
(234, 35, NULL, 1, '04', '2018', NULL, NULL),
(235, 35, NULL, 1, '04', '2018', NULL, NULL),
(236, 35, NULL, 1, '04', '2018', NULL, NULL),
(237, 36, NULL, 1, '04', '2018', NULL, NULL),
(238, 36, NULL, 1, '04', '2018', NULL, NULL),
(239, 36, NULL, 1, '04', '2018', NULL, NULL),
(240, 36, NULL, 1, '04', '2018', NULL, NULL),
(241, 36, NULL, 1, '04', '2018', NULL, NULL),
(242, 28, NULL, 1, '05', '2018', NULL, NULL),
(243, 36, NULL, 1, '05', '2018', NULL, NULL),
(244, 36, NULL, 1, '05', '2018', NULL, NULL),
(245, 28, NULL, 1, '05', '2018', NULL, NULL),
(246, 28, NULL, 1, '05', '2018', NULL, NULL),
(247, 35, NULL, 1, '05', '2018', NULL, NULL),
(248, 35, NULL, 1, '05', '2018', NULL, NULL),
(249, 36, NULL, 1, '05', '2018', NULL, NULL),
(250, 36, NULL, 1, '05', '2018', NULL, NULL),
(251, 36, NULL, 1, '05', '2018', NULL, NULL),
(252, 36, NULL, 1, '05', '2018', NULL, NULL),
(253, 36, NULL, 1, '05', '2018', NULL, NULL),
(254, 36, NULL, 1, '05', '2018', NULL, NULL),
(255, 36, NULL, 1, '05', '2018', NULL, NULL),
(256, 36, NULL, 1, '05', '2018', NULL, NULL),
(257, 36, NULL, 1, '05', '2018', NULL, NULL),
(258, 36, NULL, 1, '05', '2018', NULL, NULL),
(259, 36, NULL, 1, '05', '2018', NULL, NULL),
(260, 1, NULL, 1, '05', '2018', NULL, NULL),
(261, 1, NULL, 1, '05', '2018', NULL, NULL),
(262, 1, NULL, 1, '05', '2018', NULL, NULL),
(263, 1, NULL, 1, '05', '2018', NULL, NULL),
(264, 1, NULL, 1, '05', '2018', NULL, NULL),
(265, 1, NULL, 1, '05', '2018', NULL, NULL),
(266, 1, NULL, 1, '05', '2018', NULL, NULL),
(267, 34, NULL, 1, '05', '2018', NULL, NULL),
(268, 34, NULL, 1, '05', '2018', NULL, NULL),
(269, 1, NULL, 1, '05', '2018', NULL, NULL),
(270, 1, NULL, 1, '05', '2018', NULL, NULL),
(271, 1, NULL, 1, '05', '2018', NULL, NULL),
(272, 1, NULL, 1, '05', '2018', NULL, NULL),
(273, 34, NULL, 1, '05', '2018', NULL, NULL),
(274, 31, NULL, 1, '05', '2018', NULL, NULL),
(275, 31, NULL, 1, '05', '2018', NULL, NULL),
(276, 39, NULL, 1, '05', '2018', NULL, NULL),
(277, 28, NULL, 1, '05', '2018', NULL, NULL),
(278, 30, NULL, 1, '05', '2018', NULL, NULL),
(279, 30, NULL, 1, '05', '2018', NULL, NULL),
(280, 30, NULL, 1, '05', '2018', NULL, NULL),
(281, 35, NULL, 1, '05', '2018', NULL, NULL),
(282, 39, NULL, 1, '05', '2018', NULL, NULL),
(283, 35, NULL, 1, '05', '2018', NULL, NULL),
(284, 28, NULL, 1, '05', '2018', NULL, NULL),
(285, 31, NULL, 1, '05', '2018', NULL, NULL),
(286, 31, NULL, 1, '05', '2018', NULL, NULL),
(287, 35, NULL, 1, '05', '2018', NULL, NULL),
(288, 32, NULL, 1, '05', '2018', NULL, NULL),
(289, 32, NULL, 1, '05', '2018', NULL, NULL),
(290, 32, NULL, 1, '05', '2018', NULL, NULL),
(291, 28, NULL, 1, '05', '2018', NULL, NULL),
(292, 36, NULL, 1, '05', '2018', NULL, NULL),
(293, 36, NULL, 1, '05', '2018', NULL, NULL),
(294, 34, NULL, 1, '05', '2018', NULL, NULL),
(295, 34, NULL, 1, '05', '2018', NULL, NULL),
(296, 34, NULL, 1, '05', '2018', NULL, NULL),
(297, 32, NULL, 1, '05', '2018', NULL, NULL),
(298, 32, NULL, 1, '05', '2018', NULL, NULL),
(299, 32, NULL, 1, '05', '2018', NULL, NULL),
(300, 32, NULL, 1, '05', '2018', NULL, NULL),
(301, 28, NULL, 1, '05', '2018', NULL, NULL),
(302, 28, NULL, 1, '05', '2018', NULL, NULL),
(303, 32, NULL, 1, '05', '2018', NULL, NULL),
(304, 32, NULL, 1, '05', '2018', NULL, NULL),
(305, 32, NULL, 1, '05', '2018', NULL, NULL),
(306, 28, NULL, 1, '05', '2018', NULL, NULL),
(307, 32, NULL, 1, '05', '2018', NULL, NULL),
(308, 36, NULL, 1, '05', '2018', NULL, NULL),
(309, 36, NULL, 1, '05', '2018', NULL, NULL),
(310, 36, NULL, 1, '05', '2018', NULL, NULL),
(311, 37, NULL, 1, '05', '2018', NULL, NULL),
(312, 28, NULL, 1, '05', '2018', NULL, NULL),
(313, 28, NULL, 1, '05', '2018', NULL, NULL),
(314, 28, NULL, 1, '05', '2018', NULL, NULL),
(315, 36, NULL, 1, '05', '2018', NULL, NULL),
(316, 36, NULL, 1, '05', '2018', NULL, NULL),
(317, 35, NULL, 1, '05', '2018', NULL, NULL),
(318, 32, NULL, 1, '05', '2018', NULL, NULL),
(319, 36, NULL, 1, '05', '2018', NULL, NULL),
(320, 36, NULL, 1, '05', '2018', NULL, NULL),
(321, 35, NULL, 1, '05', '2018', NULL, NULL),
(322, 35, NULL, 1, '05', '2018', NULL, NULL),
(323, 35, NULL, 1, '05', '2018', NULL, NULL),
(324, 28, NULL, 1, '05', '2018', NULL, NULL),
(325, 28, NULL, 1, '05', '2018', NULL, NULL),
(326, 28, NULL, 1, '05', '2018', NULL, NULL),
(327, 35, NULL, 1, '05', '2018', NULL, NULL),
(328, 28, NULL, 1, '05', '2018', NULL, NULL),
(329, 28, NULL, 1, '05', '2018', NULL, NULL),
(330, 28, NULL, 1, '05', '2018', NULL, NULL),
(331, 28, NULL, 1, '05', '2018', NULL, NULL),
(332, 28, NULL, 1, '05', '2018', NULL, NULL),
(333, 28, NULL, 1, '05', '2018', NULL, NULL),
(334, 28, NULL, 1, '05', '2018', NULL, NULL),
(335, 28, NULL, 1, '05', '2018', NULL, NULL),
(336, 28, NULL, 1, '05', '2018', NULL, NULL),
(337, 28, NULL, 1, '05', '2018', NULL, NULL),
(338, 28, NULL, 1, '05', '2018', NULL, NULL),
(339, 28, NULL, 1, '05', '2018', NULL, NULL),
(340, 28, NULL, 1, '05', '2018', NULL, NULL),
(341, 28, NULL, 1, '05', '2018', NULL, NULL),
(342, 29, NULL, 1, '05', '2018', NULL, NULL),
(343, 32, NULL, 1, '05', '2018', NULL, NULL),
(344, 32, NULL, 1, '05', '2018', NULL, NULL),
(345, 32, NULL, 1, '05', '2018', NULL, NULL),
(346, 32, NULL, 1, '05', '2018', NULL, NULL),
(347, 28, NULL, 1, '05', '2018', NULL, NULL),
(348, 35, 28, 1, '05', '2018', '2018-05-28 14:29:13', '2018-05-28 14:29:13'),
(349, 35, 28, 1, '05', '2018', '2018-05-28 14:30:55', '2018-05-28 14:30:55'),
(350, 35, 28, 1, '05', '2018', '2018-05-28 14:31:12', '2018-05-28 14:31:12'),
(351, 35, 28, 1, '05', '2018', '2018-05-28 14:31:12', '2018-05-28 14:31:12'),
(352, 32, 28, 1, '05', '2018', '2018-05-28 14:31:55', '2018-05-28 14:31:55'),
(353, 32, 28, 1, '05', '2018', '2018-05-28 14:34:03', '2018-05-28 14:34:03'),
(354, 28, 35, 1, '05', '2018', '2018-05-28 14:38:11', '2018-05-28 14:38:11'),
(355, 35, 28, 1, '05', '2018', '2018-05-28 14:39:19', '2018-05-28 14:39:19'),
(356, 37, 35, 1, '05', '2018', '2018-05-28 14:40:33', '2018-05-28 14:40:33'),
(357, 32, 28, 1, '05', '2018', '2018-05-28 14:41:42', '2018-05-28 14:41:42'),
(358, 28, 35, 1, '05', '2018', '2018-05-28 14:43:08', '2018-05-28 14:43:08'),
(359, 28, 35, 1, '05', '2018', '2018-05-28 14:45:04', '2018-05-28 14:45:04'),
(360, 32, 35, 1, '05', '2018', '2018-05-28 14:46:25', '2018-05-28 14:46:25'),
(361, 32, 35, 1, '05', '2018', '2018-05-28 15:08:57', '2018-05-28 15:08:57'),
(362, 39, 28, 1, '05', '2018', '2018-05-30 06:20:13', '2018-05-30 06:20:13'),
(363, 39, 28, 1, '05', '2018', '2018-05-30 06:20:22', '2018-05-30 06:20:22'),
(364, 32, 28, 1, '05', '2018', '2018-05-30 06:24:20', '2018-05-30 06:24:20'),
(365, 32, 28, 1, '05', '2018', '2018-05-30 06:24:32', '2018-05-30 06:24:32'),
(366, 37, 28, 1, '05', '2018', '2018-05-30 06:30:22', '2018-05-30 06:30:22'),
(367, 37, 28, 1, '05', '2018', '2018-05-30 06:30:27', '2018-05-30 06:30:27'),
(368, 39, 28, 1, '05', '2018', '2018-05-30 06:33:17', '2018-05-30 06:33:17'),
(369, 36, 29, 1, '05', '2018', '2018-05-30 06:44:01', '2018-05-30 06:44:01'),
(370, 36, 29, 1, '05', '2018', '2018-05-30 06:44:19', '2018-05-30 06:44:19'),
(371, 39, 28, 1, '05', '2018', '2018-05-30 06:50:03', '2018-05-30 06:50:03'),
(372, 37, 28, 1, '05', '2018', '2018-05-30 09:19:12', '2018-05-30 09:19:12'),
(373, 37, 28, 1, '05', '2018', '2018-05-30 09:19:23', '2018-05-30 09:19:23'),
(374, 28, 29, 1, '05', '2018', '2018-05-30 09:35:05', '2018-05-30 09:35:05'),
(375, 28, 29, 1, '05', '2018', '2018-05-30 09:35:07', '2018-05-30 09:35:07'),
(376, 28, 29, 1, '05', '2018', '2018-05-30 09:36:02', '2018-05-30 09:36:02'),
(377, 37, 28, 1, '05', '2018', '2018-05-30 11:25:15', '2018-05-30 11:25:15'),
(378, 37, 28, 1, '05', '2018', '2018-05-30 11:25:43', '2018-05-30 11:25:43'),
(379, 37, 28, 1, '05', '2018', '2018-05-30 11:26:03', '2018-05-30 11:26:03'),
(380, 32, 28, 1, '05', '2018', '2018-05-30 11:31:38', '2018-05-30 11:31:38'),
(381, 32, 28, 1, '05', '2018', '2018-05-30 11:31:42', '2018-05-30 11:31:42'),
(382, 32, 28, 1, '05', '2018', '2018-05-30 11:32:35', '2018-05-30 11:32:35'),
(383, 37, 28, 1, '05', '2018', '2018-05-30 11:47:51', '2018-05-30 11:47:51'),
(384, 37, 28, 1, '05', '2018', '2018-05-30 11:47:51', '2018-05-30 11:47:51'),
(385, 37, 28, 1, '05', '2018', '2018-05-30 11:47:52', '2018-05-30 11:47:52'),
(386, 37, 28, 1, '05', '2018', '2018-05-30 11:47:53', '2018-05-30 11:47:53'),
(387, 37, 28, 1, '05', '2018', '2018-05-30 11:47:54', '2018-05-30 11:47:54'),
(388, 37, 28, 1, '05', '2018', '2018-05-30 11:47:54', '2018-05-30 11:47:54'),
(389, 37, 28, 1, '05', '2018', '2018-05-30 11:47:55', '2018-05-30 11:47:55'),
(390, 37, 28, 1, '05', '2018', '2018-05-30 11:47:56', '2018-05-30 11:47:56'),
(391, 37, 28, 1, '05', '2018', '2018-05-30 11:47:57', '2018-05-30 11:47:57'),
(392, 37, 28, 1, '05', '2018', '2018-05-30 11:54:12', '2018-05-30 11:54:12'),
(393, 32, 28, 1, '05', '2018', '2018-05-30 12:00:43', '2018-05-30 12:00:43'),
(394, 37, 28, 1, '05', '2018', '2018-05-30 12:02:35', '2018-05-30 12:02:35'),
(395, 37, 28, 1, '05', '2018', '2018-05-30 12:17:39', '2018-05-30 12:17:39'),
(396, 37, 28, 1, '05', '2018', '2018-05-30 12:17:39', '2018-05-30 12:17:39'),
(397, 37, 28, 1, '05', '2018', '2018-05-30 12:17:40', '2018-05-30 12:17:40'),
(398, 37, 28, 1, '05', '2018', '2018-05-30 12:17:40', '2018-05-30 12:17:40'),
(399, 37, 28, 1, '05', '2018', '2018-05-30 12:17:40', '2018-05-30 12:17:40'),
(400, 37, 28, 1, '05', '2018', '2018-05-30 12:17:40', '2018-05-30 12:17:40'),
(401, 37, 28, 1, '05', '2018', '2018-05-30 12:17:41', '2018-05-30 12:17:41'),
(402, 37, 28, 1, '05', '2018', '2018-05-30 12:17:41', '2018-05-30 12:17:41'),
(403, 37, 28, 1, '05', '2018', '2018-05-30 12:17:41', '2018-05-30 12:17:41'),
(404, 37, 28, 1, '05', '2018', '2018-05-30 12:17:42', '2018-05-30 12:17:42'),
(405, 37, 28, 1, '05', '2018', '2018-05-30 12:17:42', '2018-05-30 12:17:42'),
(406, 37, 28, 1, '05', '2018', '2018-05-30 12:17:42', '2018-05-30 12:17:42'),
(407, 37, 28, 1, '05', '2018', '2018-05-30 12:17:42', '2018-05-30 12:17:42'),
(408, 37, 28, 1, '05', '2018', '2018-05-30 12:19:44', '2018-05-30 12:19:44'),
(409, 37, 28, 1, '05', '2018', '2018-05-30 12:19:46', '2018-05-30 12:19:46'),
(410, 37, 28, 1, '05', '2018', '2018-05-30 12:19:46', '2018-05-30 12:19:46'),
(411, 37, 28, 1, '05', '2018', '2018-05-30 12:19:47', '2018-05-30 12:19:47'),
(412, 37, 28, 1, '05', '2018', '2018-05-30 12:19:49', '2018-05-30 12:19:49'),
(413, 37, 28, 1, '05', '2018', '2018-05-30 12:21:54', '2018-05-30 12:21:54'),
(414, 37, 28, 1, '05', '2018', '2018-05-30 12:21:55', '2018-05-30 12:21:55'),
(415, 37, 28, 1, '05', '2018', '2018-05-30 12:21:55', '2018-05-30 12:21:55'),
(416, 37, 28, 1, '05', '2018', '2018-05-30 12:26:35', '2018-05-30 12:26:35'),
(417, 37, 28, 1, '05', '2018', '2018-05-30 12:26:36', '2018-05-30 12:26:36'),
(418, 32, 28, 1, '05', '2018', '2018-05-30 12:32:35', '2018-05-30 12:32:35'),
(419, 32, 28, 1, '05', '2018', '2018-05-30 12:32:43', '2018-05-30 12:32:43'),
(420, 37, 28, 1, '05', '2018', '2018-05-30 12:49:22', '2018-05-30 12:49:22'),
(421, 37, 28, 1, '05', '2018', '2018-05-30 12:53:59', '2018-05-30 12:53:59'),
(422, 37, 28, 1, '05', '2018', '2018-05-30 12:54:00', '2018-05-30 12:54:00'),
(423, 37, 28, 1, '05', '2018', '2018-05-30 12:54:00', '2018-05-30 12:54:00'),
(424, 37, 28, 1, '05', '2018', '2018-05-30 12:54:01', '2018-05-30 12:54:01'),
(425, 37, 28, 1, '05', '2018', '2018-05-30 12:54:02', '2018-05-30 12:54:02'),
(426, 37, 28, 1, '05', '2018', '2018-05-30 12:54:02', '2018-05-30 12:54:02'),
(427, 37, 28, 1, '05', '2018', '2018-05-30 12:54:02', '2018-05-30 12:54:02'),
(428, 37, 28, 1, '05', '2018', '2018-05-30 12:54:02', '2018-05-30 12:54:02'),
(429, 37, 28, 1, '05', '2018', '2018-05-30 12:54:02', '2018-05-30 12:54:02'),
(430, 37, 28, 1, '05', '2018', '2018-05-30 12:54:02', '2018-05-30 12:54:02'),
(431, 37, 28, 1, '05', '2018', '2018-05-30 12:54:02', '2018-05-30 12:54:02'),
(432, 37, 28, 1, '05', '2018', '2018-05-30 12:54:02', '2018-05-30 12:54:02'),
(433, 37, 28, 1, '05', '2018', '2018-05-30 12:54:03', '2018-05-30 12:54:03'),
(434, 37, 28, 1, '05', '2018', '2018-05-30 12:54:03', '2018-05-30 12:54:03'),
(435, 37, 28, 1, '05', '2018', '2018-05-30 12:54:03', '2018-05-30 12:54:03'),
(436, 37, 28, 1, '05', '2018', '2018-05-30 12:54:03', '2018-05-30 12:54:03'),
(437, 37, 28, 1, '05', '2018', '2018-05-30 12:54:03', '2018-05-30 12:54:03'),
(438, 37, 28, 1, '05', '2018', '2018-05-30 12:55:40', '2018-05-30 12:55:40'),
(439, 37, 28, 1, '05', '2018', '2018-05-30 12:55:41', '2018-05-30 12:55:41'),
(440, 37, 28, 1, '05', '2018', '2018-05-30 12:55:41', '2018-05-30 12:55:41'),
(441, 37, 28, 1, '05', '2018', '2018-05-30 12:55:41', '2018-05-30 12:55:41'),
(442, 37, 28, 1, '05', '2018', '2018-05-30 12:55:41', '2018-05-30 12:55:41'),
(443, 37, 28, 1, '05', '2018', '2018-05-30 12:55:42', '2018-05-30 12:55:42'),
(444, 37, 28, 1, '05', '2018', '2018-05-30 12:55:42', '2018-05-30 12:55:42'),
(445, 37, 28, 1, '05', '2018', '2018-05-30 12:55:42', '2018-05-30 12:55:42'),
(446, 37, 28, 1, '05', '2018', '2018-05-30 12:55:43', '2018-05-30 12:55:43'),
(447, 37, 28, 1, '05', '2018', '2018-05-30 12:55:43', '2018-05-30 12:55:43'),
(448, 37, 28, 1, '05', '2018', '2018-05-30 12:55:43', '2018-05-30 12:55:43'),
(449, 37, 28, 1, '05', '2018', '2018-05-30 12:55:43', '2018-05-30 12:55:43'),
(450, 37, 28, 1, '05', '2018', '2018-05-30 12:55:43', '2018-05-30 12:55:43'),
(451, 37, 28, 1, '05', '2018', '2018-05-30 12:55:43', '2018-05-30 12:55:43'),
(452, 37, 28, 1, '05', '2018', '2018-05-30 12:55:44', '2018-05-30 12:55:44'),
(453, 37, 28, 1, '05', '2018', '2018-05-30 12:55:44', '2018-05-30 12:55:44'),
(454, 37, 28, 1, '05', '2018', '2018-05-30 12:55:44', '2018-05-30 12:55:44'),
(455, 37, 28, 1, '05', '2018', '2018-05-30 12:55:45', '2018-05-30 12:55:45'),
(456, 37, 28, 1, '05', '2018', '2018-05-30 12:55:45', '2018-05-30 12:55:45'),
(457, 37, 28, 1, '05', '2018', '2018-05-30 12:56:37', '2018-05-30 12:56:37'),
(458, 32, 28, 1, '05', '2018', '2018-05-30 12:59:39', '2018-05-30 12:59:39'),
(459, 37, 28, 1, '05', '2018', '2018-05-30 12:59:48', '2018-05-30 12:59:48'),
(460, 37, 28, 1, '05', '2018', '2018-05-30 12:59:49', '2018-05-30 12:59:49'),
(461, 37, 28, 1, '05', '2018', '2018-05-30 12:59:50', '2018-05-30 12:59:50'),
(462, 37, 28, 1, '05', '2018', '2018-05-30 12:59:50', '2018-05-30 12:59:50'),
(463, 37, 28, 1, '05', '2018', '2018-05-30 12:59:51', '2018-05-30 12:59:51'),
(464, 37, 28, 1, '05', '2018', '2018-05-30 13:01:31', '2018-05-30 13:01:31'),
(465, 37, 28, 1, '05', '2018', '2018-05-30 13:15:07', '2018-05-30 13:15:07'),
(466, 37, 28, 1, '05', '2018', '2018-05-30 13:16:02', '2018-05-30 13:16:02'),
(467, 37, 28, 1, '05', '2018', '2018-05-30 13:16:02', '2018-05-30 13:16:02'),
(468, 37, 28, 1, '05', '2018', '2018-05-30 13:16:04', '2018-05-30 13:16:04'),
(469, 37, 28, 1, '05', '2018', '2018-05-30 13:16:04', '2018-05-30 13:16:04'),
(470, 37, 28, 1, '05', '2018', '2018-05-30 13:16:05', '2018-05-30 13:16:05'),
(471, 37, 28, 1, '05', '2018', '2018-05-30 13:16:07', '2018-05-30 13:16:07'),
(472, 37, 28, 1, '05', '2018', '2018-05-30 13:16:08', '2018-05-30 13:16:08'),
(473, 37, 28, 1, '05', '2018', '2018-05-30 13:16:08', '2018-05-30 13:16:08'),
(474, 37, 28, 1, '05', '2018', '2018-05-30 13:16:08', '2018-05-30 13:16:08'),
(475, 37, 28, 1, '05', '2018', '2018-05-30 13:16:10', '2018-05-30 13:16:10'),
(476, 37, 28, 1, '05', '2018', '2018-05-30 13:16:10', '2018-05-30 13:16:10'),
(477, 37, 28, 1, '05', '2018', '2018-05-30 13:16:11', '2018-05-30 13:16:11'),
(478, 37, 28, 1, '05', '2018', '2018-05-30 13:16:12', '2018-05-30 13:16:12'),
(479, 37, 28, 1, '05', '2018', '2018-05-30 13:16:13', '2018-05-30 13:16:13'),
(480, 37, 28, 1, '05', '2018', '2018-05-30 13:16:14', '2018-05-30 13:16:14'),
(481, 37, 28, 1, '05', '2018', '2018-05-30 13:16:17', '2018-05-30 13:16:17'),
(482, 37, 28, 1, '05', '2018', '2018-05-30 13:16:18', '2018-05-30 13:16:18'),
(483, 37, 28, 1, '05', '2018', '2018-05-30 13:27:41', '2018-05-30 13:27:41'),
(484, 37, 28, 1, '05', '2018', '2018-05-30 13:27:42', '2018-05-30 13:27:42'),
(485, 37, 28, 1, '05', '2018', '2018-05-30 13:27:42', '2018-05-30 13:27:42'),
(486, 37, 28, 1, '05', '2018', '2018-05-30 13:27:42', '2018-05-30 13:27:42'),
(487, 37, 28, 1, '05', '2018', '2018-05-30 13:27:43', '2018-05-30 13:27:43'),
(488, 37, 28, 1, '05', '2018', '2018-05-30 13:27:43', '2018-05-30 13:27:43'),
(489, 37, 28, 1, '05', '2018', '2018-05-30 13:27:43', '2018-05-30 13:27:43'),
(490, 37, 28, 1, '05', '2018', '2018-05-30 13:27:43', '2018-05-30 13:27:43'),
(491, 37, 28, 1, '05', '2018', '2018-05-30 13:27:43', '2018-05-30 13:27:43'),
(492, 37, 28, 1, '05', '2018', '2018-05-30 13:27:43', '2018-05-30 13:27:43'),
(493, 37, 28, 1, '05', '2018', '2018-05-30 13:27:44', '2018-05-30 13:27:44'),
(494, 37, 28, 1, '05', '2018', '2018-05-30 13:27:44', '2018-05-30 13:27:44'),
(495, 37, 28, 1, '05', '2018', '2018-05-30 13:27:45', '2018-05-30 13:27:45'),
(496, 37, 28, 1, '05', '2018', '2018-05-30 13:27:45', '2018-05-30 13:27:45'),
(497, 37, 28, 1, '05', '2018', '2018-05-30 13:27:45', '2018-05-30 13:27:45'),
(498, 37, 28, 1, '05', '2018', '2018-05-30 13:27:45', '2018-05-30 13:27:45'),
(499, 37, 28, 1, '05', '2018', '2018-05-30 13:27:45', '2018-05-30 13:27:45'),
(500, 37, 28, 1, '05', '2018', '2018-05-30 13:27:45', '2018-05-30 13:27:45'),
(501, 37, 28, 1, '05', '2018', '2018-05-30 13:27:45', '2018-05-30 13:27:45'),
(502, 37, 28, 1, '05', '2018', '2018-05-30 13:27:46', '2018-05-30 13:27:46'),
(503, 37, 28, 1, '05', '2018', '2018-05-30 13:29:27', '2018-05-30 13:29:27'),
(504, 37, 28, 1, '05', '2018', '2018-05-30 13:29:28', '2018-05-30 13:29:28'),
(505, 37, 28, 1, '05', '2018', '2018-05-30 13:29:29', '2018-05-30 13:29:29'),
(506, 37, 28, 1, '05', '2018', '2018-05-30 13:29:29', '2018-05-30 13:29:29'),
(507, 37, 28, 1, '05', '2018', '2018-05-30 13:29:29', '2018-05-30 13:29:29'),
(508, 37, 28, 1, '05', '2018', '2018-05-30 13:29:29', '2018-05-30 13:29:29'),
(509, 37, 28, 1, '05', '2018', '2018-05-30 13:29:30', '2018-05-30 13:29:30'),
(510, 37, 28, 1, '05', '2018', '2018-05-30 13:29:30', '2018-05-30 13:29:30'),
(511, 37, 28, 1, '05', '2018', '2018-05-30 13:29:30', '2018-05-30 13:29:30'),
(512, 37, 28, 1, '05', '2018', '2018-05-30 13:29:30', '2018-05-30 13:29:30'),
(513, 37, 28, 1, '05', '2018', '2018-05-30 13:29:31', '2018-05-30 13:29:31'),
(514, 37, 28, 1, '05', '2018', '2018-05-30 13:29:31', '2018-05-30 13:29:31'),
(515, 37, 28, 1, '05', '2018', '2018-05-30 13:29:31', '2018-05-30 13:29:31'),
(516, 37, 28, 1, '05', '2018', '2018-05-30 13:29:31', '2018-05-30 13:29:31'),
(517, 37, 28, 1, '05', '2018', '2018-05-30 13:29:31', '2018-05-30 13:29:31'),
(518, 37, 28, 1, '05', '2018', '2018-05-30 13:29:31', '2018-05-30 13:29:31'),
(519, 37, 28, 1, '05', '2018', '2018-05-30 13:29:32', '2018-05-30 13:29:32'),
(520, 37, 28, 1, '05', '2018', '2018-05-30 13:29:32', '2018-05-30 13:29:32'),
(521, 37, 28, 1, '05', '2018', '2018-05-30 13:29:32', '2018-05-30 13:29:32'),
(522, 37, 28, 1, '05', '2018', '2018-05-30 13:29:32', '2018-05-30 13:29:32'),
(523, 37, 28, 1, '05', '2018', '2018-05-30 13:29:32', '2018-05-30 13:29:32'),
(524, 37, 28, 1, '05', '2018', '2018-05-30 13:29:33', '2018-05-30 13:29:33'),
(525, 37, 28, 1, '05', '2018', '2018-05-30 13:29:33', '2018-05-30 13:29:33'),
(526, 37, 28, 1, '05', '2018', '2018-05-30 13:29:34', '2018-05-30 13:29:34'),
(527, 37, 28, 1, '05', '2018', '2018-05-30 13:29:34', '2018-05-30 13:29:34'),
(528, 37, 28, 1, '05', '2018', '2018-05-30 13:29:34', '2018-05-30 13:29:34'),
(529, 37, 28, 1, '05', '2018', '2018-05-30 13:29:34', '2018-05-30 13:29:34'),
(530, 28, 37, 1, '05', '2018', '2018-05-31 06:38:56', '2018-05-31 06:38:56'),
(531, 37, 28, 1, '05', '2018', '2018-05-31 06:43:19', '2018-05-31 06:43:19'),
(532, 37, 28, 1, '05', '2018', '2018-05-31 06:43:47', '2018-05-31 06:43:47'),
(533, 37, 28, 1, '05', '2018', '2018-05-31 06:44:04', '2018-05-31 06:44:04'),
(534, 39, 37, 1, '05', '2018', '2018-05-31 08:18:24', '2018-05-31 08:18:24'),
(535, 39, 28, 1, '05', '2018', '2018-05-31 08:18:27', '2018-05-31 08:18:27'),
(536, 39, 35, 1, '05', '2018', '2018-05-31 08:18:30', '2018-05-31 08:18:30'),
(537, 39, 32, 1, '05', '2018', '2018-05-31 08:18:31', '2018-05-31 08:18:31'),
(538, 32, 39, 1, '05', '2018', '2018-05-31 08:18:51', '2018-05-31 08:18:51'),
(539, 32, 39, 1, '05', '2018', '2018-05-31 08:19:04', '2018-05-31 08:19:04'),
(540, 32, 39, 1, '05', '2018', '2018-05-31 08:19:09', '2018-05-31 08:19:09'),
(541, 32, 39, 1, '05', '2018', '2018-05-31 08:20:48', '2018-05-31 08:20:48'),
(542, 32, 35, 1, '05', '2018', '2018-05-31 08:20:53', '2018-05-31 08:20:53'),
(543, 32, 35, 1, '05', '2018', '2018-05-31 08:21:06', '2018-05-31 08:21:06'),
(544, 32, 39, 1, '05', '2018', '2018-05-31 08:21:11', '2018-05-31 08:21:11'),
(545, 32, 39, 1, '05', '2018', '2018-05-31 08:21:18', '2018-05-31 08:21:18'),
(546, 32, 39, 1, '05', '2018', '2018-05-31 08:21:24', '2018-05-31 08:21:24'),
(547, 32, 39, 1, '05', '2018', '2018-05-31 08:22:08', '2018-05-31 08:22:08'),
(548, 32, 39, 1, '05', '2018', '2018-05-31 08:23:27', '2018-05-31 08:23:27'),
(549, 32, 39, 1, '05', '2018', '2018-05-31 08:23:32', '2018-05-31 08:23:32'),
(550, 32, 35, 1, '05', '2018', '2018-05-31 08:25:44', '2018-05-31 08:25:44'),
(551, 35, 39, 1, '05', '2018', '2018-05-31 08:29:28', '2018-05-31 08:29:28'),
(552, 35, 32, 1, '05', '2018', '2018-05-31 08:29:30', '2018-05-31 08:29:30'),
(553, 35, 28, 1, '05', '2018', '2018-05-31 08:29:33', '2018-05-31 08:29:33'),
(554, 35, 39, 1, '05', '2018', '2018-05-31 08:29:38', '2018-05-31 08:29:38'),
(555, 35, 32, 1, '05', '2018', '2018-05-31 08:29:42', '2018-05-31 08:29:42'),
(556, 35, 28, 1, '05', '2018', '2018-05-31 08:29:46', '2018-05-31 08:29:46'),
(557, 32, 28, 1, '05', '2018', '2018-05-31 08:34:56', '2018-05-31 08:34:56'),
(558, 32, 28, 1, '05', '2018', '2018-05-31 08:35:02', '2018-05-31 08:35:02'),
(559, 35, 29, 1, '05', '2018', '2018-05-31 08:36:56', '2018-05-31 08:36:56'),
(560, 35, 29, 1, '05', '2018', '2018-05-31 08:37:01', '2018-05-31 08:37:01'),
(561, 39, 28, 1, '05', '2018', '2018-05-31 08:38:27', '2018-05-31 08:38:27'),
(562, 32, 28, 1, '05', '2018', '2018-05-31 08:42:05', '2018-05-31 08:42:05'),
(563, 32, 28, 1, '05', '2018', '2018-05-31 08:42:56', '2018-05-31 08:42:56'),
(564, 35, 28, 1, '05', '2018', '2018-05-31 08:44:42', '2018-05-31 08:44:42'),
(565, 28, 32, 1, '05', '2018', '2018-05-31 14:02:11', '2018-05-31 14:02:11'),
(566, 28, 32, 1, '05', '2018', '2018-05-31 14:02:15', '2018-05-31 14:02:15'),
(567, 28, 32, 1, '05', '2018', '2018-05-31 14:04:08', '2018-05-31 14:04:08'),
(568, 37, 32, 1, '05', '2018', '2018-05-31 14:07:35', '2018-05-31 14:07:35'),
(569, 37, 32, 1, '05', '2018', '2018-05-31 14:07:44', '2018-05-31 14:07:44'),
(570, 37, 32, 1, '06', '2018', '2018-06-01 08:06:48', '2018-06-01 08:06:48'),
(571, 37, 32, 1, '06', '2018', '2018-06-01 08:06:57', '2018-06-01 08:06:57'),
(572, 37, 32, 1, '06', '2018', '2018-06-01 08:08:14', '2018-06-01 08:08:14'),
(573, 37, 32, 1, '06', '2018', '2018-06-01 08:34:12', '2018-06-01 08:34:12'),
(574, 37, 32, 1, '06', '2018', '2018-06-01 09:48:03', '2018-06-01 09:48:03'),
(575, 37, 32, 1, '06', '2018', '2018-06-01 09:48:10', '2018-06-01 09:48:10'),
(576, 37, 32, 1, '06', '2018', '2018-06-01 09:48:16', '2018-06-01 09:48:16'),
(577, 37, 32, 1, '06', '2018', '2018-06-01 09:51:55', '2018-06-01 09:51:55'),
(578, 37, 32, 1, '06', '2018', '2018-06-01 09:59:44', '2018-06-01 09:59:44'),
(579, 32, 36, 1, '06', '2018', '2018-06-01 10:00:38', '2018-06-01 10:00:38'),
(580, 32, 36, 1, '06', '2018', '2018-06-01 10:00:44', '2018-06-01 10:00:44'),
(581, 32, 39, 1, '06', '2018', '2018-06-01 10:01:28', '2018-06-01 10:01:28'),
(582, 32, 39, 1, '06', '2018', '2018-06-01 10:01:31', '2018-06-01 10:01:31'),
(583, 32, 39, 1, '06', '2018', '2018-06-01 10:02:35', '2018-06-01 10:02:35'),
(584, 37, 39, 1, '06', '2018', '2018-06-01 10:03:10', '2018-06-01 10:03:10'),
(585, 37, 39, 1, '06', '2018', '2018-06-01 10:03:13', '2018-06-01 10:03:13'),
(586, 37, 39, 1, '06', '2018', '2018-06-01 10:03:25', '2018-06-01 10:03:25'),
(587, 37, 39, 1, '06', '2018', '2018-06-01 10:03:53', '2018-06-01 10:03:53'),
(588, 32, 39, 1, '06', '2018', '2018-06-01 10:11:41', '2018-06-01 10:11:41'),
(589, 32, 39, 1, '06', '2018', '2018-06-01 10:12:03', '2018-06-01 10:12:03'),
(590, 37, 39, 1, '06', '2018', '2018-06-01 10:16:51', '2018-06-01 10:16:51'),
(591, 37, 39, 1, '06', '2018', '2018-06-01 10:17:03', '2018-06-01 10:17:03'),
(592, 37, 39, 1, '06', '2018', '2018-06-01 10:17:26', '2018-06-01 10:17:26'),
(593, 37, 39, 1, '06', '2018', '2018-06-01 10:17:33', '2018-06-01 10:17:33'),
(594, 32, 39, 1, '06', '2018', '2018-06-01 10:37:32', '2018-06-01 10:37:32'),
(595, 28, 36, 1, '06', '2018', '2018-06-01 11:12:56', '2018-06-01 11:12:56'),
(596, 28, 36, 1, '06', '2018', '2018-06-01 11:13:00', '2018-06-01 11:13:00'),
(597, 28, 32, 1, '06', '2018', '2018-06-01 11:13:17', '2018-06-01 11:13:17'),
(598, 28, 32, 1, '06', '2018', '2018-06-01 11:13:20', '2018-06-01 11:13:20'),
(599, 32, 39, 1, '06', '2018', '2018-06-01 11:24:46', '2018-06-01 11:24:46'),
(600, 32, 39, 1, '06', '2018', '2018-06-01 11:26:51', '2018-06-01 11:26:51'),
(601, 36, 32, 1, '06', '2018', '2018-06-01 11:28:23', '2018-06-01 11:28:23'),
(602, 36, 32, 1, '06', '2018', '2018-06-01 11:28:37', '2018-06-01 11:28:37'),
(603, 34, 32, 1, '06', '2018', '2018-06-01 11:28:58', '2018-06-01 11:28:58'),
(604, 28, 32, 1, '06', '2018', '2018-06-01 11:32:04', '2018-06-01 11:32:04'),
(605, 28, 32, 1, '06', '2018', '2018-06-01 11:32:15', '2018-06-01 11:32:15'),
(606, 35, 32, 1, '06', '2018', '2018-06-01 11:33:21', '2018-06-01 11:33:21'),
(607, 35, 32, 1, '06', '2018', '2018-06-01 11:33:26', '2018-06-01 11:33:26'),
(608, 35, 32, 1, '06', '2018', '2018-06-01 11:33:39', '2018-06-01 11:33:39'),
(609, 37, 32, 1, '06', '2018', '2018-06-01 11:35:05', '2018-06-01 11:35:05'),
(610, 37, 32, 1, '06', '2018', '2018-06-01 11:36:16', '2018-06-01 11:36:16'),
(611, 36, 32, 1, '06', '2018', '2018-06-01 11:37:58', '2018-06-01 11:37:58'),
(612, 36, 32, 1, '06', '2018', '2018-06-01 11:38:03', '2018-06-01 11:38:03'),
(613, 36, 32, 1, '06', '2018', '2018-06-01 11:38:42', '2018-06-01 11:38:42'),
(614, 37, 32, 1, '06', '2018', '2018-06-01 11:51:20', '2018-06-01 11:51:20'),
(615, 37, 32, 1, '06', '2018', '2018-06-01 12:23:45', '2018-06-01 12:23:45'),
(616, 28, 36, 1, '06', '2018', '2018-06-01 12:24:39', '2018-06-01 12:24:39'),
(617, 28, 36, 1, '06', '2018', '2018-06-01 12:24:42', '2018-06-01 12:24:42'),
(618, 37, 32, 1, '06', '2018', '2018-06-01 12:24:54', '2018-06-01 12:24:54'),
(619, 37, 32, 1, '06', '2018', '2018-06-01 12:24:58', '2018-06-01 12:24:58'),
(620, 37, 32, 1, '06', '2018', '2018-06-01 12:24:59', '2018-06-01 12:24:59'),
(621, 28, 36, 1, '06', '2018', '2018-06-01 12:27:54', '2018-06-01 12:27:54'),
(622, 28, 36, 1, '06', '2018', '2018-06-01 12:28:29', '2018-06-01 12:28:29'),
(623, 28, 36, 1, '06', '2018', '2018-06-01 12:28:29', '2018-06-01 12:28:29'),
(624, 28, 36, 1, '06', '2018', '2018-06-01 12:28:30', '2018-06-01 12:28:30'),
(625, 37, 32, 1, '06', '2018', '2018-06-01 12:28:56', '2018-06-01 12:28:56'),
(626, 28, 36, 1, '06', '2018', '2018-06-01 13:06:04', '2018-06-01 13:06:04'),
(627, 28, 36, 1, '06', '2018', '2018-06-01 13:06:05', '2018-06-01 13:06:05'),
(628, 28, 36, 1, '06', '2018', '2018-06-01 13:06:05', '2018-06-01 13:06:05'),
(629, 28, 36, 1, '06', '2018', '2018-06-01 13:06:05', '2018-06-01 13:06:05'),
(630, 28, 36, 1, '06', '2018', '2018-06-01 13:06:06', '2018-06-01 13:06:06'),
(631, 28, 36, 1, '06', '2018', '2018-06-01 13:06:14', '2018-06-01 13:06:14'),
(632, 28, 36, 1, '06', '2018', '2018-06-01 13:06:15', '2018-06-01 13:06:15'),
(633, 28, 36, 1, '06', '2018', '2018-06-01 13:06:34', '2018-06-01 13:06:34'),
(634, 28, 36, 1, '06', '2018', '2018-06-01 13:06:35', '2018-06-01 13:06:35'),
(635, 28, 36, 1, '06', '2018', '2018-06-01 13:06:35', '2018-06-01 13:06:35'),
(636, 37, 32, 1, '06', '2018', '2018-06-01 13:38:25', '2018-06-01 13:38:25'),
(637, 37, 32, 1, '06', '2018', '2018-06-01 14:00:23', '2018-06-01 14:00:23'),
(638, 32, 29, 1, '06', '2018', '2018-06-01 14:50:27', '2018-06-01 14:50:27'),
(639, 32, 29, 1, '06', '2018', '2018-06-01 14:50:34', '2018-06-01 14:50:34'),
(640, 32, 29, 1, '06', '2018', '2018-06-01 14:51:45', '2018-06-01 14:51:45'),
(641, 37, 29, 1, '06', '2018', '2018-06-01 14:52:16', '2018-06-01 14:52:16'),
(642, 37, 29, 1, '06', '2018', '2018-06-01 14:52:25', '2018-06-01 14:52:25'),
(643, 37, 29, 1, '06', '2018', '2018-06-01 14:52:51', '2018-06-01 14:52:51'),
(644, 37, 29, 1, '06', '2018', '2018-06-01 14:53:00', '2018-06-01 14:53:00'),
(645, 37, 29, 1, '06', '2018', '2018-06-01 14:53:34', '2018-06-01 14:53:34'),
(646, 36, 32, 1, '06', '2018', '2018-06-01 15:01:36', '2018-06-01 15:01:36'),
(647, 37, 32, 1, '06', '2018', '2018-06-01 16:42:24', '2018-06-01 16:42:24'),
(648, 37, 32, 1, '06', '2018', '2018-06-01 16:42:37', '2018-06-01 16:42:37'),
(649, 36, 32, 1, '06', '2018', '2018-06-01 16:43:57', '2018-06-01 16:43:57'),
(650, 36, 32, 1, '06', '2018', '2018-06-01 16:44:03', '2018-06-01 16:44:03'),
(651, 36, 32, 1, '06', '2018', '2018-06-02 12:26:29', '2018-06-02 12:26:29'),
(652, 36, 32, 1, '06', '2018', '2018-06-02 12:26:35', '2018-06-02 12:26:35'),
(653, 36, 32, 1, '06', '2018', '2018-06-02 12:29:08', '2018-06-02 12:29:08'),
(654, 36, 32, 1, '06', '2018', '2018-06-02 12:31:39', '2018-06-02 12:31:39'),
(655, 36, 32, 1, '06', '2018', '2018-06-02 12:33:39', '2018-06-02 12:33:39'),
(656, 28, 33, 1, '06', '2018', '2018-06-04 12:48:37', '2018-06-04 12:48:37'),
(657, 28, 33, 1, '06', '2018', '2018-06-04 15:00:00', '2018-06-04 15:00:00'),
(658, 32, 28, 1, '06', '2018', '2018-06-04 15:05:18', '2018-06-04 15:05:18'),
(659, 32, 28, 1, '06', '2018', '2018-06-04 15:05:20', '2018-06-04 15:05:20'),
(660, 32, 28, 1, '06', '2018', '2018-06-04 15:06:02', '2018-06-04 15:06:02'),
(661, 32, 35, 1, '06', '2018', '2018-06-04 15:08:20', '2018-06-04 15:08:20'),
(662, 32, 33, 1, '06', '2018', '2018-06-04 15:08:34', '2018-06-04 15:08:34'),
(663, 32, 34, 1, '06', '2018', '2018-06-04 15:09:00', '2018-06-04 15:09:00'),
(664, 32, 40, 1, '06', '2018', '2018-06-04 15:10:43', '2018-06-04 15:10:43'),
(665, 32, 40, 1, '06', '2018', '2018-06-04 15:11:05', '2018-06-04 15:11:05'),
(666, 32, 40, 1, '06', '2018', '2018-06-04 15:13:15', '2018-06-04 15:13:15'),
(667, 32, 40, 1, '06', '2018', '2018-06-04 15:13:34', '2018-06-04 15:13:34'),
(668, 32, 40, 1, '06', '2018', '2018-06-04 15:13:36', '2018-06-04 15:13:36'),
(669, 32, 40, 1, '06', '2018', '2018-06-04 15:13:38', '2018-06-04 15:13:38'),
(670, 32, 40, 1, '06', '2018', '2018-06-04 15:13:40', '2018-06-04 15:13:40'),
(671, 32, 40, 1, '06', '2018', '2018-06-04 15:13:42', '2018-06-04 15:13:42'),
(672, 32, 40, 1, '06', '2018', '2018-06-04 15:13:48', '2018-06-04 15:13:48'),
(673, 32, 40, 1, '06', '2018', '2018-06-04 15:13:51', '2018-06-04 15:13:51'),
(674, 32, 40, 1, '06', '2018', '2018-06-04 15:13:53', '2018-06-04 15:13:53'),
(675, 32, 40, 1, '06', '2018', '2018-06-04 15:13:55', '2018-06-04 15:13:55'),
(676, 32, 40, 1, '06', '2018', '2018-06-04 15:13:58', '2018-06-04 15:13:58'),
(677, 32, 40, 1, '06', '2018', '2018-06-04 15:14:00', '2018-06-04 15:14:00'),
(678, 32, 40, 1, '06', '2018', '2018-06-04 15:14:01', '2018-06-04 15:14:01'),
(679, 32, 40, 1, '06', '2018', '2018-06-04 15:14:03', '2018-06-04 15:14:03'),
(680, 32, 40, 1, '06', '2018', '2018-06-04 15:14:04', '2018-06-04 15:14:04'),
(681, 32, 40, 1, '06', '2018', '2018-06-04 15:14:06', '2018-06-04 15:14:06'),
(682, 32, 40, 1, '06', '2018', '2018-06-04 15:14:08', '2018-06-04 15:14:08'),
(683, 32, 40, 1, '06', '2018', '2018-06-04 15:14:10', '2018-06-04 15:14:10'),
(684, 32, 40, 1, '06', '2018', '2018-06-04 15:14:11', '2018-06-04 15:14:11'),
(685, 32, 40, 1, '06', '2018', '2018-06-04 15:14:14', '2018-06-04 15:14:14'),
(686, 32, 40, 1, '06', '2018', '2018-06-04 15:14:17', '2018-06-04 15:14:17'),
(687, 32, 40, 1, '06', '2018', '2018-06-04 15:14:19', '2018-06-04 15:14:19'),
(688, 32, 40, 1, '06', '2018', '2018-06-04 15:14:21', '2018-06-04 15:14:21'),
(689, 32, 40, 1, '06', '2018', '2018-06-04 15:14:24', '2018-06-04 15:14:24'),
(690, 32, 40, 1, '06', '2018', '2018-06-04 15:14:25', '2018-06-04 15:14:25'),
(691, 32, 40, 1, '06', '2018', '2018-06-04 15:14:30', '2018-06-04 15:14:30'),
(692, 32, 40, 1, '06', '2018', '2018-06-04 15:14:32', '2018-06-04 15:14:32'),
(693, 32, 40, 1, '06', '2018', '2018-06-04 15:14:37', '2018-06-04 15:14:37'),
(694, 32, 40, 1, '06', '2018', '2018-06-04 15:14:40', '2018-06-04 15:14:40'),
(695, 32, 40, 1, '06', '2018', '2018-06-04 15:14:52', '2018-06-04 15:14:52'),
(696, 32, 33, 1, '06', '2018', '2018-06-05 05:59:07', '2018-06-05 05:59:07'),
(697, 32, 31, 1, '06', '2018', '2018-06-05 06:14:22', '2018-06-05 06:14:22'),
(698, 32, 31, 1, '06', '2018', '2018-06-05 06:14:26', '2018-06-05 06:14:26'),
(699, 32, 31, 1, '06', '2018', '2018-06-05 07:25:55', '2018-06-05 07:25:55'),
(700, 32, 31, 1, '06', '2018', '2018-06-05 07:25:56', '2018-06-05 07:25:56'),
(701, 32, 31, 1, '06', '2018', '2018-06-05 07:25:57', '2018-06-05 07:25:57'),
(702, 32, 31, 1, '06', '2018', '2018-06-05 07:25:57', '2018-06-05 07:25:57'),
(703, 32, 31, 1, '06', '2018', '2018-06-05 07:25:57', '2018-06-05 07:25:57'),
(704, 32, 31, 1, '06', '2018', '2018-06-05 07:25:58', '2018-06-05 07:25:58'),
(705, 32, 31, 1, '06', '2018', '2018-06-05 07:25:59', '2018-06-05 07:25:59'),
(706, 32, 31, 1, '06', '2018', '2018-06-05 07:25:59', '2018-06-05 07:25:59'),
(707, 32, 31, 1, '06', '2018', '2018-06-05 07:25:59', '2018-06-05 07:25:59'),
(708, 32, 31, 1, '06', '2018', '2018-06-05 07:25:59', '2018-06-05 07:25:59'),
(709, 32, 31, 1, '06', '2018', '2018-06-05 07:26:00', '2018-06-05 07:26:00'),
(710, 32, 31, 1, '06', '2018', '2018-06-05 07:26:00', '2018-06-05 07:26:00'),
(711, 32, 31, 1, '06', '2018', '2018-06-05 07:26:00', '2018-06-05 07:26:00'),
(712, 32, 31, 1, '06', '2018', '2018-06-05 07:26:00', '2018-06-05 07:26:00'),
(713, 32, 31, 1, '06', '2018', '2018-06-05 07:26:00', '2018-06-05 07:26:00'),
(714, 32, 31, 1, '06', '2018', '2018-06-05 07:26:00', '2018-06-05 07:26:00'),
(715, 32, 31, 1, '06', '2018', '2018-06-05 07:26:01', '2018-06-05 07:26:01'),
(716, 32, 31, 1, '06', '2018', '2018-06-05 07:26:01', '2018-06-05 07:26:01'),
(717, 32, 31, 1, '06', '2018', '2018-06-05 07:26:01', '2018-06-05 07:26:01'),
(718, 32, 31, 1, '06', '2018', '2018-06-05 07:26:03', '2018-06-05 07:26:03'),
(719, 32, 31, 1, '06', '2018', '2018-06-05 07:26:03', '2018-06-05 07:26:03'),
(720, 32, 31, 1, '06', '2018', '2018-06-05 07:26:03', '2018-06-05 07:26:03'),
(721, 32, 31, 1, '06', '2018', '2018-06-05 07:26:04', '2018-06-05 07:26:04'),
(722, 32, 31, 1, '06', '2018', '2018-06-05 07:26:04', '2018-06-05 07:26:04'),
(723, 32, 31, 1, '06', '2018', '2018-06-05 07:26:04', '2018-06-05 07:26:04'),
(724, 32, 31, 1, '06', '2018', '2018-06-05 07:28:59', '2018-06-05 07:28:59'),
(725, 32, 31, 1, '06', '2018', '2018-06-05 07:28:59', '2018-06-05 07:28:59'),
(726, 32, 31, 1, '06', '2018', '2018-06-05 07:29:00', '2018-06-05 07:29:00'),
(727, 32, 31, 1, '06', '2018', '2018-06-05 07:29:01', '2018-06-05 07:29:01'),
(728, 32, 31, 1, '06', '2018', '2018-06-05 07:29:01', '2018-06-05 07:29:01'),
(729, 32, 31, 1, '06', '2018', '2018-06-05 07:29:02', '2018-06-05 07:29:02'),
(730, 32, 31, 1, '06', '2018', '2018-06-05 07:29:02', '2018-06-05 07:29:02'),
(731, 32, 31, 1, '06', '2018', '2018-06-05 07:29:03', '2018-06-05 07:29:03'),
(732, 32, 31, 1, '06', '2018', '2018-06-05 07:29:04', '2018-06-05 07:29:04'),
(733, 32, 31, 1, '06', '2018', '2018-06-05 07:31:21', '2018-06-05 07:31:21'),
(734, 32, 31, 1, '06', '2018', '2018-06-05 07:31:22', '2018-06-05 07:31:22'),
(735, 32, 31, 1, '06', '2018', '2018-06-05 07:31:22', '2018-06-05 07:31:22'),
(736, 32, 31, 1, '06', '2018', '2018-06-05 07:32:10', '2018-06-05 07:32:10'),
(737, 32, 31, 1, '06', '2018', '2018-06-05 07:38:01', '2018-06-05 07:38:01'),
(738, 32, 31, 1, '06', '2018', '2018-06-05 07:38:13', '2018-06-05 07:38:13'),
(739, 32, 31, 1, '06', '2018', '2018-06-05 07:38:32', '2018-06-05 07:38:32'),
(740, 32, 31, 1, '06', '2018', '2018-06-05 07:38:35', '2018-06-05 07:38:35'),
(741, 32, 31, 1, '06', '2018', '2018-06-05 07:57:52', '2018-06-05 07:57:52'),
(742, 32, 31, 1, '06', '2018', '2018-06-05 08:02:33', '2018-06-05 08:02:33'),
(743, 32, 31, 1, '06', '2018', '2018-06-05 08:02:37', '2018-06-05 08:02:37'),
(744, 32, 31, 1, '06', '2018', '2018-06-05 08:03:04', '2018-06-05 08:03:04'),
(745, 32, 31, 1, '06', '2018', '2018-06-05 08:03:23', '2018-06-05 08:03:23'),
(746, 32, 31, 1, '06', '2018', '2018-06-05 08:13:56', '2018-06-05 08:13:56'),
(747, 32, 31, 1, '06', '2018', '2018-06-05 08:13:57', '2018-06-05 08:13:57'),
(748, 32, 31, 1, '06', '2018', '2018-06-05 08:13:57', '2018-06-05 08:13:57'),
(749, 32, 31, 1, '06', '2018', '2018-06-05 08:13:58', '2018-06-05 08:13:58'),
(750, 32, 31, 1, '06', '2018', '2018-06-05 08:17:44', '2018-06-05 08:17:44'),
(751, 32, 31, 1, '06', '2018', '2018-06-05 08:17:58', '2018-06-05 08:17:58'),
(752, 32, 31, 1, '06', '2018', '2018-06-05 08:18:26', '2018-06-05 08:18:26'),
(753, 32, 31, 1, '06', '2018', '2018-06-05 08:23:35', '2018-06-05 08:23:35'),
(754, 32, 31, 1, '06', '2018', '2018-06-05 08:23:46', '2018-06-05 08:23:46'),
(755, 32, 31, 1, '06', '2018', '2018-06-05 08:24:31', '2018-06-05 08:24:31'),
(756, 32, 31, 1, '06', '2018', '2018-06-05 08:24:32', '2018-06-05 08:24:32'),
(757, 32, 31, 1, '06', '2018', '2018-06-05 08:24:32', '2018-06-05 08:24:32'),
(758, 32, 31, 1, '06', '2018', '2018-06-05 08:24:33', '2018-06-05 08:24:33'),
(759, 32, 31, 1, '06', '2018', '2018-06-05 08:37:05', '2018-06-05 08:37:05'),
(760, 32, 31, 1, '06', '2018', '2018-06-05 08:38:19', '2018-06-05 08:38:19'),
(761, 32, 31, 1, '06', '2018', '2018-06-05 08:38:24', '2018-06-05 08:38:24'),
(762, 32, 31, 1, '06', '2018', '2018-06-05 08:43:52', '2018-06-05 08:43:52'),
(763, 32, 31, 1, '06', '2018', '2018-06-05 08:46:04', '2018-06-05 08:46:04'),
(764, 32, 31, 1, '06', '2018', '2018-06-05 08:46:11', '2018-06-05 08:46:11'),
(765, 28, 32, 1, '06', '2018', '2018-06-05 08:51:34', '2018-06-05 08:51:34'),
(766, 28, 32, 1, '06', '2018', '2018-06-05 08:51:41', '2018-06-05 08:51:41'),
(767, 28, 32, 1, '06', '2018', '2018-06-05 08:51:57', '2018-06-05 08:51:57'),
(768, 28, 32, 1, '06', '2018', '2018-06-05 08:51:59', '2018-06-05 08:51:59'),
(769, 28, 32, 1, '06', '2018', '2018-06-05 08:52:05', '2018-06-05 08:52:05'),
(770, 28, 32, 1, '06', '2018', '2018-06-05 08:52:22', '2018-06-05 08:52:22'),
(771, 28, 32, 1, '06', '2018', '2018-06-05 08:52:34', '2018-06-05 08:52:34'),
(772, 28, 32, 1, '06', '2018', '2018-06-05 08:53:00', '2018-06-05 08:53:00'),
(773, 28, 32, 1, '06', '2018', '2018-06-05 08:53:06', '2018-06-05 08:53:06'),
(774, 28, 32, 1, '06', '2018', '2018-06-05 08:53:23', '2018-06-05 08:53:23'),
(775, 28, 32, 1, '06', '2018', '2018-06-05 08:56:40', '2018-06-05 08:56:40'),
(776, 32, 31, 1, '06', '2018', '2018-06-05 09:08:27', '2018-06-05 09:08:27'),
(777, 32, 31, 1, '06', '2018', '2018-06-05 09:08:35', '2018-06-05 09:08:35'),
(778, 32, 31, 1, '06', '2018', '2018-06-05 09:08:42', '2018-06-05 09:08:42'),
(779, 28, 32, 1, '06', '2018', '2018-06-05 09:09:29', '2018-06-05 09:09:29'),
(780, 28, 32, 1, '06', '2018', '2018-06-05 11:24:37', '2018-06-05 11:24:37'),
(781, 28, 32, 1, '06', '2018', '2018-06-05 11:29:03', '2018-06-05 11:29:03'),
(782, 28, 32, 1, '06', '2018', '2018-06-05 12:01:41', '2018-06-05 12:01:41'),
(783, 32, 39, 1, '06', '2018', '2018-06-05 12:05:13', '2018-06-05 12:05:13'),
(784, 32, 39, 1, '06', '2018', '2018-06-05 12:05:17', '2018-06-05 12:05:17'),
(785, 28, 32, 1, '06', '2018', '2018-06-05 12:31:29', '2018-06-05 12:31:29'),
(786, 32, 33, 1, '06', '2018', '2018-06-05 12:55:46', '2018-06-05 12:55:46'),
(787, 32, 33, 1, '06', '2018', '2018-06-05 12:55:50', '2018-06-05 12:55:50'),
(788, 28, 32, 1, '06', '2018', '2018-06-05 12:56:23', '2018-06-05 12:56:23'),
(789, 32, 33, 1, '06', '2018', '2018-06-05 12:56:29', '2018-06-05 12:56:29'),
(790, 32, 33, 1, '06', '2018', '2018-06-05 12:56:34', '2018-06-05 12:56:34'),
(791, 28, 32, 1, '06', '2018', '2018-06-05 12:56:39', '2018-06-05 12:56:39'),
(792, 32, 33, 1, '06', '2018', '2018-06-05 12:56:43', '2018-06-05 12:56:43'),
(793, 32, 33, 1, '06', '2018', '2018-06-05 12:57:07', '2018-06-05 12:57:07'),
(794, 32, 33, 1, '06', '2018', '2018-06-05 12:57:12', '2018-06-05 12:57:12'),
(795, 28, 32, 1, '06', '2018', '2018-06-05 12:57:15', '2018-06-05 12:57:15'),
(796, 32, 33, 1, '06', '2018', '2018-06-05 12:57:42', '2018-06-05 12:57:42'),
(797, 32, 33, 1, '06', '2018', '2018-06-05 12:57:48', '2018-06-05 12:57:48'),
(798, 32, 33, 1, '06', '2018', '2018-06-05 12:58:10', '2018-06-05 12:58:10'),
(799, 28, 32, 1, '06', '2018', '2018-06-05 12:58:30', '2018-06-05 12:58:30'),
(800, 32, 33, 1, '06', '2018', '2018-06-05 13:00:11', '2018-06-05 13:00:11'),
(801, 28, 33, 1, '06', '2018', '2018-06-05 13:06:47', '2018-06-05 13:06:47'),
(802, 28, 32, 1, '06', '2018', '2018-06-05 13:07:08', '2018-06-05 13:07:08'),
(803, 32, 33, 1, '06', '2018', '2018-06-05 13:07:58', '2018-06-05 13:07:58'),
(804, 28, 32, 1, '06', '2018', '2018-06-05 13:11:15', '2018-06-05 13:11:15'),
(805, 28, 32, 1, '06', '2018', '2018-06-05 13:12:19', '2018-06-05 13:12:19'),
(806, 28, 32, 1, '06', '2018', '2018-06-05 13:12:21', '2018-06-05 13:12:21'),
(807, 28, 32, 1, '06', '2018', '2018-06-05 13:12:23', '2018-06-05 13:12:23'),
(808, 28, 32, 1, '06', '2018', '2018-06-05 13:12:26', '2018-06-05 13:12:26'),
(809, 28, 32, 1, '06', '2018', '2018-06-05 13:12:28', '2018-06-05 13:12:28'),
(810, 28, 32, 1, '06', '2018', '2018-06-05 13:12:30', '2018-06-05 13:12:30'),
(811, 28, 32, 1, '06', '2018', '2018-06-05 13:12:32', '2018-06-05 13:12:32'),
(812, 28, 32, 1, '06', '2018', '2018-06-05 13:12:35', '2018-06-05 13:12:35');
INSERT INTO `profile_views` (`id`, `user_id`, `profile_id`, `views`, `month`, `year`, `created_at`, `updated_at`) VALUES
(813, 28, 32, 1, '06', '2018', '2018-06-05 13:12:38', '2018-06-05 13:12:38'),
(814, 28, 32, 1, '06', '2018', '2018-06-05 13:12:41', '2018-06-05 13:12:41'),
(815, 28, 32, 1, '06', '2018', '2018-06-05 13:12:42', '2018-06-05 13:12:42'),
(816, 28, 32, 1, '06', '2018', '2018-06-05 13:12:44', '2018-06-05 13:12:44'),
(817, 28, 32, 1, '06', '2018', '2018-06-05 13:14:54', '2018-06-05 13:14:54'),
(818, 28, 32, 1, '06', '2018', '2018-06-05 13:21:36', '2018-06-05 13:21:36'),
(819, 28, 32, 1, '06', '2018', '2018-06-05 13:29:56', '2018-06-05 13:29:56'),
(820, 28, 32, 1, '06', '2018', '2018-06-05 13:29:58', '2018-06-05 13:29:58'),
(821, 28, 32, 1, '06', '2018', '2018-06-05 13:30:01', '2018-06-05 13:30:01'),
(822, 28, 32, 1, '06', '2018', '2018-06-05 13:31:56', '2018-06-05 13:31:56'),
(823, 28, 32, 1, '06', '2018', '2018-06-05 13:32:19', '2018-06-05 13:32:19'),
(824, 28, 32, 1, '06', '2018', '2018-06-05 16:00:03', '2018-06-05 16:00:03'),
(825, 28, 32, 1, '06', '2018', '2018-06-05 16:01:16', '2018-06-05 16:01:16'),
(826, 28, 32, 1, '06', '2018', '2018-06-05 16:04:31', '2018-06-05 16:04:31'),
(827, 28, 32, 1, '06', '2018', '2018-06-05 16:04:35', '2018-06-05 16:04:35'),
(828, 28, 32, 1, '06', '2018', '2018-06-05 16:04:36', '2018-06-05 16:04:36'),
(829, 28, 32, 1, '06', '2018', '2018-06-05 16:04:37', '2018-06-05 16:04:37'),
(830, 28, 32, 1, '06', '2018', '2018-06-05 16:04:39', '2018-06-05 16:04:39'),
(831, 28, 32, 1, '06', '2018', '2018-06-05 16:04:42', '2018-06-05 16:04:42'),
(832, 28, 32, 1, '06', '2018', '2018-06-05 16:04:46', '2018-06-05 16:04:46'),
(833, 28, 32, 1, '06', '2018', '2018-06-05 16:05:00', '2018-06-05 16:05:00'),
(834, 28, 32, 1, '06', '2018', '2018-06-05 16:05:08', '2018-06-05 16:05:08'),
(835, 28, 32, 1, '06', '2018', '2018-06-05 16:05:09', '2018-06-05 16:05:09'),
(836, 28, 32, 1, '06', '2018', '2018-06-05 16:06:12', '2018-06-05 16:06:12'),
(837, 28, 32, 1, '06', '2018', '2018-06-05 16:06:22', '2018-06-05 16:06:22'),
(838, 28, 32, 1, '06', '2018', '2018-06-05 16:06:24', '2018-06-05 16:06:24'),
(839, 28, 32, 1, '06', '2018', '2018-06-05 16:07:49', '2018-06-05 16:07:49'),
(840, 28, 32, 1, '06', '2018', '2018-06-05 16:08:42', '2018-06-05 16:08:42'),
(841, 28, 32, 1, '06', '2018', '2018-06-05 16:09:16', '2018-06-05 16:09:16'),
(842, 28, 32, 1, '06', '2018', '2018-06-05 16:09:18', '2018-06-05 16:09:18'),
(843, 28, 32, 1, '06', '2018', '2018-06-05 16:09:22', '2018-06-05 16:09:22'),
(844, 32, 36, 1, '06', '2018', '2018-06-07 13:56:40', '2018-06-07 13:56:40'),
(845, 32, 36, 1, '06', '2018', '2018-06-07 13:56:44', '2018-06-07 13:56:44'),
(846, 32, 36, 1, '06', '2018', '2018-06-07 13:57:07', '2018-06-07 13:57:07'),
(847, 32, 36, 1, '06', '2018', '2018-06-07 13:57:50', '2018-06-07 13:57:50'),
(848, 32, 36, 1, '06', '2018', '2018-06-07 13:58:22', '2018-06-07 13:58:22'),
(849, 32, 36, 1, '06', '2018', '2018-06-07 13:59:10', '2018-06-07 13:59:10'),
(850, 32, 36, 1, '06', '2018', '2018-06-07 13:59:24', '2018-06-07 13:59:24'),
(851, 32, 36, 1, '06', '2018', '2018-06-07 13:59:57', '2018-06-07 13:59:57'),
(852, 37, 33, 1, '06', '2018', '2018-06-09 09:24:42', '2018-06-09 09:24:42'),
(853, 37, 39, 1, '06', '2018', '2018-06-09 09:24:49', '2018-06-09 09:24:49'),
(854, 31, 36, 1, '06', '2018', '2018-06-09 16:27:55', '2018-06-09 16:27:55'),
(855, 37, 30, 1, '06', '2018', '2018-06-11 13:35:21', '2018-06-11 13:35:21'),
(856, 37, 30, 1, '06', '2018', '2018-06-11 13:36:12', '2018-06-11 13:36:12'),
(857, 31, 30, 1, '06', '2018', '2018-06-11 14:57:00', '2018-06-11 14:57:00'),
(858, 31, 30, 1, '06', '2018', '2018-06-11 14:58:51', '2018-06-11 14:58:51'),
(859, 41, 28, 1, '06', '2018', '2018-06-11 14:59:11', '2018-06-11 14:59:11'),
(860, 31, 28, 1, '06', '2018', '2018-06-11 14:59:29', '2018-06-11 14:59:29'),
(861, 31, 28, 1, '06', '2018', '2018-06-11 15:38:27', '2018-06-11 15:38:27'),
(862, 31, 32, 1, '06', '2018', '2018-06-11 16:05:34', '2018-06-11 16:05:34'),
(863, 30, 28, 1, '06', '2018', '2018-06-12 06:59:19', '2018-06-12 06:59:19'),
(864, 30, 28, 1, '06', '2018', '2018-06-12 07:41:28', '2018-06-12 07:41:28'),
(865, 28, 32, 1, '06', '2018', '2018-06-12 14:05:58', '2018-06-12 14:05:58'),
(866, 28, 32, 1, '06', '2018', '2018-06-12 14:06:16', '2018-06-12 14:06:16'),
(867, 28, 32, 1, '06', '2018', '2018-06-13 07:31:31', '2018-06-13 07:31:31'),
(868, 28, 32, 1, '06', '2018', '2018-06-13 07:31:36', '2018-06-13 07:31:36'),
(869, 28, 32, 1, '06', '2018', '2018-06-13 07:43:25', '2018-06-13 07:43:25'),
(870, 28, 32, 1, '06', '2018', '2018-06-13 07:43:26', '2018-06-13 07:43:26'),
(871, 28, 32, 1, '06', '2018', '2018-06-13 07:43:26', '2018-06-13 07:43:26'),
(872, 28, 32, 1, '06', '2018', '2018-06-13 07:43:26', '2018-06-13 07:43:26'),
(873, 28, 32, 1, '06', '2018', '2018-06-13 07:43:26', '2018-06-13 07:43:26'),
(874, 28, 32, 1, '06', '2018', '2018-06-13 07:43:26', '2018-06-13 07:43:26'),
(875, 28, 32, 1, '06', '2018', '2018-06-13 07:43:27', '2018-06-13 07:43:27'),
(876, 28, 32, 1, '06', '2018', '2018-06-13 07:43:27', '2018-06-13 07:43:27'),
(877, 28, 32, 1, '06', '2018', '2018-06-13 07:43:27', '2018-06-13 07:43:27'),
(878, 28, 32, 1, '06', '2018', '2018-06-13 07:43:27', '2018-06-13 07:43:27'),
(879, 28, 32, 1, '06', '2018', '2018-06-13 07:43:27', '2018-06-13 07:43:27'),
(880, 28, 32, 1, '06', '2018', '2018-06-13 07:43:27', '2018-06-13 07:43:27'),
(881, 28, 32, 1, '06', '2018', '2018-06-13 07:43:27', '2018-06-13 07:43:27'),
(882, 28, 32, 1, '06', '2018', '2018-06-13 07:43:28', '2018-06-13 07:43:28'),
(883, 28, 32, 1, '06', '2018', '2018-06-13 07:43:28', '2018-06-13 07:43:28'),
(884, 28, 32, 1, '06', '2018', '2018-06-13 07:43:28', '2018-06-13 07:43:28'),
(885, 28, 32, 1, '06', '2018', '2018-06-13 07:43:28', '2018-06-13 07:43:28'),
(886, 28, 32, 1, '06', '2018', '2018-06-13 07:43:28', '2018-06-13 07:43:28'),
(887, 28, 32, 1, '06', '2018', '2018-06-13 07:43:28', '2018-06-13 07:43:28'),
(888, 28, 32, 1, '06', '2018', '2018-06-13 07:43:29', '2018-06-13 07:43:29'),
(889, 28, 32, 1, '06', '2018', '2018-06-13 07:43:29', '2018-06-13 07:43:29'),
(890, 28, 32, 1, '06', '2018', '2018-06-13 07:43:30', '2018-06-13 07:43:30'),
(891, 28, 32, 1, '06', '2018', '2018-06-13 07:55:44', '2018-06-13 07:55:44'),
(892, 28, 32, 1, '06', '2018', '2018-06-13 07:58:52', '2018-06-13 07:58:52'),
(893, 28, 32, 1, '06', '2018', '2018-06-13 07:59:15', '2018-06-13 07:59:15'),
(894, 28, 32, 1, '06', '2018', '2018-06-13 07:59:54', '2018-06-13 07:59:54'),
(895, 28, 32, 1, '06', '2018', '2018-06-13 07:59:58', '2018-06-13 07:59:58'),
(896, 28, 32, 1, '06', '2018', '2018-06-13 07:59:59', '2018-06-13 07:59:59'),
(897, 28, 32, 1, '06', '2018', '2018-06-13 08:00:00', '2018-06-13 08:00:00'),
(898, 28, 32, 1, '06', '2018', '2018-06-13 08:00:01', '2018-06-13 08:00:01'),
(899, 28, 32, 1, '06', '2018', '2018-06-13 08:00:02', '2018-06-13 08:00:02'),
(900, 28, 32, 1, '06', '2018', '2018-06-13 08:00:03', '2018-06-13 08:00:03'),
(901, 28, 32, 1, '06', '2018', '2018-06-13 08:00:04', '2018-06-13 08:00:04'),
(902, 28, 32, 1, '06', '2018', '2018-06-13 08:00:04', '2018-06-13 08:00:04'),
(903, 28, 32, 1, '06', '2018', '2018-06-13 08:00:05', '2018-06-13 08:00:05'),
(904, 28, 32, 1, '06', '2018', '2018-06-13 08:00:07', '2018-06-13 08:00:07'),
(905, 28, 32, 1, '06', '2018', '2018-06-13 08:00:07', '2018-06-13 08:00:07'),
(906, 28, 32, 1, '06', '2018', '2018-06-13 08:00:08', '2018-06-13 08:00:08'),
(907, 28, 32, 1, '06', '2018', '2018-06-13 08:00:09', '2018-06-13 08:00:09'),
(908, 28, 32, 1, '06', '2018', '2018-06-13 08:00:10', '2018-06-13 08:00:10'),
(909, 28, 32, 1, '06', '2018', '2018-06-13 08:00:12', '2018-06-13 08:00:12'),
(910, 28, 32, 1, '06', '2018', '2018-06-13 08:00:13', '2018-06-13 08:00:13'),
(911, 28, 32, 1, '06', '2018', '2018-06-13 08:00:25', '2018-06-13 08:00:25'),
(912, 28, 32, 1, '06', '2018', '2018-06-13 08:05:11', '2018-06-13 08:05:11'),
(913, 28, 32, 1, '06', '2018', '2018-06-13 08:10:06', '2018-06-13 08:10:06'),
(914, 28, 32, 1, '06', '2018', '2018-06-13 08:10:07', '2018-06-13 08:10:07'),
(915, 28, 32, 1, '06', '2018', '2018-06-13 08:10:08', '2018-06-13 08:10:08'),
(916, 28, 32, 1, '06', '2018', '2018-06-13 08:10:09', '2018-06-13 08:10:09'),
(917, 28, 32, 1, '06', '2018', '2018-06-13 08:10:09', '2018-06-13 08:10:09'),
(918, 28, 32, 1, '06', '2018', '2018-06-13 08:10:10', '2018-06-13 08:10:10'),
(919, 28, 32, 1, '06', '2018', '2018-06-13 08:12:22', '2018-06-13 08:12:22'),
(920, 28, 32, 1, '06', '2018', '2018-06-13 08:12:23', '2018-06-13 08:12:23'),
(921, 28, 32, 1, '06', '2018', '2018-06-13 08:12:24', '2018-06-13 08:12:24'),
(922, 28, 32, 1, '06', '2018', '2018-06-13 08:12:24', '2018-06-13 08:12:24'),
(923, 28, 32, 1, '06', '2018', '2018-06-13 08:12:24', '2018-06-13 08:12:24'),
(924, 28, 32, 1, '06', '2018', '2018-06-13 08:12:24', '2018-06-13 08:12:24'),
(925, 28, 32, 1, '06', '2018', '2018-06-13 08:12:25', '2018-06-13 08:12:25'),
(926, 28, 32, 1, '06', '2018', '2018-06-13 08:12:25', '2018-06-13 08:12:25'),
(927, 28, 32, 1, '06', '2018', '2018-06-13 08:12:25', '2018-06-13 08:12:25'),
(928, 28, 32, 1, '06', '2018', '2018-06-13 08:12:25', '2018-06-13 08:12:25'),
(929, 28, 32, 1, '06', '2018', '2018-06-13 08:12:25', '2018-06-13 08:12:25'),
(930, 28, 32, 1, '06', '2018', '2018-06-13 08:12:25', '2018-06-13 08:12:25'),
(931, 28, 32, 1, '06', '2018', '2018-06-13 08:12:26', '2018-06-13 08:12:26'),
(932, 28, 32, 1, '06', '2018', '2018-06-13 08:14:34', '2018-06-13 08:14:34'),
(933, 28, 32, 1, '06', '2018', '2018-06-13 08:14:42', '2018-06-13 08:14:42'),
(934, 28, 32, 1, '06', '2018', '2018-06-13 08:21:03', '2018-06-13 08:21:03'),
(935, 28, 32, 1, '06', '2018', '2018-06-13 08:21:06', '2018-06-13 08:21:06'),
(936, 28, 32, 1, '06', '2018', '2018-06-13 08:21:10', '2018-06-13 08:21:10'),
(937, 28, 32, 1, '06', '2018', '2018-06-13 08:23:54', '2018-06-13 08:23:54'),
(938, 28, 32, 1, '06', '2018', '2018-06-13 08:30:30', '2018-06-13 08:30:30'),
(939, 28, 40, 1, '06', '2018', '2018-06-15 06:39:13', '2018-06-15 06:39:13'),
(940, 28, 29, 1, '06', '2018', '2018-06-15 06:44:50', '2018-06-15 06:44:50'),
(941, 28, 29, 1, '06', '2018', '2018-06-15 06:44:52', '2018-06-15 06:44:52'),
(942, 32, 36, 1, '06', '2018', '2018-06-15 07:36:18', '2018-06-15 07:36:18'),
(943, 32, 36, 1, '06', '2018', '2018-06-15 07:36:27', '2018-06-15 07:36:27'),
(944, 28, 36, 1, '06', '2018', '2018-06-15 14:22:40', '2018-06-15 14:22:40'),
(945, 28, 35, 1, '06', '2018', '2018-06-16 09:54:36', '2018-06-16 09:54:36'),
(946, 28, 35, 1, '06', '2018', '2018-06-16 09:54:38', '2018-06-16 09:54:38'),
(947, 28, 35, 1, '06', '2018', '2018-06-16 09:55:12', '2018-06-16 09:55:12'),
(948, 28, 35, 1, '06', '2018', '2018-06-16 09:55:27', '2018-06-16 09:55:27'),
(949, 28, 35, 1, '06', '2018', '2018-06-16 09:55:49', '2018-06-16 09:55:49'),
(950, 28, 35, 1, '06', '2018', '2018-06-16 11:55:44', '2018-06-16 11:55:44'),
(951, 28, 35, 1, '06', '2018', '2018-06-16 12:18:55', '2018-06-16 12:18:55'),
(952, 28, 35, 1, '06', '2018', '2018-06-16 12:18:57', '2018-06-16 12:18:57'),
(953, 28, 35, 1, '06', '2018', '2018-06-16 12:19:26', '2018-06-16 12:19:26'),
(954, 30, 29, 1, '06', '2018', '2018-06-18 06:26:40', '2018-06-18 06:26:40'),
(955, 30, 28, 1, '06', '2018', '2018-06-18 06:26:54', '2018-06-18 06:26:54'),
(956, 28, 35, 1, '06', '2018', '2018-06-18 06:28:05', '2018-06-18 06:28:05'),
(957, 28, 35, 1, '06', '2018', '2018-06-18 06:28:15', '2018-06-18 06:28:15'),
(958, 28, 32, 1, '06', '2018', '2018-06-18 07:38:49', '2018-06-18 07:38:49'),
(959, 28, 32, 1, '06', '2018', '2018-06-18 07:38:55', '2018-06-18 07:38:55'),
(960, 28, 32, 1, '06', '2018', '2018-06-18 08:03:48', '2018-06-18 08:03:48'),
(961, 28, 32, 1, '06', '2018', '2018-06-18 09:33:40', '2018-06-18 09:33:40'),
(962, 28, 32, 1, '06', '2018', '2018-06-18 09:37:20', '2018-06-18 09:37:20'),
(963, 32, 35, 1, '06', '2018', '2018-06-18 09:40:03', '2018-06-18 09:40:03'),
(964, 28, 35, 1, '06', '2018', '2018-06-18 09:42:12', '2018-06-18 09:42:12'),
(965, 32, 35, 1, '06', '2018', '2018-06-18 09:44:35', '2018-06-18 09:44:35'),
(966, 28, 32, 1, '06', '2018', '2018-06-18 09:46:11', '2018-06-18 09:46:11'),
(967, 28, 32, 1, '06', '2018', '2018-06-18 09:57:09', '2018-06-18 09:57:09'),
(968, 28, 32, 1, '06', '2018', '2018-06-18 09:57:15', '2018-06-18 09:57:15'),
(969, 28, 32, 1, '06', '2018', '2018-06-18 09:57:15', '2018-06-18 09:57:15'),
(970, 28, 32, 1, '06', '2018', '2018-06-18 09:57:16', '2018-06-18 09:57:16'),
(971, 28, 32, 1, '06', '2018', '2018-06-18 09:57:17', '2018-06-18 09:57:17'),
(972, 28, 32, 1, '06', '2018', '2018-06-18 09:58:24', '2018-06-18 09:58:24'),
(973, 28, 32, 1, '06', '2018', '2018-06-18 09:58:24', '2018-06-18 09:58:24'),
(974, 28, 32, 1, '06', '2018', '2018-06-18 09:58:25', '2018-06-18 09:58:25'),
(975, 28, 32, 1, '06', '2018', '2018-06-18 09:58:25', '2018-06-18 09:58:25'),
(976, 28, 32, 1, '06', '2018', '2018-06-18 09:58:25', '2018-06-18 09:58:25'),
(977, 28, 32, 1, '06', '2018', '2018-06-18 09:58:26', '2018-06-18 09:58:26'),
(978, 28, 32, 1, '06', '2018', '2018-06-18 09:58:26', '2018-06-18 09:58:26'),
(979, 28, 32, 1, '06', '2018', '2018-06-18 09:58:26', '2018-06-18 09:58:26'),
(980, 28, 32, 1, '06', '2018', '2018-06-18 09:58:26', '2018-06-18 09:58:26'),
(981, 28, 32, 1, '06', '2018', '2018-06-18 09:58:27', '2018-06-18 09:58:27'),
(982, 28, 32, 1, '06', '2018', '2018-06-18 09:58:27', '2018-06-18 09:58:27'),
(983, 28, 32, 1, '06', '2018', '2018-06-18 09:58:27', '2018-06-18 09:58:27'),
(984, 28, 32, 1, '06', '2018', '2018-06-18 09:58:28', '2018-06-18 09:58:28'),
(985, 28, 32, 1, '06', '2018', '2018-06-18 09:58:28', '2018-06-18 09:58:28'),
(986, 28, 32, 1, '06', '2018', '2018-06-18 09:58:28', '2018-06-18 09:58:28'),
(987, 28, 32, 1, '06', '2018', '2018-06-18 09:58:29', '2018-06-18 09:58:29'),
(988, 28, 32, 1, '06', '2018', '2018-06-18 09:58:29', '2018-06-18 09:58:29'),
(989, 28, 32, 1, '06', '2018', '2018-06-18 10:03:04', '2018-06-18 10:03:04'),
(990, 28, 30, 1, '06', '2018', '2018-06-18 10:03:31', '2018-06-18 10:03:31'),
(991, 28, 29, 1, '06', '2018', '2018-06-18 10:03:38', '2018-06-18 10:03:38'),
(992, 28, 35, 1, '06', '2018', '2018-06-18 10:04:50', '2018-06-18 10:04:50'),
(993, 28, 35, 1, '06', '2018', '2018-06-18 10:07:00', '2018-06-18 10:07:00'),
(994, 28, 35, 1, '06', '2018', '2018-06-18 10:07:40', '2018-06-18 10:07:40'),
(995, 28, 35, 1, '06', '2018', '2018-06-18 10:07:40', '2018-06-18 10:07:40'),
(996, 28, 35, 1, '06', '2018', '2018-06-18 10:07:40', '2018-06-18 10:07:40'),
(997, 32, 35, 1, '06', '2018', '2018-06-18 10:07:47', '2018-06-18 10:07:47'),
(998, 28, 35, 1, '06', '2018', '2018-06-18 10:08:16', '2018-06-18 10:08:16'),
(999, 32, 35, 1, '06', '2018', '2018-06-18 10:08:18', '2018-06-18 10:08:18'),
(1000, 32, 35, 1, '06', '2018', '2018-06-18 10:08:59', '2018-06-18 10:08:59'),
(1001, 28, 29, 1, '06', '2018', '2018-06-18 10:10:06', '2018-06-18 10:10:06'),
(1002, 32, 35, 1, '06', '2018', '2018-06-18 10:10:27', '2018-06-18 10:10:27'),
(1003, 28, 35, 1, '06', '2018', '2018-06-18 10:13:54', '2018-06-18 10:13:54'),
(1004, 28, 35, 1, '06', '2018', '2018-06-18 10:13:55', '2018-06-18 10:13:55'),
(1005, 28, 35, 1, '06', '2018', '2018-06-18 10:13:56', '2018-06-18 10:13:56'),
(1006, 28, 32, 1, '06', '2018', '2018-06-18 10:14:00', '2018-06-18 10:14:00'),
(1007, 28, 32, 1, '06', '2018', '2018-06-18 10:14:00', '2018-06-18 10:14:00'),
(1008, 28, 35, 1, '06', '2018', '2018-06-18 10:14:04', '2018-06-18 10:14:04'),
(1009, 28, 35, 1, '06', '2018', '2018-06-18 10:14:05', '2018-06-18 10:14:05'),
(1010, 28, 35, 1, '06', '2018', '2018-06-18 10:14:05', '2018-06-18 10:14:05'),
(1011, 28, 35, 1, '06', '2018', '2018-06-18 10:14:05', '2018-06-18 10:14:05'),
(1012, 28, 35, 1, '06', '2018', '2018-06-18 10:14:05', '2018-06-18 10:14:05'),
(1013, 28, 35, 1, '06', '2018', '2018-06-18 10:14:05', '2018-06-18 10:14:05'),
(1014, 28, 35, 1, '06', '2018', '2018-06-18 10:14:11', '2018-06-18 10:14:11'),
(1015, 28, 35, 1, '06', '2018', '2018-06-18 10:14:12', '2018-06-18 10:14:12'),
(1016, 28, 35, 1, '06', '2018', '2018-06-18 10:14:12', '2018-06-18 10:14:12'),
(1017, 28, 35, 1, '06', '2018', '2018-06-18 10:15:01', '2018-06-18 10:15:01'),
(1018, 28, 35, 1, '06', '2018', '2018-06-18 10:15:04', '2018-06-18 10:15:04'),
(1019, 28, 35, 1, '06', '2018', '2018-06-18 10:15:09', '2018-06-18 10:15:09'),
(1020, 28, 35, 1, '06', '2018', '2018-06-18 10:15:12', '2018-06-18 10:15:12'),
(1021, 28, 35, 1, '06', '2018', '2018-06-18 10:16:30', '2018-06-18 10:16:30'),
(1022, 28, 35, 1, '06', '2018', '2018-06-18 10:16:31', '2018-06-18 10:16:31'),
(1023, 28, 32, 1, '06', '2018', '2018-06-18 10:21:00', '2018-06-18 10:21:00'),
(1024, 28, 32, 1, '06', '2018', '2018-06-18 10:21:01', '2018-06-18 10:21:01'),
(1025, 28, 32, 1, '06', '2018', '2018-06-18 10:21:01', '2018-06-18 10:21:01'),
(1026, 28, 32, 1, '06', '2018', '2018-06-18 10:21:01', '2018-06-18 10:21:01'),
(1027, 28, 32, 1, '06', '2018', '2018-06-18 10:21:02', '2018-06-18 10:21:02'),
(1028, 28, 32, 1, '06', '2018', '2018-06-18 10:21:03', '2018-06-18 10:21:03'),
(1029, 28, 32, 1, '06', '2018', '2018-06-18 10:21:03', '2018-06-18 10:21:03'),
(1030, 28, 32, 1, '06', '2018', '2018-06-18 10:21:03', '2018-06-18 10:21:03'),
(1031, 28, 32, 1, '06', '2018', '2018-06-18 10:21:04', '2018-06-18 10:21:04'),
(1032, 28, 32, 1, '06', '2018', '2018-06-18 10:21:04', '2018-06-18 10:21:04'),
(1033, 28, 32, 1, '06', '2018', '2018-06-18 10:21:50', '2018-06-18 10:21:50'),
(1034, 28, 32, 1, '06', '2018', '2018-06-18 10:22:06', '2018-06-18 10:22:06'),
(1035, 28, 29, 1, '06', '2018', '2018-06-18 10:23:36', '2018-06-18 10:23:36'),
(1036, 28, 29, 1, '06', '2018', '2018-06-18 10:23:42', '2018-06-18 10:23:42'),
(1037, 28, 32, 1, '06', '2018', '2018-06-18 10:25:17', '2018-06-18 10:25:17'),
(1038, 28, 35, 1, '06', '2018', '2018-06-18 10:25:34', '2018-06-18 10:25:34'),
(1039, 28, 29, 1, '06', '2018', '2018-06-18 10:26:22', '2018-06-18 10:26:22'),
(1040, 28, 32, 1, '06', '2018', '2018-06-18 10:26:52', '2018-06-18 10:26:52'),
(1041, 28, 32, 1, '06', '2018', '2018-06-18 10:26:52', '2018-06-18 10:26:52'),
(1042, 28, 32, 1, '06', '2018', '2018-06-18 10:26:53', '2018-06-18 10:26:53'),
(1043, 28, 32, 1, '06', '2018', '2018-06-18 10:26:53', '2018-06-18 10:26:53'),
(1044, 28, 32, 1, '06', '2018', '2018-06-18 10:26:53', '2018-06-18 10:26:53'),
(1045, 28, 32, 1, '06', '2018', '2018-06-18 10:26:53', '2018-06-18 10:26:53'),
(1046, 28, 32, 1, '06', '2018', '2018-06-18 10:26:53', '2018-06-18 10:26:53'),
(1047, 28, 32, 1, '06', '2018', '2018-06-18 10:26:53', '2018-06-18 10:26:53'),
(1048, 28, 32, 1, '06', '2018', '2018-06-18 10:26:53', '2018-06-18 10:26:53'),
(1049, 28, 32, 1, '06', '2018', '2018-06-18 10:26:53', '2018-06-18 10:26:53'),
(1050, 28, 32, 1, '06', '2018', '2018-06-18 10:26:53', '2018-06-18 10:26:53'),
(1051, 28, 32, 1, '06', '2018', '2018-06-18 10:26:54', '2018-06-18 10:26:54'),
(1052, 28, 32, 1, '06', '2018', '2018-06-18 10:28:17', '2018-06-18 10:28:17'),
(1053, 28, 32, 1, '06', '2018', '2018-06-18 10:28:20', '2018-06-18 10:28:20'),
(1054, 28, 32, 1, '06', '2018', '2018-06-18 10:28:22', '2018-06-18 10:28:22'),
(1055, 28, 32, 1, '06', '2018', '2018-06-18 10:28:23', '2018-06-18 10:28:23'),
(1056, 28, 32, 1, '06', '2018', '2018-06-18 10:28:24', '2018-06-18 10:28:24'),
(1057, 28, 29, 1, '06', '2018', '2018-06-18 10:29:05', '2018-06-18 10:29:05'),
(1058, 28, 29, 1, '06', '2018', '2018-06-18 10:29:06', '2018-06-18 10:29:06'),
(1059, 28, 32, 1, '06', '2018', '2018-06-18 10:30:33', '2018-06-18 10:30:33'),
(1060, 28, 32, 1, '06', '2018', '2018-06-18 10:30:34', '2018-06-18 10:30:34'),
(1061, 28, 32, 1, '06', '2018', '2018-06-18 10:30:35', '2018-06-18 10:30:35'),
(1062, 28, 32, 1, '06', '2018', '2018-06-18 10:30:35', '2018-06-18 10:30:35'),
(1063, 28, 32, 1, '06', '2018', '2018-06-18 10:30:36', '2018-06-18 10:30:36'),
(1064, 28, 32, 1, '06', '2018', '2018-06-18 10:30:41', '2018-06-18 10:30:41'),
(1065, 28, 32, 1, '06', '2018', '2018-06-18 10:30:41', '2018-06-18 10:30:41'),
(1066, 28, 29, 1, '06', '2018', '2018-06-18 10:35:48', '2018-06-18 10:35:48'),
(1067, 28, 32, 1, '06', '2018', '2018-06-18 11:07:30', '2018-06-18 11:07:30'),
(1068, 28, 32, 1, '06', '2018', '2018-06-18 11:07:30', '2018-06-18 11:07:30'),
(1069, 28, 32, 1, '06', '2018', '2018-06-18 11:08:48', '2018-06-18 11:08:48'),
(1070, 28, 32, 1, '06', '2018', '2018-06-18 11:08:50', '2018-06-18 11:08:50'),
(1071, 28, 32, 1, '06', '2018', '2018-06-18 11:08:50', '2018-06-18 11:08:50'),
(1072, 28, 29, 1, '06', '2018', '2018-06-18 11:24:38', '2018-06-18 11:24:38'),
(1073, 28, 29, 1, '06', '2018', '2018-06-18 11:26:54', '2018-06-18 11:26:54'),
(1074, 28, 29, 1, '06', '2018', '2018-06-18 11:28:51', '2018-06-18 11:28:51'),
(1075, 28, 29, 1, '06', '2018', '2018-06-18 11:33:00', '2018-06-18 11:33:00'),
(1076, 28, 32, 1, '06', '2018', '2018-06-18 11:33:38', '2018-06-18 11:33:38'),
(1077, 28, 32, 1, '06', '2018', '2018-06-18 11:33:38', '2018-06-18 11:33:38'),
(1078, 28, 32, 1, '06', '2018', '2018-06-18 11:33:39', '2018-06-18 11:33:39'),
(1079, 28, 32, 1, '06', '2018', '2018-06-18 11:33:39', '2018-06-18 11:33:39'),
(1080, 28, 32, 1, '06', '2018', '2018-06-18 11:33:39', '2018-06-18 11:33:39'),
(1081, 28, 32, 1, '06', '2018', '2018-06-18 11:33:39', '2018-06-18 11:33:39'),
(1082, 28, 32, 1, '06', '2018', '2018-06-18 11:33:40', '2018-06-18 11:33:40'),
(1083, 28, 32, 1, '06', '2018', '2018-06-18 11:33:40', '2018-06-18 11:33:40'),
(1084, 28, 32, 1, '06', '2018', '2018-06-18 11:33:45', '2018-06-18 11:33:45'),
(1085, 28, 32, 1, '06', '2018', '2018-06-18 11:33:46', '2018-06-18 11:33:46'),
(1086, 28, 32, 1, '06', '2018', '2018-06-18 11:36:11', '2018-06-18 11:36:11'),
(1087, 28, 29, 1, '06', '2018', '2018-06-18 11:47:16', '2018-06-18 11:47:16'),
(1088, 28, 29, 1, '06', '2018', '2018-06-18 11:47:25', '2018-06-18 11:47:25'),
(1089, 28, 29, 1, '06', '2018', '2018-06-18 11:48:32', '2018-06-18 11:48:32'),
(1090, 28, 35, 1, '06', '2018', '2018-06-18 12:13:47', '2018-06-18 12:13:47'),
(1091, 28, 35, 1, '06', '2018', '2018-06-18 12:13:58', '2018-06-18 12:13:58'),
(1092, 28, 35, 1, '06', '2018', '2018-06-18 12:14:02', '2018-06-18 12:14:02'),
(1093, 28, 35, 1, '06', '2018', '2018-06-18 12:16:01', '2018-06-18 12:16:01'),
(1094, 28, 35, 1, '06', '2018', '2018-06-18 12:16:01', '2018-06-18 12:16:01'),
(1095, 28, 35, 1, '06', '2018', '2018-06-18 12:16:04', '2018-06-18 12:16:04'),
(1096, 28, 35, 1, '06', '2018', '2018-06-18 12:16:12', '2018-06-18 12:16:12'),
(1097, 28, 35, 1, '06', '2018', '2018-06-18 12:16:12', '2018-06-18 12:16:12'),
(1098, 28, 35, 1, '06', '2018', '2018-06-18 12:16:13', '2018-06-18 12:16:13'),
(1099, 28, 35, 1, '06', '2018', '2018-06-18 12:16:22', '2018-06-18 12:16:22'),
(1100, 28, 35, 1, '06', '2018', '2018-06-18 12:16:35', '2018-06-18 12:16:35'),
(1101, 28, 32, 1, '06', '2018', '2018-06-18 12:17:07', '2018-06-18 12:17:07'),
(1102, 28, 32, 1, '06', '2018', '2018-06-18 12:17:07', '2018-06-18 12:17:07'),
(1103, 28, 32, 1, '06', '2018', '2018-06-18 12:17:56', '2018-06-18 12:17:56'),
(1104, 28, 32, 1, '06', '2018', '2018-06-18 12:18:00', '2018-06-18 12:18:00'),
(1105, 28, 32, 1, '06', '2018', '2018-06-18 12:18:01', '2018-06-18 12:18:01'),
(1106, 28, 32, 1, '06', '2018', '2018-06-18 12:18:34', '2018-06-18 12:18:34'),
(1107, 28, 35, 1, '06', '2018', '2018-06-18 12:18:54', '2018-06-18 12:18:54'),
(1108, 28, 32, 1, '06', '2018', '2018-06-18 12:20:42', '2018-06-18 12:20:42'),
(1109, 28, 32, 1, '06', '2018', '2018-06-18 12:20:43', '2018-06-18 12:20:43'),
(1110, 28, 32, 1, '06', '2018', '2018-06-18 12:20:44', '2018-06-18 12:20:44'),
(1111, 28, 32, 1, '06', '2018', '2018-06-18 12:20:44', '2018-06-18 12:20:44'),
(1112, 28, 32, 1, '06', '2018', '2018-06-18 12:20:45', '2018-06-18 12:20:45'),
(1113, 28, 32, 1, '06', '2018', '2018-06-18 12:20:45', '2018-06-18 12:20:45'),
(1114, 28, 32, 1, '06', '2018', '2018-06-18 12:20:45', '2018-06-18 12:20:45'),
(1115, 28, 32, 1, '06', '2018', '2018-06-18 12:20:45', '2018-06-18 12:20:45'),
(1116, 28, 32, 1, '06', '2018', '2018-06-18 12:20:45', '2018-06-18 12:20:45'),
(1117, 28, 32, 1, '06', '2018', '2018-06-18 12:20:46', '2018-06-18 12:20:46'),
(1118, 28, 32, 1, '06', '2018', '2018-06-18 12:20:46', '2018-06-18 12:20:46'),
(1119, 28, 32, 1, '06', '2018', '2018-06-18 12:20:47', '2018-06-18 12:20:47'),
(1120, 28, 32, 1, '06', '2018', '2018-06-18 12:20:47', '2018-06-18 12:20:47'),
(1121, 28, 32, 1, '06', '2018', '2018-06-18 12:20:47', '2018-06-18 12:20:47'),
(1122, 28, 32, 1, '06', '2018', '2018-06-18 12:20:47', '2018-06-18 12:20:47'),
(1123, 28, 32, 1, '06', '2018', '2018-06-18 12:20:48', '2018-06-18 12:20:48'),
(1124, 28, 32, 1, '06', '2018', '2018-06-18 12:20:48', '2018-06-18 12:20:48'),
(1125, 28, 32, 1, '06', '2018', '2018-06-18 12:20:48', '2018-06-18 12:20:48'),
(1126, 28, 32, 1, '06', '2018', '2018-06-18 12:21:07', '2018-06-18 12:21:07'),
(1127, 28, 32, 1, '06', '2018', '2018-06-18 12:21:08', '2018-06-18 12:21:08'),
(1128, 28, 35, 1, '06', '2018', '2018-06-18 12:21:27', '2018-06-18 12:21:27'),
(1129, 28, 35, 1, '06', '2018', '2018-06-18 12:22:13', '2018-06-18 12:22:13'),
(1130, 28, 35, 1, '06', '2018', '2018-06-18 12:26:19', '2018-06-18 12:26:19'),
(1131, 28, 35, 1, '06', '2018', '2018-06-18 12:26:19', '2018-06-18 12:26:19'),
(1132, 28, 35, 1, '06', '2018', '2018-06-18 12:26:19', '2018-06-18 12:26:19'),
(1133, 28, 35, 1, '06', '2018', '2018-06-18 12:26:21', '2018-06-18 12:26:21'),
(1134, 28, 35, 1, '06', '2018', '2018-06-18 12:26:21', '2018-06-18 12:26:21'),
(1135, 28, 35, 1, '06', '2018', '2018-06-18 12:26:21', '2018-06-18 12:26:21'),
(1136, 28, 35, 1, '06', '2018', '2018-06-18 12:26:34', '2018-06-18 12:26:34'),
(1137, 28, 35, 1, '06', '2018', '2018-06-18 12:26:34', '2018-06-18 12:26:34'),
(1138, 28, 35, 1, '06', '2018', '2018-06-18 12:26:35', '2018-06-18 12:26:35'),
(1139, 28, 35, 1, '06', '2018', '2018-06-18 12:26:36', '2018-06-18 12:26:36'),
(1140, 28, 29, 1, '06', '2018', '2018-06-18 12:34:40', '2018-06-18 12:34:40'),
(1141, 28, 32, 1, '06', '2018', '2018-06-18 13:21:45', '2018-06-18 13:21:45'),
(1142, 28, 32, 1, '06', '2018', '2018-06-18 13:21:46', '2018-06-18 13:21:46'),
(1143, 28, 32, 1, '06', '2018', '2018-06-18 13:27:20', '2018-06-18 13:27:20'),
(1144, 28, 32, 1, '06', '2018', '2018-06-18 13:27:20', '2018-06-18 13:27:20'),
(1145, 28, 32, 1, '06', '2018', '2018-06-18 13:27:20', '2018-06-18 13:27:20'),
(1146, 28, 32, 1, '06', '2018', '2018-06-18 13:27:21', '2018-06-18 13:27:21'),
(1147, 28, 32, 1, '06', '2018', '2018-06-18 13:27:21', '2018-06-18 13:27:21'),
(1148, 28, 32, 1, '06', '2018', '2018-06-18 13:27:21', '2018-06-18 13:27:21'),
(1149, 28, 32, 1, '06', '2018', '2018-06-18 13:27:21', '2018-06-18 13:27:21'),
(1150, 28, 32, 1, '06', '2018', '2018-06-18 13:27:21', '2018-06-18 13:27:21'),
(1151, 28, 32, 1, '06', '2018', '2018-06-18 13:48:16', '2018-06-18 13:48:16'),
(1152, 28, 32, 1, '06', '2018', '2018-06-18 14:16:20', '2018-06-18 14:16:20'),
(1153, 28, 32, 1, '06', '2018', '2018-06-18 14:16:21', '2018-06-18 14:16:21'),
(1154, 28, 32, 1, '06', '2018', '2018-06-18 14:16:21', '2018-06-18 14:16:21'),
(1155, 28, 32, 1, '06', '2018', '2018-06-18 14:16:21', '2018-06-18 14:16:21'),
(1156, 28, 32, 1, '06', '2018', '2018-06-18 14:16:21', '2018-06-18 14:16:21'),
(1157, 28, 32, 1, '06', '2018', '2018-06-18 14:16:57', '2018-06-18 14:16:57'),
(1158, 28, 32, 1, '06', '2018', '2018-06-18 14:16:58', '2018-06-18 14:16:58'),
(1159, 28, 32, 1, '06', '2018', '2018-06-18 14:16:59', '2018-06-18 14:16:59'),
(1160, 28, 32, 1, '06', '2018', '2018-06-18 14:16:59', '2018-06-18 14:16:59'),
(1161, 28, 32, 1, '06', '2018', '2018-06-18 14:16:59', '2018-06-18 14:16:59'),
(1162, 28, 32, 1, '06', '2018', '2018-06-18 14:16:59', '2018-06-18 14:16:59'),
(1163, 28, 32, 1, '06', '2018', '2018-06-18 14:16:59', '2018-06-18 14:16:59'),
(1164, 28, 32, 1, '06', '2018', '2018-06-18 14:17:00', '2018-06-18 14:17:00'),
(1165, 28, 32, 1, '06', '2018', '2018-06-18 14:17:00', '2018-06-18 14:17:00'),
(1166, 28, 32, 1, '06', '2018', '2018-06-18 14:17:00', '2018-06-18 14:17:00'),
(1167, 28, 32, 1, '06', '2018', '2018-06-18 14:17:13', '2018-06-18 14:17:13'),
(1168, 28, 32, 1, '06', '2018', '2018-06-18 14:18:28', '2018-06-18 14:18:28'),
(1169, 28, 32, 1, '06', '2018', '2018-06-18 14:18:28', '2018-06-18 14:18:28'),
(1170, 28, 32, 1, '06', '2018', '2018-06-18 14:18:29', '2018-06-18 14:18:29'),
(1171, 28, 32, 1, '06', '2018', '2018-06-18 14:18:29', '2018-06-18 14:18:29'),
(1172, 28, 32, 1, '06', '2018', '2018-06-18 14:18:29', '2018-06-18 14:18:29'),
(1173, 28, 32, 1, '06', '2018', '2018-06-18 14:18:29', '2018-06-18 14:18:29'),
(1174, 28, 32, 1, '06', '2018', '2018-06-18 14:18:30', '2018-06-18 14:18:30'),
(1175, 28, 32, 1, '06', '2018', '2018-06-18 14:18:31', '2018-06-18 14:18:31'),
(1176, 28, 32, 1, '06', '2018', '2018-06-18 14:18:31', '2018-06-18 14:18:31'),
(1177, 28, 32, 1, '06', '2018', '2018-06-18 14:18:31', '2018-06-18 14:18:31'),
(1178, 28, 32, 1, '06', '2018', '2018-06-18 14:18:31', '2018-06-18 14:18:31'),
(1179, 28, 32, 1, '06', '2018', '2018-06-18 14:18:31', '2018-06-18 14:18:31'),
(1180, 28, 32, 1, '06', '2018', '2018-06-18 14:18:31', '2018-06-18 14:18:31'),
(1181, 28, 32, 1, '06', '2018', '2018-06-18 14:18:32', '2018-06-18 14:18:32'),
(1182, 28, 32, 1, '06', '2018', '2018-06-18 14:18:32', '2018-06-18 14:18:32'),
(1183, 28, 32, 1, '06', '2018', '2018-06-18 14:18:32', '2018-06-18 14:18:32'),
(1184, 28, 32, 1, '06', '2018', '2018-06-18 14:18:32', '2018-06-18 14:18:32'),
(1185, 28, 32, 1, '06', '2018', '2018-06-18 14:18:32', '2018-06-18 14:18:32'),
(1186, 28, 32, 1, '06', '2018', '2018-06-18 14:18:32', '2018-06-18 14:18:32'),
(1187, 28, 32, 1, '06', '2018', '2018-06-18 14:18:33', '2018-06-18 14:18:33'),
(1188, 28, 32, 1, '06', '2018', '2018-06-18 14:18:34', '2018-06-18 14:18:34'),
(1189, 28, 32, 1, '06', '2018', '2018-06-18 14:20:11', '2018-06-18 14:20:11'),
(1190, 28, 32, 1, '06', '2018', '2018-06-18 14:38:16', '2018-06-18 14:38:16'),
(1191, 28, 32, 1, '06', '2018', '2018-06-18 14:38:25', '2018-06-18 14:38:25'),
(1192, 28, 32, 1, '06', '2018', '2018-06-18 14:42:19', '2018-06-18 14:42:19'),
(1193, 28, 32, 1, '06', '2018', '2018-06-18 14:42:20', '2018-06-18 14:42:20'),
(1194, 28, 32, 1, '06', '2018', '2018-06-18 14:42:20', '2018-06-18 14:42:20'),
(1195, 28, 32, 1, '06', '2018', '2018-06-18 14:42:20', '2018-06-18 14:42:20'),
(1196, 28, 32, 1, '06', '2018', '2018-06-18 14:42:21', '2018-06-18 14:42:21'),
(1197, 28, 32, 1, '06', '2018', '2018-06-18 14:42:21', '2018-06-18 14:42:21'),
(1198, 28, 32, 1, '06', '2018', '2018-06-18 14:42:22', '2018-06-18 14:42:22'),
(1199, 28, 32, 1, '06', '2018', '2018-06-18 14:42:23', '2018-06-18 14:42:23'),
(1200, 28, 32, 1, '06', '2018', '2018-06-18 14:42:23', '2018-06-18 14:42:23'),
(1201, 28, 32, 1, '06', '2018', '2018-06-18 14:42:24', '2018-06-18 14:42:24'),
(1202, 28, 35, 1, '06', '2018', '2018-06-18 14:42:59', '2018-06-18 14:42:59'),
(1203, 28, 35, 1, '06', '2018', '2018-06-18 14:43:40', '2018-06-18 14:43:40'),
(1204, 28, 35, 1, '06', '2018', '2018-06-18 14:43:43', '2018-06-18 14:43:43'),
(1205, 28, 35, 1, '06', '2018', '2018-06-18 14:43:43', '2018-06-18 14:43:43'),
(1206, 28, 35, 1, '06', '2018', '2018-06-18 14:46:37', '2018-06-18 14:46:37'),
(1207, 28, 35, 1, '06', '2018', '2018-06-18 14:46:38', '2018-06-18 14:46:38'),
(1208, 28, 35, 1, '06', '2018', '2018-06-18 14:46:38', '2018-06-18 14:46:38'),
(1209, 28, 35, 1, '06', '2018', '2018-06-18 14:46:38', '2018-06-18 14:46:38'),
(1210, 28, 29, 1, '06', '2018', '2018-06-18 14:47:01', '2018-06-18 14:47:01'),
(1211, 28, 29, 1, '06', '2018', '2018-06-18 14:47:28', '2018-06-18 14:47:28'),
(1212, 28, 29, 1, '06', '2018', '2018-06-18 14:48:47', '2018-06-18 14:48:47'),
(1213, 28, 29, 1, '06', '2018', '2018-06-18 14:49:18', '2018-06-18 14:49:18'),
(1214, 28, 29, 1, '06', '2018', '2018-06-18 14:49:29', '2018-06-18 14:49:29'),
(1215, 28, 29, 1, '06', '2018', '2018-06-18 14:53:52', '2018-06-18 14:53:52'),
(1216, 28, 29, 1, '06', '2018', '2018-06-18 14:54:31', '2018-06-18 14:54:31'),
(1217, 28, 29, 1, '06', '2018', '2018-06-18 14:57:04', '2018-06-18 14:57:04'),
(1218, 28, 29, 1, '06', '2018', '2018-06-18 14:57:11', '2018-06-18 14:57:11'),
(1219, 28, 29, 1, '06', '2018', '2018-06-18 14:57:12', '2018-06-18 14:57:12'),
(1220, 28, 29, 1, '06', '2018', '2018-06-18 14:58:23', '2018-06-18 14:58:23'),
(1221, 28, 29, 1, '06', '2018', '2018-06-18 14:58:25', '2018-06-18 14:58:25'),
(1222, 28, 29, 1, '06', '2018', '2018-06-18 14:58:26', '2018-06-18 14:58:26'),
(1223, 28, 29, 1, '06', '2018', '2018-06-18 14:58:27', '2018-06-18 14:58:27'),
(1224, 28, 29, 1, '06', '2018', '2018-06-18 14:58:28', '2018-06-18 14:58:28'),
(1225, 28, 29, 1, '06', '2018', '2018-06-18 14:58:28', '2018-06-18 14:58:28'),
(1226, 28, 29, 1, '06', '2018', '2018-06-18 14:58:29', '2018-06-18 14:58:29'),
(1227, 28, 29, 1, '06', '2018', '2018-06-18 14:58:31', '2018-06-18 14:58:31'),
(1228, 30, 32, 1, '06', '2018', '2018-06-18 15:31:30', '2018-06-18 15:31:30'),
(1229, 30, 29, 1, '06', '2018', '2018-06-18 16:16:16', '2018-06-18 16:16:16'),
(1230, 28, 35, 1, '06', '2018', '2018-06-18 16:17:14', '2018-06-18 16:17:14'),
(1231, 28, 35, 1, '06', '2018', '2018-06-18 16:17:16', '2018-06-18 16:17:16'),
(1232, 28, 35, 1, '06', '2018', '2018-06-18 16:18:33', '2018-06-18 16:18:33'),
(1233, 30, 32, 1, '06', '2018', '2018-06-19 12:23:21', '2018-06-19 12:23:21'),
(1234, 30, 31, 1, '06', '2018', '2018-06-19 12:31:11', '2018-06-19 12:31:11'),
(1235, 28, 32, 1, '06', '2018', '2018-06-19 12:31:40', '2018-06-19 12:31:40'),
(1236, 28, 32, 1, '06', '2018', '2018-06-19 12:31:47', '2018-06-19 12:31:47'),
(1237, 28, 32, 1, '06', '2018', '2018-06-19 12:52:16', '2018-06-19 12:52:16'),
(1238, 28, 32, 1, '06', '2018', '2018-06-19 12:52:21', '2018-06-19 12:52:21'),
(1239, 28, 32, 1, '06', '2018', '2018-06-19 12:55:31', '2018-06-19 12:55:31'),
(1240, 30, 32, 1, '06', '2018', '2018-06-19 12:57:55', '2018-06-19 12:57:55'),
(1241, 28, 32, 1, '06', '2018', '2018-06-19 12:58:14', '2018-06-19 12:58:14'),
(1242, 28, 32, 1, '06', '2018', '2018-06-19 12:59:45', '2018-06-19 12:59:45'),
(1243, 28, 32, 1, '06', '2018', '2018-06-19 12:59:53', '2018-06-19 12:59:53'),
(1244, 28, 32, 1, '06', '2018', '2018-06-19 13:00:55', '2018-06-19 13:00:55'),
(1245, 28, 32, 1, '06', '2018', '2018-06-19 13:01:42', '2018-06-19 13:01:42'),
(1246, 28, 32, 1, '06', '2018', '2018-06-19 13:04:29', '2018-06-19 13:04:29'),
(1247, 28, 32, 1, '06', '2018', '2018-06-19 13:05:42', '2018-06-19 13:05:42'),
(1248, 28, 32, 1, '06', '2018', '2018-06-19 13:05:48', '2018-06-19 13:05:48'),
(1249, 28, 32, 1, '06', '2018', '2018-06-19 13:05:54', '2018-06-19 13:05:54'),
(1250, 28, 32, 1, '06', '2018', '2018-06-19 13:14:23', '2018-06-19 13:14:23'),
(1251, 28, 32, 1, '06', '2018', '2018-06-19 13:18:39', '2018-06-19 13:18:39'),
(1252, 28, 32, 1, '06', '2018', '2018-06-19 13:18:40', '2018-06-19 13:18:40'),
(1253, 28, 32, 1, '06', '2018', '2018-06-19 13:18:41', '2018-06-19 13:18:41'),
(1254, 28, 32, 1, '06', '2018', '2018-06-19 13:18:41', '2018-06-19 13:18:41'),
(1255, 28, 32, 1, '06', '2018', '2018-06-19 13:20:50', '2018-06-19 13:20:50'),
(1256, 28, 32, 1, '06', '2018', '2018-06-19 13:20:52', '2018-06-19 13:20:52'),
(1257, 28, 32, 1, '06', '2018', '2018-06-19 13:20:52', '2018-06-19 13:20:52'),
(1258, 28, 32, 1, '06', '2018', '2018-06-19 13:20:54', '2018-06-19 13:20:54'),
(1259, 28, 32, 1, '06', '2018', '2018-06-19 13:20:55', '2018-06-19 13:20:55'),
(1260, 28, 32, 1, '06', '2018', '2018-06-19 13:20:56', '2018-06-19 13:20:56'),
(1261, 28, 32, 1, '06', '2018', '2018-06-19 13:20:59', '2018-06-19 13:20:59'),
(1262, 28, 32, 1, '06', '2018', '2018-06-19 13:21:00', '2018-06-19 13:21:00'),
(1263, 28, 32, 1, '06', '2018', '2018-06-19 13:23:36', '2018-06-19 13:23:36'),
(1264, 28, 32, 1, '06', '2018', '2018-06-19 13:23:37', '2018-06-19 13:23:37'),
(1265, 28, 32, 1, '06', '2018', '2018-06-19 13:23:38', '2018-06-19 13:23:38'),
(1266, 28, 32, 1, '06', '2018', '2018-06-19 13:23:39', '2018-06-19 13:23:39'),
(1267, 28, 32, 1, '06', '2018', '2018-06-19 13:23:40', '2018-06-19 13:23:40'),
(1268, 28, 32, 1, '06', '2018', '2018-06-19 13:23:40', '2018-06-19 13:23:40'),
(1269, 28, 32, 1, '06', '2018', '2018-06-19 13:23:41', '2018-06-19 13:23:41'),
(1270, 28, 32, 1, '06', '2018', '2018-06-19 13:23:42', '2018-06-19 13:23:42'),
(1271, 28, 32, 1, '06', '2018', '2018-06-19 13:23:43', '2018-06-19 13:23:43'),
(1272, 28, 32, 1, '06', '2018', '2018-06-19 13:24:40', '2018-06-19 13:24:40'),
(1273, 28, 32, 1, '06', '2018', '2018-06-19 13:24:41', '2018-06-19 13:24:41'),
(1274, 28, 32, 1, '06', '2018', '2018-06-19 13:25:31', '2018-06-19 13:25:31'),
(1275, 28, 32, 1, '06', '2018', '2018-06-19 13:25:32', '2018-06-19 13:25:32'),
(1276, 28, 32, 1, '06', '2018', '2018-06-19 13:25:33', '2018-06-19 13:25:33'),
(1277, 28, 32, 1, '06', '2018', '2018-06-19 13:25:33', '2018-06-19 13:25:33'),
(1278, 28, 32, 1, '06', '2018', '2018-06-19 13:25:33', '2018-06-19 13:25:33'),
(1279, 28, 32, 1, '06', '2018', '2018-06-19 13:25:33', '2018-06-19 13:25:33'),
(1280, 28, 32, 1, '06', '2018', '2018-06-19 13:25:33', '2018-06-19 13:25:33'),
(1281, 28, 32, 1, '06', '2018', '2018-06-19 13:25:34', '2018-06-19 13:25:34'),
(1282, 28, 32, 1, '06', '2018', '2018-06-19 13:25:34', '2018-06-19 13:25:34'),
(1283, 28, 32, 1, '06', '2018', '2018-06-19 13:25:34', '2018-06-19 13:25:34'),
(1284, 28, 32, 1, '06', '2018', '2018-06-19 13:25:35', '2018-06-19 13:25:35'),
(1285, 28, 32, 1, '06', '2018', '2018-06-19 13:25:35', '2018-06-19 13:25:35'),
(1286, 28, 32, 1, '06', '2018', '2018-06-19 13:25:35', '2018-06-19 13:25:35'),
(1287, 28, 32, 1, '06', '2018', '2018-06-19 13:25:35', '2018-06-19 13:25:35'),
(1288, 28, 32, 1, '06', '2018', '2018-06-19 13:25:35', '2018-06-19 13:25:35'),
(1289, 28, 32, 1, '06', '2018', '2018-06-19 13:25:35', '2018-06-19 13:25:35'),
(1290, 28, 32, 1, '06', '2018', '2018-06-19 13:25:36', '2018-06-19 13:25:36'),
(1291, 28, 32, 1, '06', '2018', '2018-06-19 13:25:36', '2018-06-19 13:25:36'),
(1292, 28, 32, 1, '06', '2018', '2018-06-19 13:25:37', '2018-06-19 13:25:37'),
(1293, 28, 32, 1, '06', '2018', '2018-06-19 13:25:37', '2018-06-19 13:25:37'),
(1294, 28, 32, 1, '06', '2018', '2018-06-19 13:25:37', '2018-06-19 13:25:37'),
(1295, 28, 32, 1, '06', '2018', '2018-06-19 13:25:37', '2018-06-19 13:25:37'),
(1296, 28, 32, 1, '06', '2018', '2018-06-19 13:25:37', '2018-06-19 13:25:37'),
(1297, 28, 32, 1, '06', '2018', '2018-06-19 13:25:37', '2018-06-19 13:25:37'),
(1298, 28, 32, 1, '06', '2018', '2018-06-19 13:25:37', '2018-06-19 13:25:37'),
(1299, 28, 32, 1, '06', '2018', '2018-06-19 13:25:37', '2018-06-19 13:25:37'),
(1300, 28, 32, 1, '06', '2018', '2018-06-19 13:25:37', '2018-06-19 13:25:37'),
(1301, 28, 32, 1, '06', '2018', '2018-06-19 13:25:37', '2018-06-19 13:25:37'),
(1302, 28, 32, 1, '06', '2018', '2018-06-19 15:17:58', '2018-06-19 15:17:58'),
(1303, 28, 32, 1, '06', '2018', '2018-06-19 15:18:07', '2018-06-19 15:18:07'),
(1304, 28, 32, 1, '06', '2018', '2018-06-19 15:31:44', '2018-06-19 15:31:44'),
(1305, 28, 32, 1, '06', '2018', '2018-06-20 06:31:56', '2018-06-20 06:31:56'),
(1306, 28, 32, 1, '06', '2018', '2018-06-20 06:32:25', '2018-06-20 06:32:25'),
(1307, 28, 35, 1, '06', '2018', '2018-06-20 08:53:33', '2018-06-20 08:53:33'),
(1308, 28, 35, 1, '06', '2018', '2018-06-20 08:55:24', '2018-06-20 08:55:24'),
(1309, 28, 35, 1, '06', '2018', '2018-06-20 08:55:32', '2018-06-20 08:55:32'),
(1310, 28, 35, 1, '06', '2018', '2018-06-20 09:14:05', '2018-06-20 09:14:05'),
(1311, 28, 35, 1, '06', '2018', '2018-06-20 09:14:09', '2018-06-20 09:14:09'),
(1312, 28, 35, 1, '06', '2018', '2018-06-20 09:23:31', '2018-06-20 09:23:31'),
(1313, 28, 35, 1, '06', '2018', '2018-06-20 09:23:31', '2018-06-20 09:23:31'),
(1314, 28, 35, 1, '06', '2018', '2018-06-20 09:23:35', '2018-06-20 09:23:35'),
(1315, 28, 35, 1, '06', '2018', '2018-06-20 09:23:36', '2018-06-20 09:23:36'),
(1316, 28, 35, 1, '06', '2018', '2018-06-20 09:23:37', '2018-06-20 09:23:37'),
(1317, 28, 35, 1, '06', '2018', '2018-06-20 09:23:38', '2018-06-20 09:23:38'),
(1318, 28, 35, 1, '06', '2018', '2018-06-20 09:23:38', '2018-06-20 09:23:38'),
(1319, 28, 35, 1, '06', '2018', '2018-06-20 09:23:38', '2018-06-20 09:23:38'),
(1320, 28, 35, 1, '06', '2018', '2018-06-20 09:23:38', '2018-06-20 09:23:38'),
(1321, 28, 35, 1, '06', '2018', '2018-06-20 09:23:39', '2018-06-20 09:23:39'),
(1322, 28, 35, 1, '06', '2018', '2018-06-20 09:23:49', '2018-06-20 09:23:49'),
(1323, 28, 35, 1, '06', '2018', '2018-06-20 09:23:52', '2018-06-20 09:23:52'),
(1324, 28, 35, 1, '06', '2018', '2018-06-20 09:23:54', '2018-06-20 09:23:54'),
(1325, 28, 35, 1, '06', '2018', '2018-06-20 09:23:56', '2018-06-20 09:23:56'),
(1326, 28, 35, 1, '06', '2018', '2018-06-20 09:23:57', '2018-06-20 09:23:57'),
(1327, 28, 35, 1, '06', '2018', '2018-06-20 09:23:58', '2018-06-20 09:23:58'),
(1328, 28, 35, 1, '06', '2018', '2018-06-20 09:23:59', '2018-06-20 09:23:59'),
(1329, 28, 35, 1, '06', '2018', '2018-06-20 09:24:00', '2018-06-20 09:24:00'),
(1330, 28, 35, 1, '06', '2018', '2018-06-20 09:24:00', '2018-06-20 09:24:00'),
(1331, 28, 35, 1, '06', '2018', '2018-06-20 09:24:12', '2018-06-20 09:24:12'),
(1332, 28, 35, 1, '06', '2018', '2018-06-20 09:24:15', '2018-06-20 09:24:15'),
(1333, 28, 35, 1, '06', '2018', '2018-06-20 09:24:32', '2018-06-20 09:24:32'),
(1334, 28, 35, 1, '06', '2018', '2018-06-20 09:27:22', '2018-06-20 09:27:22'),
(1335, 28, 35, 1, '06', '2018', '2018-06-20 09:27:25', '2018-06-20 09:27:25'),
(1336, 28, 35, 1, '06', '2018', '2018-06-20 09:30:52', '2018-06-20 09:30:52'),
(1337, 28, 35, 1, '06', '2018', '2018-06-20 09:30:52', '2018-06-20 09:30:52'),
(1338, 28, 35, 1, '06', '2018', '2018-06-20 09:30:53', '2018-06-20 09:30:53'),
(1339, 28, 35, 1, '06', '2018', '2018-06-20 09:32:13', '2018-06-20 09:32:13'),
(1340, 28, 35, 1, '06', '2018', '2018-06-20 09:32:16', '2018-06-20 09:32:16'),
(1341, 28, 35, 1, '06', '2018', '2018-06-20 09:32:18', '2018-06-20 09:32:18'),
(1342, 28, 35, 1, '06', '2018', '2018-06-20 09:40:19', '2018-06-20 09:40:19'),
(1343, 28, 35, 1, '06', '2018', '2018-06-20 09:42:58', '2018-06-20 09:42:58'),
(1344, 28, 32, 1, '06', '2018', '2018-06-20 12:43:37', '2018-06-20 12:43:37'),
(1345, 32, 36, 1, '06', '2018', '2018-06-20 12:43:41', '2018-06-20 12:43:41'),
(1346, 28, 32, 1, '06', '2018', '2018-06-20 12:43:42', '2018-06-20 12:43:42'),
(1347, 32, 36, 1, '06', '2018', '2018-06-20 12:43:44', '2018-06-20 12:43:44'),
(1348, 28, 32, 1, '06', '2018', '2018-06-20 12:50:45', '2018-06-20 12:50:45'),
(1349, 28, 32, 1, '06', '2018', '2018-06-20 12:50:49', '2018-06-20 12:50:49'),
(1350, 28, 29, 1, '06', '2018', '2018-06-20 12:51:22', '2018-06-20 12:51:22'),
(1351, 28, 29, 1, '06', '2018', '2018-06-20 12:51:31', '2018-06-20 12:51:31'),
(1352, 28, 32, 1, '06', '2018', '2018-06-20 12:55:52', '2018-06-20 12:55:52'),
(1353, 28, 32, 1, '06', '2018', '2018-06-20 12:55:52', '2018-06-20 12:55:52'),
(1354, 28, 32, 1, '06', '2018', '2018-06-20 12:55:53', '2018-06-20 12:55:53'),
(1355, 28, 32, 1, '06', '2018', '2018-06-20 12:55:53', '2018-06-20 12:55:53'),
(1356, 28, 32, 1, '06', '2018', '2018-06-20 12:55:53', '2018-06-20 12:55:53'),
(1357, 28, 32, 1, '06', '2018', '2018-06-20 12:55:53', '2018-06-20 12:55:53'),
(1358, 28, 32, 1, '06', '2018', '2018-06-20 12:55:54', '2018-06-20 12:55:54'),
(1359, 28, 32, 1, '06', '2018', '2018-06-20 12:55:54', '2018-06-20 12:55:54'),
(1360, 32, 36, 1, '06', '2018', '2018-06-20 12:58:09', '2018-06-20 12:58:09'),
(1361, 32, 36, 1, '06', '2018', '2018-06-20 12:58:14', '2018-06-20 12:58:14'),
(1362, 32, 36, 1, '06', '2018', '2018-06-20 12:58:20', '2018-06-20 12:58:20'),
(1363, 32, 36, 1, '06', '2018', '2018-06-20 13:10:27', '2018-06-20 13:10:27'),
(1364, 32, 36, 1, '06', '2018', '2018-06-20 13:18:00', '2018-06-20 13:18:00'),
(1365, 32, 36, 1, '06', '2018', '2018-06-20 13:51:11', '2018-06-20 13:51:11'),
(1366, 32, 36, 1, '06', '2018', '2018-06-20 13:55:22', '2018-06-20 13:55:22'),
(1367, 32, 36, 1, '06', '2018', '2018-06-20 13:55:43', '2018-06-20 13:55:43'),
(1368, 32, 36, 1, '06', '2018', '2018-06-20 13:59:41', '2018-06-20 13:59:41'),
(1369, 28, 36, 1, '06', '2018', '2018-06-20 14:08:32', '2018-06-20 14:08:32'),
(1370, 28, 36, 1, '06', '2018', '2018-06-20 14:08:42', '2018-06-20 14:08:42'),
(1371, 28, 36, 1, '06', '2018', '2018-06-20 14:08:46', '2018-06-20 14:08:46'),
(1372, 28, 36, 1, '06', '2018', '2018-06-20 14:10:04', '2018-06-20 14:10:04'),
(1373, 28, 36, 1, '06', '2018', '2018-06-20 14:10:08', '2018-06-20 14:10:08'),
(1374, 28, 32, 1, '06', '2018', '2018-06-20 16:22:38', '2018-06-20 16:22:38'),
(1375, 28, 32, 1, '06', '2018', '2018-06-20 16:22:44', '2018-06-20 16:22:44'),
(1376, 28, 32, 1, '06', '2018', '2018-06-20 16:23:32', '2018-06-20 16:23:32'),
(1377, 28, 32, 1, '06', '2018', '2018-06-20 16:23:32', '2018-06-20 16:23:32'),
(1378, 28, 32, 1, '06', '2018', '2018-06-20 16:23:44', '2018-06-20 16:23:44'),
(1379, 28, 32, 1, '06', '2018', '2018-06-20 16:25:23', '2018-06-20 16:25:23'),
(1380, 28, 32, 1, '06', '2018', '2018-06-20 16:25:50', '2018-06-20 16:25:50'),
(1381, 28, 32, 1, '06', '2018', '2018-06-20 16:25:51', '2018-06-20 16:25:51'),
(1382, 28, 32, 1, '06', '2018', '2018-06-20 16:25:58', '2018-06-20 16:25:58'),
(1383, 28, 32, 1, '06', '2018', '2018-06-20 16:25:59', '2018-06-20 16:25:59'),
(1384, 28, 32, 1, '06', '2018', '2018-06-20 16:26:14', '2018-06-20 16:26:14'),
(1385, 28, 32, 1, '06', '2018', '2018-06-20 16:26:15', '2018-06-20 16:26:15'),
(1386, 28, 32, 1, '06', '2018', '2018-06-20 16:26:15', '2018-06-20 16:26:15'),
(1387, 28, 32, 1, '06', '2018', '2018-06-20 16:26:16', '2018-06-20 16:26:16'),
(1388, 28, 32, 1, '06', '2018', '2018-06-20 16:26:36', '2018-06-20 16:26:36'),
(1389, 28, 32, 1, '06', '2018', '2018-06-20 16:26:37', '2018-06-20 16:26:37'),
(1390, 28, 32, 1, '06', '2018', '2018-06-20 16:26:38', '2018-06-20 16:26:38'),
(1391, 28, 32, 1, '06', '2018', '2018-06-20 16:26:38', '2018-06-20 16:26:38'),
(1392, 28, 32, 1, '06', '2018', '2018-06-20 16:26:44', '2018-06-20 16:26:44'),
(1393, 28, 32, 1, '06', '2018', '2018-06-20 16:26:45', '2018-06-20 16:26:45'),
(1394, 28, 32, 1, '06', '2018', '2018-06-20 16:26:46', '2018-06-20 16:26:46'),
(1395, 37, 30, 1, '06', '2018', '2018-06-22 08:08:36', '2018-06-22 08:08:36'),
(1396, 32, 36, 1, '06', '2018', '2018-06-25 07:32:05', '2018-06-25 07:32:05'),
(1397, 32, 33, 1, '06', '2018', '2018-06-25 07:32:06', '2018-06-25 07:32:06'),
(1398, 32, 29, 1, '06', '2018', '2018-06-25 07:32:08', '2018-06-25 07:32:08'),
(1399, 32, 36, 1, '06', '2018', '2018-06-25 10:40:03', '2018-06-25 10:40:03'),
(1400, 28, 32, 1, '06', '2018', '2018-06-25 11:08:28', '2018-06-25 11:08:28'),
(1401, 28, 32, 1, '06', '2018', '2018-06-25 11:08:34', '2018-06-25 11:08:34'),
(1402, 28, 32, 1, '06', '2018', '2018-06-25 11:09:00', '2018-06-25 11:09:00'),
(1403, 31, 36, 1, '07', '2018', '2018-07-02 15:20:04', '2018-07-02 15:20:04'),
(1404, 32, 36, 1, '07', '2018', '2018-07-05 08:17:46', '2018-07-05 08:17:46'),
(1405, 32, 36, 1, '07', '2018', '2018-07-05 08:17:54', '2018-07-05 08:17:54'),
(1406, 30, 36, 1, '07', '2018', '2018-07-05 11:47:35', '2018-07-05 11:47:35'),
(1407, 30, 36, 1, '07', '2018', '2018-07-05 11:47:37', '2018-07-05 11:47:37'),
(1408, 31, 36, 1, '07', '2018', '2018-07-05 11:49:32', '2018-07-05 11:49:32'),
(1409, 32, 36, 1, '07', '2018', '2018-07-05 12:42:03', '2018-07-05 12:42:03'),
(1410, 31, 36, 1, '07', '2018', '2018-07-05 12:42:29', '2018-07-05 12:42:29'),
(1411, 31, 36, 1, '07', '2018', '2018-07-05 12:44:19', '2018-07-05 12:44:19'),
(1412, 32, 36, 1, '07', '2018', '2018-07-05 12:52:38', '2018-07-05 12:52:38'),
(1413, 31, 32, 1, '07', '2018', '2018-07-06 07:59:16', '2018-07-06 07:59:16'),
(1414, 31, 32, 1, '07', '2018', '2018-07-06 09:57:22', '2018-07-06 09:57:22'),
(1415, 31, 29, 1, '07', '2018', '2018-07-11 07:31:18', '2018-07-11 07:31:18'),
(1416, 28, 28, 1, '07', '2018', '2018-07-11 09:35:03', '2018-07-11 09:35:03'),
(1417, 28, 36, 1, '07', '2018', '2018-07-11 09:35:27', '2018-07-11 09:35:27'),
(1418, 28, 36, 1, '07', '2018', '2018-07-11 09:35:52', '2018-07-11 09:35:52'),
(1419, 28, 28, 1, '07', '2018', '2018-07-11 09:36:01', '2018-07-11 09:36:01'),
(1420, 28, 29, 1, '07', '2018', '2018-07-11 09:37:37', '2018-07-11 09:37:37'),
(1421, 28, 29, 1, '07', '2018', '2018-07-11 09:37:52', '2018-07-11 09:37:52'),
(1422, 28, 29, 1, '07', '2018', '2018-07-11 09:38:22', '2018-07-11 09:38:22'),
(1423, 28, 29, 1, '07', '2018', '2018-07-11 09:38:39', '2018-07-11 09:38:39'),
(1424, 28, 29, 1, '07', '2018', '2018-07-11 09:41:16', '2018-07-11 09:41:16'),
(1425, 28, 29, 1, '07', '2018', '2018-07-11 09:41:31', '2018-07-11 09:41:31'),
(1426, 32, 36, 1, '07', '2018', '2018-07-12 08:01:47', '2018-07-12 08:01:47'),
(1427, 32, 36, 1, '07', '2018', '2018-07-12 08:01:49', '2018-07-12 08:01:49'),
(1428, 32, 31, 1, '07', '2018', '2018-07-12 12:05:16', '2018-07-12 12:05:16'),
(1429, 32, 31, 1, '07', '2018', '2018-07-12 12:05:32', '2018-07-12 12:05:32'),
(1430, 32, 31, 1, '07', '2018', '2018-07-12 12:05:40', '2018-07-12 12:05:40'),
(1431, 28, 29, 1, '07', '2018', '2018-07-14 13:11:24', '2018-07-14 13:11:24'),
(1432, 28, 36, 1, '07', '2018', '2018-07-14 13:18:36', '2018-07-14 13:18:36'),
(1433, 28, 36, 1, '07', '2018', '2018-07-14 13:18:46', '2018-07-14 13:18:46'),
(1434, 28, 32, 1, '07', '2018', '2018-07-14 13:19:45', '2018-07-14 13:19:45'),
(1435, 28, 39, 1, '07', '2018', '2018-07-14 13:22:16', '2018-07-14 13:22:16'),
(1436, 28, 39, 1, '07', '2018', '2018-07-14 13:22:38', '2018-07-14 13:22:38'),
(1437, 32, 37, 1, '07', '2018', '2018-07-16 11:43:05', '2018-07-16 11:43:05'),
(1438, 32, 51, 1, '07', '2018', '2018-07-16 11:43:29', '2018-07-16 11:43:29'),
(1439, 41, 52, 1, '07', '2018', '2018-07-20 15:06:51', '2018-07-20 15:06:51'),
(1440, 41, 52, 1, '07', '2018', '2018-07-20 15:06:54', '2018-07-20 15:06:54'),
(1441, 41, 52, 1, '07', '2018', '2018-07-20 15:06:58', '2018-07-20 15:06:58'),
(1442, 41, 52, 1, '07', '2018', '2018-07-20 15:07:03', '2018-07-20 15:07:03'),
(1443, 41, 52, 1, '07', '2018', '2018-07-20 15:07:09', '2018-07-20 15:07:09'),
(1444, 41, 52, 1, '07', '2018', '2018-07-20 15:07:16', '2018-07-20 15:07:16'),
(1445, 41, 33, 1, '07', '2018', '2018-07-20 15:07:27', '2018-07-20 15:07:27'),
(1446, 41, 33, 1, '07', '2018', '2018-07-20 15:07:33', '2018-07-20 15:07:33'),
(1447, 41, 36, 1, '07', '2018', '2018-07-20 15:43:13', '2018-07-20 15:43:13'),
(1448, 41, 36, 1, '07', '2018', '2018-07-20 15:43:16', '2018-07-20 15:43:16'),
(1449, 41, 36, 1, '07', '2018', '2018-07-20 15:45:25', '2018-07-20 15:45:25'),
(1450, 41, 36, 1, '07', '2018', '2018-07-20 15:45:39', '2018-07-20 15:45:39'),
(1451, 41, 36, 1, '07', '2018', '2018-07-20 15:45:42', '2018-07-20 15:45:42'),
(1452, 41, 36, 1, '07', '2018', '2018-07-20 15:45:45', '2018-07-20 15:45:45'),
(1453, 41, 36, 1, '07', '2018', '2018-07-20 15:45:48', '2018-07-20 15:45:48'),
(1454, 41, 36, 1, '07', '2018', '2018-07-20 15:45:51', '2018-07-20 15:45:51'),
(1455, 41, 36, 1, '07', '2018', '2018-07-20 15:45:54', '2018-07-20 15:45:54'),
(1456, 41, 36, 1, '07', '2018', '2018-07-20 15:46:28', '2018-07-20 15:46:28'),
(1457, 41, 36, 1, '07', '2018', '2018-07-20 15:48:59', '2018-07-20 15:48:59'),
(1458, 41, 36, 1, '07', '2018', '2018-07-20 15:49:18', '2018-07-20 15:49:18'),
(1459, 41, 36, 1, '07', '2018', '2018-07-20 15:49:24', '2018-07-20 15:49:24'),
(1460, 41, 31, 1, '07', '2018', '2018-07-20 15:58:20', '2018-07-20 15:58:20'),
(1461, 41, 31, 1, '07', '2018', '2018-07-20 15:58:26', '2018-07-20 15:58:26'),
(1462, 41, 31, 1, '07', '2018', '2018-07-20 15:58:26', '2018-07-20 15:58:26');
INSERT INTO `profile_views` (`id`, `user_id`, `profile_id`, `views`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1463, 32, 53, 1, '07', '2018', '2018-07-26 15:05:11', '2018-07-26 15:05:11'),
(1464, 53, 32, 1, '07', '2018', '2018-07-26 15:43:34', '2018-07-26 15:43:34'),
(1465, 28, 34, 1, '07', '2018', '2018-07-31 13:32:17', '2018-07-31 13:32:17'),
(1466, 28, 34, 1, '07', '2018', '2018-07-31 13:32:21', '2018-07-31 13:32:21'),
(1467, 28, 32, 1, '07', '2018', '2018-07-31 13:33:04', '2018-07-31 13:33:04'),
(1468, 28, 58, 1, '07', '2018', '2018-07-31 15:43:56', '2018-07-31 15:43:56'),
(1469, 28, 58, 1, '07', '2018', '2018-07-31 15:44:03', '2018-07-31 15:44:03'),
(1470, 32, 31, 1, '07', '2018', '2018-07-31 15:49:06', '2018-07-31 15:49:06'),
(1471, 32, 58, 1, '07', '2018', '2018-07-31 15:49:12', '2018-07-31 15:49:12'),
(1472, 32, 58, 1, '07', '2018', '2018-07-31 15:49:18', '2018-07-31 15:49:18'),
(1473, 32, 58, 1, '07', '2018', '2018-07-31 15:49:20', '2018-07-31 15:49:20'),
(1474, 30, 58, 1, '08', '2018', '2018-08-01 15:29:08', '2018-08-01 15:29:08'),
(1475, 30, 58, 1, '08', '2018', '2018-08-01 15:29:16', '2018-08-01 15:29:16'),
(1476, 30, 58, 1, '08', '2018', '2018-08-01 15:29:26', '2018-08-01 15:29:26'),
(1477, 30, 58, 1, '08', '2018', '2018-08-01 15:29:28', '2018-08-01 15:29:28'),
(1478, 30, 58, 1, '08', '2018', '2018-08-01 15:29:30', '2018-08-01 15:29:30'),
(1479, 30, 36, 1, '08', '2018', '2018-08-01 16:22:30', '2018-08-01 16:22:30'),
(1480, 30, 58, 1, '08', '2018', '2018-08-02 08:53:50', '2018-08-02 08:53:50'),
(1481, 28, 52, 1, '08', '2018', '2018-08-02 08:55:14', '2018-08-02 08:55:14'),
(1482, 28, 52, 1, '08', '2018', '2018-08-02 08:55:18', '2018-08-02 08:55:18'),
(1483, 28, 52, 1, '08', '2018', '2018-08-02 09:01:46', '2018-08-02 09:01:46'),
(1484, 28, 52, 1, '08', '2018', '2018-08-02 09:02:08', '2018-08-02 09:02:08'),
(1485, 28, 52, 1, '08', '2018', '2018-08-02 09:04:16', '2018-08-02 09:04:16'),
(1486, 28, 52, 1, '08', '2018', '2018-08-02 09:05:31', '2018-08-02 09:05:31'),
(1487, 28, 52, 1, '08', '2018', '2018-08-02 09:05:50', '2018-08-02 09:05:50'),
(1488, 28, 52, 1, '08', '2018', '2018-08-02 09:08:52', '2018-08-02 09:08:52'),
(1489, 28, 52, 1, '08', '2018', '2018-08-02 16:35:28', '2018-08-02 16:35:28'),
(1490, 32, 36, 1, '08', '2018', '2018-08-04 08:18:25', '2018-08-04 08:18:25'),
(1491, 32, 36, 1, '08', '2018', '2018-08-04 08:18:28', '2018-08-04 08:18:28'),
(1492, 32, 36, 1, '08', '2018', '2018-08-04 08:18:50', '2018-08-04 08:18:50'),
(1493, 32, 36, 1, '08', '2018', '2018-08-04 08:18:56', '2018-08-04 08:18:56'),
(1494, 32, 36, 1, '08', '2018', '2018-08-04 08:19:05', '2018-08-04 08:19:05'),
(1495, 32, 36, 1, '08', '2018', '2018-08-04 08:19:36', '2018-08-04 08:19:36'),
(1496, 32, 36, 1, '08', '2018', '2018-08-04 08:19:41', '2018-08-04 08:19:41'),
(1497, 32, 36, 1, '08', '2018', '2018-08-04 08:19:45', '2018-08-04 08:19:45'),
(1498, 32, 36, 1, '08', '2018', '2018-08-04 08:20:01', '2018-08-04 08:20:01'),
(1499, 32, 36, 1, '08', '2018', '2018-08-04 08:20:11', '2018-08-04 08:20:11'),
(1500, 32, 36, 1, '08', '2018', '2018-08-04 08:20:22', '2018-08-04 08:20:22'),
(1501, 32, 36, 1, '08', '2018', '2018-08-04 08:20:54', '2018-08-04 08:20:54'),
(1502, 32, 36, 1, '08', '2018', '2018-08-04 08:20:58', '2018-08-04 08:20:58'),
(1503, 32, 36, 1, '08', '2018', '2018-08-04 08:21:16', '2018-08-04 08:21:16'),
(1504, 32, 36, 1, '08', '2018', '2018-08-04 08:21:26', '2018-08-04 08:21:26'),
(1505, 32, 36, 1, '08', '2018', '2018-08-04 08:28:43', '2018-08-04 08:28:43'),
(1506, 32, 36, 1, '08', '2018', '2018-08-04 08:45:04', '2018-08-04 08:45:04'),
(1507, 32, 36, 1, '08', '2018', '2018-08-04 08:47:26', '2018-08-04 08:47:26'),
(1508, 32, 36, 1, '08', '2018', '2018-08-04 08:47:59', '2018-08-04 08:47:59'),
(1509, 32, 36, 1, '08', '2018', '2018-08-04 08:48:33', '2018-08-04 08:48:33'),
(1510, 32, 36, 1, '08', '2018', '2018-08-04 09:06:52', '2018-08-04 09:06:52'),
(1511, 32, 36, 1, '08', '2018', '2018-08-04 09:09:16', '2018-08-04 09:09:16'),
(0, 32, 36, 1, '08', '2018', '2018-08-04 15:48:59', '2018-08-04 15:48:59'),
(0, 32, 36, 1, '08', '2018', '2018-08-04 15:49:07', '2018-08-04 15:49:07'),
(0, 32, 54, 1, '08', '2018', '2018-08-04 15:55:46', '2018-08-04 15:55:46'),
(0, 32, 36, 1, '08', '2018', '2018-08-07 12:21:48', '2018-08-07 12:21:48'),
(0, 32, 36, 1, '08', '2018', '2018-08-07 12:21:51', '2018-08-07 12:21:51'),
(0, 32, 36, 1, '08', '2018', '2018-08-07 12:26:02', '2018-08-07 12:26:02'),
(0, 32, 36, 1, '08', '2018', '2018-08-07 12:26:13', '2018-08-07 12:26:13'),
(0, 31, 32, 1, '08', '2018', '2018-08-07 13:11:57', '2018-08-07 13:11:57'),
(0, 31, 32, 1, '08', '2018', '2018-08-07 13:14:37', '2018-08-07 13:14:37'),
(0, 31, 32, 1, '08', '2018', '2018-08-07 13:17:28', '2018-08-07 13:17:28'),
(0, 31, 32, 1, '08', '2018', '2018-08-07 13:18:03', '2018-08-07 13:18:03'),
(0, 31, 32, 1, '08', '2018', '2018-08-07 13:41:58', '2018-08-07 13:41:58'),
(0, 31, 32, 1, '08', '2018', '2018-08-07 13:42:17', '2018-08-07 13:42:17'),
(0, 31, 32, 1, '08', '2018', '2018-08-07 13:46:43', '2018-08-07 13:46:43'),
(0, 31, 32, 1, '08', '2018', '2018-08-07 13:47:02', '2018-08-07 13:47:02'),
(0, 31, 32, 1, '08', '2018', '2018-08-07 13:47:22', '2018-08-07 13:47:22'),
(0, 31, 32, 1, '08', '2018', '2018-08-07 13:47:36', '2018-08-07 13:47:36'),
(0, 31, 32, 1, '08', '2018', '2018-08-07 13:48:04', '2018-08-07 13:48:04'),
(0, 54, 32, 1, '08', '2018', '2018-08-07 13:48:49', '2018-08-07 13:48:49'),
(0, 54, 32, 1, '08', '2018', '2018-08-07 13:49:30', '2018-08-07 13:49:30'),
(0, 54, 32, 1, '08', '2018', '2018-08-07 13:57:14', '2018-08-07 13:57:14'),
(0, 32, 31, 1, '08', '2018', '2018-08-07 13:57:29', '2018-08-07 13:57:29'),
(0, 32, 54, 1, '08', '2018', '2018-08-07 13:57:51', '2018-08-07 13:57:51'),
(0, 32, 54, 1, '08', '2018', '2018-08-07 14:00:23', '2018-08-07 14:00:23'),
(0, 54, 36, 1, '08', '2018', '2018-08-07 14:05:43', '2018-08-07 14:05:43'),
(0, 54, 41, 1, '08', '2018', '2018-08-07 14:05:54', '2018-08-07 14:05:54'),
(0, 41, 54, 1, '08', '2018', '2018-08-08 10:03:40', '2018-08-08 10:03:40'),
(0, 41, 54, 1, '08', '2018', '2018-08-08 10:11:40', '2018-08-08 10:11:40'),
(0, 54, 34, 1, '08', '2018', '2018-08-08 10:16:26', '2018-08-08 10:16:26'),
(0, 41, 37, 1, '08', '2018', '2018-08-08 10:16:42', '2018-08-08 10:16:42'),
(0, 41, 34, 1, '08', '2018', '2018-08-08 10:16:47', '2018-08-08 10:16:47'),
(0, 41, 54, 1, '08', '2018', '2018-08-08 10:18:40', '2018-08-08 10:18:40'),
(0, 41, 54, 1, '08', '2018', '2018-08-08 10:18:44', '2018-08-08 10:18:44'),
(0, 54, 36, 1, '08', '2018', '2018-08-08 10:20:44', '2018-08-08 10:20:44'),
(0, 41, 36, 1, '08', '2018', '2018-08-08 10:21:03', '2018-08-08 10:21:03'),
(0, 41, 36, 1, '08', '2018', '2018-08-08 10:21:16', '2018-08-08 10:21:16'),
(0, 54, 36, 1, '08', '2018', '2018-08-08 10:21:32', '2018-08-08 10:21:32'),
(0, 54, 36, 1, '08', '2018', '2018-08-08 10:21:41', '2018-08-08 10:21:41'),
(0, 54, 35, 1, '08', '2018', '2018-08-08 10:31:44', '2018-08-08 10:31:44'),
(0, 41, 36, 1, '08', '2018', '2018-08-08 10:33:26', '2018-08-08 10:33:26'),
(0, 32, 34, 1, '08', '2018', '2018-08-10 10:13:44', '2018-08-10 10:13:44'),
(0, 32, 41, 1, '08', '2018', '2018-08-10 10:17:46', '2018-08-10 10:17:46'),
(0, 32, 34, 1, '08', '2018', '2018-08-10 10:42:02', '2018-08-10 10:42:02'),
(0, 32, 35, 1, '08', '2018', '2018-08-11 12:19:41', '2018-08-11 12:19:41'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 10:47:35', '2018-08-14 10:47:35'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 11:45:31', '2018-08-14 11:45:31'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 11:46:13', '2018-08-14 11:46:13'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 12:01:39', '2018-08-14 12:01:39'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 12:05:14', '2018-08-14 12:05:14'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 12:12:56', '2018-08-14 12:12:56'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 12:39:55', '2018-08-14 12:39:55'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 12:49:32', '2018-08-14 12:49:32'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 12:50:49', '2018-08-14 12:50:49'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 12:53:55', '2018-08-14 12:53:55'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 12:54:02', '2018-08-14 12:54:02'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 12:54:29', '2018-08-14 12:54:29'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 12:54:34', '2018-08-14 12:54:34'),
(0, 32, 36, 1, '08', '2018', '2018-08-14 13:49:28', '2018-08-14 13:49:28'),
(0, 31, 37, 1, '08', '2018', '2018-08-16 15:06:38', '2018-08-16 15:06:38'),
(0, 31, 37, 1, '08', '2018', '2018-08-16 15:16:17', '2018-08-16 15:16:17'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:11:12', '2018-08-28 15:11:12'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:11:17', '2018-08-28 15:11:17'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:12:19', '2018-08-28 15:12:19'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:12:35', '2018-08-28 15:12:35'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:13:26', '2018-08-28 15:13:26'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:13:40', '2018-08-28 15:13:40'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:17:10', '2018-08-28 15:17:10'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:17:35', '2018-08-28 15:17:35'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:18:04', '2018-08-28 15:18:04'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:18:54', '2018-08-28 15:18:54'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:19:02', '2018-08-28 15:19:02'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:19:18', '2018-08-28 15:19:18'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:19:33', '2018-08-28 15:19:33'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:23:17', '2018-08-28 15:23:17'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:23:27', '2018-08-28 15:23:27'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:23:55', '2018-08-28 15:23:55'),
(0, 13, 15, 1, '08', '2018', '2018-08-28 15:24:02', '2018-08-28 15:24:02'),
(0, 18, 15, 1, '08', '2018', '2018-08-28 15:24:41', '2018-08-28 15:24:41'),
(0, 18, 15, 1, '08', '2018', '2018-08-28 15:26:48', '2018-08-28 15:26:48'),
(0, 18, 15, 1, '08', '2018', '2018-08-28 15:26:59', '2018-08-28 15:26:59'),
(0, 18, 15, 1, '08', '2018', '2018-08-28 15:28:54', '2018-08-28 15:28:54'),
(0, 18, 15, 1, '08', '2018', '2018-08-28 15:29:17', '2018-08-28 15:29:17'),
(0, 18, 15, 1, '08', '2018', '2018-08-28 15:29:59', '2018-08-28 15:29:59'),
(0, 18, 15, 1, '08', '2018', '2018-08-28 15:30:24', '2018-08-28 15:30:24'),
(0, 18, 15, 1, '08', '2018', '2018-08-28 15:32:09', '2018-08-28 15:32:09'),
(0, 18, 15, 1, '08', '2018', '2018-08-28 16:05:08', '2018-08-28 16:05:08'),
(0, 18, 15, 1, '08', '2018', '2018-08-29 11:01:09', '2018-08-29 11:01:09'),
(0, 13, 15, 1, '08', '2018', '2018-08-29 16:30:24', '2018-08-29 16:30:24'),
(0, 18, 15, 1, '08', '2018', '2018-08-30 06:31:28', '2018-08-30 06:31:28'),
(0, 11, 20, 1, '08', '2018', '2018-08-30 08:11:27', '2018-08-30 08:11:27'),
(0, 11, 20, 1, '08', '2018', '2018-08-30 08:11:31', '2018-08-30 08:11:31'),
(0, 16, 11, 1, '08', '2018', '2018-08-30 08:54:03', '2018-08-30 08:54:03'),
(0, 16, 11, 1, '08', '2018', '2018-08-30 08:54:08', '2018-08-30 08:54:08'),
(0, 16, 11, 1, '08', '2018', '2018-08-30 08:54:30', '2018-08-30 08:54:30'),
(0, 16, 11, 1, '08', '2018', '2018-08-30 08:54:38', '2018-08-30 08:54:38'),
(0, 16, 11, 1, '08', '2018', '2018-08-30 08:55:00', '2018-08-30 08:55:00'),
(0, 16, 11, 1, '08', '2018', '2018-08-30 08:55:06', '2018-08-30 08:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_id` int(10) UNSIGNED NOT NULL,
  `question_id` int(10) UNSIGNED NOT NULL,
  `rating` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `reference_id`, `question_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 67, 7, '2.40', '2018-06-13 08:27:14', NULL),
(2, 68, 7, '1.40', '2018-06-15 06:45:06', NULL),
(3, 69, 7, '5.00', '2018-06-16 09:54:55', NULL),
(4, 70, 7, '1.80', '2018-06-16 09:55:40', NULL),
(5, 71, 7, '0.80', '2018-06-16 11:55:58', NULL),
(6, 72, 7, '4.10', '2018-06-16 12:19:12', NULL),
(7, 73, 7, '3.10', '2018-06-16 12:19:38', NULL),
(8, 74, 7, '0.00', '2018-06-18 10:10:08', NULL),
(9, 75, 29, '3.70', '2018-06-25 11:09:28', NULL),
(10, 75, 16, '4.50', '2018-06-25 11:09:28', NULL),
(11, 75, 14, '3.80', '2018-06-25 11:09:28', NULL),
(12, 75, 24, '4.30', '2018-06-25 11:09:28', NULL),
(13, 75, 1, '4.60', '2018-06-25 11:09:28', NULL),
(14, 75, 13, '3.40', '2018-06-25 11:09:28', NULL),
(15, 75, 15, '4.20', '2018-06-25 11:09:28', NULL),
(16, 75, 25, '3.90', '2018-06-25 11:09:28', NULL),
(17, 75, 28, '4.80', '2018-06-25 11:09:28', NULL),
(18, 75, 23, '4.80', '2018-06-25 11:09:28', NULL),
(19, 75, 19, '4.40', '2018-06-25 11:09:28', NULL),
(20, 75, 17, '5.00', '2018-06-25 11:09:28', NULL),
(21, 76, 29, '2.20', '2018-07-14 07:02:00', NULL),
(22, 76, 16, '1.80', '2018-07-14 07:02:00', NULL),
(23, 76, 14, '3.30', '2018-07-14 07:02:00', NULL),
(24, 76, 24, '3.20', '2018-07-14 07:02:00', NULL),
(25, 76, 1, '4.10', '2018-07-14 07:02:00', NULL),
(26, 76, 13, '2.00', '2018-07-14 07:02:00', NULL),
(27, 76, 15, '3.80', '2018-07-14 07:02:00', NULL),
(28, 76, 25, '2.20', '2018-07-14 07:02:00', NULL),
(29, 76, 28, '1.70', '2018-07-14 07:02:01', NULL),
(30, 76, 23, '0.90', '2018-07-14 07:02:01', NULL),
(31, 76, 19, '2.80', '2018-07-14 07:02:01', NULL),
(32, 76, 17, '0.90', '2018-07-14 07:02:01', NULL),
(33, 77, 29, '2.20', '2018-07-14 07:02:26', NULL),
(34, 77, 16, '1.80', '2018-07-14 07:02:26', NULL),
(35, 77, 14, '3.30', '2018-07-14 07:02:26', NULL),
(36, 77, 24, '3.20', '2018-07-14 07:02:26', NULL),
(37, 77, 1, '4.10', '2018-07-14 07:02:26', NULL),
(38, 77, 13, '2.00', '2018-07-14 07:02:26', NULL),
(39, 77, 15, '3.80', '2018-07-14 07:02:26', NULL),
(40, 77, 25, '2.20', '2018-07-14 07:02:26', NULL),
(41, 77, 28, '1.70', '2018-07-14 07:02:26', NULL),
(42, 77, 23, '0.90', '2018-07-14 07:02:26', NULL),
(43, 77, 19, '2.80', '2018-07-14 07:02:27', NULL),
(44, 77, 17, '0.90', '2018-07-14 07:02:27', NULL),
(45, 78, 29, '2.20', '2018-07-14 07:04:03', NULL),
(46, 78, 16, '1.80', '2018-07-14 07:04:03', NULL),
(47, 78, 14, '3.30', '2018-07-14 07:04:03', NULL),
(48, 78, 24, '3.20', '2018-07-14 07:04:03', NULL),
(49, 78, 1, '4.10', '2018-07-14 07:04:04', NULL),
(50, 78, 13, '2.00', '2018-07-14 07:04:04', NULL),
(51, 78, 15, '3.80', '2018-07-14 07:04:04', NULL),
(52, 78, 25, '2.20', '2018-07-14 07:04:04', NULL),
(53, 78, 28, '1.70', '2018-07-14 07:04:04', NULL),
(54, 78, 23, '0.90', '2018-07-14 07:04:04', NULL),
(55, 78, 19, '2.80', '2018-07-14 07:04:04', NULL),
(56, 78, 17, '0.90', '2018-07-14 07:04:04', NULL),
(57, 79, 29, '0.50', '2018-07-16 11:08:40', NULL),
(58, 79, 16, '0.80', '2018-07-16 11:08:40', NULL),
(59, 79, 14, '0.30', '2018-07-16 11:08:40', NULL),
(60, 79, 24, '1.70', '2018-07-16 11:08:40', NULL),
(61, 79, 1, '0.20', '2018-07-16 11:08:40', NULL),
(62, 79, 13, '0.60', '2018-07-16 11:08:40', NULL),
(63, 79, 15, '0.30', '2018-07-16 11:08:40', NULL),
(64, 79, 25, '0.80', '2018-07-16 11:08:41', NULL),
(65, 79, 28, '0.40', '2018-07-16 11:08:41', NULL),
(66, 79, 23, '0.80', '2018-07-16 11:08:41', NULL),
(67, 79, 19, '0.70', '2018-07-16 11:08:41', NULL),
(68, 79, 17, '0.70', '2018-07-16 11:08:41', NULL),
(69, 80, 7, '2.90', '2018-07-16 11:23:59', NULL),
(70, 81, 29, '2.70', '2018-07-16 12:48:54', NULL),
(71, 81, 16, '1.70', '2018-07-16 12:48:54', NULL),
(72, 81, 14, '2.00', '2018-07-16 12:48:54', NULL),
(73, 81, 24, '2.90', '2018-07-16 12:48:54', NULL),
(74, 81, 1, '2.20', '2018-07-16 12:48:54', NULL),
(75, 81, 13, '3.80', '2018-07-16 12:48:54', NULL),
(76, 81, 15, '3.40', '2018-07-16 12:48:54', NULL),
(77, 81, 25, '3.60', '2018-07-16 12:48:54', NULL),
(78, 81, 28, '3.50', '2018-07-16 12:48:54', NULL),
(79, 81, 23, '3.20', '2018-07-16 12:48:54', NULL),
(80, 81, 19, '1.90', '2018-07-16 12:48:54', NULL),
(81, 81, 17, '2.70', '2018-07-16 12:48:54', NULL),
(82, 82, 7, '2.90', '2018-07-26 14:57:56', NULL),
(83, 83, 7, '2.90', '2018-07-31 12:37:26', NULL),
(84, 84, 7, '2.50', '2018-07-31 12:41:05', NULL),
(85, 85, 6, '4.00', '2018-08-01 15:45:04', NULL),
(86, 86, 7, '2.80', '2018-08-04 08:18:40', NULL),
(87, 87, 29, '1.30', '2018-08-04 08:19:31', NULL),
(88, 87, 16, '2.50', '2018-08-04 08:19:31', NULL),
(89, 87, 14, '1.90', '2018-08-04 08:19:31', NULL),
(90, 87, 24, '2.60', '2018-08-04 08:19:31', NULL),
(91, 87, 1, '2.70', '2018-08-04 08:19:31', NULL),
(92, 87, 13, '2.60', '2018-08-04 08:19:31', NULL),
(93, 87, 15, '3.70', '2018-08-04 08:19:31', NULL),
(94, 87, 25, '1.50', '2018-08-04 08:19:31', NULL),
(95, 87, 28, '3.60', '2018-08-04 08:19:31', NULL),
(96, 87, 23, '2.20', '2018-08-04 08:19:31', NULL),
(97, 87, 19, '3.60', '2018-08-04 08:19:31', NULL),
(98, 87, 17, '2.50', '2018-08-04 08:19:31', NULL),
(99, 88, 7, '2.70', '2018-08-04 08:19:57', NULL),
(100, 89, 29, '4.50', '2018-08-04 08:20:43', NULL),
(101, 89, 16, '1.60', '2018-08-04 08:20:43', NULL),
(102, 89, 14, '2.40', '2018-08-04 08:20:43', NULL),
(103, 89, 24, '1.90', '2018-08-04 08:20:43', NULL),
(104, 89, 1, '1.30', '2018-08-04 08:20:43', NULL),
(105, 89, 13, '1.50', '2018-08-04 08:20:44', NULL),
(106, 89, 15, '1.40', '2018-08-04 08:20:44', NULL),
(107, 89, 25, '2.50', '2018-08-04 08:20:44', NULL),
(108, 89, 28, '2.20', '2018-08-04 08:20:44', NULL),
(109, 89, 23, '2.50', '2018-08-04 08:20:44', NULL),
(110, 89, 19, '2.70', '2018-08-04 08:20:44', NULL),
(111, 89, 17, '2.70', '2018-08-04 08:20:44', NULL),
(112, 90, 30, '3.90', '2018-08-28 15:12:11', NULL),
(113, 90, 31, '2.90', '2018-08-28 15:12:11', NULL),
(114, 90, 32, '4.00', '2018-08-28 15:12:11', NULL),
(115, 90, 33, '3.00', '2018-08-28 15:12:11', NULL),
(116, 90, 34, '4.00', '2018-08-28 15:12:11', NULL),
(117, 90, 35, '3.00', '2018-08-28 15:12:11', NULL),
(118, 90, 36, '3.90', '2018-08-28 15:12:11', NULL),
(119, 90, 37, '3.00', '2018-08-28 15:12:11', NULL),
(120, 90, 38, '3.80', '2018-08-28 15:12:11', NULL),
(121, 91, 29, '2.50', '2018-08-28 15:23:47', NULL),
(122, 91, 16, '1.50', '2018-08-28 15:23:47', NULL),
(123, 91, 14, '2.70', '2018-08-28 15:23:47', NULL),
(124, 91, 24, '2.50', '2018-08-28 15:23:47', NULL),
(125, 91, 1, '3.60', '2018-08-28 15:23:47', NULL),
(126, 91, 13, '2.40', '2018-08-28 15:23:47', NULL),
(127, 91, 15, '4.70', '2018-08-28 15:23:47', NULL),
(128, 91, 25, '2.50', '2018-08-28 15:23:48', NULL),
(129, 91, 28, '3.50', '2018-08-28 15:23:48', NULL),
(130, 91, 23, '3.70', '2018-08-28 15:23:48', NULL),
(131, 91, 19, '2.60', '2018-08-28 15:23:48', NULL),
(132, 91, 17, '3.80', '2018-08-28 15:23:48', NULL),
(133, 92, 7, '2.80', '2018-08-30 08:54:25', NULL),
(134, 93, 7, '2.90', '2018-08-30 08:54:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings_and_reviews`
--

CREATE TABLE `ratings_and_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rating_usertype` int(10) UNSIGNED NOT NULL,
  `rated_to` int(10) UNSIGNED NOT NULL,
  `avg_rating` decimal(10,2) NOT NULL,
  `is_review` int(11) DEFAULT NULL,
  `agree_percent` decimal(10,1) UNSIGNED DEFAULT NULL,
  `status` enum('pending','accepted','disputed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `is_display` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings_and_reviews`
--

INSERT INTO `ratings_and_reviews` (`id`, `user_id`, `rating_usertype`, `rated_to`, `avg_rating`, `is_review`, `agree_percent`, `status`, `is_display`, `created_at`, `updated_at`) VALUES
(67, 28, 7, 32, '2.40', 1, '100.0', 'accepted', '0', '2018-06-13 08:27:14', '2018-06-13 08:27:14'),
(68, 28, 7, 29, '1.40', 1, '40.0', 'accepted', '0', '2018-06-15 06:45:06', '2018-06-15 06:45:06'),
(69, 28, 7, 35, '5.00', 1, '80.0', 'accepted', '0', '2018-06-16 09:54:55', '2018-06-16 09:54:55'),
(70, 28, 7, 35, '1.80', 1, '40.0', 'accepted', '0', '2018-06-16 09:55:40', '2018-06-16 09:55:40'),
(71, 28, 7, 35, '0.80', 1, '100.0', 'accepted', '0', '2018-06-16 11:55:58', '2018-06-16 11:55:58'),
(72, 28, 7, 35, '4.10', 1, '20.0', 'accepted', '0', '2018-06-16 12:19:12', '2018-06-16 12:19:12'),
(73, 28, 7, 35, '3.10', 1, '100.0', 'accepted', '0', '2018-06-16 12:19:38', '2018-06-16 12:19:38'),
(74, 32, 7, 35, '0.00', 0, '2.9', 'accepted', '0', '2018-06-18 10:10:08', '2018-06-18 10:10:08'),
(75, 28, 1, 32, '4.28', 1, '1.5', 'accepted', '0', '2018-06-25 11:09:28', '2018-06-25 11:09:29'),
(76, 28, 1, 45, '2.41', 0, '0.7', 'accepted', '0', '2018-07-14 07:02:00', '2018-07-14 07:02:01'),
(77, 28, 1, 45, '2.41', 0, '0.7', 'accepted', '0', '2018-07-14 07:02:26', '2018-07-14 07:02:27'),
(78, 28, 1, 45, '2.41', 0, '0.7', 'accepted', '0', '2018-07-14 07:04:03', '2018-07-14 07:04:04'),
(79, 28, 1, 50, '0.65', 1, '0.0', 'accepted', '0', '2018-07-16 11:08:40', '2018-07-16 11:08:41'),
(80, 32, 7, 51, '2.90', 1, '2.5', 'pending', '0', '2018-07-16 11:23:59', '2018-07-16 11:23:59'),
(81, 28, 1, 52, '2.80', 1, '1.5', 'accepted', '0', '2018-07-16 12:48:54', '2018-07-16 12:48:54'),
(82, 32, 7, 53, '2.90', 1, '3.6', 'accepted', '0', '2018-07-26 14:57:56', '2018-07-26 14:57:56'),
(83, 55, 7, 57, '2.90', 1, '1.6', 'accepted', '0', '2018-07-31 12:37:26', '2018-07-31 12:37:26'),
(84, 32, 7, 58, '2.50', 0, '1.6', 'accepted', '0', '2018-07-31 12:41:05', '2018-07-31 12:41:05'),
(85, 32, 6, 60, '4.00', 1, '3.7', 'accepted', '0', '2018-08-01 15:45:04', '2018-08-01 15:45:04'),
(86, 32, 7, 36, '2.80', 1, '2.6', 'accepted', '0', '2018-08-04 08:18:39', '2018-08-04 08:18:40'),
(87, 32, 1, 16, '2.56', 0, '3.6', 'accepted', '0', '2018-08-04 08:19:31', '2018-08-04 08:19:31'),
(88, 32, 7, 20, '2.70', 1, '3.6', 'accepted', '0', '2018-08-04 08:19:57', '2018-08-04 08:19:57'),
(89, 32, 1, 21, '2.08', 0, '5.0', 'accepted', '0', '2018-08-04 08:20:43', '2018-08-04 08:20:44'),
(90, 13, 9, 15, '3.50', 1, '2.7', 'accepted', '0', '2018-08-28 15:12:11', '2018-08-28 15:12:11'),
(91, 13, 1, 15, '3.00', 1, '3.7', 'accepted', '0', '2018-08-28 15:23:47', '2018-08-28 15:23:48'),
(92, 16, 7, 11, '2.80', 1, '3.7', 'accepted', '0', '2018-08-30 08:54:25', '2018-08-30 08:54:25'),
(93, 16, 7, 11, '2.90', 1, '5.0', 'accepted', '0', '2018-08-30 08:54:55', '2018-08-30 08:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `rating_credit_log`
--

CREATE TABLE `rating_credit_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `credit_amount` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating_invite`
--

CREATE TABLE `rating_invite` (
  `id` int(10) UNSIGNED NOT NULL,
  `invited_by` int(10) UNSIGNED NOT NULL,
  `invited_to` int(10) UNSIGNED DEFAULT NULL,
  `invited_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invited_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_invite`
--

INSERT INTO `rating_invite` (`id`, `invited_by`, `invited_to`, `invited_email`, `invited_number`, `created_at`, `updated_at`) VALUES
(1, 32, NULL, NULL, '917275583135', '2018-07-02 15:26:27', NULL),
(2, 32, 31, NULL, NULL, '2018-07-04 12:56:10', NULL),
(3, 32, 31, NULL, NULL, '2018-07-04 12:57:25', NULL),
(4, 28, 28, NULL, NULL, '2018-07-30 13:20:11', NULL),
(5, 28, 28, NULL, NULL, '2018-07-30 13:20:37', NULL),
(6, 54, 31, NULL, NULL, '2018-07-31 12:33:44', NULL),
(7, 54, 31, NULL, NULL, '2018-07-31 12:34:14', NULL),
(8, 54, 56, NULL, NULL, '2018-07-31 12:35:00', NULL),
(9, 28, 28, NULL, NULL, '2018-08-01 12:21:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating_questions`
--

CREATE TABLE `rating_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating_usertype_id` int(10) UNSIGNED DEFAULT NULL,
  `applicable` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_questions`
--

INSERT INTO `rating_questions` (`id`, `question`, `parameter`, `rating_usertype_id`, `applicable`, `created_at`, `updated_at`) VALUES
(1, 'What your view for company ?', 'Experience', 1, '0', '2018-03-30 03:49:42', NULL),
(4, 'What your view for indivisual ?', 'Behaviour', 8, '0', '2018-03-30 03:53:49', NULL),
(5, 'What your view  ?', 'Communication', 5, '0', '2018-03-30 03:53:58', NULL),
(6, 'What your view for company ?', 'Skills', 6, '0', '2018-03-29 19:45:49', NULL),
(7, 'What your view for company ?', 'sadness', 7, '0', '2018-04-11 07:05:43', NULL),
(8, 'What your view for indivisual ?', 'Comm', 2, '0', '2018-04-11 07:05:56', NULL),
(9, 'What your view for company ?', 'Skill Test', 3, '0', '2018-04-11 07:06:08', NULL),
(10, 'What your view for company ?', 'Happiness', 4, '0', '2018-04-11 07:06:17', NULL),
(11, 'What your view for individual ?', 'Joy', 8, '0', '2018-04-17 07:07:49', NULL),
(12, 'What your view for individual ?', 'New experience', 8, '0', '2018-04-17 07:08:31', NULL),
(13, 'Quality of Food?', 'motion', 1, '0', '2018-04-17 07:10:58', NULL),
(14, 'Choice of Product?', 'behave', 1, '0', '2018-04-17 07:11:09', NULL),
(15, 'Services Delivered?', 'Nurturing', 1, '0', '2018-04-17 07:11:49', NULL),
(16, 'What your view for company ?', 'anger', 1, '0', '2018-04-17 23:12:38', NULL),
(17, 'Services Delivered?', 'Strategic', 1, '0', '2018-04-17 23:13:00', NULL),
(18, 'What your view for indivisual ?', 'zxcvbgf', 8, '0', '2018-04-17 23:13:11', NULL),
(19, 'Services Delivered?', 'signify', 1, '0', '2018-04-17 23:13:23', NULL),
(20, 'What your view for indivisual ?', '\r\n\r\nEmotionally Intelligent\r\n', 2, '0', '2018-04-17 23:13:35', NULL),
(21, 'What your view for indivisual ?', 'Communicator', 8, '0', '2018-04-17 23:13:44', NULL),
(22, 'As a Boss', 'experience', 1, '0', '2018-04-18 05:01:26', NULL),
(23, 'What your view for company ?', 'rewq', 1, '1', '2018-05-04 00:45:12', NULL),
(24, '{NAME} What your view for company ?', 'disturbance', 1, '1', '2018-05-04 01:33:34', NULL),
(25, 'What your view for company ?', 'qwert', 1, '0', '2018-05-14 02:40:56', NULL),
(26, 'What your view for individual ?', 'asdf', 8, '0', '2018-05-14 02:41:09', NULL),
(27, 'What your view  ?', 'Latest', 5, '0', '2018-05-14 02:41:21', NULL),
(28, 'What your view for company ?', 'Respectful', 1, '0', '2018-05-14 02:41:33', NULL),
(29, 'What your view for individual ?', 'Agile', 1, '0', '2018-05-15 04:07:41', NULL),
(30, 'you can decide how to work to achieve agreed outcomes ', 'Autonomy', 9, '', NULL, NULL),
(31, 'your role allows you to be stretched and develop other skillsets', 'Challenge', 9, '', NULL, NULL),
(32, 'diverse individuals/ teams are able to work constructively to achieve more than the sum of all parts ', 'Collaboration', 9, '', NULL, NULL),
(33, '{NAME} cares for more than the bottom line and takes action to impact society positively ', 'Corporate Social Responsibility', 9, '', NULL, NULL),
(34, '{NAME} supports your life long learning and personal growth', 'Development', 9, '', NULL, NULL),
(35, 'you know what is expected of you and how you fit into {NAME}\'s bigger scheme of things', 'Engagement', 9, '', NULL, NULL),
(36, 'the corporate\'s work is meaningful and reasonates with you', 'Purpose', 9, '', NULL, NULL),
(37, 'You know what to expect as leaders within {NAME} are fair, consistent and keep to their words', 'Trust', 9, '', NULL, NULL),
(38, 'work life integration allows you flexibility to choose when or where to work, so that personal and professional goals can be achieved', 'Well Being', 9, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating_threshold`
--

CREATE TABLE `rating_threshold` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_threshold`
--

INSERT INTO `rating_threshold` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'boss_rating', '2', '2018-07-19 18:30:00', NULL),
(2, 'peer_rating', '1', '2018-07-19 18:30:00', NULL),
(3, 'subordinate_rating', '1', '2018-07-19 18:30:00', NULL),
(4, 'customer_rating', '2', '2018-07-19 18:30:00', NULL),
(5, 'bronze_credibility', '3', '2018-07-19 13:00:00', NULL),
(6, 'silver_credibility', '5', '2018-07-19 13:00:00', NULL),
(7, 'gold_credibility', '7', '2018-07-19 13:00:00', NULL),
(8, 'staff_rating', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rating_usertype`
--

CREATE TABLE `rating_usertype` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('individual','company') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'individual',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_usertype`
--

INSERT INTO `rating_usertype` (`id`, `type`, `category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'As a Boss - Direct', 'individual', 'active', NULL, NULL),
(2, 'As a Boss - Indirect', 'individual', 'active', NULL, NULL),
(3, 'As a Peer - Direct', 'individual', 'active', NULL, NULL),
(4, 'As a Peer - Indirect', 'individual', 'active', NULL, NULL),
(5, 'As a Subordinate - Direct', 'individual', 'active', NULL, NULL),
(6, 'As a Subordinate - Indirect', 'individual', 'active', NULL, NULL),
(7, 'As a Customer', 'individual', 'active', NULL, NULL),
(8, 'Self', 'company', 'active', NULL, NULL),
(9, 'As a Corporate Staff', 'individual', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_id` int(10) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `reference_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 67, 'xc', '2018-06-13 08:27:14', NULL),
(2, 68, 'Kriti Jaiswal will know you have given a 360! As your boss, she will only know average ratings after 3 bosses have rated her.', '2018-06-15 06:45:06', NULL),
(3, 69, 'test', '2018-06-16 09:54:55', NULL),
(4, 70, 'cfgvhbjn', '2018-06-16 09:55:40', NULL),
(5, 71, 'dcfvb', '2018-06-16 11:55:58', NULL),
(6, 72, 'aasdf', '2018-06-16 12:19:12', NULL),
(7, 73, 'dfgnh', '2018-06-16 12:19:38', NULL),
(8, 75, 'sdfghjkl', '2018-06-25 11:09:28', NULL),
(9, 79, 'A Test will know you have given a 360! As your boss, she will only know average ratings after 3 bosses have rated her.', '2018-07-16 11:08:40', NULL),
(10, 80, 'This review is for Newly Registered User.', '2018-07-16 11:23:59', NULL),
(11, 81, 'This is for  test only', '2018-07-16 12:48:54', NULL),
(12, 82, 'Twinkle Godhwani will know you have given a 360! and your review will be attributed to you.', '2018-07-26 14:57:56', NULL),
(13, 83, 'Ayushman Bhatia will know you have given a 360! As your boss, she will only know average ratings after 3 bosses have rated her.', '2018-07-31 12:37:26', NULL),
(14, 85, ';ukl;;;;;;;;;', '2018-08-01 15:45:04', NULL),
(15, 86, 'Anjali Srivastava will know you have given a 360! As your boss, she will only know average ratings after 3 bosses have rated her.', '2018-08-04 08:18:39', NULL),
(16, 88, 'Anjali Srivastava will know you have given a 360! As your boss, she will only know average ratings after 3 bosses have rated her.', '2018-08-04 08:19:57', NULL),
(0, 90, 'Saurabh Shukla will know you have given a 360! and your review will be attributed to you.', '2018-08-28 15:12:11', NULL),
(0, 91, 'Saurabh Shukla will know you have given a 360! As your boss, she/he will only know average ratings after 2 boss(s) have rated her/him.', '2018-08-28 15:23:47', NULL),
(0, 92, 'Raveena Nigam will know you have given a 360! As your customer, she/he will only know average ratings after 2 customer(s) have rated her/him.', '2018-08-30 08:54:25', NULL),
(0, 93, 'Raveena Nigam will know you have given a 360! As your customer, she/he will only know average ratings after 2 customer(s) have rated her/him.', '2018-08-30 08:54:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews_on_hold`
--

CREATE TABLE `reviews_on_hold` (
  `id` int(10) UNSIGNED NOT NULL,
  `reference_id` int(10) UNSIGNED NOT NULL,
  `status` enum('pending','accepted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews_on_hold`
--

INSERT INTO `reviews_on_hold` (`id`, `reference_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 80, 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `title`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', '2018-03-13 00:45:00', NULL),
(2, 'individual', 'Individual', '2018-03-12 22:45:00', NULL),
(3, 'company', 'Company', '2018-03-13 04:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `search_log`
--

CREATE TABLE `search_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `search_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `search_log`
--

INSERT INTO `search_log` (`id`, `user_id`, `search_keyword`, `created_at`, `updated_at`) VALUES
(1, 32, 'anj', '2018-06-15 07:36:16', '2018-06-15 07:36:16'),
(2, 28, 'anjali', '2018-06-15 14:22:38', '2018-06-15 14:22:38'),
(3, 28, 'sushan', '2018-06-16 09:54:31', '2018-06-16 09:54:31'),
(4, 30, 'pre', '2018-06-18 06:26:36', '2018-06-18 06:26:36'),
(5, 30, 'pre', '2018-06-18 06:26:38', '2018-06-18 06:26:38'),
(6, 30, 'pre', '2018-06-18 06:26:53', '2018-06-18 06:26:53'),
(7, 28, 'sus', '2018-06-18 06:28:02', '2018-06-18 06:28:02'),
(8, 28, 'raveena', '2018-06-18 07:38:45', '2018-06-18 07:38:45'),
(9, 28, 'preeti', '2018-06-18 10:03:27', '2018-06-18 10:03:27'),
(10, 28, 'preeti', '2018-06-18 10:03:33', '2018-06-18 10:03:33'),
(11, 28, 'sushant', '2018-06-18 10:08:14', '2018-06-18 10:08:14'),
(12, 28, 'preet', '2018-06-18 10:10:03', '2018-06-18 10:10:03'),
(13, 28, 'sus', '2018-06-18 12:13:56', '2018-06-18 12:13:56'),
(14, 28, 'kri', '2018-06-18 14:46:59', '2018-06-18 14:46:59'),
(15, 30, 'kri', '2018-06-18 16:16:15', '2018-06-18 16:16:15'),
(16, 28, 'sus', '2018-06-18 16:17:12', '2018-06-18 16:17:12'),
(17, 30, 'raveena', '2018-06-19 12:23:18', '2018-06-19 12:23:18'),
(18, 30, 'raveena', '2018-06-19 12:31:07', '2018-06-19 12:31:07'),
(19, 28, 'raveena', '2018-06-19 12:31:38', '2018-06-19 12:31:38'),
(20, 28, 'raveena', '2018-06-19 12:52:08', '2018-06-19 12:52:08'),
(21, 30, 'raveena', '2018-06-19 12:57:52', '2018-06-19 12:57:52'),
(22, 28, 'raveena', '2018-06-19 13:05:40', '2018-06-19 13:05:40'),
(23, 28, 'sus', '2018-06-19 14:58:44', '2018-06-19 14:58:44'),
(24, 28, 'Raveena', '2018-06-19 15:17:55', '2018-06-19 15:17:55'),
(25, 28, 'raveena', '2018-06-20 06:31:54', '2018-06-20 06:31:54'),
(26, 28, 'sus', '2018-06-20 08:53:30', '2018-06-20 08:53:30'),
(27, 28, 'Sus', '2018-06-20 09:14:04', '2018-06-20 09:14:04'),
(28, 28, 'Sus', '2018-06-20 09:24:11', '2018-06-20 09:24:11'),
(29, 28, 'Sus', '2018-06-20 09:27:21', '2018-06-20 09:27:21'),
(30, 28, 'sus', '2018-06-20 09:43:02', '2018-06-20 09:43:02'),
(31, 28, 'kri', '2018-06-20 09:58:35', '2018-06-20 09:58:35'),
(32, 28, 'raveena', '2018-06-20 12:43:25', '2018-06-20 12:43:25'),
(33, 28, 'raveena', '2018-06-20 12:43:31', '2018-06-20 12:43:31'),
(34, 28, 'raveena', '2018-06-20 12:50:43', '2018-06-20 12:50:43'),
(35, 28, 'raveena', '2018-06-20 12:50:44', '2018-06-20 12:50:44'),
(36, 28, 'kri', '2018-06-20 12:51:20', '2018-06-20 12:51:20'),
(37, 28, 'raveena', '2018-06-20 16:22:36', '2018-06-20 16:22:36'),
(38, 37, 'XYZ', '2018-06-22 08:08:32', '2018-06-22 08:08:32'),
(39, 37, 'XYZ', '2018-07-30 08:08:32', '2018-06-22 08:08:32'),
(40, 37, 'XYZ', '2018-07-27 08:08:32', '2018-06-22 08:08:32'),
(41, 37, 'XYZ', '2018-07-31 08:08:32', '2018-06-22 08:08:32'),
(42, 32, 'Micro Corporation Of Isndia', '2018-07-12 10:55:06', '2018-07-12 10:55:06'),
(43, 35, 'Singsys', '2018-07-31 10:55:06', '2018-07-31 10:55:06'),
(44, 35, 'Singsys', '2018-07-30 10:55:06', '2018-07-31 10:55:06'),
(45, 35, 'India', '2018-07-30 10:55:06', '2018-07-31 10:55:06'),
(46, 30, 'Xyz', '2018-08-02 10:02:50', '2018-08-02 10:02:50'),
(47, 30, 'A', '2018-08-02 10:03:02', '2018-08-02 10:03:02'),
(48, 30, 'A', '2018-08-02 10:03:16', '2018-08-02 10:03:16'),
(49, 30, 'A', '2018-08-02 10:05:30', '2018-08-02 10:05:30'),
(50, 32, 'A', '2018-08-02 10:06:28', '2018-08-02 10:06:28'),
(51, 32, 'A', '2018-08-02 10:06:32', '2018-08-02 10:06:32'),
(52, 30, 'raveena', '2018-08-02 15:36:20', '2018-08-02 15:36:20'),
(53, 30, 'raveena', '2018-08-02 15:36:37', '2018-08-02 15:36:37'),
(54, 30, 'raveena', '2018-08-02 15:37:21', '2018-08-02 15:37:21'),
(55, 30, 'raveena', '2018-08-02 15:37:28', '2018-08-02 15:37:28'),
(56, 30, 'raveena', '2018-08-02 15:38:38', '2018-08-02 15:38:38'),
(57, 30, 'Raveena', '2018-08-02 15:39:28', '2018-08-02 15:39:28'),
(58, 30, 'Raveena', '2018-08-02 15:39:47', '2018-08-02 15:39:47'),
(59, 30, 'Raveena', '2018-08-02 15:39:52', '2018-08-02 15:39:52'),
(60, 30, 'raveena', '2018-08-02 15:40:15', '2018-08-02 15:40:15'),
(61, 30, 'raveena', '2018-08-02 15:42:25', '2018-08-02 15:42:25'),
(62, 30, 'Raveena', '2018-08-02 15:42:32', '2018-08-02 15:42:32'),
(63, 30, 'Raveena', '2018-08-02 15:48:42', '2018-08-02 15:48:42'),
(64, 30, 'Raveena', '2018-08-02 15:49:06', '2018-08-02 15:49:06'),
(65, 28, 'Raveena', '2018-08-02 16:08:22', '2018-08-02 16:08:22'),
(66, 28, 'Raveena', '2018-08-02 16:11:03', '2018-08-02 16:11:03'),
(67, 28, 'Raveena', '2018-08-02 16:17:17', '2018-08-02 16:17:17'),
(68, 28, 'A', '2018-08-02 16:18:23', '2018-08-02 16:18:23'),
(69, 28, 'A', '2018-08-02 16:18:36', '2018-08-02 16:18:36'),
(70, 28, 'A', '2018-08-02 16:19:05', '2018-08-02 16:19:05'),
(71, 28, 'A', '2018-08-02 16:22:21', '2018-08-02 16:22:21'),
(72, 28, 'A', '2018-08-02 16:34:16', '2018-08-02 16:34:16'),
(73, 28, 'A', '2018-08-02 16:36:47', '2018-08-02 16:36:47'),
(74, 28, 'A', '2018-08-02 16:44:36', '2018-08-02 16:44:36'),
(75, 28, 'A', '2018-08-02 16:44:42', '2018-08-02 16:44:42'),
(76, 28, 'A', '2018-08-02 16:47:28', '2018-08-02 16:47:28'),
(77, 28, 'A', '2018-08-02 16:48:27', '2018-08-02 16:48:27'),
(78, 30, 'a', '2018-08-03 08:45:27', '2018-08-03 08:45:27'),
(79, 30, 'a', '2018-08-03 08:45:54', '2018-08-03 08:45:54'),
(80, 30, 'a', '2018-08-03 09:48:24', '2018-08-03 09:48:24'),
(81, 30, 'a', '2018-08-03 09:48:49', '2018-08-03 09:48:49'),
(82, 30, 'a', '2018-08-03 09:49:09', '2018-08-03 09:49:09'),
(83, 30, 'a', '2018-08-03 09:49:24', '2018-08-03 09:49:24'),
(84, 30, 'a', '2018-08-03 09:49:27', '2018-08-03 09:49:27'),
(85, 30, 'a', '2018-08-03 09:50:04', '2018-08-03 09:50:04'),
(86, 30, 'a', '2018-08-03 09:50:07', '2018-08-03 09:50:07'),
(87, 30, 'a', '2018-08-03 09:51:17', '2018-08-03 09:51:17'),
(88, 30, 'a', '2018-08-03 09:51:19', '2018-08-03 09:51:19'),
(89, 30, 'a', '2018-08-03 09:51:24', '2018-08-03 09:51:24'),
(90, 30, 'a', '2018-08-03 09:51:30', '2018-08-03 09:51:30'),
(91, 30, 'a', '2018-08-03 09:51:31', '2018-08-03 09:51:31'),
(92, 30, 'a', '2018-08-03 09:51:33', '2018-08-03 09:51:33'),
(93, 30, 'a', '2018-08-03 09:52:29', '2018-08-03 09:52:29'),
(94, 30, 'a', '2018-08-03 09:54:05', '2018-08-03 09:54:05'),
(95, 30, 'a', '2018-08-03 09:54:17', '2018-08-03 09:54:17'),
(96, 30, 'a', '2018-08-03 09:58:50', '2018-08-03 09:58:50'),
(97, 30, 'a', '2018-08-03 09:58:57', '2018-08-03 09:58:57'),
(98, 30, 'a', '2018-08-03 09:59:05', '2018-08-03 09:59:05'),
(99, 30, 'a', '2018-08-03 09:59:08', '2018-08-03 09:59:08'),
(100, 30, 'a', '2018-08-03 09:59:31', '2018-08-03 09:59:31'),
(101, 30, 'a', '2018-08-03 10:02:54', '2018-08-03 10:02:54'),
(102, 30, 'a', '2018-08-03 10:05:25', '2018-08-03 10:05:25'),
(103, 30, 'a', '2018-08-03 10:08:22', '2018-08-03 10:08:22'),
(104, 30, 'a', '2018-08-03 10:26:17', '2018-08-03 10:26:17'),
(105, 30, 'a', '2018-08-03 11:19:54', '2018-08-03 11:19:54'),
(106, 30, 'a', '2018-08-03 11:46:28', '2018-08-03 11:46:28'),
(0, 0, 'raveena', '2018-08-06 09:27:07', '2018-08-06 09:27:07'),
(0, 0, 'raveena', '2018-08-06 09:28:11', '2018-08-06 09:28:11'),
(0, 0, 'raveena', '2018-08-06 09:30:04', '2018-08-06 09:30:04'),
(0, 0, 'raveena', '2018-08-06 09:30:07', '2018-08-06 09:30:07'),
(0, 0, 'raveena', '2018-08-06 09:30:53', '2018-08-06 09:30:53'),
(0, 0, 'raveena', '2018-08-06 09:33:21', '2018-08-06 09:33:21'),
(0, 0, 'raveena', '2018-08-06 09:33:25', '2018-08-06 09:33:25'),
(0, 0, 'raveena', '2018-08-06 09:33:31', '2018-08-06 09:33:31'),
(0, 0, 'raveena', '2018-08-06 09:38:36', '2018-08-06 09:38:36'),
(0, 0, 'raveena', '2018-08-06 09:38:40', '2018-08-06 09:38:40'),
(0, 0, 'raveena', '2018-08-06 09:38:52', '2018-08-06 09:38:52'),
(0, 0, 'raveena', '2018-08-06 09:39:19', '2018-08-06 09:39:19'),
(0, 0, 'raveena', '2018-08-06 09:39:22', '2018-08-06 09:39:22'),
(0, 0, 'Twinkle Godhwani', '2018-08-06 09:39:40', '2018-08-06 09:39:40'),
(0, 0, 'Twinkle Godhwani', '2018-08-06 09:39:41', '2018-08-06 09:39:41'),
(0, 32, 'aaa', '2018-08-06 09:40:40', '2018-08-06 09:40:40'),
(0, 32, 'aa', '2018-08-06 09:48:32', '2018-08-06 09:48:32'),
(0, 32, 'Twinkle Godhwani', '2018-08-06 09:48:40', '2018-08-06 09:48:40'),
(0, 32, 'Twinkle Godhwani', '2018-08-06 09:48:40', '2018-08-06 09:48:40'),
(0, 41, 'Singapore', '2018-08-08 10:03:32', '2018-08-08 10:03:32'),
(0, 31, 'Agile', '2018-08-09 10:33:12', '2018-08-09 10:33:12'),
(0, 31, 'Agile', '2018-08-09 10:36:19', '2018-08-09 10:36:19'),
(0, 31, 'Agile', '2018-08-09 10:36:19', '2018-08-09 10:36:19'),
(0, 31, 'Communication', '2018-08-09 10:36:30', '2018-08-09 10:36:30'),
(0, 31, 'Communication', '2018-08-09 10:36:30', '2018-08-09 10:36:30'),
(0, 31, 'Singapore', '2018-08-09 10:37:26', '2018-08-09 10:37:26'),
(0, 31, 'Singapore', '2018-08-09 10:37:27', '2018-08-09 10:37:27'),
(0, 31, 'Senior Developer', '2018-08-09 10:44:17', '2018-08-09 10:44:17'),
(0, 31, 'Genpact Technology', '2018-08-09 10:44:28', '2018-08-09 10:44:28'),
(0, 32, 'Raveena Nigam', '2018-08-09 15:45:11', '2018-08-09 15:45:11'),
(0, 34, 'Agile', '2018-08-10 11:46:45', '2018-08-10 11:46:45'),
(0, 32, 'Agile', '2018-08-10 16:17:28', '2018-08-10 16:17:28'),
(0, 32, 'Agile', '2018-08-11 06:56:18', '2018-08-11 06:56:18'),
(0, 32, 'HTML', '2018-08-11 06:56:55', '2018-08-11 06:56:55'),
(0, 32, 'HTML', '2018-08-11 06:56:57', '2018-08-11 06:56:57'),
(0, 32, 'HTML', '2018-08-11 12:19:03', '2018-08-11 12:19:03'),
(0, 32, 'Micro Corporation Of India', '2018-08-14 13:49:24', '2018-08-14 13:49:24'),
(0, 13, 'Saurabh Shukla', '2018-08-29 16:02:56', '2018-08-29 16:02:56'),
(0, 16, 'Raveena Nigam', '2018-08-30 08:53:57', '2018-08-30 08:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `services_offered`
--

CREATE TABLE `services_offered` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services_offered`
--

INSERT INTO `services_offered` (`id`, `user_id`, `service`, `created_at`, `updated_at`) VALUES
(10, 31, 'Web Technology', NULL, NULL),
(11, 30, 'self', NULL, NULL),
(12, 33, 'Information Technology', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(0, 'credit_for_paid_corporate', '20', NULL, NULL),
(1, 'admin_email', 'admin@360reference.sg', '2018-03-04 16:57:00', NULL),
(2, 'facebook_url', 'https://www.facebook.com', '2018-03-04 14:53:00', NULL),
(3, 'twitter_url', 'https://www.twitter.com', '2018-03-04 18:51:00', NULL),
(4, 'linkedin_url', 'https://www.linkedin.com', '2018-03-04 21:01:00', NULL),
(5, 'google_url', 'https://plus.google.com', '2018-03-04 14:30:00', NULL),
(6, 'smtp_server_host', 'email-smtp.us-east-1.amazonaws.com', NULL, NULL),
(7, 'smtp_port_number', '587', NULL, NULL),
(8, 'smtp_uName', 'AKIAJ26PZKEY5IPHHL2A', NULL, NULL),
(9, 'smtp_uPass', 'Av+TRaWirqK83rqJwc7kEf8HNBWrDHTlPUk03qbwvojC', NULL, NULL),
(10, 'copyright', '© 2018, Reference 360 All rights reserved.', NULL, NULL),
(11, 'site_title', '360 Reference', NULL, NULL),
(12, 'maintenance', '0', NULL, NULL),
(13, 'maintenance_desc', 'Maintenance Mode is ON', NULL, NULL),
(14, 'address', 'A-34, Second Lane, East Singapore', NULL, NULL),
(15, 'contact', '+91-1234567890', NULL, NULL),
(16, 'contact-email', 'info@reference360.com', NULL, NULL),
(17, 'job_post', '5', NULL, NULL),
(18, 'job_candidate_credit', '5', NULL, NULL),
(19, 'credit_per_unit', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shortlisted_profiles`
--

CREATE TABLE `shortlisted_profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `corporate_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shortlisted_profiles`
--

INSERT INTO `shortlisted_profiles` (`id`, `corporate_id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 30, 12, 39, '2018-06-09 08:31:14', NULL),
(9, 31, 27, 32, '2018-06-11 16:10:35', NULL),
(10, 31, 27, 36, '2018-06-11 16:29:35', NULL),
(12, 30, 11, 32, '2018-06-12 09:56:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_priority`
--

CREATE TABLE `staff_priority` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_priority`
--

INSERT INTO `staff_priority` (`id`, `company_id`, `user_id`, `priority`, `created_at`, `updated_at`) VALUES
(7, 30, 36, '1', '2018-06-18 15:33:34', NULL),
(14, 30, 35, '4', '2018-06-18 16:13:08', NULL),
(15, 30, 32, '3', '2018-06-18 16:14:24', NULL),
(16, 30, 28, '4', '2018-06-18 16:14:50', NULL),
(17, 30, 37, '5', '2018-06-25 11:10:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `static_contents`
--

CREATE TABLE `static_contents` (
  `static_content_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `static_contents`
--

INSERT INTO `static_contents` (`static_content_id`, `title`, `description`, `alias`, `added_date`) VALUES
(1, 'Disclaimer', '<p><strong>Revised: March 3, 2018&nbsp;</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p><strong>Iusmod tempor incididunt ut</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p><strong>Ncididunt Iusmod tempor incididunt ut</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p><strong>Smod tempor incididunt ut incididunt ut</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>', 'disclaimer', '2018-03-28 03:29:29'),
(2, 'Terms & Conditions', '<p><strong>1. Eligibility to Use</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2. Your Reference 360 Account&nbsp;</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p><strong>3. Using Reference 360</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p><strong>4. Special Provisions Applicable To Employers</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p><strong>5. Special Provisions Applicable to Advertisers</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>', 'terms', '2018-03-22 01:25:13'),
(3, 'Privacy Policy', '<p><strong>Revised: March 3, 2018&nbsp;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Information We Collect and How We Use It</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Information We Collect by Automated Means</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Do Not Track Signals</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>How We Share Information</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Other Important Privacy Information</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>', 'privacy', '2018-03-22 01:26:53'),
(4, 'Reach out to us.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>', 'contact', '2018-03-15 01:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `strength`
--

CREATE TABLE `strength` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `strength`
--

INSERT INTO `strength` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Achiever', 'People exceptionally talented in the Achiever theme work hard and possess a great deal of stamina.\r\nThey take immense satisfaction in being busy and productive', NULL, NULL),
(2, 'Activator', 'People exceptionally talented in the Activator theme can make things happen by turning thoughts\r\ninto action. They want to do things now, rather than simply talk about them.', NULL, NULL),
(3, 'Adaptability', 'People exceptionally talented in the Adaptability theme prefer to go with the flow. They tend to be\r\n“now” people who take things as they come and discover the future one day at a time.', NULL, NULL),
(4, 'Analytical', 'People exceptionally talented in the Analytical theme search for reasons and causes. They have the\r\nability to think about all of the factors that might affect a situation.', NULL, NULL),
(5, 'Belief', 'People exceptionally talented in the Belief theme have certain core values that are unchanging. Out\r\nof these values emerges a defined purpose for their lives.', NULL, NULL),
(6, 'Command', 'People exceptionally talented in the Command theme have presence. They can take control of a\r\nsituation and make decisions.', NULL, NULL),
(7, 'Communication', 'People exceptionally talented in the Communication theme generally find it easy to put their\r\nthoughts into words. They are good conversationalists and presenters.', NULL, NULL),
(8, 'Competition', 'People exceptionally talented in the Competition theme measure their progress against the\r\nperformance of others. They strive to win first place and revel in contests.', NULL, NULL),
(9, 'Connectedness', 'People exceptionally talented in the Connectedness theme have faith in the links among all things.\r\nThey believe there are few coincidences and that almost every event has meaning.', NULL, NULL),
(10, 'Consistency', 'People exceptionally talented in the Consistency theme are keenly aware of the need to\r\ntreat people the same. They try to treat everyone with equality by setting up clear rules and\r\nadhering to them.', NULL, NULL),
(11, 'Context', 'People exceptionally talented in the Context theme enjoy thinking about the past. They understand\r\nthe present by researching its history.', NULL, NULL),
(12, 'Deliberative', 'People exceptionally talented in the Deliberative theme are best described by the serious care they\r\ntake in making decisions or choices. They anticipate obstacles.', NULL, NULL),
(13, 'Developer', 'People exceptionally talented in the Developer theme recognize and cultivate the potential in\r\nothers. They spot the signs of each small improvement and derive satisfaction from evidence\r\nof progress.', NULL, NULL),
(14, 'Discipline', 'People exceptionally talented in the Discipline theme enjoy routine and structure. Their world is\r\nbest described by the order they create.', NULL, NULL),
(15, 'Empathy', 'People exceptionally talented in the Empathy theme can sense other people’s feelings by imagining\r\nthemselves in others’ lives or situations.', NULL, NULL),
(16, 'Focus', 'People exceptionally talented in the Focus theme can take a direction, follow through and make the\r\ncorrections necessary to stay on track. They prioritize, then act.', NULL, NULL),
(17, 'Futuristic', 'People exceptionally talented in the Futuristic theme are inspired by the future and what could be.\r\nThey energize others with their visions of the future.', NULL, NULL),
(18, 'Harmony', 'People exceptionally talented in the Harmony theme look for consensus. They don’t enjoy conflict;\r\nrather, they seek areas of agreement.', NULL, NULL),
(19, 'Ideation', 'People exceptionally talented in the Ideation theme are fascinated by ideas. They are able to find\r\nconnections between seemingly disparate phenomena.', NULL, NULL),
(20, 'Includer', 'People exceptionally talented in the Includer theme accept others. They show awareness of those\r\nwho feel left out and make an effort to include them.', NULL, NULL),
(21, 'Individualization', 'People exceptionally talented in the Individualization theme are intrigued with the unique qualities of\r\neach person. They have a gift for figuring out how different people can work together productively.', NULL, NULL),
(22, 'Input', 'People exceptionally talented in the Input theme have a craving to know more. Often they like to\r\ncollect and archive all kinds of information.', NULL, NULL),
(23, 'Intellection', 'People exceptionally talented in the Intellection theme are characterized by their intellectual activity.\r\nThey are introspective and appreciate intellectual discussions.', NULL, NULL),
(24, 'Learner', 'People exceptionally talented in the Learner theme have a great desire to learn and want to\r\ncontinuously improve. The process of learning, rather than the outcome, excites them.', NULL, NULL),
(25, 'Maximizer', 'People exceptionally talented in the Maximizer theme focus on strengths as a way to stimulate\r\npersonal and group excellence. They seek to transform something strong into something superb.', NULL, NULL),
(26, 'Positivity', 'People exceptionally talented in the Positivity theme have contagious enthusiasm. They are upbeat\r\nand can get others excited about what they are going to do.', NULL, NULL),
(27, 'Relator', 'People exceptionally talented in the Relator theme enjoy close relationships with others. They find\r\ndeep satisfaction in working hard with friends to achieve a goal.', NULL, NULL),
(28, 'Responsibility', 'People exceptionally talented in the Responsibility theme take psychological ownership of what\r\nthey say they will do. They are committed to stable values such as honesty and loyalty.', NULL, NULL),
(29, 'Restorative', 'People exceptionally talented in the Restorative theme are adept at dealing with problems. They are\r\ngood at figuring out what is wrong and resolving it.', NULL, NULL),
(30, 'Self-Assurance', 'People exceptionally talented in the Self-Assurance theme feel confident in their ability to manage\r\ntheir own lives. They possess an inner compass that gives them confidence that their decisions\r\nare right.', NULL, NULL),
(31, 'Significance', 'People exceptionally talented in the Significance theme want to be very important in others’ eyes.\r\nThey are independent and want to be recognized.', NULL, NULL),
(32, 'Strategic', 'People exceptionally talented in the Strategic theme create alternative ways to proceed. Faced with\r\nany given scenario, they can quickly spot the relevant patterns and issues.', NULL, NULL),
(33, 'Woo', 'People exceptionally talented in the Woo theme love the challenge of meeting new people and\r\nwinning them over. They derive satisfaction from breaking the ice and making a connection\r\nwith someone.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_plan`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(5, 34, 'plan', 'sub_CiIWBS7sy5VANd', 'individual_annual', 1, NULL, NULL, '2018-04-20 00:08:16', NULL),
(6, 37, 'plan', 'sub_D2tbkvItjd2nRU', 'individual_annual', 1, NULL, NULL, '2018-06-14 07:46:57', NULL),
(7, 30, 'plan', 'sub_D4VXn5LI8Xi3vT', 'company_annual', 1, NULL, NULL, '2018-06-18 15:01:54', NULL),
(8, 54, 'plan', 'sub_DIkrD9CbWvYWf9', 'company_annual', 1, NULL, NULL, '2018-07-26 15:48:57', NULL),
(9, 31, 'plan', 'sub_DLIbJcqrlIpnhH', 'company_annual', 1, NULL, NULL, '2018-08-02 10:48:55', NULL),
(10, 32, 'plan', 'sub_DQc8TfiYzJNWh8', 'individual_annual', 1, NULL, NULL, '2018-08-16 15:19:05', NULL),
(11, 115, 'plan', 'sub_DSodI3wxE38WTv', 'individual_monthly', 1, NULL, NULL, '2018-08-22 12:22:12', NULL),
(12, 18, 'plan', 'sub_DSrPb11GXXZHq5', 'individual_monthly', 1, NULL, NULL, '2018-08-22 15:13:49', NULL),
(13, 19, 'plan', 'sub_DSrzpyHfMT2vFF', 'individual_monthly', 1, NULL, NULL, '2018-08-22 15:50:06', NULL),
(14, 20, 'plan', 'sub_DSs6YnWLNe6lbh', 'individual_monthly', 1, NULL, NULL, '2018-08-22 15:57:12', NULL),
(15, 21, 'plan', 'sub_DSsD1zAhc0y49v', 'company_monthly', 1, NULL, NULL, '2018-08-22 16:03:54', NULL),
(16, 23, 'plan', 'sub_DUeob1DjS2Eu7f', 'company_monthly', 1, NULL, NULL, '2018-08-27 10:20:27', NULL),
(17, 23, 'plan', 'sub_DUepG98KE7JLM5', 'company_annual', 1, NULL, NULL, '2018-08-27 10:21:52', NULL),
(18, 24, 'plan', 'sub_DUetx7sEMxlbYD', 'company_monthly', 1, NULL, NULL, '2018-08-27 10:26:03', NULL),
(19, 11, 'plan', 'sub_DVkQbTo35mLanU', 'company_annual', 1, NULL, NULL, '2018-08-30 08:13:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_response` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `user_id`, `email`, `transaction_id`, `customer_id`, `amount`, `status`, `currency`, `billing`, `message`, `stripe_response`, `created_at`, `updated_at`) VALUES
(1, 32, 'raveena+individual@singsys.com', 'sub_DQc8TfiYzJNWh8', '', '10.00', 'active', 'usd', 'individual_annual', 'active', '{\"id\":\"sub_DQc8TfiYzJNWh8\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1534423744,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1534423744,\"current_period_end\":1565959744,\"current_period_start\":1534423744,\"customer\":\"cus_DQc8vGy5D5rOPq\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DQc8vz1a2UG2mk\",\"object\":\"subscription_item\",\"created\":1534423744,\"metadata\":[],\"plan\":{\"id\":\"individual_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":1000,\"billing_scheme\":\"per_unit\",\"created\":1521867050,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DQc8TfiYzJNWh8\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DQc8TfiYzJNWh8\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"individual_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":1000,\"billing_scheme\":\"per_unit\",\"created\":1521867050,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1534423744,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-08-16 15:19:05', NULL),
(4, 33, 'saurabhshukla+company@singsys.com', 'sub_CiITR2qP3KAota', '', '20.00', 'active', 'usd', 'company_annual', 'active', '{\"id\":\"sub_CiITR2qP3KAota\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1524202415,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1524202415,\"current_period_end\":1555738415,\"current_period_start\":1524202415,\"customer\":\"cus_CiIToSaDFEmsF1\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_CiIT7ZkAFYPIXt\",\"object\":\"subscription_item\",\"created\":1524202415,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_CiITR2qP3KAota\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_CiITR2qP3KAota\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1524202415,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-04-20 00:05:24', NULL),
(5, 34, 'saurabhshukla+individual@singsys.com', 'sub_CiIWBS7sy5VANd', '', '10.00', 'active', 'usd', 'individual_annual', 'active', '{\"id\":\"sub_CiIWBS7sy5VANd\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1524202586,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1524202586,\"current_period_end\":1555738586,\"current_period_start\":1524202586,\"customer\":\"cus_CiIW02KWpDl4b0\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_CiIWsImLHyJAK4\",\"object\":\"subscription_item\",\"created\":1524202587,\"metadata\":[],\"plan\":{\"id\":\"individual_annual\",\"object\":\"plan\",\"amount\":1000,\"billing_scheme\":\"per_unit\",\"created\":1521867050,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_CiIWBS7sy5VANd\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_CiIWBS7sy5VANd\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"individual_annual\",\"object\":\"plan\",\"amount\":1000,\"billing_scheme\":\"per_unit\",\"created\":1521867050,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1524202586,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-04-20 00:08:16', NULL),
(6, 37, 'chetandeep@singsys.com', 'sub_D2tbkvItjd2nRU', '', '10.00', 'active', 'usd', 'individual_annual', 'active', '{\"id\":\"sub_D2tbkvItjd2nRU\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1528953363,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1528953363,\"current_period_end\":1560489363,\"current_period_start\":1528953363,\"customer\":\"cus_D2tbw1gnaTOZez\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_D2tbGO9C8Ret4Z\",\"object\":\"subscription_item\",\"created\":1528953364,\"metadata\":[],\"plan\":{\"id\":\"individual_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":1000,\"billing_scheme\":\"per_unit\",\"created\":1521867050,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_D2tbkvItjd2nRU\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_D2tbkvItjd2nRU\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"individual_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":1000,\"billing_scheme\":\"per_unit\",\"created\":1521867050,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1528953363,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-06-14 07:46:57', NULL),
(7, 30, 'preetisingh+company@singsys.com', 'sub_D4VXn5LI8Xi3vT', '', '20.00', 'active', 'usd', 'company_annual', 'active', '{\"id\":\"sub_D4VXn5LI8Xi3vT\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1529325080,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1529325080,\"current_period_end\":1560861080,\"current_period_start\":1529325080,\"customer\":\"cus_D4VW6Aw4TJTGcE\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_D4VX2ArjHg9bCD\",\"object\":\"subscription_item\",\"created\":1529325080,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_D4VXn5LI8Xi3vT\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_D4VXn5LI8Xi3vT\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1529325080,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-06-18 15:01:54', NULL),
(8, 54, 'raveena+paid@singsys.com', 'sub_DIkrD9CbWvYWf9', '', '20.00', 'active', 'usd', 'company_annual', 'active', '{\"id\":\"sub_DIkrD9CbWvYWf9\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1532611062,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1532611062,\"current_period_end\":1564147062,\"current_period_start\":1532611062,\"customer\":\"cus_DIkrbMBFrCHKiU\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DIkr7WDxp1SOij\",\"object\":\"subscription_item\",\"created\":1532611062,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DIkrD9CbWvYWf9\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DIkrD9CbWvYWf9\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1532611062,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-07-26 15:48:57', NULL),
(9, 31, 'raveena+company@singsys.com', 'sub_DLIbJcqrlIpnhH', '', '20.00', 'active', 'usd', 'company_annual', 'active', '{\"id\":\"sub_DLIbJcqrlIpnhH\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1533197852,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1533197852,\"current_period_end\":1564733852,\"current_period_start\":1533197852,\"customer\":\"cus_DLIbJYI5yesqJj\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DLIbg5xi4nIGZB\",\"object\":\"subscription_item\",\"created\":1533197853,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DLIbJcqrlIpnhH\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DLIbJcqrlIpnhH\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1533197852,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-08-02 10:48:55', NULL),
(10, 115, 'raveena+ipaid@singsys.com', 'sub_DSodI3wxE38WTv', 'cus_DSod35bDADPYfU', '1.00', 'active', 'usd', 'individual_monthly', 'active', '{\"id\":\"sub_DSodI3wxE38WTv\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1534931530,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1534931530,\"current_period_end\":1537609930,\"current_period_start\":1534931530,\"customer\":\"cus_DSod35bDADPYfU\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DSodWhJAB1bVQU\",\"object\":\"subscription_item\",\"created\":1534931531,\"metadata\":[],\"plan\":{\"id\":\"individual_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867104,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DSodI3wxE38WTv\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DSodI3wxE38WTv\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"individual_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867104,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1534931530,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-08-22 12:22:12', NULL),
(11, 18, 'raveena+paid@singsys.com', 'sub_DSrPb11GXXZHq5', 'cus_DSrPHaWleRqOJ4', '1.00', 'active', 'usd', 'individual_monthly', 'active', '{\"id\":\"sub_DSrPb11GXXZHq5\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1534941827,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1534941827,\"current_period_end\":1537620227,\"current_period_start\":1534941827,\"customer\":\"cus_DSrPHaWleRqOJ4\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DSrPFQ7bKlNp2C\",\"object\":\"subscription_item\",\"created\":1534941828,\"metadata\":[],\"plan\":{\"id\":\"individual_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867104,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DSrPb11GXXZHq5\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DSrPb11GXXZHq5\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"individual_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867104,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1534941827,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-08-22 15:13:49', NULL),
(12, 19, 'raveena+subscription@singsys.com', 'sub_DSrzpyHfMT2vFF', 'cus_DSrz07xVOOZfp7', '1.00', 'active', 'usd', 'individual_monthly', 'active', '{\"id\":\"sub_DSrzpyHfMT2vFF\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1534944003,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1534944003,\"current_period_end\":1537622403,\"current_period_start\":1534944003,\"customer\":\"cus_DSrz07xVOOZfp7\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DSrzoZaNtEGxRT\",\"object\":\"subscription_item\",\"created\":1534944004,\"metadata\":[],\"plan\":{\"id\":\"individual_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867104,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DSrzpyHfMT2vFF\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DSrzpyHfMT2vFF\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"individual_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867104,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1534944003,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-08-22 15:50:06', NULL),
(13, 20, 'raveena+subscription@singsys.com', 'sub_DSs6YnWLNe6lbh', 'cus_DSs6vyzzfKxZFX', '1.00', 'active', 'usd', 'individual_monthly', 'active', '{\"id\":\"sub_DSs6YnWLNe6lbh\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1534944430,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1534944430,\"current_period_end\":1537622830,\"current_period_start\":1534944430,\"customer\":\"cus_DSs6vyzzfKxZFX\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DSs6ey8lvJJTex\",\"object\":\"subscription_item\",\"created\":1534944431,\"metadata\":[],\"plan\":{\"id\":\"individual_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867104,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DSs6YnWLNe6lbh\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DSs6YnWLNe6lbh\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"individual_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867104,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Individual Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1534944430,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-08-22 15:57:12', NULL),
(14, 21, 'raveena+corporate@singsys.com', 'sub_DSsD1zAhc0y49v', 'cus_DSsDUB01gW4hHs', '1.00', 'active', 'usd', 'company_monthly', 'active', '{\"id\":\"sub_DSsD1zAhc0y49v\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1534944832,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1534944832,\"current_period_end\":1537623232,\"current_period_start\":1534944832,\"customer\":\"cus_DSsDUB01gW4hHs\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DSsDv3MhAzpNPj\",\"object\":\"subscription_item\",\"created\":1534944833,\"metadata\":[],\"plan\":{\"id\":\"company_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867174,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DSsD1zAhc0y49v\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DSsD1zAhc0y49v\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"company_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867174,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1534944832,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-08-22 16:03:54', NULL),
(15, 23, 'raveena+anjali@singsys.com', 'sub_DUeob1DjS2Eu7f', 'cus_DUeoEHO0Mf2Cx6', '1.00', 'active', 'usd', 'company_monthly', 'active', '{\"id\":\"sub_DUeob1DjS2Eu7f\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1535356226,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1535356226,\"current_period_end\":1538034626,\"current_period_start\":1535356226,\"customer\":\"cus_DUeoEHO0Mf2Cx6\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DUeogkhKDB8czU\",\"object\":\"subscription_item\",\"created\":1535356226,\"metadata\":[],\"plan\":{\"id\":\"company_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867174,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DUeob1DjS2Eu7f\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DUeob1DjS2Eu7f\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"company_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867174,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1535356226,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-08-27 10:20:27', NULL),
(16, 23, 'raveena+anjali@singsys.com', 'sub_DUepG98KE7JLM5', 'cus_DUepmqAMlqjHpJ', '20.00', 'active', 'usd', 'company_annual', 'active', '{\"id\":\"sub_DUepG98KE7JLM5\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1535356311,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1535356311,\"current_period_end\":1566892311,\"current_period_start\":1535356311,\"customer\":\"cus_DUepmqAMlqjHpJ\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DUep8gPg3VV7CD\",\"object\":\"subscription_item\",\"created\":1535356311,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DUepG98KE7JLM5\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DUepG98KE7JLM5\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1535356311,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-08-27 10:21:52', NULL),
(17, 24, 'raveena+anjali@singsys.com', 'sub_DUetx7sEMxlbYD', 'cus_DUetBIO7Zz1Zi5', '1.00', 'active', 'usd', 'company_monthly', 'active', '{\"id\":\"sub_DUetx7sEMxlbYD\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1535356562,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1535356562,\"current_period_end\":1538034962,\"current_period_start\":1535356562,\"customer\":\"cus_DUetBIO7Zz1Zi5\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DUetei7seHJ5EP\",\"object\":\"subscription_item\",\"created\":1535356562,\"metadata\":[],\"plan\":{\"id\":\"company_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867174,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DUetx7sEMxlbYD\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DUetx7sEMxlbYD\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"company_monthly\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":100,\"billing_scheme\":\"per_unit\",\"created\":1521867174,\"currency\":\"usd\",\"interval\":\"month\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Monthly Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1535356562,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-08-27 10:26:03', NULL),
(18, 11, 'raveena+company@singsys.com', 'sub_DVkQbTo35mLanU', 'cus_DVkQ34Pmz0PhsD', '20.00', 'active', 'usd', 'company_annual', 'active', '{\"id\":\"sub_DVkQbTo35mLanU\",\"object\":\"subscription\",\"application_fee_percent\":null,\"billing\":\"charge_automatically\",\"billing_cycle_anchor\":1535607796,\"cancel_at_period_end\":false,\"canceled_at\":null,\"created\":1535607796,\"current_period_end\":1567143796,\"current_period_start\":1535607796,\"customer\":\"cus_DVkQ34Pmz0PhsD\",\"days_until_due\":null,\"discount\":null,\"ended_at\":null,\"items\":{\"object\":\"list\",\"data\":[{\"id\":\"si_DVkQysLOi1eqhm\",\"object\":\"subscription_item\",\"created\":1535607797,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"subscription\":\"sub_DVkQbTo35mLanU\"}],\"has_more\":false,\"total_count\":1,\"url\":\"\\/v1\\/subscription_items?subscription=sub_DVkQbTo35mLanU\"},\"livemode\":false,\"metadata\":[],\"plan\":{\"id\":\"company_annual\",\"object\":\"plan\",\"active\":true,\"aggregate_usage\":null,\"amount\":2000,\"billing_scheme\":\"per_unit\",\"created\":1521867130,\"currency\":\"usd\",\"interval\":\"year\",\"interval_count\":1,\"livemode\":false,\"metadata\":[],\"nickname\":\"Company Annual Premium\",\"product\":\"prod_CY9gzVYMnrIccl\",\"tiers\":null,\"tiers_mode\":null,\"transform_usage\":null,\"trial_period_days\":null,\"usage_type\":\"licensed\"},\"quantity\":1,\"start\":1535607796,\"status\":\"active\",\"tax_percent\":null,\"trial_end\":null,\"trial_start\":null}', '2018-08-30 08:13:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unregistered_invite`
--

CREATE TABLE `unregistered_invite` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unregistered_invite`
--

INSERT INTO `unregistered_invite` (`id`, `user_id`, `email`, `number`, `created_at`, `updated_at`) VALUES
(1, 30, 'wei@w.com', NULL, '2018-06-19 12:34:36', NULL),
(2, 30, 'kriti.sdcf@sdfg.com', NULL, '2018-06-19 12:43:37', NULL),
(3, 30, 'kriti.sdcf@sdfg.com', NULL, '2018-06-19 12:44:16', NULL),
(4, 32, NULL, '917275583135', '2018-07-02 15:27:32', NULL),
(5, 32, NULL, '919956771380', '2018-07-03 08:18:54', NULL),
(6, 32, 'chetandeep+company@singsys.com', NULL, '2018-07-03 08:30:14', NULL),
(7, 32, 'chetandeep+individual@singsys.com', NULL, '2018-07-03 08:32:01', NULL),
(8, 32, 'raveena@singsys.com', NULL, '2018-07-03 08:32:06', NULL),
(9, 32, NULL, '917275583135', '2018-07-12 08:04:44', NULL),
(10, 32, NULL, '919956771380', '2018-07-12 08:04:50', NULL),
(11, 32, NULL, '917275583135', '2018-07-12 08:05:28', NULL),
(12, 32, NULL, '919956771380', '2018-07-12 08:05:33', NULL),
(13, 32, NULL, '917275583135', '2018-07-12 08:06:05', NULL),
(14, 32, NULL, '919956771380', '2018-07-12 08:06:05', NULL),
(15, 32, NULL, '918808769469', '2018-07-12 08:06:11', NULL),
(16, 32, NULL, '917275583135', '2018-07-12 08:08:16', NULL),
(17, 32, NULL, '919956771380', '2018-07-12 08:08:17', NULL),
(18, 32, NULL, '918808769469', '2018-07-12 08:08:18', NULL),
(19, 32, NULL, '917275583135', '2018-07-12 08:18:40', NULL),
(20, 32, NULL, '919956771380', '2018-07-12 08:18:40', NULL),
(21, 32, NULL, '918808769469', '2018-07-12 08:18:41', NULL),
(22, 32, NULL, '918318717701', '2018-07-12 08:18:42', NULL),
(23, 31, NULL, '919956771380', '2018-07-12 15:17:27', NULL),
(24, 31, NULL, '919956771380', '2018-07-12 15:17:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unregistered_job_recommendation`
--

CREATE TABLE `unregistered_job_recommendation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `unregistered_job_recommendation`
--

INSERT INTO `unregistered_job_recommendation` (`id`, `user_id`, `job_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 32, 38, 'saurabhshukla+recommend@singsys.com', '2018-07-31 12:24:19', NULL),
(2, 32, 38, 'raveena@singsys.com', '2018-07-31 12:24:29', NULL),
(3, 32, 38, 'raveena+recommend@singsys.com', '2018-07-31 12:24:32', NULL),
(0, 32, 1, 'raveena@singsys.com', '2018-08-08 15:40:19', NULL),
(0, 32, 35, 'raveena@singsys.com', '2018-08-08 15:40:25', NULL),
(0, 32, 1, '', '2018-08-08 16:26:24', NULL),
(0, 32, 35, '', '2018-08-08 16:26:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credibilty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `account_type_id` int(10) UNSIGNED DEFAULT NULL,
  `email_verified` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `mobile_verified` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('active','inactive','pending') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `stripe_customer_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `card_last_four` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile_code`, `mobile`, `profile_url`, `company_name`, `country_id`, `profile_image`, `credibilty`, `role_id`, `account_type_id`, `email_verified`, `mobile_verified`, `status`, `stripe_customer_id`, `trial_ends_at`, `card_last_four`, `card_brand`, `remember_token`, `api_token`, `created_at`, `updated_at`) VALUES
(1, '', '', 'info@360Reference.com', '$2y$10$pK.zfR0eZMzncbM9cnZmnO7sjWdCcebegaJU4t9PgzvQFY0E2LrDC', '91', '1234567890', NULL, NULL, NULL, NULL, '', 1, NULL, '0', '0', 'active', '', NULL, NULL, NULL, 'iO4rmMxODqoPwQFYsY61rl0pqDwan5JPB5Hbn46jBhxrNI0EPZAvNNI2OL1Y', NULL, '2018-03-12 23:45:00', NULL),
(10, 'Anjali', 'Srivastava', 'anjali+company@singsys.com', '$2y$10$wV5OGH.4b/HNyV2ilYnko.TjfbYAzEjKS06uETdjEvhoQdsoQpxHq', '65', '789098765', NULL, 'Singsys Pte. Ltd', 198, 'crop_20180519124226.jpeg', '', 3, 1, '1', '1', 'active', '', NULL, NULL, NULL, '', 'SWJA91QMB9M2E11596KVSV7KXRTGNS70QIOGNU1X', '2018-05-19 07:13:19', NULL),
(11, 'Raveena', 'Nigam', 'raveena+company@singsys.com', '$2y$10$GDLSLnp56mlRVpkYb9sTSOugQByyyXqE74v63ym.7oFurDYQyWYva', '65', '34567890', 'raveena_cmp', 'Microsoft Corporation', 198, 'crop_20180830122717.png', '', 3, 1, '1', '1', 'active', 'cus_DVkQ34Pmz0PhsD', NULL, NULL, NULL, 'eDesH50rkzFcwmFAYTJiiUesLLufTED2SyqfFUJ2Xt5BuEQuQgsfU5OShT9V', 'K31WPB5OMA6PNPU3OSDAAXDL763S6DS061D880EK', '2018-05-19 07:18:28', '2018-08-30 08:13:18'),
(12, 'Saurabh', 'Shukla', 'saurabhshukla+company@singsys.com', '$2y$10$Si/cqDuPs7J0rMD9G6sic.zafwBDzxcgTQVUHLHMGFnfFaPAbgtIa', '+91', '34567899', NULL, 'Hewlett Packard', 100, 'crop_20180519125009.jpeg', '', 3, 2, '1', '1', 'active', '', NULL, NULL, NULL, 'pD3zxQWsOcbCUd6NdpeyI6qPl3QjSORTj1pHzs7nXtR1jEA905Az5wAfybtQ', 'O6BF9EMK1XR7BK6MI58AOMJB0HXIVEIGBP5JUN72', '2018-05-19 07:20:13', '2018-06-02 12:58:37'),
(13, 'Raveena', 'Nigam', 'raveena+individual@singsys.com', '$2y$10$jrWc4cXyd7zagbiNf3D5POqEpsbWVl6R.cVoDDvxR5C8VZirPbhbC', '91', '9956771380', NULL, 'Microsoft Corporation', 198, 'crop_20180519125053.jpeg', '', 2, 4, '1', '1', 'active', '', NULL, NULL, NULL, 'nEJ9S1dTe6ydy2bXFo5eKAb4qTHmOgcVOf2N5wXNC0FsA7izX7PrXQASPbMZ', 'DPK7SJ6N1IAHI7P60D5FVAGZJ2XTYLE3K0UV7VPM', '2018-05-19 07:21:47', '2018-08-30 13:57:20'),
(14, 'Anjali', 'Srivastava', 'anjali+individual@singsys.com', '$2y$10$IZO9thBrik6FuOROofMX7O3G43tfKXl7YzSgOhVgEFs2WrEcYVBwG', '+65', '97865125', NULL, NULL, 198, 'crop_20180519125428.jpeg', '', 2, 4, '1', '1', 'active', '', NULL, NULL, NULL, 'PS8C2FiXK4jZGh1ogjLBLYnUwh4dOLK2l4QGhpj0JAMyWDQSouK7xPJ5oi39', 'MOGFUH21HJCPW2T0MT5RTSF7KPAWE2ZSXMJTSS16', '2018-05-19 07:24:31', NULL),
(15, 'Saurabh', 'Shukla', 'saurabhshukla+individual@singsys.com', '$2y$10$9foLVBm26On8Qc4/Cq/I6OxhjlWLCbZWBil5QSusIcpcAcmXXjy3m', '+65', '67499221', NULL, 'Microsoft Corporation', 198, 'crop_20180519125519.jpeg', '', 2, 4, '1', '1', 'active', '', NULL, NULL, NULL, 'UmLhwHdqFn0UYThNjVBKe4UQwuwUwInCtrkHsD4BrXnYdVrU6J9FqMiMkIff', 'H0IMQKE3I0WJBMC9X7OZ1IHRQUJ526MKCOL17IPX', '2018-05-19 07:25:58', NULL),
(16, 'Shivangi', 'Agarwal', 'raveena+shivangi@singsys.com', '$2y$10$NZAGzA95i7SZbi59hLjSVOIKlv.614amKCtDj8vITTRt4/AN05eN2', '+91', '67834561', NULL, 'Microsoft Corporation', 100, 'crop_20180601132612.jpeg', '', 2, 4, '1', '1', 'active', '', NULL, NULL, NULL, '5JUZYOgkFNYSFu4eyfFAAi0f7RDEHSFpIO2BKcvPiXHeUAc7joSV4VadcfnS', 'FX1GAWTOA6GNNE3OCD8AF6812QT1OE9QS22Q52N2', '2018-06-01 07:56:45', '2018-06-02 12:57:57'),
(17, 'Chetan Deep', 'Singh', 'chetandeep+new3@singsys.com', '$2y$10$H3kkwZYbzq37BdHEyE7LIeAFoAYiMTFxiHHiVjvZ50tcHLhqgI.LS', '+65', '45612345', NULL, NULL, 198, NULL, '', 2, 4, '0', '0', 'active', '', NULL, NULL, NULL, '', '8V537KSTOV5XW9MFE364XVVHKRONCT75NZZUPTLU', '2018-07-28 16:10:01', NULL),
(18, 'Raveena', 'Nigam', 'raveena+paid@singsys.com', '$2y$10$HNC1oXFbBoy.gSEFWQGmJuj1MfP1l9uPYENH9HrdCrb96IjXfe4ku', '+65', '111111111', NULL, NULL, 198, 'crop_20180822204143.jpeg', '', 2, 3, '1', '1', 'active', '', NULL, NULL, NULL, 'zbsqwKUHxwQLhIO41qVS8Ny9fRakjLiXWXlVOuuKAiHFmGDR94Tvhtcc6tpE', 'NY7LIU8R88WTVVNILNZAGX42SMGUIQJLSDAV6OM8', '2018-08-22 15:12:13', '2018-08-22 15:13:04'),
(20, 'Raveena', 'Nigam', 'raveena+subscription@singsys.com', '$2y$10$M8.XrxGqiIqCWE/CKIsRqeKH1iMNeLjf0jwvF8nFl/DiRYNeBq1VW', '+91', '33333333', NULL, NULL, 100, '', '', 2, 3, '1', '1', 'active', 'cus_DSs6vyzzfKxZFX', NULL, NULL, NULL, 'TRvtwpiHiBjxhZYf4qGWHuLiUJAJ9hx9Okx6Cefvvo83aarUS0ZvtcyatmrD', 'MOIK1BIPWOYPAXK8T45A7OOG0ZQWNILV69O5X77J', '2018-08-22 15:55:13', '2018-08-22 16:00:47'),
(21, 'Raveena', 'Nigam', 'raveena+corporate@singsys.com', '$2y$10$LFoSx96/f2JwfSzNkoR8c.VF6DMs35nu3qB82Wu1cqzK37cqOov.K', '91', '55555555', NULL, 'Singsys Pvt. Ltd', 100, '', '', 3, 1, '1', '1', 'active', 'cus_DSsDUB01gW4hHs', NULL, NULL, NULL, 'jSIZHfMAxq7OVCyIDZFVAKjMIdHT64Z9M7BrziwoCl3wEeh5HGE8Zp6OHdMH', 'HBQM0UEGV8B40M9ZUCU0WBCHZWY9IHC35AETTISX', '2018-08-22 16:03:04', '2018-08-22 16:05:50'),
(24, 'Raveena', 'Nigam', 'raveena+anjali@singsys.com', '$2y$10$fYPupWi/XPhBOCjrehi0zusWvjhA9E2Br1cdqWLzrIeyaA5ntA04u', '65', '1111345600', NULL, 'Google', 198, '', '', 3, 1, '1', '1', 'active', 'cus_DUetBIO7Zz1Zi5', NULL, NULL, NULL, 'UOlflJ7Z5UJWQrr2MuTdoKurE9CwVDmcDopnfZdHydAVxK9So149XIQYoZWE', 'A605S45CN9J3M3J02HFMF1IEZFRU5ZFZR4Z6L2FI', '2018-08-27 10:23:58', '2018-08-27 10:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `users_attributes`
--

CREATE TABLE `users_attributes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_attributes`
--

INSERT INTO `users_attributes` (`id`, `user_id`, `attribute_id`, `created_at`, `updated_at`) VALUES
(1, 28, 28, '2018-07-26 12:00:50', NULL),
(0, 32, 29, '2018-08-08 15:34:48', NULL),
(0, 32, 28, '2018-08-08 15:34:48', NULL),
(0, 32, 22, '2018-08-08 15:34:48', NULL),
(0, 13, 38, '2018-08-30 13:57:20', NULL),
(0, 13, 34, '2018-08-30 13:57:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_account_types`
--

CREATE TABLE `user_account_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annual_charge` int(10) UNSIGNED DEFAULT NULL,
  `monthly_charge` int(10) UNSIGNED DEFAULT NULL,
  `browse_profile_limit` bigint(20) NOT NULL DEFAULT '0',
  `job_posting_limit` int(10) UNSIGNED DEFAULT NULL,
  `job_browsing_limit` int(10) UNSIGNED DEFAULT NULL,
  `category` enum('individual','company') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'individual',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `self` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `as_boss` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `as_peer` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `as_subordinate` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `as_customer` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_account_types`
--

INSERT INTO `user_account_types` (`id`, `account_name`, `annual_charge`, `monthly_charge`, `browse_profile_limit`, `job_posting_limit`, `job_browsing_limit`, `category`, `status`, `added_date`, `self`, `as_boss`, `as_peer`, `as_subordinate`, `as_customer`) VALUES
(1, 'Company Paid User', 20, 5, 0, 500, 0, 'company', 'active', '2018-05-24 10:22:42', '1', '1', '1', '1', '1'),
(2, 'Company Free User', 0, 0, 150, 250, 0, 'company', 'active', '2018-05-24 10:23:18', '0', '0', '0', '0', '0'),
(3, 'Individual Paid User', 20, 5, 0, 0, 300, 'individual', 'active', '2018-05-24 10:23:40', '1', '1', '1', '1', '1'),
(4, 'Individual Free User', 0, 0, 1500, 0, 150, 'individual', 'active', '2018-05-24 10:23:56', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_education`
--

CREATE TABLE `user_education` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_industries`
--

CREATE TABLE `user_industries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_logs`
--

CREATE TABLE `user_profile_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `activity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profile_logs`
--

INSERT INTO `user_profile_logs` (`id`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(79, 31, 'Profile Updated.', '2018-04-19 23:46:00', NULL),
(80, 32, 'Self Rating Updated.', '2018-04-20 00:01:03', NULL),
(81, 32, 'Self Rating Updated.', '2018-04-20 00:01:03', NULL),
(82, 32, 'Self Rating Updated.', '2018-04-20 00:01:03', NULL),
(83, 32, 'Self Rating Updated.', '2018-04-20 00:01:03', NULL),
(84, 32, 'Self Rating Updated.', '2018-04-20 00:01:03', NULL),
(85, 32, 'Self Rating Updated.', '2018-04-20 00:01:03', NULL),
(86, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(87, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(88, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(89, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(90, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(91, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(92, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(93, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(94, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(95, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(96, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(97, 32, 'Self Rating Updated.', '2018-04-20 00:01:04', NULL),
(98, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(99, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(100, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(101, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(102, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(103, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(104, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(105, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(106, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(107, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(108, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(109, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(110, 32, 'Self Rating Updated.', '2018-04-20 00:01:05', NULL),
(111, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(112, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(113, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(114, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(115, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(116, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(117, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(118, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(119, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(120, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(121, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(122, 32, 'Self Rating Updated.', '2018-04-20 00:01:06', NULL),
(123, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(124, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(125, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(126, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(127, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(128, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(129, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(130, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(131, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(132, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(133, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(134, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(135, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(136, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(137, 32, 'Self Rating Updated.', '2018-04-20 00:01:07', NULL),
(138, 32, 'Self Rating Updated.', '2018-04-20 00:01:08', NULL),
(139, 32, 'Self Rating Updated.', '2018-04-20 00:01:08', NULL),
(140, 32, 'Self Rating Updated.', '2018-04-20 00:01:08', NULL),
(141, 32, 'Self Rating Updated.', '2018-04-20 00:01:09', NULL),
(142, 32, 'Self Rating Updated.', '2018-04-20 00:01:09', NULL),
(143, 32, 'Self Rating Updated.', '2018-04-20 00:01:09', NULL),
(144, 32, 'Self Rating Updated.', '2018-04-20 00:01:09', NULL),
(145, 32, 'Self Rating Updated.', '2018-04-20 00:01:09', NULL),
(146, 32, 'Profile Updated.', '2018-04-20 00:01:30', NULL),
(147, 34, 'New Strength Added.', '2018-04-20 00:47:02', NULL),
(148, 34, 'New Strength Added.', '2018-04-20 00:47:17', NULL),
(149, 34, 'Education Added.', '2018-04-20 00:48:06', NULL),
(150, 34, 'Education Information Deleted.', '2018-04-20 00:48:14', NULL),
(151, 30, 'Rated on XYZ profile', '2018-04-20 02:22:52', NULL),
(152, 30, 'Rated on XYZ profile', '2018-04-20 02:25:08', NULL),
(153, 35, 'Rated on Sushant Rajpoot profile', '2018-04-20 03:44:25', NULL),
(154, 35, 'Rated on Sushant Rajpoot profile', '2018-04-20 03:45:16', NULL),
(155, 35, 'Rated on Sushant Rajpoot profile', '2018-04-20 03:46:29', NULL),
(156, 35, 'Rated on Sushant Rajpoot profile', '2018-04-20 03:49:36', NULL),
(157, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(158, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(159, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(160, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(161, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(162, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(163, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(164, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(165, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(166, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(167, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(168, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(169, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(170, 34, 'Self Rating Updated.', '2018-04-20 05:23:11', NULL),
(171, 34, 'Self Rating Updated.', '2018-04-20 05:23:12', NULL),
(172, 34, 'Self Rating Updated.', '2018-04-20 05:23:12', NULL),
(173, 34, 'Self Rating Updated.', '2018-04-20 05:23:12', NULL),
(174, 34, 'Self Rating Updated.', '2018-04-20 05:23:12', NULL),
(175, 34, 'Self Rating Updated.', '2018-04-20 05:23:12', NULL),
(176, 34, 'Self Rating Updated.', '2018-04-20 05:23:12', NULL),
(177, 34, 'Self Rating Updated.', '2018-04-20 05:23:12', NULL),
(178, 34, 'Self Rating Updated.', '2018-04-20 05:23:13', NULL),
(179, 30, 'Profile Updated.', '2018-04-20 06:00:51', NULL),
(180, 31, 'Profile Updated.', '2018-04-20 06:21:14', NULL),
(181, 31, 'Profile Updated.', '2018-04-20 06:22:14', NULL),
(182, 31, 'Profile Updated.', '2018-04-20 06:22:27', NULL),
(183, 31, 'Profile Updated.', '2018-04-20 06:25:22', NULL),
(184, 33, 'Rated on Saurabh Shukla profile', '2018-04-20 06:26:19', NULL),
(185, 31, 'Rated on Microsoft Corporation profile', '2018-04-20 06:32:55', NULL),
(186, 33, 'Rated on Saurabh Shukla profile', '2018-04-20 06:40:01', NULL),
(187, 33, 'Rated on Saurabh Shukla profile', '2018-04-20 06:44:42', NULL),
(188, 33, 'Rated on Saurabh Shukla profile', '2018-04-20 06:46:06', NULL),
(189, 31, 'Rated on Microsoft Corporation profile', '2018-04-20 07:06:00', NULL),
(190, 33, 'Profile Updated.', '2018-04-20 07:29:41', NULL),
(191, 33, 'Profile Updated.', '2018-04-20 07:30:10', NULL),
(192, 33, 'Profile Updated.', '2018-04-20 07:30:56', NULL),
(193, 33, 'Profile Updated.', '2018-04-20 07:31:23', NULL),
(194, 33, 'Profile Updated.', '2018-04-20 07:32:05', NULL),
(195, 28, 'Rated on Preeti Singh profile', '2018-04-20 07:39:53', NULL),
(196, 28, 'Rated on Preeti Singh profile', '2018-04-20 07:42:03', NULL),
(197, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(198, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(199, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(200, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(201, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(202, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(203, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(204, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(205, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(206, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(207, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(208, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(209, 35, 'Self Rating Updated.', '2018-04-20 07:48:33', NULL),
(210, 35, 'Self Rating Updated.', '2018-04-20 07:48:34', NULL),
(211, 35, 'Self Rating Updated.', '2018-04-20 07:48:34', NULL),
(212, 35, 'Self Rating Updated.', '2018-04-20 07:48:34', NULL),
(213, 35, 'Self Rating Updated.', '2018-04-20 07:48:34', NULL),
(214, 35, 'Self Rating Updated.', '2018-04-20 07:48:34', NULL),
(215, 35, 'Self Rating Updated.', '2018-04-20 07:48:34', NULL),
(216, 35, 'Self Rating Updated.', '2018-04-20 07:48:34', NULL),
(217, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(218, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(219, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(220, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(221, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(222, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(223, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(224, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(225, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(226, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(227, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(228, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(229, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(230, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(231, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(232, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(233, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(234, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(235, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(236, 35, 'Self Rating Updated.', '2018-04-20 07:48:38', NULL),
(237, 35, 'Self Rating Updated.', '2018-04-20 07:48:39', NULL),
(238, 35, 'Self Rating Updated.', '2018-04-20 07:48:39', NULL),
(239, 35, 'Self Rating Updated.', '2018-04-20 07:48:39', NULL),
(240, 35, 'Self Rating Updated.', '2018-04-20 07:48:39', NULL),
(241, 35, 'Self Rating Updated.', '2018-04-20 07:48:39', NULL),
(242, 35, 'Self Rating Updated.', '2018-04-20 07:48:39', NULL),
(243, 35, 'Self Rating Updated.', '2018-04-20 07:48:39', NULL),
(244, 35, 'Self Rating Updated.', '2018-04-20 07:48:39', NULL),
(245, 35, 'Self Rating Updated.', '2018-04-20 07:48:39', NULL),
(246, 35, 'Self Rating Updated.', '2018-04-20 07:48:39', NULL),
(247, 35, 'Self Rating Updated.', '2018-04-20 07:48:39', NULL),
(248, 35, 'Self Rating Updated.', '2018-04-20 07:48:40', NULL),
(249, 35, 'Self Rating Updated.', '2018-04-20 07:48:40', NULL),
(250, 35, 'Self Rating Updated.', '2018-04-20 07:48:40', NULL),
(251, 35, 'Self Rating Updated.', '2018-04-20 07:48:40', NULL),
(252, 35, 'Self Rating Updated.', '2018-04-20 07:48:40', NULL),
(253, 28, 'Rated on Preeti Singh profile', '2018-04-20 07:48:51', NULL),
(254, 28, 'Rated on Preeti Singh profile', '2018-04-20 07:48:52', NULL),
(255, 28, 'Rated on Preeti Singh profile', '2018-04-20 07:50:05', NULL),
(256, 35, 'Rated on Sushant Rajpoot profile', '2018-04-20 07:50:51', NULL),
(257, 35, 'Rated on Sushant Rajpoot profile', '2018-04-20 07:53:06', NULL),
(258, 28, 'Rated on Preeti Singh profile', '2018-04-21 01:28:21', NULL),
(259, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(260, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(261, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(262, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(263, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(264, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(265, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(266, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(267, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(268, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(269, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(270, 35, 'Self Rating Updated.', '2018-04-22 23:36:20', NULL),
(271, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(272, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(273, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(274, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(275, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(276, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(277, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(278, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(279, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(280, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(281, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(282, 35, 'Self Rating Updated.', '2018-04-22 23:36:21', NULL),
(283, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(284, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(285, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(286, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(287, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(288, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(289, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(290, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(291, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(292, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(293, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(294, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(295, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(296, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(297, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(298, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(299, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(300, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(301, 35, 'Self Rating Updated.', '2018-04-22 23:36:22', NULL),
(302, 35, 'Self Rating Updated.', '2018-04-22 23:36:23', NULL),
(303, 35, 'Self Rating Updated.', '2018-04-22 23:36:23', NULL),
(304, 35, 'Self Rating Updated.', '2018-04-22 23:36:23', NULL),
(305, 35, 'Self Rating Updated.', '2018-04-22 23:36:23', NULL),
(306, 35, 'Self Rating Updated.', '2018-04-22 23:36:23', NULL),
(307, 35, 'Self Rating Updated.', '2018-04-22 23:36:23', NULL),
(308, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(309, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(310, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(311, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(312, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(313, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(314, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(315, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(316, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(317, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(318, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(319, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(320, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(321, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(322, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(323, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(324, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(325, 35, 'Self Rating Updated.', '2018-04-22 23:36:25', NULL),
(326, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(327, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(328, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(329, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(330, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(331, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(332, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(333, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(334, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(335, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(336, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(337, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(338, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(339, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(340, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(341, 35, 'Self Rating Updated.', '2018-04-22 23:36:26', NULL),
(342, 35, 'Self Rating Updated.', '2018-04-22 23:36:27', NULL),
(343, 35, 'Self Rating Updated.', '2018-04-22 23:36:27', NULL),
(344, 35, 'Self Rating Updated.', '2018-04-22 23:36:27', NULL),
(345, 35, 'Self Rating Updated.', '2018-04-22 23:36:29', NULL),
(346, 35, 'Self Rating Updated.', '2018-04-22 23:36:29', NULL),
(347, 35, 'Self Rating Updated.', '2018-04-22 23:36:29', NULL),
(348, 35, 'Self Rating Updated.', '2018-04-22 23:36:29', NULL),
(349, 35, 'Self Rating Updated.', '2018-04-22 23:36:29', NULL),
(350, 35, 'Self Rating Updated.', '2018-04-22 23:36:29', NULL),
(351, 35, 'Self Rating Updated.', '2018-04-22 23:36:30', NULL),
(352, 35, 'Self Rating Updated.', '2018-04-22 23:36:30', NULL),
(353, 35, 'Self Rating Updated.', '2018-04-22 23:36:30', NULL),
(354, 35, 'Self Rating Updated.', '2018-04-22 23:36:32', NULL),
(355, 35, 'Self Rating Updated.', '2018-04-22 23:36:32', NULL),
(356, 35, 'Self Rating Updated.', '2018-04-22 23:36:32', NULL),
(357, 35, 'Self Rating Updated.', '2018-04-22 23:36:32', NULL),
(358, 35, 'Self Rating Updated.', '2018-04-22 23:36:32', NULL),
(359, 35, 'Self Rating Updated.', '2018-04-22 23:36:32', NULL),
(360, 35, 'Self Rating Updated.', '2018-04-22 23:36:32', NULL),
(361, 35, 'Self Rating Updated.', '2018-04-22 23:36:33', NULL),
(362, 35, 'Self Rating Updated.', '2018-04-22 23:36:33', NULL),
(363, 35, 'Self Rating Updated.', '2018-04-22 23:36:33', NULL),
(364, 35, 'Self Rating Updated.', '2018-04-22 23:36:33', NULL),
(365, 35, 'Self Rating Updated.', '2018-04-22 23:36:33', NULL),
(366, 35, 'Self Rating Updated.', '2018-04-22 23:36:33', NULL),
(367, 35, 'Self Rating Updated.', '2018-04-22 23:36:33', NULL),
(368, 35, 'Self Rating Updated.', '2018-04-22 23:36:34', NULL),
(369, 35, 'Self Rating Updated.', '2018-04-22 23:36:34', NULL),
(370, 35, 'Self Rating Updated.', '2018-04-22 23:36:34', NULL),
(371, 35, 'Self Rating Updated.', '2018-04-22 23:36:34', NULL),
(372, 35, 'Self Rating Updated.', '2018-04-22 23:36:34', NULL),
(373, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(374, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(375, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(376, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(377, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(378, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(379, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(380, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(381, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(382, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(383, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(384, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(385, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(386, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(387, 35, 'Self Rating Updated.', '2018-04-22 23:36:35', NULL),
(388, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(389, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(390, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(391, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(392, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(393, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(394, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(395, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(396, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(397, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(398, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(399, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(400, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(401, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(402, 35, 'Self Rating Updated.', '2018-04-22 23:36:36', NULL),
(403, 35, 'Self Rating Updated.', '2018-04-22 23:36:37', NULL),
(404, 35, 'Self Rating Updated.', '2018-04-22 23:36:37', NULL),
(405, 35, 'Self Rating Updated.', '2018-04-22 23:36:37', NULL),
(406, 35, 'Self Rating Updated.', '2018-04-22 23:36:37', NULL),
(407, 35, 'Self Rating Updated.', '2018-04-22 23:36:37', NULL),
(408, 35, 'Self Rating Updated.', '2018-04-22 23:36:37', NULL),
(409, 35, 'Self Rating Updated.', '2018-04-22 23:36:37', NULL),
(410, 35, 'Self Rating Updated.', '2018-04-22 23:36:37', NULL),
(411, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(412, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(413, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(414, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(415, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(416, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(417, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(418, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(419, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(420, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(421, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(422, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(423, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(424, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(425, 35, 'Self Rating Updated.', '2018-04-22 23:36:44', NULL),
(426, 35, 'Self Rating Updated.', '2018-04-22 23:36:45', NULL),
(427, 35, 'Self Rating Updated.', '2018-04-22 23:36:45', NULL),
(428, 35, 'Self Rating Updated.', '2018-04-22 23:36:45', NULL),
(429, 35, 'Self Rating Updated.', '2018-04-22 23:36:45', NULL),
(430, 35, 'Self Rating Updated.', '2018-04-22 23:36:45', NULL),
(431, 35, 'Self Rating Updated.', '2018-04-22 23:36:45', NULL),
(432, 35, 'Self Rating Updated.', '2018-04-22 23:36:45', NULL),
(433, 35, 'Self Rating Updated.', '2018-04-22 23:36:45', NULL),
(434, 35, 'Self Rating Updated.', '2018-04-22 23:36:45', NULL),
(435, 35, 'Self Rating Updated.', '2018-04-22 23:36:45', NULL),
(436, 35, 'Self Rating Updated.', '2018-04-22 23:36:47', NULL),
(437, 35, 'Self Rating Updated.', '2018-04-22 23:36:47', NULL),
(438, 35, 'Self Rating Updated.', '2018-04-22 23:36:47', NULL),
(439, 35, 'Self Rating Updated.', '2018-04-22 23:36:47', NULL),
(440, 35, 'Self Rating Updated.', '2018-04-22 23:36:47', NULL),
(441, 35, 'Self Rating Updated.', '2018-04-22 23:36:47', NULL),
(442, 35, 'Self Rating Updated.', '2018-04-22 23:36:47', NULL),
(443, 35, 'Self Rating Updated.', '2018-04-22 23:36:47', NULL),
(444, 35, 'Self Rating Updated.', '2018-04-22 23:36:47', NULL),
(445, 35, 'Self Rating Updated.', '2018-04-22 23:36:47', NULL),
(446, 35, 'Self Rating Updated.', '2018-04-22 23:36:47', NULL),
(447, 35, 'Self Rating Updated.', '2018-04-22 23:36:48', NULL),
(448, 35, 'Self Rating Updated.', '2018-04-22 23:36:48', NULL),
(449, 35, 'Self Rating Updated.', '2018-04-22 23:36:48', NULL),
(450, 35, 'Self Rating Updated.', '2018-04-22 23:36:48', NULL),
(451, 35, 'Self Rating Updated.', '2018-04-22 23:36:48', NULL),
(452, 35, 'Self Rating Updated.', '2018-04-22 23:36:48', NULL),
(453, 35, 'Self Rating Updated.', '2018-04-22 23:36:48', NULL),
(454, 35, 'Self Rating Updated.', '2018-04-22 23:36:48', NULL),
(455, 35, 'Self Rating Updated.', '2018-04-22 23:36:48', NULL),
(456, 35, 'Self Rating Updated.', '2018-04-22 23:36:48', NULL),
(457, 35, 'Self Rating Updated.', '2018-04-22 23:36:49', NULL),
(458, 35, 'Self Rating Updated.', '2018-04-22 23:36:49', NULL),
(459, 35, 'Self Rating Updated.', '2018-04-22 23:36:49', NULL),
(460, 35, 'Self Rating Updated.', '2018-04-22 23:36:49', NULL),
(461, 35, 'Self Rating Updated.', '2018-04-22 23:36:49', NULL),
(462, 35, 'Self Rating Updated.', '2018-04-22 23:36:49', NULL),
(463, 35, 'Self Rating Updated.', '2018-04-22 23:36:49', NULL),
(464, 35, 'Self Rating Updated.', '2018-04-22 23:36:49', NULL),
(465, 35, 'Self Rating Updated.', '2018-04-22 23:36:49', NULL),
(466, 35, 'Self Rating Updated.', '2018-04-22 23:36:49', NULL),
(467, 35, 'Self Rating Updated.', '2018-04-22 23:36:49', NULL),
(468, 35, 'Self Rating Updated.', '2018-04-22 23:36:50', NULL),
(469, 35, 'Self Rating Updated.', '2018-04-22 23:36:50', NULL),
(470, 35, 'Self Rating Updated.', '2018-04-22 23:36:50', NULL),
(471, 35, 'Self Rating Updated.', '2018-04-22 23:36:50', NULL),
(472, 35, 'Self Rating Updated.', '2018-04-22 23:36:50', NULL),
(473, 35, 'Self Rating Updated.', '2018-04-22 23:36:50', NULL),
(474, 35, 'Self Rating Updated.', '2018-04-22 23:36:50', NULL),
(475, 35, 'Self Rating Updated.', '2018-04-22 23:36:50', NULL),
(476, 35, 'Self Rating Updated.', '2018-04-22 23:36:50', NULL),
(477, 35, 'Self Rating Updated.', '2018-04-22 23:36:50', NULL),
(478, 35, 'Self Rating Updated.', '2018-04-22 23:36:51', NULL),
(479, 35, 'Self Rating Updated.', '2018-04-22 23:36:51', NULL),
(480, 35, 'Self Rating Updated.', '2018-04-22 23:36:51', NULL),
(481, 35, 'Self Rating Updated.', '2018-04-22 23:36:51', NULL),
(482, 35, 'Self Rating Updated.', '2018-04-22 23:36:51', NULL),
(483, 35, 'Self Rating Updated.', '2018-04-22 23:36:51', NULL),
(484, 35, 'Self Rating Updated.', '2018-04-22 23:36:51', NULL),
(485, 35, 'Self Rating Updated.', '2018-04-22 23:36:51', NULL),
(486, 35, 'Self Rating Updated.', '2018-04-22 23:36:51', NULL),
(487, 35, 'Self Rating Updated.', '2018-04-22 23:36:51', NULL),
(488, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(489, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(490, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(491, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(492, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(493, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(494, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(495, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(496, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(497, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(498, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(499, 35, 'Self Rating Updated.', '2018-04-22 23:36:53', NULL),
(500, 35, 'Self Rating Updated.', '2018-04-22 23:36:54', NULL),
(501, 35, 'Self Rating Updated.', '2018-04-22 23:36:54', NULL),
(502, 35, 'Self Rating Updated.', '2018-04-22 23:36:54', NULL),
(503, 35, 'Self Rating Updated.', '2018-04-22 23:36:54', NULL),
(504, 35, 'Self Rating Updated.', '2018-04-22 23:36:54', NULL),
(505, 35, 'Self Rating Updated.', '2018-04-22 23:36:54', NULL),
(506, 35, 'Self Rating Updated.', '2018-04-22 23:36:54', NULL),
(507, 35, 'Self Rating Updated.', '2018-04-22 23:36:54', NULL),
(508, 35, 'Self Rating Updated.', '2018-04-22 23:36:56', NULL),
(509, 35, 'Self Rating Updated.', '2018-04-22 23:36:56', NULL),
(510, 35, 'Self Rating Updated.', '2018-04-22 23:36:56', NULL),
(511, 35, 'Self Rating Updated.', '2018-04-22 23:36:56', NULL),
(512, 35, 'Self Rating Updated.', '2018-04-22 23:36:56', NULL),
(513, 35, 'Self Rating Updated.', '2018-04-22 23:36:56', NULL),
(514, 35, 'Self Rating Updated.', '2018-04-22 23:36:56', NULL),
(515, 35, 'Self Rating Updated.', '2018-04-22 23:36:56', NULL),
(516, 35, 'Self Rating Updated.', '2018-04-22 23:36:57', NULL),
(517, 35, 'Self Rating Updated.', '2018-04-22 23:36:57', NULL),
(518, 35, 'Self Rating Updated.', '2018-04-22 23:36:57', NULL),
(519, 35, 'Self Rating Updated.', '2018-04-22 23:36:57', NULL),
(520, 35, 'Self Rating Updated.', '2018-04-22 23:36:57', NULL),
(521, 35, 'Self Rating Updated.', '2018-04-22 23:36:57', NULL),
(522, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(523, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(524, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(525, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(526, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(527, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(528, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(529, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(530, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(531, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(532, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(533, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(534, 35, 'Self Rating Updated.', '2018-04-22 23:36:58', NULL),
(535, 35, 'Self Rating Updated.', '2018-04-22 23:36:59', NULL),
(536, 35, 'Self Rating Updated.', '2018-04-22 23:36:59', NULL),
(537, 35, 'Self Rating Updated.', '2018-04-22 23:36:59', NULL),
(538, 35, 'Self Rating Updated.', '2018-04-22 23:37:01', NULL),
(539, 35, 'Self Rating Updated.', '2018-04-22 23:37:01', NULL),
(540, 35, 'Self Rating Updated.', '2018-04-22 23:37:01', NULL),
(541, 35, 'Self Rating Updated.', '2018-04-22 23:37:01', NULL),
(542, 35, 'Self Rating Updated.', '2018-04-22 23:37:01', NULL),
(543, 35, 'Self Rating Updated.', '2018-04-22 23:37:01', NULL),
(544, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(545, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(546, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(547, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(548, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(549, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(550, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(551, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(552, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(553, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(554, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(555, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(556, 35, 'Self Rating Updated.', '2018-04-22 23:37:02', NULL),
(557, 35, 'Self Rating Updated.', '2018-04-22 23:37:03', NULL),
(558, 35, 'Self Rating Updated.', '2018-04-22 23:37:03', NULL),
(559, 35, 'Self Rating Updated.', '2018-04-22 23:37:03', NULL),
(560, 35, 'Self Rating Updated.', '2018-04-22 23:37:03', NULL),
(561, 35, 'Self Rating Updated.', '2018-04-22 23:37:03', NULL),
(562, 35, 'Self Rating Updated.', '2018-04-22 23:37:03', NULL),
(563, 35, 'Self Rating Updated.', '2018-04-22 23:37:03', NULL),
(564, 35, 'Self Rating Updated.', '2018-04-22 23:37:03', NULL),
(565, 35, 'Self Rating Updated.', '2018-04-22 23:37:03', NULL),
(566, 35, 'Self Rating Updated.', '2018-04-22 23:37:03', NULL),
(567, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(568, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(569, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(570, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(571, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(572, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(573, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(574, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(575, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(576, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(577, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(578, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(579, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(580, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(581, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(582, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(583, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(584, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(585, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(586, 35, 'Self Rating Updated.', '2018-04-22 23:37:04', NULL),
(587, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(588, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(589, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(590, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(591, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(592, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(593, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(594, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(595, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(596, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(597, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(598, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(599, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(600, 35, 'Self Rating Updated.', '2018-04-22 23:37:05', NULL),
(601, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(602, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(603, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(604, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(605, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(606, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(607, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(608, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(609, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(610, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(611, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(612, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(613, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(614, 35, 'Self Rating Updated.', '2018-04-22 23:37:22', NULL),
(615, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(616, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(617, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(618, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(619, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(620, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(621, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(622, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(623, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(624, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(625, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(626, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(627, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(628, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(629, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(630, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(631, 35, 'Self Rating Updated.', '2018-04-22 23:37:23', NULL),
(632, 35, 'Self Rating Updated.', '2018-04-22 23:37:24', NULL),
(633, 35, 'Self Rating Updated.', '2018-04-22 23:37:24', NULL),
(634, 35, 'Self Rating Updated.', '2018-04-22 23:37:24', NULL),
(635, 35, 'Self Rating Updated.', '2018-04-22 23:37:24', NULL),
(636, 35, 'Self Rating Updated.', '2018-04-22 23:37:24', NULL),
(637, 35, 'Self Rating Updated.', '2018-04-22 23:37:24', NULL),
(638, 35, 'Self Rating Updated.', '2018-04-22 23:37:24', NULL),
(639, 35, 'Self Rating Updated.', '2018-04-22 23:37:24', NULL),
(640, 35, 'Self Rating Updated.', '2018-04-22 23:37:24', NULL),
(641, 35, 'Self Rating Updated.', '2018-04-22 23:37:24', NULL),
(642, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(643, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(644, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(645, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(646, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(647, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(648, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(649, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(650, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(651, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(652, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(653, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(654, 35, 'Self Rating Updated.', '2018-04-22 23:37:27', NULL),
(655, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(656, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(657, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(658, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(659, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(660, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(661, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(662, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(663, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(664, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(665, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(666, 35, 'Self Rating Updated.', '2018-04-22 23:37:28', NULL),
(667, 35, 'Self Rating Updated.', '2018-04-22 23:37:32', NULL),
(668, 35, 'Self Rating Updated.', '2018-04-22 23:37:32', NULL),
(669, 35, 'Self Rating Updated.', '2018-04-22 23:37:32', NULL),
(670, 35, 'Self Rating Updated.', '2018-04-22 23:37:32', NULL),
(671, 35, 'Self Rating Updated.', '2018-04-22 23:37:32', NULL),
(672, 35, 'Self Rating Updated.', '2018-04-22 23:37:32', NULL),
(673, 35, 'Self Rating Updated.', '2018-04-22 23:37:32', NULL),
(674, 35, 'Self Rating Updated.', '2018-04-22 23:37:33', NULL),
(675, 35, 'Self Rating Updated.', '2018-04-22 23:37:33', NULL),
(676, 35, 'Self Rating Updated.', '2018-04-22 23:37:33', NULL),
(677, 35, 'Self Rating Updated.', '2018-04-22 23:37:33', NULL),
(678, 35, 'Self Rating Updated.', '2018-04-22 23:37:33', NULL),
(679, 35, 'Self Rating Updated.', '2018-04-22 23:37:33', NULL),
(680, 35, 'Self Rating Updated.', '2018-04-22 23:37:33', NULL),
(681, 35, 'Self Rating Updated.', '2018-04-22 23:37:33', NULL),
(682, 35, 'Self Rating Updated.', '2018-04-22 23:37:36', NULL),
(683, 35, 'Self Rating Updated.', '2018-04-22 23:37:36', NULL),
(684, 35, 'Self Rating Updated.', '2018-04-22 23:37:36', NULL),
(685, 35, 'Self Rating Updated.', '2018-04-22 23:37:36', NULL),
(686, 35, 'Self Rating Updated.', '2018-04-22 23:37:36', NULL),
(687, 35, 'Self Rating Updated.', '2018-04-22 23:37:36', NULL),
(688, 35, 'Self Rating Updated.', '2018-04-22 23:37:37', NULL),
(689, 35, 'Self Rating Updated.', '2018-04-22 23:37:37', NULL),
(690, 35, 'Self Rating Updated.', '2018-04-22 23:37:37', NULL),
(691, 35, 'Self Rating Updated.', '2018-04-22 23:37:37', NULL),
(692, 35, 'Self Rating Updated.', '2018-04-22 23:37:37', NULL),
(693, 35, 'Self Rating Updated.', '2018-04-22 23:37:37', NULL),
(694, 35, 'Self Rating Updated.', '2018-04-22 23:37:37', NULL),
(695, 35, 'Self Rating Updated.', '2018-04-22 23:37:37', NULL),
(696, 35, 'Self Rating Updated.', '2018-04-22 23:37:37', NULL),
(697, 35, 'Self Rating Updated.', '2018-04-22 23:37:37', NULL),
(698, 35, 'Self Rating Updated.', '2018-04-22 23:37:40', NULL),
(699, 35, 'Self Rating Updated.', '2018-04-22 23:37:40', NULL),
(700, 35, 'Self Rating Updated.', '2018-04-22 23:37:40', NULL),
(701, 35, 'Self Rating Updated.', '2018-04-22 23:39:43', NULL),
(702, 35, 'Self Rating Updated.', '2018-04-22 23:39:43', NULL),
(703, 35, 'Self Rating Updated.', '2018-04-22 23:39:43', NULL),
(704, 35, 'Self Rating Updated.', '2018-04-22 23:39:43', NULL),
(705, 35, 'Self Rating Updated.', '2018-04-22 23:39:43', NULL),
(706, 35, 'Self Rating Updated.', '2018-04-22 23:39:43', NULL),
(707, 35, 'Self Rating Updated.', '2018-04-22 23:39:43', NULL),
(708, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(709, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(710, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(711, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(712, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(713, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(714, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(715, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(716, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(717, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(718, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(719, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(720, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(721, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(722, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(723, 35, 'Self Rating Updated.', '2018-04-22 23:39:44', NULL),
(724, 35, 'Self Rating Updated.', '2018-04-22 23:39:46', NULL),
(725, 35, 'Self Rating Updated.', '2018-04-22 23:39:46', NULL),
(726, 35, 'Self Rating Updated.', '2018-04-22 23:39:46', NULL),
(727, 35, 'Self Rating Updated.', '2018-04-22 23:39:46', NULL),
(728, 35, 'Self Rating Updated.', '2018-04-22 23:39:46', NULL),
(729, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(730, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(731, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(732, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(733, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(734, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(735, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(736, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(737, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(738, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(739, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(740, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(741, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(742, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(743, 35, 'Self Rating Updated.', '2018-04-22 23:39:50', NULL),
(744, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(745, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(746, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(747, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(748, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(749, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(750, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(751, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(752, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(753, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(754, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(755, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(756, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(757, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(758, 35, 'Self Rating Updated.', '2018-04-22 23:39:51', NULL),
(759, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(760, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(761, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(762, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(763, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(764, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(765, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(766, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(767, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(768, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(769, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(770, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(771, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(772, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(773, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(774, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(775, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(776, 35, 'Self Rating Updated.', '2018-04-22 23:39:52', NULL),
(777, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(778, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(779, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(780, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(781, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(782, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(783, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(784, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(785, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(786, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(787, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(788, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(789, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(790, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(791, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(792, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(793, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(794, 35, 'Self Rating Updated.', '2018-04-22 23:39:53', NULL),
(795, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(796, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(797, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(798, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(799, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(800, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(801, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(802, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(803, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(804, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(805, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(806, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(807, 35, 'Self Rating Updated.', '2018-04-22 23:39:54', NULL),
(808, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(809, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(810, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(811, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(812, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(813, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(814, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(815, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(816, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(817, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(818, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(819, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(820, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(821, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(822, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(823, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(824, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(825, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(826, 35, 'Self Rating Updated.', '2018-04-22 23:39:55', NULL),
(827, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(828, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(829, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(830, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(831, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(832, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(833, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(834, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(835, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(836, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(837, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(838, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(839, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(840, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(841, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(842, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(843, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(844, 35, 'Self Rating Updated.', '2018-04-22 23:39:56', NULL),
(845, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(846, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(847, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(848, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(849, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(850, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(851, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(852, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(853, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(854, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(855, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(856, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(857, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(858, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(859, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(860, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(861, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(862, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(863, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(864, 35, 'Self Rating Updated.', '2018-04-22 23:39:57', NULL),
(865, 35, 'Self Rating Updated.', '2018-04-22 23:39:58', NULL),
(866, 35, 'Self Rating Updated.', '2018-04-22 23:39:58', NULL),
(867, 35, 'Self Rating Updated.', '2018-04-22 23:39:58', NULL),
(868, 35, 'Self Rating Updated.', '2018-04-22 23:39:58', NULL),
(869, 35, 'Self Rating Updated.', '2018-04-22 23:39:58', NULL),
(870, 35, 'Self Rating Updated.', '2018-04-22 23:39:58', NULL),
(871, 35, 'Self Rating Updated.', '2018-04-22 23:39:58', NULL),
(872, 35, 'Self Rating Updated.', '2018-04-22 23:39:58', NULL),
(873, 35, 'Self Rating Updated.', '2018-04-22 23:39:58', NULL),
(874, 35, 'Self Rating Updated.', '2018-04-22 23:40:02', NULL),
(875, 35, 'Self Rating Updated.', '2018-04-22 23:40:02', NULL),
(876, 35, 'Self Rating Updated.', '2018-04-22 23:40:02', NULL),
(877, 35, 'Self Rating Updated.', '2018-04-22 23:40:02', NULL),
(878, 35, 'Self Rating Updated.', '2018-04-22 23:40:02', NULL),
(879, 35, 'Self Rating Updated.', '2018-04-22 23:40:02', NULL),
(880, 35, 'Self Rating Updated.', '2018-04-22 23:40:03', NULL);
INSERT INTO `user_profile_logs` (`id`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(881, 35, 'Self Rating Updated.', '2018-04-22 23:40:03', NULL),
(882, 35, 'Self Rating Updated.', '2018-04-22 23:40:03', NULL),
(883, 35, 'Self Rating Updated.', '2018-04-22 23:40:03', NULL),
(884, 35, 'Self Rating Updated.', '2018-04-22 23:40:03', NULL),
(885, 35, 'Self Rating Updated.', '2018-04-22 23:40:03', NULL),
(886, 35, 'Self Rating Updated.', '2018-04-22 23:40:03', NULL),
(887, 35, 'Self Rating Updated.', '2018-04-22 23:40:04', NULL),
(888, 35, 'Self Rating Updated.', '2018-04-22 23:40:06', NULL),
(889, 35, 'Self Rating Updated.', '2018-04-22 23:40:06', NULL),
(890, 35, 'Self Rating Updated.', '2018-04-22 23:40:06', NULL),
(891, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(892, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(893, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(894, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(895, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(896, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(897, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(898, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(899, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(900, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(901, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(902, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(903, 35, 'Self Rating Updated.', '2018-04-22 23:40:10', NULL),
(904, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(905, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(906, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(907, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(908, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(909, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(910, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(911, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(912, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(913, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(914, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(915, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(916, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(917, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(918, 35, 'Self Rating Updated.', '2018-04-22 23:40:11', NULL),
(919, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(920, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(921, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(922, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(923, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(924, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(925, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(926, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(927, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(928, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(929, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(930, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(931, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(932, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(933, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(934, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(935, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(936, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(937, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(938, 35, 'Self Rating Updated.', '2018-04-22 23:40:12', NULL),
(939, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(940, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(941, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(942, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(943, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(944, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(945, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(946, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(947, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(948, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(949, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(950, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(951, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(952, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(953, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(954, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(955, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(956, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(957, 35, 'Self Rating Updated.', '2018-04-22 23:40:13', NULL),
(958, 35, 'Self Rating Updated.', '2018-04-22 23:40:14', NULL),
(959, 35, 'Self Rating Updated.', '2018-04-22 23:40:14', NULL),
(960, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(961, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(962, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(963, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(964, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(965, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(966, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(967, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(968, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(969, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(970, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(971, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(972, 35, 'Self Rating Updated.', '2018-04-22 23:40:16', NULL),
(973, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(974, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(975, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(976, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(977, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(978, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(979, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(980, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(981, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(982, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(983, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(984, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(985, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(986, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(987, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(988, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(989, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(990, 35, 'Self Rating Updated.', '2018-04-22 23:40:17', NULL),
(991, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(992, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(993, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(994, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(995, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(996, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(997, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(998, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(999, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(1000, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(1001, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(1002, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(1003, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(1004, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(1005, 35, 'Self Rating Updated.', '2018-04-22 23:40:18', NULL),
(1006, 35, 'Self Rating Updated.', '2018-04-22 23:40:19', NULL),
(1007, 35, 'Self Rating Updated.', '2018-04-22 23:40:19', NULL),
(1008, 35, 'Self Rating Updated.', '2018-04-22 23:40:19', NULL),
(1009, 35, 'Self Rating Updated.', '2018-04-22 23:40:19', NULL),
(1010, 35, 'Self Rating Updated.', '2018-04-22 23:40:19', NULL),
(1011, 35, 'Self Rating Updated.', '2018-04-22 23:40:19', NULL),
(1012, 35, 'Self Rating Updated.', '2018-04-22 23:40:19', NULL),
(1013, 35, 'Self Rating Updated.', '2018-04-22 23:40:19', NULL),
(1014, 35, 'Self Rating Updated.', '2018-04-22 23:40:19', NULL),
(1015, 35, 'Self Rating Updated.', '2018-04-22 23:40:19', NULL),
(1016, 35, 'Self Rating Updated.', '2018-04-22 23:40:19', NULL),
(1017, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1018, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1019, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1020, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1021, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1022, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1023, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1024, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1025, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1026, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1027, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1028, 35, 'Self Rating Updated.', '2018-04-22 23:40:21', NULL),
(1029, 35, 'Self Rating Updated.', '2018-04-22 23:40:22', NULL),
(1030, 35, 'Self Rating Updated.', '2018-04-22 23:40:22', NULL),
(1031, 35, 'Self Rating Updated.', '2018-04-22 23:40:22', NULL),
(1032, 35, 'Self Rating Updated.', '2018-04-22 23:40:22', NULL),
(1033, 35, 'Self Rating Updated.', '2018-04-22 23:40:22', NULL),
(1034, 35, 'Self Rating Updated.', '2018-04-22 23:40:22', NULL),
(1035, 35, 'Self Rating Updated.', '2018-04-22 23:40:22', NULL),
(1036, 35, 'Self Rating Updated.', '2018-04-22 23:40:22', NULL),
(1037, 35, 'Self Rating Updated.', '2018-04-22 23:40:22', NULL),
(1038, 35, 'Self Rating Updated.', '2018-04-22 23:40:22', NULL),
(1039, 35, 'Self Rating Updated.', '2018-04-22 23:40:23', NULL),
(1040, 35, 'Self Rating Updated.', '2018-04-22 23:40:23', NULL),
(1041, 35, 'Self Rating Updated.', '2018-04-22 23:40:23', NULL),
(1042, 35, 'Self Rating Updated.', '2018-04-22 23:40:24', NULL),
(1043, 35, 'Self Rating Updated.', '2018-04-22 23:40:24', NULL),
(1044, 35, 'Self Rating Updated.', '2018-04-22 23:40:24', NULL),
(1045, 35, 'Self Rating Updated.', '2018-04-22 23:40:24', NULL),
(1046, 35, 'Self Rating Updated.', '2018-04-22 23:40:24', NULL),
(1047, 35, 'Self Rating Updated.', '2018-04-22 23:40:24', NULL),
(1048, 35, 'Self Rating Updated.', '2018-04-22 23:40:26', NULL),
(1049, 35, 'Self Rating Updated.', '2018-04-22 23:40:26', NULL),
(1050, 35, 'Self Rating Updated.', '2018-04-22 23:40:26', NULL),
(1051, 35, 'Self Rating Updated.', '2018-04-22 23:40:26', NULL),
(1052, 35, 'Self Rating Updated.', '2018-04-22 23:40:26', NULL),
(1053, 35, 'Self Rating Updated.', '2018-04-22 23:40:26', NULL),
(1054, 35, 'Self Rating Updated.', '2018-04-22 23:40:26', NULL),
(1055, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1056, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1057, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1058, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1059, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1060, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1061, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1062, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1063, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1064, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1065, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1066, 35, 'Self Rating Updated.', '2018-04-22 23:40:27', NULL),
(1067, 35, 'Self Rating Updated.', '2018-04-22 23:40:28', NULL),
(1068, 35, 'Self Rating Updated.', '2018-04-22 23:40:28', NULL),
(1069, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1070, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1071, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1072, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1073, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1074, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1075, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1076, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1077, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1078, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1079, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1080, 35, 'Self Rating Updated.', '2018-04-22 23:40:30', NULL),
(1081, 35, 'Self Rating Updated.', '2018-04-22 23:40:31', NULL),
(1082, 35, 'Self Rating Updated.', '2018-04-22 23:40:31', NULL),
(1083, 35, 'Self Rating Updated.', '2018-04-22 23:40:31', NULL),
(1084, 35, 'Self Rating Updated.', '2018-04-22 23:40:31', NULL),
(1085, 35, 'Self Rating Updated.', '2018-04-22 23:40:31', NULL),
(1086, 35, 'Self Rating Updated.', '2018-04-22 23:40:31', NULL),
(1087, 35, 'Self Rating Updated.', '2018-04-22 23:40:33', NULL),
(1088, 35, 'Self Rating Updated.', '2018-04-22 23:40:33', NULL),
(1089, 35, 'Self Rating Updated.', '2018-04-22 23:40:33', NULL),
(1090, 35, 'Self Rating Updated.', '2018-04-22 23:40:33', NULL),
(1091, 35, 'Self Rating Updated.', '2018-04-22 23:40:33', NULL),
(1092, 35, 'Self Rating Updated.', '2018-04-22 23:40:33', NULL),
(1093, 35, 'Self Rating Updated.', '2018-04-22 23:40:33', NULL),
(1094, 35, 'Self Rating Updated.', '2018-04-22 23:40:33', NULL),
(1095, 35, 'Self Rating Updated.', '2018-04-22 23:40:33', NULL),
(1096, 35, 'Self Rating Updated.', '2018-04-22 23:40:33', NULL),
(1097, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1098, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1099, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1100, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1101, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1102, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1103, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1104, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1105, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1106, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1107, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1108, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1109, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1110, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1111, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1112, 35, 'Self Rating Updated.', '2018-04-22 23:40:34', NULL),
(1113, 35, 'Self Rating Updated.', '2018-04-22 23:40:35', NULL),
(1114, 35, 'Self Rating Updated.', '2018-04-22 23:40:35', NULL),
(1115, 35, 'Self Rating Updated.', '2018-04-22 23:40:35', NULL),
(1116, 35, 'Self Rating Updated.', '2018-04-22 23:40:35', NULL),
(1117, 35, 'Self Rating Updated.', '2018-04-22 23:40:37', NULL),
(1118, 35, 'Self Rating Updated.', '2018-04-22 23:40:37', NULL),
(1119, 35, 'Self Rating Updated.', '2018-04-22 23:40:37', NULL),
(1120, 35, 'Self Rating Updated.', '2018-04-22 23:40:37', NULL),
(1121, 35, 'Self Rating Updated.', '2018-04-22 23:40:37', NULL),
(1122, 35, 'Self Rating Updated.', '2018-04-22 23:40:37', NULL),
(1123, 35, 'Self Rating Updated.', '2018-04-22 23:40:37', NULL),
(1124, 35, 'Self Rating Updated.', '2018-04-22 23:40:37', NULL),
(1125, 35, 'Self Rating Updated.', '2018-04-22 23:40:37', NULL),
(1126, 35, 'Self Rating Updated.', '2018-04-22 23:40:39', NULL),
(1127, 35, 'Self Rating Updated.', '2018-04-22 23:40:39', NULL),
(1128, 35, 'Self Rating Updated.', '2018-04-22 23:40:39', NULL),
(1129, 35, 'Self Rating Updated.', '2018-04-22 23:40:39', NULL),
(1130, 35, 'Self Rating Updated.', '2018-04-22 23:40:40', NULL),
(1131, 35, 'Self Rating Updated.', '2018-04-22 23:40:40', NULL),
(1132, 35, 'Self Rating Updated.', '2018-04-22 23:40:40', NULL),
(1133, 35, 'Self Rating Updated.', '2018-04-22 23:40:40', NULL),
(1134, 35, 'Self Rating Updated.', '2018-04-22 23:40:40', NULL),
(1135, 35, 'Self Rating Updated.', '2018-04-22 23:40:40', NULL),
(1136, 35, 'Self Rating Updated.', '2018-04-22 23:40:40', NULL),
(1137, 35, 'Self Rating Updated.', '2018-04-22 23:40:40', NULL),
(1138, 35, 'Self Rating Updated.', '2018-04-22 23:40:40', NULL),
(1139, 35, 'Self Rating Updated.', '2018-04-22 23:40:40', NULL),
(1140, 35, 'Self Rating Updated.', '2018-04-22 23:40:40', NULL),
(1141, 35, 'Self Rating Updated.', '2018-04-22 23:40:41', NULL),
(1142, 35, 'Self Rating Updated.', '2018-04-22 23:40:41', NULL),
(1143, 35, 'Self Rating Updated.', '2018-04-22 23:40:41', NULL),
(1144, 35, 'Self Rating Updated.', '2018-04-22 23:40:43', NULL),
(1145, 35, 'Self Rating Updated.', '2018-04-22 23:40:43', NULL),
(1146, 35, 'Self Rating Updated.', '2018-04-22 23:40:43', NULL),
(1147, 35, 'Self Rating Updated.', '2018-04-22 23:40:43', NULL),
(1148, 35, 'Self Rating Updated.', '2018-04-22 23:40:43', NULL),
(1149, 35, 'Self Rating Updated.', '2018-04-22 23:40:43', NULL),
(1150, 35, 'Self Rating Updated.', '2018-04-22 23:40:43', NULL),
(1151, 35, 'Self Rating Updated.', '2018-04-22 23:40:43', NULL),
(1152, 35, 'Self Rating Updated.', '2018-04-22 23:40:43', NULL),
(1153, 35, 'Self Rating Updated.', '2018-04-22 23:40:43', NULL),
(1154, 35, 'Self Rating Updated.', '2018-04-22 23:40:43', NULL),
(1155, 35, 'Self Rating Updated.', '2018-04-22 23:40:44', NULL),
(1156, 35, 'Self Rating Updated.', '2018-04-22 23:40:44', NULL),
(1157, 35, 'Self Rating Updated.', '2018-04-22 23:40:44', NULL),
(1158, 35, 'Self Rating Updated.', '2018-04-22 23:40:44', NULL),
(1159, 35, 'Self Rating Updated.', '2018-04-22 23:40:44', NULL),
(1160, 35, 'Self Rating Updated.', '2018-04-22 23:40:44', NULL),
(1161, 35, 'Self Rating Updated.', '2018-04-22 23:40:44', NULL),
(1162, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1163, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1164, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1165, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1166, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1167, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1168, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1169, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1170, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1171, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1172, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1173, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1174, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1175, 35, 'Self Rating Updated.', '2018-04-22 23:40:45', NULL),
(1176, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1177, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1178, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1179, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1180, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1181, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1182, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1183, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1184, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1185, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1186, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1187, 35, 'Self Rating Updated.', '2018-04-22 23:40:46', NULL),
(1188, 35, 'Self Rating Updated.', '2018-04-22 23:40:47', NULL),
(1189, 35, 'Self Rating Updated.', '2018-04-22 23:40:47', NULL),
(1190, 35, 'Self Rating Updated.', '2018-04-22 23:40:47', NULL),
(1191, 35, 'Self Rating Updated.', '2018-04-22 23:40:47', NULL),
(1192, 35, 'Self Rating Updated.', '2018-04-22 23:40:47', NULL),
(1193, 35, 'Self Rating Updated.', '2018-04-22 23:40:47', NULL),
(1194, 35, 'Self Rating Updated.', '2018-04-22 23:40:47', NULL),
(1195, 35, 'Self Rating Updated.', '2018-04-22 23:40:47', NULL),
(1196, 35, 'Self Rating Updated.', '2018-04-22 23:40:47', NULL),
(1197, 35, 'Self Rating Updated.', '2018-04-22 23:40:47', NULL),
(1198, 35, 'Self Rating Updated.', '2018-04-22 23:40:47', NULL),
(1199, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1200, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1201, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1202, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1203, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1204, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1205, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1206, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1207, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1208, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1209, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1210, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1211, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1212, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1213, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1214, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1215, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1216, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1217, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1218, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1219, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1220, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1221, 35, 'Self Rating Updated.', '2018-04-22 23:40:48', NULL),
(1222, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1223, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1224, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1225, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1226, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1227, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1228, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1229, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1230, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1231, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1232, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1233, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1234, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1235, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1236, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1237, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1238, 35, 'Self Rating Updated.', '2018-04-22 23:40:49', NULL),
(1239, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1240, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1241, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1242, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1243, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1244, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1245, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1246, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1247, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1248, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1249, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1250, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1251, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1252, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1253, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1254, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1255, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1256, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1257, 35, 'Self Rating Updated.', '2018-04-22 23:40:50', NULL),
(1258, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1259, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1260, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1261, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1262, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1263, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1264, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1265, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1266, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1267, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1268, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1269, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1270, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1271, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1272, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1273, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1274, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1275, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1276, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1277, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1278, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1279, 35, 'Self Rating Updated.', '2018-04-22 23:40:51', NULL),
(1280, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1281, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1282, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1283, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1284, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1285, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1286, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1287, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1288, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1289, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1290, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1291, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1292, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1293, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1294, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1295, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1296, 35, 'Self Rating Updated.', '2018-04-22 23:40:52', NULL),
(1297, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1298, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1299, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1300, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1301, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1302, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1303, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1304, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1305, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1306, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1307, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1308, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1309, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1310, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1311, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1312, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1313, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1314, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1315, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1316, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1317, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1318, 35, 'Self Rating Updated.', '2018-04-22 23:40:53', NULL),
(1319, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1320, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1321, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1322, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1323, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1324, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1325, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1326, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1327, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1328, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1329, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1330, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1331, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1332, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1333, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1334, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1335, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1336, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1337, 35, 'Self Rating Updated.', '2018-04-22 23:40:54', NULL),
(1338, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1339, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1340, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1341, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1342, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1343, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1344, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1345, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1346, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1347, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1348, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1349, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1350, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1351, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1352, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1353, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1354, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1355, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1356, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1357, 35, 'Self Rating Updated.', '2018-04-22 23:40:55', NULL),
(1358, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1359, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1360, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1361, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1362, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1363, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1364, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1365, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1366, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1367, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1368, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1369, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1370, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1371, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1372, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1373, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1374, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1375, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1376, 35, 'Self Rating Updated.', '2018-04-22 23:40:56', NULL),
(1377, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1378, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1379, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1380, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1381, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1382, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1383, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1384, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1385, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1386, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1387, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1388, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1389, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1390, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1391, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1392, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1393, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1394, 35, 'Self Rating Updated.', '2018-04-22 23:40:57', NULL),
(1395, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1396, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1397, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1398, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1399, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1400, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1401, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1402, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1403, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1404, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1405, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1406, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1407, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1408, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1409, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1410, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1411, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1412, 35, 'Self Rating Updated.', '2018-04-22 23:40:58', NULL),
(1413, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1414, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1415, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1416, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1417, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1418, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1419, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1420, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1421, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1422, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1423, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1424, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1425, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1426, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1427, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1428, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1429, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1430, 35, 'Self Rating Updated.', '2018-04-22 23:40:59', NULL),
(1431, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1432, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1433, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1434, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1435, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1436, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1437, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1438, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1439, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1440, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1441, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1442, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1443, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1444, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1445, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1446, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1447, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1448, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1449, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1450, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1451, 35, 'Self Rating Updated.', '2018-04-22 23:41:00', NULL),
(1452, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1453, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1454, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1455, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1456, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1457, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1458, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1459, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1460, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1461, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1462, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1463, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1464, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1465, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1466, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1467, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1468, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1469, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1470, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1471, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1472, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1473, 35, 'Self Rating Updated.', '2018-04-22 23:41:01', NULL),
(1474, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1475, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1476, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1477, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1478, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1479, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1480, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1481, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1482, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1483, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1484, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1485, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1486, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1487, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1488, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1489, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1490, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1491, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1492, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1493, 35, 'Self Rating Updated.', '2018-04-22 23:41:02', NULL),
(1494, 35, 'Self Rating Updated.', '2018-04-22 23:41:03', NULL),
(1495, 35, 'Self Rating Updated.', '2018-04-22 23:41:03', NULL),
(1496, 35, 'Self Rating Updated.', '2018-04-22 23:41:05', NULL),
(1497, 35, 'Self Rating Updated.', '2018-04-22 23:41:05', NULL),
(1498, 35, 'Self Rating Updated.', '2018-04-22 23:41:05', NULL),
(1499, 35, 'Self Rating Updated.', '2018-04-22 23:41:05', NULL),
(1500, 35, 'Self Rating Updated.', '2018-04-22 23:41:05', NULL),
(1501, 35, 'Self Rating Updated.', '2018-04-22 23:41:05', NULL),
(1502, 35, 'Self Rating Updated.', '2018-04-22 23:41:05', NULL),
(1503, 35, 'Self Rating Updated.', '2018-04-22 23:41:05', NULL),
(1504, 35, 'Self Rating Updated.', '2018-04-22 23:41:05', NULL),
(1505, 35, 'Self Rating Updated.', '2018-04-22 23:41:06', NULL),
(1506, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1507, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1508, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1509, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1510, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1511, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1512, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1513, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1514, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1515, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1516, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1517, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1518, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1519, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1520, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1521, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1522, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1523, 35, 'Self Rating Updated.', '2018-04-22 23:41:07', NULL),
(1524, 35, 'Self Rating Updated.', '2018-04-22 23:41:08', NULL),
(1525, 35, 'Self Rating Updated.', '2018-04-22 23:41:08', NULL),
(1526, 35, 'Self Rating Updated.', '2018-04-22 23:41:08', NULL),
(1527, 35, 'Self Rating Updated.', '2018-04-22 23:41:08', NULL),
(1528, 35, 'Self Rating Updated.', '2018-04-22 23:41:08', NULL),
(1529, 35, 'Self Rating Updated.', '2018-04-22 23:41:08', NULL),
(1530, 35, 'Self Rating Updated.', '2018-04-22 23:41:08', NULL),
(1531, 35, 'Self Rating Updated.', '2018-04-22 23:41:08', NULL),
(1532, 35, 'Self Rating Updated.', '2018-04-22 23:41:08', NULL),
(1533, 35, 'Self Rating Updated.', '2018-04-22 23:41:09', NULL),
(1534, 35, 'Self Rating Updated.', '2018-04-22 23:41:09', NULL),
(1535, 35, 'Self Rating Updated.', '2018-04-22 23:41:09', NULL),
(1536, 35, 'Self Rating Updated.', '2018-04-22 23:41:09', NULL),
(1537, 35, 'Self Rating Updated.', '2018-04-22 23:41:09', NULL),
(1538, 35, 'Self Rating Updated.', '2018-04-22 23:41:09', NULL),
(1539, 35, 'Self Rating Updated.', '2018-04-22 23:41:10', NULL),
(1540, 35, 'Self Rating Updated.', '2018-04-22 23:41:10', NULL),
(1541, 35, 'Self Rating Updated.', '2018-04-22 23:41:10', NULL),
(1542, 35, 'Self Rating Updated.', '2018-04-22 23:41:10', NULL),
(1543, 35, 'Self Rating Updated.', '2018-04-22 23:41:10', NULL),
(1544, 35, 'Self Rating Updated.', '2018-04-22 23:41:10', NULL),
(1545, 35, 'Self Rating Updated.', '2018-04-22 23:41:11', NULL),
(1546, 35, 'Self Rating Updated.', '2018-04-22 23:41:11', NULL),
(1547, 35, 'Self Rating Updated.', '2018-04-22 23:41:11', NULL),
(1548, 35, 'Self Rating Updated.', '2018-04-22 23:41:11', NULL),
(1549, 35, 'Self Rating Updated.', '2018-04-22 23:41:11', NULL),
(1550, 35, 'Self Rating Updated.', '2018-04-22 23:41:11', NULL),
(1551, 35, 'Self Rating Updated.', '2018-04-22 23:41:11', NULL),
(1552, 35, 'Self Rating Updated.', '2018-04-22 23:41:11', NULL),
(1553, 35, 'Self Rating Updated.', '2018-04-22 23:41:11', NULL),
(1554, 35, 'Self Rating Updated.', '2018-04-22 23:41:12', NULL),
(1555, 35, 'Self Rating Updated.', '2018-04-22 23:41:12', NULL),
(1556, 35, 'Self Rating Updated.', '2018-04-22 23:41:12', NULL),
(1557, 35, 'Self Rating Updated.', '2018-04-22 23:41:12', NULL),
(1558, 35, 'Self Rating Updated.', '2018-04-22 23:41:12', NULL),
(1559, 35, 'Self Rating Updated.', '2018-04-22 23:41:12', NULL),
(1560, 35, 'Self Rating Updated.', '2018-04-22 23:41:12', NULL),
(1561, 35, 'Self Rating Updated.', '2018-04-22 23:41:12', NULL),
(1562, 35, 'Self Rating Updated.', '2018-04-22 23:41:12', NULL),
(1563, 35, 'Self Rating Updated.', '2018-04-22 23:41:12', NULL),
(1564, 35, 'Rated on Sushant Rajpoot profile', '2018-04-22 23:43:42', NULL),
(1565, 28, 'Rated on Preeti Singh profile', '2018-04-23 05:23:48', NULL),
(1566, 35, 'Work Experience Updated.', '2018-04-23 05:24:51', NULL),
(1567, 35, 'Work Experience Updated.', '2018-04-23 05:25:04', NULL),
(1568, 28, 'Rated on Preeti Singh profile', '2018-04-23 05:25:16', NULL),
(1569, 28, 'Rated on Preeti Singh profile', '2018-04-24 07:35:10', NULL),
(1570, 28, 'Rated on Preeti Singh profile', '2018-04-24 07:40:47', NULL),
(1571, 28, 'Rated on Preeti Singh profile', '2018-04-24 08:03:13', NULL),
(1572, 28, 'Self Rating Updated.', '2018-04-24 08:59:48', NULL),
(1573, 28, 'Self Rating Updated.', '2018-04-24 08:59:48', NULL),
(1574, 28, 'Self Rating Updated.', '2018-04-24 09:00:46', NULL),
(1575, 28, 'Self Rating Updated.', '2018-04-24 09:00:50', NULL),
(1576, 28, 'Self Rating Updated.', '2018-04-24 09:00:50', NULL),
(1577, 28, 'Self Rating Updated.', '2018-04-24 09:00:51', NULL),
(1578, 28, 'Self Rating Updated.', '2018-04-24 09:00:51', NULL),
(1579, 28, 'Self Rating Updated.', '2018-04-24 09:00:53', NULL),
(1580, 28, 'Self Rating Updated.', '2018-04-24 09:00:53', NULL),
(1581, 28, 'Self Rating Updated.', '2018-04-24 09:00:55', NULL),
(1582, 28, 'Self Rating Updated.', '2018-04-24 09:00:55', NULL),
(1583, 28, 'Self Rating Updated.', '2018-04-24 09:00:55', NULL),
(1584, 28, 'Self Rating Updated.', '2018-04-24 09:00:55', NULL),
(1585, 28, 'Self Rating Updated.', '2018-04-24 09:01:09', NULL),
(1586, 28, 'Self Rating Updated.', '2018-04-24 09:01:11', NULL),
(1587, 28, 'Self Rating Updated.', '2018-04-24 09:01:13', NULL),
(1588, 28, 'Self Rating Updated.', '2018-04-24 09:01:15', NULL),
(1589, 28, 'Self Rating Updated.', '2018-04-24 09:02:05', NULL),
(1590, 28, 'Self Rating Updated.', '2018-04-24 09:02:05', NULL),
(1591, 28, 'Self Rating Updated.', '2018-04-24 09:02:05', NULL),
(1592, 28, 'Self Rating Updated.', '2018-04-24 09:02:05', NULL),
(1593, 28, 'Self Rating Updated.', '2018-04-24 09:02:05', NULL),
(1594, 28, 'Self Rating Updated.', '2018-04-24 09:02:05', NULL),
(1595, 28, 'Self Rating Updated.', '2018-04-24 09:02:05', NULL),
(1596, 28, 'Self Rating Updated.', '2018-04-24 09:02:14', NULL),
(1597, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1598, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1599, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1600, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1601, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1602, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1603, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1604, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1605, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1606, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1607, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1608, 28, 'Self Rating Updated.', '2018-04-24 09:02:16', NULL),
(1609, 28, 'Self Rating Updated.', '2018-04-24 09:02:28', NULL),
(1610, 28, 'Self Rating Updated.', '2018-04-24 09:35:55', NULL),
(1611, 28, 'Self Rating Updated.', '2018-04-24 09:35:55', NULL),
(1612, 28, 'Self Rating Updated.', '2018-04-24 09:35:55', NULL),
(1613, 28, 'Self Rating Updated.', '2018-04-24 09:36:03', NULL),
(1614, 28, 'Self Rating Updated.', '2018-04-24 09:36:03', NULL),
(1615, 28, 'Self Rating Updated.', '2018-04-24 09:36:03', NULL),
(1616, 28, 'Self Rating Updated.', '2018-04-24 09:37:57', NULL),
(1617, 28, 'Self Rating Updated.', '2018-04-24 09:37:57', NULL),
(1618, 28, 'Self Rating Updated.', '2018-04-24 09:38:01', NULL),
(1619, 28, 'Rated on Preeti Singh profile', '2018-04-24 10:25:20', NULL),
(1620, 28, 'Rated on Preeti Singh profile', '2018-04-24 10:27:26', NULL),
(1621, 28, 'Rated on Preeti Singh profile', '2018-04-24 11:14:18', NULL),
(1622, 28, 'Rated on Preeti Singh profile', '2018-04-24 11:21:23', NULL),
(1623, 28, 'Rated on Preeti Singh profile', '2018-04-24 11:21:54', NULL),
(1624, 28, 'Rated on Preeti Singh profile', '2018-04-24 11:31:00', NULL),
(1625, 36, 'Self Rating Updated.', '2018-04-24 11:43:12', NULL),
(1626, 36, 'Self Rating Updated.', '2018-04-24 11:43:12', NULL),
(1627, 36, 'Self Rating Updated.', '2018-04-24 11:43:12', NULL),
(1628, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1629, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1630, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1631, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1632, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1633, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1634, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1635, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1636, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1637, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1638, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1639, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1640, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1641, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1642, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1643, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1644, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1645, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1646, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1647, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1648, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1649, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1650, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1651, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1652, 36, 'Self Rating Updated.', '2018-04-24 11:43:13', NULL),
(1653, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1654, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1655, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1656, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1657, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1658, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1659, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1660, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1661, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1662, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1663, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1664, 36, 'Self Rating Updated.', '2018-04-24 11:43:14', NULL),
(1665, 36, 'Self Rating Updated.', '2018-04-24 11:43:16', NULL),
(1666, 36, 'Self Rating Updated.', '2018-04-24 11:43:16', NULL),
(1667, 36, 'Self Rating Updated.', '2018-04-24 11:43:16', NULL),
(1668, 36, 'Self Rating Updated.', '2018-04-24 11:43:16', NULL),
(1669, 36, 'Self Rating Updated.', '2018-04-24 11:43:16', NULL),
(1670, 36, 'Self Rating Updated.', '2018-04-24 11:43:16', NULL),
(1671, 36, 'Self Rating Updated.', '2018-04-24 11:43:19', NULL),
(1672, 36, 'Self Rating Updated.', '2018-04-24 11:43:19', NULL);
INSERT INTO `user_profile_logs` (`id`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(1673, 36, 'Self Rating Updated.', '2018-04-24 11:43:19', NULL),
(1674, 36, 'Self Rating Updated.', '2018-04-24 11:43:19', NULL),
(1675, 36, 'Self Rating Updated.', '2018-04-24 11:43:19', NULL),
(1676, 36, 'Self Rating Updated.', '2018-04-24 11:43:20', NULL),
(1677, 36, 'Self Rating Updated.', '2018-04-24 11:43:20', NULL),
(1678, 36, 'Self Rating Updated.', '2018-04-24 11:43:20', NULL),
(1679, 36, 'Self Rating Updated.', '2018-04-24 11:43:20', NULL),
(1680, 36, 'Self Rating Updated.', '2018-04-24 11:43:20', NULL),
(1681, 36, 'Self Rating Updated.', '2018-04-24 11:43:20', NULL),
(1682, 36, 'Self Rating Updated.', '2018-04-24 11:43:20', NULL),
(1683, 36, 'Self Rating Updated.', '2018-04-24 11:43:20', NULL),
(1684, 36, 'Self Rating Updated.', '2018-04-24 11:43:20', NULL),
(1685, 36, 'Self Rating Updated.', '2018-04-24 11:43:23', NULL),
(1686, 36, 'Self Rating Updated.', '2018-04-24 11:43:23', NULL),
(1687, 36, 'Self Rating Updated.', '2018-04-24 11:43:23', NULL),
(1688, 36, 'Self Rating Updated.', '2018-04-24 11:43:23', NULL),
(1689, 36, 'Self Rating Updated.', '2018-04-24 11:43:24', NULL),
(1690, 36, 'Self Rating Updated.', '2018-04-24 11:43:24', NULL),
(1691, 36, 'Self Rating Updated.', '2018-04-24 11:43:24', NULL),
(1692, 36, 'Self Rating Updated.', '2018-04-24 11:43:24', NULL),
(1693, 36, 'Self Rating Updated.', '2018-04-24 11:43:24', NULL),
(1694, 36, 'Self Rating Updated.', '2018-04-24 11:43:24', NULL),
(1695, 36, 'Self Rating Updated.', '2018-04-24 11:43:24', NULL),
(1696, 36, 'Self Rating Updated.', '2018-04-24 11:43:25', NULL),
(1697, 36, 'Self Rating Updated.', '2018-04-24 11:43:25', NULL),
(1698, 36, 'Self Rating Updated.', '2018-04-24 11:43:25', NULL),
(1699, 36, 'Self Rating Updated.', '2018-04-24 11:43:25', NULL),
(1700, 36, 'Self Rating Updated.', '2018-04-24 11:43:25', NULL),
(1701, 36, 'Self Rating Updated.', '2018-04-24 11:43:25', NULL),
(1702, 36, 'Self Rating Updated.', '2018-04-24 11:43:25', NULL),
(1703, 36, 'Self Rating Updated.', '2018-04-24 11:43:25', NULL),
(1704, 36, 'Self Rating Updated.', '2018-04-24 11:43:25', NULL),
(1705, 36, 'Self Rating Updated.', '2018-04-24 11:43:25', NULL),
(1706, 36, 'Self Rating Updated.', '2018-04-24 11:43:26', NULL),
(1707, 36, 'Self Rating Updated.', '2018-04-24 11:43:26', NULL),
(1708, 36, 'Self Rating Updated.', '2018-04-24 11:43:26', NULL),
(1709, 36, 'Self Rating Updated.', '2018-04-24 11:43:28', NULL),
(1710, 36, 'Self Rating Updated.', '2018-04-24 11:43:28', NULL),
(1711, 36, 'Self Rating Updated.', '2018-04-24 11:43:28', NULL),
(1712, 36, 'Self Rating Updated.', '2018-04-24 11:43:28', NULL),
(1713, 36, 'Self Rating Updated.', '2018-04-24 11:43:30', NULL),
(1714, 36, 'Self Rating Updated.', '2018-04-24 11:43:30', NULL),
(1715, 36, 'Self Rating Updated.', '2018-04-24 11:43:30', NULL),
(1716, 36, 'Self Rating Updated.', '2018-04-24 11:43:30', NULL),
(1717, 36, 'Self Rating Updated.', '2018-04-24 11:43:30', NULL),
(1718, 36, 'Self Rating Updated.', '2018-04-24 11:43:30', NULL),
(1719, 36, 'Self Rating Updated.', '2018-04-24 11:43:30', NULL),
(1720, 36, 'Self Rating Updated.', '2018-04-24 11:43:30', NULL),
(1721, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1722, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1723, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1724, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1725, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1726, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1727, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1728, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1729, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1730, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1731, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1732, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1733, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1734, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1735, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1736, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1737, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1738, 36, 'Self Rating Updated.', '2018-04-24 11:43:31', NULL),
(1739, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1740, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1741, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1742, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1743, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1744, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1745, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1746, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1747, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1748, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1749, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1750, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1751, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1752, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1753, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1754, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1755, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1756, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1757, 36, 'Self Rating Updated.', '2018-04-24 11:43:32', NULL),
(1758, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1759, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1760, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1761, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1762, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1763, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1764, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1765, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1766, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1767, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1768, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1769, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1770, 36, 'Self Rating Updated.', '2018-04-24 11:43:35', NULL),
(1771, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1772, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1773, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1774, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1775, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1776, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1777, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1778, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1779, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1780, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1781, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1782, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1783, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1784, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1785, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1786, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1787, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1788, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1789, 36, 'Self Rating Updated.', '2018-04-24 11:43:36', NULL),
(1790, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1791, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1792, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1793, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1794, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1795, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1796, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1797, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1798, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1799, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1800, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1801, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1802, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1803, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1804, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1805, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1806, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1807, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1808, 36, 'Self Rating Updated.', '2018-04-24 11:43:37', NULL),
(1809, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1810, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1811, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1812, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1813, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1814, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1815, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1816, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1817, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1818, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1819, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1820, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1821, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1822, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1823, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1824, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1825, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1826, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1827, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1828, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1829, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1830, 36, 'Self Rating Updated.', '2018-04-24 11:43:38', NULL),
(1831, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1832, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1833, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1834, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1835, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1836, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1837, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1838, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1839, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1840, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1841, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1842, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1843, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1844, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1845, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1846, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1847, 36, 'Self Rating Updated.', '2018-04-24 11:43:39', NULL),
(1848, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1849, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1850, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1851, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1852, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1853, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1854, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1855, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1856, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1857, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1858, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1859, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1860, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1861, 36, 'Self Rating Updated.', '2018-04-24 11:43:47', NULL),
(1862, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1863, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1864, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1865, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1866, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1867, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1868, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1869, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1870, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1871, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1872, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1873, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1874, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1875, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1876, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1877, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1878, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1879, 36, 'Self Rating Updated.', '2018-04-24 11:43:48', NULL),
(1880, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1881, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1882, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1883, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1884, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1885, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1886, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1887, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1888, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1889, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1890, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1891, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1892, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1893, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1894, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1895, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1896, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1897, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1898, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1899, 36, 'Self Rating Updated.', '2018-04-24 11:43:49', NULL),
(1900, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1901, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1902, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1903, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1904, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1905, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1906, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1907, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1908, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1909, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1910, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1911, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1912, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1913, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1914, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1915, 36, 'Self Rating Updated.', '2018-04-24 11:43:50', NULL),
(1916, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1917, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1918, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1919, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1920, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1921, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1922, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1923, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1924, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1925, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1926, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1927, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1928, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1929, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1930, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1931, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1932, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1933, 36, 'Self Rating Updated.', '2018-04-24 11:43:51', NULL),
(1934, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1935, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1936, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1937, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1938, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1939, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1940, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1941, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1942, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1943, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1944, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1945, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1946, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1947, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1948, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1949, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1950, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1951, 36, 'Self Rating Updated.', '2018-04-24 11:43:52', NULL),
(1952, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1953, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1954, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1955, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1956, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1957, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1958, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1959, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1960, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1961, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1962, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1963, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1964, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1965, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1966, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1967, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1968, 36, 'Self Rating Updated.', '2018-04-24 11:43:53', NULL),
(1969, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1970, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1971, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1972, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1973, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1974, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1975, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1976, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1977, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1978, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1979, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1980, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1981, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1982, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1983, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1984, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1985, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1986, 36, 'Self Rating Updated.', '2018-04-24 11:43:54', NULL),
(1987, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1988, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1989, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1990, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1991, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1992, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1993, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1994, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1995, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1996, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1997, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1998, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(1999, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(2000, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(2001, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(2002, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(2003, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(2004, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(2005, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(2006, 36, 'Self Rating Updated.', '2018-04-24 11:43:55', NULL),
(2007, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2008, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2009, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2010, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2011, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2012, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2013, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2014, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2015, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2016, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2017, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2018, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2019, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2020, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2021, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2022, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2023, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2024, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2025, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2026, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2027, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2028, 36, 'Self Rating Updated.', '2018-04-24 11:43:56', NULL),
(2029, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2030, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2031, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2032, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2033, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2034, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2035, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2036, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2037, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2038, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2039, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2040, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2041, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2042, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2043, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2044, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2045, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2046, 36, 'Self Rating Updated.', '2018-04-24 11:43:57', NULL),
(2047, 36, 'Self Rating Updated.', '2018-04-24 11:43:58', NULL),
(2048, 36, 'Self Rating Updated.', '2018-04-24 11:43:58', NULL),
(2049, 36, 'Self Rating Updated.', '2018-04-24 11:43:58', NULL),
(2050, 36, 'Self Rating Updated.', '2018-04-24 11:43:58', NULL),
(2051, 36, 'Self Rating Updated.', '2018-04-24 11:43:58', NULL),
(2052, 36, 'Self Rating Updated.', '2018-04-24 11:43:58', NULL),
(2053, 36, 'Self Rating Updated.', '2018-04-24 11:43:58', NULL),
(2054, 36, 'Self Rating Updated.', '2018-04-24 11:43:58', NULL),
(2055, 36, 'Self Rating Updated.', '2018-04-24 11:43:58', NULL),
(2056, 36, 'Self Rating Updated.', '2018-04-24 11:43:58', NULL),
(2057, 36, 'Self Rating Updated.', '2018-04-24 11:43:58', NULL),
(2058, 36, 'Self Rating Updated.', '2018-04-24 11:49:25', NULL),
(2059, 36, 'Self Rating Updated.', '2018-04-24 11:49:25', NULL),
(2060, 36, 'Self Rating Updated.', '2018-04-24 11:49:25', NULL),
(2061, 36, 'Self Rating Updated.', '2018-04-24 11:49:25', NULL),
(2062, 36, 'Self Rating Updated.', '2018-04-24 11:49:25', NULL),
(2063, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2064, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2065, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2066, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2067, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2068, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2069, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2070, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2071, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2072, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2073, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2074, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2075, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2076, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2077, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2078, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2079, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2080, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2081, 36, 'Self Rating Updated.', '2018-04-24 11:49:26', NULL),
(2082, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2083, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2084, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2085, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2086, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2087, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2088, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2089, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2090, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2091, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2092, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2093, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2094, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2095, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2096, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2097, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2098, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2099, 36, 'Self Rating Updated.', '2018-04-24 11:49:27', NULL),
(2100, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2101, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2102, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2103, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2104, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2105, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2106, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2107, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2108, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2109, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2110, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2111, 36, 'Self Rating Updated.', '2018-04-24 11:49:28', NULL),
(2112, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2113, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2114, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2115, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2116, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2117, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2118, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2119, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2120, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2121, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2122, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2123, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2124, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2125, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2126, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2127, 36, 'Self Rating Updated.', '2018-04-24 11:49:29', NULL),
(2128, 36, 'Self Rating Updated.', '2018-04-24 11:49:30', NULL),
(2129, 36, 'Self Rating Updated.', '2018-04-24 11:49:34', NULL),
(2130, 36, 'Self Rating Updated.', '2018-04-24 11:49:34', NULL),
(2131, 36, 'Self Rating Updated.', '2018-04-24 11:49:34', NULL),
(2132, 36, 'Self Rating Updated.', '2018-04-24 11:49:34', NULL),
(2133, 36, 'Self Rating Updated.', '2018-04-24 11:49:34', NULL),
(2134, 36, 'Self Rating Updated.', '2018-04-24 11:49:34', NULL),
(2135, 36, 'Self Rating Updated.', '2018-04-24 11:49:35', NULL),
(2136, 36, 'Self Rating Updated.', '2018-04-24 11:49:35', NULL),
(2137, 36, 'Self Rating Updated.', '2018-04-24 11:49:35', NULL),
(2138, 36, 'Self Rating Updated.', '2018-04-24 11:49:35', NULL),
(2139, 36, 'Self Rating Updated.', '2018-04-24 11:49:35', NULL),
(2140, 36, 'Self Rating Updated.', '2018-04-24 11:49:35', NULL),
(2141, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2142, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2143, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2144, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2145, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2146, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2147, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2148, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2149, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2150, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2151, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2152, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2153, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2154, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2155, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2156, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2157, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2158, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2159, 36, 'Self Rating Updated.', '2018-04-24 11:49:36', NULL),
(2160, 36, 'Self Rating Updated.', '2018-04-24 11:49:37', NULL),
(2161, 36, 'Self Rating Updated.', '2018-04-24 11:49:37', NULL),
(2162, 36, 'Self Rating Updated.', '2018-04-24 11:49:37', NULL),
(2163, 36, 'Self Rating Updated.', '2018-04-24 11:49:37', NULL),
(2164, 36, 'Self Rating Updated.', '2018-04-24 11:49:37', NULL),
(2165, 36, 'Self Rating Updated.', '2018-04-24 11:49:37', NULL),
(2166, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2167, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2168, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2169, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2170, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2171, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2172, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2173, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2174, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2175, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2176, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2177, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2178, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2179, 36, 'Self Rating Updated.', '2018-04-24 11:49:40', NULL),
(2180, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2181, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2182, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2183, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2184, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2185, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2186, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2187, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2188, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2189, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2190, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2191, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2192, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2193, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2194, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2195, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2196, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2197, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2198, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2199, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2200, 36, 'Self Rating Updated.', '2018-04-24 11:49:41', NULL),
(2201, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2202, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2203, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2204, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2205, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2206, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2207, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2208, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2209, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2210, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2211, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2212, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2213, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2214, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2215, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2216, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2217, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2218, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2219, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2220, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2221, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2222, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2223, 36, 'Self Rating Updated.', '2018-04-24 11:49:42', NULL),
(2224, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2225, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2226, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2227, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2228, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2229, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2230, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2231, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2232, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2233, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2234, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2235, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2236, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2237, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2238, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2239, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2240, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2241, 36, 'Self Rating Updated.', '2018-04-24 11:49:43', NULL),
(2242, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2243, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2244, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2245, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2246, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2247, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2248, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2249, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2250, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2251, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2252, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2253, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2254, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2255, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2256, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2257, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2258, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2259, 36, 'Self Rating Updated.', '2018-04-24 11:49:44', NULL),
(2260, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2261, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2262, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2263, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2264, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2265, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2266, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2267, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2268, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2269, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2270, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2271, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2272, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2273, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2274, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2275, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2276, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2277, 36, 'Self Rating Updated.', '2018-04-24 11:49:45', NULL),
(2278, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2279, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2280, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2281, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2282, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2283, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2284, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2285, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2286, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2287, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2288, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2289, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2290, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2291, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2292, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2293, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2294, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2295, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2296, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2297, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2298, 36, 'Self Rating Updated.', '2018-04-24 11:49:46', NULL),
(2299, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2300, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2301, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2302, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2303, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2304, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2305, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2306, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2307, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2308, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2309, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2310, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2311, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2312, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2313, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2314, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2315, 36, 'Self Rating Updated.', '2018-04-24 11:49:47', NULL),
(2316, 36, 'Self Rating Updated.', '2018-04-24 11:49:49', NULL),
(2317, 36, 'Self Rating Updated.', '2018-04-24 11:49:49', NULL),
(2318, 36, 'Self Rating Updated.', '2018-04-24 11:49:49', NULL),
(2319, 36, 'Self Rating Updated.', '2018-04-24 11:50:07', NULL),
(2320, 36, 'Self Rating Updated.', '2018-04-24 11:50:07', NULL),
(2321, 36, 'Self Rating Updated.', '2018-04-24 11:50:07', NULL),
(2322, 36, 'Self Rating Updated.', '2018-04-24 11:50:07', NULL),
(2323, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2324, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2325, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2326, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2327, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2328, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2329, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2330, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2331, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2332, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2333, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2334, 36, 'Self Rating Updated.', '2018-04-24 11:50:08', NULL),
(2335, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2336, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2337, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2338, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2339, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2340, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2341, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2342, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2343, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2344, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2345, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2346, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2347, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2348, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2349, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2350, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2351, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2352, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2353, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2354, 36, 'Self Rating Updated.', '2018-04-24 11:50:09', NULL),
(2355, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2356, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2357, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2358, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2359, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2360, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2361, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2362, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2363, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2364, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2365, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2366, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2367, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2368, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2369, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2370, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2371, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2372, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2373, 36, 'Self Rating Updated.', '2018-04-24 11:50:10', NULL),
(2374, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2375, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2376, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2377, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2378, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2379, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2380, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2381, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2382, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2383, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2384, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2385, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2386, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2387, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2388, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2389, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2390, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2391, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2392, 36, 'Self Rating Updated.', '2018-04-24 11:50:11', NULL),
(2393, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2394, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2395, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2396, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2397, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2398, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2399, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2400, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2401, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2402, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2403, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2404, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2405, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2406, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2407, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2408, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2409, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2410, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2411, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2412, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2413, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2414, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2415, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2416, 36, 'Self Rating Updated.', '2018-04-24 11:50:12', NULL),
(2417, 36, 'Self Rating Updated.', '2018-04-24 11:50:13', NULL),
(2418, 36, 'Self Rating Updated.', '2018-04-24 11:50:13', NULL),
(2419, 36, 'Self Rating Updated.', '2018-04-24 11:50:13', NULL),
(2420, 36, 'Self Rating Updated.', '2018-04-24 11:50:13', NULL),
(2421, 36, 'Self Rating Updated.', '2018-04-24 11:50:13', NULL),
(2422, 36, 'Self Rating Updated.', '2018-04-24 11:50:13', NULL),
(2423, 36, 'Self Rating Updated.', '2018-04-24 11:50:13', NULL),
(2424, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2425, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2426, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2427, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2428, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2429, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2430, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2431, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2432, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2433, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2434, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2435, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2436, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2437, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2438, 36, 'Self Rating Updated.', '2018-04-24 11:50:58', NULL),
(2439, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2440, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2441, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2442, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2443, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2444, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2445, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2446, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2447, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2448, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2449, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2450, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2451, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2452, 36, 'Self Rating Updated.', '2018-04-24 11:50:59', NULL),
(2453, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2454, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2455, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2456, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2457, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2458, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2459, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2460, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2461, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2462, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2463, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2464, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL);
INSERT INTO `user_profile_logs` (`id`, `user_id`, `activity`, `created_at`, `updated_at`) VALUES
(2465, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2466, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2467, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2468, 36, 'Self Rating Updated.', '2018-04-24 11:51:00', NULL),
(2469, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2470, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2471, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2472, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2473, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2474, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2475, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2476, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2477, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2478, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2479, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2480, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2481, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2482, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2483, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2484, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2485, 36, 'Self Rating Updated.', '2018-04-24 11:51:01', NULL),
(2486, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2487, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2488, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2489, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2490, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2491, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2492, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2493, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2494, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2495, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2496, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2497, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2498, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2499, 36, 'Self Rating Updated.', '2018-04-24 11:51:02', NULL),
(2500, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2501, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2502, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2503, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2504, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2505, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2506, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2507, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2508, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2509, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2510, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2511, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2512, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2513, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2514, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2515, 36, 'Self Rating Updated.', '2018-04-24 11:51:03', NULL),
(2516, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2517, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2518, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2519, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2520, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2521, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2522, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2523, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2524, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2525, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2526, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2527, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2528, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2529, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2530, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2531, 36, 'Self Rating Updated.', '2018-04-24 11:51:04', NULL),
(2532, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2533, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2534, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2535, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2536, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2537, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2538, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2539, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2540, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2541, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2542, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2543, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2544, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2545, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2546, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2547, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2548, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2549, 36, 'Self Rating Updated.', '2018-04-24 11:51:05', NULL),
(2550, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2551, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2552, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2553, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2554, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2555, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2556, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2557, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2558, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2559, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2560, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2561, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2562, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2563, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2564, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2565, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2566, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2567, 36, 'Self Rating Updated.', '2018-04-24 11:51:06', NULL),
(2568, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2569, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2570, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2571, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2572, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2573, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2574, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2575, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2576, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2577, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2578, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2579, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2580, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2581, 36, 'Self Rating Updated.', '2018-04-24 11:51:07', NULL),
(2582, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2583, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2584, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2585, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2586, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2587, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2588, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2589, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2590, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2591, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2592, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2593, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2594, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2595, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2596, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2597, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2598, 36, 'Self Rating Updated.', '2018-04-24 11:51:08', NULL),
(2599, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2600, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2601, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2602, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2603, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2604, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2605, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2606, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2607, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2608, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2609, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2610, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2611, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2612, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2613, 36, 'Self Rating Updated.', '2018-04-24 11:51:09', NULL),
(2614, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2615, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2616, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2617, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2618, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2619, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2620, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2621, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2622, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2623, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2624, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2625, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2626, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2627, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2628, 36, 'Self Rating Updated.', '2018-04-24 11:51:10', NULL),
(2629, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2630, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2631, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2632, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2633, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2634, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2635, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2636, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2637, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2638, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2639, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2640, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2641, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2642, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2643, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2644, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2645, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2646, 36, 'Self Rating Updated.', '2018-04-24 11:51:11', NULL),
(2647, 36, 'Self Rating Updated.', '2018-04-24 11:51:12', NULL),
(2648, 36, 'Self Rating Updated.', '2018-04-24 11:51:12', NULL),
(2649, 28, 'Rated on Preeti Singh profile', '2018-04-24 12:02:35', NULL),
(2650, 28, 'Rated on Preeti Singh profile', '2018-04-24 12:02:40', NULL),
(2651, 28, 'Rated on Preeti Singh profile', '2018-04-24 12:04:13', NULL),
(2652, 28, 'Rated on Preeti Singh profile', '2018-04-24 12:04:17', NULL),
(2653, 28, 'Rated on Preeti Singh profile', '2018-04-24 12:19:05', NULL),
(2654, 28, 'Rated on Preeti Singh profile', '2018-04-24 12:24:49', NULL),
(2655, 28, 'Rated on Preeti Singh profile', '2018-04-24 12:27:39', NULL),
(2656, 28, 'Rated on Preeti Singh profile', '2018-04-24 12:57:27', NULL),
(2657, 28, 'Rated on Preeti Singh profile', '2018-04-24 12:58:16', NULL),
(2658, 33, 'Rated on Hewlett Packard profile', '2018-04-24 13:12:04', NULL),
(2659, 33, 'Rated on Hewlett Packard profile', '2018-04-24 13:12:55', NULL),
(2660, 36, 'Rated on Anjali Srivastava profile', '2018-05-04 12:50:00', NULL),
(2661, 33, 'Profile Updated.', '2018-05-07 10:12:33', NULL),
(2662, 31, 'Profile Updated.', '2018-05-08 08:39:46', NULL),
(2663, 39, 'Profile Updated.', '2018-05-08 14:57:13', NULL),
(2664, 39, 'Rated on Saurabh Shukla profile', '2018-05-10 08:20:07', NULL),
(2665, 35, 'Rated on Sushant Rajpoot profile', '2018-05-10 08:21:37', NULL),
(2666, 31, 'Rated on Microsoft Corporation profile', '2018-05-10 08:25:12', NULL),
(2667, 35, 'Rated on Sushant Rajpoot profile', '2018-05-10 08:28:05', NULL),
(2668, 32, 'Rated on Raveena Nigam profile', '2018-05-10 08:35:52', NULL),
(2669, 32, 'Rated on Raveena Nigam profile', '2018-05-10 08:36:22', NULL),
(2670, 36, 'Rated on Anjali Srivastava profile', '2018-05-10 08:43:00', NULL),
(2671, 34, 'Rated on  profile', '2018-05-10 09:35:14', NULL),
(2672, 34, 'Rated on  profile', '2018-05-10 09:36:28', NULL),
(2673, 34, 'Rated on  profile', '2018-05-10 09:37:48', NULL),
(2674, 28, 'Rated on Preeti Singh profile', '2018-05-15 16:21:24', NULL),
(2675, 32, 'Rated on Raveena Nigam profile', '2018-05-16 11:35:12', NULL),
(2676, 32, 'Rated on Raveena Nigam profile', '2018-05-16 11:37:49', NULL),
(2677, 28, 'Rated on Preeti Singh profile', '2018-05-16 11:39:18', NULL),
(2678, 36, 'New Work Experience Added.', '2018-05-16 16:29:40', NULL),
(2679, 36, 'Rated on Anjali Srivastava profile', '2018-05-17 15:05:24', NULL),
(2680, 36, 'Rated on Anjali Srivastava profile', '2018-05-17 15:05:57', NULL),
(2681, 36, 'Rated on Anjali Srivastava profile', '2018-05-17 15:06:53', NULL),
(2682, 37, 'Rated on Chetan Deep profile', '2018-05-19 10:40:05', NULL),
(2683, 28, 'Rated on Preeti Singh profile', '2018-05-19 11:37:37', NULL),
(2684, 28, 'Rated on Preeti Singh profile', '2018-05-19 11:39:35', NULL),
(2685, 28, 'Rated on Preeti Singh profile', '2018-05-19 11:40:37', NULL),
(2686, 36, 'Rated on Anjali Srivastava profile', '2018-05-19 11:41:41', NULL),
(2687, 36, 'Rated on Anjali Srivastava profile', '2018-05-19 11:42:04', NULL),
(2688, 32, 'Rated on Raveena Nigam profile', '2018-05-19 11:59:25', NULL),
(2689, 36, 'Rated on Anjali Srivastava profile', '2018-05-19 12:02:40', NULL),
(2690, 35, 'Rated on Sushant Rajpoot profile', '2018-05-19 12:03:34', NULL),
(2691, 28, 'Self Rating Updated.', '2018-05-22 08:09:02', NULL),
(2692, 28, 'Self Rating Updated.', '2018-05-22 08:09:12', NULL),
(2693, 28, 'Self Rating Updated.', '2018-05-22 08:09:14', NULL),
(2694, 28, 'Self Rating Updated.', '2018-05-22 08:09:28', NULL),
(2695, 28, 'Self Rating Updated.', '2018-05-22 08:09:33', NULL),
(2696, 28, 'Self Rating Updated.', '2018-05-22 08:09:33', NULL),
(2697, 28, 'Self Rating Updated.', '2018-05-22 08:09:43', NULL),
(2698, 28, 'Self Rating Updated.', '2018-05-22 08:09:45', NULL),
(2699, 28, 'Self Rating Updated.', '2018-05-22 08:09:45', NULL),
(2700, 28, 'Self Rating Updated.', '2018-05-22 08:09:45', NULL),
(2701, 28, 'Self Rating Updated.', '2018-05-22 08:09:46', NULL),
(2702, 28, 'Self Rating Updated.', '2018-05-22 08:09:46', NULL),
(2703, 28, 'Self Rating Updated.', '2018-05-22 08:09:50', NULL),
(2704, 28, 'Self Rating Updated.', '2018-05-22 08:09:50', NULL),
(2705, 28, 'Self Rating Updated.', '2018-05-22 08:09:56', NULL),
(2706, 28, 'Self Rating Updated.', '2018-05-22 08:10:18', NULL),
(2707, 28, 'Self Rating Updated.', '2018-05-22 08:10:19', NULL),
(2708, 28, 'Self Rating Updated.', '2018-05-22 08:10:20', NULL),
(2709, 28, 'Self Rating Updated.', '2018-05-22 08:10:20', NULL),
(2710, 28, 'Self Rating Updated.', '2018-05-22 08:10:21', NULL),
(2711, 28, 'Self Rating Updated.', '2018-05-22 08:10:21', NULL),
(2712, 28, 'Self Rating Updated.', '2018-05-22 08:10:23', NULL),
(2713, 28, 'Self Rating Updated.', '2018-05-22 08:10:24', NULL),
(2714, 28, 'Self Rating Updated.', '2018-05-22 08:10:26', NULL),
(2715, 28, 'Self Rating Updated.', '2018-05-22 08:10:26', NULL),
(2716, 28, 'Self Rating Updated.', '2018-05-22 08:10:27', NULL),
(2717, 28, 'Self Rating Updated.', '2018-05-22 08:10:38', NULL),
(2718, 28, 'Self Rating Updated.', '2018-05-22 08:10:40', NULL),
(2719, 28, 'Self Rating Updated.', '2018-05-22 08:10:40', NULL),
(2720, 28, 'Self Rating Updated.', '2018-05-22 08:10:40', NULL),
(2721, 28, 'Self Rating Updated.', '2018-05-22 08:10:47', NULL),
(2722, 28, 'Self Rating Updated.', '2018-05-22 08:10:48', NULL),
(2723, 28, 'Self Rating Updated.', '2018-05-22 08:10:49', NULL),
(2724, 28, 'Self Rating Updated.', '2018-05-22 08:12:00', NULL),
(2725, 28, 'Self Rating Updated.', '2018-05-22 08:12:01', NULL),
(2726, 28, 'Self Rating Updated.', '2018-05-22 08:12:01', NULL),
(2727, 28, 'Self Rating Updated.', '2018-05-22 08:12:02', NULL),
(2728, 28, 'Self Rating Updated.', '2018-05-22 08:12:12', NULL),
(2729, 28, 'Self Rating Updated.', '2018-05-22 08:12:15', NULL),
(2730, 28, 'Self Rating Updated.', '2018-05-22 08:12:26', NULL),
(2731, 28, 'Self Rating Updated.', '2018-05-22 11:06:14', NULL),
(2732, 28, 'Self Rating Updated.', '2018-05-22 11:06:32', NULL),
(2733, 28, 'Self Rating Updated.', '2018-05-22 11:06:34', NULL),
(2734, 28, 'Self Rating Updated.', '2018-05-22 11:06:35', NULL),
(2735, 28, 'Self Rating Updated.', '2018-05-22 11:06:35', NULL),
(2736, 28, 'Self Rating Updated.', '2018-05-22 11:06:36', NULL),
(2737, 28, 'Self Rating Updated.', '2018-05-22 11:06:36', NULL),
(2738, 28, 'Self Rating Updated.', '2018-05-22 11:06:42', NULL),
(2739, 28, 'Self Rating Updated.', '2018-05-22 11:06:46', NULL),
(2740, 28, 'Self Rating Updated.', '2018-05-22 11:06:47', NULL),
(2741, 28, 'Self Rating Updated.', '2018-05-22 11:06:47', NULL),
(2742, 28, 'Self Rating Updated.', '2018-05-22 11:06:49', NULL),
(2743, 28, 'Self Rating Updated.', '2018-05-22 11:06:49', NULL),
(2744, 28, 'Self Rating Updated.', '2018-05-22 11:06:49', NULL),
(2745, 28, 'Self Rating Updated.', '2018-05-22 11:06:49', NULL),
(2746, 28, 'Self Rating Updated.', '2018-05-22 11:06:50', NULL),
(2747, 28, 'Self Rating Updated.', '2018-05-22 11:06:50', NULL),
(2748, 28, 'Self Rating Updated.', '2018-05-22 11:06:51', NULL),
(2749, 28, 'Self Rating Updated.', '2018-05-22 11:06:51', NULL),
(2750, 28, 'Self Rating Updated.', '2018-05-22 11:07:01', NULL),
(2751, 28, 'Self Rating Updated.', '2018-05-22 11:07:04', NULL),
(2752, 28, 'Self Rating Updated.', '2018-05-22 11:07:06', NULL),
(2753, 28, 'Self Rating Updated.', '2018-05-22 11:07:08', NULL),
(2754, 28, 'Self Rating Updated.', '2018-05-22 11:07:10', NULL),
(2755, 28, 'Self Rating Updated.', '2018-05-22 11:07:11', NULL),
(2756, 28, 'Self Rating Updated.', '2018-05-22 11:07:12', NULL),
(2757, 28, 'Self Rating Updated.', '2018-05-22 11:07:23', NULL),
(2758, 28, 'Self Rating Updated.', '2018-05-22 11:07:25', NULL),
(2759, 28, 'Self Rating Updated.', '2018-05-22 11:07:26', NULL),
(2760, 28, 'Self Rating Updated.', '2018-05-22 11:07:40', NULL),
(2761, 28, 'Self Rating Updated.', '2018-05-22 11:07:41', NULL),
(2762, 28, 'Self Rating Updated.', '2018-05-22 13:28:00', NULL),
(2763, 28, 'Self Rating Updated.', '2018-05-22 13:28:31', NULL),
(2764, 28, 'Self Rating Updated.', '2018-05-22 13:28:33', NULL),
(2765, 35, 'Rated on Sushant Rajpoot profile', '2018-05-22 13:28:40', NULL),
(2766, 28, 'Self Rating Updated.', '2018-05-22 13:30:22', NULL),
(2767, 28, 'Self Rating Updated.', '2018-05-22 13:30:23', NULL),
(2768, 28, 'Self Rating Updated.', '2018-05-22 13:30:24', NULL),
(2769, 28, 'Self Rating Updated.', '2018-05-22 13:30:49', NULL),
(2770, 28, 'Self Rating Updated.', '2018-05-22 13:30:50', NULL),
(2771, 28, 'Self Rating Updated.', '2018-05-22 13:30:51', NULL),
(2772, 28, 'Rated on Preeti Singh profile', '2018-05-22 15:02:18', NULL),
(2773, 28, 'Rated on Preeti Singh profile', '2018-05-22 15:02:45', NULL),
(2774, 28, 'Rated on Preeti Singh profile', '2018-05-22 15:03:09', NULL),
(2775, 28, 'Rated on Preeti Singh profile', '2018-05-22 15:06:17', NULL),
(2776, 28, 'Rated on Preeti Singh profile', '2018-05-22 15:12:17', NULL),
(2777, 28, 'Rated on Preeti Singh profile', '2018-05-22 15:18:03', NULL),
(2778, 28, 'Rated on Preeti Singh profile', '2018-05-22 15:19:35', NULL),
(2779, 28, 'Rated on Preeti Singh profile', '2018-05-22 15:20:12', NULL),
(2780, 28, 'Rated on Preeti Singh profile', '2018-05-22 15:30:53', NULL),
(2781, 29, 'Rated on Kriti Jaiswal profile', '2018-05-23 07:34:07', NULL),
(2782, 32, 'Work Experience Updated.', '2018-05-23 09:22:53', NULL),
(2783, 32, 'Rated on Raveena Nigam profile', '2018-05-23 09:23:30', NULL),
(2784, 28, 'Self Rating Updated.', '2018-05-23 12:18:53', NULL),
(2785, 28, 'Self Rating Updated.', '2018-05-23 12:18:55', NULL),
(2786, 28, 'Self Rating Updated.', '2018-05-23 12:18:55', NULL),
(2787, 28, 'Self Rating Updated.', '2018-05-23 12:18:59', NULL),
(2788, 28, 'Self Rating Updated.', '2018-05-23 12:18:59', NULL),
(2789, 28, 'Self Rating Updated.', '2018-05-23 12:18:59', NULL),
(2790, 28, 'Self Rating Updated.', '2018-05-23 12:19:00', NULL),
(2791, 28, 'Self Rating Updated.', '2018-05-23 12:27:40', NULL),
(2792, 28, 'Self Rating Updated.', '2018-05-23 12:27:41', NULL),
(2793, 28, 'Self Rating Updated.', '2018-05-23 12:27:42', NULL),
(2794, 28, 'Self Rating Updated.', '2018-05-23 12:27:43', NULL),
(2795, 28, 'Self Rating Updated.', '2018-05-23 12:27:43', NULL),
(2796, 28, 'Self Rating Updated.', '2018-05-23 12:27:45', NULL),
(2797, 28, 'Self Rating Updated.', '2018-05-23 12:27:46', NULL),
(2798, 28, 'Self Rating Updated.', '2018-05-23 12:27:47', NULL),
(2799, 28, 'Self Rating Updated.', '2018-05-23 12:27:47', NULL),
(2800, 28, 'Self Rating Updated.', '2018-05-23 12:27:48', NULL),
(2801, 28, 'Self Rating Updated.', '2018-05-23 12:27:49', NULL),
(2802, 28, 'Self Rating Updated.', '2018-05-23 12:27:51', NULL),
(2803, 28, 'Self Rating Updated.', '2018-05-23 12:27:51', NULL),
(2804, 28, 'Self Rating Updated.', '2018-05-23 12:27:51', NULL),
(2805, 28, 'Self Rating Updated.', '2018-05-23 12:27:51', NULL),
(2806, 28, 'Self Rating Updated.', '2018-05-23 12:27:52', NULL),
(2807, 28, 'Self Rating Updated.', '2018-05-23 12:27:52', NULL),
(2808, 28, 'Self Rating Updated.', '2018-05-23 12:27:53', NULL),
(2809, 28, 'Self Rating Updated.', '2018-05-23 12:27:53', NULL),
(2810, 35, 'Rated on Sushant Rajpoot profile', '2018-05-28 14:30:50', NULL),
(2811, 32, 'Rated on Raveena Nigam profile', '2018-05-28 14:33:28', NULL),
(2812, 28, 'Rated on Preeti Singh profile', '2018-05-28 14:39:06', NULL),
(2813, 37, 'Rated on Chetan Deep profile', '2018-05-28 14:41:31', NULL),
(2814, 32, 'Rated on Raveena Nigam profile', '2018-05-28 14:43:04', NULL),
(2815, 28, 'Rated on Preeti Singh profile', '2018-05-28 14:44:05', NULL),
(2816, 32, 'Rated on Raveena Nigam profile', '2018-05-28 14:47:22', NULL),
(2817, 32, 'Rated on Raveena Nigam profile', '2018-05-28 15:10:04', NULL),
(2818, 39, 'Rated on Saurabh Shukla profile', '2018-05-30 06:22:46', NULL),
(2819, 32, 'Rated on Raveena Nigam profile', '2018-05-30 06:27:39', NULL),
(2820, 37, 'Rated on Chetan Deep profile', '2018-05-30 06:32:16', NULL),
(2821, 39, 'Rated on Saurabh Shukla profile', '2018-05-30 06:35:07', NULL),
(2822, 32, 'Rated on Raveena Nigam profile', '2018-05-31 08:23:19', NULL),
(2823, 32, 'Rated on Raveena Nigam profile', '2018-05-31 08:25:31', NULL),
(2824, 35, 'Rated on Sushant Rajpoot profile', '2018-05-31 08:31:00', NULL),
(2825, 35, 'Rated on Sushant Rajpoot profile', '2018-05-31 08:32:00', NULL),
(2826, 35, 'Rated on Sushant Rajpoot profile', '2018-05-31 08:32:58', NULL),
(2827, 32, 'Rated on Raveena Nigam profile', '2018-05-31 08:36:09', NULL),
(2828, 35, 'Rated on Sushant Rajpoot profile', '2018-05-31 08:37:55', NULL),
(2829, 39, 'Rated on Saurabh Shukla profile', '2018-05-31 08:40:24', NULL),
(2830, 35, 'Rated on Sushant Rajpoot profile', '2018-05-31 08:45:37', NULL),
(2831, 28, 'Rated on Preeti Singh profile', '2018-05-31 14:05:54', NULL),
(2832, 37, 'Rated on Chetan Deep profile', '2018-05-31 14:08:37', NULL),
(2833, 37, 'Rated on Chetan Deep profile', '2018-06-01 08:08:07', NULL),
(2834, 32, 'Rated on Raveena Nigam profile', '2018-06-01 10:02:28', NULL),
(2835, 37, 'Rated on Chetan Deep profile', '2018-06-01 10:03:47', NULL),
(2836, 36, 'Rated on Anjali Srivastava profile', '2018-06-01 11:31:18', NULL),
(2837, 28, 'Rated on Preeti Singh profile', '2018-06-01 11:32:39', NULL),
(2838, 35, 'Rated on Sushant Rajpoot profile', '2018-06-01 11:34:34', NULL),
(2839, 37, 'Rated on Chetan Deep profile', '2018-06-01 11:36:52', NULL),
(2840, 36, 'Rated on Anjali Srivastava profile', '2018-06-01 11:38:34', NULL),
(2841, 32, 'Rated on Raveena Nigam profile', '2018-06-01 14:51:00', NULL),
(2842, 37, 'Rated on Chetan Deep profile', '2018-06-01 14:52:45', NULL),
(2843, 37, 'Rated on Chetan Deep profile', '2018-06-01 14:53:20', NULL),
(2844, 36, 'Rated on Anjali Srivastava profile', '2018-06-01 16:44:38', NULL),
(2845, 36, 'Rated on Anjali Srivastava profile', '2018-06-02 12:33:31', NULL),
(2846, 28, 'Rated on Preeti Singh profile', '2018-06-05 08:52:01', NULL),
(2847, 28, 'Rated on Preeti Singh profile', '2018-06-05 08:52:29', NULL),
(2848, 28, 'Rated on Preeti Singh profile', '2018-06-05 08:53:20', NULL),
(2849, 32, 'Rated on Raveena Nigam profile', '2018-06-05 12:56:21', NULL),
(2850, 32, 'Rated on Raveena Nigam profile', '2018-06-05 12:56:58', NULL),
(2851, 32, 'Rated on Raveena Nigam profile', '2018-06-05 12:57:37', NULL),
(2852, 32, 'Rated on Raveena Nigam profile', '2018-06-05 12:58:02', NULL),
(2853, 32, 'Rated on Raveena Nigam profile', '2018-06-07 13:57:42', NULL),
(2854, 32, 'Rated on Raveena Nigam profile', '2018-06-07 13:58:14', NULL),
(2855, 32, 'Rated on Raveena Nigam profile', '2018-06-07 13:58:49', NULL),
(2856, 32, 'Rated on Raveena Nigam profile', '2018-06-07 13:59:52', NULL),
(2857, 28, 'Profile Updated.', '2018-06-08 10:02:29', NULL),
(2858, 32, 'Profile Updated.', '2018-06-11 11:34:55', NULL),
(2859, 32, 'Profile Updated.', '2018-06-11 11:35:39', NULL),
(2860, 32, 'Work Experience Updated.', '2018-06-11 16:06:11', NULL),
(2861, 28, 'Rated on Preeti Singh profile', '2018-06-13 08:27:19', NULL),
(2862, 28, 'Rated on Preeti Singh profile', '2018-06-15 06:45:13', NULL),
(2863, 28, 'Rated on Preeti Singh profile', '2018-06-16 09:55:00', NULL),
(2864, 28, 'Rated on Preeti Singh profile', '2018-06-16 09:55:44', NULL),
(2865, 28, 'Rated on Preeti Singh profile', '2018-06-16 11:56:02', NULL),
(2866, 28, 'Rated on Preeti Singh profile', '2018-06-16 12:19:16', NULL),
(2867, 28, 'Rated on Preeti Singh profile', '2018-06-16 12:19:42', NULL),
(2868, 32, 'Rated on Ravena Nigam profile', '2018-06-18 10:10:23', NULL),
(2869, 28, 'Rated on Preeti Singh profile', '2018-06-25 11:09:39', NULL),
(2870, 28, 'Profile Updated.', '2018-07-26 12:00:50', NULL),
(2871, 32, 'Rated on Ravena Nigam profile', '2018-08-04 08:18:50', NULL),
(2872, 32, 'Rated on Ravena Nigam profile', '2018-08-04 08:19:35', NULL),
(2873, 32, 'Rated on Ravena Nigam profile', '2018-08-04 08:20:01', NULL),
(2874, 32, 'Rated on Ravena Nigam profile', '2018-08-04 08:20:54', NULL),
(0, 32, 'New Strength Added.', '2018-08-07 11:44:45', NULL),
(0, 32, 'New Strength Added.', '2018-08-07 11:46:04', NULL),
(0, 32, 'New Strength Added.', '2018-08-07 11:50:06', NULL),
(0, 32, 'New Strength Added.', '2018-08-07 11:50:20', NULL),
(0, 32, 'New Strength Added.', '2018-08-07 12:19:04', NULL),
(0, 32, 'Profile Updated.', '2018-08-08 15:34:48', NULL),
(0, 32, 'New Work Experience Added.', '2018-08-09 10:43:17', NULL),
(0, 13, 'Rated on Raveena Nigam profile', '2018-08-28 15:12:19', NULL),
(0, 13, 'Rated on Raveena Nigam profile', '2018-08-28 15:23:55', NULL),
(0, 16, 'Rated on Shivangi Agarwal profile', '2018-08-30 08:54:30', NULL),
(0, 16, 'Rated on Shivangi Agarwal profile', '2018-08-30 08:55:00', NULL),
(0, 13, 'Profile Updated.', '2018-08-30 13:57:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_strengths`
--

CREATE TABLE `user_strengths` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `strength` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_strengths`
--

INSERT INTO `user_strengths` (`id`, `user_id`, `strength`, `created_at`, `updated_at`) VALUES
(20, 32, '1', '2018-08-07 12:19:03', '2018-08-07 12:19:03'),
(21, 32, '2', '2018-08-07 12:19:03', '2018-08-07 12:19:03'),
(22, 32, '3', '2018-08-07 12:19:03', '2018-08-07 12:19:03'),
(23, 32, '4', '2018-08-07 12:19:03', '2018-08-07 12:19:03'),
(24, 32, '11', '2018-08-07 12:19:03', '2018-08-07 12:19:03'),
(25, 32, '12', '2018-08-07 12:19:03', '2018-08-07 12:19:03'),
(26, 32, '13', '2018-08-07 12:19:03', '2018-08-07 12:19:03'),
(27, 32, '21', '2018-08-07 12:19:03', '2018-08-07 12:19:03'),
(28, 32, '22', '2018-08-07 12:19:04', '2018-08-07 12:19:04'),
(29, 32, '23', '2018-08-07 12:19:04', '2018-08-07 12:19:04'),
(30, 32, '26', '2018-08-07 12:19:04', '2018-08-07 12:19:04'),
(31, 32, '27', '2018-08-07 12:19:04', '2018-08-07 12:19:04'),
(32, 32, '28', '2018-08-07 12:19:04', '2018-08-07 12:19:04'),
(33, 32, '32', '2018-08-07 12:19:04', '2018-08-07 12:19:04'),
(34, 32, '33', '2018-08-07 12:19:04', '2018-08-07 12:19:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_verification`
--

CREATE TABLE `user_verification` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` enum('email','mobile') COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_verification`
--

INSERT INTO `user_verification` (`id`, `user_id`, `type`, `token`, `created_at`, `updated_at`) VALUES
(1, 0, 'email', 'MCMjcmF2ZWVuYStpcGFpZEBzaW5nc3lzLmNvbQ==', '2018-08-22 00:20:18', NULL),
(4, 28, 'email', 'MjgjI3ByZWV0aXNpbmdoQHNpbmdzeXMuY29t', '2018-04-19 23:03:07', NULL),
(6, 29, 'email', 'MjkjI3ByZWV0aXNpbmdoK2tyaXRpQHNpbmdzeXMuY29t', '2018-04-19 23:08:00', NULL),
(8, 30, 'email', 'MzAjI3ByZWV0aXNpbmdoK2NvbXBhbnlAc2luZ3N5cy5jb20=', '2018-04-19 23:25:30', NULL),
(10, 31, 'email', 'MzEjI3JhdmVlbmErY29tcGFueUBzaW5nc3lzLmNvbQ==', '2018-04-19 23:27:11', NULL),
(12, 32, 'email', 'MzIjI3JhdmVlbmEraW5kaXZpZHVhbEBzaW5nc3lzLmNvbQ==', '2018-04-19 23:49:16', NULL),
(14, 33, 'email', 'MzMjI3NhdXJhYmhzaHVrbGErY29tcGFueUBzaW5nc3lzLmNvbQ==', '2018-04-20 00:03:45', NULL),
(16, 34, 'email', 'MzQjI3NhdXJhYmhzaHVrbGEraW5kaXZpZHVhbEBzaW5nc3lzLmNvbQ==', '2018-04-20 00:07:15', NULL),
(18, 35, 'email', 'MzUjI3N1c2hhbnRAc2luZ3N5cy5jb20=', '2018-04-20 00:16:51', NULL),
(20, 36, 'email', 'MzYjI2FuamFsaStpbmRpdmlkdWFsQHNpbmdzeXMuY29t', '2018-04-20 05:04:53', NULL),
(22, 37, 'email', 'MzcjI2NoZXRhbmRlZXBAc2luZ3N5cy5jb20=', '2018-04-21 01:06:16', NULL),
(23, 38, 'mobile', '869387', '2018-04-24 07:09:31', NULL),
(24, 38, 'email', 'MzgjI3NkQHNkZmdoamsuY29t', '2018-04-24 07:09:31', NULL),
(26, 39, 'email', 'MzkjI3NhdXJhYmhzaHVrbGErYUBzaW5nc3lzLmNvbQ==', '2018-05-08 02:55:55', NULL),
(27, 40, 'mobile', '527194', '2018-05-15 04:01:05', NULL),
(28, 40, 'email', 'NDAjI3ByZWV0aXNpbmdoK2phaG5hdmlAc2luZ3N5cy5jb20=', '2018-05-15 04:01:05', NULL),
(29, 41, 'mobile', '801126', '2018-05-18 23:53:49', NULL),
(30, 41, 'email', 'NDEjI2FuamFsaStjb21wYW55QHNpbmdzeXMuY29t', '2018-05-18 23:53:49', NULL),
(31, 42, 'mobile', '312219', '2018-07-11 23:57:43', NULL),
(32, 42, 'email', 'NDIjI3NkY3ZAYXNkY2Z2Yi5jb20=', '2018-07-11 23:57:43', NULL),
(33, 43, 'mobile', '178833', '2018-07-11 23:58:57', NULL),
(34, 43, 'email', 'NDMjI21qaHlnZkBhc2RjZnZiLmNvbQ==', '2018-07-11 23:58:58', NULL),
(35, 44, 'mobile', '728894', '2018-07-12 00:32:18', NULL),
(36, 44, 'email', 'NDQjI3hjdmJsaXV5QHR5dWwuY29t', '2018-07-12 00:32:18', NULL),
(37, 45, 'email', 'NDUjI3ByZWV0aXNpbmdoK3NvbmFsaUBzaW5nc3lzLmNvbQ==', '2018-07-14 07:02:01', NULL),
(38, 45, 'email', 'NDUjI3ByZWV0aXNpbmdoK3NvbmFsaUBzaW5nc3lzLmNvbQ==', '2018-07-14 07:02:27', NULL),
(39, 45, 'email', 'NDUjI3ByZWV0aXNpbmdoK3NvbmFsaUBzaW5nc3lzLmNvbQ==', '2018-07-14 07:04:04', NULL),
(41, 50, 'email', 'NTAjI3ByZWV0aXNpbmdoK2FAc2luZ3N5cy5jb20=', '2018-07-15 23:08:41', NULL),
(42, 51, 'email', 'NTEjI2NoZXRhbmRlZXArbmV3M0BzaW5nc3lzLmNvbQ==', '2018-07-15 23:23:59', NULL),
(45, 52, 'email', 'NTIjI3ByZWV0aXNpbmdoK2FtYXJqZWV0QHNpbmdzeXMuY29t', '2018-07-16 00:48:55', NULL),
(47, 53, 'email', 'NTMjI3JhdmVlbmErdHdpbmtsZUBzaW5nc3lzLmNvbQ==', '2018-07-26 02:57:56', NULL),
(52, 54, 'email', 'NTQjI3JhdmVlbmErcGFpZEBzaW5nc3lzLmNvbQ==', '2018-07-26 03:47:24', NULL),
(54, 55, 'email', 'NTUjI3JhdmVlbmErc2h1YmhhbmdpQHNpbmdzeXMuY29t', '2018-07-30 23:29:47', NULL),
(56, 56, 'email', 'NTYjI3JhdmVlbmErc29teWFAc2luZ3N5cy5jb20=', '2018-07-30 23:44:09', NULL),
(57, 57, 'email', 'NTcjI3JhdmVlbmErYXl1c2htYW5Ac2luc2d5cy5jb20=', '2018-07-31 00:37:26', NULL),
(58, 58, 'email', 'NTgjI3JhdmVlbmErYUBzaW5nc3lzLmNvbQ==', '2018-07-31 00:41:05', NULL),
(61, 60, 'email', 'NjAjI2tyaXRpQHNpbmdzeXMuY29t', '2018-08-01 03:45:05', NULL),
(62, 60, 'mobile', '114471', NULL, NULL),
(64, 18, 'email', 'MTgjI3JhdmVlbmErcGFpZEBzaW5nc3lzLmNvbQ==', '2018-08-22 03:12:14', NULL),
(66, 19, 'email', 'MTkjI3JhdmVlbmErc3Vic2NyaXB0aW9uQHNpbmdzeXMuY29t', '2018-08-22 03:48:57', NULL),
(68, 20, 'email', 'MjAjI3JhdmVlbmErc3Vic2NyaXB0aW9uQHNpbmdzeXMuY29t', '2018-08-22 03:55:15', NULL),
(70, 21, 'email', 'MjEjI3JhdmVlbmErY29ycG9yYXRlQHNpbmdzeXMuY29t', '2018-08-22 04:03:05', NULL),
(72, 23, 'email', 'MjMjI3JhdmVlbmErYW5qYWxpQHNpbmdzeXMuY29t', '2018-08-26 21:58:15', NULL),
(74, 24, 'email', 'MjQjI3JhdmVlbmErYW5qYWxpQHNpbmdzeXMuY29t', '2018-08-26 22:23:58', NULL),
(75, 20, 'mobile', '452109', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_work_experience`
--

CREATE TABLE `user_work_experience` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_month` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_job_status` enum('CURRENTLY WORKING','LEFT','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_work_experience`
--

INSERT INTO `user_work_experience` (`id`, `user_id`, `company_name`, `job_title`, `industry`, `start_month`, `start_year`, `end_month`, `end_year`, `current_job_status`, `created_at`, `updated_at`) VALUES
(29, 28, 'Sintel', 'Web Developer', NULL, 'October', '2005', ' ', 'null', 'LEFT', '2018-04-19 23:03:06', NULL),
(30, 29, 'Microsoft Corporation', 'Designer', NULL, 'February', '2005', ' ', 'null', 'CURRENTLY WORKING', '2018-04-19 23:08:00', NULL),
(31, 37, 'Sintel', 'Senior Software Engineer', 'Test', 'November', '2016', 'null', 'null', 'LEFT', '2018-04-19 23:49:16', '2018-06-11 16:06:11'),
(32, 34, 'Microsoft Corporation', 'Senior Software Engineer', NULL, 'March', '2017', ' ', 'null', 'CURRENTLY WORKING', '2018-04-20 00:07:15', NULL),
(33, 35, 'Microsoft Corporation', 'PHP Developer', 'XYZ', 'January', '2018', 'null', 'null', 'CURRENTLY WORKING', '2018-04-20 00:16:51', '2018-04-23 05:25:04'),
(34, 36, 'Microsoft Corporation', 'Senior Software Engineer', NULL, 'May', '2015', ' ', 'null', 'CURRENTLY WORKING', '2018-04-20 05:04:53', NULL),
(35, 37, 'Microsoft Corporation', 'TQC', NULL, 'April', '2005', ' ', 'null', 'CURRENTLY WORKING', '2018-04-21 01:06:16', NULL),
(36, 39, 'Genpact', 'Web Developer', NULL, 'August', '2013', ' ', 'null', 'CURRENTLY WORKING', '2018-05-08 14:55:55', NULL),
(37, 40, 'Gupta Industries', 'Web Developer', NULL, 'November', '2009', ' ', 'null', 'CURRENTLY WORKING', '2018-05-15 16:01:05', NULL),
(38, 36, 'Micro Corporation Of India', 'Software Engineer', 'Manufacturing Unit', 'August', '2013', 'null', 'null', 'CURRENTLY WORKING', NULL, NULL),
(39, 55, 'Hewlett Packard', 'Senior Web Developer', NULL, 'May', '2017', ' ', 'null', 'CURRENTLY WORKING', '2018-07-31 11:29:46', NULL),
(40, 56, 'Hewlett Packard', 'Technical Head', NULL, 'February', '2018', ' ', 'null', 'CURRENTLY WORKING', '2018-07-31 11:44:08', NULL),
(41, 32, 'Genpact Technology', 'Senior Developer', 'HTML', 'March', '2018', 'null', 'null', 'CURRENTLY WORKING', NULL, NULL),
(42, 0, 'Singsys Pvt. Ltd', 'Senior Web Developer', NULL, 'February', '2017', ' ', 'null', 'LEFT', '2018-08-22 12:20:17', NULL),
(43, 18, 'Microsoft Corporation', 'Senior Web Developer', NULL, 'April', '2017', ' ', 'null', 'CURRENTLY WORKING', '2018-08-22 15:12:14', NULL),
(44, 19, 'Microsoft Corporation', 'Senior Web Developer', NULL, 'February', '2017', ' ', 'null', 'CURRENTLY WORKING', '2018-08-22 15:48:56', NULL),
(45, 20, 'Microsoft Corporation', 'Senior Web Developer', NULL, 'April', '2017', ' ', 'null', 'CURRENTLY WORKING', '2018-08-22 15:55:14', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_banner`
--
ALTER TABLE `about_us_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_detail`
--
ALTER TABLE `banner_detail`
  ADD PRIMARY KEY (`banner_detail_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_sender_id_index` (`sender_id`),
  ADD KEY `chat_receiver_id_index` (`receiver_id`);

--
-- Indexes for table `chat_group`
--
ALTER TABLE `chat_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_group_user`
--
ALTER TABLE `chat_group_user`
  ADD PRIMARY KEY (`chat_group_user_id`);

--
-- Indexes for table `chat_status`
--
ALTER TABLE `chat_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_admins`
--
ALTER TABLE `company_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_admins_admin_user_id_foreign` (`admin_user_id`),
  ADD KEY `company_admins_company_user_id_foreign` (`company_user_id`),
  ADD KEY `company_admins_company_user_id_index` (`company_user_id`),
  ADD KEY `company_admins_admin_user_id_index` (`admin_user_id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_profile_user_id_foreign` (`user_id`),
  ADD KEY `company_profile_user_id_index` (`user_id`);

--
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `connection_user_id_foreign` (`user_id`),
  ADD KEY `connection_connected_to_foreign` (`connected_to`),
  ADD KEY `connection_user_id_index` (`user_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD KEY `countries_id_index` (`id`);

--
-- Indexes for table `credit_transaction_detail`
--
ALTER TABLE `credit_transaction_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_transaction_detail_user_id_index` (`user_id`),
  ADD KEY `credit_transaction_detail_transaction_id_index` (`transaction_id`(191));

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `get360`
--
ALTER TABLE `get360`
  ADD KEY `get360_invited_by_index` (`invited_by`),
  ADD KEY `get360_invited_to_index` (`invited_to`);

--
-- Indexes for table `individual_self_rating`
--
ALTER TABLE `individual_self_rating`
  ADD KEY `individual_self_rating_user_id_index` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_id_index` (`id`),
  ADD KEY `jobs_corporate_id_index` (`corporate_id`);

--
-- Indexes for table `jobs_applied`
--
ALTER TABLE `jobs_applied`
  ADD KEY `jobs_applied_job_id_index` (`job_id`),
  ADD KEY `jobs_applied_user_id_index` (`user_id`);

--
-- Indexes for table `jobs_viewed`
--
ALTER TABLE `jobs_viewed`
  ADD KEY `jobs_viewed_job_id_index` (`job_id`),
  ADD KEY `jobs_viewed_user_id_index` (`user_id`);

--
-- Indexes for table `job_attributes`
--
ALTER TABLE `job_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_attributes_job_id_index` (`job_id`),
  ADD KEY `job_attributes_attribute_id_index` (`attribute_id`);

--
-- Indexes for table `job_candidate_log`
--
ALTER TABLE `job_candidate_log`
  ADD KEY `job_candidate_log_job_id_index` (`job_id`),
  ADD KEY `job_candidate_log_user_id_index` (`user_id`);

--
-- Indexes for table `job_credits`
--
ALTER TABLE `job_credits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_credits_user_id_index` (`user_id`);

--
-- Indexes for table `job_credit_log`
--
ALTER TABLE `job_credit_log`
  ADD KEY `job_credit_log_job_id_index` (`job_id`),
  ADD KEY `job_credit_log_user_id_index` (`user_id`);

--
-- Indexes for table `job_log`
--
ALTER TABLE `job_log`
  ADD KEY `job_log_job_id_index` (`job_id`),
  ADD KEY `job_log_user_id_index` (`user_id`);

--
-- Indexes for table `job_matching_log`
--
ALTER TABLE `job_matching_log`
  ADD KEY `job_matching_log_job_id_index` (`job_id`),
  ADD KEY `job_matching_log_user_id_index` (`user_id`),
  ADD KEY `job_matching_log_profile_id_index` (`profile_id`);

--
-- Indexes for table `job_recommendation`
--
ALTER TABLE `job_recommendation`
  ADD KEY `job_recommendation_job_id_index` (`job_id`),
  ADD KEY `job_recommendation_user_id_index` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newly_added_user`
--
ALTER TABLE `newly_added_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newly_added_user_new_user_id_index` (`new_user_id`),
  ADD KEY `newly_added_user_user_id_index` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_same_company_notifications`
--
ALTER TABLE `pending_same_company_notifications`
  ADD KEY `pending_same_company_notifications_user_id_index` (`user_id`);

--
-- Indexes for table `profile_analytics`
--
ALTER TABLE `profile_analytics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_analytics_profile_id_index` (`profile_id`),
  ADD KEY `profile_analytics_user_id_index` (`user_id`);

--
-- Indexes for table `profile_views`
--
ALTER TABLE `profile_views`
  ADD KEY `profile_views_profile_id_index` (`profile_id`),
  ADD KEY `profile_views_user_id_index` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_reference_id_index` (`reference_id`),
  ADD KEY `ratings_question_id_index` (`question_id`);

--
-- Indexes for table `ratings_and_reviews`
--
ALTER TABLE `ratings_and_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_and_reviews_user_id_index` (`user_id`),
  ADD KEY `ratings_and_reviews_rated_to_index` (`rated_to`),
  ADD KEY `ratings_and_reviews_rating_usertype_index` (`rating_usertype`);

--
-- Indexes for table `rating_invite`
--
ALTER TABLE `rating_invite`
  ADD KEY `rating_invite_invited_by_index` (`invited_by`),
  ADD KEY `rating_invite_invited_to_index` (`invited_to`);

--
-- Indexes for table `rating_questions`
--
ALTER TABLE `rating_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_threshold`
--
ALTER TABLE `rating_threshold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_usertype`
--
ALTER TABLE `rating_usertype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `reviews_reference_id_index` (`reference_id`);

--
-- Indexes for table `reviews_on_hold`
--
ALTER TABLE `reviews_on_hold`
  ADD KEY `reviews_on_hold_reference_id_index` (`reference_id`);

--
-- Indexes for table `search_log`
--
ALTER TABLE `search_log`
  ADD KEY `search_log_user_id_index` (`user_id`),
  ADD KEY `search_log_search_keyword_index` (`search_keyword`(191));

--
-- Indexes for table `services_offered`
--
ALTER TABLE `services_offered`
  ADD KEY `services_offered_user_id_index` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shortlisted_profiles`
--
ALTER TABLE `shortlisted_profiles`
  ADD KEY `shortlisted_profiles_user_id_index` (`user_id`),
  ADD KEY `shortlisted_profiles_job_id_index` (`job_id`),
  ADD KEY `shortlisted_profiles_corporate_id_index` (`corporate_id`);

--
-- Indexes for table `strength`
--
ALTER TABLE `strength`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_index` (`user_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_user_id_index` (`user_id`),
  ADD KEY `transaction_details_transaction_id_index` (`transaction_id`);

--
-- Indexes for table `unregistered_invite`
--
ALTER TABLE `unregistered_invite`
  ADD KEY `unregistered_invite_user_id_index` (`user_id`);

--
-- Indexes for table `unregistered_job_recommendation`
--
ALTER TABLE `unregistered_job_recommendation`
  ADD KEY `unregistered_job_recommendation_user_id_index` (`user_id`),
  ADD KEY `unregistered_job_recommendation_job_id_index` (`job_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_attributes`
--
ALTER TABLE `users_attributes`
  ADD KEY `users_attributes_attribute_id_index` (`attribute_id`),
  ADD KEY `users_attributes_user_id_index` (`user_id`);

--
-- Indexes for table `user_education`
--
ALTER TABLE `user_education`
  ADD KEY `user_education_country_id_index` (`country_id`),
  ADD KEY `user_education_user_id_index` (`user_id`);

--
-- Indexes for table `user_industries`
--
ALTER TABLE `user_industries`
  ADD KEY `user_industries_user_id_index` (`user_id`);

--
-- Indexes for table `user_profile_logs`
--
ALTER TABLE `user_profile_logs`
  ADD KEY `user_profile_logs_user_id_index` (`user_id`);

--
-- Indexes for table `user_strengths`
--
ALTER TABLE `user_strengths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_strengths_user_id_index` (`user_id`);

--
-- Indexes for table `user_verification`
--
ALTER TABLE `user_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_verification_user_id_index` (`user_id`);

--
-- Indexes for table `user_work_experience`
--
ALTER TABLE `user_work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_work_experience_user_id_index` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `connection`
--
ALTER TABLE `connection`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `credit_transaction_detail`
--
ALTER TABLE `credit_transaction_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `job_attributes`
--
ALTER TABLE `job_attributes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;
--
-- AUTO_INCREMENT for table `job_credits`
--
ALTER TABLE `job_credits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `newly_added_user`
--
ALTER TABLE `newly_added_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `profile_analytics`
--
ALTER TABLE `profile_analytics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `ratings_and_reviews`
--
ALTER TABLE `ratings_and_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `rating_questions`
--
ALTER TABLE `rating_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `rating_threshold`
--
ALTER TABLE `rating_threshold`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `strength`
--
ALTER TABLE `strength`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user_strengths`
--
ALTER TABLE `user_strengths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user_verification`
--
ALTER TABLE `user_verification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `user_work_experience`
--
ALTER TABLE `user_work_experience`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
