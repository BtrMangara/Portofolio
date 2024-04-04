-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 06:39 PM
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
-- Database: `db_tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `harga_produk` int(11) DEFAULT NULL,
  `deskripsi_produk` longtext NOT NULL,
  `stok_produk` int(11) DEFAULT NULL,
  `gambar_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `stok_produk`, `gambar_produk`) VALUES
(1, 'Shoulder Bag Wanita - 4A By 7ssansrce', 159000, '<p>* Shoulder Bag Wanita- 4A By 7ssansrce * </p>\r\n<p>Holla, kali ini kita mengeluarkan produk kedua dari 7ssansrce yaitu Shoulder Bag</p>\r\n<p>Shoulder Bag dari 7ssansrce menggunakan kain dengan bahan pilihan terbaik dan menghadirkan beberapa pilihan warna,</p>\r\n<p>Shoulder Bag dari 7ssansrce menggunakan bahan satin polos yang mengkilap serta memberikan warna yang lebih variatif. T</p>\r\n<p>ersedia 4 varian warna dari produk kedua ini :</p>\r\n<p>Aura : Blue Electric Satin</p>\r\n<p>Arla : Black Satin</p>\r\n<p>Arca : Seaweed Satin</p>\r\n<p>Aira : Emerald Green Satin</p>\r\n<p>Confidence is the key!</p>\r\n<p>Chin up! xoxo</p>\r\n<p>7ssansrce</p>', 112, '617-287-aira.png'),
(2, 'Shoulder Bag Wanita - 4A By 7ssansrce', 159000, '<p>* Shoulder Bag Wanita- 4A By 7ssansrce *</p>\r\n<p><br>Holla, kali ini kita mengeluarkan produk kedua dari 7ssansrce yaitu Shoulder Bag</p>\r\n<p>Shoulder Bag dari 7ssansrce menggunakan kain dengan bahan pilihan terbaik dan menghadirkan beberapa pilihan warna,</p>\r\n<p>Shoulder Bag dari 7ssansrce menggunakan bahan satin polos yang mengkilap serta memberikan warna yang lebih variatif. T</p>\r\n<p>ersedia 4 varian warna dari produk kedua ini :</p>\r\n<p>Aura : Blue Electric Satin</p>\r\n<p>Arla : Black Satin</p>\r\n<p>Arca : Seaweed Satin</p>\r\n<p>Aira : Emerald Green Satin</p>\r\n<p>Confidence is the key!</p>\r\n<p>Chin up! xoxo</p>\r\n<p>7ssansrce</p>', 12, '485-778-arca.png'),
(3, 'Shoulder Bag Wanita - 4A By 7ssansrce', 159000, '<p>* Shoulder Bag Wanita- 4A By 7ssansrce *</p>\r\n<p><br>Holla, kali ini kita mengeluarkan produk kedua dari 7ssansrce yaitu Shoulder Bag</p>\r\n<p>Shoulder Bag dari 7ssansrce menggunakan kain dengan bahan pilihan terbaik dan menghadirkan beberapa pilihan warna,</p>\r\n<p>Shoulder Bag dari 7ssansrce menggunakan bahan satin polos yang mengkilap serta memberikan warna yang lebih variatif. T</p>\r\n<p>ersedia 4 varian warna dari produk kedua ini :</p>\r\n<p>Aura : Blue Electric Satin</p>\r\n<p>Arla : Black Satin</p>\r\n<p>Arca : Seaweed Satin</p>\r\n<p>Aira : Emerald Green Satin</p>\r\n<p>Confidence is the key!</p>\r\n<p>Chin up! xoxo</p>\r\n<p>7ssansrce</p>', 1, '817-zelia1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `email`, `nama`, `password`) VALUES
(1, 'admin1@admin.com', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `kode_pemesanan` varchar(255) DEFAULT NULL,
  `tanggal_pesanan` varchar(255) DEFAULT NULL,
  `id_pemesan` int(11) DEFAULT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `no_telp` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `barang_pesanan` varchar(255) NOT NULL,
  `jumlah_pesanan` varchar(11) DEFAULT NULL,
  `total_harga` varchar(255) DEFAULT NULL,
  `status` enum('Menunggu Konfirmasi','Sedang Dikirim','Selesai','') DEFAULT NULL,
  `no_resi` varchar(255) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `kode_pemesanan`, `tanggal_pesanan`, `id_pemesan`, `nama_pemesan`, `no_telp`, `provinsi`, `kabupaten`, `kecamatan`, `kode_pos`, `alamat`, `barang_pesanan`, `jumlah_pesanan`, `total_harga`, `status`, `no_resi`, `bukti_pembayaran`) VALUES
(1, '7SRC - 7102', '04-04-2024', 1, 'admin', '213131313', 'Sumatera Utara', 'Malang', 'Medan Helvetia', '201424', 'Bersama 1', 'Shoulder Bag Wanita - 4A By 7ssansrce', '2', 'Rp 318.000,00', 'Selesai', '21313123131231', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$1LwScNZwjP2Jf6UnIb1cSuaQZRpJuGsCLJ0ltnXiF.h8nvxB1Cmwa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
