-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2017 at 06:24 PM
-- Server version: 5.7.18-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientarea`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `email`, `password`) VALUES
(840382098, 'Dhaivat ', 'admin@admin.com', 'f865b53623b121fd34ee5426c792e5c33af8c227');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `admin_id` int(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `client_id` int(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`admin_id`, `created_at`, `client_id`, `cname`, `email`, `mobile`, `remarks`) VALUES
(840382098, '02-07-17 19:40:58', 9, 'Mukesh Patel', 'mukeshgs@gmail.com', '1132465480', 'vardhman world'),
(840382098, '02-07-17 22:52:43', 10, 'Dhaivat Parikh', 'dhaivat28@gmail.com', '0123456789', 'from aspironweb Solutions'),
(840382098, '2017-07-03 00:29:53', 12, 'Pradeep patel', 'pr123@gmail.com', '0123456789', 'From Itm Universe'),
(840382098, '2017-07-09 17:09:22', 13, 'Jack adam', 'jack@gmail.com', '1234567980', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `admin_id` int(50) DEFAULT NULL,
  `added_by` varchar(500) DEFAULT NULL,
  `service_id` int(50) DEFAULT NULL,
  `service_details` varchar(500) DEFAULT NULL,
  `tr_id` varchar(255) DEFAULT NULL,
  `tr_date` varchar(150) DEFAULT NULL,
  `service_charges` int(10) DEFAULT NULL,
  `amount_paid` int(10) DEFAULT '0',
  `p_status` varchar(100) DEFAULT NULL,
  `p_method` varchar(100) DEFAULT NULL,
  `amount_left` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`admin_id`, `added_by`, `service_id`, `service_details`, `tr_id`, `tr_date`, `service_charges`, `amount_paid`, `p_status`, `p_method`, `amount_left`) VALUES
(840382098, 'Dhaivat ', 227174411, '', '869692792629593823', '2017-07-09 17:11:09', 1750, 1750, 'done', 'cash', 0),
(840382098, 'Dhaivat ', 312817816, '', '974072695521032376', '2017-07-09 17:53:39', 1750, 1750, 'done', 'other', 0),
(840382098, 'Dhaivat ', 131397251, '', '337482617521826626', '2017-07-13 17:42:37', 5000, 500, 'partial', 'cheque', 4500),
(NULL, NULL, 296096366, NULL, NULL, NULL, 10000, 0, 'no payments yet', NULL, 10000),
(NULL, NULL, 282831869, 'Pradeep patel | +3 years | www.aus.com', NULL, NULL, 5250, 0, 'no payments yet', NULL, 5250);

-- --------------------------------------------------------

--
-- Table structure for table `payments_log`
--

CREATE TABLE `payments_log` (
  `log_id` int(11) NOT NULL,
  `admin_id` varchar(50) NOT NULL,
  `added_by` varchar(150) NOT NULL,
  `tr_id` varchar(50) NOT NULL,
  `tr_date` varchar(50) NOT NULL,
  `service_id` varchar(50) NOT NULL,
  `amount_left` varchar(300) NOT NULL,
  `amount_paid` varchar(50) NOT NULL,
  `p_method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments_log`
--

INSERT INTO `payments_log` (`log_id`, `admin_id`, `added_by`, `tr_id`, `tr_date`, `service_id`, `amount_left`, `amount_paid`, `p_method`) VALUES
(27, '840382098', 'Dhaivat ', '1006997047203872564', '2017-07-09 17:10:07', '227174411', '1500', '250', 'cash'),
(28, '840382098', 'Dhaivat ', '355915991224891288', '2017-07-09 17:10:19', '227174411', '1100', '400', 'cheque'),
(29, '840382098', 'Dhaivat ', '1312457140635140975', '2017-07-09 17:10:25', '227174411', '800', '300', 'other'),
(30, '840382098', 'Dhaivat ', '2393985182905426194', '2017-07-09 17:10:31', '227174411', '650', '150', 'cheque'),
(31, '840382098', 'Dhaivat ', '166768853554671383', '2017-07-09 17:10:37', '227174411', '600', '50', 'cheque'),
(32, '840382098', 'Dhaivat ', '2366491631012879249', '2017-07-09 17:10:43', '227174411', '564', '36', 'cash'),
(33, '840382098', 'Dhaivat ', '2848551013299792350', '2017-07-09 17:10:50', '227174411', '489', '75', 'cash'),
(34, '840382098', 'Dhaivat ', '2925353265996734264', '2017-07-09 17:10:56', '227174411', '437', '52', 'cash'),
(35, '840382098', 'Dhaivat ', '1197607565655223806', '2017-07-09 17:11:03', '227174411', '87', '350', 'cash'),
(36, '840382098', 'Dhaivat ', '869692792629593823', '2017-07-09 17:11:09', '227174411', '0', '87', 'cash'),
(37, '840382098', 'Dhaivat ', '280516647077372226', '2017-07-09 17:52:46', '312817816', '1704', '46', 'cash'),
(38, '840382098', 'Dhaivat ', '889384819396443409', '2017-07-09 17:53:01', '312817816', '1681', '23', 'other'),
(39, '840382098', 'Dhaivat ', '780754345936884030', '2017-07-09 17:53:10', '312817816', '1641', '40', 'cash'),
(40, '840382098', 'Dhaivat ', '1407918027062933485', '2017-07-09 17:53:17', '312817816', '1532', '109', 'cash'),
(41, '840382098', 'Dhaivat ', '727384966876019802', '2017-07-09 17:53:27', '312817816', '32', '1500', 'cash'),
(42, '840382098', 'Dhaivat ', '2151482812123860540', '2017-07-09 17:53:33', '312817816', '17', '15', 'cheque'),
(43, '840382098', 'Dhaivat ', '974072695521032376', '2017-07-09 17:53:39', '312817816', '0', '17', 'other'),
(44, '840382098', 'Dhaivat ', '337482617521826626', '2017-07-13 17:42:37', '131397251', '4500', '500', 'cheque');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `added_on` varchar(200) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_mrp` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `admin_id`, `added_on`, `product_name`, `product_mrp`, `profit`) VALUES
(7, 840382098, '2017-07-08 00:08:24', 'Domain', 1500, 300),
(8, 840382098, '2017-07-08 00:08:35', 'Hosting', 2000, 500),
(9, 840382098, '2017-07-08 00:09:19', 'Domain + Hosting', 1750, 500),
(10, 840382098, '2017-07-09 16:22:48', 'AMC Contract', 5000, 1500),
(11, 840382098, '2017-07-13 18:03:26', 'business email hosting', 150, 50);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `admin_id` int(100) NOT NULL,
  `added_by` varchar(150) NOT NULL,
  `added_on` varchar(100) NOT NULL,
  `service_id` varchar(100) NOT NULL,
  `service_name` varchar(1000) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `p_date` varchar(100) NOT NULL,
  `product_id` int(2) NOT NULL,
  `years` varchar(50) NOT NULL,
  `expiry_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`admin_id`, `added_by`, `added_on`, `service_id`, `service_name`, `client_id`, `client_name`, `p_date`, `product_id`, `years`, `expiry_date`) VALUES
(840382098, 'Dhaivat ', '2017-07-09 17:09:48', '227174411', 'www.jack.com', 13, 'Jack adam', '2017-07-15', 9, '+3 years', '2020-07-15'),
(840382098, 'Dhaivat ', '2017-07-09 17:52:36', '312817816', 'www.pr.com', 12, 'Pradeep patel', '2017-07-13', 9, '+3 years', '2020-07-13'),
(840382098, 'Dhaivat ', '2017-07-09 17:56:18', '131397251', 'Amc', 9, 'Mukesh Patel', '2017-07-22', 10, '+1 years', '2018-07-22'),
(840382098, 'Dhaivat ', '2017-07-13 18:00:57', '100674512', 'www.jackadam.com', 13, 'Jack adam', '2017-07-21', 8, '+5 years', '2022-07-21'),
(840382098, 'Dhaivat ', '2017-07-13 18:01:16', '296096366', 'www.jackadam.com', 13, 'Jack adam', '2017-07-21', 8, '+5 years', '2022-07-21'),
(840382098, 'Dhaivat ', '2017-07-13 18:17:23', '282831869', 'www.aus.com', 12, 'Pradeep patel', '2017-07-07', 9, '+3 years', '2020-07-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `payments_log`
--
ALTER TABLE `payments_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `payments_log`
--
ALTER TABLE `payments_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
