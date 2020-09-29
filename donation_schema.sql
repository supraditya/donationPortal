-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 29, 2020 at 08:21 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `blooddonate_trans`
--

DROP TABLE IF EXISTS `blooddonate_trans`;
CREATE TABLE IF NOT EXISTS `blooddonate_trans` (
  `DonateID` int(10) NOT NULL AUTO_INCREMENT,
  `Donor_id` int(10) DEFAULT NULL,
  `Donate_Date` date NOT NULL,
  `Amt_Paid` int(10) DEFAULT '0',
  PRIMARY KEY (`DonateID`),
  KEY `FK_Donor_id` (`Donor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

DROP TABLE IF EXISTS `donor`;
CREATE TABLE IF NOT EXISTS `donor` (
  `Donor_id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Phone_Number` varchar(10) DEFAULT NULL,
  `Blood_Type` varchar(2) NOT NULL,
  `Rh` varchar(8) NOT NULL,
  `Address` varchar(100) NOT NULL,
  PRIMARY KEY (`Donor_id`)
) ;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`Donor_id`, `Name`, `City`, `Phone_Number`, `Blood_Type`, `Rh`, `Address`) VALUES
(8, 'Aditya Menon', 'Tambaram', '2929292932', 'AB', 'POSITIVE', 'Address 1'),
(9, 'Pranjal Kalbag', 'Chennai', '1234567890', 'B', 'NEGATIVE', 'Hiranandani Estate'),
(10, 'Prasanna Menon', 'Chennai', '9820453333', 'B', 'POSITIVE', 'Happy Valley'),
(21, 'Sunil Menon', 'Avadi', '7894561230', 'B', 'NEGATIVE', 'Also somewhere in Happy Valley'),
(22, 'Apoorva Sudeesh', 'Ambattur', '7894441112', 'O', 'POSITIVE', 'Manpada'),
(23, 'Aditya Sunil Menon', 'Velachery', '7894561234', 'B', 'NEGATIVE', 'Happy Valley'),
(26, 'Rajat Shah', 'Velachery', '1234567890', 'B', 'POSITIVE', 'Happy Valley, Manpada');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blooddonate_trans`
--
ALTER TABLE `blooddonate_trans`
  ADD CONSTRAINT `FK_Donor_id` FOREIGN KEY (`Donor_id`) REFERENCES `donor` (`Donor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
