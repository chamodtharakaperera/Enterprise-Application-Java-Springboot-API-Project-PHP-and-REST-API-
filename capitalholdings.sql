-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 01, 2020 at 08:08 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capitalholdings`
--
CREATE DATABASE IF NOT EXISTS `capitalholdings` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `capitalholdings`;

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

DROP TABLE IF EXISTS `complain`;
CREATE TABLE IF NOT EXISTS `complain` (
  `id` bigint(20) NOT NULL,
  `complain` varchar(255) DEFAULT NULL,
  `nomachine` varchar(255) DEFAULT NULL,
  `dop` varchar(255) DEFAULT NULL,
  `repfirst` varchar(255) DEFAULT NULL,
  `replast` varchar(255) DEFAULT NULL,
  `warranty` varchar(255) DEFAULT NULL,
  `cus_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FKri7bl3kc9wqp255972rkbk0dn` (`cus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `complain`, `nomachine`, `dop`, `repfirst`, `replast`, `warranty`, `cus_id`) VALUES
(1, 'No Power', '89', '2020-12-09', 'Sunil', 'Bandara', 'yes', 2),
(3, 'Side mounted plate', '1', '2020-03-05', 'Ruwantha', 'Perera', 'Yes', 2),
(2, 'Motor error', '2', '02-02-2020', 'Ruwantha', 'Perera', 'No', 2),
(93, 'coil error', '9', '2018-12-09', 'Jayantha', 'Alahakoon', 'No', 2),
(94, 'Motor sound', '4', '2012-09-09', 'Ruwantha', 'Perera', 'yes', 2),
(96, 'No power', '3', '2020-02-06', 'jayantha', 'alahakoon', 'No', 2),
(97, 'angle bracket error', NULL, '2019-11-08', 'Sunil', 'Bandara', 'Yes', 95);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cus_id` bigint(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tel` int(11) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `address`, `email`, `firstname`, `lastname`, `password`, `tel`, `user_name`) VALUES
(1, 'Makola', NULL, 'admin', 'acc', 'pass@123', 774787978, 'admin'),
(2, 'Makola', 'udi@gmail.com', 'Udeesha', 'Bandara', 'udi@123', 774787978, 'udeesha'),
(95, 'Rathnapura', 'harshana@gmail.com', 'Harshana', 'Gamage', 'Harshana@123', 758797895, 'Harshana');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tbl`
--

DROP TABLE IF EXISTS `employee_tbl`;
CREATE TABLE IF NOT EXISTS `employee_tbl` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `doj` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `salary` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_tbl`
--

INSERT INTO `employee_tbl` (`id`, `designation`, `doj`, `name`, `salary`) VALUES
(1, 'qwert', '2020-02-29', 'sdfg', 123654),
(2, 'okjhgcxs', '2020-02-28', 'qwdfgh', 846512);

-- --------------------------------------------------------

--
-- Table structure for table `hibernate_sequence`
--

DROP TABLE IF EXISTS `hibernate_sequence`;
CREATE TABLE IF NOT EXISTS `hibernate_sequence` (
  `next_val` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hibernate_sequence`
--

INSERT INTO `hibernate_sequence` (`next_val`) VALUES
(97),
(97),
(97),
(97);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) NOT NULL,
  `cus_add` varchar(255) DEFAULT NULL,
  `cus_name` varchar(255) DEFAULT NULL,
  `cus_tel` varchar(255) DEFAULT NULL,
  `proder_date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) DEFAULT NULL,
  `qty_in_hand` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  `model_no` int(11) NOT NULL,
  `dopurchase` datetime DEFAULT NULL,
  `cus_no` int(11) NOT NULL,
  `pro_name` varchar(255) DEFAULT NULL,
  `prob_desc` varchar(255) DEFAULT NULL,
  `prodesc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK17xjg4wlay8ukkt7wnnaanrje` (`cus_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_service`
--

DROP TABLE IF EXISTS `product_service`;
CREATE TABLE IF NOT EXISTS `product_service` (
  `serviceid` int(11) NOT NULL,
  `doservice` varchar(255) DEFAULT NULL,
  `prob_desc` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `purchase_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `cusid` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`serviceid`),
  KEY `FKqqvvik5fl64trxt6bccbw3831` (`cusid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_service`
--

INSERT INTO `product_service` (`serviceid`, `doservice`, `prob_desc`, `product_id`, `purchase_id`, `status`, `cusid`) VALUES
(89, '2018-11-16', 'HI all', 'p0001', 'PO0001', 'approve', NULL),
(91, '2020-04-13', 'hi me', 'p0001', 'PO0002', 'unapprove', 2);

-- --------------------------------------------------------

--
-- Table structure for table `spare_parts`
--

DROP TABLE IF EXISTS `spare_parts`;
CREATE TABLE IF NOT EXISTS `spare_parts` (
  `sp_item_code` bigint(20) NOT NULL AUTO_INCREMENT,
  `sp_item_dis` varchar(255) DEFAULT NULL,
  `sp_item_name` varchar(255) DEFAULT NULL,
  `sp_item_price` double DEFAULT NULL,
  `sp_item_qyt` int(11) DEFAULT NULL,
  PRIMARY KEY (`sp_item_code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spare_parts`
--

INSERT INTO `spare_parts` (`sp_item_code`, `sp_item_dis`, `sp_item_name`, `sp_item_price`, `sp_item_qyt`) VALUES
(1, 'hjbj', 'jbhbjb', 54, 654);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
