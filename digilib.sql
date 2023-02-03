-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2018 pada 03.12
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digilib`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(11) NOT NULL,
  `hak_akses` varchar(35) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `hak_akses`, `keterangan`) VALUES
(1, 'Admin', ''),
(2, 'Member', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `library`
--

CREATE TABLE `library` (
  `id_library` int(11) NOT NULL,
  `pengarang` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tahun` year(4) NOT NULL,
  `id_topik` int(11) NOT NULL,
  `cover` text NOT NULL,
  `babi` text NOT NULL,
  `babii` text NOT NULL,
  `babiii` text NOT NULL,
  `babiv` text NOT NULL,
  `babv` text NOT NULL,
  `abstrak` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `library`
--

INSERT INTO `library` (`id_library`, `pengarang`, `judul`, `tahun`, `id_topik`, `cover`, `babi`, `babii`, `babiii`, `babiv`, `babv`, `abstrak`, `status`) VALUES
(5, 10, 'Hurdi', 2018, 1, '10_cfm.jpg', '10_Sistem Pemilihan Kepala Desa Kertagena.pdf', '10_Sistem Pemilihan Kepala Desa Kertagena.pdf', '10_Sistem Pemilihan Kepala Desa Kertagena.pdf', '10_Sistem Pemilihan Kepala Desa Kertagena.pdf', '10_Sistem Pemilihan Kepala Desa Kertagena(1).pdf', 'Percobaan                                                ', 1),
(6, 11, 'Hurdai', 2018, 2, '11_Universitas_Islam_madura.png', '11_Sistem Pemilihan Kepala Desa Kertagena(1).pdf', '11_Sistem Pemilihan Kepala Desa Kertagena(1).pdf', '11_Sistem Pemilihan Kepala Desa Kertagena.pdf', '11_Sistem Pemilihan Kepala Desa Kertagena.pdf', '11_Sistem Pemilihan Kepala Desa Kertagena(1).pdf', 'Hurdai    ', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `topik`
--

CREATE TABLE `topik` (
  `id_topik` int(11) NOT NULL,
  `topik` varchar(200) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `topik`
--

INSERT INTO `topik` (`id_topik`, `topik`, `keterangan`) VALUES
(1, 'Web Programming', ''),
(2, 'Android', ''),
(3, 'Jaringan', ''),
(4, 'SIG', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `noreg` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `akses` int(11) NOT NULL,
  `reg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `noreg`, `nama`, `username`, `password`, `akses`, `reg`) VALUES
(1, '123', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(10, '123', 'Hannanah', '', '', 2, 1),
(11, '11', 'Hurdi', '', '', 2, 1),
(12, '456', 'Raudah', 'a', '0cc175b9c0f1b6a831c399e269772661', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id_library`),
  ADD KEY `pengarang` (`pengarang`),
  ADD KEY `topik` (`id_topik`);

--
-- Indeks untuk tabel `topik`
--
ALTER TABLE `topik`
  ADD PRIMARY KEY (`id_topik`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `akses` (`akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `library`
--
ALTER TABLE `library`
  MODIFY `id_library` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `topik`
--
ALTER TABLE `topik`
  MODIFY `id_topik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `library_ibfk_1` FOREIGN KEY (`pengarang`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `library_ibfk_2` FOREIGN KEY (`id_topik`) REFERENCES `topik` (`id_topik`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`akses`) REFERENCES `hak_akses` (`id_akses`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
