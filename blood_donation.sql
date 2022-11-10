-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 03:00 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `area` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `area`, `city`, `state`) VALUES
(1, 'Chinchwad', 'Pune', 'Maharashtra'),
(2, 'Aundh', 'Pune', 'Maharashtra'),
(3, 'Baner', 'Pune', 'Maharashtra'),
(4, 'Balewadi', 'Pune', 'Maharashtra'),
(5, 'Shivajinagar', 'Pune', 'Maharashtra'),
(6, 'Kothrud', 'Pune', 'Maharashtra'),
(7, 'Andheri', 'Mumbai', 'Maharashtra'),
(8, 'Bandra', 'Mumbai', 'Maharashtra'),
(9, 'Borivali', 'Mumbai', 'Maharashtra'),
(10, 'Goregaon', 'Mumbai', 'Maharashtra'),
(11, 'Juhu', 'Mumbai', 'Maharashtra'),
(12, 'Prahlad Nagar', 'Ahmedabad', 'Gujarat'),
(13, 'Chandkheda', 'Ahmedabad', 'Gujarat'),
(14, 'Satellite', 'Ahmedabad', 'Gujarat'),
(15, 'Kalawad Road', 'Rajkot', 'Gujarat'),
(16, '150ft', 'Rajkot', 'Gujarat'),
(17, 'Amin Marg', 'Rajkot', 'Gujarat'),
(18, 'University Road', 'Rajkot', 'Gujarat'),
(19, 'Jagatpura', 'Jaipur', 'Rajasthan'),
(20, 'Kalwar Road', 'Jaipur', 'Rajasthan'),
(21, 'Civil Lines', 'Jaipur', 'Rajasthan'),
(22, 'Ajmer Road', 'Jaipur', 'Rajasthan'),
(23, 'Malviya Nagar', 'Jaipur', 'Rajasthan'),
(24, 'Vaishali Nagar', 'Jaipur', 'Rajasthan');

-- --------------------------------------------------------

--
-- Table structure for table `bootcamps`
--

CREATE TABLE `bootcamps` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bootcamps`
--

INSERT INTO `bootcamps` (`id`, `name`, `address_id`) VALUES
(1, 'Pimpri-Chinchwad Blood Center', 1),
(2, 'Aundh Blood Donation Camp', 2);

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `donor_id` int(11) NOT NULL,
  `bootcamp_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `add_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `username`, `password`, `add_id`) VALUES
(1, 'test', 'test@email.com', 1234567890, 'testuser', 'testuser123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bootcamps`
--
ALTER TABLE `bootcamps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bootcamps`
--
ALTER TABLE `bootcamps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
