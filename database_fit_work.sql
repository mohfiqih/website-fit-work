-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2024 at 03:03 PM
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
  `suhu_badan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fit_work`
--

INSERT INTO `fit_work` (`id`, `hari`, `tanggal`, `no_body`, `pramudi`, `no_induk`, `jam_masuk`, `jam_keluar`, `jas`, `dasi`, `peci`, `pantofel`, `seragam_kerja`, `id_card`, `kip`, `sim`, `stnk`, `kir`, `kp`, `flazz`, `p3k`, `handsanitizer`, `senter`, `tekanan_darah`, `suhu_badan`) VALUES
(32, 'Rabu', '2024-01-24', '12345', 'Fiqih', '232324', '20:42', '', 'Ya', 'Ya', 'Ya', '', '', 'Ya', '', 'Ya', 'Ya', 'Ya', 'Ya', '', 'Ya', 'Ya', 'Ya', '100/120', '30');

-- --------------------------------------------------------

--
-- Table structure for table `rampcheck2`
--

CREATE TABLE `rampcheck2` (
  `id_ramp` int(10) NOT NULL,
  `id_fit` int(10) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `item` text NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `gambar` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rampcheck2`
--

INSERT INTO `rampcheck2` (`id_ramp`, `id_fit`, `kategori`, `item`, `kondisi`, `gambar`, `keterangan`) VALUES
(109, 32, 'Eksterior', 'Lampu sen', 'Sesuai', '', ' -'),
(110, 32, 'Interior', 'Jumlah Display', 'Tidak Sesuai', 'download.png', ' '),
(111, 32, 'Eksterior', 'Jumlah Display Berfungsi', 'Sesuai', '', ' -');

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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `full_name`, `email`, `password`, `status`, `timestamp`) VALUES
(33, 'putt123', 'putt123', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Active', '2024-01-21 12:32:28'),
(35, 'mohfiqiherinsyah', 'Moh. Fiqih Erinsyah 123', 'mohfiqiherinsyah@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Active', '2024-01-21 15:43:38'),
(41, 'putt444', 'put444', 'putt444@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Nonaktif', '2024-01-24 12:48:31');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rampcheck2`
--
ALTER TABLE `rampcheck2`
  MODIFY `id_ramp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
