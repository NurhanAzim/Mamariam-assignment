-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 08:46 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistemorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customerId` varchar(70) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `postcode` int(10) NOT NULL,
  `telNo` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customerId`, `first_name`, `last_name`, `address`, `city`, `state`, `postcode`, `telNo`, `email`) VALUES
('170412590', 'AZIM NURHAN', 'AHMAD', 'D-376 KAMPUNG PULAU RUSA', 'KUALA TERENGGANU', 'TRG', 20050, '60147964473', 'azimnurhan19@gmail.com'),
('542780993', 'AZIM NURHAN', 'AHMAD', 'D-376 KAMPUNG PULAU RUSA', 'KUALA TERENGGANU', 'TRG', 20050, '60147964473', 'azimnurhan19@gmail.com'),
('90305525', 'AZIM NURHAN', 'AHMAD', 'D-376 KAMPUNG PULAU RUSA', 'KUALA TERENGGANU', 'TRG', 20050, '60147964473', 'azimnurhan19@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `orderId` int(8) NOT NULL,
  `productId` int(12) NOT NULL,
  `orderDate` date NOT NULL DEFAULT current_timestamp(),
  `orderQuantity` int(10) NOT NULL,
  `totalPrice` int(20) NOT NULL,
  `customerId` varchar(70) NOT NULL,
  `statusId` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(12) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `productPrice` int(10) NOT NULL,
  `productStock` int(20) NOT NULL,
  `productImage` varchar(50) DEFAULT NULL,
  `productDetails` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `productPrice`, `productStock`, `productImage`, `productDetails`) VALUES
(2346, 'Death Note Black Edition, Vol. 1', 60, 8, 'dn.png', 'Light Yagami is an ace student with great prospects--and he\'s bored out of his mind. But all that changes when he finds the Death Note, a notebook dropped by a rogue Shinigami death god. Any human whose name is written in the notebook dies, and now Light has vowed to use the power of the Death Note to rid the world of evil. Will Light\'s noble goal succeed, or will the Death Note turn him into the very thing he fights against?'),
(76543, 'Attack on Titan, Vol. 30 Before the Fall', 50, 14, 'aot.png', 'To activate the true power of the Founding Titan that courses through his veins, Eren must make contact with Zeke, a Titan of royal blood. Though Zeke has escaped Levi and the Survey Corps, he\'s made little headway before the Marleyan military and its Titan warriors attack. Eren pummels his way through the Marleyan trap and past his former friends, but as the battle rages, he stumbles into a situation far beyond what his brother could have planned.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `statusId` int(5) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`statusId`, `description`) VALUES
(0, 'belum membuat pembayaran'),
(1, 'sedang diproses'),
(2, 'dalam penghantaran'),
(3, 'berjaya dihantar'),
(99, 'dibatalkan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `statusId` (`statusId`),
  ADD KEY `productId` (`productId`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`statusId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `orderId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76544;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `statusId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `tbl_order_ibfk_3` FOREIGN KEY (`statusId`) REFERENCES `tbl_status` (`statusId`),
  ADD CONSTRAINT `tbl_order_ibfk_5` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`),
  ADD CONSTRAINT `tbl_order_ibfk_6` FOREIGN KEY (`customerId`) REFERENCES `tbl_customer` (`customerId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
