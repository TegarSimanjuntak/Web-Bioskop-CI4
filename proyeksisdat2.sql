-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8111
-- Waktu pembuatan: 04 Des 2023 pada 01.24
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
-- Database: `proyeksisdat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `nama_film` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tahun_rilis` int(11) NOT NULL,
  `deskripsi_film` text NOT NULL,
  `trailer_film` text NOT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id_film`, `nama_film`, `gambar`, `tahun_rilis`, `deskripsi_film`, `trailer_film`, `STATUS`) VALUES
(1, 'Kalian Pantas Mati', 'Kalian Pantas Mati.jpeg', 2020, 'Kamu Pantas Mati\" adalah film kontroversial yang menggugah pertanyaan tentang moralitas dan hukuman melalui karakter utama ambivalen. \r\n        Dengan penampilan dan sinematografi memukau, film ini merangsang pemikiran kritis tentang kompleksitas manusia.', 'https://youtu.be/QeltDNKIQCs?si=x8MJ_C0PIWTCi14w', 1),
(2, 'Backstage', 'Backstage.jpeg', 2021, 'Elsa dan Sandra adalah kakak beradik dengan sejuta mimpi. Elsa-adik-bermimpi menjadi bintang film. Ayah mereka sudah meninggal. Ibu mereka, Andini, menjadi tulang punggung keluarga dengan berjualan siomay bersama putrinya yang berprofesi sebagai pramusaji kafe. Suatu hari Elsa mengikuti audisi untuk film mencari peran penyanyi. Elsa mengirimkan video nyanyiannya namun menggunakan suara Sandra. Elsa gagal, tetapi Bayu, seorang produser musik, mengorbitkan Elsa sebagai penyanyi baru dengan menggunakan suara Sandra dan sukses. Dalam perjalanan ini Elsa berkenalan dengan penyanyi idolanya, Michael Nara, duet dan jatuh cinta. Sandra mulai kehilangan adiknya. Ada konflik antara saudara perempuan ini. Kemudian, sebuah kebohongan terungkap bahwa ternyata Michael Nara ternyata menggunakan ketenaran Elsa untuk menaikkan pamornya lagi.', 'https://youtu.be/TgHR2IqD42k?si=5C3seN-8BiD5PNcA', 1),
(3, 'Teka Teki Tika', 'Teka-Teki Tika.jpeg', 2021, 'Keluarga bahagia yang hidupnya saling melengkapi. Saat merayakan ulang tahun pernikahannya bersama keluarga, seorang pengusaha kaya tiba-tiba dikejutkan dengan kemunculan wanita misterius yang mengaku sebagai anak kandungnya, Tika. Hingga akhirnya perpecahan dalam keluarga pun tak terelakkan. Di balik itu semua, ada rahasia besar mengenai identitas Tika.', 'https://youtu.be/4KYRM857Fdw?si=YowwKxarqm_aWQ_4', 1),
(4, 'Yowis Ben', 'yowesband.jpeg', 2018, 'Bayu (Bayu Skak) menyukai Susan (Cut Meyriska) sejak lama. Namun karena dia merasa minder dengan keadaan dirinya yang pas-pasan, Bayu memutuskan memendam perasaan itu.\r\n\r\nNamun hari-hari Bayu berubah sejak Susan mengirim voice chat ke ponsel Bayu, yang membuatnya kegeeran luar biasa mengira Susan memberi isyarat agar didekati. Ternyata Susan hanya memanfaatkan Bayu untuk membantunya mensuplai pecel untuk konsumsi teman-teman OSIS. Bayu bertekad mengubah dirinya menjadi lebih populer dari Roy (Indra Widjaya), pacar Susan, yang dikenal piawai sebagai gitaris band sekolah mereka.', 'https://youtu.be/PvjiH2U6G-Q?si=n_xTnPDybjA23ylM', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `tanggal_tayang` date NOT NULL,
  `jam_tayang` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `id_studio` int(11) NOT NULL,
  `STATUS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_film`, `tanggal_tayang`, `jam_tayang`, `jam_selesai`, `id_studio`, `STATUS`) VALUES
(1, 1, '2023-12-01', '09:00:00', '11:00:00', 1, 1),
(2, 1, '2023-12-01', '13:00:00', '15:00:00', 2, 1),
(4, 1, '2023-12-01', '15:00:00', '17:00:00', 1, 1),
(5, 1, '2023-12-01', '17:00:00', '19:00:00', 2, 1),
(6, 2, '2023-12-01', '09:00:00', '10:30:00', 2, 1),
(7, 2, '2023-12-01', '11:15:00', '12:45:00', 1, 1),
(8, 2, '2023-12-01', '13:00:00', '14:30:00', 1, 1),
(9, 2, '2023-12-01', '15:15:00', '16:45:00', 3, 1),
(10, 3, '2023-12-01', '09:00:00', '11:00:00', 3, 1),
(11, 3, '2023-12-01', '10:45:00', '12:45:00', 2, 1),
(12, 3, '2023-12-01', '15:00:00', '17:00:00', 3, 1),
(13, 3, '2023-12-01', '17:15:00', '19:15:00', 1, 1),
(14, 4, '2023-12-01', '11:15:00', '12:45:00', 3, 1),
(15, 4, '2023-12-01', '13:00:00', '14:30:00', 3, 1),
(16, 4, '2023-12-01', '15:15:00', '16:45:00', 2, 1),
(17, 1, '2023-12-02', '09:00:00', '11:00:00', 1, 1),
(18, 1, '2023-12-02', '13:00:00', '15:00:00', 2, 1),
(19, 1, '2023-12-02', '15:00:00', '17:00:00', 1, 1),
(20, 1, '2023-12-02', '17:00:00', '19:00:00', 2, 1),
(21, 2, '2023-12-02', '09:00:00', '10:30:00', 2, 1),
(22, 2, '2023-12-02', '11:15:00', '12:45:00', 1, 1),
(23, 2, '2023-12-02', '13:00:00', '14:30:00', 1, 1),
(24, 2, '2023-12-02', '15:15:00', '16:45:00', 3, 1),
(25, 3, '2023-12-02', '09:00:00', '11:00:00', 3, 1),
(26, 3, '2023-12-02', '10:45:00', '12:45:00', 2, 1),
(27, 3, '2023-12-02', '15:00:00', '17:00:00', 3, NULL),
(28, 3, '2023-12-02', '17:15:00', '19:15:00', 1, NULL),
(29, 4, '2023-12-02', '11:15:00', '12:45:00', 3, NULL),
(30, 4, '2023-12-02', '13:00:00', '14:30:00', 3, NULL),
(31, 4, '2023-12-02', '15:15:00', '16:45:00', 2, NULL),
(32, 1, '2023-12-03', '09:00:00', '11:00:00', 1, NULL),
(33, 1, '2023-12-03', '13:00:00', '15:00:00', 2, NULL),
(34, 1, '2023-12-03', '15:00:00', '17:00:00', 1, NULL),
(35, 1, '2023-12-03', '17:00:00', '19:00:00', 2, NULL),
(36, 2, '2023-12-03', '09:00:00', '10:30:00', 2, NULL),
(37, 2, '2023-12-03', '11:15:00', '12:45:00', 1, NULL),
(38, 2, '2023-12-03', '13:00:00', '14:30:00', 1, NULL),
(39, 2, '2023-12-03', '15:15:00', '16:45:00', 3, NULL),
(40, 3, '2023-12-03', '09:00:00', '11:00:00', 3, NULL),
(41, 3, '2023-12-03', '10:45:00', '12:45:00', 2, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kursi`
--

CREATE TABLE `kursi` (
  `id_kursi` int(11) NOT NULL,
  `no_kursi` varchar(10) NOT NULL,
  `id_studio` int(11) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `kursi`
--

INSERT INTO `kursi` (`id_kursi`, `no_kursi`, `id_studio`, `id_jadwal`) VALUES
(1, 'A1', NULL, NULL),
(2, 'B1', NULL, NULL),
(3, 'C1', NULL, NULL),
(4, 'D1', NULL, NULL),
(5, 'E1', NULL, NULL),
(6, 'A2', NULL, NULL),
(7, 'B2', NULL, NULL),
(8, 'C2', NULL, NULL),
(9, 'D2', NULL, NULL),
(10, 'E2', NULL, NULL),
(11, 'A3', NULL, NULL),
(12, 'B3', NULL, NULL),
(13, 'C3', NULL, NULL),
(14, 'D3', NULL, NULL),
(15, 'E3', NULL, NULL),
(16, 'A4', NULL, NULL),
(17, 'B4', NULL, NULL),
(18, 'C4', NULL, NULL),
(19, 'D4', NULL, NULL),
(20, 'E4', NULL, NULL),
(21, 'A5', NULL, NULL),
(22, 'B5', NULL, NULL),
(23, 'C5', NULL, NULL),
(24, 'D5', NULL, NULL),
(25, 'E5', NULL, NULL),
(26, 'A6', NULL, NULL),
(27, 'B6', NULL, NULL),
(28, 'C6', NULL, NULL),
(29, 'D6', NULL, NULL),
(30, 'E6', NULL, NULL),
(31, 'A7', NULL, NULL),
(32, 'B7', NULL, NULL),
(33, 'C7', NULL, NULL),
(34, 'D7', NULL, NULL),
(35, 'E7', NULL, NULL),
(36, 'A8', NULL, NULL),
(37, 'B8', NULL, NULL),
(38, 'C8', NULL, NULL),
(39, 'D8', NULL, NULL),
(40, 'E8', NULL, NULL),
(41, 'A9', NULL, NULL),
(42, 'B9', NULL, NULL),
(43, 'C9', NULL, NULL),
(44, 'D9', NULL, NULL),
(45, 'E9', NULL, NULL),
(46, 'A10', NULL, NULL),
(47, 'B10', NULL, NULL),
(48, 'C10', NULL, NULL),
(49, 'D10', NULL, NULL),
(50, 'E10', NULL, NULL),
(51, 'F1', NULL, NULL),
(52, 'G1', NULL, NULL),
(53, 'H1', NULL, NULL),
(54, 'I1', NULL, NULL),
(55, 'J1', NULL, NULL),
(56, 'F2', NULL, NULL),
(57, 'G2', NULL, NULL),
(58, 'H2', NULL, NULL),
(59, 'I2', NULL, NULL),
(60, 'J2', NULL, NULL),
(61, 'F3', NULL, NULL),
(62, 'G3', NULL, NULL),
(63, 'H3', NULL, NULL),
(64, 'I3', NULL, NULL),
(65, 'J3', NULL, NULL),
(66, 'F4', NULL, NULL),
(67, 'G4', NULL, NULL),
(68, 'H4', NULL, NULL),
(69, 'I4', NULL, NULL),
(70, 'J4', NULL, NULL),
(71, 'F5', NULL, NULL),
(72, 'G5', NULL, NULL),
(73, 'H5', NULL, NULL),
(74, 'I5', NULL, NULL),
(75, 'J5', NULL, NULL),
(76, 'F6', NULL, NULL),
(77, 'G6', NULL, NULL),
(78, 'H6', NULL, NULL),
(79, 'I6', NULL, NULL),
(80, 'J6', NULL, NULL),
(81, 'F7', NULL, NULL),
(82, 'G7', NULL, NULL),
(83, 'H7', NULL, NULL),
(84, 'I7', NULL, NULL),
(85, 'J7', NULL, NULL),
(86, 'F8', NULL, NULL),
(87, 'G8', NULL, NULL),
(88, 'H8', NULL, NULL),
(89, 'I8', NULL, NULL),
(90, 'J8', NULL, NULL),
(91, 'F9', NULL, NULL),
(92, 'G9', NULL, NULL),
(93, 'H9', NULL, NULL),
(94, 'I9', NULL, NULL),
(95, 'J9', NULL, NULL),
(96, 'F10', NULL, NULL),
(97, 'G10', NULL, NULL),
(98, 'H10', NULL, NULL),
(99, 'I10', NULL, NULL),
(100, 'J10', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `umur_pengguna` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email_pengguna` varchar(50) NOT NULL,
  `no_telepon` bigint(20) NOT NULL,
  `gambar_profil` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `umur_pengguna`, `username`, `password`, `email_pengguna`, `no_telepon`, `gambar_profil`) VALUES
(1, 'Tegar', 12, 'tegar', 'tegar123', 'tegar@gmail.com', 123, 'profile.jpeg'),
(20, 'aaa', 0, 'aaa', 'aaa', 'aaa', 0, ''),
(41, 'nabil', 0, 'nabil', 'nabil123', 'nabil@gmail.com', 81575000527, ''),
(42, 'alrescha', 200, 'alrescha', 'alrescha123', 'alrescha@gmail.com', 8875000527, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `studio`
--

CREATE TABLE `studio` (
  `id_studio` int(11) NOT NULL,
  `no_studio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `studio`
--

INSERT INTO `studio` (`id_studio`, `no_studio`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_studio` int(11) NOT NULL,
  `id_kursi` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pengguna`, `id_studio`, `id_kursi`, `id_film`, `id_jadwal`) VALUES
(2, 1, 1, 19, 2, 22),
(3, 1, 1, 19, 2, 22),
(4, 1, 1, 1, 2, 22),
(5, 1, 1, 1, 2, 8),
(6, 1, 3, 2, 3, 27),
(7, 1, 2, 63, 4, 31),
(8, 1, 1, 14, 2, 8),
(9, 1, 1, 3, 2, 7),
(10, 1, 1, 8, 2, 7),
(11, 1, 1, 2, 2, 7),
(12, 1, 1, 17, 2, 22),
(14, 1, 1, 8, 1, 17),
(15, 1, 1, 8, 1, 17),
(16, 1, 2, 3, 2, 6),
(17, 1, 1, 25, 2, 8),
(18, 1, 1, 44, 2, 7),
(19, 1, 1, 67, 2, 7),
(20, 1, 1, 53, 2, 7),
(21, 1, 1, 24, 2, 7),
(22, 1, 2, 12, 2, 6),
(23, 1, 2, 14, 2, 6),
(24, 1, 1, 71, 2, 7),
(25, 1, 1, 71, 1, 1),
(26, 41, 3, 5, 4, 15),
(27, 42, 3, 7, 4, 15),
(28, 41, 2, 3, 1, 2),
(29, 41, 2, 9, 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_studio` (`id_studio`);

--
-- Indeks untuk tabel `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id_kursi`),
  ADD KEY `id_studio` (`id_studio`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `studio`
--
ALTER TABLE `studio`
  ADD PRIMARY KEY (`id_studio`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_kursi` (`id_kursi`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_studio` (`id_studio`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `kursi`
--
ALTER TABLE `kursi`
  MODIFY `id_kursi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `studio`
--
ALTER TABLE `studio`
  MODIFY `id_studio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_studio`) REFERENCES `studio` (`id_studio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
