-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 10:16 PM
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
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `a_id` int(10) NOT NULL,
  `a_email` varchar(30) NOT NULL,
  `a_pass` varchar(25) NOT NULL,
  `a_fname` varchar(15) NOT NULL,
  `a_lname` varchar(15) NOT NULL,
  `a_phn` varchar(11) NOT NULL,
  `a_dob` date NOT NULL,
  `a_gender` varchar(6) NOT NULL,
  `a_bg` varchar(5) NOT NULL,
  `a_addr` varchar(100) NOT NULL,
  `a_dis` varchar(15) NOT NULL,
  `a_div` varchar(15) NOT NULL,
  `a_postal` varchar(4) NOT NULL,
  `a_photo` varchar(150) NOT NULL,
  `a_sq` varchar(100) NOT NULL,
  `a_sa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_data`
--

CREATE TABLE `ambulance_data` (
  `a_id` int(10) NOT NULL,
  `p_email` varchar(30) NOT NULL,
  `ploc` varchar(50) NOT NULL,
  `pdis` varchar(10) NOT NULL,
  `pdiv` varchar(10) NOT NULL,
  `ppostal` varchar(4) NOT NULL,
  `pdate` varchar(10) NOT NULL,
  `ptime` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambulance_data`
--

INSERT INTO `ambulance_data` (`a_id`, `p_email`, `ploc`, `pdis`, `pdiv`, `ppostal`, `pdate`, `ptime`, `status`) VALUES
(1, 's@gmail.com', 'Bashundhara R/A', 'Dhaka', 'Dhaka', '1215', '2022-12-07', '02:50', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `doc_appointment`
--

CREATE TABLE `doc_appointment` (
  `d_id` int(10) NOT NULL,
  `d_email` varchar(30) NOT NULL,
  `d_name` varchar(30) NOT NULL,
  `d_degree` varchar(15) NOT NULL,
  `d_dept` varchar(15) NOT NULL,
  `adate` varchar(15) NOT NULL,
  `atime` varchar(15) NOT NULL,
  `p_email` varchar(30) DEFAULT NULL,
  `p_name` varchar(30) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  `prescription` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_appointment`
--

INSERT INTO `doc_appointment` (`d_id`, `d_email`, `d_name`, `d_degree`, `d_dept`, `adate`, `atime`, `p_email`, `p_name`, `status`, `prescription`) VALUES
(1, 'mery@gmail.com', 'Mery', 'MBBS FCPS', 'Neaurology', '2022-11-04', '13:12', 's@gmail.com', 'SSSSS Khatun', 'booked', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donor_data`
--

CREATE TABLE `donor_data` (
  `d_id` int(10) NOT NULL,
  `d_name` varchar(30) NOT NULL,
  `d_bg` varchar(5) NOT NULL,
  `d_age` int(3) NOT NULL,
  `d_gen` varchar(6) NOT NULL,
  `d_loc` varchar(100) NOT NULL,
  `d_phn` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor_data`
--

INSERT INTO `donor_data` (`d_id`, `d_name`, `d_bg`, `d_age`, `d_gen`, `d_loc`, `d_phn`) VALUES
(1, 'Prithy', 'B+', 22, 'Female', 'Bashundhara R/A', '01754402481'),
(2, 'Sadi', 'B+', 22, 'Female', 'Mohammadpur', '01754402482');

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

CREATE TABLE `patient_data` (
  `p_id` int(10) NOT NULL,
  `p_email` varchar(50) NOT NULL,
  `p_pass` varchar(30) NOT NULL,
  `p_fname` varchar(30) NOT NULL,
  `p_lname` varchar(30) NOT NULL,
  `p_phn` varchar(11) NOT NULL,
  `p_dob` date NOT NULL,
  `p_gender` varchar(10) NOT NULL,
  `p_bloodgroup` varchar(10) NOT NULL,
  `p_address` varchar(100) NOT NULL,
  `p_district` varchar(30) NOT NULL,
  `p_division` varchar(30) NOT NULL,
  `p_postal` int(4) NOT NULL,
  `p_photo` varchar(200) NOT NULL,
  `p_sq` varchar(100) DEFAULT NULL,
  `p_sa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`p_id`, `p_email`, `p_pass`, `p_fname`, `p_lname`, `p_phn`, `p_dob`, `p_gender`, `p_bloodgroup`, `p_address`, `p_district`, `p_division`, `p_postal`, `p_photo`, `p_sq`, `p_sa`) VALUES
(2, 'mery@yahoo.com', 'aS1@qwer', 'Fatema', 'Mery', '01977723500', '2000-11-24', 'female', 'B-', 'Nilkhet, Dhaka', 'Dhaka', 'Dhaka', 2005, '../models/patient_images/49fd901ad10f96c93370c391973dc4bf.png', 'What is the last name of the teacher who gave you your first failing grade?', 'Mery'),
(3, 's@gmail.com', 'aS1@qwerz', 'SSSSS', 'Khatun', '01876407651', '1995-01-01', 'female', 'B+', 'Jamalpur', 'Dhaka', 'Mymensingh', 1215, '../models/patient_images/390fedbf159fcdfe0677f24343767084.png', 'What is your pets name?', 'Mery1'),
(1, 'shadril@outlook.com', 'aS1@qwer', 'Shadril', 'Shifat', '01754402482', '2001-09-10', 'male', 'B+', 'Block- G, Bashundhara R/A', 'Dhaka', 'Dhaka', 1216, '07796a231f8ad8ee5d93ca058adc9bb9.png', 'What is the last name of the teacher who gave you your first failing grade?', 'Can\'t Remember0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD UNIQUE KEY `admin_idx` (`a_id`);

--
-- Indexes for table `ambulance_data`
--
ALTER TABLE `ambulance_data`
  ADD UNIQUE KEY `a_id` (`a_id`);

--
-- Indexes for table `doc_appointment`
--
ALTER TABLE `doc_appointment`
  ADD UNIQUE KEY `doc_appoint_idx` (`d_id`);

--
-- Indexes for table `donor_data`
--
ALTER TABLE `donor_data`
  ADD UNIQUE KEY `unq_idx` (`d_id`);

--
-- Indexes for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD PRIMARY KEY (`p_email`),
  ADD UNIQUE KEY `p_id` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ambulance_data`
--
ALTER TABLE `ambulance_data`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doc_appointment`
--
ALTER TABLE `doc_appointment`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donor_data`
--
ALTER TABLE `donor_data`
  MODIFY `d_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient_data`
--
ALTER TABLE `patient_data`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
