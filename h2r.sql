-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 04:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `Dep_id` int(11) NOT NULL,
  `Dep_name` varchar(255) NOT NULL,
  `head` varchar(255) DEFAULT NULL,
  `Dep_description` varchar(255) DEFAULT NULL,
  `Employees_Count` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`Dep_id`, `Dep_name`, `head`, `Dep_description`, `Employees_Count`, `created_at`, `updated_at`) VALUES
(2, '3', 'asd', 'asd', 2, '2024-03-28 23:11:53', '2024-03-28 23:11:53'),
(3, '2', 'asd', 'asd', 2, '2024-03-29 01:30:04', '2024-03-29 01:30:04'),
(6, '5', '23', '234', 3, '2024-03-29 15:47:49', '2024-03-29 15:47:49'),
(7, '3', '32', '42', 3, '2024-03-29 15:48:33', '2024-03-29 15:48:33'),
(8, '4', 'asd', 'asd', 2, '2024-03-30 01:17:16', '2024-03-30 01:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  `Joining_Date` date DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_role` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:Employee\r\n1:HR',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `Department`, `Position`, `Phone`, `Salary`, `Joining_Date`, `remember_token`, `is_role`, `created_at`, `updated_at`) VALUES
(1, 'zxc', 'zxc@gmail.com', NULL, '$2y$12$j7dA/ezhj8RVnUV2uSeAZeRWfD6/93nTXoGub0o12fupKIcQoKd5S', '213', '123', NULL, '312', '2024-03-06', 'wXEBSyyrqDz2T05ZskotejiSYFaOwl0grkaOtfSbuHcwoOBStaqFrj6apuyN', 1, '2024-03-22 10:44:54', '2024-03-22 10:44:54'),
(2, 'fgh', 'fgh@gmail.com', NULL, '$2y$12$BxpTpbMohlkh1mMSRj06I.cP8oC3YQKpfag9GYS4s.IMXkTD1JGsy', '423', '234234', '213324432', '324324', '2024-03-06', 'gYtI1BZlr2fLXyEyNyygYqMA67M2zKelmu0QV0PEAYJsNlOHkf', 1, '2024-03-22 10:45:53', '2024-03-22 10:45:53'),
(3, 'Kareem Alshiekh', 'alshiekh.kareem@yahoo.com', NULL, NULL, '2', 'asd', '01015800033', '324', '2024-02-28', NULL, 0, '2024-03-22 11:17:56', '2024-03-22 11:17:56'),
(4, 'Kareem Alshiekh', 'alshiekh.kareemd@yahoo.com', NULL, NULL, '1', '32r', '010158030033', '342', '2024-03-01', NULL, 0, '2024-03-22 11:18:16', '2024-03-22 11:18:16'),
(5, 'qwe', 'zxczxc@gmail.com', NULL, '$2y$12$45XbmyHvN.YJj1rTU//2COORZEV1ePWn1HhooT2kJ0qx0SI9WKPJ6', 'weq', 'qwe', '34234', '8', '2024-03-13', '4k216Ve9F5KzjDODbHyanCXCUkEN61IiFPN0waePBbMMG1d6sF', 1, '2024-03-23 10:05:48', '2024-03-23 10:05:48'),
(6, 'Kareem Alshiekh', 'alshiekh.kareemww@yahoo.com', NULL, NULL, '3', 'weqqwe', '01015800033', '233', '2024-03-19', NULL, 0, '2024-03-23 10:07:24', '2024-03-23 10:07:24'),
(7, 'asdw', 'alshiesdakh.kareem@yahoo.com', NULL, NULL, '2', 'aeweq', '324', '324', '2024-03-06', NULL, 0, '2024-03-23 13:25:53', '2024-03-23 13:45:20'),
(8, 'zxcc', 'zxcc@gmail.com', NULL, NULL, '3', 'aaa', '01015800033', '234432', '2024-03-01', NULL, 0, '2024-03-23 13:48:57', '2024-03-23 13:48:57'),
(9, 'Kareem Alshiekhs', 'alshiskh.kareem@yahoo.com', NULL, NULL, '3', 'dsa', '01015800033', '213', '2024-03-06', NULL, 0, '2024-03-23 13:49:12', '2024-03-23 13:49:12'),
(11, '231', '312@gmail.com', NULL, NULL, '2', '432', '432324342', '243', '2024-02-27', NULL, 0, '2024-03-23 13:49:48', '2024-03-23 13:49:48'),
(12, 'Kareem Alshiekh3', 'alshiekh.k3areem@yahoo.com', NULL, NULL, '2', '342', '01015800033', '233', '2024-03-14', NULL, 0, '2024-03-23 13:50:04', '2024-03-23 13:50:04'),
(14, 'Kareem Alshiekh', 'alshiekh.k23areem@yahoo.com', NULL, NULL, '2', '321', '01015800033', '132', '2024-03-07', NULL, 0, '2024-03-23 13:50:58', '2024-03-23 13:50:58'),
(15, 'r34t54', 'alshiekh.kareem5t4@yahoo.com', NULL, NULL, '3', 't54', '01015800033', '54', '2024-03-11', NULL, 0, '2024-03-23 13:51:14', '2024-03-23 13:51:14'),
(16, 'asd', 'asd@gmail.com', NULL, '$2y$12$ZjOvRSHkd5NvtnR3yS74d.zLJ3GyDyMQktO/DvDwFfOYk2vKSY/4e', 'asddddddddd', 'asdasccsq', '010158000332', '23412134234234', '2024-02-29', 'Mgj70VnKIwgSfDjo4MHYmBHFKTtlPBjAOux4YqLSLzLoMrdf4m', 1, '2024-03-23 13:54:44', '2024-03-23 13:54:44'),
(17, 'Kareem Alshiekh', 'alshiekh.kar3eem@yahoo.com', NULL, '$2y$12$WWEVCRZA/l1UkUcpc1jmyOSTmgqVh.sJsykYWsVMoBLX2gY38k7Cm', 'eewd', 'wqe', '010158000331', '3333', '2024-02-28', 'bvGezK7TCyzV0xpE3Z9pfmBtlOsWq9d91IU7e7dh2vTQaWmxJA', 1, '2024-03-23 13:55:40', '2024-03-23 13:55:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`Dep_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `Dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
