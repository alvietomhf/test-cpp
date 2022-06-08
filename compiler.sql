-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2022 pada 11.55
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
-- Database: `compiler`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `description`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 'Deklarasi variable a (int)', 20, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(2, 1, 'Deklarasi variable b (int)', 20, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(3, 1, 'Inisialisasi variable a = 20', 20, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(4, 1, 'Inisialisasi variable b = 10', 20, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(5, 1, 'Tampilkan hasil dari variable a dan b', 20, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(6, 2, 'Deklarasi variable nama (string)', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(7, 2, 'Deklarasi variable umur (int)', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(8, 2, 'Deklarasi variable jenis_kelamin (char)', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(9, 2, 'Inisialisasi variable nama = Lusi Anita', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(10, 2, 'Inisialisasi variable umur = 18', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(11, 2, 'Inisialisasi variable jenis_kelamin = P', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(12, 2, 'Tampilkan hasil dari ke-3 variable', 10, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(13, 3, 'Deklarasi konstanta dan inisialisasi panjang = 5 (int)', 20, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(14, 3, 'Deklarasi konstanta dan inisialisasi lebar = 6 (int)', 20, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(15, 3, 'Deklarasi variable hasil (int)', 20, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(16, 3, 'Inisialisasi variable hasil = panjang x lebar', 20, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(17, 3, 'Tampilkan hasil dari konstanta panjang dan lebar', 10, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(18, 3, 'Tampilkan hasil perhitungan luas persegi panjang', 10, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(19, 4, 'Deklarasi variable panjang (int)', 10, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(20, 4, 'Deklarasi variable lebar (int)', 10, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(21, 4, 'Inisialisasi variable panjang = 5', 10, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(22, 4, 'Inisialisasi variable lebar = 6', 10, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(23, 4, 'Deklarasi variable hasil (int)', 20, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(24, 4, 'Inisialisasi variable hasil = panjang x lebar', 20, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(25, 4, 'Tampilkan hasil dari variable panjang dan lebar', 10, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(26, 4, 'Tampilkan hasil perhitungan luas persegi panjang', 10, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(27, 5, 'Deklarasi variable x (int)', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(28, 5, 'Deklarasi variable y (int)', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(29, 5, 'Deklarasi variable z (int)', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(30, 5, 'Inisialisasi variable x = 10', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(31, 5, 'Inisialisasi variable y = x + 10', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(32, 5, 'Inisialisasi variable z = y + y', 15, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(33, 5, 'Tampilkan hasil dari variable x, y, dan z', 10, '2022-06-08 01:05:47', '2022-06-08 01:05:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `clas`
--

CREATE TABLE `clas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `clas`
--

INSERT INTO `clas` (`id`, `name`, `season`, `created_at`, `updated_at`) VALUES
(1, 'X RPL 1', '2022/2023', '2022-06-08 00:43:37', '2022-06-08 00:43:37'),
(2, 'X RPL 2', '2022/2023', '2022-06-08 00:43:37', '2022-06-08 00:43:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `competencies`
--

CREATE TABLE `competencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `competencies`
--

INSERT INTO `competencies` (`id`, `title`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'KD 4.4', 'Kompetensi Dasar 4.4', 'kompetensi-dasar-4.4', 'Membuat kode program dengan tipe data, variabel, konstanta, operator dan ekspresi.', '2022-06-08 00:43:37', '2022-06-08 00:43:37'),
(2, 'KD 4.5', 'Kompetensi Dasar 4.5', 'kompetensi-dasar-4.5', 'Membuat kode program dengan operasi aritmatika dan logika.', '2022-06-08 00:43:37', '2022-06-08 00:43:37'),
(3, 'KD 4.6', 'Kompetensi Dasar 4.6', 'kompetensi-dasar-4.6', 'Membuat kode program struktur kontrol percabangan.', '2022-06-08 00:43:37', '2022-06-08 00:43:37'),
(4, 'KD 4.7', 'Kompetensi Dasar 4.7', 'kompetensi-dasar-4.7', 'Membuat kode program struktur kontrol perulangan.', '2022-06-08 00:43:37', '2022-06-08 00:43:37');

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
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer_id` bigint(20) UNSIGNED NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `answer_id`, `detail`, `created_at`, `updated_at`) VALUES
(1, 1, 'int a;', '2022-06-08 02:07:50', '2022-06-08 02:07:50'),
(2, 2, 'int b;', '2022-06-08 02:07:57', '2022-06-08 02:07:57'),
(3, 3, 'a = 20;', '2022-06-08 02:08:06', '2022-06-08 02:08:06'),
(4, 4, 'b = 10;', '2022-06-08 02:08:15', '2022-06-08 02:08:15'),
(5, 5, 'cout<<\"a = \" << a;\r\ncout<<endl;\r\ncout<<\"b = \" << b;', '2022-06-08 02:08:41', '2022-06-08 02:08:41'),
(6, 5, 'cout<<\"a = \" << a;\r\ncout<<\"b = \" << b;', '2022-06-08 02:08:54', '2022-06-08 02:08:54'),
(7, 5, 'cout<<\"a = \" << a << \"b = \" << b;', '2022-06-08 02:09:14', '2022-06-08 02:09:14'),
(8, 6, 'string nama;', '2022-06-08 02:09:29', '2022-06-08 02:09:29'),
(9, 7, 'int umur;', '2022-06-08 02:09:47', '2022-06-08 02:09:47'),
(10, 8, 'char jenis_kelamin;', '2022-06-08 02:09:59', '2022-06-08 02:09:59'),
(11, 9, 'nama = \"Lusi Anita\";', '2022-06-08 02:10:15', '2022-06-08 02:10:15'),
(12, 10, 'umur = 18;', '2022-06-08 02:10:26', '2022-06-08 02:10:26'),
(13, 11, 'jenis_kelamin = \'P\';', '2022-06-08 02:10:40', '2022-06-08 02:10:40'),
(14, 12, 'cout<<\"Nama : \" << nama;\r\ncout<<endl;\r\ncout<<\"Umur : \" << umur;\r\ncout<<endl;\r\ncout<<\"Jenis Kelamin : \" << jenis_kelamin;', '2022-06-08 02:11:09', '2022-06-08 02:11:09'),
(15, 12, 'cout<<\"Nama : \" << nama;\r\ncout<<\"Umur : \" << umur;\r\ncout<<\"Jenis Kelamin : \" << jenis_kelamin;', '2022-06-08 02:11:25', '2022-06-08 02:11:25'),
(16, 12, 'cout<<\"Nama : \" << nama << \"Umur : \" << umur << \"Jenis Kelamin : \" << jenis_kelamin;', '2022-06-08 02:11:53', '2022-06-08 02:11:53'),
(17, 13, 'const int panjang = 5;', '2022-06-08 02:12:08', '2022-06-08 02:12:08'),
(18, 14, 'const int lebar = 6;', '2022-06-08 02:12:25', '2022-06-08 02:12:25'),
(19, 15, 'int hasil;', '2022-06-08 02:12:39', '2022-06-08 02:12:39'),
(20, 16, 'hasil = panjang * lebar;', '2022-06-08 02:12:55', '2022-06-08 02:12:55'),
(21, 17, 'cout<<\"panjang = \" << panjang;\r\ncout<<endl;\r\ncout<<\"lebar = \" << lebar;', '2022-06-08 02:13:17', '2022-06-08 02:13:17'),
(22, 17, 'cout<<\"panjang = \" << panjang;\r\ncout<<endl;\r\ncout<<\"lebar = \" << lebar;\r\ncout<<endl;', '2022-06-08 02:13:39', '2022-06-08 02:13:39'),
(23, 17, 'cout<<\"panjang = \" << panjang;\r\ncout<<\"lebar = \" << lebar;', '2022-06-08 02:13:53', '2022-06-08 02:13:53'),
(24, 17, 'cout<<\"panjang = \" << panjang << \"lebar = \" << lebar;', '2022-06-08 02:14:09', '2022-06-08 02:14:09'),
(25, 18, 'cout<<\"luas persegi panjang = \" << hasil;', '2022-06-08 02:14:25', '2022-06-08 02:14:25'),
(26, 18, 'cout<<endl;\r\ncout<<\"luas persegi panjang = \" << hasil;', '2022-06-08 02:14:37', '2022-06-08 02:14:37'),
(27, 19, 'int panjang;', '2022-06-08 02:14:51', '2022-06-08 02:14:51'),
(28, 20, 'int lebar;', '2022-06-08 02:15:06', '2022-06-08 02:15:06'),
(29, 21, 'panjang = 5;', '2022-06-08 02:15:15', '2022-06-08 02:15:15'),
(30, 22, 'lebar = 6;', '2022-06-08 02:15:26', '2022-06-08 02:15:26'),
(31, 23, 'int hasil;', '2022-06-08 02:15:36', '2022-06-08 02:15:36'),
(32, 24, 'hasil = panjang * lebar;', '2022-06-08 02:15:48', '2022-06-08 02:15:48'),
(33, 25, 'cout<<\"panjang = \" << panjang;\r\ncout<<endl;\r\ncout<<\"lebar = \" << lebar;', '2022-06-08 02:17:01', '2022-06-08 02:17:01'),
(34, 25, 'cout<<\"panjang = \" << panjang;\r\ncout<<endl;\r\ncout<<\"lebar = \" << lebar;\r\ncout<<endl;', '2022-06-08 02:17:19', '2022-06-08 02:17:19'),
(35, 25, 'cout<<\"panjang = \" << panjang;\r\ncout<<\"lebar = \" << lebar;', '2022-06-08 02:17:33', '2022-06-08 02:17:33'),
(36, 25, 'cout<<\"panjang = \" << panjang << \"lebar = \" << lebar;', '2022-06-08 02:17:48', '2022-06-08 02:17:48'),
(37, 26, 'cout<<\"luas persegi panjang = \" << hasil;', '2022-06-08 02:18:14', '2022-06-08 02:18:14'),
(38, 26, 'cout<<endl;\r\ncout<<\"luas persegi panjang = \" << hasil;', '2022-06-08 02:18:30', '2022-06-08 02:18:30'),
(39, 27, 'int x;', '2022-06-08 02:18:40', '2022-06-08 02:18:40'),
(40, 28, 'int y;', '2022-06-08 02:18:48', '2022-06-08 02:18:48'),
(41, 29, 'int z;', '2022-06-08 02:18:58', '2022-06-08 02:18:58'),
(42, 30, 'x = 10;', '2022-06-08 02:19:10', '2022-06-08 02:19:10'),
(43, 31, 'y = x + 10;', '2022-06-08 02:19:19', '2022-06-08 02:19:19'),
(44, 32, 'z = y + y;', '2022-06-08 02:19:31', '2022-06-08 02:19:31'),
(45, 33, 'cout<<x<<y<<z;', '2022-06-08 02:19:38', '2022-06-08 02:19:38'),
(46, 33, 'cout<<x;\r\ncout<<y;\r\ncout<<z;', '2022-06-08 02:19:49', '2022-06-08 02:19:49'),
(47, 33, 'cout<<x;\r\ncout<<endl;\r\ncout<<y;\r\ncout<<endl;\r\ncout<<z;', '2022-06-08 02:20:06', '2022-06-08 02:20:06');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_21_080242_create_permission_tables', 1),
(6, '2022_05_21_091559_create_clas_table', 1),
(7, '2022_05_21_092750_add_class_id_to_users', 1),
(8, '2022_05_26_032453_create_competencies_table', 1),
(9, '2022_05_26_034607_create_progress_table', 1),
(10, '2022_05_28_072316_create_questions_table', 1),
(11, '2022_05_28_072803_create_answers_table', 1),
(12, '2022_05_28_073051_create_keys_table', 1),
(13, '2022_06_01_040256_create_results_table', 1),
(14, '2022_06_01_041652_create_result_details_table', 1),
(15, '2022_06_02_035929_create_result_detail_answers_table', 1),
(16, '2022_06_02_042853_add_score_to_answers', 1),
(17, '2022_06_07_060809_add_correct_to_result_detail_answers', 1),
(18, '2022_06_08_001539_add_timeup_to_result_details', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3);

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
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `progress`
--

CREATE TABLE `progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `competency_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('unlock','passed','lock') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'lock',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `progress`
--

INSERT INTO `progress` (`id`, `user_id`, `competency_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'unlock', '2022-06-08 00:43:37', '2022-06-08 02:54:02'),
(2, 3, 2, 'lock', '2022-06-08 00:43:37', '2022-06-08 00:43:37'),
(3, 3, 3, 'lock', '2022-06-08 00:43:37', '2022-06-08 00:43:37'),
(4, 3, 4, 'lock', '2022-06-08 00:43:37', '2022-06-08 00:43:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `competency_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`image`)),
  `duration` int(11) NOT NULL DEFAULT 20,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `questions`
--

INSERT INTO `questions` (`id`, `competency_id`, `description`, `image`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>a (int)</li>\r\n		<li>b (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut :\r\n	<ul>\r\n		<li>a = 20</li>\r\n		<li>b = 10</li>\r\n	</ul>\r\n	</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable a dan b tersebut pada output.</li>\r\n</ul>', '[\"4.4a.png\"]', 20, '2022-06-08 00:49:17', '2022-06-08 00:49:17'),
(2, 1, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>nama (string)</li>\r\n		<li>umur (int)</li>\r\n		<li>jenis_kelamin (char)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable tersebut sebagai berikut :\r\n	<ul>\r\n		<li>nama = Lusi Anita</li>\r\n		<li>umur = 18</li>\r\n		<li>jenis_kelamin = P</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tampilkan hasil dari ke-3 variabel tersebut pada output.</li>\r\n</ul>', '[\"4.4b.png\"]', 20, '2022-06-08 00:53:36', '2022-06-08 00:53:36'),
(3, 1, '<ul>\n	<li>Deklarasikan konstanta dan inisialisasikan sebagai berikut :\n	<ul>\n		<li>panjang = 5 (int)</li>\n		<li>lebar = 6 (int)</li>\n	</ul>\n	</li>\n	<li>Deklarasikan variable baru yaitu hasil (int).</li>\n	<li>Lakukan inisialisasi pada variable baru dengan perhitungan luas persegi panjang dengan rumus panjang x lebar.</li>\n	<li>Tampilkan hasil inisialisasi dari konstanta&nbsp;panjang dan lebar.</li>\n	<li>Tampilkan hasil perhitungan luas persegi panjang.</li>\n</ul>', '[\"4.4c.png\"]', 20, '2022-06-08 00:57:28', '2022-06-08 00:57:28'),
(4, 1, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>panjang (int)</li>\r\n		<li>lebar (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable tersebut sebagai berikut :\r\n	<ul>\r\n		<li>panjang = 5</li>\r\n		<li>lebar = 6</li>\r\n	</ul>\r\n	</li>\r\n	<li>Deklarasikan variable baru yaitu hasil (int).</li>\r\n	<li>Lakukan inisialisasi pada variable baru dengan perhitungan luas persegi panjang dengan rumus panjang x lebar.</li>\r\n	<li>Tampilkan hasil inisialisasi dari variabel panjang dan lebar.</li>\r\n	<li>Tampilkan hasil perhitungan luas persegi panjang.</li>\r\n</ul>', '[\"4.4d.png\"]', 20, '2022-06-08 01:01:48', '2022-06-08 01:01:48'),
(5, 1, '<ul>\r\n	<li>Deklarasikan variable baru&nbsp;:\r\n	<ul>\r\n		<li>x (int)</li>\r\n		<li>y (int)</li>\r\n		<li>z (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable tersebut sebagai berikut :\r\n	<ul>\r\n		<li>x = 10</li>\r\n		<li>y =&nbsp; x + 10</li>\r\n		<li>z = y + y</li>\r\n	</ul>\r\n	</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable x, y dan z pada output.</li>\r\n</ul>', '[\"4.4e.png\"]', 20, '2022-06-08 01:03:53', '2022-06-08 01:03:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `competency_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `passed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `result_details`
--

CREATE TABLE `result_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `result_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL DEFAULT 0,
  `timeup` int(11) NOT NULL,
  `is_timeup` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `result_detail_answers`
--

CREATE TABLE `result_detail_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `result_detail_id` bigint(20) UNSIGNED NOT NULL,
  `answer_id` bigint(20) UNSIGNED NOT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-06-08 00:43:37', '2022-06-08 00:43:37'),
(2, 'teacher', 'web', '2022-06-08 00:43:37', '2022-06-08 00:43:37'),
(3, 'student', 'web', '2022-06-08 00:43:37', '2022-06-08 00:43:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clas_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `clas_id`, `name`, `username`, `email`, `phone`, `avatar`, `active`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Admin', 'admin', NULL, NULL, NULL, 1, NULL, '$2y$10$WV.VcQptKGAFx6DwDFRIb.qg9JS7jPbE9qePgCI0L0RbDAf0Bj8KK', NULL, '2022-06-08 00:43:37', '2022-06-08 00:43:37'),
(2, NULL, 'Guru', 'guru', 'guru@gmail.com', '082234897333', NULL, 1, NULL, '$2y$10$chGisgw6SoEmeBvfRTVJweF1ADcP2miVP7t1DQuyB/cDx2dbp/9cW', NULL, '2022-06-08 00:43:37', '2022-06-08 00:43:37'),
(3, 1, 'Siswa', 'siswa', 'siswa@gmail.com', '082234897335', NULL, 1, NULL, '$2y$10$u0rqj8n9UtTH7AWVxGy43.yvAEaf4yxq3GqXGWAHyJp8XToj8OM6i', NULL, '2022-06-08 00:43:37', '2022-06-08 00:43:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indeks untuk tabel `clas`
--
ALTER TABLE `clas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `competencies`
--
ALTER TABLE `competencies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keys_answer_id_foreign` (`answer_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `progress_user_id_foreign` (`user_id`),
  ADD KEY `progress_competency_id_foreign` (`competency_id`);

--
-- Indeks untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_competency_id_foreign` (`competency_id`);

--
-- Indeks untuk tabel `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_user_id_foreign` (`user_id`),
  ADD KEY `results_competency_id_foreign` (`competency_id`);

--
-- Indeks untuk tabel `result_details`
--
ALTER TABLE `result_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_details_result_id_foreign` (`result_id`),
  ADD KEY `result_details_question_id_foreign` (`question_id`);

--
-- Indeks untuk tabel `result_detail_answers`
--
ALTER TABLE `result_detail_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_detail_answers_result_detail_id_foreign` (`result_detail_id`),
  ADD KEY `result_detail_answers_answer_id_foreign` (`answer_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_clas_id_foreign` (`clas_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `clas`
--
ALTER TABLE `clas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `competencies`
--
ALTER TABLE `competencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `progress`
--
ALTER TABLE `progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `result_details`
--
ALTER TABLE `result_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `result_detail_answers`
--
ALTER TABLE `result_detail_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD CONSTRAINT `keys_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_competency_id_foreign` FOREIGN KEY (`competency_id`) REFERENCES `competencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_competency_id_foreign` FOREIGN KEY (`competency_id`) REFERENCES `competencies` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_competency_id_foreign` FOREIGN KEY (`competency_id`) REFERENCES `competencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `result_details`
--
ALTER TABLE `result_details`
  ADD CONSTRAINT `result_details_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `result_details_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `result_detail_answers`
--
ALTER TABLE `result_detail_answers`
  ADD CONSTRAINT `result_detail_answers_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `result_detail_answers_result_detail_id_foreign` FOREIGN KEY (`result_detail_id`) REFERENCES `result_details` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_clas_id_foreign` FOREIGN KEY (`clas_id`) REFERENCES `clas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
