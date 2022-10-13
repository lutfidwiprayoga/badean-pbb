-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2022 pada 04.30
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
-- Database: `badean_pbb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cetaks`
--

CREATE TABLE `cetaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pbb_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_print` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cetaks`
--

INSERT INTO `cetaks` (`id`, `pbb_id`, `tanggal_print`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(2, 2, NULL, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(3, 3, NULL, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(4, 4, NULL, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(5, 5, NULL, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(6, 6, NULL, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(7, 7, NULL, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(8, 8, NULL, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(9, 9, NULL, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(10, 10, NULL, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(11, 8, NULL, '2022-09-05 07:46:24', '2022-09-05 07:46:24'),
(12, 9, NULL, '2022-09-05 08:13:11', '2022-09-05 08:13:11'),
(13, 10, NULL, '2022-09-11 18:14:33', '2022-09-11 18:14:33'),
(14, 11, NULL, '2022-09-11 18:27:15', '2022-09-11 18:27:15');

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
(32, '2014_10_12_000000_create_users_table', 1),
(33, '2014_10_12_100000_create_password_resets_table', 1),
(34, '2019_08_19_000000_create_failed_jobs_table', 1),
(35, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(36, '2022_08_24_133932_create_pbbs_table', 1),
(37, '2022_08_24_134604_create_cetaks_table', 1),
(38, '2022_08_24_135016_create_niks_table', 1),
(39, '2022_08_25_154202_create_nops_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `niks`
--

CREATE TABLE `niks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `niks`
--

INSERT INTO `niks` (`id`, `nik`, `created_at`, `updated_at`) VALUES
(1, '3510141204760002', '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(2, '3510144407800006', '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(3, '3510140404050002', '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(4, '3510142712060002', '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(5, '3510141404600002', '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(6, '3510145004600003', '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(7, '3510145611450003', '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(8, '3510141010850006', '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(9, '3510144411900004', '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(10, '3510141512060005', '2022-08-25 10:02:17', '2022-08-25 10:02:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nops`
--

CREATE TABLE `nops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nop` bigint(20) NOT NULL,
  `nama_wp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_wp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nops`
--

INSERT INTO `nops` (`id`, `user_id`, `nop`, `nama_wp`, `alamat_wp`, `created_at`, `updated_at`) VALUES
(1, 2, 351025000703000050, 'ABD. AZIZ, SH', 'DSN JATISARI', '2022-08-29 20:54:31', '2022-09-05 07:37:03'),
(2, 2, 351025000703000060, 'HOLILAH', 'DSN JATISARI', '2022-08-29 20:54:31', '2022-08-29 20:54:31'),
(3, 3, 351025000703000090, 'SUHRAN P FAUZI', 'DSN JATISARI', '2022-08-29 20:54:31', '2022-08-29 20:54:31'),
(4, 4, 351025000703000110, 'H. MAHRUS', 'DSN JATISARI', '2022-08-29 20:54:31', '2022-08-29 20:54:31'),
(5, 5, 351025000703000120, 'MANSURI', 'DSN JATISARI', '2022-08-29 20:54:31', '2022-08-29 20:54:31'),
(6, 6, 351025000703600340, 'ALIMI', 'DSN JATISARI', '2022-08-29 20:54:31', '2022-08-29 20:54:31'),
(7, 7, 351025000703600710, 'SATUNI', 'DSN JATISARI', '2022-08-29 20:54:31', '2022-08-29 20:54:31'),
(8, 8, 35102500702000150, 'ABD AZIZ, SH', 'DSN JATISARI', '2022-08-29 21:29:56', '2022-08-29 21:29:56');

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
-- Struktur dari tabel `pbbs`
--

CREATE TABLE `pbbs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nop_id` bigint(20) UNSIGNED NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pbb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `denda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kekurangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jatuh_tempo` date DEFAULT NULL,
  `status_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_bayar` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pbbs`
--

INSERT INTO `pbbs` (`id`, `nop_id`, `tahun`, `pbb`, `denda`, `kekurangan`, `jatuh_tempo`, `status_bayar`, `kode_bayar`, `created_at`, `updated_at`) VALUES
(1, 7, '2021', '28934', '0', '0', '2022-08-30', 'LUNAS', 202208037, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(2, 1, '2021', '76645', '0', '0', '2022-08-30', 'LUNAS', 202208038, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(3, 2, '2021', '38754', '0', '0', '2022-08-30', 'LUNAS', 202208032, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(4, 6, '2021', '16622', '0', '0', '2022-08-30', 'LUNAS', 202208036, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(5, 3, '2021', '82814', '0', '0', '2022-08-30', 'LUNAS', 202208033, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(6, 4, '2021', '33760', '0', '0', '2022-08-30', 'LUNAS', 202208034, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(7, 5, '2021', '22000', '0', '0', '2022-08-30', 'LUNAS', 202208035, '2022-08-29 20:54:42', '2022-08-29 20:54:42'),
(8, 7, '2022', '30000', '5000', '5000', '2022-09-09', 'LUNAS', 202209067, '2022-09-05 08:13:11', '2022-09-06 00:16:48');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `nik`, `alamat`, `no_hp`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'admin@gmail.com', 'admin', '-', 'DNS JATISARI', '-', 'admin', NULL, '$2y$10$IKtdrNqfYYR6SxSc4/h/H.uB8MlbXLS7DrNpoiZvepYcu80pJR1rq', NULL, '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(2, 'HOLILAH', 'holilah@gmail.com', 'holisah', '3510144308700004', 'DNS JATISARI', '', 'masyarakat', NULL, '$2y$10$rsQ.snqBiqFKv50yelTj2.NyXpwSF5ufy28xfJW.6bIENv63.XIV.', NULL, '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(3, 'SUHRAN', 'suhran@gmail.com', 'suhran', '3510140107650119', 'DNS JATISARI', '', 'masyarakat', NULL, '$2y$10$/R/Fg9H4/sjxiawqvndFcu1mp84rYsUHPfFiY89/euEd4BFjTIpLy', NULL, '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(4, 'H. MAHRUS', 'mahrus@gmail.com', 'mahrus', '3510141006400006', 'DNS JATISARI', '', 'masyarakat', NULL, '$2y$10$Pkrpge.s.uOBwS/UYfOs3OImRzutnfyBgOcpTgPUJjXfHXRYk4woO', NULL, '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(5, 'MANSURI', 'mansuri@gmail.com', 'mansuri', '3510140307480004', 'DNS JATISARI', '', 'masyarakat', NULL, '$2y$10$ptGggESCphoKm2v6I1gCxO3mLCgC9tj4AM7v.FaP5BSuYmo1uv59.', NULL, '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(6, 'ALIMI', 'alimi@gmail.com', 'alimi', '3510142310930001', 'DNS JATISARI', '', 'masyarakat', NULL, '$2y$10$9CAhOPq.xFWKSfe0E3Gq4OtuNbv9qgPKm2V52i1JKAy4cb0EaxMCa', NULL, '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(7, 'SATUNI', 'satuni@gmail.com', 'satuni', '3510141204760002', 'DNS JATISARI', '', 'masyarakat', NULL, '$2y$10$Edd1VH1U9ohwXChft/3ax.bXRCZDy.03VfX3iPnKytIL.WxnMszNa', NULL, '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(8, 'ABD AZIZ, SH', 'abdaziz@gmail.com', 'abdaziz', '3510141402780005', 'DNS JATISARI', '', 'masyarakat', NULL, '$2y$10$aUr4h3kfTos/Y3x9wC2VT.GrhiI7z2KAodsBD/iKpR1LN2dKjeb5S', NULL, '2022-08-25 10:02:17', '2022-08-25 10:02:17'),
(9, 'Muhammad Hizbi', 'muhammadhizbi@gmail.com', 'muh.hizbi', '351025000701900220', 'DSN JATISARI', '085311526205', 'masyarakat', NULL, '$2y$10$EmJFq.VAEKCoUzlmqg3.w.I4DXJhugUj7cH3B//K8hCq/l13TeTzu', NULL, '2022-08-25 10:26:06', '2022-08-25 10:26:06'),
(10, 'Suprapto', 'suprapto@gmail.com', 'suprapto', '3550112548000002', 'DSN SUKOJATI', '088252443221', 'kepala_desa', NULL, '$2y$10$ASUxzZTTcZ34nS5EeK.BVuQ0lmz.7M2M0hzop.ff55l.7XiDMs4MO', NULL, '2022-10-12 19:19:31', '2022-10-12 19:19:31');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cetaks`
--
ALTER TABLE `cetaks`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `niks`
--
ALTER TABLE `niks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nops`
--
ALTER TABLE `nops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nops_nop_unique` (`nop`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pbbs`
--
ALTER TABLE `pbbs`
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
-- AUTO_INCREMENT untuk tabel `cetaks`
--
ALTER TABLE `cetaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `niks`
--
ALTER TABLE `niks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nops`
--
ALTER TABLE `nops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pbbs`
--
ALTER TABLE `pbbs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
