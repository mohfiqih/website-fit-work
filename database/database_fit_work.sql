-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 09:52 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_fit_work`
--

-- --------------------------------------------------------

--
-- Table structure for table `fit_work`
--

CREATE TABLE `fit_work` (
  `id` int(10) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `no_body` varchar(50) NOT NULL,
  `pramudi` varchar(100) NOT NULL,
  `depo` varchar(100) NOT NULL,
  `no_induk` varchar(50) NOT NULL,
  `jam_masuk` varchar(50) NOT NULL,
  `jam_keluar` varchar(50) NOT NULL,
  `jas` varchar(10) NOT NULL,
  `dasi` varchar(10) NOT NULL,
  `peci` varchar(10) NOT NULL,
  `pantofel` varchar(10) NOT NULL,
  `seragam_kerja` varchar(10) NOT NULL,
  `id_card` varchar(10) NOT NULL,
  `kip` varchar(10) NOT NULL,
  `sim` varchar(10) NOT NULL,
  `stnk` varchar(10) NOT NULL,
  `kir` varchar(10) NOT NULL,
  `kp` varchar(10) NOT NULL,
  `flazz` varchar(10) NOT NULL,
  `p3k` varchar(10) NOT NULL,
  `handsanitizer` varchar(10) NOT NULL,
  `senter` varchar(10) NOT NULL,
  `tekanan_darah` varchar(10) NOT NULL,
  `suhu_badan` varchar(10) NOT NULL,
  `alkohol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fit_work`
--

INSERT INTO `fit_work` (`id`, `hari`, `tanggal`, `no_body`, `pramudi`, `depo`, `no_induk`, `jam_masuk`, `jam_keluar`, `jas`, `dasi`, `peci`, `pantofel`, `seragam_kerja`, `id_card`, `kip`, `sim`, `stnk`, `kir`, `kp`, `flazz`, `p3k`, `handsanitizer`, `senter`, `tekanan_darah`, `suhu_badan`, `alkohol`) VALUES
(36, 'Senin', '2024-02-04', '1111', 'putt', 'Depo Cijantung', '11112222', '14:28', '', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', '100/120', '30', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rampcheck2`
--

CREATE TABLE `rampcheck2` (
  `id_ramp` int(10) NOT NULL,
  `id_fit` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `item` text NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rampcheck2`
--

INSERT INTO `rampcheck2` (`id_ramp`, `id_fit`, `kategori`, `bagian`, `item`, `kondisi`, `gambar`, `keterangan`) VALUES
(845, 36, 'Interior', 'Interior', 'Tanda Pengenal Pengemudi', 'Sesuai', '', ' -'),
(846, 36, 'Interior', 'Interior', 'Dokumen Perjalanan (SIM, STNK, KIR, Kartu Pengawasan Pengemudi, Kartu Flazz)', 'Sesuai', '', ' -'),
(847, 36, 'Interior', 'Interior', 'Indikator Lampu Peringatan', 'Sesuai', '', ' -'),
(848, 36, 'Interior', 'Interior', 'Rem Kaki', 'Sesuai', '', ' -'),
(849, 36, 'Interior', 'Interior', 'Rem Tangan', 'Sesuai', '', ' -'),
(850, 36, 'Interior', 'Interior', 'Indikator RPM Speedometer', 'Sesuai', '', ' -'),
(851, 36, 'Interior', 'Interior', 'Indikator Odometer', 'Sesuai', '', ' -'),
(852, 36, 'Interior', 'Interior', 'Kemudi Klakson', 'Sesuai', '', ' -'),
(853, 36, 'Interior', 'Interior', 'Voice Announcer', 'Sesuai', '', ' -'),
(854, 36, 'Interior', 'Interior', 'Lampu Darurat Pengemudi', 'Sesuai', '', ' -'),
(855, 36, 'Interior', 'Interior', 'CCTV Berfungsi', 'Sesuai', '', ' -'),
(856, 36, 'Interior', 'Interior', 'Lampu Senter', 'Sesuai', '', ' -'),
(857, 36, 'Interior', 'Interior', 'GPS', 'Sesuai', '', ' -'),
(858, 36, 'Interior', 'Interior', 'Air Conditioner (AC)', 'Sesuai', '', ' -'),
(859, 36, 'Interior', 'Interior', 'Kotak P3K', 'Sesuai', '', ' -'),
(860, 36, 'Interior', 'Interior', 'APAR', 'Sesuai', '', ' -'),
(861, 36, 'Interior', 'Interior', 'Lampu Penerangan Dalam', 'Sesuai', '', ' -'),
(862, 36, 'Interior', 'Interior', 'SOP Pengoprasian Kendaraan', 'Sesuai', '', ' -'),
(863, 36, 'Interior', 'Interior', 'SOP Penanganan Keadaan Darurat', 'Sesuai', '', ' -'),
(864, 36, 'Interior', 'Interior', 'Kursi Prioritas', 'Sesuai', '', ' -'),
(865, 36, 'Interior', 'Interior', 'Palu Pemecah Kaca', 'Sesuai', '', ' -'),
(866, 36, 'Interior', 'Interior', 'Tombol STOP', 'Sesuai', '', ' -');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `gambar` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `password`, `status`, `gambar`, `timestamp`) VALUES
(42, 'user_admin1', 'Admin PT', 'admin123@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Active', 'Tips-Memotret-Foto-Portrait.jpg', '2024-02-03 08:09:16'),
(45, 'user_admin2', 'Admin Dua', 'useradmin2@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Active', '', '2024-02-04 08:50:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fit_work`
--
ALTER TABLE `fit_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rampcheck2`
--
ALTER TABLE `rampcheck2`
  ADD PRIMARY KEY (`id_ramp`),
  ADD KEY `id_fit` (`id_fit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fit_work`
--
ALTER TABLE `fit_work`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rampcheck2`
--
ALTER TABLE `rampcheck2`
  MODIFY `id_ramp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=867;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
