-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 07:08 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `resgistration_form`
--

CREATE TABLE `resgistration_form` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `hobbies` varchar(60) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `Gender` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resgistration_form`
--

INSERT INTO `resgistration_form` (`user_id`, `name`, `email`, `password`, `address`, `city`, `hobbies`, `date_of_birth`, `Gender`, `image`) VALUES
(1, 'Jyoti Yadav', 'yadavj9991@gmail.com', '12345', '672-R Model Town, Mall Road, Jalandhar', 'Jalandhar', 'music,read', '1999-09-13', 'female', 'image/184_cafe-1.jpg'),
(2, 'Admin', 'yadav8699120935@gmail.com', '12345', '672-R Model Town, Mall Road, Jalandhar', 'Jalandhar', 'write', '1994-02-14', 'male', 'image/101_brew-3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resgistration_form`
--
ALTER TABLE `resgistration_form`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resgistration_form`
--
ALTER TABLE `resgistration_form`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
