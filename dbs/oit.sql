-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 06:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oit`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `co_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `co_contact` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `co_description` varchar(255) NOT NULL,
  `max_intake` varchar(255) NOT NULL,
  `co_status` varchar(50) NOT NULL,
  `director_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `co_name`, `email`, `co_contact`, `location`, `URL`, `co_description`, `max_intake`, `co_status`, `director_id`) VALUES
(18, 'TRA', 'tra@gmail.com', '02221178', ' kijitonyama', 'www/TRA.co.tz', 'Nation revernew collection and management', '10', 'Open', 37),
(19, 'SHOES SHOP', 'shoesshop@gmail.com', '0787654334', ' Mwenge', 'www.shoes.go.tz', 'like your legs as you like  your stomach', '2', 'Open', 37),
(20, 'sina', 'sina@gmail.com', '0754367896', ' Bunda', 'www.sina.go.tz', 'all qualified for football ', '4', 'Open', 37),
(21, 'UDART', 'udart@gmail.com', '0710000100', ' Dar es salaam', 'www.udart.go.tz', 'mwendo kasi  social service ', '5', 'Open', 37),
(22, 'mahind', 'mahind@gmail.com', '076765321', ' manana', 'www/manana.co.tz', 'kuguja mandege  na manumbu', '23', 'Closed', 48);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `depart_id` int(11) NOT NULL,
  `depart_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`depart_id`, `depart_name`) VALUES
(1, 'ARCHITECTURE'),
(2, 'BEs'),
(3, 'BSs'),
(4, 'CEEEs'),
(5, 'CSM'),
(6, 'ESM'),
(7, 'ESSs'),
(8, 'GST'),
(9, 'IDs'),
(10, 'LMV'),
(11, 'URP');

-- --------------------------------------------------------

--
-- Table structure for table `gst_f_request`
--

CREATE TABLE `gst_f_request` (
  `gst_id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `hod_email` varchar(100) NOT NULL,
  `department_id` int(50) NOT NULL,
  `company_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `director_id` int(11) NOT NULL,
  `hod_prove` varchar(100) NOT NULL,
  `stdt_conferm` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gst_f_request`
--

INSERT INTO `gst_f_request` (`gst_id`, `tittle`, `description`, `start_date`, `end_date`, `hod_email`, `department_id`, `company_id`, `users_id`, `status`, `director_id`, `hod_prove`, `stdt_conferm`) VALUES
(29, 'software development', 'i need to be competent enough to be able to develop an e commarce software', '2023-06-22', '2023-07-14', ' hot@gmail.com', 1, 18, 39, 'Active', 37, 'Approved', 'Confirmed'),
(30, 'web dvt', 'all about web application', '2023-06-15', '2023-06-30', '', 2, 18, 39, 'waiting', 37, 'none', 'Unconfermed'),
(32, 'NETWORK', 'network security', '2023-06-12', '2023-08-12', ' janeth@gmail.com', 5, 21, 39, 'Active', 37, 'Approved', 'Confirmed'),
(33, 'Information System management', 'web development', '2023-06-07', '2023-12-09', ' janeth@gmail.com', 5, 21, 52, 'Active', 37, 'Approved', 'Confirmed'),
(34, 'Information System', 'i need a practical training', '2023-12-07', '2023-02-08', ' janeth@gmail.com', 5, 18, 53, 'waiting', 37, 'Approved', 'Unconfermed'),
(35, '23456', 'tdxgc', '2023-06-20', '2023-07-20', ' janeth@gmail.com', 5, 18, 52, 'Active', 37, 'Approved', 'Unconfermed');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `department_id` int(50) DEFAULT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `regnum` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`id`, `first_name`, `m_name`, `last_name`, `department_id`, `contact`, `email`, `password`, `role`, `regnum`) VALUES
(31, 'Warioba', '', 'Japheth', NULL, '0752496183', 'manyama@gmail.com', 'admin', 'Admin', NULL),
(34, 'minze', '', 'hot', 1, '0723569878', 'hot@gmail.com', 'hot', 'hod', NULL),
(35, 'madeny', '', 'mussa', 2, '077860965', 'madeny@gmail.com', 'madeny', 'hod', NULL),
(36, 'mushi', '', 'shannel', 4, '0786542908', 'mushi@gmail.com', 'mushi', 'hod', NULL),
(37, 'shadya', '', 'abdulmajid', NULL, '063467287', 'shadya@gmail.com', 'shady', 'director', NULL),
(38, 'Aisha', '', 'Said', NULL, '0788347865', 'aisha@gmail.com', 'aisha', 'director', NULL),
(39, 'Wankyo', 'Matinde', 'mwita', NULL, '765189027', 'brother@gmail.com', '123', 'Student', '27661/T.2021'),
(40, 'Marwa', '', 'Marwa', 3, '0664729165', 'marwa@gmail.com', 'marwa', 'hod', NULL),
(41, 'lambura', 'alistides', 'lambura', 5, '0757634357', 'lambura@gmail.com', 'csm', 'hod', NULL),
(42, 'Aisha', '', 'John', 6, '0717793921', ' aisha@gmail.com', 'esm', 'hod', NULL),
(43, 'Grace ', '', 'Kalogi', 7, '0765343862', 'grace@gmail.com', 'esss', 'hod', NULL),
(44, 'Magufuli', '', 'John', 8, '0653897457', ' magu@gmail.com', 'gst', 'hod', NULL),
(45, 'Geita', '', 'Geita', 9, '0765435678', 'geita@gmail.com', 'ids', 'hod', NULL),
(46, 'Mapinda', '', 'Katavi', 10, '0698765434', 'pinda@gmai.com', 'lmv', 'hod', NULL),
(47, 'Kijazi', '', 'Aron', 11, '0698743456', 'kijazi@gmail.com', 'urp', 'hod', NULL),
(48, 'chama', '', 'chota', NULL, '0723456787', 'chama@gmail.com', '17', 'director', NULL),
(52, 'LIGHTNESS', '', 'NGAIZA', NULL, '0757634357', 'ngaiza@gmail.com', '321', 'Student', '26943/T.2021'),
(53, 'pacha', '', 'sepha', NULL, '0626043858', 'pacha@gmail.com', '1234', 'Student', '26992/T.2021'),
(56, 'mosses', '', 'aron', NULL, '78645318', 'mosses@gmail.com', 'moux', 'Student', '26993/T.2035'),
(57, 'madeko', 'akadumu', 'alala', NULL, '07864387', 'akadumu@gmail.com', '0987', 'Student', '14356');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`depart_id`);

--
-- Indexes for table `gst_f_request`
--
ALTER TABLE `gst_f_request`
  ADD PRIMARY KEY (`gst_id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `depart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gst_f_request`
--
ALTER TABLE `gst_f_request`
  MODIFY `gst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
