-- phpMyAdmin SQL Dump
-- version 4.9.2deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 11, 2020 at 08:27 AM
-- Server version: 10.3.22-MariaDB-1
-- PHP Version: 7.3.11-0ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_students`
--

CREATE TABLE `new_students` (
  `id` varchar(40) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `hp_ortu` varchar(14) NOT NULL,
  `kendaraan` varchar(30) NOT NULL,
  `ayah` varchar(35) NOT NULL,
  `kerjaan_ayah` varchar(30) NOT NULL,
  `ibu` varchar(35) NOT NULL,
  `kerjaan_ibu` varchar(30) NOT NULL,
  `wali` varchar(35) NOT NULL,
  `kerjaan_wali` varchar(30) NOT NULL,
  `jml_saudara` int(3) NOT NULL,
  `anakke` int(3) NOT NULL,
  `jalur_daftar` varchar(45) NOT NULL,
  `khusus` varchar(35) NOT NULL,
  `jur_pertama` varchar(5) NOT NULL,
  `jur_kedua` varchar(5) NOT NULL,
  `sekolah_asal` varchar(30) NOT NULL,
  `alamatnya` text NOT NULL,
  `akademik` text NOT NULL,
  `nonakademik` text NOT NULL,
  `merokok` varchar(6) NOT NULL,
  `butuh_khusus` varchar(6) NOT NULL,
  `bertato` varchar(6) NOT NULL,
  `buta_warna` varchar(6) NOT NULL,
  `yatim` varchar(6) NOT NULL,
  `kip` varchar(6) NOT NULL,
  `status` varchar(5) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_students`
--

INSERT INTO `new_students` (`id`, `nik`, `nama`, `jk`, `passwd`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`, `hp_ortu`, `kendaraan`, `ayah`, `kerjaan_ayah`, `ibu`, `kerjaan_ibu`, `wali`, `kerjaan_wali`, `jml_saudara`, `anakke`, `jalur_daftar`, `khusus`, `jur_pertama`, `jur_kedua`, `sekolah_asal`, `alamatnya`, `akademik`, `nonakademik`, `merokok`, `butuh_khusus`, `bertato`, `buta_warna`, `yatim`, `kip`, `status`, `timestamp`) VALUES
('90f5e393-3b5c-4b15-8c39-baf6e8dff6de', '3320031105990002', 'FAIZ HIDAYATULLOH', 'L', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'Jepara', '11/05/1999', 'Islam', 'Pec RT.1 RW.1, Pec, Jepara', '989898', 'Kendaraan Pribadi', 'Jan', 'Swasta', 'Jan', 'Ibu Rumah Tangga', 'Jan', 'Swasta', 2, 1, 'umum', '-Pilih Jalur Khusus-', 'TKR', 'TKJ', 'Mts', 'dklnfjdf', '', '', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'tidak', '2020-02-08 09:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `padmin`
--

CREATE TABLE `padmin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(121) NOT NULL,
  `password` varchar(121) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `profile` enum('avatar1.png','avatar2.png','avatar3.png','avatar4.png','avatar5.png','user1-128x128.jpg','user2-160x160.jpg','user3-128x128.jpg','user4-128x128.jpg','user5-128x128.jpg','user6-128x128.jpg','user7-128x128.jpg','user8-128x128.jpg') NOT NULL,
  `theme` enum('skin-blue','skin-black','skin-green','skin-purple','skin-red','skin-yellow') NOT NULL,
  `roles` enum('super-admin','keuangan','tata-usaha') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `padmin`
--

INSERT INTO `padmin` (`id`, `name`, `username`, `password`, `id_menu`, `profile`, `theme`, `roles`) VALUES
(1, 'Administrator', 'admin', '08d04420b318c336c2732b6f3f7a9e7f04743f20', 1, 'user8-128x128.jpg', 'skin-green', 'super-admin'),
(2, 'Santi Mawarni', 'santi', '3e4fc6ae741670aa40825aa6ab622520381b6356', 2, 'avatar2.png', 'skin-yellow', 'keuangan'),
(3, 'Tata Usaha', 'shohir', '58fecf057bc9bc9d4808569113f88829b7e14ff9', 3, 'user1-128x128.jpg', 'skin-blue', 'tata-usaha'),
(4, 'Siti Khanifah', 'khanif', '8f21200da746619042a2646d2b3cca4589ba8fb2', 2, 'avatar2.png', 'skin-yellow', 'keuangan'),
(5, 'Ahmad Nizar', 'nizar', '35779736edfe151b5493c3c99c7e451be5e4a1fe', 2, 'user6-128x128.jpg', 'skin-green', 'keuangan'),
(7, 'Asrori', 'asrori', '4aed7fb4eed446796c59ab3fd911e359f063ec83', 3, 'avatar3.png', 'skin-green', 'tata-usaha'),
(8, 'Muh. Syafiq', 'syafiq', 'e52b23862ac0c5a92db325ad74298c7ddcf3ddf8', 3, 'user8-128x128.jpg', 'skin-green', 'tata-usaha'),
(9, 'Ahmad Sholihul', 'ahmad', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', 3, 'avatar5.png', 'skin-green', 'tata-usaha'),
(10, 'Faiz Hidayatulloh', 'faiz', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 1, 'user8-128x128.jpg', 'skin-purple', 'super-admin'),
(11, 'Mokh. Faris', 'faris', '40e15b60947665dc4be5fc4ede58d41863fcc3fe', 3, 'avatar4.png', 'skin-green', 'tata-usaha');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tgl` date NOT NULL,
  `setor` int(11) NOT NULL,
  `petugas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `nama_tagihan` varchar(20) NOT NULL,
  `jml_tag` int(20) NOT NULL,
  `utk` enum('L','P') NOT NULL,
  `ket` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tagihan`
--

INSERT INTO `tagihan` (`id`, `nama_tagihan`, `jml_tag`, `utk`, `ket`) VALUES
(6, 'Pembiayaan Awal', 858000, 'L', 'MOPDIK (Masa Orientasi Peserta Didik); Pembelian Seragam'),
(7, 'Pembiayaan Awal', 923000, 'P', 'MOPDIK (Masa Orientasi Peserta Didik); Pembelian Seragam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `new_students`
--
ALTER TABLE `new_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `padmin`
--
ALTER TABLE `padmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_bayar`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `nik_2` (`nik`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `padmin`
--
ALTER TABLE `padmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
