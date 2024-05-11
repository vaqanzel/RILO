-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 11:28 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailpesanan`
--

CREATE TABLE `detailpesanan` (
  `idDetailPesanan` int(11) NOT NULL,
  `idPesanan` int(11) NOT NULL,
  `idMenu` char(3) NOT NULL,
  `quantity` int(11) NOT NULL,
  `hargaSatuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailpesanan`
--

INSERT INTO `detailpesanan` (`idDetailPesanan`, `idPesanan`, `idMenu`, `quantity`, `hargaSatuan`) VALUES
(2, 0, '', 3, 30000),
(3, 2, '', 7, 70000),
(4, 4, '', 5, 50000),
(5, 5, '', 8, 80000),
(7, 10, 'DAU', 3, 45000),
(8, 11, '', 40, 400000),
(9, 12, 'DAU', 3, 45000),
(10, 13, 'DAU', 10, 150000),
(11, 14, '6S1', 5, 25000),
(12, 15, '6S1', 5, 25000),
(13, 16, '6S1', 5, 25000),
(14, 17, 'NHO', 3, 45000),
(15, 18, 'NHO', 7, 105000),
(16, 19, '6S1', 6, 30000),
(17, 20, 'NHO', 4, 60000),
(18, 21, '6S1', 6, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `kategorimenu`
--

CREATE TABLE `kategorimenu` (
  `idKategoriMenu` char(3) NOT NULL,
  `namaKategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorimenu`
--

INSERT INTO `kategorimenu` (`idKategoriMenu`, `namaKategori`) VALUES
('K01', 'Makanan'),
('R02', 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` char(3) NOT NULL,
  `namaMenu` varchar(50) NOT NULL,
  `Harga` int(11) NOT NULL,
  `idKategoriMenu` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `namaMenu`, `Harga`, `idKategoriMenu`) VALUES
('6S1', 'donat', 5000, 'K01'),
('DAU', 'americano', 15000, 'K01'),
('EA2', 'Latte', 20000, 'R02'),
('NHO', 'Caramel Machiato', 15000, 'R02'),
('OS2', 'Hotdog', 10000, 'K01'),
('PDN', 'Croffle', 12500, 'K01');

-- --------------------------------------------------------

--
-- Table structure for table `metodepembayaran`
--

CREATE TABLE `metodepembayaran` (
  `idMetodePembayaran` char(3) NOT NULL,
  `metodePembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metodepembayaran`
--

INSERT INTO `metodepembayaran` (`idMetodePembayaran`, `metodePembayaran`) VALUES
('M01', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `pelayan`
--

CREATE TABLE `pelayan` (
  `idPelayan` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `noTelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelayan`
--

INSERT INTO `pelayan` (`idPelayan`, `nama`, `alamat`, `noTelp`) VALUES
('aaa4', 'didit', 'malang', '085855564943');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idPembayaran` varchar(10) NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `idMetodePembayaran` char(5) NOT NULL,
  `idPesanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idPembayaran`, `totalHarga`, `bayar`, `kembalian`, `idMetodePembayaran`, `idPesanan`) VALUES
('IMAW8AYCC2', 30000, 40000, 10000, 'M01', 21);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `idPembeli` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`idPembeli`, `nama_pembeli`) VALUES
(12, 'dani'),
(14, 'yesaya');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `idPesanan` int(11) NOT NULL,
  `tanggalPesanan` date NOT NULL,
  `idPembeli` int(11) NOT NULL,
  `idPelayan` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`idPesanan`, `tanggalPesanan`, `idPembeli`, `idPelayan`) VALUES
(21, '2024-05-28', 14, 'aaa4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  ADD PRIMARY KEY (`idDetailPesanan`),
  ADD KEY `idPesanan` (`idPesanan`,`idMenu`) USING BTREE;

--
-- Indexes for table `kategorimenu`
--
ALTER TABLE `kategorimenu`
  ADD PRIMARY KEY (`idKategoriMenu`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`),
  ADD KEY `idKategoriMenu` (`idKategoriMenu`) USING BTREE;

--
-- Indexes for table `metodepembayaran`
--
ALTER TABLE `metodepembayaran`
  ADD PRIMARY KEY (`idMetodePembayaran`);

--
-- Indexes for table `pelayan`
--
ALTER TABLE `pelayan`
  ADD PRIMARY KEY (`idPelayan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idPembayaran`),
  ADD KEY `idPesanan` (`idPesanan`),
  ADD KEY `idMetodePembayaran` (`idMetodePembayaran`) USING BTREE;

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`idPembeli`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`idPesanan`),
  ADD KEY `idPembeli` (`idPembeli`,`idPelayan`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpesanan`
--
ALTER TABLE `detailpesanan`
  MODIFY `idDetailPesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `idPembeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `idPesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
