-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2016 at 07:10 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsaxberg`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `actID` int(11) NOT NULL,
  `campID` int(11) NOT NULL,
  `activity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`actID`, `campID`, `activity`) VALUES
(1, 1, 'php'),
(3, 1, 'laughs'),
(5, 1, 'Fun'),
(6, 2, 'Play');

-- --------------------------------------------------------

--
-- Table structure for table `camps`
--

CREATE TABLE `camps` (
  `campID` int(11) NOT NULL,
  `camp` varchar(50) CHARACTER SET ascii NOT NULL,
  `date` date NOT NULL,
  `city` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `camps`
--

INSERT INTO `camps` (`campID`, `camp`, `date`, `city`, `price`) VALUES
(1, 'camp1', '2016-05-04', 'Santa Barbara, Ca', 3),
(2, 'camp2', '2016-06-04', 'Santa Clara, Ca', 4),
(4, 'something', '0000-00-00', 'mclean, Va', 10),
(5, 'camp4', '2016-04-21', 'new zealand', 50);

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `childID` int(11) NOT NULL,
  `child` text NOT NULL,
  `age` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` text NOT NULL,
  `parent` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`childID`, `child`, `age`, `grade`, `phone`, `email`, `parent`) VALUES
(99, 'bob', 12, 6, 1234567890, 'something@gmail.com', 'joe'),
(100, 'haakon', 0, 0, 0, 'torsaxberg@gmail.com', 'joe'),
(101, 'haak', 0, 0, 0, 'torsaxberg@gmail.com', 'joe'),
(102, 'bill', 0, 0, 0, 'torsaxberg@gmail.com', 'joe'),
(103, 'alex', 0, 0, 0, 'torsaxberg@gmail.com', 'joe'),
(104, 'tor', 0, 0, 0, 'torsaxberg@gmail.com', 'denise');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemID` int(11) NOT NULL,
  `item` text NOT NULL,
  `image` text NOT NULL,
  `fee` int(11) NOT NULL,
  `info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemID`, `item`, `image`, `fee`, `info`) VALUES
(6, 'computer', 'items/computer.jpg', 500, 'Magical swirling vortex included'),
(7, 'keyboard', 'items/keyboard.jpg', 30, 'a simple keyboard'),
(8, 'Mouse', 'items/mouse.jpg', 20, 'It doesn''t bite'),
(9, 'shovel', 'items/shovel.jpg', 10, 'For your other computer');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(11) NOT NULL,
  `childID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `childID`, `price`, `itemID`, `count`, `card`, `cvv`) VALUES
(25, 103, 500, 6, 5, 0, 0),
(28, 103, 20, 8, 1, 0, 0),
(48, 103, 6, 7, 2, 0, 0),
(49, 101, 3, 9, 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `registerID` int(11) NOT NULL,
  `campID` int(11) NOT NULL,
  `childID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`registerID`, `campID`, `childID`, `price`, `card`, `cvv`) VALUES
(86, 1, 99, 3, 0, 0),
(87, 2, 99, 4, 0, 0),
(90, 2, 102, 4, 0, 0),
(92, 4, 102, 10, 0, 0),
(100, 5, 103, 15, 0, 0),
(104, 2, 103, 2, 0, 0),
(105, 4, 103, 5, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`actID`),
  ADD KEY `campID` (`campID`);

--
-- Indexes for table `camps`
--
ALTER TABLE `camps`
  ADD PRIMARY KEY (`campID`),
  ADD UNIQUE KEY `camp` (`camp`);

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`childID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemID`),
  ADD UNIQUE KEY `itemID` (`itemID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `childID` (`childID`),
  ADD KEY `itemID` (`itemID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`registerID`),
  ADD KEY `childID` (`childID`),
  ADD KEY `campID` (`campID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `actID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `camps`
--
ALTER TABLE `camps`
  MODIFY `campID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `childID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `registerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`campID`) REFERENCES `camps` (`campID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`itemID`) REFERENCES `items` (`itemID`),
  ADD CONSTRAINT `payment_ibfk_4` FOREIGN KEY (`childID`) REFERENCES `children` (`childID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`childID`) REFERENCES `children` (`childID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`campID`) REFERENCES `camps` (`campID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
