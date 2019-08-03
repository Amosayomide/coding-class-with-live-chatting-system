-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2019 at 02:12 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `class`
--

-- --------------------------------------------------------

--
-- Table structure for table `biggidroid`
--

CREATE TABLE `biggidroid` (
  `id` int(11) NOT NULL,
  `students_id` varchar(30) NOT NULL,
  `students2_id` int(20) DEFAULT NULL,
  `students_msg` varchar(70) NOT NULL,
  `time` varchar(70) NOT NULL,
  `chatid` varchar(1000) DEFAULT NULL,
  `read2` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biggidroid`
--

INSERT INTO `biggidroid` (`id`, `students_id`, `students2_id`, `students_msg`, `time`, `chatid`, `read2`) VALUES
(12, '24', 27, 'Baba shey dj don come online?', '01:00:52am', '2427', NULL),
(11, '24', 27, 'Hello Bidemi', '01:00:52am', '2427', NULL),
(13, '24', 27, 'Just now ', '01:00:52am', '2427', NULL),
(14, '24', 25, 'DJ how far', '01:22:32am', '2425', NULL),
(15, '24', 28, 'Am cool', '02:58:19pm', '2428', NULL),
(16, '24', 1, 'Okay sir', '05:17:28am', '241', ''),
(17, '24', 1, 'Should i write the code', '05:17:28am', '241', ''),
(18, '24', 1, 'refgdsf', '06:25:31am', '241', ''),
(20, '24', 1, 'Hello', '06:25:31am', '241', ''),
(21, '24', 1, 'Hello', '06:25:31am', '241', ''),
(22, '24', 1, 'How far', '06:25:31am', '241', ''),
(23, '24', 1, 'Am talking sir', '06:25:31am', '241', ''),
(24, '24', 1, 'Hello', '06:25:31am', '241', ''),
(26, '24', 1, 'Am good', '06:25:31am', '241', ''),
(25, '24', 1, 'Hello', '06:25:31am', '241', ''),
(27, '24', 31, 'Hello busayo', '10:50:38am', '2431', ''),
(28, '24', 31, 'Am good o', '10:50:38am', '2431', '');

-- --------------------------------------------------------

--
-- Table structure for table `html`
--

CREATE TABLE `html` (
  `id` int(11) NOT NULL,
  `html` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `html`
--

INSERT INTO `html` (`id`, `html`) VALUES
(1, '<h2 style=\"color:blue;\">Isreal is Good Boy</h2>');

-- --------------------------------------------------------

--
-- Table structure for table `screen`
--

CREATE TABLE `screen` (
  `id` int(11) NOT NULL,
  `screen` text,
  `screen_id` varchar(10000) DEFAULT NULL,
  `screen_chat` text,
  `screen_chat2` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `screen`
--

INSERT INTO `screen` (`id`, `screen`, `screen_id`, `screen_chat`, `screen_chat2`) VALUES
(1, '<code style=\"color:red;\">Hello world</code>\r\n', '2928', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `user_id` int(100) DEFAULT NULL,
  `username` varchar(10000) DEFAULT NULL,
  `time` varchar(1000) DEFAULT NULL,
  `read2` varchar(23) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `user_id`, `username`, `time`, `read2`) VALUES
(66, 24, 'biggidroid', '10:58:12am', NULL),
(65, 31, 'busayo', '10:50:38am', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session_teacher`
--

CREATE TABLE `session_teacher` (
  `id` int(11) NOT NULL,
  `user_id` varchar(1000) DEFAULT NULL,
  `username` varchar(1000) DEFAULT NULL,
  `time` varchar(1000) DEFAULT NULL,
  `read2` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `number` varchar(200) DEFAULT NULL,
  `username` varchar(10000) DEFAULT NULL,
  `password` varchar(10000) DEFAULT NULL,
  `email` varchar(10000) DEFAULT NULL,
  `html` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `number`, `username`, `password`, `email`, `html`) VALUES
(24, '9089089080', 'biggidroid', '1b0e5f02623d653f0f5ce09f6b1e0f54', 'ogunyomitoba54@gmail.com', '<p style=\"color:green;\">Hello world</p>'),
(31, '07034803384', 'busayo', '137ab334ffc24265231dcd11f944ebcd', 'busayo@gmail.com', '<p>Edit this code</p>');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `username` varchar(10000) DEFAULT NULL,
  `password` varchar(10000) DEFAULT NULL,
  `email` varchar(10000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `username`, `password`, `email`) VALUES
(1, 'teacher', '8d788385431273d11e8b43bb78f3aa41', 'adeleyeayodeji12345@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_msg`
--

CREATE TABLE `teacher_msg` (
  `id` int(11) NOT NULL,
  `students_id` varchar(30) NOT NULL,
  `students2_id` varchar(30) NOT NULL,
  `students_msg` varchar(70) NOT NULL,
  `time` varchar(70) NOT NULL,
  `chatid` varchar(70) NOT NULL,
  `read2` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_msg`
--

INSERT INTO `teacher_msg` (`id`, `students_id`, `students2_id`, `students_msg`, `time`, `chatid`, `read2`) VALUES
(1, '1', '24', 'Hello, am your teacher', '05:31:34am', '124', ''),
(2, '1', '24', 'Yes', '05:31:34am', '124', ''),
(3, '1', '24', 'Hello', '12:08:23am', '124', ''),
(4, '1', '24', 'Hey', '12:08:23am', '124', ''),
(5, '1', '24', 'Hello', '12:08:23am', '124', ''),
(6, '1', '24', 'How far', '12:08:23am', '124', ''),
(7, '1', '24', 'Baba', '12:08:23am', '124', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biggidroid`
--
ALTER TABLE `biggidroid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `html`
--
ALTER TABLE `html`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `screen`
--
ALTER TABLE `screen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session_teacher`
--
ALTER TABLE `session_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_msg`
--
ALTER TABLE `teacher_msg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biggidroid`
--
ALTER TABLE `biggidroid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `html`
--
ALTER TABLE `html`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `screen`
--
ALTER TABLE `screen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `session_teacher`
--
ALTER TABLE `session_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_msg`
--
ALTER TABLE `teacher_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
