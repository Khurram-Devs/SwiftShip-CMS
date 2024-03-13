-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 10:18 PM
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
(7, '3DdnKyHYRAvrEiq', 'Gulberg Street', 'Lahore', 'Punjab', '74600', 'Pakistan', '+92 8542136751', '2023-12-17 22:13:09'),
(8, 'WZ3yRIQS4c2iOaf', 'Street 1-A', 'Fujinomiya', 'Shizuoka', '418-0000', 'Japan', '+19 1246271358', '2023-12-17 22:16:08'),
(9, 'EegspfAx45IL6B0', 'New Eve Apt.', 'Beijing', 'Hubei', '978-544', 'China', '+78 212458631', '2023-12-17 22:17:51'),
(10, 'XEkj94QfDG1siBF', 'Street No.41, Block-B1', 'Kuala Lumpur', 'Selangor', '50088', 'Malaysia', '+36 1578413816', '2023-12-17 22:18:54'),
(11, 'EK9PqGgnSYAlV6e', 'Street Shazami, 1-V', 'Berlin', 'Bavaria', '10117', 'Germany', '+65 2686154792', '2023-12-17 22:20:00'),
(12, 'E1NGjfk8W3wUm0O', '5-BV, 65 Road', 'Moscow', 'Tatarstan', '109012', 'Russia', '+87 46249872643', '2023-12-17 22:20:46'),
(13, 'nsIif9vh1TZgGpF', 'Mizushi Meseum Road', 'Westminster', 'London', 'SW1A 0AA', 'United Kingdom', '+13 4512804576', '2023-12-17 22:21:52'),
(14, 'l1RE0SUcfDJy5V2', 'Fukuma Rect.', 'Seoul', 'Gyeonggi-do', '03045', 'South Korea', '+64 0125617621', '2023-12-17 22:22:28'),
(15, 'hFiXH0R95Ovg678', 'Exect Iveny, 12-P100', 'New York City', 'New York', '10004', 'United States', '+1 12708349842', '2023-12-17 22:23:42'),
(16, '65kswzSBTfxHDVQ', 'Noromi Street', 'Zermatt', 'Valais', '3920', 'Switzerland', '+82 0217460735', '2023-12-17 22:24:26'),
(17, 't1GlR4S7rsPafAY', 'Wuwui Sector, 14-4500', 'Jurong East', 'Downtown Core', '018956', 'Singapore', '+21 1279056705', '2023-12-17 22:25:18');

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
(11, '092656353748', 'Khurram', 'exampleAddrs_1', '+12 4578986532', 'Safwam', 'exampleAddrs_2', '+78 4598123287', 2, '8', '10', '50kg', '50in', '50in', '50in', 4199, 7, '2023-12-18 01:37:38'),
(12, '018468669870', 'Jhon', 'exampleAddrs_1', '+12 12121212', 'Blake', 'exampleAddrs_2', '+78 4598123287', 2, '13', '16', '50kg', '50in', '50in', '50in', 9500, 7, '2023-12-18 01:51:44'),
(13, '343171315597', 'David', 'exampleAddrs_1', '+12 4578986532', 'Messi', 'exampleAddrs_2', '+98 98989898', 2, '16', '8', '50kg', '50in', '50in', '46in', 15600, 7, '2023-12-18 01:52:35'),
(14, '172039509276', 'Haris', 'exampleAddrs_1', '+12 12121212', 'Faizan', 'exampleAddrs_2', '+98 98989898', 2, '10', '15', '50kg', '56in', '35in', '46in', 4500, 7, '2023-12-18 01:53:27'),
(15, '387062049837', 'Felix', 'exampleAddrs_1', '+12 12121212', 'Jake', 'exampleAddrs_2', '+98 98989898', 2, '12', '15', '60kg', '50in', '50in', '46in', 15999, 8, '2023-12-18 01:54:11'),
(16, '166001387710', 'Zeke', 'exampleAddrs_1', '+12 12121212', 'Levi', 'exampleAddrs_2', '+98 98989898', 2, '15', '7', '50kg', '50in', '35in', '50in', 4199, 8, '2023-12-18 01:55:24'),
(17, '206416574102', 'Eren', 'exampleAddrs_1', '+12 12121212', 'Armin', 'exampleAddrs_2', '+98 98989898', 2, '9', '8', '50kg', '56in', '50in', '50in', 5560, 1, '2023-12-18 01:56:43'),
(18, '399438331755', 'Eren', 'exampleAddrs_1', '+12 12121212', 'Armin', 'exampleAddrs_2', '+98 98989898', 2, '9', '8', '60kg', '56in', '35in', '46in', 4199, 8, '2023-12-18 01:56:43'),
(19, '131474103396', 'Eren', 'exampleAddrs_1', '+12 12121212', 'Armin', 'exampleAddrs_2', '+98 98989898', 2, '9', '8', '45kg', '66in', '98in', '75in', 7894, 8, '2023-12-18 01:56:43'),
(20, '034572139485', 'Kruger', 'exampleAddrs_1', '+12 12121212', 'Grishia', 'exampleAddrs_2', '+98 98989898', 2, '8', '11', '60kg', '50in', '67in', '45in', 3458, 1, '2023-12-18 01:57:39'),
(21, '056926953028', 'Yuji', 'exampleAddrs_1', '+12 12121212', 'Sukuna', 'exampleAddrs_2', '+98 98989898', 1, '15', '', '4kg', '67in', '87in', '56in', 5699, 1, '2023-12-18 02:02:03'),
(22, '538663042740', 'Yuji', 'exampleAddrs_1', '+12 12121212', 'Sukuna', 'exampleAddrs_2', '+98 98989898', 1, '15', '', '67kg', '89in', '45in', '34in', 7899, 7, '2023-12-18 02:02:03'),
(23, '977158965408', 'Yuji', 'exampleAddrs_1', '+12 12121212', 'Sukuna', 'exampleAddrs_2', '+98 98989898', 1, '15', '', '56kg', '45in', '67in', '23in', 1299, 7, '2023-12-18 02:02:03'),
(24, '813455622942', 'Yuji', 'exampleAddrs_1', '+12 12121212', 'Sukuna', 'exampleAddrs_2', '+98 98989898', 1, '15', '', '9kg', '65in', '37in', '21in', 7599, 7, '2023-12-18 02:02:03');

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
(24, 11, 7, '2023-12-18 01:58:00'),
(25, 12, 7, '2023-12-18 01:58:06'),
(26, 13, 7, '2023-12-18 01:58:12'),
(27, 14, 7, '2023-12-18 01:58:17'),
(28, 15, 8, '2023-12-18 01:58:27'),
(29, 16, 8, '2023-12-18 01:58:32'),
(30, 19, 8, '2023-12-18 01:58:40'),
(31, 18, 8, '2023-12-18 01:58:48'),
(32, 17, 1, '2023-12-18 01:58:59'),
(33, 20, 1, '2023-12-18 01:59:03'),
(34, 24, 7, '2023-12-18 02:02:14'),
(35, 23, 7, '2023-12-18 02:02:19'),
(36, 22, 7, '2023-12-18 02:02:26'),
(37, 21, 7, '2023-12-18 02:02:31'),
(38, 21, 1, '2023-12-18 02:02:58');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  `branch_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `branch_id`, `date_created`) VALUES
(1, 'Administrator', '', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 1, 0, '2020-11-26 10:57:04'),
(4, 'Khurram ', 'Iqbal', 'khurrram@gmail.com', '32250170a0dca92d53ec9624f336ca24', 2, 1, '2023-12-17 23:52:31'),
(5, 'Waleed', 'Ahtram', 'waleed@gmail.com', '24750d183fd54450055ca1ef61332a0c', 2, 8, '2023-12-17 23:53:15'),
(6, 'Huzaifa', 'Fazal', 'huzaifa@gmail.com', '8f0ecd283525db48a97b5c07d17ed3bd', 2, 9, '2023-12-17 23:53:47'),
(7, 'Fahad', 'Shahid', 'fahad@gmail.com', 'd8e28c1f7a637f0c1f83efb94c3a79e1', 2, 10, '2023-12-17 23:54:22'),
(8, 'Affan', 'Ali', 'affan@gmail.com', 'f7eec5d48b19fc88df060b91fc89e924', 2, 11, '2023-12-17 23:55:41'),
(9, 'Ali', 'Irtaza', 'ali@gmail.com', '984d8144fa08bfc637d2825463e184fa', 2, 12, '2023-12-17 23:56:06'),
(10, 'Safwan', 'Mehter', 'safwan@gmail.com', 'c5f4f829224f6a493038db7d3f00a9dd', 2, 13, '2023-12-17 23:56:55'),
(11, 'Kamran', 'Malik', 'kamran@gmail.com', 'ed4991a37a7147b4e61b6ace9a0ca428', 2, 14, '2023-12-17 23:57:31'),
(12, 'Aun', 'Shehzad', 'aun@gmail.com', '6744979f19cda4c50eca16bbd5da841e', 2, 15, '2023-12-17 23:58:01'),
(13, 'Atif', 'Zahid', 'atif@gmail.com', 'c7c8ee20c175719c5f9775ec7eee5974', 2, 16, '2023-12-17 23:58:29'),
(14, 'Amir', 'Inam', 'amir@gmail.com', '4e72fc71d6afe049572655387d0f5346', 2, 17, '2023-12-17 23:58:55');

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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
