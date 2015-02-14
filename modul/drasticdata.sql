-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2011 at 12:13 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `drasticdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `country_map`
--

CREATE TABLE IF NOT EXISTS `country_map` (
  `id` int(11) NOT NULL auto_increment,
  `nama_kec` char(52) collate utf8_unicode_ci NOT NULL,
  `Luas_Area` varchar(53) collate utf8_unicode_ci NOT NULL,
  `Jumlah_Penduduk` int(11) NOT NULL default '0',
  `Coords` char(30) collate utf8_unicode_ci NOT NULL default '-7,109',
  `daerah` enum('bogor') collate utf8_unicode_ci NOT NULL default 'bogor',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=275 ;

--
-- Dumping data for table `country_map`
--

INSERT INTO `country_map` (`id`, `nama_kec`, `Luas_Area`, `Jumlah_Penduduk`, `Coords`, `daerah`) VALUES
(1, 'Bogor Barat', '3285', 170664, '-6.564,106.763', 'bogor'),
(2, 'Bogor Selatan', '3081', 151135, '-6.607,106.817', 'bogor'),
(3, 'Bogor Tengah', '813', 92855, '-6.570823,106.787453', 'bogor'),
(4, 'Bogor Timur', '1015', 77265, '-6.605099,106.818867', 'bogor'),
(5, 'Bogor Utara', '1772', 0, '-6.559909,106.802559', 'bogor'),
(6, 'Tanah Sareal', '1884', 132493, '-6.558885,106.786766', 'bogor');

-- --------------------------------------------------------

--
-- Table structure for table `datapeta`
--
-- in use(#1033 - Incorrect information in file: '.\drasticdata\datapeta.frm')

--
-- Dumping data for table `datapeta`
--

-- in use (#1033 - Incorrect information in file: '.\drasticdata\datapeta.frm')

-- --------------------------------------------------------

--
-- Table structure for table `dp`
--

CREATE TABLE IF NOT EXISTS `dp` (
  `id_dp` int(5) NOT NULL auto_increment,
  `kode_dp` varchar(100) NOT NULL,
  `alamat` tinytext NOT NULL,
  `kapasitas` int(100) NOT NULL,
  `jumlah_isi` int(100) NOT NULL,
  `jumlah_rusak` int(100) NOT NULL,
  `jumlah_wsucc` int(100) NOT NULL,
  `jumlah_kosong` int(100) NOT NULL,
  `id_rk` int(5) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY  (`id_dp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `dp`
--

INSERT INTO `dp` (`id_dp`, `kode_dp`, `alamat`, `kapasitas`, `jumlah_isi`, `jumlah_rusak`, `jumlah_wsucc`, `jumlah_kosong`, `id_rk`, `lat`, `lng`) VALUES
(1, 'gystysd', 'hjghxz', 800, 89, 90, 90, 90, 3, -6.58122540936741, 106.805048296387);

-- --------------------------------------------------------

--
-- Table structure for table `manual_pointer`
--

CREATE TABLE IF NOT EXISTS `manual_pointer` (
  `id` int(11) NOT NULL auto_increment,
  `produk` varchar(60) NOT NULL,
  `kabupaten` varchar(80) NOT NULL,
  `kecamatan` varchar(80) NOT NULL,
  `kelurahan` varchar(80) NOT NULL,
  `desa` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `kuartal1` varchar(60) NOT NULL,
  `kuartal2` varchar(60) NOT NULL,
  `kuartal3` varchar(60) NOT NULL,
  `kuartal4` varchar(60) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `manual_pointer`
--


-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL auto_increment,
  `Nama` varchar(60) NOT NULL,
  `Keterangan` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `Nama`, `Keterangan`, `lat`, `lng`, `type`) VALUES
(1, '', 'a', 37.443264, -122.140015, 'SMS Bulk'),
(2, '', 'a', -6.909175, 107.614265, 'SMS Bulk'),
(3, '', 'hehe', -6.913606, 107.613556, 'SMS Bulk'),
(4, '', 'a', -6.913436, 107.607735, 'Location Based Advertising'),
(5, '', 'Coba', -6.914288, 107.607910, 'Location Based Advertising'),
(6, '', 'halo', -6.900143, 107.599503, 'Location Based Advertising'),
(7, '', 'harus dibom', -6.913041, 107.611450, 'Location Based Advertising'),
(8, '', 'hjkhdjs', -6.881397, 107.629021, 'Location Based Advertising'),
(9, '', 'gtw', -6.864013, 107.635201, 'Location Based Advertising'),
(10, '', 'lp', -6.913947, 107.618034, 'SMS Bulk');

-- --------------------------------------------------------

--
-- Table structure for table `perumahan`
--

CREATE TABLE IF NOT EXISTS `perumahan` (
  `id_perumahan` int(5) NOT NULL auto_increment,
  `nama_perum` varchar(100) NOT NULL,
  `alamat` tinytext NOT NULL,
  `id` int(5) NOT NULL,
  `daerah` varchar(10) NOT NULL default '''Bogor''',
  `jumlah_dibangun` int(10) NOT NULL,
  `sudah_dibangun` int(10) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY  (`id_perumahan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `perumahan`
--

INSERT INTO `perumahan` (`id_perumahan`, `nama_perum`, `alamat`, `id`, `daerah`, `jumlah_dibangun`, `sudah_dibangun`, `lat`, `lng`) VALUES
(2, 'Taman Firdaus', 'jalan soleh', 1, 'Bogor', 100, 1, -6.58830236192579, 106.806936571533),
(3, 'taman cimanggu', 'jalan cimanggu', 2, 'Bogor', 100, 12, -6.58685287383649, 106.784363100464),
(4, 'lida', 'jalan apa aja', 1, 'undefined', 100, 10, -6.576280009159, 106.801700899536),
(5, 'PERUMAHAN', 'JALA', 1, 'Bogor', 90, 9, -6.5879, 106.812);

-- --------------------------------------------------------

--
-- Table structure for table `rk`
--

CREATE TABLE IF NOT EXISTS `rk` (
  `id_rk` int(5) NOT NULL auto_increment,
  `nama_rk` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_sto` int(5) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY  (`id_rk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rk`
--

INSERT INTO `rk` (`id_rk`, `nama_rk`, `alamat`, `id_sto`, `lat`, `lng`) VALUES
(4, 'lidaaaaa', 'jalksaja', 8, -6.57866744988858, 106.802902529175),
(3, 'haha', 'ytstyds', 8, -6.58625602456892, 106.792087862427);

-- --------------------------------------------------------

--
-- Table structure for table `sto`
--

CREATE TABLE IF NOT EXISTS `sto` (
  `id_sto` int(5) NOT NULL auto_increment,
  `kode_sto` varchar(100) NOT NULL,
  `nama_sto` varchar(100) NOT NULL,
  `alamat` tinytext NOT NULL,
  `id` int(5) NOT NULL,
  `daerah` varchar(100) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY  (`id_sto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sto`
--

INSERT INTO `sto` (`id_sto`, `kode_sto`, `nama_sto`, `alamat`, `id`, `daerah`, `lat`, `lng`) VALUES
(1, 'frt', 'tryt', 'rtetyt', 1, 'Bogor', -6.58276017873086, 106.794405291016),
(8, 'gytry', 'lida', 'ytyut', 6, 'Bogor', -6.576280009159, 106.814575502808),
(9, 'CBR', 'Cibubur', 'jalaaaaa', 1, 'Bogor', -6.58250438416638, 106.783762285645);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) collate latin1_general_ci NOT NULL,
  `password` varchar(50) collate latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) collate latin1_general_ci NOT NULL,
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  `no_telp` varchar(20) collate latin1_general_ci NOT NULL,
  `level` varchar(20) collate latin1_general_ci NOT NULL default 'user',
  `blokir` enum('Y','N') collate latin1_general_ci NOT NULL default 'N',
  `id_session` varchar(100) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`, `id_session`) VALUES
('admin', '1234', 'FWD', 'firmansyah.w@gmail.com', '085293008811', 'admin', 'N', '62a473fbe9f65bffbc2ff9002aa8bf87');
