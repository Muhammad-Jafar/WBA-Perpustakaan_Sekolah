-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 05:38 PM
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
(11, 'admin', 'Harry Potter', 'admin5', '827ccb0eea8a706c4c34a16891f84e7b', '800px-Gado_gado2.jpg'),
(12, 'admin', 'Novi', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'AVATAR_ADMIN-84.png'),
(13, 'admin', 'Inisialku', 'admin2', '827ccb0eea8a706c4c34a16891f84e7b', 'Pokmon-Detective-Pikachu.jpg'),
(14, 'kepsek', 'Kepala Sekolah', 'kepsek', '827ccb0eea8a706c4c34a16891f84e7b', 'AVATAR_ADMIN-85.png');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(4) NOT NULL,
  `kategori_anggota` enum('siswa','guru') NOT NULL,
  `nama_anggota` varchar(40) NOT NULL,
  `nomor_induk` int(13) NOT NULL,
  `kelas` enum('X','XI','XII') NOT NULL,
  `jurusan` enum('IPA','IPS') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `kategori_anggota`, `nama_anggota`, `nomor_induk`, `kelas`, `jurusan`) VALUES
(1, 'siswa', 'Novi Novita', 1801071001, 'XII', 'IPS'),
(2, 'guru', 'Herman', 1701071002, 'XI', 'IPA'),
(3, 'guru', 'Saputra deng deng', 1701071003, 'X', 'IPA'),
(4, 'siswa', 'Abdi', 1801071004, 'X', 'IPA'),
(5, 'guru', 'Agile', 1701071005, 'XI', 'IPA');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(4) NOT NULL,
  `id_jenis_buku` int(2) NOT NULL,
  `kategori_buku` enum('Teks-pelajaran','Non Teks-pelajaran') NOT NULL,
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

INSERT INTO `buku` (`id_buku`, `id_jenis_buku`, `kategori_buku`, `kode_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `qt`) VALUES
(1, 10, 'Teks-pelajaran', 'BUKU-00002', 'Pengantar Fisika Dasar', 'Robert Dawney Jr', 'Gramedia', '2022', 250, 10),
(2, 9, 'Non Teks-pelajaran', 'BUKU-00003', 'Filsafat Islam', 'Anonymous', 'Gramedia', '2017', 319, 6),
(3, 10, 'Non Teks-pelajaran', 'BUKU-00004', 'Materi Gelap dan Anti Materi', 'Robert Dawney Jr', 'Gramedia', '2019', 512, 4);

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_transaksi` int(4) NOT NULL,
  `id_buku` int(4) NOT NULL,
  `id_anggota` int(4) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `telat` int(3) NOT NULL,
  `denda` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_transaksi`, `id_buku`, `id_anggota`, `tgl_kembali`, `tgl_dikembalikan`, `telat`, `denda`) VALUES
(1, 3, 1, '2022-06-26', '2022-06-21', 0, 0),
(2, 1, 4, '2022-06-26', '2022-06-21', 0, 0),
(3, 3, 2, '2022-06-26', '0000-00-00', 0, 0),
(4, 1, 3, '2022-06-15', '2022-06-21', 6, 3000),
(5, 1, 1, '2022-06-26', '0000-00-00', 0, 0),
(6, 1, 1, '2022-06-10', '0000-00-00', 0, 0);

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
(9, 'Filsafat Islam'),
(10, 'Fisika Dasar'),
(11, 'Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `sk_bp`
--

CREATE TABLE `sk_bp` (
  `id_laporan` int(3) NOT NULL,
  `kode_sk` text NOT NULL,
  `perihal` text NOT NULL DEFAULT 'SK Bebas Pustaka',
  `id_anggota` int(3) NOT NULL,
  `tgl_terbit` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sk_bp`
--

INSERT INTO `sk_bp` (`id_laporan`, `kode_sk`, `perihal`, `id_anggota`, `tgl_terbit`) VALUES
(1, 'SK/Bebas Pustaka/2022/0001', 'SK Bebas Pustaka', 1, '2022-06-22'),
(2, 'SK/Bebas Pustaka/2022/0002', 'SK Bebas Pustaka', 4, '2022-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(4) NOT NULL,
  `kode_pinjam` varchar(10) NOT NULL,
  `id_buku` int(4) NOT NULL,
  `id_anggota` int(4) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL,
  `qt_pinjam` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_pinjam`, `id_buku`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `tgl_dikembalikan`, `status`, `qt_pinjam`) VALUES
(1, 'PJ-0001', 3, 1, '2022-06-21', '2022-06-26', '2022-06-21', 'dikembalikan', 0),
(2, 'PJ-0002', 1, 4, '2022-06-21', '2022-06-26', '2022-06-21', 'dikembalikan', 0),
(3, 'PJ-0003', 3, 2, '2022-06-21', '2022-06-26', '0000-00-00', 'dipinjam', 1),
(4, 'PJ-0004', 1, 3, '2022-06-10', '2022-06-15', '2022-06-21', 'dikembalikan', 0),
(5, 'PJ-0005', 1, 1, '2022-06-21', '2022-06-26', '0000-00-00', 'dipinjam', 1),
(6, 'PJ-0006', 1, 1, '2022-06-05', '2022-06-10', '0000-00-00', 'dipinjam', 1);

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
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_jenis_buku` (`id_jenis_buku`) USING BTREE;

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`id_jenis_buku`);

--
-- Indexes for table `sk_bp`
--
ALTER TABLE `sk_bp`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `id_jenis_buku` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sk_bp`
--
ALTER TABLE `sk_bp`
  MODIFY `id_laporan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
