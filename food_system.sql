-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 12:10 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bcategory`
--

CREATE TABLE `bcategory` (
  `bcid` int(11) NOT NULL,
  `bcatname` varchar(200) NOT NULL,
  `bcat_del` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bcategory`
--

INSERT INTO `bcategory` (`bcid`, `bcatname`, `bcat_del`) VALUES
(1, 'Fast Food Restaurant', '0'),
(2, 'Cloud Kitchen / Ghost Kitchen', '0'),
(3, 'Fine Dining', '0'),
(4, 'Cafe', '0'),
(5, 'Casual Dine / Fast Casual', '0'),
(6, 'Bakery and Patissery', '0'),
(7, 'Dhaba', '0'),
(8, 'Restaurant', '0');

-- --------------------------------------------------------

--
-- Table structure for table `bcity`
--

CREATE TABLE `bcity` (
  `bcityid` int(11) NOT NULL,
  `bcityname` varchar(200) NOT NULL,
  `bcity_del` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bcity`
--

INSERT INTO `bcity` (`bcityid`, `bcityname`, `bcity_del`) VALUES
(1, 'Hyderabad', '0'),
(2, 'Jhansi', '0'),
(3, 'Bhopal', '0'),
(4, 'Kanpur', '0'),
(5, 'New Delhi', '0'),
(6, 'Lucknow', '0'),
(7, 'Patna', '0'),
(8, 'Mumbai', '0');

-- --------------------------------------------------------

--
-- Table structure for table `billcity`
--

CREATE TABLE `billcity` (
  `billcid` int(11) NOT NULL,
  `billcityname` varchar(200) NOT NULL,
  `stateid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billcity`
--

INSERT INTO `billcity` (`billcid`, `billcityname`, `stateid`) VALUES
(1, 'Hyderabad', 1),
(2, 'Kanpur', 2),
(3, 'Lucknow', 2),
(4, 'Bhopal', 4),
(5, 'Indore', 4);

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `billid` int(11) NOT NULL,
  `billname` varchar(200) NOT NULL,
  `billmobile` varchar(200) NOT NULL,
  `billemail` varchar(200) NOT NULL,
  `bill_add` varchar(200) NOT NULL,
  `pin` int(11) NOT NULL,
  `billcountry` varchar(200) NOT NULL DEFAULT 'India',
  `stateid` int(11) NOT NULL,
  `billcid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`billid`, `billname`, `billmobile`, `billemail`, `bill_add`, `pin`, `billcountry`, `stateid`, `billcid`, `uid`) VALUES
(2, 'Sumit Singh', '8545652535', 'sumit@gmail.com', 'Abu Bakr Musjid, Prakash Nagar', 500016, 'India', 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `billstate`
--

CREATE TABLE `billstate` (
  `stateid` int(11) NOT NULL,
  `statename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billstate`
--

INSERT INTO `billstate` (`stateid`, `statename`) VALUES
(1, 'Telangana'),
(2, 'Uttar Pradesh'),
(3, 'Bihar'),
(4, 'Madhya Pradesh'),
(5, 'Maharastra');

-- --------------------------------------------------------

--
-- Table structure for table `blocation`
--

CREATE TABLE `blocation` (
  `blid` int(11) NOT NULL,
  `blocname` varchar(200) NOT NULL,
  `bloc_del` varchar(200) NOT NULL DEFAULT '0',
  `bcityid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blocation`
--

INSERT INTO `blocation` (`blid`, `blocname`, `bloc_del`, `bcityid`) VALUES
(1, 'Ameerpet', '0', 1),
(2, 'Begumpet', '0', 1),
(3, 'Kanpur Nagar', '0', 4),
(4, 'Hi-Tech City', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `bsno` int(11) NOT NULL,
  `bid` varchar(200) NOT NULL,
  `bphoto` varchar(200) NOT NULL,
  `bname` varchar(200) NOT NULL,
  `bmobile` varchar(200) NOT NULL,
  `bemail` varchar(200) NOT NULL,
  `baddress` varchar(200) NOT NULL,
  `bviews` varchar(200) NOT NULL,
  `bis_ver` int(11) NOT NULL DEFAULT 0,
  `bis_del` int(11) NOT NULL DEFAULT 0,
  `bcityid` int(11) NOT NULL,
  `blid` int(11) NOT NULL,
  `bcid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`bsno`, `bid`, `bphoto`, `bname`, `bmobile`, `bemail`, `baddress`, `bviews`, `bis_ver`, `bis_del`, `bcityid`, `blid`, `bcid`, `uid`) VALUES
(25, '', './images/bgimage4.jpg', 'Deepakansh Caffe', '011 1654859', 'riyan@cb.com', '1-465-876, Dhua Kua', '62', 1, 0, 1, 4, 4, 3),
(27, '', './images/nature11.png', 'Divyansh Confectionary', '012 5469857', 'divy@b.com', '1-34-765, Ashok Nagar', '6', 1, 0, 4, 3, 6, 4),
(28, '', './images/pic11.jpg', 'Kaushal Restaurant', '016 9685743', 'kaushal@b.com', '2-546-887, Kidwai Nagar', '5', 1, 0, 1, 2, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `bsno` int(11) NOT NULL,
  `psno` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `lid` int(11) NOT NULL,
  `ldate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activity` varchar(200) NOT NULL,
  `object` varchar(200) NOT NULL,
  `logby` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `osno` int(11) NOT NULL,
  `oid` varchar(200) NOT NULL,
  `odate` timestamp NOT NULL DEFAULT current_timestamp(),
  `oprice` varchar(200) NOT NULL,
  `orderby` int(11) NOT NULL,
  `pquantity` int(11) NOT NULL,
  `pvalue` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `is_cancelled` int(11) NOT NULL,
  `billid` int(11) NOT NULL,
  `psno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`osno`, `oid`, `odate`, `oprice`, `orderby`, `pquantity`, `pvalue`, `status`, `is_cancelled`, `billid`, `psno`) VALUES
(5, 'LOCB19446160821101434', '2021-08-16 04:44:34', '1215', 2, 3, 630, 'Placed', 0, 2, 1),
(6, 'LOCB19446160821101434', '2021-08-16 04:44:34', '1215', 2, 1, 585, 'Placed', 0, 2, 7),
(7, 'LOCB87400160821102514', '2021-08-16 04:55:14', '950', 2, 2, 700, 'Placed', 0, 2, 10),
(8, 'LOCB87400160821102514', '2021-08-16 04:55:14', '950', 2, 1, 210, 'Placed', 0, 2, 1),
(9, 'LOCB22971160821110353', '2021-08-16 05:33:53', '1000', 2, 1, 1000, 'Placed', 0, 2, 5),
(10, 'LOCB3378160821121119', '2021-08-16 06:41:19', '670', 2, 3, 630, 'Placed', 0, 2, 1),
(11, 'LOCB11484160821122725', '2021-08-16 06:57:25', '460', 2, 2, 420, 'Placed', 0, 2, 3),
(12, 'LOCB43553160821153609', '2021-08-16 10:06:09', '1840', 2, 2, 1000, '', 0, 2, 2),
(13, 'LOCB43553160821153609', '2021-08-16 10:06:09', '1840', 2, 4, 840, '', 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `paysno` int(11) NOT NULL,
  `payment_id` varchar(200) NOT NULL,
  `payment_status` varchar(200) NOT NULL,
  `payment_request_id` varchar(200) NOT NULL,
  `total_price` varchar(200) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`paysno`, `payment_id`, `payment_status`, `payment_request_id`, `total_price`, `uid`) VALUES
(3, 'MOJO1815805A35840561', 'Credit', 'd1c82ac0d99543108b968121ef281094', '3446', 2),
(4, 'MOJO1815E05A35840564', 'Credit', '55b34ad748394bfdb76d3ee7bc82ec1f', '3446', 2),
(5, 'MOJO1815G05A35840574', 'Credit', '7060c559c4bc400ab853a1bb53f7a28d', '2000', 2),
(6, 'MOJO1815P05A35840680', 'Credit', '2e1ce31864d44947901c61203f27d153', '670', 2),
(7, 'MOJO1816X05A23977999', 'Credit', '3c4b9dbb972b42dfb2be18c23179c84b', '540', 2),
(8, 'MOJO1816805A23978023', 'Credit', '095cf6b61360418da1497c6a513d5b03', '2340', 2),
(9, 'MOJO1816805A23978023', 'Credit', '095cf6b61360418da1497c6a513d5b03', '2340', 2),
(10, 'MOJO1816605A23978024', 'Credit', '21627c951d374e01a0669b7bc2eff51a', '960', 2),
(11, 'MOJO1816C05A23978025', 'Credit', '16ef1637f65142868ff505698c6bb982', '1215', 2),
(12, 'MOJO1816205A23978026', 'Credit', '280064a3f41e4a5984c9c4206c60d1fb', '950', 2),
(13, 'MOJO1816D05A23978067', 'Failed', 'c9aaef6e98324d9ca08a6e6f1ea58b06', '670', 2),
(14, 'MOJO1816505A23978080', 'Failed', '09bff1d8590b4af28245b817aedca929', '460', 2),
(15, 'MOJO1816505A23978080', 'Failed', '09bff1d8590b4af28245b817aedca929', '460', 2),
(16, 'MOJO1816S05A23978179', 'Credit', '3b00535cebe34a6586b6344691dfb167', '1840', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `psno` int(11) NOT NULL,
  `pid` varchar(200) NOT NULL,
  `brandname` varchar(200) NOT NULL,
  `pimage` varchar(200) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `pquantity` varchar(200) NOT NULL,
  `pprice` varchar(200) NOT NULL,
  `discount` varchar(200) NOT NULL,
  `pdescription` varchar(200) NOT NULL,
  `pis_ver` int(11) NOT NULL DEFAULT 0,
  `pis_del` int(11) NOT NULL DEFAULT 0,
  `bsno` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`psno`, `pid`, `brandname`, `pimage`, `pname`, `pquantity`, `pprice`, `discount`, `pdescription`, `pis_ver`, `pis_del`, `bsno`, `uid`) VALUES
(1, '', 'WXY', './images/aged_cafe31.jpg', 'Pulav', '10', '210', '3', 'This is good.', 0, 0, 25, 3),
(2, '', 'VIP', './images/img11.jpg', 'Methi-Aalu', '20', '500', '5', 'Good for Health', 1, 0, 25, 3),
(3, '', 'GD', './images/Screenshot_(22)2.png', 'Paneer Rice', '20', '210', '5', 'Good thing.', 1, 0, 25, 3),
(4, '', 'MNO', './images/Screenshot_(27)1.png', 'Shimla Aalu', '20', '210', '5', 'The thing is good.', 2, 0, 25, 3),
(5, '', 'XYZ', './images/Screenshot_(77).png', 'Paneer Tikka', '20', '1000', '5', 'This is good product.', 1, 0, 25, 3),
(6, '', 'ABC', './images/Screenshot_(75).png', 'Matar-Pulaav', '10', '599', '3', 'This is good.', 2, 0, 25, 3),
(7, '', 'PQR', './images/Screenshot_(76).png', 'Dal-Rice', '20', '585', '5', 'This is good thing.', 1, 0, 25, 3),
(8, '', 'PQR', './images/Screenshot_(76)1.png', 'Dal-Rice', '20', '585', '5', 'This is good thing.', 0, 0, 25, 3),
(9, '', 'ABC', './images/Screenshot_(85).png', 'Soyabin-Rice', '10', '400', '5', 'This is Soyabin.', 0, 0, 25, 3),
(10, '', 'MNO', './images/Screenshot_(80).png', 'Shimala-Bread', '30', '350', '5', 'This is Bread.', 0, 0, 25, 3),
(11, '', 'EFO', './images/img1.jpg', 'Veg-Biryani', '100', '700', '3', 'Awesome product', 0, 0, 25, 3),
(12, '', 'XYZ', './images/aged_cafe5.jpg', 'Paneer Tikka', '20', '550', '5', 'This is a good product.', 0, 0, 25, 3),
(13, '', 'ABC', './images/popeyes_rest1.jpg', 'Dal Rice', '20', '539', '5', 'It is a good thing.', 0, 0, 25, 3),
(14, '', 'PQR', './images/aged_cafe11.jpg', 'Biryani', '20', '499', '3', 'It is good.', 0, 0, 25, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `rid` int(11) NOT NULL,
  `rdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `reviewby` int(11) NOT NULL,
  `reviews` varchar(200) NOT NULL,
  `psno` int(11) NOT NULL,
  `osno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `rolename`) VALUES
(1, 'Admin'),
(2, 'Vender'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `roleid` int(11) NOT NULL DEFAULT 0,
  `uis_ver` int(11) NOT NULL DEFAULT 0,
  `uis_del` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `image`, `name`, `mobile`, `email`, `password`, `roleid`, `uis_ver`, `uis_del`) VALUES
(1, './images/teacher2.png', 'Admin', '9585756545', 'admin@k.com', 'admin', 1, 1, 0),
(2, './images/Capture3.PNG', 'User', '7545158525', 'arj@u.com', 'user', 3, 1, 0),
(3, './images/bgimage11.jpg', 'Vendor', '8575451525', 'ar@v.com', 'vendor', 2, 1, 0),
(4, '', 'Vendor2', '8575451525', 'v2@v.com', 'vendor', 2, 1, 0),
(5, '', 'Vendor3', '4525356585', 'v3@v.com', 'vendor', 2, 1, 0),
(6, './images/2.png', 'Vendor4', '8565325214', 'v4@v.com', 'vendor', 2, 2, 0),
(7, './images/4.png', 'Vendor5', '8565321524', 'v5@v.com', 'vendor', 2, 0, 0),
(8, './images/e-learning-vector.png', 'Jaikant', '9565352515', 'j@u.com', 'user', 3, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bcategory`
--
ALTER TABLE `bcategory`
  ADD PRIMARY KEY (`bcid`);

--
-- Indexes for table `bcity`
--
ALTER TABLE `bcity`
  ADD PRIMARY KEY (`bcityid`);

--
-- Indexes for table `billcity`
--
ALTER TABLE `billcity`
  ADD PRIMARY KEY (`billcid`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`billid`);

--
-- Indexes for table `billstate`
--
ALTER TABLE `billstate`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `blocation`
--
ALTER TABLE `blocation`
  ADD PRIMARY KEY (`blid`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`bsno`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`osno`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`paysno`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`psno`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bcategory`
--
ALTER TABLE `bcategory`
  MODIFY `bcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bcity`
--
ALTER TABLE `bcity`
  MODIFY `bcityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `billcity`
--
ALTER TABLE `billcity`
  MODIFY `billcid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `billid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `billstate`
--
ALTER TABLE `billstate`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blocation`
--
ALTER TABLE `blocation`
  MODIFY `blid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `bsno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `osno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `paysno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `psno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
