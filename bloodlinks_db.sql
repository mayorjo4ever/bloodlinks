-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2026 at 03:46 PM
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
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `sn` int(10) NOT NULL,
  `staff_id` varchar(30) NOT NULL DEFAULT '',
  `bank_id` varchar(5) NOT NULL DEFAULT '',
  `account_name` varchar(255) DEFAULT NULL,
  `account_no` varchar(20) DEFAULT NULL,
  `account_type` enum('savings','current') DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`sn`, `staff_id`, `bank_id`, `account_name`, `account_no`, `account_type`, `status`) VALUES
(1, 's6068', '8', 'Bank Account Name', '0000000000', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_report_setup`
--

CREATE TABLE `admin_report_setup` (
  `sn` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `bill_categs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_report_setup`
--

INSERT INTO `admin_report_setup` (`sn`, `user_id`, `bill_categs`) VALUES
(1, 's6068', '1,3'),
(2, 'accesschm001', '1,2,3,4,8');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `sn` int(10) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(15) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`sn`, `name`, `alias`, `icon`, `address`) VALUES
(1, 'Access Bank', 'Access', 'access.jpg', ''),
(2, 'CitiBank', 'citi', 'citibank.jpg', ''),
(3, 'Diamond Bank', 'diamond', 'diamond.jpg', ''),
(4, 'Ecobank', 'ecobank', 'ecobank.jpg', ''),
(5, 'Enterprise Bank', 'enterprise', 'enterprise.jpg', ''),
(6, 'First City Monument Bank', 'fcmb', 'fcmb.jpg', ''),
(7, 'Fidelity Bank', 'fidelity', 'fidelity.jpg', ''),
(8, 'First Bank', 'firstbank', 'firstbank.jpg', ''),
(9, 'Guaranty Trust Bank', 'gtbank', 'gtb.jpg', ''),
(10, 'Keystone Bank', 'keystone', 'keystone.jpg', ''),
(11, 'Oceanic Bank', 'oceanic', 'oceanic.jpg', ''),
(12, 'Polaris Bank', 'polaris', 'skyebank.jpg', ''),
(13, 'Stanbic Bank', 'stanbic', 'polaris.png', ''),
(14, 'Sterling Bank', 'sterling', 'sterling.jpg', ''),
(15, 'United Bank For Africa', 'uba', 'uba.jpg', ''),
(16, 'Union Bank', 'union', 'union.jpg', ''),
(17, 'Unity Bank', 'unity', 'unity.jpg', ''),
(18, 'Wema Bank', 'wema', 'wema.jpg', ''),
(19, 'Zennith Bank', 'zenith', 'zenith.jpg', ''),
(20, 'Unilorin Microfinance Bank', 'unimicro', 'unimicro.png', ''),
(21, 'Jaiz Bank', 'jaiz', 'jaiz.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `basic_salary`
--

CREATE TABLE `basic_salary` (
  `sn` int(10) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `amount` double(16,0) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_category`
--

CREATE TABLE `bill_category` (
  `sn` int(10) NOT NULL,
  `dept_id` varchar(5) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(30) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `upd_by` varchar(30) DEFAULT NULL,
  `date_upd` date DEFAULT NULL,
  `time_upd` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bill_category`
--

INSERT INTO `bill_category` (`sn`, `dept_id`, `name`, `status`, `c_by`, `date_c`, `time_c`, `upd_by`, `date_upd`, `time_upd`) VALUES
(1, '1', 'Immunulogy', 'active', 's6068', '2019-11-28', '04:02:42', 's6068', '2019-11-28', '18:05:31'),
(2, '1', 'Microbiology', 'active', 's6068', '2019-11-28', '15:09:47', 's6068', '2019-11-29', '08:20:01'),
(3, '1', 'Haematology', 'active', 's6068', '2019-11-29', '08:25:07', '', '0000-00-00', '00:00:00'),
(4, '1', 'Chemistry', 'active', 's6068', '2019-11-29', '08:25:27', '3571', '2021-01-30', '14:09:09'),
(5, '1', 'Hepatitis Viruses', 'active', 's6068', '2019-11-29', '08:28:46', '', '0000-00-00', '00:00:00'),
(6, '1', 'Other Viruses', 'active', 's6068', '2019-11-29', '08:29:53', '', '0000-00-00', '00:00:00'),
(7, '1', 'Fertility / Pregnancy', 'active', 's6068', '2019-11-29', '08:30:22', 'Bolaji', '2021-02-22', '15:14:40'),
(8, '1', 'Thyroid Function Test', 'active', 's6068', '2019-11-29', '08:30:45', '', '0000-00-00', '00:00:00'),
(9, '1', 'Cardiac Markers', 'active', 's6068', '2019-11-29', '08:35:14', '', '0000-00-00', '00:00:00'),
(10, '1', 'Tumor Markers', 'active', 's6068', '2019-11-29', '08:35:56', '', '0000-00-00', '00:00:00'),
(11, '1', 'Molecular', 'active', 's6068', '2020-01-18', '14:21:59', '', '0000-00-00', '00:00:00'),
(12, '2', 'Account', 'inactive', 'Bolaji', '2020-10-28', '10:30:20', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bill_types`
--

CREATE TABLE `bill_types` (
  `sn` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categ_id` varchar(5) NOT NULL DEFAULT '',
  `dept_id` varchar(5) NOT NULL DEFAULT '',
  `specimen_sample` varchar(255) DEFAULT NULL,
  `estm_time` int(10) DEFAULT NULL,
  `estm_time_type` varchar(20) DEFAULT NULL,
  `price` varchar(15) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` varchar(32) DEFAULT NULL,
  `time_del` varchar(32) DEFAULT NULL,
  `c_by` varchar(50) DEFAULT NULL,
  `date_c` timestamp NULL DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `upd_by` varchar(50) DEFAULT NULL,
  `date_upd` timestamp NULL DEFAULT NULL,
  `time_upd` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bill_types`
--

INSERT INTO `bill_types` (`sn`, `name`, `categ_id`, `dept_id`, `specimen_sample`, `estm_time`, `estm_time_type`, `price`, `status`, `del_by`, `date_del`, `time_del`, `c_by`, `date_c`, `time_c`, `upd_by`, `date_upd`, `time_upd`) VALUES
(1, 'CROSS MATCH (EMERGENCY)', '3', '1', 'BLOOD', 30, '1', '5000', 'active', 's6068', '2019-11-28', '18:04:23', '', '0000-00-00 00:00:00', '00:00:00', 'desmondjohn', '2026-02-08 23:00:00', '14:10:32'),
(2, 'Endocervical Swab', '1', '1', 'Cervical swab', 24, '2', '3500', 'inactive', '3571', '2021-04-06', '09:49:03', 's6068', '2019-11-27 23:00:00', '13:39:51', 'yekeen', '2020-02-14 23:00:00', '15:39:48'),
(3, 'HIV Screening (RAPID)', '1', '1', 'Blood', 1, '2', '2800', 'active', 's6068', '2019-11-28', '18:10:12', 's6068', '2019-11-27 23:00:00', '14:02:26', 'S6068', '2025-02-19 23:00:00', '13:35:05'),
(4, 'URINE MICROSCOPY', '2', '1', 'Urine', 30, '1', '3500', 'active', 's6068', '2019-12-21', '05:34:04', 's6068', '2019-11-27 23:00:00', '18:55:43', 'S6068', '2025-02-19 23:00:00', '16:07:59'),
(5, 'D-Dimer', '9', '1', 'Blood', 2, '2', '6000', 'active', '', '', '', 's6068', '2019-11-28 23:00:00', '09:37:29', 'Bolaji', '2020-06-12 23:00:00', '12:44:01'),
(6, 'FASTING BLOOD SUGAR (FBS)', '4', '1', 'Blood', 1, '2', '1200', 'active', '', '', '', 's6068', '2019-12-12 23:00:00', '15:38:29', 'S6068', '2025-02-19 23:00:00', '16:36:09'),
(7, 'Liver Profile', '4', '1', 'Blood', 8, '2', '4000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '14:33:20', 's6068', '2020-01-20 23:00:00', '18:23:27'),
(8, 'Electrolyte / Urea / Creatinine', '4', '1', 'Blood', 2, '2', '3000', 'inactive', '3571', '2021-04-27', '09:02:12', 's6068', '2019-12-16 23:00:00', '14:34:39', 'S6068', '2025-02-20 23:00:00', '12:48:52'),
(9, 'Urine microalbumin', '4', '1', '2 ml serum', 24, '2', '3000', 'inactive', '3571', '2020-05-09', '13:04:05', 's6068', '2019-12-16 23:00:00', '14:38:49', '', '0000-00-00 00:00:00', '00:00:00'),
(10, 'FASTING LIPID PROFILE', '4', '1', 'Blood', 12, '2', '9500', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '14:43:08', 'desmondjohn', '2026-02-09 23:00:00', '14:37:55'),
(11, 'URIC ACID', '4', '1', 'Blood', 4, '2', '1200', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '14:43:34', 'S6068', '2025-02-20 23:00:00', '13:16:12'),
(12, 'SERUM AMYLASE', '4', '1', 'Blood', 72, '2', '9000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '14:44:32', 'S6068', '2025-02-20 23:00:00', '13:22:47'),
(13, 'URINALYSIS', '4', '1', 'Urine', 1, '2', '2000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '14:47:30', 'S6068', '2025-02-19 23:00:00', '16:39:35'),
(14, 'HBA1C', '4', '1', 'Blood', 1, '2', '4000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '14:49:09', '3571', '2020-05-01 23:00:00', '14:40:21'),
(15, 'Malaria Parasite (MP)', '2', '1', 'Blood', 30, '1', '1200', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '14:58:09', 'desmondjohn', '2026-02-13 23:00:00', '15:02:20'),
(16, 'Semen fluid analysis', '2', '1', 'Semen', 24, '2', '2000', 'inactive', 's6068', '2020-01-25', '08:33:09', 's6068', '2019-12-16 23:00:00', '14:59:10', '', '0000-00-00 00:00:00', '00:00:00'),
(17, 'Microscopy / Culture / Sensitivity', '2', '1', 'As Appropriate', 48, '2', '3000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:00:51', '', '0000-00-00 00:00:00', '00:00:00'),
(18, 'Fungi Studies', '2', '1', 'As Appropriate', 2, '4', '5000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:01:44', '', '0000-00-00 00:00:00', '00:00:00'),
(19, 'Calcium & Phosphate (Child)', '4', '1', 'Blood', 2, '2', '2000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:06:20', 'Bolaji', '2022-06-02 23:00:00', '16:36:41'),
(20, 'FAECAL OCCULT BLOOD', '4', '1', 'stool', 4, '2', '8500', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:07:07', 'S6068', '2025-02-20 23:00:00', '13:20:28'),
(21, 'Urinary electrolyte', '4', '1', 'Urine', 1, '2', '2000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:08:00', 'Bolaji', '2020-12-18 23:00:00', '10:08:27'),
(22, 'Oestradiol', '7', '1', 'Blood', 48, '2', '3500', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:12:47', 'Bolaji', '2020-05-19 23:00:00', '11:57:46'),
(23, 'Testoterone', '7', '1', 'Blood', 48, '2', '3500', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:13:05', '3571', '2020-05-27 23:00:00', '15:54:08'),
(24, 'Progesterone', '7', '1', 'Blood', 48, '2', '3500', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:13:25', '3571', '2020-05-24 23:00:00', '15:15:50'),
(25, 'Pregnancy Test', '7', '1', '2ml serum', 15, '1', '500', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:14:25', '', '0000-00-00 00:00:00', '00:00:00'),
(26, 'B-HCG (Quantitative)', '7', '1', '2ml serum', 48, '2', '4000', 'inactive', '3571', '2020-05-09', '11:35:28', 's6068', '2019-12-16 23:00:00', '15:15:42', '', '0000-00-00 00:00:00', '00:00:00'),
(27, 'Prolactin', '7', '1', 'Blood', 48, '2', '3000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:16:14', '3571', '2020-04-26 23:00:00', '10:57:26'),
(28, 'FSH', '7', '1', 'Blood', 48, '2', '3000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:16:27', '3571', '2022-01-23 23:00:00', '10:17:09'),
(29, 'LH', '7', '1', 'Blood', 48, '2', '3000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:16:42', '3571', '2022-01-23 23:00:00', '10:17:20'),
(30, 'TSH', '8', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:17:32', '3571', '2020-05-01 23:00:00', '14:31:19'),
(31, 'TT3', '8', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:17:53', '3571', '2020-05-01 23:00:00', '14:31:04'),
(32, 'TT4', '8', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:18:02', '3571', '2020-05-01 23:00:00', '14:30:49'),
(33, 'Parathyroid Hormone', '8', '1', '2ml serum', 96, '2', '15000', 'inactive', '3571', '2020-04-15', '13:02:57', 's6068', '2019-12-16 23:00:00', '15:19:01', '', '0000-00-00 00:00:00', '00:00:00'),
(34, 'Full Blood Count (MALE)', '3', '1', 'Blood', 1, '2', '4000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:20:45', 'S6068', '2025-02-19 23:00:00', '15:45:52'),
(35, 'Peripheral blood film', '3', '1', 'Blood', 24, '2', '2000', 'inactive', '3571', '2020-05-30', '12:44:09', 's6068', '2019-12-16 23:00:00', '15:21:20', 'Bolaji', '2020-04-23 23:00:00', '15:14:21'),
(36, 'Blood group', '3', '1', 'Blood', 1, '2', '1500', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:21:54', 'desmondjohn', '2026-02-08 23:00:00', '17:56:18'),
(37, 'GENOTYPE (HB ELECTROPHORESIS)', '3', '1', 'Blood', 6, '2', '2000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:22:25', 'S6068', '2025-02-19 23:00:00', '15:58:17'),
(38, 'ESR', '3', '1', 'Blood', 2, '2', '1200', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:23:16', 'desmondjohn', '2026-02-09 23:00:00', '15:56:48'),
(39, 'Activated Partial Thromboplastin Time', '3', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:24:58', '3571', '2022-03-07 23:00:00', '10:42:42'),
(40, 'Prothrombin Time ', '3', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', 's6068', '2019-12-16 23:00:00', '15:25:42', 'HRM/ST/007', '2022-02-21 23:00:00', '17:27:38'),
(41, 'VDRL (SYPHILLIS) SCREENING ', '1', '1', 'Blood', 1, '2', '3000', 'active', '', '', '', 's6068', '2019-12-19 23:00:00', '21:18:47', 'S6068', '2025-02-19 23:00:00', '13:56:21'),
(42, 'Hepatitis B VIRAL LOAD', '11', '1', 'Blood', 2, '4', '32000', 'active', '', '', '', 's6068', '2020-01-17 23:00:00', '12:46:48', 'S6068', '2025-02-19 23:00:00', '13:48:33'),
(43, 'HBC- IgM', '11', '1', 'Blood', 2, '4', '12000', 'active', '', '', '', 's6068', '2020-01-20 23:00:00', '13:46:27', 'Bolaji', '2020-11-24 23:00:00', '18:04:52'),
(44, 'HBsAg Quantification', '11', '1', 'Blood', 1, '4', '10000', 'active', '', '', '', 's6068', '2020-01-20 23:00:00', '14:02:19', 'Bolaji', '2020-07-07 23:00:00', '12:29:52'),
(45, 'HBV PROFILE', '11', '1', 'Blood', 2, '2', '7500', 'active', '', '', '', 's6068', '2020-01-20 23:00:00', '14:18:49', 'S6068', '2025-02-19 23:00:00', '13:44:23'),
(46, 'THYPHOID TEST (RDT)', '2', '1', 'Blood', 1, '2', '2500', 'active', '', '', '', 's6068', '2020-01-20 23:00:00', '14:34:15', 'S6068', '2025-02-19 23:00:00', '14:41:40'),
(47, 'Semen Analysis + M/C/S', '2', '1', 'Semen', 48, '2', '4500', 'inactive', 'Bolaji', '2020-09-05', '18:59:33', 's6068', '2020-01-20 23:00:00', '16:56:18', 's6068', '2020-01-20 23:00:00', '17:30:56'),
(48, 'Semen Analysis', '2', '1', 'Semen', 24, '2', '5000', 'inactive', '', '', '', 's6068', '2020-01-20 23:00:00', '16:56:53', 'S6068', '2025-02-19 23:00:00', '16:16:51'),
(49, 'H. PYLORI STOOL ANTIGEN DETECTION', '2', '1', 'Stool', 24, '2', '8500', 'active', '', '', '', 's6068', '2020-01-20 23:00:00', '16:58:31', 'S6068', '2025-02-20 23:00:00', '13:19:29'),
(50, 'HBsAg, Anti-HCV (RDT)', '2', '1', 'Blood', 1, '2', '2000', 'active', '', '', '', 's6068', '2020-01-20 23:00:00', '16:59:59', '3571', '2020-05-20 23:00:00', '10:35:24'),
(51, 'Progesterone (Luteal)', '4', '1', 'Blood', 24, '2', '3500', 'active', '', '', '', 's6068', '2020-01-20 23:00:00', '18:30:45', '3571', '2020-06-26 23:00:00', '11:45:24'),
(52, 'Serum Pregnancy Test(RDT)', '4', '1', 'Blood', 1, '2', '500', 'active', '', '', '', 's6068', '2020-01-20 23:00:00', '18:36:03', '', '0000-00-00 00:00:00', '00:00:00'),
(53, 'Alpha Fetoprotein', '4', '1', 'Blood', 1, '2', '5000', 'active', '', '', '', 's6068', '2020-01-20 23:00:00', '18:42:09', 'Bolaji', '2020-07-07 23:00:00', '12:34:12'),
(54, 'PSA', '4', '1', 'Blood', 1, '2', '6500', 'active', '3571', '2020-04-17', '15:59:00', 's6068', '2020-01-20 23:00:00', '18:43:11', 'desmondjohn', '2026-02-09 23:00:00', '15:24:07'),
(55, 'SERUM BILIRUBIN (Total and Direct)', '4', '1', 'Blood', 1, '2', '2500', 'active', '', '', '', 's6068', '2020-01-20 23:00:00', '19:12:34', 'S6068', '2025-02-20 23:00:00', '13:13:51'),
(56, 'TSH, TT3 and TT4', '4', '1', 'Blood', 24, '2', '9000', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '10:32:52', '', '0000-00-00 00:00:00', '00:00:00'),
(57, 'TSH, fT3 and fT4', '4', '1', 'Blood', 24, '2', '9000', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '10:33:59', '', '0000-00-00 00:00:00', '00:00:00'),
(58, 'Hormonal profile', '4', '1', 'Blood', 2, '4', '12500', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '10:36:13', '', '0000-00-00 00:00:00', '00:00:00'),
(59, 'Sodium, Potassium, Calcium, and Phosphate', '4', '1', 'Blood', 6, '2', '4000', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '10:38:00', 'Bolaji', '2020-06-10 23:00:00', '15:05:59'),
(60, 'Renal profile (Children)', '4', '1', 'Blood', 6, '2', '3000', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '10:39:17', 's6068', '2020-01-21 23:00:00', '10:53:45'),
(61, 'Renal profile (Adult)', '4', '1', 'Blood', 6, '2', '3000', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '10:40:47', '', '0000-00-00 00:00:00', '00:00:00'),
(62, 'Renal profile, Calcium, Phosphate and Albumin', '4', '1', 'Blood', 8, '2', '6000', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '10:43:34', '', '0000-00-00 00:00:00', '00:00:00'),
(63, 'Hormonal Profile (Complete)', '4', '1', 'Blood', 2, '4', '19500', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '10:47:31', '', '0000-00-00 00:00:00', '00:00:00'),
(64, 'Renal profile, Urate, Phospate and Calcium', '4', '1', 'Blood', 8, '2', '6000', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '10:52:15', '3571', '2020-05-27 23:00:00', '18:58:16'),
(65, 'PCV (CHILDREN)', '3', '1', 'Blood', 1, '2', '1000', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '12:29:39', 'S6068', '2025-02-19 23:00:00', '15:52:39'),
(66, 'PCV (Female)', '3', '1', 'Blood', 1, '2', '1000', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '12:30:57', 'S6068', '2025-02-19 23:00:00', '15:52:58'),
(67, 'PCV (Male)', '3', '1', 'Blood', 1, '2', '1000', 'active', '', '', '', 's6068', '2020-01-21 23:00:00', '12:31:28', 'S6068', '2025-02-19 23:00:00', '15:53:14'),
(68, 'ESR (Male)', '3', '1', 'Blood', 2, '2', '1200', 'inactive', '', '', '', 's6068', '2020-01-24 23:00:00', '08:46:27', 'desmondjohn', '2026-02-09 23:00:00', '15:57:21'),
(69, 'Full Blood Count (FEMALE)', '3', '1', 'Blood', 1, '2', '4000', 'active', '', '', '', 's6068', '2020-01-24 23:00:00', '08:53:46', 'S6068', '2025-02-19 23:00:00', '15:46:18'),
(70, 'STOOL MICROSCOPY', '2', '1', 'Stool', 24, '2', '5000', 'active', '', '', '', 's6068', '2020-01-24 23:00:00', '10:11:13', 'S6068', '2025-02-20 23:00:00', '13:21:32'),
(71, 'Culture', '2', '1', 'As appropriate', 3, '3', '3000', 'active', '', '', '', 's6068', '2020-01-24 23:00:00', '10:15:56', 'Bolaji', '2022-04-05 23:00:00', '19:14:24'),
(72, 'Stool Microscopy Culture and Sensitivity', '2', '1', 'Stool', 2, '3', '3000', 'active', '', '', '', 'yekeen', '2020-01-31 23:00:00', '19:59:35', '', '0000-00-00 00:00:00', '00:00:00'),
(73, 'Malaria Parasite (Microscopy)', '2', '1', 'Blood', 1, '2', '1200', 'inactive', '', '', '', '3571', '2020-04-03 23:00:00', '15:24:59', 'desmondjohn', '2026-02-13 23:00:00', '15:03:07'),
(74, 'FBC +ESR (Male)', '3', '1', 'Blood', 3, '2', '3000', 'inactive', 'Bolaji', '2021-03-12', '12:37:08', '3571', '2020-04-13 23:00:00', '15:15:23', '', '0000-00-00 00:00:00', '00:00:00'),
(75, 'FT3', '8', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', '3571', '2020-04-14 23:00:00', '13:01:58', '', '0000-00-00 00:00:00', '00:00:00'),
(76, 'FT4', '8', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', '3571', '2020-04-14 23:00:00', '13:02:19', '', '0000-00-00 00:00:00', '00:00:00'),
(77, 'PSA', '10', '1', 'Blood', 4, '2', '4000', 'inactive', '', '', '', '3571', '2020-04-14 23:00:00', '13:25:12', 'desmondjohn', '2026-02-09 23:00:00', '15:26:22'),
(78, 'CARCINO- EMBRYONIC ANTIGEN (CEA)', '10', '1', 'Blood', 2, '4', '13000', 'active', '', '', '', '3571', '2020-04-14 23:00:00', '13:26:41', 'S6068', '2025-02-19 23:00:00', '16:29:40'),
(79, 'AFP', '10', '1', 'Blood', 2, '2', '5000', 'active', '', '', '', '3571', '2020-04-14 23:00:00', '13:31:49', 'Bolaji', '2020-07-07 23:00:00', '12:33:04'),
(80, 'Cardiac Troponin I', '9', '1', 'Blood', 2, '2', '4500', 'active', '', '', '', '3571', '2020-04-14 23:00:00', '15:14:51', 'Bolaji', '2020-07-06 23:00:00', '13:20:02'),
(81, 'HVS M/C/S', '2', '1', 'HVS', 3, '3', '3500', 'inactive', '3571', '2020-06-17', '12:15:40', '3571', '2020-04-15 23:00:00', '14:01:29', '', '0000-00-00 00:00:00', '00:00:00'),
(82, 'ECS M/C/S', '2', '1', 'ECS', 3, '3', '3500', 'active', '', '', '', '3571', '2020-04-15 23:00:00', '14:01:54', '', '0000-00-00 00:00:00', '00:00:00'),
(83, 'Potassium', '4', '1', 'Blood', 60, '1', '1000', 'active', '', '', '', '3571', '2020-04-16 23:00:00', '16:44:10', '', '0000-00-00 00:00:00', '00:00:00'),
(84, 'RBS', '4', '1', 'Blood', 1, '2', '500', 'active', '', '', '', '3571', '2020-04-19 23:00:00', '12:10:17', '3571', '2020-04-19 23:00:00', '14:28:53'),
(85, 'FBC + ESR (Female)', '3', '1', 'Blood', 1, '1', '3000', 'inactive', 'Bolaji', '2021-03-12', '12:36:59', '3571', '2020-04-23 23:00:00', '12:36:54', '3571', '2020-04-23 23:00:00', '12:38:03'),
(86, 'MP +  Salmonella Antibody Test (RDT)', '2', '1', 'Blood', 1, '2', '2000', 'inactive', '3571', '2021-10-27', '08:34:08', '3571', '2020-04-23 23:00:00', '14:01:22', '3571', '2020-05-27 23:00:00', '15:43:54'),
(87, 'Complete TFT', '8', '1', 'Blood', 24, '2', '15000', 'active', '', '', '', '3571', '2020-04-23 23:00:00', '15:57:33', '', '0000-00-00 00:00:00', '00:00:00'),
(88, 'Prolactin (Male)', '4', '1', 'Blood', 1, '2', '3000', 'active', '', '', '', '3571', '2020-05-03 23:00:00', '13:09:15', '3571', '2020-05-03 23:00:00', '13:31:05'),
(89, 'Blood group and Haemoglobin Genotype', '3', '1', 'Blood', 2, '2', '1500', 'inactive', '', '', '', '3571', '2020-05-03 23:00:00', '16:25:39', 'S6068', '2025-02-19 23:00:00', '13:32:27'),
(90, '2 Hour Postprandial', '4', '1', 'Blood', 1, '2', '2000', 'active', '', '', '', 'Bolaji', '2020-05-04 23:00:00', '11:16:37', 'S6068', '2025-02-19 23:00:00', '16:36:56'),
(91, 'Liver Profile (Children)', '4', '1', 'Blood', 4, '1', '4000', 'active', '', '', '', '3571', '2020-05-06 23:00:00', '16:39:25', '', '0000-00-00 00:00:00', '00:00:00'),
(92, 'Urine M/C/S', '2', '1', 'Urine', 3, '3', '8000', 'active', '', '', '', '3571', '2020-05-08 23:00:00', '10:38:06', 'S6068', '2025-02-19 23:00:00', '16:07:02'),
(93, 'B-HCG', '7', '1', 'Blood', 1, '2', '4000', 'active', '', '', '', '3571', '2020-05-08 23:00:00', '11:34:51', '', '0000-00-00 00:00:00', '00:00:00'),
(94, 'Wound swab M/C/S', '2', '1', 'Wound swab', 3, '3', '3000', 'active', '', '', '', '3571', '2020-05-08 23:00:00', '11:39:03', '', '0000-00-00 00:00:00', '00:00:00'),
(95, 'Aspirate M/C/S', '2', '1', 'Aspirate', 72, '1', '3000', 'active', '', '', '', '3571', '2020-05-08 23:00:00', '12:54:36', '3571', '2020-05-08 23:00:00', '12:58:38'),
(96, 'Abscess M/C/S', '2', '1', 'Abscess', 72, '1', '3000', 'active', '', '', '', '3571', '2020-05-08 23:00:00', '12:56:32', '', '0000-00-00 00:00:00', '00:00:00'),
(97, 'Sodium, Potassium', '4', '1', 'Blood', 1, '2', '2000', 'active', '', '', '', '3571', '2020-05-08 23:00:00', '17:38:11', 'HRM/ST/007', '2021-04-16 23:00:00', '17:56:23'),
(98, 'Full Blood Count (BABY)', '3', '1', 'Blood', 1, '2', '4000', 'active', '', '', '', 'Bolaji', '2020-05-10 23:00:00', '10:45:08', 'S6068', '2025-02-19 23:00:00', '15:47:07'),
(99, 'Full Blood Count (CHILDREN)', '3', '1', 'Blood', 1, '2', '4000', 'active', '', '', '', 'Bolaji', '2020-05-12 23:00:00', '10:09:01', 'S6068', '2025-02-19 23:00:00', '15:47:42'),
(100, 'Calcium, and Albumin', '4', '1', 'Blood', 3, '2', '2000', 'active', '', '', '', '3571', '2020-05-12 23:00:00', '18:05:57', 'Bolaji', '2020-05-22 23:00:00', '12:41:03'),
(101, 'LVS', '2', '1', 'Blood', 30, '1', '1000', 'active', '', '', '', 'Bolaji', '2020-05-15 23:00:00', '15:11:53', '', '0000-00-00 00:00:00', '00:00:00'),
(102, 'Total protein', '4', '1', 'Blood', 1, '1', '1000', 'active', NULL, NULL, NULL, '3571', '2020-05-15 23:00:00', '18:57:07', NULL, NULL, NULL),
(103, 'Renal profile, Calcium, Phosphate, Albumin, Total protein ', '4', '1', 'Blood', 6, '2', '7000', 'active', NULL, NULL, NULL, '3571', '2020-05-15 23:00:00', '19:24:33', NULL, NULL, NULL),
(104, 'SEMEN FLUID ANALYSIS + SEMEN M/C/S', '4', '1', 'Semen', 4, '3', '11500', 'active', NULL, NULL, NULL, '3571', '2020-05-16 23:00:00', '10:44:30', 'S6068', '2025-02-19 23:00:00', '16:25:17'),
(105, 'FSH, LH, Prolactin, E2, Testosterone', '4', '1', 'Blood', 1, '3', '16000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-16 23:00:00', '16:06:23', 'Bolaji', '2020-05-19 23:00:00', '11:55:07'),
(106, 'ALT, and AST', '4', '1', 'Blood', 2, '2', '2000', 'active', NULL, NULL, NULL, '3571', '2020-05-18 23:00:00', '15:03:57', 'Bolaji', '2020-06-24 23:00:00', '18:46:05'),
(107, 'FSH, LH, Prolactin, E2', '7', '1', 'Blood', 1, '3', '12500', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-19 23:00:00', '11:41:38', 'Bolaji', '2020-05-28 23:00:00', '11:45:26'),
(108, 'Viral markers', '2', '1', 'Blood', 1, '2', '2500', 'inactive', '3571', '2020-05-21', '10:36:30', '3571', '2020-05-20 23:00:00', '10:32:59', NULL, NULL, NULL),
(109, 'HBsAg, Anti-HCV, LVS (RDT)', '2', '1', 'Blood', 1, '2', '2500', 'active', NULL, NULL, NULL, '3571', '2020-05-20 23:00:00', '10:34:23', NULL, NULL, NULL),
(110, 'HbsAg SCREENING (RAPID)', '2', '1', 'Blood', 1, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-22 23:00:00', '10:32:54', 'S6068', '2025-02-19 23:00:00', '13:39:16'),
(111, 'Cholesterol', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2020-05-25 23:00:00', '12:25:21', NULL, NULL, NULL),
(112, 'Testosterone (Male)', '7', '1', 'Blood', 2, '2', '3500', 'active', NULL, NULL, NULL, '3571', '2020-05-27 23:00:00', '15:52:33', '3571', '2020-05-27 23:00:00', '15:53:54'),
(113, 'Creatinine', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-28 23:00:00', '11:06:10', NULL, NULL, NULL),
(114, 'Calcium, Phosphate, Albumin,ALP', '4', '1', 'Blood', 2, '2', '4000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-28 23:00:00', '11:48:39', 'Bolaji', '2020-07-08 23:00:00', '16:02:49'),
(115, 'PERIPHERAL BLOOD FILM', '3', '1', 'Blood', 24, '2', '4000', 'active', NULL, NULL, NULL, '3571', '2020-05-29 23:00:00', '12:44:39', 'desmondjohn', '2026-02-08 23:00:00', '14:11:07'),
(116, 'FSH, LH, PRL, Testosterone (Male)', '7', '1', 'Blood', 1, '3', '12500', 'active', NULL, NULL, NULL, '3571', '2020-05-31 23:00:00', '10:12:57', '3571', '2020-05-31 23:00:00', '10:18:47'),
(117, 'PCV (BABY)', '3', '1', 'Blood', 30, '1', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-31 23:00:00', '13:12:38', 'S6068', '2025-02-19 23:00:00', '15:51:43'),
(118, 'HCV SCREENING (RAPID)', '1', '1', 'Blood', 1, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-31 23:00:00', '16:03:08', 'S6068', '2025-02-19 23:00:00', '13:54:04'),
(119, 'Albumin', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-31 23:00:00', '18:08:26', NULL, NULL, NULL),
(120, 'FSH, LH, Prl, E2, Progesterone', '7', '1', 'Blood', 1, '2', '16000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-04 23:00:00', '19:04:35', 'Bolaji', '2020-07-06 23:00:00', '10:13:23'),
(121, 'FSH, LH, Prl, and Progesterone(Luteal phase)', '7', '1', 'Blood', 1, '2', '12500', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-04 23:00:00', '19:04:48', 'Bolaji', '2022-01-07 23:00:00', '19:12:44'),
(122, 'FSH, LH, Prolactin', '7', '1', 'Blood', 6, '1', '9000', 'active', NULL, NULL, NULL, '3571', '2020-06-08 23:00:00', '14:55:32', NULL, NULL, NULL),
(123, 'SERUM CALCIUM', '4', '1', 'Blood', 6, '2', '1500', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-10 23:00:00', '18:37:58', 'S6068', '2025-02-20 23:00:00', '13:12:53'),
(124, 'HVS MCS', '2', '1', 'HVS', 2, '3', '3500', 'active', NULL, NULL, NULL, '3571', '2020-06-16 23:00:00', '12:16:14', NULL, NULL, NULL),
(125, 'SERUM PHOSPHATE', '4', '1', 'Blood', 6, '2', '1500', 'active', NULL, NULL, NULL, '3571', '2020-06-16 23:00:00', '13:01:12', 'S6068', '2025-02-20 23:00:00', '13:12:09'),
(126, 'Sodium ', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-24 23:00:00', '12:27:24', 'Bolaji', '2020-09-04 23:00:00', '10:31:48'),
(127, 'ALT, AST, ALP, TP, and ALB', '4', '1', 'Blood', 2, '2', '4000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-28 23:00:00', '13:38:42', 'Bolaji', '2020-06-28 23:00:00', '13:41:52'),
(128, 'FSH, LH, PRL, Testosterone, Progesterone', '7', '1', 'Blood', 1, '3', '16000', 'active', NULL, NULL, NULL, '3571', '2020-06-30 23:00:00', '15:22:10', NULL, NULL, NULL),
(129, 'Calcium, Phosphate, Albumin', '4', '1', 'Blood', 2, '2', '3000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-08 23:00:00', '17:50:28', 'HRM/ST/007', '2021-04-16 23:00:00', '15:23:36'),
(130, 'Glomerular Filtration rate (GFR)', '4', '1', 'Blood', 1, '2', '0000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-12 23:00:00', '13:15:20', NULL, NULL, NULL),
(131, 'C-Reactive Protein (CRP)', '4', '1', 'Blood', 2, '2', '6000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-15 23:00:00', '19:26:13', NULL, NULL, NULL),
(132, 'ELECTROLYTE, CREATININE &amp; UREA (EUCR)', '4', '1', 'Blood', 4, '2', '4500', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-19 23:00:00', '16:45:21', 'S6068', '2025-02-20 23:00:00', '12:40:56'),
(133, 'Creatinine And Urea', '4', '1', 'Blood', 1, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-19 23:00:00', '17:03:40', NULL, NULL, NULL),
(134, 'FBC (Neonate)', '3', '1', 'Blood', 2, '2', '4000', 'inactive', NULL, NULL, NULL, 'Bolaji', '2020-07-19 23:00:00', '19:15:32', 'desmondjohn', '2026-02-13 23:00:00', '14:31:27'),
(135, 'FBC (Children)', '3', '1', 'Blood', 2, '2', '4000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-19 23:00:00', '19:15:52', 'Desmondjohn', '2026-02-08 23:00:00', '17:28:16'),
(136, 'FBC (Female)', '3', '1', 'Blood', 2, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-19 23:00:00', '19:16:17', 'Desmondjohn', '2026-02-08 23:00:00', '17:28:30'),
(137, 'FBC (Male)', '3', '1', 'Blood', 2, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-19 23:00:00', '19:16:29', NULL, NULL, NULL),
(138, 'Alkaline Phosphatase(ALP)', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-23 23:00:00', '16:07:11', 'Bolaji', '2020-07-23 23:00:00', '16:08:54'),
(139, 'FSH, LH, E2, Testosterone', '7', '1', 'Blood', 24, '2', '13000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-24 23:00:00', '11:34:10', NULL, NULL, NULL),
(140, 'BNP', '9', '1', 'Blood', 1, '2', '5000', 'inactive', '3571', '2021-11-14', '12:12:47', 'Bolaji', '2020-07-27 23:00:00', '10:46:20', '3571', '2021-02-18 23:00:00', '12:17:00'),
(141, 'FSH, LH, E2', '7', '1', 'Blood', 24, '2', '9500', 'active', NULL, NULL, NULL, '3571', '2020-08-07 23:00:00', '12:53:28', NULL, NULL, NULL),
(142, 'Slide', '3', '1', 'Blood', 2, '2', '500', 'active', NULL, NULL, NULL, 'Bolaji', '2020-08-09 23:00:00', '09:54:24', NULL, NULL, NULL),
(143, 'Vaginal wash/swab Microscopy', '2', '1', 'Vaginal wash', 12, '2', '2000', 'inactive', 'HRM/ST/007', '2021-07-04', '11:46:56', 'Bolaji', '2020-08-27 23:00:00', '15:35:15', 'HRM/ST/007', '2021-07-03 23:00:00', '11:41:15'),
(144, 'FSL, LH, Testosterone (Male)', '7', '1', 'Blood', 24, '2', '9500', 'active', NULL, NULL, NULL, '3571', '2020-08-28 23:00:00', '10:56:42', NULL, NULL, NULL),
(145, 'Triglyceride', '4', '1', 'Blood', 2, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-09-08 23:00:00', '17:10:47', NULL, NULL, NULL),
(146, 'Throat Swab M/C/S', '2', '1', 'Swab', 3, '3', '3000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-09-09 23:00:00', '15:39:42', NULL, NULL, NULL),
(147, 'Glycated haemoglobin (HBA1C)', '2', '1', 'Blood', 1, '2', '4000', 'inactive', '3571', '2020-10-31', '11:17:00', '3571', '2020-09-23 23:00:00', '14:43:36', NULL, NULL, NULL),
(148, 'GLYCATED HAEMOGLOBIN (HBA1C)', '4', '1', 'Blood', 1, '2', '7000', 'active', NULL, NULL, NULL, '3571', '2020-09-23 23:00:00', '14:43:52', 'S6068', '2025-02-19 23:00:00', '16:40:39'),
(149, 'Hormonal profile (1-10 yrs)', '7', '1', 'Blood', 24, '2', '19500', 'inactive', NULL, NULL, NULL, 'Bolaji', '2020-10-06 23:00:00', '19:19:59', 'S6068', '2025-02-21 23:00:00', '15:46:51'),
(150, 'Urine Pregnancy Test', '7', '1', 'Urine', 1, '2', '500', 'active', NULL, NULL, NULL, '3571', '2020-10-07 23:00:00', '13:38:46', NULL, NULL, NULL),
(151, 'Pleural Fluid Cell Count', '2', '1', 'Pleural Fluid ', 24, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-10-09 23:00:00', '10:20:23', NULL, NULL, NULL),
(152, 'Cortisol', '4', '1', 'Blood', 24, '2', '6000', 'inactive', 'Bolaji', '2020-10-27', '08:47:05', 'Bolaji', '2020-10-26 23:00:00', '08:45:40', NULL, NULL, NULL),
(153, 'Cortisol (AM)', '4', '1', 'Blood', 24, '2', '6000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-10-26 23:00:00', '08:46:07', NULL, NULL, NULL),
(154, 'Cortisol (PM)', '4', '1', 'Blood', 24, '2', '6000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-10-26 23:00:00', '08:46:18', NULL, NULL, NULL),
(155, 'Acid Fast Bacilli(AFB)', '2', '1', 'As appropriate', 3, '3', '3000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-10-28 23:00:00', '16:36:58', '3571', '2022-05-23 23:00:00', '09:40:02'),
(156, 'Hepatitis C RNA Load', '11', '1', 'Blood', 14, '3', '27000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-10-29 23:00:00', '15:41:06', NULL, NULL, NULL),
(157, 'FSH, LH, TESTOSTERONE', '7', '1', 'Blood', 8, '2', '9500', 'active', NULL, NULL, NULL, '3571', '2020-10-30 23:00:00', '16:08:25', NULL, NULL, NULL),
(158, 'May. TRANSPORTATION', '10', '1', 'Transport', 1, '5', '8400', 'active', NULL, NULL, NULL, 'Bolaji', '2020-11-02 23:00:00', '10:52:17', 'Bolaji', '2022-05-31 23:00:00', '13:57:59'),
(159, 'Rheumatoid factor (RF)', '1', '1', 'Blood', 1, '2', '8000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-11-02 23:00:00', '15:01:00', 's6068', '2024-10-29 23:00:00', '10:41:07'),
(160, 'Hepatitis C Genotype', '11', '1', 'Blood', 2, '4', '30000', 'inactive', NULL, NULL, NULL, '3571', '2020-11-03 23:00:00', '08:19:30', 'S6068', '2025-02-19 23:00:00', '15:56:57'),
(161, 'Hepatitis B Genotype', '11', '1', 'Blood', 2, '4', '25000', 'inactive', NULL, NULL, NULL, '3571', '2020-11-03 23:00:00', '08:20:01', 'S6068', '2025-02-19 23:00:00', '15:56:59'),
(162, 'CHLAMYDIA ANTIGEN', '1', '1', 'HVS', 24, '2', '7500', 'active', NULL, NULL, NULL, '3571', '2020-11-30 23:00:00', '10:55:50', 'S6068', '2025-02-19 23:00:00', '16:27:56'),
(163, 'Trichomonas vaginalis ', '2', '1', 'Urethral Swab', 24, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2020-11-30 23:00:00', '10:59:54', '3571', '2020-11-30 23:00:00', '11:02:36'),
(164, 'Chemistry', '4', '1', 'Blood', 2, '2', '1000', 'inactive', '3571', '2021-01-30', '14:16:27', '3571', '2021-01-29 23:00:00', '14:12:37', NULL, NULL, NULL),
(165, 'Alkaline Phosphatase(ALP) Children', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2021-01-29 23:00:00', '14:15:47', '3571', '2021-01-29 23:00:00', '14:17:52'),
(166, 'ALT', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2021-02-01 23:00:00', '09:54:15', NULL, NULL, NULL),
(167, 'Testosterone (F)', '4', '1', 'Blood', 1, '2', '3500', 'active', NULL, NULL, NULL, '3571', '2021-02-21 23:00:00', '18:04:17', '3571', '2021-02-21 23:00:00', '18:04:52'),
(168, '1 Hour Postprandial', '4', '1', 'Blood', 1, '2', '2000', 'active', NULL, NULL, NULL, '3571', '2021-02-23 23:00:00', '11:18:00', 'S6068', '2025-02-19 23:00:00', '16:37:28'),
(169, 'Estradiol (Male)', '7', '1', 'Blood', 24, '2', '3500', 'active', NULL, NULL, NULL, '3571', '2021-02-25 23:00:00', '07:53:13', NULL, NULL, NULL),
(170, 'Bicarbonate ', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2021-02-28 23:00:00', '15:48:20', NULL, NULL, NULL),
(171, 'Creatinine and Urea (Children)', '4', '1', 'Blood', 1, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2021-03-04 23:00:00', '12:42:05', NULL, NULL, NULL),
(172, 'Rheumatoid factor', '3', '1', 'Blood', 1, '1', '6000', 'inactive', '3571', '2021-10-27', '08:35:36', 'HRM/ST/007', '2021-03-28 23:00:00', '14:27:15', NULL, NULL, NULL),
(173, 'First bank 2019 Balance', '10', '1', 'Blood', 1, '1', '499000', 'active', NULL, NULL, NULL, '3571', '2021-04-01 23:00:00', '13:10:31', NULL, NULL, NULL),
(174, 'E/U/CR (Children)', '4', '1', 'Blood', 2, '2', '3000', 'inactive', NULL, NULL, NULL, '3571', '2021-04-26 23:00:00', '09:18:49', 'desmondjohn', '2026-02-10 23:00:00', '14:18:57'),
(175, 'E/U/CR', '4', '1', 'Blood', 2, '2', '5000', 'active', NULL, NULL, NULL, '3571', '2021-04-26 23:00:00', '09:19:04', 'desmondjohn', '2026-02-10 23:00:00', '14:18:30'),
(176, 'Urine drug of abuse screening', '4', '1', 'Urine', 24, '2', '12000', 'active', NULL, NULL, NULL, '3571', '2021-05-14 23:00:00', '16:09:36', '3571', '2021-05-14 23:00:00', '16:31:18'),
(177, 'Amylase', '4', '1', 'Pleural fluid', 24, '2', '6000', 'inactive', NULL, NULL, NULL, 'HRM/ST/007', '2021-05-17 23:00:00', '18:42:16', 'S6068', '2025-02-20 23:00:00', '13:22:15'),
(178, 'Chloride', '4', '1', 'Blood', 30, '1', '1000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-05-18 23:00:00', '11:57:28', NULL, NULL, NULL),
(179, 'Semen analysis with culture', '2', '1', 'Seminal fluid', 48, '2', '6500', 'inactive', '3571', '2022-02-12', '10:15:25', '3571', '2021-06-18 23:00:00', '16:52:07', NULL, NULL, NULL),
(180, 'Anti-Mullerian hormone (AMH)', '7', '1', 'Blood', 2, '3', '15000', 'active', NULL, NULL, NULL, '3571', '2021-06-21 23:00:00', '08:46:23', NULL, NULL, NULL),
(181, ' E2', '7', '1', 'Blood', 24, '2', '3500', 'active', NULL, NULL, NULL, '3571', '2021-06-29 23:00:00', '10:10:41', NULL, NULL, NULL),
(182, 'Vaginal wash/swab microscopy', '2', '1', 'Vaginal wash', 12, '2', '2000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-07-03 23:00:00', '11:51:41', '3571', '2021-07-03 23:00:00', '12:37:01'),
(183, 'hs C-reactive protein (hsCRP)', '4', '1', 'Blood', 24, '2', '6000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-07-18 23:00:00', '10:42:58', NULL, NULL, NULL),
(184, 'Microscopy', '2', '1', 'Aspirate', 24, '2', '3000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-07-25 23:00:00', '18:08:01', NULL, NULL, NULL),
(185, 'Urethral Swab M/C/S', '2', '1', 'Urethral Swab', 48, '2', '3000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-08-02 23:00:00', '09:53:36', 's6068', '2022-08-22 23:00:00', '05:15:59'),
(186, 'Vitamin D - 25 (OH) D2/D3 level', '4', '1', 'Blood', 24, '2', '15000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-08-03 23:00:00', '09:11:15', 'HRM/ST/007', '2021-12-20 23:00:00', '09:52:53'),
(187, 'Microalbumin', '4', '1', 'Urine', 24, '2', '5000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-08-03 23:00:00', '09:18:39', NULL, NULL, NULL),
(188, 'Vitamin D Research', '4', '1', 'Blood', 1, '3', '1000', 'active', NULL, NULL, NULL, '3571', '2021-09-22 23:00:00', '18:27:42', NULL, NULL, NULL),
(189, 'NT-proBNP', '4', '1', 'Blood', 2, '2', '5000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-11-06 23:00:00', '12:17:40', NULL, NULL, NULL),
(190, 'Anti-HBs', '11', '1', 'Blood', 24, '2', '10000', 'active', NULL, NULL, NULL, '3571', '2021-12-27 23:00:00', '10:04:59', NULL, NULL, NULL),
(191, 'FSH,LH,PRL,E2, Testosterone and Progesterone(Luteal phase)', '7', '1', 'Blood', 1, '3', '19500', 'active', NULL, NULL, NULL, 'Bolaji', '2022-01-07 23:00:00', '13:47:27', 'Bolaji', '2022-02-03 23:00:00', '08:19:10'),
(192, 'Urea', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2022-01-19 23:00:00', '11:20:32', NULL, NULL, NULL),
(193, 'INDIRECT COMB&#039;S TEST', '3', '1', 'Blood', 48, '2', '5500', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-02-01 23:00:00', '13:52:58', 'S6068', '2025-02-19 23:00:00', '14:20:39'),
(194, 'Free PSA', '4', '1', 'Blood', 1, '3', '4000', 'inactive', NULL, NULL, NULL, '3571', '2022-02-14 23:00:00', '08:27:57', 'desmondjohn', '2026-02-09 23:00:00', '15:26:38'),
(195, 'PT, INR', '3', '1', 'Blood', 12, '2', '4500', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-02-21 23:00:00', '17:21:01', 'S6068', '2025-02-19 23:00:00', '16:33:45'),
(196, 'PTTK', '3', '1', 'Blood', 12, '2', '4500', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-02-21 23:00:00', '17:21:35', 'S6068', '2025-02-19 23:00:00', '16:34:53'),
(197, 'MAGNESIUM', '4', '1', 'Blood', 2, '2', '5500', 'active', NULL, NULL, NULL, '3571', '2022-02-28 23:00:00', '15:06:45', 'S6068', '2025-02-20 23:00:00', '13:24:01'),
(198, 'SERUM ZINC', '7', '1', 'Blood', 24, '2', '5500', 'active', NULL, NULL, NULL, '3571', '2022-03-15 23:00:00', '09:36:54', 'S6068', '2025-02-20 23:00:00', '13:25:32'),
(199, 'Semen Zinc', '7', '1', 'Semen', 24, '2', '2000', 'inactive', NULL, NULL, NULL, '3571', '2022-03-15 23:00:00', '09:37:43', 'S6068', '2025-02-19 23:00:00', '16:26:19'),
(200, 'CA-125', '10', '1', 'Blood', 5, '3', '6000', 'active', NULL, NULL, NULL, '3571', '2022-03-16 23:00:00', '07:56:38', NULL, NULL, NULL),
(201, 'SEMEN FLUID ANALYSIS (SFA)', '7', '1', 'Semen', 1, '2', '8000', 'active', NULL, NULL, NULL, '3571', '2022-03-16 23:00:00', '11:16:56', 'S6068', '2025-02-19 23:00:00', '16:17:45'),
(202, 'SEMEN M/C/S', '7', '1', 'Semen', 72, '2', '6000', 'active', NULL, NULL, NULL, '3571', '2022-03-19 23:00:00', '13:37:00', 'S6068', '2025-02-19 23:00:00', '16:22:06'),
(203, 'Anti-nuclear antibody (ANA)', '1', '1', 'Blood', 5, '3', '20000', 'active', NULL, NULL, NULL, '3571', '2022-03-21 23:00:00', '10:22:26', NULL, NULL, NULL),
(204, 'Haemoglobin quantification', '3', '1', 'Blood', 5, '3', '15000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-03-21 23:00:00', '18:40:31', 'S6068', '2025-02-19 23:00:00', '16:01:28'),
(205, 'CA19-9', '1', '1', 'Blood', 48, '2', '6000', 'active', NULL, NULL, NULL, 'Bolaji', '2022-03-24 23:00:00', '16:29:08', NULL, NULL, NULL),
(206, 'CA 15-3', '9', '1', 'Blood', 4, '2', '6000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-04-04 23:00:00', '18:34:02', NULL, NULL, NULL),
(207, 'E/U&CR (Children)', '4', '1', 'Blood', 2, '2', '3000', 'inactive', NULL, NULL, NULL, 'Bolaji', '2022-04-13 23:00:00', '09:01:59', 'desmondjohn', '2026-02-10 23:00:00', '14:18:59'),
(208, 'E/U&CR (Adult)', '4', '1', 'Blood', 2, '2', '3000', 'inactive', NULL, NULL, NULL, 'Bolaji', '2022-04-13 23:00:00', '09:06:52', 'desmondjohn', '2026-02-10 23:00:00', '14:19:00'),
(209, 'DIRECT COMB&#039;S TEST', '3', '1', 'Blood', 2, '3', '5500', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-04-19 23:00:00', '12:16:12', 'S6068', '2025-02-19 23:00:00', '14:21:12'),
(210, 'B-HCG', '10', '1', 'As appropriate', 2, '2', '4000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-05-23 23:00:00', '18:57:55', NULL, NULL, NULL),
(211, 'Calcium & Phosphate', '4', '1', 'Blood', 2, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2022-06-02 23:00:00', '16:38:23', NULL, NULL, NULL),
(212, 'GGT', '4', '1', 'Blood', 24, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2022-06-28 23:00:00', '10:31:58', NULL, NULL, NULL),
(213, 'LIVER FUNCTION TEST (LFT)', '4', '1', 'Blood', 12, '2', '6500', 'active', NULL, NULL, NULL, '3571', '2022-06-28 23:00:00', '10:44:33', 'S6068', '2025-02-20 23:00:00', '13:15:38'),
(214, 'Complete Liver Profile', '4', '1', 'Blood', 24, '2', '5000', 'active', NULL, NULL, NULL, '3571', '2022-06-28 23:00:00', '11:01:06', NULL, NULL, NULL),
(215, 'Creatinine (adult)', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2022-07-01 23:00:00', '18:08:37', NULL, NULL, NULL),
(216, 'Creatinine(Adult)', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2022-07-01 23:00:00', '18:11:07', NULL, NULL, NULL),
(217, 'Complete Liver Profile (Children)', '4', '1', 'Blood', 24, '2', '5000', 'active', NULL, NULL, NULL, '3571', '2022-07-03 23:00:00', '13:04:22', NULL, NULL, NULL),
(218, 'ORAL GLUCOSE TOLERANCE TEST (OGTT)', '4', '1', 'Blood', 4, '2', '4000', 'active', NULL, NULL, NULL, '3571', '2022-07-06 23:00:00', '11:25:07', 'S6068', '2025-02-19 23:00:00', '16:38:41'),
(219, 'PCV/Haemoglobin (Female)', '3', '1', 'Blood', 1, '2', '1000', 'inactive', NULL, NULL, NULL, '3571', '2022-07-06 23:00:00', '11:31:02', 'S6068', '2025-02-19 23:00:00', '15:50:47'),
(220, 'PCV/Haemoglobin (Male)', '3', '1', 'Blood', 24, '2', '1000', 'inactive', NULL, NULL, NULL, '3571', '2022-07-06 23:00:00', '11:59:43', 'S6068', '2025-02-19 23:00:00', '15:50:50'),
(221, 'PCV/Haemoglobin (Children)', '3', '1', 'Blood', 24, '2', '1000', 'inactive', NULL, NULL, NULL, '3571', '2022-07-06 23:00:00', '12:06:04', 'S6068', '2025-02-19 23:00:00', '15:50:52'),
(222, 'PCV/Haemoglobin (Neonate)', '3', '1', 'Blood', 24, '2', '1000', 'inactive', NULL, NULL, NULL, '3571', '2022-07-06 23:00:00', '12:18:12', 'S6068', '2025-02-19 23:00:00', '15:51:00'),
(223, 'CROSS MATCH (FULL)', '3', '1', 'BLOOD', 2, '2', '5000', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 12:30:28', NULL, NULL, NULL, NULL),
(224, 'HIV Screening (ELISA)', '3', '1', 'Blood', 72, '2', '30000', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 12:36:52', NULL, NULL, NULL, NULL),
(225, 'HbSAg SCREENING (ELISA)', '3', '1', 'BLOOD', 72, '2', '30000', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 12:41:47', NULL, 'S6068', '2025-02-19 23:00:00', '14:18:21'),
(226, 'HCV SCREENING (ELISA)', '11', '1', 'Blood', 72, '2', '30000', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 12:54:46', NULL, NULL, NULL, NULL),
(227, 'FULL BLOOD COUNT &amp; PERIPHERAL BLOOD FILM', '3', '1', 'Blood', 24, '2', '7500', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 14:50:06', NULL, NULL, NULL, NULL),
(228, 'GENOTYPE (HAEMOTYPE SC) ', '3', '1', 'Blood', 1, '2', '7000', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 15:00:34', NULL, NULL, NULL, NULL),
(229, 'BONE MARROW ASPIRATION', '3', '1', 'Blood', 5, '3', '10000', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 15:04:17', NULL, NULL, NULL, NULL),
(230, 'BONE MARROW BIOPSY', '3', '1', 'Blood', 5, '3', '10000', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 15:04:52', NULL, NULL, NULL, NULL),
(231, 'BONE MARROW ASPIRATION NEEDLE', '3', '1', 'Blood', 5, '3', '25000', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 15:05:48', NULL, NULL, NULL, NULL),
(232, 'BONE MARROW BIOPSY NEEDLE', '3', '1', 'Blood', 5, '3', '27000', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 15:06:23', NULL, NULL, NULL, NULL),
(233, 'BLEEDING TIME', '3', '1', 'Blood', 2, '2', '6000', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 15:31:21', NULL, NULL, NULL, NULL),
(234, 'CLOTTING PROFILE', '3', '1', 'Blood', 12, '2', '8000', 'active', NULL, NULL, NULL, 'S6068', '2025-02-20 15:32:22', NULL, NULL, NULL, NULL),
(235, 'ELECTROLYTES', '4', '1', 'Blood', 6, '2', '1500', 'active', NULL, NULL, NULL, 'S6068', '2025-02-21 12:06:15', NULL, NULL, NULL, NULL),
(236, 'FBC', '3', '1', 'Blood', 2, '2', '4000', 'inactive', NULL, NULL, NULL, 'Desmondjohn', '2026-02-09 16:31:25', NULL, 'desmondjohn', '2026-02-13 23:00:00', '14:31:30'),
(237, 'Blood Group New', '3', '1', 'Blood', 1, '2', '1500', 'active', NULL, NULL, NULL, 'desmondjohn', '2026-02-09 17:01:26', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blood_donation_test_result`
--

CREATE TABLE `blood_donation_test_result` (
  `id` bigint(20) NOT NULL,
  `customer_id` varchar(50) NOT NULL,
  `ticket_no` varchar(50) NOT NULL,
  `custom_ticket_id` bigint(20) NOT NULL,
  `categ_qtn_id` int(11) DEFAULT NULL,
  `test_qtn_id` int(11) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `c_by` varchar(50) DEFAULT NULL,
  `upd_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_donation_test_result`
--

INSERT INTO `blood_donation_test_result` (`id`, `customer_id`, `ticket_no`, `custom_ticket_id`, `categ_qtn_id`, `test_qtn_id`, `result`, `c_by`, `upd_by`, `created_at`, `updated_at`) VALUES
(1, 'BLCN/0374', 'BHC/24/0001', 2, 1, 1, '0', 's6068', 's6068', '2024-12-07 14:52:30', '2024-12-07 14:53:51'),
(2, 'BLCN/0374', 'BHC/24/0001', 2, 1, 2, '0', 's6068', 's6068', '2024-12-07 14:52:30', '2024-12-07 14:53:51'),
(3, 'BLCN/0374', 'BHC/24/0001', 2, 1, 3, '0', 's6068', 's6068', '2024-12-07 14:52:30', '2024-12-07 14:53:51'),
(4, 'BLCN/0374', 'BHC/24/0001', 2, 1, 4, '0', 's6068', 's6068', '2024-12-07 14:52:30', '2024-12-07 14:53:51'),
(5, 'BLCN/0721', 'BHC/24/0003', 4, 1, 1, '0', 'Tianah', NULL, '2024-12-14 14:29:40', '2024-12-14 14:29:40'),
(6, 'BLCN/0721', 'BHC/24/0003', 4, 1, 2, '0', 'Tianah', NULL, '2024-12-14 14:29:41', '2024-12-14 14:29:41'),
(7, 'BLCN/0721', 'BHC/24/0003', 4, 1, 3, '0', 'Tianah', NULL, '2024-12-14 14:29:41', '2024-12-14 14:29:41'),
(8, 'BLCN/0721', 'BHC/24/0003', 4, 1, 4, '0', 'Tianah', NULL, '2024-12-14 14:29:41', '2024-12-14 14:29:41'),
(9, 'BLCN/0722', 'BHC/24/0004', 7, 1, 1, '0', 's6068', NULL, '2024-12-31 14:53:47', '2024-12-31 14:53:47'),
(10, 'BLCN/0722', 'BHC/24/0004', 7, 1, 2, '0', 's6068', NULL, '2024-12-31 14:53:47', '2024-12-31 14:53:47'),
(11, 'BLCN/0722', 'BHC/24/0004', 7, 1, 3, '0', 's6068', NULL, '2024-12-31 14:53:48', '2024-12-31 14:53:48'),
(12, 'BLCN/0722', 'BHC/24/0004', 7, 1, 4, '0', 's6068', NULL, '2024-12-31 14:53:48', '2024-12-31 14:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `blood_stocks`
--

CREATE TABLE `blood_stocks` (
  `id` bigint(20) NOT NULL,
  `ticket_no` varchar(100) DEFAULT NULL,
  `customer_id` varchar(30) NOT NULL,
  `blood_type_id` int(11) NOT NULL,
  `volume` int(11) NOT NULL DEFAULT 0,
  `sales_price` double(16,0) DEFAULT NULL,
  `sold` enum('no','yes') DEFAULT 'no',
  `date_donated` timestamp NULL DEFAULT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `sold_by` varchar(30) DEFAULT NULL,
  `sold_to` varchar(30) NOT NULL,
  `date_sold` timestamp NULL DEFAULT NULL,
  `transaction_status` enum('sold','onsale','canceled','donated') NOT NULL DEFAULT 'donated',
  `transaction_remarks` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_stocks`
--

INSERT INTO `blood_stocks` (`id`, `ticket_no`, `customer_id`, `blood_type_id`, `volume`, `sales_price`, `sold`, `date_donated`, `expiry_date`, `sold_by`, `sold_to`, `date_sold`, `transaction_status`, `transaction_remarks`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BHC/24/0001', 'BLCN/0374', 3, 0, NULL, 'yes', '2024-12-07 14:42:55', '2025-01-11 14:42:55', 's6068', 'BLCN/0365', '2024-12-07 14:59:36', 'sold', NULL, 'active', '2024-12-07 14:52:31', '2024-12-07 15:03:37'),
(2, 'BHC/24/0003', 'BLCN/0721', 5, 0, NULL, 'no', '2024-12-09 09:18:35', '2025-01-13 09:18:35', NULL, '', NULL, 'donated', NULL, 'active', '2024-12-14 14:29:41', '2024-12-14 14:29:41'),
(3, 'BHC/24/0004', 'BLCN/0722', 3, 0, NULL, 'no', '2024-12-10 16:33:10', '2025-01-14 16:33:10', NULL, '', NULL, 'donated', NULL, 'active', '2024-12-31 14:53:48', '2024-12-31 14:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `blood_test_categories`
--

CREATE TABLE `blood_test_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `test_qtn_ids` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_test_categories`
--

INSERT INTO `blood_test_categories` (`id`, `name`, `test_qtn_ids`, `created_at`, `updated_at`) VALUES
(1, 'Rapid Screening ', '1|2|3|4', NULL, '2024-11-19 20:28:26'),
(2, 'Eliza Screening', '1|2|3|4', NULL, '2024-11-15 04:26:31');

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
(1, 'HIV', 'bitwise', 'Reactive', 'Not Reactive', '', 's6068', NULL, '2024-11-19 16:23:59'),
(2, 'Hepatitis B', 'bitwise', 'Reactive', 'Not Reactive', '', 's6068', NULL, '2024-11-19 16:24:23'),
(3, 'Hepatitis C', 'bitwise', 'Reactive', 'Not Reactive', ' ', 's6068', NULL, '2024-11-19 20:18:43'),
(4, 'Syphilis', 'bitwise', 'Reactive', 'Not Reactive', ' ', 's6068', NULL, '2024-11-19 20:19:01'),
(5, 'PCV', 'filling', '', '', '40', 's6068', NULL, '2024-11-19 16:20:53');

-- --------------------------------------------------------

--
-- Table structure for table `blood_types`
--

CREATE TABLE `blood_types` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(16,0) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_types`
--

INSERT INTO `blood_types` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'A +', 19000, '2024-10-25 14:17:11', '2026-02-09 13:07:42'),
(2, 'A -', 21000, '2024-10-25 14:17:19', '2024-12-07 14:59:06'),
(3, 'B +', 19000, '2024-10-25 14:17:26', '2026-02-09 13:08:03'),
(4, 'B -', 21000, '2024-10-25 14:17:49', '2024-12-07 14:58:27'),
(5, 'AB +', 19000, '2024-10-25 14:18:22', '2026-02-09 13:08:22'),
(6, 'O +', 19000, '2024-10-25 16:22:38', '2026-02-09 13:08:40'),
(7, 'O -', 21000, '2024-10-25 16:22:42', '2024-12-07 14:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `conversation_type`
--

CREATE TABLE `conversation_type` (
  `sn` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `conversation_type`
--

INSERT INTO `conversation_type` (`sn`, `name`, `status`) VALUES
(2, 'Patient Complaints', 'active'),
(3, 'Medical Treatment', 'active'),
(4, 'Laboratory Test', 'active'),
(5, 'Laboratory Test Result', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `sn` int(15) NOT NULL,
  `id` varchar(30) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `othername` varchar(100) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `is_donor` tinyint(4) NOT NULL DEFAULT 0,
  `blood_type_id` tinyint(4) DEFAULT NULL,
  `last_donation_date` timestamp NULL DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `hospital` varchar(255) DEFAULT NULL,
  `c_by` varchar(60) DEFAULT 'no',
  `upd_by` varchar(50) DEFAULT '',
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`sn`, `id`, `surname`, `othername`, `fullname`, `dob`, `phone`, `email`, `sex`, `is_donor`, `blood_type_id`, `last_donation_date`, `remarks`, `hospital`, `c_by`, `upd_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BLCN/0001', 'Zubair', 'Rabiat ', 'Zubair Rabiat', NULL, '8067786807', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:56'),
(2, 'BLCN/0002', 'Zubair', 'Aisha ', 'Zubair Aisha', NULL, '8092853404', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:56'),
(3, 'BLCN/0003', 'Zubair', 'Abdulrauf ', 'Zubair Abdulrauf', NULL, '7037602905', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:56'),
(4, 'BLCN/0004', 'Zeenat', 'Abdulsalaam ', 'Zeenat Abdulsalaam', NULL, '8164154655', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:56'),
(5, 'BLCN/0005', 'Yusuff', 'Babatunde M.', 'Yusuff Babatunde . M.', NULL, '8083611198', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:56'),
(6, 'BLCN/0006', 'Yusuf', 'Usman ', 'Yusuf Usman', NULL, '7086261961', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:56'),
(7, 'BLCN/0007', 'Yusuf', 'Susan ', 'Yusuf Susan', NULL, '7032863898', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:56'),
(8, 'BLCN/0008', 'Yusuf', 'Shukroh ', 'Yusuf Shukroh', NULL, '9017357898', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:56'),
(9, 'BLCN/0009', 'Yusuf', 'Olatunji ', 'Yusuf Olatunji', NULL, '7033193659', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(10, 'BLCN/0010', 'Yusuf', 'Olatunji ', 'Yusuf Olatunji', NULL, '8060620345', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(11, 'BLCN/0011', 'Yusuf', 'Muhd ', 'Yusuf Muhd', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(12, 'BLCN/0012', 'Yusuf', 'Mubarak ', 'Yusuf Mubarak', NULL, '7089534065', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(13, 'BLCN/0013', 'Yusuf', 'Moshood ', 'Yusuf Moshood', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(14, 'BLCN/0014', 'Yusuf', 'Kehinde ', 'Yusuf Kehinde', NULL, '9069602993', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(15, 'BLCN/0015', 'Yusuf', 'Kabir ', 'Yusuf Kabir', NULL, '8067555810', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(16, 'BLCN/0016', 'Yusuf', 'Ibrahim ', 'Yusuf Ibrahim', NULL, '8130781052', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(17, 'BLCN/0017', 'Yusuf', 'Hameed ', 'Yusuf Hameed', NULL, '8054146637', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(18, 'BLCN/0018', 'Yusuf', 'Babatunde  Aremu', 'Yusuf Babatunde Aremu', NULL, '8038088797', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(19, 'BLCN/0019', 'Yusuf', 'Ahmad ', 'Yusuf Ahmad', NULL, '8067248597', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(20, 'BLCN/0020', 'Yusuf', 'Adebayo ', 'Yusuf Adebayo', NULL, '8142729981', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(21, 'BLCN/0021', 'Yusuf', 'Abdulganiyu ', 'Yusuf Abdulganiyu', NULL, '7042940050', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:57'),
(22, 'BLCN/0022', 'Yusuf', 'Abdulfatai ', 'Yusuf Abdulfatai', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(23, 'BLCN/0023', 'Yusuf', 'Abdulateef ', 'Yusuf Abdulateef', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(24, 'BLCN/0024', 'Yussuf', 'Asiah ', 'Yussuf Asiah', NULL, '8137519569', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(25, 'BLCN/0025', 'Yoloye', 'Temilade ', 'Yoloye Temilade', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(26, 'BLCN/0026', 'Yekeen', 'Sodiq ', 'Yekeen Sodiq', NULL, '8130820254', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(27, 'BLCN/0027', 'Yakub', 'Taofeek ', 'Yakub Taofeek', NULL, '8026317540', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(28, 'BLCN/0028', 'Yakub', 'Ayobami ', 'Yakub Ayobami', NULL, '7056967505', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(29, 'BLCN/0029', 'Yakub', 'Ayobami ', 'Yakub Ayobami', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(30, 'BLCN/0030', 'Wuraola', 'Mojeed ', 'Wuraola Mojeed', NULL, '8065543169', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(31, 'BLCN/0031', 'Wasiu', 'Suleiman ', 'Wasiu Suleiman', NULL, '9065488737', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(32, 'BLCN/0032', 'Victory', 'Kpagban ', 'Victory Kpagban', NULL, '8163703024', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(33, 'BLCN/0033', 'Victoria', 'Chinwendu Madu', 'Victoria Chinwendu Madu', NULL, '8156420950', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(34, 'BLCN/0034', 'Victor', 'Jacob ', 'Victor Jacob', NULL, '9067122170', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(35, 'BLCN/0035', 'Uthman', 'Robiat Damilola', 'Uthman Robiat Damilola', NULL, '8183530441', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(36, 'BLCN/0036', 'Uthman', 'Robiat ', 'Uthman Robiat', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(37, 'BLCN/0037', 'Uthman', 'Munus ', 'Uthman Munus', NULL, '8106574994', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(38, 'BLCN/0038', 'Uthman', 'Hussein ', 'Uthman Hussein', NULL, '9065555047', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(39, 'BLCN/0039', 'Tunde', 'Aribedesi ', 'Tunde Aribedesi', NULL, '7017124613', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(40, 'BLCN/0040', 'Tsado', 'Zipporah ', 'Tsado Zipporah', NULL, '7047642987', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(41, 'BLCN/0041', 'Toyosi', 'Abiona ', 'Toyosi Abiona', NULL, '8100232753', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(42, 'BLCN/0042', 'Tosin', 'Afolayan ', 'Tosin Afolayan', NULL, '7026873650', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(43, 'BLCN/0043', 'Tomori', 'Aminat ', 'Tomori Aminat', NULL, '8163222652', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:58'),
(44, 'BLCN/0044', 'Titiloye', 'Olasunkanmi ', 'Titiloye Olasunkanmi', NULL, '8022541021', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:59'),
(45, 'BLCN/0045', 'Titilayo', 'Daramola ', 'Titilayo Daramola', NULL, '9122613864', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:59'),
(46, 'BLCN/0046', 'Timilehin', 'Israel ', 'Timilehin Israel', NULL, '8176169934', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:59'),
(47, 'BLCN/0047', 'Tijani', 'Rilwan ', 'Tijani Rilwan', NULL, '8160043888', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:59'),
(48, 'BLCN/0048', 'Tijani', 'Idris ', 'Tijani Idris', NULL, '9032141156', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:59'),
(49, 'BLCN/0049', 'Tijani', 'Abdulbasit ', 'Tijani Abdulbasit', NULL, '9166109376', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:59'),
(50, 'BLCN/0050', 'Tiamiyu', 'Zikirullah ', 'Tiamiyu Zikirullah', NULL, '9034970377', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:59'),
(51, 'BLCN/0051', 'Tiamiyu', 'Nimotallahi ', 'Tiamiyu Nimotallahi', NULL, '7086696762', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:59'),
(52, 'BLCN/0052', 'Thankgod', 'Ibeanusi ', 'Thankgod Ibeanusi', NULL, '9034788523', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:59'),
(53, 'BLCN/0053', 'Temitope', 'Olarewaju ', 'Temitope Olarewaju', NULL, '8069488062', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:43:59'),
(54, 'BLCN/0054', 'Taofiq', 'Ikumuyite ', 'Taofiq Ikumuyite', NULL, '8163822625', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:00'),
(55, 'BLCN/0055', 'Taofeeq', 'Modupeola ', 'Taofeeq Modupeola', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:00'),
(56, 'BLCN/0056', 'Taofeeq', 'Abdulrasaq ', 'Taofeeq Abdulrasaq', NULL, '8148108726', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:00'),
(57, 'BLCN/0057', 'Taofeek', 'Wasiu ', 'Taofeek Wasiu', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:00'),
(58, 'BLCN/0058', 'Tajudeen', 'Zainab ', 'Tajudeen Zainab', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(59, 'BLCN/0059', 'Tajudeen', 'Waheed ', 'Tajudeen Waheed', NULL, '8165888434', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(60, 'BLCN/0060', 'Tajudeen', 'Muinat ', 'Tajudeen Muinat', NULL, '8164530977', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(61, 'BLCN/0061', 'Taiye', 'Saka ', 'Taiye Saka', NULL, '8167089898', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(62, 'BLCN/0062', 'Taiwo', 'Ola ', 'Taiwo Ola', NULL, '8028723928', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(63, 'BLCN/0063', 'Taiwo', 'Mutiu ', 'Taiwo Mutiu', NULL, '8162897161', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(64, 'BLCN/0064', 'Taiwo', 'Elizabeth Oluwatoyin', 'Taiwo Elizabeth Oluwatoyin', NULL, '7062592940', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(65, 'BLCN/0065', 'Sunday', 'Moses ', 'Sunday Moses', NULL, '8067531854', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(66, 'BLCN/0066', 'Summaya', 'Jamiu ', 'Summaya Jamiu', NULL, '8140156604', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(67, 'BLCN/0067', 'Sulyman', 'Yusuf ', 'Sulyman Yusuf', NULL, '7037317363', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(68, 'BLCN/0068', 'Sultan', 'Saka ', 'Sultan Saka', NULL, '8145113589', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(69, 'BLCN/0069', 'Sulieman', 'Abdulganiyu ', 'Sulieman Abdulganiyu', NULL, '9162642353', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(70, 'BLCN/0070', 'Suleiman', 'Ahmad ', 'Suleiman Ahmad', NULL, '8080655040', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:01'),
(71, 'BLCN/0071', 'Sulaimon', 'Zaheedat ', 'Sulaimon Zaheedat', NULL, '7062648904', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(72, 'BLCN/0072', 'Sulaimon', 'Mubarak ', 'Sulaimon Mubarak', NULL, '8169307995', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(73, 'BLCN/0073', 'Sulaiman', 'Ibrahim ', 'Sulaiman Ibrahim', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(74, 'BLCN/0074', 'Sulaiman', 'Hassan ', 'Sulaiman Hassan', NULL, '8034254358', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(75, 'BLCN/0075', 'Sulaiman', 'Aisha ', 'Sulaiman Aisha', NULL, '8162303234', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(76, 'BLCN/0076', 'Suhaib', 'Abdulqudus ', 'Suhaib Abdulqudus', NULL, '9167496577', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(77, 'BLCN/0077', 'Sowemimo', 'Abdulmumeen ', 'Sowemimo Abdulmumeen', NULL, '8136862482', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(78, 'BLCN/0078', 'Solomon', 'Oluwatimilehin ', 'Solomon Oluwatimilehin', NULL, '8036422273', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(79, 'BLCN/0079', 'Soliu', 'Muhideen Aduhagba', 'Soliu Muhideen Aduhagba', NULL, '7036889822', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(80, 'BLCN/0080', 'Soliu', 'Gobaro ', 'Soliu Gobaro', NULL, '8093894918', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(81, 'BLCN/0081', 'Sodiq', 'Nima ', 'Sodiq Nima', NULL, '7067085604', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(82, 'BLCN/0082', 'Sodeinde', 'Nabila ', 'Sodeinde Nabila', NULL, '8134909294', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(83, 'BLCN/0083', 'Sobur', 'Mudasir ', 'Sobur Mudasir', NULL, '9038484019', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(84, 'BLCN/0084', 'Shuaib', 'Kelani ', 'Shuaib Kelani', NULL, '7038610991', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(85, 'BLCN/0085', 'Shuaib', 'Idris ', 'Shuaib Idris', NULL, '7040340606', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(86, 'BLCN/0086', 'Shittu', 'Ayodeji ', 'Shittu Ayodeji', NULL, '8148152854', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(87, 'BLCN/0087', 'Sheu', 'Ismail ', 'Sheu Ismail', NULL, '8145758502', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(88, 'BLCN/0088', 'Sherrif', 'Lanre ', 'Sherrif Lanre', NULL, '9164681008', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(89, 'BLCN/0089', 'Sheriffdeen', 'Mariam ', 'Sheriffdeen Mariam', NULL, '9035955689', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:02'),
(90, 'BLCN/0090', 'Sherifat', 'Ahmed ', 'Sherifat Ahmed', NULL, '7055552953', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(91, 'BLCN/0091', 'Shehu', 'Salamat ', 'Shehu Salamat', NULL, '7038523907', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(92, 'BLCN/0092', 'Shehu', 'Fareed ', 'Shehu Fareed', NULL, '8108064890', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(93, 'BLCN/0093', 'Shafiu', 'Muhammad ', 'Shafiu Muhammad', NULL, '8084779199', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(94, 'BLCN/0094', 'Seun', 'Adeboga ', 'Seun Adeboga', NULL, '7088567811', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(95, 'BLCN/0095', 'Segun', 'Folarinde ', 'Segun Folarinde', NULL, '7035233388', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(96, 'BLCN/0096', 'Sanusi', 'Muhammed ', 'Sanusi Muhammed', NULL, '7066235157', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(97, 'BLCN/0097', 'Sanusi', 'Idris ', 'Sanusi Idris', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(98, 'BLCN/0098', 'Sanni', 'Baada ', 'Sanni Baada', NULL, '9021627969', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(99, 'BLCN/0099', 'Sani', 'Ibrahim ', 'Sani Ibrahim', NULL, '8133339162', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(100, 'BLCN/0100', 'Samuel', 'Victor ', 'Samuel Victor', NULL, '7085011510', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(101, 'BLCN/0101', 'Samuel', 'Olanipekun ', 'Samuel Olanipekun', NULL, '8100971307', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(102, 'BLCN/0102', 'Samuel', 'Emeka ', 'Samuel Emeka', NULL, '8141912370', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(103, 'BLCN/0103', 'Samson', 'Peter ', 'Samson Peter', NULL, '7037020327', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(104, 'BLCN/0104', 'Samson', 'Amos ', 'Samson Amos', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(105, 'BLCN/0105', 'Salman', 'Rahim ', 'Salman Rahim', NULL, '7065306694', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(106, 'BLCN/0106', 'Salman', 'Ismail Olamilekan', 'Salman Ismail Olamilekan', NULL, '7037053312', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:03'),
(107, 'BLCN/0107', 'Saliu', 'Tahirah ', 'Saliu Tahirah', NULL, '8118872738', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:04'),
(108, 'BLCN/0108', 'Saliu', 'O. Hassan', 'Saliu O. Hassan', NULL, '8146511928', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:04'),
(109, 'BLCN/0109', 'Salisu', 'Rahmah ', 'Salisu Rahmah', NULL, '8125417949', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:04'),
(110, 'BLCN/0110', 'Salawu', 'Muhees Ayomide', 'Salawu Muhees Ayomide', NULL, '7014775674', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:04'),
(111, 'BLCN/0111', 'Salawu', 'Daniel ', 'Salawu Daniel', NULL, '7062217828', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(112, 'BLCN/0112', 'Salaudeen', 'Salaudeen ', 'Salaudeen Salaudeen', NULL, '9133923915', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(113, 'BLCN/0113', 'Salaudeen', 'Mariam ', 'Salaudeen Mariam', NULL, '7014856397', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(114, 'BLCN/0114', 'Salaudeen', 'Karimat ', 'Salaudeen Karimat', NULL, '9033467147', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(115, 'BLCN/0115', 'Salaudeen', 'Isiaq ', 'Salaudeen Isiaq', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(116, 'BLCN/0116', 'Salaudeen', 'Ibrahim ', 'Salaudeen Ibrahim', NULL, '9063583127', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(117, 'BLCN/0117', 'Salaudeen', 'Ajijolakewu ', 'Salaudeen Ajijolakewu', NULL, '8086741079', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(118, 'BLCN/0118', 'Salaudeen', 'Abdulkadir ', 'Salaudeen Abdulkadir', NULL, '8153559745', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(119, 'BLCN/0119', 'Saheed', 'Hammed ', 'Saheed Hammed', NULL, '8069689517', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(120, 'BLCN/0120', 'Saheed', 'Adebisi ', 'Saheed Adebisi', NULL, '8039413600', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(121, 'BLCN/0121', 'Saheed', 'Abdulateef Ademola', 'Saheed Abdulateef Ademola', NULL, '7064651307', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(122, 'BLCN/0122', 'Sadiq', 'Nimatullahi ', 'Sadiq Nimatullahi', NULL, '8147709056', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(123, 'BLCN/0123', 'Saadu', 'Shakira ', 'Saadu Shakira', NULL, '9047689765', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(124, 'BLCN/0124', 'Rotimi', 'Akolade ', 'Rotimi Akolade', NULL, '7033952135', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(125, 'BLCN/0125', 'Robihat', 'Bello ', 'Robihat Bello', NULL, '7041832832', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:05'),
(126, 'BLCN/0126', 'Ridwan', 'Taofeek ', 'Ridwan Taofeek', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:06'),
(127, 'BLCN/0127', 'Ridwan', 'Alausa ', 'Ridwan Alausa', NULL, '7064689828', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:06'),
(128, 'BLCN/0128', 'Rasaq', 'Juliana ', 'Rasaq Juliana', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:06'),
(129, 'BLCN/0129', 'Raji', 'Saheed ', 'Raji Saheed', NULL, '8166656570', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:06'),
(130, 'BLCN/0130', 'Raji', 'Ridwan ', 'Raji Ridwan', NULL, '8067628180', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:06'),
(131, 'BLCN/0131', 'Raji', 'Nurat ', 'Raji Nurat', NULL, '8034779725', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:06'),
(132, 'BLCN/0132', 'Raji', 'Musa ', 'Raji Musa', NULL, '8144888144', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:06'),
(133, 'BLCN/0133', 'Raji', 'Ibrahim ', 'Raji Ibrahim', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:06'),
(134, 'BLCN/0134', 'Raji', 'Ibrahim ', 'Raji Ibrahim', NULL, '7033826122', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:06'),
(135, 'BLCN/0135', 'Rahma', 'Isong ', 'Rahma Isong', NULL, '7068037884', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:06'),
(136, 'BLCN/0136', 'Rahim', 'Isaq ', 'Rahim Isaq', NULL, '7065517660', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:07'),
(137, 'BLCN/0137', 'Rafiu', 'Ibrahim ', 'Rafiu Ibrahim', NULL, '9057763945', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(138, 'BLCN/0138', 'Quwam', 'Oladotun ', 'Quwam Oladotun', NULL, '9136384883', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(139, 'BLCN/0139', 'Quawiyah', 'Aderinto ', 'Quawiyah Aderinto', NULL, '7069797679', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(140, 'BLCN/0140', 'Quadir', 'Olatunde ', 'Quadir Olatunde', NULL, '7061079133', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(141, 'BLCN/0141', 'Quadir', 'Awawau ', 'Quadir Awawau', NULL, '9158802269', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(142, 'BLCN/0142', 'Qomarudeen', 'Lawal ', 'Qomarudeen Lawal', NULL, '8148784770', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(143, 'BLCN/0143', 'Precious', 'Omeiza ', 'Precious Omeiza', NULL, '7025128464', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(144, 'BLCN/0144', 'Popoola', 'Elijah ', 'Popoola Elijah', NULL, '8104179089', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(145, 'BLCN/0145', 'Abdulwasiu', 'Abubakar ', 'Abdulwasiu Abubakar', NULL, '8060800221', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(146, 'BLCN/0146', 'Abdulwasiu', 'Toyeebah ', 'Abdulwasiu Toyeebah', NULL, '8140474640', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(147, 'BLCN/0147', 'Abdurrahman', 'Raji ', 'Abdurrahman Raji', NULL, '7011097707', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(148, 'BLCN/0148', 'Abdurrasheed', 'Iyanda ', 'Abdurrasheed Iyanda', NULL, '7057474955', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(149, 'BLCN/0149', 'Abeiya', 'Sunday ', 'Abeiya Sunday', NULL, '8065317452', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(150, 'BLCN/0150', 'Abiona', 'Babatunde ', 'Abiona Babatunde', NULL, '7068773946', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(151, 'BLCN/0151', 'Abolaji', 'Gbenga ', 'Abolaji Gbenga', NULL, '8143846500', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(152, 'BLCN/0152', 'Abu', 'Adeyemi ', 'Abu Adeyemi', NULL, '8104907233', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(153, 'BLCN/0153', 'Abu', 'Ayodeji ', 'Abu Ayodeji', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(154, 'BLCN/0154', 'Abu', 'Gift ', 'Abu Gift', NULL, '7060526159', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(155, 'BLCN/0155', 'Abubakar', 'Aishat Nana', 'Abubakar Aishat Nana', NULL, '7035424986', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(156, 'BLCN/0156', 'Abubakar', 'Basheer ', 'Abubakar Basheer', NULL, '7039685023', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(157, 'BLCN/0157', 'Abubakar', 'Ibrahim ', 'Abubakar Ibrahim', NULL, '8147403766', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:08'),
(158, 'BLCN/0158', 'Abubakar', 'Jamiu ', 'Abubakar Jamiu', NULL, '7043138331', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(159, 'BLCN/0159', 'Abubakar', 'Lateef O.', 'Abubakar Lateef O.', NULL, '8066467636', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(160, 'BLCN/0160', 'Abubakar', 'Muhammed ', 'Abubakar Muhammed', NULL, '8179889101', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(161, 'BLCN/0161', 'Abubakar', 'Naheemat ', 'Abubakar Naheemat', NULL, '7064609651', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(162, 'BLCN/0162', 'Abubakar', 'Olayinka ', 'Abubakar Olayinka', NULL, '7064446208', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(163, 'BLCN/0163', 'Abubakar', 'Olayinka Buhari', 'Abubakar Olayinka Buhari', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(164, 'BLCN/0164', 'Abubakar', 'Suleiman ', 'Abubakar Suleiman', NULL, '8164943575', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(165, 'BLCN/0165', 'Abubakar', 'Tijani M.', 'Abubakar Tijani M.', NULL, '7043877099', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(166, 'BLCN/0166', 'Achu', 'Ekpejor ', 'Achu Ekpejor', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(167, 'BLCN/0167', 'Adam', 'Mustapha ', 'Adam Mustapha', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(168, 'BLCN/0168', 'Adam', 'Mustapha ', 'Adam Mustapha', NULL, '8106460125', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(169, 'BLCN/0169', 'Adam', 'Suleiman ', 'Adam Suleiman', NULL, '9022580447', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(170, 'BLCN/0170', 'Adam', 'Zubair ', 'Adam Zubair', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(171, 'BLCN/0171', 'Adaralegbe', 'Ayobami ', 'Adaralegbe Ayobami', NULL, '8164904178', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(172, 'BLCN/0172', 'Adaraniwon', 'Oluwatoni ', 'Adaraniwon Oluwatoni', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(173, 'BLCN/0173', 'Adaraniwon', 'Samuel ', 'Adaraniwon Samuel', NULL, '8162930629', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(174, 'BLCN/0174', 'Adebayo', 'Abdulquddus ', 'Adebayo Abdulquddus', NULL, '9064325179', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:09'),
(175, 'BLCN/0175', 'Adebayo', 'Adeola ', 'Adebayo Adeola', NULL, '8067935478', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:10'),
(176, 'BLCN/0176', 'Adebayo', 'Fajimi ', 'Adebayo Fajimi', NULL, '7033957666', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:10'),
(177, 'BLCN/0177', 'Adebayo', 'Kemisola ', 'Adebayo Kemisola', NULL, '8160015173', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:10'),
(178, 'BLCN/0178', 'Adebayo', 'Muiz ', 'Adebayo Muiz', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:10'),
(179, 'BLCN/0179', 'Adebayo', 'Olayemi ', 'Adebayo Olayemi', NULL, '8036549882', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:11'),
(180, 'BLCN/0180', 'Adebayo', 'Quadri Adeshina', 'Adebayo Quadri Adeshina', NULL, '8145264693', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:11'),
(181, 'BLCN/0181', 'Adebayo', 'Taiwo ', 'Adebayo Taiwo', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:11'),
(182, 'BLCN/0182', 'Adebisi', 'Qudus ', 'Adebisi Qudus', NULL, '9017291411', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:11'),
(183, 'BLCN/0183', 'Adebisi', 'Kehinde ', 'Adebisi Kehinde', NULL, '8075196392', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:12'),
(184, 'BLCN/0184', 'Adebisi', 'Muslihudeen ', 'Adebisi Muslihudeen', NULL, '8035415323', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:12'),
(185, 'BLCN/0185', 'Adebowale', 'Usman ', 'Adebowale Usman', NULL, '8144143806', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:12'),
(186, 'BLCN/0186', 'Adeboye', 'Zainab ', 'Adeboye Zainab', NULL, '7017375140', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:12'),
(187, 'BLCN/0187', 'Adedeji', 'Ismaheel ', 'Adedeji Ismaheel', NULL, '8164664991', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(188, 'BLCN/0188', 'Adedeji', 'Moshood ', 'Adedeji Moshood', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(189, 'BLCN/0189', 'Adedeji', 'Moshood Ayodele', 'Adedeji Moshood Ayodele', NULL, '8034487796', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(190, 'BLCN/0190', 'Adedeji', 'Teslim ', 'Adedeji Teslim', NULL, '8034560226', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(191, 'BLCN/0191', 'Adedokun', 'Abidemi ', 'Adedokun Abidemi', NULL, '9075924740', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(192, 'BLCN/0192', 'Adedoyin', 'Adeyemi ', 'Adedoyin Adeyemi', NULL, '8148755611', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(193, 'BLCN/0193', 'Adedoyin', 'Ezekiel ', 'Adedoyin Ezekiel', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(194, 'BLCN/0194', 'Adegbehingbe', 'Godwin ', 'Adegbehingbe Godwin', NULL, '8105419249', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(195, 'BLCN/0195', 'Adegbola', 'Idris ', 'Adegbola Idris', NULL, '8106442235', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(196, 'BLCN/0196', 'Adegboye', 'Grace ', 'Adegboye Grace', NULL, '8147339127', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(197, 'BLCN/0197', 'Adegoke', 'Christiana ', 'Adegoke Christiana', NULL, '7032471098', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(198, 'BLCN/0198', 'Adegoke', 'Yemi ', 'Adegoke Yemi', NULL, '8066325691', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(199, 'BLCN/0199', 'Adejimi', 'Abdulsalam ', 'Adejimi Abdulsalam', NULL, '7061956235', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(200, 'BLCN/0200', 'Adejumola', 'Olalekan ', 'Adejumola Olalekan', NULL, '9165041738', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(201, 'BLCN/0201', 'Adekunle', 'David ', 'Adekunle David', NULL, '7049735936', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(202, 'BLCN/0202', 'Adekunle', 'Solomon ', 'Adekunle Solomon', NULL, '8162088324', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(203, 'BLCN/0203', 'Adeleke', 'Adeleye ', 'Adeleke Adeleye', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:13'),
(204, 'BLCN/0204', 'Adeleke', 'Boluwatife ', 'Adeleke Boluwatife', NULL, '9030376129', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:14'),
(205, 'BLCN/0205', 'Adeleke', 'Philip ', 'Adeleke Philip', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:14'),
(206, 'BLCN/0206', 'Adelumola', 'Abdulroqeeb ', 'Adelumola Abdulroqeeb', NULL, '8114910700', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:14'),
(207, 'BLCN/0207', 'Ademola', 'Adeyemi ', 'Ademola Adeyemi', NULL, '8131177145', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:14'),
(208, 'BLCN/0208', 'Ademola', 'Adeyemi ', 'Ademola Adeyemi', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:14'),
(209, 'BLCN/0209', 'Ademola', 'Mistura ', 'Ademola Mistura', NULL, '9034603291', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(210, 'BLCN/0210', 'Ademuyiwa', 'Taiwo ', 'Ademuyiwa Taiwo', NULL, '7018522518', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(211, 'BLCN/0211', 'Adeniyi', 'Abdulafeez ', 'Adeniyi Abdulafeez', NULL, '8167562169', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(212, 'BLCN/0212', 'Adeniyi', 'Raheemat ', 'Adeniyi Raheemat', NULL, '8064995319', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(213, 'BLCN/0213', 'Adeniyi', 'Sokumbi ', 'Adeniyi Sokumbi', NULL, '7012522883', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(214, 'BLCN/0214', 'Adenusi', 'Abdulsalam ', 'Adenusi Abdulsalam', NULL, '8107965411', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(215, 'BLCN/0215', 'Adeola', 'Adebayo ', 'Adeola Adebayo', NULL, '9015407447', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(216, 'BLCN/0216', 'Adesemoye', 'Ayomide ', 'Adesemoye Ayomide', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(217, 'BLCN/0217', 'Adesetan', 'Abdulsamad ', 'Adesetan Abdulsamad', NULL, '8058161785', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(218, 'BLCN/0218', 'Adeshina', 'Abdulsobur ', 'Adeshina Abdulsobur', NULL, '9038484017', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(219, 'BLCN/0219', 'Adeshina', 'Temitope ', 'Adeshina Temitope', NULL, '8106303783', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(220, 'BLCN/0220', 'Adetona', 'Ridwanullah ', 'Adetona Ridwanullah', NULL, '8024764085', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(221, 'BLCN/0221', 'Adetunji', 'Fiyinfoluwa Stephen', 'Adetunji Fiyinfoluwa Stephen', NULL, '8169274880', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(222, 'BLCN/0222', 'Adetunji', 'Tesleem ', 'Adetunji Tesleem', NULL, '8094837533', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(223, 'BLCN/0223', 'Adewale', 'Abigael ', 'Adewale Abigael', NULL, '8144579307', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(224, 'BLCN/0224', 'Adewole', 'Praise ', 'Adewole Praise', NULL, '7085916701', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(225, 'BLCN/0225', 'Adewumi', 'Precious ', 'Adewumi Precious', NULL, '9155139857', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(226, 'BLCN/0226', 'Adewuyi', 'Faoziyat ', 'Adewuyi Faoziyat', NULL, '8066294487', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(227, 'BLCN/0227', 'Adewuyi', 'Idowu Lucia', 'Adewuyi Idowu Lucia', NULL, '9020153581', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(228, 'BLCN/0228', 'Adeyemi', 'Abdullateef ', 'Adeyemi Abdullateef', NULL, '8166512408', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:15'),
(229, 'BLCN/0229', 'Adeyemi', 'Qhawamdeen ', 'Adeyemi Qhawamdeen', NULL, '8144336955', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:16'),
(230, 'BLCN/0230', 'Adeyemi', 'Tayo ', 'Adeyemi Tayo', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:16'),
(231, 'BLCN/0231', 'Adeyemo', 'Afeez Adeyemi', 'Adeyemo Afeez Adeyemi', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:16'),
(232, 'BLCN/0232', 'Adeyemo', 'Ibrahim Adedayo', 'Adeyemo Ibrahim Adedayo', NULL, '8036582162', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:16'),
(233, 'BLCN/0233', 'Adeyeri', 'Ife ', 'Adeyeri Ife', NULL, '8167641536', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:17'),
(234, 'BLCN/0234', 'Adio', 'Ayoola ', 'Adio Ayoola', NULL, '9123834261', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:17'),
(235, 'BLCN/0235', 'Adunola', 'Ajiboye ', 'Adunola Ajiboye', NULL, '8103682054', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:17'),
(236, 'BLCN/0236', 'Afeez', 'Adepoju ', 'Afeez Adepoju', NULL, '8064136035', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:17'),
(237, 'BLCN/0237', 'Afikuyomi', 'Tobiloba ', 'Afikuyomi Tobiloba', NULL, '8136451390', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:17'),
(238, 'BLCN/0238', 'Afodun', 'Salamal ', 'Afodun Salamal', NULL, '7014136408', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:17'),
(239, 'BLCN/0239', 'Afolabi', 'Ayinde Moshood', 'Afolabi Ayinde Moshood', NULL, '7030334514', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(240, 'BLCN/0240', 'Afolabi', 'T. Lanre', 'Afolabi T. Lanre', NULL, '8033548940', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(241, 'BLCN/0241', 'Afolayan', 'Kazeem I.', 'Afolayan Kazeem I.', NULL, '7033849692', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(242, 'BLCN/0242', 'Agbeboaye', 'Abigael ', 'Agbeboaye Abigael', NULL, '8169908040', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(243, 'BLCN/0243', 'Agbontan', 'Marcy ', 'Agbontan Marcy', NULL, '8138872149', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(244, 'BLCN/0244', 'Agboola', 'Ademola Peter', 'Agboola Ademola Peter', NULL, '9153353661', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(245, 'BLCN/0245', 'Agboola', 'Isaiah ', 'Agboola Isaiah', NULL, '9063472973', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(246, 'BLCN/0246', 'Ahmad', 'Alli ', 'Ahmad Alli', NULL, '7030274037', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(247, 'BLCN/0247', 'Ahmad', 'Ishaq A.', 'Ahmad Ishaq A.', NULL, '8024742858', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(248, 'BLCN/0248', 'Ahmad', 'Tijani Ibrahim', 'Ahmad Tijani Ibrahim', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(249, 'BLCN/0249', 'Ahmed', 'Biodun ', 'Ahmed Biodun', NULL, '8031174516', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(250, 'BLCN/0250', 'Ahmed', 'Ridwan ', 'Ahmed Ridwan', NULL, '8165724573', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(251, 'BLCN/0251', 'Ahmed', 'Wasiu ', 'Ahmed Wasiu', NULL, '8158996346', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(252, 'BLCN/0252', 'Aiyenigba', 'S.m ', 'Aiyenigba S.m', NULL, '7062602150', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(253, 'BLCN/0253', 'Ajanaku', 'Aliu Adam', 'Ajanaku Aliu Adam', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(254, 'BLCN/0254', 'Ajayi', 'Damilola ', 'Ajayi Damilola', NULL, '9081693629', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(255, 'BLCN/0255', 'Ajayi', 'Kudrat ', 'Ajayi Kudrat', NULL, '7039024591', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(256, 'BLCN/0256', 'Ajeih', 'Goodluck ', 'Ajeih Goodluck', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(257, 'BLCN/0257', 'Ajiboye', 'Abubakar ', 'Ajiboye Abubakar', NULL, '7068708002', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(258, 'BLCN/0258', 'Ajijolakewu', 'Sulaiman ', 'Ajijolakewu Sulaiman', NULL, '9022203644', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:18'),
(259, 'BLCN/0259', 'Ajomale', 'Ayoola John', 'Ajomale Ayoola John', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(260, 'BLCN/0260', 'Ajumobi', 'Joshua ', 'Ajumobi Joshua', NULL, '9163453632', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(261, 'BLCN/0261', 'Akande', 'Morenikeji ', 'Akande Morenikeji', NULL, '8067100773', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(262, 'BLCN/0262', 'Akande', 'Mutiu ', 'Akande Mutiu', NULL, '8160540015', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(263, 'BLCN/0263', 'Akande', 'Suraju ', 'Akande Suraju', NULL, '7035626935', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(264, 'BLCN/0264', 'Akeem', 'Gbolade Wisdom', 'Akeem Gbolade Wisdom', NULL, '8170888492', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(265, 'BLCN/0265', 'Akeredolu', 'Opeyemi ', 'Akeredolu Opeyemi', NULL, '8108683121', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(266, 'BLCN/0266', 'Akinloye', 'Abdulhakeem ', 'Akinloye Abdulhakeem', NULL, '8133509836', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(267, 'BLCN/0267', 'Akinpelu', 'Nururahman ', 'Akinpelu Nururahman', NULL, '9122304397', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(268, 'BLCN/0268', 'Akinroye', 'Taofik ', 'Akinroye Taofik', NULL, '7030374984', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(269, 'BLCN/0269', 'Akolapo', 'Habeedah ', 'Akolapo Habeedah', NULL, '8039655319', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(270, 'BLCN/0270', 'Alabi', 'John ', 'Alabi John', NULL, '9053646732', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(271, 'BLCN/0271', 'Alabi', 'Abdullateef ', 'Alabi Abdullateef', NULL, '8107102781', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(272, 'BLCN/0272', 'Alabi', 'Quadri ', 'Alabi Quadri', NULL, '8029605912', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(273, 'BLCN/0273', 'Alabi', 'Rasidat ', 'Alabi Rasidat', NULL, '7035495922', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:19'),
(274, 'BLCN/0274', 'Alao', 'Monsurat ', 'Alao Monsurat', NULL, '8104059274', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:20'),
(275, 'BLCN/0275', 'Alao', 'Oluwapelumi ', 'Alao Oluwapelumi', NULL, '9068044023', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:20'),
(276, 'BLCN/0276', 'Alaran', 'Abdulbasit ', 'Alaran Abdulbasit', NULL, '9030251071', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:20'),
(277, 'BLCN/0277', 'Alaro', 'Sulyman ', 'Alaro Sulyman', NULL, '8107800621', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:20'),
(278, 'BLCN/0278', 'Alatise', 'Abiodun ', 'Alatise Abiodun', NULL, '8034374486', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:20'),
(279, 'BLCN/0279', 'Alhaja', 'Aderinto ', 'Alhaja Aderinto', NULL, '8035878105', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:21'),
(280, 'BLCN/0280', 'Ali', 'Abubakar ', 'Ali Abubakar', NULL, '9067720826', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:21'),
(281, 'BLCN/0281', 'Alikali', 'Abdulraseed ', 'Alikali Abdulraseed', NULL, '8052007731', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:21'),
(282, 'BLCN/0282', 'Alimi', 'Tawakalitu ', 'Alimi Tawakalitu', NULL, '7039685122', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:21'),
(283, 'BLCN/0283', 'Aliu', 'Baba ', 'Aliu Baba', NULL, '8162947700', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(284, 'BLCN/0284', 'Aliu', 'Mohammed ', 'Aliu Mohammed', NULL, '8032005983', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(285, 'BLCN/0285', 'Aliyu', 'Ibrahim ', 'Aliyu Ibrahim', NULL, '9034329932', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(286, 'BLCN/0286', 'Aliyu', 'Isiaq ', 'Aliyu Isiaq', NULL, '8039263820', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(287, 'BLCN/0287', 'Aliyu', 'Muktar ', 'Aliyu Muktar', NULL, '8107989902', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(288, 'BLCN/0288', 'Alli', 'Oyinkonsola ', 'Alli Oyinkonsola', NULL, '7012514026', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(289, 'BLCN/0289', 'Alozie', 'Chizoba ', 'Alozie Chizoba', NULL, '7065751843', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(290, 'BLCN/0290', 'Aluko', 'Victor ', 'Aluko Victor', NULL, '8038645671', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(291, 'BLCN/0291', 'Aminat', 'Aguba ', 'Aminat Aguba', NULL, '9066433228', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(292, 'BLCN/0292', 'Amodu', 'Olaniyi ', 'Amodu Olaniyi', NULL, '7066227899', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(293, 'BLCN/0293', 'Amos', 'Samson ', 'Amos Samson', NULL, '8134794338', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(294, 'BLCN/0294', 'Amosun', 'Ibrahim ', 'Amosun Ibrahim', NULL, '8168506628', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(295, 'BLCN/0295', 'Anifowose', 'Abdulkabir ', 'Anifowose Abdulkabir', NULL, '8176518546', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(296, 'BLCN/0296', 'Apooiin', 'Qoyum ', 'Apooiin Qoyum', NULL, '8068135201', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(297, 'BLCN/0297', 'Arojo', 'Oluwatosin ', 'Arojo Oluwatosin', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:22'),
(298, 'BLCN/0298', 'Asaju', 'Tawakalitu ', 'Asaju Tawakalitu', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:23'),
(299, 'BLCN/0299', 'Asiyanbi', 'Mubashir ', 'Asiyanbi Mubashir', NULL, '8108170354', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:23'),
(300, 'BLCN/0300', 'Atanda', 'Uthman ', 'Atanda Uthman', NULL, '7033231414', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:23'),
(301, 'BLCN/0301', 'Atere', 'Praise-god ', 'Atere Praise-god', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:23'),
(302, 'BLCN/0302', 'Awilagbara', 'Gabriel Ayorinde', 'Awilagbara Gabriel Ayorinde', NULL, '8171784192', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(303, 'BLCN/0303', 'Awolola', 'Oluwasegun ', 'Awolola Oluwasegun', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(304, 'BLCN/0304', 'Awoyinfa', 'Elijah ', 'Awoyinfa Elijah', NULL, '8170627386', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(305, 'BLCN/0305', 'Ayobami', 'Blessing ', 'Ayobami Blessing', NULL, '8162206944', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24');
INSERT INTO `customer_info` (`sn`, `id`, `surname`, `othername`, `fullname`, `dob`, `phone`, `email`, `sex`, `is_donor`, `blood_type_id`, `last_donation_date`, `remarks`, `hospital`, `c_by`, `upd_by`, `status`, `created_at`, `updated_at`) VALUES
(306, 'BLCN/0306', 'Ayodele', 'Adeleke ', 'Ayodele Adeleke', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(307, 'BLCN/0307', 'Ayodele', 'Blessing ', 'Ayodele Blessing', NULL, '9018189640', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(308, 'BLCN/0308', 'Ayodele', 'Esther ', 'Ayodele Esther', NULL, '8145655871', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(309, 'BLCN/0309', 'Ayodele', 'Oluwapelumi ', 'Ayodele Oluwapelumi', NULL, '8132764418', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(310, 'BLCN/0310', 'Ayomide', 'Abdulrasidi ', 'Ayomide Abdulrasidi', NULL, '8055067780', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(311, 'BLCN/0311', 'Ayomide', 'Akindojutimi ', 'Ayomide Akindojutimi', NULL, '9068069690', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(312, 'BLCN/0312', 'Ayoola', 'Hameedah ', 'Ayoola Hameedah', NULL, '9023435772', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(313, 'BLCN/0313', 'Ayoola', 'Oguniyi ', 'Ayoola Oguniyi', NULL, '8103030121', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(314, 'BLCN/0314', 'Azeez', 'Adeyemi ', 'Azeez Adeyemi', NULL, '8072728779', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(315, 'BLCN/0315', 'Azeez', 'Daud ', 'Azeez Daud', NULL, '8027703884', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(316, 'BLCN/0316', 'Azeez', 'Ibrahim ', 'Azeez Ibrahim', NULL, '8074110106', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:24'),
(317, 'BLCN/0317', 'Azeez', 'Saheed ', 'Azeez Saheed', NULL, '9068800135', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:25'),
(318, 'BLCN/0318', 'Azeez', 'Taoheeb ', 'Azeez Taoheeb', NULL, '8107633022', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:25'),
(319, 'BLCN/0319', 'Babagida', 'Mercy ', 'Babagida Mercy', NULL, '8067497858', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:25'),
(320, 'BLCN/0320', 'Babagida', 'Paul ', 'Babagida Paul', NULL, '9063175668', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:25'),
(321, 'BLCN/0321', 'Babalola', 'Iyiola ', 'Babalola Iyiola', NULL, '8090713699', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:25'),
(322, 'BLCN/0322', 'Babalola', 'Shola ', 'Babalola Shola', NULL, '8067828457', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:25'),
(323, 'BLCN/0323', 'Babatunde', 'Adefisayo ', 'Babatunde Adefisayo', NULL, '9065623098', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:25'),
(324, 'BLCN/0324', 'Babatunde', 'Adeniyi ', 'Babatunde Adeniyi', NULL, '9123510324', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:25'),
(325, 'BLCN/0325', 'Bada', 'Olamide ', 'Bada Olamide', NULL, '9094316044', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:25'),
(326, 'BLCN/0326', 'Bada', 'Olamide Sunday', 'Bada Olamide Sunday', NULL, '8092690866', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:25'),
(327, 'BLCN/0327', 'Badejo', 'Tawakalitu ', 'Badejo Tawakalitu', NULL, '8089367222', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:25'),
(328, 'BLCN/0328', 'Badmus', 'Islamiya ', 'Badmus Islamiya', NULL, '9065194280', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:26'),
(329, 'BLCN/0329', 'Balikis', 'Hamzat ', 'Balikis Hamzat', NULL, '8021424713', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:26'),
(330, 'BLCN/0330', 'Ballo', 'Aisha ', 'Ballo Aisha', NULL, '9031786940', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:27'),
(331, 'BLCN/0331', 'Balogun', 'Abdulbasit ', 'Balogun Abdulbasit', NULL, '8143480667', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:27'),
(332, 'BLCN/0332', 'Balogun', 'Abduljawwad ', 'Balogun Abduljawwad', NULL, '8035286357', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:28'),
(333, 'BLCN/0333', 'Balogun', 'Abiodun ', 'Balogun Abiodun', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:28'),
(334, 'BLCN/0334', 'Balogun', 'Abiodun ', 'Balogun Abiodun', NULL, '9064413419', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:28'),
(335, 'BLCN/0335', 'Balogun', 'Aminat ', 'Balogun Aminat', NULL, '9066329391', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:28'),
(336, 'BLCN/0336', 'Balogun', 'Ayomide ', 'Balogun Ayomide', NULL, '9160813175', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:28'),
(337, 'BLCN/0337', 'Balogun', 'Babatunde Quadri', 'Balogun Babatunde Quadri', NULL, '7035140079', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:28'),
(338, 'BLCN/0338', 'Balogun', 'Bashiru ', 'Balogun Bashiru', NULL, '7082064844', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:28'),
(339, 'BLCN/0339', 'Balogun', 'Elizabeth ', 'Balogun Elizabeth', NULL, '7083133302', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:28'),
(340, 'BLCN/0340', 'Balogun', 'Islamiyat ', 'Balogun Islamiyat', NULL, '9024063513', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:28'),
(341, 'BLCN/0341', 'Balogun', 'Israel ', 'Balogun Israel', NULL, '9078530101', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:28'),
(342, 'BLCN/0342', 'Balogun', 'John ', 'Balogun John', NULL, '9075836961', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(343, 'BLCN/0343', 'Balogun', 'Silifat ', 'Balogun Silifat', NULL, '8137910733', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(344, 'BLCN/0344', 'Bamikunle', 'Praise ', 'Bamikunle Praise', NULL, '8145838358', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(345, 'BLCN/0345', 'Banjoko', 'Alabi ', 'Banjoko Alabi', NULL, '8032742693', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(346, 'BLCN/0346', 'Bashir', 'Abdulmujeeb Alabi', 'Bashir Abdulmujeeb Alabi', NULL, '8161776936', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(347, 'BLCN/0347', 'Bashiru', 'Isiaq ', 'Bashiru Isiaq', NULL, '9037727024', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(348, 'BLCN/0348', 'Bello', 'Aisha ', 'Bello Aisha', NULL, '8144618731', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(349, 'BLCN/0349', 'Bello', 'Aminah ', 'Bello Aminah', NULL, '7041718271', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(350, 'BLCN/0350', 'Bello', 'Aminat ', 'Bello Aminat', NULL, '7050753984', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(351, 'BLCN/0351', 'Bello', 'Hameedat ', 'Bello Hameedat', NULL, '7032129028', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(352, 'BLCN/0352', 'Bello', 'Hauwa ', 'Bello Hauwa', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(353, 'BLCN/0353', 'Bello', 'Kabiru ', 'Bello Kabiru', NULL, '8069641609', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(354, 'BLCN/0354', 'Bello', 'Khalid ', 'Bello Khalid', NULL, '8078941131', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(355, 'BLCN/0355', 'Bello', 'Mubarakat ', 'Bello Mubarakat', NULL, '8109495720', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(356, 'BLCN/0356', 'Bello', 'Teslimat ', 'Bello Teslimat', NULL, '8102016447', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:29'),
(357, 'BLCN/0357', 'Bello', 'Wasilat ', 'Bello Wasilat', NULL, '8037052986', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(358, 'BLCN/0358', 'Bello', 'Yasar ', 'Bello Yasar', NULL, '7088981238', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(359, 'BLCN/0359', 'Bello', 'Zulu Jimoh', 'Bello Zulu Jimoh', NULL, '8032651645', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(360, 'BLCN/0360', 'Bukhari', 'Abdurrazaq ', 'Bukhari Abdurrazaq', NULL, '9086469641', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(361, 'BLCN/0361', 'Bunmi', 'Oluwakemi ', 'Bunmi Oluwakemi', NULL, '8030451520', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(362, 'BLCN/0362', 'Christer', 'Kelechi Jemba', 'Christer Kelechi Jemba', NULL, '8122953152', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(363, 'BLCN/0363', 'Clement', 'Olusegun ', 'Clement Olusegun', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(364, 'BLCN/0364', 'Collins', 'Grace ', 'Collins Grace', NULL, '7035756190', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(365, 'BLCN/0365', 'Crescent', 'Hospital ', 'Crescent Hospital', NULL, '8185334553', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(366, 'BLCN/0366', 'Dada', 'Olayinka Michael', 'Dada Olayinka Michael', NULL, '7066210225', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(367, 'BLCN/0367', 'Damilola', 'Olajide ', 'Damilola Olajide', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(368, 'BLCN/0368', 'Daniel', 'Atteh ', 'Daniel Atteh', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(369, 'BLCN/0369', 'Daniel', 'Effiok ', 'Daniel Effiok', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(370, 'BLCN/0370', 'Danjumma', 'Emmanuel ', 'Danjumma Emmanuel', NULL, '8131571997', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(371, 'BLCN/0371', 'Daud', 'Abdukadir ', 'Daud Abdukadir', NULL, '7038004414', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(372, 'BLCN/0372', 'David', 'Adeyinka ', 'David Adeyinka', NULL, '8086376165', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(373, 'BLCN/0373', 'Dere', 'Khadijah ', 'Dere Khadijah', NULL, '8082931289', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:30'),
(374, 'BLCN/0374', 'Desmond', 'John ', 'Desmond John', '2000-12-06 14:51:53', '08166831174', '', 'male', 1, 3, '2024-03-13 14:43:03', NULL, 'Crescent', 'no', '', 'active', NULL, '2024-12-14 13:52:24'),
(375, 'BLCN/0375', 'Destiny', 'Moma ', 'Destiny Moma', NULL, '7040621973', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(376, 'BLCN/0376', 'Doris', 'Aluko ', 'Doris Aluko', NULL, '8052494928', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(377, 'BLCN/0377', 'Doris', 'Aluko ', 'Doris Aluko', NULL, '8052194928', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(378, 'BLCN/0378', 'Dotun', 'Adewumi ', 'Dotun Adewumi', NULL, '8022974743', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(379, 'BLCN/0379', 'Dr', 'Mrs Abdulraheem', 'Dr Mrs Abdulraheem', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(380, 'BLCN/0380', 'Durojaiye', 'Opeyemi ', 'Durojaiye Opeyemi', NULL, '8145522586', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(381, 'BLCN/0381', 'Egbetade', 'Timilehin ', 'Egbetade Timilehin', NULL, '8104915802', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(382, 'BLCN/0382', 'Egbewunmi', 'Haroun ', 'Egbewunmi Haroun', NULL, '9015677870', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(383, 'BLCN/0383', 'Ejiwumi', 'Oluwatoyin ', 'Ejiwumi Oluwatoyin', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(384, 'BLCN/0384', 'Eleyinerin', 'Farha ', 'Eleyinerin Farha', NULL, '9114994874', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(385, 'BLCN/0385', 'Eleyinerin', 'Busroh ', 'Eleyinerin Busroh', NULL, '7066359663', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(386, 'BLCN/0386', 'Elijah', 'Ayodele ', 'Elijah Ayodele', NULL, '7035670153', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:31'),
(387, 'BLCN/0387', 'Elijah', 'Olumide Dada', 'Elijah Olumide Dada', NULL, '8060949768', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(388, 'BLCN/0388', 'Elizabeth', 'Temitayo Olugbenga', 'Elizabeth Temitayo Olugbenga', NULL, '8136383587', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(389, 'BLCN/0389', 'Elizabeth', 'Temitope ', 'Elizabeth Temitope', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(390, 'BLCN/0390', 'Emmanuel', 'Danjuma ', 'Emmanuel Danjuma', NULL, '8131571997', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(391, 'BLCN/0391', 'Emmanuel', 'Okon ', 'Emmanuel Okon', NULL, '8125731968', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(392, 'BLCN/0392', 'Emmauel', 'Ogbu ', 'Emmauel Ogbu', NULL, '8103274707', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(393, 'BLCN/0393', 'Emmaunel', 'Ayembo ', 'Emmaunel Ayembo', NULL, '7015503498', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(394, 'BLCN/0394', 'Esther', 'Osoboh ', 'Esther Osoboh', NULL, '7033745857', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(395, 'BLCN/0395', 'Ezekiel', 'Moses ', 'Ezekiel Moses', NULL, '8162830845', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(396, 'BLCN/0396', 'Ezeofor', 'Philip ', 'Ezeofor Philip', NULL, '8160199990', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(397, 'BLCN/0397', 'Fadare', 'Oluwabunmi ', 'Fadare Oluwabunmi', NULL, '7011803679', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(398, 'BLCN/0398', 'Fadesere', 'Rasheed Kehinde', 'Fadesere Rasheed Kehinde', NULL, '8036328506', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(399, 'BLCN/0399', 'Fagade', 'Qureed ', 'Fagade Qureed', NULL, '8105287957', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(400, 'BLCN/0400', 'Faizal', 'Nasirudeen ', 'Faizal Nasirudeen', NULL, '9128244708', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(401, 'BLCN/0401', 'Fakoroye', 'Ayomide ', 'Fakoroye Ayomide', NULL, '8164558474', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(402, 'BLCN/0402', 'Falade', 'Habeeb ', 'Falade Habeeb', NULL, '8167224198', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(403, 'BLCN/0403', 'Farida', 'Adeshina ', 'Farida Adeshina', NULL, '8134844149', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(404, 'BLCN/0404', 'Fasilat', 'Falade ', 'Fasilat Falade', NULL, '9061811435', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:32'),
(405, 'BLCN/0405', 'Fatai', 'Ibrahim ', 'Fatai Ibrahim', NULL, '8128865769', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(406, 'BLCN/0406', 'Fathia', 'Omokanye ', 'Fathia Omokanye', NULL, '9019911815', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(407, 'BLCN/0407', 'Fatimoh', 'Isiaq ', 'Fatimoh Isiaq', NULL, '9066942947', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(408, 'BLCN/0408', 'Feruke', 'Abdulazeez ', 'Feruke Abdulazeez', NULL, '8147383521', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(409, 'BLCN/0409', 'Fiyinfoluwa', 'Adetunji Stephen', 'Fiyinfoluwa Adetunji Stephen', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(410, 'BLCN/0410', 'Florence', 'Mogala ', 'Florence Mogala', NULL, '8109651113', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(411, 'BLCN/0411', 'Folakemi', 'Tekobo ', 'Folakemi Tekobo', NULL, '8109908322', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(412, 'BLCN/0412', 'Folorunsho', 'Olarewaju ', 'Folorunsho Olarewaju', NULL, '8066230943', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(413, 'BLCN/0413', 'Funke', 'Ajomale ', 'Funke Ajomale', NULL, '8068015534', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(414, 'BLCN/0414', 'Ganiu', 'Ridwan ', 'Ganiu Ridwan', NULL, '7033674870', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(415, 'BLCN/0415', 'Ganiyu', 'Waheed ', 'Ganiyu Waheed', NULL, '8107973820', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(416, 'BLCN/0416', 'Gashion', 'Amos ', 'Gashion Amos', NULL, '8126121500', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(417, 'BLCN/0417', 'Gbenga', 'Abolaji ', 'Gbenga Abolaji', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(418, 'BLCN/0418', 'Godwin', 'Pius ', 'Godwin Pius', NULL, '8124768959', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(419, 'BLCN/0419', 'Godwin', 'Pius ', 'Godwin Pius', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(420, 'BLCN/0420', 'Goli', 'Saleh Abdullahi', 'Goli Saleh Abdullahi', NULL, '8036232437', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:33'),
(421, 'BLCN/0421', 'Habeeb', 'Abdulrasaq ', 'Habeeb Abdulrasaq', NULL, '8036101131', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(422, 'BLCN/0422', 'Habibat', 'Abdulganiyu ', 'Habibat Abdulganiyu', NULL, '9063693809', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(423, 'BLCN/0423', 'Hakeem', 'Abd-hameed ', 'Hakeem Abd-hameed', NULL, '8111915444', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(424, 'BLCN/0424', 'Hammed', 'Aderemi ', 'Hammed Aderemi', NULL, '7035634771', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(425, 'BLCN/0425', 'Hamzat', 'Ibrahim ', 'Hamzat Ibrahim', NULL, '7057883160', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(426, 'BLCN/0426', 'Hamzat', 'Olalekan ', 'Hamzat Olalekan', NULL, '7049564275', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(427, 'BLCN/0427', 'Harrison', 'Ifeanacho ', 'Harrison Ifeanacho', NULL, '9024414736', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(428, 'BLCN/0428', 'Haruna', 'Daniel ', 'Haruna Daniel', NULL, '8164063043', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(429, 'BLCN/0429', 'Hashim', 'Arikewuyo ', 'Hashim Arikewuyo', NULL, '7089111478', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(430, 'BLCN/0430', 'Hussein', 'Ibrahim ', 'Hussein Ibrahim', NULL, '8032528833', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(431, 'BLCN/0431', 'Hussein', 'Luka ', 'Hussein Luka', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(432, 'BLCN/0432', 'Ibrahim', 'Abayomi ', 'Ibrahim Abayomi', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(433, 'BLCN/0433', 'Ibrahim', 'Abdulakeem ', 'Ibrahim Abdulakeem', NULL, '7068551346', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(434, 'BLCN/0434', 'Ibrahim', 'Abubakar Isiaq', 'Ibrahim Abubakar Isiaq', NULL, '7086439939', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(435, 'BLCN/0435', 'Ibrahim', 'Lateef ', 'Ibrahim Lateef', NULL, '8069148131', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(436, 'BLCN/0436', 'Ibrahim', 'Medinat ', 'Ibrahim Medinat', NULL, '7036068736', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:34'),
(437, 'BLCN/0437', 'Ibrahim', 'Muhammed Fatimah', 'Ibrahim Muhammed Fatimah', NULL, '8032527015', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:35'),
(438, 'BLCN/0438', 'Ibrahim', 'Muyiwa Abraham', 'Ibrahim Muyiwa Abraham', NULL, '7033513191', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:35'),
(439, 'BLCN/0439', 'Ibrahim', 'Najib ', 'Ibrahim Najib', NULL, '8132218098', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:35'),
(440, 'BLCN/0440', 'Ibrahim', 'Nofiu ', 'Ibrahim Nofiu', NULL, '8129880832', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:35'),
(441, 'BLCN/0441', 'Ibrahim', 'Sikirullah ', 'Ibrahim Sikirullah', NULL, '8130720883', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:35'),
(442, 'BLCN/0442', 'Ibrahim', 'Simbiat ', 'Ibrahim Simbiat', NULL, '8183083969', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:35'),
(443, 'BLCN/0443', 'Ibrahim', 'Waliyat ', 'Ibrahim Waliyat', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:35'),
(444, 'BLCN/0444', 'Ibrahim', 'Yusuf K.', 'Ibrahim Yusuf K.', NULL, '8035833990', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:35'),
(445, 'BLCN/0445', 'Idowu', ' ', 'Idowu', NULL, '8023516280', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:35'),
(446, 'BLCN/0446', 'Idowu', 'Isiaq ', 'Idowu Isiaq', NULL, '9060575333', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:35'),
(447, 'BLCN/0447', 'Idris', 'Abdulateef ', 'Idris Abdulateef', NULL, '8149005616', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:35'),
(448, 'BLCN/0448', 'Idris', 'Abdulgafar ', 'Idris Abdulgafar', NULL, '8064953340', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:36'),
(449, 'BLCN/0449', 'Idris', 'Alao ', 'Idris Alao', NULL, '7061142890', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:36'),
(450, 'BLCN/0450', 'Idris', 'Halimah ', 'Idris Halimah', NULL, '8164075542', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:36'),
(451, 'BLCN/0451', 'Idris', 'Mohammed ', 'Idris Mohammed', NULL, '9134499566', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:36'),
(452, 'BLCN/0452', 'Idris', 'Naheemah ', 'Idris Naheemah', NULL, '7082866135', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:36'),
(453, 'BLCN/0453', 'Idris', 'Nufiu ', 'Idris Nufiu', NULL, '9017477155', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:36'),
(454, 'BLCN/0454', 'Idris', 'Sodiq ', 'Idris Sodiq', NULL, '8050509757', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:36'),
(455, 'BLCN/0455', 'Ilyas', 'Abdulqudus ', 'Ilyas Abdulqudus', NULL, '9030661898', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:36'),
(456, 'BLCN/0456', 'Inioluwa', 'Oluwapelumi ', 'Inioluwa Oluwapelumi', NULL, '9051728072', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(457, 'BLCN/0457', 'Irukera', 'Olumide ', 'Irukera Olumide', NULL, '9032571720', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(458, 'BLCN/0458', 'Isa', 'Mohammed Bashir', 'Isa Mohammed Bashir', NULL, '8024477715', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(459, 'BLCN/0459', 'Isa', 'Saoban ', 'Isa Saoban', NULL, '8166716602', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(460, 'BLCN/0460', 'Isaya', 'Sera ', 'Isaya Sera', NULL, '7012610040', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(461, 'BLCN/0461', 'Isiak', 'Adeleke ', 'Isiak Adeleke', NULL, '9031278691', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(462, 'BLCN/0462', 'Isiak', 'Mudasir ', 'Isiak Mudasir', NULL, '8137291218', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(463, 'BLCN/0463', 'Isiaka', 'Abiodun Munirat', 'Isiaka Abiodun Munirat', NULL, '7033049000', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(464, 'BLCN/0464', 'Isiaq', 'Abdulquadry Olayiwola', 'Isiaq Abdulquadry Olayiwola', NULL, '7067780212', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(465, 'BLCN/0465', 'Isiaq', 'Bello ', 'Isiaq Bello', NULL, '8135688896', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(466, 'BLCN/0466', 'Isiaq', 'Sofiyullahi ', 'Isiaq Sofiyullahi', NULL, '7033981426', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(467, 'BLCN/0467', 'Ismail', 'Abdulbasit ', 'Ismail Abdulbasit', NULL, '8155825813', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(468, 'BLCN/0468', 'Ismail', 'Badmus ', 'Ismail Badmus', NULL, '7040450651', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(469, 'BLCN/0469', 'Ismail', 'Jimoh ', 'Ismail Jimoh', NULL, '8063951409', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(470, 'BLCN/0470', 'Ismail', 'Kayode ', 'Ismail Kayode', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(471, 'BLCN/0471', 'Itopa', 'Sadiq ', 'Itopa Sadiq', NULL, '8065218477', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:37'),
(472, 'BLCN/0472', 'Itunu', 'Oyelade ', 'Itunu Oyelade', NULL, '8072232019', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:38'),
(473, 'BLCN/0473', 'Itunuoluwa', 'Oriewe ', 'Itunuoluwa Oriewe', NULL, '9072292524', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:38'),
(474, 'BLCN/0474', 'Iyanda', 'Olarewaju ', 'Iyanda Olarewaju', NULL, '8140546675', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:38'),
(475, 'BLCN/0475', 'James', 'Oyinbo Austin', 'James Oyinbo Austin', NULL, '8035141208', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:39'),
(476, 'BLCN/0476', 'Jamiu', 'Qoseem ', 'Jamiu Qoseem', NULL, '7042413540', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:39'),
(477, 'BLCN/0477', 'Jatto', 'Yusuf ', 'Jatto Yusuf', NULL, '8151016476', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:39'),
(478, 'BLCN/0478', 'Jeremiah', 'Aiyembo ', 'Jeremiah Aiyembo', NULL, '8138083795', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:39'),
(479, 'BLCN/0479', 'Jimoh', 'Abdulqoyum ', 'Jimoh Abdulqoyum', NULL, '9024608097', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:40'),
(480, 'BLCN/0480', 'Jimoh', 'Ahmed ', 'Jimoh Ahmed', NULL, '7068554209', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:40'),
(481, 'BLCN/0481', 'Jimoh', 'Ahmed ', 'Jimoh Ahmed', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:40'),
(482, 'BLCN/0482', 'Jimoh', 'Alimat ', 'Jimoh Alimat', NULL, '8023984919', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:40'),
(483, 'BLCN/0483', 'Jimoh', 'Fadilat ', 'Jimoh Fadilat', NULL, '8036036206', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:41'),
(484, 'BLCN/0484', 'Jimoh', 'Faridat ', 'Jimoh Faridat', NULL, '7087575799', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:41'),
(485, 'BLCN/0485', 'Jimoh', 'Ibrahim ', 'Jimoh Ibrahim', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:41'),
(486, 'BLCN/0486', 'Jimoh', 'Kehinde A.', 'Jimoh Kehinde A.', NULL, '8141927618', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:41'),
(487, 'BLCN/0487', 'Jimoh', 'Mubarak ', 'Jimoh Mubarak', NULL, '7034952134', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:41'),
(488, 'BLCN/0488', 'Jimoh', 'Opeyemi Faizah', 'Jimoh Opeyemi Faizah', NULL, '8154090611', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:41'),
(489, 'BLCN/0489', 'John', 'Ayembo ', 'John Ayembo', NULL, '8135589043', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:41'),
(490, 'BLCN/0490', 'Johns', 'Nasara ', 'Johns Nasara', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:41'),
(491, 'BLCN/0491', 'Joinall', 'Amos ', 'Joinall Amos', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:41'),
(492, 'BLCN/0492', 'Joledo', 'David ', 'Joledo David', NULL, '8022224835', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:41'),
(493, 'BLCN/0493', 'Joledo', 'Olu ', 'Joledo Olu', NULL, '9084881224', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:41'),
(494, 'BLCN/0494', 'Joseph', 'Ojo ', 'Joseph Ojo', NULL, '7050545210', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:42'),
(495, 'BLCN/0495', 'Joshua', 'Oluwatimileyin ', 'Joshua Oluwatimileyin', NULL, '8023950296', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:42'),
(496, 'BLCN/0496', 'Kadir', 'Arinola ', 'Kadir Arinola', NULL, '9067449727', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:42'),
(497, 'BLCN/0497', 'Kadiri', 'Kehinde ', 'Kadiri Kehinde', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:42'),
(498, 'BLCN/0498', 'Kamaldeen', 'Abdulraheem ', 'Kamaldeen Abdulraheem', NULL, '8137047800', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:42'),
(499, 'BLCN/0499', 'Kamaldeen', 'Aziyah ', 'Kamaldeen Aziyah', NULL, '8104985615', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:42'),
(500, 'BLCN/0500', 'Kamordeen', 'Saheed Olarewaju', 'Kamordeen Saheed Olarewaju', NULL, '8097021133', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:42'),
(501, 'BLCN/0501', 'Kasali', 'Olalekan ', 'Kasali Olalekan', NULL, '8100642956', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:42'),
(502, 'BLCN/0502', 'Kazeem', 'Quadri ', 'Kazeem Quadri', NULL, '8140446675', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:43'),
(503, 'BLCN/0503', 'Kehinde', 'Onijesiku ', 'Kehinde Onijesiku', NULL, '9025157287', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:43'),
(504, 'BLCN/0504', 'Kehinde', 'Usman ', 'Kehinde Usman', NULL, '7031007617', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:43'),
(505, 'BLCN/0505', 'Khadija', 'Adedoyin ', 'Khadija Adedoyin', NULL, '8178395403', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:43'),
(506, 'BLCN/0506', 'Kolade', 'Idris ', 'Kolade Idris', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:43'),
(507, 'BLCN/0507', 'Kolade', 'Sulaiman ', 'Kolade Sulaiman', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:43'),
(508, 'BLCN/0508', 'Kolawole', 'Timothy ', 'Kolawole Timothy', NULL, '7035777986', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:43'),
(509, 'BLCN/0509', 'Kolo', 'Moses ', 'Kolo Moses', NULL, '8060799640', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:43'),
(510, 'BLCN/0510', 'Komolafe', 'Toyyib ', 'Komolafe Toyyib', NULL, '8121011321', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:43'),
(511, 'BLCN/0511', 'Kutelu', 'Olusanya ', 'Kutelu Olusanya', NULL, '8162440472', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:44'),
(512, 'BLCN/0512', 'Kuti', 'Abdulwadud ', 'Kuti Abdulwadud', NULL, '9023464901', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:44'),
(513, 'BLCN/0513', 'Lanre', 'Mose ', 'Lanre Mose', NULL, '9162777651', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:44'),
(514, 'BLCN/0514', 'Lasisi', 'Tobi ', 'Lasisi Tobi', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:44'),
(515, 'BLCN/0515', 'Lawal', 'Olayinka ', 'Lawal Olayinka', NULL, '8066619395', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:44'),
(516, 'BLCN/0516', 'Lawal', 'Abdulkabir ', 'Lawal Abdulkabir', NULL, '8130693834', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:44'),
(517, 'BLCN/0517', 'Lawal', 'Aishat ', 'Lawal Aishat', NULL, '8062528317', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:44'),
(518, 'BLCN/0518', 'Lawal', 'Alimah ', 'Lawal Alimah', NULL, '8066756567', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:44'),
(519, 'BLCN/0519', 'Lawal', 'Azeemat ', 'Lawal Azeemat', NULL, '8134251105', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:44'),
(520, 'BLCN/0520', 'Lawal', 'Hussein ', 'Lawal Hussein', NULL, '7063773482', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:45'),
(521, 'BLCN/0521', 'Lawal', 'Muhammed ', 'Lawal Muhammed', NULL, '9138424125', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:45'),
(522, 'BLCN/0522', 'Lawal', 'Seyi ', 'Lawal Seyi', NULL, '8032576163', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:45'),
(523, 'BLCN/0523', 'Lawal', 'Seyi Stephen', 'Lawal Seyi Stephen', NULL, '8032576163', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(524, 'BLCN/0524', 'Luka', 'Tanko ', 'Luka Tanko', NULL, '9038540097', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(525, 'BLCN/0525', 'Lukman', 'Ibrahim ', 'Lukman Ibrahim', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(526, 'BLCN/0526', 'Lukman', 'Ridwanulahi ', 'Lukman Ridwanulahi', NULL, '7037527538', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(527, 'BLCN/0527', 'Magaji', 'Solomon ', 'Magaji Solomon', NULL, '8143111403', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(528, 'BLCN/0528', 'Mahmud', 'Zakariyah ', 'Mahmud Zakariyah', NULL, '7064267073', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(529, 'BLCN/0529', 'Mansur', 'Abubakar Oluwadamilare', 'Mansur Abubakar Oluwadamilare', NULL, '8156555178', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(530, 'BLCN/0530', 'Mariam', 'Idris ', 'Mariam Idris', NULL, '9024059734', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(531, 'BLCN/0531', 'Mark', 'Adefisayo ', 'Mark Adefisayo', NULL, '7017556303', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(532, 'BLCN/0532', 'Maruf', 'Monsurat ', 'Maruf Monsurat', NULL, '7040188351', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(533, 'BLCN/0533', 'Maryam', 'Abdulroheem ', 'Maryam Abdulroheem', NULL, '9068998642', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(534, 'BLCN/0534', 'Maryam', 'Oladigbolu ', 'Maryam Oladigbolu', NULL, '8036263038', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(535, 'BLCN/0535', 'Matthew', 'John ', 'Matthew John', NULL, '8145009516', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(536, 'BLCN/0536', 'Matthew', 'Kayode ', 'Matthew Kayode', NULL, '8149487703', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(537, 'BLCN/0537', 'Mavelous', 'Mark ', 'Mavelous Mark', NULL, '8145468000', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:46'),
(538, 'BLCN/0538', 'Mayowa', 'Adeponle ', 'Mayowa Adeponle', NULL, '9033502819', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:47'),
(539, 'BLCN/0539', 'Mayowa', 'Adeponle ', 'Mayowa Adeponle', NULL, '8158856123', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:47'),
(540, 'BLCN/0540', 'Mayowa', 'Samuel ', 'Mayowa Samuel', NULL, '8102887721', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:47'),
(541, 'BLCN/0541', 'Michael', 'Omisakin ', 'Michael Omisakin', NULL, '8162765859', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:48'),
(542, 'BLCN/0542', 'Michael', 'Oyedepo ', 'Michael Oyedepo', NULL, '8035975902', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:48'),
(543, 'BLCN/0543', 'Mistura', 'Ahmed ', 'Mistura Ahmed', NULL, '9094456119', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:48'),
(544, 'BLCN/0544', 'Mohammed', 'Adam ', 'Mohammed Adam', NULL, '8108668077', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:48'),
(545, 'BLCN/0545', 'Mohammed', 'Elislam Oladoja', 'Mohammed Elislam Oladoja', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:48'),
(546, 'BLCN/0546', 'Mohammed', 'Mohammed ', 'Mohammed Mohammed', NULL, '8062489999', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:48'),
(547, 'BLCN/0547', 'Mohammed', 'Nurudeen ', 'Mohammed Nurudeen', NULL, '8087644781', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:48'),
(548, 'BLCN/0548', 'Mohammed', 'Waliyulahi ', 'Mohammed Waliyulahi', NULL, '7062254522', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:48'),
(549, 'BLCN/0549', 'Mojeed', 'Rasak ', 'Mojeed Rasak', NULL, '8061158340', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:48'),
(550, 'BLCN/0550', 'Momoh', 'Otaru Mudashiru', 'Momoh Otaru Mudashiru', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:48'),
(551, 'BLCN/0551', 'Monity', 'Rebecca ', 'Monity Rebecca', NULL, '8166270625', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:48'),
(552, 'BLCN/0552', 'Monsur', 'Badmus ', 'Monsur Badmus', NULL, '7083454186', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(553, 'BLCN/0553', 'Moshood', 'Alabi ', 'Moshood Alabi', NULL, '9030319265', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(554, 'BLCN/0554', 'Moshood', 'Hassanat ', 'Moshood Hassanat', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(555, 'BLCN/0555', 'Mr', 'Gold Emmanuel', 'Mr Gold Emmanuel', NULL, '8062392022', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(556, 'BLCN/0556', 'Mr.gbenga', 'Abdullahi ', 'Mr.gbenga Abdullahi', NULL, '7035606825', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(557, 'BLCN/0557', 'Mrs', 'Dupe ', 'Mrs Dupe', NULL, '8162814852', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(558, 'BLCN/0558', 'Mubarak', 'Muhammad ', 'Mubarak Muhammad', NULL, '8127684668', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(559, 'BLCN/0559', 'Mubarak', 'Yusuf ', 'Mubarak Yusuf', NULL, '8030451354', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(560, 'BLCN/0560', 'Mubarakah', 'Aroyehun ', 'Mubarakah Aroyehun', NULL, '8091447386', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(561, 'BLCN/0561', 'Mudashiru', 'Mosurat ', 'Mudashiru Mosurat', NULL, '8052181867', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(562, 'BLCN/0562', 'Muftau', 'Mustapha Ademola', 'Muftau Mustapha Ademola', NULL, '9034049400', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(563, 'BLCN/0563', 'Muhammadnasir', 'Mashood ', 'Muhammadnasir Mashood', NULL, '7038696030', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(564, 'BLCN/0564', 'Muhammed', 'Abdul ', 'Muhammed Abdul', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(565, 'BLCN/0565', 'Muhammed', 'Abdul ', 'Muhammed Abdul', NULL, '8167089818', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(566, 'BLCN/0566', 'Muhammed', 'Abdulsalam ', 'Muhammed Abdulsalam', NULL, '8032396394', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(567, 'BLCN/0567', 'Muhammed', 'Abubakar ', 'Muhammed Abubakar', NULL, '9168847947', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(568, 'BLCN/0568', 'Muhammed', 'Awwal ', 'Muhammed Awwal', NULL, '7080968024', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(569, 'BLCN/0569', 'Muhammed', 'Jamiu ', 'Muhammed Jamiu', NULL, '8062535446', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(570, 'BLCN/0570', 'Muhammed', 'Olayinka Abubakar', 'Muhammed Olayinka Abubakar', NULL, '8033118196', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(571, 'BLCN/0571', 'Muhammed', 'Rekiyat ', 'Muhammed Rekiyat', NULL, '8092775731', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(572, 'BLCN/0572', 'Muhammed', 'Shagaya ', 'Muhammed Shagaya', NULL, '8107905000', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(573, 'BLCN/0573', 'Muhammed', 'Sharafa ', 'Muhammed Sharafa', NULL, '9039206994', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(574, 'BLCN/0574', 'Muhammed', 'Zubair ', 'Muhammed Zubair', NULL, '8127114173', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:49'),
(575, 'BLCN/0575', 'Mukhtar', 'Abdulraheem. O', 'Mukhtar Abdulraheem. O', NULL, '9073560680', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:50'),
(576, 'BLCN/0576', 'Muritala', 'Muttar ', 'Muritala Muttar', NULL, '8154311752', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:50'),
(577, 'BLCN/0577', 'Murtada', 'Muhammad ', 'Murtada Muhammad', NULL, '8034763191', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:50'),
(578, 'BLCN/0578', 'Musa', 'Abdulazeez O.', 'Musa Abdulazeez O.', NULL, '8163569585', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:50'),
(579, 'BLCN/0579', 'Musa', 'Ibrahim ', 'Musa Ibrahim', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:50'),
(580, 'BLCN/0580', 'Musa', 'Ibrahim ', 'Musa Ibrahim', NULL, '7014546599', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:50'),
(581, 'BLCN/0581', 'Musa', 'Ibrahim ', 'Musa Ibrahim', NULL, '9091361131', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:50'),
(582, 'BLCN/0582', 'Musa', 'Ismail Adeyinka', 'Musa Ismail Adeyinka', NULL, '8066249090', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(583, 'BLCN/0583', 'Musa', 'Kaothar ', 'Musa Kaothar', NULL, '8023850026', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(584, 'BLCN/0584', 'Musa', 'Sarat ', 'Musa Sarat', NULL, '8072638610', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(585, 'BLCN/0585', 'Muslihudeen', 'Asiat ', 'Muslihudeen Asiat', NULL, '9034548062', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(586, 'BLCN/0586', 'Muslim', 'Abdulrasaq ', 'Muslim Abdulrasaq', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(587, 'BLCN/0587', 'Mussawwar', 'Olabintan ', 'Mussawwar Olabintan', NULL, '8155119126', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(588, 'BLCN/0588', 'Mustapha', 'S.a. ', 'Mustapha S.a.', NULL, '7038927616', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(589, 'BLCN/0589', 'Mustapha', 'S.a. ', 'Mustapha S.a.', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(590, 'BLCN/0590', 'Mustapha', 'Yusuf ', 'Mustapha Yusuf', NULL, '8144946559', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(591, 'BLCN/0591', 'Mutiat', 'Ogunfemi ', 'Mutiat Ogunfemi', NULL, '8034088965', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(592, 'BLCN/0592', 'Naim', 'Abiodun Asiyanbi', 'Naim Abiodun Asiyanbi', NULL, '7086773875', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(593, 'BLCN/0593', 'Nazimat', 'Abdulganiyu ', 'Nazimat Abdulganiyu', NULL, '8166892785', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(594, 'BLCN/0594', 'Nimat', 'Morenikeji ', 'Nimat Morenikeji', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(595, 'BLCN/0595', 'Nneka', 'Obi ', 'Nneka Obi', NULL, '8036785432', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(596, 'BLCN/0596', 'Nuremi', 'Riliwan ', 'Nuremi Riliwan', NULL, '8084210914', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:51'),
(597, 'BLCN/0597', 'Nurudeen', 'Bashir ', 'Nurudeen Bashir', NULL, '9068031714', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:52'),
(598, 'BLCN/0598', 'Nurudeen', 'Memunat ', 'Nurudeen Memunat', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:52'),
(599, 'BLCN/0599', 'Nwaibe', 'Joy ', 'Nwaibe Joy', NULL, '8163745797', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:52'),
(600, 'BLCN/0600', 'Nwokenya', 'Philip ', 'Nwokenya Philip', NULL, '9169352179', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:52'),
(601, 'BLCN/0601', 'Nwokenye', 'Philip ', 'Nwokenye Philip', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:52'),
(602, 'BLCN/0602', 'Odejayi', 'Fikayomi ', 'Odejayi Fikayomi', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:52'),
(603, 'BLCN/0603', 'Odewole', 'Nabeel ', 'Odewole Nabeel', NULL, '8103820905', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:52'),
(604, 'BLCN/0604', 'Odukoya', 'David ', 'Odukoya David', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:52'),
(605, 'BLCN/0605', 'Odukoya', 'Oyindamola ', 'Odukoya Oyindamola', NULL, '8185081393', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:53'),
(606, 'BLCN/0606', 'Odukoya', 'Temidayo ', 'Odukoya Temidayo', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:53'),
(607, 'BLCN/0607', 'Odusina', 'Abraham Olujuwon', 'Odusina Abraham Olujuwon', NULL, '8067651263', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:53'),
(608, 'BLCN/0608', 'Ogirima', 'Abdulbasit ', 'Ogirima Abdulbasit', NULL, '9157777331', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:53'),
(609, 'BLCN/0609', 'Ogunbiyi', 'Abdulazeez ', 'Ogunbiyi Abdulazeez', NULL, '9065821936', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:53');
INSERT INTO `customer_info` (`sn`, `id`, `surname`, `othername`, `fullname`, `dob`, `phone`, `email`, `sex`, `is_donor`, `blood_type_id`, `last_donation_date`, `remarks`, `hospital`, `c_by`, `upd_by`, `status`, `created_at`, `updated_at`) VALUES
(610, 'BLCN/0610', 'Ogunfemi', 'Arafah ', 'Ogunfemi Arafah', NULL, '8134314679', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:53'),
(611, 'BLCN/0611', 'Ogunfemi', 'Tunde ', 'Ogunfemi Tunde', NULL, '9086472431', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:53'),
(612, 'BLCN/0612', 'Ohuneniese', 'Bunmi ', 'Ohuneniese Bunmi', NULL, '8130451520', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:54'),
(613, 'BLCN/0613', 'Ojo', 'Oluwapelumi Afolabi', 'Ojo Oluwapelumi Afolabi', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:54'),
(614, 'BLCN/0614', 'Ojo', 'Ubaiy ', 'Ojo Ubaiy', NULL, '9062040872', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:54'),
(615, 'BLCN/0615', 'Okinbaloye', 'Toyin ', 'Okinbaloye Toyin', NULL, '8082876794', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(616, 'BLCN/0616', 'Okugunn', 'Glory ', 'Okugunn Glory', NULL, '8069120295', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(617, 'BLCN/0617', 'Okulaja', 'Taofeeq ', 'Okulaja Taofeeq', NULL, '9157834723', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(618, 'BLCN/0618', 'Okundaye', 'Anthonia ', 'Okundaye Anthonia', NULL, '9078569817', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(619, 'BLCN/0619', 'Olabode', 'Abulsalam ', 'Olabode Abulsalam', NULL, '8137963161', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(620, 'BLCN/0620', 'Oladele', 'Eniola Boluwatife', 'Oladele Eniola Boluwatife', NULL, '9165072491', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(621, 'BLCN/0621', 'Oladepo', 'Isreal ', 'Oladepo Isreal', NULL, '8062108844', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(622, 'BLCN/0622', 'Oladimeji', 'Lateefat ', 'Oladimeji Lateefat', NULL, '8032848113', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(623, 'BLCN/0623', 'Oladimeji', 'Mubaraq ', 'Oladimeji Mubaraq', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(624, 'BLCN/0624', 'Oladipupo', 'Roheemat ', 'Oladipupo Roheemat', NULL, '8163086361', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(625, 'BLCN/0625', 'Oladosu', 'Kozeem ', 'Oladosu Kozeem', NULL, '8037207081', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(626, 'BLCN/0626', 'Olagunju', 'Boluwatife ', 'Olagunju Boluwatife', NULL, '8125280119', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(627, 'BLCN/0627', 'Olagunju', 'John ', 'Olagunju John', NULL, '9025703655', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(628, 'BLCN/0628', 'Olaibi', 'Funmilayo ', 'Olaibi Funmilayo', NULL, '9093642330', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:55'),
(629, 'BLCN/0629', 'Olaitan', 'Uthman ', 'Olaitan Uthman', NULL, '8104921003', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:56'),
(630, 'BLCN/0630', 'Olaitan', 'Sulieman ', 'Olaitan Sulieman', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:56'),
(631, 'BLCN/0631', 'Olaiya', 'Jumoke ', 'Olaiya Jumoke', NULL, '7068224611', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:56'),
(632, 'BLCN/0632', 'Olaiya', 'S.a. ', 'Olaiya S.a.', NULL, '7065704597', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:56'),
(633, 'BLCN/0633', 'Olajide', 'Damilola ', 'Olajide Damilola', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:56'),
(634, 'BLCN/0634', 'Olakulehin', 'Reuben ', 'Olakulehin Reuben', NULL, '8034078827', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:56'),
(635, 'BLCN/0635', 'Olamide', 'Anna ', 'Olamide Anna', NULL, '9011584689', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:56'),
(636, 'BLCN/0636', 'Olaniyan', 'Festus ', 'Olaniyan Festus', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:56'),
(637, 'BLCN/0637', 'Olaniyan', 'Shola ', 'Olaniyan Shola', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:56'),
(638, 'BLCN/0638', 'Olaniyi', 'Opeyemi ', 'Olaniyi Opeyemi', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:56'),
(639, 'BLCN/0639', 'Olaoluwa', 'Samuel ', 'Olaoluwa Samuel', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:56'),
(640, 'BLCN/0640', 'Olaosebikan', 'Mary ', 'Olaosebikan Mary', NULL, '9068224793', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:57'),
(641, 'BLCN/0641', 'Olaosebikan', 'Olusola ', 'Olaosebikan Olusola', NULL, '8141877911', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:57'),
(642, 'BLCN/0642', 'Olaosebikan', 'Olusola ', 'Olaosebikan Olusola', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:57'),
(643, 'BLCN/0643', 'Olarewaju', 'Adejumoke ', 'Olarewaju Adejumoke', NULL, '8035992492', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:57'),
(644, 'BLCN/0644', 'Olarewaju', 'Mary ', 'Olarewaju Mary', NULL, '9138896611', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:57'),
(645, 'BLCN/0645', 'Olasupo', 'Abdullahi ', 'Olasupo Abdullahi', NULL, '8147448679', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:57'),
(646, 'BLCN/0646', 'Olatoke', 'Olatunji ', 'Olatoke Olatunji', NULL, '8102019980', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:57'),
(647, 'BLCN/0647', 'Olatoke', 'Rofiat ', 'Olatoke Rofiat', NULL, '7083851155', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:57'),
(648, 'BLCN/0648', 'Olatunde', 'Bolaji ', 'Olatunde Bolaji', NULL, '9137392398', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:59'),
(649, 'BLCN/0649', 'Olatunji', 'Alice Dupe', 'Olatunji Alice Dupe', NULL, '9031339676', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:59'),
(650, 'BLCN/0650', 'Olatunji', 'Alice Modupe', 'Olatunji Alice Modupe', NULL, '8156182549', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:59'),
(651, 'BLCN/0651', 'Olatunji', 'Rosemary ', 'Olatunji Rosemary', NULL, '9024466136', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:59'),
(652, 'BLCN/0652', 'Olatunji', 'Shola ', 'Olatunji Shola', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:59'),
(653, 'BLCN/0653', 'Olatunji', 'Titilayo ', 'Olatunji Titilayo', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:59'),
(654, 'BLCN/0654', 'Olawale', 'Jamal ', 'Olawale Jamal', NULL, '8098466122', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:59'),
(655, 'BLCN/0655', 'Olawuyi', 'Hafsat ', 'Olawuyi Hafsat', NULL, '8038492023', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:59'),
(656, 'BLCN/0656', 'Olayemi', 'Ayeni ', 'Olayemi Ayeni', NULL, '8079933175', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:59'),
(657, 'BLCN/0657', 'Olayinka', 'Iyiola ', 'Olayinka Iyiola', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:44:59'),
(658, 'BLCN/0658', 'Olayinka', 'Damilola ', 'Olayinka Damilola', NULL, '8145813945', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:00'),
(659, 'BLCN/0659', 'Olayinka', 'Iyiola Taofeek', 'Olayinka Iyiola Taofeek', NULL, '8063836328', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:00'),
(660, 'BLCN/0660', 'Olayinka', 'Lawal ', 'Olayinka Lawal', NULL, '9038702603', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:00'),
(661, 'BLCN/0661', 'Olayioye', 'Oluwaferanmi Theophilus', 'Olayioye Oluwaferanmi Theophilus', NULL, '7082489052', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:00'),
(662, 'BLCN/0662', 'Olododo', 'Sarah ', 'Olododo Sarah', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(663, 'BLCN/0663', 'Olorunshola', 'Segun ', 'Olorunshola Segun', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(664, 'BLCN/0664', 'Oloyede', 'Abdulganiyu ', 'Oloyede Abdulganiyu', NULL, '8084351648', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(665, 'BLCN/0665', 'Oluwabukola', 'Ogunniyi ', 'Oluwabukola Ogunniyi', NULL, '8052154571', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(666, 'BLCN/0666', 'Oluwafemi', 'Ola ', 'Oluwafemi Ola', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(667, 'BLCN/0667', 'Oluwasegun', 'Omotoye ', 'Oluwasegun Omotoye', NULL, '8067852951', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(668, 'BLCN/0668', 'Oluwatoba', 'Olalekan Micheal', 'Oluwatoba Olalekan Micheal', NULL, '7039953386', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(669, 'BLCN/0669', 'Oluwatobi', 'Adewola ', 'Oluwatobi Adewola', NULL, '9160756080', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(670, 'BLCN/0670', 'Omodaralekan', 'Abiodun ', 'Omodaralekan Abiodun', NULL, '8167799557', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(671, 'BLCN/0671', 'Omokafe', 'Esther ', 'Omokafe Esther', NULL, '9034740526', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(672, 'BLCN/0672', 'Omokafe', 'George ', 'Omokafe George', NULL, '7038552979', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(673, 'BLCN/0673', 'Omokafe', 'Samuel ', 'Omokafe Samuel', NULL, '7035406501', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:01'),
(674, 'BLCN/0674', 'Omolara', 'Omosola Sunday', 'Omolara Omosola Sunday', NULL, '8135091063', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:02'),
(675, 'BLCN/0675', 'Omotayo', 'Opeyemi ', 'Omotayo Opeyemi', NULL, '8162182708', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:02'),
(676, 'BLCN/0676', 'Omotola', 'Sumayah ', 'Omotola Sumayah', NULL, '8146271559', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:02'),
(677, 'BLCN/0677', 'Omotosho', 'Shola ', 'Omotosho Shola', NULL, '8032559636', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:03'),
(678, 'BLCN/0678', 'Omozopia', 'Blessing ', 'Omozopia Blessing', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:03'),
(679, 'BLCN/0679', 'Onanuga', 'Ibrahim ', 'Onanuga Ibrahim', NULL, '9153637448', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:03'),
(680, 'BLCN/0680', 'Oni', 'Eniola ', 'Oni Eniola', NULL, '8165337729', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:03'),
(681, 'BLCN/0681', 'Oni', 'Oyindamola ', 'Oni Oyindamola', NULL, '9031149082', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:03'),
(682, 'BLCN/0682', 'Onifade', 'Opeyemi ', 'Onifade Opeyemi', NULL, '8122448667', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:03'),
(683, 'BLCN/0683', 'Onimago', 'Hussein ', 'Onimago Hussein', NULL, '8067901663', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:03'),
(684, 'BLCN/0684', 'Onimole', 'Iyanuoluwa ', 'Onimole Iyanuoluwa', NULL, '8140167180', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:03'),
(685, 'BLCN/0685', 'Onokpise', 'Deborah ', 'Onokpise Deborah', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:03'),
(686, 'BLCN/0686', 'Opadiran', 'Risikat ', 'Opadiran Risikat', NULL, '8032097168', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:04'),
(687, 'BLCN/0687', 'Opeyemi', 'Deborah ', 'Opeyemi Deborah', NULL, '9058854399', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(688, 'BLCN/0688', 'Opeyemi', 'Zainab ', 'Opeyemi Zainab', NULL, '9078525996', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(689, 'BLCN/0689', 'Oriyomi', 'Ayomide ', 'Oriyomi Ayomide', NULL, '8167289091', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(690, 'BLCN/0690', 'Oshatimi', 'Samuel Omoniyi', 'Oshatimi Samuel Omoniyi', NULL, '7035224602', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(691, 'BLCN/0691', 'Oshinawo', 'Bashirudeen ', 'Oshinawo Bashirudeen', NULL, '8026247201', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(692, 'BLCN/0692', 'Osiki', 'Godfrey ', 'Osiki Godfrey', NULL, '8032403287', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(693, 'BLCN/0693', 'Osinubi', 'Omobola ', 'Osinubi Omobola', NULL, '8035070515', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(694, 'BLCN/0694', 'Owolabi', 'Iyabo ', 'Owolabi Iyabo', NULL, '8136270342', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(695, 'BLCN/0695', 'Owolabi', 'Saheed ', 'Owolabi Saheed', NULL, '8063090830', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(696, 'BLCN/0696', 'Owolabi', 'Toafeek ', 'Owolabi Toafeek', NULL, '8091501410', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(697, 'BLCN/0697', 'Owootomo', 'Ayanfe ', 'Owootomo Ayanfe', NULL, '7033705256', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(698, 'BLCN/0698', 'Owoseni', 'Ruth ', 'Owoseni Ruth', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(699, 'BLCN/0699', 'Owoyemi', 'Sharafadeen ', 'Owoyemi Sharafadeen', NULL, '8064196881', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:05'),
(700, 'BLCN/0700', 'Oyakale', 'Olaoluwa ', 'Oyakale Olaoluwa', NULL, '9058908666', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:06'),
(701, 'BLCN/0701', 'Oyebo', 'Abdulhamid ', 'Oyebo Abdulhamid', NULL, '8148738864', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:06'),
(702, 'BLCN/0702', 'Oyebode', 'Sodiq ', 'Oyebode Sodiq', NULL, '9032373214', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:06'),
(703, 'BLCN/0703', 'Oyedepo', 'Michael ', 'Oyedepo Michael', NULL, '9035975902', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:06'),
(704, 'BLCN/0704', 'Oyedokun', 'Rofiat ', 'Oyedokun Rofiat', NULL, '8169164205', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:06'),
(705, 'BLCN/0705', 'Oyekola', 'Habeeb ', 'Oyekola Habeeb', NULL, '9037852254', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:06'),
(706, 'BLCN/0706', 'Oyekunle', 'Abimbola ', 'Oyekunle Abimbola', NULL, '9055863295', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:06'),
(707, 'BLCN/0707', 'Oyelade', 'Oyeyemi ', 'Oyelade Oyeyemi', NULL, '8104625808', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:06'),
(708, 'BLCN/0708', 'Oyeneye', 'Afeez ', 'Oyeneye Afeez', NULL, '8139516157', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:06'),
(709, 'BLCN/0709', 'Oyeniyi', 'Pelumi ', 'Oyeniyi Pelumi', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:06'),
(710, 'BLCN/0710', 'Oyerinde', 'Abdulazeez ', 'Oyerinde Abdulazeez', NULL, '9068455576', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:06'),
(711, 'BLCN/0711', 'Oyetoro', 'Usman ', 'Oyetoro Usman', NULL, '9073836387', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:07'),
(712, 'BLCN/0712', 'Oyewo', 'Shakirat ', 'Oyewo Shakirat', NULL, '8138991751', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:07'),
(713, 'BLCN/0713', 'Oyewole', 'Bisi ', 'Oyewole Bisi', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:07'),
(714, 'BLCN/0714', 'Oyeyiola', 'Abdulmalik ', 'Oyeyiola Abdulmalik', NULL, '7010009457', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:07'),
(715, 'BLCN/0715', 'Oyeyiola', 'Modinat ', 'Oyeyiola Modinat', NULL, '8038359624', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:08'),
(716, 'BLCN/0716', 'Oyinlola', 'Bashir ', 'Oyinlola Bashir', NULL, '8096504862', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:08'),
(717, 'BLCN/0717', 'Pada', 'Sanni ', 'Pada Sanni', NULL, '7064571264', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:08'),
(718, 'BLCN/0718', 'Pelumi', 'Oyeniyi ', 'Pelumi Oyeniyi', NULL, '7013201732', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:08'),
(719, 'BLCN/0719', 'Peter', 'Oluwabunmi ', 'Peter Oluwabunmi', NULL, '9061235640', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:08'),
(720, 'BLCN/0720', 'Pomi', 'Yohanna ', 'Pomi Yohanna', NULL, '0', '', '', 1, NULL, NULL, NULL, NULL, 'no', '', 'active', NULL, '2024-12-07 13:45:08'),
(721, 'BLCN/0721', 'Ogunniran', 'Mary Adetoro', 'Ogunniran Mary Adetoro', '2014-12-12 14:17:21', '08166831174', '', 'female', 1, 5, '2024-12-09 09:30:28', NULL, 'Crescent', 'no', '', 'active', NULL, '2024-12-14 14:29:41'),
(722, 'BLCN/0722', 'Desmond', 'Mary Adetoro', 'Desmond Mary Adetoro', '1994-12-10 17:32:45', '08166831174', '', 'male', 1, 3, '2024-12-10 16:33:30', NULL, '', 'no', '', 'active', NULL, '2024-12-31 14:53:48'),
(723, 'BLCN/0723', 'Salmon ', 'Kaothar ', 'Salmon  Kaothar ', '2024-12-11 09:14:01', '08166831174', '', 'female', 0, NULL, NULL, NULL, 'Crescent', 'no', '', 'active', NULL, NULL),
(724, 'BLCN/0724', 'Ibrahim', 'Afusat', 'Ibrahim Afusat', '2024-12-11 09:16:12', '08166831174', '', 'female', 0, NULL, NULL, NULL, 'Crescent', 'no', '', 'active', NULL, NULL),
(725, 'BLCN/0725', 'Kingsley ', 'Chukwu', 'Kingsley  Chukwu', '2021-12-11 09:17:54', '07089534065', '', 'male', 0, NULL, NULL, NULL, 'Crescent', 'no', '', 'active', NULL, '2024-12-31 14:59:15'),
(726, 'BLCN/0726', 'taiwo ', 'kehinde', 'taiwo  kehinde', '2016-12-14 14:57:14', '08906876543', '', 'female', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(727, 'BLCN/0727', 'Suleiman ', 'Maryam', 'Suleiman  Maryam', '1995-01-19 10:16:07', '08185334553', '', 'female', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(728, 'BLCN/0728', 'Olufenka', 'Samuel', 'Olufenka Samuel', '1995-01-03 09:55:52', '08166831174', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(729, 'BLCN/0729', 'Isiaq', 'Sofihullahi', 'Isiaq Sofihullahi', '1993-01-28 08:43:37', '09036458711', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(730, 'BLCN/0730', 'Adetunji', 'Teslim', 'Adetunji Teslim', '2001-01-09 10:27:05', '09045687532', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(731, 'BLCN/0731', 'Adetunji', 'Teslim', 'Adetunji Teslim', '1997-01-14 08:59:34', '08094837533', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(732, 'BLCN/0732', 'Abdulsemiu ', 'Ridwan', 'Abdulsemiu  Ridwan', '2001-01-14 09:02:54', '09067543214', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(733, 'BLCN/0733', 'Ajomale', 'Ayoola', 'Ajomale Ayoola', '2001-01-14 09:09:43', '09034588198', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(734, 'BLCN/0734', 'Olayiwola ', 'Ola', 'Olayiwola  Ola', '1995-01-14 09:11:24', '09137871442', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(735, 'BLCN/0735', 'Abdulganiyu', 'Suleiman', 'Abdulganiyu Suleiman', '2006-01-15 13:35:50', '09077968897', '', 'male', 0, NULL, NULL, NULL, 'Crescent', 'no', '', 'active', NULL, NULL),
(736, 'BLCN/0736', 'Sikirullahi', 'Abdulrasaq', 'Sikirullahi Abdulrasaq', '1999-01-15 15:18:39', '09138451510', '', 'male', 0, NULL, NULL, NULL, 'Crescent', 'no', '', 'active', NULL, NULL),
(737, 'BLCN/0737', 'Taofeeq', 'Abdulrasaq', 'Taofeeq Abdulrasaq', '2006-01-20 08:41:15', '08143389866', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(738, 'BLCN/0738', 'Taofeeq', 'Ridwan', 'Taofeeq Ridwan', '2007-01-20 08:44:31', '08129525126', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(739, 'BLCN/0739', 'Love ', 'Precious Omeiza', 'Love  Precious Omeiza', '1990-01-20 15:10:14', '07025128464', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(740, 'BLCN/0740', 'Akanbi', 'Oluwaseun', 'Akanbi Oluwaseun', '1998-01-27 12:20:43', '08106303783', '', 'female', 0, NULL, NULL, NULL, 'bloodlink', 'no', '', 'active', NULL, NULL),
(741, 'BLCN/0741', 'Isia', 'Idowu', 'Isia Idowu', '1990-01-29 13:28:34', '09060575333', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(742, 'BLCN/0742', 'Amos', 'Samson', 'Amos Samson', '1995-01-29 17:01:18', '07026223651', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(743, 'BLCN/0743', 'Adefisayo', 'Mark', 'Adefisayo Mark', '1999-02-04 15:25:18', '09065623098', '', 'male', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(744, 'BLCN/0744', 'Nahimah', 'Idris', 'Nahimah Idris', '2004-02-05 11:34:02', '07082866135', '', 'female', 0, NULL, NULL, NULL, 'Bloodlink ', 'no', '', 'active', NULL, NULL),
(745, 'BLCN/0745', 'Tsado', 'Amos', 'Tsado Amos', '1979-02-13 10:16:43', '08032574730', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(746, 'BLCN/0746', 'Oguniyi', 'Ayoola', 'Oguniyi Ayoola', '1995-02-13 12:22:35', '08103030121', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(747, 'BLCN/0747', 'Emeriewen', 'Michael', 'Emeriewen Michael', '1996-02-20 11:55:12', '08154796082', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(748, 'BLCN/0748', 'Maryleeeee', 'Johnbull', 'Maryleeeee Johnbull', '2022-02-20 15:39:46', '09087654324', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(749, 'BLCN/0749', 'Hamodu ', 'Fatiu', 'Hamodu  Fatiu', '2004-02-26 14:38:08', '09137732846', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(750, 'BLCN/0750', 'Salman', 'Ismail', 'Salman Ismail', '2002-02-26 14:42:30', '07037353312', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(751, 'BLCN/0751', 'Hamodu', 'Abduljelili', 'Hamodu Abduljelili', '2005-02-26 14:44:23', '09162824672', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(752, 'BLCN/0752', 'Inioluwa', 'Oluwapelumi', 'Inioluwa Oluwapelumi', '2006-03-04 14:28:20', '08127709462', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(753, 'BLCN/0753', 'Adeoye', 'Michae', 'Adeoye Michae', '1996-03-05 16:57:24', '09039782404', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(754, 'BLCN/0754', 'Ahmeed ', 'Tesleem', 'Ahmeed  Tesleem', '2003-03-17 14:54:55', '08022866569', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(755, 'BLCN/0755', 'Alao', 'Damola', 'Alao Damola', '2025-03-28 13:40:08', '09083467809', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(756, 'BLCN/0756', 'Ayodele', 'Elijah', 'Ayodele Elijah', '2025-03-28 13:42:03', '07035670153', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(757, 'BLCN/0757', 'Kabira ', 'Ayoka', 'Kabira  Ayoka', '2002-07-16 13:24:00', '08166831174', '', 'female', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(758, 'BLCN/0758', 'Precious', 'Asegbe', 'Precious Asegbe', '2005-06-16 14:42:05', '08029005206', '', 'female', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(759, 'BLCN/0759', 'Nuhu', 'Dupe', 'Nuhu Dupe', '1970-02-11 14:10:12', '08037127124', '', 'female', 0, NULL, NULL, NULL, 'Phoenix Hospital', 'no', '', 'active', NULL, NULL),
(760, 'BLCN/0760', 'Hassan', 'Mariam', 'Hassan Mariam', '1996-02-12 16:34:14', '08142682013', '', 'female', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(761, 'BLCN/0761', 'Abdullahi ', 'Mustapha', 'Abdullahi  Mustapha', '1999-02-14 14:26:55', '08185334553', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(762, 'BLCN/0762', 'Abdulraheem', 'Murtala', 'Abdulraheem Murtala', '2022-02-14 14:48:58', '07039395438', '', 'male', 0, NULL, NULL, NULL, '', 'no', '', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment_reversion`
--

CREATE TABLE `customer_payment_reversion` (
  `sn` int(10) NOT NULL,
  `ticket_no` varchar(30) DEFAULT NULL,
  `reverse_type` enum('processed','created') DEFAULT NULL,
  `rev_by` varchar(50) DEFAULT NULL,
  `date_rev` date DEFAULT NULL,
  `time_rev` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_specimen`
--

CREATE TABLE `customer_specimen` (
  `sn` bigint(20) NOT NULL,
  `customer_id` varchar(30) DEFAULT NULL,
  `custom_ticket_id` int(10) DEFAULT NULL,
  `order_type` enum('perform_test','buy_blood','donate_blood') DEFAULT NULL,
  `bill_type_id` varchar(10) NOT NULL,
  `blood_type_id` varchar(10) DEFAULT NULL,
  `patient_blood_type_id` tinyint(3) DEFAULT NULL,
  `blood_compatibility` enum('Compatible','Not Compatible') DEFAULT NULL,
  `blood_cross_matching` enum('Emergency','Routine') DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `blood_stock_id` bigint(20) DEFAULT NULL,
  `fit_for_donation` enum('yes','no') DEFAULT NULL,
  `bill_price` varchar(32) DEFAULT NULL,
  `ticket_no` varchar(30) DEFAULT NULL,
  `specimen_sample` varchar(255) DEFAULT NULL,
  `finalized` enum('yes','no') NOT NULL DEFAULT 'no',
  `donation_date` timestamp NULL DEFAULT NULL,
  `process_completed` enum('no','yes') DEFAULT 'no',
  `to_modify` enum('yes','no') DEFAULT 'no',
  `comment` text DEFAULT '',
  `blood_purchase_report` longtext DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(50) DEFAULT NULL,
  `date_c` timestamp NULL DEFAULT NULL,
  `date_perform` timestamp NULL DEFAULT NULL,
  `upd_by` varchar(50) DEFAULT NULL,
  `date_upd` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `time_upd` time DEFAULT NULL,
  `time_del` varchar(32) DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_specimen`
--

INSERT INTO `customer_specimen` (`sn`, `customer_id`, `custom_ticket_id`, `order_type`, `bill_type_id`, `blood_type_id`, `patient_blood_type_id`, `blood_compatibility`, `blood_cross_matching`, `qty`, `blood_stock_id`, `fit_for_donation`, `bill_price`, `ticket_no`, `specimen_sample`, `finalized`, `donation_date`, `process_completed`, `to_modify`, `comment`, `blood_purchase_report`, `status`, `c_by`, `date_c`, `date_perform`, `upd_by`, `date_upd`, `time_upd`, `time_del`, `time_c`, `del_by`, `date_del`) VALUES
(1, 'BLCN/0374', 2, 'donate_blood', '', '3', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/24/0001', 'blood', 'yes', '2024-03-13 14:43:03', 'yes', 'no', 'Donated', NULL, 'active', 'Shemmy0002', '2024-12-07 14:43:31', NULL, NULL, '2024-12-07 14:54:03', NULL, NULL, NULL, NULL, NULL),
(2, 'BLCN/0365', 3, 'buy_blood', '', '3', NULL, NULL, NULL, 1, 1, NULL, '15000', 'BHC/24/0002', NULL, 'yes', NULL, 'yes', 'no', '', NULL, 'active', 's6068', NULL, '2024-12-06 23:00:00', NULL, '2024-12-07 15:03:46', NULL, NULL, NULL, NULL, NULL),
(3, 'BLCN/0721', 4, 'donate_blood', '', '5', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/24/0003', 'blood', 'yes', '2024-12-09 09:30:28', 'yes', 'no', '', NULL, 'active', 'Shemmy0002', '2024-12-09 09:30:44', NULL, NULL, '2024-12-14 14:30:04', NULL, NULL, NULL, NULL, NULL),
(4, 'BLCN/0722', 7, 'donate_blood', '', '3', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/24/0004', 'blood', 'yes', '2024-12-10 16:33:30', 'yes', 'no', '', NULL, 'active', 'Shemmy0002', '2024-12-10 16:33:43', NULL, NULL, '2024-12-31 14:54:03', NULL, NULL, NULL, NULL, NULL),
(5, 'BLCN/0725', 10, 'perform_test', '137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000', 'BHC/24/0005', 'Blood', 'yes', NULL, 'yes', 'no', '', NULL, 'active', 'Shemmy0002', '2024-12-11 08:18:35', '2024-12-30 23:00:00', NULL, '2024-12-31 14:56:05', NULL, NULL, NULL, NULL, NULL),
(6, 'BLCN/0726', 11, 'perform_test', '132', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3000', 'BHC/24/0006', 'Blood', 'yes', NULL, 'yes', 'no', '', NULL, 'active', 'shemmy0002', '2024-12-14 14:08:27', '2024-12-30 23:00:00', NULL, '2026-02-09 14:18:43', NULL, NULL, NULL, NULL, NULL),
(7, 'BLCN/0726', 11, 'perform_test', '213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5000', 'BHC/24/0006', 'Blood', 'yes', NULL, 'yes', 'no', '', NULL, 'active', 'shemmy0002', '2024-12-14 14:10:38', '2024-12-30 23:00:00', NULL, '2026-02-09 14:18:43', NULL, NULL, NULL, NULL, NULL),
(8, 'BLCN/0726', 11, 'perform_test', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000', 'BHC/24/0006', 'Blood', 'yes', NULL, 'yes', 'no', '', NULL, 'active', 'shemmy0002', '2024-12-14 14:11:12', '2026-02-08 23:00:00', NULL, '2026-02-09 14:18:43', NULL, NULL, NULL, NULL, NULL),
(9, 'BLCN/0438', 12, 'perform_test', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000', 'BHC/24/0007', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 's6068', '2024-12-14 17:03:24', NULL, NULL, '2024-12-14 17:03:33', NULL, NULL, NULL, NULL, NULL),
(10, 'BLCN/0728', 14, 'perform_test', '37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1000', 'BHC/25/0001', 'Blood', 'yes', NULL, 'yes', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-04 08:57:51', '2025-01-03 23:00:00', NULL, '2025-01-04 09:42:12', NULL, NULL, NULL, NULL, NULL),
(11, 'BLCN/0728', 14, 'perform_test', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500', 'BHC/25/0001', 'Blood', 'yes', NULL, 'yes', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-04 08:58:17', '2025-01-03 23:00:00', NULL, '2025-01-04 09:42:12', NULL, NULL, NULL, NULL, NULL),
(12, 'BLCN/0466', 16, 'donate_blood', '', '7', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0002', 'blood', 'yes', '2025-01-05 09:25:56', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-09 09:26:13', NULL, NULL, '2025-01-09 09:26:21', NULL, NULL, NULL, NULL, NULL),
(13, 'BLCN/0729', 15, 'donate_blood', '', '7', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0003', 'blood', 'yes', '2025-01-05 07:56:39', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-14 07:56:46', NULL, NULL, '2025-01-14 07:56:57', NULL, NULL, NULL, NULL, NULL),
(14, 'BLCN/0731', 18, 'donate_blood', '', '7', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0003', 'blood', 'yes', '2025-01-07 08:00:24', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-14 08:01:21', NULL, NULL, '2025-01-14 08:01:30', NULL, NULL, NULL, NULL, NULL),
(15, 'BLCN/0732', 19, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0004', 'blood', 'yes', '2025-01-07 08:07:53', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-14 08:08:10', NULL, NULL, '2025-01-14 08:08:43', NULL, NULL, NULL, NULL, NULL),
(16, 'BLCN/0734', 21, 'donate_blood', '', '3', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'blood', 'no', '2025-01-10 08:13:00', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-14 08:16:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'BLCN/0735', 22, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'blood', 'no', '2025-01-15 12:37:02', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-15 12:37:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'BLCN/0736', 23, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'blood', 'no', '2025-01-15 14:25:57', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-15 14:26:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'BLCN/0737', 24, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'blood', 'no', '2025-01-19 07:43:29', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-20 07:43:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'BLCN/0738', 25, 'donate_blood', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'blood', 'no', '2025-01-19 07:45:26', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-20 07:45:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'BLCN/0739', 26, 'donate_blood', '', '7', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'blood', 'no', '2025-01-20 14:11:57', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-20 14:12:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'BLCN/0740', 27, 'donate_blood', '', '3', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'blood', 'no', '2025-01-27 11:22:41', 'no', 'no', '', NULL, 'inactive', 'shemmy0002', '2025-01-27 11:22:44', NULL, NULL, '2025-01-27 11:23:12', NULL, '11:23:12', NULL, 'shemmy0002', '2025-01-27'),
(23, 'BLCN/0740', 27, 'donate_blood', '', '4', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0005', 'blood', 'yes', '2025-01-27 11:23:24', 'no', 'no', '', NULL, 'active', 'shemmy0002', '2025-01-27 11:23:28', NULL, NULL, '2025-01-27 11:23:33', NULL, NULL, NULL, NULL, NULL),
(24, 'BLCN/0741', 28, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'blood', 'no', '2025-01-29 12:29:29', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-29 12:29:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'BLCN/0742', 29, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'blood', 'no', '2025-01-29 16:02:05', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-01-29 16:02:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'BLCN/0743', 30, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0006', 'blood', 'yes', '2025-02-04 14:26:36', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-02-04 14:26:39', NULL, NULL, '2025-02-04 14:26:45', NULL, NULL, NULL, NULL, NULL),
(27, 'BLCN/0744', 31, 'donate_blood', '', '3', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0007', 'blood', 'yes', '2025-02-05 10:36:18', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-02-05 10:36:22', NULL, NULL, '2025-02-05 10:36:29', NULL, NULL, NULL, NULL, NULL),
(28, 'BLCN/0745', 32, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'blood', 'no', '2025-02-13 09:18:09', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-02-13 09:18:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'BLCN/0746', 33, 'donate_blood', '', '3', NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, 'blood', 'no', '2025-02-13 11:24:14', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-02-13 11:24:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'BLCN/0747', 34, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0008', 'blood', 'yes', '2025-02-20 10:56:12', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-02-20 10:56:15', NULL, NULL, '2025-02-20 10:56:23', NULL, NULL, NULL, NULL, NULL),
(31, 'BLCN/0749', 37, 'donate_blood', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0009', 'blood', 'yes', '2025-02-25 13:40:00', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-02-26 13:41:45', NULL, NULL, '2025-02-26 13:41:53', NULL, NULL, NULL, NULL, NULL),
(32, 'BLCN/0750', 38, 'donate_blood', '', '3', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0010', 'blood', 'yes', '2025-02-25 13:43:20', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-02-26 13:43:26', NULL, NULL, '2025-02-26 13:43:30', NULL, NULL, NULL, NULL, NULL),
(33, 'BLCN/0751', 39, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0011', 'blood', 'yes', '2025-02-25 13:46:50', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-02-26 13:46:55', NULL, NULL, '2025-02-26 13:47:04', NULL, NULL, NULL, NULL, NULL),
(34, 'BLCN/0752', 40, 'donate_blood', '', '2', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0012', 'blood', 'yes', '2025-03-04 13:30:06', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-03-04 13:30:10', NULL, NULL, '2025-03-04 13:30:14', NULL, NULL, NULL, NULL, NULL),
(35, 'BLCN/0753', 41, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0013', 'blood', 'yes', '2025-03-05 15:58:38', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-03-05 15:58:41', NULL, NULL, '2025-03-05 15:58:53', NULL, NULL, NULL, NULL, NULL),
(36, 'BLCN/0754', 42, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/25/0014', 'blood', 'yes', '2025-03-17 13:56:10', 'no', 'no', '', NULL, 'active', 'Shemmy0002', '2025-03-17 13:56:13', NULL, NULL, '2025-03-17 13:56:19', NULL, NULL, NULL, NULL, NULL),
(37, 'BLCN/0757', 45, 'perform_test', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:35:46', NULL, NULL, '2026-02-10 14:32:58', NULL, '14:32:58', NULL, 'desmondjohn', '2026-02-10'),
(38, 'BLCN/0757', 45, 'perform_test', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5000', 'BHC/26/0003', 'BLOOD', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'Desmondjohn', '2026-02-09 16:36:01', NULL, NULL, '2026-02-10 14:35:53', NULL, NULL, NULL, NULL, NULL),
(39, 'BLCN/0757', 45, 'perform_test', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1500', 'BHC/26/0003', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'Desmondjohn', '2026-02-09 16:36:09', '2026-02-09 23:00:00', NULL, '2026-02-10 14:44:29', NULL, NULL, NULL, NULL, NULL),
(40, 'BLCN/0757', 45, 'perform_test', '37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000', 'BHC/26/0003', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'Desmondjohn', '2026-02-09 16:36:10', '2026-02-09 23:00:00', NULL, '2026-02-10 14:44:03', NULL, NULL, NULL, NULL, NULL),
(41, 'BLCN/0757', 45, 'perform_test', '38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1200', 'BHC/26/0003', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'Desmondjohn', '2026-02-09 16:36:12', NULL, NULL, '2026-02-10 14:35:53', NULL, NULL, NULL, NULL, NULL),
(42, 'BLCN/0757', 45, 'perform_test', '65', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:18', NULL, NULL, '2026-02-10 14:32:16', NULL, '14:32:16', NULL, 'desmondjohn', '2026-02-10'),
(43, 'BLCN/0757', 45, 'perform_test', '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1000', 'BHC/26/0003', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'Desmondjohn', '2026-02-09 16:36:21', NULL, NULL, '2026-02-10 14:35:53', NULL, NULL, NULL, NULL, NULL),
(44, 'BLCN/0757', 45, 'perform_test', '67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:23', NULL, NULL, '2026-02-10 14:32:21', NULL, '14:32:21', NULL, 'desmondjohn', '2026-02-10'),
(45, 'BLCN/0757', 45, 'perform_test', '68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1200', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:25', NULL, NULL, '2026-02-10 14:32:29', NULL, '14:32:29', NULL, 'desmondjohn', '2026-02-10'),
(46, 'BLCN/0757', 45, 'perform_test', '69', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', 'BHC/26/0003', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'Desmondjohn', '2026-02-09 16:36:28', NULL, NULL, '2026-02-10 14:35:53', NULL, NULL, NULL, NULL, NULL),
(47, 'BLCN/0757', 45, 'perform_test', '98', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:32', NULL, NULL, '2026-02-10 14:32:38', NULL, '14:32:38', NULL, 'desmondjohn', '2026-02-10'),
(48, 'BLCN/0757', 45, 'perform_test', '99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:33', NULL, NULL, '2026-02-10 14:33:08', NULL, '14:33:08', NULL, 'desmondjohn', '2026-02-10'),
(49, 'BLCN/0757', 45, 'perform_test', '115', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:36', NULL, NULL, '2026-02-10 14:32:47', NULL, '14:32:47', NULL, 'desmondjohn', '2026-02-10'),
(50, 'BLCN/0757', 45, 'perform_test', '117', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:38', NULL, NULL, '2026-02-10 14:33:14', NULL, '14:33:14', NULL, 'desmondjohn', '2026-02-10'),
(51, 'BLCN/0757', 45, 'perform_test', '134', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:39', NULL, NULL, '2026-02-10 14:33:22', NULL, '14:33:22', NULL, 'desmondjohn', '2026-02-10'),
(52, 'BLCN/0757', 45, 'perform_test', '135', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:40', NULL, NULL, '2026-02-10 14:33:32', NULL, '14:33:32', NULL, 'desmondjohn', '2026-02-10'),
(53, 'BLCN/0757', 45, 'perform_test', '136', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:42', NULL, NULL, '2026-02-10 14:34:12', NULL, '14:34:12', NULL, 'desmondjohn', '2026-02-10'),
(54, 'BLCN/0757', 45, 'perform_test', '137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:46', NULL, NULL, '2026-02-10 14:33:39', NULL, '14:33:39', NULL, 'desmondjohn', '2026-02-10'),
(55, 'BLCN/0757', 45, 'perform_test', '142', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:48', NULL, NULL, '2026-02-10 14:34:23', NULL, '14:34:23', NULL, 'desmondjohn', '2026-02-10'),
(56, 'BLCN/0757', 45, 'perform_test', '193', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5500', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:49', NULL, NULL, '2026-02-10 14:33:46', NULL, '14:33:46', NULL, 'desmondjohn', '2026-02-10'),
(57, 'BLCN/0757', 45, 'perform_test', '195', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4500', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:52', NULL, NULL, '2026-02-10 14:33:50', NULL, '14:33:50', NULL, 'desmondjohn', '2026-02-10'),
(58, 'BLCN/0757', 45, 'perform_test', '196', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4500', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:36:56', NULL, NULL, '2026-02-10 14:34:28', NULL, '14:34:28', NULL, 'desmondjohn', '2026-02-10'),
(59, 'BLCN/0757', 45, 'perform_test', '204', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '15000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:02', NULL, NULL, '2026-02-10 14:34:36', NULL, '14:34:36', NULL, 'desmondjohn', '2026-02-10'),
(60, 'BLCN/0757', 45, 'perform_test', '209', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5500', 'BHC/26/0003', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'Desmondjohn', '2026-02-09 16:37:09', NULL, NULL, '2026-02-10 14:35:53', NULL, NULL, NULL, NULL, NULL),
(61, 'BLCN/0757', 45, 'perform_test', '223', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5000', 'BHC/26/0003', 'BLOOD', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'Desmondjohn', '2026-02-09 16:37:10', '2026-02-09 23:00:00', NULL, '2026-02-10 14:41:17', NULL, NULL, NULL, NULL, NULL),
(62, 'BLCN/0757', 45, 'perform_test', '224', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:11', NULL, NULL, '2026-02-10 14:34:44', NULL, '14:34:44', NULL, 'desmondjohn', '2026-02-10'),
(63, 'BLCN/0757', 45, 'perform_test', '225', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30000', NULL, 'BLOOD', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:13', NULL, NULL, '2026-02-10 14:34:49', NULL, '14:34:49', NULL, 'desmondjohn', '2026-02-10'),
(64, 'BLCN/0757', 45, 'perform_test', '227', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7500', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:15', NULL, NULL, '2026-02-10 14:34:56', NULL, '14:34:56', NULL, 'desmondjohn', '2026-02-10'),
(65, 'BLCN/0757', 45, 'perform_test', '228', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:16', NULL, NULL, '2026-02-10 14:35:02', NULL, '14:35:02', NULL, 'desmondjohn', '2026-02-10'),
(66, 'BLCN/0757', 45, 'perform_test', '229', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:17', NULL, NULL, '2026-02-10 14:35:07', NULL, '14:35:07', NULL, 'desmondjohn', '2026-02-10'),
(67, 'BLCN/0757', 45, 'perform_test', '230', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '10000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:19', NULL, NULL, '2026-02-10 14:35:15', NULL, '14:35:15', NULL, 'desmondjohn', '2026-02-10'),
(68, 'BLCN/0757', 45, 'perform_test', '231', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '25000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:21', NULL, NULL, '2026-02-10 14:35:18', NULL, '14:35:18', NULL, 'desmondjohn', '2026-02-10'),
(69, 'BLCN/0757', 45, 'perform_test', '236', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:27', NULL, NULL, '2026-02-10 14:32:03', NULL, '14:32:03', NULL, 'desmondjohn', '2026-02-10'),
(70, 'BLCN/0757', 45, 'perform_test', '234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '8000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:29', NULL, NULL, '2026-02-10 14:31:59', NULL, '14:31:59', NULL, 'desmondjohn', '2026-02-10'),
(71, 'BLCN/0757', 45, 'perform_test', '233', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:30', NULL, NULL, '2026-02-10 14:31:54', NULL, '14:31:54', NULL, 'desmondjohn', '2026-02-10'),
(72, 'BLCN/0757', 45, 'perform_test', '232', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '27000', NULL, 'Blood', 'no', NULL, 'no', 'no', '', NULL, 'inactive', 'Desmondjohn', '2026-02-09 16:37:33', NULL, NULL, '2026-02-10 14:31:42', NULL, '14:31:42', NULL, 'desmondjohn', '2026-02-10'),
(73, 'BLCN/0489', 47, 'perform_test', '34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', 'BHC/26/0001', 'Blood', 'yes', NULL, 'yes', 'no', '', NULL, 'active', 'Desmondjohn', '2026-02-09 16:39:52', '2026-02-08 23:00:00', NULL, '2026-02-09 16:44:05', NULL, NULL, NULL, NULL, NULL),
(74, 'BLCN/0732', 48, 'perform_test', '237', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1500', 'BHC/26/0002', 'Blood', 'yes', NULL, 'yes', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-09 17:10:23', '2026-02-08 23:00:00', NULL, '2026-02-09 17:13:54', NULL, NULL, NULL, NULL, NULL),
(75, 'BLCN/0759', 49, 'perform_test', '236', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', 'BHC/26/0003', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-11 13:14:52', NULL, NULL, '2026-02-11 13:30:49', NULL, NULL, NULL, NULL, NULL),
(76, 'BLCN/0759', 49, 'perform_test', '115', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', 'BHC/26/0003', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-11 13:15:54', NULL, NULL, '2026-02-11 13:30:49', NULL, NULL, NULL, NULL, NULL),
(77, 'BLCN/0759', 49, 'perform_test', '36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1500', 'BHC/26/0003', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-11 13:16:11', NULL, NULL, '2026-02-11 13:30:49', NULL, NULL, NULL, NULL, NULL),
(78, 'BLCN/0759', 49, 'perform_test', '175', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5000', 'BHC/26/0003', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-11 13:30:05', NULL, NULL, '2026-02-11 13:30:49', NULL, NULL, NULL, NULL, NULL),
(79, 'BLCN/0760', 50, 'donate_blood', '', '6', NULL, NULL, NULL, NULL, NULL, NULL, '0', 'BHC/26/0004', 'blood', 'yes', '2026-02-12 15:35:15', 'no', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-12 15:35:26', NULL, NULL, '2026-02-12 15:35:40', NULL, NULL, NULL, NULL, NULL),
(80, 'BLCN/0760', 51, 'perform_test', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2800', 'BHC/26/0005', 'Blood', 'yes', NULL, 'yes', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-12 15:41:08', '2026-02-11 23:00:00', NULL, '2026-02-12 15:45:11', NULL, NULL, NULL, NULL, NULL),
(81, 'BLCN/0760', 51, 'perform_test', '66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1000', 'BHC/26/0005', 'Blood', 'yes', NULL, 'yes', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-12 15:41:24', '2026-02-11 23:00:00', NULL, '2026-02-12 15:45:11', NULL, NULL, NULL, NULL, NULL),
(82, 'BLCN/0761', 52, 'perform_test', '236', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4000', 'BHC/26/0006', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-14 13:27:54', NULL, NULL, '2026-02-14 13:28:03', NULL, NULL, NULL, NULL, NULL),
(83, 'BLCN/0762', 53, 'perform_test', '137', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000', 'BHC/26/0007', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-14 13:49:37', '2026-02-13 23:00:00', NULL, '2026-02-14 13:53:49', NULL, NULL, NULL, NULL, NULL),
(84, 'BLCN/0762', 53, 'perform_test', '73', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1200', 'BHC/26/0007', 'Blood', 'yes', NULL, 'no', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-14 13:50:29', NULL, NULL, '2026-02-14 13:50:38', NULL, NULL, NULL, NULL, NULL),
(85, 'BLCN/0762', 54, 'perform_test', '15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1200', 'BHC/26/0008', 'Blood', 'yes', NULL, 'yes', 'no', '', NULL, 'active', 'desmondjohn', '2026-02-14 14:05:38', '2026-02-13 23:00:00', NULL, '2026-02-14 14:06:54', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_specimen_result`
--

CREATE TABLE `customer_specimen_result` (
  `sn` int(10) NOT NULL,
  `ticket_no` varchar(30) NOT NULL DEFAULT '',
  `bill_type_id` varchar(10) NOT NULL,
  `template_id` int(10) NOT NULL DEFAULT 0,
  `temp_type` enum('text_form','param_form') DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `raw_text_result` longtext DEFAULT NULL,
  `cur_state` enum('created','finished') DEFAULT 'created',
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `time_del` varchar(32) DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `upd_by` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `time_upd` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_specimen_result`
--

INSERT INTO `customer_specimen_result` (`sn`, `ticket_no`, `bill_type_id`, `template_id`, `temp_type`, `name`, `result`, `raw_text_result`, `cur_state`, `status`, `c_by`, `created_at`, `time_del`, `time_c`, `upd_by`, `updated_at`, `time_upd`) VALUES
(7, 'BHC/24/0005', '137', 471, 'param_form', 'WBC', '12', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:54', NULL, NULL, NULL, '2024-12-31 14:55:54', NULL),
(8, 'BHC/24/0005', '137', 472, 'param_form', 'Neutrophil #	 ', '33', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:54', NULL, NULL, NULL, '2024-12-31 14:55:54', NULL),
(9, 'BHC/24/0005', '137', 473, 'param_form', 'Lymphocyte#	 ', '55', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:54', NULL, NULL, NULL, '2024-12-31 14:55:54', NULL),
(10, 'BHC/24/0005', '137', 474, 'param_form', 'Monocyte#	 ', '66', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:54', NULL, NULL, NULL, '2024-12-31 14:55:54', NULL),
(11, 'BHC/24/0005', '137', 475, 'param_form', 'Eosinophil#	 ', '33', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:55', NULL, NULL, NULL, '2024-12-31 14:55:55', NULL),
(12, 'BHC/24/0005', '137', 476, 'param_form', 'Basophil#	 ', '22', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:55', NULL, NULL, NULL, '2024-12-31 14:55:55', NULL),
(13, 'BHC/24/0005', '137', 477, 'param_form', 'Neutrophil	', '22', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:55', NULL, NULL, NULL, '2024-12-31 14:55:55', NULL),
(14, 'BHC/24/0005', '137', 478, 'param_form', 'Lymphocyte	', '44', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:55', NULL, NULL, NULL, '2024-12-31 14:55:55', NULL),
(15, 'BHC/24/0005', '137', 479, 'param_form', 'Monocyte	 ', '44', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:55', NULL, NULL, NULL, '2024-12-31 14:55:55', NULL),
(16, 'BHC/24/0005', '137', 480, 'param_form', 'Eosinophil	 ', '55', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:55', NULL, NULL, NULL, '2024-12-31 14:55:55', NULL),
(17, 'BHC/24/0005', '137', 481, 'param_form', 'Basophil	 ', '55', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:55', NULL, NULL, NULL, '2024-12-31 14:55:55', NULL),
(18, 'BHC/24/0005', '137', 482, 'param_form', 'RBC	 ', '77', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:55', NULL, NULL, NULL, '2024-12-31 14:55:55', NULL),
(19, 'BHC/24/0005', '137', 483, 'param_form', 'HGB	 ', '43', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:55', NULL, NULL, NULL, '2024-12-31 14:55:55', NULL),
(20, 'BHC/24/0005', '137', 484, 'param_form', 'HCT/PCV	 ', '22', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:55', NULL, NULL, NULL, '2024-12-31 14:55:55', NULL),
(21, 'BHC/24/0005', '137', 485, 'param_form', 'MCV	 ', '6', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:56', NULL, NULL, NULL, '2024-12-31 14:55:56', NULL),
(22, 'BHC/24/0005', '137', 486, 'param_form', 'MCH	 ', '66', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:56', NULL, NULL, NULL, '2024-12-31 14:55:56', NULL),
(23, 'BHC/24/0005', '137', 487, 'param_form', 'MCHC	 ', '54', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:56', NULL, NULL, NULL, '2024-12-31 14:55:56', NULL),
(24, 'BHC/24/0005', '137', 488, 'param_form', 'RDW-CV	 ', '666', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:56', NULL, NULL, NULL, '2024-12-31 14:55:56', NULL),
(25, 'BHC/24/0005', '137', 489, 'param_form', 'RDW-SD	 ', '44', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:56', NULL, NULL, NULL, '2024-12-31 14:55:56', NULL),
(26, 'BHC/24/0005', '137', 490, 'param_form', 'Platelet	 ', '77', NULL, 'created', 'active', 's6068', '2024-12-31 14:55:56', NULL, NULL, NULL, '2024-12-31 14:55:56', NULL),
(27, 'BHC/24/0006', '132', 401, 'param_form', 'Sodium	', '0.5', NULL, 'created', 'active', 's6068', '2024-12-31 15:00:33', NULL, NULL, NULL, '2024-12-31 15:00:33', NULL),
(28, 'BHC/24/0006', '132', 402, 'param_form', 'Potassium	', '0.5', NULL, 'created', 'active', 's6068', '2024-12-31 15:00:33', NULL, NULL, NULL, '2024-12-31 15:00:33', NULL),
(29, 'BHC/24/0006', '132', 491, 'param_form', 'Bicarbonate', '0.5', NULL, 'created', 'active', 's6068', '2024-12-31 15:00:33', NULL, NULL, NULL, '2024-12-31 15:00:33', NULL),
(30, 'BHC/24/0006', '132', 492, 'param_form', 'Chloride', '0.5', NULL, 'created', 'active', 's6068', '2024-12-31 15:00:33', NULL, NULL, NULL, '2024-12-31 15:00:33', NULL),
(31, 'BHC/24/0006', '132', 494, 'param_form', 'Creatinine', '0.5', NULL, 'created', 'active', 's6068', '2024-12-31 15:00:33', NULL, NULL, NULL, '2024-12-31 15:00:33', NULL),
(32, 'BHC/24/0006', '132', 495, 'param_form', 'Urea', '0.5', NULL, 'created', 'active', 's6068', '2024-12-31 15:00:33', NULL, NULL, NULL, '2024-12-31 15:00:33', NULL),
(33, 'BHC/24/0006', '213', 683, 'param_form', 'Total Bilirubin', 'as stated', NULL, 'created', 'active', 's6068', '2024-12-31 15:00:56', NULL, NULL, NULL, '2024-12-31 15:00:56', NULL),
(34, 'BHC/25/0001', '36', 157, 'param_form', 'Blood Group', 'B Positive', NULL, 'created', 'active', 'Tianah', '2025-01-04 09:40:55', NULL, NULL, NULL, '2025-01-04 09:40:55', NULL),
(35, 'BHC/25/0001', '37', 156, 'param_form', 'Genotype', 'AA', NULL, 'created', 'active', 'Tianah', '2025-01-04 09:42:02', NULL, NULL, NULL, '2025-01-04 09:42:02', NULL),
(49, 'BHC/24/0006', '34', 21, 'param_form', 'WBC', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:05', NULL, NULL, NULL, '2026-02-09 14:18:05', NULL),
(50, 'BHC/24/0006', '34', 22, 'param_form', 'Lymphocyte', '1.6', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:05', NULL, NULL, NULL, '2026-02-09 14:18:05', NULL),
(51, 'BHC/24/0006', '34', 24, 'param_form', 'Granulocyte (neutrophil)', '0.3', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:05', NULL, NULL, NULL, '2026-02-09 14:18:05', NULL),
(52, 'BHC/24/0006', '34', 25, 'param_form', 'MID', '3.1', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:05', NULL, NULL, NULL, '2026-02-09 14:18:05', NULL),
(53, 'BHC/24/0006', '34', 26, 'param_form', 'HGB', '32.6', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:05', NULL, NULL, NULL, '2026-02-09 14:18:05', NULL),
(54, 'BHC/24/0006', '34', 27, 'param_form', 'RBC', '5.05', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:05', NULL, NULL, NULL, '2026-02-09 14:18:05', NULL),
(55, 'BHC/24/0006', '34', 32, 'param_form', 'HCT (PCV)', '37.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:05', NULL, NULL, NULL, '2026-02-09 14:18:05', NULL),
(56, 'BHC/24/0006', '34', 33, 'param_form', 'MCHC', '73.2', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:06', NULL, NULL, NULL, '2026-02-09 14:18:06', NULL),
(57, 'BHC/24/0006', '34', 34, 'param_form', 'MCH', '21.4', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:06', NULL, NULL, NULL, '2026-02-09 14:18:06', NULL),
(58, 'BHC/24/0006', '34', 35, 'param_form', 'MCV', '73.2', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:06', NULL, NULL, NULL, '2026-02-09 14:18:06', NULL),
(59, 'BHC/24/0006', '34', 36, 'param_form', 'RDW-CV', '12.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:06', NULL, NULL, NULL, '2026-02-09 14:18:06', NULL),
(60, 'BHC/24/0006', '34', 37, 'param_form', 'RDW-SD', '31.4', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:06', NULL, NULL, NULL, '2026-02-09 14:18:06', NULL),
(61, 'BHC/24/0006', '34', 38, 'param_form', 'Platelets', '245', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 14:18:06', NULL, NULL, NULL, '2026-02-09 14:18:06', NULL),
(62, 'BHC/26/0001', '34', 21, 'param_form', 'WBC', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(63, 'BHC/26/0001', '34', 22, 'param_form', 'Lymphocyte', '1.6', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(64, 'BHC/26/0001', '34', 24, 'param_form', 'Granulocyte (neutrophil)', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(65, 'BHC/26/0001', '34', 25, 'param_form', 'MID', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(66, 'BHC/26/0001', '34', 26, 'param_form', 'HGB', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(67, 'BHC/26/0001', '34', 27, 'param_form', 'RBC', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(68, 'BHC/26/0001', '34', 32, 'param_form', 'HCT (PCV)', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(69, 'BHC/26/0001', '34', 33, 'param_form', 'MCHC', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(70, 'BHC/26/0001', '34', 34, 'param_form', 'MCH', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(71, 'BHC/26/0001', '34', 35, 'param_form', 'MCV', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(72, 'BHC/26/0001', '34', 36, 'param_form', 'RDW-CV', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(73, 'BHC/26/0001', '34', 37, 'param_form', 'RDW-SD', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(74, 'BHC/26/0001', '34', 38, 'param_form', 'Platelets', '5.0', NULL, 'created', 'active', 'Desmondjohn', '2026-02-09 16:43:43', NULL, NULL, NULL, '2026-02-09 16:43:43', NULL),
(75, 'BHC/26/0002', '237', 717, 'param_form', 'Blood Group', 'O Positive', NULL, 'created', 'active', 'desmondjohn', '2026-02-09 17:13:16', NULL, NULL, NULL, '2026-02-09 17:13:16', NULL),
(76, 'BHC/26/0003', '223', 715, 'text_form', NULL, NULL, '<p><strong>Patient Blood Group: B Positive</strong></p>\n<p><strong>Donor Blood Group: B Positive</strong></p>\n<p><strong>Crossmatch: R</strong></p>\n<p><strong>Result: Compatible</strong></p>\n<p>&nbsp;</p>\n<p><strong>NB:</strong></p>\n<p><strong>E= Emergency</strong></p>\n<p><strong>R= Routine</strong></p>', 'created', 'active', 'desmondjohn', '2026-02-10 14:41:17', NULL, NULL, 'desmondjohn', '2026-02-10 14:42:03', NULL),
(77, 'BHC/26/0003', '37', 156, 'param_form', 'Genotype', 'AA', NULL, 'created', 'active', 'desmondjohn', '2026-02-10 14:44:03', NULL, NULL, NULL, '2026-02-10 14:44:03', NULL),
(78, 'BHC/26/0003', '36', 157, 'param_form', 'Blood Group', 'B Positive', NULL, 'created', 'active', 'desmondjohn', '2026-02-10 14:44:29', NULL, NULL, NULL, '2026-02-10 14:44:29', NULL),
(79, 'BHC/26/0005', '3', 19, 'param_form', 'Lentiviral Screening', 'Negative', NULL, 'created', 'active', 'desmondjohn', '2026-02-12 15:44:45', NULL, NULL, NULL, '2026-02-12 15:44:45', NULL),
(80, 'BHC/26/0005', '66', 159, 'param_form', 'PCV', '35', NULL, 'created', 'active', 'desmondjohn', '2026-02-12 15:45:03', NULL, NULL, NULL, '2026-02-12 15:45:03', NULL),
(81, 'BHC/26/0007', '137', 471, 'param_form', 'WBC', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:48', NULL, NULL, NULL, '2026-02-14 13:53:48', NULL),
(82, 'BHC/26/0007', '137', 472, 'param_form', 'Lymphocytes#', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:48', NULL, NULL, NULL, '2026-02-14 13:53:48', NULL),
(83, 'BHC/26/0007', '137', 473, 'param_form', 'Mid#', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:48', NULL, NULL, NULL, '2026-02-14 13:53:48', NULL),
(84, 'BHC/26/0007', '137', 474, 'param_form', 'Neutrophils#', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:48', NULL, NULL, NULL, '2026-02-14 13:53:48', NULL),
(85, 'BHC/26/0007', '137', 475, 'param_form', 'Lymphocytes', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:48', NULL, NULL, NULL, '2026-02-14 13:53:48', NULL),
(86, 'BHC/26/0007', '137', 476, 'param_form', 'Mid', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:48', NULL, NULL, NULL, '2026-02-14 13:53:48', NULL),
(87, 'BHC/26/0007', '137', 477, 'param_form', 'Neutrophils', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:48', NULL, NULL, NULL, '2026-02-14 13:53:48', NULL),
(88, 'BHC/26/0007', '137', 478, 'param_form', 'RBC', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:48', NULL, NULL, NULL, '2026-02-14 13:53:48', NULL),
(89, 'BHC/26/0007', '137', 479, 'param_form', 'HGB', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:48', NULL, NULL, NULL, '2026-02-14 13:53:48', NULL),
(90, 'BHC/26/0007', '137', 480, 'param_form', 'HCT/PCV', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:48', NULL, NULL, NULL, '2026-02-14 13:53:48', NULL),
(91, 'BHC/26/0007', '137', 481, 'param_form', 'MCV', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:49', NULL, NULL, NULL, '2026-02-14 13:53:49', NULL),
(92, 'BHC/26/0007', '137', 482, 'param_form', 'MCH', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:49', NULL, NULL, NULL, '2026-02-14 13:53:49', NULL),
(93, 'BHC/26/0007', '137', 483, 'param_form', 'MCHC', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:49', NULL, NULL, NULL, '2026-02-14 13:53:49', NULL),
(94, 'BHC/26/0007', '137', 484, 'param_form', 'RDW-CV', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:49', NULL, NULL, NULL, '2026-02-14 13:53:49', NULL),
(95, 'BHC/26/0007', '137', 485, 'param_form', 'RDW-SD', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:49', NULL, NULL, NULL, '2026-02-14 13:53:49', NULL),
(96, 'BHC/26/0007', '137', 486, 'param_form', 'PLT', '5.0', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 13:53:49', NULL, NULL, NULL, '2026-02-14 13:53:49', NULL),
(97, 'BHC/26/0008', '15', 46, 'param_form', 'Malaria Parasite (RDT)', 'Positive', NULL, 'created', 'active', 'desmondjohn', '2026-02-14 14:06:48', NULL, NULL, NULL, '2026-02-14 14:06:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_tickets`
--

CREATE TABLE `customer_tickets` (
  `sn` int(15) NOT NULL,
  `customer_id` varchar(30) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `othername` varchar(100) NOT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `ticket_no` varchar(50) DEFAULT NULL,
  `operation` enum('do_test','donate_blood','buy_blood') DEFAULT NULL,
  `age` int(3) NOT NULL,
  `age_type` varchar(10) DEFAULT NULL,
  `age_text` datetime DEFAULT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `hospital` varchar(255) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `consultant` varchar(100) DEFAULT NULL,
  `clinical_details` text DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `pay_type` enum('labtest','registration') DEFAULT NULL,
  `amount_paid` double(16,0) DEFAULT NULL,
  `discount` double(16,0) DEFAULT NULL,
  `total_cost` double(16,0) DEFAULT NULL,
  `refund` double(16,0) DEFAULT NULL,
  `payment_completed` enum('no','yes') DEFAULT 'no',
  `process_completed` enum('no','yes') DEFAULT 'no',
  `payment_finalized` enum('yes','no') DEFAULT 'no',
  `alt_test_name` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT '',
  `c_by` varchar(60) DEFAULT 'no',
  `date_c` timestamp NULL DEFAULT NULL,
  `upd_by` varchar(50) DEFAULT NULL,
  `date_upd` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` enum('active','inactive') DEFAULT 'active',
  `finalized` enum('yes','no') NOT NULL DEFAULT 'no',
  `date_fin` timestamp NULL DEFAULT NULL,
  `fin_by` varchar(60) DEFAULT NULL,
  `paym_date_fin` timestamp NULL DEFAULT NULL,
  `paym_fin_by` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `customer_tickets`
--

INSERT INTO `customer_tickets` (`sn`, `customer_id`, `surname`, `othername`, `fullname`, `ticket_no`, `operation`, `age`, `age_type`, `age_text`, `phone`, `email`, `sex`, `hospital`, `doctor`, `consultant`, `clinical_details`, `year`, `pay_type`, `amount_paid`, `discount`, `total_cost`, `refund`, `payment_completed`, `process_completed`, `payment_finalized`, `alt_test_name`, `comment`, `c_by`, `date_c`, `upd_by`, `date_upd`, `status`, `finalized`, `date_fin`, `fin_by`, `paym_date_fin`, `paym_fin_by`) VALUES
(1, 'BLCN/0012', 'Yusuf', 'Mubarak ', 'Yusuf Mubarak ', NULL, NULL, 0, NULL, '2004-12-07 15:40:32', '07089534065', '', 'male', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2024-12-07 14:41:07', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(2, 'BLCN/0374', 'Desmond', 'John ', 'Desmond John ', 'BHC/24/0001', NULL, 0, NULL, '1991-09-11 15:42:22', '08166831174', '', 'male', '', '', '', '', 24, 'labtest', 0, 0, 0, NULL, 'yes', 'yes', 'no', '', '', 'Shemmy0002', '2024-12-07 14:42:55', NULL, '2024-12-07 14:54:03', 'active', 'yes', '2024-12-07 14:54:03', 's6068', NULL, NULL),
(3, 'BLCN/0365', 'Crescent', 'Hospital ', 'Crescent Hospital ', 'BHC/24/0002', NULL, 0, NULL, '1994-12-07 15:57:14', '08185334553', '', 'male', '', '', '', '', 24, 'labtest', 15000, 0, 15000, 0, 'yes', 'yes', 'yes', '', '', 's6068', '2024-12-07 14:57:16', NULL, '2024-12-07 15:03:46', 'active', 'yes', '2024-12-07 15:03:46', 's6068', '2024-12-07 15:01:54', 's6068'),
(4, 'BLCN/0721', 'Ogunniran', 'Mary Adetoro', 'Ogunniran Mary Adetoro', 'BHC/24/0003', NULL, 0, NULL, '2014-08-30 14:17:21', '08166831174', '', 'female', 'Crescent', '', '', '', 24, 'labtest', 0, 0, 0, NULL, 'yes', 'yes', 'no', '', '', 'Shemmy0002', '2024-12-09 09:18:35', NULL, '2024-12-14 14:30:04', 'active', 'yes', '2024-12-14 14:30:04', 'Tianah', NULL, NULL),
(5, 'BLCN/0374', 'Desmond', 'John ', 'Desmond John ', NULL, NULL, 0, NULL, '2000-12-06 14:51:53', '08166831174', '', 'male', 'Crescent', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2024-12-09 09:27:39', NULL, '2024-12-14 13:55:14', 'active', 'no', NULL, NULL, NULL, NULL),
(6, 'BLCN/0721', 'Ogunniran', 'Mary Adetoro', 'Ogunniran Mary Adetoro', NULL, NULL, 0, NULL, '2014-12-12 14:17:21', '08166831174', '', 'female', 'Crescent', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2024-12-10 16:23:01', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(7, 'BLCN/0722', 'Desmond', 'Mary Adetoro', 'Desmond Mary Adetoro', 'BHC/24/0004', NULL, 0, NULL, '1994-12-10 17:32:45', '08166831174', '', 'male', '', '', '', '', 24, 'labtest', 0, 0, 0, NULL, 'yes', 'yes', 'no', '', '', 'Shemmy0002', '2024-12-10 16:33:10', NULL, '2024-12-31 14:54:02', 'active', 'yes', '2024-12-31 14:54:02', 's6068', NULL, NULL),
(8, 'BLCN/0723', 'Salmon ', 'Kaothar ', 'Salmon  Kaothar ', NULL, NULL, 0, NULL, '2024-12-11 09:14:01', '08166831174', '', 'female', 'Crescent', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2024-12-11 08:14:10', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(9, 'BLCN/0724', 'Ibrahim', 'Afusat', 'Ibrahim Afusat', NULL, NULL, 0, NULL, '2024-12-11 09:16:12', '08166831174', '', 'female', 'Crescent', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2024-12-11 08:16:45', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(10, 'BLCN/0725', 'Kingsley ', 'Chukwu', 'Kingsley  Chukwu', 'BHC/24/0005', NULL, 0, NULL, '2024-12-11 09:17:54', '07089534065', '', 'male', 'Crescent', '', '', '', 24, 'labtest', 2000, 0, 2000, 0, 'yes', 'yes', 'yes', '', '', 'Shemmy0002', '2024-12-11 08:18:11', NULL, '2024-12-31 14:56:51', 'active', 'yes', '2024-12-31 14:56:05', 's6068', '2024-12-31 14:56:51', 's6068'),
(11, 'BLCN/0726', 'taiwo ', 'kehinde', 'taiwo  kehinde', 'BHC/24/0006', NULL, 0, NULL, '2016-12-14 14:57:14', '08906876543', '', 'female', '', '', '', '', 24, 'labtest', 10000, 0, 10000, 0, 'yes', 'yes', 'yes', '', '', 'Shemmy0002', '2024-12-14 13:59:18', NULL, '2026-02-09 14:18:43', 'active', 'yes', '2026-02-09 14:18:43', 'Desmondjohn', '2024-12-14 14:12:36', 'shemmy0002'),
(12, 'BLCN/0438', 'Ibrahim', 'Muyiwa Abraham', 'Ibrahim Muyiwa Abraham', 'BHC/24/0007', NULL, 0, NULL, '1991-12-14 18:03:00', '07033513191', '', 'male', '', '', '', '', 24, 'labtest', 2000, 0, 2000, 0, 'yes', 'no', 'yes', NULL, '', 's6068', '2024-12-14 17:03:06', NULL, '2024-12-14 17:03:46', 'active', 'yes', NULL, NULL, '2024-12-14 17:03:46', 's6068'),
(13, 'BLCN/0727', 'Suleiman ', 'Maryam', 'Suleiman  Maryam', NULL, NULL, 0, NULL, '1995-01-19 10:16:07', '08185334553', '', 'female', 'Bloodlink ', 'Bloodlink', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-03 09:18:07', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(14, 'BLCN/0728', 'Olufenka', 'Samuel', 'Olufenka Samuel', 'BHC/25/0001', NULL, 0, NULL, '1995-01-03 09:55:52', '08166831174', '', 'male', 'Bloodlink ', '', '', '', 25, 'labtest', 1500, 0, 1500, 1700, 'yes', 'yes', 'yes', '', '', 'Shemmy0002', '2025-01-04 08:56:33', NULL, '2025-01-04 09:42:12', 'active', 'yes', '2025-01-04 09:42:12', 'Tianah', '2025-01-04 09:03:01', 'Shemmy0002'),
(15, 'BLCN/0729', 'Isiaq', 'Sofihullahi', 'Isiaq Sofihullahi', 'BHC/25/0003', NULL, 0, NULL, '1993-01-28 08:43:37', '07033981426', '', 'male', 'Bloodlink ', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-09 07:46:11', NULL, '2025-01-14 07:56:57', 'active', 'yes', NULL, NULL, NULL, NULL),
(16, 'BLCN/0466', 'Isiaq', 'Sofiyullahi ', 'Isiaq Sofiyullahi ', 'BHC/25/0002', NULL, 0, NULL, '1993-01-09 10:24:09', '09034572145', '', 'male', 'Bloodlink ', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-09 09:25:09', NULL, '2025-01-09 09:26:21', 'active', 'yes', NULL, NULL, NULL, NULL),
(17, 'BLCN/0730', 'Adetunji', 'Teslim', 'Adetunji Teslim', NULL, NULL, 0, NULL, '2001-01-09 10:27:05', '09045687532', '', 'male', 'Bloodlink ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-09 09:27:33', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(18, 'BLCN/0731', 'Adetunji', 'Teslim', 'Adetunji Teslim', 'BHC/25/0003', NULL, 0, NULL, '1997-01-14 08:59:34', '08094837533', '', 'male', '', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-14 08:00:06', NULL, '2025-01-14 08:01:31', 'active', 'yes', NULL, NULL, NULL, NULL),
(19, 'BLCN/0732', 'Abdulsemiu ', 'Ridwan', 'Abdulsemiu  Ridwan', 'BHC/25/0004', NULL, 0, NULL, '2001-01-14 09:02:54', '09067543214', '', 'male', 'Bloodlink ', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-14 08:07:09', NULL, '2025-01-14 08:08:43', 'active', 'yes', NULL, NULL, NULL, NULL),
(20, 'BLCN/0733', 'Ajomale', 'Ayoola', 'Ajomale Ayoola', NULL, NULL, 0, NULL, '2001-01-14 09:09:43', '09034588198', '', 'male', 'Bloodlink ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-14 08:10:35', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(21, 'BLCN/0734', 'Olayiwola ', 'Ola', 'Olayiwola  Ola', NULL, NULL, 0, NULL, '1995-01-14 09:11:24', '09137871442', '', 'male', 'Bloodlink ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-14 08:12:13', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(22, 'BLCN/0735', 'Abdulganiyu', 'Suleiman', 'Abdulganiyu Suleiman', NULL, NULL, 0, NULL, '2006-01-15 13:35:50', '09077968897', '', 'male', 'Crescent', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-15 12:36:45', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(23, 'BLCN/0736', 'Sikirullahi', 'Abdulrasaq', 'Sikirullahi Abdulrasaq', NULL, NULL, 0, NULL, '1999-01-15 15:18:39', '09138451510', '', 'male', 'Crescent', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-15 14:25:29', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(24, 'BLCN/0737', 'Taofeeq', 'Abdulrasaq', 'Taofeeq Abdulrasaq', NULL, NULL, 0, NULL, '2006-01-20 08:41:15', '08143389866', '', 'male', 'Bloodlink ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-20 07:42:04', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(25, 'BLCN/0738', 'Taofeeq', 'Ridwan', 'Taofeeq Ridwan', NULL, NULL, 0, NULL, '2007-01-20 08:44:31', '08129525126', '', 'male', 'Bloodlink ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-20 07:45:15', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(26, 'BLCN/0739', 'Love ', 'Precious Omeiza', 'Love  Precious Omeiza', NULL, NULL, 0, NULL, '1990-01-20 15:10:14', '07025128464', '', 'male', 'Bloodlink ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-20 14:11:45', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(27, 'BLCN/0740', 'Akanbi', 'Oluwaseun', 'Akanbi Oluwaseun', 'BHC/25/0005', NULL, 0, NULL, '1998-01-27 12:20:43', '08106303783', '', 'female', 'bloodlink', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'shemmy0002', '2025-01-27 11:21:58', NULL, '2025-01-27 11:23:34', 'active', 'yes', NULL, NULL, NULL, NULL),
(28, 'BLCN/0741', 'Isia', 'Idowu', 'Isia Idowu', NULL, NULL, 0, NULL, '1990-01-29 13:28:34', '09060575333', '', 'male', 'Bloodlink ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-29 12:29:14', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(29, 'BLCN/0742', 'Amos', 'Samson', 'Amos Samson', NULL, NULL, 0, NULL, '1995-01-29 17:01:18', '07026223651', '', 'male', 'Bloodlink ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-01-29 16:01:56', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(30, 'BLCN/0743', 'Adefisayo', 'Mark', 'Adefisayo Mark', 'BHC/25/0006', NULL, 0, NULL, '1999-02-04 15:25:18', '09065623098', '', 'male', 'Bloodlink ', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-02-04 14:26:24', NULL, '2025-02-04 14:26:45', 'active', 'yes', NULL, NULL, NULL, NULL),
(31, 'BLCN/0744', 'Nahimah', 'Idris', 'Nahimah Idris', 'BHC/25/0007', NULL, 0, NULL, '2004-02-05 11:34:02', '07082866135', '', 'female', 'Bloodlink ', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-02-05 10:35:54', NULL, '2025-02-05 10:36:41', 'active', 'yes', NULL, NULL, NULL, NULL),
(32, 'BLCN/0745', 'Tsado', 'Amos', 'Tsado Amos', NULL, NULL, 0, NULL, '1979-02-13 10:16:43', '08032574730', '', 'male', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-02-13 09:17:57', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(33, 'BLCN/0746', 'Oguniyi', 'Ayoola', 'Oguniyi Ayoola', NULL, NULL, 0, NULL, '1995-02-13 12:22:35', '08103030121', '', 'male', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-02-13 11:23:42', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(34, 'BLCN/0747', 'Emeriewen', 'Michael', 'Emeriewen Michael', 'BHC/25/0008', NULL, 0, NULL, '1996-02-20 11:55:12', '08154796082', '', 'male', '', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-02-20 10:55:59', NULL, '2025-02-20 10:56:23', 'active', 'yes', NULL, NULL, NULL, NULL),
(35, 'BLCN/0722', 'Desmond', 'Mary Adetoro', 'Desmond Mary Adetoro', NULL, NULL, 0, NULL, '1994-12-10 17:32:45', '08166831174', '', 'male', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Tianah', '2025-02-20 14:32:31', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(36, 'BLCN/0748', 'Maryleeeee', 'Johnbull', 'Maryleeeee Johnbull', NULL, NULL, 0, NULL, '2022-02-20 15:39:46', '09087654324', '', 'male', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-02-20 14:40:14', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(37, 'BLCN/0749', 'Hamodu ', 'Fatiu', 'Hamodu  Fatiu', 'BHC/25/0009', NULL, 0, NULL, '2004-02-26 14:38:08', '09137732846', '', 'male', '', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-02-26 13:39:46', NULL, '2025-02-26 13:41:53', 'active', 'yes', NULL, NULL, NULL, NULL),
(38, 'BLCN/0750', 'Salman', 'Ismail', 'Salman Ismail', 'BHC/25/0010', NULL, 0, NULL, '2002-02-26 14:42:30', '07037353312', '', 'male', '', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-02-26 13:43:10', NULL, '2025-02-26 13:43:30', 'active', 'yes', NULL, NULL, NULL, NULL),
(39, 'BLCN/0751', 'Hamodu', 'Abduljelili', 'Hamodu Abduljelili', 'BHC/25/0011', NULL, 0, NULL, '2005-02-26 14:44:23', '09162824672', '', 'male', '', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-02-26 13:45:11', NULL, '2025-02-26 13:47:04', 'active', 'yes', NULL, NULL, NULL, NULL),
(40, 'BLCN/0752', 'Inioluwa', 'Oluwapelumi', 'Inioluwa Oluwapelumi', 'BHC/25/0012', NULL, 0, NULL, '2006-03-04 14:28:20', '08127709462', '', 'male', '', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-03-04 13:29:55', NULL, '2025-03-04 13:30:14', 'active', 'yes', NULL, NULL, NULL, NULL),
(41, 'BLCN/0753', 'Adeoye', 'Michae', 'Adeoye Michae', 'BHC/25/0013', NULL, 0, NULL, '1996-03-05 16:57:24', '09039782404', '', 'male', '', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-03-05 15:58:29', NULL, '2025-03-05 15:58:53', 'active', 'yes', NULL, NULL, NULL, NULL),
(42, 'BLCN/0754', 'Ahmeed ', 'Tesleem', 'Ahmeed  Tesleem', 'BHC/25/0014', NULL, 0, NULL, '2003-03-17 14:54:55', '08022866569', '', 'male', '', '', '', '', 25, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'Shemmy0002', '2025-03-17 13:55:58', NULL, '2025-03-17 13:56:19', 'active', 'yes', NULL, NULL, NULL, NULL),
(43, 'BLCN/0755', 'Alao', 'Damola', 'Alao Damola', NULL, NULL, 0, NULL, '2025-03-28 13:40:08', '09083467809', '', 'male', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-03-28 12:40:47', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(44, 'BLCN/0756', 'Ayodele', 'Elijah', 'Ayodele Elijah', NULL, NULL, 0, NULL, '2025-03-28 13:42:03', '07035670153', '', 'male', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'Shemmy0002', '2025-03-28 12:42:30', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(45, 'BLCN/0757', 'Kabira ', 'Ayoka', 'Kabira  Ayoka', 'BHC/26/0003', NULL, 0, NULL, '2002-07-16 13:24:00', '08166831174', '', 'female', '', '', '', '', 26, 'labtest', 25200, 0, 25200, 0, 'yes', 'no', 'yes', NULL, '', 'desmondjohn', '2026-02-09 12:24:57', NULL, '2026-02-10 14:37:12', 'active', 'yes', NULL, NULL, '2026-02-10 14:37:12', 'desmondjohn'),
(46, 'BLCN/0758', 'Precious', 'Asegbe', 'Precious Asegbe', NULL, NULL, 0, NULL, '2005-06-16 14:42:05', '08029005206', '', 'female', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 'desmondjohn', '2026-02-09 13:42:57', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(47, 'BLCN/0489', 'John', 'Ayembo ', 'John Ayembo ', 'BHC/26/0001', NULL, 0, NULL, '1995-02-09 17:38:34', '08135589043', '', 'male', '', '', '', '', 26, 'labtest', 4000, 0, 4000, 0, 'yes', 'yes', 'yes', '', '', 'Desmondjohn', '2026-02-09 16:39:10', NULL, '2026-02-09 16:45:36', 'active', 'yes', '2026-02-09 16:44:04', 'Desmondjohn', '2026-02-09 16:45:36', 'Desmondjohn'),
(48, 'BLCN/0732', 'Abdulsemiu ', 'Ridwan', 'Abdulsemiu  Ridwan', 'BHC/26/0002', NULL, 0, NULL, '2001-01-14 09:02:54', '09067543214', '', 'male', 'Bloodlink ', '', '', '', 26, 'labtest', 1500, 0, 1500, 0, 'yes', 'yes', 'yes', '', '', 'desmondjohn', '2026-02-09 17:09:52', NULL, '2026-02-09 17:13:54', 'active', 'yes', '2026-02-09 17:13:54', 'desmondjohn', '2026-02-09 17:11:45', 'desmondjohn'),
(49, 'BLCN/0759', 'Nuhu', 'Dupe', 'Nuhu Dupe', 'BHC/26/0003', NULL, 0, NULL, '1970-02-11 14:10:12', '08037127124', '', 'female', 'Phoenix Hospital', 'Dr. Adeshina', '', '', 26, 'labtest', 0, 0, 14500, NULL, 'no', 'no', 'no', NULL, '', 'desmondjohn', '2026-02-11 13:14:00', NULL, '2026-02-11 13:30:49', 'active', 'yes', NULL, NULL, NULL, NULL),
(50, 'BLCN/0760', 'Hassan', 'Mariam', 'Hassan Mariam', 'BHC/26/0004', NULL, 0, NULL, '1996-02-12 16:34:14', '08142682013', '', 'female', '', '', '', '', 26, 'labtest', 0, 0, 0, NULL, 'yes', 'no', 'no', NULL, '', 'desmondjohn', '2026-02-12 15:34:49', NULL, '2026-02-12 15:35:40', 'active', 'yes', NULL, NULL, NULL, NULL),
(51, 'BLCN/0760', 'Hassan', 'Mariam', 'Hassan Mariam', 'BHC/26/0005', NULL, 0, NULL, '1996-02-12 16:34:14', '08142682013', '', 'female', '', '', '', '', 26, 'labtest', 3800, 3800, 3800, 3800, 'yes', 'yes', 'yes', '', '', 'desmondjohn', '2026-02-12 15:40:16', NULL, '2026-02-12 15:45:11', 'active', 'yes', '2026-02-12 15:45:11', 'desmondjohn', '2026-02-12 15:43:24', 'desmondjohn'),
(52, 'BLCN/0761', 'Abdullahi ', 'Mustapha', 'Abdullahi  Mustapha', 'BHC/26/0006', NULL, 0, NULL, '1999-02-14 14:26:55', '08185334553', '', 'male', '', '', '', '', 26, 'labtest', 4000, 0, 4000, 0, 'yes', 'no', 'yes', NULL, '', 'desmondjohn', '2026-02-14 13:27:06', NULL, '2026-02-14 13:28:23', 'active', 'yes', NULL, NULL, '2026-02-14 13:28:23', 'desmondjohn'),
(53, 'BLCN/0762', 'Abdulraheem', 'Murtala', 'Abdulraheem Murtala', 'BHC/26/0007', NULL, 0, NULL, '2022-02-14 14:48:58', '07039395438', '', 'male', '', '', '', '', 26, 'labtest', 3200, 0, 3200, 0, 'yes', 'no', 'yes', NULL, '', 'desmondjohn', '2026-02-14 13:49:21', NULL, '2026-02-14 13:50:55', 'active', 'yes', NULL, NULL, '2026-02-14 13:50:55', 'desmondjohn'),
(54, 'BLCN/0762', 'Abdulraheem', 'Murtala', 'Abdulraheem Murtala', 'BHC/26/0008', NULL, 0, NULL, '2022-02-14 14:48:58', '07039395438', '', 'male', '', '', '', '', 26, 'labtest', 1200, 0, 1200, 0, 'yes', 'yes', 'yes', '', '', 'desmondjohn', '2026-02-14 14:05:22', NULL, '2026-02-14 14:06:54', 'active', 'yes', '2026-02-14 14:06:54', 'desmondjohn', '2026-02-14 14:05:59', 'desmondjohn');

-- --------------------------------------------------------

--
-- Table structure for table `customer_ticket_reversion`
--

CREATE TABLE `customer_ticket_reversion` (
  `sn` int(10) NOT NULL,
  `ticket_no` varchar(30) DEFAULT NULL,
  `reverse_type` enum('processed','created') DEFAULT NULL,
  `rev_by` varchar(50) DEFAULT NULL,
  `date_rev` date DEFAULT NULL,
  `time_rev` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_ticket_reversion`
--

INSERT INTO `customer_ticket_reversion` (`sn`, `ticket_no`, `reverse_type`, `rev_by`, `date_rev`, `time_rev`) VALUES
(1, 'PPT/22/0008', 'processed', 's6068', '2022-09-17', '14:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `sn` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`sn`, `name`, `status`) VALUES
(1, 'Laboratory', 'active'),
(2, 'Accounting', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `sn` int(11) NOT NULL,
  `donor_id` varchar(30) NOT NULL,
  `custom_ticket_id` bigint(20) NOT NULL,
  `donation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blood_volume_ml` int(11) DEFAULT NULL,
  `blood_type_id` varchar(10) DEFAULT NULL,
  `c_by` varchar(30) DEFAULT '',
  `upd_by` varchar(30) DEFAULT '',
  `test_processed` enum('yes','no') NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`sn`, `donor_id`, `custom_ticket_id`, `donation_date`, `blood_volume_ml`, `blood_type_id`, `c_by`, `upd_by`, `test_processed`, `created_at`, `updated_at`) VALUES
(1, '', 0, '2024-11-07 04:56:00', NULL, '3', 's6068', '', 'no', '2024-11-07 04:56:11', '2024-11-07 04:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `donors_remarks`
--

CREATE TABLE `donors_remarks` (
  `id` bigint(20) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `c_by` varchar(30) DEFAULT NULL,
  `upd_by` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donors_remarks`
--

INSERT INTO `donors_remarks` (`id`, `remarks`, `c_by`, `upd_by`, `created_at`, `updated_at`) VALUES
(1, 'Donated', 's6068', NULL, '2024-12-10 00:06:58', '2024-12-10 00:06:58'),
(2, 'Not Fit', 's6068', NULL, '2024-12-10 00:07:13', '2024-12-10 00:07:13'),
(3, 'Not Bleeded', 's6068', NULL, '2024-12-10 00:08:18', '2024-12-10 00:08:18'),
(4, 'Low PCV', 's6068', NULL, '2024-12-10 00:08:42', '2024-12-10 00:08:42'),
(5, 'Out of Ilorin', 's6068', NULL, '2024-12-10 00:09:00', '2024-12-10 00:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `sn` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `contact_no` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(100) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `upd_by` varchar(100) DEFAULT NULL,
  `date_upd` date DEFAULT NULL,
  `time_upd` time DEFAULT NULL,
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` date DEFAULT NULL,
  `time_del` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`sn`, `name`, `address`, `contact_no`, `status`, `c_by`, `date_c`, `time_c`, `upd_by`, `date_upd`, `time_upd`, `del_by`, `date_del`, `time_del`) VALUES
(1, 'General Hospital ', 'Zamaru', '08044556632', 'active', 's6068', '2022-08-23', '16:06:22', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Crescent Gold Crown Hospital', 'Tanke, Adjacent Mark Filling Station', '08022233355', 'active', 's6068', '2024-11-23', '09:54:42', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_invoice`
--

CREATE TABLE `hospital_invoice` (
  `sn` int(10) NOT NULL,
  `hosp_id` varchar(255) DEFAULT NULL,
  `ticket_no` varchar(30) NOT NULL,
  `invoice_no` varchar(30) DEFAULT NULL,
  `inv_prepared` enum('yes','no') DEFAULT 'no',
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(100) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `prep_by` varchar(100) DEFAULT NULL,
  `date_prep` date DEFAULT NULL,
  `time_prep` time DEFAULT NULL,
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` date DEFAULT NULL,
  `time_del` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_invoice_report`
--

CREATE TABLE `hospital_invoice_report` (
  `sn` int(10) NOT NULL,
  `hosp_id` varchar(5) NOT NULL,
  `invoice_no` varchar(30) NOT NULL,
  `acct_id` varchar(5) NOT NULL,
  `paym_completed` enum('yes','no') DEFAULT 'no',
  `total_cost` double(16,0) DEFAULT 0,
  `discount` double(16,0) DEFAULT 0,
  `amount_paid` double(16,0) DEFAULT 0,
  `balance` double(16,0) DEFAULT 0,
  `_change` double(16,0) DEFAULT NULL,
  `date_paid` date DEFAULT NULL,
  `time_paid` time DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(100) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `upd_by` varchar(100) DEFAULT NULL,
  `date_upd` date DEFAULT NULL,
  `time_upd` time DEFAULT NULL,
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` date DEFAULT NULL,
  `time_del` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labtest_reports`
--

CREATE TABLE `labtest_reports` (
  `sn` int(10) NOT NULL,
  `sold_to` varchar(100) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `receipt_no` varchar(100) DEFAULT NULL,
  `payment_status` enum('paid','unpaid') DEFAULT 'unpaid',
  `ref_no` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `bill_name` varchar(200) DEFAULT NULL,
  `result` text NOT NULL,
  `categ_id` varchar(5) DEFAULT NULL,
  `dept_id` varchar(5) DEFAULT NULL,
  `bill_type_id` varchar(5) DEFAULT NULL,
  `price` varchar(15) DEFAULT NULL,
  `balance` varchar(15) DEFAULT NULL,
  `refund` varchar(15) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(100) DEFAULT NULL,
  `date_c` varchar(32) DEFAULT NULL,
  `year_c` int(4) DEFAULT NULL,
  `time_c` varchar(32) DEFAULT NULL,
  `week_c` int(2) DEFAULT NULL,
  `month_c` int(2) DEFAULT NULL,
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` varchar(32) DEFAULT NULL,
  `time_del` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `myroles`
--

CREATE TABLE `myroles` (
  `sn` int(5) NOT NULL,
  `user_id` varchar(100) NOT NULL DEFAULT '',
  `role_id` varchar(100) NOT NULL DEFAULT '',
  `step_val` int(3) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `defaults` enum('no','yes') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `myroles`
--

INSERT INTO `myroles` (`sn`, `user_id`, `role_id`, `step_val`, `status`, `defaults`) VALUES
(1, 's6068', 'superb', 2, 'active', 'yes'),
(12, 'accesschm001', 'consultant', NULL, 'active', NULL),
(13, 'taimobola', 'superb', NULL, 'active', 'yes'),
(14, 'Shemmy0002', 'receptionist', NULL, 'active', NULL),
(15, 'Roqeebat', 'labtech', NULL, 'active', NULL),
(16, 'dessyjay4', 'receptionist', NULL, 'active', NULL),
(17, 'Tianah', 'labtech', NULL, 'active', NULL),
(18, 'dessyjay4', '', NULL, 'active', NULL),
(19, 'dessyjay4', 'consultant', NULL, 'active', NULL),
(20, 'desmondjohn', 'consultant', NULL, 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pagegroups`
--

CREATE TABLE `pagegroups` (
  `sn` int(3) NOT NULL,
  `groupname` varchar(100) DEFAULT NULL,
  `groupid` varchar(20) NOT NULL DEFAULT '',
  `icon` varchar(200) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pagegroups`
--

INSERT INTO `pagegroups` (`sn`, `groupname`, `groupid`, `icon`, `status`) VALUES
(1, 'Settings', 'gp3', 'fa fa-cog', 'active'),
(2, 'Lab Tests', 'gp2', 'fa fa-user-circle', 'active'),
(3, 'Dashboard', 'gp1', 'fa fa-home', 'active'),
(4, 'Payment', 'gp4', 'fa fa-money', 'active'),
(5, 'Human Resource', 'gp5', 'fa fa-users', 'active'),
(6, 'Blood Banks', 'gp6', 'fa fa-medkit', 'active'),
(7, 'Reports', 'gp7', 'fa fa-book', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `sn` int(5) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `icon` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `groupid` varchar(20) DEFAULT NULL,
  `autoload` enum('yes','no') DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`sn`, `title`, `url`, `icon`, `status`, `groupid`, `autoload`) VALUES
(1, 'Admin Privileges', 'priviledges.php', 'fa fa-cog', 'active', 'gp3', 'yes'),
(3, 'All Templates', 'billingsys.php', 'fa fa-money', 'active', 'gp2', 'yes'),
(4, 'Home', 'index.php', 'fa fa-home', 'active', 'gp1', 'yes'),
(5, 'Page Setups', 'page_settings.php', 'fa fa-cog', 'active', 'gp3', 'yes'),
(6, 'Administrations', 'administration.php', 'fa fa-user', 'inactive', 'gp3', 'yes'),
(7, 'Error Page', '404.php', 'fa fa-window-close-o', 'active', 'gp2', 'no'),
(8, 'Create Report', 'newreport.php', 'fa fa-book', 'inactive', 'gp2', 'yes'),
(9, 'Admins &amp; Roles', 'admins.php', 'mdi mdi-account', 'active', 'gp5', 'yes'),
(10, 'Create New Ticket', 'newschedule.php', 'fa fa-id-card-o', 'active', 'gp2', 'yes'),
(11, 'View Tickets', 'tickets.php', 'fa fa-id-card-o', 'active', 'gp2', 'yes'),
(12, 'Ticket Processing', 'process_ticket.php', 'fa fa-money', 'active', 'gp2', 'no'),
(13, 'Ticket Print Preview', 'tick_print_preview.php', 'fa fa-print', 'active', 'gp2', 'no'),
(14, 'Payments &amp; Receipts', 'ticket_paym.php', 'fa fa-money', 'active', 'gp2', 'yes'),
(15, 'Ticket Receipt', 'receipt.php', 'fa fa-money', 'active', 'gp2', 'no'),
(16, 'Roles', 'roles.php', 'fa fa-user', 'inactive', 'gp3', 'yes'),
(17, 'System Info', 'settings.php', 'fa fa-info-circle', 'active', 'gp3', 'yes'),
(18, 'Salary &amp; Payments', 'salary_struct.php', 'fa fa-money', 'active', 'gp5', 'yes'),
(19, 'Ticket Status Update', 'ticket_updates.php', 'fa fa-refresh', 'active', 'gp2', 'yes'),
(20, 'Blood Stocks', 'bloodstocks.php', 'fa fa-medkit', 'active', 'gp6', 'yes'),
(21, 'Stock Collection', 'stock_alloc.php', 'fa fa-shopping-cart', 'active', 'gp6', 'yes'),
(22, 'Ticket Invoice Reports', 'ticket_invoice.php', 'fa fa-send  fa-2x text-success', 'active', 'gp7', 'yes'),
(23, 'Lab Reports', 'lab_rep.php', 'fa fa-user-circle', 'active', 'gp7', 'yes'),
(24, 'Financial Report', 'fin_rep.php', 'fa fa-money', 'active', 'gp7', 'yes'),
(25, 'Staff Payslip', 'staff_payslip.php', 'fa fa-envelope-open', 'active', 'gp5', 'no'),
(26, 'Salary Report', 'salary_report.php', 'fa fa-money fa-2x text-success', 'active', 'gp7', 'yes'),
(27, 'Print Invoice', 'inv_print.php', 'fa fa-send text-success', 'active', 'gp7', 'no'),
(28, 'Ticket Result Per Selection', 'tick_result_part_print.php', 'fa fa-stethoscope', 'active', 'gp2', 'no'),
(29, 'Ticket Result Download', 'tick_result_part_dnld.php', 'fa fa-download', 'active', 'gp2', 'no'),
(30, 'Unpaid Invoice Update', 'ticket_invoice_upd.php', 'icon-wallet', 'active', 'gp7', 'no'),
(31, 'Our Customers', 'customers.php', 'fa fa-users fa-2x ', 'active', 'gp1', 'yes'),
(32, 'bebet', 'ntdtht', 'tbtb', 'active', 'gp1', 'yes'),
(33, 'Admin Profile', 'adm_profile.php', 'icon-user', 'active', 'gp5', 'no'),
(34, 'Ticket Comment Setup', 'tick_coment_setup.php', 'mdi mdi-comment', 'active', 'gp2', 'yes'),
(35, 'Blood Bank Settings', 'bbsettings.php', 'fa fa-cogs', 'active', 'gp6', 'yes'),
(36, 'Blood Donation Result Printout', 'blood_donation_result.php', 'fa fa-book', 'active', 'gp2', 'no'),
(37, 'Donors', 'donors.php', 'fa fa-users', 'active', 'gp6', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `sn` int(15) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'host',
  `dob` varchar(16) NOT NULL,
  `state` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `hosp_no` varchar(50) DEFAULT NULL,
  `military_no` varchar(50) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `nokname` varchar(255) DEFAULT NULL,
  `nokphone` varchar(11) DEFAULT NULL,
  `nokrelationship` varchar(100) DEFAULT NULL,
  `psp` varchar(200) DEFAULT NULL,
  `psp_dir` varchar(255) DEFAULT NULL,
  `c_by` varchar(100) DEFAULT 'no',
  `date_c` varchar(30) DEFAULT NULL,
  `time_c` varchar(30) DEFAULT NULL,
  `month_c` varchar(20) DEFAULT NULL,
  `week_c` int(3) DEFAULT NULL,
  `year_c` int(4) DEFAULT NULL,
  `day_c` int(2) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `finalized` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`sn`, `surname`, `firstname`, `othername`, `fullname`, `title`, `type`, `dob`, `state`, `lga`, `phone`, `email`, `gender`, `hosp_no`, `military_no`, `category`, `address`, `nokname`, `nokphone`, `nokrelationship`, `psp`, `psp_dir`, `c_by`, `date_c`, `time_c`, `month_c`, `week_c`, `year_c`, `day_c`, `status`, `finalized`) VALUES
(1, 'Ojo', '', '555', '', '', 'host', '', '', '', '', '', 'female', '', '', '', '', '', '', '', '', '', 's6068', '', '', '', 0, 0, 0, 'active', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `patients_copy`
--

CREATE TABLE `patients_copy` (
  `sn` int(15) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `type` varchar(50) DEFAULT 'host',
  `dob` varchar(16) NOT NULL,
  `state` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `hosp_no` varchar(50) DEFAULT NULL,
  `military_no` varchar(50) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `nokname` varchar(255) DEFAULT NULL,
  `nokphone` varchar(11) DEFAULT NULL,
  `nokrelationship` varchar(100) DEFAULT NULL,
  `psp` varchar(200) DEFAULT NULL,
  `psp_dir` varchar(255) DEFAULT NULL,
  `c_by` varchar(100) DEFAULT 'no',
  `date_c` varchar(30) DEFAULT NULL,
  `time_c` varchar(30) DEFAULT NULL,
  `month_c` varchar(20) DEFAULT NULL,
  `week_c` int(3) DEFAULT NULL,
  `year_c` int(4) DEFAULT NULL,
  `day_c` int(2) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `finalized` enum('yes','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients_siblings`
--

CREATE TABLE `patients_siblings` (
  `sn` int(15) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `dob` varchar(16) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `ref_no` varchar(50) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `createdby` varchar(100) DEFAULT 'no',
  `date_c` varchar(30) DEFAULT NULL,
  `time_c` varchar(30) DEFAULT NULL,
  `month_c` varchar(20) DEFAULT NULL,
  `week_c` int(3) DEFAULT NULL,
  `year_c` int(4) DEFAULT NULL,
  `day_c` int(2) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_category`
--

CREATE TABLE `patient_category` (
  `sn` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `patient_category`
--

INSERT INTO `patient_category` (`sn`, `name`, `status`) VALUES
(1, 'Individual', 'active'),
(2, 'Family', 'active'),
(3, 'NHIS', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `payment_log`
--

CREATE TABLE `payment_log` (
  `sn` int(10) NOT NULL,
  `ticket_no` varchar(15) NOT NULL DEFAULT '',
  `expc_pay` double(16,0) DEFAULT NULL,
  `discount` double(16,0) DEFAULT NULL,
  `amount_paid` double(16,0) DEFAULT NULL,
  `paymode` enum('cash','pos','transfer') DEFAULT 'cash',
  `date_paid` timestamp NULL DEFAULT NULL,
  `collected_by` varchar(30) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `del_by` varchar(30) DEFAULT NULL,
  `date_del` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment_log`
--

INSERT INTO `payment_log` (`sn`, `ticket_no`, `expc_pay`, `discount`, `amount_paid`, `paymode`, `date_paid`, `collected_by`, `status`, `del_by`, `date_del`) VALUES
(1, 'BHC/24/0002', 15000, NULL, 15000, 'transfer', '2024-12-07 15:01:54', 's6068', 'active', NULL, NULL),
(2, 'BHC/24/0006', 10000, NULL, 4000, 'cash', '2024-12-14 14:12:36', 'shemmy0002', 'active', NULL, NULL),
(3, 'BHC/24/0006', 10000, NULL, 6000, 'pos', '2024-12-14 14:12:36', 'shemmy0002', 'active', NULL, NULL),
(4, 'BHC/24/0007', 2000, NULL, 2000, 'cash', '2024-12-14 17:03:46', 's6068', 'active', NULL, NULL),
(5, 'BHC/24/0005', 2000, NULL, 2000, 'cash', '2024-12-31 14:56:51', 's6068', 'active', NULL, NULL),
(6, 'BHC/25/0001', 1500, NULL, 3200, 'cash', '2025-01-04 09:03:01', 'Shemmy0002', 'active', NULL, NULL),
(7, 'BHC/26/0001', 4000, NULL, 4000, 'pos', '2026-02-09 16:45:36', 'Desmondjohn', 'active', NULL, NULL),
(8, 'BHC/26/0002', 1500, NULL, 1500, 'cash', '2026-02-09 17:11:45', 'desmondjohn', 'active', NULL, NULL),
(9, 'BHC/26/0003', 25200, NULL, 25200, 'cash', '2026-02-10 14:37:12', 'desmondjohn', 'active', NULL, NULL),
(10, 'BHC/26/0005', 3800, NULL, 3800, 'transfer', '2026-02-12 15:43:24', 'desmondjohn', 'active', NULL, NULL),
(11, 'BHC/26/0006', 4000, NULL, 4000, 'transfer', '2026-02-14 13:28:23', 'desmondjohn', 'active', NULL, NULL),
(12, 'BHC/26/0007', 3200, NULL, 3200, 'transfer', '2026-02-14 13:50:55', 'desmondjohn', 'active', NULL, NULL),
(13, 'BHC/26/0008', 1200, NULL, 1200, 'transfer', '2026-02-14 14:05:59', 'desmondjohn', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `sn` int(10) NOT NULL,
  `prog_type` varchar(30) DEFAULT NULL,
  `level` enum('low','high') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_bills`
--

CREATE TABLE `pending_bills` (
  `sn` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `receipt_no` varchar(100) DEFAULT NULL,
  `ref_no` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `military_no` varchar(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `bill_type` varchar(255) NOT NULL,
  `dept_id` int(5) DEFAULT NULL,
  `categ_id` int(5) DEFAULT NULL,
  `price` varchar(15) DEFAULT NULL,
  `date_c` varchar(32) DEFAULT NULL,
  `time_c` varchar(32) DEFAULT NULL,
  `month_c` int(2) DEFAULT NULL,
  `day_c` int(2) DEFAULT NULL,
  `week_c` int(2) DEFAULT NULL,
  `year_c` int(4) DEFAULT NULL,
  `completed` enum('no','yes') DEFAULT 'no',
  `status` enum('active','inactive') DEFAULT 'active',
  `payment_status` enum('paid','unpaid') DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pharm_products`
--

CREATE TABLE `pharm_products` (
  `sn` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `has_expiry` enum('yes','no') DEFAULT 'yes',
  `mfc_date` date DEFAULT NULL,
  `exp_date` date DEFAULT NULL,
  `no_of_pack` int(10) DEFAULT NULL,
  `qty_per_pack` int(10) DEFAULT NULL,
  `rem_no_of_pack` int(10) DEFAULT NULL,
  `rem_qty_per_pack` int(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `remains` int(10) DEFAULT NULL,
  `cost_price` int(15) DEFAULT NULL,
  `selling_price` int(15) DEFAULT NULL,
  `visible` enum('yes','no') DEFAULT 'yes',
  `vendor_id` varchar(100) DEFAULT NULL,
  `date_suplied` varchar(32) DEFAULT NULL,
  `rec_by` varchar(50) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `month_c` varchar(20) DEFAULT NULL,
  `week_c` int(3) DEFAULT NULL,
  `year_c` int(4) DEFAULT NULL,
  `day_c` int(2) DEFAULT NULL,
  `date_hide` date DEFAULT NULL,
  `time_hide` time DEFAULT NULL,
  `hide_by` varchar(30) DEFAULT NULL,
  `del_by` varchar(50) DEFAULT NULL,
  `date_del` date DEFAULT NULL,
  `time_del` time DEFAULT NULL,
  `date_upd` date DEFAULT NULL,
  `time_upd` time DEFAULT NULL,
  `upd_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pharm_products`
--

INSERT INTO `pharm_products` (`sn`, `name`, `code`, `description`, `barcode`, `has_expiry`, `mfc_date`, `exp_date`, `no_of_pack`, `qty_per_pack`, `rem_no_of_pack`, `rem_qty_per_pack`, `qty`, `remains`, `cost_price`, `selling_price`, `visible`, `vendor_id`, `date_suplied`, `rec_by`, `status`, `date_c`, `time_c`, `month_c`, `week_c`, `year_c`, `day_c`, `date_hide`, `time_hide`, `hide_by`, `del_by`, `date_del`, `time_del`, `date_upd`, `time_upd`, `upd_by`) VALUES
(1, 'Paracetamol Syrub', '', '', '1234', 'yes', '2018-02-15', '2022-02-28', 3, 50, 1, 0, 0, 0, 100, 150, 'no', 'Tuyil Pharmacy', '2020-02-14', 's6068', 'active', '2020-02-15', '838:59:59', '02', 7, 2020, 15, '2020-12-16', '13:31:32', '3571', 's6068', '2020-02-16', '12:14:58', '0000-00-00', '00:00:00', ''),
(2, 'Flagi 400mg', '', '', '1123', 'yes', '2020-02-17', '2021-02-16', 40, 10, 21, 0, 0, 0, 70, 100, 'no', '', '', 's6068', 'active', '2020-02-17', '00:00:00', '02', 8, 2020, 17, '2020-12-16', '13:30:58', '3571', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', ''),
(3, 'Flagi 200mg', '', '', '1221', 'yes', '2020-02-17', '2022-02-15', 6, 30, 4, 0, 0, 6, 50, 70, 'no', '', '', 's6068', 'active', '2020-02-17', '05:45:29', '', 0, 0, 0, '2020-12-16', '13:31:11', '3571', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', ''),
(4, 'Creatinine', 'Centronic', '', '00001', 'yes', '2020-01-02', '2021-12-31', 5, 4, NULL, NULL, NULL, NULL, 9000, 10000, 'yes', 'Nums', '2020-10-01', '3571', 'inactive', '2020-12-16', '13:30:25', '12', 51, 2020, 16, NULL, NULL, NULL, 's6068', '2022-09-29', '10:35:19', NULL, NULL, NULL),
(5, 'Urea', 'Aggape', '', '0002', 'yes', '2019-05-16', '2021-12-16', 1, 10, NULL, NULL, NULL, NULL, 9000, 10000, 'yes', 'Nums', '2020-06-16', '3571', 'inactive', '2020-12-16', '13:35:46', '12', 51, 2020, 16, NULL, NULL, NULL, '3571', '2020-12-16', '15:27:06', NULL, NULL, NULL),
(6, 'Electrode Activator Reagent', 'EAR', '', '200901-19', 'yes', '2020-09-04', '2021-09-27', 10, 1, NULL, NULL, NULL, NULL, 6000, 6500, 'no', 'Audicom', '2021-01-03', '3571', 'active', '2021-01-04', '17:36:20', '01', 1, 2021, 4, '2021-10-22', '09:29:23', '3571', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Electrode Deproteinizer', 'EDE', '', '201001-18', 'yes', '2020-01-04', '2021-10-10', 2, 1, NULL, NULL, NULL, NULL, 5000, 5500, 'yes', 'Audicom', '2021-01-03', '3571', 'inactive', '2021-01-04', '17:42:20', '01', 1, 2021, 4, NULL, NULL, NULL, 's6068', '2022-09-29', '10:35:09', NULL, NULL, NULL),
(8, 'Calibrator A Reagent ', 'CAR', '', '200201-13', 'yes', '2020-01-04', '2022-09-25', 12, 1, NULL, NULL, NULL, NULL, 11500, 12500, 'yes', 'Audicom', '2021-01-03', '3571', 'inactive', '2021-01-04', '17:45:52', '01', 1, 2021, 4, NULL, NULL, NULL, 's6068', '2022-09-29', '10:35:28', NULL, NULL, NULL),
(9, 'Hepatitis B Surface antigen', 'HbsAg', '', '2019/2015gs', 'yes', '2019-01-22', '2022-12-12', 6, 50, NULL, NULL, NULL, NULL, 6000, 8000, 'yes', 'Nova', '2021-01-21', '3571', 'inactive', '2021-01-22', '09:43:29', '01', 3, 2021, 22, NULL, NULL, NULL, 's6068', '2022-09-29', '10:35:36', NULL, NULL, NULL),
(10, 'Hepatitis C antibody', 'HCV', '', '2019120/cvs', 'yes', '2019-01-22', '2022-12-12', 4, 50, NULL, NULL, NULL, NULL, 7000, 9000, 'yes', 'Nova', '2021-01-21', '3571', 'inactive', '2021-01-22', '09:45:14', '01', 3, 2021, 22, NULL, NULL, NULL, 's6068', '2022-09-29', '10:35:47', NULL, NULL, NULL),
(11, 'Hepatitis B profile', 'HBV profile', '', '20201209HBV', 'yes', '2020-01-01', '2023-01-22', 4, 25, NULL, NULL, NULL, NULL, 16500, 19000, 'yes', 'Nova', '', '3571', 'inactive', '2021-01-22', '10:14:38', '01', 3, 2021, 22, NULL, NULL, NULL, 's6068', '2022-09-29', '10:35:55', NULL, NULL, NULL),
(12, 'plain bottle', 'Plain bottle', '', '0104032022', 'yes', '2022-03-04', '2025-03-04', 100, 100, NULL, NULL, NULL, NULL, 35, 45, 'yes', 'skye ', '2022-03-03', '3571', 'inactive', '2022-03-04', '09:29:09', '03', 9, 2022, 4, NULL, NULL, NULL, 's6068', '2022-09-29', '10:36:06', NULL, NULL, NULL),
(13, 'Latex glove', 'Glove', '', '02032022', 'yes', '2021-11-01', '2026-10-01', 10, 10, NULL, NULL, NULL, NULL, 2500, 3500, 'yes', 'skye', '2022-03-03', '3571', 'inactive', '2022-03-04', '09:33:09', '03', 9, 2022, 4, NULL, NULL, NULL, 's6068', '2022-09-29', '10:36:14', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `priviledges`
--

CREATE TABLE `priviledges` (
  `sn` int(10) NOT NULL,
  `role_id` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `status` enum('active','inactive') DEFAULT 'active',
  `groupid` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `priviledges`
--

INSERT INTO `priviledges` (`sn`, `role_id`, `url`, `status`, `groupid`) VALUES
(1, 'superb', 'priviledges.php', 'active', 'gp3'),
(2, 'superb', 'index.php', 'active', 'gp1'),
(5, 'superb', 'page_settings.php', 'active', 'gp3'),
(10, 'superb', '404.php', 'active', 'gp2'),
(15, 'superb', 'newschedule.php', 'active', 'gp2'),
(16, 'superb', 'tickets.php', 'active', 'gp2'),
(17, 'superb', 'process_ticket.php', 'active', 'gp2'),
(18, 'superb', 'tick_print_preview.php', 'active', 'gp2'),
(19, 'superb', 'ticket_paym.php', 'active', 'gp2'),
(20, 'superb', 'receipt.php', 'active', 'gp2'),
(21, 'superb', 'billingsys.php', 'active', 'gp2'),
(22, 'superb', 'admins.php', 'active', 'gp5'),
(23, 'labtech', 'index.php', 'active', 'gp1'),
(24, 'labtech', '404.php', 'active', 'gp2'),
(25, 'labtech', 'newschedule.php', 'active', 'gp2'),
(26, 'labtech', 'tickets.php', 'active', 'gp2'),
(27, 'labtech', 'process_ticket.php', 'active', 'gp2'),
(28, 'labtech', 'tick_print_preview.php', 'active', 'gp2'),
(29, 'labtech', 'ticket_paym.php', 'active', 'gp2'),
(30, 'labtech', 'receipt.php', 'active', 'gp2'),
(32, 'superb', 'settings.php', 'active', 'gp3'),
(39, 'superb', 'lab_rep.php', 'active', 'gp7'),
(41, 'receptionist', 'index.php', 'active', 'gp1'),
(43, 'receptionist', 'newschedule.php', 'active', 'gp2'),
(44, 'receptionist', 'ticket_paym.php', 'active', 'gp2'),
(45, 'receptionist', 'receipt.php', 'active', 'gp2'),
(46, 'cashier', 'index.php', 'active', 'gp1'),
(47, 'cashier', '404.php', 'active', 'gp2'),
(48, 'cashier', 'ticket_paym.php', 'active', 'gp2'),
(49, 'cashier', 'receipt.php', 'active', 'gp2'),
(52, 'labtech', 'staff_payslip.php', 'active', 'gp5'),
(54, 'superb', 'ticket_invoice.php', 'active', 'gp7'),
(56, 'superb', 'inv_print.php', 'active', 'gp7'),
(57, 'labtech', 'ticket_invoice.php', 'active', 'gp7'),
(58, 'labtech', 'inv_print.php', 'active', 'gp7'),
(59, 'MLS', 'index.php', 'active', 'gp1'),
(60, 'MLS', 'newschedule.php', 'active', 'gp2'),
(61, 'MLS', 'tickets.php', 'active', 'gp2'),
(62, 'MLS', 'process_ticket.php', 'active', 'gp2'),
(63, 'MLS', 'tick_print_preview.php', 'active', 'gp2'),
(64, 'MLS', 'ticket_paym.php', 'active', 'gp2'),
(65, 'MLS', 'receipt.php', 'active', 'gp2'),
(68, 'MLS', 'ticket_invoice.php', 'active', 'gp7'),
(69, 'MLS', 'inv_print.php', 'active', 'gp7'),
(70, 'labtech', 'ticket_updates.php', 'active', 'gp2'),
(71, 'MLS', 'ticket_updates.php', 'active', 'gp2'),
(72, 'MLS', '404.php', 'active', 'gp2'),
(73, 'MLT', 'index.php', 'active', 'gp1'),
(74, 'MLT', 'billingsys.php', 'active', 'gp2'),
(75, 'MLT', 'newschedule.php', 'active', 'gp2'),
(76, 'MLT', 'tickets.php', 'active', 'gp2'),
(77, 'MLT', 'process_ticket.php', 'active', 'gp2'),
(78, 'MLT', 'tick_print_preview.php', 'active', 'gp2'),
(79, 'MLT', 'ticket_paym.php', 'active', 'gp2'),
(80, 'MLT', 'receipt.php', 'active', 'gp2'),
(81, 'MLT', 'ticket_updates.php', 'active', 'gp2'),
(82, 'MLT', 'ticket_invoice.php', 'active', 'gp7'),
(83, 'MLT', 'inv_print.php', 'active', 'gp7'),
(85, 'receptionist', 'tickets.php', 'active', 'gp2'),
(87, 'receptionist', 'tick_print_preview.php', 'active', 'gp2'),
(91, 'labtech', 'tick_result_part_print.php', 'active', 'gp2'),
(92, 'MLT', 'tick_result_part_print.php', 'active', 'gp2'),
(93, 'MLS', 'tick_result_part_print.php', 'active', 'gp2'),
(94, 'receptionist', 'tick_result_part_print.php', 'active', 'gp2'),
(95, 'superb', 'tick_result_part_print.php', 'active', 'gp2'),
(96, 'MLT', 'tick_result_part_dnld.php', 'active', 'gp2'),
(97, 'labtech', 'tick_result_part_dnld.php', 'active', 'gp2'),
(98, 'MLS', 'tick_result_part_dnld.php', 'active', 'gp2'),
(99, 'receptionist', 'tick_result_part_dnld.php', 'active', 'gp2'),
(100, 'superb', 'tick_result_part_dnld.php', 'active', 'gp2'),
(101, 'superb', 'ticket_invoice_upd.php', 'active', 'gp7'),
(102, 'labtech', 'ticket_invoice_upd.php', 'active', 'gp7'),
(103, 'MLT', 'ticket_invoice_upd.php', 'active', 'gp7'),
(104, 'MLS', 'ticket_invoice_upd.php', 'active', 'gp7'),
(107, 'superb', 'customers.php', 'active', 'gp1'),
(108, 'consultant', 'index.php', 'active', 'gp1'),
(109, 'superb', 'adm_profile.php', 'active', 'gp3'),
(110, 'consultant', 'tick_coment_setup.php', 'active', 'gp2'),
(114, 'superb', 'bbsettings.php', 'active', 'gp6'),
(115, 'superb', 'blood_donation_result.php', 'active', 'gp2'),
(116, 'superb', 'donors.php', 'active', 'gp6'),
(117, 'receptionist', 'donors.php', 'active', 'gp6'),
(118, 'labtech', 'donors.php', 'active', 'gp6'),
(119, 'MLS', 'donors.php', 'active', 'gp6'),
(121, 'superb', 'bloodstocks.php', 'active', 'gp6'),
(122, 'receptionist', 'bloodstocks.php', 'active', 'gp6'),
(123, 'MLS', 'bloodstocks.php', 'active', 'gp6'),
(124, 'labtech', 'blood_donation_result.php', 'active', 'gp2'),
(125, 'receptionist', 'customers.php', 'active', 'gp1'),
(126, 'labtech', 'customers.php', 'active', 'gp1'),
(127, 'consultant', 'customers.php', 'active', 'gp1'),
(129, 'consultant', 'billingsys.php', 'active', 'gp2'),
(130, 'consultant', '404.php', 'active', 'gp2'),
(131, 'consultant', 'newschedule.php', 'active', 'gp2'),
(132, 'consultant', 'tickets.php', 'active', 'gp2'),
(133, 'consultant', 'process_ticket.php', 'active', 'gp2'),
(134, 'consultant', 'tick_print_preview.php', 'active', 'gp2'),
(135, 'consultant', 'ticket_paym.php', 'active', 'gp2'),
(136, 'consultant', 'receipt.php', 'active', 'gp2'),
(137, 'consultant', 'ticket_updates.php', 'active', 'gp2'),
(138, 'consultant', 'tick_result_part_print.php', 'active', 'gp2'),
(139, 'consultant', 'tick_result_part_dnld.php', 'active', 'gp2'),
(140, 'consultant', 'blood_donation_result.php', 'active', 'gp2'),
(141, 'consultant', 'bloodstocks.php', 'active', 'gp6'),
(142, 'consultant', 'stock_alloc.php', 'active', 'gp6'),
(143, 'consultant', 'bbsettings.php', 'active', 'gp6'),
(144, 'consultant', 'donors.php', 'active', 'gp6'),
(145, 'consultant', 'ticket_invoice.php', 'active', 'gp7'),
(146, 'consultant', 'lab_rep.php', 'active', 'gp7'),
(147, 'consultant', 'fin_rep.php', 'active', 'gp7'),
(148, 'consultant', 'salary_report.php', 'active', 'gp7'),
(149, 'consultant', 'inv_print.php', 'active', 'gp7'),
(150, 'consultant', 'ticket_invoice_upd.php', 'active', 'gp7'),
(151, 'superb', 'ntdtht', 'active', 'gp1'),
(152, 'superb', 'ticket_updates.php', 'active', 'gp2'),
(153, 'superb', 'tick_coment_setup.php', 'active', 'gp2'),
(154, 'superb', 'fin_rep.php', 'active', 'gp7'),
(155, 'superb', 'salary_report.php', 'active', 'gp7');

-- --------------------------------------------------------

--
-- Table structure for table `recipients`
--

CREATE TABLE `recipients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `blood_type_needed` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `required_volume_ml` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `sn` int(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `id` varchar(50) NOT NULL DEFAULT '',
  `c_by` varchar(50) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `del_by` varchar(50) DEFAULT NULL,
  `date_del` date DEFAULT NULL,
  `time_del` time DEFAULT NULL,
  `upd_by` varchar(50) DEFAULT NULL,
  `date_upd` date DEFAULT NULL,
  `time_upd` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`sn`, `name`, `id`, `c_by`, `date_c`, `time_c`, `status`, `del_by`, `date_del`, `time_del`, `upd_by`, `date_upd`, `time_upd`) VALUES
(1, 'Super Admin', 'superb', 's6068', '0000-00-00', '00:00:00', 'active', '', '0000-00-00', '00:00:00', 's6068', '2019-11-26', '03:48:43'),
(2, 'Doctor', 'doctor', 's6068', '2019-11-26', '03:55:11', 'inactive', 's6068', '2020-01-10', '11:37:22', '', '0000-00-00', '00:00:00'),
(3, 'Lab Technician', 'labtech', 's6068', '2020-01-10', '10:31:51', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-01-10', '10:33:44'),
(4, 'Receptionist', 'receptionist', 'yekeen', '2020-03-11', '11:07:37', 'active', '', '0000-00-00', '00:00:00', 's6068', '2024-10-06', '11:53:13'),
(5, 'Cashier', 'cashier', 'yekeen', '2020-03-11', '11:13:56', 'active', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(6, 'Medical Laboratory Scientist', 'MLS', '3571', '2020-04-04', '15:59:30', 'active', 's6068', '2022-09-29', '06:00:36', '', '0000-00-00', '00:00:00'),
(7, 'Laboratory Technologist', 'MLT', '3571', '2020-04-05', '12:41:20', 'inactive', 's6068', '2022-09-29', '06:01:46', '', '0000-00-00', '00:00:00'),
(8, 'Consultant', 'consultant', 's6068', '2022-09-17', '13:51:34', 'active', NULL, NULL, NULL, 'Taimobola', '2026-02-09', '12:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `salary_allowance_bodies`
--

CREATE TABLE `salary_allowance_bodies` (
  `sn` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary_allowance_bodies`
--

INSERT INTO `salary_allowance_bodies` (`sn`, `name`, `status`) VALUES
(1, 'Hazard Allowance', 'active'),
(2, 'Travel Allowance', 'active'),
(3, 'Overtime Allowance', 'active'),
(4, 'Responsibility Allowance', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `salary_debit_bodies`
--

CREATE TABLE `salary_debit_bodies` (
  `sn` int(5) NOT NULL,
  `body_name` varchar(200) NOT NULL,
  `paym_type` enum('credit','debit') NOT NULL DEFAULT 'debit',
  `bank_name_id` int(3) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_no` varchar(16) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary_debit_bodies`
--

INSERT INTO `salary_debit_bodies` (`sn`, `body_name`, `paym_type`, `bank_name_id`, `account_name`, `account_no`, `status`) VALUES
(1, 'Tax', 'debit', 6, 'Kwara State IRS', '2041291407', 'active'),
(2, 'Water', 'debit', 15, 'HRM Water Resource', '2041291407', 'inactive'),
(3, 'Pension', 'debit', 14, 'HRM Pension Deposits', '0764337055', 'active'),
(4, 'Housing Loan', 'debit', 1, 'HRM Coperative', '1102259742', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `sibling_type`
--

CREATE TABLE `sibling_type` (
  `sn` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sibling_type`
--

INSERT INTO `sibling_type` (`sn`, `name`, `status`) VALUES
(1, 'Wife', 'active'),
(2, 'Husband', 'active'),
(3, 'First Child', 'active'),
(4, 'Second Child', 'active'),
(5, 'Third child', 'active'),
(6, 'Fourth Child', 'active'),
(7, 'C/O', 'active'),
(8, 'Mother', 'active'),
(9, 'Father', 'active'),
(10, 'child', 'active'),
(11, 'Fifth Child', 'active'),
(12, 'Sixth child', 'active'),
(13, 'Brother', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `specialist_report`
--

CREATE TABLE `specialist_report` (
  `sn` int(11) NOT NULL,
  `ticket_no` varchar(30) NOT NULL,
  `customer_id` varchar(30) NOT NULL,
  `bill_type_id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `c_by` varchar(100) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `finalized` enum('yes','no') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specimen_result_template`
--

CREATE TABLE `specimen_result_template` (
  `sn` int(10) NOT NULL,
  `bill_type_id` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `temp_type` enum('text_form','param_form') DEFAULT NULL,
  `raw_text_val` longtext DEFAULT NULL,
  `result` varchar(255) DEFAULT '',
  `has_unit` enum('true','false') DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `has_ref_val` enum('true','false') DEFAULT NULL,
  `ref_val` varchar(100) DEFAULT NULL,
  `age_range` enum('infant','youth','adult') DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(50) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `time_del` varchar(32) DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `upd_by` varchar(50) DEFAULT NULL,
  `date_upd` date DEFAULT NULL,
  `time_upd` time DEFAULT NULL,
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `specimen_result_template`
--

INSERT INTO `specimen_result_template` (`sn`, `bill_type_id`, `name`, `temp_type`, `raw_text_val`, `result`, `has_unit`, `unit`, `has_ref_val`, `ref_val`, `age_range`, `status`, `c_by`, `date_c`, `time_del`, `time_c`, `upd_by`, `date_upd`, `time_upd`, `del_by`, `date_del`) VALUES
(1, '6', 'FBS', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.5 - 6.0', 'adult', 'active', 's6068', '2019-12-17', '', '10:26:08', 's6068', '2020-01-10', '12:00:01', '', ''),
(2, '7', 'Total Bilirubin', 'param_form', '', '', 'true', '<p>mg/dl</p>', 'true', 'up to 1.2', 'adult', 'active', 's6068', '2019-12-18', '', '14:52:44', 's6068', '2020-01-08', '04:19:51', '', ''),
(3, '7', 'Direct Bilirubin', 'param_form', '', '', 'true', '<p>mg/dl</p>', 'true', 'up to 0.4', 'adult', 'active', 's6068', '2019-12-18', '', '14:53:10', 's6068', '2020-01-08', '04:20:05', '', ''),
(4, '7', 'ALT', 'param_form', '', '', 'true', '<p>U/L</p>', 'true', 'up to 49', 'adult', 'active', 's6068', '2019-12-18', '', '14:53:47', 's6068', '2020-01-08', '04:20:17', '', ''),
(5, '7', 'AST', 'param_form', '', '', 'true', '<p>U/L</p>', 'true', 'up to 46', 'adult', 'active', 's6068', '2019-12-18', '', '14:54:05', 's6068', '2020-01-08', '04:22:38', '', ''),
(6, '7', 'ALP', 'param_form', '', '', 'true', '<p>U/L</p>', 'true', '64 - 306', 'adult', 'active', 's6068', '2019-12-18', '', '14:54:28', 's6068', '2020-01-08', '04:20:59', '', ''),
(7, '7', 'Total protein', 'param_form', '', '', 'true', '<p>g/L</p>', 'true', '62 - 80', 'adult', 'active', 's6068', '2019-12-18', '', '14:55:23', 's6068', '2020-01-08', '04:23:27', '', ''),
(8, '7', 'Albumin', 'param_form', '', '', 'true', '<p>g/L</p>', 'true', '35 - 50', 'adult', 'active', 's6068', '2019-12-18', '', '14:56:09', 's6068', '2020-01-08', '04:23:35', '', ''),
(9, '4', 'Thyrotropin (TSH)', 'param_form', '', '', '', '? IU/mL', '', '0.3 ? 4.2', 'adult', 'inactive', 's6068', '2019-12-20', '', '19:38:15', 's6068', '2019-12-20', '19:45:45', '', ''),
(10, '4', 'Free triiodothyronine (fT3)', 'param_form', '', '', '', 'pmol/L', '', '2.14 - 6.45', 'adult', 'inactive', 's6068', '2019-12-20', '', '19:39:14', '', '0000-00-00', '00:00:00', '', ''),
(11, '4', 'Free thyroxine(fT4)', 'param_form', '', '', '', 'pmol/L', '', '10.3 - 25.8', 'adult', 'inactive', 's6068', '2019-12-20', '', '19:40:39', '', '0000-00-00', '00:00:00', '', ''),
(12, '4', 'White blood cell', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2019-12-21', '', '06:44:40', 's6068', '2020-01-08', '04:29:00', '', ''),
(13, '4', 'Red blood cell', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2019-12-21', '', '06:45:01', 's6068', '2020-01-08', '04:29:21', '', ''),
(14, '4', 'Epithelial cells', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2019-12-21', '', '06:45:33', 's6068', '2020-01-08', '04:29:34', '', ''),
(15, '4', 'Cast', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2019-12-21', '', '06:45:53', 's6068', '2020-01-08', '04:29:48', '', ''),
(16, '4', 'Crystals', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2019-12-21', '', '06:46:09', 's6068', '2020-01-08', '04:30:05', '', ''),
(17, '4', 'Yeast cell', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2019-12-21', '', '06:46:27', 's6068', '2020-01-08', '04:30:48', '', ''),
(18, '4', 'S. haematobium', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2019-12-21', '', '06:46:48', '3571', '2020-12-02', '08:34:55', '', ''),
(19, '3', 'Lentiviral Screening', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2019-12-22', '', '06:31:57', 'desmondjohn', '2026-02-10', '14:53:10', '', ''),
(21, '34', 'WBC', 'param_form', '', '', 'true', '<p>10<sup>9</sup> / L</p>', 'true', '2.50 - 10.00', 'adult', 'active', 's6068', '2020-01-05', '', '00:36:48', 's6068', '2020-01-25', '08:51:11', '', ''),
(22, '34', 'Lymphocyte', 'param_form', '', '', 'true', '<p>%</p>', 'true', '25.00 - 40.00', 'adult', 'active', 's6068', '2020-01-05', '', '09:29:58', 's6068', '2020-01-25', '09:13:45', '', ''),
(23, '34', '45.00-50.00', 'param_form', '', '', 'true', '<p>%</p>', 'true', '45.00-50.00', 'adult', 'inactive', 's6068', '2020-01-05', '', '09:36:49', 's6068', '2020-01-05', '19:55:17', '', ''),
(24, '34', 'Granulocyte (neutrophil)', 'param_form', '', '', 'true', '<p>%</p>', 'true', '45.00 - 50.00', 'adult', 'active', 's6068', '2020-01-05', '', '09:40:33', 's6068', '2020-01-05', '19:55:29', '', ''),
(25, '34', 'MID', 'param_form', '', '', 'true', '<p>%</p>', 'true', '1.00 - 15.00', 'adult', 'active', 's6068', '2020-01-05', '', '09:45:57', 's6068', '2020-01-05', '19:55:39', '', ''),
(26, '34', 'HGB', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '13.00 - 16.50', 'adult', 'active', 's6068', '2020-01-05', '', '12:18:56', 's6068', '2020-01-25', '09:17:14', '', ''),
(27, '34', 'RBC', 'param_form', '', '', 'true', '<p>10<sup>12</sup> / L</p>', 'true', '4.5 - 6.5', 'adult', 'active', 's6068', '2020-01-05', '', '18:28:08', 's6068', '2020-01-25', '09:21:39', '', ''),
(28, '42', 'HBV DNA Copies', 'param_form', '', '', 'true', '<p>Copies/mL</p>', 'false', '', 'adult', 'active', 's6068', '2020-01-18', '', '13:03:33', '', '0000-00-00', '00:00:00', '', ''),
(29, '42', 'Units', 'param_form', '', '', 'true', '<p>IU/mL</p>', 'false', '', 'adult', 'active', 's6068', '2020-01-18', '', '13:04:08', '', '0000-00-00', '00:00:00', '', ''),
(30, '42', 'Log 10', 'param_form', '', '', 'true', '<p>IU/mL</p>', 'false', '', 'adult', 'active', 's6068', '2020-01-18', '', '13:04:48', '3571', '2020-05-16', '18:03:11', '', ''),
(31, '42', 'Lower limit of detection (LOD)', 'param_form', '', '', 'true', '<p>IU/mL</p>', 'false', '', 'adult', 'active', 's6068', '2020-01-18', '', '13:06:19', '3571', '2020-04-15', '13:22:54', '', ''),
(32, '34', 'HCT (PCV)', 'param_form', '', '', 'true', '<p>%</p>', 'true', '40.00 - 55.00', 'adult', 'active', 's6068', '2020-01-18', '', '13:12:16', '', '0000-00-00', '00:00:00', '', ''),
(33, '34', 'MCHC', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '32.00 - 36.00', 'adult', 'active', 's6068', '2020-01-18', '', '13:12:59', '', '0000-00-00', '00:00:00', '', ''),
(34, '34', 'MCH', 'param_form', '', '', 'true', '<p>pg</p>', 'true', '27.00 - 32.00', 'adult', 'active', 's6068', '2020-01-18', '', '13:13:55', '', '0000-00-00', '00:00:00', '', ''),
(35, '34', 'MCV', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '76.00 - 96.00', 'adult', 'active', 's6068', '2020-01-18', '', '13:14:26', '', '0000-00-00', '00:00:00', '', ''),
(36, '34', 'RDW-CV', 'param_form', '', '', 'true', '<p>%</p>', 'true', '10.00 - 15.00', 'adult', 'active', 's6068', '2020-01-18', '', '13:15:04', '', '0000-00-00', '00:00:00', '', ''),
(37, '34', 'RDW-SD', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '35.00 - 56.00', 'adult', 'active', 's6068', '2020-01-18', '', '13:15:42', '', '0000-00-00', '00:00:00', '', ''),
(38, '34', 'Platelets', 'param_form', '', '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '150.00 - 450.00', 'adult', 'active', 's6068', '2020-01-18', '', '13:16:57', '', '0000-00-00', '00:00:00', '', ''),
(39, '43', 'Anti-HBc(IgM hepatitis B core antibody)', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-21', '', '13:57:16', 's6068', '2020-01-21', '13:57:39', '', ''),
(40, '44', 'HbsAg Quantification', 'param_form', '', '', 'true', '<p>IU/mL</p>', 'true', '&lt; 5', 'adult', 'active', 's6068', '2020-01-21', '', '14:13:40', 's6068', '2020-01-21', '18:13:48', '', ''),
(41, '45', 'HbsAg (Hepatitis B surface antigen)', 'param_form', '', '', 'false', '', 'false', '', 'youth', 'active', 's6068', '2020-01-21', '', '14:21:15', '', '0000-00-00', '00:00:00', '', ''),
(42, '45', 'Anti-HBc (Total hepatitis B core antibody)', 'param_form', '', '', 'false', '', 'false', '', 'youth', 'active', 's6068', '2020-01-21', '', '14:22:36', '', '0000-00-00', '00:00:00', '', ''),
(43, '45', 'Anti-HBs (Hepatitis B surface antibody)', 'param_form', '', '', 'false', '', 'false', '', 'youth', 'active', 's6068', '2020-01-21', '', '14:23:53', '', '0000-00-00', '00:00:00', '', ''),
(44, '45', 'HBeAg (Hepatitis B envelop antigen)', 'param_form', '', '', 'false', '', 'false', '', 'youth', 'active', 's6068', '2020-01-21', '', '14:26:04', '', '0000-00-00', '00:00:00', '', ''),
(45, '45', 'Anti-HBe (Hepatitis B envelop antibody', 'param_form', '', '', 'false', '', 'false', '', 'youth', 'active', 's6068', '2020-01-21', '', '14:27:20', '', '0000-00-00', '00:00:00', '', ''),
(46, '15', 'Malaria Parasite (RDT)', 'param_form', '', '', 'false', '', 'false', '', 'youth', 'active', 's6068', '2020-01-21', '', '14:31:06', '3571', '2020-04-20', '14:35:21', '', ''),
(47, '46', 'Salmonella Test:', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-21', '', '14:37:43', 'Bolaji', '2020-05-20', '15:04:21', '', ''),
(48, '46', 'Salomonella typhi IgM antibody', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-21', '', '14:40:12', '', '0000-00-00', '00:00:00', '', ''),
(49, '46', 'Salomonella typhi IgG antibody', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-21', '', '14:41:02', '', '0000-00-00', '00:00:00', '', ''),
(50, '47', 'Appearance', 'param_form', '', '', 'false', '', 'true', 'Opalescent  white / Lightly yellow', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:03:13', 's6068', '2020-01-25', '09:47:09', '', ''),
(51, '47', 'Volume', 'param_form', '', '', 'true', '<p>mL</p>', 'true', '?1.5', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:05:18', '', '0000-00-00', '00:00:00', '', ''),
(52, '47', 'Liquefaction', 'param_form', '', '', 'false', '', 'true', 'Complete in 60 minutes', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:06:50', 's6068', '2020-01-25', '09:53:00', '', ''),
(53, '47', 'Viscosity', 'param_form', '', '', 'false', '', 'true', 'Normaviscous', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:08:17', 's6068', '2020-01-25', '09:36:46', '', ''),
(54, '47', 'pH', 'param_form', '', '', 'false', '', 'true', '&gt;7.1', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:09:14', 's6068', '2020-01-25', '09:47:37', '', ''),
(55, '47', 'Motility', 'param_form', '', '', 'true', '<p>%</p>', 'true', '? 32% progressive motility', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:13:34', 's6068', '2020-01-25', '09:52:01', '', ''),
(56, '47', 'Linear Progrssive', 'param_form', '', '', 'false', '<p>%</p>', 'false', '', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:14:11', '', '0000-00-00', '00:00:00', '', ''),
(57, '47', 'Nonlinear Progressive', 'param_form', '', '', 'false', '<p>%</p>', 'false', '', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:14:45', '', '0000-00-00', '00:00:00', '', ''),
(58, '47', 'Non Progressive', 'param_form', '', '', 'false', '<p>%</p>', 'false', '', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:15:12', '', '0000-00-00', '00:00:00', '', ''),
(59, '47', 'Non-motile', 'param_form', '', '', 'false', '<p>%</p>', 'false', '', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:15:37', '', '0000-00-00', '00:00:00', '', ''),
(60, '47', 'Sperm Count', 'param_form', '', '', 'true', '<p>x10<sup>6</sup> cell/mL</p>', 'true', '?15.0', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:18:07', '', '0000-00-00', '00:00:00', '', ''),
(61, '47', 'Morphology', 'param_form', '', '', 'true', '<p>% (normal)</p>', 'true', '? 4', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:19:16', 's6068', '2020-01-25', '09:54:31', '', ''),
(62, '47', 'Pus cells', 'param_form', '', '', 'true', '<p>Cells/HPF</p>', 'true', '&lt; 5', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:21:34', '', '0000-00-00', '00:00:00', '', ''),
(63, '48', 'Appearance', 'param_form', '', '', 'true', '<p>.</p>', 'true', 'Opalescent white/ Lightly yellow', 'adult', 'active', 's6068', '2020-01-21', '', '17:26:19', '3571', '2020-05-09', '11:08:10', '', ''),
(64, '48', 'Volume', 'param_form', '', '', 'true', '<p>mL</p>', 'true', '&gt;1.5', 'adult', 'active', 's6068', '2020-01-21', '', '17:27:23', 'Bolaji', '2020-05-08', '18:29:12', '', ''),
(65, '48', 'Liquefaction', 'param_form', '', '', 'false', '', 'true', 'Complete in 60 minutes', 'adult', 'active', 's6068', '2020-01-21', '', '17:28:31', 's6068', '2020-01-25', '10:00:03', '', ''),
(66, '48', 'Viscosity', 'param_form', '', '', 'false', '', 'true', 'Normoviscous', 'adult', 'active', 's6068', '2020-01-21', '', '17:29:21', 's6068', '2020-01-25', '10:01:55', '', ''),
(67, '48', 'pH', 'param_form', '', '', 'true', '<p>-</p>', 'true', '&gt;7.2', 'adult', 'active', 's6068', '2020-01-21', '', '17:30:13', 'Bolaji', '2020-05-08', '18:30:42', '', ''),
(68, '48', 'Motility', 'param_form', '', '', 'true', '<p>%</p>', 'true', '&gt; 40 Progressive motility', 'adult', 'active', 's6068', '2020-01-21', '', '17:35:51', 'Bolaji', '2020-05-08', '18:31:17', '', ''),
(69, '48', 'Progressive', 'param_form', '', '', 'true', '<p>%</p>', 'true', '.', 'adult', 'active', 's6068', '2020-01-21', '', '17:36:31', '3571', '2020-05-28', '16:06:31', '', ''),
(70, '48', 'Nonlinear Progressive', 'param_form', '', '', 'false', '<p>%</p>', 'false', '', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:36:58', '', '0000-00-00', '00:00:00', '', ''),
(71, '48', 'Non Progressive', 'param_form', '', '', 'false', '<p>%</p>', 'false', '', 'adult', 'active', 's6068', '2020-01-21', '', '17:37:29', '', '0000-00-00', '00:00:00', '', ''),
(72, '48', 'Non-motile', 'param_form', '', '', 'false', '<p>%</p>', 'false', '', 'adult', 'active', 's6068', '2020-01-21', '', '17:37:54', '', '0000-00-00', '00:00:00', '', ''),
(73, '48', 'Sperm Count', 'param_form', '', '', 'true', '<p>x10<sup>6</sup> cell/mL</p>', 'true', '&gt;15.0', 'adult', 'active', 's6068', '2020-01-21', '', '17:39:30', 'Bolaji', '2020-05-08', '18:31:31', '', ''),
(74, '48', 'Morphology', 'param_form', '', '', 'true', '<p>% (normal)</p>', 'true', '&gt; 4', 'adult', 'active', 's6068', '2020-01-21', '', '17:40:32', 'Bolaji', '2020-05-08', '18:31:57', '', ''),
(75, '48', 'Pus cells', 'param_form', '', '', 'true', '<p>Cells/HPF</p>', 'true', '&lt; 5', 'adult', 'active', 's6068', '2020-01-21', '', '17:41:43', '', '0000-00-00', '00:00:00', '', ''),
(76, '49', 'Helicobacter Pylori antigen', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-21', '', '17:42:57', '3571', '2020-05-04', '14:01:30', '', ''),
(77, '50', 'HbsAg (Hepatitis B surface antigen)', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-21', '', '17:44:45', '3571', '2020-04-15', '13:39:03', '', ''),
(78, '50', 'Anti-HCV (Hepatitis C Virus antigen)', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-21', '', '17:45:44', '3571', '2020-04-15', '13:39:15', '', ''),
(79, '50', 'HIV 1/2 antibody', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'inactive', 's6068', '2020-01-21', '', '17:46:34', '3571', '2020-04-15', '13:40:06', '', ''),
(80, '20', 'Faecal occult blood', 'param_form', '', '', 'false', '<p>IU/mL</p>', 'false', '', 'adult', 'active', 's6068', '2020-01-21', '', '18:28:09', '', '0000-00-00', '00:00:00', '', ''),
(81, '51', 'Progesterone', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '3.0 - 30.0', 'adult', 'active', 's6068', '2020-01-21', '', '18:33:13', 's6068', '2020-01-21', '18:33:52', '', ''),
(82, '52', 'Serum Pregnancy Test', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-21', '', '18:37:33', '', '0000-00-00', '00:00:00', '', ''),
(83, '54', 'PSA', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '0-4.5', 'adult', 'active', 's6068', '2020-01-21', '', '18:45:22', 'desmondjohn', '2026-02-10', '15:25:40', '', ''),
(84, '53', 'Serum Alpha Fetoprotein', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '0-20', 'adult', 'active', 's6068', '2020-01-21', '', '18:47:01', '', '0000-00-00', '00:00:00', '', ''),
(85, '14', 'Glycated Haemoglobin', 'param_form', '', '', 'true', '<p>%</p>', 'true', '4.0 - 6.5', 'adult', 'active', 's6068', '2020-01-21', '', '18:48:19', 'Bolaji', '2020-05-07', '14:40:58', '', ''),
(86, '10', 'Total Cholesterol', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '3.89-5.7 (&lt; 5.2 desirable)', 'adult', 'active', 's6068', '2020-01-21', '', '19:06:31', '3571', '2020-04-24', '13:52:29', '', ''),
(87, '10', 'HDL-C', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.91-1.43 (&gt;1.0 desirable)', 'adult', 'active', 's6068', '2020-01-21', '', '19:07:39', '3571', '2020-04-24', '13:57:41', '', ''),
(88, '10', 'LDL-C', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '&lt; 4.0 desirable', 'adult', 'active', 's6068', '2020-01-21', '', '19:08:54', '3571', '2020-04-24', '13:58:13', '', ''),
(89, '10', 'Triglyceride', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.3-1.7 (&lt; 2.0 desirable)', 'adult', 'active', 's6068', '2020-01-21', '', '19:09:52', 'desmondjohn', '2026-02-10', '14:43:42', '', ''),
(90, '55', 'Total Bilirubin', 'param_form', '', '', 'true', '<p>mg/dL</p>', 'true', 'Up to 1.2', 'infant', 'active', 's6068', '2020-01-21', '', '19:16:00', 's6068', '2020-01-21', '19:16:12', '', ''),
(91, '55', 'Direct Bilirubin', 'param_form', '', '', 'true', '<p>mg/dL</p>', 'true', 'Up to 0.4', 'infant', 'active', 's6068', '2020-01-21', '', '19:17:08', '', '0000-00-00', '00:00:00', '', ''),
(92, '13', 'Urinalysis', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'inactive', 's6068', '2020-01-22', '', '10:58:17', '', '0000-00-00', '00:00:00', '', ''),
(93, '13', 'Urobilinogen', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '10:58:56', '', '0000-00-00', '00:00:00', '', ''),
(94, '13', 'Bilirubin', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '10:59:15', '', '0000-00-00', '00:00:00', '', ''),
(95, '13', 'Ketone', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '10:59:37', '', '0000-00-00', '00:00:00', '', ''),
(96, '13', 'Blood', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '10:59:55', '', '0000-00-00', '00:00:00', '', ''),
(97, '13', 'Protein', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '11:00:13', '', '0000-00-00', '00:00:00', '', ''),
(98, '13', 'Nitrite', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '11:00:46', '', '0000-00-00', '00:00:00', '', ''),
(99, '13', 'Leukocytes', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '11:01:11', '3571', '2020-04-04', '15:31:44', '', ''),
(100, '13', 'Glucose', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '11:01:29', '', '0000-00-00', '00:00:00', '', ''),
(101, '13', 'Specific gravity', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '11:02:00', '', '0000-00-00', '00:00:00', '', ''),
(102, '56', 'Thyroid function test', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '11:03:59', '', '0000-00-00', '00:00:00', '', ''),
(103, '56', 'Thyrotropin (TSH)', 'param_form', '', '', 'true', '<p>&mu;IU/mL</p>', 'true', '0.39 - 6.16', 'adult', 'active', 's6068', '2020-01-22', '', '11:06:19', 'Bolaji', '2020-07-02', '17:59:40', '', ''),
(104, '56', 'Total triiodothyronine (TT3)', 'param_form', '', '', 'true', '<p>nmol/L</p>', 'true', '1.3 - 3.1', 'adult', 'active', 's6068', '2020-01-22', '', '11:08:07', '3571', '2020-06-27', '11:42:05', '', ''),
(105, '56', 'Total thyroxine (TT4)', 'param_form', '', '', 'true', '<p>nmol/L</p>', 'true', '66 - 181', 'adult', 'active', 's6068', '2020-01-22', '', '11:09:05', '3571', '2020-06-27', '11:42:20', '', ''),
(106, '57', 'Thyroid Function Test', 'param_form', '', '', 'false', '<p>nmol/L</p>', 'false', '', 'adult', 'inactive', 's6068', '2020-01-22', '', '11:10:22', '3571', '2020-04-17', '16:04:31', '', ''),
(107, '57', 'Thyrotropin (TSH)', 'param_form', '', '', 'true', '<p>&mu;IU/mL</p>', 'true', '0.39 - 6.16', 'adult', 'active', 's6068', '2020-01-22', '', '11:12:02', '', '0000-00-00', '00:00:00', '', ''),
(108, '57', 'Free triiodothyronine (fT3)', 'param_form', '', '', 'true', '<p>pmol/L</p>', 'true', '2.14 - 6.45', 'adult', 'active', 's6068', '2020-01-22', '', '11:13:14', '', '0000-00-00', '00:00:00', '', ''),
(109, '57', 'Free thyroxine (fT4)', 'param_form', '', '', 'true', '<p>pmol/L</p>', 'true', '10.3 - 25.8', 'adult', 'active', 's6068', '2020-01-22', '', '11:14:15', '', '0000-00-00', '00:00:00', '', ''),
(110, '58', 'Hormonal Profile', 'param_form', '', '', 'true', '<p>.</p>', 'true', '.', 'adult', 'active', 's6068', '2020-01-22', '', '11:28:08', '3571', '2020-05-02', '15:14:37', '', ''),
(111, '58', 'FSH', 'param_form', '', '', 'true', '<p>mIU/mL</p>', 'true', '3.0 - 12.0', 'adult', 'active', 's6068', '2020-01-22', '', '11:29:06', '3571', '2022-01-11', '08:15:29', '', ''),
(112, '58', 'LH', 'param_form', '', '', 'true', '<p>mIU/mL</p>', 'true', '2.95 -13.65', 'adult', 'active', 's6068', '2020-01-22', '', '11:29:35', '3571', '2022-01-11', '08:16:02', '', ''),
(113, '58', 'Prolactin', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '4.60 - 25.07', 'adult', 'active', 's6068', '2020-01-22', '', '11:30:23', '3571', '2020-08-29', '11:05:12', '', ''),
(114, '58', 'Testostrone', 'param_form', '', '', 'true', '<p>pg/mL</p>', 'true', '2.5 - 10.0', 'adult', 'inactive', 's6068', '2020-01-22', '', '11:31:07', '', '0000-00-00', '00:00:00', '', ''),
(115, '63', 'Hormonal Profile', 'param_form', '', '', 'false', '', 'true', 'Follicular phase', 'adult', 'active', 's6068', '2020-01-22', '', '11:33:07', '3571', '2020-04-15', '12:17:27', '', ''),
(116, '63', 'FSH', 'param_form', '', '', 'true', '<p>mIU/mL</p>', 'true', '3.0 - 12.0', 'adult', 'active', 's6068', '2020-01-22', '', '11:34:14', '', '0000-00-00', '00:00:00', '', ''),
(117, '63', 'LH', 'param_form', '', '', 'true', '<p>mIU/mL</p>', 'true', '2.95 - 13.65', 'adult', 'active', 's6068', '2020-01-22', '', '11:34:45', '3571', '2020-04-15', '14:32:59', '', ''),
(118, '63', 'Prolactin', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '4.6 - 25.07', 'adult', 'active', 's6068', '2020-01-22', '', '11:35:48', '3571', '2020-04-15', '14:32:38', '', ''),
(119, '63', 'Estradiol', 'param_form', '', '', 'true', '<p>pg/mL</p>', 'true', '25 - 175', 'adult', 'active', 's6068', '2020-01-22', '', '11:36:46', 'Bolaji', '2020-10-07', '19:02:49', '', ''),
(120, '63', 'Testosterone', 'param_form', '', '', 'true', '<p>pg/mL</p>', 'true', '0.2 - 0.95', 'adult', 'active', 's6068', '2020-01-22', '', '11:37:37', '3571', '2020-04-15', '14:45:54', '', ''),
(121, '63', 'Progesterone', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '3.0 - 30.0', 'adult', 'active', 's6068', '2020-01-22', '', '11:38:38', 'Bolaji', '2020-10-06', '18:47:48', '', ''),
(122, '60', 'Sodium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '135 - 155', 'infant', 'inactive', 's6068', '2020-01-22', '', '11:40:37', '', '0000-00-00', '00:00:00', '', ''),
(123, '60', 'Potassium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '3.0 - 5.0', 'infant', 'inactive', 's6068', '2020-01-22', '', '11:41:10', '', '0000-00-00', '00:00:00', '', ''),
(124, '60', 'Bicarbonate', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '20 - 31', 'infant', 'inactive', 's6068', '2020-01-22', '', '11:41:47', '', '0000-00-00', '00:00:00', '', ''),
(125, '60', 'Creatinine', 'param_form', '', '', 'true', '<p>&mu;mol/L</p>', 'true', '17.7 - 70.7', 'infant', 'inactive', 's6068', '2020-01-22', '', '11:42:56', '', '0000-00-00', '00:00:00', '', ''),
(126, '60', 'Urea', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.0 - 6.5', 'infant', 'inactive', 's6068', '2020-01-22', '', '11:43:30', 'Bolaji', '2020-05-20', '14:16:14', '', ''),
(127, '61', 'Sodium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '135 - 155', 'adult', 'active', 's6068', '2020-01-22', '', '11:46:00', 'Bolaji', '2022-04-14', '09:08:29', '', ''),
(128, '61', 'Potassium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '3.0 - 5.0', 'adult', 'active', 's6068', '2020-01-22', '', '11:46:35', 'Bolaji', '2022-04-14', '09:08:01', '', ''),
(129, '61', 'Bicarbonate', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '20 - 31', 'adult', 'inactive', 's6068', '2020-01-22', '', '11:47:08', '', '0000-00-00', '00:00:00', '', ''),
(130, '61', 'Creatinine', 'param_form', '', '', 'true', '<p>&mu;mol/L</p>', 'true', '53 - 106', 'adult', 'inactive', 's6068', '2020-01-22', '', '11:48:25', '', '0000-00-00', '00:00:00', '', ''),
(131, '61', 'Urea', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.5', 'adult', 'inactive', 's6068', '2020-01-22', '', '11:49:07', '3571', '2020-04-10', '12:47:05', '', ''),
(132, '59', 'Sodium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '135 - 155', 'adult', 'active', 's6068', '2020-01-22', '', '11:51:44', '', '0000-00-00', '00:00:00', '', ''),
(133, '59', 'Potassium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '3.0 - 5.0', 'adult', 'active', 's6068', '2020-01-22', '', '11:52:30', '', '0000-00-00', '00:00:00', '', ''),
(134, '59', 'Bicarbonate', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '20 - 31', 'adult', 'inactive', 's6068', '2020-01-22', '', '11:53:18', '', '0000-00-00', '00:00:00', '', ''),
(135, '59', 'Creatinine', 'param_form', '', '', 'true', '<p>&mu;mol/L</p>', 'true', '53 - 106', 'adult', 'inactive', 's6068', '2020-01-22', '', '11:54:26', '', '0000-00-00', '00:00:00', '', ''),
(136, '59', 'Urea', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.5 - 6.5', 'adult', 'inactive', 's6068', '2020-01-22', '', '11:55:32', '', '0000-00-00', '00:00:00', '', ''),
(137, '59', 'Calcium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.2 - 2.7', 'adult', 'active', 's6068', '2020-01-22', '', '11:56:54', '', '0000-00-00', '00:00:00', '', ''),
(138, '59', 'Phosphate', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.8 - 1.4', 'adult', 'active', 's6068', '2020-01-22', '', '11:57:50', '', '0000-00-00', '00:00:00', '', ''),
(139, '62', 'Sodium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '135 - 155', 'adult', 'active', 's6068', '2020-01-22', '', '12:02:16', '', '0000-00-00', '00:00:00', '', ''),
(140, '62', 'Potassium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '3.0 - 5.0', 'adult', 'active', 's6068', '2020-01-22', '', '12:03:11', '', '0000-00-00', '00:00:00', '', ''),
(141, '62', 'Bicarbonate', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '20 - 31', 'adult', 'active', 's6068', '2020-01-22', '', '12:04:05', '', '0000-00-00', '00:00:00', '', ''),
(142, '62', 'Creatinine', 'param_form', '', '', 'true', '<p>&mu;mol/L</p>', 'true', '53 - 106', 'adult', 'active', 's6068', '2020-01-22', '', '12:04:59', '', '0000-00-00', '00:00:00', '', ''),
(143, '62', 'Urea', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.5 - 6.5', 'adult', 'active', 's6068', '2020-01-22', '', '12:05:50', '', '0000-00-00', '00:00:00', '', ''),
(144, '62', 'Calcium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.2 - 2.7', 'adult', 'active', 's6068', '2020-01-22', '', '12:06:42', '', '0000-00-00', '00:00:00', '', ''),
(145, '62', 'Phosphate', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.6 - 1.4', 'adult', 'active', 's6068', '2020-01-22', '', '12:07:39', '3571', '2020-05-14', '16:27:44', '', ''),
(146, '62', 'Albumin', 'param_form', '', '', 'true', '<p>g/L</p>', 'true', '35 - 50', 'adult', 'active', 's6068', '2020-01-22', '', '12:08:29', '', '0000-00-00', '00:00:00', '', ''),
(147, '64', 'Sodium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '135 - 155', 'adult', 'active', 's6068', '2020-01-22', '', '12:10:03', '', '0000-00-00', '00:00:00', '', ''),
(148, '64', 'Potassium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '3.0 - 5.0', 'adult', 'active', 's6068', '2020-01-22', '', '12:10:37', '', '0000-00-00', '00:00:00', '', ''),
(149, '64', 'Bicarbonate', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '20 - 31', 'adult', 'active', 's6068', '2020-01-22', '', '12:11:19', '', '0000-00-00', '00:00:00', '', ''),
(150, '64', 'Creatinine', 'param_form', '', '', 'true', '<p>&mu;mol/L</p>', 'true', '53 - 106', 'adult', 'active', 's6068', '2020-01-22', '', '12:11:59', '', '0000-00-00', '00:00:00', '', ''),
(151, '64', 'Urea', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.5 - 6.5', 'adult', 'active', 's6068', '2020-01-22', '', '12:12:39', '', '0000-00-00', '00:00:00', '', ''),
(152, '64', 'Calcium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.2 - 2.7', 'adult', 'active', 's6068', '2020-01-22', '', '12:13:24', '', '0000-00-00', '00:00:00', '', ''),
(153, '64', 'Phosphate', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.8 - 1.4', 'adult', 'active', 's6068', '2020-01-22', '', '12:14:01', '', '0000-00-00', '00:00:00', '', ''),
(154, '64', 'Albumin', 'param_form', '', '', 'true', '<p>g/L</p>', 'true', '35 - 50', 'adult', 'inactive', 's6068', '2020-01-22', '', '12:14:39', '', '0000-00-00', '00:00:00', '', ''),
(155, '64', 'Uric acid', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.2 - 0.45', 'adult', 'active', 's6068', '2020-01-22', '', '12:15:45', '', '0000-00-00', '00:00:00', '', ''),
(156, '37', 'Genotype', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '12:23:26', 's6068', '2020-01-22', '12:27:02', '', ''),
(157, '36', 'Blood Group', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2020-01-22', '', '12:25:41', 's6068', '2020-01-22', '12:26:14', '', ''),
(158, '65', 'PCV', 'param_form', '', '', 'true', '<p>%</p>', 'true', '31.00 39.00', 'youth', 'active', 's6068', '2020-01-22', '', '12:33:27', 's6068', '2020-01-22', '12:33:42', '', ''),
(159, '66', 'PCV', 'param_form', '', '', 'true', '<p>%</p>', 'true', '37.00 - 47.00', 'adult', 'active', 's6068', '2020-01-22', '', '12:35:44', 'desmondjohn', '2026-02-10', '15:49:34', '', ''),
(160, '67', 'PCV', 'param_form', '', '', 'true', '<p>%</p>', 'true', '39.00 - 55.00', 'adult', 'inactive', 's6068', '2020-01-22', '', '12:36:51', 'desmondjohn', '2026-02-10', '15:46:47', '', ''),
(161, '40', 'Prothrombin Time (PT)', 'param_form', '', '', 'true', '<p>Seconds</p>', 'true', '10 -15', 'adult', 'active', 's6068', '2020-01-25', '', '08:32:52', '', '0000-00-00', '00:00:00', '', ''),
(162, '40', 'INR', 'param_form', '', '', 'true', '<p>-</p>', 'true', '0.8 - 1.2', 'adult', 'active', 's6068', '2020-01-25', '', '08:34:31', '', '0000-00-00', '00:00:00', '', ''),
(163, '40', 'Control', 'param_form', '', '', 'true', '<p>Seconds</p>', 'true', '-', 'adult', 'active', 's6068', '2020-01-25', '', '08:35:37', '', '0000-00-00', '00:00:00', '', ''),
(164, '39', 'APTT (PTTK)', 'param_form', '', '', 'true', '<p>Seconds</p>', 'true', '21 - 38', 'adult', 'active', 's6068', '2020-01-25', '', '08:41:19', '', '0000-00-00', '00:00:00', '', ''),
(165, '38', 'Erythrocyte Sedimentation Rate', 'param_form', '', '', 'true', '<p>mm/hr</p>', 'true', 'Up to 15', 'adult', 'active', 's6068', '2020-01-25', '', '08:44:37', 'desmondjohn', '2026-02-10', '15:54:47', '', ''),
(166, '68', 'ESR', 'param_form', '', '', 'true', '<p>mm/hr Westergren</p>', 'true', '0 - 7', 'adult', 'active', 's6068', '2020-01-25', '', '08:48:36', '', '0000-00-00', '00:00:00', '', ''),
(167, '69', 'WBC', 'param_form', '', '', 'true', '<p>10<sup>9</sup> / L</p>', 'true', '2.50 - 10 .00', 'adult', 'active', 's6068', '2020-01-25', '', '08:57:32', '', '0000-00-00', '00:00:00', '', ''),
(168, '69', 'Lymphocyte', 'param_form', '', '', 'true', '<p>%</p>', 'true', '25.00 - 40.00', 'adult', 'active', 's6068', '2020-01-25', '', '08:58:18', '', '0000-00-00', '00:00:00', '', ''),
(169, '69', 'Granulocyte (neutrophil)', 'param_form', '', '', 'true', '<p>%</p>', 'true', '45.00 - 55.00', 'adult', 'active', 's6068', '2020-01-25', '', '08:59:08', '', '0000-00-00', '00:00:00', '', ''),
(170, '69', 'MID', 'param_form', '', '', 'true', '<p>%</p>', 'true', '1.00 - 15.00', 'adult', 'active', 's6068', '2020-01-25', '', '09:00:00', '', '0000-00-00', '00:00:00', '', ''),
(171, '69', 'HGB', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '11.00 - 16.50', 'adult', 'active', 's6068', '2020-01-25', '', '09:01:39', 's6068', '2020-01-25', '09:03:07', '', ''),
(172, '69', 'RBC', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '3.8 - 4.8', 'adult', 'active', 's6068', '2020-01-25', '', '09:04:58', '', '0000-00-00', '00:00:00', '', ''),
(173, '69', 'HCT (PCV)', 'param_form', '', '', 'true', '<p>%</p>', 'true', '38.00 - 48.00', 'adult', 'active', 's6068', '2020-01-25', '', '09:06:47', '', '0000-00-00', '00:00:00', '', ''),
(174, '69', 'MCHC', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '32.00 - 36.00', 'adult', 'active', 's6068', '2020-01-25', '', '09:07:47', '', '0000-00-00', '00:00:00', '', ''),
(175, '69', 'MCH', 'param_form', '', '', 'true', '<p>Pg</p>', 'true', '27.00 - 32.00', 'adult', 'active', 's6068', '2020-01-25', '', '09:08:34', '', '0000-00-00', '00:00:00', '', ''),
(176, '69', 'MCV', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '76.00 - 96.00', 'adult', 'active', 's6068', '2020-01-25', '', '09:09:22', '3571', '2020-04-26', '11:30:49', '', ''),
(177, '69', 'RDW-CV', 'param_form', '', '', 'true', '<p>%</p>', 'true', '10.00 - 15.00', 'adult', 'active', 's6068', '2020-01-25', '', '09:09:58', '', '0000-00-00', '00:00:00', '', ''),
(178, '69', 'RDW-SD', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '35.00 - 56.00', 'adult', 'active', 's6068', '2020-01-25', '', '09:11:06', '', '0000-00-00', '00:00:00', '', ''),
(179, '69', 'Platelets', 'param_form', '', '', 'true', '<p>10<sup>9</sup> / L</p>', 'true', '150.00 - 450.00', 'adult', 'active', 's6068', '2020-01-25', '', '09:12:16', '', '0000-00-00', '00:00:00', '', ''),
(180, '35', 'Peripheral Blood Film', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'inactive', 's6068', '2020-01-25', '', '09:24:35', 's6068', '2020-01-25', '09:26:33', '', ''),
(181, '48', 'Vitality', 'param_form', '', '', 'true', '<p>%</p>', 'true', '?58', 'adult', 'inactive', 's6068', '2020-01-25', '', '10:07:35', '', '0000-00-00', '00:00:00', '', ''),
(182, '70', 'Stool Microscopy', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'inactive', 's6068', '2020-01-25', '', '10:20:20', '', '0000-00-00', '00:00:00', '', ''),
(183, '71', 'Culture', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'inactive', 's6068', '2020-01-25', '', '10:31:36', '', '0000-00-00', '00:00:00', '', ''),
(184, '41', '', 'text_form', '<table style=\"border-collapse: collapse; width: 665px; height: 224px; border-style: none;\">\n<tbody>\n<tr style=\"height: 224px;\">\n<td style=\"width: 649.444px; height: 224px;\">\n<p><strong>Microscopy: </strong>Wet preparation</p>\n<ul>\n<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;White blood cell: 2-4/HPF</li>\n<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Red blood cell: 1-2</li>\n<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Epithelial cells: 3-5/HPF</li>\n<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cast: Nil</li>\n<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Crystals: Nil</li>\n<li>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Yeast cell: Nil</li>\n<li>&middot;&nbsp; &nbsp; &nbsp; &nbsp; <em>S. haematobium</em> <em>: </em>Nil</li>\n</ul>\n</td>\n</tr>\n</tbody>\n</table>', '', '', '', '', '', '', 'inactive', 's6068', '2020-01-30', '', '14:21:33', 's6068', '2020-01-31', '23:03:35', '', ''),
(186, '1', 'err', 'param_form', '', '', 'true', '<p>fvfaeff f</p>', 'true', 'dvsdV', 'infant', 'inactive', 's6068', '2020-01-30', '', '17:56:46', 's6068', '2020-01-30', '18:03:31', '', ''),
(187, '1', 'rgtrwtwt', 'param_form', '', '', 'true', '<p>dvdvadsdvd</p>', 'true', 'vsdv', 'adult', 'inactive', 's6068', '2020-01-30', '', '18:04:04', 'desmondjohn', '2026-02-09', '13:51:31', '', ''),
(188, '2', '', 'text_form', '<div>hello mr. taiwo hope everything about the family is fine</div>\n<div>&nbsp;</div>\n<div>I travaled yesterday to Dubai, and thank God am back successfully</div>', '', '', '', '', '', '', 'inactive', 's6068', '2020-01-31', '', '19:30:38', 's6068', '2020-01-31', '23:47:48', '', ''),
(189, '17', '', 'text_form', '<p><span style=\"font-size: 18pt;\"><strong>Appearance:&nbsp;</strong></span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Microscopy: Gram smear</strong></span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; Pus cells: 2-8/HPF</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; Epithelial cells: 4-7/HPF</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; Gram positive cocci seen&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Culture:</strong>&nbsp;Yielded profuse growth of&nbsp;<em> Escherichia coli</em></span></p>\n<p><span style=\"font-size: 18pt;\">Amikacin - Sensitive&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cefepime&nbsp; - Sensitive&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Ciprofloxacin&nbsp; -&nbsp; Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gentamicin&nbsp; -&nbsp; Resistant&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Augmentin - Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ceftazidime- Sensitive</span></p>', '', '', '', '', '', '', 'active', 's6068', '2020-02-01', '', '00:24:58', '3571', '2022-04-23', '10:59:32', '', ''),
(190, '2', '', 'text_form', '<hr />\n<p><span style=\"font-family: \'comic sans ms\', sans-serif;\"><strong>Appearance : </strong>Whitish discharge on swab stick</span></p>\n<hr />\n<p><span style=\"font-family: \'comic sans ms\', sans-serif;\"><strong>Microscopy: </strong></span></p>\n<ul>\n<li><span style=\"font-family: \'comic sans ms\', sans-serif;\"><strong>Wet preparation</strong>: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pus cells: 10-25/HPF</span></li>\n</ul>\n<p><span style=\"font-family: \'comic sans ms\', sans-serif;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Epithelial cells: 7-15/HPF</span></p>\n<p><span style=\"font-family: \'comic sans ms\', sans-serif;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Red blood Cells: Nil</span></p>\n<ul>\n<li><span style=\"font-family: \'comic sans ms\', sans-serif;\"><strong>&nbsp; Gram smear:&nbsp; </strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Epithelial cells: Clue cells seen</span></li>\n</ul>\n<p><span style=\"font-family: \'comic sans ms\', sans-serif;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pus cells: Nil</span></p>\n<p><span style=\"font-family: \'comic sans ms\', sans-serif;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gram Negative bacilli and cocccobacilli seen</span></p>', '', '', '', '', '', '', 'active', 's6068', '2020-02-02', '', '01:44:34', 'yekeen', '2020-02-15', '15:42:23', '', ''),
(191, '70', '', 'text_form', '<table style=\"width: 531px; height: 220px;\">\n<tbody>\n<tr style=\"height: 53px;\">\n<td style=\"width: 516.219px; height: 53px;\">\n<p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: 18pt;\"><strong>Appearance: </strong>Semi-formed brownish stool inside universal bottle</span></p>\n</td>\n</tr>\n<tr style=\"height: 167px;\">\n<td style=\"width: 516.219px; height: 167px;\">\n<p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: 18pt;\"><strong>Microscopy: </strong>Wet preparation</span></p>\n<p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; White blood cell: Nil</span></p>\n<p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Red blood cell: Nil</span></p>\n<p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ova of parasite <em>: </em>Not seen</span></p>\n</td>\n</tr>\n</tbody>\n</table>', '', '', '', '', '', '', 'active', 'yekeen', '2020-02-01', '', '19:55:35', 'Bolaji', '2020-09-17', '11:41:27', '', ''),
(192, '72', '', 'text_form', '<p><span style=\"font-size: 18pt;\"><strong>Appearance:&nbsp;</strong></span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Macroscopy: </strong></span></p>\n<p><span style=\"font-size: 18pt;\">Wet preparation</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pus cells: 2-8/HPF</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Red blood cell: Nil</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ova/Cyst of Parasite:&nbsp; Not seen</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Culture:</strong>&nbsp;Yielded profuse growth of&nbsp;<em> Salmonella typhi</em></span></p>\n<p><span style=\"font-size: 18pt;\">Amikacin - Sensitive&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cefepime&nbsp; - Sensitive&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Ciprofloxacin&nbsp; -&nbsp; Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gentamicin&nbsp; -&nbsp; Resistant&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Augmentin - Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ceftazidime- Sensitive</span></p>', '', '', '', '', '', '', 'active', 'yekeen', '2020-02-01', '', '20:05:40', 's6068', '2022-09-17', '14:13:46', '', ''),
(193, '73', '', 'text_form', '<p>Ring form of Malaria Parasite seen (++)</p>', '', '', '', '', '', '', 'active', '3571', '2020-04-04', '', '15:28:48', '', '0000-00-00', '00:00:00', '', ''),
(194, '13', 'pH', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-04-04', '', '15:32:19', '', '0000-00-00', '00:00:00', '', ''),
(195, '19', 'Calcium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.2-2.7', 'infant', 'active', '3571', '2020-04-04', '', '15:35:55', '3571', '2020-09-15', '21:04:07', '', ''),
(196, '19', 'Phosphate', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '1.45-2.1', 'infant', 'active', '3571', '2020-04-04', '', '15:37:14', 'Bolaji', '2022-06-03', '16:35:51', '', ''),
(197, '8', 'Sodium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '135-155', 'adult', 'active', '3571', '2020-04-04', '', '15:39:27', '3571', '2020-04-04', '15:42:09', '', ''),
(198, '8', 'Potassium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '3.0-5.0', 'adult', 'active', '3571', '2020-04-04', '', '15:40:31', '', '0000-00-00', '00:00:00', '', ''),
(199, '8', 'Bicarbonate', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '20-31', 'adult', 'inactive', '3571', '2020-04-04', '', '15:42:50', '', '0000-00-00', '00:00:00', '', ''),
(200, '8', 'Creatinine', 'param_form', '', '', 'true', '<p>&micro;mol/L</p>', 'true', '53-106', 'adult', 'active', '3571', '2020-04-04', '', '15:44:03', '3571', '2020-04-04', '15:48:10', '', ''),
(201, '8', 'Creatinine', 'param_form', '', '', 'true', '<p>&micro;mol/L</p>', 'true', '17.7-70.7', 'youth', 'inactive', '3571', '2020-04-04', '', '15:44:50', '3571', '2020-04-04', '15:48:48', '', ''),
(202, '8', 'Urea', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.5', 'adult', 'active', '3571', '2020-04-04', '', '15:45:50', '', '0000-00-00', '00:00:00', '', ''),
(203, '8', 'Urea', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.0-6.5', 'youth', 'inactive', '3571', '2020-04-04', '', '15:46:33', '', '0000-00-00', '00:00:00', '', ''),
(204, '11', 'Uric Acid', 'param_form', '', '', 'true', '<p>mg/dL</p>', 'true', '3.6 -7.7', 'adult', 'active', '3571', '2020-04-04', '', '15:50:36', 'desmondjohn', '2026-02-09', '14:17:40', '', ''),
(205, '27', 'Prolactin', 'param_form', '', '', 'true', '<p>ng/ml</p>', 'true', '4.6-25.07', 'adult', 'active', '3571', '2020-04-05', '', '13:37:19', '', '0000-00-00', '00:00:00', '', ''),
(206, '74', 'WBC', 'param_form', '', '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '2.50-10.00', 'adult', 'active', '3571', '2020-04-14', '', '15:17:24', '3571', '2020-04-14', '15:27:54', '', ''),
(207, '74', 'Lymphocyte', 'param_form', '', '', 'true', '<p>%</p>', 'true', '25.00-40.00', 'adult', 'active', '3571', '2020-04-14', '', '15:17:58', '', '0000-00-00', '00:00:00', '', ''),
(208, '74', 'Granulocyte (Neutrophil)', 'param_form', '', '', 'true', '<p>%</p>', 'true', '45.00-55.00', 'adult', 'active', '3571', '2020-04-14', '', '15:18:44', '', '0000-00-00', '00:00:00', '', ''),
(209, '74', 'MID', 'param_form', '', '', 'true', '<p>%</p>', 'true', '1.00-15.00', 'adult', 'active', '3571', '2020-04-14', '', '15:19:05', '', '0000-00-00', '00:00:00', '', ''),
(210, '74', 'RBC', 'param_form', '', '', 'true', '<p>10<sup>12</sup>/L</p>', 'true', '4.5-6.5', 'adult', 'active', '3571', '2020-04-14', '', '15:19:54', '', '0000-00-00', '00:00:00', '', ''),
(211, '74', 'HGB', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '13.00-16.50', 'adult', 'active', '3571', '2020-04-14', '', '15:20:29', '', '0000-00-00', '00:00:00', '', ''),
(212, '74', 'PCV (HCT)', 'param_form', '', '', 'true', '<p>%</p>', 'true', '40.00-55.00', 'adult', 'active', '3571', '2020-04-14', '', '15:21:08', '', '0000-00-00', '00:00:00', '', ''),
(213, '74', 'MCHC', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '32.00-36.00', 'adult', 'active', '3571', '2020-04-14', '', '15:22:06', '', '0000-00-00', '00:00:00', '', ''),
(214, '74', 'MCH', 'param_form', '', '', 'true', '<p>Pg</p>', 'true', '27.00-32.00', 'adult', 'active', '3571', '2020-04-14', '', '15:22:44', '', '0000-00-00', '00:00:00', '', ''),
(215, '74', 'MCV', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '76.00-96.00', 'adult', 'active', '3571', '2020-04-14', '', '15:23:20', '', '0000-00-00', '00:00:00', '', ''),
(216, '74', 'RDW-CV', 'param_form', '', '', 'true', '<p>%</p>', 'true', '10.00-15.00', 'adult', 'active', '3571', '2020-04-14', '', '15:24:05', '', '0000-00-00', '00:00:00', '', ''),
(217, '74', 'RDW-SD', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '35.00-56.00', 'adult', 'active', '3571', '2020-04-14', '', '15:24:50', '', '0000-00-00', '00:00:00', '', ''),
(218, '74', 'Platelets', 'param_form', '', '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '150.00-450.00', 'adult', 'active', '3571', '2020-04-14', '', '15:26:02', '', '0000-00-00', '00:00:00', '', ''),
(219, '74', 'ESR', 'param_form', '', '', 'true', '<p>mm/hr Westergren</p>', 'true', '0-7', 'adult', 'active', '3571', '2020-04-14', '', '15:27:26', '', '0000-00-00', '00:00:00', '', ''),
(220, '29', 'LH', 'param_form', '', '', 'true', '<p>mIU/mL</p>', 'true', '3.0-12.0', 'adult', 'active', '3571', '2020-04-15', '', '12:41:35', '', '0000-00-00', '00:00:00', '', ''),
(221, '28', 'FSH', 'param_form', '', '', 'true', '<p>mIU/mL</p>', 'true', '2.95-13.65', 'adult', 'active', '3571', '2020-04-15', '', '12:44:23', '', '0000-00-00', '00:00:00', '', ''),
(222, '26', 'B-HCG', 'param_form', '', '', 'true', '<p>mIU/mL</p>', 'true', '', 'adult', 'active', '3571', '2020-04-15', '', '12:47:47', '3571', '2020-05-09', '11:33:13', '', ''),
(223, '25', '', 'text_form', '<table style=\\\"border-collapse: collapse; width: 100%;\\\" border=\\\"1\\\">\n<tbody>\n<tr>\n<td style=\\\"width: 50%;\\\">Serum pregnancy test</td>\n<td style=\\\"width: 50%;\\\">&nbsp;</td>\n</tr>\n</tbody>\n</table>', '', '', '', '', '', '', 'active', '3571', '2020-04-15', '', '12:51:34', '', '0000-00-00', '00:00:00', '', ''),
(224, '24', 'Progesterone', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '3.0-30.0', 'adult', 'active', '3571', '2020-04-15', '', '12:53:22', '', '0000-00-00', '00:00:00', '', ''),
(225, '23', 'Testosterone', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '0.2-0.95', 'adult', 'active', '3571', '2020-04-15', '', '12:55:42', 'Bolaji', '2020-08-10', '10:42:48', '', ''),
(226, '22', 'Oestradiol', 'param_form', '', '', 'true', '<p>pg/mL</p>', 'true', '12.0-262.0', 'adult', 'active', '3571', '2020-04-15', '', '12:56:57', 'HRM/ST/007', '2021-08-17', '10:07:34', '', ''),
(227, '30', 'Thyrotropin (TSH)', 'param_form', '', '', 'true', '<p>&micro;IU/mL</p>', 'true', '0.39-6.19 ', 'adult', 'active', '3571', '2020-04-15', '', '12:58:31', '3571', '2022-05-10', '19:15:07', '', ''),
(228, '31', 'Total triiodothyronine (TT3)', 'param_form', '', '', 'true', '<p>nmol/L</p>', 'true', '1.3-3.1', 'adult', 'active', '3571', '2020-04-15', '', '13:05:34', '', '0000-00-00', '00:00:00', '', ''),
(229, '32', 'Total thyoxine (tT4)', 'param_form', '', '', 'true', '<p>nmol/L</p>', 'true', '66-181', 'adult', 'active', '3571', '2020-04-15', '', '13:07:50', '3571', '2021-03-03', '13:02:59', '', ''),
(230, '75', 'Free triiodothyronine (fT3)', 'param_form', '', '', 'true', '<p>pmol/L</p>', 'true', '2.14-6.45', 'adult', 'active', '3571', '2020-04-15', '', '13:14:57', '', '0000-00-00', '00:00:00', '', ''),
(231, '76', 'Free throxine (fT4)', 'param_form', '', '', 'true', '<p>pmol/L</p>', 'true', '10.3-25.8', 'adult', 'active', '3571', '2020-04-15', '', '13:18:00', '', '0000-00-00', '00:00:00', '', ''),
(232, '77', 'Prostate Specific Antigen', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '0-4', 'adult', 'active', '3571', '2020-04-15', '', '13:27:58', '', '0000-00-00', '00:00:00', '', ''),
(233, '78', 'Carcino-embryonic antigen (CEA)', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '', 'adult', 'inactive', '3571', '2020-04-15', '', '13:29:04', 'Bolaji', '2020-05-20', '13:23:34', '', '');
INSERT INTO `specimen_result_template` (`sn`, `bill_type_id`, `name`, `temp_type`, `raw_text_val`, `result`, `has_unit`, `unit`, `has_ref_val`, `ref_val`, `age_range`, `status`, `c_by`, `date_c`, `time_del`, `time_c`, `upd_by`, `date_upd`, `time_upd`, `del_by`, `date_del`) VALUES
(234, '79', 'Serum alfa-fetorotein (AFP)', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '0-20', 'adult', 'active', '3571', '2020-04-15', '', '13:34:11', '', '0000-00-00', '00:00:00', '', ''),
(235, '41', 'Treponemia palladium screening (Syphilis)', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-04-15', '', '13:46:50', '', '0000-00-00', '00:00:00', '', ''),
(236, '5', 'D-Dimer', 'param_form', '', '', 'true', '<p>mg/L</p>', 'true', '0.0 - 0.5', 'adult', 'active', '3571', '2020-04-15', '', '15:13:00', '', '0000-00-00', '00:00:00', '', ''),
(237, '80', 'Troponin I (cTnI)', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '0.0 - 0.3', 'adult', 'active', '3571', '2020-04-15', '', '15:16:29', '', '0000-00-00', '00:00:00', '', ''),
(238, '81', '', 'text_form', '<p><span style=\"text-decoration: underline; font-size: 24pt;\">High Vaginal Swab (HVS) Microscopy Culture and Sensitivity</span></p>\n<p><span style=\"font-size: 24pt;\"><span style=\"text-decoration: underline;\">Appearance</span>:</span></p>\n<p><span style=\"text-decoration: underline; font-size: 24pt;\">Microscopy:</span></p>\n<ul>\n<li><span style=\"font-size: 24pt;\">Wet Preparation:</span>\n<ul>\n<li><span style=\"font-size: 24pt;\">Pus cells: /HPF</span></li>\n<li><span style=\"font-size: 24pt;\">Epithelial cells: /HPF</span></li>\n<li><span style=\"font-size: 24pt;\">Red blood cells: /HPF</span></li>\n<li><span style=\"font-size: 24pt;\">Yeast:</span></li>\n<li><span style=\"font-size: 24pt;\">Trichomonas:</span></li>\n</ul>\n</li>\n<li><span style=\"font-size: 24pt;\">Gram smear:</span>\n<ul>\n<li><span style=\"font-size: 24pt;\">Epithelial cells:</span></li>\n<li><span style=\"font-size: 24pt;\">Pus cells:</span></li>\n<li><span style=\"font-size: 24pt;\">Gram negative intracellular diplococci:</span></li>\n<li><span style=\"font-size: 24pt;\">others</span></li>\n</ul>\n</li>\n</ul>\n<p><span style=\"font-size: 24pt;\"><span style=\"text-decoration: underline;\">Culture</span>:&nbsp;</span></p>', '', '', '', '', '', '', 'inactive', '3571', '2020-04-16', '', '14:29:10', '3571', '2020-06-08', '14:44:52', '', ''),
(239, '82', '', 'text_form', '<p><span style=\"text-decoration: underline; font-size: 18pt;\">Endocervical Swab (ECS) Microscopy Culture&nbsp; &amp; Sensitivity</span></p>\n<p><span style=\"font-size: 18pt;\"><span style=\"text-decoration: underline;\">Appearance</span>:</span></p>\n<p><span style=\"text-decoration: underline; font-size: 18pt;\">Microscopy:</span></p>\n<ul>\n<li><span style=\"font-size: 18pt;\">Wet Preparation:</span>\n<ul>\n<li><span style=\"font-size: 18pt;\">Pus cells: /HPF</span></li>\n<li><span style=\"font-size: 18pt;\">Epithelial cells: /HPF</span></li>\n<li><span style=\"font-size: 18pt;\">Red blood cells: /HPF</span></li>\n<li><span style=\"font-size: 18pt;\">others:&nbsp;</span></li>\n</ul>\n</li>\n<li><span style=\"font-size: 18pt;\">Gram smear:</span>\n<ul>\n<li><span style=\"font-size: 18pt;\">Epithelial cells:</span></li>\n<li><span style=\"font-size: 18pt;\">Pus cells:</span></li>\n<li><span style=\"font-size: 18pt;\">Gram negative intracellular diplococci:</span></li>\n<li><span style=\"font-size: 18pt;\">others</span></li>\n</ul>\n</li>\n</ul>\n<p><span style=\"font-size: 18pt;\"><span style=\"text-decoration: underline;\">Culture</span>:&nbsp;</span></p>', '', '', '', '', '', '', 'active', '3571', '2020-04-16', '', '14:31:10', '3571', '2020-05-14', '15:40:46', '', ''),
(240, '83', 'Potassium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '3.0-5.0', 'adult', 'active', '3571', '2020-04-17', '', '16:45:27', '', '0000-00-00', '00:00:00', '', ''),
(241, '84', 'Random blood sugar (RBS)', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.5 - 11.1', 'adult', 'active', '3571', '2020-04-20', '', '12:11:28', '3571', '2020-04-20', '14:29:48', '', ''),
(242, '85', 'WBC', 'param_form', '', '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '2.50-10.00', 'adult', 'active', '3571', '2020-04-24', '', '13:01:58', '', '0000-00-00', '00:00:00', '', ''),
(243, '85', 'Lymphocyte', 'param_form', '', '', 'true', '<p>%</p>', 'true', '25.00-40.00', 'adult', 'active', '3571', '2020-04-24', '', '13:03:22', '', '0000-00-00', '00:00:00', '', ''),
(244, '85', 'Granulocyte (neutrophil)', 'param_form', '', '', 'true', '<p>%</p>', 'true', '45.00-55.00', 'adult', 'active', '3571', '2020-04-24', '', '13:06:07', '', '0000-00-00', '00:00:00', '', ''),
(245, '85', 'MID', 'param_form', '', '', 'true', '<p>%</p>', 'true', '1.00-15.00', 'adult', 'active', '3571', '2020-04-24', '', '13:13:04', '', '0000-00-00', '00:00:00', '', ''),
(246, '85', 'RBC', 'param_form', '', '', 'true', '<p>10<sup>12</sup>/L</p>', 'true', '3.8-4.8', 'adult', 'active', '3571', '2020-04-24', '', '13:13:57', '3571', '2020-04-24', '13:21:40', '', ''),
(247, '85', 'HGB', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '11.00-16.50', 'adult', 'active', '3571', '2020-04-24', '', '13:14:42', '3571', '2020-04-24', '13:22:21', '', ''),
(248, '85', 'HCT (PCV)', 'param_form', '', '', 'true', '<p>%</p>', 'true', '38.00-48.00', 'adult', 'active', '3571', '2020-04-24', '', '13:16:09', '3571', '2020-04-24', '13:22:01', '', ''),
(249, '85', 'MCHC', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '32.00-36.00', 'adult', 'active', '3571', '2020-04-24', '', '13:17:00', '', '0000-00-00', '00:00:00', '', ''),
(250, '85', 'MCH', 'param_form', '', '', 'true', '<p>Pg</p>', 'true', '27.0-32.0', 'adult', 'active', '3571', '2020-04-24', '', '13:18:10', '', '0000-00-00', '00:00:00', '', ''),
(251, '85', 'MCV', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '76.0-96.0', 'adult', 'active', '3571', '2020-04-24', '', '13:18:53', '', '0000-00-00', '00:00:00', '', ''),
(252, '85', 'RDW-CV', 'param_form', '', '', 'true', '<p>%</p>', 'true', '10.00-15.00', 'adult', 'active', '3571', '2020-04-24', '', '13:19:34', '', '0000-00-00', '00:00:00', '', ''),
(253, '85', 'RDW-SD', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '35.00-56.00', 'adult', 'active', '3571', '2020-04-24', '', '13:20:13', '', '0000-00-00', '00:00:00', '', ''),
(254, '85', 'Platelets', 'param_form', '', '', 'true', '<p>109/L</p>', 'true', '150.00-450.00', 'adult', 'active', '3571', '2020-04-24', '', '13:21:02', '', '0000-00-00', '00:00:00', '', ''),
(255, '85', 'ESR', 'param_form', '', '', 'true', '<p>mm/hr westergren</p>', 'true', '0-15', 'adult', 'active', '3571', '2020-04-24', '', '13:23:49', '', '0000-00-00', '00:00:00', '', ''),
(256, '10', 'Triglyceride', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.3-1.7 (&lt; 2.0 desirable)', 'adult', 'inactive', '3571', '2020-04-24', '', '13:55:28', '3571', '2020-04-24', '13:57:56', '', ''),
(257, '86', '', 'text_form', '<table width=\"366\">\n<tbody>\n<tr>\n<td width=\"366\">\n<p><span style=\"font-size: 18pt;\">Salmonella typhi IgG antibody &ndash; Negative&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;</span></p>\n<p>&nbsp;</p>\n<p><span style=\"font-size: 18pt;\">Salmonella typhi IgM antibody &ndash; Negative</span></p>\n</td>\n</tr>\n</tbody>\n</table>\n<p>&nbsp;</p>\n<p><span style=\"font-size: 18pt;\">Malaria parasite -<em> P. falciparium/vivax </em>antibody:<strong>&nbsp; </strong>Negative</span></p>', '', '', '', '', '', '', 'active', '3571', '2020-04-24', '', '14:02:53', '3571', '2020-05-02', '12:41:05', '', ''),
(258, '18', '', 'text_form', '<table>\n<tbody>\n<tr>\n<td width=\\\"423\\\">\n<p><strong>Appearance: </strong>Amber coloured&nbsp; urine in universal bottle&nbsp;</p>\n</td>\n</tr>\n<tr>\n<td width=\\\"423\\\">\n<p><strong>Microscopy: </strong>KOH Wet preparation</p>\n<p>&middot;&nbsp; &nbsp; Arthrospores seen</p>\n<p>&middot;&nbsp; &nbsp; &nbsp;&nbsp;</p>\n</td>\n</tr>\n<tr>\n<td width=\\\"423\\\">\n<p><strong>Culture:</strong> Yielded scanty growth&nbsp;</p>\n</td>\n</tr>\n<tr>\n<td width=\\\"423\\\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p>&nbsp;</p>', '', '', '', '', '', '', 'active', 'Bolaji', '2020-04-24', '', '15:47:01', '', '0000-00-00', '00:00:00', '', ''),
(259, '87', 'Thyrotropin (TSH)', 'param_form', '', '', 'true', '<p>&micro;IU/mL</p>', 'true', '0.39 – 6.19', 'adult', 'active', '3571', '2020-04-24', '', '15:58:54', 'Bolaji', '2020-07-02', '18:01:19', '', ''),
(260, '87', 'Free triiodothyronine (fT3)', 'param_form', '', '', 'true', '<p>pmol/L</p>', 'true', '2.14 - 6.45', 'adult', 'active', '3571', '2020-04-24', '', '15:59:32', '', '0000-00-00', '00:00:00', '', ''),
(261, '87', 'Free thyroxine(fT4)', 'param_form', '', '', 'true', '<p>pmol/L</p>', 'true', '10.3 - 25.8', 'adult', 'active', '3571', '2020-04-24', '', '16:00:24', '', '0000-00-00', '00:00:00', '', ''),
(262, '87', 'Total triiodothyronine (tT3)', 'param_form', '', '', 'true', '<p>nmol/L</p>', 'true', '1.23-3.07', 'adult', 'active', '3571', '2020-04-24', '', '16:01:13', '3571', '2020-09-15', '13:47:01', '', ''),
(263, '87', 'Total thyroxine(tT4)', 'param_form', '', '', 'true', '<p>nmol/L</p>', 'true', '66-181', 'adult', 'active', '3571', '2020-04-24', '', '16:02:19', '', '0000-00-00', '00:00:00', '', ''),
(264, '88', 'Prolactin', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '3.45-25.00', 'adult', 'active', '3571', '2020-05-04', '', '13:12:05', 'Bolaji', '2020-12-23', '17:05:01', '', ''),
(265, '89', 'Blood group', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-05-04', '', '16:26:34', '', '0000-00-00', '00:00:00', '', ''),
(266, '89', 'Haemoglobin genotype', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-05-04', '', '16:27:10', '', '0000-00-00', '00:00:00', '', ''),
(267, '90', '2HPP', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '', 'adult', 'inactive', 'Bolaji', '2020-05-05', '', '11:26:09', 'Bolaji', '2020-05-05', '14:01:08', '', ''),
(268, '90', '2 Hour Postprandial', 'param_form', '', '', 'true', '<p>&lt;7.8</p>', 'true', 'mmol/L', 'adult', 'active', 'Bolaji', '2020-05-05', '', '14:02:25', 'Bolaji', '2022-06-04', '15:09:55', '', ''),
(269, '91', 'Total bilirubin', 'param_form', '', '', 'true', '<p>mg/dl</p>', 'true', 'up to 1.2', 'youth', 'active', '3571', '2020-05-07', '', '16:41:26', '', '0000-00-00', '00:00:00', '', ''),
(270, '91', 'Direct Bilirubin', 'param_form', '', '', 'true', '<p>mg/dl</p>', 'true', 'up to 0.4', 'youth', 'active', '3571', '2020-05-07', '', '16:41:57', '', '0000-00-00', '00:00:00', '', ''),
(271, '91', 'ALT', 'param_form', '', '', 'true', '<p>U/L</p>', 'true', 'up to 49', 'youth', 'active', '3571', '2020-05-07', '', '16:42:26', '', '0000-00-00', '00:00:00', '', ''),
(272, '91', 'AST', 'param_form', '', '', 'true', '<p>U/L</p>', 'true', 'up to 46', 'youth', 'active', '3571', '2020-05-07', '', '16:42:50', '', '0000-00-00', '00:00:00', '', ''),
(273, '91', 'ALP', 'param_form', '', '', 'true', '<p>U/L</p>', 'true', '80-1200', 'youth', 'active', '3571', '2020-05-07', '', '16:43:14', '', '0000-00-00', '00:00:00', '', ''),
(274, '91', 'Total Protein', 'param_form', '', '', 'true', '<p>g/L</p>', 'true', '62-80', 'youth', 'active', '3571', '2020-05-07', '', '16:43:46', '', '0000-00-00', '00:00:00', '', ''),
(275, '91', 'Albumin', 'param_form', '', '', 'true', '<p>g/L</p>', 'true', '35-50', 'youth', 'active', '3571', '2020-05-07', '', '16:44:08', '', '0000-00-00', '00:00:00', '', ''),
(276, '92', '', 'text_form', '<p><span style=\"font-size: 18pt;\"><strong>Appearance: </strong>Amber coloured urine inside universal bottle</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Microscopy: </strong>Wet preparation</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pus cell: /HPF</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Red blood cell: Nil</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Epithelial cells: /HPF</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cast: Nil</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Crystals: Nil</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yeast cell: Nil</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <em>S. haematobium</em> <em>: </em>Nil</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Culture:</strong>&nbsp;Yielded profuse growth of&nbsp;<em> Escherichia coli</em></span></p>\n<p><span style=\"font-size: 18pt;\">Amikacin - Sensitive&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cefepime&nbsp; - Sensitive&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Ciprofloxacin&nbsp; -&nbsp; Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gentamicin&nbsp; -&nbsp; Resistant&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Augmentin - Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ceftazidime- Sensitive</span></p>', '', '', '', '', '', '', 'active', '3571', '2020-05-09', '', '10:46:26', 'Bolaji', '2020-12-31', '13:05:53', '', ''),
(277, '26', '', 'text_form', '<p>Comment: Interpretation for gestational age</p>\n<ul>\n<li>5.8-71.2 ------------ 3 weeks of pregnancy</li>\n<li>9.5-750 ------------- 4&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \\\'\\\'</li>\n<li>217-7138 ----------- 5&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \\\'\\\'</li>\n<li>158-31,795---------- 6&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; \\\'\\\'</li>\n<li>3697-163,563------- 7&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\\\'\\\'</li>\n<li>32,065-149,571----- 8&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\\\'\\\'</li>\n<li>63,803-151,410----- 9&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\\\'\\\'</li>\n<li>46,509-186,977----- 10&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\\\'\\\'</li>\n<li>27,832-210,612----- 12&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\\\'\\\'</li>\n<li>13,950-62,530------ 14&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\\\'\\\'</li>\n<li>12,039-70,971------ 15&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\\\'\\\'</li>\n<li>9040-56,451-------- 16&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\\\'\\\'</li>\n<li>8175-55,868-------- 17&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\\\'\\\'</li>\n<li>8099-58,176-------- 18&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\\\'\\\'</li>\n</ul>', '', '', '', '', '', '', 'inactive', '3571', '2020-05-09', '', '11:28:08', '', '0000-00-00', '00:00:00', '', ''),
(278, '93', 'B-HCG (Quantitative)', 'param_form', '', '', 'true', '<p>mIU/mL</p>', 'true', '&lt; 5', 'adult', 'active', '3571', '2020-05-09', '', '11:36:49', '3571', '2020-05-09', '11:37:25', '', ''),
(279, '94', '', 'text_form', '<p><span style=\"font-size: 18pt;\"><strong>Appearance:&nbsp;</strong></span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Microscopy: </strong>Gram stain</span></p>\n<p><span style=\"font-size: 18pt;\">.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pus cells</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Epithelial cells</span></p>\n<p><span style=\"font-size: 18pt;\">.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Organisms</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Culture:</strong>&nbsp;Yielded profuse growth of&nbsp;<em> Escherichia coli</em></span></p>\n<p><span style=\"font-size: 18pt;\">Amikacin - Sensitive&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cefepime&nbsp; - Sensitive&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Ciprofloxacin&nbsp; -&nbsp; Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gentamicin&nbsp; -&nbsp; Resistant&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Augmentin - Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ceftazidime- Sensitive</span></p>\n<p>&nbsp;</p>', '', '', '', '', '', '', 'active', '3571', '2020-05-09', '', '11:41:15', 'Bolaji', '2020-09-17', '16:28:45', '', ''),
(280, '95', '', 'text_form', '<p><span style=\"font-size: 18pt;\"><strong>Ear swab M/C/S</strong></span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Appearance: </strong>Serosanguinous fluid in universal bottle</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Microscopy:</strong></span></p>\n<p><strong><span style=\"font-size: 24pt;\"><span style=\"font-size: 18pt;\">Wet preparation</span></span></strong></p>\n<p><span style=\"font-size: 18pt;\">.&nbsp; &nbsp; &nbsp; &nbsp;Estimated white blood cell count - 380 x10<sup>6</sup> cells/L</span></p>\n<p><span style=\"font-size: 18pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *lymphocytes - 92%</span></p>\n<p><span style=\"font-size: 18pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *polymorphonuclear cells - 8%</span></p>\n<p><span style=\"font-size: 18pt;\">.&nbsp; &nbsp; &nbsp; &nbsp;Estimated red blood cell count - 380 x10<sup>6</sup> cells/L</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Gram smear</strong></span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; Pus cells seen</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; Epithelial cells seen</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; Gram positive cocci seen&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Culture:</strong>&nbsp;Yielded profuse growth of&nbsp;<em> Escherichia coli</em></span></p>\n<p><span style=\"font-size: 18pt;\">Amikacin - Sensitive&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cefepime&nbsp; - Sensitive&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Ciprofloxacin&nbsp; -&nbsp; Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gentamicin&nbsp; -&nbsp; Resistant&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Augmentin - Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ceftazidime- Sensitive</span></p>', '', '', '', '', '', '', 'active', '3571', '2020-05-09', '', '13:00:16', '3571', '2022-06-10', '09:16:34', '', ''),
(281, '96', '', 'text_form', '<table>\n<tbody>\n<tr>\n<td width=\\\"423\\\">\n<p><span style=\\\"font-size: 24pt;\\\"><strong>Appearance: </strong>Brownish discharge on swab stick</span></p>\n</td>\n</tr>\n<tr>\n<td width=\\\"423\\\">\n<p><span style=\\\"font-size: 24pt;\\\"><strong>Microscopy: </strong>Gram stain</span></p>\n<p><span style=\\\"font-size: 24pt;\\\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; pus cells seen</span></p>\n<p><span style=\\\"font-size: 24pt;\\\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Epithelial cells seen</span></p>\n<p><span style=\\\"font-size: 24pt;\\\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gram positive cocci seen</span></p>\n</td>\n</tr>\n<tr>\n<td width=\\\"423\\\">\n<table width=\\\"423\\\">\n<tbody>\n<tr>\n<td width=\\\"423\\\">\n<table>\n<tbody>\n<tr>\n<td width=\\\"423\\\">\n<p><span style=\\\"font-size: 24pt;\\\"><strong>Culture:</strong> Yielded profuse growth of <em>&nbsp;Escherichia coli</em>&nbsp;&nbsp;&nbsp;</span></p>\n</td>\n</tr>\n<tr>\n<td width=\\\"423\\\">\n<p><span style=\\\"font-size: 24pt;\\\">&nbsp; Meropenem &ndash; Resistant&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Ceftriaxone &ndash;&nbsp; Resistant</span></p>\n<p><span style=\\\"font-size: 24pt;\\\">&nbsp;Cefepime&nbsp; - Resistant &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gentamicin&nbsp; -&nbsp;&nbsp; Resistant</span></p>\n<p><span style=\\\"font-size: 24pt;\\\">&nbsp;Levofloxacin &ndash;&nbsp; Sensitive&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; Ciprofloxacin&nbsp; &ndash;&nbsp; Resistant</span></p>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>', '', '', '', '', '', '', 'active', '3571', '2020-05-09', '', '13:03:11', '', '0000-00-00', '00:00:00', '', ''),
(282, '97', 'Sodium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '135-155', 'adult', 'active', '3571', '2020-05-09', '', '17:39:05', '', '0000-00-00', '00:00:00', '', ''),
(283, '97', 'Potassium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '3.0-5.0', 'adult', 'active', '3571', '2020-05-09', '', '17:39:38', '', '0000-00-00', '00:00:00', '', ''),
(284, '97', 'Calcium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.2-2.7', 'adult', 'inactive', '3571', '2020-05-09', '', '17:40:06', '', '0000-00-00', '00:00:00', '', ''),
(285, '98', 'WBC', 'param_form', '', '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '2.50-10.00', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:46:17', 'Bolaji', '2020-06-24', '14:37:14', '', ''),
(286, '98', 'Lymphocyte', 'param_form', '', '', 'true', '<p>%</p>', 'true', '23.00-35.00', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:46:56', '3571', '2020-07-01', '15:40:22', '', ''),
(287, '98', 'Granulocyte', 'param_form', '', '', 'true', '<p>%</p>', 'true', '37.00-57.00', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:49:03', '3571', '2020-07-01', '15:40:48', '', ''),
(288, '98', 'MID', 'param_form', '', '', 'true', '<p>%</p>', 'true', '1.00-15.00', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:49:40', '', '0000-00-00', '00:00:00', '', ''),
(289, '98', 'RBC', 'param_form', '', '', 'true', '<p>10<sup>12</sup>/L</p>', 'true', '4.5-6.5', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:50:13', 'Bolaji', '2020-06-24', '14:37:28', '', ''),
(290, '98', 'HGB', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '11.00-16.50', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:51:00', '', '0000-00-00', '00:00:00', '', ''),
(291, '98', 'HCT (PCV)', 'param_form', '', '', 'true', '<p>%</p>', 'true', '50.00-62.00', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:51:53', '', '0000-00-00', '00:00:00', '', ''),
(292, '98', 'MCHC', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '32.00-36.00', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:52:22', '', '0000-00-00', '00:00:00', '', ''),
(293, '98', 'MCH', 'param_form', '', '', 'true', '<p>pg</p>', 'true', '27.0-32.0', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:52:59', '', '0000-00-00', '00:00:00', '', ''),
(294, '98', 'MCV', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '76.0-96.0', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:55:52', '', '0000-00-00', '00:00:00', '', ''),
(295, '98', 'RDW-CV', 'param_form', '', '', 'true', '<p>%</p>', 'true', '10.00-15.00', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:56:23', '', '0000-00-00', '00:00:00', '', ''),
(296, '98', 'RDW-SD', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '35.00-56.00', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:56:52', '', '0000-00-00', '00:00:00', '', ''),
(297, '98', 'Platelets', 'param_form', '', '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '150.00-450.00', 'infant', 'active', 'Bolaji', '2020-05-11', '', '10:57:30', 'Bolaji', '2020-06-24', '14:37:39', '', ''),
(298, '99', 'WBC', 'param_form', '', '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '2.50-10.00', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:45:03', 'Bolaji', '2020-06-24', '14:36:04', '', ''),
(299, '99', 'Lymphocyte', 'param_form', '', '', 'true', '<p>%</p>', 'true', '40.00-45.00', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:45:50', '3571', '2020-07-01', '15:37:39', '', ''),
(300, '99', 'Granulocyte (Neutrophil)', 'param_form', '', '', 'true', '<p>%</p>', 'true', '45.00-50.00', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:46:25', '3571', '2020-07-01', '15:37:57', '', ''),
(301, '99', 'MID', 'param_form', '', '', 'true', '<p>%</p>', 'true', '1.00-15.00', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:47:03', '', '0000-00-00', '00:00:00', '', ''),
(302, '99', 'RBC', 'param_form', '', '', 'true', '<p>10<sup>12</sup>/L</p>', 'true', '3.8-4.8', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:47:38', 'Bolaji', '2020-06-24', '14:36:25', '', ''),
(303, '99', 'HGB', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '11.00-16.50', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:48:11', '', '0000-00-00', '00:00:00', '', ''),
(304, '99', 'HCT (PCV)', 'param_form', '', '', 'true', '<p>%</p>', 'true', '31.00-39.00', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:48:47', '', '0000-00-00', '00:00:00', '', ''),
(305, '99', 'MCHC', 'param_form', '', '', 'true', '<p>g/dL</p>', 'true', '32.00-36.00', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:49:22', '', '0000-00-00', '00:00:00', '', ''),
(306, '99', 'MCH', 'param_form', '', '', 'true', '<p>pg</p>', 'true', '27.0-32.0', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:49:52', '', '0000-00-00', '00:00:00', '', ''),
(307, '99', 'MCV', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '76.0-96.0', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:50:22', '', '0000-00-00', '00:00:00', '', ''),
(308, '99', 'RDW-CV', 'param_form', '', '', 'true', '<p>%</p>', 'true', '10.00-15.00', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:51:01', '', '0000-00-00', '00:00:00', '', ''),
(309, '99', 'RDW-SD', 'param_form', '', '', 'true', '<p>fL</p>', 'true', '35.00-56.00', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:51:30', '', '0000-00-00', '00:00:00', '', ''),
(310, '99', 'Platelets', 'param_form', '', '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '150.00-450.00', 'youth', 'active', 'Bolaji', '2020-05-13', '', '10:52:01', 'Bolaji', '2020-06-24', '14:36:46', '', ''),
(311, '100', 'Calcium', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '2.2-2.7', 'adult', 'active', '3571', '2020-05-13', '', '18:07:03', '', '0000-00-00', '00:00:00', '', ''),
(312, '100', 'Phosphate', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.8-1.4', 'adult', 'inactive', '3571', '2020-05-13', '', '18:09:31', '', '0000-00-00', '00:00:00', '', ''),
(313, '100', 'Albumin', 'param_form', '', '', 'true', '<p>g/L</p>', 'true', '35-50', 'adult', 'inactive', '3571', '2020-05-13', '', '18:13:27', '', '0000-00-00', '00:00:00', '', ''),
(314, '101', 'HIV 1/2 Antibody', 'param_form', '', '', 'false', '', 'false', '', 'youth', 'active', 'Bolaji', '2020-05-16', '', '15:13:00', '', '0000-00-00', '00:00:00', '', ''),
(315, '102', 'Total protein', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '60-80', 'adult', 'active', '3571', '2020-05-16', NULL, '18:57:52', NULL, NULL, NULL, NULL, NULL),
(316, '103', 'Sodium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '135-150', 'adult', 'active', '3571', '2020-05-16', NULL, '19:25:22', NULL, NULL, NULL, NULL, NULL),
(317, '103', 'Potassium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '3.0-5.0', 'adult', 'active', '3571', '2020-05-16', NULL, '19:25:47', NULL, NULL, NULL, NULL, NULL),
(318, '103', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '20-31', 'adult', 'active', '3571', '2020-05-16', NULL, '19:26:30', NULL, NULL, NULL, NULL, NULL),
(319, '103', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '53-106', 'adult', 'active', '3571', '2020-05-16', NULL, '19:27:11', NULL, NULL, NULL, NULL, NULL),
(320, '103', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.5', 'adult', 'active', '3571', '2020-05-16', NULL, '19:27:40', NULL, NULL, NULL, NULL, NULL),
(321, '103', 'Calcium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.2-2.7', 'adult', 'active', '3571', '2020-05-16', NULL, '19:28:11', NULL, NULL, NULL, NULL, NULL),
(322, '103', 'Phosphate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '0.6-1.4', 'adult', 'active', '3571', '2020-05-16', NULL, '19:28:43', NULL, NULL, NULL, NULL, NULL),
(323, '103', 'Albumin', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '35-50', 'adult', 'active', '3571', '2020-05-16', NULL, '19:29:53', NULL, NULL, NULL, NULL, NULL),
(324, '103', 'Total protein', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '60-80', 'adult', 'active', '3571', '2020-05-16', NULL, '19:32:46', NULL, NULL, NULL, NULL, NULL),
(325, '104', '', 'text_form', '<table>\n<tbody>\n<tr>\n<td style=\"width: 152px;\">\n<p>&nbsp;</p>\n</td>\n<td style=\"width: 141.375px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Result</strong></span></p>\n</td>\n<td style=\"width: 128.125px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Units</strong></span></p>\n</td>\n<td style=\"width: 184.312px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Reference value</strong></span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 152px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Appearance</strong></span></p>\n</td>\n<td style=\"width: 141.375px;\">\n<p><span style=\"font-size: 18pt;\">Opalescent white</span></p>\n</td>\n<td style=\"width: 128.125px;\">\n<p><span style=\"font-size: 18pt;\">-</span></p>\n</td>\n<td style=\"width: 184.312px;\">\n<p><span style=\"font-size: 18pt;\">Opalescent white/light yellow</span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 152px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Volume</strong></span></p>\n</td>\n<td style=\"width: 141.375px;\">\n<p>&nbsp;</p>\n</td>\n<td style=\"width: 128.125px;\">\n<p><span style=\"font-size: 18pt;\">mL</span></p>\n</td>\n<td style=\"width: 184.312px;\">\n<p><span style=\"font-size: 18pt;\">&ge;1.5</span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 152px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Liquefaction </strong></span></p>\n</td>\n<td style=\"width: 141.375px;\">\n<p>&nbsp;</p>\n</td>\n<td style=\"width: 128.125px;\">\n<p><span style=\"font-size: 18pt;\">-</span></p>\n</td>\n<td style=\"width: 184.312px;\">\n<p><span style=\"font-size: 18pt;\">Within 30 minutes</span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 152px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Viscosity</strong></span></p>\n</td>\n<td style=\"width: 141.375px;\">\n<p>&nbsp;</p>\n</td>\n<td style=\"width: 128.125px;\">\n<p><span style=\"font-size: 18pt;\">-</span></p>\n</td>\n<td style=\"width: 184.312px;\">\n<p><span style=\"font-size: 18pt;\">Normoviscous</span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 152px;\">\n<p><span style=\"font-size: 18pt;\"><strong>pH</strong></span></p>\n</td>\n<td style=\"width: 141.375px;\">\n<p>&nbsp;</p>\n</td>\n<td style=\"width: 128.125px;\">\n<p><span style=\"font-size: 18pt;\">-</span></p>\n</td>\n<td style=\"width: 184.312px;\">\n<p><span style=\"font-size: 18pt;\">&ge;7.2</span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 152px;\">\n<p><span style=\"font-size: 18pt;\"><strong><u>Motility</u></strong></span></p>\n<p><span style=\"font-size: 18pt;\">Progressive&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Non progressive&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Non-motile&nbsp;</span></p>\n</td>\n<td style=\"width: 141.375px;\">&nbsp;</td>\n<td style=\"width: 128.125px;\">\n<p><span style=\"font-size: 18pt;\">%</span></p>\n</td>\n<td style=\"width: 184.312px;\">\n<p><span style=\"font-size: 18pt;\">&ge; 40% actively motile within 60min</span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 152px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Sperm Count</strong></span></p>\n</td>\n<td style=\"width: 141.375px;\">\n<p><span style=\"font-size: 18pt;\">0</span></p>\n</td>\n<td style=\"width: 128.125px;\">\n<p><span style=\"font-size: 18pt;\">x10<sup>6</sup>cell/mL</span></p>\n</td>\n<td style=\"width: 184.312px;\">\n<p><span style=\"font-size: 18pt;\">&ge; 15.0</span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 152px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Morphology</strong></span></p>\n</td>\n<td style=\"width: 141.375px;\">\n<p>&nbsp;</p>\n</td>\n<td style=\"width: 128.125px;\">\n<p><span style=\"font-size: 18pt;\">% (normal)</span></p>\n</td>\n<td style=\"width: 184.312px;\">\n<p><span style=\"font-size: 18pt;\">&ge; 4</span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 152px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Pus cells</strong></span></p>\n</td>\n<td style=\"width: 141.375px;\">\n<p>&nbsp;</p>\n</td>\n<td style=\"width: 128.125px;\">\n<p><span style=\"font-size: 18pt;\">Cells/HPF</span></p>\n</td>\n<td style=\"width: 184.312px;\">\n<p><span style=\"font-size: 18pt;\">&lt; 5</span></p>\n</td>\n</tr>\n</tbody>\n</table>\n<table style=\"border-collapse: collapse; width: 100%;\" width=\"470\">\n<tbody>\n<tr>\n<td style=\"width: 454.542px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Culture:</strong> Yielded moderate growth of <em>&nbsp;Staphylococcus aureus</em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 454.542px;\">\n<p><span style=\"font-size: 18pt;\">Ceftriaxone &ndash; Sensitive&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gentamicin&nbsp; -&nbsp;&nbsp;&nbsp; Sensitive</span></p>\n<p><span style=\"font-size: 18pt;\">Cotrimoxazole &ndash; Sensitive&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Augmentin&nbsp; -&nbsp;&nbsp;&nbsp; Resistant</span></p>\n<p><span style=\"font-size: 18pt;\">Ciprofloxacin&nbsp; &ndash;&nbsp; Sensitive&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cefuroxime - Sensitive</span></p>\n</td>\n</tr>\n</tbody>\n</table>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2020-05-17', NULL, '10:51:54', '3571', '2022-01-11', '11:53:39', NULL, NULL),
(326, '47', '', 'text_form', '<table width=\"95%\">\n<tbody>\n<tr>\n<td width=\"26%\">\n<p>&nbsp;</p>\n</td>\n<td width=\"18%\">\n<p><span style=\"font-size: 18pt;\"><strong>Result</strong></span></p>\n</td>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\"><strong>Units</strong></span></p>\n</td>\n<td width=\"28%\">\n<p><span style=\"font-size: 18pt;\"><strong>Reference value</strong></span></p>\n</td>\n</tr>\n<tr>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\"><strong>Appearance</strong></span></p>\n</td>\n<td width=\"18%\">\n<p>&nbsp;</p>\n</td>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\">-</span></p>\n</td>\n<td width=\"28%\">\n<p><span style=\"font-size: 18pt;\">Opalescent/whitish-gray</span></p>\n</td>\n</tr>\n<tr>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\"><strong>Volume</strong></span></p>\n</td>\n<td width=\"18%\">\n<p>&nbsp;</p>\n</td>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\">mL</span></p>\n</td>\n<td width=\"28%\">\n<p><span style=\"font-size: 18pt;\">&ge;1.5</span></p>\n</td>\n</tr>\n<tr>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\"><strong>Liquefaction </strong></span></p>\n</td>\n<td width=\"18%\">\n<p>&nbsp;</p>\n</td>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\">-</span></p>\n</td>\n<td width=\"28%\">\n<p><span style=\"font-size: 18pt;\">Within 30 minutes</span></p>\n</td>\n</tr>\n<tr>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\"><strong>Viscosity</strong></span></p>\n</td>\n<td width=\"18%\">\n<p>&nbsp;</p>\n</td>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\">-</span></p>\n</td>\n<td width=\"28%\">\n<p><span style=\"font-size: 18pt;\">Normoviscous</span></p>\n</td>\n</tr>\n<tr>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\"><strong>pH</strong></span></p>\n</td>\n<td width=\"18%\">\n<p>&nbsp;</p>\n</td>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\">-</span></p>\n</td>\n<td width=\"28%\">\n<p><span style=\"font-size: 18pt;\">&ge;7.2</span></p>\n</td>\n</tr>\n<tr>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\"><strong><u>Motility</u></strong></span></p>\n<p><span style=\"font-size: 18pt;\">Progressive&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Non progressive&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Non-motile&nbsp;</span></p>\n</td>\n<td width=\"18%\">\n<p>&nbsp;</p>\n</td>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\">%</span></p>\n</td>\n<td width=\"28%\">\n<p><span style=\"font-size: 18pt;\">&ge; 40% actively motile within 60min</span></p>\n</td>\n</tr>\n<tr>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\"><strong>Sperm Count</strong></span></p>\n</td>\n<td width=\"18%\">\n<p>&nbsp;</p>\n</td>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\">x10<sup>6</sup>cell/mL</span></p>\n</td>\n<td width=\"28%\">\n<p><span style=\"font-size: 18pt;\">&ge; 15.0</span></p>\n</td>\n</tr>\n<tr>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\"><strong>Morphology</strong></span></p>\n</td>\n<td width=\"18%\">\n<p>&nbsp;</p>\n</td>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\">% (normal)</span></p>\n</td>\n<td width=\"28%\">\n<p><span style=\"font-size: 18pt;\">&ge; 4</span></p>\n</td>\n</tr>\n<tr>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\"><strong>Pus cells</strong></span></p>\n</td>\n<td width=\"18%\">\n<p>&nbsp;</p>\n</td>\n<td width=\"26%\">\n<p><span style=\"font-size: 18pt;\">Cells/HPF</span></p>\n</td>\n<td width=\"28%\">\n<p><span style=\"font-size: 18pt;\">&lt; 5</span></p>\n</td>\n</tr>\n</tbody>\n</table>\n<table width=\"406\">\n<tbody>\n<tr>\n<td width=\"406\">\n<p><span style=\"font-size: 18pt;\"><strong>Culture:</strong> Yielded moderate growth of <em>&nbsp;Staphylococcus aureus</em>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></p>\n</td>\n</tr>\n<tr>\n<td width=\"406\">\n<p><span style=\"font-size: 18pt;\">Ceftriaxone &ndash; Sensitive&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Gentamicin&nbsp; -&nbsp;&nbsp;&nbsp; Sensitive</span></p>\n<p><span style=\"font-size: 18pt;\">Cotrimoxazole &ndash; Sensitive&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Augmentin&nbsp; -&nbsp;&nbsp;&nbsp; Resistant</span></p>\n<p><span style=\"font-size: 18pt;\">Ciprofloxacin&nbsp; &ndash;&nbsp; Sensitive&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cefuroxime - Sensitive</span></p>\n</td>\n</tr>\n</tbody>\n</table>', '', NULL, NULL, NULL, NULL, NULL, 'inactive', '3571', '2020-05-17', NULL, '11:42:00', '3571', '2020-06-27', '16:13:36', NULL, NULL),
(327, '58', 'Estradiol	', 'param_form', NULL, '', 'true', '<p>pg/mL</p>', 'true', '25-175', 'adult', 'inactive', 'Bolaji', '2020-05-17', NULL, '16:04:44', NULL, NULL, NULL, NULL, NULL),
(328, '105', 'FSH		', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '3.0 – 12.0', 'adult', 'active', 'Bolaji', '2020-05-17', NULL, '16:07:07', NULL, NULL, NULL, NULL, NULL),
(329, '105', 'LH		', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '2.95 – 13.65', 'adult', 'active', 'Bolaji', '2020-05-17', NULL, '16:07:39', NULL, NULL, NULL, NULL, NULL),
(330, '105', 'Prolactin		', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '4.6– 25.07', 'adult', 'active', 'Bolaji', '2020-05-17', NULL, '16:08:09', NULL, NULL, NULL, NULL, NULL),
(331, '105', 'Testosterone', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '0.2- 0.95', 'adult', 'active', 'Bolaji', '2020-05-17', NULL, '16:08:42', 'Bolaji', '2020-08-10', '10:49:08', NULL, NULL),
(332, '105', 'Estradiol	', 'param_form', NULL, '', 'true', '<p>pg/mL</p>', 'true', '7-175', 'adult', 'active', 'Bolaji', '2020-05-17', NULL, '16:09:08', 'Bolaji', '2020-05-17', '16:17:11', NULL, NULL),
(333, '106', 'ALT', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', 'up to 49', 'adult', 'active', '3571', '2020-05-19', NULL, '15:05:42', NULL, NULL, NULL, NULL, NULL),
(334, '106', 'AST', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', 'up to 46', 'adult', 'active', '3571', '2020-05-19', NULL, '15:06:04', NULL, NULL, NULL, NULL, NULL),
(335, '106', 'Albumin', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '35-50', 'adult', 'inactive', '3571', '2020-05-19', NULL, '15:06:30', NULL, NULL, NULL, NULL, NULL),
(336, '107', 'FSH', 'param_form', NULL, '', 'true', '<p>mIU/ml</p>', 'true', '3.0 - 12.0', 'adult', 'active', 'Bolaji', '2020-05-20', NULL, '11:43:02', 'Bolaji', '2020-05-20', '11:46:28', NULL, NULL),
(337, '107', 'LH', 'param_form', NULL, '', 'true', '<p>mIU/ml</p>', 'true', '2.95 - 13.65', 'adult', 'active', 'Bolaji', '2020-05-20', NULL, '11:43:30', 'Bolaji', '2020-05-20', '11:46:17', NULL, NULL),
(338, '107', 'Prolactin', 'param_form', NULL, '', 'true', '<p>ng/ml</p>', 'true', '4.6 - 25.07', 'adult', 'active', 'Bolaji', '2020-05-20', NULL, '11:44:03', 'Bolaji', '2020-05-20', '11:46:08', NULL, NULL),
(339, '107', 'Oestradiol', 'param_form', NULL, '', 'true', '<p>pg/ml</p>', 'true', '7 - 175', 'adult', 'inactive', 'Bolaji', '2020-05-20', NULL, '11:44:45', 'Bolaji', '2020-05-20', '11:45:57', NULL, NULL),
(340, '107', 'Testosterone', 'param_form', NULL, '', 'true', '<p>pg/ml</p>', 'true', '0.2 - 0.95', 'adult', 'inactive', 'Bolaji', '2020-05-20', NULL, '11:45:47', NULL, NULL, NULL, NULL, NULL),
(341, '78', 'Carcino-embryonic antigen (CEA)', 'param_form', NULL, '', 'true', '<p>ng/ml</p>', 'true', '0 - 5', 'adult', 'active', 'Bolaji', '2020-05-20', NULL, '13:24:32', 'Bolaji', '2020-05-20', '13:24:56', NULL, NULL),
(342, '109', 'HBsAg', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-05-21', NULL, '10:37:34', NULL, NULL, NULL, NULL, NULL),
(343, '109', 'Anti-HCV', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-05-21', NULL, '10:37:56', NULL, NULL, NULL, NULL, NULL),
(344, '109', 'HIV 1/2 Antibody', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-05-21', NULL, '10:38:19', NULL, NULL, NULL, NULL, NULL),
(345, '110', 'HbsAg (Hepatitis B surface antigen)', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', 'Bolaji', '2020-05-23', NULL, '10:33:46', NULL, NULL, NULL, NULL, NULL),
(346, '100', 'Albumin		', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '35-50', 'youth', 'active', 'Bolaji', '2020-05-23', NULL, '12:39:01', NULL, NULL, NULL, NULL, NULL),
(347, '59', 'Albumin', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '35-50', 'adult', 'inactive', '3571', '2020-05-26', NULL, '11:44:30', NULL, NULL, NULL, NULL, NULL),
(348, '111', 'Cholesterol', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '3.89-5.7  ', 'adult', 'active', '3571', '2020-05-26', NULL, '12:26:38', '3571', '2020-05-26', '12:27:42', NULL, NULL),
(349, '112', 'Testosterone', 'param_form', NULL, '', 'true', '<p>ng/ml</p>', 'true', '2.5-10.0', 'adult', 'active', '3571', '2020-05-28', NULL, '15:54:35', 'Bolaji', '2020-08-10', '10:43:24', NULL, NULL),
(350, '113', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '17.7-70.7', 'adult', 'active', 'Bolaji', '2020-05-29', NULL, '11:07:25', '3571', '2022-06-16', '12:15:12', NULL, NULL),
(351, '107', 'Estradiol		', 'param_form', NULL, '', 'true', '<p>pg/mL</p>', 'true', '7.0-175.0', 'adult', 'active', 'Bolaji', '2020-05-29', NULL, '11:45:12', 'HRM/ST/007', '2021-09-01', '19:03:23', NULL, NULL),
(352, '114', 'Calcium	', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.2-2.7', 'youth', 'active', 'Bolaji', '2020-05-29', NULL, '11:54:10', NULL, NULL, NULL, NULL, NULL),
(353, '114', 'Phosphate		', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '1.2-1.8', 'youth', 'active', 'Bolaji', '2020-05-29', NULL, '11:55:23', NULL, NULL, NULL, NULL, NULL),
(354, '114', 'Albumin	    	        ', 'param_form', NULL, '', 'true', '<p>&nbsp; g/L</p>', 'true', '  37-56', 'youth', 'active', 'Bolaji', '2020-05-29', NULL, '11:56:11', NULL, NULL, NULL, NULL, NULL),
(355, '114', 'Total protein			', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '59-80', 'youth', 'inactive', 'Bolaji', '2020-05-29', NULL, '11:56:42', NULL, NULL, NULL, NULL, NULL),
(356, '114', 'ALP		', 'param_form', NULL, '', 'true', '<p>IU/L</p>', 'true', '180 – 1200', 'youth', 'inactive', 'Bolaji', '2020-05-29', NULL, '11:57:38', NULL, NULL, NULL, NULL, NULL),
(357, '35', '', 'text_form', '<p><span style=\\\"font-size: 18pt;\\\">RBC: There is anisocytosis with dimorphic blood picture and target cells.</span></p>\n<p><span style=\\\"font-size: 18pt;\\\">WBC: There is neutrophilia with right shift. Lymphocytes are medium sized cells with some spindle shaped and activated forms.</span></p>\n<p><span style=\\\"font-size: 18pt;\\\">&nbsp;Platelets: Adequate on film.</span></p>\n<p><span style=\\\"font-size: 18pt;\\\">Comment: Mixed deficiency anaemia with a probable bacterial infection. Kindly correlate with clinical details.</span></p>\n<p>&nbsp;</p>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'Bolaji', '2020-05-29', NULL, '18:31:23', NULL, NULL, NULL, NULL, NULL),
(358, '115', '', 'text_form', '<div id=\"raw_text_backup\" class=\"col-md-12\">\n<p><strong><span style=\"font-size: 18pt;\">RBC:&nbsp;</span></strong></p>\n<p><strong><span style=\"font-size: 18pt;\">WBC:&nbsp;</span></strong></p>\n<p><strong><span style=\"font-size: 18pt;\">Platelets:&nbsp;</span></strong></p>\n<p><strong><span style=\"font-size: 18pt;\">Comment:&nbsp;</span></strong></p>\n<p>&nbsp;</p>\n</div>\n<div class=\"col-md-12\"><hr />&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;</div>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2020-05-30', NULL, '12:45:17', 'desmondjohn', '2026-02-09', '14:20:47', NULL, NULL),
(359, '116', 'FSH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '1.50-12.40', 'adult', 'active', '3571', '2020-06-01', NULL, '10:14:15', NULL, NULL, NULL, NULL, NULL),
(360, '116', 'LH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '1.70-8.60', 'adult', 'active', '3571', '2020-06-01', NULL, '10:14:41', NULL, NULL, NULL, NULL, NULL),
(361, '116', 'Prolactin', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '3.45-17.42', 'adult', 'active', '3571', '2020-06-01', NULL, '10:15:27', NULL, NULL, NULL, NULL, NULL),
(362, '116', 'Testosterone', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '2.50-10.60', 'adult', 'active', '3571', '2020-06-01', NULL, '10:16:25', 'Bolaji', '2020-08-10', '10:43:56', NULL, NULL),
(363, '117', 'HCT (PCV)		', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '50.00-62.00', 'infant', 'active', 'Bolaji', '2020-06-01', NULL, '13:13:06', NULL, NULL, NULL, NULL, NULL),
(364, '118', 'Anti-HCV', 'param_form', NULL, '', 'false', '', 'false', '', 'youth', 'active', 'Bolaji', '2020-06-01', NULL, '16:05:48', NULL, NULL, NULL, NULL, NULL),
(365, '119', 'Albumin	  ', 'param_form', NULL, '', 'true', '<p>&nbsp;g/L</p>', 'true', '35-50', 'adult', 'active', 'Bolaji', '2020-06-01', NULL, '18:08:47', NULL, NULL, NULL, NULL, NULL),
(366, '121', 'FSH	', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '1.96 – 11.00', 'adult', 'active', 'Bolaji', '2020-06-05', NULL, '19:05:28', 'Bolaji', '2020-06-06', '11:28:18', NULL, NULL),
(367, '121', 'LH		', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '1.25 – 7.70', 'adult', 'active', 'Bolaji', '2020-06-05', NULL, '19:05:58', 'Bolaji', '2020-06-06', '11:28:40', NULL, NULL),
(368, '121', 'Prolactin	', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '4.6 - 25.07', 'adult', 'active', 'Bolaji', '2020-06-05', NULL, '19:06:31', 'Bolaji', '2020-06-06', '11:32:55', NULL, NULL),
(369, '121', 'Testosterone	', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '0.2-0.95', 'adult', 'inactive', 'Bolaji', '2020-06-05', NULL, '19:06:57', 'Bolaji', '2020-08-10', '10:44:31', NULL, NULL),
(370, '121', 'Progesterone		', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '3.0 – 30.0', 'adult', 'active', 'Bolaji', '2020-06-05', NULL, '19:07:32', NULL, NULL, NULL, NULL, NULL),
(371, '58', 'Testosterone', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '0.2 - 0.95 ', 'adult', 'active', '3571', '2020-06-08', NULL, '13:42:11', '3571', '2022-01-11', '08:16:29', NULL, NULL),
(372, '122', 'FSH		', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '3.0 – 12.0', 'adult', 'active', '3571', '2020-06-09', NULL, '14:56:28', NULL, NULL, NULL, NULL, NULL),
(373, '122', 'LH	', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '1.48-12.40', 'adult', 'active', '3571', '2020-06-09', NULL, '14:57:00', 'Bolaji', '2020-10-26', '15:58:54', NULL, NULL),
(374, '122', 'Prolactin	', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '4.6– 25.07', 'adult', 'active', '3571', '2020-06-09', NULL, '14:57:28', NULL, NULL, NULL, NULL, NULL),
(375, '123', 'Calcium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.2-2.7', 'adult', 'active', 'Bolaji', '2020-06-11', NULL, '18:38:39', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `specimen_result_template` (`sn`, `bill_type_id`, `name`, `temp_type`, `raw_text_val`, `result`, `has_unit`, `unit`, `has_ref_val`, `ref_val`, `age_range`, `status`, `c_by`, `date_c`, `time_del`, `time_c`, `upd_by`, `date_upd`, `time_upd`, `del_by`, `date_del`) VALUES
(376, '81', '', 'text_form', '<table style=\"width: 635px;\">\n<tbody>\n<tr>\n<td style=\"width: 619.208px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Appearance: </strong>Whitish discharge on swab stick</span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 619.208px;\">\n<table style=\"width: 625px;\">\n<tbody>\n<tr>\n<td style=\"width: 608.542px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Microscopy: </strong></span><span style=\"font-size: 18pt;\">&nbsp;<strong>Wet preparation</strong>:&nbsp; </span></p>\n<p><span style=\"font-size: 18pt;\">Pus cells: 2-3/HPF&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style=\"font-size: 18pt;\">Epithelial cells: 7-15/HPF&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style=\"font-size: 18pt;\">Red blood Cells: Nil&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style=\"font-size: 18pt;\">Yeast: Seen(++)&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style=\"font-size: 18pt;\">Trichomonas vaginalis : Nil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong>&nbsp; &nbsp; &nbsp; &nbsp;</strong></span><strong style=\"font-size: 18pt;\">&nbsp; &nbsp;</strong></p>\n<p><strong style=\"font-size: 18pt;\">Gram smear:&nbsp; </strong><span style=\"font-size: 18pt;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Epithelial cells&nbsp; seen&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style=\"font-size: 18pt;\">Pus cells&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style=\"font-size: 18pt;\">Large gram positive cocci seen&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </span><span style=\"font-size: 18pt;\">Gram positive bacilli</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>&nbsp;Culture:</strong> Yielded moderate&nbsp; growth of candida albicans&nbsp;&nbsp; </span></p>\n</td>\n</tr>\n</tbody>\n</table>\n</td>\n</tr>\n</tbody>\n</table>', '', NULL, NULL, NULL, NULL, NULL, 'inactive', '3571', '2020-06-17', NULL, '11:26:25', '3571', '2020-06-17', '11:54:35', NULL, NULL),
(377, '81', '', 'text_form', '<p><span style=\"text-decoration: underline;\"><span style=\"font-size: 18pt;\">High vaginal swab (HVS) microscopy culture and sensitivity</span></span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Appearance:</strong></span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Microscopy: Wet preparation</strong></span></p>\n<ul>\n<li><span style=\"font-size: 18pt;\">Pus cells: 0-2/HPF</span></li>\n<li><span style=\"font-size: 18pt;\">Epithelial cells: 7-12/HPF</span></li>\n<li><span style=\"font-size: 18pt;\">Red blood cells: Nil</span></li>\n<li><span style=\"font-size: 18pt;\">Yeast: Nil</span></li>\n<li><span style=\"font-size: 18pt;\">Trichomonas vaginalis: Nil</span></li>\n</ul>\n<p><span style=\"font-size: 18pt;\"><strong>Gram smear:</strong></span></p>\n<ul>\n<li><span style=\"font-size: 18pt;\">Epithelial cells seen (Some clue cells seen)</span></li>\n<li><span style=\"font-size: 18pt;\">Pus cells: Not seen</span></li>\n<li><span style=\"font-size: 18pt;\">Gram negative bacilli and coccobacilli seen</span></li>\n<li><span style=\"font-size: 18pt;\">others: Nil</span></li>\n</ul>\n<p><span style=\"font-size: 18pt;\"><strong>Culture:&nbsp;</strong>Yielded no growth after 48 hours of aerobic incubation</span></p>\n<p><span style=\"font-size: 14pt;\"><strong>Comment:&nbsp;</strong>Nugent score is 7. result is suggestive of bacterial vaginosis.&nbsp;</span></p>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2020-06-17', NULL, '12:07:19', '3571', '2020-06-17', '12:08:11', NULL, NULL),
(378, '124', '', 'text_form', '<p><span style=\"font-size: 18pt;\"><u>High vaginal swab (HVS) microscopy culture and sensitivity</u></span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Appearance:&nbsp;</strong>Whitish discharge on swab stick<strong>&nbsp;</strong></span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Microscopy: Wet preparation</strong></span></p>\n<ul>\n<li><span style=\"font-size: 18pt;\">Pus cells: 0-2/HPF</span></li>\n<li><span style=\"font-size: 18pt;\">Epithelial cells: 7-12/HPF</span></li>\n<li><span style=\"font-size: 18pt;\">Red blood cells: Nil</span></li>\n<li><span style=\"font-size: 18pt;\">Yeast: Nil</span></li>\n<li><span style=\"font-size: 18pt;\"><em>Trichomonas vaginalis:</em><strong>&nbsp;</strong></span></li>\n</ul>\n<p><span style=\"font-size: 18pt;\"><strong>Grams smear:</strong></span></p>\n<ul>\n<li><span style=\"font-size: 18pt;\">Epithelial cells seen (some clue cells seen)</span></li>\n<li><span style=\"font-size: 18pt;\">Pus cells: Not seen</span></li>\n<li><span style=\"font-size: 18pt;\">Gram negative bacilli and coccobacilli seen</span></li>\n<li><span style=\"font-size: 18pt;\">Others: Nil<strong>&nbsp;</strong></span></li>\n</ul>\n<p><span style=\"font-size: 18pt;\"><strong>Culture: </strong>Yielded no growth after 48 hours of aerobic incubation.</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Comment:&nbsp;</strong>Nugent score is 7. Result is suggestive of bacterial vaginosis</span></p>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2020-06-17', NULL, '12:28:14', 'Bolaji', '2020-06-24', '18:13:05', NULL, NULL),
(379, '125', 'Phosphate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '0.6-1.4', 'adult', 'active', '3571', '2020-06-17', NULL, '13:03:04', 'Bolaji', '2020-09-05', '18:29:35', NULL, NULL),
(380, '126', 'Sodium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '135-155', 'adult', 'active', 'Bolaji', '2020-06-25', NULL, '12:28:12', NULL, NULL, NULL, NULL, NULL),
(381, '126', 'Potassium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '3.0-5.0', 'adult', 'inactive', 'Bolaji', '2020-06-25', NULL, '12:28:41', NULL, NULL, NULL, NULL, NULL),
(382, '47', '', 'text_form', '<table style=\"width: 680px; height: 1136px;\" width=\"616\">\n<tbody>\n<tr style=\"height: 53px;\">\n<td style=\"width: 187.227px; height: 53px;\">&nbsp;</td>\n<td style=\"width: 142.227px; height: 53px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Result</strong></span></p>\n</td>\n<td style=\"width: 134.727px; height: 53px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Units</strong></span></p>\n</td>\n<td style=\"width: 158.477px; height: 53px;\" colspan=\"2\">\n<p><span style=\"font-size: 18pt;\"><strong>Reference value </strong></span></p>\n</td>\n</tr>\n<tr style=\"height: 74px;\">\n<td style=\"width: 187.227px; height: 74px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Appearance</strong></span></p>\n</td>\n<td style=\"width: 142.227px; height: 74px;\">\n<p><span style=\"font-size: 18pt;\">Whitish-gray</span></p>\n</td>\n<td style=\"width: 134.727px; height: 74px;\">\n<p><span style=\"font-size: 18pt;\"><strong>-</strong></span></p>\n</td>\n<td style=\"width: 158.477px; height: 74px;\" colspan=\"2\">\n<p><span style=\"font-size: 18pt;\">Opalescent /whitish-gray</span></p>\n</td>\n</tr>\n<tr style=\"height: 52px;\">\n<td style=\"width: 187.227px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Volume</strong></span></p>\n</td>\n<td style=\"width: 142.227px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\">4.5</span></p>\n</td>\n<td style=\"width: 134.727px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\">mL</span></p>\n</td>\n<td style=\"width: 158.477px; height: 52px;\" colspan=\"2\">\n<p><span style=\"font-size: 18pt;\">&ge; 1.5</span></p>\n</td>\n</tr>\n<tr style=\"height: 74px;\">\n<td style=\"width: 187.227px; height: 74px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Liquefaction </strong></span></p>\n</td>\n<td style=\"width: 142.227px; height: 74px;\">\n<p><span style=\"font-size: 18pt;\">30</span></p>\n</td>\n<td style=\"width: 134.727px; height: 74px;\">&nbsp;</td>\n<td style=\"width: 158.477px; height: 74px;\" colspan=\"2\">\n<p><span style=\"font-size: 18pt;\">Within 30minutes</span></p>\n</td>\n</tr>\n<tr style=\"height: 52px;\">\n<td style=\"width: 187.227px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Viscosity</strong></span></p>\n</td>\n<td style=\"width: 142.227px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\">Normovicous</span></p>\n</td>\n<td style=\"width: 135.977px; height: 52px;\" colspan=\"2\">\n<p><span style=\"font-size: 18pt;\"><strong>-</strong></span></p>\n</td>\n<td style=\"width: 157.227px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\">Normovicous</span></p>\n</td>\n</tr>\n<tr style=\"height: 52px;\">\n<td style=\"width: 187.227px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\"><strong>pH</strong></span></p>\n</td>\n<td style=\"width: 142.227px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\">8.0</span></p>\n</td>\n<td style=\"width: 134.727px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\"><strong>-</strong></span></p>\n</td>\n<td style=\"width: 158.477px; height: 52px;\" colspan=\"2\">\n<p><span style=\"font-size: 18pt;\">7.2-7.8</span></p>\n</td>\n</tr>\n<tr style=\"height: 95px;\">\n<td style=\"width: 187.227px; height: 95px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Motility</strong></span></p>\n<p><span style=\"font-size: 18pt;\">Progressive</span></p>\n<p><span style=\"font-size: 18pt;\">Non-Progressive</span></p>\n<p><span style=\"font-size: 18pt;\">Non-motile</span></p>\n</td>\n<td style=\"width: 142.227px; height: 95px;\">\n<p><span style=\"font-size: 18pt;\">50</span></p>\n</td>\n<td style=\"width: 134.727px; height: 95px;\">\n<p><span style=\"font-size: 18pt;\">%</span></p>\n</td>\n<td style=\"width: 158.477px; height: 95px;\" colspan=\"2\">\n<p><span style=\"font-size: 18pt;\">&ge; 40 actively motile within 6omin.</span></p>\n</td>\n</tr>\n<tr style=\"height: 55px;\">\n<td style=\"width: 187.227px; height: 55px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Sperm Count</strong></span></p>\n</td>\n<td style=\"width: 142.227px; height: 55px;\">\n<p>&nbsp;</p>\n</td>\n<td style=\"width: 134.727px; height: 55px;\">\n<p><span style=\"font-size: 18pt;\">x 10<sup>6</sup>cell/mL</span></p>\n</td>\n<td style=\"width: 158.477px; height: 55px;\" colspan=\"2\">\n<p><span style=\"font-size: 18pt;\">&ge; 15.0</span></p>\n</td>\n</tr>\n<tr style=\"height: 52px;\">\n<td style=\"width: 187.227px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Morphology</strong></span></p>\n</td>\n<td style=\"width: 142.227px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\">25</span></p>\n</td>\n<td style=\"width: 134.727px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\">% (normal)</span></p>\n</td>\n<td style=\"width: 158.477px; height: 52px;\" colspan=\"2\">\n<p><span style=\"font-size: 18pt;\">&ge;&nbsp; 4</span></p>\n</td>\n</tr>\n<tr style=\"height: 52px;\">\n<td style=\"width: 187.227px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Pus cells</strong></span></p>\n</td>\n<td style=\"width: 142.227px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\">0-2</span></p>\n</td>\n<td style=\"width: 134.727px; height: 52px;\">\n<p><span style=\"font-size: 18pt;\">Cells/HPF</span></p>\n</td>\n<td style=\"width: 158.477px; height: 52px;\" colspan=\"2\">\n<p><span style=\"font-size: 18pt;\">&lt; 5</span></p>\n</td>\n</tr>\n</tbody>\n</table>\n<p><span style=\"font-size: 18pt;\"><strong>Culture</strong>: Yielded no growth after 24 hours of incubation</span></p>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2020-06-27', NULL, '16:40:31', 'Bolaji', '2020-07-04', '17:51:02', NULL, NULL),
(383, '127', 'ALT	  ', 'param_form', NULL, '', 'true', '<p>U/L&nbsp;</p>', 'true', 'up to 49', 'youth', 'active', 'Bolaji', '2020-06-29', NULL, '13:39:19', NULL, NULL, NULL, NULL, NULL),
(384, '127', 'AST	 ', 'param_form', NULL, '', 'true', '<p>&nbsp;U/L&nbsp;</p>', 'true', 'up to 46', 'youth', 'active', 'Bolaji', '2020-06-29', NULL, '13:39:42', NULL, NULL, NULL, NULL, NULL),
(385, '127', 'ALP	  ', 'param_form', NULL, '', 'true', '<p>&nbsp;U/L</p>', 'true', '80-1200', 'youth', 'active', 'Bolaji', '2020-06-29', NULL, '13:40:11', NULL, NULL, NULL, NULL, NULL),
(386, '127', 'Total Protein	 ', 'param_form', NULL, '', 'true', '<p>&nbsp;g/L&nbsp;</p>', 'true', '62-80', 'youth', 'active', 'Bolaji', '2020-06-29', NULL, '13:41:00', NULL, NULL, NULL, NULL, NULL),
(387, '127', 'Albumin	', 'param_form', NULL, '', 'true', '<p>&nbsp;g/L&nbsp;&nbsp;</p>', 'true', '35-50', 'youth', 'active', 'Bolaji', '2020-06-29', NULL, '13:41:24', NULL, NULL, NULL, NULL, NULL),
(388, '128', 'FSH', 'param_form', NULL, '', 'true', '<p>mIU/ml</p>', 'true', '3.0-12.0', 'adult', 'active', '3571', '2020-07-01', NULL, '15:23:31', NULL, NULL, NULL, NULL, NULL),
(389, '128', 'LH', 'param_form', NULL, '', 'true', '<p>mIU/ml</p>', 'true', '2.95-13.65', 'adult', 'active', '3571', '2020-07-01', NULL, '15:24:08', NULL, NULL, NULL, NULL, NULL),
(390, '128', 'Prolactin', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '4.6-25.07', 'adult', 'active', '3571', '2020-07-01', NULL, '15:24:36', NULL, NULL, NULL, NULL, NULL),
(391, '128', 'Testosterone', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '0.2-0.95', 'adult', 'active', '3571', '2020-07-01', NULL, '15:25:08', 'Bolaji', '2020-08-10', '10:45:00', NULL, NULL),
(392, '128', 'Progesterone', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '3.0 - 30.0', 'adult', 'active', '3571', '2020-07-01', NULL, '15:25:39', '3571', '2020-12-29', '11:06:54', NULL, NULL),
(393, '114', 'ALP		', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', '180-1200', 'adult', 'inactive', 'Bolaji', '2020-07-09', NULL, '15:25:10', NULL, NULL, NULL, NULL, NULL),
(394, '114', 'ALP	  ', 'param_form', NULL, '', 'true', '<p>U/L&nbsp;</p>', 'true', '180-1200', 'youth', 'active', 'Bolaji', '2020-07-09', NULL, '16:03:15', NULL, NULL, NULL, NULL, NULL),
(395, '129', 'Calcium				', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.2-2.7', 'adult', 'active', 'Bolaji', '2020-07-09', NULL, '17:51:04', NULL, NULL, NULL, NULL, NULL),
(396, '129', 'Phosphate			', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '0.6-1.4', 'adult', 'active', 'Bolaji', '2020-07-09', NULL, '17:51:27', 'Bolaji', '2020-07-09', '18:19:15', NULL, NULL),
(397, '129', 'Uric acid		', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '0.2-0.45', 'adult', 'inactive', 'Bolaji', '2020-07-09', NULL, '17:51:47', NULL, NULL, NULL, NULL, NULL),
(398, '129', 'Albumin			', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '35-50', 'adult', 'active', 'Bolaji', '2020-07-09', NULL, '17:52:11', NULL, NULL, NULL, NULL, NULL),
(399, '130', 'GFR', 'param_form', NULL, '', 'true', '<p>mL/min/1.73m&sup2;</p>', 'true', '>90', 'adult', 'active', 'Bolaji', '2020-07-13', NULL, '13:21:02', 'Bolaji', '2020-07-13', '13:23:03', NULL, NULL),
(400, '131', 'C- Reactive Protein (CRP)', 'param_form', NULL, '', 'true', '<p>mg/L&nbsp;</p>', 'true', '‹ 10.0', 'adult', 'active', 'Bolaji', '2020-07-16', NULL, '19:27:39', 'HRM/ST/007', '2021-09-08', '18:42:52', NULL, NULL),
(401, '132', 'Sodium	', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '135-155', 'adult', 'active', 'Bolaji', '2020-07-20', NULL, '16:46:11', NULL, NULL, NULL, NULL, NULL),
(402, '132', 'Potassium	', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '3.0-5.0', 'adult', 'active', 'Bolaji', '2020-07-20', NULL, '16:46:33', NULL, NULL, NULL, NULL, NULL),
(403, '132', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '53-106', 'adult', 'active', 'Bolaji', '2020-07-20', NULL, '16:46:55', NULL, NULL, NULL, NULL, NULL),
(404, '132', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.5', 'adult', 'active', 'Bolaji', '2020-07-20', NULL, '16:47:16', NULL, NULL, NULL, NULL, NULL),
(405, '133', 'Creatinine 	', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '53-106', 'adult', 'active', 'Bolaji', '2020-07-20', NULL, '17:04:16', NULL, NULL, NULL, NULL, NULL),
(406, '133', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.5', 'adult', 'active', 'Bolaji', '2020-07-20', NULL, '17:04:46', NULL, NULL, NULL, NULL, NULL),
(407, '134', 'WBC', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '4.00-20.00', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:20:26', 'Bolaji', '2020-07-20', '19:23:08', NULL, NULL),
(408, '134', 'Neutrophil #', 'param_form', NULL, '', 'true', '<p><span style=\"color: #212529; font-family: Poppi', 'true', '0.92-11.40', 'infant', 'inactive', 'Bolaji', '2020-07-20', NULL, '19:22:41', NULL, NULL, NULL, NULL, NULL),
(409, '134', 'Neutrophil #', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.92-11.40', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:24:16', NULL, NULL, NULL, NULL, NULL),
(410, '134', 'Lymphocyte#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.40-12.00', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:25:25', NULL, NULL, NULL, NULL, NULL),
(411, '134', 'Monocyte#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.12-2.50', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:26:30', NULL, NULL, NULL, NULL, NULL),
(412, '134', 'Eosinophil#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.02-0.80', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:27:03', NULL, NULL, NULL, NULL, NULL),
(413, '134', 'Basophil#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.00-0.20', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:28:09', NULL, NULL, NULL, NULL, NULL),
(414, '134', 'Neutrophil', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '40.0-80.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:28:59', NULL, NULL, NULL, NULL, NULL),
(415, '134', 'Lymphocyte', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '10.0-60.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:29:29', NULL, NULL, NULL, NULL, NULL),
(416, '134', 'Monocyte', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '3.0-13.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:30:03', NULL, NULL, NULL, NULL, NULL),
(417, '134', 'Eosinophil', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '0.5-5.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:30:24', NULL, NULL, NULL, NULL, NULL),
(418, '134', 'Basophil', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '0.0-1.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:30:42', NULL, NULL, NULL, NULL, NULL),
(419, '134', 'RBC', 'param_form', NULL, '', 'true', '<p>10<sup>12</sup>/L</p>', 'true', '3.50-7.00', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:31:41', NULL, NULL, NULL, NULL, NULL),
(420, '134', 'HGB', 'param_form', NULL, '', 'true', '<p>g/dL</p>', 'true', '17.0-20.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:32:12', NULL, NULL, NULL, NULL, NULL),
(421, '134', 'HCT/PCV', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '38.0-68.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:34:22', NULL, NULL, NULL, NULL, NULL),
(422, '134', 'MCV', 'param_form', NULL, '', 'true', '<p>fL</p>', 'true', '95.0-125.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:35:03', NULL, NULL, NULL, NULL, NULL),
(423, '134', 'MCH', 'param_form', NULL, '', 'true', '<p>pg</p>', 'true', '30.0-42.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:35:45', NULL, NULL, NULL, NULL, NULL),
(424, '134', 'MCHC', 'param_form', NULL, '', 'true', '<p>g/dL</p>', 'true', '30.0-34.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:36:28', NULL, NULL, NULL, NULL, NULL),
(425, '134', 'RDW-CV', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '11.0-16.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:36:52', NULL, NULL, NULL, NULL, NULL),
(426, '134', 'RDW-SD', 'param_form', NULL, '', 'true', '<p>fL</p>', 'true', '35.0-56.0', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:37:23', NULL, NULL, NULL, NULL, NULL),
(427, '134', 'Platelet', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '100-450', 'infant', 'active', 'Bolaji', '2020-07-20', NULL, '19:37:57', NULL, NULL, NULL, NULL, NULL),
(428, '135', 'WBC	 ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L&nbsp;</p>', 'true', '2.50-10.00', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:04:35', 'Bolaji', '2020-07-21', '10:40:33', NULL, NULL),
(429, '135', 'Neutrophil#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '1.20-5.75', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:13:21', NULL, NULL, NULL, NULL, NULL),
(430, '135', 'Lymphocyte#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.65-3.75', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:14:14', NULL, NULL, NULL, NULL, NULL),
(431, '135', 'Monocyte#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.03-0.61', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:14:50', NULL, NULL, NULL, NULL, NULL),
(432, '135', 'Eosinophil#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.02-0.80', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:15:22', NULL, NULL, NULL, NULL, NULL),
(433, '135', 'Basophil#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.00-0.10', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:17:19', NULL, NULL, NULL, NULL, NULL),
(434, '135', 'Neutrophil	  ', 'param_form', NULL, '', 'true', '<p>%&nbsp;</p>', 'true', '45.0-50.0', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:21:57', NULL, NULL, NULL, NULL, NULL),
(435, '135', 'Lymphocyte	', 'param_form', NULL, '', 'true', '<p>&nbsp;%&nbsp;</p>', 'true', '40.0-45.0', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:22:58', NULL, NULL, NULL, NULL, NULL),
(436, '135', 'Monocyte	', 'param_form', NULL, '', 'true', '<p>%&nbsp;&nbsp;</p>', 'true', '1.0-5.0', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:23:40', NULL, NULL, NULL, NULL, NULL),
(437, '135', 'Eosinophil', 'param_form', NULL, '', 'true', '<p>%&nbsp;&nbsp;</p>', 'true', '1.0-8.0', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:24:29', NULL, NULL, NULL, NULL, NULL),
(438, '135', 'Basophil	  ', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '0.0-1.0', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:25:14', NULL, NULL, NULL, NULL, NULL),
(439, '135', 'RBC', 'param_form', NULL, '', 'true', '<p>10<sup>12</sup>/L</p>', 'true', '3.80-5.80', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:26:34', 'Bolaji', '2020-07-21', '10:40:24', NULL, NULL),
(440, '135', 'HGB	 ', 'param_form', NULL, '', 'true', '<p>g/dL&nbsp;</p>', 'true', '12.0-16.5', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:27:25', 'Bolaji', '2020-07-21', '10:40:18', NULL, NULL),
(441, '135', 'HCT/PCV', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '35.0-49.0', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:28:19', 'Bolaji', '2020-07-21', '10:40:13', NULL, NULL),
(442, '135', 'MCV	 ', 'param_form', NULL, '', 'true', '<p>fL&nbsp;</p>', 'true', '76.0-96.0', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:30:19', 'Bolaji', '2020-07-21', '10:40:08', NULL, NULL),
(443, '134', 'MCHC	   ', 'param_form', NULL, '', 'true', '<p>g/dL</p>', 'true', '32.0-36.0', 'youth', 'inactive', 'Bolaji', '2020-07-21', NULL, '10:34:29', NULL, NULL, NULL, NULL, NULL),
(444, '135', 'MCH	 ', 'param_form', NULL, '', 'true', '<p>pg&nbsp;</p>', 'true', '27.0-32.0', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:34:43', 'Bolaji', '2020-07-21', '10:40:02', NULL, NULL),
(445, '135', 'MCHC	  ', 'param_form', NULL, '', 'true', '<p>g/dL</p>', 'true', '32.0-36.0', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:35:50', NULL, NULL, NULL, NULL, NULL),
(446, '135', 'RDW-CV ', 'param_form', NULL, '', 'true', '<p>%&nbsp;</p>', 'true', '10.0-15.0', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:36:40', NULL, NULL, NULL, NULL, NULL),
(447, '135', 'RDW-SD  ', 'param_form', NULL, '', 'true', '<p>fL</p>', 'true', '35.0-56.0', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:38:16', NULL, NULL, NULL, NULL, NULL),
(448, '134', 'Platelet	   ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '100-450', 'youth', 'inactive', 'Bolaji', '2020-07-21', NULL, '10:38:56', NULL, NULL, NULL, NULL, NULL),
(449, '135', 'Platelet	   ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '100-450', 'youth', 'active', 'Bolaji', '2020-07-21', NULL, '10:39:34', NULL, NULL, NULL, NULL, NULL),
(450, '136', 'WBC	   ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '2.50-10.00', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '10:42:51', NULL, NULL, NULL, NULL, NULL),
(451, '136', 'Neutrophil #	   ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '1.25-5.75', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '10:47:13', NULL, NULL, NULL, NULL, NULL),
(452, '136', 'Lymphocyte#	   ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.65-3.75', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '10:57:38', NULL, NULL, NULL, NULL, NULL),
(453, '136', 'Monocyte#	   ', 'param_form', NULL, '', 'true', '<p>109/L</p>', 'true', '0.03-0.61', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '10:58:33', NULL, NULL, NULL, NULL, NULL),
(454, '136', 'Eosinophil#	   ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.02-0.80', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:08:03', NULL, NULL, NULL, NULL, NULL),
(455, '136', 'Basophil#	   ', 'param_form', NULL, '', 'true', '<p>109/L</p>', 'true', '0.00-0.10', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:09:02', NULL, NULL, NULL, NULL, NULL),
(456, '136', 'Neutrophil', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '45.0-55.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:10:56', NULL, NULL, NULL, NULL, NULL),
(457, '134', 'Lymphocyte	', 'param_form', NULL, '', 'true', '<p>%&nbsp;&nbsp;</p>', 'true', '25.0-40.0', 'adult', 'inactive', 'Bolaji', '2020-07-21', NULL, '11:11:41', NULL, NULL, NULL, NULL, NULL),
(458, '136', 'Lymphocyte	   ', 'param_form', NULL, '', 'true', '<p>&nbsp;%&nbsp;</p>', 'true', '25.0-40.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:13:51', NULL, NULL, NULL, NULL, NULL),
(459, '136', 'Monocyte	', 'param_form', NULL, '', 'true', '<p>%&nbsp;&nbsp;</p>', 'true', '1.0-6.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:15:07', NULL, NULL, NULL, NULL, NULL),
(460, '136', 'Eosinophil	  ', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '1.0-8.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:16:00', NULL, NULL, NULL, NULL, NULL),
(461, '136', 'Basophil	', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '0.0-1.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:16:58', NULL, NULL, NULL, NULL, NULL),
(462, '136', 'RBC	   ', 'param_form', NULL, '', 'true', '<p>10<sup>12</sup>/L</p>', 'true', '3.80-4.80', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:18:04', NULL, NULL, NULL, NULL, NULL),
(463, '136', 'HGB	  ', 'param_form', NULL, '', 'true', '<p>g/dL</p>', 'true', '11.0-16.5', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:18:59', NULL, NULL, NULL, NULL, NULL),
(464, '136', 'HCT/PCV	  ', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '38.0-48.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:19:56', NULL, NULL, NULL, NULL, NULL),
(465, '136', 'MCV	', 'param_form', NULL, '', 'true', '<p>fL</p>', 'true', '76.0-96.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:20:24', NULL, NULL, NULL, NULL, NULL),
(466, '136', 'MCH	 ', 'param_form', NULL, '', 'true', '<p>pg</p>', 'true', '27.0-32.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:20:50', NULL, NULL, NULL, NULL, NULL),
(467, '136', 'MCHC	 ', 'param_form', NULL, '', 'true', '<p>g/dL</p>', 'true', '32.0-36.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:21:15', NULL, NULL, NULL, NULL, NULL),
(468, '136', 'RDW-CV	 ', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '10.0-15.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:21:48', NULL, NULL, NULL, NULL, NULL),
(469, '136', 'RDW-SD	 ', 'param_form', NULL, '', 'true', '<p>fL</p>', 'true', '35.0-56.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:22:17', NULL, NULL, NULL, NULL, NULL),
(470, '136', 'Platelet	 ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '100-450', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:22:56', NULL, NULL, NULL, NULL, NULL),
(471, '137', 'WBC', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '2.5 &ndash; 10.00', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:25:08', 'Desmondjohn', '2026-02-09', '17:12:57', NULL, NULL),
(472, '137', 'Lymphocytes#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.65-3.75\n', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:25:56', 'Desmondjohn', '2026-02-09', '17:13:50', NULL, NULL),
(473, '137', 'Mid#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.05-1.4\n', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:26:31', 'Desmondjohn', '2026-02-09', '17:14:32', NULL, NULL),
(474, '137', 'Neutrophils#', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '1.25-5.75\n', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:26:59', 'Desmondjohn', '2026-02-09', '17:15:11', NULL, NULL),
(475, '137', 'Lymphocytes', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '25.0 &ndash; 40.0\n', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:28:15', 'Desmondjohn', '2026-02-09', '17:16:21', NULL, NULL),
(476, '137', 'Mid', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '0.00-15.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:28:44', 'Desmondjohn', '2026-02-09', '17:17:16', NULL, NULL),
(477, '137', 'Neutrophils', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '45.0-55.0\n', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:29:13', 'Desmondjohn', '2026-02-09', '17:18:04', NULL, NULL),
(478, '137', 'RBC', 'param_form', NULL, '', 'true', '<p>10<sup>12</sup>/L</p>', 'true', '4.50-6.50\n', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:29:43', 'Desmondjohn', '2026-02-09', '17:19:09', NULL, NULL),
(479, '137', 'HGB', 'param_form', NULL, '', 'true', '<p>g/dl</p>', 'true', '12.0-16.5\n', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:32:41', 'Desmondjohn', '2026-02-09', '17:19:52', NULL, NULL),
(480, '137', 'HCT/PCV', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '40-55', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:33:54', 'Desmondjohn', '2026-02-09', '17:20:46', NULL, NULL),
(481, '137', 'MCV', 'param_form', NULL, '', 'true', '<p>fL</p>', 'true', '76.0-96.0\n', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:36:08', 'Desmondjohn', '2026-02-09', '17:21:39', NULL, NULL),
(482, '137', 'MCH', 'param_form', NULL, '', 'true', '<p>pg</p>', 'true', '27-32', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:36:48', 'Desmondjohn', '2026-02-09', '17:22:57', NULL, NULL),
(483, '137', 'MCHC', 'param_form', NULL, '', 'true', '<p>g/dl</p>', 'true', '32.0-36.0\n', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:40:15', 'Desmondjohn', '2026-02-09', '17:23:42', NULL, NULL),
(484, '137', 'RDW-CV', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '10.0-15.0\n', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:40:39', 'Desmondjohn', '2026-02-09', '17:24:33', NULL, NULL),
(485, '137', 'RDW-SD', 'param_form', NULL, '', 'true', '<p>fL</p>', 'true', '35.0-36.0\n', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:41:10', 'Desmondjohn', '2026-02-09', '17:25:23', NULL, NULL),
(486, '137', 'PLT', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '100&ndash;300', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:41:36', 'Desmondjohn', '2026-02-09', '17:26:02', NULL, NULL),
(487, '137', 'MCHC	 ', 'param_form', NULL, '', 'true', '<p>g/dL</p>', 'true', '32.0-36.0', 'adult', 'inactive', 'Bolaji', '2020-07-21', NULL, '11:42:03', NULL, NULL, NULL, NULL, NULL),
(488, '137', 'RDW-CV	 ', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '10.0-15.0', 'adult', 'inactive', 'Bolaji', '2020-07-21', NULL, '11:43:43', NULL, NULL, NULL, NULL, NULL),
(489, '137', 'RDW-SD	 ', 'param_form', NULL, '', 'true', '<p>fL</p>', 'true', '35.0-56.0', 'adult', 'inactive', 'Bolaji', '2020-07-21', NULL, '11:44:10', NULL, NULL, NULL, NULL, NULL),
(490, '137', 'Platelet	 ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '100-450', 'adult', 'inactive', 'Bolaji', '2020-07-21', NULL, '11:44:43', NULL, NULL, NULL, NULL, NULL),
(491, '132', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '20-31', 'adult', 'inactive', 'Bolaji', '2020-07-22', NULL, '12:14:40', NULL, NULL, NULL, NULL, NULL),
(492, '132', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97-107', 'adult', 'active', 'Bolaji', '2020-07-22', NULL, '12:15:42', NULL, NULL, NULL, NULL, NULL),
(493, '132', 'Creatinine', 'param_form', NULL, '', 'true', '<p><span style=\"color: #212529; font-family: Poppi', 'true', '53-106', 'adult', 'inactive', 'Bolaji', '2020-07-22', NULL, '12:16:05', NULL, NULL, NULL, NULL, NULL),
(494, '132', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '17.7-70.7', 'adult', 'inactive', 'Bolaji', '2020-07-22', NULL, '12:16:43', 'Bolaji', '2020-10-09', '15:35:25', NULL, NULL),
(495, '132', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.0-6.5', 'adult', 'inactive', 'Bolaji', '2020-07-22', NULL, '12:17:03', 'Bolaji', '2020-10-09', '15:35:44', NULL, NULL),
(496, '138', 'ALP		', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', '64 – 306', 'adult', 'active', 'Bolaji', '2020-07-24', NULL, '16:08:26', NULL, NULL, NULL, NULL, NULL),
(497, '139', 'FSH', 'param_form', NULL, '', 'true', '<p><span style=\"color: #212529; font-family: Poppi', 'true', '3.0-12.0', 'adult', 'inactive', 'Bolaji', '2020-07-25', NULL, '11:34:50', NULL, NULL, NULL, NULL, NULL),
(498, '139', 'FSH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '3.0-12.0', 'adult', 'active', 'Bolaji', '2020-07-25', NULL, '11:35:22', NULL, NULL, NULL, NULL, NULL),
(499, '139', 'LH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '2.95-13.65', 'adult', 'active', 'Bolaji', '2020-07-25', NULL, '11:35:50', NULL, NULL, NULL, NULL, NULL),
(500, '139', 'Estradiol', 'param_form', NULL, '', 'true', '<p>pg/mL</p>', 'true', '7-175', 'adult', 'active', 'Bolaji', '2020-07-25', NULL, '11:36:28', NULL, NULL, NULL, NULL, NULL),
(501, '139', 'Testosterone', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '0.2-0.95', 'adult', 'active', 'Bolaji', '2020-07-25', NULL, '11:36:59', 'Bolaji', '2020-08-10', '10:46:25', NULL, NULL),
(502, '140', 'BNP', 'param_form', NULL, '', 'true', '<p>pg/mL</p>', 'true', '0 - 100', 'adult', 'active', 'Bolaji', '2020-07-28', NULL, '10:51:05', '3571', '2021-02-19', '12:28:02', NULL, NULL),
(503, '131', 'hsCRP', 'param_form', NULL, '', 'true', '<p>mg/L</p>', 'true', '‹ 0.3', 'adult', 'inactive', 'Bolaji', '2020-07-30', NULL, '18:57:44', 'Bolaji', '2020-07-30', '18:58:38', NULL, NULL),
(504, '141', 'FSH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '3.0 -12.0', 'adult', 'active', '3571', '2020-08-08', NULL, '12:57:31', NULL, NULL, NULL, NULL, NULL),
(505, '141', 'LH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '2.95 - 13.65', 'adult', 'active', '3571', '2020-08-08', NULL, '12:58:10', NULL, NULL, NULL, NULL, NULL),
(506, '141', 'Estradiol', 'param_form', NULL, '', 'true', '<p>pg/mL</p>', 'true', '7.0- 175.0', 'adult', 'active', '3571', '2020-08-08', NULL, '12:59:17', 'HRM/ST/007', '2021-09-06', '18:02:13', NULL, NULL),
(507, '142', '', 'text_form', '<p>DONE</p>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'Bolaji', '2020-08-10', NULL, '09:54:50', NULL, NULL, NULL, NULL, NULL),
(508, '120', 'FSH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '3.0 - 12.0', 'adult', 'active', 'Bolaji', '2020-08-13', NULL, '18:27:53', NULL, NULL, NULL, NULL, NULL),
(509, '120', 'LH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '2.95 - 13.65', 'adult', 'active', 'Bolaji', '2020-08-13', NULL, '18:28:25', NULL, NULL, NULL, NULL, NULL),
(510, '120', 'Prolactin', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '4.6 - 25.06', 'adult', 'active', 'Bolaji', '2020-08-13', NULL, '18:29:35', NULL, NULL, NULL, NULL, NULL),
(511, '120', 'Estradiol', 'param_form', NULL, '', 'true', '<p>pg/mL</p>', 'true', '7.0 - 175.0', 'adult', 'active', 'Bolaji', '2020-08-13', NULL, '18:30:28', NULL, NULL, NULL, NULL, NULL),
(512, '120', 'Progesterone', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '3.0 - 30.0', 'adult', 'active', 'Bolaji', '2020-08-13', NULL, '18:31:34', 'Bolaji', '2020-11-21', '15:43:06', NULL, NULL),
(513, '143', '', 'text_form', '<table style=\"width: 536px;\">\n<tbody>\n<tr>\n<td style=\"width: 519.703px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Microscopy: </strong>Wet preparation</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pus cells: 4 -10/ HPF Seen</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Red blod cells: Numerous/ HPF Seen</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Epithelial cells:&nbsp; 3-15/HPF Seen</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sperm cells: 1-2/ HPF Seen</span></p>\n<p><span style=\"font-size: 18pt;\">.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Other: Nil</span></p>\n</td>\n</tr>\n</tbody>\n</table>\n<p>&nbsp;</p>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'Bolaji', '2020-08-28', NULL, '15:47:12', 'Bolaji', '2020-08-28', '15:48:08', NULL, NULL),
(514, '144', 'FSH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '1.50 - 12.40', 'adult', 'active', '3571', '2020-08-29', NULL, '10:58:01', NULL, NULL, NULL, NULL, NULL),
(515, '144', 'LH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '1.70 - 8.60', 'adult', 'active', '3571', '2020-08-29', NULL, '10:58:46', NULL, NULL, NULL, NULL, NULL),
(516, '144', 'Testosterone', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '2.50 - 10.60', 'adult', 'active', '3571', '2020-08-29', NULL, '11:00:03', NULL, NULL, NULL, NULL, NULL),
(517, '145', 'Triglyceride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '0.3-1.7', 'adult', 'active', 'Bolaji', '2020-09-09', NULL, '17:12:08', NULL, NULL, NULL, NULL, NULL),
(518, '146', 'Throat Swab', 'param_form', NULL, '', 'true', '<p>-</p>', 'true', '-', 'adult', 'inactive', 'Bolaji', '2020-09-10', NULL, '15:41:05', NULL, NULL, NULL, NULL, NULL),
(519, '146', '', 'text_form', '<p>--</p>', '', NULL, NULL, NULL, NULL, NULL, 'inactive', 'Bolaji', '2020-09-10', NULL, '15:41:23', NULL, NULL, NULL, NULL, NULL),
(520, '146', '', 'text_form', '<p>&nbsp;</p>\n<p><strong>Appearance:&nbsp;</strong>Brownish discharge on swab stick</p>\n<p><strong>Microscopy:&nbsp;</strong>Gram stain</p>\n<p>&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Numerous pus cells seen</p>\n<p>&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Epithelial cells seen</p>\n<p>&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Gram negative bacilli seen</p>\n<p><strong>Culture:</strong>&nbsp;Yielded profuse growth of&nbsp;<em>&nbsp;Klebsiella pneumonia</em></p>\n<p>Ampicillin/Sulbactam&ndash; Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Cefepime&nbsp; - Sensitive&nbsp;</p>\n<p>Ciprofloxacin&nbsp; -&nbsp; Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Gentamicin&nbsp; -&nbsp;&nbsp; Sensitive</p>\n<p>Augmentin - Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ceftazidime- Sensitive</p>\n<p>&nbsp;&nbsp;&nbsp;</p>\n<p>&nbsp;</p>\n<table width=\\\"\\\\&quot;423\\\\&quot;\\\">\n<tbody>\n<tr>\n<td width=\\\"\\\\&quot;423\\\\&quot;\\\">&nbsp;</td>\n</tr>\n</tbody>\n</table>\n<p>&nbsp;</p>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2020-09-12', NULL, '11:29:14', NULL, NULL, NULL, NULL, NULL),
(521, '4', 'Spermatozoa', 'param_form', NULL, '', 'false', '<p>-</p>', 'false', '-', 'adult', 'inactive', 'Bolaji', '2020-09-12', NULL, '19:07:17', 'Bolaji', '2020-09-12', '19:08:32', NULL, NULL),
(522, '148', 'NGSP (HBAIC)', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '4.5 - 7.0', 'adult', 'active', '3571', '2020-09-24', NULL, '14:45:32', '3571', '2021-12-11', '11:25:14', NULL, NULL),
(523, '148', 'IFFC ', 'param_form', NULL, '', 'true', '<p>mmol/mol</p>', 'true', '26 - 48', 'adult', 'active', '3571', '2020-09-24', NULL, '14:46:37', '3571', '2020-09-24', '14:49:26', NULL, NULL),
(524, '148', 'eAG', 'param_form', NULL, '', 'true', '<p>mg/dl</p>', 'true', '45.0 - 199.8 (RBG) 45.0 - 108 (FBG)', 'adult', 'active', '3571', '2020-09-24', NULL, '14:48:19', '3571', '2020-09-24', '14:51:10', NULL, NULL),
(525, '149', 'FSH', 'param_form', NULL, '', 'true', '<p>&nbsp;</p>\n<p>mIU/mL</p>', 'true', '0.68 - 6.7', 'youth', 'active', 'Bolaji', '2020-10-07', NULL, '19:22:01', NULL, NULL, NULL, NULL, NULL),
(526, '149', 'LH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '0.02 - 4.8', 'youth', 'active', 'Bolaji', '2020-10-07', NULL, '19:24:11', NULL, NULL, NULL, NULL, NULL),
(527, '150', 'Urine Pregnancy Test', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-10-08', NULL, '13:39:29', NULL, NULL, NULL, NULL, NULL),
(528, '151', '', 'text_form', '<table style=\"width: 686px;\">\n<tbody>\n<tr>\n<td style=\"width: 669.703px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Appearance:&nbsp;</strong>Serosanguinous fluid in universal bottle</span></p>\n</td>\n</tr>\n<tr>\n<td style=\"width: 669.703px;\">\n<p><span style=\"font-size: 18pt;\"><strong>Microscopy:</strong></span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Wet preparation</span></p>\n<ul>\n<li><span style=\"font-size: 18pt;\">Estimated white blood cell count &ndash; 380 x10<sup>6</sup>&nbsp;cells/L</span></li>\n</ul>\n<p><span style=\"font-size: 18pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *lymphocytes &ndash; 92%</span></p>\n<p><span style=\"font-size: 18pt;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *polymorphonuclear cells &ndash; 8%</span></p>\n<ul>\n<li><span style=\"font-size: 18pt;\">Numerous red blood cells</span></li>\n</ul>\n</td>\n</tr>\n</tbody>\n</table>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'Bolaji', '2020-10-10', NULL, '10:22:32', 'Bolaji', '2020-10-10', '10:22:47', NULL, NULL),
(529, '153', 'Corisol', 'param_form', NULL, '', 'true', '<p>nmol/L</p>', 'true', '140 - 700', 'adult', 'active', 'Bolaji', '2020-10-27', NULL, '08:48:32', NULL, NULL, NULL, NULL, NULL),
(530, '154', 'Cortisol (PM)', 'param_form', NULL, '', 'true', '<p>nmol/L</p>', 'true', '80 - 350', 'adult', 'active', 'Bolaji', '2020-10-27', NULL, '08:49:42', NULL, NULL, NULL, NULL, NULL),
(531, '155', '', 'text_form', '<ul>\n<li><span style=\"font-size: 18pt;\"><strong>Sputum AAFB 1:</strong></span></li>\n</ul>\n<p><span style=\"font-size: 18pt;\">Appearance: Mucosalivary sputum</span></p>\n<p><span style=\"font-size: 18pt;\">Result - Negative</span></p>\n<ul>\n<li><span style=\"font-size: 18pt;\"><strong>Sputum AAFB 2:</strong></span></li>\n</ul>\n<p><span style=\"font-size: 18pt;\">Appearance: Mucopurulent sputum</span></p>\n<p><span style=\"font-size: 18pt;\">Result - Negative</span></p>\n<ul>\n<li><span style=\"font-size: 18pt;\"><strong>Sputum AAFB 3:</strong></span></li>\n</ul>\n<p><span style=\"font-size: 18pt;\">Appearance: Mucosalivary sputum</span></p>\n<p><span style=\"font-size: 18pt;\">Result - Negative</span></p>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'Bolaji', '2020-10-29', NULL, '16:38:06', '3571', '2021-06-16', '08:41:22', NULL, NULL),
(532, '156', 'HCV RNA Copies', 'param_form', NULL, '', 'true', '<p>Copies/mL</p>', 'false', '', 'adult', 'active', 'Bolaji', '2020-10-30', NULL, '15:42:18', NULL, NULL, NULL, NULL, NULL),
(533, '156', 'Units', 'param_form', NULL, '', 'true', '<p>IU/mL</p>', 'false', '', 'adult', 'active', 'Bolaji', '2020-10-30', NULL, '15:42:42', NULL, NULL, NULL, NULL, NULL),
(534, '156', 'Log 10', 'param_form', NULL, '', 'true', '<p>IU/mL</p>', 'false', '', 'adult', 'active', 'Bolaji', '2020-10-30', NULL, '15:42:58', NULL, NULL, NULL, NULL, NULL),
(535, '156', 'Lower limit of detection(LOD)', 'param_form', NULL, '', 'true', '<p>IU/mL</p>', 'false', '', 'adult', 'active', 'Bolaji', '2020-10-30', NULL, '15:43:47', NULL, NULL, NULL, NULL, NULL),
(536, '157', 'FSH', 'param_form', NULL, '', 'true', '<p><span style=\"color: #212529; font-family: Poppi', 'true', '3.0-12.0', 'adult', 'inactive', '3571', '2020-10-31', NULL, '16:10:54', NULL, NULL, NULL, NULL, NULL),
(537, '157', 'FSH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '1.50-12.40', 'adult', 'active', '3571', '2020-10-31', NULL, '16:11:50', 'Bolaji', '2022-03-07', '17:13:13', NULL, NULL),
(538, '157', 'LH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '1.70-8.60', 'adult', 'active', '3571', '2020-10-31', NULL, '16:15:54', 'Bolaji', '2022-03-07', '17:13:24', NULL, NULL),
(539, '157', 'Testosterone', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '2.50-10.60', 'adult', 'active', '3571', '2020-10-31', NULL, '16:16:31', 'Bolaji', '2022-03-07', '17:13:38', NULL, NULL),
(540, '158', '', 'text_form', '<p>.</p>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'Bolaji', '2020-11-03', NULL, '10:52:44', NULL, NULL, NULL, NULL, NULL),
(541, '159', 'RF(IgM)', 'param_form', NULL, '', 'true', '<p>IU/mL</p>', 'true', '', 'adult', 'inactive', 'Bolaji', '2020-11-03', NULL, '15:03:49', 'Bolaji', '2020-11-03', '15:06:28', NULL, NULL),
(542, '159', 'RF(IgM)', 'param_form', NULL, '', 'true', '<p>IU/mL</p>', 'true', '0 - 15', 'adult', 'active', 'Bolaji', '2020-11-03', NULL, '15:06:55', 'Bolaji', '2020-11-03', '15:07:50', NULL, NULL),
(543, '160', 'Hepatitis C genotype', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-11-04', NULL, '08:48:14', NULL, NULL, NULL, NULL, NULL),
(544, '161', 'Hepatis B genotype', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-11-04', NULL, '08:48:47', NULL, NULL, NULL, NULL, NULL),
(545, '162', 'Chlamydia Antigen', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-12-01', NULL, '10:57:02', NULL, NULL, NULL, NULL, NULL),
(546, '163', 'T. Vaginalis', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2020-12-01', NULL, '11:00:24', NULL, NULL, NULL, NULL, NULL),
(547, '21', 'Sodium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '40-220', 'adult', 'active', 'Bolaji', '2020-12-19', NULL, '10:12:24', 'HRM/ST/007', '2022-05-26', '19:22:53', NULL, NULL),
(548, '21', 'Potassium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '25-125', 'adult', 'active', 'Bolaji', '2020-12-19', NULL, '10:14:45', 'HRM/ST/007', '2022-05-26', '19:23:10', NULL, NULL),
(549, '165', 'Alkaline Phosphatase(ALP) Children', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', '80 - 1200', 'youth', 'active', '3571', '2021-01-30', NULL, '14:56:43', NULL, NULL, NULL, NULL, NULL),
(550, '166', 'ALT', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', '0-49', 'adult', 'active', '3571', '2021-02-02', NULL, '09:55:04', '3571', '2021-02-02', '09:55:29', NULL, NULL),
(551, '167', 'Testosterone (F)', 'param_form', NULL, '', 'true', '<p>0.2 - 0.95</p>', 'true', 'ng/mL', 'adult', 'active', '3571', '2021-02-22', NULL, '18:08:12', NULL, NULL, NULL, NULL, NULL),
(552, '168', '1 Hour Postprandial', 'param_form', NULL, '', 'true', '<p>&lt;7.8</p>', 'true', 'mmol/L', 'adult', 'active', '3571', '2021-02-24', NULL, '11:19:35', '3571', '2021-02-24', '11:52:04', NULL, NULL),
(553, '90', '2 Hour Prosprandial', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '', 'adult', 'inactive', '3571', '2021-02-24', NULL, '11:45:39', NULL, NULL, NULL, NULL, NULL),
(554, '169', 'Estradiol', 'param_form', NULL, '', 'true', '<p>pg/ml</p>', 'true', '10-82', 'adult', 'active', '3571', '2021-02-26', NULL, '07:53:54', NULL, NULL, NULL, NULL, NULL),
(555, '170', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '20-31', 'adult', 'active', '3571', '2021-03-01', NULL, '15:53:23', NULL, NULL, NULL, NULL, NULL),
(556, '171', 'Creatinine (Children)', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '17.7-70.7', 'youth', 'active', 'Bolaji', '2021-03-05', NULL, '12:48:01', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `specimen_result_template` (`sn`, `bill_type_id`, `name`, `temp_type`, `raw_text_val`, `result`, `has_unit`, `unit`, `has_ref_val`, `ref_val`, `age_range`, `status`, `c_by`, `date_c`, `time_del`, `time_c`, `upd_by`, `date_upd`, `time_upd`, `del_by`, `date_del`) VALUES
(557, '171', 'Urea (Children)', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.0-6.5', 'youth', 'active', 'Bolaji', '2021-03-05', NULL, '12:48:51', NULL, NULL, NULL, NULL, NULL),
(558, '173', '', 'text_form', '<p>.</p>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2021-04-02', NULL, '13:12:45', NULL, NULL, NULL, NULL, NULL),
(559, '60', 'Potassium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '3.0 - 5.0', 'youth', 'active', '3571', '2021-04-27', NULL, '09:08:15', 'Bolaji', '2022-04-14', '09:03:15', NULL, NULL),
(560, '60', 'Sodium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '135 - 155', 'youth', 'active', '3571', '2021-04-27', NULL, '09:08:48', 'Bolaji', '2022-04-14', '09:03:57', NULL, NULL),
(561, '60', 'Chloride', 'param_form', NULL, '', 'true', '<p><span style=\"color: #212529; font-family: Poppi', 'true', '97 - 107', 'youth', 'inactive', '3571', '2021-04-27', NULL, '09:09:46', NULL, NULL, NULL, NULL, NULL),
(562, '60', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p><span style=\"color: #212529; font-family: Poppi', 'true', '20 - 31', 'youth', 'inactive', '3571', '2021-04-27', NULL, '09:10:24', NULL, NULL, NULL, NULL, NULL),
(563, '60', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97 - 107', 'youth', 'inactive', '3571', '2021-04-27', NULL, '09:12:30', NULL, NULL, NULL, NULL, NULL),
(564, '60', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '20 - 31', 'youth', 'inactive', '3571', '2021-04-27', NULL, '09:12:59', NULL, NULL, NULL, NULL, NULL),
(565, '174', 'Potassium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '3.0-5.0', 'youth', 'active', '3571', '2021-04-27', NULL, '09:21:35', NULL, NULL, NULL, NULL, NULL),
(566, '174', 'Sodium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '135-155', 'youth', 'active', '3571', '2021-04-27', NULL, '09:22:07', NULL, NULL, NULL, NULL, NULL),
(567, '174', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97-107', 'youth', 'active', '3571', '2021-04-27', NULL, '09:22:49', NULL, NULL, NULL, NULL, NULL),
(568, '174', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '20-31', 'youth', 'inactive', '3571', '2021-04-27', NULL, '09:23:11', NULL, NULL, NULL, NULL, NULL),
(569, '174', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&mu;mol/L</p>', 'true', '17.7- 70.7', 'youth', 'active', '3571', '2021-04-27', NULL, '09:23:56', NULL, NULL, NULL, NULL, NULL),
(570, '174', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.0-6.5', 'youth', 'active', '3571', '2021-04-27', NULL, '09:24:16', NULL, NULL, NULL, NULL, NULL),
(571, '175', 'Sodium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '135-155', 'adult', 'active', '3571', '2021-04-27', NULL, '09:24:54', NULL, NULL, NULL, NULL, NULL),
(572, '175', 'Potassium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.9-5.0\n', 'adult', 'active', '3571', '2021-04-27', NULL, '09:25:27', 'desmondjohn', '2026-02-11', '14:22:33', NULL, NULL),
(573, '175', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '96-106\n', 'adult', 'active', '3571', '2021-04-27', NULL, '09:25:55', 'desmondjohn', '2026-02-11', '14:24:00', NULL, NULL),
(574, '175', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '21-28\n', 'adult', 'active', '3571', '2021-04-27', NULL, '09:26:33', 'desmondjohn', '2026-02-11', '14:25:11', NULL, NULL),
(575, '175', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '1.7 &ndash; 9.2', 'adult', 'active', '3571', '2021-04-27', NULL, '09:26:56', 'desmondjohn', '2026-02-11', '14:28:01', NULL, NULL),
(576, '175', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&mu;mol/L</p>', 'true', '64-124', 'adult', 'active', '3571', '2021-04-27', NULL, '09:27:39', 'desmondjohn', '2026-02-11', '14:29:19', NULL, NULL),
(577, '175', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.5', 'adult', 'inactive', '3571', '2021-04-27', NULL, '09:28:03', NULL, NULL, NULL, NULL, NULL),
(578, '62', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97-107', 'adult', 'active', '3571', '2021-04-27', NULL, '09:29:59', NULL, NULL, NULL, NULL, NULL),
(579, '64', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97-107', 'adult', 'active', '3571', '2021-04-27', NULL, '09:30:40', NULL, NULL, NULL, NULL, NULL),
(580, '60', 'Creatinine', 'param_form', NULL, '', 'true', '<p>umol/L</p>', 'true', '17.7-70.0', 'youth', 'inactive', '3571', '2021-04-27', NULL, '09:51:48', NULL, NULL, NULL, NULL, NULL),
(581, '60', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.0 - 6.5', 'youth', 'inactive', '3571', '2021-04-27', NULL, '09:52:19', NULL, NULL, NULL, NULL, NULL),
(582, '176', 'Morphine (MOP)', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2021-05-15', NULL, '16:10:36', '3571', '2021-05-15', '16:19:20', NULL, NULL),
(583, '176', 'Methadone (MET)', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2021-05-15', NULL, '16:10:52', '3571', '2021-05-15', '16:19:03', NULL, NULL),
(584, '176', 'Amphetamines (AMP)', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2021-05-15', NULL, '16:18:40', NULL, NULL, NULL, NULL, NULL),
(585, '176', 'Cannabis (THC)', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2021-05-15', NULL, '16:20:24', NULL, NULL, NULL, NULL, NULL),
(586, '176', 'Ketamine (KET)', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2021-05-15', NULL, '16:21:16', NULL, NULL, NULL, NULL, NULL),
(587, '176', 'Cocaine (COC)', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2021-05-15', NULL, '16:23:09', NULL, NULL, NULL, NULL, NULL),
(588, '176', 'Barbiturate (BAR)', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2021-05-15', NULL, '16:24:08', NULL, NULL, NULL, NULL, NULL),
(589, '176', 'Methamphetamine (MDMA)', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', '3571', '2021-05-15', NULL, '16:29:45', NULL, NULL, NULL, NULL, NULL),
(590, '177', 'Amylase', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', '&#60;30', 'adult', 'active', 'HRM/ST/007', '2021-05-18', NULL, '18:49:35', '3571', '2022-06-24', '12:27:51', NULL, NULL),
(591, '12', 'Serum Amylase', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', '25-86', 'adult', 'active', 'HRM/ST/007', '2021-05-18', NULL, '18:50:29', NULL, NULL, NULL, NULL, NULL),
(592, '178', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97-107', 'adult', 'active', 'HRM/ST/007', '2021-05-19', NULL, '11:59:02', NULL, NULL, NULL, NULL, NULL),
(593, '179', '', 'text_form', '<table style=\\\"border-collapse: collapse; width: 100%;\\\" border=\\\"1\\\">\n<tbody>\n<tr>\n<td style=\\\"width: 50%;\\\">appearance</td>\n<td style=\\\"width: 50%;\\\">&nbsp;</td>\n</tr>\n</tbody>\n</table>', '', NULL, NULL, NULL, NULL, NULL, 'inactive', '3571', '2021-06-19', NULL, '16:53:17', NULL, NULL, NULL, NULL, NULL),
(594, '179', '', 'text_form', '<table class=\" table table-nogap cosmo border-none  line-20\" style=\"width: 514px;\">\n<tbody>\n<tr class=\"text-uppercase dark-bottom-border\">\n<td style=\"width: 515.203px;\" colspan=\"4\"><span class=\"bold dark-bottom-border dark-top-border\" style=\"font-size: 18pt;\">RESULT</span></td>\n</tr>\n<tr class=\"text-capitalize bold dark-bottom-border\">\n<td style=\"width: 132.703px;\">&nbsp;</td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">Result</span></td>\n<td style=\"width: 152.203px;\"><span style=\"font-size: 18pt;\">Unit</span></td>\n<td style=\"width: 122.203px;\"><span style=\"font-size: 18pt;\">Reference Value</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">Appearance</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n<td style=\"width: 152.203px;\"><span style=\"font-size: 18pt;\">.</span></td>\n<td style=\"width: 122.203px;\"><span style=\"font-size: 18pt;\">Opalescent white/ Lightly yellow</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">Volume</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n<td style=\"width: 152.203px;\"><span style=\"font-size: 18pt;\">mL</span></td>\n<td style=\"width: 122.203px;\"><span style=\"font-size: 18pt;\">&gt;1.5</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">Liquefaction</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n<td style=\"width: 152.203px;\"><span style=\"font-size: 18pt;\">Complete in 60 minutes</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">Viscosity</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n<td style=\"width: 152.203px;\"><span style=\"font-size: 18pt;\">Normoviscous</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">pH</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n<td style=\"width: 152.203px;\"><span style=\"font-size: 18pt;\">-</span></td>\n<td style=\"width: 122.203px;\"><span style=\"font-size: 18pt;\">&gt;7.2</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">Motility</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n<td style=\"width: 152.203px;\"><span style=\"font-size: 18pt;\">%</span></td>\n<td style=\"width: 122.203px;\"><span style=\"font-size: 18pt;\">&gt; 40 Progressive motility</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">Progressive</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n<td style=\"width: 152.203px;\"><span style=\"font-size: 18pt;\">%</span></td>\n<td style=\"width: 122.203px;\"><span style=\"font-size: 18pt;\">.</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">Non Progressive</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">Non-motile</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">Sperm Count</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n<td style=\"width: 152.203px;\"><span style=\"font-size: 18pt;\">x10<sup>6</sup>&nbsp;cell/mL</span></td>\n<td style=\"width: 122.203px;\"><span style=\"font-size: 18pt;\">&gt;15.0</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">Morphology</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n<td style=\"width: 152.203px;\"><span style=\"font-size: 18pt;\">% (normal)</span></td>\n<td style=\"width: 122.203px;\"><span style=\"font-size: 18pt;\">&gt; 4</span></td>\n</tr>\n<tr class=\"no-padding no-margin\">\n<td style=\"width: 132.703px;\"><span style=\"font-size: 18pt;\">Pus cells</span></td>\n<td style=\"width: 65.2031px;\"><span style=\"font-size: 18pt;\">.</span></td>\n<td style=\"width: 152.203px;\"><span style=\"font-size: 18pt;\">Cells/HPF</span></td>\n<td style=\"width: 122.203px;\"><span style=\"font-size: 18pt;\">&lt; 5</span></td>\n</tr>\n</tbody>\n</table>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2021-06-19', NULL, '17:06:52', '3571', '2021-06-19', '17:07:49', NULL, NULL),
(595, '180', 'Anti-Mullerian hormone (AMH)', 'param_form', NULL, '', 'true', '<p>&gt;1.0</p>', 'true', 'ng/ml', 'adult', 'active', '3571', '2021-06-22', NULL, '08:48:01', NULL, NULL, NULL, NULL, NULL),
(596, '181', 'E2', 'param_form', NULL, '', 'true', '<p>pg/mL</p>', 'true', '25.0-175.0', 'adult', 'active', '3571', '2021-06-30', NULL, '10:11:54', NULL, NULL, NULL, NULL, NULL),
(597, '182', '', 'text_form', '<p><span style=\"font-size: 18pt;\"><strong><span style=\"text-decoration: underline;\">Vaginal wash out</span></strong></span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Appearance: </strong>Slightly turbid&nbsp;fluid inside universal bottle</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Microscopy:&nbsp;</strong>Wet preparation</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pus cell: 0-2/HPF</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Red blood cell: 0-1/HPF</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Epithelial cells: 0-2/HPF</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sperm cells: 0-2/HPF</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Others: Nil</span></p>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'HRM/ST/007', '2021-07-04', NULL, '12:34:26', 'HRM/ST/007', '2021-07-04', '12:35:12', NULL, NULL),
(598, '183', 'hsC-reactive protein (hsCRP)', 'param_form', NULL, '', 'true', '<p>mg/L</p>', 'true', '0.0-1.0', 'adult', 'active', 'HRM/ST/007', '2021-07-19', NULL, '10:44:46', NULL, NULL, NULL, NULL, NULL),
(599, '184', '', 'text_form', '<table>\n<tbody>\n<tr>\n<td>\n<p><span style=\\\"font-size: 18pt;\\\"><strong>Appearance:&nbsp;</strong>Serosanguinous fluid in universal bottle</span></p>\n</td>\n</tr>\n<tr>\n<td>\n<p><span style=\\\"font-size: 18pt;\\\"><strong>Microscopy:</strong></span></p>\n<p><span style=\\\"font-size: 18pt;\\\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Wet preparation</span></p>\n<ul>\n<li><span style=\\\"font-size: 18pt;\\\">Estimated white blood cell count &ndash; 380 x10<sup>6</sup>&nbsp;cells/L</span></li>\n</ul>\n<p><span style=\\\"font-size: 18pt;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *lymphocytes &ndash; 92%</span></p>\n<p><span style=\\\"font-size: 18pt;\\\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *polymorphonuclear cells &ndash; 8%</span></p>\n<ul>\n<li><span style=\\\"font-size: 18pt;\\\">Numerous red blood cells</span></li>\n</ul>\n</td>\n</tr>\n</tbody>\n</table>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'HRM/ST/007', '2021-07-27', NULL, '09:42:02', NULL, NULL, NULL, NULL, NULL),
(600, '185', '', 'text_form', '<p><span style=\\\"font-size: 18pt;\\\"><strong>Urethral Swab M/C/S</strong></span></p>\n<p><span style=\\\"font-size: 18pt;\\\"><strong>Appearance:&nbsp;</strong>Whitish discharge on swab stick</span></p>\n<p><span style=\\\"font-size: 18pt;\\\"><strong>Microscopy:&nbsp;</strong>&nbsp; &nbsp; &nbsp;</span></p>\n<ul>\n<li><span style=\\\"font-size: 18pt;\\\">Pus cells: 3-7/HPF</span></li>\n<li><span style=\\\"font-size: 18pt;\\\">Epithelial cells: 5-12/HPF</span></li>\n<li><span style=\\\"font-size: 18pt;\\\">Others: Nil&nbsp;</span></li>\n</ul>\n<p><span style=\\\"font-size: 18pt;\\\"><strong>Grams smear:</strong></span></p>\n<ul>\n<li><span style=\\\"font-size: 18pt;\\\">Epithelial cells seen</span></li>\n<li><span style=\\\"font-size: 18pt;\\\">Pus cells: Seen</span></li>\n<li><span style=\\\"font-size: 18pt;\\\">Gram negative intracellular diplococci not seen</span></li>\n<li><span style=\\\"font-size: 18pt;\\\">Others: Nil<strong>&nbsp;</strong></span></li>\n</ul>\n<p><span style=\\\"font-size: 18pt;\\\"><strong>Culture:</strong> Yielded no genital growth pathogen after 48 hours of aerobic incubation.</span></p>\n<p><span style=\\\"font-size: 18pt;\\\">Amikacin - Sensitive&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cefepime&nbsp; - Sensitive&nbsp;</span></p>\n<p><span style=\\\"font-size: 18pt;\\\">Ciprofloxacin&nbsp; -&nbsp; Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gentamicin&nbsp; -&nbsp; Resistant&nbsp;</span></p>\n<p><span style=\\\"font-size: 18pt;\\\">Augmentin - Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ceftazidime- Sensitive</span></p>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'HRM/ST/007', '2021-08-03', NULL, '09:54:36', NULL, NULL, NULL, NULL, NULL),
(601, '186', 'Vitamin D', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '30-100', 'adult', 'active', 'HRM/ST/007', '2021-08-04', NULL, '09:17:06', NULL, NULL, NULL, NULL, NULL),
(602, '187', 'Microalbumin (Urine)', 'param_form', NULL, '', 'true', '<p>mg/L</p>', 'true', '0-20', 'adult', 'active', 'HRM/ST/007', '2021-08-04', NULL, '09:20:16', NULL, NULL, NULL, NULL, NULL),
(603, '188', 'Vitamin D', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '30-100', 'adult', 'active', '3571', '2021-09-23', NULL, '18:29:08', '3571', '2021-09-23', '18:30:28', NULL, NULL),
(604, '189', 'NT-proBNP', 'param_form', NULL, '', 'true', '<p>pg/mL</p>', 'true', '0-300', 'adult', 'active', 'HRM/ST/007', '2021-11-07', NULL, '12:19:41', 'HRM/ST/007', '2021-11-07', '12:20:17', NULL, NULL),
(605, '61', 'Chloride', 'param_form', NULL, '', 'true', '<p><span style=\"color: #212529; font-family: Poppi', 'true', '97-107', 'adult', 'inactive', 'Bolaji', '2021-12-22', NULL, '11:07:05', NULL, NULL, NULL, NULL, NULL),
(606, '61', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97-107', 'adult', 'active', 'Bolaji', '2021-12-22', NULL, '11:07:49', 'Bolaji', '2022-04-14', '09:09:02', NULL, NULL),
(607, '61', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '20-31', 'adult', 'active', 'Bolaji', '2021-12-22', NULL, '11:08:36', 'Bolaji', '2022-04-14', '09:09:30', NULL, NULL),
(608, '61', 'Creatinine', 'param_form', NULL, '', 'true', '<p><span style=\"color: #212529; font-family: Poppi', 'true', '53-106', 'adult', 'inactive', 'Bolaji', '2021-12-22', NULL, '11:09:23', NULL, NULL, NULL, NULL, NULL),
(609, '61', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '53-106', 'adult', 'active', 'Bolaji', '2021-12-22', NULL, '11:10:03', 'Bolaji', '2022-04-14', '09:09:54', NULL, NULL),
(610, '61', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.5', 'adult', 'active', 'Bolaji', '2021-12-22', NULL, '11:10:49', 'Bolaji', '2022-04-14', '09:10:30', NULL, NULL),
(611, '190', 'Anti-HBs', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '10', 'adult', 'active', '3571', '2021-12-28', NULL, '10:06:31', '3571', '2021-12-28', '10:32:29', NULL, NULL),
(612, '191', 'FSH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '1.96-11.00', 'adult', 'active', 'Bolaji', '2022-01-08', NULL, '13:48:49', 'Bolaji', '2022-02-04', '08:25:19', NULL, NULL),
(613, '191', 'LH', 'param_form', NULL, '', 'true', '<p>mIU/mL</p>', 'true', '1.25-7.70', 'adult', 'active', 'Bolaji', '2022-01-08', NULL, '13:49:10', 'Bolaji', '2022-02-04', '08:25:33', NULL, NULL),
(614, '191', 'Prolactin', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '1.2-19.5', 'adult', 'active', 'Bolaji', '2022-01-08', NULL, '13:49:37', 'Bolaji', '2022-02-04', '09:08:41', NULL, NULL),
(615, '191', 'E2', 'param_form', NULL, '', 'true', '<p>pg/mL</p>', 'true', '44.0-196.0', 'adult', 'active', 'Bolaji', '2022-01-08', NULL, '13:50:11', 'Bolaji', '2022-02-04', '08:22:13', NULL, NULL),
(616, '191', 'Progesterone', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '3.0-30.0', 'adult', 'active', 'Bolaji', '2022-01-08', NULL, '13:50:33', NULL, NULL, NULL, NULL, NULL),
(617, '192', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.5', 'adult', 'active', 'Bolaji', '2022-01-20', NULL, '11:22:22', NULL, NULL, NULL, NULL, NULL),
(618, '191', 'Testosterone', 'param_form', NULL, '', 'true', '<p>pg/mL</p>', 'true', '0.2-0.95', 'adult', 'active', 'Bolaji', '2022-02-04', NULL, '08:22:00', NULL, NULL, NULL, NULL, NULL),
(619, '193', 'Indirect combs test', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', 'Bolaji', '2022-02-04', NULL, '09:40:58', NULL, NULL, NULL, NULL, NULL),
(620, '194', 'Free PSA', 'param_form', NULL, '', 'true', '<p>ng/mL</p>', 'true', '0.0-6.5 (>70 years)\n0.0-4.5 (60-69 years)\n0.0-3.5 (50-59 years)', 'adult', 'active', '3571', '2022-02-15', NULL, '08:32:37', NULL, NULL, NULL, NULL, NULL),
(621, '195', 'PT', 'param_form', NULL, '', 'true', '<p>Seconds</p>', 'true', '10 - 14.9', 'adult', 'active', 'HRM/ST/007', '2022-02-22', NULL, '17:23:27', '3571', '2022-04-23', '15:43:50', NULL, NULL),
(622, '195', 'INR', 'param_form', NULL, '', 'true', '<p>Seconds</p>', 'true', '0.7 - 1.3', 'adult', 'active', 'HRM/ST/007', '2022-02-22', NULL, '17:23:59', 'HRM/ST/007', '2022-02-22', '17:25:28', NULL, NULL),
(623, '196', 'APTT', 'param_form', NULL, '', 'true', '<p>Seconds</p>', 'true', '22.2 - 37.9', 'adult', 'active', 'HRM/ST/007', '2022-02-22', NULL, '17:24:54', NULL, NULL, NULL, NULL, NULL),
(624, '197', 'Magnesium (Mg)', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '0.66 - 1.07', 'adult', 'active', 'Bolaji', '2022-03-02', NULL, '09:12:20', 'Bolaji', '2022-03-02', '09:23:32', NULL, NULL),
(625, '201', 'Period of abstinence', 'param_form', NULL, '', 'true', '<p>Days</p>', 'true', '2-7', 'adult', 'active', '3571', '2022-03-17', NULL, '11:19:58', '3571', '2022-03-17', '12:35:45', NULL, NULL),
(626, '201', 'Liquefaction time', 'param_form', NULL, '', 'true', '<p>Minutes</p>', 'true', '', 'adult', 'active', '3571', '2022-03-17', NULL, '11:21:18', '3571', '2022-03-17', '11:55:05', NULL, NULL),
(627, '201', 'Completeness of sample', 'param_form', NULL, '', 'true', '<p>.</p>', 'true', '.', 'adult', 'active', '3571', '2022-03-17', NULL, '11:22:55', '3571', '2022-03-17', '12:37:16', NULL, NULL),
(628, '201', 'Ejaculate Volume', 'param_form', NULL, '', 'true', '<p>mL</p>', 'true', '> 1.5', 'adult', 'active', '3571', '2022-03-17', NULL, '11:27:59', NULL, NULL, NULL, NULL, NULL),
(629, '201', 'Appearance', 'param_form', NULL, '', 'true', '<p>.</p>', 'true', 'cream/grey-opalescent', 'adult', 'active', '3571', '2022-03-17', NULL, '11:31:41', '3571', '2022-03-17', '12:37:34', NULL, NULL),
(630, '201', 'Ejaculate viscosity', 'param_form', NULL, '', 'true', '<p>.</p>', 'true', 'Normal', 'adult', 'active', '3571', '2022-03-17', NULL, '11:32:53', '3571', '2022-03-17', '12:37:55', NULL, NULL),
(631, '201', 'Ejaculate pH', 'param_form', NULL, '', 'true', '<p>.</p>', 'true', '> 7.1', 'adult', 'active', '3571', '2022-03-17', NULL, '11:37:14', '3571', '2022-03-17', '12:38:27', NULL, NULL),
(632, '201', 'Fast progressively  motile', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '40', 'adult', 'active', '3571', '2022-03-17', NULL, '11:40:49', '3571', '2022-03-17', '11:45:32', NULL, NULL),
(633, '201', 'Slow progressively motile', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '.', 'adult', 'active', '3571', '2022-03-17', NULL, '11:42:04', '3571', '2022-03-17', '12:38:46', NULL, NULL),
(634, '201', 'Non-progressively motile', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '.', 'adult', 'active', '3571', '2022-03-17', NULL, '11:43:03', '3571', '2022-03-17', '12:38:55', NULL, NULL),
(635, '201', 'Non-motile', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '.', 'adult', 'active', '3571', '2022-03-17', NULL, '11:44:16', '3571', '2022-03-17', '12:39:08', NULL, NULL),
(636, '201', 'Sperm concentration', 'param_form', NULL, '', 'true', '<p><span style=\"color: #212529; font-family: Poppi', 'true', '>15', 'adult', 'inactive', '3571', '2022-03-17', NULL, '11:50:41', NULL, NULL, NULL, NULL, NULL),
(637, '201', 'Sperm concentration', 'param_form', NULL, '', 'true', '<p>x 10<sup>6 </sup>per mL</p>', 'true', '>15.0', 'adult', 'active', '3571', '2022-03-17', NULL, '11:51:53', '3571', '2022-03-17', '12:01:22', NULL, NULL),
(638, '201', 'No. of spermatozoa per ejaculate', 'param_form', NULL, '', 'true', '<p>10<sup>6</sup> per ejaculate</p>', 'true', '> 35', 'adult', 'active', '3571', '2022-03-17', NULL, '12:04:19', '3571', '2022-03-17', '12:49:03', NULL, NULL),
(639, '201', 'Morphology', 'param_form', NULL, '', 'true', '<p>% (Normal)</p>', 'true', '> 4', 'adult', 'active', '3571', '2022-03-17', NULL, '12:06:38', NULL, NULL, NULL, NULL, NULL),
(640, '201', 'Pus cells', 'param_form', NULL, '', 'true', '<p>/HPF</p>', 'true', '>5', 'infant', 'active', '3571', '2022-03-17', NULL, '12:42:32', NULL, NULL, NULL, NULL, NULL),
(641, '201', 'Sperm agglutination', 'param_form', NULL, '', 'true', '<p>.</p>', 'true', '.', 'adult', 'active', '3571', '2022-03-17', NULL, '12:55:49', NULL, NULL, NULL, NULL, NULL),
(642, '201', 'Sperm aggregates', 'param_form', NULL, '', 'true', '<p>.</p>', 'true', '.', 'adult', 'active', '3571', '2022-03-17', NULL, '12:57:19', NULL, NULL, NULL, NULL, NULL),
(643, '199', 'Semen zinc', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '>1.5', 'adult', 'active', '3571', '2022-03-17', NULL, '13:02:23', NULL, NULL, NULL, NULL, NULL),
(644, '199', 'Total zinc content', 'param_form', NULL, '', 'true', '<p>&micro;mol/ejaculate</p>', 'true', '> 2.4', 'adult', 'active', '3571', '2022-03-17', NULL, '13:05:20', NULL, NULL, NULL, NULL, NULL),
(645, '198', 'Serum Zn', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '11.1 - 19.5', 'adult', 'active', '3571', '2022-03-18', NULL, '13:00:36', NULL, NULL, NULL, NULL, NULL),
(646, '202', '', 'text_form', '<p><span style=\\\"font-size: 18pt;\\\"><strong>Culture:</strong>&nbsp;Yielded profuse growth of&nbsp;<em> Escherichia coli</em></span></p>\n<p><span style=\\\"font-size: 18pt;\\\">Amikacin - Sensitive&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cefepime&nbsp; - Sensitive&nbsp;</span></p>\n<p><span style=\\\"font-size: 18pt;\\\">Ciprofloxacin&nbsp; -&nbsp; Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gentamicin&nbsp; -&nbsp; Resistant&nbsp;</span></p>\n<p><span style=\\\"font-size: 18pt;\\\">Augmentin - Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ceftazidime- Sensitive</span></p>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2022-03-20', NULL, '13:39:54', NULL, NULL, NULL, NULL, NULL),
(647, '200', 'CA-125', 'param_form', NULL, '', 'true', '<p>U/mL</p>', 'true', '0.0 - 35.0', 'adult', 'active', '3571', '2022-03-21', NULL, '07:40:39', NULL, NULL, NULL, NULL, NULL),
(648, '203', '', 'text_form', '<p>ee</p>', '', NULL, NULL, NULL, NULL, NULL, 'inactive', 'HRM/ST/007', '2022-03-23', NULL, '18:50:12', NULL, NULL, NULL, NULL, NULL),
(649, '204', '', 'text_form', '<p>,,,</p>', '', NULL, NULL, NULL, NULL, NULL, 'inactive', 'HRM/ST/007', '2022-03-23', NULL, '19:30:36', NULL, NULL, NULL, NULL, NULL),
(650, '205', '', 'text_form', '<p>done</p>', '', NULL, NULL, NULL, NULL, NULL, 'inactive', 'Bolaji', '2022-03-25', NULL, '18:38:56', NULL, NULL, NULL, NULL, NULL),
(651, '203', 'Antinuclear Factor Screen', 'param_form', NULL, '', 'true', '<p>.</p>', 'true', '1:80 or less', 'adult', 'active', 'HRM/ST/007', '2022-03-30', NULL, '10:59:59', '3571', '2022-03-30', '18:50:32', NULL, NULL),
(652, '203', 'Antinuclear Factor ANA (IFA)', 'param_form', NULL, '', 'true', '<p>Titre</p>', 'true', '1:80 or less', 'adult', 'active', 'HRM/ST/007', '2022-03-30', NULL, '11:00:51', '3571', '2022-03-30', '18:56:37', NULL, NULL),
(653, '203', '.', 'param_form', NULL, '', 'true', '<p>.</p>', 'true', '.', 'adult', 'active', 'HRM/ST/007', '2022-03-30', NULL, '11:01:27', 'HRM/ST/007', '2022-03-30', '11:02:08', NULL, NULL),
(654, '203', '-', 'param_form', NULL, '', 'true', '<p>-</p>', 'true', '-', 'adult', 'active', 'HRM/ST/007', '2022-03-30', NULL, '11:02:40', NULL, NULL, NULL, NULL, NULL),
(655, '205', 'CA 19-9', 'param_form', NULL, '', 'true', '<p>U/mL</p>', 'true', '0-35', 'adult', 'active', 'HRM/ST/007', '2022-03-30', NULL, '11:04:13', NULL, NULL, NULL, NULL, NULL),
(656, '206', 'CA 15-3', 'param_form', NULL, '', 'true', '<p>U/mL</p>', 'true', '0-35', 'adult', 'active', 'HRM/ST/007', '2022-04-07', NULL, '11:38:56', 'HRM/ST/007', '2022-04-13', '10:11:19', NULL, NULL),
(657, '71', '', 'text_form', '<p><span style=\"font-size: 18pt;\"><strong>Appearance:&nbsp;</strong></span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Microscopy: </strong>Gram stain</span></p>\n<p><span style=\"font-size: 18pt;\">.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Pus cells</span></p>\n<p><span style=\"font-size: 18pt;\">&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Epithelial cells</span></p>\n<p><span style=\"font-size: 18pt;\">.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Organisms</span></p>\n<p><span style=\"font-size: 18pt;\"><strong>Culture:</strong>&nbsp;Yielded profuse growth of&nbsp;<em> Escherichia coli</em></span></p>\n<p><span style=\"font-size: 18pt;\">Amikacin - Sensitive&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Cefepime&nbsp; - Sensitive&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Ciprofloxacin&nbsp; -&nbsp; Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gentamicin&nbsp; -&nbsp; Resistant&nbsp;</span></p>\n<p><span style=\"font-size: 18pt;\">Augmentin - Resistant&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ceftazidime- Sensitive</span></p>\n<p>&nbsp;</p>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2022-04-07', NULL, '18:40:28', '3571', '2022-04-07', '18:40:47', NULL, NULL),
(658, '60', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '20-31', 'youth', 'active', 'HRM/ST/007', '2022-04-09', NULL, '17:10:09', 'Bolaji', '2022-04-14', '09:04:55', NULL, NULL),
(659, '60', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97-107', 'youth', 'active', 'HRM/ST/007', '2022-04-09', NULL, '17:10:47', 'Bolaji', '2022-04-14', '09:04:29', NULL, NULL),
(660, '60', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '17.7-70.7', 'adult', 'active', 'HRM/ST/007', '2022-04-09', NULL, '17:11:46', 'Bolaji', '2022-04-14', '09:05:19', NULL, NULL),
(661, '60', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.0-6.5', 'youth', 'active', 'HRM/ST/007', '2022-04-09', NULL, '17:12:16', 'Bolaji', '2022-04-14', '09:05:42', NULL, NULL),
(662, '207', 'Potassium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '3.0 - 5.0', 'youth', 'active', 'Bolaji', '2022-04-14', NULL, '09:03:11', NULL, NULL, NULL, NULL, NULL),
(663, '207', 'Sodium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '135 - 155', 'youth', 'active', 'Bolaji', '2022-04-14', NULL, '09:03:51', NULL, NULL, NULL, NULL, NULL),
(664, '207', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97-107', 'youth', 'active', 'Bolaji', '2022-04-14', NULL, '09:04:26', NULL, NULL, NULL, NULL, NULL),
(665, '207', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '20-31', 'youth', 'active', 'Bolaji', '2022-04-14', NULL, '09:04:51', NULL, NULL, NULL, NULL, NULL),
(666, '207', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '17.7-70.7', 'youth', 'active', 'Bolaji', '2022-04-14', NULL, '09:05:16', NULL, NULL, NULL, NULL, NULL),
(667, '207', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.0-6.5', 'youth', 'active', 'Bolaji', '2022-04-14', NULL, '09:05:44', NULL, NULL, NULL, NULL, NULL),
(668, '208', 'Potassium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '3.0 - 5.0', 'adult', 'active', 'Bolaji', '2022-04-14', NULL, '09:08:00', NULL, NULL, NULL, NULL, NULL),
(669, '208', 'Sodium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '135 - 155', 'adult', 'active', 'Bolaji', '2022-04-14', NULL, '09:08:26', NULL, NULL, NULL, NULL, NULL),
(670, '208', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97-107', 'adult', 'active', 'Bolaji', '2022-04-14', NULL, '09:08:59', NULL, NULL, NULL, NULL, NULL),
(671, '208', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '20-31', 'adult', 'active', 'Bolaji', '2022-04-14', NULL, '09:09:28', NULL, NULL, NULL, NULL, NULL),
(672, '208', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '53-106', 'adult', 'active', 'Bolaji', '2022-04-14', NULL, '09:09:49', NULL, NULL, NULL, NULL, NULL),
(673, '208', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.5', 'adult', 'active', 'Bolaji', '2022-04-14', NULL, '09:10:14', NULL, NULL, NULL, NULL, NULL),
(674, '209', 'Direct Comb&#39;s Test', 'param_form', NULL, '', 'true', '<p>.</p>', 'true', '.', 'adult', 'active', '3571', '2022-04-20', NULL, '16:51:06', NULL, NULL, NULL, NULL, NULL),
(675, '204', 'Haemoglobin A', 'param_form', NULL, '', 'false', '', 'true', '96.8 - 97.8', 'adult', 'active', '3571', '2022-05-14', NULL, '18:32:24', NULL, NULL, NULL, NULL, NULL),
(676, '204', 'Haemoglobin A2', 'param_form', NULL, '', 'false', '', 'true', '2.2 - 3.2', 'adult', 'active', '3571', '2022-05-14', NULL, '18:33:16', '3571', '2022-05-14', '18:34:04', NULL, NULL),
(677, '204', 'Haemoglobin F', 'param_form', NULL, '', 'false', '', 'true', '0.0 - 0.5', 'adult', 'active', '3571', '2022-05-14', NULL, '18:34:29', NULL, NULL, NULL, NULL, NULL),
(678, '204', 'Haemoglobin S', 'param_form', NULL, '', 'false', '', 'true', '0.0 - 0.5', 'adult', 'active', '3571', '2022-05-14', NULL, '18:35:13', NULL, NULL, NULL, NULL, NULL),
(679, '210', 'B-HCG', 'param_form', NULL, '', 'true', '<p>IU/ml</p>', 'true', '', 'adult', 'active', 'HRM/ST/007', '2022-05-24', NULL, '18:58:51', NULL, NULL, NULL, NULL, NULL),
(680, '211', 'Calcium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.2-2.7', 'adult', 'active', 'Bolaji', '2022-06-03', NULL, '16:39:37', NULL, NULL, NULL, NULL, NULL),
(681, '211', 'Phosphate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '0.6-1.45', 'adult', 'active', 'Bolaji', '2022-06-03', NULL, '16:40:14', NULL, NULL, NULL, NULL, NULL),
(682, '212', 'y-Glutamyl Transferase', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', '0-47', 'adult', 'active', '3571', '2022-06-29', NULL, '10:39:56', NULL, NULL, NULL, NULL, NULL),
(683, '213', 'Total Bilirubin', 'param_form', NULL, '', 'true', '<p><span style=\"color: #212529; font-family: Poppi', 'true', 'up to 1.2', 'youth', 'active', '3571', '2022-06-29', NULL, '10:46:01', NULL, NULL, NULL, NULL, NULL),
(684, '214', 'Total Bilirubin', 'param_form', NULL, '', 'true', '<p>mg/dl</p>', 'true', 'up to 1.2', 'adult', 'active', '3571', '2022-06-29', NULL, '11:02:00', NULL, NULL, NULL, NULL, NULL),
(685, '214', 'Direct Bilirubin', 'param_form', NULL, '', 'true', '<p>mg/dl</p>', 'true', 'up to 0.4', 'adult', 'active', '3571', '2022-06-29', NULL, '11:04:04', NULL, NULL, NULL, NULL, NULL),
(686, '214', 'ALT', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', 'up to 49', 'adult', 'active', '3571', '2022-06-29', NULL, '11:04:46', NULL, NULL, NULL, NULL, NULL),
(687, '214', 'AST', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', 'up to 46', 'adult', 'active', '3571', '2022-06-29', NULL, '11:05:03', NULL, NULL, NULL, NULL, NULL),
(688, '214', 'GGT', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', 'up to 47', 'adult', 'active', '3571', '2022-06-29', NULL, '11:05:26', NULL, NULL, NULL, NULL, NULL),
(689, '214', 'ALP', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', '64-306', 'adult', 'active', '3571', '2022-06-29', NULL, '11:06:20', NULL, NULL, NULL, NULL, NULL),
(690, '214', 'Total protein', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '62-80', 'adult', 'active', '3571', '2022-06-29', NULL, '11:08:03', NULL, NULL, NULL, NULL, NULL),
(691, '214', 'Albumin', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '35-50', 'adult', 'active', '3571', '2022-06-29', NULL, '11:08:25', NULL, NULL, NULL, NULL, NULL),
(692, '217', 'Total Bilirubin', 'param_form', NULL, '', 'true', '<p>mg/dl</p>', 'true', 'up to 1.2', 'adult', 'active', '3571', '2022-07-04', NULL, '13:06:04', NULL, NULL, NULL, NULL, NULL),
(693, '217', 'Direct Bilirubin', 'param_form', NULL, '', 'true', '<p>mg/dl</p>', 'true', 'up to 0.4', 'infant', 'active', '3571', '2022-07-04', NULL, '13:06:58', NULL, NULL, NULL, NULL, NULL),
(694, '217', 'ALT', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', 'up to 49', 'infant', 'active', '3571', '2022-07-04', NULL, '13:07:32', NULL, NULL, NULL, NULL, NULL),
(695, '217', 'AST', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', 'up to 46', 'infant', 'active', '3571', '2022-07-04', NULL, '13:07:52', NULL, NULL, NULL, NULL, NULL),
(696, '217', 'GGT', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', 'up to 47', 'infant', 'active', '3571', '2022-07-04', NULL, '13:08:16', NULL, NULL, NULL, NULL, NULL),
(697, '217', 'ALP', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', '80-1200', 'infant', 'active', '3571', '2022-07-04', NULL, '13:10:00', NULL, NULL, NULL, NULL, NULL),
(698, '217', 'Total protein', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '62-80', 'youth', 'active', '3571', '2022-07-04', NULL, '13:10:47', NULL, NULL, NULL, NULL, NULL),
(699, '217', 'Albumin', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '32-50', 'infant', 'active', '3571', '2022-07-04', NULL, '13:11:15', NULL, NULL, NULL, NULL, NULL),
(700, '216', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&mu;mol/L</p>', 'true', '53-106', 'adult', 'active', '3571', '2022-07-04', NULL, '13:13:25', NULL, NULL, NULL, NULL, NULL),
(701, '218', 'FBS', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.0', 'adult', 'active', '3571', '2022-07-07', NULL, '11:27:08', NULL, NULL, NULL, NULL, NULL),
(702, '218', 'GGT', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '&#60;7.8', 'adult', 'active', '3571', '2022-07-07', NULL, '11:29:34', NULL, NULL, NULL, NULL, NULL),
(703, '219', 'PCV', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '36-48', 'adult', 'active', '3571', '2022-07-07', NULL, '11:36:36', NULL, NULL, NULL, NULL, NULL),
(704, '219', 'Haemoglobin', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '110-150', 'adult', 'active', '3571', '2022-07-07', NULL, '11:39:15', NULL, NULL, NULL, NULL, NULL),
(705, '220', 'PCV', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '40-55', 'adult', 'active', '3571', '2022-07-07', NULL, '12:04:28', NULL, NULL, NULL, NULL, NULL),
(706, '220', 'Haemoglobin', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '120-165', 'adult', 'active', '3571', '2022-07-07', NULL, '12:05:25', NULL, NULL, NULL, NULL, NULL),
(707, '221', 'PCV', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '35.0-49.0', 'youth', 'active', '3571', '2022-07-07', NULL, '12:16:14', NULL, NULL, NULL, NULL, NULL),
(708, '221', 'Haemoglobin', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '110-150', 'youth', 'active', '3571', '2022-07-07', NULL, '12:16:33', NULL, NULL, NULL, NULL, NULL),
(709, '222', 'PCV', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '38-68', 'infant', 'active', '3571', '2022-07-07', NULL, '12:29:11', NULL, NULL, NULL, NULL, NULL),
(710, '222', 'Haemoglobin', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '170-220', 'infant', 'active', '3571', '2022-07-07', NULL, '12:30:29', NULL, NULL, NULL, NULL, NULL),
(711, '8', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '96-106', 'adult', 'active', 's6068', '2024-12-14', NULL, '15:50:06', NULL, NULL, NULL, NULL, NULL),
(712, '213', 'SGOT/AST', 'param_form', NULL, '', 'true', '<p>U/L</p>', 'true', 'Up to 46U/L', 'adult', 'active', 'taimobola', '2025-01-13', NULL, '13:57:26', NULL, NULL, NULL, NULL, NULL),
(713, '1', '', 'text_form', '<div class=\"quill-better-table-wrapper\">\n<p>CROSS MATCH (EMERGENCY)</p>\n<table class=\"quill-better-table\" style=\"height: 92px;\" width=\"417\"><colgroup><col width=\"100\" /><col width=\"100\" /><col width=\"100\" /><col width=\"100\" /></colgroup>\n<tbody>\n<tr data-row=\"row-e8aj\">\n<td colspan=\"1\" rowspan=\"1\" data-row=\"row-e8aj\">\n<p class=\"qlbt-cell-line\" data-row=\"row-e8aj\" data-cell=\"cell-ox9t\" data-rowspan=\"1\" data-colspan=\"1\">Patient blood group</p>\n</td>\n<td colspan=\"1\" rowspan=\"1\" data-row=\"row-e8aj\">\n<p class=\"qlbt-cell-line\" data-row=\"row-e8aj\" data-cell=\"cell-xuah\" data-rowspan=\"1\" data-colspan=\"1\">Donor Blood group</p>\n</td>\n<td colspan=\"1\" rowspan=\"1\" data-row=\"row-e8aj\">\n<p class=\"qlbt-cell-line\" data-row=\"row-e8aj\" data-cell=\"cell-rekm\" data-rowspan=\"1\" data-colspan=\"1\">Crossmatch</p>\n</td>\n<td colspan=\"1\" rowspan=\"1\" data-row=\"row-e8aj\">\n<p class=\"qlbt-cell-line\" data-row=\"row-e8aj\" data-cell=\"cell-szyz\" data-rowspan=\"1\" data-colspan=\"1\">Result</p>\n</td>\n</tr>\n<tr data-row=\"row-ba1c\">\n<td colspan=\"1\" rowspan=\"1\" data-row=\"row-ba1c\">\n<p class=\"qlbt-cell-line\" data-row=\"row-ba1c\" data-cell=\"cell-wvnt\" data-rowspan=\"1\" data-colspan=\"1\">&nbsp;</p>\n<p class=\"qlbt-cell-line\" data-row=\"row-ba1c\" data-cell=\"cell-wvnt\" data-rowspan=\"1\" data-colspan=\"1\">&nbsp;</p>\n</td>\n<td colspan=\"1\" rowspan=\"1\" data-row=\"row-ba1c\">\n<p class=\"qlbt-cell-line\" data-row=\"row-ba1c\" data-cell=\"cell-s397\" data-rowspan=\"1\" data-colspan=\"1\">&nbsp;</p>\n</td>\n<td colspan=\"1\" rowspan=\"1\" data-row=\"row-ba1c\">\n<p class=\"qlbt-cell-line\" data-row=\"row-ba1c\" data-cell=\"cell-6bie\" data-rowspan=\"1\" data-colspan=\"1\">&nbsp;</p>\n</td>\n<td colspan=\"1\" rowspan=\"1\" data-row=\"row-ba1c\">\n<p class=\"qlbt-cell-line\" data-row=\"row-ba1c\" data-cell=\"cell-xaha\" data-rowspan=\"1\" data-colspan=\"1\">Compatible</p>\n</td>\n</tr>\n</tbody>\n</table>\n</div>\n<p>NB:</p>\n<p>E= Emergency</p>\n<p>R= Routine</p>', '', NULL, NULL, NULL, NULL, NULL, 'inactive', 'S6068', '2025-02-20', NULL, '15:05:29', 'desmondjohn', '2026-02-09', '13:45:09', NULL, NULL),
(714, '235', '', 'text_form', '<table class=\\\"table table-nogap table-hover \\\">\n<thead>\n<tr class=\\\"text-capitalize bold  table-info \\\">\n<td>SN</td>\n<td>name</td>\n<td>unit</td>\n<td>ref. value</td>\n<td>Edit</td>\n<td>Status<br /><small>Active / Not Active</small></td>\n</tr>\n</thead>\n<tbody class=\\\"_sortable\\\">\n<tr class=\\\"\\\">\n<td>1</td>\n<td>Sodium</td>\n<td>\n<p>mmol/L</p>\n</td>\n<td>135-155&nbsp;&nbsp;<small>(adult)</small></td>\n<td><a class=\\\"mdi mdi-lead-pencil mdi-24px text-primary\\\" style=\\\"box-sizing: border-box; color: #2196f3 !important; text-decoration: none; background-color: transparent; text-shadow: none; box-shadow: none;\\\" data-text=\\\"adult|Sodium	|&lt;p&gt;mmol/L&lt;/p&gt;|135-155|132|401\\\">&nbsp;Edit</a>&nbsp;&nbsp; &nbsp; &nbsp;</td>\n<td><a class=\\\"pointer mdi mdi-bookmark-check mdi-36px text-success\\\" data-text=\\\"Sodium	|ELECTROLYTE, CREATININE &amp; UREA (EUCR)|132|401\\\">Active</a></td>\n</tr>\n<tr class=\\\"\\\">\n<td>2</td>\n<td>Potassium</td>\n<td>\n<p>mmol/L</p>\n</td>\n<td>3.0-5.0&nbsp;&nbsp;<small>(adult)</small></td>\n<td><a class=\\\"mdi mdi-lead-pencil mdi-24px text-primary\\\" style=\\\"box-sizing: border-box; color: #2196f3 !important; text-decoration: none; background-color: transparent; text-shadow: none; box-shadow: none;\\\" data-text=\\\"adult|Potassium	|&lt;p&gt;mmol/L&lt;/p&gt;|3.0-5.0|132|402\\\">&nbsp;Edit</a>&nbsp;&nbsp; &nbsp; &nbsp;</td>\n<td><a class=\\\"pointer mdi mdi-bookmark-check mdi-36px text-success\\\" data-text=\\\"Potassium	|ELECTROLYTE, CREATININE &amp; UREA (EUCR)|132|402\\\">Active</a></td>\n</tr>\n<tr class=\\\"\\\">\n<td>3</td>\n<td>Creatinine</td>\n<td>\n<p>&micro;mol/L</p>\n</td>\n<td>53-106&nbsp;&nbsp;<small>(adult)</small></td>\n<td><a class=\\\"mdi mdi-lead-pencil mdi-24px text-primary\\\" style=\\\"box-sizing: border-box; color: #2196f3 !important; text-decoration: none; background-color: transparent; text-shadow: none; box-shadow: none;\\\" data-text=\\\"adult|Creatinine|&lt;p&gt;&micro;mol/L&lt;/p&gt;|53-106|132|403\\\">&nbsp;Edit</a>&nbsp;&nbsp; &nbsp; &nbsp;</td>\n<td><a class=\\\"pointer mdi mdi-bookmark-check mdi-36px text-success\\\" data-text=\\\"Creatinine|ELECTROLYTE, CREATININE &amp; UREA (EUCR)|132|403\\\">Active</a></td>\n</tr>\n<tr class=\\\"\\\">\n<td>4</td>\n<td>Urea</td>\n<td>\n<p>mmol/L</p>\n</td>\n<td>2.5-6.5&nbsp;&nbsp;<small>(adult)</small></td>\n<td><a class=\\\"mdi mdi-lead-pencil mdi-24px text-primary\\\" style=\\\"box-sizing: border-box; color: #2196f3 !important; text-decoration: none; background-color: transparent; text-shadow: none; box-shadow: none;\\\" data-text=\\\"adult|Urea|&lt;p&gt;mmol/L&lt;/p&gt;|2.5-6.5|132|404\\\">&nbsp;Edit</a>&nbsp;&nbsp; &nbsp; &nbsp;</td>\n<td><a class=\\\"pointer mdi mdi-bookmark-check mdi-36px text-success\\\" data-text=\\\"Urea|ELECTROLYTE, CREATININE &amp; UREA (EUCR)|132|404\\\">Active</a></td>\n</tr>\n<tr class=\\\"\\\">\n<td>5</td>\n<td>Bicarbonate</td>\n<td>\n<p>mmol/L</p>\n</td>\n<td>20-31&nbsp;&nbsp;<small>(adult)</small></td>\n<td><a class=\\\"mdi mdi-lead-pencil mdi-24px text-primary\\\" style=\\\"box-sizing: border-box; color: #2196f3 !important; text-decoration: none; background-color: transparent; text-shadow: none; box-shadow: none;\\\" data-text=\\\"adult|Bicarbonate|&lt;p&gt;mmol/L&lt;/p&gt;|20-31|132|491\\\">&nbsp;Edit</a>&nbsp;&nbsp; &nbsp; &nbsp;</td>\n<td><a class=\\\"pointer mdi mdi-bookmark-remove mdi-36px text-danger\\\" data-text=\\\"Bicarbonate|ELECTROLYTE, CREATININE &amp; UREA (EUCR)|132|491\\\">Not Active</a></td>\n</tr>\n<tr class=\\\"\\\">\n<td>6</td>\n<td>Chloride</td>\n<td>\n<p>mmol/L</p>\n</td>\n<td>97-107&nbsp;&nbsp;<small>(adult)</small></td>\n<td><a class=\\\"mdi mdi-lead-pencil mdi-24px text-primary\\\" style=\\\"box-sizing: border-box; color: #2196f3 !important; text-decoration: none; background-color: transparent; text-shadow: none; box-shadow: none;\\\" data-text=\\\"adult|Chloride|&lt;p&gt;mmol/L&lt;/p&gt;|97-107|132|492\\\">&nbsp;Edit</a>&nbsp;&nbsp; &nbsp; &nbsp;</td>\n<td><a class=\\\"pointer mdi mdi-bookmark-check mdi-36px text-success\\\" data-text=\\\"Chloride|ELECTROLYTE, CREATININE &amp; UREA (EUCR)|132|492\\\">Active</a></td>\n</tr>\n<tr class=\\\"\\\">\n<td>7</td>\n<td>Creatinine</td>\n<td>\n<p><span data-text=\\\"&quot;adult|Creatinine|&lt;p\\\"><span class=\\\"mdi mdi-lead-pencil mdi-24px text-primary\\\" style=\\\"color: =;\\\">&nbsp;Edit &nbsp; &nbsp; &nbsp;</span></span></p>\n</td>\n<td><a class=\\\"pointer mdi mdi-bookmark-remove mdi-36px text-danger\\\" data-text=\\\"Creatinine|ELECTROLYTE, CREATININE &amp; UREA (EUCR)|132|493\\\">Not Active</a></td>\n</tr>\n<tr class=\\\"\\\">\n<td>8</td>\n<td>Creatinine</td>\n<td>\n<p>&micro;mol/L</p>\n</td>\n<td>17.7-70.7&nbsp;&nbsp;<small>(adult)</small></td>\n<td><a class=\\\"mdi mdi-lead-pencil mdi-24px text-primary\\\" style=\\\"box-sizing: border-box; color: #2196f3 !important; text-decoration: none; background-color: transparent; text-shadow: none; box-shadow: none;\\\" data-text=\\\"adult|Creatinine|&lt;p&gt;&micro;mol/L&lt;/p&gt;|17.7-70.7|132|494\\\">&nbsp;Edit</a>&nbsp;&nbsp; &nbsp; &nbsp;</td>\n<td><a class=\\\"pointer mdi mdi-bookmark-remove mdi-36px text-danger\\\" data-text=\\\"Creatinine|ELECTROLYTE, CREATININE &amp; UREA (EUCR)|132|494\\\">Not Active</a></td>\n</tr>\n<tr class=\\\"\\\">\n<td>9</td>\n<td>Urea</td>\n<td>\n<p>mmol/L</p>\n</td>\n<td>2.0-6.5&nbsp;&nbsp;<small>(adult)</small></td>\n<td><a class=\\\"mdi mdi-lead-pencil mdi-24px text-primary\\\" style=\\\"box-sizing: border-box; color: #2196f3 !important; text-decoration: none; background-color: transparent; text-shadow: none; box-shadow: none;\\\" data-text=\\\"adult|Urea|&lt;p&gt;mmol/L&lt;/p&gt;|2.0-6.5|132|495\\\">&nbsp;Edit</a>&nbsp;&nbsp; &nbsp; &nbsp;</td>\n<td><a class=\\\"pointer mdi mdi-bookmark-remove mdi-36px text-danger\\\" data-text=\\\"Urea|ELECTROLYTE, CREATININE &amp; UREA (EUCR)|132|495\\\">Not Active</a></td>\n</tr>\n</tbody>\n</table>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'S6068', '2025-02-21', NULL, '13:08:24', NULL, NULL, NULL, NULL, NULL),
(715, '223', '', 'text_form', '<p><strong>Patient Blood Group:</strong></p>\n<p><strong>Donor Blood Group:</strong></p>\n<p><strong>Crossmatch:</strong></p>\n<p><strong>Result: Compatible</strong></p>\n<p>&nbsp;</p>\n<p><strong>NB:</strong></p>\n<p><strong>E= Emergency</strong></p>\n<p><strong>R= Routine</strong></p>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'desmondjohn', '2026-02-09', NULL, '14:27:48', 'desmondjohn', '2026-02-09', '14:36:36', NULL, NULL),
(716, '1', '', 'text_form', '<p><strong>Patient Blood Group:</strong></p>\n<p><strong>Donor Blood Group:</strong></p>\n<p><strong>Crossmatch:</strong></p>\n<p><strong>Result: Compatible</strong></p>\n<p>&nbsp;</p>\n<p><strong>NB:</strong></p>\n<p><strong>E= Emergency</strong></p>\n<p><strong>R= Routine</strong></p>', '', NULL, NULL, NULL, NULL, NULL, 'active', 'desmondjohn', '2026-02-09', NULL, '14:38:06', NULL, NULL, NULL, NULL, NULL),
(717, '237', 'Blood Group', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', 'desmondjohn', '2026-02-09', NULL, '18:07:10', 'desmondjohn', '2026-02-09', '18:07:56', NULL, NULL),
(718, '224', 'HIV', 'param_form', NULL, '', 'false', '', 'false', '', 'adult', 'active', 'desmondjohn', '2026-02-10', NULL, '14:54:47', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_allowance`
--

CREATE TABLE `staff_allowance` (
  `sn` int(10) NOT NULL,
  `ref_id` int(10) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `amount` double(16,0) DEFAULT NULL,
  `checked` enum('yes','no') DEFAULT 'yes',
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(100) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `upd_by` varchar(100) DEFAULT NULL,
  `date_upd` date DEFAULT NULL,
  `time_upd` time DEFAULT NULL,
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` date DEFAULT NULL,
  `time_del` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_allowance`
--

INSERT INTO `staff_allowance` (`sn`, `ref_id`, `user_id`, `amount`, `checked`, `status`, `c_by`, `date_c`, `time_c`, `upd_by`, `date_upd`, `time_upd`, `del_by`, `date_del`, `time_del`) VALUES
(1, 1, 's6068', 0, 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(2, 2, 's6068', 0, 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(3, 3, 's6068', 0, 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(4, 4, 's6068', 0, 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', 's6068', '2020-03-18', '10:12:36'),
(5, 1, 'yekeen', 3000, 'yes', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '10:21:27', '', '0000-00-00', '00:00:00'),
(6, 2, 'yekeen', 0, 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', 's6068', '2020-03-17', '12:02:25'),
(7, 3, 'yekeen', 0, 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', 's6068', '2020-03-17', '12:02:16'),
(8, 4, 'yekeen', 0, 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', 's6068', '2020-03-17', '12:02:03'),
(9, 4, 'bayo', 0, 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', 's6068', '2020-03-18', '10:10:45'),
(10, 1, 'HRM/STAFF/0001', 0, 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', 's6068', '2020-03-18', '10:10:37'),
(11, 3, 'HRM/STAFF/0001', 0, 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', 's6068', '2020-03-18', '10:10:57'),
(12, 1, 's6068', 0, 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', 's6068', '2020-03-18', '10:12:46'),
(13, 4, '3571', 1000, 'yes', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '10:21:58', '', '0000-00-00', '00:00:00'),
(14, 1, 's6068', 5000, 'yes', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '10:20:26', '', '0000-00-00', '00:00:00'),
(15, 4, 's6068', 2000, 'yes', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '10:20:26', '', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_allowance_payment`
--

CREATE TABLE `staff_allowance_payment` (
  `sn` int(10) NOT NULL,
  `ref_id` int(10) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `amount` double(16,0) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `date_paid` date DEFAULT NULL,
  `time_paid` time DEFAULT NULL,
  `c_by` varchar(100) DEFAULT NULL,
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` date DEFAULT NULL,
  `time_del` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `staff_allowance_payment`
--

INSERT INTO `staff_allowance_payment` (`sn`, `ref_id`, `user_id`, `amount`, `year`, `month`, `status`, `date_paid`, `time_paid`, `c_by`, `del_by`, `date_del`, `time_del`) VALUES
(1, 1, 's6068', 5000, 2019, 3, 'active', '2020-11-25', '18:17:15', '3571', NULL, NULL, NULL),
(2, 4, 's6068', 2000, 2019, 3, 'active', '2020-11-25', '18:17:15', '3571', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_deductions`
--

CREATE TABLE `staff_deductions` (
  `sn` int(10) NOT NULL,
  `ref_id` int(10) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `amount` double(16,0) DEFAULT NULL,
  `deduct_mode` enum('amount','percent') DEFAULT 'amount',
  `percent_rate` varchar(8) DEFAULT NULL,
  `checked` enum('yes','no') DEFAULT 'yes',
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(100) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `upd_by` varchar(100) DEFAULT NULL,
  `date_upd` date DEFAULT NULL,
  `time_upd` time DEFAULT NULL,
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` date DEFAULT NULL,
  `time_del` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_deductions`
--

INSERT INTO `staff_deductions` (`sn`, `ref_id`, `user_id`, `amount`, `deduct_mode`, `percent_rate`, `checked`, `status`, `c_by`, `date_c`, `time_c`, `upd_by`, `date_upd`, `time_upd`, `del_by`, `date_del`, `time_del`) VALUES
(1, 1, 'HRM/STAFF/0001', 1125, 'percent', '7.5', 'yes', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '10:19:06', '', '0000-00-00', '00:00:00'),
(2, 1, 's6068', 3000, 'percent', '7.5', 'yes', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '10:20:26', '', '0000-00-00', '00:00:00'),
(3, 3, 's6068', 0, 'percent', '6', 'yes', 'inactive', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00', 's6068', '2020-03-17', '13:35:21'),
(4, 1, 'yekeen', 2625, 'percent', '7.5', 'yes', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '10:21:27', '', '0000-00-00', '00:00:00'),
(5, 3, 's6068', 2400, 'percent', '6', 'yes', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '10:20:26', '', '0000-00-00', '00:00:00'),
(6, 4, 'yekeen', 1000, 'amount', '0', 'yes', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '10:21:27', '', '0000-00-00', '00:00:00'),
(7, 1, 'bayo', 1125, 'percent', '7.5', 'yes', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '10:19:25', '', '0000-00-00', '00:00:00'),
(8, 1, '3571', 1500, 'percent', '7.5', 'yes', 'active', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '10:21:58', '', '0000-00-00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `staff_deductions_payment`
--

CREATE TABLE `staff_deductions_payment` (
  `sn` int(10) NOT NULL,
  `ref_id` int(10) DEFAULT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `amount` double(16,0) DEFAULT NULL,
  `deduct_mode` enum('amount','percent') DEFAULT 'amount',
  `percent_rate` varchar(8) DEFAULT NULL,
  `checked` enum('yes','no') DEFAULT 'yes',
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(100) DEFAULT NULL,
  `date_paid` date DEFAULT NULL,
  `time_paid` time DEFAULT NULL,
  `upd_by` varchar(100) DEFAULT NULL,
  `date_upd` date DEFAULT NULL,
  `time_upd` time DEFAULT NULL,
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` date DEFAULT NULL,
  `time_del` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_deductions_payment`
--

INSERT INTO `staff_deductions_payment` (`sn`, `ref_id`, `user_id`, `year`, `month`, `amount`, `deduct_mode`, `percent_rate`, `checked`, `status`, `c_by`, `date_paid`, `time_paid`, `upd_by`, `date_upd`, `time_upd`, `del_by`, `date_del`, `time_del`) VALUES
(1, 1, 'HRM/STAFF/0001', 2020, 2, 1050, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '10:13:27', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(2, 1, 'bayo', 2020, 2, 2625, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '10:13:27', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(3, 1, 's6068', 2020, 2, 4125, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '10:13:27', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(4, 3, 's6068', 2020, 2, 3300, 'percent', '6', 'yes', 'active', 's6068', '2020-03-21', '10:13:27', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(5, 1, 'yekeen', 2020, 2, 7500, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '10:13:28', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(6, 4, 'yekeen', 2020, 2, 5000, 'amount', '0', 'yes', 'active', 's6068', '2020-03-21', '10:13:28', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(7, 1, '3571', 2020, 2, 4500, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '10:13:28', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(8, 1, 'HRM/STAFF/0001', 2020, 3, 1050, 'percent', '7.5', 'yes', 'inactive', 's6068', '2020-03-21', '10:15:17', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:27'),
(9, 1, 'bayo', 2020, 3, 2625, 'percent', '7.5', 'yes', 'inactive', 's6068', '2020-03-21', '10:15:17', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:27'),
(10, 1, 's6068', 2020, 3, 4125, 'percent', '7.5', 'yes', 'inactive', 's6068', '2020-03-21', '10:15:17', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:27'),
(11, 3, 's6068', 2020, 3, 3300, 'percent', '6', 'yes', 'inactive', 's6068', '2020-03-21', '10:15:17', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:27'),
(12, 1, 'yekeen', 2020, 3, 7500, 'percent', '7.5', 'yes', 'inactive', 's6068', '2020-03-21', '10:15:18', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:27'),
(13, 4, 'yekeen', 2020, 3, 5000, 'amount', '0', 'yes', 'inactive', 's6068', '2020-03-21', '10:15:18', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:27'),
(14, 1, '3571', 2020, 3, 4500, 'percent', '7.5', 'yes', 'inactive', 's6068', '2020-03-21', '10:15:18', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:28'),
(15, 1, 'HRM/STAFF/0001', 2020, 4, 1125, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '10:23:11', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(16, 1, 'bayo', 2020, 4, 1125, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '10:23:11', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(17, 1, 's6068', 2020, 4, 3000, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '10:23:11', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(18, 3, 's6068', 2020, 4, 2400, 'percent', '6', 'yes', 'active', 's6068', '2020-03-21', '10:23:11', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(19, 1, 'yekeen', 2020, 4, 2625, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '10:23:12', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(20, 4, 'yekeen', 2020, 4, 1000, 'amount', '0', 'yes', 'active', 's6068', '2020-03-21', '10:23:12', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(21, 1, '3571', 2020, 4, 1500, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '10:23:12', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(22, 1, 'HRM/STAFF/0001', 2020, 3, 1125, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '17:46:49', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(23, 1, 'bayo', 2020, 3, 1125, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '17:46:49', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(24, 1, 's6068', 2020, 3, 3000, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '17:46:50', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(25, 3, 's6068', 2020, 3, 2400, 'percent', '6', 'yes', 'active', 's6068', '2020-03-21', '17:46:50', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(26, 1, 'yekeen', 2020, 3, 2625, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '17:46:50', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(27, 4, 'yekeen', 2020, 3, 1000, 'amount', '0', 'yes', 'active', 's6068', '2020-03-21', '17:46:50', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(28, 1, '3571', 2020, 3, 1500, 'percent', '7.5', 'yes', 'active', 's6068', '2020-03-21', '17:46:50', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(29, 1, 's6068', 2019, 3, 3000, 'percent', '7.5', 'yes', 'active', '3571', '2020-11-25', '18:17:15', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 3, 's6068', 2019, 3, 2400, 'percent', '6', 'yes', 'active', '3571', '2020-11-25', '18:17:15', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `staff_salary_report`
--

CREATE TABLE `staff_salary_report` (
  `sn` int(10) NOT NULL,
  `user_id` varchar(100) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `basic_salary` varchar(16) DEFAULT NULL,
  `total_bonus` varchar(16) DEFAULT NULL,
  `total_deduct` varchar(16) DEFAULT NULL,
  `gross_pay` varchar(16) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `paid_by` enum('bank','cash','transfer') DEFAULT NULL,
  `c_by` varchar(100) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `upd_by` varchar(100) DEFAULT NULL,
  `date_upd` date DEFAULT NULL,
  `time_upd` time DEFAULT NULL,
  `del_by` varchar(100) DEFAULT NULL,
  `date_del` date DEFAULT NULL,
  `time_del` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_salary_report`
--

INSERT INTO `staff_salary_report` (`sn`, `user_id`, `year`, `month`, `basic_salary`, `total_bonus`, `total_deduct`, `gross_pay`, `status`, `paid_by`, `c_by`, `date_c`, `time_c`, `upd_by`, `date_upd`, `time_upd`, `del_by`, `date_del`, `time_del`) VALUES
(1, 'HRM/STAFF/0001', 2020, 2, '35000', '0', '1050', '33950', 'active', 'cash', 's6068', '2020-03-21', '10:13:27', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(2, 'bayo', 2020, 2, '35000', '0', '2625', '32375', 'active', 'cash', 's6068', '2020-03-21', '10:13:27', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(3, 's6068', 2020, 2, '70000', '22000', '7425', '84575', 'active', 'cash', 's6068', '2020-03-21', '10:13:27', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(4, 'yekeen', 2020, 2, '100000', '15000', '12500', '102500', 'active', 'cash', 's6068', '2020-03-21', '10:13:27', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(5, '3571', 2020, 2, '60000', '20000', '4500', '75500', 'active', 'cash', 's6068', '2020-03-21', '10:13:28', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(6, 'HRM/STAFF/0001', 2020, 3, '35000', '0', '1050', '33950', 'inactive', 'cash', 's6068', '2020-03-21', '10:15:17', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:27'),
(7, 'bayo', 2020, 3, '35000', '0', '2625', '32375', 'inactive', 'cash', 's6068', '2020-03-21', '10:15:17', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:27'),
(8, 's6068', 2020, 3, '70000', '22000', '7425', '84575', 'inactive', 'cash', 's6068', '2020-03-21', '10:15:17', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:27'),
(9, 'yekeen', 2020, 3, '100000', '15000', '12500', '102500', 'inactive', 'cash', 's6068', '2020-03-21', '10:15:17', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:27'),
(10, '3571', 2020, 3, '60000', '20000', '4500', '75500', 'inactive', 'cash', 's6068', '2020-03-21', '10:15:18', '', '0000-00-00', '00:00:00', 's6068', '2020-03-21', '17:43:27'),
(11, 'HRM/STAFF/0001', 2020, 4, '15000', '0', '1125', '13875', 'active', 'transfer', 's6068', '2020-03-21', '10:23:11', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(12, 'bayo', 2020, 4, '15000', '0', '1125', '13875', 'active', 'transfer', 's6068', '2020-03-21', '10:23:11', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(13, 's6068', 2020, 4, '40000', '7000', '5400', '41600', 'active', 'transfer', 's6068', '2020-03-21', '10:23:11', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(14, 'yekeen', 2020, 4, '35000', '3000', '3625', '34375', 'active', 'transfer', 's6068', '2020-03-21', '10:23:12', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(15, '3571', 2020, 4, '20000', '1000', '1500', '19500', 'active', 'transfer', 's6068', '2020-03-21', '10:23:12', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(16, 'HRM/STAFF/0001', 2020, 3, '15000', '0', '1125', '13875', 'active', 'transfer', 's6068', '2020-03-21', '17:46:49', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(17, 'bayo', 2020, 3, '15000', '0', '1125', '13875', 'active', 'transfer', 's6068', '2020-03-21', '17:46:49', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(18, 's6068', 2020, 3, '40000', '7000', '5400', '41600', 'active', 'transfer', 's6068', '2020-03-21', '17:46:49', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(19, 'yekeen', 2020, 3, '35000', '3000', '3625', '34375', 'active', 'transfer', 's6068', '2020-03-21', '17:46:50', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(20, '3571', 2020, 3, '20000', '1000', '1500', '19500', 'active', 'transfer', 's6068', '2020-03-21', '17:46:50', '', '0000-00-00', '00:00:00', '', '0000-00-00', '00:00:00'),
(21, 'Bolaji', 2019, 3, '0', '0', '0', '0', 'active', 'transfer', '3571', '2020-11-25', '18:16:59', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'HRM/ST/001', 2019, 3, '0', '0', '0', '0', 'active', 'transfer', '3571', '2020-11-25', '18:17:13', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 's6068', 2019, 3, '0', '7000', '5400', '1600', 'active', 'transfer', '3571', '2020-11-25', '18:17:14', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'HRM/ST/005', 2019, 3, '0', '0', '0', '0', 'active', 'transfer', '3571', '2020-11-25', '18:17:15', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `sn` int(5) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `capital` varchar(50) DEFAULT NULL,
  `lga` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`sn`, `state`, `capital`, `lga`) VALUES
(1, 'Abia', 'Umuahia', 'Aba North'),
(2, 'Adamawa', 'Yola', 'Demsa'),
(3, 'Akwa Ibom', 'Uyo', 'Abak'),
(4, 'Anambra', 'Akwa', 'Aguata'),
(5, 'Bauchi', 'Bauchi', 'Alkaleri'),
(6, 'Benue', 'Markurdi', 'Ado'),
(7, 'Borno', 'Maiduguri', 'Abadam'),
(8, 'Cross River', 'Calabar', 'Akpabuyo'),
(9, 'Delta', 'Asaba', 'Oshimili'),
(10, 'Edo', 'Benin City', 'Esan North-East'),
(11, 'Enugu', 'Enugu', 'Enugu South'),
(12, 'Imo', 'Owerri', 'Aboh-Mbaise'),
(13, 'Jigawa', 'Dutse', 'Auyo'),
(14, 'Kaduna', 'Kaduna', 'Birni-Gwari'),
(15, 'Kano', 'Kano', 'Ajingi'),
(19, 'Lagos', 'Ikeja', 'Agege'),
(20, 'Niger', 'Minna', 'Agaie'),
(21, 'Ogun', 'Abeokuta', 'Abeokuta North'),
(22, 'Ondo', 'Akure', 'AKoko North East'),
(23, 'Osun', 'Oshogbo', 'Aiyedade'),
(24, 'Oyo', 'Ibadan', 'Afijio'),
(25, 'Plataeu', 'Jos', 'Barikin Ladi'),
(26, 'Rivers', 'Port Harcourt', 'Abua/Odual'),
(27, 'Sokoto', 'Sokoto', 'Binji'),
(28, 'Taraba', 'Jalingo', 'Ardo-Kola'),
(29, 'Yobe', 'Damaturu', 'Bade'),
(30, 'Zamfara', 'Gusau', 'Anka'),
(31, 'Ekiti', 'Ado Ekiti', 'Ado'),
(32, 'Bayesa', 'yenagoa', 'Brass'),
(33, 'Ebonyi', 'Abakaliki', 'Afikpo South'),
(34, 'Gombe', 'Gombe', 'Akko'),
(35, 'Katsina', 'Katsina', 'Bakori'),
(36, 'Nassarawa', 'Lafia', 'Akwanga'),
(37, 'Abia', 'Umuahia', 'Aba South'),
(38, 'Abia', 'Umuahia', 'Arochukwu'),
(39, 'Abia', 'Umuahia', 'Bende'),
(40, 'Abia', 'Umuahia', 'Ikwuano'),
(41, 'Abia', 'Umuahia', 'Isiala-Ngwa North'),
(42, 'Abia', 'Umuahia', 'Isiala-Ngwa South'),
(43, 'Abia', 'Umuahia', 'Isuikwato'),
(44, 'Abia', 'Umuahia', 'Obi Nwa'),
(45, 'Abia', 'Umuahia', 'Ohafia'),
(46, 'Abia', 'Umuahia', 'Osisioma'),
(48, 'Abia', 'Umuahia', 'Ugwunagbo'),
(49, 'Abia', 'Umuahia', 'Ukwa East'),
(50, 'Abia', 'Umuahia', 'Ukwa West'),
(51, 'Abia', 'Umuahia', 'Umuahia North'),
(52, 'Abia', 'Umuahia', 'Umuahia South'),
(53, 'Abia', 'Umuahia', 'Umu-Nnochi'),
(54, 'Adamawa', 'Yola', 'Fufore'),
(55, 'Adamawa', 'Yola', 'Ganaye'),
(56, 'Adamawa', 'Yola', 'Gireri'),
(57, 'Adamawa', 'Yola', 'Gombi'),
(58, 'Adamawa', 'Yola', 'Guyuk'),
(59, 'Adamawa', 'Yola', 'Hong'),
(60, 'Adamawa', 'Yola', 'Jada'),
(61, 'Adamawa', 'Yola', 'Madagdi'),
(62, 'Adamawa', 'Yola', 'Lamurde'),
(63, 'Adamawa', 'Yola', 'Maiha'),
(64, 'Adamawa', 'Yola', 'Mayo-Belwa'),
(65, 'Adamawa', 'Yola', 'Michika'),
(66, 'Adamawa', 'Yola', 'Mubi North'),
(67, 'Adamawa', 'Yola', 'Mubi South'),
(68, 'Adamawa', 'Yola', 'Numan'),
(69, 'Adamawa', 'Yola', 'Shelleng'),
(70, 'Adamawa', 'Yola', 'Song'),
(71, 'Adamawa', 'Yola', 'Toungo'),
(72, 'Adamawa', 'Yola', 'Yola North'),
(73, 'Adamawa', 'Yola', 'Yola South'),
(74, 'Akwa Ibom', 'Uyo', 'Eastern Obolo'),
(75, 'Akwa Ibom', 'Uyo', 'Eket'),
(76, 'Akwa Ibom', 'Uyo', 'Esit Eket'),
(77, 'Akwa Ibom', 'Uyo', 'Essien Udim'),
(78, 'Akwa Ibom', 'Uyo', 'Etim Ekpo'),
(79, 'Akwa Ibom', 'Uyo', 'Etinan'),
(80, 'Akwa Ibom', 'Uyo', 'Ibeno'),
(81, 'Akwa Ibom', 'Uyo', 'Ibesikpo Asutan'),
(82, 'Akwa Ibom', 'Uyo', 'Ibiono Ibom'),
(83, 'Akwa Ibom', 'Uyo', 'Ika'),
(84, 'Akwa Ibom', 'Uyo', 'Ikono'),
(85, 'Akwa Ibom', 'Uyo', 'Ikot Abasi'),
(86, 'Akwa Ibom', 'Uyo', 'Ikot Ekpene'),
(87, 'Akwa Ibom', 'Uyo', 'Ini'),
(88, 'Akwa Ibom', 'Uyo', 'Itu'),
(89, 'Akwa Ibom', 'Uyo', 'Mbo'),
(90, 'Akwa Ibom', 'Uyo', 'Mkpat Enin'),
(91, 'Akwa Ibom', 'Uyo', 'Nsit Atai'),
(92, 'Akwa Ibom', 'Uyo', 'Nsit Ibom'),
(93, 'Akwa Ibom', 'Uyo', 'Nsit Ubium'),
(94, 'Akwa Ibom', 'Uyo', 'Obot Akara'),
(95, 'Akwa Ibom', 'Uyo', 'Okobo'),
(96, 'Akwa Ibom', 'Uyo', 'Onna'),
(97, 'Akwa Ibom', 'Uyo', 'Oron'),
(98, 'Akwa Ibom', 'Uyo', 'Oruk Anam'),
(99, 'Akwa Ibom', 'Uyo', 'Udung Uko'),
(100, 'Akwa Ibom', 'Uyo', 'Ukanafun'),
(101, 'Akwa Ibom', 'Uyo', 'Uruan'),
(102, 'Akwa Ibom', 'Uyo', 'Urue-Offong/Oruko'),
(103, 'Akwa Ibom', 'Uyo', 'Uyo'),
(104, 'Anambra', 'Akwa', 'Anambra East'),
(105, 'Anambra', 'Akwa', 'Anambra West'),
(106, 'Anambra', 'Akwa', 'Anaocha'),
(107, 'Anambra', 'Akwa', 'Akwa North'),
(108, 'Anambra', 'Akwa', 'Akwa South'),
(109, 'Anambra', 'Akwa', 'Ayamelum'),
(110, 'Anambra', 'Akwa', 'Dunukofia'),
(111, 'Anambra', 'Akwa', 'EKwusigo'),
(112, 'Anambra', 'Akwa', 'Idemili North'),
(113, 'Anambra', 'Akwa', 'Idemili South'),
(114, 'Anambra', 'Akwa', 'Iihiala'),
(115, 'Anambra', 'Akwa', 'Njikoka'),
(116, 'Anambra', 'Akwa', 'Nnewi North'),
(117, 'Anambra', 'Akwa', 'Nnewi South'),
(118, 'Anambra', 'Akwa', 'Ogbaru'),
(119, 'Anambra', 'Akwa', 'Onitsha North'),
(120, 'Anambra', 'Akwa', 'Onitsha South'),
(121, 'Anambra', 'Akwa', 'Orumba North'),
(122, 'Anambra', 'Akwa', 'Orumba South'),
(123, 'Anambra', 'Akwa', 'Oyi'),
(124, 'Bauchi', 'Bauchi', 'Bauchi'),
(125, 'Bauchi', 'Bauchi', 'Bogoro'),
(126, 'Bauchi', 'Bauchi', 'Damban'),
(127, 'Bauchi', 'Bauchi', 'Darazo'),
(128, 'Bauchi', 'Bauchi', 'Dass'),
(129, 'Bauchi', 'Bauchi', 'Ganjuwa'),
(130, 'Bauchi', 'Bauchi', 'Giade'),
(131, 'Bauchi', 'Bauchi', 'Itas/Gadau'),
(132, 'Bauchi', 'Bauchi', 'Jama\'are'),
(133, 'Bauchi', 'Bauchi', 'Katagum'),
(134, 'Bauchi', 'Bauchi', 'Kirfi'),
(135, 'Bauchi', 'Bauchi', 'Misau'),
(136, 'Bauchi', 'Bauchi', 'Ningi'),
(137, 'Bauchi', 'Bauchi', 'Shira'),
(138, 'Bauchi', 'Bauchi', 'Tafawa-Balewa'),
(139, 'Bauchi', 'Bauchi', 'Toro'),
(140, 'Bauchi', 'Bauchi', 'Warji'),
(141, 'Bauchi', 'Bauchi', 'zaki'),
(142, 'Bayesa', 'yenagoa', 'Ekeremor'),
(143, 'Bayesa', 'yenagoa', 'Kolokuma/Opokuma'),
(144, 'Bayesa', 'yenagoa', 'Nembe'),
(145, 'Bayesa', 'yenagoa', 'Ogbia'),
(146, 'Bayesa', 'yenagoa', 'Sagbama'),
(147, 'Bayesa', 'yenagoa', 'Southern Jaw'),
(148, 'Bayesa', 'yenagoa', 'Yenegoa'),
(149, 'Benue', 'Markurdi', 'Agatu'),
(150, 'Benue', 'Markurdi', 'Apa'),
(151, 'Benue', 'Markurdi', 'Buruku'),
(152, 'Benue', 'Markurdi', 'Gboko'),
(153, 'Benue', 'Markurdi', 'Guma'),
(154, 'Benue', 'Markurdi', 'Gwer East'),
(155, 'Benue', 'Markurdi', 'Gwer West'),
(156, 'Benue', 'Markurdi', 'Katsina-Ala'),
(157, 'Benue', 'Markurdi', 'Kwande'),
(158, 'Benue', 'Markurdi', 'Logo'),
(159, 'Benue', 'Markurdi', 'Markurdi'),
(160, 'Benue', 'Markurdi', 'Obi'),
(161, 'Benue', 'Markurdi', 'Ogbadibo'),
(162, 'Benue', 'Markurdi', 'Oju'),
(163, 'Benue', 'Markurdi', 'Okpokwu'),
(164, 'Benue', 'Markurdi', 'Ohimini'),
(165, 'Benue', 'Markurdi', 'Oturkpo'),
(166, 'Benue', 'Markurdi', 'Tarka'),
(167, 'Benue', 'Markurdi', 'Ukum'),
(168, 'Benue', 'Markurdi', 'Ushongo'),
(169, 'Benue', 'Markurdi', 'Vandeikya'),
(170, 'Borno', 'Maiduguri', 'Askira/Uba'),
(171, 'Borno', 'Maiduguri', 'Bama'),
(172, 'Borno', 'Maiduguri', 'Bayo'),
(173, 'Borno', 'Maiduguri', 'Biu'),
(174, 'Borno', 'Maiduguri', 'Chibok'),
(175, 'Borno', 'Maiduguri', 'Damboa'),
(176, 'Borno', 'Maiduguri', 'Dikwa'),
(177, 'Borno', 'Maiduguri', 'Gubio'),
(178, 'Borno', 'Maiduguri', 'Guzamala'),
(179, 'Borno', 'Maiduguri', 'Gwoza'),
(180, 'Borno', 'Maiduguri', 'Hawul'),
(181, 'Borno', 'Maiduguri', 'Jere'),
(182, 'Borno', 'Maiduguri', 'kaga'),
(183, 'Borno', 'Maiduguri', 'Kala/Balge'),
(184, 'Borno', 'Maiduguri', 'Konduga'),
(185, 'Borno', 'Maiduguri', 'Kukawa'),
(186, 'Borno', 'Maiduguri', 'Kwaya Kusar'),
(187, 'Borno', 'Maiduguri', 'Mafa'),
(188, 'Borno', 'Maiduguri', 'Magumeri'),
(189, 'Borno', 'Maiduguri', 'Maiduguri'),
(190, 'Borno', 'Maiduguri', 'Marte'),
(191, 'Borno', 'Maiduguri', 'Mobbar'),
(192, 'Borno', 'Maiduguri', 'Monguno'),
(193, 'Borno', 'Maiduguri', 'Ngala'),
(194, 'Borno', 'Maiduguri', 'Nganzai'),
(195, 'Borno', 'Maiduguri', 'Shani'),
(196, 'Cross River', 'Calabar', 'Odukpani'),
(197, 'Cross River', 'Calabar', 'Akamkpa'),
(198, 'Cross River', 'Calabar', 'Biase'),
(199, 'Cross River', 'Calabar', 'Abi'),
(200, 'Cross River', 'Calabar', 'Ikom'),
(201, 'Cross River', 'Calabar', 'Yarkur'),
(202, 'Cross River', 'Calabar', 'Odubra'),
(203, 'Cross River', 'Calabar', 'Boki'),
(204, 'Cross River', 'Calabar', 'Ogoja'),
(205, 'Cross River', 'Calabar', 'Yala'),
(206, 'Cross River', 'Calabar', 'Obanliku'),
(207, 'Cross River', 'Calabar', 'Obudu'),
(208, 'Cross River', 'Calabar', 'Calabar South'),
(209, 'Cross River', 'Calabar', 'Etung'),
(210, 'Cross River', 'Calabar', 'Bekwara'),
(211, 'Cross River', 'Calabar', 'Bakassi'),
(212, 'Cross River', 'Calabar', 'Calabar Municipality'),
(213, 'Delta', 'Asaba', 'Aniocha'),
(214, 'Delta', 'Asaba', 'Aniocha South'),
(215, 'Delta', 'Asaba', 'Ika South'),
(216, 'Delta', 'Asaba', 'Ika North-East'),
(217, 'Delta', 'Asaba', 'Ndokwa West'),
(218, 'Delta', 'Asaba', 'Ndokwa East'),
(219, 'Delta', 'Asaba', 'Osoko South'),
(220, 'Delta', 'Asaba', 'Isoko North'),
(221, 'Delta', 'Asaba', 'Bomadi'),
(222, 'Delta', 'Asaba', 'Burutu'),
(223, 'Delta', 'Asaba', 'Ughelli South'),
(224, 'Delta', 'Asaba', 'Ughelli North'),
(225, 'Delta', 'Asaba', 'Ethiope West'),
(226, 'Delta', 'Asaba', 'Ethiope East'),
(227, 'Delta', 'Asaba', 'Sapele'),
(228, 'Delta', 'Asaba', 'Okpe'),
(229, 'Delta', 'Asaba', 'Warri North'),
(230, 'Delta', 'Asaba', 'Warri South'),
(231, 'Delta', 'Asaba', 'Uvwie'),
(232, 'Delta', 'Asaba', 'Udu'),
(233, 'Delta', 'Asaba', 'Warri Central'),
(234, 'Delta', 'Asaba', 'Ukwani'),
(235, 'Delta', 'Asaba', 'Oshimili North'),
(236, 'Delta', 'Asaba', 'Patani'),
(237, 'Ebonyi', 'Abakaliki', 'Afikpo North'),
(238, 'Ebonyi', 'Abakaliki', 'Onicha'),
(239, 'Ebonyi', 'Abakaliki', 'Ohaozara'),
(240, 'Ebonyi', 'Abakaliki', 'Abakaliki'),
(241, 'Ebonyi', 'Abakaliki', 'Ishielu'),
(242, 'Ebonyi', 'Abakaliki', 'Ikwo'),
(243, 'Ebonyi', 'Abakaliki', 'Ezza'),
(244, 'Ebonyi', 'Abakaliki', 'Ezza South'),
(245, 'Ebonyi', 'Abakaliki', 'Ohaukwu'),
(246, 'Ebonyi', 'Abakaliki', 'Ebonyi'),
(247, 'Ebonyi', 'Abakaliki', 'Ivo'),
(248, 'Edo', 'Benin City', 'Esan Central'),
(249, 'Edo', 'Benin City', 'Esan West'),
(250, 'Edo', 'Benin City', 'Egor'),
(251, 'Edo', 'Benin City', 'Ukpoba'),
(252, 'Edo', 'Benin City', 'Central'),
(253, 'Edo', 'Benin City', 'Etsako Central'),
(254, 'Edo', 'Benin City', 'Igueben'),
(255, 'Edo', 'Benin City', 'Oredo'),
(256, 'Edo', 'Benin City', 'Ovia SouthWest'),
(257, 'Edo', 'Benin City', 'Ovia South-East'),
(258, 'Edo', 'Benin City', 'Orhionwon'),
(259, 'Edo', 'Benin City', 'Uhunmwonde'),
(260, 'Edo', 'Benin City', 'Etsako East'),
(261, 'Edo', 'Benin City', 'Esan South-East'),
(262, 'Ekiti', 'Ado Ekiti', 'Ekiti East'),
(263, 'Ekiti', 'Ado Ekiti', 'Ekiti West'),
(264, 'Ekiti', 'Ado Ekiti', 'Emure/Ise/Orun'),
(265, 'Ekiti', 'Ado Ekiti', 'Ekiti South-West'),
(266, 'Ekiti', 'Ado Ekiti', 'Ikare'),
(267, 'Ekiti', 'Ado Ekiti', 'Irepodun'),
(268, 'Ekiti', 'Ado Ekiti', 'Ijero'),
(269, 'Ekiti', 'Ado Ekiti', 'Ido/Osi'),
(270, 'Ekiti', 'Ado Ekiti', 'Oye'),
(271, 'Ekiti', 'Ado Ekiti', 'Ikole'),
(272, 'Ekiti', 'Ado Ekiti', 'Moba'),
(273, 'Ekiti', 'Ado Ekiti', 'Gbonyin'),
(274, 'Ekiti', 'Ado Ekiti', 'Efon'),
(275, 'Ekiti', 'Ado Ekiti', 'Ise/Orun'),
(276, 'Ekiti', 'Ado Ekiti', 'Ilejemeje'),
(277, 'Enugu', 'Enugu', 'Igbo-Eze South'),
(278, 'Enugu', 'Enugu', 'Enugu North'),
(279, 'Enugu', 'Enugu', 'Nkanu'),
(280, 'Enugu', 'Enugu', 'Udi Agwu'),
(281, 'Enugu', 'Enugu', 'IgboEze North'),
(282, 'Enugu', 'Enugu', 'Isi-Uzo'),
(283, 'Enugu', 'Enugu', 'Nsukka'),
(284, 'Enugu', 'Enugu', 'Igbo-Ekiti'),
(285, 'Enugu', 'Enugu', 'Uzo-Uwani'),
(286, 'Enugu', 'Enugu', 'Enugu East'),
(287, 'Enugu', 'Enugu', 'Aninri'),
(288, 'Enugu', 'Enugu', 'Nkanu East'),
(289, 'Enugu', 'Enugu', 'Udenu'),
(290, 'Gombe', 'Gombe', 'Balanga'),
(291, 'Gombe', 'Gombe', 'Billiri'),
(292, 'Gombe', 'Gombe', 'Dukku'),
(293, 'Gombe', 'Gombe', 'Kaltungo'),
(294, 'Gombe', 'Gombe', 'Kwami'),
(295, 'Gombe', 'Gombe', 'Shomgom'),
(296, 'Gombe', 'Gombe', 'Funakaye'),
(297, 'Gombe', 'Gombe', 'Gombe'),
(298, 'Gombe', 'Gombe', 'Hafada/Bajoga'),
(299, 'Gombe', 'Gombe', 'Yamaltu/Delta'),
(300, 'Imo', 'Owerri', 'Ahiazu-Mbaise'),
(301, 'Imo', 'Owerri', 'Ehime-Mbano'),
(302, 'Imo', 'Owerri', 'Ezinihitte'),
(303, 'Imo', 'Owerri', 'Ideato North'),
(304, 'Imo', 'Owerri', 'Ideato South'),
(305, 'Imo', 'Owerri', 'Ihitte/Uboma'),
(306, 'Imo', 'Owerri', 'Ikereduru'),
(307, 'Imo', 'Owerri', 'Isiala Mbano'),
(308, 'Imo', 'Owerri', 'Isu'),
(309, 'Imo', 'Owerri', 'Mbaitoli'),
(310, 'Imo', 'Owerri', 'Mbaitoli'),
(311, 'Imo', 'Owerri', 'Ngor-Okpala'),
(312, 'Imo', 'Owerri', 'Njaba'),
(313, 'Imo', 'Owerri', 'Nwagele'),
(314, 'Imo', 'Owerri', 'Nkwerre'),
(315, 'Imo', 'Owerri', 'Obowo'),
(316, 'Imo', 'Owerri', 'Oguta'),
(317, 'Imo', 'Owerri', 'Ohaji/Egbema'),
(318, 'Imo', 'Owerri', 'Okigwe'),
(319, 'Imo', 'Owerri', 'Orlu'),
(320, 'Imo', 'Owerri', 'Orsu'),
(321, 'Imo', 'Owerri', 'Oru East'),
(322, 'Imo', 'Owerri', 'Oru West'),
(323, 'Imo', 'Owerri', 'Owerri-Municipal'),
(324, 'Imo', 'Owerri', 'Owerri North'),
(325, 'Imo', 'Owerri', 'Owerri West'),
(326, 'Jigawa', 'Dutse', 'Babura'),
(327, 'Jigawa', 'Dutse', 'Birni Kudu'),
(328, 'Jigawa', 'Dutse', 'Birniwa'),
(329, 'Jigawa', 'Dutse', 'Buji'),
(330, 'Jigawa', 'Dutse', 'Dutse'),
(331, 'Jigawa', 'Dutse', 'Gagarawa'),
(332, 'Jigawa', 'Dutse', 'Garki'),
(333, 'Jigawa', 'Dutse', 'Gumel'),
(334, 'Jigawa', 'Dutse', 'Guri'),
(335, 'Jigawa', 'Dutse', 'Gwaram'),
(336, 'Jigawa', 'Dutse', 'Gwiwa'),
(337, 'Jigawa', 'Dutse', 'Hadejia'),
(338, 'Jigawa', 'Dutse', 'Jahun'),
(339, 'Jigawa', 'Dutse', 'Kafin Hausa'),
(340, 'Jigawa', 'Dutse', 'Kaugama Kazaure'),
(341, 'Jigawa', 'Dutse', 'Kiri Kasamma'),
(342, 'Jigawa', 'Dutse', 'Kiyawa'),
(343, 'Jigawa', 'Dutse', 'Maigatari'),
(344, 'Jigawa', 'Dutse', 'Malam Madori'),
(345, 'Jigawa', 'Dutse', 'Miga'),
(346, 'Jigawa', 'Dutse', 'Ringim'),
(347, 'Jigawa', 'Dutse', 'Roni'),
(348, 'Jigawa', 'Dutse', 'Sule-Tankarkar'),
(349, 'Jigawa', 'Dutse', 'Taura'),
(350, 'Jigawa', 'Dutse', 'Yankwashi'),
(351, 'Kaduna', 'Kaduna', 'Chikun'),
(352, 'Kaduna', 'Kaduna', 'Giwa'),
(353, 'Kaduna', 'Kaduna', 'Igabi'),
(354, 'Kaduna', 'Kaduna', 'Ikara'),
(355, 'Kaduna', 'Kaduna', 'Jaba'),
(356, 'Kaduna', 'Kaduna', 'Jema\'a'),
(357, 'Kaduna', 'Kaduna', 'Kachia'),
(358, 'Kaduna', 'Kaduna', 'Kaduna North'),
(359, 'Kaduna', 'Kaduna', 'Kaduna South'),
(360, 'Kaduna', 'Kaduna', 'Kagarko'),
(361, 'Kaduna', 'Kaduna', 'Kajuru'),
(362, 'Kaduna', 'Kaduna', 'Kaura'),
(363, 'Kaduna', 'Kaduna', 'Kauru'),
(364, 'Kaduna', 'Kaduna', 'Kubau'),
(365, 'Kaduna', 'Kaduna', 'Kudan'),
(366, 'Kaduna', 'Kaduna', 'Lere'),
(367, 'Kaduna', 'Kaduna', 'Makarfi'),
(368, 'Kaduna', 'Kaduna', 'Sabon-Gari'),
(369, 'Kaduna', 'Kaduna', 'Sanga'),
(370, 'Kaduna', 'Kaduna', 'Soba'),
(371, 'Kaduna', 'Kaduna', 'Zango-Kataf'),
(372, 'Kaduna', 'Kaduna', 'Zaria'),
(373, 'Kano', 'Kano', 'Albasu'),
(374, 'Kano', 'Kano', 'Bagwai'),
(375, 'Kano', 'Kano', 'Bebeji'),
(376, 'Kano', 'Kano', 'Bichi'),
(377, 'Kano', 'Kano', 'Bunkure'),
(378, 'Kano', 'Kano', 'Dala'),
(379, 'Kano', 'Kano', 'Dambatta'),
(380, 'Kano', 'Kano', 'Dawakin Kudu'),
(381, 'Kano', 'Kano', 'Dawakin Tofa'),
(382, 'Kano', 'Kano', 'Doguwa'),
(383, 'Kano', 'Kano', 'Fagge'),
(384, 'Kano', 'Kano', 'Gabasawa'),
(385, 'Kano', 'Kano', 'Garko'),
(386, 'Kano', 'Kano', 'Garum'),
(387, 'Kano', 'Kano', 'Mallam'),
(388, 'Kano', 'Kano', 'Gaya'),
(389, 'Kano', 'Kano', 'Gezawa'),
(390, 'Kano', 'Kano', 'Gwale'),
(391, 'Kano', 'Kano', 'Gwarzo'),
(392, 'Kano', 'Kano', 'Kabo'),
(393, 'Kano', 'Kano', 'Kano Municipal'),
(394, 'Kano', 'Kano', 'Karaye'),
(395, 'Kano', 'Kano', 'Kibiya'),
(396, 'Kano', 'Kano', 'Kiru'),
(397, 'Kano', 'Kano', 'Kumbotso'),
(398, 'Kano', 'Kano', 'Kunchi'),
(399, 'Kano', 'Kano', 'Kura'),
(400, 'Kano', 'Kano', 'Madobi'),
(401, 'Kano', 'Kano', 'Makoda'),
(402, 'Kano', 'Kano', 'Minjibir'),
(403, 'Kano', 'Kano', 'Nasarawa'),
(404, 'Kano', 'Kano', 'Rano'),
(405, 'Kano', 'Kano', 'Rimin Gado'),
(406, 'Kano', 'Kano', 'Rogo'),
(407, 'Kano', 'Kano', 'Shanono'),
(408, 'Kano', 'Kano', 'Sumaila'),
(409, 'Kano', 'Kano', 'Takali'),
(410, 'Kano', 'Kano', 'Tarauni'),
(411, 'Kano', 'Kano', 'Tofa'),
(412, 'Kano', 'Kano', 'Tsanyawa'),
(413, 'Kano', 'Kano', 'Tudun Wada'),
(414, 'Kano', 'Kano', 'Ungogo'),
(415, 'Kano', 'Kano', 'Warawa'),
(416, 'Kano', 'Kano', 'Wudil'),
(417, 'Katsina', 'Katsina', 'Batagarawa'),
(418, 'Katsina', 'Katsina', 'Batsari'),
(419, 'Katsina', 'Katsina', 'Baure'),
(420, 'Katsina', 'Katsina', 'Bindawa'),
(421, 'Katsina', 'Katsina', 'Charanchi'),
(422, 'Katsina', 'Katsina', 'Dandume'),
(423, 'Katsina', 'Katsina', 'Danja'),
(424, 'Katsina', 'Katsina', 'Dan Musa'),
(425, 'Katsina', 'Katsina', 'Daura'),
(426, 'Katsina', 'Katsina', 'Dutsi'),
(427, 'Katsina', 'Katsina', 'Dutsin-Ma'),
(428, 'Katsina', 'Katsina', 'Faskari'),
(429, 'Katsina', 'Katsina', 'Funtua'),
(430, 'Katsina', 'Katsina', 'Ingawa'),
(431, 'Katsina', 'Katsina', 'Jibia'),
(432, 'Katsina', 'Katsina', 'Kafur'),
(433, 'Katsina', 'Katsina', 'Kaita'),
(434, 'Katsina', 'Katsina', 'Kankara'),
(435, 'Katsina', 'Katsina', 'Kankia'),
(436, 'Katsina', 'Katsina', 'Katsina'),
(437, 'Katsina', 'Katsina', 'Kurfi'),
(438, 'Katsina', 'Katsina', 'Kusada'),
(439, 'Katsina', 'Katsina', 'Mai\'Adua'),
(440, 'Katsina', 'Katsina', 'Malumfashi'),
(441, 'Katsina', 'Katsina', 'Mani'),
(442, 'Katsina', 'Katsina', 'Mashi'),
(443, 'Katsina', 'Katsina', 'Matazuu'),
(444, 'Katsina', 'Katsina', 'Musawa'),
(445, 'Katsina', 'Katsina', 'Rimi'),
(446, 'Katsina', 'Katsina', 'Sabuwa'),
(447, 'Katsina', 'Katsina', 'Safana'),
(448, 'Katsina', 'Katsina', 'Sandamu'),
(449, 'Katsina', 'Katsina', 'Zango'),
(507, 'Lagos', 'Ikeja', 'Ajeromi-Ifelodun'),
(450, 'Kebbi', 'Birnin Kebbi', 'Aleiro'),
(451, 'Kebbi', 'Birnin Kebbi', 'Arewa-Dandi'),
(452, 'Kebbi', 'Birnin Kebbi', 'Argungu'),
(453, 'Kebbi', 'Birnin Kebbi', 'Augie'),
(454, 'Kebbi', 'Birnin Kebbi', 'Bagudo'),
(455, 'Kebbi', 'Birnin Kebbi', 'Birnin Kebbi'),
(456, 'Kebbi', 'Birnin Kebbi', 'Bunza'),
(457, 'Kebbi', 'Birnin Kebbi', 'Dandi'),
(458, 'Kebbi', 'Birnin Kebbi', 'Fakai'),
(459, 'Kebbi', 'Birnin Kebbi', 'Gwandu'),
(460, 'Kebbi', 'Birnin Kebbi', 'Jega'),
(461, 'Kebbi', 'Birnin Kebbi', 'Kalgo'),
(462, 'Kebbi', 'Birnin Kebbi', 'Koko/Besse'),
(463, 'Kebbi', 'Birnin Kebbi', 'Maiyama'),
(464, 'Kebbi', 'Birnin Kebbi', 'Ngaski'),
(465, 'Kebbi', 'Birnin Kebbi', 'Sakaba'),
(466, 'Kebbi', 'Birnin Kebbi', 'Shanga'),
(467, 'Kebbi', 'Birnin Kebbi', 'Suru'),
(468, 'Kebbi', 'Birnin Kebbi', 'Wasagu/Danko'),
(469, 'Kebbi', 'Birnin Kebbi', 'Yauri'),
(470, 'Kebbi', 'Birnin Kebbi', 'Zuru'),
(508, 'Lagos', 'Ikeja', 'Alimosho'),
(471, 'Kogi', 'Lokoja', 'Adavi'),
(472, 'Kogi', 'Lokoja', 'Ajaokuta'),
(473, 'Kogi', 'Lokoja', 'Ankpa'),
(474, 'Kogi', 'Lokoja', 'Bassa'),
(475, 'Kogi', 'Lokoja', 'Dekina'),
(476, 'Kogi', 'Lokoja', 'Ibaji'),
(477, 'Kogi', 'Lokoja', 'Idah'),
(478, 'Kogi', 'Lokoja', 'Igalamela-Odolu'),
(479, 'Kogi', 'Lokoja', 'Ijumu'),
(480, 'Kogi', 'Lokoja', 'Kabba/Bunu'),
(481, 'Kogi', 'Lokoja', 'Kogi'),
(482, 'Kogi', 'Lokoja', 'Lokoja'),
(483, 'Kogi', 'Lokoja', 'Mopa-Muro'),
(484, 'Kogi', 'Lokoja', 'Ofu'),
(485, 'Kogi', 'Lokoja', 'Ogiri/Mangongo'),
(486, 'Kogi', 'Lokoja', 'Okehi'),
(487, 'Kogi', 'Lokoja', 'Okene'),
(488, 'Kogi', 'Lokoja', 'Olamabolo'),
(489, 'Kogi', 'Lokoja', 'Omala'),
(490, 'Kogi', 'Lokoja', 'Yagba East'),
(491, 'Kogi', 'Lokoja', 'Yagba West'),
(509, 'Lagos', 'Ikeja', 'Amuwo-Odofin'),
(492, 'Kwara', 'Ilorin', 'Asa'),
(493, 'Kwara', 'Ilorin', 'Baruten'),
(494, 'Kwara', 'Ilorin', 'Edu'),
(495, 'Kwara', 'Ilorin', 'Ekiti'),
(496, 'Kwara', 'Ilorin', 'Ifelodun'),
(497, 'Kwara', 'Ilorin', 'Ilorin East'),
(498, 'Kwara', 'Ilorin', 'Ilorin West'),
(499, 'Kwara', 'Ilorin', 'Irepodun'),
(500, 'Kwara', 'Ilorin', 'Isin'),
(501, 'Kwara', 'Ilorin', 'Kaiama'),
(502, 'Kwara', 'Ilorin', 'Moro'),
(503, 'Kwara', 'Ilorin', 'Offa'),
(504, 'Kwara', 'Ilorin', 'Oke-Ero'),
(505, 'Kwara', 'Ilorin', 'Oyun'),
(506, 'Kwara', 'Ilorin', 'Pategi'),
(510, 'Lagos', 'Ikeja', 'Apapa'),
(511, 'Lagos', 'Ikeja', 'Badagry'),
(512, 'Lagos', 'Ikeja', 'Epe'),
(513, 'Lagos', 'Ikeja', 'Eti-Osa'),
(514, 'Lagos', 'Ikeja', 'Ibeju/Lekki'),
(515, 'Lagos', 'Ikeja', 'Ifako-Ijaye'),
(516, 'Lagos', 'Ikeja', 'Ikeja'),
(517, 'Lagos', 'Ikeja', 'Ikorodu'),
(518, 'Lagos', 'Ikeja', 'Kosofe'),
(519, 'Lagos', 'Ikeja', 'lagos Island'),
(520, 'Lagos', 'Ikeja', 'Lagos Mainland'),
(521, 'Lagos', 'Ikeja', 'Mushin'),
(522, 'Lagos', 'Ikeja', 'Ojo'),
(523, 'Lagos', 'Ikeja', 'Oshodi-Isolo'),
(524, 'Lagos', 'Ikeja', 'Shomolu'),
(525, 'Lagos', 'Ikeja', 'Surulere'),
(526, 'Nassarawa', 'Lafia', 'Awe'),
(527, 'Nassarawa', 'Lafia', 'Doma'),
(528, 'Nassarawa', 'Lafia', 'Karu'),
(529, 'Nassarawa', 'Lafia', 'Keana'),
(530, 'Nassarawa', 'Lafia', 'Keffi'),
(531, 'Nassarawa', 'Lafia', 'Kokona'),
(532, 'Nassarawa', 'Lafia', 'Lafia'),
(533, 'Nassarawa', 'Lafia', 'Nasarawa'),
(534, 'Nassarawa', 'Lafia', 'Nasarawa-Eggon'),
(535, 'Nassarawa', 'Lafia', 'Obi'),
(536, 'Nassarawa', 'Lafia', 'Toto'),
(537, 'Nassarawa', 'Lafia', 'Wamba'),
(538, 'Niger', 'Minna', 'Agwara'),
(539, 'Niger', 'Minna', 'Bida'),
(540, 'Niger', 'Minna', 'Borgu'),
(541, 'Niger', 'Minna', 'Bosso'),
(542, 'Niger', 'Minna', 'Chanchaga'),
(543, 'Niger', 'Minna', 'Edati'),
(544, 'Niger', 'Minna', 'Gbako'),
(545, 'Niger', 'Minna', 'Gurara'),
(546, 'Niger', 'Minna', 'Katcha'),
(547, 'Niger', 'Minna', 'Kontagora'),
(548, 'Niger', 'Minna', 'Lapai'),
(549, 'Niger', 'Minna', 'Lavun'),
(550, 'Niger', 'Minna', 'Magama'),
(551, 'Niger', 'Minna', 'Mariga'),
(552, 'Niger', 'Minna', 'Mashegu'),
(553, 'Niger', 'Minna', 'Mokwa'),
(554, 'Niger', 'Minna', 'Muya'),
(555, 'Niger', 'Minna', 'Pailoro'),
(556, 'Niger', 'Minna', 'Rafi'),
(557, 'Niger', 'Minna', 'Rijau'),
(558, 'Niger', 'Minna', 'Shiroro'),
(559, 'Niger', 'Minna', 'Suleja'),
(560, 'Niger', 'Minna', 'Tafa'),
(561, 'Niger', 'Minna', 'Wushishi'),
(562, 'Ogun', 'Abeokuta', 'Abeokuta South'),
(563, 'Ogun', 'Abeokuta', 'Ado-Oda/Ota'),
(564, 'Ogun', 'Abeokuta', 'Agbado North'),
(565, 'Ogun', 'Abeokuta', 'Egbado South'),
(566, 'Ogun', 'Abeokuta', 'Ewekoro'),
(567, 'Ogun', 'Abeokuta', 'Ifo'),
(568, 'Ogun', 'Abeokuta', 'Ijebu East'),
(569, 'Ogun', 'Abeokuta', 'Ijebu North'),
(570, 'Ogun', 'Abeokuta', 'Ijebu North East'),
(571, 'Ogun', 'Abeokuta', 'Ijebu Ode'),
(572, 'Ogun', 'Abeokuta', 'Ikenne'),
(573, 'Ogun', 'Abeokuta', 'Imeko-Afon'),
(574, 'Ogun', 'Abeokuta', 'Ipokia'),
(575, 'Ogun', 'Abeokuta', 'Obafemi-Owode'),
(576, 'Ogun', 'Abeokuta', 'Ogun Waterside'),
(577, 'Ogun', 'Abeokuta', 'Odeda'),
(578, 'Ogun', 'Abeokuta', 'Odogbolu'),
(579, 'Ogun', 'Abeokuta', 'Remo North'),
(580, 'Ogun', 'Abeokuta', 'Shagamu'),
(581, 'Ondo', 'Akure', 'Akoko North West'),
(582, 'Ondo', 'Akure', 'Akoko South Akure East'),
(583, 'Ondo', 'Akure', 'Akoko South West'),
(584, 'Ondo', 'Akure', 'Akure North'),
(585, 'Ondo', 'Akure', 'Akure South'),
(586, 'Ondo', 'Akure', 'Ese-Ode'),
(587, 'Ondo', 'Akure', 'Idanre'),
(588, 'Ondo', 'Akure', 'Ifedore'),
(589, 'Ondo', 'Akure', 'Ilaje'),
(590, 'Ondo', 'Akure', 'Ile-Oluji'),
(591, 'Ondo', 'Akure', 'Okeigbo '),
(592, 'Ondo', 'Akure', 'Irele'),
(593, 'Ondo', 'Akure', 'Odigbo'),
(594, 'Ondo', 'Akure', 'Okitipupa'),
(595, 'Ondo', 'Akure', 'Ondo East'),
(596, 'Ondo', 'Akure', 'Ondo West'),
(597, 'Ondo', 'Akure', 'Ose'),
(598, 'Ondo', 'Akure', 'Owo'),
(599, 'Osun', 'Oshogbo', 'Aiyedire'),
(600, 'Osun', 'Oshogbo', 'Atakumosa East'),
(601, 'Osun', 'Oshogbo', 'Atakumosa West'),
(602, 'Osun', 'Oshogbo', 'Boluwaduro'),
(603, 'Osun', 'Oshogbo', 'Boripe'),
(604, 'Osun', 'Oshogbo', 'Ede North'),
(605, 'Osun', 'Oshogbo', 'Ede South'),
(606, 'Osun', 'Oshogbo', 'Egbedore'),
(607, 'Osun', 'Oshogbo', 'Ejigbo'),
(608, 'Osun', 'Oshogbo', 'Ife Central'),
(609, 'Osun', 'Oshogbo', 'Ife East'),
(610, 'Osun', 'Oshogbo', 'Ife North'),
(611, 'Osun', 'Oshogbo', 'Ife South'),
(612, 'Osun', 'Oshogbo', 'Ifedayo'),
(613, 'Osun', 'Oshogbo', 'Ifelodun'),
(614, 'Osun', 'Oshogbo', 'Ila'),
(615, 'Osun', 'Oshogbo', 'Ilesha East'),
(616, 'Osun', 'Oshogbo', 'Ilesha West'),
(617, 'Osun', 'Oshogbo', 'Irepodun'),
(618, 'Osun', 'Oshogbo', 'Irewole'),
(619, 'Osun', 'Oshogbo', 'Isokan'),
(620, 'Osun', 'Oshogbo', 'Iwo'),
(621, 'Osun', 'Oshogbo', 'Obokun'),
(622, 'Osun', 'Oshogbo', 'Odo-Otin'),
(623, 'Osun', 'Oshogbo', 'Ola-Oluwa'),
(624, 'Osun', 'Oshogbo', 'Olorunda'),
(625, 'Osun', 'Oshogbo', 'Oriade'),
(626, 'Osun', 'Oshogbo', 'Orolu'),
(627, 'Osun', 'Oshogbo', 'Osogbo'),
(628, 'Oyo', 'Ibadan', 'Akinyele'),
(629, 'Oyo', 'Ibadan', 'Atiba'),
(630, 'Oyo', 'Ibadan', 'Atigbo'),
(631, 'Oyo', 'Ibadan', 'Egbeda'),
(632, 'Oyo', 'Ibadan', 'Ibadan Central'),
(633, 'Oyo', 'Ibadan', 'Ibadan North'),
(634, 'Oyo', 'Ibadan', 'Ibadan North West'),
(635, 'Oyo', 'Ibadan', 'Ibadan South East'),
(636, 'Oyo', 'Ibadan', 'Ibadan South West'),
(637, 'Oyo', 'Ibadan', 'Ibarapa Central'),
(638, 'Oyo', 'Ibadan', 'Ibarapa East'),
(639, 'Oyo', 'Ibadan', 'Ibarapa North'),
(640, 'Oyo', 'Ibadan', 'Ido'),
(641, 'Oyo', 'Ibadan', 'Irepo'),
(642, 'Oyo', 'Ibadan', 'Iseyin'),
(643, 'Oyo', 'Ibadan', 'Itesiwaju'),
(644, 'Oyo', 'Ibadan', 'Iwajowa'),
(645, 'Oyo', 'Ibadan', 'Kajola'),
(646, 'Oyo', 'Ibadan', 'Lagelu Ogbomosho North'),
(647, 'Oyo', 'Ibadan', 'Ogbomosho South'),
(648, 'Oyo', 'Ibadan', 'Ogo Oluwa'),
(649, 'Oyo', 'Ibadan', 'Olorunsogo'),
(650, 'Oyo', 'Ibadan', 'Oluyole'),
(651, 'Oyo', 'Ibadan', 'Ona-Ara'),
(652, 'Oyo', 'Ibadan', 'Orelope'),
(653, 'Oyo', 'Ibadan', 'Ori Ire'),
(654, 'Oyo', 'Ibadan', 'Oyo East'),
(655, 'Oyo', 'Ibadan', 'Oyo West'),
(656, 'Oyo', 'Ibadan', 'Saki East'),
(657, 'Oyo', 'Ibadan', 'Saki West'),
(658, 'Oyo', 'Ibadan', 'Surulere'),
(659, 'Plataeu', 'Jos', 'Bassa'),
(660, 'Plataeu', 'Jos', 'Bokkos'),
(661, 'Plataeu', 'Jos', 'Jos East'),
(662, 'Plataeu', 'Jos', 'Jos South'),
(663, 'Plataeu', 'Jos', 'Kanam'),
(664, 'Plataeu', 'Jos', 'Kanke'),
(665, 'Plataeu', 'Jos', 'Langtang North'),
(666, 'Plataeu', 'Jos', 'Langtang South'),
(667, 'Plataeu', 'Jos', 'Mangu'),
(668, 'Plataeu', 'Jos', 'Mikang'),
(669, 'Plataeu', 'Jos', 'Pankshin'),
(670, 'Plataeu', 'Jos', 'Qua\'an Pan'),
(671, 'Plataeu', 'Jos', 'Riyom'),
(672, 'Plataeu', 'Jos', 'Shendam'),
(673, 'Plataeu', 'Jos', 'Wase'),
(674, 'Rivers', 'Port Harcourt', 'Ahoada East'),
(675, 'Rivers', 'Port Harcourt', 'Ahoada West'),
(676, 'Rivers', 'Port Harcourt', 'Akuku Toru'),
(677, 'Rivers', 'Port Harcourt', 'Andoni'),
(678, 'Rivers', 'Port Harcourt', 'Asari-Toru'),
(679, 'Rivers', 'Port Harcourt', 'Bonny'),
(680, 'Rivers', 'Port Harcourt', 'Degema'),
(681, 'Rivers', 'Port Harcourt', 'Emohua'),
(682, 'Rivers', 'Port Harcourt', 'Eleme'),
(683, 'Rivers', 'Port Harcourt', 'Etche'),
(684, 'Rivers', 'Port Harcourt', 'Gokana'),
(685, 'Rivers', 'Port Harcourt', 'Ikwerre'),
(686, 'Rivers', 'Port Harcourt', 'Khana'),
(687, 'Rivers', 'Port Harcourt', 'Obia/Akpor'),
(688, 'Rivers', 'Port Harcourt', 'Ogba/Ebema/Ndoni'),
(689, 'Rivers', 'Port Harcourt', 'Ogu/Bolo'),
(690, 'Rivers', 'Port Harcourt', 'Okrika'),
(691, 'Rivers', 'Port Harcourt', 'Omumma'),
(692, 'Rivers', 'Port Harcourt', 'Opobo/Nkoro'),
(693, 'Rivers', 'Port Harcourt', 'Oyigbo'),
(694, 'Rivers', 'Port Harcourt', 'Port-Harcourt'),
(695, 'Rivers', 'Port Harcourt', 'Tai'),
(696, 'Sokoto', 'Sokoto', 'Bodinga'),
(697, 'Sokoto', 'Sokoto', 'Dange-Shnsi'),
(698, 'Sokoto', 'Sokoto', 'Gada'),
(699, 'Sokoto', 'Sokoto', 'Goronyo'),
(700, 'Sokoto', 'Sokoto', 'Gudu'),
(701, 'Sokoto', 'Sokoto', 'Gawabawa'),
(702, 'Sokoto', 'Sokoto', 'Illela'),
(703, 'Sokoto', 'Sokoto', 'Isa'),
(704, 'Sokoto', 'Sokoto', 'Kware'),
(705, 'Sokoto', 'Sokoto', 'Kebbe'),
(706, 'Sokoto', 'Sokoto', 'Rabah'),
(707, 'Sokoto', 'Sokoto', 'Sabon Birni'),
(708, 'Sokoto', 'Sokoto', 'Shagari'),
(709, 'Sokoto', 'Sokoto', 'Silame'),
(710, 'Sokoto', 'Sokoto', 'Sokoto North'),
(711, 'Sokoto', 'Sokoto', 'Sokoto South'),
(712, 'Sokoto', 'Sokoto', 'Tambuwal'),
(713, 'Sokoto', 'Sokoto', 'Tqngaza'),
(714, 'Sokoto', 'Sokoto', 'Tureta'),
(715, 'Sokoto', 'Sokoto', 'Wamako'),
(716, 'Sokoto', 'Sokoto', 'Wurno'),
(717, 'Sokoto', 'Sokoto', 'Yabo'),
(718, 'Taraba', 'Jalingo', 'Bali'),
(719, 'Taraba', 'Jalingo', 'Donga'),
(720, 'Taraba', 'Jalingo', 'Gashaka'),
(721, 'Taraba', 'Jalingo', 'Cassol'),
(722, 'Taraba', 'Jalingo', 'Ibi'),
(723, 'Taraba', 'Jalingo', 'Jalingo'),
(724, 'Taraba', 'Jalingo', 'Karin-Lamido'),
(725, 'Taraba', 'Jalingo', 'kurmi'),
(726, 'Taraba', 'Jalingo', 'Lau'),
(727, 'Taraba', 'Jalingo', 'Sardana'),
(728, 'Taraba', 'Jalingo', 'Ussa'),
(729, 'Taraba', 'Jalingo', 'Wukari'),
(730, 'Taraba', 'Jalingo', 'Yorro'),
(731, 'Taraba', 'Jalingo', 'Zing'),
(732, 'Yobe', 'Damaturu', 'Bursari'),
(733, 'Yobe', 'Damaturu', 'Damaturu'),
(734, 'Yobe', 'Damaturu', 'Fika'),
(735, 'Yobe', 'Damaturu', 'Fune'),
(736, 'Yobe', 'Damaturu', 'Geidam'),
(737, 'Yobe', 'Damaturu', 'Gujba'),
(738, 'Yobe', 'Damaturu', 'Gulani'),
(739, 'Yobe', 'Damaturu', 'Jakusko'),
(740, 'Yobe', 'Damaturu', 'Karasuwa'),
(741, 'Yobe', 'Damaturu', 'Karawa'),
(742, 'Yobe', 'Damaturu', 'Machina'),
(743, 'Yobe', 'Damaturu', 'Nangere'),
(744, 'Yobe', 'Damaturu', 'Nguru Potiskum'),
(745, 'Yobe', 'Damaturu', 'Tarmua'),
(746, 'Yobe', 'Damaturu', 'Yunusari'),
(747, 'Yobe', 'Damaturu', 'Yusufari'),
(748, 'Zamfara', 'Gusau', 'Bakura'),
(749, 'Zamfara', 'Gusau', 'Birnin Magaji'),
(750, 'Zamfara', 'Gusau', 'Bukkuyum'),
(751, 'Zamfara', 'Gusau', 'Bungudu'),
(752, 'Zamfara', 'Gusau', 'Gummi'),
(753, 'Zamfara', 'Gusau', 'Gusau'),
(754, 'Zamfara', 'Gusau', 'Kaura'),
(755, 'Zamfara', 'Gusau', 'Namoda'),
(756, 'Zamfara', 'Gusau', 'Maradun'),
(757, 'Zamfara', 'Gusau', 'Maru'),
(758, 'Zamfara', 'Gusau', 'Shinkafi'),
(759, 'Zamfara', 'Gusau', 'Talata Mafara'),
(760, 'Zamfara', 'Gusau', 'Tsafe'),
(761, 'Zamfara', 'Gusau', 'Zurmi'),
(763, 'Abia', 'Umuahia', 'Obingwa');

-- --------------------------------------------------------

--
-- Table structure for table `stock_products_sales`
--

CREATE TABLE `stock_products_sales` (
  `sn` int(10) NOT NULL,
  `ref_id` int(10) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `cost_price` int(15) DEFAULT NULL,
  `selling_price` int(15) DEFAULT NULL,
  `tot_cost` int(15) DEFAULT NULL,
  `tot_sales` int(15) DEFAULT NULL,
  `date_sold` varchar(32) DEFAULT NULL,
  `time_sold` varchar(32) DEFAULT NULL,
  `week_sold` int(2) DEFAULT NULL,
  `day_sold` int(2) DEFAULT NULL,
  `month_sold` int(2) DEFAULT NULL,
  `year_sold` int(4) DEFAULT NULL,
  `sold_by` varchar(100) DEFAULT NULL,
  `sold_to` varchar(100) DEFAULT NULL,
  `sold` enum('yes','no') DEFAULT 'no',
  `payment_status` enum('paid','unpaid') DEFAULT 'unpaid',
  `receipt_no` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stock_products_sales`
--

INSERT INTO `stock_products_sales` (`sn`, `ref_id`, `code`, `barcode`, `qty`, `cost_price`, `selling_price`, `tot_cost`, `tot_sales`, `date_sold`, `time_sold`, `week_sold`, `day_sold`, `month_sold`, `year_sold`, `sold_by`, `sold_to`, `sold`, `payment_status`, `receipt_no`, `status`) VALUES
(7, 2, '', '1123', 15, 70, 100, 1050, 1500, '2020-02-29', '06:21:07', 9, 0, 0, 0, 's6068', 'yekeen', 'yes', 'unpaid', 'LBRC0001', 'active'),
(9, 3, '', '1221', 1, 50, 70, 50, 70, '2020-02-29', '06:21:07', 9, 0, 0, 0, 's6068', 'yekeen', 'yes', 'unpaid', 'LBRC0001', 'active'),
(10, 3, '', '1221', 1, 50, 70, 50, 70, '2020-02-29', '14:39:24', 9, 0, 0, 0, 's6068', 'bayo', 'yes', 'unpaid', 'LBRC0002', 'active'),
(11, 2, '', '1123', 3, 70, 100, 210, 300, '2020-02-29', '14:39:24', 9, 0, 0, 0, 's6068', 'bayo', 'yes', 'unpaid', 'LBRC0002', 'active'),
(12, 1, '', '1234', 2, 100, 150, 200, 300, '2020-03-03', '10:45:33', 10, 0, 0, 0, 's6068', 's6068', 'yes', 'unpaid', 'LBRC0003', 'active'),
(13, 2, '', '1123', 1, 70, 100, 70, 100, NULL, NULL, NULL, NULL, NULL, NULL, 's6068', NULL, 'no', 'unpaid', NULL, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `stock_receipts`
--

CREATE TABLE `stock_receipts` (
  `sn` int(10) NOT NULL,
  `sold_to` varchar(100) NOT NULL,
  `sold_by` varchar(100) NOT NULL,
  `pay_type` varchar(50) DEFAULT NULL,
  `receipt_no` varchar(100) DEFAULT NULL,
  `total_fee` varchar(100) DEFAULT NULL,
  `amount_paid` varchar(100) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `refund` varchar(100) DEFAULT NULL,
  `consume` enum('yes','no') DEFAULT 'no',
  `payment_status` enum('paid','unpaid') DEFAULT 'unpaid',
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `week_c` int(2) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `stock_receipts`
--

INSERT INTO `stock_receipts` (`sn`, `sold_to`, `sold_by`, `pay_type`, `receipt_no`, `total_fee`, `amount_paid`, `balance`, `refund`, `consume`, `payment_status`, `date_c`, `time_c`, `week_c`, `status`) VALUES
(1, 'yekeen', 's6068', 'pharmacy', 'LBRC0001', '1570', '0', '1570', '0', 'no', 'unpaid', '2020-02-29', '06:21:07', 9, 'active'),
(2, 'bayo', 's6068', 'pharmacy', 'LBRC0002', '370', '0', '370', '0', 'no', 'unpaid', '2020-02-29', '14:39:23', 9, 'active'),
(3, 's6068', 's6068', 'pharmacy', 'LBRC0003', '300', '0', '300', '0', 'no', 'unpaid', '2020-03-03', '10:45:33', 10, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `sn` int(5) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `shortcut` varchar(100) DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `fa_icon` varchar(255) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `branch_address` text NOT NULL DEFAULT '<h1 class="mr-auto text-dark font-30 bold"><strong>Bloodlinks Haematological Centre</strong></h1> <p>&nbsp;<span style="font-size: 14pt;"> No 100, Off General Abdullahi Road, Fateh/Tanke Ilorin, Kwara State &nbsp; </span><br /><span style="font-size: 14pt;">(+234) 803 4088 965, (234) 706 9967 008, (234) 802 9005 206 &nbsp; &nbsp; </span><br /><span style="font-size: 14pt;">noeply@bloodlinks.ng , https://bloodlinks.ng&nbsp;</span></p>',
  `street` varchar(0) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logo2` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `url2` varchar(255) DEFAULT NULL,
  `header_image` varchar(255) DEFAULT NULL,
  `footer_image` varchar(2555) DEFAULT NULL,
  `signatory_image` varchar(255) DEFAULT NULL,
  `date_c` varchar(32) DEFAULT NULL,
  `year_c` int(4) DEFAULT NULL,
  `month_c` int(2) DEFAULT NULL,
  `c_by` varchar(100) DEFAULT NULL,
  `manager` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`sn`, `name`, `shortcut`, `theme`, `fa_icon`, `email`, `phone`, `address`, `branch_address`, `street`, `logo`, `logo2`, `url`, `url2`, `header_image`, `footer_image`, `signatory_image`, `date_c`, `year_c`, `month_c`, `c_by`, `manager`) VALUES
(1, 'Bloodlinks Haematological Ltd', 'BHL', 'Specialist Diagnostics Per Excellence ', 'fa fa-heart text-danger fa-2x', 'info@bloodlink.com', '08030000000', 'Ilorin, Fateh Road', '<h1 class=\"mr-auto text-dark font-30 bold\"><strong>Bloodlinks Haematological Centre</strong></h1> <p>&nbsp;<span style=\"font-size: 14pt;\"> No 100, Off General Abdullahi Road, Fateh/Tanke Ilorin, Kwara State &nbsp; </span><br /><span style=\"font-size: 14pt;\">(+234) 803 4088 965, (234) 706 9967 008, (234) 802 9005 206 &nbsp; &nbsp; </span><br /><span style=\"font-size: 14pt;\">noeply@bloodlinks.ng , https://bloodlinks.ng&nbsp;</span></p>', '', 'admin_logo_mini.jpg', 'admin_logo.png', 'assets/images/', '../assets/images/', 'bg-1403845742.png', 'bg-1185332677.png', 'bg-1210447790.jpg', '01-10-2022', 2022, 9, '', 'Dr. Taiwo.');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `sn` int(10) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `ticket_no` varchar(50) NOT NULL,
  `ticket_status` enum('untreated','processing','treated') DEFAULT 'untreated',
  `date_c` varchar(32) NOT NULL,
  `month_c` varchar(20) NOT NULL,
  `year_c` varchar(4) NOT NULL,
  `week_c` varchar(5) NOT NULL,
  `time_c` varchar(32) NOT NULL DEFAULT 'yes',
  `dest_user_id` varchar(100) DEFAULT NULL,
  `dest_role_id` varchar(100) DEFAULT NULL,
  `c_by` varchar(100) DEFAULT NULL,
  `c_role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`sn`, `ref_no`, `type`, `fullname`, `ticket_no`, `ticket_status`, `date_c`, `month_c`, `year_c`, `week_c`, `time_c`, `dest_user_id`, `dest_role_id`, `c_by`, `c_role`) VALUES
(1, '1124', 'host', 'Afolabi Michael Sunday', '1124_host_2018_10_01_916', 'processing', '2018-10-01', '10', '2018', '40', '1538366456', 'olusola', 'doctor', 's6068', 'sadmin'),
(2, '1005', 'wife', 'Akanbi Christianah Joy', '1005_Spouse_2018_10_01_218', 'processing', '2018-10-01', '10', '2018', '40', '1538368198', 'olusola', 'doctor', 's6068', 'sadmin'),
(3, '2290', 'host', 'Akinlolu John Sunday', '2290_host_2018_10_01_775', 'untreated', '2018-10-01', '10', '2018', '40', '1538381736', 'olusola', 'doctor', 's6068', 'sadmin'),
(4, '1124', 'host', 'Afolabi Michael Sunday', '1124_host_2018_10_02_148', 'untreated', '2018-10-02', '10', '2018', '40', '1538495033', 'olusola', 'doctor', 's6068', 'sadmin'),
(5, '1005', 'First Child', 'Akanbi Sharon', '1005_First_Child_2018_10_03_240', 'processing', '2018-10-03', '10', '2018', '40', '1538558913', 'olusola', 'doctor', 'amos', 'sadmin'),
(7, '1005', 'wife', 'Akanbi Christianah Joy', '1005_wife_2018_10_07_611', 'untreated', '2018-10-07', '10', '2018', '40', '1538922882', 'olusola', 'doctor', 's6068', 'sadmin'),
(8, '1005', 'wife', 'Akanbi Christianah Joy', '1005_wife_2018_10_07_687', 'untreated', '2018-10-07', '10', '2018', '40', '1538924178', 'olusola', 'doctor', 's6068', 'sadmin'),
(9, '1213', 'host', 'Abikoye Emmanuel Johnson', '1213_host_2018_11_06_465', 'untreated', '2018-11-06', '11', '2018', '45', '1541541926', 'france', 'doctor', 's6068', 'sadmin');

-- --------------------------------------------------------

--
-- Table structure for table `tickets_converse`
--

CREATE TABLE `tickets_converse` (
  `sn` int(10) NOT NULL,
  `ref_no` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `military_no` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `complaints` text NOT NULL,
  `diagnosis` text DEFAULT NULL,
  `treatment` text DEFAULT NULL,
  `receipt_no` varchar(100) DEFAULT NULL,
  `amount_paid` varchar(100) DEFAULT NULL,
  `date_vs` varchar(32) DEFAULT NULL,
  `time_vs` varchar(32) DEFAULT NULL,
  `month_vs` int(2) DEFAULT NULL,
  `day_vs` int(2) DEFAULT NULL,
  `week_vs` int(2) DEFAULT NULL,
  `year_vs` int(4) DEFAULT NULL,
  `date_c` varchar(32) NOT NULL,
  `month_c` varchar(20) NOT NULL,
  `year_c` varchar(4) NOT NULL,
  `week_c` varchar(5) NOT NULL,
  `time_c` varchar(32) NOT NULL DEFAULT 'yes',
  `from_user_id` varchar(100) DEFAULT NULL,
  `from_role_id` varchar(100) DEFAULT NULL,
  `dest_user_id` varchar(100) DEFAULT NULL,
  `dest_role_id` varchar(100) DEFAULT NULL,
  `rec_by` varchar(100) DEFAULT NULL,
  `report_type` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `upd_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tickets_converse`
--

INSERT INTO `tickets_converse` (`sn`, `ref_no`, `type`, `military_no`, `category`, `complaints`, `diagnosis`, `treatment`, `receipt_no`, `amount_paid`, `date_vs`, `time_vs`, `month_vs`, `day_vs`, `week_vs`, `year_vs`, `date_c`, `month_c`, `year_c`, `week_c`, `time_c`, `from_user_id`, `from_role_id`, `dest_user_id`, `dest_role_id`, `rec_by`, `report_type`, `content`, `upd_by`) VALUES
(1, '1169', 'host', '', 'NHIS', 'cannot sleep', 'fever', 'drugs', 'GNRC0001', '', '2018-11-13', '1542063600', 11, 13, 46, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(2, 'A009', 'host', '', 'Family', 'malara', 'p', 'drug and nj', 'GNRC0003', '', '2018-11-25', '1543100400', 11, 25, 47, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(3, 'O/12036', 'host', '', 'Individual', 'fever', 'malaria', 'drug -malaria drug', 'GNRC0005', '', '2018-12-09', '1544310000', 12, 9, 49, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(4, 'O/12039', 'host', '', 'Individual', 'nil', 'DM', 'OHAs', 'GNRC0012', '', '2018-12-20', '1545260400', 12, 20, 51, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(5, 'ANC 1764', 'host', '', 'Individual', 'Low abd pain \\nFever\\n', 'GESTATIONAL DM\\nMIP\\nPRETERM CONTRACTION\\n', 'TAB ACT\\nTAB NIFEDIPINE 1 DLY\\nTAB PCM II TDS 3/7\\nSC HUMULIN 25 i.u stat', 'GNRC0016', '', '2018-12-20', '1545260400', 12, 20, 51, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(6, '01780893', 'host', '', 'NHIS', 'Follow up', 'HTN', 'Antihypertensives', 'GNRC0017', '', '2018-12-20', '1545260400', 12, 20, 51, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(7, 'L/1029', 'host', '', 'Individual', 'CCF on follow up', 'CCF', 'Tab lasix 40mg dly 2/52\\ntab nifedipine 20mg b.d 2/52\\nTab aldactone 25mg dly 2/52\\nTab digoxin 0.125mg dly 2/52\\nTab atenolol 50mg dly 2/52\\nTab losartan 25mg dly 2/52', 'GNRC0023', '', '2018-12-20', '1545260400', 12, 20, 51, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(8, '03363195', 'Husband', '', 'NHIS', 'NIL', 'GOOD BP CONTROL', 'TAB LISINOPRIL 20 + HCT 25 DLY 2/52\\nTAB NIFEDIPINE 20 m.g dly 2/52\\nTAB VASOPRIM 75 m.g dly 2/52', 'GNRC0030', '', '2018-12-21', '1545346800', 12, 21, 51, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(9, 'ANC/1762', 'host', '', 'Individual', 'NIL', 'STABLE', 'HAEMATINICS', 'GNRC0036', '', '2018-12-21', '1545346800', 12, 21, 51, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(10, '03430715', 'host', '', 'NHIS', 'NIL', 'STABLE', 'HAEMATINICS', 'GNRC0037', '', '2018-12-21', '1545346800', 12, 21, 51, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(11, '01303280', 'Wife', '', 'NHIS', 'NIL', 'GOOD BP CONTROL', 'TAB ALDOMET 500m.g BD X 2/52\\nTAB NIFEDIPINE 20 BD X 2/52\\nTAB VASOPRIM 75 DLY X 2/52', 'GNRC0040', '', '2018-12-21', '1545346800', 12, 21, 51, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(12, 'o/11279', 'host', '', 'Individual', 'CESSATION OF MENSES', 'CYESIS', 'IM TT 0.5 MLS STA\\nHAEMATINICST', 'GNRC0039', '', '2018-12-21', '1545346800', 12, 21, 51, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(13, '01303379', 'host', '', 'NHIS', 'GBP', 'OPTIMAL BP CONTROL', 'IM DICLOFENAC 75 M.G STAT', 'GNRC0042', '', '2018-12-21', '1545346800', 12, 21, 51, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(14, '02215044', 'Wife', '', 'NHIS', 'HEADACHE\\nFEVER\\nLIGHTHEADEDNESS', 'MF', 'IM PALUTHER 160M.G STAT\\nIM DICLOFENAC 75 STAT\\nTAB ACT 1 BD X 3/7\\nTAB PCM 1G TDS X 3/7', 'GNRC0043', '', '2018-12-21', '1545346800', 12, 21, 51, 2018, '', '', '', '', 'yes', '', '', '', '', '', '', '', ''),
(15, '12995', 'First Child', '', 'Individual', '', '', '', '', '', '2019-04-01', '1554069600', 4, 1, 14, 2019, '2019-04-01', '04', '2019', '14', '1554120140', '', '', '', '', 'abake', 'complaints', '<p>complains of having malaria</p>', 'abake'),
(16, '12995', 'First Child', '', 'Individual', '', '', '', '', '', '2019-04-01', '1554069600', 4, 1, 14, 2019, '2019-04-01', '04', '2019', '14', '1554120244', '', '', '', '', 'abake', 'diagnosis', '<p>Cough, High temperature</p>', ''),
(17, '12995', 'First Child', '', 'Individual', '', '', '', '', '', '2019-04-01', '1554069600', 4, 1, 14, 2019, '2019-04-01', '04', '2019', '14', '1554120370', '', '', '', '', 'abake', 'treatment', '<p>Injection, and drugs</p>', ''),
(18, '12995', 'First Child', '', 'Individual', '', '', '', '', '', '2019-03-14', '1552518000', 3, 14, 11, 2019, '2019-04-01', '04', '2019', '14', '1554120396', '', '', '', '', 'abake', 'complaints', '<p>complains of having malaria</p>', ''),
(19, '009900', 'host', '', 'Individual', '', '', '', '', '', '2019-04-01', '1554069600', 4, 1, 14, 2019, '2019-04-01', '04', '2019', '14', '1554131979', '', '', '', '', 'adedapo88', 'complaints', '<p>report on treatment</p>', 'adedapo88'),
(20, 'AMC 007 A', 'host', '', 'Individual', '', '', '', '', '', '2019-04-02', '1554156000', 4, 2, 14, 2019, '2019-04-02', '04', '2019', '14', '1554207853', '', '', '', '', 'abake', 'complaints', '<p>HEAD ACHE&nbsp; AND PAINS</p>', 'abake'),
(21, '02667401(HMO-07)', 'Second Child', '', 'NHIS', '', '', '', '', '', '2019-04-23', '1555970400', 4, 23, 17, 2019, '2019-04-23', '04', '2019', '17', '1556017617', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report...malaria</p>', ''),
(22, 'HMO 013 017809030', 'First Child', '', 'NHIS', '', '', '', '', '', '2019-04-23', '1555970400', 4, 23, 17, 2019, '2019-04-23', '04', '2019', '17', '1556019398', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report... musculosketal pain</p>', ''),
(23, 'HMO 013 017809030', 'Second Child', '', 'NHIS', '', '', '', '', '', '2019-04-23', '1555970400', 4, 23, 17, 2019, '2019-04-23', '04', '2019', '17', '1556019643', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report... tinea carporis</p>', ''),
(24, 'O/11569', 'host', '', 'Individual', '', '', '', '', '', '2019-04-29', '1556488800', 4, 29, 18, 2019, '2019-04-29', '04', '2019', '18', '1556521529', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report...DM (Poor glycaemic control)</p>', ''),
(25, 'HMO 05 01137111', 'host', '', 'NHIS', '', '', '', '', '', '2019-04-29', '1556488800', 4, 29, 18, 2019, '2019-04-29', '04', '2019', '18', '1556522090', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report...DM AND URTI</p>', ''),
(26, '01302054', 'First Child', '', 'NHIS', '', '', '', '', '', '2019-04-29', '1556488800', 4, 29, 18, 2019, '2019-04-29', '04', '2019', '18', '1556523472', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report... RTA AND MALARIA</p>', ''),
(27, '01302054', 'Wife', '', 'NHIS', '', '', '', '', '', '2019-04-29', '1556488800', 4, 29, 18, 2019, '2019-04-29', '04', '2019', '18', '1556524941', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report...MALARIA</p>', ''),
(28, 'FC/220', 'First Child', '', 'Family', '', '', '', '', '', '2019-04-29', '1556488800', 4, 29, 18, 2019, '2019-04-29', '04', '2019', '18', '1556525534', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report...MUMPS</p>', ''),
(29, 'HMO 05 01303394', 'Wife', '', 'NHIS', '', '', '', '', '', '2019-04-29', '1556488800', 4, 29, 18, 2019, '2019-04-29', '04', '2019', '18', '1556529828', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report...GOOD BP CONTROL</p>', ''),
(30, 'HMO 05 01322904', 'Third child', '', 'NHIS', '', '', '', '', '', '2019-04-30', '1556575200', 4, 30, 18, 2019, '2019-04-30', '04', '2019', '18', '1556608137', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report... PHARYNGITIS</p>', ''),
(31, 'f/c AB 131', 'Second Child', '', 'Family', '', '', '', '', '', '2019-04-30', '1556575200', 4, 30, 18, 2019, '2019-04-30', '04', '2019', '18', '1556609739', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report... MUSCOLOSKETAL PAIN</p>', ''),
(32, 'HMO 04 02329930', 'First Child', '', 'NHIS', '', '', '', '', '', '2019-04-30', '1556575200', 4, 30, 18, 2019, '2019-04-30', '04', '2019', '18', '1556610041', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report... URTI</p>', ''),
(33, '03364767', 'Wife', '', 'NHIS', '', '', '', '', '', '2019-04-30', '1556575200', 4, 30, 18, 2019, '2019-04-30', '04', '2019', '18', '1556610102', '', '', '', '', 'drolaniyi', 'diagnosis', '<p>Report... MALARIA</p>', ''),
(34, 'f/c G003', 'host', '', 'Individual', '', '', '', '', '', '2019-05-02', '1556748000', 5, 2, 18, 2019, '2019-05-02', '05', '2019', '18', '1556781042', '', '', '', '', 'drolaniyi', 'complaints', '<p>Report...ABDOMINAL PAIN</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sn` int(10) NOT NULL,
  `user_id` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) DEFAULT NULL,
  `enc_psw` varchar(100) DEFAULT NULL,
  `hash_psw` varchar(255) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `midname` varchar(100) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `passport` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date_employ` date DEFAULT NULL,
  `img_dir` varchar(255) DEFAULT NULL,
  `acct_status` enum('inactive','active') DEFAULT 'active',
  `online` enum('on','off') DEFAULT 'off',
  `online_icon` varchar(100) DEFAULT 'fa fa-circle text-warning',
  `c_by` varchar(30) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `del_by` varchar(30) DEFAULT NULL,
  `date_del` date DEFAULT NULL,
  `time_del` time DEFAULT NULL,
  `pc_name` varchar(255) DEFAULT NULL,
  `pc_ip` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sn`, `user_id`, `password`, `enc_psw`, `hash_psw`, `surname`, `firstname`, `midname`, `fullname`, `gender`, `dob`, `email`, `phone`, `passport`, `address`, `date_employ`, `img_dir`, `acct_status`, `online`, `online_icon`, `c_by`, `date_c`, `time_c`, `del_by`, `date_del`, `time_del`, `pc_name`, `pc_ip`) VALUES
(9, 's6068', 'ojo', 'dfe75bd98c8d113650e101c33fe1a93c', '$2y$10$jNxJT.XEkWnFYqyTKd.wDeVdy28XS8LjX4FSr/FZixfAWilRKqRiW', 'Ojo', 'Isaac', 'Mayowa', 'Ojo Isaac Mayowa', 'male', '0000-00-00', 'mayorjo4ever@gmail.com', '07030577951', '', 'Tanke, Ilorin ', '0000-00-00', '', 'active', 'off', 'fa fa-circle text-warning', 's2583', '2018-02-03', '00:00:00', 's6068', '2020-01-10', '08:26:31', '192.168.0.100', '192.168.0.100'),
(20, 'accesschm001', 'accesschm001', '15560b05510c8cde1cda4644f0a7ff62', '$2y$10$LUU6MRprU63pM9VvbFcZHeqns5/das7MUO/lLC9FBHWOzZ9kkXVZe', 'Dr. Mba', 'Izuchukwu', 'Nnachi', 'Dr. Imba Izuchukwu Nnachi', 'male', '0000-00-00', '', '08039505256', NULL, 'Nile University of Nigeria ', '2022-09-17', NULL, 'inactive', 'off', 'fa fa-circle text-warning', 's6068', NULL, NULL, 's6068', '2024-09-28', '13:23:28', 'OJO-ISAAC-MAYOWA', '127.0.0.1'),
(21, 'taimobola', 'mrtaiwo267579', '$2y$10$6SOjLX1m.YQrH3yp295N/OrVzp8ss9QZW9NfnPI10SjOXzQ3uR7xS', '$2y$10$ySQ88sSI5.VW03yDtdydf.4zbZ4CRVlaD3eFORq9xtN7Rkkh14N3u', 'Ogunfemi ', 'Taiwo', '', 'Ogunfemi  Taiwo ', 'male', NULL, '', '08039583657', NULL, 'OFFICE', '2024-10-31', NULL, 'active', 'off', 'fa fa-circle text-warning', 's6068', NULL, NULL, NULL, NULL, NULL, '192.168.0.100', '192.168.0.100'),
(22, 'Shemmy0002', 'toro0002', '$2y$10$7gDVl6mGiOf31FXCQLlnOu.0//rnzWPti5vi2tw2KcoOk/2SaqK76', '$2y$10$P0CVkSJBY.SKpCOOIEFpM.F.dXGApKg1qAzjGhQBztqbUkRPWHmD6', 'Ogunniran', 'Mary', 'Adetoro', 'Ogunniran Mary Adetoro', 'female', NULL, '', '08167835261', NULL, 'Coppers lodge Muritalah post office', '2024-12-02', NULL, 'inactive', 'off', 'fa fa-circle text-warning', 's6068', NULL, NULL, 'S6068', '2026-02-09', '11:53:59', 'Bloodlinks-PC', '192.168.0.199'),
(23, 'Roqeebat', 'Adewumi22', '$2y$10$kr74MWdgiSx51edXGJzQhuzLIg4L0CGYtL72K1CI3G4pEJuTJeVqq', NULL, 'Abdulsalam', 'Roqeebat', 'Adewumi', 'Abdulsalam Roqeebat Adewumi', 'female', NULL, NULL, '09035018719', NULL, 'Ecwa Church Fate-Tanke Area', '2023-10-02', NULL, 'inactive', 'off', 'fa fa-circle text-warning', 's6068', NULL, NULL, 'taimobola', '2025-01-13', '13:17:17', NULL, NULL),
(24, 'dessyjay4', 'Smartchi@44', '$2y$10$BmDymWpWRQy3rHMSCZDxZOzpcuqlk3Ao/d5VoRFnMGkDL9rKrXKQG', NULL, 'John', 'Desmond', '', 'John Desmond ', 'male', NULL, '', '08166831174', NULL, '', '2022-06-13', NULL, 'inactive', 'off', 'fa fa-circle text-warning', 's6068', NULL, NULL, 'S6068', '2026-02-09', '11:53:48', NULL, NULL),
(25, 'Tianah', 'Tianah2003', '$2y$10$iLq43DcYU6u0zu7sdexi2.4ZmEIr1DGdFLvy5l2qAncA3q4M8Zq2u', '$2y$10$pEa.fxdLe0MQ.zjIjv2g5ORqO.9C7qalSdE0nRRosBHYuxll2jCY2', 'Asamu', 'Christianah', 'Mayowa', 'Asamu Christianah Mayowa', 'female', NULL, '', '09010751345', NULL, 'Tanke', '2024-11-18', NULL, 'inactive', 'off', 'fa fa-circle text-warning', 's6068', NULL, NULL, 'S6068', '2026-02-09', '11:54:10', 'Bloodlinks-PC', '192.168.0.199'),
(26, 'dessyjay4', 'desmond2026', '$2y$10$ofob/4Uvyr1hef2m7WdW2OnefhGxjJzNHt3lpZtIAuum/xgl081nO', NULL, 'John', 'Desmond', '', 'JOHN DESMOND ', 'male', NULL, '', '08166831174', NULL, '', '0000-00-00', NULL, 'inactive', 'off', 'fa fa-circle text-warning', 'S6068', NULL, NULL, 'Taimobola', '2026-02-09', '11:59:29', NULL, NULL),
(27, 'dessyjay4', 'desmond2026', '$2y$10$XxvPt6a2bDR7D/LjYZeqT.q7ByV00T2/6.gM7hkBay9XHZZF34LBW', NULL, 'JOHN', 'DESMOND', '', 'JOHN DESMOND ', 'male', NULL, NULL, '08166831174', NULL, '', '2023-02-09', NULL, 'active', 'off', 'fa fa-circle text-warning', 'Taimobola', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'desmondjohn', 'desmondjohn', '$2y$10$TDgDxoW9f0iuiULsH4QfJuiEzNIXSkvXa7kQdUVOLAg54HuOSyENK', '$2y$10$NgNfj1XkLNrQOj49Gj9tL.TIAUSivjYFkvHmCeVdrNote5f/yUZZy', 'john', 'desmond', 'desmond', 'john desmond desmond', 'male', NULL, '', '07034921617', NULL, '', '2020-02-09', NULL, 'active', 'on', 'fa fa-circle text-success', 'Taimobola', NULL, NULL, NULL, NULL, NULL, 'Bloodlinks-PC', '192.168.0.199');

-- --------------------------------------------------------

--
-- Table structure for table `userslogs`
--

CREATE TABLE `userslogs` (
  `sn` int(20) NOT NULL,
  `user_id` varchar(30) NOT NULL DEFAULT '',
  `logtime` varchar(60) DEFAULT NULL,
  `logdate` varchar(60) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `pc_name` varchar(200) DEFAULT NULL,
  `pc_ip` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vital_science`
--

CREATE TABLE `vital_science` (
  `sn` int(10) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `fullname` varchar(200) DEFAULT NULL,
  `weight` varchar(15) DEFAULT NULL,
  `bp` varchar(20) DEFAULT 'active',
  `height` varchar(15) DEFAULT NULL,
  `temp` varchar(20) NOT NULL,
  `date_c` varchar(32) DEFAULT NULL,
  `time_c` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `vital_science`
--

INSERT INTO `vital_science` (`sn`, `ref_no`, `type`, `fullname`, `weight`, `bp`, `height`, `temp`, `date_c`, `time_c`) VALUES
(1, '1169', 'host', 'Ojo Isaac Mayowa', '345', '09', '45', '', '2018-11-16', '1542357180'),
(2, '1169', 'host', 'Ojo Isaac Mayowa', '80 KG', '70 : 110', '75 M', '', '2018-11-16', '1542361968'),
(3, 'A009', 'host', 'AKANBI ADESHOLA AMOS', '65', '100:120', '6.9', '', '2018-11-24', '1543026254'),
(4, 'A009', 'host', 'AKANBI ADESHOLA AMOS', '68', '100;120', '50', '', '2018-11-25', '1543164555'),
(5, 'O/1435', 'host', 'OMOLADE COMFORT O', '60', '100/70', '1.6', '', '2018-12-09', '1544333737'),
(6, 'FCW0001', 'host', 'WAHAB AMINAT ', '55kg', '100/60mmttg', '1.65m', '', '2018-12-13', '1544736776'),
(7, '12995', 'First Child', 'Olagoke Ibunkun ', '60', '90/120', '1.69M', '', '2019-04-01', '1554120532'),
(8, 'J/790', 'host', 'Jayesimi Adebisi ', '66', '78.67', '70', '', '2019-04-01', '1554122546'),
(9, '1169', 'Wife', 'Ojo Oluwadamilola Taiwo', '77', '99', '54', '', '2019-04-01', '1554122909'),
(10, 'A/15071', 'host', 'Adebiyi Jesutofunmi ', '34', '55', '55', '77', '2019-04-01', '1554122958'),
(11, '02680514', 'host', 'Alimi Ibraheem ', '15', '00/00', '0.05m', '37.3', '2019-04-02', '1554199072'),
(12, '02667401(HMO-07)', 'NHIS [ <b>Second Child</b> ]', 'Famojuro Daniel ', '30', '90/50', '50', '38', '2019-04-23', '1556017114'),
(13, 'O/12105', 'host', 'Olawale Oladayo ', '45kg', '110/90mmhg', '1.73m', '36.5oC', '2019-08-05', '1564999234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`sn`,`staff_id`,`bank_id`);

--
-- Indexes for table `admin_report_setup`
--
ALTER TABLE `admin_report_setup`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `basic_salary`
--
ALTER TABLE `basic_salary`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `bill_category`
--
ALTER TABLE `bill_category`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `bill_types`
--
ALTER TABLE `bill_types`
  ADD PRIMARY KEY (`sn`,`categ_id`,`dept_id`);

--
-- Indexes for table `blood_donation_test_result`
--
ALTER TABLE `blood_donation_test_result`
  ADD PRIMARY KEY (`id`,`customer_id`,`ticket_no`,`custom_ticket_id`);

--
-- Indexes for table `blood_stocks`
--
ALTER TABLE `blood_stocks`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `conversation_type`
--
ALTER TABLE `conversation_type`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`sn`,`id`);

--
-- Indexes for table `customer_payment_reversion`
--
ALTER TABLE `customer_payment_reversion`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `customer_specimen`
--
ALTER TABLE `customer_specimen`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `customer_specimen_result`
--
ALTER TABLE `customer_specimen_result`
  ADD PRIMARY KEY (`sn`,`ticket_no`,`bill_type_id`,`template_id`);

--
-- Indexes for table `customer_tickets`
--
ALTER TABLE `customer_tickets`
  ADD PRIMARY KEY (`sn`,`customer_id`);

--
-- Indexes for table `customer_ticket_reversion`
--
ALTER TABLE `customer_ticket_reversion`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `donors_remarks`
--
ALTER TABLE `donors_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `hospital_invoice`
--
ALTER TABLE `hospital_invoice`
  ADD PRIMARY KEY (`sn`,`ticket_no`);

--
-- Indexes for table `hospital_invoice_report`
--
ALTER TABLE `hospital_invoice_report`
  ADD PRIMARY KEY (`sn`,`hosp_id`,`invoice_no`,`acct_id`);

--
-- Indexes for table `labtest_reports`
--
ALTER TABLE `labtest_reports`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `myroles`
--
ALTER TABLE `myroles`
  ADD PRIMARY KEY (`sn`,`user_id`,`role_id`);

--
-- Indexes for table `pagegroups`
--
ALTER TABLE `pagegroups`
  ADD PRIMARY KEY (`sn`,`groupid`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`sn`,`url`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `patients_copy`
--
ALTER TABLE `patients_copy`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `patients_siblings`
--
ALTER TABLE `patients_siblings`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `patient_category`
--
ALTER TABLE `patient_category`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `payment_log`
--
ALTER TABLE `payment_log`
  ADD PRIMARY KEY (`sn`,`ticket_no`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `pending_bills`
--
ALTER TABLE `pending_bills`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `pharm_products`
--
ALTER TABLE `pharm_products`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `priviledges`
--
ALTER TABLE `priviledges`
  ADD PRIMARY KEY (`sn`,`role_id`,`url`);

--
-- Indexes for table `recipients`
--
ALTER TABLE `recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`sn`,`id`);

--
-- Indexes for table `salary_allowance_bodies`
--
ALTER TABLE `salary_allowance_bodies`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `salary_debit_bodies`
--
ALTER TABLE `salary_debit_bodies`
  ADD PRIMARY KEY (`sn`,`body_name`,`paym_type`);

--
-- Indexes for table `sibling_type`
--
ALTER TABLE `sibling_type`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `specialist_report`
--
ALTER TABLE `specialist_report`
  ADD PRIMARY KEY (`sn`,`ticket_no`,`customer_id`,`bill_type_id`);

--
-- Indexes for table `specimen_result_template`
--
ALTER TABLE `specimen_result_template`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staff_allowance`
--
ALTER TABLE `staff_allowance`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staff_allowance_payment`
--
ALTER TABLE `staff_allowance_payment`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staff_deductions`
--
ALTER TABLE `staff_deductions`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staff_deductions_payment`
--
ALTER TABLE `staff_deductions_payment`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staff_salary_report`
--
ALTER TABLE `staff_salary_report`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `s/n` (`sn`);

--
-- Indexes for table `stock_products_sales`
--
ALTER TABLE `stock_products_sales`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `stock_receipts`
--
ALTER TABLE `stock_receipts`
  ADD PRIMARY KEY (`sn`,`sold_to`,`sold_by`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`sn`,`ref_no`,`type`,`ticket_no`);

--
-- Indexes for table `tickets_converse`
--
ALTER TABLE `tickets_converse`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sn`,`user_id`);

--
-- Indexes for table `userslogs`
--
ALTER TABLE `userslogs`
  ADD PRIMARY KEY (`sn`,`user_id`);

--
-- Indexes for table `vital_science`
--
ALTER TABLE `vital_science`
  ADD PRIMARY KEY (`sn`,`ref_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_report_setup`
--
ALTER TABLE `admin_report_setup`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `basic_salary`
--
ALTER TABLE `basic_salary`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill_category`
--
ALTER TABLE `bill_category`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bill_types`
--
ALTER TABLE `bill_types`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `blood_donation_test_result`
--
ALTER TABLE `blood_donation_test_result`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blood_stocks`
--
ALTER TABLE `blood_stocks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blood_test_categories`
--
ALTER TABLE `blood_test_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blood_test_questions`
--
ALTER TABLE `blood_test_questions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blood_types`
--
ALTER TABLE `blood_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `conversation_type`
--
ALTER TABLE `conversation_type`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_info`
--
ALTER TABLE `customer_info`
  MODIFY `sn` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=763;

--
-- AUTO_INCREMENT for table `customer_payment_reversion`
--
ALTER TABLE `customer_payment_reversion`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_specimen`
--
ALTER TABLE `customer_specimen`
  MODIFY `sn` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `customer_specimen_result`
--
ALTER TABLE `customer_specimen_result`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `customer_tickets`
--
ALTER TABLE `customer_tickets`
  MODIFY `sn` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `customer_ticket_reversion`
--
ALTER TABLE `customer_ticket_reversion`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donors_remarks`
--
ALTER TABLE `donors_remarks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hospital_invoice`
--
ALTER TABLE `hospital_invoice`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital_invoice_report`
--
ALTER TABLE `hospital_invoice_report`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labtest_reports`
--
ALTER TABLE `labtest_reports`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `myroles`
--
ALTER TABLE `myroles`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pagegroups`
--
ALTER TABLE `pagegroups`
  MODIFY `sn` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `sn` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients_copy`
--
ALTER TABLE `patients_copy`
  MODIFY `sn` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients_siblings`
--
ALTER TABLE `patients_siblings`
  MODIFY `sn` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_category`
--
ALTER TABLE `patient_category`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_log`
--
ALTER TABLE `payment_log`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_bills`
--
ALTER TABLE `pending_bills`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pharm_products`
--
ALTER TABLE `pharm_products`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `priviledges`
--
ALTER TABLE `priviledges`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `recipients`
--
ALTER TABLE `recipients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salary_allowance_bodies`
--
ALTER TABLE `salary_allowance_bodies`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salary_debit_bodies`
--
ALTER TABLE `salary_debit_bodies`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sibling_type`
--
ALTER TABLE `sibling_type`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `specialist_report`
--
ALTER TABLE `specialist_report`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specimen_result_template`
--
ALTER TABLE `specimen_result_template`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=719;

--
-- AUTO_INCREMENT for table `staff_allowance`
--
ALTER TABLE `staff_allowance`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff_allowance_payment`
--
ALTER TABLE `staff_allowance_payment`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_deductions`
--
ALTER TABLE `staff_deductions`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff_deductions_payment`
--
ALTER TABLE `staff_deductions_payment`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `staff_salary_report`
--
ALTER TABLE `staff_salary_report`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=765;

--
-- AUTO_INCREMENT for table `stock_products_sales`
--
ALTER TABLE `stock_products_sales`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stock_receipts`
--
ALTER TABLE `stock_receipts`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tickets_converse`
--
ALTER TABLE `tickets_converse`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `userslogs`
--
ALTER TABLE `userslogs`
  MODIFY `sn` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vital_science`
--
ALTER TABLE `vital_science`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
