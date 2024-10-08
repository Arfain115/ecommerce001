-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 09:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `type`, `name`, `price`, `product_image`) VALUES
(1, 'Watch', 'Pink Watch', '$870', 'https://img1.getimg.ai/generated/img-21Ye62npPPFZh1zATkuDk.jpeg'),
(3, 'Watch', 'Classic Gold Watch', '$1,250', 'https://img1.getimg.ai/generated/img-nU25s5zmvJG62Bim3MQDB.jpeg'),
(4, 'Watch', 'Sporty Digital Watch', '$320', 'https://ideogram.ai/api/images/direct/sk0scBWPQT-wyEfbiWAY1Q.jpg'),
(5, 'Watch', 'Leather Strap Watch', '$450', 'https://img1.getimg.ai/generated/img-OlO0xMjVqiMz9sYSKwrhh.jpeg'),
(6, 'Watch', 'Luxury Diamond Watch', '$5,600', 'https://img1.getimg.ai/generated/img-hGBiChzk6JYfFGRa4y1PF.jpeg'),
(7, 'Watch', 'Smart Fitness Watch', '$199', 'https://ideogram.ai/api/images/direct/BQbVMvWgS1yfKxDctu4RtA.jpg'),
(8, 'Mobile', 'Smartphone Pro X', '$1,099', 'https://img1.getimg.ai/generated/img-S9wjsuHaXjjXQXabpq8Ov.jpeg'),
(9, 'Mobile', 'Budget Friendly Phone', '$299', 'https://img1.getimg.ai/generated/img-XRVl6S7i9QCEnM9nzYhCt.jpeg'),
(10, 'Mobile', 'High-End Camera Phone', '$849', 'https://ideogram.ai/api/images/direct/sXLuK3wUQMKTa3t7E_Qu2Q.jpg'),
(11, 'Mobile', 'Rugged Outdoor Phone', '$499', 'https://ideogram.ai/api/images/direct/nlVML5JhR6KFr0cTGMXcQQ.jpg'),
(12, 'Mobile', 'Compact Foldable Phone', '$1,200', 'https://ideogram.ai/api/images/direct/jpTIjjZMTfmqrdIl-U2GWQ.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
