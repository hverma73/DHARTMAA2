-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 08:46 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhartimaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Aquatic Plant'),
(3, 'Avenue trees'),
(5, 'Cactus'),
(7, 'Climbers & Creepers');

-- --------------------------------------------------------

--
-- Table structure for table `category_type`
--

CREATE TABLE `category_type` (
  `id` int(11) NOT NULL,
  `category_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_type`
--

INSERT INTO `category_type` (`id`, `category_type`) VALUES
(1, 'Indoor'),
(2, 'Outdoor');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `botnical_name` text NOT NULL,
  `description` varchar(200) NOT NULL,
  `rate` decimal(18,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_type_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `item_name`, `botnical_name`, `description`, `rate`, `category_id`, `category_type_id`, `image`) VALUES
(1, 'Spider Lily', 'Spider Lily', 'Also known as Grand crinum lily, Poison Bulb, Giant Crinum Lily, Spider Lily, Nagadamani.Plant is 2 to 4 feet tall.Bloom time is between July to August.Plant has white flowers.This plant is used for m', '25.00', 1, 1, 'http://192.168.0.12/DhartiMaaLive/PI_1.jpg'),
(3, 'Ashoka Tree', 'Ashoka Tree', 'Ashoka is ever-green, slender but slow-growing flowering tree. It is easy-to-grow, an easy-to-prune tree that flowers abundantly and an ideal candidate as a house-plant or a lawn tree. Ashoka tree pro', '412.00', 3, 1, 'http://192.168.0.12/DhartiMaaLive/PI_3.jpg'),
(4, 'Bunny Ears Cactus', 'Bunny Ears Cactus', 'Also known as Bunny Ears Cactus,Golden-bristle cactus,or polka-dot cactus.It is up to 3 to 4 ft tall, It can be developed a dense shrub.It has no spines but has glochids (hair-like prickles). It has y', '60.00', 5, 1, 'http://192.168.0.12/DhartiMaaLive/PI_4.jpg'),
(5, 'Aristolochia', 'Aristolochia', 'It is a perennial plant growing to height of 0.4 m (1ft 4in). Commonly known as Indian Root, Virginia Snakeroot, Arizona Snakeroot, Texas Dutchmans Pipe.Its bloom time is from May to July.The colour o', '25.00', 7, 1, 'http://192.168.0.12/DhartiMaaLive/PI_5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_header_id` int(11) NOT NULL,
  `item_name` text NOT NULL,
  `quantity` int(10) NOT NULL,
  `rate` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_header_id`, `item_name`, `quantity`, `rate`) VALUES
(19, 35, 'Spider Lily', 1, '25.00'),
(20, 36, 'Spider Lily', 1, '25.00'),
(21, 37, 'Spider Lily', 3, '25.00'),
(22, 37, 'Ashoka Tree', 1, '412.00'),
(23, 38, 'Spider Lily', 2, '25.00'),
(24, 38, 'Aristolochia', 1, '25.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_header`
--

CREATE TABLE `order_header` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_no` varchar(20) NOT NULL,
  `customername` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_header`
--

INSERT INTO `order_header` (`id`, `user_id`, `order_no`, `customername`, `email`, `address`, `mobile`) VALUES
(35, 22, '02072019115722', 'Gareth Bale', 'gb@gmail.com', '129,revenue copony bear annapurna road', '9131441737'),
(36, 21, '02072019173238', 'Harsh Verma', 'Hv9630592@gmail.com', '129,revenue copony bear annapurna road', '9131441737'),
(37, 23, '04072019173007', 'Sangeeta Verma', 'sangeetaverma@17.com', '129,revenue copony bear annapurna road', '9131441737'),
(38, 23, '08072019180803', 'Harsh Verma', 'Hv9630592@gmail.com', '129,revenue copony bear annapurna road', '9131441737');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobileno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `mobileno`) VALUES
(21, 'arun', 'sungh', 'as@gmail.com', '12345', '9713366008'),
(22, 'Gareth', 'Bale', 'gb@gmail.com', '123', '9713366008'),
(23, 'shaurya', 'misra', 'shaurya877@gmail.com', '123', '7985767713'),
(24, 'Madharchodh', 'Randibaaz', 'harshkimaakabhosda@s', 'randirona', '6262179962'),
(25, 'Harsh', 'Verma', 'Hv9630592@gmail.com', 'harshvm73', '9131441737'),
(26, 'Rajesh', 'rakshit', 'rk@gmail.com', '1230', '9713366008');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_type`
--
ALTER TABLE `category_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_header`
--
ALTER TABLE `order_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_type`
--
ALTER TABLE `category_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_header`
--
ALTER TABLE `order_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
