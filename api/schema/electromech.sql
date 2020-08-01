-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 166.62.8.52
-- Generation Time: Feb 25, 2020 at 04:33 AM
-- Server version: 5.5.51
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `electromech`
--

-- --------------------------------------------------------

--
-- Table structure for table `electromech_category`
--

CREATE TABLE `electromech_category` (
  `electromech_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`electromech_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `electromech_category`
--

INSERT INTO `electromech_category` VALUES(1, 'Dust Control System', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(2, 'Granulation System', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(3, 'Thermal system', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(4, 'Feed System', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(5, 'Common Service', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_floor`
--

CREATE TABLE `electromech_floor` (
  `electromech_floor_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_floor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `electromech_floor`
--

INSERT INTO `electromech_floor` VALUES(1, 'Floor 1', NULL, 1, NULL, 1);
INSERT INTO `electromech_floor` VALUES(2, 'Floor 2', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_product`
--

CREATE TABLE `electromech_product` (
  `electromech_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `electromech_floor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `image_path` varchar(255) NOT NULL,
  `manufacturing` varchar(255) NOT NULL,
  `electromech_category_id` int(11) NOT NULL DEFAULT '0',
  `name_plate_date` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `electromech_product`
--

INSERT INTO `electromech_product` VALUES(2, 1, 'Furnace', 'uploads/c89963098490f660a31834b96477f10a.jpg', 'Cummnins', 2, 'Name plate', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_product_code`
--

CREATE TABLE `electromech_product_code` (
  `electromech_product_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `electromech_train_id` int(11) NOT NULL,
  `electromech_product_id` int(11) NOT NULL DEFAULT '0',
  `code` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_product_code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `electromech_product_code`
--

INSERT INTO `electromech_product_code` VALUES(4, 2, 2, '727 M 5002', NULL, 1, NULL, 1);
INSERT INTO `electromech_product_code` VALUES(5, 1, 2, '727 M 5001', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_product_enquiry_list`
--

CREATE TABLE `electromech_product_enquiry_list` (
  `electromech_product_enquiry_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_list` varchar(500) NOT NULL DEFAULT '',
  `electromech_product_id` int(11) NOT NULL,
  `electromech_schedule_id` int(11) NOT NULL DEFAULT '0',
  `electromech_category_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_product_enquiry_list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `electromech_product_enquiry_list`
--


-- --------------------------------------------------------

--
-- Table structure for table `electromech_product_enquiry_log`
--

CREATE TABLE `electromech_product_enquiry_log` (
  `electromech_product_enquiry_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `electromech_staff_name` varchar(255) NOT NULL,
  `electromech_staff_id` int(11) NOT NULL DEFAULT '0',
  `electromech_floor_id` int(11) NOT NULL DEFAULT '0',
  `electromech_floor_name` varchar(255) NOT NULL,
  `electromech_schedule_id` int(11) NOT NULL DEFAULT '0',
  `electromech_train_id` int(11) NOT NULL DEFAULT '0',
  `electromech_schedule_name` varchar(255) NOT NULL,
  `electromech_train_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_product_enquiry_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `electromech_product_enquiry_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `electromech_product_enquiry_log_detail`
--

CREATE TABLE `electromech_product_enquiry_log_detail` (
  `electromech_product_enquiry_log_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `electromech_product_enquiry_list_id` int(11) NOT NULL DEFAULT '0',
  `electromech_product_enquiry_log_id` int(11) NOT NULL DEFAULT '0',
  `electromech_product_id` int(11) NOT NULL DEFAULT '0',
  `electromech_product_name` varchar(255) NOT NULL,
  `electromech_product_code` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `enquiry_list` varchar(500) NOT NULL DEFAULT '',
  `electromech_category_id` int(11) NOT NULL DEFAULT '0',
  `electromech_category_name` varbinary(255) NOT NULL,
  `enquiry_status` tinyint(1) NOT NULL DEFAULT '1',
  `enquiry_failure_comment` varchar(255) NOT NULL DEFAULT '',
  `general_comment` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_product_enquiry_log_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `electromech_product_enquiry_log_detail`
--


-- --------------------------------------------------------

--
-- Table structure for table `electromech_schedule`
--

CREATE TABLE `electromech_schedule` (
  `electromech_schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `electromech_schedule`
--

INSERT INTO `electromech_schedule` VALUES(1, 'Daily', NULL, 1, NULL, 1);
INSERT INTO `electromech_schedule` VALUES(2, 'Weekly', NULL, 1, NULL, 1);
INSERT INTO `electromech_schedule` VALUES(3, 'Monthly', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_staff`
--

CREATE TABLE `electromech_staff` (
  `electromech_staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(15) NOT NULL DEFAULT '',
  `imageurl` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(500) NOT NULL DEFAULT '',
  `role` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`electromech_staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `electromech_staff`
--

INSERT INTO `electromech_staff` VALUES(1, 'Pandiyaraj', '86967622', 'uploads/7a7adde7dd8573e6a07f5fe66b24a8e3.png', NULL, 1, NULL, 1, 'Pandi', '12345', 'Staff');
INSERT INTO `electromech_staff` VALUES(3, 'Mahendran', '98686202', '', NULL, 1, NULL, 1, 'Maha', '12345', 'Staff');
INSERT INTO `electromech_staff` VALUES(4, 'Arul', '1234567899', '', '2020-02-18 14:51:07', 1, '2020-02-18 14:51:12', 1, 'arulyg', '123456', 'supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `electromech_staff_login`
--

CREATE TABLE `electromech_staff_login` (
  `electromech_staff_login_id` int(11) NOT NULL AUTO_INCREMENT,
  `electromech_train_id` int(11) NOT NULL,
  `electromech_category_id` int(11) NOT NULL,
  `electromech_schedule_id` int(11) NOT NULL,
  `electromech_staff_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`electromech_staff_login_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `electromech_staff_login`
--

INSERT INTO `electromech_staff_login` VALUES(1, 1, 1, 1, 4, '2020-02-24 18:29:20', NULL, '2020-02-24 18:29:20', NULL);
INSERT INTO `electromech_staff_login` VALUES(2, 1, 1, 1, 4, '2020-02-24 18:29:37', NULL, '2020-02-24 18:29:37', NULL);
INSERT INTO `electromech_staff_login` VALUES(3, 1, 1, 1, 4, '2020-02-24 18:50:37', NULL, '2020-02-24 18:50:37', NULL);
INSERT INTO `electromech_staff_login` VALUES(4, 1, 1, 0, 4, '2020-02-24 18:52:26', NULL, '2020-02-24 18:52:26', NULL);
INSERT INTO `electromech_staff_login` VALUES(5, 1, 1, 1, 4, '2020-02-24 18:53:05', NULL, '2020-02-24 18:53:05', NULL);
INSERT INTO `electromech_staff_login` VALUES(6, 2, 1, 1, 4, '2020-02-24 18:58:59', NULL, '2020-02-24 18:58:59', NULL);
INSERT INTO `electromech_staff_login` VALUES(7, 1, 1, 1, 4, '2020-02-24 19:01:55', NULL, '2020-02-24 19:01:55', NULL);
INSERT INTO `electromech_staff_login` VALUES(8, 1, 3, 1, 4, '2020-02-24 20:20:32', NULL, '2020-02-24 20:20:32', NULL);
INSERT INTO `electromech_staff_login` VALUES(9, 2, 1, 1, 4, '2020-02-24 20:20:51', NULL, '2020-02-24 20:20:51', NULL);
INSERT INTO `electromech_staff_login` VALUES(10, 1, 5, 1, 4, '2020-02-24 20:23:23', NULL, '2020-02-24 20:23:23', NULL);
INSERT INTO `electromech_staff_login` VALUES(11, 1, 2, 1, 4, '2020-02-24 20:23:43', NULL, '2020-02-24 20:23:43', NULL);
INSERT INTO `electromech_staff_login` VALUES(12, 1, 2, 1, 4, '2020-02-24 20:24:38', NULL, '2020-02-24 20:24:38', NULL);
INSERT INTO `electromech_staff_login` VALUES(13, 1, 2, 1, 4, '2020-02-24 20:24:47', NULL, '2020-02-24 20:24:47', NULL);
INSERT INTO `electromech_staff_login` VALUES(14, 1, 2, 1, 4, '2020-02-24 20:25:17', NULL, '2020-02-24 20:25:17', NULL);
INSERT INTO `electromech_staff_login` VALUES(15, 1, 2, 1, 4, '2020-02-24 20:26:42', NULL, '2020-02-24 20:26:42', NULL);
INSERT INTO `electromech_staff_login` VALUES(16, 2, 2, 1, 4, '2020-02-24 20:26:50', NULL, '2020-02-24 20:26:50', NULL);
INSERT INTO `electromech_staff_login` VALUES(17, 2, 2, 1, 4, '2020-02-24 20:29:20', NULL, '2020-02-24 20:29:20', NULL);
INSERT INTO `electromech_staff_login` VALUES(18, 1, 1, 0, 4, '2020-02-24 20:29:42', NULL, '2020-02-24 20:29:42', NULL);
INSERT INTO `electromech_staff_login` VALUES(19, 1, 1, 0, 4, '2020-02-24 20:34:39', NULL, '2020-02-24 20:34:39', NULL);
INSERT INTO `electromech_staff_login` VALUES(20, 2, 2, 1, 4, '2020-02-24 20:35:26', NULL, '2020-02-24 20:35:26', NULL);
INSERT INTO `electromech_staff_login` VALUES(21, 2, 2, 1, 4, '2020-02-24 20:40:06', NULL, '2020-02-24 20:40:06', NULL);
INSERT INTO `electromech_staff_login` VALUES(22, 2, 2, 1, 4, '2020-02-24 20:42:11', NULL, '2020-02-24 20:42:11', NULL);
INSERT INTO `electromech_staff_login` VALUES(23, 2, 2, 1, 4, '2020-02-24 20:42:49', NULL, '2020-02-24 20:42:49', NULL);
INSERT INTO `electromech_staff_login` VALUES(24, 2, 2, 1, 4, '2020-02-24 20:43:30', NULL, '2020-02-24 20:43:30', NULL);
INSERT INTO `electromech_staff_login` VALUES(25, 2, 2, 1, 4, '2020-02-24 20:49:42', NULL, '2020-02-24 20:49:42', NULL);
INSERT INTO `electromech_staff_login` VALUES(26, 2, 2, 1, 4, '2020-02-24 20:50:21', NULL, '2020-02-24 20:50:21', NULL);
INSERT INTO `electromech_staff_login` VALUES(27, 2, 2, 1, 4, '2020-02-24 20:52:52', NULL, '2020-02-24 20:52:52', NULL);
INSERT INTO `electromech_staff_login` VALUES(28, 2, 2, 1, 4, '2020-02-24 21:26:12', NULL, '2020-02-24 21:26:12', NULL);
INSERT INTO `electromech_staff_login` VALUES(29, 2, 2, 1, 4, '2020-02-24 21:30:22', NULL, '2020-02-24 21:30:22', NULL);
INSERT INTO `electromech_staff_login` VALUES(30, 2, 2, 1, 4, '2020-02-24 21:32:34', NULL, '2020-02-24 21:32:34', NULL);
INSERT INTO `electromech_staff_login` VALUES(31, 2, 2, 1, 4, '2020-02-24 21:33:11', NULL, '2020-02-24 21:33:11', NULL);
INSERT INTO `electromech_staff_login` VALUES(32, 2, 2, 1, 4, '2020-02-24 21:33:27', NULL, '2020-02-24 21:33:27', NULL);
INSERT INTO `electromech_staff_login` VALUES(33, 2, 2, 1, 4, '2020-02-24 21:35:17', NULL, '2020-02-24 21:35:17', NULL);
INSERT INTO `electromech_staff_login` VALUES(34, 2, 2, 1, 4, '2020-02-24 21:35:25', NULL, '2020-02-24 21:35:25', NULL);
INSERT INTO `electromech_staff_login` VALUES(35, 2, 2, 1, 4, '2020-02-24 21:37:42', NULL, '2020-02-24 21:37:42', NULL);
INSERT INTO `electromech_staff_login` VALUES(36, 2, 2, 1, 4, '2020-02-24 21:38:04', NULL, '2020-02-24 21:38:04', NULL);
INSERT INTO `electromech_staff_login` VALUES(37, 2, 2, 1, 4, '2020-02-24 22:00:35', NULL, '2020-02-24 22:00:35', NULL);
INSERT INTO `electromech_staff_login` VALUES(38, 2, 2, 1, 4, '2020-02-24 22:06:19', NULL, '2020-02-24 22:06:19', NULL);
INSERT INTO `electromech_staff_login` VALUES(39, 1, 1, 1, 4, '2020-02-24 22:07:08', NULL, '2020-02-24 22:07:08', NULL);
INSERT INTO `electromech_staff_login` VALUES(40, 1, 4, 1, 4, '2020-02-24 22:07:48', NULL, '2020-02-24 22:07:48', NULL);
INSERT INTO `electromech_staff_login` VALUES(41, 1, 3, 1, 4, '2020-02-24 22:07:58', NULL, '2020-02-24 22:07:58', NULL);
INSERT INTO `electromech_staff_login` VALUES(42, 1, 2, 1, 4, '2020-02-24 22:08:03', NULL, '2020-02-24 22:08:03', NULL);
INSERT INTO `electromech_staff_login` VALUES(43, 1, 2, 1, 4, '2020-02-24 22:09:05', NULL, '2020-02-24 22:09:05', NULL);
INSERT INTO `electromech_staff_login` VALUES(44, 1, 1, 2, 4, '2020-02-24 22:10:27', NULL, '2020-02-24 22:10:27', NULL);
INSERT INTO `electromech_staff_login` VALUES(45, 1, 1, 2, 4, '2020-02-24 22:17:42', NULL, '2020-02-24 22:17:42', NULL);
INSERT INTO `electromech_staff_login` VALUES(46, 1, 1, 2, 4, '2020-02-24 22:17:53', NULL, '2020-02-24 22:17:53', NULL);
INSERT INTO `electromech_staff_login` VALUES(47, 1, 2, 2, 4, '2020-02-24 22:17:58', NULL, '2020-02-24 22:17:58', NULL);
INSERT INTO `electromech_staff_login` VALUES(48, 1, 2, 2, 4, '2020-02-24 22:18:27', NULL, '2020-02-24 22:18:27', NULL);
INSERT INTO `electromech_staff_login` VALUES(49, 1, 2, 2, 4, '2020-02-24 22:23:50', NULL, '2020-02-24 22:23:50', NULL);
INSERT INTO `electromech_staff_login` VALUES(50, 1, 2, 3, 4, '2020-02-24 22:24:16', NULL, '2020-02-24 22:24:16', NULL);
INSERT INTO `electromech_staff_login` VALUES(51, 1, 2, 2, 4, '2020-02-24 22:24:25', NULL, '2020-02-24 22:24:25', NULL);
INSERT INTO `electromech_staff_login` VALUES(52, 1, 2, 2, 4, '2020-02-24 22:25:28', NULL, '2020-02-24 22:25:28', NULL);
INSERT INTO `electromech_staff_login` VALUES(53, 1, 2, 2, 4, '2020-02-24 22:30:38', NULL, '2020-02-24 22:30:38', NULL);
INSERT INTO `electromech_staff_login` VALUES(54, 1, 2, 2, 4, '2020-02-24 22:54:39', NULL, '2020-02-24 22:54:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_subpart`
--

CREATE TABLE `electromech_subpart` (
  `electromech_subpart_id` int(11) NOT NULL AUTO_INCREMENT,
  `electromech_product_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_subpart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `electromech_subpart`
--

INSERT INTO `electromech_subpart` VALUES(1, 2, '', 'Shaft', NULL, 1, NULL, 1);
INSERT INTO `electromech_subpart` VALUES(3, 2, '', 'Cover', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_train`
--

CREATE TABLE `electromech_train` (
  `electromech_train_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_train_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `electromech_train`
--

INSERT INTO `electromech_train` VALUES(1, 'Train 1', NULL, 1, NULL, 1);
INSERT INTO `electromech_train` VALUES(2, 'Train 2', NULL, 1, NULL, 1);
