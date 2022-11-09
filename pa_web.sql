-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 01:21 AM
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
(6, 2, 4, 'Bank BNI', 4, 10000000, '2022-11-06 15:29:17', 'Bapak Budi', 'menunggu'),
(8, 2, 5, 'Bank BCA', 4, 16000000, '2022-11-06 16:33:13', 'Ibu Budi', 'gagal'),
(9, 2, 5, 'DANA', 1, 4000000, '2022-11-06 16:33:18', 'Kakak Budi', 'berhasil'),
(11, 2, 2, 'GOPAY', 4, 14000000, '2022-11-07 13:18:43', 'Teman Budi', 'berhasil');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
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

INSERT INTO `produk` (`id_produk`, `nama`, `harga`, `kategori`, `deskripsi`, `stock`, `keterangan`, `gambar`) VALUES
(1, 'Samsung Galaxy A71', 3000000, 'Tingkat Menengah', '            Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis explicabo sapiente, necessitatibus velit ipsum maiores sit veritatis nam, vel facere eaque fugiat neque quibusdam cumque iure, doloremque saepe temporibus. Vel!', 10, '2022-11-07 22:22:24', 'Samsung Galaxy A71.png'),
(2, 'Oppo Reno8 Pro', 4000000, 'Tingkat Menengah', 'Layar OLED', 9, '2022-11-07 22:22:49', 'Oppo Reno8 Pro.png'),
(3, 'Realme GT Neo 3T', 2500000, 'Tingkat Menengah', 'Ram 16GB', 9, '2022-11-04 17:40:26', 'Realme GT Neo 3T.png'),
(4, 'Xiaomi Poco X4 Pro 5G', 3000000, 'Tingkat Menengah', 'Kamera 48 MP', 20, '2022-11-06 02:26:10', 'Xiaomi Poco X4 Pro 5G.png'),
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
  `id_user` int(10) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `role`, `username`, `password`, `email`, `no_hp`, `alamat`) VALUES
(1, 'admin', 'admin', '$2y$10$bvdmErPmkZyz4FCAuahdP.UUF8WR7zMK.B0IuRJ.Xgli6zOvIJQpq', 'Admin@gmail.com', '2147483647', 'Jalan Balikpapan'),
(2, 'user', 'budi', '$2y$10$0lpd8SeSIhGJJb1XwMlau.X10ql0q5EyJ6EsV1WLUmEyAzWRB/jXu', 'Budi@gmail.com', '082993350768', 'Jalan Samarinda');

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
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
