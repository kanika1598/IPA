-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 05:06 PM
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
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Qualification` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `Date_of_Birth` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_entries`
--

INSERT INTO `data_entries` (`ID`, `Name`, `Email`, `Password`, `Gender`, `Qualification`, `Address`, `Contact`, `Date_of_Birth`) VALUES
(1, 'Kanika Bagri', 'kanikabagri111@gmail.com', '12345', 'Female', 'X, XII', 'Street No.17, Madhu Vihar', '8920565888', '15th September,1998');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_entries`
--
ALTER TABLE `data_entries`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_entries`
--
ALTER TABLE `data_entries`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
