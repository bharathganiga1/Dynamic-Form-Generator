-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2023 at 09:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `custom-form`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `alumni_id` int(11) NOT NULL,
  `alumni_name` varchar(255) NOT NULL,
  `clg_id` int(11) NOT NULL,
  `alumni_email` varchar(255) NOT NULL,
  `alumni_pass` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phno` int(11) NOT NULL,
  `address` longtext NOT NULL,
  `graduation_year` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `fond_memory` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`alumni_id`, `alumni_name`, `clg_id`, `alumni_email`, `alumni_pass`, `full_name`, `gender`, `dob`, `email`, `phno`, `address`, `graduation_year`, `department`, `fond_memory`) VALUES
(1, 'Bharath', 1, 'bharathganiga2002@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'Bharath', 'male', '2023-08-09', 'bharathganiga2002@gmail.com', 2147483647, 'Karbettu House Narikombu Post bantwal Taluk DK', '2021', 'AIML', 'nothing');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `clg_id` int(11) NOT NULL,
  `clg_name` varchar(255) NOT NULL,
  `clg_email` varchar(255) NOT NULL,
  `clg_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`clg_id`, `clg_name`, `clg_email`, `clg_pass`) VALUES
(1, 'SJEC', 'sjec@gmail.com', 'b59c67bf196a4758191e42f76670ceba');

-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE `configurations` (
  `config_id` int(11) NOT NULL,
  `clg_id` int(11) NOT NULL,
  `field_label` varchar(255) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `input_type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `is_required` tinyint(4) NOT NULL,
  `priority` int(11) NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`options`))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configurations`
--

INSERT INTO `configurations` (`config_id`, `clg_id`, `field_label`, `post_name`, `input_type`, `size`, `is_required`, `priority`, `options`) VALUES
(1, 1, 'FULL NAME', 'full_name', 'Textbox', 255, 1, 1, '[]'),
(2, 1, 'GENDER', 'gender', 'Radio', 255, 0, 2, '{\"1\":\"male\",\"2\":\"female\",\"3\":\"other\"}'),
(3, 1, 'DOB', 'dob', 'Date', 255, 1, 3, '[]'),
(4, 1, 'EMAIL', 'email', 'Email', 255, 0, 4, '[]'),
(5, 1, 'PHNO', 'phno', 'Textbox', 255, 1, 5, '[]'),
(6, 1, 'ADDRESS', 'address', 'Textarea', 255, 1, 6, '[]'),
(7, 1, 'GRADUATION YEAR', 'graduation_year', 'Dropdown', 255, 1, 7, '{\"1\":\"2020\",\"2\":\"2021\",\"3\":\"2022\",\"4\":\"2023\"}'),
(8, 1, 'DEPARTMENT', 'department', 'Dropdown', 255, 1, 8, '{\"1\":\"CSE\",\"2\":\"AIML\",\"3\":\"ENC\",\"4\":\"EEE\",\"5\":\"MECH\",\"6\":\"CIVIL\"}'),
(9, 1, 'Fond Memories of Yours', 'fond_memory', 'Textarea', 255, 0, 9, '[]'),
(10, 2, 'NAME', 'name', 'Textbox', 255, 1, 1, '[]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`alumni_id`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`clg_id`);

--
-- Indexes for table `configurations`
--
ALTER TABLE `configurations`
  ADD PRIMARY KEY (`config_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `alumni_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `clg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `configurations`
--
ALTER TABLE `configurations`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
