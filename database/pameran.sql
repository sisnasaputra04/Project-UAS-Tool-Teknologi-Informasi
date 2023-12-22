-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Des 2023 pada 17.00
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pameran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email`, `password`, `alamat`, `telp`) VALUES
(1, 'sisna', 'sisna@gmail.com', 'e6af919be92774212f0e536d2077cf11', 'Batuyang', '082222222222'),
(4, 'apri', 'apri@gmail.com', 'apri123', 'Gang Panji', '082222222222'),
(7, 'Ryan', 'ryan@gmail.com', '10c7ccc7a4f0aff03c915c485565b9da', 'Batuyang', '082222222222'),
(8, 'putri', 'putri@gmail', 'cHV0cmk=', 'Batubulan', '082222222222'),
(12, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Jalan Udayana', '08123456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Rekayasa Perangkat Lunak'),
(2, 'Animasi'),
(5, 'Lukis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Lukisan'),
(3, 'Desain'),
(5, 'TI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `foto_produk` longblob DEFAULT NULL,
  `tgl_pembuatan` date NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `foto_produk`, `tgl_pembuatan`, `id_siswa`, `id_kategori`) VALUES
(2, 'Lukisan', 'Lukisan Logo', 0x576861747341707020496d61676520323032322d30392d31392061742031312e34362e33322e6a706567, '2022-11-14', 1, 1),
(7, 'Logo Sekolah', 'Sekolah SMK', 0x576861747341707020496d61676520323032322d30392d31382061742031342e34362e35342e6a706567, '2022-11-22', 14, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `nis` int(4) NOT NULL,
  `jenis_kelamin` varchar(2) NOT NULL,
  `foto_siswa` longblob DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `kelas`, `nis`, `jenis_kelamin`, `foto_siswa`, `tgl_lahir`, `alamat`, `telp`, `email`, `angkatan`, `id_jurusan`) VALUES
(1, 'sisna', 'XIIRPL', 7777, 'L', NULL, '2012-12-12', 'batuyang', '082222222222', 'sisna@gmail.com', 2020, 1),
(14, 'putri', 'XI', 2222, 'P', '', '2022-11-13', 'Gang Panji', '082222222222', 'ssss@gmail.com', 1111, 2),
(37, '11', '11', 11, 'P', 0x576861747341707020496d61676520323032322d30392d31382061742031342e34352e32342e6a706567, '2022-11-26', '11', '0822222222221', 'admin@gmail.com', 11, 1),
(39, 'test', 'test', 1, 'P', '', '2022-11-19', 'Batubulan', '082222222222', 's@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewproduk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewproduk` (
`id_produk` int(11)
,`nama_produk` varchar(50)
,`deskripsi_produk` text
,`foto_produk` longblob
,`tgl_pembuatan` date
,`id_siswa` int(11)
,`id_kategori` int(11)
,`nama_kategori` varchar(25)
,`nama_siswa` varchar(50)
,`kelas` varchar(10)
,`nis` int(4)
,`jenis_kelamin` varchar(2)
,`foto_siswa` longblob
,`tgl_lahir` date
,`alamat` varchar(100)
,`telp` varchar(15)
,`email` varchar(30)
,`angkatan` int(4)
,`id_jurusan` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewsiswa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewsiswa` (
`id_siswa` int(11)
,`nama_siswa` varchar(50)
,`kelas` varchar(10)
,`nis` int(4)
,`jenis_kelamin` varchar(2)
,`foto_siswa` longblob
,`tgl_lahir` date
,`alamat` varchar(100)
,`telp` varchar(15)
,`email` varchar(30)
,`angkatan` int(4)
,`id_jurusan` int(11)
,`nama_jurusan` varchar(35)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `viewproduk`
--
DROP TABLE IF EXISTS `viewproduk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewproduk`  AS SELECT `produk`.`id_produk` AS `id_produk`, `produk`.`nama_produk` AS `nama_produk`, `produk`.`deskripsi_produk` AS `deskripsi_produk`, `produk`.`foto_produk` AS `foto_produk`, `produk`.`tgl_pembuatan` AS `tgl_pembuatan`, `produk`.`id_siswa` AS `id_siswa`, `produk`.`id_kategori` AS `id_kategori`, `kategori`.`nama_kategori` AS `nama_kategori`, `siswa`.`nama_siswa` AS `nama_siswa`, `siswa`.`kelas` AS `kelas`, `siswa`.`nis` AS `nis`, `siswa`.`jenis_kelamin` AS `jenis_kelamin`, `siswa`.`foto_siswa` AS `foto_siswa`, `siswa`.`tgl_lahir` AS `tgl_lahir`, `siswa`.`alamat` AS `alamat`, `siswa`.`telp` AS `telp`, `siswa`.`email` AS `email`, `siswa`.`angkatan` AS `angkatan`, `siswa`.`id_jurusan` AS `id_jurusan` FROM ((`produk` join `kategori`) join `siswa`) WHERE `produk`.`id_kategori` = `kategori`.`id_kategori` AND `produk`.`id_siswa` = `siswa`.`id_siswa``id_siswa`  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `viewsiswa`
--
DROP TABLE IF EXISTS `viewsiswa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewsiswa`  AS SELECT `siswa`.`id_siswa` AS `id_siswa`, `siswa`.`nama_siswa` AS `nama_siswa`, `siswa`.`kelas` AS `kelas`, `siswa`.`nis` AS `nis`, `siswa`.`jenis_kelamin` AS `jenis_kelamin`, `siswa`.`foto_siswa` AS `foto_siswa`, `siswa`.`tgl_lahir` AS `tgl_lahir`, `siswa`.`alamat` AS `alamat`, `siswa`.`telp` AS `telp`, `siswa`.`email` AS `email`, `siswa`.`angkatan` AS `angkatan`, `siswa`.`id_jurusan` AS `id_jurusan`, `jurusan`.`nama_jurusan` AS `nama_jurusan` FROM (`siswa` join `jurusan`) WHERE `siswa`.`id_jurusan` = `jurusan`.`id_jurusan``id_jurusan`  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_siswa` (`id_siswa`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
