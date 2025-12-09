-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2025 at 07:18 AM
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
-- Database: `wishkolang`
--

-- --------------------------------------------------------

--
-- Table structure for table `wishkolangtbl`
--

CREATE TABLE `wishkolangtbl` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `birth_date` date NOT NULL,
  `wishnimo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishkolangtbl`
--

INSERT INTO `wishkolangtbl` (`id`, `fullname`, `home_address`, `phone_number`, `birth_date`, `wishnimo`) VALUES
(1, 'chu', 'zone3 lower', '09123456789', '2021-04-13', '1million'),
(2, 'chu', 'zone3 lower', '09123456789', '2021-04-13', '1million'),
(3, 'chu', 'zone3 lower', '09123456789', '2021-04-13', '1million'),
(4, 'chu', 'zone3 lower', '09123456789', '2021-04-13', '1million'),
(5, 'Ivong', 'carmen', '123 456 789', '2004-02-14', 'Land Cruiser'),
(6, 'student1 student1', 'sef', '09123456789', '2025-12-04', 'House n Lot');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wishkolangtbl`
--
ALTER TABLE `wishkolangtbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wishkolangtbl`
--
ALTER TABLE `wishkolangtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
