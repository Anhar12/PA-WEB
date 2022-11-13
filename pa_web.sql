-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 11:28 AM
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
(6, 2, 4, 'Bank BNI', 4, 12000000, '2022-11-10 22:34:10', 'Bapak Budi', 'menunggu'),
(8, 2, 5, 'Bank BCA', 4, 16000000, '2022-11-06 16:33:13', 'Ibu Budi', 'gagal'),
(11, 2, 2, 'GOPAY', 4, 14000000, '2022-11-07 13:18:43', 'Teman Budi', 'berhasil'),
(18, 2, 6, 'Bank BCA', 5, 25000000, '2022-11-12 15:33:36', 'Budi', 'berhasil'),
(19, 2, 18, 'Bank Mandiri', 1, 6500000, '2022-11-12 03:28:09', 'Ibu Budi', 'menunggu'),
(20, 2, 16, 'Bank BCA', 3, 18000000, '2022-11-12 15:33:57', 'Bapak Budi', 'gagal');

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
(1, 'Samsung Galaxy A71', 3000000, 'Tingkat Menengah', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis explicabo sapiente, necessitatibus velit ipsum maiores sit veritatis nam, vel facere eaque fugiat neque quibusdam cumque iure, doloremque saepe temporibus. Vel!', 10, '2022-11-10 22:19:57', 'Samsung Galaxy A71.png'),
(2, 'Oppo Reno8 Pro', 4000000, 'Tingkat Menengah', 'Layar OLED', 9, '2022-11-07 22:22:49', 'Oppo Reno8 Pro.png'),
(3, 'Realme GT Neo 3T', 2500000, 'Tingkat Menengah', 'Ram 16GB', 9, '2022-11-04 17:40:26', 'Realme GT Neo 3T.png'),
(4, 'Xiaomi Poco X4 Pro', 3000000, 'Tingkat Menengah', 'Kamera 48 MP', 20, '2022-11-11 03:24:56', 'Xiaomi Poco X4 Pro 5G.png'),
(5, 'Vivo V25 Pro Max', 4000000, 'Tingkat Menengah', 'Rom 128GB', 8, '2022-11-04 17:41:04', 'Vivo V25 Pro Max.png'),
(6, 'iPhone 14 Pro Max', 5000000, 'Tingkat Menengah', 'Layar 7 inch', 15, '2022-11-04 17:41:14', 'iPhone 14 Pro Max.png'),
(10, 'Asus ROG Phone 5', 7500000, 'Tingkat Atas', 'RAM 32GB', 13, '2022-11-12 02:38:39', 'Asus ROG Phone 5.png'),
(11, 'Google Pixel 7 Pro', 5000000, 'Tingkat Atas', 'Layar OLED', 10, '2022-11-12 02:39:53', 'Google Pixel 7 Pro.png'),
(12, 'Tecno Camon 19', 3000000, 'Tingkat Menengah', 'Ram 16GB', 7, '2022-11-12 03:20:42', 'Tecno Camon 19.png'),
(13, 'Infinix Zero Ultra', 1500000, 'Tingkat Bawah', 'Ram 8GB', 20, '2022-11-12 02:43:47', 'Infinix Zero Ultra.png'),
(14, 'Nokia G60 5G', 1750000, 'Tingkat Bawah', 'ROM 64GB', 17, '2022-11-12 02:44:35', 'Nokia G60 5G.png'),
(15, 'Nothing Phone 1', 2000000, 'Tingkat Bawah', 'ROM 128GB', 11, '2022-11-12 02:45:13', 'Nothing Phone 1.png'),
(16, 'OnePlus 10 Pro', 6000000, 'Tingkat Atas', 'RAM 16GB', 5, '2022-11-12 02:46:14', 'OnePlus 10 Pro.png'),
(17, 'Sony Xperia 5', 7500000, 'Tingkat Atas', 'ROM 128GB', 9, '2022-11-12 02:47:36', 'Sony Xperia 5.png'),
(18, 'Huawei Nova 9 SE', 6500000, 'Tingkat Atas', 'RAM 8GB', 13, '2022-11-12 03:15:36', 'Huawei Nova 9 SE.png');

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

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id`, `id_user`, `nama`, `email`, `saran`) VALUES
(1, 2, 'Budi', 'Budi@gmail.com', 'Uji Coba'),
(2, 2, 'Budi', 'Budi@gmail.com', 'Uji Coba'),
(3, 2, 'Budi', 'Budi@gmail.com', 'Uji Coba'),
(4, 2, 'Budi', 'Budi@gmail.com', 'Lagi Uji Coba Kotak Saran');

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
(2, 'user', 'budi', '$2y$10$VgL7j3EI6sJPGDVc306yaukM.P1qngaKMeDuzLyAxWRKldqXQOLmy', 'Budi@gmail.com', '0829933507689', 'Jalan Samarinda'),
(5, 'user', 'Asep', '$2y$10$Ufl7N5XFhcq5bqMtywLlW.RY3ua7gckqj4AhZY/pZCpGW/PgydGDG', 'asep@gmail.com', '08123', 'Jalan Balikpapan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `saran`
--
ALTER TABLE `saran`
  ADD CONSTRAINT `saran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
