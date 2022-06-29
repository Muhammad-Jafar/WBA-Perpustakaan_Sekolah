-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2022 pada 15.15
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `level_user`, `nama_admin`, `username`, `password`, `avatar`) VALUES
(11, 'admin', 'Harry Potter', 'admin5', '827ccb0eea8a706c4c34a16891f84e7b', '800px-Gado_gado2.jpg'),
(12, 'admin', 'Novi Novita', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'AVATAR_ADMIN-84.png'),
(13, 'admin', 'Ade Irawansyah', 'admin2', '827ccb0eea8a706c4c34a16891f84e7b', 'Pokmon-Detective-Pikachu.jpg'),
(14, 'kepsek', 'Kepala Sekolah', 'kepsek', '827ccb0eea8a706c4c34a16891f84e7b', 'AVATAR_ADMIN-85.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
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
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `kategori_anggota`, `nama_anggota`, `nomor_induk`, `kelas`, `jurusan`) VALUES
(1, 'siswa', 'Adel Kurniansyah', 3478, 'X', 'IPA'),
(2, 'guru', 'Herman', 1701071002, 'XI', 'IPA'),
(3, 'guru', 'Saputra deng deng', 1701071003, 'X', 'IPA'),
(4, 'siswa', 'Aidil Saputra', 3882, 'X', 'IPA'),
(5, 'guru', 'Agile', 1701071005, 'XI', 'IPA'),
(6, 'siswa', 'Andi Rezy Munadil Athfal', 2893, 'X', 'IPA'),
(7, 'siswa', 'Apri Atmaja', 2899, 'X', 'IPA'),
(8, 'siswa', 'Aril Saputra', 3902, 'X', 'IPA'),
(9, 'siswa', 'Bulan Nurmandani Saputri', 2908, 'X', 'IPA'),
(10, 'siswa', 'Citra Puspita Loka', 3911, 'X', 'IPA'),
(11, 'siswa', 'Destita Fuja Reskika', 3913, 'X', 'IPA'),
(12, 'siswa', 'Feti Afrillia', 3931, 'X', 'IPA'),
(13, 'siswa', 'Chesza Aura Aryan Viandra K.', 3936, 'X', 'IPA'),
(14, 'siswa', 'Heldi Irwansyah', 3838, 'X', 'IPA'),
(15, 'siswa', 'Imam Alfarizi', 3945, 'X', 'IPA'),
(16, 'siswa', 'Kadek Ari Purbawa', 3956, 'X', 'IPA'),
(17, 'siswa', 'Mardiana', 3955, 'X', 'IPA'),
(18, 'siswa', 'Marliana Kartika Wati', 3957, 'X', 'IPA'),
(19, 'siswa', 'Muhammad Alfan Ibram', 3972, 'X', 'IPA'),
(20, 'siswa', 'Nazilatuzzaskia Maudy', 3977, 'X', 'IPA'),
(21, 'siswa', 'Nurul Sri Ramdani', 3990, 'X', 'IPA'),
(22, 'siswa', 'Rabbani Khalifatul Ardy', 3999, 'X', 'IPA'),
(23, 'siswa', 'Rina Rianti', 4012, 'X', 'IPA'),
(24, 'siswa', 'Ryan Saputra', 4020, 'X', 'IPA'),
(25, 'siswa', 'Sandi Suci Ramdhani', 4025, 'X', 'IPA'),
(26, 'siswa', 'Sapriadi', 4027, 'X', 'IPA'),
(27, 'siswa', 'Siska Olivia', 4031, 'X', 'IPA'),
(28, 'siswa', 'Sri Amalia', 4035, 'X', 'IPA'),
(29, 'siswa', 'Sri Ulandari', 4036, 'X', 'IPA'),
(30, 'siswa', 'Tania Assyahra', 4045, 'X', 'IPA'),
(31, 'siswa', 'Tohri Jazadi', 4049, 'X', 'IPA'),
(32, 'siswa', 'Wulan Dari', 4054, 'X', 'IPA'),
(33, 'siswa', 'Yendi Arfani', 4055, 'X', 'IPA'),
(34, 'siswa', 'Zaki Alfata', 4056, 'X', 'IPA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
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
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_jenis_buku`, `kategori_buku`, `kode_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `qt`) VALUES
(1, 14, 'Teks-pelajaran', 'BUKU-00002', 'Pendidikan Pancasila dan Kewarganegaraan', 'Soemaryoto', 'PT.Gramedia Pustaka ', '2018', 228, 12),
(2, 5, 'Non Teks-pelajaran', 'BUKU-00003', 'Filsafat Dasar', 'Rahmad wirawan', 'PT.Gramedia', '2017', 319, 6),
(3, 10, 'Non Teks-pelajaran', 'BUKU-00004', 'Gaya Gravitasi', 'Robert Dawney Jr', 'PT.Gramedia', '2019', 512, 3),
(5, 5, 'Teks-pelajaran', 'BUKU-00005', 'Prakarya dan kewirausahaan kls XII', 'Hendriana Werdhaningsih, ', 'PT.Gramedia', '2018', 298, 10),
(6, 13, 'Teks-pelajaran', 'BUKU-00006', 'Pendidikan Jasmani, Olahraga dan Kesehatan', 'Soemaryoto, dkk', 'PT.Gramedia', '2018', 140, 15),
(7, 5, 'Teks-pelajaran', 'BUKU-00007', 'Sosiologi XII ', 'Muhammad Taufan, dkk', 'PT.Gramedia', '2018', 256, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `denda`
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
-- Dumping data untuk tabel `denda`
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
-- Struktur dari tabel `jenis_buku`
--

CREATE TABLE `jenis_buku` (
  `id_jenis_buku` int(2) NOT NULL,
  `jenis_buku` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_buku`
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
(11, 'Budaya'),
(12, 'Kesenian'),
(13, 'Olahraga'),
(14, 'Kewarganegaraan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sk_bp`
--

CREATE TABLE `sk_bp` (
  `id_laporan` int(3) NOT NULL,
  `kode_sk` text NOT NULL,
  `perihal` text NOT NULL DEFAULT 'SK Bebas Pustaka',
  `id_anggota` int(3) NOT NULL,
  `tgl_terbit` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sk_bp`
--

INSERT INTO `sk_bp` (`id_laporan`, `kode_sk`, `perihal`, `id_anggota`, `tgl_terbit`) VALUES
(1, 'SK/Bebas Pustaka/2022/0001', 'SK Bebas Pustaka', 1, '2022-06-22'),
(2, 'SK/Bebas Pustaka/2022/0002', 'SK Bebas Pustaka', 4, '2022-06-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
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
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_pinjam`, `id_buku`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `tgl_dikembalikan`, `status`, `qt_pinjam`) VALUES
(1, 'PJ-0001', 3, 1, '2022-06-21', '2022-06-26', '2022-06-21', 'dikembalikan', 0),
(2, 'PJ-0002', 1, 4, '2022-06-21', '2022-06-26', '2022-06-21', 'dikembalikan', 0),
(3, 'PJ-0003', 3, 2, '2022-06-21', '2022-06-26', '0000-00-00', 'dipinjam', 1),
(4, 'PJ-0004', 1, 3, '2022-06-10', '2022-06-15', '2022-06-21', 'dikembalikan', 0),
(5, 'PJ-0005', 1, 1, '2022-06-21', '2022-06-26', '0000-00-00', 'dipinjam', 1),
(6, 'PJ-0006', 1, 1, '2022-06-05', '2022-06-10', '0000-00-00', 'dipinjam', 1);

--
-- Trigger `transaksi`
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
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_jenis_buku` (`id_jenis_buku`) USING BTREE;

--
-- Indeks untuk tabel `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `jenis_buku`
--
ALTER TABLE `jenis_buku`
  ADD PRIMARY KEY (`id_jenis_buku`);

--
-- Indeks untuk tabel `sk_bp`
--
ALTER TABLE `sk_bp`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `denda`
--
ALTER TABLE `denda`
  MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis_buku`
--
ALTER TABLE `jenis_buku`
  MODIFY `id_jenis_buku` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `sk_bp`
--
ALTER TABLE `sk_bp`
  MODIFY `id_laporan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
