-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2021 at 04:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dr_banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(6) NOT NULL,
  `user_id` int(20) NOT NULL,
  `balance` varchar(50) DEFAULT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `user_id`, `balance`, `time_date`) VALUES
(1000000051, 51, '7000', '2020-05-28 19:15:23'),
(1000000052, 52, '7900', '2020-05-28 19:52:36'),
(1000000053, 53, '0', '2020-05-28 19:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(6) UNSIGNED NOT NULL,
  `account_id` bigint(30) NOT NULL,
  `user_id` int(20) NOT NULL,
  `amount` bigint(50) DEFAULT NULL,
  `balance` bigint(30) NOT NULL,
  `transaction_type` varchar(50) DEFAULT NULL,
  `time_date` datetime NOT NULL DEFAULT current_timestamp(),
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `account_id`, `user_id`, `amount`, `balance`, `transaction_type`, `time_date`, `note`) VALUES
(30, 1000000051, 51, 10000, 10000, 'credit', '2020-05-29 00:46:18', 'Savings'),
(31, 1000000051, 51, 3000, 7000, 'debit', '2020-05-29 00:46:58', 'Withdraw for fees.'),
(32, 1000000052, 52, 7000, 7000, 'credit', '2020-06-28 16:09:40', 'Deposite ammount'),
(33, 1000000052, 52, 3000, 4000, 'debit', '2020-06-28 16:10:00', 'Withdraw'),
(34, 1000000052, 52, 4000, 8000, 'credit', '2020-06-28 16:21:17', 'test'),
(35, 1000000052, 52, 100, 7900, 'debit', '2021-07-04 17:29:27', 'tseting');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(6) UNSIGNED NOT NULL,
  `account_id` bigint(40) DEFAULT NULL,
  `user_name` varchar(30) NOT NULL,
  `street` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `age` int(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `role` varchar(30) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_image` varchar(40) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `account_id`, `user_name`, `street`, `city`, `state`, `zip`, `phone`, `email`, `age`, `gender`, `role`, `reg_date`, `user_image`, `password`) VALUES
(50, 0, 'Raman', 'Huda Complex', 'Rohtak', 'Haryana', 124001, '09090908967', 'raman@gmail.com', 45, 'Male', 'admin', '2020-05-29 13:52:30', 'img/raman.jpg', '123'),
(51, 1000000051, 'Nisha Saini', 'Rohini Nagar', 'Rohtak', 'Haryana', 124001, '09090908123', 'nishasaini@gmail.com', 26, 'Female', 'user', '2020-06-28 10:38:19', 'img/nisha-saini2.jpg', '123123'),
(52, 1000000052, 'Manish', 'Rohat Nagar', 'Delhi', 'Haryana', 124001, '09090908912', 'manish@gmail.com', 29, 'Male', 'user', '2021-07-04 12:00:23', 'img/manish.png', '123'),
(53, 1000000053, 'Renu Arora', 'Huda Complex', 'Rohtak', 'Haryana', 124001, '09090908967', 'renuarora@gmail.com', 35, 'Female', 'user', '2020-05-29 16:09:46', 'img/renu-arora.jpg', '123123'),
(60, 0, 'admin', '1075/14, Krishna Colony, Rohtak', 'Rohtak', 'Haryana', 124001, '333', 'admin@gmail.com', 24, '', 'admin', '2021-07-03 19:41:25', 'img/', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
