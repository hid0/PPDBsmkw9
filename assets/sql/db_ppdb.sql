-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2020 at 08:38 PM
-- Server version: 10.1.41-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `data_casis`
--

CREATE TABLE `data_casis` (
  `id_casis` int(11) NOT NULL,
  `id_reg` int(11) NOT NULL,
  `nama_lengkap` varchar(121) NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `ttl` varchar(121) NOT NULL,
  `agama` varchar(121) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_tinggal` varchar(121) NOT NULL,
  `transportasi` varchar(121) NOT NULL,
  `hp` varchar(121) NOT NULL,
  `email` varchar(121) NOT NULL,
  `nama_ayah` varchar(121) NOT NULL,
  `pekerjaan_ayah` varchar(121) NOT NULL,
  `nama_ibu` varchar(121) NOT NULL,
  `pekerjaan_ibu` varchar(121) NOT NULL,
  `nama_wali` varchar(121) NOT NULL,
  `pekerjaan_wali` varchar(121) NOT NULL,
  `anakke` varchar(121) NOT NULL,
  `saudara` varchar(121) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `tanggal` varchar(121) NOT NULL,
  `jam` varchar(121) NOT NULL,
  `homepage` varchar(121) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`tanggal`, `jam`, `homepage`, `keterangan`) VALUES
('Senin , 26 Maret 2018', '09:00 WIB', 'http://workspace.kinal/ppdbnew/ujian', 'Ujian online Pendaftaran Siswa Baru SMK WALISONGO JEPARA, &quot;Senin , 26 Maret 2018&quot; Jam 09:00 WIB Dikerjakan dimana seja secara online. \r\n\r\nlink : http://workspace.kinal/ppdbnew/ujian');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_un`
--

CREATE TABLE `nilai_un` (
  `id_un` int(11) NOT NULL,
  `id_casis` int(11) NOT NULL,
  `id_reg` int(11) NOT NULL,
  `mtk` float NOT NULL,
  `bindo` float NOT NULL,
  `bing` float NOT NULL,
  `ipa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(10, 'Faiz Hidayatulloh', 'faiz', 'd321c195ab96c75a811d4ee3dc15b7e999195a3f', 1, 'user1-128x128.jpg', 'skin-purple', 'super-admin'),
(11, 'Mokh. Faris', 'faris', '40e15b60947665dc4be5fc4ede58d41863fcc3fe', 3, 'avatar4.png', 'skin-green', 'tata-usaha');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_bayar` int(11) NOT NULL,
  `id_casis` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `setor` int(15) NOT NULL,
  `saldo` int(15) NOT NULL,
  `petugas` enum('Administrator','Keuangan','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id_reg` int(11) NOT NULL,
  `jenis_pendaftaran` enum('baru','pindahan') NOT NULL,
  `tgl_dftr` date NOT NULL,
  `jalur_pendaftaran` enum('umum','khusus') NOT NULL,
  `jalur_DaftarKhusus` enum('yatim','mts/smp w9','saudara 1 unit','pa/pi guru/karyawan','pilih KT','tahfidz') DEFAULT NULL,
  `jurusan1` varchar(121) NOT NULL,
  `jurusan2` varchar(121) NOT NULL,
  `asal_sekolah` varchar(121) NOT NULL,
  `alamat_asal_sekolah` text NOT NULL,
  `no_nik` varchar(121) NOT NULL,
  `password_login` varchar(200) NOT NULL,
  `prestasi_akademik` text NOT NULL,
  `prestasi_nonakademik` text NOT NULL,
  `status` enum('lulus','tidak') NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `trespass`
--

CREATE TABLE `trespass` (
  `id_tp` int(11) NOT NULL,
  `id_casis` int(11) NOT NULL,
  `merokok` enum('IYA','TIDAK') NOT NULL,
  `bertato` enum('IYA','TIDAK') NOT NULL,
  `bk` enum('IYA','TIDAK') NOT NULL,
  `bw` enum('IYA','TIDAK') NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `info0` varchar(255) DEFAULT NULL,
  `info1` varchar(255) DEFAULT NULL,
  `info2` varchar(255) DEFAULT NULL,
  `info3` varchar(255) DEFAULT NULL,
  `info4` varchar(255) DEFAULT NULL,
  `info5` varchar(255) DEFAULT NULL,
  `rekom` enum('inisiatif sendiri','keluarga','teman','siswa SMK','alumni SMK','guru SMK') NOT NULL,
  `nm_siswa` varchar(30) DEFAULT NULL,
  `nm_guru` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_casis`
--
ALTER TABLE `data_casis`
  ADD PRIMARY KEY (`id_casis`);

--
-- Indexes for table `nilai_un`
--
ALTER TABLE `nilai_un`
  ADD PRIMARY KEY (`id_un`);

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
  ADD KEY `id_casis` (`id_casis`),
  ADD KEY `id_casis_2` (`id_casis`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id_reg`);

--
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trespass`
--
ALTER TABLE `trespass`
  ADD PRIMARY KEY (`id_tp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_casis`
--
ALTER TABLE `data_casis`
  MODIFY `id_casis` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nilai_un`
--
ALTER TABLE `nilai_un`
  MODIFY `id_un` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trespass`
--
ALTER TABLE `trespass`
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `byr` FOREIGN KEY (`id_casis`) REFERENCES `data_casis` (`id_casis`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
