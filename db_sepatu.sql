-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2021 pada 03.30
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sepatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Running'),
(2, 'Sneakers'),
(3, 'Olahraga'),
(4, 'Boat'),
(5, 'Sepatu Formal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sepatu`
--

CREATE TABLE `sepatu` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `merek` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `ukuran` int(3) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sepatu`
--

INSERT INTO `sepatu` (`id`, `nama`, `merek`, `warna`, `ukuran`, `harga`, `kategori_id`) VALUES
(1, 'Adidas Runfalcon shoes', 'ADIDAS', 'HITAM', 32, 600000, 1),
(2, 'Adidas GameCourt Shoes', 'ADIDAS', 'PUTIH', 39, 850000, 1),
(3, 'Nike ZoomX Vaporfly', 'NIKE', 'HIJAU', 40, 3209000, 1),
(4, 'Nike Air Zoom Pegasus', 'NIKE', 'HITAM', 38, 1799000, 1),
(5, 'Diadora KURUKA 5 Black', 'DIADORA', 'HITAM', 40, 600000, 1),
(6, 'Compass Retro Grade', 'COMPASS', 'PUTIH', 32, 800000, 2),
(7, 'Vans Old School', 'VANS', 'HITAM', 36, 400000, 2),
(8, 'HZ80 sepatu sneaker sepatu sport pria casual', 'EAGLE', 'COKLAT', 37, 500000, 3),
(9, 'Sepatu SPORT Puma RS-X', 'PUMA', 'BIRU', 34, 200000, 3),
(10, 'PAKALOLO BOOTS Sepatu N78903E Navy', 'PAKALOLO', 'NAVY', 39, 400000, 4),
(11, 'Valdemar Camel', 'VALDEMAR', 'COKLAT', 40, 399000, 4),
(12, 'Paulmay Sepatu Formal Pria', 'PAULMAY', 'COKLAT', 40, 195000, 5),
(13, 'dfsdsdf', 'sdfsfsdf', 'sdff', 34, 725000, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(3, 'web', 'uts', 'uts');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sepatu`
--
ALTER TABLE `sepatu`
  ADD CONSTRAINT `sepatu_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
