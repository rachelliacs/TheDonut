-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_chasierapp
DROP DATABASE IF EXISTS `db_chasierapp`;
CREATE DATABASE IF NOT EXISTS `db_chasierapp` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_chasierapp`;

-- Dumping structure for table db_chasierapp.tb_cart
DROP TABLE IF EXISTS `tb_cart`;
CREATE TABLE IF NOT EXISTS `tb_cart` (
  `cartID` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL DEFAULT '0',
  `productID` int NOT NULL DEFAULT '0',
  `cartQuantity` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`cartID`),
  KEY `FK_CartProduct` (`productID`),
  KEY `FK_CartUser` (`userID`),
  CONSTRAINT `FK_CartProduct` FOREIGN KEY (`productID`) REFERENCES `tb_product` (`productID`),
  CONSTRAINT `FK_CartUser` FOREIGN KEY (`userID`) REFERENCES `tb_user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_chasierapp.tb_cart: ~1 rows (approximately)
DELETE FROM `tb_cart`;
INSERT INTO `tb_cart` (`cartID`, `userID`, `productID`, `cartQuantity`) VALUES
	(52, 5, 12, 2),
	(54, 5, 19, 3);

-- Dumping structure for table db_chasierapp.tb_order
DROP TABLE IF EXISTS `tb_order`;
CREATE TABLE IF NOT EXISTS `tb_order` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `cartID` int NOT NULL,
  `orderDate` timestamp NOT NULL,
  `orderTotalPrice` decimal(10,2) NOT NULL,
  `orderStatus` enum('pending','done') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `orderMethod` enum('cash','transfer') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cartQuantity` int DEFAULT NULL,
  PRIMARY KEY (`orderID`),
  KEY `FK_OrderCustomer` (`userID`),
  KEY `FK_OrderProduct` (`cartID`) USING BTREE,
  CONSTRAINT `FK_OrderCustomer` FOREIGN KEY (`userID`) REFERENCES `tb_user` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=1969990553 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_chasierapp.tb_order: ~10 rows (approximately)
DELETE FROM `tb_order`;
INSERT INTO `tb_order` (`orderID`, `userID`, `cartID`, `orderDate`, `orderTotalPrice`, `orderStatus`, `orderMethod`, `cartQuantity`) VALUES
	(161505597, 5, 43, '2024-03-03 23:42:33', 21500.00, 'done', 'transfer', 2),
	(177161260, 5, 53, '2024-03-04 18:39:58', 15000.00, 'done', 'transfer', 1),
	(296680852, 5, 39, '2024-02-03 08:09:07', 40000.00, 'done', 'transfer', 8),
	(685307020, 5, 37, '2024-02-03 07:37:55', 15000.00, 'pending', 'transfer', 3),
	(769553413, 5, 41, '2024-03-04 18:19:46', 10000.00, 'done', 'transfer', 2),
	(816073810, 17, 48, '2024-03-04 05:52:18', 10000.00, 'done', 'transfer', 1),
	(924964884, 17, 49, '2024-03-04 05:41:26', 15000.00, 'done', 'transfer', 1),
	(1167510159, 17, 47, '2024-03-04 05:54:42', 5000.00, 'done', 'transfer', 1),
	(1187082475, 5, 45, '2024-03-03 22:55:25', 26500.00, 'done', 'transfer', 1),
	(1648998806, 5, 42, '2024-03-04 18:15:41', 11500.00, 'done', 'transfer', 1);

-- Dumping structure for table db_chasierapp.tb_product
DROP TABLE IF EXISTS `tb_product`;
CREATE TABLE IF NOT EXISTS `tb_product` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `productCategoryID` int NOT NULL,
  `productName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `productDesc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `productPrice` decimal(10,2) NOT NULL,
  `productSellingPrice` decimal(10,2) NOT NULL,
  `productStock` int NOT NULL,
  `productImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`productID`),
  KEY `FK_ProductCategory` (`productCategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_chasierapp.tb_product: ~26 rows (approximately)
DELETE FROM `tb_product`;
INSERT INTO `tb_product` (`productID`, `productCategoryID`, `productName`, `productDesc`, `productPrice`, `productSellingPrice`, `productStock`, `productImage`) VALUES
	(2, 6, 'Avocado Dicaprio', '', 3.00, 5.00, 20, 'thedonut-avocado-dicaprio.png'),
	(4, 2, 'Butter Cream', '', 4.00, 5.00, 3, 'thedonut-butter-cream.jpg'),
	(12, 3, 'Caviar Strawberry', '', 3.00, 5.00, 0, 'thedonut-caviar-strawberry.jpg'),
	(14, 5, 'Caviar Chocolate', '', 3.00, 5.00, 0, 'thedonut-caviar-chocolate.jpg'),
	(17, 3, 'Alpacone', '', 6.00, 10.00, 7, 'thedonut-alpacone.png'),
	(18, 6, 'Cheese Cakelicious', '', 3.00, 5.00, 3, 'thedonut-cheese-cakelicious.jpg'),
	(19, 6, 'Chocolate Rainbow', '', 3.00, 5.00, 3, 'thedonut-chocolate-rainbow.jpg'),
	(20, 2, 'Coco Loco', '', 3.00, 5.00, 3, 'thedonut-coco-loco.jpg'),
	(21, 2, 'Copa Banana', '', 3.00, 5.00, 2, 'thedonut-copa-banana.jpg'),
	(22, 3, 'Crunchy Crunchy', '', 3.00, 5.00, 2, 'thedonut-crunchy-crunchy.jpg'),
	(23, 2, 'Don Mochino', '', 3.00, 5.00, 3, 'thedonut-don-mochino.jpg'),
	(24, 1, 'Glazy', '', 1.00, 1.50, 2, 'thedonut-glazy.jpg'),
	(25, 6, 'Forest Glam', '', 3.00, 5.00, 4, 'thedonut-forest-glam.jpg'),
	(26, 2, 'Heaven Berry', '', 3.00, 5.00, 3, 'thedonut-heaven-berry.jpg'),
	(27, 3, 'Jacky Chunk', '', 3.00, 5.00, 5, 'thedonut-jacky-chunk.jpg'),
	(28, 2, 'Matcho Matcho', '', 3.00, 5.00, 3, 'thedonut-matcho-matcho.jpg'),
	(29, 6, 'Meisissippi', '', 3.00, 5.00, 4, 'thedonut-meisissippi.jpg'),
	(30, 2, 'Mr Mokacha', '', 3.00, 5.00, 3, 'thedonut-mr-mokacha.jpg'),
	(31, 1, 'Sugared Strawberry', 'A delectable delight that tantalizes the taste buds with its irresistible combination of flavors. This delectable donut features a fluffy, golden pastry base, expertly fried to perfection. Each bite reveals a burst of sweetness from the luscious strawberry glaze, made from ripe, succulent strawberries handpicked at the peak of freshness and delicately infused with just the right amount of sugar to create a heavenly coating that glistens with temptation. Topping off this indulgent treat are delicate sprinkles of crystallized sugar, adding a delightful crunch and an extra layer of sweetness to every bite. With its perfect balance of fruity freshness and sugary satisfaction, Sugared Strawberry is sure to become a beloved favorite for donut enthusiasts everywhere.', 4.00, 5.00, 3, 'thedonut-sugared-strawberry.png'),
	(32, 6, 'Berry Spears', '', 4.00, 5.00, 4, 'thedonut-berry-spears.jpg'),
	(33, 6, 'Blue Berrymore', '', 3.00, 5.00, 4, 'thedonut-blue-berrymore.jpg'),
	(34, 6, 'Mr. Green Tea', '', 4.00, 5.00, 3, 'thedonut-mr-green-tea.jpg'),
	(35, 6, 'Oreology', '', 4.00, 5.00, 4, 'thedonut-oreology.jpg'),
	(36, 1, 'Sugar Ice', '', 3.00, 5.00, 4, 'thedonut-sugar-ice.jpg'),
	(37, 6, 'Strawberry Rainbow', '', 3.00, 5.00, 4, 'thedonut-strawberry-rainbow.jpg'),
	(38, 3, 'Avocado Dicaprio', 'Text', 6.00, 5.00, 20, 'thedonut-avocado-dicaprio.png'),
	(43, 1, 'sprinkle', 'donut enak bertoping keju', 1000.00, 3000.00, 0, '');

-- Dumping structure for table db_chasierapp.tb_productcategory
DROP TABLE IF EXISTS `tb_productcategory`;
CREATE TABLE IF NOT EXISTS `tb_productcategory` (
  `productCategoryID` int NOT NULL AUTO_INCREMENT,
  `productCategoryName` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`productCategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_chasierapp.tb_productcategory: ~4 rows (approximately)
DELETE FROM `tb_productcategory`;
INSERT INTO `tb_productcategory` (`productCategoryID`, `productCategoryName`) VALUES
	(1, 'Plain'),
	(2, 'Topping Sauce'),
	(3, 'Topping Peanuts'),
	(6, 'Crumbs');

-- Dumping structure for table db_chasierapp.tb_productimages
DROP TABLE IF EXISTS `tb_productimages`;
CREATE TABLE IF NOT EXISTS `tb_productimages` (
  `productImagesID` int NOT NULL AUTO_INCREMENT,
  `productID` int DEFAULT NULL,
  `productImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`productImagesID`),
  KEY `FK_ProductImageProduct` (`productID`),
  CONSTRAINT `FK_ProductImageProduct` FOREIGN KEY (`productID`) REFERENCES `tb_product` (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_chasierapp.tb_productimages: ~2 rows (approximately)
DELETE FROM `tb_productimages`;
INSERT INTO `tb_productimages` (`productImagesID`, `productID`, `productImage`) VALUES
	(1, 2, 'thedonut-berry-spears.jpg'),
	(2, 2, 'thedonut-alpacone.png');

-- Dumping structure for table db_chasierapp.tb_sales
DROP TABLE IF EXISTS `tb_sales`;
CREATE TABLE IF NOT EXISTS `tb_sales` (
  `salesID` int NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `orderID` int NOT NULL,
  `productID` int NOT NULL,
  PRIMARY KEY (`salesID`),
  KEY `FK_SalesCustomer` (`userID`),
  KEY `FK_SalesOrder` (`orderID`),
  KEY `FK_SalesProduct` (`productID`),
  CONSTRAINT `FK_SalesCustomer` FOREIGN KEY (`userID`) REFERENCES `tb_user` (`userID`),
  CONSTRAINT `FK_SalesOrder` FOREIGN KEY (`orderID`) REFERENCES `tb_order` (`orderID`),
  CONSTRAINT `FK_SalesProduct` FOREIGN KEY (`productID`) REFERENCES `tb_product` (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_chasierapp.tb_sales: ~0 rows (approximately)
DELETE FROM `tb_sales`;

-- Dumping structure for table db_chasierapp.tb_store
DROP TABLE IF EXISTS `tb_store`;
CREATE TABLE IF NOT EXISTS `tb_store` (
  `storeID` int NOT NULL AUTO_INCREMENT,
  `storeName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `storeLogo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `storeDesc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`storeID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_chasierapp.tb_store: ~0 rows (approximately)
DELETE FROM `tb_store`;
INSERT INTO `tb_store` (`storeID`, `storeName`, `storeLogo`, `storeDesc`) VALUES
	(1, 'TheDonuts', 'thedonut-logo.svg', 'Delicious Donuts To Enjoy Your Day');

-- Dumping structure for table db_chasierapp.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userPassword` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userEmail` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userPhone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userStatus` enum('customer','admin','employee') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table db_chasierapp.tb_user: ~13 rows (approximately)
DELETE FROM `tb_user`;
INSERT INTO `tb_user` (`userID`, `userName`, `userPassword`, `userEmail`, `userPhone`, `userStatus`) VALUES
	(5, 'rachelliacs', 'Saci1977', 'rachellia.citra13@gmail.com', '081232170097', 'customer'),
	(6, 'admin1', 'admin1pass', 'admin1@gmail.com', '0812321700966', 'admin'),
	(12, 'learney.chell', '12345678', 'rachellia.citra13@gmail.com', '09876565433', 'employee'),
	(14, 'rare.chell', 'Saci1978', 'rachellia.citra13@gmail.com', '081232170096', 'customer'),
	(15, 'employee1', 'employee1', 'rachellia.citra13@gmail.com', '098762381134', 'employee'),
	(16, 'dhenira', 'Dhenira123', 'rachellia.citra13@gmail.com', '091232170096', 'customer'),
	(17, 'nadrda', '12345678', 'abidanadiragahnia@gmail.com', '347838247249', 'customer'),
	(18, 'rachelliacs123', '12345678', 'rachellia.citra13@gmail.com', '081232170096', 'customer'),
	(20, 'asd', '123456789', 'asd@gmail.com', '5', 'customer'),
	(21, '', '', '', '', 'customer'),
	(22, 'ALTHEAGRISHELDA', '123', 'ANAKRAJIN@GMAIL.COM', '0842795376538', 'customer'),
	(23, '', '', '', '', 'customer'),
	(24, 'admin2', 'admins2', 'admin@gmail.com', '23948943', 'customer');

-- Dumping structure for trigger db_chasierapp.after_order_insert
DROP TRIGGER IF EXISTS `after_order_insert`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `after_order_insert` AFTER INSERT ON `tb_order` FOR EACH ROW BEGIN
    DELETE FROM tb_cart WHERE cartID = NEW.cartID;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
