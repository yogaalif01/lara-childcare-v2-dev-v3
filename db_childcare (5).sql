-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 01:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_childcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` int(25) NOT NULL,
  `id_role` int(25) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL DEFAULT current_timestamp(),
  `password` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `id_role`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 2, 'zxc@gmail.com', 'zxc', '$2y$10$490HFkmAWCkKzesXmf6URuMC8TuI2DrhLttlP.A/3zQgpnWWom0ey', NULL, NULL),
(2, 1, 'admin@gmail.com', 'admin', '$2y$10$b6A90LKbONRDFFDMFoCTx.kQrAHrA.MEFp3UYB37fU7QlY7q4mRE6', NULL, NULL),
(3, 3, 'employee@gmail.com', 'employee', '$2y$10$6JmMf3mv1G8yjH6F.Iq16.F770ARWyWqHBdHtpTh8l9By.6xJjhpO', NULL, NULL),
(4, 3, 'employee@gmail.com', 'employee', '$2y$10$vVSMVAZdBTtMR4mZ3P351u6pwDa6zWib8c1rhO07/PpBdFFj/Dt1i', NULL, NULL),
(5, 3, 'employee@gmail.com', 'employee', '$2y$10$9.SQtxWP/TYcdhjkZseNtuDx3X3hDGb4C06J/ZuGAu/C/e/SOxnEO', NULL, NULL),
(6, 2, 'samsudin@gmail.com', 'samsudin', '$2y$10$viKb2LXucBwcgA9PYyqTeu540oDc2vpaDtKeNhTYKxnhwO6T6n5Wy', NULL, NULL),
(7, 2, 'testing@gmail.com', 'testing', '$2y$10$YoaU2iyqX1oI/in6JB69Q.LRcAjj72o41dZqXfmbhLKbSU3UpRg8G', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assessmentiindicators`
--

CREATE TABLE `assessmentiindicators` (
  `childReporting_id_childReporting` int(25) NOT NULL,
  `IndicatorChild_assessmentIindicators` int(11) NOT NULL,
  `note` varchar(45) DEFAULT NULL,
  `result` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id_attendance` int(25) NOT NULL,
  `id_biodataEmployee` int(25) NOT NULL DEFAULT current_timestamp(),
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id_attendance`, `id_biodataEmployee`, `date`, `time`, `status`) VALUES
(1, 1, '2022-08-29', '02:03:00', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `biodatachild`
--

CREATE TABLE `biodatachild` (
  `id_biodataChild` int(25) NOT NULL,
  `id_biodataParent` int(25) NOT NULL DEFAULT current_timestamp(),
  `full_name` varchar(45) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `brith_date` date NOT NULL,
  `brith_place` varchar(100) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `child_siblings` int(10) NOT NULL,
  `child_siblings_of` int(10) NOT NULL,
  `child_outside_activity` varchar(45) NOT NULL,
  `religion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodatachild`
--

INSERT INTO `biodatachild` (`id_biodataChild`, `id_biodataParent`, `full_name`, `nickname`, `brith_date`, `brith_place`, `gender`, `child_siblings`, `child_siblings_of`, `child_outside_activity`, `religion`) VALUES
(1, 1, 'Muhammad Rizal Wiyono', 'Rizal', '2022-08-10', 'Sampang', 'Pria', 1, 3, 'Bermain Sepak Bola', 'Islam'),
(2, 2, 'Mawan Maharani', 'Maharani', '2022-09-01', 'Sampang', 'Wanita', 1, 2, 'Bermain Bola', 'Islam'),
(3, 3, 'Sri Mayjen', 'Sri', '2022-09-21', 'Sampang', 'Wanita', 2, 3, 'Renang', 'Protestan'),
(4, 1, 'Sri Mayjen', 'Maharani', '2022-09-08', 'Sampang', 'Pria', 2, 3, 'zxczxc', 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `biodataemployee`
--

CREATE TABLE `biodataemployee` (
  `id_biodataEmployee` int(25) NOT NULL,
  `id_account` int(25) NOT NULL,
  `full_name` varchar(45) NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(45) NOT NULL,
  `join_date` date NOT NULL,
  `brith_date` date NOT NULL,
  `brith_place` varchar(45) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `last_education` varchar(45) DEFAULT NULL,
  `institution` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodataemployee`
--

INSERT INTO `biodataemployee` (`id_biodataEmployee`, `id_account`, `full_name`, `gender`, `join_date`, `brith_date`, `brith_place`, `address`, `phone_number`, `status`, `religion`, `last_education`, `institution`) VALUES
(1, 3, 'employee yuhu', 'Pria', '2022-08-30', '2022-08-12', 'Sampang', 'Madura', '88235536572', 'Lajang', 'Hindu', 'employee', 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `biodataparent`
--

CREATE TABLE `biodataparent` (
  `id_biodataParent` int(25) NOT NULL,
  `id_account` int(25) NOT NULL,
  `father_name` varchar(45) NOT NULL DEFAULT current_timestamp(),
  `mother_name` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `phone_number` varchar(12) NOT NULL,
  `office_address` varchar(100) DEFAULT NULL,
  `office_phone_number` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodataparent`
--

INSERT INTO `biodataparent` (`id_biodataParent`, `id_account`, `father_name`, `mother_name`, `address`, `phone_number`, `office_address`, `office_phone_number`) VALUES
(1, 1, 'zxc', 'zxc', 'zxc', '123', 'zxc', '123'),
(2, 6, 'Gus', 'Las', 'asda', '08923123445', 'sadasdasd', '8923123444'),
(3, 7, 'Samsudin', 'Sulastri', 'JL. Yang ada', '0881231231', 'JL. Yang ada', '0881231231');

-- --------------------------------------------------------

--
-- Table structure for table `childactivity`
--

CREATE TABLE `childactivity` (
  `id_childActivity` int(25) NOT NULL,
  `id_biodataChild` int(25) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `indicator` text NOT NULL,
  `evaluation` varchar(45) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `childactivity`
--

INSERT INTO `childactivity` (`id_childActivity`, `id_biodataChild`, `activity`, `indicator`, `evaluation`, `date`) VALUES
(1, 1, 'Berenang', 'Mencoba Berenang', 'Perlu Latihan', '2022-08-29'),
(2, 1, 'Terbang', 'Bisa terbang', 'Perlu Latihan', '2022-08-29'),
(3, 4, 'Berenang', 'asdasd', 'Perlu Latihan', '2022-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `childimprovement`
--

CREATE TABLE `childimprovement` (
  `id_childImprovement` int(25) NOT NULL,
  `id_biodataChild` int(11) NOT NULL,
  `prenatal` text DEFAULT NULL,
  `partus` text DEFAULT NULL,
  `post_natal` text DEFAULT NULL,
  `motoric_skill` text DEFAULT NULL,
  `language_skill` text DEFAULT NULL,
  `health_history` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `childimprovement`
--

INSERT INTO `childimprovement` (`id_childImprovement`, `id_biodataChild`, `prenatal`, `partus`, `post_natal`, `motoric_skill`, `language_skill`, `health_history`) VALUES
(1, 2, 'asd', 'das', '2022-09-14', 'ds', 'asd', 'dasdads'),
(2, 2, 'asd', 'qwe', '2022-09-13', 'qwe', 'qwe', 'qwe'),
(3, 2, 'asd', 'dddd', 'ddd', 'ddd', 'dd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `dailyhabits`
--

CREATE TABLE `dailyhabits` (
  `id_dailyHabits` int(11) NOT NULL,
  `id_biodataChild` int(11) NOT NULL,
  `bak` text DEFAULT NULL,
  `bab` text DEFAULT NULL,
  `toothBrush` text DEFAULT NULL,
  `eat` text DEFAULT NULL,
  `drinkingMilk` text DEFAULT NULL,
  `crying` text DEFAULT NULL,
  `play` text DEFAULT NULL,
  `sleep` text DEFAULT NULL,
  `etc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dailyhabits`
--

INSERT INTO `dailyhabits` (`id_dailyHabits`, `id_biodataChild`, `bak`, `bab`, `toothBrush`, `eat`, `drinkingMilk`, `crying`, `play`, `sleep`, `etc`) VALUES
(1, 2, 'Bisa', 'Diarahkan', NULL, 'Siang, sore', 'Siang', 'Bangun Tidur', 'Bola', 'Siang', 'Alergi ayam'),
(2, 2, 'qwe', 'qwe', '2022-09-29', 'asd', 'asd', 'ewqe', 'ewq', 'qwe', 'asd'),
(3, 2, 'Bisa', 'Diarahkan', 'zxczxc', 'Siang, sore', 'Siang', 'Bangun Tidur', 'Bola', 'qwe', 'Alergi ayam');

-- --------------------------------------------------------

--
-- Table structure for table `detailchild`
--

CREATE TABLE `detailchild` (
  `id_detailChild` int(25) NOT NULL,
  `id_biodataChild` int(25) NOT NULL,
  `condition` varchar(255) NOT NULL,
  `health` varchar(45) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailchild`
--

INSERT INTO `detailchild` (`id_detailChild`, `id_biodataChild`, `condition`, `health`, `date`) VALUES
(1, 1, 'Baik', 'Sering Pusing', '2022-08-29'),
(2, 4, 'Baik', 'Sering Pusing', '2022-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_profile`
--

CREATE TABLE `image_profile` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image_profile`
--

INSERT INTO `image_profile` (`id`, `id_account`, `link`) VALUES
(1, 2, '1663153952_.png'),
(2, 2, '1663154810_.png'),
(3, 3, '1663155128_.jpg'),
(4, 3, '1663155320_.png');

-- --------------------------------------------------------

--
-- Table structure for table `indicatorchild`
--

CREATE TABLE `indicatorchild` (
  `id_indicatorChild` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `dailyActivity_id_daily_activity` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_13_222016_create_biodata_user', 1),
(6, '2022_04_13_222101_create_biodata_child', 1),
(7, '2022_04_13_222120_create_transction', 1),
(8, '2022_04_13_222131_create_waiting_list', 1),
(9, '2022_04_13_222140_create_child_activity', 1),
(10, '2022_04_13_222200_create_detail_child', 1),
(11, '2022_04_13_222212_create_schedule_child', 1),
(12, '2022_04_13_222308_create_biodata_employee', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nanny`
--

CREATE TABLE `nanny` (
  `id_nanny` int(11) NOT NULL,
  `id_biodataChild` int(11) NOT NULL,
  `id_biodataEmployee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nanny`
--

INSERT INTO `nanny` (`id_nanny`, `id_biodataChild`, `id_biodataEmployee`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 2, 1),
(4, 3, 1),
(5, 4, 1);

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
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id_code_fee` int(25) NOT NULL,
  `total_attendance` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_gohome` datetime DEFAULT NULL,
  `time_come` datetime DEFAULT NULL,
  `fee` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(25) NOT NULL,
  `role_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedulechild`
--

CREATE TABLE `schedulechild` (
  `id_scheduleChild` int(25) NOT NULL,
  `id_biodataChild` int(25) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `time_come` varchar(12) DEFAULT NULL,
  `time_gohome` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedulechild`
--

INSERT INTO `schedulechild` (`id_scheduleChild`, `id_biodataChild`, `note`, `date`, `time_come`, `time_gohome`) VALUES
(1, 1, 'Mewarnai', '2022-08-16', '17:56', '17:59'),
(2, 1, 'Belajar Berenang', '2022-08-30', '16:45', '20:45'),
(3, 3, 'Biaya Kuliah', '2022-09-13', '18:00', '15:06');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(25) NOT NULL,
  `id_biodataChild` int(25) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `nominal` int(45) DEFAULT NULL,
  `link_transfer` text DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `packet` enum('month','2 weeks','days') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_biodataChild`, `date`, `nominal`, `link_transfer`, `status`, `packet`) VALUES
(3, 1, '2022-08-28 17:00:00', 200000, '-', 'Success', '2 weeks'),
(4, 1, '2022-08-28 17:00:00', 200000, '-', 'Success', '2 weeks'),
(5, 1, '2022-09-03 17:00:00', 200000, '-', 'Validation', '2 weeks'),
(6, 1, '2022-09-03 17:00:00', 200000, '-', 'Validation', '2 weeks'),
(7, 1, '2022-09-03 17:00:00', 200000, '-', 'Validation', '2 weeks'),
(8, 1, '2022-09-03 17:00:00', 200000, '1662271517_.png', 'Success', '2 weeks'),
(9, 2, '2022-09-07 17:00:00', 200000, '1662603730_.png', 'Success', '2 weeks'),
(10, 2, '2022-09-07 17:00:00', 200000, '1662605711_.png', 'Validation', '2 weeks'),
(11, 2, '2022-09-07 17:00:00', 200000, '1662605800_.png', 'Validation', '2 weeks'),
(12, 2, '2022-09-07 17:00:00', 200000, '-', 'Make Payment', '2 weeks'),
(13, 3, '2022-09-08 17:00:00', 200000, '1662710310_.png', 'Success', '2 weeks'),
(14, 4, '2022-09-13 17:00:00', 200000, '1663152911_.png', 'Success', '2 weeks');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'zxc', 'zxc@gmail.com', 2, NULL, '$2y$10$QOgdfQknaplXULU5SOVzKuVuO8LqIaOVPovcVgLCIV3AZ.4wN30cm', NULL, '2022-08-28 21:29:04', '2022-08-28 21:29:04'),
(2, 'admin', 'admin@gmail.com', 1, NULL, '$2y$10$VZjN5DzaOM6yHstxtm4XtuGBXfQL5tO2/WrLBZEu2B/f/LULvaXf2', NULL, '2022-08-28 22:36:53', '2022-08-28 22:36:53'),
(3, 'employee yuhu', 'employee@gmail.com', 3, NULL, '$2y$10$6JmMf3mv1G8yjH6F.Iq16.F770ARWyWqHBdHtpTh8l9By.6xJjhpO', NULL, '2022-08-28 23:00:49', '2022-08-28 23:00:49'),
(4, 'employee yuhu', 'employee@gmail.com', 3, NULL, '$2y$10$vVSMVAZdBTtMR4mZ3P351u6pwDa6zWib8c1rhO07/PpBdFFj/Dt1i', NULL, '2022-08-28 23:02:03', '2022-08-28 23:02:03'),
(5, 'employee yuhu', 'employee@gmail.com', 3, NULL, '$2y$10$9.SQtxWP/TYcdhjkZseNtuDx3X3hDGb4C06J/ZuGAu/C/e/SOxnEO', NULL, '2022-08-28 23:02:18', '2022-08-28 23:02:18'),
(6, 'samsudin', 'samsudin@gmail.com', 2, NULL, '$2y$10$tmEVubXsOZI4C9h7mAd/Mew/fPjc5Vt49.fbhte90n2s/iXxE21Fi', NULL, '2022-09-07 19:17:07', '2022-09-07 19:17:07'),
(7, 'testing', 'testing@gmail.com', 2, NULL, '$2y$10$nowIgnEJ2jaaELr4C4arHeKqeNX/0n3pqne0Piejtqzx.PYRvhu.m', NULL, '2022-09-09 00:57:10', '2022-09-09 00:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `waitinglist`
--

CREATE TABLE `waitinglist` (
  `id_waitingList` int(25) NOT NULL,
  `id_biodataChild` int(25) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waitinglist`
--

INSERT INTO `waitinglist` (`id_waitingList`, `id_biodataChild`, `date`, `status`) VALUES
(1, 1, '2022-08-29', 'Progress'),
(2, 1, '2022-08-29', 'Progress'),
(3, 1, '2022-09-04', 'Pending'),
(5, 3, '2022-09-09', 'Progress'),
(6, 4, '2022-09-14', 'Progress');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `assessmentiindicators`
--
ALTER TABLE `assessmentiindicators`
  ADD PRIMARY KEY (`childReporting_id_childReporting`,`IndicatorChild_assessmentIindicators`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id_attendance`);

--
-- Indexes for table `biodatachild`
--
ALTER TABLE `biodatachild`
  ADD PRIMARY KEY (`id_biodataChild`);

--
-- Indexes for table `biodataemployee`
--
ALTER TABLE `biodataemployee`
  ADD PRIMARY KEY (`id_biodataEmployee`);

--
-- Indexes for table `biodataparent`
--
ALTER TABLE `biodataparent`
  ADD PRIMARY KEY (`id_biodataParent`);

--
-- Indexes for table `childactivity`
--
ALTER TABLE `childactivity`
  ADD PRIMARY KEY (`id_childActivity`);

--
-- Indexes for table `childimprovement`
--
ALTER TABLE `childimprovement`
  ADD PRIMARY KEY (`id_childImprovement`);

--
-- Indexes for table `dailyhabits`
--
ALTER TABLE `dailyhabits`
  ADD PRIMARY KEY (`id_dailyHabits`);

--
-- Indexes for table `detailchild`
--
ALTER TABLE `detailchild`
  ADD PRIMARY KEY (`id_detailChild`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `image_profile`
--
ALTER TABLE `image_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicatorchild`
--
ALTER TABLE `indicatorchild`
  ADD PRIMARY KEY (`id_indicatorChild`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nanny`
--
ALTER TABLE `nanny`
  ADD PRIMARY KEY (`id_nanny`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id_code_fee`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `schedulechild`
--
ALTER TABLE `schedulechild`
  ADD PRIMARY KEY (`id_scheduleChild`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `waitinglist`
--
ALTER TABLE `waitinglist`
  ADD PRIMARY KEY (`id_waitingList`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id_attendance` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biodatachild`
--
ALTER TABLE `biodatachild`
  MODIFY `id_biodataChild` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `biodataemployee`
--
ALTER TABLE `biodataemployee`
  MODIFY `id_biodataEmployee` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biodataparent`
--
ALTER TABLE `biodataparent`
  MODIFY `id_biodataParent` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `childactivity`
--
ALTER TABLE `childactivity`
  MODIFY `id_childActivity` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `childimprovement`
--
ALTER TABLE `childimprovement`
  MODIFY `id_childImprovement` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dailyhabits`
--
ALTER TABLE `dailyhabits`
  MODIFY `id_dailyHabits` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detailchild`
--
ALTER TABLE `detailchild`
  MODIFY `id_detailChild` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_profile`
--
ALTER TABLE `image_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nanny`
--
ALTER TABLE `nanny`
  MODIFY `id_nanny` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedulechild`
--
ALTER TABLE `schedulechild`
  MODIFY `id_scheduleChild` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `waitinglist`
--
ALTER TABLE `waitinglist`
  MODIFY `id_waitingList` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
