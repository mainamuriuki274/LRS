-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2020 at 02:39 PM
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
-- Table structure for table `amalgamations`
--

CREATE TABLE `amalgamations` (
  `Amalgamate_ID` int(11) NOT NULL,
  `Reference_Number` bigint(20) NOT NULL,
  `Title_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Surveyor_ID` int(11) NOT NULL,
  `Date` varchar(25) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `amalgamations`
--

INSERT INTO `amalgamations` (`Amalgamate_ID`, `Reference_Number`, `Title_ID`, `User_ID`, `Surveyor_ID`, `Date`, `Status`) VALUES
(8, 578210525, 1, 2, 111, '06/03/2020', 'Pending Amalgamation'),
(9, 578210525, 2, 2, 111, '06/03/2020', 'Pending Amalgamation');

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
-- Error reading data for table land_registry_system.charges: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `land_registry_system`.`charges`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `Payment_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Title_ID` int(11) NOT NULL,
  `Description` varchar(25) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`Payment_ID`, `User_ID`, `Title_ID`, `Description`, `Amount`, `Date`) VALUES
(12, 2, 1, 'Land Rates', 1000, '04/03/2020'),
(13, 2, 2, 'Land Rent', 1500, '04/03/2020'),
(14, 2, 2, 'Land Rent', 1500, '04/03/2020'),
(15, 2, 1, 'Land Rent', 1500, '04/03/2020'),
(16, 2, 1, 'Land Rent', 1500, '04/03/2020');

-- --------------------------------------------------------

--
-- Table structure for table `subdivisons`
--

CREATE TABLE `subdivisons` (
  `Subdivision_ID` int(11) NOT NULL,
  `Title_ID` int(11) NOT NULL,
  `Surveyor_ID` int(11) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Subdivisons` text NOT NULL,
  `Date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subdivisons`
--

INSERT INTO `subdivisons` (`Subdivision_ID`, `Title_ID`, `Surveyor_ID`, `Status`, `Subdivisons`, `Date`) VALUES
(1, 2, 0, 'Pending Subdivision', '', '04/03/2020');

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
-- Error reading data for table land_registry_system.titles: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `land_registry_system`.`titles`' at line 1

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

--
-- Dumping data for table `title_owners`
--

INSERT INTO `title_owners` (`Title_Owners_ID`, `Title_ID`, `User_ID`, `Type_of_Ownership`) VALUES
(9, 10, 1, 'SOLE'),
(10, 10, 1, 'SOLE'),
(11, 12, 1, 'SOLE'),
(12, 10, 1, 'SOLE'),
(13, 12, 1, 'SOLE'),
(14, 15, 1, 'SOLE');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `Transfer_ID` int(11) NOT NULL,
  `Title_ID` int(11) NOT NULL,
  `User_ID(From)` int(11) NOT NULL,
  `User_ID(To)` int(11) NOT NULL,
  `Transfer_Date` varchar(100) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Accept_Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`Transfer_ID`, `Title_ID`, `User_ID(From)`, `User_ID(To)`, `Transfer_Date`, `Status`, `Accept_Date`) VALUES
(4, 2, 1, 2, '09/03/2020', 'ACCEPTED', 'None'),
(5, 2, 2, 1, '09/03/2020', 'ACCEPTED', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` bigint(11) NOT NULL,
  `ID_Number` int(11) NOT NULL,
  `ID_Picture` varchar(255) NOT NULL,
  `Fullnames` varchar(255) NOT NULL,
  `Email_Address` varchar(255) NOT NULL,
  `Phonenumber` int(9) NOT NULL,
  `Tax_Number` int(13) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Date_of_Birth` varchar(255) NOT NULL,
  `Physical_Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `ID_Number`, `ID_Picture`, `Fullnames`, `Email_Address`, `Phonenumber`, `Tax_Number`, `Gender`, `Date_of_Birth`, `Physical_Address`, `Password`) VALUES
(1, 12345678, '12321123.jpeg', 'Lewis Maina', 'muriukimainalewis@gmail.com', 714308029, 1234567890, '', '', '123 William Street, New York, NY, USA', '$2y$10$.x6syWeDUn7FQ6b/g663Leunqu8qctADsCrJOJuucRvb1fW7x9Vfq'),
(3, 87654321, '87654321.jpeg', 'Angela Gathoni', 'angelagathoni@gmail.com', 789152368, 123456789, 'Male', '1999-01-07', '123 William Street, New York, NY, USA', '$2y$10$n1Nj0wEUH6z/6DCrq9Q10emsbKqEZ9LgWoIydwC6FLesXYFkteCOS');

-- --------------------------------------------------------

--
-- Table structure for table `user_titles`
--

CREATE TABLE `user_titles` (
  `Title_ID` int(11) NOT NULL,
  `Title_Number` varchar(255) NOT NULL,
  `Plot_Number` varchar(255) NOT NULL,
  `Approximate_Area(Ha)` double NOT NULL,
  `County` varchar(255) NOT NULL,
  `Sub_County` varchar(255) NOT NULL,
  `Ward` varchar(255) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_titles`
--

INSERT INTO `user_titles` (`Title_ID`, `Title_Number`, `Plot_Number`, `Approximate_Area(Ha)`, `County`, `Sub_County`, `Ward`, `User_ID`, `Status`) VALUES
(75, 'RUIRU/RUIRU EAST BLOCK 2/300 59', '122121/12', 122, 'Kiambu', 'Changamwe', 'Kipevu', 1, 'SUBMITTED'),
(78, 'RUIRU/RUIRU EAST BLOCK 2/300 55', '122121/11', 11, 'Mombasa', 'Changamwe', 'Kipevu', 1, 'SUBMITTED'),
(80, '321', '12', 0, 'Mombasa', 'Changamwe', 'Kipevu', 1, 'SUBMITTED');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amalgamations`
--
ALTER TABLE `amalgamations`
  ADD PRIMARY KEY (`Amalgamate_ID`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `subdivisons`
--
ALTER TABLE `subdivisons`
  ADD PRIMARY KEY (`Subdivision_ID`);

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
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`Transfer_ID`);

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
-- Indexes for table `user_titles`
--
ALTER TABLE `user_titles`
  ADD PRIMARY KEY (`Title_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amalgamations`
--
ALTER TABLE `amalgamations`
  MODIFY `Amalgamate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `Payment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subdivisons`
--
ALTER TABLE `subdivisons`
  MODIFY `Subdivision_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `titles`
--
ALTER TABLE `titles`
  MODIFY `Title_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `title_owners`
--
ALTER TABLE `title_owners`
  MODIFY `Title_Owners_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `Transfer_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_titles`
--
ALTER TABLE `user_titles`
  MODIFY `Title_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
