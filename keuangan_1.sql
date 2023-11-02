-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2023 pada 13.18
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan_1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `BARANG_ID` int(11) NOT NULL,
  `NAMA_BARANG` varchar(50) DEFAULT NULL,
  `KODE_BARANG` varchar(50) DEFAULT NULL,
  `QTY` int(11) DEFAULT NULL,
  `ID_KATEGORI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`BARANG_ID`, `NAMA_BARANG`, `KODE_BARANG`, `QTY`, `ID_KATEGORI`) VALUES
(11, 'BAJU', 'B01', 15, 1),
(12, 'PULPEN', 'P01', 15, 2),
(13, 'GELAS', 'G01', 15, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_KATEGORI` varchar(50) DEFAULT NULL,
  `DISKON` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`, `DISKON`) VALUES
(9, 'ATK', '5%'),
(10, 'ELEKTRONIK', '10%'),
(11, 'SEMBAKO', '15%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `ID_MEMBER` int(11) NOT NULL,
  `KODE_MEMBER` varchar(50) DEFAULT NULL,
  `NAMA_MEMBER` varchar(50) DEFAULT NULL,
  `LEVEL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`ID_MEMBER`, `KODE_MEMBER`, `NAMA_MEMBER`, `LEVEL`) VALUES
(2, 'R01', 'RASYA', 'Gold'),
(3, 'R02', 'REINA', 'Silver'),
(4, 'N01', 'NUR ANISA', 'Platinum'),
(5, 'A01', 'Aryo Fadillah Pradana', 'Gold');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `PENJUALAN_ID` int(11) NOT NULL,
  `TANGGAL_PENJUALAN` date DEFAULT NULL,
  `NAMA_MEMBER` varchar(50) DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`PENJUALAN_ID`, `TANGGAL_PENJUALAN`, `NAMA_MEMBER`, `TOTAL`) VALUES
(8, '2023-10-07', 'RASYA', 50000),
(9, '2023-10-07', 'REINA', 140000),
(10, '2023-10-07', 'NUR ANISA', 0),
(11, '2023-11-04', 'Aryo Fadillah Pradana', 700000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` int(11) NOT NULL,
  `TANGGAL_TRANSAKSI` date DEFAULT NULL,
  `NOMOR_TRANSAKSI` varchar(50) DEFAULT NULL,
  `JENIS_TRANSAKSI` varchar(50) DEFAULT NULL,
  `JUMLAH_TRANSAKSI` int(11) DEFAULT NULL,
  `PENJUALAN_ID` int(11) DEFAULT NULL,
  `BARANG_ID` int(11) DEFAULT NULL,
  `ID_MEMBER` int(11) DEFAULT NULL,
  `TOTAL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `TANGGAL_TRANSAKSI`, `NOMOR_TRANSAKSI`, `JENIS_TRANSAKSI`, `JUMLAH_TRANSAKSI`, `PENJUALAN_ID`, `BARANG_ID`, `ID_MEMBER`, `TOTAL`) VALUES
(1, '2023-11-04', '', 'CASH', 1, 8, 11, 2, '50000'),
(2, '2023-11-04', '', 'CASH', 1, 9, 12, 3, '140000'),
(3, '2023-11-04', '', 'CASH', 1, 10, 13, 4, '0'),
(5, '2023-11-04', '', 'CASH', 1, 11, 13, 5, '700000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `NAMA_USER` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `JABATAN` varchar(50) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_USER`, `PASSWORD`, `JABATAN`, `STATUS`) VALUES
(3, 'Aryo Fadillah Pradana', '030805', 'Manager', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`BARANG_ID`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID_MEMBER`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PENJUALAN_ID`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `BARANG_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `ID_MEMBER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `PENJUALAN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_TRANSAKSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
