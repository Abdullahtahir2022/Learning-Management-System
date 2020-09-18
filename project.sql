-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 01:12 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `id` int(11) NOT NULL,
  `role` int(11) DEFAULT NULL,
  `password` varchar(11) DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`id`, `role`, `password`) VALUES
(100, 1, '0'),
(800, 1, '0'),
(6666, 2, '0'),
(7777, 2, '0'),
(7878, 3, '5555');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `course_student_id` int(11) NOT NULL,
  `assignment` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `Grades` varchar(5) DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `course_student_id`, `assignment`, `date`, `Grades`) VALUES
(57, 60, 'PDF/Abdullah_Submission_1802016.pdf', '2020-09-02', 'None'),
(58, 64, 'PDF/MC.pdf', '2020-09-05', 'A'),
(59, 66, 'PDF/ID.pdf', '2020-09-05', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `course_student_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) NOT NULL DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `course_student_id`, `date`, `status`) VALUES
(157, 64, '2020-09-05', 'Present'),
(158, 66, '2020-09-05', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_no`, `name`) VALUES
(1, 'Mianwali'),
(2, 'Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_no`, `name`) VALUES
(1, 'Pakistan');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`) VALUES
(1, 'Maltivariate'),
(2, 'free'),
(3, 'overlap'),
(9, 'English'),
(10, 'ITC'),
(11, 'Programming'),
(12, 'Algorithms'),
(98, 'Calculus'),
(899, 'Linear Algebra');

-- --------------------------------------------------------

--
-- Table structure for table `course_student_enrolment`
--

CREATE TABLE `course_student_enrolment` (
  `course_student_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_student_enrolment`
--

INSERT INTO `course_student_enrolment` (`course_student_id`, `student_id`, `course_id`, `teacher_id`) VALUES
(60, 6666, 11, 100),
(61, 6666, 12, 100),
(62, 6666, 10, 100),
(63, 6666, 9, 400),
(64, 6666, 1, 800),
(65, 7777, 98, 800),
(66, 7777, 1, 800);

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher_enrolment`
--

CREATE TABLE `course_teacher_enrolment` (
  `course_teacher_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_teacher_enrolment`
--

INSERT INTO `course_teacher_enrolment` (`course_teacher_id`, `course_id`, `teacher_id`) VALUES
(35, 10, 100),
(36, 11, 100),
(37, 12, 100),
(38, 9, 400),
(39, 1, 800),
(40, 98, 800),
(41, 899, 800);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image`) VALUES
(100, 'IMAGES/Capture.PNG'),
(400, 'IMAGES/Capture2.PNG'),
(500, 'IMAGES/WhatsApp Image 2020-07-06 at 5.21.05 PM.jpe'),
(800, 'IMAGES/Capture.PNG'),
(1010, 'IMAGES/IMG_20181002_173001.jpg'),
(4567, 'IMAGES/Capture1.PNG'),
(6666, 'IMAGES/1.jpg'),
(7777, 'IMAGES/WhatsApp Image 2020-07-06 at 5.21.05 PM.jpe'),
(9999, 'IMAGES/26734490_1952908944926908_72985326103709827');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`) VALUES
(1, 'Teacher'),
(2, 'Student'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city_no` int(11) DEFAULT NULL,
  `country_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `email`, `city_no`, `country_no`) VALUES
(6666, 'Hamza', 'hamza2018@namal.edu.pk', 2, 1),
(7777, 'Haris', 'noman@namal.edu.pk', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `submission_status`
--

CREATE TABLE `submission_status` (
  `id` int(11) NOT NULL,
  `course_teacher_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submission_status`
--

INSERT INTO `submission_status` (`id`, `course_teacher_id`, `status`) VALUES
(8, 35, 1),
(9, 36, 1),
(10, 37, 0),
(11, 38, 0),
(12, 39, 1),
(13, 40, 1),
(14, 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `city_no` int(11) NOT NULL,
  `country_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `email`, `city_no`, `country_no`) VALUES
(100, 'Dr. Noman', 'noman@namal.edu.pk', 1, 1),
(400, 'Sir Irfan', 'irfan@namal.edu.pk', 1, 1),
(500, 'Sir Noman', 'haris2018@namal.edu.pk', 2, 1),
(800, 'Faiqa Ali', 'faiqa@namal.edu.pk', 1, 1),
(4567, 'Sir Malik ', 'noman@namal.edu.pk', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_student_id` (`course_student_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_student_id` (`course_student_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_no`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_no`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_student_enrolment`
--
ALTER TABLE `course_student_enrolment`
  ADD PRIMARY KEY (`course_student_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `course_teacher_enrolment`
--
ALTER TABLE `course_teacher_enrolment`
  ADD PRIMARY KEY (`course_teacher_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `city_no` (`city_no`),
  ADD KEY `country_no` (`country_no`);

--
-- Indexes for table `submission_status`
--
ALTER TABLE `submission_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_teacher_id` (`course_teacher_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `country_no` (`country_no`),
  ADD KEY `city_no` (`city_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `course_student_enrolment`
--
ALTER TABLE `course_student_enrolment`
  MODIFY `course_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `course_teacher_enrolment`
--
ALTER TABLE `course_teacher_enrolment`
  MODIFY `course_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submission_status`
--
ALTER TABLE `submission_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_details`
--
ALTER TABLE `account_details`
  ADD CONSTRAINT `account_details_ibfk_1` FOREIGN KEY (`role`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`course_student_id`) REFERENCES `course_student_enrolment` (`course_student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`course_student_id`) REFERENCES `course_student_enrolment` (`course_student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course_student_enrolment`
--
ALTER TABLE `course_student_enrolment`
  ADD CONSTRAINT `course_student_enrolment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `course_student_enrolment_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `course_student_enrolment_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course_teacher_enrolment`
--
ALTER TABLE `course_teacher_enrolment`
  ADD CONSTRAINT `course_teacher_enrolment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `course_teacher_enrolment_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`city_no`) REFERENCES `city` (`city_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`country_no`) REFERENCES `country` (`country_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `submission_status`
--
ALTER TABLE `submission_status`
  ADD CONSTRAINT `submission_status_ibfk_1` FOREIGN KEY (`course_teacher_id`) REFERENCES `course_teacher_enrolment` (`course_teacher_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`country_no`) REFERENCES `country` (`country_no`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`city_no`) REFERENCES `city` (`city_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
