-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 06:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcd`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id_number` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contact_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_number`, `full_name`, `birthdate`, `address`, `gender`, `contact_info`) VALUES
(180, 'Indra Adityawarman', '2023-11-28', 'dsrf', 'male', '082288837886'),
(190, 'Indra Adityawarman', '2023-11-28', 'dsrf', 'male', '082288837886');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `kode_anggota` int(5) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis kelamin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_anggota` int(11) NOT NULL,
  `kode_vcd` int(11) NOT NULL,
  `tanggal_sewa` varchar(255) NOT NULL,
  `tarif_sewa` varchar(255) NOT NULL,
  `tanggal_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `kode_anggota`, `kode_vcd`, `tanggal_sewa`, `tarif_sewa`, `tanggal_pengembalian`) VALUES
(1, 190, 123, '2023-11-28', '12000', '2023-11-29'),
(2, 190, 123, '2023-11-28', '12000', '2023-11-28'),
(3, 190, 123, '2023-11-28', '12000', '2023-11-29'),
(4, 190, 123, '2023-11-28', '12000', '2023-11-29'),
(5, 190, 123, '2023-11-28', '12000', '2023-11-30'),
(6, 190, 123, '2023-11-28', '12000', '2023-11-29'),
(7, 190, 123, '2023-11-28', '12000', '2023-11-29'),
(8, 1, 123, '2023-11-19', '12000', '2023-11-26');

-- --------------------------------------------------------

--
-- Table structure for table `tb_vcd`
--

CREATE TABLE `tb_vcd` (
  `kode_vcd` int(3) NOT NULL,
  `judul_vcd` varchar(25) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_vcd`
--

INSERT INTO `tb_vcd` (`kode_vcd`, `judul_vcd`, `kategori`, `status`) VALUES
(12, 'mantap', 'tarik', 'Tersedia'),
(111, 'haha', 'bang', 'Tersedia'),
(123, 'ultraman dyna', 'ultraman', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `trn_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(1, 0, 'admin@gmail.com', 21232, '2023-11-28 17:49:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id_number`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`kode_anggota`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kode_anggota` (`kode_anggota`),
  ADD KEY `kode_vcd` (`kode_vcd`);

--
-- Indexes for table `tb_vcd`
--
ALTER TABLE `tb_vcd`
  ADD PRIMARY KEY (`kode_vcd`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
