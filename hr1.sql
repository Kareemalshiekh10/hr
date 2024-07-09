-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 06:18 PM
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
-- Database: `hr1`
--

-- --------------------------------------------------------

--
-- Table structure for table `annual_holidays`
--

CREATE TABLE `annual_holidays` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `holiday_date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `annual_holidays`
--

INSERT INTO `annual_holidays` (`id`, `employee_id`, `holiday_date`, `description`, `created_at`, `updated_at`) VALUES
(3, 8, '2024-04-12', 'dasdasd', '2024-04-18 17:17:46', '2024-04-18 17:17:46'),
(4, 7, '2024-04-19', 'asd', '2024-04-18 17:20:03', '2024-04-18 17:20:03'),
(5, 7, '2024-04-14', 'assd', '2024-04-18 17:33:36', '2024-04-18 17:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `annual_increases`
--

CREATE TABLE `annual_increases` (
  `id` int(11) NOT NULL,
  `employee_id` decimal(5,2) DEFAULT NULL,
  `percentage_inc` int(11) DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `annual_increases`
--

INSERT INTO `annual_increases` (`id`, `employee_id`, `percentage_inc`, `effective_date`, `description`, `created_at`, `updated_at`) VALUES
(1, 9.00, 221, '2024-04-13', 'das', '2024-04-18 18:48:51', '2024-04-18 18:48:51'),
(2, 8.00, 2211, '2024-04-09', 'sda', '2024-04-18 18:49:00', '2024-04-18 18:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, 'asdaa', 'Fifth settlement, south lotus', '2024-04-18 19:01:51', '2024-04-18 19:03:14'),
(2, '1', '1', '2024-04-24 22:05:31', '2024-04-24 22:05:31'),
(3, 'asd', 'asd', '2024-05-12 17:48:52', '2024-05-12 17:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `salary_after_deducation` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `employee_id`, `amount`, `salary_after_deducation`, `reason`, `created_at`, `updated_at`) VALUES
(1, 4, 213, 213, 'asd', '2024-04-18 09:11:03', '2024-04-18 09:11:03'),
(2, 15, 2132, 2131, 'sfdavdv das', '2024-04-18 09:11:18', '2024-04-18 17:12:29'),
(3, 44, 12, 9, '21sdad', '2024-05-17 17:12:15', '2024-05-17 17:12:15'),
(4, 44, 2, 18, '2', '2024-05-17 17:17:59', '2024-05-17 17:17:59');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `head` varchar(255) DEFAULT NULL,
  `Dep_description` varchar(255) DEFAULT NULL,
  `Employees_Count` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `head`, `Dep_description`, `Employees_Count`, `created_at`, `updated_at`) VALUES
(2, 'Administration', 'asd', 'asd', 2, '2024-03-28 23:11:53', '2024-04-09 22:17:41'),
(6, 'Legal', '23', '234', 3, '2024-03-29 15:47:49', '2024-04-09 22:17:17'),
(7, 'Research and Development', '32', '42', 3, '2024-03-29 15:48:33', '2024-04-09 22:13:44'),
(8, 'Customer Service', 'asd', 'asd', 2, '2024-03-30 01:17:16', '2024-04-09 22:13:33'),
(9, 'Operations', 'qew', '231dsaq', 22, '2024-04-09 18:41:33', '2024-04-09 22:13:25'),
(10, 'Sales', 'asddsa', 'asdas', 232, '2024-04-09 18:43:30', '2024-04-09 22:13:18'),
(11, 'Marketing', 'asdas', 'sadasd', 333, '2024-04-09 18:46:56', '2024-04-09 22:13:07'),
(12, 'IT', 'wer', 'qwe', 2, '2024-04-09 18:58:46', '2024-04-09 22:12:59'),
(13, 'Finance', '2', '22', 2, '2024-04-09 19:01:12', '2024-04-09 22:11:14'),
(15, 'HR', '2sad', 'ads', 21, '2024-04-09 21:31:42', '2024-04-09 22:11:03'),
(16, 'test', 'ads', 'asdasd', 12, '2024-04-19 13:38:16', '2024-04-19 13:38:16');

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
-- Table structure for table `incentives`
--

CREATE TABLE `incentives` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `incentives`
--

INSERT INTO `incentives` (`id`, `employee_id`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 222, '2das', '2024-04-17 15:50:02', '2024-04-17 15:50:02'),
(2, 7, 200000, 'dasdasd', '2024-04-17 15:50:19', '2024-04-17 15:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `date_requested` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `employee_id`, `department_id`, `amount`, `date_requested`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 32, '2024-04-08', 'pending', '2024-04-14 20:54:45', '2024-04-14 20:54:45');

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
-- Table structure for table `official_holidays`
--

CREATE TABLE `official_holidays` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `holiday_date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `official_holidays`
--

INSERT INTO `official_holidays` (`id`, `employee_id`, `holiday_date`, `description`, `created_at`, `updated_at`) VALUES
(1, 7, '2024-04-10', 'sadasd', '2024-04-18 17:34:19', '2024-04-18 17:34:19'),
(2, 8, '2024-05-09', 'asd', '2024-04-18 17:34:27', '2024-04-18 17:34:27');

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
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `employee_id` int(11) NOT NULL,
  `work_life_balance` int(11) NOT NULL,
  `skill_development` int(11) NOT NULL,
  `salary_and_benefits` int(11) NOT NULL,
  `job_security` int(11) NOT NULL,
  `career_growth` int(11) NOT NULL,
  `work_satisfaction` int(11) NOT NULL,
  `Overall_rating` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`employee_id`, `work_life_balance`, `skill_development`, `salary_and_benefits`, `job_security`, `career_growth`, `work_satisfaction`, `Overall_rating`, `created_at`, `updated_at`) VALUES
(7, 1, 12, 1, 22, 1, 1, 2, '2024-04-24 10:07:53', '2024-04-24 22:01:02'),
(6, 1, 2, 2, 3, 3, 4, 45, '2024-04-24 10:48:02', '2024-04-24 10:48:02'),
(6, 2, 2, 2, 2, 2, 2, 2, '2024-04-24 22:18:33', '2024-04-24 22:18:33'),
(7, 2, 1, 2, 1, 1, 2, 2, '2024-04-25 11:36:46', '2024-04-25 11:36:46'),
(4, 1, 1, 1, 1, 1, 1, 2, '2024-04-25 11:38:44', '2024-04-25 11:38:44'),
(9, 1, 1, 12, 2, 14, 3, 6, '2024-05-01 17:26:28', '2024-05-01 17:26:28'),
(11, 2, 2, 2, 3, 33, 3, 9, '2024-07-06 16:00:44', '2024-07-06 16:00:44');

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
  `profile_image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_role` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:Employee\r\n1:HR',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `Department`, `Position`, `Phone`, `Salary`, `Joining_Date`, `profile_image`, `remember_token`, `is_role`, `created_at`, `updated_at`) VALUES
(1, 'zxc', 'zxc@gmail.com', NULL, '$2y$12$j7dA/ezhj8RVnUV2uSeAZeRWfD6/93nTXoGub0o12fupKIcQoKd5S', '213', '123', NULL, '312', '2024-03-06', 'csHL6eADpvxKuNpKuwjA53RSHdnpbz.png', 'mIWNV3nn992h6JLb4pfORVL8a35Gq17JOJ1Ud7vcRhV0MOtnA6pzGNlbuoNX', 1, '2024-03-22 10:44:54', '2024-04-19 07:51:46'),
(2, 'fgh', 'fgh@gmail.com', NULL, '$2y$12$BxpTpbMohlkh1mMSRj06I.cP8oC3YQKpfag9GYS4s.IMXkTD1JGsy', '423', '234234', '213324432', '324324', '2024-03-06', NULL, 'gYtI1BZlr2fLXyEyNyygYqMA67M2zKelmu0QV0PEAYJsNlOHkf', 1, '2024-03-22 10:45:53', '2024-03-22 10:45:53'),
(3, 'Kareem Alshiekh', 'alshiekh.kareem@yahoo.com', NULL, NULL, '2', 'asd', '01015800033', '324', '2024-02-28', NULL, NULL, 0, '2024-03-22 11:17:56', '2024-03-22 11:17:56'),
(4, 'Kareem Alshiekh', 'alshiekh.kareemd@yahoo.com', NULL, NULL, '1', '32r', '010158030033', '342', '2024-03-01', NULL, NULL, 0, '2024-03-22 11:18:16', '2024-03-22 11:18:16'),
(5, 'qwe', 'zxczxc@gmail.com', NULL, '$2y$12$45XbmyHvN.YJj1rTU//2COORZEV1ePWn1HhooT2kJ0qx0SI9WKPJ6', 'weq', 'qwe', '34234', '8', '2024-03-13', NULL, '4k216Ve9F5KzjDODbHyanCXCUkEN61IiFPN0waePBbMMG1d6sF', 1, '2024-03-23 10:05:48', '2024-03-23 10:05:48'),
(6, 'Kareem Alshiekh', 'alshiekh.kareemww@yahoo.com', NULL, NULL, '3', 'weqqwe', '01015800033', '233', '2024-03-19', NULL, NULL, 0, '2024-03-23 10:07:24', '2024-03-23 10:07:24'),
(7, 'asdw', 'alshiesdakh.kareem@yahoo.com', NULL, NULL, '2', 'aeweq', '324', '324', '2024-03-06', NULL, NULL, 0, '2024-03-23 13:25:53', '2024-03-23 13:45:20'),
(8, 'zxcc', 'zxcc@gmail.com', NULL, NULL, '3', 'aaa', '01015800033', '234432', '2024-03-01', NULL, NULL, 0, '2024-03-23 13:48:57', '2024-03-23 13:48:57'),
(9, 'Kareem Alshiekhs', 'alshiskh.kareem@yahoo.com', NULL, NULL, '3', 'dsa', '01015800033', '213', '2024-03-06', NULL, NULL, 0, '2024-03-23 13:49:12', '2024-03-23 13:49:12'),
(11, '231', '312@gmail.com', NULL, NULL, '2', '432', '432324342', '243', '2024-02-27', NULL, NULL, 0, '2024-03-23 13:49:48', '2024-03-23 13:49:48'),
(12, 'Kareem Alshiekh3', 'alshiekh.k3areem@yahoo.com', NULL, NULL, '2', '342', '01015800033', '233', '2024-03-14', NULL, NULL, 0, '2024-03-23 13:50:04', '2024-03-23 13:50:04'),
(14, 'Kareem Alshiekh', 'alshiekh.k23areem@yahoo.com', NULL, NULL, '2', '321', '01015800033', '132', '2024-03-07', NULL, NULL, 0, '2024-03-23 13:50:58', '2024-03-23 13:50:58'),
(15, 'r34t54', 'alshiekh.kareem5t4@yahoo.com', NULL, NULL, '3', 't54', '01015800033', '54', '2024-03-11', NULL, NULL, 0, '2024-03-23 13:51:14', '2024-03-23 13:51:14'),
(16, 'asd', 'asd@gmail.com', NULL, '$2y$12$aEDo9qLQXQVKOQVquAOrUeBx4Pk0fZ.nzn3xpjpYJikotD96IKA9O', '7', 'asdasccsq', '010158000332', '23', '2024-02-29', 'la9olDTT6B3PT1j7HTaygsK4jwkYUc.png', 'UEpAWAQIGYkrCG2OxQMn9uAYXF854SXP5Zgh5qT2PhIzVI575p12HHOJzOjP', 1, '2024-03-23 13:54:44', '2024-04-19 07:54:26'),
(17, 'Kareem Alshiekh', 'alshiekh.kar3eem@yahoo.com', NULL, '$2y$12$WWEVCRZA/l1UkUcpc1jmyOSTmgqVh.sJsykYWsVMoBLX2gY38k7Cm', 'eewd', 'wqe', '010158000331', '3333', '2024-02-28', NULL, 'bvGezK7TCyzV0xpE3Z9pfmBtlOsWq9d91IU7e7dh2vTQaWmxJA', 1, '2024-03-23 13:55:40', '2024-03-23 13:55:40'),
(35, 'Kareem Alshiekh', 'alshiekh.kaadreem@yahoo.com', NULL, NULL, '10', 'asd', '010158000323', '213', '2024-04-04', NULL, NULL, 0, '2024-04-14 19:18:38', '2024-04-14 19:18:38'),
(36, 'asd', 'asdasd@gmail.com', NULL, '$2y$12$NGMTVg5scrVepYAIKZqkIeq8CZv8eZlAH.94YPE4i1g8IxocjP0WO', 'asdasdasd', 'asd', '0101580003322', '222', '2024-04-15', NULL, '4bbXbkGg4obqkmkSSxiXoTzH4517VVge94I9jXdsnLO9sls3rRus42R9oFDT', 1, '2024-04-17 06:30:34', '2024-04-17 06:30:34'),
(37, 'Kareem Alshiekh', 'alshiekh.kasdreem@yahoo.com', NULL, NULL, '7', 'asd', '01015800033', '21', '2024-04-05', 'UdQTMwjzDEqXfVqcZvQMG32PwjRcK2.jpg', NULL, 0, '2024-04-18 20:34:06', '2024-04-18 20:34:06'),
(38, 'Kareem Alshiekh', 'alshiekha@yahoo.com', NULL, NULL, '12', 'aaa', '032480203', '231', '2024-04-03', 'qUYkeLzBHtqFQoRGDKm0FOK0SQkciw.png', NULL, 0, '2024-04-18 21:00:03', '2024-04-18 21:00:03'),
(39, 'Kareem', 'kareem@yahoo.com', NULL, NULL, '6', '123123', '010158', '3333', '2024-03-31', '7vjzVgf47yoG3d8wpBd4G4WMR7Ulxe.png', NULL, 0, '2024-04-18 21:01:08', '2024-04-21 10:39:06'),
(40, 'Kareem Alshiekh', '1kareem@yahoo.com', NULL, '$2y$12$dzJZBLKzulZsId7JXAkOY.8.U06tzuLXDv0xqQPPBc./EqySq5sei', '8', '123123', '120321', '213', '2024-04-02', NULL, NULL, 0, '2024-04-21 11:08:08', '2024-04-21 11:08:08'),
(42, 'Kareem Alshiekh', 'alshem@yahoo.com', NULL, '$2y$12$FZGfnmEbI.z3mJHiFZzMP.FHgBHCVIjzmegzx1HtL1yXOb5DJWIBy', '7', '123123', '01015832', '123', '2024-04-05', NULL, NULL, 0, '2024-04-21 11:16:54', '2024-04-21 11:35:28'),
(43, 'Kareem Alshiekh', 'alshiekh.kareeqm@yahoo.com', NULL, '$2y$12$PUZ1/MF/zP63YDh.n2Rzv.H7gTWw1V57IhMs1fOERKqRgIltqK0tS', '8', 'aaa', '012', '123', '2024-04-04', NULL, NULL, 0, '2024-04-21 11:19:59', '2024-04-21 11:35:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annual_holidays`
--
ALTER TABLE `annual_holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `annual_increases`
--
ALTER TABLE `annual_increases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incentives`
--
ALTER TABLE `incentives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `official_holidays`
--
ALTER TABLE `official_holidays`
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
-- AUTO_INCREMENT for table `annual_holidays`
--
ALTER TABLE `annual_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `annual_increases`
--
ALTER TABLE `annual_increases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incentives`
--
ALTER TABLE `incentives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `official_holidays`
--
ALTER TABLE `official_holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
