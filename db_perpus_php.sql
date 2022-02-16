-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2022 pada 18.09
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus_php`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `yo_anggota`
--

CREATE TABLE `yo_anggota` (
  `id_anggota` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `kelas` varchar(4) NOT NULL,
  `no_telp` int(10) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'default.png',
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yo_anggota`
--

INSERT INTO `yo_anggota` (`id_anggota`, `nama`, `username`, `password`, `alamat`, `email`, `kelas`, `no_telp`, `photo`, `level`) VALUES
(2, 'anggota123', 'anggota', 'anggota', 'anggota', 'anggota@gmail.com', '', 123455555, '1645020418_cute-boy-cartoon-2.jpg', 'user'),
(12, 'admin', 'admin', 'admin', 'anggota', 'anggota@gmail.com', '', 2147483647, '1645020418_cute-boy-cartoon-2.jpg', 'ad'),
(14, 'Akun Coba', 'Akun', 'helloworld12', 'Hello World', 'kerjaannatanael@gmail.com', '4ba5', 2147483647, 'default.png', 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yo_buku`
--

CREATE TABLE `yo_buku` (
  `id_buku` int(3) NOT NULL,
  `kd_pengarang` varchar(10) NOT NULL,
  `kd_penerbit` varchar(10) NOT NULL,
  `Isbn` int(30) NOT NULL,
  `judul` text NOT NULL,
  `tahun_terbit` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(150) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yo_buku`
--

INSERT INTO `yo_buku` (`id_buku`, `kd_pengarang`, `kd_penerbit`, `Isbn`, `judul`, `tahun_terbit`, `jumlah`, `tanggal_masuk`, `deskripsi`, `gambar`, `status`) VALUES
(68, '2', '1', 123, 'coba', 2000, 6, '2022-02-22', 'asd', '1645544633_320368.png', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yo_peminjaman`
--

CREATE TABLE `yo_peminjaman` (
  `id_peminjam` int(5) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(4) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `deskripsi` varchar(40) NOT NULL,
  `status_peminjaman` int(3) NOT NULL COMMENT 'status 1 = belum kembali'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yo_peminjaman`
--

INSERT INTO `yo_peminjaman` (`id_peminjam`, `id_buku`, `id_anggota`, `tgl_pinjam`, `deskripsi`, `status_peminjaman`) VALUES
(41, 68, 2, '2022-02-22', '123', 0);

--
-- Trigger `yo_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `hapuspinjam` AFTER DELETE ON `yo_peminjaman` FOR EACH ROW BEGIN 
	UPDATE yo_buku 
	SET yo_buku.jumlah = yo_buku.jumlah + 1 WHERE yo_buku.id_buku= old.id_buku; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `kurangi_stok_buku` AFTER INSERT ON `yo_peminjaman` FOR EACH ROW BEGIN
	UPDATE yo_buku 
    SET yo_buku.jumlah = yo_buku.jumlah - 1
    WHERE yo_buku.id_buku=New.id_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `yo_penerbit`
--

CREATE TABLE `yo_penerbit` (
  `kd_penerbit` int(5) NOT NULL,
  `penerbit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yo_penerbit`
--

INSERT INTO `yo_penerbit` (`kd_penerbit`, `penerbit`) VALUES
(1, 'PT.Perahu'),
(2, 'PT.SikAsik'),
(3, 'PT.Tahu'),
(4, 'PT.Lampu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yo_pengarang`
--

CREATE TABLE `yo_pengarang` (
  `kd_pengarang` int(5) NOT NULL,
  `pengarang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yo_pengarang`
--

INSERT INTO `yo_pengarang` (`kd_pengarang`, `pengarang`) VALUES
(1, 'Sapri Sihombing'),
(2, 'Tatalu Lala'),
(3, 'Minang Kubo'),
(4, 'Oda Bidada'),
(5, 'Kutu tutung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `yo_pengembalian`
--

CREATE TABLE `yo_pengembalian` (
  `id_kembali` int(3) NOT NULL,
  `id_buku` int(3) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `tgl_kembali` varchar(10) NOT NULL,
  `denda` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `yo_pengembalian`
--

INSERT INTO `yo_pengembalian` (`id_kembali`, `id_buku`, `id_pinjam`, `tgl_kembali`, `denda`) VALUES
(19, 68, 41, '2022/02/22', '-');

--
-- Trigger `yo_pengembalian`
--
DELIMITER $$
CREATE TRIGGER `pengembalian` AFTER INSERT ON `yo_pengembalian` FOR EACH ROW BEGIN
	UPDATE yo_buku 
    SET yo_buku.jumlah = yo_buku.jumlah + 1
    WHERE yo_buku.id_buku=New.id_buku;
    UPDATE yo_peminjaman
    SET yo_peminjaman.status_peminjaman = '0';
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `yo_anggota`
--
ALTER TABLE `yo_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `yo_buku`
--
ALTER TABLE `yo_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `yo_peminjaman`
--
ALTER TABLE `yo_peminjaman`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indeks untuk tabel `yo_penerbit`
--
ALTER TABLE `yo_penerbit`
  ADD PRIMARY KEY (`kd_penerbit`);

--
-- Indeks untuk tabel `yo_pengarang`
--
ALTER TABLE `yo_pengarang`
  ADD PRIMARY KEY (`kd_pengarang`);

--
-- Indeks untuk tabel `yo_pengembalian`
--
ALTER TABLE `yo_pengembalian`
  ADD PRIMARY KEY (`id_kembali`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `yo_anggota`
--
ALTER TABLE `yo_anggota`
  MODIFY `id_anggota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `yo_buku`
--
ALTER TABLE `yo_buku`
  MODIFY `id_buku` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `yo_peminjaman`
--
ALTER TABLE `yo_peminjaman`
  MODIFY `id_peminjam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `yo_penerbit`
--
ALTER TABLE `yo_penerbit`
  MODIFY `kd_penerbit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `yo_pengarang`
--
ALTER TABLE `yo_pengarang`
  MODIFY `kd_pengarang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `yo_pengembalian`
--
ALTER TABLE `yo_pengembalian`
  MODIFY `id_kembali` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
