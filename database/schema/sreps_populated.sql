/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50710
Source Host           : localhost:3306
Source Database       : sreps

Target Server Type    : MYSQL
Target Server Version : 50710
File Encoding         : 65001

Date: 2016-10-04 13:15:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medicare_num` bigint(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `medicare_num` (`medicare_num`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES ('1', 'Terry', 'Moreno', '23 asdasdasd', '356797667', 'dfsdoif@asdasd.com', '23425252262', '2016-10-04 12:55:12', '2016-10-04 12:55:12');
INSERT INTO `customers` VALUES ('2', 'Gabriel', 'Bennett', '24 dfytryrhhr', '349684619', 'asdoadsh@asdasdasd.com', '65498491901', '2016-10-04 12:55:39', '2016-10-04 12:55:39');
INSERT INTO `customers` VALUES ('3', 'Carole', 'Ortega', '833 dfsryrttrgfr', '344984984', 'dsfsdfj@doryjeroy.com', '64098049849', '2016-10-04 12:56:06', '2016-10-04 12:56:06');
INSERT INTO `customers` VALUES ('4', 'Annie', 'Mccarthy', '43 ghtewefwgw', '346646464', 'fdgsgo@asdasdas.com', '58741619409', '2016-10-04 12:56:27', '2016-10-04 12:56:27');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8_unicode_ci,
  `qty` int(11) DEFAULT NULL,
  `price` double(10,2) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_dir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'Swisse Ultiboost Calcium + Vitamin D contains premium quality ingredients to help support healthy bones and teeth.\r\nSwisse Ultiboost Calcium + Vitamin D contains a premium form of calcium (citrate) and naturally derived vitamin D3 for increased calcium absorption.\r\nThe human skeleton consists of 206 bones that provide a framework for the body to help maintain shape, protect vital organs and provide a place for muscles to attach. Bones also function as a site for mineral storage and blood cell formation.\r\nCalcium requirements increase with age, gender, post menopause, a diet low in calcium, pregnancy and lactation. Swisse Ultiboost Calcium + Vitamin D helps to address dietary calcium deficiency. Vitamin D is included to help the absorption of calcium, as a diet deficient in calcium may contribute to osteoporosis in later life.', '400', '11.99', 'original.jpg', '1', '2016-10-04 12:58:02', '2016-10-04 12:58:02', 'Swisse Ultiboost Calcium + Vitamin D 150 Tablets');
INSERT INTO `products` VALUES ('2', 'Goat Soap is made from fresh goats milk and contains natural milk proteins, amino acids and vitamins (A, C and E).\r\nIt\'s gentle creaminess naturally hydrates dry, itchy or sensitive skin - leaving it feeling soft, smooth and moisturised.\r\nMade in Australia with all Natural ingredients, Goat Soap is pH balanced and does not contain Petrochemicals, artificial Colours, Parebens, Sodium Lauryl Sulfate or Sodium Laureth Sulfate.\r\n\r\nGoat Soap may be suitable if you have the following:\r\n\r\nDry, itchy skin\r\nAcne Prone Skin\r\nSensitive Skin\r\nSkin conditions such as Dry and Sensitive Skin, Rashes that cause dry and irritated skin', '200', '2.99', 'goat_soap.jpg', '2', '2016-10-04 12:58:50', '2016-10-04 12:58:50', 'Goat Soap 100g');
INSERT INTO `products` VALUES ('3', 'No description', '100', '12.39', 'manuka_honey.jpg', '3', '2016-10-04 12:59:40', '2016-10-04 12:59:40', 'Swisse Manuka Honey Detoxifying Facial Mask 70g');
INSERT INTO `products` VALUES ('4', 'Eternity Cologne by Calvin Klein, Launched by the design house of Calvin Klein in 1989, eternity is classified as a refreshing, spicy, lavender, amber fragrance. This masculine scent possesses a blend of greens, crisp jasmine, sage, basil, and rosewood. \r\n\r\nIt is recommended for daytime wear.', '25', '34.99', 'ck_eternity.jpg', '4', '2016-10-04 13:00:39', '2016-10-04 13:00:39', 'Calvin Klein Eternity for Men Eau de Toilette Spray 100mL');
INSERT INTO `products` VALUES ('5', 'No description', '15', '199.99', 'tom_ford.jpg', '5', '2016-10-04 13:01:20', '2016-10-04 13:01:20', 'Tom Ford Black Orchid Eau De Parfum 100ml');

-- ----------------------------
-- Table structure for purchase_orders
-- ----------------------------
DROP TABLE IF EXISTS `purchase_orders`;
CREATE TABLE `purchase_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` double(10,2) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`),
  KEY `customers_id` (`customer_id`),
  CONSTRAINT `purchase_orders_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`),
  CONSTRAINT `purchase_orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of purchase_orders
-- ----------------------------

-- ----------------------------
-- Table structure for purchase_order_line_item
-- ----------------------------
DROP TABLE IF EXISTS `purchase_order_line_item`;
CREATE TABLE `purchase_order_line_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_order_id` (`purchase_order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `purchase_order_line_item_ibfk_1` FOREIGN KEY (`purchase_order_id`) REFERENCES `purchase_orders` (`id`),
  CONSTRAINT `purchase_order_line_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of purchase_order_line_item
-- ----------------------------

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(10) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `store_location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(72) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', 'Hamish', 'Dean', 'Somewhere', '420608139', 'hamish.dean@live.com.au', 'CBD', 'hamish', '$2a$10$E.gz.sMI1LkjUvN1v72iCeHP0pGOBC/ainYgFXMuqE.zuBTNuYA8m', '2016-09-04 19:40:56', '2016-09-04 19:40:56');
