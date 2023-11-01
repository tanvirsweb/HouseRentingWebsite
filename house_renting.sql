-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2023 at 09:07 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `house_renting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(1) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_email`, `admin_name`, `admin_pass`) VALUES
(1, 'admin@gmail.com', 'Tanvir Anjom Siddique', '202cb962ac59075b964b07152d234b70'),
(7, 'adm@gmail.com', 'Admin Name', '202cb962ac59075b964b07152d234b70'),
(9, 'tanvir@gmail.com', 'Tanvir ', 'd81f9c1be2e08964bf9f24b15f0e4900'),
(10, 'abc@gmail.com', 'Mr. Abc', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_des` text NOT NULL,
  `ctg_author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_des`, `ctg_author_id`) VALUES
(6, 'Land', 'Here we are going to post about land for renting.', 7),
(7, 'Hostel', 'Here we are going to post about Hostel.', 1),
(8, 'Girls Hostel', 'Here we are going to post about girls hostel.', 1),
(9, 'Apartment', 'Here we are going to post about apartment.It consists of several bed room,kitchen,dining etc.', 1),
(19, 'Hotel', 'Here we are talking about about hotel where people stay paying rent for some time.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_req`
--

CREATE TABLE `category_req` (
  `cat_id` int(255) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_des` text NOT NULL,
  `ctg_author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_req`
--

INSERT INTO `category_req` (`cat_id`, `cat_name`, `cat_des`, `ctg_author_id`) VALUES
(3, 'Resturant', 'Here we are talking about resturant, where people eat by payment.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(80) DEFAULT NULL,
  `post_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `post_code`) VALUES
(1, 'Rajshahi', 6000),
(2, 'Dhaka', 1000),
(3, 'Tangail', 1970),
(9, 'Dinajpur', 5200),
(12, 'Kalihati', 1970);

-- --------------------------------------------------------

--
-- Table structure for table `city_req`
--

CREATE TABLE `city_req` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(80) NOT NULL,
  `post_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city_req`
--

INSERT INTO `city_req` (`city_id`, `city_name`, `post_code`, `user_id`) VALUES
(4, 'Dhanmondi', 1209, 1),
(5, 'Savar', 1340, 1),
(6, 'Bashundhara', 1229, 1);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `msg_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `msg_reply` text DEFAULT NULL,
  `msg_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`msg_id`, `post_id`, `name`, `contact_info`, `msg`, `msg_reply`, `msg_time`) VALUES
(2, 38, 'Anirban', 'anik@gmail.com', 'Location ?', 'Next to Talaimari Bazar Mosque', '2023-07-28 22:30:14'),
(3, 38, 'Anik', 'anik@gmail.com', 'I want to rent this apartment.', 'Call me. 017123456789 is my mobile number.', '2023-07-28 22:30:51'),
(5, 38, 'Tamim', 'tamim@gamil.com', 'How much rent??', 'BDT 8k', '2023-07-29 21:20:43'),
(6, 37, 'Alvi', 'alvi@gmail.com', '2500 for each person? or total?', '2500 TK Per person', '2023-07-29 21:53:00'),
(7, 38, 'abc', 'alvi@gmail.com', 'msg', NULL, '2023-08-01 13:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(255) NOT NULL,
  `post_title` varchar(150) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `post_ctg` int(25) NOT NULL,
  `post_author` int(60) NOT NULL,
  `post_date` date NOT NULL,
  `rent_from` date NOT NULL,
  `city_id` int(11) NOT NULL,
  `rent_amount` int(11) NOT NULL,
  `post_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_img`, `post_ctg`, `post_author`, `post_date`, `rent_from`, `city_id`, `rent_amount`, `post_status`) VALUES
(20, '5 Seats available in Amena mess.', 'From July 2023 5 seats in 3rd floor will be available in Amena mess.Rent 1800TK per seat in double seat room.', '1688454375.jpg', 7, 1, '2023-06-05', '2023-06-05', 3, 1700, 1),
(28, 'Seat in BSB mess available', 'From July 2023 10 seats in BSB mess will be available.Rent of each seat is 1800Tk per month.', '1688454353.jpeg', 7, 1, '2023-06-05', '2023-06-05', 1, 1800, 1),
(31, 'Seat avaiable in Nurjahan Mess from next July 2023', 'There will be 3 seats avaiable in Nurjahan Mess from next July 2023 in 4th floor.Seat rent 1900TK/month', '1688486785.jpeg', 8, 1, '2023-06-08', '2023-06-08', 2, 1900, 1),
(32, 'ABC aparment is available ', 'ABC aparment is available from July 2023.Three bedroom,one kitchen,2 bathroom.Rent 2100TK/month', '1688486933.jpeg', 9, 1, '2023-06-08', '2023-06-08', 3, 2100, 1),
(34, 'ZY Land is available ', 'ZY Land is available.Rent about 8000TK/month.', '1688492711.jpeg', 6, 2, '2023-06-11', '2023-06-11', 1, 8000, 1),
(35, 'abc', 'abc content', '1688493087.jpeg', 6, 2, '2023-06-26', '2023-06-26', 2, 2200, 1),
(37, 'Seat available at ABC hostel', '     Seat available at ABC hostel from next month.2500/- per month for dual room for each seat.     ', '1688454323.jpeg', 7, 1, '2023-06-30', '2023-07-02', 1, 2500, 1),
(38, 'Apartment available at Talaimari.', '               Apartment available at Talaimari from next July.Rent amount BDT 8000.              ', '1688454078.jpeg', 9, 1, '2023-07-04', '2023-07-04', 2, 80000, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_user_view`
-- (See below for the actual view)
--
CREATE TABLE `post_user_view` (
`post_id` int(255)
,`post_title` varchar(150)
,`post_content` longtext
,`post_img` varchar(255)
,`post_date` date
,`rent_from` date
,`rent_amount` int(11)
,`post_status` tinyint(3)
,`user_id` int(11)
,`user_name` varchar(100)
,`user_email` varchar(100)
,`cat_name` text
,`cat_id` int(255)
,`city_id` int(11)
,`city_name` varchar(80)
);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'Alvi Siddique', 'alvi@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Tanvir Anjom Siddique', 'tanvir@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'Anik', 'user@gmail.com', '202cb962ac59075b964b07152d234b70'),
(9, 'Mahmud', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70'),
(10, 'Nafiz', 'anjom@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Structure for view `post_user_view`
--
DROP TABLE IF EXISTS `post_user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_user_view`  AS SELECT `posts`.`post_id` AS `post_id`, `posts`.`post_title` AS `post_title`, `posts`.`post_content` AS `post_content`, `posts`.`post_img` AS `post_img`, `posts`.`post_date` AS `post_date`, `posts`.`rent_from` AS `rent_from`, `posts`.`rent_amount` AS `rent_amount`, `posts`.`post_status` AS `post_status`, `user_info`.`user_id` AS `user_id`, `user_info`.`user_name` AS `user_name`, `user_info`.`user_email` AS `user_email`, `category`.`cat_name` AS `cat_name`, `category`.`cat_id` AS `cat_id`, `posts`.`city_id` AS `city_id`, `city`.`city_name` AS `city_name` FROM (((`posts` join `user_info` on(`posts`.`post_author` = `user_info`.`user_id`)) join `category` on(`posts`.`post_ctg` = `category`.`cat_id`)) join `city` on(`posts`.`city_id` = `city`.`city_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `category_req`
--
ALTER TABLE `category_req`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `city_req`
--
ALTER TABLE `city_req`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `post_ctg` (`post_ctg`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `category_req`
--
ALTER TABLE `category_req`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `city_req`
--
ALTER TABLE `city_req`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `msg`
--
ALTER TABLE `msg`
  ADD CONSTRAINT `msg_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_author`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`post_ctg`) REFERENCES `category` (`cat_id`),
  ADD CONSTRAINT `posts_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
