-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 06:13 PM
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
(7, 'adm@gmail.com', 'Alvi Siddique', '202cb962ac59075b964b07152d234b70'),
(9, 'ab3456cd@gmail.com', 'Anj234344om', 'd81f9c1be2e08964bf9f24b15f0e4900'),
(10, 'abc@gmail.com', 'abc', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Stand-in structure for view `admin_view`
-- (See below for the actual view)
--
CREATE TABLE `admin_view` (
`admin_id` int(1)
,`admin_name` text
,`admin_email` varchar(60)
);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_des` text NOT NULL,
  `ctg_author_id` int(255) NOT NULL,
  `ctg_approved` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_des`, `ctg_author_id`, `ctg_approved`) VALUES
(6, 'Land', 'Here we are going to post about land for renting.', 7, 0),
(7, 'Hostel', 'Here we are going to post about Hostel.', 1, 0),
(8, 'Girls Hostel', 'Here we are going to post about girls hostel.', 1, 0),
(9, 'Apartment', 'Here we are going to post about apartment.It consists of several bed room,kitchen,dining etc.', 1, 0),
(11, 'abc', 'abc', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(80) DEFAULT NULL,
  `city_approved` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_approved`) VALUES
(1, 'Rajshahi', 1),
(2, 'Dhaka', 1),
(3, 'Tangail', 1);

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
(20, '5 Seats available in Amena mess.', 'From July 2023 5 seats in 3rd floor will be available in Amena mess.Rent 1800TK per seat in double seat room.', '1686244768.jpg', 7, 1, '2023-06-05', '2023-06-05', 1, 1700, 1),
(28, 'Seat in BSB mess available', 'From July 2023 10 seats in BSB mess will be available.Rent of each seat is 2100Tk per month.', '1686247299.jpg', 7, 1, '2023-06-05', '2023-06-05', 1, 1800, 1),
(31, 'Seat avaiable in Nurjahan Mess from next July 2023', 'There will be 3 seats avaiable in Nurjahan Mess from next July 2023 in 4th floor.Seat rent 2000TK/month', '1686245594.jpg', 8, 1, '2023-06-08', '2023-06-08', 1, 1900, 1),
(32, 'ABC aparment is available ', 'ABC aparment is available from July 2023.Three bedroom,one kitchen,2 bathroom.Rent 8000TK/month', '1686245247.jpg', 9, 1, '2023-06-08', '2023-06-08', 1, 1800, 1),
(34, 'ZY Land is available ', 'ZY Land is available.Rent about 8000TK/month.', '1686452412.jpg', 6, 2, '2023-06-11', '2023-06-11', 1, 1800, 1),
(35, 'abc', 'abc content', 'abc.img', 11, 2, '2023-06-26', '2023-06-26', 2, 1800, 1);

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
  `user_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `user_email`, `user_pass`) VALUES
(1, 'Alvi Siddique', 'alvi@gmail.com', 202),
(2, 'Tanvir Anjom Siddique', 'tanvir@gmail.com', 202),
(3, 'User', 'user@gmail.com', 202);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_view`
-- (See below for the actual view)
--
CREATE TABLE `user_view` (
`user_id` int(11)
,`user_name` varchar(100)
,`user_email` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `admin_view`
--
DROP TABLE IF EXISTS `admin_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_view`  AS SELECT `admin_info`.`admin_id` AS `admin_id`, `admin_info`.`admin_name` AS `admin_name`, `admin_info`.`admin_email` AS `admin_email` FROM `admin_info``admin_info`  ;

-- --------------------------------------------------------

--
-- Structure for view `post_user_view`
--
DROP TABLE IF EXISTS `post_user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_user_view`  AS SELECT `posts`.`post_id` AS `post_id`, `posts`.`post_title` AS `post_title`, `posts`.`post_content` AS `post_content`, `posts`.`post_img` AS `post_img`, `posts`.`post_date` AS `post_date`, `posts`.`rent_from` AS `rent_from`, `posts`.`rent_amount` AS `rent_amount`, `posts`.`post_status` AS `post_status`, `user_info`.`user_id` AS `user_id`, `user_info`.`user_name` AS `user_name`, `user_info`.`user_email` AS `user_email`, `category`.`cat_name` AS `cat_name`, `category`.`cat_id` AS `cat_id`, `posts`.`city_id` AS `city_id`, `city`.`city_name` AS `city_name` FROM (((`posts` join `user_info` on(`posts`.`post_author` = `user_info`.`user_id`)) join `category` on(`posts`.`post_ctg` = `category`.`cat_id`)) join `city` on(`posts`.`city_id` = `city`.`city_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `user_view`
--
DROP TABLE IF EXISTS `user_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_view`  AS SELECT `user_info`.`user_id` AS `user_id`, `user_info`.`user_name` AS `user_name`, `user_info`.`user_email` AS `user_email` FROM `user_info``user_info`  ;

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
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_ctg` (`post_ctg`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

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
