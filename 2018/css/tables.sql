-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2015 at 09:26 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `socialauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `remembered_logins`
--

CREATE TABLE IF NOT EXISTS `remembered_logins` (
  `token` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(60) NOT NULL,
  `password_reset_token` varchar(40) DEFAULT NULL,
  `password_reset_expires_at` datetime DEFAULT NULL,
  `activation_token` varchar(40) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `hybridauth_provider_name` varchar(255) DEFAULT NULL COMMENT 'Provider name',
  `hybridauth_provider_uid` varchar(255) DEFAULT NULL COMMENT 'Provider user ID',
  `last_login_ip` varbinary(16) DEFAULT NULL,
  `last_login_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_manager` tinyint(1) NOT NULL DEFAULT '0',
  `is_subscriber` tinyint(1) NOT NULL DEFAULT '0',
  `address` text,
  `phone` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `password_reset_token`, `password_reset_expires_at`, `activation_token`, `is_active`, `is_admin`, `hybridauth_provider_name`, `hybridauth_provider_uid`, `last_login_ip`, `last_login_time`, `is_manager`, `is_subscriber`, `address`, `phone`, `gender`) VALUES
(1, 'admin', 'admin@example.com', '$2a$08$CqvyInKWLOlJ5CJw965/DeX6Vo9pTTNSNn8cUEE.bVf5Ura79HOwO', NULL, NULL, NULL, 1, 1, NULL, NULL, 0x7f000001, '2015-10-06 19:26:36', 1, 1, '123 Street', '123456789', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `remembered_logins`
--
ALTER TABLE `remembered_logins`
  ADD PRIMARY KEY (`token`), ADD KEY `user_id` (`user_id`), ADD KEY `expires_at` (`expires_at`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `hybridauth_idx` (`hybridauth_provider_name`,`hybridauth_provider_uid`), ADD UNIQUE KEY `password_reset_token` (`password_reset_token`), ADD UNIQUE KEY `activation_token` (`activation_token`), ADD KEY `name` (`name`), ADD KEY `hybridauth_provider_name` (`hybridauth_provider_name`,`hybridauth_provider_uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=119;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `remembered_logins`
--
ALTER TABLE `remembered_logins`
ADD CONSTRAINT `remembered_logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
