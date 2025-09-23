-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2025 at 05:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.0

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
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_line` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resp_person_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resp_person_desig` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resp_person_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resp_person_signature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'BIPEBD', 'BIPEBD – Empowering Businesses with Smart IT Solutions', 'BIPEBD is a trusted IT solutions company helping businesses embrace digital transformation. We deliver software, web, mobile, cloud, and IT consultancy tailored to client needs. With innovation and reliability, BIPEBD empowers organizations to grow smarter and faster.', '<p><strong>BIPEBD</strong> is a leading IT solutions company dedicated to helping businesses embrace digital transformation. We specialize in providing innovative software development, web solutions, mobile applications, cloud services, and IT consultancy tailored to meet the unique needs of our clients. With a focus on reliability, innovation, and customer success, BIPEBD empowers organizations to grow smarter and operate more efficiently in today&rsquo;s fast-paced digital world.</p>', 'BIPEBD is a leading IT solutions company driving digital transformation for businesses.||We provide software, web, mobile, cloud, and IT consultancy tailored to client needs.||With innovation and reliability, we help organizations grow smarter and faster.', 'BIPEBD successfully delivers innovative IT projects that drive business growth and efficiency', 'MD MUTASIM NAIB', 'CEO', 'public/admin/file/aboutus/aboutus-images/aboutusRespPerson1758640300.png', 'public/admin/file/aboutus/aboutus-images/aboutusRespPersonSig1758640300.png', 6, 'public/admin/file/aboutus/aboutus-images/aboutus11758640300.JPG', 'public/admin/file/aboutus/aboutus-images/aboutus21758640301.JPG', 'Pq5r3GKBP34', 1, 0, NULL, NULL, '2025-09-23 14:09:12', '2025-09-23 15:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `translationable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translationable_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `translationable_type`, `translationable_id`, `locale`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'company_name', 'BIPEBD', NULL, '2025-09-23 15:44:21'),
(2, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'points', 'BIPEBD is a leading IT solutions company driving digital transformation for businesses.||We provide software, web, mobile, cloud, and IT consultancy tailored to client needs.||With innovation and reliability, we help organizations grow smarter and faster.', NULL, '2025-09-23 15:44:21'),
(3, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'project_line', 'BIPEBD successfully delivers innovative IT projects that drive business growth and efficiency', NULL, '2025-09-23 15:44:21'),
(4, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'about_us_title', 'BIPEBD – Empowering Businesses with Smart IT Solutions', NULL, '2025-09-23 15:44:21'),
(5, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'short_details', 'BIPEBD is a trusted IT solutions company helping businesses embrace digital transformation. We deliver software, web, mobile, cloud, and IT consultancy tailored to client needs. With innovation and reliability, BIPEBD empowers organizations to grow smarter and faster.', NULL, '2025-09-23 15:44:21'),
(6, 'App\\Models\\Admin\\AboutUs', 1, 'en', 'details', '<p><strong>BIPEBD</strong> is a leading IT solutions company dedicated to helping businesses embrace digital transformation. We specialize in providing innovative software development, web solutions, mobile applications, cloud services, and IT consultancy tailored to meet the unique needs of our clients. With a focus on reliability, innovation, and customer success, BIPEBD empowers organizations to grow smarter and operate more efficiently in today&rsquo;s fast-paced digital world.</p>', NULL, '2025-09-23 15:44:21'),
(7, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'company_name', 'BIPEBD', NULL, '2025-09-23 15:44:21'),
(8, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'points', 'BIPEBD একটি শীর্ষস্থানীয় আইটি সলিউশন কোম্পানি, যা ব্যবসাকে ডিজিটাল রূপান্তরে সহায়তা করে।||আমরা সফটওয়্যার, ওয়েব, মোবাইল, ক্লাউড এবং আইটি পরামর্শ প্রদান করি গ্রাহকের প্রয়োজন অনুযায়ী।||উদ্ভাবন ও নির্ভরযোগ্যতার মাধ্যমে আমরা প্রতিষ্ঠানগুলোকে আরও স্মার্ট ও দ্রুত উন্নতিতে সহায়তা করি।', NULL, '2025-09-23 15:44:21'),
(9, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'project_line', 'BIPEBD সফলভাবে এমন সব আইটি প্রজেক্ট সম্পন্ন করে যা ব্যবসার উন্নতি ও দক্ষতা বাড়ায়।', NULL, '2025-09-23 15:44:21'),
(10, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'about_us_title', 'BIPEBD – স্মার্ট আইটি সলিউশনের মাধ্যমে ব্যবসাকে সক্ষম করে তোলা', NULL, '2025-09-23 15:44:21'),
(11, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'short_details', 'BIPEBD একটি বিশ্বস্ত আইটি সলিউশন কোম্পানি, যা ব্যবসাকে ডিজিটাল রূপান্তরে সহায়তা করে। আমরা সফটওয়্যার, ওয়েব, মোবাইল, ক্লাউড এবং আইটি পরামর্শ প্রদান করি গ্রাহকের চাহিদা অনুযায়ী। উদ্ভাবন ও নির্ভরযোগ্যতার মাধ্যমে BIPEBD প্রতিষ্ঠানগুলোকে স্মার্ট এবং দ্রুত উন্নতিতে সক্ষম করে।', NULL, '2025-09-23 15:44:21'),
(12, 'App\\Models\\Admin\\AboutUs', 1, 'bn', 'details', '<p><strong>BIPEBD</strong> একটি শীর্ষস্থানীয় আইটি সলিউশন কোম্পানি, যা ব্যবসাগুলোকে ডিজিটাল রূপান্তরে সহায়তা করতে প্রতিশ্রুতিবদ্ধ। আমরা উদ্ভাবনী সফটওয়্যার ডেভেলপমেন্ট, ওয়েব সলিউশন, মোবাইল অ্যাপ্লিকেশন, ক্লাউড সার্ভিস এবং আইটি পরামর্শ প্রদান করি, যা আমাদের ক্লায়েন্টদের প্রয়োজন অনুযায়ী তৈরি করা হয়। নির্ভরযোগ্যতা, উদ্ভাবন এবং গ্রাহক সাফল্যের উপর গুরুত্ব দিয়ে, <strong>BIPEBD</strong> প্রতিষ্ঠানগুলোকে আরও স্মার্টভাবে বেড়ে উঠতে এবং আজকের দ্রুত পরিবর্তনশীল ডিজিটাল যুগে আরও দক্ষভাবে কাজ করতে সক্ষম করে।</p>', NULL, '2025-09-23 15:44:21'),
(13, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'company_name', 'BIPEBD', NULL, '2025-09-23 15:44:21'),
(14, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'points', 'BIPEBD एक अग्रणी आईटी सॉल्यूशन कंपनी है, जो व्यवसायों को डिजिटल परिवर्तन अपनाने में मदद करती है।||हम सॉफ़्टवेयर, वेब, मोबाइल, क्लाउड और आईटी परामर्श सेवाएँ ग्राहकों की ज़रूरतों के अनुसार प्रदान करते हैं।||नवाचार और भरोसे के साथ हम संगठनों को अधिक स्मार्ट और तेज़ी से बढ़ने में सक्षम बनाते हैं।', NULL, '2025-09-23 15:44:21'),
(15, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'project_line', 'BIPEBD सफलतापूर्वक ऐसे आईटी प्रोजेक्ट प्रदान करता है जो व्यवसाय की वृद्धि और दक्षता को बढ़ाते हैं।', NULL, '2025-09-23 15:44:21'),
(16, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'about_us_title', 'BIPEBD – स्मार्ट आईटी सॉल्यूशन्स के साथ व्यवसायों को सशक्त बनाना', NULL, '2025-09-23 15:44:21'),
(17, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'short_details', 'BIPEBD एक विश्वसनीय आईटी सॉल्यूशन कंपनी है, जो व्यवसायों को डिजिटल परिवर्तन में मदद करती है। हम सॉफ़्टवेयर, वेब, मोबाइल, क्लाउड और आईटी परामर्श सेवाएँ ग्राहकों की आवश्यकताओं के अनुसार प्रदान करते हैं। नवाचार और भरोसे के साथ, BIPEBD संगठनों को अधिक स्मार्ट और तेज़ी से बढ़ने में सक्षम बनाता है।', NULL, '2025-09-23 15:44:21'),
(18, 'App\\Models\\Admin\\AboutUs', 1, 'hi', 'details', '<p><strong>BIPEBD</strong> एक अग्रणी आईटी सॉल्यूशन कंपनी है, जो व्यवसायों को डिजिटल परिवर्तन अपनाने में मदद करने के लिए समर्पित है। हम नवीनतम सॉफ़्टवेयर विकास, वेब समाधान, मोबाइल एप्लिकेशन, क्लाउड सेवाएँ और आईटी परामर्श प्रदान करते हैं, जो हमारे ग्राहकों की विशेष आवश्यकताओं के अनुसार बनाए जाते हैं। भरोसेमंद सेवाएँ, नवाचार और ग्राहक सफलता पर ध्यान केंद्रित करके, <strong>BIPEBD</strong> संगठनों को अधिक स्मार्ट तरीके से बढ़ने और आज की तेज़ रफ़्तार डिजिटल दुनिया में अधिक कुशलता से काम करने में सक्षम बनाता है।</p>', NULL, '2025-09-23 15:44:21');

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
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_us`
--
ALTER TABLE `about_us`
  ADD CONSTRAINT `about_us_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `about_us_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `admins` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
