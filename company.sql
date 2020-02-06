-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2020 at 05:06 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

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
  `sick` int(11) NOT NULL,
  `alpha` int(11) NOT NULL,
  `lembur` int(11) NOT NULL,
  `month` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absent`
--

INSERT INTO `absent` (`id`, `employee_id`, `present`, `permission`, `sick`, `alpha`, `lembur`, `month`) VALUES
(12081, 11111, 24, 0, 0, 0, 0, '2020-02'),
(12082, 22222, 15, 2, 1, 1, 0, '2020-02'),
(12083, 11111, 24, 1, 1, 0, 750, '2020-01'),
(12084, 22222, 21, 2, 0, 2, 750, '2020-01');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `e_id_number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `birth_place` varchar(128) NOT NULL,
  `birth_date` date NOT NULL,
  `sex` varchar(20) NOT NULL,
  `status` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_phone` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `religion` varchar(128) NOT NULL,
  `no_npwp` varchar(16) NOT NULL,
  `position_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `date_join` date NOT NULL,
  `academic` varchar(250) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `e_id_number`, `user_id`, `name`, `birth_place`, `birth_date`, `sex`, `status`, `email`, `no_phone`, `address`, `religion`, `no_npwp`, `position_id`, `group_id`, `date_join`, `academic`, `image`) VALUES
(16, 11111, 37, 'Apri', 'Bogor', '2003-04-01', 'Perempuan', 'Belum Menikah', 'hgs@jdhd.com', '089999999999', 'bogor', 'Islam', '093938973879387', 10, 2, '2020-02-04', 'S1', 'default.jpg'),
(17, 22222, 38, 'Udin', 'Bogor', '1995-01-01', 'Laki-Laki', 'Belum Menikah', 'udin@jdhd.com', '082626262222', 'bogor', 'Islam', '084646357634343', 4, 2, '2020-02-04', 'S1', 'default.jpg');

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
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `title`, `content`, `user_id`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'Pengumuman libur', '<p>besok <strong>libur</strong></p>', 2, 0, '2020-01-30 02:58:35', '0000-00-00 00:00:00'),
(6, 'Informasi', '<p>Note that here too the limited string contains more than 10 chars but since CI tries to maintain word integrity, it does not break the last word.</p>', 2, 0, '2020-01-30 03:25:11', '0000-00-00 00:00:00'),
(7, 'Pengumuman', '<p>beselkjdd dkdkd dddddd</p>', 2, 2, '2020-01-31 03:45:09', '2020-01-31 10:47:24');

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
  `id_position` int(11) NOT NULL,
  `name_position` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id_position`, `name_position`, `salary`) VALUES
(1, 'Director', 10000000),
(2, 'Manager', 6000000),
(4, 'Finance', 5500000),
(5, 'HRD', 5500000),
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
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `e_id_number`, `name`, `email`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(37, 11111, 'Apri', 'hgs@jdhd.com', '$2y$10$rBb/A0NJBcjn8.LwqB.Q0.ecsWNrNQlcrX9pcIh4oWhouF8IKtMKq', 1, 1, '2020-02-04 05:54:18'),
(38, 22222, 'Udin', 'udin@jdhd.com', '$2y$10$sCPeXBsTXRu2yPvBqauEfu3bO6Y7N8r.pV7vt7MPs1v7CEm2DPEai', 2, 1, '2020-02-04 10:02:40');

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
(8, 1, 8),
(11, 1, 9);

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
(6, 'Employee'),
(9, 'Info');

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
  `order_by` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `order_by`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1, 1),
(2, 2, 'My Profile', 'user/profil', 'fas fa-fw fa-user', 4, 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 5, 0),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 7, 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 8, 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 2, 1),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 6, 1),
(8, 6, 'Pegawai', 'employee', 'fas fa-fw fa-users', 9, 1),
(9, 6, 'Jabatan', 'employee/position', 'fas fa-fw fa-briefcase', 14, 1),
(12, 8, 'cobalah', 'coba', 'fas fa-fw fa-user', 0, 1),
(13, 6, 'Cuti', 'employee/leave', 'fas fa-fw fa-calendar-day', 12, 1),
(14, 6, 'Absen', 'employee/absent', 'fas fa-fw fa-clipboard-check', 10, 1),
(15, 6, 'Gaji', 'employee/salary', 'fas fa-fw fa-credit-card', 11, 1),
(16, 6, 'Golongan', 'employee/group', 'fas fa-fw fa-users-cog', 13, 1),
(18, 9, 'Informasi', 'info', 'fas fa-fw fa-info', 15, 1),
(19, 2, 'Home', 'user', 'fas fa-fw fa-home', 3, 1);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `position_id` (`position_id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
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
  ADD PRIMARY KEY (`id_position`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12085;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id_position` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `position` (`id_position`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
