-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 06:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pustaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `level_user` enum('admin','kepsek') NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `level_user`, `nama_admin`, `username`, `password`, `avatar`) VALUES
(3, 'kepsek', 'Kepala Sekolah', 'kepsek', '12345', 'avatar2.png'),
(4, 'admin', 'Inisialku', 'superadmin', '827ccb0eea8a706c4c34a16891f84e7b', 'avatar.png'),
(5, 'admin', 'Novi', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(2) NOT NULL,
  `id_jenis_buku` int(2) NOT NULL,
  `id_kategori_buku` int(2) NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `pengarang` varchar(25) NOT NULL,
  `penerbit` varchar(20) NOT NULL,
  `tahun_terbit` varchar(5) NOT NULL,
  `jumlah_halaman` int(10) NOT NULL,
  `qt` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_jenis_buku`, `id_kategori_buku`, `kode_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `qt`) VALUES
(1, 10, 1, 'BUKU-00001', 'Pengantar Fisika Dasar', 'Robert Dawney Jr', 'MCU', '2018', 210, 12),
(2, 5, 2, 'BUKU-00002', 'Pengantar Filsafat', 'dr. Strange', 'MCU', '2016', 314, 21),
(3, 5, 2, 'BUKU-00003', 'Filsafat Islam', 'Anonymous', 'Gramedia', '2015', 215, 15),
(4, 1, 1, 'BUKU-00004', 'Kimia Dasar untuk kelas X', 'Robert Dawney Jr', 'Gramedia', '2018', 260, 12);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_transaksi` int(2) NOT NULL,
  `id_buku` int(2) NOT NULL,
  `id_siswa` int(2) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `telat` int(3) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_transaksi`, `id_buku`, `id_siswa`, `tgl_kembali`, `tgl_dikembalikan`, `telat`, `denda`) VALUES
(1, 1, 1, '2022-06-10', '2022-06-14', 4, 2000),
(2, 1, 1, '2022-06-05', '2022-06-14', 9, 4500),
(3, 1, 1, '2022-06-10', '2022-06-14', 4, 2000),
(4, 1, 1, '2022-06-12', '2022-06-14', 2, 1000),
(5, 2, 2, '2022-06-15', '2022-06-14', 0, 0),
(6, 1, 1, '2022-06-05', '2022-06-14', 9, 4500),
(7, 2, 2, '2022-06-15', '2022-06-14', 0, 0),
(8, 1, 5, '2022-06-17', '2022-06-14', 0, 0),
(9, 2, 2, '2022-06-15', '2022-06-14', 0, 0),
(10, 1, 1, '2022-06-19', '2022-06-14', 0, 0),
(11, 2, 1, '2022-06-10', '2022-06-14', 4, 0),
(12, 1, 1, '2022-06-10', '2022-06-14', 4, 2000),
(13, 2, 2, '2022-06-12', '2022-06-14', 2, 1000),
(14, 2, 5, '2022-06-16', '2022-06-14', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_buku`
--

CREATE TABLE `jenis_buku` (
  `id_jenis_buku` int(2) NOT NULL,
  `jenis_buku` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_buku`
--

INSERT INTO `jenis_buku` (`id_jenis_buku`, `jenis_buku`) VALUES
(1, 'Ilmu Pengetahuan Alam ( IPA )'),
(2, 'Ilmu Pengetahuan Sosial ( IPS )'),
(3, 'Matematika'),
(4, 'Informatika'),
(5, 'Filsafat'),
(6, 'Humaniora'),
(7, 'Sejarah Indonesia'),
(8, 'Biologi'),
(9, 'Filsafat Islam'),
(10, 'Fisika Murni'),
(11, 'Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id_kategori_buku` int(2) NOT NULL,
  `kategori_buku` enum('Teks-pelajaran','Non Teks-pelajaran') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id_kategori_buku`, `kategori_buku`) VALUES
(1, 'Teks-pelajaran'),
(2, 'Non Teks-pelajaran');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(2) NOT NULL,
  `level_user` enum('siswa') NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `nis` int(10) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `jurusan` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `level_user`, `nama_siswa`, `nis`, `kelas`, `jurusan`) VALUES
(1, 'siswa', 'Novi', 1801071001, 'XI', 'IPA'),
(2, 'siswa', 'Herman', 1801071002, 'X', 'IPS'),
(3, 'siswa', 'Pak Botak', 1801071003, 'XII', 'Bahasa'),
(4, 'siswa', 'Steve Roger', 1801071004, 'XI', 'IPA'),
(5, 'siswa', 'Robert Dawney Jr', 1801071005, 'XII', 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(2) NOT NULL,
  `kode_pinjam` varchar(10) NOT NULL,
  `id_buku` int(2) NOT NULL,
  `id_siswa` int(2) NOT NULL,
  `tgl_pinjam` date NOT NULL DEFAULT current_timestamp(),
  `tgl_kembali` date NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL,
  `qt_pinjam` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_pinjam`, `id_buku`, `id_siswa`, `tgl_pinjam`, `tgl_kembali`, `tgl_dikembalikan`, `status`, `qt_pinjam`) VALUES
(1, 'PJ-0001', 1, 1, '2022-06-05', '2022-06-10', '2022-06-14', 'dikembalikan', 0),
(2, 'PJ-0002', 1, 1, '2022-06-01', '2022-06-05', '2022-06-14', 'dikembalikan', 0),
(3, 'PJ-0003', 1, 1, '2022-06-05', '2022-06-10', '2022-06-14', 'dikembalikan', 0),
(4, 'PJ-0004', 1, 1, '2022-06-07', '2022-06-12', '2022-06-14', 'dikembalikan', 0),
(5, 'PJ-0005', 2, 2, '2022-06-10', '2022-06-15', '2022-06-14', 'dikembalikan', 0),
(6, 'PJ-0006', 1, 1, '2022-06-01', '2022-06-05', '2022-06-14', 'dikembalikan', 0),
(7, 'PJ-0007', 2, 2, '2022-06-10', '2022-06-15', '2022-06-14', 'dikembalikan', 0),
(8, 'PJ-0008', 1, 5, '2022-06-12', '2022-06-17', '2022-06-14', 'dikembalikan', 0),
(9, 'PJ-0009', 2, 2, '2022-06-10', '2022-06-15', '2022-06-14', 'dikembalikan', 0),
(10, 'PJ-0010', 1, 1, '2022-06-14', '2022-06-19', '2022-06-14', 'dikembalikan', 0),
(11, 'PJ-0011', 2, 1, '2022-06-05', '2022-06-10', '2022-06-14', 'dikembalikan', 0),
(12, 'PJ-0012', 1, 1, '2022-06-05', '2022-06-10', '2022-06-14', 'dikembalikan', 0),
(13, 'PJ-0013', 2, 2, '2022-06-07', '2022-06-12', '2022-06-14', 'dikembalikan', 0),
(14, 'PJ-0014', 2, 5, '2022-06-11', '2022-06-16', '2022-06-14', 'dikembalikan', 0);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `denda` AFTER UPDATE ON `transaksi` FOR EACH ROW BEGIN
	IF NEW.tgl_dikembalikan > NEW.tgl_kembali THEN
    	UPDATE denda SET denda = denda + (500 * telat)
    	WHERE id_transaksi = NEW.id_transaksi;
    ELSEIF NEW.tgl_dikembalikan <= NEW.tgl_kembali THEN
    	UPDATE denda SET denda = 0
    	WHERE id_transaksi = NEW.id_transaksi;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kembali` AFTER UPDATE ON `transaksi` FOR EACH ROW BEGIN
	UPDATE buku SET qt = (qt + OLD.qt_pinjam) - NEW.qt_pinjam
    WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pinjam` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE buku SET qt = qt - NEW.qt_pinjam
    WHERE id_buku = NEW.id_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `telat` AFTER UPDATE ON `transaksi` FOR EACH ROW BEGIN
	UPDATE denda SET tgl_dikembalikan = NEW.tgl_dikembalikan WHERE id_transaksi = NEW.id_transaksi;
    
    IF NEW.tgl_dikembalikan > NEW.tgl_kembali THEN
    	UPDATE denda SET telat = datediff(NEW.tgl_dikembalikan,tgl_kembali)
		WHERE id_transaksi = NEW.id_transaksi;
    ELSEIF NEW.tgl_dikembalikan <= NEW.tgl_kembali THEN
    	UPDATE denda SET telat = 0
		WHERE id_transaksi = NEW.id_transaksi;
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_jenis_buku` (`id_jenis_buku`,`id_kategori_buku`),
  ADD KEY `id_kategori_buku` (`id_kategori_buku`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_buku` (`id_buku`,`id_siswa`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`id_jenis_buku`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id_kategori_buku`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_buku` (`id_buku`,`id_siswa`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_transaksi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `id_jenis_buku` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id_kategori_buku` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_jenis_buku`) REFERENCES `jenis_buku` (`id_jenis_buku`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_kategori_buku`) REFERENCES `kategori_buku` (`id_kategori_buku`);

--
-- Constraints for table `denda`
--
ALTER TABLE `denda`
  ADD CONSTRAINT `denda_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `denda_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `denda_ibfk_3` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
