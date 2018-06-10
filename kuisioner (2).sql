-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2018 at 07:11 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kuisioner`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_ipk`
--

CREATE TABLE `data_ipk` (
  `id_data_ipk` int(10) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `nilai` int(10) NOT NULL,
  `id_item_ipk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_pilihan`
--

CREATE TABLE `data_pilihan` (
  `id_data_pilihan` int(10) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `id_jurusan` int(10) NOT NULL,
  `id_pilihan` int(10) NOT NULL,
  `nik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nik` varchar(30) NOT NULL,
  `nama_dosen` varchar(200) NOT NULL,
  `status` enum('tetap','tidak_tetap','','') NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `nama_dosen`, `status`, `password`) VALUES
('1232', 'gede arta', 'tetap', '123456'),
('234453435', 'Hendra Suputra', 'tetap', '123456'),
('4324234', 'agung rahaja', 'tidak_tetap', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `item_ipk`
--

CREATE TABLE `item_ipk` (
  `id_item_ipk` int(10) NOT NULL,
  `nama_mahasiswa` varchar(30) NOT NULL,
  `kuisioner` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(10) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Ilmu komputer'),
(2, 'farmasi'),
(3, 'kimia'),
(4, 'matematika');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `kode_matakuliah` varchar(10) NOT NULL,
  `tahun` varchar(8) NOT NULL,
  `semester` enum('ganjil','genap') NOT NULL,
  `nik` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kode_matakuliah`, `tahun`, `semester`, `nik`) VALUES
(1, 'BC11', 'ik1324', '2018', 'genap', '1232'),
(2, 'BC11', 'ik324324', '2018', 'genap', '4324234'),
(3, 'BD12', 'ik5623', '2018', 'genap', '234453435');

-- --------------------------------------------------------

--
-- Table structure for table `krs`
--

CREATE TABLE `krs` (
  `id_krs` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `nim` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama_mahasiswa` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `password`) VALUES
('1508605003', 'wiratmajaya', '123456'),
('1508605002', 'Budi astawa', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `kode_matakuliah` varchar(10) NOT NULL,
  `nama_matakuliah` varchar(100) NOT NULL,
  `id_jurusan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`kode_matakuliah`, `nama_matakuliah`, `id_jurusan`) VALUES
('ik1324', 'GIS', 1),
('ik324324', 'JST', 1),
('ik4563', 'spk', 1),
('ik5623', 'web', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pilihan`
--

CREATE TABLE `pilihan` (
  `id_pilihan` int(10) NOT NULL,
  `pilihan` varchar(500) NOT NULL,
  `isDipakai` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pilihan`
--

INSERT INTO `pilihan` (`id_pilihan`, `pilihan`, `isDipakai`) VALUES
(1, 'Penguasan dan kemampuan menjelaskan materi', 'no'),
(2, 'kemampuan menjawab pertanyaan', 'no'),
(3, 'Kemampuan memberikan motivasi kepada siswa', 'no'),
(4, 'kemampuan membuat suasana kelas yang menyenangkan', 'no'),
(5, 'kedisiplinan dalam perkuliahan', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_ipk`
--
ALTER TABLE `data_ipk`
  ADD PRIMARY KEY (`id_data_ipk`);

--
-- Indexes for table `data_pilihan`
--
ALTER TABLE `data_pilihan`
  ADD PRIMARY KEY (`id_data_pilihan`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `item_ipk`
--
ALTER TABLE `item_ipk`
  ADD PRIMARY KEY (`id_item_ipk`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `krs`
--
ALTER TABLE `krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`kode_matakuliah`);

--
-- Indexes for table `pilihan`
--
ALTER TABLE `pilihan`
  ADD PRIMARY KEY (`id_pilihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_ipk`
--
ALTER TABLE `data_ipk`
  MODIFY `id_data_ipk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pilihan`
--
ALTER TABLE `data_pilihan`
  MODIFY `id_data_pilihan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_ipk`
--
ALTER TABLE `item_ipk`
  MODIFY `id_item_ipk` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `krs`
--
ALTER TABLE `krs`
  MODIFY `id_krs` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pilihan`
--
ALTER TABLE `pilihan`
  MODIFY `id_pilihan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
