-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2020 at 06:58 PM
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
(1, 'patient_uhid', 22),
(2, 'rpt_id', 15),
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
  `pnt_address` text,
  `pnt_email` varchar(50) DEFAULT NULL,
  `pnt_status` varchar(200) NOT NULL DEFAULT 'ACTIVE',
  `pnt_cr_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pnt_up_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pnt_aid`, `pnt_uhid`, `pnt_mobile`, `pnt_name`, `pnt_gender`, `pnt_age`, `pnt_address`, `pnt_email`, `pnt_status`, `pnt_cr_date`, `pnt_up_date`) VALUES
(36, '1', 8319326980, 'kuldeep kumar', 'Male', 25, 'shivoy complex', 'kuldeep@gmail.com', 'ACTIVE', '2020-01-03 12:36:59', '2020-01-03 12:36:59'),
(37, '2', 1, 'dfgsg', 'Male', 25, NULL, NULL, 'ACTIVE', '2020-01-03 14:25:46', '2020-01-03 14:25:46'),
(38, '3', 7878778877, 'khjkhj', 'Female', 35, 'bina', 'khj@gmail.com', 'ACTIVE', '2020-01-03 14:45:54', '2020-01-03 14:45:54'),
(39, '4', 7845877887, 'fsgdg', 'Male', 56, NULL, NULL, 'ACTIVE', '2020-01-03 14:46:31', '2020-01-03 14:46:31'),
(40, '5', 8987987978, 'rtyeyt', 'Female', 45, NULL, NULL, 'ACTIVE', '2020-01-03 14:52:42', '2020-01-03 14:52:42'),
(41, '6', 8987987978, 'rtyeyt', 'Female', 45, NULL, NULL, 'ACTIVE', '2020-01-03 14:54:46', '2020-01-03 14:54:46'),
(42, '7', 8987987978, 'rtyeyt', 'Female', 45, NULL, NULL, 'ACTIVE', '2020-01-03 14:55:46', '2020-01-03 14:55:46'),
(43, '8', 8754578545, 'pramod1', 'Female', 45, 'Bhopal mp1', 'pramod@gmail.com1', 'ACTIVE', '2020-01-03 14:56:41', '2020-01-03 14:56:41'),
(44, '9', 8987987978, 'rtyeyt', 'Female', 45, NULL, NULL, 'ACTIVE', '2020-01-03 14:58:31', '2020-01-03 14:58:31'),
(45, '10', 8987987978, 'rtyeyt', 'Female', 45, NULL, NULL, 'ACTIVE', '2020-01-03 14:58:44', '2020-01-03 14:58:44'),
(46, '11', 8754784578, 'Akshay', 'Male', 36, 'shivoy complex', 'akshay@gmail.com', 'ACTIVE', '2020-01-03 15:09:53', '2020-01-03 15:09:53'),
(47, '12', 8754784578, 'Akshay', 'Male', 36, 'shivoy complex', 'akshay@gmail.com', 'ACTIVE', '2020-01-03 15:10:48', '2020-01-03 15:10:48'),
(48, '13', 8754784578, 'Akshay', 'Male', 36, 'shivoy complex', 'akshay@gmail.com', 'ACTIVE', '2020-01-03 15:11:44', '2020-01-03 15:11:44'),
(49, '14', 8795784574, 'Test', 'Male', 25, 'bhopal', 'test@gmail.com', 'ACTIVE', '2020-01-03 15:28:14', '2020-01-03 15:28:14'),
(50, '15', 8754578545, 'pramod1', 'Male', 45, 'Bhopal mp1', 'pramod@gmail.com1', 'ACTIVE', '2020-01-06 13:04:22', '2020-01-06 13:04:22'),
(51, '16', 8958754875, 'manisha singh', 'Female', 36, 'bhopal mp', 'manishas@gmail.com', 'ACTIVE', '2020-01-06 14:44:33', '2020-01-06 14:44:33'),
(52, '17', 2356874578, 'ashish', 'Male', 56, 'bhopal', 'ashish@gmail.com', 'ACTIVE', '2020-01-06 15:29:07', '2020-01-06 15:29:07'),
(53, '18', 7845785451, 'Suresh', 'Male', 28, 'Bhopal', 'suresh@gmail.com', 'ACTIVE', '2020-01-06 15:30:06', '2020-01-06 15:30:06'),
(54, '19', 5874578544, 'Bharti', 'Female', 21, 'shivoy complex E-8, arera  colony  bhopal', 'bharti@gmail.com', 'ACTIVE', '2020-01-07 18:33:58', '2020-01-07 18:33:58'),
(55, '20', 8457845785, 'rakesh', 'Male', 46, NULL, 'rakesh@gmail.com', 'ACTIVE', '2020-01-08 11:54:05', '2020-01-08 11:54:05'),
(56, '21', 8319, 'dgfdsgffd', 'Female', 25, NULL, NULL, 'ACTIVE', '2020-01-10 16:24:59', '2020-01-10 16:24:59');

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
  `rpt_test_ask` varchar(500) DEFAULT NULL,
  `rpt_smpl_collect_at` varchar(500) DEFAULT NULL,
  `rpt_amt` double NOT NULL DEFAULT '0',
  `rpt_amt_receive` float NOT NULL,
  `rpt_amt_remain` int(11) NOT NULL,
  `rpt_payment_status` varchar(200) DEFAULT NULL,
  `rpt_tot_dis` double NOT NULL,
  `rpt_ref_by` varchar(200) DEFAULT NULL,
  `rpt_doc_id` int(100) DEFAULT NULL,
  `rpt_remark` text,
  `rpt_status` varchar(200) DEFAULT NULL,
  `rpt_cr_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rpt_up_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`rpt_aid`, `rpt_id`, `rpt_date`, `rpt_pnt_id`, `rpt_pnt_uhid`, `rpt_test_ask`, `rpt_smpl_collect_at`, `rpt_amt`, `rpt_amt_receive`, `rpt_amt_remain`, `rpt_payment_status`, `rpt_tot_dis`, `rpt_ref_by`, `rpt_doc_id`, `rpt_remark`, `rpt_status`, `rpt_cr_date`, `rpt_up_date`) VALUES
(3, '1', '2020-01-03', '36', '1', NULL, NULL, 1050, 900, 750, NULL, 100, NULL, NULL, NULL, 'BILLING', '2020-01-03 12:36:59', '2020-01-03 00:00:00'),
(5, '3', '2020-01-03', '38', '3', NULL, 'bhopal', 500, 50, 350, NULL, 100, NULL, NULL, NULL, 'SAMPLE TESTING', '2020-01-03 14:45:55', '2020-01-03 14:45:55'),
(10, '8', '2020-01-06', '50', '15', NULL, 'siddharth path lab mp nagar Bhopal', 1530, 500, 530, NULL, 500, NULL, NULL, 'ddggfdfgfdgsfd', 'BILLING', '2020-01-06 13:04:22', '2020-01-06 13:04:22'),
(11, '9', '2020-01-06', '51', '16', NULL, NULL, 1010, 5245, 475122, NULL, 200, NULL, NULL, NULL, 'BILLING', '2020-01-06 14:44:33', '2020-01-06 14:44:33'),
(12, '10', '2020-01-06', '52', '17', NULL, NULL, 100, 20, 70, NULL, 10, NULL, NULL, NULL, 'BILLING', '2020-01-06 15:29:07', '2020-01-06 15:29:07'),
(13, '11', '2020-01-06', '53', '18', NULL, NULL, 1050, 500, 400, NULL, 150, NULL, NULL, NULL, 'SAMPLE COLLECTING', '2020-01-06 15:30:06', '2020-01-06 15:30:06'),
(14, '12', '2020-01-07', '54', '19', NULL, NULL, 1300, 750, 450, NULL, 100, NULL, NULL, NULL, 'BILLING', '2020-01-07 18:33:58', '2020-01-07 18:33:58'),
(15, '13', '2020-01-08', '55', '20', NULL, 'bhopal', 150, 140, 0, NULL, 10, NULL, NULL, NULL, 'APPROVAL STAGE', '2020-01-08 11:54:05', '2020-01-08 11:54:05'),
(16, '14', '2020-01-10', '56', '21', NULL, NULL, 250, 0, 250, NULL, 0, NULL, NULL, NULL, 'REGISTERED', '2020-01-10 16:24:59', '2020-01-10 16:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `reports_test`
--

CREATE TABLE `reports_test` (
  `r_test_aid` int(255) NOT NULL,
  `rpt_id` int(200) DEFAULT NULL,
  `r_test_id` int(200) NOT NULL,
  `r_test_under` int(200) NOT NULL,
  `r_test_charge` double NOT NULL,
  `r_test_value` varchar(500) NOT NULL,
  `r_test_val` varchar(255) DEFAULT NULL,
  `r_test_remark` text,
  `r_test_cr_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `r_test_up_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports_test`
--

INSERT INTO `reports_test` (`r_test_aid`, `rpt_id`, `r_test_id`, `r_test_under`, `r_test_charge`, `r_test_value`, `r_test_val`, `r_test_remark`, `r_test_cr_date`, `r_test_up_date`) VALUES
(98, 6, 152, 49, 480, 'ng/ml', '', NULL, '2020-01-03 15:09:41', '2020-01-03 15:09:41'),
(103, 7, 19, 92, 190, 'mg/dl', '', NULL, '2020-01-03 15:27:24', '2020-01-03 15:27:24'),
(132, 3, 15, 48, 150, 'ng/ml', '5.3', NULL, '2020-01-06 12:24:43', '2020-01-06 12:24:43'),
(135, 3, 20, 49, 350, 'U/L', '2.3', NULL, '2020-01-06 13:01:32', '2020-01-06 13:01:32'),
(140, 8, 152, 49, 480, 'ng/ml', '1', NULL, '2020-01-06 14:08:33', '2020-01-06 14:08:33'),
(141, 8, 150, 92, 800, 'ml', '2', NULL, '2020-01-06 14:23:00', '2020-01-06 14:23:00'),
(142, 8, 16, 92, 250, 'pg/ml', '3', NULL, '2020-01-06 14:25:29', '2020-01-06 14:25:29'),
(144, 9, 17, 49, 180, 'uU/ml', '', NULL, '2020-01-06 14:44:22', '2020-01-06 14:44:22'),
(145, 9, 20, 49, 350, 'U/L', '', NULL, '2020-01-06 14:44:23', '2020-01-06 14:44:23'),
(146, 9, 152, 49, 480, 'ng/ml', '', NULL, '2020-01-06 14:45:08', '2020-01-06 14:45:08'),
(147, 10, 18, 48, 100, 'ng/ml', '', NULL, '2020-01-06 15:28:56', '2020-01-06 15:28:56'),
(148, 11, 16, 92, 250, 'pg/ml', '', NULL, '2020-01-06 15:29:55', '2020-01-06 15:29:55'),
(149, 11, 150, 92, 800, 'ml', '', NULL, '2020-01-06 15:29:56', '2020-01-06 15:29:56'),
(150, 12, 15, 48, 150, 'ng/ml', '5.6', 'ff', '2020-01-07 18:33:36', '2020-01-07 18:33:36'),
(151, 12, 18, 48, 100, 'ng/ml', '2.3', NULL, '2020-01-07 18:33:36', '2020-01-07 18:33:36'),
(152, 12, 16, 92, 250, 'pg/ml', '6.2', NULL, '2020-01-07 18:33:39', '2020-01-07 18:33:39'),
(153, 12, 150, 92, 800, 'ml', '4.2', NULL, '2020-01-07 18:33:40', '2020-01-07 18:33:40'),
(154, 13, 15, 48, 150, 'ng/ml', '5.2', NULL, '2020-01-08 11:53:56', '2020-01-08 11:53:56'),
(156, 14, 15, 48, 150, 'ng/ml', NULL, NULL, '2020-01-10 16:25:46', '2020-01-10 16:25:46'),
(157, 14, 18, 48, 100, 'ng/ml', NULL, NULL, '2020-01-10 16:25:46', '2020-01-10 16:25:46');

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
(1, 'kuldeep', 'kuldeep@gmail.com', '$2y$10$yiEDP5E5m8VRNrWfPsSE5eZnJ6neaZldn0MTsi1jGMSNxTDt.JvUK', 'FKEG7eR9pLt0UXfeRxDs0eldZHubWs8nnBgGORMqvVwJJJxNBhhJSGuIZT4l', '2019-12-25 00:25:14', '2019-12-25 00:25:14');

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
  MODIFY `pnt_aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `rpt_aid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `reports_test`
--
ALTER TABLE `reports_test`
  MODIFY `r_test_aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
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
