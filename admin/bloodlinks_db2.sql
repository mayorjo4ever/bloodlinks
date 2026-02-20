-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 04:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodlinks_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock`
--

CREATE TABLE `blood_stock` (
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `available_volume_ml` int(11) NOT NULL DEFAULT 0,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blood_test_categories`
--

CREATE TABLE `blood_test_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_test_categories`
--

INSERT INTO `blood_test_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Rapid Screening', NULL, NULL),
(2, 'Eliza Test', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blood_test_questions`
--

CREATE TABLE `blood_test_questions` (
  `id` bigint(20) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option_type` enum('bitwise','filling') NOT NULL,
  `if_true_val` varchar(100) DEFAULT NULL,
  `if_false_val` varchar(100) DEFAULT NULL,
  `alt_val` varchar(255) DEFAULT NULL,
  `c_by` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_test_questions`
--

INSERT INTO `blood_test_questions` (`id`, `question`, `option_type`, `if_true_val`, `if_false_val`, `alt_val`, `c_by`, `created_at`, `updated_at`) VALUES
(1, 'HIV', 'bitwise', 'Positive', 'Negative', '', 's6068', NULL, NULL),
(2, 'Hepatitis B', 'bitwise', 'Positive', 'Negative', '', 's6068', NULL, NULL),
(3, 'Hepatitis C', 'bitwise', 'Reactive', 'Not Reactive', '', 's6068', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blood_types`
--

CREATE TABLE `blood_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_types`
--

INSERT INTO `blood_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A+', '2024-10-25 14:17:11', '2024-10-25 14:17:11'),
(2, 'A-', '2024-10-25 14:17:19', '2024-10-25 14:17:19'),
(3, 'B+', '2024-10-25 14:17:26', '2024-10-25 14:17:26'),
(4, 'B-', '2024-10-25 14:17:49', '2024-10-25 14:17:49'),
(5, 'AB+', '2024-10-25 14:18:22', '2024-10-25 14:18:22'),
(6, 'O+', '2024-10-25 16:22:38', '2024-10-25 16:22:38'),
(7, 'O-', '2024-10-25 16:22:42', '2024-10-25 16:22:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_stock`
--
ALTER TABLE `blood_stock`
  ADD PRIMARY KEY (`blood_type`);

--
-- Indexes for table `blood_test_categories`
--
ALTER TABLE `blood_test_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_test_questions`
--
ALTER TABLE `blood_test_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_types`
--
ALTER TABLE `blood_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_test_categories`
--
ALTER TABLE `blood_test_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_test_questions`
--
ALTER TABLE `blood_test_questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blood_types`
--
ALTER TABLE `blood_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
