-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 05:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sam`
--

-- --------------------------------------------------------

--
-- Table structure for table `2023_24`
--

CREATE TABLE `2023_24` (
  `house_no` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Water_bill` int(10) NOT NULL,
  `land_bill` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `2023_24`
--

INSERT INTO `2023_24` (`house_no`, `name`, `Water_bill`, `land_bill`, `date`) VALUES
(5, 'Subodh Patil', 1200, 3747, '2023-08-05 22:37:10'),
(6, 'Suhel Maktum', 3600, 5285, '2023-08-11 19:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(40) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `pass`) VALUES
('mahesh@gmail.com', 'Mahesh@123'),
('sakshi@gmail.com', 'Sakshi@123'),
('Shruti@gmail.com', 'Shruti@123'),
('suhel@gmail.com', 'Suhel@123');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `sno` int(10) NOT NULL,
  `house_no` int(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `location` varchar(20) NOT NULL,
  `type` varchar(150) NOT NULL,
  `descr` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`sno`, `house_no`, `name`, `location`, `type`, `descr`, `date`) VALUES
(1, 5, 'Suhel', 'Near main road ', 'Sanitation', 'Dustbin overflow', '2023-09-27 22:27:41'),
(2, 5, 'Suresh Patil', 'Mane Galli', 'Infrastructure', 'Night Lamp Issue', '2023-09-28 00:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `N_id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `img` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `descr` varchar(150) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`N_id`, `category`, `heading`, `img`, `descr`, `date`) VALUES
(1, 'Announcement', 'Tug of war', 'Screenshot (2).png', '  Lorem, ipsum dolor sit amet consectetur adipisicing elit. ', '2023-08-30 15:36:37'),
(2, 'Event', 'Event 1', 'Screenshot (2).png', '  Lorem, Repudiandae voluptatibus qui ab suscipit autem a \r\n', '2023-08-30 15:40:49'),
(3, 'Announcement', 'This Announcement Number 3', 'Screenshot (2).png', 'This is Announcement Number 3', '2023-08-31 09:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `sno` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `contact` int(10) NOT NULL,
  `proof` varchar(200) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`sno`, `name`, `date`, `contact`, `proof`, `type`) VALUES
(1, 'Suhel Maktum', '2003-03-13', 2147483647, 'Screenshot (2).png', 'birth'),
(3, 'Suhel Maktum', '2003-03-13', 2147483647, 'Screenshot (2).png', 'Birth Certificate'),
(5, 'Suhel Maktum', '2023-10-02', 2147483647, 'Screenshot (2).png', 'Death Certificate');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `house_no` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `no_person` int(3) NOT NULL,
  `ward_no` int(3) NOT NULL,
  `water_conn` int(3) NOT NULL,
  `area` int(20) NOT NULL,
  `floor` int(3) NOT NULL,
  `Water_rate` int(10) NOT NULL,
  `Land_rate` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`house_no`, `name`, `phone`, `no_person`, `ward_no`, `water_conn`, `area`, `floor`, `Water_rate`, `Land_rate`, `date`) VALUES
(1, 'Suhel Maktum', 9307834947, 2, 2, 1, 1200, 2, 1200, 4200, '2023-07-31 19:10:14'),
(2, 'Mahesh Patil', 9370813258, 5, 3, 2, 1200, 2, 2400, 3600, '2023-07-31 19:23:18'),
(3, 'Ram Patil', 9307834945, 4, 5, 1, 1200, 3, 1200, 4800, '2023-07-31 19:45:19'),
(4, 'Sourabh Ghatge', 8080852692, 5, 6, 1, 850, 1, 1200, 5550, '2023-08-05 21:24:30'),
(5, 'Subodh Patil', 7709608584, 2, 2, 1, 1250, 1, 1200, 3747, '2023-08-05 22:37:10'),
(6, 'Suhel Maktum', 7410115793, 5, 1, 3, 1510, 2, 3600, 5285, '2023-08-11 19:46:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `2023_24`
--
ALTER TABLE `2023_24`
  ADD PRIMARY KEY (`house_no`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`N_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`house_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `N_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
