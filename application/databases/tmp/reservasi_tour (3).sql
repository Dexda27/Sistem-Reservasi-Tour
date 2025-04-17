-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2024 pada 10.20
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasi_tour`
--
CREATE DATABASE IF NOT EXISTS `reservasi_tour` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `reservasi_tour`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahasa`
--

CREATE TABLE `bahasa` (
  `id` int(11) NOT NULL,
  `nama_bahasa` varchar(50) NOT NULL,
  `harga_bahasa` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahasa`
--

INSERT INTO `bahasa` (`id`, `nama_bahasa`, `harga_bahasa`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'English', 100, '2024-06-30 13:39:49', '2024-06-30 13:39:49', 1, 1),
(2, 'Spanish', 120, '2024-06-30 13:39:49', '2024-06-30 13:39:49', 1, 1),
(3, 'French', 130, '2024-06-30 13:39:49', '2024-06-30 13:39:49', 1, 1),
(4, 'German', 110, '2024-06-30 13:39:49', '2024-06-30 13:39:49', 1, 1),
(5, 'Japanese', 140, '2024-06-30 13:39:49', '2024-06-30 13:39:49', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `custom_reservasi`
--

CREATE TABLE `custom_reservasi` (
  `reservasi_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guide`
--

CREATE TABLE `guide` (
  `id` int(11) NOT NULL,
  `guide_name` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guide`
--

INSERT INTO `guide` (`id`, `guide_name`, `no_telp`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'John Doe', '1234567890', '2024-06-30 13:37:58', '2024-06-30 13:37:58', 1, 1),
(2, 'Jane Smith', '0987654321', '2024-06-30 13:37:58', '2024-06-30 13:37:58', 1, 1),
(3, 'Alice Johnson', '5551234567', '2024-06-30 13:37:58', '2024-06-30 13:37:58', 1, 1),
(4, 'Bob Brown', '5559876543', '2024-06-30 13:37:58', '2024-06-30 13:37:58', 1, 1),
(5, 'Charlie Davis', '5556789012', '2024-06-30 13:37:58', '2024-06-30 13:37:58', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guide_has_bahasa`
--

CREATE TABLE `guide_has_bahasa` (
  `guide_id` int(11) NOT NULL,
  `bahasa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guide_has_bahasa`
--

INSERT INTO `guide_has_bahasa` (`guide_id`, `bahasa_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id` int(11) NOT NULL,
  `nomor_kendaraan` varchar(10) NOT NULL,
  `jenis_kendaraan` varchar(100) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id`, `nomor_kendaraan`, `jenis_kendaraan`, `kapasitas`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'AB123CD', 'Bus', 50, '2024-06-30 13:45:43', '2024-06-30 13:45:43', 1, 2),
(2, 'EF456GH', 'Minivan', 12, '2024-06-30 13:45:43', '2024-06-30 13:45:43', 2, 1),
(3, 'IJ789KL', 'SUV', 7, '2024-06-30 13:45:43', '2024-06-30 13:45:43', 3, 2),
(4, 'MN012OP', 'Sedan', 4, '2024-06-30 13:45:43', '2024-06-30 13:45:43', 4, 2),
(5, 'QR345ST', 'Coach', 40, '2024-06-30 13:45:43', '2024-06-30 13:45:43', 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` double DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tipe_produk` enum('transport','hotel','restaurant','tourist_attraction','etc') DEFAULT 'etc',
  `vendor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `harga`, `area`, `deskripsi`, `tipe_produk`, `vendor_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Luxury Bus Tour', 150, 'City Center', 'A luxury bus tour around the city center with various stops at popular tourist attractions.', 'transport', 1, '2024-06-30 13:47:20', '2024-06-30 13:49:47', 1, 1),
(2, '5-Star Hotel Stay', 200, 'Downtown', 'A stay at a 5-star hotel with all amenities included.', 'hotel', 2, '2024-06-30 13:47:20', '2024-06-30 13:49:47', 1, 1),
(3, 'Fine Dining Experience', 100, 'Riverside', 'A fine dining experience at a top-rated restaurant with a river view.', 'restaurant', 3, '2024-06-30 13:47:20', '2024-06-30 13:49:47', 1, 1),
(4, 'Museum Tour', 50, 'Museum District', 'A guided tour of the citys most famous museums.', 'tourist_attraction', 4, '2024-06-30 13:47:20', '2024-06-30 13:49:47', 1, 1),
(5, 'Custom Package', 300, 'Various Locations', 'A custom package including transportation, accommodation, and guided tours.', 'etc', 5, '2024-06-30 13:47:20', '2024-06-30 13:49:47', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program`
--

INSERT INTO `program` (`id`, `nama_program`, `deskripsi`, `durasi`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'City Highlights Tour', 'A comprehensive tour covering all the major highlights of the city.', 4, '2024-06-30 13:25:57', '2024-06-30 13:48:06', 1, 1),
(2, 'Historical Journey', 'A tour focused on the historical landmarks and stories of the city.', 6, '2024-06-30 13:25:57', '2024-06-30 13:48:06', 1, 1),
(3, 'Cultural Experience', 'An immersive program showcasing the cultural aspects of the city.', 3, '2024-06-30 13:25:57', '2024-06-30 13:48:06', 1, 1),
(4, 'Adventure Trip', 'An action-packed program filled with adventure activities.', 5, '2024-06-30 13:25:57', '2024-06-30 13:48:06', 1, 1),
(5, 'Relaxation Retreat', 'A program designed for relaxation and rejuvenation.', 2, '2024-06-30 13:25:57', '2024-06-30 13:48:06', 1, 1),
(9, 'Aut velit sint excep', 'Itaque rerum fugit ', 36, '2024-07-02 04:19:58', '2024-07-02 04:19:58', 1, 1),
(10, 'Illum voluptas earu', 'Iste labore ad moles', 74, '2024-07-02 04:21:55', '2024-07-02 04:21:55', 1, 1),
(12, 'Voluptatem vel bland', 'Eos harum possimus', 12, '2024-07-03 07:07:04', '2024-07-03 07:07:04', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_has_produk`
--

CREATE TABLE `program_has_produk` (
  `program_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `program_has_produk`
--

INSERT INTO `program_has_produk` (`program_id`, `produk_id`) VALUES
(1, 1),
(1, 3),
(2, 4),
(3, 3),
(4, 1),
(5, 2),
(9, 1),
(9, 3),
(9, 4),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(12, 1),
(12, 4),
(12, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `dob` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `guest_name` varchar(100) NOT NULL,
  `pax` int(11) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  `tour_code` varchar(50) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `hotel` varchar(100) DEFAULT NULL,
  `flight_arrival_code` varchar(10) DEFAULT NULL,
  `eta` time DEFAULT NULL,
  `flight_departure_code` varchar(10) DEFAULT NULL,
  `etd` time DEFAULT NULL,
  `pickup` time DEFAULT NULL,
  `guide_id` int(11) DEFAULT NULL,
  `transport_id` int(11) DEFAULT NULL,
  `sopir_id` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `bahasa_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'master'),
(2, 'agent'),
(3, 'production'),
(4, 'accounting'),
(5, 'operation'),
(6, 'admin'),
(7, 'agent'),
(8, 'production'),
(9, 'accounting'),
(10, 'operation'),
(11, 'admin'),
(12, 'agent'),
(13, 'production'),
(14, 'accounting'),
(15, 'operation');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sopir`
--

CREATE TABLE `sopir` (
  `id` int(11) NOT NULL,
  `nama_sopir` varchar(100) NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sopir`
--

INSERT INTO `sopir` (`id`, `nama_sopir`, `no_telp`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'John Doe', '1234567890', '2024-06-30 13:50:47', '2024-06-30 13:50:47', 1, 1),
(2, 'Jane Smith', '0987654321', '2024-06-30 13:50:47', '2024-06-30 13:50:47', 1, 1),
(3, 'Alice Johnson', '5551234567', '2024-06-30 13:50:47', '2024-06-30 13:50:47', 1, 1),
(4, 'Bob Brown', '5559876543', '2024-06-30 13:50:47', '2024-06-30 13:50:47', 1, 1),
(5, 'Charlie Davis', '5556789012', '2024-06-30 13:50:47', '2024-06-30 13:50:47', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `status` enum('pending','paid','overdue') DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `reservasi_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `email`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '$2y$10$HD0spHq/3tPPNr29HINGKu7R56mZynveb3y2D6wScv6psuWDQGska', 'admin@admin.com', 1, '2024-12-01 16:00:00', '0000-00-00 00:00:00'),
(2, 'Agent', 'agent', '$2y$10$HD0spHq/3tPPNr29HINGKu7R56mZynveb3y2D6wScv6psuWDQGska', 'agent@example.com', 2, '2024-06-30 13:25:17', '2024-07-18 13:26:04'),
(3, 'Production', 'production', '$2y$10$HD0spHq/3tPPNr29HINGKu7R56mZynveb3y2D6wScv6psuWDQGska', 'production@example.com', 3, '2024-06-30 13:25:17', '2024-07-18 13:26:04'),
(4, 'Accounting', 'accounting', '$2y$10$HD0spHq/3tPPNr29HINGKu7R56mZynveb3y2D6wScv6psuWDQGska', 'accounting@example.com', 4, '2024-06-30 13:25:17', '2024-07-18 13:26:04'),
(5, 'Operation', 'operation', '$2y$10$HD0spHq/3tPPNr29HINGKu7R56mZynveb3y2D6wScv6psuWDQGska', 'operation@example.com', 5, '2024-06-30 13:25:17', '2024-07-18 13:26:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `no_rekening` varchar(50) DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `validity_period` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id`, `nama_vendor`, `contact`, `bank`, `no_rekening`, `account_name`, `validity_period`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Vendor A', 'vendorA@example.com', 'Bank A', '1234567890', 'Vendor A Account', '2024-12-31', '2024-06-30 13:32:54', '2024-06-30 13:47:04', 1, 1),
(2, 'Vendor B', 'vendorB@example.com', 'Bank B', '0987654321', 'Vendor B Account', '2024-11-30', '2024-06-30 13:32:54', '2024-06-30 13:47:04', 1, 1),
(3, 'Vendor C', 'vendorC@example.com', 'Bank C', '1122334455', 'Vendor C Account', '2024-10-31', '2024-06-30 13:32:54', '2024-06-30 13:47:04', 1, 1),
(4, 'Vendor D', 'vendorD@example.com', 'Bank D', '5566778899', 'Vendor D Account', '2024-09-30', '2024-06-30 13:32:54', '2024-06-30 13:47:04', 1, 1),
(5, 'Vendor E', 'vendorE@example.com', 'Bank E', '6677889900', 'Vendor E Account', '2024-08-31', '2024-06-30 13:32:54', '2024-06-30 13:47:04', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bahasa_user1_idx` (`created_by`),
  ADD KEY `fk_bahasa_user2_idx` (`updated_by`);

--
-- Indeks untuk tabel `custom_reservasi`
--
ALTER TABLE `custom_reservasi`
  ADD PRIMARY KEY (`reservasi_id`,`produk_id`);

--
-- Indeks untuk tabel `guide`
--
ALTER TABLE `guide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_guide_user1_idx` (`created_by`),
  ADD KEY `fk_guide_user2_idx` (`updated_by`);

--
-- Indeks untuk tabel `guide_has_bahasa`
--
ALTER TABLE `guide_has_bahasa`
  ADD PRIMARY KEY (`guide_id`,`bahasa_id`),
  ADD KEY `fk_guide_has_bahasa_bahasa1_idx` (`bahasa_id`),
  ADD KEY `fk_guide_has_bahasa_guide1_idx` (`guide_id`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `created_by_UNIQUE` (`created_by`),
  ADD KEY `fk_kendaraan_user1_idx` (`created_by`),
  ADD KEY `fk_kendaraan_user2_idx` (`updated_by`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produk_user1_idx` (`created_by`),
  ADD KEY `fk_produk_user2_idx` (`updated_by`),
  ADD KEY `produk_ibfk_1` (`vendor_id`);

--
-- Indeks untuk tabel `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_program_user1_idx` (`created_by`),
  ADD KEY `fk_program_user2_idx` (`updated_by`);

--
-- Indeks untuk tabel `program_has_produk`
--
ALTER TABLE `program_has_produk`
  ADD PRIMARY KEY (`program_id`,`produk_id`),
  ADD KEY `fk_program_has_produk_produk1_idx` (`produk_id`),
  ADD KEY `fk_program_has_produk_program1_idx` (`program_id`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `input_by` (`created_by`),
  ADD KEY `edit_by` (`updated_by`),
  ADD KEY `guide_id` (`guide_id`),
  ADD KEY `program_id` (`program_id`),
  ADD KEY `transport_id` (`transport_id`),
  ADD KEY `supir_id` (`sopir_id`),
  ADD KEY `fk_reservasi_bahasa1_idx` (`bahasa_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sopir`
--
ALTER TABLE `sopir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sopir_user1_idx` (`created_by`),
  ADD KEY `fk_sopir_user2_idx` (`updated_by`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tagihan_reservasi1_idx` (`reservasi_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_role` (`role_id`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendor_user1_idx` (`created_by`),
  ADD KEY `fk_vendor_user2_idx` (`updated_by`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `guide`
--
ALTER TABLE `guide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `sopir`
--
ALTER TABLE `sopir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bahasa`
--
ALTER TABLE `bahasa`
  ADD CONSTRAINT `fk_bahasa_user1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_bahasa_user2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guide`
--
ALTER TABLE `guide`
  ADD CONSTRAINT `fk_guide_user1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_guide_user2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guide_has_bahasa`
--
ALTER TABLE `guide_has_bahasa`
  ADD CONSTRAINT `fk_guide_has_bahasa_bahasa1` FOREIGN KEY (`bahasa_id`) REFERENCES `bahasa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_guide_has_bahasa_guide1` FOREIGN KEY (`guide_id`) REFERENCES `guide` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `fk_kendaraan_user1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kendaraan_user2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_user1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produk_user2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`);

--
-- Ketidakleluasaan untuk tabel `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `fk_program_user1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_program_user2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `program_has_produk`
--
ALTER TABLE `program_has_produk`
  ADD CONSTRAINT `fk_program_has_produk_produk1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_program_has_produk_program1` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `fk_reservasi_bahasa1` FOREIGN KEY (`bahasa_id`) REFERENCES `bahasa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `reservasi_ibfk_4` FOREIGN KEY (`guide_id`) REFERENCES `guide` (`id`),
  ADD CONSTRAINT `reservasi_ibfk_5` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`),
  ADD CONSTRAINT `reservasi_ibfk_6` FOREIGN KEY (`transport_id`) REFERENCES `kendaraan` (`id`),
  ADD CONSTRAINT `reservasi_ibfk_7` FOREIGN KEY (`sopir_id`) REFERENCES `sopir` (`id`);

--
-- Ketidakleluasaan untuk tabel `sopir`
--
ALTER TABLE `sopir`
  ADD CONSTRAINT `fk_sopir_user1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sopir_user2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `fk_tagihan_reservasi1` FOREIGN KEY (`reservasi_id`) REFERENCES `reservasi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Ketidakleluasaan untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `fk_vendor_user1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_vendor_user2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
