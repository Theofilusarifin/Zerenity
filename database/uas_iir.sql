-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 07:16 PM
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
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` varchar(60) NOT NULL,
  `original_category` varchar(45) NOT NULL,
  `system_classification` varchar(45) NOT NULL,
  `queue` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`id`, `title`, `date`, `original_category`, `system_classification`, `queue`) VALUES
(2, 'Dibayangi Awan Gelap Ekonomi Dunia, Mendag Zulkifli: Seberat Apapun Pasti Banyak Peluang', 'Senin, 24 Oktober 2022 - 07:00 WIB', 'ekbis', 'nasional', 1),
(3, 'Virtual Personal Assistant HANI Siap Jawab Pertanyaan Apapun Soal Honda', 'Selasa, 04 Oktober 2022 - 19:21 WIB', 'otomotif', 'nasional', 1),
(4, 'MotoGP Jepang 2022: Dibayangi Hujan, Quartararo Tak Takut Cuaca Apapun di Motegi', 'Sabtu, 24 September 2022 - 01:31 WIB', 'sports', 'nasional', 1),
(5, 'TGB: Tindak Kekerasan dalam Bentuk Apapun Tidak Dibenarkan', 'Senin, 19 September 2022 - 06:55 WIB', 'daerah', 'nasional', 1),
(6, 'Apapun Kebutuhan Anda, Ajukan Pendanaan Multiguna dengan MNC Dana Mobil di MotionCredit!', 'Jum\'at, 16 September 2022 - 16:23 WIB', 'ekbis', 'nasional', 1),
(7, 'Ayu Ting Ting Dijahili Demian Aditya di Panggung KDI 2022: Jangan Bandel Ya!', '05 Desember 2022 21:40 WIB', 'celebrity', 'nasional', 2),
(8, 'Masyarakat Boleh Lihat Prosesi Ngunduh Mantu Jokowi, Danrem: Pengamanan Sesuai SOP', '05 Desember 2022 17:28 WIB', 'news', 'nasional', 2),
(9, 'Seungyeon KARA Banjir Air Mata Kenang Kepergian Goo Hara', '05 Desember 2022 16:18 WIB', 'celebrity', 'nasional', 2),
(10, 'Hotman Paris Pamer Undangan Nikah Kaesang-Erina, Warganet Penasaran Besaran Amplopnya', '05 Desember 2022 16:04 WIB', 'celebrity', 'nasional', 2),
(11, ' Pedagang Bakso di Tangsel 14 Tahun Aktif di NII, Kini Pilih Hijrah ke NKRI   ', '05 Desember 2022 15:59 WIB', 'megapolitan', 'nasional', 2);

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `date` varchar(60) NOT NULL,
  `category` varchar(45) NOT NULL,
  `portal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `title`, `date`, `category`, `portal`) VALUES
(1, 'hut ke-72 polairud kado helikopter aw-169 kapal patroli jenis a-2', 'Senin, 05 Desember 2022 - 14:16 WIB', 'metro', 'Sindonews'),
(2, 'kinerja penegakan hukum erick thohir bumn dinilai layak diberi nilai a', 'Senin, 05 Desember 2022 - 13:03 WIB', 'nasional', 'Sindonews'),
(3, 'serunya kisah benci jadi cinta bikin baper nonton once upon a main street vision', 'Minggu, 04 Desember 2022 - 13:41 WIB', 'lifestyle', 'Sindonews'),
(4, 'pakar ui itb usu uhamka respons polemik pelabelan bisfenol a', 'Jum\'at, 02 Desember 2022 - 18:32 WIB', 'edukasi', 'Sindonews'),
(5, 'nyawa pamerkan koleksi busana ready to wear bertajuk basic with a twist', 'Jum\'at, 02 Desember 2022 - 09:04 WIB', 'Photo', 'Sindonews'),
(6, 'berpotensi jadi starter laga persik kediri vs persib bandung begini kata dedi kusnandar', '05 Desember 2022 23:22 WIB', 'bola', 'Okezone'),
(7, 'kuat maruf terlalu banyak bohong soal kasus sambo hakim terheran-heran', '05 Desember 2022 22:47 WIB', 'nasional', 'Okezone'),
(8, '5 pemain chelsea masuk daftar top skor piala dunia 2022 nomor 1 kai havertz', '05 Desember 2022 22:39 WIB', 'bola', 'Okezone'),
(9, 'hasil undian bwf world tour finals 2022 jonatan christie anthony ginting satu grup gregoria tunjung gabung grup neraka', '05 Desember 2022 20:56 WIB', 'sports', 'Okezone'),
(10, 'hadir diskusi panel wamifest 2022 tere orang menjadi musisi', '05 Desember 2022 19:31 WIB', 'celebrity', 'Okezone'),
(11, 'hut ke-72 polairud kado helikopter aw-169 kapal patroli jenis a-2', 'Senin, 05 Desember 2022 - 14:16 WIB', 'metro', 'Sindonews'),
(12, 'kinerja penegakan hukum erick thohir bumn dinilai layak diberi nilai a', 'Senin, 05 Desember 2022 - 13:03 WIB', 'nasional', 'Sindonews'),
(13, 'serunya kisah benci jadi cinta bikin baper nonton once upon a main street vision', 'Minggu, 04 Desember 2022 - 13:41 WIB', 'lifestyle', 'Sindonews'),
(14, 'pakar ui itb usu uhamka respons polemik pelabelan bisfenol a', 'Jum\'at, 02 Desember 2022 - 18:32 WIB', 'edukasi', 'Sindonews'),
(15, 'nyawa pamerkan koleksi busana ready to wear bertajuk basic with a twist', 'Jum\'at, 02 Desember 2022 - 09:04 WIB', 'Photo', 'Sindonews'),
(16, 'berpotensi jadi starter laga persik kediri vs persib bandung begini kata dedi kusnandar', '05 Desember 2022 23:22 WIB', 'bola', 'Okezone'),
(17, 'kuat maruf terlalu banyak bohong soal kasus sambo hakim terheran-heran', '05 Desember 2022 22:47 WIB', 'nasional', 'Okezone'),
(18, '5 pemain chelsea masuk daftar top skor piala dunia 2022 nomor 1 kai havertz', '05 Desember 2022 22:39 WIB', 'bola', 'Okezone'),
(19, 'hasil undian bwf world tour finals 2022 jonatan christie anthony ginting satu grup gregoria tunjung gabung grup neraka', '05 Desember 2022 20:56 WIB', 'sports', 'Okezone'),
(20, 'hadir diskusi panel wamifest 2022 tere orang menjadi musisi', '05 Desember 2022 19:31 WIB', 'celebrity', 'Okezone'),
(21, 'dibayangi awan gelap ekonomi dunia mendag zulkifli seberat apapun banyak peluang', 'Senin, 24 Oktober 2022 - 07:00 WIB', 'ekbis', 'Sindonews'),
(22, 'virtual personal assistant hani siap jawab pertanyaan apapun soal honda', 'Selasa, 04 Oktober 2022 - 19:21 WIB', 'otomotif', 'Sindonews'),
(23, 'motogp jepang 2022 dibayangi hujan quartararo tak takut cuaca apapun motegi', 'Sabtu, 24 September 2022 - 01:31 WIB', 'sports', 'Sindonews'),
(24, 'tgb tindak kekerasan bentuk apapun dibenarkan', 'Senin, 19 September 2022 - 06:55 WIB', 'daerah', 'Sindonews'),
(25, 'apapun kebutuhan ajukan pendanaan multiguna mnc dana mobil motioncredit', 'Jum\'at, 16 September 2022 - 16:23 WIB', 'ekbis', 'Sindonews'),
(26, 'ayu ting ting dijahili demian aditya panggung kdi 2022 jangan bandel', '05 Desember 2022 21:40 WIB', 'celebrity', 'Okezone'),
(27, 'masyarakat lihat prosesi ngunduh mantu jokowi danrem pengamanan sesuai sop', '05 Desember 2022 17:28 WIB', 'news', 'Okezone'),
(28, 'seungyeon kara banjir air mata kenang kepergian goo hara', '05 Desember 2022 16:18 WIB', 'celebrity', 'Okezone'),
(29, 'hotman paris pamer undangan nikah kaesang-erina warganet penasaran besaran amplopnya', '05 Desember 2022 16:04 WIB', 'celebrity', 'Okezone'),
(30, 'pedagang bakso tangsel 14 tahun aktif nii kini pilih hijrah nkri', '05 Desember 2022 15:59 WIB', 'megapolitan', 'Okezone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
