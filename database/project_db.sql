-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2022 at 11:33 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_active`) VALUES
(1, 'Nataly', 'nataly.pbp@gmail.com', '$2y$10$pK5vQkoC90tR8qRbXYYSAO8nIPzxPKeWsmE22v5O9IDmNhbnWBb6q', '0'),
(2, 'Diana', 'dianaad@gmail.com', '$2y$10$2hpxyqgQ05JCWSZtHkVrgO9GawX/Te1KSHW2VodF9cRhlzhykDAwO', '0'),
(4, 'Hayan', 'hayan.ab@gmail.com', '$2y$10$WbU5nY1pxGYtI8vunrzbpuUADNyg19qXC28Ne4v.gkWxOtVM2LMRO', '0');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(10, 'Empowerment'),
(11, 'Force For Good'),
(12, 'Disney'),
(13, 'Weddings'),
(14, 'Blue Diamond');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(1, 2, '127.0.0.1', 1, 1),
(6, 18, '127.0.0.1', 3, 1),
(8, 15, '127.0.0.1', 3, 1),
(9, 13, '127.0.0.1', 3, 1),
(10, 16, '127.0.0.1', 3, 1),
(11, 40, '127.0.0.1', 3, 1),
(12, 41, '127.0.0.1', 3, 1),
(13, 43, '127.0.0.1', 3, 1),
(15, 11, '127.0.0.1', 5, 1),
(16, 12, '127.0.0.1', 5, 1),
(17, 13, '127.0.0.1', 5, 1),
(20, 15, '127.0.0.1', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(13, 'Necklaces'),
(14, 'Bracelets'),
(15, 'Earrings'),
(16, 'Rings'),
(17, 'Piercings'),
(18, 'Watches'),
(19, 'Pendants');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 2, 2, 1, '7C943162VU5631229', 'Completed'),
(2, 2, 7, 1, '4E613219LV444692M', 'Completed'),
(3, 2, 11, 1, '4E613219LV444692M', 'Completed'),
(4, 2, 12, 1, '4E613219LV444692M', 'Completed'),
(5, 2, 13, 1, '4E613219LV444692M', 'Completed'),
(6, 2, 15, 1, '4E613219LV444692M', 'Completed'),
(7, 2, 16, 1, '4E613219LV444692M', 'Completed'),
(8, 2, 43, 1, '2H222534LE203672R', 'Completed'),
(9, 2, 37, 1, '2H222534LE203672R', 'Completed'),
(10, 2, 23, 1, '5YT12682B9838092C', 'Completed'),
(11, 2, 33, 1, '1U433562WR0702236', 'Completed'),
(12, 2, 39, 2, '0L737105VD283972F', 'Completed'),
(13, 2, 29, 1, '0L737105VD283972F', 'Completed'),
(14, 2, 24, 1, '09K340112P794462U', 'Completed'),
(15, 2, 21, 1, '09K340112P794462U', 'Completed'),
(16, 2, 36, 1, '3X438899D2079725R', 'Completed'),
(17, 2, 17, 1, '7BV34962T52504919', 'Completed'),
(18, 2, 22, 1, '7BV34962T52504919', 'Completed'),
(19, 2, 25, 1, '0R645285A9942202C', 'Completed'),
(20, 2, 26, 1, '0R645285A9942202C', 'Completed'),
(21, 2, 18, 1, '53356910AU088071C', 'Completed'),
(22, 2, 28, 1, '1CG11960AY7862733', 'Completed'),
(23, 4, 14, 1, '3NU93839R3528990W', 'Completed'),
(24, 4, 15, 1, '3NU93839R3528990W', 'Completed'),
(25, 2, 38, 2, '6VT30257PP617554W', 'Completed'),
(26, 2, 12, 1, '9VP223915L717224B', 'Completed'),
(27, 2, 15, 1, '72618664NM484111T', 'Completed'),
(28, 2, 10, 1, '86A86759417753239', 'Completed'),
(29, 2, 11, 1, '6RY90289R0921054R', 'Completed'),
(30, 2, 12, 1, '76033546CM1749903', 'Completed'),
(31, 2, 13, 1, '9FF24980844406356', 'Completed'),
(32, 2, 44, 1, '2P413688PJ986702H', 'Completed'),
(33, 2, 10, 1, '5PY38805NU1934209', 'Completed'),
(34, 2, 12, 1, '5PY38805NU1934209', 'Completed'),
(35, 2, 36, 1, '5PY38805NU1934209', 'Completed'),
(36, 2, 17, 1, '5PY38805NU1934209', 'Completed'),
(37, 2, 30, 2, '5PY38805NU1934209', 'Completed'),
(38, 11, 17, 1, '34677907TF004603G', 'Completed'),
(39, 2, 13, 1, '0ET19074GL6158526', 'Completed'),
(40, 2, 12, 1, '0ET19074GL6158526', 'Completed'),
(41, 2, 10, 1, '0ET19074GL6158526', 'Completed'),
(42, 12, 14, 2, '9GN390039X768334Y', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`) VALUES
(10, 13, 14, 'Sapphire and diamond', 1550, 31, 'very elegant', '1655729031_diamondneck.jpg', 'neck'),
(11, 13, 14, 'Sapphire Necklace', 500, 48, 'very elegant', '1655729120_blueneck.jpg', 'neck'),
(12, 14, 11, 'Slender Gold Bracelet', 3690, 50, 'very elegant', '1655729198_goldbracelets.jpg', 'brac'),
(13, 14, 10, 'Lexis Diamond Bangle', 5987, 23, 'very good', '1655729293_diamondbracelet.jpg', 'brac'),
(14, 16, 13, 'Round Trio matching set', 1800, 13, 'very', '1655729360_bluering.jpg', 'rin'),
(15, 13, 14, 'Blue Oval Sapphire', 355, 37, 'very', '1655732695_bluesneck2.jpg', 'neck'),
(16, 13, 14, 'Gemstone Necklace', 1340, 21, 'very', '1655732760_bluesneck.jpg', 'neck'),
(17, 13, 13, '8 Diamond Necklace', 1460, 38, 'very', '1655732991_whiteneck2.jpg', 'neck'),
(18, 13, 10, 'White Diamond Necklace', 890, 8, 'very', '1655733037_whiteneck.jpg', 'neck'),
(19, 13, 14, 'Dazzling Blue Swan', 115, 11, 'very', '1655733664_swannecklac.jpg', 'neck'),
(20, 13, 10, 'Dazzling Pink Swan', 115, 23, 'very', '1655733879_pinkswan.jpg', 'neck'),
(21, 13, 10, 'Swarovski Pink Heart', 340, 27, 'very', '1655734013_pinkheart.jpg', 'neck'),
(22, 16, 13, 'White Wedding Ring', 800, 10, 'fancy', '1655747113_whiteweddingring.jpg', 'rin'),
(23, 16, 13, 'Bypass Accent Diamond Ring', 2780, 22, 'nice', '1655747245_diamondring.jpg', 'rin'),
(24, 14, 10, 'Nail Bracelet', 50, 102, 'nice', '1655747551_nailbracelets.jpg', 'nice'),
(27, 15, 11, 'White Gold Earrings', 45, 34, 'nice', '1655748536_blackwhitegoldearrings.jpg', 'ear'),
(28, 15, 11, 'Teardrop Earrings', 4850, 34, 'nice', '1655748619_taerdropearrings.jpg', 'ear'),
(29, 15, 11, 'Ring Diamond Earrings', 4950, 34, 'nice', '1655748678_ringearrings.jpg', 'ear'),
(30, 15, 14, 'Diamond Blue Sapphire', 2101, 34, 'nice', '1655748993_bluediamondearrings.jpg', 'ear'),
(31, 17, 10, 'White Belly Piercing', 25, 114, 'hot', '1655749329_whitebellypiercing.jpg', 'pier'),
(32, 17, 10, 'Heart Belly Piercing', 35, 114, 'hot', '1655749392_heartpiercing.jpg', 'pier'),
(33, 17, 14, 'Royal Blue Gem Flower', 50, 114, 'hot', '1655749565_bluepiercing.jpg', 'pier'),
(34, 17, 11, 'Anchor Ship Piercing', 45, 87, 'hot', '1655749619_anchorpiercing.jpg', 'pier'),
(35, 17, 11, 'Navel Belly Piercing', 30, 87, 'hot', '1655749703_goldpiercing.jpg', 'pier'),
(37, 18, 14, 'Luxury Silver Watch', 6790, 118, 'hot', '1655749997_diamondwatch.jpg', 'wat'),
(38, 18, 14, 'Silver Blue Watch', 560, 30, 'nice', '1655750208_diamondbluewatch.jpg', 'wat'),
(39, 19, 12, 'Frozen Pendant', 60, 96, 'cute', '1655750497_frozenpendants2.jpg', 'pend'),
(40, 19, 12, 'Little Mermaid Pendant', 85, 96, 'cute', '1655750538_littlemermaidpendants.jpg', 'pend'),
(41, 19, 12, 'Minnie Mouse Disney', 55, 96, 'cute', '1655750563_minniependants.jpg', 'pend'),
(42, 19, 12, 'Minnie Mouse Pendant', 88, 100, 'cute', '1655750621_minnie2pendant.jpg', 'pend'),
(43, 19, 14, 'Jewelry Plated Star', 88, 349, 'cute', '1655751063_startpendant.jpg', 'pend'),
(44, 16, 13, 'Silver Wedding Rings Set', 2345, 28, 'nice', '1655751316_weddingrings.jpg', 'rin'),
(55, 16, 13, 'Halo Engagement Ring', 890, 50, 'Halo diamond engagement ring', '1661372956_diamondring1.jpg', 'Diamond');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(2, 'Diana', 'Ab', 'diana.pbp@gmail.com', 'eacfe3b05c2d070ea337ebd10bc0d93f', '7890765456', 'Batroun', 'Thoum'),
(4, 'Redwan', 'Alkurdi', 'redwan.alkurdi@gmail.com', '82513b4c8b334e600c5499eeaf0819b8', '1234567890', 'Germany', 'Mainz'),
(6, 'Maroun', 'Abi younes', 'maroun.abi.younes@gmail.com', '39b5177e82858ecc5661a2077b58edc3', '76399625', 'Halat', 'Laklouk'),
(9, 'Nataly', 'Abi wajeh', 'nataly.abi.wajeh@gmail.com', '62bb3bb8328cced9f11f42946692ba0a', '71196733', 'Batroun', 'Thoum'),
(10, 'Nuha', 'Akmeek', 'nuha.akmeek@gmail.com', 'be05ccb25cdd31f291969377fe0493e1', '76029313', 'Batroun', 'Thoum'),
(13, 'Joe', 'Doe', 'joe.ad@gmail.com', '25f9e794323b453885f5181f1b624d0b', '76399625', 'Batroun', 'batroun');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_cat` (`product_cat`),
  ADD KEY `fk_product_brand` (`product_brand`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_brand` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
