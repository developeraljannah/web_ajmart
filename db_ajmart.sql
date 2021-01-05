-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 11:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ajmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kat_produk`
--

CREATE TABLE `tb_kat_produk` (
  `id_kat_produk` varchar(8) NOT NULL,
  `nm_kat_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kat_usaha`
--

CREATE TABLE `tb_kat_usaha` (
  `id_kat_usaha` varchar(6) NOT NULL,
  `nama_kat_usaha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_usaha` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isi_komentar` varchar(200) NOT NULL,
  `tgl_komentar` varchar(20) NOT NULL,
  `jam_komentar` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mitra`
--

CREATE TABLE `tb_mitra` (
  `id_mitra` int(11) NOT NULL,
  `nama_mitra` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `des_password` varchar(50) NOT NULL,
  `verif_code` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mitra`
--

INSERT INTO `tb_mitra` (`id_mitra`, `nama_mitra`, `password`, `des_password`, `verif_code`, `email`, `kontak`, `is_verified`) VALUES
(1, 'wildan cloud', 'e66055e8e308770492a44bf16e875127', 'Admin12345', '4a377f9bfa6adbdaee9bb75a66917cbe', 'wildancloud94@gmail.com', '085891246384', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `nm_produk` varchar(100) NOT NULL,
  `foto_produk` varchar(150) NOT NULL,
  `id_kat_produk` varchar(8) NOT NULL,
  `harga_produk` int(6) NOT NULL,
  `dimensi_produk` varchar(100) NOT NULL,
  `id_usaha` varchar(8) NOT NULL,
  `des_produk` varchar(100) NOT NULL,
  `sts_produk` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_usaha`
--

CREATE TABLE `tb_usaha` (
  `id_usaha` varchar(8) NOT NULL,
  `nm_usaha` varchar(30) NOT NULL,
  `logo_usaha` varchar(255) NOT NULL,
  `id_kat_usaha` varchar(6) NOT NULL,
  `des_usaha` varchar(50) NOT NULL,
  `link_lokasi` varchar(125) NOT NULL,
  `alamat_usaha` varchar(255) NOT NULL,
  `jam_buka` varchar(20) NOT NULL,
  `hari_buka` varchar(50) NOT NULL,
  `id_mitra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kat_produk`
--
ALTER TABLE `tb_kat_produk`
  ADD PRIMARY KEY (`id_kat_produk`);

--
-- Indexes for table `tb_kat_usaha`
--
ALTER TABLE `tb_kat_usaha`
  ADD PRIMARY KEY (`id_kat_usaha`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_usaha` (`id_usaha`);

--
-- Indexes for table `tb_mitra`
--
ALTER TABLE `tb_mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kat_produk` (`id_kat_produk`),
  ADD KEY `id_usaha` (`id_usaha`);

--
-- Indexes for table `tb_usaha`
--
ALTER TABLE `tb_usaha`
  ADD PRIMARY KEY (`id_usaha`),
  ADD KEY `id_kat_usaha` (`id_kat_usaha`),
  ADD KEY `id_mitra` (`id_mitra`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mitra`
--
ALTER TABLE `tb_mitra`
  MODIFY `id_mitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD CONSTRAINT `tb_komentar_ibfk_1` FOREIGN KEY (`id_usaha`) REFERENCES `tb_usaha` (`id_usaha`);

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_kat_produk`) REFERENCES `tb_kat_produk` (`id_kat_produk`),
  ADD CONSTRAINT `tb_produk_ibfk_2` FOREIGN KEY (`id_usaha`) REFERENCES `tb_usaha` (`id_usaha`);

--
-- Constraints for table `tb_usaha`
--
ALTER TABLE `tb_usaha`
  ADD CONSTRAINT `tb_usaha_ibfk_1` FOREIGN KEY (`id_kat_usaha`) REFERENCES `tb_kat_usaha` (`id_kat_usaha`),
  ADD CONSTRAINT `tb_usaha_ibfk_2` FOREIGN KEY (`id_mitra`) REFERENCES `tb_mitra` (`id_mitra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
