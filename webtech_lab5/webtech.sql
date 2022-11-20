-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2022 at 07:03 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `convertion`
--

CREATE TABLE `convertion` (
  `id` int(10) NOT NULL,
  `cat` varchar(15) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `val` decimal(10,0) NOT NULL,
  `res` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `convertion`
--

INSERT INTO `convertion` (`id`, `cat`, `rate`, `val`, `res`) VALUES
(1, 'USD_to_BDT', '160', '2', '320'),
(2, 'USD_to_BDT', '80', '3', '240'),
(3, 'INCH_to_FEET', '12', '5', '60'),
(4, 'USD_to_BDT', '80', '2', '160');

-- --------------------------------------------------------

--
-- Table structure for table `convertion_rate`
--

CREATE TABLE `convertion_rate` (
  `id` int(10) NOT NULL,
  `cat` varchar(15) NOT NULL,
  `rate` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `convertion_rate`
--

INSERT INTO `convertion_rate` (`id`, `cat`, `rate`) VALUES
(1, 'USD_to_BDT', '80'),
(2, 'CAD_to_BDT', '60'),
(3, 'INCH_to_FEET', '12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `convertion`
--
ALTER TABLE `convertion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convertion_rate`
--
ALTER TABLE `convertion_rate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `convertion`
--
ALTER TABLE `convertion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `convertion_rate`
--
ALTER TABLE `convertion_rate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
