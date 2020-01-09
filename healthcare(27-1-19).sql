-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 27, 2019 at 06:48 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.1.33-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `id_number`
--

CREATE TABLE `id_number` (
  `id` int(50) NOT NULL,
  `type` varchar(200) NOT NULL,
  `real_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id_number`
--

INSERT INTO `id_number` (`id`, `type`, `real_id`) VALUES
(1, 'patient_uhid', 1),
(2, 'rpt_id', 1),
(3, 'exp_voucher', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_25_094347_create_reports_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pnt_aid` int(255) NOT NULL,
  `pnt_uhid` varchar(255) DEFAULT NULL,
  `pnt_mobile` bigint(255) NOT NULL,
  `pnt_name` varchar(500) DEFAULT NULL,
  `pnt_gender` varchar(50) DEFAULT NULL,
  `pnt_age` int(255) DEFAULT NULL,
  `pnt_address` text NOT NULL,
  `pnt_email` varchar(50) NOT NULL,
  `pnt_status` varchar(200) NOT NULL,
  `pnt_cr_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pnt_up_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pnt_aid`, `pnt_uhid`, `pnt_mobile`, `pnt_name`, `pnt_gender`, `pnt_age`, `pnt_address`, `pnt_email`, `pnt_status`, `pnt_cr_date`, `pnt_up_date`) VALUES
(1, '1', 7845784578, 'Mahesh', 'Male', 30, 'Shivoy complex arera colony bhopal', 'mahesh@gmail.com', 'ACTIVE', '2019-12-25 00:00:00', '2019-12-26 00:00:00'),
(6, NULL, 87897898, 'sdasd', 'Male', NULL, 'shivoy complex', 'sdasd@gmail.com', 'ACTIVE', '2019-12-26 18:10:08', '2019-12-26 18:10:08'),
(7, NULL, 878978987979, 'sdasdm,kjl', 'Male', 30, 'shivoy complex', 'sdasd@gmail.com', 'ACTIVE', '2019-12-26 18:10:53', '2019-12-26 18:10:53'),
(8, NULL, 831968689, 'dfdsf', 'Male', 15, 'shivoy complex', 'fgr@gmail.com', 'ACTIVE', '2019-12-26 18:13:25', '2019-12-26 18:13:25'),
(9, NULL, 7845789568, 'Dilip', 'MALE', 35, 'shivoy complex', 'Dilip@gmail.com', 'ACTIVE', '2019-12-26 18:25:20', '2019-12-26 18:25:20'),
(12, NULL, 9875487540, 'Nimish', 'MALE', 54, 'bhopal', 'nimish@gmail.com', 'ACTIVE', '2019-12-27 11:39:19', '2019-12-27 11:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `rpt_aid` int(100) NOT NULL,
  `rpt_id` varchar(200) NOT NULL,
  `rpt_date` date NOT NULL,
  `rpt_pnt_id` varchar(100) NOT NULL,
  `rpt_pnt_uhid` varchar(200) NOT NULL,
  `rpt_test_ask` varchar(500) NOT NULL,
  `rpt_smpl_collect_at` varchar(500) NOT NULL,
  `rpt_amt` double NOT NULL DEFAULT '0',
  `rpt_amt_receive` float NOT NULL,
  `rpt_payment_status` varchar(200) NOT NULL,
  `rpt_tot_dis` double NOT NULL,
  `rpt_ref_by` varchar(200) NOT NULL,
  `rpt_doc_id` int(100) NOT NULL,
  `rpt_remark` text NOT NULL,
  `rpt_status` int(200) NOT NULL,
  `rpt_cr_date` datetime NOT NULL,
  `rpt_up_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reports_test`
--

CREATE TABLE `reports_test` (
  `r_test_aid` int(255) NOT NULL,
  `rpt_id` int(200) NOT NULL,
  `r_test_id` int(200) NOT NULL,
  `r_test_under` int(200) NOT NULL,
  `r_test_charge` double NOT NULL,
  `r_test_value` varchar(500) NOT NULL,
  `r_test_remark` text NOT NULL,
  `r_test_cr_date` datetime NOT NULL,
  `r_test_up_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_aid` int(100) NOT NULL,
  `test_under` int(100) NOT NULL,
  `test_name` varchar(500) NOT NULL,
  `test_description` varchar(500) NOT NULL,
  `test_charge` double NOT NULL DEFAULT '0',
  `test_unit` varchar(100) NOT NULL,
  `test_status` varchar(50) NOT NULL DEFAULT 'ACTIVE',
  `test_cr_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `test_up_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_aid`, `test_under`, `test_name`, `test_description`, `test_charge`, `test_unit`, `test_status`, `test_cr_date`, `test_up_date`) VALUES
(15, 48, '25- HYDROXY (OH) VIT D, SERUM', '', 150, 'ng/ml', 'ACTIVE', '2019-12-27 12:07:29', '2019-12-27 12:07:29'),
(16, 92, 'ESTRADIAOL-E2 , Method:  Serum By CLIA', '', 250, 'pg/ml', 'ACTIVE', '2019-12-27 12:07:29', '2019-12-27 12:07:29'),
(17, 49, 'Insulin Level Fasting', '', 180, 'uU/ml', 'ACTIVE', '2019-12-27 12:07:29', '2019-12-27 12:07:29'),
(18, 48, 'IgE Total Antibody Method :Serum by CLIA', '', 100, 'ng/ml', 'ACTIVE', '2019-12-27 12:07:29', '2019-12-27 12:07:29'),
(19, 92, 'Blood Sugar Random (BSR)', '', 190, 'mg/dl', 'ACTIVE', '2019-12-27 12:07:29', '2019-12-27 12:07:29'),
(20, 49, 'SGPT', '', 350, 'U/L', 'ACTIVE', '2019-12-27 12:07:29', '2019-12-27 12:07:29'),
(150, 92, 'blood test', 'this is a blood test', 800, 'ml', 'ACTIVE', '2019-12-27 12:07:57', '2019-12-27 12:07:57'),
(152, 49, 'BLOOD', 'BLOOD', 480, 'ng/ml', 'INACTIVE', '2019-12-27 12:50:51', '2019-12-27 12:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `test_categories`
--

CREATE TABLE `test_categories` (
  `cat_aid` int(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_status` varchar(500) NOT NULL DEFAULT 'ACTIVE',
  `cat_cr_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_up_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_categories`
--

INSERT INTO `test_categories` (`cat_aid`, `cat_name`, `cat_status`, `cat_cr_date`, `cat_up_date`) VALUES
(48, 'SEROLOGY', 'ACTIVE', '2019-12-26 12:53:25', '2019-12-26 12:53:25'),
(49, 'TUMOR MARKERS', 'ACTIVE', '2019-12-26 12:53:25', '2019-12-26 12:53:25'),
(92, 'BLOOD SAMPLE', 'ACTIVE', '2019-12-26 16:56:50', '2019-12-26 16:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kuldeep', 'kuldeep@gmail.com', '$2y$10$yiEDP5E5m8VRNrWfPsSE5eZnJ6neaZldn0MTsi1jGMSNxTDt.JvUK', 'z3fbmn0YcpXgFRBUsFiTud0FDGm5CIuDB4M6JzXPs4j1NtQ07OzEOMlwVVCU', '2019-12-25 00:25:14', '2019-12-25 00:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_designation`
--

CREATE TABLE `user_designation` (
  `desig_aid` int(100) NOT NULL,
  `desig_name` varchar(100) NOT NULL,
  `desig_status` varchar(500) NOT NULL DEFAULT 'active',
  `desig_cr_date` date NOT NULL,
  `desig_up_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_designation`
--

INSERT INTO `user_designation` (`desig_aid`, `desig_name`, `desig_status`, `desig_cr_date`, `desig_up_date`) VALUES
(1, 'Doctor', 'ACTIVE', '2018-03-27', '2018-04-06'),
(7, 'Staff', 'ACTIVE', '2018-04-06', '2018-04-06'),
(10, 'Admin', 'ACTIVE', '2019-12-24', '2019-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `user_aid` int(255) NOT NULL,
  `user_name` text NOT NULL,
  `user_email` varchar(500) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_role` varchar(200) NOT NULL,
  `user_contact` bigint(20) NOT NULL,
  `user_emcontact` bigint(20) NOT NULL,
  `user_access` varchar(100) NOT NULL,
  `user_desig_id` int(100) NOT NULL,
  `user_desig_name` varchar(500) NOT NULL,
  `sig_img` varchar(500) NOT NULL,
  `user_status` text NOT NULL,
  `user_cr_date` date NOT NULL,
  `user_up_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='employee details contains name, email, emergency contact';

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`user_aid`, `user_name`, `user_email`, `user_password`, `user_role`, `user_contact`, `user_emcontact`, `user_access`, `user_desig_id`, `user_desig_name`, `sig_img`, `user_status`, `user_cr_date`, `user_up_date`) VALUES
(18, 'admin', 'admin@gmail.com', 'admin@123', 'Administrator', 9752733081, 7805817923, 'YES', 9, 'Chairman', '1523016831.jpg', 'ACTIVE', '2018-03-27', '2018-04-07 09:42:31.000000'),
(19, 'Doctor', 'Doctor@gmail.com', 'Doctor@123', 'Doctor', 9993188028, 33333333333, 'YES', 1, 'Doctor', '1523016807.jpg', 'ACTIVE', '2018-03-29', '2018-04-06 05:43:27.000000'),
(22, 'staff', 'staff@gmail.com', 'staff@123', 'Staff', 9630853721, 9630853721, 'YES', 7, 'Staff', '1523016850.jpg', 'ACTIVE', '2018-04-06', '2018-04-06 05:44:10.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `id_number`
--
ALTER TABLE `id_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pnt_aid`),
  ADD UNIQUE KEY `pnt_uhid` (`pnt_uhid`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`rpt_aid`),
  ADD UNIQUE KEY `rpt_id` (`rpt_id`);

--
-- Indexes for table `reports_test`
--
ALTER TABLE `reports_test`
  ADD PRIMARY KEY (`r_test_aid`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_aid`);

--
-- Indexes for table `test_categories`
--
ALTER TABLE `test_categories`
  ADD PRIMARY KEY (`cat_aid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_designation`
--
ALTER TABLE `user_designation`
  ADD PRIMARY KEY (`desig_aid`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`user_aid`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `id_number`
--
ALTER TABLE `id_number`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pnt_aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `rpt_aid` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports_test`
--
ALTER TABLE `reports_test`
  MODIFY `r_test_aid` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
--
-- AUTO_INCREMENT for table `test_categories`
--
ALTER TABLE `test_categories`
  MODIFY `cat_aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_designation`
--
ALTER TABLE `user_designation`
  MODIFY `desig_aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `user_aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
