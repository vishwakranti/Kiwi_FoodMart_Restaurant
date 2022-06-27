-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 08:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `kiwi_foodmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(32, 'Vishwakranti', 'vishwakrantisuryawanshi@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(34, 'david', 'david@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(37, 'Ajit', 'ajit.musalgavkar@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e'),
(38, 'admin', 'admin', 'e2fc714c4727ee9395f324cd2e7f331f'),
(40, 'admin', 'admin', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `name_image` varchar(150) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `name_image`, `featured`, `active`) VALUES
(8, 'Trial Image 3', 'dish_category_246.jpg', 'Yes', 'No'),
(9, 'Dish 1', 'dish_category_967.jpg', 'Yes', 'No'),
(10, 'Dish 2', 'dish_category_445.jpg', 'No', 'Yes'),
(11, 'Dish 3', 'dish_category_878.jpg', 'Yes', 'Yes'),
(12, 'Dish 4', 'dish_category_569.jpg', 'Yes', 'Yes'),
(13, 'Dish 5', 'dish_category_297.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) NOT NULL,
  `title` varchar(120) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `name_image` varchar(1100) NOT NULL,
  `category_id` int(10) NOT NULL,
  `featured` varchar(15) NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `name_image`, `category_id`, `featured`, `active`) VALUES
(2, 'Dish', 'Chicken', '20', 'dish-Name=8709.jpg', 12, 'Yes', 'Yes'),
(3, 'Platter', 'Platter with fries.', '20', 'dish-Name=3597.jpg', 12, 'Yes', 'No'),
(4, 'Chicken Biryani', 'Indian spices and rice', '27', 'dish-Name=6583.jpg', 1, 'Yes', 'Yes'),
(5, 'Drink', 'Cool', '4', 'dish-Name=9458.jpg', 2, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) NOT NULL,
  `food` varchar(120) NOT NULL,
  `price` decimal(15,4) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` decimal(10,4) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `name_customer` varchar(15) NOT NULL,
  `contact_customer` int(10) NOT NULL,
  `email_customer` varchar(20) NOT NULL,
  `address_customer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `name_customer`, `contact_customer`, `email_customer`, `address_customer`) VALUES
(2, 'Drink', '4.0000', 1, '4.0000', '0000-00-00 00:00:00', '2022-05-14', 'Vishwakranti su', 121212, 'vishwakrantisuryawan', '4 Nottingham Ave, Halswell\r\nSuite'),
(3, 'Chicken Biryani', '27.0000', 3, '81.0000', '2022-05-14 02:35:48', 'Ordered', 'Vishwakranti su', 78569870, 'vishwakrantisuryawan', '4 Nottingham Ave, Halswell\r\nSuite');

-- --------------------------------------------------------

--
-- Table structure for table `order_cart`
--

CREATE TABLE `order_cart` (
  `ct_id` int(10) UNSIGNED NOT NULL,
  `pd_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `ct_qty` mediumint(8) UNSIGNED NOT NULL DEFAULT 1,
  `ct_session_id` char(32) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ct_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(12) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `enabled`) VALUES
(1, 'mslgvkrjt@yahoo.com', '$2y$10$KHhCh7klnxGOYO/iTQlhaOwwxfHJYbRZMx2p1oITDmFasEJVHZemW', '', 1),
(2, 'ajit.musalgavkar@gmail.com', '$2y$10$wrrzSzKT.MHJH3gZfGwTFe/vo4Hm4q.yjekKf8i3/BIT6cD4lX5kK', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_cart`
--
ALTER TABLE `order_cart`
  ADD PRIMARY KEY (`ct_id`),
  ADD KEY `pd_id` (`pd_id`),
  ADD KEY `ct_session_id` (`ct_session_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_cart`
--
ALTER TABLE `order_cart`
  MODIFY `ct_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
