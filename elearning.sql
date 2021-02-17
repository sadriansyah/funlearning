-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Feb 2021 pada 01.24
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_challenge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_challenge` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `pilihan1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihanbenar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin_challenge` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `challenges`
--

INSERT INTO `challenges` (`id`, `id_author`, `id_kelas`, `judul_challenge`, `deskripsi_challenge`, `waktu_mulai`, `waktu_selesai`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `pilihanbenar`, `poin_challenge`, `status`, `created_at`, `updated_at`) VALUES
(11, '1101010001', '5', 'UI/UX Sistem Informasi', 'Siapa salah satu founder UI/UX terbaik Indonesia?', '2020-12-01 11:47:00', '2020-12-02 11:47:00', 'Bukalapak', 'Tokopedia', 'Shoope', 'BliBli', 'A', 60, 'Close', '2020-11-30 19:48:01', '2020-12-11 10:32:30');

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
-- Struktur dari tabel `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_foreign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namafile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pathfile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `files`
--

INSERT INTO `files` (`id`, `id_foreign`, `type`, `author`, `namafile`, `pathfile`, `created_at`, `updated_at`) VALUES
(97, '9', 'Materi', '', 'SURAT KUASA.docx', '1606794145SURAT KUASA.docx', '2020-11-30 19:42:25', '2020-11-30 19:42:25'),
(98, '9', 'Materi', '', 'surat penawaran.docx', '1606794234surat penawaran.docx', '2020-11-30 19:43:53', '2020-11-30 19:43:53'),
(99, '20', 'Tugas', '', '10171069_Sadriansyah_PraktikumPAPB (Kelas A).pdf', '160679462810171069_Sadriansyah_PraktikumPAPB (Kelas A).pdf', '2020-11-30 19:50:27', '2020-11-30 19:50:27'),
(100, '5', 'Reward', '1101010001', 'gempost-b.png', '1606795207gempost-b.png', '2020-11-30 20:00:06', '2020-11-30 20:00:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawabans`
--

CREATE TABLE `jawabans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tugas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tglsubmit_tugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jawabans`
--

INSERT INTO `jawabans` (`id`, `id_tugas`, `id_user`, `tglsubmit_tugas`, `id_file`, `nilai_tugas`, `status`, `created_at`, `updated_at`) VALUES
(21, 20, 10171069, '2020-12-01 04:01:43', ' ', 0, 'Done Late', '2020-11-30 20:01:43', '2020-11-30 20:01:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_challenges`
--

CREATE TABLE `jawaban_challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_challenge` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jawaban_challenge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penilaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hadiah_poin` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jawaban_challenges`
--

INSERT INTO `jawaban_challenges` (`id`, `id_challenge`, `id_user`, `jawaban_challenge`, `penilaian`, `hadiah_poin`, `created_at`, `updated_at`) VALUES
(10, 11, 10171069, 'A', 'Benar', 60, '2020-11-30 20:01:57', '2020-11-30 20:01:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban_ujians`
--

CREATE TABLE `jawaban_ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tglsubmit_ujian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_ujian` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jawaban_ujians`
--

INSERT INTO `jawaban_ujians` (`id`, `id_ujian`, `id_user`, `tglsubmit_ujian`, `id_file`, `nilai_ujian`, `status`, `created_at`, `updated_at`) VALUES
(13, 9, 10171069, '1606795799', ' ', 0, 'Done', '2020-12-01 04:09:59', '2020-12-01 04:09:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cover_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dosen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `komposisi_tugas` int(11) NOT NULL,
  `komposisi_quis` int(11) NOT NULL,
  `komposisi_ets` int(11) NOT NULL,
  `komposisi_eas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `cover_kelas`, `kode_mk`, `nama_mk`, `id_dosen`, `kode_kelas`, `komposisi_tugas`, `komposisi_quis`, `komposisi_ets`, `komposisi_eas`, `created_at`, `updated_at`) VALUES
(5, 'default.jpg', 'SF0100', 'Basis Data 1', '1101010001', 'LVToRB', 0, 0, 0, 0, '2020-11-30 19:41:35', '2020-11-30 19:41:35'),
(6, 'default.jpg', 'SF1010', 'Kelas Percobaan', '1101010001', 'FfXrVc', 0, 0, 0, 0, '2020-12-11 03:18:59', '2020-12-11 03:18:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materis`
--

CREATE TABLE `materis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_materi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_materi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materis`
--

INSERT INTO `materis` (`id`, `id_kelas`, `id_author`, `judul_materi`, `deskripsi_materi`, `created_at`, `updated_at`) VALUES
(1, '3', '1101101210', 'Announcement', 'Ini adalah pengumuman pertama yang dibuat dikelas dirubah sedikit', '2020-11-23 20:14:19', '2020-11-25 06:44:53'),
(3, '3', '1101101210', 'Announcement', 'Hari ini tidak ada kelas silahkan teman teman mencoba menonton webinar', '2020-11-23 20:30:48', '2020-11-23 20:30:48'),
(5, '3', '1101101210', 'Announcement', 'Coba untuk cek link berikut ini \r\n<a href=\'https://stackoverflow.com/questions/46575904/laravel-ajax-get-and-show-new-data\' target=\'_blank\'>https://stackoverflow.com/questions/46575904/laravel-ajax-get-and-show-new-data</a> dan ini <a href=\'https://stackoverflow.com/questions/3736165/search-string-for-specific-word-and-replace-it\' target=\'_blank\'>https://stackoverflow.com/questions/3736165/search-string-for-specific-word-and-replace-it</a>', '2020-11-23 22:47:46', '2020-11-25 08:06:48'),
(6, '1', '10171069', 'Announcement', 'Waw ini adalah kegiatan luar biasa', '2020-11-26 11:26:44', '2020-11-26 11:26:44'),
(7, '1', '10171069', 'Announcement', 'cek it out', '2020-11-26 11:26:52', '2020-11-26 11:26:52'),
(8, '4', '1101101210', 'Announcement', 'Tambahkan sesuatu', '2020-11-30 15:54:54', '2020-11-30 15:54:54'),
(9, '5', '1101010001', 'Announcement', 'Hari ini tidak ada materi silahkan teman teman mengexplore web dibawah ini\r\n<a href=\'https://www.w3schools.com/jsref/jsref_length_string.asp\' target=\'_blank\'>https://www.w3schools.com/jsref/jsref_length_string.asp</a>\r\ndan file berikut', '2020-11-30 19:42:25', '2020-11-30 19:44:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim_nip_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `id_kelas`, `nim_nip_user`, `status`, `poin`, `created_at`, `updated_at`) VALUES
(6, '5', '10171069', 'Member', 60, '2020-11-30 20:01:30', '2020-11-30 20:01:30');

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
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2020_10_14_141738_create_sessions_table', 1),
(26, '2020_11_09_104816_create_kelas_table', 1),
(27, '2020_11_12_075341_create_members_table', 2),
(28, '2020_11_12_231348_create_tugas_table', 3),
(29, '2020_11_12_231900_create_files_table', 3),
(30, '2020_11_14_233304_create_jawabans_table', 4),
(31, '2020_11_22_014632_create_challenges_table', 5),
(32, '2020_11_22_181117_create_jawaban_challenges_table', 6),
(33, '2020_11_24_040336_create_materis_table', 7),
(34, '2020_11_26_024324_create_ujians_table', 8),
(35, '2020_11_26_024525_create_jawaban_ujians_table', 8),
(36, '2020_11_29_145645_create_rewards_table', 9),
(37, '2020_11_29_193503_create_transaksi_poins_table', 10);

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
-- Struktur dari tabel `rewards`
--

CREATE TABLE `rewards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_reward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_reward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hidden_reward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batasan_klaim` int(11) NOT NULL,
  `id_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_trigger` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_level` int(11) NOT NULL,
  `poin_reward` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rewards`
--

INSERT INTO `rewards` (`id`, `id_kelas`, `judul_reward`, `deskripsi_reward`, `hidden_reward`, `batasan_klaim`, `id_file`, `id_trigger`, `tipe`, `minimum_level`, `poin_reward`, `created_at`, `updated_at`) VALUES
(5, '5', 'Hadiah Menyelesaikan Challenge', 'Akan Mendapatkan badges tambahan buat yang menyelesaikan postest', 'Selamat kamu sudah berjuang', 0, '100', '11', 'challenge', 0, 40, '2020-11-30 20:00:06', '2020-11-30 20:00:06');

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
('AoILTz6A44aNUF53VTPuSroO1kwLss2s2kfakPJp', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNkFjR2J4TnRKaUxvRDd2UzVrWTVIeHhNb3hzNkN2OWVpTWZmZDlOcSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1612245488),
('NtFaCsm6I4IVV4gqvkJagvHzMHF4Mq5kjUNBAiPN', 9, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoic2ZGRWdlZG1xdlU1SDNENURORHh1WjU4UW41WVJwTmVCcHNKTzkxRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sZWFkZXJib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjk7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRiWXdaRVhndnZIclVGbmJWMlRvQ0p1MFAuSHZBYjl0TFNWWUFZZmFKRGpZZDBnUC8wNG5DeSI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkYll3WkVYZ3Z2SHJVRm5iVjJUb0NKdTBQLkh2QWI5dExTVllBWWZhSkRqWWQwZ1AvMDRuQ3kiO30=', 1612245673);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_poins`
--

CREATE TABLE `transaksi_poins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_reward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poin_reward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_poins`
--

INSERT INTO `transaksi_poins` (`id`, `id_user`, `id_file`, `id_reward`, `poin_reward`, `tgl_transaksi`, `created_at`, `updated_at`) VALUES
(7, '10171069', '100', '5', '40', '2020-12-01', '2020-12-01 04:08:35', '2020-12-01 04:08:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_tugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_tugas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline_tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline_jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `id_kelas`, `id_author`, `judul_tugas`, `deskripsi_tugas`, `deadline_tanggal`, `deadline_jam`, `status`, `created_at`, `updated_at`) VALUES
(20, '5', '1101010001', 'Portal Pengumpulan Praktikum 1', '<p>Silahkan teman teman kumpulkan file dengan format nama <strong>BD-NIM.pdf</strong></p>', '2020-12-01', '11:50', 'Close', '2020-11-30 19:50:27', '2020-12-01 03:56:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ujians`
--

CREATE TABLE `ujians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_ujian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_ujian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_ujian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline_tanggal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline_jam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ujians`
--

INSERT INTO `ujians` (`id`, `id_kelas`, `id_author`, `judul_ujian`, `tipe_ujian`, `deskripsi_ujian`, `deadline_tanggal`, `deadline_jam`, `status`, `created_at`, `updated_at`) VALUES
(9, '5', '1101010001', 'Coba Post Test', 'Post-Test', '<p>Ini percobaan Postest silahkan upload file kalian disini</p>', '2020-12-02', '00:57', 'Close', '2020-11-30 19:57:50', '2020-12-01 16:57:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim_nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `displaynim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_poin` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nim_nip`, `displaynim`, `nama_user`, `email`, `hak_akses`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `jumlah_poin`, `exp`, `level`, `remember_token`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(6, '10101010', '10101010', 'Admin', 'admin@gmail.com', 'Admin', '$2y$10$dvZ1G/hsBT/jrO9xRSp6R.YswCSqst4i5AQBGacB72LtNfJheFxjy', NULL, NULL, 0, 0, 0, 'hobmU19hvskauzPI6LLhpKvrtmIBN8tH7J68HPu8kFupo248k6NUxD8CwctZ', NULL, '2020-11-30 17:45:41', '2020-11-30 17:45:41'),
(8, '1101010001', '1101010001', 'Dosen Percobaan', 'dosen@gmail.cm', 'Dosen', '$2y$10$bYwZEXgvvHrUFnbV2ToCJu0P.HvAb9tLSVYAYfaJDjYd0gP/04nCy', NULL, NULL, 0, 0, 0, 'FIqyStZqiujlML4fcbcziVKT7zD0S6B00bOedXFn6l82OxHfe8lRAbG1oOJU', '16067938664.jpg', '2020-11-30 19:32:20', '2020-11-30 19:40:59'),
(9, '10171069', '10171069', 'Sadriansyah', '10171069@student.itk.ac.id', 'Mahasiswa', '$2y$10$bYwZEXgvvHrUFnbV2ToCJu0P.HvAb9tLSVYAYfaJDjYd0gP/04nCy', NULL, NULL, 60, 60, 0, 'Sxorjv5DdGUC5pkChkpq2FxMVlQvYaG93nu4ydXE0zMTC18rQtURWhh7f48r', NULL, '2020-11-30 20:01:21', '2020-11-30 20:01:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawabans`
--
ALTER TABLE `jawabans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban_challenges`
--
ALTER TABLE `jawaban_challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jawaban_ujians`
--
ALTER TABLE `jawaban_ujians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transaksi_poins`
--
ALTER TABLE `transaksi_poins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ujians`
--
ALTER TABLE `ujians`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nim_nip_unique` (`nim_nip`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `jawabans`
--
ALTER TABLE `jawabans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `jawaban_challenges`
--
ALTER TABLE `jawaban_challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jawaban_ujians`
--
ALTER TABLE `jawaban_ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `materis`
--
ALTER TABLE `materis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rewards`
--
ALTER TABLE `rewards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi_poins`
--
ALTER TABLE `transaksi_poins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `ujians`
--
ALTER TABLE `ujians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
