-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2024 at 05:44 AM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `album_task_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0' COMMENT '0 => no parent',
  `cat_name` varchar(300) NOT NULL,
  `cat_description` text,
  `cat_img` text,
  `cat_has_children` tinyint(1) NOT NULL DEFAULT '0',
  `cat_is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `parent_id`, `cat_name`, `cat_description`, `cat_img`, `cat_has_children`, `cat_is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'trips_types', NULL, NULL, 1, 1, '2024-05-08 12:41:21', '2024-05-08 12:41:21', NULL),
(2, 0, 'destinations', NULL, NULL, 1, 1, '2024-05-08 12:41:21', '2024-05-08 12:41:21', NULL),
(3, 1, '{\"en\":\"water skiing\",\"it\":\"sci d\'acqua\",\"ru\":\"\\u0432\\u043e\\u0434\\u043d\\u044b\\u0435 \\u043b\\u044b\\u0436\\u0438\"}', NULL, NULL, 0, 1, '2024-05-08 09:42:36', '2024-05-08 09:42:36', NULL),
(4, 1, '{\"en\":\"desert safari\",\"it\":\"safari nel deserto\",\"ru\":\"\\u0441\\u0430\\u0444\\u0430\\u0440\\u0438 \\u043f\\u043e \\u043f\\u0443\\u0441\\u0442\\u044b\\u043d\\u0435\"}', NULL, NULL, 0, 1, '2024-05-08 09:43:18', '2024-05-08 09:43:18', NULL),
(5, 1, '{\"en\":\"Diving\",\"it\":\"Immersione\",\"ru\":\"\\u0414\\u0430\\u0439\\u0432\\u0438\\u043d\\u0433\"}', NULL, NULL, 0, 1, '2024-05-08 09:45:10', '2024-05-08 09:45:10', NULL),
(6, 2, '{\"en\":\"Hurghada\",\"it\":\"Hurghada\",\"ru\":\"\\u0425\\u0443\\u0440\\u0433\\u0430\\u0434\\u0430\"}', NULL, NULL, 0, 1, '2024-05-08 09:46:12', '2024-05-08 09:46:12', NULL),
(7, 2, '{\"en\":\"Sharm El-Shaikh\",\"it\":\"Sharm el-Shaikh\",\"ru\":\"\\u0428\\u0430\\u0440\\u043c-\\u044d\\u043b\\u044c-\\u0428\\u0435\\u0439\\u0445\"}', NULL, NULL, 0, 1, '2024-05-08 09:46:39', '2024-05-08 09:46:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `trip_id` int NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `country` varchar(300) DEFAULT NULL,
  `comment` text,
  `comment_img` text,
  `show_in_homepage` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

CREATE TABLE `langs` (
  `lang_id` int NOT NULL,
  `lang_symbol` varchar(300) DEFAULT NULL,
  `lang_name` varchar(300) NOT NULL,
  `lang_img` text,
  `lang_is_active` tinyint(1) NOT NULL DEFAULT '1',
  `show_in_user_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `show_in_admin_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`lang_id`, `lang_symbol`, `lang_name`, `lang_img`, `lang_is_active`, `show_in_user_dashboard`, `show_in_admin_dashboard`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ar', 'اللغة العربية', 'dashboard_files/images/langs/ar.png', 1, 0, 1, '2024-05-08 09:32:00', '2024-05-08 09:32:00', NULL),
(2, 'en', 'English', 'dashboard_files/images/langs/en.png', 1, 1, 0, '2024-05-08 09:32:10', '2024-05-08 09:32:10', NULL),
(3, 'it', 'italian', NULL, 1, 1, 0, '2024-05-08 12:33:28', '2024-05-08 12:33:28', NULL),
(4, 'ru', 'russian', NULL, 1, 1, 0, '2024-05-08 12:33:28', '2024-05-08 12:33:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `setting_id` int NOT NULL,
  `setting_name` varchar(300) NOT NULL,
  `setting_key` varchar(300) NOT NULL,
  `setting_value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`setting_id`, `setting_name`, `setting_key`, `setting_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '{\"en\":\"social_media\",\"it\":\"mezzi di comunicazione sociale\",\"ru\":\"\\u0441\\u043e\\u0446\\u0438\\u0430\\u043b\\u044c\\u043d\\u044b\\u0435 \\u043c\\u0435\\u0434\\u0438\\u0430\"}', 'social_media', '[{\"link\":\"www.fb\",\"name\":\"facebook\",\"class\":\"bi bi-facebook\"},{\"link\":\"www.youtube\",\"name\":\"youtube\",\"class\":\"bi bi-youtube\"},{\"name\":\"viber\",\"link\":\"01207964740\",\"class\":\"bi bi-whatsapp\"},{\"name\":\"telegram\",\"link\":\"https:\\/\\/t.me\\/joinchat\\/SRYEOyR-rwADvM0a\",\"class\":\"bi bi-telegram\"}]', '2024-05-08 09:31:22', '2024-05-08 09:48:07', NULL),
(2, '{\"ar\":\"رقم الواتساب\", \"en\":\"whatsapp number\"}', 'whatsapp', '999999990', '2024-05-08 09:31:22', '2024-05-08 09:31:22', NULL),
(3, '{\"en\":\"phone_number\",\"it\":\"numero di telefono\",\"ru\":\"\\u043d\\u043e\\u043c\\u0435\\u0440 \\u0442\\u0435\\u043b\\u0435\\u0444\\u043e\\u043d\\u0430\"}', 'phone_number', '01207964740', '2024-05-08 12:48:55', '2024-05-08 09:52:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int NOT NULL,
  `short_name` text,
  `slider` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `short_name`, `slider`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'الالبوم كراسي خشب', '[{\"alt\":\"\",\"title\":\"\\u0643\\u0631\\u0633\\u064a -1\",\"path\":\"uploads\\/pb5HeNUd5VPU1MxKeE2X0BdvYFyhgFFaUb0rc7dw.jpg\"},{\"alt\":\"\",\"title\":\"\\u0643\\u0631\\u0633\\u064a -2\",\"path\":\"uploads\\/UsDAf5YT1ZCqWzPx3M8yPHKqwg36lBxfaniO08fh.jpg\"},{\"alt\":\"\",\"title\":\"\\u0643\\u0631\\u0633\\u064a -3\",\"path\":\"uploads\\/UnOWgIZdZqLiT4D6km3OKg7deEoYbbnrZVCTeGRV.jpg\"}]', '2024-05-16 20:35:07', '2024-05-16 22:43:11', NULL),
(3, 'الالبوم ساعات', '[{\"alt\":\"\",\"title\":\"\\u0633\\u0627\\u0639\\u0629 -1\",\"path\":\"uploads\\/xwyOtxfwwdvOPtDj7gVBmyH1JLCsLvWv680QP4eE.jpg\"},{\"alt\":\"\",\"title\":\"\\u0633\\u0627\\u0639\\u0629 -2\",\"path\":\"uploads\\/T2WzprJbK2KBKHtTGcXmjF4ShA8aWFZtClh5DnKK.jpg\"},{\"alt\":\"\",\"title\":\"\\u0643\\u0631\\u0633\\u064a -1\",\"path\":\"uploads\\/pb5HeNUd5VPU1MxKeE2X0BdvYFyhgFFaUb0rc7dw.jpg\"},{\"alt\":\"\",\"title\":\"\\u0643\\u0631\\u0633\\u064a -2\",\"path\":\"uploads\\/UsDAf5YT1ZCqWzPx3M8yPHKqwg36lBxfaniO08fh.jpg\"},{\"alt\":\"\",\"title\":\"\\u0643\\u0631\\u0633\\u064a -3\",\"path\":\"uploads\\/UnOWgIZdZqLiT4D6km3OKg7deEoYbbnrZVCTeGRV.jpg\"}]', '2024-05-16 20:50:02', '2024-05-16 22:48:47', NULL),
(4, 'الالبوم الاول', '[{\"alt\":\"1\",\"title\":\"1\",\"path\":\"uploads\\/uvzCNskgzYGLNRjTQtiEXoLfvTwCcopEIbPA3RXh.png\"},{\"alt\":\"2\",\"title\":\"2\",\"path\":\"uploads\\/fiFoeCSq8OHxU9De5xrgfmfDdC2gLlyBAoxoWiID.png\"},{\"alt\":\"3\",\"title\":\"3\",\"path\":\"uploads\\/ES6Nij6UWSupYrmvAgupH6NA9eFUaShvCqE1AdAk.png\"},{\"alt\":\"4\",\"title\":\"4\",\"path\":\"uploads\\/26pB2kenI39Emfkp6nvxWtENscmcXEyju8E13M2H.png\"}]', '2024-05-16 22:47:27', '2024-05-16 22:49:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_type` varchar(300) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `user_email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `country` varchar(300) DEFAULT NULL,
  `nationality` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `user_name`, `user_email`, `password`, `country`, `nationality`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'sunrise admin', 'admin@gmail.com', '$2y$10$4dLMgUaLHISN2XkXvLjFEeb1SRKCgxe9QkfEgBz9FKUfDt/nokxb6', NULL, NULL, '2024-05-08 09:32:33', '2024-05-08 09:32:33', NULL),
(2, 'admin', 'dev', 'dev@gmail.com', '$2y$10$4dLMgUaLHISN2XkXvLjFEeb1SRKCgxe9QkfEgBz9FKUfDt/nokxb6', NULL, NULL, '2024-05-08 09:32:33', '2024-05-08 09:32:33', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langs`
--
ALTER TABLE `langs`
  MODIFY `lang_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `setting_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
