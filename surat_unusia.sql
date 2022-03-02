-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2019 at 11:23 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_unusia`
--

-- --------------------------------------------------------

--
-- Table structure for table `inputmasuk`
--

CREATE TABLE `inputmasuk` (
  `agdDtdd` int(4) NOT NULL,
  `agdPli` varchar(6) NOT NULL,
  `tglTerima` varchar(10) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `nmrSrt` varchar(100) NOT NULL,
  `tglSrt` varchar(10) NOT NULL,
  `hal` text NOT NULL,
  `ket` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `input_keluar`
--

CREATE TABLE `input_keluar` (
  `no` int(4) NOT NULL,
  `jenis_surat` varchar(7) NOT NULL,
  `tgl_keluar` varchar(10) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `tembusan` text NOT NULL,
  `hal` varchar(150) NOT NULL,
  `ket` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `no` int(11) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `bulan` varchar(4) NOT NULL,
  `struktur` varchar(20) NOT NULL,
  `substantif` varchar(20) NOT NULL,
  `fasilitatif` varchar(20) NOT NULL,
  `wilayah` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `tembusan` text NOT NULL,
  `perihal` text NOT NULL,
  `keterangan` text NOT NULL,
  `creator` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`no`, `tahun`, `bulan`, `struktur`, `substantif`, `fasilitatif`, `wilayah`, `tanggal`, `kepada`, `tembusan`, `perihal`, `keterangan`, `creator`) VALUES
(1, '2018', '10', 'Rek-', '000', '01', '11', '2018-10-16', 'HARY', 'TEST', 'TEST', 'TEST', 'irpan'),
(1, '2019', '11', 'Rek-', '000', '01', '11', '2019-11-04', 'CEK', 'TEST', 'TEST', 'TEST', 'irpan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` varchar(10) NOT NULL DEFAULT 'user',
  `nama` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`, `nama`) VALUES
('swans', '202cb962ac59075b964b07152d234b70', 'admin', 'Swandoko'),
('rurry', 'c4ca4238a0b923820dcc509a6f75849b', 'admin', 'Nur Syahrurrahmah'),
('pli', 'e9907a591bf1a4d2a7b82a8cf6d71bf0', 'user', 'Seksi PLI'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'User'),
('bubu', '098eb8ba2cc924fad0ec05acd869a4eb', 'admin', 'Bubu'),
('jarot', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 'FAJAR'),
('sobirin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', 'Sobirin'),
('tri', '310dcbbf4cce62f762a2aaa148d556bd', 'admin', 'Tri Mulyadi'),
('aziz', '3c59dc048e8850243be8079a5c74d079', 'admin', 'R. Aziz Al Halim'),
('irpan', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Irpan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inputmasuk`
--
ALTER TABLE `inputmasuk`
  ADD PRIMARY KEY (`agdDtdd`);

--
-- Indexes for table `input_keluar`
--
ALTER TABLE `input_keluar`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`no`,`tahun`,`struktur`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
