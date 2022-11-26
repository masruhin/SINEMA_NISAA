-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 04:25 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kosasihlearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses_menu`
--

CREATE TABLE `akses_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `grup_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akses_menu`
--

INSERT INTO `akses_menu` (`id`, `menu_id`, `grup_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(236, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(230, 1, 2),
(14, 4, 2),
(15, 10, 2),
(16, 11, 2),
(17, 12, 2),
(18, 13, 1),
(19, 13, 2),
(20, 14, 1),
(21, 15, 1),
(64, 21, 1),
(237, 20, 1),
(251, 22, 1),
(256, 23, 1),
(255, 23, 2),
(254, 23, 3),
(257, 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `stock` int(8) NOT NULL,
  `min_stock` int(8) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga_beli` int(12) NOT NULL,
  `harga_jual` int(12) NOT NULL,
  `isDelete` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `stock`, `min_stock`, `satuan`, `harga_beli`, `harga_jual`, `isDelete`) VALUES
(1, 'BRG1', 'Harddisk', 25, 10, 'Pcs', 138000, 119000, 0),
(2, 'BRG2', 'USB', 10, 5, 'Pcs', 50000, 0, 0),
(3, 'BRG3', 'test', 50, 20, 'pcs', 10000, 0, 0),
(4, 'BRG4', 'Cap Lang', 1, 0, 'Pcs', 6000, 8000, 0),
(5, 'BRG5', 'Cap Kaki Tiga ', 100, 30, 'Pcs', 8000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_keluar` int(3) NOT NULL,
  `harga` int(12) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `id_transaksi`, `kode_barang`, `jumlah_keluar`, `harga`, `tgl_keluar`, `status`) VALUES
(1, 'K100820001', 'BRG1', 10, 145000, '2020-08-10', 'N'),
(2, 'K100820002', 'BRG1', 5, 175000, '2020-08-10', 'N'),
(3, 'K100820003', 'BRG1', 7, 130000, '2020-08-10', 'Y'),
(4, 'K100820004', 'BRG1', 12, 160000, '2020-08-10', 'Y'),
(5, 'K180820001', 'BRG1', 1, 100, '2020-08-18', 'N'),
(6, 'K180820002', 'BRG1', 1, 100000, '2020-08-18', 'N'),
(7, 'K190820001', 'BRG1', 1, 170000, '2020-08-19', 'Y'),
(8, 'K190820002', 'BRG1', 1, 120000, '2020-08-19', 'Y'),
(9, 'K230820001', 'BRG1', 1, 120000, '2020-08-23', 'Y'),
(10, 'K040822001', 'BRG1', 5, 12000, '2022-08-03', 'Y'),
(11, 'K040822002', 'BRG4', 6, 8000, '2022-08-03', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(10) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `kode_supplier` varchar(6) NOT NULL,
  `jumlah_masuk` int(3) NOT NULL,
  `harga` int(12) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_transaksi`, `kode_barang`, `kode_supplier`, `jumlah_masuk`, `harga`, `tgl_masuk`, `status`) VALUES
(1, 'M090820001', 'BRG1', 'SPL001', 20, 150000, '2020-08-09', 'Y'),
(2, 'M090820002', 'BRG1', 'SPL001', 5, 100000, '2020-08-09', 'N'),
(3, 'M090820003', 'BRG1', 'SPL001', 10, 100000, '2020-08-09', 'N'),
(4, 'M090820004', 'BRG1', 'SPL001', 30, 125000, '2020-08-09', 'Y'),
(5, 'M090820005', 'BRG1', 'SPL001', 10, 125000, '2020-08-09', 'N'),
(6, 'M090820006', 'BRG1', 'SPL001', 5, 115000, '2020-08-09', 'N'),
(7, 'M100820001', 'BRG1', 'SPL001', 1, 10000, '2022-07-10', 'Y'),
(8, 'M190820001', 'BRG1', 'SPL001', 2, 120000, '2022-07-19', 'Y'),
(9, 'M010822001', 'BRG3', 'SPL001', 50, 10000, '2022-08-01', 'Y'),
(10, 'M020822001', 'BRG5', 'SPL1', 100, 8000, '2022-08-02', 'Y'),
(11, 'M040822001', 'BRG2', 'SPL1', 10, 50000, '2022-08-04', 'Y'),
(12, 'M040822002', 'BRG4', 'SPL1', 7, 6000, '2022-08-04', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

CREATE TABLE `grup` (
  `id` int(11) NOT NULL,
  `nama_grup` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `isDelete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grup`
--

INSERT INTO `grup` (`id`, `nama_grup`, `deskripsi`, `isActive`, `isDelete`) VALUES
(1, 'Admin', 'Admin untuk mengelola website', 1, 0),
(2, 'Pimpinan', 'Pimpinan perusahaan', 1, 0),
(3, 'Super Admin', 'Akses Untuk Developer Website', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `telpon` bigint(13) NOT NULL,
  `email` varchar(256) NOT NULL,
  `instagram` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `judul` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `banner` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `telpon`, `email`, `instagram`, `alamat`, `judul`, `deskripsi`, `banner`, `logo`) VALUES
(1, 89876543210, 'anp@gmail.com', 'anp', '<p>Jl. Anugerah Niagatama Perkasa</p>', 'PT. Anugrah Niagatama Perkasa', 'Hakshdkjahsdkjhashdkj', '', '29986_apple-touch-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1',
  `induk_id` int(11) NOT NULL DEFAULT '0',
  `urutan` int(11) NOT NULL,
  `isDelete` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `nama_menu`, `url`, `icon`, `aktif`, `induk_id`, `urutan`, `isDelete`) VALUES
(1, 'Dashboard', 'dashboard', 'fas fa-tachometer-alt', 1, 0, 1, 0),
(2, 'Master', '#', 'fas fa-archive', 1, 0, 2, 0),
(3, 'Transaksi', '#', 'fas fa-money-bill-wave-alt', 1, 0, 3, 0),
(4, 'Laporan', '#', 'fas fa-print', 1, 0, 4, 0),
(5, 'Data Barang', 'data_barang', 'far fa-list-alt', 1, 2, 1, 0),
(6, 'Data Supplier', 'data_supplier', 'fas fa-users', 1, 2, 2, 0),
(7, 'Data User', 'data_user', 'far fa-user', 1, 2, 3, 0),
(8, 'Data Barang Masuk', 'data_barang_masuk', 'fas fa-download', 1, 3, 1, 0),
(9, 'Data Barang Keluar', 'data_barang_keluar', 'fas fa-upload', 1, 3, 2, 0),
(10, 'Laporan Persediaan', 'laporan_persediaan', 'far fa-file-alt', 1, 4, 1, 0),
(11, 'Laporan Barang Masuk', 'laporan_barang_masuk', 'far fa-file-alt', 1, 4, 2, 0),
(12, 'Laporan Barang Keluar', 'laporan_barang_keluar', 'far fa-file-alt', 1, 4, 3, 0),
(13, 'Logout', 'logout', 'fas fa-sign-out-alt', 1, 0, 99, 0),
(14, 'Website', '#', 'fas fa-cogs', 1, 0, 5, 0),
(15, 'Data Menu', 'data_menu', 'fas fa-list', 1, 14, 1, 0),
(20, 'Grup', 'grup', 'fas fa-layer-group', 1, 14, 2, 0),
(22, 'Konfigurasi', 'konfigurasi', 'fas fa-cog', 1, 14, 3, 0),
(23, 'Ubah Password', 'ubah_password', 'fas fa-user-lock', 1, 0, 98, 0),
(24, 'Asi', 'asi', 'home', 1, 2, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode_supplier` varchar(6) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama_supplier`, `alamat`, `telepon`) VALUES
(1, 'SPL1', 'CV Maju Mundurs', 'Jl. Rawa Bebek', '08-6732-3821');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `status` enum('aktif','non-aktif') NOT NULL,
  `grup_id` tinyint(2) NOT NULL,
  `aktif` tinyint(1) NOT NULL,
  `tema` enum('light-mode','dark-mode') NOT NULL DEFAULT 'light-mode'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama_user`, `telepon`, `status`, `grup_id`, `aktif`, `tema`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Rizki Kosasih', '0858263712', 'aktif', 1, 1, 'light-mode'),
(2, 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'setya kenandi', '0812345678', 'aktif', 2, 1, 'light-mode'),
(3, 'kosasih', '86e0f485144a4997fe4eafd190bd18c8', 'Rizki Kosasih', '019203901293', 'aktif', 3, 1, 'light-mode');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses_menu`
--
ALTER TABLE `akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`) USING BTREE,
  ADD KEY `kode_barang` (`kode_barang`),
  ADD KEY `kode_supplier` (`kode_supplier`);

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_supplier` (`kode_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses_menu`
--
ALTER TABLE `akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
