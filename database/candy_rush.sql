-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2022 at 05:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `candy_rush`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_categories`
--

CREATE TABLE `t_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_categories`
--

INSERT INTO `t_categories` (`category_id`, `category_name`, `is_deleted`) VALUES
(1, 'Ice Cream', 0),
(2, 'Loly', 0),
(3, 'Marshmello', 0),
(4, 'Candy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_orders`
--

CREATE TABLE `t_orders` (
  `order_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_name` mediumtext NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `is_delivered` int(11) NOT NULL,
  `product_quantity_desired` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_orders`
--

INSERT INTO `t_orders` (`order_id`, `user_id`, `user_name`, `product_id`, `product_name`, `user_email`, `is_delivered`, `product_quantity_desired`) VALUES
(1, 12, 'Ann', 1, 'Jacket', 'onehundred759@gmail.com', 0, 1),
(2, 12, 'Ann', 3, 'Jacket', 'onehundred759@gmail.com', 0, 2),
(3, 12, 'Ann', 4, 'Watch', 'onehundred759@gmail.com', 0, 5),
(4, 12, 'Ann', 1, 'Jacket', 'onehundred759@gmail.com', 0, 1),
(5, 12, 'Ann', 3, 'Jacket', 'onehundred759@gmail.com', 0, 2),
(6, 12, 'Ann', 4, 'Watch', 'onehundred759@gmail.com', 0, 5),
(7, 12, 'Ann', 5, 'Watch', 'onehundred759@gmail.com', 0, 1),
(8, 14, 'Ally', 4, 'Watch', 'kimutaipeterkibet@gmail.com', 0, 1),
(9, 17, 'Kevin', 3, 'Jacket', 'kimutaipeterkibet@gmail.com', 0, 1),
(10, 17, 'Kevin', 4, 'Watch', 'kimutaipeterkibet@gmail.com', 0, 1),
(11, 17, 'Kevin', 6, 'Football', 'kimutaipeterkibet@gmail.com', 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE `t_product` (
  `product_id` int(11) NOT NULL,
  `product_name` mediumtext NOT NULL,
  `product_description` text NOT NULL,
  `product_image` mediumtext NOT NULL,
  `unit_price` double NOT NULL,
  `available_quantity` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_roles`
--

CREATE TABLE `t_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(25) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_roles`
--

INSERT INTO `t_roles` (`role_id`, `role_name`, `is_deleted`) VALUES
(1, 'Customer', 1),
(2, 'Admin', 0),
(3, 'Packaging Manager', 0),
(4, 'Inventory manager', 0),
(5, 'Deliveror', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_subcategories`
--

CREATE TABLE `t_subcategories` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(25) NOT NULL,
  `category` varchar(30) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_subcategories`
--

INSERT INTO `t_subcategories` (`subcategory_id`, `subcategory_name`, `category`, `is_deleted`) VALUES
(1, 'Chocolate', '1', 0),
(2, 'Chocolate', '4', 0),
(3, 'Plain', '3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `users_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`users_id`, `first_name`, `last_name`, `email`, `password`, `role`, `is_deleted`) VALUES
(2, 'Me', 'Mimi', 'onehundred759@gmail.com', 'uihuihu', 1, 0),
(6, 'Vector', 'Ville', 'onehundred759@gmail.com', 'uno', 1, 0),
(11, 'Me', 'Mimi', 'onehundred759@gmail.com', 'aerpfio', 1, 0),
(12, 'Ann', 'Kamau', 'onehundred759@gmail.com', '123', 1, 0),
(14, 'Ally', 'Mike', 'kimutaipeterkibet@gmail.com', '123', 1, 0),
(15, 'One', 'Hedha', 'onehedha@somewhere.com', '123', 1, 0),
(17, 'Kevin', 'Lary', 'kimutaipeterkibet@gmail.com', '123', 1, 0),
(21, 'Boss', 'Jefe', 'boss.jefe@gmail.com', '123', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_categories`
--
ALTER TABLE `t_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `t_orders`
--
ALTER TABLE `t_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `t_roles`
--
ALTER TABLE `t_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `t_subcategories`
--
ALTER TABLE `t_subcategories`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_categories`
--
ALTER TABLE `t_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_orders`
--
ALTER TABLE `t_orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `t_product`
--
ALTER TABLE `t_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_roles`
--
ALTER TABLE `t_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_subcategories`
--
ALTER TABLE `t_subcategories`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
