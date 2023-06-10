-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 03:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `livreeo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_matiere` int(11) DEFAULT NULL,
  `id_subCategorie` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `id_matiere`, `id_subCategorie`, `created_at`, `updated_at`, `is_deleted`) VALUES
(2, 'Tremayne Brown', 2, NULL, '2023-03-24 19:54:49', '2023-04-09 00:41:17', 0),
(3, 'Mr. Cary Shanahan III', 5, NULL, '2023-03-24 19:54:49', '2023-03-24 19:54:49', 0),
(4, 'Jacques Robel', 6, NULL, '2023-03-24 19:54:49', '2023-03-24 19:54:49', 0),
(5, 'Ethyl Stiedemann', 6, NULL, '2023-03-24 19:54:49', '2023-03-24 19:54:49', 0),
(6, 'Ms. Reba Leffler', 5, NULL, '2023-03-24 19:54:49', '2023-03-24 19:54:49', 0),
(7, 'Jaylon Schumm', 1, 1, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(8, 'Raina Collier', 2, 3, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(9, 'Miss Annette Corwin', 17, 5, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(10, 'Marcelino Dietrich', 17, 4, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(11, 'Dr. Demarcus Bashirian', 3, 4, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(12, 'Mrs. Elisha Schinner', 1, 2, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(13, 'Rosalia McCullough', 13, 2, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(14, 'Dr. Orville Howe III', 14, 3, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(15, 'Guadalupe Mann DDS', 6, 2, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(16, 'Rosanna Kovacek', 14, 4, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(17, 'Katlynn White', 16, 4, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(18, 'Amelia Bednar', 12, 3, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(19, 'Karolann Nicolas', 14, 1, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(20, 'Green Marks', 9, 5, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(21, 'Hillary Koss', 15, 3, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(22, 'Ariel Kohler', 4, 1, '2023-03-24 20:05:03', '2023-03-24 20:05:03', 0),
(25, 'test 34', 1, 2, '2023-04-07 21:11:31', '2023-04-07 21:35:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomClasse` varchar(255) NOT NULL,
  `id_ecole` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `nomClasse`, `id_ecole`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Harris-Wisoky', 6, '2023-03-24 19:29:53', '2023-04-09 00:43:37', 0),
(2, 'Kunde LLC', 4, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(3, 'Greenholt-Orn', 3, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(4, 'Larson, Harvey and Satterfield', 3, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(5, 'Heaney Ltd', 2, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(6, 'Lehner PLC', 2, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(7, 'Altenwerth-Crooks', 4, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(8, 'Spencer, McDermott and Nitzsche', 6, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(9, 'O\'Keefe, Tillman and Sipes', 5, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(10, 'Mohr-Hessel', 6, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(11, 'Dach Group', 6, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(12, 'Kovacek and Sons', 6, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(13, 'Crist Ltd', 6, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(14, 'Crist, Stoltenberg and Doyle', 2, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(15, 'Blick Inc', 4, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(16, 'D\'Amore-Miller', 5, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(17, 'VonRueden LLC', 1, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0),
(18, 'Kuhic, Effertz and Barrows', 2, '2023-03-24 19:29:53', '2023-03-24 19:29:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ecoles`
--

CREATE TABLE `ecoles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ecoles`
--

INSERT INTO `ecoles` (`id`, `nom`, `id_ville`, `created_at`, `updated_at`, `is_deleted`) VALUES
(2, 'Ritchie-Boyer', 4, '2023-03-24 19:27:28', '2023-04-09 00:49:10', 0),
(3, 'Gulgowski-Haag', 10, '2023-03-24 19:27:28', '2023-03-24 19:27:28', 0),
(4, 'Paucek Inc', 4, '2023-03-24 19:27:28', '2023-03-24 19:27:28', 0),
(5, 'Welch Inc', 10, '2023-03-24 19:27:28', '2023-03-24 19:27:28', 0),
(6, 'Johns-Schuster', 13, '2023-03-24 19:27:28', '2023-03-24 19:27:28', 0),
(9, 'ecole 123', 6, '2023-04-07 21:35:34', '2023-04-07 21:35:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `etudiant_matieres`
--

CREATE TABLE `etudiant_matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etudiant_matieres`
--

INSERT INTO `etudiant_matieres` (`id`, `id_matiere`, `id_etudiant`, `created_at`, `updated_at`) VALUES
(1, 18, 10, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(2, 13, 7, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(3, 3, 1, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(4, 9, 5, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(5, 15, 8, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(6, 6, 3, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(7, 15, 6, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(8, 5, 2, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(9, 12, 10, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(10, 8, 7, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(11, 9, 2, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(12, 12, 3, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(13, 15, 1, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(14, 14, 1, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(15, 3, 1, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(16, 2, 5, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(17, 1, 6, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(18, 12, 3, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(19, 9, 8, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(20, 8, 4, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(21, 2, 5, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(22, 13, 7, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(23, 10, 5, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(24, 7, 6, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(25, 1, 8, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(26, 16, 9, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(27, 5, 8, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(28, 13, 4, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(29, 9, 6, '2023-03-24 19:46:15', '2023-03-24 19:46:15'),
(30, 1, 1, '2023-03-24 19:46:15', '2023-03-24 19:46:15');

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
-- Table structure for table `matieres`
--

CREATE TABLE `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fichier_scol` varchar(255) NOT NULL,
  `nom_matiere` varchar(255) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matieres`
--

INSERT INTO `matieres` (`id`, `fichier_scol`, `nom_matiere`, `id_classe`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Loyce Lesch', 'Johnston-Bernhard', 5, '2023-03-24 19:37:17', '2023-04-09 00:50:28', 0),
(2, 'Joanie Denesik', 'Heathcote-Ondricka', 1, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(3, 'Isaias Crist', 'Mohr, Rolfson and Lehner', 9, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(4, 'Dandre Witting', 'Feest Inc', 3, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(5, 'Darrick Price', 'Runolfsson, Kreiger and Kassulke', 4, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(6, 'Dr. Casimir Schmeler', 'Conroy-Kris', 17, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(7, 'Miss Flavie Gusikowski', 'Volkman-D\'Amore', 5, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(8, 'Monique Nienow Jr.', 'Schoen Group', 6, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(9, 'Heidi Olson', 'Runolfsson-Nolan', 4, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(10, 'Prof. Jovani Schmeler', 'Hilpert Inc', 6, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(11, 'Junius Kunze', 'Jenkins Ltd', 6, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(12, 'Olga Bailey', 'Miller, Fahey and Cremin', 8, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(13, 'Nat Dare', 'Gaylord Ltd', 9, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(14, 'Mr. Deontae McLaughlin Jr.', 'Kovacek PLC', 6, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(15, 'Enrique Hackett', 'Walker and Sons', 17, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(16, 'Fleta Douglas', 'Schimmel, Kemmer and Langworth', 2, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(17, 'Brandyn Dooley', 'Johns, Gislason and Schaefer', 5, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(18, 'Fleta O\'Conner', 'Thiel, Parker and Bode', 6, '2023-03-24 19:37:17', '2023-03-24 19:37:17', 0),
(19, 'test 1', 'test 1', 1, '2023-04-07 22:20:11', '2023-04-07 22:20:11', 0);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_24_105959_create_produits_table', 1),
(6, '2023_03_24_110020_create_categories_table', 1),
(7, '2023_03_24_110034_create_orders_table', 1),
(8, '2023_03_24_110117_create_classes_table', 1),
(9, '2023_03_24_110135_create_ecoles_table', 1),
(10, '2023_03_24_110147_create_villes_table', 1),
(11, '2023_03_24_155234_create_pack_table', 1),
(12, '2023_03_24_183331_create_etudiant_matiere_table', 1),
(13, '2023_03_24_183453_create_matiere_table', 1),
(14, '2023_03_24_183829_create_ordre_produit_table', 1),
(15, '2023_04_05_195402_add_is_admin_to_users_table', 2),
(16, '2023_04_08_123428_add_status_to_users_table', 3),
(17, '2023_04_06_123428_add_status_to_users_table', 4),
(18, '2023_04_09_001409_add_is_deleted_to_categories_table', 5),
(19, '2023_04_09_002422_add_is_deleted_to_classes_table', 6),
(20, '2023_04_09_002753_add_is_deleted_to_ecoles_table', 7),
(21, '2023_04_09_002922_add_is_deleted_to_matieres_table', 8),
(22, '2023_04_09_003021_add_is_deleted_to_orders_table', 9),
(23, '2023_04_09_003116_add_is_deleted_to_packs_table', 10),
(24, '2023_04_09_003228_add_is_deleted_to_produits_table', 11),
(25, '2023_04_09_003340_add_is_deleted_to_users_table', 12),
(26, '2023_04_09_003433_add_is_deleted_to_villes_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `prix_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'attente',
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_utilisateur`, `prix_total`, `created_at`, `updated_at`, `status`, `is_deleted`) VALUES
(1, 4, 243.54, '2023-04-24 19:16:16', '2023-04-09 00:52:43', 'annulee', 0),
(2, 2, 480.00, '2023-02-24 19:16:16', '2023-03-24 20:16:16', 'attente', 0),
(3, 3, 34.08, '2022-03-24 20:16:16', '2023-04-08 20:22:21', 'attente', 0),
(4, 5, 476.66, '2023-03-24 20:16:16', '2023-04-08 20:27:10', 'terminee', 0),
(5, 7, 377.30, '2023-02-24 19:16:16', '2023-03-24 20:16:16', 'attente', 0),
(6, 8, 360.00, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(7, 4, 85.00, '2023-02-24 19:16:16', '2023-03-24 20:16:16', 'attente', 0),
(8, 3, 361.27, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(9, 4, 262.00, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(10, 7, 63.23, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(11, 8, 301.65, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(12, 6, 178.75, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(13, 2, 17.84, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(14, 1, 241.03, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(15, 4, 246.67, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(16, 1, 87.79, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(17, 8, 261.93, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(18, 4, 471.21, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(19, 7, 13.78, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(20, 8, 54.56, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(21, 10, 314.20, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(22, 5, 39.87, '2023-01-24 19:16:16', '2023-03-24 20:16:16', 'attente', 0),
(23, 5, 134.91, '2023-02-24 19:16:16', '2023-03-24 20:16:16', 'attente', 0),
(24, 1, 462.65, '2023-01-24 19:16:16', '2023-03-24 20:16:16', 'attente', 0),
(25, 7, 89.08, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(26, 1, 355.78, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(27, 5, 378.20, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0),
(28, 7, 478.97, '2023-04-24 19:16:16', '2023-03-24 20:16:16', 'attente', 0),
(29, 5, 436.75, '2023-04-24 19:16:16', '2023-03-24 20:16:16', 'attente', 0),
(30, 4, 394.33, '2023-03-24 20:16:16', '2023-03-24 20:16:16', 'attente', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ordre_produits`
--

CREATE TABLE `ordre_produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ordre` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordre_produits`
--

INSERT INTO `ordre_produits` (`id`, `id_ordre`, `id_produit`, `quantite`, `created_at`, `updated_at`) VALUES
(1, 26, 54, 8, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(2, 3, 44, 28, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(3, 26, 41, 13, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(4, 12, 63, 19, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(5, 6, 42, 4, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(6, 6, 44, 20, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(7, 10, 39, 25, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(8, 17, 3, 21, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(9, 8, 71, 12, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(10, 11, 71, 11, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(11, 2, 75, 24, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(12, 11, 20, 24, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(13, 28, 34, 22, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(14, 24, 20, 2, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(15, 26, 39, 12, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(16, 13, 72, 22, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(17, 23, 43, 15, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(18, 27, 80, 14, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(19, 20, 17, 4, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(20, 4, 9, 2, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(21, 13, 53, 1, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(22, 20, 60, 11, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(23, 21, 72, 17, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(24, 8, 23, 19, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(25, 20, 22, 12, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(26, 10, 60, 25, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(27, 8, 80, 9, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(28, 9, 8, 26, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(29, 8, 7, 19, '2023-03-24 20:20:35', '2023-03-24 20:20:35'),
(30, 25, 37, 24, '2023-03-24 20:20:35', '2023-03-24 20:20:35');

-- --------------------------------------------------------

--
-- Table structure for table `packs`
--

CREATE TABLE `packs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packs`
--

INSERT INTO `packs` (`id`, `type`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Pack Rentree \\n(Fournitures+Livres)', NULL, NULL, 0),
(2, 'Pack Livres', NULL, NULL, 0),
(3, 'Pack Fournitures', NULL, NULL, 0),
(6, 'test 2', '2023-04-09 00:54:22', '2023-04-09 00:54:37', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `prix` double(8,2) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `couleur` varchar(255) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `id_pack` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `photo`, `size`, `couleur`, `quantite`, `id_categorie`, `id_pack`, `created_at`, `updated_at`, `is_deleted`) VALUES
(2, 'Bernadine Lowe', 'Qui ut excepturi perferendis facere reiciendis. Totam non ut nisi. Occaecati voluptatibus corporis dolorem quas ipsa eaque.', 99.46, 'https://via.placeholder.com/200x200.png/0022aa?text=asperiores', 'md', 'blanc', 8, 18, 3, '2023-03-24 20:08:00', '2023-04-09 00:58:44', 0),
(3, 'Cayla Bauch', 'Quaerat iste recusandae consequuntur. Repudiandae ut enim non ipsa et non. Quia rem alias soluta et. Placeat sunt et aut quas aliquid.', 133.06, 'https://via.placeholder.com/200x200.png/0088cc?text=molestiae', 'xxxl', 'blanc', 22, 4, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(4, 'Mrs. Gloria Littel MD', 'Non facilis libero commodi aut mollitia qui non. Distinctio ipsum eius molestiae laboriosam. Quae itaque voluptatem iusto odit. Nihil et quia earum voluptas rerum architecto.', 156.61, 'https://via.placeholder.com/200x200.png/00ffdd?text=mollitia', 'sm', 'vert', 11, 17, 1, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(5, 'Palma Ruecker', 'At eum tenetur voluptas unde dolore. Ab pariatur incidunt consequatur. Nobis est consectetur sed.', 147.54, 'https://via.placeholder.com/200x200.png/00ee66?text=dolores', 'xxl', 'orange', 13, 5, 1, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(6, 'Mason Casper', 'Aut accusantium harum soluta eum suscipit et. Sint harum suscipit aut omnis qui. Fugit cum dolores quisquam animi amet. Quis est omnis asperiores nihil magnam.', 67.26, 'https://via.placeholder.com/200x200.png/0033bb?text=doloribus', 'sm', 'Gris', 24, 4, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(7, 'Alda Bechtelar', 'Voluptas dolorum et quidem facere et corporis. Placeat explicabo quos omnis. Ea voluptas et voluptatem consequatur est.', 68.00, 'https://via.placeholder.com/200x200.png/0077ee?text=facere', 'xxl', 'noir', 14, 10, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(8, 'Mr. Elroy Ortiz PhD', 'Quos dolorem ipsam unde quas architecto dolorum. Sint qui itaque deserunt aut qui. Voluptas et repudiandae aut omnis quas iusto voluptas.', 97.42, 'https://via.placeholder.com/200x200.png/005511?text=nihil', 'xl', 'jaune', 2, 20, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(9, 'Marielle McCullough', 'Facilis eos rerum quia aut occaecati non minus. Et illum et nisi animi temporibus aperiam ab. Minus voluptatibus labore deserunt.', 30.17, 'https://via.placeholder.com/200x200.png/003355?text=dolores', 'xs', 'rouge', 2, 9, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(10, 'Saige Hermann', 'Ipsam aliquam illum saepe quas consequatur magnam facere. Earum omnis odio saepe incidunt. Autem eius praesentium aut pariatur voluptas eligendi.', 89.32, 'https://via.placeholder.com/200x200.png/009999?text=earum', 'sm', 'noir', 6, 12, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(11, 'Annalise O\'Hara', 'Qui exercitationem eveniet cupiditate autem. Eligendi vel explicabo modi et consequatur. Aut id vitae asperiores eum aut voluptas.', 112.60, 'https://via.placeholder.com/200x200.png/008888?text=dignissimos', 'xs', 'orange', 21, 11, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(12, 'Audra Schultz', 'Enim ratione ducimus qui modi cupiditate est. Itaque enim est in in in a est in. Quia earum sit ipsam. Cumque dolorem voluptatibus rerum soluta quibusdam.', 84.93, 'https://via.placeholder.com/200x200.png/00aadd?text=maxime', 'xs', 'orange', 10, 6, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(13, 'Daniela Abernathy II', 'Necessitatibus sequi numquam sit ipsam est esse. Numquam vel temporibus sequi quia cum sunt repellat maiores. Praesentium sed ea enim itaque. Assumenda ut quia mollitia deserunt eius.', 155.17, 'https://via.placeholder.com/200x200.png/00cc88?text=magni', 'sm', 'bleu', 5, 4, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(14, 'Keith Oberbrunner', 'Aut modi commodi hic quia. Molestias et tenetur a praesentium quibusdam eveniet ipsam omnis. Ab ipsam earum dignissimos nostrum tenetur rem corporis. Sunt amet quidem eveniet et iste.', 57.20, 'https://via.placeholder.com/200x200.png/00ffff?text=ut', 'xxxl', 'noir', 50, 8, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(15, 'Genoveva Romaguera', 'Quo quas iste dolores aut minima. Qui dolores et doloribus laboriosam dolore. Eum et neque reiciendis reprehenderit.', 7.00, 'https://via.placeholder.com/200x200.png/0022cc?text=assumenda', 'xxl', 'jaune', 2, 13, 1, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(16, 'Buck Pfannerstill', 'Aut placeat est omnis odit. Consequuntur corporis omnis animi labore qui quis fuga. Nobis dolorum ullam fugiat consequatur et veniam voluptatem.', 37.41, 'https://via.placeholder.com/200x200.png/00aa11?text=temporibus', 'xl', 'Gris', 70, 12, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(17, 'Ervin Hyatt', 'Animi optio ipsa est amet porro officiis. Non autem ducimus reiciendis. Beatae quia animi sed deserunt. Aut quia ut dolorem provident itaque placeat.', 131.37, 'https://via.placeholder.com/200x200.png/00aa88?text=ut', 'xxxl', 'noir', 24, 20, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(18, 'Pattie Crooks', 'Aut nemo repellendus odit doloremque eveniet sint perferendis fugiat. Qui architecto qui et officia ullam tempora aut aut. Quaerat ipsum rerum qui sint.', 42.00, 'https://via.placeholder.com/200x200.png/00bb44?text=quo', 'xs', 'bleu', 13, 10, 1, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(19, 'Olen Schoen IV', 'Porro cupiditate ad doloremque qui facere voluptate. Exercitationem eum deserunt at eveniet qui dolore. Itaque sit est modi iste iusto.', 65.52, 'https://via.placeholder.com/200x200.png/0099aa?text=qui', 'xxl', 'jaune', 70, 3, 1, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(20, 'Prof. Lexi Gottlieb', 'Illo eos et enim velit placeat doloremque. Harum est facilis in beatae. Sed voluptas qui est. Occaecati unde esse ut quibusdam porro animi.', 108.89, 'https://via.placeholder.com/200x200.png/0099aa?text=quod', 'md', 'noir', 3, 17, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(21, 'Lilly O\'Conner', 'Et velit non ut veniam. Nesciunt quae aut unde rerum enim suscipit ut repellat. Consequatur corrupti doloremque qui nisi nostrum dolores.', 56.40, 'https://via.placeholder.com/200x200.png/008877?text=ea', 'xxxl', 'Gris', 13, 1, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(22, 'Eliza Kilback', 'Modi laborum nobis ut nam nostrum eos eum. Laudantium voluptatibus alias alias sed aut. Aperiam odio tenetur debitis.', 84.97, 'https://via.placeholder.com/200x200.png/00dd55?text=facere', 'md', 'orange', 21, 15, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(23, 'Eliane Hyatt', 'Laboriosam sint voluptas et culpa aut rerum est. Tenetur debitis at provident dolor temporibus. Amet nostrum magni aut saepe. Porro quia earum ipsum nobis est. Architecto sed magnam eos voluptas.', 76.90, 'https://via.placeholder.com/200x200.png/00aa33?text=omnis', 'sm', 'Gris', 11, 1, 1, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(24, 'Anna Wolf', 'Impedit aut qui laudantium qui et. Minus ut et pariatur voluptatem dolorum. Dolorem mollitia iure aliquam consequatur exercitationem quia.', 6.63, 'https://via.placeholder.com/200x200.png/0055dd?text=enim', 'xxl', 'orange', 8, 20, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(25, 'Flossie Zulauf', 'Aperiam et sint rerum ea quo. In aut reprehenderit voluptatem doloribus eaque sit ut. Fugit voluptatem sed rerum in soluta neque deserunt. Odit ab velit id natus cumque magnam cum.', 20.90, 'https://via.placeholder.com/200x200.png/00aa77?text=dicta', 'xxl', 'rouge', 2, 10, 1, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(26, 'Mr. Liam Mann', 'Facilis vitae nostrum sunt nostrum eos iusto vitae quia. Porro aliquam veritatis non. Quis dolorem veniam impedit. Ut illo omnis temporibus.', 106.50, 'https://via.placeholder.com/200x200.png/002200?text=sapiente', 'xl', 'vert', 14, 16, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(27, 'Estella Paucek', 'Aut et veniam cupiditate tenetur. Iusto ducimus corporis ea et consequatur itaque. Fugiat tempore atque fugiat recusandae deleniti eos magni.', 117.37, 'https://via.placeholder.com/200x200.png/00ddff?text=officiis', 'xxl', 'orange', 4, 20, 1, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(28, 'Miss Aaliyah Strosin', 'Sit repellat ut magnam impedit rerum. Modi hic aut temporibus consectetur nesciunt inventore quis. Id in aut laboriosam maiores.', 49.25, 'https://via.placeholder.com/200x200.png/001166?text=veritatis', 'xxl', 'jaune', 4, 12, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(29, 'Loyal Hegmann', 'Dolor mollitia labore assumenda inventore dolore corrupti. Qui sapiente quae sit unde velit. Voluptatum ab fuga debitis totam aspernatur.', 95.83, 'https://via.placeholder.com/200x200.png/00bbdd?text=earum', 'xxl', 'jaune', 2, 18, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(30, 'Janae Ullrich', 'A recusandae eligendi repellat id et deleniti numquam. Modi quam porro omnis in velit. Occaecati distinctio ut dolorum. Error nihil sit officia.', 25.09, 'https://via.placeholder.com/200x200.png/00ff33?text=eos', 'xs', 'Gris', 9, 5, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(31, 'Jordane Mills', 'Facilis et neque sunt totam sed ut. Eos et ullam porro assumenda et. Repudiandae sed laborum voluptates nihil ad tenetur. Suscipit ea blanditiis atque quis est.', 149.30, 'https://via.placeholder.com/200x200.png/0011ee?text=eaque', 'xs', 'noir', 10, 12, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(32, 'Nella Reichel V', 'Culpa repudiandae dolorem non rem. Temporibus nihil eum aut aspernatur. Nihil ad sed quas dolores vel enim dolorem.', 68.17, 'https://via.placeholder.com/200x200.png/004433?text=tempore', 'xl', 'Gris', 4, 21, 1, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(33, 'Myrtie Gleason', 'Distinctio ad explicabo voluptatem inventore sed incidunt accusantium non. Unde consequuntur et voluptatem quam. Earum totam numquam maiores accusantium perspiciatis labore qui quo.', 44.60, 'https://via.placeholder.com/200x200.png/00ffee?text=similique', 'xxxl', 'noir', 7, 22, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(34, 'Prof. Pierre Carter III', 'Labore aut accusamus quia voluptas sequi illo. Explicabo et quidem id tempore impedit qui. Recusandae sint rerum maiores vel. Ut quisquam eligendi similique eos.', 15.77, 'https://via.placeholder.com/200x200.png/00aa88?text=quia', 'xxxl', 'jaune', 50, 1, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(35, 'Nannie Cruickshank I', 'Enim nulla error non est quos consequatur deleniti. Reprehenderit inventore tempora non eum. Eligendi sit facere sapiente et quo vitae esse eius. Quia et delectus fuga odit.', 155.70, 'https://via.placeholder.com/200x200.png/00cc11?text=cumque', 'xxxl', 'noir', 9, 5, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(36, 'Prof. Alessia Blanda II', 'Qui ut voluptas magni inventore. Quia eos magni qui deleniti. Et enim sed est alias vel. Eius nihil ea expedita nihil. Qui itaque esse omnis optio totam.', 53.00, 'https://via.placeholder.com/200x200.png/00ccee?text=molestiae', 'xs', 'blanc', 5, 16, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(37, 'Prof. Lewis Schmitt', 'Ex quidem sed exercitationem ipsa. Voluptatem earum nihil doloribus sint. Ratione enim cupiditate nemo dolore necessitatibus consectetur et. Iste nemo dolorum aut repellendus officiis.', 84.65, 'https://via.placeholder.com/200x200.png/00bb66?text=maxime', 'md', 'noir', 7, 3, 3, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(38, 'Jasper Fisher', 'Necessitatibus non voluptatem aut. Rerum voluptatibus neque enim ratione aut aut. Quidem dolores tempore rem officiis. Nihil porro non animi aperiam. Et iste et deserunt omnis.', 62.93, 'https://via.placeholder.com/200x200.png/00ffee?text=tenetur', 'xxl', 'bleu', 4, 5, 1, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(39, 'Marianne Koss PhD', 'Commodi praesentium voluptas tempore. Debitis nobis quos repudiandae minima sint. Est ut unde est libero ipsam est fugit.', 42.00, 'https://via.placeholder.com/200x200.png/00cc22?text=ad', 'xxxl', 'bleu', 24, 2, 1, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(40, 'Rogers Mraz Jr.', 'Asperiores qui quia ipsam alias illo. Adipisci consectetur nostrum facilis dignissimos quis. Quas sint voluptatem ut.', 66.84, 'https://via.placeholder.com/200x200.png/0088ee?text=sequi', 'xxl', 'blanc', 61, 8, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(41, 'Javonte Gutkowski', 'Ratione reiciendis dolor quia ducimus et et et. Architecto in fugit reiciendis rerum neque eligendi. Itaque qui earum et praesentium id.', 47.00, 'https://via.placeholder.com/200x200.png/00cc55?text=sit', 'xs', 'blanc', 52, 20, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(42, 'Mrs. Shyanne O\'Connell', 'Corrupti explicabo velit saepe voluptate. Saepe et assumenda praesentium ex. Voluptates blanditiis rerum officiis.', 140.79, 'https://via.placeholder.com/200x200.png/009944?text=assumenda', 'xxxl', 'noir', 12, 21, 2, '2023-03-24 20:08:00', '2023-03-24 20:08:00', 0),
(43, 'Brennon Kutch MD', 'Nihil provident laborum culpa maxime ut aut. Autem adipisci ad hic sit reiciendis maxime. Et ducimus maiores non tempora molestiae minima quos. Ut qui repellendus repellat reprehenderit culpa.', 64.38, 'https://via.placeholder.com/200x200.png/0099cc?text=minima', 'xl', 'noir', 52, 5, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(44, 'Dora Crona', 'Voluptatem sunt laborum voluptate nobis ullam. Dicta eos dolor harum possimus delectus. Reprehenderit aspernatur quia iure qui sit. Officiis dolore sunt dolore qui.', 94.28, 'https://via.placeholder.com/200x200.png/00ff00?text=at', 'xl', 'orange', 50, 8, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(45, 'Luisa Quigley', 'Labore et rem possimus nostrum qui consequatur maiores. Eos iste dolorum suscipit unde modi facere provident non.', 3.64, 'https://via.placeholder.com/200x200.png/008899?text=dolor', 'xl', 'blanc', 10, 17, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(46, 'Keyon Orn MD', 'Excepturi est laudantium natus recusandae aliquam totam. Ratione libero non porro. Minima sapiente quo soluta aut explicabo aut. Architecto cum quam ut quam sunt ut.', 101.12, 'https://via.placeholder.com/200x200.png/008811?text=velit', 'sm', 'rouge', 5, 4, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(47, 'Florine Reichert V', 'Voluptatem qui cum esse aperiam repellendus libero. Veritatis quis eos totam minus ad ipsa sed. Sunt labore voluptatem ipsa quasi nemo magnam.', 18.03, 'https://via.placeholder.com/200x200.png/006633?text=nisi', 'sm', 'orange', 50, 12, 2, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(48, 'Gerald O\'Keefe', 'Vitae iure tempore dolor modi voluptas quae voluptatum vel. Non enim omnis non velit corrupti atque. Rerum dignissimos voluptate labore doloribus ut officiis.', 74.10, 'https://via.placeholder.com/200x200.png/00ffaa?text=ut', 'sm', 'rouge', 9, 9, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(49, 'Dr. Flavio McCullough', 'Nisi et repellat autem nisi qui rerum. Quae neque eligendi nisi. Aut quaerat enim eligendi eveniet. Quibusdam labore consequuntur veritatis eius.', 147.46, 'https://via.placeholder.com/200x200.png/0088cc?text=error', 'xxl', 'bleu', 13, 16, 2, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(50, 'Mr. Jack Keeling', 'Numquam animi minus delectus placeat debitis cupiditate ipsum facere. Consectetur unde et odio dolorum aperiam incidunt possimus. Sapiente voluptatibus totam eum dolor consequatur soluta natus iure.', 115.95, 'https://via.placeholder.com/200x200.png/00bb00?text=libero', 'sm', 'blanc', 14, 18, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(51, 'Einar Okuneva', 'Omnis et est illo atque odit quis at. Et eveniet asperiores non sit quia repellat. Quisquam harum minima cum laboriosam vel voluptatem quaerat aperiam.', 35.80, 'https://via.placeholder.com/200x200.png/0055cc?text=quo', 'xl', 'bleu', 3, 10, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(52, 'Kira Anderson', 'Ut iusto labore libero aut quos maxime expedita. Mollitia veniam sit quis temporibus dolore possimus at. Architecto a ex et sint in. Accusamus voluptatum et quia dolorem quis et.', 25.55, 'https://via.placeholder.com/200x200.png/0022bb?text=delectus', 'xl', 'orange', 70, 7, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(53, 'Clifford Ferry', 'Pariatur nesciunt voluptas eos et ut. Et debitis pariatur nostrum facere rem ut doloremque eveniet. Neque odio necessitatibus eos molestiae.', 93.90, 'https://via.placeholder.com/200x200.png/00cc00?text=cupiditate', 'xxl', 'vert', 21, 9, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(54, 'Jayda Stiedemann MD', 'Qui voluptatem provident veritatis iste voluptatem. Sit et qui ipsam. Consequatur natus rem tempora inventore alias pariatur sequi nemo.', 56.00, 'https://via.placeholder.com/200x200.png/00bbbb?text=totam', 'xs', 'blanc', 24, 5, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(55, 'Graham Prohaska IV', 'Est similique maxime voluptatem iure. Maxime ea aut dolores qui. Reiciendis inventore porro dicta cupiditate voluptatibus assumenda illum qui.', 86.93, 'https://via.placeholder.com/200x200.png/00cc99?text=numquam', 'xxl', 'blanc', 5, 5, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(56, 'Teagan Yost Sr.', 'Et et quasi amet. Hic nesciunt qui debitis non. Sunt sit eum eaque enim.', 133.45, 'https://via.placeholder.com/200x200.png/003344?text=voluptatem', 'xl', 'orange', 12, 20, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(57, 'Damian Hodkiewicz', 'Amet magnam quia quo ad ut dicta voluptatum magnam. Voluptas dignissimos aliquam magnam eligendi dolorum odio. Nulla officiis ea iste sit ipsam tempore. Omnis ut voluptas reiciendis labore.', 46.99, 'https://via.placeholder.com/200x200.png/0066ff?text=animi', 'md', 'noir', 7, 7, 2, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(58, 'Miss Madelynn Larson', 'Optio eum ipsum ut minus sit. Nam non tenetur optio modi deserunt tempore porro. Natus reprehenderit reiciendis eaque animi eos eius expedita. Deleniti doloribus libero aut ipsum et sunt voluptatem.', 46.40, 'https://via.placeholder.com/200x200.png/00ee55?text=dolores', 'sm', 'bleu', 4, 10, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(59, 'Jada Reilly', 'Fugit commodi sit quis placeat non. Aliquam dolor provident qui provident quis ipsum. Et illum dolorem rem laborum id nihil. Doloremque est maxime temporibus et ut perspiciatis.', 43.11, 'https://via.placeholder.com/200x200.png/005511?text=culpa', 'xl', 'orange', 1, 22, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(60, 'Prof. Judd Upton', 'Quidem fuga reiciendis iste ex. Modi aut at error aliquid. Vitae dolore et voluptas ad expedita qui ut.', 57.00, 'https://via.placeholder.com/200x200.png/0044dd?text=debitis', 'sm', 'Gris', 24, 18, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(61, 'Juvenal Medhurst IV', 'Velit unde fugiat et modi ad. Ut saepe sequi tenetur dolorem. Sed odio aliquam aut commodi dolor aut. Quibusdam quo occaecati tempore mollitia est sequi.', 6.08, 'https://via.placeholder.com/200x200.png/000011?text=doloremque', 'xl', 'rouge', 9, 19, 2, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(62, 'Trisha Hilpert DDS', 'Eligendi iste quasi autem similique nihil. Impedit ea ex pariatur ad sit quo. Omnis et esse magni officia vel ipsum.', 132.64, 'https://via.placeholder.com/200x200.png/002244?text=provident', 'md', 'orange', 10, 2, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(63, 'Dr. Makenna Rohan', 'Voluptatum accusantium aut reprehenderit est tenetur quae. Rerum nostrum iusto vel laborum nam molestias. Quia ut veniam cupiditate sint recusandae delectus. Suscipit aperiam qui delectus fugiat.', 28.37, 'https://via.placeholder.com/200x200.png/00cc55?text=quia', 'xs', 'orange', 8, 18, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(64, 'Jeffrey Lockman Jr.', 'Nihil voluptatibus sed magni illo qui. Eveniet reiciendis quam qui ea quis voluptatibus voluptates ipsam. Est commodi est id quia.', 32.57, 'https://via.placeholder.com/200x200.png/00aa11?text=omnis', 'sm', 'jaune', 6, 15, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(65, 'Liliana Hammes', 'Culpa autem voluptatem illum quo atque. Nihil excepturi animi veritatis tempora voluptas tenetur officiis. Recusandae qui sed necessitatibus odit minima.', 49.46, 'https://via.placeholder.com/200x200.png/00cc44?text=ut', 'xs', 'bleu', 4, 12, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(66, 'Katherine Cummings', 'Adipisci doloribus voluptatem nobis. Animi et vitae voluptatem sint facere. Laudantium aut esse impedit aut. Molestiae consequatur soluta incidunt voluptas saepe qui id.', 132.00, 'https://via.placeholder.com/200x200.png/0066dd?text=aut', 'xl', 'vert', 10, 17, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(67, 'Prof. Benton Grant', 'Et non perspiciatis fugit numquam eos. Ipsum fuga minima et dolorem iure velit sed. Deserunt dignissimos sit consequatur omnis possimus. Saepe perferendis impedit et dolorem rerum ex consequatur.', 138.00, 'https://via.placeholder.com/200x200.png/005599?text=quia', 'xxl', 'bleu', 61, 14, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(68, 'Helga Borer', 'Itaque maiores earum qui corporis totam. Molestias velit ex quia dignissimos sit rerum. Sapiente sed est dignissimos. Rerum omnis et ducimus aliquid. Pariatur in quis eos.', 125.17, 'https://via.placeholder.com/200x200.png/00cc22?text=sequi', 'xl', 'blanc', 6, 12, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(69, 'Prof. Rod Jones I', 'Eius ipsa dolorem ipsum dolorum illo corporis est. Quia maiores accusamus amet officiis neque.', 23.00, 'https://via.placeholder.com/200x200.png/0011ee?text=tenetur', 'xxxl', 'jaune', 70, 12, 2, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(70, 'Miss Susie Jacobson Sr.', 'Illum iusto odio quos illo nisi velit et. Et non qui ratione illo. Dolores ipsum adipisci sapiente illum et aliquam.', 125.76, 'https://via.placeholder.com/200x200.png/009922?text=ullam', 'xs', 'blanc', 5, 3, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(71, 'Skylar Treutel', 'Nesciunt sed velit consequuntur necessitatibus quasi assumenda voluptas. Temporibus perferendis quia odit quia. Quia nihil officiis consequatur eum. Ut tempora ducimus soluta.', 79.89, 'https://via.placeholder.com/200x200.png/004433?text=velit', 'sm', 'blanc', 22, 11, 2, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(72, 'Skyla Ondricka', 'Qui distinctio laborum at explicabo harum molestias aut. Ducimus non totam repellat et. Quasi mollitia sunt qui ipsum illo corrupti. Perspiciatis sed explicabo commodi at quam suscipit ex.', 129.17, 'https://via.placeholder.com/200x200.png/00aaff?text=maxime', 'sm', 'Gris', 4, 17, 2, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(73, 'Dayton Pacocha', 'Et qui sed ipsum officia. Est ut quidem voluptatem architecto non aut sit sapiente. Excepturi repellendus tempora velit ut numquam quidem sapiente.', 62.10, 'https://via.placeholder.com/200x200.png/00ff77?text=dolore', 'xxxl', 'blanc', 70, 4, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(74, 'Duane Goodwin', 'Quia quis dolore incidunt. Velit vel similique eius. Quia harum adipisci sed aut sint libero. Voluptatem quia cum similique. Nisi sequi odit quis minus et. Ab et et id commodi et laborum harum.', 53.00, 'https://via.placeholder.com/200x200.png/00aaff?text=aut', 'xxl', 'Gris', 21, 1, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(75, 'Ryley Abbott', 'Quia eius et voluptas animi iure. Nam et voluptates et est fugiat. Labore et in deleniti sit qui. Accusantium eveniet ea debitis debitis debitis placeat.', 146.88, 'https://via.placeholder.com/200x200.png/00dd88?text=qui', 'xxl', 'jaune', 14, 5, 2, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(76, 'Lucius Mann', 'Voluptate dolores nihil necessitatibus possimus. Vitae tenetur ut suscipit ut. Odio nulla deserunt iusto quia.', 87.53, 'https://via.placeholder.com/200x200.png/0011dd?text=ex', 'sm', 'bleu', 24, 10, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(77, 'Mrs. Melba Marvin', 'Ullam dolor non quas iste velit. Iure voluptas occaecati quia quas.', 47.10, 'https://via.placeholder.com/200x200.png/00eeee?text=inventore', 'md', 'rouge', 3, 9, 1, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(78, 'Kiana Huel Sr.', 'Commodi qui delectus est modi est eos. Id earum voluptatem enim qui enim nisi. Est neque cumque a enim sunt saepe voluptas. Laboriosam minus qui aut dolorem architecto.', 145.91, 'https://via.placeholder.com/200x200.png/00bb33?text=aperiam', 'sm', 'Gris', 11, 14, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(79, 'Mr. Moises Stroman II', 'Sequi magnam et atque et quidem. Hic voluptatem sit non atque ut. Deleniti praesentium soluta labore eos fuga.', 26.27, 'https://via.placeholder.com/200x200.png/00cc11?text=earum', 'md', 'bleu', 22, 7, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(80, 'Hank Kuvalis DVM', 'At exercitationem labore excepturi harum sit. Eius ad pariatur similique ab. Ducimus maxime quasi omnis quo nemo. Natus distinctio quisquam et blanditiis tempore doloremque autem qui.', 3.60, 'https://via.placeholder.com/200x200.png/009977?text=deleniti', 'sm', 'blanc', 22, 3, 3, '2023-03-24 20:08:01', '2023-03-24 20:08:01', 0),
(82, 'test 2', 'test 2 test 2 test 2 test 2 test 2 test 2test 2 test 2test 2 test 2 test 2', 1230.00, '1680956991_devops_roadmap.jpg', '123', 'fi', 122, 2, 3, '2023-04-08 12:29:51', '2023-04-08 12:29:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `date_u` date NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `tel`, `date_u`, `email_verified_at`, `photo`, `password`, `id_ville`, `remember_token`, `created_at`, `updated_at`, `isAdmin`, `is_deleted`) VALUES
(1, 'Jacklyn Bailey', 'Effertz, Brown and Willms', 'groob@example.org', '(626) 893-0564', '2008-09-18', '2023-03-24 19:39:15', 'https://via.placeholder.com/200x200.png/000044?text=qui', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '3fRzlIHtZe', '2023-03-24 19:39:15', '2023-03-24 19:39:15', 1, 0),
(2, 'Cesar Cruickshank', 'Huels-Schinner', 'hdaugherty@example.com', '(701) 873-9542', '2019-04-01', '2023-03-24 19:39:15', 'https://via.placeholder.com/200x200.png/007755?text=omnis', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9, 'RLISeLuoWF', '2023-03-24 19:39:15', '2023-04-09 00:56:10', 0, 0),
(3, 'Dell Christiansen', 'Ferry-Hermann', 'rbogan@example.com', '+1-267-569-7929', '2020-04-19', '2023-03-24 19:39:15', 'https://via.placeholder.com/200x200.png/00dd00?text=nemo', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 15, 'j3b5CMb4di', '2023-03-24 19:39:15', '2023-03-24 19:39:15', 0, 0),
(4, 'Stephen Schaden Sr.', 'Cole-Donnelly', 'ahowe@example.net', '+1-678-305-1756', '2011-01-08', '2023-03-24 19:39:15', 'https://via.placeholder.com/200x200.png/0066ee?text=sequi', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 10, 'RQf7wBRQlD', '2023-03-24 19:39:15', '2023-03-24 19:39:15', 0, 0),
(5, 'Petra Rolfson', 'Welch LLC', 'gislason.pinkie@example.org', '+1 (816) 228-3192', '2016-08-26', '2023-03-24 19:39:15', 'https://via.placeholder.com/200x200.png/00bb66?text=voluptate', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 13, 'CgdpaVgWsb', '2023-03-24 19:39:15', '2023-03-24 19:39:15', 0, 0),
(6, 'Ellsworth Champlin Sr.', 'Hane-Stanton', 'cole50@example.org', '1-301-992-0980', '2011-03-12', '2023-03-24 19:39:15', 'https://via.placeholder.com/200x200.png/005588?text=officiis', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 19, 'Zruclh0NEC', '2023-03-24 19:39:15', '2023-03-24 19:39:15', 0, 0),
(7, 'Miss Nia Watsica I', 'Hessel and Sons', 'helga.lehner@example.com', '+1.606.975.2100', '2014-09-08', '2023-03-24 19:39:15', 'https://via.placeholder.com/200x200.png/00ff22?text=eveniet', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 17, 'WqW1p5aWXW', '2023-03-24 19:39:15', '2023-03-24 19:39:15', 0, 0),
(8, 'Cristal Lindgren', 'Harris Ltd', 'sabryna.rath@example.org', '1-430-822-4209', '2021-08-29', '2023-03-24 19:39:15', 'https://via.placeholder.com/200x200.png/009988?text=veritatis', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 19, 'IgeDXa3wK2', '2023-03-24 19:39:16', '2023-03-24 19:39:16', 0, 0),
(9, 'Mrs. Chelsie Greenholt', 'Leffler-Wyman', 'rutherford.kristin@example.org', '941.614.5725', '2010-11-09', '2023-03-24 19:39:15', 'https://via.placeholder.com/200x200.png/009900?text=dolorem', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 9, 'DnMiFpxoo2', '2023-03-24 19:39:16', '2023-03-24 19:39:16', 0, 0),
(10, 'Bonnie Batz', 'Brekke, Kilback and Reinger', 'twuckert@example.org', '+1-754-532-9493', '2015-02-01', '2023-03-24 19:39:15', 'https://via.placeholder.com/200x200.png/004499?text=quos', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 14, 'GnwPyICwqk', '2023-03-24 19:39:16', '2023-03-24 19:39:16', 0, 0),
(13, 'admin 2', 'admin 2', 'saidaitdrissofficial@gmail.com', '204923094', '2023-04-11', NULL, '1680968946_img.jpg', '$2y$10$ZA.vtIIgpSESjgdelstG5OjgpHavgqH3yXHc.Yi7otvoq4TV5/W.O', -1, NULL, '2023-04-08 14:51:40', '2023-04-09 01:09:56', 1, 0),
(14, 'rokaia', 'tigerti', 'rokaia@gmail.com', '09249234923', '2023-04-03', NULL, '1681002752_Blank Background Jpg Picture.jpg', '$2y$10$a1EmICw8R1aaTqlH7T9g4OZZugOuXQxBMtkhEKn8/sX.2HDrpYNW2', -1, NULL, '2023-04-09 01:12:32', '2023-04-09 01:12:32', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomVille` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id`, `nomVille`, `created_at`, `updated_at`, `is_deleted`) VALUES
(1, 'Agadir', NULL, '2023-04-09 01:00:14', 0),
(2, 'Boujdour', NULL, NULL, 0),
(3, 'Beni Mellal', NULL, NULL, 0),
(4, 'Casablanca', NULL, NULL, 0),
(5, 'Chefchaouen', NULL, NULL, 0),
(6, 'Dakhla', NULL, NULL, 0),
(7, 'El Jadida', NULL, NULL, 0),
(8, 'Essaouira', NULL, NULL, 0),
(9, 'Fès', NULL, NULL, 0),
(10, 'Guelmim', NULL, NULL, 0),
(11, 'Laâyoune', NULL, NULL, 0),
(12, 'Marrakech', NULL, NULL, 0),
(13, 'Martil', NULL, NULL, 0),
(14, 'Nador', NULL, NULL, 0),
(15, 'Ouarzazate', NULL, NULL, 0),
(16, 'Rabat', NULL, NULL, 0),
(17, 'Safi', NULL, NULL, 0),
(18, 'Settat', NULL, NULL, 0),
(19, 'Zagora', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ecoles`
--
ALTER TABLE `ecoles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etudiant_matieres`
--
ALTER TABLE `etudiant_matieres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordre_produits`
--
ALTER TABLE `ordre_produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_tel_unique` (`tel`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `ecoles`
--
ALTER TABLE `ecoles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `etudiant_matieres`
--
ALTER TABLE `etudiant_matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `ordre_produits`
--
ALTER TABLE `ordre_produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `packs`
--
ALTER TABLE `packs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
