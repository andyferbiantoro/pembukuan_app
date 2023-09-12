-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2023 pada 03.00
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembukuan_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_09_03_033145_create_panens_table', 1),
(6, '2023_09_03_033642_create_penjualans_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `panens`
--

CREATE TABLE `panens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hari_panen` varchar(255) NOT NULL,
  `tanggal_panen` date NOT NULL,
  `jam_panen` time NOT NULL,
  `berat_panen` int(11) NOT NULL,
  `status_penjualan` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `panens`
--

INSERT INTO `panens` (`id`, `hari_panen`, `tanggal_panen`, `jam_panen`, `berat_panen`, `status_penjualan`, `created_at`, `updated_at`) VALUES
(5, 'Senin', '2023-08-28', '06:36:00', 3, 'terjual', '2023-09-03 18:36:38', '2023-09-03 18:44:08'),
(6, 'Selasa', '2023-08-29', '06:40:00', 3, 'terjual', '2023-09-03 18:38:13', '2023-09-03 18:44:25'),
(7, 'Rabu', '2023-08-30', '05:38:00', 4, 'terjual', '2023-09-03 18:38:43', '2023-09-03 18:45:02'),
(8, 'Kamis', '2023-08-31', '05:38:00', 4, 'terjual', '2023-09-03 18:39:26', '2023-09-03 18:45:16'),
(9, 'Jumat', '2023-09-01', '05:39:00', 4, 'terjual', '2023-09-03 18:40:06', '2023-09-03 18:45:40'),
(10, 'Sabtu', '2023-09-02', '05:40:00', 4, 'terjual', '2023-09-03 18:40:32', '2023-09-03 18:46:06'),
(11, 'Minggu', '2023-09-03', '05:31:00', 10, 'terjual', '2023-09-03 18:43:01', '2023-09-03 18:46:21'),
(12, 'Senin', '2023-09-04', '05:28:00', 5, 'terjual', '2023-09-03 18:43:20', '2023-09-03 18:46:39'),
(15, 'Selasa', '2023-09-05', '05:17:00', 4, 'terjual', '2023-09-04 17:17:51', '2023-09-04 17:18:05'),
(16, 'Kamis', '2023-09-07', '05:29:00', 5, 'terjual', '2023-09-06 15:48:50', '2023-09-06 15:51:38'),
(17, 'Minggu', '2023-09-10', '05:08:00', 8, 'terjual', '2023-09-09 16:08:22', '2023-09-09 17:20:19'),
(18, 'Selasa', '2023-09-12', '05:18:00', 5, 'terjual', '2023-09-11 17:19:07', '2023-09-11 17:19:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualans`
--

CREATE TABLE `penjualans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_panen` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penjualans`
--

INSERT INTO `penjualans` (`id`, `id_panen`, `nominal`, `tanggal`, `created_at`, `updated_at`) VALUES
(4, 5, 3000, '2023-08-28', '2023-09-03 18:44:08', '2023-09-03 18:44:08'),
(5, 6, 3000, '2023-08-29', '2023-09-03 18:44:25', '2023-09-03 18:44:25'),
(6, 7, 6000, '2023-08-30', '2023-09-03 18:45:02', '2023-09-03 18:45:02'),
(7, 8, 6000, '2023-08-31', '2023-09-03 18:45:16', '2023-09-03 18:45:16'),
(8, 9, 6000, '2023-09-01', '2023-09-03 18:45:40', '2023-09-03 18:45:40'),
(9, 10, 6000, '2023-09-02', '2023-09-03 18:46:06', '2023-09-03 18:46:06'),
(10, 11, 12000, '2023-09-03', '2023-09-03 18:46:21', '2023-09-03 18:46:21'),
(11, 12, 6000, '2023-09-04', '2023-09-03 18:46:39', '2023-09-03 18:46:39'),
(12, 15, 6000, '2023-09-05', '2023-09-04 17:18:05', '2023-09-04 17:18:05'),
(13, 16, 6000, '2023-09-07', '2023-09-06 15:51:37', '2023-09-06 15:51:37'),
(14, 17, 9000, '2023-09-10', '2023-09-09 17:20:19', '2023-09-09 17:20:19'),
(15, 18, 6000, '2023-09-12', '2023-09-11 17:19:20', '2023-09-11 17:19:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `panens`
--
ALTER TABLE `panens`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `panens`
--
ALTER TABLE `panens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `penjualans`
--
ALTER TABLE `penjualans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
