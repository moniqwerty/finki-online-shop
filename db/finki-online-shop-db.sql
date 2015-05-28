-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2015 at 10:25 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finki-online-shop-db`
--
CREATE DATABASE IF NOT EXISTS `finki-online-shop-db` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `finki-online-shop-db`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 0, 1, 2),
(2, 8, 7, 1),
(3, 8, 21, 1),
(4, 8, 21, 1),
(5, 8, 16, 1),
(6, 8, 7, 1),
(7, 8, 23, 1),
(8, 8, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `description` varchar(300) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Компјутери', 'десктоп компјутери'),
(3, 'Преносни компјутери', 'преносни копмјутери'),
(4, 'Компјутерски делови', 'делови за компјутер'),
(5, 'Мултимедија', 'мултимедија'),
(6, 'Мрежна опрема', 'мрежна опрема'),
(7, 'USB флеш', 'усб');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `customerName` varchar(30) CHARACTER SET latin1 NOT NULL,
  `customerMail` varchar(30) CHARACTER SET latin1 NOT NULL,
  `shippingAddress` varchar(100) CHARACTER SET latin1 NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `customerName`, `customerMail`, `shippingAddress`, `date`) VALUES
(1, 1, 'name', 'user1@finki.com', 'address ', '2015-05-18'),
(2, 2, 'name2', 'user2@finki.com', 'address', '2015-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalCost` float NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `totalCost`) VALUES
(1, 3, 2, 5000),
(2, 1, 3, 300),
(2, 5, 1, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_bin NOT NULL,
  `description` varchar(500) COLLATE utf8_bin NOT NULL,
  `category_id` int(20) NOT NULL,
  `small_img` varchar(100) CHARACTER SET latin1 NOT NULL,
  `big_img` varchar(100) CHARACTER SET latin1 NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=32 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `small_img`, `big_img`, `price`) VALUES
(6, 'ASUS PC M11AD-UK002S-i5-4440S', '• Intel® Core™ i5 4440S Processor 2.8GHz • 8GB RAM • 2TB (2000GB) hard disc • AMD Radeon R7 240 - 2GB  • SuperMulti DVD RW optical drive • 2x USB 3.0, 6x USB 2.0, HDMI, 6-in-1 card reader • Wi-Fi Адаптер 802.11ac + LAN 10/100/1000Mbps • Подарок безична тастатура и глувче • Лиценциран Windows 8.1', 1, 'asus_small.jpg', 'asus_small.jpg', 26590),
(7, 'GAMER 9421I ', 'Intel Core i7-4790 3.6 GHz MB Gigabyte GA-Z97-HD3 8 GB RAM 2000 GB HDD + 120 GB SSD nVidia GeForce GTX 750Ti - 2GB GDDR5 DVDRW', 1, 'gamer.jpg', 'gamer.jpg', 53000),
(8, 'LENOVO(90C20023RI)H30-00', 'Intel Processor J1800 2.41 GHz 4 GB RAM 500 GB HDD Intel HD Graphics DVDRW Windows 8.1 Mouse + Keyboard', 1, 'lenovo.jpg', 'lenovo.jpg', 15500),
(9, 'ACER E5-571G-31MZ 15,6', '15.6" HD LED Display Intel Core i3-4005U 4 GB DDR3 RAM 1000 GB HDD nVidia GeForce 840M - 2GB LAN, Wi-Fi b/g/nb, BT, HDMI, USB 3.0 DVDRW, Webcam', 3, 'acer_laptop_small.jpg', 'acer_laptop_small.jpg', 24450),
(10, 'ASUS N750JK-T4256D 17.3"FHD', '17.3" Full HD Display, 1920x1080p Intel Core i7-4710HQ 12 GB RAM 1000 GB HDD + 24 GB HCSSD nVidia GT850 - 4GB LAN, Wi-Fi b/g/n, HDMI, BT 4.0, USB 3.0 Subwoofer DVDRW, HD Webcam', 3, 'asus_laptop.jpg', 'asus_laptop.jpg', 58990),
(11, 'ASUS Memo Pad HD7 ME173X-1A062A', '7" IPS Touch Screen, 1280x800 ediaTek MT8125 1.2Ghz QUAD Core SGX544 Graphics 1 GB RAM 8 GB Storage up to 32 GB LAN, Wi-Fi, BT, miCro USB, BT 4.0, GPS Dual Cam, Front cam, 2.0 MP Back OS Android Jelly Bean 4.2', 3, 'asus_tablet.jpg', 'asus_tablet.jpg', 6450),
(12, 'LENOVO FLEX 2 ', '15.6" FHD LED Display MULTI Touch Intel Core i5-4210U 8 GB RAM 256 GB SSHD nVidia GT 840M - 2GB LAN, Wi-Fi b/g/n, HDMI, USB 3.0 DVDRW, Webcam Windows 8.1', 3, 'lenovo_felx.jpg', 'lenovo_felx.jpg', 43990),
(13, 'LENOVO A7600 Blue', '10" HD IPS Capacitive Screen, 800x1280 QUAD Core MediaTek 1.3 GHz processor 1 GB RAM 16 GB Flash up to 32 GB micro SD Wi-Fi b/g/n, A-GPS, BT 4.0, micro USB Dual Webcam, Back 5.0 MP, Front 2.0 MP 6340 mAh Li-Ion Polymer battery Android 4.2.2 Jelly Bean', 3, 'lenovo_tablet.jpg', 'lenovo_tablet.jpg', 10490),
(14, 'VGA Point of iew GTX 980', 'Graphics Processing Unit	GeForce GTX 980 Graphics core speed	1127 MHz - 1216 MHz boost Memory	4096 MB Memory type	GDDR5 Memory Speed	7010 MHz Memory bus	256 bit Shader processors	2048 DVI	1x HDMI	1x DisplayPort	3x Interface	PCI Express 3.0 Supplemental power connector	2x PCI-E 6-pins Cooling technique	active SLI	3-way', 4, 'vga.jpg', 'vga.jpg', 33990),
(15, 'WD 2TB SATA3 WD2003FZEX 7200 Caviar Black', '64MB', 4, 'wd.jpg', 'wd.jpg', 8990),
(16, 'A4 TECH T-500-1 headset', 'headset', 5, 'tech.jpg', 'tech.jpg', 530),
(17, 'A4-PK-30MJ 5M pixel USB 2.0 Portable Clip-on ViewCAM', 'Up to 5 Megapixel interpolated resolution. USB 2.0 Connection. Includes Mic. PC and Mac hardware compatiable. Plug and play.', 5, 'cam.jpg', 'cam.jpg', 750),
(19, 'SPK bluetooth USB', 'speaker', 5, 'beat.jpg', 'beat.jpg', 1250),
(20, 'SPEAKERS GENIUS SW-G2.1 1250', 'Total output power 38 watts (RMS) Ultra-rigid MDF wooden cabinet subwoofer with rich and deep bass Curvaceous satellite speakers with hook design Adjustable Volume and Bass controls Microphone jack for online talking Headphone jack for private listening', 5, 'genius.jpg', 'genius.jpg', 3600),
(22, 'TP-LINK TL-WR740N Wireless N Router', '    Wireless speed up to 150Mbps     CCA™ technology delivers reliable performance even in noisy environment     Wireless security encryption easily at a push of QSS button     Priority of service assures the quality of bandwidth sensitive applications such as voice and video     Supports SPI firewall and access control management     Supports WPA/WPA2 encryptions     Seamlessly compatible with 802.11b/g/n devices', 6, 'tplink.jpg', 'tplink.jpg', 1050),
(23, 'QUART USB WiFI', 'usb wi-fi', 6, 'usbwifi.jpg', 'usbwifi.jpg', 1390),
(24, 'TP-LINK TL-ANT2406A Indoor Directional Antenna', 'indoor directional antenna', 6, 'antena.jpg', 'antena.jpg', 790),
(25, 'USB Flash-Drive Verbatim PinStripe USB 2.0 (SBNN0005)', '8GB', 7, 'verbatim.jpg', 'verbatim.jpg', 290),
(26, 'APACER USB 2.0 FLASH DRIVE AH137(AP16GAH137G-1)', '16GB ', 7, 'apacer.jpg', 'apacer.jpg', 350),
(27, 'APACER USB 2.0 FLASH DRIVE AH129(AP16GAH129P-1)', '16GB', 7, 'apacer_pink.jpg', 'apacer_pink.jpg', 560),
(29, 'USB Flash-Drive SONY USM32SA1W ', '32GB', 7, 'sony_32.jpg', 'sony_32.jpg', 1190),
(30, 'APACER USB 3.0 FLASH DRIVE AH350(AP128GAH350B-1)', '128GB ', 7, 'apacer_black.jpg', 'apacer_black.jpg', 4090),
(31, 'USB Flash Drive ADATA AC008-64G-RWE', '64GB ', 7, 'adata.jpg', 'adata.jpg', 1390);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 NOT NULL,
  `email` varchar(20) CHARACTER SET latin1 NOT NULL,
  `usertype` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `usertype`) VALUES
(3, 'admin', 'admin', 'admin@finki.com', 'admin'),
(8, 'user1', '438cecd9768256dcb439ddc610ce4b72', 'user1@finki.mk', 'user'),
(9, 'user2', '438cecd9768256dcb439ddc610ce4b72', 'user2@finki.mk', 'user'),
(10, 'user3', '438cecd9768256dcb439ddc610ce4b72', 'user3@finki.mk', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
