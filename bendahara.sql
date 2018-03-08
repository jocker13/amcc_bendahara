-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 03:18 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bendahara`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detailtran` int(10) NOT NULL,
  `id_tran` int(10) NOT NULL,
  `jenis` enum('pemasukan','pengeluaran','','') NOT NULL,
  `nama_sie` enum('sumber dana','konsumsi','pdd','sekretaris','p3k','humas','acara','perlengkapan','inventaris','psdm','','','','') NOT NULL,
  `nama_transaksi` varchar(20) NOT NULL,
  `banyak` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `id_nota` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estimasi`
--

CREATE TABLE `estimasi` (
  `id_estimasi` int(10) NOT NULL,
  `id_kegiatan` int(10) DEFAULT NULL,
  `jenis` enum('pemasukan','pengeluaran','','') NOT NULL,
  `nama_sie` enum('sumber dana','konsumsi','sekretaris','pdd','humas','perlengkapan','p3k','kesekretariatan','acara','','') NOT NULL,
  `nama_estimasi` varchar(20) NOT NULL,
  `banyak` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estimasi`
--

INSERT INTO `estimasi` (`id_estimasi`, `id_kegiatan`, `jenis`, `nama_sie`, `nama_estimasi`, `banyak`, `harga_satuan`) VALUES
(3, 15, 'pemasukan', 'perlengkapan', 'lembaga', 1, 1000000),
(4, NULL, 'pemasukan', 'sumber dana', 'llll', 1, 500),
(5, NULL, 'pemasukan', 'sumber dana', 'ts', 1, 15),
(6, NULL, 'pemasukan', 'sumber dana', 'asda', 0, 100),
(7, NULL, 'pemasukan', 'sumber dana', 'assa', 0, 0),
(8, 16, 'pemasukan', 'sumber dana', '1212', 1212121, 212),
(10, 17, 'pemasukan', 'sumber dana', '1', 1, 1),
(13, 17, 'pemasukan', 'sumber dana', 'saadaad', 1, 1),
(14, 15, 'pemasukan', 'sumber dana', 'lembaga mahasiswa', 1, 1000000),
(15, 15, 'pengeluaran', 'konsumsi', 'lembaga mahasiswa', 20, 1000),
(16, 15, 'pengeluaran', 'perlengkapan', 'ini', 3, 500),
(17, 15, 'pemasukan', 'sumber dana', 'uku', 26, 90),
(18, 15, 'pengeluaran', 'humas', 'hahaha', 1, 1000),
(20, 15, 'pemasukan', 'sumber dana', 'asa', 3, 12),
(21, 15, 'pemasukan', 'sumber dana', 'aye', 3, 123),
(22, 15, 'pemasukan', 'sumber dana', 'dddd', 5, 100),
(23, 17, 'pemasukan', 'sumber dana', 'da', 1, 1),
(24, 15, 'pemasukan', 'sumber dana', 'ada', 1, 1),
(25, 15, 'pemasukan', 'sumber dana', 'adad', 1, 1),
(37, 17, 'pemasukan', 'sumber dana', '21212', 11, 1),
(38, 16, 'pemasukan', 'sumber dana', '21', 21, 21),
(39, 16, 'pemasukan', 'sumber dana', '21', 0, 11),
(40, 15, 'pemasukan', 'sumber dana', '12', 12, 12),
(41, 15, 'pemasukan', 'sumber dana', 'dadad', 11, 1),
(42, 28, 'pemasukan', 'sumber dana', '1', 1, 1),
(43, 15, 'pemasukan', 'sumber dana', 'asdaddad', 21, 12),
(44, 17, 'pemasukan', 'sumber dana', '212', 1, 1),
(45, 15, 'pemasukan', 'sumber dana', 'ad', 12, 12),
(46, 16, 'pemasukan', 'sumber dana', 'adad', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` int(10) NOT NULL,
  `id_users` int(10) NOT NULL,
  `nama_kegiatan` varchar(20) NOT NULL,
  `tahun_kep` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_users`, `nama_kegiatan`, `tahun_kep`, `tanggal`) VALUES
(15, 1, 'sasa', '2019', '2018-02-21'),
(16, 1, 'asasas', '2017', '2018-02-15'),
(17, 1, 'dadad', '2018', '2018-02-22'),
(27, 1, 'adad', '2018', '2018-02-21'),
(28, 1, 'Tidur', '2019/2020', '2018-02-23'),
(29, 1, 'Ada', '2019', '2018-02-14');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(10) NOT NULL,
  `no_nota` varchar(10) NOT NULL,
  `id_kegiatan` int(10) NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `id_notabaru` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nota`
--

INSERT INTO `nota` (`id_nota`, `no_nota`, `id_kegiatan`, `gambar`, `id_notabaru`) VALUES
(5, '4', 16, '19432.jpg', NULL),
(7, '2', 15, '7319.jpg', NULL),
(13, '3', 16, '3366.jpg', NULL),
(14, '5', 16, '23911.jpg', NULL),
(15, '3', 15, '18884.jpg', NULL),
(16, '1', 16, '4363.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notabaru`
--

CREATE TABLE `notabaru` (
  `id_notabaru` int(10) NOT NULL,
  `no_nota` int(12) NOT NULL,
  `tanggal` date NOT NULL,
  `dari` varchar(20) NOT NULL,
  `institusi` varchar(30) NOT NULL,
  `penerima` varchar(20) NOT NULL,
  `uang` int(11) NOT NULL,
  `terbilang` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notabaru`
--

INSERT INTO `notabaru` (`id_notabaru`, `no_nota`, `tanggal`, `dari`, `institusi`, `penerima`, `uang`, `terbilang`, `no_telp`, `keterangan`) VALUES
(2, 2, '2018-02-06', 'Nafa Diniaah', 'AMCC', 'ino suprajo', 52000, 'Lima Puluh dua ribu rupiah', '025811', 'OPKE fafa'),
(4, 1, '2018-02-07', '1', 'AMCC', '1', 1, 'satu', '1231', '1');

-- --------------------------------------------------------

--
-- Table structure for table `realisasi`
--

CREATE TABLE `realisasi` (
  `id_realisasi` int(10) NOT NULL,
  `id_estimasi` int(10) NOT NULL,
  `jenis` enum('pemasukan','pengeluaran','','') NOT NULL,
  `nama_sie` enum('sumber dana','konsumsi','sekretaris','kesekretartaian','humas','pdd','acara','p3k','perlengkapan','') NOT NULL,
  `nama_realisasi` varchar(20) NOT NULL,
  `banyak` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `id_nota` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `realisasi`
--

INSERT INTO `realisasi` (`id_realisasi`, `id_estimasi`, `jenis`, `nama_sie`, `nama_realisasi`, `banyak`, `harga_satuan`, `id_nota`) VALUES
(1, 6, 'pemasukan', 'sumber dana', 'jagan', 1, 10000, 15),
(4, 45, 'pemasukan', 'sumber dana', 'Panda', 2, 100, 7),
(5, 43, 'pemasukan', 'sumber dana', 'Pamd', 20, 1000, 15),
(6, 45, 'pemasukan', 'sumber dana', 'jangan Pernah', 4, 700, 15),
(8, 22, 'pemasukan', 'sumber dana', 'Dadai', 20, 1000, 15),
(9, 45, 'pemasukan', 'sumber dana', 'dasd', 1, 1, 15),
(11, 46, 'pemasukan', 'sumber dana', 'fajaru', 3, 9000, 14),
(12, 39, 'pemasukan', 'sumber dana', 'ada', 1212, 31313, 13),
(13, 43, 'pemasukan', 'sumber dana', 'adad', 1, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `transaksiumum`
--

CREATE TABLE `transaksiumum` (
  `id_tran` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_transaksi` varchar(20) NOT NULL,
  `jenis` enum('pemasukan','pengeluaran','','') NOT NULL,
  `nama_sie` enum('Sumber Dana','Konsumsi','Sekretaris','PDD','Humas','Acara','Perlengkapan','P3K','Kesekretariatan') NOT NULL,
  `banyak` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `no_nota` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksiumum`
--

INSERT INTO `transaksiumum` (`id_tran`, `tanggal`, `nama_transaksi`, `jenis`, `nama_sie`, `banyak`, `harga_satuan`, `no_nota`, `saldo`) VALUES
(1, '2018-02-07', 'Sisa Dana 2015/2016', 'pemasukan', 'Sumber Dana', 1, 1000000, 1, 1000000),
(2, '2018-02-14', 'beli obat', 'pengeluaran', 'Konsumsi', 2, 500, 2, 999000),
(3, '2018-02-23', '1', 'pemasukan', 'Sumber Dana', 1, 1, 1, 999001),
(4, '2018-02-23', 'asda', 'pengeluaran', 'Sumber Dana', 2, 1000, 1, 997001),
(5, '2018-02-23', '1', 'pengeluaran', 'Sumber Dana', 1, 1, 1, 997000),
(6, '2018-02-20', '1', 'pemasukan', 'Sumber Dana', 1, 1, 1, 997001),
(7, '2018-02-23', '1', 'pemasukan', 'Perlengkapan', 1, 1, 1, 997002),
(8, '2018-02-25', 'Makan Siang', 'pengeluaran', 'Konsumsi', 23, 8000, 0, 813002),
(9, '2018-01-01', '1', 'pengeluaran', 'Sumber Dana', 1, 1, 0, 813001),
(10, '2018-02-25', 'Aku', 'pengeluaran', 'Konsumsi', 3, 100, 0, 812701),
(11, '2018-02-26', 'Makan', 'pengeluaran', 'Sumber Dana', 4, 100, 0, 812301),
(12, '2018-02-26', 'amcc', 'pemasukan', 'Sumber Dana', 100, 100, 0, 822301),
(13, '2018-02-25', 'jjjj', 'pemasukan', 'Humas', 4200, 100, 0, 1242301),
(14, '2018-02-27', 'hahahah', 'pengeluaran', 'Perlengkapan', 4, 200, 0, 1241501),
(15, '2018-02-27', 'wkwk', 'pengeluaran', 'Perlengkapan', 4, 100, 0, 1241101),
(16, '2018-02-06', 'uiii', 'pengeluaran', 'Konsumsi', 4, 100, 0, 1240701),
(17, '2018-02-27', 'hj', 'pengeluaran', 'Perlengkapan', 7, 66, 0, 1240239),
(18, '2018-02-06', '888', 'pengeluaran', 'Konsumsi', 12, 10, 0, 1240119),
(19, '2018-02-07', 'huh', 'pemasukan', 'Sumber Dana', 6, 100, 0, 1240719),
(20, '2018-02-27', 'hgh', 'pemasukan', 'Sumber Dana', 333, 3, 0, 1241718),
(21, '2018-02-14', 'rr', 'pemasukan', 'Sumber Dana', 4, 6, 0, 1241742),
(22, '2018-02-14', 'hghg', 'pemasukan', 'Sumber Dana', 45, 5, 0, 1241967),
(23, '2018-02-21', 'y', 'pemasukan', 'Sumber Dana', 54, 4, 0, 1242183),
(24, '2018-02-13', 'rrr', 'pemasukan', 'Sumber Dana', 1, 4, 0, 1242187),
(25, '2018-02-06', '1', 'pemasukan', 'Sumber Dana', 1, 1, 0, 1242188),
(26, '2018-02-28', '1', 'pemasukan', 'Sumber Dana', 1, 1, 0, 1242189),
(27, '2018-02-20', '1', 'pemasukan', 'Sumber Dana', 1, 1, 0, 1242190);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `jabatan` enum('admin','ketua','users','') NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `notelp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nim`, `nama`, `jabatan`, `password`, `email`, `notelp`) VALUES
(1, '11.11.1111', 'nafaaaaa', 'admin', '123', 'nana@gmail.com', '085743026424'),
(4, '14.12.8000', 'Galih eka tamtama', 'ketua', '123', 'hanifaisyah@gmail.com', '058648526752');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detailtran`),
  ADD KEY `id_tran` (`id_tran`),
  ADD KEY `id_nota` (`id_nota`);

--
-- Indexes for table `estimasi`
--
ALTER TABLE `estimasi`
  ADD PRIMARY KEY (`id_estimasi`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_notabaru` (`id_notabaru`);

--
-- Indexes for table `notabaru`
--
ALTER TABLE `notabaru`
  ADD PRIMARY KEY (`id_notabaru`);

--
-- Indexes for table `realisasi`
--
ALTER TABLE `realisasi`
  ADD PRIMARY KEY (`id_realisasi`),
  ADD KEY `id_estimasi` (`id_estimasi`),
  ADD KEY `no_nota` (`id_nota`);

--
-- Indexes for table `transaksiumum`
--
ALTER TABLE `transaksiumum`
  ADD PRIMARY KEY (`id_tran`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detailtran` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estimasi`
--
ALTER TABLE `estimasi`
  MODIFY `id_estimasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `nota`
--
ALTER TABLE `nota`
  MODIFY `id_nota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `notabaru`
--
ALTER TABLE `notabaru`
  MODIFY `id_notabaru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `realisasi`
--
ALTER TABLE `realisasi`
  MODIFY `id_realisasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksiumum`
--
ALTER TABLE `transaksiumum`
  MODIFY `id_tran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_tran`) REFERENCES `transaksiumum` (`id_tran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_transaksi_ibfk_2` FOREIGN KEY (`id_nota`) REFERENCES `nota` (`id_nota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `estimasi`
--
ALTER TABLE `estimasi`
  ADD CONSTRAINT `estimasi_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nota`
--
ALTER TABLE `nota`
  ADD CONSTRAINT `nota_ibfk_1` FOREIGN KEY (`id_notabaru`) REFERENCES `notabaru` (`id_notabaru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `realisasi`
--
ALTER TABLE `realisasi`
  ADD CONSTRAINT `realisasi_ibfk_2` FOREIGN KEY (`id_estimasi`) REFERENCES `estimasi` (`id_estimasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `realisasi_ibfk_3` FOREIGN KEY (`id_nota`) REFERENCES `nota` (`id_nota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
