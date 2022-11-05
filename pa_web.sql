-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2022 at 12:06 PM
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
-- Database: `pa web`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_produk` int(10) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `keterangan_waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `atas_nama` varchar(100) NOT NULL,
  `status` enum('menunggu','berhasil','gagal') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_produk`, `metode_pembayaran`, `jumlah`, `total_harga`, `keterangan_waktu`, `atas_nama`, `status`) VALUES
(1, 2, 3, 'Bank Mandiri', 2, 2500000, '2022-11-05 04:45:47', 'Budi Bersaudara', 'berhasil');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(10) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `stock` int(10) NOT NULL,
  `keterangan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `kategori`, `deskripsi`, `stock`, `keterangan`, `gambar`) VALUES
(1, 'Samsung Galaxy A71', 2000000, 'Tingkat Menengah', 'Baterai 4800 mAh', 10, '2022-11-04 17:39:58', 'Samsung Galaxy A71.png'),
(2, 'Oppo Reno8 Pro', 3500000, 'Tingkat Menengah', 'Ram 8GB', 9, '2022-11-04 17:40:17', 'Oppo Reno8 Pro.png'),
(3, 'Realme GT Neo 3T', 2500000, 'Tingkat Menengah', 'Ram 16GB', 9, '2022-11-04 17:40:26', 'Realme GT Neo 3T.png'),
(4, 'Xiaomi Poco X4 Pro 5G', 3000000, 'Tingkat Menengah', 'Kamera 48 MP', 11, '2022-11-04 17:40:52', 'Xiaomi Poco X4 Pro 5G.png'),
(5, 'Vivo V25 Pro Max', 4000000, 'Tingkat Menengah', 'Rom 128GB', 8, '2022-11-04 17:41:04', 'Vivo V25 Pro Max.png'),
(6, 'iPhone 14 Pro Max', 5000000, 'Tingkat Menengah', 'Layar 7 inch', 15, '2022-11-04 17:41:14', 'iPhone 14 Pro Max.png');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` int(16) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `username`, `password`, `email`, `no_hp`, `alamat`) VALUES
(1, 'admin', 'Admin', '$2y$10$bvdmErPmkZyz4FCAuahdP.UUF8WR7zMK.B0IuRJ.Xgli6zOvIJQpq', 'Admin@gmail.com', 2147483647, 'Jalan Balikpapan'),
(2, 'user', 'Budi', '$2y$10$mNu6eIbduQ9WkfzWW6B86.Bws.fG5CA428rTcZ4DgK35Pc737hbc.', 'Budi@gmail.com', 2147483647, 'Jalan Samarinda');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
