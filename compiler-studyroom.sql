-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: cppiqbal2
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint unsigned NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_question_id_foreign` (`question_id`),
  CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clas`
--

DROP TABLE IF EXISTS `clas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `season` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clas`
--

LOCK TABLES `clas` WRITE;
/*!40000 ALTER TABLE `clas` DISABLE KEYS */;
INSERT INTO `clas` VALUES (1,'X RPL 1','2024/2025','2025-04-15 13:51:30','2025-04-15 13:51:30');
/*!40000 ALTER TABLE `clas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competencies`
--

DROP TABLE IF EXISTS `competencies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `competencies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competencies`
--

LOCK TABLES `competencies` WRITE;
/*!40000 ALTER TABLE `competencies` DISABLE KEYS */;
INSERT INTO `competencies` VALUES (1,'Tipe Data','Tipe Data','tipe-data','Membuat kode program dengan tipe data, dan operator.','[\"Tipe Data\", \"Operator\"]','2025-04-15 13:51:30','2025-04-15 13:51:30'),(2,'Sekuensial','Struktur Sekuensial','sekuensial','Membuat kode program dengan operasi aritmatika dan logika.','[\"Operasi Aritmatika\", \"Operasi Logika\"]','2025-04-15 13:51:30','2025-04-15 13:51:30'),(3,'Percabangan','Struktur Kontrol Percabangan','percabangan','Membuat kode program struktur kontrol percabangan.','[\"Percabangan\"]','2025-04-15 13:51:30','2025-04-15 13:51:30'),(4,'Perulangan','Struktur Kontrol Perulangan','perulangan','Membuat kode program struktur kontrol perulangan.','[\"Perulangan\"]','2025-04-15 13:51:30','2025-04-15 13:51:30'),(5,'Struktur Data','Struktur Data','struktur-data','Membuat kode program struktur data.','[\"Array\", \"List\"]','2025-04-15 13:51:30','2025-04-15 13:51:30'),(6,'Proyek','Proyek Akhir','proyek-akhir','Proyek ini merupakan sebuah program berbasis bahasa pemrograman C++ yang dirancang untuk melakukan proses penilaian dan evaluasi terhadap hasil belajar siswa dalam suatu kelas. Sistem ini bertujuan untuk mengelola data nilai siswa, menghitung total dan rata-rata nilai, serta menentukan status kelulusan dan peringkat berdasarkan hasil evaluasi tersebut.\r\n\r\nProgram dimulai dengan inisialisasi sejumlah nilai siswa yang disimpan dalam array. Melalui proses perulangan, program akan menghitung jumlah seluruh nilai dan melakukan perhitungan rata-rata. Kemudian, sistem akan mengevaluasi apakah hasil belajar siswa memenuhi kriteria kelulusan yang telah ditentukan. Evaluasi dilakukan menggunakan logika percabangan untuk menentukan status lulus atau tidak, serta menetapkan peringkat sesuai nilai rata-rata.\r\n\r\nHasil dari proses evaluasi akan ditampilkan ke layar secara otomatis tanpa memerlukan masukan dari pengguna. Program ini tidak hanya membantu dalam memahami logika pemrograman dasar seperti penggunaan variabel, array, perulangan, dan percabangan, tetapi juga menggambarkan bagaimana data dapat diolah dan dianalisis secara sistematis menggunakan pendekatan pemrograman.','[\"Tipe Data\", \"Operator\", \"Operasi Aritmatika\", \"Operasi Logika\", \"Percabangan\", \"Perulangan\", \"Array\", \"List\"]','2025-04-15 13:51:30','2025-04-15 13:51:30');
/*!40000 ALTER TABLE `competencies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `descriptions`
--

DROP TABLE IF EXISTS `descriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `descriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question_id` bigint unsigned NOT NULL,
  `detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `descriptions_question_id_foreign` (`question_id`),
  CONSTRAINT `descriptions_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `descriptions`
--

LOCK TABLES `descriptions` WRITE;
/*!40000 ALTER TABLE `descriptions` DISABLE KEYS */;
INSERT INTO `descriptions` VALUES (1,1,'Deklarasikan variabel-variabel baru berikut ini:','2025-04-15 15:43:38','2025-04-15 15:43:38'),(2,1,'Lakukan inisialisasi nilai sebagai berikut:','2025-04-15 15:43:49','2025-04-15 15:43:49'),(3,1,'Buatlah percabangan dengan if berdasarkan kondisi:','2025-04-15 15:44:00','2025-04-15 15:44:00'),(4,2,'Deklarasikan variabel berikut ini:','2025-04-15 15:57:52','2025-04-15 15:57:52'),(5,2,'Lakukan inisialisasi nilai sebagai berikut:','2025-04-15 15:58:06','2025-04-15 15:58:06'),(6,2,'Tampilkan di output:','2025-04-15 15:58:17','2025-04-15 15:58:17'),(7,2,'Kemudian buatlah kontrol percabangan menggunakan if dengan kondisi:','2025-04-15 15:58:31','2025-04-15 15:58:31'),(8,3,'Deklarasikan variabel:','2025-04-15 16:10:52','2025-04-15 16:10:52'),(9,3,'Lakukan inisialisasi sebagai berikut:','2025-04-15 16:11:06','2025-04-15 16:11:06'),(10,3,'Buat kontrol percabangan menggunakan if:','2025-04-15 16:11:20','2025-04-15 16:11:20'),(11,4,'Deklarasikan variabel:','2025-04-15 16:18:39','2025-04-15 16:18:39'),(12,4,'Lakukan inisialisasi:','2025-04-15 16:18:51','2025-04-15 16:18:51'),(13,4,'Buatlah kontrol percabangan menggunakan if dengan kondisi:','2025-04-15 16:19:03','2025-04-15 16:19:03'),(14,5,'Deklarasikan variabel:','2025-04-15 16:25:52','2025-04-15 16:25:52'),(15,5,'Lakukan inisialisasi:','2025-04-15 16:26:04','2025-04-15 16:26:04'),(16,5,'Buatlah kontrol percabangan menggunakan if dengan kondisi:','2025-04-15 16:26:17','2025-04-15 16:26:17'),(17,6,'Deklarasikan variabel:','2025-04-15 16:37:43','2025-04-15 16:37:43'),(18,6,'Lakukan inisialisasi sebagai berikut:','2025-04-15 16:37:58','2025-04-15 16:37:58'),(19,6,'Buat kontrol percabangan menggunakan if dengan kondisi:','2025-04-15 16:38:46','2025-04-15 16:38:46'),(20,7,'Deklarasikan dua buah konstanta menggunakan const dan inisialisasikan:','2025-04-15 16:48:53','2025-04-15 16:48:53'),(21,7,'Deklarasikan variabel:','2025-04-15 16:49:13','2025-04-15 16:49:13'),(22,7,'Lakukan inisialisasi variabel sebagai berikut:','2025-04-15 16:49:24','2025-04-15 16:49:24'),(23,7,'Buat percabangan if dengan kondisi:','2025-04-15 16:49:38','2025-04-15 16:49:38'),(24,8,'Deklarasikan dua buah konstanta menggunakan const dan inisialisasikan sebagai berikut:','2025-04-15 20:12:29','2025-04-15 20:12:29'),(25,8,'Deklarasikan variabel baru:','2025-04-15 20:12:42','2025-04-15 20:12:42'),(26,8,'Lakukan inisialisasi sebagai berikut:','2025-04-15 20:13:06','2025-04-15 20:13:06'),(27,8,'Buat kontrol percabangan if dengan ketentuan:','2025-04-15 20:13:11','2025-04-15 20:13:11'),(28,9,'Deklarasikan variabel baru sebagai berikut:','2025-04-15 20:20:28','2025-04-15 20:20:28'),(29,9,'Lakukan inisialisasi pada variabel sebagai berikut:','2025-04-15 20:20:33','2025-04-15 20:20:33'),(30,9,'Buat kontrol percabangan menggunakan if dengan:','2025-04-15 20:20:37','2025-04-15 20:20:37'),(31,10,'Deklarasikan variabel:','2025-04-15 20:29:01','2025-04-15 20:29:01'),(32,10,'Lakukan inisialisasi sebagai berikut:','2025-04-15 20:29:08','2025-04-15 20:29:08'),(33,10,'Buat kontrol percabangan menggunakan if dengan kondisi:','2025-04-15 20:29:17','2025-04-15 20:29:17'),(34,11,'Deklarasikan variabel baru sebagai berikut:','2025-04-15 20:37:06','2025-04-15 20:37:06'),(35,11,'Lakukan inisialisasi pada variabel sebagai berikut:','2025-04-15 20:37:11','2025-04-15 20:37:11'),(36,11,'Buatlah kontrol percabangan menggunakan if dengan:','2025-04-15 20:37:16','2025-04-15 20:37:16'),(37,12,'Deklarasikan variabel baru sebagai berikut:','2025-04-15 20:42:25','2025-04-15 20:42:25'),(38,12,'Lakukan inisialisasi pada variabel sebagai berikut:','2025-04-15 20:42:31','2025-04-15 20:42:31'),(39,12,'Buat kontrol percabangan menggunakan if dengan:','2025-04-15 20:42:36','2025-04-15 20:42:36'),(40,13,'Deklarasikan variabel baru sebagai berikut:','2025-04-15 20:56:07','2025-04-15 20:56:07'),(41,13,'Lakukan inisialisasi pada variabel sebagai berikut:','2025-04-15 20:56:11','2025-04-15 20:56:11'),(42,13,'Buat kontrol percabangan menggunakan Switch-Case dengan:','2025-04-15 20:56:20','2025-04-15 20:56:20'),(43,14,'Deklarasikan variabel baru sebagai berikut:','2025-04-15 21:03:51','2025-04-15 21:03:51'),(44,14,'Lakukan inisialisasi pada variabel sebagai berikut:','2025-04-15 21:03:57','2025-04-15 21:03:57'),(45,14,'Buat kontrol percabangan bersarang menggunakan if dengan:','2025-04-15 21:04:01','2025-04-15 21:04:01'),(46,15,'Deklarasikan variabel baru sebagai berikut:','2025-04-15 21:16:23','2025-04-15 21:16:23'),(47,15,'Lakukan inisialisasi pada variabel sebagai berikut:','2025-04-15 21:16:28','2025-04-15 21:16:28'),(48,15,'Buat kontrol percabangan menggunakan if dengan:','2025-04-15 21:16:33','2025-04-15 21:16:33'),(49,16,'Deklarasikan variabel baru sebagai berikut:','2025-04-15 21:47:02','2025-04-15 21:47:02'),(50,16,'Lakukan inisialisasi pada variabel sebagai berikut:','2025-04-15 21:47:13','2025-04-15 21:47:13'),(51,16,'Lakukan perulangan (for):','2025-04-15 21:47:17','2025-04-15 21:47:17'),(52,17,'Deklarasikan variabel baru sebagai berikut:','2025-04-15 22:43:55','2025-04-15 22:43:55'),(53,17,'Lakukan inisialisasi pada variabel sebagai berikut:','2025-04-15 22:44:01','2025-04-15 22:44:01'),(54,17,'Lakukan perulangan (for):','2025-04-15 22:44:05','2025-04-15 22:44:05'),(55,18,'Deklarasikan variabel baru sebagai berikut:','2025-04-15 22:47:32','2025-04-15 22:47:32'),(56,18,'Lakukan inisialisasi pada variabel sebagai berikut:','2025-04-15 22:47:37','2025-04-15 22:47:37'),(57,18,'Buatlah kontrol perulangan menggunakan do-while dengan:','2025-04-15 22:47:46','2025-04-15 22:47:46'),(58,19,'Deklarasikan variabel baru sebagai berikut:','2025-04-15 22:50:37','2025-04-15 22:50:37'),(59,19,'Lakukan inisialisasi pada variabel sebagai berikut:','2025-04-15 22:50:41','2025-04-15 22:50:41'),(60,19,'Buatlah kontrol perulangan menggunakan do-while dengan:','2025-04-15 22:50:47','2025-04-15 22:50:47'),(61,20,'Deklarasikan variabel baru sebagai berikut:','2025-04-15 22:52:59','2025-04-15 22:52:59'),(62,20,'Inisialisasikan variabel berikut:','2025-04-15 22:53:04','2025-04-15 22:53:04'),(63,20,'Lakukan perulangan bersarang (for):','2025-04-15 22:53:08','2025-04-15 22:53:08'),(64,21,'Deklarasikan array berikut:','2025-04-16 01:14:44','2025-04-16 01:14:44'),(65,21,'Deklarasikan variabel baru sebagai berikut:','2025-04-16 01:14:49','2025-04-16 01:14:49'),(66,21,'Inisialisasikan variabel berikut:','2025-04-16 01:14:56','2025-04-16 01:14:56'),(67,21,'Lakukan perulangan (for):','2025-04-16 01:15:00','2025-04-16 01:15:00'),(68,22,'Deklarasikan array berikut:','2025-04-16 01:17:53','2025-04-16 01:17:53'),(69,22,'Tampilkan pada output:','2025-04-16 01:17:58','2025-04-16 01:17:58'),(70,23,'Deklarasikan array berikut:','2025-04-16 01:18:47','2025-04-16 01:18:47'),(71,23,'Deklarasikan variabel baru sebagai berikut:','2025-04-16 01:18:54','2025-04-16 01:18:54'),(72,23,'Inisialisasikan variabel berikut:','2025-04-16 01:18:59','2025-04-16 01:18:59'),(73,23,'Ubah nilai elemen array pada:','2025-04-16 01:19:06','2025-04-16 01:20:23'),(74,23,'Lakukan perulangan (for):','2025-04-16 01:19:17','2025-04-16 01:19:17'),(75,24,'Deklarasikan array  berikut:','2025-04-16 01:22:26','2025-04-16 01:22:26'),(76,24,'Deklarasikan variabel baru sebagai berikut:','2025-04-16 01:22:38','2025-04-16 01:22:38'),(77,24,'Inisialisasikan variabel berikut:','2025-04-16 01:22:45','2025-04-16 01:22:45'),(78,24,'Lakukan perulangan (for):','2025-04-16 01:22:50','2025-04-16 01:22:50'),(79,24,'Tampilkan pada output:','2025-04-16 01:22:55','2025-04-16 01:22:55'),(80,25,'Buat struktur data node','2025-04-16 01:25:05','2025-04-16 01:25:05'),(81,25,'Buat dan isi node pertama','2025-04-16 01:25:11','2025-04-16 01:25:11'),(82,25,'Tampilkan isi node','2025-04-16 01:25:20','2025-04-16 01:25:20'),(83,26,'Deklarasi dan Inisialisasi Variabel:','2025-04-16 01:47:20','2025-04-16 01:47:20'),(84,26,'Operasi Aritmatika dan Logika:','2025-04-16 01:47:58','2025-04-16 01:47:58'),(85,26,'Percabangan if:','2025-04-16 01:48:04','2025-04-16 01:48:04'),(86,26,'Output Program (gunakan cout):','2025-04-16 01:48:11','2025-04-16 01:48:11');
/*!40000 ALTER TABLE `descriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `first_answers`
--

DROP TABLE IF EXISTS `first_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `first_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description_id` bigint unsigned NOT NULL,
  `detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int NOT NULL DEFAULT '0',
  `nested` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `first_answers_description_id_foreign` (`description_id`),
  CONSTRAINT `first_answers_description_id_foreign` FOREIGN KEY (`description_id`) REFERENCES `descriptions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `first_answers`
--

LOCK TABLES `first_answers` WRITE;
/*!40000 ALTER TABLE `first_answers` DISABLE KEYS */;
INSERT INTO `first_answers` VALUES (1,1,'x (int)',4,0,'2025-04-15 15:46:02','2025-04-15 15:46:02'),(2,1,'y (int)',4,0,'2025-04-15 15:46:16','2025-04-15 15:46:16'),(3,1,'jawaban (char)',4,0,'2025-04-15 15:46:59','2025-04-15 15:46:59'),(4,1,'rata (int)',4,0,'2025-04-15 15:47:31','2025-04-15 15:47:31'),(5,2,'x = 45',5,0,'2025-04-15 15:49:39','2025-04-15 15:49:39'),(6,2,'y = 15',5,0,'2025-04-15 15:49:51','2025-04-15 15:49:51'),(7,2,'jawaban = \'T\'',5,0,'2025-04-15 15:50:10','2025-04-15 15:50:10'),(8,2,'rata = (x+y) / 2',6,0,'2025-04-15 15:50:34','2025-04-15 15:50:34'),(9,3,'jika jawaban == \'T\', maka tampilkan di output',10,1,'2025-04-15 15:51:30','2025-04-15 15:51:30'),(10,3,'jika kondisi tidak terpenuhi, tampilkan:',8,1,'2025-04-15 15:52:03','2025-04-15 15:52:03'),(11,4,'nama_siswa (string)',5,0,'2025-04-15 15:59:28','2025-04-15 15:59:28'),(12,4,'usia (int)',5,0,'2025-04-15 15:59:41','2025-04-15 15:59:41'),(13,4,'kelamin (char)',5,0,'2025-04-15 16:00:03','2025-04-15 16:00:03'),(14,5,'nama_siswa = \"Rina Safitri\"',5,0,'2025-04-15 16:00:48','2025-04-15 16:00:48'),(15,5,'usia = 20',5,0,'2025-04-15 16:00:56','2025-04-15 16:00:56'),(16,5,'kelamin = \'P\'',5,0,'2025-04-15 16:01:08','2025-04-15 16:01:08'),(17,6,'nilai dari variabel nama_siswa',7,0,'2025-04-15 16:02:07','2025-04-15 16:02:07'),(18,6,'nilai dari variabel usia',7,0,'2025-04-15 16:02:31','2025-04-15 16:02:31'),(19,7,'jika kelamin == \'P\'',12,1,'2025-04-15 16:03:24','2025-04-15 16:05:30'),(20,7,'jika tidak,',10,1,'2025-04-15 16:03:52','2025-04-15 16:06:16'),(21,8,'a (int)',5,0,'2025-04-15 16:11:44','2025-04-15 16:11:44'),(22,8,'b (int)',5,0,'2025-04-15 16:11:53','2025-04-15 16:11:53'),(23,8,'c (int)',5,0,'2025-04-15 16:12:02','2025-04-15 16:12:02'),(24,9,'a = 12',5,0,'2025-04-15 16:12:36','2025-04-15 16:15:12'),(25,9,'b = a + 8',5,0,'2025-04-15 16:12:51','2025-04-15 16:12:51'),(26,9,'c = b + b',5,0,'2025-04-15 16:13:13','2025-04-15 16:13:13'),(27,10,'jika a == 12, maka tampilkan:',12,1,'2025-04-15 16:14:07','2025-04-15 16:15:28'),(28,10,'jika kondisi tidak terpenuhi, maka tampilkan:',10,1,'2025-04-15 16:14:43','2025-04-15 16:15:34'),(29,11,'umur (int)',15,0,'2025-04-15 16:19:41','2025-04-15 16:19:41'),(30,12,'umur = 18',15,0,'2025-04-15 16:20:08','2025-04-15 16:20:08'),(31,13,'jika umur >= 17, maka tampilkan:',16,1,'2025-04-15 16:20:50','2025-04-15 16:20:50'),(32,13,'jika kondisi tidak terpenuhi, maka tampilkan:',14,1,'2025-04-15 16:21:16','2025-04-15 16:21:27'),(33,14,'kode_akses (string)',12,0,'2025-04-15 16:27:26','2025-04-15 16:27:26'),(34,15,'kode_akses = \"1234\"',12,0,'2025-04-15 16:27:55','2025-04-15 16:27:55'),(35,16,'jika kode_akses == \"1234\", maka tampilkan:',20,1,'2025-04-15 16:28:48','2025-04-15 16:28:48'),(36,16,'jika kondisi tidak sesuai, maka tampilkan:',16,1,'2025-04-15 16:29:01','2025-04-15 16:29:01'),(37,17,'panjang (int)',4,0,'2025-04-15 16:39:16','2025-04-15 16:39:16'),(38,17,'lebar (int)',4,0,'2025-04-15 16:39:27','2025-04-15 16:39:27'),(39,17,'luas (double)',4,0,'2025-04-15 16:39:36','2025-04-15 16:39:36'),(40,17,'jenis (string)',4,0,'2025-04-15 16:39:46','2025-04-15 16:39:46'),(41,18,'panjang = 8',4,0,'2025-04-15 16:40:37','2025-04-15 16:40:37'),(42,18,'lebar = 5',4,0,'2025-04-15 16:40:45','2025-04-15 16:40:45'),(43,18,'luas = panjang * lebar',5,0,'2025-04-15 16:41:03','2025-04-15 16:41:03'),(44,18,'jenis = \"persegi panjang\"',4,0,'2025-04-15 16:41:19','2025-04-15 16:41:19'),(45,19,'jika jenis == \"persegi panjang\", maka tampilkan:',12,1,'2025-04-15 16:42:30','2025-04-15 16:42:30'),(46,19,'jika kondisi tidak sesuai, maka tampilkan:',10,1,'2025-04-15 16:42:51','2025-04-15 16:42:51'),(47,20,'tinggi = 3 (int)',4,0,'2025-04-15 16:51:04','2025-04-15 16:51:04'),(48,20,'dasar = 7 (int)',4,0,'2025-04-15 16:51:16','2025-04-15 16:51:16'),(49,21,'nilai_akhir (int)',4,0,'2025-04-15 16:52:03','2025-04-15 16:52:03'),(50,21,'aksi (string)',4,0,'2025-04-15 16:52:18','2025-04-15 16:52:18'),(51,22,'nilai_akhir = tinggi * dasar',5,0,'2025-04-15 16:52:58','2025-04-15 16:52:58'),(52,22,'aksi = \"jumlah\"',4,0,'2025-04-15 16:53:20','2025-04-15 16:53:20'),(53,23,'jika aksi == \"luas\", maka tampilkan:',12,1,'2025-04-15 16:54:03','2025-04-15 16:54:38'),(54,23,'jika kondisi tidak sesuai, maka tampilkan:',8,1,'2025-04-15 16:54:21','2025-04-15 16:54:44'),(55,24,'tinggi = 7 (int)',4,0,'2025-04-15 20:14:21','2025-04-15 20:14:21'),(56,24,'alas = 8 (int)',4,0,'2025-04-15 20:14:40','2025-04-15 20:14:40'),(57,25,'luas (int)',4,0,'2025-04-15 20:15:07','2025-04-15 20:15:07'),(58,25,'opsi (string)',4,0,'2025-04-15 20:15:26','2025-04-15 20:15:26'),(59,26,'luas = tinggi * alas',5,0,'2025-04-15 20:15:47','2025-04-15 20:15:47'),(60,26,'opsi = \"Luas\"',4,0,'2025-04-15 20:16:00','2025-04-15 20:16:00'),(61,27,'jika opsi == \"Luas\", maka tampilkan di output:',12,1,'2025-04-15 20:16:37','2025-04-15 20:16:37'),(62,27,'jika kondisi tidak sesuai, maka tampilkan:',8,1,'2025-04-15 20:16:54','2025-04-15 20:18:15'),(63,28,'angka (int)',15,0,'2025-04-15 20:22:17','2025-04-15 20:22:17'),(64,29,'angka = 15',15,0,'2025-04-15 20:25:38','2025-04-15 20:25:38'),(65,30,'kondisi: jika angka habis dibagi 3, maka:',16,1,'2025-04-15 20:26:27','2025-04-15 20:26:27'),(66,30,'jika tidak sesuai kondisi, maka:',14,1,'2025-04-15 20:26:47','2025-04-15 20:26:47'),(67,31,'kilometer (float)',4,0,'2025-04-15 20:29:56','2025-04-15 20:29:56'),(68,31,'miles (float)',4,0,'2025-04-15 20:30:09','2025-04-15 20:30:09'),(69,31,'aksi (string)',4,0,'2025-04-15 20:30:17','2025-04-15 20:30:17'),(70,32,'kilometer = 120',4,0,'2025-04-15 20:30:41','2025-04-15 20:30:41'),(71,32,'miles = kilometer * 0.621371',6,0,'2025-04-15 20:30:49','2025-04-15 20:30:49'),(72,32,'aksi = \"konversi\"',4,0,'2025-04-15 20:30:55','2025-04-15 20:30:55'),(73,33,'Jika aksi == \"konversi\", maka tampilkan:',14,1,'2025-04-15 20:31:51','2025-04-15 20:31:51'),(74,33,'jika kondisi tidak sesuai, maka tampilkan:',10,1,'2025-04-15 20:32:10','2025-04-15 20:32:10'),(75,34,'usia (double)',10,0,'2025-04-15 20:37:37','2025-04-15 20:37:37'),(76,35,'usia = 18',10,0,'2025-04-15 20:37:59','2025-04-15 20:37:59'),(77,36,'kondisi: jika usia >= 17, maka:',16,1,'2025-04-15 20:38:28','2025-04-15 20:38:31'),(78,36,'jika tidak sesuai kondisi, maka:',14,1,'2025-04-15 20:38:48','2025-04-15 20:38:48'),(79,37,'angkaPIN (int)',10,0,'2025-04-15 20:44:11','2025-04-15 20:44:11'),(80,38,'angkaPIN = 7890',10,0,'2025-04-15 20:44:29','2025-04-15 20:44:29'),(81,39,'kondisi: jika angkaPIN == 7890, maka:',16,1,'2025-04-15 20:45:04','2025-04-15 20:45:04'),(82,39,'jika tidak sesuai dengan kondisi, maka:',14,1,'2025-04-15 20:45:13','2025-04-15 20:45:13'),(83,40,'kategori (char)',4,0,'2025-04-15 20:57:07','2025-04-15 20:57:07'),(84,41,'kategori = \'X\'',4,0,'2025-04-15 20:57:23','2025-04-15 20:57:23'),(85,42,'Kondisi: jika kategori == \'X\', maka:',8,1,'2025-04-15 20:57:53','2025-04-15 20:57:53'),(86,42,'Kondisi: jika kategori == \'Y\', maka:',8,1,'2025-04-15 20:58:09','2025-04-15 20:58:09'),(87,42,'Kondisi: jika kategori == \'Z\', maka:',8,1,'2025-04-15 20:58:16','2025-04-15 20:59:03'),(88,42,'Jika tidak sesuai dengan kondisi yang ada, maka:',8,1,'2025-04-15 20:58:31','2025-04-15 20:58:31'),(89,43,'usia (int)',7,0,'2025-04-15 21:04:23','2025-04-15 21:04:23'),(90,44,'usia = 30',7,0,'2025-04-15 21:04:39','2025-04-15 21:04:39'),(91,45,'Kondisi: jika usia > 18, maka:',14,1,'2025-04-15 21:05:02','2025-04-15 21:05:02'),(92,45,'Jika tidak sesuai dengan kondisi pertama, maka:',12,1,'2025-04-15 21:05:15','2025-04-15 21:05:15'),(93,46,'angka (int)',10,0,'2025-04-15 21:29:00','2025-04-15 21:29:00'),(94,47,'angka = 12',10,0,'2025-04-15 21:29:14','2025-04-15 21:29:14'),(95,48,'Kondisi: jika angka % 2 == 0, maka:',16,1,'2025-04-15 21:29:37','2025-04-15 21:29:50'),(96,48,'Jika tidak sesuai dengan kondisi, maka:',14,1,'2025-04-15 21:29:46','2025-04-15 21:29:46'),(97,49,'indeks (int)',9,0,'2025-04-15 21:47:40','2025-04-15 21:47:40'),(98,49,'jumlah (int)',9,0,'2025-04-15 21:47:51','2025-04-15 21:47:51'),(99,50,'indeks = 1',9,0,'2025-04-15 21:48:12','2025-04-15 21:48:12'),(100,50,'jumlah = 10',9,0,'2025-04-15 21:48:23','2025-04-15 21:48:23'),(101,51,'Untuk memunculkan output \"Data ke-1\" menaik hingga \"Data ke-10\"',18,0,'2025-04-15 21:49:07','2025-04-15 21:49:07'),(102,51,'Menampilkan pernyataan \"Data ke-\" ditambah dengan variabel indeks pada output',18,0,'2025-04-15 21:49:35','2025-04-15 21:49:35'),(103,51,'Berikan spasi ke bawah (baris baru setiap output)',8,0,'2025-04-15 21:50:03','2025-04-16 10:25:55'),(104,52,'angka (int)',9,0,'2025-04-15 22:44:30','2025-04-15 22:44:30'),(105,52,'maksimum (int)',9,0,'2025-04-15 22:44:41','2025-04-15 22:44:41'),(106,53,'angka = 1',9,0,'2025-04-15 22:45:06','2025-04-16 10:18:56'),(107,53,'maksimum = 10',9,0,'2025-04-15 22:45:11','2025-04-16 10:19:12'),(108,54,'Untuk memunculkan output dari \"Hitungan ke-10\" menurun hingga \"Hitungan ke-1\"',18,0,'2025-04-15 22:46:05','2025-04-16 10:25:04'),(109,54,'Menampilkan pernyataan \"Hitungan ke-\" ditambah variabel maksimum pada output',18,0,'2025-04-15 22:46:18','2025-04-16 10:25:25'),(110,54,'Berikan spasi ke bawah (baris baru setiap output)',8,0,'2025-04-15 22:46:30','2025-04-15 22:46:30'),(111,55,'counter (int)',10,0,'2025-04-15 22:48:14','2025-04-15 22:48:14'),(112,56,'counter = 1',10,0,'2025-04-15 22:48:32','2025-04-15 22:48:32'),(113,57,'Menampilkan pernyataan “Belajar C++” diikuti dengan nilai dari variabel counter pada output',18,0,'2025-04-15 22:49:12','2025-04-15 22:49:12'),(114,57,'Memberikan spasi ke bawah (baris baru) setelah setiap output',6,0,'2025-04-15 22:49:21','2025-04-15 22:49:21'),(115,57,'Menambahkan kode perintah untuk increment variabel counter',18,0,'2025-04-15 22:49:26','2025-04-15 22:49:26'),(116,57,'Menentukan kondisi perulangan: selama nilai counter kurang dari atau sama dengan 10',18,0,'2025-04-15 22:49:36','2025-04-15 22:49:36'),(117,58,'angka (int)',10,0,'2025-04-15 22:51:14','2025-04-15 22:51:14'),(118,59,'angka = 10',10,0,'2025-04-15 22:51:26','2025-04-15 22:51:26'),(119,60,'Menampilkan pernyataan “Latihan C++” diikuti dengan nilai dari variabel angka pada output',18,0,'2025-04-15 22:51:38','2025-04-15 22:51:38'),(120,60,'Memberikan spasi ke bawah (baris baru) setelah setiap output',6,0,'2025-04-15 22:51:45','2025-04-15 22:51:45'),(121,60,'Menuliskan kode perintah untuk decrement nilai variabel angka',18,0,'2025-04-15 22:52:03','2025-04-15 22:52:03'),(122,60,'Tuliskan kondisi perulangan: selama nilai angka lebih besar atau sama dengan 1',18,0,'2025-04-15 22:52:12','2025-04-15 22:52:12'),(123,61,'karakter (char)',10,0,'2025-04-15 22:53:28','2025-04-15 22:53:28'),(124,62,'karakter = \'A\'',10,0,'2025-04-15 22:53:48','2025-04-15 22:53:48'),(125,63,'Tuliskan kondisi perulangan menggunakan variabel int i = 0 untuk menampilkan huruf dari A hingga I',25,0,'2025-04-15 22:54:09','2025-04-16 16:52:29'),(126,63,'Tampilkan variabel karakter',20,0,'2025-04-15 22:54:43','2025-04-16 16:53:12'),(127,64,'angka bertipe int dengan isi {10, 20, 30}',10,0,'2025-04-16 01:15:29','2025-04-16 01:15:29'),(128,65,'i (int)',5,0,'2025-04-16 01:15:52','2025-04-16 01:16:00'),(129,66,'i = 0',5,0,'2025-04-16 01:16:14','2025-04-16 01:16:14'),(130,67,'Tuliskan kondisi perulangan untuk menampilkan seluruh elemen array',30,0,'2025-04-16 01:16:52','2025-04-16 01:16:52'),(131,67,'Tampilkan elemen angka [i]',20,0,'2025-04-16 01:17:04','2025-04-16 01:17:04'),(132,67,'Setiap output ditampilkan dalam baris baru (spasi ke bawah)',10,0,'2025-04-16 01:17:13','2025-04-16 01:17:13'),(133,68,'huruf bertipe char dengan isi {\'X\', \'Y\', \'Z\'}',40,0,'2025-04-16 01:18:10','2025-04-16 01:18:10'),(134,69,'elemen array pada indeks ke-2 (huruf[2])',40,0,'2025-04-16 01:18:24','2025-04-16 01:18:24'),(135,70,'angka bertipe int dengan isi {1, 2, 3}',10,0,'2025-04-16 01:19:27','2025-04-16 01:19:27'),(136,71,'i (int)',5,0,'2025-04-16 01:19:42','2025-04-16 01:19:42'),(137,72,'i = 0',5,0,'2025-04-16 01:19:53','2025-04-16 01:19:53'),(138,73,'indeks ke-1 menjadi 99',15,0,'2025-04-16 01:21:00','2025-04-16 01:21:00'),(139,74,'Tuliskan kondisi perulangan untuk menampilkan seluruh elemen array',20,0,'2025-04-16 01:21:22','2025-04-16 01:21:22'),(140,74,'Tampilkan elemen angka [i]',20,0,'2025-04-16 01:21:34','2025-04-16 01:21:34'),(141,74,'Setiap output ditampilkan dalam baris baru (spasi ke bawah)',5,0,'2025-04-16 01:21:43','2025-04-16 01:21:43'),(142,75,'nilai bertipe int dengan isi {5, 5, 5}',10,0,'2025-04-16 01:23:08','2025-04-16 01:23:08'),(143,76,'total (int)',5,0,'2025-04-16 01:23:20','2025-04-16 01:23:20'),(144,77,'total = 0',5,0,'2025-04-16 01:23:32','2025-04-16 01:23:32'),(145,78,'Tuliskan kondisi perulangan untuk menghitung jumlah nilai dalam array',25,0,'2025-04-16 01:23:53','2025-04-16 01:23:53'),(146,78,'Tambahkan nilai[i] ke variabel total',20,0,'2025-04-16 01:24:01','2025-04-16 01:24:01'),(147,79,'Nilai akhir total',15,0,'2025-04-16 01:24:23','2025-04-16 01:24:23'),(148,80,'Buat struct dengan nama Node',10,0,'2025-04-16 01:25:34','2025-04-16 01:25:34'),(149,80,'Tambahkan member data bertipe int',10,0,'2025-04-16 01:25:43','2025-04-16 01:25:43'),(150,80,'Tambahkan member next pointer  bertipe Node (*next)',10,0,'2025-04-16 01:25:50','2025-04-17 01:40:09'),(151,81,'Deklarasikan pointer bernama node1 bertipe Node',10,0,'2025-04-16 01:26:00','2025-04-17 01:40:53'),(152,81,'Alokasikan memori untuk node1 menggunakan new',10,0,'2025-04-16 01:26:22','2025-04-16 01:26:22'),(153,81,'Isi data pada node1 dengan nilai 50',10,0,'2025-04-16 01:26:31','2025-04-16 01:26:31'),(154,81,'Set next pada node1 dengan NULL',10,0,'2025-04-16 01:26:38','2025-04-16 01:26:38'),(155,82,'Cetak nilai data dari node1 ke layar menggunakan cout',10,0,'2025-04-16 01:26:54','2025-04-16 01:26:54'),(156,83,'Buat variabel jumlahSiswa bertipe int dan isi dengan nilai 5',5,0,'2025-04-16 02:02:59','2025-04-16 02:02:59'),(157,83,'Buat array nilai[5] bertipe int dan isi dengan nilai {70, 85, 60, 90, 75}',5,0,'2025-04-16 02:03:05','2025-04-16 02:03:05'),(158,83,'Buat variabel total = 0 dan rataRata bertipe int',5,0,'2025-04-16 02:03:13','2025-04-17 02:28:49'),(159,83,'Buat variabel lulus bertipe string, dan peringkat bertipe char',5,0,'2025-04-16 02:03:26','2025-04-16 02:03:26'),(160,84,'Hitung jumlah seluruh nilai siswa menggunakan perulangan for (gunakan variabel int i = 0 untuk kondisi), simpan hasilnya di total',10,0,'2025-04-16 02:03:44','2025-04-17 04:08:37'),(161,84,'Hitung nilai rata-rata dan simpan ke rataRata',10,0,'2025-04-16 02:03:51','2025-04-16 02:03:51'),(162,85,'Jika rataRata >= 75, isi variabel lulus dengan “YA” dan peringkat dengan \'A\'',10,0,'2025-04-16 02:04:11','2025-04-16 02:04:11'),(163,85,'Jika tidak, isi lulus dengan “TIDAK” dan peringkat dengan \'B\'',10,0,'2025-04-16 02:04:20','2025-04-16 02:04:20'),(164,86,'Tampilkan seluruh nilai siswa (cout didalam perulangan for)',5,0,'2025-04-16 02:05:06','2025-04-16 02:05:06'),(165,86,'Tampilkan nilai total, rata-rata',5,0,'2025-04-16 02:05:19','2025-04-16 02:05:19'),(166,86,'Tampilkan apakah lulus',5,0,'2025-04-16 02:05:25','2025-04-16 02:05:25'),(167,86,'Tampilkan peringkat',5,0,'2025-04-16 02:05:33','2025-04-16 02:05:33'),(168,63,'Increment variabel karakter',15,0,'2025-04-16 16:53:05','2025-04-16 16:53:05');
/*!40000 ALTER TABLE `first_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `first_keys`
--

DROP TABLE IF EXISTS `first_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `first_keys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_answer_id` bigint unsigned NOT NULL,
  `detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `first_keys_first_answer_id_foreign` (`first_answer_id`),
  CONSTRAINT `first_keys_first_answer_id_foreign` FOREIGN KEY (`first_answer_id`) REFERENCES `first_answers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=439 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `first_keys`
--

LOCK TABLES `first_keys` WRITE;
/*!40000 ALTER TABLE `first_keys` DISABLE KEYS */;
INSERT INTO `first_keys` VALUES (1,1,'int x;','2025-04-16 05:04:33','2025-04-16 05:04:33'),(2,1,'int x = 45;','2025-04-16 05:04:40','2025-04-16 05:04:40'),(3,1,'int x, y;','2025-04-16 05:04:46','2025-04-16 05:04:46'),(4,1,'int x = 45, y;','2025-04-16 05:04:54','2025-04-16 05:04:54'),(5,1,'int x, rata;','2025-04-16 05:05:02','2025-04-16 05:05:02'),(6,1,'int x = 45, rata;','2025-04-16 05:05:08','2025-04-16 05:05:08'),(7,1,'int x, y, rata;','2025-04-16 05:05:16','2025-04-16 05:05:16'),(8,1,'int x = 45, y = 15;','2025-04-16 05:05:26','2025-04-16 05:05:26'),(9,2,'int y;','2025-04-16 05:05:48','2025-04-16 05:05:48'),(10,2,'int y = 15;','2025-04-16 05:05:59','2025-04-16 05:05:59'),(11,2,'int x, y;','2025-04-16 05:06:07','2025-04-16 05:06:07'),(12,2,'int x = 45, y = 15;','2025-04-16 05:06:15','2025-04-16 05:06:15'),(13,2,'int y, rata;','2025-04-16 05:06:24','2025-04-16 05:06:24'),(14,2,'int x, y, rata;','2025-04-16 05:06:32','2025-04-16 05:06:32'),(15,2,'int x, y = 15, rata;','2025-04-16 05:06:40','2025-04-16 05:06:40'),(16,3,'char jawaban;','2025-04-16 05:07:02','2025-04-16 05:07:02'),(17,3,'char jawaban = \'T\';','2025-04-16 05:07:13','2025-04-16 05:07:13'),(18,4,'int rata;','2025-04-16 05:07:28','2025-04-16 05:07:28'),(19,4,'int rata = (x + y) / 2;','2025-04-16 05:07:36','2025-04-16 05:07:36'),(20,4,'int x, y, rata;','2025-04-16 05:07:41','2025-04-16 05:07:41'),(21,4,'int x = 45, y = 15, rata = (x + y) / 2;','2025-04-16 05:07:48','2025-04-16 05:07:48'),(22,5,'x = 45;','2025-04-16 05:08:17','2025-04-16 05:08:17'),(23,5,'int x = 45;','2025-04-16 05:08:23','2025-04-16 05:08:23'),(24,5,'int x = 45, y;','2025-04-16 05:08:29','2025-04-16 05:08:29'),(25,5,'int x = 45, y = 15;','2025-04-16 05:08:36','2025-04-16 05:08:36'),(26,6,'y = 15;','2025-04-16 05:08:51','2025-04-16 05:08:51'),(27,6,'int y = 15;','2025-04-16 05:08:56','2025-04-16 05:08:56'),(28,6,'int x = 45, y = 15;','2025-04-16 05:09:03','2025-04-16 05:09:03'),(29,7,'jawaban = \'T\';','2025-04-16 05:09:17','2025-04-16 05:09:17'),(30,7,'char jawaban = \'T\';','2025-04-16 05:09:22','2025-04-16 05:09:22'),(31,8,'rata = (x + y) / 2;','2025-04-16 05:09:36','2025-04-16 05:09:36'),(32,8,'int rata = (x + y) / 2;','2025-04-16 05:09:43','2025-04-16 05:09:43'),(33,9,'if (jawaban == \'T\') {','2025-04-16 05:10:08','2025-04-16 05:10:08'),(34,10,'} else {','2025-04-16 05:34:41','2025-04-16 05:34:41'),(35,11,'string nama_siswa;','2025-04-16 05:57:10','2025-04-16 05:57:10'),(36,12,'int usia;','2025-04-16 05:57:24','2025-04-16 05:57:24'),(37,13,'char kelamin;','2025-04-16 05:57:41','2025-04-16 05:57:41'),(38,14,'nama_siswa = \"Rina Safitri\";','2025-04-16 05:57:59','2025-04-16 05:57:59'),(39,14,'string nama_siswa = \"Rina Safitri\";','2025-04-16 05:58:05','2025-04-16 05:58:05'),(40,15,'usia = 20;','2025-04-16 05:58:16','2025-04-16 05:58:16'),(41,15,'int usia = 20;','2025-04-16 05:58:25','2025-04-16 05:58:25'),(42,16,'kelamin = \'P\';','2025-04-16 05:58:36','2025-04-16 05:58:36'),(43,16,'char kelamin = \'P\';','2025-04-16 05:58:43','2025-04-16 05:58:43'),(44,17,'cout << nama_siswa;','2025-04-16 05:59:06','2025-04-16 05:59:06'),(45,17,'cout << nama_siswa << endl;','2025-04-16 06:00:12','2025-04-16 06:00:12'),(46,17,'cout << \"Nama Siswa = \" << nama_siswa;','2025-04-16 06:01:06','2025-04-16 06:01:06'),(47,17,'cout << \"Nama Siswa = \" << nama_siswa << endl;','2025-04-16 06:01:16','2025-04-16 06:01:16'),(48,17,'cout << \"Nilai nama_siswa = \" << nama_siswa;','2025-04-16 06:01:28','2025-04-16 06:01:28'),(49,17,'cout << \"Nilai nama_siswa = \" << nama_siswa << endl;','2025-04-16 06:01:36','2025-04-16 06:01:36'),(50,17,'cout << nama_siswa;\r\ncout << endl;','2025-04-16 06:01:43','2025-04-16 06:01:43'),(51,17,'cout << \"Nama Siswa = \" << nama_siswa;\r\ncout << endl;','2025-04-16 06:01:52','2025-04-16 06:01:52'),(52,17,'cout << \"Nilai nama_siswa = \" << nama_siswa;\r\ncout << endl;','2025-04-16 06:01:58','2025-04-16 06:01:58'),(53,18,'cout << usia;','2025-04-16 06:02:20','2025-04-16 06:02:20'),(54,18,'cout << usia << endl;','2025-04-16 06:02:26','2025-04-16 06:02:26'),(55,18,'cout << \"Usia = \" << usia;','2025-04-16 06:02:33','2025-04-16 06:02:33'),(56,18,'cout << \"Usia = \" << usia << endl;','2025-04-16 06:02:41','2025-04-16 06:02:41'),(57,18,'cout << \"Nilai usia = \" << usia;','2025-04-16 06:02:47','2025-04-16 06:02:47'),(58,18,'cout << \"Nilai usia = \" << usia << endl;','2025-04-16 06:02:54','2025-04-16 06:02:54'),(59,18,'cout << usia;\r\ncout << endl;','2025-04-16 06:03:02','2025-04-16 06:03:02'),(60,18,'cout << \"Usia = \" << usia;\r\ncout << endl;','2025-04-16 06:03:11','2025-04-16 06:03:11'),(61,18,'cout << \"Nilai usia = \" << usia;\r\ncout << endl;','2025-04-16 06:03:17','2025-04-16 06:03:17'),(62,19,'if (kelamin == \'P\') {','2025-04-16 06:03:49','2025-04-16 06:03:49'),(63,20,'} else {','2025-04-16 06:04:22','2025-04-16 06:04:22'),(64,21,'int a;','2025-04-16 06:15:09','2025-04-16 06:15:09'),(65,21,'int a, b;','2025-04-16 06:15:15','2025-04-16 06:15:15'),(66,21,'int a, b, c;','2025-04-16 06:15:20','2025-04-16 06:15:20'),(67,21,'int a = 12;','2025-04-16 06:15:26','2025-04-16 06:15:26'),(68,21,'int a = 12, b;','2025-04-16 06:15:33','2025-04-16 06:15:33'),(69,21,'int a = 12, b, c;','2025-04-16 06:15:38','2025-04-16 06:15:38'),(70,22,'int b;','2025-04-16 06:15:52','2025-04-16 06:15:52'),(71,22,'int a, b;','2025-04-16 06:15:58','2025-04-16 06:15:58'),(72,22,'int b, c;','2025-04-16 06:16:03','2025-04-16 06:16:03'),(73,22,'int a, b, c;','2025-04-16 06:16:09','2025-04-16 06:16:09'),(74,22,'int b = a + 8;','2025-04-16 06:16:16','2025-04-16 06:16:16'),(75,22,'int a, b = a + 8;','2025-04-16 06:17:05','2025-04-16 06:17:05'),(76,22,'int b = a + 8, c;','2025-04-16 06:17:10','2025-04-16 06:17:10'),(77,23,'int c;','2025-04-16 06:17:23','2025-04-16 06:17:23'),(78,23,'int b, c;','2025-04-16 06:17:29','2025-04-16 06:17:29'),(79,23,'int a, b, c;','2025-04-16 06:17:34','2025-04-16 06:17:34'),(80,23,'int c = b + b;','2025-04-16 06:17:41','2025-04-16 06:17:41'),(81,23,'int b, c = b + b;','2025-04-16 06:17:48','2025-04-16 06:17:48'),(82,23,'int a, b, c = b + b;','2025-04-16 06:17:56','2025-04-16 06:17:56'),(83,24,'a = 12;','2025-04-16 06:18:16','2025-04-16 06:18:16'),(84,24,'int a = 12;','2025-04-16 06:18:21','2025-04-16 06:18:21'),(85,24,'int a = 12, b;','2025-04-16 06:25:58','2025-04-16 06:25:58'),(86,24,'int a = 12, b, c;','2025-04-16 06:26:04','2025-04-16 06:26:04'),(87,24,'int a = 12, b = a + 8;','2025-04-16 06:26:09','2025-04-16 06:26:09'),(88,24,'int a = 12, b = a + 8, c = b + b;','2025-04-16 06:26:17','2025-04-16 06:26:17'),(89,25,'b = a + 8;','2025-04-16 06:26:28','2025-04-16 06:26:28'),(90,25,'int b = a + 8;','2025-04-16 06:26:36','2025-04-16 06:26:36'),(91,25,'int a, b = a + 8;','2025-04-16 06:26:42','2025-04-16 06:26:42'),(92,25,'int b = a + 8, c;','2025-04-16 06:26:49','2025-04-16 06:26:49'),(93,26,'c = b + b;','2025-04-16 06:28:07','2025-04-16 06:28:07'),(94,26,'int c = b + b;','2025-04-16 06:28:12','2025-04-16 06:28:12'),(95,26,'int b, c = b + b;','2025-04-16 06:28:18','2025-04-16 06:28:18'),(96,26,'int a, b, c = b + b;','2025-04-16 06:28:25','2025-04-16 06:28:25'),(97,27,'if (a == 12) {','2025-04-16 06:28:57','2025-04-16 06:28:57'),(98,28,'} else {','2025-04-16 06:29:14','2025-04-16 06:29:14'),(99,29,'int umur;','2025-04-16 06:38:14','2025-04-16 06:38:14'),(100,29,'int umur = 18;','2025-04-16 06:38:20','2025-04-16 06:38:20'),(101,30,'umur = 18;','2025-04-16 06:38:38','2025-04-16 06:38:38'),(102,30,'int umur = 18;','2025-04-16 06:38:44','2025-04-16 06:38:44'),(103,31,'if (umur >= 17) {','2025-04-16 06:39:02','2025-04-16 06:39:02'),(104,32,'} else {','2025-04-16 06:39:21','2025-04-16 06:39:21'),(105,33,'string kode_akses;','2025-04-16 06:43:33','2025-04-16 06:43:33'),(106,33,'string kode_akses = \"1234\";','2025-04-16 06:43:39','2025-04-16 06:43:39'),(107,34,'kode_akses = \"1234\";','2025-04-16 06:43:57','2025-04-16 06:43:57'),(108,34,'string kode_akses = \"1234\";','2025-04-16 06:44:03','2025-04-16 06:44:03'),(109,35,'if (kode_akses == \"1234\") {','2025-04-16 06:44:23','2025-04-16 06:44:23'),(110,36,'} else {','2025-04-16 06:44:36','2025-04-16 06:44:36'),(111,37,'int panjang;','2025-04-16 07:39:02','2025-04-16 07:39:02'),(112,37,'int panjang = 8;','2025-04-16 07:39:07','2025-04-16 07:39:07'),(113,37,'int panjang, lebar;','2025-04-16 07:39:13','2025-04-16 07:39:13'),(114,37,'int panjang = 8, lebar;','2025-04-16 07:39:19','2025-04-16 07:39:19'),(115,37,'int panjang = 8, lebar = 5;','2025-04-16 07:39:28','2025-04-16 07:39:28'),(116,38,'int lebar;','2025-04-16 07:39:44','2025-04-16 07:39:44'),(117,38,'int lebar = 5;','2025-04-16 07:39:51','2025-04-16 07:39:51'),(118,38,'int panjang, lebar;','2025-04-16 07:39:57','2025-04-16 07:39:57'),(119,38,'int panjang = 8, lebar = 5;','2025-04-16 07:40:04','2025-04-16 07:40:04'),(120,39,'double luas;','2025-04-16 07:40:16','2025-04-16 07:40:16'),(121,39,'double luas = panjang * lebar;','2025-04-16 07:40:23','2025-04-16 07:40:23'),(122,40,'string jenis;','2025-04-16 07:40:36','2025-04-16 07:40:36'),(123,40,'string jenis = \"persegi panjang\";','2025-04-16 07:40:43','2025-04-16 07:40:43'),(124,41,'panjang = 8;','2025-04-16 07:41:00','2025-04-16 07:41:00'),(125,41,'int panjang = 8;','2025-04-16 07:41:06','2025-04-16 07:41:06'),(126,41,'int panjang = 8, lebar = 5;','2025-04-16 07:41:12','2025-04-16 07:41:12'),(127,42,'lebar = 5;','2025-04-16 07:41:23','2025-04-16 07:41:23'),(128,42,'int lebar = 5;','2025-04-16 07:41:28','2025-04-16 07:41:28'),(129,42,'int panjang = 8, lebar = 5;','2025-04-16 07:41:35','2025-04-16 07:41:35'),(130,43,'luas = panjang * lebar;','2025-04-16 07:41:47','2025-04-16 07:41:47'),(131,43,'double luas = panjang * lebar;','2025-04-16 07:41:53','2025-04-16 07:41:53'),(132,44,'jenis = \"persegi panjang\";','2025-04-16 07:42:05','2025-04-16 07:42:05'),(133,44,'string jenis = \"persegi panjang\";','2025-04-16 07:42:11','2025-04-16 07:42:11'),(134,45,'if (jenis == \"persegi panjang\") {','2025-04-16 07:42:29','2025-04-16 07:42:29'),(135,46,'} else {','2025-04-16 07:43:12','2025-04-16 07:43:12'),(136,47,'const int tinggi = 3;','2025-04-16 07:51:37','2025-04-16 07:51:37'),(137,47,'const int tinggi = 3, dasar = 7;','2025-04-16 07:51:44','2025-04-16 07:51:44'),(138,48,'const int dasar = 7;','2025-04-16 07:51:55','2025-04-16 07:51:55'),(139,48,'const int tinggi = 3, dasar = 7;','2025-04-16 07:52:00','2025-04-16 07:52:00'),(140,49,'int nilai_akhir;','2025-04-16 07:52:20','2025-04-16 07:52:20'),(141,49,'int nilai_akhir = tinggi * dasar;','2025-04-16 07:52:25','2025-04-16 07:52:25'),(142,50,'string aksi;','2025-04-16 07:52:40','2025-04-16 07:52:40'),(143,50,'string aksi = \"jumlah\";','2025-04-16 07:52:46','2025-04-16 07:52:46'),(144,51,'nilai_akhir = tinggi * dasar;','2025-04-16 07:53:02','2025-04-16 07:53:02'),(145,51,'int nilai_akhir = tinggi * dasar;','2025-04-16 07:53:09','2025-04-16 07:53:09'),(146,52,'aksi = \"jumlah\";','2025-04-16 07:53:48','2025-04-16 07:53:48'),(147,52,'string aksi = \"jumlah\";','2025-04-16 07:53:53','2025-04-16 07:53:53'),(148,53,'if (aksi == \"luas\") {','2025-04-16 07:54:14','2025-04-16 07:54:14'),(149,54,'} else {','2025-04-16 07:54:28','2025-04-16 07:54:28'),(150,55,'const int tinggi = 7;','2025-04-16 08:02:42','2025-04-16 08:02:42'),(151,55,'const int tinggi = 7, alas = 8;','2025-04-16 08:02:47','2025-04-16 08:02:47'),(152,56,'const int alas = 8;','2025-04-16 08:02:56','2025-04-16 08:02:56'),(153,56,'const int tinggi = 7, alas = 8;','2025-04-16 08:03:01','2025-04-16 08:03:01'),(154,57,'int luas;','2025-04-16 08:03:21','2025-04-16 08:03:21'),(155,57,'int luas = tinggi * alas;','2025-04-16 08:03:26','2025-04-16 08:03:26'),(156,58,'string opsi;','2025-04-16 08:03:36','2025-04-16 08:03:36'),(157,58,'string opsi = \"Luas\";','2025-04-16 08:03:42','2025-04-16 08:03:42'),(158,59,'luas = tinggi * alas;','2025-04-16 08:04:51','2025-04-16 08:04:51'),(159,59,'int luas = tinggi * alas;','2025-04-16 08:04:57','2025-04-16 08:04:57'),(160,60,'opsi = \"Luas\";','2025-04-16 08:05:11','2025-04-16 08:05:11'),(161,60,'string opsi = \"Luas\";','2025-04-16 08:05:22','2025-04-16 08:05:22'),(162,61,'if (opsi == \"Luas\") {','2025-04-16 08:05:43','2025-04-16 08:05:43'),(163,62,'} else {','2025-04-16 08:05:54','2025-04-16 08:05:54'),(164,63,'int angka;','2025-04-16 08:11:17','2025-04-16 08:11:17'),(165,63,'int angka = 15;','2025-04-16 08:11:21','2025-04-16 08:11:21'),(166,64,'angka = 15;','2025-04-16 08:11:39','2025-04-16 08:11:39'),(167,64,'int angka = 15;','2025-04-16 08:11:47','2025-04-16 08:11:47'),(168,65,'if (angka % 3 == 0) {','2025-04-16 08:12:03','2025-04-16 08:12:03'),(169,66,'} else {','2025-04-16 08:12:15','2025-04-16 08:12:15'),(170,67,'float kilometer;','2025-04-16 08:14:48','2025-04-16 08:14:48'),(171,67,'float kilometer = 120;','2025-04-16 08:14:54','2025-04-16 08:14:54'),(172,68,'float miles;','2025-04-16 08:15:03','2025-04-16 08:15:03'),(173,68,'float miles = kilometer * 0.621371;','2025-04-16 08:15:11','2025-04-16 08:15:11'),(174,69,'string aksi;','2025-04-16 08:15:23','2025-04-16 08:15:23'),(175,69,'string aksi = \"konversi\";','2025-04-16 08:15:28','2025-04-16 08:15:28'),(176,70,'kilometer = 120;','2025-04-16 08:15:44','2025-04-16 08:15:44'),(177,70,'float kilometer = 120;','2025-04-16 08:15:49','2025-04-16 08:15:49'),(178,71,'miles = kilometer * 0.621371;','2025-04-16 08:16:00','2025-04-16 08:16:00'),(179,71,'float miles = kilometer * 0.621371;','2025-04-16 08:16:06','2025-04-16 08:16:06'),(180,72,'aksi = \"konversi\";','2025-04-16 08:16:18','2025-04-16 08:16:18'),(181,72,'string aksi = \"konversi\";','2025-04-16 08:16:24','2025-04-16 08:16:24'),(182,73,'if (aksi == \"konversi\") {','2025-04-16 08:16:40','2025-04-16 08:16:40'),(183,74,'} else {','2025-04-16 08:16:51','2025-04-16 08:16:51'),(184,75,'double usia;','2025-04-16 08:26:14','2025-04-16 08:26:14'),(185,75,'double usia = 18;','2025-04-16 08:26:27','2025-04-16 08:26:27'),(186,76,'usia = 18;','2025-04-16 08:26:51','2025-04-16 08:26:51'),(187,76,'double usia = 18;','2025-04-16 08:27:02','2025-04-16 08:27:02'),(188,77,'if (usia >= 17) {','2025-04-16 08:27:30','2025-04-16 08:27:30'),(189,78,'} else {','2025-04-16 08:27:50','2025-04-16 08:27:50'),(190,79,'int angkaPIN;','2025-04-16 08:36:24','2025-04-16 08:36:24'),(191,79,'int angkaPIN = 7890;','2025-04-16 08:36:29','2025-04-16 08:36:29'),(192,80,'angkaPIN = 7890;','2025-04-16 08:37:04','2025-04-16 08:37:04'),(193,80,'int angkaPIN = 7890;','2025-04-16 08:37:10','2025-04-16 08:37:10'),(194,81,'if (angkaPIN == 7890) {','2025-04-16 08:37:32','2025-04-16 08:37:32'),(195,82,'} else {','2025-04-16 08:37:44','2025-04-16 08:37:44'),(196,83,'char kategori;','2025-04-16 08:40:22','2025-04-16 08:40:22'),(197,83,'char kategori = \'X\';','2025-04-16 08:40:41','2025-04-16 08:40:41'),(198,84,'kategori = \'X\';','2025-04-16 08:40:58','2025-04-16 08:40:58'),(199,84,'char kategori = \'X\';','2025-04-16 08:41:09','2025-04-16 08:41:09'),(200,85,'switch (kategori) {\r\ncase \'X\':','2025-04-16 08:45:30','2025-04-16 08:45:30'),(201,86,'break;\r\ncase \'Y\':','2025-04-16 08:47:45','2025-04-16 08:47:45'),(202,86,'case \'Y\':','2025-04-16 08:48:03','2025-04-16 08:48:03'),(203,87,'break;\r\ncase \'Z\':','2025-04-16 08:48:33','2025-04-16 08:48:33'),(204,87,'case \'Z\':','2025-04-16 08:48:37','2025-04-16 08:48:37'),(205,88,'default:','2025-04-16 08:48:56','2025-04-16 08:48:56'),(206,89,'int usia;','2025-04-16 08:58:15','2025-04-16 08:58:15'),(207,89,'int usia = 30;','2025-04-16 08:58:27','2025-04-16 08:58:27'),(208,90,'usia = 30;','2025-04-16 08:58:43','2025-04-16 08:58:43'),(209,90,'int usia = 30;','2025-04-16 08:58:49','2025-04-16 08:58:49'),(210,91,'if (usia > 18) {','2025-04-16 09:04:03','2025-04-16 09:04:03'),(211,92,'} else {','2025-04-16 09:04:16','2025-04-16 09:04:16'),(212,93,'int angka;','2025-04-16 09:11:13','2025-04-16 09:11:13'),(213,93,'int angka = 12;','2025-04-16 09:11:20','2025-04-16 09:11:20'),(214,94,'angka = 12;','2025-04-16 09:11:34','2025-04-16 09:11:34'),(215,94,'int angka = 12;','2025-04-16 09:11:40','2025-04-16 09:11:40'),(216,95,'if (angka % 2 == 0) {','2025-04-16 09:11:59','2025-04-16 09:11:59'),(217,96,'} else {','2025-04-16 09:12:09','2025-04-16 09:12:09'),(218,97,'int indeks;','2025-04-16 09:41:01','2025-04-16 09:41:01'),(219,97,'int indeks, jumlah;','2025-04-16 09:41:07','2025-04-16 09:42:44'),(220,97,'int indeks = 1, jumlah = 10;','2025-04-16 09:42:53','2025-04-16 10:03:38'),(221,98,'int jumlah;','2025-04-16 09:43:08','2025-04-16 09:43:08'),(222,98,'int indeks, jumlah;','2025-04-16 09:43:14','2025-04-16 09:43:14'),(223,98,'int indeks = 1, jumlah = 10;','2025-04-16 09:43:20','2025-04-16 10:04:17'),(224,99,'indeks = 1;','2025-04-16 09:43:47','2025-04-16 09:43:47'),(225,99,'int indeks = 1;','2025-04-16 09:44:18','2025-04-16 09:45:55'),(226,99,'int indeks = 1, jumlah = 10;','2025-04-16 09:46:00','2025-04-16 10:04:53'),(227,100,'jumlah = 10;','2025-04-16 09:46:17','2025-04-16 09:46:17'),(228,100,'int jumlah = 10;','2025-04-16 09:46:27','2025-04-16 09:46:27'),(229,100,'int indeks = 1, jumlah = 10;','2025-04-16 09:46:31','2025-04-16 10:05:06'),(230,101,'for (indeks; indeks <= jumlah; indeks++) {','2025-04-16 09:49:41','2025-04-16 09:49:41'),(231,102,'cout << \"Data ke-\" << indeks;','2025-04-16 09:53:52','2025-04-16 09:53:52'),(232,102,'cout << \"Data ke-\" << indeks << endl;','2025-04-16 09:53:58','2025-04-16 09:53:58'),(233,102,'cout << \"Data ke-\" << indeks;\r\ncout << endl;','2025-04-16 09:54:31','2025-04-16 09:54:31'),(234,103,'<< endl;','2025-04-16 09:59:06','2025-04-16 09:59:06'),(235,103,'cout << endl;','2025-04-16 09:59:23','2025-04-16 09:59:23'),(236,104,'int angka;','2025-04-16 10:06:41','2025-04-16 10:06:41'),(237,104,'int angka, maksimum;','2025-04-16 10:07:11','2025-04-16 10:07:11'),(238,105,'int maksimum;','2025-04-16 10:08:16','2025-04-16 10:08:16'),(239,105,'int angka, maksimum;','2025-04-16 10:08:39','2025-04-16 10:08:39'),(240,106,'angka = 1;','2025-04-16 10:09:08','2025-04-16 10:19:30'),(241,107,'maksimum = 10;','2025-04-16 10:09:23','2025-04-16 10:19:45'),(242,104,'int angka = 1, maksimum = 10;','2025-04-16 10:20:36','2025-04-16 10:20:36'),(243,105,'int angka = 1, maksimum = 10;','2025-04-16 10:20:50','2025-04-16 10:20:50'),(244,106,'int angka = 1;','2025-04-16 10:21:25','2025-04-16 10:21:25'),(245,106,'int angka = 1, maksimum = 10;','2025-04-16 10:21:29','2025-04-16 10:21:29'),(246,107,'int maksimum = 10;','2025-04-16 10:21:47','2025-04-16 10:21:47'),(247,107,'int angka = 1, maksimum = 10;','2025-04-16 10:21:50','2025-04-16 10:21:50'),(248,108,'for (maksimum; maksimum >= angka; maksimum--) {','2025-04-16 10:23:45','2025-04-16 10:23:45'),(249,109,'cout << \"Hitungan ke-\" << maksimum;','2025-04-16 10:27:11','2025-04-16 10:27:11'),(250,109,'cout << \"Hitungan ke-\" << maksimum << endl;','2025-04-16 10:27:26','2025-04-16 10:27:26'),(251,109,'cout << \"Hitungan ke-\" << maksimum;\r\ncout << endl;','2025-04-16 10:27:36','2025-04-16 10:27:36'),(252,110,'<< endl;','2025-04-16 10:29:14','2025-04-16 10:29:14'),(253,110,'cout << endl;','2025-04-16 10:29:20','2025-04-16 10:29:20'),(254,111,'int counter;','2025-04-16 10:41:52','2025-04-16 10:41:52'),(255,111,'int counter = 1;','2025-04-16 10:41:58','2025-04-16 10:41:58'),(256,112,'counter = 1;','2025-04-16 10:42:14','2025-04-16 10:42:14'),(257,112,'int counter = 1;','2025-04-16 10:42:20','2025-04-16 10:42:20'),(258,113,'do { cout << \"Belajar C++ \" << counter;','2025-04-16 16:32:16','2025-04-16 16:32:16'),(259,113,'do { cout << \"Belajar C++ \" << counter << endl;','2025-04-16 16:32:22','2025-04-16 16:32:22'),(260,113,'do { cout << \"Belajar C++ \";\ncout << counter;','2025-04-16 16:32:31','2025-04-16 16:33:12'),(261,113,'do { cout << \"Belajar C++ \";\r\ncout << counter << endl;','2025-04-16 16:33:33','2025-04-16 16:33:33'),(262,113,'do {  cout << \"Belajar C++ \" << counter;\r\ncout << endl;','2025-04-16 16:34:56','2025-04-16 16:34:56'),(263,113,'do { cout << \"Belajar C++ \";\r\ncout << counter;\r\ncout << endl;','2025-04-16 16:36:44','2025-04-16 16:36:44'),(264,114,'<< endl;','2025-04-16 16:39:19','2025-04-16 16:39:19'),(265,114,'cout << endl;','2025-04-16 16:39:25','2025-04-16 16:39:25'),(266,115,'counter++;','2025-04-16 16:40:21','2025-04-16 16:40:21'),(267,115,'counter = counter + 1;','2025-04-16 16:40:27','2025-04-16 16:40:27'),(268,115,'counter += 1;','2025-04-16 16:40:32','2025-04-16 16:40:32'),(269,115,'++counter;','2025-04-16 16:40:38','2025-04-16 16:40:38'),(270,116,'} while (counter <= 10);','2025-04-16 16:41:06','2025-04-16 16:41:06'),(271,117,'int angka;','2025-04-16 16:43:21','2025-04-16 16:43:21'),(272,117,'int angka = 10;','2025-04-16 16:43:35','2025-04-16 16:43:35'),(273,118,'angka = 10;','2025-04-16 16:43:59','2025-04-16 16:43:59'),(274,118,'int angka = 10;','2025-04-16 16:44:07','2025-04-16 16:44:07'),(275,119,'do { cout << \"Latihan C++ \" << angka;','2025-04-16 16:45:10','2025-04-16 16:45:39'),(276,119,'do { cout << \"Latihan C++ \" << angka << endl;','2025-04-16 16:45:33','2025-04-16 16:45:33'),(277,119,'do { cout << \"Latihan C++ \";\r\ncout << angka;','2025-04-16 16:45:56','2025-04-16 16:45:56'),(278,119,'do { cout << \"Latihan C++ \";\r\ncout << angka << endl;','2025-04-16 16:46:11','2025-04-16 16:46:11'),(279,119,'do {  cout << \"Latihan C++ \" << angka;\r\ncout << endl;','2025-04-16 16:46:25','2025-04-16 16:46:25'),(280,119,'do { cout << \"Latihan C++ \";\r\ncout << angka;\r\ncout << endl;','2025-04-16 16:46:45','2025-04-16 16:46:45'),(281,120,'<< endl;','2025-04-16 16:47:16','2025-04-16 16:47:16'),(282,120,'cout << endl;','2025-04-16 16:47:25','2025-04-16 16:47:25'),(283,121,'angka--;','2025-04-16 16:47:49','2025-04-16 16:47:49'),(284,121,'angka = angka - 1;','2025-04-16 16:48:12','2025-04-16 16:48:12'),(285,121,'angka -= 1;','2025-04-16 16:48:25','2025-04-16 16:48:25'),(286,121,'--angka;','2025-04-16 16:48:37','2025-04-16 16:48:37'),(287,122,'} while (angka >= 1);','2025-04-16 16:49:14','2025-04-16 16:49:14'),(288,123,'char karakter;','2025-04-16 16:54:36','2025-04-16 16:54:36'),(289,123,'char karakter = \'A\';','2025-04-16 16:54:45','2025-04-16 16:54:45'),(290,124,'karakter = \'A\';','2025-04-16 16:55:02','2025-04-16 16:55:02'),(291,124,'char karakter = \'A\';','2025-04-16 16:55:09','2025-04-16 16:55:09'),(292,125,'for (int i = 0; i < 9; i++) {','2025-04-16 16:55:31','2025-04-16 16:55:31'),(293,125,'for (int i = 0; i <= 8; i++) {','2025-04-16 16:55:53','2025-04-16 16:55:53'),(294,125,'for (int i = 0; i < 9; ++i) {','2025-04-16 16:56:06','2025-04-16 16:56:06'),(295,125,'for (int i = 0; i <= 8; ++i) {','2025-04-16 16:56:19','2025-04-16 16:56:19'),(296,126,'cout << karakter;','2025-04-16 16:57:54','2025-04-16 16:57:54'),(297,126,'cout << karakter << endl;','2025-04-16 16:58:07','2025-04-16 16:58:07'),(298,126,'cout << karakter;\r\ncout << endl;','2025-04-16 16:58:18','2025-04-16 16:58:18'),(299,168,'karakter++;','2025-04-16 16:58:50','2025-04-16 16:58:50'),(300,168,'++karakter;','2025-04-16 16:58:57','2025-04-16 16:58:57'),(301,168,'karakter = karakter + 1;','2025-04-16 16:59:02','2025-04-16 16:59:02'),(302,168,'karakter += 1;','2025-04-16 16:59:08','2025-04-16 16:59:08'),(303,127,'int angka[3] = {10, 20, 30};','2025-04-16 23:50:58','2025-04-16 23:50:58'),(304,127,'int angka[] = {10, 20, 30};','2025-04-16 23:51:05','2025-04-16 23:51:05'),(305,127,'int angka[3]; angka[0] = 10; angka[1] = 20; angka[2] = 30;','2025-04-16 23:51:16','2025-04-16 23:51:16'),(306,128,'int i;','2025-04-16 23:51:44','2025-04-16 23:51:44'),(307,128,'int i = 0;','2025-04-16 23:51:49','2025-04-16 23:51:49'),(308,129,'i = 0;','2025-04-16 23:52:08','2025-04-16 23:52:08'),(309,129,'int i = 0;','2025-04-16 23:52:13','2025-04-16 23:52:13'),(310,130,'for (i = 0; i < 3; i++) {','2025-04-16 23:52:40','2025-04-16 23:52:40'),(311,130,'for (i; i < 3; i++) {','2025-04-16 23:52:47','2025-04-16 23:52:47'),(312,130,'for (i = 0; i < 3; ++i) {','2025-04-16 23:53:01','2025-04-16 23:53:01'),(313,130,'for (i; i < 3; ++i) {','2025-04-16 23:53:21','2025-04-16 23:53:21'),(314,130,'for (i = 0; i <= 2; i++) {','2025-04-16 23:53:32','2025-04-16 23:53:32'),(315,130,'for (i; i <= 2; i++) {','2025-04-16 23:53:40','2025-04-16 23:53:40'),(316,130,'for (i = 0; i <= 2; ++i) {','2025-04-16 23:53:47','2025-04-16 23:53:47'),(317,130,'for (i; i <= 2; ++i) {','2025-04-16 23:53:54','2025-04-16 23:53:54'),(318,131,'cout << angka[i];','2025-04-16 23:54:12','2025-04-16 23:54:12'),(319,131,'cout << angka[i] << endl;','2025-04-16 23:54:22','2025-04-16 23:54:22'),(320,131,'cout << angka[i];\r\ncout << endl;','2025-04-16 23:54:31','2025-04-16 23:54:31'),(321,132,'<< endl;','2025-04-16 23:55:01','2025-04-16 23:55:01'),(322,132,'cout << endl;','2025-04-16 23:55:08','2025-04-16 23:55:08'),(323,133,'char huruf[3] = {\'X\', \'Y\', \'Z\'};','2025-04-16 23:56:12','2025-04-16 23:56:12'),(324,133,'char huruf[] = {\'X\', \'Y\', \'Z\'};','2025-04-16 23:56:17','2025-04-16 23:56:17'),(325,133,'char huruf[3]; huruf[0] = \'X\'; huruf[1] = \'Y\'; huruf[2] = \'Z\';','2025-04-16 23:56:23','2025-04-16 23:56:23'),(326,134,'cout << huruf[2];','2025-04-16 23:58:05','2025-04-16 23:58:05'),(327,134,'cout << huruf[2] << endl;','2025-04-16 23:58:26','2025-04-16 23:58:26'),(328,134,'cout << huruf[2];\r\ncout << endl;','2025-04-16 23:58:43','2025-04-16 23:58:43'),(329,134,'cout << \"Huruf ke-2: \" << huruf[2];','2025-04-16 23:59:19','2025-04-16 23:59:19'),(330,134,'cout << \"Huruf ke-2: \" << huruf[2] << endl;','2025-04-16 23:59:32','2025-04-16 23:59:32'),(331,134,'cout << \"Huruf ke-2: \" << huruf[2];\r\ncout << endl;','2025-04-16 23:59:45','2025-04-16 23:59:45'),(332,135,'int angka[3] = {1, 2, 3};','2025-04-17 00:27:41','2025-04-17 00:27:41'),(333,135,'int angka[] = {1, 2, 3};','2025-04-17 00:27:47','2025-04-17 00:27:47'),(334,135,'int angka[3]; angka[0] = 1; angka[1] = 2; angka[2] = 3;','2025-04-17 00:27:52','2025-04-17 00:27:52'),(335,136,'int i;','2025-04-17 00:28:12','2025-04-17 00:28:12'),(336,136,'int i = 0;','2025-04-17 00:28:18','2025-04-17 00:28:18'),(337,137,'i = 0;','2025-04-17 00:28:32','2025-04-17 00:28:32'),(338,137,'int i = 0;','2025-04-17 00:28:41','2025-04-17 00:28:41'),(339,138,'angka[1] = 99;','2025-04-17 00:33:17','2025-04-17 00:33:17'),(340,139,'for (i = 0; i < 3; i++) {','2025-04-17 00:34:13','2025-04-17 00:34:13'),(341,139,'for (i; i < 3; i++) {','2025-04-17 00:34:18','2025-04-17 00:34:18'),(342,139,'for (i = 0; i < 3; ++i) {','2025-04-17 00:34:23','2025-04-17 00:34:23'),(343,139,'for (i; i < 3; ++i) {','2025-04-17 00:34:28','2025-04-17 00:34:28'),(344,139,'for (i = 0; i <= 2; i++) {','2025-04-17 00:34:35','2025-04-17 00:34:35'),(345,139,'for (i; i <= 2; i++) {','2025-04-17 00:34:41','2025-04-17 00:34:41'),(346,139,'for (i = 0; i <= 2; ++i) {','2025-04-17 00:34:45','2025-04-17 00:34:45'),(347,139,'for (i; i <= 2; ++i) {','2025-04-17 00:34:54','2025-04-17 00:34:54'),(348,140,'cout << angka[i];','2025-04-17 00:35:22','2025-04-17 00:35:22'),(349,140,'cout << angka[i] << endl;','2025-04-17 00:35:27','2025-04-17 00:35:27'),(350,140,'cout << angka[i];\r\ncout << endl;','2025-04-17 00:35:35','2025-04-17 00:35:35'),(351,141,'<< endl;','2025-04-17 00:35:52','2025-04-17 00:35:52'),(352,141,'cout << endl;','2025-04-17 00:35:56','2025-04-17 00:35:56'),(353,142,'int nilai[3] = {5, 5, 5};','2025-04-17 00:38:12','2025-04-17 00:38:12'),(354,142,'int nilai[] = {5, 5, 5};','2025-04-17 00:38:18','2025-04-17 00:38:18'),(355,142,'int nilai[3]; nilai[0] = 5; nilai[1] = 5; nilai[2] = 5;','2025-04-17 00:38:25','2025-04-17 00:38:25'),(356,143,'int total;','2025-04-17 00:38:41','2025-04-17 00:38:41'),(357,143,'int total = 0;','2025-04-17 00:38:47','2025-04-17 00:38:47'),(358,144,'total = 0;','2025-04-17 00:39:03','2025-04-17 00:39:03'),(359,144,'int total = 0;','2025-04-17 00:39:36','2025-04-17 00:39:36'),(360,145,'for (i = 0; i < 3; i++) {','2025-04-17 00:41:22','2025-04-17 00:41:22'),(361,145,'for (i; i < 3; i++) {','2025-04-17 00:41:28','2025-04-17 00:41:28'),(362,145,'for (i = 0; i < 3; ++i) {','2025-04-17 00:41:34','2025-04-17 00:41:34'),(363,145,'for (i; i < 3; ++i) {','2025-04-17 00:41:42','2025-04-17 00:41:42'),(364,145,'for (i = 0; i <= 2; i++) {','2025-04-17 00:41:50','2025-04-17 00:41:50'),(365,145,'for (i; i <= 2; i++) {','2025-04-17 00:41:56','2025-04-17 00:41:56'),(366,145,'for (i = 0; i <= 2; ++i) {','2025-04-17 00:42:00','2025-04-17 00:42:00'),(367,145,'for (i; i <= 2; ++i) {','2025-04-17 00:42:05','2025-04-17 00:42:05'),(368,146,'total = total + nilai[i];','2025-04-17 00:42:26','2025-04-17 00:42:26'),(369,146,'total += nilai[i];','2025-04-17 00:42:31','2025-04-17 00:42:31'),(370,147,'cout << total;','2025-04-17 01:17:21','2025-04-17 01:17:21'),(371,147,'cout << total << endl;','2025-04-17 01:17:27','2025-04-17 01:17:27'),(372,147,'cout << total;\r\ncout << endl;','2025-04-17 01:17:44','2025-04-17 01:17:44'),(373,147,'cout << \"Total: \" << total;','2025-04-17 01:17:53','2025-04-17 01:17:53'),(374,147,'cout << \"Total: \" << total << endl;','2025-04-17 01:18:06','2025-04-17 01:18:06'),(375,147,'cout << \"Total: \" << total;\r\ncout << endl;','2025-04-17 01:18:19','2025-04-17 01:18:19'),(376,148,'struct Node {','2025-04-17 01:19:58','2025-04-17 01:19:58'),(377,149,'int data;','2025-04-17 01:20:18','2025-04-17 01:20:18'),(378,150,'Node *next;','2025-04-17 01:20:53','2025-04-17 01:39:43'),(379,151,'Node *node1','2025-04-17 01:45:16','2025-04-17 01:45:35'),(380,152,'new Node;','2025-04-17 01:46:51','2025-04-17 01:46:51'),(381,152,'node1 = new Node;','2025-04-17 01:47:33','2025-04-17 01:47:38'),(382,153,'node1->data = 50;','2025-04-17 01:47:59','2025-04-17 01:47:59'),(383,154,'node1->next = NULL;','2025-04-17 01:48:13','2025-04-17 01:48:13'),(384,155,'cout << node1->data;','2025-04-17 01:49:02','2025-04-17 01:49:02'),(385,155,'cout << node1->data << endl;','2025-04-17 01:49:17','2025-04-17 01:49:17'),(386,155,'cout << node1->data;\r\ncout << endl;','2025-04-17 02:06:08','2025-04-17 02:06:08'),(387,155,'cout << \"Isi data node: \" << node1->data;','2025-04-17 02:06:32','2025-04-17 02:06:32'),(388,155,'cout << \"Isi data node: \" << node1->data << endl;','2025-04-17 02:06:42','2025-04-17 02:06:42'),(389,155,'cout << \"Isi data node: \" << node1->data;\r\ncout << endl;','2025-04-17 02:06:57','2025-04-17 02:06:57'),(390,156,'int jumlahSiswa;','2025-04-17 02:24:06','2025-04-17 02:24:06'),(391,156,'int jumlahSiswa = 5;','2025-04-17 02:24:15','2025-04-17 02:24:15'),(392,157,'int nilai[5] = {70, 85, 60, 90, 75};','2025-04-17 02:24:35','2025-04-17 02:26:43'),(393,157,'int nilai[5]; nilai[0] = 70; nilai[1] = 85; nilai[2] = 60; nilai[3] = 90; nilai[4] = 75;','2025-04-17 02:24:43','2025-04-17 02:26:53'),(394,157,'int nilai[5];','2025-04-17 02:25:46','2025-04-17 02:27:01'),(395,158,'int total = 0;\r\nint rataRata;','2025-04-17 02:29:45','2025-04-17 02:29:45'),(396,159,'string lulus;\r\nchar peringkat;','2025-04-17 02:30:22','2025-04-17 02:30:22'),(397,159,'char peringkat;\r\nstring lulus;','2025-04-17 02:30:38','2025-04-17 02:30:38'),(398,158,'int total;\r\ntotal = 0;\r\nint rataRata;','2025-04-17 02:31:10','2025-04-17 02:31:10'),(399,158,'int total, rataRata;\r\ntotal = 0;','2025-04-17 02:31:32','2025-04-17 02:31:32'),(400,160,'for (int i = 0; i < jumlahSiswa; i++) {\r\n    total += nilai[i];','2025-04-17 04:10:13','2025-04-17 04:10:13'),(401,160,'for (int i = 0; i < jumlahSiswa; ++i) {\r\n    total += nilai[i];','2025-04-17 04:10:28','2025-04-17 04:10:28'),(402,160,'for (int i = 0; i < jumlahSiswa; i++) {\r\n    total = total + nilai[i];','2025-04-17 04:11:05','2025-04-17 04:11:05'),(403,160,'for (int i = 0; i < jumlahSiswa; ++i) {\r\n    total = total + nilai[i];','2025-04-17 04:11:34','2025-04-17 04:11:34'),(404,161,'rataRata = total / jumlahSiswa;','2025-04-17 04:12:06','2025-04-17 04:12:15'),(405,161,'rataRata = (total / jumlahSiswa);','2025-04-17 04:12:19','2025-04-17 04:12:19'),(406,162,'if (rataRata >= 75) {\n	lulus = \"YA\";\n	peringkat = \'A\';','2025-04-17 04:12:48','2025-04-17 04:14:42'),(407,163,'} else {\n    lulus = \"TIDAK\";\n    peringkat = \'B\';','2025-04-17 04:13:07','2025-04-17 04:15:55'),(408,162,'if (rataRata >= 75) {\n    lulus = \"YA\";\n    peringkat = \'A\';\n}','2025-04-17 04:13:29','2025-04-17 04:15:20'),(409,163,'} else {\r\n    lulus = \"TIDAK\";\r\n    peringkat = \'B\';\r\n}','2025-04-17 04:16:04','2025-04-17 04:16:04'),(410,162,'if (rataRata >= 75)\r\n    lulus = \"YA\", peringkat = \'A\';','2025-04-17 04:16:54','2025-04-17 04:16:54'),(411,163,'else\r\n    lulus = \"TIDAK\", peringkat = \'B\';','2025-04-17 04:17:11','2025-04-17 04:17:11'),(412,164,'cout << nilai[i];','2025-04-17 04:18:49','2025-04-17 04:18:49'),(413,164,'cout << nilai[i] << endl;','2025-04-17 04:19:11','2025-04-17 04:19:11'),(414,164,'cout << nilai[i];\r\ncout << endl;','2025-04-17 04:19:27','2025-04-17 04:19:27'),(415,164,'cout << nilai[i] << \" \";','2025-04-17 04:19:49','2025-04-17 04:19:49'),(416,164,'cout << nilai[i];\r\ncout << \" \";','2025-04-17 04:20:01','2025-04-17 04:20:01'),(417,164,'cout << nilai[i] << \" \" << endl;','2025-04-17 04:23:15','2025-04-17 04:23:15'),(418,164,'cout << nilai[i] << \" \";\r\ncout << endl;','2025-04-17 04:23:35','2025-04-17 04:23:35'),(419,164,'cout << nilai[i];\r\ncout << \" \" << endl;','2025-04-17 04:23:56','2025-04-17 04:23:56'),(420,164,'cout << nilai[i];\r\ncout << \" \";\r\ncout << endl;','2025-04-17 04:24:06','2025-04-17 04:24:06'),(421,165,'cout << \"Total Nilai: \" << total;\ncout << \"Rata-rata: \" << rataRata;','2025-04-17 04:26:48','2025-04-17 04:27:54'),(422,165,'cout << \"Total Nilai: \" << total << endl;\ncout << \"Rata-rata: \" << rataRata << endl;','2025-04-17 04:26:57','2025-04-17 04:28:07'),(423,165,'cout << \"Total Nilai: \" << total;\ncout << endl;\ncout << \"Rata-rata: \" << rataRata;\ncout << endl;','2025-04-17 04:27:04','2025-04-17 04:28:44'),(424,165,'cout << \"Total Nilai: \";\r\ncout << total;\r\ncout << \"Rata-rata: \";\r\ncout << rataRata;','2025-04-17 04:29:29','2025-04-17 04:29:29'),(425,165,'cout << \"Total Nilai: \";\r\ncout << total << endl;\r\ncout << \"Rata-rata: \";\r\ncout << rataRata << endl;','2025-04-17 04:29:55','2025-04-17 04:29:55'),(426,165,'cout << \"Total Nilai: \";\r\ncout << total;\r\ncout << endl;\r\ncout << \"Rata-rata: \";\r\ncout << rataRata;\r\ncout << endl;','2025-04-17 04:30:11','2025-04-17 04:30:11'),(427,166,'cout << \"Lulus: \" << lulus;','2025-04-17 04:30:59','2025-04-17 04:30:59'),(428,166,'cout << \"Lulus: \" << lulus << endl;','2025-04-17 04:31:04','2025-04-17 04:31:04'),(429,166,'cout << \"Lulus: \" << lulus;\r\ncout << endl;','2025-04-17 04:31:16','2025-04-17 04:31:16'),(430,166,'cout << \"Lulus: \";\r\ncout << lulus;','2025-04-17 04:31:31','2025-04-17 04:31:31'),(431,166,'cout << \"Lulus: \";\ncout << lulus << endl;','2025-04-17 04:31:51','2025-04-17 04:32:07'),(432,166,'cout << \"Lulus: \";\r\ncout << lulus;\r\ncout << endl;','2025-04-17 04:32:18','2025-04-17 04:32:18'),(433,167,'cout << \"Peringkat: \" << peringkat;','2025-04-17 04:33:17','2025-04-17 04:33:17'),(434,167,'cout << \"Peringkat: \" << peringkat << endl;','2025-04-17 04:33:21','2025-04-17 04:33:21'),(435,167,'cout << \"Peringkat: \" << peringkat;\r\ncout << endl;','2025-04-17 04:33:30','2025-04-17 04:33:30'),(436,167,'cout << \"Peringkat: \";\r\ncout << peringkat;','2025-04-17 04:33:50','2025-04-17 04:33:50'),(437,167,'cout << \"Peringkat: \";\r\ncout << peringkat << endl;','2025-04-17 04:34:01','2025-04-17 04:34:01'),(438,167,'cout << \"Peringkat: \";\r\ncout << peringkat;\r\ncout << endl;','2025-04-17 04:34:11','2025-04-17 04:34:11');
/*!40000 ALTER TABLE `first_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keys`
--

DROP TABLE IF EXISTS `keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `keys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `answer_id` bigint unsigned NOT NULL,
  `detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `keys_answer_id_foreign` (`answer_id`),
  CONSTRAINT `keys_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keys`
--

LOCK TABLES `keys` WRITE;
/*!40000 ALTER TABLE `keys` DISABLE KEYS */;
/*!40000 ALTER TABLE `keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_05_21_080242_create_permission_tables',1),(6,'2022_05_21_091559_create_clas_table',1),(7,'2022_05_21_092750_add_class_id_to_users',1),(8,'2022_05_26_032453_create_competencies_table',1),(9,'2022_05_26_034607_create_progress_table',1),(10,'2022_05_28_072316_create_questions_table',1),(11,'2022_05_28_072803_create_answers_table',1),(12,'2022_05_28_073051_create_keys_table',1),(13,'2022_06_01_040256_create_results_table',1),(14,'2022_06_01_041652_create_result_details_table',1),(15,'2022_06_02_035929_create_result_detail_answers_table',1),(16,'2022_06_02_042853_add_score_to_answers',1),(17,'2022_06_07_060809_add_correct_to_result_detail_answers',1),(18,'2022_06_08_001539_add_timeup_to_result_details',1),(19,'2022_06_11_234823_add_input_to_questions',1),(20,'2022_06_13_092832_add_success_to_result_details',1),(21,'2022_06_14_010341_add_subject_to_competencies',1),(22,'2022_09_02_020306_add_attempt_to_results',1),(23,'2022_09_12_105513_create_descriptions_table',1),(24,'2022_09_12_105837_create_first_answers_table',1),(25,'2022_09_12_105847_create_second_answers_table',1),(26,'2022_09_12_105903_create_third_answers_table',1),(27,'2022_09_12_105916_create_first_keys_table',1),(28,'2022_09_12_105925_create_second_keys_table',1),(29,'2022_09_12_105931_create_third_keys_table',1),(30,'2022_09_12_110005_create_result_descriptions_table',1),(31,'2022_09_12_110148_create_rd_first_answers_table',1),(32,'2022_09_12_110156_create_rd_second_answers_table',1),(33,'2022_09_12_110205_create_rd_third_answers_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `progress`
--

DROP TABLE IF EXISTS `progress`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `progress` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `competency_id` bigint unsigned NOT NULL,
  `status` enum('unlock','passed','lock') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'lock',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `progress_user_id_foreign` (`user_id`),
  KEY `progress_competency_id_foreign` (`competency_id`),
  CONSTRAINT `progress_competency_id_foreign` FOREIGN KEY (`competency_id`) REFERENCES `competencies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `progress_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `progress`
--

LOCK TABLES `progress` WRITE;
/*!40000 ALTER TABLE `progress` DISABLE KEYS */;
INSERT INTO `progress` VALUES (1,2,1,'passed','2025-04-15 13:51:30','2025-04-17 08:24:49'),(2,2,2,'passed','2025-04-15 13:51:30','2025-04-19 01:56:43'),(3,2,3,'unlock','2025-04-15 13:51:30','2025-04-19 01:56:43'),(4,2,4,'lock','2025-04-15 13:51:30','2025-04-15 13:51:30'),(5,2,5,'lock','2025-04-15 13:51:30','2025-04-15 13:51:30'),(6,2,6,'lock','2025-04-15 13:51:30','2025-04-15 13:51:30');
/*!40000 ALTER TABLE `progress` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `competency_id` bigint unsigned NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` json NOT NULL,
  `output` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int NOT NULL DEFAULT '20',
  `input` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_competency_id_foreign` (`competency_id`),
  CONSTRAINT `questions_competency_id_foreign` FOREIGN KEY (`competency_id`) REFERENCES `competencies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,1,'<p>Buatlah program!</p>','[\"1520798055.png\"]','Nilai x = 45\r\nNilai y = 15\r\nNilai rata = 30',15,0,'2025-04-15 13:57:17','2025-04-15 13:57:51'),(2,1,'<p>Buatlah program!</p>','[\"1768627324.png\"]','Nama Siswa = Rina Safitri\r\nUsia = 20\r\nJenis Kelamin = WANITA',15,0,'2025-04-15 14:00:28','2025-04-15 14:00:28'),(3,1,'<p>Buatlah program dengan tahapan di bawah ini!</p>','[\"155335523.png\"]','Nilai a = 12\r\nNilai b = 20\r\nNilai c = 40',15,0,'2025-04-15 14:03:03','2025-04-15 14:03:03'),(4,1,'<p>Buatlah program dengan tahapan di bawah ini!</p>','[\"1877499390.png\"]','Umur kamu 18\r\nSudah boleh mengikuti ujian akhir',15,0,'2025-04-15 14:04:43','2025-04-15 14:04:43'),(5,1,'<p>Buatlah program dengan tahapan di bawah ini!</p>','[\"363970.png\"]','Kode akses benar',15,0,'2025-04-15 14:06:24','2025-04-15 14:06:24'),(6,2,'<p>Buatlah program dengan tahapan di bawah ini!</p>','[\"1841088182.png\"]','Panjang = 8\r\nLebar = 5\r\nLuas = 40',15,0,'2025-04-15 14:08:37','2025-04-15 14:08:37'),(7,2,'<p>Buatlah program dengan tahapan di bawah ini!</p>','[\"701110463.png\"]','Tinggi = 3\r\nDasar = 7',15,0,'2025-04-15 14:11:09','2025-04-15 14:11:09'),(8,2,'<p>Buatlah program!</p>','[\"1189417884.png\"]','Tinggi = 7\r\nAlas = 8\r\nLuas = 56',15,0,'2025-04-15 14:14:52','2025-04-15 14:14:52'),(9,2,'<p>Buatlah program!</p>','[\"1312658629.png\"]','15 adalah kelipatan 3',15,0,'2025-04-15 14:18:17','2025-04-15 14:18:17'),(10,2,'<p>Buatlah program!</p>','[\"203136706.png\"]','Kilometer = 120\r\nMiles = 74.5645',15,0,'2025-04-15 14:20:14','2025-04-15 14:20:14'),(11,3,'<p>Buatlah program percabangan menggunakan IF untuk menentukan kriteria usia pendaftaran dengan ketentuan sebagai berikut!</p>','[\"915205769.png\"]','Memenuhi syarat pendaftaran',15,0,'2025-04-15 14:22:41','2025-04-15 14:22:41'),(12,3,'<p>Buatlah program percabangan menggunakan IF dengan tahapan sebagai berikut!</p>','[\"1817942999.png\"]','PIN benar',15,0,'2025-04-15 14:24:27','2025-04-15 14:24:27'),(13,3,'<p>Buatlah program percabangan menggunakan SWITCH-CASE dengan ketentuan sebagai berikut!</p>','[\"1098204523.png\"]','Kategori sangat penting',15,0,'2025-04-15 14:25:48','2025-04-15 14:25:48'),(14,3,'<p>Buatlah program percabangan bersarang menggunakan IF untuk menentukan status keanggotaan berdasarkan usia dengan ketentuan sebagai berikut!</p>','[\"511168154.png\"]','Dewasa.',15,0,'2025-04-15 14:27:28','2025-04-15 14:27:28'),(15,3,'<p>Buatlah program percabangan menggunakan IF untuk menentukan apakah suatu bilangan ganjil atau genap dengan ketentuan sebagai berikut!</p>','[\"2037948519.png\"]','Bilangan genap',15,0,'2025-04-15 14:28:59','2025-04-15 14:28:59'),(16,4,'<p>Buatlah program perulangan menggunakan FOR untuk menampilkan tulisan &ldquo;Data ke-1&rdquo; menaik (increment) hingga menampilkan tulisan &ldquo;Data ke-10&rdquo; dengan ketentuan sebagai berikut!</p>','[\"1716841263.png\"]','Data ke-1\r\nData ke-2\r\nData ke-3\r\nData ke-4\r\nData ke-5\r\nData ke-6\r\nData ke-7\r\nData ke-8\r\nData ke-9\r\nData ke-10',15,0,'2025-04-15 14:30:47','2025-04-15 14:30:47'),(17,4,'<p>Buatlah program perulangan menggunakan FOR untuk menampilkan tulisan &ldquo;Hitungan ke-10&rdquo; menurun (decrement) hingga menampilkan tulisan &ldquo;Hitungan ke-1&rdquo; dengan ketentuan sebagai berikut!</p>','[\"1166858882.png\"]','Hitungan ke-10\r\nHitungan ke-9\r\nHitungan ke-8\r\nHitungan ke-7\r\nHitungan ke-6\r\nHitungan ke-5\r\nHitungan ke-4\r\nHitungan ke-3\r\nHitungan ke-2\r\nHitungan ke-1',15,0,'2025-04-15 14:32:22','2025-04-15 14:32:22'),(18,4,'<p>Buatlah program perulangan menggunakan do-while untuk menampilkan tulisan &ldquo;Belajar C++ 1&rdquo; menaik (increment) hingga menampilkan tulisan &ldquo;Belajar C++ 10&rdquo; dengan ketentuan sebagai berikut!</p>','[\"1941769478.png\"]','Belajar C++ 1\r\nBelajar C++ 2\r\nBelajar C++ 3\r\nBelajar C++ 4\r\nBelajar C++ 5\r\nBelajar C++ 6\r\nBelajar C++ 7\r\nBelajar C++ 8\r\nBelajar C++ 9\r\nBelajar C++ 10',15,0,'2025-04-15 14:33:54','2025-04-15 14:33:54'),(19,4,'<p>Buatlah program perulangan menggunakan do-while untuk menampilkan tulisan &ldquo;Latihan C++ 10&rdquo; menurun (decrement) hingga menampilkan tulisan &ldquo;Latihan C++ 1&rdquo; dengan ketentuan sebagai berikut!</p>','[\"1224679657.png\"]','Latihan C++ 10\r\nLatihan C++ 9\r\nLatihan C++ 8\r\nLatihan C++ 7\r\nLatihan C++ 6\r\nLatihan C++ 5\r\nLatihan C++ 4\r\nLatihan C++ 3\r\nLatihan C++ 2\r\nLatihan C++ 1',15,0,'2025-04-15 14:35:22','2025-04-15 14:35:22'),(20,4,'<p>Buatlah program perulangan menggunakan <strong>FOR</strong> untuk menampilkan <strong>huruf A hingga I</strong> sesuai output di bawah dengan ketentuan sebagai berikut!</p>','[\"880780692.png\"]','ABCDEFGHI',15,0,'2025-04-15 14:37:53','2025-04-15 14:38:08'),(21,5,'<p>Buatlah program untuk menampilkan semua isi array!</p>','[\"1501958399.png\"]','10\r\n20\r\n30',15,0,'2025-04-15 14:40:26','2025-04-15 14:40:26'),(22,5,'<p>Buatlah program untuk menampilkan elemen tertentu dari array!</p>','[\"1494353335.png\"]','Huruf ke-2: Z',15,0,'2025-04-15 14:42:30','2025-04-15 14:42:30'),(23,5,'<p>Buatlah program untuk mengubah nilai dalam array dan menampilkannya!</p>','[\"1368094964.png\"]','1\r\n99\r\n3',15,0,'2025-04-15 14:43:37','2025-04-15 14:43:37'),(24,5,'<p>Buatlah program untuk menghitung total semua nilai dalam array!</p>','[\"1408364182.png\"]','Total: 15',15,0,'2025-04-15 14:44:49','2025-04-15 14:44:49'),(25,5,'<p>Buatlah program untuk membuat 1 node pada linked list dan menampilkan isinya!</p>','[\"1869833079.png\"]','Isi data node: 50',15,0,'2025-04-15 14:46:25','2025-04-15 14:46:25'),(26,6,'<p>Buatlah sebuah program C++ Sistem Penilaian dan Evaluasi Hasil Belajar Siswa</p>','[\"1701319582.png\"]','Daftar Nilai Siswa:\r\n70 85 60 90 75 \r\nTotal Nilai: 380\r\nRata-rata: 76\r\nLulus: YA\r\nPeringkat: A',15,0,'2025-04-15 14:55:30','2025-04-15 14:55:30');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rd_first_answers`
--

DROP TABLE IF EXISTS `rd_first_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rd_first_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `result_description_id` bigint unsigned NOT NULL,
  `first_answer_id` bigint unsigned NOT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rd_first_answers_result_description_id_foreign` (`result_description_id`),
  KEY `rd_first_answers_first_answer_id_foreign` (`first_answer_id`),
  CONSTRAINT `rd_first_answers_first_answer_id_foreign` FOREIGN KEY (`first_answer_id`) REFERENCES `first_answers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rd_first_answers_result_description_id_foreign` FOREIGN KEY (`result_description_id`) REFERENCES `result_descriptions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rd_first_answers`
--

LOCK TABLES `rd_first_answers` WRITE;
/*!40000 ALTER TABLE `rd_first_answers` DISABLE KEYS */;
INSERT INTO `rd_first_answers` VALUES (93,41,29,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(94,42,30,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(95,43,31,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(96,43,32,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(97,44,11,0,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(98,44,12,0,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(99,44,13,0,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(100,45,14,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(101,45,15,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(102,45,16,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(103,46,17,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(104,46,18,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(105,47,19,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(106,47,20,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(107,48,63,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(108,49,64,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(109,50,65,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(110,50,66,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(111,51,37,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(112,51,38,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(113,51,39,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(114,51,40,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(115,52,41,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(116,52,42,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(117,52,43,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(118,52,44,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(119,53,45,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(120,53,46,1,'2025-04-19 01:56:43','2025-04-19 01:56:43');
/*!40000 ALTER TABLE `rd_first_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rd_second_answers`
--

DROP TABLE IF EXISTS `rd_second_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rd_second_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rdfirst_answer_id` bigint unsigned NOT NULL,
  `second_answer_id` bigint unsigned NOT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rd_second_answers_rdfirst_answer_id_foreign` (`rdfirst_answer_id`),
  KEY `rd_second_answers_second_answer_id_foreign` (`second_answer_id`),
  CONSTRAINT `rd_second_answers_rdfirst_answer_id_foreign` FOREIGN KEY (`rdfirst_answer_id`) REFERENCES `rd_first_answers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rd_second_answers_second_answer_id_foreign` FOREIGN KEY (`second_answer_id`) REFERENCES `second_answers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rd_second_answers`
--

LOCK TABLES `rd_second_answers` WRITE;
/*!40000 ALTER TABLE `rd_second_answers` DISABLE KEYS */;
INSERT INTO `rd_second_answers` VALUES (51,95,12,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(52,95,13,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(53,96,14,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(54,96,15,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(55,105,6,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(56,106,7,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(57,109,33,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(58,110,34,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(59,119,18,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(60,119,19,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(61,119,20,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(62,120,21,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(63,120,22,1,'2025-04-19 01:56:43','2025-04-19 01:56:43');
/*!40000 ALTER TABLE `rd_second_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rd_third_answers`
--

DROP TABLE IF EXISTS `rd_third_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rd_third_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `rdsecond_answer_id` bigint unsigned NOT NULL,
  `third_answer_id` bigint unsigned NOT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rd_third_answers_rdsecond_answer_id_foreign` (`rdsecond_answer_id`),
  KEY `rd_third_answers_third_answer_id_foreign` (`third_answer_id`),
  CONSTRAINT `rd_third_answers_rdsecond_answer_id_foreign` FOREIGN KEY (`rdsecond_answer_id`) REFERENCES `rd_second_answers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `rd_third_answers_third_answer_id_foreign` FOREIGN KEY (`third_answer_id`) REFERENCES `third_answers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rd_third_answers`
--

LOCK TABLES `rd_third_answers` WRITE;
/*!40000 ALTER TABLE `rd_third_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `rd_third_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result_descriptions`
--

DROP TABLE IF EXISTS `result_descriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `result_descriptions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `result_detail_id` bigint unsigned NOT NULL,
  `description_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `result_descriptions_result_detail_id_foreign` (`result_detail_id`),
  KEY `result_descriptions_description_id_foreign` (`description_id`),
  CONSTRAINT `result_descriptions_description_id_foreign` FOREIGN KEY (`description_id`) REFERENCES `descriptions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `result_descriptions_result_detail_id_foreign` FOREIGN KEY (`result_detail_id`) REFERENCES `result_details` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result_descriptions`
--

LOCK TABLES `result_descriptions` WRITE;
/*!40000 ALTER TABLE `result_descriptions` DISABLE KEYS */;
INSERT INTO `result_descriptions` VALUES (41,13,11,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(42,13,12,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(43,13,13,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(44,14,4,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(45,14,5,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(46,14,6,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(47,14,7,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(48,15,28,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(49,15,29,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(50,15,30,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(51,16,17,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(52,16,18,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(53,16,19,'2025-04-19 01:56:43','2025-04-19 01:56:43');
/*!40000 ALTER TABLE `result_descriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result_detail_answers`
--

DROP TABLE IF EXISTS `result_detail_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `result_detail_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `result_detail_id` bigint unsigned NOT NULL,
  `answer_id` bigint unsigned NOT NULL,
  `correct` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `result_detail_answers_result_detail_id_foreign` (`result_detail_id`),
  KEY `result_detail_answers_answer_id_foreign` (`answer_id`),
  CONSTRAINT `result_detail_answers_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `result_detail_answers_result_detail_id_foreign` FOREIGN KEY (`result_detail_id`) REFERENCES `result_details` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result_detail_answers`
--

LOCK TABLES `result_detail_answers` WRITE;
/*!40000 ALTER TABLE `result_detail_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `result_detail_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `result_details`
--

DROP TABLE IF EXISTS `result_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `result_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `result_id` bigint unsigned NOT NULL,
  `question_id` bigint unsigned NOT NULL,
  `answer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `output` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_output_match` tinyint(1) DEFAULT NULL,
  `score` int NOT NULL DEFAULT '0',
  `timeup` int NOT NULL,
  `is_timeup` tinyint(1) NOT NULL,
  `is_success` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `result_details_result_id_foreign` (`result_id`),
  KEY `result_details_question_id_foreign` (`question_id`),
  CONSTRAINT `result_details_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `result_details_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `result_details`
--

LOCK TABLES `result_details` WRITE;
/*!40000 ALTER TABLE `result_details` DISABLE KEYS */;
INSERT INTO `result_details` VALUES (13,7,4,'#include <iostream>\nusing namespace std;\n\nint main() {\n    int umur = 18;\n\n    if (umur >= 17) {\n        cout << \"Umur kamu \" << umur << endl;\n        cout << \"Sudah boleh mengikuti ujian akhir\" << endl;\n    } else {\n        cout << \"Umur kamu \" << umur << endl;\n        cout << \"Belum memenuhi syarat untuk ujian akhir\" << endl;\n    }\n\n    return 0;\n}','Umur kamu 18\nSudah boleh mengikuti ujian akhir',1,100,60,1,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(14,7,2,'#include <iostream>\n#include <string>\nusing namespace std;\n\nint main() {\n    string nama_siswa = \"Rina Safitri\";\n    int usia = 20;\n    char kelamin = \'P\';\n\n    cout << \"Nama Siswa = \" << nama_siswa << endl;\n    cout << \"Usia = \" << usia << endl;\n\n    if (kelamin == \'P\') {\n        cout << \"Jenis Kelamin = WANITA\" << endl;\n    } else {\n        cout << \"Jenis Kelamin = LAKI-LAKI\" << endl;\n    }\n\n    return 0;\n}','Nama Siswa = Rina Safitri\nUsia = 20\nJenis Kelamin = WANITA',1,85,27,0,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(15,8,9,'#include <iostream>\nusing namespace std;\n\nint main() {\n    int angka = 15;\n\n    if (angka % 3 == 0) {\n        cout << angka << \" adalah kelipatan 3\" << endl;\n    } else {\n        cout << angka << \" bukan kelipatan 3\" << endl;\n    }\n\n    return 0;\n}','15 adalah kelipatan 3',1,100,44,0,1,'2025-04-19 01:56:43','2025-04-19 01:56:43'),(16,8,6,'#include <iostream>\nusing namespace std;\n\nint main() {\n    int panjang = 8;\n    int lebar = 5;\n    double luas = panjang * lebar;\n    string jenis = \"persegi panjang\";\n\n    if (jenis == \"persegi panjang\") {\n        cout << \"Panjang = \" << panjang << endl;\n        cout << \"Lebar = \" << lebar << endl;\n        cout << \"Luas = \" << luas << endl;\n    } else {\n        cout << \"Panjang = \" << panjang << endl;\n        cout << \"Lebar = \" << lebar << endl;\n    }\n\n    return 0;\n}','Panjang = 8\nLebar = 5\nLuas = 40',1,100,66,0,1,'2025-04-19 01:56:43','2025-04-19 01:56:43');
/*!40000 ALTER TABLE `result_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `results` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `competency_id` bigint unsigned NOT NULL,
  `score` int NOT NULL DEFAULT '0',
  `real_score` int NOT NULL DEFAULT '0',
  `trial_reduction` int NOT NULL DEFAULT '0',
  `passed` tinyint(1) NOT NULL DEFAULT '0',
  `attempt` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `results_user_id_foreign` (`user_id`),
  KEY `results_competency_id_foreign` (`competency_id`),
  CONSTRAINT `results_competency_id_foreign` FOREIGN KEY (`competency_id`) REFERENCES `competencies` (`id`) ON DELETE CASCADE,
  CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (7,2,1,93,93,0,1,1,'2025-04-17 08:24:49','2025-04-17 08:24:49'),(8,2,2,100,100,0,1,1,'2025-04-19 01:56:43','2025-04-19 01:56:43');
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'teacher','web','2025-04-15 13:51:30','2025-04-15 13:51:30'),(2,'student','web','2025-04-15 13:51:30','2025-04-15 13:51:30');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `second_answers`
--

DROP TABLE IF EXISTS `second_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `second_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_answer_id` bigint unsigned NOT NULL,
  `detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int NOT NULL DEFAULT '0',
  `nested` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `second_answers_first_answer_id_foreign` (`first_answer_id`),
  CONSTRAINT `second_answers_first_answer_id_foreign` FOREIGN KEY (`first_answer_id`) REFERENCES `first_answers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `second_answers`
--

LOCK TABLES `second_answers` WRITE;
/*!40000 ALTER TABLE `second_answers` DISABLE KEYS */;
INSERT INTO `second_answers` VALUES (1,9,'nilai dari variabel x',5,0,'2025-04-15 15:53:17','2025-04-15 15:53:17'),(2,9,'nilai dari variabel y',5,0,'2025-04-15 15:53:24','2025-04-15 15:53:24'),(3,9,'nilai dari variabel rata',5,0,'2025-04-15 15:53:32','2025-04-15 15:53:32'),(4,10,'nilai dari variabel x',5,0,'2025-04-15 15:54:17','2025-04-15 15:54:17'),(5,10,'nilai dari variabel y',5,0,'2025-04-15 15:54:24','2025-04-15 15:54:24'),(6,19,'maka tampilkan: Jenis Kelamin = WANITA',7,0,'2025-04-15 16:05:49','2025-04-15 16:05:49'),(7,20,'maka tampilkan: Jenis Kelamin = LAKI-LAKI',7,0,'2025-04-15 16:06:32','2025-04-15 16:06:32'),(8,27,'nilai dari a',7,0,'2025-04-15 16:16:07','2025-04-15 16:16:07'),(9,27,'nilai dari b',7,0,'2025-04-15 16:16:13','2025-04-15 16:16:13'),(10,27,'nilai dari c',7,0,'2025-04-15 16:16:28','2025-04-15 16:16:28'),(11,28,'\"Variabel a tidak bernilai 12\"',7,0,'2025-04-15 16:17:24','2025-04-15 16:17:24'),(12,31,'\"Umur kamu \" diikuti dengan nilai variabel umur',5,0,'2025-04-15 16:22:39','2025-04-15 16:22:39'),(13,31,'\"Sudah boleh mengikuti ujian akhir\"',5,0,'2025-04-15 16:23:08','2025-04-15 16:23:08'),(14,32,'\"Umur kamu \" diikuti dengan nilai variabel umur',5,0,'2025-04-15 16:23:47','2025-04-15 16:23:47'),(15,32,'\"Belum memenuhi syarat untuk ujian akhir\"',5,0,'2025-04-15 16:24:03','2025-04-15 16:24:03'),(16,35,'\"Kode akses benar\"',10,0,'2025-04-15 16:29:53','2025-04-15 16:29:53'),(17,36,'\"Kode akses salah\"',10,0,'2025-04-15 16:30:25','2025-04-15 16:30:25'),(18,45,'nilai dari variabel panjang',5,0,'2025-04-15 16:43:31','2025-04-15 16:43:31'),(19,45,'nilai dari variabel lebar',5,0,'2025-04-15 16:43:42','2025-04-15 16:43:42'),(20,45,'nilai dari variabel luas',5,0,'2025-04-15 16:43:58','2025-04-15 16:43:58'),(21,46,'nilai dari variabel panjang',5,0,'2025-04-15 16:45:44','2025-04-15 16:45:44'),(22,46,'nilai dari variabel lebar',5,0,'2025-04-15 16:45:55','2025-04-15 16:45:55'),(23,53,'nilai dari tinggi',7,0,'2025-04-15 16:55:09','2025-04-15 16:55:09'),(24,53,'nilai dari dasar',7,0,'2025-04-15 16:55:21','2025-04-15 16:55:21'),(25,53,'nilai dari nilai_akhir (hasil perkalian tinggi dan dasar)',7,0,'2025-04-15 16:55:45','2025-04-15 16:55:45'),(26,54,'nilai dari tinggi',7,0,'2025-04-15 16:56:11','2025-04-15 16:56:11'),(27,54,'nilai dari dasar',7,0,'2025-04-15 16:56:22','2025-04-15 16:56:22'),(28,61,'nilai dari tinggi',7,0,'2025-04-15 20:17:21','2025-04-15 20:17:21'),(29,61,'nilai dari alas',7,0,'2025-04-15 20:17:31','2025-04-15 20:17:44'),(30,61,'nilai dari luas (hasil perkalian tinggi dan alas)',7,0,'2025-04-15 20:17:58','2025-04-15 20:17:58'),(31,62,'nilai dari tinggi',7,0,'2025-04-15 20:18:32','2025-04-15 20:18:32'),(32,62,'nilai dari alas',7,0,'2025-04-15 20:18:39','2025-04-15 20:18:39'),(33,65,'pada output tampilkan nilai dari variabel angka + \" adalah kelipatan 3\"',10,0,'2025-04-15 20:27:30','2025-04-15 20:27:30'),(34,66,'pada output tampilkan nilai dari variabel angka + \" bukan kelipatan 3\"',10,0,'2025-04-15 20:27:59','2025-04-15 20:27:59'),(35,73,'Nilai dari variabel kilometer',10,0,'2025-04-15 20:33:49','2025-04-15 20:33:49'),(36,73,'Nilai dari variabel miles',10,0,'2025-04-15 20:33:58','2025-04-15 20:33:58'),(37,74,'\"Hanya menghitung konversi\"',10,0,'2025-04-15 20:34:19','2025-04-15 20:34:19'),(38,77,'Menghasilkan pernyataan berupa output: \"Memenuhi syarat pendaftaran\"',15,0,'2025-04-15 20:39:08','2025-04-15 20:39:08'),(39,78,'Menghasilkan pernyataan output: \"Belum memenuhi syarat\"',15,0,'2025-04-15 20:39:29','2025-04-15 20:39:29'),(40,81,'menghasilkan pernyataan berupa output \"PIN benar\"',15,0,'2025-04-15 20:46:07','2025-04-15 20:46:07'),(41,82,'menghasilkan pernyataan output \"PIN salah\"',15,0,'2025-04-15 20:46:32','2025-04-15 20:46:32'),(42,85,'Menghasilkan pernyataan berupa output \"Kategori sangat penting\"',10,0,'2025-04-15 20:58:52','2025-04-15 20:58:52'),(43,86,'Menghasilkan pernyataan berupa output \"Kategori penting\"',10,0,'2025-04-15 20:59:27','2025-04-15 20:59:27'),(44,87,'Menghasilkan pernyataan berupa output \"Kategori biasa\"',10,0,'2025-04-15 20:59:47','2025-04-15 20:59:47'),(45,88,'Menghasilkan pernyataan output \"Kategori tidak dikenal\"',10,0,'2025-04-15 21:00:05','2025-04-15 21:00:05'),(46,91,'Menghasilkan pernyataan berupa output \"Dewasa. \"',8,0,'2025-04-15 21:05:38','2025-04-15 21:05:38'),(47,91,'Kondisi selanjutnya, jika usia >= 60, maka:',13,1,'2025-04-15 21:05:56','2025-04-15 21:05:56'),(48,92,'Menghasilkan pernyataan output \"Anak-anak atau Remaja\"',11,0,'2025-04-15 21:06:56','2025-04-15 21:06:56'),(49,95,'Menghasilkan pernyataan berupa output \"Bilangan genap\"',15,0,'2025-04-15 21:30:05','2025-04-15 21:30:05'),(50,96,'Menghasilkan pernyataan output \"Bilangan ganjil\"',15,0,'2025-04-15 21:30:20','2025-04-15 21:30:20');
/*!40000 ALTER TABLE `second_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `second_keys`
--

DROP TABLE IF EXISTS `second_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `second_keys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `second_answer_id` bigint unsigned NOT NULL,
  `detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `second_keys_second_answer_id_foreign` (`second_answer_id`),
  CONSTRAINT `second_keys_second_answer_id_foreign` FOREIGN KEY (`second_answer_id`) REFERENCES `second_answers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `second_keys`
--

LOCK TABLES `second_keys` WRITE;
/*!40000 ALTER TABLE `second_keys` DISABLE KEYS */;
INSERT INTO `second_keys` VALUES (1,1,'cout << x << endl;','2025-04-16 05:17:15','2025-04-16 05:17:15'),(2,1,'cout << x;','2025-04-16 05:17:30','2025-04-16 05:17:30'),(3,1,'cout << x;\r\ncout << endl;','2025-04-16 05:17:37','2025-04-16 05:17:37'),(4,1,'cout << \"x = \" << x << endl;','2025-04-16 05:18:51','2025-04-16 05:18:51'),(5,1,'cout << \"x = \" << x','2025-04-16 05:18:58','2025-04-16 05:18:58'),(6,1,'cout << \"Nilai x = \" << x << endl;','2025-04-16 05:19:05','2025-04-16 05:19:05'),(7,1,'cout << \"Nilai x = \" << x;','2025-04-16 05:19:12','2025-04-16 05:19:12'),(8,1,'cout << \"x: \" << x << endl;','2025-04-16 05:19:20','2025-04-16 05:19:20'),(9,1,'cout << x << \" \";','2025-04-16 05:19:35','2025-04-16 05:19:35'),(10,2,'cout << y << endl;','2025-04-16 05:20:42','2025-04-16 05:20:42'),(11,2,'cout << y;','2025-04-16 05:20:48','2025-04-16 05:20:48'),(12,2,'cout << y;\r\ncout << endl;','2025-04-16 05:20:54','2025-04-16 05:20:54'),(13,2,'cout << \"y = \" << y << endl;','2025-04-16 05:21:01','2025-04-16 05:21:01'),(14,2,'cout << \"y = \" << y;','2025-04-16 05:21:07','2025-04-16 05:21:07'),(15,2,'cout << \"Nilai y = \" << y << endl;','2025-04-16 05:21:22','2025-04-16 05:21:22'),(16,2,'cout << \"Nilai y = \" << y;','2025-04-16 05:21:29','2025-04-16 05:21:29'),(17,2,'cout << \"y: \" << y << endl;','2025-04-16 05:21:36','2025-04-16 05:21:36'),(18,2,'cout << y << \" \";','2025-04-16 05:21:43','2025-04-16 05:21:43'),(19,3,'cout << rata << endl;','2025-04-16 05:33:07','2025-04-16 05:33:07'),(20,3,'cout << rata;','2025-04-16 05:33:12','2025-04-16 05:33:12'),(21,3,'cout << rata;\r\ncout << endl;','2025-04-16 05:33:19','2025-04-16 05:33:19'),(22,3,'cout << \"rata = \" << rata << endl;','2025-04-16 05:33:26','2025-04-16 05:33:26'),(23,3,'cout << \"rata = \" << rata;','2025-04-16 05:33:34','2025-04-16 05:33:34'),(24,3,'cout << \"Nilai rata = \" << rata << endl;','2025-04-16 05:33:40','2025-04-16 05:33:40'),(25,3,'cout << \"Nilai rata = \" << rata;','2025-04-16 05:33:46','2025-04-16 05:33:46'),(26,3,'cout << \"rata: \" << rata << endl;','2025-04-16 05:33:53','2025-04-16 05:33:53'),(27,3,'cout << rata << \" \";','2025-04-16 05:34:05','2025-04-16 05:34:05'),(28,4,'cout << x << endl;','2025-04-16 05:35:06','2025-04-16 05:35:06'),(29,4,'cout << x;','2025-04-16 05:35:11','2025-04-16 05:35:11'),(30,4,'cout << x;\r\ncout << endl;','2025-04-16 05:35:16','2025-04-16 05:35:16'),(31,4,'cout << \"x = \" << x << endl;','2025-04-16 05:35:22','2025-04-16 05:35:22'),(32,4,'cout << \"x = \" << x;','2025-04-16 05:35:28','2025-04-16 05:35:28'),(33,4,'cout << \"Nilai x = \" << x << endl;','2025-04-16 05:35:35','2025-04-16 05:35:35'),(34,4,'cout << \"Nilai x = \" << x;','2025-04-16 05:35:41','2025-04-16 05:35:41'),(35,4,'cout << x << \" \";','2025-04-16 05:35:47','2025-04-16 05:35:47'),(36,5,'cout << y << endl;','2025-04-16 05:36:05','2025-04-16 05:36:05'),(37,5,'cout << y;','2025-04-16 05:36:11','2025-04-16 05:36:11'),(38,5,'cout << y;\r\ncout << endl;','2025-04-16 05:36:18','2025-04-16 05:36:18'),(39,5,'cout << \"y = \" << y << endl;','2025-04-16 05:36:25','2025-04-16 05:36:25'),(40,5,'cout << \"y = \" << y;','2025-04-16 05:36:31','2025-04-16 05:36:31'),(41,5,'cout << \"Nilai y = \" << y << endl;','2025-04-16 05:36:38','2025-04-16 05:36:38'),(42,5,'cout << \"Nilai y = \" << y;','2025-04-16 05:36:46','2025-04-16 05:36:46'),(43,5,'cout << y << \" \";','2025-04-16 05:36:52','2025-04-16 05:36:52'),(44,6,'cout << \"Jenis Kelamin = WANITA\";','2025-04-16 06:05:57','2025-04-16 06:05:57'),(45,6,'cout << \"Jenis Kelamin = WANITA\" << endl;','2025-04-16 06:06:07','2025-04-16 06:06:07'),(46,6,'cout << \"Jenis Kelamin = WANITA\";\r\ncout << endl;','2025-04-16 06:06:28','2025-04-16 06:06:28'),(47,7,'cout << \"Jenis Kelamin = LAKI-LAKI\";','2025-04-16 06:07:18','2025-04-16 06:07:18'),(48,7,'cout << \"Jenis Kelamin = LAKI-LAKI\" << endl;','2025-04-16 06:07:32','2025-04-16 06:07:32'),(49,7,'cout << \"Jenis Kelamin = LAKI-LAKI\";\r\ncout << endl;','2025-04-16 06:07:59','2025-04-16 06:07:59'),(50,8,'cout << a;','2025-04-16 06:30:52','2025-04-16 06:30:52'),(51,8,'cout << a << endl;','2025-04-16 06:30:59','2025-04-16 06:30:59'),(52,8,'cout << \"a = \" << a;','2025-04-16 06:31:05','2025-04-16 06:31:05'),(53,8,'cout << \"a = \" << a << endl;','2025-04-16 06:31:14','2025-04-16 06:31:14'),(54,8,'cout << \"Nilai a = \" << a;','2025-04-16 06:31:19','2025-04-16 06:31:19'),(55,8,'cout << \"Nilai a = \" << a << endl;','2025-04-16 06:31:25','2025-04-16 06:31:25'),(56,8,'cout << a;\r\ncout << endl;','2025-04-16 06:31:32','2025-04-16 06:31:32'),(57,8,'cout << \"a = \" << a;\r\ncout << endl;','2025-04-16 06:31:45','2025-04-16 06:31:45'),(58,8,'cout << \"Nilai a = \" << a;\r\ncout << endl;','2025-04-16 06:31:53','2025-04-16 06:31:53'),(59,9,'cout << b;','2025-04-16 06:32:35','2025-04-16 06:32:35'),(60,9,'cout << b << endl;','2025-04-16 06:32:42','2025-04-16 06:32:42'),(61,9,'cout << \"b = \" << b;','2025-04-16 06:32:48','2025-04-16 06:32:48'),(62,9,'cout << \"b = \" << b << endl;','2025-04-16 06:32:55','2025-04-16 06:32:55'),(63,9,'cout << \"Nilai b = \" << b;','2025-04-16 06:33:01','2025-04-16 06:33:01'),(64,9,'cout << \"Nilai b = \" << b << endl;','2025-04-16 06:33:07','2025-04-16 06:33:07'),(65,9,'cout << b;\r\ncout << endl;','2025-04-16 06:33:12','2025-04-16 06:33:12'),(66,9,'cout << \"b = \" << b;\r\ncout << endl;','2025-04-16 06:33:18','2025-04-16 06:33:18'),(67,9,'cout << \"Nilai b = \" << b;\r\ncout << endl;','2025-04-16 06:33:24','2025-04-16 06:33:24'),(68,10,'cout << c;','2025-04-16 06:33:38','2025-04-16 06:33:38'),(69,10,'cout << c << endl;','2025-04-16 06:33:43','2025-04-16 06:33:43'),(70,10,'cout << \"c = \" << c;','2025-04-16 06:33:49','2025-04-16 06:33:49'),(71,10,'cout << \"c = \" << c << endl;','2025-04-16 06:33:54','2025-04-16 06:33:54'),(72,10,'cout << \"Nilai c = \" << c;','2025-04-16 06:34:01','2025-04-16 06:34:01'),(73,10,'cout << \"Nilai c = \" << c << endl;','2025-04-16 06:34:11','2025-04-16 06:34:11'),(74,10,'cout << c;\r\ncout << endl;','2025-04-16 06:34:19','2025-04-16 06:34:19'),(75,10,'cout << \"c = \" << c;\r\ncout << endl;','2025-04-16 06:34:26','2025-04-16 06:34:26'),(76,10,'cout << \"Nilai c = \" << c;\r\ncout << endl;','2025-04-16 06:34:33','2025-04-16 06:34:33'),(77,11,'cout << \"Variabel a tidak bernilai 12\";','2025-04-16 06:35:25','2025-04-16 06:35:25'),(78,11,'cout << \"Variabel a tidak bernilai 12\" << endl;','2025-04-16 06:35:30','2025-04-16 06:35:30'),(79,11,'cout << \"Variabel a tidak bernilai 12\";\r\ncout << endl;','2025-04-16 06:35:42','2025-04-16 06:35:42'),(80,12,'cout << \"Umur kamu \" << umur;','2025-04-16 06:40:04','2025-04-16 06:40:04'),(81,12,'cout << \"Umur kamu \" << umur << endl;','2025-04-16 06:40:10','2025-04-16 06:40:10'),(82,12,'cout << \"Umur kamu \";\r\ncout << umur;','2025-04-16 06:40:21','2025-04-16 06:40:21'),(83,12,'cout << \"Umur kamu \";\r\ncout << umur << endl;','2025-04-16 06:40:33','2025-04-16 06:40:33'),(84,13,'cout << \"Sudah boleh mengikuti ujian akhir\";','2025-04-16 06:41:07','2025-04-16 06:41:07'),(85,13,'cout << \"Sudah boleh mengikuti ujian akhir\" << endl;','2025-04-16 06:41:13','2025-04-16 06:41:13'),(86,13,'cout << \"Sudah boleh mengikuti ujian akhir\";\r\ncout << endl;','2025-04-16 06:41:19','2025-04-16 06:41:19'),(87,14,'cout << \"Umur kamu \" << umur;','2025-04-16 06:41:49','2025-04-16 06:41:49'),(88,14,'cout << \"Umur kamu \" << umur << endl;','2025-04-16 06:41:58','2025-04-16 06:41:58'),(89,14,'cout << \"Umur kamu \";\r\ncout << umur;','2025-04-16 06:42:04','2025-04-16 06:42:04'),(90,14,'cout << \"Umur kamu \";\r\ncout << umur << endl;','2025-04-16 06:42:12','2025-04-16 06:42:12'),(91,15,'cout << \"Belum memenuhi syarat untuk ujian akhir\";','2025-04-16 06:42:26','2025-04-16 06:42:26'),(92,15,'cout << \"Belum memenuhi syarat untuk ujian akhir\" << endl;','2025-04-16 06:42:33','2025-04-16 06:42:33'),(93,15,'cout << \"Belum memenuhi syarat untuk ujian akhir\";\r\ncout << endl;','2025-04-16 06:42:43','2025-04-16 06:42:43'),(94,16,'cout << \"Kode akses benar\";','2025-04-16 06:44:55','2025-04-16 06:44:55'),(95,16,'cout << \"Kode akses benar\" << endl;','2025-04-16 06:45:03','2025-04-16 06:45:03'),(96,16,'cout << \"Kode akses benar\";\r\ncout << endl;','2025-04-16 06:45:08','2025-04-16 06:45:08'),(97,17,'cout << \"Kode akses salah\";','2025-04-16 06:45:27','2025-04-16 06:45:27'),(98,17,'cout << \"Kode akses salah\" << endl;','2025-04-16 06:45:33','2025-04-16 06:45:33'),(99,17,'cout << \"Kode akses salah\";\r\ncout << endl;','2025-04-16 06:45:39','2025-04-16 06:45:39'),(100,18,'cout << panjang;','2025-04-16 07:43:30','2025-04-16 07:43:30'),(101,18,'cout << panjang << endl;','2025-04-16 07:43:36','2025-04-16 07:43:36'),(102,18,'cout << \"Panjang = \" << panjang;','2025-04-16 07:43:43','2025-04-16 07:43:43'),(103,18,'cout << \"Panjang = \" << panjang << endl;','2025-04-16 07:43:49','2025-04-16 07:43:49'),(104,18,'cout << \"Panjang = \" << panjang;\r\ncout << endl;','2025-04-16 07:43:58','2025-04-16 07:43:58'),(105,18,'cout << panjang;\r\ncout << endl;','2025-04-16 07:44:45','2025-04-16 07:44:45'),(106,19,'cout << lebar;','2025-04-16 07:45:08','2025-04-16 07:45:08'),(107,19,'cout << lebar << endl;','2025-04-16 07:45:14','2025-04-16 07:45:14'),(108,19,'cout << \"Lebar = \" << lebar;','2025-04-16 07:45:22','2025-04-16 07:45:22'),(109,19,'cout << \"Lebar = \" << lebar << endl;','2025-04-16 07:45:29','2025-04-16 07:45:29'),(110,19,'cout << \"Lebar = \" << lebar;\r\ncout << endl;','2025-04-16 07:45:41','2025-04-16 07:45:41'),(111,19,'cout << lebar;\r\ncout << endl;','2025-04-16 07:45:47','2025-04-16 07:45:47'),(112,20,'cout << luas;','2025-04-16 07:46:16','2025-04-16 07:46:16'),(113,20,'cout << luas << endl;','2025-04-16 07:46:20','2025-04-16 07:46:20'),(114,20,'cout << \"Luas = \" << luas;','2025-04-16 07:46:30','2025-04-16 07:46:30'),(115,20,'cout << \"Luas = \" << luas << endl;','2025-04-16 07:46:36','2025-04-16 07:46:36'),(116,20,'cout << \"Luas = \" << luas;\r\ncout << endl;','2025-04-16 07:46:43','2025-04-16 07:46:43'),(117,20,'cout << luas;\r\ncout << endl;','2025-04-16 07:46:48','2025-04-16 07:46:48'),(118,21,'cout << panjang;','2025-04-16 07:47:47','2025-04-16 07:47:47'),(119,21,'cout << panjang << endl;','2025-04-16 07:48:01','2025-04-16 07:48:01'),(120,21,'cout << \"Panjang = \" << panjang;','2025-04-16 07:48:08','2025-04-16 07:48:08'),(121,21,'cout << \"Panjang = \" << panjang << endl;','2025-04-16 07:48:15','2025-04-16 07:48:15'),(122,21,'cout << \"Panjang = \" << panjang;\r\ncout << endl;','2025-04-16 07:48:22','2025-04-16 07:48:22'),(123,21,'cout << panjang;\r\ncout << endl;','2025-04-16 07:48:28','2025-04-16 07:48:28'),(124,22,'cout << lebar;','2025-04-16 07:48:57','2025-04-16 07:48:57'),(125,22,'cout << lebar << endl;','2025-04-16 07:49:03','2025-04-16 07:49:03'),(126,22,'cout << \"Lebar = \" << lebar;','2025-04-16 07:49:08','2025-04-16 07:49:08'),(127,22,'cout << \"Lebar = \" << lebar << endl;','2025-04-16 07:49:13','2025-04-16 07:49:13'),(128,22,'cout << \"Lebar = \" << lebar;\r\ncout << endl;','2025-04-16 07:49:19','2025-04-16 07:49:19'),(129,22,'cout << lebar;\r\ncout << endl;','2025-04-16 07:49:24','2025-04-16 07:49:24'),(130,23,'cout << tinggi;','2025-04-16 07:54:47','2025-04-16 07:54:47'),(131,23,'cout << tinggi << endl;','2025-04-16 07:54:52','2025-04-16 07:54:52'),(132,23,'cout << \"Tinggi = \" << tinggi;','2025-04-16 07:54:59','2025-04-16 07:54:59'),(133,23,'cout << \"Tinggi = \" << tinggi << endl;','2025-04-16 07:55:05','2025-04-16 07:55:05'),(134,23,'cout << \"Tinggi = \" << tinggi;\r\ncout << endl;','2025-04-16 07:55:32','2025-04-16 07:55:32'),(135,23,'cout << tinggi;\r\ncout << endl;','2025-04-16 07:55:38','2025-04-16 07:55:38'),(136,24,'cout << dasar;','2025-04-16 07:56:25','2025-04-16 07:56:25'),(137,24,'cout << dasar << endl;','2025-04-16 07:56:31','2025-04-16 07:56:31'),(138,24,'cout << \"Dasar = \" << dasar;','2025-04-16 07:56:39','2025-04-16 07:56:39'),(139,24,'cout << \"Dasar = \" << dasar << endl;','2025-04-16 07:56:44','2025-04-16 07:56:44'),(140,24,'cout << \"Dasar = \" << dasar;\r\ncout << endl;','2025-04-16 07:56:51','2025-04-16 07:56:51'),(141,24,'cout << dasar;\r\ncout << endl;','2025-04-16 07:56:56','2025-04-16 07:56:56'),(142,25,'cout << nilai_akhir;','2025-04-16 07:57:17','2025-04-16 07:57:17'),(143,25,'cout << nilai_akhir << endl;','2025-04-16 07:57:23','2025-04-16 07:57:23'),(144,25,'cout << \"Nilai Akhir = \" << nilai_akhir;','2025-04-16 07:57:28','2025-04-16 07:57:28'),(145,25,'cout << \"Nilai Akhir = \" << nilai_akhir << endl;','2025-04-16 07:57:33','2025-04-16 07:57:33'),(146,25,'cout << \"Nilai Akhir = \" << nilai_akhir;\r\ncout << endl;','2025-04-16 07:57:38','2025-04-16 07:57:38'),(147,25,'cout << nilai_akhir;\r\ncout << endl;','2025-04-16 07:57:44','2025-04-16 07:57:44'),(148,26,'cout << tinggi;','2025-04-16 07:58:18','2025-04-16 07:58:18'),(149,26,'cout << tinggi << endl;','2025-04-16 07:58:24','2025-04-16 07:58:24'),(150,26,'cout << \"Tinggi = \" << tinggi;','2025-04-16 07:58:29','2025-04-16 07:58:29'),(151,26,'cout << \"Tinggi = \" << tinggi << endl;','2025-04-16 07:58:35','2025-04-16 07:58:35'),(152,26,'cout << \"Tinggi = \" << tinggi;\r\ncout << endl;','2025-04-16 07:58:40','2025-04-16 07:58:40'),(153,26,'cout << tinggi;\r\ncout << endl;','2025-04-16 07:58:46','2025-04-16 07:58:46'),(154,27,'cout << dasar;','2025-04-16 07:58:57','2025-04-16 07:58:57'),(155,27,'cout << dasar << endl;','2025-04-16 07:59:03','2025-04-16 07:59:03'),(156,27,'cout << \"Dasar = \" << dasar;','2025-04-16 07:59:09','2025-04-16 07:59:09'),(157,27,'cout << \"Dasar = \" << dasar << endl;','2025-04-16 07:59:14','2025-04-16 07:59:14'),(158,27,'cout << \"Dasar = \" << dasar;\r\ncout << endl;','2025-04-16 07:59:20','2025-04-16 07:59:20'),(159,27,'cout << dasar;\r\ncout << endl;','2025-04-16 07:59:25','2025-04-16 07:59:25'),(160,28,'cout << tinggi;','2025-04-16 08:06:11','2025-04-16 08:06:11'),(161,28,'cout << tinggi << endl;','2025-04-16 08:06:16','2025-04-16 08:06:16'),(162,28,'cout << \"Tinggi = \" << tinggi;','2025-04-16 08:06:22','2025-04-16 08:06:22'),(163,28,'cout << \"Tinggi = \" << tinggi << endl;','2025-04-16 08:06:27','2025-04-16 08:06:27'),(164,28,'cout << \"Tinggi = \" << tinggi;\r\ncout << endl;','2025-04-16 08:06:34','2025-04-16 08:06:34'),(165,28,'cout << tinggi;\r\ncout << endl;','2025-04-16 08:06:40','2025-04-16 08:06:40'),(166,29,'cout << alas;','2025-04-16 08:07:07','2025-04-16 08:07:07'),(167,29,'cout << alas << endl;','2025-04-16 08:07:14','2025-04-16 08:07:14'),(168,29,'cout << \"Alas = \" << alas;','2025-04-16 08:07:21','2025-04-16 08:07:21'),(169,29,'cout << \"Alas = \" << alas << endl;','2025-04-16 08:07:27','2025-04-16 08:07:27'),(170,29,'cout << \"Alas = \" << alas;\r\ncout << endl;','2025-04-16 08:07:35','2025-04-16 08:07:35'),(171,29,'cout << alas;\r\ncout << endl;','2025-04-16 08:07:42','2025-04-16 08:07:42'),(172,30,'cout << luas;','2025-04-16 08:07:55','2025-04-16 08:07:55'),(173,30,'cout << luas << endl;','2025-04-16 08:08:00','2025-04-16 08:08:00'),(174,30,'cout << \"Luas = \" << luas;','2025-04-16 08:08:06','2025-04-16 08:08:06'),(175,30,'cout << \"Luas = \" << luas << endl;','2025-04-16 08:08:11','2025-04-16 08:08:11'),(176,30,'cout << \"Luas = \" << luas;\r\ncout << endl;','2025-04-16 08:08:16','2025-04-16 08:08:16'),(177,30,'cout << luas;\r\ncout << endl;','2025-04-16 08:08:21','2025-04-16 08:08:21'),(178,31,'cout << tinggi;','2025-04-16 08:08:39','2025-04-16 08:08:39'),(179,31,'cout << tinggi << endl;','2025-04-16 08:08:44','2025-04-16 08:08:44'),(180,31,'cout << \"Tinggi = \" << tinggi;','2025-04-16 08:08:50','2025-04-16 08:08:50'),(181,31,'cout << \"Tinggi = \" << tinggi << endl;','2025-04-16 08:08:55','2025-04-16 08:08:55'),(182,31,'cout << \"Tinggi = \" << tinggi;\r\ncout << endl;','2025-04-16 08:09:01','2025-04-16 08:09:01'),(183,31,'cout << tinggi;\r\ncout << endl;','2025-04-16 08:09:07','2025-04-16 08:09:07'),(184,32,'cout << alas;','2025-04-16 08:09:18','2025-04-16 08:09:18'),(185,32,'cout << alas << endl;','2025-04-16 08:09:22','2025-04-16 08:09:22'),(186,32,'cout << \"Alas = \" << alas;','2025-04-16 08:09:28','2025-04-16 08:09:28'),(187,32,'cout << \"Alas = \" << alas << endl;','2025-04-16 08:09:33','2025-04-16 08:09:33'),(188,32,'cout << \"Alas = \" << alas;\r\ncout << endl;','2025-04-16 08:09:38','2025-04-16 08:09:38'),(189,32,'cout << alas;\r\ncout << endl;','2025-04-16 08:09:44','2025-04-16 08:09:44'),(190,33,'cout << angka << \" adalah kelipatan 3\";','2025-04-16 08:12:33','2025-04-16 08:12:33'),(191,33,'cout << angka << \" adalah kelipatan 3\" << endl;','2025-04-16 08:12:39','2025-04-16 08:12:39'),(192,33,'cout << angka << \" adalah kelipatan 3\";\r\ncout << endl;','2025-04-16 08:12:44','2025-04-16 08:12:44'),(193,34,'cout << angka << \" bukan kelipatan 3\";','2025-04-16 08:13:07','2025-04-16 08:13:07'),(194,34,'cout << angka << \" bukan kelipatan 3\" << endl;','2025-04-16 08:13:26','2025-04-16 08:13:26'),(195,34,'cout << angka << \" bukan kelipatan 3\";\r\ncout << endl;','2025-04-16 08:13:31','2025-04-16 08:13:31'),(196,35,'cout << kilometer;','2025-04-16 08:17:11','2025-04-16 08:17:11'),(197,35,'cout << kilometer << endl;','2025-04-16 08:17:16','2025-04-16 08:17:16'),(198,35,'cout << \"Kilometer = \" << kilometer;','2025-04-16 08:17:22','2025-04-16 08:17:22'),(199,35,'cout << \"Kilometer = \" << kilometer << endl;','2025-04-16 08:17:27','2025-04-16 08:17:27'),(200,35,'cout << \"Kilometer = \" << kilometer;\r\ncout << endl;','2025-04-16 08:17:34','2025-04-16 08:17:34'),(201,35,'cout << kilometer;\r\ncout << endl;','2025-04-16 08:17:39','2025-04-16 08:17:39'),(202,36,'cout << miles;','2025-04-16 08:17:51','2025-04-16 08:17:51'),(203,36,'cout << miles << endl;','2025-04-16 08:17:56','2025-04-16 08:17:56'),(204,36,'cout << \"Miles = \" << miles;','2025-04-16 08:18:01','2025-04-16 08:18:01'),(205,36,'cout << \"Miles = \" << miles << endl;','2025-04-16 08:18:07','2025-04-16 08:18:07'),(206,36,'cout << \"Miles = \" << miles;\r\ncout << endl;','2025-04-16 08:18:13','2025-04-16 08:18:13'),(207,36,'cout << miles;\r\ncout << endl;','2025-04-16 08:18:18','2025-04-16 08:18:18'),(208,37,'cout << \"Hanya menghitung konversi\";','2025-04-16 08:18:39','2025-04-16 08:18:39'),(209,37,'cout << \"Hanya menghitung konversi\" << endl;','2025-04-16 08:18:44','2025-04-16 08:18:44'),(210,37,'cout << \"Hanya menghitung konversi\";\ncout << endl;','2025-04-16 08:18:49','2025-04-16 08:18:56'),(211,38,'cout << \"Memenuhi syarat pendaftaran\";','2025-04-16 08:30:21','2025-04-16 08:30:21'),(212,38,'cout << \"Memenuhi syarat pendaftaran\" << endl;','2025-04-16 08:30:27','2025-04-16 08:30:27'),(213,38,'cout << \"Memenuhi syarat pendaftaran\";\r\ncout << endl;','2025-04-16 08:30:33','2025-04-16 08:30:33'),(214,39,'cout << \"Belum memenuhi syarat\";','2025-04-16 08:30:50','2025-04-16 08:30:50'),(215,39,'cout << \"Belum memenuhi syarat\" << endl;','2025-04-16 08:30:58','2025-04-16 08:30:58'),(216,39,'cout << \"Belum memenuhi syarat\";\r\ncout << endl;','2025-04-16 08:31:04','2025-04-16 08:31:04'),(217,40,'cout << \"PIN benar\";','2025-04-16 08:38:00','2025-04-16 08:38:00'),(218,40,'cout << \"PIN benar\" << endl;','2025-04-16 08:38:05','2025-04-16 08:38:05'),(219,40,'cout << \"PIN benar\";\r\ncout << endl;','2025-04-16 08:38:12','2025-04-16 08:38:12'),(220,41,'cout << \"PIN salah\";','2025-04-16 08:38:34','2025-04-16 08:38:34'),(221,41,'cout << \"PIN salah\" << endl;','2025-04-16 08:38:44','2025-04-16 08:38:44'),(222,41,'cout << \"PIN salah\";\r\ncout << endl;','2025-04-16 08:38:51','2025-04-16 08:38:51'),(223,42,'cout << \"Kategori sangat penting\";','2025-04-16 08:49:43','2025-04-16 08:49:43'),(224,42,'cout << \"Kategori sangat penting\" << endl;','2025-04-16 08:49:51','2025-04-16 08:49:51'),(225,42,'cout << \"Kategori sangat penting\";\r\ncout << endl;','2025-04-16 08:49:59','2025-04-16 08:49:59'),(226,43,'cout << \"Kategori penting\";','2025-04-16 08:50:20','2025-04-16 08:50:20'),(227,43,'cout << \"Kategori penting\" << endl;','2025-04-16 08:50:27','2025-04-16 08:50:27'),(228,43,'cout << \"Kategori penting\";\r\ncout << endl;','2025-04-16 08:50:32','2025-04-16 08:50:32'),(229,44,'cout << \"Kategori biasa\";','2025-04-16 08:50:51','2025-04-16 08:50:51'),(230,44,'cout << \"Kategori biasa\" << endl;','2025-04-16 08:50:57','2025-04-16 08:50:57'),(231,44,'cout << \"Kategori biasa\";\r\ncout << endl;','2025-04-16 08:51:03','2025-04-16 08:51:03'),(232,45,'cout << \"Kategori tidak dikenal\";','2025-04-16 08:51:21','2025-04-16 08:51:21'),(233,45,'cout << \"Kategori tidak dikenal\" << endl;','2025-04-16 08:51:27','2025-04-16 08:51:27'),(234,45,'cout << \"Kategori tidak dikenal\";\r\ncout << endl;','2025-04-16 08:51:34','2025-04-16 08:51:34'),(235,46,'cout << \"Dewasa. \";','2025-04-16 09:04:38','2025-04-16 09:04:38'),(236,46,'cout << \"Dewasa. \" << endl;','2025-04-16 09:04:48','2025-04-16 09:04:48'),(237,46,'cout << \"Dewasa. \";\r\ncout << endl;','2025-04-16 09:05:16','2025-04-16 09:05:16'),(238,47,'if (usia >= 60) {','2025-04-16 09:05:47','2025-04-16 09:05:47'),(239,48,'cout << \"Anak-anak atau Remaja\";','2025-04-16 09:09:29','2025-04-16 09:09:29'),(240,48,'cout << \"Anak-anak atau Remaja\" << endl;','2025-04-16 09:09:33','2025-04-16 09:09:33'),(241,48,'cout << \"Anak-anak atau Remaja\";\r\ncout << endl;','2025-04-16 09:09:39','2025-04-16 09:09:39'),(242,49,'cout << \"Bilangan genap\";','2025-04-16 09:12:27','2025-04-16 09:12:27'),(243,49,'cout << \"Bilangan genap\" << endl;','2025-04-16 09:12:33','2025-04-16 09:12:33'),(244,49,'cout << \"Bilangan genap\";\r\ncout << endl;','2025-04-16 09:12:40','2025-04-16 09:12:40'),(245,50,'cout << \"Bilangan ganjil\";','2025-04-16 09:13:11','2025-04-16 09:13:11'),(246,50,'cout << \"Bilangan ganjil\" << endl;','2025-04-16 09:13:19','2025-04-16 09:13:19'),(247,50,'cout << \"Bilangan ganjil\";\r\ncout << endl;','2025-04-16 09:13:24','2025-04-16 09:13:24');
/*!40000 ALTER TABLE `second_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `third_answers`
--

DROP TABLE IF EXISTS `third_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `third_answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `second_answer_id` bigint unsigned NOT NULL,
  `detail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `third_answers_second_answer_id_foreign` (`second_answer_id`),
  CONSTRAINT `third_answers_second_answer_id_foreign` FOREIGN KEY (`second_answer_id`) REFERENCES `second_answers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `third_answers`
--

LOCK TABLES `third_answers` WRITE;
/*!40000 ALTER TABLE `third_answers` DISABLE KEYS */;
INSERT INTO `third_answers` VALUES (1,47,'Menghasilkan pernyataan output \"Senior\"',8,'2025-04-15 21:06:10','2025-04-15 21:06:10');
/*!40000 ALTER TABLE `third_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `third_keys`
--

DROP TABLE IF EXISTS `third_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `third_keys` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `third_answer_id` bigint unsigned NOT NULL,
  `detail` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `third_keys_third_answer_id_foreign` (`third_answer_id`),
  CONSTRAINT `third_keys_third_answer_id_foreign` FOREIGN KEY (`third_answer_id`) REFERENCES `third_answers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `third_keys`
--

LOCK TABLES `third_keys` WRITE;
/*!40000 ALTER TABLE `third_keys` DISABLE KEYS */;
INSERT INTO `third_keys` VALUES (1,1,'cout << \"Senior\";','2025-04-16 09:06:28','2025-04-16 09:06:28'),(2,1,'cout << \"Senior\" << endl;','2025-04-16 09:06:40','2025-04-16 09:06:40'),(3,1,'cout << \"Senior\";\r\ncout << endl;','2025-04-16 09:06:51','2025-04-16 09:06:51');
/*!40000 ALTER TABLE `third_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `clas_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  KEY `users_clas_id_foreign` (`clas_id`),
  CONSTRAINT `users_clas_id_foreign` FOREIGN KEY (`clas_id`) REFERENCES `clas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,'Guru','guru','guru@gmail.com','082234897333',NULL,1,NULL,'$2y$10$lu8HML44VNhdjkysidZz.egTy/prxsJw6X77DiHODVnPPeNCobwU6',NULL,'2025-04-15 13:51:30','2025-04-15 13:51:30'),(2,1,'Siswa','siswa','siswa@gmail.com','082234897335',NULL,1,NULL,'$2y$10$0vHErqXkum0R1GMWl.4SL.R.4kv/yQdayh.hHG9eLNPL2dW3oqs0K',NULL,'2025-04-15 13:51:30','2025-04-15 13:51:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cppiqbal2'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-19 16:02:12
