-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 15, 2022 at 12:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gctufacegate`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendanceTable`
--

CREATE TABLE `attendanceTable` (
  `idAttendance` varchar(255) NOT NULL,
  `idSession` varchar(255) NOT NULL,
  `idtimetable` varchar(255) NOT NULL,
  `idconfirmtimetable` varchar(255) NOT NULL,
  `studentFullName` varchar(255) NOT NULL,
  `studentIdNumber` varchar(255) DEFAULT NULL,
  `coursecode` varchar(255) DEFAULT NULL,
  `lectureremail` varchar(255) DEFAULT NULL,
  `studentFaculty` varchar(255) DEFAULT NULL,
  `studentprogramme` varchar(255) DEFAULT NULL,
  `studentsemester` varchar(255) DEFAULT NULL,
  `studentlevel` varchar(255) DEFAULT NULL,
  `studentgroup` varchar(255) DEFAULT NULL,
  `studentsession` varchar(255) DEFAULT NULL,
  `studentcampus` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `timespent` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `part` varchar(255) NOT NULL,
  `dateattendance` varchar(250) NOT NULL,
  `dateses` date NOT NULL DEFAULT current_timestamp(),
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendanceTable`
--

INSERT INTO `attendanceTable` (`idAttendance`, `idSession`, `idtimetable`, `idconfirmtimetable`, `studentFullName`, `studentIdNumber`, `coursecode`, `lectureremail`, `studentFaculty`, `studentprogramme`, `studentsemester`, `studentlevel`, `studentgroup`, `studentsession`, `studentcampus`, `duration`, `timespent`, `percentage`, `part`, `dateattendance`, `dateses`, `timestamp`) VALUES
('121272', '29754', '198141,220800,', '223020', 'Vincent Pokpa Sakouvogui', '040118262', 'MATH173,MATH173,', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'B', 'Morning', 'Tesano', '7200', '0', '0', 'False', '11th, July, 2021', '2021-07-11', '2021-08-01 14:36:07'),
('443292', '81324', '337920', '14910', 'Vincent Pokpa Sakouvogui', '040118262', 'IT413', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'C', 'Morning', 'Tesano', '300', '0', '0', 'False', '11th, July, 2021', '2021-07-11', '2021-08-01 14:36:20'),
('553511', '746228', '337920', '14910', 'Vincent Pokpa Sakouvogui', '040118262', 'IT413', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'C', 'Morning', 'Tesano', '47400', '0', '0', 'False', '18th, June, 2021', '2021-06-18', '2021-08-01 14:36:36'),
('646691', '163514', '220800', '196252', 'Vincent Pokpa Sakouvogui', '040118262', 'MATH173', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'B', 'Morning', 'Tesano', '1140', '0', '89.47368421052632', 'True', '11th, July, 2021', '2021-07-11', '2021-08-01 14:36:50'),
('740776', '58460', '220800,232308,337920,', '767511', 'Vincent Pokpa Sakouvogui', '040118262', 'MATH173,IT411,IT413,', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'C', 'Morning', 'Tesano', '10800', '0', '70', 'True', '11th, June, 2021', '2021-06-11', '2021-08-01 14:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `courseTable`
--

CREATE TABLE `courseTable` (
  `coursename` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `coursecredit` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseTable`
--

INSERT INTO `courseTable` (`coursename`, `coursecode`, `coursecredit`, `timestamp`) VALUES
('Study Skill', 'ENG174', 3, '2021-06-02 20:21:35'),
('Functional French 1', 'FREN171', 2, '2021-06-02 20:13:27'),
('Functional French 2', 'FREN172', 2, '2021-06-02 20:13:36'),
('Principle of Programming', 'IT101', 3, '2021-06-02 20:14:25'),
('High Level Language Programming', 'IT102', 3, '2021-06-02 20:17:40'),
('Introduction To Information Systems', 'IT124', 3, '2021-06-02 20:18:37'),
('Introduction To Information Technology Law', 'IT152', 3, '2021-06-02 20:19:46'),
('Compilers & Translators', 'IT411', 3, '2021-06-02 20:10:28'),
('Artificial Intelligence', 'IT413', 3, '2021-05-29 20:56:46'),
('I.T. Project Management', 'IT463', 3, '2021-06-02 20:08:43'),
('Human Resource Development', 'IT471', 2, '2021-06-02 20:09:38'),
('Discrete Structure', 'MATH171', 3, '2021-06-02 20:12:36'),
('Computational Mathematic', 'MATH173', 3, '2021-06-02 20:12:11'),
('Probability And Statistics', 'MATH176', 3, '2021-06-02 20:20:51'),
('Moral And Ethics', 'METS173', 2, '2021-06-02 20:16:10'),
('Sociology of Technology', 'SCOT175', 2, '2021-06-02 20:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `lecturerTable`
--

CREATE TABLE `lecturerTable` (
  `lecturername` varchar(255) NOT NULL,
  `lectureremail` varchar(255) NOT NULL,
  `lecturerGender` varchar(255) DEFAULT NULL,
  `lecturerlocation` varchar(255) DEFAULT NULL,
  `lecturerPosition` varchar(255) DEFAULT NULL,
  `lecturertel` varchar(255) DEFAULT NULL,
  `lecturerbiographie` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturerTable`
--

INSERT INTO `lecturerTable` (`lecturername`, `lectureremail`, `lecturerGender`, `lecturerlocation`, `lecturerPosition`, `lecturertel`, `lecturerbiographie`, `timestamp`) VALUES
('Dr Afia N. Boakye', 'afiaboakye@gmail.com', 'Female', 'Accra Osus', 'Lecturer', '0551111222', 'Teaching Human Resources', '2021-06-02 19:03:40'),
('Dr Stephen Asunka', 'asunka@gmail.com', 'Male', 'Achimota New Station', 'Lecturer', '0202555322', 'Teaching Project Management', '2021-06-02 19:15:35'),
('Dominic K Louis', 'dominiclouis@gmail.com', 'Male', 'Accra Nwtown', 'Cordinator Supervised Industrial Attachment', '0205294331', 'Good Cordinator', '2021-06-02 18:58:53'),
('Dr Quist-Aphetsi Kester', 'kester@gmail.com', 'Male', 'Accra Achimota', 'Lecturer', '0111222111', 'Teaching Java, c++, Artificial Intelligence', '2021-06-02 19:11:57'),
('Thomas Henaku', 'thomashe@gmail.com', 'Male', 'Accra Kotobabi', 'Head of Department of IT', '0556555666', 'Teaching IT Law, Ethical use of IT', '2021-06-02 18:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `lecturerusers`
--

CREATE TABLE `lecturerusers` (
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturerusers`
--

INSERT INTO `lecturerusers` (`username`, `fullname`, `tel`, `email`, `password`, `timestamp`) VALUES
('KesterPro', 'Dr Quist-Aphetsi Kester', '111222111', 'kester@gmail.com', '7027587e4efa0e93256ef37f284ef19e', '2021-06-03 08:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessionTable`
--

CREATE TABLE `sessionTable` (
  `idtimetable` varchar(255) NOT NULL,
  `openstatus` varchar(255) DEFAULT NULL,
  `starttime` varchar(255) DEFAULT NULL,
  `endtime` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `datesession` varchar(255) NOT NULL,
  `idconfirmtimetable` varchar(255) NOT NULL,
  `idSession` varchar(255) NOT NULL,
  `dateses` date NOT NULL DEFAULT current_timestamp(),
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessionTable`
--

INSERT INTO `sessionTable` (`idtimetable`, `openstatus`, `starttime`, `endtime`, `duration`, `datesession`, `idconfirmtimetable`, `idSession`, `dateses`, `timestamp`) VALUES
('220800', 'false', '14:41', '15:0', '2', '11th, July, 2021', '196252', '163514', '2021-07-11', '2021-08-01 14:25:57'),
('381595', 'true', '0:22', '0:22', '0', '23rd, June, 2021', '801', '224784', '2021-06-23', '2021-08-01 14:29:51'),
('232308', 'true', '0:24', '0:24', '5', '23rd, June, 2021', '92268', '239932', '2021-06-23', '2021-08-01 14:30:48'),
('232308', 'true', '21:17', '21:18', '0', '12nd, June, 2021', '92268', '247812', '2021-06-12', '2021-08-01 14:28:51'),
('232308', 'true', '16:59', '17:0', '1', '24th, June, 2021', '92268', '280416', '2021-06-24', '2021-08-01 14:28:29'),
('198141,220800,', 'false', '14:31', '14:40', '2', '11th, July, 2021', '223020', '29754', '2021-07-11', '2021-08-01 14:26:43'),
('220800', 'true', '0:22', '0:22', '0', '23rd, June, 2021', '196252', '342450', '2021-06-23', '2021-08-01 14:31:47'),
('232308', 'true', '21:19', '21:19', '0', '22nd, June, 2021', '92268', '342504', '2021-06-22', '2021-08-01 14:28:09'),
('220800,232308,337920,', 'true', '12:50', '12:50', '0', '11th, June, 2021', '767511', '58460', '2021-06-11', '2021-08-01 14:27:49'),
('220800', 'true', '11:11', '20:54', '0', '9th, June, 2021', '196252', '705364', '2021-06-09', '2021-08-01 14:31:27'),
('337920', 'false', '13:11', '18:06', '790', '18th, June, 2021', '14910', '746228', '2021-06-18', '2021-08-01 14:27:32'),
('337920', 'false', '14:17', '14:31', '1', '11th, July, 2021', '14910', '81324', '2021-07-11', '2021-08-01 14:27:11'),
('381595', 'false', '13:48', '13:48', '0', '24th, July, 2021', '801', '9204', '2021-07-24', '2021-08-01 14:25:36'),
('381595', 'true', '11:11', '11:20', '1', '9th, June, 2021', '801', '9263', '2021-06-09', '2021-08-01 14:32:18'),
('337920', 'true', '21:33', '22:54', '0', '23rd, June, 2021', '14910', '93258', '2021-06-23', '2021-08-01 14:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `staffTable`
--

CREATE TABLE `staffTable` (
  `staffname` varchar(255) NOT NULL,
  `staffemail` varchar(255) NOT NULL,
  `staffGender` varchar(255) DEFAULT NULL,
  `stafflocation` varchar(255) DEFAULT NULL,
  `staffPosition` varchar(255) DEFAULT NULL,
  `stafftel` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffTable`
--

INSERT INTO `staffTable` (`staffname`, `staffemail`, `staffGender`, `stafflocation`, `staffPosition`, `stafftel`, `timestamp`) VALUES
('Admin2', 'admin2@gmail.com', 'Male', 'Accra', 'Admin', '0558266583', '2021-06-02 19:22:01'),
('AdminVincent', 'vsakouvogui@gmail.com', 'Male', 'Accra', 'Admin', '0558266583', '2021-06-02 19:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `staffusers`
--

CREATE TABLE `staffusers` (
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffusers`
--

INSERT INTO `staffusers` (`username`, `fullname`, `tel`, `email`, `password`, `timestamp`) VALUES
('Admin', 'AdminVincent', '0558266583', 'vsakouvogui@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2021-06-02 18:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `studentPresenceTable`
--

CREATE TABLE `studentPresenceTable` (
  `idNumber` varchar(255) NOT NULL,
  `idSession` varchar(255) NOT NULL,
  `idtimetable` varchar(255) DEFAULT NULL,
  `idconfirmtimetable` varchar(255) DEFAULT NULL,
  `datepresence` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `timespent` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `checkevery` varchar(255) NOT NULL,
  `nbredecheck` varchar(255) NOT NULL,
  `mincheck` varchar(255) NOT NULL,
  `totalcheck` varchar(255) NOT NULL,
  `part` varchar(255) NOT NULL,
  `idPresence` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentPresenceTable`
--

INSERT INTO `studentPresenceTable` (`idNumber`, `idSession`, `idtimetable`, `idconfirmtimetable`, `datepresence`, `percentage`, `timespent`, `duration`, `checkevery`, `nbredecheck`, `mincheck`, `totalcheck`, `part`, `idPresence`, `timestamp`) VALUES
('040118262', '163514', '220800', '196252', '11th, July, 2021', '89.47368421052632', '0', '1140', '180', '6.333333333333333', '6', '6', 'True', '30892481', '2021-07-11 15:00:12'),
('040118262', '746228', '337920', '14910', '18th, June, 2021', '50', '0', '47400', '600', '79.0', '78', '1', 'True', '31518312', '2021-07-11 14:09:56'),
('040118262', '58460', '220800,232308,337920,', '767511', '11th, June, 2021', '70', '0', '10800', '600', '18.0', '17', '1', 'True', '4186716', '2021-07-11 14:09:27'),
('040118262', '29754', '198141,220800,', '223020', '11th, July, 2021', '0', '0', '7200', '720', '10.0', '9', '1', 'False', '4279177', '2021-07-11 14:39:57'),
('040118262', '81324', '337920', '14910', '11th, July, 2021', '0', '0', '360', '60', '6.0', '5', '4', 'False', '4311350', '2021-07-11 14:31:28'),
('040118262', '81324', '337920', '14910', '11th, July, 2021', '0', '0', '300', '60', '5.0', '4', '2', 'False', '49431725', '2021-07-11 14:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `studentTable`
--

CREATE TABLE `studentTable` (
  `studentname` varchar(255) NOT NULL,
  `studentemail` varchar(255) DEFAULT NULL,
  `studentFaculty` varchar(255) DEFAULT NULL,
  `studentprogramme` varchar(255) DEFAULT NULL,
  `studentgctuemail` varchar(255) DEFAULT NULL,
  `studenttel` varchar(255) DEFAULT NULL,
  `studentsemester` varchar(255) DEFAULT NULL,
  `studentlevel` varchar(255) DEFAULT NULL,
  `studentgroup` varchar(255) DEFAULT NULL,
  `studentsession` varchar(255) DEFAULT NULL,
  `studentcampus` varchar(255) DEFAULT NULL,
  `studentGender` varchar(255) DEFAULT NULL,
  `studentidnumber` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `digitalfacelink` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentTable`
--

INSERT INTO `studentTable` (`studentname`, `studentemail`, `studentFaculty`, `studentprogramme`, `studentgctuemail`, `studenttel`, `studentsemester`, `studentlevel`, `studentgroup`, `studentsession`, `studentcampus`, `studentGender`, `studentidnumber`, `timestamp`, `digitalfacelink`) VALUES
('Daaan kooo', 'kooodann@gmail.com', 'Faculty of Engineering (FoE)', 'Telecommunications Engineering', '040117666@live.gtuc.edu.gh', '0245233666', 'First', '400', 'none', 'Evening', 'Tesano', 'Male', '040117666', '2021-05-29 21:40:44', ''),
('Stephen Ebeheremeh Onore', 'stephenonore@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', '040118118@live.gtuc.edu.gh', '0552555678', 'Second', '400', 'C', 'Morning', 'Tesano', 'Male', '040118118', '2021-05-29 21:35:24', ''),
('Kumasenu Clementina', 'clementinakumasenu@gmail.com', 'Faculty of Engineering (FoE)', 'Telecommunications Engineering', '040118118@live.gtuc.edu.gh', '0245233243', 'First', '400', 'none', 'Evening', 'Tesano', 'Female', '040118132', '2021-05-29 21:38:33', ''),
('Vincent Pokpa Sakouvogui', 'vsakouvogui@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', '040118262@live.gtuc.edu.gh', '0558266583', 'Second', '400', 'C', 'Morning', 'Tesano', 'Male', '040118262', '2021-07-01 11:24:08', 'http://192.168.64.2/alvers/digitalface/9814datasavedfacedescriptorvincent.csv');

-- --------------------------------------------------------

--
-- Table structure for table `studentusers`
--

CREATE TABLE `studentusers` (
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `idNumber` varchar(255) NOT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentusers`
--

INSERT INTO `studentusers` (`username`, `fullname`, `idNumber`, `tel`, `email`, `password`, `timestamp`) VALUES
('VincentProPro', 'Vincent Pokpa Sakouvogui', '040118262', '558266583', 'vsakouvogui@gmail.com', 'a9c5521703acdbdfd2df573229d59adf', '2021-05-29 22:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `timeTableConfirm`
--

CREATE TABLE `timeTableConfirm` (
  `idtimetable` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `lectureremail` varchar(255) DEFAULT NULL,
  `studentFaculty` varchar(255) DEFAULT NULL,
  `studentprogramme` varchar(255) DEFAULT NULL,
  `studentsemester` varchar(255) DEFAULT NULL,
  `studentlevel` varchar(255) DEFAULT NULL,
  `studentgroup` varchar(255) DEFAULT NULL,
  `studentsession` varchar(255) DEFAULT NULL,
  `studentcampus` varchar(255) DEFAULT NULL,
  `starttime` varchar(255) DEFAULT NULL,
  `endtime` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `dayweek` varchar(255) NOT NULL,
  `datetimetable` varchar(255) NOT NULL,
  `idconfirmtimetable` varchar(255) NOT NULL,
  `checkevery` varchar(255) NOT NULL,
  `usedStatus` varchar(20) NOT NULL DEFAULT 'True',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeTableConfirm`
--

INSERT INTO `timeTableConfirm` (`idtimetable`, `coursecode`, `lectureremail`, `studentFaculty`, `studentprogramme`, `studentsemester`, `studentlevel`, `studentgroup`, `studentsession`, `studentcampus`, `starttime`, `endtime`, `duration`, `dayweek`, `datetimetable`, `idconfirmtimetable`, `checkevery`, `usedStatus`, `timestamp`) VALUES
('337920', 'IT413', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'C', 'Morning', 'Tesano', '14:24', '14:30', '6', 'Sunday', '11th, July, 2021', '14910', '1', 'True', '2021-07-11 14:25:58'),
('220800', 'MATH173', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'B,C', 'Morning', 'Tesano', '14:40', '14:59', '19', 'Sunday', '11th, July, 2021', '196252', '3', 'True', '2021-07-11 14:41:23'),
('198141,220800,', 'MATH173,MATH173,', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS),Faculty of Computing & Information Systems (FoCIS),', 'Information Technology,Information Technology,', 'Second,Second,', '400, 400,', 'B,C', 'Morning,Morning,', 'Tesano,Tesano,', '13:00', '15:00', '120', 'Monday', '8th, July, 2021', '223020', '12', 'True', '2021-07-11 09:28:03'),
('198141', 'MATH173', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'B', 'Morning', 'Tesano', '13:00', '15:00', '120', 'Monday', '10th, July, 2021', '554008', '10', 'True', '2021-07-10 02:52:50'),
('198141,220800,232308,337920,', 'MATH173,MATH173,IT411,IT413,', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS),Faculty of Computing & Information Systems (FoCIS),Faculty of Computing & Information Systems (FoCIS),Faculty of Computing & Information Systems (FoCIS),', 'Information Technology,Information Technology,Information Technology,Information Technology,', 'Second,Second,First,Second,', '400,400,100,400,', 'B,C,B,C,', 'Morning,Morning,Morning,Morning,', 'Tesano,Tesano,Tesano,Tesano,', '13:00', '15:00', '120', 'Monday', '24th, July, 2021', '558600', '10', 'True', '2021-07-24 13:49:22'),
('220800,232308,337920,', 'MATH173,IT411,IT413,', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS),Faculty of Computing & Information Systems (FoCIS),Faculty of Computing & Information Systems (FoCIS),', 'Information Technology,Information Technology,Information Technology,', 'Second,First,Second,', '400,100,400,', 'C,B,C,', 'Morning,Morning,Morning,', 'Tesano,Tesano,Tesano,', '07:00', '10:00', '180', 'Friday', '8th, July, 2021', '767511', '10', 'True', '2021-07-08 11:22:26'),
('381595', 'IT471', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'First', '100', 'C', 'Morning', 'Tesano', '15:34', '16:55', '81', 'Wednesday', '24th, June, 2021', '801', '10', 'True', '2021-06-23 23:42:30'),
('232308', 'IT411', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'First', '100', 'B', 'Morning', 'Tesano', '00:23', '03:34', '191', 'Monday', '24th, July, 2021', '92268', '10', 'True', '2021-07-24 13:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `timeTableStaff`
--

CREATE TABLE `timeTableStaff` (
  `idtimetable` varchar(255) NOT NULL,
  `coursecode` varchar(255) NOT NULL,
  `lectureremail` varchar(255) DEFAULT NULL,
  `studentFaculty` varchar(255) DEFAULT NULL,
  `studentprogramme` varchar(255) DEFAULT NULL,
  `studentsemester` varchar(255) DEFAULT NULL,
  `studentlevel` varchar(255) DEFAULT NULL,
  `studentgroup` varchar(255) DEFAULT NULL,
  `studentsession` varchar(255) DEFAULT NULL,
  `studentcampus` varchar(255) DEFAULT NULL,
  `starttime` varchar(255) DEFAULT NULL,
  `endtime` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `dayweek` varchar(255) NOT NULL,
  `usedStatus` varchar(20) NOT NULL DEFAULT 'True',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeTableStaff`
--

INSERT INTO `timeTableStaff` (`idtimetable`, `coursecode`, `lectureremail`, `studentFaculty`, `studentprogramme`, `studentsemester`, `studentlevel`, `studentgroup`, `studentsession`, `studentcampus`, `starttime`, `endtime`, `duration`, `dayweek`, `usedStatus`, `timestamp`) VALUES
('178125', 'IT101', 'thomashe@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'First', '400', 'C', 'Morning', 'Tesano', '11:00', '15:00', '60', 'Thursday', 'True', '2021-06-03 01:09:32'),
('178199', 'MATH173', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'A', 'Morning', 'Tesano', '09:00', '11:00', '120', 'Monday', 'True', '2021-07-07 15:15:59'),
('198141', 'MATH173', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'B', 'Morning', 'Tesano', '13:00', '15:00', '120', 'Monday', 'True', '2021-07-07 15:18:05'),
('220800', 'MATH173', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'C', 'Morning', 'Tesano', '07:00', '10:00', '120', 'Friday', 'True', '2021-06-03 01:11:50'),
('232308', 'IT411', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'First', '100', 'B', 'Morning', 'Tesano', '00:23', '03:34', '120', 'Monday', 'True', '2021-06-03 01:05:57'),
('337920', 'IT413', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'Second', '400', 'C', 'Morning', 'Tesano', '04:56', '18:06', '120', 'Monday', 'True', '2021-06-03 01:03:55'),
('381595', 'IT471', 'kester@gmail.com', 'Faculty of Computing & Information Systems (FoCIS)', 'Information Technology', 'First', '100', 'C', 'Morning', 'Tesano', '15:34', '16:55', '400', 'Wednesdays', 'True', '2021-07-31 12:02:30'),
('529735', 'FREN171', 'afiaboakye@gmail.com', 'Faculty of Engineering (FoE)', 'Information Technology', 'First', '100', 'none', 'Morning', 'Tesano', '02:23', '04:56', '444', 'Monday', 'True', '2021-06-03 00:59:49'),
('529799', 'FREN171', 'afiaboakye@gmail.com', 'Faculty of Engineering (FoE)', 'Information Technology', 'First', '100', 'none', 'Morning', 'Tesano', '02:23', '03:04', '60', 'Monday', 'True', '2021-06-03 01:00:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendanceTable`
--
ALTER TABLE `attendanceTable`
  ADD PRIMARY KEY (`idAttendance`);

--
-- Indexes for table `courseTable`
--
ALTER TABLE `courseTable`
  ADD PRIMARY KEY (`coursecode`);

--
-- Indexes for table `lecturerTable`
--
ALTER TABLE `lecturerTable`
  ADD PRIMARY KEY (`lectureremail`);

--
-- Indexes for table `lecturerusers`
--
ALTER TABLE `lecturerusers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessionTable`
--
ALTER TABLE `sessionTable`
  ADD PRIMARY KEY (`idSession`);

--
-- Indexes for table `staffTable`
--
ALTER TABLE `staffTable`
  ADD PRIMARY KEY (`staffemail`);

--
-- Indexes for table `staffusers`
--
ALTER TABLE `staffusers`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `studentPresenceTable`
--
ALTER TABLE `studentPresenceTable`
  ADD PRIMARY KEY (`idPresence`);

--
-- Indexes for table `studentTable`
--
ALTER TABLE `studentTable`
  ADD PRIMARY KEY (`studentidnumber`);

--
-- Indexes for table `studentusers`
--
ALTER TABLE `studentusers`
  ADD PRIMARY KEY (`idNumber`);

--
-- Indexes for table `timeTableConfirm`
--
ALTER TABLE `timeTableConfirm`
  ADD PRIMARY KEY (`idconfirmtimetable`);

--
-- Indexes for table `timeTableStaff`
--
ALTER TABLE `timeTableStaff`
  ADD PRIMARY KEY (`idtimetable`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
