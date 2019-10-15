-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 11:29 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_cvf`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_voucher`
--

CREATE TABLE IF NOT EXISTS `check_voucher` (
`cv_id` int(11) NOT NULL,
  `cv_date` varchar(20) DEFAULT NULL,
  `payee` varchar(255) DEFAULT NULL,
  `transaction_date` varchar(20) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `original_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment` decimal(10,2) NOT NULL DEFAULT '0.00',
  `check_no` varchar(100) DEFAULT NULL,
  `check_date` varchar(20) DEFAULT NULL,
  `description` text,
  `prepared_by` varchar(255) DEFAULT NULL,
  `checked_by` varchar(255) DEFAULT NULL,
  `approved_by` varchar(255) DEFAULT NULL,
  `released_by` varchar(255) DEFAULT NULL,
  `received_by` varchar(255) DEFAULT NULL,
  `or_no` varchar(255) DEFAULT NULL,
  `saved` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_voucher`
--

INSERT INTO `check_voucher` (`cv_id`, `cv_date`, `payee`, `transaction_date`, `reference`, `original_amount`, `payment`, `check_no`, `check_date`, `description`, `prepared_by`, `checked_by`, `approved_by`, `released_by`, `received_by`, `or_no`, `saved`) VALUES
(1, '2019-08-05', 'CEMPCO', '2019-04-27', 'AP 2019-00944', '18000.00', '18000.00', 'DBP497650', '2019-08-05', 'Rental of 56.93sqm Office @ CEMPCO Bldg for the period covered June 5, 2019-March 5, 2021', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '2019-08-02', 'Marhil Spring Purified Water Station', '2019-07-26', 'AP 2019-01667', '990.00', '990.00', 'AUB549379', '2019-08-02', 'July 20, 2019  DR# 0106', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '2019-08-02', 'Marhil Spring Purified Water Station', '2019-07-30', 'AP 2019-01694', '1049.40', '1049.40', 'AUB549380', '2019-08-02', 'DR# 0107  July 24, 2019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, '2019-08-03', 'Hydrauking Industrial Corp.', '2019-07-05', 'AP 2019-01507', '42070.98', '42070.98', 'DBP562895', '2019-08-03', 'PO PR-176-4826', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, '2019-08-05', 'Eduard Metal Industries', '2019-07-23', 'AP 2019-01635', '9625.00', '9625.00', 'DBP562994', '2019-08-05', 'CENJO-EM076-19 / CSI# 8224', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, '2019-08-01', 'Joemar De Los Santos', '2019-07-31', 'AP 2019-01710', '2950.00', '2950.00', 'DBP563062', '2019-08-01', 'Cash advance for travel to Ortigas, Pasig City to attend IEMOP meeting regarding Central Schedul...', 'd', 'dsf', 'dsf', 'dsf', 'sdf', 'sdf', 1),
(7, '2019-08-01', 'Godfrey Stephen Samano', '2019-08-01', 'AP 2019-01730', '1400.00', '1400.00', 'DBP563063', '2019-08-01', 'Allowances  Aug. 2-3, 2019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, '2019-08-01', 'CMYK Print Ads Station and Services', '2019-06-21', 'AP 2019-01384', '4000.00', '4000.00', 'DBP563064', '2019-08-01', '', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, '2019-08-01', 'KLS Electrical Supply', '2019-07-30', 'AP 2019-01707', '1342.90', '1342.90', 'DBP563065', '2019-08-01', 'PO PR-298-4866', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, '2019-08-01', 'Milco Malcolm Marketing', '2019-08-01', 'AP 2019-01715', '81598.21', '81598.21', 'DBP563066', '2019-08-01', 'CENJO-2019-003  10%DP(total70%W.A.)', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, '2019-08-02', 'Zyndyryn Rosales', '2019-07-27', 'AP 2019-01679', '5721.61', '5721.61', 'DBP563067', '2019-08-02', 'Union Collection  CA-July 31, 2019(2)', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, '2019-08-02', '2GO Express, Inc.', '2019-08-01', 'AP 2019-01717', '2889.29', '2889.29', 'DBP563068', '2019-08-02', 'WB# AA1993443', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(13, '2019-08-02', 'Krystal Gayle Tagalog', '2019-08-02', 'AP 2019-01721', '58000.00', '58000.00', 'DBP563070', '2019-08-02', 'CA  JO 7/26-8/1/19', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, '2019-08-02', 'Zyndyryn Rosales', '2019-08-02', 'AP 2019-01720', '2925.15', '2925.15', 'DBP563071A', '2019-08-02', 'Union Collection  July 21-27, 2019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, '2019-08-02', 'Rey Argawanon', '2019-08-02', 'AP 2019-01719', '58313.85', '58313.85', 'DBP563071B', '2019-08-02', 'Meal&Transpo Allow.  July 21-27, 2019', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(16, '2019-08-05', 'Teresa Tan', '2019-08-03', 'AP 2019-01731', '4973.21', '4973.21', 'DBP563088', '2019-08-05', 'Replenishment of Diesel/Gasoline Fund for the period 7/29-8/1/2019.', NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `fullname` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_voucher`
--
ALTER TABLE `check_voucher`
 ADD PRIMARY KEY (`cv_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_voucher`
--
ALTER TABLE `check_voucher`
MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
