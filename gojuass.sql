-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 07:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gojuass`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `Id_Anggota` varchar(20) NOT NULL,
  `Nama_Anggota` varchar(25) DEFAULT NULL,
  `TL` date DEFAULT NULL,
  `JK` varchar(2) DEFAULT NULL,
  `Jenis_Tingkatansabuk` varchar(20) NOT NULL,
  `Tempat_Lahir` varchar(20) DEFAULT NULL,
  `No_hp` varchar(15) DEFAULT NULL,
  `Alamat` varchar(25) DEFAULT NULL,
  `Surat_izin_ortu` varchar(50) DEFAULT NULL,
  `Id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`Id_Anggota`, `Nama_Anggota`, `TL`, `JK`, `Jenis_Tingkatansabuk`, `Tempat_Lahir`, `No_hp`, `Alamat`, `Surat_izin_ortu`, `Id_user`) VALUES
('12', 'wahyudi', '2024-04-01', 'L', 'Jenis Tingkatan Satu', 'solok', '123456', 'adsd', NULL, 45);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujian`
--

CREATE TABLE `hasil_ujian` (
  `No_ujian` int(15) NOT NULL,
  `Id_Anggota` varchar(20) DEFAULT NULL,
  `Hasil_ujian` varchar(255) DEFAULT NULL,
  `Nama_Anggota` varchar(25) DEFAULT NULL,
  `Kode_Jadwalujian` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `Kode_Jadwalujian` int(20) NOT NULL,
  `Nama_Jadwalujian` varchar(20) DEFAULT NULL,
  `Tanggal_Ujian` date DEFAULT NULL,
  `Ketua` varchar(20) DEFAULT NULL,
  `Isi_Pengumuman` varchar(100) DEFAULT NULL,
  `Penguji` varchar(20) DEFAULT NULL,
  `Panitia` varchar(20) DEFAULT NULL,
  `Tempat_Pelaksanaan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_tingkatan`
--

CREATE TABLE `jenis_tingkatan` (
  `Nama_Tingkatan` varchar(10) NOT NULL,
  `Keterangan` varchar(15) NOT NULL,
  `Jenis_Tingkatansabuk` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis_tingkatan`
--

INSERT INTO `jenis_tingkatan` (`Nama_Tingkatan`, `Keterangan`, `Jenis_Tingkatansabuk`) VALUES
('tingkatan ', 'sabuk merah', 'Jenis Tingkatan Satu');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `Tanggal_Kegiatan` date NOT NULL,
  `Kode_Kegiatan` varchar(20) NOT NULL,
  `Nama_Kegiatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`Tanggal_Kegiatan`, `Kode_Kegiatan`, `Nama_Kegiatan`) VALUES
('2024-04-24', '1', 'naik tingkat');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `Status` varchar(15) NOT NULL,
  `Kode_Kegiatan` varchar(20) NOT NULL,
  `Id_Anggota` varchar(20) NOT NULL,
  `Tanggal_Presensi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`Status`, `Kode_Kegiatan`, `Id_Anggota`, `Tanggal_Presensi`) VALUES
('Izin', '12', '3', '2022-12-23'),
('Hadir', '13', '3', '2022-12-14'),
('Hadir', '12', '4', '2022-12-23'),
('Hadir', '12', '7', '2022-11-30'),
('Hadir', '13', '7', '2022-12-14'),
('Hadir', '123', '42', '2024-04-08'),
('', '123', '', '0000-00-00'),
('', '1235', '', '0000-00-00'),
('Hadir', '1235', '7', '2024-04-06'),
('Hadir', '123', '7', '2024-04-07'),
('Hadir', '1234567', '7', '2024-04-08'),
('Hadir', '1234567', '5', '2024-04-08'),
('Hadir', '1235', '5', '2024-04-06'),
('Hadir', '13', '5', '2024-04-07'),
('Hadir', '13', '6', '2024-04-07'),
('Hadir', '123', '6', '2024-04-07'),
('Hadir', '123', '76', '2024-04-07'),
('Izin', '13', '76', '2024-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `Id_user` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `level` enum('admin','anggota') DEFAULT NULL,
  `status` varchar(110) DEFAULT NULL,
  `foto_user` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`Id_user`, `email`, `password`, `nama_lengkap`, `level`, `status`, `foto_user`) VALUES
(1, 'admin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'pelatih/admin', 'admin', 'active', ''),
(44, 'meisya@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'mesa', 'anggota', 'active', 'default.png'),
(45, 'wahyudi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'wahyudi', 'anggota', 'active', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`Id_Anggota`),
  ADD KEY `Jenis_Tingkatansabuk` (`Jenis_Tingkatansabuk`);

--
-- Indexes for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD PRIMARY KEY (`No_ujian`),
  ADD KEY `Anggota` (`Id_Anggota`);

--
-- Indexes for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`Kode_Jadwalujian`);

--
-- Indexes for table `jenis_tingkatan`
--
ALTER TABLE `jenis_tingkatan`
  ADD PRIMARY KEY (`Jenis_Tingkatansabuk`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`Kode_Kegiatan`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD KEY `Kode_Kegiatan` (`Kode_Kegiatan`),
  ADD KEY `Id_Anggota` (`Id_Anggota`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`Id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  MODIFY `No_ujian` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `Kode_Jadwalujian` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD CONSTRAINT `hasil_ujian_ibfk_1` FOREIGN KEY (`Id_Anggota`) REFERENCES `anggota` (`Id_Anggota`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
