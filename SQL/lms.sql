-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2021 at 06:51 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_out`
--

DROP TABLE IF EXISTS `book_out`;
CREATE TABLE IF NOT EXISTS `book_out` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `book_name` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `student_id` varchar(2000) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `t_from` date NOT NULL,
  `t_t` date NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book_out`
--

INSERT INTO `book_out` (`s_id`, `book_name`, `student_id`, `s_name`, `t_from`, `t_t`) VALUES
(31, 'computer', '12', 'AQIB', '2021-06-08', '2021-06-25'),
(30, 'web development', '22653', 'hasan', '2021-06-09', '2021-06-16'),
(29, 'computer', '22', 'hasan', '2021-06-12', '2021-06-12'),
(28, 'programming', '22', 'akhtar', '2021-06-16', '2021-06-12'),
(27, 'android', '22', 'hasan', '2021-06-25', '2021-06-11'),
(32, 'android', '12135', 'akhtar', '2021-06-04', '2021-06-18'),
(33, 'c++', 's12', 'hasan', '2021-06-18', '2021-06-19'),
(34, 'android', '22', 'akhtar', '2021-06-25', '2021-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `library_book`
--

DROP TABLE IF EXISTS `library_book`;
CREATE TABLE IF NOT EXISTS `library_book` (
  `b_id` int NOT NULL AUTO_INCREMENT,
  `book_id` varchar(2000) NOT NULL,
  `b_name` varchar(100) NOT NULL,
  `b_category` varchar(200) NOT NULL,
  `b_location` varchar(200) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `library_book`
--

INSERT INTO `library_book` (`b_id`, `book_id`, `b_name`, `b_category`, `b_location`) VALUES
(60, '8746', 'computer', 'BS', 'lahore'),
(49, '874', 'c++', 'computer', 'R1'),
(62, '1213', 'computer', 'BS', 'lahore'),
(59, '1213567890', 'computer', 'BS', 'lahore');

-- --------------------------------------------------------

--
-- Table structure for table `student_book`
--

DROP TABLE IF EXISTS `student_book`;
CREATE TABLE IF NOT EXISTS `student_book` (
  `b_id` int NOT NULL AUTO_INCREMENT,
  `book_id` varchar(50) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `b_category` varchar(200) NOT NULL,
  `b_location` varchar(200) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_book`
--

INSERT INTO `student_book` (`b_id`, `book_id`, `book_name`, `b_category`, `b_location`) VALUES
(47, '874', 'computer', 'BS', 'lahore'),
(42, '12134', 'android', 'BS', 'R1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `firstname`, `lastname`, `username`, `password`) VALUES
(46, 'Ali', 'Farid', 'Kathia', '9876543'),
(45, 'Akhtar', 'ali', 'Akhtar', '9876543');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
