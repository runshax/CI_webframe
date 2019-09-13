-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 05:18 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_menu`
--

CREATE TABLE `t_menu` (
  `application_id` int(11) NOT NULL DEFAULT '0',
  `menu_id` bigint(20) NOT NULL DEFAULT '0',
  `menu_name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(100) DEFAULT NULL,
  `parent_menu` bigint(20) NOT NULL DEFAULT '0',
  `typeMenu` int(2) DEFAULT '0',
  `status_menu` int(2) DEFAULT '0',
  `icon` varchar(50) DEFAULT NULL,
  `menu_link` varchar(255) DEFAULT NULL,
  `no` int(3) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_menu`
--

INSERT INTO `t_menu` (`application_id`, `menu_id`, `menu_name`, `description`, `parent_menu`, `typeMenu`, `status_menu`, `icon`, `menu_link`, `no`) VALUES
(0, 1, 'test', 'test', 0, 0, 0, NULL, 'Admin/user_access', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `user_id` varchar(20) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `full_name` varchar(50) DEFAULT NULL,
  `employee_id` varchar(10) DEFAULT NULL,
  `station_id` char(3) NOT NULL DEFAULT '',
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `valid_from` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `valid_to` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_level_id` tinyint(1) NOT NULL DEFAULT '3',
  `access_priv` enum('Y','N') NOT NULL DEFAULT 'Y',
  `user_group` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='table user list';

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`user_id`, `password`, `full_name`, `employee_id`, `station_id`, `create_date`, `valid_from`, `valid_to`, `user_level_id`, `access_priv`, `user_group`) VALUES
('aa', 'aa', 'aa', 'aa', 'aa', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 3, 'Y', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_user_access`
--

CREATE TABLE `t_user_access` (
  `user_id` varchar(15) NOT NULL DEFAULT '',
  `application_id` int(11) NOT NULL DEFAULT '0',
  `user_group` varchar(50) NOT NULL DEFAULT '0',
  `menu_id` bigint(20) NOT NULL DEFAULT '0',
  `create_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `valid_from` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `valid_to` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access_priv` char(1) NOT NULL DEFAULT 'N',
  `grant_priv` enum('Y','N') DEFAULT 'N',
  `copy_priv` enum('Y','N') DEFAULT 'N',
  `read_only_priv` enum('Y','N') NOT NULL DEFAULT 'N',
  `append_priv` enum('Y','N') NOT NULL DEFAULT 'N',
  `edit_priv` enum('Y','N') NOT NULL DEFAULT 'N',
  `grantor_id` varchar(15) DEFAULT '-',
  `delete_priv` enum('Y','N') NOT NULL DEFAULT 'N',
  `button_append` enum('Y','N') NOT NULL DEFAULT 'N',
  `button_edit` enum('Y','N') NOT NULL DEFAULT 'N',
  `button_delete` enum('Y','N') NOT NULL DEFAULT 'N',
  `button_save` enum('Y','N') NOT NULL DEFAULT 'N',
  `button_cancel` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user_access`
--

INSERT INTO `t_user_access` (`user_id`, `application_id`, `user_group`, `menu_id`, `create_date`, `valid_from`, `valid_to`, `access_priv`, `grant_priv`, `copy_priv`, `read_only_priv`, `append_priv`, `edit_priv`, `grantor_id`, `delete_priv`, `button_append`, `button_edit`, `button_delete`, `button_save`, `button_cancel`) VALUES
('aa', 0, 'admin', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'N', 'N', 'N', 'N', 'N', 'N', '-', 'N', 'N', 'N', 'N', 'N', 'N');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
