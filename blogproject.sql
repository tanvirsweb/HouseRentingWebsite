-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 02:36 AM
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
-- Database: `blogproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(1) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `admin_email`, `admin_name`, `admin_pass`) VALUES
(1, 'admin@gmail.com', 'Tanvir Anjom Siddique', '202cb962ac59075b964b07152d234b70'),
(7, 'adm@gmail.com', 'Alvi Siddique', '202cb962ac59075b964b07152d234b70'),
(9, 'ab3456cd@gmail.com', 'Anj234344om', 'd81f9c1be2e08964bf9f24b15f0e4900');

-- --------------------------------------------------------

--
-- Stand-in structure for view `author`
-- (See below for the actual view)
--
CREATE TABLE `author` (
`author_id` int(1)
,`author_email` varchar(60)
,`author_name` text
);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(255) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_des` text NOT NULL,
  `ctg_author_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_des`, `ctg_author_id`) VALUES
(6, 'Land', 'Here we are going to post about land for renting.', 7),
(7, 'Hostel', 'Here we are going to post about Hostel.', 1),
(8, 'Girls Hostel', 'Here we are going to post about girls hostel.', 1),
(9, 'Apartment', 'Here we are going to post about apartment.It consists of several bed room,kitchen,dining etc.', 1);

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
  `post_comment_count` int(255) NOT NULL,
  `post_summery` varchar(255) NOT NULL,
  `post_tag` varchar(255) NOT NULL,
  `post_status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `post_img`, `post_ctg`, `post_author`, `post_date`, `post_comment_count`, `post_summery`, `post_tag`, `post_status`) VALUES
(20, '5 Seats available in Amena mess.', 'From July 2023 5 seats in 3rd floor will be available in Amena mess.Rent 1800TK per seat in double seat room.', '1686244768.jpg', 7, 1, '2023-06-05', 3, 'seat available in mess from next month!!!!', '#seatAvaiable', 1),
(28, 'Seat in BSB mess available', 'From July 2023 10 seats in BSB mess will be available.Rent of each seat is 2100Tk per month.', '1686247299.jpg', 7, 1, '2023-06-05', 3, 'Summery of post !!!!', '#seatAvaiable', 1),
(31, 'Seat avaiable in Nurjahan Mess from next July 2023', 'There will be 3 seats avaiable in Nurjahan Mess from next July 2023 in 4th floor.Seat rent 2000TK/month', '1686245594.jpg', 8, 1, '2023-06-08', 3, 'seat available in mess from next month!!!!', '#seatAvaiable', 1),
(32, 'ABC aparment is available ', 'ABC aparment is available from July 2023.Three bedroom,one kitchen,2 bathroom.Rent 8000TK/month', '1686245247.jpg', 9, 1, '2023-06-08', 3, 'Aparment is available ', '#flatAvaiable', 1),
(34, 'ZY Land is available ', 'ZY Land is available.Rent about 8000TK/month.', '1686452412.jpg', 6, 7, '2023-06-11', 3, 'ZY Land is available.Rent about 8000TK/month.', '#zy_land_available', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_ctg_author`
-- (See below for the actual view)
--
CREATE TABLE `post_ctg_author` (
`post_id` int(255)
,`post_title` varchar(150)
,`post_content` longtext
,`post_img` varchar(255)
,`post_ctg` int(25)
,`post_author` int(60)
,`post_date` date
,`post_comment_count` int(255)
,`post_summery` varchar(255)
,`post_tag` varchar(255)
,`post_status` tinyint(3)
,`cat_id` int(255)
,`cat_name` text
,`cat_des` text
,`author_id` int(1)
,`author_email` varchar(60)
,`author_name` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `post_with_ctg`
-- (See below for the actual view)
--
CREATE TABLE `post_with_ctg` (
`post_id` int(255)
,`post_title` varchar(150)
,`post_content` longtext
,`post_img` varchar(255)
,`post_author` int(60)
,`post_date` date
,`post_comment_count` int(255)
,`post_summery` varchar(255)
,`post_tag` varchar(255)
,`post_status` tinyint(3)
,`cat_id` int(255)
,`cat_name` text
);

-- --------------------------------------------------------

--
-- Structure for view `author`
--
DROP TABLE IF EXISTS `author`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `author`  AS SELECT `admin_info`.`id` AS `author_id`, `admin_info`.`admin_email` AS `author_email`, `admin_info`.`admin_name` AS `author_name` FROM `admin_info``admin_info`  ;

-- --------------------------------------------------------

--
-- Structure for view `post_ctg_author`
--
DROP TABLE IF EXISTS `post_ctg_author`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_ctg_author`  AS SELECT `posts`.`post_id` AS `post_id`, `posts`.`post_title` AS `post_title`, `posts`.`post_content` AS `post_content`, `posts`.`post_img` AS `post_img`, `posts`.`post_ctg` AS `post_ctg`, `posts`.`post_author` AS `post_author`, `posts`.`post_date` AS `post_date`, `posts`.`post_comment_count` AS `post_comment_count`, `posts`.`post_summery` AS `post_summery`, `posts`.`post_tag` AS `post_tag`, `posts`.`post_status` AS `post_status`, `category`.`cat_id` AS `cat_id`, `category`.`cat_name` AS `cat_name`, `category`.`cat_des` AS `cat_des`, `author`.`author_id` AS `author_id`, `author`.`author_email` AS `author_email`, `author`.`author_name` AS `author_name` FROM ((`posts` join `category` on(`posts`.`post_ctg` = `category`.`cat_id`)) join `author` on(`author`.`author_id` = `posts`.`post_author`))  ;

-- --------------------------------------------------------

--
-- Structure for view `post_with_ctg`
--
DROP TABLE IF EXISTS `post_with_ctg`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `post_with_ctg`  AS SELECT `posts`.`post_id` AS `post_id`, `posts`.`post_title` AS `post_title`, `posts`.`post_content` AS `post_content`, `posts`.`post_img` AS `post_img`, `posts`.`post_author` AS `post_author`, `posts`.`post_date` AS `post_date`, `posts`.`post_comment_count` AS `post_comment_count`, `posts`.`post_summery` AS `post_summery`, `posts`.`post_tag` AS `post_tag`, `posts`.`post_status` AS `post_status`, `category`.`cat_id` AS `cat_id`, `category`.`cat_name` AS `cat_name` FROM (`posts` join `category` on(`posts`.`post_ctg` = `category`.`cat_id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
