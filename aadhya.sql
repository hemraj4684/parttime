-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2017 at 08:49 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aadhya`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_status`
--

CREATE TABLE `account_status` (
  `account_status_id` int(15) NOT NULL,
  `status_desc` varchar(255) NOT NULL,
  `user_created` int(50) NOT NULL,
  `user_updated` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_status`
--

INSERT INTO `account_status` (`account_status_id`, `status_desc`, `user_created`, `user_updated`, `created_at`, `updated_at`) VALUES
(1, 'Trail Start', 1, 1, '2016-09-16 17:19:02', '2016-09-16 15:14:35'),
(2, 'Trail End', 1, 1, '2016-09-16 17:19:02', '2016-09-16 15:15:04'),
(3, 'Active', 1, 1, '2016-09-16 17:20:01', '2016-09-16 17:20:01'),
(4, 'Suspended', 1, 1, '2016-09-16 17:20:01', '2016-09-16 17:20:01'),
(5, 'Disable', 1, 1, '2016-09-16 17:20:20', '2016-09-16 17:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `billing_types`
--

CREATE TABLE `billing_types` (
  `bill_type_id` int(50) NOT NULL,
  `bill_type` varchar(150) NOT NULL,
  `bill_date` date NOT NULL,
  `details1` varchar(200) NOT NULL,
  `details2` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_types`
--

INSERT INTO `billing_types` (`bill_type_id`, `bill_type`, `bill_date`, `details1`, `details2`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Paypal', '2016-09-29', 'Paypal', 'Paypal', '2016-09-29 18:04:15', 1, '2016-09-29 18:04:15', 1),
(2, 'Credit Card', '2016-09-22', 'Credit Card', 'Credit Card', '2016-09-29 18:04:15', 1, '2016-09-29 18:04:15', 1),
(3, 'Pay by Check', '2016-09-29', 'Pay by Check', 'Pay by Check', '2016-09-29 18:05:07', 1, '2016-09-29 18:05:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobilenumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sms` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wEcastApp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `socialMedia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `landline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preferedContactBy` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `user_created` int(11) NOT NULL,
  `user_updated` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `client_id`, `firstname`, `lastname`, `address`, `city`, `state`, `country`, `zipcode`, `mobilenumber`, `whatsapp`, `sms`, `wEcastApp`, `socialMedia`, `facebook`, `twitter`, `landline`, `preferedContactBy`, `status`, `user_created`, `user_updated`, `dateCreated`, `dateUpdated`) VALUES
(1, 1, 'raju', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:09', '0000-00-00 00:00:00'),
(2, 1, 'venkat', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(3, 1, 'rama', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(4, 1, 'Lakshman', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(5, 1, 'Hanuma', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(6, 1, 'Krishna', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(7, 1, 'raju', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(8, 1, 'venkat', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(9, 1, 'rama', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(10, 1, 'Lakshman', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(11, 1, 'Hanuma', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(12, 1, 'Krishna', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(13, 1, 'raju', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(14, 1, 'venkat', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(15, 1, 'rama', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(16, 1, 'Lakshman', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(17, 1, 'Hanuma', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(18, 1, 'Krishna', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(19, 1, 'raju', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(20, 1, 'venkat', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(21, 1, 'rama', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(22, 1, 'Lakshman', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(23, 1, 'Hanuma', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(24, 1, 'Krishna', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(25, 1, 'raju', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(26, 1, 'venkat', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(27, 1, 'rama', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(28, 1, 'Lakshman', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(29, 1, 'Hanuma', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-19 09:29:10', '0000-00-00 00:00:00'),
(30, 1, 'raju', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(31, 1, 'venkat', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(32, 1, 'rama', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(33, 1, 'Lakshman', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(34, 1, 'Hanuma', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(35, 1, 'Krishna', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(36, 1, 'raju', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(37, 1, 'venkat', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(38, 1, 'rama', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(39, 1, 'Lakshman', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(40, 1, 'Hanuma', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(41, 1, 'Krishna', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(42, 1, 'raju', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(43, 1, 'venkat', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(44, 1, 'rama', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(45, 1, 'Lakshman', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(46, 1, 'Hanuma', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(47, 1, 'Krishna', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(48, 1, 'raju', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(49, 1, 'venkat', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(50, 1, 'rama', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(51, 1, 'Lakshman', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(52, 1, 'Hanuma', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(53, 1, 'Krishna', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:13', '0000-00-00 00:00:00'),
(54, 1, 'raju', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:14', '0000-00-00 00:00:00'),
(55, 1, 'venkat', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:14', '0000-00-00 00:00:00'),
(56, 1, 'rama', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:14', '0000-00-00 00:00:00'),
(57, 1, 'Lakshman', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:14', '0000-00-00 00:00:00'),
(58, 1, 'Hanuma', 'attili', 'kakianda', 'kakinada', 'andhra pradesh', 'india', '533004', '9632587410', 'yes', 'yes', 'yes', 'yes', 'attili', 'attili', '98746631', '0', 1, 5, 5, '2016-07-21 14:49:14', '0000-00-00 00:00:00'),
(59, 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 1, 5, 5, '2016-07-21 14:50:41', '0000-00-00 00:00:00'),
(60, 1, 'rterte', 'ertert', 'erwter', 'hyd', 'delhi', 'hddh', '997799', '234234234', 'yes', 'yes', 'yes', 'yes', 'dfasdfs', 'qqwqweq', '2342342342', '0', 1, 5, 5, '2016-07-22 04:39:31', '0000-00-00 00:00:00'),
(61, 1, 'rterte', 'ertert', 'erwter', 'hyd', 'delhi', 'hddh', '997799', '234234234', 'yes', 'yes', 'yes', 'yes', 'dfasdfs', 'qqwqweq', '2342342342', '0', 1, 5, 5, '2016-07-22 04:41:12', '0000-00-00 00:00:00'),
(62, 1, 'venkat', 'attili', 'Hyd', 'Hyd', 'Andhra Pradesh', 'India', '502032', '09701448576', 'yes', 'yes', 'yes', 'yes', 'sdfsd', 'sdfsdf', '09701448576', 'sms,email,socialmedia,wEcastApp,whatsapp', 1, 5, 5, '2016-07-22 04:42:41', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `contract_id` int(50) NOT NULL,
  `contract_title` varchar(200) NOT NULL,
  `contract_desc` varchar(200) NOT NULL,
  `contract_doc_file` varchar(200) NOT NULL,
  `doc_sign_url` varchar(250) NOT NULL,
  `status` int(56) NOT NULL,
  `created_by` int(56) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(56) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`contract_id`, `contract_title`, `contract_desc`, `contract_doc_file`, `doc_sign_url`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(3, 'test1', 'twst', 'Generic Contract - Testing.docx', 'Generic Contract - Testing.docx', 0, 1, '2017-05-17 11:26:12', 1, '0000-00-00 00:00:00'),
(4, 'test2', 'twstrte', 'GenericContract-Testing.docx', 'GenericContract-Testing.docx', 1, 1, '2017-05-17 11:26:09', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `country_phonecodes`
--

CREATE TABLE `country_phonecodes` (
  `id` int(11) NOT NULL,
  `iso` char(2) NOT NULL,
  `name` varchar(80) NOT NULL,
  `nicename` varchar(80) NOT NULL,
  `iso3` char(3) DEFAULT NULL,
  `numcode` smallint(6) DEFAULT NULL,
  `phonecode` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_phonecodes`
--

INSERT INTO `country_phonecodes` (`id`, `iso`, `name`, `nicename`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', 'CRI', 188, 506),
(53, 'CI', 'COTE D''IVOIRE', 'Cote D''Ivoire', 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE''S REPUBLIC OF', 'Korea, Democratic People''s Republic of', 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE''S DEMOCRATIC REPUBLIC', 'Lao People''s Democratic Republic', 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(25) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `user_created` int(11) NOT NULL,
  `user_updated` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(10) UNSIGNED NOT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `langitude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loc_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loc_alias_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `user_created` int(11) NOT NULL,
  `user_updated` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `latitude`, `langitude`, `loc_name`, `loc_alias_name`, `zipcode`, `client_id`, `user_created`, `user_updated`, `dateCreated`, `dateUpdated`) VALUES
(1, '78.486671', '17.385044', 'hyderabad', 'hyderabad', '500081', 1, 1, 1, '2016-08-08 13:05:26', '0000-00-00 00:00:00'),
(2, '81.8040345', '17.0005383', 'rajahmundry', 'rajahmundry', '533004', 1, 1, 1, '2016-08-08 13:11:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(25) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `message_time` datetime NOT NULL,
  `trigger_id` int(50) NOT NULL,
  `status` int(11) NOT NULL,
  `user_created` int(11) NOT NULL,
  `user_updated` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `parent_id`, `title`, `content`, `description`, `message_time`, `trigger_id`, `status`, `user_created`, `user_updated`, `dateCreated`, `dateUpdated`) VALUES
(2, 1, 'er', 'werwer', 'werw', '2016-08-23 00:00:00', 4, 1, 1, 1, '2016-08-22 18:33:26', '0000-00-00 00:00:00'),
(3, 1, 'test', 'er ertwer wer twer te rt wer twer twertaer ertwer wer twer te rt wer twer twertaer ertwer wer twer te rt wer twer twertaer ertwer wer twer te rt wer twer twertaer ertwer wer twer te rt wer twer twertaer ertwer wer twer te rt wer twer twertaer ertwer wer t', 'tewetwe we we rwe rwerwerwe rwe wr wer', '2016-08-22 18:35:54', 4, 1, 1, 1, '2016-08-22 18:36:22', '0000-00-00 00:00:00'),
(4, 1, 'tetwerwerwe rwe', 'fdgsdfgsfdgsdf sdfg sdfg sdfgsdf', 'odifsadfasijdfasidfaosijdo', '2016-08-28 07:06:22', 4, 1, 1, 5, '2016-08-28 07:06:29', '0000-00-00 00:00:00'),
(5, 1234, 'ere', 'weerw', 'wer', '2016-08-27 08:26:51', 4, 1, 1, 1, '2016-08-27 09:11:54', '0000-00-00 00:00:00'),
(6, 1234, 'ere', 'weerw', 'wer', '2016-08-27 08:26:51', 4, 1, 1, 1, '2016-08-27 09:13:43', '0000-00-00 00:00:00'),
(7, 1234, 'ere', 'weerw', 'wer', '2016-08-27 08:26:51', 4, 1, 1, 1, '2016-08-27 09:14:03', '0000-00-00 00:00:00'),
(8, 1234, 'ere', 'weerw', 'wer', '2016-08-27 08:26:51', 4, 1, 1, 1, '2016-08-27 09:14:12', '0000-00-00 00:00:00'),
(9, 1234, 'ere', 'weerw', 'wer', '2016-08-27 08:26:51', 4, 1, 1, 1, '2016-08-27 09:14:37', '0000-00-00 00:00:00'),
(10, 1234, 'ere', 'weerw', 'wer', '2016-08-27 08:26:51', 4, 1, 1, 1, '2016-08-27 09:15:29', '0000-00-00 00:00:00'),
(11, 998898, 'ere', 'weerw', 'wer', '2016-08-27 08:26:51', 4, 1, 1, 1, '2016-08-27 09:16:22', '0000-00-00 00:00:00'),
(12, 1, 'testonegsdfgsdf', 'aasasdf asd fasdfasdf asdfasd fasd fasd fasd asdfasdfasdftest one isres sdfosdfsdflkas dflamsd flasd falsdf asdf asdfka sdfasd', 'fgsdfgsdftestone', '2016-08-28 07:00:47', 4, 1, 5, 5, '2016-08-28 07:03:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_21_153530_create_roles_table', 1),
('2016_06_21_163341_create_table_rolesUsers', 2),
('2016_06_21_163712_create_table_privileges', 2),
('2016_06_21_163724_create_table_privilegeRoles', 2),
('2016_06_21_165107_create_table_messages', 2),
('2016_06_21_165116_create_table_triggers', 2),
('2016_06_21_165555_create_table_locations', 2),
('2016_06_21_165610_create_table_groups', 2),
('2016_06_21_170045_create_table_contacts', 2),
('2016_06_21_170053_create_table_clients', 2),
('2016_06_21_165116_create_table_weatherPatterns', 3);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `org_id` int(25) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `org_unique_id` varchar(50) NOT NULL,
  `org_url` text NOT NULL,
  `account_status_id` int(50) NOT NULL,
  `org_type_id` int(50) NOT NULL,
  `org_headquarters` varchar(150) NOT NULL,
  `org_num_employees` varchar(150) NOT NULL,
  `org_annual_budget` varchar(150) NOT NULL,
  `org_logo_image` text NOT NULL,
  `org_facebook` varchar(150) NOT NULL,
  `org_twitter` varchar(150) NOT NULL,
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`org_id`, `org_name`, `org_unique_id`, `org_url`, `account_status_id`, `org_type_id`, `org_headquarters`, `org_num_employees`, `org_annual_budget`, `org_logo_image`, `org_facebook`, `org_twitter`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'CMS', 'ORG1231', 'http://aadhyaCMS.com', 1, 1, 'hyderabadq', '20', '250000', 'govinda.jpg', 'rai', 'werwe', 1, 1, '2016-11-04 17:37:39', '2016-11-04 12:07:39', 1),
(17, 'test compnay2568', 'ORG12317', 'http://compnay.com', 1, 1, 'hyderabadq', '234', '250000', 'Drawing.png', 'waspmobile', 'waspmobile', 1, 1, '2016-11-14 10:43:24', '2016-11-02 08:02:20', 1),
(20, 'om technologies', 'ORG12320', 'http://omsolutions.com', 1, 1, 'malysia', '143', '500000', 'govinda.jpg', 'omsolutions', 'omsolutions', 1, 1, '2016-11-09 10:49:28', '2016-11-09 05:19:28', 0),
(21, 'We Soft Solutions', 'ORG12321', 'http://omsolutions.com', 1, 1, 'hyderabadq', '20', '250000', '', 'rai', 'werwe', 1, 1, '2016-11-14 17:17:07', '2016-11-14 11:47:07', 0),
(25, 'Prominere', 'ORG12325', 'http://compnay.com', 1, 1, 'kakinada', '400', '400000', 'Drawing.png', 'prominere', 'prominere', 1, 1, '2016-12-10 05:03:10', '2016-12-09 23:33:10', 1),
(26, 'aadhya', 'ORG12326', 'https://www.aadhya-analytics.com/', 1, 1, 'vijayawada', '25', '25000', 'Colorful-business-card-design.jpg', 'aadhya-analytics', 'aadhya-analytics', 1, 1, '2017-05-19 09:47:15', '2017-05-19 04:17:15', 1),
(27, 'test', 'ORG12327', 'test', 1, 1, 'k', 'k', 'kk', 'corporate+business+cards+design+2013+27.jpg', 'k', 'k', 1, 1, '2017-05-23 17:46:43', '2017-05-23 12:16:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `organization_types`
--

CREATE TABLE `organization_types` (
  `org_type_id` int(15) NOT NULL,
  `org_type_name` varchar(150) NOT NULL,
  `org_industry_type_id` int(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization_types`
--

INSERT INTO `organization_types` (`org_type_id`, `org_type_name`, `org_industry_type_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Private', 3, '2016-09-16 09:50:09', '2016-09-16 09:47:59', 1, 1),
(2, 'Public', 3, '2016-09-16 09:49:55', '2016-09-16 09:47:59', 1, 1),
(3, 'Non-profit', 3, '2016-09-16 09:50:00', '2016-09-16 09:47:59', 1, 1),
(4, 'State Government', 1, '2016-09-16 09:50:04', '2016-09-16 09:47:59', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orgnization_addresses`
--

CREATE TABLE `orgnization_addresses` (
  `org_address_id` int(11) NOT NULL,
  `org_id` int(50) NOT NULL,
  `address_name` varchar(150) NOT NULL,
  `address_line1` varchar(150) NOT NULL,
  `address_line2` varchar(150) NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `country` int(50) NOT NULL,
  `zipcode` varchar(150) NOT NULL,
  `latitude` varchar(150) NOT NULL,
  `longitude` varchar(150) NOT NULL,
  `tele_prefix` int(50) NOT NULL,
  `telephone` varchar(150) NOT NULL,
  `fax` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orgnization_addresses`
--

INSERT INTO `orgnization_addresses` (`org_address_id`, `org_id`, `address_name`, `address_line1`, `address_line2`, `city`, `state`, `country`, `zipcode`, `latitude`, `longitude`, `tele_prefix`, `telephone`, `fax`, `email`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Office Address', 'Hyd', '23 Main St', 'Hyd', 'Andhra Pradesh', 99, '502032', '10.25', '12.25', 91, '3125559050', '178889', 'venkat@gmail.com', 1, 1, '2016-12-20 15:18:33', '2016-09-16 07:38:45'),
(2, 1, 'Office Address', 'banjarahills', 'road 12', 'hyderabad', 'Telangana', 99, '500001', '25.36', '58.25', 91, '09701438576', '9701438576', 'venkatattili@yahoo.com', 1, 1, '2016-12-20 15:18:33', '2016-09-21 12:22:22'),
(5, 17, 'Office Address', 'Hyd', 'kkainasda', 'Hyd', 'Andhra Pradesh', 99, '502032', '17.385044', '78.486671', 91, '09701448576', '97014', 'attilivenkat3@gmail.com', 1, 1, '2016-12-20 15:18:24', '2016-10-04 13:32:28'),
(6, 17, 'Office Address', 'Hydte', 'kidu', 'kakinda', 'Andhra Pradesh', 99, '533004', '16', '82.24746479999999', 91, '987654321', '5255625', 'vattili@waspmoi.vom', 1, 1, '2016-12-20 15:18:33', '2016-10-04 13:32:28'),
(11, 20, 'Office Address', 'hitechcity', 'hitechcity', 'hyderabad', 'telangana', 99, '500001', '17.4474117', '78.37623039999994', 91, '123123123', '123123123123', 'venkat@om.ocom', 1, 1, '2016-12-20 15:18:33', '2016-10-21 01:21:09'),
(12, 20, 'Office Address', 'gachibowly', 'gachibowly', 'hyderad', 'telnagana', 99, '12312312', '23.3255555', '78.34891679999998', 91, '234234234', '234234234', 'raju@om.com', 1, 1, '2016-12-20 15:20:06', '2016-11-09 05:19:28'),
(13, 21, 'Office Address', 'Hyd', '', 'Hyd', 'Andhra Pradesh', 99, '502032', '17.2402633', '78.42938509999999', 91, '09701448576', '', 'attilivenkrat3@gmail.com', 1, 1, '2016-12-20 15:20:19', '2016-11-11 08:46:44'),
(14, 21, 'Office Address', 'Hyd', '', 'Hyd', 'Andhra Pradesh', 99, '502032', '17.2402633', '78.42938509999999', 91, '09701448576', '', 'attilivenkdat3@gmail.com', 1, 1, '2016-12-20 15:20:19', '2016-11-11 08:46:44'),
(15, 22, 'Office Address', 'Hyd', '208', 'Hyd', 'Andhra Pradesh', 99, '502032', '17.4474117', '78.37623039999994', 91, '09701448576', '', 'attilivenkat3@gmail.com', 1, 1, '2016-12-20 15:20:19', '2016-11-16 07:27:31'),
(16, 22, 'Office Address', 'Hyd', '208', 'Hyd', 'Andhra Pradesh', 99, '502032', '17.4138277', '78.43975840000007', 91, '09701448576', '', 'attilivenkat3@gmail.com', 1, 1, '2016-12-20 15:20:19', '2016-11-16 07:27:31'),
(17, 23, 'Office Address', 'Hyd', '208', 'Hyd', 'Hyd', 99, 'Hyd', '16.7271912', '82.21757750000006', 91, '09701448576', '', 'attilivenkat3@gmail.com', 1, 1, '2016-12-20 15:20:19', '2016-11-16 08:07:41'),
(18, 23, 'Office Address', 'Hyd', '208', 'Hyd', 'Andhra Pradesh', 99, '502032', '16.7271912', '82.21757750000006', 91, '09701448576', '48576', 'attilivenkat3@gmail.com', 1, 1, '2016-12-20 15:20:19', '2016-11-16 08:07:41'),
(19, 24, 'Office Address', 'Hyd', '208', 'Hyd', 'Andhra Pradesh', 99, '502032', '17.385044', '78.486671', 91, '09701448576', '', 'attilivenkat3@gmail.com', 1, 1, '2016-12-20 15:20:19', '2016-11-16 08:43:58'),
(20, 24, 'Office Address', 'Hyd', '208', 'Hyd', 'Andhra Pradesh', 99, '502032', '16.9890648', '82.24746479999999', 91, '09701448576', '48576', 'attilivenkat3@gmail.com', 1, 1, '2016-12-20 15:20:19', '2016-11-16 08:43:58'),
(21, 25, 'Office Address', '208', '208', 'Hyd', 'Andhra Pradesh', 99, '502032', '', '', 91, '9701448576', '97014', 'attilivenkat3@gmail.com', 1, 1, '2016-12-20 15:20:19', '2016-12-06 06:52:36'),
(22, 25, 'Office Address', '208', '208', 'Hyd', 'Andhra Pradesh', 99, '502032', '', '', 91, '9701448576', '48576', 'attilivenkat3@gmail.com', 1, 1, '2016-12-20 15:20:19', '2016-12-06 06:52:36'),
(23, 25, 'Office Address', '2-154, madhura nagar', '', 'kakinada', 'Andhra Pradesh', 99, '533004', '', '', 91, '968574744', '969696', 'venkat@raju.com', 1, 1, '2016-12-20 15:20:19', '2016-12-09 23:33:10'),
(24, 25, 'Office Address', '3-124, madhura nagar', '', 'kakinada', 'Andhra Pradesh', 99, '533004', '', '', 91, '9698588', '234234', 'raju@om.com', 1, 1, '2016-12-20 15:20:19', '2016-12-09 23:33:10'),
(25, 30, 'sdfdsf', 'sdfsd', 'kakinada', 'kakinada', 'andhra pradesh', 0, '533001', '16.9816107', '82.21536200000003', 91, '9876543210', '963258741', 'venkat@test.com', 1, 1, '2017-05-15 08:43:57', '2017-05-15 08:43:57'),
(26, 31, 'kakinada', 'kakinada', 'kakinada', 'kakinada', 'andhra pradesh', 0, '89889', '58.25', '58.25', 91, '9876543210', '963258741', 'venkat@test.com', 1, 1, '2017-05-15 08:45:28', '2017-05-15 08:45:28'),
(27, 32, 'kakinada', 'kakinada', 'kakinada', 'kakinada', 'andhra pradesh', 0, '89889', '58.25', '58.25', 91, '9876543210', '963258741', 'venkat@test.com', 1, 1, '2017-05-15 08:46:24', '2017-05-15 08:46:24'),
(28, 32, 'kakinada', 'kakinada', 'kakinada', 'kakinada', 'andhra pradesh', 0, '533004', '16.963134', '82.22938399999998', 91, '984984984', '98498798', 'venkat@gmail.com', 1, 1, '2017-05-15 08:46:24', '2017-05-15 08:46:24'),
(29, 33, 'hyderabad', 'hyderabad', 'hyderabad', 'hyderabad', 'andhra pradesh', 0, '502032', '69.25', '58.25', 91, '987654321', '45465464', 'vennkat@gmail.com', 1, 1, '2017-05-16 10:00:19', '2017-05-16 10:00:19'),
(30, 33, 'test', 'kakinada', 'kakinada', 'kakinada', 'andhra pradesh', 0, '533004', '16.963134', '82.22938399999998', 91, '5885555555', '55555555555555', 'venkat@gmail.com', 1, 1, '2017-05-16 10:00:19', '2017-05-16 10:00:19'),
(31, 26, 'vijayawada', '2-39,Old SBI Road,', 'Sri Nagar Colony,Gannavaram', 'Vijayawada ', 'andhra pradesh', 0, '521101', '16.3002426', '80.45485929999995', 91, '9876543210', '963258741', 'vattili@aadhya-analytics.com', 1, 1, '2017-05-19 04:17:15', '2017-05-19 04:17:15'),
(32, 26, 'us', '1900 West Park Drive', 'Suite 280', 'Westborough', 'MA', 0, '01581', '42.2812273', '-71.57248440000001', 1, '9876543210', '987524631', 'vattili@aadhya-analytics.com', 1, 1, '2017-05-19 04:17:15', '2017-05-19 04:17:15'),
(33, 27, 'address', 'kakinada', 'kakinada', 'kakinada', 'andhra pradesh', 0, '01581', '16.982299', '82.222714', 91, '987654321', '963258741', 'venkat@test.com', 1, 1, '2017-05-23 12:16:43', '2017-05-23 12:16:43'),
(34, 27, 'kakinada', 'kakinada', 'kakinada', 'kakinada', 'andhra pradesh', 0, '533001', '16.9482342', '82.25289750000002', 91, '984984984', '98498798', 'venkat@gmail.com', 1, 1, '2017-05-23 12:16:43', '2017-05-23 12:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `org_bills`
--

CREATE TABLE `org_bills` (
  `org_bill_id` int(50) NOT NULL,
  `org_id` int(50) NOT NULL,
  `bill_type_id` int(50) NOT NULL,
  `created_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_by` int(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `bill_date` date NOT NULL,
  `status` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_bills`
--

INSERT INTO `org_bills` (`org_bill_id`, `org_id`, `bill_type_id`, `created_by`, `created_at`, `updated_by`, `updated_at`, `bill_date`, `status`) VALUES
(3, 1, 1, 1, '2016-11-02 13:49:18', 1, '2016-10-21 05:22:24', '2016-10-05', 1),
(4, 20, 3, 1, '2016-11-02 13:49:24', 1, '2016-10-21 01:24:15', '2016-11-09', 1),
(5, 21, 1, 1, '2016-11-11 15:06:29', 1, '2016-11-11 09:36:29', '0000-00-00', 0),
(6, 22, 2, 1, '2016-12-02 06:07:04', 1, '2016-12-02 06:07:04', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_contracts`
--

CREATE TABLE `org_contracts` (
  `org_con_id` int(25) NOT NULL,
  `contract_start_date` date NOT NULL,
  `contract_end_date` date NOT NULL,
  `org_id` int(50) NOT NULL,
  `service_id` int(50) NOT NULL,
  `contract_id` int(50) NOT NULL,
  `doc_sign_url` varchar(250) NOT NULL,
  `contract_status` int(50) NOT NULL,
  `created_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_contracts`
--

INSERT INTO `org_contracts` (`org_con_id`, `contract_start_date`, `contract_end_date`, `org_id`, `service_id`, `contract_id`, `doc_sign_url`, `contract_status`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`) VALUES
(2, '2016-05-05', '2016-06-22', 1, 1, 3, '', 1, 1, '2016-09-26 13:26:20', 1, '2016-10-01 00:51:35', 0),
(4, '2016-08-31', '2016-09-29', 25, 2, 4, '', 1, 1, '2016-09-27 08:38:46', 1, '2016-09-27 23:29:21', 0),
(6, '2016-05-05', '2016-09-08', 20, 2, 3, '', 1, 1, '2016-09-27 23:27:49', 1, '2016-09-27 23:27:49', 0),
(8, '2016-12-30', '2016-10-26', 17, 1, 4, '', 1, 1, '2016-10-09 14:18:51', 1, '2016-11-09 08:57:22', 1),
(9, '2017-05-17', '2018-05-17', 26, 2, 3, '', 0, 1, '2017-05-19 04:20:18', 1, '2017-05-19 04:20:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_departments`
--

CREATE TABLE `org_departments` (
  `org_department_id` int(50) NOT NULL,
  `org_id` int(50) NOT NULL,
  `department_name` varchar(150) NOT NULL,
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `org_industry_types`
--

CREATE TABLE `org_industry_types` (
  `org_industry_type_id` int(50) NOT NULL,
  `industry_type_name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_industry_types`
--

INSERT INTO `org_industry_types` (`org_industry_type_id`, `industry_type_name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Banking', '2016-09-16 09:45:24', '2016-09-16 06:02:30', 1, 1),
(2, 'Insurance', '2016-09-16 09:45:24', '2016-09-16 03:30:00', 1, 1),
(3, 'Information Technology', '2016-09-16 09:46:06', '2016-09-16 06:02:30', 1, 1),
(4, 'Retail', '2016-09-16 09:46:06', '2016-09-16 03:30:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_professional_users`
--

CREATE TABLE `org_professional_users` (
  `org_prof_id` int(50) NOT NULL,
  `org_id` int(150) NOT NULL,
  `user_id` int(150) NOT NULL,
  `created_by` int(150) NOT NULL,
  `updated_by` int(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_professional_users`
--

INSERT INTO `org_professional_users` (`org_prof_id`, `org_id`, `user_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 28, 1, 1, '2016-10-16 18:05:44', '2016-10-16 12:35:43'),
(4, 18, 3, 1, 1, '2016-10-16 12:41:22', '2016-10-16 12:41:22'),
(5, 1, 2, 1, 1, '2016-10-21 05:25:14', '2016-10-21 05:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `org_services`
--

CREATE TABLE `org_services` (
  `org_ser_id` int(50) NOT NULL,
  `org_id` int(50) NOT NULL,
  `service_id` int(50) NOT NULL,
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_services`
--

INSERT INTO `org_services` (`org_ser_id`, `org_id`, `service_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 2, 1, 1, '2016-11-02 13:50:11', '2016-09-21 08:02:45', 1),
(3, 1, 1, 1, 1, '2016-11-11 15:17:18', '2016-11-11 09:47:18', 0),
(5, 17, 1, 1, 1, '2016-11-02 13:50:17', '2016-10-18 04:50:12', 1),
(6, 20, 1, 1, 1, '2016-11-02 13:50:19', '2016-10-21 01:22:28', 1),
(7, 21, 1, 1, 1, '2016-11-15 15:03:51', '2016-11-11 09:36:29', 1),
(8, 21, 2, 1, 1, '2016-11-15 15:04:42', '2016-11-15 09:34:42', 1),
(9, 25, 1, 1, 1, '2016-12-09 23:35:00', '2016-12-09 23:35:00', 1),
(10, 21, 2, 1, 1, '2016-12-26 06:38:21', '2016-12-26 06:38:21', 1),
(11, 32, 1, 1, 1, '2017-05-15 08:50:42', '2017-05-15 08:50:42', 1),
(12, 33, 1, 1, 1, '2017-05-16 10:01:37', '2017-05-16 10:01:37', 1),
(13, 26, 2, 1, 1, '2017-05-19 04:19:58', '2017-05-19 04:19:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `org_support_details`
--

CREATE TABLE `org_support_details` (
  `org_sup_id` int(50) NOT NULL,
  `org_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `role_id` int(50) NOT NULL,
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `org_support_details`
--

INSERT INTO `org_support_details` (`org_sup_id`, `org_id`, `user_id`, `role_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, 28, 2, 1, 1, '2016-11-28 11:12:58', '2016-10-21 06:45:07', 0),
(2, 18, 3, 2, 1, 1, '2016-11-28 11:13:01', '2016-10-21 06:45:07', 0),
(3, 1, 2, 2, 1, 1, '2016-11-28 11:13:03', '2016-10-21 06:45:33', 0),
(4, 20, 3, 2, 1, 1, '2016-11-28 11:13:06', '2016-10-21 01:24:57', 0),
(5, 21, 43, 2, 1, 1, '2016-11-28 11:13:10', '2016-11-11 09:36:29', 0),
(6, 17, 43, 4, 1, 1, '2016-11-28 05:47:37', '2016-11-28 05:47:37', 0),
(7, 20, 43, 3, 1, 1, '2016-11-28 05:47:37', '2016-11-28 05:47:37', 0),
(8, 17, 44, 3, 1, 1, '2016-11-29 12:31:29', '2016-11-29 12:31:29', 0),
(9, 20, 44, 3, 1, 1, '2016-11-29 12:31:29', '2016-11-29 12:31:29', 0),
(10, 32, 52, 0, 1, 1, '2017-05-15 08:52:22', '2017-05-15 08:52:22', 0),
(11, 26, 57, 0, 1, 1, '2017-05-19 04:20:36', '2017-05-19 04:20:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('vattili@aadhya-analytics.com', '225c1dd1a890dd2e46ceb7edbe466ec0d7af36c11729da2cbdc757fdb16aed34', '2016-11-29 12:50:10');

-- --------------------------------------------------------

--
-- Table structure for table `permissionroles`
--

CREATE TABLE `permissionroles` (
  `id` int(50) NOT NULL,
  `role_id` int(50) NOT NULL,
  `permission_id` int(50) NOT NULL,
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissionroles`
--

INSERT INTO `permissionroles` (`id`, `role_id`, `permission_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 71, 3, 1, 1, '2016-10-25 12:05:36', '2016-10-25 12:05:36'),
(2, 71, 9, 1, 1, '2016-10-25 12:05:36', '2016-10-25 12:05:36'),
(14, 72, 2, 1, 1, '2016-11-09 09:05:23', '2016-11-09 09:05:23'),
(15, 72, 3, 1, 1, '2016-11-09 09:05:23', '2016-11-09 09:05:23'),
(16, 72, 4, 1, 1, '2016-11-09 09:05:23', '2016-11-09 09:05:23'),
(17, 72, 5, 1, 1, '2016-11-09 09:05:23', '2016-11-09 09:05:23'),
(18, 72, 6, 1, 1, '2016-11-09 09:05:23', '2016-11-09 09:05:23'),
(19, 1, 2, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(20, 1, 3, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(21, 1, 4, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(22, 1, 5, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(23, 1, 6, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(24, 2, 3, 1, 1, '2016-11-13 07:54:09', '2016-11-13 07:54:09'),
(25, 2, 5, 1, 1, '2016-11-13 07:54:09', '2016-11-13 07:54:09'),
(26, 3, 2, 1, 1, '2016-11-13 07:55:35', '2016-11-13 07:55:35'),
(27, 3, 3, 1, 1, '2016-11-13 07:55:36', '2016-11-13 07:55:36'),
(28, 3, 5, 1, 1, '2016-11-13 07:55:36', '2016-11-13 07:55:36'),
(29, 4, 3, 1, 1, '2016-11-13 07:56:21', '2016-11-13 07:56:21'),
(30, 4, 4, 1, 1, '2016-11-13 07:56:21', '2016-11-13 07:56:21'),
(31, 4, 5, 1, 1, '2016-11-13 07:56:21', '2016-11-13 07:56:21'),
(32, 5, 2, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(33, 5, 3, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(34, 5, 4, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(35, 5, 5, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(36, 5, 6, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(37, 6, 2, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(38, 6, 3, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(39, 6, 4, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(40, 6, 5, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(41, 6, 6, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(42, 7, 3, 1, 1, '2016-11-13 08:01:48', '2016-11-13 08:01:48'),
(43, 8, 4, 1, 1, '2016-11-13 08:02:21', '2016-11-13 08:02:21'),
(44, 8, 5, 1, 1, '2016-11-13 08:02:21', '2016-11-13 08:02:21'),
(45, 9, 3, 1, 1, '2016-11-13 08:02:54', '2016-11-13 08:02:54'),
(46, 10, 4, 1, 1, '2016-11-13 08:03:15', '2016-11-13 08:03:15'),
(47, 11, 2, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(48, 11, 3, 1, 1, '2016-12-16 10:22:03', '2016-12-16 10:22:03'),
(49, 11, 4, 1, 1, '2016-12-16 10:22:03', '2016-12-16 10:22:03'),
(50, 11, 5, 1, 1, '2016-12-16 10:22:03', '2016-12-16 10:22:03'),
(51, 11, 6, 1, 1, '2016-12-16 10:22:03', '2016-12-16 10:22:03'),
(52, 11, 7, 1, 1, '2016-12-16 10:22:03', '2016-12-16 10:22:03'),
(53, 12, 2, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(54, 12, 3, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(55, 12, 4, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(56, 12, 5, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(57, 12, 6, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(58, 13, 2, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31'),
(59, 13, 3, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31'),
(60, 13, 4, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31'),
(61, 13, 5, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31'),
(62, 13, 6, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int(50) NOT NULL,
  `permission_action` varchar(150) NOT NULL,
  `permission_desc` varchar(150) NOT NULL,
  `privilege_id` int(50) NOT NULL,
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `permission_action`, `permission_desc`, `privilege_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Dashboard', 'Dashboard', 0, 1, 1, '2016-09-24 05:05:04', '2016-09-24 05:05:04'),
(3, 'Access', 'Access', 0, 1, 1, '2016-09-24 05:05:21', '2016-09-24 05:05:21'),
(4, 'Settings', 'Settings', 0, 1, 1, '2016-09-24 05:05:36', '2016-09-24 05:05:36'),
(5, 'Accounts', 'Accounts', 0, 1, 1, '2016-09-24 05:05:52', '2016-09-24 05:05:52'),
(6, 'Portal settings', 'Portal Settings', 0, 1, 1, '2016-09-24 05:06:12', '2016-09-24 05:06:12'),
(7, 'test', 'testt', 0, 1, 1, '2016-11-24 11:47:29', '2016-11-24 11:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `portal_email_server_settings`
--

CREATE TABLE `portal_email_server_settings` (
  `pe_id` int(50) NOT NULL,
  `from_email_addrss` varchar(150) NOT NULL,
  `reply_to_address` varchar(150) NOT NULL,
  `admin_email_address` varchar(150) NOT NULL,
  `email_delivery_method_configuration` varchar(150) NOT NULL,
  `transfer_portocol` varchar(150) NOT NULL,
  `smtp_server_hostname` varchar(150) NOT NULL,
  `smtp_server_port` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `portal_user_authentication_settings`
--

CREATE TABLE `portal_user_authentication_settings` (
  `puas_id` int(50) NOT NULL,
  `user_authentication_method` varchar(150) NOT NULL,
  `failed_login_attempts_before_account_lock` int(50) NOT NULL,
  `days_inactive_before_account_lock` int(50) NOT NULL,
  `days_before_password_change_require` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `privilegeroles`
--

CREATE TABLE `privilegeroles` (
  `id` int(10) UNSIGNED NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `privilege_add` int(25) NOT NULL,
  `privilege_edit` int(25) NOT NULL,
  `privilege_list` int(25) NOT NULL,
  `privilege_delete` int(25) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `privilegeroles`
--

INSERT INTO `privilegeroles` (`id`, `privilege_id`, `role_id`, `privilege_add`, `privilege_edit`, `privilege_list`, `privilege_delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:26', '2016-11-13 07:50:26'),
(2, 2, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(3, 3, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(4, 4, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(5, 5, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(6, 6, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(7, 7, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(8, 8, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(9, 9, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(10, 10, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(11, 11, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(12, 12, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(13, 13, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(14, 14, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(15, 15, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(16, 16, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(17, 17, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(18, 18, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(19, 19, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(20, 20, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(21, 21, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(22, 22, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(23, 23, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(24, 24, 1, 0, 0, 0, 0, 1, 1, '2016-11-13 07:50:27', '2016-11-13 07:50:27'),
(25, 1, 2, 0, 0, 0, 0, 1, 1, '2016-11-13 07:54:08', '2016-11-13 07:54:08'),
(26, 5, 2, 0, 0, 0, 0, 1, 1, '2016-11-13 07:54:08', '2016-11-13 07:54:08'),
(27, 9, 2, 0, 0, 0, 0, 1, 1, '2016-11-13 07:54:09', '2016-11-13 07:54:09'),
(28, 13, 2, 0, 0, 0, 0, 1, 1, '2016-11-13 07:54:09', '2016-11-13 07:54:09'),
(29, 17, 2, 0, 0, 0, 0, 1, 1, '2016-11-13 07:54:09', '2016-11-13 07:54:09'),
(30, 21, 2, 0, 0, 0, 0, 1, 1, '2016-11-13 07:54:09', '2016-11-13 07:54:09'),
(31, 5, 3, 0, 0, 0, 0, 1, 1, '2016-11-13 07:55:35', '2016-11-13 07:55:35'),
(32, 9, 3, 0, 0, 0, 0, 1, 1, '2016-11-13 07:55:35', '2016-11-13 07:55:35'),
(33, 13, 3, 0, 0, 0, 0, 1, 1, '2016-11-13 07:55:35', '2016-11-13 07:55:35'),
(34, 17, 3, 0, 0, 0, 0, 1, 1, '2016-11-13 07:55:35', '2016-11-13 07:55:35'),
(35, 21, 3, 0, 0, 0, 0, 1, 1, '2016-11-13 07:55:35', '2016-11-13 07:55:35'),
(36, 1, 4, 0, 0, 0, 0, 1, 1, '2016-11-13 07:56:21', '2016-11-13 07:56:21'),
(37, 5, 4, 0, 0, 0, 0, 1, 1, '2016-11-13 07:56:21', '2016-11-13 07:56:21'),
(38, 9, 4, 0, 0, 0, 0, 1, 1, '2016-11-13 07:56:21', '2016-11-13 07:56:21'),
(39, 13, 4, 0, 0, 0, 0, 1, 1, '2016-11-13 07:56:21', '2016-11-13 07:56:21'),
(40, 17, 4, 0, 0, 0, 0, 1, 1, '2016-11-13 07:56:21', '2016-11-13 07:56:21'),
(41, 21, 4, 0, 0, 0, 0, 1, 1, '2016-11-13 07:56:21', '2016-11-13 07:56:21'),
(42, 1, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:52', '2016-11-13 07:59:52'),
(43, 2, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:52', '2016-11-13 07:59:52'),
(44, 3, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:52', '2016-11-13 07:59:52'),
(45, 4, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:52', '2016-11-13 07:59:52'),
(46, 5, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:52', '2016-11-13 07:59:52'),
(47, 6, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:52', '2016-11-13 07:59:52'),
(48, 7, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:52', '2016-11-13 07:59:52'),
(49, 8, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:52', '2016-11-13 07:59:52'),
(50, 9, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:52', '2016-11-13 07:59:52'),
(51, 10, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(52, 11, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(53, 12, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(54, 13, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(55, 14, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(56, 15, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(57, 16, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(58, 17, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(59, 18, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(60, 19, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(61, 20, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(62, 21, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(63, 22, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(64, 23, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(65, 24, 5, 0, 0, 0, 0, 1, 1, '2016-11-13 07:59:53', '2016-11-13 07:59:53'),
(66, 1, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(67, 2, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(68, 3, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(69, 4, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(70, 5, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(71, 6, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(72, 7, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(73, 9, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(74, 10, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(75, 11, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(76, 13, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(77, 14, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(78, 15, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(79, 17, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(80, 18, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(81, 19, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(82, 21, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(83, 22, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(84, 23, 6, 0, 0, 0, 0, 1, 1, '2016-11-13 08:00:29', '2016-11-13 08:00:29'),
(85, 21, 7, 0, 0, 0, 0, 1, 1, '2016-11-13 08:01:48', '2016-11-13 08:01:48'),
(86, 17, 8, 0, 0, 0, 0, 1, 1, '2016-11-13 08:02:21', '2016-11-13 08:02:21'),
(87, 18, 8, 0, 0, 0, 0, 1, 1, '2016-11-13 08:02:21', '2016-11-13 08:02:21'),
(88, 21, 9, 0, 0, 0, 0, 1, 1, '2016-11-13 08:02:54', '2016-11-13 08:02:54'),
(89, 21, 10, 0, 0, 0, 0, 1, 1, '2016-11-13 08:03:15', '2016-11-13 08:03:15'),
(90, 1, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(91, 2, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(92, 3, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(93, 4, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(94, 5, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(95, 6, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(96, 7, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(97, 13, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(98, 14, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(99, 17, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(100, 18, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(101, 21, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(102, 22, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(103, 25, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(104, 26, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(105, 29, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(106, 30, 11, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(107, 1, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:54', '2016-12-16 10:22:54'),
(108, 2, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:54', '2016-12-16 10:22:54'),
(109, 3, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:54', '2016-12-16 10:22:54'),
(110, 4, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(111, 5, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(112, 6, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(113, 7, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(114, 8, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(115, 13, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(116, 14, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(117, 16, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(118, 17, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(119, 18, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(120, 19, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(121, 21, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(122, 22, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(123, 23, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(124, 25, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(125, 27, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(126, 29, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(127, 31, 12, 0, 0, 0, 0, 1, 1, '2016-12-16 10:22:55', '2016-12-16 10:22:55'),
(128, 1, 13, 0, 0, 0, 0, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31'),
(129, 5, 13, 0, 0, 0, 0, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31'),
(130, 13, 13, 0, 0, 0, 0, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31'),
(131, 17, 13, 0, 0, 0, 0, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31'),
(132, 21, 13, 0, 0, 0, 0, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31'),
(133, 25, 13, 0, 0, 0, 0, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31'),
(134, 29, 13, 0, 0, 0, 0, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE `privileges` (
  `privilege_id` int(25) NOT NULL,
  `privilege_action` varchar(100) NOT NULL,
  `privilege_desc` varchar(100) NOT NULL,
  `priv_id` varchar(25) NOT NULL,
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`privilege_id`, `privilege_action`, `privilege_desc`, `priv_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'List', 'Users', 'users1', 1, 1, '2016-11-25 12:03:12', '2016-10-29 08:35:20'),
(2, 'Add', 'Users', 'users1', 1, 1, '2016-11-25 12:03:08', '2016-06-19 18:30:00'),
(3, 'Edit', 'Users', 'users1', 1, 1, '2016-11-25 12:03:05', '2016-06-19 18:30:00'),
(4, 'Delete', 'Users', 'users1', 1, 1, '2016-11-25 12:03:02', '2016-06-19 18:30:00'),
(5, 'List', 'Roles', 'roles1', 1, 1, '2016-10-29 13:44:21', '2016-06-19 18:30:00'),
(6, 'Add', 'Roles', 'roles1', 1, 1, '2016-10-29 13:44:25', '2016-06-19 18:30:00'),
(7, 'Edit', 'Roles', 'roles1', 1, 1, '2016-10-29 13:44:31', '2016-06-19 18:30:00'),
(8, 'Delete', 'Roles', 'roles1', 1, 1, '2016-10-29 13:44:35', '2016-06-19 18:30:00'),
(13, 'List', 'Organization', 'org1', 1, 1, '2016-10-29 13:45:07', '2016-06-19 18:30:00'),
(14, 'Add', 'Organization', 'org1', 1, 1, '2016-10-29 13:45:10', '2016-06-19 18:30:00'),
(15, 'Edit', 'Organization', 'org1', 1, 1, '2016-10-29 13:45:13', '2016-06-19 18:30:00'),
(16, 'Delete', 'Organization', 'org1', 1, 1, '2016-10-29 13:45:16', '2016-06-19 18:30:00'),
(17, 'List', 'Contracts', 'contacts1', 1, 1, '2016-10-29 13:45:23', '2016-06-19 18:30:00'),
(18, 'Add', 'Contracts', 'contacts1', 1, 1, '2016-10-29 13:45:30', '2016-06-19 18:30:00'),
(19, 'Edit', 'Contracts', 'contacts1', 1, 1, '2016-10-29 13:45:34', '2016-06-19 18:30:00'),
(20, 'Delete', 'Contracts', 'contacts1', 1, 1, '2016-10-29 13:45:36', '2016-06-19 18:30:00'),
(21, 'List', 'CMS Services', 'services1', 1, 1, '2016-11-25 12:03:46', '2016-10-27 21:57:09'),
(22, 'Add', 'CMS Services', 'services1', 1, 1, '2016-11-25 12:03:43', '2016-10-27 21:57:09'),
(23, 'Edit', 'CMS Services', 'services1', 1, 1, '2016-11-25 12:03:39', '2016-10-27 21:57:09'),
(24, 'Delete', 'CMS Services', 'services1', 1, 1, '2016-11-25 12:03:48', '2016-10-27 21:57:09'),
(25, 'List', 'Organization Admin', 'organizationadmin1', 1, 1, '2016-11-25 12:10:57', '2016-11-25 06:39:28'),
(26, 'Add', 'Organization Admin', 'organizationadmin1', 1, 1, '2016-11-25 12:10:57', '2016-11-25 06:34:43'),
(27, 'Edit', 'Organization Admin', 'organizationadmin1', 1, 1, '2016-11-25 12:10:57', '2016-11-25 06:34:43'),
(28, 'Delete', 'Organization Admin', 'organizationadmin1', 1, 1, '2016-11-25 12:10:57', '2016-11-25 06:34:43'),
(29, 'List', 'Billing', 'Billing1', 1, 1, '2016-11-25 06:41:34', '2016-11-25 06:41:34'),
(30, 'Add', 'Billing', 'Billing1', 1, 1, '2016-11-25 06:41:34', '2016-11-25 06:41:34'),
(31, 'Edit', 'Billing', 'Billing1', 1, 1, '2016-11-25 06:41:34', '2016-11-25 06:41:34'),
(32, 'Delete', 'Billing', 'Billing1', 1, 1, '2016-11-25 06:41:34', '2016-11-25 06:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_type` int(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_desc`, `role_type`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super Admin', 1, 1, 1, '2016-12-16 14:46:53', '2016-11-13 07:50:26'),
(2, 'Professional Service User ', 'Professional Service User ', 1, 1, 1, '2016-12-16 14:46:57', '2016-11-13 07:54:08'),
(3, 'Technical Services User', 'Technical Services User', 1, 1, 1, '2016-12-16 14:47:00', '2016-11-13 07:55:35'),
(4, 'Financial Services User', 'Financial Services User', 1, 1, 1, '2016-12-16 14:47:04', '2016-11-13 07:56:21'),
(5, 'Organization Admin', 'Organization Admin', 2, 1, 1, '2016-12-16 14:47:12', '2016-11-13 07:59:52'),
(6, 'Department Admin', 'Department Admin', 2, 1, 1, '2016-12-16 14:47:15', '2016-11-13 08:00:29'),
(7, 'Data Manager', 'Data Manager', 2, 1, 1, '2016-12-16 14:47:18', '2016-11-13 08:01:48'),
(8, 'Group Manager', 'Group Manager', 2, 1, 1, '2016-12-16 14:47:20', '2016-11-13 08:02:21'),
(9, 'Operator', 'Operator', 2, 1, 1, '2016-12-16 14:47:24', '2016-11-13 08:02:54'),
(10, 'Dispatcher', 'Dispatcher', 2, 1, 1, '2016-12-16 14:47:26', '2016-11-13 08:03:15'),
(11, 'Professional Service Manager', 'Professional Service Manager', 1, 1, 1, '2016-12-16 10:22:02', '2016-12-16 10:22:02'),
(12, 'Technical Services Manager', 'Technical Services Manager', 1, 1, 1, '2016-12-16 10:22:54', '2016-12-16 10:22:54'),
(13, 'Financial Services Manager', 'Financial Services Manager', 1, 1, 1, '2016-12-16 10:23:31', '2016-12-16 10:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `rolesusers`
--

CREATE TABLE `rolesusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_created` int(11) NOT NULL,
  `user_updated` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `security_question`
--

CREATE TABLE `security_question` (
  `question_id` int(50) NOT NULL,
  `question_desc` varchar(150) NOT NULL,
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `security_question`
--

INSERT INTO `security_question` (`question_id`, `question_desc`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'What was your favorite place to visit as a child?', 1, 1, '2016-11-28 09:36:30', '2016-11-28 09:31:55'),
(2, 'In what city were you born?', 1, 1, '2016-11-28 09:31:55', '2016-11-28 09:31:55'),
(3, 'What is the name of your first school?', 1, 1, '2016-11-28 09:36:18', '2016-11-28 09:36:18'),
(4, 'What is your favorite movie?', 1, 1, '2016-11-28 09:36:18', '2016-11-28 09:36:18'),
(5, 'What is your favorite color?', 1, 1, '2016-11-28 09:36:18', '2016-11-28 09:36:18'),
(6, 'What is your father''s middle name?', 1, 1, '2016-11-28 09:36:18', '2016-11-28 09:36:18'),
(7, 'What was the name of your first pet?', 1, 1, '2016-11-28 09:36:18', '2016-11-28 09:36:18'),
(8, 'Where Did you travel for the first time?', 1, 1, '2016-11-28 09:36:18', '2016-11-28 09:36:18'),
(9, 'What is the name of your first grade teacher?', 1, 1, '2016-11-28 09:36:18', '2016-11-28 09:36:18'),
(10, 'Which is your favorite web browser?', 1, 1, '2016-11-28 09:36:18', '2016-11-28 09:36:18'),
(11, 'What is the middle name of your oldest child?', 1, 1, '2016-11-28 09:40:02', '2016-11-28 09:36:18'),
(12, 'What is your favorite sport?', 1, 1, '2016-11-28 09:40:37', '2016-11-28 09:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(50) NOT NULL,
  `service_name` varchar(150) NOT NULL,
  `service_desc` varchar(150) NOT NULL,
  `service_logo` text NOT NULL,
  `status` int(25) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_by` int(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_desc`, `service_logo`, `status`, `updated_by`, `created_by`, `updated_at`, `created_at`) VALUES
(1, 'mass communications', 'mass communications', 'mass.jpeg', 1, 1, 1, '2016-12-06 11:50:26', '2016-09-21 05:35:32'),
(2, 'Voicemail', 'voicemail', 'voice.jpg', 1, 1, 1, '2016-12-06 11:50:42', '2016-09-21 05:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `triggers`
--

CREATE TABLE `triggers` (
  `trigger_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(25) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `triger_selection` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `triger_choose_option` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `triger_to` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `user_created` int(11) NOT NULL,
  `user_updated` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `triggers`
--

INSERT INTO `triggers` (`trigger_id`, `parent_id`, `title`, `triger_selection`, `triger_choose_option`, `triger_to`, `status`, `user_created`, `user_updated`, `dateCreated`, `dateUpdated`) VALUES
(4, 1, 'message', 'weather', 'Flood', 'group', 1, 1, 1, '2016-08-22 11:45:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `org_id` int(30) NOT NULL,
  `org_unique_id` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `account_id` int(50) NOT NULL,
  `user_auth_setting_id` int(50) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sign_in_count` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` int(50) NOT NULL,
  `current_sign_in_at` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `last_sign_in_at` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `current_sign_in_ip` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `last_sign_in_ip` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `org_department_id` int(50) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_line2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` text COLLATE utf8_unicode_ci NOT NULL,
  `ques_count` int(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `role_id`, `org_id`, `org_unique_id`, `account_id`, `user_auth_setting_id`, `username`, `email`, `password`, `sign_in_count`, `login`, `current_sign_in_at`, `last_sign_in_at`, `current_sign_in_ip`, `last_sign_in_ip`, `org_department_id`, `firstname`, `lastname`, `middlename`, `phone_number`, `address_line1`, `address_line2`, `city`, `state`, `country`, `zipcode`, `gender`, `remember_token`, `confirmed`, `confirmation_code`, `ques_count`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 1, 1, 'ORG1231', 0, 0, 'Super Admin', 'vattili@aadhya-analytics.com', '$2y$10$QmosEYLQS0W30OIoaBe6iO2vp2qdr0KCMgdu/SroX5SSRkAkXxFbS', '96', 1, '', '', '', '', 0, 'venkatraju', 'attili', 'aadhya', '9876543210', 'Hyderabad', 'Hyderabad', 'Hyderabad', 'Andhra Pradesh', 'India', '502032', 'male', '6MAP7FpD9EFwKOAhwXaJQ3gB10fo1wEzj47PzWZ9Aj8Fosd4SlTTnd60DlCQ', '', '', 5, 1, 1, '2016-06-21 12:16:02', '2017-05-23 12:14:01', 1),
(41, 1, 5, 20, 'ORG12320', 0, 0, 'venkat@waspmobile.com', 'attilivenkat3@gmail.com', '$2y$10$4Yxho4HIKDNJzhbL6A7/buDMt9.RlYGM4ijo7U3Dh44z2tJGkvTFi', '2', 0, '', '', '', '', 0, 'venkat', 'attili', 'we', '9701448576', 'Hyd', 'Hyd', 'Hyd', 'Andhra Pradesh', 'India', '502032', 'female', 'RO1DqwTW8Mih9ZB1Qpajv0oIsl5rcKhnMUxS03pJSUpY2dB93x192uHfGYku', '', '', 0, 1, 1, '2016-11-07 00:53:51', '2016-11-09 08:41:03', 1),
(42, 1, 5, 21, 'ORG12321', 0, 0, 'venkatdeveloper', 'developerattili@gmail.com', '$2y$10$e.npjczttNdpDqiMpcmUR.G.V9aocIVJ5NxWH5RwyM8CvWTEuIRq.', '1', 1, '', '', '', '', 0, 'weer', 'werwe', 'we', '9701448576', 'Hyd', '', 'Hyd', 'Andhra Pradesh', 'India', '502032', 'male', NULL, '', '', 0, 1, 1, '2016-11-11 09:01:47', '2016-12-01 07:57:23', 0),
(43, 1, 2, 1, 'ORG1231', 0, 0, 'Professional', 'attilivenkat31a@gmail.com', '$2y$10$uf5YuQ0FovbrGE/skEbkGOWShGIVh1JBkx0efIjuN9ex9WDchYgU2', '3', 0, '', '', '', '', 0, 'Raju', 'attili', 'we', '9701448576', 'Hyd', 'Hyd', 'Hyd', 'Andhra Pradesh', 'India', '502032', 'male', '3jmNwgvltkRiyY9y3Uyhhe8MehUNrsLMoH7iPAoGQl66bKBkLZpvo80VCzF9', '', 'BnToqmV0xHjp7V0HMKjwoKhYuGlKhr', 5, 1, 1, '2016-11-11 09:20:27', '2016-11-29 12:46:04', 1),
(44, 1, 3, 1, 'ORG1231', 0, 0, 'Tech user', 'attilivenkat3123@gmail.com', '$2y$10$rt3JO8TUXMRml8En5g1zVenyqQv7kenJB.E1a87MzLuHxyzBMAyBq', '2', 0, '', '', '', '', 0, 'Bobby', 'attili', 'we', '9701448576', 'Hyd', 'Hyd', 'Hyd', 'Andhra Pradesh', 'India', '502032', 'male', 'EeYfbiR4d57g46urGI1kGDN7oYklVUQbxlFaVh44annCTLbhk4bSii8iuHUm', '', '', 5, 1, 1, '2016-11-15 05:23:50', '2016-11-29 12:48:16', 1),
(45, 1, 4, 1, 'ORG1231', 0, 0, 'Financial User', 'attilivenkatraju@gmail.com', '$2y$10$yI05kZ5cnT1h4aS3qtI2FO9XHKgqkPIkg0CiupcbSV9b6MgahPalW', '1', 0, '', '', '', '', 0, 'Balu', 'attili', 'we', '9701448576', 'Hyd', 'Hyd', 'Hyd', 'Andhra Pradesh', 'India', '502032', 'male', 'Xv7A9V08KebVUuro0sbkGsAevq6DR1ABxbKTn2Zf21P1U2KdNCcPoAhsYOTx', '', '', 0, 1, 1, '2016-11-15 05:25:00', '2016-11-28 12:00:42', 1),
(46, 1, 9, 1, 'ORG1231', 0, 0, 'venkat@waspmobile.com', 'attilivenkrewe@gmail.com', '$2y$10$0llEr.zKhABP7F1kkzdLaO.QWb2RvJ0xn0rXpDCCtV7AcDqJoiNni', '0', 0, '', '', '', '', 0, 'Ramesh', 'attili', 'we', '9701448576', 'Hyd', 'Hyd', 'Hyd', 'Andhra Pradesh', 'India', '502032', 'male', NULL, '', '', 0, 1, 1, '2016-11-15 06:12:53', '2016-11-15 06:12:53', 1),
(47, 1, 5, 1, 'ORG1231', 0, 0, 'venkat@waspmobile.com', 'attiliven234233@gmail.com', '$2y$10$gG9liXtHovgdpdCSnVbwW.5zXzf2R/8koSUwe05ZvVlab6XdghQe6', '0', 0, '', '', '', '', 0, 'venkat', 'attili', 'we', '9701448576', 'Hyd', 'Hyd', 'Hyd', 'Andhra Pradesh', 'India', '502032', 'male', NULL, '', '', 0, 1, 1, '2016-11-15 06:15:19', '2016-11-15 06:15:19', 1),
(48, 1, 10, 1, 'ORG1231', 0, 0, 'rest@gmail.com', 'rest@gmail.com', '$2y$10$Tpt5htQdR43/VacLy88HTeLqrjrrPurb7DmsgnZlGaqgPqHoGDAQW', '0', 0, '', '', '', '', 0, 'venkat', 'attili', 'we', '9701448576', 'Hyd', 'Hyd', 'Hyd', 'Andhra Pradesh', 'India', '502032', 'male', NULL, '', 'ptbaHw7eBDbfIekw8F9UmYksW9piN0', 0, 1, 1, '2016-11-16 07:44:19', '2016-11-16 07:44:19', 1),
(49, 1, 5, 1, 'ORG1231', 0, 0, 'venkat@waspmobile.com', 'attilivenkat312345@gmail.com', '$2y$10$kBtvL4jWBpEdukdrQitfLOomTPmJnbPnX2XrcqqqxI6HEdI1abYqu', '0', 0, '', '', '', '', 0, 'venkat', 'attili', 'we', '9701448576', 'Hyd', 'Hyd', 'Hyd', 'Andhra Pradesh', 'India', '502032', 'male', NULL, '', '', 0, 1, 1, '2016-11-16 07:45:07', '2016-11-16 07:45:07', 1),
(51, 1, 5, 25, 'ORG12325', 0, 0, 'raju@potular.com', 'raju@potular.com', '$2y$10$aV0U1TBcWg74QwyxZAP0KebYPOXEON5sxW0F3N/jVYMc.6LRlB8ky', '0', 0, '', '', '', '', 0, 'raju', 'potula', 'werw', '96857474', 'hydera', 'madhuranagar', 'kakinada', 'Andhra Pradesh', 'india', '502032', 'male', NULL, '', '', 0, 1, 1, '2016-12-09 23:34:43', '2016-12-09 23:34:43', 1),
(52, 1, 2, 25, 'ORG12325', 0, 0, 'venkatattili@yahoo.com', 'venkatattil1i@yahoo.com', '$2y$10$Ax0Tmr65qAlIomVv96GYN.DLq1xGHQOX4ehtEdGTJ96WFT2JTsvVG', '0', 0, '', '', '', '', 0, 'abdul', 'rehman', 'mahe', '9876543210', 'kainda', 'uiniii', 'kakinada', 'Andhra Pradesh', 'India', '533004', 'male', 'ToCrWywfgkRWPSKTIfUM1eYoc9aAvuEUA4NUBTuFdT13uzHoUeVaFneGZaQv', '1', '', 0, 1, 1, '2016-12-09 23:46:22', '2016-12-09 23:52:26', 1),
(53, 1, 5, 32, 'ORG12332', 0, 0, 'rajutr@gmail.com', 'rajutr@gmail.com', '$2y$10$6RSa38LZFT/gjxDLoNeWmuJnyZ/nP5gLol2XMRJJO8rkgup4kClwC', '0', 0, '', '', '', '', 0, 'test', 'tes', 'test', '9632587410', 'hyderabad', 'kiakdaik', 'kakinada', 'andhra pradesh', 'india', '533001', 'male', NULL, '', '', 0, 1, 1, '2017-05-15 08:47:20', '2017-05-15 08:47:20', 1),
(54, 1, 5, 32, 'ORG12332', 0, 0, 'venkat@waspmobile.com', 'venkadt@waspmobile.com', '$2y$10$h0zBRuHacKYOicabCjY4K.S0oBA.uGxjr32OtlqZkOrIauVL3204G', '0', 0, '', '', '', '', 0, 'test', 'tes', 'test', '9632587410', 'hyderabad', 'kiakdaik', 'kakinada', 'andhra pradesh', 'india', '533001', 'male', NULL, '', '', 0, 1, 1, '2017-05-15 08:50:25', '2017-05-15 08:50:25', 1),
(55, 1, 5, 33, 'ORG12333', 0, 0, 'testtt@gmail.com', 'testtt@gmail.com', '$2y$10$WAsrSx2GGaJH.oO7b9CRVuX.nQ05xDBJ2Zkskx/Ln2kj/qOHt6Z7u', '0', 0, '', '', '', '', 0, 'test', 'test', 'test', '98765432210', 'djdhjdmd', 'nsdnsn', 'sdjsjsj', 'nnsnd', 'sjdsdj', '585855', 'male', NULL, '', '', 0, 1, 1, '2017-05-16 10:01:01', '2017-05-16 10:01:01', 1),
(56, 1, 2, 1, 'ORG1231', 0, 0, 'venkat@wspmobile.com', 'venka1t@wspmobile.com', '$2y$10$0HICZNmjqdbUvDeMxaBub.lgOpZa6dtFU7.DovlH783jlJmCYM/wW', '0', 0, '', '', '', '', 0, 'rajuat', 'judss', 'sju', '9701438576', 'hyderabad', 'kiakdaik', 'kakinada', 'andhra pradesh', 'india', '533001', 'male', NULL, '', 'hEDV8Rk9fffBm57yZ0m2HBGDpX7pDw', 0, 1, 1, '2017-05-19 03:53:08', '2017-05-19 03:53:08', 1),
(57, 1, 2, 1, 'ORG1231', 0, 0, 'venkat@waspmobile.com', 'venkat@waspmobile.com', '$2y$10$H8WKgl99xXBF7aVBzdA2R.i4ER9AhUX5Hsstf4hJXEXsjo.Rep5IO', '0', 0, '', '', '', '', 0, 'rajuatraju', 'test', 'juy', '9876543210', 'hyderabad', 'kiakdaik', 'kakinada', 'andhra pradesh', 'india', '533001', 'male', NULL, '', 'NbGypEkqMwS5k0tQBBzz46QFuipHjE', 0, 1, 1, '2017-05-19 03:58:12', '2017-05-19 03:58:12', 1),
(58, 1, 5, 26, 'ORG12326', 0, 0, 'venkatattili@yahoo.com', 'venkatattili@yahoo.com', '$2y$10$2GnM5Boim6j4ucda0tUNL.ybVK06ZeAN0LJFN59vrIgDpkqOyLznC', '0', 0, '', '', '', '', 0, 'vijay', 'aadhya', 'jud', '9876543210', '2-39 , Old SBI Road, ', 'Sri Nagar Colony', 'vijayawada', 'andhra pradesh', 'india', '521101', 'male', NULL, '', '', 0, 1, 1, '2017-05-19 04:19:27', '2017-05-19 04:19:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_activity`
--

CREATE TABLE `user_activity` (
  `user_activity_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `user_activity_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sign_in_count` int(150) NOT NULL,
  `current_sign_in_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_sign_in_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `current_sign_in_ip` varchar(150) NOT NULL,
  `last_sign_in_ip` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activity`
--

INSERT INTO `user_activity` (`user_activity_id`, `user_id`, `user_activity_time`, `sign_in_count`, `current_sign_in_at`, `last_sign_in_at`, `current_sign_in_ip`, `last_sign_in_ip`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(15, 41, '0000-00-00 00:00:00', 1, '2016-11-06 18:30:00', '2016-11-06 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-07 01:03:11', '2016-11-07 01:03:11', 1, 1),
(16, 41, '0000-00-00 00:00:00', 1, '2016-11-06 18:30:00', '2016-11-06 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-07 01:07:16', '2016-11-07 01:07:16', 1, 1),
(17, 41, '0000-00-00 00:00:00', 1, '2016-11-06 18:30:00', '2016-11-06 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-07 01:08:06', '2016-11-07 01:08:06', 1, 1),
(18, 41, '0000-00-00 00:00:00', 1, '2016-11-06 18:30:00', '2016-11-06 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-07 01:10:02', '2016-11-07 01:10:02', 1, 1),
(19, 41, '0000-00-00 00:00:00', 1, '2016-11-06 18:30:00', '2016-11-06 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-07 01:11:11', '2016-11-07 01:11:11', 1, 1),
(20, 41, '0000-00-00 00:00:00', 2, '2016-11-06 18:30:00', '2016-11-06 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-07 01:11:23', '2016-11-07 01:11:23', 1, 1),
(21, 1, '0000-00-00 00:00:00', 1, '2016-11-06 18:30:00', '2016-11-06 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-07 01:13:06', '2016-11-07 01:13:06', 1, 1),
(22, 1, '0000-00-00 00:00:00', 2, '2016-11-06 18:30:00', '2016-11-06 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-07 01:13:12', '2016-11-07 01:13:12', 1, 1),
(23, 1, '0000-00-00 00:00:00', 3, '2016-11-06 18:30:00', '2016-11-06 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-07 01:13:17', '2016-11-07 01:13:17', 1, 1),
(24, 1, '0000-00-00 00:00:00', 4, '2016-11-06 18:30:00', '2016-11-06 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-07 01:13:22', '2016-11-07 01:13:22', 1, 1),
(25, 41, '0000-00-00 00:00:00', 3, '2016-11-06 18:30:00', '2016-11-06 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-07 03:12:40', '2016-11-07 03:12:40', 1, 1),
(26, 41, '0000-00-00 00:00:00', 4, '2016-11-07 18:30:00', '2016-11-07 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-08 00:05:47', '2016-11-08 00:05:47', 1, 1),
(27, 41, '0000-00-00 00:00:00', 2, '2016-11-07 18:30:00', '2016-11-07 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-08 00:46:51', '2016-11-08 00:46:51', 1, 1),
(28, 41, '0000-00-00 00:00:00', 2, '2016-11-07 18:30:00', '2016-11-07 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-08 00:49:12', '2016-11-08 00:49:12', 1, 1),
(29, 1, '0000-00-00 00:00:00', 5, '2016-11-08 18:30:00', '2016-11-08 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-09 01:28:32', '2016-11-09 01:28:32', 1, 1),
(30, 1, '0000-00-00 00:00:00', 6, '2016-11-08 18:30:00', '2016-11-08 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-09 04:49:14', '2016-11-09 04:49:14', 1, 1),
(31, 1, '0000-00-00 00:00:00', 7, '2016-11-09 18:30:00', '2016-11-09 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-09 22:17:45', '2016-11-09 22:17:45', 1, 1),
(32, 1, '2007-10-04 18:30:00', 8, '2016-11-09 18:30:00', '2016-11-09 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-10 01:40:05', '2016-11-10 01:40:05', 1, 1),
(33, 1, '0000-00-00 00:00:00', 9, '2016-11-10 18:30:00', '2016-11-10 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-11 08:26:32', '2016-11-11 08:26:32', 1, 1),
(34, 1, '0000-00-00 00:00:00', 10, '2016-11-11 18:30:00', '2016-11-11 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-12 08:59:23', '2016-11-12 08:59:23', 1, 1),
(35, 1, '0000-00-00 00:00:00', 11, '2016-11-12 18:30:00', '2016-11-12 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-13 07:15:02', '2016-11-13 07:15:02', 1, 1),
(36, 1, '0000-00-00 00:00:00', 12, '2016-11-13 18:30:00', '2016-11-13 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-13 23:53:00', '2016-11-13 23:53:00', 1, 1),
(37, 1, '0000-00-00 00:00:00', 13, '2016-11-13 18:30:00', '2016-11-13 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-14 03:26:32', '2016-11-14 03:26:32', 1, 1),
(38, 1, '0000-00-00 00:00:00', 14, '2016-11-13 18:30:00', '2016-11-13 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-14 09:04:48', '2016-11-14 09:04:48', 1, 1),
(39, 1, '0000-00-00 00:00:00', 15, '2016-11-13 18:30:00', '2016-11-13 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-14 11:46:55', '2016-11-14 11:46:55', 1, 1),
(40, 1, '0000-00-00 00:00:00', 16, '2016-11-14 18:30:00', '2016-11-14 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-15 04:53:34', '2016-11-15 04:53:34', 1, 1),
(41, 1, '0000-00-00 00:00:00', 17, '2016-11-15 18:30:00', '2016-11-15 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-16 01:23:35', '2016-11-16 01:23:35', 1, 1),
(42, 1, '0000-00-00 00:00:00', 18, '2016-11-15 18:30:00', '2016-11-15 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-16 03:28:15', '2016-11-16 03:28:15', 1, 1),
(43, 1, '0000-00-00 00:00:00', 19, '2016-11-15 18:30:00', '2016-11-15 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-16 06:54:50', '2016-11-16 06:54:50', 1, 1),
(44, 1, '0000-00-00 00:00:00', 20, '2016-11-15 18:30:00', '2016-11-15 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-16 07:18:07', '2016-11-16 07:18:07', 1, 1),
(45, 1, '0000-00-00 00:00:00', 21, '2016-11-15 18:30:00', '2016-11-15 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-16 07:19:46', '2016-11-16 07:19:46', 1, 1),
(46, 1, '0000-00-00 00:00:00', 22, '2016-11-15 18:30:00', '2016-11-15 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-16 08:43:11', '2016-11-16 08:43:11', 1, 1),
(47, 1, '2007-07-20 18:30:00', 23, '2016-11-15 18:30:00', '2016-11-15 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-16 13:37:21', '2016-11-16 13:37:21', 1, 1),
(48, 1, '0000-00-00 00:00:00', 24, '2016-11-16 18:30:00', '2016-11-16 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-17 07:07:42', '2016-11-17 07:07:42', 1, 1),
(49, 1, '0000-00-00 00:00:00', 25, '2016-11-17 18:30:00', '2016-11-17 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-18 05:21:23', '2016-11-18 05:21:23', 1, 1),
(50, 1, '0000-00-00 00:00:00', 26, '2016-11-17 18:30:00', '2016-11-17 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-18 05:47:02', '2016-11-18 05:47:02', 1, 1),
(51, 1, '0000-00-00 00:00:00', 27, '2016-11-18 18:30:00', '2016-11-18 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-19 01:46:41', '2016-11-19 01:46:41', 1, 1),
(52, 1, '0000-00-00 00:00:00', 28, '2016-11-18 18:30:00', '2016-11-18 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-19 05:23:07', '2016-11-19 05:23:07', 1, 1),
(53, 1, '0000-00-00 00:00:00', 29, '2016-11-19 18:30:00', '2016-11-19 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-20 09:34:34', '2016-11-20 09:34:34', 1, 1),
(54, 1, '0000-00-00 00:00:00', 30, '2016-11-23 18:30:00', '2016-11-23 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-24 08:08:00', '2016-11-24 08:08:00', 1, 1),
(55, 1, '0000-00-00 00:00:00', 31, '2016-11-24 18:30:00', '2016-11-24 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-25 06:28:07', '2016-11-25 06:28:07', 1, 1),
(56, 43, '0000-00-00 00:00:00', 1, '2016-11-24 18:30:00', '2016-11-24 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-25 07:25:24', '2016-11-25 07:25:24', 1, 1),
(57, 1, '2001-02-13 18:30:00', 32, '2016-11-24 18:30:00', '2016-11-24 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-25 07:32:14', '2016-11-25 07:32:14', 1, 1),
(58, 1, '0000-00-00 00:00:00', 33, '2016-11-27 18:30:00', '2016-11-27 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-28 00:10:07', '2016-11-28 00:10:07', 1, 1),
(59, 1, '0000-00-00 00:00:00', 34, '2016-11-27 18:30:00', '2016-11-27 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-28 03:49:56', '2016-11-28 03:49:56', 1, 1),
(60, 1, '0000-00-00 00:00:00', 35, '2016-11-27 18:30:00', '2016-11-27 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-28 06:31:54', '2016-11-28 06:31:54', 1, 1),
(61, 1, '0000-00-00 00:00:00', 36, '2016-11-27 18:30:00', '2016-11-27 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-28 07:54:21', '2016-11-28 07:54:21', 1, 1),
(62, 1, '0000-00-00 00:00:00', 37, '2016-11-27 18:30:00', '2016-11-27 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-28 08:05:48', '2016-11-28 08:05:48', 1, 1),
(63, 1, '0000-00-00 00:00:00', 38, '2016-11-27 18:30:00', '2016-11-27 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-28 08:07:11', '2016-11-28 08:07:11', 1, 1),
(64, 1, '0000-00-00 00:00:00', 39, '2016-11-27 18:30:00', '2016-11-27 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-28 08:07:55', '2016-11-28 08:07:55', 1, 1),
(65, 1, '0000-00-00 00:00:00', 40, '2016-11-27 18:30:00', '2016-11-27 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-28 11:57:21', '2016-11-28 11:57:21', 1, 1),
(66, 43, '0000-00-00 00:00:00', 2, '2016-11-27 18:30:00', '2016-11-27 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-28 11:57:56', '2016-11-28 11:57:56', 1, 1),
(67, 44, '0000-00-00 00:00:00', 1, '2016-11-27 18:30:00', '2016-11-27 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-28 11:59:04', '2016-11-28 11:59:04', 1, 1),
(68, 45, '0000-00-00 00:00:00', 1, '2016-11-27 18:30:00', '2016-11-27 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-28 11:59:53', '2016-11-28 11:59:53', 1, 1),
(69, 1, '0000-00-00 00:00:00', 41, '2016-11-28 18:30:00', '2016-11-28 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-29 09:09:50', '2016-11-29 09:09:50', 1, 1),
(70, 43, '0000-00-00 00:00:00', 3, '2016-11-28 18:30:00', '2016-11-28 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-29 12:40:55', '2016-11-29 12:40:55', 1, 1),
(71, 44, '0000-00-00 00:00:00', 2, '2016-11-28 18:30:00', '2016-11-28 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-29 12:46:12', '2016-11-29 12:46:12', 1, 1),
(72, 1, '0000-00-00 00:00:00', 42, '2016-11-29 18:30:00', '2016-11-29 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-30 12:19:23', '2016-11-30 12:19:23', 1, 1),
(73, 1, '0000-00-00 00:00:00', 43, '2016-11-29 18:30:00', '2016-11-29 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-30 12:47:39', '2016-11-30 12:47:39', 1, 1),
(74, 1, '0000-00-00 00:00:00', 44, '2016-11-29 18:30:00', '2016-11-29 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-30 12:49:09', '2016-11-30 12:49:09', 1, 1),
(75, 1, '0000-00-00 00:00:00', 45, '2016-11-30 18:30:00', '2016-11-30 18:30:00', '127.0.0.1', '127.0.0.1', '2016-11-30 23:28:59', '2016-11-30 23:28:59', 1, 1),
(76, 1, '0000-00-00 00:00:00', 46, '2016-11-30 18:30:00', '2016-11-30 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-01 03:28:33', '2016-12-01 03:28:33', 1, 1),
(77, 1, '0000-00-00 00:00:00', 47, '2016-11-30 18:30:00', '2016-11-30 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-01 06:25:09', '2016-12-01 06:25:09', 1, 1),
(78, 1, '0000-00-00 00:00:00', 48, '2016-11-30 18:30:00', '2016-11-30 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-01 07:47:40', '2016-12-01 07:47:40', 1, 1),
(79, 42, '0000-00-00 00:00:00', 1, '2016-11-30 18:30:00', '2016-11-30 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-01 07:57:23', '2016-12-01 07:57:23', 1, 1),
(80, 1, '0000-00-00 00:00:00', 49, '2016-12-01 18:30:00', '2016-12-01 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-02 06:00:15', '2016-12-02 06:00:15', 1, 1),
(81, 1, '0000-00-00 00:00:00', 50, '2016-12-01 18:30:00', '2016-12-01 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-02 12:32:32', '2016-12-02 12:32:32', 1, 1),
(82, 1, '0000-00-00 00:00:00', 51, '2016-12-03 18:30:00', '2016-12-03 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-04 00:00:29', '2016-12-04 00:00:29', 1, 1),
(83, 1, '0000-00-00 00:00:00', 52, '2016-12-03 18:30:00', '2016-12-03 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-04 06:20:23', '2016-12-04 06:20:23', 1, 1),
(84, 1, '0000-00-00 00:00:00', 53, '2016-12-03 18:30:00', '2016-12-03 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-04 11:02:31', '2016-12-04 11:02:31', 1, 1),
(85, 1, '2009-05-24 18:30:00', 54, '2016-12-04 18:30:00', '2016-12-04 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-05 03:35:25', '2016-12-05 03:35:25', 1, 1),
(86, 1, '0000-00-00 00:00:00', 55, '2016-12-04 18:30:00', '2016-12-04 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-05 06:18:40', '2016-12-05 06:18:40', 1, 1),
(87, 1, '0000-00-00 00:00:00', 56, '2016-12-05 18:30:00', '2016-12-05 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-05 21:53:37', '2016-12-05 21:53:37', 1, 1),
(88, 1, '0000-00-00 00:00:00', 57, '2016-12-05 18:30:00', '2016-12-05 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-06 03:57:20', '2016-12-06 03:57:20', 1, 1),
(89, 1, '2004-02-12 18:30:00', 58, '2016-12-05 18:30:00', '2016-12-05 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-06 10:32:13', '2016-12-06 10:32:13', 1, 1),
(90, 1, '0000-00-00 00:00:00', 59, '2016-12-08 18:30:00', '2016-12-08 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-09 07:46:55', '2016-12-09 07:46:55', 1, 1),
(91, 1, '0000-00-00 00:00:00', 60, '2016-12-08 18:30:00', '2016-12-08 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-09 11:22:38', '2016-12-09 11:22:38', 1, 1),
(92, 1, '0000-00-00 00:00:00', 61, '2016-12-09 18:30:00', '2016-12-09 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-09 22:39:51', '2016-12-09 22:39:51', 1, 1),
(93, 1, '0000-00-00 00:00:00', 62, '2016-12-09 18:30:00', '2016-12-09 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-09 23:13:29', '2016-12-09 23:13:29', 1, 1),
(94, 52, '0000-00-00 00:00:00', 1, '2016-12-09 18:30:00', '2016-12-09 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-09 23:47:52', '2016-12-09 23:47:52', 1, 1),
(95, 1, '2007-09-26 18:30:00', 63, '2016-12-09 18:30:00', '2016-12-09 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-10 01:39:27', '2016-12-10 01:39:27', 1, 1),
(96, 1, '0000-00-00 00:00:00', 64, '2016-12-11 18:30:00', '2016-12-11 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-12 06:30:41', '2016-12-12 06:30:41', 1, 1),
(97, 1, '0000-00-00 00:00:00', 65, '2016-12-13 18:30:00', '2016-12-13 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-14 09:48:24', '2016-12-14 09:48:24', 1, 1),
(98, 1, '0000-00-00 00:00:00', 66, '2016-12-14 18:30:00', '2016-12-14 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-15 11:54:28', '2016-12-15 11:54:28', 1, 1),
(99, 1, '0000-00-00 00:00:00', 67, '2016-12-15 18:30:00', '2016-12-15 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-16 04:27:12', '2016-12-16 04:27:12', 1, 1),
(100, 1, '0000-00-00 00:00:00', 68, '2016-12-15 18:30:00', '2016-12-15 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-16 09:22:41', '2016-12-16 09:22:41', 1, 1),
(101, 1, '0000-00-00 00:00:00', 69, '2016-12-15 18:30:00', '2016-12-15 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-16 10:11:46', '2016-12-16 10:11:46', 1, 1),
(102, 1, '0000-00-00 00:00:00', 70, '2016-12-15 18:30:00', '2016-12-15 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-16 10:11:58', '2016-12-16 10:11:58', 1, 1),
(103, 1, '0000-00-00 00:00:00', 71, '2016-12-16 18:30:00', '2016-12-16 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-17 10:29:13', '2016-12-17 10:29:13', 1, 1),
(104, 1, '0000-00-00 00:00:00', 72, '2016-12-17 18:30:00', '2016-12-17 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-18 02:45:34', '2016-12-18 02:45:34', 1, 1),
(105, 1, '0000-00-00 00:00:00', 73, '2016-12-18 18:30:00', '2016-12-18 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-19 12:52:35', '2016-12-19 12:52:35', 1, 1),
(106, 1, '0000-00-00 00:00:00', 74, '2016-12-19 18:30:00', '2016-12-19 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-20 08:09:43', '2016-12-20 08:09:43', 1, 1),
(107, 1, '0000-00-00 00:00:00', 75, '2016-12-24 18:30:00', '2016-12-24 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-25 05:09:53', '2016-12-25 05:09:53', 1, 1),
(108, 1, '0000-00-00 00:00:00', 76, '2016-12-24 18:30:00', '2016-12-24 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-25 09:04:14', '2016-12-25 09:04:14', 1, 1),
(109, 1, '0000-00-00 00:00:00', 77, '2016-12-24 18:30:00', '2016-12-24 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-25 11:53:26', '2016-12-25 11:53:26', 1, 1),
(110, 1, '0000-00-00 00:00:00', 78, '2016-12-25 18:30:00', '2016-12-25 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-26 04:25:10', '2016-12-26 04:25:10', 1, 1),
(111, 1, '0000-00-00 00:00:00', 79, '2016-12-26 18:30:00', '2016-12-26 18:30:00', '127.0.0.1', '127.0.0.1', '2016-12-27 13:30:19', '2016-12-27 13:30:19', 1, 1),
(112, 1, '2012-01-27 18:30:00', 80, '2017-01-18 18:30:00', '2017-01-18 18:30:00', '127.0.0.1', '127.0.0.1', '2017-01-19 06:31:28', '2017-01-19 06:31:28', 1, 1),
(113, 1, '0000-00-00 00:00:00', 81, '2017-01-18 18:30:00', '2017-01-18 18:30:00', '127.0.0.1', '127.0.0.1', '2017-01-19 12:09:34', '2017-01-19 12:09:34', 1, 1),
(114, 1, '0000-00-00 00:00:00', 82, '2017-05-09 18:30:00', '2017-05-09 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-10 10:35:33', '2017-05-10 10:35:33', 1, 1),
(115, 1, '0000-00-00 00:00:00', 83, '2017-05-11 18:30:00', '2017-05-11 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-12 05:14:30', '2017-05-12 05:14:30', 1, 1),
(116, 1, '0000-00-00 00:00:00', 84, '2017-05-12 18:30:00', '2017-05-12 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-13 02:21:56', '2017-05-13 02:21:56', 1, 1),
(117, 1, '0000-00-00 00:00:00', 85, '2017-05-14 18:30:00', '2017-05-14 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-15 08:09:41', '2017-05-15 08:09:41', 1, 1),
(118, 1, '0000-00-00 00:00:00', 86, '2017-05-15 18:30:00', '2017-05-15 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-16 09:57:35', '2017-05-16 09:57:35', 1, 1),
(119, 1, '0000-00-00 00:00:00', 87, '2017-05-15 18:30:00', '2017-05-15 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-16 12:33:32', '2017-05-16 12:33:32', 1, 1),
(120, 1, '0000-00-00 00:00:00', 88, '2017-05-16 18:30:00', '2017-05-16 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-17 04:11:03', '2017-05-17 04:11:03', 1, 1),
(121, 1, '2010-12-17 18:30:00', 89, '2017-05-16 18:30:00', '2017-05-16 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-17 04:42:18', '2017-05-17 04:42:18', 1, 1),
(122, 1, '0000-00-00 00:00:00', 90, '2017-05-16 18:30:00', '2017-05-16 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-17 04:53:26', '2017-05-17 04:53:26', 1, 1),
(123, 1, '0000-00-00 00:00:00', 91, '2017-05-18 18:30:00', '2017-05-18 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-19 03:27:33', '2017-05-19 03:27:33', 1, 1),
(124, 1, '0000-00-00 00:00:00', 92, '2017-05-20 18:30:00', '2017-05-20 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-21 04:11:01', '2017-05-21 04:11:01', 1, 1),
(125, 1, '0000-00-00 00:00:00', 93, '2017-05-21 18:30:00', '2017-05-21 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-22 03:38:48', '2017-05-22 03:38:48', 1, 1),
(126, 1, '0000-00-00 00:00:00', 94, '2017-05-21 18:30:00', '2017-05-21 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-22 04:44:03', '2017-05-22 04:44:03', 1, 1),
(127, 1, '0000-00-00 00:00:00', 95, '2017-05-21 18:30:00', '2017-05-21 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-22 07:06:12', '2017-05-22 07:06:12', 1, 1),
(128, 1, '0000-00-00 00:00:00', 96, '2017-05-22 18:30:00', '2017-05-22 18:30:00', '127.0.0.1', '127.0.0.1', '2017-05-23 12:14:01', '2017-05-23 12:14:01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_opt_security_question`
--

CREATE TABLE `user_opt_security_question` (
  `user_question_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `question_id` int(50) NOT NULL,
  `user_answer` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(52) NOT NULL,
  `updated_by` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_opt_security_question`
--

INSERT INTO `user_opt_security_question` (`user_question_id`, `user_id`, `question_id`, `user_answer`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(16, 1, 1, 'tewerwe', '2016-12-06 04:49:05', '2016-12-05 23:19:05', 1, 1),
(17, 1, 5, 'werew', '2016-12-06 04:49:05', '2016-12-05 23:19:05', 1, 1),
(18, 1, 10, 'werwe', '2016-12-18 10:42:51', '2016-12-18 05:12:51', 0, 1),
(19, 1, 9, 'werwe', '2016-12-06 04:49:05', '2016-12-05 23:19:05', 1, 1),
(20, 1, 12, 'werwewerewrwerwe', '2016-12-18 10:42:51', '2016-12-18 05:12:51', 1, 1),
(36, 43, 1, 'kakianda', '2016-11-29 12:42:28', '2016-11-29 12:42:28', 43, 43),
(37, 43, 3, 'kkd', '2016-11-29 12:42:28', '2016-11-29 12:42:28', 43, 43),
(38, 43, 5, 'red', '2016-11-29 12:42:28', '2016-11-29 12:42:28', 43, 43),
(39, 43, 10, 'firefox', '2016-11-29 12:42:28', '2016-11-29 12:42:28', 43, 43),
(40, 43, 12, 'cricket', '2016-11-29 12:42:28', '2016-11-29 12:42:28', 43, 43),
(41, 44, 1, 'test', '2016-11-29 12:46:59', '2016-11-29 12:46:59', 44, 44),
(42, 44, 2, 'test', '2016-11-29 12:46:59', '2016-11-29 12:46:59', 44, 44),
(43, 44, 4, 'test', '2016-11-29 12:46:59', '2016-11-29 12:46:59', 44, 44),
(44, 44, 6, 'test', '2016-11-29 12:46:59', '2016-11-29 12:46:59', 44, 44),
(45, 44, 11, 'test', '2016-11-29 12:47:00', '2016-11-29 12:47:00', 44, 44);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_role_id` int(50) NOT NULL,
  `role_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `grantor_role` int(50) NOT NULL,
  `user_role_mapped_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_role_removed_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE `user_settings` (
  `user_setting_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `date_range_custom_start` datetime NOT NULL,
  `date_range_custom_end` datetime NOT NULL,
  `created_by` int(50) NOT NULL,
  `updated_by` int(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `weatherpatterns`
--

CREATE TABLE `weatherpatterns` (
  `wp_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_created` int(11) NOT NULL,
  `user_updated` int(11) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dateUpdated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `weatherpatterns`
--

INSERT INTO `weatherpatterns` (`wp_id`, `title`, `content`, `user_created`, `user_updated`, `dateCreated`, `dateUpdated`) VALUES
(2, 'rain', 'rain', 1, 1, '2016-07-06 05:42:39', '0000-00-00 00:00:00'),
(3, 'sunami', 'sunami', 1, 1, '2016-07-07 10:01:41', '0000-00-00 00:00:00'),
(4, 'heavy rains', 'heavy rains', 1, 1, '2016-07-07 10:01:52', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_status`
--
ALTER TABLE `account_status`
  ADD PRIMARY KEY (`account_status_id`);

--
-- Indexes for table `billing_types`
--
ALTER TABLE `billing_types`
  ADD PRIMARY KEY (`bill_type_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`contract_id`);

--
-- Indexes for table `country_phonecodes`
--
ALTER TABLE `country_phonecodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `organization_types`
--
ALTER TABLE `organization_types`
  ADD PRIMARY KEY (`org_type_id`);

--
-- Indexes for table `orgnization_addresses`
--
ALTER TABLE `orgnization_addresses`
  ADD PRIMARY KEY (`org_address_id`);

--
-- Indexes for table `org_bills`
--
ALTER TABLE `org_bills`
  ADD PRIMARY KEY (`org_bill_id`);

--
-- Indexes for table `org_contracts`
--
ALTER TABLE `org_contracts`
  ADD PRIMARY KEY (`org_con_id`);

--
-- Indexes for table `org_departments`
--
ALTER TABLE `org_departments`
  ADD PRIMARY KEY (`org_department_id`);

--
-- Indexes for table `org_industry_types`
--
ALTER TABLE `org_industry_types`
  ADD PRIMARY KEY (`org_industry_type_id`);

--
-- Indexes for table `org_professional_users`
--
ALTER TABLE `org_professional_users`
  ADD PRIMARY KEY (`org_prof_id`);

--
-- Indexes for table `org_services`
--
ALTER TABLE `org_services`
  ADD PRIMARY KEY (`org_ser_id`);

--
-- Indexes for table `org_support_details`
--
ALTER TABLE `org_support_details`
  ADD PRIMARY KEY (`org_sup_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissionroles`
--
ALTER TABLE `permissionroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `portal_email_server_settings`
--
ALTER TABLE `portal_email_server_settings`
  ADD PRIMARY KEY (`pe_id`);

--
-- Indexes for table `portal_user_authentication_settings`
--
ALTER TABLE `portal_user_authentication_settings`
  ADD PRIMARY KEY (`puas_id`);

--
-- Indexes for table `privilegeroles`
--
ALTER TABLE `privilegeroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privileges`
--
ALTER TABLE `privileges`
  ADD PRIMARY KEY (`privilege_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `rolesusers`
--
ALTER TABLE `rolesusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `security_question`
--
ALTER TABLE `security_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `triggers`
--
ALTER TABLE `triggers`
  ADD PRIMARY KEY (`trigger_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activity`
--
ALTER TABLE `user_activity`
  ADD PRIMARY KEY (`user_activity_id`);

--
-- Indexes for table `user_opt_security_question`
--
ALTER TABLE `user_opt_security_question`
  ADD PRIMARY KEY (`user_question_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `user_settings`
--
ALTER TABLE `user_settings`
  ADD PRIMARY KEY (`user_setting_id`);

--
-- Indexes for table `weatherpatterns`
--
ALTER TABLE `weatherpatterns`
  ADD PRIMARY KEY (`wp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_status`
--
ALTER TABLE `account_status`
  MODIFY `account_status_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `billing_types`
--
ALTER TABLE `billing_types`
  MODIFY `bill_type_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `contract_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `country_phonecodes`
--
ALTER TABLE `country_phonecodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `org_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `organization_types`
--
ALTER TABLE `organization_types`
  MODIFY `org_type_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orgnization_addresses`
--
ALTER TABLE `orgnization_addresses`
  MODIFY `org_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `org_bills`
--
ALTER TABLE `org_bills`
  MODIFY `org_bill_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `org_contracts`
--
ALTER TABLE `org_contracts`
  MODIFY `org_con_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `org_departments`
--
ALTER TABLE `org_departments`
  MODIFY `org_department_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `org_industry_types`
--
ALTER TABLE `org_industry_types`
  MODIFY `org_industry_type_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `org_professional_users`
--
ALTER TABLE `org_professional_users`
  MODIFY `org_prof_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `org_services`
--
ALTER TABLE `org_services`
  MODIFY `org_ser_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `org_support_details`
--
ALTER TABLE `org_support_details`
  MODIFY `org_sup_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `permissionroles`
--
ALTER TABLE `permissionroles`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `portal_email_server_settings`
--
ALTER TABLE `portal_email_server_settings`
  MODIFY `pe_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `portal_user_authentication_settings`
--
ALTER TABLE `portal_user_authentication_settings`
  MODIFY `puas_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `privilegeroles`
--
ALTER TABLE `privilegeroles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `privileges`
--
ALTER TABLE `privileges`
  MODIFY `privilege_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rolesusers`
--
ALTER TABLE `rolesusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `security_question`
--
ALTER TABLE `security_question`
  MODIFY `question_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `triggers`
--
ALTER TABLE `triggers`
  MODIFY `trigger_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `user_activity`
--
ALTER TABLE `user_activity`
  MODIFY `user_activity_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `user_opt_security_question`
--
ALTER TABLE `user_opt_security_question`
  MODIFY `user_question_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `user_role_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_settings`
--
ALTER TABLE `user_settings`
  MODIFY `user_setting_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `weatherpatterns`
--
ALTER TABLE `weatherpatterns`
  MODIFY `wp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
