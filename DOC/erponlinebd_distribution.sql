-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2011 at 01:38 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `erponlinebd_distribution`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_charts`
--

CREATE TABLE IF NOT EXISTS `ac_charts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `code` varchar(25) NOT NULL,
  `name` text NOT NULL,
  `memo` text NOT NULL,
  `type` enum('debit','credit') NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `ac_charts`
--

INSERT INTO `ac_charts` (`id`, `user_id`, `parent_id`, `code`, `name`, `memo`, `type`, `edate`) VALUES
(1, 15, 0, '10000', 'Assets', '', 'credit', '2011-08-10 19:46:18'),
(2, 15, 0, '20000', 'Liability', '', 'debit', '2011-08-10 19:50:14'),
(3, 15, 0, '30000', 'Equity', '', 'credit', '2011-08-10 19:57:28'),
(4, 15, 0, '40000', 'Revenue', '', 'credit', '2011-08-10 19:58:22'),
(5, 15, 0, '50000', 'Cost of Goods sold', '', 'debit', '2011-08-10 19:58:47'),
(6, 15, 0, '60000', 'Expense', '', 'debit', '2011-08-10 19:59:18'),
(7, 15, 1, '11000', 'Cash on Hand', '', 'credit', '2011-08-10 20:01:03'),
(8, 15, 7, '11010', 'Petty Cash', '', 'credit', '2011-08-10 20:01:54'),
(9, 15, 7, '11020', 'Cash in Registers', '', 'credit', '2011-08-10 20:15:58'),
(10, 15, 7, '11030', 'Savings Account', '', 'credit', '2011-08-10 20:21:21'),
(11, 15, 7, '11050', 'Accounts Receivable', '', 'credit', '2011-08-10 20:21:40'),
(12, 15, 1, '12000', 'Prepaid Expenses', '', 'credit', '2011-08-10 20:22:29'),
(13, 15, 12, '12010', 'Rent', '', 'credit', '2011-08-10 20:22:48'),
(14, 15, 1, '13000', 'Fixed Assets', '', 'credit', '2011-08-10 20:23:25'),
(15, 15, 14, '13010', 'Land', '', 'credit', '2011-08-10 20:23:50'),
(16, 15, 14, '13020', 'Building', '', 'credit', '2011-08-10 20:24:29'),
(17, 15, 14, '13030', 'Equipment', '', 'credit', '2011-08-10 20:24:52'),
(18, 15, 14, '13040', 'Furniture & Fixtures', '', 'credit', '2011-08-10 20:25:22'),
(19, 15, 14, '13050', 'Vehicles', '', 'credit', '2011-08-10 20:25:39'),
(20, 15, 1, '14000', 'Other Assets', '', 'credit', '2011-08-10 20:26:13'),
(21, 15, 20, '14010', 'Employee Advances', '', 'credit', '2011-08-10 20:35:15'),
(22, 15, 20, '14020', 'Security Deposits', '', 'credit', '2011-08-10 20:35:32'),
(23, 15, 2, '21000', 'Current Liabilities', '', 'debit', '2011-08-10 20:36:20'),
(24, 15, 23, '21010', 'Commissions Payable', '', 'debit', '2011-08-10 20:37:10'),
(25, 15, 23, '21020', 'Value Added Tax Payable', '', 'debit', '2011-08-10 20:37:30'),
(26, 15, 2, '22000', 'Wages and Salaries', '', 'debit', '2011-08-10 20:38:28'),
(27, 15, 26, '22010', 'Accrued Wages', '', 'debit', '2011-08-10 20:42:28'),
(28, 15, 26, '22020', 'Commissions', '', 'debit', '2011-08-10 20:42:48'),
(29, 15, 26, '22030', 'Employee Benefits Payable', '', 'debit', '2011-08-10 20:49:42'),
(30, 15, 2, '23000', 'Long Term Liabilities', '', 'debit', '2011-08-10 20:50:56'),
(31, 15, 30, '23010', 'Property Mortgage', '', 'debit', '2011-08-10 20:51:23'),
(32, 15, 30, '23020', 'Business Loans', '', 'debit', '2011-08-10 20:51:58'),
(33, 15, 30, '23030', 'Vehicle Loans', '', 'debit', '2011-08-10 20:52:18'),
(34, 15, 3, '31000', 'Capital', '', 'credit', '2011-08-10 22:16:46'),
(35, 15, 3, '32000', 'Drawing', '', 'credit', '2011-08-10 22:17:03');

-- --------------------------------------------------------

--
-- Table structure for table `ac_credit_voucher_details`
--

CREATE TABLE IF NOT EXISTS `ac_credit_voucher_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `chart_id` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ac_credit_voucher_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `ac_credit_voucher_master`
--

CREATE TABLE IF NOT EXISTS `ac_credit_voucher_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `voucher_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `memo` text NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ac_credit_voucher_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `ac_debit_voucher_details`
--

CREATE TABLE IF NOT EXISTS `ac_debit_voucher_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `chart_id` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ac_debit_voucher_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `ac_debit_voucher_master`
--

CREATE TABLE IF NOT EXISTS `ac_debit_voucher_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `voucher_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `memo` text NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ac_debit_voucher_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `ac_journal_voucher_details`
--

CREATE TABLE IF NOT EXISTS `ac_journal_voucher_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `chart_id` int(11) NOT NULL,
  `debit` double NOT NULL,
  `credit` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ac_journal_voucher_details`
--

INSERT INTO `ac_journal_voucher_details` (`id`, `user_id`, `voucher_no`, `chart_id`, `debit`, `credit`, `edate`) VALUES
(1, 15, 1001, 8, 5000, 0, '2011-08-11 09:29:26'),
(2, 15, 1001, 24, 0, 5000, '2011-08-11 09:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `ac_journal_voucher_master`
--

CREATE TABLE IF NOT EXISTS `ac_journal_voucher_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `voucher_no` int(11) NOT NULL,
  `voucher_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `memo` text NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ac_journal_voucher_master`
--

INSERT INTO `ac_journal_voucher_master` (`id`, `user_id`, `voucher_no`, `voucher_date`, `emp_id`, `memo`, `edate`) VALUES
(1, 15, 1001, '2011-08-11', 1, '', '2011-08-11 09:29:09'),
(2, 15, 1002, '2011-08-11', 2, '', '2011-08-11 13:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mpo_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `introduce` date NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `mpo_id`, `code`, `name`, `address`, `phone`, `introduce`, `edate`) VALUES
(3, 15, 2, '4001', 'ADORSAHO PHARMACY', 'Radagonj Bazar', '', '2011-08-27', '2011-08-27 16:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE IF NOT EXISTS `emp_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `emp_code` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `join` date NOT NULL,
  `address` text NOT NULL,
  `level` varchar(20) NOT NULL,
  `area` varchar(50) NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`id`, `user_id`, `emp_code`, `name`, `dob`, `join`, `address`, `level`, `area`, `edate`) VALUES
(1, 15, '', 'Md. Moinuddin Didar', '1985-06-15', '2000-06-15', '8/5, Jigatola', 'RSM', 'Dhaka', '2011-06-20'),
(2, 15, '', 'Tapan Kumer das', '1985-06-15', '2000-06-15', '8/3, Segun Bagichs', 'SM', 'Dhaka', '2011-06-26');

-- --------------------------------------------------------

--
-- Table structure for table `emp_levels`
--

CREATE TABLE IF NOT EXISTS `emp_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `serial` int(11) NOT NULL,
  `level` text NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `emp_levels`
--

INSERT INTO `emp_levels` (`id`, `user_id`, `serial`, `level`, `edate`) VALUES
(8, 15, 5, 'GM (Sales & Marketing)', '2011-07-05'),
(9, 15, 10, 'NSM', '2011-07-05'),
(10, 15, 15, 'SM', '2011-07-05'),
(11, 15, 20, 'DSM', '2011-07-05'),
(12, 15, 25, 'ASM', '2011-07-05'),
(13, 15, 30, 'RSM', '2011-07-05'),
(14, 15, 35, 'AFM', '2011-07-05'),
(15, 15, 40, 'MPO', '2011-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `finish_items`
--

CREATE TABLE IF NOT EXISTS `finish_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `description` text NOT NULL,
  `generic_name` text NOT NULL,
  `pack_size` text NOT NULL,
  `trade_price` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=106 ;

--
-- Dumping data for table `finish_items`
--

INSERT INTO `finish_items` (`id`, `user_id`, `code`, `description`, `generic_name`, `pack_size`, `trade_price`, `edate`) VALUES
(16, 15, 'ACDS', 'Acedone -Z Sus.', 'Antacid Sus.', '200ml', 28.58, '2011-09-05 12:21:22'),
(17, 15, 'ACDT', 'Acedone -Z Tablet', 'Antacid Tablet ', '25X10s', 116.5, '2011-09-05 12:30:12'),
(18, 15, 'AMX2', 'Amoxizen 250mg Cap', 'Amoxycilin 250mg', '10X10s', 307.74, '2011-09-05 12:32:28'),
(19, 15, 'AMX5', 'Amoxizen DS  Cap', 'Amoxycilin 500mg', '5 X10s', 266.85, '2011-09-05 12:33:33'),
(20, 15, 'AMXS', 'Amoxizen Dry Syrup', 'Amoxycilin Dry Powder', '100ml', 40.02, '2011-09-05 12:34:19'),
(21, 15, 'ACPT', 'Acep Tab', 'Paracitamol 500mg', '20X10s', 105.51, '2011-09-05 12:35:11'),
(22, 15, 'ACPS', 'Acep Sus', 'Paracitamol Sus', '60ml', 14.07, '2011-09-05 12:36:15'),
(23, 15, 'ACPD', 'Acep Padiatric Drop', 'Paracitamol Drop', '15ml', 9.56, '2011-09-05 12:36:59'),
(24, 15, 'ACPP', 'Acep Plus Tablet', 'Paracitamol BP 500mg & Caffeine BP', '10X10s', 131.89, '2011-09-05 12:44:22'),
(25, 15, 'ATZ5', 'Atezen 50Tab', 'Atenolol 50mg Tab', '10X10s', 67.7, '2011-09-05 12:45:39'),
(26, 15, 'ATZ1', 'Atezen 100 Tab', 'Atenolol 100mg  Tab', '10X10s', 119.58, '2011-09-05 12:46:16'),
(27, 15, 'ATZP', 'Atezen Puls Tablet', 'Amlodipine 5mg +Atenolol 50mg BP', '10X5s', 158.26, '2011-09-05 12:47:01'),
(28, 15, 'ALBZ', 'Albezen 400 Tab', 'Abendazole 400mg', '30X2s', 158.26, '2011-09-05 12:48:01'),
(29, 15, 'CPD2', 'Cephid 250mg Cap', 'Cephradine 250mg', '6X5s', 171.45, '2011-09-05 12:49:39'),
(30, 15, 'CPD5', 'Cephid 500mg Cap', 'Cephradine 500mg', '5X4s', 219.81, '2011-09-05 12:50:31'),
(31, 15, 'CPDS', 'Cephid Dry Syrup', 'Cephradine Dry Powder', '100ml', 70.34, '2011-09-06 09:28:11'),
(32, 15, 'CTPL', 'Catopil 12.5 Tab', 'Captopril USP 12.50mg', '10X10s', 153.87, '2011-09-06 09:29:22'),
(33, 15, 'CTP2', 'Catopil 25 Tab', 'Captopril USP 25mg', '10X10s', 263.77, '2011-09-06 09:30:44'),
(34, 15, 'CTRS', 'Cotrazen Sus', 'Co-Trimoxazole Sus.', '60ml', 18.66, '2011-09-06 09:32:38'),
(35, 15, 'CTR8', 'Cotrazen Tablet', 'Co-Trimoxazole 480mg', '10X10s', 114.3, '2011-09-06 09:33:39'),
(36, 15, 'CTR9', 'Cotrazen DS Tablet', 'Co-Trimoxazole 960mg', '10X10s', 175.85, '2011-09-06 09:35:01'),
(37, 15, 'CLZD', 'Calcizen DS Tablet ', 'Calcium Carbonate 500mg', '10X5s', 87.92, '2011-09-06 09:36:34'),
(38, 15, 'CTZ2', 'Citizen 10mg Tablet', 'Cetrizine Dihydrochloide BP', '10X10s', 175.85, '2011-09-06 09:40:33'),
(39, 15, 'CLZN', 'Calcizen Tablet', 'Calcium Lactate 300mg', '50mg', 17.58, '2011-09-06 09:42:32'),
(40, 15, 'CIPS', 'Ciprozen PFS', 'Ciprofloxacin Dry Powder', '60ml', 65.94, '2011-09-06 09:44:08'),
(41, 15, 'CIPT', 'Ciprozen 250 Tablet', 'Ciprofloxacin 250mg', '10X5s', 351.7, '2011-09-06 09:45:27'),
(42, 15, 'CIPD', 'Ciprozen DS Tablet ', 'Ciprofloxacin 500mg', '10X5s', 615.47, '2011-09-06 09:46:33'),
(43, 15, 'DCLT', 'Diclonil 50mg Tablet', 'Diclofenace Sudium 50mg', '10X10s', 70.34, '2011-09-06 09:48:59'),
(44, 15, 'DCLR', 'Diclonil SR Cap', 'Diclofenace Sudium SR Pellets', '10X10s', 263.77, '2011-09-06 09:49:52'),
(45, 15, 'DXZC', 'Doxizen Cap', 'Doxycycline 100mg', '10X10s', 189.04, '2011-09-06 09:55:23'),
(46, 15, 'DSLS', 'Desol Syrup', 'Desloratadine', '60ml', 21.98, '2011-09-06 09:56:39'),
(47, 15, 'DSNT', 'Deson Tablet ', 'Dexamethasone BP 0.5mg', '10X25s', 109.91, '2011-09-06 09:58:12'),
(48, 15, 'DFM5', 'Deformin 500mg Tab', 'Metformin Hydrocloride 500mg', '10X10s', 131.89, '2011-09-06 10:00:53'),
(49, 15, 'DFM8', 'Deformin 850mg Tab', 'Metformin Hydrocloride 850mg', '10X10s', 263.77, '2011-09-06 10:01:25'),
(50, 15, 'EPNS', 'Epson Tab', 'Clobazam BP 10mg', '10X10s', 246.19, '2011-09-06 10:02:28'),
(51, 15, 'EPA2', 'Epa -20 mg Tab', 'Esomeprazole 20mg ', '10X5s', 175.85, '2011-09-06 10:15:56'),
(52, 15, 'EDS6', 'Edone Sus 60', 'Domperidone Sus. ', '60ml', 24.62, '2011-09-06 10:17:57'),
(53, 15, 'EDN1', 'Edone Sus', 'Domperidone Sus.', '100ml', 33.41, '2011-09-06 10:19:43'),
(54, 15, 'EDNT', 'Edone Tablet ', 'Domperidone 10mg', '10X10s', 175.85, '2011-09-06 10:21:09'),
(55, 15, 'ERZ2', 'Eryzen 250mg Tab', 'Erythromycin 250mg', '10X6s', 229.48, '2011-09-06 10:25:55'),
(56, 15, 'ERZ5', 'Eryzen 500mg Tab.', 'Erythromycin 500mg', '4X5s', 151.23, '2011-09-06 10:26:46'),
(57, 15, 'ERZS', 'Eryzen Dry Syrup', 'Erythromycin Dry Powder', '100ml', 49.8, '2011-09-06 10:27:34'),
(58, 15, 'ECV3', 'EC - Vit Tab', 'Vitamin A,C,& E ', '30s', 65.94, '2011-09-06 10:30:29'),
(59, 15, 'ECV2', 'EC - Vit Tab', 'Vitamin A,C,& E ', '20s', 43.96, '2011-09-06 10:31:04'),
(60, 15, 'FFCP', 'F+F Capsule', 'Ferrous Sulphate & Folic Acid', '10X5s', 105.07, '2011-09-06 10:35:34'),
(61, 15, 'FLX2', 'Flxzen 250mg Cap', 'Flucloxacillin 250mg', '10X6s', 263.77, '2011-09-06 10:36:22'),
(62, 15, 'FLX5', 'Flxzen 500mg Cap.', 'Flucloxacillin 500mg', '4X5s', 140.68, '2011-09-06 10:39:43'),
(63, 15, 'FLXS', 'Flxzen PFS', 'Flucloxacillin Dry Powder', '100ml', 52.75, '2011-09-06 10:40:43'),
(64, 15, 'GTZ2', 'Gatizen 200mg Tab', 'Gatifloxacillin 200mg ', '6X5s', 158.26, '2011-09-06 10:45:26'),
(65, 15, 'GTZ4', 'Gatizen 400mg Tab', 'Gatifloxacillin 400mg', '6X3s', 158.26, '2011-09-06 10:46:16'),
(66, 15, 'GRZT', 'Grisozen Tab', 'Griseofulvin 500mg', '10X5s', 244.43, '2011-09-06 10:47:08'),
(67, 15, 'HBS1', 'Himobin Syrup', 'Ferrous Sulphate', '100ml', 15.83, '2011-09-06 12:38:08'),
(68, 15, 'HBS2', 'Himobin Syrup', 'Ferrous Sulphate', '200ml', 21.1, '2011-09-06 12:38:52'),
(69, 15, 'HMPC', 'Hemo Plus Cap', 'Carbonyl Iron+Folic Acid+Zinc Sul.', '10X3s', 79.13, '2011-09-06 12:39:45'),
(70, 15, 'IBNT', 'Iben 400mg Tab', 'Ibuprofen 400mg', '10X10s', 114.3, '2011-09-08 10:00:44'),
(71, 15, 'LXN2', 'Lexazen 250mg Tab', 'Levofloxacillin 250mg', '6X5s', 211.02, '2011-09-08 10:01:28'),
(72, 15, 'LXN5', 'Lexazen 500mg Tab', 'Levofloxacillin 500mg', '6X3s', 221.57, '2011-09-08 10:02:49'),
(73, 15, 'LPST', 'Lopos 25mg Tab', 'Losartan Potassium 25mg ', '10X3s', 92.32, '2011-09-08 10:04:49'),
(74, 15, 'LPST', 'Lopos 25mg Tab', 'Losartan Potassium 25mg', '10X10s', 307.74, '2011-09-08 10:05:49'),
(75, 15, 'LPT5', 'Lopos 50mg Tab', 'Losartan Potassium 50mg', '10X3s', 158.26, '2011-09-08 10:17:47'),
(76, 15, 'LPT5', 'Lopos 50mg Tab', 'Losartan Potassium 50mg ', '10X10s', 527.55, '2011-09-08 10:21:32'),
(77, 15, 'LPPT', 'Lopos Plus Tab', 'Losartan Potassium 100mg HCl25mg', '10X5s', 439.62, '2011-09-08 10:40:59'),
(79, 15, 'LFNT', 'Lofens Tablet', 'Aceclofenac BP 100mg', '10X10s', 131.89, '2011-09-08 10:54:43'),
(80, 15, 'LZNT', 'Lizen Tab', 'Linezolid 600mg', '10X10s', 2, '2011-09-08 11:42:54'),
(81, 15, 'LZNS', 'Lizen PFS', 'Linezolid Dry Powder', '100ml', 246.19, '2011-09-08 11:44:30'),
(82, 15, 'LCTT', 'Lecitin Tab', 'Levocetirizine 2 HCl', '10X10s', 175.85, '2011-09-08 12:08:40'),
(83, 15, 'MTZT', 'Metrozen Tab', 'Metronidazole 400mg', '20X10s', 188.16, '2011-09-08 12:11:03'),
(84, 15, 'MTZS', 'Metrozen Sus', 'Metronidazole Suspension', '60ml', 18.73, '2011-09-08 12:11:59'),
(85, 15, 'MCRT', 'M - Card Tab', 'Amlodipine', '10X5s', 175.85, '2011-09-08 12:34:05'),
(86, 15, 'MLTT3', 'Multical Tab', 'Calcium+Vit.D3+Minerals', '30s', 105.51, '2011-09-08 12:51:55'),
(87, 15, 'MLTT2', 'Multical Tab', 'Calcium+Vit.D3+Minerals', '20s', 77.55, '2011-09-08 12:53:13'),
(88, 15, 'MNS1', 'Monovit Syrup', 'Zinc Sulphate+Vitaminc B Comp. Monohydrate', '100ml', 39.57, '2011-09-08 12:54:17'),
(89, 15, 'MNS2', 'Monovit Syrup', 'Zinc Sulphate+Vitaminc B Comp. Monohydrate', '200ml', 70.34, '2011-09-08 12:55:04'),
(90, 15, 'MCD1', 'Minicord', 'Multivitamin with Cord Liver', '100ml', 70.34, '2011-09-08 12:56:02'),
(91, 15, 'MCD2', 'Minicord', 'Multivitamin with Cord Liver', '100ml', 0, '2011-09-08 12:57:22'),
(92, 15, 'MMGL', 'M.M.Gold', 'Multivitamin & Minerals,A to Z', '30s', 149.47, '2011-09-08 12:58:35'),
(93, 15, 'MMG1', 'M.M.Gold', 'Multivitamin & Minerals,A to Z', '15s', 74.73, '2011-09-08 12:59:24'),
(94, 15, 'NPRX', 'Naproxen SR 500', 'Naproxen Sodium USP 500MG', '3X10s', 184.64, '2011-09-10 11:28:49'),
(95, 15, 'OPZ2', 'Opezen 20 Cap', 'Omeprazole 20mg', '10X6s', 211.02, '2011-09-10 11:30:24'),
(96, 15, 'OPZ4', 'Opezen 40 Cap', 'Omeprazole 40mg', '4X5s', 123.09, '2011-09-10 11:31:07'),
(97, 15, 'ORSL', 'O Saline', 'Oral Rehydration Saline', '20 Sachet', 56.27, '2011-09-10 11:33:30'),
(98, 15, 'ORSN', 'O Saline N', 'Oral Rehydration Saline', '20 Sachet', 53.81, '2011-09-10 11:34:52'),
(99, 15, 'OFRS', 'O Fruity Saline', 'Oral Rehydration Saline', '20 Sachet', 53.81, '2011-09-10 11:36:27'),
(100, 15, 'RSLN', 'Rice Saline', 'Oral Rehydration Saline', '20 Sachet', 105.51, '2011-09-10 11:37:35'),
(101, 15, 'RSNL', 'OR-500 Tab', 'Ornidazole 500mg', '10X3s', 171.45, '2011-09-10 11:38:56'),
(102, 15, 'ONCT', 'Onicon Tab', 'Fluconazole', '10X5s', 263.77, '2011-09-10 11:40:12'),
(103, 15, 'ONCS', 'Onicon Syrup', 'Fluconazole Dry Powder', '35ml', 57.15, '2011-09-10 11:42:45'),
(104, 15, 'PRZT', 'Prozen Tab', 'Promethazine Hydcl. 25mg', '50X10s', 184.64, '2011-09-10 12:08:54'),
(105, 15, 'PCVT', 'Pacin -V Tab', 'Phenoxymethyl Penicillin BP250mg', '10X10s', 110.94, '2011-09-10 12:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `finish_receive_details`
--

CREATE TABLE IF NOT EXISTS `finish_receive_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `receive_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `finish_receive_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `finish_receive_master`
--

CREATE TABLE IF NOT EXISTS `finish_receive_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `receive_no` varchar(20) NOT NULL,
  `receive_date` date NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `finish_receive_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `finish_return_details`
--

CREATE TABLE IF NOT EXISTS `finish_return_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `return_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `finish_return_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `finish_return_master`
--

CREATE TABLE IF NOT EXISTS `finish_return_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `return_no` varchar(20) NOT NULL,
  `return_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `finish_return_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `finish_sales_details`
--

CREATE TABLE IF NOT EXISTS `finish_sales_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `item_id` varchar(25) NOT NULL,
  `quantity` double NOT NULL,
  `bonus_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `vat` double NOT NULL,
  `total_price` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `finish_sales_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `finish_sales_master`
--

CREATE TABLE IF NOT EXISTS `finish_sales_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `sales_no` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `sales_date` date NOT NULL,
  `mpo_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `commission` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `finish_sales_master`
--

INSERT INTO `finish_sales_master` (`id`, `user_id`, `sales_no`, `invoice_no`, `sales_date`, `mpo_id`, `customer_id`, `type`, `commission`, `edate`) VALUES
(3, 15, '1', '201109151', '2011-09-15', 2, 3, 'cash', 0, '2011-09-15 11:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `hr_asm_info`
--

CREATE TABLE IF NOT EXISTS `hr_asm_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `rsm_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `joining` date NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `hr_asm_info`
--

INSERT INTO `hr_asm_info` (`id`, `user_id`, `rsm_id`, `code`, `name`, `designation`, `zone`, `joining`, `edate`) VALUES
(2, 15, 2, '2001', 'Mr. kamal Uddin', 'Sr.AFM', 'Bhairab', '2011-08-27', '2011-08-27 16:28:38'),
(3, 15, 2, '2002', 'Mr. Mostafizur Rahman', 'AFM', 'Narayongonj', '2011-08-28', '2011-08-28 09:08:45'),
(4, 15, 2, '2003', 'Mr. Mosharraf Hossain', 'AFM', 'Munshigonj', '2011-08-28', '2011-08-28 09:10:35'),
(6, 15, 2, '2004', 'Mr. Abdul Matin', 'AFM', 'Norsingdi', '2011-08-28', '2011-08-28 09:12:53'),
(7, 15, 2, '2005', 'Mr. Jewel Mirdha', 'AFM', 'Kunchpur', '2011-08-28', '2011-08-28 09:14:03'),
(8, 15, 2, '2006', 'Mr. Kazi Faruk', 'AFM', 'Sonargoan', '2011-08-28', '2011-08-28 09:15:10'),
(9, 15, 3, '2007', 'Mr. Mostafa Kamal Gazi', 'Sr.AFM', 'Gazipur', '2011-09-04', '2011-09-04 11:45:15'),
(10, 15, 3, '2008', 'Mr. Mrinal Kanti Mazumder', 'AFM', 'Savar-A', '2011-09-04', '2011-09-04 11:48:28'),
(11, 15, 3, '2009', 'Mr. Masuk Ali Khan', 'RSM', 'Mirpur', '2011-09-04', '2011-09-04 11:52:09'),
(12, 15, 3, '2010', 'Mr. Nazmul Islam', 'Sr.AFM', 'Manikgonj', '2011-09-04', '2011-09-04 11:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `hr_mpo_info`
--

CREATE TABLE IF NOT EXISTS `hr_mpo_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `asm_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `joining` date NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `hr_mpo_info`
--

INSERT INTO `hr_mpo_info` (`id`, `user_id`, `asm_id`, `code`, `name`, `designation`, `zone`, `joining`, `edate`) VALUES
(2, 15, 2, '3001', 'Mr. Shafiqul Islam', 'MPO', 'Raypura', '2011-08-27', '2011-08-27 16:30:17'),
(3, 15, 2, '3002', 'Mr. Bodi Uddin', 'MPO', 'Bairab Sadar', '2011-08-27', '2011-08-27 16:32:06'),
(4, 15, 2, '3003', 'Mr. Anamul Hoque', 'MPO', 'Ashugonj', '2011-08-28', '2011-08-28 09:18:05'),
(5, 15, 2, '3004', 'Mr. Shebak Ch. Roy', 'AFM', 'Austogram', '2011-08-28', '2011-08-28 09:19:15'),
(6, 15, 2, '3005', 'Mr. Mizanur Rahman', 'MPO', 'Bairab Sadar', '2011-08-28', '2011-08-28 09:19:48'),
(7, 15, 2, '3006', 'Mr. Jahir Rayhan', 'MPO', 'KuliarChar', '2011-08-28', '2011-08-28 09:20:39'),
(8, 15, 3, '3007', 'Mr. Anisur Rahman', 'MPO', 'Narayongonj(Bondar)', '2011-08-28', '2011-08-28 09:21:52'),
(9, 15, 3, '3008', 'Mr. Mahabubur Rahman', 'MPO', 'Fatullh', '2011-08-28', '2011-08-28 09:22:53'),
(10, 15, 3, '3009', 'Mr. Hibzur Rahman', 'MPO', 'Narayongonj-1', '2011-08-28', '2011-08-28 09:23:52'),
(11, 15, 3, '3010', 'Mr. Mashiur Rahman', 'MPO', 'Narayongonj-2', '2011-08-28', '2011-08-28 09:24:35'),
(12, 15, 3, '3011', 'Mr. Kamrul Hasan', 'MPO', 'Ctg Road', '2011-08-28', '2011-08-28 09:25:46'),
(13, 15, 4, '3012', 'Mr. khorsed Alom', 'MPO', 'Dohar', '2011-08-28', '2011-08-28 09:26:23'),
(14, 15, 4, '3013', 'Mr. Abul Hashem', 'MPO', 'Nawabgonj', '2011-08-28', '2011-08-28 09:27:26'),
(16, 15, 4, '3015', 'Mr. Babul Hossain', 'MPO', 'Sirajdikhan', '2011-08-28', '2011-08-28 09:28:58'),
(17, 15, 4, '3016', 'Mr. kamal Uddin Sarder', 'MPO', 'Munshigonj Sadar', '2011-08-28', '2011-08-28 09:30:14'),
(18, 15, 6, '3017', 'Mr. Ariful Islam', 'MPO', 'Bhairob-2', '2011-08-28', '2011-08-28 09:31:07'),
(20, 15, 6, '3019', 'Mr. Jillor Rahman', 'MPO', 'Norsingdi-1', '2011-08-28', '2011-08-28 09:32:29'),
(21, 15, 6, '3020', 'Mr. Aboni Mandal', 'MPO', 'Norsingdi Sadar-1', '2011-08-28', '2011-08-28 09:34:54'),
(22, 15, 6, '3021', 'MR. Alamgir Hossain', 'MPO', 'Norsingdi Sadar-2', '2011-08-28', '2011-08-28 09:35:37'),
(23, 15, 6, '3022', 'Mr. Maksudul Haque', 'MPO', 'Bairab', '2011-08-28', '2011-08-28 09:36:53'),
(24, 15, 8, '3023', 'Mr. Rafiqul Islam', 'MPO', 'Ullapara', '2011-08-28', '2011-08-28 09:39:56'),
(25, 15, 8, '3024', 'Mr. Ibrahim Islam', 'MPO', 'Sonargoan-2', '2011-08-28', '2011-08-28 09:40:34'),
(26, 15, 8, '3025', 'Mr. Rafiqul Islam', 'MPO', 'Narayongonj-1(Magna)', '2011-08-28', '2011-08-28 09:41:29'),
(27, 15, 8, '3026', 'Mr. Noor Mohammad', 'MPO', 'Madhabdi', '2011-08-28', '2011-08-28 09:42:21'),
(28, 15, 8, '3027', 'Mr. Nazim Sikder', 'MPO', 'Gozaria', '2011-08-28', '2011-08-28 09:43:07'),
(29, 15, 8, '3028', 'Mr. Sohel Rana', 'MPO', 'Arai Hazar', '2011-08-28', '2011-08-28 09:44:17'),
(30, 15, 8, '3029', 'Mr. Sujon Mollah', 'MPO', 'Bulta', '2011-08-28', '2011-08-28 09:45:14'),
(31, 15, 7, '3030', 'Mr. Sumon Hossain', 'MPO', 'Kanchpur-1(Rupgonj)', '2011-08-28', '2011-08-28 09:48:10'),
(32, 15, 7, '3031', 'Mr. Abbas Ali', 'MPO', 'Kanchpur-2', '2011-08-28', '2011-08-28 09:49:01'),
(34, 15, 6, '3032', 'Mr. Alauddin', 'MPO', 'Shibpur', '2011-08-28', '2011-08-28 09:53:00'),
(35, 15, 7, '3033', 'Mr. Azam Khan', 'MPO', 'Kanchpur-3(Domar)', '2011-08-28', '2011-08-28 09:55:35'),
(36, 15, 7, '3034', 'Mr. Mofazzal Hossain', 'MPO', 'Matuail', '2011-08-28', '2011-08-28 09:56:26'),
(37, 15, 0, '3035', 'Mr. Sujon Mollah', 'MPO', 'Bulta', '2011-08-28', '2011-08-28 09:57:42'),
(38, 15, 2, '3033', '', '', '', '2011-08-28', '2011-08-28 10:15:02'),
(39, 15, 9, '3034', 'Mr. Mostafa Kamal Gazi', 'MPO', 'Gazipur', '2011-09-04', '2011-09-04 11:45:46'),
(40, 15, 9, '3035', 'Mr. Kazi Maherul Islam', 'MPO', 'Joydabpur', '2011-09-04', '2011-09-04 11:46:34'),
(41, 15, 9, '3036', 'Mr. Masud Rana', 'MPO', 'Joydabpur-2', '2011-09-04', '2011-09-04 11:47:04'),
(42, 15, 10, '3037', 'Mr. Utpal Kumar Das', 'MPO', 'Mirpur', '2011-09-04', '2011-09-04 11:49:20'),
(43, 15, 0, '3038', 'Mr. Monir Hossain', 'MPO', 'Zirani', '2011-09-04', '2011-09-04 11:49:51'),
(44, 15, 10, '3039', 'Mr. Abu Saleh Md Hasan', 'MPO', 'Kaliarkoir', '2011-09-04', '2011-09-04 11:50:47'),
(45, 15, 11, '3040', 'Mr. Asaduzzaman', 'MPO', 'Mirpur-12', '2011-09-04', '2011-09-04 11:52:54'),
(46, 15, 11, '3041', 'Mr. Amdadul Hoque', 'MPO', 'Badda', '2011-09-04', '2011-09-04 11:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `hr_rsm_info`
--

CREATE TABLE IF NOT EXISTS `hr_rsm_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `zone` varchar(50) NOT NULL,
  `joining` date NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `hr_rsm_info`
--

INSERT INTO `hr_rsm_info` (`id`, `user_id`, `code`, `name`, `designation`, `zone`, `joining`, `edate`) VALUES
(2, 15, '1001', 'Mr. Abdul Razzak', 'RSM', 'Dhaka-A', '2011-08-27', '2011-08-27 16:26:26'),
(3, 15, '1002', 'Mr. Masuk Ali Khan', 'RSM', 'Dhaka-B', '2011-09-04', '2011-09-04 10:54:55'),
(5, 15, '1003', 'Mr. Mahabub Morshed', 'RSM', 'Mymensingh', '2011-09-04', '2011-09-04 10:56:29'),
(6, 15, '1004', 'Mr. Alauddin', 'Sr. RSM', 'Barishal', '2011-09-04', '2011-09-04 10:57:14'),
(7, 15, '1005', 'Mr. Anando Mohon Basu', 'RSM', 'Khulna', '2011-09-04', '2011-09-04 10:58:01'),
(8, 15, '1006', 'Mr. Rashad Alom', 'RSM', 'Rangpur', '2011-09-04', '2011-09-04 11:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `raw_items`
--

CREATE TABLE IF NOT EXISTS `raw_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `name` text NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=5 ;

--
-- Dumping data for table `raw_items`
--

INSERT INTO `raw_items` (`id`, `user_id`, `code`, `name`, `edate`) VALUES
(4, 15, '1001', 'another item', '2011-06-30 20:23:50'),
(3, 15, 'abc', 'Moida', '2011-06-30 20:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `raw_receive_details`
--

CREATE TABLE IF NOT EXISTS `raw_receive_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `receive_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `raw_receive_details`
--

INSERT INTO `raw_receive_details` (`id`, `user_id`, `receive_id`, `item_id`, `quantity`, `unit_price`, `total_price`, `edate`) VALUES
(4, 15, 2, 4, 43, 0, 0, '2011-07-02 11:06:27'),
(5, 15, 3, 3, 12, 0, 0, '2011-07-10 07:59:10'),
(6, 15, 2, 1, 20, 0, 0, '2011-07-16 07:32:53'),
(7, 15, 3, 1, 30, 0, 0, '2011-07-16 07:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `raw_receive_master`
--

CREATE TABLE IF NOT EXISTS `raw_receive_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `receive_no` varchar(20) NOT NULL,
  `receive_date` date NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `raw_receive_master`
--


-- --------------------------------------------------------

--
-- Table structure for table `raw_supply_details`
--

CREATE TABLE IF NOT EXISTS `raw_supply_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `supply_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `raw_supply_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `raw_supply_master`
--

CREATE TABLE IF NOT EXISTS `raw_supply_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `supply_no` varchar(20) NOT NULL,
  `supply_date` date NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `raw_supply_master`
--

INSERT INTO `raw_supply_master` (`id`, `user_id`, `supply_no`, `supply_date`, `edate`) VALUES
(1, 15, '321', '2011-07-16', '2011-07-16 06:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `sales_offices`
--

CREATE TABLE IF NOT EXISTS `sales_offices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sales_offices`
--

INSERT INTO `sales_offices` (`id`, `user_id`, `name`, `edate`) VALUES
(1, 15, 'Dhaka', '2011-08-14 18:36:31'),
(2, 15, 'Barishal', '2011-08-14 18:36:36'),
(3, 15, 'Rajshahi', '2011-08-14 18:36:51'),
(4, 15, 'Savar', '2011-08-14 18:36:55'),
(5, 15, 'DHAKA', '2011-09-06 11:14:28'),
(6, 15, 'DHAKA', '2011-09-06 11:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `sample_receive_details`
--

CREATE TABLE IF NOT EXISTS `sample_receive_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `receive_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sample_receive_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `sample_receive_master`
--

CREATE TABLE IF NOT EXISTS `sample_receive_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `receive_no` varchar(20) NOT NULL,
  `receive_date` date NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sample_receive_master`
--

INSERT INTO `sample_receive_master` (`id`, `user_id`, `receive_no`, `receive_date`, `edate`) VALUES
(2, 15, '123456', '2011-07-01', '2011-07-02 11:06:20'),
(3, 15, '64332', '2011-07-06', '2011-07-16 07:33:39'),
(4, 15, '34324', '2011-08-01', '2011-08-18 17:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `sample_supply_details`
--

CREATE TABLE IF NOT EXISTS `sample_supply_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `supply_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `total_price` double NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sample_supply_details`
--

INSERT INTO `sample_supply_details` (`id`, `user_id`, `supply_id`, `item_id`, `quantity`, `unit_price`, `total_price`, `edate`) VALUES
(5, 15, 3, 1, 65, 0, 0, '2011-07-16 06:51:45'),
(6, 15, 3, 1, 15, 0, 0, '2011-07-16 06:53:31'),
(7, 15, 4, 1, 45, 0, 0, '2011-07-16 07:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `sample_supply_master`
--

CREATE TABLE IF NOT EXISTS `sample_supply_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `supply_no` varchar(20) NOT NULL,
  `supply_date` date NOT NULL,
  `emp_id` int(11) NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sample_supply_master`
--

INSERT INTO `sample_supply_master` (`id`, `user_id`, `supply_no`, `supply_date`, `emp_id`, `edate`) VALUES
(3, 15, '5432', '2011-07-15', 0, '2011-07-16 06:42:40'),
(4, 15, '4567', '2011-07-16', 2, '2011-07-16 07:21:22');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `email` text NOT NULL,
  `edate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `user_id`, `fname`, `email`, `edate`) VALUES
(1, 0, 'Nazim Zaman Pathan', 'nazim@innovativebd.info', '2010-04-12'),
(6, 1, 'Piko', '', '2010-05-01'),
(9, 15, 'supplier 01', '', '2010-05-03'),
(10, 15, 'supplier 02', '', '2010-05-03'),
(11, 15, 'supplier 03', '', '2010-05-03'),
(12, 15, 'supplier 04', '', '2010-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `type` varchar(8) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `code` varchar(32) NOT NULL,
  `edate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `password`, `full_name`, `type`, `status`, `code`, `edate`) VALUES
(15, 15, 'tapan29bd@gmail.com', 'd033e22ae348aeb5', 'Tapan', 'admin', 'active', '', '2010-05-03 00:00:00'),
(20, 15, 'moinuddindidar@gmail.com', 'd033e22ae348aeb5', 'Md. Moinuddin Didar', 'admin', 'active', '', '2011-06-05 00:00:00');
