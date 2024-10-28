-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 20, 2024 at 11:39 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Azam', 'azam78454@gmail.com', '1st message', 'Cehck karo', 0, '2024-10-10 00:28:50', '2024-10-10 00:28:50'),
(2, 'Saad', 'saad@gmail.com', '2nd message', '2nd message body', 0, '2024-10-10 00:28:50', '2024-10-10 00:26:42'),
(3, 'Abdullah', 'abdullah@gmail.com', '3rd message', '3rd message body cehck karo', 0, '2024-10-10 00:28:50', '2024-10-10 00:26:55'),
(4, 'Muhammad Azam', 'azam78454@gmail.com', 'cehcl', 'msg', 0, '2024-10-17 00:19:51', '2024-10-17 00:19:51'),
(5, 'Legend Azam', 'azam78454@gmail.com', 'dc', 'cdc', 0, '2024-10-17 00:48:15', '2024-10-17 00:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int NOT NULL,
  `order` int NOT NULL,
  `course` varchar(300) NOT NULL,
  `year` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `order`, `course`, `year`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Development Course', '2023-2024', 'Completed a comprehensive course in front-end and back-end development, with hands-on experience in building practice websites and projects using HTML, CSS, Bootstrap, Tailwind CSS, JavaScript, jQuery, React, PHP, and Laravel.', 0, '2024-10-18 00:48:10', '2024-10-18 00:48:10');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int NOT NULL,
  `order` int NOT NULL,
  `field` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_at` varchar(80) NOT NULL,
  `updated_at` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `order`, `field`, `year`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'Full-Stack Development (Practice Projects)', 'May 2022 – Present', 'Developed and worked on several large-scale projects to gain practical experience in web development technologies, including frontend, backend, and database management.', 0, '2024-10-18 00:48:52', '2024-10-18 00:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `general_infos`
--

CREATE TABLE `general_infos` (
  `id` int NOT NULL,
  `profile_pic` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `whatsapp_no` varchar(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `general_infos`
--

INSERT INTO `general_infos` (`id`, `profile_pic`, `email`, `phone_no`, `whatsapp_no`, `location`, `facebook`, `twitter`, `instagram`, `github`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'profile_pic/7L168Sm6fv3OBkXzDYBEXMru0B6udZHKukujqpMz.jpg', 'azam78454@gmail.com', '+92 321 7256441', '+92 311 2666802', 'Landhi, Karachi', 'https://www.facebook.com/a', 'https://www.x.com/a', 'https://www.instagram.com/a', 'https://www.github.com/a', 'https://www.linkedin.com/a', '2024-10-06 23:32:12', '2024-10-15 23:30:50');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `order` int NOT NULL,
  `thumbnail_path` varchar(255) NOT NULL,
  `head` varchar(255) NOT NULL,
  `github_link` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `order`, `thumbnail_path`, `head`, `github_link`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'project_thumbnails/YN5gWYeNptQlQxMNtOMQh3tQfCNlOAowiE5cuyKX.jpg', 'Head 1', 'https://www.google.com', 'Hi', 0, '2024-10-08 23:30:19', '2024-10-15 23:51:21'),
(2, 2, 'project_thumbnails/T9fZXpmv2gFYO9jA7RB4GBte28y4prP8ldA22xBX.jpg', 'kss', 'https://www.form.com', 'n', 1, '2024-10-08 23:59:56', '2024-10-09 23:44:27'),
(3, 2, 'project_thumbnails/x0exTvveyus7Hp1wQ3YBUHh1YOSEKP41H71xU5M5.jpg', 'head 2', 'https://www.projectlink.com', 'Project desc', 0, '2024-10-09 22:56:41', '2024-10-15 23:51:15'),
(4, 3, 'project_thumbnails/q7OdVC9wn3UEWMDCdyDmPQFttDpcn0XVXHoxnxHj.jpg', 'Head 3', 'https://www.cehck.com', 'descs', 0, '2024-10-09 23:01:26', '2024-10-15 23:51:07'),
(5, 4, 'project_thumbnails/BWaE6lDN00AnmVSXyIv6MqhV5xvkdRdp2s1tmEfu.jpg', 'Head 4', 'https://www.projectlink.com', 'desc', 0, '2024-10-15 23:50:58', '2024-10-16 00:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int NOT NULL,
  `order` int NOT NULL,
  `qualification` varchar(300) NOT NULL,
  `year` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `order`, `qualification`, `year`, `description`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 2, 'Intermediate', '2023-Onwards', 'I am currently pursuing my Intermediate in Computer Science from the  (BIEK) at the esteemed Government Degree College Malir Cantt.', 0, '2024-10-18 00:46:35', '2024-10-18 00:46:35'),
(2, 1, 'Matriculation', '2022-2023', 'I completed my Matric in Computer Science from BSEK with outstanding grades.', 0, '2024-10-18 00:47:00', '2024-10-18 00:47:00');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `order` int NOT NULL,
  `skill` varchar(255) NOT NULL,
  `percentage` int NOT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `order`, `skill`, `percentage`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'HTML', 90, 0, '2024-10-18 00:49:45', '2024-10-18 00:49:45'),
(2, 2, 'CSS', 85, 0, '2024-10-18 00:49:56', '2024-10-18 00:49:56'),
(3, 3, 'Bootstrap', 85, 0, '2024-10-18 00:50:14', '2024-10-18 00:50:14'),
(4, 4, 'Tailwind CSS', 70, 0, '2024-10-18 00:50:29', '2024-10-18 00:50:29'),
(5, 5, 'JavaScript', 80, 0, '2024-10-18 00:50:41', '2024-10-18 00:50:41'),
(6, 6, 'jQuery', 90, 0, '2024-10-18 00:50:59', '2024-10-18 00:50:59'),
(7, 7, 'React', 60, 0, '2024-10-18 00:51:13', '2024-10-18 00:51:13'),
(8, 8, 'PHP', 80, 0, '2024-10-18 00:51:23', '2024-10-18 00:51:23'),
(9, 9, 'Laravel', 75, 0, '2024-10-18 00:51:34', '2024-10-18 00:51:34'),
(10, 10, 'API Development and Integration', 70, 0, '2024-10-18 00:51:52', '2024-10-18 00:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(100) NOT NULL,
  `is_deleted` int NOT NULL DEFAULT '0',
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `otp`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'azam78454@gmail.com', '$2y$12$cOmtQ4jFxFatlnEaV7RhQerVdD9LIR.F7lpev.cvbIVictbMhv2qm', '', 0, '2024-10-06 22:03:21', '2024-10-07 00:20:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_infos`
--
ALTER TABLE `general_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_infos`
--
ALTER TABLE `general_infos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
