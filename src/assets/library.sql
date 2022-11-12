-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 03:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `Username`, `Password`) VALUES
(3, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Id` int(11) NOT NULL,
  `Title` varchar(250) NOT NULL,
  `Author` varchar(250) NOT NULL,
  `Date_release` varchar(250) NOT NULL,
  `Genre` varchar(250) NOT NULL,
  `Cover_img` varchar(250) NOT NULL,
  `Publisher` varchar(250) NOT NULL,
  `Language` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Id`, `Title`, `Author`, `Date_release`, `Genre`, `Cover_img`, `Publisher`, `Language`) VALUES
(1, 'New ENGLISH-FILIPINO DICTIONARY', 'Rosario P. Nem Singh', '2017', 'Dictionary', '', 'ISA-JECHO PUBLISHING,INC.', ''),
(2, 'BUSINESS ENGLISH Correspondence', 'Fe O. Aquino, Consuelo C. Callang, Hermina S. Bas, Crisologa B. Capili', '2000', '', '', '', ''),
(4, 'hint', 'enerjhun', '2003-11-29', 'horror', 'hint-20221103063454.png', 'lmoa', 'english'),
(5, 'math', 'wilven', '1999-01-11', 'academic', 'math-20221103063843.jpg', 'acad', 'english'),
(6, 'lmao', 'lmao', '2000-01-01', 'null', 'lmao20221103064011.png', 'null', 'english');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `Id` int(11) NOT NULL,
  `FN` varchar(255) NOT NULL,
  `LN` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`Id`, `FN`, `LN`, `Password`, `Username`) VALUES
(1, 'Desiree', 'Aquiatin', 'saythenameseventeen', ''),
(2, 'Enerjhun', 'Relon', '1', '1'),
(4, 'Maria Angelica Violeta', 'Agustin', 'Violet123', ''),
(5, 'Kelly ', 'Cabasal', 'Kellykels', ''),
(6, 'Jay Prince', 'Mangmang', 'Jay12345', ''),
(7, 'Charley', 'Emprese', '@11211122', ''),
(8, 'staff', 'ln', '1', 'st');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `FN` varchar(255) NOT NULL,
  `LN` varchar(255) NOT NULL,
  `Student_no` varchar(15) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Grade_sec` varchar(50) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Contact_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `FN`, `LN`, `Student_no`, `Password`, `Grade_sec`, `Email`, `Contact_no`) VALUES
(1, 'Desiree', 'Aquiatin', '1', 'saythenameseventeen', '', '0', ''),
(2, 'Enerjhun', 'Relon', '2', '1', '', '0', ''),
(4, 'Maria Angelica Violeta', 'Agustin', '3', 'Violet123', '', '0', ''),
(5, 'Kelly ', 'Cabasal', '4', 'Kellykels', '', '0', ''),
(6, 'Jay Prince', 'Mangmang', '5', 'Jay12345', '', '0', ''),
(7, 'Charley', 'Emprese', '6', '@11211122', '', '0', ''),
(9, 'jordan', 'mariano', '7', '12345', 'Bait 1b', 'jordan@gmail.com', '0923123211'),
(10, 'wertyu', 'wertyui', '123456', '123456', 'wertyui', 'wertyuio', '23456789'),
(11, 'lmao', 'baiter', '6969', '6969', 'ghjk-1b', 'email', '09696969'),
(12, 'wertyuytre', 'wertyuioiuytre', '234567890875', '234567890875', 'wertyuioiuytre', 'wertyuioiuytrew', '3456789987654'),
(13, 'ert', 'rty', '6155678', '6155678', 'rty', 'ty', '567'),
(14, 'asdf', 'rfgh', 'asdf', 'asdf', 'fgh', 'fghj', 'fghj'),
(15, 'yui', 'yuio', 'trtyu', 'trtyu', 'yuio', 'yuio', 'yuio'),
(16, 'e', 'e', '12345', '12345', 'e', 'e', 'e'),
(17, 'w45678', 'qwertyu', '123456789', '123456789', 'wertyui', 'qwertyui', 'wertyui984321`'),
(18, '', '', '', '', '', '', ''),
(19, 'e', 'e', '22-3456', '22-3456', 'hjkl/a', 'e@g', '1'),
(20, 'e', 'e', '22-1234', '22-1234', 'e', 'enerjhunrelon@gmail.com', 'e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
