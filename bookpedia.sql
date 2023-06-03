-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 05:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookpedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode` char(5) NOT NULL,
  `judul` varchar(45) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `penerbit_id` int(11) NOT NULL,
  `isbn` varchar(45) NOT NULL,
  `pengarang` varchar(45) NOT NULL,
  `jumlah_halaman` int(5) NOT NULL,
  `sinopsis` text DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `harga` double NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `url_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode`, `judul`, `kategori_id`, `penerbit_id`, `isbn`, `pengarang`, `jumlah_halaman`, `sinopsis`, `rating`, `harga`, `foto`, `url_buku`) VALUES
(3, 'TL02', 'Bulan', 1, 1, '144325525', 'Tere Liye', 655, 'Bukan bulan biasa!', 3.5, 199999, 'buku_TL02.jpg', 'https://fontawesomeicons.com/edit'),
(4, 'TL03', 'Matahari', 1, 1, '433143414', 'Tere Liye', 344, 'Matahari yang tidak menyilaukan', 1.5, 300000, 'buku_TL03.jpg', 'https://fontawesomeicons.com/edit'),
(5, 'TL04', 'Komet', 1, 1, '52345525', 'Tere Liye', 632, 'Komet jatuh ada di buku ini!', 4.5, 250000, 'buku_TL04.jpg', 'https://fontawesomeicons.com/edit'),
(6, 'TL05', 'Komet Minor', 1, 1, '562455', 'Tere Liye', 766, 'Komet kecil, lanjutan komet biasa', 2.0, 150000, 'buku_TL05.jpg', 'https://fontawesomeicons.com/edit'),
(7, 'YN01', 'Your Next Five Moves: Master the Art of Bu', 8, 5, '1253125', 'Patrick Bet-David', 950, 'Pelajari strategi bisnis disini!', 5.0, 350000, 'buku_YN01.jpg', 'https://fontawesomeicons.com/edit'),
(8, 'PD10', 'test_jnjnljkn', 3, 2, '5217816', 'Hanipss', 5000, 'ini buku test', 1.0, 1000000, '', 'https://fontawesomeicons.com/edit'),
(9, 'TES02', 'buku10jt', 6, 2, '153255', 'tesss', 455, 'afgaee', 4.0, 10000000, '', 'https://fontawesomeicons.com/edit'),
(10, 'TES03', 'buku1M', 2, 3, '124124', 'njkfankjn', 324, 'Pelajari strategi bisnis disini!', 5.0, 1000000000, '', 'https://fontawesomeicons.com/edit');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(8, 'Biografi'),
(7, 'Ensiklopedia'),
(6, 'Fiksi'),
(3, 'Kamus'),
(4, 'Komik'),
(2, 'Majalah'),
(5, 'Manga'),
(1, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` enum('admin','staff','supplier') NOT NULL,
  `join_date` datetime DEFAULT current_timestamp(),
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `email`, `password`, `hp`, `foto`) VALUES
(1, 'Hanief W', 'hanief@gmail.com', 'hanief123', '08128788908', 'pelanggan_.jpg'),
(2, 'Rico', 'rico@gmail.com', 'rico123', '08128788908', 'pelanggan_Rico.jpg'),
(3, 'Silva', 'silva@gmail.com', 'silva123', '081278686', 'pelanggan_Silva.jpg'),
(4, 'Firman', 'firman@gmail.com', 'firman123', '0867376734', 'pelanggan_Firman.jpg'),
(5, 'Aminullah', 'aminullah@gmail.com', 'aminullah123', '08126767645', 'pelanggan_Aminullah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `metode_pembayaran` enum('Kartu kredit','Transfer Bank','Paypal','OVO','GoPay','Dana','Pulsa') NOT NULL,
  `total` double NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama`) VALUES
(3, 'Bentang Pustaka'),
(1, 'Gramedia Pustaka Utama'),
(2, 'Mizan Pustaka'),
(4, 'Penerbit Erlangga'),
(5, 'Penerbit Republika');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `kode` char(5) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `kode`, `buku_id`, `pelanggan_id`, `tgl`, `ket`) VALUES
(1, 'PES01', 3, 1, '2023-06-02 13:36:34', 'Lunas'),
(3, 'PES03', 5, 3, '2023-06-02 13:41:21', 'Belum Lunas'),
(4, 'PES04', 6, 4, '2023-06-02 13:41:44', 'Pending'),
(5, 'PES02', 3, 2, '2023-06-02 13:42:14', 'Belum Lunas'),
(6, 'PES05', 7, 5, '2023-06-02 13:42:33', 'Lunas'),
(9, 'PES06', 5, 1, '2023-06-03 09:33:06', 'Done'),
(10, 'PES07', 7, 4, '2023-06-03 09:34:27', 'Lunas'),
(11, 'TES02', 9, 1, '2023-06-03 09:35:47', 'ageragerw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`),
  ADD UNIQUE KEY `isbn_UNIQUE` (`isbn`),
  ADD KEY `nama_produk_idx` (`judul`),
  ADD KEY `fk_produk_jenis` (`kategori_id`),
  ADD KEY `fk_produk_penerbit1` (`penerbit_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `nama_pelanggan_idx` (`nama`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `nama_pelanggan_idx` (`nama`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_pesanan1` (`pesanan_id`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`),
  ADD KEY `fk_produk_has_pelanggan_produk1` (`buku_id`),
  ADD KEY `fk_produk_has_pelanggan_pelanggan1` (`pelanggan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_produk_jenis` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_penerbit1` FOREIGN KEY (`penerbit_id`) REFERENCES `penerbit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_pesanan1` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `fk_produk_has_pelanggan_pelanggan1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_has_pelanggan_produk1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
