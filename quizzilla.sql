-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 08:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzilla`
--

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `email_student` varchar(255) NOT NULL,
  `id_quiz` varchar(7) NOT NULL,
  `date_answer` datetime NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`email_student`, `id_quiz`, `date_answer`, `score`) VALUES
('coki@gmail.com', 'io', '2021-12-21 00:02:09', 2),
('coki@gmail.com', 'io', '2021-12-21 00:04:07', 0),
('coki@gmail.com', 'io', '2021-12-21 00:04:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id_question` int(3) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `option_a` varchar(100) NOT NULL,
  `option_b` varchar(100) NOT NULL,
  `option_c` varchar(100) DEFAULT NULL,
  `option_d` varchar(100) DEFAULT NULL,
  `id_quiz` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `question`, `answer`, `option_a`, `option_b`, `option_c`, `option_d`, `id_quiz`) VALUES
(38, 'What does HTML stand for?', 'Hyper Text Markup Language', 'Home Tool Markup Language', 'Hyper Text Markup Language', 'Hyperlinks and Text Markup Language', '', 'io'),
(39, 'Who is making the Web standards?', 'The World Wide Web Consortium', 'Google', 'The World Wide Web Consortium', 'Mozilla', 'Microsoft', 'io'),
(40, 'Which character is used to indicate an end tag?', '/', '*', '^', '/', '<', 'io');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id_quiz` varchar(7) NOT NULL,
  `title_quiz` varchar(255) NOT NULL,
  `email_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id_quiz`, `title_quiz`, `email_teacher`) VALUES
('io', 'mokmk', 'hadi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `email_parents` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`email`, `password`, `name`, `school`, `class`, `email_parents`) VALUES
('coki@gmail.com', 'ebd7e137f9a087716ff7de774de51fd3', 'coki', 'smk', '1a', 'salmanharizu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`email`, `password`, `name`) VALUES
('hadi@gmail.com', 'f9faf5c5c084370a4c2b878c7c40926b', 'hadizakaria');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`date_answer`),
  ADD KEY `email_student` (`email_student`) USING BTREE,
  ADD KEY `performance_ibfk_2` (`id_quiz`) USING BTREE;

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`),
  ADD KEY `id_quiz` (`id_quiz`) USING BTREE;

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quiz`),
  ADD KEY `email_teacher` (`email_teacher`) USING BTREE;

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`email`),
  ADD KEY `student_ibfk_1` (`email_parents`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_ibfk_1` FOREIGN KEY (`email_student`) REFERENCES `student` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `performance_ibfk_2` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_quiz`) REFERENCES `quiz` (`id_quiz`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`email_teacher`) REFERENCES `teacher` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
