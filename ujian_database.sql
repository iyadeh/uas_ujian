-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2022 at 05:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email_address` varchar(150) NOT NULL,
  `admin_password` varchar(150) NOT NULL,
  `admin_verfication_code` varchar(100) NOT NULL,
  `admin_type` enum('master','sub_master') NOT NULL,
  `admin_created_on` datetime NOT NULL,
  `email_verified` enum('no','yes') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email_address`, `admin_password`, `admin_verfication_code`, `admin_type`, `admin_created_on`, `email_verified`) VALUES
(18, 'prayogarga01@gmail.com', '$2y$10$Xdfsskb3oWilkKp/cDem.OkcdqMH0vj/bf/92Dq61sdOltYCQ/yE2', 'fa422a362c60edfe281668b6887f8333', 'sub_master', '2022-02-17 17:03:08', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_peserta`
--

CREATE TABLE `jawaban_peserta` (
  `user_exam_question_answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_answer_option` enum('0','1','2','3','4') NOT NULL,
  `marks` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `question_id` int(11) NOT NULL,
  `online_exam_id` int(11) NOT NULL,
  `question_title` text NOT NULL,
  `answer_option` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`question_id`, `online_exam_id`, `question_title`, `answer_option`) VALUES
(16, 51, 'Negara yang disebut sebagai lumbung padi Asia Tenggara adalah ....', '4'),
(17, 51, 'Ibu kota negara Vietnam adalah ....', '3'),
(18, 51, 'Bunga kembang sepatu atau bunga raya merupakan bunga nasional dari ....', '2'),
(19, 51, 'ASEAN didirikan berdasarkan Deklarasi Bangkok yang ditandatangani pada tanggal ....', '2'),
(20, 51, 'Negara yang bukan termasuk penandatangan pembentukan ASEAN adalah ....', '1');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `user_id` int(11) NOT NULL,
  `user_email_address` varchar(250) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_verfication_code` varchar(100) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_gender` enum('Male','Female') NOT NULL,
  `user_address` text NOT NULL,
  `user_mobile_no` varchar(30) NOT NULL,
  `user_image` varchar(150) NOT NULL,
  `user_created_on` datetime NOT NULL,
  `user_email_verified` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`user_id`, `user_email_address`, `user_password`, `user_verfication_code`, `user_name`, `user_gender`, `user_address`, `user_mobile_no`, `user_image`, `user_created_on`, `user_email_verified`) VALUES
(7, 'prayogarga01@gmail.com', '$2y$10$038XoAuiqk7cfCqaFjeFX.bE97JeGLKXNOW6nrvZESABE2OGDh3Vq', 'fee16050f069a61cf1c90b8b4876e884', 'prayogarga', 'Male', 'bogor', '081316279341', '620e730cbb1f7.jpg', '2022-02-17 17:08:44', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_ujian`
--

CREATE TABLE `peserta_ujian` (
  `user_exam_enroll_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `attendance_status` enum('Absent','Present') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `option_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_number` int(2) NOT NULL,
  `option_title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`option_id`, `question_id`, `option_number`, `option_title`) VALUES
(29, 10, 1, 'asf'),
(30, 10, 2, 'asf'),
(31, 10, 3, 'afd'),
(32, 10, 4, 'daf'),
(33, 11, 1, 'asf'),
(34, 11, 2, 'asf'),
(35, 11, 3, 'afd'),
(36, 11, 4, 'daf'),
(37, 12, 1, 'afs'),
(38, 12, 2, 'asf'),
(39, 12, 3, 'fs'),
(40, 12, 4, 'asf'),
(41, 13, 1, 'afs'),
(42, 13, 2, 'asf'),
(43, 13, 3, 'fs'),
(44, 13, 4, 'asf'),
(45, 14, 1, 'af'),
(46, 14, 2, 'asf'),
(47, 14, 3, 'fs'),
(48, 14, 4, 'asf'),
(49, 15, 1, 'af'),
(50, 15, 2, 'asf'),
(51, 15, 3, 'fs'),
(52, 15, 4, 'asf'),
(53, 16, 1, 'Malaysia'),
(54, 16, 2, 'Laos'),
(55, 16, 3, 'Vietnam'),
(56, 16, 4, 'Thailand'),
(57, 17, 1, 'Bangkok'),
(58, 17, 2, 'Manila'),
(59, 17, 3, 'Hanoi'),
(60, 17, 4, 'Phnom Penh'),
(61, 18, 1, 'Indonesia'),
(62, 18, 2, 'Malaysia'),
(63, 18, 3, 'Thailand'),
(64, 18, 4, 'Vietnam'),
(65, 19, 1, '7 Agustus 1967'),
(66, 19, 2, '8 Agustus 1967'),
(67, 19, 3, '9 agustus 1967'),
(68, 19, 4, '10 Agustus 1967'),
(69, 20, 1, 'Brunei Darussalam'),
(70, 20, 2, 'Singapura'),
(71, 20, 3, 'Thailand'),
(72, 20, 4, 'Filipina');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `online_exam_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `online_exam_title` varchar(250) NOT NULL,
  `online_exam_datetime` datetime NOT NULL,
  `online_exam_duration` varchar(30) NOT NULL,
  `total_question` int(5) NOT NULL,
  `marks_per_right_answer` varchar(30) NOT NULL,
  `marks_per_wrong_answer` varchar(30) NOT NULL,
  `online_exam_created_on` datetime NOT NULL,
  `online_exam_status` enum('Pending','Created','Started','Completed') NOT NULL,
  `online_exam_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`online_exam_id`, `admin_id`, `online_exam_title`, `online_exam_datetime`, `online_exam_duration`, `total_question`, `marks_per_right_answer`, `marks_per_wrong_answer`, `online_exam_created_on`, `online_exam_status`, `online_exam_code`) VALUES
(51, 18, 'IPS', '2022-02-20 08:10:00', '5', 5, '1', '1', '2022-02-17 17:10:31', 'Pending', 'f07d62d3e1bacab942ae80a336c8877b'),
(52, 18, 'IPA', '2022-02-17 00:14:00', '5', 5, '1', '1', '2022-02-17 17:14:50', 'Pending', 'd46466851eb60e6eb53180f44eee1a65'),
(53, 18, 'MTK', '2022-02-19 20:15:00', '5', 5, '1', '1', '2022-02-17 17:15:21', 'Pending', 'c1bdb1129f31cbb7f0dcc9afb5034cdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  ADD PRIMARY KEY (`user_exam_question_answer_id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `peserta_ujian`
--
ALTER TABLE `peserta_ujian`
  ADD PRIMARY KEY (`user_exam_enroll_id`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`online_exam_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jawaban_peserta`
--
ALTER TABLE `jawaban_peserta`
  MODIFY `user_exam_question_answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peserta_ujian`
--
ALTER TABLE `peserta_ujian`
  MODIFY `user_exam_enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `online_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
