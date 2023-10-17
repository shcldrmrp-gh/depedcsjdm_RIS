-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 03:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ris_propertyoffice`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_description` varchar(50) DEFAULT NULL,
  `stock_number` varchar(10) DEFAULT NULL,
  `stock_unit` varchar(10) DEFAULT NULL,
  `item_quantity` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queue_logs`
--

CREATE TABLE `queue_logs` (
  `referenceCode` int(6) NOT NULL,
  `yearRequested` int(5) NOT NULL,
  `accountName` varchar(50) NOT NULL,
  `userPosition` varchar(50) NOT NULL,
  `centerCode` varchar(50) NOT NULL,
  `userOffice` varchar(50) NOT NULL,
  `stock_number` varchar(10) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `stock_unit` varchar(10) NOT NULL,
  `quantityInput` int(100) NOT NULL,
  `purpose` text NOT NULL,
  `dateRequested` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_logs`
--

CREATE TABLE `request_logs` (
  `risNoDate` text NOT NULL,
  `yearRequested` int(4) NOT NULL,
  `seriesNumber` int(255) NOT NULL,
  `timeStamp` datetime NOT NULL DEFAULT current_timestamp(),
  `accountName` varchar(50) NOT NULL,
  `centerCode` varchar(50) NOT NULL,
  `userOffice` varchar(50) NOT NULL,
  `stock_number` varchar(10) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `stock_unit` varchar(10) NOT NULL,
  `quantityInput` int(100) NOT NULL,
  `formDate` text NOT NULL,
  `releaseDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ris_accounts`
--

CREATE TABLE `ris_accounts` (
  `accountType` varchar(50) NOT NULL,
  `accountName` varchar(50) NOT NULL,
  `userPosition` varchar(50) NOT NULL,
  `userOffice` varchar(50) NOT NULL,
  `centerCode` varchar(50) NOT NULL,
  `depedEmail` varchar(50) DEFAULT NULL,
  `accountPass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ris_accounts`
--

INSERT INTO `ris_accounts` (`accountType`, `accountName`, `userPosition`, `userOffice`, `centerCode`, `depedEmail`, `accountPass`) VALUES
('Super Admin', 'Super Admin', 'Super Admin', 'Super Admin', 'Super Admin', 'sa.erisformsystem@gmail.com', 'forsuperadmin'),
('User Manager', 'User Manager', 'User Manager', 'User Manager', 'User Manager', 'um.erisformsystem@gmail.com', 'forusermanager'),
('End User', 'End User', 'End User', 'End User', 'End User', 'eu.erisformsystem@gmail.com', 'forenduser');

-- --------------------------------------------------------

--
-- Table structure for table `usermanager_logs`
--

CREATE TABLE `usermanager_logs` (
  `accountName` varchar(50) NOT NULL,
  `stock_number` varchar(10) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `add_quantity` int(10) NOT NULL,
  `formDate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
