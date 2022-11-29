-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 08:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_iir`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysis`
--

CREATE TABLE `analysis` (
  `id` int(11) NOT NULL,
  `title` longtext DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `date` varchar(60) DEFAULT NULL,
  `link` longtext DEFAULT NULL,
  `summary` longtext DEFAULT NULL,
  `prediction` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` longtext DEFAULT NULL,
  `category` varchar(45) DEFAULT NULL,
  `date` varchar(60) DEFAULT NULL,
  `link` longtext DEFAULT NULL,
  `summary` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `category`, `date`, `link`, `summary`) VALUES
(1, '6 Anime Terbaik Tentang Otome Game yang Harus Kamu Tonton', 'GenSINDO', 'Selasa, 22 November 2022 - 07:09 WIB', 'https://gensindo.sindonews.com/read/948025/700/6-anime-terbaik-tentang-otome-game-yang-harus-kamu-tonton-1669075890', 'Otome game atau simulator kencan adalah genre yang besar. Genre ini sering kali menjadi sub-cerita genre lain. Tapi, ada anime yang secara khusus mengangkatnya.'),
(2, '8 Anime Favorit Member BTS, Ada yang Sama dengan Kamu?', 'GenSINDO', 'Senin, 21 November 2022 - 21:21 WIB', 'https://gensindo.sindonews.com/read/947605/700/8-anime-favorit-member-bts-ada-yang-sama-dengan-kamu-1669025479', 'Ada sejumlah anime yang menjadi favorit member BTS. Umumnya, para personel boy group asal Korea Selatan ini suka shounen, meski ada juga yang memilih seinen.'),
(3, '4 Anime dengan Episode Terakhir Paling Memuaskan Sejauh Ini', 'GenSINDO', 'Senin, 21 November 2022 - 19:19 WIB', 'https://gensindo.sindonews.com/read/947443/700/4-anime-dengan-episode-terakhir-paling-memuaskan-sejauh-ini-1669018298', 'Tidak semua anime berhasil memberikan finale yang memuaskan bagi saga epik mereka, bahkan serial populer sekalipun. Tapi, ada judul yang berhasil melakukannya.'),
(4, '10 Karakter Cowok Anime Paling Dingin Ini Suka Bikin Gregetan', 'GenSINDO', 'Minggu, 20 November 2022 - 22:23 WIB', 'https://gensindo.sindonews.com/read/946821/700/10-karakter-cowok-anime-paling-dingin-ini-suka-bikin-gregetan-1668957080', 'Karakter cowok anime berkepribadian dingin sering membuat penggemar gregetan. Meski bersikap kasar dan cuek, mereka bak misteri berjalan yang harus diungkap.'),
(5, '12 Karakter Pahlawan Anime dengan Zodiak yang Sempurna', 'GenSINDO', 'Minggu, 20 November 2022 - 08:08 WIB', 'https://gensindo.sindonews.com/read/946235/700/12-karakter-pahlawan-anime-dengan-zodiak-yang-sempurna-1668885091', 'Setiap pahlawan anime diciptakan dengan sangat cermat termasuk tanggal lahir, zodiak, dan sifat mereka. Sejumlah karakter ini cocok dengan sifat zodiak mereka.'),
(6, '10 Anime Shounen Rating Tertinggi MyAnimeList di Sepanjang 2022', 'GenSINDO', 'Minggu, 20 November 2022 - 06:06 WIB', 'https://gensindo.sindonews.com/read/946223/700/10-anime-shounen-rating-tertinggi-myanimelist-di-sepanjang-2022-1668881472', 'Anime shounen rating tertinggi di MyAnimeList di sepanjang 2022 menahbiskan kalau genre ini adalah yang paling populer. Sejumlah judul favorit masih jadi hit.'),
(7, '5 Anime yang Menumbangkan Ide Orang Baik Selalu Menang', 'GenSINDO', 'Jum\'at, 18 November 2022 - 19:49 WIB', 'https://gensindo.sindonews.com/read/945307/700/5-anime-yang-menumbangkan-ide-orang-baik-selalu-menang-1668773488', 'Sejumlah anime menyajikan cerita yang menumbangkan ide kalau orang baik selalu menang. Meski pada akhirnya kebaikan unggul, tapi tidak dengan jalan ceritanya.'),
(8, '10 Anime Isekai Baru Rating Tertinggi di MyAnimeList Selama 2022', 'GenSINDO', 'Jum\'at, 18 November 2022 - 10:56 WIB', 'https://gensindo.sindonews.com/read/944787/700/10-anime-isekai-baru-rating-tertinggi-di-myanimelist-selama-2022-1668741094', 'Ada banyak anime isekai yang dirilis tahun ini. Tapi, tidak semuanya mampu mendapatkan rating tinggi di MyAnimeList. Hanya yang terbaik yang meraih perhatian.'),
(9, '10 Karakter Anime Paling Perhitungan, Mikir Dulu sebelum Bertindak', 'GenSINDO', 'Kamis, 17 November 2022 - 23:43 WIB', 'https://gensindo.sindonews.com/read/944509/700/10-karakter-anime-paling-perhitungan-mikir-dulu-sebelum-bertindak-1668701516', 'Sejumlah karakter anime paling perhitungan dikenal bertindak sebagai penyeimbang teman mereka yang impulsif untuk menjaga mereka mendapatkan masalah serius.'),
(10, '10 Anime Shounen Rating Tertinggi dalam 3 Tahun Terakhir di MyAnimeList', 'GenSINDO', 'Rabu, 16 November 2022 - 09:20 WIB', 'https://gensindo.sindonews.com/read/942777/700/10-anime-shounen-rating-tertinggi-dalam-3-tahun-terakhir-di-myanimelist-1668564697', 'Di MyAnimeList, dalam tiga tahun belakangan, anime shounen berating tinggi didominasi anime baru dan yang punya adegan brutal. Anime ini juga sangat populer.'),
(11, '7 Karakter Cewek Kembar Anime Ini Bikin Gemas Penggemar', 'GenSINDO', 'Minggu, 13 November 2022 - 23:44 WIB', 'https://gensindo.sindonews.com/read/940485/700/7-karakter-cewek-kembar-anime-ini-bikin-gemas-penggemar-1668355879', 'Karakter cewek kembar Anime biasanya tampil imut dan menggemaskan. Mereka punya penampilan yang sangat mirip dan sulit dibedakan sampai suka mengecoh orang.'),
(12, 'Siapa Karakter Cewek Anime yang Cocok Menurut Tipe MBTI Kamu?', 'GenSINDO', 'Minggu, 13 November 2022 - 20:11 WIB', 'https://gensindo.sindonews.com/read/940343/700/siapa-karakter-cewek-anime-yang-cocok-menurut-tipe-mbti-kamu-1668345082', 'Tipe kepribadian MBTI adalah cara yang bagus bagi para penggemar untuk mencari tahu karakter cewek anime alias waifu mana yang paling cocok bagi mereka.'),
(13, 'Suka Seenak Udel, 10 Pahlawan Anime Ini Ogah Ikuti Perintah', 'GenSINDO', 'Minggu, 13 November 2022 - 06:33 WIB', 'https://gensindo.sindonews.com/read/939879/700/suka-seenak-udel-10-pahlawan-anime-ini-ogah-ikuti-perintah-1668294689', 'Sejumlah pahlawan anime dikenal punya reputasi tidak pernah mengikuti perintah. Mereka bertindak atas keinginan diri sendiri dan tidak menghormati orang lain.'),
(14, '8 Anime Baru Rating Tertinggi Sepanjang 2022 di MyAnimeList', 'GenSINDO', 'Jum\'at, 11 November 2022 - 10:08 WIB', 'https://gensindo.sindonews.com/read/938231/700/8-anime-baru-rating-tertinggi-sepanjang-2022-di-myanimelist-1668136275', 'Sejumlah anime baru berhasil meraih rating tertinggi di MyAnimeList di sepanjang 2022 ini. Tak hanya cerita, anime-anime ini juga hadir dengan animasi indah.'),
(15, '4 Cewek Cakep yang Ditaksir Denji di Anime Chainsaw Man', 'GenSINDO', 'Jum\'at, 11 November 2022 - 07:33 WIB', 'https://gensindo.sindonews.com/read/938101/700/4-cewek-cakep-yang-ditaksir-denji-di-anime-chainsaw-man-1668125482', 'Salah satu cita-cita terbesar dalam hidup Denji sebelum menjadi Chainsaw Man adalah punya pacar. Tapi, di sepanjang serial ini, hal itu ternyata tidak mudah.'),
(16, '9 Layanan Nonton Anime Legal dengan Subtitle Bahasa Indonesia', 'GenSINDO', 'Kamis, 10 November 2022 - 06:10 WIB', 'https://gensindo.sindonews.com/read/937061/700/9-layanan-nonton-anime-legal-dengan-subtitle-bahasa-indonesia-1668035463', 'Nonton anime sekarang lebih mudah dengan banyaknya layanan streaming legal. Mereka ada yang berbayar, ada yang gratis, atau campuran kedua metode tersebut.'),
(17, '7 Serial Anime dengan Aksi Tembak-Tembakan Paling Seru', 'GenSINDO', 'Selasa, 08 November 2022 - 07:15 WIB', 'https://gensindo.sindonews.com/read/935007/700/7-serial-anime-dengan-aksi-tembak-tembakan-paling-seru-1667866287', 'Anime dengan aksi tembak-tembakan paling seru membuat penontonnya enggan bergerak dari tempat duduknya. Adegannya intensif, tegang, dan tidak bisa diprediksi.'),
(18, '8 Rekomendasi Anime Terbaik dari Urban Legend Jepang', 'GenSINDO', 'Senin, 07 November 2022 - 09:09 WIB', 'https://gensindo.sindonews.com/read/934119/700/8-rekomendasi-anime-terbaik-dari-urban-legend-jepang-1667787101', 'Ada sejumlah anime bagus yang diangkat dari urban legend Jepang. Biasanya anime ini punya cerita-cerita aneh yang terkadang dipercaya terjadi di dunia nyata.'),
(19, '10 Anime Ini Membangun Standar untuk Serial Dewasa', 'GenSINDO', 'Minggu, 06 November 2022 - 22:36 WIB', 'https://gensindo.sindonews.com/read/933919/700/10-anime-ini-membangun-standar-untuk-serial-dewasa-1667747502', 'Ada banyak anime seinen yang disukai para penonton dewasa. Anime-anime seinen populer ini telah membuka jalan dan membangun standari bagi anime seinen baru.'),
(20, '10 Anime Ber-Setting Akhirat Selain Bleach dan Angel Beats!', 'GenSINDO', 'Minggu, 06 November 2022 - 18:08 WIB', 'https://gensindo.sindonews.com/read/933753/700/10-anime-ber-setting-akhirat-selain-bleach-dan-angel-beats-1667733088', 'Anime ber-setting akhirat adalah salah satu yang paling umum. Tidak hanya Bleach dan Angel Beats!, masih banyak anime dengan setting sama yang tak kalah seru.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analysis`
--
ALTER TABLE `analysis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analysis`
--
ALTER TABLE `analysis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
