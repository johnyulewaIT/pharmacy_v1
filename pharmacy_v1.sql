-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2021 at 07:28 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admitted_patients`
--

CREATE TABLE `admitted_patients` (
  `id` int(10) NOT NULL,
  `ward_name` varchar(255) NOT NULL,
  `diagonisis` varchar(255) NOT NULL,
  `patient_no` varchar(255) NOT NULL,
  `patient_id` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `patient_number` varchar(200) NOT NULL,
  `patient_name` varchar(200) NOT NULL,
  `patient_condation` varchar(200) NOT NULL,
  `DOA` date NOT NULL DEFAULT current_timestamp(),
  `DOD` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admitted_patients`
--

INSERT INTO `admitted_patients` (`id`, `ward_name`, `diagonisis`, `patient_no`, `patient_id`, `status`, `patient_number`, `patient_name`, `patient_condation`, `DOA`, `DOD`) VALUES
(25, 'Ward D', '', 'Invoice No-  0230333', '52', '1', '1', 'Sample Patient 2', '', '2021-06-27', ''),
(26, 'Ward B', '', 'Invoice No-  33933232', '53', '1', '1', 'jane doe', '', '2021-06-27', '');

-- --------------------------------------------------------

--
-- Table structure for table `damaged`
--

CREATE TABLE `damaged` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `damaged`
--

INSERT INTO `damaged` (`id`, `name`, `price`, `amount`, `qty`) VALUES
(2, 'Piliton', '50', '100', '2'),
(3, 'Cetrizin', '25', '125', '5');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `patient_no` varchar(200) NOT NULL,
  `id` int(10) NOT NULL,
  `diagnosis_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`patient_no`, `id`, `diagnosis_name`, `description`) VALUES
('Invoice No-  55336060', 27, 'Malaria', 'test'),
('Invoice No-  3823030', 28, 'Malaria', 'test description'),
('Invoice No-  3823030', 29, 'Cold', 'description test'),
('Invoice No-  0230333', 30, 'Cold', 'hfdg'),
('Invoice No-  33933232', 31, 'Cold', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `diagonisis_list`
--

CREATE TABLE `diagonisis_list` (
  `id` int(10) NOT NULL,
  `diagonisis_name` varchar(255) NOT NULL,
  `symptoms` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagonisis_list`
--

INSERT INTO `diagonisis_list` (`id`, `diagonisis_name`, `symptoms`) VALUES
(1, 'Malaria', 'Fever'),
(2, 'Cold', 'fever'),
(3, 'Cold', 'Head-ache');

-- --------------------------------------------------------

--
-- Table structure for table `dicharge_process`
--

CREATE TABLE `dicharge_process` (
  `id` int(20) NOT NULL,
  `patient_no` varchar(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expired_medince`
--

CREATE TABLE `expired_medince` (
  `id` int(10) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `date_expired` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expired_medince`
--

INSERT INTO `expired_medince` (`id`, `medicine_name`, `date_expired`, `amount`, `qty`) VALUES
(1, 'cetcine ', '2021-12-01', '50', '5'),
(2, 'ciprofloxacin ', '2022-12-31', '300', '8'),
(3, 'amoxclav 375 ', '2022-12-01', '0', '1'),
(4, 'ORS ', '2022-12-01', '20', '6'),
(5, 'xpen ', '2022-11-01', '500', '5'),
(6, 'Paracetamol ', '2021-06-30', '0', '1'),
(7, 'Tridex || Expiry Date 2023-10-27 ', '2021-06-30', '60', '1'),
(8, 'Tridex || Expiry Date 2023-10-27 ', '2021-06-18', '300', '5'),
(9, 'Cetrizin ', '2023-10-19', '400', '10'),
(10, 'Panadol ', '2021-06-01', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `opening_date` varchar(255) NOT NULL,
  `closing_balance` varchar(255) NOT NULL,
  `opening_balance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(10) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `qty_item` varchar(255) NOT NULL,
  `price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_tests`
--

CREATE TABLE `laboratory_tests` (
  `id` int(10) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laboratory_tests`
--

INSERT INTO `laboratory_tests` (`id`, `test_name`, `price`) VALUES
(1, 'CT-SCAN', '1000'),
(2, 'New Sample Test name', '000'),
(3, 'Malaria', '250');

-- --------------------------------------------------------

--
-- Table structure for table `lab_results`
--

CREATE TABLE `lab_results` (
  `id` int(10) NOT NULL,
  `description` varchar(255) NOT NULL,
  `patient_no` varchar(255) NOT NULL,
  `test_name` varchar(200) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `id` int(10) NOT NULL,
  `description` longtext NOT NULL,
  `patient_no` varchar(255) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) NOT NULL,
  `patient_no` varchar(255) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `status` varchar(12) NOT NULL DEFAULT '0',
  `patient_condation` varchar(200) NOT NULL,
  `admission_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_no`, `patient_name`, `location`, `dob`, `status`, `patient_condation`, `admission_status`) VALUES
(55, 'Invoice No-  242222', 'John Doe', 'Kenya', '2021-06-02', '0', '', ''),
(56, 'Invoice No-  372057', 'Sample Patient 2', 'Kenya', '2021-06-23', '1', '', ''),
(57, 'Invoice No-  2802732', 'jane doe', 'Kenya', '2021-05-31', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_stock`
--

CREATE TABLE `pharmacy_stock` (
  `id` int(10) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `pharmacy_Qty` varchar(255) NOT NULL DEFAULT '0',
  `expiry_date` date NOT NULL DEFAULT current_timestamp(),
  `amount` varchar(255) NOT NULL,
  `stock_out` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL DEFAULT '0',
  `capacity` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sale_date` varchar(200) NOT NULL,
  `dosage_sold` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `price_dosage` varchar(255) NOT NULL DEFAULT '0',
  `app` varchar(255) NOT NULL,
  `half_dosage_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_stock`
--

INSERT INTO `pharmacy_stock` (`id`, `medicine_name`, `pharmacy_Qty`, `expiry_date`, `amount`, `stock_out`, `price`, `capacity`, `type`, `sale_date`, `dosage_sold`, `dosage`, `price_dosage`, `app`, `half_dosage_price`) VALUES
(1, 'Brufen', '0', '2023-06-15', '', '', '30', '10', 'tablet', '', '', '', '', '', 0),
(2, 'Piliton', '21', '2023-06-15', '', '', '50', '50mg', 'tablet', '', '', '', '', '', 0),
(3, 'Cetrizin', '2', '0000-00-00', '', '', '25', '50mg', 'tablet', '', '', '', '', '', 0),
(4, 'Jadell', '1', '2023-10-17', '', '', '500', '60mg', 'tablet', '', '', '', '', '', 0),
(5, 'Piliton', '57', '2023-10-18', '', '', '', '60ml', 'Tablet', '', 'Yes', '10', '100', '100', 50),
(6, 'Paracetamal', '0', '2027-02-27', '', '', '100', '50mg', 'Tablet', '', '', '', '', '', 0),
(7, 'ABZ', '0', '2023-06-20', '', '', '20', '60mg', 'Tablet', '', '', '', '', '', 0),
(9, 'Panadol', '0', '2021-06-01', '', '', '20', '60mg', 'Tablet', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_stock_items`
--

CREATE TABLE `pharmacy_stock_items` (
  `id` int(10) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `expiry_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacy_stock_items`
--

INSERT INTO `pharmacy_stock_items` (`id`, `item_name`, `capacity`, `price`, `expiry_date`) VALUES
(3, 'needles', '34', '500', '2021-05-25 13:21:17.445208'),
(4, 'Catheter', '', '', '2021-05-26 17:14:07.607543'),
(5, 'test', '', '', '2021-05-29 18:03:42.684105'),
(6, '', '', '', '2021-05-29 18:06:06.156792'),
(7, 'podi', '', '', '2021-05-29 18:28:48.730678');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `purchase_id` int(10) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `supplier` varchar(244) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `purchase_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`purchase_id`, `medicine_name`, `price`, `qty`, `supplier`, `status`, `purchase_no`) VALUES
(3, 'Panadol', '15', '2', 'supplier', '0', 'Purchase No-  53020');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(10) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `sales_date` date NOT NULL DEFAULT current_timestamp(),
  `customer` varchar(100) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `price` varchar(200) NOT NULL,
  `qty` varchar(200) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `payment_change` varchar(200) NOT NULL,
  `total` varchar(200) NOT NULL,
  `time` time(6) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice`, `sales_date`, `customer`, `medicine_name`, `price`, `qty`, `payment`, `payment_change`, `total`, `time`) VALUES
(72, 'Invoice No-  3823030', '2021-06-27', 'John Doe', 'Piliton ', '50', '2', '2500', '300', '2200', '16:45:13.000000'),
(73, 'Invoice No-  3823030', '2021-06-27', 'John Doe', 'Brufen ', '30', '2', '2500', '300', '2200', '17:12:47.000000'),
(74, 'Invoice No-  33933232', '2021-06-27', 'jane doe', 'Piliton ', '50', '2', '1500', '400', '1100', '18:12:14.000000'),
(75, 'Invoice No-  3823030', '2021-06-27', 'John Doe', 'Brufen ', '30', '2', '2500', '300', '2200', '18:31:26.000000'),
(76, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'ABZ ', '20', '1', '1500', '380', '1120', '21:08:22.000000'),
(77, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'ABZ ', '20', '1', '1500', '380', '1120', '21:23:47.000000'),
(78, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:23:47.000000'),
(79, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'ABZ ', '20', '1', '1500', '380', '1120', '21:54:37.000000'),
(80, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:37.000000'),
(81, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:37.000000'),
(82, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:37.000000'),
(83, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:37.000000'),
(84, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:37.000000'),
(85, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:37.000000'),
(86, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:37.000000'),
(87, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:37.000000'),
(88, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:38.000000'),
(89, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:38.000000'),
(90, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:38.000000'),
(91, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:38.000000'),
(92, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '21:54:38.000000'),
(93, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'ABZ ', '20', '1', '1500', '380', '1120', '22:04:10.000000'),
(94, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(95, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(96, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(97, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(98, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(99, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(100, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(101, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(102, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(103, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(104, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(105, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(106, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(107, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '380', '1120', '22:04:10.000000'),
(108, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '100', '1', '1500', '380', '1120', '22:04:11.000000'),
(109, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '100', '1', '1500', '380', '1120', '22:04:11.000000'),
(110, 'Invoice No-  0230333', '2021-06-29', 'Sample Patient 2', 'Piliton ', '100', '1', '1500', '380', '1120', '22:04:11.000000'),
(111, 'Invoice No-  3823030', '2021-06-29', 'John Doe', 'Piliton ', '50', '1', '2500', '300', '2200', '22:16:45.000000'),
(112, 'Invoice No-  3823030', '2021-06-29', 'John Doe', 'Piliton ', '50', '1', '2500', '300', '2200', '22:16:45.000000'),
(113, 'Invoice No-  3823030', '2021-06-29', 'John Doe', 'Piliton ', '100', '10', '2500', '300', '2200', '22:16:46.000000'),
(114, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '3', '1500', '85', '1415', '23:48:49.000000'),
(115, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'ABZ ', '20', '1', '1500', '85', '1415', '23:48:49.000000'),
(116, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '100', '1', '1500', '85', '1415', '23:48:49.000000'),
(117, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'ABZ ', '20', '1', '1500', '85', '1415', '23:48:49.000000'),
(118, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Cetrizin ', '25', '1', '1500', '85', '1415', '23:48:49.000000'),
(119, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '85', '1415', '23:48:49.000000'),
(120, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '85', '1415', '23:48:49.000000'),
(121, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '3', '1500', '85', '1415', '23:50:40.000000'),
(122, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'ABZ ', '20', '1', '1500', '85', '1415', '23:50:40.000000'),
(123, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '100', '1', '1500', '85', '1415', '23:50:40.000000'),
(124, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'ABZ ', '20', '1', '1500', '85', '1415', '23:50:40.000000'),
(125, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Cetrizin ', '25', '1', '1500', '85', '1415', '23:50:41.000000'),
(126, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '85', '1415', '23:50:41.000000'),
(127, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '85', '1415', '23:50:41.000000'),
(128, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '85', '1415', '23:50:41.000000'),
(129, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '3', '1500', '85', '1415', '23:52:20.000000'),
(130, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'ABZ ', '20', '1', '1500', '85', '1415', '23:52:20.000000'),
(131, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '100', '1', '1500', '85', '1415', '23:52:20.000000'),
(132, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'ABZ ', '20', '1', '1500', '85', '1415', '23:52:20.000000'),
(133, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Cetrizin ', '25', '1', '1500', '85', '1415', '23:52:20.000000'),
(134, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '85', '1415', '23:52:20.000000'),
(135, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '85', '1415', '23:52:20.000000'),
(136, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '85', '1415', '23:52:20.000000'),
(137, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '85', '1415', '23:52:20.000000'),
(138, 'Invoice No-  372057', '2021-06-29', 'Sample Patient 2', 'Piliton ', '50', '1', '1500', '85', '1415', '23:52:20.000000');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(10) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `admission_status` varchar(255) NOT NULL DEFAULT '0',
  `date` date DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL DEFAULT '0',
  `patient_no` varchar(200) NOT NULL,
  `medicine_name_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `medicine_name`, `qty`, `amount`, `price`, `customer`, `admission_status`, `date`, `status`, `patient_no`, `medicine_name_id`) VALUES
(117, 'Invoice No-  3823030', 'Piliton ', '2', '100', '50', 'John Doe', '', '2021-06-27', '1', '51', '2'),
(118, 'Invoice No-  3823030', 'Brufen ', '2', '60', '30', 'John Doe', '', '2021-06-27', '1', '51', '1'),
(119, 'Invoice No-  0230333', 'ABZ ', '1', '20', '20', 'Sample Patient 2', '0', '2021-06-27', '1', '52', '7'),
(120, 'Invoice No-  33933232', 'Piliton ', '2', '100', '50', 'jane doe', '1', '2021-06-27', '1', '53', '2'),
(121, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(122, 'Invoice No-  3823030', 'Piliton ', '1', '50', '50', 'John Doe', '0', '2021-06-29', '1', '51', '2'),
(123, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(124, 'Invoice No-  3823030', 'Piliton ', '1', '50', '50', 'John Doe', '0', '2021-06-29', '1', '51', '2'),
(125, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(126, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(127, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(128, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(129, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(130, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(131, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(132, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(133, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(134, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(135, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(136, 'Invoice No-  0230333', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '2'),
(137, 'Invoice No-  0230333', 'Piliton ', '1', '100', '100', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '5'),
(138, 'Invoice No-  0230333', 'Piliton ', '1', '100', '100', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '5'),
(139, 'Invoice No-  0230333', 'Piliton ', '1', '100', '100', 'Sample Patient 2', '0', '2021-06-29', '1', '52', '5'),
(140, 'Invoice No-  0230333', 'ABZ ', '1', '20', '20', 'Sample Patient 2', '0', '2021-06-29', '0', '52', '7'),
(141, 'Invoice No-  3823030', 'Piliton ', '10', '1000', '100', 'John Doe', '0', '2021-06-29', '1', '51', '5'),
(142, 'Invoice No-  0230333', 'Piliton ', '2', '200', '100', 'Sample Patient 2', '0', '2021-06-29', '0', '52', '5'),
(143, 'Invoice No-  0230333', 'Piliton ', '2', '200', '100', 'Sample Patient 2', '0', '2021-06-29', '0', '52', '5'),
(144, 'Invoice No-  0230333', 'Piliton ', '1', '100', '100', 'Sample Patient 2', '0', '2021-06-29', '0', '52', '5'),
(145, '<br />\r\n<b>Notice</b>:  Undefined variable: patient_no in <b>C:xampphtdocsPharmacy_v1dashboardpos.php</b> on line <b>284</b><br />\r\n', 'Piliton ', '1', '50', '50', '', '0', '2021-06-29', '0', 'Invoice No-  0230333 ', '2'),
(146, 'Invoice No-  242222', 'Piliton ', '1', '100', '100', 'John Doe', '0', '2021-06-29', '0', '55', '5'),
(147, 'Invoice No-  242222', 'Piliton ', '1', '100', '100', 'John Doe', '0', '2021-06-29', '0', '55', '5'),
(148, 'Invoice No-  242222', 'Piliton ', '1', '100', '100', 'John Doe', '0', '2021-06-29', '0', '55', '5'),
(149, 'Invoice No-  242222', 'Brufen ', '1', '30', '30', 'John Doe', '0', '2021-06-29', '0', '55', '1'),
(150, 'Invoice No-  372057', 'Piliton ', '3', '150', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '56', '2'),
(151, 'Invoice No-  372057', 'ABZ ', '1', '20', '20', 'Sample Patient 2', '0', '2021-06-29', '1', '56 ', '7'),
(152, 'Invoice No-  372057', 'Piliton ', '1', '100', '100', 'Sample Patient 2', '0', '2021-06-29', '1', '56', '5'),
(153, 'Invoice No-  372057', 'ABZ ', '1', '20', '20', 'Sample Patient 2', '0', '2021-06-29', '1', '56 ', '7'),
(154, 'Invoice No-  372057', 'Cetrizin ', '1', '25', '25', 'Sample Patient 2', '0', '2021-06-29', '1', '56', '3'),
(155, 'Invoice No-  372057', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '56', '2'),
(156, 'Invoice No-  372057', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '56', '2'),
(157, 'Invoice No-  372057', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '56', '2'),
(158, 'Invoice No-  372057', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '56', '2'),
(159, 'Invoice No-  372057', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-29', '1', '56 ', '2'),
(160, 'Invoice No-  372057', 'Piliton ', '2', '100', '50', 'Sample Patient 2', '0', '2021-06-30', '1', '56', '2'),
(161, 'Invoice No-  372057', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-30', '1', '56', '2'),
(162, 'Invoice No-  372057', 'Piliton ', '2', '100', '50', 'Sample Patient 2', '0', '2021-06-30', '1', '56', '2'),
(163, 'Invoice No-  372057', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-30', '1', '56', '2'),
(164, 'Invoice No-  372057', 'Piliton ', '2', '100', '50', 'Sample Patient 2', '0', '2021-06-30', '1', '56', '2'),
(165, 'Invoice No-  372057', 'Piliton ', '2', '200', '100', 'Sample Patient 2', '0', '2021-06-30', '1', '56', '5'),
(166, 'Invoice No-  372057', 'Piliton ', '1', '50', '50', 'Sample Patient 2', '0', '2021-06-30', '1', '56', '2'),
(167, 'Invoice No-  242222', 'Piliton ', '1', '50', '50', 'John Doe', '0', '2021-06-30', '0', '55', '2'),
(168, 'Invoice No-  372057', 'Piliton ', '2', '100', '50', 'Sample Patient 2', '0', '2021-06-30', '1', '56', '2'),
(169, 'Invoice No-  372057', 'Piliton ', '1', '100', '100', 'Sample Patient 2', '0', '2021-06-30', '1', '56', '5');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(12) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `price`) VALUES
(1, 'Wood Checkup', '200'),
(2, 'Counseling', '100'),
(3, 'Jadel Insertion', '1000'),
(4, 'sample servise name', '500');

-- --------------------------------------------------------

--
-- Table structure for table `service_order`
--

CREATE TABLE `service_order` (
  `service_id` int(10) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `patient_no` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_order`
--

INSERT INTO `service_order` (`service_id`, `service_name`, `description`, `patient_no`, `price`, `status`) VALUES
(36, 'Counseling', 'counseling', 'Invoice No-  3823030', '100', '0'),
(37, 'sample servise name', 'sample description', 'Invoice No-  3823030', '1000', '0'),
(38, 'Wood Checkup', 'fdgg', 'Invoice No-  0230333', '100', '0'),
(39, 'Jadel Insertion', 'insertion', 'Invoice No-  33933232', '1000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(10) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `date_received` date NOT NULL,
  `Qty` varchar(255) NOT NULL DEFAULT '0',
  `expiry_date` date NOT NULL DEFAULT current_timestamp(),
  `amount` varchar(255) NOT NULL,
  `stock_out` varchar(255) NOT NULL DEFAULT '0',
  `price` varchar(255) NOT NULL DEFAULT '0',
  `capacity` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `dosage_sold` varchar(255) NOT NULL,
  `dosage` varchar(255) NOT NULL,
  `price_dosage` varchar(255) NOT NULL DEFAULT '0',
  `app` varchar(255) NOT NULL,
  `half_dosage_price` int(11) NOT NULL,
  `confirm` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `medicine_name`, `date_received`, `Qty`, `expiry_date`, `amount`, `stock_out`, `price`, `capacity`, `type`, `dosage_sold`, `dosage`, `price_dosage`, `app`, `half_dosage_price`, `confirm`) VALUES
(1, 'Brufen', '0000-00-00', '32', '2023-06-15', '', '0', '25', '10', 'tablet', '', '', '', '', 0, '0'),
(2, 'Piliton', '0000-00-00', '13', '2023-06-15', '', '0', '25', '50mg', 'tablet', '', '', '', '', 0, '0'),
(3, 'Cetrizin', '0000-00-00', '87', '2023-10-19', '', '0', '40', '50mg', 'tablet', '', '', '', '', 0, '1'),
(4, 'Jadell', '0000-00-00', '47', '2023-10-17', '', '0', '500', '60mg', 'tablet', '', '', '', '', 0, '0'),
(5, 'Piliton', '0000-00-00', '100', '2023-10-18', '', '0', '', '60ml', 'Tablet', 'Yes', '10', '100', '100', 50, '0'),
(6, 'Paracetamal', '0000-00-00', '15', '2027-02-27', '', '0', '10', '50mg', 'Tablet', '', '', '0', '', 0, '0'),
(7, 'ABZ', '0000-00-00', '14', '2023-06-20', '', '0', '10', '60mg', 'Tablet', '', '', '', '', 0, '0'),
(9, 'Panadol', '0000-00-00', '6', '2021-06-01', '', '0', '15', '60mg', 'Tablet', '', '', '', '', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `store_items`
--

CREATE TABLE `store_items` (
  `id` int(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_items`
--

INSERT INTO `store_items` (`id`, `item_name`, `capacity`, `price`, `expiry_date`) VALUES
(3, 'needles', '20', '150', '2026-10-31'),
(4, 'Catheter', '23', '200', '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(3, 'Nurse', 'Nurse', 'Nurse'),
(4, 'Pharmacist', 'Pharmacist', 'Pharmacisit'),
(5, 'Registrar', 'Registrar', 'Registrar'),
(6, 'lab', 'lab', 'lab');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` int(10) NOT NULL,
  `ward_name` varchar(255) NOT NULL,
  `capacity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `ward_name`, `capacity`) VALUES
(2, 'Ward A', 50),
(3, 'Ward B', 60),
(4, 'Ward C', 50),
(5, 'Ward D', 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admitted_patients`
--
ALTER TABLE `admitted_patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `damaged`
--
ALTER TABLE `damaged`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagonisis_list`
--
ALTER TABLE `diagonisis_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dicharge_process`
--
ALTER TABLE `dicharge_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expired_medince`
--
ALTER TABLE `expired_medince`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratory_tests`
--
ALTER TABLE `laboratory_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_results`
--
ALTER TABLE `lab_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_stock`
--
ALTER TABLE `pharmacy_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_stock_items`
--
ALTER TABLE `pharmacy_stock_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_order`
--
ALTER TABLE `service_order`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_items`
--
ALTER TABLE `store_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admitted_patients`
--
ALTER TABLE `admitted_patients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `damaged`
--
ALTER TABLE `damaged`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `diagonisis_list`
--
ALTER TABLE `diagonisis_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dicharge_process`
--
ALTER TABLE `dicharge_process`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expired_medince`
--
ALTER TABLE `expired_medince`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laboratory_tests`
--
ALTER TABLE `laboratory_tests`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lab_results`
--
ALTER TABLE `lab_results`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `pharmacy_stock`
--
ALTER TABLE `pharmacy_stock`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pharmacy_stock_items`
--
ALTER TABLE `pharmacy_stock_items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `purchase_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_order`
--
ALTER TABLE `service_order`
  MODIFY `service_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `store_items`
--
ALTER TABLE `store_items`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
