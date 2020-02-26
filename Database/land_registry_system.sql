-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 02:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `land_registry_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `caveats`
--

CREATE TABLE `caveats` (
  `Caveat_ID` int(11) NOT NULL,
  `Title_ID` int(11) NOT NULL,
  `Caveat` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `Charge_ID` int(11) NOT NULL,
  `Title_ID` int(11) NOT NULL,
  `Charge` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `Title_ID` int(11) NOT NULL,
  `Title_Number` varchar(255) NOT NULL,
  `Plot_Number` varchar(255) NOT NULL,
  `Approximate_Area(Ha)` double NOT NULL,
  `County` varchar(255) NOT NULL,
  `Sub_County` varchar(255) NOT NULL,
  `Ward` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`Title_ID`, `Title_Number`, `Plot_Number`, `Approximate_Area(Ha)`, `County`, `Sub_County`, `Ward`) VALUES
(1, 'RUIRU/RUIRU EAST BLOCK 2/300 55', '938928/02', 0.0213, 'Kiambu', 'Ruiru', 'Gatongora '),
(2, 'RUIRU/RUIRU EAST BLOCK 2/300 55', '938928/02', 0.0213, 'Kiambu', 'Ruiru', 'Gatongora ');

-- --------------------------------------------------------

--
-- Table structure for table `title_owners`
--

CREATE TABLE `title_owners` (
  `Title_Owners_ID` int(11) NOT NULL,
  `Title_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Type_of_Ownership` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `ID_Number` int(11) NOT NULL,
  `ID_Picture` varchar(255) NOT NULL,
  `Fullnames` varchar(255) NOT NULL,
  `Email_Address` varchar(255) NOT NULL,
  `Phonenumber` int(11) NOT NULL,
  `Tax_Number` int(11) NOT NULL,
  `Physical_Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Error reading data for table land_registry_system.users: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `land_registry_system`.`users`' at line 1

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caveats`
--
ALTER TABLE `caveats`
  ADD PRIMARY KEY (`Caveat_ID`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`Charge_ID`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`Title_ID`);

--
-- Indexes for table `title_owners`
--
ALTER TABLE `title_owners`
  ADD PRIMARY KEY (`Title_Owners_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `ID_Number` (`ID_Number`),
  ADD UNIQUE KEY `Phonenumber` (`Phonenumber`),
  ADD UNIQUE KEY `Tax_Number` (`Tax_Number`),
  ADD UNIQUE KEY `Email_Address` (`Email_Address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caveats`
--
ALTER TABLE `caveats`
  MODIFY `Caveat_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `charges`
--
ALTER TABLE `charges`
  MODIFY `Charge_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `Title_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `title_owners`
--
ALTER TABLE `title_owners`
  MODIFY `Title_Owners_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
