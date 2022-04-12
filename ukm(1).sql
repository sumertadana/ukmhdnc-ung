-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2022 pada 03.02
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` int(9) NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fakultas` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jurusan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nama`, `nim`, `alamat`, `jk`, `id_fakultas`, `id_jurusan`, `angkatan`, `hp`, `foto`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(6, 'I Made Sumertana', 531418062, 'Perumahan Buana Wongkaditi Kota Gorontalo', 'L', '1', '1', '2018', '082290046067', 'I Made Sumertana-531418062.jpg', NULL, '1', '2022-03-31 23:48:45', '2022-03-31 23:48:45'),
(7, 'I Nengah Ardayanto', 567656789, 'Neraka Jahanam', 'L', '1', '3', '2019', '087267869987', 'I Nengah Ardayanto-567656789.jpg', NULL, '1', '2022-03-31 23:50:35', '2022-03-31 23:50:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bidang` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(5) DEFAULT NULL,
  `komentar` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `deskripsi`, `gambar`, `penulis`, `id_bidang`, `view`, `komentar`, `created_at`, `updated_at`) VALUES
(5, 'Pembantaian Massal Bersama Babu', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>', 'Pembantaian Massal Bersama.jpg', 'admin', '2', 161, 4, '2022-03-15 10:05:39', '2022-04-10 21:09:40'),
(6, 'Jangan lupa makan kawan', '<p>jvosjdbvsddj sdnsldnsdknlskd sdknsldnlskdsdlknslkdnlsd dnsdsd&nbsp; noodhoivsod diosdi dsoid dsodi sdisodi dsoidj sdisodi sdisoid sdoisdoij sdosdijs doisjd sodijsdoi sdfijsdoi fosidjfosid fsodijsoidjf odijfoid sodijfosid fsodijosdi sodijsoidj sdijsodijso doijoisdj osidjsodijosid osidjosidjfo sdjfsdoij sodijsod soidjosidjf osdijsod isodijs odijsod sodijsdojosid fsodijsodj&nbsp; sdosj dosdis disjdo sd</p>\r\n\r\n<p>djpsdjosd sdsodjosjd sdijffsdofi sdoifjsdoijsd fosidjfosid sodifosdif sodijffosidjsd isdjsodi sodijsodijfsodiso d</p>', 'Jangan lupa makan kawan.jpg', 'admin', '4', 20, 6, '2022-03-30 21:21:14', '2022-04-10 19:14:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id`, `kode`, `bidang`, `created_at`, `updated_at`) VALUES
(1, 'B1', 'Pengurus Inti', NULL, NULL),
(2, 'B2', 'Keagamaan', NULL, NULL),
(3, 'B2', 'Olahraga', NULL, NULL),
(4, 'B2', 'Penelitian Dan Pengembangan', NULL, NULL),
(5, 'B2', 'Kesekretariatan', NULL, NULL),
(6, 'B2', 'Seni dan Budaya', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fakultas`
--

CREATE TABLE `fakultas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fakultas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fakultas`
--

INSERT INTO `fakultas` (`id`, `fakultas`, `created_at`, `updated_at`) VALUES
(1, 'Teknik', NULL, NULL),
(2, ' Matematika dan Ilmu Pengetahuan Alam', NULL, NULL),
(3, 'Ilmu Pendidikan', NULL, NULL),
(4, ' Ilmu Sosial', NULL, NULL),
(5, 'Sastra dan Budaya', NULL, NULL),
(6, 'Pertanian', NULL, NULL),
(7, 'Olahraga dan Kesehatan', NULL, NULL),
(8, 'Ekonomi dan Bisnis', NULL, NULL),
(9, 'Hukum', NULL, NULL),
(10, ' Perikanan dan Ilmu Kelautan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `foto`, `created_at`, `updated_at`) VALUES
(2, 'IMG20191113115146.jpg', '2022-04-04 20:26:57', '2022-04-05 09:12:45'),
(3, 'IMG20191113121751.jpg', '2022-04-05 09:13:49', '2022-04-05 09:13:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kondisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama`, `kode`, `jumlah`, `kondisi`, `created_at`, `updated_at`) VALUES
(1, 'Komputer', 'A12', 10, 'Baik', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bidang` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `kode`, `jabatan`, `id_bidang`, `created_at`, `updated_at`) VALUES
(1, 'J1', 'Ketua Umum', '1', NULL, NULL),
(2, 'J2', 'Wakil Ketua', '1', NULL, NULL),
(3, 'J3', 'Sekertaris Umum', '1', NULL, NULL),
(4, 'J4', 'Bendahara Umum', '1', NULL, NULL),
(5, 'J5', 'Ketua Bidang', '2', NULL, NULL),
(6, 'J6', 'Sekertaris Bidang', '2', NULL, NULL),
(7, 'J7', 'Anggota Bidang', '2', NULL, NULL),
(8, 'J5', 'Ketua Bidang', '3', NULL, NULL),
(9, 'J6', 'Sekertaris Bidang', '3', NULL, NULL),
(10, 'J7', 'Anggota Bidang', '3', NULL, NULL),
(11, 'J5', 'Ketua Bidang', '4', NULL, NULL),
(12, 'J6', 'Sekertaris Bidang', '4', NULL, NULL),
(13, 'J7', 'Anggota Bidang', '4', NULL, NULL),
(14, 'J5', 'Ketua Bidang', '5', NULL, NULL),
(15, 'J6', 'Sekertaris Bidang', '5', NULL, NULL),
(16, 'J7', 'Anggota Bidang', '5', NULL, NULL),
(17, 'J5', 'Ketua Bidang', '6', NULL, NULL),
(18, 'J6', 'Sekertaris Bidang', '6', NULL, NULL),
(19, 'J7', 'Anggota Bidang', '6', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_fakultas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`, `id_fakultas`, `created_at`, `updated_at`) VALUES
(1, 'Informatika', 1, NULL, NULL),
(2, 'Sipil', 1, NULL, NULL),
(3, 'Arsitektur', 1, NULL, NULL),
(4, 'Industri', 1, NULL, NULL),
(5, 'Elektro', 1, NULL, NULL),
(6, 'Kriya', 1, NULL, NULL),
(7, 'Teknik Geologi ', 2, NULL, NULL),
(11, 'Biologi', 2, NULL, NULL),
(12, 'Matematika', 2, NULL, NULL),
(13, 'Fisika', 2, NULL, NULL),
(14, 'Kimia', 2, NULL, NULL),
(15, 'Bimbingan Konseling', 3, NULL, NULL),
(16, 'PGPAUD', 3, NULL, NULL),
(17, 'PGSD', 3, NULL, NULL),
(18, 'Manajemen Pendidikan', 3, NULL, NULL),
(19, 'Pendidikan Luar Sekolah', 3, NULL, NULL),
(20, 'Administrasi Publik', 4, NULL, NULL),
(21, 'PPKN', 4, NULL, NULL),
(22, 'IHK', 4, NULL, NULL),
(23, 'Sosiologi', 4, NULL, NULL),
(24, ' Pendidikan Sejarah', 4, NULL, NULL),
(25, 'Sendratasik', 5, NULL, NULL),
(26, 'Bahasa Inggris', 5, NULL, NULL),
(27, 'Bahasa Indonesia', 5, NULL, NULL),
(28, 'Agribisnis', 6, NULL, NULL),
(29, 'Agroteknologi', 6, NULL, NULL),
(30, 'Peternakan', 6, NULL, NULL),
(31, 'Ilmu dan Teknologi Pangan', 6, NULL, NULL),
(32, 'Kesehatan Masyarakat', 7, NULL, NULL),
(33, ' Farmasi', 7, NULL, NULL),
(34, 'Penjaskes', 7, NULL, NULL),
(35, 'Pendidikan Kepelatihan dan Olahraga', 7, NULL, NULL),
(36, 'Ilmu Keperawatan', 7, NULL, NULL),
(37, 'Manajemen', 8, NULL, NULL),
(38, 'Akuntansi', 8, NULL, NULL),
(39, 'Ekonomi Pembangunan', 8, NULL, NULL),
(40, 'Pendidikan Ekonomi', 8, NULL, NULL),
(41, 'Ilmu Hukum', 9, NULL, NULL),
(42, 'Manajemen Sumber Daya Perairan', 10, NULL, NULL),
(43, 'Budidaya Perairan', 10, NULL, NULL),
(44, 'Teknologi Hasil Perikanan', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_berita` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_berita`, `nama`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 5, 'epik', 'If you\'re going to lead a space frontier, it has to be government; it\'ll never be private enterprise. Because the space frontier is dangerous, and it\'s expensive, and it has unquantified risks. ', '2022-04-08 10:04:09', '2022-04-08 10:04:09'),
(2, 6, 'epik', 'dkjvskdjvksd djvkjdsvkjd kdvkjdv kdvk skdv kds jkdj ksd ksjd kdsj ksdj skdj kljdsvkaj aksdvakvk skjas kajs kajs kasj aksjv kas kas kajsvkas aksjvaks aks dakjsd kas dkadsajvman skajsvdkans kajsdajs mans kajsvdamsn kas kvas kajskamsn aks kajs', '2022-04-10 18:47:43', '2022-04-10 18:47:43'),
(4, 6, 'gfgf', 'arena parameter yg dikirim adalah ID maka sebelum simpan ke database, buat query dulu untuk mengambil nama prov,kab,kec berdasarkan IDnya, kemudian simpan ke database nya, tapi pastikan ubah dulu kolom provinsi,kabupaten,kecamatan di database yg seblumnya menggunakan integer ubah ke varchar untuk dapat menampung nilai karakter.arena parameter yg dikirim adalah ID maka sebelum simpan ke database, buat query dulu untuk mengambil nama prov,kab,kec berdasarkan IDnya, kemudian simpan ke database nya, tapi pastikan ubah dulu kolom provinsi,kabupaten,kecamatan di database yg seblumnya menggunakan integer ubah ke varchar untuk dapat menampung nilai karakter.', '2022-04-10 19:03:19', '2022-04-10 19:03:19'),
(5, 5, 'epiks', 'If you\'re going to lead a space frontier, it has to be government; it\'ll never be private enterprise. Because the space frontier is dangerous, and it\'s expensive, and it', '2022-04-10 19:26:41', '2022-04-10 19:26:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar2`
--

CREATE TABLE `komentar2` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_berita` int(11) NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komentar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `komentar2`
--

INSERT INTO `komentar2` (`id`, `id_berita`, `id_komentar`, `nama`, `komentar`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'jefry', 'If you\'re going to lead a space frontier, it has to be government; it\'ll never be private enterprise. Because the space frontier is dangerous, and it\'s expensive, and it has unquantified risks.', '2022-04-08 10:43:36', '2022-04-08 10:43:36'),
(2, 5, 1, 'rehan', 'f you\'re going to lead a space frontier, it has to be government; it\'ll never be private enterprise. Because the space frontier is dangerous, and it\'s expensive, and it has unquantified risks.', '2022-04-10 19:17:53', '2022-04-10 19:17:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2022_02_06_182916_create_sessions_table', 1),
(17, '2022_02_16_151652_anggota', 2),
(18, '2022_02_17_152819_create_inventaris_table', 2),
(20, '2022_02_18_163522_create_penguruses_table', 2),
(21, '2022_02_18_184019_struktur', 3),
(22, '2022_02_23_063746_create_bidangs_table', 4),
(23, '2022_02_23_064326_create_jabatans_table', 5),
(24, '2022_03_14_063251_create_beritas_table', 5),
(25, '2022_03_26_050236_create_fakultas_table', 6),
(26, '2022_03_26_050958_create_jurusans_table', 7),
(27, '2022_03_29_045042_create_sliders_table', 7),
(28, '2022_04_05_034457_create_galeris_table', 8),
(29, '2022_04_08_131233_create_komentars_table', 9),
(30, '2022_04_08_132456_create_komentar2s_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE `pengurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bidang` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jabatan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id`, `nim`, `id_bidang`, `id_jabatan`, `periode`, `foto`, `created_at`, `updated_at`) VALUES
(4, '531418062', '1', '4', '2022', NULL, '2022-03-31 23:52:54', '2022-03-31 23:52:54'),
(5, '567656789', '1', '1', '2022', NULL, '2022-03-31 23:59:13', '2022-03-31 23:59:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('72CjQFrUh1d45loLGNTe4SoL6bj0bCuoDjwiFNdJ', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:99.0) Gecko/20100101 Firefox/99.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiM2NoUjdBQmJmUFl3ZklvYUVPd0tFdGpFaXBUeGI1aGVSeE00ejQ0YSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vbG9jYWxob3N0L3VrbS9wdWJsaWMvcGVuZ3VydXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkbHJRTHhSRVdFTWo0bE5mT2R2alJ5ZThFSHJqVy5kRi5wV1JXbDA5cUU1Uk1WQUhHZ3dMVlMiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGxyUUx4UkVXRU1qNGxOZk9kdmpSeWU4RUhyalcuZEYucFdSV2wwOXFFNVJNVkFIR2d3TFZTIjt9', 1649654165);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `judul`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Pengurus 2021', 'Pengurus 2021.jpg', NULL, '2022-03-28 23:15:04', '2022-03-28 23:15:04'),
(3, 'jika makan itu enak', 'jika makan itu enak.jpg', NULL, '2022-03-29 03:50:52', '2022-03-29 03:50:52'),
(4, 'yiha', 'yiha.jpg', NULL, '2022-03-29 03:52:57', '2022-03-29 03:52:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `role`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'epik', 'epik', 'superadmin', NULL, NULL, '$2y$10$NJmSLS8G5OuIioU9/I6kxe1R3SzxfEAQZz8WzoIJ39TatN6TiLlRu', NULL, NULL, NULL, '2022-04-08 08:54:41', '2022-04-08 08:54:41'),
(4, 'admin', 'admin', 'superadmin', NULL, NULL, '$2y$10$lrQLxREWEMj4lNfOdvjRye8EHrjW.dF.pWRWl09qE5RMVAHGgwLVS', NULL, NULL, NULL, '2022-04-08 09:17:48', '2022-04-08 09:17:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `anggota_nim_unique` (`nim`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inventaris_kode_unique` (`kode`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar2`
--
ALTER TABLE `komentar2`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `komentar2`
--
ALTER TABLE `komentar2`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
