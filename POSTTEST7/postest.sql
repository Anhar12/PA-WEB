-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2022 at 01:15 PM
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
-- Database: `postest`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`username`, `password`, `level`) VALUES
('asep', '$2y$10$a9wYpYbeexfFP/LcAVFeXuWOK/Hu5rxJ1j86i66.C27auZ/WAng0W', ''),
('saman', '$2y$10$2QtlYfzzUyi2RRwBmYz3nOvI4bokZGDq76UF92Ygap0nZp.Myl..i', ''),
('udin', '$2y$10$akirR/zJeZNqLIGB7XHXn.RfV8SUjQ3hhhCMmJIAo/ZbosHKt5enW', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `nama` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  `spesifikasi` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`nama`, `stok`, `nama_file`, `spesifikasi`, `waktu`) VALUES
('Apple iPhone 14 Pro Max', 50, 'ipon.png', 'Rp 3.456.000\r\n1080x2400 px\r\n6/8GB RAM\r\nSnapdragon 730\r\n48MP\r\n4500mAh', '2022-10-28 17:55:00'),
('Asus ROG Phone ZS600KL', 50, 'rog.jpg', 'Rp8500000\r\n1080x2160 px\r\n8GB RAM\r\nSnapdragon 845\r\n12MP\r\n4000mAh', '2022-11-02 19:32:00'),
('Oppo Reno8 Pro', 40, 'oppo.png', 'Rp 3.456.000 \r\n1080x2412 px\r\n8/12GB RAM\r\nDimensity 8100-Max\r\n50MP\r\n4500mAh', '2022-10-28 17:59:00'),
('Realme GT Neo 3T', 45, 'realme.png', 'Rp 3.456.000 \r\n1080x2400 px\r\n6/8GB RAM\r\nDimensity 920\r\n50MP\r\n4500mAh', '2022-10-28 17:59:00'),
('Samsung Galaxy A71', 49, 'samsung.png', 'Rp 3.456.000  \r\n1080x2400 px\r\n6/8GB RAM\r\nSnapdragon 730\r\n48MP\r\n4500mAh', '2022-10-28 17:58:00'),
('Vivo V25 Pro Max', 45, 'vivo.png', 'Rp 3.456.000 \r\n1080x2376 px\r\n8/12GB RAM\r\nDimensity 1300\r\n64MP\r\n4830mAh', '2022-10-28 17:58:00'),
('Xiaomi Poco X4 Pro 5G', 46, 'xiaomi.png', 'Rp 3.456.000 \r\n1080x2400 px\r\n6/8GB RAM\r\nSnapdragon 695 5G\r\n108MP\r\n5000mAh', '2022-10-28 17:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `nama`, `no_telp`, `merk`, `jumlah`, `alamat`, `metode`, `username`) VALUES
(61, 'udin penyok', '08123123123', 'Samsung Galaxy A71', 1, 'jl slebew', 'Online', 'saman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
