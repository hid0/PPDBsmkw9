-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2019 at 06:29 AM
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
(34, 1, 't', 'L', 't, 19 Maret 2001', 'Islam', 'RT:45, RW:5, Desa : y, Kecamatan : b, Kabupaten/Kota : b', '- Pilih dimana Anda bertempat tinggal', '- Pilih moda transportasi Anda menuju sekolah', '55', '', 'yh', 'hb', 'b', 'hb', 'hb', 'hb', '', ''),
(35, 3, 'Faiz Hidayatulloh', 'L', 'Jepara, 12 Maret 2019', 'Islam', 'RT:3, RW:5, Desa : Pecangaan Wetan, Kecamatan : Pecangaan, Kabupaten/Kota : Jepara', 'bersama orang tua', 'Kendaraan umum', '89671891052', 'faiz14@outlook.co.id', 'M Usman', 'Wiraswasta', 'Luluk Hidayah', 'IRT', 'M Usman', 'W', '1', '2');

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
(1, 0, 0, 0, 0, 0, 0),
(2, 35, 3, 90, 90, 90, 90);

-- --------------------------------------------------------

--
-- Table structure for table `padmin`
--

CREATE TABLE `padmin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(121) NOT NULL,
  `password` varchar(121) NOT NULL,
  `theme` enum('skin-blue','skin-black','skin-green','skin-purple','skin-red','skin-yellow') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `padmin`
--

INSERT INTO `padmin` (`id`, `name`, `username`, `password`, `theme`) VALUES
(1, 'Administrator', 'admin', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 'skin-purple'),
(2, 'Tata Usaha', 'keuangan', '8ab7b004f4ac17eab77eebf3b0e733fa74ddbf99', 'skin-yellow');

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

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_bayar`, `id_casis`, `tanggal`, `setor`, `saldo`, `petugas`) VALUES
(1, 35, '2019-03-11', 60000, 60000, 'Administrator'),
(2, 35, '2019-03-12', 200000, 200000, 'Administrator'),
(3, 35, '2019-03-25', 20000, 20000, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id_reg` int(11) NOT NULL,
  `jenis_pendaftaran` enum('baru','pindahan') NOT NULL,
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

INSERT INTO `registrasi` (`id_reg`, `jenis_pendaftaran`, `jalur_pendaftaran`, `jalur_DaftarKhusus`, `jurusan1`, `jurusan2`, `asal_sekolah`, `alamat_asal_sekolah`, `no_nik`, `password_login`, `prestasi_akademik`, `prestasi_nonakademik`, `status`) VALUES
(1, 'baru', 'umum', '', 'PILIH JURUSAN', 'PILIH JURUSAN', 'g', 'g', '3647655868988', 'a0962a5c85f57f4aad5781e23cf91c0a', '', '', 'tidak'),
(2, 'baru', 'umum', '', 'PILIH JURUSAN', 'PILIH JURUSAN', 'fd', 'f', '3243', '4c50cff9b1cf0f5f8a5f060a3a62a538', 're', 're', 'tidak'),
(3, 'baru', 'umum', '', 'TKJ', 'PBS', 'Mts Al alawiyah', 'karangrandu', '3232000110599002', 'a0cf18964ed649a9d6dd2aae700d7e51', 'Juara Turu', 'Juara Mangan', 'lulus'),
(4, 'baru', 'umum', 'saudara 1 unit', 'PBS', 'TKR', 'CarlosZex', '&lt;a href=http://www.bigtoeproductions.com/wp-content/string.php?f=2477&gt;Primobolan A Potencja&lt;/a&gt;\r\n Promote your customers to discuss information about your product or service and special discounts. Get them incorporate your hashtag in their content to be able to keep track. Provide them with a free example or possibly a lower price should they publish some thing positive regarding your brand name. You might make much more articles by having a competition.\r\n  &lt;a href=http://www.gormleypharmacy.com/pharmacy/router.php?n=797&gt;Anavar Appetite&lt;/a&gt;\r\n Commence working out to get a wholesome you together with a good newborn. Maternity will not be an justification to sit in the couch for 9 a few months. Simply being active while being pregnant has been shown to minimize the danger of miscarriages and may support reduce the duration of your labour. Keeping yourself lively will go a long way towards developing a smooth being pregnant.\r\n  &lt;a href=http://www.megainjecao.ind.br/css/modules.php?d=2205&gt;Deca Durabolin Herniated Disc&lt;/a&gt;\r\n When working on your emails, make sure to make the best usage of your subject facial lines. And this is what will capture a reader\'s focus and provide an initial effect that can get them to read on. Your subject matter collections needs to be the most properly thought-out part of your email, so committing period in them will not be misused.\r\n  &lt;a href=http://www.ktmp.biz/components/slider.php?d=2329&gt;Oxymetholone Aplastic Anaemia&lt;/a&gt;\r\n', '', '4c50cff9b1cf0f5f8a5f060a3a62a538', '&lt;a href=http://www.bigtoeproductions.com/wp-content/string.php?f=2477&gt;Primobolan A Potencja&lt;/a&gt;\r\n Promote your customers to discuss information about your product or service and special discounts. Get them incorporate your hashtag in their content to be able to keep track. Provide them with a free example or possibly a lower price should they publish some thing positive regarding your brand name. You might make much more articles by having a competition.\r\n  &lt;a href=http://www.gormleypharmacy.com/pharmacy/router.php?n=797&gt;Anavar Appetite&lt;/a&gt;\r\n Commence working out to get a wholesome you together with a good newborn. Maternity will not be an justification to sit in the couch for 9 a few months. Simply being active while being pregnant has been shown to minimize the danger of miscarriages and may support reduce the duration of your labour. Keeping yourself lively will go a long way towards developing a smooth being pregnant.\r\n  &lt;a href=http://www.megainjecao.ind.br/css/modules.php?d=2205&gt;Deca Durabolin Herniated Disc&lt;/a&gt;\r\n When working on your emails, make sure to make the best usage of your subject facial lines. And this is what will capture a reader\'s focus and provide an initial effect that can get them to read on. Your subject matter collections needs to be the most properly thought-out part of your email, so committing period in them will not be misused.\r\n  &lt;a href=http://www.ktmp.biz/components/slider.php?d=2329&gt;Oxymetholone Aplastic Anaemia&lt;/a&gt;\r\n', '&lt;a href=http://www.bigtoeproductions.com/wp-content/string.php?f=2477&gt;Primobolan A Potencja&lt;/a&gt;\r\n Promote your customers to discuss information about your product or service and special discounts. Get them incorporate your hashtag in their content to be able to keep track. Provide them with a free example or possibly a lower price should they publish some thing positive regarding your brand name. You might make much more articles by having a competition.\r\n  &lt;a href=http://www.gormleypharmacy.com/pharmacy/router.php?n=797&gt;Anavar Appetite&lt;/a&gt;\r\n Commence working out to get a wholesome you together with a good newborn. Maternity will not be an justification to sit in the couch for 9 a few months. Simply being active while being pregnant has been shown to minimize the danger of miscarriages and may support reduce the duration of your labour. Keeping yourself lively will go a long way towards developing a smooth being pregnant.\r\n  &lt;a href=http://www.megainjecao.ind.br/css/modules.php?d=2205&gt;Deca Durabolin Herniated Disc&lt;/a&gt;\r\n When working on your emails, make sure to make the best usage of your subject facial lines. And this is what will capture a reader\'s focus and provide an initial effect that can get them to read on. Your subject matter collections needs to be the most properly thought-out part of your email, so committing period in them will not be misused.\r\n  &lt;a href=http://www.ktmp.biz/components/slider.php?d=2329&gt;Oxymetholone Aplastic Anaemia&lt;/a&gt;\r\n', 'tidak');

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
(1, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, 35, 'TIDAK', 'TIDAK', 'TIDAK', 'TIDAK', 'internet', 'media elektronik', '', '', '', '', '', 'inisiatif sendiri', '', '');

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
  MODIFY `id_casis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `nilai_un`
--
ALTER TABLE `nilai_un`
  MODIFY `id_un` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `padmin`
--
ALTER TABLE `padmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `trespass`
--
ALTER TABLE `trespass`
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
