-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2020 at 04:57 PM
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
  `qualification` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_entries`
--

INSERT INTO `data_entries` (`id`, `name`, `email`, `password`, `qualification`, `contact`, `dob`, `profile`) VALUES
(4, 'Madan Gopal Bagri', 'pkbagri786@gmail.com', '', 'X, XII', '9136259528', '18 November, 2005', ''),
(5, 'Himanshu Goyal', 'hg@gmail.com', 'sdcfvgbhyujikop', 'X, XII', '9818075499', '18 November, 2001', ''),
(7, 'Madan Gopal Bagri', 'pasfgvbnmkbagri786@gmail.com', 'ASZDFGHJK', 'X', '9136259528', '21 January,2001', ''),
(8, 'Madan Gopal Bagri', 'pasfgvbnmkxcdbbagri786@gmail.com', 'fghmnm,', 'X', '9136259528', '21 January,2001', ''),
(9, 'asdf vsdv', 'kartikxxbagri199@gmail.com', 'cvbn ', 'X, XII', '9136259528', '18 April,2003', 'uploads/arogya.png'),
(10, 'Kanika Bagri ', 'kanikabagri111@gmail.com', 'kanika', 'X, XII', '8920565887', '15 September,1998', 'uploads/unnamed.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_entries`
--
ALTER TABLE `data_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_entries`
--
ALTER TABLE `data_entries`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
