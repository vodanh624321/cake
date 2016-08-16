-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for cake
CREATE DATABASE IF NOT EXISTS `cake` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cake`;


-- Dumping structure for table cake.cake
CREATE TABLE IF NOT EXISTS `cake` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `main_image` text NOT NULL,
  `list_image` text,
  `description` text,
  `display_flg` tinyint(4) NOT NULL DEFAULT '0',
  `buy_start_date` datetime DEFAULT NULL,
  `buy_end_date` datetime DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bánh';

-- Dumping data for table cake.cake: ~0 rows (approximately)
DELETE FROM `cake`;
/*!40000 ALTER TABLE `cake` DISABLE KEYS */;
/*!40000 ALTER TABLE `cake` ENABLE KEYS */;


-- Dumping structure for table cake.cake_category
CREATE TABLE IF NOT EXISTS `cake_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cake_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='loại - bánh';

-- Dumping data for table cake.cake_category: ~0 rows (approximately)
DELETE FROM `cake_category`;
/*!40000 ALTER TABLE `cake_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `cake_category` ENABLE KEYS */;


-- Dumping structure for table cake.cake_class
CREATE TABLE IF NOT EXISTS `cake_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cake_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `unlimited` tinyint(4) DEFAULT '0',
  `stock` int(11) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='giá bánh';

-- Dumping data for table cake.cake_class: ~0 rows (approximately)
DELETE FROM `cake_class`;
/*!40000 ALTER TABLE `cake_class` DISABLE KEYS */;
/*!40000 ALTER TABLE `cake_class` ENABLE KEYS */;


-- Dumping structure for table cake.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Loại bánh';

-- Dumping data for table cake.category: ~0 rows (approximately)
DELETE FROM `category`;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Dumping structure for table cake.class
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='kích cỡ bánh';

-- Dumping data for table cake.class: ~0 rows (approximately)
DELETE FROM `class`;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
