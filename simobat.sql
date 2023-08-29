-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 29, 2023 at 08:27 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simobat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_obat`
--

CREATE TABLE `tb_jenis_obat` (
  `id_jenis_obat` int(11) NOT NULL,
  `nama_jenis_obat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_jenis_obat`
--

INSERT INTO `tb_jenis_obat` (`id_jenis_obat`, `nama_jenis_obat`) VALUES
(1, 'Jenis 1'),
(4, 'Jenis 2'),
(3, 'Jenis 3'),
(5, 'Jenis 4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` int(11) NOT NULL,
  `id_jenis_obat` int(11) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `satuan` varchar(64) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal_expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `id_jenis_obat`, `nama_obat`, `satuan`, `harga`, `stok`, `tanggal_expired`) VALUES
(1, 1, 'Obat Satu', 'tablet', 10000, 5000, '2024-08-29'),
(3, 3, 'Obat Tiga', 'tga', 3000, 9000, '2023-08-07'),
(4, 5, 'Obat Empat', 'empt', 5400, 1200, '2023-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `fullname`, `is_active`) VALUES
(1, 'superadmin', '$2y$10$x9w0JLrqqSy6/M/F9g2JzuKO/Q293EMZZgHzD9tsrexxFDbKyrXwu', 'Super Admin', 1),
(3, 'davidleandro', '$2y$10$gRc4LAZ94eEy4WC2ydRX/eKObX2yMvRgWIPNp0ZpJC8rUPcRQNuDO', 'David Leandro Wibisono', 1),
(4, 'jokoo', '$2y$10$JRAZZOhy706HVEjOeHK5m..l7CmhedJ.xo3JgRBp32BOnGCPCa1Py', 'Joko', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jenis_obat`
--
ALTER TABLE `tb_jenis_obat`
  ADD PRIMARY KEY (`id_jenis_obat`),
  ADD UNIQUE KEY `tb_jenis_obat_pk2` (`nama_jenis_obat`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `tb_user_pk2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jenis_obat`
--
ALTER TABLE `tb_jenis_obat`
  MODIFY `id_jenis_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
