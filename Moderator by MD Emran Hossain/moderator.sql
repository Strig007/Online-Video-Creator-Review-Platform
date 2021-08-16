-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2021 at 11:56 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moderator`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(70) NOT NULL,
  `Picture` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`Name`, `Email`, `User_Name`, `Password`, `Dob`, `Gender`, `Picture`) VALUES
('Arfanul Kabir', 'arfanul@gmail.com', 'apurbo123', 'apurbo123', '1998-12-07', 'male', 'DSC_0881-02.jpg.jpeg'),
('sdsd dcdcd', 'cdcd@ggfg.vomm', 'zxcv1234', 'zxcv1234', '1998-12-24', 'male', 'employee1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `moderator_info`
--

CREATE TABLE `moderator_info` (
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(70) NOT NULL,
  `Picture` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moderator_info`
--

INSERT INTO `moderator_info` (`Name`, `Email`, `User_Name`, `Password`, `Dob`, `Gender`, `Picture`) VALUES
('abbas dfd', 'cdcd@ggfg.vomm', 'abbas1234', 'abbas1234', '1998-12-14', 'male', 'DSC_0881-02.jpg.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `Name` varchar(70) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `User_Name` varchar(70) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(70) NOT NULL,
  `Balance` int(20) NOT NULL,
  `Picture` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`Name`, `Email`, `User_Name`, `Password`, `Dob`, `Gender`, `Balance`, `Picture`) VALUES
('cdscdcdc efefef', 'dfdsfdf@fdf.com', 'abbas123', 'abbas123', '1998-12-22', 'male', 0, NULL),
('Arfanul Kabir', 'apurbo6@gmail.com', 'Apurbo123', 'Apurbo123', '1997-07-06', 'Male', 0, NULL),
('sdsdasdd', 'sdsdsadsd@cfgfgf.com', 'dfdcdcdcd', 'dcdcdcdcdcd', '2000-02-03', 'male', 0, NULL),
('Abbas', 'gachoo@gmail.com', 'gachoo123', 'gachoo123', '1997-07-07', 'Male', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`User_Name`),
  ADD UNIQUE KEY `Emp_User_Name` (`User_Name`),
  ADD UNIQUE KEY `Emp_Email` (`Email`);

--
-- Indexes for table `moderator_info`
--
ALTER TABLE `moderator_info`
  ADD PRIMARY KEY (`User_Name`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_Name`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `User_Name` (`User_Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
