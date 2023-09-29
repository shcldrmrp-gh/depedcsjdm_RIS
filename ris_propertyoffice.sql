-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 07:07 PM
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
('Chloride Powder', 'OS 255', 'piece', 78),
('Mouse Pad', 'OS 290', 'piece', 84),
('Battery D Alkaline', 'OS 156', 'piece', 27),
('Photo Paper', 'OS 146', 'piece', 91),
('BROOM, soft (tambo)', 'OS 202', 'piece', 47),
('EPSON, INK CART, (001) Black', 'OS 238', 'bottle', 90),
('AIR FRESHENER, aerosol, 280ml/150g min', 'OS 154', 'can', 270),
('CALCULATOR, compact, 12 digits', 'OS 054', 'unit', 64),
('ENVELOPE, EXPANDING legal size doc', 'OS 117', 'piece', 93),
('Extension Cord', 'OS 092', 'piece', 97),
('Frame A4 Size', 'OS 271', 'piece', 96),
('PAPER, MULTICOPY, 80gsm, size: A4', 'OS 033', 'Reams', 87),
('NOTE PAD, stick on, (2in x 3in) min', 'OS 317', 'Book', 82),
('MOUSE, WIRELESS, USB', 'OS 370', 'Unit', 99),
('Manila Paper', 'OS 292', 'Piece', 74),
('MARKER, PERMANENT,blue', 'OS 213', 'Piece', 92),
('MOPHANDLE, heavy duty, aluminum, screw type', 'OS 361', 'Book', 79),
('Gestener toner MP2014', 'OS 232', 'Piece', 100),
('Liquid Hand Soap with Pump', 'OS 228', 'Book', 83),
('Keyboard', 'OS 299', 'Piece', 0),
('Ring Binder 1/4', 'OS 642', 'Piece', 75);

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

--
-- Dumping data for table `queue_logs`
--

INSERT INTO `queue_logs` (`referenceCode`, `yearRequested`, `accountName`, `userPosition`, `centerCode`, `userOffice`, `stock_number`, `item_description`, `stock_unit`, `quantityInput`, `purpose`, `dateRequested`) VALUES
(857843, 0, 'Ericson S. Sabacan, EdD, CESO V', '', 'S1', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 1, '', '09/26/2023'),
(857843, 0, 'Ericson S. Sabacan, EdD, CESO V', '', 'S1', 'Schools Division Superintendent', 'OS 054', 'CALCULATOR, compact, 12 digits', 'unit', 1, '', '09/26/2023'),
(262688, 0, 'Janette Sta. Maria', '', 'S2', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 1, '', ''),
(262688, 0, 'Janette Sta. Maria', '', 'S2', 'Schools Division Superintendent', 'OS 202', 'BROOM, soft (tambo)', 'piece', 1, '', ''),
(262688, 0, 'Janette Sta. Maria', '', 'S2', 'Schools Division Superintendent', 'OS 156', 'Battery D Alkaline', 'piece', 1, '', ''),
(890909, 0, 'Orsely Joyce Gonzales', '', 'S3', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 1, '', ''),
(890909, 0, 'Orsely Joyce Gonzales', '', 'S3', 'Schools Division Superintendent', 'OS 156', 'Battery D Alkaline', 'piece', 1, '', ''),
(511166, 0, 'Orsely Joyce Gonzales', '', 'S3', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 1, 'asdasdasdsad', ''),
(511166, 0, 'Orsely Joyce Gonzales', '', 'S3', 'Schools Division Superintendent', 'OS 202', 'BROOM, soft (tambo)', 'piece', 1, 'asdasdasdsad', ''),
(941432, 0, 'Ericson S. Sabacan, EdD, CESO V', '', 'S1', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 1, 'asdsadada', '09/27/2023'),
(941432, 0, 'Ericson S. Sabacan, EdD, CESO V', '', 'S1', 'Schools Division Superintendent', 'OS 202', 'BROOM, soft (tambo)', 'piece', 1, 'asdsadada', '09/27/2023'),
(137381, 0, 'Kristine Joy D. Quezada', '', 'AC1', 'Accounting', 'OS 202', 'BROOM, soft (tambo)', 'piece', 1, 'asdsadsada', '09/27/2023'),
(137381, 0, 'Kristine Joy D. Quezada', '', 'AC1', 'Accounting', 'OS 054', 'CALCULATOR, compact, 12 digits', 'unit', 1, 'asdsadsada', '09/27/2023'),
(137381, 0, 'Kristine Joy D. Quezada', '', 'AC1', 'Accounting', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 1, 'asdsadsada', '09/27/2023'),
(692335, 0, 'Jomel V. Policarpio', 'ADAS II', 'AC4', 'Accounting', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 1, 'asdasdsadsad', '09/27/2023'),
(692335, 0, 'Jomel V. Policarpio', 'ADAS II', 'AC4', 'Accounting', 'OS 156', 'Battery D Alkaline', 'piece', 1, 'asdasdsadsad', '09/27/2023'),
(122269, 0, 'Janette Sta. Maria', 'ADAS III', 'S2', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 4, '', '09/27/2023'),
(122269, 0, 'Janette Sta. Maria', 'ADAS III', 'S2', 'Schools Division Superintendent', 'OS 202', 'BROOM, soft (tambo)', 'piece', 4, '', '09/27/2023');

-- --------------------------------------------------------

--
-- Table structure for table `request_logs`
--

CREATE TABLE `request_logs` (
  `risNoDate` text NOT NULL,
  `yearRequested` int(4) NOT NULL,
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

INSERT INTO `request_logs` (`risNoDate`, `yearRequested`, `seriesNumber`, `accountName`, `centerCode`, `userOffice`, `stock_number`, `item_description`, `stock_unit`, `quantityInput`, `formDate`) VALUES
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
('2023-09-000014', 0, 14, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 317', 'NOTE PAD, stick on, (2in x 3in) min', 'Book', 2, '09/21/2023'),
('2023-09-000015', 0, 15, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 5, '09/21/2023'),
('2023-09-000016', 0, 16, 'Jomel V. Policarpio', 'AC4', 'Accounting', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 3, '09/21/2023'),
('2023-09-000016', 0, 16, 'Jomel V. Policarpio', 'AC4', 'Accounting', 'OS 117', 'ENVELOPE, EXPANDING legal size doc', 'piece', 4, '09/21/2023'),
('2023-09-000017', 0, 17, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 156', 'Battery D Alkaline', 'piece', 3, '09/21/2023'),
('2023-09-000017', 0, 17, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 054', 'CALCULATOR, compact, 12 digits', 'unit', 5, '09/21/2023'),
('2023-09-000017', 0, 17, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 292', 'Manila Paper', 'Piece', 4, '09/21/2023'),
('2023-09-000018', 0, 18, 'Yancy B. Razon', 'B4', 'Budget', 'OS 156', 'Battery D Alkaline', 'piece', 3, '09/21/2023'),
('2023-09-000018', 0, 18, 'Yancy B. Razon', 'B4', 'Budget', 'OS 202', 'BROOM, soft (tambo)', 'piece', 4, '09/21/2023'),
('2023-09-000019', 0, 19, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 4, '09/21/2023'),
('2023-09-000019', 0, 19, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 202', 'BROOM, soft (tambo)', 'piece', 2, '09/21/2023'),
('2023-09-000020', 0, 20, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 361', 'MOPHANDLE, heavy duty, aluminum, screw type', 'Book', 3, '09/21/2023'),
('2023-09-000021', 0, 21, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 146', 'Photo Paper', 'piece', 3, '09/21/2023'),
('2023-09-000022', 0, 22, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 033', 'PAPER, MULTICOPY, 80gsm, size: A4', 'Reams', 2, '09/21/2023'),
('2023-09-000023', 0, 23, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 292', 'Manila Paper', 'Piece', 5, '09/21/2023'),
('2023-09-000024', 0, 24, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 370', 'MOUSE, WIRELESS, USB', 'Unit', 2, '09/21/2023'),
('2023-09-000025', 0, 25, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 642', 'Ring Binder 1/4', 'Piece', 3, '09/21/2023'),
('2023-09-000026', 0, 26, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 299', 'Keyboard', 'Piece', 4, '09/21/2023'),
('2023-09-000027', 0, 27, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 054', 'CALCULATOR, compact, 12 digits', 'unit', 4, '09/21/2023'),
('2023-09-000028', 0, 28, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 317', 'NOTE PAD, stick on, (2in x 3in) min', 'Book', 4, '09/21/2023'),
('2023-09-000029', 0, 29, 'Maxima L. Biglangawa', 'AC15', 'Accounting', 'OS 370', 'MOUSE, WIRELESS, USB', 'Unit', 4, '09/21/2023'),
('2023-09-000030', 0, 30, 'Maxima L. Biglangawa', 'AC15', 'Accounting', 'OS 292', 'Manila Paper', 'Piece', 5, '09/21/2023'),
('2023-09-000031', 2023, 31, 'Imelda Bijasa', 'AC6', 'Accounting', 'OS 317', 'NOTE PAD, stick on, (2in x 3in) min', 'Book', 5, '09/21/2023'),
('2023-09-000032', 2023, 32, 'Imelda Bijasa', 'AC6', 'Accounting', 'OS 290', 'Mouse Pad', 'piece', 5, '09/21/2023'),
('2023-09-000033', 2023, 33, 'Kaila R. Diaz', 'A3', 'Assistant Schools Division Superintendent', 'OS 361', 'MOPHANDLE, heavy duty, aluminum, screw type', 'Book', 3, '09/21/2023'),
('2023-09-000033', 2023, 33, 'Kaila R. Diaz', 'A3', 'Assistant Schools Division Superintendent', 'OS 228', 'Liquid Hand Soap with Pump', 'Book', 2, '09/21/2023'),
('2023-09-000033', 2023, 33, 'Kaila R. Diaz', 'A3', 'Assistant Schools Division Superintendent', 'OS 033', 'PAPER, MULTICOPY, 80gsm, size: A4', 'Reams', 3, '09/21/2023'),
('2023-09-000034', 2023, 34, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 4, '09/22/2023'),
('2023-09-000035', 2023, 35, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 255', 'Chloride Power', 'piece', 5, '09/25/2023'),
('2023-09-000036', 2023, 36, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 255', 'Chloride Power', 'piece', 5, '09/25/2023'),
('2023-09-000037', 2023, 37, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 255', 'Chloride Power', 'piece', 5, '09/25/2023'),
('2023-09-000038', 2023, 38, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 299', 'Keyboard', 'Piece', 5, '09/25/2023'),
('2023-09-000039', 2023, 39, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 292', 'Manila Paper', 'Piece', 5, '09/25/2023'),
('2023-09-000039', 2023, 40, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 292', 'Manila Paper', 'Piece', 5, '09/25/2023'),
('2023-09-000041', 2023, 41, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 299', 'Keyboard', 'Piece', 5, '09/25/2023'),
('2023-09-000042', 2023, 42, 'Ericson S. Sabacan, EdD, CESO V', 'S1', 'Schools Division Superintendent', 'OS 299', 'Keyboard', 'Piece', 5, '09/25/2023'),
('2023-09-000043', 2023, 43, 'Janette Sta. Maria', 'S2', 'Schools Division Superintendent', 'OS 154', 'AIR FRESHENER, aerosol, 280ml/150g min', 'can', 2, '09/25/2023'),
('2023-09-000043', 2023, 43, 'Janette Sta. Maria', 'S2', 'Schools Division Superintendent', 'OS 156', 'Battery D Alkaline', 'piece', 1, '09/25/2023');

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
('Super Admin', 'Ma. Theresa M. Roxas', 'Supply Officer II', 'Property and Supply', 'P1', 'mtheresa.roxas@deped.gov.ph', '1234'),
('Super Admin', 'Mary Lalaine Rachel T. Manguisi', 'Admin Aide I', 'Property and Supply', 'P3', 'marylalainemanguisi@deped.gov.ph', '1234'),
('User Manager', 'Jhon Artin Victoriano', 'Admin Aide VI', 'Property and Supply', 'P2', 'jhonartin.victoriano@deped.gov.ph', '1234'),
('User Manager', 'John Mark A. Manguisi', 'Admin Aide I', 'Property and Supply', 'P4', 'johnmark.manguisi@deped.gov.ph', '1234'),
('End User', 'Ericson S. Sabacan, EdD, CESO V', 'Schools Division Superintendent', 'Schools Division Superintendent', 'S1', 'ericson.sabacan001@deped.gov.ph', '1234'),
('End User', 'Jaime T. Tugade PhD, CESE', 'Assistant Schools Division Superintendent', 'Assistant Schools Division Superintendent', 'A1', 'jaime.tugade@deped.gov.ph', '1234'),
('End User', 'Janette Sta. Maria', 'ADAS III', 'Schools Division Superintendent', 'S2', 'janette.stamaria@deped.gov.ph', '1234'),
('End User', 'Orsely Joyce Gonzales', 'Admin Aide VI', 'Schools Division Superintendent', 'S3', 'orselyjoyce.gonzales@deped.gov.ph', '1234'),
('End User', 'Rodelio Jimenez', 'Admin Aide IV - Driver', 'Schools Division Superintendent', 'S4', 'rodelio.jimenez001@deped.gov.ph', '1234'),
('End User', 'Emilio G. Bernardo Jr.', 'Admin Aide IV - Driver', 'Schools Division Superintendent', 'S5', 'emilio.bernardo@deped.gov.ph', '1234'),
('End User', 'Kelly Rose T. Zipagan', 'Admin Aide I', 'Assistant Schools Division Superintendent', 'A2', 'kelly.zipagan@deped.gov.ph', '1234'),
('End User', 'Kaila R. Diaz', 'Admin Aide I', 'Assistant Schools Division Superintendent', 'A3', 'kaila.diaz@deped.gov.ph', '1234'),
('End User', 'Kristine Joy D. Quezada', 'Accountant III', 'Accounting', 'AC1', 'kristinejoy.quezada@deped.gov.ph', '1234'),
('End User', 'Rechie O. Labandria', 'ADAS II', 'Accounting', 'AC2', 'rechie.labandria@deped.gov.ph', '1234'),
('End User', 'Mercedez M. Bijasa', 'ADAS III', 'Accounting', 'AC3', 'mercedez.bijasa@deped.gov.ph', '1234'),
('End User', 'Jomel V. Policarpio', 'ADAS II', 'Accounting', 'AC4', 'jomel.policarpio@deped.gov.ph', '1234'),
('End User', 'Rommel S. Pascual', 'ADAS III', 'Accounting', 'AC5', 'rommel.pascual002@deped.gov.ph', '1234'),
('End User', 'Imelda Bijasa', 'ADAS II', 'Accounting', 'AC6', 'imelda.bijasa@deped.gov.ph', '1234'),
('End User', 'Jinky O. Torres', 'ADAS III', 'Accounting', 'AC7', 'jinky.torres@deped.gov.ph', '1234'),
('End User', 'Thelma C. Bajar', 'ADAS III', 'Accounting', 'AC8', 'thelma.bajar@deped.gov.ph', '1234'),
('End User', 'Anne Melfei Casas', 'ADAS III', 'Accounting', 'AC9', 'annmelfei.casas@deped.gov.ph', '1234'),
('End User', 'Laarnie I. Catahan', 'ADAS II', 'Accounting', 'AC10', 'laarnie.catahan@deped.gov.ph', '1234'),
('End User', 'Ma. Beverlie J. Nolasco', 'ADAS II', 'Accounting', 'AC11', 'mabeverlie.jabat@deped.gov.ph', '1234'),
('End User', 'Nenette M. Gomez', 'ADAS III', 'Accounting', 'AC12', 'nenette.gomez@deped.gov.ph', '1234'),
('End User', 'Gina E. Cape', 'ADAS II', 'Accounting', 'AC13', 'gina.cape@deped.gov.ph', '1234'),
('End User', 'Ravenn Tiu', 'Admin Aide I', 'Accounting', 'AC14', 'ravenn.tiu@deped.gov.ph', '1234'),
('End User', 'Maxima L. Biglangawa', 'ADAS III', 'Accounting', 'AC15', 'maxima.biglangawa@deped.gov.ph', '1234'),
('End User', 'Rosalinda F. Perfinan', 'ADAS II', 'Accounting', 'AC16', 'krosalinda.perfinan@deped.gov.ph', '1234'),
('End User', 'Baby Ruth Pablo', 'ADAS II', 'Accounting', 'AC17', 'babyruth.pablo@deped.gov.ph', '1234'),
('End User', 'Orlando D. Gonzales', 'Budget Officer', 'Budget', 'B1', 'orlando.gonzales002@deped.gov.ph', '1234'),
('End User', 'Lalaine Bartolome', 'ADAS II', 'Budget', 'B2', 'lalaine.mendoza003@deped.gov.ph', '1234'),
('End User', 'Ma. Carmela P. Hagosojos', 'ADAS I', 'Budget', 'B3', 'macarmela.hagosojos@deped.gov.ph', '1234'),
('End User', 'Yancy B. Razon', 'ADAS II', 'Budget', 'B4', 'yancy.razon@deped.gov.ph', '1234'),
('End User', 'Eluisa L. Icang', 'ADAS III', 'Payroll', 'PAY1', 'eluisa.icang@deped.gov.ph', '1234'),
('End User', 'Rowena R. Perez', 'AO I', 'Payroll', 'PAY2', 'rowena.perez016@deped.gov.ph', '1234'),
('End User', 'May L. Ladao', 'ADAS III', 'Payroll', 'PAY3', 'may.ladao@deped.gov.ph', '1234'),
('End User', 'Glaiza P. Alejandro', 'ADAS III', 'Payroll', 'PAY4', 'glaiza.alejandro@deped.gov.ph', '1234'),
('End User', 'Mariz DR. Daluz', 'ADAS III', 'Payroll', 'PAY5', 'mariz.daluz@deped.gov.ph', '1234'),
('Super Admin', 'Super Admin', 'Super Admin', 'Super Admin', 'Super Admin', 'superadmin', 'superAdminOnly'),
('User Manager', 'User Manager', 'User Manager', 'User Manager', 'User Manager', 'usermanager', 'userManagerOnly'),
('End User', 'Arthur F. Francisco', 'ITO-I', 'Information Communication Technology', 'I1', 'arthur.francisco@deped.gov.ph', '1234'),
('End User', 'Jayson Fuller', 'ICT-AAI', 'Information Communication Technology', 'I2', 'jayson.fuller@deped.gov.ph', '1234'),
('End User', 'Merlita D. Ynciong', 'SEP SOC. MOB.', 'School Governance and Operations Division', 'SGOD7', 'merlita.ynciong@deped.gov.ph', '1234'),
('End User', 'Margie M. Duro', 'PDO I', 'School Governance and Operations Division', 'SGOD16', 'margie.duro@deped.gov.ph', '1234'),
('End User', 'Marlon P. Daclis', 'EPS I - English', 'Curriculum Implementation Division', 'CID6', 'marlon.daclis@deped.gov.ph', '1234');

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
('John Mark A. Manguisi', 'OS 370', 'MOUSE, WIRELESS, USB', 13, '09/20/2023'),
('Jhon Artin Victoriano', 'OS 156', 'Battery D Alkaline', 50, '09/21/2023');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
