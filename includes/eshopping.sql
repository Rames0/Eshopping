-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 02:31 PM
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
-- Database: `eshopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm_tbl`
--

CREATE TABLE `adm_tbl` (
  `adm_Id` int(11) NOT NULL,
  `adm_name` varchar(255) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `adm_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm_tbl`
--

INSERT INTO `adm_tbl` (`adm_Id`, `adm_name`, `adm_email`, `adm_pass`) VALUES
(1, 'nikesh', 'nikesh@gmail.com', '$2y$10$VDFyTMfEC4Rkcj1ELuNjTeWvevudJebQnLyi0lyMr5SvrYIoRSNbi');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `pro_Id` int(11) NOT NULL,
  `IP_address` varchar(255) NOT NULL,
  `Qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `cat_Id` int(11) NOT NULL,
  `cat_Title` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`cat_Id`, `cat_Title`) VALUES
(1, 'Laptop'),
(2, 'Mobile'),
(3, 'Desktop'),
(4, 'Accessories'),
(5, 'Mens Wear'),
(6, 'Kids Wear'),
(7, 'Girls Wear'),
(8, 'Watch'),
(9, 'Electronics'),
(10, 'Beauty Products'),
(11, 'camera'),
(34, 'Foot wear');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `Ord_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `amount` int(255) NOT NULL,
  `bill_num` int(255) NOT NULL,
  `total_pro` int(255) NOT NULL,
  `ord_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ord_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`Ord_Id`, `User_Id`, `amount`, `bill_num`, `total_pro`, `ord_date`, `ord_status`) VALUES
(1, 13, 200000, 1615406347, 1, '2023-11-17 12:10:03', 'complete'),
(4, 13, 186500, 1480632808, 3, '2023-11-17 13:09:40', 'complete'),
(5, 13, 135000, 181477485, 1, '2023-11-18 08:56:59', 'complete'),
(6, 13, 135000, 1394774239, 1, '2023-11-18 08:58:29', 'complete'),
(7, 13, 135000, 199927383, 1, '2023-11-18 08:58:52', 'complete');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_Id` int(11) NOT NULL,
  `Ord_Id` int(11) NOT NULL,
  `bill_num` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `pay_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_Id`, `Ord_Id`, `bill_num`, `amount`, `pay_mode`, `date`) VALUES
(1, 4, 1063423687, 2500, 'Cash On Delivery', '2023-11-15 15:53:21'),
(6, 7, 834380651, 5590, 'none', '2023-11-15 16:08:34'),
(7, 5, 1066914876, 500, 'Cash On Delivery', '2023-11-15 16:10:06'),
(8, 2, 2082440176, 1500, 'Cash On Delivery', '2023-11-15 16:11:21'),
(9, 1, 1615406347, 200000, 'Cash On Delivery', '2023-11-17 12:10:03'),
(10, 3, 2108179774, 32090, 'Cash On Delivery', '2023-11-17 13:05:42'),
(11, 4, 1480632808, 186500, 'Khalti', '2023-11-17 13:09:40'),
(12, 5, 181477485, 135000, 'Khalti', '2023-11-18 08:56:59'),
(13, 6, 1394774239, 135000, 'Khalti', '2023-11-18 08:58:29'),
(14, 7, 199927383, 135000, 'Khalti', '2023-11-18 08:58:52');

-- --------------------------------------------------------

--
-- Table structure for table `pending_tbl`
--

CREATE TABLE `pending_tbl` (
  `Ord_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `bill_num` int(255) NOT NULL,
  `pro_Id` int(11) NOT NULL,
  `Qty` int(255) NOT NULL,
  `ord_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_tbl`
--

INSERT INTO `pending_tbl` (`Ord_Id`, `User_Id`, `bill_num`, `pro_Id`, `Qty`, `ord_status`) VALUES
(1, 13, 1615406347, 5, 1, 'Pending'),
(2, 13, 751043793, 1, 1, 'Pending'),
(3, 13, 2108179774, 12, 1, 'Pending'),
(4, 13, 1480632808, 3, 1, 'Pending'),
(5, 13, 181477485, 1, 1, 'Pending'),
(6, 13, 1394774239, 1, 1, 'Pending'),
(7, 13, 199927383, 1, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pro_Id` int(11) NOT NULL,
  `pro_Title` varchar(20) NOT NULL,
  `pro_Des` varchar(255) NOT NULL,
  `pro_key` varchar(100) NOT NULL,
  `cat_Id` int(11) NOT NULL,
  `pro_img1` varchar(255) NOT NULL,
  `pro_Price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pro_Id`, `pro_Title`, `pro_Des`, `pro_key`, `cat_Id`, `pro_img1`, `pro_Price`, `date`, `status`) VALUES
(1, 'Lenovo Yoga', 'Lenovo Yoga is a Windows 10 laptop with a 15.60-inch display that has a resolution of 1366x768 pixel', 'lenovo,laptop,yoga,electronics', 1, 'Yoga1.png', 135000, '2023-11-18 12:12:48', 'true'),
(2, 'Jacket', 'an outer garment extending either to the waist or the hips, typically having sleeves and a fastening', 'jacket,mens wear, winter wear,black jacket', 5, 'jacket1.png', 1500, '2023-11-12 10:51:41', 'true'),
(3, 'Canon Camera', 'Image sensor technology. Image engine technology. Dual-pixel CMOS AF. Area AF (autofocus) technology', 'camera,canon,black camera, electronics', 11, 'canon.jpg', 50000, '2023-11-12 08:29:37', 'true'),
(4, 'Tablet', 'It comes with 1GB of RAM. As far as the cameras are concerned, the Sony Xperia Tablet S on the rear ', 'tab,sony,mobile,phone,tablet,electronics', 2, 'sony.png', 20000, '2023-11-12 08:29:47', 'true'),
(5, 'yoga 9i', 'This years Yoga 9i we are reviewing features a 13th Gen Intel i7 CPU with Iris Xe graphics.', 'yoga,yoga 9i,9i,laptop,electronic,lenovo', 1, 'yoga.png', 200000, '2023-11-18 12:13:29', 'true'),
(6, 'Headphone', 'They are electroacoustic transducers, which convert an electrical signal to a corresponding sound.', 'headphone,electronic,accessories', 4, 'headphone.png', 2000, '2023-11-12 09:56:34', 'true'),
(7, 'Headphone1', 'They are electroacoustic transducers, which convert an electrical signal to a corresponding sound.', 'headphone,electronic,accesspries', 4, 'headphone2.png', 2500, '2023-11-12 09:57:20', 'true'),
(8, 'Okhar watch', 'Representing the uniqueness of Nepal with our flag, we bring you the watch to cherish the lush green', 'okhar watch,watch,accessories', 8, 'okhar watch.png', 5590, '2023-11-12 10:02:13', 'true'),
(9, 'OnePlus 7 pro', 'Buy OnePlus 7 pro with best price in Nepal ', 'mobile,oneplus,7pro,electronics,accessories,phone', 2, 'oneplus.png', 90000, '2023-11-12 10:03:45', 'true'),
(10, 'Samsung J7 prime', 'Check website for latest pricing and availability.', 'mobile,electronics,accessories,phone,samsung,j7,prime,j7 prime', 2, 'samsung galaxy j7.png', 27000, '2023-11-12 10:05:45', 'true'),
(11, 'Gaming PC', 'A 12th generation Intel Core i7  processor provides the solid platform required for a modern gen', 'pc,computer,gaming pc, desktop,i7,', 3, 'gaming pc.jpg', 300000, '2023-11-12 10:07:50', 'true'),
(12, 'Computer', 'Assembled Desktop Computer Price in Nepal is You can choose your own configuration and Assembled', 'computer,desktop,pc,', 3, 'computer.png', 25000, '2023-11-12 10:09:29', 'true'),
(13, 'Men Jacket', 'Check website for latest pricing and availability.', 'jacket,men wear, winter wear', 5, 'jacket.png', 2500, '2023-11-12 10:12:19', 'true'),
(15, 'Girls Maxi Gown', 'Images may be subject to copyright.', 'girls wear,kids wear, kids fashion', 6, 'kidswear1.jpg', 2500, '2023-11-13 14:34:29', 'true'),
(16, 'Girls Casual Wear', 'Images may be subject to copyright', 'girls wear, kids wear, kids fashion', 6, 'kidswear2.jpg', 2500, '2023-11-13 14:36:13', 'true'),
(17, 'USB Keyboard', 'USB Keyboard Computer PC Office Laptop Desktop Wired Keyboard', 'keyboard, usb keyboard, computer keyboard', 4, 'keyboard1.png', 500, '2023-11-13 14:39:15', 'true'),
(18, 'USB Mouse', 'mages may be subject to copyright', 'USB mouse, mouse,computer mouse', 4, 'mouse1.png', 500, '2023-11-13 14:40:54', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(11) NOT NULL,
  `user_Name` varchar(100) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_img` varchar(255) NOT NULL,
  `user_Ip` varchar(50) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_num` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `user_Name`, `User_Email`, `user_pass`, `user_img`, `user_Ip`, `user_address`, `user_num`) VALUES
(13, 'nikesh', 'nikeshdangol126@gmail.com', '$2y$10$z7atotlrmE8DuwEWqpakFexaHR6OZhCJC.CA8Njg5RIYgoOM51DQS', '', '::1', 'lele', '9818621859');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm_tbl`
--
ALTER TABLE `adm_tbl`
  ADD PRIMARY KEY (`adm_Id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`pro_Id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`cat_Id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`Ord_Id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_Id`);

--
-- Indexes for table `pending_tbl`
--
ALTER TABLE `pending_tbl`
  ADD PRIMARY KEY (`Ord_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm_tbl`
--
ALTER TABLE `adm_tbl`
  MODIFY `adm_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `cat_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `Ord_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pending_tbl`
--
ALTER TABLE `pending_tbl`
  MODIFY `Ord_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pro_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
