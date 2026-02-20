-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2024 at 07:53 PM
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
  `date_c` date DEFAULT NULL,
  `time_c` time DEFAULT NULL,
  `upd_by` varchar(50) DEFAULT NULL,
  `date_upd` date DEFAULT NULL,
  `time_upd` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bill_types`
--

INSERT INTO `bill_types` (`sn`, `name`, `categ_id`, `dept_id`, `specimen_sample`, `estm_time`, `estm_time_type`, `price`, `status`, `del_by`, `date_del`, `time_del`, `c_by`, `date_c`, `time_c`, `upd_by`, `date_upd`, `time_upd`) VALUES
(1, 'Helicobacter pylori antigen', '1', '1', 'stool', 2, '2', '5000', 'active', 's6068', '2019-11-28', '18:04:23', '', '0000-00-00', '00:00:00', 's6068', '2019-11-29', '09:13:09'),
(2, 'Endocervical Swab', '1', '1', 'Cervical swab', 24, '2', '3500', 'inactive', '3571', '2021-04-06', '09:49:03', 's6068', '2019-11-28', '13:39:51', 'yekeen', '2020-02-15', '15:39:48'),
(3, 'HIV Screening', '1', '1', 'Blood', 1, '2', '1000', 'active', 's6068', '2019-11-28', '18:10:12', 's6068', '2019-11-28', '14:02:26', 'Bolaji', '2020-04-27', '16:59:42'),
(4, 'Urine Microscopy', '2', '1', 'Urine', 24, '2', '3000', 'active', 's6068', '2019-12-21', '05:34:04', 's6068', '2019-11-28', '18:55:43', 's6068', '2022-09-17', '13:31:40'),
(5, 'D-Dimer', '9', '1', 'Blood', 2, '2', '6000', 'active', '', '', '', 's6068', '2019-11-29', '09:37:29', 'Bolaji', '2020-06-13', '12:44:01'),
(6, 'FBS', '4', '1', 'Blood', 1, '2', '500', 'active', '', '', '', 's6068', '2019-12-13', '15:38:29', '3571', '2020-05-02', '14:25:27'),
(7, 'Liver Profile', '4', '1', 'Blood', 8, '2', '4000', 'active', '', '', '', 's6068', '2019-12-17', '14:33:20', 's6068', '2020-01-21', '18:23:27'),
(8, 'Electrolyte / Urea / Creatinine', '4', '1', 'Blood', 2, '2', '3000', 'inactive', '3571', '2021-04-27', '09:02:12', 's6068', '2019-12-17', '14:34:39', '3571', '2020-05-02', '14:26:12'),
(9, 'Urine microalbumin', '4', '1', '2 ml serum', 24, '2', '3000', 'inactive', '3571', '2020-05-09', '13:04:05', 's6068', '2019-12-17', '14:38:49', '', '0000-00-00', '00:00:00'),
(10, 'Fasting Lipid Profile', '4', '1', 'Blood', 6, '2', '4500', 'active', '', '', '', 's6068', '2019-12-17', '14:43:08', '3571', '2020-05-01', '12:16:51'),
(11, 'Uric Acid', '4', '1', 'Blood', 6, '2', '1000', 'active', '', '', '', 's6068', '2019-12-17', '14:43:34', '3571', '2020-05-02', '14:27:52'),
(12, 'Serum Amylase', '4', '1', 'Blood', 72, '2', '6000', 'active', '', '', '', 's6068', '2019-12-17', '14:44:32', 'HRM/ST/007', '2021-05-18', '18:45:23'),
(13, 'Urinalysis', '4', '1', 'Urine', 1, '2', '500', 'active', '', '', '', 's6068', '2019-12-17', '14:47:30', '3571', '2020-05-02', '14:33:18'),
(14, 'HBA1C', '4', '1', 'Blood', 1, '2', '4000', 'active', '', '', '', 's6068', '2019-12-17', '14:49:09', '3571', '2020-05-02', '14:40:21'),
(15, 'MP', '2', '1', 'Blood', 30, '1', '1000', 'active', '', '', '', 's6068', '2019-12-17', '14:58:09', '3571', '2020-04-20', '14:34:33'),
(16, 'Semen fluid analysis', '2', '1', 'Semen', 24, '2', '2000', 'inactive', 's6068', '2020-01-25', '08:33:09', 's6068', '2019-12-17', '14:59:10', '', '0000-00-00', '00:00:00'),
(17, 'Microscopy / Culture / Sensitivity', '2', '1', 'As Appropriate', 48, '2', '3000', 'active', '', '', '', 's6068', '2019-12-17', '15:00:51', '', '0000-00-00', '00:00:00'),
(18, 'Fungi Studies', '2', '1', 'As Appropriate', 2, '4', '5000', 'active', '', '', '', 's6068', '2019-12-17', '15:01:44', '', '0000-00-00', '00:00:00'),
(19, 'Calcium & Phosphate (Child)', '4', '1', 'Blood', 2, '2', '2000', 'active', '', '', '', 's6068', '2019-12-17', '15:06:20', 'Bolaji', '2022-06-03', '16:36:41'),
(20, 'Faecal occult blood', '4', '1', 'stool', 1, '2', '1000', 'active', '', '', '', 's6068', '2019-12-17', '15:07:07', '', '0000-00-00', '00:00:00'),
(21, 'Urinary electrolyte', '4', '1', 'Urine', 1, '2', '2000', 'active', '', '', '', 's6068', '2019-12-17', '15:08:00', 'Bolaji', '2020-12-19', '10:08:27'),
(22, 'Oestradiol', '7', '1', 'Blood', 48, '2', '3500', 'active', '', '', '', 's6068', '2019-12-17', '15:12:47', 'Bolaji', '2020-05-20', '11:57:46'),
(23, 'Testoterone', '7', '1', 'Blood', 48, '2', '3500', 'active', '', '', '', 's6068', '2019-12-17', '15:13:05', '3571', '2020-05-28', '15:54:08'),
(24, 'Progesterone', '7', '1', 'Blood', 48, '2', '3500', 'active', '', '', '', 's6068', '2019-12-17', '15:13:25', '3571', '2020-05-25', '15:15:50'),
(25, 'Pregnancy Test', '7', '1', '2ml serum', 15, '1', '500', 'active', '', '', '', 's6068', '2019-12-17', '15:14:25', '', '0000-00-00', '00:00:00'),
(26, 'B-HCG (Quantitative)', '7', '1', '2ml serum', 48, '2', '4000', 'inactive', '3571', '2020-05-09', '11:35:28', 's6068', '2019-12-17', '15:15:42', '', '0000-00-00', '00:00:00'),
(27, 'Prolactin', '7', '1', 'Blood', 48, '2', '3000', 'active', '', '', '', 's6068', '2019-12-17', '15:16:14', '3571', '2020-04-27', '10:57:26'),
(28, 'FSH', '7', '1', 'Blood', 48, '2', '3000', 'active', '', '', '', 's6068', '2019-12-17', '15:16:27', '3571', '2022-01-24', '10:17:09'),
(29, 'LH', '7', '1', 'Blood', 48, '2', '3000', 'active', '', '', '', 's6068', '2019-12-17', '15:16:42', '3571', '2022-01-24', '10:17:20'),
(30, 'TSH', '8', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', 's6068', '2019-12-17', '15:17:32', '3571', '2020-05-02', '14:31:19'),
(31, 'TT3', '8', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', 's6068', '2019-12-17', '15:17:53', '3571', '2020-05-02', '14:31:04'),
(32, 'TT4', '8', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', 's6068', '2019-12-17', '15:18:02', '3571', '2020-05-02', '14:30:49'),
(33, 'Parathyroid Hormone', '8', '1', '2ml serum', 96, '2', '15000', 'inactive', '3571', '2020-04-15', '13:02:57', 's6068', '2019-12-17', '15:19:01', '', '0000-00-00', '00:00:00'),
(34, 'Full Blood Count (Male)', '3', '1', 'Blood', 1, '2', '2000', 'active', '', '', '', 's6068', '2019-12-17', '15:20:45', 'Bolaji', '2020-04-24', '15:13:51'),
(35, 'Peripheral blood film', '3', '1', 'Blood', 24, '2', '2000', 'inactive', '3571', '2020-05-30', '12:44:09', 's6068', '2019-12-17', '15:21:20', 'Bolaji', '2020-04-24', '15:14:21'),
(36, 'Blood group', '3', '1', 'Blood', 1, '2', '500', 'active', '', '', '', 's6068', '2019-12-17', '15:21:54', '3571', '2020-05-02', '14:30:07'),
(37, 'Haemoglobin Genotype', '3', '1', 'Blood', 6, '2', '1000', 'active', '', '', '', 's6068', '2019-12-17', '15:22:25', '3571', '2020-04-27', '11:04:17'),
(38, 'ESR (Female)', '3', '1', 'Blood', 2, '2', '1000', 'active', '', '', '', 's6068', '2019-12-17', '15:23:16', '3571', '2020-04-27', '11:07:52'),
(39, 'Activated Partial Thromboplastin Time', '3', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', 's6068', '2019-12-17', '15:24:58', '3571', '2022-03-08', '10:42:42'),
(40, 'Prothrombin Time ', '3', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', 's6068', '2019-12-17', '15:25:42', 'HRM/ST/007', '2022-02-22', '17:27:38'),
(41, 'Treponemia  palladium screening (Syphilis)', '1', '1', 'Blood', 1, '2', '1000', 'active', '', '', '', 's6068', '2019-12-20', '21:18:47', '3571', '2020-05-02', '14:34:05'),
(42, 'Hepatitis B DNA Load', '11', '1', 'Blood', 2, '4', '20000', 'active', '', '', '', 's6068', '2020-01-18', '12:46:48', 'Bolaji', '2022-01-03', '17:48:31'),
(43, 'HBC- IgM', '11', '1', 'Blood', 2, '4', '12000', 'active', '', '', '', 's6068', '2020-01-21', '13:46:27', 'Bolaji', '2020-11-25', '18:04:52'),
(44, 'HBsAg Quantification', '11', '1', 'Blood', 1, '4', '10000', 'active', '', '', '', 's6068', '2020-01-21', '14:02:19', 'Bolaji', '2020-07-08', '12:29:52'),
(45, 'HBV Profile', '11', '1', 'Blood', 1, '2', '4000', 'active', '', '', '', 's6068', '2020-01-21', '14:18:49', 's6068', '2020-01-21', '18:10:46'),
(46, 'Salmonella Antibody Test (Rapid Diagnostic Test)', '2', '1', 'Blood', 6, '2', '1000', 'active', '', '', '', 's6068', '2020-01-21', '14:34:15', 'Bolaji', '2020-05-20', '15:04:49'),
(47, 'Semen Analysis + M/C/S', '2', '1', 'Semen', 48, '2', '4500', 'inactive', 'Bolaji', '2020-09-05', '18:59:33', 's6068', '2020-01-21', '16:56:18', 's6068', '2020-01-21', '17:30:56'),
(48, 'Semen Analysis', '2', '1', 'Semen', 24, '2', '5000', 'active', '', '', '', 's6068', '2020-01-21', '16:56:53', 'Bolaji', '2021-01-06', '11:12:53'),
(49, 'H. Pylori Antigen detection', '2', '1', 'Stool', 24, '2', '5000', 'active', '', '', '', 's6068', '2020-01-21', '16:58:31', 's6068', '2022-08-23', '05:15:49'),
(50, 'HBsAg, Anti-HCV (RDT)', '2', '1', 'Blood', 1, '2', '2000', 'active', '', '', '', 's6068', '2020-01-21', '16:59:59', '3571', '2020-05-21', '10:35:24'),
(51, 'Progesterone (Luteal)', '4', '1', 'Blood', 24, '2', '3500', 'active', '', '', '', 's6068', '2020-01-21', '18:30:45', '3571', '2020-06-27', '11:45:24'),
(52, 'Serum Pregnancy Test(RDT)', '4', '1', 'Blood', 1, '2', '500', 'active', '', '', '', 's6068', '2020-01-21', '18:36:03', '', '0000-00-00', '00:00:00'),
(53, 'Alpha Fetoprotein', '4', '1', 'Blood', 1, '2', '5000', 'active', '', '', '', 's6068', '2020-01-21', '18:42:09', 'Bolaji', '2020-07-08', '12:34:12'),
(54, 'PSA', '4', '1', 'Blood', 1, '2', '4000', 'active', '3571', '2020-04-17', '15:59:00', 's6068', '2020-01-21', '18:43:11', '3571', '2022-06-24', '12:26:55'),
(55, 'Bilirubin (Total and Direct)', '4', '1', 'Blood', 2, '2', '1500', 'active', '', '', '', 's6068', '2020-01-21', '19:12:34', '', '0000-00-00', '00:00:00'),
(56, 'TSH, TT3 and TT4', '4', '1', 'Blood', 24, '2', '9000', 'active', '', '', '', 's6068', '2020-01-22', '10:32:52', '', '0000-00-00', '00:00:00'),
(57, 'TSH, fT3 and fT4', '4', '1', 'Blood', 24, '2', '9000', 'active', '', '', '', 's6068', '2020-01-22', '10:33:59', '', '0000-00-00', '00:00:00'),
(58, 'Hormonal profile', '4', '1', 'Blood', 2, '4', '12500', 'active', '', '', '', 's6068', '2020-01-22', '10:36:13', '', '0000-00-00', '00:00:00'),
(59, 'Sodium, Potassium, Calcium, and Phosphate', '4', '1', 'Blood', 6, '2', '4000', 'active', '', '', '', 's6068', '2020-01-22', '10:38:00', 'Bolaji', '2020-06-11', '15:05:59'),
(60, 'Renal profile (Children)', '4', '1', 'Blood', 6, '2', '3000', 'active', '', '', '', 's6068', '2020-01-22', '10:39:17', 's6068', '2020-01-22', '10:53:45'),
(61, 'Renal profile (Adult)', '4', '1', 'Blood', 6, '2', '3000', 'active', '', '', '', 's6068', '2020-01-22', '10:40:47', '', '0000-00-00', '00:00:00'),
(62, 'Renal profile, Calcium, Phosphate and Albumin', '4', '1', 'Blood', 8, '2', '6000', 'active', '', '', '', 's6068', '2020-01-22', '10:43:34', '', '0000-00-00', '00:00:00'),
(63, 'Hormonal Profile (Complete)', '4', '1', 'Blood', 2, '4', '19500', 'active', '', '', '', 's6068', '2020-01-22', '10:47:31', '', '0000-00-00', '00:00:00'),
(64, 'Renal profile, Urate, Phospate and Calcium', '4', '1', 'Blood', 8, '2', '6000', 'active', '', '', '', 's6068', '2020-01-22', '10:52:15', '3571', '2020-05-28', '18:58:16'),
(65, 'PCV (Children)', '3', '1', 'Blood', 1, '2', '500', 'active', '', '', '', 's6068', '2020-01-22', '12:29:39', '3571', '2020-05-02', '14:29:22'),
(66, 'PCV (Female)', '3', '1', 'Blood', 1, '2', '500', 'active', '', '', '', 's6068', '2020-01-22', '12:30:57', '', '0000-00-00', '00:00:00'),
(67, 'PCV (Male)', '3', '1', 'Blood', 1, '2', '500', 'active', '', '', '', 's6068', '2020-01-22', '12:31:28', '', '0000-00-00', '00:00:00'),
(68, 'ESR (Male)', '3', '1', 'Blood', 2, '2', '1000', 'active', '', '', '', 's6068', '2020-01-25', '08:46:27', '', '0000-00-00', '00:00:00'),
(69, 'Full Blood Count (F)', '3', '1', 'Blood', 2, '2', '2000', 'active', '', '', '', 's6068', '2020-01-25', '08:53:46', '3571', '2020-04-27', '11:02:08'),
(70, 'Stool Microscopy', '2', '1', 'Stool', 24, '2', '1000', 'active', '', '', '', 's6068', '2020-01-25', '10:11:13', '', '0000-00-00', '00:00:00'),
(71, 'Culture', '2', '1', 'As appropriate', 3, '3', '3000', 'active', '', '', '', 's6068', '2020-01-25', '10:15:56', 'Bolaji', '2022-04-06', '19:14:24'),
(72, 'Stool Microscopy Culture and Sensitivity', '2', '1', 'Stool', 2, '3', '3000', 'active', '', '', '', 'yekeen', '2020-02-01', '19:59:35', '', '0000-00-00', '00:00:00'),
(73, 'Malaria Parasite (Microscopy)', '2', '1', 'Blood', 6, '2', '1000', 'active', '', '', '', '3571', '2020-04-04', '15:24:59', '', '0000-00-00', '00:00:00'),
(74, 'FBC +ESR (Male)', '3', '1', 'Blood', 3, '2', '3000', 'inactive', 'Bolaji', '2021-03-12', '12:37:08', '3571', '2020-04-14', '15:15:23', '', '0000-00-00', '00:00:00'),
(75, 'FT3', '8', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', '3571', '2020-04-15', '13:01:58', '', '0000-00-00', '00:00:00'),
(76, 'FT4', '8', '1', 'Blood', 24, '2', '3000', 'active', '', '', '', '3571', '2020-04-15', '13:02:19', '', '0000-00-00', '00:00:00'),
(77, 'PSA', '10', '1', 'Blood', 4, '2', '4000', 'active', '', '', '', '3571', '2020-04-15', '13:25:12', 'Bolaji', '2020-08-15', '12:00:25'),
(78, 'Carcino-embryonic antigen (CEA)', '10', '1', 'Blood', 4, '2', '6000', 'active', '', '', '', '3571', '2020-04-15', '13:26:41', '', '0000-00-00', '00:00:00'),
(79, 'AFP', '10', '1', 'Blood', 2, '2', '5000', 'active', '', '', '', '3571', '2020-04-15', '13:31:49', 'Bolaji', '2020-07-08', '12:33:04'),
(80, 'Cardiac Troponin I', '9', '1', 'Blood', 2, '2', '4500', 'active', '', '', '', '3571', '2020-04-15', '15:14:51', 'Bolaji', '2020-07-07', '13:20:02'),
(81, 'HVS M/C/S', '2', '1', 'HVS', 3, '3', '3500', 'inactive', '3571', '2020-06-17', '12:15:40', '3571', '2020-04-16', '14:01:29', '', '0000-00-00', '00:00:00'),
(82, 'ECS M/C/S', '2', '1', 'ECS', 3, '3', '3500', 'active', '', '', '', '3571', '2020-04-16', '14:01:54', '', '0000-00-00', '00:00:00'),
(83, 'Potassium', '4', '1', 'Blood', 60, '1', '1000', 'active', '', '', '', '3571', '2020-04-17', '16:44:10', '', '0000-00-00', '00:00:00'),
(84, 'RBS', '4', '1', 'Blood', 1, '2', '500', 'active', '', '', '', '3571', '2020-04-20', '12:10:17', '3571', '2020-04-20', '14:28:53'),
(85, 'FBC + ESR (Female)', '3', '1', 'Blood', 1, '1', '3000', 'inactive', 'Bolaji', '2021-03-12', '12:36:59', '3571', '2020-04-24', '12:36:54', '3571', '2020-04-24', '12:38:03'),
(86, 'MP +  Salmonella Antibody Test (RDT)', '2', '1', 'Blood', 1, '2', '2000', 'inactive', '3571', '2021-10-27', '08:34:08', '3571', '2020-04-24', '14:01:22', '3571', '2020-05-28', '15:43:54'),
(87, 'Complete TFT', '8', '1', 'Blood', 24, '2', '15000', 'active', '', '', '', '3571', '2020-04-24', '15:57:33', '', '0000-00-00', '00:00:00'),
(88, 'Prolactin (Male)', '4', '1', 'Blood', 1, '2', '3000', 'active', '', '', '', '3571', '2020-05-04', '13:09:15', '3571', '2020-05-04', '13:31:05'),
(89, 'Blood group and Haemoglobin Genotype', '3', '1', 'Blood', 2, '2', '1500', 'active', '', '', '', '3571', '2020-05-04', '16:25:39', '', '0000-00-00', '00:00:00'),
(90, '2 Hour Postprandial', '4', '1', 'Blood', 1, '2', '500', 'active', '', '', '', 'Bolaji', '2020-05-05', '11:16:37', '3571', '2021-02-24', '11:58:40'),
(91, 'Liver Profile (Children)', '4', '1', 'Blood', 4, '1', '4000', 'active', '', '', '', '3571', '2020-05-07', '16:39:25', '', '0000-00-00', '00:00:00'),
(92, 'Urine M/C/S', '2', '1', 'Urine', 2, '3', '3000', 'active', '', '', '', '3571', '2020-05-09', '10:38:06', '', '0000-00-00', '00:00:00'),
(93, 'B-HCG', '7', '1', 'Blood', 1, '2', '4000', 'active', '', '', '', '3571', '2020-05-09', '11:34:51', '', '0000-00-00', '00:00:00'),
(94, 'Wound swab M/C/S', '2', '1', 'Wound swab', 3, '3', '3000', 'active', '', '', '', '3571', '2020-05-09', '11:39:03', '', '0000-00-00', '00:00:00'),
(95, 'Aspirate M/C/S', '2', '1', 'Aspirate', 72, '1', '3000', 'active', '', '', '', '3571', '2020-05-09', '12:54:36', '3571', '2020-05-09', '12:58:38'),
(96, 'Abscess M/C/S', '2', '1', 'Abscess', 72, '1', '3000', 'active', '', '', '', '3571', '2020-05-09', '12:56:32', '', '0000-00-00', '00:00:00'),
(97, 'Sodium, Potassium', '4', '1', 'Blood', 1, '2', '2000', 'active', '', '', '', '3571', '2020-05-09', '17:38:11', 'HRM/ST/007', '2021-04-17', '17:56:23'),
(98, 'Full Blood Count (Baby)', '3', '1', 'Blood', 1, '2', '2000', 'active', '', '', '', 'Bolaji', '2020-05-11', '10:45:08', '', '0000-00-00', '00:00:00'),
(99, 'Full Blood Count (Children)', '3', '1', 'Blood', 1, '2', '2000', 'active', '', '', '', 'Bolaji', '2020-05-13', '10:09:01', '', '0000-00-00', '00:00:00'),
(100, 'Calcium, and Albumin', '4', '1', 'Blood', 3, '2', '2000', 'active', '', '', '', '3571', '2020-05-13', '18:05:57', 'Bolaji', '2020-05-23', '12:41:03'),
(101, 'LVS', '2', '1', 'Blood', 30, '1', '1000', 'active', '', '', '', 'Bolaji', '2020-05-16', '15:11:53', '', '0000-00-00', '00:00:00'),
(102, 'Total protein', '4', '1', 'Blood', 1, '1', '1000', 'active', NULL, NULL, NULL, '3571', '2020-05-16', '18:57:07', NULL, NULL, NULL),
(103, 'Renal profile, Calcium, Phosphate, Albumin, Total protein ', '4', '1', 'Blood', 6, '2', '7000', 'active', NULL, NULL, NULL, '3571', '2020-05-16', '19:24:33', NULL, NULL, NULL),
(104, 'Semen Analysis + Culture', '4', '1', 'Semen', 72, '1', '6500', 'active', NULL, NULL, NULL, '3571', '2020-05-17', '10:44:30', 'Bolaji', '2021-01-06', '11:13:28'),
(105, 'FSH, LH, Prolactin, E2, Testosterone', '4', '1', 'Blood', 1, '3', '16000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-17', '16:06:23', 'Bolaji', '2020-05-20', '11:55:07'),
(106, 'ALT, and AST', '4', '1', 'Blood', 2, '2', '2000', 'active', NULL, NULL, NULL, '3571', '2020-05-19', '15:03:57', 'Bolaji', '2020-06-25', '18:46:05'),
(107, 'FSH, LH, Prolactin, E2', '7', '1', 'Blood', 1, '3', '12500', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-20', '11:41:38', 'Bolaji', '2020-05-29', '11:45:26'),
(108, 'Viral markers', '2', '1', 'Blood', 1, '2', '2500', 'inactive', '3571', '2020-05-21', '10:36:30', '3571', '2020-05-21', '10:32:59', NULL, NULL, NULL),
(109, 'HBsAg, Anti-HCV, LVS (RDT)', '2', '1', 'Blood', 1, '2', '2500', 'active', NULL, NULL, NULL, '3571', '2020-05-21', '10:34:23', NULL, NULL, NULL),
(110, 'HbsAg', '2', '1', 'Blood', 30, '1', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-23', '10:32:54', NULL, NULL, NULL),
(111, 'Cholesterol', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2020-05-26', '12:25:21', NULL, NULL, NULL),
(112, 'Testosterone (Male)', '7', '1', 'Blood', 2, '2', '3500', 'active', NULL, NULL, NULL, '3571', '2020-05-28', '15:52:33', '3571', '2020-05-28', '15:53:54'),
(113, 'Creatinine', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-29', '11:06:10', NULL, NULL, NULL),
(114, 'Calcium, Phosphate, Albumin,ALP', '4', '1', 'Blood', 2, '2', '4000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-05-29', '11:48:39', 'Bolaji', '2020-07-09', '16:02:49'),
(115, 'Peripheral blood film', '3', '1', 'Blood', 1, '3', '2000', 'active', NULL, NULL, NULL, '3571', '2020-05-30', '12:44:39', NULL, NULL, NULL),
(116, 'FSH, LH, PRL, Testosterone (Male)', '7', '1', 'Blood', 1, '3', '12500', 'active', NULL, NULL, NULL, '3571', '2020-06-01', '10:12:57', '3571', '2020-06-01', '10:18:47'),
(117, 'PCV (Baby)', '3', '1', 'Blood', 30, '1', '500', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-01', '13:12:38', NULL, NULL, NULL),
(118, 'Anti-HCV', '1', '1', 'Blood', 30, '1', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-01', '16:03:08', NULL, NULL, NULL),
(119, 'Albumin', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-01', '18:08:26', NULL, NULL, NULL),
(120, 'FSH, LH, Prl, E2, Progesterone', '7', '1', 'Blood', 1, '2', '16000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-05', '19:04:35', 'Bolaji', '2020-07-07', '10:13:23'),
(121, 'FSH, LH, Prl, and Progesterone(Luteal phase)', '7', '1', 'Blood', 1, '2', '12500', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-05', '19:04:48', 'Bolaji', '2022-01-08', '19:12:44'),
(122, 'FSH, LH, Prolactin', '7', '1', 'Blood', 6, '1', '9000', 'active', NULL, NULL, NULL, '3571', '2020-06-09', '14:55:32', NULL, NULL, NULL),
(123, 'Calcium', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-11', '18:37:58', NULL, NULL, NULL),
(124, 'HVS MCS', '2', '1', 'HVS', 2, '3', '3500', 'active', NULL, NULL, NULL, '3571', '2020-06-17', '12:16:14', NULL, NULL, NULL),
(125, 'Phosphate', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2020-06-17', '13:01:12', NULL, NULL, NULL),
(126, 'Sodium ', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-25', '12:27:24', 'Bolaji', '2020-09-05', '10:31:48'),
(127, 'ALT, AST, ALP, TP, and ALB', '4', '1', 'Blood', 2, '2', '4000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-06-29', '13:38:42', 'Bolaji', '2020-06-29', '13:41:52'),
(128, 'FSH, LH, PRL, Testosterone, Progesterone', '7', '1', 'Blood', 1, '3', '16000', 'active', NULL, NULL, NULL, '3571', '2020-07-01', '15:22:10', NULL, NULL, NULL),
(129, 'Calcium, Phosphate, Albumin', '4', '1', 'Blood', 2, '2', '3000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-09', '17:50:28', 'HRM/ST/007', '2021-04-17', '15:23:36'),
(130, 'Glomerular Filtration rate (GFR)', '4', '1', 'Blood', 1, '2', '0000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-13', '13:15:20', NULL, NULL, NULL),
(131, 'C-Reactive Protein (CRP)', '4', '1', 'Blood', 2, '2', '6000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-16', '19:26:13', NULL, NULL, NULL),
(132, 'Electrolyte, Creatinine & Urea', '4', '1', 'Blood', 2, '2', '3000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-20', '16:45:21', NULL, NULL, NULL),
(133, 'Creatinine And Urea', '4', '1', 'Blood', 1, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-20', '17:03:40', NULL, NULL, NULL),
(134, 'FBC (Neonate)', '3', '1', 'Blood', 2, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-20', '19:15:32', NULL, NULL, NULL),
(135, 'FBC (Children)', '3', '1', 'Blood', 2, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-20', '19:15:52', NULL, NULL, NULL),
(136, 'FBC (Female)', '3', '1', 'Blood', 2, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-20', '19:16:17', NULL, NULL, NULL),
(137, 'FBC (Male)', '3', '1', 'Blood', 2, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-20', '19:16:29', NULL, NULL, NULL),
(138, 'Alkaline Phosphatase(ALP)', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-24', '16:07:11', 'Bolaji', '2020-07-24', '16:08:54'),
(139, 'FSH, LH, E2, Testosterone', '7', '1', 'Blood', 24, '2', '13000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-07-25', '11:34:10', NULL, NULL, NULL),
(140, 'BNP', '9', '1', 'Blood', 1, '2', '5000', 'inactive', '3571', '2021-11-14', '12:12:47', 'Bolaji', '2020-07-28', '10:46:20', '3571', '2021-02-19', '12:17:00'),
(141, 'FSH, LH, E2', '7', '1', 'Blood', 24, '2', '9500', 'active', NULL, NULL, NULL, '3571', '2020-08-08', '12:53:28', NULL, NULL, NULL),
(142, 'Slide', '3', '1', 'Blood', 2, '2', '500', 'active', NULL, NULL, NULL, 'Bolaji', '2020-08-10', '09:54:24', NULL, NULL, NULL),
(143, 'Vaginal wash/swab Microscopy', '2', '1', 'Vaginal wash', 12, '2', '2000', 'inactive', 'HRM/ST/007', '2021-07-04', '11:46:56', 'Bolaji', '2020-08-28', '15:35:15', 'HRM/ST/007', '2021-07-04', '11:41:15'),
(144, 'FSL, LH, Testosterone (Male)', '7', '1', 'Blood', 24, '2', '9500', 'active', NULL, NULL, NULL, '3571', '2020-08-29', '10:56:42', NULL, NULL, NULL),
(145, 'Triglyceride', '4', '1', 'Blood', 2, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-09-09', '17:10:47', NULL, NULL, NULL),
(146, 'Throat Swab M/C/S', '2', '1', 'Swab', 3, '3', '3000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-09-10', '15:39:42', NULL, NULL, NULL),
(147, 'Glycated haemoglobin (HBA1C)', '2', '1', 'Blood', 1, '2', '4000', 'inactive', '3571', '2020-10-31', '11:17:00', '3571', '2020-09-24', '14:43:36', NULL, NULL, NULL),
(148, 'Glycated haemoglobin (HBA1C)', '4', '1', 'Blood', 1, '2', '4000', 'active', NULL, NULL, NULL, '3571', '2020-09-24', '14:43:52', NULL, NULL, NULL),
(149, 'Hormonal profile (1-10 yrs)', '7', '1', 'Blood', 24, '2', '19500', 'active', NULL, NULL, NULL, 'Bolaji', '2020-10-07', '19:19:59', NULL, NULL, NULL),
(150, 'Urine Pregnancy Test', '7', '1', 'Urine', 1, '2', '500', 'active', NULL, NULL, NULL, '3571', '2020-10-08', '13:38:46', NULL, NULL, NULL),
(151, 'Pleural Fluid Cell Count', '2', '1', 'Pleural Fluid ', 24, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-10-10', '10:20:23', NULL, NULL, NULL),
(152, 'Cortisol', '4', '1', 'Blood', 24, '2', '6000', 'inactive', 'Bolaji', '2020-10-27', '08:47:05', 'Bolaji', '2020-10-27', '08:45:40', NULL, NULL, NULL),
(153, 'Cortisol (AM)', '4', '1', 'Blood', 24, '2', '6000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-10-27', '08:46:07', NULL, NULL, NULL),
(154, 'Cortisol (PM)', '4', '1', 'Blood', 24, '2', '6000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-10-27', '08:46:18', NULL, NULL, NULL),
(155, 'Acid Fast Bacilli(AFB)', '2', '1', 'As appropriate', 3, '3', '3000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-10-29', '16:36:58', '3571', '2022-05-24', '09:40:02'),
(156, 'Hepatitis C RNA Load', '11', '1', 'Blood', 14, '3', '27000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-10-30', '15:41:06', NULL, NULL, NULL),
(157, 'FSH, LH, TESTOSTERONE', '7', '1', 'Blood', 8, '2', '9500', 'active', NULL, NULL, NULL, '3571', '2020-10-31', '16:08:25', NULL, NULL, NULL),
(158, 'May. TRANSPORTATION', '10', '1', 'Transport', 1, '5', '8400', 'active', NULL, NULL, NULL, 'Bolaji', '2020-11-03', '10:52:17', 'Bolaji', '2022-06-01', '13:57:59'),
(159, 'Rheumatoid factor (RF)', '1', '1', 'Blood', 1, '2', '8000', 'active', NULL, NULL, NULL, 'Bolaji', '2020-11-03', '15:01:00', 's6068', '2024-10-30', '10:41:07'),
(160, 'Hepatitis C Genotype', '11', '1', 'Blood', 2, '4', '30000', 'active', NULL, NULL, NULL, '3571', '2020-11-04', '08:19:30', NULL, NULL, NULL),
(161, 'Hepatitis B Genotype', '11', '1', 'Blood', 2, '4', '25000', 'active', NULL, NULL, NULL, '3571', '2020-11-04', '08:20:01', NULL, NULL, NULL),
(162, 'Chlamydia', '2', '1', 'HVS', 24, '2', '2000', 'active', NULL, NULL, NULL, '3571', '2020-12-01', '10:55:50', 'Bolaji', '2020-12-19', '10:01:41'),
(163, 'Trichomonas vaginalis ', '2', '1', 'Urethral Swab', 24, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2020-12-01', '10:59:54', '3571', '2020-12-01', '11:02:36'),
(164, 'Chemistry', '4', '1', 'Blood', 2, '2', '1000', 'inactive', '3571', '2021-01-30', '14:16:27', '3571', '2021-01-30', '14:12:37', NULL, NULL, NULL),
(165, 'Alkaline Phosphatase(ALP) Children', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2021-01-30', '14:15:47', '3571', '2021-01-30', '14:17:52'),
(166, 'ALT', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2021-02-02', '09:54:15', NULL, NULL, NULL),
(167, 'Testosterone (F)', '4', '1', 'Blood', 1, '2', '3500', 'active', NULL, NULL, NULL, '3571', '2021-02-22', '18:04:17', '3571', '2021-02-22', '18:04:52'),
(168, '1 Hour Postprandial', '4', '1', 'Blood', 1, '2', '500', 'active', NULL, NULL, NULL, '3571', '2021-02-24', '11:18:00', '3571', '2021-02-24', '11:59:00'),
(169, 'Estradiol (Male)', '7', '1', 'Blood', 24, '2', '3500', 'active', NULL, NULL, NULL, '3571', '2021-02-26', '07:53:13', NULL, NULL, NULL),
(170, 'Bicarbonate ', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2021-03-01', '15:48:20', NULL, NULL, NULL),
(171, 'Creatinine and Urea (Children)', '4', '1', 'Blood', 1, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2021-03-05', '12:42:05', NULL, NULL, NULL),
(172, 'Rheumatoid factor', '3', '1', 'Blood', 1, '1', '6000', 'inactive', '3571', '2021-10-27', '08:35:36', 'HRM/ST/007', '2021-03-29', '14:27:15', NULL, NULL, NULL),
(173, 'First bank 2019 Balance', '10', '1', 'Blood', 1, '1', '499000', 'active', NULL, NULL, NULL, '3571', '2021-04-02', '13:10:31', NULL, NULL, NULL),
(174, 'E/U/CR (Children)', '4', '1', 'Blood', 2, '2', '3000', 'active', NULL, NULL, NULL, '3571', '2021-04-27', '09:18:49', NULL, NULL, NULL),
(175, 'E/U/CR (Adult)', '4', '1', 'Blood', 2, '2', '3000', 'active', NULL, NULL, NULL, '3571', '2021-04-27', '09:19:04', NULL, NULL, NULL),
(176, 'Urine drug of abuse screening', '4', '1', 'Urine', 24, '2', '12000', 'active', NULL, NULL, NULL, '3571', '2021-05-15', '16:09:36', '3571', '2021-05-15', '16:31:18'),
(177, 'Amylase', '4', '1', 'Pleural fluid', 24, '2', '6000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-05-18', '18:42:16', '3571', '2022-06-24', '12:51:24'),
(178, 'Chloride', '4', '1', 'Blood', 30, '1', '1000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-05-19', '11:57:28', NULL, NULL, NULL),
(179, 'Semen analysis with culture', '2', '1', 'Seminal fluid', 48, '2', '6500', 'inactive', '3571', '2022-02-12', '10:15:25', '3571', '2021-06-19', '16:52:07', NULL, NULL, NULL),
(180, 'Anti-Mullerian hormone (AMH)', '7', '1', 'Blood', 2, '3', '15000', 'active', NULL, NULL, NULL, '3571', '2021-06-22', '08:46:23', NULL, NULL, NULL),
(181, ' E2', '7', '1', 'Blood', 24, '2', '3500', 'active', NULL, NULL, NULL, '3571', '2021-06-30', '10:10:41', NULL, NULL, NULL),
(182, 'Vaginal wash/swab microscopy', '2', '1', 'Vaginal wash', 12, '2', '2000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-07-04', '11:51:41', '3571', '2021-07-04', '12:37:01'),
(183, 'hs C-reactive protein (hsCRP)', '4', '1', 'Blood', 24, '2', '6000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-07-19', '10:42:58', NULL, NULL, NULL),
(184, 'Microscopy', '2', '1', 'Aspirate', 24, '2', '3000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-07-26', '18:08:01', NULL, NULL, NULL),
(185, 'Urethral Swab M/C/S', '2', '1', 'Urethral Swab', 48, '2', '3000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-08-03', '09:53:36', 's6068', '2022-08-23', '05:15:59'),
(186, 'Vitamin D - 25 (OH) D2/D3 level', '4', '1', 'Blood', 24, '2', '15000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-08-04', '09:11:15', 'HRM/ST/007', '2021-12-21', '09:52:53'),
(187, 'Microalbumin', '4', '1', 'Urine', 24, '2', '5000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-08-04', '09:18:39', NULL, NULL, NULL),
(188, 'Vitamin D Research', '4', '1', 'Blood', 1, '3', '1000', 'active', NULL, NULL, NULL, '3571', '2021-09-23', '18:27:42', NULL, NULL, NULL),
(189, 'NT-proBNP', '4', '1', 'Blood', 2, '2', '5000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2021-11-07', '12:17:40', NULL, NULL, NULL),
(190, 'Anti-HBs', '11', '1', 'Blood', 24, '2', '10000', 'active', NULL, NULL, NULL, '3571', '2021-12-28', '10:04:59', NULL, NULL, NULL),
(191, 'FSH,LH,PRL,E2, Testosterone and Progesterone(Luteal phase)', '7', '1', 'Blood', 1, '3', '19500', 'active', NULL, NULL, NULL, 'Bolaji', '2022-01-08', '13:47:27', 'Bolaji', '2022-02-04', '08:19:10'),
(192, 'Urea', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, 'Bolaji', '2022-01-20', '11:20:32', NULL, NULL, NULL),
(193, 'Indirect Comb Test', '3', '1', 'Blood', 4, '3', '5500', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-02-02', '13:52:58', 'Bolaji', '2022-03-07', '11:20:13'),
(194, 'Free PSA', '4', '1', 'Blood', 1, '3', '4000', 'active', NULL, NULL, NULL, '3571', '2022-02-15', '08:27:57', 'HRM/ST/007', '2022-03-18', '09:32:45'),
(195, 'PT', '3', '1', 'Blood', 30, '1', '3000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-02-22', '17:21:01', 'HRM/ST/007', '2022-02-22', '17:27:54'),
(196, 'APTT', '3', '1', 'Blood', 30, '1', '3000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-02-22', '17:21:35', NULL, NULL, NULL),
(197, 'Magnesium', '4', '1', 'Blood', 1, '2', '2000', 'active', NULL, NULL, NULL, '3571', '2022-03-01', '15:06:45', NULL, NULL, NULL),
(198, 'Serum Zinc', '7', '1', 'Blood', 24, '2', '2000', 'active', NULL, NULL, NULL, '3571', '2022-03-16', '09:36:54', NULL, NULL, NULL),
(199, 'Semen Zinc', '7', '1', 'Semen', 24, '2', '2000', 'active', NULL, NULL, NULL, '3571', '2022-03-16', '09:37:43', NULL, NULL, NULL),
(200, 'CA-125', '10', '1', 'Blood', 5, '3', '6000', 'active', NULL, NULL, NULL, '3571', '2022-03-17', '07:56:38', NULL, NULL, NULL),
(201, 'Semen analysis (SFA)', '7', '1', 'Semen', 24, '2', '5000', 'active', NULL, NULL, NULL, '3571', '2022-03-17', '11:16:56', '3571', '2022-03-17', '11:41:17'),
(202, 'Semen culture', '7', '1', 'Semen', 48, '2', '1500', 'active', NULL, NULL, NULL, '3571', '2022-03-20', '13:37:00', NULL, NULL, NULL),
(203, 'Anti-nuclear antibody (ANA)', '1', '1', 'Blood', 5, '3', '20000', 'active', NULL, NULL, NULL, '3571', '2022-03-22', '10:22:26', NULL, NULL, NULL),
(204, 'Haemoglobin quantification', '3', '1', 'Blood', 2, '3', '9500', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-03-22', '18:40:31', '3571', '2022-05-14', '12:52:21'),
(205, 'CA19-9', '1', '1', 'Blood', 48, '2', '6000', 'active', NULL, NULL, NULL, 'Bolaji', '2022-03-25', '16:29:08', NULL, NULL, NULL),
(206, 'CA 15-3', '9', '1', 'Blood', 4, '2', '6000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-04-05', '18:34:02', NULL, NULL, NULL),
(207, 'E/U&CR (Children)', '4', '1', 'Blood', 2, '2', '3000', 'active', NULL, NULL, NULL, 'Bolaji', '2022-04-14', '09:01:59', 'Bolaji', '2022-04-14', '09:02:31'),
(208, 'E/U&CR (Adult)', '4', '1', 'Blood', 2, '2', '3000', 'active', NULL, NULL, NULL, 'Bolaji', '2022-04-14', '09:06:52', NULL, NULL, NULL),
(209, 'Direct Comb Test', '3', '1', 'Blood', 2, '3', '5500', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-04-20', '12:16:12', NULL, NULL, NULL),
(210, 'B-HCG', '10', '1', 'As appropriate', 2, '2', '4000', 'active', NULL, NULL, NULL, 'HRM/ST/007', '2022-05-24', '18:57:55', NULL, NULL, NULL),
(211, 'Calcium & Phosphate', '4', '1', 'Blood', 2, '2', '2000', 'active', NULL, NULL, NULL, 'Bolaji', '2022-06-03', '16:38:23', NULL, NULL, NULL),
(212, 'GGT', '4', '1', 'Blood', 24, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2022-06-29', '10:31:58', NULL, NULL, NULL),
(213, 'Liver Function Test (LFT)', '4', '1', 'Blood', 3, '2', '5000', 'active', NULL, NULL, NULL, '3571', '2022-06-29', '10:44:33', '3571', '2022-06-29', '10:53:20'),
(214, 'Complete Liver Profile', '4', '1', 'Blood', 24, '2', '5000', 'active', NULL, NULL, NULL, '3571', '2022-06-29', '11:01:06', NULL, NULL, NULL),
(215, 'Creatinine (adult)', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2022-07-02', '18:08:37', NULL, NULL, NULL),
(216, 'Creatinine(Adult)', '4', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2022-07-02', '18:11:07', NULL, NULL, NULL),
(217, 'Complete Liver Profile (Children)', '4', '1', 'Blood', 24, '2', '5000', 'active', NULL, NULL, NULL, '3571', '2022-07-04', '13:04:22', NULL, NULL, NULL),
(218, 'OGTT', '4', '1', 'Blood', 2, '2', '2000', 'active', NULL, NULL, NULL, '3571', '2022-07-07', '11:25:07', NULL, NULL, NULL),
(219, 'PCV/Haemoglobin (Female)', '3', '1', 'Blood', 1, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2022-07-07', '11:31:02', '3571', '2022-07-07', '11:55:51'),
(220, 'PCV/Haemoglobin (Male)', '3', '1', 'Blood', 24, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2022-07-07', '11:59:43', NULL, NULL, NULL),
(221, 'PCV/Haemoglobin (Children)', '3', '1', 'Blood', 24, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2022-07-07', '12:06:04', NULL, NULL, NULL),
(222, 'PCV/Haemoglobin (Neonate)', '3', '1', 'Blood', 24, '2', '1000', 'active', NULL, NULL, NULL, '3571', '2022-07-07', '12:18:12', '3571', '2022-07-07', '12:30:44');

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
(1, 'BLHL/0002', 'BLT/24/0002', 2, 1, 1, '0', 's6068', 's6068', '2024-11-17 10:37:02', '2024-11-18 04:56:55'),
(2, 'BLHL/0002', 'BLT/24/0002', 2, 1, 2, '0', 's6068', 's6068', '2024-11-17 10:37:03', '2024-11-18 04:56:56'),
(3, 'BLHL/0002', 'BLT/24/0002', 2, 1, 3, '0', 's6068', 's6068', '2024-11-17 10:37:04', '2024-11-18 04:56:56'),
(4, 'BLHL/0003', 'BLT/24/0003', 3, 1, 1, '0', 's6068', NULL, '2024-11-19 13:39:43', '2024-11-19 13:39:43'),
(5, 'BLHL/0003', 'BLT/24/0003', 3, 1, 2, '0', 's6068', NULL, '2024-11-19 13:39:43', '2024-11-19 13:39:43'),
(6, 'BLHL/0003', 'BLT/24/0003', 3, 1, 3, '0', 's6068', NULL, '2024-11-19 13:39:44', '2024-11-19 13:39:44'),
(7, 'BLHL/0006', 'BLT/24/0004', 5, 1, 1, '0', 's6068', NULL, '2024-11-19 14:02:17', '2024-11-19 14:02:17'),
(8, 'BLHL/0006', 'BLT/24/0004', 5, 1, 2, '0', 's6068', NULL, '2024-11-19 14:02:17', '2024-11-19 14:02:17'),
(9, 'BLHL/0006', 'BLT/24/0004', 5, 1, 3, '0', 's6068', NULL, '2024-11-19 14:02:17', '2024-11-19 14:02:17'),
(10, 'BLHL/0004', 'BLT/24/0005', 7, 1, 1, '0', 's6068', NULL, '2024-11-19 16:32:26', '2024-11-19 16:32:26'),
(11, 'BLHL/0004', 'BLT/24/0005', 7, 1, 2, '0', 's6068', NULL, '2024-11-19 16:32:27', '2024-11-19 16:32:27'),
(12, 'BLHL/0004', 'BLT/24/0005', 7, 1, 3, '0', 's6068', NULL, '2024-11-19 16:32:27', '2024-11-19 16:32:27'),
(13, 'BLHL/0004', 'BLT/24/0005', 7, 1, 4, '0', 's6068', NULL, '2024-11-19 16:32:27', '2024-11-19 16:32:27'),
(14, 'BLHL/0004', 'BLT/24/0005', 7, 1, 5, '41', 's6068', NULL, '2024-11-19 16:32:27', '2024-11-19 16:32:27'),
(15, 'BLHL/0007', 'BHC/24/0001', 1, 1, 1, '0', 's6068', 's6068', '2024-11-20 04:13:33', '2024-11-20 04:21:02'),
(16, 'BLHL/0007', 'BHC/24/0001', 1, 1, 2, '0', 's6068', 's6068', '2024-11-20 04:13:33', '2024-11-20 04:21:02'),
(17, 'BLHL/0007', 'BHC/24/0001', 1, 1, 3, '0', 's6068', 's6068', '2024-11-20 04:13:33', '2024-11-20 04:21:02'),
(18, 'BLHL/0007', 'BHC/24/0001', 1, 1, 4, '0', 's6068', 's6068', '2024-11-20 04:13:33', '2024-11-20 04:21:02');

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
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_stocks`
--

INSERT INTO `blood_stocks` (`id`, `ticket_no`, `customer_id`, `blood_type_id`, `volume`, `sales_price`, `sold`, `date_donated`, `expiry_date`, `sold_by`, `sold_to`, `date_sold`, `transaction_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BHC/24/0001', 'BLHL/0007', 5, 0, NULL, 'no', '2024-11-19 20:45:04', '2024-12-24 20:45:04', NULL, '', NULL, 'donated', 'active', '2024-11-20 04:13:33', '2024-11-20 04:21:02');

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
(1, 'A +', 20000, '2024-10-25 14:17:11', '2024-11-19 14:19:46'),
(2, 'A -', 15000, '2024-10-25 14:17:19', '2024-11-19 14:19:50'),
(3, 'B +', 12000, '2024-10-25 14:17:26', '2024-11-19 14:19:52'),
(4, 'B -', 14000, '2024-10-25 14:17:49', '2024-11-19 14:19:59'),
(5, 'AB +', 15000, '2024-10-25 14:18:22', '2024-11-19 14:58:09'),
(6, 'O +', 16000, '2024-10-25 16:22:38', '2024-11-19 14:57:19'),
(7, 'O -', 14000, '2024-10-25 16:22:42', '2024-11-19 14:57:00');

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
  `sex` varchar(10) NOT NULL,
  `is_donor` tinyint(4) NOT NULL DEFAULT 0,
  `blood_type_id` tinyint(4) DEFAULT NULL,
  `last_donation_date` timestamp NULL DEFAULT NULL,
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

INSERT INTO `customer_info` (`sn`, `id`, `surname`, `othername`, `fullname`, `dob`, `phone`, `email`, `sex`, `is_donor`, `blood_type_id`, `last_donation_date`, `hospital`, `c_by`, `upd_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BLHL/0001', 'Emma', 'Gideon', 'Emma Gideon', '1999-11-09 10:05:46', '08033456789', '', 'male', 0, NULL, NULL, 'Cresent Gold Crown Hospital ', 'no', '', 'active', NULL, NULL),
(2, 'BLHL/0002', 'Olushola', 'Samuel', 'Olushola Samuel', '1982-11-09 10:09:44', '07069270091', '', 'male', 0, NULL, NULL, 'Tuyil Pharmay', 'no', '', 'active', NULL, NULL),
(3, 'BLHL/0003', 'BALOGUN', 'Gbenga', 'BALOGUN Gbenga', '1985-11-09 10:14:29', '07069270091', '', 'male', 0, NULL, NULL, 'Chevron Hospital', 'no', '', 'active', NULL, NULL),
(4, 'BLHL/0004', 'Dare', 'Ebenezer', 'Dare Ebenezer', '1985-11-09 10:17:16', '09022558932', '', 'male', 0, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(5, 'BLHL/0005', 'Dare', 'Ebenezer', 'Dare Ebenezer', '2004-11-09 10:18:07', '08033456789', '', 'male', 0, NULL, NULL, '', 'no', '', 'active', NULL, NULL),
(9, 'BLHL/0006', 'Ojo', 'Mayowa', 'Ojo Mayowa', '2005-11-09 11:45:50', '07069270091', '', 'male', 0, NULL, NULL, 'Cresent Gold Crown Hospital ', 'no', '', 'active', NULL, NULL),
(10, 'BLHL/0007', 'Obadare', 'Comfort', 'Obadare Comfort', '2011-11-17 00:30:49', '08033456789', '', 'female', 1, 5, '2024-11-20 04:21:02', '', 'no', '', 'active', NULL, '2024-11-20 04:21:02');

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
  `sn` int(10) NOT NULL,
  `customer_id` varchar(30) DEFAULT NULL,
  `custom_ticket_id` int(10) DEFAULT NULL,
  `order_type` enum('perform_test','buy_blood','donate_blood') DEFAULT NULL,
  `bill_type_id` varchar(10) NOT NULL,
  `blood_type_id` varchar(10) DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `bill_price` varchar(32) DEFAULT NULL,
  `ticket_no` varchar(30) DEFAULT NULL,
  `specimen_sample` varchar(255) DEFAULT NULL,
  `finalized` enum('yes','no') NOT NULL DEFAULT 'no',
  `donation_date` timestamp NULL DEFAULT NULL,
  `process_completed` enum('no','yes') DEFAULT 'no',
  `to_modify` enum('yes','no') DEFAULT 'no',
  `comment` text DEFAULT '',
  `status` enum('active','inactive') DEFAULT 'active',
  `c_by` varchar(50) DEFAULT NULL,
  `date_c` timestamp NULL DEFAULT NULL,
  `date_perform` date DEFAULT NULL,
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

INSERT INTO `customer_specimen` (`sn`, `customer_id`, `custom_ticket_id`, `order_type`, `bill_type_id`, `blood_type_id`, `qty`, `bill_price`, `ticket_no`, `specimen_sample`, `finalized`, `donation_date`, `process_completed`, `to_modify`, `comment`, `status`, `c_by`, `date_c`, `date_perform`, `upd_by`, `date_upd`, `time_upd`, `time_del`, `time_c`, `del_by`, `date_del`) VALUES
(1, 'BLHL/0007', 1, 'donate_blood', '', '5', NULL, '0', 'BHC/24/0001', 'blood', 'yes', NULL, 'yes', 'no', '', 'active', 's6068', '2024-11-20 04:09:01', NULL, NULL, '2024-11-20 04:22:12', NULL, NULL, NULL, NULL, NULL),
(2, 'BLHL/0007', 1, 'perform_test', '66', NULL, NULL, '500', 'BHC/24/0001', 'Blood', 'yes', NULL, 'yes', 'no', '', 'active', 's6068', '2024-11-20 04:09:23', '2024-11-20', NULL, '2024-11-20 04:22:12', NULL, NULL, NULL, NULL, NULL),
(3, 'BLHL/0007', 2, 'donate_blood', '', '5', NULL, '0', NULL, 'blood', 'no', '2024-09-22 05:12:00', 'no', 'no', '', 'active', 's6068', '2024-11-22 05:03:08', NULL, NULL, '2024-11-22 05:12:41', NULL, NULL, NULL, NULL, NULL);

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
(2, 'BHC/24/0001', '66', 159, 'param_form', 'PCV', '42', NULL, 'created', 'active', 's6068', '2024-11-20 04:22:06', NULL, NULL, NULL, '2024-11-20 04:22:06', NULL);

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
(1, 'BLHL/0007', 'Obadare', 'Comfort', 'Obadare Comfort', 'BHC/24/0001', NULL, 0, NULL, '2011-11-17 00:30:49', '08033456789', '', 'female', '', '', '', '', 24, 'labtest', 0, 0, 500, NULL, 'no', 'yes', 'no', '', '', 's6068', '2024-11-19 20:45:04', NULL, '2024-11-20 04:22:12', 'active', 'yes', '2024-11-20 04:22:12', 's6068', NULL, NULL),
(2, 'BLHL/0007', 'Obadare', 'Comfort', 'Obadare Comfort', NULL, NULL, 0, NULL, '2011-11-17 00:30:49', '08033456789', '', 'female', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 's6068', '2024-11-20 04:22:33', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(3, 'BLHL/0001', 'Emma', 'Gideon', 'Emma Gideon', NULL, NULL, 0, NULL, '1999-11-09 10:05:46', '08033456789', '', 'male', 'Cresent Gold Crown Hospital ', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 's6068', '2024-11-22 04:46:18', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL),
(4, 'BLHL/0003', 'BALOGUN', 'Gbenga', 'BALOGUN Gbenga', NULL, NULL, 0, NULL, '1985-11-09 10:14:29', '07069270091', '', 'male', 'Chevron Hospital', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'no', 'no', 'no', NULL, '', 's6068', '2024-11-22 18:06:00', NULL, NULL, 'active', 'no', NULL, NULL, NULL, NULL);

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
(1, 'General Hospital ', 'Zamaru', '08044556632', 'active', 's6068', '2022-08-23', '16:06:22', NULL, NULL, NULL, NULL, NULL, NULL);

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
(12, 'accesschm001', 'consultant', NULL, 'active', NULL);

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
(3, 'Billing Settings', 'billingsys.php', 'fa fa-money', 'active', 'gp2', 'yes'),
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
(20, 'Donations', 'blooddonors.php', 'fa fa-medkit', 'active', 'gp6', 'yes'),
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
(36, 'Blood Donation Result Printout', 'blood_donation_result.php', 'fa fa-book', 'active', 'gp2', 'no');

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
(1, 'BLH/24/0001', 1000, NULL, 1000, 'cash', '2024-11-09 13:55:08', 's6068', 'active', NULL, NULL),
(2, 'BLT/24/0004', 0, NULL, 1, 'cash', '2024-11-16 22:40:20', 's6068', 'active', NULL, NULL),
(3, 'BLT/24/0005', 4000, NULL, 4000, 'pos', '2024-11-16 23:13:22', 's6068', 'active', NULL, NULL),
(4, 'BLT/24/0008', 1500, NULL, 1500, 'transfer', '2024-11-16 23:44:05', 's6068', 'active', NULL, NULL),
(5, 'BLT/24/0002', 500, NULL, 500, 'cash', '2024-11-17 00:01:08', 's6068', 'inactive', 's6068', '2024-11-17 01:54:21'),
(6, 'BLT/24/0001', 1500, NULL, 1500, 'pos', '2024-11-17 00:25:01', 's6068', 'active', NULL, NULL),
(7, 'BLT/24/0006', 1000, NULL, 1000, 'pos', '2024-11-19 16:28:55', 's6068', 'active', NULL, NULL);

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
(2, 'Flagi 400mg', '', '', '1123', 'yes', '2020-02-17', '2021-02-16', 40, 10, 22, 0, 0, 0, 70, 100, 'no', '', '', 's6068', 'active', '2020-02-17', '00:00:00', '02', 8, 2020, 17, '2020-12-16', '13:30:58', '3571', '', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', ''),
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
(34, 'superb', 'ticket_updates.php', 'active', 'gp2'),
(39, 'superb', 'lab_rep.php', 'active', 'gp7'),
(41, 'receptionist', 'index.php', 'active', 'gp1'),
(43, 'receptionist', 'newschedule.php', 'active', 'gp2'),
(44, 'receptionist', 'ticket_paym.php', 'active', 'gp2'),
(45, 'receptionist', 'receipt.php', 'active', 'gp2'),
(46, 'cashier', 'index.php', 'active', 'gp1'),
(47, 'cashier', '404.php', 'active', 'gp2'),
(48, 'cashier', 'ticket_paym.php', 'active', 'gp2'),
(49, 'cashier', 'receipt.php', 'active', 'gp2'),
(51, 'cashier', 'staff_payslip.php', 'active', 'gp5'),
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
(66, 'MLS', 'blooddonors.php', 'active', 'gp6'),
(67, 'MLS', 'stock_alloc.php', 'active', 'gp6'),
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
(84, 'receptionist', 'billingsys.php', 'active', 'gp2'),
(85, 'receptionist', 'tickets.php', 'active', 'gp2'),
(86, 'receptionist', 'process_ticket.php', 'active', 'gp2'),
(87, 'receptionist', 'tick_print_preview.php', 'active', 'gp2'),
(88, 'receptionist', 'ticket_updates.php', 'active', 'gp2'),
(89, 'receptionist', 'ticket_invoice.php', 'active', 'gp7'),
(90, 'receptionist', 'inv_print.php', 'active', 'gp7'),
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
(105, 'receptionist', 'ticket_invoice_upd.php', 'active', 'gp7'),
(106, 'receptionist', 'lab_rep.php', 'active', 'gp7'),
(107, 'superb', 'customers.php', 'active', 'gp1'),
(108, 'consultant', 'index.php', 'active', 'gp1'),
(109, 'superb', 'adm_profile.php', 'active', 'gp3'),
(110, 'consultant', 'tick_coment_setup.php', 'active', 'gp2'),
(111, 'superb', 'tick_coment_setup.php', 'active', 'gp2'),
(112, 'superb', 'blooddonors.php', 'active', 'gp6'),
(114, 'superb', 'bbsettings.php', 'active', 'gp6'),
(115, 'superb', 'blood_donation_result.php', 'active', 'gp2');

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
(8, 'Consultant', 'consultant', 's6068', '2022-09-17', '13:51:34', 'active', NULL, NULL, NULL, 's6068', '2022-09-29', '10:49:18');

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
(19, '3', 'HIV 1/2 antibody', 'param_form', '', '', 'false', '', 'false', '', 'adult', 'active', 's6068', '2019-12-22', '', '06:31:57', 's6068', '2020-01-08', '04:25:48', '', ''),
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
(83, '54', 'PSA', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '0-4', 'adult', 'active', 's6068', '2020-01-21', '', '18:45:22', 's6068', '2020-01-21', '18:45:42', '', ''),
(84, '53', 'Serum Alpha Fetoprotein', 'param_form', '', '', 'true', '<p>ng/mL</p>', 'true', '0-20', 'adult', 'active', 's6068', '2020-01-21', '', '18:47:01', '', '0000-00-00', '00:00:00', '', ''),
(85, '14', 'Glycated Haemoglobin', 'param_form', '', '', 'true', '<p>%</p>', 'true', '4.0 - 6.5', 'adult', 'active', 's6068', '2020-01-21', '', '18:48:19', 'Bolaji', '2020-05-07', '14:40:58', '', ''),
(86, '10', 'Total Cholesterol', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '3.89-5.7 (&lt; 5.2 desirable)', 'adult', 'active', 's6068', '2020-01-21', '', '19:06:31', '3571', '2020-04-24', '13:52:29', '', ''),
(87, '10', 'HDL-C', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.91-1.43 (&gt;1.0 desirable)', 'adult', 'active', 's6068', '2020-01-21', '', '19:07:39', '3571', '2020-04-24', '13:57:41', '', ''),
(88, '10', 'LDL-C', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '&lt; 4.0 desirable', 'adult', 'active', 's6068', '2020-01-21', '', '19:08:54', '3571', '2020-04-24', '13:58:13', '', ''),
(89, '10', 'Triglyceride', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.3-1.7 (', 'adult', 'inactive', 's6068', '2020-01-21', '', '19:09:52', '3571', '2020-04-24', '13:54:22', '', ''),
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
(159, '66', 'PCV', 'param_form', '', '', 'true', '<p>%</p>', 'true', '38.00 - 48.00', 'adult', 'active', 's6068', '2020-01-22', '', '12:35:44', '', '0000-00-00', '00:00:00', '', ''),
(160, '67', 'PCV', 'param_form', '', '', 'true', '<p>%</p>', 'true', '40.00 - 55.00', 'adult', 'active', 's6068', '2020-01-22', '', '12:36:51', '', '0000-00-00', '00:00:00', '', ''),
(161, '40', 'Prothrombin Time (PT)', 'param_form', '', '', 'true', '<p>Seconds</p>', 'true', '10 -15', 'adult', 'active', 's6068', '2020-01-25', '', '08:32:52', '', '0000-00-00', '00:00:00', '', ''),
(162, '40', 'INR', 'param_form', '', '', 'true', '<p>-</p>', 'true', '0.8 - 1.2', 'adult', 'active', 's6068', '2020-01-25', '', '08:34:31', '', '0000-00-00', '00:00:00', '', ''),
(163, '40', 'Control', 'param_form', '', '', 'true', '<p>Seconds</p>', 'true', '-', 'adult', 'active', 's6068', '2020-01-25', '', '08:35:37', '', '0000-00-00', '00:00:00', '', ''),
(164, '39', 'APTT (PTTK)', 'param_form', '', '', 'true', '<p>Seconds</p>', 'true', '21 - 38', 'adult', 'active', 's6068', '2020-01-25', '', '08:41:19', '', '0000-00-00', '00:00:00', '', ''),
(165, '38', 'ESR', 'param_form', '', '', 'true', '<p>mm/hr Westergren</p>', 'true', '0 - 15', 'adult', 'active', 's6068', '2020-01-25', '', '08:44:37', '', '0000-00-00', '00:00:00', '', ''),
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
(187, '1', 'rgtrwtwt', 'param_form', '', '', 'true', '<p>dvdvadsdvd</p>', 'true', 'vsdv', 'infant', 'active', 's6068', '2020-01-30', '', '18:04:04', 's6068', '2020-01-30', '18:04:51', '', ''),
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
(204, '11', 'Uric Acid', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.2-0.45', 'adult', 'active', '3571', '2020-04-04', '', '15:50:36', '', '0000-00-00', '00:00:00', '', ''),
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
(256, '10', 'Triglyceride', 'param_form', '', '', 'true', '<p>mmol/L</p>', 'true', '0.3-1.7 (&lt; 2.0 desirable)', 'adult', 'active', '3571', '2020-04-24', '', '13:55:28', '3571', '2020-04-24', '13:57:56', '', ''),
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
(358, '115', '', 'text_form', '<div id=\"raw_text_backup\" class=\"col-md-12\">\n<p><span style=\"font-size: 18pt;\">RBC: There is anisocytosis with dimorphic blood picture and target cells.</span></p>\n<p><span style=\"font-size: 18pt;\">WBC: There is neutrophilia with right shift. Lymphocytes are medium sized cells with some spindle shaped and activated forms.</span></p>\n<p><span style=\"font-size: 18pt;\">&nbsp;Platelets: Adequate on film.</span></p>\n<p><span style=\"font-size: 18pt;\">Comment: Mixed deficiency anaemia with a probable bacterial infection. Kindly correlate with clinical details.</span></p>\n<p>&nbsp;</p>\n</div>\n<div class=\"col-md-12\"><hr />&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;</div>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2020-05-30', NULL, '12:45:17', '3571', '2020-05-30', '12:45:42', NULL, NULL),
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
(403, '132', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '53-106', 'adult', 'inactive', 'Bolaji', '2020-07-20', NULL, '16:46:55', NULL, NULL, NULL, NULL, NULL),
(404, '132', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.5', 'adult', 'inactive', 'Bolaji', '2020-07-20', NULL, '16:47:16', NULL, NULL, NULL, NULL, NULL),
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
(471, '137', 'WBC', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '2.50-10.00', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:25:08', 's6068', '2022-09-17', '14:18:55', NULL, NULL),
(472, '137', 'Neutrophil #	 ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '1.25-5.75', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:25:56', NULL, NULL, NULL, NULL, NULL),
(473, '137', 'Lymphocyte#	 ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.65-3.75', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:26:31', NULL, NULL, NULL, NULL, NULL),
(474, '137', 'Monocyte#	 ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.03-0.61', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:26:59', NULL, NULL, NULL, NULL, NULL),
(475, '137', 'Eosinophil#	 ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.02-0.80', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:28:15', NULL, NULL, NULL, NULL, NULL),
(476, '137', 'Basophil#	 ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '0.00-0.10', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:28:44', NULL, NULL, NULL, NULL, NULL),
(477, '137', 'Neutrophil	', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '45.0-55.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:29:13', NULL, NULL, NULL, NULL, NULL),
(478, '137', 'Lymphocyte	', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '25.0-40.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:29:43', NULL, NULL, NULL, NULL, NULL),
(479, '137', 'Monocyte	 ', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '1.0-6.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:32:41', NULL, NULL, NULL, NULL, NULL),
(480, '137', 'Eosinophil	 ', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '1.0-8.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:33:54', NULL, NULL, NULL, NULL, NULL),
(481, '137', 'Basophil	 ', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '0.0-1.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:36:08', NULL, NULL, NULL, NULL, NULL),
(482, '137', 'RBC	 ', 'param_form', NULL, '', 'true', '<p>10<sup>12</sup>/L</p>', 'true', '4.50-6.50', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:36:48', NULL, NULL, NULL, NULL, NULL),
(483, '137', 'HGB	 ', 'param_form', NULL, '', 'true', '<p>g/dL</p>', 'true', '13.0-16.5', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:40:15', NULL, NULL, NULL, NULL, NULL),
(484, '137', 'HCT/PCV	 ', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '40.0-55.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:40:39', NULL, NULL, NULL, NULL, NULL),
(485, '137', 'MCV	 ', 'param_form', NULL, '', 'true', '<p>fL</p>', 'true', '76.0-96.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:41:10', NULL, NULL, NULL, NULL, NULL),
(486, '137', 'MCH	 ', 'param_form', NULL, '', 'true', '<p>pg</p>', 'true', '27.0-32.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:41:36', NULL, NULL, NULL, NULL, NULL),
(487, '137', 'MCHC	 ', 'param_form', NULL, '', 'true', '<p>g/dL</p>', 'true', '32.0-36.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:42:03', NULL, NULL, NULL, NULL, NULL),
(488, '137', 'RDW-CV	 ', 'param_form', NULL, '', 'true', '<p>%</p>', 'true', '10.0-15.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:43:43', NULL, NULL, NULL, NULL, NULL),
(489, '137', 'RDW-SD	 ', 'param_form', NULL, '', 'true', '<p>fL</p>', 'true', '35.0-56.0', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:44:10', NULL, NULL, NULL, NULL, NULL),
(490, '137', 'Platelet	 ', 'param_form', NULL, '', 'true', '<p>10<sup>9</sup>/L</p>', 'true', '100-450', 'adult', 'active', 'Bolaji', '2020-07-21', NULL, '11:44:43', NULL, NULL, NULL, NULL, NULL),
(491, '132', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '20-31', 'adult', 'active', 'Bolaji', '2020-07-22', NULL, '12:14:40', NULL, NULL, NULL, NULL, NULL),
(492, '132', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97-107', 'adult', 'active', 'Bolaji', '2020-07-22', NULL, '12:15:42', NULL, NULL, NULL, NULL, NULL),
(493, '132', 'Creatinine', 'param_form', NULL, '', 'true', '<p><span style=\"color: #212529; font-family: Poppi', 'true', '53-106', 'adult', 'inactive', 'Bolaji', '2020-07-22', NULL, '12:16:05', NULL, NULL, NULL, NULL, NULL),
(494, '132', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '17.7-70.7', 'adult', 'active', 'Bolaji', '2020-07-22', NULL, '12:16:43', 'Bolaji', '2020-10-09', '15:35:25', NULL, NULL),
(495, '132', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.0-6.5', 'adult', 'active', 'Bolaji', '2020-07-22', NULL, '12:17:03', 'Bolaji', '2020-10-09', '15:35:44', NULL, NULL),
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
(556, '171', 'Creatinine (Children)', 'param_form', NULL, '', 'true', '<p>&micro;mol/L</p>', 'true', '17.7-70.7', 'youth', 'active', 'Bolaji', '2021-03-05', NULL, '12:48:01', NULL, NULL, NULL, NULL, NULL),
(557, '171', 'Urea (Children)', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.0-6.5', 'youth', 'active', 'Bolaji', '2021-03-05', NULL, '12:48:51', NULL, NULL, NULL, NULL, NULL),
(558, '173', '', 'text_form', '<p>.</p>', '', NULL, NULL, NULL, NULL, NULL, 'active', '3571', '2021-04-02', NULL, '13:12:45', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `specimen_result_template` (`sn`, `bill_type_id`, `name`, `temp_type`, `raw_text_val`, `result`, `has_unit`, `unit`, `has_ref_val`, `ref_val`, `age_range`, `status`, `c_by`, `date_c`, `time_del`, `time_c`, `upd_by`, `date_upd`, `time_upd`, `del_by`, `date_del`) VALUES
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
(571, '175', 'Sodium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '135-155', 'adult', 'inactive', '3571', '2021-04-27', NULL, '09:24:54', NULL, NULL, NULL, NULL, NULL),
(572, '175', 'Potassium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '3.0-5.0', 'adult', 'active', '3571', '2021-04-27', NULL, '09:25:27', '3571', '2021-04-27', '09:26:05', NULL, NULL),
(573, '175', 'Sodium', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '135-155', 'adult', 'active', '3571', '2021-04-27', NULL, '09:25:55', NULL, NULL, NULL, NULL, NULL),
(574, '175', 'Chloride', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '97-107', 'adult', 'active', '3571', '2021-04-27', NULL, '09:26:33', NULL, NULL, NULL, NULL, NULL),
(575, '175', 'Bicarbonate', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '20-31', 'adult', 'inactive', '3571', '2021-04-27', NULL, '09:26:56', NULL, NULL, NULL, NULL, NULL),
(576, '175', 'Creatinine', 'param_form', NULL, '', 'true', '<p>&mu;mol/L</p>', 'true', '53-106', 'adult', 'active', '3571', '2021-04-27', NULL, '09:27:39', NULL, NULL, NULL, NULL, NULL),
(577, '175', 'Urea', 'param_form', NULL, '', 'true', '<p>mmol/L</p>', 'true', '2.5-6.5', 'adult', 'active', '3571', '2021-04-27', NULL, '09:28:03', NULL, NULL, NULL, NULL, NULL),
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
(710, '222', 'Haemoglobin', 'param_form', NULL, '', 'true', '<p>g/L</p>', 'true', '170-220', 'infant', 'active', '3571', '2022-07-07', NULL, '12:30:29', NULL, NULL, NULL, NULL, NULL);

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
(12, 1, '', '1234', 2, 100, 150, 200, 300, '2020-03-03', '10:45:33', 10, 0, 0, 0, 's6068', 's6068', 'yes', 'unpaid', 'LBRC0003', 'active');

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

INSERT INTO `system_info` (`sn`, `name`, `shortcut`, `theme`, `fa_icon`, `email`, `phone`, `address`, `street`, `logo`, `logo2`, `url`, `url2`, `header_image`, `footer_image`, `signatory_image`, `date_c`, `year_c`, `month_c`, `c_by`, `manager`) VALUES
(1, 'Bloodlink Haematological Ltd', 'BHL', 'Specialist Diagnostics Per Excellence ', 'fa fa-heart text-danger fa-2x', 'info@bloodlink.com', '08030000000', 'Ilorin, Fateh Road', '', 'admin_logo_mini.jpg', 'admin_logo.png', 'assets/images/', '../assets/images/', 'bg-1403845742.png', 'bg-1185332677.png', 'bg-1210447790.jpg', '01-10-2022', 2022, 9, '', 'Dr. Taiwo.');

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
(9, 's6068', 'ojo', 'dfe75bd98c8d113650e101c33fe1a93c', '$2y$10$jNxJT.XEkWnFYqyTKd.wDeVdy28XS8LjX4FSr/FZixfAWilRKqRiW', 'Ojo', 'Isaac', 'Mayowa', 'Ojo Isaac Mayowa', 'male', '0000-00-00', 'mayorjo4ever@gmail.com', '07030577951', '', 'Tanke, Ilorin ', '0000-00-00', '', 'active', 'on', 'fa fa-circle text-success', 's2583', '2018-02-03', '00:00:00', 's6068', '2020-01-10', '08:26:31', 'DESKTOP-TT4MBGU', '127.0.0.1'),
(20, 'accesschm001', 'accesschm001', '15560b05510c8cde1cda4644f0a7ff62', '$2y$10$LUU6MRprU63pM9VvbFcZHeqns5/das7MUO/lLC9FBHWOzZ9kkXVZe', 'Dr. Mba', 'Izuchukwu', 'Nnachi', 'Dr. Imba Izuchukwu Nnachi', 'male', '0000-00-00', '', '08039505256', NULL, 'Nile University of Nigeria ', '2022-09-17', NULL, 'inactive', 'off', 'fa fa-circle text-warning', 's6068', NULL, NULL, 's6068', '2024-09-28', '13:23:28', 'OJO-ISAAC-MAYOWA', '127.0.0.1');

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
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `blood_donation_test_result`
--
ALTER TABLE `blood_donation_test_result`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `blood_stocks`
--
ALTER TABLE `blood_stocks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `sn` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_payment_reversion`
--
ALTER TABLE `customer_payment_reversion`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_specimen`
--
ALTER TABLE `customer_specimen`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_specimen_result`
--
ALTER TABLE `customer_specimen_result`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_tickets`
--
ALTER TABLE `customer_tickets`
  MODIFY `sn` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pagegroups`
--
ALTER TABLE `pagegroups`
  MODIFY `sn` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `sn` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

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
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=711;

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
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
