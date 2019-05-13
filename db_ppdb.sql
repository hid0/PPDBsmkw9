-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2019 at 08:12 AM
-- Server version: 10.1.37-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u3

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

--
-- Dumping data for table `data_casis`
--

INSERT INTO `data_casis` (`id_casis`, `id_reg`, `nama_lengkap`, `jenkel`, `ttl`, `agama`, `alamat`, `tempat_tinggal`, `transportasi`, `hp`, `email`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `nama_wali`, `pekerjaan_wali`, `anakke`, `saudara`) VALUES
(37, 6, 'AMELIA PUTRI', 'P', 'Jepara, 02 September 2003', 'Islam', 'Desa : Troso RT:02 RW:10, Kecamatan : Pecangaan , Kabupaten/Kota : Jepara', 'bersama orang tua', 'Kendaraan pribadi', '13', '', 'Ahmad Sholeh', 'Wiraswasta', 'Anik Mahmudah', 'Ibu Rumah Tangga', 'Ahmad Sholeh', 'Wiraswasta', '1', '1'),
(40, 11, 'jajal', 'L', 'Jepara, 02 Februari 2003', 'Islam', 'Desa : Pec RT:2 RW:2, Kecamatan : Pec, Kabupaten/Kota : Jepara', 'bersama orang tua', 'Jalan kaki', '685667676767', 'mail@mail.com', 'Anu', 'Swasta', 'Anu', 'IRT', 'Anu', 'Swasta', '1', '0'),
(41, 10, 'Siti Khanifah', 'P', 'Jepara, 05 Mei 2002', 'Islam', 'Desa : Troso RT:7 RW:10, Kecamatan : Pecangaan, Kabupaten/Kota : Jepara', 'bersama orang tua', 'Kendaraan umum', '082313709240', 'email@mail.com', 'ayah', 'kerja ayah', 'ibu', 'kerja ibu', 'ayah', 'wali', '4', '3');

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
  `mtk` int(11) NOT NULL,
  `bindo` int(11) NOT NULL,
  `bing` int(11) NOT NULL,
  `ipa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_un`
--

INSERT INTO `nilai_un` (`id_un`, `id_casis`, `id_reg`, `mtk`, `bindo`, `bing`, `ipa`) VALUES
(4, 37, 6, 0, 0, 0, 0),
(7, 40, 11, 90, 90, 90, 90),
(8, 41, 10, 88, 88, 88, 88);

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
(1, 'Administrator', 'admin', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 1, 'user8-128x128.jpg', 'skin-purple', 'super-admin'),
(2, 'Bank Mini', 'keuangan', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 2, 'avatar2.png', 'skin-yellow', 'keuangan'),
(3, 'Tata Usaha', 'tata-usaha', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 3, 'avatar1.png', 'skin-yellow', 'tata-usaha');

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

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id_reg`, `jenis_pendaftaran`, `tgl_dftr`, `jalur_pendaftaran`, `jalur_DaftarKhusus`, `jurusan1`, `jurusan2`, `asal_sekolah`, `alamat_asal_sekolah`, `no_nik`, `password_login`, `prestasi_akademik`, `prestasi_nonakademik`, `status`) VALUES
(7, 'baru', '2019-05-11', 'umum', '', 'PBS', 'PBS', 'Smp negeri 3 kedunh', 'Kedung jepara', '3320015606030001', '9eb21523825b85ca2392aa7e8026e3cb', 'Tidak punya', 'Tidak punya', 'tidak'),
(10, 'baru', '2019-05-13', 'umum', '', 'KT', 'PBS', 'SMP Walisongo Pecangaan', 'Pecangaan Jepara', '3320024510890002', '202c62b36fe0638fbd163a051b59c45d', '', '', 'tidak'),
(11, 'baru', '2019-05-13', 'umum', '', 'TKR', 'KT', 'MTs Manbaul Ulum', 'Batealit', '3232323232300000', 'c68edf91f20c997051167cc1017c2a1f', '', '', 'tidak');

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
-- Dumping data for table `trespass`
--

INSERT INTO `trespass` (`id_tp`, `id_casis`, `merokok`, `bertato`, `bk`, `bw`, `info`, `info0`, `info1`, `info2`, `info3`, `info4`, `info5`, `rekom`, `nm_siswa`, `nm_guru`) VALUES
(4, 37, 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', '', '', '', 'sosialisasi', '', '', '', 'keluarga', '', ''),
(7, 40, 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', '', 'media elektronik', '', '', '', 'keluarga', '', 'inisiatif sendiri', '', ''),
(8, 41, 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'internet', 'media elektronik', 'media cetak', 'sosialisasi', 'siswa/alumni', 'keluarga', '', '', '', 'RIFAI');

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
  MODIFY `id_casis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `nilai_un`
--
ALTER TABLE `nilai_un`
  MODIFY `id_un` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `padmin`
--
ALTER TABLE `padmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trespass`
--
ALTER TABLE `trespass`
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
