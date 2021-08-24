-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2020 at 03:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notice`
--

-- --------------------------------------------------------

--
-- Table structure for table `bgframe`
--

CREATE TABLE `bgframe` (
  `id` int(11) NOT NULL,
  `bgframe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bgmusic`
--

CREATE TABLE `bgmusic` (
  `id` int(11) NOT NULL,
  `bgmusic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `board` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board`) VALUES
('b1'),
('b2'),
('b3');

-- --------------------------------------------------------

--
-- Table structure for table `sample`
--

CREATE TABLE `sample` (
  `id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample`
--

INSERT INTO `sample` (`id`) VALUES
('bgmusic'),
('bgmusic'),
('bgmusic');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `type` varchar(150) NOT NULL,
  `size` char(1) NOT NULL,
  `board` char(5) NOT NULL,
  `dur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `name`, `type`, `size`, `board`, `dur`) VALUES
(1, '3.png', 'img', 'l', 'b1', 5),
(1, '3.png', 'img', 'l', 'b2', 5),
(1, '3.png', 'img', 'l', 'b3', 5),
(2, '1.png', 'img', 'l', 'b1', 5),
(2, '1.png', 'img', 'l', 'b2', 5),
(2, '1.png', 'img', 'l', 'b3', 5),
(3, 'Capture.JPG', 'img', 'l', 'b1', 5),
(3, 'Capture.JPG', 'img', 'l', 'b2', 5),
(3, 'Capture.JPG', 'img', 'l', 'b3', 5);

-- --------------------------------------------------------

--
-- Table structure for table `time_slide`
--

CREATE TABLE `time_slide` (
  `time_slide` int(11) DEFAULT '20',
  `id` int(50) NOT NULL,
  `bgmusic` varchar(200) NOT NULL,
  `bgimg` varchar(200) NOT NULL,
  `bgtime` varchar(50) NOT NULL,
  `bg_status` varchar(20) NOT NULL,
  `bgimg_status` varchar(20) NOT NULL,
  `board` char(5) NOT NULL,
  `divide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slide`
--

INSERT INTO `time_slide` (`time_slide`, `id`, `bgmusic`, `bgimg`, `bgtime`, `bg_status`, `bgimg_status`, `board`, `divide`) VALUES
(5, 1, 'default.mp3', 'frame1.png', '21.438383', 'on', 'off', 'b1', 3),
(5, 1, 'default.mp3', 'frmae1.png', '0', 'on', 'off', 'b2', 3),
(5, 2, 'default.mp3', 'frame1.png', '0', 'on', 'off', 'b3', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bgframe`
--
ALTER TABLE `bgframe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bgmusic`
--
ALTER TABLE `bgmusic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`board`);

--
-- Indexes for table `time_slide`
--
ALTER TABLE `time_slide`
  ADD PRIMARY KEY (`board`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bgframe`
--
ALTER TABLE `bgframe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bgmusic`
--
ALTER TABLE `bgmusic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
