-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 07:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

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
  `id_reg` int(11) NOT NULL,
  `id_pd` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `hp_ortu` varchar(14) NOT NULL,
  `hp_siswa` varchar(12) DEFAULT NULL,
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
  `khusus` varchar(35) DEFAULT NULL,
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

INSERT INTO `new_students` (`id_reg`, `id_pd`, `nik`, `nama`, `jk`, `passwd`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`, `hp_ortu`, `hp_siswa`, `kendaraan`, `ayah`, `kerjaan_ayah`, `ibu`, `kerjaan_ibu`, `wali`, `kerjaan_wali`, `jml_saudara`, `anakke`, `jalur_daftar`, `khusus`, `jur_pertama`, `jur_kedua`, `sekolah_asal`, `alamatnya`, `akademik`, `nonakademik`, `merokok`, `butuh_khusus`, `bertato`, `buta_warna`, `yatim`, `kip`, `status`, `timestamp`) VALUES
(5, '228b96fc-8437-4a45-836f-fbf81461d946', '3320021105990002', 'FAIZ HIDAYATULLOH', 'L', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'Jepara', '11/05/1999', 'Islam', 'Kulon RT.3 RW.5, Pecangaan, Jepara', '89671891052', '89671891052', 'Jalan Kaki', 'Muhammad', 'Swasta', 'Luluk', 'Ibu Rumah Tangga', 'Muhammad', 'Swasta', 2, 1, 'Umum', NULL, 'TKJ', 'TKR', 'MTs Salafiyah', 'Sowan Kidul, Pakis Aji', '', '', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'lulus', '2020-03-04 09:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `padmin`
--

CREATE TABLE `padmin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(121) NOT NULL,
  `password` varchar(121) NOT NULL,
  `profile` enum('avatar1.png','avatar2.png','avatar3.png','avatar4.png','avatar5.png','user1-128x128.jpg','user2-160x160.jpg','user3-128x128.jpg','user4-128x128.jpg','user5-128x128.jpg','user6-128x128.jpg','user7-128x128.jpg','user8-128x128.jpg') NOT NULL,
  `theme` enum('skin-blue','skin-black','skin-green','skin-purple','skin-red','skin-yellow') NOT NULL,
  `roles` enum('super-admin','keuangan','tata-usaha') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `padmin`
--

INSERT INTO `padmin` (`id`, `name`, `username`, `password`, `profile`, `theme`, `roles`) VALUES
(1, 'Administrator', 'admin', '08d04420b318c336c2732b6f3f7a9e7f04743f20', 'user8-128x128.jpg', 'skin-green', 'super-admin'),
(2, 'Santi Mawarni', 'santi', '3e4fc6ae741670aa40825aa6ab622520381b6356', 'avatar2.png', 'skin-yellow', 'keuangan'),
(4, 'Siti Khanifah', 'khanif', '8f21200da746619042a2646d2b3cca4589ba8fb2', 'avatar2.png', 'skin-yellow', 'keuangan'),
(5, 'Ahmad Nizar', 'nizar', '35779736edfe151b5493c3c99c7e451be5e4a1fe', 'user6-128x128.jpg', 'skin-green', 'keuangan'),
(7, 'Asrori', 'asrori', '4aed7fb4eed446796c59ab3fd911e359f063ec83', 'avatar3.png', 'skin-green', 'tata-usaha'),
(8, 'Muh. Syafiq', 'syafiq', 'e52b23862ac0c5a92db325ad74298c7ddcf3ddf8', 'user8-128x128.jpg', 'skin-green', 'tata-usaha'),
(9, 'Ahmad Sholihul', 'ahmad', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', 'avatar5.png', 'skin-green', 'tata-usaha'),
(10, 'Faiz Hidayatulloh', 'faiz', 'd321c195ab96c75a811d4ee3dc15b7e999195a3f', 'user8-128x128.jpg', 'skin-purple', 'super-admin'),
(11, 'Mokh. Faris', 'faris', '40e15b60947665dc4be5fc4ede58d41863fcc3fe', 'avatar4.png', 'skin-green', 'tata-usaha');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tgl` date NOT NULL,
  `setor` int(9) NOT NULL,
  `petugas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `nik`, `tgl`, `setor`, `petugas`) VALUES
(3, '3320021105990002', '2020-03-02', 100000, 'faiz'),
(5, '3320010505030001', '2020-03-04', 200000, 'faiz');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `new_students`
--
ALTER TABLE `new_students`
  ADD PRIMARY KEY (`id_reg`),
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
-- AUTO_INCREMENT for table `new_students`
--
ALTER TABLE `new_students`
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `padmin`
--
ALTER TABLE `padmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
