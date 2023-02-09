-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2021 at 06:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sweetbakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `vkey` varchar(200) NOT NULL,
  `vstatus` tinyint(1) NOT NULL DEFAULT 1,
  `createdate` date NOT NULL DEFAULT current_timestamp(),
  `flag` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `vkey`, `vstatus`, `createdate`, `flag`) VALUES
(31, 'Admin', '11ae153b956e68b5b771763d57697d68', 'digambarchaudhari425303@gmail.com', '2efd5480c7b7ae14193046af187084d5', 1, '2021-11-17', 'admin'),
(39, 'Digambar', '11ae153b956e68b5b771763d57697d68', 'chaudharidigambar52002@gmail.com', 'd1f6fb2f82dfb60c3224290bc2d0dcd1', 1, '2021-11-17', '0');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mobileno` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `picode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `fname`, `lname`, `username`, `mobileno`, `email`, `address`, `picode`) VALUES
(1, 'Digambar', 'chaudhari', 'Digambar', '2200997766', 'chaudharidigambar52002@gmail.com', 'Pune', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `egless` varchar(20) NOT NULL,
  `weight` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `imgurl` varchar(800) NOT NULL,
  `address` varchar(400) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobileno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `pname`, `egless`, `weight`, `quantity`, `imgurl`, `address`, `email`, `mobileno`) VALUES
(1, 'digambarbc', 'Black Forest Treat', 'yes', '2', '2', 'https://d3cif2hu95s88v.cloudfront.net/live-site-2016/product-image/010/05-05-2018/1568357356IMG_7840-600x600.jpg', 'Pune', 'chaudharidigambar52002@gmail.com', '2200997766'),
(2, 'digambarbc', 'Chocolate Truffle Cake', 'yes', '1', '1', 'https://d3cif2hu95s88v.cloudfront.net/live-site-2016/product-image/010/05-05-2018/1568356801IMG_8080-600x600.jpg', 'Pune', 'chaudharidigambar52002@gmail.com', '2200997766'),
(4, 'digambar', 'Black Forest Treat', 'no', '3', '1', 'https://d3cif2hu95s88v.cloudfront.net/live-site-2016/product-image/010/05-05-2018/1568357356IMG_7840-600x600.jpg', 'Pune', 'chaudharidigambar52002@gmail.com', '2200997766');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pname` text NOT NULL,
  `price` varchar(40) NOT NULL,
  `imglink` varchar(800) NOT NULL,
  `ingredent` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `price`, `imglink`, `ingredent`, `description`) VALUES
(1, 'Chocolate Cake', '600', 'https://previews.123rf.com/images/robynmac/robynmac1508/robynmac150800005/43763784-fancy-chocolate-cake-whole-isolated-on-white-background-.jpg', 'Chocolate, egg, milk, cherry', 'This is our best selling chocolate cake , children most favorite cake'),
(5, 'Butterscotch Cake', '500', 'https://d3cif2hu95s88v.cloudfront.net/live-site-2016/product-image/010/05-05-2018/1568354590IMG_8064-350x350.jpg', 'butter, cream, honey, Choco chips', 'The best cake for any special occasion, like anniversary and party '),
(6, 'Black Forest Treat', '700', 'https://d3cif2hu95s88v.cloudfront.net/live-site-2016/product-image/010/05-05-2018/1568357356IMG_7840-600x600.jpg', 'chocolate, cream, egg, bread, honey, milk', 'Here is a delicious Black Forest cake to sweeten up all your special occasions like birthdays, anniversary, Christmas, New Year etc.'),
(7, 'Chocolate Truffle Cake', '545', 'https://d3cif2hu95s88v.cloudfront.net/live-site-2016/product-image/010/05-05-2018/1568356801IMG_8080-600x600.jpg', 'Chocolate, coco powder, milk', 'We present to you this classic chocolate-Truffle cake enriched with the goodness of chocolates in every layer. '),
(8, 'Heart Shaped Chocolate Cake', '660', 'https://d3cif2hu95s88v.cloudfront.net/live-site-2016/product-image/010/05-05-2018/1568699700IMG_8195-600x600.jpg', 'bread, egg, liquid chocolate, strawberry', 'Express your love for your precious ones with this irresistible heart-shaped chocolate cake with a smooth texture that melts in the mouth.'),
(9, 'Heart Shaped Truffle Cake', '700', 'https://d3cif2hu95s88v.cloudfront.net/live-site-2016/product-image/010/05-05-2018/1568698781IMG_8248-600x600.jpg', 'cherry, coco, chocolate, milk', 'It s more than just a cake. Presenting you this deliciously rich heart-shaped truffle cake-the sweetest way to make your loved ones feel special on their happy birthdays');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `vkey` (`vkey`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
