-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2024 at 07:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(30) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `country` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_code`, `street`, `city`, `state`, `zip_code`, `country`, `contact`, `date_created`) VALUES
(19, '8fMqILQzgZdx9t1', 'Evergreen Manor', 'Moscow', 'Tatarstan', '109012', 'Russia', '+78 1256875498', '2023-12-30 20:29:48'),
(20, 'mBs2IFCv6L5dJlQ', 'Tower-A3, Riverfront Estates', 'New York City', 'New York', '10004', 'United States', '+1 1245984587', '2023-12-30 20:30:42'),
(21, '3lJMwHvVaGP2upy', 'Block-C1, Lakeview Apartment', 'Seoul', 'Gyeonggi-do', '03045', 'South Korea', '+21 5486124573', '2023-12-30 20:31:33'),
(22, 'NTrLe7Yc3mXR65P', 'Suite-D4, Sunset View Towers', 'Lahore', 'Punjab', '74600', 'Pakistan', '+92 124653012', '2023-12-30 20:32:15'),
(23, 'UshxNi3cFuSEzYa', 'Block-F2, Hilltop Suites', 'Westminster', 'London', 'SW1A 0AA', 'United Kingdom\r\n', '+41 12457982103', '2023-12-30 20:33:03'),
(24, '2OrgyjG5fR0Jl6x', 'Tower-E3, Valley Vista Residences', 'Beijing', 'Hubei', '978-544', 'China', '+78 7871230245', '2023-12-30 20:33:35'),
(25, 'JyWmDj91gBCnprz', 'Block-G1, Meadowbrook Mansions', 'Zermatt', 'Valais', '3920', 'Switzerland', '+6 1203157945', '2023-12-30 20:34:07'),
(26, 'tkfuZBKzb0NlOxE', 'Tower-H4, Forestview Towers', 'Fujinomiya', 'Shizuoka', '418-0000', 'Japan', '+58 13094576132', '2023-12-30 20:35:09'),
(27, '2kVB1foctJQFgNL', 'Villa-I2, Brookside Villas', 'Kuala Lumpu', 'Selangor', '50088', 'Malaysia', '+32 1357954034', '2023-12-30 20:35:45'),
(28, 'SYoAecjGmPLQki7', 'Block-J3, Pinecrest Lofts', 'Berlin', 'Bavaria', '10117', 'Germany', '+98 1324646582', '2023-12-30 20:36:23'),
(29, '2jcVk8qpmtXZg5T', 'Building-L4, Woodland Residence', 'Jurong East', 'Downtown Core', '018956', 'Singapore', '+8 7813462356', '2023-12-30 20:37:00'),
(30, 'OL5SqENQ4ahGnFl', 'Suite-P4, Highland Chalets', 'Sydney', 'New South Wales state', '45-87720', 'Australia', '+45 21879653', '2023-12-30 20:38:29'),
(31, 'DAtpJ6Ui3jxzbQl', 'Block-R3, Pinehill Studios', 'Rio de Jenerio', 'Rio de Jenerio State', 'SA-3487-WW', 'Brazil', '+7 7813012467', '2023-12-30 20:39:24'),
(32, 'RQfzs2GtqBov7yX', 'Tower-V1, Meadowview Lodge', 'Madrid', 'Community of Madrid', '7889100-0', 'Spain', '+4 21012068941', '2023-12-30 20:40:22'),
(33, 'LXDgFnbwOZjpfeq', 'Villa-Y1, Mountain Ridge Duplexes', 'Cairo', 'Cairo Governorate Cairo', '8900001', 'Egypt', '+33 1245786589', '2023-12-30 20:41:20'),
(35, 'PmkcxrCF0HJb9pK', 'Block-CC33, Maplewood Apartments', 'Istanbul', 'Istanbul Metropolitan', '00102112', 'Turkey', '+08 4512975631', '2023-12-30 20:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` int(30) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_address` text NOT NULL,
  `sender_contact` text NOT NULL,
  `recipient_name` text NOT NULL,
  `recipient_address` text NOT NULL,
  `recipient_contact` text NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 = Deliver, 2=Pickup',
  `from_branch_id` varchar(30) NOT NULL,
  `to_branch_id` varchar(30) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `reference_number`, `sender_name`, `sender_address`, `sender_contact`, `recipient_name`, `recipient_address`, `recipient_contact`, `type`, `from_branch_id`, `to_branch_id`, `weight`, `height`, `width`, `length`, `price`, `status`, `date_created`) VALUES
(25, '917169612026', 'Emily Bennett', 'House No. 1256, Villa-C2, Evergreen Manor, 09-P301, Maple Heights, 15-8800', '+79 4512489315', 'Jacob Martinez', 'Building No. 897, Block-F2, Hilltop Suites, 14-P101, Cedarwood Way, 17-9900', '+79 4512678412', 1, '20', '', '50 Kg', '50 In', '45 In', '45 In', 4999, 8, '2023-12-30 22:49:16'),
(26, '582919547893', 'Gabriel Morgan', 'Penthouse No. 590, Suite-M2, Mountainview Heights, 21-P301, Willowbrook Lane, 26-3300', '+45 4545120187', 'Victoria Reyes', 'Studio No. 360, Block-R3, Pinehill Studios, 26-P204, Elmwood Drive, 31-1122', '+12 1779630501', 2, '24', '30', '100 Kg', '50 In', '45 In', '45 In', 7899, 8, '2023-12-30 22:51:47'),
(27, '680538811730', 'Natalie Clark', 'Unit No. 712, Block-C1, Lakeview Apartments, 10-P205, Oakwood Lane, 12-7600', '+12 8541203658', 'Madelyn Scott', 'Loft No. 396, Block-J3, Pinecrest Lofts, 18-P101, Oakwood Drive, 23-8800', '+98 1214578963', 1, '20', '', '5 Kg', '5 In', '10 In', '10 In', 1000, 1, '2024-01-03 08:30:52'),
(28, '251551199233', 'Christopher Adams', 'Home No. 810, Building-L4, Woodland Residence, 20-P102, Elmwood Avenue, 25-7600', '+78 4120236978', 'Gabriel Morgan', 'Bungalow No. 180, Villa-Q2, Valley Ridge Bungalows, 25-P101, Cedarwood Circle, 30-7700', '+87 5441023654', 2, '22', '26', '12 Kg', '34 In', '20 In', '30 In', 5000, 9, '2024-01-03 08:34:18'),
(29, '904990631759', 'Aria Price', 'Villa No. 1234, Tower-A5, Pinecrest Villas, 10-P101, Cedarwood Lane, 12-3456', '+84 4513469762', 'Riley Cook', 'Cottage No. 920, Block-B2, Hillside Cottages, 36-P102, Oakwood Avenue, 41-8877', '+89 8752135489', 2, '25', '23', '30 Kg', '45 In', '24 In', '12 In', 12000, 1, '2024-01-03 08:35:47'),
(30, '508720774884', 'Lily Chang', 'Condo No. 328, Tower-E3, Valley Vista Residences, 13-P204, Elmwood Court, 19-5500', '+13 1210215485', 'Scarlett Foster', 'House No. 770, Villa-D4, Oakside Villas, 38-P301, Elmwood Drive, 43-1122', '+89 8745120035', 2, '20', '24', '5 Kg', '34 In', '10 In', '10 In', 1000, 8, '2024-01-03 08:36:40'),
(31, '557862418044', 'Dylan Powell', 'House No. 1256, Villa-C2, Evergreen Manor, 09-P301, Maple Heights, 15-8800', '+78 4120236978', 'Carter Hall', 'Townhouse No. 9900, Villa-H12, Oakwood Townhomes, 17-P808, Elmwood Lane, 89-0123', '+12 1779630501', 1, '27', '', '5 Kg', '34 In', '24 In', '45 In', 9000, 8, '2024-01-03 08:37:14'),
(32, '208927194514', 'Michael Hernandez', 'Villa No. 1234, Tower-A5, Pinecrest Villas, 10-P101, Cedarwood Lane, 12-3456', '+30 1200125896', 'Logan Cooper', 'Cabin No. 5566, Block-P20, Birchwood Cabins, 25-P1616, Maple Lane, 67-8901', '+55 1021302145', 1, '28', '', '12 Kg', '5 In', '24 In', '45 In', 7899, 1, '2024-01-03 08:38:09'),
(33, '336239687834', 'Ethan Sullivan', 'House No. 3344, Suite-Y29, Elmwood Homes, 34-P2525, Maplewood Avenue, 56-7890', '+45 4545120187', 'Sophia Rodriguez', 'Lodge No. 7788, Villa-Q21, Willow Lodge, 26-P1717, Pineview Drive, 78-9012', '+98 1214578963', 2, '28', '25', '8 Kg', '34 In', '20 In', '45 In', 5000, 8, '2024-01-03 08:39:15'),
(34, '240656562621', 'Joshua Mitchell', 'Home No. 810, Building-L4, Woodland Residence, 20-P102, Elmwood Avenue, 25-7600', '+84 4513469762', 'Zoe Carter', 'Villa No. 730, Tower-N3, Lakeshore Villas, 22-P105, Maplewood Avenue, 27-9900', '+12 1779630501', 1, '24', '', '5 Kg', '50 In', '20 In', '10 In', 6500, 1, '2024-01-03 08:39:56'),
(35, '672387691937', 'Emily Bennett', 'House No. 1256, Villa-C2, Evergreen Manor, 09-P301, Maple Heights, 15-8800', '+45 4545120187', 'Jacob Martinez', 'Cottage No. 920, Block-B2, Hillside Cottages, 36-P102, Oakwood Avenue, 41-8877', '+79 4512678412', 2, '28', '24', '50 Kg', '5 In', '3 In', '45 In', 7899, 7, '2024-01-03 08:40:23'),
(36, '412760767006', 'Gabriel Morgan', 'House No. 1256, Villa-C2, Evergreen Manor, 09-P301, Maple Heights, 15-8800', '+84 4513469762', 'Madelyn Scott', 'Studio No. 360, Block-R3, Pinehill Studios, 26-P204, Elmwood Drive, 31-1122', '+98 1214578963', 1, '29', '', '12 Kg', '50 In', '3 In', '10 In', 1000, 9, '2024-01-03 08:40:50'),
(37, '717238976187', 'Aria Price', 'Home No. 810, Building-L4, Woodland Residence, 20-P102, Elmwood Avenue, 25-7600', '+84 4513469762', 'Jacob Martinez', 'Building No. 897, Block-F2, Hilltop Suites, 14-P101, Cedarwood Way, 17-9900', '+12 1779630501', 1, '28', '', '5 Kg', '34 In', '3 In', '45 In', 5000, 7, '2024-01-03 08:41:19'),
(38, '531347946851', 'Logan Cooper', 'House No. 770, Villa-D4, Oakside Villas, 38-P301, Elmwood Drive, 43-1122', '+98 8754210125', 'Madelyn Scott', 'Unit No. 712, Block-C1, Lakeview Apartments, 10-P205, Oakwood Lane, 12-7600', '+41 4121215793', 1, '20', '', '5 Kg', '34 In', '10 In', '10 In', 4999, 7, '2024-01-03 08:42:12'),
(39, '711041818497', 'Emily Bennett', 'House No. 1256, Villa-C2, Evergreen Manor, 09-P301, Maple Heights, 15-8800', '+45 4545120187', 'Jacob Martinez', 'Bungalow No. 180, Villa-Q2, Valley Ridge Bungalows, 25-P101, Cedarwood Circle, 30-7700', '+98 1214578963', 2, '21', '24', '5 Kg', '5 In', '20 In', '10 In', 7899, 3, '2024-01-03 08:42:37'),
(40, '343441744198', 'Jayden Stewart', 'Chalet No. 900, Suite-P4, Highland Chalets, 24-P302, Oakview Court, 29-2200', '+84 4513469762', 'Dylan Powell', 'Lodge No. 710, Tower-V1, Meadowview Lodge, 30-P104, Oakridge Lane, 35-3300', '+12 1779630501', 1, '29', '', '12 Kg', '50 In', '10 In', '30 In', 7899, 7, '2024-01-03 08:43:22'),
(41, '416099930830', 'Natalie Clark', 'Villa No. 1234, Tower-A5, Pinecrest Villas, 10-P101, Cedarwood Lane, 12-3456', '+45 4545120187', 'Victoria Reyes', 'Studio No. 360, Block-R3, Pinehill Studios, 26-P204, Elmwood Drive, 31-1122', '+98 1214578963', 2, '22', '25', '12 Kg', '34 In', '3 In', '45 In', 5000, 7, '2024-01-03 08:43:47'),
(42, '698662857764', 'Zoe Carter', 'Cottage No. 920, Block-B2, Hillside Cottages, 36-P102, Oakwood Avenue, 41-8877', '+98 5421202369', 'Sophia Bennett', 'Villa No. 1234, Tower-A5, Pinecrest Villas, 10-P101, Cedarwood Lane, 12-3456', '+87 8765412024', 2, '27', '25', '5 Kg', '5 In', '24 In', '10 In', 1000, 9, '2024-01-03 08:44:35'),
(43, '311470886747', 'Christopher Adams', 'Penthouse No. 590, Suite-M2, Mountainview Heights, 21-P301, Willowbrook Lane, 26-3300', '+45 4545120187', 'Victoria Reyes', 'Cottage No. 920, Block-B2, Hillside Cottages, 36-P102, Oakwood Avenue, 41-8877', '+12 1779630501', 1, '28', '', '5 Kg', '34 In', '45 In', '45 In', 5000, 1, '2024-01-03 08:45:02'),
(44, '774745104691', 'Gabriel Morgan', 'House No. 1256, Villa-C2, Evergreen Manor, 09-P301, Maple Heights, 15-8800', '+78 4120236978', 'Victoria Reyes', 'Building No. 897, Block-F2, Hilltop Suites, 14-P101, Cedarwood Way, 17-9900', '+87 5441023654', 2, '20', '19', '5 Kg', '5 In', '24 In', '45 In', 4999, 7, '2024-01-03 08:45:24'),
(45, '243869739800', 'Aria Price', 'Home No. 810, Building-L4, Woodland Residence, 20-P102, Elmwood Avenue, 25-7600', '+45 4545120187', 'Madelyn Scott', 'Studio No. 360, Block-R3, Pinehill Studios, 26-P204, Elmwood Drive, 31-1122', '+12 1779630501', 1, '27', '', '100 Kg', '34 In', '20 In', '10 In', 5000, 1, '2024-01-03 08:52:04'),
(46, '678958560800', 'Aria Price', 'Villa No. 1234, Tower-A5, Pinecrest Villas, 10-P101, Cedarwood Lane, 12-3456', '+45 4545120187', 'Madelyn Scott', 'Cottage No. 920, Block-B2, Hillside Cottages, 36-P102, Oakwood Avenue, 41-8877', '+98 1214578963', 1, '25', '', '50 Kg', '50 In', '10 In', '45 In', 7899, 8, '2024-01-03 08:52:26'),
(47, '426189236409', 'Emily Bennett', 'House No. 1256, Villa-C2, Evergreen Manor, 09-P301, Maple Heights, 15-8800', '+84 4513469762', 'Jacob Martinez', 'Building No. 897, Block-F2, Hilltop Suites, 14-P101, Cedarwood Way, 17-9900', '+98 1214578963', 2, '28', '26', '5 Kg', '34 In', '20 In', '30 In', 7899, 8, '2024-01-03 08:52:51'),
(48, '738368157549', 'Gabriel Morgan', 'Penthouse No. 590, Suite-M2, Mountainview Heights, 21-P301, Willowbrook Lane, 26-3300', '+45 4545120187', 'Victoria Reyes', 'Studio No. 360, Block-R3, Pinehill Studios, 26-P204, Elmwood Drive, 31-1122', '+98 1214578963', 1, '26', '', '12 Kg', '34 In', '10 In', '12 In', 1000, 8, '2024-01-03 08:53:17'),
(49, '936200817158', 'Christopher Adams', 'House No. 1256, Villa-C2, Evergreen Manor, 09-P301, Maple Heights, 15-8800', '+45 4545120187', 'Victoria Reyes', 'Building No. 897, Block-F2, Hilltop Suites, 14-P101, Cedarwood Way, 17-9900', '+12 1779630501', 2, '28', '30', '100 Kg', '5 In', '20 In', '10 In', 1000, 7, '2024-01-03 08:53:59'),
(50, '590388525632', 'Natalie Clark', 'Villa No. 1234, Tower-A5, Pinecrest Villas, 10-P101, Cedarwood Lane, 12-3456', '+78 4120236978', 'Jacob Martinez', 'Studio No. 360, Block-R3, Pinehill Studios, 26-P204, Elmwood Drive, 31-1122', '+98 1214578963', 2, '26', '26', '50 Kg', '50 In', '10 In', '30 In', 5000, 9, '2024-01-03 08:54:48'),
(51, '378046115329', 'Natalie Clark', 'Villa No. 1234, Tower-A5, Pinecrest Villas, 10-P101, Cedarwood Lane, 12-3456', '+45 4545120187', 'Victoria Reyes', 'Studio No. 360, Block-R3, Pinehill Studios, 26-P204, Elmwood Drive, 31-1122', '+12 1779630501', 1, '29', '', '5 Kg', '50 In', '45 In', '45 In', 12000, 7, '2024-01-03 08:55:59'),
(52, '832004864984', 'Gabriel Morgan', 'Villa No. 1234, Tower-A5, Pinecrest Villas, 10-P101, Cedarwood Lane, 12-3456', '+84 4513469762', 'Jacob Martinez', 'Cottage No. 920, Block-B2, Hillside Cottages, 36-P102, Oakwood Avenue, 41-8877', '+98 1214578963', 2, '30', '28', '100 Kg', '50 In', '24 In', '30 In', 5000, 8, '2024-01-03 08:56:26'),
(53, '405227596902', 'Natalie Clark', 'Villa No. 1234, Tower-A5, Pinecrest Villas, 10-P101, Cedarwood Lane, 12-3456', '+45 4545120187', 'Jacob Martinez', 'Cottage No. 920, Block-B2, Hillside Cottages, 36-P102, Oakwood Avenue, 41-8877', '+98 1214578963', 2, '25', '29', '12 Kg', '34 In', '24 In', '10 In', 1000, 1, '2024-01-03 08:56:51'),
(54, '414780690191', 'Natalie Clark', 'Villa No. 1234, Tower-A5, Pinecrest Villas, 10-P101, Cedarwood Lane, 12-3456', '+45 4545120187', 'Victoria Reyes', 'Cottage No. 920, Block-B2, Hillside Cottages, 36-P102, Oakwood Avenue, 41-8877', '+98 1214578963', 1, '25', '', '50 Kg', '50 In', '20 In', '10 In', 5000, 7, '2024-01-03 08:57:15'),
(55, '882581951128', 'Aria Price', 'Home No. 810, Building-L4, Woodland Residence, 20-P102, Elmwood Avenue, 25-7600', '+45 4545120187', 'Riley Cook', 'Cottage No. 920, Block-B2, Hillside Cottages, 36-P102, Oakwood Avenue, 41-8877', '+98 1214578963', 1, '27', '', '100 Kg', '5 In', '24 In', '45 In', 7899, 7, '2024-01-03 08:58:00'),
(56, '465831580562', 'Aria Price', 'Villa No. 1234, Tower-A5, Pinecrest Villas, 10-P101, Cedarwood Lane, 12-3456', '+45 4545120187', 'Gabriel Morgan', 'Cottage No. 920, Block-B2, Hillside Cottages, 36-P102, Oakwood Avenue, 41-8877', '+98 1214578963', 2, '30', '29', '12 Kg', '5 In', '10 In', '10 In', 7899, 1, '2024-01-03 08:58:28'),
(57, '777500758736', 'Emily Bennett', 'Home No. 810, Building-L4, Woodland Residence, 20-P102, Elmwood Avenue, 25-7600', '+84 4513469762', 'Victoria Reyes', 'Studio No. 360, Block-R3, Pinehill Studios, 26-P204, Elmwood Drive, 31-1122', '+79 4512678412', 1, '30', '', '12 Kg', '50 In', '45 In', '30 In', 1000, 7, '2024-01-03 08:58:59'),
(58, '714570833120', 'Aria Price', 'Penthouse No. 590, Suite-M2, Mountainview Heights, 21-P301, Willowbrook Lane, 26-3300', '+45 4545120187', 'Madelyn Scott', 'Studio No. 360, Block-R3, Pinehill Studios, 26-P204, Elmwood Drive, 31-1122', '+98 1214578963', 1, '27', '', '100 Kg', '5 In', '24 In', '10 In', 5000, 8, '2024-01-03 08:59:28'),
(59, '563831036931', 'Natalie Clark', 'House No. 1256, Villa-C2, Evergreen Manor, 09-P301, Maple Heights, 15-8800', '+45 4545120187', 'Jacob Martinez', 'Studio No. 360, Block-R3, Pinehill Studios, 26-P204, Elmwood Drive, 31-1122', '+12 1779630501', 1, '31', '', '30 Kg', '50 In', '20 In', '30 In', 7899, 8, '2024-01-03 08:59:55'),
(60, '324089825695', 'Natalie Clark', 'House No. 1256, Villa-C2, Evergreen Manor, 09-P301, Maple Heights, 15-8800', '+45 4545120187', 'Riley Cook', 'Studio No. 360, Block-R3, Pinehill Studios, 26-P204, Elmwood Drive, 31-1122', '+98 1214578963', 1, '30', '', '100 Kg', '5 In', '3 In', '30 In', 12000, 1, '2024-01-03 09:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_tracks`
--

CREATE TABLE `parcel_tracks` (
  `id` int(30) NOT NULL,
  `parcel_id` int(30) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcel_tracks`
--

INSERT INTO `parcel_tracks` (`id`, `parcel_id`, `status`, `date_created`) VALUES
(39, 38, 7, '2024-01-03 08:46:35'),
(40, 40, 7, '2024-01-03 08:46:42'),
(41, 35, 7, '2024-01-03 08:46:50'),
(42, 36, 7, '2024-01-03 08:46:56'),
(43, 42, 8, '2024-01-03 08:47:51'),
(44, 44, 8, '2024-01-03 08:47:56'),
(45, 39, 3, '2024-01-03 08:48:01'),
(46, 37, 1, '2024-01-03 08:48:09'),
(47, 44, 1, '2024-01-03 08:48:21'),
(48, 44, 2, '2024-01-03 08:48:27'),
(49, 44, 8, '2024-01-03 08:48:35'),
(50, 60, 5, '2024-01-03 09:04:36'),
(51, 60, 7, '2024-01-03 09:04:41'),
(52, 60, 1, '2024-01-03 09:04:46'),
(53, 60, 0, '2024-01-03 09:04:51'),
(54, 60, 1, '2024-01-03 09:04:55'),
(55, 58, 5, '2024-01-03 09:05:02'),
(56, 58, 8, '2024-01-03 09:05:07'),
(57, 58, 6, '2024-01-03 09:05:13'),
(58, 58, 8, '2024-01-03 09:05:19'),
(59, 56, 4, '2024-01-03 09:05:27'),
(60, 56, 6, '2024-01-03 09:05:32'),
(61, 56, 1, '2024-01-03 09:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Courier Management System', 'info@sample.comm', '+6948 8542 623', '2102  Caldwell Road, Rochester, New York, 14608', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `img`, `name`, `message`, `occupation`) VALUES
(28, 'person_1-min.jpg', 'Mike Houston', 'Impressive logistics and exceptional service define Swift Ship. They exceeded our expectations, handling both complex shipments and delicate items with care and professionalism.', 'Operations Director'),
(29, 'person_2-min.jpg', 'James Smith', 'From start to finish, Swift Ship\'s service was seamless. Their attention to detail and commitment to customer satisfaction set a high standard in courier services.', 'Marketing Manager'),
(30, 'person_3-min.jpg', 'Cameron Webster', 'Reliable, efficient, and always on time – that\'s Swift Ship. Their consistent service has become integral to our operations, providing peace of mind with every shipment.', 'Retail Business Owner'),
(31, 'person_4-min.jpg', 'Emily Jacob', 'Swift Ship delivers excellence in every parcel. Their service goes beyond expectations, ensuring reliable and swift deliveries. Highly recommended for businesses of any size.', 'Small Business Owner');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff, 3 = user',
  `branch_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `branch_id`, `date_created`) VALUES
(1, 'Administrator', '', 'admin@gmail.com', '32250170a0dca92d53ec9624f336ca24', 1, 0, '2020-11-26 10:57:04'),
(15, 'Jacob', 'Martinez', 'jacob@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 19, '2023-12-30 20:53:45'),
(16, 'Liam', 'Thompson', 'liam@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 20, '2023-12-30 20:54:06'),
(17, 'Ethan', 'Sullivan', 'ethan@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 21, '2023-12-30 20:54:25'),
(18, 'Mason', 'Taylor', 'mason@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 22, '2023-12-30 20:54:45'),
(19, 'Noah', 'Walker', 'noah@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 23, '2023-12-30 20:55:10'),
(20, 'William', 'Wright', 'william@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 24, '2023-12-30 20:55:28'),
(21, 'James', 'Johnson', 'james@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 25, '2023-12-30 20:56:45'),
(22, 'Harper', 'Ali', 'harper@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 26, '2023-12-30 20:57:09'),
(23, 'Elijah', 'Khan', 'elijah@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 27, '2023-12-30 20:57:35'),
(24, 'Michael', 'Hernandez', 'michael@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 28, '2023-12-30 20:57:54'),
(25, 'Grace', 'Wilson', 'grace@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 28, '2023-12-30 20:58:15'),
(26, 'Daniel', 'Brown', 'daniel@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 29, '2023-12-30 20:58:41'),
(27, 'Samuel', 'Phillips', 'samuel@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 30, '2023-12-30 20:59:15'),
(28, 'Avery', 'Williams', 'avery@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 31, '2023-12-30 20:59:42'),
(29, 'Lucas', 'Rivera', 'lucas@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 32, '2023-12-30 21:00:25'),
(30, 'Christopher', 'Adams', 'christopher@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 33, '2023-12-30 21:00:52'),
(31, 'Penelope', 'Thomas', 'penelope@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 34, '2023-12-30 21:01:12'),
(32, 'Andrew', 'Kim', 'andrew@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 35, '2023-12-30 21:01:36'),
(46, 'Khurram', 'Iqbal', 'khurram@gmail.com', '32250170a0dca92d53ec9624f336ca24', 3, 0, '2024-01-03 09:11:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
