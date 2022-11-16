-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 03:00 AM
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
  `Author` varchar(250) NOT NULL DEFAULT 'not defined',
  `Date_release` varchar(250) NOT NULL DEFAULT '00-00-0000',
  `Genre` varchar(250) NOT NULL DEFAULT 'not defined	',
  `Cover_img` varchar(250) NOT NULL,
  `Publisher` varchar(250) NOT NULL DEFAULT 'not defined	',
  `Language` varchar(250) NOT NULL DEFAULT 'not defined	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Id`, `Title`, `Author`, `Date_release`, `Genre`, `Cover_img`, `Publisher`, `Language`) VALUES
(1, 'New ENGLISH-FILIPINO DICTIONARY', 'Rosario P. Nem Singh', '00-00-0000', 'Dictionary', 'hint-20221103063454.png', 'ISA-JECHO PUBLISHING,INC.', 'english'),
(2, 'BUSINESS ENGLISH Correspondence', 'Fe O. Aquino, Consuelo C. Callang, Hermina S. Bas, Crisologa B. Capili', '00-00-0000', 'not defined', 'hint-20221103063454.png', 'jj', 'not defined'),
(4, 'hint', 'enerjhun', '2003-11-29', 'horror', 'hint-20221103063454.png', 'lmoa', 'english'),
(5, 'one hint', 'wilven', '1999-01-11', 'academic', 'math-20221103063843.jpg', 'acad', 'english'),
(6, 'what is the hint', 'lmao', '2000-01-01', 'null', 'lmao20221103064011.png', 'null', 'english'),
(7, 'the hint', 'enerjhun', '2003-11-29', 'horror', 'hint-20221103063454.png', 'lmoa', 'english'),
(12, 'dfghbjnkl', 'xcvbhnjmkl,;.', '00-00-0000', 'xcvbnm,.', 'dfghbjnkl20221110132625.png', 'sadfg', 'not defined'),
(13, 'sdfghj', 'sdfghjk', '00-00-0000', 'fghjk', 'sdfghj20221111050644.jpg', 'xzcvbnm', 'not defined');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `Id` int(11) NOT NULL,
  `Borrower` int(255) NOT NULL,
  `Book` int(255) NOT NULL,
  `Date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`Id`, `Borrower`, `Book`, `Date`) VALUES
(1, 1, 1, '11-11-2022');

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
(1, 'Des', 'Paeste', '22-0562', '2', '', '0', ''),
(2, 'Enerjhun', 'Relon', '2', '1', '', '0', ''),
(4, 'Maria Angelica Violeta', 'Agustin', '3', 'Violet123', '', '0', ''),
(5, 'Kelly ', 'Cabasal', '4', 'Kellykels', '', '0', ''),
(6, 'Jay Prince', 'Mangmang', '5', 'Jay12345', '', '0', ''),
(7, 'Charley', 'Emprese', '6', '@11211122', '', '0', ''),
(9, 'jordan', 'mariano', '7', '12345', 'Bait 1b', 'jordan@gmail.com', '0923123211'),
(10, 'jeyel', 'Padauan', '22-0564', 'turk', 'BAENT 1A', 'wertyuio', '23456789'),
(11, 'lmao', 'baiter', '6969', '6969', 'ghjk-1b', 'email', '09696969'),
(12, 'wertyuytre', 'wertyuioiuytre', '234567890875', '234567890875', 'wertyuioiuytre', 'wertyuioiuytrew', '3456789987654'),
(13, 'ert', 'rty', '6155678', '6155678', 'rty', 'ty', '567'),
(14, 'asdf', 'rfgh', 'asdf', 'asdf', 'fgh', 'fghj', 'fghj'),
(15, 'yui', 'yuio', 'trtyu', 'trtyu', 'yuio', 'yuio', 'yuio'),
(16, 'e', 'e', '12345', '12345', 'e', 'e', 'e'),
(17, 'w45678', 'qwertyu', '123456789', '123456789', 'wertyui', 'qwertyui', 'wertyui984321`'),
(18, '', '', '', '', '', '', ''),
(19, 'e', 'e', '22-3456', '22-3456', 'hjkl/a', 'e@g', '1'),
(20, 'e', 'e', '22-1234', '22-1234', 'e', 'enerjhunrelon@gmail.com', 'e'),
(21, 'e', 'e', '22-6969', '22-6969', 'g', 'erer@gmail.com', '0987654'),
(22, 'e', 'e', '22-6666', '22-6666', 'e/e', 'erer@gmail.com', '0987654');

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
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
