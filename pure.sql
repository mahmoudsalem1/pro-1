-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2018 at 12:21 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pure`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `title`, `address`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'mahmoud', 'v@v.com', '121221', 'contact', 'asas', 'asas', 0, '2018-09-08 22:00:00', '2018-09-09 10:13:38');

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
(1, 'عربى', 'ar', 'eg', NULL, 1, '2018-08-29 22:00:00', NULL),
(2, 'English', 'en', 'gb', NULL, 1, '2018-08-29 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(12, '2018_09_02_131032_create_pages_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `modules` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `image`, `modules`, `status`, `views`, `created_at`, `updated_at`) VALUES
(1, 'sdsad', '[{"image":"\\/photos\\/1\\/5b8fb547b5fda.png","title":{"ar":"sdsadasd","en":"asasd"}}]', '[{"contact":["good"]},{"content":{"title":{"ar":["\\u0645\\u062d\\u062a\\u0648\\u0649 \\u0639\\u0631\\u0628\\u0649"],"en":["content english"]},"desc":{"ar":["<p>\\u0633\\u064a\\u0633\\u064a\\u0628\\u0634\\u0633 1<\\/p>"],"en":["<p>dfdsf sdfsdf sdf<\\/p>"]}}}]', 1, 0, '2018-09-05 10:42:43', '2018-09-05 13:27:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages_lang`
--

INSERT INTO `pages_lang` (`id`, `status`, `page_id`, `lang`, `title`, `content`, `description`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ar', 'sdasdsa', NULL, 'asdasd', 'adasd', '2018-09-05 10:42:43', '2018-09-05 13:27:35'),
(2, 1, 1, 'en', 'sadsad', NULL, 'asas', 'asdasd', '2018-09-05 10:42:43', '2018-09-05 13:27:35');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(14, 'pages', 'delete', 1, '2018-09-01 22:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-08-29 22:00:00', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_lang`
--

INSERT INTO `roles_lang` (`id`, `role_id`, `lang`, `name`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'ar', 'المدير', 'يملك كل صلاحيات الموقع', '2018-08-29 22:00:00', NULL),
(2, 1, 'en', 'Admin', 'has all permissions', '2018-08-29 22:00:00', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(24, 1, 14, '2018-09-01 22:00:00', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `slug`, `value`, `type`, `lang`, `isOption`, `options`, `sort_number`, `created_at`, `updated_at`) VALUES
(1, 'title', 'عنوان الموقع', 'Project', 'text', 'ar', 0, NULL, 0, '2018-08-29 22:00:00', NULL),
(2, 'title', 'Website Title', 'project en', 'text', 'en', 0, NULL, 0, '2018-08-29 22:00:00', NULL),
(3, 'site_keys', 'الكلمات المفتاحية للموقع', '1', 'textarea', 'ar', 0, NULL, 99, '2018-08-29 22:00:00', NULL),
(4, 'site_keys', 'Keywords', '1', 'textarea', 'en', 0, NULL, 99, '2018-08-29 22:00:00', NULL),
(5, 'site_desc', 'وصف الموقع', '1', 'textarea', 'ar', 0, NULL, 100, '2018-08-29 22:00:00', NULL),
(6, 'site_desc', 'description', '1', 'textarea', 'en', 0, NULL, 100, '2018-08-29 22:00:00', NULL),
(7, 'website_status', 'حالة الموقع', '0', 'select', 'ar', 1, 'متاح,مغلق', 1, '2018-08-29 22:00:00', '2018-08-30 13:45:09'),
(8, 'website_status', 'Website status', '0', 'select', 'en', 1, 'open,closed', 1, '2018-08-29 22:00:00', '2018-08-30 13:45:09'),
(9, 'closed_msg', 'محتوى صفحة غلق الموقع', '0', 'editor', 'ar', 0, NULL, 2, '2018-08-29 22:00:00', NULL),
(10, 'closed_msg', 'Content of closing the website', '0', 'editor', 'en', 0, NULL, 2, '2018-08-29 22:00:00', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role_id`, `isAdmin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'vadecom', 'admin@vadecom.net', 1, 1, '$2y$10$GO4uNAsKJnBUneGR8pswne8IWuwdndkBtjxkW183xINDSNfTMgbDC', '4sn2Pw2Q6fJCwq1yCC4ukXuc9oWPJVXDm5QKaIN6WUoFf4Fb5jYEYetYFD3o', '2018-08-27 12:21:23', '2018-08-27 12:21:23'),
(2, 'mahmoud', NULL, 'mahmoud.salem@vadecom.net', 1, 1, '$2y$10$VqICrmvFe2a94ZU1yRJ6R.BoMo4JMG/jQF5kcyXtRx0RZTHScM1aK', NULL, '2018-08-30 08:44:34', '2018-08-30 10:04:44');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `langs`
--
ALTER TABLE `langs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pages_lang`
--
ALTER TABLE `pages_lang`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles_lang`
--
ALTER TABLE `roles_lang`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pages_lang`
--
ALTER TABLE `pages_lang`
  ADD CONSTRAINT `pages_lang_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
