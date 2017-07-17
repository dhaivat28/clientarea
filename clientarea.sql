-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2017 at 04:14 PM
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
(840382098, 'Dhaivat ', 'admin@admin.com', 'f865b53623b121fd34ee5426c792e5c33af8c227'),
(540382028, 'hardik', 'hardik@hardik.com', '9ddc08f4dd1269a1c2206b6311713f1c0ec2cbd6');

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
(840382098, '2017-07-17 15:22:09', 15, 'Dhaivat Parikh', 'dhaivat28@gmail.com', '8866764495', 'Web Developer from Aspiron Web Solutions'),
(840382098, '2017-07-17 15:23:49', 16, 'Hardik Patel', 'aspironweb@gmail.com', '9662133078', 'COO');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `op_id` int(11) NOT NULL,
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

INSERT INTO `payments` (`op_id`, `admin_id`, `added_by`, `service_id`, `service_details`, `tr_id`, `tr_date`, `service_charges`, `amount_paid`, `p_status`, `p_method`, `amount_left`) VALUES
(33, 840382098, 'Dhaivat ', 185006787, 'Dhaivat Parikh | +5 years | www.asp.com', NULL, NULL, 3750, 0, 'no payments yet', NULL, 3750),
(34, 840382098, 'Dhaivat ', 278282352, 'Hardik Patel | +5 years | www.aspironweb.com', '2749544097081558105', '2017-07-17 16:10:45', 6000, 6000, 'done', 'cheque', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments_log`
--

CREATE TABLE `payments_log` (
  `op_id` int(11) NOT NULL,
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

INSERT INTO `payments_log` (`op_id`, `admin_id`, `added_by`, `tr_id`, `tr_date`, `service_id`, `amount_left`, `amount_paid`, `p_method`) VALUES
(1, '840382098', 'Dhaivat ', '346111528623557169', '2017-07-17 15:03:03', '128493319', '2000', '2500', 'cash'),
(2, '840382098', 'Dhaivat ', '559529041393960944', '2017-07-17 16:10:28', '278282352', '3000', '3000', 'cash'),
(3, '840382098', 'Dhaivat ', '1180888823534554698', '2017-07-17 16:10:38', '278282352', '1500', '1500', 'cash'),
(4, '840382098', 'Dhaivat ', '2749544097081558105', '2017-07-17 16:10:45', '278282352', '0', '1500', 'cheque');

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
(12, 840382098, '2017-07-17 15:21:19', 'Domain (.com)', 750, 250),
(14, 840382098, '2017-07-17 15:24:34', 'Hosting', 1200, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `op_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `service_details` varchar(500) NOT NULL,
  `profit` int(11) NOT NULL,
  `received` varchar(10) NOT NULL DEFAULT 'FALSE',
  `received_date` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`op_id`, `service_id`, `service_details`, `profit`, `received`, `received_date`) VALUES
(2, 185006787, 'Dhaivat Parikh | +5 years | ', 1250, 'FALSE', NULL),
(3, 278282352, 'Hardik Patel | +5 years | www.aspironweb.com', 5000, 'TRUE', '2017-07-17 16:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `op_id` int(11) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `added_by` varchar(150) NOT NULL,
  `added_on` varchar(100) NOT NULL,
  `service_id` varchar(100) NOT NULL,
  `service_status` varchar(250) NOT NULL,
  `service_name` varchar(1000) NOT NULL,
  `client_id` int(11) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `p_date` varchar(100) NOT NULL,
  `product_id` int(2) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `years` varchar(50) NOT NULL,
  `expiry_date` varchar(100) NOT NULL,
  `days_left` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`op_id`, `admin_id`, `added_by`, `added_on`, `service_id`, `service_status`, `service_name`, `client_id`, `client_name`, `p_date`, `product_id`, `product_name`, `years`, `expiry_date`, `days_left`) VALUES
(36, 840382098, 'Dhaivat ', '2017-07-17 15:59:51', '185006787', 'Active', 'www.asp.com', 15, 'Dhaivat Parikh', '2017-07-07', 12, 'Domain (.com)', '+5 years', '2022-07-07', 1815),
(37, 840382098, 'Dhaivat ', '2017-07-17 16:01:26', '278282352', 'Active', 'www.aspironweb.com', 16, 'Hardik Patel', '2017-07-13', 14, 'Hosting', '+5 years', '2022-07-13', 1821);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `payments_log`
--
ALTER TABLE `payments_log`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`op_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `payments_log`
--
ALTER TABLE `payments_log`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
