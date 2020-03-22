-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 01:32 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinajpurnews`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `newspost` int(11) DEFAULT NULL,
  `videonews` int(11) DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `managesection` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` int(11) DEFAULT NULL,
  `division` int(11) DEFAULT NULL,
  `district` int(11) DEFAULT NULL,
  `subdistrict` int(11) DEFAULT NULL,
  `settings` int(11) DEFAULT NULL,
  `writter` int(11) DEFAULT NULL,
  `Color` int(11) DEFAULT NULL,
  `extra` int(11) DEFAULT NULL,
  `footer` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `advertisement` int(11) DEFAULT NULL,
  `notice` int(11) DEFAULT NULL,
  `avater` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `phone`, `email`, `email_verified_at`, `password`, `designation`, `role`, `remember_token`, `verification_code`, `status`, `newspost`, `videonews`, `pages`, `managesection`, `category`, `subcategory`, `division`, `district`, `subdistrict`, `settings`, `writter`, `Color`, `extra`, `footer`, `user`, `advertisement`, `notice`, `avater`, `created_at`, `updated_at`) VALUES
(2, 'Qayum Hasan', '155955992', 'admin@gmail.com', '75d23af433e0cea4c0e45a56dba18b30', '$2y$12$mU8xp1o7F1boXLJIhLNX0.IxL/jwEDtfrlbfU8zUgF3rr3NsFtPW6', 'dfsgfdsgfdsg', '1', '788284', '788284', '1', 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin.jpg', '2020-03-01 04:11:48', '2020-03-17 05:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menus`
--

CREATE TABLE `admin_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menus`
--

INSERT INTO `admin_menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Main Menu', NULL, '2020-03-02 01:24:49');

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu_items`
--

CREATE TABLE `admin_menu_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `sort` int(11) NOT NULL DEFAULT 0,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` bigint(20) UNSIGNED NOT NULL,
  `depth` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_menu_items`
--

INSERT INTO `admin_menu_items` (`id`, `label`, `link`, `parent`, `sort`, `class`, `menu`, `depth`, `created_at`, `updated_at`) VALUES
(160, 'বাংলাদেশ', 'বাংলাদেশ', 0, 0, NULL, 1, 0, '2020-03-22 00:52:32', '2020-03-22 00:52:37'),
(161, 'আন্তর্জাতিক', 'আন্তর্জাতিক', 0, 2, NULL, 1, 0, '2020-03-22 00:52:37', '2020-03-22 00:53:36'),
(162, 'বিনদন', 'বিনদন', 161, 3, NULL, 1, 1, '2020-03-22 00:52:42', '2020-03-22 00:53:50'),
(163, 'ঢাকাঢাকা', 'বাংলাদেশ/ঢাকা', 160, 1, NULL, 1, 1, '2020-03-22 00:52:48', '2020-03-22 00:53:40'),
(164, 'এশিয়া', 'আন্তর্জাতিক/এশিয়া', 0, 4, NULL, 1, 0, '2020-03-22 00:52:54', '2020-03-22 00:52:58'),
(165, 'বিনদন', 'বিনদন', 164, 5, NULL, 1, 1, '2020-03-22 00:52:58', '2020-03-22 00:53:51'),
(166, 'হলিউড', 'বিনদন/হলিউড', 0, 6, NULL, 1, 0, '2020-03-22 00:53:02', '2020-03-22 00:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_top` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `meta_description`, `meta_keyword`, `is_top`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(42, 'বাংলাদেশ', 'বাংলাদেশ', 'গফদস', 'গফদসগ', 1, 1, 0, '2020-03-21 22:45:35', NULL),
(43, 'আন্তর্জাতিক', 'আন্তর্জাতিক', 'দফজ্ঞ', 'দফগদফ', 1, 1, 0, '2020-03-21 22:45:43', NULL),
(44, 'বিনদন', 'বিনদন', 'সদাফসা', 'ফদসাফদসা', 1, 1, 0, '2020-03-22 00:24:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_bn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_caption` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photos`
--

CREATE TABLE `gallery_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `frontlogo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'flogo.jpg',
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fvlogo.jpg',
  `adminlogo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'adlogo.jpg',
  `loginbanner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'banlogo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `frontlogo`, `favicon`, `adminlogo`, `loginbanner`, `created_at`, `updated_at`) VALUES
(2, '1584869877front.png', '2.jpg', '3.jpg', '3.jpg', NULL, '2020-03-22 03:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `non_id` int(11) DEFAULT NULL,
  `cate_type` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `type`, `non_id`, `cate_type`, `created_at`, `updated_at`) VALUES
(75, 'বাংলাদেশ', 'বাংলাদেশ', 1, 42, 1, NULL, '2020-03-21 22:45:35'),
(76, 'আন্তর্জাতিক', 'আন্তর্জাতিক', 1, 43, 1, NULL, '2020-03-21 22:45:43'),
(84, 'ঢাকাঢাকা', 'বাংলাদেশ/ঢাকা', 1, 33, 2, '2020-03-21 23:02:00', '2020-03-21 23:02:26'),
(85, 'এশিয়া', 'আন্তর্জাতিক/এশিয়া', 1, 34, 2, '2020-03-21 23:14:21', NULL),
(86, 'ইউরোপ', 'বাংলাদেশ/ফডশাফ', 1, 35, 2, '2020-03-21 23:14:41', NULL),
(87, 'বিনদন', 'বিনদন', 1, 44, 1, NULL, '2020-03-22 00:24:09'),
(88, 'হলিউড', 'বিনদন/হলিউড', 1, 36, 2, '2020-03-22 00:25:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2020_03_01_090204_create_admins_table', 2),
(7, '2017_08_11_073824_create_menus_wp_table', 3),
(8, '2017_08_11_074006_create_menu_items_wp_table', 3),
(10, '2020_03_02_101135_create_menus_table', 4),
(12, '2020_03_04_092743_create_pages_table', 5),
(23, '2020_03_07_044727_create_payment_getways_table', 6),
(24, '2020_03_15_044949_create_uniques_table', 6),
(25, '2020_03_15_072325_create_notices_table', 7),
(35, '2020_03_15_044302_create_divisions_table', 8),
(36, '2020_03_15_052312_create_categories_table', 8),
(37, '2020_03_15_052913_create_districts_table', 8),
(38, '2020_03_15_072226_create_sub_categories_table', 8),
(39, '2020_03_15_073837_create_sub_districts_table', 8),
(40, '2020_03_15_105016_create_theme_colors_table', 8),
(41, '2020_03_15_110242_create_polls_table', 8),
(42, '2020_03_15_113723_create_poll_results_table', 8),
(43, '2020_03_16_054703_create_logos_table', 8),
(44, '2020_03_16_065459_create_news_posts_table', 9),
(45, '2020_03_16_070329_create_galleries_table', 9),
(46, '2020_03_16_070755_create_gallery_photos_table', 9),
(47, '2020_03_16_092609_create_our_says_table', 9),
(53, '2020_03_16_101731_create_teams_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `news_posts`
--

CREATE TABLE `news_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `subdistrict_id` int(11) DEFAULT NULL,
  `post_type` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `braking_news` int(11) DEFAULT NULL,
  `pocket_news` int(11) DEFAULT NULL,
  `popular_news` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_posts`
--

INSERT INTO `news_posts` (`id`, `title`, `slug`, `cate_id`, `subcategory_id`, `division_id`, `district_id`, `subdistrict_id`, `post_type`, `image`, `video_link`, `description`, `meta_tag`, `meta_description`, `status`, `braking_news`, `pocket_news`, `popular_news`, `is_deleted`, `created_at`, `updated_at`) VALUES
(31, 'করোনাভাইরাস: সংক্রমণ ঠেকাতে আক্রান্ত অঞ্চলে আরো কঠোর পদক্ষেপ নিয়েছে ইতালি', 'করোনাভাইরাস:-সংক্রমণ-ঠেকাতে-আক্রান্ত-অঞ্চলে-আরো-কঠোর-পদক্ষেপ-নিয়েছে-ইতালি', 43, 34, NULL, NULL, NULL, 1, 'th_1584854127.jpg', NULL, '<p>করোনাভাইরাসের ছড়িয়ে পড়া ঠেকাতে কঠোর পদক্ষেপ গ্রহণ করেছে ভাইরাস আক্রান্ত ইতালির লম্বার্ডি অঞ্চলের কর্তৃপক্ষ।</p>\r\n\r\n<p>শনিবার রাত থেকে কার্যকর হওয়া সেসব পদক্ষেপে বাইরের সবরকম খেলাধুলা এবং শারীরিক কর্মকাণ্ড নিষিদ্ধ করা হয়েছে। এমনকি ব্যক্তিগতভাবেও কোন কিছু করা যাবে না।</p>\r\n\r\n<p>ভেন্ডিং মেশিন ব্যবহার বন্ধ করে দেয়া হয়েছে।</p>\r\n\r\n<p>শনিবার ইতালিতে করোনাভাইরাসে প্রায় ৮০০ মানুষের মৃত্যু হওয়ার পর দেশটি এই সিদ্ধান্ত নিয়েছে। গত একমাসে দেশটিতে ৪৮২৫ জনের মৃত্যু হয়েছে, যা বিশ্বের মধ্যে সর্বোচ্চ।</p>\r\n\r\n<p>জরুরি সরবরাহ ব্যবস্থা ছাড়া সবরকমের ব্যবসাবাণিজ্য বন্ধ করে দেয়া হয়েছে। হাসপাতাল, সড়ক আর রেলপথের কাজ ছাড়া সবরকমের নির্মাণ কাজ বন্ধ করতে বলা হয়েছে।</p>\r\n\r\n<p>দেশটিতে সপ্তাহের ছুটির দিনগুলোয় যে উন্মুক্ত বাজার বসতো, সেগুলো স্থগিত করে রাখার নির্দেশ দেয়া হয়েছে।</p>\r\n\r\n<p>আটই মার্চ থেকে লকডাউনের মধ্যে রয়েছে লম্বার্ডি অঞ্চল।</p>', 'ডফহফগ', 'জ্ঞফডশফগফ', 1, 1, 1, 1, 0, '2020-03-14 18:00:00', '2020-03-21 23:15:27'),
(32, 'করোনাভাইরাস: শুধু বয়স্ক নয়, তরুণরাও মারাত্মক আক্রান্ত হতে পারে কোভিড-১৯ এ', 'করোনাভাইরাস:-শুধু-বয়স্ক-নয়,-তরুণরাও-মারাত্মক-আক্রান্ত-হতে-পারে-কোভিড-১৯-এ', 42, 33, NULL, NULL, NULL, 1, 'th_1584854162.png', NULL, '<p>বিশ্ব স্বাস্থ্য সংস্থার মহাসচিব টেড্রোস ঘেব্রেয়েসাস বলেছেন তরুণদের পদক্ষেপ &#39;আরেক ব্যক্তির জীবন ও মৃত্যুর পার্থক্য&#39; গড়ে দিতে পারে।</p>\r\n\r\n<p>ভাইরাসের প্রকোপে বয়স্ক ব্যক্তিদের মৃত্যু ঝুঁকি বেশি হওয়ার কারণে বিশ্বের বিভিন্ন জায়গাতেই তরুণদের মধ্যে এই ভাইরাস সম্পর্কে কম সতর্ক থাকার প্রবণতা দেখা দেয়ার প্রেক্ষিতে এই কথা বলেন বিশ্ব স্বাস্থ্য সংস্থার প্রধান।</p>\r\n\r\n<p>সারাবিশ্বে এখন পর্যন্ত ১১ হাজারের বেশি মানুষ এই ভাইরাসের প্রাদুর্ভাবে মারা গেছে। প্রায় ৩ লাখ মানুষের মধ্যে ভাইরাস শনাক্ত হয়েছে।</p>\r\n\r\n<p>শুরুতে যেরকম ধারণা করা হচ্ছিল যে করোনাভাইরাসের কারণে বয়স্ক ব্যক্তিরাই সবচেয়ে বেশি ঝুঁকিতে রয়েছেন, নতুন কয়েকটি পরিসংখ্যান প্রকাশিত হওয়ার পর সেই ধারণা পাল্টানোর সময় এসেছে বলে মনে করছেন বিজ্ঞানীরা।</p>', 'ডশগড', 'গফডশশগফডশ', 1, 1, 1, 1, 0, '2020-03-21 23:16:02', '2020-03-21 23:16:02'),
(33, 'করোনাভাইরাস: বাংলাদেশকে প্রতিরোধ সরঞ্জাম দেবেন আলিবাবা\'র জ্যাক মা', 'করোনাভাইরাস:-বাংলাদেশকে-প্রতিরোধ-সরঞ্জাম-দেবেন-আলিবাবা\'র-জ্যাক-মা', 42, 33, NULL, NULL, NULL, 2, 'th_1584855439.jpg', '#', '<p>বাংলাদেশসহ কয়েকটি দেশে মাস্ক, টেস্ট কিট আর নিরাপত্তা পোশাক অনুদান দেয়ার ঘোষণা দিয়েছেন আলিবাবার প্রতিষ্ঠাতা জ্যাক মা।</p>\r\n\r\n<p>নিজের ভেরিফাইড টুইটার একাউন্টে তিনি এই ঘোষণা দিয়েছেন।</p>\r\n\r\n<p>জ্যাক মা লিখেছেন, তারা ১৮ লাখ মাস্ক, দুই লাখ ১০ হাজার টেস্ট কিট, ৩৬ হাজার নিরাপত্তামূলক পোশাক দেবেন। সেই সঙ্গে ভেন্টিলেটর এবং থার্মোমিটারও দেয়া হবে।</p>\r\n\r\n<p>বাংলাদেশের পাশাপাশি এসব সরঞ্জাম পাবে আফগানিস্তান, কম্বোডিয়া, লাওস, মালদ্বীপ, মঙ্গোলিয়া, মিয়ানমার, নেপাল, পাকিস্তান ও শ্রীলঙ্কা।</p>', 'গফদফসগ', 'ফদ্গফদসগ', 1, 1, 1, 1, 0, '2020-03-21 23:37:19', '2020-03-21 23:37:19'),
(34, 'খুব জরুরি না হলে বের হবেন না', 'খুব-জরুরি-না-হলে-বের-হবেন-না', 42, 33, NULL, NULL, NULL, 1, 'th_1584856949.jpg', NULL, '<p>বিদেশ থেকে যাঁরা ফিরেছেন এবং তাঁদের সংস্পর্শে যাঁরা এসেছেন, সবাইকে অবশ্যই হোম কোয়ারেন্টিনে যেতে হবে। এর বাইরে সাধারণ মানুষকে চলাচল সীমিত করতে হবে। আমরা আগে বলতাম, সবার মাস্ক পরার দরকার নেই। কিন্তু এখনকার পরিস্থিতিতে বাইরে গেলে সবাইকে অবশ্যই মাস্ক পরা প্রয়োজন। খুব জরুরি না হলে ঘরের বাইরে বের হওয়ার প্রয়োজন নেই। আর একান্ত যেতেই হলে ৩ ফুট দূরত্ব বজায় রেখে চলাফেরা করতে হবে।<br />\r\n<br />\r\nবর্তমান পরিস্থিতিতে বাজারে মাস্কের সংকট থাকলে নিজেরাই মাস্ক তৈরি করে পরা যাবে। এটি যে কেউ সহজেই ঘরে বানাতে পারেন। তিন স্তরবিশিষ্ট নতুন বা পুরোনো কাপড় ব্যবহার করে মাস্ক বানানো যায়। গণপরিবহনে চললে জানার উপায় থাকে না অন্য যাত্রীদের কেউ বিদেশ থেকে এসেছেন কি না বা আক্রান্ত হয়ে কেউ গণপরিবহনে উঠেছে কি না। তাই এ সময়ে গণপরিবহনে চলাচল না করার সর্বোচ্চ চেষ্টা করতে হবে। স্বাস্থ্য অধিদপ্তর থেকে ইতিমধ্যে সতর্কতা অবলম্বনের যেসব পরামর্শ দেওয়া হয়েছে, সবার নিরাপত্তার জন্যই তা মেনে চলা প্রয়োজন।</p>\r\n\r\n<p>বিদেশ থেকে, বিশেষত আক্রান্ত দেশগুলো থেকে যাঁরা এসেছেন, তাঁদের সবাইকে হোম কোয়ারেন্টিনে রাখতে সবার সহযোগিতা দরকার। কারও প্রতিবেশী, আত্মীয়স্বজন কেউ করোনা&ndash;আক্রান্ত দেশ থেকে এসে হোম কোয়ারেন্টিনে না থাকলে বা বাইরে ঘোরাফেরা করলে সে তথ্য অবশ্যই স্বাস্থ্য অধিদপ্তরের হটলাইন বা স্থানীয় পর্যায়ে সরকারের উদ্যোগে করোনা মোকাবিলায় গঠিত কমিটিগুলোকে জানাতে হবে। এ জন্য জনগণের সহযোগিতা খুব দরকার।</p>', 'dfgfd', 'gfdsg', 1, 1, 1, 1, 0, '2020-03-22 00:02:29', '2020-03-22 00:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notice` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice`, `status`, `created_at`, `updated_at`) VALUES
(8, 'ggdhgfdhgf', 1, '2020-03-15 06:12:29', '2020-03-15 06:12:29'),
(9, 'gfdhgfhgfh', 1, '2020-03-15 06:12:34', '2020-03-15 06:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `our_says`
--

CREATE TABLE `our_says` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'oursay.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_says`
--

INSERT INTO `our_says` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'fdsgfdbhgfhfgfh grfgfdsg dfs gdfs gdfg fdg gfds', '<p>sgsdgdfsfdsgdsgsdfg gds gdsf gfds ggdf gbfdg fgd hfsd ghhfg hfgh fgh</p>', '1584351748oursay.jpg', '2020-03-16 03:29:43', '2020-03-16 03:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_getways`
--

CREATE TABLE `payment_getways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poll` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll_results`
--

CREATE TABLE `poll_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poll_id` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_deleted` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `cate_id`, `meta_description`, `meta_keyword`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(33, 'ঢাকাঢাকা', 'ঢাকা', 42, 'ডশফ', 'ফডশফডশ', 1, 0, '2020-03-21 23:02:00', '2020-03-21 23:02:26'),
(34, 'এশিয়া', 'এশিয়া', 43, 'দস্ফ', 'ফদসাফ', 1, 0, '2020-03-21 23:14:21', NULL),
(35, 'ইউরোপ', 'ফডশাফ', 42, 'ফডশাফ', 'ফডশাফ', 1, 0, '2020-03-21 23:14:41', NULL),
(36, 'হলিউড', 'হলিউড', 44, 'চভভবচ', 'বচভক্সবচ', 1, 0, '2020-03-22 00:25:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_districts`
--

CREATE TABLE `sub_districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` bigint(20) UNSIGNED DEFAULT NULL,
  `district_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'team.jpg',
  `facebook_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `email`, `phone`, `address`, `description`, `image`, `facebook_logo`, `facebook`, `twitter_logo`, `twitter`, `instagram_logo`, `instagram`, `youtube_logo`, `youtube`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GFDSG', 'SGDSG', 'DSGDFSG', 'DSGDFG', 'DFSGDFS', 'GDFSGDFG', 'team.jpg', 'fab fa-facebook', 'DGFDGDF', 'fab fa-twitter', 'GDFSG', 'fab fa-instagram', NULL, 'fab fa-youtube', NULL, 1, '2020-03-17 00:32:20', '2020-03-17 00:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `theme_colors`
--

CREATE TABLE `theme_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `web_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hover_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uniques`
--

CREATE TABLE `uniques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uniques`
--

INSERT INTO `uniques` (`id`, `key`, `info`, `created_at`, `updated_at`) VALUES
(2, 'contact', '{\"name\":\"Qayum Hasan\",\"address\":\"<p>gdfsggdsfsgfdsgfsdfhdfdsgfgssfdsgdfsgfdsgsdg<\\/p>\",\"phoneone\":\"dsfgdfssg\",\"phonetwo\":\"fdsgfdg\",\"telephone\":\"fdsgfdg\",\"email\":\"fdgfdg@gmail.com\"}', '2020-03-15 00:52:06', '2020-03-15 01:21:55'),
(4, 'seo', '{\"title\":\"dsgdf\",\"author\":\"gdfsg\",\"keyword\":\"dfsgdfg\",\"description\":\"dfsgdf\",\"gverification\":\"sgdfsgdfgdfgdfsgds\",\"bverification\":\"sgdfsgdfg\",\"ganalytics\":\"dfsg\",\"alexaanalytics\":\"dfsgfdg\"}', '2020-03-15 04:56:42', '2020-03-15 04:56:42'),
(5, 'social', '{\"id\":\"1\",\"facebook\":\"https:\\/\\/www.facebook.com\\/Qayum.hasan\",\"twitter\":\"dsfdsffsdafdsafdsaffdsf\",\"youtube\":\"sdfsdfdsafdsfsdfdsfdsaf\",\"instagram\":\"fsdf\",\"android\":\"dsfdsf\",\"apple\":\"dsfds\",\"feed\":\"fdsfds\"}', '2020-03-15 05:53:46', '2020-03-22 03:48:43'),
(7, 'logo', '\"{\\\"frontlogo\\\":\\\"1.jpg\\\",\\\"favicon\\\":\\\"2.jpg\\\",\\\"adminlogo\\\":\\\"3.jpg\\\",\\\"loginbanner\\\":\\\"4.jpg\\\"}\"', '2020-03-15 23:49:43', '2020-03-15 23:49:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_menus`
--
ALTER TABLE `admin_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_menu_items_menu_foreign` (`menu`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_photos_gallery_id_foreign` (`gallery_id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_posts`
--
ALTER TABLE `news_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_says`
--
ALTER TABLE `our_says`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_getways`
--
ALTER TABLE `payment_getways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll_results`
--
ALTER TABLE `poll_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sub_districts`
--
ALTER TABLE `sub_districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_districts_division_id_foreign` (`division_id`),
  ADD KEY `sub_districts_district_id_foreign` (`district_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme_colors`
--
ALTER TABLE `theme_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uniques`
--
ALTER TABLE `uniques`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin_menus`
--
ALTER TABLE `admin_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `news_posts`
--
ALTER TABLE `news_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `our_says`
--
ALTER TABLE `our_says`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `payment_getways`
--
ALTER TABLE `payment_getways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_results`
--
ALTER TABLE `poll_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `sub_districts`
--
ALTER TABLE `sub_districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `theme_colors`
--
ALTER TABLE `theme_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uniques`
--
ALTER TABLE `uniques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_menu_items`
--
ALTER TABLE `admin_menu_items`
  ADD CONSTRAINT `admin_menu_items_menu_foreign` FOREIGN KEY (`menu`) REFERENCES `admin_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  ADD CONSTRAINT `gallery_photos_gallery_id_foreign` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_districts`
--
ALTER TABLE `sub_districts`
  ADD CONSTRAINT `sub_districts_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sub_districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
