-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 03:57 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `request_date` date NOT NULL,
  `request_time` time NOT NULL,
  `timezone` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `requested_by` int(10) UNSIGNED DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `request_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `title`, `request_date`, `request_time`, `timezone`, `remark`, `location`, `status`, `requested_by`, `created_by`, `created_at`, `updated_by`, `updated_at`, `request_id`) VALUES
(4, 'Title 2', '2022-11-24', '23:40:00', 'Pacific/Midway', 'I want have a disccusionon blabla', 'Colombo ss', 0, NULL, 3, '2022-11-23 19:40:55', NULL, '2022-11-23 20:48:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_participants`
--

CREATE TABLE `appointment_participants` (
  `id` int(10) UNSIGNED NOT NULL,
  `appointment_id` int(10) UNSIGNED NOT NULL,
  `participant_id` int(10) UNSIGNED NOT NULL,
  `type` char(1) NOT NULL,
  `added_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_participants`
--

INSERT INTO `appointment_participants` (`id`, `appointment_id`, `participant_id`, `type`, `added_by`) VALUES
(13, 4, 1, 'u', 3),
(14, 4, 5, 'u', 3),
(15, 4, 2, 'c', 3),
(16, 4, 4, 'c', 3),
(19, 4, 3, 'l', 3);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_requests`
--

CREATE TABLE `appointment_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `request_date` date NOT NULL,
  `request_time` time NOT NULL,
  `timezone` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment_requests`
--

INSERT INTO `appointment_requests` (`id`, `title`, `request_date`, `request_time`, `timezone`, `remark`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, 'Title 1', '2022-11-17', '12:40:00', 'Pacific/Midway', 'I want have a disccusionon blabla', 2, 2, '2022-11-22 14:43:17', NULL, '2022-11-23 16:59:06'),
(4, 'Title 1', '2022-11-23', '12:40:00', 'Pacific/Midway', 'I want have a disccusionon blabla', 0, 2, '2022-11-22 16:35:25', NULL, '2022-11-22 16:35:25'),
(5, 'Title 1 sdd', '2022-11-24', '23:40:00', 'Pacific/Midway', 'I want have a disccusionon blabla', 1, 2, '2022-11-22 19:14:11', NULL, '2022-11-23 18:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner_type_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `channel` enum('WEB','MOBILE') COLLATE utf8_unicode_ci DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banner_types`
--

CREATE TABLE `banner_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image_width` smallint(6) NOT NULL,
  `image_height` smallint(6) NOT NULL,
  `page` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `channel` char(1) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banner_types`
--

INSERT INTO `banner_types` (`id`, `name`, `image_width`, `image_height`, `page`, `channel`) VALUES
(1, 'Web Main Slider', 1920, 1080, 'HOME', 'w'),
(2, 'Web Category Banner', 1860, 2400, 'CATEGORY', 'w'),
(3, 'Mobile Main Slider', 1280, 1500, 'HOME', 'm'),
(4, 'Mobile Home Banner', 1242, 683, 'HOME', 'm'),
(5, 'Mobile Category  Banner', 1122, 390, 'CATEGORY', 'm'),
(6, 'Web Welcome Banner', 640, 300, 'HOME', 'w'),
(7, 'Brand Logo', 400, 100, 'BRAND', 'w'),
(8, 'Web Sub Category Banner', 100, 100, 'SUB_CATEGORY', 'w'),
(9, 'Web Product Featured Image', 1800, 1360, 'PRODUCT_FEATURED', 'w'),
(10, 'Web Product Gallery Image', 1000, 1273, 'PRODUCT_GALLERY', 'w');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `blog_text` text DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `view_count` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `blog_text`, `description`, `status`, `view_count`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Blog 1', 'Blog 1 Blog 1 Blog 1 Blog 1 Blog 1', 'Blog 1 description', 0, 4, '', '', '2022-11-21 02:49:03', '2022-11-21 12:42:11'),
(2, 'Blog 2', 'Blog 2 Blog 2 Blog 2 Blog 2 Blog 2', 'Blog 2 description', 0, 10, '', '', '2022-11-21 02:58:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `inactive` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `type`, `title`, `description`, `status`, `inactive`, `created_by`, `created_at`, `updated_at`) VALUES
(14, '1', 'Bank Case 01', 'THis is a test basnk case 1', 3, 1, 1, '2022-10-15 23:03:27', '2022-10-18 14:50:10'),
(15, '1', 'Bank Case 01', 'THis is a test basnk case', 1, 0, 1, '2022-10-18 14:10:42', '2022-10-18 14:10:42'),
(16, 'Test case 2', 'Case Title  2', 'Case description *', 0, 0, 1, '2022-11-13 13:50:51', '2022-11-13 13:50:51'),
(17, 'Case description *', 'Case description *', 'Case description *', 0, 0, 1, '2022-11-13 14:30:03', '2022-11-13 14:30:03'),
(19, '1', 'Test ddaf', 'sfsdf', 0, 0, 4, '2022-12-06 17:18:40', '2022-12-06 11:02:46'),
(20, '1', 'Test ddaf', 'sfsdf', 0, 0, 4, '2022-12-06 11:18:53', '2022-12-06 11:18:53'),
(21, '1', 'Test ddaf', 'sfsdf', 0, 0, 4, '2022-12-06 11:23:21', '2022-12-06 11:23:21'),
(22, '1', 'Test ddaf', 'sfsdf', 0, 0, 4, '2022-12-06 11:31:18', '2022-12-06 11:31:18'),
(24, '1', 'Test ddaf', 'sfsdf', 0, 0, 4, '2022-12-06 13:41:45', '2022-12-06 13:41:45'),
(25, '1', 'Test ddaf', 'sfsdf', 0, 0, 4, '2022-12-06 20:40:39', '2022-12-06 20:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `case_clients`
--

CREATE TABLE `case_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `case_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `is_favorite` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_clients`
--

INSERT INTO `case_clients` (`id`, `case_id`, `customer_id`, `is_favorite`, `created_at`, `updated_at`) VALUES
(3, 14, 2, 0, '2022-10-15 23:03:27', '2022-11-02 22:53:02'),
(5, 15, 2, 0, '2022-10-18 14:10:42', '2022-10-18 14:10:42'),
(6, 15, 3, 0, '2022-10-18 14:10:42', '2022-10-18 14:10:42'),
(7, 16, 2, 0, '2022-11-13 13:50:51', '2022-11-13 13:50:51'),
(8, 16, 3, 0, '2022-11-13 13:50:51', '2022-11-13 13:50:51'),
(9, 16, 4, 0, '2022-11-13 13:50:51', '2022-11-13 13:50:51'),
(10, 17, 2, 0, '2022-11-13 14:30:03', '2022-11-13 14:30:03'),
(11, 19, 3, 0, '2022-12-06 11:02:46', '2022-12-06 11:02:46'),
(12, 19, 4, 0, '2022-12-06 11:02:46', '2022-12-06 11:02:46'),
(13, 20, 3, 0, '2022-12-06 11:18:53', '2022-12-06 11:18:53'),
(14, 21, 2, 0, '2022-12-06 11:23:21', '2022-12-06 11:23:21'),
(15, 21, 3, 0, '2022-12-06 11:23:21', '2022-12-06 11:23:21'),
(16, 22, 3, 0, '2022-12-06 11:31:18', '2022-12-06 11:31:18'),
(17, 22, 4, 0, '2022-12-06 11:31:18', '2022-12-06 11:31:18'),
(18, 24, 2, 0, '2022-12-06 13:41:45', '2022-12-06 13:41:45'),
(19, 25, 4, 0, '2022-12-06 20:40:39', '2022-12-06 20:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `case_documents`
--

CREATE TABLE `case_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `case_id` int(10) UNSIGNED NOT NULL,
  `document_name` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_documents`
--

INSERT INTO `case_documents` (`id`, `case_id`, `document_name`, `created_at`, `updated_at`) VALUES
(1, 14, '1670381763.jpg', '2022-12-06 20:56:03', '2022-12-06 20:56:03');

-- --------------------------------------------------------

--
-- Table structure for table `case_lawyers`
--

CREATE TABLE `case_lawyers` (
  `id` int(10) UNSIGNED NOT NULL,
  `case_id` int(10) UNSIGNED NOT NULL,
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `is_favorite` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_lawyers`
--

INSERT INTO `case_lawyers` (`id`, `case_id`, `lawyer_id`, `is_favorite`, `created_at`, `updated_at`) VALUES
(5, 14, 3, 0, '2022-10-15 23:03:27', '2022-10-15 23:03:27'),
(6, 15, 3, 0, '2022-10-18 14:10:42', '2022-10-18 14:10:42'),
(7, 16, 3, 0, '2022-11-13 13:50:51', '2022-11-13 13:50:51'),
(8, 17, 3, 0, '2022-11-13 14:30:03', '2022-11-13 14:30:03'),
(10, 19, 1, 0, '2022-12-06 11:02:46', '2022-12-06 11:02:46'),
(11, 20, 1, 0, '2022-12-06 11:18:53', '2022-12-06 11:18:53'),
(12, 21, 1, 0, '2022-12-06 11:23:21', '2022-12-06 11:23:21'),
(13, 21, 3, 0, '2022-12-06 11:23:21', '2022-12-06 11:23:21'),
(14, 22, 1, 0, '2022-12-06 11:31:18', '2022-12-06 11:31:18'),
(15, 24, 1, 0, '2022-12-06 13:41:45', '2022-12-06 13:41:45'),
(16, 25, 1, 0, '2022-12-06 20:40:39', '2022-12-06 20:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `case_milestones`
--

CREATE TABLE `case_milestones` (
  `id` int(10) UNSIGNED NOT NULL,
  `mpl_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `target_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_milestones`
--

INSERT INTO `case_milestones` (`id`, `mpl_id`, `title`, `description`, `target_date`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 14, 'Milestone Title', 'Case description', '2022-10-24', 3, 1, '2022-10-22 20:59:03', '2022-10-23 15:51:26'),
(2, 14, 'Milestone Title 5', 'Case description testiun', '2022-10-27', 2, 1, '2022-10-22 21:00:18', '2022-10-23 18:01:24'),
(21, 14, 'Milestone test 2', 'Milestone Title Description', '2022-12-06', 0, 4, '2022-12-06 08:57:34', '2022-12-06 08:57:34'),
(22, 14, 'sdfassdf', 'sdfsdaf', '2022-12-07', 0, 4, '2022-12-06 09:12:31', '2022-12-06 09:12:31'),
(23, 14, 'ffdas', 'sfsadf', '2022-12-06', 0, 4, '2022-12-06 09:26:46', '2022-12-06 09:26:46'),
(24, 14, 'ffdas', 'DD', '2022-12-08', 0, 4, '2022-12-06 09:46:48', '2022-12-06 09:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `case_payments`
--

CREATE TABLE `case_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `case_id` int(8) NOT NULL DEFAULT 0,
  `invoice_number` bigint(22) DEFAULT 0,
  `payment_by` varchar(50) NOT NULL,
  `remark` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `created_by` int(8) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_payments`
--

INSERT INTO `case_payments` (`id`, `case_id`, `invoice_number`, `payment_by`, `remark`, `amount`, `date`, `inactive`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 14, NULL, 'TEst', 0, 500, '2022-12-06', 0, 0, 4, '2022-12-06 16:03:30', '2022-12-06 16:03:30'),
(2, 0, NULL, 'fsdf', 0, 5000, NULL, 0, 0, 4, '2022-12-06 16:14:19', '2022-12-06 16:14:19'),
(3, 0, NULL, 'Shahin islam', 0, 500, '2022-12-06', 0, 1, 4, '2022-12-06 16:15:39', '2022-12-06 16:15:39'),
(4, 0, NULL, 'Test', 0, 1000, '2022-12-06', 0, 1, 4, '2022-12-06 16:20:32', '2022-12-06 16:20:32'),
(5, 0, NULL, 'TEst', 0, 500, '2022-12-07', 0, 1, 4, '2022-12-06 16:22:10', '2022-12-06 16:22:10'),
(6, 0, NULL, 'Test', 0, 500, '2022-12-07', 0, 1, 4, '2022-12-06 16:22:57', '2022-12-06 16:22:57'),
(7, 0, NULL, 'dfsgd', 0, 5000, '2022-12-06', 0, 0, 4, '2022-12-06 16:24:15', '2022-12-06 16:24:15'),
(8, 0, NULL, 'sdfas', 0, 200, '2022-12-07', 0, 0, 4, '2022-12-06 16:26:00', '2022-12-06 16:26:00'),
(9, 0, 20221206052612, 'test', 0, 500, '2022-12-07', 0, 3, 4, '2022-12-06 17:26:45', '2022-12-06 17:26:45'),
(10, 0, 20221206053012, 'fafa', 0, 1000, '2022-12-06', 0, 0, 4, '2022-12-06 17:30:23', '2022-12-06 17:30:23'),
(11, 0, 20221206053112, 'ffda', 0, 1300, '2022-12-06', 0, 3, 4, '2022-12-06 17:31:43', '2022-12-06 17:31:43'),
(12, 22, 20221206053212, 'Test', 0, 1300, '2022-12-06', 0, 0, 4, '2022-12-06 17:32:51', '2022-12-06 17:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `case_types`
--

CREATE TABLE `case_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `inactive` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `case_types`
--

INSERT INTO `case_types` (`id`, `name`, `inactive`, `created_at`, `updated_at`) VALUES
(1, 'Bankruptcy', 0, '2022-12-06 14:14:50', NULL),
(2, 'Civil', 0, '2022-12-06 14:14:50', NULL),
(4, 'Compensation Jurisdiction', 0, '2022-12-06 14:14:50', NULL),
(5, 'Criminal', 0, '2022-12-06 14:14:50', NULL),
(6, 'Test', 0, '2022-12-06 08:14:55', '2022-12-06 08:14:55'),
(7, 'Test', 0, '2022-12-06 08:15:38', '2022-12-06 08:15:38'),
(8, 'Test', 0, '2022-12-06 08:19:58', '2022-12-06 08:19:58'),
(9, 'Test2', 0, '2022-12-06 08:20:14', '2022-12-06 08:45:58'),
(10, 'Test data', 0, '2022-12-06 08:20:27', '2022-12-06 08:20:27'),
(11, 'Test', 0, '2022-12-06 15:50:40', '2022-12-06 15:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `contactus_messages`
--

CREATE TABLE `contactus_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `replied_by` int(10) UNSIGNED DEFAULT NULL,
  `replied_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus_messages`
--

INSERT INTO `contactus_messages` (`id`, `title`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`, `replied_by`, `replied_on`) VALUES
(1, NULL, 'Madusanka', 'm@gmialcom', 'Test Message', 0, '2022-11-02 00:35:44', '2022-11-02 00:35:44', NULL, NULL),
(2, NULL, 'Madusanka', 'm@gmialcom', 'Test Message', 0, '2022-11-02 01:58:45', '2022-11-02 01:58:45', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `official_address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `os_type` char(1) NOT NULL COMMENT 'A | I | W',
  `otp` varchar(6) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `is_client` tinyint(1) NOT NULL DEFAULT 0,
  `inactive` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `contact_person`, `address`, `official_address`, `contact_no`, `email`, `password`, `os_type`, `otp`, `verified`, `is_client`, `inactive`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Madusanka Pradeepddd', NULL, '456/D/3/3, 13th Lane, Keselwaththa, Gonahena, Kadawatha', NULL, '10236544554', 'madusankapradeepariyarathna@gmail.com', '$2y$10$eC5RPBDPfLCUEripmsu8ZOeopVZGkFX6UlDyx74wTYs2sty6qXuTG', 'W', NULL, 1, 0, 1, 1, '2022-10-07 02:04:18', '2022-11-08 20:32:57', NULL),
(2, 'Sameera Amarakoon', 'Madusanka', 'Testing addess', 'official_address', '07715595554', 'sam@sync.net', '$2y$10$e4WqSLgbqvDqh6vtoCq7deb9jwQTT/zzgdgZHCKXWV1cLyuTt.wbq', 'A', '505123', 1, 1, 0, NULL, '2022-10-11 01:25:28', '2022-11-03 00:01:54', NULL),
(3, 'Madusanka Pradeep', 'Madusanka Pradeep', '456/D/3/3, 13th Lane, Keselwaththa, Gonahena, Kadawathaddd', 'Keselwaththa, Gonahena, Kadawatha', '102365445545', 'madusankapradeepariyarathnad@gmail.com', '$2y$10$ame9bhLMFjy/jajI1LOj6eJjjZPAVp.qjL.zm7DuceUdnI6PQX0s2', 'W', NULL, 1, 1, 0, 1, '2022-10-15 16:32:19', '2022-10-15 17:46:20', NULL),
(4, 'Chaturika Neranji', NULL, NULL, NULL, '076695964', 'test@syncbridge.com', '$2y$10$Njr8cHQYHrjD6c/45LlaMeSF4t23ryhChAE38fYCvB.E4zlSJQzfe', 'W', NULL, 1, 1, 0, 1, '2022-11-08 20:54:53', '2022-11-09 00:04:18', NULL),
(5, 'Madusanka Pradeep 2', NULL, NULL, NULL, '15544588', 'Test@email', '$2y$10$xBouKIVa0ksJWiClNAT1POQiEvv7cZYtdo9KEscRoC4vv.hKXQSMu', 'W', NULL, 1, 0, 0, 1, '2022-11-13 13:33:05', '2022-11-13 13:33:05', NULL),
(6, 'Chaturika Neranji', NULL, NULL, NULL, '45158456', 'test2@email.com', '$2y$10$S1W5s5EofXbxtroDuMbzXeO4V4RZgbml8kVJdg7gHIz.zq0CTipwu', 'W', NULL, 1, 0, 0, 1, '2022-11-13 13:38:13', '2022-11-13 13:38:13', NULL),
(7, 'Madusanka Pradeep 3', NULL, NULL, NULL, '415521441', 'test3@gmail.com', '$2y$10$iQMA91jDjRfwFPhFrrfGFeyTeapgVA7fJxkT9NFJAT..hLTeRwGsu', 'W', NULL, 1, 0, 0, 1, '2022-11-13 13:48:53', '2022-11-13 13:48:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `requested_by` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_from` char(1) NOT NULL COMMENT 'W-web, M-mobile',
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`id`, `title`, `description`, `requested_by`, `status`, `created_at`, `created_from`, `updated_at`, `updated_by`) VALUES
(2, 'Testing title 2', 'Testing description 1', 2, 1, '2022-11-10 23:11:16', 'M', '2022-11-20 19:23:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_clients`
--

CREATE TABLE `discussion_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `discussion_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `added_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_clients`
--

INSERT INTO `discussion_clients` (`id`, `discussion_id`, `client_id`, `status`, `created_at`, `updated_at`, `added_by`) VALUES
(1, 2, 2, 0, '2022-11-13 01:16:36', '2022-11-13 01:16:50', 1),
(3, 2, 2, 0, '2022-11-20 20:31:37', '2022-11-20 20:31:37', 1),
(4, 2, 3, 0, '2022-11-20 20:31:37', '2022-11-20 20:31:37', 1),
(5, 2, 4, 0, '2022-11-20 20:31:37', '2022-11-20 20:31:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_lawyers`
--

CREATE TABLE `discussion_lawyers` (
  `id` int(10) UNSIGNED NOT NULL,
  `discussion_id` int(10) UNSIGNED NOT NULL,
  `lawyer_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `added_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_lawyers`
--

INSERT INTO `discussion_lawyers` (`id`, `discussion_id`, `lawyer_id`, `status`, `created_at`, `updated_at`, `added_by`) VALUES
(1, 2, 1, 0, '2022-11-20 20:31:37', '2022-11-20 20:31:37', 1),
(2, 2, 3, 0, '2022-11-20 20:31:37', '2022-11-20 20:31:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_messages`
--

CREATE TABLE `discussion_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `discussion_id` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `type` char(1) NOT NULL,
  `reply_to_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sent_by` int(10) UNSIGNED NOT NULL,
  `sent_by_type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_messages`
--

INSERT INTO `discussion_messages` (`id`, `discussion_id`, `message`, `type`, `reply_to_id`, `status`, `created_at`, `updated_at`, `sent_by`, `sent_by_type`) VALUES
(1, 2, 'Test Message', 't', NULL, 0, '2022-11-12 19:48:10', '2022-11-12 19:48:10', 2, 'C'),
(2, 2, 'Test Message', 't', NULL, 2, '2022-11-12 20:12:48', '2022-11-12 20:45:21', 2, 'C'),
(3, 2, 'Test Message', 't', NULL, 0, '2022-11-12 20:18:37', '2022-11-12 20:18:37', 2, 'C'),
(4, 2, 'Test Message', 't', NULL, 0, '2022-11-12 20:42:02', '2022-11-12 20:42:02', 2, 'C'),
(5, 2, 'Test Message', 't', 4, 0, '2022-11-12 20:44:40', '2022-11-12 20:44:40', 2, 'C'),
(6, 2, 'Test Message', 't', NULL, 0, '2022-11-20 20:32:40', '2022-11-20 20:32:40', 2, 'C'),
(7, 2, 'Test Message', 't', NULL, 0, '2022-11-20 20:32:44', '2022-11-20 20:32:44', 2, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_message_logs`
--

CREATE TABLE `discussion_message_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `discussion_id` int(10) UNSIGNED NOT NULL,
  `message_id` int(10) UNSIGNED NOT NULL,
  `message_to_id` int(10) UNSIGNED NOT NULL,
  `message_to_type` enum('C','L') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `read_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_message_logs`
--

INSERT INTO `discussion_message_logs` (`id`, `discussion_id`, `message_id`, `message_to_id`, `message_to_type`, `created_at`, `updated_at`, `status`, `read_at`) VALUES
(1, 2, 2, 2, 'C', '2022-11-12 20:12:48', '2022-11-12 20:45:21', 2, NULL),
(2, 2, 3, 2, 'C', '2022-11-12 20:18:37', '2022-11-12 20:56:32', 1, '2022-11-12 20:56:32'),
(3, 2, 4, 2, 'C', '2022-11-12 20:42:02', '2022-11-12 20:42:02', 1, '2022-11-12 20:42:02'),
(4, 2, 5, 2, 'C', '2022-11-12 20:44:40', '2022-11-12 20:44:40', 1, '2022-11-12 20:44:40'),
(5, 2, 6, 2, 'C', '2022-11-20 20:32:40', '2022-11-20 20:32:40', 1, '2022-11-20 20:32:40'),
(6, 2, 6, 2, 'C', '2022-11-20 20:32:40', '2022-11-20 20:32:40', 1, '2022-11-20 20:32:40'),
(7, 2, 6, 3, 'C', '2022-11-20 20:32:40', '2022-11-20 20:32:40', 0, NULL),
(8, 2, 6, 4, 'C', '2022-11-20 20:32:40', '2022-11-20 20:32:40', 0, NULL),
(9, 2, 6, 1, 'L', '2022-11-20 20:32:40', '2022-11-20 20:32:40', 0, NULL),
(10, 2, 6, 3, 'L', '2022-11-20 20:32:40', '2022-11-20 20:32:40', 0, NULL),
(11, 2, 7, 2, 'C', '2022-11-20 20:32:44', '2022-11-20 20:32:44', 1, '2022-11-20 20:32:44'),
(12, 2, 7, 2, 'C', '2022-11-20 20:32:44', '2022-11-20 20:32:44', 1, '2022-11-20 20:32:44'),
(13, 2, 7, 3, 'C', '2022-11-20 20:32:44', '2022-11-20 20:32:44', 0, NULL),
(14, 2, 7, 4, 'C', '2022-11-20 20:32:44', '2022-11-20 20:32:44', 0, NULL),
(15, 2, 7, 1, 'L', '2022-11-20 20:32:44', '2022-11-20 20:32:44', 0, NULL),
(16, 2, 7, 3, 'L', '2022-11-20 20:32:44', '2022-11-20 20:32:44', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `s_group` enum('ADMIN_PANEL','BILLING','CONTACT','SITE','LOCATION','MOBILE_APP','API','EMPLOYEE','COMPANY','SOCIAL','PRODUCT','CHECKOUT','GIFT_CARD','NOTICE') COLLATE utf8_unicode_ci NOT NULL,
  `skey` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scope` enum('PUBLIC','PRIVATE','SEALED') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'SEALED'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`s_group`, `skey`, `value`, `scope`) VALUES
('CONTACT', 'contact_address', 'adress, stree1, city, country, zipcode', 'PUBLIC'),
('CONTACT', 'contact_email', 'mpl@gmailcom', 'PUBLIC'),
('CONTACT', 'contact_linkedin', 'https://www.linkedin.com/', 'PUBLIC'),
('CONTACT', 'contact_mobile', '0112123456', 'PUBLIC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `user_type` tinyint(4) NOT NULL DEFAULT 0,
  `os_type` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `contact_no1`, `contact_no2`, `role`, `remember_token`, `status`, `user_type`, `os_type`, `created_by`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'Syncbridge Test Account', 'test@syncbridge.com', '$2y$10$QTJwCEUUkbmv6Yz59uN3cuT4vlNhhiFCR/lM2uqvp4HhPZADgjgg2', NULL, NULL, NULL, NULL, 'M8iqOTiazlL8cLm2YoEcpPiu1EPjybGqBl0B3n3TUFoICBBIWyvqjiAIXBoo', 1, 1, 'A', NULL, NULL, '2018-08-18 23:03:06', '2022-10-11 15:00:50'),
(3, 'Madusanka Pradeep', 'madusankapradeepariyarathna@gmail.com', '$2y$10$xlPuHJe5RaVfQDB/z2AJ0.Nq/qXDshRLsJp0ux1kApak6JuWX4Fh.', '456/D/3/3, 13th Lane, Keselwaththa, Gonahena, Kadawatha', '111111111111', '111111111111', 2, NULL, 1, 1, 'A', NULL, NULL, '2022-10-09 02:54:27', '2022-11-23 16:58:53'),
(4, 'name', 'admin@email.com', '$2y$10$hed1aoFwUztnm8rj9n0o.evx6xjwqatllmbw5CJFeHWKPnimIxHNi', NULL, NULL, NULL, 2, NULL, 1, 0, NULL, NULL, NULL, '2022-11-28 01:50:21', '2022-11-28 01:50:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `request_id` (`request_id`),
  ADD KEY `requested_by` (`requested_by`);

--
-- Indexes for table `appointment_participants`
--
ALTER TABLE `appointment_participants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `participant_id` (`participant_id`,`type`) USING BTREE,
  ADD KEY `appointment_id` (`appointment_id`) USING BTREE;

--
-- Indexes for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banner_type_id` (`banner_type_id`);

--
-- Indexes for table `banner_types`
--
ALTER TABLE `banner_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `case_clients`
--
ALTER TABLE `case_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_id` (`case_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `case_documents`
--
ALTER TABLE `case_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_id` (`case_id`);

--
-- Indexes for table `case_lawyers`
--
ALTER TABLE `case_lawyers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_id` (`case_id`),
  ADD KEY `lawyer_id` (`lawyer_id`);

--
-- Indexes for table `case_milestones`
--
ALTER TABLE `case_milestones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mpl_id` (`mpl_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `case_payments`
--
ALTER TABLE `case_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_types`
--
ALTER TABLE `case_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus_messages`
--
ALTER TABLE `contactus_messages`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `replied_by` (`replied_by`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`) USING BTREE,
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `discussion_clients`
--
ALTER TABLE `discussion_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion_id` (`discussion_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `discussion_lawyers`
--
ALTER TABLE `discussion_lawyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion_messages`
--
ALTER TABLE `discussion_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion_id` (`discussion_id`),
  ADD KEY `reply_to_id` (`reply_to_id`);

--
-- Indexes for table `discussion_message_logs`
--
ALTER TABLE `discussion_message_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion_id` (`discussion_id`),
  ADD KEY `message_id` (`message_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`skey`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment_participants`
--
ALTER TABLE `appointment_participants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner_types`
--
ALTER TABLE `banner_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `case_clients`
--
ALTER TABLE `case_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `case_documents`
--
ALTER TABLE `case_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `case_lawyers`
--
ALTER TABLE `case_lawyers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `case_milestones`
--
ALTER TABLE `case_milestones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `case_payments`
--
ALTER TABLE `case_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `case_types`
--
ALTER TABLE `case_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contactus_messages`
--
ALTER TABLE `contactus_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discussion_clients`
--
ALTER TABLE `discussion_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `discussion_lawyers`
--
ALTER TABLE `discussion_lawyers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discussion_messages`
--
ALTER TABLE `discussion_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discussion_message_logs`
--
ALTER TABLE `discussion_message_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`requested_by`) REFERENCES `customers` (`id`);

--
-- Constraints for table `appointment_participants`
--
ALTER TABLE `appointment_participants`
  ADD CONSTRAINT `appointment_participants_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`);

--
-- Constraints for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  ADD CONSTRAINT `appointment_requests_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `appointment_requests_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_ibfk_1` FOREIGN KEY (`banner_type_id`) REFERENCES `banner_types` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `cases`
--
ALTER TABLE `cases`
  ADD CONSTRAINT `cases_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `case_clients`
--
ALTER TABLE `case_clients`
  ADD CONSTRAINT `case_clients_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `cases` (`id`),
  ADD CONSTRAINT `case_clients_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `case_lawyers`
--
ALTER TABLE `case_lawyers`
  ADD CONSTRAINT `case_lawyers_ibfk_1` FOREIGN KEY (`case_id`) REFERENCES `cases` (`id`),
  ADD CONSTRAINT `case_lawyers_ibfk_2` FOREIGN KEY (`lawyer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `case_milestones`
--
ALTER TABLE `case_milestones`
  ADD CONSTRAINT `case_milestones_ibfk_1` FOREIGN KEY (`mpl_id`) REFERENCES `cases` (`id`),
  ADD CONSTRAINT `case_milestones_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `contactus_messages`
--
ALTER TABLE `contactus_messages`
  ADD CONSTRAINT `contactus_messages_ibfk_1` FOREIGN KEY (`replied_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_ibfk_1` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `discussion_clients`
--
ALTER TABLE `discussion_clients`
  ADD CONSTRAINT `discussion_clients_ibfk_1` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`),
  ADD CONSTRAINT `discussion_clients_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `discussion_clients_ibfk_3` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `discussion_messages`
--
ALTER TABLE `discussion_messages`
  ADD CONSTRAINT `discussion_messages_ibfk_1` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`),
  ADD CONSTRAINT `discussion_messages_ibfk_2` FOREIGN KEY (`reply_to_id`) REFERENCES `discussion_messages` (`id`);

--
-- Constraints for table `discussion_message_logs`
--
ALTER TABLE `discussion_message_logs`
  ADD CONSTRAINT `discussion_message_logs_ibfk_1` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`),
  ADD CONSTRAINT `discussion_message_logs_ibfk_2` FOREIGN KEY (`message_id`) REFERENCES `discussion_messages` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
