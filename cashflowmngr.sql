-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
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


-- Dumping database structure for cashflowmanager
DROP DATABASE IF EXISTS `cashflowmanager`;
CREATE DATABASE IF NOT EXISTS `cashflowmanager` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `cashflowmanager`;

-- Dumping structure for table cashflowmanager.cashflow
DROP TABLE IF EXISTS `cashflow`;
CREATE TABLE IF NOT EXISTS `cashflow` (
  `cashflow_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `tipe` enum('in','out') NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `nominal` bigint(20) NOT NULL DEFAULT 0,
  `keterangan` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `approved_date` datetime DEFAULT NULL,
  `is_approved` tinyint(4) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_date` datetime DEFAULT NULL,
  `last_updated_date` datetime NOT NULL,
  PRIMARY KEY (`cashflow_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cashflowmanager.cashflow: ~1 rows (approximately)
DELETE FROM `cashflow`;
INSERT INTO `cashflow` (`cashflow_id`, `category_id`, `tipe`, `category_name`, `nominal`, `keterangan`, `created_date`, `approved_date`, `is_approved`, `is_deleted`, `deleted_date`, `last_updated_date`) VALUES
	(1, 1, 'in', 'Gaji', 100000, 'test', '2022-10-10 15:14:00', '2022-10-10 16:48:01', 1, 0, NULL, '2022-10-10 16:49:55'),
	(2, 4, 'out', 'Makan', 25000, 'ayam goreng', '2022-10-10 17:02:10', NULL, 0, 0, NULL, '2022-10-10 17:02:10'),
	(3, 5, 'out', 'Parkir', 5000, 'Loop Graha Family', '2022-10-10 17:02:26', '2022-10-10 17:02:55', 1, 0, NULL, '2022-10-10 17:02:55'),
	(4, 2, 'in', 'Transfer Masuk', 250000, 'Dapat arisan', '2022-10-10 17:02:47', NULL, 0, 0, NULL, '2022-10-10 17:02:47');

-- Dumping structure for table cashflowmanager.category
DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `tipe` enum('in','out') NOT NULL,
  `created_date` datetime NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `deleted_date` datetime DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table cashflowmanager.category: ~8 rows (approximately)
DELETE FROM `category`;
INSERT INTO `category` (`category_id`, `nama`, `tipe`, `created_date`, `is_deleted`, `deleted_date`) VALUES
	(1, 'Gaji', 'in', '2022-10-10 14:28:41', 0, NULL),
	(2, 'Transfer Masuk', 'in', '2022-10-10 14:28:48', 0, NULL),
	(3, 'Bunga', 'in', '2022-10-10 14:29:07', 0, NULL),
	(4, 'Makan', 'out', '2022-10-10 14:29:18', 0, NULL),
	(5, 'Parkir', 'out', '2022-10-10 14:29:24', 0, NULL),
	(6, 'Tagihan', 'out', '2022-10-10 14:29:31', 0, NULL),
	(7, 'Bahan Bakar Kendaraan', 'out', '2022-10-10 14:30:14', 0, NULL),
	(8, 'Pembelian', 'out', '2022-10-10 14:30:31', 0, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
