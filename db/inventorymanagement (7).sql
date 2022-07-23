-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 04:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `FirstName` varchar(500) NOT NULL,
  `LastName` varchar(500) NOT NULL,
  `MiddleName` varchar(500) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Birthdate` varchar(500) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `ContactNumber` int(11) NOT NULL,
  `Position` varchar(100) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Username` varchar(500) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Picture` varchar(500) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `FirstName`, `LastName`, `MiddleName`, `Gender`, `Birthdate`, `Address`, `ContactNumber`, `Position`, `Email`, `Username`, `Password`, `Picture`) VALUES
(200, 'John Marky', 'Lundag', 'Sanchez', 'Male', '0000-00-00', 'Brgy. 4 M. Lejano Street. Lian Batangas', 2147483647, 'Admin', 'johnmarky@gmail.com', 'Markiana', '0206', '8c4fdcc3b868c07f051d10bb8526f0c2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `PropertyName` varchar(500) NOT NULL,
  `SerialNumber` varchar(255) NOT NULL,
  `PropertyNumber` varchar(100) NOT NULL,
  `AcquisitionDate` date NOT NULL,
  `AcquisitionCost` int(100) NOT NULL,
  `Office` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`PropertyName`, `SerialNumber`, `PropertyNumber`, `AcquisitionDate`, `AcquisitionCost`, `Office`) VALUES
('Desktop Computer, Intel core i3-3229', 'N/A', '21921', '2013-02-18', 17136, 'MAC LAB'),
('Desktop Computer, Intel core i3-3229', 'N/A', '21922', '2013-02-08', 17239, 'MAC LAB'),
('Desktop Computer, Intel core i5-3220', 'N/A', '21923', '2013-02-18', 17239, 'MAC LAB'),
('Desktop Computer, Intel core i3-3229', 'N/A', '21924', '2013-02-18', 17136, 'CISCO'),
('Desktop Computer, Intel core i3-3229', 'N/A', '21925', '2018-02-18', 17239, 'MAC LAB'),
('Desktop Computer, Intel core i3-3229', 'N/A', '21926', '2013-02-18', 17136, 'CISCO'),
('Desktop Computer, Intel core i3-3229', 'N/A', '21927', '2022-07-28', 17239, 'MAC LAB'),
('Desktop Computer, Intel core i5-3220', 'N/A', '21928', '2022-07-15', 17239, 'MAC LAB'),
('Desktop Computer, Intel core i3-3229', 'N/A', '21929', '2022-07-15', 17239, 'MAC LAB');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `dateID` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8 NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `dateID`, `title`, `start_event`, `end_event`) VALUES
(200, 4, 'Admin John Marky: bibili ng suka', '2022-07-17 06:30:00', '2022-07-17 07:00:00'),
(101, 5, 'Head Admin Cheanner: Walk', '2022-07-19 08:00:00', '2022-07-19 08:30:00'),
(101, 6, 'Head Admin Cheanner: asd', '2022-07-13 02:30:00', '2022-07-14 02:30:00'),
(101, 7, 'Head Admin Cheanner: zssd', '2022-07-08 00:00:00', '2022-07-09 00:00:00'),
(101, 8, 'Head Admin Cheanner: aslkljda', '2022-07-18 06:30:00', '2022-07-18 07:00:00'),
(101, 9, 'Head Admin Cheanner: nguso mo pilay', '2022-07-05 00:00:00', '2022-07-06 00:00:00'),
(101, 10, 'Head Admin Cheanner: kjkg', '2022-07-07 00:00:00', '2022-07-08 00:00:00'),
(101, 11, 'Head Admin Cheanner: kj', '2022-06-28 00:00:00', '2022-06-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fileID` int(11) NOT NULL,
  `fileName` varchar(500) CHARACTER SET latin1 NOT NULL,
  `personID` int(6) NOT NULL,
  `fileType` varchar(50) CHARACTER SET latin1 NOT NULL,
  `dateUpload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`fileID`, `fileName`, `personID`, `fileType`, `dateUpload`) VALUES
(1, 'Database1.accdb', 102, 'accdb', '2022-07-22'),
(2, 'announcement.php', 102, 'php', '2022-07-22'),
(3, 'Database1 (2).accdb', 101, 'accdb', '2022-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `headadmin`
--

CREATE TABLE `headadmin` (
  `HeadAdminID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Birthdate` date NOT NULL,
  `Address` varchar(255) NOT NULL,
  `ContactNumber` varchar(11) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Picture` varchar(500) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `headadmin`
--

INSERT INTO `headadmin` (`HeadAdminID`, `FirstName`, `LastName`, `MiddleName`, `Gender`, `Birthdate`, `Address`, `ContactNumber`, `Position`, `Email`, `Username`, `Password`, `Picture`) VALUES
(100, 'Mark Nathaniel', 'Magana', 'Cabadin', 'Male', '2000-12-14', 'Sitio Tan-ag,Lian Batangas', '2147483647', 'HeadAdmin', 'MarkNathaniel@gmail.com', 'Tantan', '2514', '279907612_732889087730828_843820468031151371_n.jpg'),
(101, 'Cheanner', 'Gatdula', 'Melgar', 'Female', '0000-00-00', 'Brgy. Wawa Nasugu Batangas', '0', 'HeadAdmin', 'cheanner.15@gmail.com', 'Cheanner', '2514', 'bsu logo.png'),
(102, 'Lovely', 'De Sagun', 'De Guzman', 'Female', '0000-00-00', 'Carlosa, Calatagan Batangas', '09169385864', 'HeadAdmin', 'lovely.desagun@g.batstate-u.edu.ph', 'lovelyy', 'desagun', 'received_1029348187907135.jpg'),
(103, 'Carl Dwight', 'Mendoza', 'Espina', 'Male', '0000-00-00', 'Brgy. Putat Nasugbu Batangas', '09297086480', 'HeadAdmin', 'carldwight.mendoza@g.batstate-u.edu.ph', 'Carl', 'mendoza', '8c4fdcc3b868c07f051d10bb8526f0c2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `OfficerID` int(11) NOT NULL,
  `OfficeName` varchar(500) NOT NULL,
  `HeadName` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`OfficerID`, `OfficeName`, `HeadName`) VALUES
(1, 'MAC LAB', 'Ass. Prof. Renz Salac'),
(2, 'CISCO', 'Ass. Prof. Renz Salac'),
(3, 'Library', 'Ass. Prof. Renz Salac'),
(4, 'Registrar', 'Sir Jeciel'),
(5, 'Accounting', 'Sir Kenneth');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`PropertyNumber`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`dateID`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileID`),
  ADD KEY `personID` (`personID`);

--
-- Indexes for table `headadmin`
--
ALTER TABLE `headadmin`
  ADD PRIMARY KEY (`HeadAdminID`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`OfficerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `dateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `headadmin`
--
ALTER TABLE `headadmin`
  MODIFY `HeadAdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `OfficerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
