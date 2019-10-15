-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2019 at 09:55 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_voucher`
--
ALTER TABLE `check_voucher`
 ADD PRIMARY KEY (`cv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_voucher`
--
ALTER TABLE `check_voucher`
MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
