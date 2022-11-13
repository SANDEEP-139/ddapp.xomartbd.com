-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2022 at 10:57 AM
-- Server version: 8.0.31-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ddlimite_bdtravelapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_type` enum('Ongoing','Upcoming') COLLATE utf8mb4_unicode_ci NOT NULL,
  `campaign_start_date` date NOT NULL DEFAULT '2022-11-08',
  `campaign_end_date` date NOT NULL DEFAULT '2022-11-08',
  `joined_users` text COLLATE utf8mb4_unicode_ci,
  `banner_photo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `campaign_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `title`, `campaign_type`, `campaign_start_date`, `campaign_end_date`, `joined_users`, `banner_photo`, `status`, `campaign_description`, `created_at`, `updated_at`) VALUES
(1, '16 Taka Ticket', 'Ongoing', '2022-11-08', '2022-11-08', NULL, '634d9405cfa52_png-transparent-azul-hotel-restaurant-computer-icons-boutique-hotel-gratis-hotel-text-rectangle-logo-thumbnail.png', 0, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2022-10-14 14:01:37', '2022-10-25 13:36:50'),
(2, '16 Ticket', 'Upcoming', '2022-11-08', '2022-11-08', NULL, '634da440126a1_download.jpg', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2022-10-17 13:21:44', '2022-10-17 13:21:44'),
(3, 'Free Trip', 'Upcoming', '2022-11-08', '2022-11-08', NULL, '63582fe9b1679_Core constraction ltd-harunur rashid1.png', 1, 'Test', '2022-10-25 13:20:17', '2022-10-25 13:20:17'),
(4, 'বুঝে নিন', 'Ongoing', '2022-11-08', '2022-11-08', NULL, '635830bc9a1d5_Core constraction ltd-harunur rashid2 .png', 1, 'পুটিগণ চলুন ঘুরে আসি bandarbn \r\n\r\n০১৭৮০টো৬০৪৯ \r\nমিরপুরে হোক আপনার স্বপ্নের abason \r\nঢাকা।  \r\nহয়ে যাক আরেকবার ? \r\nউত্তরা,ঢাকা \r\nবুকিং শুরু মাত্র  ২০,০ ০ ০ ০ ০  \r\nহাজি ক্যাম্প রোড \r\nবুঝে নিন', '2022-10-25 13:23:48', '2022-10-25 13:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hotel/Resort', '634d9422d1845_png-transparent-azul-hotel-restaurant-computer-icons-boutique-hotel-gratis-hotel-text-rectangle-logo-thumbnail.png', 1, '2022-10-13 14:08:15', '2022-10-17 12:12:58'),
(2, 'Restaurant', '634d944ea48b8_png-clipart-graphics-restaurant-logo-restaurant-thumbnail.png', 1, '2022-10-13 14:08:27', '2022-10-17 13:04:26'),
(3, 'Air ticket', '634da3e752e09_images.png', 1, '2022-10-17 13:20:15', '2022-10-17 13:20:15'),
(4, 'Cruise', '634da3fa19e8c_3202930.png', 1, '2022-10-17 13:20:34', '2022-10-17 13:20:34'),
(5, 'Boat Services', '6358234dc1bce_Core constraction ltd-harunur rashid1.png', 1, '2022-10-25 12:26:29', '2022-10-25 12:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `offer_price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_page` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `location`, `description`, `price`, `offer_price`, `discount`, `latitude`, `longitude`, `contact_no`, `is_active`, `email`, `fb_page`, `website`, `youtube_link`, `created_at`, `updated_at`) VALUES
(1, 'Seagull Hotel', 'Cox\'s Bazar', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \\\"de Finibus Bonorum et Malorum\\\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\\r\\n\\r\\n', '1200.00', '900.00', '30.00', 29, 77.05, '8511137908', 1, 'csesalauddin@gmail.com', 'https://www.facebook.com', 'https://www.google.com', 'https://www.youtube.com/watch?v=2dt2aPEJf6s', NULL, NULL),
(5, 'test', 'Lungotevere Testaccio, Rome, Metropolitan City of Rome, Italy', 'test', '8989.45', '989898.00', '97484.00', 41.8776047, 12.4707214, '989898', 1, 'test@gmail.com', '9test', 'test', 'test', '2022-10-31 12:21:42', '2022-10-31 12:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_books`
--

CREATE TABLE `hotel_books` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `hotel_room_id` bigint UNSIGNED NOT NULL,
  `from` int NOT NULL,
  `to` int DEFAULT NULL,
  `price` int NOT NULL,
  `book_type` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_photos`
--

CREATE TABLE `hotel_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_photos`
--

INSERT INTO `hotel_photos` (`id`, `name`, `hotel_id`, `created_at`, `updated_at`) VALUES
(11, '634da98978ada_front-view.jpg', 1, '2022-10-17 13:44:18', '2022-10-17 13:44:18'),
(44, 'https://ddapp.xomartbd.com/hotel_photos/634da98978ada_front-view.jpg', 1, '2022-10-25 11:52:43', '2022-10-25 11:52:43'),
(45, 'https://ddapp.xomartbd.com/hotel_photos/634da98978ada_front-view.jpg', 1, '2022-10-25 11:53:45', '2022-10-25 11:53:45'),
(46, 'https://ddapp.xomartbd.com/hotel_photos/https://ddapp.xomartbd.com/hotel_photos/634da98978ada_front-view.jpg', 1, '2022-10-25 11:53:45', '2022-10-25 11:53:45'),
(47, 'https://ddapp.xomartbd.com/hotel_photos/634da98978ada_front-view.jpg', 1, '2022-10-25 11:55:01', '2022-10-25 11:55:01'),
(48, 'https://ddapp.xomartbd.com/hotel_photos/https://ddapp.xomartbd.com/hotel_photos/634da98978ada_front-view.jpg', 1, '2022-10-25 11:55:01', '2022-10-25 11:55:01'),
(49, 'https://ddapp.xomartbd.com/hotel_photos/https://ddapp.xomartbd.com/hotel_photos/634da98978ada_front-view.jpg', 1, '2022-10-25 11:55:01', '2022-10-25 11:55:01'),
(50, 'https://ddapp.xomartbd.com/hotel_photos/https://ddapp.xomartbd.com/hotel_photos/https://ddapp.xomartbd.com/hotel_photos/634da98978ada_front-view.jpg', 1, '2022-10-25 11:55:01', '2022-10-25 11:55:01'),
(51, '63600b28e82a7_front-view.jpg', 5, '2022-10-31 12:21:42', '2022-10-31 12:21:42'),
(52, 'https://ddapp.xomartbd.com/hotel_photos/63600b28e82a7_front-view.jpg', 5, '2022-10-31 12:26:47', '2022-10-31 12:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_ratings`
--

CREATE TABLE `hotel_ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `hotel_room_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `rating` decimal(8,2) NOT NULL,
  `feedback` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_rooms`
--

CREATE TABLE `hotel_rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `beds` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baths` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount_price` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `private_policy` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_rooms`
--

INSERT INTO `hotel_rooms` (`id`, `hotel_id`, `title`, `subtitle`, `description`, `beds`, `baths`, `price`, `discount_price`, `discount`, `total`, `private_policy`, `info`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(2, 1, 'Double Room', 'Double Room', 'Double Room', '2', '3', '85.00', '32.00', '15.50', '5', 'Test', 'Test', '2022-10-25', '2022-10-25', '2022-10-22 14:09:31', '2022-10-25 12:04:29'),
(3, 1, 'Why do we use it?', 'Nai', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '10', '4', '5060.00', '20.00', '20.00', '8', 'nai\r\nnai\r\nnai', 'hey', '2022-11-11', '2022-12-31', '2022-11-05 04:27:08', '2022-11-05 04:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_photos`
--

CREATE TABLE `hotel_room_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_room_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_room_photos`
--

INSERT INTO `hotel_room_photos` (`id`, `name`, `hotel_room_id`, `created_at`, `updated_at`) VALUES
(4, NULL, 2, '2022-10-25 12:04:29', '2022-10-25 12:04:29'),
(5, '6366336c8afe8_project.png', 3, '2022-11-05 04:27:08', '2022-11-05 04:27:08');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_services`
--

CREATE TABLE `hotel_services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_services`
--

INSERT INTO `hotel_services` (`id`, `name`, `hotel_id`, `created_at`, `updated_at`) VALUES
(1, 'Breakfast', 1, '2022-09-22 16:10:05', NULL),
(2, 'Launch', 1, '2022-09-22 16:10:05', NULL),
(3, 'Breakfast', 1, '2022-10-01 13:59:00', '2022-10-01 13:59:00'),
(4, 'Launch', 1, '2022-10-01 13:59:00', '2022-10-01 13:59:00'),
(5, 'Breakfast', 1, '2022-10-01 13:59:13', '2022-10-01 13:59:13'),
(6, 'Launch', 1, '2022-10-01 13:59:13', '2022-10-01 13:59:13'),
(7, 'Breakfast', 1, '2022-10-17 13:43:41', '2022-10-17 13:43:41'),
(8, 'Launch', 1, '2022-10-17 13:43:41', '2022-10-17 13:43:41'),
(9, 'Breakfast', 1, '2022-10-17 13:44:18', '2022-10-17 13:44:18'),
(10, 'Launch', 1, '2022-10-17 13:44:18', '2022-10-17 13:44:18'),
(23, 'Breakfast', 1, '2022-10-25 11:52:43', '2022-10-25 11:52:43'),
(24, 'Launch', 1, '2022-10-25 11:52:43', '2022-10-25 11:52:43'),
(25, 'Breakfast', 1, '2022-10-25 11:53:45', '2022-10-25 11:53:45'),
(26, 'Launch', 1, '2022-10-25 11:53:45', '2022-10-25 11:53:45'),
(27, 'Breakfast', 1, '2022-10-25 11:55:01', '2022-10-25 11:55:01'),
(28, 'Launch', 1, '2022-10-25 11:55:01', '2022-10-25 11:55:01'),
(29, 'test', 5, '2022-10-31 12:21:42', '2022-10-31 12:21:42'),
(30, 'test', 5, '2022-10-31 12:26:47', '2022-10-31 12:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_tags`
--

CREATE TABLE `hotel_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_tags`
--

INSERT INTO `hotel_tags` (`id`, `name`, `hotel_id`, `created_at`, `updated_at`) VALUES
(1, 'Resort', 1, '2022-09-22 16:09:23', NULL),
(2, 'Restaurant', 1, '2022-09-22 16:09:37', NULL),
(3, 'Resort', 1, '2022-10-01 13:59:00', '2022-10-01 13:59:00'),
(4, 'Restaurant', 1, '2022-10-01 13:59:00', '2022-10-01 13:59:00'),
(5, 'Resort', 1, '2022-10-01 13:59:13', '2022-10-01 13:59:13'),
(6, 'Restaurant', 1, '2022-10-01 13:59:13', '2022-10-01 13:59:13'),
(7, 'Resort', 1, '2022-10-17 13:43:41', '2022-10-17 13:43:41'),
(8, 'Restaurant', 1, '2022-10-17 13:43:41', '2022-10-17 13:43:41'),
(9, 'Resort', 1, '2022-10-17 13:44:18', '2022-10-17 13:44:18'),
(10, 'Restaurant', 1, '2022-10-17 13:44:18', '2022-10-17 13:44:18'),
(18, 'Resort', 1, '2022-10-25 11:52:43', '2022-10-25 11:52:43'),
(19, 'Restaurant', 1, '2022-10-25 11:52:43', '2022-10-25 11:52:43'),
(20, 'Resort', 1, '2022-10-25 11:53:45', '2022-10-25 11:53:45'),
(21, 'Restaurant', 1, '2022-10-25 11:53:45', '2022-10-25 11:53:45'),
(22, 'Hotel', 1, '2022-10-25 11:53:45', '2022-10-25 11:53:45'),
(23, 'Resort', 1, '2022-10-25 11:55:01', '2022-10-25 11:55:01'),
(24, 'Hotel', 1, '2022-10-25 11:55:01', '2022-10-25 11:55:01'),
(25, 'test', 5, '2022-10-31 12:21:42', '2022-10-31 12:21:42'),
(26, 'test', 5, '2022-10-31 12:26:47', '2022-10-31 12:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_09_20_153934_create_hotel_tags_table', 1),
(14, '2022_09_22_145343_create_hotel_rooms_table', 2),
(16, '2022_09_22_145747_create_hotel_books_table', 2),
(17, '2022_09_22_155825_create_hotel_ratings_table', 2),
(18, '2022_09_20_151341_create_hotels_table', 3),
(19, '2022_09_20_153948_create_hotel_services_table', 4),
(20, '2022_09_23_164009_create_restaurants_table', 5),
(22, '2022_09_23_164049_create_restaurant_tags_table', 5),
(23, '2022_09_23_164308_create_restaurant_menus_table', 5),
(25, '2022_09_23_164542_create_restaurant_menu_tags_table', 5),
(26, '2022_09_23_164646_create_restaurant_menu_foods_table', 5),
(27, '2022_09_23_165050_create_restaurant_menu_food_tags_table', 5),
(28, '2022_09_23_165117_create_restaurant_menu_food_photos_table', 5),
(29, '2022_09_23_165324_create_restaurant_orders_table', 5),
(30, '2022_09_23_170100_create_restaurant_offer_banners_table', 5),
(31, '2022_09_23_170116_create_restaurant_offer_banner_photos_table', 5),
(32, '2022_09_23_164035_create_restaurant_photos_table', 6),
(33, '2022_09_22_144453_create_hotel_photos_table', 7),
(34, '2022_09_22_145509_create_hotel_room_photos_table', 7),
(35, '2022_09_23_164507_create_restaurant_menu_photos_table', 8),
(36, '2022_09_23_164035_create_restaurant_photo_table', 9),
(37, '2014_01_07_073615_create_tagged_table', 10),
(38, '2014_01_07_073615_create_tags_table', 10),
(39, '2016_06_29_073615_create_tag_groups_table', 10),
(40, '2016_06_29_073615_update_tags_table', 10),
(41, '2020_03_13_083515_add_description_to_tags_table', 10),
(42, '2022_09_24_155150_create_restaurant_photos_table', 11),
(43, '2022_09_24_181823_create_permission_tables', 11),
(44, '2022_10_01_133430_create_media_table', 11),
(45, '2022_10_02_182248_add_start_and_end_date_to_hotel_rooms', 12),
(46, '2022_10_06_153609_add_start_date_end_date_to_restaurant_menu_foods_table', 12),
(47, '2022_10_07_180809_create_restaurant_ratings_table', 12),
(48, '2022_10_10_172212_add_fcm_token_to_users', 13),
(49, '2022_10_11_170214_add_referral_to_users_table', 13),
(50, '2022_10_11_181136_add_profile_pic_to_users_table', 13),
(51, '2022_10_11_181846_add_days_discount_traveler_to_users_table', 13),
(52, '2022_10_12_164036_add_provider_name_and_id_to_users_table', 13),
(53, '2022_10_13_175124_create_categories_table', 13),
(54, '2022_10_14_152918_create_campaigns_table', 14),
(55, '2022_10_17_163906_add_campaign_description_to_campaign_table', 15),
(56, '2022_10_22_182444_create_abouts_table', 16),
(57, '2022_10_22_182520_create_pages_table', 16),
(58, '2022_10_31_172608_add_nid_number_to_users_table', 16),
(59, '2022_11_04_182428_add_fb_page_field_to_restaurants_table', 16),
(60, '2022_11_08_173814_add_start_end_date_joined_by_campaign_table', 17),
(61, '2022_11_08_184230_add_weather_emergency_contact_to_users_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 17);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$LvUDzM29ufJ12DsvYxdRDeENISQ9M2zEsjQhUCaEb1Nq8XpPkDJ6y', '2022-10-17 14:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(7, 'App\\Models\\User', 1, 'auth_token', 'e31a6ff07b66c3de02db3f6ab76a4612b1ab7c2d63121336253f54377b19721d', '[\"*\"]', '2022-09-24 09:11:42', '2022-09-24 09:08:56', '2022-09-24 09:11:42'),
(9, 'App\\Models\\User', 1, 'auth_token', '0be3b3712bbab3a1ff6db220e4599e40aada9edcf610cca11ac5d184ffb1e7f4', '[\"*\"]', NULL, '2022-09-26 00:56:17', '2022-09-26 00:56:17'),
(11, 'App\\Models\\User', 5, 'auth_token', 'bdc7da114d04fe0d720b266f66494d527a7c0247c92207caeae93d2295ef6ac6', '[\"*\"]', NULL, '2022-10-07 13:14:16', '2022-10-07 13:14:16'),
(12, 'App\\Models\\User', 6, 'auth_token', '73160e8538532cb025da9e095fa3941811589a283890503ce3b70eab6b977759', '[\"*\"]', NULL, '2022-10-08 06:03:25', '2022-10-08 06:03:25'),
(13, 'App\\Models\\User', 6, 'auth_token', '2d739909f6de8b68fe096298818aefac0cddcb364edddbb78008baf9ac645a84', '[\"*\"]', NULL, '2022-10-08 06:06:56', '2022-10-08 06:06:56'),
(14, 'App\\Models\\User', 6, 'auth_token', 'cb68a3f5fdb8b12b712b8af70e21f7e27c418ea4713f729767455e622446eb31', '[\"*\"]', NULL, '2022-10-08 08:37:48', '2022-10-08 08:37:48'),
(15, 'App\\Models\\User', 6, 'auth_token', '5ce1e8031203810176d5e02166fb284c271077a9dba3a61a3e82a15cf619aaf1', '[\"*\"]', NULL, '2022-10-08 08:43:35', '2022-10-08 08:43:35'),
(16, 'App\\Models\\User', 6, 'auth_token', '8f2db25ebbf3784789405cf8a90fb0138f98445cb95c91115603737301e2d0e4', '[\"*\"]', NULL, '2022-10-08 08:44:21', '2022-10-08 08:44:21'),
(17, 'App\\Models\\User', 6, 'auth_token', '74771f09fdf1c107943da25b3305397ef50385b0e33cbd7d1363f48fc20e10b9', '[\"*\"]', NULL, '2022-10-08 08:45:48', '2022-10-08 08:45:48'),
(18, 'App\\Models\\User', 6, 'auth_token', 'c37fdc33cd7cda17250495df3248d1f90ab240ae07ed7f5fe8ebf80e087667e1', '[\"*\"]', NULL, '2022-10-08 08:50:12', '2022-10-08 08:50:12'),
(19, 'App\\Models\\User', 6, 'auth_token', '06d3771415c13bef26b60e40e20c0087d04e9ddc80b1538094efb951fbb40487', '[\"*\"]', NULL, '2022-10-08 08:54:23', '2022-10-08 08:54:23'),
(20, 'App\\Models\\User', 6, 'auth_token', '6b4ad16fd798cf4c112829a17f97b4559dd66815652f2883ae6768de6c9f4d92', '[\"*\"]', NULL, '2022-10-08 09:16:03', '2022-10-08 09:16:03'),
(21, 'App\\Models\\User', 6, 'auth_token', 'b1dd0eaf163021843cf2912373afa5e298e94d8e9ab1a27403aa472f88fc7409', '[\"*\"]', NULL, '2022-10-08 09:18:47', '2022-10-08 09:18:47'),
(22, 'App\\Models\\User', 6, 'auth_token', '5f75167c5c14ede30f5e1a97924582f9960d65eea6e6b357f1e2adc79e85a22e', '[\"*\"]', NULL, '2022-10-08 09:44:10', '2022-10-08 09:44:10'),
(23, 'App\\Models\\User', 6, 'auth_token', '8ab17eee987b173db5d308512975fcc07387acfccaaa5e35037ee10ec53567c1', '[\"*\"]', NULL, '2022-10-08 10:20:31', '2022-10-08 10:20:31'),
(24, 'App\\Models\\User', 6, 'auth_token', '6e50c03a50be8c7c16e28685bb6b11b9db9fc6a4a6b92876ec59688cf9e499c6', '[\"*\"]', NULL, '2022-10-08 10:22:06', '2022-10-08 10:22:06'),
(25, 'App\\Models\\User', 6, 'auth_token', 'e412a31d123b2af4c8ef18f6fb540da295087ae3bc895938d79d342542ed68c2', '[\"*\"]', NULL, '2022-10-08 10:28:11', '2022-10-08 10:28:11'),
(26, 'App\\Models\\User', 4, 'auth_token', 'ae6b5cda2b7399bd099c9c7050dd81b7204de6c00d610725161d8f691a220f30', '[\"*\"]', NULL, '2022-10-11 01:39:03', '2022-10-11 01:39:03'),
(27, 'App\\Models\\User', 4, 'auth_token', '14124b87ead2441fc956aaa360a11eaab897d261c526183cf8e01977c1630f6a', '[\"*\"]', NULL, '2022-10-11 01:40:04', '2022-10-11 01:40:04'),
(28, 'App\\Models\\User', 4, 'auth_token', 'ac069c2986073eed5ce7f830d3a74b263c4667d6850e271aa406124a9cf67282', '[\"*\"]', NULL, '2022-10-11 04:35:40', '2022-10-11 04:35:40'),
(29, 'App\\Models\\User', 4, 'auth_token', 'e515f67f2cef980672f4920ed3df075a84f779ee5823462dbe9954f645e4a3bd', '[\"*\"]', NULL, '2022-10-11 05:27:29', '2022-10-11 05:27:29'),
(30, 'App\\Models\\User', 4, 'auth_token', 'abbff8576e1e6c26a4265632fa6190c53c92b576423a7b53a4003b6199f36e39', '[\"*\"]', NULL, '2022-10-11 05:49:43', '2022-10-11 05:49:43'),
(31, 'App\\Models\\User', 4, 'auth_token', '666202363a18551b553ba79c5673c388f4e947346a4b42de66ec30ed67ae3321', '[\"*\"]', NULL, '2022-10-11 05:50:49', '2022-10-11 05:50:49'),
(32, 'App\\Models\\User', 4, 'auth_token', 'c4c297d44783ef46d17b0bc80693735c6a496d3fb621ac130dbb8355595b015d', '[\"*\"]', NULL, '2022-10-11 09:08:38', '2022-10-11 09:08:38'),
(33, 'App\\Models\\User', 7, 'auth_token', 'e3c952ee95ad65f5f51b21822008c3fa40a9982a1fecec5551964a2683ced3a0', '[\"*\"]', NULL, '2022-10-12 01:04:19', '2022-10-12 01:04:19'),
(34, 'App\\Models\\User', 8, 'auth_token', '6e717468669ebeb2e5debc3de41b2ea5f77a90e46f87f28e51c1b8af97b00399', '[\"*\"]', NULL, '2022-10-12 01:43:05', '2022-10-12 01:43:05'),
(35, 'App\\Models\\User', 9, 'auth_token', '7db459ad2014d220a272d42f9b784f838958317daa1281ea06fd28cd8bf3dab6', '[\"*\"]', NULL, '2022-10-12 01:43:24', '2022-10-12 01:43:24'),
(36, 'App\\Models\\User', 10, 'auth_token', '90d5237cf0a88fa548362389c41b3e2e6bdc46c883482d028566a4e129efe67c', '[\"*\"]', NULL, '2022-10-12 04:23:18', '2022-10-12 04:23:18'),
(37, 'App\\Models\\User', 7, 'auth_token', '4e0ba698fd039f656aa7018e7e57c971589eca91e637ee76f3dcc05a15541416', '[\"*\"]', '2022-10-13 09:05:53', '2022-10-13 09:04:26', '2022-10-13 09:05:53'),
(38, 'App\\Models\\User', 11, 'auth_token', 'bb26b47f5891adf33bc056cfd95fccfd7c9851f0689b57febcc8d9738e435d24', '[\"*\"]', NULL, '2022-10-13 11:42:39', '2022-10-13 11:42:39'),
(39, 'App\\Models\\User', 11, 'auth_token', '44a05bbf805e02f48da761e733ebde25d13b0eca9aa9e4a0d7227afd289561f7', '[\"*\"]', NULL, '2022-10-13 11:45:38', '2022-10-13 11:45:38'),
(40, 'App\\Models\\User', 13, 'auth_token', 'f714ad66af7a5bce75c735609fe21e217bc0050fb89b394565a66eb34feda403', '[\"*\"]', NULL, '2022-10-13 14:25:52', '2022-10-13 14:25:52'),
(41, 'App\\Models\\User', 14, 'auth_token', 'd333b39ee1e2f90c1c50f9feca1362c1eb5506811daf5ffc6972d93c99c5a99d', '[\"*\"]', NULL, '2022-10-13 14:26:01', '2022-10-13 14:26:01'),
(42, 'App\\Models\\User', 11, 'auth_token', '661d70b03af20f1c8d40e5da7373c042d2e1e4db17504a71ab979178828ccfd4', '[\"*\"]', '2022-10-14 01:20:42', '2022-10-14 01:20:25', '2022-10-14 01:20:42'),
(43, 'App\\Models\\User', 11, 'auth_token', '63da7a107b9c5994d14905f2e4685f28f937f2101b9093f30a9ec417572d96d1', '[\"*\"]', NULL, '2022-10-14 14:23:31', '2022-10-14 14:23:31'),
(44, 'App\\Models\\User', 7, 'auth_token', '95a5eaa5e5c086cf07781ca6b51cfa266e23d0351d74ce812438255f697ec40c', '[\"*\"]', '2022-10-17 03:07:14', '2022-10-15 13:31:38', '2022-10-17 03:07:14'),
(45, 'App\\Models\\User', 7, 'auth_token', '1e1bfc68994cf49ab4ddaf4d8cd6d6be520a61ff45e7ed3aee52b7aa8cfeb15a', '[\"*\"]', '2022-10-17 11:02:37', '2022-10-16 02:58:00', '2022-10-17 11:02:37'),
(46, 'App\\Models\\User', 7, 'auth_token', '2ae1599a061bdb800446b422f81bb8b55e8006f14f07cc3eb4017d22ca418a74', '[\"*\"]', '2022-10-17 03:08:49', '2022-10-16 06:34:00', '2022-10-17 03:08:49'),
(54, 'App\\Models\\User', 17, 'auth_token', 'a4db863521411be3fee7da664f5e23f60915c6960cafa0dbdd3b4344d2de1bdf', '[\"*\"]', NULL, '2022-10-18 08:02:51', '2022-10-18 08:02:51'),
(55, 'App\\Models\\User', 17, 'auth_token', '2238b7b5137106680aacc15883f60f395d67478b3e4f6e68b7632ae6bee23d89', '[\"*\"]', NULL, '2022-10-18 08:03:33', '2022-10-18 08:03:33'),
(65, 'App\\Models\\User', 17, 'auth_token', '97323a6fbe8fcb96d03978748bbe0032ab5cc25521507c865beb5e8575c5b86d', '[\"*\"]', NULL, '2022-10-18 10:09:36', '2022-10-18 10:09:36'),
(66, 'App\\Models\\User', 17, 'auth_token', 'cfa4f77bfc61cb6bcb6d7791475954ccc3e72c7abb737de83458fcde41f58714', '[\"*\"]', NULL, '2022-10-18 10:11:02', '2022-10-18 10:11:02'),
(70, 'App\\Models\\User', 19, 'auth_token', '056b9fe5aa80b0e54393bb4a96460ce505d1e088fea711c5baa836db2549a894', '[\"*\"]', NULL, '2022-10-19 03:52:53', '2022-10-19 03:52:53'),
(71, 'App\\Models\\User', 19, 'auth_token', 'a995b39655952cf50fa07000d6ef72ef5cc74779e59194a47ee956a80f478bff', '[\"*\"]', NULL, '2022-10-19 03:53:09', '2022-10-19 03:53:09'),
(81, 'App\\Models\\User', 17, 'auth_token', 'f0c035e8da87be2731f8e50b48942e45b8ca71b51ddb5ce0cc8ec65ceea85918', '[\"*\"]', NULL, '2022-10-19 10:13:27', '2022-10-19 10:13:27'),
(82, 'App\\Models\\User', 17, 'auth_token', '52f589fcc1537b3977399fa644b5c8127c5129220653d6c345ce56d5fc12286a', '[\"*\"]', NULL, '2022-10-19 10:14:32', '2022-10-19 10:14:32'),
(83, 'App\\Models\\User', 17, 'auth_token', 'f8447db6b8f9cb03f3a29496c72fb8e5c3d8d047099e0dddff7ea513017e3611', '[\"*\"]', NULL, '2022-10-19 10:17:00', '2022-10-19 10:17:00'),
(84, 'App\\Models\\User', 17, 'auth_token', '022472e2cd091ef587e6388591994ea6e0c5b5696235446e91f63942a84cfa8a', '[\"*\"]', NULL, '2022-10-19 12:54:59', '2022-10-19 12:54:59'),
(85, 'App\\Models\\User', 17, 'auth_token', '75ff1ecdbd4c9b22eb608151c79a97edff493b1670c6be1b2c96ffb52a5b4f02', '[\"*\"]', '2022-10-19 13:36:16', '2022-10-19 13:33:26', '2022-10-19 13:36:16'),
(96, 'App\\Models\\User', 19, 'auth_token', '455b41829d7705195a522ca18b107d2c7f113321eea2cc0d5bb7278873d63527', '[\"*\"]', NULL, '2022-10-20 02:45:54', '2022-10-20 02:45:54'),
(112, 'App\\Models\\User', 17, 'auth_token', 'b35bded7210743e8d8963ab96d7ffe512b11bf41901113b226b2767495e461b3', '[\"*\"]', '2022-10-20 12:15:34', '2022-10-20 12:11:49', '2022-10-20 12:15:34'),
(114, 'App\\Models\\User', 17, 'auth_token', 'c78ce3d85bddab8697e50dde3bed91a66f40fbdb8684c79df40475c7c6d090cd', '[\"*\"]', NULL, '2022-10-20 13:03:35', '2022-10-20 13:03:35'),
(115, 'App\\Models\\User', 17, 'auth_token', 'ab3918a4ee3c9b860c9eedc738c51877f450fde4f6bbb62d5486a3eeb76f8b4a', '[\"*\"]', '2022-10-24 05:11:49', '2022-10-20 13:08:18', '2022-10-24 05:11:49'),
(125, 'App\\Models\\User', 3, 'auth_token', '93fa08aa3a4ff41a11b69d28f2fe8174ad71519ce766187a36e06d91d7d80d05', '[\"*\"]', '2022-10-22 04:59:20', '2022-10-22 04:55:30', '2022-10-22 04:59:20'),
(131, 'App\\Models\\User', 17, 'auth_token', 'ae79770f3f192ad6596c46809b57b9170eafbdfb96c8e103892c7caece850ab0', '[\"*\"]', '2022-11-08 08:31:23', '2022-10-22 12:34:38', '2022-11-08 08:31:23'),
(132, 'App\\Models\\User', 17, 'auth_token', 'fcee9ebc641ec063164645173f800d70952173d16830f99999e81aeb6958addf', '[\"*\"]', '2022-10-22 14:12:41', '2022-10-22 13:36:29', '2022-10-22 14:12:41'),
(135, 'App\\Models\\User', 22, 'auth_token', 'e4a48b0f881a18c9519dbcf8572b19a73cf2475f87b15cfdea1b31dfbd28e008', '[\"*\"]', NULL, '2022-10-23 14:51:23', '2022-10-23 14:51:23'),
(142, 'App\\Models\\User', 22, 'auth_token', '54dc617ea5fdf2d369d10b09b1926781f22b68df311e0d6249679550a8c9aa30', '[\"*\"]', '2022-10-25 17:06:40', '2022-10-24 02:22:45', '2022-10-25 17:06:40'),
(148, 'App\\Models\\User', 22, 'auth_token', '1e9797cfdae846e39c0c384cc7766507a1a7bd3069d7357e9b30522fcb40d99e', '[\"*\"]', '2022-10-25 16:52:07', '2022-10-24 03:24:22', '2022-10-25 16:52:07'),
(153, 'App\\Models\\User', 18, 'auth_token', 'ac00ff797bab587960e52b49f2294e831f9c1d45eea3d05cbdac774c3bd8b8bf', '[\"*\"]', '2022-10-25 07:03:59', '2022-10-25 07:03:36', '2022-10-25 07:03:59'),
(157, 'App\\Models\\User', 18, 'auth_token', '513e0641a05ea6b115dddd759075b14b7ceec59296444ff38cb05ce34288e2b6', '[\"*\"]', '2022-10-25 14:17:58', '2022-10-25 13:21:06', '2022-10-25 14:17:58'),
(165, 'App\\Models\\User', 25, 'auth_token', 'd6e4b0d42098fc61d0cd6aaadb142ebc51bb51e72e9015161835e9efd522ce58', '[\"*\"]', NULL, '2022-10-26 00:23:21', '2022-10-26 00:23:21'),
(166, 'App\\Models\\User', 25, 'auth_token', 'bd6dd91e533bc3371549c05a50fe039f66b55478c7c305dadade6086aa877433', '[\"*\"]', '2022-10-31 13:08:56', '2022-10-26 00:28:08', '2022-10-31 13:08:56'),
(170, 'App\\Models\\User', 25, 'auth_token', 'acb25613e39acf4b946f628713d7c2a2c5b5c99a7aa97719b555f3642f490992', '[\"*\"]', '2022-10-26 02:41:34', '2022-10-26 02:39:32', '2022-10-26 02:41:34'),
(173, 'App\\Models\\User', 24, 'auth_token', 'e3003c39f6af23ad6e62a610f98d8f805a7bc03db9929c98257657dd3ec75e86', '[\"*\"]', '2022-10-26 09:51:19', '2022-10-26 09:50:47', '2022-10-26 09:51:19'),
(175, 'App\\Models\\User', 24, 'auth_token', '13aec9941df2cd1db2c30d3c94bcc8b89241d2666e711b493e3fed410de8fd03', '[\"*\"]', '2022-10-27 03:08:54', '2022-10-26 16:40:36', '2022-10-27 03:08:54'),
(176, 'App\\Models\\User', 26, 'auth_token', '2bb00bdbcf34a73516fe3a7375668540585a0a707ab727584168b2ec662df070', '[\"*\"]', NULL, '2022-10-27 05:15:11', '2022-10-27 05:15:11'),
(177, 'App\\Models\\User', 26, 'auth_token', 'a4bdda7770be1c6e773638734ab7b61d4dd886634141dbee222813ccda628f55', '[\"*\"]', '2022-11-10 14:29:55', '2022-10-27 05:15:31', '2022-11-10 14:29:55'),
(178, 'App\\Models\\User', 22, 'auth_token', '590ca768a4b753134b99e8149a41969695634ace8a804b6c0c724d70ca5938d8', '[\"*\"]', NULL, '2022-10-28 06:09:10', '2022-10-28 06:09:10'),
(181, 'App\\Models\\User', 22, 'auth_token', '994f24777a13014decf8edb22ac84f036e022277cef06233068a5e42744195f4', '[\"*\"]', '2022-10-29 10:50:09', '2022-10-29 03:38:48', '2022-10-29 10:50:09'),
(182, 'App\\Models\\User', 22, 'auth_token', '64edc88bed7baaa81c9fe2c79cbe6e595d89505cdcc0ab986ed824b04da0f62d', '[\"*\"]', NULL, '2022-10-29 04:04:00', '2022-10-29 04:04:00'),
(183, 'App\\Models\\User', 16, 'auth_token', '50fac89837de79f51dd9244d8147685320600d4bef9d38981d2c13ae65beaa28', '[\"*\"]', '2022-11-05 21:43:54', '2022-11-05 21:42:44', '2022-11-05 21:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `youtube_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `contact_no` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_page` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `location`, `description`, `latitude`, `longitude`, `youtube_link`, `discount`, `contact_no`, `fb_page`, `website`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Resturent-1', 'Mirpur', 'Best Resturents In Mirpur.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source', 28.68, 77.05, 'https://www.youtube.com/watch?v=jPHNssDvPfs', '10.00', '1974780794', 'Test', 'test', 1, '2022-08-24 13:13:46', '2022-11-04 13:12:50'),
(2, 'Resturent-2', 'Savar', 'Best Resturents In Mirpur.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source', 28.68, 77.05, 'https://www.youtube.com/watch?v=jPHNssDvPfs', '10.00', '1974780794', '', '', 1, '2022-08-24 13:13:46', '2022-08-24 14:01:43'),
(3, 'Resturent-3', 'Dhanmdoni', 'Best Resturents In Mirpur.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source', 28.68, 77.05, 'https://www.youtube.com/watch?v=jPHNssDvPfs', '10.00', '1974780794', '', '', 1, '2022-08-24 13:13:46', '2022-08-24 14:01:47'),
(4, 'Resturent-4', 'Gulshan', 'Best Resturents In Mirpur.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source', 28.68, 77.05, 'https://www.youtube.com/watch?v=jPHNssDvPfs', '10.00', '1974780794', '', '', 1, '2022-08-24 13:13:46', '2022-08-24 14:01:49'),
(5, 'Resturent-5', 'Uttora-12', 'Best Resturents In Mirpur.Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source', 28.68, 77.05, 'https://www.youtube.com/watch?v=jPHNssDvPfs', '10.00', '1974780794', '', '', 1, '2022-08-24 13:13:46', '2022-08-24 14:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menus`
--

CREATE TABLE `restaurant_menus` (
  `id` bigint UNSIGNED NOT NULL,
  `restaurant_id` int NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_menus`
--

INSERT INTO `restaurant_menus` (`id`, `restaurant_id`, `name`, `description`, `discount`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 2, 'Menu-1', 'Menu-1', 85, 1, '2022-10-20 12:15:17', '2022-10-25 12:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menu_foods`
--

CREATE TABLE `restaurant_menu_foods` (
  `id` bigint UNSIGNED NOT NULL,
  `restaurant_id` bigint UNSIGNED NOT NULL,
  `restaurant_menu_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `list` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount` int NOT NULL,
  `discount_price` decimal(8,2) NOT NULL,
  `delivery_charge` decimal(8,2) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menu_food_photos`
--

CREATE TABLE `restaurant_menu_food_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_menu_food_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menu_food_tags`
--

CREATE TABLE `restaurant_menu_food_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_menu_food_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menu_photos`
--

CREATE TABLE `restaurant_menu_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_menu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_menu_photos`
--

INSERT INTO `restaurant_menu_photos` (`id`, `name`, `restaurant_menu_id`, `created_at`, `updated_at`) VALUES
(1, '6351891968f5e_360_F_185972069_xnVh0vjWJp6fjZ01XEMpN8qYB0OPTE5H.jpg', 1, '2022-10-20 12:15:17', '2022-10-20 12:15:17'),
(2, '6351891968f5e_360_F_185972069_xnVh0vjWJp6fjZ01XEMpN8qYB0OPTE5H.jpg', 1, '2022-10-25 12:09:16', '2022-10-25 12:09:16'),
(3, '6351891968f5e_360_F_185972069_xnVh0vjWJp6fjZ01XEMpN8qYB0OPTE5H.jpg', 1, '2022-10-25 12:12:00', '2022-10-25 12:12:00'),
(4, '6351891968f5e_360_F_185972069_xnVh0vjWJp6fjZ01XEMpN8qYB0OPTE5H.jpg', 1, '2022-10-25 12:12:00', '2022-10-25 12:12:00'),
(5, '63581fd1d948a_Core constraction ltd-harunur rashid2 .png', 1, '2022-10-25 12:12:00', '2022-10-25 12:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menu_tags`
--

CREATE TABLE `restaurant_menu_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_menu_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_menu_tags`
--

INSERT INTO `restaurant_menu_tags` (`id`, `name`, `restaurant_menu_id`, `created_at`, `updated_at`) VALUES
(1, 'Lunch', 1, '2022-10-20 12:15:17', '2022-10-20 12:15:17'),
(2, 'Breakfast', 1, '2022-10-20 12:15:17', '2022-10-20 12:15:17'),
(3, 'Lunch', 1, '2022-10-25 12:09:16', '2022-10-25 12:09:16'),
(4, 'Breakfast', 1, '2022-10-25 12:09:16', '2022-10-25 12:09:16'),
(5, 'Lunch', 1, '2022-10-25 12:12:00', '2022-10-25 12:12:00'),
(6, 'Breakfast', 1, '2022-10-25 12:12:00', '2022-10-25 12:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_offer_banners`
--

CREATE TABLE `restaurant_offer_banners` (
  `id` bigint UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_offer_banner_photos`
--

CREATE TABLE `restaurant_offer_banner_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_offer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_orders`
--

CREATE TABLE `restaurant_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `restaurant_id` bigint UNSIGNED NOT NULL,
  `restaurant_menu_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `restaurant_menu_food_id` bigint UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `delivery_charge` decimal(8,2) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `order_status` enum('Pending','Confirmed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_photos`
--

CREATE TABLE `restaurant_photos` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_photos`
--

INSERT INTO `restaurant_photos` (`id`, `name`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(2, '634d958e600da_26854629_10155985210475396_1284743801_o.jpg', 2, '2022-10-17 12:19:37', '2022-10-17 12:19:37'),
(4, '63655dacbead9_download (1).jpg', 1, '2022-11-04 13:15:04', '2022-11-04 13:15:04'),
(5, '63655daf056b0_download (3).jpg', 1, '2022-11-04 13:15:04', '2022-11-04 13:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_ratings`
--

CREATE TABLE `restaurant_ratings` (
  `id` bigint UNSIGNED NOT NULL,
  `restaurant_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `rating` decimal(8,2) NOT NULL,
  `feedback` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_ratings`
--

INSERT INTO `restaurant_ratings` (`id`, `restaurant_id`, `user_id`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
(2, 2, 4, '3.00', 'It\'s best', '2022-10-14 19:54:31', '2022-10-14 19:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_tags`
--

CREATE TABLE `restaurant_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restaurant_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_tags`
--

INSERT INTO `restaurant_tags` (`id`, `name`, `restaurant_id`, `created_at`, `updated_at`) VALUES
(1, 'Restaurant', 1, '2022-10-14 14:08:54', '2022-10-14 14:08:54'),
(2, 'Restaurant', 2, '2022-10-17 12:19:37', '2022-10-17 12:19:37'),
(3, 'Restaurant', 1, '2022-11-04 13:14:51', '2022-11-04 13:14:51'),
(4, 'Restaurant', 1, '2022-11-04 13:15:04', '2022-11-04 13:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-10-17 13:41:39', '2022-10-17 13:41:39'),
(2, 'subadmin', 'web', '2022-10-17 13:41:45', '2022-10-17 13:41:45'),
(3, 'Manager', 'web', '2022-10-25 12:25:02', '2022-10-25 12:25:02'),
(5, 'edit', 'web', '2022-11-05 04:29:00', '2022-11-05 04:29:00'),
(6, 'Neu', 'web', '2022-11-05 08:02:04', '2022-11-05 08:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tagged`
--

CREATE TABLE `tagging_tagged` (
  `id` int UNSIGNED NOT NULL,
  `taggable_id` int UNSIGNED NOT NULL,
  `taggable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tags`
--

CREATE TABLE `tagging_tags` (
  `id` int UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suggest` tinyint(1) NOT NULL DEFAULT '0',
  `count` int UNSIGNED NOT NULL DEFAULT '0',
  `tag_group_id` int UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tag_groups`
--

CREATE TABLE `tagging_tag_groups` (
  `id` int UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `is_admin` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referred_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliate_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` text COLLATE utf8mb4_unicode_ci,
  `no_of_days_remaining` int NOT NULL DEFAULT '0',
  `discounts_claimed` int NOT NULL DEFAULT '0',
  `taka_saved_traveling` int NOT NULL DEFAULT '0',
  `provider_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid_number` bigint DEFAULT NULL,
  `weather` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile_number`, `gender`, `birth_date`, `city`, `location`, `prefer`, `password`, `status`, `is_admin`, `remember_token`, `referred_by`, `affiliate_id`, `profile_pic`, `no_of_days_remaining`, `discounts_claimed`, `taka_saved_traveling`, `provider_name`, `avatar`, `profile_url`, `provider_id`, `nid_number`, `weather`, `emergency_contact`, `fcm_token`, `created_at`, `updated_at`) VALUES
(3, 'Rakib', 'arakib259@gmail.com', '8511137908', 'male', NULL, 'Rajkot', '23.810331,90.412521', 'Mountain,Rever', '$2y$10$6ZRroX/2.fypBDs6pvV5.ess.x9kguzISJ6hb7pHOp6WLY5KJWYee', 'active', 0, NULL, NULL, '', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '2022-09-26 00:44:58', '2022-09-26 00:44:58'),
(4, 'admin', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$JN0PMbx4Tm5ICL4hQsogDetHvMXUv.5iTw3ypqQppWvo8br9k9ByC', 'active', 0, NULL, NULL, '', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '2022-10-01 13:58:05', '2022-10-19 12:37:04'),
(6, 'Shakil', 'shakil@gmail.com', '01712345678', 'male', NULL, 'mirpur', '23.810331,90.412521', 'Mountain', '$2y$10$bRV1MnN/cr4nuEruM9DYV.taG0/cZY0Y5c8sP5q7YSd3Wc.anN3mS', 'active', 0, NULL, NULL, '', NULL, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '2022-10-08 06:03:25', '2022-10-08 06:03:25'),
(16, 'Rasel Hossen', 'straselhossen24@gmail.com', '01755936313', 'Male', '1999-12-12', 'Dhaka', NULL, 'Rivers,Mountains', '$2y$10$K52KxAmCrm9xM/Feip2/auUQKs0iQJElXBSPEsv4FEqkchMAArKB6', 'inactive', 0, NULL, NULL, 'i7ra2', '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '2022-10-18 06:11:36', '2022-10-18 06:11:36'),
(17, 'shilpa vadoliya', 'shilpavadoliya@gmail.com', '8798987987', 'female', '2002-01-25', 'dhama', NULL, 'Mountains,Rivers,Desert', '$2y$10$VJA0vVX/AWiN.CA.b1mX4u2XymjrGNOWpqKhL51PBKNqzvnLZquuW', 'inactive', 0, NULL, NULL, 'syLFg', '63655e508aa25_download (2).jpg', 0, 0, 0, NULL, NULL, NULL, NULL, 787878, '', '', NULL, '2022-10-18 08:02:51', '2022-11-08 12:22:33'),
(19, 'Mr Jovan', 'mail@gmail.com', '1778970288', 'Male', '2002-01-01', NULL, NULL, 'Mountains', '$2y$10$B6nz.W0OR.jhZmSWv5nWzO3tdx3uvvoKoaW.vUQ4rSWPbV/B6N0EO', 'inactive', 0, NULL, NULL, 'NuORD', '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '2022-10-19 03:52:53', '2022-10-19 03:52:53'),
(25, 'abdullah rakib', 'realtime262@gmail.com', '1717940879', 'Male', '1995-02-19', 'Dhaka', NULL, 'Mountains', '$2y$10$m/t.IgR619/gX052sAexmu3/Dg/yZFFlpfWm84zeR3tkSUEleVJ92', 'inactive', 0, NULL, NULL, 'tQ3PP', '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '2022-10-24 03:13:10', '2022-10-24 03:13:10'),
(26, 'masud', 'memyrana@gmail.com', '01648050363', 'Male', '1992-01-01', 'dhaka', NULL, 'Rivers,Sea', '$2y$10$u4lyhDVIM.IkrE81mp.l1eaja15z8gQPKrEBEBMuSLTQaCnBcziqm', 'inactive', 0, NULL, NULL, 'N9gmz', '', 0, 0, 0, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '2022-10-27 05:15:11', '2022-10-27 05:15:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_books`
--
ALTER TABLE `hotel_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_books_user_id_foreign` (`user_id`),
  ADD KEY `hotel_books_hotel_id_foreign` (`hotel_id`),
  ADD KEY `hotel_books_hotel_room_id_foreign` (`hotel_room_id`);

--
-- Indexes for table `hotel_photos`
--
ALTER TABLE `hotel_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_photos_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `hotel_ratings`
--
ALTER TABLE `hotel_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_ratings_hotel_id_foreign` (`hotel_id`),
  ADD KEY `hotel_ratings_hotel_room_id_foreign` (`hotel_room_id`),
  ADD KEY `hotel_ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_rooms_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `hotel_room_photos`
--
ALTER TABLE `hotel_room_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_room_photos_hotel_room_id_foreign` (`hotel_room_id`);

--
-- Indexes for table `hotel_services`
--
ALTER TABLE `hotel_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_services_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `hotel_tags`
--
ALTER TABLE `hotel_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_tags_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

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
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_menus`
--
ALTER TABLE `restaurant_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_menu_foods`
--
ALTER TABLE `restaurant_menu_foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_menu_foods_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `restaurant_menu_foods_restaurant_menu_id_foreign` (`restaurant_menu_id`);

--
-- Indexes for table `restaurant_menu_food_photos`
--
ALTER TABLE `restaurant_menu_food_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_menu_food_photos_restaurant_menu_food_id_foreign` (`restaurant_menu_food_id`);

--
-- Indexes for table `restaurant_menu_food_tags`
--
ALTER TABLE `restaurant_menu_food_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_menu_food_tags_restaurant_menu_food_id_foreign` (`restaurant_menu_food_id`);

--
-- Indexes for table `restaurant_menu_photos`
--
ALTER TABLE `restaurant_menu_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_menu_photos_restaurant_menu_id_foreign` (`restaurant_menu_id`);

--
-- Indexes for table `restaurant_menu_tags`
--
ALTER TABLE `restaurant_menu_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_menu_tags_restaurant_menu_id_foreign` (`restaurant_menu_id`);

--
-- Indexes for table `restaurant_offer_banners`
--
ALTER TABLE `restaurant_offer_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_offer_banner_photos`
--
ALTER TABLE `restaurant_offer_banner_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_offer_banner_photos_restaurant_offer_id_foreign` (`restaurant_offer_id`);

--
-- Indexes for table `restaurant_orders`
--
ALTER TABLE `restaurant_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_orders_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `restaurant_orders_restaurant_menu_id_foreign` (`restaurant_menu_id`),
  ADD KEY `restaurant_orders_restaurant_menu_food_id_foreign` (`restaurant_menu_food_id`),
  ADD KEY `restaurant_orders_user_id_foreign` (`user_id`) USING BTREE;

--
-- Indexes for table `restaurant_photos`
--
ALTER TABLE `restaurant_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_photos_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `restaurant_ratings`
--
ALTER TABLE `restaurant_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_ratings_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `restaurant_ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `restaurant_tags`
--
ALTER TABLE `restaurant_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurant_tags_restaurant_id_foreign` (`restaurant_id`);

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
-- Indexes for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tagged_taggable_id_index` (`taggable_id`),
  ADD KEY `tagging_tagged_taggable_type_index` (`taggable_type`),
  ADD KEY `tagging_tagged_tag_slug_index` (`tag_slug`);

--
-- Indexes for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tags_slug_index` (`slug`),
  ADD KEY `tagging_tags_tag_group_id_foreign` (`tag_group_id`);

--
-- Indexes for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tag_groups_slug_index` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_referred_by_index` (`referred_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hotel_books`
--
ALTER TABLE `hotel_books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_photos`
--
ALTER TABLE `hotel_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `hotel_ratings`
--
ALTER TABLE `hotel_ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hotel_room_photos`
--
ALTER TABLE `hotel_room_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel_services`
--
ALTER TABLE `hotel_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `hotel_tags`
--
ALTER TABLE `hotel_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurant_menus`
--
ALTER TABLE `restaurant_menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `restaurant_menu_foods`
--
ALTER TABLE `restaurant_menu_foods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_menu_food_photos`
--
ALTER TABLE `restaurant_menu_food_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_menu_food_tags`
--
ALTER TABLE `restaurant_menu_food_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_menu_photos`
--
ALTER TABLE `restaurant_menu_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurant_menu_tags`
--
ALTER TABLE `restaurant_menu_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `restaurant_offer_banners`
--
ALTER TABLE `restaurant_offer_banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_offer_banner_photos`
--
ALTER TABLE `restaurant_offer_banner_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_orders`
--
ALTER TABLE `restaurant_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_photos`
--
ALTER TABLE `restaurant_photos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restaurant_ratings`
--
ALTER TABLE `restaurant_ratings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurant_tags`
--
ALTER TABLE `restaurant_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel_books`
--
ALTER TABLE `hotel_books`
  ADD CONSTRAINT `hotel_books_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_books_hotel_room_id_foreign` FOREIGN KEY (`hotel_room_id`) REFERENCES `hotel_rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_photos`
--
ALTER TABLE `hotel_photos`
  ADD CONSTRAINT `hotel_photos_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_ratings`
--
ALTER TABLE `hotel_ratings`
  ADD CONSTRAINT `hotel_ratings_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_ratings_hotel_room_id_foreign` FOREIGN KEY (`hotel_room_id`) REFERENCES `hotel_rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  ADD CONSTRAINT `hotel_rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_room_photos`
--
ALTER TABLE `hotel_room_photos`
  ADD CONSTRAINT `hotel_room_photos_hotel_room_id_foreign` FOREIGN KEY (`hotel_room_id`) REFERENCES `hotel_rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_services`
--
ALTER TABLE `hotel_services`
  ADD CONSTRAINT `hotel_services_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_tags`
--
ALTER TABLE `hotel_tags`
  ADD CONSTRAINT `hotel_tags_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `restaurant_menu_foods`
--
ALTER TABLE `restaurant_menu_foods`
  ADD CONSTRAINT `restaurant_menu_foods_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_menu_foods_restaurant_menu_id_foreign` FOREIGN KEY (`restaurant_menu_id`) REFERENCES `restaurant_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_menu_food_photos`
--
ALTER TABLE `restaurant_menu_food_photos`
  ADD CONSTRAINT `restaurant_menu_food_photos_restaurant_menu_food_id_foreign` FOREIGN KEY (`restaurant_menu_food_id`) REFERENCES `restaurant_menu_foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_menu_food_tags`
--
ALTER TABLE `restaurant_menu_food_tags`
  ADD CONSTRAINT `restaurant_menu_food_tags_restaurant_menu_food_id_foreign` FOREIGN KEY (`restaurant_menu_food_id`) REFERENCES `restaurant_menu_foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_menu_photos`
--
ALTER TABLE `restaurant_menu_photos`
  ADD CONSTRAINT `restaurant_menu_photos_restaurant_menu_id_foreign` FOREIGN KEY (`restaurant_menu_id`) REFERENCES `restaurant_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_menu_tags`
--
ALTER TABLE `restaurant_menu_tags`
  ADD CONSTRAINT `restaurant_menu_tags_restaurant_menu_id_foreign` FOREIGN KEY (`restaurant_menu_id`) REFERENCES `restaurant_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_offer_banner_photos`
--
ALTER TABLE `restaurant_offer_banner_photos`
  ADD CONSTRAINT `restaurant_offer_banner_photos_restaurant_offer_id_foreign` FOREIGN KEY (`restaurant_offer_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_orders`
--
ALTER TABLE `restaurant_orders`
  ADD CONSTRAINT `restaurant_orders_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_orders_restaurant_menu_food_id_foreign` FOREIGN KEY (`restaurant_menu_food_id`) REFERENCES `restaurant_menu_foods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_orders_restaurant_menu_id_foreign` FOREIGN KEY (`restaurant_menu_id`) REFERENCES `restaurant_menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_photos`
--
ALTER TABLE `restaurant_photos`
  ADD CONSTRAINT `restaurant_photos_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_ratings`
--
ALTER TABLE `restaurant_ratings`
  ADD CONSTRAINT `restaurant_ratings_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_tags`
--
ALTER TABLE `restaurant_tags`
  ADD CONSTRAINT `restaurant_tags_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD CONSTRAINT `tagging_tags_tag_group_id_foreign` FOREIGN KEY (`tag_group_id`) REFERENCES `tagging_tag_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
