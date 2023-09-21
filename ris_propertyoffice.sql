-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 02:52 AM
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

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_description`, `stock_number`, `stock_unit`, `item_quantity`) VALUES
('Chloride Power', 'OS 255', 'piece', 94),
('Mouse Pad', 'OS 290', 'piece', 90),
('Battery D Alkaline', 'OS 156', 'piece', 20),
('Photo Paper', 'OS 146', 'piece', 95),
('BROOM, soft (tambo)', 'OS 202', 'piece', 76),
('EPSON, INK CART, (001) Black', 'OS 238', 'bottle', 95),
('AIR FRESHENER, aerosol, 280ml/150g min', 'OS 154', 'can', 329),
('CALCULATOR, compact, 12 digits', 'OS 054', 'unit', 87),
('ENVELOPE, EXPANDING legal size doc', 'OS 117', 'piece', 97),
('Extension Cord', 'OS 092', 'piece', 97),
('Frame A4 Size', 'OS 271', 'piece', 96),
('PAPER, MULTICOPY, 80gsm, size: A4', 'OS 033', 'Reams', 92),
('NOTE PAD, stick on, (2in x 3in) min', 'OS 317', 'Book', 91),
('MOUSE, WIRELESS, USB', 'OS 370', 'Unit', 106),
('Manila Paper', 'OS 292', 'Piece', 88),
('MARKER, PERMANENT,blue', 'OS 213', 'Piece', 92),
('MOPHANDLE, heavy duty, aluminum, screw type', 'OS 361', 'Book', 85),
('Gestener toner MP2014', 'OS 232', 'Piece', 100),
('Liquid Hand Soap with Pump', 'OS 228', 'Book', 85),
('Keyboard', 'OS 299', 'Piece', 100),
('Ring Binder 1/4', 'OS 642', 'Piece', 79);

-- --------------------------------------------------------

--
-- Table structure for table `request_logs`
--

CREATE TABLE `request_logs` (
  `risNoDate` text NOT NULL,
  `storedYear` int(10) NOT NULL,
  `seriesNumber` int(255) NOT NULL,
  `accountName` varchar(50) NOT NULL,
  `centerCode` varchar(50) NOT NULL,
  `userOffice` varchar(50) NOT NULL,
  `stock_number` varchar(10) NOT NULL,
  `item_description` varchar(100) NOT NULL,
  `stock_unit` varchar(10) NOT NULL,
  `quantityInput` int(100) NOT NULL,
  `formDate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_logs`
--

INSERT INTO `request_logs` (`risNoDate`, `storedYear`, `seriesNumber`, `accountName`, `centerCode`, `userOffice`, `stock_number`, `item_description`, `stock_unit`, `quantityInput`, `formDate`) VALUES
('2023-09-000001', 0, 1, 'Arthur F. Francisco', '', 'Information and Communication Technology', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 13, '09/19/2023'),
('2023-09-000001', 0, 1, 'Arthur F. Francisco', '', 'Information and Communication Technology', 'OS 370', 'MOUSE, WIRELESS, USB', 'Unit', 7, '09/19/2023'),
('2023-09-000001', 0, 1, 'Arthur F. Francisco', '', 'Information and Communication Technology', 'OS 228', 'Liquid Hand Soap with Pump', 'Book', 10, '09/19/2023'),
('2023-09-000002', 0, 2, 'Ericson S. Sabacan, EdD, CESO V', '', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 5, '09/19/2023'),
('2023-09-000002', 0, 2, 'Ericson S. Sabacan, EdD, CESO V', '', 'Schools Division Superintendent', 'OS 271', 'Frame A4 Size', 'piece', 2, '09/19/2023'),
('2023-09-000002', 0, 2, 'Ericson S. Sabacan, EdD, CESO V', '', 'Schools Division Superintendent', 'OS 125', 'Toner MP2000LE', 'piece', 3, '09/19/2023'),
('2023-09-000003', 0, 3, 'Ericson S. Sabacan, EdD, CESO V', '', 'Schools Division Superintendent', 'OS 156', 'Battery D Alkaline', 'piece', 3, '09/19/2023'),
('2023-09-000004', 0, 4, 'Ericson S. Sabacan, EdD, CESO V', '', 'Schools Division Superintendent', 'OS 156', 'Battery D Alkaline', 'piece', 3, '09/20/2023'),
('2023-09-000004', 0, 4, 'Ericson S. Sabacan, EdD, CESO V', '', 'Schools Division Superintendent', 'OS 271', 'Frame A4 Size', 'piece', 2, '09/20/2023'),
('2023-09-000005', 0, 5, 'Ivan Policarpio', '', 'Information and Communication Technology', 'OS 361', 'MOPHANDLE, heavy duty, aluminum, screw type', 'Book', 5, '09/20/2023'),
('2023-09-000005', 0, 5, 'Ivan Policarpio', '', 'Information and Communication Technology', 'OS 317', 'NOTE PAD, stick on, (2in x 3in) min', 'Book', 2, '09/20/2023'),
('2023-09-000006', 0, 6, 'Arthur F. Francisco', '', 'Information and Communication Technology', 'OS 228', 'Liquid Hand Soap with Pump', 'Book', 5, '09/20/2023'),
('2023-09-000006', 0, 6, 'Arthur F. Francisco', '', 'Information and Communication Technology', 'OS 125', 'Toner MP2000LE', 'piece', 3, '09/20/2023'),
('2023-09-000007', 0, 7, 'Margie M. Duro', '', 'School Governance Operations Division', 'OS 290', 'Mouse Pad', 'piece', 3, '09/20/2023'),
('2023-09-000008', 0, 8, 'Marlon P. Daclis', '', 'Curriculum Implementation Division', 'OS 125', 'Toner MP2000LE', 'piece', 5, '09/20/2023'),
('2023-09-000009', 0, 9, 'Jaime T. Tugade PhD, CESE', '', 'Assistant Schools Division Superintendent', 'OS 033', 'PAPER, MULTICOPY, 80gsm, size: A4', 'Reams', 3, '09/20/2023'),
('2023-09-000010', 0, 10, 'Ma. Jima T. Cadiz', '', 'General Services', 'OS 202', 'BROOM, soft (tambo)', 'piece', 5, '09/20/2023'),
('2023-09-000011', 0, 11, 'Ericson S. Sabacan, EdD, CESO V', '', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 3, '09/20/2023'),
('2023-09-000011', 0, 11, 'Ericson S. Sabacan, EdD, CESO V', '', 'Schools Division Superintendent', 'OS 054', 'CALCULATOR, compact, 12 digits', 'unit', 3, '09/20/2023'),
('2023-09-000012', 0, 12, 'Ericson S. Sabacan, EdD, CESO V', '', 'Schools Division Superintendent', 'OS 156', 'Battery D Alkaline', 'piece', 4, '09/20/2023'),
('2023-09-000013', 0, 13, 'Ericson S. Sabacan, EdD, CESO V', '', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 5, '09/20/2023'),
('2023-09-000013', 0, 13, 'Ericson S. Sabacan, EdD, CESO V', '', 'Schools Division Superintendent', 'OS 156', 'Battery D Alkaline', 'piece', 5, '09/20/2023'),
('2023-09-000014', 0, 14, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 361', 'MOPHANDLE, heavy duty, aluminum, screw type', 'Book', 3, '09/21/2023'),
('2023-09-000014', 0, 14, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 156', 'Battery D Alkaline', 'piece', 3, '09/21/2023'),
('2023-09-000014', 0, 14, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 317', 'NOTE PAD, stick on, (2in x 3in) min', 'Book', 2, '09/21/2023');

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
  `depedEmail` varchar(30) DEFAULT NULL,
  `accountPass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ris_accounts`
--

INSERT INTO `ris_accounts` (`accountType`, `accountName`, `userPosition`, `userOffice`, `centerCode`, `depedEmail`, `accountPass`) VALUES
('End User', 'Ericson S. Sabacan, EdD, CESO V', 'Schools Division Superintendent', 'Schools Division Superintendent', 'S1', 'ericsonsabacan@deped.gov.ph', '12345'),
('End User', 'Arthur F. Francisco', 'ICT Services', 'Information and Communication Technology', 'I1', 'afrancisco@deped.gov.ph', '12345'),
('Super Admin', 'Mark Austin B. Condalor', 'OJT (ICT)', 'Information and Communication Technology', 'I3', 'alex091301@gmail.com', '12345'),
('End User', 'Jaime T. Tugade PhD, CESE', 'Assistant Schools Division Superintendent', 'Assistant Schools Division Superintendent', 'A1', 'jaimetugade@deped.gov.ph', '12345'),
('End User', 'Margie M. Duro', 'PDO I', 'School Governance Operations Division', 'SGOD16', 'margieduro@deped.gov.ph', '12345'),
('End User', 'Merlita D. Ynciong', 'SEP SOC. MOB.', 'School Governance Operations Division', 'SGOD7', 'merlynciong@deped.gov.ph', '12345'),
('User Manager', 'Charlemagne Reporen', 'Admin Aide I', 'School Governance Operations Division', 'SGOD9', 'charlesreporen@deped.gov.ph', '12345'),
('End User', 'Ivan Policarpio', 'OJT (ICT)', 'Information and Communication Technology', 'I3', 'ivanpolicarpio@deped.gov.ph', '12345'),
('End User', 'Angelo Capa', 'OJT-ICT', 'Information and Communcation Technology', 'I3', 'capa@deped.gov.ph', '12345'),
('User Manager', 'John Mark A. Manguisi', 'Administrative Aide I', 'Property and Supply', 'P4', 'jmmanguisi@deped.gov.ph', '12345'),
('Super Admin', 'Ma. Theresa M. Roxas', 'Supply Officer II', 'Property and Supply', 'P1', 'mtheresa@deped.gov.ph', '12345'),
('End User', 'Marlon P. Daclis', 'EPS I - English', 'Curriculum Implementation Division', 'CID6', 'mdaclis@deped.gov.ph', '12345'),
('End User', 'Ma. Jima T. Cadiz', 'Administrative Officer V', 'General Services', 'AD1', 'mjcadiz@deped.gov.ph', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `usage_logs`
--

CREATE TABLE `usage_logs` (
  `stock_number` varchar(10) NOT NULL,
  `item_description` varchar(50) NOT NULL,
  `total_usage` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usage_logs`
--

INSERT INTO `usage_logs` (`stock_number`, `item_description`, `total_usage`) VALUES
('OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 26),
('OS 370', 'MOUSE, WIRELESS, USB', 7),
('OS 228', 'Liquid Hand Soap with Pump', 15),
('OS 271', 'Frame A4 Size', 4),
('OS 125', 'Toner MP2000LE', 11),
('OS 156', 'Battery D Alkaline', 18),
('', 'noValue', 0),
('OS 202', 'BROOM, soft (tambo)', 8),
('OS 361', 'MOPHANDLE, heavy duty, aluminum, screw type', 8),
('OS 317', 'NOTE PAD, stick on, (2in x 3in) min', 4),
('OS 290', 'Mouse Pad', 3),
('OS 033', 'PAPER, MULTICOPY, 80gsm, size: A4', 3),
('OS 154', 'Array', 8);

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

--
-- Dumping data for table `usermanager_logs`
--

INSERT INTO `usermanager_logs` (`accountName`, `stock_number`, `item_description`, `add_quantity`, `formDate`) VALUES
('Charlemagne Reporen', 'OS 255', 'Chloride Power', 5, '09/19/2023'),
('Charlemagne Reporen', 'OS 290', 'Mouse Pad', 5, '09/20/2023'),
('John Mark A. Manguisi', 'OS 370', 'MOUSE, WIRELESS, USB', 13, '09/20/2023');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
