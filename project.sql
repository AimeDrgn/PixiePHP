-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2019 at 07:40 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `dinamic`
--

DROP TABLE IF EXISTS `dinamic`;
CREATE TABLE IF NOT EXISTS `dinamic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `link` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dinamic`
--

INSERT INTO `dinamic` (`id`, `name`, `link`, `created_at`) VALUES
(1, 'HOME', 'homepage.php', '2019-05-22 18:56:38'),
(2, 'PRODUCTS', 'products.php', '2019-05-22 18:56:38'),
(3, 'ABOUT', 'about.php', '2019-05-22 18:56:38'),
(4, 'CONTACT', 'contact-us.php', '2019-05-22 18:56:38'),
(5, 'SIGNUP', 'register.php', '2019-05-22 18:56:38'),
(6, 'LOGIN', 'login.php', '2019-05-22 18:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullName` varchar(100) NOT NULL COMMENT 'This is the user''s full name',
  `password` varchar(256) NOT NULL,
  `repeat_password` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `email` varchar(50) NOT NULL,
  `agree_to_terms_and_conditions` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `password`, `repeat_password`, `created_at`, `updated_at`, `email`, `agree_to_terms_and_conditions`) VALUES
(1, 'Jane Doe', '123456', '123456', '2019-05-14 08:01:15', '2019-05-14 08:01:15', 'jane.doe@ex.com', 0),
(10, 'sas', 'asa', 'ass', '2019-05-21 16:10:10', '2019-05-21 16:10:10', 'asas@asa.ccv', 1),
(5, 'rmdragomir', 'raluca', 'raluca', '2019-05-17 08:14:50', '2019-05-17 08:14:50', 'raluca@credis.com', 1),
(7, 'aaaa', 'aaaaaaa', 'die(\"asd\");', '2019-05-17 16:21:30', '2019-05-17 16:21:30', 'aaa@aaa.aaa', 1),
(12, 'sas', 'asa', 'ass', '2019-05-21 16:10:44', '2019-05-21 16:10:44', 'asas@asa.ccv', 1),
(11, 'sas', 'asa', 'ass', '2019-05-21 16:10:39', '2019-05-21 16:10:39', 'asas@asa.ccv', 1),
(13, 'sas', 'asa', 'ass', '2019-05-21 16:11:03', '2019-05-21 16:11:03', 'asas@asa.ccv', 1),
(14, 'dsadasudas', '12345678', '12345678', '2019-05-21 18:33:44', '2019-05-21 18:33:44', 'asas@asa.ccv', 1),
(15, 'dsadasudas', '12345678', '12345678', '2019-05-21 18:33:49', '2019-05-21 18:33:49', 'asas@asa.ccv', 1),
(16, 'dsadasudas', '12345678', '12345678', '2019-05-21 18:34:47', '2019-05-21 18:34:47', 'asas@asa.ccv', 1),
(17, 'dsadasudas', '12345678', '12345678', '2019-05-21 18:34:51', '2019-05-21 18:34:51', 'asas@asa.ccv', 1),
(18, 'dsadasudas', '12345678', '12345678', '2019-05-21 18:35:59', '2019-05-21 18:35:59', 'asas@asa.ccv', 1),
(19, 'dsadasudas', '12345678', '12345678', '2019-05-21 18:36:27', '2019-05-21 18:36:27', 'asas@asa.ccv', 1),
(20, 'dsadasudas', '12345678', '12345678', '2019-05-21 18:36:52', '2019-05-21 18:36:52', 'asas@asa.ccv', 1),
(21, 'dsadasudas', '12345678', '12345678', '2019-05-21 18:37:11', '2019-05-21 18:37:11', 'asas@asa.ccv', 1),
(22, 'dsadasudas', '12345678', '12345678', '2019-05-21 18:38:01', '2019-05-21 18:38:01', 'asas@asa.ccv', 1),
(23, 'Andreea', '12345678', '12345678', '2019-05-21 18:39:51', '2019-05-21 18:39:51', 'asas@asa.ccv', 1),
(24, '', '12345678', '12345678', '2019-05-21 18:45:06', '2019-05-21 18:45:06', '', 1),
(25, '', '12345678', '12345678', '2019-05-21 18:45:11', '2019-05-21 18:45:11', '', 1),
(26, '15z', '', '', '2019-05-22 09:31:39', '2019-05-22 09:31:39', 'asas@asa.ccv', 0),
(27, 'aaaa', 'aaaaaa', 'aaaaaa', '2019-05-22 19:10:44', '2019-05-22 19:10:44', 'aasdf@asda.aa', 1),
(28, 'aaaa', 'aaaaaa', 'aaaaaa', '2019-05-22 19:19:01', '2019-05-22 19:19:01', 'aasdf@asda.aa', 1),
(29, 'aaaa', 'aaaaaa', 'aaaaaa', '2019-05-22 19:19:03', '2019-05-22 19:19:03', 'aasdf@asda.aa', 1),
(30, 'aaa', 'aa', 'aa', '2019-05-22 19:19:28', '2019-05-22 19:19:28', 'blabla@yahoo.com', 1),
(31, 'aaaaaa', 'aaaaaa', 'aaaaaa', '2019-05-22 19:26:40', '2019-05-22 19:26:40', 'blabla@yahoo.com', 1),
(32, 'aaaaaa', 'aaaaaa', 'aaaaaa', '2019-05-22 19:27:51', '2019-05-22 19:27:51', 'blabla@yahoo.com', 1),
(33, 'aaaaaa', 'aaaaa', 'aaaaa', '2019-05-22 19:28:27', '2019-05-22 19:28:27', 'blabla@yahoo.com', 1),
(34, 'aaaaaa', 'aaaaa', 'aaaaa', '2019-05-22 19:35:59', '2019-05-22 19:35:59', 'blabla@yahoo.com', 1),
(35, 'aaaaaa', 'aaaaaa', 'aaaaaa', '2019-05-22 19:36:27', '2019-05-22 19:36:27', 'asdfa@asda.com', 1),
(36, 'aaaaaa', 'aaaaaa', 'aaaaaa', '2019-05-22 19:37:21', '2019-05-22 19:37:21', 'asdfa@asda.com', 1),
(37, 'aaaaaa', 'aaaaaa', 'aaaaaa', '2019-05-22 19:37:32', '2019-05-22 19:37:32', 'asdfasdf@asdasd.com', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
