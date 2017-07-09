-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2017 at 04:06 PM
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
(840382098, '02-07-17 19:40:58', 9, 'Mukesh Gs', 'mukeshgs@gmail.com', '1132465480', 'vardhman world'),
(840382098, '02-07-17 22:52:43', 10, 'Dhaivat Parikh', 'dhaivat28@gmail.com', '0123456789', 'from aspironweb Solutions'),
(840382098, '2017-07-03 00:29:53', 12, 'pradeep patel', 'pr@gmail.com', '0123456789', 'From Itm Universe');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `admin_id` int(50) DEFAULT NULL,
  `added_by` varchar(500) DEFAULT NULL,
  `service_id` int(50) DEFAULT NULL,
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

INSERT INTO `payments` (`admin_id`, `added_by`, `service_id`, `tr_id`, `tr_date`, `service_charges`, `amount_paid`, `p_status`, `p_method`, `amount_left`) VALUES
(840382098, 'Dhaivat ', 234695149, '2371117436490073128', '2017-07-09 16:05:27', 1750, 1750, 'done', 'cash', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments_log`
--

CREATE TABLE `payments_log` (
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

INSERT INTO `payments_log` (`admin_id`, `added_by`, `tr_id`, `tr_date`, `service_id`, `amount_left`, `amount_paid`, `p_method`) VALUES
('840382098', 'Dhaivat ', '218683056509635928', '2017-07-09 16:03:28', '234695149', '1250', '500', 'cash'),
('840382098', 'Dhaivat ', '2843489964412169024', '2017-07-09 16:03:52', '234695149', '1000', '250', 'cheque'),
('840382098', 'Dhaivat ', '1082650616958409659', '2017-07-09 16:04:03', '234695149', '900', '100', 'cheque'),
('840382098', 'Dhaivat ', '791011739817437326', '2017-07-09 16:04:14', '234695149', '600', '300', 'cash'),
('840382098', 'Dhaivat ', '2344043076398658163', '2017-07-09 16:04:23', '234695149', '575', '25', 'cash'),
('840382098', 'Dhaivat ', '2310391046368963924', '2017-07-09 16:05:07', '234695149', '5', '570', 'cash'),
('840382098', 'Dhaivat ', '2284038779577661080', '2017-07-09 16:05:14', '234695149', '2', '3', 'cash'),
('840382098', 'Dhaivat ', '2514492658196627349', '2017-07-09 16:05:21', '234695149', '1', '1', 'cash'),
('840382098', 'Dhaivat ', '2371117436490073128', '2017-07-09 16:05:27', '234695149', '0', '1', 'cash');

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
(9, 840382098, '2017-07-08 00:09:19', 'Domain + Hosting', 1750, 500);

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
(840382098, 'Dhaivat ', '2017-07-09 15:26:43', '234695149', 'www.asp.com', 10, 'Dhaivat Parikh', '2017-07-22', 9, '+3 years', '2020-07-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

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
  MODIFY `client_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
