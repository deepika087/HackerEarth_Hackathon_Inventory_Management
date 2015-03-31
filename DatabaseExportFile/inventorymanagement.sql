-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2015 at 04:53 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventorymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `lower_threshold` int(11) DEFAULT NULL,
  `upper_threshold` int(11) DEFAULT NULL,
  `storage_place` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `subcategory` varchar(30) DEFAULT NULL,
  `image` blob,
  `cost` int(11) NOT NULL,
  `totalQunatity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `lower_threshold`, `upper_threshold`, `storage_place`, `category`, `subcategory`, `image`, `cost`, `totalQunatity`) VALUES
(61, 'Hp Laptop', 'L-37 series of Hp Laptop', 10, 40, 'P-1', 'Computer And accessories', 'Laptop', NULL, 40000, 5),
(62, 'Leggings', 'These are women leggings', 5, 20, 'P-2', 'Clothing', 'Leggings', NULL, 200, 25),
(63, 'Python Book', 'Programming book for python', 2, 10, 'P-50', 'Computer Books', 'Programming language books', NULL, 350, 8),
(64, 'Cooler', 'summer cooler.', 30, 60, 'P-40', 'AC and coolers', 'cooler', NULL, 25000, 45),
(65, 'Sherlock Books', 'book collection of sherlock holmes, first edition', 3, 6, 'P-6', 'Books', 'Fiction', NULL, 5000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `items_channels`
--

CREATE TABLE IF NOT EXISTS `items_channels` (
  `itemId` int(11) DEFAULT NULL,
  `channel_name` varchar(50) NOT NULL,
  `channel_date` datetime DEFAULT NULL,
  `channel_quantity` int(11) DEFAULT NULL,
  `channel_specific_cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_channels`
--

INSERT INTO `items_channels` (`itemId`, `channel_name`, `channel_date`, `channel_quantity`, `channel_specific_cost`) VALUES
(61, 'Snapdeal', '2015-01-05 00:00:00', 10, 35000),
(61, 'Flipkart', '2015-02-05 00:00:00', 5, 40000),
(62, 'Amazon', '2015-01-06 00:00:00', 20, 100),
(62, 'Myntra', '2015-10-05 00:00:00', 15, 150),
(65, 'Flipkart', '2015-03-06 00:00:00', 4, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE IF NOT EXISTS `user_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_locations`
--

INSERT INTO `user_locations` (`id`, `lat`, `lng`) VALUES
(1, 12.000000, 13.000000),
(2, 10.000000, 20.000000);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
