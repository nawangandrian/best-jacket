-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2025 at 03:03 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rw_uas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(18) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_produk` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `ukuran_produk` varchar(10) NOT NULL,
  `sub_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `id_transaksi`, `id_produk`, `harga_produk`, `jumlah`, `ukuran_produk`, `sub_total`) VALUES
(271, 'TR1703686413', 1, 50000, 1, 'M', 50000),
(272, 'TR1703686413', 6, 55000, 2, 'L', 110000),
(273, 'TR1703686826', 3, 65000, 1, 'S', 65000),
(274, 'TR1703686826', 1, 50000, 1, 'M', 50000),
(277, 'TR1703687181', 2, 75000, 2, 'L', 150000),
(278, 'TR1703687181', 4, 70000, 1, 'XL', 70000),
(280, 'TR1703723331', 3, 65000, 1, 'S', 65000),
(281, 'TR1703723331', 4, 70000, 1, 'XL', 70000),
(282, 'TR1703723331', 3, 65000, 1, 'S', 65000),
(283, 'TR1703723847', 1, 50000, 1, 'M', 50000),
(284, 'TR1703723847', 1, 50000, 1, 'M', 50000),
(285, 'TR1703994816', 5, 75000, 1, 'M', 75000),
(291, 'TR1703995887', 3, 65000, 1, 'S', 65000),
(292, 'TR1704700925', 4, 70000, 1, 'XL', 70000),
(293, 'TR1704700947', 7, 10000, 2, 'M', 20000),
(294, 'TR1704700947', 3, 65000, 1, 'S', 65000),
(295, 'TR1705046175', 6, 55000, 1, 'L', 55000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `nama_pengguna` varchar(55) NOT NULL,
  `pw_pengguna` varchar(10) NOT NULL,
  `jk_pengguna` enum('Pria','Wanita') NOT NULL,
  `alamat_pengguna` text NOT NULL,
  `hak_akses` enum('Admin','Kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `pw_pengguna`, `jk_pengguna`, `alamat_pengguna`, `hak_akses`) VALUES
(1, 'alan', '123', 'Pria', 'Gebog City', 'Admin'),
(2, 'nawang', '123', 'Pria', 'Kudus', 'Kasir'),
(3, 'andrian', '123', 'Pria', 'Kudus', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` text NOT NULL,
  `jenis_produk` enum('Bomber','Hoodie','Parka','') NOT NULL,
  `ukuran_produk` enum('S','M','L','XL') NOT NULL,
  `stok_produk` int(10) NOT NULL,
  `harga_produk` int(16) NOT NULL,
  `foto_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `jenis_produk`, `ukuran_produk`, `stok_produk`, `harga_produk`, `foto_produk`) VALUES
(1, 'Yonha', 'Parka', 'M', 12, 50000, '1703287197_58da577945fe73b94863.jpeg'),
(2, 'Okrei', 'Hoodie', 'L', 5, 75000, '1703286938_7c21a851a59891f4292a.jpeg'),
(3, 'Trample', 'Bomber', 'S', 1, 65000, '1703295605_bb4da37c086b02df0144.jpeg'),
(4, 'Pions', 'Bomber', 'XL', 10, 70000, '1703638547_6030371b306508ba5f8c.jpeg'),
(5, 'BlackJ', 'Hoodie', 'M', 7, 75000, '1703638637_59267e4394a3cd4e4aa9.jpeg'),
(6, 'Copen', 'Parka', 'L', 11, 55000, '1703639109_adaca7ef403783bcbdb8.jpeg'),
(7, 'po', 'Hoodie', 'M', 1, 10000, '1704700871_b435ae9a52101a9d4c67.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(18) NOT NULL,
  `jam_transaksi` text NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `total_transaksi` int(16) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `jam_transaksi`, `tgl_transaksi`, `total_transaksi`, `id_pengguna`) VALUES
('TR1703686413', '21:13:34', '2023-12-27', 160000, 1),
('TR1703686826', '21:20:26', '2023-12-27', 115000, 1),
('TR1703687181', '21:26:21', '2023-12-27', 220000, 2),
('TR1703723331', '7:28:51', '2023-12-28', 200000, 1),
('TR1703723847', '7:37:27', '2023-12-28', 100000, 1),
('TR1703994816', '10:53:36', '2023-12-31', 75000, 1),
('TR1703995887', '11:11:27', '2023-12-31', 65000, 2),
('TR1704700925', '15:2:5', '2024-01-08', 70000, 2),
('TR1704700947', '15:2:28', '2024-01-08', 85000, 2),
('TR1705046175', '14:56:16', '2024-01-12', 55000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=296;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
