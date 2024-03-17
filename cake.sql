-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 17, 2024 at 11:26 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(92, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(21, 'cream cake', 'sweets_category_576.jpg', 'Yes', 'Yes'),
(16, 'cake', 'sweets_category_197.jpg', 'Yes', 'Yes'),
(14, 'Donuts', 'sweets_category_356.jpg', 'Yes', 'Yes'),
(15, 'Muffins', 'sweets_category_865.jpg', 'Yes', 'Yes'),
(20, 'Cookies', 'sweets_category_284.jpg', 'Yes', 'Yes'),
(19, 'cake', 'sweets_category_257.jpg', 'Yes', 'Yes'),
(22, 'muffins', 'sweets_category_269.jpg', 'Yes', 'Yes'),
(24, 'brownies', 'sweets_category_373.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `sweet` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `sweet`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'muffins', 40.00, 1, 40.00, '2024-03-13 12:19:13', 'Cancelled', 'sharli naik', '1234567890', 'sharli12@gmail.com', 'sawantwadi near rpd high school'),
(2, 'muffins', 40.00, 1, 40.00, '2024-03-13 13:36:54', 'Delivered', 'sanika naik', '0987654321', 'sanika23@gmail.com', 'sawantwadi'),
(3, 'muffins', 40.00, 1, 40.00, '2024-03-13 13:39:11', 'On Delivery', 'arya naik', '1234509876', 'arya12@gmail.com', 'sawantwadi\r\n'),
(4, 'muffins', 40.00, 3, 120.00, '2024-03-14 05:30:54', 'Delivered', 'nupur kudtarkar', '1234567890', 'nupur12@gmail.com', 'sawantwadi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sweets`
--

DROP TABLE IF EXISTS `tbl_sweets`;
CREATE TABLE IF NOT EXISTS `tbl_sweets` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_sweets`
--

INSERT INTO `tbl_sweets` (`id`, `title`, `price`, `image_name`, `category_id`, `featured`, `active`, `description`) VALUES
(28, 'muffins', 40.00, 'Sweet-Name-8534.jpg', 22, 'Yes', 'Yes', 'muffins'),
(29, 'brownies', 30.00, 'Sweet-Name-3529.jpg', 24, 'Yes', 'Yes', 'brownies'),
(27, 'cake', 34.00, 'Sweet-Name-6977.jpg', 16, 'Yes', 'Yes', 'Made with flour, sugar, and other ingredients and is usually baked.'),
(23, 'donuts', 20.00, 'sweet_name_818.jpg', 14, 'Yes', 'Yes', 'A donut is a type of pastry made from leavened fried dough.    '),
(24, 'cake', 20.00, 'sweet-name-948.jpg', 19, 'Yes', 'Yes', 'Made with flour, sugar, and other ingredients and is usually baked.   '),
(26, 'donuts', 30.00, 'Sweet-Name-1420.jpg', 14, 'Yes', 'Yes', 'A donut is a type of pastry made from leavened fried dough.     ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
