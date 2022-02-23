-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 03:13 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthyburst`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `acc_no` bigint(100) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phonenumber` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `birthday` varchar(250) NOT NULL,
  `user_type` varchar(250) NOT NULL,
  `acc_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_no`, `fname`, `lname`, `email`, `password`, `phonenumber`, `address`, `birthday`, `user_type`, `acc_created`) VALUES
(22, 296879, 'Kenneth', 'Riogelon', 'kennethR@gmail.com', 'Admin123', '09878784521', '', '2021-06-24', '', '2021-06-09'),
(21, 399762, 'Maria ', 'Perez', 'mariaperez@gmail.com', 'Maria12', '09875541288', '', '', '', '2021-06-09'),
(11, 455545, 'Danielle Cedric', 'Racoon', 'danperez@gmail.com', 'Admin123', '09289995455', 'Marinduque, Metro Manila', '2021-06-02', 'Admin', '2021-05-22'),
(12, 553388, 'Alecsa Mhari', 'Magdiwang', 'mhari20@gmail.com', 'Mama27', '09885475321', 'Almanza Uno, Las Piñas City', '2021-01-17', '', '2021-05-27'),
(20, 587590, 'Benjamin', 'Bautista', 'das@gmail.com', 'Mama27', '09999919191', 'Spring Ville', '1999-04-01', '', '2021-05-28'),
(13, 952290, 'alecsa', 'capistrano', 'alcapistrano1220@gmail.com', 'Capistrano27', '09107724568', '', '', '', '2021-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `event_id` int(11) NOT NULL,
  `event_user` varchar(250) NOT NULL,
  `event_activty` varchar(250) NOT NULL,
  `event_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`event_id`, `event_user`, `event_activty`, `event_timestamp`) VALUES
(301, 'Admin danperez@gmail.com', 'Sign-Out', '2021-06-09 13:12:02'),
(302, 'das@gmail.com', 'Sign-In', '2021-06-09 13:12:38'),
(303, 'das@gmail.com', 'Updated Profile', '2021-06-09 13:13:05'),
(304, 'das@gmail.com', 'Sign-Out', '2021-06-09 13:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_id` int(11) NOT NULL,
  `order_no` bigint(100) NOT NULL,
  `order_prod` varchar(250) NOT NULL,
  `order_quantity` int(100) NOT NULL,
  `order_amount` varchar(250) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(250) NOT NULL,
  `prod_price` bigint(100) NOT NULL,
  `prod_size` varchar(250) NOT NULL,
  `prod_quantity` bigint(100) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_price`, `prod_size`, `prod_quantity`, `prod_description`, `prod_image`) VALUES
(3, 'Healthy Burst Guyabano', 280, '1000 ml       ', 100, '10,000 times stronger in fighting cancer cells than common chemotherapeutic drug.<br> Prevents UTI Ensures regular bowel Wards off leg cramps.<br> Keeps water retention away Keeps bones healthy.<br> Helps the body produce energy.<br> Boosts good cholesterol level.<br> Prevents pregnancy complications.<br> Helps prevent anemia.<br> Guards against migraine', 'prod2.jpg'),
(4, 'Healthy Burst Mangosteen', 250, '750 ml', 450, 'Helps prevent aging.<br>Helps prevent allergic reactions.<br> Helps prevent the hardening of the arteries.<br> Prevents or modulates bacterial infections.<br> Helps relieve fatigue.<br> Helps with diarrhea.<br> Rich Antioxidants Helps lower Fever.<br> Help prevent dizziness.', 'prod4.jpg'),
(5, 'Healthy Burst Dalandan', 220, '750 ml', 650, 'Very rich in Vitamin C.<br> Good for women who are at the first trimester of their pregnancy.<br> Very Good appetite suppressant.<br> Recommended for weight watchers It is used to relieve nausea and vomiting.<br> The freshly squeeze juice is used in cleansing disinfecting wounds.<br> The extracted essence of its seeds and leaves are used for regulating menstruation, treatment of cough and relief of rheumatism, swelling muscle pains.', 'prod3.jpg'),
(6, 'Healthy Burst Calamansi', 220, '750 ml ', 600, 'Skin Bleaching Agent Serves as body cleanser.<br> \r\nCure coughs and expel the phlegm.<br> Helpful in dealing with a hangover.<br>\r\nPrevent and Cure Osteoarthritis.<br> Maintains Kidney Health.<br>\r\nGreat tonic for the Liver.<br> Prevent Diabetes.<br> Lowers blood cholesterol.<br> Lightens dark area of the body like armpits and elbows Lightens freckles.<br>\r\nGood as Mouthwash', 'prod1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_no`),
  ADD KEY `acc_id` (`acc_id`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
