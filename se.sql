-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 09:19 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `image`, `name`, `price`, `quantity`) VALUES
(7, 'Sour-Cola-Bottle-Trolli.png', 'Soda Cola Trolli', '500.00', '3'),
(8, 'Chicken-Feet.png', 'Chicken Feet', '650.00', '3');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `image` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `date_added`) VALUES
(4, 'Soda Cola Trolli', '500.00', 'Sour-Cola-Bottle-Trolli.png', '2022-09-29 11:28:12'),
(5, 'Nerd GumBalls', '300.00', 'nerd-gumballs.png', '2022-09-29 11:29:21'),
(6, 'Chicken Feet', '650.00', 'Chicken-Feet.png', '2022-09-29 11:34:59'),
(7, 'Rainbow Nerds', '299.00', 'Rainbow-Nerds.png', '2022-09-29 11:43:24'),
(8, 'Milk Choce Raspberry', '549.00', 'Milk-Choc-Raspberries.png', '2022-09-29 11:54:03'),
(9, 'Snakes Alive', '999.00', 'Snakes-Alive.png', '2022-09-29 11:54:35'),
(10, 'Red FRogs Alien', '749.00', 'Red-Frogs-Allens.png', '2022-09-29 11:55:06'),
(11, 'Pineapples', '240.00', 'Pineapples.png', '2022-09-29 11:56:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
