-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 12:26 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homage`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `film_id` int(11) NOT NULL,
  `film_name` varchar(255) NOT NULL,
  `film_director` varchar(50) NOT NULL,
  `film_writer` varchar(50) NOT NULL,
  `film_production` varchar(255) NOT NULL,
  `film_synopsis` varchar(255) NOT NULL,
  `film_dir` varchar(255) NOT NULL,
  `film_poster` varchar(255) NOT NULL,
  `film_statement` varchar(255) NOT NULL,
  `film_uamid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`film_id`, `film_name`, `film_director`, `film_writer`, `film_production`, `film_synopsis`, `film_dir`, `film_poster`, `film_statement`, `film_uamid`) VALUES
(1, 'Eskina', 'Conrad Dela Cruz', 'Conrad Dela Cruz', 'Betamax Films', 'A drug dealer tries to cope up with his sister s kidney transplant in the modern day suburbs of Davao City.', 'Eskina.mp4', 'eskina.png', 'blah blah blah', 8),
(2, 'Once upon a time in Davao City', 'Conrad Dela Cruz', 'Conrad Dela Cruz', 'Betmax Films', 'A struggling guitarist is caught up into the underbelly of syndicate as he tries to survive in modern day Davao City.', 'OnceuponATimeinDavaoCitySHortfilm.mp4', 'OUDC.jpg', 'bleh bleh bleh', 8);

-- --------------------------------------------------------

--
-- Table structure for table `like_unlike`
--

CREATE TABLE `like_unlike` (
  `like_id` int(11) NOT NULL,
  `like_uamid` int(11) NOT NULL,
  `like_filmid` int(11) NOT NULL,
  `type` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_unlike`
--

INSERT INTO `like_unlike` (`like_id`, `like_uamid`, `like_filmid`, `type`, `timestamp`) VALUES
(1, 8, 1, 1, '2018-05-15 08:35:25'),
(2, 8, 2, 0, '2018-05-15 08:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `uam`
--

CREATE TABLE `uam` (
  `uam_id` int(11) NOT NULL,
  `uam_username` varchar(100) NOT NULL,
  `uam_emailadd` varchar(60) NOT NULL,
  `uam_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uam`
--

INSERT INTO `uam` (`uam_id`, `uam_username`, `uam_emailadd`, `uam_password`) VALUES
(1, 'admin', 'admin@yahoo.com', '123'),
(8, 'test', 'test@test.com', '123'),
(9, 'test2', 'test2@yahoo.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`film_id`),
  ADD KEY `film_uamid` (`film_uamid`);

--
-- Indexes for table `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `like_uamid` (`like_uamid`),
  ADD KEY `like_filmid` (`like_filmid`);

--
-- Indexes for table `uam`
--
ALTER TABLE `uam`
  ADD PRIMARY KEY (`uam_id`),
  ADD UNIQUE KEY `uam_emailadd` (`uam_emailadd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `like_unlike`
--
ALTER TABLE `like_unlike`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uam`
--
ALTER TABLE `uam`
  MODIFY `uam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`film_uamid`) REFERENCES `uam` (`uam_id`);

--
-- Constraints for table `like_unlike`
--
ALTER TABLE `like_unlike`
  ADD CONSTRAINT `like_unlike_ibfk_1` FOREIGN KEY (`like_uamid`) REFERENCES `uam` (`uam_id`),
  ADD CONSTRAINT `like_unlike_ibfk_2` FOREIGN KEY (`like_filmid`) REFERENCES `film` (`film_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
