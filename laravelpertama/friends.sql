-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2022 pada 18.03
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelpertama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `no_tlp` int(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `friends`
--

INSERT INTO `friends` (`id`, `nama`, `no_tlp`, `alamat`, `created_at`, `updated_at`) VALUES
(20201, 'Budi Agustoro', 62890211, 'Jakarta', '2022-04-17 15:57:11', '2022-04-17 15:57:11'),
(20202, 'Venya Ananda', 62862938, 'Cirebon', '2022-04-17 15:57:40', '2022-04-17 15:57:40'),
(20203, 'Leny Kuncoro', 62893102, 'Brebes', '2022-04-17 15:58:05', '2022-04-17 15:58:05'),
(20204, 'Rachel Ananda', 62890277, 'Jakarta', '2022-04-17 15:58:30', '2022-04-17 15:58:30'),
(20205, 'Tuti Sulastri', 62862965, 'Cirebon', '2022-04-17 15:59:03', '2022-04-17 15:59:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20206;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
