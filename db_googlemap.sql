-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2014 at 07:10 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_googlemap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bencana`
--

CREATE TABLE IF NOT EXISTS `tbl_bencana` (
  `id_bencana` int(2) NOT NULL,
  `nama_bencana` varchar(50) NOT NULL,
  PRIMARY KEY (`id_bencana`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bencana`
--

INSERT INTO `tbl_bencana` (`id_bencana`, `nama_bencana`) VALUES
(2, 'Angin Topan'),
(3, 'Gempa Tektonik'),
(4, 'Gunung Meletus'),
(5, 'Gempa Vulkanik'),
(6, 'Gempa Bumi'),
(7, 'Kelaparan'),
(8, 'Kekeringan'),
(9, 'Kebakaran'),
(10, 'Banjir'),
(11, 'Longsor'),
(12, 'Tsunami');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_informasi`
--

CREATE TABLE IF NOT EXISTS `tbl_informasi` (
  `id_info` int(12) NOT NULL,
  `id_prov` int(4) NOT NULL,
  `id_bencana` double NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `lokasi` text NOT NULL,
  `penyebab` text NOT NULL,
  `korban` varchar(100) NOT NULL,
  `kerusakan` int(200) NOT NULL,
  `penanganan` varchar(200) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `bantuan` text NOT NULL,
  `pengungsi` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id_info`, `id_prov`, `id_bencana`, `tgl`, `waktu`, `lokasi`, `penyebab`, `korban`, `kerusakan`, `penanganan`, `foto`, `jenis`, `lat`, `lng`, `bantuan`, `pengungsi`) VALUES
(1, 1200, 4, '2013-09-22', '00:00:00', '', 'Tekanan Gas Tinggi', '4 meninggal', 4, '', '', 'gunung', 3.155599509242843, 98.41140747070312, 'Pangan, Papan, Pakian, Obat-obatan, Uang, Seragam dan alat tulis sekolah, dan lain-lain', 3000),
(1, 5300, 8, '2014-11-08', '00:00:00', '', 'Suhu Tinggi', '0', 1000000, '', '', 'kekeringan', -9.10209673872643, 119.00390625, 'Makanan, Air, Uang', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi`
--

CREATE TABLE IF NOT EXISTS `tbl_provinsi` (
  `id_prov` varchar(4) NOT NULL,
  `nama_prov` varchar(50) NOT NULL,
  `ibu_kota` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prov`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`id_prov`, `nama_prov`, `ibu_kota`) VALUES
('1100', 'Aceh', 'Banda Aceh'),
('1200', 'Sumatera Utara', 'Medan'),
('1300', 'Sumatera Barat', 'Padang'),
('1400', 'Riau', 'Pakanbaru'),
('1500', 'Jambi', 'Jambi'),
('1600', 'Sumatera Selatan', 'Palembang'),
('1700', 'Bengkulu', 'Bengkulu'),
('1800', 'Lampung', 'Bandar Lampung'),
('1900', 'Kepulauan Bangka Belitung', 'Pangkal Pinang'),
('2100', 'Kepulauan Riau', 'Tanjungpinang'),
('3100', 'DKI Jakarta', 'Jakarta'),
('3200', 'Jawa Barat', 'Bandung'),
('3300', 'Jawa Tengah', 'Semarang'),
('3400', 'D I Yogyakarta', 'Yogyakarta'),
('3500', 'Jawa Timur', 'Surabaya'),
('3600', 'Banten', 'Serang'),
('5100', 'Bali', 'Denpasar'),
('5200', 'Nusa Tenggara Barat', 'Mataram'),
('5300', 'Nusa Tenggara Timur', 'Kupang'),
('6100', 'Kalimantan Barat', 'Pontianak'),
('6200', 'Kalimantan Tengah', 'Palangkaraya'),
('6300', 'Kalimantan Selatan', 'Banjarmasin'),
('6400', 'Kalimantan Timur', 'Samarinda'),
('6500', 'Kalimantan Utara', 'Tarakan'),
('7100', 'Sulawesi Utara', 'Manado'),
('7200', 'Sulawesi Tengah', 'Palu'),
('7300', 'Sulawesi Selatan', 'Makassar'),
('7400', 'Sulawesi Tenggara', 'Kendari'),
('7500', 'Gorontalo', 'Gorontalo'),
('7600', 'Sulawesi Barat', 'Mamuju'),
('8100', 'Maluku', 'Ambon'),
('8200', 'Maluku Utara', 'Sofifi/Ternate'),
('9100', 'Papua Barat', 'Manokwari'),
('9400', 'Papua', 'Jayapura');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `NIP` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIP`, `password`) VALUES
('anggaGPS', '41cde09309583cd048d69d6e2deb95f8'),
('1102110084', 'pendidikan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_informasi`
--
CREATE TABLE IF NOT EXISTS `view_informasi` (
`id_info` int(12)
,`nama_prov` varchar(50)
,`nama_bencana` varchar(50)
,`tgl` date
,`waktu` time
,`lokasi` text
,`korban` varchar(100)
,`penyebab` text
,`kerusakan` int(200)
,`penanganan` varchar(200)
,`foto` varchar(50)
,`jenis` varchar(100)
,`lat` double
,`lng` double
);
-- --------------------------------------------------------

--
-- Structure for view `view_informasi`
--
DROP TABLE IF EXISTS `view_informasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_informasi` AS select `info`.`id_info` AS `id_info`,`tbl_provinsi`.`nama_prov` AS `nama_prov`,`tbl_bencana`.`nama_bencana` AS `nama_bencana`,`info`.`tgl` AS `tgl`,`info`.`waktu` AS `waktu`,`info`.`lokasi` AS `lokasi`,`info`.`korban` AS `korban`,`info`.`penyebab` AS `penyebab`,`info`.`kerusakan` AS `kerusakan`,`info`.`penanganan` AS `penanganan`,`info`.`foto` AS `foto`,`info`.`jenis` AS `jenis`,`info`.`lat` AS `lat`,`info`.`lng` AS `lng` from ((`tbl_informasi` `info` join `tbl_bencana`) join `tbl_provinsi`) where ((`info`.`id_prov` = `tbl_provinsi`.`id_prov`) and (`info`.`id_bencana` = `tbl_bencana`.`id_bencana`));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
