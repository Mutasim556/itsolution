-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2025 at 02:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itsolution`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `about_us_title` varchar(255) DEFAULT NULL,
  `short_details` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `points` text DEFAULT NULL,
  `project_line` text DEFAULT NULL,
  `resp_person_name` varchar(255) DEFAULT NULL,
  `resp_person_desig` varchar(255) DEFAULT NULL,
  `resp_person_image` varchar(255) DEFAULT NULL,
  `resp_person_signature` varchar(255) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `company_name`, `about_us_title`, `short_details`, `details`, `points`, `project_line`, `resp_person_name`, `resp_person_desig`, `resp_person_image`, `resp_person_signature`, `experience`, `image1`, `image2`, `video_link`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'BIPEBD', 'Empowering Businesses with Smart IT Solutions', 'BIPEBD is a trusted IT solutions company helping businesses embrace digital transformation. We deliver software, web, mobile, cloud, and IT consultancy tailored to client needs. With innovation and reliability, BIPEBD empowers organizations to grow smarter and faster.', '<p><strong>BIPEBD</strong> is a leading IT solutions company dedicated to helping businesses embrace digital transformation. We specialize in providing innovative software development, web solutions, mobile applications, cloud services, and IT consultancy tailored to meet the unique needs of our clients. With a focus on reliability, innovation, and customer success, BIPEBD empowers organizations to grow smarter and operate more efficiently in today&rsquo;s fast-paced digital world.</p>', 'BIPEBD is a leading IT solutions company driving digital transformation for businesses.||We provide software, web, mobile, cloud, and IT consultancy tailored to client needs.||With innovation and reliability, we help organizations grow smarter and faster.', 'BIPEBD successfully delivers innovative IT projects that drive business growth and efficiency', 'BACCHA RABBI', 'CEO', 'public/admin/file/aboutus/aboutus-images/aboutusRespPerson1758640300.png', 'public/admin/file/aboutus/aboutus-images/aboutusRespPersonSig1758640300.png', 6, 'public/admin/file/aboutus/aboutus-images/aboutus11758640300.JPG', 'public/admin/file/aboutus/aboutus-images/aboutus21758640301.JPG', 'B_6d3RBiEN0', 1, 0, NULL, NULL, '2025-09-23 14:09:12', '2025-10-13 15:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `adjustments`
--

CREATE TABLE `adjustments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_no` varchar(255) DEFAULT NULL,
  `warehouse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `total_qty` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adjustments`
--

INSERT INTO `adjustments` (`id`, `reference_no`, `warehouse_id`, `document`, `total_qty`, `product_id`, `note`, `action`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'adj-1707363761', 1, 'admin/inventory/file/product/file/ADJUSTMENT_FILE1707363761.jpg', '0', '1', 'Test', '+', 1, 1, '2024-02-08 03:42:41', '2024-02-08 03:42:41'),
(2, 'adj-1707364735', 1, 'admin/inventory/file/product/file/ADJUSTMENT_FILE1707364735.jpg', '2', '1', 'TEest', '-', 1, 1, '2024-02-08 03:58:55', '2024-02-08 03:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive 1=Active',
  `delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Not Deleted 1=Deleted',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `username`, `image`, `email_verified_at`, `password`, `status`, `delete`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mutasim', 'admin@admin.com', '01724698392', 'mutasim', NULL, NULL, '$2y$12$HLtGGizRif/tkCXGwEBvXuAn6Z7nku05xQ6aIi65xZYQ8yZbhNPjC', 1, 0, 'HLdy2G8WVKGsNKB4vvYf2Q6EzFDDaqsh9HVUPVMemIctyVuuliXUE7FujHMY', '2023-12-27 21:23:43', '2024-01-01 03:35:27'),
(2, 'Admin', 'ad@ad.com', '01724698393', 'ad', NULL, NULL, '$2y$12$j0lXSaKyr/SMfajg6sUMw.yNiX0a5b02NbCsqsSttuGB.erujxR3C', 1, 0, '302326', '2023-12-28 04:26:30', '2024-02-04 09:50:05'),
(3, 'Test', 'test@gmail.com', '32165498778', 'test123', NULL, NULL, '$2y$12$aQCUleyTP3eV0iZfW4DJTeCmecThDtauS4Ju9pUls2/vKcSFtUFRy', 1, 0, '803426', '2023-12-30 21:12:48', '2024-01-11 04:34:22'),
(4, 'Test2', 'test2@gmail.com', '32145678985', 'test2', NULL, NULL, '$2y$12$zS91mUSExngJkXSXeeFR2.OjeyF9rCntzn1nWzYfYuyqPHSI8of1W', 0, 1, NULL, '2023-12-31 08:59:38', '2023-12-31 09:34:37'),
(8, 'tttt', 'mutasimstore@gmail.com', '01724698394', 'ttt@admin.com', NULL, NULL, '$2y$12$ECNXkDfuhKdYZnKbPwqTUOEtW.PXmsg1CcgpxJ82ydFqSkrQeCR3G', 1, 0, NULL, '2025-10-18 03:48:16', '2025-10-18 03:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `api_key`, `created_at`, `updated_at`) VALUES
(1, 'fdd77a90f3msh8a9f787264252d4p1cb68ejsn41d6ad25230e', '2024-01-01 09:40:17', '2024-01-01 10:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `details`, `images`, `video`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'How Bangladesh is Achieving Export Diversification', '<p>sdfsdfsdfsdf</p>', '[\"public\\/admin\\/file\\/blog\\/blog-images\\/blogImg01761551030.png\",\"public\\/admin\\/file\\/blog\\/blog-images\\/blogImg11761551030.png\",\"public\\/admin\\/file\\/blog\\/blog-images\\/blogImg21761551030.png\"]', 'https://www.youtube.com/watch?v=mIepVrEixyM', 1, 0, NULL, NULL, '2025-10-27 07:20:15', '2025-10-27 07:54:25'),
(2, 'How Bangladesh is Achieving Export Diversification  3', '<p>A blog is a website or part of a website that publishes regularly updated content, like articles, photos, and videos, in reverse chronological order (newest first).&nbsp;These posts are often informal and conversational, focusing on a specific topic or personal interests.&nbsp;Key details include&nbsp;regular updates, interactive features like comment sections, and the use of the content for various purposes like sharing information, building a community, or marketing.&nbsp;&nbsp;</p>\r\n\r\n<p>Key characteristics of a blog</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Regularly updated:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs are defined by their frequent updates to keep content fresh and readers engaged.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Reverse chronological order:</strong>&nbsp;</p>\r\n\r\n	<p>New posts are displayed at the top of the page, with older posts appearing further down.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Interactive:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs allow for reader engagement through comments and social sharing, helping to build a community.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Conversational style:</strong>&nbsp;</p>\r\n\r\n	<p>Content is often written in a personal or informal tone.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Multimedia content:</strong>&nbsp;</p>\r\n\r\n	<p>While often text-based, blogs also frequently include images, videos, and audio.&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Purposes of a blog</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Personal expression:</strong>&nbsp;</p>\r\n\r\n	<p>A personal blog can act as an online journal for sharing personal stories, experiences, and opinions.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Business and marketing:</strong>&nbsp;</p>\r\n\r\n	<p>Businesses use blogs to share information, build authority, connect with customers, promote products or services, and improve SEO.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Information and authority:</strong>&nbsp;</p>\r\n\r\n	<p>They can be used to provide expert advice, news, and commentary on a specific topic, such as technology or fashion.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Community building:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs can serve as a central hub for a community to discuss a shared interest.&nbsp;</p>\r\n	</li>\r\n</ul>', '[\"public\\/admin\\/file\\/blog\\/blog-images\\/blogImg01761551748.png\",\"public\\/admin\\/file\\/blog\\/blog-images\\/blogImg11761551748.png\",\"public\\/admin\\/file\\/blog\\/blog-images\\/blogImg21761551748.png\"]', 'https://www.youtube.com/watch?v=mIepVrEixyM', 1, 0, 1, NULL, '2025-10-27 07:55:48', '2025-10-27 09:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_image` varchar(255) DEFAULT NULL,
  `brand_status` tinyint(1) NOT NULL DEFAULT 1,
  `brand_create_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`, `brand_status`, `brand_create_by`, `created_at`, `updated_at`) VALUES
(9, 'Samsung', 'admin/inventory/file/brand/Samsung1705375019.jpg', 1, 1, '2024-01-16 03:16:59', '2024-01-16 04:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `category_status` tinyint(1) NOT NULL DEFAULT 1,
  `category_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Not Deleted 1=Deleted',
  `category_added_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_category_id`, `category_name`, `category_image`, `category_status`, `category_delete`, `category_added_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mobile', '', 1, 0, 1, '2024-01-21 10:06:35', '2024-09-22 05:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `designation`, `comments`, `image`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'OFFICER, IT', '<p>Could you clarify what kind of <strong>comments</strong> you mean?<br />\r\nHere are a few possible interpretations &mdash; please pick one:</p>', 'public/admin/file/comments/comments-images/commentsImg1760549470.png', 1, 0, NULL, NULL, '2025-10-15 17:31:10', '2025-10-15 17:31:10');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`, `address`, `location`, `facebook`, `youtube`, `twitter`, `linkedin`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '01724698392', 'mutasimstore@gmail.com', 'ZORABARI , MIRZAGONJ , DOMAR , NILPHAMARI', '!1m18!1m12!1m3!1d3651.402556043117!2d90.39544378576768!3d23.768675333060777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c763f54c8c75%3A0x81158a19c931e218!2sIncepta%20Pharmaceuticals%20Ltd.!5e0!3m2!1sen!2sbd!4v1760683071554!5m2!1sen!2sbd', 'https://www.facebook.com/profile.php?id=61574154040549', 'https://www.youtube.com/', NULL, NULL, 1, 0, NULL, NULL, '2025-09-23 16:42:06', '2025-10-17 18:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `countings`
--

CREATE TABLE `countings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `counting1_name` varchar(100) DEFAULT NULL,
  `counting1_value` varchar(100) DEFAULT NULL,
  `counting2_name` varchar(100) DEFAULT NULL,
  `counting2_value` varchar(100) DEFAULT NULL,
  `counting3_name` varchar(100) DEFAULT NULL,
  `counting3_value` varchar(100) DEFAULT NULL,
  `counting4_name` varchar(100) DEFAULT NULL,
  `counting4_value` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countings`
--

INSERT INTO `countings` (`id`, `counting1_name`, `counting1_value`, `counting2_name`, `counting2_value`, `counting3_name`, `counting3_value`, `counting4_name`, `counting4_value`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Planing Solution', '26', 'Projects Analizs', '35', 'Growing Business', '156', 'Team Support', '55', 1, 0, NULL, NULL, '2025-10-13 15:19:11', '2025-10-13 15:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `country_representations`
--

CREATE TABLE `country_representations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_representations`
--

INSERT INTO `country_representations` (`id`, `name`, `logo`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Aljazeera', 'public/admin/file/public-diplomacy/country/countryImg1761502915.png', 1, 0, NULL, NULL, '2025-10-26 17:37:39', '2025-10-26 18:21:55'),
(2, 'CNN', 'public/admin/file/public-diplomacy/country/countryImg1761503010.png', 1, 0, NULL, NULL, '2025-10-26 18:23:30', '2025-10-26 18:23:30'),
(3, 'Euronews', 'public/admin/file/public-diplomacy/country/countryImg1761503025.png', 1, 0, NULL, NULL, '2025-10-26 18:23:45', '2025-10-26 18:23:45'),
(4, 'BBC', 'public/admin/file/public-diplomacy/country/countryImg1761503037.png', 1, 0, NULL, NULL, '2025-10-26 18:23:57', '2025-10-26 18:23:57'),
(5, 'Bloomberg', 'public/admin/file/public-diplomacy/country/countryImg1761503052.png', 1, 0, NULL, NULL, '2025-10-26 18:24:13', '2025-10-26 18:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homepage_silders`
--

CREATE TABLE `homepage_silders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` text DEFAULT NULL,
  `slider_short_description` text DEFAULT NULL,
  `slider_link` text DEFAULT NULL,
  `slider_button_text` text DEFAULT NULL,
  `slider_image` text DEFAULT NULL,
  `slider_video` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= Not Deleted & 1=Deleted',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homepage_silders`
--

INSERT INTO `homepage_silders` (`id`, `slider_title`, `slider_short_description`, `slider_link`, `slider_button_text`, `slider_image`, `slider_video`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Best IT-Solution And Businessdd', 'Nullam eu nibh vitae est tempor molestie id sed exthe. Quisque dignissim maximus ipsum metus ipsum.', 'xxxx', 'Contact Us', 'itsolution/files/settings/homepage/slider/1760363882img1.jpg', 'JoIvmDtXalI', 0, 0, 1, 1, '2025-10-13 13:58:05', '2025-10-24 15:56:49'),
(2, NULL, NULL, NULL, NULL, 'itsolution/files/settings/homepage/slider/1761323853img1.jpg', NULL, 1, 0, 1, 1, '2025-10-18 07:24:26', '2025-10-24 16:37:35'),
(3, 'Test', NULL, NULL, NULL, 'itsolution/files/settings/homepage/slider/1760772784img1.png', NULL, 0, 0, 1, 1, '2025-10-18 07:33:05', '2025-10-24 15:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `default` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `lang`, `slug`, `default`, `status`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'en', 1, 1, 0, '2024-01-01 04:36:10', '2024-01-01 06:21:12'),
(2, 'Bangla', 'bn', 'bn', 0, 1, 0, '2024-01-01 04:55:16', '2024-01-01 05:02:27'),
(3, 'Persian', 'fa', 'fa', 0, 0, 1, '2024-01-01 05:02:45', '2024-01-01 05:02:54'),
(4, 'Hindi', 'hi', 'hi', 0, 0, 0, '2024-01-01 06:27:57', '2025-10-17 09:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_panel_logo` varchar(255) DEFAULT NULL,
  `admin_panel_mobile_logo` varchar(255) DEFAULT NULL,
  `admin_panel_icon` varchar(255) DEFAULT NULL,
  `main_site_header_logo` varchar(255) DEFAULT NULL,
  `main_site_header_mobile_logo` varchar(255) DEFAULT NULL,
  `main_site_footer_logo` varchar(255) DEFAULT NULL,
  `main_site_footer_mobile_logo` varchar(255) DEFAULT NULL,
  `main_site_icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `admin_panel_logo`, `admin_panel_mobile_logo`, `admin_panel_icon`, `main_site_header_logo`, `main_site_header_mobile_logo`, `main_site_footer_logo`, `main_site_footer_mobile_logo`, `main_site_icon`, `created_at`, `updated_at`) VALUES
(1, 'public/admin/file/logos/adminPanelLogo1760725196.jpg', NULL, 'public/admin/file/logos/adminPanelIcon1760284951.png', 'public/admin/file/logos/mainSiteHeaderLogo1761320119.png', NULL, 'public/admin/file/logos/mainSiteFooterLogo1760284756.png', NULL, 'public/admin/file/logos/mainSiteIcon1760284756.png', '2025-10-12 15:39:01', '2025-10-24 15:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `maintenances`
--

CREATE TABLE `maintenances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `secret_code` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `mail_option` varchar(255) NOT NULL,
  `mail_subject` varchar(255) NOT NULL,
  `mail_body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `logo`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Amcham Bangladesh', 'public/admin/file/memberof/member/memberImg1761506444.png', 1, 1, NULL, NULL, '2025-10-26 19:16:22', '2025-10-26 19:21:11'),
(2, 'AAAB', 'public/admin/file/memberof/member/memberImg1761506272.png', 1, 1, NULL, NULL, '2025-10-26 19:17:52', '2025-10-26 19:21:17'),
(3, 'AAAB', 'public/admin/file/memberof/member/memberImg1761506288.png', 1, 0, NULL, NULL, '2025-10-26 19:18:08', '2025-10-26 19:18:08'),
(4, 'Amcham Bangladesh', 'public/admin/file/memberof/member/memberImg1761506337.png', 1, 0, NULL, NULL, '2025-10-26 19:18:57', '2025-10-26 19:18:57'),
(5, 'Amcham Bangladesh', 'public/admin/file/memberof/member/memberImg1761506347.png', 1, 1, NULL, NULL, '2025-10-26 19:19:07', '2025-10-26 19:21:20'),
(6, 'Amcham Bangladesh', 'public/admin/file/memberof/member/memberImg1761506430.png', 1, 1, NULL, NULL, '2025-10-26 19:20:30', '2025-10-26 19:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `subscription` tinyint(1) NOT NULL DEFAULT 1,
  `reply_status` tinyint(1) NOT NULL DEFAULT 0,
  `reply_message` text DEFAULT NULL,
  `replied_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `phone`, `email`, `message`, `subscription`, `reply_status`, `reply_message`, `replied_by`, `created_at`, `updated_at`) VALUES
(1, 5, 'Sumit', '1232456789', 'mutasimstore@gmail.com', 'TEst', 1, 0, NULL, NULL, '2025-10-17 16:32:59', '2025-10-17 16:32:59'),
(2, 5, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'aSasASas', 1, 0, NULL, NULL, '2025-10-17 16:35:01', '2025-10-17 16:35:01'),
(3, 5, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'ASAsAS', 1, 0, NULL, NULL, '2025-10-17 16:35:11', '2025-10-17 16:35:11'),
(4, 5, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'ZXCXCXZCZXC', 1, 0, NULL, NULL, '2025-10-17 16:35:42', '2025-10-17 16:35:42'),
(5, 5, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'ASDASDSAD', 1, 0, NULL, NULL, '2025-10-17 16:36:10', '2025-10-17 16:36:10'),
(6, 5, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'ASDASD', 1, 0, NULL, NULL, '2025-10-17 16:38:27', '2025-10-17 16:38:27'),
(7, 5, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'ASDASD', 1, 0, NULL, NULL, '2025-10-17 16:42:41', '2025-10-17 16:42:41'),
(8, 5, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'sdfafsd', 1, 0, NULL, NULL, '2025-10-17 16:42:47', '2025-10-17 16:42:47'),
(9, 5, 'Tanvir Islam', '01729067060', 'bipebddomain@gmail.com', 'sdfsdf', 1, 0, NULL, NULL, '2025-10-17 16:43:55', '2025-10-17 16:43:55'),
(10, 5, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'asd', 1, 0, NULL, NULL, '2025-10-17 16:43:59', '2025-10-17 16:43:59'),
(11, 5, 'Tanvir Islam', '01729067060', 'bipebddomain@gmail.com', 'asdas', 1, 0, NULL, NULL, '2025-10-17 16:44:04', '2025-10-17 16:44:04'),
(12, 5, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'rrr', 1, 0, NULL, NULL, '2025-10-17 18:22:14', '2025-10-17 18:22:14'),
(13, 5, 'Tanvir Islam', '01729067060', 'bipebddomain@gmail.com', 'qwewq', 1, 0, NULL, NULL, '2025-10-17 18:22:22', '2025-10-17 18:22:22'),
(14, 5, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'qweqwe', 1, 0, NULL, NULL, '2025-10-17 18:22:26', '2025-10-17 18:22:26'),
(15, NULL, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'ASDD', 1, 0, NULL, NULL, '2025-10-26 15:49:07', '2025-10-26 15:49:07'),
(16, NULL, 'MD. MUTASIM NAIB', '01724698392', 'mutasimstore@gmail.com', 'asdas', 1, 0, NULL, NULL, '2025-10-26 15:49:14', '2025-10-26 15:49:14'),
(17, NULL, 'MD. MUTASIM NAIBas', '01724698392', 'mutasimstore@gmail.com', 'asdas', 1, 0, NULL, NULL, '2025-10-26 15:49:19', '2025-10-26 15:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_27_095019_create_permission_tables', 1),
(6, '2023_12_27_101553_create_admins_table', 1),
(7, '2024_01_01_094807_create_languages_table', 2),
(8, '2024_01_01_145421_create_api_keys_table', 3),
(10, '2024_01_10_122602_create_maintenances_table', 4),
(11, '2024_01_14_115552_create_units_table', 5),
(12, '2024_01_15_154038_create_brands_table', 6),
(13, '2024_01_16_113225_create_sizes_table', 7),
(15, '2024_01_16_152135_create_parent_categories_table', 8),
(17, '2024_01_17_101945_create_categories_table', 9),
(18, '2024_01_17_151142_create_products_table', 10),
(20, '2024_01_21_114916_create_product_variants_table', 11),
(23, '2024_01_28_102931_create_warehouses_table', 13),
(24, '2024_01_21_130843_create_warehouse_prices_table', 14),
(25, '2024_01_30_121027_create_sessions_table', 15),
(26, '2023_06_07_000001_create_pulse_tables', 16),
(28, '2024_02_04_134433_create_adjustments_table', 17),
(29, '2024_10_22_133337_create_homepage_silders_table', 18),
(30, '2025_01_09_165906_create_translations_table', 18),
(31, '2025_07_12_174229_create_about_us_table', 18),
(32, '2025_07_12_193602_create_contacts_table', 19),
(33, '2025_07_12_001100_create_services_table', 20),
(34, '2025_07_19_122821_add_service_name_slug_to_services_table', 20),
(35, '2025_09_24_220747_add_service_icon_to_services', 21),
(36, '2025_09_26_091739_create_teams_table', 22),
(38, '2025_09_28_100751_create_partners_table', 24),
(39, '2025_09_29_133042_create_comments_table', 24),
(40, '2025_09_29_163146_create_countings_table', 24),
(41, '2025_10_08_125638_create_works_table', 24),
(42, '2025_10_08_194534_add_work_details_to_works_table', 25),
(43, '2025_10_08_200549_add_work_status_to_works_table', 26),
(44, '2025_10_09_002159_add_work_address_to_users_table', 27),
(45, '2025_10_09_094606_create_work_payments_table', 28),
(46, '2025_10_10_102215_create_work_updates_table', 29),
(47, '2025_10_12_203532_create_logos_table', 30),
(49, '2025_08_06_193340_create_messages_table', 31),
(50, '2025_10_18_101132_add_customer_feedback_to_work_updates_table', 32),
(51, '2025_09_27_135535_create_projects_table', 33),
(52, '2025_10_26_121423_add_video_link_to_projects_table', 33),
(53, '2025_10_26_231100_create_country_representations_table', 34),
(54, '2025_10_27_010303_create_members_table', 35),
(55, '2025_10_27_084058_create_public_diplomacies_table', 36),
(56, '2025_10_27_130303_create_blogs_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 2),
(2, 'App\\Models\\Admin', 3),
(2, 'App\\Models\\Admin', 4),
(2, 'App\\Models\\Admin', 6),
(2, 'App\\Models\\Admin', 7),
(2, 'App\\Models\\Admin', 8);

-- --------------------------------------------------------

--
-- Table structure for table `parent_categories`
--

CREATE TABLE `parent_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_category_name` varchar(255) NOT NULL,
  `parent_category_image` varchar(255) DEFAULT NULL,
  `parent_category_status` tinyint(1) NOT NULL DEFAULT 1,
  `parent_category_delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Not Deleted 1=Deleted',
  `parent_category_added_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_categories`
--

INSERT INTO `parent_categories` (`id`, `parent_category_name`, `parent_category_image`, `parent_category_status`, `parent_category_delete`, `parent_category_added_by`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '', 1, 0, 1, '2024-01-21 10:06:20', '2024-01-21 10:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner_name` varchar(100) DEFAULT NULL,
  `partner_details` text DEFAULT NULL,
  `partner_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `partner_name`, `partner_details`, `partner_image`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', '<p>asdfad</p>', 'public/admin/file/partner/partner-images/partnerImg1761379777.jpg', 1, 0, NULL, NULL, '2025-10-15 16:46:33', '2025-10-26 17:11:32'),
(2, 'Bangladesh', '<p>sddsfds</p>', 'public/admin/file/partner/partner-images/partnerImg1761379835.jpg', 1, 0, NULL, NULL, '2025-10-25 08:10:36', '2025-10-25 08:10:36'),
(3, 'Bangladesh', '<p>sddsfds</p>', 'public/admin/file/partner/partner-images/partnerImg1761379852.jpg', 1, 0, NULL, NULL, '2025-10-25 08:10:52', '2025-10-25 08:10:52'),
(4, 'Bangladesh', '<p>sddsfds</p>', 'public/admin/file/partner/partner-images/partnerImg1761379864.jpg', 1, 0, NULL, NULL, '2025-10-25 08:11:04', '2025-10-25 08:11:04'),
(5, 'Bangladesh', '<p>sddsfds</p>', 'public/admin/file/partner/partner-images/partnerImg1761379902.jpg', 1, 0, NULL, NULL, '2025-10-25 08:11:42', '2025-10-25 08:11:42'),
(6, 'Bangladesh', '<p>sddsfds</p>', 'public/admin/file/partner/partner-images/partnerImg1761379911.jpg', 1, 0, NULL, NULL, '2025-10-25 08:11:51', '2025-10-25 08:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$12$e1LyZZhyq8sEB828u6m1h.FpHdgkfLr5f6aULRHCWxAwKaEd6rry6', '2024-01-10 07:09:02');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'user-index', 'admin', 'User Permissions', '2023-12-27 21:23:42', '2023-12-27 21:23:42'),
(2, 'user-create', 'admin', 'User Permissions', '2023-12-27 21:23:43', '2023-12-27 21:23:43'),
(3, 'user-update', 'admin', 'User Permissions', '2023-12-27 21:23:43', '2023-12-27 21:23:43'),
(4, 'user-delete', 'admin', 'User Permissions', '2023-12-27 21:23:43', '2023-12-27 21:23:43'),
(5, 'role-permission-index', 'admin', 'Roles And Permissions', '2023-12-31 10:35:34', '2023-12-31 10:35:34'),
(6, 'role-permission-create', 'admin', 'Roles And Permissions', '2023-12-31 10:35:34', '2023-12-31 10:35:34'),
(7, 'role-permission-update', 'admin', 'Roles And Permissions', '2023-12-31 10:35:34', '2023-12-31 10:35:34'),
(8, 'role-permission-delete', 'admin', 'Roles And Permissions', '2023-12-31 10:35:34', '2023-12-31 10:35:34'),
(9, 'language-index', 'admin', 'Language Permissions', '2024-01-01 04:15:40', '2024-01-01 04:15:40'),
(10, 'language-create', 'admin', 'Language Permissions', '2024-01-01 04:15:40', '2024-01-01 04:15:40'),
(11, 'language-update', 'admin', 'Language Permissions', '2024-01-01 04:15:40', '2024-01-01 04:15:40'),
(12, 'language-delete', 'admin', 'Language Permissions', '2024-01-01 04:15:40', '2024-01-01 04:15:40'),
(13, 'backend-string-generate', 'admin', 'Backend Language Permissions', '2024-01-01 07:49:20', '2024-01-01 07:49:20'),
(14, 'backend-string-translate', 'admin', 'Backend Language Permissions', '2024-01-01 07:49:20', '2024-01-01 07:49:20'),
(15, 'backend-string-update', 'admin', 'Backend Language Permissions', '2024-01-01 07:49:20', '2024-01-01 07:49:20'),
(16, 'backend-string-index', 'admin', 'Backend Language Permissions', '2024-01-01 07:55:45', '2024-01-01 07:55:45'),
(17, 'backend-api-accesskey', 'admin', 'Backend Language Permissions', '2024-01-01 07:55:45', '2024-01-01 07:55:45'),
(18, 'specific-permission-create', 'admin', 'Roles And Permissions', '2024-01-02 09:27:44', '2024-01-02 09:27:44'),
(19, 'maintenance-mode-index', 'admin', 'Settings Permissions', '2024-01-10 05:11:32', '2024-01-10 05:11:32'),
(20, 'unit-index', 'admin', 'Product Units Permissions', '2024-01-14 06:20:59', '2024-01-14 06:20:59'),
(21, 'unit-store', 'admin', 'Product Units Permissions', '2024-01-14 07:46:45', '2024-01-14 07:46:45'),
(22, 'unit-update', 'admin', 'Product Units Permissions', '2024-01-14 07:46:45', '2024-01-14 07:46:45'),
(23, 'unit-delete', 'admin', 'Product Units Permissions', '2024-01-14 07:46:45', '2024-01-14 07:46:45'),
(24, 'brand-index', 'admin', 'Product Brands Permissions', '2024-01-15 09:57:25', '2024-01-15 09:57:25'),
(25, 'brand-store', 'admin', 'Product Brands Permissions', '2024-01-15 09:57:25', '2024-01-15 09:57:25'),
(26, 'brand-update', 'admin', 'Product Brands Permissions', '2024-01-15 09:57:25', '2024-01-15 09:57:25'),
(27, 'brand-delete', 'admin', 'Product Brands Permissions', '2024-01-15 09:57:25', '2024-01-15 09:57:25'),
(28, 'size-index', 'admin', 'Product Sizes Permissions', '2024-01-16 06:54:24', '2024-01-16 06:54:24'),
(29, 'size-store', 'admin', 'Product Sizes Permissions', '2024-01-16 06:54:24', '2024-01-16 06:54:24'),
(30, 'size-update', 'admin', 'Product Sizes Permissions', '2024-01-16 06:54:24', '2024-01-16 06:54:24'),
(31, 'size-delete', 'admin', 'Product Sizes Permissions', '2024-01-16 06:54:24', '2024-01-16 06:54:24'),
(32, 'parent-category-index', 'admin', 'Product Parent Category Permissions', '2024-01-16 09:31:49', '2024-01-16 09:31:49'),
(33, 'parent-category-store', 'admin', 'Product Parent Category Permissions', '2024-01-16 09:31:49', '2024-01-16 09:31:49'),
(34, 'parent-category-update', 'admin', 'Product Parent Category Permissions', '2024-01-16 09:31:49', '2024-01-16 09:31:49'),
(35, 'parent-category-delete', 'admin', 'Product Parent Category Permissions', '2024-01-16 09:31:49', '2024-01-16 09:31:49'),
(36, 'category-index', 'admin', 'Product Category Permissions', '2024-01-17 04:39:19', '2024-01-17 04:39:19'),
(37, 'category-store', 'admin', 'Product Category Permissions', '2024-01-17 04:39:20', '2024-01-17 04:39:20'),
(38, 'category-update', 'admin', 'Product Category Permissions', '2024-01-17 04:39:20', '2024-01-17 04:39:20'),
(39, 'category-delete', 'admin', 'Product Category Permissions', '2024-01-17 04:39:20', '2024-01-17 04:39:20'),
(40, 'product-index', 'admin', 'Product Permissions', '2024-01-17 09:44:12', '2024-01-17 09:44:12'),
(41, 'product-store', 'admin', 'Product Permissions', '2024-01-17 09:44:12', '2024-01-17 09:44:12'),
(42, 'warehouse-index', 'admin', 'Warehouse Permissions', '2024-01-28 03:30:38', '2024-01-28 03:30:38'),
(43, 'warehouse-store', 'admin', 'Warehouse Permissions', '2024-01-28 03:30:39', '2024-01-28 03:30:39'),
(44, 'warehouse-update', 'admin', 'Warehouse Permissions', '2024-01-28 03:30:39', '2024-01-28 03:30:39'),
(45, 'warehouse-delete', 'admin', 'Warehouse Permissions', '2024-01-28 03:30:39', '2024-01-28 03:30:39'),
(46, 'product-update', 'admin', 'Product Permissions', '2024-01-29 03:19:31', '2024-01-29 03:19:31'),
(47, 'product-delete', 'admin', 'Product Permissions', '2024-01-29 03:19:31', '2024-01-29 03:19:31'),
(48, 'print-barcode', 'admin', 'Product Permissions', '2024-02-01 05:17:55', '2024-02-01 05:17:55'),
(49, 'adjustment-index', 'admin', 'Product Permissions', '2024-02-04 10:11:43', '2024-02-04 10:11:43'),
(50, 'adjustment-store', 'admin', 'Product Permissions', '2024-02-04 10:11:43', '2024-02-04 10:11:43'),
(52, 'adjustment-delete', 'admin', 'Product Permissions', '2024-02-04 10:11:43', '2024-02-04 10:11:43'),
(53, 'slider-index', 'admin', 'Homepage Slider', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(54, 'slider-create', 'admin', 'Homepage Slider', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(55, 'slider-update', 'admin', 'Homepage Slider', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(56, 'slider-delete', 'admin', 'Homepage Slider', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(57, 'aboutus-index', 'admin', 'About Us', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(58, 'aboutus-update', 'admin', 'About Us', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(59, 'contact-index', 'admin', 'Contact Us', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(60, 'contact-update', 'admin', 'Contact Us', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(61, 'service-index', 'admin', 'Service', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(62, 'service-create', 'admin', 'Service', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(63, 'service-update', 'admin', 'Service', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(64, 'service-delete', 'admin', 'Service', '2025-09-26 03:03:47', '2025-09-26 03:03:47'),
(65, 'team-index', 'admin', 'Team', '2025-09-26 03:04:45', '2025-09-26 03:04:45'),
(66, 'team-create', 'admin', 'Team', '2025-09-26 03:04:45', '2025-09-26 03:04:45'),
(67, 'team-update', 'admin', 'Team', '2025-09-26 03:04:45', '2025-09-26 03:04:45'),
(68, 'team-delete', 'admin', 'Team', '2025-09-26 03:04:45', '2025-09-26 03:04:45'),
(69, 'project-index', 'admin', 'Project', '2025-09-27 08:00:13', '2025-09-27 08:00:13'),
(70, 'project-create', 'admin', 'Project', '2025-09-27 08:00:13', '2025-09-27 08:00:13'),
(71, 'project-update', 'admin', 'Project', '2025-09-27 08:00:13', '2025-09-27 08:00:13'),
(72, 'project-delete', 'admin', 'Project', '2025-09-27 08:00:13', '2025-09-27 08:00:13'),
(73, 'work-updates-index', 'admin', 'Work Updates', '2025-10-12 14:56:24', '2025-10-12 14:56:24'),
(74, 'work-updates-create', 'admin', 'Work Updates', '2025-10-12 14:56:24', '2025-10-12 14:56:24'),
(75, 'work-updates-update', 'admin', 'Work Updates', '2025-10-12 14:56:24', '2025-10-12 14:56:24'),
(76, 'work-updates-delete', 'admin', 'Work Updates', '2025-10-12 14:56:24', '2025-10-12 14:56:24'),
(77, 'logo-index', 'admin', 'Logo and Icon', '2025-10-12 14:56:24', '2025-10-12 14:56:24'),
(78, 'logo-create', 'admin', 'Logo and Icon', '2025-10-12 14:56:24', '2025-10-12 14:56:24'),
(79, 'logo-update', 'admin', 'Logo and Icon', '2025-10-12 14:56:24', '2025-10-12 14:56:24'),
(80, 'logo-delete', 'admin', 'Logo and Icon', '2025-10-12 14:56:24', '2025-10-12 14:56:24'),
(81, 'messages-index', 'admin', 'Messages', '2025-10-17 17:45:39', '2025-10-17 17:45:39'),
(82, 'messages-create', 'admin', 'Messages', '2025-10-17 17:45:39', '2025-10-17 17:45:39'),
(83, 'country-index', 'admin', 'Country Representation', '2025-10-26 17:10:15', '2025-10-26 17:10:15'),
(84, 'country-create', 'admin', 'Country Representation', '2025-10-26 17:10:15', '2025-10-26 17:10:15'),
(85, 'country-update', 'admin', 'Country Representation', '2025-10-26 17:10:15', '2025-10-26 17:10:15'),
(86, 'country-delete', 'admin', 'Country Representation', '2025-10-26 17:10:15', '2025-10-26 17:10:15'),
(87, 'memberof-index', 'admin', 'Member Of', '2025-10-26 19:14:30', '2025-10-26 19:14:30'),
(88, 'memberof-create', 'admin', 'Member Of', '2025-10-26 19:14:30', '2025-10-26 19:14:30'),
(89, 'memberof-update', 'admin', 'Member Of', '2025-10-26 19:14:30', '2025-10-26 19:14:30'),
(90, 'memberof-delete', 'admin', 'Member Of', '2025-10-26 19:14:30', '2025-10-26 19:14:30'),
(91, 'public-diplomacy-index', 'admin', 'Public Diplomacy', '2025-10-27 02:32:49', '2025-10-27 02:32:49'),
(92, 'public-diplomacy-create', 'admin', 'Public Diplomacy', '2025-10-27 02:32:49', '2025-10-27 02:32:49'),
(93, 'public-diplomacy-update', 'admin', 'Public Diplomacy', '2025-10-27 02:32:49', '2025-10-27 02:32:49'),
(94, 'public-diplomacy-delete', 'admin', 'Public Diplomacy', '2025-10-27 02:32:49', '2025-10-27 02:32:49'),
(95, 'blog-index', 'admin', 'Blog', '2025-10-27 06:46:54', '2025-10-27 06:46:54'),
(96, 'blog-create', 'admin', 'Blog', '2025-10-27 06:46:54', '2025-10-27 06:46:54'),
(97, 'blog-update', 'admin', 'Blog', '2025-10-27 06:46:54', '2025-10-27 06:46:54'),
(98, 'blog-delete', 'admin', 'Blog', '2025-10-27 06:46:54', '2025-10-27 06:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `barcode_symbology` varchar(255) NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unit_size` int(11) NOT NULL,
  `cartoon_size` int(11) NOT NULL,
  `purchase_unit_id` int(11) DEFAULT NULL,
  `sale_unit_id` int(11) DEFAULT NULL,
  `cost` double NOT NULL,
  `price` double NOT NULL,
  `qty` double DEFAULT NULL,
  `alert_quantity` double DEFAULT NULL,
  `daily_sale_objective` double DEFAULT NULL,
  `promotion` tinyint(4) DEFAULT NULL,
  `promotion_price` varchar(255) DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `tax_id` int(11) DEFAULT NULL,
  `tax_method` int(11) DEFAULT NULL,
  `image` longtext DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `is_embeded` tinyint(4) DEFAULT NULL,
  `is_variant` tinyint(4) DEFAULT NULL,
  `is_batch` tinyint(4) DEFAULT NULL,
  `is_diffPrice` tinyint(4) DEFAULT NULL,
  `is_imei` tinyint(4) DEFAULT NULL,
  `featured` tinyint(4) DEFAULT NULL,
  `product_list` varchar(255) DEFAULT NULL,
  `variant_list` varchar(255) DEFAULT NULL,
  `qty_list` varchar(255) DEFAULT NULL,
  `price_list` varchar(255) DEFAULT NULL,
  `product_details` text DEFAULT NULL,
  `variant_option` varchar(255) DEFAULT NULL,
  `variant_value` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0= Not Deleted & 1=Deleted',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `type`, `barcode_symbology`, `brand_id`, `category_id`, `unit_id`, `unit_size`, `cartoon_size`, `purchase_unit_id`, `sale_unit_id`, `cost`, `price`, `qty`, `alert_quantity`, `daily_sale_objective`, `promotion`, `promotion_price`, `starting_date`, `last_date`, `tax_id`, `tax_method`, `image`, `file`, `is_embeded`, `is_variant`, `is_batch`, `is_diffPrice`, `is_imei`, `featured`, `product_list`, `variant_list`, `qty_list`, `price_list`, `product_details`, `variant_option`, `variant_value`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'S21+ 5G TEst', '40081316', 'standard', 'C128', 9, 1, 7, 1, 20, 7, 7, 120, 35500, 11, 5, 4, 1, '35300', '2024-01-22', '2024-01-27', 1, 2, 'admin/inventory/file/product/PRODUCT-1706682642981.jpg,admin/inventory/file/product/PRODUCT-1706682642982.jpg', NULL, 1, 1, 0, 1, 1, 1, NULL, NULL, NULL, NULL, '<p><strong>General Model</strong> Samsung Galaxy S21 Plus 5G Released January, 2021 Status Available Design Type Bar Dimensions 161.5 x 75.6 x 7.8 mm Weight 200 Grams Waterproof IP68 dust/water resistant (up to 1.5m for 30 mins) Display Display Type Dynamic AMOLED 2X Size 6.7 inches Resolution 1080 x 2400 pixels Display Colors 16M Pixel Density 394 PPI (pixels per inch) Touch Screen Yes Display Protection Corning Gorilla Glass Victus Features Always-on display Hardware CPU Octa-core (1x2.9 GHz Cortex-X1 & 3x2.80 GHz Cortex-A78 & 4x2.2 GHz Cortex-A55) - International / Octa-core (1x2.84 GHz Kryo 680 & 3x2.42 GHz Kryo 680 & 4x1.80 GHz Kryo 680 - USA/China GPU Mali-G78 MP14 - International / Adreno 660 - USA/China RAM (Memory) 8 GB Internal Storage 128 GB, 256 GB Memory Card Slot No Sensors Fingerprint (under display, ultrasonic), accelerometer, gyro, proximity, compass, barometer Samsung DeX, Samsung Wireless DeX (desktop experience support) ANT+ Bixby natural language commands and dictation Samsung Pay (Visa, MasterCard certified) Ultra Wideband (UWB) support Software Operating System Android 11 + One UI 3.1 User Interface Yes Camera Rear Camera 12 MP (wide) + 64 MP (periscope telephoto) 1.1x optical zoom, 3x hybrid zoom + 12 MP (ultrawide) Super Steady video. Image 4320p Video 8K@24fps, 4K@30/60fps, 1080p@30/60/240fps, 720p@960fps, HDR10+, stereo sound rec., gyro-EIS Flash LED flash, auto-HDR, panorama Front Camera 10 MP (wide) Network SIM Nano SIM Dual SIM Single SIM (Nano-SIM and/or eSIM) or Hybrid Dual SIM (Nano-SIM, dual stand-by) Connectivity Wi-fi Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, hotspot USB USB Type-C 3.2, USB On-The-Go GPS Yes, with A-GPS, GLONASS, BDS, GALILEO NFC Yes Wireless Charging Yes Headphone Jack No Battery Capacity Li-Po 4800 mAh + Fast charging 25W + USB Power Delivery 3.0 + Fast Qi/PMA wireless charging 15W + Reverse wireless charging 4.5W. Placement Non-removable Media Video Playback Yes Video Out Yes FM Radio FM radio (Snapdragon model only; market/operator dependent) Ring Tones Yes Loudspeaker Yes Handsfree Yes Data 4G LTE 1, 2, 3, 4, 5, 7, 8, 12, 13, 14, 18, 19, 20, 25, 26, 28, 30, 38, 39, 40, 41, 46, 48, 66, 71 - SM-G996U1 5G NR Bands SA/NSA/Sub6/mmWave Speed HSPA 42.2/5.76 Mbps, LTE-A (CA), 5G</p>', 'Color,Storage,Processor', 'Green,Pink|8-128,8-256|Snapdragon 888,Exynos 1020', 1, 0, 1, 1, '2024-01-22 04:39:15', '2024-02-08 03:58:55'),
(2, 'S21 5G', '69726636', 'standard', 'C128', 9, 1, 7, 1, 20, 7, 7, 120, 29500, 20, 5, 4, 0, NULL, NULL, NULL, 1, 1, 'admin/inventory/file/product/PRODUCT-1705914656773.jpeg,admin/inventory/file/product/PRODUCT-1705914656774.jpg', NULL, 1, 1, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, 'Color,Strorage,Processor', 'Blue,red|8-128,8-256|Snapdragon 888,Exynos 1020', 1, 0, 1, 1, '2024-01-22 09:12:45', '2024-01-22 09:12:45'),
(3, 'S Series Combo', '80014785', 'combo', 'C128', 9, 1, NULL, 1, 2, NULL, NULL, 0, 62000, NULL, NULL, 4, 0, NULL, NULL, NULL, 1, 1, 'admin/inventory/file/product/PRODUCT-1705988499897.jpeg,admin/inventory/file/product/PRODUCT-1705988499898.jpg', NULL, 1, 0, 0, 0, 0, 1, '2,1', '9,67', '1,1', '29500,35500', '<p>Test</p>', '', '', 1, 0, 1, 1, '2024-01-23 05:41:42', '2024-02-01 05:41:24'),
(11, 'DIgital Test', '62873987', 'digital', 'C128', 9, 1, NULL, 1, 20, NULL, NULL, 0, 35500, NULL, NULL, 4, 0, NULL, NULL, NULL, 1, 1, 'admin/inventory/file/product/PRODUCT-1705994424106.jpg,admin/inventory/file/product/PRODUCT-1705994424107.png,admin/inventory/file/product/PRODUCT-1705994424107.jpg', 'admin/inventory/file/product/file/DIGITAL_PRODUCT_FILE_1705994427.pdf', 1, 0, 0, 0, 1, 1, NULL, NULL, NULL, NULL, '<p>Test Demo</p>', '', '', 1, 0, 1, 1, '2024-01-23 07:20:27', '2024-01-23 07:20:27'),
(12, 'Service Test', '72411603', 'service', 'C128', 9, 1, NULL, 1, 20, NULL, NULL, 0, 35500, NULL, NULL, 4, 1, '35300', '2024-01-23', '2024-01-27', 1, 1, 'admin/inventory/file/product/PRODUCT-1705994793540.jpg,admin/inventory/file/product/PRODUCT-1705994793541.png', NULL, 1, 0, 0, 0, 0, 1, NULL, NULL, NULL, NULL, '<p>Test Demo</p>', '', '', 1, 0, 1, 1, '2024-01-23 07:26:45', '2024-01-23 07:26:45'),
(13, 'Test', '95220670', 'standard', 'C128', 9, 1, 7, 60, 20, 7, 7, 120, 35500, NULL, 5, 4, 1, '35300', '2024-01-23', '2024-01-23', 1, 1, 'admin/inventory/file/product/PRODUCT-1706004725470.jpeg,admin/inventory/file/product/PRODUCT-1706004725471.jpg', NULL, 1, 1, 0, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 'Color,Size', 'Red,White|m,l,xl', 1, 0, 1, 1, '2024-01-23 10:12:58', '2024-01-23 10:12:58'),
(14, 'S21+ 5G ( 8+128 Snapdragon 888 )', '47912069', 'standard', 'C128', 9, 1, 7, 60, 2, 7, 7, 120, 5555, NULL, 5, 2, 1, '3333', '2024-01-23', '2024-01-27', 1, 1, '', NULL, 1, 1, 0, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 'Color,Size', 'red,blue|m,l,xl', 1, 1, 1, 1, '2024-01-23 10:15:29', '2024-01-29 03:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `item_code` varchar(255) NOT NULL,
  `additional_cost` double DEFAULT NULL,
  `additional_price` double DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Not Deleted and 1= Not Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `variant_id`, `position`, `item_code`, `additional_cost`, `additional_price`, `qty`, `created_by`, `updated_by`, `delete`, `created_at`, `updated_at`) VALUES
(9, 2, 1, 1, 'Blue/8-128/Snapdragon 888-69726636', 20, 120, 0, 1, 1, 0, '2024-01-22 09:12:45', '2024-01-22 09:12:45'),
(10, 2, 2, 2, 'Blue/8-128/Exynos 1020-69726636', 20, 120, 0, 1, 1, 0, '2024-01-22 09:12:45', '2024-01-22 09:12:45'),
(11, 2, 3, 3, 'Blue/8-256/Snapdragon 888-69726636', 20, 120, 0, 1, 1, 0, '2024-01-22 09:12:45', '2024-01-22 09:12:45'),
(12, 2, 4, 4, 'Blue/8-256/Exynos 1020-69726636', NULL, NULL, 0, 1, 1, 0, '2024-01-22 09:12:45', '2024-01-22 09:12:45'),
(13, 2, 5, 5, 'red/8-128/Snapdragon 888-69726636', NULL, NULL, 0, 1, 1, 0, '2024-01-22 09:12:45', '2024-01-22 09:12:45'),
(14, 2, 6, 6, 'red/8-128/Exynos 1020-69726636', NULL, NULL, 0, 1, 1, 0, '2024-01-22 09:12:45', '2024-01-22 09:12:45'),
(15, 2, 7, 7, 'red/8-256/Snapdragon 888-69726636', NULL, NULL, 0, 1, 1, 0, '2024-01-22 09:12:45', '2024-01-22 09:12:45'),
(16, 2, 8, 8, 'red/8-256/Exynos 1020-69726636', NULL, NULL, 0, 1, 1, 0, '2024-01-22 09:12:45', '2024-01-22 09:12:45'),
(23, 14, 1, 1, 'red/m-47912069', NULL, NULL, 0, 1, 1, 0, '2024-01-23 10:15:29', '2024-01-23 10:15:29'),
(24, 14, 2, 2, 'red/l-47912069', NULL, NULL, 0, 1, 1, 0, '2024-01-23 10:15:29', '2024-01-23 10:15:29'),
(25, 14, 3, 3, 'red/xl-47912069', NULL, NULL, 0, 1, 1, 0, '2024-01-23 10:15:29', '2024-01-23 10:15:29'),
(26, 14, 4, 4, 'blue/m-47912069', NULL, NULL, 0, 1, 1, 0, '2024-01-23 10:15:29', '2024-01-23 10:15:29'),
(27, 14, 5, 5, 'blue/l-47912069', NULL, NULL, 0, 1, 1, 0, '2024-01-23 10:15:29', '2024-01-23 10:15:29'),
(28, 14, 6, 6, 'blue/xl-47912069', NULL, NULL, 0, 1, 1, 0, '2024-01-23 10:15:29', '2024-01-23 10:15:29'),
(53, 13, 1, 1, 'Red/m-95220670', 500, 120, 0, 1, 1, 0, '2024-01-31 06:36:32', '2024-01-31 06:36:32'),
(54, 13, 2, 2, 'Red/l-95220670', NULL, NULL, 0, 1, 1, 0, '2024-01-31 06:36:32', '2024-01-31 06:36:32'),
(55, 13, 3, 3, 'Red/xl-95220670', NULL, NULL, 0, 1, 1, 0, '2024-01-31 06:36:32', '2024-01-31 06:36:32'),
(56, 13, 4, 4, 'White/m-95220670', NULL, NULL, 0, 1, 1, 0, '2024-01-31 06:36:32', '2024-01-31 06:36:32'),
(57, 13, 5, 5, 'White/l-95220670', NULL, NULL, 0, 1, 1, 0, '2024-01-31 06:36:32', '2024-01-31 06:36:32'),
(58, 13, 6, 6, 'White/xl-95220670', NULL, NULL, 0, 1, 1, 0, '2024-01-31 06:36:32', '2024-01-31 06:36:32'),
(67, 1, 1, 1, 'Green/8-128/Snapdragon 888-40081316', 20, NULL, 0, 1, 1, 0, '2024-01-31 11:04:11', '2024-01-31 11:04:11'),
(68, 1, 2, 2, 'Green/8-128/Exynos 1020-40081316', NULL, NULL, 0, 1, 1, 0, '2024-01-31 11:04:11', '2024-01-31 11:04:11'),
(69, 1, 3, 3, 'Green/8-256/Snapdragon 888-40081316', NULL, NULL, 0, 1, 1, 0, '2024-01-31 11:04:11', '2024-01-31 11:04:11'),
(70, 1, 4, 4, 'Green/8-256/Exynos 1020-40081316', NULL, NULL, 0, 1, 1, 0, '2024-01-31 11:04:11', '2024-01-31 11:04:11'),
(71, 1, 5, 5, 'Pink/8-128/Snapdragon 888-40081316', NULL, NULL, 0, 1, 1, 0, '2024-01-31 11:04:11', '2024-01-31 11:04:11'),
(72, 1, 6, 6, 'Pink/8-128/Exynos 1020-40081316', NULL, NULL, 0, 1, 1, 0, '2024-01-31 11:04:12', '2024-01-31 11:04:12'),
(73, 1, 7, 7, 'Pink/8-256/Snapdragon 888-40081316', NULL, NULL, 0, 1, 1, 0, '2024-01-31 11:04:12', '2024-01-31 11:04:12'),
(74, 1, 8, 8, 'Pink/8-256/Exynos 1020-40081316', NULL, 120, 0, 1, 1, 0, '2024-01-31 11:04:12', '2024-01-31 11:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `images` text DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `video_link` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `details`, `images`, `video`, `type`, `video_link`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh Business Summit 2023', '<h2>Detailed description of the project</h2>\r\n\r\n<p>Bangladesh Business Summit 2023 is an international trade and investment promotion event. The summit, envisaged to become Bangladesh&rsquo;s flagship business promotion bi-annual event, seeks to highlight Bangladesh&rsquo;s economic and market strengths, and concrete trade and investment opportunities in Bangladesh by convening national and global businesses leaders, investors, policymakers, practitioners, policy and market analysts, academia, and innovators.</p>\r\n\r\n<p>The summit was organised under patronage and supervision of:</p>\r\n\r\n<ul>\r\n	<li>Ministry of Foreign Affairs, Bangladesh</li>\r\n	<li>Ministry of Commerce, Bangladesh</li>\r\n	<li>Bangladesh Investment Development Authority</li>\r\n</ul>\r\n\r\n<p>Objectives of the summit:</p>\r\n\r\n<ul>\r\n	<li>Highlight the success story that has set the foundations for sustainable growth trajectory of Bangladesh</li>\r\n	<li>Showcase the dynamic business /investment opportunities in Bangladesh</li>\r\n	<li>Showcase the improvements and business environment reforms</li>\r\n	<li>Gain insights of investment priorities of the global investors to improve policy</li>\r\n	<li>Facilitate exchange of investment success stories and good practices among investors</li>\r\n	<li>Seek investors&rsquo; views and suggestions to create more partnership opportunities</li>\r\n	<li>Secure concrete investment interest/proposals and develop a solid investment pipeline for important sectors</li>\r\n	<li>Facilitate effective networking, dialogue and partnership opportunities among national and international investors, policy makers and broader group of stakeholders</li>\r\n</ul>\r\n\r\n<table style=\"width:929px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Name of legal entity</strong></td>\r\n			<td><strong>Country</strong></td>\r\n			<td><strong>Proportion carried out by candidate (%)</strong></td>\r\n			<td><strong>No of staff provided</strong></td>\r\n			<td><strong>Origin of funding</strong></td>\r\n			<td><strong>Dates (start/end)</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Spellbound Communications Limited</strong></td>\r\n			<td>Bangladesh</td>\r\n			<td>100 input base</td>\r\n			<td>10</td>\r\n			<td>Private</td>\r\n			<td>01.01.2023-\r\n			<p>&nbsp;</p>\r\n\r\n			<p>01.06.2023</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Type and scope of services provided</h2>\r\n\r\n<ol>\r\n	<li><strong>Management and implementation of the project:</strong>\r\n\r\n	<ul>\r\n		<li>Planning and Strategy</li>\r\n		<li>Project Timeline</li>\r\n		<li>Manage day-to-day activities</li>\r\n		<li>Secretariat Support</li>\r\n		<li>Provision of media coverage of activities and events organised</li>\r\n		<li>Guest management</li>\r\n		<li>Hospitality Coordination with Hotels</li>\r\n		<li>Coordination with Partners and Committee of FBCCI</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Event organisation support:</strong>&nbsp;press conferences, panel discussions, breakout session, media briefings, exhibition, B2B matchmaking</li>\r\n	<li><strong>Provision of technical and logistical support</strong></li>\r\n	<li><strong>Media support:</strong>\r\n	<ul>\r\n		<li>Arrange CNN Experience</li>\r\n		<li>CNN Insight Session</li>\r\n		<li>Panel Discussion with Richard Quest</li>\r\n		<li>CNN Create&rsquo;s Interview-based shooting of Sponsor</li>\r\n		<li>Facilitation to CNN Editorial Team</li>\r\n		<li>Press coverage and monitoring services of Local and International Media</li>\r\n		<li>Press clipping reports</li>\r\n		<li>Social media reports</li>\r\n		<li>Coverage of events organised at the EUIC or upon request of the Contracting Authority</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Design and Printing of publication Materials</strong></li>\r\n	<li><strong>Graphic design services</strong></li>\r\n	<li><strong>Production of promotional materials</strong></li>\r\n	<li><strong>Video production</strong></li>\r\n	<li><strong>Translation and proofreading services</strong></li>\r\n	<li><strong>Digital Platform Development, Maintenance and Promotion</strong></li>\r\n</ol>', '[\"public\\/admin\\/file\\/project\\/project-images\\/projectImg01761503248.jpg\",\"public\\/admin\\/file\\/project\\/project-images\\/projectImg11761503248.jpg\",\"public\\/admin\\/file\\/project\\/project-images\\/projectImg21761503248.jpg\"]', NULL, 'Event', '<iframe width=\"1250\" height=\"703\" src=\"https://www.youtube.com/embed/5MLnLL8TnIQ?list=RD5MLnLL8TnIQ\" title=\"Pahar Jabo | পাহাড় যাবো | Tasrif Khan | Jisan Khan Shuvo | Official Music Video | Kureghor Band\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', 1, 0, NULL, NULL, '2025-10-26 18:27:28', '2025-10-26 18:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `public_diplomacies`
--

CREATE TABLE `public_diplomacies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `public_diplomacies`
--

INSERT INTO `public_diplomacies` (`id`, `country_id`, `title`, `name`, `image`, `link`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, 2, 'This award-winning architect is building flat-pack, flood-proof homes', 'Growing Bangladesh,CNNS', 'public/admin/file/publicdiplomacy/publicdiplomacy-images/publicdiplomacyImg1761535521.png', 'https://edition.cnn.com/videos/business/2023/03/31/growing-bangladesh-architecture-full-intl-hnk-spc.cnn', 1, 0, NULL, NULL, '2025-10-27 03:25:22', '2025-10-27 04:44:26'),
(9, 2, 'This award-winning architect is building flat-pack, flood-proof homes', 'Growing Bangladesh, CNN', 'public/admin/file/publicdiplomacy/publicdiplomacy-images/publicdiplomacyImg1761540238.png', 'https://edition.cnn.com/videos/business/2023/03/31/growing-bangladesh-architecture-full-intl-hnk-spc.cnn', 1, 0, NULL, NULL, '2025-10-27 04:43:58', '2025-10-27 04:43:58'),
(10, 4, 'This award-winning architect is building flat-pack, flood-proof homes', 'Growing Bangladesh, BBC', 'public/admin/file/publicdiplomacy/publicdiplomacy-images/publicdiplomacyImg1761541932.png', 'https://edition.cnn.com/videos/business/2023/03/31/growing-bangladesh-architecture-full-intl-hnk-spc.cnn', 1, 0, NULL, NULL, '2025-10-27 05:12:12', '2025-10-27 05:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `pulse_aggregates`
--

CREATE TABLE `pulse_aggregates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bucket` int(10) UNSIGNED NOT NULL,
  `period` mediumint(8) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `key` mediumtext NOT NULL,
  `key_hash` binary(16) GENERATED ALWAYS AS (unhex(md5(`key`))) VIRTUAL,
  `aggregate` varchar(255) NOT NULL,
  `value` decimal(20,2) NOT NULL,
  `count` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pulse_aggregates`
--

INSERT INTO `pulse_aggregates` (`id`, `bucket`, `period`, `type`, `key`, `aggregate`, `value`, `count`) VALUES
(1, 1706595960, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2, 1706595840, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(3, 1706595840, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(4, 1706594400, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 15.00, NULL),
(5, 1706596020, 60, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'count', 1.00, NULL),
(6, 1706595840, 360, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'count', 1.00, NULL),
(7, 1706595840, 1440, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'count', 2.00, NULL),
(8, 1706594400, 10080, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'count', 2.00, NULL),
(9, 1706596020, 60, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'max', 1706596058.00, NULL),
(10, 1706595840, 360, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'max', 1706596058.00, NULL),
(11, 1706595840, 1440, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'max', 1706596393.00, NULL),
(12, 1706594400, 10080, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'max', 1706596393.00, NULL),
(13, 1706596260, 60, 'user_request', '1', 'count', 1.00, NULL),
(14, 1706596200, 360, 'user_request', '1', 'count', 4.00, NULL),
(15, 1706595840, 1440, 'user_request', '1', 'count', 9.00, NULL),
(16, 1706594400, 10080, 'user_request', '1', 'count', 9.00, NULL),
(17, 1706596260, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Auth\\\\RegisteredUserController.php:42\"]', 'count', 1.00, NULL),
(18, 1706596200, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Auth\\\\RegisteredUserController.php:42\"]', 'count', 1.00, NULL),
(19, 1706595840, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Auth\\\\RegisteredUserController.php:42\"]', 'count', 1.00, NULL),
(20, 1706594400, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Auth\\\\RegisteredUserController.php:42\"]', 'count', 1.00, NULL),
(21, 1706596260, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Auth\\\\RegisteredUserController.php:42\"]', 'max', 1706596312.00, NULL),
(22, 1706596200, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Auth\\\\RegisteredUserController.php:42\"]', 'max', 1706596312.00, NULL),
(23, 1706595840, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Auth\\\\RegisteredUserController.php:42\"]', 'max', 1706596312.00, NULL),
(24, 1706594400, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Auth\\\\RegisteredUserController.php:42\"]', 'max', 1706596312.00, NULL),
(25, 1706596320, 60, 'user_request', '1', 'count', 2.00, NULL),
(33, 1706596320, 60, 'exception', '[\"BadMethodCallException\",\"app\\\\Providers\\\\AuthServiceProvider.php:34\"]', 'count', 2.00, NULL),
(34, 1706596200, 360, 'exception', '[\"BadMethodCallException\",\"app\\\\Providers\\\\AuthServiceProvider.php:34\"]', 'count', 2.00, NULL),
(35, 1706595840, 1440, 'exception', '[\"BadMethodCallException\",\"app\\\\Providers\\\\AuthServiceProvider.php:34\"]', 'count', 2.00, NULL),
(36, 1706594400, 10080, 'exception', '[\"BadMethodCallException\",\"app\\\\Providers\\\\AuthServiceProvider.php:34\"]', 'count', 2.00, NULL),
(37, 1706596320, 60, 'exception', '[\"BadMethodCallException\",\"app\\\\Providers\\\\AuthServiceProvider.php:34\"]', 'max', 1706596366.00, NULL),
(38, 1706596200, 360, 'exception', '[\"BadMethodCallException\",\"app\\\\Providers\\\\AuthServiceProvider.php:34\"]', 'max', 1706596366.00, NULL),
(39, 1706595840, 1440, 'exception', '[\"BadMethodCallException\",\"app\\\\Providers\\\\AuthServiceProvider.php:34\"]', 'max', 1706596366.00, NULL),
(40, 1706594400, 10080, 'exception', '[\"BadMethodCallException\",\"app\\\\Providers\\\\AuthServiceProvider.php:34\"]', 'max', 1706596366.00, NULL),
(49, 1706596380, 60, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:27\"]', 'count', 1.00, NULL),
(50, 1706596200, 360, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:27\"]', 'count', 1.00, NULL),
(51, 1706595840, 1440, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:27\"]', 'count', 1.00, NULL),
(52, 1706594400, 10080, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:27\"]', 'count', 1.00, NULL),
(53, 1706596380, 60, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:27\"]', 'max', 1706596381.00, NULL),
(54, 1706596200, 360, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:27\"]', 'max', 1706596381.00, NULL),
(55, 1706595840, 1440, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:27\"]', 'max', 1706596381.00, NULL),
(56, 1706594400, 10080, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:27\"]', 'max', 1706596381.00, NULL),
(57, 1706596380, 60, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'count', 1.00, NULL),
(58, 1706596200, 360, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'count', 1.00, NULL),
(61, 1706596380, 60, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'max', 1706596393.00, NULL),
(62, 1706596200, 360, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 'max', 1706596393.00, NULL),
(65, 1706596440, 60, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:19\"]', 'count', 1.00, NULL),
(66, 1706596200, 360, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:19\"]', 'count', 1.00, NULL),
(67, 1706595840, 1440, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:19\"]', 'count', 1.00, NULL),
(68, 1706594400, 10080, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:19\"]', 'count', 1.00, NULL),
(69, 1706596440, 60, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:19\"]', 'max', 1706596440.00, NULL),
(70, 1706596200, 360, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:19\"]', 'max', 1706596440.00, NULL),
(71, 1706595840, 1440, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:19\"]', 'max', 1706596440.00, NULL),
(72, 1706594400, 10080, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:19\"]', 'max', 1706596440.00, NULL),
(73, 1706596440, 60, 'exception', '[\"Error\",\"resources\\\\views\\\\backend\\\\shared\\\\nav\\\\admin_sidebar.blade.php:7\"]', 'count', 1.00, NULL),
(74, 1706596200, 360, 'exception', '[\"Error\",\"resources\\\\views\\\\backend\\\\shared\\\\nav\\\\admin_sidebar.blade.php:7\"]', 'count', 1.00, NULL),
(75, 1706595840, 1440, 'exception', '[\"Error\",\"resources\\\\views\\\\backend\\\\shared\\\\nav\\\\admin_sidebar.blade.php:7\"]', 'count', 1.00, NULL),
(76, 1706594400, 10080, 'exception', '[\"Error\",\"resources\\\\views\\\\backend\\\\shared\\\\nav\\\\admin_sidebar.blade.php:7\"]', 'count', 1.00, NULL),
(77, 1706596440, 60, 'exception', '[\"Error\",\"resources\\\\views\\\\backend\\\\shared\\\\nav\\\\admin_sidebar.blade.php:7\"]', 'max', 1706596460.00, NULL),
(78, 1706596200, 360, 'exception', '[\"Error\",\"resources\\\\views\\\\backend\\\\shared\\\\nav\\\\admin_sidebar.blade.php:7\"]', 'max', 1706596460.00, NULL),
(79, 1706595840, 1440, 'exception', '[\"Error\",\"resources\\\\views\\\\backend\\\\shared\\\\nav\\\\admin_sidebar.blade.php:7\"]', 'max', 1706596460.00, NULL),
(80, 1706594400, 10080, 'exception', '[\"Error\",\"resources\\\\views\\\\backend\\\\shared\\\\nav\\\\admin_sidebar.blade.php:7\"]', 'max', 1706596460.00, NULL),
(81, 1706596500, 60, 'user_request', '1', 'count', 1.00, NULL),
(85, 1706596560, 60, 'user_request', '1', 'count', 2.00, NULL),
(86, 1706596560, 360, 'user_request', '1', 'count', 5.00, NULL),
(93, 1706596620, 60, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 'count', 5.00, NULL),
(94, 1706596560, 360, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 'count', 5.00, NULL),
(95, 1706595840, 1440, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 'count', 5.00, NULL),
(96, 1706594400, 10080, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 'count', 5.00, NULL),
(97, 1706596620, 60, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 'max', 1706596647.00, NULL),
(98, 1706596560, 360, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 'max', 1706596647.00, NULL),
(99, 1706595840, 1440, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 'max', 1706596647.00, NULL),
(100, 1706594400, 10080, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 'max', 1706596647.00, NULL),
(133, 1706596680, 60, 'user_request', '1', 'count', 1.00, NULL),
(137, 1706596740, 60, 'user_request', '1', 'count', 2.00, NULL),
(145, 1706597700, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(146, 1706597640, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(147, 1706597280, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 12.00, NULL),
(149, 1706597820, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(153, 1706598060, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(154, 1706598000, 360, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(161, 1706598120, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(165, 1706598240, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(173, 1706598300, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(177, 1706598360, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(178, 1706598360, 360, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(181, 1706598420, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(189, 1706598480, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(193, 1706598720, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(194, 1706598720, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(195, 1706598720, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(196, 1706594400, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(197, 1706598780, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(198, 1706598720, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(199, 1706598720, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(205, 1706605440, 60, 'cache_miss', 'spatie.permission.cache', 'count', 4.00, NULL),
(206, 1706605200, 360, 'cache_miss', 'spatie.permission.cache', 'count', 4.00, NULL),
(207, 1706604480, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 4.00, NULL),
(208, 1706604480, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 4.00, NULL),
(209, 1706605440, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(210, 1706605200, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(211, 1706604480, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(212, 1706604480, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(233, 1706679360, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(234, 1706679360, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(235, 1706679360, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(236, 1706675040, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(237, 1706679960, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(238, 1706679720, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(239, 1706679360, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(240, 1706675040, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 46.00, NULL),
(241, 1706679960, 60, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException.php:35\"]', 'count', 1.00, NULL),
(242, 1706679720, 360, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException.php:35\"]', 'count', 1.00, NULL),
(243, 1706679360, 1440, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException.php:35\"]', 'count', 1.00, NULL),
(244, 1706675040, 10080, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException.php:35\"]', 'count', 1.00, NULL),
(245, 1706679960, 60, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException.php:35\"]', 'max', 1706679989.00, NULL),
(246, 1706679720, 360, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException.php:35\"]', 'max', 1706679989.00, NULL),
(247, 1706679360, 1440, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException.php:35\"]', 'max', 1706679989.00, NULL),
(248, 1706675040, 10080, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException.php:35\"]', 'max', 1706679989.00, NULL),
(249, 1706680020, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(253, 1706680200, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(254, 1706680080, 360, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(261, 1706680260, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(269, 1706681160, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(270, 1706681160, 360, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(271, 1706680800, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 24.00, NULL),
(277, 1706681220, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(289, 1706681340, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(293, 1706681400, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(301, 1706681640, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(302, 1706681520, 360, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(317, 1706681700, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(329, 1706681760, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(333, 1706681880, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(334, 1706681880, 360, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(337, 1706681880, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 'count', 1.00, NULL),
(338, 1706681880, 360, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 'count', 2.00, NULL),
(339, 1706680800, 1440, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 'count', 2.00, NULL),
(340, 1706675040, 10080, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 'count', 2.00, NULL),
(345, 1706681880, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 'max', 1706681935.00, NULL),
(346, 1706681880, 360, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 'max', 1706681945.00, NULL),
(347, 1706680800, 1440, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 'max', 1706681945.00, NULL),
(348, 1706675040, 10080, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 'max', 1706681945.00, NULL),
(349, 1706681940, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(350, 1706681940, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 'count', 1.00, NULL),
(357, 1706681940, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 'max', 1706681945.00, NULL),
(361, 1706682000, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(365, 1706682120, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(373, 1706682180, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(377, 1706682180, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'count', 1.00, NULL),
(378, 1706681880, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'count', 1.00, NULL),
(379, 1706680800, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'count', 1.00, NULL),
(380, 1706675040, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'count', 2.00, NULL),
(385, 1706682180, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'max', 1706682221.00, NULL),
(386, 1706681880, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'max', 1706682221.00, NULL),
(387, 1706680800, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'max', 1706682221.00, NULL),
(388, 1706675040, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'max', 1706682296.00, NULL),
(389, 1706682240, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(390, 1706682240, 360, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(391, 1706682240, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 16.00, NULL),
(392, 1706682240, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'count', 1.00, NULL),
(393, 1706682240, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'count', 1.00, NULL),
(394, 1706682240, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'count', 1.00, NULL),
(397, 1706682240, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'max', 1706682296.00, NULL),
(398, 1706682240, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'max', 1706682296.00, NULL),
(399, 1706682240, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 'max', 1706682296.00, NULL),
(401, 1706682480, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(402, 1706682480, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:158\"]', 'count', 1.00, NULL),
(403, 1706682240, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:158\"]', 'count', 1.00, NULL),
(404, 1706682240, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:158\"]', 'count', 1.00, NULL),
(405, 1706675040, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:158\"]', 'count', 1.00, NULL),
(409, 1706682480, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:158\"]', 'max', 1706682530.00, NULL),
(410, 1706682240, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:158\"]', 'max', 1706682530.00, NULL),
(411, 1706682240, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:158\"]', 'max', 1706682530.00, NULL),
(412, 1706675040, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:158\"]', 'max', 1706682530.00, NULL),
(413, 1706682540, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(421, 1706682600, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(422, 1706682600, 360, 'cache_hit', 'spatie.permission.cache', 'count', 9.00, NULL),
(437, 1706682780, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(449, 1706682840, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(453, 1706682900, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(457, 1706682960, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(458, 1706682960, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(459, 1706682240, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(461, 1706682960, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(462, 1706682960, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(465, 1706683020, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(473, 1706685180, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(474, 1706685120, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(475, 1706685120, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 17.00, NULL),
(476, 1706685120, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 41.00, NULL),
(477, 1706685300, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(481, 1706685660, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(482, 1706685480, 360, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(485, 1706685720, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(493, 1706685780, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(505, 1706685840, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(506, 1706685840, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(509, 1706686080, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(517, 1706686200, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(518, 1706686200, 360, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(519, 1706686200, 60, 'exception', '[\"TypeError\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\helpers.php:124\"]', 'count', 1.00, NULL),
(520, 1706686200, 360, 'exception', '[\"TypeError\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\helpers.php:124\"]', 'count', 1.00, NULL),
(521, 1706685120, 1440, 'exception', '[\"TypeError\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\helpers.php:124\"]', 'count', 1.00, NULL),
(522, 1706685120, 10080, 'exception', '[\"TypeError\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\helpers.php:124\"]', 'count', 1.00, NULL),
(525, 1706686200, 60, 'exception', '[\"TypeError\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\helpers.php:124\"]', 'max', 1706686230.00, NULL),
(526, 1706686200, 360, 'exception', '[\"TypeError\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\helpers.php:124\"]', 'max', 1706686230.00, NULL),
(527, 1706685120, 1440, 'exception', '[\"TypeError\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\helpers.php:124\"]', 'max', 1706686230.00, NULL),
(528, 1706685120, 10080, 'exception', '[\"TypeError\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\helpers.php:124\"]', 'max', 1706686230.00, NULL),
(529, 1706686200, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\edit.blade.php:614\"]', 'count', 1.00, NULL),
(530, 1706686200, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\edit.blade.php:614\"]', 'count', 1.00, NULL),
(531, 1706685120, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\edit.blade.php:614\"]', 'count', 1.00, NULL),
(532, 1706685120, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\edit.blade.php:614\"]', 'count', 1.00, NULL),
(537, 1706686200, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\edit.blade.php:614\"]', 'max', 1706686257.00, NULL),
(538, 1706686200, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\edit.blade.php:614\"]', 'max', 1706686257.00, NULL),
(539, 1706685120, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\edit.blade.php:614\"]', 'max', 1706686257.00, NULL),
(540, 1706685120, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\edit.blade.php:614\"]', 'max', 1706686257.00, NULL),
(541, 1706686320, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(553, 1706686380, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(557, 1706686560, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(558, 1706686560, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(559, 1706686560, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(560, 1706685120, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(561, 1706686560, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(562, 1706686560, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(563, 1706686560, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(565, 1706686620, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(569, 1706686680, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(577, 1706686740, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(581, 1706691420, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(582, 1706691240, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(583, 1706690880, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(585, 1706691420, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(586, 1706691240, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(587, 1706690880, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 19.00, NULL),
(593, 1706691480, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(597, 1706691540, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(605, 1706691660, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(606, 1706691600, 360, 'cache_hit', 'spatie.permission.cache', 'count', 12.00, NULL),
(613, 1706691720, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(621, 1706691840, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(629, 1706691900, 60, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(653, 1706692020, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(654, 1706691960, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(661, 1706696220, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(662, 1706695920, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(663, 1706695200, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(664, 1706695200, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(665, 1706696280, 60, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(666, 1706696280, 360, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(667, 1706695200, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(668, 1706695200, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 10.00, NULL),
(693, 1706699040, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(694, 1706698800, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(695, 1706698080, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(705, 1706764560, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(706, 1706764320, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(707, 1706764320, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(708, 1706755680, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(709, 1706764560, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(710, 1706764320, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(711, 1706764320, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 24.00, NULL),
(712, 1706755680, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 24.00, NULL),
(717, 1706764620, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(721, 1706764980, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(722, 1706764680, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(725, 1706765340, 60, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(726, 1706765040, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(745, 1706765460, 60, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(746, 1706765400, 360, 'cache_hit', 'spatie.permission.cache', 'count', 16.00, NULL),
(773, 1706765520, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(781, 1706765580, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(793, 1706765640, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(805, 1706765700, 60, 'slow_request', '[\"GET\",\"\\/admin\\/product\\/create\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController@create\"]', 'count', 1.00, NULL),
(806, 1706765400, 360, 'slow_request', '[\"GET\",\"\\/admin\\/product\\/create\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController@create\"]', 'count', 1.00, NULL),
(807, 1706764320, 1440, 'slow_request', '[\"GET\",\"\\/admin\\/product\\/create\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController@create\"]', 'count', 1.00, NULL),
(808, 1706755680, 10080, 'slow_request', '[\"GET\",\"\\/admin\\/product\\/create\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController@create\"]', 'count', 1.00, NULL),
(809, 1706765700, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(810, 1706765700, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(811, 1706765400, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(812, 1706764320, 1440, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(813, 1706755680, 10080, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(817, 1706765700, 60, 'slow_request', '[\"GET\",\"\\/admin\\/product\\/create\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController@create\"]', 'max', 1067.00, NULL),
(818, 1706765400, 360, 'slow_request', '[\"GET\",\"\\/admin\\/product\\/create\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController@create\"]', 'max', 1067.00, NULL),
(819, 1706764320, 1440, 'slow_request', '[\"GET\",\"\\/admin\\/product\\/create\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController@create\"]', 'max', 1067.00, NULL),
(820, 1706755680, 10080, 'slow_request', '[\"GET\",\"\\/admin\\/product\\/create\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController@create\"]', 'max', 1067.00, NULL),
(821, 1706765700, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1706765715.00, NULL),
(822, 1706765400, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1706765715.00, NULL),
(823, 1706764320, 1440, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1706765715.00, NULL),
(824, 1706755680, 10080, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1706765715.00, NULL),
(825, 1706765820, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(826, 1706765760, 360, 'cache_hit', 'spatie.permission.cache', 'count', 19.00, NULL),
(827, 1706765760, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 30.00, NULL),
(828, 1706765760, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 86.00, NULL),
(833, 1706765880, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(845, 1706765940, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(849, 1706765940, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(850, 1706765760, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(851, 1706765760, 1440, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 2.00, NULL),
(852, 1706765760, 10080, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 2.00, NULL),
(857, 1706765940, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1706765943.00, NULL),
(858, 1706765760, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1706765943.00, NULL),
(859, 1706765760, 1440, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1706766163.00, NULL),
(860, 1706765760, 10080, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1706766163.00, NULL),
(861, 1706766000, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(877, 1706766060, 60, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(909, 1706766120, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(910, 1706766120, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(913, 1706766120, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1706766163.00, NULL),
(914, 1706766120, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1706766163.00, NULL),
(917, 1706766180, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(918, 1706766120, 360, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(925, 1706766240, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(933, 1706766300, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(937, 1706766360, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(938, 1706766360, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\barcode\\\\index.blade.php:184\"]', 'count', 1.00, NULL),
(939, 1706766120, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\barcode\\\\index.blade.php:184\"]', 'count', 1.00, NULL),
(940, 1706765760, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\barcode\\\\index.blade.php:184\"]', 'count', 1.00, NULL),
(941, 1706765760, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\barcode\\\\index.blade.php:184\"]', 'count', 1.00, NULL),
(945, 1706766360, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\barcode\\\\index.blade.php:184\"]', 'max', 1706766367.00, NULL),
(946, 1706766120, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\barcode\\\\index.blade.php:184\"]', 'max', 1706766367.00, NULL),
(947, 1706765760, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\barcode\\\\index.blade.php:184\"]', 'max', 1706766367.00, NULL),
(948, 1706765760, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\barcode\\\\index.blade.php:184\"]', 'max', 1706766367.00, NULL),
(953, 1706766540, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(954, 1706766480, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(957, 1706766660, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(961, 1706766780, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(965, 1706767080, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(966, 1706766840, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(969, 1706767200, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(970, 1706767200, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(971, 1706767200, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 10.00, NULL),
(973, 1706767800, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(974, 1706767560, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(981, 1706768100, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(982, 1706767920, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(985, 1706768220, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(989, 1706768400, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(990, 1706768280, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(1001, 1706768460, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1005, 1706768520, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1009, 1706768640, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1010, 1706768640, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1011, 1706768640, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1012, 1706765760, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1013, 1706768700, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1014, 1706768640, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(1015, 1706768640, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 22.00, NULL),
(1017, 1706768820, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1021, 1706768880, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1029, 1706768940, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1033, 1706769180, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1034, 1706769000, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1037, 1706769240, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1045, 1706769420, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1046, 1706769360, 360, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(1053, 1706769480, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1057, 1706769540, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1069, 1706769720, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1070, 1706769720, 360, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(1077, 1706769840, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1085, 1706769900, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1093, 1706770020, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1101, 1706770140, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1102, 1706770080, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1103, 1706770080, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 19.00, NULL),
(1105, 1706770260, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1109, 1706770680, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1110, 1706770440, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(1121, 1706770740, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1129, 1706770800, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1130, 1706770800, 360, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(1133, 1706770860, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1141, 1706770920, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1149, 1706770980, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1161, 1706771220, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1162, 1706771160, 360, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(1165, 1706771340, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1173, 1706771400, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1177, 1706772120, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1178, 1706771880, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(1179, 1706771520, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(1185, 1706772180, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1197, 1706773200, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'count', 1.00, NULL),
(1198, 1706772960, 360, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'count', 3.00, NULL),
(1199, 1706772960, 1440, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'count', 3.00, NULL),
(1200, 1706765760, 10080, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'count', 3.00, NULL),
(1201, 1706773200, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'max', 1706773240.00, NULL),
(1202, 1706772960, 360, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'max', 1706773286.00, NULL),
(1203, 1706772960, 1440, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'max', 1706773286.00, NULL),
(1204, 1706765760, 10080, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'max', 1706773286.00, NULL),
(1205, 1706773200, 60, 'exception', '[\"Milon\\\\Barcode\\\\WrongCheckDigitException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'count', 1.00, NULL),
(1206, 1706772960, 360, 'exception', '[\"Milon\\\\Barcode\\\\WrongCheckDigitException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'count', 1.00, NULL),
(1207, 1706772960, 1440, 'exception', '[\"Milon\\\\Barcode\\\\WrongCheckDigitException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'count', 1.00, NULL),
(1208, 1706765760, 10080, 'exception', '[\"Milon\\\\Barcode\\\\WrongCheckDigitException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'count', 1.00, NULL),
(1209, 1706773200, 60, 'exception', '[\"Milon\\\\Barcode\\\\WrongCheckDigitException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'max', 1706773259.00, NULL),
(1210, 1706772960, 360, 'exception', '[\"Milon\\\\Barcode\\\\WrongCheckDigitException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'max', 1706773259.00, NULL),
(1211, 1706772960, 1440, 'exception', '[\"Milon\\\\Barcode\\\\WrongCheckDigitException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'max', 1706773259.00, NULL),
(1212, 1706765760, 10080, 'exception', '[\"Milon\\\\Barcode\\\\WrongCheckDigitException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'max', 1706773259.00, NULL),
(1213, 1706773260, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'count', 2.00, NULL),
(1217, 1706773260, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 'max', 1706773286.00, NULL),
(1229, 1706773320, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:221\"]', 'count', 1.00, NULL),
(1230, 1706773320, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:221\"]', 'count', 1.00, NULL),
(1231, 1706772960, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:221\"]', 'count', 1.00, NULL),
(1232, 1706765760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:221\"]', 'count', 1.00, NULL),
(1233, 1706773320, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:221\"]', 'max', 1706773377.00, NULL),
(1234, 1706773320, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:221\"]', 'max', 1706773377.00, NULL),
(1235, 1706772960, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:221\"]', 'max', 1706773377.00, NULL),
(1236, 1706765760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:221\"]', 'max', 1706773377.00, NULL),
(1237, 1706773380, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'count', 1.00, NULL),
(1238, 1706773320, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'count', 1.00, NULL),
(1239, 1706772960, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'count', 1.00, NULL),
(1240, 1706765760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'count', 1.00, NULL),
(1241, 1706773380, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'max', 1706773391.00, NULL),
(1242, 1706773320, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'max', 1706773391.00, NULL);
INSERT INTO `pulse_aggregates` (`id`, `bucket`, `period`, `type`, `key`, `aggregate`, `value`, `count`) VALUES
(1243, 1706772960, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'max', 1706773391.00, NULL),
(1244, 1706765760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'max', 1706773391.00, NULL),
(1245, 1706773380, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'count', 1.00, NULL),
(1246, 1706773320, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'count', 1.00, NULL),
(1247, 1706772960, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'count', 1.00, NULL),
(1248, 1706765760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'count', 1.00, NULL),
(1249, 1706773380, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'max', 1706773405.00, NULL),
(1250, 1706773320, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'max', 1706773405.00, NULL),
(1251, 1706772960, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'max', 1706773405.00, NULL),
(1252, 1706765760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'max', 1706773405.00, NULL),
(1253, 1707019920, 60, 'user_request', '1', 'count', 1.00, NULL),
(1254, 1707019920, 360, 'user_request', '1', 'count', 1.00, NULL),
(1255, 1707019200, 1440, 'user_request', '1', 'count', 1.00, NULL),
(1256, 1707017760, 10080, 'user_request', '1', 'count', 1.00, NULL),
(1257, 1707019920, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1258, 1707019920, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1259, 1707019200, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1260, 1707017760, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 3.00, NULL),
(1261, 1707019920, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1262, 1707019920, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1263, 1707019200, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(1264, 1707017760, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 49.00, NULL),
(1265, 1707020220, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1269, 1707020340, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1270, 1707020280, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1277, 1707023040, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1278, 1707022800, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1279, 1707022080, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1281, 1707023160, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1282, 1707023160, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1285, 1707023220, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1289, 1707023580, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1290, 1707023520, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1291, 1707023520, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1293, 1707023580, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1294, 1707023520, 360, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(1295, 1707023520, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 11.00, NULL),
(1297, 1707023640, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1301, 1707023700, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1305, 1707023760, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1313, 1707023820, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1321, 1707023880, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1322, 1707023880, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1325, 1707023940, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1329, 1707024480, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1330, 1707024240, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1333, 1707024480, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'count', 1.00, NULL),
(1334, 1707024240, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'count', 3.00, NULL),
(1335, 1707023520, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'count', 3.00, NULL),
(1336, 1707017760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'count', 3.00, NULL),
(1337, 1707024480, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'max', 1707024513.00, NULL),
(1338, 1707024240, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'max', 1707024596.00, NULL),
(1339, 1707023520, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'max', 1707024596.00, NULL),
(1340, 1707017760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'max', 1707024596.00, NULL),
(1341, 1707024540, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'count', 2.00, NULL),
(1345, 1707024540, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 'max', 1707024596.00, NULL),
(1357, 1707024600, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'count', 1.00, NULL),
(1358, 1707024600, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'count', 2.00, NULL),
(1359, 1707023520, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'count', 2.00, NULL),
(1360, 1707017760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'count', 2.00, NULL),
(1361, 1707024600, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'max', 1707024610.00, NULL),
(1362, 1707024600, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'max', 1707024660.00, NULL),
(1363, 1707023520, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'max', 1707024660.00, NULL),
(1364, 1707017760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'max', 1707024660.00, NULL),
(1365, 1707024660, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'count', 1.00, NULL),
(1369, 1707024660, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 'max', 1707024660.00, NULL),
(1373, 1707024720, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:226\"]', 'count', 1.00, NULL),
(1374, 1707024600, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:226\"]', 'count', 1.00, NULL),
(1375, 1707023520, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:226\"]', 'count', 1.00, NULL),
(1376, 1707017760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:226\"]', 'count', 1.00, NULL),
(1377, 1707024720, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:226\"]', 'max', 1707024764.00, NULL),
(1378, 1707024600, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:226\"]', 'max', 1707024764.00, NULL),
(1379, 1707023520, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:226\"]', 'max', 1707024764.00, NULL),
(1380, 1707017760, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:226\"]', 'max', 1707024764.00, NULL),
(1381, 1707024900, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1382, 1707024600, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1385, 1707024960, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1386, 1707024960, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(1387, 1707024960, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 12.00, NULL),
(1389, 1707025020, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1393, 1707025080, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1401, 1707025140, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1405, 1707025320, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1406, 1707025320, 360, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(1409, 1707025380, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1413, 1707025440, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1417, 1707025500, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1421, 1707025560, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1429, 1707025680, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1430, 1707025680, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1433, 1707026760, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1434, 1707026760, 360, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(1435, 1707026400, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 19.00, NULL),
(1437, 1707026820, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1441, 1707026880, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1445, 1707027000, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1457, 1707027060, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1461, 1707027120, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1462, 1707027120, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(1465, 1707027180, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1469, 1707027240, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1470, 1707027120, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1471, 1707026400, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1473, 1707027240, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1477, 1707027360, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1485, 1707027480, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1486, 1707027480, 360, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(1489, 1707027540, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1493, 1707027600, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1497, 1707027720, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1501, 1707027780, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1513, 1707027840, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1514, 1707027840, 360, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(1515, 1707027840, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 14.00, NULL),
(1516, 1707027840, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 35.00, NULL),
(1521, 1707027960, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1529, 1707028020, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1533, 1707028080, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1537, 1707028200, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1538, 1707028200, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1541, 1707028260, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1545, 1707028380, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1549, 1707028620, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1550, 1707028560, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(1557, 1707028680, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1569, 1707030000, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1570, 1707030000, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1571, 1707029280, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1577, 1707030720, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1578, 1707030720, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1579, 1707030720, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1581, 1707031920, 60, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:125\"]', 'count', 1.00, NULL),
(1582, 1707031800, 360, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:125\"]', 'count', 1.00, NULL),
(1583, 1707030720, 1440, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:125\"]', 'count', 1.00, NULL),
(1584, 1707027840, 10080, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:125\"]', 'count', 1.00, NULL),
(1585, 1707031920, 60, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:125\"]', 'max', 1707031970.00, NULL),
(1586, 1707031800, 360, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:125\"]', 'max', 1707031970.00, NULL),
(1587, 1707030720, 1440, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:125\"]', 'max', 1707031970.00, NULL),
(1588, 1707027840, 10080, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:125\"]', 'max', 1707031970.00, NULL),
(1589, 1707031980, 60, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:238\"]', 'count', 1.00, NULL),
(1590, 1707031800, 360, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:238\"]', 'count', 1.00, NULL),
(1591, 1707030720, 1440, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:238\"]', 'count', 1.00, NULL),
(1592, 1707027840, 10080, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:238\"]', 'count', 1.00, NULL),
(1593, 1707031980, 60, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:238\"]', 'max', 1707031996.00, NULL),
(1594, 1707031800, 360, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:238\"]', 'max', 1707031996.00, NULL),
(1595, 1707030720, 1440, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:238\"]', 'max', 1707031996.00, NULL),
(1596, 1707027840, 10080, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:238\"]', 'max', 1707031996.00, NULL),
(1597, 1707032700, 60, 'slow_request', '[\"GET\",\"\\/admin\\/role\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Role\\\\RoleAndPermissionController@index\"]', 'count', 1.00, NULL),
(1598, 1707032520, 360, 'slow_request', '[\"GET\",\"\\/admin\\/role\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Role\\\\RoleAndPermissionController@index\"]', 'count', 1.00, NULL),
(1599, 1707032160, 1440, 'slow_request', '[\"GET\",\"\\/admin\\/role\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Role\\\\RoleAndPermissionController@index\"]', 'count', 1.00, NULL),
(1600, 1707027840, 10080, 'slow_request', '[\"GET\",\"\\/admin\\/role\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Role\\\\RoleAndPermissionController@index\"]', 'count', 1.00, NULL),
(1601, 1707032700, 60, 'slow_query', '[\"select * from `admins` where `id` = ? limit 1\",\"app\\\\Http\\\\Middleware\\\\Admin\\\\AdminLoginmiddleware.php:19\"]', 'count', 1.00, NULL),
(1602, 1707032520, 360, 'slow_query', '[\"select * from `admins` where `id` = ? limit 1\",\"app\\\\Http\\\\Middleware\\\\Admin\\\\AdminLoginmiddleware.php:19\"]', 'count', 1.00, NULL),
(1603, 1707032160, 1440, 'slow_query', '[\"select * from `admins` where `id` = ? limit 1\",\"app\\\\Http\\\\Middleware\\\\Admin\\\\AdminLoginmiddleware.php:19\"]', 'count', 1.00, NULL),
(1604, 1707027840, 10080, 'slow_query', '[\"select * from `admins` where `id` = ? limit 1\",\"app\\\\Http\\\\Middleware\\\\Admin\\\\AdminLoginmiddleware.php:19\"]', 'count', 1.00, NULL),
(1605, 1707032700, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1606, 1707032520, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1607, 1707032160, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1608, 1707027840, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(1609, 1707032700, 60, 'slow_request', '[\"GET\",\"\\/admin\\/role\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Role\\\\RoleAndPermissionController@index\"]', 'max', 7875.00, NULL),
(1610, 1707032520, 360, 'slow_request', '[\"GET\",\"\\/admin\\/role\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Role\\\\RoleAndPermissionController@index\"]', 'max', 7875.00, NULL),
(1611, 1707032160, 1440, 'slow_request', '[\"GET\",\"\\/admin\\/role\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Role\\\\RoleAndPermissionController@index\"]', 'max', 7875.00, NULL),
(1612, 1707027840, 10080, 'slow_request', '[\"GET\",\"\\/admin\\/role\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Role\\\\RoleAndPermissionController@index\"]', 'max', 7875.00, NULL),
(1613, 1707032700, 60, 'slow_query', '[\"select * from `admins` where `id` = ? limit 1\",\"app\\\\Http\\\\Middleware\\\\Admin\\\\AdminLoginmiddleware.php:19\"]', 'max', 7047.00, NULL),
(1614, 1707032520, 360, 'slow_query', '[\"select * from `admins` where `id` = ? limit 1\",\"app\\\\Http\\\\Middleware\\\\Admin\\\\AdminLoginmiddleware.php:19\"]', 'max', 7047.00, NULL),
(1615, 1707032160, 1440, 'slow_query', '[\"select * from `admins` where `id` = ? limit 1\",\"app\\\\Http\\\\Middleware\\\\Admin\\\\AdminLoginmiddleware.php:19\"]', 'max', 7047.00, NULL),
(1616, 1707027840, 10080, 'slow_query', '[\"select * from `admins` where `id` = ? limit 1\",\"app\\\\Http\\\\Middleware\\\\Admin\\\\AdminLoginmiddleware.php:19\"]', 'max', 7047.00, NULL),
(1617, 1707032700, 60, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(1618, 1707032520, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(1619, 1707032160, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 16.00, NULL),
(1637, 1707033180, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1638, 1707032880, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1641, 1707033360, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1642, 1707033240, 360, 'cache_hit', 'spatie.permission.cache', 'count', 10.00, NULL),
(1645, 1707033420, 60, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(1665, 1707033420, 60, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'count', 1.00, NULL),
(1666, 1707033240, 360, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'count', 1.00, NULL),
(1667, 1707032160, 1440, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'count', 1.00, NULL),
(1668, 1707027840, 10080, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'count', 1.00, NULL),
(1669, 1707033420, 60, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'count', 1.00, NULL),
(1670, 1707033240, 360, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'count', 1.00, NULL),
(1671, 1707032160, 1440, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'count', 1.00, NULL),
(1672, 1707027840, 10080, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'count', 1.00, NULL),
(1677, 1707033420, 60, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'max', 2669.00, NULL),
(1678, 1707033240, 360, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'max', 2669.00, NULL),
(1679, 1707032160, 1440, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'max', 2669.00, NULL),
(1680, 1707027840, 10080, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'max', 2669.00, NULL),
(1681, 1707033420, 60, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'max', 2202.00, NULL),
(1682, 1707033240, 360, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'max', 2202.00, NULL),
(1683, 1707032160, 1440, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'max', 2202.00, NULL),
(1684, 1707027840, 10080, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'max', 2202.00, NULL),
(1693, 1707033480, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1697, 1707037200, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1698, 1707037200, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1699, 1707036480, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1701, 1707037320, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1702, 1707037200, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1703, 1707036480, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1709, 1707039300, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1710, 1707039000, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1711, 1707037920, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1712, 1707037920, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 18.00, NULL),
(1713, 1707039360, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(1714, 1707039360, 360, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(1715, 1707039360, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 13.00, NULL),
(1717, 1707039360, 60, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(1718, 1707039360, 360, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(1719, 1707039360, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 3.00, NULL),
(1720, 1707037920, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 7.00, NULL),
(1737, 1707039420, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1741, 1707039480, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1749, 1707040200, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1750, 1707040080, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1753, 1707040200, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1754, 1707040080, 360, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(1761, 1707040320, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1769, 1707040380, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1777, 1707041460, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1778, 1707041160, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1779, 1707040800, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1780, 1707041460, 60, 'cache_miss', 'spatie.permission.cache', 'count', 3.00, NULL),
(1781, 1707041160, 360, 'cache_miss', 'spatie.permission.cache', 'count', 3.00, NULL),
(1782, 1707040800, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 4.00, NULL),
(1785, 1707041580, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1786, 1707041520, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1789, 1707041580, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1790, 1707041520, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1797, 1707044340, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1798, 1707044040, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1799, 1707043680, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1801, 1707125280, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1802, 1707125040, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1803, 1707124320, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1804, 1707118560, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1805, 1707125340, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(1806, 1707125040, 360, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(1807, 1707124320, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 12.00, NULL),
(1808, 1707118560, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 13.00, NULL),
(1821, 1707125460, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1822, 1707125400, 360, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(1833, 1707125520, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1845, 1707125580, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1849, 1707125580, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\index.blade.php:146\"]', 'count', 1.00, NULL),
(1850, 1707125400, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\index.blade.php:146\"]', 'count', 1.00, NULL),
(1851, 1707124320, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\index.blade.php:146\"]', 'count', 1.00, NULL),
(1852, 1707118560, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\index.blade.php:146\"]', 'count', 1.00, NULL),
(1857, 1707125580, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\index.blade.php:146\"]', 'max', 1707125631.00, NULL),
(1858, 1707125400, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\index.blade.php:146\"]', 'max', 1707125631.00, NULL),
(1859, 1707124320, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\index.blade.php:146\"]', 'max', 1707125631.00, NULL),
(1860, 1707118560, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\index.blade.php:146\"]', 'max', 1707125631.00, NULL),
(1861, 1707125760, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1862, 1707125760, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1863, 1707125760, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1865, 1707275220, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1866, 1707275160, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1867, 1707274080, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1868, 1707269760, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(1869, 1707275400, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1870, 1707275160, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1871, 1707274080, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1872, 1707269760, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 46.00, NULL),
(1873, 1707275400, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:184\"]', 'count', 1.00, NULL),
(1874, 1707275160, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:184\"]', 'count', 1.00, NULL),
(1875, 1707274080, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:184\"]', 'count', 1.00, NULL),
(1876, 1707269760, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:184\"]', 'count', 1.00, NULL),
(1877, 1707275400, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:184\"]', 'max', 1707275444.00, NULL),
(1878, 1707275160, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:184\"]', 'max', 1707275444.00, NULL),
(1879, 1707274080, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:184\"]', 'max', 1707275444.00, NULL),
(1880, 1707269760, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:184\"]', 'max', 1707275444.00, NULL),
(1881, 1707275580, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1882, 1707275520, 360, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(1883, 1707275520, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 27.00, NULL),
(1885, 1707275640, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1893, 1707275700, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1901, 1707275760, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1905, 1707275940, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1906, 1707275880, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1909, 1707276120, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1917, 1707276240, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1918, 1707276240, 360, 'cache_hit', 'spatie.permission.cache', 'count', 9.00, NULL),
(1921, 1707276360, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(1933, 1707276420, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1937, 1707276480, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1945, 1707276540, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(1953, 1707276600, 60, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(1954, 1707276600, 360, 'cache_hit', 'spatie.permission.cache', 'count', 9.00, NULL),
(1977, 1707276720, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1978, 1707276720, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:274\"]', 'count', 1.00, NULL),
(1979, 1707276600, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:274\"]', 'count', 1.00, NULL),
(1980, 1707275520, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:274\"]', 'count', 1.00, NULL),
(1981, 1707269760, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:274\"]', 'count', 1.00, NULL),
(1985, 1707276720, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:274\"]', 'max', 1707276761.00, NULL),
(1986, 1707276600, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:274\"]', 'max', 1707276761.00, NULL),
(1987, 1707275520, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:274\"]', 'max', 1707276761.00, NULL),
(1988, 1707269760, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:274\"]', 'max', 1707276761.00, NULL),
(1989, 1707276780, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1993, 1707276840, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(1997, 1707277320, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(1998, 1707277320, 360, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(1999, 1707276960, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 15.00, NULL),
(2013, 1707277440, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2017, 1707277500, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2021, 1707277560, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2025, 1707277620, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2029, 1707277800, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2030, 1707277680, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(2037, 1707277860, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2045, 1707277920, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2049, 1707278280, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2050, 1707278040, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2053, 1707278340, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2057, 1707278400, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2058, 1707278400, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2059, 1707278400, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2065, 1707278460, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2069, 1707286800, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2070, 1707286680, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2071, 1707285600, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2072, 1707279840, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2073, 1707287040, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2074, 1707287040, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2075, 1707287040, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 9.00, NULL),
(2076, 1707279840, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 20.00, NULL),
(2077, 1707287220, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2081, 1707287220, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:84\"]', 'count', 1.00, NULL),
(2082, 1707287040, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:84\"]', 'count', 1.00, NULL),
(2083, 1707287040, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:84\"]', 'count', 1.00, NULL),
(2084, 1707279840, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:84\"]', 'count', 1.00, NULL),
(2085, 1707287220, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:84\"]', 'max', 1707287267.00, NULL),
(2086, 1707287040, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:84\"]', 'max', 1707287267.00, NULL),
(2087, 1707287040, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:84\"]', 'max', 1707287267.00, NULL),
(2088, 1707279840, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:84\"]', 'max', 1707287267.00, NULL),
(2089, 1707287460, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'count', 1.00, NULL),
(2090, 1707287400, 360, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'count', 3.00, NULL),
(2091, 1707287040, 1440, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'count', 3.00, NULL),
(2092, 1707279840, 10080, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'count', 3.00, NULL),
(2093, 1707287460, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'max', 1707287488.00, NULL),
(2094, 1707287400, 360, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'max', 1707287600.00, NULL),
(2095, 1707287040, 1440, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'max', 1707287600.00, NULL),
(2096, 1707279840, 10080, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'max', 1707287600.00, NULL),
(2097, 1707287520, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'count', 1.00, NULL),
(2098, 1707287400, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'count', 1.00, NULL),
(2099, 1707287040, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'count', 1.00, NULL),
(2100, 1707279840, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'count', 1.00, NULL),
(2101, 1707287520, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'max', 1707287523.00, NULL),
(2102, 1707287400, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'max', 1707287523.00, NULL),
(2103, 1707287040, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'max', 1707287523.00, NULL),
(2104, 1707279840, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'max', 1707287523.00, NULL),
(2105, 1707287520, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'count', 1.00, NULL),
(2109, 1707287520, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'max', 1707287560.00, NULL),
(2113, 1707287580, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'count', 1.00, NULL),
(2117, 1707287580, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 'max', 1707287600.00, NULL),
(2121, 1707288120, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2122, 1707288120, 360, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(2125, 1707288240, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2129, 1707288300, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2133, 1707288360, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2141, 1707288420, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2149, 1707288480, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2150, 1707288480, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(2151, 1707288480, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 11.00, NULL),
(2153, 1707288540, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2157, 1707288600, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2161, 1707288720, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2165, 1707288780, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2169, 1707288840, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2170, 1707288840, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2173, 1707288960, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2177, 1707289320, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2178, 1707289200, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2181, 1707289380, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2185, 1707289440, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2189, 1707289800, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2190, 1707289560, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2193, 1707289920, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2194, 1707289920, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2195, 1707289920, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(2196, 1707289920, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 30.00, NULL),
(2197, 1707290160, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2201, 1707290340, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2202, 1707290280, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(2213, 1707290400, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2214, 1707290280, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2215, 1707289920, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2216, 1707289920, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(2217, 1707290460, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2221, 1707290520, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2225, 1707291360, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(2226, 1707291360, 360, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(2227, 1707291360, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(2241, 1707291960, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2242, 1707291720, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2245, 1707292020, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2253, 1707292140, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2254, 1707292080, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2257, 1707297960, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2258, 1707297840, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2259, 1707297120, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2261, 1707298020, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(2262, 1707297840, 360, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(2263, 1707297120, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(2277, 1707298080, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2281, 1707298140, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2282, 1707298140, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:55\"]', 'count', 1.00, NULL),
(2283, 1707297840, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:55\"]', 'count', 1.00, NULL),
(2284, 1707297120, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:55\"]', 'count', 1.00, NULL),
(2285, 1707289920, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:55\"]', 'count', 1.00, NULL),
(2289, 1707298140, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:55\"]', 'max', 1707298154.00, NULL),
(2290, 1707297840, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:55\"]', 'max', 1707298154.00, NULL),
(2291, 1707297120, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:55\"]', 'max', 1707298154.00, NULL),
(2292, 1707289920, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:55\"]', 'max', 1707298154.00, NULL),
(2293, 1707298200, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2294, 1707298200, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2297, 1707299280, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2298, 1707299280, 360, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(2299, 1707298560, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(2300, 1707299280, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'count', 1.00, NULL),
(2301, 1707299280, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'count', 4.00, NULL),
(2302, 1707298560, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'count', 4.00, NULL),
(2303, 1707289920, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'count', 4.00, NULL),
(2305, 1707299280, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'max', 1707299315.00, NULL),
(2306, 1707299280, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'max', 1707299550.00, NULL),
(2307, 1707298560, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'max', 1707299550.00, NULL);
INSERT INTO `pulse_aggregates` (`id`, `bucket`, `period`, `type`, `key`, `aggregate`, `value`, `count`) VALUES
(2308, 1707289920, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'max', 1707299550.00, NULL),
(2309, 1707299340, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2310, 1707299340, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'count', 1.00, NULL),
(2317, 1707299340, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'max', 1707299387.00, NULL),
(2321, 1707299400, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2322, 1707299400, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'count', 1.00, NULL),
(2329, 1707299400, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'max', 1707299409.00, NULL),
(2333, 1707299460, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2334, 1707299460, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'count', 1.00, NULL),
(2335, 1707299280, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'count', 1.00, NULL),
(2336, 1707298560, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'count', 1.00, NULL),
(2337, 1707289920, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'count', 1.00, NULL),
(2341, 1707299460, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'max', 1707299471.00, NULL),
(2342, 1707299280, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'max', 1707299471.00, NULL),
(2343, 1707298560, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'max', 1707299471.00, NULL),
(2344, 1707289920, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'max', 1707299471.00, NULL),
(2345, 1707299460, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'count', 2.00, NULL),
(2346, 1707299280, 360, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'count', 2.00, NULL),
(2347, 1707298560, 1440, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'count', 2.00, NULL),
(2348, 1707289920, 10080, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'count', 2.00, NULL),
(2353, 1707299460, 60, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'max', 1707299494.00, NULL),
(2354, 1707299280, 360, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'max', 1707299494.00, NULL),
(2355, 1707298560, 1440, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'max', 1707299494.00, NULL),
(2356, 1707289920, 10080, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 'max', 1707299494.00, NULL),
(2369, 1707299520, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2370, 1707299520, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'count', 1.00, NULL),
(2377, 1707299520, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 'max', 1707299550.00, NULL),
(2385, 1707300360, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2386, 1707300360, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(2387, 1707300000, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 14.00, NULL),
(2388, 1707300000, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 57.00, NULL),
(2393, 1707300420, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2397, 1707300540, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2401, 1707300600, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2405, 1707300900, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2406, 1707300720, 360, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(2413, 1707300960, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2421, 1707301080, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2422, 1707301080, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(2429, 1707301140, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2433, 1707301200, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2437, 1707301260, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2441, 1707301680, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2442, 1707301440, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2443, 1707301440, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2444, 1707300000, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(2445, 1707301680, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2446, 1707301440, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2447, 1707301440, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 23.00, NULL),
(2457, 1707302220, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2458, 1707302160, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(2465, 1707302280, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2477, 1707302520, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2478, 1707302520, 360, 'cache_hit', 'spatie.permission.cache', 'count', 15.00, NULL),
(2489, 1707302580, 60, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(2505, 1707302580, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(2506, 1707302520, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 2.00, NULL),
(2507, 1707301440, 1440, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 2.00, NULL),
(2508, 1707300000, 10080, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 5.00, NULL),
(2513, 1707302580, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1707302636.00, NULL),
(2514, 1707302520, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1707302872.00, NULL),
(2515, 1707301440, 1440, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1707302872.00, NULL),
(2516, 1707300000, 10080, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1707304180.00, NULL),
(2517, 1707302640, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2525, 1707302700, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2537, 1707302820, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2545, 1707302820, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(2549, 1707302820, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1707302872.00, NULL),
(2553, 1707302940, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(2554, 1707302880, 360, 'cache_hit', 'spatie.permission.cache', 'count', 15.00, NULL),
(2555, 1707302880, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 20.00, NULL),
(2556, 1707302940, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(2557, 1707302880, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 2.00, NULL),
(2558, 1707302880, 1440, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 3.00, NULL),
(2561, 1707302940, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1707302957.00, NULL),
(2562, 1707302880, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1707303135.00, NULL),
(2563, 1707302880, 1440, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1707304180.00, NULL),
(2577, 1707303000, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(2593, 1707303060, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2594, 1707302880, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2595, 1707302880, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2597, 1707303060, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2605, 1707303120, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(2609, 1707303120, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1707303135.00, NULL),
(2613, 1707303120, 60, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(2633, 1707304140, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2634, 1707303960, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(2635, 1707304140, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(2636, 1707303960, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'count', 1.00, NULL),
(2641, 1707304140, 60, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1707304180.00, NULL),
(2642, 1707303960, 360, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 'max', 1707304180.00, NULL),
(2645, 1707304200, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(2661, 1707360780, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2662, 1707360480, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2663, 1707360480, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2664, 1707360480, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(2665, 1707360780, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2666, 1707360480, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2667, 1707360480, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(2668, 1707360480, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 20.00, NULL),
(2677, 1707360840, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2678, 1707360840, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2685, 1707361860, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2686, 1707361560, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2689, 1707363360, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2690, 1707363360, 360, 'cache_hit', 'spatie.permission.cache', 'count', 7.00, NULL),
(2691, 1707363360, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 14.00, NULL),
(2701, 1707363600, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2709, 1707363660, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2710, 1707363660, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:58\"]', 'count', 2.00, NULL),
(2711, 1707363360, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:58\"]', 'count', 2.00, NULL),
(2712, 1707363360, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:58\"]', 'count', 2.00, NULL),
(2713, 1707360480, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:58\"]', 'count', 2.00, NULL),
(2717, 1707363660, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:58\"]', 'max', 1707363688.00, NULL),
(2718, 1707363360, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:58\"]', 'max', 1707363688.00, NULL),
(2719, 1707363360, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:58\"]', 'max', 1707363688.00, NULL),
(2720, 1707360480, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:58\"]', 'max', 1707363688.00, NULL),
(2733, 1707363720, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2734, 1707363720, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2737, 1707363900, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 'count', 1.00, NULL),
(2738, 1707363720, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 'count', 2.00, NULL),
(2739, 1707363360, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 'count', 2.00, NULL),
(2740, 1707360480, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 'count', 2.00, NULL),
(2741, 1707363900, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 'max', 1707363925.00, NULL),
(2742, 1707363720, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 'max', 1707363963.00, NULL),
(2743, 1707363360, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 'max', 1707363963.00, NULL),
(2744, 1707360480, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 'max', 1707363963.00, NULL),
(2745, 1707363960, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 'count', 1.00, NULL),
(2749, 1707363960, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 'max', 1707363963.00, NULL),
(2753, 1707364140, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2754, 1707364080, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2757, 1707364500, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2758, 1707364440, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2759, 1707363360, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2761, 1707364500, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2762, 1707364440, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(2769, 1707364680, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2781, 1707369000, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:216\"]', 'count', 1.00, NULL),
(2782, 1707368760, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:216\"]', 'count', 1.00, NULL),
(2783, 1707367680, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:216\"]', 'count', 1.00, NULL),
(2784, 1707360480, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:216\"]', 'count', 1.00, NULL),
(2785, 1707369000, 60, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:216\"]', 'max', 1707369027.00, NULL),
(2786, 1707368760, 360, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:216\"]', 'max', 1707369027.00, NULL),
(2787, 1707367680, 1440, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:216\"]', 'max', 1707369027.00, NULL),
(2788, 1707360480, 10080, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:216\"]', 'max', 1707369027.00, NULL),
(2789, 1707372300, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2790, 1707372000, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2791, 1707372000, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2792, 1707370560, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2793, 1707372300, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2794, 1707372000, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2795, 1707372000, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2796, 1707370560, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2797, 1707373080, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2798, 1707373080, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2805, 1707374160, 60, 'exception', '[\"TypeError\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:27\"]', 'count', 2.00, NULL),
(2806, 1707374160, 360, 'exception', '[\"TypeError\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:27\"]', 'count', 2.00, NULL),
(2807, 1707373440, 1440, 'exception', '[\"TypeError\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:27\"]', 'count', 2.00, NULL),
(2808, 1707370560, 10080, 'exception', '[\"TypeError\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:27\"]', 'count', 2.00, NULL),
(2809, 1707374160, 60, 'exception', '[\"TypeError\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:27\"]', 'max', 1707374206.00, NULL),
(2810, 1707374160, 360, 'exception', '[\"TypeError\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:27\"]', 'max', 1707374206.00, NULL),
(2811, 1707373440, 1440, 'exception', '[\"TypeError\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:27\"]', 'max', 1707374206.00, NULL),
(2812, 1707370560, 10080, 'exception', '[\"TypeError\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:27\"]', 'max', 1707374206.00, NULL),
(2821, 1707374520, 60, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 'count', 1.00, NULL),
(2822, 1707374520, 360, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 'count', 2.00, NULL),
(2823, 1707373440, 1440, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 'count', 2.00, NULL),
(2824, 1707370560, 10080, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 'count', 2.00, NULL),
(2825, 1707374520, 60, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 'max', 1707374566.00, NULL),
(2826, 1707374520, 360, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 'max', 1707374635.00, NULL),
(2827, 1707373440, 1440, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 'max', 1707374635.00, NULL),
(2828, 1707370560, 10080, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 'max', 1707374635.00, NULL),
(2829, 1707374580, 60, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:29\"]', 'count', 1.00, NULL),
(2830, 1707374520, 360, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:29\"]', 'count', 1.00, NULL),
(2831, 1707373440, 1440, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:29\"]', 'count', 1.00, NULL),
(2832, 1707370560, 10080, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:29\"]', 'count', 1.00, NULL),
(2833, 1707374580, 60, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:29\"]', 'max', 1707374597.00, NULL),
(2834, 1707374520, 360, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:29\"]', 'max', 1707374597.00, NULL),
(2835, 1707373440, 1440, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:29\"]', 'max', 1707374597.00, NULL),
(2836, 1707370560, 10080, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:29\"]', 'max', 1707374597.00, NULL),
(2837, 1707374580, 60, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 'count', 1.00, NULL),
(2841, 1707374580, 60, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 'max', 1707374635.00, NULL),
(2845, 1707378540, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:139\"]', 'count', 1.00, NULL),
(2846, 1707378480, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:139\"]', 'count', 1.00, NULL),
(2847, 1707377760, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:139\"]', 'count', 1.00, NULL),
(2848, 1707370560, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:139\"]', 'count', 1.00, NULL),
(2849, 1707378540, 60, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:139\"]', 'max', 1707378578.00, NULL),
(2850, 1707378480, 360, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:139\"]', 'max', 1707378578.00, NULL),
(2851, 1707377760, 1440, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:139\"]', 'max', 1707378578.00, NULL),
(2852, 1707370560, 10080, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:139\"]', 'max', 1707378578.00, NULL),
(2853, 1707383280, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2854, 1707383160, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2855, 1707382080, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2856, 1707380640, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(2857, 1707383280, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2858, 1707383160, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2859, 1707382080, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2860, 1707380640, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(2861, 1707385800, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2862, 1707385680, 360, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2863, 1707384960, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2873, 1707387000, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2874, 1707386760, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2875, 1707386400, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2877, 1707387840, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2878, 1707387840, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2879, 1707387840, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2881, 1707389940, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2882, 1707389640, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2883, 1707389280, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2885, 1707889380, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2886, 1707889320, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2887, 1707888960, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2888, 1707884640, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2889, 1707889380, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2890, 1707889320, 360, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(2891, 1707888960, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(2892, 1707884640, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(2893, 1707889440, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2901, 1707889620, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(2910, 1708338420, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2911, 1708338240, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2912, 1708338240, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2913, 1708338240, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2914, 1708338420, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1670.00, NULL),
(2915, 1708338240, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1670.00, NULL),
(2916, 1708338240, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1670.00, NULL),
(2917, 1708338240, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1670.00, NULL),
(2918, 1713669660, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2919, 1713669480, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2920, 1713669120, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2921, 1713660480, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2922, 1713669660, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 2453.00, NULL),
(2923, 1713669480, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 2453.00, NULL),
(2924, 1713669120, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 2453.00, NULL),
(2925, 1713660480, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 2453.00, NULL),
(2926, 1713669660, 60, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'count', 1.00, NULL),
(2927, 1713669480, 360, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'count', 1.00, NULL),
(2928, 1713669120, 1440, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'count', 1.00, NULL),
(2929, 1713660480, 10080, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'count', 1.00, NULL),
(2930, 1713669660, 60, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'max', 1059.00, NULL),
(2931, 1713669480, 360, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'max', 1059.00, NULL),
(2932, 1713669120, 1440, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'max', 1059.00, NULL),
(2933, 1713660480, 10080, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'max', 1059.00, NULL),
(2934, 1713669720, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2935, 1713669480, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2936, 1713669120, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2937, 1713660480, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2938, 1713672600, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2939, 1713672360, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2940, 1713672000, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2941, 1713670560, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(2942, 1713683580, 60, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'count', 1.00, NULL),
(2943, 1713683520, 360, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'count', 1.00, NULL),
(2944, 1713683520, 1440, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'count', 1.00, NULL),
(2945, 1713680640, 10080, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'count', 1.00, NULL),
(2946, 1713683580, 60, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'max', 1713683619.00, NULL),
(2947, 1713683520, 360, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'max', 1713683619.00, NULL),
(2948, 1713683520, 1440, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'max', 1713683619.00, NULL),
(2949, 1713680640, 10080, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'max', 1713683619.00, NULL),
(2950, 1713693660, 60, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'count', 1.00, NULL),
(2951, 1713693600, 360, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'count', 1.00, NULL),
(2952, 1713693600, 1440, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'count', 1.00, NULL),
(2953, 1713690720, 10080, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'count', 1.00, NULL),
(2954, 1713693660, 60, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'max', 1713693697.00, NULL),
(2955, 1713693600, 360, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'max', 1713693697.00, NULL),
(2956, 1713693600, 1440, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'max', 1713693697.00, NULL),
(2957, 1713690720, 10080, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 'max', 1713693697.00, NULL),
(2958, 1713694380, 60, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'count', 1.00, NULL),
(2959, 1713694320, 360, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'count', 1.00, NULL),
(2960, 1713693600, 1440, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'count', 1.00, NULL),
(2961, 1713690720, 10080, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'count', 2.00, NULL),
(2962, 1713694380, 60, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'max', 1713694431.00, NULL),
(2963, 1713694320, 360, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'max', 1713694431.00, NULL),
(2964, 1713693600, 1440, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'max', 1713694431.00, NULL),
(2965, 1713690720, 10080, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'max', 1713695178.00, NULL),
(2966, 1713695160, 60, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'count', 1.00, NULL),
(2967, 1713695040, 360, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'count', 1.00, NULL),
(2968, 1713695040, 1440, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'count', 1.00, NULL),
(2970, 1713695160, 60, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'max', 1713695178.00, NULL),
(2971, 1713695040, 360, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'max', 1713695178.00, NULL),
(2972, 1713695040, 1440, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 'max', 1713695178.00, NULL),
(2974, 1719238140, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2975, 1719237960, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2976, 1719237600, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2977, 1719234720, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(2978, 1719238140, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1708.00, NULL),
(2979, 1719237960, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1708.00, NULL),
(2980, 1719237600, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1708.00, NULL),
(2981, 1719234720, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1708.00, NULL),
(2982, 1719238140, 60, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'count', 1.00, NULL),
(2983, 1719237960, 360, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'count', 1.00, NULL),
(2984, 1719237600, 1440, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'count', 1.00, NULL),
(2985, 1719234720, 10080, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'count', 1.00, NULL),
(2986, 1719238140, 60, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'max', 1060.00, NULL),
(2987, 1719237960, 360, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'max', 1060.00, NULL),
(2988, 1719237600, 1440, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'max', 1060.00, NULL),
(2989, 1719234720, 10080, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 'max', 1060.00, NULL),
(2990, 1719238140, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2991, 1719237960, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(2992, 1719237600, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 3.00, NULL),
(2993, 1719234720, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 3.00, NULL),
(2994, 1719238200, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2995, 1719237960, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(2996, 1719237600, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 10.00, NULL),
(2997, 1719234720, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 10.00, NULL),
(3002, 1719238380, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(3003, 1719238320, 360, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(3006, 1719238440, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(3010, 1719238440, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3011, 1719238320, 360, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(3018, 1719238500, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3022, 1719238560, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(3034, 1719238860, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(3035, 1719238680, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(3039, 1726979220, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3040, 1726979040, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3041, 1726979040, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3042, 1726976160, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3043, 1726979220, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 5295.00, NULL),
(3044, 1726979040, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 5295.00, NULL),
(3045, 1726979040, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 5295.00, NULL),
(3046, 1726976160, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 5295.00, NULL),
(3047, 1726980300, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3048, 1726980120, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3049, 1726979040, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3050, 1726976160, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 3.00, NULL),
(3051, 1726980300, 60, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(3052, 1726980120, 360, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(3053, 1726979040, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(3054, 1726976160, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 44.00, NULL),
(3071, 1726981620, 60, 'slow_request', '[\"GET\",\"\\/admin\\/dashboard\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@index\"]', 'count', 1.00, NULL),
(3072, 1726981560, 360, 'slow_request', '[\"GET\",\"\\/admin\\/dashboard\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@index\"]', 'count', 1.00, NULL),
(3073, 1726980480, 1440, 'slow_request', '[\"GET\",\"\\/admin\\/dashboard\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@index\"]', 'count', 1.00, NULL),
(3074, 1726976160, 10080, 'slow_request', '[\"GET\",\"\\/admin\\/dashboard\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@index\"]', 'count', 1.00, NULL),
(3075, 1726981620, 60, 'slow_request', '[\"GET\",\"\\/admin\\/dashboard\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@index\"]', 'max', 2185.00, NULL),
(3076, 1726981560, 360, 'slow_request', '[\"GET\",\"\\/admin\\/dashboard\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@index\"]', 'max', 2185.00, NULL),
(3077, 1726980480, 1440, 'slow_request', '[\"GET\",\"\\/admin\\/dashboard\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@index\"]', 'max', 2185.00, NULL),
(3078, 1726976160, 10080, 'slow_request', '[\"GET\",\"\\/admin\\/dashboard\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@index\"]', 'max', 2185.00, NULL),
(3079, 1726981800, 60, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(3080, 1726981560, 360, 'cache_hit', 'spatie.permission.cache', 'count', 11.00, NULL),
(3081, 1726980480, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 11.00, NULL),
(3099, 1726981860, 60, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(3123, 1726981920, 60, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(3124, 1726981920, 360, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(3125, 1726981920, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 28.00, NULL),
(3135, 1726981980, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(3139, 1726982460, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(3140, 1726982280, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(3143, 1726982460, 60, 'exception', '[\"InvalidArgumentException\",\"app\\\\Http\\\\Controllers\\\\FrontendControllers\\\\HomeController.php:15\"]', 'count', 1.00, NULL),
(3144, 1726982280, 360, 'exception', '[\"InvalidArgumentException\",\"app\\\\Http\\\\Controllers\\\\FrontendControllers\\\\HomeController.php:15\"]', 'count', 1.00, NULL),
(3145, 1726981920, 1440, 'exception', '[\"InvalidArgumentException\",\"app\\\\Http\\\\Controllers\\\\FrontendControllers\\\\HomeController.php:15\"]', 'count', 1.00, NULL),
(3146, 1726976160, 10080, 'exception', '[\"InvalidArgumentException\",\"app\\\\Http\\\\Controllers\\\\FrontendControllers\\\\HomeController.php:15\"]', 'count', 1.00, NULL),
(3147, 1726982460, 60, 'exception', '[\"InvalidArgumentException\",\"app\\\\Http\\\\Controllers\\\\FrontendControllers\\\\HomeController.php:15\"]', 'max', 1726982496.00, NULL),
(3148, 1726982280, 360, 'exception', '[\"InvalidArgumentException\",\"app\\\\Http\\\\Controllers\\\\FrontendControllers\\\\HomeController.php:15\"]', 'max', 1726982496.00, NULL),
(3149, 1726981920, 1440, 'exception', '[\"InvalidArgumentException\",\"app\\\\Http\\\\Controllers\\\\FrontendControllers\\\\HomeController.php:15\"]', 'max', 1726982496.00, NULL),
(3150, 1726976160, 10080, 'exception', '[\"InvalidArgumentException\",\"app\\\\Http\\\\Controllers\\\\FrontendControllers\\\\HomeController.php:15\"]', 'max', 1726982496.00, NULL),
(3151, 1726982460, 60, 'exception', '[\"InvalidArgumentException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\FileViewFinder.php:137\"]', 'count', 1.00, NULL),
(3152, 1726982280, 360, 'exception', '[\"InvalidArgumentException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\FileViewFinder.php:137\"]', 'count', 1.00, NULL),
(3153, 1726981920, 1440, 'exception', '[\"InvalidArgumentException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\FileViewFinder.php:137\"]', 'count', 1.00, NULL),
(3154, 1726976160, 10080, 'exception', '[\"InvalidArgumentException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\FileViewFinder.php:137\"]', 'count', 1.00, NULL),
(3155, 1726982460, 60, 'exception', '[\"InvalidArgumentException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\FileViewFinder.php:137\"]', 'max', 1726982512.00, NULL),
(3156, 1726982280, 360, 'exception', '[\"InvalidArgumentException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\FileViewFinder.php:137\"]', 'max', 1726982512.00, NULL),
(3157, 1726981920, 1440, 'exception', '[\"InvalidArgumentException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\FileViewFinder.php:137\"]', 'max', 1726982512.00, NULL),
(3158, 1726976160, 10080, 'exception', '[\"InvalidArgumentException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\FileViewFinder.php:137\"]', 'max', 1726982512.00, NULL),
(3159, 1726982760, 60, 'cache_hit', 'spatie.permission.cache', 'count', 5.00, NULL),
(3160, 1726982640, 360, 'cache_hit', 'spatie.permission.cache', 'count', 23.00, NULL),
(3179, 1726982820, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(3195, 1726982880, 60, 'cache_hit', 'spatie.permission.cache', 'count', 8.00, NULL),
(3227, 1726982940, 60, 'cache_hit', 'spatie.permission.cache', 'count', 6.00, NULL),
(3251, 1726984860, 60, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(3252, 1726984800, 360, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(3253, 1726984800, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 2.00, NULL),
(3259, 1726984980, 60, 'slow_request', '[\"GET\",\"\\/admin\\/admin-profile\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@adminProfile\"]', 'count', 1.00, NULL),
(3260, 1726984800, 360, 'slow_request', '[\"GET\",\"\\/admin\\/admin-profile\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@adminProfile\"]', 'count', 1.00, NULL),
(3261, 1726984800, 1440, 'slow_request', '[\"GET\",\"\\/admin\\/admin-profile\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@adminProfile\"]', 'count', 1.00, NULL),
(3262, 1726976160, 10080, 'slow_request', '[\"GET\",\"\\/admin\\/admin-profile\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@adminProfile\"]', 'count', 1.00, NULL),
(3263, 1726984980, 60, 'slow_request', '[\"GET\",\"\\/admin\\/admin-profile\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@adminProfile\"]', 'max', 2360.00, NULL),
(3264, 1726984800, 360, 'slow_request', '[\"GET\",\"\\/admin\\/admin-profile\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@adminProfile\"]', 'max', 2360.00, NULL),
(3265, 1726984800, 1440, 'slow_request', '[\"GET\",\"\\/admin\\/admin-profile\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@adminProfile\"]', 'max', 2360.00, NULL),
(3266, 1726976160, 10080, 'slow_request', '[\"GET\",\"\\/admin\\/admin-profile\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@adminProfile\"]', 'max', 2360.00, NULL),
(3267, 1730692680, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3268, 1730692440, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3269, 1730691360, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3270, 1730685600, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3271, 1730692680, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1455.00, NULL),
(3272, 1730692440, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1455.00, NULL),
(3273, 1730691360, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1455.00, NULL),
(3274, 1730685600, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1455.00, NULL),
(3275, 1730692740, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3276, 1730692440, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3277, 1730691360, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3278, 1730685600, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL);
INSERT INTO `pulse_aggregates` (`id`, `bucket`, `period`, `type`, `key`, `aggregate`, `value`, `count`) VALUES
(3279, 1730692740, 60, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(3280, 1730692440, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(3281, 1730691360, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(3282, 1730685600, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 3.00, NULL),
(3287, 1730693040, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(3288, 1730692800, 360, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(3289, 1730692800, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(3291, 1730718420, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3292, 1730718360, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3293, 1730717280, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3294, 1730715840, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3295, 1730718420, 60, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(3296, 1730718360, 360, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(3297, 1730717280, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(3298, 1730715840, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 4.00, NULL),
(3303, 1730718420, 60, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'count', 1.00, NULL),
(3304, 1730718360, 360, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'count', 1.00, NULL),
(3305, 1730717280, 1440, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'count', 1.00, NULL),
(3306, 1730715840, 10080, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'count', 1.00, NULL),
(3307, 1730718420, 60, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'count', 1.00, NULL),
(3308, 1730718360, 360, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'count', 1.00, NULL),
(3309, 1730717280, 1440, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'count', 1.00, NULL),
(3310, 1730715840, 10080, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'count', 1.00, NULL),
(3311, 1730718420, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController.php:146\"]', 'count', 1.00, NULL),
(3312, 1730718360, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController.php:146\"]', 'count', 1.00, NULL),
(3313, 1730717280, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController.php:146\"]', 'count', 1.00, NULL),
(3314, 1730715840, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController.php:146\"]', 'count', 1.00, NULL),
(3319, 1730718420, 60, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'max', 2959.00, NULL),
(3320, 1730718360, 360, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'max', 2959.00, NULL),
(3321, 1730717280, 1440, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'max', 2959.00, NULL),
(3322, 1730715840, 10080, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 'max', 2959.00, NULL),
(3323, 1730718420, 60, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'max', 2097.00, NULL),
(3324, 1730718360, 360, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'max', 2097.00, NULL),
(3325, 1730717280, 1440, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'max', 2097.00, NULL),
(3326, 1730715840, 10080, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 'max', 2097.00, NULL),
(3327, 1730718420, 60, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController.php:146\"]', 'max', 1730718458.00, NULL),
(3328, 1730718360, 360, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController.php:146\"]', 'max', 1730718458.00, NULL),
(3329, 1730717280, 1440, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController.php:146\"]', 'max', 1730718458.00, NULL),
(3330, 1730715840, 10080, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController.php:146\"]', 'max', 1730718458.00, NULL),
(3332, 1747453920, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3333, 1747453680, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3334, 1747452960, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3335, 1747448640, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3336, 1747453920, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1625.00, NULL),
(3337, 1747453680, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1625.00, NULL),
(3338, 1747452960, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1625.00, NULL),
(3339, 1747448640, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 1625.00, NULL),
(3340, 1747453980, 60, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3341, 1747453680, 360, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3342, 1747452960, 1440, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3343, 1747448640, 10080, 'cache_miss', 'spatie.permission.cache', 'count', 1.00, NULL),
(3344, 1747455180, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(3345, 1747455120, 360, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(3346, 1747454400, 1440, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(3347, 1747448640, 10080, 'cache_hit', 'spatie.permission.cache', 'count', 2.00, NULL),
(3348, 1747455240, 60, 'cache_hit', 'spatie.permission.cache', 'count', 1.00, NULL),
(3352, 1747538460, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3353, 1747538280, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3354, 1747537920, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3355, 1747529280, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'count', 1.00, NULL),
(3356, 1747538460, 60, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 4509.00, NULL),
(3357, 1747538280, 360, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 4509.00, NULL),
(3358, 1747537920, 1440, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 4509.00, NULL),
(3359, 1747529280, 10080, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 'max', 4509.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pulse_entries`
--

CREATE TABLE `pulse_entries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `key` mediumtext NOT NULL,
  `key_hash` binary(16) GENERATED ALWAYS AS (unhex(md5(`key`))) VIRTUAL,
  `value` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pulse_entries`
--

INSERT INTO `pulse_entries` (`id`, `timestamp`, `type`, `key`, `value`) VALUES
(1, 1706595960, 'cache_hit', 'spatie.permission.cache', NULL),
(2, 1706596058, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 1706596058),
(3, 1706596275, 'user_request', '1', NULL),
(4, 1706596312, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Auth\\\\RegisteredUserController.php:42\"]', 1706596312),
(5, 1706596359, 'user_request', '1', NULL),
(6, 1706596359, 'user_request', '1', NULL),
(7, 1706596366, 'exception', '[\"BadMethodCallException\",\"app\\\\Providers\\\\AuthServiceProvider.php:34\"]', 1706596366),
(8, 1706596366, 'exception', '[\"BadMethodCallException\",\"app\\\\Providers\\\\AuthServiceProvider.php:34\"]', 1706596366),
(9, 1706596381, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:27\"]', 1706596381),
(10, 1706596393, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:8\"]', 1706596393),
(11, 1706596440, 'exception', '[\"Error\",\"app\\\\Helpers\\\\helpers.php:19\"]', 1706596440),
(12, 1706596460, 'exception', '[\"Error\",\"resources\\\\views\\\\backend\\\\shared\\\\nav\\\\admin_sidebar.blade.php:7\"]', 1706596460),
(13, 1706596517, 'user_request', '1', NULL),
(14, 1706596582, 'user_request', '1', NULL),
(15, 1706596584, 'user_request', '1', NULL),
(16, 1706596629, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 1706596629),
(17, 1706596634, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 1706596634),
(18, 1706596639, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 1706596639),
(19, 1706596644, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 1706596644),
(20, 1706596647, 'exception', '[\"TypeError\",\"app\\\\Providers\\\\AuthServiceProvider.php:28\"]', 1706596647),
(21, 1706596739, 'user_request', '1', NULL),
(22, 1706596742, 'user_request', '1', NULL),
(23, 1706596744, 'user_request', '1', NULL),
(24, 1706597752, 'cache_hit', 'spatie.permission.cache', NULL),
(25, 1706597873, 'cache_hit', 'spatie.permission.cache', NULL),
(26, 1706598089, 'cache_hit', 'spatie.permission.cache', NULL),
(27, 1706598119, 'cache_hit', 'spatie.permission.cache', NULL),
(28, 1706598125, 'cache_hit', 'spatie.permission.cache', NULL),
(29, 1706598287, 'cache_hit', 'spatie.permission.cache', NULL),
(30, 1706598299, 'cache_hit', 'spatie.permission.cache', NULL),
(31, 1706598352, 'cache_hit', 'spatie.permission.cache', NULL),
(32, 1706598399, 'cache_hit', 'spatie.permission.cache', NULL),
(33, 1706598420, 'cache_hit', 'spatie.permission.cache', NULL),
(34, 1706598470, 'cache_hit', 'spatie.permission.cache', NULL),
(35, 1706598536, 'cache_hit', 'spatie.permission.cache', NULL),
(36, 1706598764, 'cache_miss', 'spatie.permission.cache', NULL),
(37, 1706598782, 'cache_hit', 'spatie.permission.cache', NULL),
(38, 1706598799, 'cache_hit', 'spatie.permission.cache', NULL),
(39, 1706605452, 'cache_miss', 'spatie.permission.cache', NULL),
(40, 1706605456, 'cache_hit', 'spatie.permission.cache', NULL),
(41, 1706605463, 'cache_hit', 'spatie.permission.cache', NULL),
(42, 1706605463, 'cache_miss', 'spatie.permission.cache', NULL),
(43, 1706605466, 'cache_miss', 'spatie.permission.cache', NULL),
(44, 1706605471, 'cache_hit', 'spatie.permission.cache', NULL),
(45, 1706605485, 'cache_miss', 'spatie.permission.cache', NULL),
(46, 1706679363, 'cache_miss', 'spatie.permission.cache', NULL),
(47, 1706679989, 'cache_hit', 'spatie.permission.cache', NULL),
(48, 1706679989, 'exception', '[\"Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\Exceptions\\\\UrlGenerationException.php:35\"]', 1706679989),
(49, 1706680060, 'cache_hit', 'spatie.permission.cache', NULL),
(50, 1706680217, 'cache_hit', 'spatie.permission.cache', NULL),
(51, 1706680234, 'cache_hit', 'spatie.permission.cache', NULL),
(52, 1706680312, 'cache_hit', 'spatie.permission.cache', NULL),
(53, 1706680317, 'cache_hit', 'spatie.permission.cache', NULL),
(54, 1706681184, 'cache_hit', 'spatie.permission.cache', NULL),
(55, 1706681187, 'cache_hit', 'spatie.permission.cache', NULL),
(56, 1706681229, 'cache_hit', 'spatie.permission.cache', NULL),
(57, 1706681238, 'cache_hit', 'spatie.permission.cache', NULL),
(58, 1706681240, 'cache_hit', 'spatie.permission.cache', NULL),
(59, 1706681385, 'cache_hit', 'spatie.permission.cache', NULL),
(60, 1706681401, 'cache_hit', 'spatie.permission.cache', NULL),
(61, 1706681404, 'cache_hit', 'spatie.permission.cache', NULL),
(62, 1706681675, 'cache_hit', 'spatie.permission.cache', NULL),
(63, 1706681697, 'cache_hit', 'spatie.permission.cache', NULL),
(64, 1706681698, 'cache_hit', 'spatie.permission.cache', NULL),
(65, 1706681699, 'cache_hit', 'spatie.permission.cache', NULL),
(66, 1706681711, 'cache_hit', 'spatie.permission.cache', NULL),
(67, 1706681729, 'cache_hit', 'spatie.permission.cache', NULL),
(68, 1706681732, 'cache_hit', 'spatie.permission.cache', NULL),
(69, 1706681768, 'cache_hit', 'spatie.permission.cache', NULL),
(70, 1706681917, 'cache_hit', 'spatie.permission.cache', NULL),
(71, 1706681935, 'cache_hit', 'spatie.permission.cache', NULL),
(72, 1706681935, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 1706681935),
(73, 1706681944, 'cache_hit', 'spatie.permission.cache', NULL),
(74, 1706681945, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:146\"]', 1706681945),
(75, 1706682034, 'cache_hit', 'spatie.permission.cache', NULL),
(76, 1706682144, 'cache_hit', 'spatie.permission.cache', NULL),
(77, 1706682146, 'cache_hit', 'spatie.permission.cache', NULL),
(78, 1706682189, 'cache_hit', 'spatie.permission.cache', NULL),
(79, 1706682221, 'cache_hit', 'spatie.permission.cache', NULL),
(80, 1706682221, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 1706682221),
(81, 1706682296, 'cache_hit', 'spatie.permission.cache', NULL),
(82, 1706682296, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:147\"]', 1706682296),
(83, 1706682530, 'cache_hit', 'spatie.permission.cache', NULL),
(84, 1706682530, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\ProductUpdateRequest.php:158\"]', 1706682530),
(85, 1706682543, 'cache_hit', 'spatie.permission.cache', NULL),
(86, 1706682545, 'cache_hit', 'spatie.permission.cache', NULL),
(87, 1706682637, 'cache_hit', 'spatie.permission.cache', NULL),
(88, 1706682645, 'cache_hit', 'spatie.permission.cache', NULL),
(89, 1706682647, 'cache_hit', 'spatie.permission.cache', NULL),
(90, 1706682655, 'cache_hit', 'spatie.permission.cache', NULL),
(91, 1706682790, 'cache_hit', 'spatie.permission.cache', NULL),
(92, 1706682799, 'cache_hit', 'spatie.permission.cache', NULL),
(93, 1706682802, 'cache_hit', 'spatie.permission.cache', NULL),
(94, 1706682896, 'cache_hit', 'spatie.permission.cache', NULL),
(95, 1706682952, 'cache_hit', 'spatie.permission.cache', NULL),
(96, 1706682992, 'cache_miss', 'spatie.permission.cache', NULL),
(97, 1706682994, 'cache_hit', 'spatie.permission.cache', NULL),
(98, 1706683025, 'cache_hit', 'spatie.permission.cache', NULL),
(99, 1706683048, 'cache_hit', 'spatie.permission.cache', NULL),
(100, 1706685200, 'cache_hit', 'spatie.permission.cache', NULL),
(101, 1706685345, 'cache_hit', 'spatie.permission.cache', NULL),
(102, 1706685702, 'cache_hit', 'spatie.permission.cache', NULL),
(103, 1706685748, 'cache_hit', 'spatie.permission.cache', NULL),
(104, 1706685765, 'cache_hit', 'spatie.permission.cache', NULL),
(105, 1706685783, 'cache_hit', 'spatie.permission.cache', NULL),
(106, 1706685796, 'cache_hit', 'spatie.permission.cache', NULL),
(107, 1706685819, 'cache_hit', 'spatie.permission.cache', NULL),
(108, 1706685862, 'cache_hit', 'spatie.permission.cache', NULL),
(109, 1706686090, 'cache_hit', 'spatie.permission.cache', NULL),
(110, 1706686122, 'cache_hit', 'spatie.permission.cache', NULL),
(111, 1706686230, 'cache_hit', 'spatie.permission.cache', NULL),
(112, 1706686230, 'exception', '[\"TypeError\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Support\\\\helpers.php:124\"]', 1706686230),
(113, 1706686257, 'cache_hit', 'spatie.permission.cache', NULL),
(114, 1706686257, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\edit.blade.php:614\"]', 1706686257),
(115, 1706686337, 'cache_hit', 'spatie.permission.cache', NULL),
(116, 1706686347, 'cache_hit', 'spatie.permission.cache', NULL),
(117, 1706686374, 'cache_hit', 'spatie.permission.cache', NULL),
(118, 1706686426, 'cache_hit', 'spatie.permission.cache', NULL),
(119, 1706686596, 'cache_miss', 'spatie.permission.cache', NULL),
(120, 1706686619, 'cache_hit', 'spatie.permission.cache', NULL),
(121, 1706686640, 'cache_hit', 'spatie.permission.cache', NULL),
(122, 1706686685, 'cache_hit', 'spatie.permission.cache', NULL),
(123, 1706686693, 'cache_hit', 'spatie.permission.cache', NULL),
(124, 1706686767, 'cache_hit', 'spatie.permission.cache', NULL),
(125, 1706691468, 'cache_miss', 'spatie.permission.cache', NULL),
(126, 1706691472, 'cache_hit', 'spatie.permission.cache', NULL),
(127, 1706691477, 'cache_hit', 'spatie.permission.cache', NULL),
(128, 1706691484, 'cache_hit', 'spatie.permission.cache', NULL),
(129, 1706691558, 'cache_hit', 'spatie.permission.cache', NULL),
(130, 1706691594, 'cache_hit', 'spatie.permission.cache', NULL),
(131, 1706691662, 'cache_hit', 'spatie.permission.cache', NULL),
(132, 1706691707, 'cache_hit', 'spatie.permission.cache', NULL),
(133, 1706691758, 'cache_hit', 'spatie.permission.cache', NULL),
(134, 1706691779, 'cache_hit', 'spatie.permission.cache', NULL),
(135, 1706691847, 'cache_hit', 'spatie.permission.cache', NULL),
(136, 1706691852, 'cache_hit', 'spatie.permission.cache', NULL),
(137, 1706691912, 'cache_hit', 'spatie.permission.cache', NULL),
(138, 1706691919, 'cache_hit', 'spatie.permission.cache', NULL),
(139, 1706691930, 'cache_hit', 'spatie.permission.cache', NULL),
(140, 1706691932, 'cache_hit', 'spatie.permission.cache', NULL),
(141, 1706691943, 'cache_hit', 'spatie.permission.cache', NULL),
(142, 1706691944, 'cache_hit', 'spatie.permission.cache', NULL),
(143, 1706692033, 'cache_hit', 'spatie.permission.cache', NULL),
(144, 1706692037, 'cache_hit', 'spatie.permission.cache', NULL),
(145, 1706696273, 'cache_miss', 'spatie.permission.cache', NULL),
(146, 1706696294, 'cache_hit', 'spatie.permission.cache', NULL),
(147, 1706696299, 'cache_hit', 'spatie.permission.cache', NULL),
(148, 1706696301, 'cache_hit', 'spatie.permission.cache', NULL),
(149, 1706696302, 'cache_hit', 'spatie.permission.cache', NULL),
(150, 1706696304, 'cache_hit', 'spatie.permission.cache', NULL),
(151, 1706696306, 'cache_hit', 'spatie.permission.cache', NULL),
(152, 1706696308, 'cache_hit', 'spatie.permission.cache', NULL),
(153, 1706699051, 'cache_hit', 'spatie.permission.cache', NULL),
(154, 1706699054, 'cache_hit', 'spatie.permission.cache', NULL),
(155, 1706699059, 'cache_hit', 'spatie.permission.cache', NULL),
(156, 1706764591, 'cache_miss', 'spatie.permission.cache', NULL),
(157, 1706764593, 'cache_hit', 'spatie.permission.cache', NULL),
(158, 1706764593, 'cache_hit', 'spatie.permission.cache', NULL),
(159, 1706764675, 'cache_hit', 'spatie.permission.cache', NULL),
(160, 1706765029, 'cache_miss', 'spatie.permission.cache', NULL),
(161, 1706765341, 'cache_hit', 'spatie.permission.cache', NULL),
(162, 1706765343, 'cache_hit', 'spatie.permission.cache', NULL),
(163, 1706765376, 'cache_hit', 'spatie.permission.cache', NULL),
(164, 1706765379, 'cache_hit', 'spatie.permission.cache', NULL),
(165, 1706765380, 'cache_hit', 'spatie.permission.cache', NULL),
(166, 1706765463, 'cache_hit', 'spatie.permission.cache', NULL),
(167, 1706765466, 'cache_hit', 'spatie.permission.cache', NULL),
(168, 1706765467, 'cache_hit', 'spatie.permission.cache', NULL),
(169, 1706765495, 'cache_hit', 'spatie.permission.cache', NULL),
(170, 1706765496, 'cache_hit', 'spatie.permission.cache', NULL),
(171, 1706765502, 'cache_hit', 'spatie.permission.cache', NULL),
(172, 1706765504, 'cache_hit', 'spatie.permission.cache', NULL),
(173, 1706765537, 'cache_hit', 'spatie.permission.cache', NULL),
(174, 1706765540, 'cache_hit', 'spatie.permission.cache', NULL),
(175, 1706765617, 'cache_hit', 'spatie.permission.cache', NULL),
(176, 1706765620, 'cache_hit', 'spatie.permission.cache', NULL),
(177, 1706765622, 'cache_hit', 'spatie.permission.cache', NULL),
(178, 1706765669, 'cache_hit', 'spatie.permission.cache', NULL),
(179, 1706765672, 'cache_hit', 'spatie.permission.cache', NULL),
(180, 1706765674, 'cache_hit', 'spatie.permission.cache', NULL),
(181, 1706765714, 'slow_request', '[\"GET\",\"\\/admin\\/product\\/create\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController@create\"]', 1067),
(182, 1706765715, 'cache_hit', 'spatie.permission.cache', NULL),
(183, 1706765715, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 1706765715),
(184, 1706765821, 'cache_hit', 'spatie.permission.cache', NULL),
(185, 1706765823, 'cache_hit', 'spatie.permission.cache', NULL),
(186, 1706765914, 'cache_hit', 'spatie.permission.cache', NULL),
(187, 1706765915, 'cache_hit', 'spatie.permission.cache', NULL),
(188, 1706765915, 'cache_hit', 'spatie.permission.cache', NULL),
(189, 1706765941, 'cache_hit', 'spatie.permission.cache', NULL),
(190, 1706765943, 'cache_hit', 'spatie.permission.cache', NULL),
(191, 1706765943, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 1706765943),
(192, 1706766041, 'cache_hit', 'spatie.permission.cache', NULL),
(193, 1706766044, 'cache_hit', 'spatie.permission.cache', NULL),
(194, 1706766052, 'cache_hit', 'spatie.permission.cache', NULL),
(195, 1706766057, 'cache_hit', 'spatie.permission.cache', NULL),
(196, 1706766067, 'cache_hit', 'spatie.permission.cache', NULL),
(197, 1706766068, 'cache_hit', 'spatie.permission.cache', NULL),
(198, 1706766082, 'cache_hit', 'spatie.permission.cache', NULL),
(199, 1706766084, 'cache_hit', 'spatie.permission.cache', NULL),
(200, 1706766086, 'cache_hit', 'spatie.permission.cache', NULL),
(201, 1706766098, 'cache_hit', 'spatie.permission.cache', NULL),
(202, 1706766099, 'cache_hit', 'spatie.permission.cache', NULL),
(203, 1706766103, 'cache_hit', 'spatie.permission.cache', NULL),
(204, 1706766163, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 1706766163),
(205, 1706766194, 'cache_hit', 'spatie.permission.cache', NULL),
(206, 1706766227, 'cache_hit', 'spatie.permission.cache', NULL),
(207, 1706766275, 'cache_hit', 'spatie.permission.cache', NULL),
(208, 1706766282, 'cache_hit', 'spatie.permission.cache', NULL),
(209, 1706766353, 'cache_hit', 'spatie.permission.cache', NULL),
(210, 1706766367, 'cache_hit', 'spatie.permission.cache', NULL),
(211, 1706766367, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\barcode\\\\index.blade.php:184\"]', 1706766367),
(212, 1706766397, 'cache_hit', 'spatie.permission.cache', NULL),
(213, 1706766585, 'cache_hit', 'spatie.permission.cache', NULL),
(214, 1706766701, 'cache_hit', 'spatie.permission.cache', NULL),
(215, 1706766811, 'cache_hit', 'spatie.permission.cache', NULL),
(216, 1706767128, 'cache_hit', 'spatie.permission.cache', NULL),
(217, 1706767234, 'cache_hit', 'spatie.permission.cache', NULL),
(218, 1706767807, 'cache_hit', 'spatie.permission.cache', NULL),
(219, 1706767817, 'cache_hit', 'spatie.permission.cache', NULL),
(220, 1706768111, 'cache_hit', 'spatie.permission.cache', NULL),
(221, 1706768237, 'cache_hit', 'spatie.permission.cache', NULL),
(222, 1706768400, 'cache_hit', 'spatie.permission.cache', NULL),
(223, 1706768439, 'cache_hit', 'spatie.permission.cache', NULL),
(224, 1706768454, 'cache_hit', 'spatie.permission.cache', NULL),
(225, 1706768508, 'cache_hit', 'spatie.permission.cache', NULL),
(226, 1706768568, 'cache_hit', 'spatie.permission.cache', NULL),
(227, 1706768650, 'cache_miss', 'spatie.permission.cache', NULL),
(228, 1706768737, 'cache_hit', 'spatie.permission.cache', NULL),
(229, 1706768840, 'cache_hit', 'spatie.permission.cache', NULL),
(230, 1706768888, 'cache_hit', 'spatie.permission.cache', NULL),
(231, 1706768919, 'cache_hit', 'spatie.permission.cache', NULL),
(232, 1706768952, 'cache_hit', 'spatie.permission.cache', NULL),
(233, 1706769206, 'cache_hit', 'spatie.permission.cache', NULL),
(234, 1706769249, 'cache_hit', 'spatie.permission.cache', NULL),
(235, 1706769257, 'cache_hit', 'spatie.permission.cache', NULL),
(236, 1706769440, 'cache_hit', 'spatie.permission.cache', NULL),
(237, 1706769471, 'cache_hit', 'spatie.permission.cache', NULL),
(238, 1706769480, 'cache_hit', 'spatie.permission.cache', NULL),
(239, 1706769566, 'cache_hit', 'spatie.permission.cache', NULL),
(240, 1706769572, 'cache_hit', 'spatie.permission.cache', NULL),
(241, 1706769576, 'cache_hit', 'spatie.permission.cache', NULL),
(242, 1706769745, 'cache_hit', 'spatie.permission.cache', NULL),
(243, 1706769767, 'cache_hit', 'spatie.permission.cache', NULL),
(244, 1706769865, 'cache_hit', 'spatie.permission.cache', NULL),
(245, 1706769888, 'cache_hit', 'spatie.permission.cache', NULL),
(246, 1706769910, 'cache_hit', 'spatie.permission.cache', NULL),
(247, 1706769914, 'cache_hit', 'spatie.permission.cache', NULL),
(248, 1706770067, 'cache_hit', 'spatie.permission.cache', NULL),
(249, 1706770074, 'cache_hit', 'spatie.permission.cache', NULL),
(250, 1706770163, 'cache_hit', 'spatie.permission.cache', NULL),
(251, 1706770316, 'cache_hit', 'spatie.permission.cache', NULL),
(252, 1706770680, 'cache_hit', 'spatie.permission.cache', NULL),
(253, 1706770725, 'cache_hit', 'spatie.permission.cache', NULL),
(254, 1706770737, 'cache_hit', 'spatie.permission.cache', NULL),
(255, 1706770757, 'cache_hit', 'spatie.permission.cache', NULL),
(256, 1706770788, 'cache_hit', 'spatie.permission.cache', NULL),
(257, 1706770840, 'cache_hit', 'spatie.permission.cache', NULL),
(258, 1706770883, 'cache_hit', 'spatie.permission.cache', NULL),
(259, 1706770898, 'cache_hit', 'spatie.permission.cache', NULL),
(260, 1706770924, 'cache_hit', 'spatie.permission.cache', NULL),
(261, 1706770959, 'cache_hit', 'spatie.permission.cache', NULL),
(262, 1706770988, 'cache_hit', 'spatie.permission.cache', NULL),
(263, 1706771014, 'cache_hit', 'spatie.permission.cache', NULL),
(264, 1706771038, 'cache_hit', 'spatie.permission.cache', NULL),
(265, 1706771262, 'cache_hit', 'spatie.permission.cache', NULL),
(266, 1706771356, 'cache_hit', 'spatie.permission.cache', NULL),
(267, 1706771373, 'cache_hit', 'spatie.permission.cache', NULL),
(268, 1706771408, 'cache_hit', 'spatie.permission.cache', NULL),
(269, 1706772133, 'cache_hit', 'spatie.permission.cache', NULL),
(270, 1706772154, 'cache_hit', 'spatie.permission.cache', NULL),
(271, 1706772190, 'cache_hit', 'spatie.permission.cache', NULL),
(272, 1706772210, 'cache_hit', 'spatie.permission.cache', NULL),
(273, 1706772238, 'cache_hit', 'spatie.permission.cache', NULL),
(274, 1706773240, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 1706773240),
(275, 1706773259, 'exception', '[\"Milon\\\\Barcode\\\\WrongCheckDigitException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 1706773259),
(276, 1706773268, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 1706773268),
(277, 1706773286, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:218\"]', 1706773286),
(278, 1706773377, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:221\"]', 1706773377),
(279, 1706773391, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 1706773391),
(280, 1706773405, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 1706773405),
(281, 1707019956, 'user_request', '1', NULL),
(282, 1707019965, 'cache_miss', 'spatie.permission.cache', NULL),
(283, 1707019969, 'cache_hit', 'spatie.permission.cache', NULL),
(284, 1707020269, 'cache_hit', 'spatie.permission.cache', NULL),
(285, 1707020346, 'cache_hit', 'spatie.permission.cache', NULL),
(286, 1707020386, 'cache_hit', 'spatie.permission.cache', NULL),
(287, 1707023048, 'cache_hit', 'spatie.permission.cache', NULL),
(288, 1707023169, 'cache_hit', 'spatie.permission.cache', NULL),
(289, 1707023242, 'cache_hit', 'spatie.permission.cache', NULL),
(290, 1707023597, 'cache_miss', 'spatie.permission.cache', NULL),
(291, 1707023615, 'cache_hit', 'spatie.permission.cache', NULL),
(292, 1707023654, 'cache_hit', 'spatie.permission.cache', NULL),
(293, 1707023720, 'cache_hit', 'spatie.permission.cache', NULL),
(294, 1707023762, 'cache_hit', 'spatie.permission.cache', NULL),
(295, 1707023795, 'cache_hit', 'spatie.permission.cache', NULL),
(296, 1707023872, 'cache_hit', 'spatie.permission.cache', NULL),
(297, 1707023879, 'cache_hit', 'spatie.permission.cache', NULL),
(298, 1707023889, 'cache_hit', 'spatie.permission.cache', NULL),
(299, 1707023976, 'cache_hit', 'spatie.permission.cache', NULL),
(300, 1707024503, 'cache_hit', 'spatie.permission.cache', NULL),
(301, 1707024513, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 1707024513),
(302, 1707024552, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 1707024552),
(303, 1707024596, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:223\"]', 1707024596),
(304, 1707024610, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 1707024610),
(305, 1707024660, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:224\"]', 1707024660),
(306, 1707024764, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\ProductController.php:226\"]', 1707024764),
(307, 1707024920, 'cache_hit', 'spatie.permission.cache', NULL),
(308, 1707025000, 'cache_hit', 'spatie.permission.cache', NULL),
(309, 1707025045, 'cache_hit', 'spatie.permission.cache', NULL),
(310, 1707025086, 'cache_hit', 'spatie.permission.cache', NULL),
(311, 1707025098, 'cache_hit', 'spatie.permission.cache', NULL),
(312, 1707025141, 'cache_hit', 'spatie.permission.cache', NULL),
(313, 1707025363, 'cache_hit', 'spatie.permission.cache', NULL),
(314, 1707025402, 'cache_hit', 'spatie.permission.cache', NULL),
(315, 1707025450, 'cache_hit', 'spatie.permission.cache', NULL),
(316, 1707025541, 'cache_hit', 'spatie.permission.cache', NULL),
(317, 1707025574, 'cache_hit', 'spatie.permission.cache', NULL),
(318, 1707025612, 'cache_hit', 'spatie.permission.cache', NULL),
(319, 1707025723, 'cache_hit', 'spatie.permission.cache', NULL),
(320, 1707026762, 'cache_hit', 'spatie.permission.cache', NULL),
(321, 1707026865, 'cache_hit', 'spatie.permission.cache', NULL),
(322, 1707026936, 'cache_hit', 'spatie.permission.cache', NULL),
(323, 1707027013, 'cache_hit', 'spatie.permission.cache', NULL),
(324, 1707027015, 'cache_hit', 'spatie.permission.cache', NULL),
(325, 1707027053, 'cache_hit', 'spatie.permission.cache', NULL),
(326, 1707027066, 'cache_hit', 'spatie.permission.cache', NULL),
(327, 1707027121, 'cache_hit', 'spatie.permission.cache', NULL),
(328, 1707027194, 'cache_hit', 'spatie.permission.cache', NULL),
(329, 1707027241, 'cache_miss', 'spatie.permission.cache', NULL),
(330, 1707027286, 'cache_hit', 'spatie.permission.cache', NULL),
(331, 1707027379, 'cache_hit', 'spatie.permission.cache', NULL),
(332, 1707027403, 'cache_hit', 'spatie.permission.cache', NULL),
(333, 1707027510, 'cache_hit', 'spatie.permission.cache', NULL),
(334, 1707027571, 'cache_hit', 'spatie.permission.cache', NULL),
(335, 1707027602, 'cache_hit', 'spatie.permission.cache', NULL),
(336, 1707027762, 'cache_hit', 'spatie.permission.cache', NULL),
(337, 1707027786, 'cache_hit', 'spatie.permission.cache', NULL),
(338, 1707027823, 'cache_hit', 'spatie.permission.cache', NULL),
(339, 1707027837, 'cache_hit', 'spatie.permission.cache', NULL),
(340, 1707027846, 'cache_hit', 'spatie.permission.cache', NULL),
(341, 1707027863, 'cache_hit', 'spatie.permission.cache', NULL),
(342, 1707027961, 'cache_hit', 'spatie.permission.cache', NULL),
(343, 1707027993, 'cache_hit', 'spatie.permission.cache', NULL),
(344, 1707028035, 'cache_hit', 'spatie.permission.cache', NULL),
(345, 1707028103, 'cache_hit', 'spatie.permission.cache', NULL),
(346, 1707028210, 'cache_hit', 'spatie.permission.cache', NULL),
(347, 1707028277, 'cache_hit', 'spatie.permission.cache', NULL),
(348, 1707028381, 'cache_hit', 'spatie.permission.cache', NULL),
(349, 1707028675, 'cache_hit', 'spatie.permission.cache', NULL),
(350, 1707028679, 'cache_hit', 'spatie.permission.cache', NULL),
(351, 1707028681, 'cache_hit', 'spatie.permission.cache', NULL),
(352, 1707028681, 'cache_hit', 'spatie.permission.cache', NULL),
(353, 1707028683, 'cache_hit', 'spatie.permission.cache', NULL),
(354, 1707030019, 'cache_hit', 'spatie.permission.cache', NULL),
(355, 1707030039, 'cache_hit', 'spatie.permission.cache', NULL),
(356, 1707030742, 'cache_hit', 'spatie.permission.cache', NULL),
(357, 1707031970, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:125\"]', 1707031970),
(358, 1707031996, 'exception', '[\"Symfony\\\\Component\\\\Console\\\\Exception\\\\RuntimeException\",\"vendor\\\\symfony\\\\console\\\\Input\\\\ArgvInput.php:238\"]', 1707031996),
(359, 1707032708, 'slow_request', '[\"GET\",\"\\/admin\\/role\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Role\\\\RoleAndPermissionController@index\"]', 7875),
(360, 1707032709, 'slow_query', '[\"select * from `admins` where `id` = ? limit 1\",\"app\\\\Http\\\\Middleware\\\\Admin\\\\AdminLoginmiddleware.php:19\"]', 7047),
(361, 1707032716, 'cache_miss', 'spatie.permission.cache', NULL),
(362, 1707032717, 'cache_hit', 'spatie.permission.cache', NULL),
(363, 1707032728, 'cache_hit', 'spatie.permission.cache', NULL),
(364, 1707032730, 'cache_hit', 'spatie.permission.cache', NULL),
(365, 1707032730, 'cache_hit', 'spatie.permission.cache', NULL),
(366, 1707032732, 'cache_hit', 'spatie.permission.cache', NULL),
(367, 1707033236, 'cache_hit', 'spatie.permission.cache', NULL),
(368, 1707033360, 'cache_hit', 'spatie.permission.cache', NULL),
(369, 1707033448, 'cache_hit', 'spatie.permission.cache', NULL),
(370, 1707033453, 'cache_hit', 'spatie.permission.cache', NULL),
(371, 1707033453, 'cache_hit', 'spatie.permission.cache', NULL),
(372, 1707033455, 'cache_hit', 'spatie.permission.cache', NULL),
(373, 1707033456, 'cache_hit', 'spatie.permission.cache', NULL),
(374, 1707033457, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 2669),
(375, 1707033458, 'cache_hit', 'spatie.permission.cache', NULL),
(376, 1707033460, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 2202),
(377, 1707033460, 'cache_hit', 'spatie.permission.cache', NULL),
(378, 1707033468, 'cache_hit', 'spatie.permission.cache', NULL),
(379, 1707033488, 'cache_hit', 'spatie.permission.cache', NULL),
(380, 1707037240, 'cache_miss', 'spatie.permission.cache', NULL),
(381, 1707037352, 'cache_hit', 'spatie.permission.cache', NULL),
(382, 1707037357, 'cache_hit', 'spatie.permission.cache', NULL),
(383, 1707039348, 'cache_hit', 'spatie.permission.cache', NULL),
(384, 1707039375, 'cache_hit', 'spatie.permission.cache', NULL),
(385, 1707039385, 'cache_hit', 'spatie.permission.cache', NULL),
(386, 1707039386, 'cache_miss', 'spatie.permission.cache', NULL),
(387, 1707039405, 'cache_miss', 'spatie.permission.cache', NULL),
(388, 1707039414, 'cache_hit', 'spatie.permission.cache', NULL),
(389, 1707039416, 'cache_hit', 'spatie.permission.cache', NULL),
(390, 1707039423, 'cache_hit', 'spatie.permission.cache', NULL),
(391, 1707039531, 'cache_hit', 'spatie.permission.cache', NULL),
(392, 1707039533, 'cache_hit', 'spatie.permission.cache', NULL),
(393, 1707040215, 'cache_miss', 'spatie.permission.cache', NULL),
(394, 1707040229, 'cache_hit', 'spatie.permission.cache', NULL),
(395, 1707040255, 'cache_hit', 'spatie.permission.cache', NULL),
(396, 1707040344, 'cache_hit', 'spatie.permission.cache', NULL),
(397, 1707040362, 'cache_hit', 'spatie.permission.cache', NULL),
(398, 1707040406, 'cache_hit', 'spatie.permission.cache', NULL),
(399, 1707040411, 'cache_hit', 'spatie.permission.cache', NULL),
(400, 1707041503, 'cache_hit', 'spatie.permission.cache', NULL),
(401, 1707041503, 'cache_miss', 'spatie.permission.cache', NULL),
(402, 1707041503, 'cache_miss', 'spatie.permission.cache', NULL),
(403, 1707041503, 'cache_miss', 'spatie.permission.cache', NULL),
(404, 1707041618, 'cache_miss', 'spatie.permission.cache', NULL),
(405, 1707041620, 'cache_hit', 'spatie.permission.cache', NULL),
(406, 1707041623, 'cache_hit', 'spatie.permission.cache', NULL),
(407, 1707044370, 'cache_hit', 'spatie.permission.cache', NULL),
(408, 1707125329, 'cache_miss', 'spatie.permission.cache', NULL),
(409, 1707125375, 'cache_hit', 'spatie.permission.cache', NULL),
(410, 1707125375, 'cache_hit', 'spatie.permission.cache', NULL),
(411, 1707125380, 'cache_hit', 'spatie.permission.cache', NULL),
(412, 1707125392, 'cache_hit', 'spatie.permission.cache', NULL),
(413, 1707125498, 'cache_hit', 'spatie.permission.cache', NULL),
(414, 1707125512, 'cache_hit', 'spatie.permission.cache', NULL),
(415, 1707125515, 'cache_hit', 'spatie.permission.cache', NULL),
(416, 1707125521, 'cache_hit', 'spatie.permission.cache', NULL),
(417, 1707125547, 'cache_hit', 'spatie.permission.cache', NULL),
(418, 1707125577, 'cache_hit', 'spatie.permission.cache', NULL),
(419, 1707125619, 'cache_hit', 'spatie.permission.cache', NULL),
(420, 1707125631, 'cache_hit', 'spatie.permission.cache', NULL),
(421, 1707125631, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\index.blade.php:146\"]', 1707125631),
(422, 1707125783, 'cache_hit', 'spatie.permission.cache', NULL),
(423, 1707275268, 'cache_miss', 'spatie.permission.cache', NULL),
(424, 1707275444, 'cache_hit', 'spatie.permission.cache', NULL),
(425, 1707275444, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:184\"]', 1707275444),
(426, 1707275623, 'cache_hit', 'spatie.permission.cache', NULL),
(427, 1707275666, 'cache_hit', 'spatie.permission.cache', NULL),
(428, 1707275678, 'cache_hit', 'spatie.permission.cache', NULL),
(429, 1707275701, 'cache_hit', 'spatie.permission.cache', NULL),
(430, 1707275750, 'cache_hit', 'spatie.permission.cache', NULL),
(431, 1707275764, 'cache_hit', 'spatie.permission.cache', NULL),
(432, 1707275944, 'cache_hit', 'spatie.permission.cache', NULL),
(433, 1707276143, 'cache_hit', 'spatie.permission.cache', NULL),
(434, 1707276158, 'cache_hit', 'spatie.permission.cache', NULL),
(435, 1707276288, 'cache_hit', 'spatie.permission.cache', NULL),
(436, 1707276396, 'cache_hit', 'spatie.permission.cache', NULL),
(437, 1707276409, 'cache_hit', 'spatie.permission.cache', NULL),
(438, 1707276417, 'cache_hit', 'spatie.permission.cache', NULL),
(439, 1707276468, 'cache_hit', 'spatie.permission.cache', NULL),
(440, 1707276488, 'cache_hit', 'spatie.permission.cache', NULL),
(441, 1707276512, 'cache_hit', 'spatie.permission.cache', NULL),
(442, 1707276558, 'cache_hit', 'spatie.permission.cache', NULL),
(443, 1707276588, 'cache_hit', 'spatie.permission.cache', NULL),
(444, 1707276600, 'cache_hit', 'spatie.permission.cache', NULL),
(445, 1707276616, 'cache_hit', 'spatie.permission.cache', NULL),
(446, 1707276625, 'cache_hit', 'spatie.permission.cache', NULL),
(447, 1707276628, 'cache_hit', 'spatie.permission.cache', NULL),
(448, 1707276628, 'cache_hit', 'spatie.permission.cache', NULL),
(449, 1707276631, 'cache_hit', 'spatie.permission.cache', NULL),
(450, 1707276761, 'cache_hit', 'spatie.permission.cache', NULL),
(451, 1707276761, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\create.blade.php:274\"]', 1707276761),
(452, 1707276831, 'cache_hit', 'spatie.permission.cache', NULL),
(453, 1707276888, 'cache_hit', 'spatie.permission.cache', NULL),
(454, 1707277329, 'cache_hit', 'spatie.permission.cache', NULL),
(455, 1707277334, 'cache_hit', 'spatie.permission.cache', NULL),
(456, 1707277334, 'cache_hit', 'spatie.permission.cache', NULL),
(457, 1707277336, 'cache_hit', 'spatie.permission.cache', NULL),
(458, 1707277455, 'cache_hit', 'spatie.permission.cache', NULL),
(459, 1707277555, 'cache_hit', 'spatie.permission.cache', NULL),
(460, 1707277586, 'cache_hit', 'spatie.permission.cache', NULL),
(461, 1707277628, 'cache_hit', 'spatie.permission.cache', NULL),
(462, 1707277826, 'cache_hit', 'spatie.permission.cache', NULL),
(463, 1707277854, 'cache_hit', 'spatie.permission.cache', NULL),
(464, 1707277881, 'cache_hit', 'spatie.permission.cache', NULL),
(465, 1707277906, 'cache_hit', 'spatie.permission.cache', NULL),
(466, 1707277935, 'cache_hit', 'spatie.permission.cache', NULL),
(467, 1707278308, 'cache_hit', 'spatie.permission.cache', NULL),
(468, 1707278355, 'cache_hit', 'spatie.permission.cache', NULL),
(469, 1707278414, 'cache_hit', 'spatie.permission.cache', NULL),
(470, 1707278423, 'cache_hit', 'spatie.permission.cache', NULL),
(471, 1707278469, 'cache_hit', 'spatie.permission.cache', NULL),
(472, 1707286809, 'cache_miss', 'spatie.permission.cache', NULL),
(473, 1707287074, 'cache_hit', 'spatie.permission.cache', NULL),
(474, 1707287264, 'cache_hit', 'spatie.permission.cache', NULL),
(475, 1707287267, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:84\"]', 1707287267),
(476, 1707287488, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 1707287488),
(477, 1707287523, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 1707287523),
(478, 1707287560, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 1707287560),
(479, 1707287600, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:90\"]', 1707287600),
(480, 1707288165, 'cache_hit', 'spatie.permission.cache', NULL),
(481, 1707288298, 'cache_hit', 'spatie.permission.cache', NULL),
(482, 1707288354, 'cache_hit', 'spatie.permission.cache', NULL),
(483, 1707288377, 'cache_hit', 'spatie.permission.cache', NULL),
(484, 1707288412, 'cache_hit', 'spatie.permission.cache', NULL),
(485, 1707288454, 'cache_hit', 'spatie.permission.cache', NULL),
(486, 1707288468, 'cache_hit', 'spatie.permission.cache', NULL),
(487, 1707288524, 'cache_hit', 'spatie.permission.cache', NULL),
(488, 1707288598, 'cache_hit', 'spatie.permission.cache', NULL),
(489, 1707288649, 'cache_hit', 'spatie.permission.cache', NULL),
(490, 1707288724, 'cache_hit', 'spatie.permission.cache', NULL),
(491, 1707288797, 'cache_hit', 'spatie.permission.cache', NULL),
(492, 1707288860, 'cache_hit', 'spatie.permission.cache', NULL),
(493, 1707288981, 'cache_hit', 'spatie.permission.cache', NULL),
(494, 1707289374, 'cache_hit', 'spatie.permission.cache', NULL),
(495, 1707289439, 'cache_hit', 'spatie.permission.cache', NULL),
(496, 1707289498, 'cache_hit', 'spatie.permission.cache', NULL),
(497, 1707289840, 'cache_hit', 'spatie.permission.cache', NULL),
(498, 1707289955, 'cache_hit', 'spatie.permission.cache', NULL),
(499, 1707290196, 'cache_hit', 'spatie.permission.cache', NULL),
(500, 1707290360, 'cache_hit', 'spatie.permission.cache', NULL),
(501, 1707290379, 'cache_hit', 'spatie.permission.cache', NULL),
(502, 1707290383, 'cache_hit', 'spatie.permission.cache', NULL),
(503, 1707290425, 'cache_miss', 'spatie.permission.cache', NULL),
(504, 1707290519, 'cache_hit', 'spatie.permission.cache', NULL),
(505, 1707290527, 'cache_hit', 'spatie.permission.cache', NULL),
(506, 1707291385, 'cache_hit', 'spatie.permission.cache', NULL),
(507, 1707291395, 'cache_hit', 'spatie.permission.cache', NULL),
(508, 1707291395, 'cache_hit', 'spatie.permission.cache', NULL),
(509, 1707291397, 'cache_hit', 'spatie.permission.cache', NULL),
(510, 1707291989, 'cache_hit', 'spatie.permission.cache', NULL),
(511, 1707292039, 'cache_hit', 'spatie.permission.cache', NULL),
(512, 1707292048, 'cache_hit', 'spatie.permission.cache', NULL),
(513, 1707292144, 'cache_hit', 'spatie.permission.cache', NULL),
(514, 1707298013, 'cache_miss', 'spatie.permission.cache', NULL),
(515, 1707298042, 'cache_hit', 'spatie.permission.cache', NULL),
(516, 1707298043, 'cache_hit', 'spatie.permission.cache', NULL),
(517, 1707298044, 'cache_hit', 'spatie.permission.cache', NULL),
(518, 1707298054, 'cache_hit', 'spatie.permission.cache', NULL),
(519, 1707298104, 'cache_hit', 'spatie.permission.cache', NULL),
(520, 1707298154, 'cache_hit', 'spatie.permission.cache', NULL),
(521, 1707298154, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:55\"]', 1707298154),
(522, 1707298239, 'cache_hit', 'spatie.permission.cache', NULL),
(523, 1707299314, 'cache_hit', 'spatie.permission.cache', NULL),
(524, 1707299315, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 1707299315),
(525, 1707299387, 'cache_hit', 'spatie.permission.cache', NULL),
(526, 1707299387, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 1707299387),
(527, 1707299409, 'cache_hit', 'spatie.permission.cache', NULL),
(528, 1707299409, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 1707299409),
(529, 1707299471, 'cache_hit', 'spatie.permission.cache', NULL),
(530, 1707299471, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 1707299471),
(531, 1707299483, 'cache_hit', 'spatie.permission.cache', NULL),
(532, 1707299483, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 1707299483),
(533, 1707299494, 'cache_hit', 'spatie.permission.cache', NULL),
(534, 1707299494, 'exception', '[\"ErrorException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:50\"]', 1707299494),
(535, 1707299550, 'cache_hit', 'spatie.permission.cache', NULL),
(536, 1707299550, 'exception', '[\"Error\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:49\"]', 1707299550),
(537, 1707299576, 'cache_hit', 'spatie.permission.cache', NULL),
(538, 1707300360, 'cache_hit', 'spatie.permission.cache', NULL),
(539, 1707300383, 'cache_hit', 'spatie.permission.cache', NULL),
(540, 1707300452, 'cache_hit', 'spatie.permission.cache', NULL),
(541, 1707300597, 'cache_hit', 'spatie.permission.cache', NULL),
(542, 1707300626, 'cache_hit', 'spatie.permission.cache', NULL),
(543, 1707300927, 'cache_hit', 'spatie.permission.cache', NULL),
(544, 1707300946, 'cache_hit', 'spatie.permission.cache', NULL),
(545, 1707300973, 'cache_hit', 'spatie.permission.cache', NULL),
(546, 1707300991, 'cache_hit', 'spatie.permission.cache', NULL),
(547, 1707301115, 'cache_hit', 'spatie.permission.cache', NULL),
(548, 1707301126, 'cache_hit', 'spatie.permission.cache', NULL),
(549, 1707301154, 'cache_hit', 'spatie.permission.cache', NULL),
(550, 1707301241, 'cache_hit', 'spatie.permission.cache', NULL),
(551, 1707301261, 'cache_hit', 'spatie.permission.cache', NULL),
(552, 1707301698, 'cache_miss', 'spatie.permission.cache', NULL),
(553, 1707301703, 'cache_hit', 'spatie.permission.cache', NULL),
(554, 1707301703, 'cache_hit', 'spatie.permission.cache', NULL),
(555, 1707301705, 'cache_hit', 'spatie.permission.cache', NULL),
(556, 1707302272, 'cache_hit', 'spatie.permission.cache', NULL),
(557, 1707302275, 'cache_hit', 'spatie.permission.cache', NULL),
(558, 1707302288, 'cache_hit', 'spatie.permission.cache', NULL),
(559, 1707302317, 'cache_hit', 'spatie.permission.cache', NULL),
(560, 1707302319, 'cache_hit', 'spatie.permission.cache', NULL),
(561, 1707302550, 'cache_hit', 'spatie.permission.cache', NULL),
(562, 1707302554, 'cache_hit', 'spatie.permission.cache', NULL),
(563, 1707302556, 'cache_hit', 'spatie.permission.cache', NULL),
(564, 1707302615, 'cache_hit', 'spatie.permission.cache', NULL),
(565, 1707302617, 'cache_hit', 'spatie.permission.cache', NULL),
(566, 1707302619, 'cache_hit', 'spatie.permission.cache', NULL),
(567, 1707302621, 'cache_hit', 'spatie.permission.cache', NULL),
(568, 1707302636, 'cache_hit', 'spatie.permission.cache', NULL),
(569, 1707302636, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 1707302636),
(570, 1707302650, 'cache_hit', 'spatie.permission.cache', NULL),
(571, 1707302652, 'cache_hit', 'spatie.permission.cache', NULL),
(572, 1707302720, 'cache_hit', 'spatie.permission.cache', NULL),
(573, 1707302723, 'cache_hit', 'spatie.permission.cache', NULL),
(574, 1707302727, 'cache_hit', 'spatie.permission.cache', NULL),
(575, 1707302850, 'cache_hit', 'spatie.permission.cache', NULL),
(576, 1707302870, 'cache_hit', 'spatie.permission.cache', NULL),
(577, 1707302872, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 1707302872),
(578, 1707302957, 'cache_hit', 'spatie.permission.cache', NULL),
(579, 1707302957, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 1707302957),
(580, 1707302987, 'cache_hit', 'spatie.permission.cache', NULL),
(581, 1707302995, 'cache_hit', 'spatie.permission.cache', NULL),
(582, 1707302999, 'cache_hit', 'spatie.permission.cache', NULL),
(583, 1707303001, 'cache_hit', 'spatie.permission.cache', NULL),
(584, 1707303004, 'cache_hit', 'spatie.permission.cache', NULL),
(585, 1707303042, 'cache_hit', 'spatie.permission.cache', NULL),
(586, 1707303046, 'cache_hit', 'spatie.permission.cache', NULL),
(587, 1707303101, 'cache_miss', 'spatie.permission.cache', NULL),
(588, 1707303103, 'cache_hit', 'spatie.permission.cache', NULL),
(589, 1707303106, 'cache_hit', 'spatie.permission.cache', NULL),
(590, 1707303135, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 1707303135),
(591, 1707303153, 'cache_hit', 'spatie.permission.cache', NULL),
(592, 1707303162, 'cache_hit', 'spatie.permission.cache', NULL),
(593, 1707303164, 'cache_hit', 'spatie.permission.cache', NULL),
(594, 1707303167, 'cache_hit', 'spatie.permission.cache', NULL),
(595, 1707303172, 'cache_hit', 'spatie.permission.cache', NULL),
(596, 1707304180, 'cache_hit', 'spatie.permission.cache', NULL),
(597, 1707304180, 'exception', '[\"Symfony\\\\Component\\\\Routing\\\\Exception\\\\RouteNotFoundException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Routing\\\\UrlGenerator.php:479\"]', 1707304180),
(598, 1707304227, 'cache_hit', 'spatie.permission.cache', NULL),
(599, 1707304235, 'cache_hit', 'spatie.permission.cache', NULL),
(600, 1707304238, 'cache_hit', 'spatie.permission.cache', NULL),
(601, 1707304240, 'cache_hit', 'spatie.permission.cache', NULL),
(602, 1707360818, 'cache_miss', 'spatie.permission.cache', NULL),
(603, 1707360827, 'cache_hit', 'spatie.permission.cache', NULL),
(604, 1707360830, 'cache_hit', 'spatie.permission.cache', NULL),
(605, 1707360837, 'cache_hit', 'spatie.permission.cache', NULL),
(606, 1707360841, 'cache_hit', 'spatie.permission.cache', NULL),
(607, 1707360885, 'cache_hit', 'spatie.permission.cache', NULL),
(608, 1707361864, 'cache_hit', 'spatie.permission.cache', NULL),
(609, 1707363410, 'cache_hit', 'spatie.permission.cache', NULL),
(610, 1707363412, 'cache_hit', 'spatie.permission.cache', NULL),
(611, 1707363412, 'cache_hit', 'spatie.permission.cache', NULL),
(612, 1707363649, 'cache_hit', 'spatie.permission.cache', NULL),
(613, 1707363659, 'cache_hit', 'spatie.permission.cache', NULL),
(614, 1707363673, 'cache_hit', 'spatie.permission.cache', NULL),
(615, 1707363673, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:58\"]', 1707363673),
(616, 1707363688, 'cache_hit', 'spatie.permission.cache', NULL),
(617, 1707363688, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Requests\\\\Admin\\\\Product\\\\AdjustmentStoreRequest.php:58\"]', 1707363688),
(618, 1707363761, 'cache_hit', 'spatie.permission.cache', NULL),
(619, 1707363925, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 1707363925),
(620, 1707363963, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:213\"]', 1707363963),
(621, 1707364190, 'cache_hit', 'spatie.permission.cache', NULL),
(622, 1707364509, 'cache_miss', 'spatie.permission.cache', NULL),
(623, 1707364511, 'cache_hit', 'spatie.permission.cache', NULL),
(624, 1707364511, 'cache_hit', 'spatie.permission.cache', NULL),
(625, 1707364716, 'cache_hit', 'spatie.permission.cache', NULL),
(626, 1707364725, 'cache_hit', 'spatie.permission.cache', NULL),
(627, 1707364735, 'cache_hit', 'spatie.permission.cache', NULL),
(628, 1707369027, 'exception', '[\"ErrorException\",\"resources\\\\views\\\\backend\\\\blade\\\\product\\\\adjustment\\\\index.blade.php:216\"]', 1707369027),
(629, 1707372358, 'cache_miss', 'spatie.permission.cache', NULL),
(630, 1707372359, 'cache_hit', 'spatie.permission.cache', NULL),
(631, 1707373136, 'cache_hit', 'spatie.permission.cache', NULL),
(632, 1707373136, 'cache_hit', 'spatie.permission.cache', NULL),
(633, 1707374188, 'exception', '[\"TypeError\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:27\"]', 1707374188),
(634, 1707374206, 'exception', '[\"TypeError\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:27\"]', 1707374206),
(635, 1707374566, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 1707374566),
(636, 1707374597, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:29\"]', 1707374597),
(637, 1707374635, 'exception', '[\"Carbon\\\\Exceptions\\\\InvalidFormatException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:28\"]', 1707374635),
(638, 1707378578, 'exception', '[\"Illuminate\\\\Database\\\\QueryException\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Product\\\\AdjustmentController.php:139\"]', 1707378578),
(639, 1707383306, 'cache_miss', 'spatie.permission.cache', NULL),
(640, 1707383306, 'cache_hit', 'spatie.permission.cache', NULL),
(641, 1707385854, 'cache_hit', 'spatie.permission.cache', NULL),
(642, 1707385856, 'cache_hit', 'spatie.permission.cache', NULL),
(643, 1707385858, 'cache_hit', 'spatie.permission.cache', NULL),
(644, 1707387028, 'cache_miss', 'spatie.permission.cache', NULL),
(645, 1707387864, 'cache_hit', 'spatie.permission.cache', NULL),
(646, 1707389991, 'cache_hit', 'spatie.permission.cache', NULL),
(660, 1707889420, 'cache_miss', 'spatie.permission.cache', NULL),
(661, 1707889429, 'cache_hit', 'spatie.permission.cache', NULL),
(662, 1707889452, 'cache_hit', 'spatie.permission.cache', NULL),
(663, 1707889454, 'cache_hit', 'spatie.permission.cache', NULL),
(664, 1707889629, 'cache_hit', 'spatie.permission.cache', NULL),
(665, 1707889633, 'cache_hit', 'spatie.permission.cache', NULL),
(666, 1707889636, 'cache_hit', 'spatie.permission.cache', NULL),
(667, 1708338467, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 1670),
(668, 1713669703, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 2453),
(669, 1713669714, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 1059),
(670, 1713669745, 'cache_miss', 'spatie.permission.cache', NULL),
(671, 1713672608, 'cache_hit', 'spatie.permission.cache', NULL),
(672, 1713683619, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 1713683619),
(673, 1713693697, 'exception', '[\"ErrorException\",\"routes\\\\web.php:41\"]', 1713693697),
(674, 1713694431, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 1713694431),
(675, 1713695178, 'exception', '[\"ErrorException\",\"routes\\\\web.php:48\"]', 1713695178),
(676, 1719238149, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 1708),
(677, 1719238166, 'slow_request', '[\"POST\",\"\\/admin\\/login\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@handleLogin\"]', 1060),
(678, 1719238175, 'cache_miss', 'spatie.permission.cache', NULL),
(679, 1719238208, 'cache_hit', 'spatie.permission.cache', NULL),
(680, 1719238218, 'cache_hit', 'spatie.permission.cache', NULL),
(681, 1719238439, 'cache_hit', 'spatie.permission.cache', NULL),
(682, 1719238474, 'cache_hit', 'spatie.permission.cache', NULL),
(683, 1719238480, 'cache_hit', 'spatie.permission.cache', NULL),
(684, 1719238480, 'cache_miss', 'spatie.permission.cache', NULL),
(685, 1719238533, 'cache_miss', 'spatie.permission.cache', NULL),
(686, 1719238580, 'cache_hit', 'spatie.permission.cache', NULL),
(687, 1719238589, 'cache_hit', 'spatie.permission.cache', NULL),
(688, 1719238611, 'cache_hit', 'spatie.permission.cache', NULL),
(689, 1719238885, 'cache_hit', 'spatie.permission.cache', NULL),
(690, 1719238907, 'cache_hit', 'spatie.permission.cache', NULL),
(691, 1726979266, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 5295);
INSERT INTO `pulse_entries` (`id`, `timestamp`, `type`, `key`, `value`) VALUES
(692, 1726980302, 'cache_miss', 'spatie.permission.cache', NULL),
(693, 1726980305, 'cache_hit', 'spatie.permission.cache', NULL),
(694, 1726980309, 'cache_hit', 'spatie.permission.cache', NULL),
(695, 1726980317, 'cache_hit', 'spatie.permission.cache', NULL),
(696, 1726980320, 'cache_hit', 'spatie.permission.cache', NULL),
(697, 1726980339, 'cache_hit', 'spatie.permission.cache', NULL),
(698, 1726981646, 'slow_request', '[\"GET\",\"\\/admin\\/dashboard\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@index\"]', 2185),
(699, 1726981814, 'cache_hit', 'spatie.permission.cache', NULL),
(700, 1726981842, 'cache_hit', 'spatie.permission.cache', NULL),
(701, 1726981848, 'cache_hit', 'spatie.permission.cache', NULL),
(702, 1726981852, 'cache_hit', 'spatie.permission.cache', NULL),
(703, 1726981856, 'cache_hit', 'spatie.permission.cache', NULL),
(704, 1726981871, 'cache_hit', 'spatie.permission.cache', NULL),
(705, 1726981874, 'cache_hit', 'spatie.permission.cache', NULL),
(706, 1726981887, 'cache_hit', 'spatie.permission.cache', NULL),
(707, 1726981889, 'cache_hit', 'spatie.permission.cache', NULL),
(708, 1726981895, 'cache_hit', 'spatie.permission.cache', NULL),
(709, 1726981903, 'cache_hit', 'spatie.permission.cache', NULL),
(710, 1726981929, 'cache_hit', 'spatie.permission.cache', NULL),
(711, 1726981940, 'cache_hit', 'spatie.permission.cache', NULL),
(712, 1726981966, 'cache_hit', 'spatie.permission.cache', NULL),
(713, 1726981991, 'cache_hit', 'spatie.permission.cache', NULL),
(714, 1726982493, 'cache_hit', 'spatie.permission.cache', NULL),
(715, 1726982496, 'exception', '[\"InvalidArgumentException\",\"app\\\\Http\\\\Controllers\\\\FrontendControllers\\\\HomeController.php:15\"]', 1726982496),
(716, 1726982512, 'exception', '[\"InvalidArgumentException\",\"vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\View\\\\FileViewFinder.php:137\"]', 1726982512),
(717, 1726982798, 'cache_hit', 'spatie.permission.cache', NULL),
(718, 1726982803, 'cache_hit', 'spatie.permission.cache', NULL),
(719, 1726982806, 'cache_hit', 'spatie.permission.cache', NULL),
(720, 1726982807, 'cache_hit', 'spatie.permission.cache', NULL),
(721, 1726982809, 'cache_hit', 'spatie.permission.cache', NULL),
(722, 1726982824, 'cache_hit', 'spatie.permission.cache', NULL),
(723, 1726982856, 'cache_hit', 'spatie.permission.cache', NULL),
(724, 1726982862, 'cache_hit', 'spatie.permission.cache', NULL),
(725, 1726982865, 'cache_hit', 'spatie.permission.cache', NULL),
(726, 1726982880, 'cache_hit', 'spatie.permission.cache', NULL),
(727, 1726982882, 'cache_hit', 'spatie.permission.cache', NULL),
(728, 1726982883, 'cache_hit', 'spatie.permission.cache', NULL),
(729, 1726982886, 'cache_hit', 'spatie.permission.cache', NULL),
(730, 1726982889, 'cache_hit', 'spatie.permission.cache', NULL),
(731, 1726982895, 'cache_hit', 'spatie.permission.cache', NULL),
(732, 1726982897, 'cache_hit', 'spatie.permission.cache', NULL),
(733, 1726982903, 'cache_hit', 'spatie.permission.cache', NULL),
(734, 1726982979, 'cache_hit', 'spatie.permission.cache', NULL),
(735, 1726982981, 'cache_hit', 'spatie.permission.cache', NULL),
(736, 1726982982, 'cache_hit', 'spatie.permission.cache', NULL),
(737, 1726982987, 'cache_hit', 'spatie.permission.cache', NULL),
(738, 1726982989, 'cache_hit', 'spatie.permission.cache', NULL),
(739, 1726982991, 'cache_hit', 'spatie.permission.cache', NULL),
(740, 1726984885, 'cache_miss', 'spatie.permission.cache', NULL),
(741, 1726984888, 'cache_miss', 'spatie.permission.cache', NULL),
(742, 1726985012, 'slow_request', '[\"GET\",\"\\/admin\\/admin-profile\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Auth\\\\AdminLoginController@adminProfile\"]', 2360),
(743, 1730692730, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 1455),
(744, 1730692756, 'cache_miss', 'spatie.permission.cache', NULL),
(745, 1730692761, 'cache_hit', 'spatie.permission.cache', NULL),
(746, 1730692764, 'cache_hit', 'spatie.permission.cache', NULL),
(747, 1730693065, 'cache_hit', 'spatie.permission.cache', NULL),
(748, 1730718447, 'cache_miss', 'spatie.permission.cache', NULL),
(749, 1730718449, 'cache_hit', 'spatie.permission.cache', NULL),
(750, 1730718451, 'cache_hit', 'spatie.permission.cache', NULL),
(751, 1730718456, 'slow_request', '[\"POST\",\"\\/admin\\/backend\\/language\\/store\\/translate\\/string\",\"App\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController@storeTranslateString\"]', 2959),
(752, 1730718456, 'cache_hit', 'spatie.permission.cache', NULL),
(753, 1730718458, 'slow_outgoing_request', '[\"POST\",\"https:\\/\\/microsoft-translator-text.p.rapidapi.com\\/translate?to%5B0%5D=bn&api-version=3.0&profanityAction=NoAction&textType=plain\"]', 2097),
(754, 1730718458, 'exception', '[\"Error\",\"app\\\\Http\\\\Controllers\\\\Admin\\\\Localization\\\\BackendLanguageController.php:146\"]', 1730718458),
(755, 1730718463, 'cache_hit', 'spatie.permission.cache', NULL),
(756, 1747453923, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 1625),
(757, 1747454003, 'cache_miss', 'spatie.permission.cache', NULL),
(758, 1747455234, 'cache_hit', 'spatie.permission.cache', NULL),
(759, 1747455240, 'cache_hit', 'spatie.permission.cache', NULL),
(760, 1747538473, 'slow_request', '[\"GET\",\"\\/\",\"Closure\"]', 4509);

-- --------------------------------------------------------

--
-- Table structure for table `pulse_values`
--

CREATE TABLE `pulse_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `key` mediumtext NOT NULL,
  `key_hash` binary(16) GENERATED ALWAYS AS (unhex(md5(`key`))) VIRTUAL,
  `value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', '2023-12-27 21:23:43', '2023-12-27 21:23:43'),
(2, 'Admin', 'admin', '2023-12-28 04:26:30', '2023-12-28 04:26:30'),
(3, 'Test', 'admin', '2023-12-31 10:30:30', '2023-12-31 10:30:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_name_slug` varchar(255) DEFAULT NULL,
  `service_short_details` text NOT NULL,
  `service_details` text NOT NULL,
  `service_image` varchar(255) DEFAULT NULL,
  `service_icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `service_name_slug`, `service_short_details`, `service_details`, `service_image`, `service_icon`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Nikah Service', 'nikah-service', 'A Nikah service facilitates the Islamic marriage ceremony, known as Nikah, in accordance with Islamic laws.', '<p>asdasdas sad asd&nbsp; asd sad asdas asda dsa</p>', 'public/admin/file/services/service-images/service1758731384.jpg', 'public/admin/file/services/service-images/serviceIcon1758730344.png', 1, 0, NULL, NULL, '2025-09-24 16:12:26', '2025-09-24 16:37:10'),
(2, 'Nikah Service2', 'nikah-service2', 'A Nikah service facilitates the Islamic marriage ceremony, known as Nikah, in accordance with Islamic laws.', '<p>asdasdsa</p>', 'public/admin/file/services/service-images/service1761378556.jpg', 'public/admin/file/services/service-images/serviceIcon1761378558.jpg', 1, 0, NULL, NULL, '2025-10-25 07:49:18', '2025-10-25 07:49:18'),
(3, 'Nikah Service3', 'nikah-service3', 'A Nikah service facilitates the Islamic marriage ceremony, known as Nikah, in accordance with Islamic laws.', '<p>asdadasdsa</p>', 'public/admin/file/services/service-images/service1761378607.jpg', 'public/admin/file/services/service-images/serviceIcon1761378608.jpg', 1, 0, NULL, NULL, '2025-10-25 07:50:08', '2025-10-25 07:50:08'),
(4, 'Nikah Service4', 'nikah-service4', 'A Nikah service facilitates the Islamic marriage ceremony, known as Nikah, in accordance with Islamic laws.', '<p>sddfds</p>', 'public/admin/file/services/service-images/service1761378624.jpg', 'public/admin/file/services/service-images/serviceIcon1761378624.jpg', 1, 0, NULL, NULL, '2025-10-25 07:50:24', '2025-10-25 07:50:24'),
(5, 'Nikah Service5', 'nikah-service5', 'A Nikah service facilitates the Islamic marriage ceremony, known as Nikah, in accordance with Islamic laws.', '<p>A blog is a website or part of a website that publishes regularly updated content, like articles, photos, and videos, in reverse chronological order (newest first).&nbsp;These posts are often informal and conversational, focusing on a specific topic or personal interests.&nbsp;Key details include&nbsp;regular updates, interactive features like comment sections, and the use of the content for various purposes like sharing information, building a community, or marketing.&nbsp;&nbsp;</p>\r\n\r\n<p>Key characteristics of a blog</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Regularly updated:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs are defined by their frequent updates to keep content fresh and readers engaged.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Reverse chronological order:</strong>&nbsp;</p>\r\n\r\n	<p>New posts are displayed at the top of the page, with older posts appearing further down.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Interactive:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs allow for reader engagement through comments and social sharing, helping to build a community.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Conversational style:</strong>&nbsp;</p>\r\n\r\n	<p>Content is often written in a personal or informal tone.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Multimedia content:</strong>&nbsp;</p>\r\n\r\n	<p>While often text-based, blogs also frequently include images, videos, and audio.&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Purposes of a blog</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Personal expression:</strong>&nbsp;</p>\r\n\r\n	<p>A personal blog can act as an online journal for sharing personal stories, experiences, and opinions.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Business and marketing:</strong>&nbsp;</p>\r\n\r\n	<p>Businesses use blogs to share information, build authority, connect with customers, promote products or services, and improve SEO.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Information and authority:</strong>&nbsp;</p>\r\n\r\n	<p>They can be used to provide expert advice, news, and commentary on a specific topic, such as technology or fashion.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Community building:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs can serve as a central hub for a community to discuss a shared interest.&nbsp;</p>\r\n	</li>\r\n</ul>', 'public/admin/file/services/service-images/service1761378655.jpg', 'public/admin/file/services/service-images/serviceIcon1761378655.jpg', 1, 0, NULL, NULL, '2025-10-25 07:50:55', '2025-10-27 10:12:52');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8WMZS3uX1MJKxy28Kb7AV5klfhIVauDhwhIZf69F', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicjlkWFY3bG96QnlHM0NFUWFoN2ZuUVNxU1IyWVhPMzVCbERieHRESiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9yb2xlIjt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1706595222),
('jr5swHDyeBRESfJAP0KvRLdh4CL3DyUJEaY2NqRB', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNTVTUUZTWEU0U3g4Y1Fkb1ZFTmFycjJheWxNdWIwMGhZVjg1NHVsQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wdWxzZSI7fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1706596037);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `size_status` tinyint(1) NOT NULL DEFAULT 1,
  `size_create_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `size_status`, `size_create_by`, `created_at`, `updated_at`) VALUES
(19, '1 PC', 1, 1, '2024-01-21 10:02:46', '2024-01-21 10:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_member_name` varchar(100) DEFAULT NULL,
  `team_member_desig` varchar(100) DEFAULT NULL,
  `team_member_gender` varchar(20) DEFAULT NULL,
  `team_member_phone` varchar(50) DEFAULT NULL,
  `team_member_email` varchar(100) DEFAULT NULL,
  `team_member_image` varchar(255) DEFAULT NULL,
  `team_member_address` varchar(255) DEFAULT NULL,
  `team_member_about` text DEFAULT NULL,
  `team_member_expertise` text DEFAULT NULL,
  `team_member_exp_lavel` text DEFAULT NULL,
  `team_member_facebook` varchar(255) DEFAULT NULL,
  `team_member_instagram` varchar(255) DEFAULT NULL,
  `team_member_linkedin` varchar(255) DEFAULT NULL,
  `team_member_youtube` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_member_name`, `team_member_desig`, `team_member_gender`, `team_member_phone`, `team_member_email`, `team_member_image`, `team_member_address`, `team_member_about`, `team_member_expertise`, `team_member_exp_lavel`, `team_member_facebook`, `team_member_instagram`, `team_member_linkedin`, `team_member_youtube`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'SUMITB', 'CEO', 'Male', '01724698392', 'mutasimstore@gmail.com', 'public/admin/file/team/team-members/teamMember1761382907.jpg', 'ZORABARI,MIRZAGONJ,DOMAR,NILPHAMARI', '<p><strong>ddddddddddddddddddddddd</strong></p>', '[null,null]', '[null,null]', 'sdfsdfsd', 'sdfsdfsd', 'fsdfsdfsdfsd', 'yyyyyyy', 1, 0, NULL, NULL, '2025-09-26 14:39:46', '2025-10-25 09:01:47'),
(2, 'MD SUMIT', 'MD', 'Male', '01724698392', 'mutasimstore@gmail.com', 'public/admin/file/team/team-members/teamMember1761382844.jpeg', 'ZORABARI,MIRZAGONJ,DOMAR,NILPHAMARI', '<p>asdsadsadsad</p>', '[null]', '[null]', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2025-10-25 08:52:59', '2025-10-25 09:00:44'),
(3, 'MD MUTASIM NAIB SUMIT', 'Sr.Executive', 'Male', '01724698392', 'mutasimstore@gmail.com', 'public/admin/file/team/team-members/teamMember1761382863.jpg', 'ZORABARI,MIRZAGONJ,DOMAR,NILPHAMARI', '<p>asdasdasd</p>', '[null]', '[null]', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2025-10-25 08:53:42', '2025-10-25 09:01:04'),
(4, 'MD SUMIT E', 'Executive', 'Male', '01724698392', 'mutasimstore@gmail.com', 'public/admin/file/team/team-members/teamMember1761411484.jpeg', 'ZORABARI,MIRZAGONJ,DOMAR,NILPHAMARI', '<p>adasd</p>', '[null]', '[null]', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2025-10-25 16:58:06', '2025-10-25 16:58:06'),
(5, 'SUMIT DD', 'DD', 'Male', '01724698392', 'mutasimstore@gmail.com', 'public/admin/file/team/team-members/teamMember1761411594.jpg', 'ZORABARI,MIRZAGONJ,DOMAR,NILPHAMARI', '<p>asdfsad</p>', '[null]', '[null]', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, '2025-10-25 16:59:54', '2025-10-25 16:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `translationable_type` varchar(255) NOT NULL,
  `translationable_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `translationable_type`, `translationable_id`, `locale`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'company_name', 'BIPEBD', NULL, '2025-10-13 15:11:29'),
(2, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'points', 'BIPEBD is a leading IT solutions company driving digital transformation for businesses.||We provide software, web, mobile, cloud, and IT consultancy tailored to client needs.||With innovation and reliability, we help organizations grow smarter and faster.', NULL, '2025-10-13 15:11:29'),
(3, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'project_line', 'BIPEBD successfully delivers innovative IT projects that drive business growth and efficiency', NULL, '2025-10-13 15:11:29'),
(4, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'about_us_title', 'Empowering Businesses with Smart IT Solutions', NULL, '2025-10-13 15:11:29'),
(5, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'short_details', 'BIPEBD is a trusted IT solutions company helping businesses embrace digital transformation. We deliver software, web, mobile, cloud, and IT consultancy tailored to client needs. With innovation and reliability, BIPEBD empowers organizations to grow smarter and faster.', NULL, '2025-10-13 15:11:29'),
(6, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'details', '<p><strong>BIPEBD</strong> is a leading IT solutions company dedicated to helping businesses embrace digital transformation. We specialize in providing innovative software development, web solutions, mobile applications, cloud services, and IT consultancy tailored to meet the unique needs of our clients. With a focus on reliability, innovation, and customer success, BIPEBD empowers organizations to grow smarter and operate more efficiently in today&rsquo;s fast-paced digital world.</p>', NULL, '2025-10-13 15:11:29'),
(7, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'company_name', 'BIPEBD', NULL, '2025-10-13 15:11:29'),
(8, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'points', 'BIPEBD একটি শীর্ষস্থানীয় আইটি সলিউশন কোম্পানি, যা ব্যবসাকে ডিজিটাল রূপান্তরে সহায়তা করে।||আমরা সফটওয়্যার, ওয়েব, মোবাইল, ক্লাউড এবং আইটি পরামর্শ প্রদান করি গ্রাহকের প্রয়োজন অনুযায়ী।||উদ্ভাবন ও নির্ভরযোগ্যতার মাধ্যমে আমরা প্রতিষ্ঠানগুলোকে আরও স্মার্ট ও দ্রুত উন্নতিতে সহায়তা করি।', NULL, '2025-10-13 15:11:29'),
(9, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'project_line', 'BIPEBD সফলভাবে এমন সব আইটি প্রজেক্ট সম্পন্ন করে যা ব্যবসার উন্নতি ও দক্ষতা বাড়ায়।', NULL, '2025-10-13 15:11:29'),
(10, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'about_us_title', 'BIPEBD – স্মার্ট আইটি সলিউশনের মাধ্যমে ব্যবসাকে সক্ষম করে তোলা', NULL, '2025-10-13 15:11:29'),
(11, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'short_details', 'BIPEBD একটি বিশ্বস্ত আইটি সলিউশন কোম্পানি, যা ব্যবসাকে ডিজিটাল রূপান্তরে সহায়তা করে। আমরা সফটওয়্যার, ওয়েব, মোবাইল, ক্লাউড এবং আইটি পরামর্শ প্রদান করি গ্রাহকের চাহিদা অনুযায়ী। উদ্ভাবন ও নির্ভরযোগ্যতার মাধ্যমে BIPEBD প্রতিষ্ঠানগুলোকে স্মার্ট এবং দ্রুত উন্নতিতে সক্ষম করে।', NULL, '2025-10-13 15:11:29'),
(12, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'details', '<p><strong>BIPEBD</strong> একটি শীর্ষস্থানীয় আইটি সলিউশন কোম্পানি, যা ব্যবসাগুলোকে ডিজিটাল রূপান্তরে সহায়তা করতে প্রতিশ্রুতিবদ্ধ। আমরা উদ্ভাবনী সফটওয়্যার ডেভেলপমেন্ট, ওয়েব সলিউশন, মোবাইল অ্যাপ্লিকেশন, ক্লাউড সার্ভিস এবং আইটি পরামর্শ প্রদান করি, যা আমাদের ক্লায়েন্টদের প্রয়োজন অনুযায়ী তৈরি করা হয়। নির্ভরযোগ্যতা, উদ্ভাবন এবং গ্রাহক সাফল্যের উপর গুরুত্ব দিয়ে, <strong>BIPEBD</strong> প্রতিষ্ঠানগুলোকে আরও স্মার্টভাবে বেড়ে উঠতে এবং আজকের দ্রুত পরিবর্তনশীল ডিজিটাল যুগে আরও দক্ষভাবে কাজ করতে সক্ষম করে।</p>', NULL, '2025-10-13 15:11:29'),
(13, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'company_name', 'BIPEBD', NULL, '2025-10-13 15:11:29'),
(14, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'points', 'BIPEBD एक अग्रणी आईटी सॉल्यूशन कंपनी है, जो व्यवसायों को डिजिटल परिवर्तन अपनाने में मदद करती है।||हम सॉफ़्टवेयर, वेब, मोबाइल, क्लाउड और आईटी परामर्श सेवाएँ ग्राहकों की ज़रूरतों के अनुसार प्रदान करते हैं।||नवाचार और भरोसे के साथ हम संगठनों को अधिक स्मार्ट और तेज़ी से बढ़ने में सक्षम बनाते हैं।', NULL, '2025-10-13 15:11:29'),
(15, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'project_line', 'BIPEBD सफलतापूर्वक ऐसे आईटी प्रोजेक्ट प्रदान करता है जो व्यवसाय की वृद्धि और दक्षता को बढ़ाते हैं।', NULL, '2025-10-13 15:11:29'),
(16, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'about_us_title', 'BIPEBD – स्मार्ट आईटी सॉल्यूशन्स के साथ व्यवसायों को सशक्त बनाना', NULL, '2025-10-13 15:11:29'),
(17, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'short_details', 'BIPEBD एक विश्वसनीय आईटी सॉल्यूशन कंपनी है, जो व्यवसायों को डिजिटल परिवर्तन में मदद करती है। हम सॉफ़्टवेयर, वेब, मोबाइल, क्लाउड और आईटी परामर्श सेवाएँ ग्राहकों की आवश्यकताओं के अनुसार प्रदान करते हैं। नवाचार और भरोसे के साथ, BIPEBD संगठनों को अधिक स्मार्ट और तेज़ी से बढ़ने में सक्षम बनाता है।', NULL, '2025-10-13 15:11:29'),
(18, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'details', '<p><strong>BIPEBD</strong> एक अग्रणी आईटी सॉल्यूशन कंपनी है, जो व्यवसायों को डिजिटल परिवर्तन अपनाने में मदद करने के लिए समर्पित है। हम नवीनतम सॉफ़्टवेयर विकास, वेब समाधान, मोबाइल एप्लिकेशन, क्लाउड सेवाएँ और आईटी परामर्श प्रदान करते हैं, जो हमारे ग्राहकों की विशेष आवश्यकताओं के अनुसार बनाए जाते हैं। भरोसेमंद सेवाएँ, नवाचार और ग्राहक सफलता पर ध्यान केंद्रित करके, <strong>BIPEBD</strong> संगठनों को अधिक स्मार्ट तरीके से बढ़ने और आज की तेज़ रफ़्तार डिजिटल दुनिया में अधिक कुशलता से काम करने में सक्षम बनाता है।</p>', NULL, '2025-10-13 15:11:29'),
(19, 'App\\Models\\Admin\\Service', 1, 'en', 'service_name', 'Nikah Service', '2025-09-24 16:12:26', '2025-09-24 16:29:45'),
(20, 'App\\Models\\Admin\\Service', 1, 'en', 'service_short_details', 'A Nikah service facilitates the Islamic marriage ceremony, known as Nikah, in accordance with Islamic laws.', '2025-09-24 16:12:26', '2025-09-24 16:29:45'),
(21, 'App\\Models\\Admin\\Service', 1, 'en', 'service_details', '<p>asdasdas sad asd&nbsp; asd sad asdas asda dsa</p>', '2025-09-24 16:12:26', '2025-09-24 16:29:45'),
(22, 'App\\Models\\Admin\\Service', 1, 'bn', 'service_name', 'নিকাহ সেবা', '2025-09-24 16:12:26', '2025-09-24 16:29:45'),
(23, 'App\\Models\\Admin\\Service', 1, 'bn', 'service_short_details', 'একটি নিকাহ সেবা ইসলামী আইন অনুসারে ইসলামী বিবাহ অনুষ্ঠান, যা নিকাহ নামে পরিচিত, সহজতর করে।', '2025-09-24 16:12:26', '2025-09-24 16:29:45'),
(24, 'App\\Models\\Admin\\Service', 1, 'bn', 'service_details', '<p>&nbsp;adaasd asd asdassddas asda asasdas dasdasd asdasd</p>', '2025-09-24 16:12:26', '2025-09-24 16:29:45'),
(25, 'App\\Models\\Admin\\Service', 1, 'hi', 'service_name', 'asdasdasdasdas', '2025-09-24 16:12:26', '2025-09-24 16:29:45'),
(26, 'App\\Models\\Admin\\Service', 1, 'hi', 'service_short_details', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', '2025-09-24 16:12:26', '2025-09-24 16:29:46'),
(27, 'App\\Models\\Admin\\Service', 1, 'hi', 'service_details', '<p>asd asdfadddasdas dasd asdasda dadadasdasdasd</p>', '2025-09-24 16:12:26', '2025-09-24 16:29:46'),
(28, 'App\\Models\\Admin\\Team', 1, 'en', 'team_member_name', 'SUMITB', NULL, '2025-10-25 09:01:47'),
(29, 'App\\Models\\Admin\\Team', 1, 'en', 'team_member_about', '<p><strong>ddddddddddddddddddddddd</strong></p>', NULL, '2025-10-25 09:01:47'),
(30, 'App\\Models\\Admin\\Team', 1, 'en', 'team_member_desig', 'CEO', NULL, '2025-10-25 09:01:47'),
(31, 'App\\Models\\Admin\\Team', 1, 'bn', 'team_member_name', 'bbbbbbbbbbbbb', NULL, '2025-10-25 09:01:47'),
(32, 'App\\Models\\Admin\\Team', 1, 'bn', 'team_member_desig', 'bbbbbbbbbbbbbbbbbbbbbbbbbbb', NULL, '2025-10-25 09:01:47'),
(33, 'App\\Models\\Admin\\Team', 1, 'hi', 'team_member_name', 'hhhhhhhh', NULL, '2025-09-26 17:01:59'),
(34, 'App\\Models\\Admin\\Team', 1, 'hi', 'team_member_desig', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhh', NULL, '2025-09-26 17:01:59'),
(35, 'App\\Models\\Admin\\Team', 1, 'bn', 'team_member_about', '<p>bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</p>', NULL, '2025-10-25 09:01:47'),
(36, 'App\\Models\\Admin\\Team', 1, 'hi', 'team_member_about', '<p>hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>', NULL, '2025-09-26 17:01:59'),
(87, 'App\\Models\\Admin\\Project', 2, 'en', 'project_name', 'Business Network', NULL, '2025-09-27 12:38:03'),
(88, 'App\\Models\\Admin\\Project', 2, 'en', 'project_category', 'Design Business', NULL, '2025-09-27 12:38:03'),
(89, 'App\\Models\\Admin\\Project', 2, 'en', 'project_details', '<p>The majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarr assing hidden in ge editors now the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunk readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39; Content here, content here&#39;, making it look like readable English.</p>', NULL, '2025-09-27 12:38:03'),
(90, 'App\\Models\\Admin\\Project', 2, 'en', 'project_quotes', 'There are many variations of passages of Fasts by injected humour, or randomised ere we must-have solution to satisfy most.', NULL, '2025-09-27 12:38:03'),
(91, 'App\\Models\\Admin\\Project', 2, 'en', 'project_points', '[\"Business ndisse suscipit sagittis leo.\",\"We gives employer management\",\"Media in this area of the solution\"]', NULL, '2025-09-27 12:38:03'),
(92, 'App\\Models\\Admin\\Project', 2, 'bn', 'project_name', 'bbbbb', NULL, '2025-09-27 12:38:03'),
(93, 'App\\Models\\Admin\\Project', 2, 'bn', 'project_category', 'bbbbbbbbbbb', NULL, '2025-09-27 12:38:03'),
(94, 'App\\Models\\Admin\\Project', 2, 'bn', 'project_details', '<p>bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb</p>', NULL, '2025-09-27 12:38:03'),
(95, 'App\\Models\\Admin\\Project', 2, 'bn', 'project_quotes', 'bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb', NULL, '2025-09-27 12:38:03'),
(96, 'App\\Models\\Admin\\Project', 2, 'bn', 'project_points', '[\"sdadasdas dasd asda sdasdasd asda sdasd\",\"bn2\",\"bn3\"]', NULL, '2025-09-27 12:38:03'),
(97, 'App\\Models\\Admin\\Project', 2, 'hi', 'project_name', 'hhh', NULL, '2025-09-27 12:38:03'),
(98, 'App\\Models\\Admin\\Project', 2, 'hi', 'project_category', 'hhhhhhhhhhhhhhhhhhh', NULL, '2025-09-27 12:38:03'),
(99, 'App\\Models\\Admin\\Project', 2, 'hi', 'project_details', '<p>hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>', NULL, '2025-09-27 12:38:03'),
(100, 'App\\Models\\Admin\\Project', 2, 'hi', 'project_quotes', 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', NULL, '2025-09-27 12:38:03'),
(101, 'App\\Models\\Admin\\Project', 2, 'hi', 'project_points', '[\"hhhhhhhhhhhhhhhhhhhhhhhhhh\",\"h2\",\"H3\"]', NULL, '2025-09-27 12:38:04'),
(102, 'App\\Models\\Admin\\Work', 1, 'en', 'work_title', 'New Work', '2025-10-10 03:49:11', '2025-10-10 03:49:53'),
(103, 'App\\Models\\Admin\\Work', 1, 'en', 'work_details', '<p>New Work Details</p>', '2025-10-10 03:49:11', '2025-10-10 03:49:53'),
(104, 'App\\Models\\Admin\\WorkUpdate', 1, 'en', 'updates_details', '<p>TEST</p>', '2025-10-11 06:53:00', NULL),
(105, 'App\\Models\\Admin\\WorkUpdate', 1, 'en', 'updates_note', 'TEST', '2025-10-11 06:53:00', NULL),
(106, 'App\\Models\\Admin\\WorkUpdate', 2, 'en', 'updates_details', '<p>TEST</p>', '2025-10-11 06:53:27', NULL),
(107, 'App\\Models\\Admin\\WorkUpdate', 2, 'en', 'updates_note', 'TEST', '2025-10-11 06:53:27', NULL),
(108, 'App\\Models\\Admin\\WorkUpdate', 3, 'en', 'updates_details', '<p>TEST</p>', '2025-10-11 06:53:44', NULL),
(109, 'App\\Models\\Admin\\WorkUpdate', 3, 'en', 'updates_note', 'TEST', '2025-10-11 06:53:44', NULL),
(110, 'App\\Models\\Admin\\WorkUpdate', 4, 'en', 'updates_details', '<p>TEST UPDATE DETAILS</p>', '2025-10-11 07:06:36', '2025-10-11 15:51:04'),
(111, 'App\\Models\\Admin\\WorkUpdate', 4, 'en', 'updates_note', 'TEST', '2025-10-11 07:06:36', '2025-10-11 15:51:04'),
(112, 'App\\Models\\Admin\\WorkUpdate', 5, 'en', 'updates_details', '<p>xzxz</p>', '2025-10-11 07:20:31', NULL),
(113, 'App\\Models\\Admin\\WorkUpdate', 5, 'en', 'updates_note', 'TEST', '2025-10-11 07:20:31', NULL),
(114, 'App\\Models\\Admin\\WorkUpdate', 6, 'en', 'updates_details', '<p>zzzxZ</p>', '2025-10-11 07:23:06', NULL),
(115, 'App\\Models\\Admin\\WorkUpdate', 6, 'en', 'updates_note', 'TEST', '2025-10-11 07:23:06', NULL),
(116, 'App\\Models\\Admin\\WorkUpdate', 7, 'en', 'updates_details', '<p>ddsfds</p>', '2025-10-11 07:25:33', NULL),
(117, 'App\\Models\\Admin\\WorkUpdate', 7, 'en', 'updates_note', 'TEST', '2025-10-11 07:25:33', NULL),
(118, 'App\\Models\\Admin\\WorkUpdate', 8, 'en', 'updates_details', '<p>asdasdsadas</p>', '2025-10-11 08:01:34', NULL),
(119, 'App\\Models\\Admin\\WorkUpdate', 8, 'en', 'updates_note', 'ttttttt', '2025-10-11 08:01:34', NULL),
(120, 'App\\Models\\Admin\\WorkUpdate', 9, 'en', 'updates_details', '<p>asdasdas</p>', '2025-10-11 08:04:39', NULL),
(121, 'App\\Models\\Admin\\WorkUpdate', 9, 'en', 'updates_note', 'asdasda', '2025-10-11 08:04:39', NULL),
(122, 'App\\Models\\Admin\\WorkUpdate', 10, 'en', 'updates_details', '<p>asdasd</p>', '2025-10-11 08:08:30', NULL),
(123, 'App\\Models\\Admin\\WorkUpdate', 10, 'en', 'updates_note', 'TEST', '2025-10-11 08:08:30', NULL),
(124, 'App\\Models\\Admin\\WorkUpdate', 11, 'en', 'updates_details', '<p>asdasdas</p>', '2025-10-11 08:11:27', NULL),
(125, 'App\\Models\\Admin\\WorkUpdate', 11, 'en', 'updates_note', 'TEST', '2025-10-11 08:11:27', NULL),
(126, 'App\\Models\\Admin\\HomepageSilder', 1, 'en', 'slider_title', 'Best IT-Solution And Businessdd', NULL, '2025-10-17 18:13:57'),
(127, 'App\\Models\\Admin\\HomepageSilder', 1, 'en', 'slider_short_description', 'Nullam eu nibh vitae est tempor molestie id sed exthe. Quisque dignissim maximus ipsum metus ipsum.', NULL, '2025-10-17 18:13:57'),
(128, 'App\\Models\\Admin\\HomepageSilder', 1, 'en', 'slider_button_text', 'Contact Us', NULL, '2025-10-17 18:13:57'),
(129, 'App\\Models\\Admin\\HomepageSilder', 1, 'bn', 'slider_title', 'সেরা আইটি-সমাধান এবং বিজনেসডিডি', NULL, '2025-10-17 18:13:59'),
(130, 'App\\Models\\Admin\\HomepageSilder', 1, 'bn', 'slider_short_description', 'Nullam eu nibh vitae est tempor molestie id sed exthe. ব্যপক ডিগনিসিম ম্যাক্সিমাস ইপসাম মেটাস ইপসাম.', NULL, '2025-10-17 18:14:00'),
(131, 'App\\Models\\Admin\\HomepageSilder', 1, 'bn', 'slider_button_text', 'আমাদের সাথে যোগাযোগ করুন', NULL, '2025-10-17 18:14:01'),
(132, 'App\\Models\\Admin\\HomepageSilder', 1, 'hi', 'slider_title', 'सर्वोत्तम आईटी-समाधान और व्यवसाय', NULL, '2025-10-13 14:09:33'),
(133, 'App\\Models\\Admin\\HomepageSilder', 1, 'hi', 'slider_short_description', 'नल्लम ईयू निभ विटे इस टेम्पोर मोलेस्टी आईडी सेड एक्सथे। क्विस्क डिग्निसिम मैक्सिमस इप्सम मेटस इप्सम।', NULL, '2025-10-13 14:09:34'),
(134, 'App\\Models\\Admin\\HomepageSilder', 1, 'hi', 'slider_button_text', 'हमसे संपर्क करें', NULL, '2025-10-13 14:09:35'),
(135, 'App\\Models\\Admin\\Partner', 1, 'en', 'partner_name', 'Bangladesh', '2025-10-15 16:46:33', '2025-10-25 08:09:37'),
(136, 'App\\Models\\Admin\\Partner', 1, 'en', 'partner_details', '<p>asdfad</p>', '2025-10-15 16:46:33', '2025-10-25 08:09:37'),
(137, 'App\\Models\\Admin\\Comment', 1, 'en', 'name', 'admin', '2025-10-15 17:31:10', NULL),
(138, 'App\\Models\\Admin\\Comment', 1, 'en', 'designation', 'OFFICER, IT', '2025-10-15 17:31:10', NULL),
(139, 'App\\Models\\Admin\\Comment', 1, 'en', 'comments', '<p>Could you clarify what kind of <strong>comments</strong> you mean?<br />\r\nHere are a few possible interpretations &mdash; please pick one:</p>', '2025-10-15 17:31:10', NULL),
(140, 'App\\Models\\Admin\\Work', 2, 'en', 'work_title', 'New Work', '2025-10-17 11:42:50', '2025-10-18 03:59:56'),
(141, 'App\\Models\\Admin\\Work', 2, 'en', 'work_details', '<p>Have questions or need assistance with our live sports coverage? Our team is always ready to help you with any inquiries, technical issues, or partnership opportunities. Stay connected with us to ensure you never miss a moment of your favorite live matches and sporting events.</p>', '2025-10-17 11:42:50', '2025-10-18 03:59:56'),
(142, 'App\\Models\\Admin\\WorkUpdate', 12, 'en', 'updates_details', '<p>adsadasdadasd</p>', '2025-10-17 13:55:19', NULL),
(143, 'App\\Models\\Admin\\WorkUpdate', 12, 'en', 'updates_note', 'TEST', '2025-10-17 13:55:19', NULL),
(144, 'App\\Models\\Admin\\HomepageSilder', 2, 'en', 'slider_title', 'Test', NULL, '2025-10-18 07:24:27'),
(145, 'App\\Models\\Admin\\HomepageSilder', 3, 'en', 'slider_title', 'Test', NULL, '2025-10-18 07:33:05'),
(146, 'App\\Models\\Admin\\HomepageSilder', 3, 'bn', 'slider_title', 'পরীক্ষা', NULL, '2025-10-18 07:33:06'),
(147, 'App\\Models\\Admin\\Service', 2, 'en', 'service_name', 'Nikah Service2', '2025-10-25 07:49:18', NULL),
(148, 'App\\Models\\Admin\\Service', 2, 'en', 'service_short_details', 'A Nikah service facilitates the Islamic marriage ceremony, known as Nikah, in accordance with Islamic laws.', '2025-10-25 07:49:18', NULL),
(149, 'App\\Models\\Admin\\Service', 2, 'en', 'service_details', '<p>asdasdsa</p>', '2025-10-25 07:49:18', NULL),
(150, 'App\\Models\\Admin\\Service', 3, 'en', 'service_name', 'Nikah Service3', '2025-10-25 07:50:08', NULL),
(151, 'App\\Models\\Admin\\Service', 3, 'en', 'service_short_details', 'A Nikah service facilitates the Islamic marriage ceremony, known as Nikah, in accordance with Islamic laws.', '2025-10-25 07:50:08', NULL),
(152, 'App\\Models\\Admin\\Service', 3, 'en', 'service_details', '<p>asdadasdsa</p>', '2025-10-25 07:50:08', NULL),
(153, 'App\\Models\\Admin\\Service', 4, 'en', 'service_name', 'Nikah Service4', '2025-10-25 07:50:24', NULL),
(154, 'App\\Models\\Admin\\Service', 4, 'en', 'service_short_details', 'A Nikah service facilitates the Islamic marriage ceremony, known as Nikah, in accordance with Islamic laws.', '2025-10-25 07:50:24', NULL),
(155, 'App\\Models\\Admin\\Service', 4, 'en', 'service_details', '<p>sddfds</p>', '2025-10-25 07:50:24', NULL),
(156, 'App\\Models\\Admin\\Service', 5, 'en', 'service_name', 'Nikah Service5', '2025-10-25 07:50:55', '2025-10-27 10:12:52'),
(157, 'App\\Models\\Admin\\Service', 5, 'en', 'service_short_details', 'A Nikah service facilitates the Islamic marriage ceremony, known as Nikah, in accordance with Islamic laws.', '2025-10-25 07:50:55', '2025-10-27 10:12:52'),
(158, 'App\\Models\\Admin\\Service', 5, 'en', 'service_details', '<p>A blog is a website or part of a website that publishes regularly updated content, like articles, photos, and videos, in reverse chronological order (newest first).&nbsp;These posts are often informal and conversational, focusing on a specific topic or personal interests.&nbsp;Key details include&nbsp;regular updates, interactive features like comment sections, and the use of the content for various purposes like sharing information, building a community, or marketing.&nbsp;&nbsp;</p>\r\n\r\n<p>Key characteristics of a blog</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Regularly updated:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs are defined by their frequent updates to keep content fresh and readers engaged.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Reverse chronological order:</strong>&nbsp;</p>\r\n\r\n	<p>New posts are displayed at the top of the page, with older posts appearing further down.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Interactive:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs allow for reader engagement through comments and social sharing, helping to build a community.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Conversational style:</strong>&nbsp;</p>\r\n\r\n	<p>Content is often written in a personal or informal tone.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Multimedia content:</strong>&nbsp;</p>\r\n\r\n	<p>While often text-based, blogs also frequently include images, videos, and audio.&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Purposes of a blog</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Personal expression:</strong>&nbsp;</p>\r\n\r\n	<p>A personal blog can act as an online journal for sharing personal stories, experiences, and opinions.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Business and marketing:</strong>&nbsp;</p>\r\n\r\n	<p>Businesses use blogs to share information, build authority, connect with customers, promote products or services, and improve SEO.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Information and authority:</strong>&nbsp;</p>\r\n\r\n	<p>They can be used to provide expert advice, news, and commentary on a specific topic, such as technology or fashion.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Community building:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs can serve as a central hub for a community to discuss a shared interest.&nbsp;</p>\r\n	</li>\r\n</ul>', '2025-10-25 07:50:55', '2025-10-27 10:12:52'),
(159, 'App\\Models\\Admin\\Partner', 2, 'en', 'partner_name', 'Bangladesh', '2025-10-25 08:10:36', NULL),
(160, 'App\\Models\\Admin\\Partner', 2, 'en', 'partner_details', '<p>sddsfds</p>', '2025-10-25 08:10:36', NULL),
(161, 'App\\Models\\Admin\\Partner', 3, 'en', 'partner_name', 'Bangladesh', '2025-10-25 08:10:52', NULL),
(162, 'App\\Models\\Admin\\Partner', 3, 'en', 'partner_details', '<p>sddsfds</p>', '2025-10-25 08:10:52', NULL),
(163, 'App\\Models\\Admin\\Partner', 4, 'en', 'partner_name', 'Bangladesh', '2025-10-25 08:11:04', NULL),
(164, 'App\\Models\\Admin\\Partner', 4, 'en', 'partner_details', '<p>sddsfds</p>', '2025-10-25 08:11:04', NULL),
(165, 'App\\Models\\Admin\\Partner', 5, 'en', 'partner_name', 'Bangladesh', '2025-10-25 08:11:42', NULL),
(166, 'App\\Models\\Admin\\Partner', 5, 'en', 'partner_details', '<p>sddsfds</p>', '2025-10-25 08:11:42', NULL),
(167, 'App\\Models\\Admin\\Partner', 6, 'en', 'partner_name', 'Bangladesh', '2025-10-25 08:11:51', NULL),
(168, 'App\\Models\\Admin\\Partner', 6, 'en', 'partner_details', '<p>sddsfds</p>', '2025-10-25 08:11:51', NULL),
(169, 'App\\Models\\Admin\\Team', 2, 'en', 'team_member_name', 'MD SUMIT', '2025-10-25 08:52:59', '2025-10-25 09:00:44'),
(170, 'App\\Models\\Admin\\Team', 2, 'en', 'team_member_about', '<p>asdsadsadsad</p>', '2025-10-25 08:52:59', '2025-10-25 09:00:44'),
(171, 'App\\Models\\Admin\\Team', 2, 'en', 'team_member_desig', 'MD', '2025-10-25 08:52:59', '2025-10-25 09:00:44'),
(172, 'App\\Models\\Admin\\Team', 3, 'en', 'team_member_name', 'MD MUTASIM NAIB SUMIT', '2025-10-25 08:53:42', '2025-10-25 09:01:04'),
(173, 'App\\Models\\Admin\\Team', 3, 'en', 'team_member_about', '<p>asdasdasd</p>', '2025-10-25 08:53:42', '2025-10-25 09:01:04'),
(174, 'App\\Models\\Admin\\Team', 3, 'en', 'team_member_desig', 'Sr.Executive', '2025-10-25 08:53:42', '2025-10-25 09:01:04'),
(175, 'App\\Models\\Admin\\Team', 4, 'en', 'team_member_name', 'MD SUMIT E', '2025-10-25 16:58:06', NULL),
(176, 'App\\Models\\Admin\\Team', 4, 'en', 'team_member_about', '<p>adasd</p>', '2025-10-25 16:58:06', NULL),
(177, 'App\\Models\\Admin\\Team', 4, 'en', 'team_member_desig', 'Executive', '2025-10-25 16:58:06', NULL),
(178, 'App\\Models\\Admin\\Team', 5, 'en', 'team_member_name', 'SUMIT DD', '2025-10-25 16:59:54', NULL),
(179, 'App\\Models\\Admin\\Team', 5, 'en', 'team_member_about', '<p>asdfsad</p>', '2025-10-25 16:59:54', NULL),
(180, 'App\\Models\\Admin\\Team', 5, 'en', 'team_member_desig', 'DD', '2025-10-25 16:59:54', NULL),
(181, 'App\\Models\\Admin\\CountryRepresentation', 1, 'en', 'name', 'Aljazeera', '2025-10-26 17:37:39', '2025-10-26 18:21:55'),
(182, 'App\\Models\\Admin\\CountryRepresentation', 2, 'en', 'name', 'CNN', '2025-10-26 18:23:30', NULL),
(183, 'App\\Models\\Admin\\CountryRepresentation', 3, 'en', 'name', 'Euronews', '2025-10-26 18:23:45', NULL),
(184, 'App\\Models\\Admin\\CountryRepresentation', 4, 'en', 'name', 'BBC', '2025-10-26 18:23:57', NULL),
(185, 'App\\Models\\Admin\\CountryRepresentation', 5, 'en', 'name', 'Bloomberg', '2025-10-26 18:24:13', NULL),
(186, 'App\\Models\\Admin\\Project', 1, 'en', 'title', 'Bangladesh Business Summit 2023', '2025-10-26 18:27:28', '2025-10-26 18:28:46'),
(187, 'App\\Models\\Admin\\Project', 1, 'en', 'details', '<h2>Detailed description of the project</h2>\r\n\r\n<p>Bangladesh Business Summit 2023 is an international trade and investment promotion event. The summit, envisaged to become Bangladesh&rsquo;s flagship business promotion bi-annual event, seeks to highlight Bangladesh&rsquo;s economic and market strengths, and concrete trade and investment opportunities in Bangladesh by convening national and global businesses leaders, investors, policymakers, practitioners, policy and market analysts, academia, and innovators.</p>\r\n\r\n<p>The summit was organised under patronage and supervision of:</p>\r\n\r\n<ul>\r\n	<li>Ministry of Foreign Affairs, Bangladesh</li>\r\n	<li>Ministry of Commerce, Bangladesh</li>\r\n	<li>Bangladesh Investment Development Authority</li>\r\n</ul>\r\n\r\n<p>Objectives of the summit:</p>\r\n\r\n<ul>\r\n	<li>Highlight the success story that has set the foundations for sustainable growth trajectory of Bangladesh</li>\r\n	<li>Showcase the dynamic business /investment opportunities in Bangladesh</li>\r\n	<li>Showcase the improvements and business environment reforms</li>\r\n	<li>Gain insights of investment priorities of the global investors to improve policy</li>\r\n	<li>Facilitate exchange of investment success stories and good practices among investors</li>\r\n	<li>Seek investors&rsquo; views and suggestions to create more partnership opportunities</li>\r\n	<li>Secure concrete investment interest/proposals and develop a solid investment pipeline for important sectors</li>\r\n	<li>Facilitate effective networking, dialogue and partnership opportunities among national and international investors, policy makers and broader group of stakeholders</li>\r\n</ul>\r\n\r\n<table style=\"width:929px\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Name of legal entity</strong></td>\r\n			<td><strong>Country</strong></td>\r\n			<td><strong>Proportion carried out by candidate (%)</strong></td>\r\n			<td><strong>No of staff provided</strong></td>\r\n			<td><strong>Origin of funding</strong></td>\r\n			<td><strong>Dates (start/end)</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Spellbound Communications Limited</strong></td>\r\n			<td>Bangladesh</td>\r\n			<td>100 input base</td>\r\n			<td>10</td>\r\n			<td>Private</td>\r\n			<td>01.01.2023-\r\n			<p>&nbsp;</p>\r\n\r\n			<p>01.06.2023</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>Type and scope of services provided</h2>\r\n\r\n<ol>\r\n	<li><strong>Management and implementation of the project:</strong>\r\n\r\n	<ul>\r\n		<li>Planning and Strategy</li>\r\n		<li>Project Timeline</li>\r\n		<li>Manage day-to-day activities</li>\r\n		<li>Secretariat Support</li>\r\n		<li>Provision of media coverage of activities and events organised</li>\r\n		<li>Guest management</li>\r\n		<li>Hospitality Coordination with Hotels</li>\r\n		<li>Coordination with Partners and Committee of FBCCI</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Event organisation support:</strong>&nbsp;press conferences, panel discussions, breakout session, media briefings, exhibition, B2B matchmaking</li>\r\n	<li><strong>Provision of technical and logistical support</strong></li>\r\n	<li><strong>Media support:</strong>\r\n	<ul>\r\n		<li>Arrange CNN Experience</li>\r\n		<li>CNN Insight Session</li>\r\n		<li>Panel Discussion with Richard Quest</li>\r\n		<li>CNN Create&rsquo;s Interview-based shooting of Sponsor</li>\r\n		<li>Facilitation to CNN Editorial Team</li>\r\n		<li>Press coverage and monitoring services of Local and International Media</li>\r\n		<li>Press clipping reports</li>\r\n		<li>Social media reports</li>\r\n		<li>Coverage of events organised at the EUIC or upon request of the Contracting Authority</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Design and Printing of publication Materials</strong></li>\r\n	<li><strong>Graphic design services</strong></li>\r\n	<li><strong>Production of promotional materials</strong></li>\r\n	<li><strong>Video production</strong></li>\r\n	<li><strong>Translation and proofreading services</strong></li>\r\n	<li><strong>Digital Platform Development, Maintenance and Promotion</strong></li>\r\n</ol>', '2025-10-26 18:27:28', '2025-10-26 18:28:46'),
(188, 'App\\Models\\Admin\\Member', 1, 'en', 'name', 'Amcham Bangladesh', '2025-10-26 19:16:22', '2025-10-26 19:20:44'),
(189, 'App\\Models\\Admin\\Member', 2, 'en', 'name', 'AAAB', '2025-10-26 19:17:52', NULL),
(190, 'App\\Models\\Admin\\Member', 3, 'en', 'name', 'AAAB', '2025-10-26 19:18:08', NULL),
(191, 'App\\Models\\Admin\\Member', 4, 'en', 'name', 'Amcham Bangladesh', '2025-10-26 19:18:57', NULL),
(192, 'App\\Models\\Admin\\Member', 5, 'en', 'name', 'Amcham Bangladesh', '2025-10-26 19:19:07', NULL),
(193, 'App\\Models\\Admin\\Member', 6, 'en', 'name', 'Amcham Bangladesh', '2025-10-26 19:20:30', NULL),
(194, 'App\\Models\\Admin\\PublicDiplomacy', 1, 'en', 'title', 'This award-winning architect is building flat-pack, flood-proof homes', '2025-10-27 03:16:37', NULL),
(195, 'App\\Models\\Admin\\PublicDiplomacy', 1, 'en', 'name', 'Growing Bangladesh, CNN', '2025-10-27 03:16:37', NULL),
(196, 'App\\Models\\Admin\\PublicDiplomacy', 2, 'en', 'title', 'This award-winning architect is building flat-pack, flood-proof homes', '2025-10-27 03:17:21', NULL),
(197, 'App\\Models\\Admin\\PublicDiplomacy', 2, 'en', 'name', 'Growing Bangladesh, CNN', '2025-10-27 03:17:21', NULL),
(198, 'App\\Models\\Admin\\PublicDiplomacy', 3, 'en', 'title', 'This award-winning architect is building flat-pack, flood-proof homes', '2025-10-27 03:17:42', NULL),
(199, 'App\\Models\\Admin\\PublicDiplomacy', 3, 'en', 'name', 'Growing Bangladesh, CNN', '2025-10-27 03:17:42', NULL),
(200, 'App\\Models\\Admin\\PublicDiplomacy', 4, 'en', 'title', 'This award-winning architect is building flat-pack, flood-proof homes', '2025-10-27 03:20:58', NULL),
(201, 'App\\Models\\Admin\\PublicDiplomacy', 4, 'en', 'name', 'Growing Bangladesh, CNN', '2025-10-27 03:20:58', NULL),
(202, 'App\\Models\\Admin\\PublicDiplomacy', 5, 'en', 'title', 'This award-winning architect is building flat-pack, flood-proof homes', '2025-10-27 03:21:30', NULL),
(203, 'App\\Models\\Admin\\PublicDiplomacy', 5, 'en', 'name', 'Growing Bangladesh, CNN', '2025-10-27 03:21:30', NULL),
(204, 'App\\Models\\Admin\\PublicDiplomacy', 6, 'en', 'title', 'This award-winning architect is building flat-pack, flood-proof homes', '2025-10-27 03:22:17', NULL),
(205, 'App\\Models\\Admin\\PublicDiplomacy', 6, 'en', 'name', 'Growing Bangladesh, CNN', '2025-10-27 03:22:17', NULL),
(206, 'App\\Models\\Admin\\PublicDiplomacy', 7, 'en', 'title', 'This award-winning architect is building flat-pack, flood-proof homes', '2025-10-27 03:23:47', NULL),
(207, 'App\\Models\\Admin\\PublicDiplomacy', 7, 'en', 'name', 'Growing Bangladesh, CNN', '2025-10-27 03:23:47', NULL),
(208, 'App\\Models\\Admin\\PublicDiplomacy', 8, 'en', 'title', 'This award-winning architect is building flat-pack, flood-proof homes', '2025-10-27 03:25:22', '2025-10-27 04:44:26'),
(209, 'App\\Models\\Admin\\PublicDiplomacy', 8, 'en', 'name', 'Growing Bangladesh,CNNS', '2025-10-27 03:25:22', '2025-10-27 04:44:26'),
(210, 'App\\Models\\Admin\\PublicDiplomacy', 9, 'en', 'title', 'This award-winning architect is building flat-pack, flood-proof homes', '2025-10-27 04:43:58', NULL),
(211, 'App\\Models\\Admin\\PublicDiplomacy', 9, 'en', 'name', 'Growing Bangladesh, CNN', '2025-10-27 04:43:58', NULL),
(212, 'App\\Models\\Admin\\PublicDiplomacy', 10, 'en', 'title', 'This award-winning architect is building flat-pack, flood-proof homes', '2025-10-27 05:12:12', NULL),
(213, 'App\\Models\\Admin\\PublicDiplomacy', 10, 'en', 'name', 'Growing Bangladesh, BBC', '2025-10-27 05:12:12', NULL),
(214, 'App\\Models\\Admin\\Blog', 1, 'en', 'title', 'How Bangladesh is Achieving Export Diversification', '2025-10-27 07:20:15', '2025-10-27 07:54:25'),
(215, 'App\\Models\\Admin\\Blog', 1, 'en', 'details', '<p>sdfsdfsdfsdf</p>', '2025-10-27 07:20:15', '2025-10-27 07:54:25'),
(216, 'App\\Models\\Admin\\Blog', 2, 'en', 'title', 'How Bangladesh is Achieving Export Diversification  3', '2025-10-27 07:55:48', '2025-10-27 09:19:21'),
(217, 'App\\Models\\Admin\\Blog', 2, 'en', 'details', '<p>A blog is a website or part of a website that publishes regularly updated content, like articles, photos, and videos, in reverse chronological order (newest first).&nbsp;These posts are often informal and conversational, focusing on a specific topic or personal interests.&nbsp;Key details include&nbsp;regular updates, interactive features like comment sections, and the use of the content for various purposes like sharing information, building a community, or marketing.&nbsp;&nbsp;</p>\r\n\r\n<p>Key characteristics of a blog</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Regularly updated:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs are defined by their frequent updates to keep content fresh and readers engaged.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Reverse chronological order:</strong>&nbsp;</p>\r\n\r\n	<p>New posts are displayed at the top of the page, with older posts appearing further down.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Interactive:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs allow for reader engagement through comments and social sharing, helping to build a community.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Conversational style:</strong>&nbsp;</p>\r\n\r\n	<p>Content is often written in a personal or informal tone.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Multimedia content:</strong>&nbsp;</p>\r\n\r\n	<p>While often text-based, blogs also frequently include images, videos, and audio.&nbsp;</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>Purposes of a blog</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Personal expression:</strong>&nbsp;</p>\r\n\r\n	<p>A personal blog can act as an online journal for sharing personal stories, experiences, and opinions.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Business and marketing:</strong>&nbsp;</p>\r\n\r\n	<p>Businesses use blogs to share information, build authority, connect with customers, promote products or services, and improve SEO.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Information and authority:</strong>&nbsp;</p>\r\n\r\n	<p>They can be used to provide expert advice, news, and commentary on a specific topic, such as technology or fashion.&nbsp;</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Community building:</strong>&nbsp;</p>\r\n\r\n	<p>Blogs can serve as a central hub for a community to discuss a shared interest.&nbsp;</p>\r\n	</li>\r\n</ul>', '2025-10-27 07:55:48', '2025-10-27 09:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_code` varchar(255) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `base_unit` varchar(255) DEFAULT NULL,
  `operator` varchar(255) DEFAULT NULL,
  `operation_value` double DEFAULT NULL,
  `unit_status` tinyint(1) NOT NULL DEFAULT 0,
  `unit_created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_code`, `unit_name`, `base_unit`, `operator`, `operation_value`, `unit_status`, `unit_created_by`, `created_at`, `updated_at`) VALUES
(7, 'PC', 'Piece', NULL, NULL, 1, 1, '1', '2024-01-21 10:02:14', '2024-01-21 10:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Inactive 1=Active',
  `delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Not Deleted 1=Deleted',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `username`, `address`, `image`, `email_verified_at`, `password`, `status`, `delete`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MD. MUTASIM NAIB', 'mutasim@gmail.com', '01794973738', 'MD. MUTASIM NAIB', 'ZORABARI,MIRZAGONJ,DOMAR,NILPHAMARI', NULL, NULL, '$2y$12$UX1/99iM985uAjhHQ5DB4OnTsRDrfRNwtSOJnNhwUgPSvV5cmb8Sy', 1, 0, NULL, '2024-01-30 06:32:39', '2025-10-10 03:49:11'),
(5, 'MD. MUTASIM NAIB', 'mutasimnaib@gmail.com', '01724698392', 'md-mutasim-naib78050', 'ZORABARI,MIRZAGONJ,DOMAR,NILPHAMARI', NULL, NULL, '$2y$12$TEIIV10APt4m1.bbR4jTUOaCbSOb4NlGQffxYaJp7OEarq047dBte', 1, 0, NULL, '2025-10-17 11:42:50', '2025-10-17 16:09:11'),
(6, 'Naib', 'mutasims@gmail.com', '01724698393', 'naib65725', 'ZORABARI,MIRZAGONJ,DOMAR,NILPHAMARI', NULL, NULL, '$2y$12$vYfyn5AOM08L3uyCRiP8WebLu7Nv8uQRgVJ25eFK7GINTGJuJmfZq', 1, 0, NULL, '2025-10-17 12:30:13', '2025-10-17 12:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=not deleted 1=deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `phone`, `email`, `address`, `created_by`, `status`, `delete`, `created_at`, `updated_at`) VALUES
(1, 'Sumit Store', '12354698778', 'test@gmail.com', 'Test', 1, 1, 0, '2024-01-28 04:55:45', '2024-01-29 09:31:37'),
(2, 'Polin Store', '12354698779', 'test2@gmail.com', 'Test', 1, 1, 0, '2024-01-28 07:02:55', '2024-02-07 03:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_prices`
--

CREATE TABLE `warehouse_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=Not Deleted and 1= Not Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouse_prices`
--

INSERT INTO `warehouse_prices` (`id`, `product_id`, `warehouse_id`, `price`, `quantity`, `created_by`, `updated_by`, `delete`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, 7, 1, 1, 0, '2024-01-28 05:35:46', '2024-01-31 10:18:26'),
(2, 1, 1, 0, 4, 1, 1, 0, '2024-01-29 09:56:48', '2024-02-08 03:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_title` text DEFAULT NULL,
  `work_details` text DEFAULT NULL,
  `work_file` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `total_cost` double NOT NULL DEFAULT 0,
  `total_paid` double NOT NULL DEFAULT 0,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `progress` int(11) NOT NULL DEFAULT 0,
  `progress_status` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `work_title`, `work_details`, `work_file`, `user_id`, `duration`, `total_cost`, `total_paid`, `payment_status`, `progress`, `progress_status`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'New Work', '<p>New Work Details</p>', 'public/admin/file/work/work-files/workFile1760068151.pdf', 1, '10/10/2025 - 10/30/2025', 20000, 4889, 1, 10, 1, 1, 0, NULL, NULL, '2025-10-10 03:49:11', '2025-10-11 16:56:39'),
(2, 'New Work', '<p>Have questions or need assistance with our live sports coverage? Our team is always ready to help you with any inquiries, technical issues, or partnership opportunities. Stay connected with us to ensure you never miss a moment of your favorite live matches and sporting events.</p>', 'public/admin/file/work/work-files/workFile1760701370.pdf', 5, '10/17/2025 - 10/27/2025', 28140, 2000, 1, 60, 1, 1, 0, NULL, NULL, '2025-10-17 11:42:50', '2025-10-18 03:59:56');

--
-- Triggers `works`
--
DELIMITER $$
CREATE TRIGGER `trg_work_payment_status_insert` BEFORE INSERT ON `works` FOR EACH ROW BEGIN
                IF NEW.total_paid = 0 THEN
                    SET NEW.payment_status = 0; -- Not paid
                ELSEIF NEW.total_paid < NEW.total_cost THEN
                    SET NEW.payment_status = 1; -- Partially paid
                ELSE
                    SET NEW.payment_status = 2; -- Fully paid
                END IF;
            END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `trg_work_payment_status_update` BEFORE UPDATE ON `works` FOR EACH ROW BEGIN
                IF NEW.total_paid = 0 THEN
                    SET NEW.payment_status = 0; -- Not paid
                ELSEIF NEW.total_paid < NEW.total_cost THEN
                    SET NEW.payment_status = 1; -- Partially paid
                ELSE
                    SET NEW.payment_status = 2; -- Fully paid
                END IF;
            END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `work_payments`
--

CREATE TABLE `work_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `asking_payment` double DEFAULT NULL,
  `asking_payment_date` date DEFAULT NULL,
  `actual_payment` double DEFAULT NULL,
  `actual_payment_date` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_payments`
--

INSERT INTO `work_payments` (`id`, `work_id`, `user_id`, `asking_payment`, `asking_payment_date`, `actual_payment`, `actual_payment_date`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5000, '2025-10-10', 5000, '2025-10-10', 1, 0, 1, 1, '2025-10-10 03:49:11', '2025-10-10 03:49:53'),
(5, 1, 1, 500, '2025-10-11', 307, '2025-10-14', 1, 0, 1, 1, '2025-10-11 07:06:36', '2025-10-11 15:51:04'),
(6, 1, 1, 200, '2025-10-11', NULL, '2025-10-11', 1, 0, 1, NULL, '2025-10-11 07:20:31', '2025-10-11 07:20:31'),
(7, 1, 1, 500, '2025-10-11', NULL, '2025-10-12', 1, 0, 1, NULL, '2025-10-11 07:23:06', '2025-10-11 07:23:06'),
(8, 1, 1, 5000, '2025-10-11', NULL, '2025-10-30', 1, 0, 1, NULL, '2025-10-11 07:25:33', '2025-10-11 07:25:33'),
(9, 1, 1, 200, '2025-10-11', 100, '2025-10-18', 1, 1, 1, NULL, '2025-10-11 08:01:34', '2025-10-11 16:56:39'),
(10, 1, 1, 300, '2025-10-11', 11, '2025-10-18', 1, 1, 1, NULL, '2025-10-11 08:04:39', '2025-10-11 16:55:59'),
(11, 2, 5, 2000, '2025-10-18', 2000, '2025-10-18', 1, 0, 1, 1, '2025-10-17 11:42:50', '2025-10-18 03:59:27'),
(12, 2, 5, 500, '2025-10-17', NULL, '2025-10-23', 1, 0, 1, NULL, '2025-10-17 13:55:19', '2025-10-17 13:55:19');

-- --------------------------------------------------------

--
-- Table structure for table `work_updates`
--

CREATE TABLE `work_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updates_details` text DEFAULT NULL,
  `updates_note` text DEFAULT NULL,
  `customer_feedback` text DEFAULT NULL,
  `updates_file` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_updates`
--

INSERT INTO `work_updates` (`id`, `work_id`, `user_id`, `payment_id`, `updates_details`, `updates_note`, `customer_feedback`, `updates_file`, `status`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 5, '<p>TEST UPDATE DETAILS</p>', 'TEST', NULL, 'public/admin/file/work/work-updates/workUpdates1760166396.pdf', 1, 0, 1, 1, '2025-10-11 07:06:36', '2025-10-11 15:41:08'),
(5, 1, 1, 6, '<p>xzxz</p>', 'TEST', NULL, 'public/admin/file/work/work-updates/workUpdates1760167231.pdf', 1, 0, 1, NULL, '2025-10-11 07:20:31', '2025-10-11 07:20:31'),
(6, 1, 1, 7, '<p>zzzxZ</p>', 'TEST', NULL, 'public/admin/file/work/work-updates/workUpdates1760167386.pdf', 1, 0, 1, NULL, '2025-10-11 07:23:06', '2025-10-11 07:23:06'),
(7, 1, 1, 8, '<p>ddsfds</p>', 'TEST', NULL, 'public/admin/file/work/work-updates/workUpdates1760167533.pdf', 1, 0, 1, NULL, '2025-10-11 07:25:33', '2025-10-11 07:25:33'),
(8, 1, 1, 9, '<p>asdasdsadas</p>', 'ttttttt', NULL, 'public/admin/file/work/work-updates/workUpdates1760169694.pdf', 1, 1, 1, NULL, '2025-10-11 08:01:34', '2025-10-11 16:56:39'),
(9, 1, 1, 10, '<p>asdasdas</p>', 'asdasda', NULL, 'public/admin/file/work/work-updates/workUpdates1760169879.pdf', 1, 1, 1, NULL, '2025-10-11 08:04:39', '2025-10-11 16:55:59'),
(10, 1, 1, NULL, '<p>asdasd</p>', 'TEST', NULL, 'public/admin/file/work/work-updates/workUpdates1760170110.pdf', 1, 0, 1, NULL, '2025-10-11 08:08:30', '2025-10-11 08:08:30'),
(11, 1, 1, NULL, '<p>asdasdas</p>', 'TEST', NULL, 'public/admin/file/work/work-updates/workUpdates1760170287.pdf', 1, 0, 1, NULL, '2025-10-11 08:11:27', '2025-10-11 08:11:27'),
(12, 2, 5, 12, '<p>adsadasdadasd</p>', 'TEST', 'sadasdasdasdxvxcvxcvxcvcx', 'public/admin/file/work/work-updates/workUpdates1760709319.pdf', 1, 0, 1, 1, '2025-10-17 13:55:19', '2025-10-18 07:20:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_us_created_by_foreign` (`created_by`),
  ADD KEY `about_us_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `adjustments`
--
ALTER TABLE `adjustments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adjustments_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `adjustments_created_by_foreign` (`created_by`),
  ADD KEY `adjustments_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_created_by_foreign` (`created_by`),
  ADD KEY `blogs_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_category_id_foreign` (`parent_category_id`),
  ADD KEY `categories_category_added_by_foreign` (`category_added_by`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_created_by_foreign` (`created_by`),
  ADD KEY `comments_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_created_by_foreign` (`created_by`),
  ADD KEY `contacts_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `countings`
--
ALTER TABLE `countings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countings_created_by_foreign` (`created_by`),
  ADD KEY `countings_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `country_representations`
--
ALTER TABLE `country_representations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_representations_created_by_foreign` (`created_by`),
  ADD KEY `country_representations_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `homepage_silders`
--
ALTER TABLE `homepage_silders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homepage_silders_created_by_foreign` (`created_by`),
  ADD KEY `homepage_silders_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenances_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_created_by_foreign` (`created_by`),
  ADD KEY `members_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`),
  ADD KEY `messages_replied_by_foreign` (`replied_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `parent_categories`
--
ALTER TABLE `parent_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_categories_parent_category_added_by_foreign` (`parent_category_added_by`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partners_created_by_foreign` (`created_by`),
  ADD KEY `partners_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_unit_id_foreign` (`unit_id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`),
  ADD KEY `product_variants_created_by_foreign` (`created_by`),
  ADD KEY `product_variants_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_created_by_foreign` (`created_by`),
  ADD KEY `projects_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `public_diplomacies`
--
ALTER TABLE `public_diplomacies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `public_diplomacies_country_id_foreign` (`country_id`),
  ADD KEY `public_diplomacies_created_by_foreign` (`created_by`),
  ADD KEY `public_diplomacies_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `pulse_aggregates`
--
ALTER TABLE `pulse_aggregates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pulse_aggregates_bucket_period_type_aggregate_key_hash_unique` (`bucket`,`period`,`type`,`aggregate`,`key_hash`),
  ADD KEY `pulse_aggregates_period_bucket_index` (`period`,`bucket`),
  ADD KEY `pulse_aggregates_type_index` (`type`),
  ADD KEY `pulse_aggregates_period_type_aggregate_bucket_index` (`period`,`type`,`aggregate`,`bucket`);

--
-- Indexes for table `pulse_entries`
--
ALTER TABLE `pulse_entries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pulse_entries_timestamp_index` (`timestamp`),
  ADD KEY `pulse_entries_type_index` (`type`),
  ADD KEY `pulse_entries_key_hash_index` (`key_hash`),
  ADD KEY `pulse_entries_timestamp_type_key_hash_value_index` (`timestamp`,`type`,`key_hash`,`value`);

--
-- Indexes for table `pulse_values`
--
ALTER TABLE `pulse_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pulse_values_type_key_hash_unique` (`type`,`key_hash`),
  ADD KEY `pulse_values_timestamp_index` (`timestamp`),
  ADD KEY `pulse_values_type_index` (`type`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_created_by_foreign` (`created_by`),
  ADD KEY `services_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_created_by_foreign` (`created_by`),
  ADD KEY `teams_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouses_created_by_foreign` (`created_by`);

--
-- Indexes for table `warehouse_prices`
--
ALTER TABLE `warehouse_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_prices_product_id_foreign` (`product_id`),
  ADD KEY `warehouse_prices_warehouse_id_foreign` (`warehouse_id`),
  ADD KEY `warehouse_prices_created_by_foreign` (`created_by`),
  ADD KEY `warehouse_prices_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `works_user_id_foreign` (`user_id`),
  ADD KEY `works_created_by_foreign` (`created_by`),
  ADD KEY `works_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `work_payments`
--
ALTER TABLE `work_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_payments_work_id_foreign` (`work_id`),
  ADD KEY `work_payments_user_id_foreign` (`user_id`),
  ADD KEY `work_payments_created_by_foreign` (`created_by`),
  ADD KEY `work_payments_updated_by_foreign` (`updated_by`);

--
-- Indexes for table `work_updates`
--
ALTER TABLE `work_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_updates_work_id_foreign` (`work_id`),
  ADD KEY `work_updates_user_id_foreign` (`user_id`),
  ADD KEY `work_updates_payment_id_foreign` (`payment_id`),
  ADD KEY `work_updates_created_by_foreign` (`created_by`),
  ADD KEY `work_updates_updated_by_foreign` (`updated_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adjustments`
--
ALTER TABLE `adjustments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countings`
--
ALTER TABLE `countings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_representations`
--
ALTER TABLE `country_representations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homepage_silders`
--
ALTER TABLE `homepage_silders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `maintenances`
--
ALTER TABLE `maintenances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `parent_categories`
--
ALTER TABLE `parent_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `public_diplomacies`
--
ALTER TABLE `public_diplomacies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pulse_aggregates`
--
ALTER TABLE `pulse_aggregates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3360;

--
-- AUTO_INCREMENT for table `pulse_entries`
--
ALTER TABLE `pulse_entries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=761;

--
-- AUTO_INCREMENT for table `pulse_values`
--
ALTER TABLE `pulse_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouse_prices`
--
ALTER TABLE `warehouse_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `work_payments`
--
ALTER TABLE `work_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `work_updates`
--
ALTER TABLE `work_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_us`
--
ALTER TABLE `about_us`
  ADD CONSTRAINT `about_us_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `about_us_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `adjustments`
--
ALTER TABLE `adjustments`
  ADD CONSTRAINT `adjustments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `adjustments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `adjustments_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`);

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `blogs_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_category_added_by_foreign` FOREIGN KEY (`category_added_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `parent_categories` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `comments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `contacts_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `countings`
--
ALTER TABLE `countings`
  ADD CONSTRAINT `countings_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `countings_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `country_representations`
--
ALTER TABLE `country_representations`
  ADD CONSTRAINT `country_representations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `country_representations_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `homepage_silders`
--
ALTER TABLE `homepage_silders`
  ADD CONSTRAINT `homepage_silders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `homepage_silders_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `maintenances`
--
ALTER TABLE `maintenances`
  ADD CONSTRAINT `maintenances_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `members_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_replied_by_foreign` FOREIGN KEY (`replied_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parent_categories`
--
ALTER TABLE `parent_categories`
  ADD CONSTRAINT `parent_categories_parent_category_added_by_foreign` FOREIGN KEY (`parent_category_added_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `partners_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `products_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `products_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_variants_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `projects_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `public_diplomacies`
--
ALTER TABLE `public_diplomacies`
  ADD CONSTRAINT `public_diplomacies_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country_representations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `public_diplomacies_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `public_diplomacies_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `services_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `teams_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD CONSTRAINT `warehouses_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`);

--
-- Constraints for table `warehouse_prices`
--
ALTER TABLE `warehouse_prices`
  ADD CONSTRAINT `warehouse_prices_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `warehouse_prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `warehouse_prices_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `warehouse_prices_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`);

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `works_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `work_payments`
--
ALTER TABLE `work_payments`
  ADD CONSTRAINT `work_payments_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `work_payments_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `work_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `work_payments_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `work_updates`
--
ALTER TABLE `work_updates`
  ADD CONSTRAINT `work_updates_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `work_updates_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `work_payments` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `work_updates_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `work_updates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `work_updates_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
