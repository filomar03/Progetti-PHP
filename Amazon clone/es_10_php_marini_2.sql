-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 09:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `es 10 php marini 2`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `brand` varchar(16) NOT NULL,
  `seller` varchar(16) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `description` varchar(512) NOT NULL,
  `price` float NOT NULL,
  `image_url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `seller`, `seller_id`, `description`, `price`, `image_url`) VALUES
(1, 'Iphone', 'Apple', 'Apple (Italia)', 0, 'iphone di ultima generazione con display da 6 pollici e batteria a lunga durata', 1200, 'https://cdn.discordapp.com/attachments/833603339656495144/835162405524471818/618ZI2XywL._AC_SY550_.jpg'),
(2, 'Palla da basket', 'Decathlon', 'Decathlon', 0, 'una semplice ball da basket', 23, 'https://cdn.discordapp.com/attachments/833603339656495144/835162402894381076/downloadwadd.jpg'),
(3, 'yeezy nere', 'Adidas', 'Foot locker', 0, 'scarpe adida yezzy nere, originali', 300, 'https://cdn.discordapp.com/attachments/833603339656495144/835162401850392656/download.jpg'),
(4, 'Set di padelle', 'kasanova', 'leroy merlin', 0, 'un bellissimo set di padelle antiaderenti e antigraffio', 53, 'https://cdn.discordapp.com/attachments/833603339656495144/835162399211913216/wd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pswd` varchar(64) NOT NULL,
  `permissions` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `pswd`, `permissions`) VALUES
(1, 'admin', 'admin', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 1),
(2, 'test', 'test', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
