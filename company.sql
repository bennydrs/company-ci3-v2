-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 05:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `absent`
--

CREATE TABLE `absent` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `present` int(11) NOT NULL,
  `permission` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `total_absent` int(11) NOT NULL,
  `lembur` int(11) NOT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absent`
--

INSERT INTO `absent` (`id`, `employee_id`, `present`, `permission`, `alpha`, `total_absent`, `lembur`, `month`) VALUES
(12019, 1000, 5, 0, 3, 0, 3, 12018),
(12020, 1001, 13, 0, 0, 0, 0, 12018),
(12021, 1111, 6, 0, 0, 0, 0, 12018),
(12022, 1234, 12, 30, 1, 0, 20, 12018),
(12023, 1000, 0, 0, 0, 0, 0, 22018),
(12024, 1001, 0, 0, 0, 0, 0, 22018),
(12025, 1002, 0, 0, 0, 0, 0, 22018),
(12026, 1003, 0, 0, 0, 0, 0, 22018),
(12027, 1004, 0, 0, 0, 0, 0, 22018),
(12028, 1111, 0, 0, 0, 0, 0, 22018),
(12029, 1234, 0, 0, 0, 0, 0, 22018);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `e_id_number` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `birth_place` varchar(128) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(20) NOT NULL,
  `status` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_phone` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `religion` varchar(128) NOT NULL,
  `no_npwp` varchar(25) NOT NULL,
  `position_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `date_join` date NOT NULL,
  `academic` varchar(250) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`e_id_number`, `name`, `birth_place`, `birth_date`, `sex`, `status`, `email`, `no_phone`, `address`, `religion`, `no_npwp`, `position_id`, `group_id`, `date_join`, `academic`, `image`) VALUES
(1000, 'Arif', 'Bogor', '2019-09-01', 'Male', 'Single', 'arif@gmail.com', '08989898989', 'bogor', 'Islam', '344555', 2, 0, '2019-09-01', 'S1', '38a7cb0e5db0411e81fcfba0da22e1d71.jpg'),
(1001, 'Samsul', 'Jakarta', '2001-01-01', 'Male', 'Single', 'samsul@gmail.com', '084444443333', 'Jakarta', 'Islam', '56565666666666666', 5, 0, '2019-09-09', 'S2', 'default.jpg'),
(1002, 'Yondu', 'Hala', '1991-01-01', 'Male', 'Married', 'yondu@gmail.com', '08123345556', 'Jakarta barat', 'Islam', '98880122', 4, 2, '2019-09-14', 'S2', 'default.jpg'),
(1003, 'Santoso', 'Jakarta', '1996-09-01', 'Male', 'Single', 'santoso@gmail.com', '08797979979', 'bintaro, tangerang', 'Islam', '123456789', 5, 2, '2019-09-14', 'S1', 'default.jpg'),
(1004, 'Kuda', 'Jakarta', '0000-00-00', 'Female', 'Single', 'kuda@gmail.com', '088888888888', 'arab', 'Islam', '098765432345', 14, 2, '2019-09-15', 'S2', 'default.jpg'),
(1111, 'Apri', 'Bogor', '0000-00-00', 'Female', 'Married', 'bedas_16@yahoo.co.id', '856666666', 'arab', 'Islam', '344555', 1, 1, '2019-09-01', 'S1', 'default.jpg'),
(1234, 'Afkar', 'Bogor', '2018-01-06', 'Male', 'Single', 'afkar@gmail.com', '085777777777', 'Lebakwangi girang', 'Islam', '1111111111122222', 4, 2, '2019-09-01', 'S1 Akuntansi Universitas Indonesia', '88c85728a88449638242b7968346baf1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `name_group` varchar(128) NOT NULL,
  `tj_married` int(11) NOT NULL,
  `meal` int(11) NOT NULL,
  `overtime` int(11) NOT NULL,
  `alpha_cuts` int(11) NOT NULL,
  `permission_cuts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name_group`, `tj_married`, `meal`, `overtime`, `alpha_cuts`, `permission_cuts`) VALUES
(1, 'A1', 100000, 20000, 50000, 200000, 150000),
(2, 'A2', 100000, 15000, 100000, 200000, 100000),
(4, 'A3', 90000, 120000, 130000, 100000, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `total_days` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`id`, `employee_id`, `date`, `total_days`, `date_start`, `date_finish`, `reason`) VALUES
(2, 1000, '0000-00-00', 1, '2019-09-09', '2019-09-10', 'Kondangan'),
(3, 1234, '2019-09-09', 1, '2019-09-09', '2019-09-10', 'Kondangan');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name_position` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name_position`, `salary`) VALUES
(1, 'Director', 10000000),
(2, 'Manager', 6000000),
(4, 'Finance', 5500000),
(5, 'HDR', 5500000),
(10, 'Administrator', 5000000),
(14, 'Secretary', 4500000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `e_id_number` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `e_id_number`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(2, 1111, 'apri', 'bedas_16@yahoo.co.id', '38a7cb0e5db0411e81fcfba0da22e1d7.jpg', '$2y$10$4SQCn9UcQhmiuMkt32QwseAJcwY7JwKYX0PxqXvPdocw4J3zNgTCO', 1, 1, 1566816535),
(17, 1000, 'Arif', 'arif@gmail.com', '', '$2y$10$qvXci10lyzBJvnq8280zJuN8d2iKSNU33ATRx93/ym3m.y.kAZM16', 2, 0, 0),
(19, 1234, 'Afkar', 'afkar@gmail.com', '', '$2y$10$GIjvlJTtlrHF5e3VWYfORuGftpd1qF4uwXAOUZqXhngBt1ac2mtgy', 2, 0, 0),
(20, 1001, 'Samsul', 'samsul@gmail.com', '', '$2y$10$uu4uE.TwZztcuov2rNuoteFr5bCUSstFTyMyZQATp2zA6IFHhW6J6', 2, 0, 0),
(21, 1002, 'Yondu', 'yondu@gmail.com', '', '$2y$10$SXVIm4Ax9U0Kwrlv8xuUdOUKMs0w4asZKh/v21BAeYUrvXB.MbcIm', 2, 0, 0),
(22, 1003, 'Santoso', 'santoso@gmail.com', '', '$2y$10$ovzI5dKLHyz2Rm/g/VKwKOpdbmtL7Vx4K6Q3RlS8R4jDxD.1vim9y', 2, 0, 0),
(23, 1004, 'Kuda', 'kuda@gmail.com', '', '$2y$10$0rpk/YfVkf22P6bpEP4xoueUYGupE6wCgJhrPAmMB1vF/4.mwuhPO', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(6, 1, 3),
(7, 1, 6),
(8, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(6, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(8, 6, 'Employee', 'employee', 'fas fa-fw fa-users', 1),
(9, 6, 'Position', 'employee/position', 'fas fa-fw fa-briefcase', 1),
(12, 8, 'cobalah', 'coba', 'fas fa-fw fa-user', 1),
(13, 6, 'Leave', 'employee/leave', 'fas fa-fw fa-calendar-day', 1),
(14, 6, 'Absent', 'employee/absent', 'fas fa-fw fa-clipboard-check', 1),
(15, 6, 'Salary', 'employee/salary', 'fas fa-fw fa-credit-card', 1),
(16, 6, 'Group', 'employee/group', 'fas fa-fw fa-users-cog', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(12, 'bedaaja2@gmail.com', 'gpQ/VvIGXdwMV3mi/Q8534kiKfN4wwXObhZHcgoQG/w=', 1567248410),
(13, 'bedaaja2@gmail.com', 'R9iiJgTiR4gdFbfUY+mmGMskIg2z1ad8/n0CBcL2CHw=', 1567248939),
(14, 'bedaaja2@gmail.com', 'EL5Yti2H4LEbw9OnxdTWhoP6G6UyaFXkXKjf7F3nFKw=', 1567249010);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absent`
--
ALTER TABLE `absent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`e_id_number`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absent`
--
ALTER TABLE `absent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12030;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
