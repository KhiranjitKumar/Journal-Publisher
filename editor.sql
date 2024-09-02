-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 06:53 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `editor`
--

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `article_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `author_name` text NOT NULL,
  `coauthor` text NOT NULL,
  `article_name` text NOT NULL,
  `article_intro` text NOT NULL,
  `affiliation` text NOT NULL,
  `article_body` text NOT NULL,
  `result` text NOT NULL,
  `abstract` text NOT NULL,
  `conclusion` text NOT NULL,
  `refer` text NOT NULL,
  `images` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`article_id`, `id`, `author_name`, `coauthor`, `article_name`, `article_intro`, `affiliation`, `article_body`, `result`, `abstract`, `conclusion`, `refer`, `images`) VALUES
(1, 1, '', '', '', '', '', '', '', '', '', '', ''),
(2, 2, '', '', '<p>lbjugfvk,bnugckhb</p>\r\n', '', '', '', '', '', '', '', ''),
(3, 1, '', '', '<p style=\"text-align:center\"><u><strong>khiranjit kumar deka</strong></u></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:24px\"><u><strong>assam down town university a</strong></u></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:24px\"><strong><u>i</u></strong></span></p>\r\n', '', '', '', '', '', '', '', ''),
(4, 3, '', '', '<p style=\"text-align:center\"><u><strong>khiranjit kumar deka</strong></u></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:24px\"><u><strong>assam down town university a</strong></u></span></p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:24px\"><strong><u>i</u></strong></span></p>\r\n', '', '', '', '', '', '', '', ''),
(5, 2, '', '', '<p>khiranjit kumae deka</p>\r\n', '', '', '', '', '', '', '', ''),
(6, 4, '', '', '<p>DATABASE CONNECTION SUCCESSFULL</p>\r\n', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'demo', 'demo@gmail.com', 'demo'),
(2, 'abhi', 'abhi@gmail.com', 'abhi'),
(3, 'jyoti', 'jyoti@gmail.com', 'jyoti'),
(4, 'adtu', 'adtu@gmail.com', 'adtu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`article_id`),
  ADD UNIQUE KEY `article_id` (`article_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `userid` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
