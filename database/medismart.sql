-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 07:04 AM
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
-- Database: `medismart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'admin123', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(1, 'Medicine', 1, 1, 800, '2022-02-24', '6:00 PM', '2022-02-20 06:46:48', 1, 1, NULL),
(2, 'Medicine', 2, 2, 800, '2022-02-28', '10:00 PM', '2022-02-24 15:50:55', 1, 1, NULL),
(3, 'Nose-Ear-Throat', 3, 3, 600, '2022-02-28', '8:00 PM', '2022-02-24 15:51:57', 1, 1, NULL),
(4, 'Nose-Ear-Throat', 4, 4, 600, '2022-02-27', '11:00 PM', '2022-02-24 15:54:12', 1, 1, NULL),
(5, 'Medicine', 1, 1, 800, '2022-03-24', '11:00 PM', '2022-03-02 16:47:18', 1, 0, '2022-03-04 11:20:39'),
(6, 'Medicine', 1, 1, 800, '2022-03-24', '11:00 PM', '2022-03-02 17:21:04', 0, 1, '2022-03-02 17:21:13'),
(7, 'Medicine', 1, 1, 800, '2022-03-16', '5:30 PM', '2022-03-04 11:19:04', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `docgender` varchar(10) NOT NULL,
  `docdegree` varchar(255) NOT NULL,
  `address` longtext DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `practicedays` varchar(30) NOT NULL,
  `practicetime` varchar(30) NOT NULL,
  `contactno` varchar(13) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `profile_pic`, `docgender`, `docdegree`, `address`, `docFees`, `practicedays`, `practicetime`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Medicine', 'DR. MD. ZAKIR HOSSAIN', '1648101106_zakir.jpg', 'Male', 'MBBS, FCPS (Medicine)', 'Popular Diagnostic Centre Ltd. (Bogra Branch)', '800', 'Saturday - Thursday', '2pm - 5pm', '01778897931', 'zakir@gmail.com', '83f399ed140b122791b15f01b4b3d4e0', '2022-02-20 06:12:39', '2022-03-24 05:51:46'),
(2, 'Medicine', 'DR. MD. RAFIQUL ISLAM', '1648101120_rafiq.jpg', 'Male', 'FCPS (Medicine), MBBS', 'Popular Diagnostic Centre Ltd. (Bogra Branch)', '800', 'Saturday - Thursday', '6pm - 9pm', '01350897931', 'rafiqul@gmail.com', '3ab9cd9170823691d6734c0a80f82eb3', '2022-02-20 06:17:14', '2022-03-24 05:52:00'),
(3, 'Nose-Ear-Throat', 'Dr. Hasan Ali', '', 'Male', '', 'Popular Diagnostic Centre Ltd. (Bogra Branch)', '600', 'Friday', '6pm - 9pm', '01950777788', 'hasan@gmail.com', 'f690d3b8d4b51c1f189d886b7bab26b7', '2022-02-20 06:22:12', '2022-03-24 05:32:53'),
(4, 'Nose-Ear-Throat', 'MD. ABDUL GAFFAR', '', '', '', 'Popular Diagnostic Centre Ltd. (Bogra Branch)', '600', '', '', '01788897931', 'abdul@gmail.com', '428a78b4fee47253898d7918c0a09160', '2022-02-20 06:25:53', '2022-03-24 05:32:57'),
(5, 'Gynecologist', 'DR. SULTANA RAZIA', '1648101134_rajia.jpg', 'Female', '', 'Popular Diagnostic Centre Ltd. (Bogra Branch)', '600', 'Saturday - Thursday', '2pm - 5pm', '01333897931', 'sultana@gmail.com', '8c2a804932c40968823558dd3c81dc20', '2022-02-20 06:28:31', '2022-03-24 05:52:14'),
(6, 'Gynecologist', 'Dr. Mafruha Jahan', '1648101168_mafruha.jpg', 'Female', 'MBBS, FCPS (Gynecologist)', 'Popular Diagnostic Centre Ltd. (Bogra Branch)', '500', 'Saturday - Thursday', '10pm - 1am', '01368112255', 'mafruha@gmail.com', 'd083603d9b8a7858c57618ab478437e6', '2022-02-20 06:30:19', '2022-03-24 05:52:48'),
(7, 'Dentist', 'Dr. Alraji Rumman', '', '', '', 'Popular Diagnostic Centre Ltd. (Bogra Branch)', '500', '', '', '01950777736', 'alraji@gmail.com', '1422d9fc12aea8ba6545a63da06db7bd', '2022-02-24 16:00:16', NULL),
(8, 'Neurology', 'DR. MD. ZAKIRUL ISLAM', '', '', '', 'Popular Diagnostic Centre Ltd. (Bogra Branch)', '1000', '', '', '01733897931', 'zakirul@gmail.com', 'bba1de36c5c7b723949fca73f58ed7af', '2022-02-24 16:04:08', NULL),
(9, 'Cardiologist', 'Dr. Salim Rahman', '', '', '', 'Popular Diagnostic Centre Ltd. (Bogra Branch)', '1000', '', '', '01778897939', 'salim@gmail.com', '5c792ab5a27f615dc22f6732e29b1ee6', '2022-02-24 16:06:22', '2022-02-24 16:06:36'),
(10, 'Cardiologist', 'DR. MD. ARIF RAHMAN', '', '', '', 'Popular Diagnostic Centre Ltd. (Bogra Branch)', '600', '', '', '01778898888', 'arif@gmail.com', 'd53d757c0f838ea49fb46e09cbcc3cb1', '2022-02-24 16:08:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctorslog`
--

CREATE TABLE `doctorslog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorslog`
--

INSERT INTO `doctorslog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, NULL, 'mafruza@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-20 06:42:47', NULL, 0),
(2, 6, 'mafruha@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-20 06:43:12', '20-02-2022 12:13:39 PM', 1),
(3, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-20 06:44:08', '20-02-2022 01:05:22 PM', 1),
(4, 6, 'mafruha@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-23 18:55:04', '24-02-2022 12:28:16 AM', 1),
(5, NULL, 'tanvir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 10:08:27', NULL, 0),
(6, NULL, 'mafruza@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 10:57:42', NULL, 0),
(7, NULL, 'mafruza@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 10:58:00', NULL, 0),
(8, 6, 'mafruha@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 10:58:31', '24-02-2022 04:48:49 PM', 1),
(9, NULL, 'mafruha@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 11:40:52', NULL, 0),
(10, 6, 'mafruha@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 11:41:03', '24-02-2022 05:17:35 PM', 1),
(11, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-25 09:13:02', '25-02-2022 03:44:15 PM', 1),
(12, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-02 16:43:20', NULL, 1),
(13, NULL, 'jakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-04 11:07:16', NULL, 0),
(14, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-04 11:07:26', '04-03-2022 05:01:13 PM', 1),
(15, NULL, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-07 05:47:49', NULL, 0),
(16, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-07 05:48:12', NULL, 1),
(17, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-09 15:19:37', '09-03-2022 08:54:30 PM', 1),
(18, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-10 02:56:41', '10-03-2022 08:54:02 AM', 1),
(19, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-10 10:46:23', '10-03-2022 04:26:50 PM', 1),
(20, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-10 10:58:25', '10-03-2022 04:29:23 PM', 1),
(21, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-10 11:49:06', '10-03-2022 05:27:15 PM', 1),
(22, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-13 15:47:08', '13-03-2022 09:17:49 PM', 1),
(23, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-17 07:22:10', '17-03-2022 01:33:18 PM', 1),
(24, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-24 03:41:41', '24-03-2022 10:07:16 AM', 1),
(25, 13, 'tanvir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-24 04:37:32', '24-03-2022 10:07:44 AM', 1),
(26, 13, 'tanvir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-24 04:38:22', '24-03-2022 10:17:54 AM', 1),
(27, 1, 'zakir@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-24 05:42:46', '24-03-2022 11:18:43 AM', 1),
(28, NULL, 'admin', 0x3a3a3100000000000000000000000000, '2022-03-24 05:48:53', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist', '2022-02-20 05:51:23', NULL),
(2, 'General Physician\r\n', '2022-02-20 05:51:23', NULL),
(3, 'Dermatologist', '2022-02-20 05:51:23', NULL),
(4, 'Homeopath', '2022-02-20 05:51:23', NULL),
(5, 'Ayurveda', '2022-02-20 05:51:23', NULL),
(6, 'Dentist', '2022-02-20 05:51:23', NULL),
(7, 'Nose-Ear-Throat', '2022-02-20 05:51:23', NULL),
(8, 'Bones Specialist', '2022-02-20 05:51:23', NULL),
(9, 'Medicine', '2022-02-20 06:00:42', NULL),
(10, 'Gastroenterology', '2022-02-20 06:01:47', NULL),
(11, 'Hepatology', '2022-02-20 06:02:11', '2022-02-20 06:02:33'),
(12, 'Cardiologist', '2022-02-20 06:03:27', NULL),
(13, 'Neurology', '2022-02-20 06:04:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` varchar(13) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'Muntasir Ahmed', 'muntasir@gmail.com', '01555-222333', ' Hello, I previously registered on the system. But now I am facing problem to sign in again. Please check the issue and inform me.', '2022-02-20 07:29:00', '55', '2022-03-02 17:30:13', 1),
(2, 'Muntasir Ahmed', 'demo@gmail.com', '01789999999', ' Hello', '2022-03-02 17:31:12', '555', '2022-03-02 17:32:21', 1),
(3, 'Afiya', 'demo2@gmail.com', '01789999998', 'HHHHHHHHHH ', '2022-03-02 17:31:52', 'ok', '2022-03-02 17:32:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(1, 1, '120/80', '4.7', '55', '102', 'Remdesivir  - 0 + 0 + 1,\r\nTake rest, Sound sleep', '2022-02-20 07:19:55'),
(2, 2, '140/80', '5.6', '53', '98', 'Medicine Doges', '2022-03-04 11:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` varchar(13) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(1, 1, 'Afiya Humyra', '01788996633', 'afiya@gmail.com', 'Female', 'Khandar, Bogura', 23, 'Fatigue, Cough, Headache, Fever', '2022-02-20 06:58:01', '2022-03-04 11:14:38'),
(2, 1, 'Afiya Humyra', '01555555554', 'afiya@gmail.com', 'Male', 'Bogura', 25, 'Something', '2022-03-04 11:13:59', '2022-03-17 07:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'afiya@gmail.com', 0x3132372e302e302e3100000000000000, '2022-02-20 06:46:22', '20-02-2022 12:52:03 PM', 1),
(2, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-23 18:50:04', '24-02-2022 12:22:52 AM', 1),
(3, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-23 18:53:16', NULL, 1),
(4, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-23 18:54:02', '24-02-2022 12:24:12 AM', 1),
(5, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-23 18:59:58', '24-02-2022 12:37:43 AM', 1),
(6, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 02:50:40', NULL, 1),
(7, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 03:51:27', NULL, 1),
(8, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 04:12:46', '24-02-2022 09:45:03 AM', 1),
(9, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 04:15:22', '24-02-2022 09:48:50 AM', 1),
(10, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 04:19:12', NULL, 1),
(13, 1, 'afiya@gmail.com', 0x3132372e302e302e3100000000000000, '2022-02-24 04:26:56', '24-02-2022 10:14:59 AM', 1),
(14, 1, 'afiya@gmail.com', 0x3132372e302e302e3100000000000000, '2022-02-24 11:05:28', NULL, 1),
(15, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 11:19:12', '24-02-2022 05:09:52 PM', 1),
(16, 2, 'sahela@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 15:49:59', '24-02-2022 09:21:11 PM', 1),
(17, 3, 'sadek@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 15:51:33', '24-02-2022 09:23:03 PM', 1),
(18, 4, 'rifat@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-24 15:53:22', '24-02-2022 09:24:16 PM', 1),
(19, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-02-25 09:09:55', '25-02-2022 02:42:04 PM', 1),
(20, 1, 'afiya@gmail.com', 0x3132372e302e302e3100000000000000, '2022-03-02 16:45:33', '02-03-2022 11:00:36 PM', 1),
(21, 1, 'afiya@gmail.com', 0x3132372e302e302e3100000000000000, '2022-03-04 11:08:27', NULL, 1),
(22, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-10 03:24:34', '10-03-2022 08:54:44 AM', 1),
(23, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-10 03:25:12', '10-03-2022 09:09:12 AM', 1),
(24, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-10 10:26:46', '10-03-2022 03:57:17 PM', 1),
(25, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-10 11:01:36', '10-03-2022 04:41:25 PM', 1),
(26, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-13 15:48:02', '13-03-2022 09:19:15 PM', 1),
(27, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-17 07:13:55', '17-03-2022 12:48:21 PM', 1),
(28, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-24 05:00:07', '24-03-2022 10:53:26 AM', 1),
(29, 1, 'afiya@gmail.com', 0x3a3a3100000000000000000000000000, '2022-03-24 05:23:49', '24-03-2022 10:58:12 AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `address` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `profile_pic`, `address`, `city`, `gender`, `email`, `password`, `regDate`, `updationDate`) VALUES
(1, 'Afiya Humyra', '1648099395_afiya.jpg', 'Khandar', 'Bogura', 'female', 'afiya@gmail.com', '97d18c1b8a8579f31a6f1ac3b15fb671', '2022-02-20 06:46:03', '2022-03-24 05:23:15'),
(2, 'Sahela Rahman', '', 'Baghopara', 'Bogra', 'female', 'sahela@gmail.com', 'a6b9746d9ff79a5941b4071e8e75ae83', '2022-02-24 14:55:24', '2022-02-24 15:28:42'),
(3, 'Sadek Islam', '', 'Shahjahanpur', 'Bogra', 'male', 'sadek@gmail.com', '076c6ec6edcc4f195a113cfbdf7036ea', '2022-02-24 15:00:40', '2022-02-24 15:28:56'),
(4, 'Rifat Habib', '', 'Satmatha', 'Bogra', 'male', 'rifat@gmail.com', '2e1e5ce47d4b17e67b3d6b01edc01efc', '2022-02-24 15:03:07', '2022-02-24 15:29:01'),
(5, 'Nira Fahmida', '', 'Thengamara', 'Bogra', 'female', 'nira@gmail.com', '52ebe237c42891d907901b721e245230', '2022-02-24 15:04:47', '2022-02-24 15:29:06'),
(6, 'Azfar Habib', '', 'Chunarughat', 'Sylhet', 'male', 'azfar@gmail.com', '0d1f613511c190a795a29787c293ec3d', '2022-02-24 15:08:27', NULL),
(7, 'Lina Tazalla', '', 'Pirgacha', 'Rangpur', 'female', 'lina@gmail.com', '528a3c500e49e8d14159dd2935ee36a1', '2022-02-24 15:17:27', NULL),
(8, 'Rashi Rokshana', '', 'Satmatha', 'Bogra', 'female', 'rashi@gmail.com', '10d0688cd80691eb06fd912793332c46', '2022-02-24 15:18:38', NULL),
(9, 'Mitu Akter', '', 'TMSS', 'Bogra', 'female', 'mitu@gmail.com', '9773461275d220d470e42d0113695e36', '2022-02-24 15:19:41', NULL),
(10, 'Marina Naznin', '', 'TMSS', 'Bogra', 'female', 'marina@gmail.com', '4bf541f9d353914327dd963461e8677c', '2022-02-24 15:20:34', NULL),
(11, 'Suhi Akter', '', 'Satmatha', 'Bogra', 'female', 'suhi@gmail.com', '31217d1e304aeadb5ae682be76729ff3', '2022-02-24 15:21:36', NULL),
(12, 'Sabrina Sultana', '', 'TMSS', 'Bogra', 'female', 'sabrina@gmail.com', '67fc4ee9d64a4fee0f99ad4b65a95074', '2022-02-24 15:23:21', NULL),
(13, 'Asmaul Husna', '', 'Satmatha', 'Bogra', 'female', 'asmaul@gmail.com', 'ae4650418ffc4ce527361e207bfb23ad', '2022-02-24 15:24:26', NULL),
(14, 'Mohaiminul Islam', '', 'Shahjahanpur', 'Bogra', 'male', 'mohaiminul@gmail.com', 'ad6ddfa7d2fcefc4b49cea43b769215d', '2022-02-24 15:25:58', NULL),
(15, 'Sadiq Islam', '', 'Kalimondir', 'Bogra', 'male', 'sadiq@gmail.com', '61785a8e996a36a23d1b346e28f5f816', '2022-02-24 15:26:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorslog`
--
ALTER TABLE `doctorslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctorslog`
--
ALTER TABLE `doctorslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
