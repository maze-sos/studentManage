-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 03:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adesola Oni', 'Adesola23', 'adesolaoni2001@gmail.com', NULL, '$2y$12$krYqb9pz/2o9SQ9g5dTPR.nbdwBiAU/V6lK.Clm3vOxmSpnrHu2qK', NULL, '2024-05-27 09:32:24', '2024-05-27 09:32:24'),
(3, 'Nife Fafolahan', 'Nifeey', 'Nife@gmail.com', NULL, '$2y$12$jene5fuwFMSES0z7vGJMT.LezkzthuYmpRFs/Gay6UBntwrWuqmKC', NULL, '2024-05-27 10:11:14', '2024-05-27 10:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `credits` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `coursename`, `coursecode`, `credits`, `duration`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Test001', '4', '6 Months', 'Blk 22B, FCDA QUATERS, Jikwoyi Phase 2, Abuja', '2024-05-27 10:46:49', '2024-05-27 10:46:49'),
(2, 'Test 2', 'Test002', '2', '2 Months', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2024-05-27 11:54:46', '2024-05-27 11:54:46'),
(3, 'Test 3', 'Test003', '3', '3 Months', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2024-05-27 11:55:03', '2024-05-27 11:55:03'),
(4, 'Test 4', 'Test004', '4', '4 Months', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2024-05-27 11:55:29', '2024-05-27 11:55:29'),
(5, 'Test 5', 'Test005', '5', '5 Months', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2024-05-27 11:55:57', '2024-05-27 11:55:57'),
(6, 'Test 6', 'Test006', '6', '6 Months', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2024-05-27 11:56:19', '2024-05-27 11:56:19'),
(7, 'Test 7', 'Test007', '7', '7 Months', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2024-05-27 11:56:44', '2024-05-27 11:56:44'),
(8, 'Test', 'Test002', '6', '6 Months', 'sdfghjkl;xcvnmdfghjfghj', '2024-05-27 12:09:24', '2024-05-27 12:09:24'),
(9, 'Test', 'Test001', '4', '6 Months', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi ipsam, totam ipsa eum consectetur error aspernatur nostrum modi, impedit autem alias ullam unde! Minima, culpa laboriosam provident velit modi incidunt!', '2024-05-28 12:11:05', '2024-05-28 12:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

CREATE TABLE `course_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`id`, `student_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-05-27 11:36:00', '2024-05-27 11:36:00'),
(4, 3, 5, '2024-05-27 12:00:21', '2024-05-27 12:00:21'),
(5, 3, 6, '2024-05-27 12:00:21', '2024-05-27 12:00:21'),
(6, 3, 7, '2024-05-27 12:00:21', '2024-05-27 12:00:21'),
(7, 4, 3, '2024-05-27 12:01:01', '2024-05-27 12:01:01'),
(8, 4, 4, '2024-05-27 12:01:01', '2024-05-27 12:01:01'),
(9, 4, 5, '2024-05-27 12:01:01', '2024-05-27 12:01:01'),
(10, 5, 3, '2024-05-27 12:01:33', '2024-05-27 12:01:33'),
(11, 5, 4, '2024-05-27 12:01:33', '2024-05-27 12:01:33'),
(12, 5, 7, '2024-05-27 12:01:33', '2024-05-27 12:01:33'),
(13, 6, 4, '2024-05-27 12:02:28', '2024-05-27 12:02:28'),
(14, 6, 5, '2024-05-27 12:02:28', '2024-05-27 12:02:28'),
(15, 6, 6, '2024-05-27 12:02:28', '2024-05-27 12:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2024_05_27_101134_create_admins_table', 1),
(30, '2024_05_27_174841_create_courses_table', 1),
(31, '2024_05_27_223910_create_students_table', 1),
(32, '2024_05_27_210650_create_course_student_table', 2),
(33, '2024_05_27_120154_create_visits_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `phonenumber`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'Adesola', 'Oni', 'adesolaoni2001@gmail.com', '09032253937', 'LUC-00109', '2024-05-27 11:36:00', '2024-05-27 12:07:33'),
(3, 'Drake', 'Aubrey', 'Drake@aubrey.com', '123456789', 'LUC-003', '2024-05-27 12:00:21', '2024-05-27 12:00:21'),
(4, 'Abel', 'Tesfaye', 'Abel@Tesfaye.com', '09876545678', 'LUC-004', '2024-05-27 12:01:01', '2024-05-27 12:01:01'),
(5, 'Dami', 'Oni', 'dami@gmail.com', '08765431234', 'LUC-005', '2024-05-27 12:01:33', '2024-05-27 12:01:33'),
(6, 'Travis', 'Scott', 'Travis@Email.com', '13543245678', 'LUC-006', '2024-05-27 12:02:28', '2024-05-27 12:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `created_at`, `updated_at`) VALUES
(1, '2024-05-27 11:15:51', NULL),
(2, '2024-05-27 11:15:52', NULL),
(3, '2024-05-27 11:15:52', NULL),
(4, '2024-05-27 11:15:52', NULL),
(5, '2024-05-27 11:15:53', NULL),
(6, '2024-05-27 11:16:23', NULL),
(7, '2024-05-27 11:16:23', NULL),
(8, '2024-05-27 11:16:23', NULL),
(9, '2024-05-27 11:16:24', NULL),
(10, '2024-05-27 11:16:24', NULL),
(11, '2024-05-27 11:17:27', NULL),
(12, '2024-05-27 11:17:28', NULL),
(13, '2024-05-27 11:17:28', NULL),
(14, '2024-05-27 11:17:28', NULL),
(15, '2024-05-27 11:17:29', NULL),
(16, '2024-05-27 11:17:31', NULL),
(17, '2024-05-27 11:17:32', NULL),
(18, '2024-05-27 11:17:32', NULL),
(19, '2024-05-27 11:17:33', NULL),
(20, '2024-05-27 11:17:33', NULL),
(21, '2024-05-27 11:19:49', NULL),
(22, '2024-05-27 11:19:52', NULL),
(23, '2024-05-27 12:09:33', NULL),
(24, '2024-05-27 12:09:36', NULL),
(25, '2024-05-28 11:57:47', NULL),
(26, '2024-05-28 11:57:59', NULL),
(27, '2024-05-28 11:59:49', NULL),
(28, '2024-05-28 11:59:53', NULL),
(29, '2024-08-17 02:49:27', NULL),
(30, '2024-08-17 02:49:39', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_student_student_id_foreign` (`student_id`),
  ADD KEY `course_student_course_id_foreign` (`course_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_phonenumber_unique` (`phonenumber`),
  ADD UNIQUE KEY `students_student_id_unique` (`student_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_student`
--
ALTER TABLE `course_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
