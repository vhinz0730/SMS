-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2024 at 10:01 PM
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
-- Database: `db_sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(4, 'vincent', 'admin@gmail.com', 'vincent');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `instructor_email` varchar(255) DEFAULT NULL,
  `instructor_password` varchar(255) DEFAULT NULL,
  `instructor_phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `fname`, `lname`, `instructor_email`, `instructor_password`, `instructor_phone`) VALUES
(19, 'vincent', 'gallarde', 'vincent@gmail.com', 'vincent', '09851327080'),
(20, 'lissy', 'gallarde', 'lissy@gmail.com', 'lissy', '09322320218'),
(21, 'ailana', 'gallarde', 'ailana@gmail.com', 'ailana', '09434330219');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sent_by` varchar(255) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sent_by`, `received_by`, `message`, `createdAt`, `status`) VALUES
(86, 'marley@gmail.com', 'vincent@gmail.com', 'hey', '2024-01-10 07:03:32am', 'read'),
(87, 'marley@gmail.com', 'vincent@gmail.com', '123', '2024-01-10 07:03:54am', 'read'),
(88, 'marley@gmail.com', 'ailana@gmail.com', 'hi', '2024-01-11 07:03:38am', 'read'),
(89, 'ailana@gmail.com', 'marley@gmail.com', 'hello', '2024-01-11 07:05:34am', 'read'),
(90, 'marley@gmail.com', 'lissy@gmail.com', 'hi', '2024-01-11 07:23:42am', 'unread'),
(91, 'marley@gmail.com', 'ailana@gmail.com', 'hey', '2024-01-11 10:40:31am', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `fname` varchar(25) NOT NULL,
  `mname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `student_password` varchar(255) DEFAULT NULL,
  `student_address` varchar(255) DEFAULT NULL,
  `student_birthdate` date DEFAULT NULL,
  `student_phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_email`, `fname`, `mname`, `lname`, `student_password`, `student_address`, `student_birthdate`, `student_phone`) VALUES
(29, 'joshua@gmail.com', 'joshua', 'mark', 'catal', 'vincent', '', '1995-03-20', '09334221345'),
(45, 'johny@gmail.com', 'Johny', 'Tabar', 'Illanan', '1234', NULL, '2000-02-11', NULL),
(46, 'mark@gmail.com', 'Mark', 'Gallarde', 'Catal', '1234', NULL, '1999-04-21', NULL),
(47, 'kent@gmail.com', 'Kent', 'Sagang', 'Dilina', '1234', NULL, '2001-02-12', NULL),
(48, 'marley@gmail.com', 'Marley', 'Bosboso', 'Laray', '1234', NULL, '2001-09-21', NULL),
(49, 'Cynthia@gmail.com', ' Cynthia', 'almento', 'Sagang', '1234', NULL, '2003-07-14', NULL),
(50, 'raymond@gmail.com', 'raymond', 'lasal', 'pwerto', '1234', NULL, '1999-05-21', NULL),
(51, 'john@gmail.com', 'john', 'hernandes', 'gomes', '1234', NULL, '1996-01-30', NULL),
(52, 'jane@gmail.com', 'jane', 'fernandes', 'reyes', '1234', NULL, '1996-11-28', NULL),
(53, 'junjun@gmail.com', 'junjun', 'tapil', 'poler', '1234', NULL, '1996-05-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `instructor_id` varchar(25) NOT NULL,
  `code` varchar(25) NOT NULL,
  `subject_name` varchar(25) NOT NULL,
  `description` varchar(25) NOT NULL,
  `unit` varchar(1) NOT NULL,
  `time` varchar(25) NOT NULL,
  `day` varchar(25) NOT NULL,
  `room` varchar(8) NOT NULL,
  `courseCode` varchar(25) NOT NULL,
  `instructor` varchar(25) NOT NULL,
  `yr_lvl` varchar(25) NOT NULL,
  `section` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `instructor_id`, `code`, `subject_name`, `description`, `unit`, `time`, `day`, `room`, `courseCode`, `instructor`, `yr_lvl`, `section`) VALUES
(60, '21', 'BU433', 'Business', 'Accounting', '3', '8:30am-9:30am', 'mwf', '101', 'bu433_business', 'ailana gallarde', 'FIRSTYEAR', 'A'),
(61, '21', 'CS221', 'ComputerScience', 'Animation', '3', '9:30am-11:30am', 'monday', '103', 'cs221_computerscience', 'ailana gallarde', 'FIRSTYEAR', 'A'),
(62, '21', 'GE303', 'English', 'Creativewriting', '3', '1:00pm-2:00pm', 'tf', '101', 'ge303_english', 'ailana gallarde', 'SECONDYEAR', 'A'),
(63, '21', 'GE213', 'Math', 'Algebra1', '3', '4:00pm-5:00pm', 'mwf', '202', 'ge213_math', 'ailana gallarde', 'SECONDYEAR', 'A'),
(64, '20', 'GE412', 'Science', 'Integrated', '3', '1:00pm-2:00pm', 'mwf', '102', 'ge412_science', 'lissy gallarde', 'FIRSTYEAR', 'A'),
(65, '20', 'PE301', 'PEI', 'Aerobics', '3', '3:00pm-5:00pm', 'mwf', '102', 'pe301_pei', 'lissy gallarde', 'FIRSTYEAR', 'A'),
(66, '20', 'SOC441', 'SocialStudies', 'CurrentEvents', '3', '8:30am-9:30am', 'tf', '102', 'soc441_socialstudies', 'lissy gallarde', 'SECONDYEAR', 'A'),
(67, '20', 'GE338', 'History', 'PhilippineHistory', '3', '1:00pm-4:00pm', 'tue', '102', 'ge338_history', 'lissy gallarde', 'SECONDYEAR', 'A'),
(68, '19', 'ART142', 'PerformingArts', 'Musictheory', '3', '1:00pm-5:00pm', 'fri', 'AVR', 'art142_performingarts', 'vincent gallarde', 'FIRSTYEAR', 'A'),
(69, '19', 'GE221', 'Math', 'Integratedmath', '3', '1:00pm-4:00pm', 'tth', '303', 'ge221_math', 'vincent gallarde', 'FIRSTYEAR', 'A'),
(70, '19', 'GE331', 'Math', 'Calculus', '3', '9:00am-11:am', 'sat-sun', '101', 'ge331_math', 'vincent gallarde', 'SECONDYEAR', 'A'),
(71, '19', 'GE112', 'Math', 'ComputerMath', '3', '1:00pm-5:00pm', 'sat-sun', '101', 'ge112_math', 'vincent gallarde', 'SECONDYEAR', 'A'),
(72, '19', 'GE113', 'Filipino', 'pagbasaatpagsulat', '3', '9:00am-10:00am', 'mwf', '301', 'ge113_filipino', 'vincent gallarde', 'SECONDYEAR', 'B'),
(73, '21', 'GE115', 'History', 'ReadingOfPhilippineHistor', '3', '9:00am-11:am', 'thursday', '101', 'ge115_history', 'ailana gallarde', 'SECONDYEAR', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `student_id` varchar(25) NOT NULL,
  `subject_id` varchar(25) NOT NULL,
  `instructor_id` varchar(25) NOT NULL,
  `code` varchar(25) NOT NULL,
  `subject_name` varchar(25) NOT NULL,
  `description` varchar(25) NOT NULL,
  `unit` varchar(25) NOT NULL,
  `time` varchar(25) NOT NULL,
  `day` varchar(25) NOT NULL,
  `room` varchar(25) NOT NULL,
  `courseCode` varchar(25) NOT NULL,
  `instructor` varchar(25) NOT NULL,
  `yr_lvl` varchar(25) NOT NULL,
  `section` varchar(25) NOT NULL,
  `student` varchar(50) NOT NULL,
  `first` int(11) NOT NULL,
  `second` int(11) NOT NULL,
  `third` int(11) NOT NULL,
  `fourth` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `student_id`, `subject_id`, `instructor_id`, `code`, `subject_name`, `description`, `unit`, `time`, `day`, `room`, `courseCode`, `instructor`, `yr_lvl`, `section`, `student`, `first`, `second`, `third`, `fourth`, `final`, `status`) VALUES
(127, '53', '60', '21', 'BU433', 'Business', 'Accounting', '3', '8:30am-9:30am', 'mwf', '101', 'bu433_business', 'ailana gallarde', 'FIRSTYEAR', 'A', 'junjun poler', 0, 0, 0, 0, 0, 'go'),
(128, '53', '61', '21', 'CS221', 'ComputerScience', 'Animation', '3', '9:30am-11:30am', 'monday', '103', 'cs221_computerscience', 'ailana gallarde', 'FIRSTYEAR', 'A', 'junjun poler', 0, 0, 0, 0, 0, 'go'),
(129, '53', '65', '20', 'PE301', 'PEI', 'Aerobics', '3', '3:00pm-5:00pm', 'mwf', '102', 'pe301_pei', 'lissy gallarde', 'FIRSTYEAR', 'A', 'junjun poler', 0, 0, 0, 0, 0, 'go'),
(130, '53', '64', '20', 'GE412', 'Science', 'Integrated', '3', '1:00pm-2:00pm', 'mwf', '102', 'ge412_science', 'lissy gallarde', 'FIRSTYEAR', 'A', 'junjun poler', 0, 0, 0, 0, 0, 'go'),
(131, '53', '69', '19', 'GE221', 'Math', 'Integratedmath', '3', '1:00pm-4:00pm', 'tth', '303', 'ge221_math', 'vincent gallarde', 'FIRSTYEAR', 'A', 'junjun poler', 95, 0, 0, 0, 95, 'go'),
(132, '53', '68', '19', 'ART142', 'PerformingArts', 'Musictheory', '3', '1:00pm-5:00pm', 'fri', 'AVR', 'art142_performingarts', 'vincent gallarde', 'FIRSTYEAR', 'A', 'junjun poler', 0, 0, 0, 0, 0, 'go'),
(133, '52', '60', '21', 'BU433', 'Business', 'Accounting', '3', '8:30am-9:30am', 'mwf', '101', 'bu433_business', 'ailana gallarde', 'FIRSTYEAR', 'A', 'jane reyes', 0, 0, 0, 0, 0, 'go'),
(134, '52', '61', '21', 'CS221', 'ComputerScience', 'Animation', '3', '9:30am-11:30am', 'monday', '103', 'cs221_computerscience', 'ailana gallarde', 'FIRSTYEAR', 'A', 'jane reyes', 0, 0, 0, 0, 0, 'go'),
(135, '52', '65', '20', 'PE301', 'PEI', 'Aerobics', '3', '3:00pm-5:00pm', 'mwf', '102', 'pe301_pei', 'lissy gallarde', 'FIRSTYEAR', 'A', 'jane reyes', 0, 0, 0, 0, 0, 'go'),
(136, '52', '64', '20', 'GE412', 'Science', 'Integrated', '3', '1:00pm-2:00pm', 'mwf', '102', 'ge412_science', 'lissy gallarde', 'FIRSTYEAR', 'A', 'jane reyes', 0, 0, 0, 0, 0, 'go'),
(137, '52', '69', '19', 'GE221', 'Math', 'Integratedmath', '3', '1:00pm-4:00pm', 'tth', '303', 'ge221_math', 'vincent gallarde', 'FIRSTYEAR', 'A', 'jane reyes', 75, 0, 0, 0, 19, 'go'),
(138, '52', '68', '19', 'ART142', 'PerformingArts', 'Musictheory', '3', '1:00pm-5:00pm', 'fri', 'AVR', 'art142_performingarts', 'vincent gallarde', 'FIRSTYEAR', 'A', 'jane reyes', 0, 0, 0, 0, 0, 'go'),
(139, '51', '68', '19', 'ART142', 'PerformingArts', 'Musictheory', '3', '1:00pm-5:00pm', 'fri', 'AVR', 'art142_performingarts', 'vincent gallarde', 'FIRSTYEAR', 'A', 'john gomes', 0, 0, 0, 0, 0, 'go'),
(140, '51', '69', '19', 'GE221', 'Math', 'Integratedmath', '3', '1:00pm-4:00pm', 'tth', '303', 'ge221_math', 'vincent gallarde', 'FIRSTYEAR', 'A', 'john gomes', 0, 0, 0, 0, 0, 'go'),
(141, '51', '64', '20', 'GE412', 'Science', 'Integrated', '3', '1:00pm-2:00pm', 'mwf', '102', 'ge412_science', 'lissy gallarde', 'FIRSTYEAR', 'A', 'john gomes', 0, 0, 0, 0, 0, 'go'),
(142, '51', '65', '20', 'PE301', 'PEI', 'Aerobics', '3', '3:00pm-5:00pm', 'mwf', '102', 'pe301_pei', 'lissy gallarde', 'FIRSTYEAR', 'A', 'john gomes', 0, 0, 0, 0, 0, 'go'),
(143, '51', '61', '21', 'CS221', 'ComputerScience', 'Animation', '3', '9:30am-11:30am', 'monday', '103', 'cs221_computerscience', 'ailana gallarde', 'FIRSTYEAR', 'A', 'john gomes', 0, 0, 0, 0, 0, 'go'),
(144, '51', '60', '21', 'BU433', 'Business', 'Accounting', '3', '8:30am-9:30am', 'mwf', '101', 'bu433_business', 'ailana gallarde', 'FIRSTYEAR', 'A', 'john gomes', 0, 0, 0, 0, 0, 'go'),
(145, '29', '60', '21', 'BU433', 'Business', 'Accounting', '3', '8:30am-9:30am', 'mwf', '101', 'bu433_business', 'ailana gallarde', 'FIRSTYEAR', 'A', 'joshua catal', 0, 0, 0, 0, 0, 'go'),
(146, '29', '61', '21', 'CS221', 'ComputerScience', 'Animation', '3', '9:30am-11:30am', 'monday', '103', 'cs221_computerscience', 'ailana gallarde', 'FIRSTYEAR', 'A', 'joshua catal', 0, 0, 0, 0, 0, 'go'),
(147, '29', '65', '20', 'PE301', 'PEI', 'Aerobics', '3', '3:00pm-5:00pm', 'mwf', '102', 'pe301_pei', 'lissy gallarde', 'FIRSTYEAR', 'A', 'joshua catal', 0, 0, 0, 0, 0, 'go'),
(148, '29', '64', '20', 'GE412', 'Science', 'Integrated', '3', '1:00pm-2:00pm', 'mwf', '102', 'ge412_science', 'lissy gallarde', 'FIRSTYEAR', 'A', 'joshua catal', 0, 0, 0, 0, 0, 'go'),
(149, '29', '69', '19', 'GE221', 'Math', 'Integratedmath', '3', '1:00pm-4:00pm', 'tth', '303', 'ge221_math', 'vincent gallarde', 'FIRSTYEAR', 'A', 'joshua catal', 0, 0, 0, 0, 0, 'go'),
(150, '29', '68', '19', 'ART142', 'PerformingArts', 'Musictheory', '3', '1:00pm-5:00pm', 'fri', 'AVR', 'art142_performingarts', 'vincent gallarde', 'FIRSTYEAR', 'A', 'joshua catal', 0, 0, 0, 0, 0, 'go'),
(151, '45', '68', '19', 'ART142', 'PerformingArts', 'Musictheory', '3', '1:00pm-5:00pm', 'fri', 'AVR', 'art142_performingarts', 'vincent gallarde', 'FIRSTYEAR', 'A', 'Johny Illanan', 0, 0, 0, 0, 0, 'go'),
(152, '45', '69', '19', 'GE221', 'Math', 'Integratedmath', '3', '1:00pm-4:00pm', 'tth', '303', 'ge221_math', 'vincent gallarde', 'FIRSTYEAR', 'A', 'Johny Illanan', 0, 0, 0, 0, 0, 'go'),
(153, '45', '64', '20', 'GE412', 'Science', 'Integrated', '3', '1:00pm-2:00pm', 'mwf', '102', 'ge412_science', 'lissy gallarde', 'FIRSTYEAR', 'A', 'Johny Illanan', 0, 0, 0, 0, 0, 'go'),
(154, '45', '65', '20', 'PE301', 'PEI', 'Aerobics', '3', '3:00pm-5:00pm', 'mwf', '102', 'pe301_pei', 'lissy gallarde', 'FIRSTYEAR', 'A', 'Johny Illanan', 0, 0, 0, 0, 0, 'go'),
(155, '45', '61', '21', 'CS221', 'ComputerScience', 'Animation', '3', '9:30am-11:30am', 'monday', '103', 'cs221_computerscience', 'ailana gallarde', 'FIRSTYEAR', 'A', 'Johny Illanan', 0, 0, 0, 0, 0, 'go'),
(156, '45', '60', '21', 'BU433', 'Business', 'Accounting', '3', '8:30am-9:30am', 'mwf', '101', 'bu433_business', 'ailana gallarde', 'FIRSTYEAR', 'A', 'Johny Illanan', 0, 0, 0, 0, 0, 'go'),
(157, '46', '62', '21', 'GE303', 'English', 'Creativewriting', '3', '1:00pm-2:00pm', 'tf', '101', 'ge303_english', 'ailana gallarde', 'SECONDYEAR', 'A', 'Mark Catal', 89, 86, 84, 85, 86, 'go'),
(158, '46', '63', '21', 'GE213', 'Math', 'Algebra1', '3', '4:00pm-5:00pm', 'mwf', '202', 'ge213_math', 'ailana gallarde', 'SECONDYEAR', 'A', 'Mark Catal', 95, 93, 91, 75, 89, 'go'),
(159, '46', '66', '20', 'SOC441', 'SocialStudies', 'CurrentEvents', '3', '8:30am-9:30am', 'tf', '102', 'soc441_socialstudies', 'lissy gallarde', 'SECONDYEAR', 'A', 'Mark Catal', 0, 0, 0, 0, 0, 'go'),
(160, '46', '67', '20', 'GE338', 'History', 'PhilippineHistory', '3', '1:00pm-4:00pm', 'tue', '102', 'ge338_history', 'lissy gallarde', 'SECONDYEAR', 'A', 'Mark Catal', 0, 0, 0, 0, 0, 'go'),
(161, '46', '71', '19', 'GE112', 'Math', 'ComputerMath', '3', '1:00pm-5:00pm', 'sat-sun', '101', 'ge112_math', 'vincent gallarde', 'SECONDYEAR', 'A', 'Mark Catal', 89, 87, 86, 93, 89, 'go'),
(162, '46', '70', '19', 'GE331', 'Math', 'Calculus', '3', '9:00am-11:am', 'sat-sun', '101', 'ge331_math', 'vincent gallarde', 'SECONDYEAR', 'A', 'Mark Catal', 0, 0, 0, 0, 0, 'go'),
(163, '47', '70', '19', 'GE331', 'Math', 'Calculus', '3', '9:00am-11:am', 'sat-sun', '101', 'ge331_math', 'vincent gallarde', 'SECONDYEAR', 'A', 'Kent Dilina', 0, 0, 0, 0, 0, 'go'),
(164, '47', '71', '19', 'GE112', 'Math', 'ComputerMath', '3', '1:00pm-5:00pm', 'sat-sun', '101', 'ge112_math', 'vincent gallarde', 'SECONDYEAR', 'A', 'Kent Dilina', 78, 69, 73, 75, 74, 'go'),
(165, '47', '67', '20', 'GE338', 'History', 'PhilippineHistory', '3', '1:00pm-4:00pm', 'tue', '102', 'ge338_history', 'lissy gallarde', 'SECONDYEAR', 'A', 'Kent Dilina', 0, 0, 0, 0, 0, 'go'),
(166, '47', '66', '20', 'SOC441', 'SocialStudies', 'CurrentEvents', '3', '8:30am-9:30am', 'tf', '102', 'soc441_socialstudies', 'lissy gallarde', 'SECONDYEAR', 'A', 'Kent Dilina', 0, 0, 0, 0, 0, 'go'),
(167, '47', '63', '21', 'GE213', 'Math', 'Algebra1', '3', '4:00pm-5:00pm', 'mwf', '202', 'ge213_math', 'ailana gallarde', 'SECONDYEAR', 'A', 'Kent Dilina', 0, 0, 0, 0, 0, 'go'),
(168, '47', '62', '21', 'GE303', 'English', 'Creativewriting', '3', '1:00pm-2:00pm', 'tf', '101', 'ge303_english', 'ailana gallarde', 'SECONDYEAR', 'A', 'Kent Dilina', 90, 86, 87, 88, 88, 'go'),
(169, '48', '62', '21', 'GE303', 'English', 'Creativewriting', '3', '1:00pm-2:00pm', 'tf', '101', 'ge303_english', 'ailana gallarde', 'SECONDYEAR', 'A', 'Marley Laray', 90, 90, 90, 90, 90, 'go'),
(170, '48', '63', '21', 'GE213', 'Math', 'Algebra1', '3', '4:00pm-5:00pm', 'mwf', '202', 'ge213_math', 'ailana gallarde', 'SECONDYEAR', 'A', 'Marley Laray', 0, 0, 0, 0, 0, 'go'),
(171, '48', '70', '19', 'GE331', 'Math', 'Calculus', '3', '9:00am-11:am', 'sat-sun', '101', 'ge331_math', 'vincent gallarde', 'SECONDYEAR', 'A', 'Marley Laray', 0, 0, 0, 0, 0, 'go'),
(172, '48', '71', '19', 'GE112', 'Math', 'ComputerMath', '3', '1:00pm-5:00pm', 'sat-sun', '101', 'ge112_math', 'vincent gallarde', 'SECONDYEAR', 'A', 'Marley Laray', 80, 78, 83, 81, 81, 'go'),
(173, '48', '66', '20', 'SOC441', 'SocialStudies', 'CurrentEvents', '3', '8:30am-9:30am', 'tf', '102', 'soc441_socialstudies', 'lissy gallarde', 'SECONDYEAR', 'A', 'Marley Laray', 0, 0, 0, 0, 0, 'go'),
(174, '48', '67', '20', 'GE338', 'History', 'PhilippineHistory', '3', '1:00pm-4:00pm', 'tue', '102', 'ge338_history', 'lissy gallarde', 'SECONDYEAR', 'A', 'Marley Laray', 0, 0, 0, 0, 0, 'go'),
(175, '49', '67', '20', 'GE338', 'History', 'PhilippineHistory', '3', '1:00pm-4:00pm', 'tue', '102', 'ge338_history', 'lissy gallarde', 'SECONDYEAR', 'A', ' Cynthia Sagang', 0, 0, 0, 0, 0, 'go'),
(176, '49', '70', '19', 'GE331', 'Math', 'Calculus', '3', '9:00am-11:am', 'sat-sun', '101', 'ge331_math', 'vincent gallarde', 'SECONDYEAR', 'A', ' Cynthia Sagang', 0, 0, 0, 0, 0, 'go'),
(177, '49', '71', '19', 'GE112', 'Math', 'ComputerMath', '3', '1:00pm-5:00pm', 'sat-sun', '101', 'ge112_math', 'vincent gallarde', 'SECONDYEAR', 'A', ' Cynthia Sagang', 85, 85, 85, 85, 85, 'go'),
(178, '49', '66', '20', 'SOC441', 'SocialStudies', 'CurrentEvents', '3', '8:30am-9:30am', 'tf', '102', 'soc441_socialstudies', 'lissy gallarde', 'SECONDYEAR', 'A', ' Cynthia Sagang', 0, 0, 0, 0, 0, 'go'),
(179, '49', '63', '21', 'GE213', 'Math', 'Algebra1', '3', '4:00pm-5:00pm', 'mwf', '202', 'ge213_math', 'ailana gallarde', 'SECONDYEAR', 'A', ' Cynthia Sagang', 0, 0, 0, 0, 0, 'go'),
(180, '49', '62', '21', 'GE303', 'English', 'Creativewriting', '3', '1:00pm-2:00pm', 'tf', '101', 'ge303_english', 'ailana gallarde', 'SECONDYEAR', 'A', ' Cynthia Sagang', 91, 91, 90, 90, 91, 'go'),
(181, '50', '62', '21', 'GE303', 'English', 'Creativewriting', '3', '1:00pm-2:00pm', 'tf', '101', 'ge303_english', 'ailana gallarde', 'SECONDYEAR', 'A', 'raymond pwerto', 89, 88, 88, 89, 89, 'go'),
(182, '50', '63', '21', 'GE213', 'Math', 'Algebra1', '3', '4:00pm-5:00pm', 'mwf', '202', 'ge213_math', 'ailana gallarde', 'SECONDYEAR', 'A', 'raymond pwerto', 0, 0, 0, 0, 0, 'go'),
(183, '50', '66', '20', 'SOC441', 'SocialStudies', 'CurrentEvents', '3', '8:30am-9:30am', 'tf', '102', 'soc441_socialstudies', 'lissy gallarde', 'SECONDYEAR', 'A', 'raymond pwerto', 0, 0, 0, 0, 0, 'go'),
(184, '50', '67', '20', 'GE338', 'History', 'PhilippineHistory', '3', '1:00pm-4:00pm', 'tue', '102', 'ge338_history', 'lissy gallarde', 'SECONDYEAR', 'A', 'raymond pwerto', 0, 0, 0, 0, 0, 'go'),
(185, '50', '71', '19', 'GE112', 'Math', 'ComputerMath', '3', '1:00pm-5:00pm', 'sat-sun', '101', 'ge112_math', 'vincent gallarde', 'SECONDYEAR', 'A', 'raymond pwerto', 90, 93, 93, 94, 93, 'go'),
(186, '50', '70', '19', 'GE331', 'Math', 'Calculus', '3', '9:00am-11:am', 'sat-sun', '101', 'ge331_math', 'vincent gallarde', 'SECONDYEAR', 'A', 'raymond pwerto', 0, 0, 0, 0, 0, 'go'),
(188, '48', '72', '19', 'GE113', 'Filipino', 'pagbasaatpagsulat', '3', '9:00am-10:00am', 'mwf', '301', 'ge113_filipino', 'vincent gallarde', 'SECONDYEAR', 'B', 'Marley Laray', 0, 0, 0, 0, 0, 'wait'),
(191, '48', '73', '21', 'GE115', 'History', 'ReadingOfPhilippineHistor', '3', '9:00am-11:am', 'thursday', '101', 'ge115_history', 'ailana gallarde', 'SECONDYEAR', 'A', 'Marley Laray', 0, 0, 0, 0, 0, 'wait');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `CategoryName` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `CategoryName`, `Description`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(2, 'News', 'News', '2018-06-06 10:28:09', '2018-06-30 18:41:07', 1),
(3, 'Announcement', 'Announcement', '2018-06-06 10:35:09', '2018-06-14 11:11:55', 1),
(5, 'Event', 'Event', '2018-06-14 05:32:58', '2018-06-14 05:33:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

CREATE TABLE `tblcomments` (
  `id` int(11) NOT NULL,
  `postId` char(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comment` mediumtext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`id`, `postId`, `name`, `email`, `comment`, `postingDate`, `status`) VALUES
(1, '12', 'Anuj', 'anuj@gmail.com', 'Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.', '2018-11-21 11:06:22', 0),
(2, '12', 'Test user', 'test@gmail.com', 'This is sample text for testing.', '2018-11-21 11:25:56', 1),
(3, '7', 'ABC', 'abc@test.com', 'This is sample text for testing.', '2018-11-21 11:27:06', 1),
(4, '22', 'vincent', 'admin@gmail.com', '123123', '2023-12-11 16:29:08', 0),
(5, '22', 'vincent', 'admin@gmail.com', '123123', '2023-12-11 16:30:14', 0),
(6, '22', 'vincent', 'admin@gmail.com', '123123', '2023-12-11 16:30:24', 0),
(7, '22', 'vincent', 'admin@gmail.com', 'q123', '2023-12-11 16:33:01', 0),
(8, '22', 'vincent', 'admin@gmail.com', 'q123', '2023-12-11 16:33:07', 0),
(9, '22', 'vincent', 'admin@gmail.com', 'q123', '2023-12-11 16:33:17', 0),
(10, '23', 'vincent', 'admin@gmail.com', '122', '2023-12-12 06:31:03', 0),
(11, '32', 'vincent', 'admin@gmail.com', '1', '2023-12-12 08:38:29', 0),
(12, '32', 'vincent', 'admin@gmail.com', '123', '2023-12-12 08:39:23', 0),
(13, '32', 'vincent', 'admin@gmail.com', '123', '2023-12-12 08:41:54', 0),
(14, '32', 'vincent', 'admin@gmail.com', '123', '2023-12-12 08:44:30', 0),
(15, '32', 'vincent', 'admin@gmail.com', '123', '2023-12-12 08:44:42', 0),
(16, '33', '', '', 'asd', '2023-12-30 04:02:07', 0),
(17, '33', '', '', '121', '2024-01-03 03:01:13', 0),
(18, '33', '', '', '3', '2024-01-03 03:05:38', 0),
(19, '33', '  ', '', '23', '2024-01-03 03:06:01', 0),
(20, '33', '', '', '3', '2024-01-03 03:06:37', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblposts`
--

CREATE TABLE `tblposts` (
  `id` int(11) NOT NULL,
  `posted` varchar(100) NOT NULL,
  `PostTitle` longtext DEFAULT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `SubCategoryId` int(11) DEFAULT NULL,
  `PostDetails` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `Is_Active` int(1) DEFAULT NULL,
  `PostUrl` mediumtext DEFAULT NULL,
  `PostImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblposts`
--

INSERT INTO `tblposts` (`id`, `posted`, `PostTitle`, `CategoryId`, `SubCategoryId`, `PostDetails`, `PostingDate`, `UpdationDate`, `Is_Active`, `PostUrl`, `PostImage`) VALUES
(37, 'lissy@gmail.com', 'UNISEC Philippines!', 0, 0, '??? A warm welcome to the new member universities of UNISEC Philippines! ???\r\n\r\n? Want your university/institution to be part of this too? Email unisecph@gmail.com to learn how.', '2024-01-05 05:06:49', NULL, 1, 'UNISEC-Philippines!', '38cf5630fa7283cdb7814dcbbb65da9c.jpg'),
(44, 'admin@gmail.com', 'Campus Directors Citation', 0, 0, 'Thank you Madam Ma. Carla Y. Abaquita for this recognition.\r\n\r\nWe do our tasks daily as they come to the best of our ability not for recognition but fulfillment of our duties.\r\n\r\nWe are humbled and grateful.\r\n\r\nIn service we remain,\r\n\r\nZyrus|Aaron|Pearly|Kim|Nimfa|Yomi|Jun', '2024-01-05 05:19:24', NULL, 1, 'Campus-Directors-Citation', '142600ea64c83d78dcececdff190fafe.jpg'),
(45, 'admin@gmail.com', 'Celebration Of ICT Month 111', 0, 0, 'Connecting Communities, Enriching Lives, Forging a Digital Future for the Philippines', '2024-01-05 05:25:22', '2024-01-10 10:51:34', 1, 'Celebration-of-ICT-Month', 'af277b78b5852c5057697fa4bb481e01.jpg'),
(46, 'vincent@gmail.com', 'To all graduates', 0, 0, 'NO GRADUATION FEE!', '2024-01-05 07:43:56', NULL, 1, 'To-all-graduates', '775a5914024d7d3f55912758d35cdb49.jpg'),
(50, 'ailana@gmail.com', 'To all GRADUATES!', 0, 0, 'NO TUITION FEE FOR ALL!', '2024-01-11 05:26:58', NULL, 1, 'To-all-GRADUATES!', '775a5914024d7d3f55912758d35cdb49.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `SubCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) DEFAULT NULL,
  `Subcategory` varchar(255) DEFAULT NULL,
  `SubCatDescription` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL,
  `Is_Active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`SubCategoryId`, `CategoryId`, `Subcategory`, `SubCatDescription`, `PostingDate`, `UpdationDate`, `Is_Active`) VALUES
(3, 5, 'Bollywood ', 'Bollywood masala', '2018-06-22 15:45:38', '0000-00-00 00:00:00', 1),
(4, 3, 'Cricket', 'Cricket\r\n\r\n', '2018-06-30 09:00:43', '0000-00-00 00:00:00', 1),
(5, 3, 'Football', 'Football', '2018-06-30 09:00:58', '0000-00-00 00:00:00', 1),
(6, 5, 'Television', 'TeleVision', '2018-06-30 18:59:22', '0000-00-00 00:00:00', 1),
(7, 6, 'National', 'National', '2018-06-30 19:04:29', '0000-00-00 00:00:00', 1),
(8, 6, 'International', 'International', '2018-06-30 19:04:43', '0000-00-00 00:00:00', 1),
(9, 7, 'India', 'India', '2018-06-30 19:08:42', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `webuser`
--

CREATE TABLE `webuser` (
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webuser`
--

INSERT INTO `webuser` (`email`, `usertype`) VALUES
('admin@gmail.com', 'admin'),
('ailana@gmail.com', 'instructor'),
('Cynthia@gmail.com', 'student'),
('jane@gmail.com', 'student'),
('john@gmail.com', 'student'),
('johny@gmail.com', 'student'),
('joshua@gmail.com', 'student'),
('junjun@gmail.com', 'student'),
('kent@gmail.com', 'student'),
('lissy@gmail.com', 'instructor'),
('mark@gmail.com', 'student'),
('marley@gmail.com', 'student'),
('raymond@gmail.com', 'student'),
('student@gmail.com', 'student'),
('vincent@gmail.com', 'instructor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admin_email` (`admin_email`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomments`
--
ALTER TABLE `tblcomments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblposts`
--
ALTER TABLE `tblposts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`SubCategoryId`);

--
-- Indexes for table `webuser`
--
ALTER TABLE `webuser`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcomments`
--
ALTER TABLE `tblcomments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblposts`
--
ALTER TABLE `tblposts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `SubCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
