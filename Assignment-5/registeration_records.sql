-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2020 at 12:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registeration_records`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_entries`
--

CREATE TABLE `data_entries` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `basic_education` varchar(255) NOT NULL,
  `professional_education` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `org_address` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `membership_kendra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_entries`
--

INSERT INTO `data_entries` (`id`, `name`, `email`, `password`, `contact`, `dob`, `basic_education`, `professional_education`, `hobbies`, `address`, `org_address`, `occupation`, `membership_kendra`) VALUES
(2, 'Kanika Bagri', 'kanikabagri111@gmail.com', 'kanika', '8920565888', '1998-09-15', 'Class X, Class XII', 'Bachelors of Technology', 'XII, XII', 'E-26, Prabha Sadan, Street-17, Madhu Vihar, Patparganj', 'ABC Noida, Sector - 21', 'Intern', 'Group'),
(3, 'Kartik Bagri', 'kartikbagri199@gmail.com', 'kartik', '9818075499', '2002-09-16', 'Class X, Class XII', 'None', 'X, XII', 'E-26, Prabha Sadan, Street-17, Madhu Vihar, Patparganj', 'E-26, Prabha Sadan, Street-17, Madhu Vihar, Patparganj', 'None', 'Group');

-- --------------------------------------------------------

--
-- Table structure for table `photo_data`
--

CREATE TABLE `photo_data` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo_data`
--

INSERT INTO `photo_data` (`id`, `name`, `email`, `photo`) VALUES
(2, 'Kanika Bagri', 'kanikabagri111@gmail.com', 'uploads/profile_picture.jpg'),
(4, 'Kartik Bagri', 'kartikbagri199@gmail.com', 'uploads/_MG_6667.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_entries`
--
ALTER TABLE `data_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_data`
--
ALTER TABLE `photo_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_entries`
--
ALTER TABLE `data_entries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photo_data`
--
ALTER TABLE `photo_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
