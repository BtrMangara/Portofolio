-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 05:12 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sansrce`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` longtext NOT NULL,
  `stok_produk` varchar(255) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `stok_produk`, `gambar_produk`) VALUES
(2, 'Shoulder Bag Wanita - Arca By sansrce', 99000, '<p>Holla, kali ini kita mengeluarkan produk kedua dari 7ssansrce yaitu Shoulder Bag Shoulder Bag dari 7ssansrce menggunakan kain dengan bahan pilihan terbaik dan menghadirkan beberapa pilihan warna, Shoulder Bag dari 7ssansrce menggunakan bahan satin polos yang mengkilap serta memberikan warna yang lebih variatif.</p>\r\n<p>&nbsp;</p>\r\n<p>Arca : Seaweed Satin</p>\r\n<p>&nbsp;</p>\r\n<div><strong>Confidence is the key! </strong></div>\r\n<div><strong>Chin up! xoxo </strong></div>\r\n<div><strong>7ssansrce</strong></div>', '12', '387-arca.png'),
(6, 'Tote Bag Wanita - Zisel By sansrce', 99000, '<p style=\"text-align: justify;\">Holla, kali ini kita mengeluarkan produk pertama dari 7ssansrce yaitu ToteBag Tote Bag dari 7ssansrce menghadirkan keunggulan yaitu memiliki 2 sisi dengan warna yang berbeda di setiap produk nya yang dapat di bolak-balik sesuai keinginan. 7ssansrce menggunakan kain dengan bahan pilihan terbaik dan menghadirkan beberapa pilihan warna dan motif, Tote Bag dari 7ssansrce memiliki sisi pertama yang bermotif unik dan lucu jika dipandang dan sisi kedua yang menggunakan bahan satin bridal polos yang mengkilap serta menggunakan warna yang mencolok.</p>\r\n<p style=\"text-align: justify;\">Ukuran tas : 34 cm X 40 cm</p>\r\n<p>Zisel: Polkadot navy brown - Blue satin bridal</p>\r\n<div>&nbsp;</div>\r\n<div><strong>Confidence is the key! </strong></div>\r\n<div><strong>Chin up! xoxo </strong></div>\r\n<div><strong>7ssansrce</strong></div>', '9', '505-zisel.jpg'),
(7, 'Shoulder Bag Wanita - Aira By sansrce', 99000, '<div>\r\n<p style=\"text-align: justify;\">Holla, kali ini kita mengeluarkan produk kedua dari 7ssansrce yaitu Shoulder Bag Shoulder Bag dari 7ssansrce menggunakan kain dengan bahan pilihan terbaik dan menghadirkan beberapa pilihan warna, Shoulder Bag dari 7ssansrce menggunakan bahan satin polos yang mengkilap serta memberikan warna yang lebih variatif.</p>\r\n<p>Aira : Emerald Green Satin</p>\r\n</div>\r\n<div>&nbsp;</div>\r\n<div><strong>Confidence is the key! </strong></div>\r\n<div><strong>Chin up! xoxo </strong></div>\r\n<div><strong>7ssansrce</strong></div>', '16', '855-aira.png'),
(8, 'Shoulder Bag Wanita - Aura By 7ssansrce', 99000, '<p style=\"text-align: justify;\">Holla, kali ini kita mengeluarkan produk kedua dari 7ssansrce yaitu Shoulder Bag Shoulder Bag dari 7ssansrce menggunakan kain dengan bahan pilihan terbaik dan menghadirkan beberapa pilihan warna, Shoulder Bag dari 7ssansrce menggunakan bahan satin polos yang mengkilap serta memberikan warna yang lebih variatif.</p>\r\n<p style=\"text-align: justify;\">Aura : Blue Electric Satin</p>\r\n<div style=\"text-align: justify;\">&nbsp;</div>\r\n<div style=\"text-align: justify;\"><strong>Confidence is the key! </strong></div>\r\n<div style=\"text-align: justify;\"><strong>Chin up! xoxo </strong></div>\r\n<div style=\"text-align: justify;\"><strong>7ssansrce</strong></div>', '8', '250-aura.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `email`, `nama`, `password`) VALUES
(1, 'admin@admin.com', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `kode_pemesanan` varchar(255) NOT NULL,
  `tanggal_pesanan` varchar(255) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `barang_pesanan` varchar(255) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `total_harga` varchar(255) NOT NULL,
  `status` enum('Menunggu Konfirmasi','Sedang Dikirim','Selesai') NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `kode_pemesanan`, `tanggal_pesanan`, `id_pemesan`, `nama_pemesan`, `no_telp`, `provinsi`, `kabupaten`, `kecamatan`, `kode_pos`, `alamat`, `barang_pesanan`, `jumlah_pesanan`, `total_harga`, `status`, `no_resi`, `bukti_pembayaran`) VALUES
(1, '7SRC - 8337', '13-07-2022', 4, 'Mangara', '087869984972', 'Sumatera Utara', 'Medan', 'Medan Helvetia', '20124', 'Komplek Taman Helvetia Indah No 5b', 'Shoulder Bag Wanita - Arca By sansrce', 3, 'Rp 297.000,00', 'Menunggu Konfirmasi', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id`, `nama`, `email`, `pesan`) VALUES
(6, 'Mangara', 'MangaraButarbutar@gmail.com', 'tolong ditambah lagi stok produk yang aira nya ka...\r\nterimakasih..');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`) VALUES
(1, 'user', 'user@user.com', '$2y$10$rt1QLXGG2jBWihjUjJR3QuZcdX3O7EKTtA.AZAjtN9n3W1CmL3m2O'),
(2, 'user2', 'user2@user.com', '$2y$10$sdRQGOlSi/yRUm5qQQRHA.JGOmaQilR6KtY1tVpX/UZSXU3pf.5A2'),
(3, 'user2', 'user2@user2.com', '$2y$10$f9pfHNZOQZEc6p7mE08yuuN.S0p./LjATfUlSGkQgSwM4DM7EGBqG'),
(4, 'Mangara', 'MangaraButarbutar@gmail.com', '$2y$10$KoD0FPKAggUKaAUjUp3gcuT1grCjkoBghGcMBHQOvToC2ZkmCWnbi'),
(5, 'butarbutar@gmai.com', '', '$2y$10$bq5gLvkfgXiHgtMI7ArNvuTy4IrLK5rb0A9R/lu9gThIeySEaKcSG'),
(6, 'butarbutar12', 'butarbutar12@gmail.com', '$2y$10$LnYkoWMaAYWMzoODCohK5ew2sWaw8ViZErWQKQGL/leISek19UDNy');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
