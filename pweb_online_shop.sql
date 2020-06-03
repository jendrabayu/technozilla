-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2020 pada 16.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pweb_online_shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Jendra Bayu Nugraha', 'jendra455@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2020-06-02 18:08:34', '2020-06-02 18:08:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat`
--

CREATE TABLE `alamat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alamat`
--

INSERT INTO `alamat` (`id`, `customer_id`, `nama`, `no_telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, 'Safira', '087665341611', 'Bekasi, Harjamukti, Kec. Cimanggis, Kota Depok, Jawa Barat 16454', '2020-06-03 07:03:43', '2020-06-03 07:03:43'),
(2, 2, 'Vina', '087665272828', 'Jalan Amburadul', '2020-06-03 08:59:43', '2020-06-03 08:59:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Safira Agil', 'safira@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2020-06-02 18:40:12', '2020-06-02 18:40:12'),
(2, 'Vina Agustin', 'vina@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', '2020-06-02 20:58:42', '2020-06-02 20:58:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gambar_produk`
--

INSERT INTO `gambar_produk` (`id`, `produk_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 3, '5ed7aa37779b139491.jpg', '2020-06-03 08:48:39', '2020-06-03 08:48:39'),
(2, 3, '5ed7aa410194b94341.jpg', '2020-06-03 08:48:49', '2020-06-03 08:48:49'),
(3, 4, '5ed7aac8defad44130.jpg', '2020-06-03 08:51:04', '2020-06-03 08:51:04'),
(4, 4, '5ed7aad215fad34028.jpg', '2020-06-03 08:51:14', '2020-06-03 08:51:14'),
(5, 4, '5ed7aadb3b8d449843.jpg', '2020-06-03 08:51:23', '2020-06-03 08:51:23'),
(6, 4, '5ed7aae3a2d7122534.jpg', '2020-06-03 08:51:31', '2020-06-03 08:51:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mouse', 'mouse200352', '2020-06-03 06:11:13', '2020-06-02 18:11:52', '2020-06-02 18:13:18'),
(2, 'Keyboard Gaming', 'keyboard-gaming200348', '2020-06-03 06:15:44', '2020-06-02 18:29:48', '2020-06-02 18:30:00'),
(3, 'Laptop', 'laptop200353', '2020-06-03 06:29:53', '2020-06-03 06:29:53', NULL),
(4, 'Mouse', 'mouse200302', '2020-06-03 06:41:02', '2020-06-03 06:41:02', NULL),
(5, 'Keyboard', 'keyboard200307', '2020-06-03 06:41:07', '2020-06-03 06:41:07', NULL),
(6, 'Monitor', 'monitor200349', '2020-06-03 06:41:49', '2020-06-03 06:41:49', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`id`, `nama`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Logitech Promo', 'logitech-promo200341', '2020-06-03 06:34:53', '2020-06-02 18:38:41', NULL),
(2, 'Apple watch', 'apple-watch200354', '2020-06-03 06:38:54', '2020-06-03 06:38:54', '2020-06-02 18:39:07'),
(3, 'Rexus', 'rexus200320', '2020-06-03 06:41:20', '2020-06-03 06:41:20', NULL),
(4, 'Apple', 'apple200329', '2020-06-03 06:41:29', '2020-06-03 06:41:29', NULL),
(5, 'Sanyo', 'sanyo200335', '2020-06-03 06:41:35', '2020-06-03 06:41:35', NULL),
(6, 'JBL', 'jbl200340', '2020-06-03 06:41:40', '2020-06-03 06:41:40', NULL),
(7, 'Targus', 'targus200322', '2020-06-03 06:59:22', '2020-06-03 06:59:22', NULL),
(8, 'Fantech', 'fantech200349', '2020-06-03 08:49:49', '2020-06-03 08:49:49', NULL);

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
(1, '2020_05_27_105636_create_customer_table', 1),
(2, '2020_05_27_105639_create_admin_table', 1),
(3, '2020_05_27_105789_create_kategori_table', 1),
(4, '2020_05_27_110137_create_merk_table', 1),
(5, '2020_05_27_110458_create_produk_table', 1),
(6, '2020_05_27_111439_create_gambar_produk_table', 1),
(7, '2020_05_27_111932_create_keranjang_table', 1),
(8, '2020_05_27_112302_create_rekening_bank_table', 1),
(9, '2020_05_27_112621_create_status_order_table', 1),
(10, '2020_05_27_112703_create_alamat_table', 1),
(11, '2020_05_27_112919_create_order_table', 1),
(12, '2020_05_27_132235_create_order_detail_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `rekening_bank_id` bigint(20) UNSIGNED NOT NULL,
  `alamat_id` bigint(20) UNSIGNED NOT NULL,
  `status_order_id` bigint(20) UNSIGNED NOT NULL,
  `alasan_pembatalan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` bigint(20) NOT NULL,
  `bukti_transfer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kurir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomor_resi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id`, `customer_id`, `rekening_bank_id`, `alamat_id`, `status_order_id`, `alasan_pembatalan`, `invoice`, `subtotal`, `bukti_transfer`, `kurir`, `nomor_resi`, `pesan`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 1, 5, NULL, 'INV06202003150243', 979992, '5ed79943c021682188.jpg', 'JNE', 'REG82929ER22822', 'Order Pertama', '2020-06-03 07:15:43', '2020-06-03 07:15:43'),
(3, 1, 2, 1, 3, NULL, 'INV06202003220313', 489996, '5ed7a421e031185616.jpg', NULL, NULL, 'Jangan Dikasih Yang RUsak!', '2020-06-03 08:22:13', '2020-06-03 08:22:13'),
(4, 1, 3, 1, 3, NULL, 'INV06202003270326', 1469988, '5ed7a54522d1125021.jpg', NULL, NULL, 'sdsdds', '2020-06-03 08:27:26', '2020-06-03 08:27:26'),
(5, 1, 3, 1, 6, 'Stok Sudah Habis', 'INV06202003280330', 244998, NULL, NULL, NULL, 'sdsdds', '2020-06-03 08:28:30', '2020-06-03 08:28:30'),
(6, 2, 2, 2, 1, NULL, 'INV06202003590353', 1996979, NULL, NULL, NULL, 'asassasas', '2020-06-03 08:59:53', '2020-06-03 08:59:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `produk_id`, `kuantitas`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 4, '2020-06-03 07:15:44', '2020-06-03 07:15:44'),
(2, 3, 2, 2, '2020-06-03 08:22:14', '2020-06-03 08:22:14'),
(3, 4, 2, 6, '2020-06-03 08:27:27', '2020-06-03 08:27:27'),
(4, 5, 2, 1, '2020-06-03 08:28:32', '2020-06-03 08:28:32'),
(5, 6, 4, 2, '2020-06-03 08:59:54', '2020-06-03 08:59:54'),
(6, 6, 3, 3, '2020-06-03 08:59:54', '2020-06-03 08:59:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merk_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `stok` bigint(20) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `merk_id`, `kategori_id`, `nama`, `slug`, `harga`, `stok`, `deskripsi`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 4, 'LOGITECH Wireless Mouse M171 [910-004657] - Red', 'logitech-wireless-mouse-m171-910-004657-red590320', 171222, 12, '<ul>\r\n	<li>2.4 GHz Wireless Technology Mouse</li>\r\n	<li>Nano-receiver</li>\r\n	<li>10m Wireless range</li>\r\n</ul>\r\n', '5ed78ebf982f167230.jpg', '2020-06-03 06:51:27', '2020-06-03 06:54:59', '2020-06-03 06:56:00'),
(2, 7, 4, 'TARGUS W063 Wireless BlueTrace Mouse [AMW06303AP] - Blue', 'targus-w063-wireless-bluetrace-mouse-amw06303ap-blue210320', 244998, 109, '<p>Wireless Blue Trace Mouse</p>\r\n', '5ed790d58401b10799.jpg', '2020-06-03 07:00:21', '2020-06-03 07:00:21', NULL),
(3, 1, 4, 'LOGITECH Wireless Mouse M235 - Blue [910-003392]', 'logitech-wireless-mouse-m235-blue-910-003392210320', 298993, 114, '<ul>\r\n	<li>2.4 GHz wireless technology Mouse</li>\r\n	<li>Nano-receiver</li>\r\n	<li>USB</li>\r\n</ul>\r\n', '5ed7aa25e33e216768.jpg', '2020-06-03 08:48:21', '2020-06-03 08:48:21', NULL),
(4, 8, 5, 'FANTECH MK 881 Pantheon Mechanical Full Size Keyboard Gaming', 'fantech-mk-881-pantheon-mechanical-full-size-keyboard-gaming510320', 550000, 10, '<ul>\r\n	<li>Gaming Keyboard</li>\r\n	<li>104 tombol</li>\r\n	<li>10 mode spektrum</li>\r\n	<li>Daya tahan 70juta kali</li>\r\n	<li>Desain saklar yang mudah dalam pergantian</li>\r\n	<li>Teknologi nano anti air &amp; debu</li>\r\n	<li>Support tombol macro &amp; LED</li>\r\n</ul>\r\n', '5ed7aabbd1df135851.jpg', '2020-06-03 08:50:51', '2020-06-03 08:50:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening_bank`
--

CREATE TABLE `rekening_bank` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atas_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rekening_bank`
--

INSERT INTO `rekening_bank` (`id`, `nama`, `atas_nama`, `nomor`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mandiri', 'Khamim Wahid', '029 32 2922911', '029-32-2922911200356', '2020-06-02 19:09:41', '2020-06-03 07:10:56', '2020-06-02 19:11:17'),
(2, 'BNI', 'Kinanti', '092 2828 8011', '092-2828-8011200337', '2020-06-02 19:11:37', '2020-06-02 19:11:37', NULL),
(3, 'BRI', 'Jendra Bayu', '200 547 90 213', '200-547-90-213200354', '2020-06-02 19:11:54', '2020-06-02 19:11:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_order`
--

CREATE TABLE `status_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status_order`
--

INSERT INTO `status_order` (`id`, `nama`) VALUES
(1, 'Belum Dibayar'),
(2, 'Perlu Dicek'),
(3, 'Sudah Dibayar'),
(4, 'Barang Dikirim'),
(5, 'Barang telah Tiba'),
(6, 'Pesanan Dibatalkan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indeks untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alamat_customer_id_foreign` (`customer_id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_email_unique` (`email`);

--
-- Indeks untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gambar_produk_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_slug_unique` (`slug`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_customer_id_foreign` (`customer_id`),
  ADD KEY `keranjang_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merk_slug_unique` (`slug`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_invoice_unique` (`invoice`),
  ADD KEY `order_customer_id_foreign` (`customer_id`),
  ADD KEY `order_rekening_bank_id_foreign` (`rekening_bank_id`),
  ADD KEY `order_alamat_id_foreign` (`alamat_id`),
  ADD KEY `order_status_order_id_foreign` (`status_order_id`);

--
-- Indeks untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_detail_order_id_foreign` (`order_id`),
  ADD KEY `order_detail_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produk_slug_unique` (`slug`),
  ADD KEY `produk_merk_id_foreign` (`merk_id`),
  ADD KEY `produk_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `rekening_bank`
--
ALTER TABLE `rekening_bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rekening_bank_slug_unique` (`slug`);

--
-- Indeks untuk tabel `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `alamat`
--
ALTER TABLE `alamat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rekening_bank`
--
ALTER TABLE `rekening_bank`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat`
--
ALTER TABLE `alamat`
  ADD CONSTRAINT `alamat_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD CONSTRAINT `gambar_produk_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_alamat_id_foreign` FOREIGN KEY (`alamat_id`) REFERENCES `alamat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_rekening_bank_id_foreign` FOREIGN KEY (`rekening_bank_id`) REFERENCES `rekening_bank` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_status_order_id_foreign` FOREIGN KEY (`status_order_id`) REFERENCES `status_order` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `produk_merk_id_foreign` FOREIGN KEY (`merk_id`) REFERENCES `merk` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
