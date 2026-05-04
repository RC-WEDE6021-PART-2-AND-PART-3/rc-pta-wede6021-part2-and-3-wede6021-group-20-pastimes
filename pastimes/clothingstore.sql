-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2026 at 04:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clothingstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblclothes`
--

CREATE TABLE `tblclothes` (
  `clothesID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` varchar(10) NOT NULL,
  `image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclothes`
--

INSERT INTO `tblclothes` (`clothesID`, `name`, `price`, `size`, `image`) VALUES
(1, 'Adidas Sweatpants', 600.00, 'M', 'AdidasSweats.webp'),
(2, 'Adidas Sweatpants', 600.00, 'M', 'AdidasSweats.webp'),
(3, 'Nike Air Jordan Bloodline', 1100.00, '10', 'jordan1_bloodline.webp'),
(4, 'Nike Air Shirt', 500.00, 'L', 'nike_air.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `clothesID` int(11) NOT NULL,
  `orderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userID` int(11) NOT NULL,
  `fullName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `fullName`, `email`, `password`) VALUES
(1, 'John Doe', 'john@abc.co.za', '$2y$10$697Q8SQ8SfS65Nr33WB3ne1e3Vml3a9E/PhE0FDhVtyWSGPumbYEi'),
(2, 'Jane Smith', 'jane@abc.co.za', '$2y$10$0fOekN.vuP2NXYjKkUCQPunT76XkxP7LVndzLPC829OBI6umQsmKW'),
(3, 'Mike Brown', 'mike@abc.co.za', '$2y$10$jU75PZpQ23db3A8zyrdpX.ra7PSByd6GbuqW1/iY2CKOhcakEfVxy'),
(4, 'Sara Lee', 'sara@abc.co.za', '$2y$10$rd7hpI6AS8rgrSNzNSl8XuS5YTp3m.OSqfrx6zsbvaT9HnpGujsTK'),
(5, 'Tom White', 'tom@abc.co.za', '$2y$10$dcUhLbyxsNNXOALcdbhCtOX6oVH4v8G794PwdNIlFhcJV.rAUlnZO'),
(6, 'Henry ', 'henry123@gmail.com', '$2y$10$1tPl1lvQ614SM4Dsx95QGuwv42vurH3rNV/moF5iYBGYHjVSYgFR2'),
(7, 'Henry Owusu', 'henry619@gmail.com', '$2y$10$Z1yNrr7ba1ZnwuBV3BrBJOQ/B4EpR4CVdwBzSOqjH7XW.CumwAxSW'),
(8, 'Jacob Joe', 'joe123@gmail.com', '$2y$10$SzgfCNnwSLbfn5qwkL2u0e/vzCsRwIrXPUt2zoJLNf6G5m9tob00S'),
(9, 'Sarah Jacobs', 'SJacob123@gmail.com', '$2y$10$xPeu3B6Y9aFbw2pE61REaerUqtcS1FE6x50VLzj5IkHC/RymCsCoy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `tblclothes`
--
ALTER TABLE `tblclothes`
  ADD PRIMARY KEY (`clothesID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `clothesID` (`clothesID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblclothes`
--
ALTER TABLE `tblclothes`
  MODIFY `clothesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
