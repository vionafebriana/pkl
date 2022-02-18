-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2022 pada 12.26
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
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `datang` time NOT NULL,
  `pulang` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id`, `user_id`, `date`, `datang`, `pulang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 28, '2022-02-11', '20:34:35', '20:37:13', '2022-02-11 20:34:35', '2022-02-11 20:37:13', '0000-00-00 00:00:00'),
(5, 27, '2022-02-12', '00:00:00', '11:59:09', '2022-02-12 11:58:47', '2022-02-12 11:59:09', '0000-00-00 00:00:00'),
(6, 27, '2022-02-13', '00:00:00', '13:30:08', '2022-02-13 13:29:41', '2022-02-13 13:30:08', '0000-00-00 00:00:00'),
(7, 27, '2022-02-15', '00:00:00', '11:02:16', '2022-02-15 11:02:16', '2022-02-15 11:02:16', '0000-00-00 00:00:00'),
(8, 27, '2022-02-18', '00:00:00', '16:28:58', '2022-02-18 12:35:33', '2022-02-18 16:28:58', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `date` date NOT NULL,
  `mulai` time NOT NULL,
  `selesai` time NOT NULL,
  `keterangan` varchar(500) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `userId`, `date`, `mulai`, `selesai`, `keterangan`, `status`, `created_at`, `deleted_at`, `updated_at`) VALUES
(3, 27, '2022-02-15', '20:21:00', '22:21:00', 'zxz', 1, '2022-02-16 07:22:00', '0000-00-00 00:00:00', '2022-02-16 07:22:00'),
(5, 27, '2022-02-18', '13:09:00', '18:09:00', 'qa', 0, '2022-02-18 04:09:42', '0000-00-00 00:00:00', '2022-02-18 04:32:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `info_peserta`
--

CREATE TABLE `info_peserta` (
  `id` int(11) NOT NULL,
  `instansi` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'assets/img/peserta.png',
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

INSERT INTO `info_peserta` (`id`, `instansi`, `foto`, `startDate`, `endDate`, `pengantar`, `proposal`, `created_at`, `deleted_at`, `updated_at`, `userId`) VALUES
(14, 'stis', 'assets/img/peserta.png', '2022-02-01', '2022-02-19', 'simag.sql', 'simag.sql', '2022-02-07 22:22:47', '0000-00-00 00:00:00', '2022-02-07 22:22:47', 26),
(15, 'STIS', 'assets/img/peserta.png', '2022-02-19', '2022-02-24', 'Viona Febriana-221810647-4SI2-01CXXEQ.docx', 'Viona Febriana-221810647-4SI2-01CXXEQ.docx', '2022-02-18 04:51:10', '0000-00-00 00:00:00', '2022-02-18 04:51:10', 29);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jenisKelamin` int(1) NOT NULL,
  `tglLahir` date NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `jenisKelamin`, `tglLahir`, `role`, `created_at`, `deleted_at`, `updated_at`, `status`) VALUES
(26, 'erik', 'erca.rihendri@gmail.com', 1, '2022-02-17', 3, '2022-02-07 22:22:47', '0000-00-00 00:00:00', '2022-02-07 22:22:47', 1),
(27, 'admin', '221810647@stis.ac.id', 2, '2022-02-01', 1, '2022-02-08 07:43:42', '0000-00-00 00:00:00', '2022-02-08 07:43:42', 1),
(28, 'admin', '221810270@stis.ac.id', 1, '2022-02-02', 1, '2022-02-08 07:44:27', '0000-00-00 00:00:00', '2022-02-08 07:44:27', 1),
(29, 'VIONA', 'vionafebriana@gmail.com', 2, '2022-02-09', 3, '2022-02-18 04:51:10', '0000-00-00 00:00:00', '2022-02-18 04:51:10', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `info_peserta`
--
ALTER TABLE `info_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
