-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 07:34 PM
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
  `diskon` decimal(5,2) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `url_buku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode`, `judul`, `kategori_id`, `penerbit_id`, `isbn`, `pengarang`, `jumlah_halaman`, `sinopsis`, `rating`, `harga`, `diskon`, `foto`, `url_buku`) VALUES
(3, 'TL02', 'Bulan', 1, 1, '144325525', 'Tere Liye', 655, 'Bukan bulan biasa!', 3.5, 199999, 30.00, 'buku_TL02.jpg', 'https://fontawesomeicons.com/edit'),
(4, 'TL03', 'Matahari', 1, 1, '433143414', 'Tere Liye', 344, 'Matahari yang tidak menyilaukan', 1.5, 300000, 50.00, 'buku_TL03.jpg', 'https://fontawesomeicons.com/edit'),
(5, 'TL04', 'Komet', 1, 1, '52345525', 'Tere Liye', 632, 'Komet jatuh ada di buku ini!', 4.5, 250000, NULL, 'buku_TL04.jpg', 'https://fontawesomeicons.com/edit'),
(6, 'TL05', 'Komet Minor', 1, 1, '562455', 'Tere Liye', 766, 'Komet kecil, lanjutan komet biasa', 2.0, 150000, 30.00, 'buku_TL05.jpg', 'https://fontawesomeicons.com/edit'),
(7, 'YN01', 'Your Next Five Moves: Master the Art of Bu', 8, 5, '1253125', 'Patrick Bet-David', 950, 'Pelajari strategi bisnis disini!', 5.0, 350000, NULL, 'buku_YN01.jpg', 'https://fontawesomeicons.com/edit'),
(8, 'PD10', 'test_jnjnljkn', 3, 2, '5217816', 'Hanipss', 5000, 'ini buku test', 1.0, 1000000, NULL, '', 'https://fontawesomeicons.com/edit'),
(9, 'TES02', 'buku10jt', 6, 2, '153255', 'tesss', 455, 'afgaee', 4.0, 10000000, NULL, '', 'https://fontawesomeicons.com/edit'),
(10, 'TES03', 'buku1M', 2, 3, '124124', 'njkfankjn', 324, 'Pelajari strategi bisnis disini!', 5.0, 1000000000, NULL, '', 'https://fontawesomeicons.com/edit'),
(11, 'TES05', 'Buku 5jt', 6, 1, '741678678', 'Fiksi', 499, 'mlknknjnj', 2.5, 5000000, NULL, '', 'https://fontawesomeicons.com/edit');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('syafii@gmail.com', '$2y$10$kvc1bBkwDWLNZaIlSVXXHOPRHVoyXj8rI.znmx1tE50yAKFrw0Pou', '2023-06-11 09:57:59');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `kode` char(5) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `ket` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `kode`, `buku_id`, `user_id`, `tgl`, `ket`) VALUES
(13, 'PES01', 4, 9, '2023-06-11 12:37:44', 'Pending'),
(15, 'PES08', 11, 9, '2023-06-11 17:01:08', 'Lunas'),
(17, 'PES04', 6, 21, '2023-06-12 00:30:35', 'Lunas'),
(18, 'PES05', 4, 22, '2023-06-12 00:30:52', 'Lunas'),
(19, 'PES06', 7, 21, '2023-06-12 00:31:14', 'Lunas'),
(20, 'PES07', 3, 16, '2023-06-12 00:31:36', 'Lunas'),
(21, 'PES09', 6, 16, '2023-06-12 00:32:32', 'Lunas'),
(22, 'PES10', 4, 22, '2023-06-12 00:32:51', 'Lunas'),
(23, 'PES11', 6, 16, '2023-06-12 00:33:08', 'Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Administrator','Staff','Pelanggan') NOT NULL DEFAULT 'Pelanggan',
  `hp` varchar(15) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `hp`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Hanief', 'hanief@gmail.com', NULL, '$2y$10$G4vWLU.KD/ma2LeI4aOjHuiPA/oUgXa5/3e/GiYvUYTZamaKH3EGu', 'Administrator', '085779336666', 'user_.jpg', NULL, '2023-06-10 21:07:59', '2023-06-10 21:07:59'),
(9, 'Syafii', 'syafii@gmail.com', NULL, '$2y$10$ud4rXfTnT2g2/B2I9BbnbeHDw5KspXUqlzEe5Ql601S3iInZ60eg2', 'Pelanggan', '08948294', 'user_.png', NULL, NULL, NULL),
(13, 'Rico', 'rico@gmail.com', NULL, '$2y$10$hUgynZwkY3cvhFxXAzLuW.B4Z8cPdmLVgkNJh3V7T0K3v8YzbdbWa', 'Staff', '08128788908', '', NULL, NULL, NULL),
(16, 'kuncoro', 'kuncoro@gmail.com', NULL, '$2y$10$H7CWJlB/Ksylx7SrT.TitOR8k3sOopN0j4vItDOSie2cqVJRMqAS.', 'Pelanggan', '08128788908', 'user_.png', NULL, '2023-06-11 06:44:32', '2023-06-11 06:44:32'),
(18, 'Silva', 'silva@gmail.com', NULL, '$2y$10$840a/yfy9oAMMWdiOvH6JeEzCp37tdusJiqHMLDGWVD4wD6CktFeW', 'Administrator', '08128788908', '', NULL, NULL, NULL),
(19, 'Aminullah', 'aminullah@gmail.com', NULL, '$2y$10$8AriVoDsR.78WYzKt6HryePjjlOEcAHOdnsPEmDlGudOd5.BM6WUy', 'Staff', '08128788908', '', NULL, NULL, NULL),
(20, 'Firman', 'firman@gmail.com', NULL, '$2y$10$A/dJWu5jGN45V4Rk2a19sOKqkAsOsYx0zox1taGI0eri3f.nzHVbG', 'Pelanggan', '08128788908', '', NULL, NULL, NULL),
(21, 'Joko', 'joko@gmail.com', NULL, 'joko123', 'Pelanggan', '08128788908', '', NULL, NULL, NULL),
(22, 'Dodo', 'dodo@gmail.com', NULL, 'dodo123', 'Pelanggan', '08128788908', '', NULL, NULL, NULL),
(23, 'Admin', 'admin@gmail.com', NULL, '$2y$10$omiN2TgFLfKbYjVGlgE5eesCQq4i4Rxy86/pi9sl2PQDK2ba/mcwu', 'Administrator', '08128788908', '', NULL, NULL, NULL);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`),
  ADD KEY `fk_produk_has_pelanggan_produk1` (`buku_id`),
  ADD KEY `fk_produk_has_pelanggan_pelanggan1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
  ADD CONSTRAINT `fk_produk_has_pelanggan_pelanggan1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_has_pelanggan_produk1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
