-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 16, 2015 at 08:04 
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `Block`
--

CREATE TABLE IF NOT EXISTS `Block` (
  `idBlock` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Block`
--

INSERT INTO `Block` (`idBlock`, `name`) VALUES
(1, 'South'),
(2, 'East'),
(3, 'West'),
(4, 'North');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `idCustomer` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `address` varchar(64) NOT NULL,
  `mobileNumber` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`idCustomer`, `email`, `password`, `name`, `surname`, `address`, `mobileNumber`) VALUES
(16, 'lsvast@riteh.hr', 'luka1234', 'Luka', 'Svast', 'Brace dr. Sobol 16B', '0911524503'),
(17, 'mbistricic@gradri.hr', 'matija1234', 'Matija', 'Bistricic', 'Franje Cara 11', '0981567403'),
(18, 'bkruzic@riteh.hr', 'bogomil1234', 'Bogomil', 'Kruzic', 'Petak 13', '0928000573'),
(19, 'mmaric@fer.hr', 'mirko1234', 'Mirko', 'Maric', 'Ilica 987', '0915678432');

-- --------------------------------------------------------

--
-- Table structure for table `DeliveryBoy`
--

CREATE TABLE IF NOT EXISTS `DeliveryBoy` (
  `idDeliveryBoy` int(11) NOT NULL,
  `idBlock` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DeliveryBoy`
--

INSERT INTO `DeliveryBoy` (`idDeliveryBoy`, `idBlock`, `name`) VALUES
(1, 1, 'Zoran'),
(2, 2, 'Dean'),
(5, 3, 'Miroslav'),
(6, 4, 'Ivan'),
(11, 2, 'Krunoslav');

-- --------------------------------------------------------

--
-- Table structure for table `FoodOrder`
--

CREATE TABLE IF NOT EXISTS `FoodOrder` (
  `idItem` int(11) NOT NULL,
  `idDeliveryBoy` int(11) NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `orderDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FoodOrder`
--

INSERT INTO `FoodOrder` (`idItem`, `idDeliveryBoy`, `idCustomer`, `orderDate`) VALUES
(1, 1, 16, '2015-06-16 17:41:18'),
(1, 1, 17, '2015-06-14 20:50:21'),
(2, 1, 16, '2015-06-16 17:41:18'),
(2, 1, 17, '2015-06-14 20:50:40'),
(3, 1, 17, '2015-06-14 20:50:40'),
(4, 1, 17, '2015-06-14 20:50:40'),
(5, 1, 17, '2015-06-14 20:50:40'),
(5, 1, 19, '2015-06-16 20:02:22'),
(6, 1, 16, '2015-06-16 17:41:18'),
(10, 1, 16, '2015-06-16 17:41:18'),
(15, 1, 19, '2015-06-16 20:02:22'),
(1, 2, 17, '2015-06-14 20:50:28'),
(1, 2, 17, '2015-06-14 20:50:34'),
(2, 2, 17, '2015-06-14 20:49:56'),
(5, 2, 17, '2015-06-14 20:50:56'),
(14, 2, 17, '2015-06-14 20:50:56'),
(15, 2, 17, '2015-06-14 20:50:56'),
(1, 5, 16, '2015-06-16 19:04:12'),
(1, 5, 17, '2015-06-14 20:50:47'),
(1, 5, 18, '2015-06-16 19:06:52'),
(2, 5, 17, '2015-06-14 20:49:29'),
(2, 5, 17, '2015-06-14 20:50:47'),
(3, 5, 17, '2015-06-14 20:49:29'),
(4, 5, 17, '2015-06-14 20:50:15'),
(5, 5, 17, '2015-06-14 20:50:07'),
(5, 5, 17, '2015-06-14 20:50:15'),
(8, 5, 16, '2015-06-16 19:04:12'),
(9, 5, 17, '2015-06-16 19:50:38'),
(10, 5, 17, '2015-06-16 19:50:38'),
(11, 5, 17, '2015-06-14 20:49:29'),
(11, 5, 17, '2015-06-16 19:50:38'),
(12, 5, 17, '2015-06-16 19:50:38'),
(13, 5, 16, '2015-06-16 19:04:12'),
(13, 5, 17, '2015-06-16 19:50:38'),
(14, 5, 17, '2015-06-16 19:50:38'),
(14, 5, 18, '2015-06-16 19:06:52'),
(15, 5, 17, '2015-06-14 20:49:29'),
(15, 5, 17, '2015-06-16 19:50:38'),
(1, 6, 16, '2015-06-16 19:52:51'),
(2, 6, 16, '2015-06-16 19:52:51'),
(2, 6, 17, '2015-06-16 19:30:55'),
(3, 6, 16, '2015-06-16 19:52:51'),
(3, 6, 17, '2015-06-14 20:51:06'),
(4, 6, 17, '2015-06-16 17:41:46'),
(5, 6, 17, '2015-06-14 20:51:06'),
(5, 6, 17, '2015-06-16 17:41:46'),
(10, 6, 17, '2015-06-16 19:30:55'),
(11, 6, 17, '2015-06-14 20:51:06'),
(13, 6, 17, '2015-06-16 17:41:46'),
(14, 6, 16, '2015-06-16 19:52:51'),
(14, 6, 17, '2015-06-16 17:41:46'),
(15, 6, 16, '2015-06-16 19:52:51'),
(15, 6, 17, '2015-06-16 17:41:46'),
(15, 6, 17, '2015-06-16 19:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `FoodTable`
--

CREATE TABLE IF NOT EXISTS `FoodTable` (
  `idFoodTable` int(11) NOT NULL,
  `idPosition` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FoodTable`
--

INSERT INTO `FoodTable` (`idFoodTable`, `idPosition`, `capacity`) VALUES
(1, 1, 2),
(2, 1, 2),
(3, 1, 2),
(4, 1, 2),
(5, 1, 3),
(6, 1, 3),
(7, 1, 3),
(8, 1, 4),
(9, 1, 4),
(10, 1, 5),
(11, 1, 6),
(12, 2, 2),
(13, 2, 2),
(14, 2, 2),
(15, 2, 2),
(16, 2, 3),
(17, 2, 3),
(18, 2, 4),
(19, 2, 5),
(20, 2, 6),
(22, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE IF NOT EXISTS `Item` (
  `idItem` int(11) NOT NULL,
  `idItemType` int(11) NOT NULL,
  `name` text NOT NULL,
  `itemDescription` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`idItem`, `idItemType`, `name`, `itemDescription`, `price`) VALUES
(1, 1, 'Margherita', 'Cheese and tomato pizza.', 4),
(2, 1, 'Pepperoni', 'Pepperoni and cheese pizza.', 4),
(3, 1, 'Sea Food', 'Tuna, prawns, sweetcorn, onions and sliced tomatoes pizza.', 6),
(4, 1, 'Vegetarian', 'Mushrooms, onions, green peppers, sweetcorn and sliced tomatoes pizza.', 5),
(5, 1, 'Bacon', 'Bacon, mushrooms, onions and sliced tomatoes pizza.', 5),
(6, 2, 'Napolitana', 'Classic tomato sauce with olive oil, garlic, basil and herbs.', 4),
(7, 2, 'Bolognese', 'Tasty beef in a napolitana sauce.', 4),
(8, 2, 'Salmon', 'Smoked salmon, garlic, cracked pepper, parsley and baby spinach in a cream sauce.', 7),
(9, 3, 'Bistecca', 'British rump steak grilled to just how you like it, with lemon and rosemary roasted baby potatoe.', 19),
(10, 3, 'Maiale', 'Grilled loin of pork lightly seasoned with rosemary and pepper. Served on a bed of lemon and rosemary roasted baby potatoes.', 14),
(11, 3, 'Filetto Di Manzo', 'Herb encrusted kobe beef tenderloin served on a portobello mushroom with tomato, goat cheese, roasted potatoes and shallots.', 39),
(12, 4, 'Coconut Panna Cotta', 'Coconut cookies and chocolate almonds.', 3),
(13, 4, 'Caramel Coppetta', 'Marshmallow sauce with salted Spanish peanuts.', 4),
(14, 5, 'Cabernet Sauvignon', 'Flavours of blackberries and raspberries, hints of roasted coffee and earthy spiciness.', 28),
(15, 5, 'Valley Chardonnay', 'A complex wine with bright tropical and stone fruit flavours.', 21);

-- --------------------------------------------------------

--
-- Table structure for table `ItemType`
--

CREATE TABLE IF NOT EXISTS `ItemType` (
  `idItemType` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ItemType`
--

INSERT INTO `ItemType` (`idItemType`, `name`) VALUES
(1, 'pizza'),
(2, 'pasta'),
(3, 'meat'),
(4, 'dessert'),
(5, 'drink');

-- --------------------------------------------------------

--
-- Table structure for table `Position`
--

CREATE TABLE IF NOT EXISTS `Position` (
  `idPosition` int(11) NOT NULL,
  `positionName` varchar(32) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Position`
--

INSERT INTO `Position` (`idPosition`, `positionName`, `description`) VALUES
(1, 'indoor', 'Dorsia offers indoors tables for your enjoyment. Smoking is not allowed here.'),
(2, 'outdoor', 'Our outdoor tables are perfect for hot summer evenings. Smoking is allowed here.');

-- --------------------------------------------------------

--
-- Table structure for table `Reservation`
--

CREATE TABLE IF NOT EXISTS `Reservation` (
  `idFoodTable` int(11) NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `personCount` int(11) NOT NULL,
  `reservationTime` time NOT NULL,
  `reservationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Reservation`
--

INSERT INTO `Reservation` (`idFoodTable`, `idCustomer`, `personCount`, `reservationTime`, `reservationDate`) VALUES
(1, 16, 2, '09:00:00', '2015-06-17'),
(4, 17, 2, '08:00:00', '2015-06-16'),
(10, 19, 5, '08:00:00', '2015-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `idUser` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `rights` enum('ADMIN','MODERATOR') NOT NULL,
  `email` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`idUser`, `username`, `password`, `rights`, `email`) VALUES
(1, 'lsvast', '1234moderator', 'MODERATOR', 'lsvast@dorsia.com'),
(2, 'bkruzic', 'moderator1234', 'MODERATOR', 'bkruzic@dorsia.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Block`
--
ALTER TABLE `Block`
  ADD PRIMARY KEY (`idBlock`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indexes for table `DeliveryBoy`
--
ALTER TABLE `DeliveryBoy`
  ADD PRIMARY KEY (`idDeliveryBoy`),
  ADD KEY `idBlock` (`idBlock`);

--
-- Indexes for table `FoodOrder`
--
ALTER TABLE `FoodOrder`
  ADD PRIMARY KEY (`idItem`,`idDeliveryBoy`,`idCustomer`,`orderDate`),
  ADD KEY `idDeliveryBoy` (`idDeliveryBoy`),
  ADD KEY `idCustomer` (`idCustomer`);

--
-- Indexes for table `FoodTable`
--
ALTER TABLE `FoodTable`
  ADD PRIMARY KEY (`idFoodTable`),
  ADD KEY `idPosition` (`idPosition`);

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`idItem`),
  ADD KEY `idItemType` (`idItemType`);

--
-- Indexes for table `ItemType`
--
ALTER TABLE `ItemType`
  ADD PRIMARY KEY (`idItemType`);

--
-- Indexes for table `Position`
--
ALTER TABLE `Position`
  ADD PRIMARY KEY (`idPosition`);

--
-- Indexes for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`idFoodTable`,`idCustomer`,`personCount`,`reservationTime`,`reservationDate`),
  ADD KEY `idCustomer` (`idCustomer`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Block`
--
ALTER TABLE `Block`
  MODIFY `idBlock` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `DeliveryBoy`
--
ALTER TABLE `DeliveryBoy`
  MODIFY `idDeliveryBoy` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `FoodTable`
--
ALTER TABLE `FoodTable`
  MODIFY `idFoodTable` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `ItemType`
--
ALTER TABLE `ItemType`
  MODIFY `idItemType` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Position`
--
ALTER TABLE `Position`
  MODIFY `idPosition` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `DeliveryBoy`
--
ALTER TABLE `DeliveryBoy`
  ADD CONSTRAINT `DeliveryBoy_ibfk_1` FOREIGN KEY (`idBlock`) REFERENCES `Block` (`idBlock`);

--
-- Constraints for table `FoodOrder`
--
ALTER TABLE `FoodOrder`
  ADD CONSTRAINT `FoodOrder_ibfk_1` FOREIGN KEY (`idItem`) REFERENCES `Item` (`idItem`),
  ADD CONSTRAINT `FoodOrder_ibfk_2` FOREIGN KEY (`idDeliveryBoy`) REFERENCES `DeliveryBoy` (`idDeliveryBoy`),
  ADD CONSTRAINT `FoodOrder_ibfk_3` FOREIGN KEY (`idCustomer`) REFERENCES `Customer` (`idCustomer`);

--
-- Constraints for table `FoodTable`
--
ALTER TABLE `FoodTable`
  ADD CONSTRAINT `FoodTable_ibfk_1` FOREIGN KEY (`idPosition`) REFERENCES `Position` (`idPosition`);

--
-- Constraints for table `Item`
--
ALTER TABLE `Item`
  ADD CONSTRAINT `Item_ibfk_1` FOREIGN KEY (`idItemType`) REFERENCES `ItemType` (`idItemType`);

--
-- Constraints for table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_1` FOREIGN KEY (`idFoodTable`) REFERENCES `FoodTable` (`idFoodTable`),
  ADD CONSTRAINT `Reservation_ibfk_2` FOREIGN KEY (`idCustomer`) REFERENCES `Customer` (`idCustomer`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
