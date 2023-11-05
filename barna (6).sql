-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 05:17 PM
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
-- Database: `barna`
--

-- --------------------------------------------------------

--
-- Table structure for table `basic`
--

CREATE TABLE `basic` (
  `SerialNo` int(11) NOT NULL,
  `NIDNO` varchar(17) NOT NULL,
  `Gender` varchar(30) NOT NULL,
  `Disable` varchar(20) NOT NULL,
  `FF` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `basic`
--

INSERT INTO `basic` (`SerialNo`, `NIDNO`, `Gender`, `Disable`, `FF`, `Age`) VALUES
(1, '092102101143', 'Male', 'No', 'No', 23),
(2, '01238383333', 'Male', 'No', 'No', 35),
(3, '019333339898', 'Male', 'No', 'Yes', 62),
(4, '01297654321', 'Female', 'No', 'No', 41),
(5, '03219833022', '', 'No', 'No', 102),
(6, '09543456789', 'Male', 'No', 'No', 62);

-- --------------------------------------------------------

--
-- Table structure for table `calculation`
--

CREATE TABLE `calculation` (
  `SerialNo` int(11) NOT NULL,
  `NIDNO` varchar(17) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `calculation`
--

INSERT INTO `calculation` (`SerialNo`, `NIDNO`, `Year`) VALUES
(1, '092102101143', 2022),
(2, '01238383333', 2022),
(3, '019333339898', 2023),
(4, '01297654321', 2022),
(5, '03219833022', 2022),
(6, '09543456789', 2022),
(7, '09543456789', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `serialno` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `NIDNO` varchar(20) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Yourcomplain` varchar(100) NOT NULL,
  `Reply` text NOT NULL,
  `Status` varchar(50) NOT NULL DEFAULT 'Pending',
  `userrole` varchar(20) NOT NULL DEFAULT 'user',
  `RepliedBy` varchar(50) DEFAULT NULL,
  `Addedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`serialno`, `Name`, `NIDNO`, `Subject`, `Yourcomplain`, `Reply`, `Status`, `userrole`, `RepliedBy`, `Addedon`) VALUES
(9, 'Manju Islam', '3954345678', 'view', 'can i get a better view?', 'I will try', 'Completed', 'user', '3876543210', '2023-05-06 01:42:31'),
(10, 'Manju Islam', '3954345678', 'Tax info', 'Where can i find tax information', '', 'Pending', 'user', NULL, '2023-05-06 01:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE `deduction` (
  `SerialNo` int(11) NOT NULL,
  `NIDNO` varchar(17) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `deduction`
--

INSERT INTO `deduction` (`SerialNo`, `NIDNO`, `Year`) VALUES
(1, '092102101143', 2022),
(2, '01238383333', 2022),
(3, '019333339898', 2023),
(4, '01297654321', 2022),
(5, '03219833022', 2022),
(6, '09543456789', 2022),
(7, '09543456789', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `earning`
--

CREATE TABLE `earning` (
  `SerialNo` int(11) NOT NULL,
  `NIDNO` varchar(17) NOT NULL,
  `Year` int(11) NOT NULL,
  `BasicSalary` float NOT NULL,
  `SpecialSalary` float NOT NULL,
  `HouseRent` float NOT NULL,
  `MedicalAllowance` float NOT NULL,
  `CriticalCare` float NOT NULL,
  `TransportAllowance` float NOT NULL,
  `FestivalAllowance` float NOT NULL,
  `PAssistantAllowance` float NOT NULL,
  `VacationAllowance` float NOT NULL,
  `PrizeAllowance` float NOT NULL,
  `OvertimeAllowance` float NOT NULL,
  `PolicyAllowance` float NOT NULL,
  `PolicyPremium` float NOT NULL,
  `BonusAllowance` float NOT NULL,
  `Allowance` float NOT NULL,
  `Others` float NOT NULL,
  `SaleValue` float DEFAULT NULL,
  `PurchaseValue` float DEFAULT NULL,
  `Misc` float DEFAULT NULL,
  `Bill` float NOT NULL,
  `Furniture` float NOT NULL,
  `AgriSaleValue` float NOT NULL,
  `HomeCount` float NOT NULL,
  `Rent` float NOT NULL,
  `OwnUse` float NOT NULL,
  `HomeTax` float NOT NULL,
  `LandTax` float NOT NULL,
  `HomeLoan` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `earning`
--

INSERT INTO `earning` (`SerialNo`, `NIDNO`, `Year`, `BasicSalary`, `SpecialSalary`, `HouseRent`, `MedicalAllowance`, `CriticalCare`, `TransportAllowance`, `FestivalAllowance`, `PAssistantAllowance`, `VacationAllowance`, `PrizeAllowance`, `OvertimeAllowance`, `PolicyAllowance`, `PolicyPremium`, `BonusAllowance`, `Allowance`, `Others`, `SaleValue`, `PurchaseValue`, `Misc`, `Bill`, `Furniture`, `AgriSaleValue`, `HomeCount`, `Rent`, `OwnUse`, `HomeTax`, `LandTax`, `HomeLoan`) VALUES
(1, '092102101143', 2022, 56000, 0, 27000, 12000, 1200, 1000, 20000, 1222, 0, 100, 0, 0, 0, 30000, 2000, 0, 0, 0, 0, 0, 0, 300000, 0, 0, 0, 0, 0, 0),
(2, '01238383333', 2022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 4000000, 21, 25000, 3, 20000, 2000, 150000),
(4, '01297654321', 2022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 5, 1234, 1, 124, 200, 0),
(5, '03219833022', 2022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 500000, 0, 0, 0, 0, 0, 0),
(6, '09543456789', 2022, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 12, 12000, 2, 11000, 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `serialno` int(11) NOT NULL,
  `BasicSalary` varchar(100) NOT NULL,
  `Allowence` varchar(100) NOT NULL,
  `MedicalAllowence` varchar(100) NOT NULL,
  `PrizeAllowence` varchar(100) NOT NULL,
  `BonousAllowence` varchar(100) NOT NULL,
  `SpecialSalary` varchar(100) NOT NULL,
  `HouseRent` varchar(100) NOT NULL,
  `TransportAllownece` varchar(100) NOT NULL,
  `OvertimeAlowence` varchar(100) NOT NULL,
  `VacationAllowence` varchar(100) NOT NULL,
  `addedin` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`serialno`, `BasicSalary`, `Allowence`, `MedicalAllowence`, `PrizeAllowence`, `BonousAllowence`, `SpecialSalary`, `HouseRent`, `TransportAllownece`, `OvertimeAlowence`, `VacationAllowence`, `addedin`) VALUES
(2, '121', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2022-11-23 16:02:54'),
(3, '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2022-11-23 16:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `serialno` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `NIDNO` varchar(20) NOT NULL,
  `Question` varchar(100) NOT NULL,
  `Reply` text DEFAULT NULL,
  `RepliedBy` varchar(50) DEFAULT NULL,
  `Addedon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`serialno`, `Name`, `NIDNO`, `Question`, `Reply`, `RepliedBy`, `Addedon`) VALUES
(6, 'Manju Islam', '3954345678', 'What is TIN?', 'Tax Index Number', '0987654321', '2023-05-03 14:39:41'),
(7, 'Manju Islam', '3954345678', 'Is it necessary for all?', 'As a responsible citizen if you are eligible to pay tax then it is mandatory. ', '0987654321', '2023-05-03 14:39:47'),
(8, 'Manju Islam', '3954345678', 'What is the deadline to pay the tax?', 'November 2023', '0987654321', '2023-05-03 14:39:54'),
(11, 'Manju Islam', '3954345678', 'What is Tax?', ' Income tax is the main source of revenue. It is a progressive tax system. Income tax is imposed on the basis of ability to pay. \"The more a taxpayer earns the more he should pay\'- is the basic\nprinciple of charging income tax. It aims at ensuring equity and social justice. In Bangladesh income tax is being administered under the tax legislations named as “THE INCOME TAX ORDINANCE, 1984\n(XXXVI OF 1984) and INCOME TAX RULES, 1984.”\n', '3876543210', '2023-05-03 15:26:37'),
(12, 'Manju Islam', '3954345678', 'What is income Taxable limit?', NULL, NULL, '2023-05-03 15:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `serialno` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `FathersName` varchar(50) NOT NULL,
  `MothersName` varchar(50) NOT NULL,
  `DateofBirth` date NOT NULL,
  `NIDNO` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PhoneNumber` varchar(11) NOT NULL,
  `BloodGroup` varchar(10) NOT NULL,
  `PlaceofBirth` varchar(20) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `userrole` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `paymentstatus` varchar(50) NOT NULL DEFAULT 'pending',
  `AddedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`serialno`, `Name`, `FathersName`, `MothersName`, `DateofBirth`, `NIDNO`, `Address`, `PhoneNumber`, `BloodGroup`, `PlaceofBirth`, `Image`, `Password`, `userrole`, `status`, `paymentstatus`, `AddedOn`) VALUES
(1, 'Barna Khan', 'Shafiqul Islam', 'Alin', '1999-10-24', '092102101143', 'Barishal', '01234567890', 'B+', 'Barishal', 'image/aa.jpg', '123', 'user', 'pending', 'pending', '2022-10-06 19:44:23'),
(2, 'sdsa', 'asasa', 'aaaee', '1987-11-14', '01238383333', 'asert', '01234567890', 'b+', 'sdfs', 'image/sdsa.jpg', '123', 'user', 'pending', 'pending', '2022-11-14 18:02:25'),
(3, 'Mariam Barna', 'kazi Shafiq', 'Aysha siddika', '1999-11-01', '3876543210', 'Dhaka', '01234567890', 'B+', 'Barishal', 'image/Amena khatun.jpg', '12', 'admin', 'Approved', 'pending', '2022-11-14 18:14:19'),
(4, 'Amena khatun', 'asad khatun', 'asma khatun', '1982-04-11', '01297654321', 'dhaka', '01234567890', 'A+', 'dhaka', 'image/Amena khatun.jpg', '123', 'user', 'pending', 'pending', '2023-04-03 10:20:21'),
(5, 'Amin khan', 'Arif Khan', 'Mina', '1961-04-10', '019333339898', 'barishal', '01234567890', 'B+', 'Dhaka', 'image/Amin khan.jpg', '123', 'user', 'pending', 'pending', '2023-04-03 10:25:43'),
(7, 'Manju Islam', 'Ismail Kazi', 'Nur Jahan', '1961-04-13', '3954345678', 'Rangpur', '01234567890', 'B+', 'Barishal', 'image/Manju Islam.jpg', '123', 'user', 'Approved', 'Paid', '2023-04-05 07:26:14'),
(8, 'Aysha Siddika', 'Rahim Molla', 'Nanu', '1921-03-27', '3219833022', 'Muladi', '01234567890', 'B+', 'Barishal', 'image/Aysha Siddika.jpg', '123', 'user', 'pending', 'pending', '2023-04-05 07:29:01'),
(9, 'Umma Habiba', 'Kazi shafiq', 'Alin', '2001-09-03', '3327453525', 'dhaka', '01234567890', 'B+', 'Dhaka', 'image/Umma Habiba.jpg', '123', 'user', 'Approved', 'pending', '2023-04-05 07:31:14'),
(10, 'Aysha Ahmed', 'Rohim Ahmed', 'Rokeya khanum', '1989-05-12', '3124590987', 'Dhaka', '01234567890', 'B+', 'Dhaka', 'image/Aysha Ahmed.jpg', '123', 'user', 'pending', 'pending', '2023-05-03 14:52:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basic`
--
ALTER TABLE `basic`
  ADD PRIMARY KEY (`SerialNo`);

--
-- Indexes for table `calculation`
--
ALTER TABLE `calculation`
  ADD PRIMARY KEY (`SerialNo`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`serialno`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`SerialNo`);

--
-- Indexes for table `earning`
--
ALTER TABLE `earning`
  ADD PRIMARY KEY (`SerialNo`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`serialno`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`serialno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`serialno`),
  ADD UNIQUE KEY `NIDNO` (`NIDNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basic`
--
ALTER TABLE `basic`
  MODIFY `SerialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `calculation`
--
ALTER TABLE `calculation`
  MODIFY `SerialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `serialno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `SerialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `earning`
--
ALTER TABLE `earning`
  MODIFY `SerialNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `serialno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `serialno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `serialno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
