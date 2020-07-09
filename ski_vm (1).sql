-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 08:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ski_vm`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp2_notification`
--

CREATE TABLE `wp2_notification` (
  `notification_ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `params` varchar(250) DEFAULT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp2_notification`
--

INSERT INTO `wp2_notification` (`notification_ID`, `title`, `message`, `url`, `params`, `registration_date`) VALUES
(21, 'Velkommen!', 'Takk for din registrering!\r\nVelkommen som bruker av Liksom-Ski-VM.', '#', NULL, '2019-08-28 10:51:15'),
(22, 'Velkommen!', 'Takk for din registrering!\r\nVelkommen som bruker av Liksom-Ski-VM.', '#', NULL, '2019-08-28 11:27:06'),
(24, 'Din admin-sÃ¸knad er sendt', 'Din administrator-sÃ¸knad er sendt til behandling.\r\nDu vil fÃ¥ beskjed pr e-post sÃ¥ snart sÃ¸kanden er ferdig behandlet.\r\n\r\nMvh\r\nLiksom-Ski-VM', '#', NULL, '2019-08-28 11:27:08'),
(25, 'Godkjent som administrator', 'Din sÃ¸knad om Ã¥ bli administrator har blitt godkjent.', '#', NULL, '2019-08-28 11:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `wp2_user_has_notification`
--

CREATE TABLE `wp2_user_has_notification` (
  `notification_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `opened_time` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp2_user_has_notification`
--

INSERT INTO `wp2_user_has_notification` (`notification_ID`, `user_ID`, `opened_time`) VALUES
(21, 3, '2019-08-28 14:56:24'),
(22, 4, NULL),
(24, 4, NULL),
(25, 4, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp2_notification`
--
ALTER TABLE `wp2_notification`
  ADD PRIMARY KEY (`notification_ID`);

--
-- Indexes for table `wp2_user_has_notification`
--
ALTER TABLE `wp2_user_has_notification`
  ADD PRIMARY KEY (`notification_ID`,`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp2_notification`
--
ALTER TABLE `wp2_notification`
  MODIFY `notification_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
