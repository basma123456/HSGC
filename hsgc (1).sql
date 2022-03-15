-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 10:47 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hsgc`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_company`
--

CREATE TABLE `about_company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_company_summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `left_first_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `left_second_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_vision_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `our_vision_summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `behind_hsgc_summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_with_us_summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_company`
--

INSERT INTO `about_company` (`id`, `about_company_summary`, `left_first_image`, `left_second_image`, `our_vision_image`, `our_vision_summary`, `behind_hsgc_summary`, `work_with_us_summary`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(43, '{\"en\":\"Why do we use it? It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"ar\":\"كياسي أرشيتيكتو بيتاي فيتاي ديكاتا سيونت أكسبليكابو. نيمو أنيم أبسام فوليوباتاتيم كيواي  فوليوبتاس سايت أسبيرناتشر أيوت أودايت أيوت فيوجايت, سيد كيواي كونسيكيونتشر ماجناي  دولارس أيوس كيواي راتاشن فوليوبتاتيم سيكيواي نيسكايونت. نيكيو بوررو كيوايسكيوم  ايست,كيواي دولوريم ايبسيوم كيوا دولار سايت أميت, كونسيكتيتيور,أديبايسكاي فيلايت, سيد  كيواي نون نيومكيوام ايايوس موداي تيمبورا انكايديونت يوت لابوري أيت دولار ماجنام  ألايكيوام كيوايرات فوليوبتاتيم. يوت اينايم أد مينيما فينيام, كيواس نوستريوم أكسيركايتاشيم\"}', '16466811761.jpg', '16466812192.jpg', '16466166643.jpg', '{\"en\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"ar\":\"كياسي أرشيتيكتو بيتاي فيتاي ديكاتا سيونت أكسبليكابو. نيمو أنيم أبسام فوليوباتاتيم كيواي  فوليوبتاس سايت أسبيرناتشر أيوت أودايت أيوت فيوجايت, سيد كيواي كونسيكيونتشر ماجناي  دولارس أيوس كيواي راتاشن فوليوبتاتيم سيكيواي نيسكايونت. نيكيو بوررو كيوايسكيوم  ايست,كيواي دولوريم ايبسيوم كيوا دولار سايت أميت, كونسيكتيتيور,أديبايسكاي فيلايت, سيد  كيواي نون نيومكيوام ايايوس موداي تيمبورا انكايديونت يوت لابوري أيت دولار ماجنام  ألايكيوام كيوايرات فوليوبتاتيم. يوت اينايم أد مينيما فينيام, كيواس نوستريوم أكسيركايتاشيم\"}', '{\"en\":\"orem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha\",\"ar\":\"كياسي أرشيتيكتو بيتاي فيتاي ديكاتا سيونت أكسبليكابو. نيمو أنيم أبسام فوليوباتاتيم كيواي  فوليوبتاس سايت أسبيرناتشر أيوت أودايت أيوت فيوجايت, سيد كيواي كونسيكيونتشر ماجناي  دولارس أيوس كيواي راتاشن فوليوبتاتيم سيكيواي نيسكايونت. نيكيو بوررو كيوايسكيوم  ايست,كيواي دولوريم ايبسيوم كيوا دولار سايت أميت, كونسيكتيتيور,أديبايسكاي فيلايت, سيد  كيواي نون نيومكيوام ايايوس موداي تيمبورا انكايديونت يوت لابوري أيت دولار ماجنام  ألايكيوام كيوايرات فوليوبتاتيم. يوت اينايم أد مينيما فينيام, كيواس نوستريوم أكسيركايتاشيم\"}', '{\"en\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"ar\":\"كياسي أرشيتيكتو بيتاي فيتاي ديكاتا سيونت أكسبليكابو. نيمو أنيم أبسام فوليوباتاتيم كيواي  فوليوبتاس سايت أسبيرناتشر أيوت أودايت أيوت فيوجايت, سيد كيواي كونسيكيونتشر ماجناي  دولارس أيوس كيواي راتاشن فوليوبتاتيم سيكيواي نيسكايونت. نيكيو بوررو كيوايسكيوم  ايست,كيواي دولوريم ايبسيوم كيوا دولار سايت أميت, كونسيكتيتيور,أديبايسكاي فيلايت, سيد  كيواي نون نيومكيوام ايايوس موداي تيمبورا انكايديونت يوت لابوري أيت دولار ماجنام  ألايكيوام كيوايرات فوليوبتاتيم. يوت اينايم أد مينيما فينيام, كيواس نوستريوم أكسيركايتاشيم\"}', 1, 1, '2022-03-06 23:31:04', '2022-03-07 17:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `carousels`
--

CREATE TABLE `carousels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `carousel_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousels`
--

INSERT INTO `carousels` (`id`, `carousel_name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"Slider Of Main Page\",\"ar\":\"\\u0627\\u0644\\u0635\\u0648\\u0631 \\u0627\\u0644\\u0645\\u062a\\u062d\\u0631\\u0643\\u0629 \\u0644\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629\"}', 1, '2022-03-03 14:07:27', '2022-03-03 20:25:24'),
(2, '{\"en\":\"Slider Of About Company\",\"ar\":\"\\u0627\\u0644\\u0635\\u0648\\u0631 \\u0627\\u0644\\u0645\\u062a\\u062d\\u0631\\u0643\\u0629 \\u0644\\u0635\\u0641\\u062d\\u0629 \\u0639\\u0646 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629\"}', 1, '2022-03-03 20:27:28', '2022-03-03 20:27:28'),
(3, '{\"en\":\"Slider Of News Page\",\"ar\":\"\\u0627\\u0644\\u0635\\u0648\\u0631 \\u0627\\u0644\\u0645\\u062a\\u062d\\u0631\\u0643\\u0629 \\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u0627\\u062e\\u0628\\u0627\\u0631\"}', 1, '2022-03-03 20:35:58', '2022-03-03 20:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_attributes`
--

CREATE TABLE `carousel_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `carousel_id` bigint(20) UNSIGNED NOT NULL,
  `carousel_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carousel_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carousel_image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `carousel_summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text1` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text2` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text3` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carousel_attributes`
--

INSERT INTO `carousel_attributes` (`id`, `carousel_id`, `carousel_title`, `carousel_image`, `carousel_image2`, `carousel_summary`, `text1`, `text2`, `text3`, `user_id`, `created_at`, `updated_at`) VALUES
(22, 1, '{\"en\":\".\"}', '1646447148.mp4', NULL, NULL, NULL, NULL, NULL, 1, '2022-03-05 00:25:48', '2022-03-05 00:25:48'),
(30, 2, '{\"en\":\"First Slide Label\",\"ar\":\"الشاشة النتحركة الاولي\"}', '16466169601.jpg', NULL, '{\"en\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, eum modi. Aperiam esse magnam reprehenderit perferendis. Atque autem neque nostrum?\",\"ar\":\"ضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', NULL, NULL, NULL, 1, '2022-03-06 23:36:00', '2022-03-06 23:36:00'),
(31, 2, '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"الشاشة المتحركة الثانية\"}', '16466171421.jpg', NULL, '{\"en\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, eum modi. Aperiam esse magnam reprehenderit perferendis. Atque autem neque nostrum?\",\"ar\":\"ضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', NULL, NULL, NULL, 1, '2022-03-06 23:39:02', '2022-03-06 23:39:02'),
(32, 2, '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"الشاشة المتحركة الثالثة\"}', '16466172201.jpg', NULL, '{\"en\":\"Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, eum modi. Aperiam esse magnam reprehenderit perferendis. Atque autem neque nostrum?\",\"ar\":\"ضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', NULL, NULL, NULL, 1, '2022-03-06 23:40:20', '2022-03-06 23:40:20'),
(33, 2, '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"الشاشة المتحركة الرابعة\"}', '16466173491.jpg', NULL, '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"ضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', NULL, NULL, NULL, 1, '2022-03-06 23:42:29', '2022-03-06 23:42:29'),
(36, 1, '{\"en\":\".\"}', '0', '1646648617.jpg', NULL, NULL, NULL, NULL, 1, '2022-03-07 08:23:37', '2022-03-07 08:23:37'),
(37, 1, '{\"en\":\".\"}', '0', '1646648692.jpg', NULL, NULL, NULL, NULL, 1, '2022-03-07 08:24:52', '2022-03-07 08:24:52'),
(38, 1, '{\"en\":\".\"}', '0', '1646648959.jpg', NULL, NULL, NULL, NULL, 1, '2022-03-07 08:29:19', '2022-03-07 08:29:19'),
(39, 3, '{\"en\":\"Some represe\",\"ar\":\"نتقن ثنب\"}', '16466535101.jpg', '16466535102.jpg', '{\"en\":\"laceholder content for the third slide Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint incidunt, voluptate delectus maxime tenetur aspernatur molestiae modi explicabo optio, hic quo elige\",\"ar\":\"ش مثنثم مثنمن ثمثم ثوزوثز ثزو\"}', '{\"ar\":null}', '{\"ar\":null}', '{\"ar\":null}', 1, '2022-03-07 09:45:10', '2022-03-07 09:46:42'),
(40, 3, '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"ةةة\"}', '16466537181.jpg', '16466537182.jpg', '{\"en\":\"orem Ipsum is simply dorem Ipsum is simply dummy text of the printing and typeummy text of the printing and type\",\"ar\":\"ضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"ضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"ضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"ضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', 1, '2022-03-07 09:48:38', '2022-03-07 15:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `trusted_client` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `title`, `image`, `summary`, `user_id`, `trusted_client`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"kkkkkkkkkkkkkkkkkk\",\"ar\":\"ب\"}', '1646659344.jpg', '{\"en\":\"jjjjjjjjjjjjjjjjjjjjjj\",\"ar\":\"ب\"}', 1, 1, NULL, '2022-03-07 11:40:00'),
(6, '{\"en\":\"basma\",\"ar\":\"بسمة\"}', '1646659368.jpg', '{\"en\":\"jjjjjjjjjjjjjjjjjjjjjj orem Ipsum is simply dummy text of the printing and type orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"تاتاتل بنبنبن مببم\"}', 1, 1, '2022-03-06 02:24:35', '2022-03-07 11:34:25'),
(10, '{\"en\":\"kkkkkkkkkkkkkkkkkk\",\"ar\":\"ال بل يقب اغ\"}', '1646660128.jpg', '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"بحق نهاية تكاليف بريطانيا، ما, إل\"}', 1, 0, '2022-03-07 11:35:28', '2022-03-07 11:35:28'),
(11, '{\"en\":\"kkkkkkkkkkkry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unkkkkkkk\",\"ar\":\"ةةلل تتry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown print\"}', '1646660170.jpg', '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"ضع في التنت تصاميم مطبوع\"}', 1, 1, '2022-03-07 11:36:10', '2022-03-07 15:11:46'),
(12, '{\"en\":\"ry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took\",\"ar\":\"ry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took\"}', '1646660386.jpg', '{\"en\":\"trusted_client ry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unkno\",\"ar\":\"فقفف\"}', 1, 1, '2022-03-07 11:39:46', '2022-03-07 14:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `constructions`
--

CREATE TABLE `constructions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `constructions`
--

INSERT INTO `constructions` (`id`, `title`, `image`, `summary`, `user_id`, `client_id`, `status`, `created_at`, `updated_at`) VALUES
(4, '{\"en\":\"kkkkkkkkkkkkkkkkkk\",\"ar\":\"\\u0649\\u0649\\u0649\\u0649\"}', '1646618760.jpg', '{\"en\":\"jj\",\"ar\":\"\\u0649\\u0649\\u0649\\u0649\"}', 1, 1, 1, '2022-02-27 23:34:38', '2022-03-07 00:06:00'),
(6, '{\"en\":\"kkkkkkkkkkkkkkkkkk\",\"ar\":\"\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\\u062a\"}', '1646618750.jpg', '{\"en\":\"jjjjjjjjjjjjjjjjjjjjjj\",\"ar\":\"\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\\u0627\"}', 1, 1, 1, '2022-03-01 15:33:10', '2022-03-07 00:05:51'),
(7, '{\"en\":\"jjjjjjjjjjjjjjjjjj\",\"ar\":\"\\u0627\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\\u0644\"}', '1646618740.jpg', '{\"en\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum\",\"ar\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum\"}', 1, 1, 1, '2022-03-01 15:33:44', '2022-03-07 00:05:40'),
(8, '{\"en\":\"kkkkkkkkkkkkkkkkkk\",\"ar\":\"\\u0633\\u0633\\u0633\\u0633\\u0633\\u0633\\u0633\\u0633\\u0633\\u0633\\u0633\"}', '1646618730.jpg', '{\"en\":\"jj\",\"ar\":\"\\u062b\\u062b\\u062b\\u062b\\u062b\\u062b\\u062b\\u062b\\u062b\\u062b\\u062b\\u062b\\u062b\\u062b\"}', 1, 1, 1, '2022-03-01 15:34:28', '2022-03-07 00:07:07'),
(9, '{\"en\":\"kkkkkkkkkkkkkkkkkk\",\"ar\":\"ةةةةةةةةةةةةةةةةةةةة\"}', '1646618720.jpg', '{\"en\":\"jjjjjjjjjjjjjjjjjjjjjj\",\"ar\":\"ضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', 1, 1, 1, '2022-03-04 01:29:21', '2022-03-07 00:05:20');

-- --------------------------------------------------------

--
-- Table structure for table `electrics`
--

CREATE TABLE `electrics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `electrics`
--

INSERT INTO `electrics` (`id`, `title`, `image`, `summary`, `user_id`, `client_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"electric1\",\"ar\":\"\\u0627\\u0644\\u064a\\u0643\\u062a\\u0631\\u064a\\u0643 1m\"}', '1646652277.jpg', '{\"en\":\"electric summary 1\",\"ar\":\"\\u0633\\u0627\\u0645\\u0627\\u0624\\u0633 \\u0627\\u064a\\u0643\\u062a\\u0631\\u064a\\u0643\"}', 1, 1, 1, '2022-03-01 03:20:12', '2022-03-07 09:24:37'),
(8, '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"التلتنبن\"}', '1646652316.jpg', '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"بنبنبب صمثنمصنم مثصم مثنمضم\"}', 1, 6, 1, '2022-03-07 09:25:16', '2022-03-07 09:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `image` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `resume` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_name`, `email`, `title`, `phone_number`, `address`, `image`, `summary`, `resume`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'basma employee', 'ggggm@email.com', 'n', '01777777777', 'hjkk kkkkk', '1646439964.jpg', 'mm', '1646439152.jpg\r\n', NULL, 0, '2022-03-04 22:26:04', '2022-03-04 22:26:04'),
(4, 'basmannn nnnnnnnnnnnnn', 'gfffffffffffffffgg@email.com', 'n', '01777777777', 'n', '1646441285.jpg', 'm', '1646441285.docx', 1, 1, '2022-03-04 22:48:05', '2022-03-04 23:05:10');

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
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `summary` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer`
--

INSERT INTO `footer` (`id`, `summary`, `company_email`, `company_phone`, `company_address`, `facebook_link`, `instagram_link`, `twitter_link`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '{\"en\":\"d it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 19\",\"ar\":\"بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال .. لقد زرت هذه الصفحة مرات عديدة. آخر زيارة: 07\\/03\\/22\"}', 'hhj@email.com', '404004', '{\"en\":\"d it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 19\",\"ar\":\"بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال .. لقد زرت هذه الصفحة مرات عديدة. آخر زيارة: 07\\/03\\/22بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال .. لقد زرت هذه ال\"}', 'https://ar-ar.facebook.com/', 'https://ar-ar.facebook.com/', 'https://ar-ar.facebook.com/', 1, '2022-03-07 16:20:35', '2022-03-07 16:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `group_of_news`
--

CREATE TABLE `group_of_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group_of_news`
--

INSERT INTO `group_of_news` (`id`, `title`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"first group\",\"ar\":\"الجروب الاول\"}', 1, '2022-03-05 11:13:55', '2022-03-05 11:13:55'),
(4, '{\"en\":\"updated group\",\"ar\":\"الجروب الاول المعدل\"}', 1, '2022-03-05 11:33:41', '2022-03-07 11:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `landscapes`
--

CREATE TABLE `landscapes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `at_front_page` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landscapes`
--

INSERT INTO `landscapes` (`id`, `title`, `image`, `summary`, `user_id`, `client_id`, `status`, `at_front_page`, `created_at`, `updated_at`) VALUES
(8, '{\"en\":\"Lorem ipsum dolor sit amet consectetur.\",\"ar\":\"ل ألماني بقيادة والكوري, بلا أجزاء مواقعها بل. عدد عقبت\"}', '1646618512.jpg', '{\"en\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta, aliquam quos nobis blanditiis ipsam ullam harum praesentium accusantium? Suscipit, molestiae! Officia incidunt inventore blanditiis quibusdam consequatur dicta alias fugiat ut.\",\"ar\":\"بحق نهاية تكاليف بريطانيا، ما, إلى أن النزاع الألماني. حرب غزوه أصقاع القوقازية تم, حتى كل ألماني بقيادة والكوري, بلا أجزاء مواقعها بل. عدد عقبت بالسيطرة عل. دول معقل لهذه أسابيع. أن وقد وباءت المجتمع, هجوم وبغطاء ذلك هو. تعديل فهرست.\\\"\"}', 1, 6, 1, 1, '2022-03-07 00:01:52', '2022-03-07 00:01:52'),
(9, '{\"en\":\"Lorem ipsum dolor sit amet consectetur.\",\"ar\":\"ل ألماني بقيادة والكوري, بلا أجزاء مواقعها بل. عدد عقبت\"}', '1646618565.jpg', '{\"en\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta, aliquam quos nobis blanditiis ipsam ullam harum praesentium accusantium? Suscipit, molestiae! Officia incidunt inventore blanditiis quibusdam consequatur dicta alias fugiat ut.\",\"ar\":\"بحق نهاية تكاليف بريطانيا، ما, إلى أن النزاع الألماني. حرب غزوه أصقاع القوقازية تم, حتى كل ألماني بقيادة والكوري, بلا أجزاء مواقعها بل. عدد عقبت بالسيطرة عل. دول معقل لهذه أسابيع. أن وقد وباءت المجتمع, هجوم وبغطاء ذلك هو. تعديل فهرست.\\\"\"}', 1, 6, 1, 0, '2022-03-07 00:02:45', '2022-03-07 00:02:45'),
(10, '{\"en\":\"Lorem ipsum dolor sit amet consectetur.\",\"ar\":\"، فعل. الا مع قِبل أمدها جديداً. بوابة الضغوط أن\"}', '1646618645.jpg', '{\"en\":\"Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta, aliquam quos nobis blanditiis ipsam ullam harum praesentium accusantium? Suscipit, molestiae! Officia incidunt inventore blanditiis quibusdam consequatur dicta alias fugiat ut.\",\"ar\":\"بحق نهاية تكاليف بريطانيا، ما, إلى أن النزاع الألماني. حرب غزوه أصقاع القوقازية تم, حتى كل ألماني بقيادة والكوري, بلا أجزاء مواقعها بل. عدد عقبت بالسيطرة عل. دول معقل لهذه أسابيع. أن وقد وباءت المجتمع, هجوم وبغطاء ذلك هو. تعديل فهرست.\\\"\"}', 1, 6, 1, 0, '2022-03-07 00:04:06', '2022-03-07 00:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `title`, `summary`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '{\"en\":\"basma\",\"ar\":\"بسمة\"}', '{\"en\":\"manager\",\"ar\":\"مدير\"}', '{\"en\":\"summarry 1\",\"ar\":\"ضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', 1, '2022-03-05 15:47:13', '2022-03-05 15:47:13'),
(5, '{\"en\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\",\"ar\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\"}', '{\"en\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\",\"ar\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\"}', '{\"en\":\"Lorem vLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s\",\"ar\":\"vLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'\"}', 1, '2022-03-07 14:04:35', '2022-03-07 14:10:12');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_02_22_011039_create_employees_table', 2),
(5, '2022_02_22_020336_create_clients_table', 3),
(6, '2022_02_22_013332_create_landscapes_table', 4),
(7, '2022_02_22_014431_create_constructions_table', 4),
(8, '2022_02_22_014855_create_roads_table', 4),
(9, '2022_02_22_015323_create_electrics_table', 4),
(10, '2022_02_22_015553_create_projects_table', 4),
(11, '2022_02_22_021725_create_news_table', 4),
(12, '2022_02_22_022519_create_footers_table', 4),
(13, '2022_02_22_023606_create_carousels_table', 4),
(14, '2022_02_22_024249_create_carousel_attributes_table', 4),
(15, '2022_02_22_024943_create_about_companies_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(700) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_of_news_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `image`, `summary`, `group_of_news_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, '{\"en\":\"cccccccccccccc\",\"ar\":\"الالالا\"}', '1646653869.jpg', '{\"en\":\"ccccccccccccccc\",\"ar\":\"لالالالا\"}', 1, 1, '2022-03-05 14:06:20', '2022-03-07 09:51:09'),
(4, '{\"en\":\"wwwwwwwwwwwww\",\"ar\":\"ببببببببببب\"}', '1646653856.jpg', '{\"en\":\"wwwwwwwwww\",\"ar\":\"بببببببببببب\"}', 1, 1, '2022-03-05 14:06:48', '2022-03-07 09:50:56'),
(5, '{\"en\":\"kkkkkkkkkkkkkkkkkk\",\"ar\":\"اااااااااااااااااااااااااا\"}', '1646653844.jpg', '{\"en\":\"jjjjjjjjjjjjjjjjjjjjjj\",\"ar\":\"ثثثثثثثثثثثثثثثثثثثثثثثثثثثثثثثثثثثثثث\"}', 1, 1, '2022-03-05 14:07:13', '2022-03-07 09:50:44'),
(7, '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"ىى\"}', '1646653816.jpg', '{\"en\":\"bn\",\"ar\":\"بن\"}', 1, 1, '2022-03-05 14:08:45', '2022-03-07 09:50:16'),
(9, '{\"en\":\"f\",\"ar\":\"ب\"}', '1646653784.jpg', '{\"en\":\"has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it\",\"ar\":\"ب\"}', 1, 1, '2022-03-06 12:25:12', '2022-03-07 10:02:20'),
(10, '{\"en\":\"orem ry. Lorem Ipsum has been the industry\'s standard dummy text ever sinceis simply dummy text of the printing and type\",\"ar\":\"تصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل\"}', '1646654469.jpg', '{\"en\":\"orem ry. Lorem Ipsum horem ry. Lorem Ipsum has been the industry\'s standard dummy text ever sinceis simply dummy text of the printing and typorem ry. Lorem Ipsum has been the industry\'s standard dummy text ever sinceis sieas been the industry\'s standard dummy text ever sinceis simply dummy text of the printing and type\",\"ar\":\"ضع في التصاميم لتعرضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص اء كانت تصاميم مطبوعواء كانت تصاميم مطبوعض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', 1, 1, '2022-03-07 09:55:08', '2022-03-07 17:49:55'),
(11, '{\"en\":\"kkkkkkkkkkkkkkkkkk\",\"ar\":\"بببببببببببببببببب\"}', '1646658543.jpg', '{\"en\":\"jjjjjjjjjjjjjjjjjjjjjj\",\"ar\":\"بببببببببببببببب\"}', 4, 1, '2022-03-07 11:09:03', '2022-03-07 11:09:03'),
(12, '{\"en\":\"kkkkkkkkkkkkkkkkkk\",\"ar\":\"بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال .. لقد زرت هذه الصفحة مرات عديدة. آخر زيارة: 07\\/03\\/22\"}', '1646658568.jpg', '{\"ar\":\"بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال .. لقد زرت هذه الصفحة مرات عديدة. آخر زيارة: 07\\/03\\/22 بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال .. لقد زرت هذه الصفحة مرات عديدة. آخر زيارة: 07\\/03\\/22 بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال .. لقد زرت هذه الصفحة مرات عديدة. آخر زيارة: 07\\/03\\/22\",\"en\":\"It is a long established fact that a reader will be distracted by the readable content of a page when lookin', 4, 1, '2022-03-07 11:09:28', '2022-03-07 16:05:11');

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `landscape_id` bigint(20) UNSIGNED NOT NULL,
  `construction_id` bigint(20) UNSIGNED NOT NULL,
  `road_id` bigint(20) UNSIGNED NOT NULL,
  `electric_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roads`
--

CREATE TABLE `roads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roads`
--

INSERT INTO `roads` (`id`, `title`, `image`, `summary`, `user_id`, `client_id`, `status`, `created_at`, `updated_at`) VALUES
(4, '{\"en\":\"rem ipsum dolor sit am\",\"ar\":\"ل أمدها جديداً. بوابة الضغوط أ\"}', '1646618966.jpg', '{\"en\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.\",\"ar\":\"بحق نهاية تكاليف بريطانيا، ما, إلى أن النزاع الألماني. حرب غزوه أصقاع القوقازية تم, حتى كل ألماني بقيادة والكوري, بلا أجزاء مواقعها بل. عدد عقبت بالسيطرة عل. دول معقل لهذه أسابيع. أن وقد وباءت المجتمع, هجوم وبغطاء ذلك هو. تعديل فهرست.\\\"\"}', 1, 1, 1, '2022-03-02 13:02:51', '2022-03-07 00:09:26'),
(6, '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"المجتمع, هجوم وبغطاء ذلك\"}', '1646619027.jpg', '{\"en\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.\",\"ar\":\"بحق نهاية تكاليف بريطانيا، ما, إلى أن النزاع الألماني. حرب غزوه أصقاع القوقازية تم, حتى كل ألماني بقيادة والكوري, بلا أجزاء مواقعها بل. عدد عقبت بالسيطرة عل. دول معقل لهذه أسابيع. أن وقد وباءت المجتمع, هجوم وبغطاء ذلك هو. تعديل فهرست.\\\"\"}', 1, NULL, 1, '2022-03-07 00:10:27', '2022-03-07 00:10:27'),
(7, '{\"en\":\"mod tempor incidid\",\"ar\":\"حق نهاية تكاليف بريطان\"}', '1646619077.jpg', '{\"en\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.\",\"ar\":\"بحق نهاية تكاليف بريطانيا، ما, إلى أن النزاع الألماني. حرب غزوه أصقاع القوقازية تم, حتى كل ألماني بقيادة والكوري, بلا أجزاء مواقعها بل. عدد عقبت بالسيطرة عل. دول معقل لهذه أسابيع. أن وقد وباءت المجتمع, هجوم وبغطاء ذلك هو. تعديل فهرست.\\\"\"}', 1, 6, 1, '2022-03-07 00:11:17', '2022-03-07 00:11:17'),
(8, '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"ق نهاية تكاليف بريطانيا، م\"}', '1646619133.jpg', '{\"en\":\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.\",\"ar\":\"بحق نهاية تكاليف بريطانيا، ما, إلى أن النزاع الألماني. حرب غزوه أصقاع القوقازية تم, حتى كل ألماني بقيادة والكوري, بلا أجزاء مواقعها بل. عدد عقبت بالسيطرة عل. دول معقل لهذه أسابيع. أن وقد وباءت المجتمع, هجوم وبغطاء ذلك هو. تعديل فهرست.\\\"\"}', 1, NULL, 1, '2022-03-07 00:12:13', '2022-03-07 00:12:13'),
(9, '{\"en\":\"orem Ipsum is simply dummy text of the printing and type\",\"ar\":\"في التصاميم لتعرض على الع\"}', '1646619408.jpg', '{\"en\":\"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\",\"ar\":\"ضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوع\"}', 1, 6, 0, '2022-03-07 00:16:48', '2022-03-07 00:17:04');

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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `title`, `summary`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'basma basma', 'ggg@email.com', NULL, '$2y$10$XwIIwYA3R29CmymCNbaV7eRfbeSZe2fh/Mrn3Dox8BFtLMO3Kgvkm', 'manager', 'orem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha\r\n\r\n', NULL, '2022-02-22 22:46:31', '2022-02-22 22:46:31'),
(2, 'basma2 basma2', 'ggg@email.com2', NULL, '$2y$10$sKSoUHhNNchlhdSHvTJXUe5H0CXOjU1KtwjdQHpaSlrrIHH9ylds2', 'any title', 'orem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha\r\n\r\n', NULL, '2022-02-23 20:40:57', '2022-02-23 20:40:57'),
(3, 'mohamed abdel hameed', 'ddd@email.com', NULL, '$2y$10$vyepIBsEPWhs9PAJtGByluL51K.5u1.7c8nfk6FHUw1sDsldmqxIe', 'Manager', 'orem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha', NULL, '2022-03-01 22:42:53', '2022-03-01 22:42:53'),
(4, 'samy abdel reheem', 'fff@email.com', NULL, '$2y$10$N1KMa8JCkiF3EvAwpG1Q7u9gh/jJv5aS2G.u6hS26De1OnU/4VzZG', 'sales manager', 'orem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It ha', NULL, '2022-03-01 22:44:49', '2022-03-01 22:44:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_company`
--
ALTER TABLE `about_company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_company_user_id_foreign` (`user_id`);

--
-- Indexes for table `carousels`
--
ALTER TABLE `carousels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `carousel_attributes`
--
ALTER TABLE `carousel_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carousel_attributes_carousel_id_foreign` (`carousel_id`),
  ADD KEY `carousel_attributes_user_id_foreign` (`user_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`user_id`);

--
-- Indexes for table `constructions`
--
ALTER TABLE `constructions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `constructions_ibfk_1` (`client_id`),
  ADD KEY `constructions_user_id_foreign` (`user_id`);

--
-- Indexes for table `electrics`
--
ALTER TABLE `electrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `electrics_user_id_foreign` (`user_id`),
  ADD KEY `electrics_client_id_foreign` (`client_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `footer_user_id_foreign` (`user_id`);

--
-- Indexes for table `group_of_news`
--
ALTER TABLE `group_of_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `landscapes`
--
ALTER TABLE `landscapes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landscapes_user_id_foreign` (`user_id`),
  ADD KEY `landscapes_client_id_foreign` (`client_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`),
  ADD KEY `group_of_news` (`group_of_news_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_landscape_id_foreign` (`landscape_id`),
  ADD KEY `projects_construction_id_foreign` (`construction_id`),
  ADD KEY `projects_road_id_foreign` (`road_id`),
  ADD KEY `projects_electric_id_foreign` (`electric_id`),
  ADD KEY `projects_user_id_foreign` (`user_id`),
  ADD KEY `projects_client_id_foreign` (`client_id`);

--
-- Indexes for table `roads`
--
ALTER TABLE `roads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roads_user_id_foreign` (`user_id`),
  ADD KEY `roads_client_id_foreign` (`client_id`);

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
-- AUTO_INCREMENT for table `about_company`
--
ALTER TABLE `about_company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `carousels`
--
ALTER TABLE `carousels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carousel_attributes`
--
ALTER TABLE `carousel_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `constructions`
--
ALTER TABLE `constructions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `electrics`
--
ALTER TABLE `electrics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_of_news`
--
ALTER TABLE `group_of_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `landscapes`
--
ALTER TABLE `landscapes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roads`
--
ALTER TABLE `roads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_company`
--
ALTER TABLE `about_company`
  ADD CONSTRAINT `about_company_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carousels`
--
ALTER TABLE `carousels`
  ADD CONSTRAINT `carousels_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carousel_attributes`
--
ALTER TABLE `carousel_attributes`
  ADD CONSTRAINT `carousel_attributes_carousel_id_foreign` FOREIGN KEY (`carousel_id`) REFERENCES `carousels` (`id`),
  ADD CONSTRAINT `carousel_attributes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `constructions`
--
ALTER TABLE `constructions`
  ADD CONSTRAINT `constructions_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `constructions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `electrics`
--
ALTER TABLE `electrics`
  ADD CONSTRAINT `electrics_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `electrics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `footer`
--
ALTER TABLE `footer`
  ADD CONSTRAINT `footer_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `group_of_news`
--
ALTER TABLE `group_of_news`
  ADD CONSTRAINT `group_of_news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `landscapes`
--
ALTER TABLE `landscapes`
  ADD CONSTRAINT `landscapes_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `landscapes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `managers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`group_of_news_id`) REFERENCES `group_of_news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `projects_construction_id_foreign` FOREIGN KEY (`construction_id`) REFERENCES `constructions` (`id`),
  ADD CONSTRAINT `projects_electric_id_foreign` FOREIGN KEY (`electric_id`) REFERENCES `electrics` (`id`),
  ADD CONSTRAINT `projects_landscape_id_foreign` FOREIGN KEY (`landscape_id`) REFERENCES `landscapes` (`id`),
  ADD CONSTRAINT `projects_road_id_foreign` FOREIGN KEY (`road_id`) REFERENCES `roads` (`id`),
  ADD CONSTRAINT `projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `roads`
--
ALTER TABLE `roads`
  ADD CONSTRAINT `roads_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `roads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
