-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2022 at 11:08 AM
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
(1, 'Super', 'Administrator', 'admin@email.com', '2022-06-16 07:09:21', '$2a$12$bLEHteN8SGL8HnwI9GLpMut56gntFkZFog8z17UDWPwac9kkqTdoO', '9876543210', 1, 'zPsq3LwqhQwwKObILZZdEuC0H08ziUSZCqxTtsD5txSr6FuObbm7Zx7Pungd', '2022-06-16 07:09:21', '2022-07-22 12:56:06');

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
(76, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 6, 'confirmed', 29, '2022-07-20 07:22:56', '2022-07-20 12:07:31'),
(77, 'farangis', 'Liwan , Queue Point, building-Mazaya 10 b, Flat 315', 'Dubai', '971522328676', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 6, 'confirmed', 30, '2022-07-19 07:22:56', '2022-07-22 11:31:30'),
(78, 'fatma', 'Mussafa East 16, mashgoub st. house 27', 'Abu Dhabi', '971544444288', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 6, 'pending', 30, '2022-07-18 19:30:00', '2022-07-20 17:19:50'),
(79, 'anji atef said', 'Abu Hail next to Abu Hail Training Center', 'Dubai', '971501241948', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 6, 'confirmed', 29, '2022-07-20 07:22:56', '2022-07-20 12:07:26'),
(80, 'Nour almasri', 'Damac hills 2, aster cluster, villa 312', 'Dubai', '971507740544', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 6, 'confirmed', 29, '2022-07-20 07:22:56', '2022-07-20 07:24:32'),
(81, 'Amer Awad', 'South Shamkha (Riyadh) Basin (8) Vila (25)', 'Abu Dhabi', '971565231133', 'United Arab Emirates', 'AED', 190, '1', 'Wingeless ® One Step Hair Brush', 6, 'confirmed', 29, '2022-07-20 07:22:56', '2022-07-20 07:24:30'),
(82, 'John', 'XXXXXX', 'Abu Dhabi', '9', 'United Arab Emirates', 'AED', 500, '2', 'something', 6, 'confirmed', 29, '2022-07-20 07:22:56', '2022-07-20 07:24:28');

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
(29, 'Dubai 1ST', 1, 'pending', 'Lead Log for LeadsList id = 29Lead with id 76Inserted success <br>Lead with id 77Inserted success <br>Lead with id 78Inserted success <br>Lead with id 79Inserted success <br>Lead with id 80Inserted success <br>Lead with id 81Inserted success <br>Lead with id 82Inserted success <br>', '2022-07-20 07:22:56', '2022-07-20 07:22:56'),
(30, 'Dubai 1ST', 1, 'pending', 'Lead Log for LeadsList id = 29Lead with id 76Inserted success <br>Lead with id 77Inserted success <br>Lead with id 78Inserted success <br>Lead with id 79Inserted success <br>Lead with id 80Inserted success <br>Lead with id 81Inserted success <br>Lead with id 82Inserted success <br>', '2022-07-19 07:22:56', '2022-07-20 07:22:56');

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
(29, 'AWB35DF29', 82, 1, 'John', 'XXXXXX', 'Abu Dhabi', '9', 'United Arab Emirates', 'AED', 500, '2', 'something', 'packing', '2022-07-19 07:24:28', '2022-07-21 08:24:48'),
(30, 'AWB95JF30', 81, 1, 'Amer Awad', 'South Shamkha (Riyadh) Basin (8) Vila (25)', 'Abu Dhabi', '971565231133', 'United Arab Emirates', 'AED', 190, '1', 'Wingeless ® One Step Hair Brush', 'out for delivery', '2022-07-20 07:24:30', '2022-07-20 16:18:42'),
(31, 'AWB72HC31', 80, 1, 'Nour almasri', 'Damac hills 2, aster cluster, villa 312', 'Dubai', '971507740544', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'packing', '2022-07-20 07:24:32', '2022-07-21 08:40:33'),
(32, 'AWB14BE32', 76, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'delivered', '2022-07-20 11:32:54', '2022-07-20 14:37:17'),
(33, 'AWB59FJ33', 82, 1, 'John', 'XXXXXX', 'Abu Dhabi', '9', 'United Arab Emirates', 'AED', 500, '2', 'something', 'confirmed', '2022-07-20 12:07:07', '2022-07-20 12:07:07'),
(34, NULL, 79, 1, 'anji atef said', 'Abu Hail next to Abu Hail Training Center', 'Dubai', '971501241948', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-07-20 12:07:11', '2022-07-20 12:07:11'),
(35, 'AWB37DH35', 79, 1, 'anji atef said', 'Abu Hail next to Abu Hail Training Center', 'Dubai', '971501241948', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'out for delivery', '2022-07-20 12:07:26', '2022-07-20 14:39:00'),
(36, 'AWB28CI36', 76, 1, 'tien tien', ' Discovery garden street 3 building 79', 'Dubai', '971507636272', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'cancelled', '2022-07-20 12:07:31', '2022-07-20 14:37:42'),
(37, 'AWB25CF37', 81, 1, 'Amer Awad', 'South Shamkha (Riyadh) Basin (8) Vila (25)', 'Abu Dhabi', '971565231133', 'United Arab Emirates', 'AED', 190, '1', 'Wingeless ® One Step Hair Brush', 'out for delivery', '2022-07-20 12:07:35', '2022-07-20 14:37:40'),
(38, 'AWB24CE38', 77, 1, 'farangis', 'Liwan , Queue Point, building-Mazaya 10 b, Flat 315', 'Dubai', '971522328676', 'United Arab Emirates', 'AED', 200, '1', 'Wingeless ® dyson  Hair Airwrap 5 in 1  ', 'confirmed', '2022-07-22 11:31:29', '2022-07-22 11:31:29');

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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `approval_date` datetime DEFAULT NULL,
  `approved_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `warehouse_id`, `name`, `description`, `stock`, `price`, `photo`, `status`, `created_at`, `updated_at`, `approval_date`, `approved_admin`) VALUES
(1, 2, 'Macbook Air', '<p>Apple grey macbook Air</p>\r\n<p>8GB Rak</p>\r\n<p>15 inch</p>', 50, 800, '81KoSSAwH2L._SL1500_.jpg', 'active', '2022-06-20 06:04:09', '2022-07-23 00:52:12', NULL, NULL),
(2, 2, 'Macbook Air', '<p>Macbook Air</p>\r\n<p>15inch</p>\r\n<p>LCD Panel</p>\r\n<p>8GB Ram</p>', 58, 800, 'uploads/sellers/products/1/81jn2MaSTyL._SX679_.jpg', 'active', '2022-06-20 06:13:46', '2022-07-23 00:52:14', NULL, NULL),
(3, 2, 'Macbook Air', '<p>Macbook Air</p>\r\n<p>15inch</p>\r\n<p>LCD Panel</p>\r\n<p>8GB Ram</p>', 10, 800, 'uploads/sellers/products/1/81jn2MaSTyL._SX679_.jpg', 'active', '2022-06-20 06:16:05', '2022-07-23 00:52:22', NULL, NULL),
(4, 2, 'Macbook Air', '<p>Macbook Air</p>\r\n<p>15inch</p>\r\n<p>LCD Panel</p>\r\n<p>8GB Ram</p>', 10, 800, 'uploads/sellers/products/1/81jn2MaSTyL._SX679_.jpg', 'active', '2022-06-20 06:16:58', '2022-07-23 00:52:27', NULL, NULL),
(5, 3, 'Macbok Pro', '<p>Macbook Pro</p>\r\n<p>12GB Ram</p>', 48, 2000, 'uploads/sellers/products/1/81vXk327hOL._SX679_.jpg', 'active', '2022-06-20 06:19:57', '2022-07-23 00:52:29', NULL, NULL),
(6, 2, 'Apple', '<p>;iuhpiu</p>', 2, 900, 'uploads/sellers/products/1/81jn2MaSTyL._SX679_.jpg', 'active', '2022-06-21 04:22:41', '2022-07-23 00:52:31', NULL, NULL),
(7, 2, 'HP Lpatop 15q', '<p>CPU</p>\r\n<p>RAM</p>\r\n<p>HDD</p>\r\n<p>SSD</p>\r\n<p>15 INCH Screen</p>', 5, 5000, 'uploads/sellers/products/1/81E7c4v2-3L._SX679_.jpg', 'active', '2022-07-20 11:30:05', '2022-07-23 00:52:08', NULL, NULL),
(8, 2, 'HP 15Q', '<p>black laptop with 15 inch screen</p>', 10, 500, 'uploads/sellers/products/1/1658516618', 'active', '2022-07-22 13:33:37', '2022-07-22 19:21:53', '2022-07-23 00:00:00', 1),
(9, 2, 'dummy', '<p>saasdf</p>', 1, 1, 'uploads/sellers/products/1/1658539862jpg', 'active', '2022-07-22 20:01:01', '2022-07-24 02:56:47', '2022-07-24 00:00:00', 1),
(10, 2, 'sadfasdf', '<p>sadf</p>', 1, 1, 'uploads/sellers/products/1/1658539901.jpg', 'active', '2022-07-22 20:01:40', '2022-07-24 02:56:49', '2022-07-24 00:00:00', 1);

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
(5, 2, 1, 2, '2022-06-29 04:51:39', '2022-06-29 04:51:39'),
(6, 6, 1, 1, '2022-07-20 11:41:57', '2022-07-20 11:41:57');

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
(1, 1, 2, 50, 'confirmed', '2022-06-29 05:27:02', '2022-07-02 03:02:43'),
(2, 1, 6, 1, 'confirmed', '2022-07-20 11:33:21', '2022-07-20 11:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `q1` varchar(250) COLLATE utf8_bin NOT NULL,
  `q2` varchar(250) COLLATE utf8_bin NOT NULL,
  `q3` varchar(250) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `seller_id`, `q1`, `q2`, `q3`, `created_at`, `updated_at`) VALUES
(1, 1, 'I\'m not selling product yet', 'More than 10000$', 'more than 500 shipments per day', '2022-07-24 08:24:03', '2022-07-24 08:24:03'),
(2, 1, 'Yes I\'m selling online', 'Between $0 to 500$', 'more than 500 shipments per day', '2022-07-24 08:25:38', '2022-07-24 08:25:38');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `survey` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `phone`, `country`, `created_at`, `updated_at`, `survey`) VALUES
(1, 'Seller John', 'seller1@email.com', NULL, '$2y$10$xwjrRhFzlp5ztNCvaatoGOlOHc1pRAruN0di5XI/.5bwSlAxO23zC', NULL, 'active', '51 987456310', 'UAE arab', '2022-06-16 07:25:11', '2022-07-24 02:55:38', 1);

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
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `leads_lists`
--
ALTER TABLE `leads_lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_purchases`
--
ALTER TABLE `product_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_requests`
--
ALTER TABLE `purchase_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
