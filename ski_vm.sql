-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2020 at 12:37 PM
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
-- Database: `freepilotlog`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `postal_code` varchar(5) NOT NULL,
  `city` varchar(45) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(45) NOT NULL,
  `activation_code` varchar(45) DEFAULT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `firstname`, `lastname`, `address`, `postal_code`, `city`, `phone`, `password`, `activation_code`, `registration_date`) VALUES
('a-smidt@online.no', 'Axel', 'Smidt', 'MÃ¸llefaret 44A', '0750', 'Oslo', '22334455', 'd6e9bb8ab5c47502b330e6665dcceb4fe046dafd', NULL, '2019-08-28 10:51:12'),
('skyhawk350@hotmail.com', 'Ola', 'Nordmann', 'adfadsf 23', '1234', 'sghdkslgh', '12345678', 'd6e9bb8ab5c47502b330e6665dcceb4fe046dafd', 'f8af58048ddc24a16153c6cc5c894982', '2019-08-28 11:27:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
