-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2017 at 02:11 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pup_ocss`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_username`, `admin_pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `day_tbl`
--

CREATE TABLE `day_tbl` (
  `day_id` int(11) NOT NULL,
  `assigned_day` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `day_tbl`
--

INSERT INTO `day_tbl` (`day_id`, `assigned_day`) VALUES
(9, 'T F'),
(10, 'S'),
(11, 'T TH'),
(13, 'S'),
(20, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_tbl`
--

CREATE TABLE `faculty_tbl` (
  `ID` int(11) NOT NULL,
  `emp_number` varchar(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `date_hired` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `background_field` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_tbl`
--

INSERT INTO `faculty_tbl` (`ID`, `emp_number`, `fname`, `date_hired`, `status`, `background_field`, `address`, `contact_no`, `user_email`, `user_pass`) VALUES
(21, '16-05', 'Baronia, Fe R.', '2017-12-01', 'Full-time Faculty', 'Social Sciences', 'Mulanay, Quezon', '09123456789', 'febaronia@gmail.com', 'a789c1874ef126f6c09f6d5006a24e70'),
(33, '16-02', 'Janoras, Annabel S.', '2017-12-01', 'Full-time Faculty', 'Social Sciences', 'Unisan, Quezon', '09213456789', 'annabeljanoras@gmail.com', '3bc20dc01341f7a7f7e10977d40934bc');

-- --------------------------------------------------------

--
-- Table structure for table `room_tbl`
--

CREATE TABLE `room_tbl` (
  `room_id` int(11) NOT NULL,
  `room` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_tbl`
--

INSERT INTO `room_tbl` (`room_id`, `room`) VALUES
(1, '101'),
(2, '102'),
(3, '103'),
(4, '108');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_tbl`
--

CREATE TABLE `schedule_tbl` (
  `ID` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `days` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_tbl`
--

INSERT INTO `schedule_tbl` (`ID`, `subject`, `days`, `time`, `room`, `fname`) VALUES
(52, 'Web Development', 'T F', '7:30-10:30', '105', 'Baronia, Fe R.'),
(53, 'Web Development', 'M W', '7:30-9:00', '101', 'Villalon, Ryan P.');

-- --------------------------------------------------------

--
-- Table structure for table `signatory_tbl`
--

CREATE TABLE `signatory_tbl` (
  `id` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `sdesignation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signatory_tbl`
--

INSERT INTO `signatory_tbl` (`id`, `sname`, `sdesignation`) VALUES
(3, 'Jocelyn L. Llano', 'Accounting Clerk'),
(4, 'Dr. EDWIN G. MALABUYOC', 'Director and Head, Academic Programs');

-- --------------------------------------------------------

--
-- Table structure for table `subject_tbl`
--

CREATE TABLE `subject_tbl` (
  `ID` int(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `subject_description` varchar(255) NOT NULL,
  `unit` int(11) NOT NULL,
  `lecture` int(11) NOT NULL,
  `laboratory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_tbl`
--

INSERT INTO `subject_tbl` (`ID`, `subject_code`, `subject_description`, `unit`, `lecture`, `laboratory`) VALUES
(2, 'COMP 2093', 'Web Development', 3, 2, 3),
(3, 'COMP 2283', 'Computer Programming', 3, 2, 3),
(4, 'COMP 2283', 'Professional Ethics', 3, 2, 2),
(6, 'COMP 2483', 'Hardware Servicing', 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `time_tbl`
--

CREATE TABLE `time_tbl` (
  `time_id` int(11) NOT NULL,
  `class_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_tbl`
--

INSERT INTO `time_tbl` (`time_id`, `class_time`) VALUES
(1, '7:30-9:00'),
(2, '9:00-10:30'),
(3, '10:30-12:00'),
(4, '12:00-1:30'),
(5, '1:30-3:00'),
(6, '3:00-4:30'),
(7, '4:30-6:00'),
(10, '5:30-8:30'),
(12, 'M');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_pass`) VALUES
(17, 'jhunelpenaflorida@gmail.com', 'b014fdb61934b37e13ca0d9c1d770e73');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_tbl`
--
ALTER TABLE `day_tbl`
  ADD PRIMARY KEY (`day_id`);

--
-- Indexes for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UNIQUE` (`emp_number`);

--
-- Indexes for table `room_tbl`
--
ALTER TABLE `room_tbl`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `schedule_tbl`
--
ALTER TABLE `schedule_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `signatory_tbl`
--
ALTER TABLE `signatory_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `time_tbl`
--
ALTER TABLE `time_tbl`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `day_tbl`
--
ALTER TABLE `day_tbl`
  MODIFY `day_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `room_tbl`
--
ALTER TABLE `room_tbl`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schedule_tbl`
--
ALTER TABLE `schedule_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `signatory_tbl`
--
ALTER TABLE `signatory_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `subject_tbl`
--
ALTER TABLE `subject_tbl`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `time_tbl`
--
ALTER TABLE `time_tbl`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
