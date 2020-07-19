-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2019 at 05:55 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbrest`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kdbrg` varchar(5) NOT NULL,
  `nmbrg` varchar(40) DEFAULT NULL,
  `kdkategori` varchar(3) DEFAULT NULL,
  `harga` double DEFAULT '0',
  `stok` int(4) DEFAULT NULL,
  `deskripsi` text,
  `berat` double NOT NULL,
  `disk` double DEFAULT '0',
  PRIMARY KEY (`kdbrg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kdbrg`, `nmbrg`, `kdkategori`, `harga`, `stok`, `deskripsi`, `berat`, `disk`) VALUES
('L0025', 'Lintang 25', 'K01', 550, 99664, '<p>Lintang 25</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0024', 'Lintang 24', 'K01', 550, 99899, '<p>Lintang 24</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0023', 'Lintang 23', 'K01', 550, 99930, '<p>Lintang 23</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0022', 'Lintang 22', 'K01', 550, 100000, '<p>Lintang 22</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0021', 'Lintang 21', 'K01', 550, 100000, '<p>Lintang 21</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0020', 'Lintang 20', 'K01', 550, 100000, '<p>Lintang 20</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0019', 'Lintang 19', 'K01', 550, 100000, '<p>Lintang 19</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0018', 'Lintang 18', 'K01', 550, 100000, '<p>Lintang 18</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0017', 'Lintang 17', 'K01', 550, 100000, '<p>Lintang 17</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0016', 'Lintang 16', 'K01', 550, 100000, '<p>Lintang 16</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0015', 'Lintang 15', 'K01', 475, 100000, '<p>Lintang 15</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0014', 'Lintang 14', 'K01', 475, 100000, '<p>Lintang 14</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0012', 'Lintang 12', 'K01', 550, 100000, '<p>LIntang 12</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0002', 'Lintang 02', 'K01', 550, 99900, '<p>Lintang 01</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0026', 'Lintang 26', 'K01', 550, 100000, '<p>Lintang 26</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0027', 'Lintang 27', 'K01', 550, 100000, '<p>Lintang 27</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0028', 'Lintang 28', 'K01', 550, 100000, '<p>Lintang 28</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 10),
('L0029', 'Lintang 29', 'K02', 475, 100000, '<p>Lintang 29</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 100, 0),
('L0030', 'Lintang 30', 'K02', 475, 100000, '<p>Lintang 30</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 100, 0),
('L0031', 'Lintang 31', 'K02', 475, 100000, '<p>Lintang 31</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 100, 0),
('L0032', 'Lintang 32', 'K02', 475, 100000, '<p>Lintang 32</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 100, 0),
('L0033', 'Lintang 33', 'K02', 475, 100000, '<p>Lintang 33</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 100, 0),
('L0034', 'Lintang 34', 'K02', 475, 100000, '<p>Lintang 34</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 100, 0),
('L0035', 'Lintang 35', 'K02', 475, 100000, '<p>Lintang 35</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 100, 0),
('L0036', 'Lintang 36', 'K02', 475, 100000, '<p>Lintang 36</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 100, 0),
('L0037', 'Lintang 37', 'K02', 475, 100000, '<p>Lintang 37</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 100, 0),
('L0038', 'Lintang 38', 'K02', 475, 100000, '<p>Lintang 38</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 100, 0),
('L0039', 'Lintang 39', 'K03', 300, 100000, '<p>Lintang 39</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0),
('L0040', 'Lintang 40', 'K03', 300, 100000, '<p>Lintang 40</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0),
('L0041', 'Lintang 41', 'K03', 300, 100000, '<p>Lintang 41</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0),
('L0042', 'Lintang 42', 'K03', 300, 100000, '<p>Lintang 42</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0),
('L0043', 'Lintang 43', 'K03', 300, 100000, '<p>Lintang 43</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0),
('L0044', 'Lintang 44', 'K03', 300, 100000, '<p>Lintang 44</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0),
('L0045', 'Lintang 45', 'K03', 300, 100000, '<p>Lintang 45</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0),
('L0046', 'Lintang 46', 'K03', 300, 100000, '<p>Lintang 46</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0),
('L0047', 'Lintang 47', 'K03', 300, 100000, '<p>Lintang 47</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0),
('L0048', 'Lintang 48', 'K03', 300, 100000, '<p>Lintang 48</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0),
('L0049', 'Lintang 49', 'K03', 300, 100000, '<p>Lintang 49</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0),
('L0050', 'Lintang 50', 'K03', 300, 100000, '<p>Lintang 50</p><p>Cocok digunakan untuk undangan pernikahan dan khitan. Abadikan momen spesial anda bersama kami, Lancar Undangan</p>', 75, 0);

-- --------------------------------------------------------

--
-- Table structure for table `biayakirim`
--

CREATE TABLE IF NOT EXISTS `biayakirim` (
  `kota` varchar(100) CHARACTER SET latin1 NOT NULL,
  `biaya` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `biayakirim`
--

INSERT INTO `biayakirim` (`kota`, `biaya`) VALUES
('Semarang', 10000),
('Jakarta', 15000),
('Bandung', 15000),
('Yogyakarta', 10000),
('Samarinda', 25000),
('Balikpapan', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kdkategori` varchar(3) NOT NULL,
  `nmkategori` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`kdkategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kdkategori`, `nmkategori`) VALUES
('K01', 'Seri 1'),
('K02', 'Seri 2'),
('K03', 'Seri 3'),
('K04', 'Seri 4'),
('K05', 'Seri 5');

-- --------------------------------------------------------

--
-- Table structure for table `konfirm`
--

CREATE TABLE IF NOT EXISTS `konfirm` (
  `idplg` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `notransaksi` varchar(13) CHARACTER SET latin1 DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `isi` text CHARACTER SET latin1,
  UNIQUE KEY `username` (`tanggal`,`isi`(20))
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `konfirm`
--

INSERT INTO `konfirm` (`idplg`, `tanggal`, `notransaksi`, `bayar`, `isi`) VALUES
('budi@yahoo.com', '2018-12-17 10:05:28', '1812-RS/001', 780000, 'Sudah transfer untuk pembayaran order ID 1812-RS/001, sebesar Rp 780000, ke Bank BCA 2465350308, dari Bank BCA 18909090909 , A/N Budi Rahayu. Transfer tanggal 14-12-2018 jam 10:00 '),
('sani@gmail.com', '2019-01-22 09:17:18', '1901-RS-001', 141975, 'Sudah transfer untuk pembayaran order ID 1901-RS-001, sebesar Rp 141975, ke Bank BCA 2465350308, dari Bank BCA 3374023007930005 , A/N Muchamad Nur Iksani. Transfer tanggal 22-01-2019 jam 10.50 '),
('sani@gmail.com', '2019-01-22 13:26:32', '1901-RS-003', 100000, 'Sudah transfer untuk pembayaran order ID 1901-RS-003, sebesar Rp 100000, ke Bank BCA 2465350308, dari Bank BCA 3374023007930005 , A/N Muchamad Nur Iksani. Transfer tanggal 22-01-2019 jam 13.50 '),
('rumi@gmail.com', '2019-02-12 00:44:00', '1902-RS-001', 129500, 'Sudah transfer untuk pembayaran order ID 1902-RS-001, sebesar Rp 129500, ke Bank BCA 2465350308, dari Bank BCA 87564892834 , A/N rumiati. Transfer tanggal 12-02-2019 jam 00.43 ');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `idplg` varchar(20) NOT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `tgregistrasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idplg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idplg`, `pass`, `tgregistrasi`, `nama`, `alamat`, `telepon`, `kota`) VALUES
('budi@yahoo.com', '123', '2018-12-17 08:49:59', 'Budi Rahayu', 'Jalan Mijen Permai F11', '08522786578', 'Semarang'),
('sani@gmail.com', 'a7xmania', '2019-01-22 08:52:59', 'Muchamad Nur Iksani', 'Erowati', '082138370389', 'Semarang'),
('rumi@gmail.com', 'rumiyati', '2019-02-12 00:41:11', 'rumiati', 'Jl. Erowati Baru', '08811195656', 'Semarang'),
('hasan@gmail.com', 'hasan', '2019-02-12 08:01:22', 'hasan ali', 'Jl. Pahlawan', '081976548368', 'Yogyakarta'),
('gita@gmail.com', 'gita', '2019-02-12 08:02:13', 'Gita Norma', 'Jl. MT Haryono', '085686848454', 'Balikpapan');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE IF NOT EXISTS `tbuser` (
  `iduser` bigint(20) NOT NULL AUTO_INCREMENT,
  `namauser` varchar(30) DEFAULT NULL,
  `passuser` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`iduser`, `namauser`, `passuser`) VALUES
(4, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `notransaksi` varchar(13) NOT NULL DEFAULT 'TEMP',
  `tgtransaksi` date DEFAULT NULL,
  `idplg` varchar(20) DEFAULT NULL,
  `kdbrg` varchar(5) DEFAULT NULL,
  `jml` int(4) DEFAULT NULL,
  `hrg` double DEFAULT NULL,
  `status` tinyint(1) unsigned zerofill DEFAULT '0',
  `tgkirim` date DEFAULT NULL,
  `sid` varchar(50) DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `kota` varchar(100) DEFAULT NULL,
  `noresi` varchar(30) DEFAULT NULL,
  `paket` varchar(5) DEFAULT 'JNE',
  UNIQUE KEY `noorder` (`notransaksi`,`sid`,`kdbrg`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`notransaksi`, `tgtransaksi`, `idplg`, `kdbrg`, `jml`, `hrg`, `status`, `tgkirim`, `sid`, `diskon`, `alamat`, `kota`, `noresi`, `paket`) VALUES
('1812-RS/001', '2018-12-17', 'budi@yahoo.com', 'B0004', 2, 90000, 1, '2019-01-29', 'vvaq2anigdnqvcrvc4d6r6vm47', 1, 'Jalan Mijen Permai F11', 'Semarang', NULL, 'JNE'),
('1812-RS/002', '2018-12-17', 'budi@yahoo.com', 'B0004', 1, 90000, 0, NULL, 'vvaq2anigdnqvcrvc4d6r6vm47', 1, 'Jalan Mijen Permai F11', 'Semarang', NULL, 'JNE'),
('1901-RS-003', '2019-01-22', 'sani@gmail.com', 'L0025', 100, 550, 1, '2019-01-29', '1rlo6udft3hh2ardv3eu8eiae1', 10, 'Erowati', 'Semarang', NULL, 'JNE'),
('1901-RS-001', '2019-01-22', 'sani@gmail.com', 'L0023', 70, 550, 1, '2019-01-22', 'ji7fs27g89fg6lao1inusf69c6', 10, 'Erowati', 'Semarang', '36759987', 'JNE'),
('1901-RS-002', '2019-01-22', 'sani@gmail.com', 'L0025', 100, 550, 1, '2019-01-29', '7ba76nt46osjl1ceick16bv4s2', 10, 'Erowati', 'Semarang', NULL, 'JNE'),
('1901-RS-001', '2019-01-22', 'sani@gmail.com', 'L0025', 35, 550, 1, '2019-01-22', 'ji7fs27g89fg6lao1inusf69c6', 10, 'Erowati', 'Semarang', '36759987', 'JNE'),
('1902-RS-001', '2019-02-12', 'rumi@gmail.com', 'L0024', 100, 550, 1, '2019-02-12', 'sic8m80vd0g5tps9ca7m3cnb85', 10, 'Jl. Erowati Baru', 'Semarang', '36545', 'JNE');
