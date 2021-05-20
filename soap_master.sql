-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2021 pada 04.09
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soap_master`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `nutrisi`
--

CREATE TABLE `nutrisi` (
  `id` int(6) NOT NULL,
  `nama_makanan` varchar(255) NOT NULL,
  `berat_gr` int(200) NOT NULL,
  `kalori` int(200) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nutrisi`
--

INSERT INTO `nutrisi` (`id`, `nama_makanan`, `berat_gr`, `kalori`, `jenis`) VALUES
(1, 'Nasi', 1500, 500, 'Karbohidrat'),
(2, 'Telur', 6, 76, 'protein dan kalori');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb`
--

CREATE TABLE `tb` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal_pembelian` varchar(20) NOT NULL,
  `harga_barang` int(10) NOT NULL,
  `jumlah_unit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb`
--

INSERT INTO `tb` (`id`, `nama`, `tanggal_pembelian`, `harga_barang`, `jumlah_unit`) VALUES
(1, 'Sabun', '7 april', 20000, 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `nutrisi`
--
ALTER TABLE `nutrisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb`
--
ALTER TABLE `tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `nutrisi`
--
ALTER TABLE `nutrisi`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb`
--
ALTER TABLE `tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
