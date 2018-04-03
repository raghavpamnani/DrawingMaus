-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2018 at 09:41 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Allotment of seats berths by train staff', 'train', NULL, NULL),
(2, 'Bedroll Complaints', 'train', NULL, NULL),
(3, 'Bribery and corruption', 'station', NULL, NULL),
(4, 'Catering and Vending Services', 'train', NULL, NULL),
(5, 'Cleanliness at Station', 'station', NULL, NULL),
(10, 'Parcels Luggage', 'station', NULL, NULL),
(12, 'Maintenance Cleanliness of coaches', 'train', NULL, NULL),
(13, 'Malfunctioning of Electrical Equipment and AC', 'train', NULL, NULL),
(14, 'Non availability of Water', 'station', NULL, NULL),
(15, 'Passenger Booking', 'station', NULL, NULL),
(16, 'Punctuality of Train', 'station', NULL, NULL),
(17, 'Refund of tickets', 'station', NULL, NULL),
(18, 'Reservation Issues', 'station', NULL, NULL),
(19, 'Retiring Room', 'station', NULL, NULL),
(20, 'Signal and Telecommunication', 'station', NULL, NULL),
(21, 'Thefts / Pilferages', 'station', NULL, NULL),
(22, 'Unauthorised passengers in coaches', 'train', NULL, NULL),
(23, 'Working of Enquiry Offices', 'station', NULL, NULL),
(24, 'Misc Cause', 'station', NULL, NULL),
(26, 'Pest and Rodent Complaint', 'station', NULL, NULL),
(27, 'Complaint against the staff', 'station', NULL, NULL),
(28, 'Problem of touts Middle man', 'train', NULL, NULL),
(29, 'Water logging at Station', 'station', NULL, NULL),
(30, 'Traffic jam at station circulatiing area', 'station', NULL, NULL),
(31, 'Long queue at Booking office', 'station', NULL, NULL),
(32, 'Bribery and corruption', 'train', NULL, NULL),
(33, 'Complaint against the staff', 'train', NULL, NULL),
(34, 'Non availability of Water', 'train', NULL, NULL),
(35, 'Pest and Rodent Complaint', 'train', NULL, NULL),
(36, 'Problem of touts Middle man', 'station', NULL, NULL),
(37, 'Thefts Pilferages', 'train', NULL, NULL),
(38, 'Malfunctioning of Electrical Equipment and AC', 'station', NULL, NULL),
(39, 'Catering and Vending Services', 'station', NULL, NULL),
(40, 'Punctuality of Train', 'train', NULL, NULL),
(41, 'Signal Telecommunication', 'train', NULL, NULL),
(42, 'Misc Cause', 'train', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
