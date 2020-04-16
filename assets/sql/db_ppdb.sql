-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2020 at 09:12 PM
-- Server version: 10.1.44-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u7

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
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_students`
--

INSERT INTO `new_students` (`id_reg`, `id_pd`, `nik`, `nama`, `jk`, `passwd`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat`, `hp_ortu`, `hp_siswa`, `kendaraan`, `ayah`, `kerjaan_ayah`, `ibu`, `kerjaan_ibu`, `wali`, `kerjaan_wali`, `jml_saudara`, `anakke`, `jalur_daftar`, `khusus`, `jur_pertama`, `jur_kedua`, `sekolah_asal`, `alamatnya`, `akademik`, `nonakademik`, `merokok`, `butuh_khusus`, `bertato`, `buta_warna`, `yatim`, `kip`, `status`, `timestamp`) VALUES
(7, 'e9bd8daa-1481-41a9-bcca-80744b11d39c', '0046150265', 'AULIYA ROHMAN TRI CAHYO', 'L', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'jepara', '22/06/3004', 'Islam', 'pendosawalan RT.12 RW.04, jepara, Jepara', '081229144147', '082136771437', 'Kendaraan Umum', 'nasuka', ' guru kepala sekolah', 'suyati', 'Ibu Rumah Tangga', 'nasuka', ' guru kepala sekolah', 6, 3, 'Industri', '', 'TKR', 'TKR', 'mts al khidmah', ' mts pendosawalan kidul, jepara', 'cinta saya pramugara', '', 'Tidak', 'Iya', 'Tidak', 'Iya', 'Tidak', 'Tidak', 'Tidak', '2020-03-22 13:15:19'),
(8, '4ad600cc-9514-448d-9a45-246e9fb662d4', '3320051311040003', 'REZA FATTAHUL ULUM', 'L', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'Jepara', '13/11/2004', 'Islam', 'Sumosari RT.1 RW.2, Batealit, Jepara', '82328692866', '82328692922', 'Kendaraan Pribadi', 'Subhan', 'Tukang Kayu', 'Sri Ningsih', 'Ibu Rumah Tangga', 'Subhan', 'Tukang Kayu', 1, 1, 'Umum', '', 'TKJ', 'TKJ', 'MTs NU Ibtidaul Falah', 'Samirejo, Dawe, Kudus', '', '', 'Iya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2020-03-24 03:51:09'),
(9, '5d098e88-bdab-401f-a3cc-fed16d13856c', '3320111405050004', 'AHMAD RISWAR ABDILLAH', 'L', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'Jepara', '14/05/2005', 'Islam', 'ngabul RT.2 RW.2, tahunan, Jepara', '85329835800', '8995955368', 'Kendaraan Pribadi', 'wagisan', 'wiraswasta', 'sumijah', 'Ibu Rumah Tangga', 'wagisan', 'wiraswasta', 1, 2, 'Umum', '', 'TKJ', 'TKJ', 'MTs Sultan Hadlirin', 'mantingan, Tahunan', '', '', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Iya', 'Tidak', '2020-04-01 10:57:01'),
(10, '98bd078d-fc9a-41cf-842e-4fdb50c1cf60', '3320020706050002', 'WILDAN MUJAHID', 'L', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'jepara', '07/06/2005', 'Islam', 'pecangaan kulon RT.2 RW.4, pecangaan, Jepara', '82324349766', '8995963136', 'Jalan Kaki', 'abdul chamid', 'wiraswasta', 'sulistyowati', 'Ibu Rumah Tangga', 'abdul chamid', 'wiraswasta', 2, 2, 'Umum', '', 'TKR', 'TKR', 'SMP Walisongo', 'Pecangaan Kulon, pecangaan', '-', 'Kepramukaan', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2020-04-02 11:42:08'),
(11, 'f681d9db-f095-4284-b1d1-e6a48ddf0a00', '3320022202030006', 'ZULFIKAR RIZKI', 'L', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'Jepara', '22/02/2003', 'Islam', 'Pecangaan kulon RT.2 RW.4, Pecangaan, Jepara', '82137463701', '895378130084', 'Jalan Kaki', 'Eko purnomo', 'Mekanik', 'Sulistyanti', 'Ibu Rumah Tangga', 'Eko purnomo', 'Mekanik', 4, 1, 'Umum', '', 'TKR', 'TKR', 'Smp walisongo', 'Smp walisongo, Pecangaan', '-', '-', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2020-04-02 12:41:13'),
(12, '0be90c9b-4091-4a57-a59e-e5829a794f24', '3320016901060001', 'ALYA RUSYDA', 'P', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'Jepara', '29/01/2006', 'Islam', 'Surodadi RT.14 RW.0, Kedung, Jepara', '085770375610', '', 'Kendaraan Pribadi', 'Mukhlisin', 'Wiraswasta', 'Lailatun Nasihah', 'Wiraswasta', 'Mukhlisin', 'Wiraswasta', 4, 2, 'Umum', '', 'KT', 'KT', 'SMP Islam Mafatihul Huda Pecan', 'Rengging, Pecangaan', '', '', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2020-04-04 03:37:33'),
(13, '4dd1851e-88bf-4463-b997-42a9af228587', '3320051805050001', 'ALDI RIZKI PRATAMA', 'L', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'Jepara', '18/05/2005', 'Islam', 'Raguklampitan  RT.25 RW.05, Batealit, Jepara', '81226551921', '85235936896', 'Kendaraan Pribadi', 'Sulistiyono', 'Wiraswasta', 'Dwi budi astuti', 'Ibu Rumah Tangga', 'Sulistiyono', 'Wiraswasta', 2, 1, 'Industri', '', 'TKR', 'TKR', 'SMP Walisongo', 'Pecangaan Kulon, Pecangaan', '', '\r\n', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2020-04-04 13:39:42'),
(14, '5cf1956c-366d-4ee0-b67b-0d49c9ff801b', '3320137012050004', 'NAJWA ALWAKHIRUS SANAH ', 'P', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'Jepara ', '30/12/2005', 'Islam', 'Robayan  RT.3 RW.1, Kalinyamatan , Jepara', '085325480337 ', '089636363390', 'Kendaraan Pribadi', 'Kusmihar', 'Wiraswasta', 'Zumrotun ', 'Ibu Rumah Tangga', 'Kusmihar', 'Wiraswasta', 4, 2, 'Umum', '', 'TKJ', 'PBS', 'Mts tasywiqul banat', 'Robayan , Kalinyamatan', '', '', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2020-04-04 15:51:37'),
(15, '5db4a671-36a2-4d5b-8fb4-d48554169026', '887788', 'KAMIM', 'L', 'a9c4808aa6316435a95b2f0b9c28a4a3d94adf08', 'japri', '20/04/2020', 'Protestan', 'kono RT.2 RW.36, mboh, Jepara', '888888888', '', 'Kendaraan Umum', 'saluri', 'maleng', 'tarona', 'Ibu Rumah Tangga', 'saluri', 'maleng', 96, 97, '', '', 'PBS', 'KT', 'SMP Islam Asy-Syafi\'iyah', 'projo, ndi', '\r\n\r\n\r\n\r\n\r\n\r\npro player mobelejen', '', 'Iya', 'Iya', 'Iya', 'Iya', 'Iya', 'Iya', 'Tidak', '2020-04-04 23:34:16'),
(16, '68a01ecd-0a5f-4f7c-98dd-c52705cb4bf7', '3320040707040002', 'MUHAMMAD FAJAR DWI GUNTORO', 'L', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'Jepara', '07/07/2004', 'Islam', 'Bungu RT.1 RW.2, Mayong, Jepara', '085363608332', '082137467839', 'Kendaraan Umum', 'Gunarto', 'Wiraswasta', 'Zaenah', 'Ibu Rumah Tangga', 'Gunarto', 'Wiraswasta', 3, 2, 'Umum', '', 'TKJ', 'TKJ', 'Mts Hasan Kafrawi', 'Pancur, Mayong', '', '', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2020-04-05 07:40:29'),
(17, 'ff40c7e3-6f9b-4268-8af3-a20b3c7867b5', '3320031511040002', 'DWI TAKBIRUL FAHRI', 'L', 'fc81432be61547d67a4440f79373a51d99066f90', 'Jepara', '15/11/2004', 'Islam', 'Kendeng sidialit RT.06 RW.02, Welahan, Jepara', '+62 895-0889-8', '0895-3608-27', 'Kendaraan Pribadi', 'Pamuji Slamet', 'Wiraswasta', 'Nor Hayati', 'Ibu Rumah Tangga', 'Pamuji Slamet', 'Wiraswasta', 2, 2, 'Umum', '', 'TKR', 'TKJ', 'Smp negeri 2 welahan', 'Kalipucang Wetan, Welahan', '', '', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Iya', 'Tidak', '2020-04-06 12:33:20'),
(20, '6fca5097-fdf7-4459-aa82-0cab17691e8e', '0987654321', 'CASIMIR MURRAY', 'P', '8cb2237d0679ca88db6464eac60da96345513964', 'Anthonyberg', '06/10/2019', 'Lainnya', 'desa RT.0 RW.0, Kecamatan, Ahlen', '078570504', '078570504', 'Jalan Kaki', 'Nama Ayah', 'Pekerjaan Ayah', 'Nama Ibu', 'Ibu Rumah Tangga', 'Nama Ayah', 'Pekerjaan Ayah', 3, 1, 'Umum', '', 'KT', 'KT', 'SMP Islam Darurrohman', 'Mindahan, Kedung', 'Prestasi Akademik', 'Prestasi Nonakademik', 'Iya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2020-04-07 07:58:58'),
(21, '04abb51a-68ad-4356-9996-6a7127a8c103', '12345', 'LINA', 'P', 'd33dca6b0d9530ac761c3ff8ba6108cb734ff569', 'Jepars', '12/09/2005', 'Islam', 'Pucangan wetan RT.02 RW.03, Pecangan, Jepara', '09876543423', '09876543423', 'Kendaraan Pribadi', 'Sukijan', 'Tani', 'Tukiyem', 'Tidak bekerja', 'Sukijan', 'Tani', 2, 1, 'Umum', '', 'TKJ', 'TKR', 'MTs Ittihadul Muslimin', 'Kalipucang Kulon, Jepara', '', '', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2020-04-09 13:08:30'),
(22, '2a3f892d-eae2-4211-ac40-7d2010bd3986', '3320112904050004', 'MUHAMMAD DINO ARIYO SAPUTRA', 'L', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'Jepara', '29/04/2005', 'Islam', 'Ngabul  RT.2 RW.5, Tahunan, Jepara', '083852242558', '083865958915', 'Kendaraan Pribadi', 'Jefri priyanto', 'Wiraswasta', 'Rini nirnawati', 'Ibu Rumah Tangga', 'Jefri priyanto', 'Wiraswasta', 2, 1, 'Umum', '', 'TKJ', 'PBS', 'SMP Negeri 3', 'Sukosono, Kedung', '', '', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', '2020-04-09 13:26:48'),
(23, '8b072aff-8058-4bde-9e19-0a43b6ac75d8', '3320021805040003', 'MUHAMMAD SYAIFUL KHAMILIN', 'L', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'Jepara', '18/05/2004', 'Islam', 'lebuawu RT.14 RW.03, pecangaan, Jepara', '082337965546', '088216392899', 'Kendaraan Umum', 'imam taufik', 'wiraswasta ', 'jumiati', 'Ibu Rumah Tangga', 'imam taufik', 'wiraswasta ', 2, 2, 'Industri', '', 'TKJ', 'TKJ', 'SMP Walisongo', 'Pecangaan Kulon, Pecangaan', '', '', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Iya', 'Tidak', '2020-04-13 11:42:23');

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
(1, 'Administrator', 'admin', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'avatar4.png', 'skin-green', 'super-admin'),
(2, 'Santi Mawarni', 'santi', '3e4fc6ae741670aa40825aa6ab622520381b6356', 'avatar2.png', 'skin-yellow', 'keuangan'),
(4, 'Siti Khanifah', 'khanif', '8f21200da746619042a2646d2b3cca4589ba8fb2', 'avatar2.png', 'skin-yellow', 'keuangan'),
(5, 'Ahmad Nizar', 'nizar', '35779736edfe151b5493c3c99c7e451be5e4a1fe', 'user6-128x128.jpg', 'skin-green', 'keuangan'),
(7, 'Asrori', 'asrori', '4aed7fb4eed446796c59ab3fd911e359f063ec83', 'avatar3.png', 'skin-green', 'tata-usaha'),
(8, 'Muh. Syafiq', 'syafiq', 'e52b23862ac0c5a92db325ad74298c7ddcf3ddf8', 'user8-128x128.jpg', 'skin-green', 'tata-usaha'),
(9, 'Ahmad Sholihul', 'ahmad', '2c4c3891e2ac6958e9810a1e49c6705784fbfa1a', 'avatar5.png', 'skin-green', 'tata-usaha'),
(10, 'Faiz Hidayatulloh', 'faiz', 'd321c195ab96c75a811d4ee3dc15b7e999195a3f', 'user8-128x128.jpg', 'skin-purple', 'super-admin'),
(11, 'Mokh. Faris', 'faris', '40e15b60947665dc4be5fc4ede58d41863fcc3fe', 'avatar4.png', 'skin-green', 'tata-usaha'),
(12, 'Ardhana Himawan', 'ardhana', '5aeb2b3c09e430c14082bd599fa89c8af064759b', 'avatar1.png', 'skin-blue', 'super-admin');

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
(3, '3320111405050004', '2020-04-11', 50000, 'faiz'),
(4, '3320111405050004', '2020-04-12', 150000, 'faiz');

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
  ADD PRIMARY KEY (`id_bayar`);

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
  MODIFY `id_reg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `padmin`
--
ALTER TABLE `padmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
