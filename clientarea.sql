-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 15, 2017 at 03:19 PM
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
(840382098, '2017-07-09 17:09:22', 13, 'Jack adam', 'jack@gmail.com', '1234567980', 'test'),
(840382098, '2017-07-14 00:45:40', 14, 'jigar patel', 'jigar@patel.com', '7845692135', 'jigar');

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
  `expiry_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `client_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payments_log`
--
ALTER TABLE `payments_log`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
