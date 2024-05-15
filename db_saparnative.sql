-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jan 2024 pada 18.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saparnative`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(256) NOT NULL,
  `artikel` text NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `artikel`, `foto`) VALUES
(8, 'STAGE DIVING', 'Diambil pada jaman gaktau soalnya baru tau', '2.jpg'),
(9, 'LAPANG DI SAPARUA', 'SELAIN GOR ADA LAPANG ', 'DSCF0017.JPG'),
(10, 'Tempat Lari Disaparua yess', 'foto at saparua baheula', 'DSCF0008.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `artikel` text NOT NULL,
  `foto` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `artikel`, `foto`) VALUES
(1, 'KENAPA GOR SAPARUA MENJADI SAKSI BISU?', 'ASDWADSADAWDSFAWF', 'Retro-Aesthetic-Wallpaper-Girly.png'),
(2, 'Jejak Keemasan Musik Bawah Tanah di GOR Saparua Bandung', '\r\nTapi sayang, semenjak kemunculannya, eksistensi mereka tidak terlalu begitu diterima secara luas. Band-band di atas masih dianggap asing lantaran kerap membawakan cover lagu yang belum akrab di telinga penikmat musik pada masanya.\r\nBerdasarkan catatan pegiat sejarah Komunitas Aleut Ariyono Wahyu Widjajadi, band-band cadas ini kemudian berhimpun untuk bisa menggelar satu event bersama di GOR Saparua. Kebetulan, Alex saat itu juga masih berstatus sebagai vocalis The Clown yang merasakan masa-masa awal kebangkitan musik bawah tanah di Kota Bandung.\r\n', 'repro-acara-musik-di-gor-saparua-bandung_43.jpeg'),
(3, 'Sejarah Burgerkill, dari Manggung di Saparua hingga Dapat Tawaran Rekaman dari Peeusahaan Independen Malaysia, Anak Liar Records', 'Pada masa ini Burgerkill mulai aktif menulis karya lagu sendiri dan sering mendapat tawaran untuk tampil dalam acara-acara musik bawah tanah di GOR Saparua, Bandung.\r\nDengan formasi Ebenz (gitar), Kimung (bass), Ivan (vokal) dan Toto (drum), Burgerkill berhasil merilis singel pertamanya melalui label independen 40.1.24 yang dibentuk oleh salah satu tokoh underground pada masa itu Richard Muttler (Pas Band) dengan merilis album kompilasi band-band yang ada dalam komunitas musik di Bandung pada awal 1997.', 'Screenshot_20231206_233246_Chrom.jpg'),
(4, 'TESTING', '#1', 'DSCF0011.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `comments`
--

INSERT INTO `comments` (`id`, `nama`, `komentar`) VALUES
(1, 'jojo', 'ok bgt dah....');

-- --------------------------------------------------------

--
-- Struktur dari tabel `docvid`
--

CREATE TABLE `docvid` (
  `id` int(11) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `artikel` varchar(300) NOT NULL,
  `vid` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `docvid`
--

INSERT INTO `docvid` (`id`, `judul`, `artikel`, `vid`) VALUES
(2, ' saksi bisu tempat Cikal bakal musik underground Bandung', '(SAPARUA 1996 )', 'https://www.youtube.com/embed/1GADwBxxXxM?si=sjkKX6rgrps-bRYN'),
(3, 'GELORA: Magnumentary Of Gedung Saparua', '??????', 'https://www.youtube.com/embed/JQn668A3fSM?si=CSlLe-tYtgak4sOe'),
(5, 'ASDASDWAD', 'ASDASDWDA', 'https://www.youtube.com/embed/77Fj0wtwtfY?si=t3OQXcK1KKDlxWu7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sedikitberita`
--

CREATE TABLE `sedikitberita` (
  `id` int(11) NOT NULL,
  `judul` varchar(120) NOT NULL,
  `artikel` text NOT NULL,
  `foto` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sedikitberita`
--

INSERT INTO `sedikitberita` (`id`, `judul`, `artikel`, `foto`) VALUES
(1, 'SEJARAH SINGKAT', 'GOR Saparua Bandung yang terletak di Jalan Ambon, Bandung, Jawa Barat, adalah sebuah situs cagar budaya yang memiliki peran penting dalam sejarah musik cadas. Selain sebagi salah satu tempat jogging di Bandung, gedung ini juga menjadi tempat bersejarah bagi banyak band ternama seperti Koil, /rif, Burgerkill, Seringai, Jasad, dan lainnya. ', 'DSCF0002.JPG'),
(2, 'KENAPA GOR SAPARUA MENJADI SAKSI BISU?', '\r\nGOR Saparua jadi saksi bisu betapa meriahnya perhelatan musik bawah tanah di Kota Bandung. Berbagai event musik cadas banyak digelar di bangunan yang terletak di Jalan Banda, Kecamatan Bandung Wetan ini.\r\nSejumlah musisi hebat pun lahir dari pergerakan yang dibangun secara kolektif di GOR Saparua. Sebut saja Burgerkill, Puppen dan band cadas lainnya sempat mencicipi \'keagungan\' dari GOR Saparua.', '1.jpg'),
(4, 'Apa Itu Musik Cadas?', 'Musik rok atau musik cadas adalah genre yang luas dari musik populer yang berasal dari rock and roll di Amerika Serikat pada akhir 1940-an dan awal 1950-an, berkembang menjadi berbagai gaya yang berbeda pada pertengahan 1960-an hingga seterusnya, terutama di Amerika Serikat dan Inggris. Wikipedia\r\nAlat musik yang biasa digunakan: Gitar listrik; Gitar bas; Drum\r\nBentuk turunan: New wave; post-progresif; pop progresif', '38fb8e71fd65c57572ac419edd395fbd.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'indra', '202cb962ac59075b964b07152d234b70'),
(3, 'kemem', '202cb962ac59075b964b07152d234b70'),
(4, 'admin aja', '25d55ad283aa400af464c76d713c07ad'),
(5, 'admin', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `docvid`
--
ALTER TABLE `docvid`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sedikitberita`
--
ALTER TABLE `sedikitberita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `docvid`
--
ALTER TABLE `docvid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sedikitberita`
--
ALTER TABLE `sedikitberita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
