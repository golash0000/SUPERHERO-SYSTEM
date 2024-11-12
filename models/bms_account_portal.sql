-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2024 at 04:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms_account_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `brgy_user_registration_process`
--

CREATE TABLE `brgy_user_registration_process` (
  `registration_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `otp_sent_at` datetime NOT NULL,
  `otp_verified` tinyint(1) DEFAULT 0,
  `verification_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brgy_user_registration_process`
--

INSERT INTO `brgy_user_registration_process` (`registration_id`, `user_id`, `email`, `otp`, `otp_sent_at`, `otp_verified`, `verification_at`, `created_at`, `updated_at`) VALUES
(50, NULL, 'test_user@badac.ph', '7045', '2024-11-04 15:00:13', 1, NULL, '2024-11-04 22:00:13', NULL),
(51, NULL, 'k80308392@gmail.com', '3718', '2024-11-05 04:44:50', 1, NULL, '2024-11-05 11:44:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `google_access_tokens`
--

CREATE TABLE `google_access_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `access_token` text NOT NULL,
  `refresh_token` text NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brgy_user_registration_process`
--
ALTER TABLE `brgy_user_registration_process`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `google_access_tokens`
--
ALTER TABLE `google_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brgy_user_registration_process`
--
ALTER TABLE `brgy_user_registration_process`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `google_access_tokens`
--
ALTER TABLE `google_access_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brgy_user_registration_process`
--
ALTER TABLE `brgy_user_registration_process`
  ADD CONSTRAINT `brgy_user_registration_process_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `brgy_existing_staff_users` (`brgy_user_id`);

--
-- Constraints for table `google_access_tokens`
--
ALTER TABLE `google_access_tokens`
  ADD CONSTRAINT `google_access_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `brgy_existing_staff_users` (`brgy_user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
