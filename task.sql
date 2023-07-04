-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2023 at 09:26 PM
-- Server version: 8.0.33
-- PHP Version: 8.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginform`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesstype`
--

CREATE TABLE `accesstype` (
  `accessid` int NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `accesstype`
--

INSERT INTO `accesstype` (`accessid`, `type`) VALUES
(1, 'Admin'),
(2, 'Student'),
(3, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`) VALUES
(1, 'sci_ch5'),
(2, 'sci_ch2'),
(3, 'math_ch1'),
(5, 'sci_ch3'),
(7, 'sci_ch10');

-- --------------------------------------------------------

--
-- Table structure for table `standards`
--

CREATE TABLE `standards` (
  `id` int NOT NULL,
  `std_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `standards`
--

INSERT INTO `standards` (`id`, `std_name`) VALUES
(3, 'fifth'),
(4, 'sixth'),
(5, 'seventh'),
(7, 'first'),
(8, 'second'),
(9, 'third'),
(10, 'fourth'),
(11, 'eighth'),
(12, 'ninth'),
(13, 'tenth'),
(14, '11 science'),
(15, '11 commerce'),
(16, '11 arts'),
(17, '12 commerce'),
(19, '12 science'),
(20, '12 arts');

-- --------------------------------------------------------

--
-- Table structure for table `standard_subject`
--

CREATE TABLE `standard_subject` (
  `id` int NOT NULL,
  `std_id` int NOT NULL,
  `sub_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `standard_subject`
--

INSERT INTO `standard_subject` (`id`, `std_id`, `sub_id`) VALUES
(1, 4, 3),
(2, 3, 3),
(3, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `student_standard`
--

CREATE TABLE `student_standard` (
  `id` int NOT NULL,
  `student_id` int NOT NULL,
  `std_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_standard`
--

INSERT INTO `student_standard` (`id`, `student_id`, `std_id`) VALUES
(1, 2, 4),
(2, 2, 3),
(3, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int NOT NULL,
  `sub_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `sub_name`) VALUES
(2, 'science'),
(3, 'math'),
(4, 'gujarati'),
(5, 'hindi'),
(6, 'sunskrit'),
(7, 'physics'),
(8, 'chemistry'),
(9, 'drawing'),
(10, 'social science'),
(11, 'english'),
(12, 'marathi'),
(13, 'computer');

-- --------------------------------------------------------

--
-- Table structure for table `subject_chapter`
--

CREATE TABLE `subject_chapter` (
  `id` int NOT NULL,
  `chpt_id` int NOT NULL,
  `sub_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject_chapter`
--

INSERT INTO `subject_chapter` (`id`, `chpt_id`, `sub_id`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `firstname`, `lastname`, `email`, `age`, `password`, `image`) VALUES
(1, 'ketu', 'sojitra', 'ketu@gmail.com', 21, '123', 'pp.jpeg'),
(2, 'pathik', 'lakkad', 'pl@gmail.com', 20, '123', ''),
(3, 'ram', 'setu', 'ram@gmail.com', 56, '123', NULL),
(4, 'd', 'z', 'dz@gmail.com', 12, '123', ''),
(5, 'archu', 'panseriya', 'a@gmail.com', 20, '123', NULL),
(6, 'rahul', 'dua', 'rahul@gmail.com', 44, '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `access_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`id`, `user_id`, `access_type`) VALUES
(5, 1, 'Admin'),
(6, 2, 'Student'),
(8, 3, 'Teacher'),
(9, 4, 'Student'),
(10, 5, 'Student'),
(11, 6, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standard_subject`
--
ALTER TABLE `standard_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_standard`
--
ALTER TABLE `student_standard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_chapter`
--
ALTER TABLE `subject_chapter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `standards`
--
ALTER TABLE `standards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `standard_subject`
--
ALTER TABLE `standard_subject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_standard`
--
ALTER TABLE `student_standard`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subject_chapter`
--
ALTER TABLE `subject_chapter`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
