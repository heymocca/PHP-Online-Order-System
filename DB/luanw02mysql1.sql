-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2015 at 12:52 PM
-- Server version: 5.5.28-log
-- PHP Version: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `luanw02mysql1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=213 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_title`) VALUES
(1, 'MEN'),
(2, 'WOMEN'),
(3, 'KIDS'),
(200, 'ACCESSORIES'),
(208, 'SPORTS'),
(210, 'FITNESS'),
(212, 'Xiaosong');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_password` varchar(20) NOT NULL,
  `customer_home_phone` varchar(20) DEFAULT NULL,
  `customer_work_phone` varchar(20) DEFAULT NULL,
  `customer_mobile_phone` varchar(20) DEFAULT NULL,
  `customer_fax_number` varchar(20) DEFAULT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_status` char(20) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_password`, `customer_home_phone`, `customer_work_phone`, `customer_mobile_phone`, `customer_fax_number`, `customer_email`, `customer_status`) VALUES
(1, 'luanw02', '123', '1231231', '1231231', '1231231', '1231231', 'moccababy777@gmail.com', 'available'),
(32, 'mocca', '123', '', '', '1231231', NULL, 'moccababy777@gmail.com', 'deny'),
(33, 'xiaosong', 'password', '8154321', '8154321', '8154321', NULL, 'xli@unitec.ac.nz', 'deny');

-- --------------------------------------------------------

--
-- Table structure for table `hat`
--

DROP TABLE IF EXISTS `hat`;
CREATE TABLE IF NOT EXISTS `hat` (
  `hat_id` int(11) NOT NULL AUTO_INCREMENT,
  `hat_title` varchar(200) NOT NULL,
  `hat_category_id` int(11) NOT NULL,
  `hat_price` decimal(6,2) NOT NULL,
  `hat_description` varchar(1000) NOT NULL,
  `hat_search_keyword` varchar(100) NOT NULL,
  `hat_path` varchar(100) NOT NULL,
  `is_hot_sale` char(3) NOT NULL,
  PRIMARY KEY (`hat_id`),
  KEY `hat_category_id` (`hat_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `hat`
--

INSERT INTO `hat` (`hat_id`, `hat_title`, `hat_category_id`, `hat_price`, `hat_description`, `hat_search_keyword`, `hat_path`, `is_hot_sale`) VALUES
(1, 'Atlanta Braves MLB Smalls 59FIFTY Cap', 1, '21.00', 'This Atlanta Braves MLB Smalls 59FIFTY Cap features an embroidered, small Atlanta Braves team logo on the front, stitched New Era flag at wearer left side and embroidered MLB logo on the rear. Interior includes branded taping and a moisture absorbing sweatband.', 'cap, mlb', 'HatImages/1.jpg', 'no'),
(2, 'Dallas Mavericks NBA Snapback Cap', 1, '22.00', 'Made of 100% Polyester, Woven This Milwaukee Brewers MLB AC 9-11 Patch 59FIFTY Cap features an embroidered Milwaukee Brewers logo at front and flag patch at the side.', 'nba, cap', 'HatImages/2.jpg', 'yes'),
(3, 'Chicago Bears NFL Snapback Cap', 2, '22.00', 'Made of 100% Acrylic, Knit This cable knit San Francisco 49ers NFL 2015 Women''s Salute to Service Knit features an embroidered San Francisco 49ers logo at the front, team ribbon logo at the wearer right side, and team graphics on the rear.', 'nfl,chicago', 'HatImages/3.jpg', 'no'),
(4, 'Denver NBA Reflipper Snapback Cap', 3, '23.00', 'Made of 100% Wool, Woven This Denver Nuggets NBA HWC Reflipper 9FIFTY Snapback Cap is exclusive to NewEraCap.com and not available at any other retailer. Get yours today! ', 'nba,snapback', 'HatImages/4.jpg', 'no'),
(5, 'Cardinals MLB Geo Snapback Cap', 3, '23.00', 'Made of 100% Polyester, Woven This St. Louis Cardinals MLB Geo 9FIFTY Snapback Cap is exclusive to NewEraCap.com and not available at any other retailer. Get yours today! This St. Louis Cardinals MLB Geo 9FIFTY Snapback Cap features an embroidered St. Louis Cardinals logo at front, a stitched New Era® flag at wearer''s left side and a snapback closure for an adjustable fit. Interior includes branded taping and a moisture absorbing sweatband.', 'mlb,snapback', 'HatImages/5.jpg', 'no'),
(6, 'NFL 2015 Breast Awareness Cap', 2, '23.00', 'Made of 56% Acrylic, Woven, 30% Polyester, Woven, 14% Wool, Woven This Philadelphia Eagles NFL Heather Wordmark 9FIFTY Snapback Cap features an embroidered Philadelphia Eagles namesake and logo at front, a stitched New Era flag at wearer''s left side and a snapback closure for an adjustable fit. Interior includes branded taping and a moisture absorbing sweatband.', 'nfl,women', 'HatImages/6.jpg', 'no'),
(72, 'test', 2, '12.00', 'This crush proof neoprene case stores 2 caps and features multiple eyelets for ventilation, removable shoulder strap for easy transport, convenient double zip closure, and New Era flag logo branding.', 'test', 'HatImages/20151112210055883143.jpg', 'no'),
(73, 'test', 2, '33.00', 'This crush proof neoprene case stores 2 caps and features multiple eyelets for ventilation, removable shoulder strap for easy transport, convenient double zip closure, and New Era flag logo branding.', 'test', 'HatImages/201511122125515193637.jpg', 'yes'),
(75, 'Cap Carrier', 200, '21.00', 'This crush proof neoprene case stores 2 caps and features multiple eyelets for ventilation, removable shoulder strap for easy transport, convenient double zip closure, and New Era flag logo branding.', 'accessories', 'HatImages/201511141548092917299.jpg', 'no'),
(76, 'Wisconsin Badgers Stretch Cap', 3, '31.00', 'This Wisconsin Badgers NCAA Stripe Stretch 39THIRTY Cap features an embroidered Wisconsin Badgers logo on front.Interior includes branded taping as well as a moisture absorbing sweatband. Stretch fit on closed back.', 'stretch', 'HatImages/201511150940334478320.jpg', 'yes'),
(77, 'Chicago Bears 2015 Breast ', 3, '33.00', 'This Chicago Bears NFL 2015 Breast Cancer Awareness 39THIRTY Cap features an embroidered Chicago Bears logo on front with pink outlines.', '2015', 'HatImages/201511151000403907512.jpg', 'yes'),
(80, 'testhat', 1, '33.00', 'this is a test', '2015', 'HatImages/201511152122501826463.jpg', 'yes'),
(81, 'testhat2', 208, '38.00', 'this is a test', 'sport', 'HatImages/201511152128412924266.jpg', 'yes'),
(82, 'Dallas Mavericks NBA Sport Cap', 208, '20.00', 'Dallas Mavericks NBA Sport Cap', 'NBA', 'HatImages/201511152141249138956.jpg', 'yes'),
(83, 'Breast Awareness Cap 2015', 2, '34.00', 'Breast Awareness Cap 2015', '2015', 'HatImages/201511152148323389613.jpg', 'yes'),
(84, 'Whit Fitness Cap 2015', 210, '22.00', 'Whit Fitness Cap 2015', '2015', 'HatImages/20151115233333167739.jpg', 'yes'),
(85, 'Monday', 212, '34.50', 'nice hat', '2015', 'HatImages/201511161105056111260.jpg', 'no'),
(91, 'test1', 1, '33.00', 'test1', 'test1', 'HatImages/201512091241271298359.jpg', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `map_hat_supplier`
--

DROP TABLE IF EXISTS `map_hat_supplier`;
CREATE TABLE IF NOT EXISTS `map_hat_supplier` (
  `map_hat_supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `map_hat_id` int(11) NOT NULL,
  `map_supplier_id` int(11) NOT NULL,
  PRIMARY KEY (`map_hat_supplier_id`),
  KEY `map_hat_id` (`map_hat_id`,`map_supplier_id`),
  KEY `map_supplier_id` (`map_supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=144 ;

--
-- Dumping data for table `map_hat_supplier`
--

INSERT INTO `map_hat_supplier` (`map_hat_supplier_id`, `map_hat_id`, `map_supplier_id`) VALUES
(1, 1, 3),
(2, 2, 4),
(129, 72, 3),
(130, 73, 2),
(132, 75, 2),
(133, 76, 5),
(134, 77, 2),
(136, 80, 30),
(137, 81, 2),
(138, 82, 4),
(139, 83, 5),
(140, 84, 3),
(141, 85, 3),
(143, 91, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(20) NOT NULL,
  `order_status` char(7) NOT NULL,
  `order_customer_id` int(11) NOT NULL,
  `order_gst` decimal(3,1) NOT NULL,
  `order_subtotal` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_customer_id` (`order_customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_number`, `order_status`, `order_customer_id`, `order_gst`, `order_subtotal`) VALUES
(29, 'NO.1-151115232357', 'waiting', 1, '15.0', '21.00'),
(30, 'NO.32-151115233029', 'shipped', 32, '15.0', '53.00'),
(31, 'NO.33-151116111208', 'shipped', 33, '15.0', '102.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
CREATE TABLE IF NOT EXISTS `order_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_hat_id` int(11) NOT NULL,
  `item_order_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_id`),
  KEY `item_order_id` (`item_order_id`),
  KEY `item_hat_id` (`item_hat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`item_id`, `item_hat_id`, `item_order_id`, `item_quantity`, `item_price`) VALUES
(30, 1, 29, 1, '21.00'),
(31, 82, 30, 1, '20.00'),
(32, 73, 30, 1, '33.00'),
(33, 85, 31, 2, '34.50'),
(34, 77, 31, 1, '33.00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(50) NOT NULL,
  `supplier_home_phone` varchar(20) NOT NULL,
  `supplier_work_phone` varchar(20) NOT NULL,
  `supplier_mobile_phone` varchar(20) NOT NULL,
  `supplier_fax_number` varchar(20) NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_home_phone`, `supplier_work_phone`, `supplier_mobile_phone`, `supplier_fax_number`, `supplier_address`) VALUES
(1, 'MGM Industries Co', '021-1231231', '021-1231231', '021-1231231', '021-1231231', 'New North Rd, Auckland, New Zealand'),
(2, 'Seahonda Co Ltd', '021-2342342', '021-2342342', '021-2342342', '021-2342342', 'New North Rd, Auckland, New Zealand'),
(3, 'Blooming Wave Co', '021-3453453', '021-3453453', '021-3453453', '021-3453453', 'New North Rd, Auckland, New Zealand'),
(4, 'Great Pacific', '021-4564564', '021-4564564', '021-4564564', '021-4564564', 'New North Rd, Auckland, New Zealand'),
(5, 'Global One', '021-5675675', '021-5675675', '021-5675675', '021-5675675', 'New North Rd, Auckland, New Zealand'),
(30, 'New York Zone', '', '', '0221231231', '', 'NY'),
(31, 'NZ LOCAL', '', '', '0221231231', '', 'NZ'),
(33, 'testsuplier', '', '', '0221231231', '', 'NZ'),
(34, 'testsuplier2', '', '', '0221231231', '', 'NZ');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `map_hat_supplier`
--
ALTER TABLE `map_hat_supplier`
  ADD CONSTRAINT `map_hat_supplier_ibfk_1` FOREIGN KEY (`map_hat_id`) REFERENCES `hat` (`hat_id`),
  ADD CONSTRAINT `map_hat_supplier_ibfk_2` FOREIGN KEY (`map_supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`order_customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`item_hat_id`) REFERENCES `hat` (`hat_id`),
  ADD CONSTRAINT `order_item_ibfk_3` FOREIGN KEY (`item_order_id`) REFERENCES `order` (`order_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
