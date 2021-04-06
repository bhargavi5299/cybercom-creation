-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2021 at 08:31 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `application`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` int(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipcode`, `country`, `type`) VALUES
(1, 1, '73SHKTI SHYAM NAGAR SOCIETY JUNAGADHROAD', 'VISAVADER', 'Gujarat', 362130, 'India', 'Billing'),
(3, 1, 'Shipping', 'VISAVADER', 'Gujarat', 362130, 'India', 'Shipping'),
(4, 2, 'Neelkanth Elegance, Times Of India Press Road, near Vejalpur, Vejalpur, Ahmedabad, Gujarat, India\r\nA-1003', 'Ahmedabad City', 'Gujarat', 380051, 'India', 'Billing'),
(5, 2, 'Shipping', 'VISAVADER', 'Gujarat', 362130, 'India', 'Shipping');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Enable',
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `username`, `password`, `status`, `createdDate`) VALUES
(9, 'jalpa', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Enable', '2021-03-23 13:29:03'),
(10, 'saloni', '4b08a322a1da2ff24a298708cecd8eb6', 'Enable', '2021-03-23 13:29:16'),
(12, 'piya', '3049a1f0f1c808cdaa4fbed0e01649b1', 'Disable', '2021-04-01 14:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` enum('Product','Category') NOT NULL,
  `name` varchar(25) NOT NULL,
  `code` int(20) NOT NULL,
  `inputType` varchar(60) NOT NULL,
  `backendType` varchar(60) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(1, 'Product', 'ca', 20, 'text', 'varchar', 1, 'hello'),
(4, 'Product', 'brand', 14, 'text', 'varchar', 2, 'none'),
(5, 'Product', 'size', 14, 'radio', 'int', 3, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(1, 'red', 1, 1),
(12, 'raymond', 4, 1),
(13, 'yellow', 1, 2),
(14, 'blue', 1, 3),
(17, 'black', 1, 4),
(18, '', 1, 0),
(22, 'color', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(50) NOT NULL,
  `brandImage` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `sortOrder` int(50) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`, `brandImage`, `status`, `sortOrder`, `createdDate`) VALUES
(5, 'nikoa', '1617099932-7771-model1.jpg', '', 10, '2021-03-30 15:55:32'),
(6, 'VK', '1617100059-8076-VK.jpg', '', 11, '2021-03-30 15:57:39'),
(7, 'ff', '1617107279-2073-2.png', '', 200, '2021-03-30 17:57:59');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `sessionId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `total` decimal(50,0) NOT NULL,
  `discount` int(50) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `shippingMethodId` int(11) NOT NULL,
  `shippingAmount` int(50) NOT NULL,
  `grandTotal` int(11) NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `sessionId`, `customerId`, `total`, `discount`, `paymentMethodId`, `shippingMethodId`, `shippingAmount`, `grandTotal`, `createdDate`) VALUES
(1, 0, 1, '1100', 1, 1, 4, 1000, 0, '2021-03-31 14:11:59'),
(51, 0, 0, '0', 0, 0, 0, 0, 0, '2021-03-31 10:45:52'),
(52, 0, 4, '0', 0, 0, 0, 0, 0, '2021-04-02 08:07:09'),
(53, 0, 2, '0', 0, 0, 0, 0, 0, '2021-04-02 10:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `cart_address`
--

CREATE TABLE `cart_address` (
  `cartAddressId` int(50) NOT NULL,
  `cartId` int(50) NOT NULL,
  `firstName` int(11) NOT NULL,
  `lastName` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `addressType` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipCode` int(100) NOT NULL,
  `sameAsBilling` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_address`
--

INSERT INTO `cart_address` (`cartAddressId`, `cartId`, `firstName`, `lastName`, `address`, `addressType`, `city`, `state`, `country`, `zipCode`, `sameAsBilling`) VALUES
(1, 1, 0, 0, '', 'Billing', 'ahmedabad', 'gujarat', 'india', 382350, 'cybercome as ');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cartitemId` int(50) NOT NULL,
  `cartId` int(50) NOT NULL,
  `productId` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `baseprice` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `discount` int(50) NOT NULL,
  `createdDate` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cartitemId`, `cartId`, `productId`, `quantity`, `baseprice`, `price`, `discount`, `createdDate`) VALUES
(12, 51, 55, 10, 12000, 0, 120, '2021-03-31 10:45:52.000000'),
(13, 51, 1, 24, 11, 0, 0, '2021-04-01 13:58:35.000000'),
(16, 53, 1, 3, 20000, 0, 10, '2021-04-02 10:23:29.000000'),
(17, 1, 1, 3, 20000, 0, 10, '2021-04-02 15:21:05.000000');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `pathId` varchar(255) DEFAULT NULL,
  `ca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `parentId`, `name`, `status`, `description`, `pathId`, `ca`) VALUES
(1, 0, 'Bedroom', 'Enable', 'heklo', '1', 0),
(2, 1, 'Bed', 'Enable', '', '1/2', 0),
(3, 2, 'Panelbed', 'Enable', '', '1/2/3', 0),
(4, 3, 'header', 'Enable', '', '1/2/3/4', 0),
(5, 3, 'footer', 'Enable', '', '1/2/3/5', 0),
(6, 0, 'Sofa', 'Enable', '', '6', NULL),
(7, 6, 'justSofa', '0', '', '6/7', 0),
(10, 5, 'Bedroom', 'Enable', 'footer', '1/2/3/5/10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categorymedia`
--

CREATE TABLE `categorymedia` (
  `imageId` int(10) NOT NULL,
  `categoryId` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `label` varchar(100) NOT NULL,
  `icon` tinyint(1) NOT NULL,
  `base` tinyint(1) NOT NULL,
  `banner` tinyint(1) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorymedia`
--

INSERT INTO `categorymedia` (`imageId`, `categoryId`, `image`, `label`, `icon`, `base`, `banner`, `status`) VALUES
(2, 1, '1617103649-2598-Nature-HD-Sea-View1.jpg', 'image2', 0, 0, 1, ''),
(3, 0, '', 'image1', 0, 0, 0, ''),
(4, 0, '', '', 1, 0, 0, ''),
(5, 0, '', '', 0, 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `pageId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `indentifier` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`pageId`, `title`, `indentifier`, `content`, `status`, `createdDate`) VALUES
(1, 'Html', '123456', '<p><strong>hello</strong></p>', 0, '2021-03-08 13:25:54'),
(2, 'Php', '452', '<p><a href=\"mailto:bhargaveep@gmail.com?subject=Hello&amp;body=Hello\">hello</a></p>', 1, '2021-03-08 13:34:11'),
(3, 'For user', 'About Us', '<p><strong>Hello How are you?<a href=\"http://shine.com\">Hello BHargavi</a></strong></p>', 1, '2021-03-10 12:41:09'),
(6, 'php', 'gello', '<p><em><strong>xsxs</strong></em></p>', 0, '2021-03-24 12:40:06'),
(7, 'java', '1234', '<p>HEllo</p>', 1, '2021-03-24 17:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `configId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `code` int(100) NOT NULL,
  `value` int(100) NOT NULL,
  `createdDate` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`configId`, `groupId`, `title`, `code`, `value`, `createdDate`) VALUES
(14, 0, 'questocim', 201, 22, '2021-04-05 13:50:48.181294'),
(15, 0, 'keke', 11, 11, '2021-04-05 13:53:37.215493');

-- --------------------------------------------------------

--
-- Table structure for table `config_group`
--

CREATE TABLE `config_group` (
  `groupId` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `createdDate` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config_group`
--

INSERT INTO `config_group` (`groupId`, `name`, `createdDate`) VALUES
(1, 'questcom', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `customergroup`
--

CREATE TABLE `customergroup` (
  `groupId` int(11) NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customergroup`
--

INSERT INTO `customergroup` (`groupId`, `groupName`, `status`, `createdDate`) VALUES
(1, 'Retail', 'Enable', '2021-03-10 20:26:46'),
(2, 'Wholesale', 'Enable', '2021-03-10 22:53:44'),
(5, 'Group 2', 'Disable', '2021-03-11 22:19:32'),
(6, 'Group  3', 'Enable', '2021-03-11 22:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` int(11) NOT NULL,
  `groupId` int(11) DEFAULT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `mobilenu` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(7) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `groupId`, `firstname`, `lastname`, `mobilenu`, `email`, `password`, `status`, `createdDate`, `updatedDate`) VALUES
(1, 1, 'bhargavi', 'prajapati', '08238751325', 'bhh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Enable', '2021-04-02 13:51:25', '0000-00-00 00:00:00'),
(2, 2, 'piya', 'prajapati', '08238751325', 'bhargaveep@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Enable', '2021-04-02 13:52:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `methodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(700) NOT NULL,
  `status` varchar(15) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`methodId`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(9, 'vv', '222', 'MNBNM', 'Disable', '2021-03-24 12:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(50) NOT NULL,
  `discount` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `brandId`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdDate`, `updatedDate`, `brand`, `color`, `size`) VALUES
(1, 6, '10000', 'saloni', 20000, 10, 2, 'tv', 'Enable', '0000-00-00 00:00:00', '2021-04-02 01:48:56', '', '', 0),
(3, 6, '10', 'kitkat', 20, 10, 8, 'jhkjhj', '', '2021-04-02 11:32:39', '0000-00-00 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productmedia`
--

CREATE TABLE `productmedia` (
  `imageId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  `small` tinyint(1) NOT NULL,
  `thumb` tinyint(1) NOT NULL,
  `base` tinyint(1) NOT NULL,
  `gallary` tinyint(1) NOT NULL,
  `productId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productmedia`
--

INSERT INTO `productmedia` (`imageId`, `image`, `label`, `small`, `thumb`, `base`, `gallary`, `productId`) VALUES
(23, '1616411777-3880-model1.jpg', '', 1, 0, 0, 0, 14),
(24, '1616411783-9128-model1.jpg', '', 0, 1, 0, 0, 14),
(25, '1616411861-5444-uml.png', '', 0, 0, 1, 0, 14),
(26, '1616412012-3149-seuence.png', '', 0, 0, 0, 1, 14),
(28, '1616818062-1875-model1.jpg', 'model', 0, 1, 0, 1, 55),
(29, '1616818080-7707-VK.jpg', 'vk', 1, 0, 0, 1, 55),
(30, '1616831469-9468-MSD.jpg', '', 0, 0, 0, 0, 0),
(31, '1616844534-3817-model1.jpg', '', 0, 0, 0, 0, 0),
(32, '1616844541-9583-MSD.jpg', '', 0, 0, 0, 0, 0),
(33, '1616844550-7763-MSD.jpg', '', 0, 0, 0, 0, 0),
(34, '1616844564-5403-MSD.jpg', '', 0, 0, 0, 0, 0),
(35, '1616845198-1750-MSD.jpg', '', 0, 0, 0, 0, 0),
(36, '1616845325-1496-MSD.jpg', '', 0, 0, 0, 0, 0),
(37, '1616845326-4221-MSD.jpg', '', 0, 0, 0, 0, 0),
(38, '1616845348-9477-MSD.jpg', '', 0, 0, 0, 0, 0),
(39, '1616845348-3550-MSD.jpg', '', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(1, 14, 1, '1300'),
(2, 14, 2, '850'),
(3, 14, 6, '950'),
(4, 14, 7, '900'),
(5, 55, 1, '950'),
(6, 55, 2, '600'),
(7, 55, 5, '750'),
(8, 55, 7, '0'),
(9, 14, 5, '7890'),
(10, 55, 6, '1100'),
(11, 55, 8, '450');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `methodId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`methodId`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(1, 'Piya', 15078, 40000, 'Smart Watches', 'Enable', '2021-02-17 11:37:35'),
(2, 'bhargavi', 15748, 54200, 'Laptop', 'Disable', '2021-02-17 11:48:19'),
(4, 'Mansi', 882703, 54200, 'Mobile Phone', 'Enable', '2021-02-18 10:19:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `cart_address`
--
ALTER TABLE `cart_address`
  ADD PRIMARY KEY (`cartAddressId`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cartitemId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `categorymedia`
--
ALTER TABLE `categorymedia`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `indentifier` (`indentifier`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`configId`);

--
-- Indexes for table `config_group`
--
ALTER TABLE `config_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `customergroup`
--
ALTER TABLE `customergroup`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `brandId` (`brandId`);

--
-- Indexes for table `productmedia`
--
ALTER TABLE `productmedia`
  ADD PRIMARY KEY (`imageId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`methodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `cart_address`
--
ALTER TABLE `cart_address`
  MODIFY `cartAddressId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cartitemId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categorymedia`
--
ALTER TABLE `categorymedia`
  MODIFY `imageId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `configId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `config_group`
--
ALTER TABLE `config_group`
  MODIFY `groupId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customergroup`
--
ALTER TABLE `customergroup`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `productmedia`
--
ALTER TABLE `productmedia`
  MODIFY `imageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `customergroup` (`groupId`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brandId`) REFERENCES `brand` (`brandId`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
