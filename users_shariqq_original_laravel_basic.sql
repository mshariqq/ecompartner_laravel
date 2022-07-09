-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2022 at 01:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_shariqq_original_laravel_basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `is_super`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'admin@email.com', '2022-06-16 07:09:21', '$2a$12$bLEHteN8SGL8HnwI9GLpMut56gntFkZFog8z17UDWPwac9kkqTdoO', NULL, 1, 'CaC23oBoP8sNBcaBeGB3pQB3CxkQOeouFFxEWRVtr55snNCXWFYyFrOKKAgf', '2022-06-16 07:09:21', '2022-06-16 07:09:21');

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
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `delivery_address` text COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `country` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `cod_currency` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cod_amount` double DEFAULT 0,
  `pieces` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `shipment_description` text COLLATE utf8_bin DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `leads_list_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `name`, `delivery_address`, `city`, `phone_number`, `country`, `cod_currency`, `cod_amount`, `pieces`, `shipment_description`, `product_id`, `status`, `leads_list_id`, `created_at`, `updated_at`) VALUES
(44, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 6, 'confirmed', 19, '2022-06-16 12:48:05', '2022-06-29 08:26:11'),
(45, 'farangis', 'Liwan , Queue Point, building-Mazaya 10 b, Flat 315', 'Dubai', '971522328676    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 5, 'confirmed', 19, '2022-06-16 12:48:05', '2022-06-29 13:58:33'),
(46, 'fatma', 'Mussafa East 16, mashgoub st. house 27', 'Abu Dhabi', '971544444288    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'confirmed', 19, '2022-06-16 12:48:05', '2022-06-29 07:45:16'),
(47, 'anji atef said', 'Abu Hail next to Abu Hail Training Center', 'Dubai', '971501241948    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'confirmed', 19, '2022-06-16 12:48:05', '2022-06-24 11:36:41'),
(48, 'Nour almasri', 'Damac hills 2, aster cluster, villa 312', 'Dubai', '971507740544    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'confirmed', 19, '2022-06-16 12:48:05', '2022-06-24 11:36:40'),
(49, 'Amer Awad', 'South Shamkha (Riyadh) Basin (8) Vila (25)', 'Abu Dhabi', '971565231133    ', 'United Arab Emirates', 'AED', 190, '1', 'Wingeless ® One Step Hair Brush', 0, 'confirmed', 19, '2022-06-16 12:48:05', '2022-06-24 11:36:38'),
(50, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'confirmed', 20, '2022-06-16 13:09:17', '2022-06-24 11:36:31'),
(51, 'farangis', 'Liwan , Queue Point, building-Mazaya 10 b, Flat 315', 'Dubai', '971522328676    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'no response', 20, '2022-06-16 13:09:17', '2022-06-24 11:36:30'),
(52, 'fatma', 'Mussafa East 16, mashgoub st. house 27', 'Abu Dhabi', '971544444288    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'cancelled', 20, '2022-06-16 13:09:17', '2022-06-24 11:36:28'),
(53, 'anji atef said', 'Abu Hail next to Abu Hail Training Center', 'Dubai', '971501241948    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'cancelled', 20, '2022-06-16 13:09:17', '2022-06-24 11:36:27'),
(54, 'Nour almasri', 'Damac hills 2, aster cluster, villa 312', 'Dubai', '971507740544    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'no response', 20, '2022-06-16 13:09:17', '2022-06-24 11:36:25'),
(55, 'Amer Awad', 'South Shamkha (Riyadh) Basin (8) Vila (25)', 'Abu Dhabi', '971565231133    ', 'United Arab Emirates', 'AED', 190, '1', 'Wingeless ® One Step Hair Brush', 0, 'confirmed', 20, '2022-06-16 13:09:17', '2022-06-24 11:36:24'),
(56, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'cancelled', 21, '2022-06-16 13:44:27', '2022-06-17 08:48:41'),
(57, 'farangis', 'Liwan , Queue Point, building-Mazaya 10 b, Flat 315', 'Dubai', '971522328676    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'cancelled', 21, '2022-06-16 13:44:27', '2022-06-24 11:36:15'),
(58, 'fatma', 'Mussafa East 16, mashgoub st. house 27', 'Abu Dhabi', '971544444288    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'no response', 21, '2022-06-16 13:44:27', '2022-06-24 11:36:14'),
(59, 'anji atef said', 'Abu Hail next to Abu Hail Training Center', 'Dubai', '971501241948    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'no response', 21, '2022-06-16 13:44:27', '2022-06-24 11:36:12'),
(60, 'Nour almasri', 'Damac hills 2, aster cluster, villa 312', 'Dubai', '971507740544    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'confirmed', 21, '2022-06-16 13:44:27', '2022-06-24 11:36:10'),
(61, 'Amer Awad', 'South Shamkha (Riyadh) Basin (8) Vila (25)', 'Abu Dhabi', '971565231133    ', 'United Arab Emirates', 'AED', 190, '1', 'Wingeless ® One Step Hair Brush', 0, 'confirmed', 21, '2022-06-16 13:44:27', '2022-06-24 11:36:08'),
(62, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'no response', 22, '2022-06-16 13:45:29', '2022-06-24 11:26:27'),
(63, 'farangis', 'Liwan , Queue Point, building-Mazaya 10 b, Flat 315', 'Dubai', '971522328676', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'confirmed', 22, '2022-06-16 13:45:29', '2022-06-24 11:28:06'),
(64, 'fatma', 'Mussafa East 16, mashgoub st. house 27', 'Abu Dhabi', '971544444288', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'cancelled', 22, '2022-06-16 13:45:29', '2022-06-17 08:33:19'),
(65, 'anji atef said', 'Abu Hail next to Abu Hail Training Center', 'Dubai', '971501241948', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'cancelled', 22, '2022-06-16 13:45:29', '2022-06-17 08:33:20'),
(66, 'Nour almasri', 'Damac hills 2, aster cluster, villa 312', 'Dubai', '971507740544', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 0, 'cancelled', 22, '2022-06-16 13:45:29', '2022-06-24 11:40:34'),
(67, 'Amer Awad', 'South Shamkha (Riyadh) Basin (8) Vila (25)', 'Abu Dhabi', '971565231133', 'United Arab Emirates', 'AED', 190, '1', 'Wingeless ® One Step Hair Brush', 0, 'confirmed', 22, '2022-06-16 13:45:29', '2022-06-24 11:40:13'),
(68, 'John', 'XXXXXX', 'Abu Dhabi', '9', 'United Arab Emirates', 'AED', 500, '2', 'something', 0, 'confirmed', 22, '2022-06-16 13:45:29', '2022-06-24 11:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `leads_lists`
--

CREATE TABLE `leads_lists` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `log` longtext COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `leads_lists`
--

INSERT INTO `leads_lists` (`id`, `name`, `user_id`, `status`, `log`, `created_at`, `updated_at`) VALUES
(19, 'testing', 1, 'processing', 'Lead Log for LeadsList id = 19Lead with id 44Inserted success <br>Lead with id 45Inserted success <br>Lead with id 46Inserted success <br>Lead with id 47Inserted success <br>Lead with id 48Inserted success <br>Lead with id 49Inserted success <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>', '2022-06-16 12:48:05', '2022-06-29 07:45:10'),
(20, 'Indian Test List2', 1, 'pending', 'Lead Log for LeadsList id = 20Lead with id 50Inserted success <br>Lead with id 51Inserted success <br>Lead with id 52Inserted success <br>Lead with id 53Inserted success <br>Lead with id 54Inserted success <br>Lead with id 55Inserted success <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>', '2022-06-16 13:09:17', '2022-06-24 11:14:35'),
(21, 'Testing List 3', 1, 'processing', 'Lead Log for LeadsList id = 21Lead with id 56Inserted success <br>Lead with id 57Inserted success <br>Lead with id 58Inserted success <br>Lead with id 59Inserted success <br>Lead with id 60Inserted success <br>Lead with id 61Inserted success <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>Empt Row Value given in this row <br>', '2022-06-16 13:44:27', '2022-06-24 11:14:34'),
(22, 'test4', 1, 'processing', 'Lead Log for LeadsList id = 22Lead with id 62Inserted success <br>Lead with id 63Inserted success <br>Lead with id 64Inserted success <br>Lead with id 65Inserted success <br>Lead with id 66Inserted success <br>Lead with id 67Inserted success <br>Lead with id 68Inserted success <br>', '2022-06-16 13:45:29', '2022-06-24 11:14:33');

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
(4, '2019_3_4_000000_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `tracking_id` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `delivery_address` text COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `country` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `cod_currency` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cod_amount` double DEFAULT 0,
  `pieces` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `shipment_description` text COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `tracking_id`, `lead_id`, `seller_id`, `name`, `delivery_address`, `city`, `phone_number`, `country`, `cod_currency`, `cod_amount`, `pieces`, `shipment_description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 51, 1, 'farangis', 'Liwan , Queue Point, building-Mazaya 10 b, Flat 315', 'Dubai', '971522328676    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'out for deivery', '2022-06-20 03:54:59', '2022-06-28 04:50:37'),
(2, NULL, 47, 1, 'anji atef said', 'Abu Hail next to Abu Hail Training Center', 'Dubai', '971501241948    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'delivered', '2022-06-21 03:03:57', '2022-06-24 11:24:29'),
(3, NULL, 44, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'out for deivery', '2022-06-21 03:05:26', '2022-06-24 11:24:27'),
(4, NULL, 68, 1, 'John', 'XXXXXX', 'Abu Dhabi', '9', 'United Arab Emirates', 'AED', 500, '2', 'something', 'confirmed', '2022-06-24 11:16:43', '2022-06-24 11:16:43'),
(5, NULL, 63, 1, 'farangis', 'Liwan , Queue Point, building-Mazaya 10 b, Flat 315', 'Dubai', '971522328676', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-06-24 11:28:06', '2022-06-24 11:28:06'),
(6, NULL, 61, 1, 'Amer Awad', 'South Shamkha (Riyadh) Basin (8) Vila (25)', 'Abu Dhabi', '971565231133    ', 'United Arab Emirates', 'AED', 190, '1', 'Wingeless ® One Step Hair Brush', 'confirmed', '2022-06-24 11:36:08', '2022-06-24 11:36:08'),
(7, NULL, 60, 1, 'Nour almasri', 'Damac hills 2, aster cluster, villa 312', 'Dubai', '971507740544    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-06-24 11:36:10', '2022-06-24 11:36:10'),
(8, NULL, 55, 1, 'Amer Awad', 'South Shamkha (Riyadh) Basin (8) Vila (25)', 'Abu Dhabi', '971565231133    ', 'United Arab Emirates', 'AED', 190, '1', 'Wingeless ® One Step Hair Brush', 'confirmed', '2022-06-24 11:36:24', '2022-06-24 11:36:24'),
(9, NULL, 50, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-06-24 11:36:31', '2022-06-24 11:36:31'),
(10, NULL, 49, 1, 'Amer Awad', 'South Shamkha (Riyadh) Basin (8) Vila (25)', 'Abu Dhabi', '971565231133    ', 'United Arab Emirates', 'AED', 190, '1', 'Wingeless ® One Step Hair Brush', 'confirmed', '2022-06-24 11:36:38', '2022-06-24 11:36:38'),
(11, NULL, 48, 1, 'Nour almasri', 'Damac hills 2, aster cluster, villa 312', 'Dubai', '971507740544    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-06-24 11:36:40', '2022-06-24 11:36:40'),
(12, NULL, 47, 1, 'anji atef said', 'Abu Hail next to Abu Hail Training Center', 'Dubai', '971501241948    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-06-24 11:36:41', '2022-06-24 11:36:41'),
(13, NULL, 67, 1, 'Amer Awad', 'South Shamkha (Riyadh) Basin (8) Vila (25)', 'Abu Dhabi', '971565231133', 'United Arab Emirates', 'AED', 190, '1', 'Wingeless ® One Step Hair Brush', 'confirmed', '2022-06-24 11:40:13', '2022-06-24 11:40:13'),
(14, NULL, 44, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-06-29 08:24:47', '2022-06-29 08:24:47'),
(15, NULL, 44, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-06-29 08:25:17', '2022-06-29 08:25:17'),
(16, NULL, 44, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-06-29 08:25:51', '2022-06-29 08:25:51'),
(17, NULL, 44, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-06-29 08:26:11', '2022-06-29 08:26:11'),
(18, NULL, 44, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-06-29 08:27:55', '2022-06-29 08:27:55'),
(19, NULL, 45, 1, 'farangis', 'Liwan , Queue Point, building-Mazaya 10 b, Flat 315', 'Dubai', '971522328676    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-06-29 08:28:37', '2022-06-29 08:28:37'),
(20, NULL, 45, 1, 'farangis', 'Liwan , Queue Point, building-Mazaya 10 b, Flat 315', 'Dubai', '971522328676    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-07-05 10:30:49', '2022-07-05 10:30:49'),
(21, 'IH21', 44, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-07-05 10:31:18', '2022-07-05 10:31:18'),
(22, 'AWB109KJ22', 44, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-07-05 10:32:20', '2022-07-05 10:32:20'),
(23, 'AWB103KD23', 44, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272    ', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-07-05 13:09:01', '2022-07-05 13:09:01');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `stock` int(11) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(250) COLLATE utf8_bin NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `warehouse_id`, `name`, `description`, `stock`, `price`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Macbook Air', '<p>Apple grey macbook Air</p>\r\n<p>8GB Rak</p>\r\n<p>15 inch</p>', 50, 800, '81KoSSAwH2L._SL1500_.jpg', 'Active', '2022-06-20 06:04:09', '2022-06-20 06:04:09'),
(2, 2, 'Macbook Air', '<p>Macbook Air</p>\r\n<p>15inch</p>\r\n<p>LCD Panel</p>\r\n<p>8GB Ram</p>', 58, 800, 'uploads/sellers/products/1/81jn2MaSTyL._SX679_.jpg', 'Active', '2022-06-20 06:13:46', '2022-07-02 03:02:43'),
(3, 2, 'Macbook Air', '<p>Macbook Air</p>\r\n<p>15inch</p>\r\n<p>LCD Panel</p>\r\n<p>8GB Ram</p>', 10, 800, 'uploads/sellers/products/1/81jn2MaSTyL._SX679_.jpg', 'Active', '2022-06-20 06:16:05', '2022-06-20 06:16:05'),
(4, 2, 'Macbook Air', '<p>Macbook Air</p>\r\n<p>15inch</p>\r\n<p>LCD Panel</p>\r\n<p>8GB Ram</p>', 10, 800, 'uploads/sellers/products/1/81jn2MaSTyL._SX679_.jpg', 'Active', '2022-06-20 06:16:58', '2022-06-20 06:16:58'),
(5, 3, 'Macbok Pro', '<p>Macbook Pro</p>\r\n<p>12GB Ram</p>', 48, 2000, 'uploads/sellers/products/1/81vXk327hOL._SX679_.jpg', 'Active', '2022-06-20 06:19:57', '2022-07-05 10:30:49'),
(6, 2, 'Apple', '<p>;iuhpiu</p>', 97, 900, 'uploads/sellers/products/1/81jn2MaSTyL._SX679_.jpg', 'Active', '2022-06-21 04:22:41', '2022-07-05 13:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `product_purchases`
--

CREATE TABLE `product_purchases` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `product_purchases`
--

INSERT INTO `product_purchases` (`id`, `product_id`, `seller_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 5, '2022-06-27 03:29:53', '2022-06-27 03:29:53'),
(2, 2, 1, 5, '2022-06-27 03:30:55', '2022-06-27 03:30:55'),
(3, 2, 1, 10, '2022-06-27 03:35:11', '2022-06-27 03:35:11'),
(4, 6, 1, 25, '2022-06-27 03:45:56', '2022-06-27 03:45:56'),
(5, 2, 1, 2, '2022-06-29 04:51:39', '2022-06-29 04:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_requests`
--

CREATE TABLE `purchase_requests` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(150) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `purchase_requests`
--

INSERT INTO `purchase_requests` (`id`, `seller_id`, `product_id`, `qty`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 50, 'confirmed', '2022-06-29 05:27:02', '2022-07-02 03:02:43');

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
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `phone`, `country`, `created_at`, `updated_at`) VALUES
(1, 'seller1', 'seller1@email.com', NULL, '$2y$10$xwjrRhFzlp5ztNCvaatoGOlOHc1pRAruN0di5XI/.5bwSlAxO23zC', NULL, 'active', '51 987456310', 'UAE', '2022-06-16 07:25:11', '2022-06-16 07:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin NOT NULL,
  `location` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `seller_id` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `location`, `seller_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SHop1', NULL, 1, 'active', '2022-06-20 05:25:45', '2022-06-20 05:25:45'),
(2, 'Shop2', NULL, 1, 'inactive', '2022-06-20 05:26:37', '2022-06-20 05:26:37'),
(3, 'Shop 3', NULL, 1, 'active', '2022-06-20 06:19:20', '2022-06-20 06:19:20'),
(4, 'Local warehouse', 'Jedah', 1, 'active', '2022-06-27 02:48:09', '2022-06-27 02:48:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leads_id` (`leads_list_id`);

--
-- Indexes for table `leads_lists`
--
ALTER TABLE `leads_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_purchases`
--
ALTER TABLE `product_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_requests`
--
ALTER TABLE `purchase_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `leads_lists`
--
ALTER TABLE `leads_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_purchases`
--
ALTER TABLE `product_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchase_requests`
--
ALTER TABLE `purchase_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_id` FOREIGN KEY (`leads_list_id`) REFERENCES `leads_lists` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
