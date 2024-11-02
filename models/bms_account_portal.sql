-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 03:06 PM
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
-- Table structure for table `brgy_existing_users`
--

CREATE TABLE `brgy_existing_users` (
  `brgy_user_id` int(11) NOT NULL,
  `brgy_account_id` int(11) DEFAULT NULL,
  `brgy_firstName` varchar(255) DEFAULT NULL,
  `brgy_lastName` varchar(255) DEFAULT NULL,
  `brgy_email` varchar(255) DEFAULT NULL,
  `brgy_password_hashed` varchar(255) DEFAULT NULL,
  `brgy_password` varchar(255) DEFAULT NULL,
  `brgy_account_user_type` varchar(50) DEFAULT NULL,
  `brgy_account_date_created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brgy_existing_users`
--

INSERT INTO `brgy_existing_users` (`brgy_user_id`, `brgy_account_id`, `brgy_firstName`, `brgy_lastName`, `brgy_email`, `brgy_password_hashed`, `brgy_password`, `brgy_account_user_type`, `brgy_account_date_created`) VALUES
(1, 1, NULL, NULL, 'k80308392@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '12345', NULL, '2024-11-01 17:32:10'),
(2, 996909, NULL, NULL, 'test@test.pjx', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'test', NULL, '2024-11-01 20:32:40'),
(3, 122579, NULL, NULL, 'kenneth@kai.us', 'cd4f81216901230cd7097deba42991785da5d8008d0815e3561b59bb133bcbed', 'iamkai', NULL, '2024-11-01 20:35:30'),
(4, 107436, NULL, NULL, 'k80308392@test.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'test', NULL, '2024-11-01 21:13:29'),
(5, 330015, NULL, NULL, 'koko@test.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'test', NULL, '2024-11-01 21:14:43'),
(6, 853043, NULL, NULL, 'koko@test.com.ux', '07123e1f482356c415f684407a3b8723e10b2cbbc0b8fcd6282c49d37c9c1abc', 'lol', NULL, '2024-11-01 21:29:11'),
(7, 900909, NULL, NULL, 'kokoko@test.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'test', NULL, '2024-11-01 21:32:10');

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
(22, NULL, 'test@test.ph', '2851', '2024-11-01 13:24:46', 0, NULL, '2024-11-01 20:24:46', NULL),
(23, NULL, 'test@test.pjj', '4921', '2024-11-01 13:26:58', 1, '2024-11-01 20:27:12', '2024-11-01 20:26:58', NULL),
(24, NULL, 'test@test.pj', '8177', '2024-11-01 13:30:52', 1, '2024-11-01 20:31:12', '2024-11-01 20:30:52', NULL),
(25, NULL, 'test@test.pjx', '2920', '2024-11-01 13:32:03', 1, '2024-11-01 20:32:34', '2024-11-01 20:32:03', NULL),
(26, NULL, 'kenneth@kai.us', '2861', '2024-11-01 13:35:06', 1, '2024-11-01 20:35:22', '2024-11-01 20:35:06', NULL),
(27, NULL, 'k80308392@test.com', '4997', '2024-11-01 14:02:50', 1, '2024-11-01 21:12:37', '2024-11-01 21:02:50', NULL),
(28, NULL, 'koko@test.com', '4016', '2024-11-01 14:13:53', 1, '2024-11-01 21:14:27', '2024-11-01 21:13:53', NULL),
(29, NULL, 'koko@test.com.ux', '4456', '2024-11-01 14:23:51', 1, '2024-11-01 21:24:21', '2024-11-01 21:23:51', NULL),
(30, NULL, 'kokoko@test.com', '4360', '2024-11-01 14:31:47', 1, '2024-11-01 21:32:01', '2024-11-01 21:31:47', NULL);

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
-- Indexes for table `brgy_existing_users`
--
ALTER TABLE `brgy_existing_users`
  ADD PRIMARY KEY (`brgy_user_id`);

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
-- AUTO_INCREMENT for table `brgy_existing_users`
--
ALTER TABLE `brgy_existing_users`
  MODIFY `brgy_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brgy_user_registration_process`
--
ALTER TABLE `brgy_user_registration_process`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  ADD CONSTRAINT `brgy_user_registration_process_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `brgy_existing_users` (`brgy_user_id`);

--
-- Constraints for table `google_access_tokens`
--
ALTER TABLE `google_access_tokens`
  ADD CONSTRAINT `google_access_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `brgy_existing_users` (`brgy_user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
