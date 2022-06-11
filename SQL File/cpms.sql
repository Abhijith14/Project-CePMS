-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2021 at 07:22 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp(),
  `UserRole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`, `UserRole`) VALUES
(1, 'Admin', 'admin', 1234567890, 'adminuser@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-04-13 18:30:00', 1),
(2, 'Anuj kumar', 'anujk30', 1212121200, 'aktest@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-12-03 18:30:00', 0),
(3, 'Test user', 'test123', 1236547890, 'test@test.com', 'f925916e2754e5e03f75dd58a5733251', '2021-12-03 18:30:00', 0),
(4, 'Amit Singh', 'testsub', 1234567890, 'testsub@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2021-12-11 18:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `ID` int(10) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`ID`, `CategoryName`, `CreationDate`) VALUES
(1, 'Logistic Deliveries', '2021-04-13 18:30:00'),
(2, 'Cleaning', '2021-04-13 18:30:00'),
(3, 'Essential Services', '2021-04-13 18:30:00'),
(4, 'eccomerce delivery boys', '2021-04-13 18:30:00'),
(5, 'Medical Supply', '2021-04-13 18:30:00'),
(8, 'Milk Delivery', '2021-12-11 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblpass`
--

CREATE TABLE `tblpass` (
  `ID` int(10) NOT NULL,
  `PassNumber` varchar(200) DEFAULT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `IdentityType` varchar(200) DEFAULT NULL,
  `IdentityCardno` varchar(200) DEFAULT NULL,
  `Category` varchar(200) DEFAULT NULL,
  `FromDate` varchar(200) DEFAULT NULL,
  `ToDate` varchar(200) DEFAULT NULL,
  `PasscreationDate` timestamp NULL DEFAULT current_timestamp(),
  `CreatedBy` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpass`
--

INSERT INTO `tblpass` (`ID`, `PassNumber`, `FullName`, `ContactNumber`, `Email`, `IdentityType`, `IdentityCardno`, `Category`, `FromDate`, `ToDate`, `PasscreationDate`, `CreatedBy`) VALUES
(1, '286529906', 'Yogesh Kumar', 4654464646, 'yogi@gmail.com', 'Adhar Card', 'AD-122346', 'Cleaning', '2021-04-14', '2021-05-14', '2021-04-13 18:30:00', 'admin'),
(2, '915773340', 'Suresh Khanna', 9879878978, 'suresh@gmail.com', 'Any Other Govt Issued Doc', 'KTI-896567', 'Essential Services', '2021-04-14', '2021-07-31', '2021-04-12 18:30:00', 'admin'),
(3, '884595667', 'Anuj kumar', 1234567890, 'phpgurukulofficial@Gmail.com', 'Voter Card', '5235252', 'Essential Services', '2021-04-16', '2021-04-19', '2021-04-15 18:30:00', 'admin'),
(4, '756707508', 'Anuj kumar Singh', 123647823, 'testak@gmail.com', 'Voter Card', '4723647236', 'Logistic Deliveries', '2021-12-12', '2021-12-19', '2021-12-03 18:30:00', 'test123'),
(5, '985280698', 'Rahul', 1258932313, 'rahul@gmail.com', 'Voter Card', '34534534', 'Essential Services', '2021-12-14', '2021-12-31', '2021-12-11 18:30:00', 'admin'),
(6, '161947516', 'John Doe', 7896587412, 'hohndoe@gmail.com', 'PAN Card', 'HGFG72376b', 'Essential Services', '2021-12-12', '2021-12-26', '2021-12-11 18:30:00', 'testsub');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserName` (`UserName`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `tblpass`
--
ALTER TABLE `tblpass`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `catid` (`Category`),
  ADD KEY `usename` (`CreatedBy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblpass`
--
ALTER TABLE `tblpass`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblpass`
--
ALTER TABLE `tblpass`
  ADD CONSTRAINT `catid` FOREIGN KEY (`Category`) REFERENCES `tblcategory` (`CategoryName`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usename` FOREIGN KEY (`CreatedBy`) REFERENCES `tbladmin` (`UserName`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
