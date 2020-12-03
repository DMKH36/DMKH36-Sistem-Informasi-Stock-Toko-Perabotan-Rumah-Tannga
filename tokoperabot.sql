-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 01:37 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoperabot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(64) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_hp` varchar(20) NOT NULL,
  `admin_lastlogin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_email`, `admin_nama`, `admin_hp`, `admin_lastlogin`) VALUES
(1, 'majid', '$2y$10$Dy4ySqOiDqKisEyoKJEsl.L2psUIjeKMwmp5W3iElRQLKZF0.kKbS', 'muhammadabdulmajid6@gmail.com', 'Muhammad Abdul Majid', '081779070223', '2020-12-02 23:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `produk_merek` varchar(20) NOT NULL,
  `merek_deskripsi` text NOT NULL,
  `merek_lokasi` varchar(50) NOT NULL,
  `merek_id` varchar(64) NOT NULL,
  `merek_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`produk_merek`, `merek_deskripsi`, `merek_lokasi`, `merek_id`, `merek_logo`) VALUES
('Restking', 'Perusahaan kecil menenengah (umkm) yang berjalan dibidang produksi bantal dan guling', 'Malang', '5fc8245220395', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(255) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_hp` varchar(20) NOT NULL,
  `pengguna_alamat` text NOT NULL,
  `pengguna_username` varchar(64) NOT NULL,
  `pengguna_lastlogin` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `pesanan_id` int(11) NOT NULL,
  `produk_nama` varchar(64) NOT NULL,
  `produk_id` varchar(64) NOT NULL,
  `pesanan_nama` varchar(30) NOT NULL,
  `pesanan_hp` varchar(64) NOT NULL,
  `pesanan_alamat` text NOT NULL,
  `pesanan_tanggal` varchar(64) NOT NULL,
  `pesanan_jam` varchar(64) NOT NULL,
  `pesanan_transfer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` varchar(64) NOT NULL,
  `produk_nama` varchar(50) NOT NULL,
  `produk_harga` decimal(10,0) NOT NULL,
  `produk_gambar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `produk_kategori` varchar(50) NOT NULL,
  `produk_deskripsi` text NOT NULL,
  `produk_warna` varchar(20) NOT NULL,
  `produk_panjang` float NOT NULL,
  `produk_tinggi` float NOT NULL,
  `produk_berat` float NOT NULL,
  `produk_merek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_harga`, `produk_gambar`, `produk_kategori`, `produk_deskripsi`, `produk_warna`, `produk_panjang`, `produk_tinggi`, `produk_berat`, `produk_merek`) VALUES
('5fc8236611894', 'Bantal Sedang', '40000', 'default.jpg', 'Tempat Tidur', 'Bantal berukuran sedang yang nyaman dan empuk, terbuat dari dakron', 'Putih', 70, 25, 20, 'Restking');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`pesanan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `pesanan_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
