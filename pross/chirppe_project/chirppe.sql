-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2017 at 07:05 PM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 7.0.24-1+ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chirppe`
--

-- --------------------------------------------------------

--
-- Table structure for table `c_activities`
--

CREATE TABLE `c_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_attendance`
--

CREATE TABLE `c_attendance` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `present` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_bulletboard`
--

CREATE TABLE `c_bulletboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `attending` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_classroom`
--

CREATE TABLE `c_classroom` (
  `id` int(10) UNSIGNED NOT NULL,
  `classname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_classroom_student`
--

CREATE TABLE `c_classroom_student` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `std_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_classroom_teacher`
--

CREATE TABLE `c_classroom_teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `class_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_email_template`
--

CREATE TABLE `c_email_template` (
  `email_template_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_gallery`
--

CREATE TABLE `c_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_lessonplan`
--

CREATE TABLE `c_lessonplan` (
  `id` int(10) UNSIGNED NOT NULL,
  `upload_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lessonname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_meal`
--

CREATE TABLE `c_meal` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_meal_id` int(10) UNSIGNED NOT NULL,
  `property_meal_id` int(10) UNSIGNED NOT NULL,
  `std_id` int(10) UNSIGNED NOT NULL,
  `time` date NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_nap`
--

CREATE TABLE `c_nap` (
  `id` int(10) UNSIGNED NOT NULL,
  `std_id` int(10) UNSIGNED NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_notice`
--

CREATE TABLE `c_notice` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `std_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_observation`
--

CREATE TABLE `c_observation` (
  `id` int(10) UNSIGNED NOT NULL,
  `std_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('pending','done') COLLATE utf8_unicode_ci NOT NULL,
  `approved` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_parents`
--

CREATE TABLE `c_parents` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `invitation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_potty`
--

CREATE TABLE `c_potty` (
  `id` int(10) UNSIGNED NOT NULL,
  `std_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bowel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_property_meal`
--

CREATE TABLE `c_property_meal` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_meal_id` int(10) UNSIGNED NOT NULL,
  `items` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_settings`
--

CREATE TABLE `c_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_static_content`
--

CREATE TABLE `c_static_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_static_content_home`
--

CREATE TABLE `c_static_content_home` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_static_content_home2`
--

CREATE TABLE `c_static_content_home2` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_students`
--

CREATE TABLE `c_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `bloodtype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guardian1_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guardian1_contact_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `relationship1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guardian2_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guardian2_contact_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `relationship2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `drugs_allergy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medical_condition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_tagging`
--

CREATE TABLE `c_tagging` (
  `id` int(10) UNSIGNED NOT NULL,
  `std_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_teachers`
--

CREATE TABLE `c_teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `invitation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_type_meal`
--

CREATE TABLE `c_type_meal` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('solid','liquid') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_users`
--

CREATE TABLE `c_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_type` enum('principal','student','teacher','parent') COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `profile_image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_user_type`
--

CREATE TABLE `c_user_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `user_type` enum('principal','student','teacher','parent') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_verification`
--

CREATE TABLE `c_verification` (
  `id` int(10) UNSIGNED NOT NULL,
  `otp_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `verififcation_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_12_11_091933_create_users_table', 1),
(2, '2017_12_12_045607_settings', 1),
(3, '2017_12_15_091027_email_template', 1),
(4, '2017_12_15_092604_c_parents', 1),
(5, '2017_12_15_093246_c_teachers', 1),
(6, '2017_12_15_095649_c_students', 1),
(7, '2017_12_15_102903_user_type', 1),
(8, '2017_12_15_103240_c_classroom', 1),
(9, '2017_12_15_112642_c_attendance', 1),
(10, '2017_12_15_112917_c_classroom_teacher', 1),
(11, '2017_12_15_113218_c_classroom_student', 1),
(12, '2017_12_15_113636_c_verification', 1),
(13, '2017_12_15_114155_c_gallery', 1),
(14, '2017_12_15_114201_c_notice', 1),
(15, '2017_12_15_115753_c_type_meal', 1),
(16, '2017_12_15_115806_c_property_meal', 1),
(17, '2017_12_15_115821_c_meal', 1),
(18, '2017_12_15_121031_c_nap', 1),
(19, '2017_12_15_121042_c_observation', 1),
(20, '2017_12_15_121135_c_bulletboard', 1),
(21, '2017_12_15_121158_c_activities', 1),
(22, '2017_12_15_121207_c_tagging', 1),
(23, '2017_12_15_121226_c_lesson_plan', 1),
(24, '2017_12_15_121235_c_potty', 1),
(25, '2017_12_15_125417_static_content', 1),
(26, '2017_12_15_130132_static_content_home', 1),
(27, '2017_12_15_130137_static_content_home2', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c_activities`
--
ALTER TABLE `c_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_attendance`
--
ALTER TABLE `c_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_attendance_user_id_foreign` (`user_id`),
  ADD KEY `c_attendance_class_id_foreign` (`class_id`);

--
-- Indexes for table `c_bulletboard`
--
ALTER TABLE `c_bulletboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_classroom`
--
ALTER TABLE `c_classroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_classroom_student`
--
ALTER TABLE `c_classroom_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_classroom_student_class_id_foreign` (`class_id`),
  ADD KEY `c_classroom_student_std_id_foreign` (`std_id`);

--
-- Indexes for table `c_classroom_teacher`
--
ALTER TABLE `c_classroom_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_classroom_teacher_class_id_foreign` (`class_id`),
  ADD KEY `c_classroom_teacher_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `c_email_template`
--
ALTER TABLE `c_email_template`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `c_gallery`
--
ALTER TABLE `c_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_lessonplan`
--
ALTER TABLE `c_lessonplan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_meal`
--
ALTER TABLE `c_meal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_meal_type_meal_id_foreign` (`type_meal_id`),
  ADD KEY `c_meal_property_meal_id_foreign` (`property_meal_id`),
  ADD KEY `c_meal_std_id_foreign` (`std_id`);

--
-- Indexes for table `c_nap`
--
ALTER TABLE `c_nap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_nap_std_id_foreign` (`std_id`);

--
-- Indexes for table `c_notice`
--
ALTER TABLE `c_notice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_notice_std_id_foreign` (`std_id`);

--
-- Indexes for table `c_observation`
--
ALTER TABLE `c_observation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_observation_std_id_foreign` (`std_id`),
  ADD KEY `c_observation_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `c_parents`
--
ALTER TABLE `c_parents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_parents_user_id_foreign` (`user_id`);

--
-- Indexes for table `c_potty`
--
ALTER TABLE `c_potty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_potty_std_id_foreign` (`std_id`);

--
-- Indexes for table `c_property_meal`
--
ALTER TABLE `c_property_meal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_property_meal_type_meal_id_foreign` (`type_meal_id`);

--
-- Indexes for table `c_settings`
--
ALTER TABLE `c_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_static_content`
--
ALTER TABLE `c_static_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_static_content_home`
--
ALTER TABLE `c_static_content_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_static_content_home2`
--
ALTER TABLE `c_static_content_home2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_students`
--
ALTER TABLE `c_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_students_user_id_foreign` (`user_id`);

--
-- Indexes for table `c_tagging`
--
ALTER TABLE `c_tagging`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_tagging_std_id_foreign` (`std_id`),
  ADD KEY `c_tagging_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `c_teachers`
--
ALTER TABLE `c_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `c_type_meal`
--
ALTER TABLE `c_type_meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c_users`
--
ALTER TABLE `c_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `c_users_email_unique` (`email`);

--
-- Indexes for table `c_user_type`
--
ALTER TABLE `c_user_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_user_type_type_id_foreign` (`type_id`);

--
-- Indexes for table `c_verification`
--
ALTER TABLE `c_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `c_activities`
--
ALTER TABLE `c_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_attendance`
--
ALTER TABLE `c_attendance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_bulletboard`
--
ALTER TABLE `c_bulletboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_classroom`
--
ALTER TABLE `c_classroom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_classroom_student`
--
ALTER TABLE `c_classroom_student`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_classroom_teacher`
--
ALTER TABLE `c_classroom_teacher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_email_template`
--
ALTER TABLE `c_email_template`
  MODIFY `email_template_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_gallery`
--
ALTER TABLE `c_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_lessonplan`
--
ALTER TABLE `c_lessonplan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_meal`
--
ALTER TABLE `c_meal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_nap`
--
ALTER TABLE `c_nap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_notice`
--
ALTER TABLE `c_notice`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_observation`
--
ALTER TABLE `c_observation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_parents`
--
ALTER TABLE `c_parents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_potty`
--
ALTER TABLE `c_potty`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_property_meal`
--
ALTER TABLE `c_property_meal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_settings`
--
ALTER TABLE `c_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_static_content`
--
ALTER TABLE `c_static_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_static_content_home`
--
ALTER TABLE `c_static_content_home`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_static_content_home2`
--
ALTER TABLE `c_static_content_home2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_students`
--
ALTER TABLE `c_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_tagging`
--
ALTER TABLE `c_tagging`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_teachers`
--
ALTER TABLE `c_teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_type_meal`
--
ALTER TABLE `c_type_meal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_users`
--
ALTER TABLE `c_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_user_type`
--
ALTER TABLE `c_user_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `c_verification`
--
ALTER TABLE `c_verification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `c_attendance`
--
ALTER TABLE `c_attendance`
  ADD CONSTRAINT `c_attendance_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `c_classroom` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_attendance_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `c_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_classroom_student`
--
ALTER TABLE `c_classroom_student`
  ADD CONSTRAINT `c_classroom_student_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `c_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_classroom_student_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `c_classroom` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_classroom_teacher`
--
ALTER TABLE `c_classroom_teacher`
  ADD CONSTRAINT `c_classroom_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `c_teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_classroom_teacher_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `c_classroom` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_meal`
--
ALTER TABLE `c_meal`
  ADD CONSTRAINT `c_meal_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `c_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_meal_property_meal_id_foreign` FOREIGN KEY (`property_meal_id`) REFERENCES `c_property_meal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_meal_type_meal_id_foreign` FOREIGN KEY (`type_meal_id`) REFERENCES `c_type_meal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_nap`
--
ALTER TABLE `c_nap`
  ADD CONSTRAINT `c_nap_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `c_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_notice`
--
ALTER TABLE `c_notice`
  ADD CONSTRAINT `c_notice_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `c_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_observation`
--
ALTER TABLE `c_observation`
  ADD CONSTRAINT `c_observation_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `c_teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_observation_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `c_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_parents`
--
ALTER TABLE `c_parents`
  ADD CONSTRAINT `c_parents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `c_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_potty`
--
ALTER TABLE `c_potty`
  ADD CONSTRAINT `c_potty_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `c_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_property_meal`
--
ALTER TABLE `c_property_meal`
  ADD CONSTRAINT `c_property_meal_type_meal_id_foreign` FOREIGN KEY (`type_meal_id`) REFERENCES `c_type_meal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_students`
--
ALTER TABLE `c_students`
  ADD CONSTRAINT `c_students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `c_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_tagging`
--
ALTER TABLE `c_tagging`
  ADD CONSTRAINT `c_tagging_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `c_parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c_tagging_std_id_foreign` FOREIGN KEY (`std_id`) REFERENCES `c_students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_teachers`
--
ALTER TABLE `c_teachers`
  ADD CONSTRAINT `c_teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `c_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `c_user_type`
--
ALTER TABLE `c_user_type`
  ADD CONSTRAINT `c_user_type_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `c_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
