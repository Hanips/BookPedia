-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 09:56 AM
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
(8, 'IP00', 'Hukum Acara Pidana', 10, 2, '9786021374245', 'Luhut Mp Pangaribuan', 1561, 'Satu Kompilasi Kuhap & Ketentuan-ketentuan Pelaksana & Hukum International yg Relevan', 4.0, 1000000, NULL, 'buku_IP00.jpg', 'https://fontawesomeicons.com/edit'),
(9, 'HP12', 'Harry Potter And The Cursed Child 1 & 2', 6, 2, '9781338216660', 'J.k. Rowling', 315, 'J.k. Rowling', 4.5, 10000000, NULL, 'buku_HP12.jpg', 'https://fontawesomeicons.com/edit'),
(10, 'HP02', 'Harry Potter And The Goblet Of Fire', 6, 1, '9781526610300', 'J.k. Rowling', 640, '\'Better be HUFFLEPUFF!\'', 5.0, 1000000000, NULL, 'buku_HP02.jpg', 'https://fontawesomeicons.com/edit'),
(11, 'HP04', 'Harry Potter Dan Batu Bertuah', 6, 1, '9786020337647', 'J.k. Rowling', 384, 'Surat berisi undangan ke tempat menakjubkan bernama Sekolah Sihir Hogwarts.', 4.5, 5000000, NULL, 'buku_HP04.jpg', 'https://fontawesomeicons.com/edit'),
(13, 'HP03', 'Harry Potter dan Orde Phoenix', 6, 1, '9786020361314', 'J.k. Rowling', 1280, 'Voldermort telah kembali!', 4.5, 1200000, 20.00, 'buku_HP03.jpg', 'https://fontawesome.com'),
(14, 'JK00', 'Jujutsu Kaisen 0', 5, 7, '9786230034640', 'Gege Akutami', 200, 'Inilah prekuel dari JUJUTSU KAISEN!!', 4.0, 90000, NULL, 'buku_JK00.jpg', 'https://fontawesomeicons.com/edit'),
(15, 'BG01', 'JACK MA SANG MILIUNER DUNIA', 8, 8, '9786024074975', 'Eko Siswanto', 212, 'Buku ini menunjukkan sosok Jack Ma secara mendetail. Semua dibahas di buku ini!', 4.2, 100000, NULL, 'buku_BG01.jpg', 'https://fontawesomeicons.com/edit'),
(16, 'BG02', 'KITAB LENGKAP BIOGRAFI EMPAT IMAM MAZHAB', 8, 9, '9786023911158', 'stadz Rizem Aizid', 332, 'Segala hal terkait keempat imam madzhab akan dikupas secara detail di dalam buku ini.', 4.0, 110000, NULL, 'buku_BG02.jpg', 'https://fontawesomeicons.com/edit'),
(17, 'KB01', 'KAMUS TERLENGKAP INDONESIA-JEPANG', 3, 8, '9786024071066', 'M. Juanita S. & Aiko Megumi', 626, 'Kamus ini berisi kosakata lengkap bahasa Jepang, disertai huruf-huruf Jepang!', 4.0, 150000, NULL, 'buku_KB01.jpg', 'https://fontawesomeicons.com/edit'),
(18, 'JK01', 'Jujutsu Kaisen 01', 5, 7, '9786230022180', 'Gege Akutami', 200, 'Suatu hari, segel objek terkutuk yang berada di sekolah Yuji Itadori terlepas', 4.0, 80000, NULL, 'buku_JK01.jpg', 'https://fontawesomeicons.com/edit'),
(19, 'JK02', 'Jujutsu Kaisen 02', 5, 7, '9786230024399', 'Gege Akutami', 200, 'Sebuah kutukan yang menyerupai janin tiba-tiba muncul di lapas anak pria.', 4.2, 99000, NULL, 'buku_JK02.jpg', 'https://fontawesomeicons.com/edit'),
(20, 'JK03', 'Jujutsu Kaisen 03', 5, 7, '9786230024672', 'Gege Akutami', 200, 'Karena sifat jahat Sukuna, semua penyihir diharuskan untuk mengusirnya segera–dalam hal ini.', 3.8, 75000, NULL, 'buku_JK03.jpg', 'https://fontawesomeicons.com/edit'),
(21, 'JK04', 'Jujutsu Kaisen 04', 5, 7, '9786230026942', 'Gege Akutami', 200, 'Akankah Itadori sanggup melepaskan Junpei dari \"kutukan\" kebenciannya?', 4.5, 110000, NULL, 'buku_JK04.jpg', 'https://fontawesomeicons.com/edit'),
(22, 'ME01', 'Elle Juli 2022', 2, 1, '9771979105003', 'Majalah Gramedia', 146, 'Majalah Elle Juli 2022', 3.9, 100000, NULL, 'buku_ME01.jpg', 'https://fontawesomeicons.com/edit'),
(25, 'ME02', 'Elle April 2023', 2, 1, '9771979105004', 'Majalah Gramedia', 130, 'Elle April 2023', 4.0, 80000, NULL, 'buku_ME02.jpg', 'https://fontawesomeicons.com/edit'),
(26, 'MC03', 'Cosmopolitan November 2022', 2, 1, '9772252314617', 'Majalah Gramedia', 121, 'Majalah Cosmopolitan November 2022', 4.3, 75000, NULL, 'buku_MC03.jpg', 'https://fontawesomeicons.com/edit'),
(27, 'MB04', 'Harper\'s Bazaar Indonesia Maret 2023', 2, 1, '9772089832049', 'Majalah Gramedia', 112, 'Majalah Harper\'s Bazaar Indonesia Maret 2023', 3.8, 120000, NULL, 'buku_MB04.jpg', 'https://fontawesomeicons.com/edit'),
(28, 'MN05', 'National Geographic Indonesia Februari 2023', 2, 1, '9771858201017', 'Majalah Gramedia', 144, 'Majalah National Geographic Indonesia Februari 2023', 3.6, 70000, NULL, 'buku_MN05.jpg', 'https://fontawesomeicons.com/edit'),
(30, 'MN06', 'National Geographic Indonesia Februari 2023', 2, 1, '9772089832040', 'Majalah Gramedia', 112, 'Majalah National Geographic Indonesia Februari 2023', 3.8, 95000, NULL, 'buku_MN06.jpg', 'https://fontawesomeicons.com/edit'),
(31, 'IP01', 'PROBLEMATIKA KOMUNIKASI POLITIK', 10, 10, '9786027696488', 'Dr. Gun Gun Heryanto, M.Si', 604, 'Analisis komunikasi politik saat memaknai, dan mengurai problematika di panggung politik nasional.', 4.2, 120000, NULL, 'buku_IP01.jpg', 'https://fontawesomeicons.com/edit'),
(32, 'IP02', 'NEGARA BUKAN- BUKAN', 10, 10, '9786027696297', 'Nur Khalik Ridwan', 255, 'Buku ini mengupas secara komprehensif pemikiran-pemikiran Gus Dur tentang Pancasila.', 3.8, 60000, 20.00, 'buku_IP02.jpg', 'https://fontawesomeicons.com/edit'),
(33, 'IP03', 'JASMERAH', 10, 8, '9786024073459', 'Wirianto Sumartono', 262, 'Buku ini mencoba merangkum beberapa pidato Bung Karno dalam beragam perhelatan', 4.2, 60000, 20.00, 'buku_IP03.jpg', 'https://fontawesomeicons.com/edit'),
(34, 'IP04', 'REALITA POLITIK INDONESIA KONTEMPORER', 10, 10, '9786237378334', 'Dr. Gun Gun Heryanto, M.Si', 422, 'Buku ini mengulas realitas komunikasi politik Indonesia kontemporer', 4.5, 130000, 20.00, 'buku_IP04.jpg', 'https://fontawesomeicons.com/edit'),
(35, 'IP05', 'ERDOGANISME', 10, 10, '9786238108381', 'Bernando J. Sujibto', 328, 'Buku ini menyuguhkan sesuatu yang berbeda dan cukup berani tentang sosok Erdogan', 3.5, 90000, NULL, 'buku_IP05.jpg', 'https://fontawesomeicons.com/edit'),
(36, 'IP06', 'ISLAM & POLITIK', 10, 10, '9786027696730', 'Prof. Dr. Ahmad Syafii Maarif', 356, 'Buku ini membahas Islam & Politik', 3.5, 85000, 10.00, 'buku_IP06.jpg', 'https://fontawesomeicons.com/edit'),
(37, 'M01', 'HAL-HAL YANG HARUS DICAPAI', 11, 8, '9786024073381', 'Anabella J. Setyaka', 220, 'Ada banyak hal yang harus Anda kerjakan sebelum memasuki usia 30 tahun.', 3.8, 50000, 20.00, 'buku_M01.jpg', 'https://fontawesomeicons.com/edit'),
(38, 'M02', 'RUANG TEDUH UNTUK SEMBUH', 11, 11, '9786231892324', 'Ruang Pulang', 168, 'Karena setiap orang berhak sembuh dari luka-luka dalam dirinya', 4.0, 70000, 20.00, 'buku_M02.jpg', 'https://fontawesomeicons.com/edit'),
(39, 'N01', 'LELAKI LANGIT', 1, 11, '9786231892119', 'Usman Arrumy', 240, 'Perpisahan itu telah mendorongku dalam mencari makna hidup yang sesungguhnya.', 4.2, 70000, NULL, 'buku_N01.jpg', 'https://fontawesomeicons.com/edit'),
(40, 'M03', 'Personal Branding Bisa Mengubah Takdir', 11, 7, '9786230027024', 'Tom Liwafa', 184, 'Buku ini menjelaskan tentang reputasi (personal branding) yang sangat berguna dalam bisnis,', 4.2, 60000, NULL, 'buku_M03.jpg', 'https://fontawesomeicons.com/edit'),
(41, 'RM01', '50 Resep Menu Legendaris Keluarga', 12, 1, '9786020670836', 'Nawang Okta Sulistyowati, NAWANG OKTA', 100, '-', 4.5, 125000, NULL, 'buku_RM01.jpg', 'https://fontawesomeicons.com/edit'),
(42, 'RM02', 'Resep Lengkap Jitu untuk Usaha Katering', 12, 1, '9786020662688', 'Ayu Hartati Datmiko', 116, 'Buku ini dapat menjadi inspirasi dan referensi.', 4.5, 103000, NULL, 'buku_RM02.jpg', 'https://fontawesomeicons.com/edit'),
(43, 'F01', 'Senja di Alaska', 6, 11, '9786235953380', 'Abellstr25', 310, 'Lalu bagaimana kehidupan Senja menghadapi Alaska yang enggan menerimanya sebagai istri?', 3.5, 99000, NULL, 'buku_F01.jpg', 'https://fontawesomeicons.com/edit'),
(44, 'F02', 'The Confession Of The Sirens', 6, 11, '9786230310645', 'Shichiri Nakayama', 336, 'Separuh makhluk itu adalah seorang perempuan, sementara bagian bawahnya adalah ikan.', 3.8, 95000, 10.00, 'buku_F02.jpg', 'https://fontawesomeicons.com/edit'),
(45, 'F03', 'The Burning God', 6, 1, '9786020668826', 'R.F. Kuang', 672, 'Lanjutan Perang Opium dan Republik Naga', 4.0, 189000, 25.00, 'buku_F03.jpg', 'https://fontawesomeicons.com/edit'),
(46, 'F04', 'The Song of Achilles', 6, 1, '9786020659923', 'Madeline Miller', 488, 'Novel The Song of Achilles menceritakan kembali legenda perang Troya.', 4.6, 125000, NULL, 'buku_F04.jpg', 'https://fontawesomeicons.com/edit'),
(47, 'F05', 'Lord of the Darkwood', 6, 1, '9786020634814', 'Lian Hearn', 268, 'Fantasi sejarah yang mencekam dan brutal -Herald Sun', 3.0, 99000, NULL, 'buku_F05.jpg', 'https://fontawesomeicons.com/edit'),
(48, 'F06', 'The Power', 6, 7, '9786230046148', 'Naomi Alderman', 408, 'Luka dan kematian ada di tangan kaum perempuan', 3.0, 89000, NULL, 'buku_F06.jpg', 'https://fontawesomeicons.com/edit'),
(49, 'K01', 'Solo Leveling 1', 4, 12, '9786230307027', 'Chugong', 520, 'Menjadi hunter adalah satu-satunya cara bagi Seong Jin-woo', 5.0, 110000, NULL, 'buku_K01.jpg', 'https://fontawesomeicons.com/edit'),
(50, 'K02', 'Solo Leveling 2', 4, 12, '9786230308291', 'Chugong', 356, 'Berubah dari Hunter terlemah menjadi Hunter S-rank terkuat!', 5.0, 110000, NULL, 'buku_K02.jpg', 'https://fontawesomeicons.com/edit'),
(51, 'K03', 'Solo Leveling 3', 4, 12, '9786230310218', 'Chugong', 496, 'Apakah sudah saatnya untuk melakukan seleksi ulang level?', 5.0, 150000, NULL, 'buku_K03.jpg', 'https://fontawesomeicons.com/edit'),
(52, 'MA04', 'Oshi no Ko 01', 5, 12, '9786230305269', 'Aka AKASAKA', 224, '\"Di dunia hiburan ini, kebohongan adalah senjata.\"', 4.7, 50000, NULL, 'buku_MA04.jpg', 'https://fontawesomeicons.com/edit'),
(53, 'MA05', 'Chainsaw Man 01', 5, 12, '9786230309212', 'Tatsuki Fujimoto', 192, 'Denji, pemuda super miskin yang dikejar banyak utang,', 4.8, 50000, NULL, 'buku_MA05.jpg', 'https://fontawesomeicons.com/edit'),
(54, 'MA06', 'Black Clover 01', 5, 7, '9786020489636', 'Yuki Tabata', 200, 'Di sini adalah sebuah dunia, di mana sihir adalah segalanya.', 4.5, 40000, NULL, 'buku_MA06.jpg', 'https://fontawesomeicons.com/edit');

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
(10, 'Ilmu Politik'),
(3, 'Kamus'),
(4, 'Komik'),
(2, 'Majalah'),
(5, 'Manga'),
(11, 'Motivasi'),
(1, 'Novel'),
(12, 'Resep & Masakan');

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
(11, 'DIVA Press'),
(7, 'Elex Media Komputindo'),
(1, 'Gramedia Pustaka Utama'),
(10, 'Ircisod'),
(8, 'Laksana'),
(12, 'm&c!'),
(2, 'Mizan Pustaka'),
(4, 'Penerbit Erlangga'),
(5, 'Penerbit Republika'),
(9, 'Saufa');

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
  `buku_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp(),
  `ket` enum('Done','Pending') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `buku_id`, `user_id`, `tgl`, `ket`) VALUES
(13, 4, 9, '2023-06-11 12:37:44', 'Pending'),
(15, 11, 9, '2023-06-11 17:01:08', 'Pending'),
(17, 6, 21, '2023-06-12 00:30:35', 'Pending'),
(18, 4, 22, '2023-06-12 00:30:52', 'Pending'),
(19, 7, 21, '2023-06-12 00:31:14', 'Pending'),
(20, 3, 16, '2023-06-12 00:31:36', 'Pending'),
(21, 6, 16, '2023-06-12 00:32:32', 'Pending'),
(22, 4, 22, '2023-06-12 00:32:51', 'Pending'),
(23, 6, 16, '2023-06-12 00:33:08', 'Pending'),
(24, 7, 16, '2023-06-12 01:20:07', 'Pending'),
(25, 14, 24, '2023-06-15 05:13:35', 'Pending'),
(26, 11, 26, '2023-06-15 05:14:08', 'Pending'),
(28, 34, 29, '2023-06-15 05:15:24', 'Pending'),
(29, 37, 30, '2023-06-15 05:15:54', 'Pending'),
(30, 52, 25, '2023-06-15 05:16:21', 'Pending'),
(31, 49, 24, '2023-06-15 05:16:48', 'Pending'),
(32, 53, 20, '2023-06-15 05:17:22', 'Pending'),
(33, 19, 32, '2023-06-15 05:22:30', 'Pending'),
(34, 42, 33, '2023-06-15 05:22:50', 'Pending'),
(35, 36, 34, '2023-06-15 05:23:22', 'Pending'),
(37, 8, 36, '2023-06-15 05:24:01', 'Pending'),
(38, 16, 37, '2023-06-15 05:27:17', 'Pending'),
(39, 15, 38, '2023-06-15 05:27:39', 'Pending'),
(40, 3, 39, '2023-06-18 12:12:37', 'Pending'),
(41, 14, 39, '2023-06-18 14:09:21', 'Pending'),
(42, 53, 39, '2023-06-18 14:56:21', 'Pending');

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
(5, 'Hanief', 'hanief@gmail.com', NULL, '$2y$10$3ciCe29c.fkyjLsZFpTpq.9iMwhMNTTaUe9oo1adT9CAzdzEeWRaC', 'Administrator', '085779336666', 'user_Hanief.jpg', NULL, '2023-06-10 21:07:59', '2023-06-10 21:07:59'),
(9, 'Syafii', 'syafii@gmail.com', NULL, '$2y$10$ud4rXfTnT2g2/B2I9BbnbeHDw5KspXUqlzEe5Ql601S3iInZ60eg2', 'Pelanggan', '08948294', 'user_.png', NULL, NULL, NULL),
(13, 'Rico', 'rico@gmail.com', NULL, '$2y$10$hUgynZwkY3cvhFxXAzLuW.B4Z8cPdmLVgkNJh3V7T0K3v8YzbdbWa', 'Staff', '08128788908', '', NULL, NULL, NULL),
(16, 'kuncoro', 'kuncoro@gmail.com', NULL, '$2y$10$H7CWJlB/Ksylx7SrT.TitOR8k3sOopN0j4vItDOSie2cqVJRMqAS.', 'Pelanggan', '08128788908', 'user_.png', NULL, '2023-06-11 06:44:32', '2023-06-11 06:44:32'),
(18, 'Silva', 'silva@gmail.com', NULL, '$2y$10$zGQ13u6FiqJZcKdYgw5/5.UuVUa2YK9lsRKGfc8X9kx.AUdyZg3o6', 'Administrator', '08128788908', 'user_.jpg', NULL, NULL, NULL),
(19, 'Aminullah', 'aminullah@gmail.com', NULL, '$2y$10$8AriVoDsR.78WYzKt6HryePjjlOEcAHOdnsPEmDlGudOd5.BM6WUy', 'Staff', '08128788908', '', NULL, NULL, NULL),
(20, 'Firman', 'firman@gmail.com', NULL, '$2y$10$qw.do8tIXcO48YRGEyTsO.D6N1DFX5t.r8BOo1I1GJCHAf5ZYBwsi', 'Pelanggan', '08128788908', '', NULL, NULL, NULL),
(21, 'Joko', 'joko@gmail.com', NULL, 'joko123', 'Pelanggan', '08128788908', '', NULL, NULL, NULL),
(22, 'Dodo', 'dodo@gmail.com', NULL, 'dodo123', 'Pelanggan', '08128788908', '', NULL, NULL, NULL),
(23, 'Admin', 'admin@gmail.com', NULL, '$2y$10$HiPENGHzq6RZ2tz81xrNAuFi/9B6vZraNF2HllYmsOQxq5WfeGwlO', 'Administrator', '08128788908', 'user_Admin.jpg', NULL, NULL, NULL),
(24, 'sisil', 'sisil@gmail.com', NULL, 'sisil123', 'Pelanggan', '082273733427', 'user_sisil.jpg', NULL, NULL, NULL),
(25, 'Irene', 'irene@gmail.com', NULL, 'irene123', 'Pelanggan', '082288220111', 'user_Irene.jpg', NULL, NULL, NULL),
(26, 'wony', 'wony@gmail.com', NULL, 'wony123', 'Pelanggan', '085312009876', 'user_wony.jpg', NULL, NULL, NULL),
(27, 'kazuha', 'kazuha@gmail.com', NULL, 'kazuha123', 'Pelanggan', '082398889891', 'user_kazuha.jpg', NULL, NULL, NULL),
(28, 'Felix', 'felix@gmail.com', NULL, 'felix123', 'Pelanggan', '081280798625', '', NULL, NULL, NULL),
(29, 'Jeno', 'jeno@gmail.com', NULL, 'jeno123', 'Pelanggan', '081373733672', 'user_Jeno.jpg', NULL, NULL, NULL),
(30, 'Zayyan', 'zayyan@gmail.com', NULL, 'zayyan123', 'Pelanggan', '082309070908', 'user_Zayyan.jpg', NULL, NULL, NULL),
(31, 'Sela', 'sela@gmail.com', NULL, 'sela123', 'Pelanggan', '081222887676', '', NULL, NULL, NULL),
(32, 'Cipa', 'cipa@gmail.com', NULL, 'cipa123', 'Pelanggan', '085278651208', '', NULL, NULL, NULL),
(33, 'Selly', 'Selly@gmail.com', NULL, 'selly123', 'Pelanggan', '081309983987', '', NULL, NULL, NULL),
(34, 'Malik', 'malik@gmail.com', NULL, 'malik123', 'Pelanggan', '082265878709', '', NULL, NULL, NULL),
(35, 'Haechan', 'haechan@gmail.com', NULL, 'haechan123', 'Pelanggan', '082287878765', '', NULL, NULL, NULL),
(36, 'Juna', 'juna@gmail.com', NULL, 'juna123', 'Pelanggan', '082287457634', '', NULL, NULL, NULL),
(37, 'Adam', 'adam@gmail.com', NULL, 'adam123', 'Pelanggan', '082332989880', '', NULL, NULL, NULL),
(38, 'Hawa', 'hawa@gmail.com', NULL, 'hawa123', 'Pelanggan', '082109089891', '', NULL, NULL, NULL),
(39, 'Pelanggan03', 'pelanggan03@gmail.com', NULL, '$2y$10$3ja1B3tDgfDKgujrGKvZnep/y9/cvmyLkm4.7CsNZV2Jafb0qeHQG', 'Pelanggan', '08128788908', 'user_Pelanggan03.jpg', NULL, '2023-06-14 19:14:46', '2023-06-14 19:14:46');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
