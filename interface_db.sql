-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 30, 2019 at 11:12 PM
-- Server version: 5.6.44-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interface_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` bigint(20) NOT NULL,
  `serviceId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imageId` bigint(20) NOT NULL,
  `serviceId` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imageId`, `serviceId`, `image`) VALUES
(7, 10, '47c30dc44980d8ad9f31e59e956834b3.png'),
(8, 10, '0081db90d04f8ed069b08c591c6096a5.png'),
(9, 10, 'd66388f8254c249b5066b8b5dd5f5808.png'),
(10, 11, 'afebad1fe646d492c073ac963ec0ee50.png'),
(11, 11, '5487dcebdd919f8071c304fb92c6e8d8.png'),
(12, 11, '641299477c904280cc6c9ea63d7047ad.png'),
(13, 12, '5a90a1b3524e27aa7f81c60afe7494e4.png'),
(14, 14, 'c300c39a6f385d739a86ceb999419d94.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `serviceId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `vendor` varchar(255) NOT NULL,
  `serialNumber` varchar(255) NOT NULL,
  `purchaseDate` date NOT NULL,
  `comment` text NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:Pending ,1:In Progress,2:Complete',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceId`, `userId`, `productName`, `vendor`, `serialNumber`, `purchaseDate`, `comment`, `contactNumber`, `status`, `crd`, `upd`) VALUES
(10, 9, 'test1', 'vendor1', '123', '2019-07-01', 'jncsjncs', '134567', 2, '2019-07-10 11:47:22', '2019-07-10 11:47:44'),
(11, 11, 'test 1', 'test vendor', '01', '2019-07-12', 'test data', '1', 2, '2019-07-12 05:54:10', '2019-07-15 10:36:22'),
(12, 13, 'wer', 'fdsfs453', '54353', '2019-07-29', 'ghfhfhghhf', '654646', 2, '2019-07-12 09:55:22', '2019-07-19 06:20:40'),
(13, 14, '01', '01', '01', '2019-07-16', '01', '01', 2, '2019-07-16 09:04:57', '2019-07-25 11:25:09'),
(14, 13, 'Ogr', 'AD', 'AD35', '2019-07-25', 'dfgfdgdgdg', '344334334', 2, '2019-07-25 11:57:33', '2019-07-25 12:04:07'),
(15, 12, 'Test product', 'vendor', '123456qwerty', '2019-07-29', 'test', '  2', 2, '2019-07-29 08:20:02', '2019-07-29 09:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `userType` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:common,1:Admin ,2:Customer ,3: Employee',
  `profileImage` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Active,2:Inactive',
  `authToken` text NOT NULL,
  `passToken` text NOT NULL,
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `password`, `contactNumber`, `userType`, `profileImage`, `status`, `authToken`, `passToken`, `crd`, `upd`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$FoRI5EnZslvZlSDcCm/dWuu.Vbbo7QOXMZ5Csa2Lw7YiLX1OKwR/y', '12345645', 1, 'bNUCVuFLtl4Ah0vr.png', 1, 'c812b1ec5f388b8d5914ec485b977f4f6553ff85', '', '2019-06-25 11:05:04', '2019-07-30 10:56:46'),
(9, 'test', 'test@gmail.com', '$2y$10$WSMq0ZWf4F8ijYa5a8geW.xJIo6yNPVWn44cJhgJvRcR.LReoy7jy', '1323', 2, 'lA2tkvJM8iW5qLVF.jpg', 1, '96966b3fceac1d985de33df0e36291225946d3cc', 'aa9b7d04c5d9704832bf2bbc499488cd40a5ca0c', '2019-07-10 11:46:10', '2019-07-11 09:40:41'),
(10, 'Vaibhav', 'php.vaibhav@gmail.com', '$2y$10$yFQ13w3g2N02ODporav8se1jHFZDDRv4o1y0wrEpq94b4ABH65DF2', '666633344', 1, '', 1, '654ae6d96004d81c054d994d658386c729eb24ca', '', '2019-07-11 11:33:38', '2019-07-16 13:49:47'),
(11, 'Madhuri', 'madhuri.otc@gmail.com', '$2y$10$LU/AWQq/W/jooO0RpfxshOWW4DnOU8cGhiAAEHv14XBMMV3lJZi1e', '123456', 2, '', 1, '24f9625327dbe6e01b5deba13cae98fce5a16741', '', '2019-07-12 05:51:33', '2019-07-30 08:51:22'),
(12, 'cyclesoon01', 'cyclesoon01@gmail.com', '$2y$10$ouGdW3PtbH0ACtzmFgZwvevYqnscV.8TMVJFvy/GJD1Ucqt78360K', '123', 2, 'CWBYvLOTMHrph9ks.png', 1, '7203084f5eac6ed0ff84868a93a4aed7c7bbcba2', 'e98d70c8ae49ea646d823edbe5e1d08e09f5fe80', '2019-07-12 08:32:11', '2019-07-30 05:33:22'),
(13, 'Vaibhav', 'vaibhav786.sharma@gmail.com', '$2y$10$EX/PulntAGXbpaJBP76GOujBQgqZW1bHyobWKlsvvpAbpu6jZDDce', '666633344', 2, 'GsNpirmzT0FeoCDh.jpg', 1, '8e9ad4df155c86cf5f944499e341d6b898a98f0d', 'c28d1df323edbf339dfc88771a21bc5d7500861c', '2019-07-12 09:49:54', '2019-07-25 11:56:54'),
(14, 'testuser', 'testing@yopmail.com', '$2y$10$xAjgS0hqSFtb52afOqTpk.K0BzRnn.gV50HpsJhqHVcYepOHY5Qmy', '123456', 2, 'Fz1BVNKAXRMtwheb.png', 1, '5331f13a6fbeb18469a379c743e45696acc555d8', 'b6d668283bd72b356451467ab3400f664ee5c2ee', '2019-07-16 06:17:53', '2019-07-25 11:18:15'),
(15, 'cyclesoon01', 'cyclesoon01@gmail.co', '$2y$10$ay2ynNmyAm9MJkH4G/.Ph.wWPB6fj6reB70pH2p0RhQFUP6HEy22.', '123456', 2, 'H6ZEY4NPXomiKBWp.png', 1, '2d6b10b0a29f0a32e855f9b07ea16b9382edbcac', 'fd51a1d61f9c374eb70777d97bdef98bb0b827ff', '2019-07-26 06:46:13', '2019-07-30 08:51:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `serviceId` (`serviceId`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`serviceId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imageId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `serviceId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`serviceId`) REFERENCES `service` (`serviceId`) ON DELETE CASCADE;

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
