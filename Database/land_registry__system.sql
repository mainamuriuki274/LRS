-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 09:08 PM
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
-- Database: `land_registry _system`
--

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
  `Physical_Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `ID_Number`, `ID_Picture`, `Fullnames`, `Email_Address`, `Phonenumber`, `Tax_Number`, `Physical_Address`) VALUES
(38, 2147483647, 'None', '1sadkopoapodsda', 'muriukiledawis@gmail.com', 2147483647, 12323111, 'fsddsf'),
(41, 21, '41-into the spider verse.png', '1sadkopoapodsda', 'muriukiledsadawis@gmail.com', 2913, 123, 'asdsd'),
(42, 22, '42-into the spider verse.png', '1sadkopoapodsda', 'muriukiledsadsadawis@gmail.com', 112, 122, 'dfdffds'),
(44, 231, '44-deadpool.jpg', 'Lewis Maina Muriuki', 'ndjksoa@ad.com', 903, 1237, 'kjnjknkj'),
(45, 2313, '45-deadpool.jpg', 'Lewis Maina Muriuki', 'ndjk4soa@ad.com', 913, 137, 'hvgygiyigi'),
(47, 13, '47-deadpool.jpg', 'Lewis Maina Muriuki', 'ndjk488a@ad.com', 563, 737, 'hiuhihi');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
