-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 02:18 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `no_slip` char(6) NOT NULL,
  `tanggal` date NOT NULL,
  `pendapatan` int(20) NOT NULL,
  `potongan` int(20) NOT NULL,
  `gaji_bersih` int(12) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `kode_petugas` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`no_slip`, `tanggal`, `pendapatan`, `potongan`, `gaji_bersih`, `nip`, `kode_petugas`) VALUES
('SLB001', '2019-01-03', 10500000, 1050000, 9450000, '18600001', 'PTG001'),
('SLB002', '2019-01-03', 10500000, 1050000, 9450000, '18600001', 'PTG001'),
('SLB003', '2019-01-03', 8000000, 800000, 7200000, '18600002', 'PTG001'),
('SLB004', '2019-01-03', 5600000, 560000, 5040000, '18600003', 'PTG001');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `kode_golongan` char(6) NOT NULL,
  `golongan` varchar(15) NOT NULL,
  `tj_suami_istri` int(20) NOT NULL,
  `tj_anak` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`kode_golongan`, `golongan`, `tj_suami_istri`, `tj_anak`) VALUES
('G001', 'Golongan 1', 500000, 400000),
('G002', 'Golongan 2', 600000, 500000),
('G003', 'Golongan 3', 700000, 600000),
('G004', 'Golongan 4', 800000, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kode_jabatan` char(6) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL,
  `gaji_pokok` int(30) NOT NULL,
  `tj_jabatan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kode_jabatan`, `nama_jabatan`, `gaji_pokok`, `tj_jabatan`) VALUES
('JBT001', 'Projeck Manager', 8500000, 2000000),
('JBT002', 'Senior Programmer', 6500000, 1500000),
('JBT003', 'Junior Programmer', 3800000, 1500000),
('JBT004', 'HRD', 4500000, 2000000),
('JBT005', 'staff IT', 3000000, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `nip` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `kode_jabatan` varchar(6) NOT NULL,
  `kode_golongan` varchar(6) NOT NULL,
  `status` varchar(15) NOT NULL,
  `jumlah_anak` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip`, `nama`, `tempat_lahir`, `tanggal_lahir`, `kode_jabatan`, `kode_golongan`, `status`, `jumlah_anak`) VALUES
(18600001, 'Muhammad Rizal Pahlevi', 'Mojo Pati Jawa Tengah', '2002-07-03', 'JBT001', 'G002', 'Belum Menikah', 0),
(18600002, 'Ardhi Lutfiansyah', 'Kaligarang jepara', '2002-08-01', 'JBT004', 'G004', 'Menikah', 1),
(18600003, 'Abdullah Afif Al-Asrof', 'Sirahan Pati', '2001-06-07', 'JBT005', 'G002', 'Menikah', 2);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `kode_petugas` char(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`kode_petugas`, `username`, `password`, `status`) VALUES
('PTG001', 'rizalpahlevi', 'rizalpahlevi', 'admin'),
('PTG002', 'alfian', 'alfian123', 'HRD'),
('PTG003', 'JOKO', 'wikrama', 'CEO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`no_slip`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`kode_golongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kode_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`kode_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
