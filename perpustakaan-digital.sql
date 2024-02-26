-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 12:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan-digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `slug`, `foto`, `deskripsi`, `penulis`, `penerbit`, `tahun_terbit`, `stok`, `created_at`, `updated_at`) VALUES
(6, 'Hujan 1', 'hujan', 'img/Hujan.jpg', 'Novel HUJAN berkisah tentang persahabatan, tentang cinta, tentang perpisahan, tentang melupakan, dan tentang hujan.', 'Tere Liye', 'PENERBIT SABAK GRIP', 2022, 4, '2024-02-18 16:00:25', '2024-02-26 09:11:44'),
(7, 'One Piece 104', 'one-piece-104', 'img/One Piece 104.jpg', 'Dua puluh tahun sejak penindasan Kaido dan Orochi... Dapatkah Negara Wano yang telah melalui masa-masa berat, merdeka dan mengembalikan senyum semua orang!? Semuanya tergantung pada tinju Luffy!! Babak negara Wano memasuki klimaks!! Simak kisah petualangan di lautan, One Piece!!', 'Eiichiro Oda', 'Elex Media Komputindo', 2023, 5, '2024-02-20 06:36:08', '2024-02-26 09:27:37'),
(8, 'Jujutsu Kaisen Vol.01', 'jujutsu-kaisen-vol-01', 'img/Jujutsu Kaisen Vol.01.jpg', 'Jujutsu Kaisen adalah sebuah seri manga shōnen asal Jepang yang ditulis dan diilustrasikan oleh Gege Akutami. Manga ini dimuat berseri dalam majalah Weekly Shōnen Jump terbitan Shueisha sejak Maret 2018, dan telah diterbitkan menjadi dua puluh volume tankōbon per Agustus 2022.', 'Gege Akutami', 'Elex Media Komputindo', 2021, 5, '2024-02-20 06:43:35', '2024-02-26 09:36:08'),
(9, 'One Piece 01', 'one-piece-01', 'img/One Piece 01.jpg', 'Komik seringkali dijadikan sebagai koleksi dan diburu oleh penggemarnya karena serinya yang cukup terkenal dan kepopulerannya terus berlanjut sampai saat ini. Dalam memilih jenis komik, ada baiknya perhatikan terlebih dahulu ringkasan cerita komik di sampul bagian belakang sehingga sesuai dengan preferensi pribadi pembaca.\r\n\r\nNamaku Luffy. Dahulu, ada seorang pria yang telah memiliki semua kekayaan, kemasyhuran, dan kekuasaan di dunia yang disebut One Piece, yaitu Gold Roger, si Raja Bajak Laut. Kalimat terakhir yang diucapkan sebelum kematiannya telah mendorong orang-orang di seluruh dunia untuk mengarungi lautan, mencari harta karun, termasuk aku. Aku ingin menjadi Raja Bajak Laut! Namun, untuk meraih cita-cita itu aku harus jadi kuat! Buah gomu-gomu yang kumakan, membuatku menjadi manusia karet. Ya! Sekarang saatnya mencari kru untuk kapal bajak lautku!', 'Eiichiro Oda', 'Elex Media Komputindo', 2023, 5, '2024-02-20 06:45:07', '2024-02-26 09:37:23'),
(10, 'Rembulan Tenggelam Di Wajahmu', 'rembulan-tenggelam-di-wajahmu', 'img/Novel Rembulan Tenggelam Di Wajahmu.jpg', 'Novel Rembulan Tenggelam Di Wajahmu menceritakan tentang perjalanan hidup seorang pria yang bernama Rehan Raujana atau yang biasa dipanggil Ray. Pria itu berumur enam puluh tahun. Dia adalah seorang Pria pemilik kongsi bisnis terbesar yang pernah ada. Pria pemilik imperium terbesar yang menggurita. Yang sayangnya, sedang sekarat.', 'Tere Liye', 'PENERBIT SABAK GRIP', 2021, 5, '2024-02-20 06:46:38', '2024-02-26 09:40:14'),
(11, 'Tentang Kamu', 'tentang-kamu', 'img/Tentang Kamu.jpg', 'Bukan persoalan cinta, novel Tentang Kamu lebih tepatnya digolongkan sebagai novel misteri ataupun seperti detektif. Akan tetapi, selayaknya berbagai karya tulis novel Tere Liye lainnya, novel ini erat dengan berbagai nilai, seperti makna sebuah perjuangan, persahabatan, dan kekeluargaan.\r\n\r\nCerita dalam novel ini diawali dengan sebuah logika yang bisa dikatakan cukup simpel dan sederhana untuk diikuti oleh sebagian pembacanya. Namun, kisah tersebut beranak-pinak menjadi kisah yang rumit dan terkesan tidak realistis saat menjelang bagian akhir–yang mana muncul seorang tokoh antagonis.', 'Tere Liye', 'PENERBIT SABAK GRIP', 2021, 5, '2024-02-20 06:47:45', '2024-02-26 09:45:20'),
(12, 'Komunikasi Bisnis untuk Manajemen', 'komunikasi-bisnis-untuk-manajemen', 'img/Komunikasi Bisnis untuk Manajemen.jpg', 'Buku Komunikasi Bisnis ini membahas beberapa hal yang berkaitan dengan komunikasi bisnis. Tujuan disusunnya buku ini adalah untuk menambah khasanah dan wawasan ilmu pengetahuan para pembaca dari berbagai kalangan baik. akademisi maupun praktisi.', 'Intan Oktaviani S.Kom.,M.Kom, Dan Rizki Pujiyanto S.E., M.M', 'Pustaka Baru Press', 2023, 3, '2024-02-20 06:48:53', '2024-02-26 07:33:35'),
(13, 'The Master Book Of Personal Branding', 'the-master-book-of-personal-branding', 'img/The Master Book Of Personal Branding.jpg', 'Membangun personal branding (merek diri) dalam karier maupun bisnis memang membutuhkan kerja keras dan pengalaman. Personal branding tidak sekadar soal tampil beda dan percaya diri di hadapan umum, tetapi bagaimana Anda mengaktualisasikan potensi diri, sehingga citra positif dapat berkembang dan kepercayaan dengan orang lain dapat Anda bangun. Buku ini menyajikan cara yang efektif dan efisien dalam membangun merek diri, yaitu melalui teknik berbicara, bernegosiasi, memimpin, serta memanfaatkan media sosial. Melalui hasil riset dan pengalaman di bidang kebijakan publik, penulis menjabarkan strategi membangun merek diri (reputasi positif) secara komprehensif serta praktis, sehingga dapat memberikan pengaruh yang mendalam sekaligus signifikan terhadap diri sendiri, orang lain, hingga kesuksesan Anda.', 'Farco Siswiyanto Raharjo', 'Anak Hebat Indonesia', 2023, 3, '2024-02-20 06:55:21', '2024-02-20 06:55:21'),
(14, 'Komunikasi Bisnis', 'komunikasi-bisnis', 'img/Komunikasi Bisnis.jpg', 'Buku ini hadir untuk membantu para komunikator di dunia bisnis atau mahasiswa yang sedang mempelajari komunikasi bisnis untuk lebih memahami dasar-dasar komunikai di dunia bisnis dan cara menghadapi kendala dalam berkomunikasi. Selain itu, di dalam buku ini juga dibahas tentang korespondensi bisnis yang sangat membantu dalam surat menyurat berkaitan dengan bisnis. Seluruh materi disampaikan dengan bahasa yang sederhana sehingga dapat dengan mudah dipahami.', 'Alexander Hery, S.E.,MSi.', 'Yrama Widyaa', 2022, 3, '2024-02-20 06:57:07', '2024-02-20 06:57:07'),
(15, 'Sekak Math! Strategi Khusus Pasti Bisa Matematika Untuk SMP', 'sekak-math-strategi-khusus-pasti-bisa-matematika-untuk-smp', 'img/Sekak Math! Strategi Khusus Pasti Bisa Matematika Untuk SMP.jpg', 'Mengerjakan soal-soal LOTS dan HOTS Matematika seraya bilang SEKAK MATH saat main catur kini tak hanya mimpi. Buku ini mengupas tuntas segala jenis soal Matematika kelas 7, 8, maupun 9, tak ada yang terlewat. Keunikan buku ini adalah banyaknya SEKAK MATH (Strategi Khusus/Trik Kilat) kerjakan soal-soal Matematika yang belum tentu ada di buku lain. So, garansi bimbingan gratis langsung dari penulis lewat ig/fb/wa hingga youtube channel: atsnan_wae, jika ada kesulitan yang dirasa adik-adik ketika menjawab soal-soal Matematika, khususnya level HOTS. Ingat ya adik-adik, Matematika itu menyenangkan, bukan memusingkan. Heee', 'Muh. Fajaruddin Atsnan Dan Rahmita Yuliana Gazali', 'Penerbit Andi', 2022, 3, '2024-02-20 06:57:44', '2024-02-20 06:57:44'),
(16, 'Kompeten Kimia SMA/MA Kelas 10, 11, 12', 'kompeten-kimia-sma-ma-kelas-10-11-12', 'img/Kompeten Kimia SMA-MA Kelas 10, 11, 12.jpg', 'Kompeten Kimia SMA/MA, buku yang akan sangat bermanfaat bagi siswa-siswi SMA karena buku ini memuat materi-materi Kimia SMA dari kelas X sampai dengan kelas XII. Buku yang superlengkap ini sudah mengacu pada kurikulum Merdeka baik materi maupun soal-soalnya (tes formatif dan tes sumatif). Adapun materi-materi yang ada dalam buku ini di antaranya adalah Kimia hijau yang membahas tentang bagaimana cara kita meminimalisasi penggunaan bahan kimia berbahaya agar tidak membahayakan bagi kesehatan. Ada pula materi tentang termokimia yang membahas tentang penelaahan pengaruh kalor pada reaksi kimia. Reaksi Redoks yang mempelajari sifat daya hantar listrik suatu larutan. Dan masih banyak materi kimia SMA kelas X, XI, dan Xl.', 'Ibnu Shohib, S.Pd.Si.', 'Pixelindo', 2023, 3, '2024-02-20 06:58:33', '2024-02-20 06:58:33'),
(17, 'Ekonomi untuk Siswa SMA-MA Kelas 12', 'ekonomi-untuk-siswa-sma-ma-kelas-12', 'img/Ekonomi untuk Siswa SMA-MA Kelas 12.jpg', 'Buku Ekonomi untuk Siswa SMA-MA Kelas 12 ini disusun dengan menggunakan Kurikulum Merdeka yang tentunya mengusung semangat merdeka belajar. Adapun kebijakan pengembangan kurikulum ini tertuang dalam Keputusan Kepala Badan Standar, Kurikulum, dan Asesmen Pendidikan Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi Nomor 033/H/KR/2022 Hasil Uji Publik tentang Capaian Pembelajaran pada Pendidikan Anak Usia Dini, Jenjang Pendidikan Dasar, dan Jenjang Pendidikan Menengah pada Kurikulum Merdeka. Untuk mendukung pelaksanaan kurikulum tersebut, diperlukan penyediaan buku teks pelajaran yang sesuai dengan kebutuhan. Buku teks pelajaran ini merupakan salah satu bahan pembelajaran bagi siswa dan guru.', 'Kinanti Geminastiti & Nella Nurlita', 'Yrama Widya', 2023, 3, '2024-02-20 06:59:41', '2024-02-26 07:33:30');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Komik', '2024-02-17 19:17:10', '2024-02-17 19:17:10'),
(2, 'Novel', '2024-02-17 19:17:31', '2024-02-17 19:17:31'),
(6, 'Bisnis & Ekonomi', '2024-02-17 19:20:10', '2024-02-17 19:20:10'),
(15, 'Buku Pelajaran', '2024-02-18 09:45:22', '2024-02-18 09:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`id`, `buku_id`, `kategori_id`, `created_at`, `updated_at`) VALUES
(5, 6, 2, '2024-02-20 07:02:04', '2024-02-20 07:02:04'),
(6, 7, 1, '2024-02-20 07:02:11', '2024-02-20 07:02:11'),
(7, 8, 1, '2024-02-20 07:02:15', '2024-02-20 07:02:15'),
(8, 9, 1, '2024-02-20 07:02:22', '2024-02-20 07:02:22'),
(9, 10, 2, '2024-02-20 07:02:27', '2024-02-20 07:02:27'),
(10, 11, 2, '2024-02-20 07:02:34', '2024-02-20 07:02:34'),
(11, 12, 6, '2024-02-20 07:02:46', '2024-02-20 07:02:46'),
(12, 13, 6, '2024-02-20 07:02:54', '2024-02-20 07:02:54'),
(13, 14, 6, '2024-02-20 07:03:02', '2024-02-20 07:03:02'),
(14, 15, 15, '2024-02-20 07:03:08', '2024-02-20 07:03:08'),
(15, 16, 15, '2024-02-20 07:03:13', '2024-02-20 07:03:13'),
(16, 17, 15, '2024-02-20 07:03:19', '2024-02-20 07:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`id`, `users_id`, `buku_id`, `created_at`, `updated_at`) VALUES
(21, 2, 17, '2024-02-25 23:44:31', '2024-02-25 23:44:31'),
(22, 2, 10, '2024-02-26 07:30:06', '2024-02-26 07:30:06'),
(24, 2, 8, '2024-02-26 09:46:42', '2024-02-26 09:46:42'),
(25, 2, 9, '2024-02-26 09:46:47', '2024-02-26 09:46:47'),
(27, 2, 7, '2024-02-26 09:56:27', '2024-02-26 09:56:27');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_13_225307_create_buku_table', 1),
(6, '2024_02_13_225318_create_kategori_table', 1),
(7, '2024_02_13_225344_create_kategoribuku_relasi_table', 1),
(8, '2024_02_13_225409_create_peminjaman_table', 1),
(9, '2024_02_13_225419_create_koleksi_table', 1),
(10, '2024_02_13_225425_create_ulasan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `batas_waktu` date NOT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `status_peminjaman` varchar(255) NOT NULL DEFAULT 'N',
  `denda` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `ulasan` text DEFAULT NULL,
  `rating` decimal(2,1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id`, `users_id`, `buku_id`, `ulasan`, `rating`, `created_at`, `updated_at`) VALUES
(10, 2, 6, 'sdsad', 4.0, '2024-02-18 18:35:00', '2024-02-18 18:35:00'),
(11, 2, 6, 'sadsadsad', 4.0, '2024-02-18 18:35:06', '2024-02-18 18:35:06'),
(12, 2, 6, 'sadsadsad', 4.0, '2024-02-18 18:35:07', '2024-02-18 18:35:07'),
(13, 2, 11, 'tes', 4.0, '2024-02-20 18:18:18', '2024-02-20 18:18:18'),
(15, 2, 6, 'tes', 5.0, '2024-02-20 23:18:16', '2024-02-20 23:18:16'),
(31, 2, 7, 'sadasdsa', 5.0, '2024-02-26 03:02:03', '2024-02-26 03:02:03'),
(34, 2, 6, 'dasd', 4.0, '2024-02-26 03:04:20', '2024-02-26 03:04:20'),
(35, 2, 6, 'dasdas', 4.0, '2024-02-26 03:04:23', '2024-02-26 03:04:23'),
(36, 2, 6, 'asdasd', 4.0, '2024-02-26 03:10:14', '2024-02-26 03:10:14'),
(37, 2, 6, 'dsadas', 5.0, '2024-02-26 03:10:17', '2024-02-26 03:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('admin','petugas','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `nama_lengkap`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@email.com', 'admin', NULL, '$2y$12$D4kDWGF9ywFsgDUTCLeUtOKdHFCnWYdz.lv0vUEKfhHtLPKWzalmS', 'Admin Perpustakaan Digital', 'Perpustakaan Digital', NULL, '2024-02-17 16:26:01', '2024-02-17 16:26:01'),
(2, 'azrilzulfan', 'azrilazril0160@gmail.com', 'user', NULL, '$2y$12$6Xa6Fz1blruZZMkYI6T7C.WY9BmpfbpVWyPv1JwZGkUqER8I8QCqK', 'Azril Zulfan', 'Bogor', NULL, '2024-02-18 01:59:11', '2024-02-18 01:59:11'),
(3, 'petugas', 'petugas@email.com', 'petugas', NULL, '$2y$12$A.HpP03Q2sE5AqZd/SReg.YRXODOHQJys/eW2ZPueZCk6CuVmN48O', 'Petugas', 'Bogor Tajur', NULL, '2024-02-20 07:24:40', '2024-02-20 18:14:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoribuku_relasi_kategori_id_foreign` (`kategori_id`),
  ADD KEY `kategoribuku_relasi_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `koleksi_users_id_foreign` (`users_id`),
  ADD KEY `koleksi_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_users_id_foreign` (`users_id`),
  ADD KEY `peminjaman_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasan_users_id_foreign` (`users_id`),
  ADD KEY `ulasan_buku_id_foreign` (`buku_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategoribuku_relasi_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD CONSTRAINT `koleksi_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `koleksi_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasan_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
