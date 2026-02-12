-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 07:48 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etmsdb`
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
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555558, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-10-11 04:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `ID` int(5) NOT NULL,
  `DepartmentName` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`ID`, `DepartmentName`, `CreationDate`) VALUES
(1, 'HR', '2022-03-15 06:59:06'),
(2, 'Logistics', '2022-03-15 07:34:38'),
(3, 'Technical', '2022-03-15 07:34:48'),
(4, 'Accounts', '2022-03-15 07:34:58'),
(5, 'Testing', '2022-03-15 07:35:08'),
(6, 'Operations', '2022-03-15 07:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `ID` int(5) NOT NULL,
  `DepartmentID` int(5) DEFAULT NULL,
  `EmpId` varchar(100) DEFAULT NULL,
  `EmpName` varchar(200) DEFAULT NULL,
  `EmpEmail` varchar(200) DEFAULT NULL,
  `EmpContactNumber` bigint(10) DEFAULT NULL,
  `Designation` varchar(200) DEFAULT NULL,
  `EmpDateofbirth` date DEFAULT NULL,
  `EmpAddress` varchar(250) DEFAULT NULL,
  `EmpDateofjoining` date DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `ProfilePic` varchar(250) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`ID`, `DepartmentID`, `EmpId`, `EmpName`, `EmpEmail`, `EmpContactNumber`, `Designation`, `EmpDateofbirth`, `EmpAddress`, `EmpDateofjoining`, `Description`, `Password`, `ProfilePic`, `CreationDate`, `UpdationDate`) VALUES
(2, 1, 'Emp101', 'guyyu', 'g@gmail.com', 7894561236, 'jhgj', '2005-01-09', 'H-90 New Delhi', '2022-03-09', 'NA', '202cb962ac59075b964b07152d234b70', '18774bd590aa11e3cea58208eb5b52031647405444.jpg', '2022-03-15 12:23:03', '2022-03-24 18:52:37'),
(3, 2, 'Emp102', 'Mahesh Kaur', 'mah@gmail.com', 7894561236, 'Sr. Manager', '1987-08-06', 'K-90, Govindpuram, Ghaziabad', '2020-09-09', 'NA', '202cb962ac59075b964b07152d234b70', '18774bd590aa11e3cea58208eb5b52031647347253.jpg', '2022-03-15 12:27:33', NULL),
(4, 3, 'Emp103', 'Abir Singh', 'abir@gmail.com', 7987987987, 'Sofware Developer', '1996-06-06', 'L-780, Vasantkunj New Delhi', '2021-02-01', '', '202cb962ac59075b964b07152d234b70', '18774bd590aa11e3cea58208eb5b52031647347360.jpg', '2022-03-15 12:29:20', NULL),
(5, 4, '10806121', 'Anuj kumar', 'ak@gmail.com', 1234567890, 'Accountant', '2002-01-01', 'H 343 ABC SCoitey Noida UP201301', '2022-03-01', 'NA', 'f925916e2754e5e03f75dd58a5733251', '1bb87d41d15fe27b500a4bfcde01bb0e1648275105.png', '2022-03-26 06:11:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '                                                                                 Employee Task Management System\r\nWelcome to about Us page', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '890,Sector 62, Gyan Sarovar, GAIL Noida(Delhi/NCR)', 'taskinfo@gmail.com', 7896541239, NULL, '10:30 am to 7:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbltask`
--

CREATE TABLE `tbltask` (
  `ID` int(5) NOT NULL,
  `DeptID` int(5) DEFAULT NULL,
  `AssignTaskto` int(5) DEFAULT NULL,
  `TaskPriority` varchar(100) DEFAULT NULL,
  `TaskTitle` varchar(250) DEFAULT NULL,
  `TaskDescription` mediumtext DEFAULT NULL,
  `TaskEnddate` date DEFAULT NULL,
  `TaskAssigndate` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(200) DEFAULT NULL,
  `WorkCompleted` varchar(250) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltask`
--

INSERT INTO `tbltask` (`ID`, `DeptID`, `AssignTaskto`, `TaskPriority`, `TaskTitle`, `TaskDescription`, `TaskEnddate`, `TaskAssigndate`, `Status`, `WorkCompleted`, `Remark`, `UpdationDate`) VALUES
(1, 1, 2, 'Medium', 'Candidate Hiring', 'Approx 100 candidate will come to interview.', '2022-03-18', '2022-03-16 07:12:32', 'Completed', '100', 'Task Completed', NULL),
(3, 3, 4, 'Most Urgent', 'Develop project', 'Project Title: Employees hgfghfuyvuytuyuyiui\r\nghdfdhdhcfbugsuytcbucubter\r\nycrbcetfoyxwieyiuctrywui\r\nbtuuurcuewbcyreiufi\r\nbitooiyuuncrewourwetiurou\r\n', '2022-03-26', '2022-03-22 12:15:22', 'Completed', '100', 'Task Completed', NULL),
(4, 1, 2, 'Urgent', 'Hiring of a Software Developer', 'Hire a  Software Developer\r\nSkills Required PHP, MySQL', '2022-04-05', '2022-03-26 06:05:55', 'Inprogress', '20', 'Interview Going on', NULL),
(5, 4, 5, 'Most Urgent', 'Prepare Bill For Laptop', 'Create bill for laptop', '2022-03-29', '2022-03-26 06:12:55', 'Completed', '100', 'Bill Prepared', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbltasktracking`
--

CREATE TABLE `tbltasktracking` (
  `ID` int(10) NOT NULL,
  `TaskID` int(10) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `WorkCompleted` varchar(200) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltasktracking`
--

INSERT INTO `tbltasktracking` (`ID`, `TaskID`, `Remark`, `Status`, `WorkCompleted`, `UpdationDate`) VALUES
(1, 1, 'Work is in progress', 'Inprogress', '65', '2022-03-20 18:30:00'),
(2, 1, 'Task Completed', 'Completed', '100', '2022-03-20 18:30:00'),
(3, 3, 'Task is inprogress', 'Inprogress', '60', '2022-03-23 05:24:25'),
(4, 3, 'Task Completed', 'Completed', '100', '2022-03-23 05:28:14'),
(5, 4, 'Interview Going on', 'Inprogress', '20', '2022-03-26 06:07:29'),
(6, 5, 'Preparing the bill', 'Inprogress', '50', '2022-03-26 06:13:52'),
(7, 5, 'Bill Prepared', 'Completed', '100', '2022-03-26 06:14:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltask`
--
ALTER TABLE `tbltask`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltasktracking`
--
ALTER TABLE `tbltasktracking`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbltask`
--
ALTER TABLE `tbltask`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbltasktracking`
--
ALTER TABLE `tbltasktracking`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
