-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2022 pada 03.26
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simag`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_peserta`
--

CREATE TABLE `info_peserta` (
  `id` int(11) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `pengantar` varchar(256) NOT NULL,
  `proposal` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `info_peserta`
--

INSERT INTO `info_peserta` (`id`, `instansi`, `startDate`, `endDate`, `pengantar`, `proposal`, `created_at`, `deleted_at`, `updated_at`, `userId`) VALUES
(8, '', '2022-02-10', '2022-02-18', '', '', '2022-02-03 09:49:46', '0000-00-00 00:00:00', '2022-02-03 09:49:46', 16),
(9, '', '0000-00-00', '2022-02-02', '1643904177_be862c9729c7c3b7637e.txt', '1643904177_2645f79f4a4bbc992466.txt', '2022-02-03 10:02:57', '0000-00-00 00:00:00', '2022-02-03 10:02:57', 20),
(10, '', '0000-00-00', '2022-02-05', 'catatan.txt', 'catatan.txt', '2022-02-03 10:04:22', '0000-00-00 00:00:00', '2022-02-03 10:04:22', 21),
(11, '', '0000-00-00', '2022-02-20', 'catatan.txt', 'catatan.txt', '2022-02-03 10:05:39', '0000-00-00 00:00:00', '2022-02-03 10:05:39', 22);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `jenisKelamin` int(1) NOT NULL,
  `tglLahir` date NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `jenisKelamin`, `tglLahir`, `role`, `created_at`, `deleted_at`, `updated_at`) VALUES
(16, 'aa', 'admin@gmail.com', '', 0, '0000-00-00', 3, '2022-02-03 09:49:46', '0000-00-00 00:00:00', '2022-02-03 09:49:46'),
(17, 'bb', '', '', 0, '0000-00-00', 3, '2022-02-03 09:51:52', '0000-00-00 00:00:00', '2022-02-03 09:51:52'),
(18, 'cc', '', '', 0, '0000-00-00', 3, '2022-02-03 09:52:42', '0000-00-00 00:00:00', '2022-02-03 09:52:42'),
(19, 'dd', '', '', 0, '0000-00-00', 3, '2022-02-03 10:01:51', '0000-00-00 00:00:00', '2022-02-03 10:01:51'),
(20, 'ee', '', '', 0, '0000-00-00', 3, '2022-02-03 10:02:57', '0000-00-00 00:00:00', '2022-02-03 10:02:57'),
(21, 'ff', '', '', 0, '0000-00-00', 3, '2022-02-03 10:04:22', '0000-00-00 00:00:00', '2022-02-03 10:04:22'),
(22, 'ggggg', '', '', 0, '0000-00-00', 3, '2022-02-03 10:05:39', '0000-00-00 00:00:00', '2022-02-03 10:05:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `info_peserta`
--
ALTER TABLE `info_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `info_peserta`
--
ALTER TABLE `info_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
