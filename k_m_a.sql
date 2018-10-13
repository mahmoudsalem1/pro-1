-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2018 at 02:10 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k_m_a`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `slug`, `image`, `status`, `featured`, `views`, `created_at`, `updated_at`) VALUES
(1, 'apple', '[{"image":"\\/filemanager\\/photos\\/1\\/5bbb7173328ca.png","title":{"en":null}}]', 1, 1, 0, '2018-10-08 13:02:30', '2018-10-08 13:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `brands_lang`
--

CREATE TABLE IF NOT EXISTS `brands_lang` (
  `id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `brand_id` int(10) unsigned NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `keywords` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands_lang`
--

INSERT INTO `brands_lang` (`id`, `status`, `featured`, `brand_id`, `lang`, `title`, `description`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'en', 'apple', NULL, NULL, '2018-10-08 13:02:30', '2018-10-08 13:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `title`, `address`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mahmoud', 'v@v.com', '121221', 'contact', 'asas', 'asas', 1, '2018-09-08 22:00:00', '2018-09-17 11:57:52'),
(2, 'vadecom', 'admin@vadecom.net', '100000000', 'test 1', NULL, 'test test test', 1, '2018-09-30 07:58:39', '2018-09-30 08:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

CREATE TABLE IF NOT EXISTS `langs` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`id`, `name`, `code`, `flag`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'عربى', 'ar', 'eg', NULL, 0, '2018-08-29 22:00:00', NULL),
(2, 'English', 'en', 'gb', NULL, 1, '2018-08-29 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) unsigned NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `link_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus_lang`
--

CREATE TABLE IF NOT EXISTS `menus_lang` (
  `id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_08_30_082043_create_langs_table', 2),
(7, '2018_08_30_083218_create_roles_table', 3),
(9, '2018_08_30_142716_create_settings_table', 4),
(10, '2018_09_02_081620_create_contacts_table', 5),
(12, '2018_09_02_131032_create_pages_table', 6),
(13, '2018_09_16_102737_create_page_catgories_table', 7),
(15, '2018_09_16_115049_create_sliders_table', 8),
(16, '2018_09_16_130153_add_categorey_id_to_pages_table', 9),
(17, '2018_09_16_144220_create_socials_table', 10),
(19, '2018_09_17_135956_create_menus_table', 11),
(20, '2018_09_30_134923_create_products_table', 11),
(21, '2018_10_08_135214_create_brands_table', 12),
(22, '2018_10_10_091352_create_product_categories_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `modules` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages_lang`
--

CREATE TABLE IF NOT EXISTS `pages_lang` (
  `id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `page_id` int(10) unsigned NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `keywords` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_categories`
--

CREATE TABLE IF NOT EXISTS `page_categories` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_categories_lang`
--

CREATE TABLE IF NOT EXISTS `page_categories_lang` (
  `id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `page_catgory_id` int(10) unsigned NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `keywords` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL,
  `for` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `for`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'users', 'create', 1, '2018-08-29 22:00:00', NULL),
(2, 'users', 'edit', 1, '2018-08-29 22:00:00', NULL),
(3, 'users', 'show', 1, '2018-08-29 22:00:00', NULL),
(4, 'users', 'delete', 1, '2018-08-29 22:00:00', NULL),
(5, 'roles', 'create', 1, '2018-08-29 22:00:00', NULL),
(6, 'roles', 'edit', 1, '2018-08-29 22:00:00', NULL),
(7, 'roles', 'show', 1, '2018-08-29 22:00:00', NULL),
(8, 'roles', 'delete', 1, '2018-08-29 22:00:00', NULL),
(9, 'settings', 'edit', 1, '2018-08-29 22:00:00', NULL),
(10, 'contacts', 'show', 1, '2018-09-01 22:00:00', NULL),
(11, 'pages', 'create', 1, '2018-09-01 22:00:00', NULL),
(12, 'pages', 'edit', 1, '2018-09-01 22:00:00', NULL),
(13, 'pages', 'show', 1, '2018-09-01 22:00:00', NULL),
(14, 'pages', 'delete', 1, '2018-09-01 22:00:00', NULL),
(15, 'page-categories', 'create', 1, '2018-09-15 22:00:00', NULL),
(16, 'page-categories', 'edit', 1, '2018-09-15 22:00:00', NULL),
(17, 'page-categories', 'show', 1, '2018-09-15 22:00:00', NULL),
(18, 'page-categories', 'delete', 1, '2018-09-15 22:00:00', NULL),
(19, 'sliders', 'create', 1, '2018-09-15 22:00:00', NULL),
(20, 'sliders', 'edit', 1, '2018-09-15 22:00:00', NULL),
(21, 'sliders', 'show', 1, '2018-09-15 22:00:00', NULL),
(22, 'sliders', 'delete', 1, '2018-09-15 22:00:00', NULL),
(23, 'socials', 'edit', 1, '2018-09-15 22:00:00', NULL),
(24, 'menus', 'create', 1, '2018-09-26 22:00:00', NULL),
(25, 'menus', 'edit', 1, '2018-09-26 22:00:00', NULL),
(26, 'menus', 'show', 1, '2018-09-26 22:00:00', NULL),
(27, 'menus', 'delete', 1, '2018-09-26 22:00:00', NULL),
(28, 'product-categories', 'create', 1, '2018-09-29 22:00:00', NULL),
(29, 'product-categories', 'edit', 1, '2018-09-29 22:00:00', NULL),
(30, 'product-categories', 'show', 1, '2018-09-29 22:00:00', NULL),
(31, 'product-categories', 'delete', 1, '2018-09-29 22:00:00', NULL),
(32, 'products', 'create', 1, '2018-09-29 22:00:00', NULL),
(33, 'products', 'edit', 1, '2018-09-29 22:00:00', NULL),
(34, 'products', 'show', 1, '2018-09-29 22:00:00', NULL),
(35, 'products', 'delete', 1, '2018-09-29 22:00:00', NULL),
(36, 'brands', 'create', 1, '2018-10-07 22:00:00', NULL),
(37, 'brands', 'edit', 1, '2018-10-07 22:00:00', NULL),
(38, 'brands', 'show', 1, '2018-10-07 22:00:00', NULL),
(39, 'brands', 'delete', 1, '2018-10-07 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(195) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_id` int(10) unsigned DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `slug`, `price`, `product_category_id`, `brand_id`, `image`, `status`, `featured`, `views`, `created_at`, `updated_at`) VALUES
(1, 'product-1', '77.1', 1, 1, '[{"image":"\\/filemanager\\/photos\\/1\\/5bbb7173328ca.png","title":{"en":"product 1"}}]', 1, 1, 0, '2018-10-08 13:33:36', '2018-10-10 11:37:20'),
(3, '44444444', '77.2', 2, 1, '[{"image":"\\/filemanager\\/photos\\/1\\/5bbb7173328ca.png","title":{"en":"44444444"}}]', 1, 1, 0, '2018-10-10 08:14:11', '2018-10-10 11:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE IF NOT EXISTS `products_categories` (
  `id` int(10) unsigned NOT NULL,
  `product_category_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `product_category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 2, 3, NULL, NULL),
(3, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_lang`
--

CREATE TABLE IF NOT EXISTS `products_lang` (
  `id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `product_id` int(10) unsigned NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `keywords` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_lang`
--

INSERT INTO `products_lang` (`id`, `status`, `featured`, `product_id`, `lang`, `title`, `content`, `description`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'en', 'product 1', '<p>dfdsf sdfsd fsddfs&nbsp;</p>', NULL, NULL, '2018-10-08 13:33:36', '2018-10-10 11:37:20'),
(3, 1, 1, 3, 'en', '44444444', '<p>sdf dfdsf sdsdfs</p>', NULL, NULL, '2018-10-10 08:14:11', '2018-10-10 11:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `slug`, `parent_id`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'apple', NULL, 1, 1, '2018-10-08 13:31:50', '2018-10-10 08:38:54'),
(2, 'dssdfs', 1, 1, 1, '2018-10-10 07:05:00', '2018-10-10 08:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories_lang`
--

CREATE TABLE IF NOT EXISTS `product_categories_lang` (
  `id` int(10) unsigned NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `product_category_id` int(10) unsigned NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `keywords` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories_lang`
--

INSERT INTO `product_categories_lang` (`id`, `featured`, `status`, `product_category_id`, `lang`, `title`, `description`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'en', 'apple', NULL, NULL, '2018-10-08 13:31:50', '2018-10-10 08:38:54'),
(2, 1, 1, 2, 'en', 'dssdfs', NULL, NULL, '2018-10-10 07:05:00', '2018-10-10 08:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-08-29 22:00:00', NULL),
(2, 1, '2018-10-02 09:04:49', '2018-10-02 09:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `roles_lang`
--

CREATE TABLE IF NOT EXISTS `roles_lang` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_lang`
--

INSERT INTO `roles_lang` (`id`, `role_id`, `lang`, `name`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'المدير', 'يملك كل صلاحيات الموقع', '2018-08-29 22:00:00', NULL),
(2, 1, 'en', 'Admin', 'has all permissions', '2018-08-29 22:00:00', NULL),
(3, 2, 'ar', 'كاتب', NULL, '2018-10-02 09:04:49', '2018-10-02 09:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE IF NOT EXISTS `role_permission` (
  `id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-08-29 22:00:00', NULL),
(2, 1, 2, '2018-08-29 22:00:00', NULL),
(3, 1, 3, '2018-08-29 22:00:00', NULL),
(4, 1, 4, '2018-08-29 22:00:00', NULL),
(5, 1, 5, '2018-08-29 22:00:00', NULL),
(6, 1, 6, '2018-08-29 22:00:00', NULL),
(7, 1, 7, '2018-08-29 22:00:00', NULL),
(8, 1, 8, '2018-08-29 22:00:00', NULL),
(19, 1, 9, '2018-08-29 22:00:00', NULL),
(20, 1, 10, '2018-09-01 22:00:00', NULL),
(21, 1, 11, '2018-09-01 22:00:00', NULL),
(22, 1, 12, '2018-09-01 22:00:00', NULL),
(23, 1, 13, '2018-09-01 22:00:00', NULL),
(24, 1, 14, '2018-09-01 22:00:00', NULL),
(25, 1, 15, NULL, NULL),
(26, 1, 16, '2018-09-15 22:00:00', NULL),
(27, 1, 17, '2018-09-15 22:00:00', NULL),
(28, 1, 18, '2018-09-15 22:00:00', NULL),
(29, 1, 19, '2018-09-15 22:00:00', NULL),
(30, 1, 20, '2018-09-15 22:00:00', NULL),
(31, 1, 21, '2018-09-15 22:00:00', NULL),
(32, 1, 22, '2018-09-15 22:00:00', NULL),
(33, 1, 23, '2018-09-15 22:00:00', NULL),
(34, 1, 24, '2018-09-26 22:00:00', NULL),
(35, 1, 25, '2018-09-26 22:00:00', NULL),
(36, 1, 26, '2018-09-26 22:00:00', NULL),
(37, 1, 27, '2018-09-26 22:00:00', NULL),
(38, 1, 28, '2018-09-29 22:00:00', NULL),
(39, 1, 29, '2018-09-29 22:00:00', NULL),
(40, 1, 30, '2018-09-29 22:00:00', NULL),
(41, 1, 31, '2018-09-29 22:00:00', NULL),
(42, 1, 32, '2018-09-29 22:00:00', NULL),
(43, 1, 33, '2018-09-29 22:00:00', NULL),
(44, 1, 34, '2018-09-29 22:00:00', NULL),
(45, 1, 35, '2018-09-29 22:00:00', NULL),
(46, 2, 11, NULL, NULL),
(47, 2, 12, NULL, NULL),
(48, 2, 13, NULL, NULL),
(49, 2, 14, NULL, NULL),
(50, 1, 36, '2018-10-07 22:00:00', NULL),
(51, 1, 37, '2018-10-07 22:00:00', NULL),
(52, 1, 38, '2018-10-07 22:00:00', NULL),
(53, 1, 39, '2018-10-07 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isOption` tinyint(1) NOT NULL DEFAULT '0',
  `options` text COLLATE utf8mb4_unicode_ci,
  `sort_number` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `slug`, `value`, `type`, `lang`, `isOption`, `options`, `sort_number`, `created_at`, `updated_at`) VALUES
(1, 'title', 'عنوان الموقع', 'شركة التوفيق للحلاوة الطحينية والطحينة', 'text', 'ar', 0, NULL, 0, '2018-08-29 22:00:00', '2018-09-30 07:01:30'),
(2, 'title', 'Website Title', 'project en', 'text', 'en', 0, NULL, 0, '2018-08-29 22:00:00', NULL),
(3, 'site_keys', 'الكلمات المفتاحية للموقع', '1', 'textarea', 'ar', 0, NULL, 99, '2018-08-29 22:00:00', NULL),
(4, 'site_keys', 'Keywords', '1', 'textarea', 'en', 0, NULL, 99, '2018-08-29 22:00:00', NULL),
(5, 'site_desc', 'وصف الموقع', '1', 'textarea', 'ar', 0, NULL, 100, '2018-08-29 22:00:00', NULL),
(6, 'site_desc', 'description', '1', 'textarea', 'en', 0, NULL, 100, '2018-08-29 22:00:00', NULL),
(7, 'website_status', 'حالة الموقع', '0', 'select', 'ar', 1, 'متاح,مغلق', 1, '2018-08-29 22:00:00', '2018-09-30 11:32:09'),
(8, 'website_status', 'Website status', '1', 'select', 'en', 1, 'closed,open', 1, '2018-08-29 22:00:00', '2018-10-08 11:22:26'),
(9, 'closed_msg', 'محتوى صفحة غلق الموقع', '<p>الموقع مغلق للصيانه</p>', 'editor', 'ar', 0, NULL, 2, '2018-08-29 22:00:00', '2018-09-30 11:30:42'),
(10, 'closed_msg', 'Content of closing the website', '0', 'editor', 'en', 0, NULL, 2, '2018-08-29 22:00:00', NULL),
(11, 'header', 'اضافة فى الهدير', NULL, 'script', 'ar', 0, NULL, 20, '2018-09-16 22:00:00', '2018-10-01 12:08:57'),
(12, 'header', 'Add in head', NULL, 'script', 'en', 0, NULL, 20, '2018-09-16 22:00:00', NULL),
(13, 'footer', 'إضافة فى الفوتر', NULL, 'script', 'ar', 0, NULL, 21, '2018-09-16 22:00:00', NULL),
(14, 'footer', 'Add in footer ', NULL, 'script', 'en', 0, NULL, 21, '2018-09-16 22:00:00', NULL),
(15, 'site_word_content', 'الكلمة الرئيسية للموقع', 'تعودنا ان يكون رضاء العميل ونوعية الخدمة كلاهما محل اهتمام شديد الا ان تعريف رضاء العميل ونوعية الخدمه يتفاوت من شركة الى اخرى .\n\nتوصلنا الى أن رضاء العميل والنوعية المتميزة من الخدمة يجب ان يكون كلاهما اولى الأولويات ولكن بمفهوم جديد يخاطب كافه المستويات وبفكر جديد', 'textarea', 'ar', 0, NULL, 3, '2018-09-29 22:00:00', NULL),
(16, 'site_word_content', 'Main website word', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown\nprinter took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap', 'textarea', 'en', 0, NULL, 3, '2018-09-29 22:00:00', NULL),
(17, 'site_footer_content', 'محتوى نبذة الموقع فى الفوتر', 'تم انشائها 1975 يتم انتاج منتجات من اجود المنتجات والشركة حاصلة على شهادة سلامة الغذاء العالمية الايزو ومن منتجات الشركة طحينة وسمسم بجميع انواعه و حلاوة طحينية و عسل اسود .', 'textarea', 'ar', 0, NULL, 4, '2018-09-29 22:00:00', NULL),
(18, 'site_footer_content', 'Footer Content', 'تم انشائها 1975 يتم انتاج منتجات من اجود المنتجات والشركة حاصلة على شهادة سلامة الغذاء العالمية الايزو ومن منتجات الشركة طحينة وسمسم بجميع انواعه و حلاوة طحينية و عسل اسود .', 'textarea', 'en', 0, NULL, 4, '2018-09-29 22:00:00', NULL),
(19, 'site_address_fectory', 'المصنع', 'الخانكة المنطقة الصناعية الشروق', 'text', 'en', 0, NULL, 5, '2018-09-29 22:00:00', '2018-09-30 11:30:42'),
(20, 'site_address_mange', 'الإدارة ', '3 شارع الوالى . مصر الجديدة ميدان الحكمة', 'text', 'ar', 0, NULL, 6, '2018-09-29 22:00:00', NULL),
(21, 'site_phone', 'ارقام التلفونات', '01227394293 - 01117937333', 'text', 'en', 0, NULL, 7, '2018-09-29 22:00:00', NULL),
(22, 'site_tel', 'تلفون ارضى', '0244696421:0244604442', 'text', 'ar', 0, NULL, 8, '2018-09-29 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) unsigned NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '[{"image":"\\/filemanager\\/photos\\/1\\/5bbdddbc0c7d5.png","title":{"en":null}}]', 1, '2018-10-10 09:09:18', '2018-10-10 09:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `sliders_lang`
--

CREATE TABLE IF NOT EXISTS `sliders_lang` (
  `id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `slider_id` int(10) unsigned NOT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders_lang`
--

INSERT INTO `sliders_lang` (`id`, `status`, `slider_id`, `lang`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'en', 'New Arrivals', 'A Perfect template to start selling your products.', '2018-10-10 09:09:18', '2018-10-10 09:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE IF NOT EXISTS `socials` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `icon`, `class`, `link`, `created_at`, `updated_at`) VALUES
(1, 'facebook', NULL, NULL, 'http://facebook.com', '2018-09-15 22:00:00', '2018-10-02 08:49:32'),
(2, 'twitter', NULL, NULL, NULL, '2018-09-15 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '0',
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role_id`, `isAdmin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'vadecom', 'admin@vadecom.net', 1, 1, '$2y$10$GO4uNAsKJnBUneGR8pswne8IWuwdndkBtjxkW183xINDSNfTMgbDC', 'KPy5erBw2KB8p7eT0RagEwiBcJeJbs4tFAaizenn3tlouj6wUQix5cLlVjr6', '2018-08-27 12:21:23', '2018-10-07 11:33:35'),
(2, 'mahmoud', NULL, 'mahmoud.salem@vadecom.net', 1, 1, '$2y$10$VqICrmvFe2a94ZU1yRJ6R.BoMo4JMG/jQF5kcyXtRx0RZTHScM1aK', NULL, '2018-08-30 08:44:34', '2018-08-30 10:04:44'),
(3, 'vadecom', NULL, 'admin2@vadecom.net', 2, 1, '$2y$10$tM3ntyL5u.j4sQhWlEOpXOYxvH8jxP2XXRqciQC60kDVCJJAM6lkS', 'ByrrujophCE6g9WdJe1jbLwH7emA9Wr2j5CEHffIKD6AUmr718T5qyOWHow8', '2018-10-02 09:07:27', '2018-10-02 09:07:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands_lang`
--
ALTER TABLE `brands_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_lang_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus_lang`
--
ALTER TABLE `menus_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_lang_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages_lang`
--
ALTER TABLE `pages_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_lang_page_id_foreign` (`page_id`);

--
-- Indexes for table `page_categories`
--
ALTER TABLE `page_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_categories_lang`
--
ALTER TABLE `page_categories_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_categories_lang_page_catgory_id_foreign` (`page_catgory_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categories_product_id_foreign` (`product_id`),
  ADD KEY `products_categories_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `products_lang`
--
ALTER TABLE `products_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_lang_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories_lang`
--
ALTER TABLE `product_categories_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_lang_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_lang`
--
ALTER TABLE `roles_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_lang_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permission_permission_id_foreign` (`permission_id`),
  ADD KEY `role_permission_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders_lang`
--
ALTER TABLE `sliders_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_lang_slider_id_foreign` (`slider_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands_lang`
--
ALTER TABLE `brands_lang`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `langs`
--
ALTER TABLE `langs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus_lang`
--
ALTER TABLE `menus_lang`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages_lang`
--
ALTER TABLE `pages_lang`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_categories`
--
ALTER TABLE `page_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page_categories_lang`
--
ALTER TABLE `page_categories_lang`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products_lang`
--
ALTER TABLE `products_lang`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product_categories_lang`
--
ALTER TABLE `product_categories_lang`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles_lang`
--
ALTER TABLE `roles_lang`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sliders_lang`
--
ALTER TABLE `sliders_lang`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands_lang`
--
ALTER TABLE `brands_lang`
  ADD CONSTRAINT `brands_lang_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus_lang`
--
ALTER TABLE `menus_lang`
  ADD CONSTRAINT `menus_lang_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages_lang`
--
ALTER TABLE `pages_lang`
  ADD CONSTRAINT `pages_lang_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_categories_lang`
--
ALTER TABLE `page_categories_lang`
  ADD CONSTRAINT `page_categories_lang_page_catgory_id_foreign` FOREIGN KEY (`page_catgory_id`) REFERENCES `page_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD CONSTRAINT `products_categories_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_lang`
--
ALTER TABLE `products_lang`
  ADD CONSTRAINT `products_lang_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories_lang`
--
ALTER TABLE `product_categories_lang`
  ADD CONSTRAINT `product_categories_lang_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles_lang`
--
ALTER TABLE `roles_lang`
  ADD CONSTRAINT `roles_lang_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sliders_lang`
--
ALTER TABLE `sliders_lang`
  ADD CONSTRAINT `sliders_lang_slider_id_foreign` FOREIGN KEY (`slider_id`) REFERENCES `sliders` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
