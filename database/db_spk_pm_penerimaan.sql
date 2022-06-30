-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 03, 2021 at 02:03 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_pm_penerimaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

DROP TABLE IF EXISTS `akun`;
CREATE TABLE IF NOT EXISTS `akun` (
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `role` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`email`, `password`, `role`, `last_login`) VALUES
('admin@gmail.com', '75d23af433e0cea4c0e45a56dba18b30', 1, '2021-10-03 12:45:37'),
('divisidanus@gmail.com', 'ffd8402fe4f9752da1100907469f63d3', 2, NULL),
('divisieksekutor@gmail.com', '787976784ff4db646aa28425be501e9a', 2, NULL),
('divisihumas@gmail.com', 'f8cb7390cf787fe67735837a349ecec0', 2, '2021-10-03 11:02:19'),
('divisiinternal@gmail.com', '90acb1e10ffacdb86b72cc7bd96dfb6f', 2, '2021-10-03 11:08:28'),
('divisikestari@gmail.com', '177e1664fad4857d7836ee5550c0222e', 2, NULL),
('divisikreatif@gmail.com', '77d4ae1719efc5e499b458c7f77932c6', 2, NULL),
('divisisurvey@gmail.com', '50f68e0e570dc8e3c579922ff5a37298', 2, NULL),
('eldakomaladewi@gmail.com', '25d55ad283aa400af464c76d713c07ad', 3, '2021-10-03 05:43:10'),
('ilhamsyaputra@gmail.com', '25d55ad283aa400af464c76d713c07ad', 3, '2021-10-03 05:42:05'),
('rizlahambarzah@gmail.com', '25d55ad283aa400af464c76d713c07ad', 3, '2021-10-03 05:40:18'),
('selytruagustina18@gmail.com', '25d55ad283aa400af464c76d713c07ad', 3, '2021-10-03 13:11:23'),
('windawidyasari@gmail.com', '25d55ad283aa400af464c76d713c07ad', 3, '2021-10-03 13:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `calonanggota`
--

DROP TABLE IF EXISTS `calonanggota`;
CREATE TABLE IF NOT EXISTS `calonanggota` (
  `id_calonanggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` varchar(20) DEFAULT NULL,
  `hobi` text,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `pengalaman` text,
  `alamat` text,
  PRIMARY KEY (`id_calonanggota`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calonanggota`
--

INSERT INTO `calonanggota` (`id_calonanggota`, `nama_lengkap`, `email`, `jk`, `hobi`, `tempat_lahir`, `tanggal_lahir`, `pengalaman`, `alamat`) VALUES
(3, 'Sely Truagustina', 'selytruagustina18@gmail.com', 'Perempuan', '-', 'Palembang', '1997-03-04', '-', '-'),
(4, 'Rizlah Ambarzah', 'rizlahambarzah@gmail.com', 'Laki - Laki', '-', 'Palembang', '1997-03-04', '-', '-'),
(5, 'Ilham Syaputra', 'ilhamsyaputra@gmail.com', 'Laki - Laki', '-', 'Palembang', '1997-03-04', '-', '-'),
(6, 'Elda Komala Dewi', 'eldakomaladewi@gmail.com', 'Perempuan', '-', 'Palembang', '1997-03-04', '-', '-'),
(7, 'Winda Widya Sari', 'windawidyasari@gmail.com', 'Perempuan', '-', 'Palembang', '1997-03-04', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
CREATE TABLE IF NOT EXISTS `divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_divisi`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`, `deskripsi`, `email`) VALUES
(3, 'Divisi Internal', '-', 'divisiinternal@gmail.com'),
(4, 'Divisi Humas', '-', 'divisihumas@gmail.com'),
(5, 'Divisi Kestari', '-', 'divisikestari@gmail.com'),
(6, 'Divisi Kreatif', '-', 'divisikreatif@gmail.com'),
(7, 'Divisi Survey', '-\r\n', 'divisisurvey@gmail.com'),
(8, 'Divisi Eksekutor', '-', 'divisieksekutor@gmail.com'),
(9, 'Divisi Danus', '-', 'divisidanus@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `indikator_kriteria`
--

DROP TABLE IF EXISTS `indikator_kriteria`;
CREATE TABLE IF NOT EXISTS `indikator_kriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `min` float NOT NULL,
  `max` float NOT NULL,
  `keterangan` text NOT NULL,
  `nilai` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_kriteria` (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator_kriteria`
--

INSERT INTO `indikator_kriteria` (`id`, `id_kriteria`, `min`, `max`, `keterangan`, `nilai`) VALUES
(1, 1, 0, 64, 'Tidak pernah mengikuti organisasi', 1),
(2, 1, 65, 74, 'Pernah menjadi volunteer sebuah organisasi', 2),
(3, 1, 75, 84, 'Pernah mengikuti organisasi sebagai anggota', 3),
(4, 1, 85, 94, 'Pernah mengikuti organisasi sebagai kepala divisi', 4),
(5, 1, 95, 100, 'Pernah mengikuti organisasi sebagai ketua umum', 5),
(7, 2, 0, 64, 'Tidak menguasai', 1),
(8, 2, 65, 74, 'Kurang Menguasai', 2),
(9, 2, 75, 84, 'Cukup menguasai', 3),
(10, 2, 85, 94, 'Menguasai', 4),
(11, 2, 95, 100, 'Sangat menguasai', 5),
(12, 5, 0, 64, 'Tidak memiliki usaha dan tidak mempunyai kemampuan marketing', 1),
(13, 5, 65, 74, 'Tidak memiliki usaha, mempunyai kemampuan marketing', 2),
(14, 5, 75, 84, 'Pernah bekerja, tidak mempunyai kemampuan marketing', 3),
(15, 5, 85, 94, 'Pernah bekerja, mempunyai kemampuan marketing', 4),
(16, 5, 95, 100, 'Memiliki usaha, memiliki kemampuan marketing', 5),
(17, 6, 0, 64, 'Tidak menunjukkan pemahaman mengenai topik yang diberikan', 1),
(18, 6, 65, 74, 'Menunjukkan pemahaman mengenai topik yang diberikan', 2),
(19, 6, 75, 84, 'Menemukan 1 informasi yang tepat mengenai topik yang diberikan', 3),
(20, 6, 85, 94, 'Menemukan 2 informasi yang tepat mengenai topik yang diberikan', 4),
(21, 6, 95, 100, 'Menemukan >2 informasi yang tepat mengenai topik yang diberikan', 5),
(22, 7, 0, 64, 'Tidak mampu memberikan tanggapan ', 1),
(23, 7, 65, 74, 'Mampu memberikan tanggapan dengan bantuan teman tetapi tanggapan kurang jelas', 2),
(24, 7, 75, 84, 'Mampu memberikan tanggapan dengan bantuan teman dengan jelas', 3),
(25, 7, 85, 94, 'Mampu memberikan tanggapan dengan kata-kata sendiri tetapi tanggapan kurang jelas', 4),
(26, 7, 95, 100, 'Mampu memberikan tanggapan dengan kata-kata sendiri 95-100 dengan jelas', 5),
(27, 8, 0, 64, 'Tidak berupaya untuk berdiskusi bersama kelompok, bersikap acuh tak acuh', 1),
(28, 8, 65, 74, 'Tidak berupaya untuk berdiskusi bersama kelompok, tidak menghargai pendapat orang lain', 2),
(29, 8, 75, 84, 'Tidak berupaya untuk berdiskusi bersama kelompok, menghargai pendapat orang lain', 3),
(30, 8, 85, 94, 'Berupaya untuk berdiskusi bersama kelompok, tidak menghargai pendapat orang lain', 4),
(31, 8, 95, 100, 'Berupaya untuk berdiskusi bersama kelompok, menghargai pendapat orang lain', 5),
(32, 10, 0, 64, 'Tidak mampu memberikan penyelesaian dari permasalahan yang diberika', 1),
(33, 10, 65, 74, 'Memberikan penyelesaian dari permasalahan yang diberikan tetapi tidak tepat', 2),
(34, 10, 75, 84, 'Memberikan penyelesaian dari permasalahan yang diberikan tetapi kurang tepat', 3),
(35, 10, 85, 94, 'Memberikan penyelesaian dari permasalahan yang diberikan dengan tepat tetapi belum jelas', 4),
(36, 10, 95, 100, 'Memberikan penyelesaian dari permasalahan yang diberikan dengan tepat dan jelas', 5),
(37, 11, 0, 64, 'Tidak memiliki kemampuan berkomunikasi yang baik', 1),
(38, 11, 65, 74, 'Kurang memiliki kemampuan berkomunikasi yang baik', 2),
(39, 11, 75, 84, 'Cukup memiliki kemampuan berkomunikasi yang baik', 3),
(40, 11, 85, 94, 'Memiliki kemampuan berkomunikasi yang baik, tidak sesuai dengan topik yang seharusnya', 4),
(41, 11, 95, 100, 'Memiliki kemampuan berkomunikasi yang baik sesuai dengan topik yang seharusnya', 5),
(42, 12, 0, 64, 'Tidak kreatif', 1),
(43, 12, 65, 74, 'Kurang kreatif', 2),
(44, 12, 75, 84, 'Cukup kreatif', 3),
(45, 12, 85, 94, 'Kreatif', 4),
(46, 12, 95, 100, 'Sangat kreatif', 5);

-- --------------------------------------------------------

--
-- Table structure for table `indikator_subkriteria`
--

DROP TABLE IF EXISTS `indikator_subkriteria`;
CREATE TABLE IF NOT EXISTS `indikator_subkriteria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_sub` int(11) NOT NULL,
  `min` float NOT NULL,
  `max` float NOT NULL,
  `keterangan` text NOT NULL,
  `nilai` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_sub` (`id_sub`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indikator_subkriteria`
--

INSERT INTO `indikator_subkriteria` (`id`, `id_sub`, `min`, `max`, `keterangan`, `nilai`) VALUES
(1, 2, 0, 64, 'Tidak baik', 1),
(2, 2, 65, 74, 'Kurang baik', 2),
(3, 2, 75, 84, 'Cukup baik', 3),
(4, 2, 85, 94, 'Baik', 4),
(5, 2, 95, 100, 'Sangat Baik', 5),
(6, 3, 0, 64, 'Tidak baik', 1),
(7, 3, 65, 74, 'Kurang baik', 2),
(8, 3, 75, 84, 'Cukup baik', 3),
(9, 3, 85, 94, 'Baik', 4),
(10, 3, 95, 100, 'Sangat Baik', 5),
(11, 4, 0, 64, 'Tidak baik', 1),
(12, 4, 65, 74, 'Kurang baik', 2),
(13, 4, 75, 84, 'Cukup baik', 3),
(14, 4, 85, 94, 'Baik', 4),
(15, 4, 95, 100, 'Sangat Baik', 5),
(17, 5, 0, 64, 'Tidak baik', 1),
(18, 5, 65, 74, 'Kurang baik', 2),
(19, 5, 75, 84, 'Cukup baik', 3),
(20, 5, 85, 94, 'Baik', 4),
(21, 5, 95, 100, 'Sangat Baik', 5),
(22, 6, 0, 64, 'Tidak baik', 1),
(23, 6, 65, 74, 'Kurang baik', 2),
(24, 6, 75, 84, 'Cukup baik', 3),
(25, 6, 85, 94, 'Baik', 4),
(26, 6, 95, 100, 'Sangat Baik', 5),
(27, 7, 0, 64, 'Tidak baik', 1),
(28, 7, 65, 74, 'Kurang baik', 2),
(29, 7, 75, 84, 'Cukup baik', 3),
(30, 7, 85, 94, 'Baik', 4),
(31, 7, 95, 100, 'Sangat Baik', 5),
(32, 8, 0, 64, 'Tidak datang tepat waktu', 1),
(33, 8, 65, 74, 'Datang tepat waktu', 2),
(34, 8, 75, 84, 'Datang <10 menit sebelum mulai', 3),
(35, 8, 85, 94, 'Datang 10-20 menit sebelum mulai', 4),
(36, 8, 95, 100, 'Datang >20 menit sebelum mulai', 5),
(37, 9, 0, 64, 'Melanggar >3x peraturan yang berlaku ', 1),
(38, 9, 65, 74, 'Melanggar >3x peraturan yang berlaku ', 2),
(39, 9, 75, 84, 'Melanggar 2x peraturan yang berlaku', 3),
(40, 9, 85, 94, 'Melanggar 2x peraturan yang berlaku', 4),
(41, 9, 95, 100, 'Mentaati peraturan yang berlaku', 5);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
CREATE TABLE IF NOT EXISTS `kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` text NOT NULL,
  `aspek` text NOT NULL,
  `sub` int(1) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `aspek`, `sub`, `jenis`) VALUES
(1, 'Kemampuan Organisasi', 'Wawancara', 0, 'Core Factor'),
(2, 'Kemampuan Mengoperasikan MS ', 'Wawancara', 0, 'Core Factor'),
(3, 'Kemampuan Mengoperasikan Aplikasi Editing Video', 'Wawancara', 1, 'Core Factor'),
(4, 'Kemampuan Mengoperasikan Aplikasi Desain Grafis', 'Wawancara', 1, 'Core Factor'),
(5, 'Kemampuan Berwirausaha', 'Wawancara', 0, 'Secondary Factor'),
(6, 'Wawasan Pengetahuan', 'FGD', 0, 'Core Factor'),
(7, 'Keaktifan', 'FGD', 0, 'Core Factor'),
(8, 'Kerja Sama', 'FGD', 0, 'Core Factor'),
(9, 'Kedisiplinan', 'FGD', 1, 'Core Factor'),
(10, 'Penalaran dan Solusi', 'FGD', 0, 'Core Factor'),
(11, 'Komunikatif', 'FGD', 0, 'Secondary Factor'),
(12, 'Kreativitas', 'FGD', 0, 'Secondary Factor');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

DROP TABLE IF EXISTS `penerimaan`;
CREATE TABLE IF NOT EXISTS `penerimaan` (
  `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `tgl_buat` datetime NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_penerimaan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `nama`, `tgl_buat`, `status`) VALUES
(2, 'Oprec 2021', '2021-10-03 07:17:11', 3);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

DROP TABLE IF EXISTS `penilaian`;
CREATE TABLE IF NOT EXISTS `penilaian` (
  `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,
  `id_penerimaan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_sub` int(11) DEFAULT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`id_penilaian`),
  KEY `id_penerimaan` (`id_penerimaan`),
  KEY `id_divisi` (`id_divisi`),
  KEY `id_peserta` (`id_peserta`),
  KEY `id_kriteria` (`id_kriteria`),
  KEY `id_sub` (`id_sub`)
) ENGINE=InnoDB AUTO_INCREMENT=225 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_penerimaan`, `id_divisi`, `id_peserta`, `id_kriteria`, `id_sub`, `nilai`) VALUES
(21, 2, 3, 1, 1, NULL, 89),
(22, 2, 3, 1, 2, NULL, 65),
(23, 2, 3, 1, 3, 2, 68),
(24, 2, 3, 1, 3, 3, 68),
(25, 2, 3, 1, 3, 4, 68),
(26, 2, 3, 1, 4, 5, 95),
(27, 2, 3, 1, 4, 6, 95),
(28, 2, 3, 1, 4, 7, 95),
(29, 2, 3, 1, 5, NULL, 87),
(30, 2, 3, 1, 6, NULL, 83),
(31, 2, 3, 1, 7, NULL, 93),
(32, 2, 3, 1, 8, NULL, 67),
(33, 2, 3, 1, 9, 8, 93),
(34, 2, 3, 1, 9, 9, 93),
(35, 2, 3, 1, 10, NULL, 91),
(36, 2, 3, 1, 11, NULL, 91),
(37, 2, 3, 1, 12, NULL, 85),
(38, 2, 3, 2, 1, NULL, 87),
(39, 2, 3, 2, 2, NULL, 86),
(40, 2, 3, 2, 3, 2, 85),
(41, 2, 3, 2, 3, 3, 85),
(42, 2, 3, 2, 3, 4, 85),
(43, 2, 3, 2, 4, 5, 95),
(44, 2, 3, 2, 4, 6, 95),
(45, 2, 3, 2, 4, 7, 95),
(46, 2, 3, 2, 5, NULL, 98),
(47, 2, 3, 2, 6, NULL, 73),
(48, 2, 3, 2, 7, NULL, 75),
(49, 2, 3, 2, 8, NULL, 67),
(50, 2, 3, 2, 9, 8, 66),
(51, 2, 3, 2, 9, 9, 66),
(52, 2, 3, 2, 10, NULL, 77),
(53, 2, 3, 2, 11, NULL, 76),
(54, 2, 3, 2, 12, NULL, 83),
(55, 2, 3, 3, 1, NULL, 77),
(56, 2, 3, 3, 2, NULL, 66),
(57, 2, 3, 3, 3, 2, 75),
(58, 2, 3, 3, 3, 3, 75),
(59, 2, 3, 3, 3, 4, 75),
(60, 2, 3, 3, 4, 5, 82),
(61, 2, 3, 3, 4, 6, 82),
(62, 2, 3, 3, 4, 7, 82),
(63, 2, 3, 3, 5, NULL, 70),
(64, 2, 3, 3, 6, NULL, 66),
(65, 2, 3, 3, 7, NULL, 86),
(66, 2, 3, 3, 8, NULL, 70),
(67, 2, 3, 3, 9, 8, 85),
(68, 2, 3, 3, 9, 9, 85),
(69, 2, 3, 3, 10, NULL, 67),
(70, 2, 3, 3, 11, NULL, 86),
(71, 2, 3, 3, 12, NULL, 72),
(72, 2, 3, 4, 1, NULL, 96),
(73, 2, 3, 4, 2, NULL, 92),
(74, 2, 3, 4, 3, 2, 75),
(75, 2, 3, 4, 3, 3, 75),
(76, 2, 3, 4, 3, 4, 75),
(77, 2, 3, 4, 4, 5, 76),
(78, 2, 3, 4, 4, 6, 76),
(79, 2, 3, 4, 4, 7, 76),
(80, 2, 3, 4, 5, NULL, 90),
(81, 2, 3, 4, 6, NULL, 86),
(82, 2, 3, 4, 7, NULL, 65),
(83, 2, 3, 4, 8, NULL, 75),
(84, 2, 3, 4, 9, 8, 72),
(85, 2, 3, 4, 9, 9, 72),
(86, 2, 3, 4, 10, NULL, 98),
(87, 2, 3, 4, 11, NULL, 73),
(88, 2, 3, 4, 12, NULL, 71),
(89, 2, 3, 5, 1, NULL, 83),
(90, 2, 3, 5, 2, NULL, 75),
(91, 2, 3, 5, 3, 2, 79),
(92, 2, 3, 5, 3, 3, 79),
(93, 2, 3, 5, 3, 4, 79),
(94, 2, 3, 5, 4, 5, 71),
(95, 2, 3, 5, 4, 6, 71),
(96, 2, 3, 5, 4, 7, 71),
(97, 2, 3, 5, 5, NULL, 88),
(98, 2, 3, 5, 6, NULL, 69),
(99, 2, 3, 5, 7, NULL, 83),
(100, 2, 3, 5, 8, NULL, 83),
(101, 2, 3, 5, 9, 8, 83),
(102, 2, 3, 5, 9, 9, 83),
(103, 2, 3, 5, 10, NULL, 72),
(104, 2, 3, 5, 11, NULL, 90),
(105, 2, 3, 5, 12, NULL, 85),
(123, 2, 4, 2, 1, NULL, 80),
(124, 2, 4, 2, 2, NULL, 80),
(125, 2, 4, 2, 3, 2, 80),
(126, 2, 4, 2, 3, 3, 80),
(127, 2, 4, 2, 3, 4, 80),
(128, 2, 4, 2, 4, 5, 80),
(129, 2, 4, 2, 4, 6, 80),
(130, 2, 4, 2, 4, 7, 80),
(131, 2, 4, 2, 5, NULL, 80),
(132, 2, 4, 2, 6, NULL, 80),
(133, 2, 4, 2, 7, NULL, 80),
(134, 2, 4, 2, 8, NULL, 80),
(135, 2, 4, 2, 9, 8, 80),
(136, 2, 4, 2, 9, 9, 80),
(137, 2, 4, 2, 10, NULL, 80),
(138, 2, 4, 2, 11, NULL, 80),
(139, 2, 4, 2, 12, NULL, 80),
(208, 2, 4, 1, 1, NULL, 100),
(209, 2, 4, 1, 2, NULL, 100),
(210, 2, 4, 1, 3, 2, 100),
(211, 2, 4, 1, 3, 3, 100),
(212, 2, 4, 1, 3, 4, 100),
(213, 2, 4, 1, 4, 5, 100),
(214, 2, 4, 1, 4, 6, 100),
(215, 2, 4, 1, 4, 7, 100),
(216, 2, 4, 1, 5, NULL, 100),
(217, 2, 4, 1, 6, NULL, 100),
(218, 2, 4, 1, 7, NULL, 100),
(219, 2, 4, 1, 8, NULL, 100),
(220, 2, 4, 1, 9, 8, 100),
(221, 2, 4, 1, 9, 9, 100),
(222, 2, 4, 1, 10, NULL, 100),
(223, 2, 4, 1, 11, NULL, 100),
(224, 2, 4, 1, 12, NULL, 100);

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

DROP TABLE IF EXISTS `peserta`;
CREATE TABLE IF NOT EXISTS `peserta` (
  `id_peserta` int(11) NOT NULL AUTO_INCREMENT,
  `id_calonanggota` int(11) NOT NULL,
  `id_penerimaan` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_peserta`),
  KEY `id_calonanggota` (`id_calonanggota`),
  KEY `id_penerimanan` (`id_penerimaan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_calonanggota`, `id_penerimaan`, `status`, `keterangan`) VALUES
(1, 3, 2, 0, NULL),
(2, 4, 2, 0, NULL),
(3, 5, 2, 0, NULL),
(4, 6, 2, 0, NULL),
(5, 7, 2, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `standar_divisi`
--

DROP TABLE IF EXISTS `standar_divisi`;
CREATE TABLE IF NOT EXISTS `standar_divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_divisi` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` int(5) NOT NULL,
  `id_penerimaan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_divisi` (`id_divisi`),
  KEY `id_kriteria` (`id_kriteria`),
  KEY `id_penerimaan` (`id_penerimaan`)
) ENGINE=InnoDB AUTO_INCREMENT=841 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standar_divisi`
--

INSERT INTO `standar_divisi` (`id`, `id_divisi`, `id_kriteria`, `nilai`, `id_penerimaan`) VALUES
(757, 3, 1, 3, 2),
(758, 3, 2, 3, 2),
(759, 3, 3, 3, 2),
(760, 3, 4, 3, 2),
(761, 3, 5, 3, 2),
(762, 3, 6, 3, 2),
(763, 3, 7, 3, 2),
(764, 3, 8, 3, 2),
(765, 3, 9, 3, 2),
(766, 3, 10, 3, 2),
(767, 3, 11, 3, 2),
(768, 3, 12, 3, 2),
(769, 4, 1, 3, 2),
(770, 4, 2, 3, 2),
(771, 4, 3, 3, 2),
(772, 4, 4, 3, 2),
(773, 4, 5, 3, 2),
(774, 4, 6, 3, 2),
(775, 4, 7, 3, 2),
(776, 4, 8, 3, 2),
(777, 4, 9, 3, 2),
(778, 4, 10, 3, 2),
(779, 4, 11, 3, 2),
(780, 4, 12, 3, 2),
(781, 5, 1, 3, 2),
(782, 5, 2, 3, 2),
(783, 5, 3, 3, 2),
(784, 5, 4, 3, 2),
(785, 5, 5, 3, 2),
(786, 5, 6, 3, 2),
(787, 5, 7, 3, 2),
(788, 5, 8, 3, 2),
(789, 5, 9, 3, 2),
(790, 5, 10, 3, 2),
(791, 5, 11, 3, 2),
(792, 5, 12, 3, 2),
(793, 6, 1, 3, 2),
(794, 6, 2, 3, 2),
(795, 6, 3, 3, 2),
(796, 6, 4, 3, 2),
(797, 6, 5, 3, 2),
(798, 6, 6, 3, 2),
(799, 6, 7, 3, 2),
(800, 6, 8, 3, 2),
(801, 6, 9, 3, 2),
(802, 6, 10, 3, 2),
(803, 6, 11, 3, 2),
(804, 6, 12, 3, 2),
(805, 7, 1, 3, 2),
(806, 7, 2, 3, 2),
(807, 7, 3, 3, 2),
(808, 7, 4, 3, 2),
(809, 7, 5, 3, 2),
(810, 7, 6, 3, 2),
(811, 7, 7, 3, 2),
(812, 7, 8, 3, 2),
(813, 7, 9, 3, 2),
(814, 7, 10, 3, 2),
(815, 7, 11, 3, 2),
(816, 7, 12, 3, 2),
(817, 8, 1, 3, 2),
(818, 8, 2, 3, 2),
(819, 8, 3, 3, 2),
(820, 8, 4, 3, 2),
(821, 8, 5, 3, 2),
(822, 8, 6, 3, 2),
(823, 8, 7, 3, 2),
(824, 8, 8, 3, 2),
(825, 8, 9, 3, 2),
(826, 8, 10, 3, 2),
(827, 8, 11, 3, 2),
(828, 8, 12, 3, 2),
(829, 9, 1, 3, 2),
(830, 9, 2, 3, 2),
(831, 9, 3, 3, 2),
(832, 9, 4, 3, 2),
(833, 9, 5, 3, 2),
(834, 9, 6, 3, 2),
(835, 9, 7, 3, 2),
(836, 9, 8, 3, 2),
(837, 9, 9, 3, 2),
(838, 9, 10, 3, 2),
(839, 9, 11, 3, 2),
(840, 9, 12, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subkriteria`
--

DROP TABLE IF EXISTS `subkriteria`;
CREATE TABLE IF NOT EXISTS `subkriteria` (
  `id_sub` int(11) NOT NULL AUTO_INCREMENT,
  `id_kriteria` int(11) NOT NULL,
  `nama_sub` text NOT NULL,
  PRIMARY KEY (`id_sub`),
  KEY `id_kriteria` (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id_sub`, `id_kriteria`, `nama_sub`) VALUES
(2, 3, 'Kemampuan'),
(3, 3, 'Wawasan'),
(4, 3, 'Kreativitas'),
(5, 4, 'Kemampuan'),
(6, 4, 'Wawasan'),
(7, 4, 'Kreativias'),
(8, 9, 'Kehadiran'),
(9, 9, 'Peraturan');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calonanggota`
--
ALTER TABLE `calonanggota`
  ADD CONSTRAINT `calonanggota_ibfk_1` FOREIGN KEY (`email`) REFERENCES `akun` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `divisi`
--
ALTER TABLE `divisi`
  ADD CONSTRAINT `divisi_ibfk_1` FOREIGN KEY (`email`) REFERENCES `akun` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `indikator_kriteria`
--
ALTER TABLE `indikator_kriteria`
  ADD CONSTRAINT `indikator_kriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `indikator_subkriteria`
--
ALTER TABLE `indikator_subkriteria`
  ADD CONSTRAINT `indikator_subkriteria_ibfk_1` FOREIGN KEY (`id_sub`) REFERENCES `subkriteria` (`id_sub`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`id_penerimaan`) REFERENCES `penerimaan` (`id_penerimaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_3` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_4` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_5` FOREIGN KEY (`id_sub`) REFERENCES `subkriteria` (`id_sub`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_penerimaan`) REFERENCES `penerimaan` (`id_penerimaan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_ibfk_2` FOREIGN KEY (`id_calonanggota`) REFERENCES `calonanggota` (`id_calonanggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `standar_divisi`
--
ALTER TABLE `standar_divisi`
  ADD CONSTRAINT `standar_divisi_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `standar_divisi_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `standar_divisi_ibfk_3` FOREIGN KEY (`id_penerimaan`) REFERENCES `penerimaan` (`id_penerimaan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
