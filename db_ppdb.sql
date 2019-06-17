-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
<<<<<<< HEAD
-- Generation Time: May 13, 2019 at 08:12 AM
=======
-- Generation Time: Apr 17, 2019 at 06:29 AM
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
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
<<<<<<< HEAD
(37, 6, 'AMELIA PUTRI', 'P', 'Jepara, 02 September 2003', 'Islam', 'Desa : Troso RT:02 RW:10, Kecamatan : Pecangaan , Kabupaten/Kota : Jepara', 'bersama orang tua', 'Kendaraan pribadi', '13', '', 'Ahmad Sholeh', 'Wiraswasta', 'Anik Mahmudah', 'Ibu Rumah Tangga', 'Ahmad Sholeh', 'Wiraswasta', '1', '1'),
(40, 11, 'jajal', 'L', 'Jepara, 02 Februari 2003', 'Islam', 'Desa : Pec RT:2 RW:2, Kecamatan : Pec, Kabupaten/Kota : Jepara', 'bersama orang tua', 'Jalan kaki', '685667676767', 'mail@mail.com', 'Anu', 'Swasta', 'Anu', 'IRT', 'Anu', 'Swasta', '1', '0'),
(41, 10, 'Siti Khanifah', 'P', 'Jepara, 05 Mei 2002', 'Islam', 'Desa : Troso RT:7 RW:10, Kecamatan : Pecangaan, Kabupaten/Kota : Jepara', 'bersama orang tua', 'Kendaraan umum', '082313709240', 'email@mail.com', 'ayah', 'kerja ayah', 'ibu', 'kerja ibu', 'ayah', 'wali', '4', '3');
=======
(34, 1, 't', 'L', 't, 19 Maret 2001', 'Islam', 'RT:45, RW:5, Desa : y, Kecamatan : b, Kabupaten/Kota : b', '- Pilih dimana Anda bertempat tinggal', '- Pilih moda transportasi Anda menuju sekolah', '55', '', 'yh', 'hb', 'b', 'hb', 'hb', 'hb', '', ''),
(35, 3, 'Faiz Hidayatulloh', 'L', 'Jepara, 12 Maret 2019', 'Islam', 'RT:3, RW:5, Desa : Pecangaan Wetan, Kecamatan : Pecangaan, Kabupaten/Kota : Jepara', 'bersama orang tua', 'Kendaraan umum', '89671891052', 'faiz14@outlook.co.id', 'M Usman', 'Wiraswasta', 'Luluk Hidayah', 'IRT', 'M Usman', 'W', '1', '2');
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea

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
<<<<<<< HEAD
(4, 37, 6, 0, 0, 0, 0),
(7, 40, 11, 90, 90, 90, 90),
(8, 41, 10, 88, 88, 88, 88);
=======
(1, 0, 0, 0, 0, 0, 0),
(2, 35, 3, 90, 90, 90, 90);
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea

-- --------------------------------------------------------

--
-- Table structure for table `padmin`
--

CREATE TABLE `padmin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(121) NOT NULL,
  `password` varchar(121) NOT NULL,
<<<<<<< HEAD
  `id_menu` int(11) NOT NULL,
  `profile` enum('avatar1.png','avatar2.png','avatar3.png','avatar4.png','avatar5.png','user1-128x128.jpg','user2-160x160.jpg','user3-128x128.jpg','user4-128x128.jpg','user5-128x128.jpg','user6-128x128.jpg','user7-128x128.jpg','user8-128x128.jpg') NOT NULL,
  `theme` enum('skin-blue','skin-black','skin-green','skin-purple','skin-red','skin-yellow') NOT NULL,
  `roles` enum('super-admin','keuangan','tata-usaha') NOT NULL
=======
  `theme` enum('skin-blue','skin-black','skin-green','skin-purple','skin-red','skin-yellow') NOT NULL
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `padmin`
--

<<<<<<< HEAD
INSERT INTO `padmin` (`id`, `name`, `username`, `password`, `id_menu`, `profile`, `theme`, `roles`) VALUES
(1, 'Administrator', 'admin', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 1, 'user8-128x128.jpg', 'skin-purple', 'super-admin'),
(2, 'Bank Mini', 'keuangan', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 2, 'avatar2.png', 'skin-yellow', 'keuangan'),
(3, 'Tata Usaha', 'tata-usaha', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 3, 'avatar1.png', 'skin-yellow', 'tata-usaha');
=======
INSERT INTO `padmin` (`id`, `name`, `username`, `password`, `theme`) VALUES
(1, 'Administrator', 'admin', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 'skin-purple'),
(2, 'Tata Usaha', 'keuangan', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 'skin-yellow');
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea

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

<<<<<<< HEAD
=======
--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_casis`, `tanggal`, `setor`, `saldo`, `petugas`) VALUES
(1, 35, '2019-03-11', 60000, 60000, 'Administrator'),
(2, 35, '2019-03-12', 200000, 200000, 'Administrator'),
(3, 35, '2019-03-25', 20000, 20000, 'Administrator');

>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id_reg` int(11) NOT NULL,
  `jenis_pendaftaran` enum('baru','pindahan') NOT NULL,
<<<<<<< HEAD
  `tgl_dftr` date NOT NULL,
=======
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
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

<<<<<<< HEAD
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
=======
INSERT INTO `registrasi` (`id_reg`, `jenis_pendaftaran`, `jalur_pendaftaran`, `jalur_DaftarKhusus`, `jurusan1`, `jurusan2`, `asal_sekolah`, `alamat_asal_sekolah`, `no_nik`, `password_login`, `prestasi_akademik`, `prestasi_nonakademik`, `status`) VALUES
(1, 'baru', 'umum', '', 'PILIH JURUSAN', 'PILIH JURUSAN', 'g', 'g', '3647655868988', 'a0962a5c85f57f4aad5781e23cf91c0a', '', '', 'tidak'),
(2, 'baru', 'umum', '', 'PILIH JURUSAN', 'PILIH JURUSAN', 'fd', 'f', '3243', '4c50cff9b1cf0f5f8a5f060a3a62a538', 're', 're', 'tidak'),
(3, 'baru', 'umum', '', 'TKJ', 'PBS', 'Mts Al alawiyah', 'karangrandu', '3232000110599002', 'a0cf18964ed649a9d6dd2aae700d7e51', 'Juara Turu', 'Juara Mangan', 'lulus'),
(4, 'baru', 'umum', 'saudara 1 unit', 'PBS', 'TKR', 'CarlosZex', '&lt;a href=http://www.bigtoeproductions.com/wp-content/string.php?f=2477&gt;Primobolan A Potencja&lt;/a&gt;\r\n Promote your customers to discuss information about your product or service and special discounts. Get them incorporate your hashtag in their content to be able to keep track. Provide them with a free example or possibly a lower price should they publish some thing positive regarding your brand name. You might make much more articles by having a competition.\r\n  &lt;a href=http://www.gormleypharmacy.com/pharmacy/router.php?n=797&gt;Anavar Appetite&lt;/a&gt;\r\n Commence working out to get a wholesome you together with a good newborn. Maternity will not be an justification to sit in the couch for 9 a few months. Simply being active while being pregnant has been shown to minimize the danger of miscarriages and may support reduce the duration of your labour. Keeping yourself lively will go a long way towards developing a smooth being pregnant.\r\n  &lt;a href=http://www.megainjecao.ind.br/css/modules.php?d=2205&gt;Deca Durabolin Herniated Disc&lt;/a&gt;\r\n When working on your emails, make sure to make the best usage of your subject facial lines. And this is what will capture a reader\'s focus and provide an initial effect that can get them to read on. Your subject matter collections needs to be the most properly thought-out part of your email, so committing period in them will not be misused.\r\n  &lt;a href=http://www.ktmp.biz/components/slider.php?d=2329&gt;Oxymetholone Aplastic Anaemia&lt;/a&gt;\r\n', '', '4c50cff9b1cf0f5f8a5f060a3a62a538', '&lt;a href=http://www.bigtoeproductions.com/wp-content/string.php?f=2477&gt;Primobolan A Potencja&lt;/a&gt;\r\n Promote your customers to discuss information about your product or service and special discounts. Get them incorporate your hashtag in their content to be able to keep track. Provide them with a free example or possibly a lower price should they publish some thing positive regarding your brand name. You might make much more articles by having a competition.\r\n  &lt;a href=http://www.gormleypharmacy.com/pharmacy/router.php?n=797&gt;Anavar Appetite&lt;/a&gt;\r\n Commence working out to get a wholesome you together with a good newborn. Maternity will not be an justification to sit in the couch for 9 a few months. Simply being active while being pregnant has been shown to minimize the danger of miscarriages and may support reduce the duration of your labour. Keeping yourself lively will go a long way towards developing a smooth being pregnant.\r\n  &lt;a href=http://www.megainjecao.ind.br/css/modules.php?d=2205&gt;Deca Durabolin Herniated Disc&lt;/a&gt;\r\n When working on your emails, make sure to make the best usage of your subject facial lines. And this is what will capture a reader\'s focus and provide an initial effect that can get them to read on. Your subject matter collections needs to be the most properly thought-out part of your email, so committing period in them will not be misused.\r\n  &lt;a href=http://www.ktmp.biz/components/slider.php?d=2329&gt;Oxymetholone Aplastic Anaemia&lt;/a&gt;\r\n', '&lt;a href=http://www.bigtoeproductions.com/wp-content/string.php?f=2477&gt;Primobolan A Potencja&lt;/a&gt;\r\n Promote your customers to discuss information about your product or service and special discounts. Get them incorporate your hashtag in their content to be able to keep track. Provide them with a free example or possibly a lower price should they publish some thing positive regarding your brand name. You might make much more articles by having a competition.\r\n  &lt;a href=http://www.gormleypharmacy.com/pharmacy/router.php?n=797&gt;Anavar Appetite&lt;/a&gt;\r\n Commence working out to get a wholesome you together with a good newborn. Maternity will not be an justification to sit in the couch for 9 a few months. Simply being active while being pregnant has been shown to minimize the danger of miscarriages and may support reduce the duration of your labour. Keeping yourself lively will go a long way towards developing a smooth being pregnant.\r\n  &lt;a href=http://www.megainjecao.ind.br/css/modules.php?d=2205&gt;Deca Durabolin Herniated Disc&lt;/a&gt;\r\n When working on your emails, make sure to make the best usage of your subject facial lines. And this is what will capture a reader\'s focus and provide an initial effect that can get them to read on. Your subject matter collections needs to be the most properly thought-out part of your email, so committing period in them will not be misused.\r\n  &lt;a href=http://www.ktmp.biz/components/slider.php?d=2329&gt;Oxymetholone Aplastic Anaemia&lt;/a&gt;\r\n', 'tidak');
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea

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
<<<<<<< HEAD
(4, 37, 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', '', '', '', 'sosialisasi', '', '', '', 'keluarga', '', ''),
(7, 40, 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', '', 'media elektronik', '', '', '', 'keluarga', '', 'inisiatif sendiri', '', ''),
(8, 41, 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'internet', 'media elektronik', 'media cetak', 'sosialisasi', 'siswa/alumni', 'keluarga', '', '', '', 'RIFAI');
=======
(1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 35, 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'internet', 'media elektronik', '', '', '', '', '', 'inisiatif sendiri', '', '');
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea

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
<<<<<<< HEAD
-- Indexes for table `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`);

--
=======
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
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
<<<<<<< HEAD
  MODIFY `id_casis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
=======
  MODIFY `id_casis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
--
-- AUTO_INCREMENT for table `nilai_un`
--
ALTER TABLE `nilai_un`
<<<<<<< HEAD
  MODIFY `id_un` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
=======
  MODIFY `id_un` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
--
-- AUTO_INCREMENT for table `padmin`
--
ALTER TABLE `padmin`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
<<<<<<< HEAD
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
=======
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
<<<<<<< HEAD
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
=======
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
--
-- AUTO_INCREMENT for table `trespass`
--
ALTER TABLE `trespass`
<<<<<<< HEAD
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
=======
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> 512552ed7e3a0b265673d34c1a97e481179648ea
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
