-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2024 at 09:11 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rohit`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `parent_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `created_date`, `parent_id`) VALUES
(1, 'Rasik', '2024-06-07 12:23:11', NULL),
(2, 'Navdeep', '2024-06-07 12:23:11', NULL),
(3, 'Rohan', '2024-06-07 12:23:11', NULL),
(4, 'kunal', '2024-06-07 12:23:11', NULL),
(5, 'Ketan', '2024-06-07 12:23:11', 1),
(6, 'Ram', '2024-06-07 12:23:11', 1),
(7, 'Utkarsh', '2024-06-07 12:23:11', 2),
(8, 'Sambha', '2024-06-07 12:23:11', 3),
(9, 'Dinesh', '2024-06-07 12:23:11', 4),
(10, 'virat', '2024-06-07 12:23:11', 3),
(11, 'sanju', '2024-06-07 12:23:11', 4),
(12, 'Tilak', '2024-06-07 12:23:11', 5),
(13, 'suraya', '2024-06-07 12:23:11', 6),
(14, 'siraj', '2024-06-07 12:23:11', 3),
(15, 'yogesh', '2024-06-07 12:23:11', 2),
(16, 'nilesh', '2024-06-07 12:23:11', 8),
(17, 'varun', '2024-06-07 12:23:11', 7),
(18, 'pankaj', '2024-06-07 12:23:11', 8),
(19, 'jyoti', '2024-06-07 12:23:11', 5),
(20, 'Rohit', '2024-06-07 12:23:11', 6),
(21, 'raju', '2024-06-07 14:20:09', 4),
(22, 'ratnesh', '2024-06-07 14:23:34', 15);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
