-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 07:21 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparks_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `sno` int(3) NOT NULL,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 'Raj', 'Akshay', 1500, '2021-08-05 18:08:56'),
(2, 'Raj', 'Max', 900, '2021-08-09 18:08:56'),
(3, 'Max', 'Pranav', 1000, '2021-08-11 14:55:43'),
(4, 'Vinit', 'Akshay', 1000, '2021-08-12 14:58:55'),
(5, 'Rajesh', 'Nishant', 5000, '2021-08-12 21:49:16'),
(6, 'Pranav', 'Raj', 5000, '2021-08-13 20:41:06'),
(7, 'Nishant', 'Akshay', 5000, '2021-08-13 23:34:40'),
(8, 'Max', 'Sanket', 5000, '2021-08-14 10:42:24'),
(9, 'Pranav', 'Max', 1200, '2021-08-16 14:55:20'),
(10, 'Vinit', 'Max', 1200, '2021-08-17 12:04:40'),
(11, 'Raj', 'Akshay', 50, '2021-08-17 12:58:39'),
(12, 'Vinit', 'Guru', 400, '2021-08-18 12:15:43'),
(13, 'Nishant', 'Vinit', 50, '2021-08-18 12:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Raj', 'Raj01@gmail.com', 49950),
(2, 'Max', 'Max05@gmail.com', 32400),
(3, 'Pranav', 'Pranav26@gmail.com', 38700),
(4, 'Vinit', 'Vinit14@gmail.com', 8450),
(5, 'Akshay', 'Akshay03@gmail.com', 40050),
(6, 'Guru', 'gurunath04@gmail.com', 20390),
(7, 'Nishant', 'Nishantkesh24@gmail.com', 49959),
(8, 'Sanket', 'sanket17@gmail.com', 40100),
(9, 'ketan', 'ketan388@gmail.com', 30000),
(10, 'Rajesh', 'Rajesh21@gmail.com', 50001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
