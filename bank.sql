-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 10:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `mobile_num` varchar(15) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `address`, `email`, `mobile_num`, `password`) VALUES
('shirish', 'sankhu', 'sthasiriz123@gmail.c', '9861917467', 'helloworld');

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `mobile_num` varchar(15) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cashier`
--

INSERT INTO `cashier` (`name`, `address`, `email`, `mobile_num`, `password`) VALUES
('arjun', 'phedi', 'orzoontewary@gmail.c', '9898454656', 'helloarjun'),
('prashant', 'salmbutar', 'gyne@gmail.com', '9898989889', 'hellogyne');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Account_num` int(15) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Mobile_num` varchar(20) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Account_num`, `Name`, `Address`, `Age`, `Gender`, `Email`, `Mobile_num`, `Password`, `balance`) VALUES
(100000000, 'shubham', 'ktm', 20, 'male', 'ram@gmail.com', '9869539344', 'kist@123', 10000),
(101010101, 'nirjal', 'chabhil', 19, 'male', 'nirjal@gmail.com', '9869539345', 'P@ss', 0),
(222222222, 'soniya', 'lalitpur', 22, 'female', 'soniya@gmail.com', '9833333333', 'pass', 0),
(500000000, 'Hari', 'jorpati', 32, 'male', 'hari@gmail.com', '9876543210', 'pass', 33000),
(555555555, 'demo', 'sankhu', 22, 'male', 'hello@gmail.com', '9822222222', 'pass', 0),
(777777777, 'manish', 'dhanusa', 21, 'male', 'mahasethmanish63@gma', '9817680523', 'manish', 2500),
(800000000, 'Sita', 'lalitpur', 22, 'female', 'sita@gmail.com', '9811111111', 'pass', 12000),
(888888888, 'avinash sir', 'jorpati', 26, 'male', 'avinash@gmail.com', '9811111111', 'pass', 0),
(900000000, 'Ram', 'sankhamul', 30, 'male', 'ram@gmail.com', '9800000000', 'pass', 10000),
(987456321, 'satkrit', 'jorpati', 22, 'male', 'satkrit15@gmail.com', '9818400974', 'P@ss', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `sender_ac_num` int(11) DEFAULT NULL,
  `receiver_ac_num` int(11) DEFAULT NULL,
  `transaction_amt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `sender_ac_num`, `receiver_ac_num`, `transaction_amt`) VALUES
(11, 500000000, 900000000, 700),
(12, 100000000, 500000000, 2000),
(13, 100000000, 500000000, 3000),
(14, 777777777, 900000000, 2500),
(15, 500000000, 900000000, 14000),
(16, 987456321, 500000000, 2000),
(17, 500000000, 900000000, 2000),
(18, 222222222, 500000000, 5000),
(19, 222222222, 500000000, 1000),
(20, 222222222, 500000000, 2000),
(21, 222222222, 500000000, 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Account_num`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
