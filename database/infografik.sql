-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2016 at 02:19 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infografik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `info` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_informasi`
--

INSERT INTO `tb_informasi` (`id`, `judul`, `info`, `create_at`, `update_at`) VALUES
(5, 'info ketiga', 'Mengganti asupan makanan dengan nasi merah karena nasi merah memiliki sumber karbohidrat kompleks agar anda lebih kenyang dan dapat menunda lapar.', '2016-02-25 01:42:00', '2016-02-25 07:42:00'),
(6, 'info keempat', 'Tingkatkan frekuensi makan anda menjadi 4 kali sehari atau lebih tapi kurangi porsi makan anda agar nutrisi dapat diserap tubuh dengan sempurna.', '2016-02-25 01:21:44', '2016-02-25 07:21:44'),
(7, 'info kelima', 'Makanlah bila anda merasa lapar dan jangan makan saat perut belum lapar. Dan jangan paksa perut anda makan apabila anda sudah merasa kenyang.', '2016-02-25 01:22:05', '2016-02-25 07:22:05'),
(8, 'info keenam', 'Seimbangkan Dengan Air Putih. Air putih penting untuk kesehatan dan menjaga tubuh tetap bugar. Konsumsilah air putih minimal 8 gelas per hari.', '2016-02-25 01:22:34', '2016-02-25 07:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenkel`
--

CREATE TABLE `tb_jenkel` (
  `id_jenkel` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `jenkel_create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `jenkel_update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenkel`
--

INSERT INTO `tb_jenkel` (`id_jenkel`, `gender`, `jenkel_create_at`, `jenkel_update_at`) VALUES
(1, 'PRIA', '0000-00-00 00:00:00', '2016-02-06 16:36:28'),
(2, 'WANITA', '0000-00-00 00:00:00', '2016-02-06 16:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kalori_user`
--

CREATE TABLE `tb_kalori_user` (
  `id_kalori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tinggi_badan` double NOT NULL,
  `berat_badan` double NOT NULL,
  `kalori_user` double NOT NULL,
  `bmr` float NOT NULL,
  `bmi` float NOT NULL,
  `status` varchar(25) DEFAULT NULL,
  `waktu` datetime NOT NULL,
  `kal_usr_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kal_usr_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kalori_user`
--

INSERT INTO `tb_kalori_user` (`id_kalori`, `id_user`, `tinggi_badan`, `berat_badan`, `kalori_user`, `bmr`, `bmi`, `status`, `waktu`, `kal_usr_update`, `kal_usr_create`) VALUES
(28, 57, 165.6, 53.5, 2087.524438, 0, 0, '0', '2016-02-18 15:27:42', '2016-02-18 02:27:45', '2016-02-18 01:47:37'),
(33, 57, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', '2016-02-19 11:21:59', '0000-00-00 00:00:00'),
(36, 53, 165, 58, 2137.4516625, 1554.51, 21.3039, 'Normal', '2016-03-09 15:26:14', '2016-03-09 08:26:17', '0000-00-00 00:00:00'),
(38, 53, 165, 58, 2409.490965, 1554.51, 21.3039, 'Normal', '2016-03-09 09:48:50', '2016-03-08 20:48:53', '0000-00-00 00:00:00'),
(40, 53, 165, 58, 2409.490965, 1554.51, 21.3039, 'Normal', '2016-03-08 21:00:58', '2016-03-08 08:01:01', '0000-00-00 00:00:00'),
(41, 53, 165, 58, 2409.490965, 1554.51, 21.3039, 'Normal', '2016-03-08 21:01:03', '2016-03-08 08:01:06', '0000-00-00 00:00:00'),
(42, 53, 165, 58, 2409.490965, 1554.51, 21.3039, 'Normal', '2016-03-08 21:01:09', '2016-03-08 08:01:11', '0000-00-00 00:00:00'),
(43, 53, 165, 58, 2409.490965, 1554.51, 21.3039, 'Normal', '2016-03-08 21:01:14', '2016-03-08 08:01:16', '0000-00-00 00:00:00'),
(44, 59, 166, 55, 2374.24164, 0, 0, '0', '2016-02-19 21:03:18', '2016-02-19 14:03:42', '2016-02-19 08:03:42'),
(45, 53, 170, 70, 2704.0463, 1744.55, 24.2215, 'Normal', '2016-03-08 21:01:19', '2016-03-08 08:01:21', '2016-02-19 08:53:19'),
(46, 54, 165.6, 53.5, 2087.524438, 0, 0, '0', '2016-02-20 12:03:42', '2016-02-19 23:04:00', '2016-02-19 08:54:10'),
(47, 59, 165.6, 80, 2883.073594, 0, 0, '0', '2016-02-22 16:22:14', '2016-02-22 09:22:26', '2016-02-22 03:22:26'),
(49, 53, 175, 80, 2955.971675, 1907.08, 26.1224, 'Berat Badan Berlebih', '2016-03-08 21:01:24', '2016-03-08 08:01:26', '2016-02-22 23:44:02'),
(50, 62, 165.6, 53.5, 2318.226624, 0, 0, '0', '2016-02-18 13:23:46', '2016-02-24 15:19:44', '2016-02-24 09:19:44'),
(51, 64, 165, 55, 2090.0144375, 0, 0, '0', '2016-02-24 23:33:01', '2016-02-24 10:33:14', '2016-02-24 10:32:12'),
(52, 48, 165, 55, 2345.546025, 1513.26, 20.202, 'Normal', '2016-03-09 15:29:38', '2016-03-09 08:29:46', '2016-03-01 23:48:13'),
(53, 53, 165, 55, 2345.546025, 1513.26, 20.202, 'Normal', '2016-03-08 21:01:34', '2016-03-08 08:01:36', '2016-03-05 23:58:28'),
(54, 53, 165, 30, 1812.671525, 1169.47, 11.0193, 'Berat Badan Sangat Kurang', '2016-03-08 21:12:47', '2016-03-08 08:12:50', '2016-03-08 07:48:44'),
(55, 53, 165, 55, 1815.9066, 1513.26, 20.202, 'Normal', '2016-03-08 20:48:30', '2016-03-08 13:57:20', '2016-03-08 07:57:20'),
(56, 53, 165, 55, 2345.546025, 1513.26, 20.202, 'Normal', '2016-03-08 21:13:15', '2016-03-08 14:13:25', '2016-03-08 08:13:25'),
(57, 53, 165, 55, 2080.7263125, 1513.26, 20.202, 'Normal', '2016-03-08 23:07:24', '2016-03-08 16:08:01', '2016-03-08 10:08:01'),
(61, 53, 165, 60, 2165.9804375, 1575.26, 22.0386, 'Normal', '2016-03-09 00:16:12', '2016-03-08 17:16:27', '2016-03-08 11:16:27'),
(62, 53, 165, 55, 1815.9066, 1513.26, 20.202, 'Normal', '2016-03-09 00:24:57', '2016-03-08 17:25:25', '2016-03-08 11:25:25'),
(63, 53, 145, 45, 1530.8082, 1275.67, 21.4031, 'Normal', '2016-03-09 00:26:34', '2016-03-08 17:26:47', '2016-03-08 11:26:47'),
(64, 53, 165, 55, 2345.546025, 1513.26, 20.202, 'Normal', '2016-03-09 09:40:16', '2016-03-09 02:40:32', '2016-03-08 20:40:32'),
(65, 68, 165, 55, 2158.769475, 1392.75, 20.202, 'Normal', '2016-03-12 18:01:49', '2016-03-12 11:02:09', '2016-03-12 03:33:26'),
(66, 69, 169, 60, 2244.353345, 1447.97, 21.0077, 'Normal', '2016-03-12 10:38:39', '2016-03-12 03:38:53', '2016-03-12 03:38:53'),
(67, 81, 165, 55, 2345.546025, 1513.26, 20.202, 'Normal', '2016-03-13 12:09:54', '2016-03-13 05:10:10', '2016-03-13 05:10:10'),
(68, 81, 170, 1, 1094.0677, 795.686, 0.346021, 'Berat Badan Sangat Kurang', '2016-03-15 07:39:37', '2016-03-15 00:39:54', '2016-03-15 00:39:54'),
(69, 81, 170, 50, 1763.4168, 1469.51, 17.301, 'Berat Badan Kurang', '2016-03-15 07:42:35', '2016-03-15 00:42:55', '2016-03-15 00:42:55'),
(71, 81, 165, 80, 2553.4375625, 1857.05, 29.3848, 'Berat Badan Berlebih', '2016-03-15 07:43:22', '2016-03-15 00:43:33', '2016-03-15 00:43:33'),
(72, 81, 110, 90, 2063.256, 1719.38, 74.3802, 'Obesitas', '2016-03-15 07:43:55', '2016-03-15 00:44:03', '2016-03-15 00:44:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jenis_kelamin` int(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(3) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nama_user` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text,
  `umur` int(2) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `jenis_kelamin`, `email`, `role`, `update_at`, `create_at`, `nama_user`, `tempat_lahir`, `tgl_lahir`, `alamat`, `umur`, `foto`) VALUES
(47, 'hafidzzakkyd', '0ce39f78d16cab3888366d5f4f5485eb', 1, 'admin@infografik.com', 1, '2016-03-08 14:07:16', '2016-02-21 21:11:08', 'Hafidz Zakky D', 'Pekalongan', '1995-10-28', 'Jl. K.H. Ahmad Dahlan No. 25 Pekalongan', 20, 'user-hafidzzakkyd.JPG'),
(48, 'ighfarega', '0ce39f78d16cab3888366d5f4f5485eb', 1, 'egaighfar@rocketmail.com', 1, '2016-03-09 08:33:06', '2016-02-24 05:06:27', 'M Ighfar Ega', 'Semarang', '2016-02-19', 'Semarang', 0, 'user-ighfarega.jpg'),
(53, 'aryakusuma', '0ce39f78d16cab3888366d5f4f5485eb', 1, 'aryakusuma@gmail.com', 2, '2016-03-13 02:15:54', '2016-02-11 04:48:41', 'Arya Kusuma', 'Pekalongan', '1995-02-02', 'Jl. Sadewa I no 59 Semarang tengah', 20, 'user-aryakusuma.jpg'),
(54, 'aryakus', '0ce39f78d16cab3888366d5f4f5485eb', 1, 'aryakus@gmail.com', 1, '2016-03-02 11:22:20', '2016-02-22 03:13:10', 'Arya Kusuma', 'Jogja', '1995-01-01', 'Semarang', 0, 'user-aryakus.jpg'),
(57, 'petris', '56847a9d91e91f6f733ab604d51e1ef3', 2, 'petris@gmail.com', 2, '2016-03-02 19:55:12', '2016-02-19 00:26:15', 'Patricia briliani', 'semarang', '1995-01-01', 'semarang', 27, 'user-petris.jpg'),
(59, 'sufiardhi', '68f64946f7044d4af59b3654e25a036f', 1, 'sufi@gmail.com', 2, '2016-03-02 19:58:27', '2016-02-18 06:33:25', 'M Sufi Ardhi', 'Semarang', '1995-11-01', 'Semarang', 0, 'user-sufiardhi.jpg'),
(61, 'suhartono', '0ce39f78d16cab3888366d5f4f5485eb', 1, 'tono@gmail.com', 2, '2016-03-02 21:28:56', '2016-02-22 17:24:47', 'SuharTono', 'Semarang', '1995-11-01', 'boyolali', 0, 'user-suhartono.jpg'),
(62, 'mencoba', '0ce39f78d16cab3888366d5f4f5485eb', 1, 'mencoba@gmail.com', 2, '2016-03-02 19:57:43', '2016-02-24 06:52:05', 'mencoba', 'Semarang', '1995-12-30', 'Semarang', 0, 'user-mencoba.jpg'),
(64, 'herry', 'ac883542d6f5f3299ae59d1c6012eb47', 1, 'herybustami@yahoo.com', 2, '2016-03-13 02:44:53', '2016-02-24 10:30:51', 'Sri Heri Bustami', 'rumah', '1997-04-09', 'jl. sadewa 1', 19, 'user-herry.jpg'),
(66, 'fauziiii', '0ce39f78d16cab3888366d5f4f5485eb', 1, 'fauzi@gmail.com', 2, '2016-03-13 02:44:07', '2016-03-03 01:55:47', 'Fauzi Aryanto', 'asdasdasd', '2016-03-03', '', 0, 'user-fauziiii.jpg'),
(68, 'gitaamalia', '0ce39f78d16cab3888366d5f4f5485eb', 2, 'amaliagit@gmail.com', 2, '2016-03-12 10:55:17', '2016-03-12 03:26:24', 'Gita Amalia', 'Pekalongan', '1995-05-01', '', 0, 'user-gitaamalia.jpg'),
(69, 'saras', '0ce39f78d16cab3888366d5f4f5485eb', 2, 'krusita@gmail.com', 2, '2016-03-12 04:08:05', '2016-03-12 03:38:10', 'Krusita Sarasati', 'Batang', '2016-03-12', '', 0, 'user-saras.jpg'),
(76, 'ikhsan', '0ce39f78d16cab3888366d5f4f5485eb', 1, 'maulanaikhsan@gmail.com', 2, '2016-03-12 06:32:46', '2016-03-12 06:32:46', 'maulana ikhsan', '', '2016-03-12', '', 0, 'default.jpg'),
(80, 'aliyah', '0ce39f78d16cab3888366d5f4f5485eb', 1, 'all_yeah@gmail.com', 2, '2016-03-13 02:57:52', '2016-03-13 02:57:52', 'Aliyah Hasan', '', '2016-03-13', '', 0, 'default.jpg'),
(81, 'hazard', '0ce39f78d16cab3888366d5f4f5485eb', 1, 'hafidzzakkyd@gmail.com', 2, '2016-03-13 05:14:24', '2016-03-13 05:09:53', 'Hafidz Zakky Darmawan', 'Pekalongan', '1995-10-28', 'Jl.Sadewa I no.59 Semarang Tengah', 0, 'user-hazard.jpg'),
(82, 'aryafis', '0ce39f78d16cab3888366d5f4f5485eb', 1, 'aryafis@gmail.com', 2, '2016-03-15 06:50:16', '2016-03-15 06:50:15', 'aryafis', '', '2016-03-15', '', 0, 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_role`
--

CREATE TABLE `tb_user_role` (
  `id_role` int(11) NOT NULL,
  `level` varchar(30) NOT NULL,
  `create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user_role`
--

INSERT INTO `tb_user_role` (`id_role`, `level`, `create`, `update`) VALUES
(1, 'administrator', '0000-00-00 00:00:00', '2016-02-02 09:40:57'),
(2, 'user', '0000-00-00 00:00:00', '2016-02-02 09:40:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenkel`
--
ALTER TABLE `tb_jenkel`
  ADD PRIMARY KEY (`id_jenkel`);

--
-- Indexes for table `tb_kalori_user`
--
ALTER TABLE `tb_kalori_user`
  ADD PRIMARY KEY (`id_kalori`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_jenkel`
--
ALTER TABLE `tb_jenkel`
  MODIFY `id_jenkel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_kalori_user`
--
ALTER TABLE `tb_kalori_user`
  MODIFY `id_kalori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `tb_user_role`
--
ALTER TABLE `tb_user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
