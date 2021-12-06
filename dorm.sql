-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2021 at 01:57 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorm`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_log`
--

CREATE TABLE `student_log` (
  `log_id` int(11) NOT NULL,
  `student_name` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `student_id` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `log_type` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `student_log`
--

INSERT INTO `student_log` (`log_id`, `student_name`, `student_id`, `log_type`, `date_time`) VALUES
(1, 'Miko', '19-1324', 'In', '2021-12-06 13:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usr_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usr_id`, `username`, `password`, `email`) VALUES
(1, 'kk', 'kk', 'kk@kk.kk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_log`
--
ALTER TABLE `student_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_log`
--
ALTER TABLE `student_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
