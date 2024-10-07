-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 09:48 AM
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
-- Database: `progetto a piacere scudieri`
--

-- --------------------------------------------------------

--
-- Table structure for table `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `tipo` varchar(16) NOT NULL,
  `modello` varchar(16) NOT NULL,
  `tecnologia_schermo` varchar(16) NOT NULL,
  `dimensione_schermo` float DEFAULT NULL,
  `ram` int(11) NOT NULL,
  `archiviazione` int(11) NOT NULL,
  `connettività` varchar(16) NOT NULL,
  `prezzo` double NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodotti`
--

INSERT INTO `prodotti` (`id`, `tipo`, `modello`, `tecnologia_schermo`, `dimensione_schermo`, `ram`, `archiviazione`, `connettività`, `prezzo`, `foto`) VALUES
(1, 'Mac', 'Mac pro 2020', 'QLED', 27, 32, 512, 'ethernet', 11999.99, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/refurb-2018-imac-pro-27-gallery?wid=1144&hei=1144&fmt=jpeg&qlt=80&.v=1589235413137'),
(2, 'Mac', 'Mac mini', 'non integrato', NULL, 12, 480, 'ethernet, WIFI 6', 799.99, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/mac-mini-hero-202011?wid=892&hei=820&&qlt=80&.v=1603403462000'),
(3, 'Mac', 'iMac (fine 2019)', 'IPS', 27, 16, 512, 'ethernet', 599.99, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/imac-27-cto-hero-202008?wid=1254&hei=1044&fmt=jpeg&qlt=80&.v=1594932848000'),
(4, 'iPhone', 'iPhone 6', 'LCD', 6.2, 1, 16, '4G, WIFI6', 499.99, 'https://support.apple.com/library/APPLE/APPLECARE_ALLGEOS/SP705/SP705-iphone_6-mul.png'),
(5, 'iPhone', 'iPhone X', 'OLED', 6.7, 2, 64, '4G+, WIFI6', 799.99, 'https://assets.swappie.com/iPhone-X-64GB-Silver-1-1-1-1.png'),
(6, 'iPhone', 'iPhone 12', 'IPS', 6.7, 4, 256, '5G, WIFI6', 1199.99, 'https://images-na.ssl-images-amazon.com/images/I/71c7UQ9XPmL._AC_SX679_.jpg'),
(7, 'iPad', 'iPad Pro 2018', 'IPS', 11, 6, 256, 'WIFI6', 899.99, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/refurb-ipad-pro-12-wifi-silver-2019_AV1?wid=1144&hei=1144&fmt=jpeg&qlt=80&.v=1581985531041'),
(8, 'iPad', 'iPad Air', 'IPS', 11, 4, 128, 'WIFI6', 599.99, 'https://images.eprice.it/nobrand/0/hres/789/210587789/85937388_8461580983.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `id_apple` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nome` varchar(16) NOT NULL,
  `cognome` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utenti`
--

INSERT INTO `utenti` (`id`, `id_apple`, `password`, `nome`, `cognome`) VALUES
(1, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
