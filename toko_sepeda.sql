-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 12:01 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_sepeda`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_produk`, `count`) VALUES
(12, 2, 1),
(13, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `name`) VALUES
(1, 'Sepeda'),
(2, 'Frame and Fork'),
(3, 'Spare Part'),
(4, 'Wheels and Tires');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 1, 'spd123', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama`, `id_kategori`, `harga`, `gambar`) VALUES
(1, 'Polygon Sepeda City Nevada', 1, 1700000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/5/0/502510.jpg'),
(2, 'Polygon Sepeda Razor 20', 1, 2700000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/5/0/502593002.jpg'),
(3, 'Tern Sepeda Lipat Link D8 - Limited Edition', 1, 8998000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/7/3/731228.jpg'),
(7, 'Polygon Frame Sepeda Cozmic DXP 26\"', 2, 2450000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/p/a/pa00080.jpg'),
(8, 'Polygon Frame Set Sepeda Trid CR', 2, 2500000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/P/A/PA00860.jpg'),
(9, 'Polygon Fork Suspensi Sepeda Monarc', 2, 248000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/7/2/723288.jpg'),
(11, 'PRO Handlebar Sepeda MTB KYK DI2 Riser', 3, 898000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/7/2/726437.jpg'),
(12, 'Polygon Sadel Sepeda Monarch', 3, 79000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/7/2/725082001.jpg'),
(13, 'Polygon Pedal Sepeda Monarch', 3, 34000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/7/0/706006001.jpg'),
(14, 'Polygon Ban 12', 4, 34000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/7/0/702605.png'),
(15, 'Schwalbe Ban Sepeda Tough Tom 27.5x2.25 Active K-Guard', 4, 178000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/7/2/724417.jpg'),
(16, 'Polygon Ban Dalam Sepeda 12', 4, 24000, 'https://www.rodalink.com/pub/media/catalog/product/cache/image/680x510/e9c3970ab036de70892d86c6d221abfe/7/0/703144.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
