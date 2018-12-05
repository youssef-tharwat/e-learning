-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2018 at 06:12 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `attempted` tinyint(1) NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2018_11_18_171357_create_schools_table', 1),
(4, '2018_11_19_141154_create_teachers_table', 1),
(5, '2018_11_19_142029_create_tasks_table', 1),
(6, '2018_11_28_021901_create_quizzes_table', 1),
(7, '2018_12_01_180335_create_attempts_table', 1),
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2018_11_18_171357_create_schools_table', 1),
(44, '2018_11_19_141154_create_teachers_table', 1),
(45, '2018_11_19_142029_create_tasks_table', 1),
(82, '2018_11_28_040604_create_tagslist_table', 1),
(83, '2014_10_12_000000_create_users_table', 2),
(84, '2014_10_12_100000_create_password_resets_table', 2),
(85, '2018_11_18_171357_create_schools_table', 2),
(86, '2018_11_19_141154_create_teachers_table', 2),
(87, '2018_11_19_142029_create_tasks_table', 2),
(88, '2018_11_28_021901_create_quizzes_table', 2);

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
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `assigned` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `name`, `level`, `assigned_by`, `completed`, `assigned`, `created_at`, `updated_at`) VALUES
(61, 'Math', 1, 1, 0, 1, '2018-11-28 12:27:52', '2018-11-28 12:27:52'),
(62, 'English', 1, 1, 0, 1, '2018-11-28 16:58:38', '2018-11-28 16:58:38'),
(63, 'Physics', 1, 1, 0, 1, '2018-11-28 21:02:43', '2018-11-28 21:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scoreboard` int(11) NOT NULL,
  `students_number` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `scoreboard`, `students_number`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 'S.K Bukit Jalil', 0, 0, 1, NULL, '2018-11-21 02:53:36'),
(2, 'S.K Sri Petalling', 0, 0, 0, NULL, NULL),
(3, 'S.K Seri Kembangan', 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `q` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correctIndex` int(11) NOT NULL,
  `correctResponse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `incorrectResponse` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `quiz_id`, `q`, `options`, `correctIndex`, `correctResponse`, `incorrectResponse`, `created_at`, `updated_at`) VALUES
(25, 62, 'How are you ?', '[\"good\",\"amazing\",\"great\"]', 0, 'Correct!', 'Try again!', '2018-11-28 18:34:34', '2018-11-28 18:34:34'),
(26, 62, 'How are you doing ?', '[\"not okay\",\"not good\",\"not amazing\"]', 0, 'Correct!', 'Try again!', '2018-11-28 18:34:34', '2018-11-28 18:34:34'),
(27, 62, 'Will you come with me ?', '[\"Maybe\",\"yes\",\"no\"]', 0, 'Correct!', 'Try again!', '2018-11-28 18:34:34', '2018-11-28 18:34:34'),
(28, 63, 'Calculate Velocity ?', '[\"1\",\"2\",\"4\"]', 1, 'Correct!', 'Try again!', '2018-11-28 21:03:32', '2018-11-28 21:03:32'),
(29, 63, 'How many apples are on a tree ?', '[\"5\",\"10\",\"29\"]', 1, 'Correct!', 'Try again!', '2018-11-28 21:03:32', '2018-11-28 21:03:32'),
(30, 61, 'c', '[\"c\",\"c\",\"c\"]', 0, 'Correct!', 'Try again!', '2018-11-28 21:04:50', '2018-11-28 21:04:50'),
(31, 61, 'c', '[\"c\",\"c\",\"cc\"]', 0, 'Correct!', 'Try again!', '2018-11-28 21:04:50', '2018-11-28 21:04:50'),
(32, 61, 'c', '[\"c\",\"c\",\"c\"]', 0, 'Correct!', 'Try again!', '2018-11-28 21:04:50', '2018-11-28 21:04:50'),
(33, 61, 'c', '[\"c\",\"c\",\"c\"]', 0, 'Correct!', 'Try again!', '2018-11-28 21:04:50', '2018-11-28 21:04:50'),
(34, 61, 'c', '[\"c\",\"c\",\"c\"]', 0, 'Correct!', 'Try again!', '2018-11-28 21:04:50', '2018-11-28 21:04:50'),
(35, 61, 'asd', '[\"asd\",\"asd\",\"asd\"]', 1, 'Correct!', 'Try again!', '2018-11-28 21:05:42', '2018-11-28 21:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `school_id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 1, 'teacher@gmail.com', '$2y$10$1aj4QkEbFEJ0LNZMH6WL.OGEuQWBVKBzoxWc6urgJWAvH4tj5rplG', '', '2018-11-20 16:57:03', '2018-11-20 16:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `level` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `parent_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `level`, `score`, `school_id`, `parent_name`, `parent_email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'teststudent', 'teststudent@gmail.com', '$2y$10$MFcgQR/hR8e7iVHrUENK0eb3Fo0qw8uUiEZfNx5wwoFpBHOIql3Oa', NULL, 3, 20, 3, 'testparent', 'testparent@gmail.com', 'YwoQnBxLSrrPTVRzjqkK4gSc8SEl2RT6SdR09FpFhCdYW5WFJ23pHLvWmPae', '2018-11-21 17:44:38', '2018-11-21 17:44:38'),
(2, 'teststudent2', 'teststudent2@gmail.com', '$2y$10$d1VDv8FQFUskmK1KD4YvyOtnzQmdLGYRe3nBiaPE4Msy8le5N/dJO', NULL, 1, 30, 1, 'testparent', 'testparent@gmail.com', 'XV14ybek39Tq2Hv44cZSfyMBEmG4gHDNWZPNN6uk51gP2f4AgGmWhmPWN3rG', '2018-11-24 01:35:02', '2018-11-24 01:35:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

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
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
