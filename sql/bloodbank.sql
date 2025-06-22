-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

-- First, drop the entire database and recreate it
DROP DATABASE IF EXISTS `bloodbank`;
CREATE DATABASE `bloodbank` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bloodbank`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Disable foreign key checks temporarily
SET FOREIGN_KEY_CHECKS = 0;

--
-- Table structure for table `hospitals`
--
DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hname` varchar(100) NOT NULL,
  `hemail` varchar(100) NOT NULL,
  `hpassword` varchar(100) NOT NULL,
  `hphone` varchar(100) NOT NULL,
  `hcity` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hemail` (`hemail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `receivers`
--
DROP TABLE IF EXISTS `receivers`;
CREATE TABLE `receivers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rname` varchar(100) NOT NULL,
  `remail` varchar(100) NOT NULL,
  `rpassword` varchar(100) NOT NULL,
  `rphone` varchar(100) NOT NULL,
  `rbg` varchar(10) NOT NULL,
  `rcity` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `remail` (`remail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `bloodinfo`
--
DROP TABLE IF EXISTS `bloodinfo`;
CREATE TABLE `bloodinfo` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL,
  `bg` varchar(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`bid`),
  KEY `hid` (`hid`),
  CONSTRAINT `bloodinfo_ibfk_1` FOREIGN KEY (`hid`) 
    REFERENCES `hospitals` (`id`) 
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `blooddinfo`
--
DROP TABLE IF EXISTS `blooddinfo`;
CREATE TABLE `blooddinfo` (
  `bdid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `bg` varchar(10) NOT NULL,
  PRIMARY KEY (`bdid`),
  KEY `rid` (`rid`),
  CONSTRAINT `blooddinfo_ibfk_2` FOREIGN KEY (`rid`) 
    REFERENCES `receivers` (`id`) 
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `blooddonate`
--
DROP TABLE IF EXISTS `blooddonate`;
CREATE TABLE `blooddonate` (
  `donoid` int(11) NOT NULL AUTO_INCREMENT,
  `rid` int(11) NOT NULL,
  `bg` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`donoid`),
  KEY `rid` (`rid`),
  CONSTRAINT `blooddonate_ibfk_1` FOREIGN KEY (`rid`) 
    REFERENCES `receivers` (`id`) 
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `bloodrequest`
--
DROP TABLE IF EXISTS `bloodrequest`;
CREATE TABLE `bloodrequest` (
  `reqid` int(11) NOT NULL AUTO_INCREMENT,
  `hid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `bg` varchar(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`reqid`),
  KEY `hid` (`hid`),
  KEY `rid` (`rid`),
  CONSTRAINT `bloodrequest_ibfk_1` FOREIGN KEY (`hid`) 
    REFERENCES `hospitals` (`id`) 
    ON DELETE CASCADE,
  CONSTRAINT `bloodrequest_ibfk_2` FOREIGN KEY (`rid`) 
    REFERENCES `receivers` (`id`) 
    ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hospitals`
--
INSERT INTO `hospitals` (`id`, `hname`, `hemail`, `hpassword`, `hphone`, `hcity`) VALUES
(1, 'Gandhi hospital', 'gandhi@gmail.com', 'gandhi', '7865376358', 'Delhi'),
(4, 'Arunodhaya', 'arunodhaya@gmail.com', 'arunodhaya', '9898988909', 'Ballari'),
(5, 'Columbia Asia', 'columbia@gmail.com', 'asia47', '080616156262', 'Bengaluru'),
(6, 'Apollo Hospital', 'apollo@gmail.com', 'apollo247', '04428293333', 'Chennai'),
(7, 'Sree Amaravathi Multispeciality Hospital', 'sreeamaravathihospitals@gmail.com', 'amaravathi', '09441432567', 'Amaravathi');

--
-- Dumping data for table `receivers`
--
INSERT INTO `receivers` (`id`, `rname`, `remail`, `rpassword`, `rphone`, `rbg`, `rcity`) VALUES
(1, 'test', 'test@gmail.com', 'test', '8875643456', 'A+', 'lucknow'),
(4, 'Chandana', 'xyz@gmail.com', 'xyz@47', '9902477355', 'B+', 'Ballari'),
(5, 'Rithish', 'abcd@gmail.com', 'rithish', '9380073433', 'B+', 'Tirupathi'),
(6, 'Akshay', 'klmn@gmail.com', 'akshay74', '8106298053', 'B+', 'Hyderabad'),
(7, 'Nandhini', 'nandhu@gmail.com', 'nandhu989', '9849492206', 'AB-', 'Bengaluru');

--
-- Dumping data for table `blooddinfo`
--
INSERT INTO `blooddinfo` (`bdid`, `rid`, `bg`) VALUES
(10, 1, 'A+'),
(11, 1, 'B-'),
(12, 4, 'B+'),
(13, 4, 'O+'),
(14, 5, 'B+'),
(15, 5, 'B-'),
(16, 5, 'O+'),
(17, 6, 'B+'),
(18, 6, 'AB+'),
(19, 6, 'A-'),
(20, 7, 'AB-'),
(21, 7, 'A-'),
(22, 7, 'O-'),
(23, 1, 'A-');

--
-- Dumping data for table `bloodinfo`
--
INSERT INTO `bloodinfo` (`bid`, `hid`, `bg`) VALUES
(7, 1, 'A-'),
(8, 1, 'O+'),
(12, 4, 'A-'),
(13, 4, 'A+'),
(14, 4, 'AB+'),
(16, 5, 'A+'),
(17, 5, 'B-'),
(18, 5, 'O-'),
(20, 5, 'B+'),
(21, 6, 'O+'),
(22, 6, 'A-'),
(23, 6, 'O-'),
(24, 7, 'A-'),
(25, 7, 'A+'),
(26, 7, 'B-'),
(27, 7, 'B+'),
(31, 1, 'B-');

-- Re-enable foreign key checks
SET FOREIGN_KEY_CHECKS = 1;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
