-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 06:50 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newmedhelp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `admin_id` int(5) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(20) NOT NULL,
  `admin_address` varchar(50) NOT NULL,
  `admin_phone` varchar(15) NOT NULL,
  `admin_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_address`, `admin_phone`, `admin_dob`) VALUES
(1, 'abir', 'abir@gmail.com', 'abir1234', 'dhanmondi', '01632239612', '2021-09-14'),
(2, 'shad', 'shad@gmail.com', 'shad1234', 'dhaka', '01700000000', '2021-09-29'),
(3, 'Amanta', 'amanta@gmail.com', 'amanta1234', 'dhaka', '01700000000', '2021-09-30'),
(17, 'Chowdhury', 'c@gmail.com', '123456', 'dhaka', '01700000000', '2021-09-30'),
(18, 'Abir Chowdhury', 'x@gmail.com', 'abir1234', 'dhaka', '01700000000', '2021-09-23'),
(19, 'Abir Chowdhury', 'fsd@gmail.com', 'abir1234', 'adf', '01700000000', '2021-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `a_id` int(5) NOT NULL,
  `a_number_plate` varchar(20) NOT NULL,
  `a_locaion` varchar(50) NOT NULL,
  `a_capacity` int(2) NOT NULL,
  `a_type` varchar(10) NOT NULL,
  `a_driver_name` varchar(50) NOT NULL,
  `a_driver_phone` varchar(15) NOT NULL,
  `a_driver_license` varchar(20) NOT NULL,
  `a_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambulance`
--

INSERT INTO `ambulance` (`a_id`, `a_number_plate`, `a_locaion`, `a_capacity`, `a_type`, `a_driver_name`, `a_driver_phone`, `a_driver_license`, `a_status`) VALUES
(2, 'admin  fasfd', 'dhanmondi', 8, 'ICU', 'amanta', '017569635', '8968521', 'Available'),
(17, 'dhaka mettro 12-15-5', 'dhanmondi', 8, 'ICU', 'shad', '0175698745', '8965741', 'Available'),
(18, 'dhaka mettro 12-15-5', 'dhanmondi', 8, 'NON ICU', 'shad', '0175698745', '8965741', 'Available'),
(19, 'admin', 'sental road', 8, 'ICU', 'shad', '0175698745', '8965741', 'Available'),
(30, 'dhaka mettro 11111', 'green road ', 8, 'ICU', 'sagor', '0178654132', '87456821', 'Not Available'),
(31, 'dhaka  999', 'green road ', 8, 'NON-ICU', 'sagor', '0178654132', '87462785', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_call`
--

CREATE TABLE `ambulance_call` (
  `a_id` int(5) NOT NULL,
  `a_number_plate` varchar(20) NOT NULL,
  `a_locaion` varchar(50) NOT NULL,
  `a_capacity` int(2) NOT NULL,
  `a_type` varchar(10) NOT NULL,
  `a_driver_name` varchar(50) NOT NULL,
  `a_driver_phone` varchar(15) NOT NULL,
  `a_driver_license` varchar(50) NOT NULL,
  `a_status` varchar(20) NOT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_id` int(5) DEFAULT NULL,
  `am_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambulance_call`
--

INSERT INTO `ambulance_call` (`a_id`, `a_number_plate`, `a_locaion`, `a_capacity`, `a_type`, `a_driver_name`, `a_driver_phone`, `a_driver_license`, `a_status`, `user_email`, `user_id`, `am_id`) VALUES
(40, 'admin  fasfd', ' dhanmondi ', 8, 'ICU', 'amanta', '017569635', '8968521', 'Available', 'abir@gmail.com', 1, 2),
(41, 'admin  fasfd', ' dhanmondi ', 8, 'ICU', 'amanta', '017569635', '8968521', 'Available', 'abir@gmail.com', 1, 2),
(42, 'dhaka mettro 12-15-5', ' dhanmondi ', 8, 'ICU', 'shad', '0175698745', '8965741', 'Available', 'abir@gmail.com', 1, 17),
(43, 'admin  fasfd', ' dhanmondi ', 8, 'ICU', 'amanta', '017569635', '8968521', 'Available', 'abir@gmail.com', 1, 2),
(44, 'dhaka mettro 12-15-5', ' dhanmondi ', 8, 'ICU', 'shad', '0175698745', '8965741', 'Available', 'abir@gmail.com', 1, 17),
(45, 'admin  fasfd', ' dhanmondi ', 8, 'ICU', 'amanta', '017569635', '8968521', 'Available', 'abir@gmail.com', 1, 2),
(46, 'admin', ' sental road ', 8, 'ICU', 'shad', '0175698745', '8965741', 'Available', 'abir@gmail.com', 1, 19),
(47, 'admin  fasfd', ' dhanmondi ', 8, 'ICU', 'amanta', '017569635', '8968521', 'Available', 'abir@gmail.com', 1, 2),
(48, 'dhaka mettro 11111', 'green road ', 8, 'ICU', 'sagor', '0178654132', '87456821', 'Available', NULL, NULL, NULL),
(49, 'dhaka  999', 'green road ', 8, 'NON-ICU', 'sagor', '0178654132', '87462785', 'Available', NULL, NULL, NULL),
(50, 'dhaka mettro 11111', ' green road  ', 8, 'ICU', 'sagor', '0178654132', '87456821', 'Not Available', 'abir@gmail.com', 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointment`
--

CREATE TABLE `doctor_appointment` (
  `dr_a_id` int(5) NOT NULL,
  `dr_id` int(11) DEFAULT NULL,
  `dorctor_name` varchar(50) NOT NULL,
  `doctor_specialized` varchar(50) NOT NULL,
  `doctor_hospital` varchar(50) NOT NULL,
  `dr_location` varchar(50) DEFAULT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_appointment`
--

INSERT INTO `doctor_appointment` (`dr_a_id`, `dr_id`, `dorctor_name`, `doctor_specialized`, `doctor_hospital`, `dr_location`, `user_email`, `user_id`) VALUES
(15, 26, 'Abir Chowdhury', 'medicine', 'squer hospital', 'panthopoth', 'abir@gmail.com', 1),
(16, 30, 'Jubayer', 'medicine', 'square hospital', 'panthopoth', 'abir@gmail.com', 1),
(17, 29, 'shad', 'neurologist', 'square hospital', 'panthopoth', 'shad@gmail.com', 3),
(18, 28, 'abir', 'neurologist', 'square hospital', 'panthopoth', 'shad@gmail.com', 3),
(19, 24, 'amanta hosain', 'heurt ', 'squer hospital', 'badda', 'abir@gmail.com', 1),
(20, 29, 'shad', 'neurologist', 'square hospital', 'panthopoth', 'shad@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_entry`
--

CREATE TABLE `doctor_entry` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(50) NOT NULL,
  `d_degree` varchar(50) NOT NULL,
  `d_specialization` varchar(50) NOT NULL,
  `d_phone` varchar(15) NOT NULL,
  `d_time` time NOT NULL,
  `d_off_day` varchar(50) NOT NULL,
  `d_hospital_name` varchar(50) NOT NULL,
  `d_hospital_locetion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_entry`
--

INSERT INTO `doctor_entry` (`d_id`, `d_name`, `d_degree`, `d_specialization`, `d_phone`, `d_time`, `d_off_day`, `d_hospital_name`, `d_hospital_locetion`) VALUES
(24, 'amanta hosain', 'M.B.B.S', 'heart', '0170006666', '03:51:00', 'sunday', 'squer hospital', 'badda'),
(26, 'Abir Chowdhury', 'M.B.B.S', 'medicine', '0170006666', '11:00:00', 'sunday', 'squer hospital', 'panthopoth'),
(28, 'abir', 'M.B.B.S', 'neurologist', '01565854621', '07:30:00', 'sunday', 'square hospital', 'panthopoth'),
(29, 'shad', 'M.B.B.S', 'neurologist', '01755641235', '08:30:00', 'fryday', 'square hospital', 'panthopoth'),
(30, 'Jubayer', 'M.B.B.S', 'medicine', '0175985462', '08:30:00', 'fryday', 'square hospital', 'panthopoth');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_user_table`
--

CREATE TABLE `doctor_user_table` (
  `s_id` int(11) NOT NULL,
  `dr_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_user_table`
--

INSERT INTO `doctor_user_table` (`s_id`, `dr_id`, `user_id`, `user_email`) VALUES
(8, 30, 1, 'abir@gmail.com'),
(9, 29, 3, 'shad@gmail.com'),
(10, 30, 1, 'abir@gmail.com'),
(11, 29, 1, 'abir@gmail.com'),
(12, 30, 1, 'abir@gmail.com'),
(13, 28, 1, 'abir@gmail.com'),
(14, 28, 1, 'abir@gmail.com'),
(15, 28, 1, 'abir@gmail.com'),
(16, 28, 1, 'abir@gmail.com'),
(17, 26, 1, 'abir@gmail.com'),
(18, 28, 1, 'abir@gmail.com'),
(19, 28, 1, 'abir@gmail.com'),
(20, 28, 1, 'abir@gmail.com'),
(21, 28, 1, 'abir@gmail.com'),
(22, 28, 1, 'abir@gmail.com'),
(23, 28, 1, 'abir@gmail.com'),
(24, 28, 1, 'abir@gmail.com'),
(25, 28, 1, 'abir@gmail.com'),
(26, 26, 1, 'abir@gmail.com'),
(27, 28, 1, 'abir@gmail.com'),
(28, 28, 1, 'abir@gmail.com'),
(29, 28, 1, 'abir@gmail.com'),
(30, 28, 1, 'abir@gmail.com'),
(31, 26, 1, 'abir@gmail.com'),
(32, 28, 1, 'abir@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_order_table`
--

CREATE TABLE `medicine_order_table` (
  `s_id` int(11) NOT NULL,
  `m_id` int(11) DEFAULT NULL,
  `m_name` varchar(50) DEFAULT NULL,
  `m_power` float(7,2) DEFAULT NULL,
  `m_querntity` int(11) DEFAULT NULL,
  `m_price` float(7,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_order_table`
--

INSERT INTO `medicine_order_table` (`s_id`, `m_id`, `m_name`, `m_power`, `m_querntity`, `m_price`, `user_id`, `user_email`, `status`) VALUES
(28, 38, 'Maxpro Tablet', 40.00, 10, 40.00, 4, 'b@gmail.com', 'Delivered'),
(30, 44, 'Finix', 20.00, 20, 140.00, 4, 'b@gmail.com', 'Delivered'),
(47, 41, 'Ace', 0.00, 10, 10.00, 1, 'abir@gmail.com', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `m_id` int(5) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_price` float(7,2) NOT NULL,
  `m_generic` varchar(50) NOT NULL,
  `m_power` float(7,2) NOT NULL,
  `m_quentity` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`m_id`, `m_name`, `m_price`, `m_generic`, `m_power`, `m_quentity`) VALUES
(36, 'Maxpro Capsule', 7.00, 'Esomeprazole', 20.00, 85),
(37, 'Maxpro Capsule', 9.00, 'Esomeprazole', 40.00, 43),
(38, 'Maxpro Tablet', 4.00, 'Esomeprazole', 40.00, 61),
(39, 'Fenadin ', 8.00, 'Fexofernadin Hydrochloride', 120.00, 85),
(40, 'Fenadin ', 5.00, 'Fexofernadin Hydrochloride', 60.00, 80),
(41, 'Ace', 1.00, 'Paracetamol', 0.00, 19),
(42, 'Zimax', 35.00, 'Azithromycin Dihydrate', 500.00, 81),
(43, 'Zimax', 25.00, 'Azithromycin Dihydrate', 250.00, 100),
(44, 'Finix', 7.00, 'Rabeprazole Sodium', 20.00, 75),
(45, 'Finix', 3.50, 'Rabeprazole Sodium', 10.00, 71),
(48, 'Alcet', 20.00, 'Chlorpheniramine', 20.00, 51);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `t_id` int(5) NOT NULL,
  `t_name` varchar(50) NOT NULL,
  `t_price` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`t_id`, `t_name`, `t_price`) VALUES
(7, 'ghfdsg', 0.00),
(16, 'CBC', 350.00),
(17, 'Florin ', 500.00),
(18, 'Covid 19', 200.00),
(19, 'Urine', 400.00),
(20, 'colesterol', 500.00),
(21, 'Blood test', 200.00);

-- --------------------------------------------------------

--
-- Table structure for table `test_table`
--

CREATE TABLE `test_table` (
  `ss_id` int(11) NOT NULL,
  `t_id` int(11) DEFAULT NULL,
  `t_name` varchar(50) DEFAULT NULL,
  `t_price` float(7,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `t_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_table`
--

INSERT INTO `test_table` (`ss_id`, `t_id`, `t_name`, `t_price`, `user_id`, `user_email`, `t_status`) VALUES
(1, 16, 'CBC', 350.00, 1, 'abir@gmail.com', 'Not delivered'),
(2, 17, 'Florin ', 500.00, 1, 'abir@gmail.com', 'Not delivered'),
(5, 18, 'Covid 19', 200.00, 1, 'abir@gmail.com', 'Delivered'),
(6, 17, 'Florin ', 500.00, 1, 'abir@gmail.com', 'Delivered'),
(7, 17, 'Florin ', 500.00, 1, 'abir@gmail.com', 'Not delivered'),
(8, 19, 'Urine', 400.00, 3, 'shad@gmail.com', 'Delivered'),
(9, 16, 'CBC', 350.00, 3, 'shad@gmail.com', 'Not 	Delivered'),
(10, 20, 'colesterol', 500.00, 1, 'abir@gmail.com', 'Not Delivered'),
(11, 18, 'Covid 19', 200.00, 1, 'abir@gmail.com', 'Not Delivered'),
(12, 20, 'colesterol', 500.00, 1, 'abir@gmail.com', 'Not Delivered'),
(13, 19, 'Urine', 400.00, 1, 'abir@gmail.com', 'Not Delivered'),
(14, 17, 'Florin ', 500.00, 1, 'abir@gmail.com', 'Delivered'),
(15, 16, 'CBC', 350.00, 1, 'abir@gmail.com', 'Not Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(5) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `user_add` varchar(50) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_add`, `user_phone`, `user_dob`) VALUES
(1, 'abir', 'abir@gmail.com', 'abir1234', 'dhaka', '01600000000', '2021-09-14'),
(2, 'Abir Chowdhury', 'a@gmail.com', 'abir1234', 'dhaka', '0170005555', '2021-09-21'),
(3, 'Shad', 'shad@gmail.com', 'shad1234', 'dhaka', '01600000000', '2021-09-14'),
(4, 'Abir Chowdhury', 'b@gmail.com', 'abir1234', 'dhaka', '01700000000', '2021-09-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`admin_id`,`admin_email`);

--
-- Indexes for table `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `ambulance_call`
--
ALTER TABLE `ambulance_call`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `var_name` (`user_id`,`user_email`),
  ADD KEY `var_name2` (`am_id`);

--
-- Indexes for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
  ADD PRIMARY KEY (`dr_a_id`),
  ADD KEY `var_name5` (`dr_id`),
  ADD KEY `var_n` (`user_id`,`user_email`);

--
-- Indexes for table `doctor_entry`
--
ALTER TABLE `doctor_entry`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `doctor_user_table`
--
ALTER TABLE `doctor_user_table`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `fk1` (`dr_id`),
  ADD KEY `fk2` (`user_id`,`user_email`);

--
-- Indexes for table `medicine_order_table`
--
ALTER TABLE `medicine_order_table`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `fk9` (`m_id`),
  ADD KEY `fk10` (`user_id`,`user_email`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `test_table`
--
ALTER TABLE `test_table`
  ADD PRIMARY KEY (`ss_id`),
  ADD KEY `fk20` (`t_id`),
  ADD KEY `fk21` (`user_id`,`user_email`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`,`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ambulance`
--
ALTER TABLE `ambulance`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ambulance_call`
--
ALTER TABLE `ambulance_call`
  MODIFY `a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
  MODIFY `dr_a_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `doctor_entry`
--
ALTER TABLE `doctor_entry`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `doctor_user_table`
--
ALTER TABLE `doctor_user_table`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `medicine_order_table`
--
ALTER TABLE `medicine_order_table`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `m_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `test_table`
--
ALTER TABLE `test_table`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambulance_call`
--
ALTER TABLE `ambulance_call`
  ADD CONSTRAINT `var_name` FOREIGN KEY (`user_id`,`user_email`) REFERENCES `user_account` (`user_id`, `user_email`),
  ADD CONSTRAINT `var_name2` FOREIGN KEY (`am_id`) REFERENCES `ambulance` (`a_id`);

--
-- Constraints for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
  ADD CONSTRAINT `var_n` FOREIGN KEY (`user_id`,`user_email`) REFERENCES `user_account` (`user_id`, `user_email`),
  ADD CONSTRAINT `var_name5` FOREIGN KEY (`dr_id`) REFERENCES `doctor_entry` (`d_id`);

--
-- Constraints for table `doctor_user_table`
--
ALTER TABLE `doctor_user_table`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`dr_id`) REFERENCES `doctor_entry` (`d_id`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`user_id`,`user_email`) REFERENCES `user_account` (`user_id`, `user_email`);

--
-- Constraints for table `medicine_order_table`
--
ALTER TABLE `medicine_order_table`
  ADD CONSTRAINT `fk10` FOREIGN KEY (`user_id`,`user_email`) REFERENCES `user_account` (`user_id`, `user_email`),
  ADD CONSTRAINT `fk9` FOREIGN KEY (`m_id`) REFERENCES `pharmacy` (`m_id`);

--
-- Constraints for table `test_table`
--
ALTER TABLE `test_table`
  ADD CONSTRAINT `fk20` FOREIGN KEY (`t_id`) REFERENCES `test` (`t_id`),
  ADD CONSTRAINT `fk21` FOREIGN KEY (`user_id`,`user_email`) REFERENCES `user_account` (`user_id`, `user_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
