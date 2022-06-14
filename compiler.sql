-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2022 pada 12.22
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
(33, 5, 'Tampilkan hasil dari variable x, y, dan z', 10, '2022-06-08 01:05:47', '2022-06-08 01:05:47'),
(35, 10, 'Deklarasi variable harga (int)', 10, '2022-06-13 19:28:12', '2022-06-13 19:28:12'),
(36, 10, 'Deklarasi variable ppn (double)', 10, '2022-06-13 19:28:48', '2022-06-13 19:28:48'),
(37, 10, 'Deklarasi variable pajak (int)', 10, '2022-06-13 19:29:25', '2022-06-13 19:29:25'),
(38, 10, 'Inisialisasi variable harga = 40000', 10, '2022-06-13 19:29:55', '2022-06-13 19:29:55'),
(39, 10, 'Inisialisasi variable ppn = 0.1', 10, '2022-06-13 19:30:24', '2022-06-13 19:30:24'),
(40, 10, 'Inisialisasi variable pajak = harga x ppn', 20, '2022-06-13 19:31:04', '2022-06-13 19:31:04'),
(41, 10, 'Tampilkan hasil dari variable harga', 10, '2022-06-13 19:31:51', '2022-06-13 19:31:51'),
(42, 10, 'Tampilkan hasil dari variable ppn', 10, '2022-06-13 19:32:04', '2022-06-13 19:32:04'),
(43, 10, 'Tampilkan hasil dari variable pajak', 10, '2022-06-13 19:32:14', '2022-06-13 19:32:14'),
(44, 11, 'Deklarasi variable alas (int)', 10, '2022-06-13 19:34:43', '2022-06-13 19:34:43'),
(45, 11, 'Deklarasi variable tinggi (int)', 10, '2022-06-13 19:34:54', '2022-06-13 19:34:54'),
(46, 11, 'Deklarasi variable luas (double)', 10, '2022-06-13 19:35:18', '2022-06-13 19:35:18'),
(47, 11, 'Inisialisasi variable alas = 7', 10, '2022-06-13 19:35:44', '2022-06-13 19:35:44'),
(48, 11, 'Inisialisasi variable tinggi = 10', 10, '2022-06-13 19:36:05', '2022-06-13 19:36:05'),
(49, 11, 'Inisialisasi variable luas = 0.5 x alas x tinggi', 20, '2022-06-13 19:36:37', '2022-06-13 19:36:37'),
(50, 11, 'Tampilkan hasil dari variable alas', 10, '2022-06-13 19:37:10', '2022-06-13 19:37:10'),
(51, 11, 'Tampilkan hasil dari variable tinggi', 10, '2022-06-13 19:37:20', '2022-06-13 19:37:20'),
(52, 11, 'Tampilkan hasil dari variable luas', 10, '2022-06-13 19:37:31', '2022-06-13 19:37:31'),
(53, 12, 'Deklarasi variable celcius (float)', 15, '2022-06-13 19:38:06', '2022-06-13 19:38:06'),
(54, 12, 'Deklarasi variable farenheit (float)', 15, '2022-06-13 19:38:23', '2022-06-13 19:38:23'),
(55, 12, 'Inisialisasi variable celcius = 70', 20, '2022-06-13 19:38:53', '2022-06-13 19:38:53'),
(56, 12, 'Inisialisasi variable farenheit = (celcius x 9 / 5) + 32', 20, '2022-06-13 19:39:23', '2022-06-13 19:39:32'),
(57, 12, 'Tampilkan hasil dari variable celcius', 15, '2022-06-13 19:40:03', '2022-06-13 19:40:03'),
(58, 12, 'Tampilkan hasil dari variable farenheit', 15, '2022-06-13 19:40:16', '2022-06-13 19:40:16'),
(59, 13, 'Deklarasi variable a (boolean)', 5, '2022-06-13 19:41:07', '2022-06-13 19:41:07'),
(60, 13, 'Deklarasi variable b (boolean)', 5, '2022-06-13 19:41:15', '2022-06-13 19:41:15'),
(61, 13, 'Deklarasi variable hasil_a (boolean)', 5, '2022-06-13 19:41:26', '2022-06-13 19:41:26'),
(62, 13, 'Deklarasi variable hasil_b (boolean)', 5, '2022-06-13 19:41:41', '2022-06-13 19:41:41'),
(63, 13, 'Inisialisasi variable a = true', 10, '2022-06-13 19:42:04', '2022-06-13 19:42:04'),
(64, 13, 'Inisialisasi variable b = false', 10, '2022-06-13 19:42:21', '2022-06-13 19:42:21'),
(65, 13, 'Lakukan operasi logika a AND a pada variable hasil_a', 20, '2022-06-13 19:43:12', '2022-06-13 19:43:12'),
(66, 13, 'Lakukan operasi logika a AND b pada variable hasil_b', 20, '2022-06-13 19:43:37', '2022-06-13 19:43:37'),
(67, 13, 'Tampilkan hasil operasi operator logika a AND a', 10, '2022-06-13 19:44:23', '2022-06-13 19:44:23'),
(68, 13, 'Tampilkan hasil operasi operator logika a AND b', 10, '2022-06-13 19:44:35', '2022-06-13 19:44:35'),
(69, 14, 'Deklarasi variable a (int)', 10, '2022-06-13 19:45:20', '2022-06-13 19:45:20'),
(70, 14, 'Deklarasi variable b (int)', 10, '2022-06-13 19:45:31', '2022-06-13 19:45:31'),
(71, 14, 'Inisialisasi variable a = 5', 10, '2022-06-13 19:45:48', '2022-06-13 19:45:48'),
(72, 14, 'Inisialisasi variable b = 6', 10, '2022-06-13 19:46:04', '2022-06-13 19:46:04'),
(73, 14, 'Lakukan operasi post increment pada variable a', 20, '2022-06-13 19:46:26', '2022-06-13 19:46:26'),
(74, 14, 'Lakukan operasi post decrement pada variable b', 20, '2022-06-13 19:46:47', '2022-06-13 19:46:47'),
(75, 14, 'Tampilkan hasil operasi post increment variable a', 10, '2022-06-13 19:47:04', '2022-06-13 19:47:04'),
(76, 14, 'Tampilkan hasil operasi post decrement variable b', 10, '2022-06-13 19:47:15', '2022-06-13 19:47:15'),
(77, 15, 'Deklarasikan variable a (int)', 10, '2022-06-13 19:48:04', '2022-06-13 19:48:04'),
(78, 15, 'Inputan simpan pada variable a', 10, '2022-06-13 19:48:18', '2022-06-13 19:48:18'),
(79, 15, 'Buat percabangan dengan kondisi nilai a habis dibagi 2', 30, '2022-06-13 19:48:44', '2022-06-13 19:48:44'),
(80, 15, 'Jika benar, maka menghasilkan pernyataan berupa output “bilangan genap”', 25, '2022-06-13 19:49:07', '2022-06-13 19:49:07'),
(81, 15, 'Jika salah, maka menghasilkan pernyataan berupa output “bilangan ganjil”', 25, '2022-06-13 19:49:19', '2022-06-13 19:49:19'),
(82, 16, 'Deklarasikan variable nilai (int)', 10, '2022-06-13 19:49:47', '2022-06-13 19:49:47'),
(83, 16, 'Inputan simpan pada variable nilai', 10, '2022-06-13 19:49:59', '2022-06-13 19:49:59'),
(84, 16, 'Buat percabangan bertingkat dengan kondisi pertama yaitu nilai <= 60', 16, '2022-06-13 19:50:24', '2022-06-13 19:50:24'),
(85, 16, 'Jika benar, maka menghasilkan pernyataan berupa output \"Predikat C\"', 16, '2022-06-13 19:50:45', '2022-06-13 19:50:45'),
(86, 16, 'Kondisi kedua yaitu nilai >= 61 dan nilai <= 80', 16, '2022-06-13 19:51:05', '2022-06-13 19:51:05'),
(87, 16, 'Jika benar, maka menghasilkan pernyataan berupa output \"Predikat B\"', 16, '2022-06-13 19:51:19', '2022-06-13 19:51:19'),
(88, 16, 'Jika semua kondisi salah, maka menghasilkan pernyataan berupa output \"Predikat A\"', 16, '2022-06-13 19:51:30', '2022-06-13 19:51:30'),
(89, 17, 'Deklarasikan variable nilai (int)', 10, '2022-06-13 19:52:10', '2022-06-13 19:52:10'),
(90, 17, 'Inputan simpan pada variable nilai', 10, '2022-06-13 19:52:20', '2022-06-13 19:52:20'),
(91, 17, 'Buat percabangan bersarang dengan kondisi nilai > 75, maka menghasilkan pernyataan berupa output \"Lulus“', 25, '2022-06-13 19:52:39', '2022-06-13 19:52:39'),
(92, 17, 'Kondisi bersarang adalah nilai >= 95 maka menghasilkan pernyataan berupa output \"Sangat baik”', 30, '2022-06-13 19:53:01', '2022-06-13 19:53:26'),
(93, 17, 'Jika tidak maka menghasilkan pernyataan berupa output \"Tidak Lulus\"', 25, '2022-06-13 19:53:45', '2022-06-13 19:53:45'),
(94, 19, 'Deklarasikan variable bilangan (int)', 15, '2022-06-13 19:54:14', '2022-06-13 19:54:14'),
(95, 19, 'Inputan simpan pada variable bilangan', 15, '2022-06-13 19:54:28', '2022-06-13 19:54:28'),
(96, 19, 'Buat percabangan dengan kondisi bilangan > 0', 25, '2022-06-13 19:54:45', '2022-06-13 19:54:45'),
(97, 19, 'Jika benar, maka menghasilkan pernyataan berupa output \"Bilangan bulat positif\"', 20, '2022-06-13 19:55:09', '2022-06-13 19:55:09'),
(98, 19, 'Jika salah, maka menghasilkan pernyataan berupa output \"Bilangan bulat negatif\"', 25, '2022-06-13 19:55:25', '2022-06-13 19:55:25'),
(99, 20, 'Deklarasikan variable password (int)', 15, '2022-06-13 19:56:00', '2022-06-13 19:56:00'),
(100, 20, 'Inputan simpan pada variable password', 15, '2022-06-13 19:56:13', '2022-06-13 19:56:13'),
(101, 20, 'Buat percabangan sederhana dengan kondisi password == 123', 25, '2022-06-13 19:56:27', '2022-06-13 19:56:27'),
(102, 20, 'Jika nilai inputan 123 maka menghasilkan pernyataan berupa output “Password Benar“', 20, '2022-06-13 19:56:50', '2022-06-13 19:56:50'),
(103, 20, 'Jika tidak maka menghasilkan pernyataan berupa output “Password Salah”', 25, '2022-06-13 19:57:02', '2022-06-13 19:57:02'),
(104, 21, 'Deklarasi variable i (int)', 10, '2022-06-13 19:58:56', '2022-06-13 19:58:56'),
(105, 21, 'Deklarasi variable n (int)', 10, '2022-06-13 19:59:06', '2022-06-13 19:59:06'),
(106, 21, 'Inisialisasi variable i = 1', 10, '2022-06-13 19:59:21', '2022-06-13 19:59:21'),
(107, 21, 'Inisialisasi variable n = 10', 10, '2022-06-13 19:59:32', '2022-06-13 19:59:32'),
(108, 21, 'Lakukan perulangan (for) untuk memunculkan output “Hello World 1” menaik hingga “Hello World 10”', 60, '2022-06-13 19:59:53', '2022-06-13 19:59:53'),
(109, 22, 'Deklarasi variable i (int)', 10, '2022-06-13 20:00:23', '2022-06-13 20:00:23'),
(110, 22, 'Deklarasi variable n (int)', 10, '2022-06-13 20:00:33', '2022-06-13 20:00:33'),
(111, 22, 'Inisialisasi variable i = 10', 10, '2022-06-13 20:01:10', '2022-06-14 01:12:21'),
(112, 22, 'Inisialisasi variable n = 1', 10, '2022-06-13 20:01:23', '2022-06-14 01:12:33'),
(113, 22, 'Lakukan perulangan (for) untuk memunculkan output “Hello World 10” menurun hingga “Hello world 1”', 60, '2022-06-13 20:01:37', '2022-06-13 20:01:37'),
(114, 23, 'Deklarasi variable nilai (int)', 10, '2022-06-13 20:02:07', '2022-06-13 20:02:07'),
(115, 23, 'Deklarasi variable a (int)', 10, '2022-06-13 20:02:14', '2022-06-13 20:02:14'),
(116, 23, 'Deklarasi variable b (int)', 10, '2022-06-13 20:02:27', '2022-06-13 20:02:27'),
(117, 23, 'Inisialisasi variable nilai = 5', 10, '2022-06-13 20:02:49', '2022-06-13 20:02:49'),
(118, 23, 'Lakukan perulangan bersarang (for) untuk memunculkan output berupa segitiga angka. (a dan b inisialisasi dengan angka 1 pada saat penulisan for)', 60, '2022-06-13 20:03:17', '2022-06-13 20:03:17'),
(119, 24, 'Deklarasi variable i (int)', 10, '2022-06-13 20:04:42', '2022-06-13 20:04:42'),
(120, 24, 'Inisialisasi variable i = 1', 10, '2022-06-13 20:04:59', '2022-06-13 20:04:59'),
(121, 24, 'Lakukan perulangan sederhana (for) untuk menampilkan angka 1 hingga 10', 80, '2022-06-13 20:05:21', '2022-06-13 20:05:21'),
(122, 25, 'Deklarasi variable tinggi (int)', 10, '2022-06-13 20:06:21', '2022-06-13 20:06:21'),
(123, 25, 'Deklarasi variable i (int)', 10, '2022-06-13 20:06:30', '2022-06-13 20:06:30'),
(124, 25, 'Deklarasi variable j (int)', 10, '2022-06-13 20:06:41', '2022-06-13 20:06:41'),
(125, 25, 'Inisialisasi variable tinggi = 5', 10, '2022-06-13 20:07:07', '2022-06-13 20:07:07'),
(126, 25, 'Lakukan perulangan bersarang (for) untuk memunculkan output berupa segitiga dengan karakter bintang. (i dan j inisialisasi dengan angka 1 pada saat penulisan for)', 60, '2022-06-13 20:07:21', '2022-06-13 20:07:21');

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
  `subject` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`subject`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `competencies`
--

INSERT INTO `competencies` (`id`, `title`, `name`, `slug`, `description`, `subject`, `created_at`, `updated_at`) VALUES
(1, 'KD 4.4', 'Kompetensi Dasar 4.4', 'kompetensi-dasar-4.4', 'Membuat kode program dengan tipe data, variabel, konstanta, operator dan ekspresi.', '[\"Tipe Data\",\"Variabel\",\"Konstanta\",\"Operator\",\"Ekspresi\"]', '2022-06-08 00:43:37', '2022-06-13 18:09:25'),
(2, 'KD 4.5', 'Kompetensi Dasar 4.5', 'kompetensi-dasar-4.5', 'Membuat kode program dengan operasi aritmatika dan logika.', '[\"Operasi Aritmatika\",\"Operasi Logika\"]', '2022-06-08 00:43:37', '2022-06-13 18:09:25'),
(3, 'KD 4.6', 'Kompetensi Dasar 4.6', 'kompetensi-dasar-4.6', 'Membuat kode program struktur kontrol percabangan.', '[\"Percabangan\"]', '2022-06-08 00:43:37', '2022-06-13 18:09:25'),
(4, 'KD 4.7', 'Kompetensi Dasar 4.7', 'kompetensi-dasar-4.7', 'Membuat kode program struktur kontrol perulangan.', '[\"Perulangan\"]', '2022-06-08 00:43:37', '2022-06-13 18:09:25');

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
(14, 12, 'cout<<\"Nama : \" << nama;\ncout<<endl;\ncout<<\"Umur : \" << umur;\ncout<<endl;\ncout<<\"Jenis Kelamin : \" << jenis_kelamin;', '2022-06-08 02:11:09', '2022-06-08 02:11:09'),
(15, 12, 'cout<<\"Nama : \" << nama;\ncout<<\"Umur : \" << umur;\ncout<<\"Jenis Kelamin : \" << jenis_kelamin;', '2022-06-08 02:11:25', '2022-06-08 02:11:25'),
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
(47, 33, 'cout<<x;\r\ncout<<endl;\r\ncout<<y;\r\ncout<<endl;\r\ncout<<z;', '2022-06-08 02:20:06', '2022-06-08 02:20:06'),
(50, 35, 'int harga;', '2022-06-14 00:42:45', '2022-06-14 00:42:45'),
(51, 36, 'double ppn;', '2022-06-14 00:43:03', '2022-06-14 00:43:03'),
(52, 37, 'int pajak;', '2022-06-14 00:43:15', '2022-06-14 00:43:15'),
(53, 38, 'harga = 40000;', '2022-06-14 00:43:26', '2022-06-14 00:43:26'),
(54, 39, 'ppn = 0.1;', '2022-06-14 00:43:41', '2022-06-14 00:43:41'),
(55, 40, 'pajak = harga * ppn;', '2022-06-14 00:44:00', '2022-06-14 00:44:00'),
(56, 41, 'cout<<\"harga = \" << harga;', '2022-06-14 00:46:50', '2022-06-14 00:46:50'),
(57, 41, 'cout<<\"harga = \" << harga;\r\ncout<<endl;', '2022-06-14 00:46:58', '2022-06-14 00:46:58'),
(58, 42, 'cout<<\"ppn = \" << ppn;', '2022-06-14 00:47:17', '2022-06-14 00:47:17'),
(59, 42, 'cout<<endl;\r\ncout<<\"ppn = \" << ppn;', '2022-06-14 00:47:26', '2022-06-14 00:47:26'),
(60, 42, 'cout<<\"ppn = \" << ppn;\r\ncout<<endl;', '2022-06-14 00:47:35', '2022-06-14 00:47:35'),
(61, 43, 'cout<<\"pajak yang dibayarkan = \" << pajak;', '2022-06-14 00:47:50', '2022-06-14 00:47:50'),
(62, 43, 'cout<<endl;\r\ncout<<\"pajak yang dibayarkan = \" << pajak;', '2022-06-14 00:47:57', '2022-06-14 00:47:57'),
(63, 44, 'int alas;', '2022-06-14 00:50:28', '2022-06-14 00:50:28'),
(64, 45, 'int tinggi;', '2022-06-14 00:50:39', '2022-06-14 00:50:39'),
(65, 46, 'double luas;', '2022-06-14 00:50:51', '2022-06-14 00:50:51'),
(66, 47, 'alas = 7;', '2022-06-14 00:51:02', '2022-06-14 00:51:02'),
(67, 48, 'tinggi = 10;', '2022-06-14 00:51:13', '2022-06-14 00:51:13'),
(68, 49, 'luas = 0.5 * alas * tinggi;', '2022-06-14 00:51:29', '2022-06-14 00:51:29'),
(69, 50, 'cout<<\"alas = \" << alas;', '2022-06-14 00:51:44', '2022-06-14 00:51:44'),
(70, 50, 'cout<<\"alas = \" << alas;\r\ncout<<endl;', '2022-06-14 00:51:52', '2022-06-14 00:51:52'),
(71, 51, 'cout<<\"tinggi = \" << tinggi;', '2022-06-14 00:52:06', '2022-06-14 00:52:06'),
(72, 51, 'cout<<endl;\r\ncout<<\"tinggi = \" << tinggi;', '2022-06-14 00:52:19', '2022-06-14 00:52:19'),
(73, 51, 'cout<<\"tinggi = \" << tinggi;\r\ncout<<endl;', '2022-06-14 00:52:28', '2022-06-14 00:52:28'),
(74, 52, 'cout<<\"luas segitiga = \" << luas;', '2022-06-14 00:52:43', '2022-06-14 00:52:43'),
(75, 52, 'cout<<endl;\r\ncout<<\"luas segitiga = \" << luas;', '2022-06-14 00:52:51', '2022-06-14 00:52:51'),
(76, 53, 'float celcius;', '2022-06-14 00:53:18', '2022-06-14 00:53:18'),
(77, 54, 'float farenheit;', '2022-06-14 00:53:30', '2022-06-14 00:53:30'),
(78, 55, 'celcius = 70;', '2022-06-14 00:53:49', '2022-06-14 00:53:49'),
(79, 56, 'farenheit = (celcius * 9 / 5) + 32;', '2022-06-14 00:54:07', '2022-06-14 00:54:07'),
(80, 57, 'cout<<\"celcius = \" << celcius;', '2022-06-14 00:54:19', '2022-06-14 00:54:19'),
(81, 57, 'cout<<\"celcius = \" << celcius;\r\ncout<<endl;', '2022-06-14 00:54:27', '2022-06-14 00:54:27'),
(82, 58, 'cout<<\"konversi celcius ke farenheit = \" << farenheit;', '2022-06-14 00:54:47', '2022-06-14 00:54:47'),
(83, 58, 'cout<<endl;\r\ncout<<\"konversi celcius ke farenheit = \" << farenheit;', '2022-06-14 00:54:57', '2022-06-14 00:54:57'),
(84, 59, 'bool a;', '2022-06-14 00:55:48', '2022-06-14 00:55:48'),
(85, 60, 'bool b;', '2022-06-14 00:56:05', '2022-06-14 00:56:05'),
(86, 61, 'bool hasil_a;', '2022-06-14 00:56:19', '2022-06-14 00:56:19'),
(87, 62, 'bool hasil_b;', '2022-06-14 00:56:31', '2022-06-14 00:56:31'),
(88, 63, 'a = true;', '2022-06-14 00:56:42', '2022-06-14 00:56:42'),
(89, 64, 'b = false;', '2022-06-14 00:56:53', '2022-06-14 00:56:53'),
(90, 65, 'hasil_a = a && a;', '2022-06-14 00:57:07', '2022-06-14 00:57:07'),
(91, 66, 'hasil_b = a && b;', '2022-06-14 00:57:19', '2022-06-14 00:57:19'),
(92, 67, 'cout<<\"Hasil dari a && a adalah \" << hasil_a;', '2022-06-14 00:57:38', '2022-06-14 00:57:38'),
(93, 67, 'cout<<\"Hasil dari a && a adalah \" << hasil_a;\r\ncout<<endl;', '2022-06-14 00:57:45', '2022-06-14 00:57:45'),
(94, 68, 'cout<<\"Hasil dari a && b adalah \" << hasil_b;', '2022-06-14 00:57:56', '2022-06-14 00:57:56'),
(95, 68, 'cout<<endl;\r\ncout<<\"Hasil dari a && b adalah \" << hasil_b;', '2022-06-14 00:58:03', '2022-06-14 00:58:03'),
(96, 69, 'int a;', '2022-06-14 00:58:37', '2022-06-14 00:58:37'),
(97, 70, 'int b;', '2022-06-14 00:58:47', '2022-06-14 00:58:47'),
(98, 71, 'a = 5;', '2022-06-14 00:58:57', '2022-06-14 00:58:57'),
(99, 72, 'b = 6;', '2022-06-14 00:59:07', '2022-06-14 00:59:07'),
(100, 73, 'a++;', '2022-06-14 00:59:18', '2022-06-14 00:59:18'),
(101, 74, 'b--;', '2022-06-14 00:59:29', '2022-06-14 00:59:29'),
(102, 75, 'cout<<\"a++ adalah \" << a;', '2022-06-14 00:59:45', '2022-06-14 00:59:45'),
(103, 75, 'cout<<\"a++ adalah \" << a;\r\ncout<<endl;', '2022-06-14 00:59:52', '2022-06-14 00:59:52'),
(104, 76, 'cout<<\"b-- adalah \" << b;', '2022-06-14 01:00:02', '2022-06-14 01:00:02'),
(105, 76, 'cout<<endl;\r\ncout<<\"b-- adalah \" << b;', '2022-06-14 01:00:08', '2022-06-14 01:00:08'),
(106, 77, 'int a;', '2022-06-14 01:00:43', '2022-06-14 01:00:43'),
(107, 78, 'cin>>a;', '2022-06-14 01:00:54', '2022-06-14 01:00:54'),
(108, 79, 'if (a % 2 == 0)', '2022-06-14 01:01:12', '2022-06-14 01:01:12'),
(109, 80, '{\r\n	cout<<\"bilangan genap\";\r\n}', '2022-06-14 01:01:31', '2022-06-14 01:01:31'),
(110, 81, 'else\r\n{\r\n    cout<<\"bilangan ganjil\";\r\n}', '2022-06-14 01:01:56', '2022-06-14 01:01:56'),
(111, 82, 'int nilai;', '2022-06-14 01:02:23', '2022-06-14 01:02:23'),
(112, 83, 'cin>>nilai;', '2022-06-14 01:02:37', '2022-06-14 01:02:37'),
(113, 84, 'if (nilai <= 60)', '2022-06-14 01:03:02', '2022-06-14 01:03:02'),
(114, 85, '{\r\n    cout<<\"Predikat C\";\r\n}', '2022-06-14 01:03:17', '2022-06-14 01:03:17'),
(115, 86, 'else if (nilai >= 61 && nilai <= 80)', '2022-06-14 01:03:31', '2022-06-14 01:03:31'),
(116, 87, '{\r\n    cout<<\"Predikat B\";\r\n}', '2022-06-14 01:03:47', '2022-06-14 01:03:47'),
(117, 88, 'else\r\n{\r\n    cout<<\"Predikat A\";\r\n}', '2022-06-14 01:04:01', '2022-06-14 01:04:01'),
(118, 89, 'int nilai;', '2022-06-14 01:04:24', '2022-06-14 01:04:24'),
(119, 90, 'cin>>nilai;', '2022-06-14 01:04:48', '2022-06-14 01:04:48'),
(120, 91, 'if (nilai>75)\r\n{\r\n    cout<<\"Lulus\";', '2022-06-14 01:05:31', '2022-06-14 01:05:31'),
(121, 91, 'if (nilai>75)\r\n{\r\n    cout<<\"Lulus\";\r\n    cout<<endl;', '2022-06-14 01:05:43', '2022-06-14 01:05:43'),
(122, 92, 'if (nilai >= 95)\r\n    {\r\n        cout<<\"Sangat baik\";\r\n    }\r\n}', '2022-06-14 01:06:26', '2022-06-14 01:06:26'),
(123, 92, 'if (nilai >= 95)\r\n    {\r\n        cout<<endl;\r\n        cout<<\"Sangat baik\";\r\n    }\r\n}', '2022-06-14 01:06:42', '2022-06-14 01:06:42'),
(124, 93, 'else\r\n{\r\n    cout<<\"Tidak Lulus\";\r\n}', '2022-06-14 01:07:05', '2022-06-14 01:07:05'),
(125, 94, 'int bilangan;', '2022-06-14 01:07:28', '2022-06-14 01:07:28'),
(126, 95, 'cin>>bilangan;', '2022-06-14 01:07:39', '2022-06-14 01:07:39'),
(127, 96, 'if (bilangan > 0)', '2022-06-14 01:07:53', '2022-06-14 01:07:53'),
(128, 97, '{\r\n    cout<<\"Bilangan bulat positif\";\r\n}', '2022-06-14 01:08:05', '2022-06-14 01:08:05'),
(129, 98, 'else\r\n{\r\n    cout<<\"Bilangan bulat negatif\";\r\n}', '2022-06-14 01:08:17', '2022-06-14 01:08:17'),
(130, 99, 'int password;', '2022-06-14 01:08:36', '2022-06-14 01:08:36'),
(131, 100, 'cin>>password;', '2022-06-14 01:08:45', '2022-06-14 01:08:45'),
(132, 101, 'if (password == 123)', '2022-06-14 01:08:58', '2022-06-14 01:08:58'),
(133, 102, '{\r\n    cout<<\"Password Benar\";\r\n}', '2022-06-14 01:09:08', '2022-06-14 01:09:08'),
(134, 103, 'else\r\n{\r\n    cout<<\"Password Salah\";\r\n}', '2022-06-14 01:09:27', '2022-06-14 01:09:27'),
(135, 104, 'int i;', '2022-06-14 01:10:02', '2022-06-14 01:10:02'),
(136, 105, 'int n;', '2022-06-14 01:10:12', '2022-06-14 01:10:12'),
(137, 106, 'i = 1;', '2022-06-14 01:10:22', '2022-06-14 01:10:22'),
(138, 107, 'n = 10;', '2022-06-14 01:10:34', '2022-06-14 01:10:34'),
(139, 108, 'for (i; i <= n; i++)\r\n{\r\n    cout<<\"Hello World \" << i;\r\n    cout<<endl;\r\n}', '2022-06-14 01:10:57', '2022-06-14 01:10:57'),
(140, 109, 'int i;', '2022-06-14 01:12:52', '2022-06-14 01:12:52'),
(141, 110, 'int n;', '2022-06-14 01:13:06', '2022-06-14 01:13:06'),
(142, 111, 'i = 10;', '2022-06-14 01:13:16', '2022-06-14 01:13:16'),
(143, 112, 'n = 1;', '2022-06-14 01:13:26', '2022-06-14 01:13:26'),
(144, 113, 'for (i; i >= n; i--)\r\n{\r\n    cout<<\"Hello World \" << i;\r\n    cout<<endl;\r\n}', '2022-06-14 01:13:48', '2022-06-14 01:13:48'),
(145, 114, 'int nilai;', '2022-06-14 01:14:07', '2022-06-14 01:14:07'),
(146, 115, 'int a;', '2022-06-14 01:14:19', '2022-06-14 01:14:19'),
(147, 116, 'int b;', '2022-06-14 01:14:29', '2022-06-14 01:14:29'),
(148, 117, 'nilai = 5;', '2022-06-14 01:14:38', '2022-06-14 01:14:38'),
(149, 118, 'for (a = 1; a <= nilai; a++)\n{\n    for (b = 1; b <= a; b++)\n    {\n        cout<<b;\n    }\n    cout<<endl;\n}', '2022-06-14 01:15:01', '2022-06-14 01:15:47'),
(150, 118, 'for (a = 1; a <= nilai; a++)\r\n{\r\n    for (b = 1; b <= a; b++)\r\n    {\r\n        cout<<b << \" \";\r\n    }\r\n    cout<<endl;\r\n}', '2022-06-14 01:15:38', '2022-06-14 01:15:38'),
(151, 118, 'for (a = 1; a <= nilai; a++)\r\n{\r\n    for (b = 1; b <= a; b++)\r\n    {\r\n        cout<<b;\r\n        cout<<\" \";\r\n    }\r\n    cout<<endl;\r\n}', '2022-06-14 01:16:00', '2022-06-14 01:16:00'),
(152, 119, 'int i;', '2022-06-14 01:16:20', '2022-06-14 01:16:20'),
(153, 120, 'i = 1;', '2022-06-14 01:16:29', '2022-06-14 01:16:29'),
(154, 121, 'for (i; i <= 10; i++)\r\n{\r\n    cout<<i;\r\n}', '2022-06-14 01:16:53', '2022-06-14 01:16:53'),
(155, 122, 'int tinggi;', '2022-06-14 01:17:15', '2022-06-14 01:17:15'),
(156, 123, 'int i;', '2022-06-14 01:17:27', '2022-06-14 01:17:27'),
(157, 124, 'int j;', '2022-06-14 01:17:37', '2022-06-14 01:17:37'),
(158, 125, 'tinggi = 5;', '2022-06-14 01:17:47', '2022-06-14 01:17:47'),
(159, 126, 'for (i = 1; i <= tinggi; i++)\r\n{\r\n    for (j = 1; j <= i; j++)\r\n    {\r\n        cout<<\"*\";\r\n    }\r\n    cout << endl;\r\n}', '2022-06-14 01:18:16', '2022-06-14 01:18:16'),
(160, 126, 'for (i = 1; i <= tinggi; i++)\r\n{\r\n    for (j = 1; j <= i; j++)\r\n    {\r\n        cout<<\"*\" << \" \";\r\n    }\r\n    cout << endl;\r\n}', '2022-06-14 01:18:37', '2022-06-14 01:18:37'),
(161, 126, 'for (i = 1; i <= tinggi; i++)\r\n{\r\n    for (j = 1; j <= i; j++)\r\n    {\r\n        cout<<\"* \";\r\n    }\r\n    cout << endl;\r\n}', '2022-06-14 01:18:47', '2022-06-14 01:18:47'),
(162, 126, 'for (i = 1; i <= tinggi; i++)\r\n{\r\n    for (j = 1; j <= i; j++)\r\n    {\r\n        cout<<\"*\";\r\n        cout<<\" \";\r\n    }\r\n    cout << endl;\r\n}', '2022-06-14 01:18:57', '2022-06-14 01:18:57');

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
(18, '2022_06_08_001539_add_timeup_to_result_details', 1),
(19, '2022_06_11_234823_add_input_to_questions', 2),
(20, '2022_06_13_092832_add_success_to_result_details', 3),
(21, '2022_06_14_010341_add_subject_to_competencies', 4);

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
(1, 3, 1, 'unlock', '2022-06-08 00:43:37', '2022-06-14 01:31:46'),
(2, 3, 2, 'lock', '2022-06-08 00:43:37', '2022-06-14 01:35:37'),
(3, 3, 3, 'lock', '2022-06-08 00:43:37', '2022-06-14 01:40:33'),
(4, 3, 4, 'lock', '2022-06-08 00:43:37', '2022-06-14 01:56:55');

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
  `input` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `questions`
--

INSERT INTO `questions` (`id`, `competency_id`, `description`, `image`, `duration`, `input`, `created_at`, `updated_at`) VALUES
(1, 1, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>a (int)</li>\r\n		<li>b (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut :\r\n	<ul>\r\n		<li>a = 20</li>\r\n		<li>b = 10</li>\r\n	</ul>\r\n	</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable a dan b tersebut pada output.</li>\r\n</ul>', '[\"53015523.png\"]', 20, 0, '2022-06-08 00:49:17', '2022-06-13 19:09:17'),
(2, 1, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>nama (string)</li>\r\n		<li>umur (int)</li>\r\n		<li>jenis_kelamin (char)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable tersebut sebagai berikut :\r\n	<ul>\r\n		<li>nama = Lusi Anita</li>\r\n		<li>umur = 18</li>\r\n		<li>jenis_kelamin = P</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Tampilkan hasil dari ke-3 variabel tersebut pada output.</li>\r\n</ul>', '[\"1001910577.png\"]', 20, 0, '2022-06-08 00:53:36', '2022-06-13 19:13:26'),
(3, 1, '<ul>\r\n	<li>Deklarasikan konstanta dan inisialisasikan sebagai berikut :\r\n	<ul>\r\n		<li>panjang = 5 (int)</li>\r\n		<li>lebar = 6 (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Deklarasikan variable baru yaitu hasil (int).</li>\r\n	<li>Lakukan inisialisasi pada variable baru dengan perhitungan luas persegi panjang dengan rumus panjang x lebar.</li>\r\n	<li>Tampilkan hasil inisialisasi dari konstanta&nbsp;panjang dan lebar.</li>\r\n	<li>Tampilkan hasil perhitungan luas persegi panjang.</li>\r\n</ul>', '[\"1435819014.png\"]', 20, 0, '2022-06-08 00:57:28', '2022-06-13 19:13:37'),
(4, 1, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>panjang (int)</li>\r\n		<li>lebar (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable tersebut sebagai berikut :\r\n	<ul>\r\n		<li>panjang = 5</li>\r\n		<li>lebar = 6</li>\r\n	</ul>\r\n	</li>\r\n	<li>Deklarasikan variable baru yaitu hasil (int).</li>\r\n	<li>Lakukan inisialisasi pada variable baru dengan perhitungan luas persegi panjang dengan rumus panjang x lebar.</li>\r\n	<li>Tampilkan hasil inisialisasi dari variabel panjang dan lebar.</li>\r\n	<li>Tampilkan hasil perhitungan luas persegi panjang.</li>\r\n</ul>', '[\"1773180679.png\"]', 20, 0, '2022-06-08 01:01:48', '2022-06-13 19:13:51'),
(5, 1, '<ul>\r\n	<li>Deklarasikan variable baru&nbsp;:\r\n	<ul>\r\n		<li>x (int)</li>\r\n		<li>y (int)</li>\r\n		<li>z (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable tersebut sebagai berikut :\r\n	<ul>\r\n		<li>x = 10</li>\r\n		<li>y =&nbsp; x + 10</li>\r\n		<li>z = y + y</li>\r\n	</ul>\r\n	</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable x, y dan z pada output.</li>\r\n</ul>', '[\"943149557.png\"]', 20, 0, '2022-06-08 01:03:53', '2022-06-13 19:13:59'),
(10, 2, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>harga (int)</li>\r\n		<li>ppn (double)</li>\r\n		<li>pajak (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut :\r\n	<ul>\r\n		<li>harga = 40000</li>\r\n		<li>ppn = 0.1</li>\r\n		<li>pajak = harga x ppn</li>\r\n	</ul>\r\n	</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable harga.</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable ppn.</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable pajak.</li>\r\n</ul>', '[\"1311774788.png\"]', 20, 0, '2022-06-12 20:22:51', '2022-06-12 20:24:01'),
(11, 2, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>alas (int)</li>\r\n		<li>tinggi (int)</li>\r\n		<li>luas (double)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut :\r\n	<ul>\r\n		<li>alas = 7</li>\r\n		<li>tinggi = 10</li>\r\n		<li>luas = 0.5 x alas x tinggi</li>\r\n	</ul>\r\n	</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable alas.</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable tinggi.</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable luas.</li>\r\n</ul>', '[\"1164503905.png\"]', 20, 0, '2022-06-12 20:26:34', '2022-06-12 20:26:34'),
(12, 2, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>celcius (float)</li>\r\n		<li>farenheit (float)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut :\r\n	<ul>\r\n		<li>celcius =70</li>\r\n		<li>farenheit = (celcius x 9 / 5) + 32</li>\r\n	</ul>\r\n	</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable celcius.</li>\r\n	<li>Tampilkan hasil inisialisasi dari variable farenheit.</li>\r\n</ul>', '[\"514815101.png\"]', 20, 0, '2022-06-12 20:33:18', '2022-06-12 20:33:18'),
(13, 2, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>a (boolean)</li>\r\n		<li>b (boolean)</li>\r\n		<li>hasil_a (boolean)</li>\r\n		<li>hasil_b (boolean)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut:\r\n	<ul>\r\n		<li>a&nbsp;= true</li>\r\n		<li>b = false</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan operasi logika a AND a pada variable hasil_a.</li>\r\n	<li>Lakukan operasi logika a AND b pada variable hasil_b.</li>\r\n	<li>Tampilkan hasil operasi operator logika a AND a.</li>\r\n	<li>Tampilkan hasil operasi operator logika a AND b.</li>\r\n</ul>', '[\"1288258219.png\"]', 20, 0, '2022-06-12 20:41:15', '2022-06-12 20:45:57'),
(14, 2, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>a (int)</li>\r\n		<li>b (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut :\r\n	<ul>\r\n		<li>a = 5</li>\r\n		<li>b = 6</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan operasi post increment pada variable a.</li>\r\n	<li>Lakukan operasi post decrement pada variable&nbsp;b.</li>\r\n	<li>Tampilkan hasil operasi post increment variable a.</li>\r\n	<li>Tampilkan hasil operasi post decrement variable b.</li>\r\n</ul>', '[\"180618624.png\"]', 20, 0, '2022-06-12 20:45:12', '2022-06-12 20:45:12'),
(15, 3, '<p>Buatlah program percabangan sederhana 1 kondisi dengan ketentuan sebagai berikut :</p>\r\n\r\n<ul>\r\n	<li>Deklarasikan variable a (int).</li>\r\n	<li>Inputan simpan pada variable a.</li>\r\n	<li>Buatlah percabangan dengan kondisi nilai a habis dibagi 2.</li>\r\n	<li>Jika benar, maka&nbsp;menghasilkan pernyataan berupa output &ldquo;bilangan genap&rdquo;.</li>\r\n	<li>Jika salah, maka menghasilkan pernyataan berupa output &ldquo;bilangan ganjil&rdquo;.</li>\r\n</ul>', '[\"1744196579.png\"]', 20, 1, '2022-06-12 20:55:03', '2022-06-12 21:16:09'),
(16, 3, '<p>Buatlah program percabangan bertingkat dengan 2 kondisi untuk menentukan predikat nilai dengan ketentuan sebagai berikut :</p>\r\n\r\n<ul>\r\n	<li>Deklarasikan variable nilai (int).</li>\r\n	<li>Inputan simpan pada variable nilai.</li>\r\n	<li>Buatlah percabangan bertingkat dengan kondisi pertama yaitu nilai &lt;= 60.</li>\r\n	<li>Jika benar, maka menghasilkan pernyataan berupa output &quot;Predikat C&quot;.</li>\r\n	<li>Kondisi kedua&nbsp;yaitu nilai &gt;= 61 dan nilai &lt;= 80.</li>\r\n	<li>Jika benar, maka menghasilkan pernyataan berupa output &quot;Predikat B&quot;.</li>\r\n	<li>Jika semua kondisi salah, maka menghasilkan pernyataan berupa output &quot;Predikat A&quot;.</li>\r\n</ul>', '[\"92446547.png\"]', 20, 1, '2022-06-12 21:04:44', '2022-06-12 21:16:00'),
(17, 3, '<p>Buatlah program percabangan bersarang untuk menentukan predikat kelulusan dengan ketentuan sebagai berikut :</p>\r\n\r\n<ul>\r\n	<li>Deklarasikan variable nilai (int).</li>\r\n	<li>Inputan&nbsp;simpan pada variable nilai.</li>\r\n	<li>Buatlah percabangan bersarang dengan kondisi nilai &gt; 75, maka menghasilkan pernyataan berupa output &quot;Lulus&ldquo;.\r\n	<ul>\r\n		<li>kondisi bersarangnya adalah nilai &gt;= 95 maka menghasilkan pernyataan berupa output &quot;Sangat baik&rdquo; (30 point)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Jika tidak maka menghasilkan pernyataan berupa output &quot;Tidak Lulus&quot;.</li>\r\n</ul>', '[\"152079067.png\"]', 20, 1, '2022-06-12 21:15:01', '2022-06-12 21:17:23'),
(19, 3, '<p>Buatlah program percabangan sederhana 1 kondisi untuk menentukan bilangan positif atau negatif dengan ketentuan sebagai berikut :</p>\r\n\r\n<ul>\r\n	<li>Deklarasikan variable bilangan (int).</li>\r\n	<li>Inputan simpan pada variable bilangan.</li>\r\n	<li>Buatlah percabangan dengan kondisi bilangan &gt; 0.</li>\r\n	<li>Jika benar, maka menghasilkan pernyataan berupa output &quot;Bilangan bulat positif&quot;.</li>\r\n	<li>Jika salah,&nbsp;maka menghasilkan pernyataan berupa output &quot;Bilangan bulat negatif&quot;.</li>\r\n</ul>', '[\"1504804430.png\"]', 20, 1, '2022-06-12 21:21:34', '2022-06-12 21:21:34'),
(20, 3, '<p>Buatlah program percabangan sederhana 1 kondisi dengan ketentuan sebagai berikut :</p>\r\n\r\n<ul>\r\n	<li>Deklarasikan variable password (int).</li>\r\n	<li>Inputan simpan pada variable password.</li>\r\n	<li>Buatlah percabangan sederhana dengan kondisi password == 123.</li>\r\n	<li>Jika nilai inputan 123 maka menghasilkan pernyataan berupa output &ldquo;Password Benar&ldquo;.</li>\r\n	<li>Jika tidak maka menghasilkan pernyataan berupa output &ldquo;Password Salah&rdquo;.</li>\r\n</ul>', '[\"1662729933.png\"]', 20, 1, '2022-06-12 21:26:47', '2022-06-12 21:26:47'),
(21, 4, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>i (int)</li>\r\n		<li>n (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut :\r\n	<ul>\r\n		<li>i = 1</li>\r\n		<li>n = 10</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan perulangan (for) untuk memunculkan output &ldquo;Hello World 1&rdquo; <strong>menaik</strong> hingga &ldquo;Hello World 10&rdquo;.</li>\r\n</ul>', '[\"1685011114.png\"]', 20, 0, '2022-06-12 21:31:25', '2022-06-12 21:31:25'),
(22, 4, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>i (int)</li>\r\n		<li>n (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut :\r\n	<ul>\r\n		<li>i = 10</li>\r\n		<li>n = 1</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan perulangan (for) untuk memunculkan output &ldquo;Hello World 10&rdquo; <strong>menurun</strong> hingga &ldquo;Hello world 1&rdquo;.</li>\r\n</ul>', '[\"1018782757.png\"]', 20, 0, '2022-06-12 21:34:52', '2022-06-13 23:13:35'),
(23, 4, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>nilai (int)</li>\r\n		<li>a (int)</li>\r\n		<li>b (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut :\r\n	<ul>\r\n		<li>nilai = 5</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan perulangan bersarang (for) untuk memunculkan output berupa segitiga angka. (a dan b inisialisasi dengan angka 1 pada saat penulisan for)</li>\r\n</ul>', '[\"602824993.png\"]', 20, 0, '2022-06-12 21:48:37', '2022-06-12 21:56:02'),
(24, 4, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>i (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut :\r\n	<ul>\r\n		<li>i = 1</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan perulangan sederhana (for) untuk menampilkan angka 1 hingga 10.</li>\r\n</ul>', '[\"712885981.png\"]', 20, 0, '2022-06-12 21:51:59', '2022-06-12 21:51:59'),
(25, 4, '<ul>\r\n	<li>Deklarasikan variable baru sebagai berikut :\r\n	<ul>\r\n		<li>tinggi (int)</li>\r\n		<li>i (int)</li>\r\n		<li>j (int)</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan inisialisasi pada variable sebagai berikut :\r\n	<ul>\r\n		<li>tinggi = 5</li>\r\n	</ul>\r\n	</li>\r\n	<li>Lakukan perulangan bersarang (for) untuk memunculkan output berupa segitiga dengan karakter bintang. (i dan j inisialisasi dengan angka 1 pada saat penulisan for)</li>\r\n</ul>', '[\"859474169.png\"]', 20, 0, '2022-06-12 21:55:37', '2022-06-12 21:55:37');

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
  `is_success` tinyint(1) NOT NULL DEFAULT 0,
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
