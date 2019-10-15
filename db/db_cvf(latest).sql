-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2019 at 10:53 AM
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
  `cv_no` varchar(100) DEFAULT NULL,
  `saved` int(11) NOT NULL DEFAULT '0',
  `location_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cv_series`
--

CREATE TABLE IF NOT EXISTS `cv_series` (
`cvseries_id` int(11) NOT NULL,
  `year` varchar(20) DEFAULT NULL,
  `series` varchar(20) DEFAULT NULL,
  `location_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
`location_id` int(11) NOT NULL,
  `location_name` varchar(50) DEFAULT NULL,
  `address` text,
  `contact_no` varchar(20) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `address`, `contact_no`, `logo`) VALUES
(3, 'Test Location', 'Test Address', '09128891991', 'Test Location.png'),
(4, 'Test Location1', 'Test Address1', '0912889199112', 'Test Location1.jpg');

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
-- Indexes for table `cv_series`
--
ALTER TABLE `cv_series`
 ADD PRIMARY KEY (`cvseries_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
 ADD PRIMARY KEY (`location_id`);

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
MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cv_series`
--
ALTER TABLE `cv_series`
MODIFY `cvseries_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
