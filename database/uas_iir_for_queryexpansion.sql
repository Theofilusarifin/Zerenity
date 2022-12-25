-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2022 at 03:59 PM
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
(11, ' Pedagang Bakso di Tangsel 14 Tahun Aktif di NII, Kini Pilih Hijrah ke NKRI   ', '05 Desember 2022 15:59 WIB', 'megapolitan', 'nasional', 2),
(12, 'Bertemu PM Belanda, Jokowi Bahas Kerja Sama Transisi Energi hingga Kejahatan Lintas Batas', '15 Desember 2022 06:24 WIB', 'nasional', 'Photo', 3),
(13, 'Usai Hadiri KTT ASEAN-Uni Eropa, Jokowi Bertolak ke Tanah Air', '15 Desember 2022 06:15 WIB', 'nasional', 'metro', 3),
(14, 'Golkar Nomor 4 di Pemilu 2024, Sekjen Ungkap Maknanya Bawa Rasa Aman dan Stabilitas   ', '15 Desember 2022 06:05 WIB', 'nasional', 'nasional', 3),
(15, 'Bertemu PM Swedia di Sela KTT ASEAN-Uni Eropa, Jokowi Dorong Kerja Sama Pembangunan Hijau', '15 Desember 2022 05:53 WIB', 'nasional', 'metro', 3),
(16, 'Jokowi Bicara Ancaman Resesi hingga Krisis Energi di KTT ASEAN-Uni Eropa', '15 Desember 2022 05:43 WIB', 'nasional', 'Photo', 3),
(17, 'Presiden Jokowi Dorong Kemitraan ASEAN-Uni Eropa: Harus Didasari Kesetaraan', 'Kamis, 15 Desember 2022 - 03:15 WIB', 'nasional', 'metro', 4),
(18, 'Pidato di KTT ASEAN-UE, Presiden Jokowi Ingatkan Ancaman Resesi hingga Krisis Energi', 'Kamis, 15 Desember 2022 - 01:02 WIB', 'nasional', 'nasional', 4),
(19, 'Sambutan Presiden Jokowi di KTT Belgia: Kemitraan ASEAN-Uni Eropa Tak Baik-baik Saja', 'Rabu, 14 Desember 2022 - 22:39 WIB', 'nasional', 'metro', 4),
(20, 'Momen Presiden Jokowi Hadiri Pembukaan KTT ASEAN-Uni Eropa di Brussels', 'Rabu, 14 Desember 2022 - 20:00 WIB', 'Video', 'metro', 4),
(21, 'Presiden Jokowi Disambut Raja Belgia di Istana Laeken', 'Rabu, 14 Desember 2022 - 19:28 WIB', 'nasional', 'metro', 4),
(22, 'Bertemu PM Belanda, Jokowi Bahas Kerja Sama Transisi Energi hingga Kejahatan Lintas Batas', '15 Desember 2022 06:24 WIB', 'nasional', 'nasional', 5),
(23, 'Usai Hadiri KTT ASEAN-Uni Eropa, Jokowi Bertolak ke Tanah Air', '15 Desember 2022 06:15 WIB', 'nasional', 'metro', 5),
(24, 'Bertemu PM Swedia di Sela KTT ASEAN-Uni Eropa, Jokowi Dorong Kerja Sama Pembangunan Hijau', '15 Desember 2022 05:53 WIB', 'nasional', 'metro', 5),
(25, 'Jokowi Bicara Ancaman Resesi hingga Krisis Energi di KTT ASEAN-Uni Eropa', '15 Desember 2022 05:43 WIB', 'nasional', 'nasional', 5),
(26, 'Jokowi Dorong Kemitraan Asean-Uni Eropa Didasari Kesetaraan   ', '14 Desember 2022 23:36 WIB', 'nasional', 'metro', 5),
(27, 'Bertemu PM Belanda, Jokowi Bahas Kerja Sama Transisi Energi hingga Kejahatan Lintas Batas', '15 Desember 2022 06:24 WIB', 'nasional', 'nasional', 6),
(28, 'Usai Hadiri KTT ASEAN-Uni Eropa, Jokowi Bertolak ke Tanah Air', '15 Desember 2022 06:15 WIB', 'nasional', 'metro', 6),
(29, 'Golkar Nomor 4 di Pemilu 2024, Sekjen Ungkap Maknanya Bawa Rasa Aman dan Stabilitas   ', '15 Desember 2022 06:05 WIB', 'nasional', 'sports', 6),
(30, 'Bertemu PM Swedia di Sela KTT ASEAN-Uni Eropa, Jokowi Dorong Kerja Sama Pembangunan Hijau', '15 Desember 2022 05:53 WIB', 'nasional', 'metro', 6),
(31, 'Jokowi Bicara Ancaman Resesi hingga Krisis Energi di KTT ASEAN-Uni Eropa', '15 Desember 2022 05:43 WIB', 'nasional', 'nasional', 6),
(32, 'Kylian Mbappe dan Achraf Hakimi Bertukar Jersey Usai Laga Prancis vs Maroko di Semifinal Piala Dunia 2022', '15 Desember 2022 07:55 WIB', 'bola', 'sports', 7),
(33, 'Timnas Maroko Kalah 0-2 dari Prancis di Semifinal Piala Dunia 2022, Mesut Ozil Tetap Sanjung Perjuangan Hakim Ziyech Cs', '15 Desember 2022 07:45 WIB', 'bola', 'metro', 7),
(34, 'Meski Kalah 0-2 dari Prancis di Semifinal Piala Dunia 2022, Walid Regragui Yakin Negara Lain Bangga Lihat Maroko', '15 Desember 2022 07:37 WIB', 'bola', 'metro', 7),
(35, 'Mengenal Driss Fettouhi, Pemain Timnas Maroko yang Disebut Punya Paspor Indonesia dan Hampir Bela Timnas Indonesia Era Alfred Riedl', '15 Desember 2022 06:57 WIB', 'bola', 'metro', 7),
(36, 'Kisah Mengharukan Kapten Maroko Romain Saiss di Semifinal Piala Dunia 2022: Pura-Pura Sehat demi Tampil di Final!', '15 Desember 2022 06:48 WIB', 'bola', 'metro', 7),
(37, 'Argentina Lolos ke Final Piala Dunia 2022, Ternyata Begini Potret Ekonomi Negara Kelahiran Messi', '15 Desember 2022 18:35 WIB', 'economy', 'metro', 8),
(38, 'Exclusive dari Qatar: Sadar Tak Bisa Andalkan Keajaiban, Walid Regragui Minta Timnas Maroko Lebih Kerja Keras Lagi untuk Juarai Piala Dunia', '15 Desember 2022 17:16 WIB', 'bola', 'metro', 8),
(39, 'Hasil Bali United vs Borneo FC di Liga 1 2022-2023: Pesut Etam Hajar Serdadu Tridatu 3-1!', '15 Desember 2022 17:10 WIB', 'bola', 'sports', 8),
(40, 'Anak Tya Ariestya Kena DBD, Kenali Yuk Gejalanya!', '15 Desember 2022 17:06 WIB', 'news', 'metro', 8),
(41, 'Pria Ini Alami Kelumpuhan Wajah Setelah Tak Tidur Demi Nonton Piala Dunia Seminggu Penuh', '15 Desember 2022 16:48 WIB', 'news', 'metro', 8),
(42, 'Beberapa Fitur Canggih di Bola Piala Dunia Qatar, Harus Di-charge Dulu', 'Rabu, 14 Desember 2022 - 18:27 WIB', 'tekno', 'metro', 9),
(43, 'Lionel Messi Wujudkan Mimpi Ibunya Lisandro Martinez: Terima Kasih Master Sepak Bola', 'Rabu, 14 Desember 2022 - 10:00 WIB', 'sports', 'metro', 9),
(44, 'Kompetisi Sepak Bola DCT KBPP Polri International Cup Resmi Berakhir', 'Rabu, 14 Desember 2022 - 08:41 WIB', 'sports', 'metro', 9),
(45, '3 Perbedaan Al Hilm dan Al Rihla, Bola Resmi Piala Dunia 2022', 'Selasa, 13 Desember 2022 - 14:30 WIB', 'SINDOgrafis', 'lifestyle', 9),
(46, '3 Perbedaan Al Hilm dan Al Rihla, Bola Resmi Piala Dunia 2022 Qatar', 'Senin, 12 Desember 2022 - 21:57 WIB', 'sains', 'lifestyle', 9),
(47, 'Kisah Unik Piala Dunia Pertama Kali Tahun 1930 yang Pemainnya Harus Dibujuk Supaya Mau Tanding', '15 Desember 2022 18:44 WIB', 'bola', 'bola', 10),
(48, 'Jokowi Target Laba Himbara Rp24,8 Triliun di 2023, Ini Respon Kementerian BUMN', '15 Desember 2022 18:32 WIB', 'economy', 'metro', 10),
(49, 'Bawaslu Tegaskan Anies Baswedan Tidak Terbukti Lakukan Kampanye Terselubung', '15 Desember 2022 18:02 WIB', 'nasional', 'metro', 10),
(50, 'Banyak Penolakan, Lelang Pembangunan Kepulauan Widi di Maluku Ditunda', '15 Desember 2022 17:48 WIB', 'news', 'metro', 10),
(51, 'Peru Umumkan Keadaan Darurat Setelah Protes Berdarah yang Dipicu Krisis Politik', '15 Desember 2022 15:26 WIB', 'news', 'metro', 10),
(52, 'Sebelum Dinikahi Kaesang, Adik Erina Gudono Pernah Doakan sang Kakak Jadi Menantu Jokowi', 'Kamis, 15 Desember 2022 - 15:52 WIB', 'lifestyle', 'metro', 11),
(53, 'Kepuasan Masyarakat Jawa Tengah pada Kinerja Jokowi Tembus 84,9%', 'Kamis, 15 Desember 2022 - 14:20 WIB', 'nasional', 'metro', 11),
(54, 'Dampingi Presiden Jokowi, Menko Airlangga Hadiri KTT Peringatan 45 Tahun ASEAN-Uni Eropa', 'Kamis, 15 Desember 2022 - 11:03 WIB', 'ekbis', 'metro', 11),
(55, 'Presiden Jokowi di KTT ASEAN - Uni Eropa', 'Kamis, 15 Desember 2022 - 09:20 WIB', 'Video', 'metro', 11),
(56, 'Gelar Pertemuan dengan PM Swedia, Jokowi Dorong Penguatan Kerja Sama di Sektor Pembangunan Hijau', 'Kamis, 15 Desember 2022 - 07:47 WIB', 'ekbis', 'metro', 11),
(57, 'Jokowi Target Laba Himbara Rp24,8 Triliun di 2023, Ini Respon Kementerian BUMN', '15 Desember 2022 18:32 WIB', 'economy', 'metro', 12),
(58, 'Kunjungi UEA, Gibran Diajak Pangeran Lakukan Tradisi Falconry', '15 Desember 2022 14:25 WIB', 'news', 'metro', 12),
(59, 'Survei: Kepuasan Kinerja Jokowi Tertinggi di Jateng, Angkanya 84,9 Persen', '15 Desember 2022 13:49 WIB', 'news', 'metro', 12),
(60, 'Adu Kuat Jurus Jokowi dan Biden Atasi Inflasi', '15 Desember 2022 12:09 WIB', 'economy', 'metro', 12),
(61, 'Kontribusi Hilirasi dan Tambang Nikel di Pulau Obi untuk Maluku Utara', '15 Desember 2022 11:52 WIB', 'nasional', 'metro', 12);

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
(30, 'pedagang bakso tangsel 14 tahun aktif nii kini pilih hijrah nkri', '05 Desember 2022 15:59 WIB', 'megapolitan', 'Okezone'),
(31, 'lirik lagu terjemah bahasa indonesia i kawaikute gomen i - honeyworks feat cap viral tiktok jadi musik filter anime', '12 Desember 2022 14:58 WIB', 'lirik', 'Okezone'),
(32, 'filter anime tiktok nilai deteksi hantu', '09 Desember 2022 11:16 WIB', 'techno', 'Okezone'),
(33, 'erick thohir ikut tren filter anime hasil kejut mirip jungkook', '08 Desember 2022 12:58 WIB', 'economy', 'Okezone'),
(34, '5 rekomendasi anime tema i maid caffe i', '28 November 2022 19:42 WIB', 'celebrity', 'Okezone'),
(35, 'seru dramatis rekomendasi komik populer banyak mati', '26 November 2022 17:33 WIB', 'lifestyle', 'Okezone'),
(36, '6 pahlawan anime kuat nyaris pernah menang tarung', 'Minggu, 11 Desember 2022 - 23:17 WIB', 'GenSINDO', 'Sindonews'),
(37, '8 anime original baru buat manga-nya rilis', 'Minggu, 11 Desember 2022 - 21:14 WIB', 'GenSINDO', 'Sindonews'),
(38, '10 kata frasa paling sering ucap anime nan', 'Minggu, 11 Desember 2022 - 12:12 WIB', 'GenSINDO', 'Sindonews'),
(39, '10 pasang kasih paling problematik anime klasik', 'Minggu, 11 Desember 2022 - 08:08 WIB', 'GenSINDO', 'Sindonews'),
(40, '10 rekomendasi anime buat kamu suka serial overlord', 'Sabtu, 10 Desember 2022 - 00:00 WIB', 'GenSINDO', 'Sindonews'),
(41, 'temu pm belanda jokowi bahas kerja sama transisi energi hingga jahat lintas batas', '15 Desember 2022 06:24 WIB', 'nasional', 'Okezone'),
(42, 'usai hadir ktt asean-uni eropa jokowi tolak tanah air', '15 Desember 2022 06:15 WIB', 'nasional', 'Okezone'),
(43, 'golkar nomor 4 milu 2024 sekjen ungkap makna bawa rasa aman stabilitas', '15 Desember 2022 06:05 WIB', 'nasional', 'Okezone'),
(44, 'temu pm swedia sela ktt asean-uni eropa jokowi dorong kerja sama bangun hijau', '15 Desember 2022 05:53 WIB', 'nasional', 'Okezone'),
(45, 'jokowi bicara ancam resesi hingga krisis energi ktt asean-uni eropa', '15 Desember 2022 05:43 WIB', 'nasional', 'Okezone'),
(46, 'presiden jokowi dorong mitra asean-uni eropa dasar tara', 'Kamis, 15 Desember 2022 - 03:15 WIB', 'nasional', 'Sindonews'),
(47, 'pidato ktt asean-ue presiden jokowi ingat ancam resesi hingga krisis energi', 'Kamis, 15 Desember 2022 - 01:02 WIB', 'nasional', 'Sindonews'),
(48, 'sambut presiden jokowi ktt belgia mitra asean-uni eropa tak baik', 'Rabu, 14 Desember 2022 - 22:39 WIB', 'nasional', 'Sindonews'),
(49, 'momen presiden jokowi hadir buka ktt asean-uni eropa brussels', 'Rabu, 14 Desember 2022 - 20:00 WIB', 'Video', 'Sindonews'),
(50, 'presiden jokowi sambut raja belgia istana laeken', 'Rabu, 14 Desember 2022 - 19:28 WIB', 'nasional', 'Sindonews'),
(51, 'beri kuliah umum ubaya ganjar pranowo ingat penting literasi digital', '21 Mei 2022 10:48 WIB', 'kampus', 'Okezone'),
(52, 'inovatif dosen mahasiswa ubaya rancang sepeda motor listrik', '06 April 2022 19:01 WIB', 'kampus', 'Okezone'),
(53, 'mahasiswa ubaya tinggal gunung tanggung mojokerto', '24 Januari 2022 11:13 WIB', 'kampus', 'Okezone'),
(54, 'mahasiswa ubaya bikin permen jelly limbah tempe', '23 Desember 2021 11:12 WIB', 'kampus', 'Okezone'),
(55, '6 guru tinggi libat kembang potensi surabaya', '10 November 2021 13:35 WIB', 'kampus', 'Okezone'),
(56, 'ubaya gelar tunjuk wayang kulit babad wanamarta', 'Minggu, 04 September 2022 - 11:33 WIB', 'Photo', 'Sindonews'),
(57, 'ubaya spil resmi center of maritime logistics innovation', 'Kamis, 10 Maret 2022 - 23:09 WIB', 'edukasi', 'Sindonews'),
(58, 'erfando ilham mahasiswa ubaya tewas diklat cinta alam gunung tanggung', 'Minggu, 23 Januari 2022 - 18:02 WIB', 'daerah', 'Sindonews'),
(59, 'ukir prestasi pon xx papua mahasiswa ubaya raih beasiswa potong upp usp hingga 100 persen', 'Selasa, 19 Oktober 2021 - 18:38 WIB', 'Photo', 'Sindonews'),
(60, 'bikin kejut rektor ubaya ngontel bareng kirim toga wisudawan baik', 'Kamis, 07 Oktober 2021 - 17:15 WIB', 'Photo', 'Sindonews'),
(61, 'viral suporter asing piala dunia 2022 girang bendera palestina netizen barakallah', '08 Desember 2022 09:43 WIB', 'muslim', 'Okezone'),
(62, 'heboh batu mirip ikan raksasa muncul gurun arab saudi begini wujud', '07 Desember 2022 13:06 WIB', 'lifestyle', 'Okezone'),
(63, 'serba-serbi wamifest 2022 riah musisi nama indonesia hingga produser internasional', '06 Desember 2022 19:56 WIB', 'celebrity', 'Okezone'),
(64, 'sama produser lagu bts tra sihombing enrico octaviano produksi lagu cara on the spot wamifest 2022', '06 Desember 2022 07:27 WIB', 'celebrity', 'Okezone'),
(65, 'produser musik internasional matt cab tat tong semangat sambut wamifest 2022', '02 Desember 2022 18:44 WIB', 'celebrity', 'Okezone'),
(66, 'temu tra sigmund lin anies bahas target net zero emission 2050', 'Kamis, 19 Mei 2022 - 16:37 WIB', 'metro', 'Sindonews'),
(67, 'arkeolog temu berhala mata satu kota kuno tra', 'Minggu, 30 Januari 2022 - 17:40 WIB', 'sains', 'Sindonews'),
(68, 'ikan alam bidang logistik mahasiswa spil uk tra diri laboratorium', 'Sabtu, 20 November 2021 - 18:14 WIB', 'edukasi', 'Sindonews'),
(69, 'arkeolog temu bukti kota kuno tra pernah landa banjir besar', 'Senin, 18 Oktober 2021 - 23:28 WIB', 'sains', 'Sindonews'),
(70, 'tra eka korban bakar lapas tangerang bakal makam tpu menteng pulo', 'Selasa, 14 September 2021 - 08:16 WIB', 'metro', 'Sindonews'),
(71, 'relokasi rumah dampak gempa cianjur target rampung lebaran 2023', '13 Desember 2022 15:38 WIB', 'economy', 'Okezone'),
(72, 'kuat ma ruf nyata ikut keluarga sambo sejak 2008 bagai driver', '12 Desember 2022 11:12 WIB', 'nasional', 'Okezone'),
(73, 'kaesang erina resmi meni nadya arifta banjir nyinyir netizen', '11 Desember 2022 14:09 WIB', 'celebrity', 'Okezone'),
(74, 'jelang nataru 2023 harga tiket kereta api naik', '10 Desember 2022 12:20 WIB', 'economy', 'Okezone'),
(75, 'bumbu rendang daging sapi cabai pas anak', '06 Desember 2022 17:19 WIB', 'lifestyle', 'Okezone'),
(76, 'lebaran anak yatim majelis al mastur santun 166 orang', 'Kamis, 11 Agustus 2022 - 08:50 WIB', 'Photo', 'Sindonews'),
(77, 'sejarah hari asyura sebut lebaran anak yatim indonesia', 'Selasa, 02 Agustus 2022 - 10:46 WIB', 'kalam', 'Sindonews'),
(78, 'gelap uang hasil jual kasir minimarket lebaran idul adha penjara', 'Minggu, 10 Juli 2022 - 18:20 WIB', 'daerah', 'Sindonews'),
(79, 'lebaran haji polda metro olah 198 sapi kurban jadi rendang', 'Minggu, 10 Juli 2022 - 13:39 WIB', 'metro', 'Sindonews'),
(80, 'jamaah tarekat naqsabandiyah sumatera utara lebaran idul adha hari', 'Jum\'at, 08 Juli 2022 - 16:14 WIB', 'daerah', 'Sindonews'),
(81, 'bank sentral as the fed kerek suku bunga 50 basis poin', 'Kamis, 15 Desember 2022 - 06:45 WIB', 'ekbis', 'Sindonews'),
(82, 'trump buat umum besar hari amerika butuh superhero', 'Kamis, 15 Desember 2022 - 06:37 WIB', 'international', 'Sindonews'),
(83, 'kiev terima perang ukraina tak trending twitter', 'Kamis, 15 Desember 2022 - 00:28 WIB', 'international', 'Sindonews'),
(84, '5 zodiak segera kaya raya aries hingga virgo', 'Kamis, 15 Desember 2022 - 00:05 WIB', 'lifestyle', 'Sindonews'),
(85, 'bahlil ayam tumbuh gigi indonesia punya smelter sendiri', 'Rabu, 14 Desember 2022 - 23:48 WIB', 'ekbis', 'Sindonews'),
(86, 'wall street lesat dukung inflasi as 7 1 november 2022', '14 Desember 2022 06:31 WIB', 'idxchannel', 'Okezone'),
(87, 'harga bbm naik daftar baru bensin pertamina hingga shell pertamax jadi berapa', '12 Desember 2022 15:11 WIB', 'economy', 'Okezone'),
(88, '5 fakta harga bbm pertamina hingga shell naik siapa paling murah', '09 Desember 2022 11:30 WIB', 'economy', 'Okezone'),
(89, 'banding harga bbm pertamina shell hingga vivo lebih murah mana', '07 Desember 2022 16:48 WIB', 'economy', 'Okezone'),
(90, '4 fakta pertamina hingga shell naik harga bbm', '02 Desember 2022 18:56 WIB', 'economy', 'Okezone'),
(91, 'komisi iv dprd kota bogor anggar tanggap bencana naik apbd 2023', 'Rabu, 14 Desember 2022 - 23:00 WIB', 'metro', 'Sindonews'),
(92, 'harga telur tembus rp 34 000 per kg dagang ibu ngeluh', 'Rabu, 14 Desember 2022 - 20:15 WIB', 'ekbis', 'Sindonews'),
(93, 'jelang natal harga minum alkohol lejit imbas inflasi', 'Rabu, 14 Desember 2022 - 20:03 WIB', 'ekbis', 'Sindonews'),
(94, 'usaha tempe kolaka utara keluh harga kedelai kian mahal langka', 'Rabu, 14 Desember 2022 - 18:10 WIB', 'Makassar', 'Sindonews'),
(95, 'langka pesawat nataru bikin harga tiket lesat', 'Rabu, 14 Desember 2022 - 17:13 WIB', 'ekbis', 'Sindonews'),
(96, 'daftar nominasi golden globe awards 2023 avatar the way of water hingga elvis', '13 Desember 2022 11:45 WIB', 'celebrity', 'Okezone'),
(97, 'film i avatar the way of water i kantong izin tayang china', '24 November 2022 14:11 WIB', 'celebrity', 'Okezone'),
(98, 'avatar 2 the way of water bakal sukses pertama', '03 November 2022 16:07 WIB', 'celebrity', 'Okezone'),
(99, 'trailer avatar 2 the way of water indah laut pandora kagum', '03 November 2022 14:15 WIB', 'celebrity', 'Okezone'),
(100, 'avatar 2 the way of water bakal rilis 13 tahun', '28 April 2022 21:53 WIB', 'celebrity', 'Okezone'),
(101, '5 film siksa wanita paling sadis nomor 4 keras rumah tangga', 'Kamis, 15 Desember 2022 - 05:30 WIB', 'lifestyle', 'Sindonews'),
(102, 'inspirasi asa dilema hubung alsa aqilah rilis single simpang', 'Rabu, 14 Desember 2022 - 21:21 WIB', 'lifestyle', 'Sindonews'),
(103, 'pengin nonton avatar the way of water lebih nikmat tipsnya', 'Rabu, 14 Desember 2022 - 19:17 WIB', 'GenSINDO', 'Sindonews'),
(104, 'film horor legendaris bayi ajaib bangkit', 'Rabu, 14 Desember 2022 - 16:59 WIB', 'lifestyle', 'Sindonews'),
(105, 'sinopsis pandu karakter avatar the way of water', 'Rabu, 14 Desember 2022 - 12:12 WIB', 'GenSINDO', 'Sindonews'),
(106, 'tegang intip 10 tiket bioskop mahal dunia wajib pakai kostum bak aktor film', '13 Desember 2022 10:41 WIB', 'economy', 'Okezone'),
(107, 'pevita pearce aku pernah i insecure i', '13 Desember 2022 08:36 WIB', 'celebrity', 'Okezone'),
(108, 'i bye bye i ruam popok simak rahasia bareng supermom sini', '12 Desember 2022 22:35 WIB', 'lifestyle', 'Okezone'),
(109, 'kisah mistis balik cermin kapten titanic edward smith', '12 Desember 2022 20:57 WIB', 'lifestyle', 'Okezone'),
(110, '5 wisata eksotis maroko negara paling kejut piala dunia 2022', '12 Desember 2022 17:52 WIB', 'news', 'Okezone'),
(111, 'daftar top skor piala dunia 2022 messi-mbappe rebut sepatu emas final', 'Kamis, 15 Desember 2022 - 06:51 WIB', 'sports', 'Sindonews'),
(112, 'jadwal final piala dunia 2022 argentina vs prancis', 'Kamis, 15 Desember 2022 - 05:59 WIB', 'sports', 'Sindonews'),
(113, 'gagal final piala dunia 2022 main timnas maroko tetap sujud syukur', 'Kamis, 15 Desember 2022 - 05:46 WIB', 'Photo', 'Sindonews'),
(114, '4 fakta tarik prancis kalah maroko semifinal piala dunia 2022', 'Kamis, 15 Desember 2022 - 05:34 WIB', 'sports', 'Sindonews'),
(115, '5 film siksa wanita paling sadis nomor 4 keras rumah tangga', 'Kamis, 15 Desember 2022 - 05:30 WIB', 'lifestyle', 'Sindonews'),
(116, 'bakal buka presiden jokowi 5 poin penting muktamar ke-48 muhamamdiyah', '12 November 2022 08:10 WIB', 'nasional', 'Okezone'),
(117, 'prediksi raih dukung jokowi pilpres 2024 kata prabowo subianto', '10 November 2022 21:58 WIB', 'nasional', 'Okezone'),
(118, 'mnc asset management gelar webinar bahas mungkin resesi dampak investasi', '22 Oktober 2022 15:24 WIB', 'news', 'Okezone'),
(119, 'the 20th ifra hybrid business expo in conjunction with the 2nd ile 2022 buka', '08 Agustus 2022 13:42 WIB', 'economy', 'Okezone'),
(120, 'masa kabung megawati ganti tjahjo kumolo jokowi', '05 Juli 2022 17:09 WIB', 'nasional', 'Okezone'),
(121, 'soal geng prediksi tawar kerjasama brand soleh solihun vindes mau oke', 'Kamis, 15 Desember 2022 - 07:38 WIB', 'lifestyle', 'Sindonews'),
(122, 'jokowi tolak tanah air usai hadir ktt asean-uni eropa', 'Kamis, 15 Desember 2022 - 07:21 WIB', 'nasional', 'Sindonews'),
(123, 'surplus neraca dagang november prediksi landai usd5 18 miliar', 'Kamis, 15 Desember 2022 - 07:20 WIB', 'ekbis', 'Sindonews'),
(124, 'neraca dagang prediksi stabil begini pengaruh ihsg hari', 'Kamis, 15 Desember 2022 - 06:06 WIB', 'ekbis', 'Sindonews'),
(125, 'kerja wasit buruk klub liga 1 ramai aju adu pt lib', 'Kamis, 15 Desember 2022 - 06:03 WIB', 'sports', 'Sindonews'),
(126, 'hari roy suryo jalan sidang tuntut kasus meme stupa mirip jokowi', '13 Desember 2022 13:36 WIB', 'nasional', 'Okezone'),
(127, 'laksamana yudo margono ikan bocor ganti ksal', '13 Desember 2022 13:07 WIB', 'nasional', 'Okezone'),
(128, 'ribu warga lihat kirab kaesang-erina i kepo i lihat acara', '11 Desember 2022 08:24 WIB', 'news', 'Okezone'),
(129, 'nikah kaesang erina 5 utama bangun rumah tangga turut islam', '10 Desember 2022 23:32 WIB', 'muslim', 'Okezone'),
(130, 'aksi lucu keponakan kaesang pangarep prosesi adat jadi jubir hingga paspampres', '10 Desember 2022 09:50 WIB', 'lifestyle', 'Okezone'),
(131, 'gelar temu pm swedia jokowi dorong kuat kerja sama sektor bangun hijau', 'Kamis, 15 Desember 2022 - 07:47 WIB', 'ekbis', 'Sindonews'),
(132, 'jokowi tolak tanah air usai hadir ktt asean-uni eropa', 'Kamis, 15 Desember 2022 - 07:21 WIB', 'nasional', 'Sindonews'),
(133, 'temu pm belanda jokowi bahas kerja sama investasi transisi energi', 'Kamis, 15 Desember 2022 - 06:31 WIB', 'ekbis', 'Sindonews'),
(134, 'presiden jokowi dorong mitra asean-uni eropa dasar tara', 'Kamis, 15 Desember 2022 - 03:15 WIB', 'nasional', 'Sindonews'),
(135, 'pidato ktt asean-ue presiden jokowi ingat ancam resesi hingga krisis energi', 'Kamis, 15 Desember 2022 - 01:02 WIB', 'nasional', 'Sindonews'),
(136, 'letjen tni purn joni supriyanto jadi calon kuat tum perbakin periode 2022-2026', '15 Desember 2022 07:30 WIB', 'sports', 'Okezone'),
(137, 'kenal driss fettouhi main timnas maroko sebut punya paspor indonesia hampir bela timnas indonesia era alfred riedl', '15 Desember 2022 06:57 WIB', 'bola', 'Okezone'),
(138, 'polda sumut tetap sekjen hanura jadi sangka kasus palsu surat', '15 Desember 2022 06:32 WIB', 'news', 'Okezone'),
(139, 'temu pm belanda jokowi bahas kerja sama transisi energi hingga jahat lintas batas', '15 Desember 2022 06:24 WIB', 'nasional', 'Okezone'),
(140, 'usai hadir ktt asean-uni eropa jokowi tolak tanah air', '15 Desember 2022 06:15 WIB', 'nasional', 'Okezone'),
(141, 'harum nama bangsa ajar indonesia raih 5 medali olimpiade sains dunia', 'Kamis, 15 Desember 2022 - 07:22 WIB', 'edukasi', 'Sindonews'),
(142, 'timnas indonesia pindah tc jakarta shin tae-yong siap pangkas lima main', 'Kamis, 15 Desember 2022 - 04:04 WIB', 'sports', 'Sindonews'),
(143, 'bahlil ayam tumbuh gigi indonesia punya smelter sendiri', 'Rabu, 14 Desember 2022 - 23:48 WIB', 'ekbis', 'Sindonews'),
(144, 'sandiaga ajak masyarakat libur natal tahun baru indonesia', 'Rabu, 14 Desember 2022 - 23:03 WIB', 'lifestyle', 'Sindonews'),
(145, 'polri aman 508 titik seluruh indonesia raya natal tahun baru', 'Rabu, 14 Desember 2022 - 22:11 WIB', 'nasional', 'Sindonews'),
(146, 'ungkap lawan berat novak djokovic atp finals 2022', '22 November 2022 18:16 WIB', 'sports', 'Okezone'),
(147, 'hasil wta finals 2022 iga swiatek mudah atas caroline garcia coco gauff tumbang daria kasatkina', '04 November 2022 10:17 WIB', 'sports', 'Okezone'),
(148, 'biden kecam ancam nuklir putin desak sekutu pbb lawan perang rusia-ukraina', '22 September 2022 11:28 WIB', 'news', 'Okezone'),
(149, 'bantu ukraina perang lawan rusia as gelontor bantu senjata rp9 triliun', '16 September 2022 11:17 WIB', 'news', 'Okezone'),
(150, 'telepon pm inggris liz truss biden komitmen lawan rusia', '08 September 2022 17:34 WIB', 'news', 'Okezone'),
(151, 'ancam rusia anggar nato lonjak lebih empat', 'Kamis, 15 Desember 2022 - 07:28 WIB', 'international', 'Sindonews'),
(152, 'trump buat umum besar hari amerika butuh superhero', 'Kamis, 15 Desember 2022 - 06:37 WIB', 'international', 'Sindonews'),
(153, '8 artis korea lulus universitas amerika nomor 4 alumni stanford university', 'Kamis, 15 Desember 2022 - 05:00 WIB', 'lifestyle', 'Sindonews'),
(154, 'rudal patriot bakal jadi target serang rusia', 'Kamis, 15 Desember 2022 - 01:31 WIB', 'international', 'Sindonews'),
(155, 'mampu capai as rudal rusia 12 kali lebih dahsyat bom atom hiroshima', 'Rabu, 14 Desember 2022 - 23:08 WIB', 'international', 'Sindonews'),
(156, 'kisah unik piala dunia pertama kali tahun 1930 main bujuk mau tanding', '15 Desember 2022 18:44 WIB', 'bola', 'Okezone'),
(157, 'lionel messi gemilang sama timnas argentina piala dunia 2022 begini reaksi claudio ranieri', '15 Desember 2022 18:38 WIB', 'bola', 'Okezone'),
(158, 'argentina lolos final piala dunia 2022 nyata begini potret ekonomi negara lahir messi', '15 Desember 2022 18:35 WIB', 'economy', 'Okezone'),
(159, 'timnas jerman gagal total piala dunia 2022 ton kroos sebut kandidat ganti hansi flick', '15 Desember 2022 18:26 WIB', 'bola', 'Okezone'),
(160, 'akibat salah pasang taruh fans timnas argentina rugi hingga rp20 juta', '15 Desember 2022 18:10 WIB', 'bola', 'Okezone'),
(161, 'tgb sebut satu satu bangsa indonesia jadi perhati dunia', 'Kamis, 15 Desember 2022 - 19:09 WIB', 'nasional', 'Sindonews'),
(162, 'sandiaga uno kunjung wisatawan mancanegara 2022 lampau target', 'Kamis, 15 Desember 2022 - 18:08 WIB', 'lifestyle', 'Sindonews'),
(163, 'astra nilam sukses buat juri pukau grand final kdi 2022', 'Kamis, 15 Desember 2022 - 17:39 WIB', 'lifestyle', 'Sindonews'),
(164, 'gelar hybrid rakornas parekraf 2022 fokus tiga isu utama', 'Kamis, 15 Desember 2022 - 17:31 WIB', 'lifestyle', 'Sindonews'),
(165, 'minibus warga baubau cebur laut hendak nobar semifinal piala dunia', 'Kamis, 15 Desember 2022 - 17:30 WIB', 'Video', 'Sindonews'),
(166, 'kisah unik piala dunia pertama kali tahun 1930 main bujuk mau tanding', '15 Desember 2022 18:44 WIB', 'bola', 'Okezone'),
(167, 'dewan olimpiade asia beri lampu hijau timnas rusia jadi wakil asia piala dunia 2026', '15 Desember 2022 08:21 WIB', 'bola', 'Okezone'),
(168, 'pensiun timnas argentina tugas sergio aguero piala dunia 2022', '14 Desember 2022 19:12 WIB', 'bola', 'Okezone'),
(169, 'catat alas rusia sebut bagai negara beruang merah', '13 Desember 2022 20:32 WIB', 'news', 'Okezone'),
(170, '6 potret atlet taekwondo cantik anastasija zolotic prestasi masuk sejarah', '12 Desember 2022 15:45 WIB', 'lifestyle', 'Okezone'),
(171, 'harum nama bangsa ajar indonesia raih 5 medali olimpiade sains dunia', 'Kamis, 15 Desember 2022 - 07:22 WIB', 'edukasi', 'Sindonews'),
(172, 'iba iba ioc izin partisipasi olimpiade', 'Selasa, 13 Desember 2022 - 13:37 WIB', 'sports', 'Sindonews'),
(173, 'pb wi wakil wjwc 2022 calon atlet wushu olimpiade 2032', 'Jum\'at, 02 Desember 2022 - 02:00 WIB', 'sports', 'Sindonews'),
(174, 'siswa madrasah borong 9 medali ajang olimpiade teliti siswa indonesia 2022', 'Selasa, 29 November 2022 - 09:33 WIB', 'edukasi', 'Sindonews'),
(175, 'rano karno sebut erick thohir sosok tepat siap indonesia tuan rumah olimpiade', 'Kamis, 17 November 2022 - 19:33 WIB', 'nasional', 'Sindonews'),
(176, '5 negara kuda hitam lolos semifinal piala dunia nomor 1 hampir juara', '13 Desember 2022 10:14 WIB', 'bola', 'Okezone'),
(177, 'nadin amizah rela tak manggung 2 bulan siap konser selamat ulang tahun', '12 Desember 2022 20:28 WIB', 'celebrity', 'Okezone'),
(178, 'eyang megawati ajak jan ethes tanding basket nikah kaesang-erina', '12 Desember 2022 18:14 WIB', 'nasional', 'Okezone'),
(179, 'alas nadin amizah gelar konser selamat ulang tahun tepat hari ibu', '12 Desember 2022 17:21 WIB', 'celebrity', 'Okezone'),
(180, 'harap ketua panitia usai kejurnas karate piala gilir kapolrestro kota bekas ke-3 2022 akhir', '10 Desember 2022 21:40 WIB', 'sports', 'Okezone'),
(181, 'atlet basket nba justin holiday didapuk jadi duta batik amerika serikat', 'Senin, 05 Desember 2022 - 12:38 WIB', 'lifestyle', 'Sindonews'),
(182, 'aai juara turnamen basket 3 on 3 anniversary ika fh-unhas jabodetabek', 'Sabtu, 03 Desember 2022 - 19:11 WIB', 'sports', 'Sindonews'),
(183, 'rusia tukar tahan dagang senjata tukar bintang basket as', 'Sabtu, 19 November 2022 - 17:44 WIB', 'international', 'Sindonews'),
(184, 'kisah asmara sandy walsh tak sulit pacar bintang basket kanada', 'Sabtu, 19 November 2022 - 08:03 WIB', 'sports', 'Sindonews'),
(185, 'basket sepakbola raffi ahmad bentuk tim tenis lapang tunggu', 'Selasa, 15 November 2022 - 07:07 WIB', 'lifestyle', 'Sindonews'),
(186, 'alas jersey kroasia motif kotak papan catur', '13 Desember 2022 23:39 WIB', 'bola', 'Okezone'),
(187, 'bal manfaat dokar hias kenal city tour gratis kok', '12 Desember 2022 12:19 WIB', 'lifestyle', 'Okezone'),
(188, 'bimbing calon model pose tarik ayu gani rela jadi kepompong', '10 Desember 2022 01:24 WIB', 'lifestyle', 'Okezone'),
(189, 'tak temu kaesang titip bunga erina jokowi', '09 Desember 2022 21:57 WIB', 'lifestyle', 'Okezone'),
(190, '3 wejang kaesang pangarep malam midodareni', '09 Desember 2022 21:04 WIB', 'lifestyle', 'Okezone'),
(191, 'ratus siswa smit bina amal semarang cipta rekor main catur jawa', 'Kamis, 15 Desember 2022 - 13:42 WIB', 'Photo', 'Sindonews'),
(192, 'balitbang kemenag jalan catur program transformasi tuju badan moderasi agama', 'Selasa, 13 Desember 2022 - 21:31 WIB', 'nasional', 'Sindonews'),
(193, 'profil brigjen tni amrizar pati tni ad jadi diri klub catur bkd tangerang', 'Jum\'at, 25 November 2022 - 17:49 WIB', 'nasional', 'Sindonews'),
(194, 'profil bripda audiali polwan cantik masuk polisi lewat jalur prestasi catur', 'Kamis, 24 November 2022 - 18:48 WIB', 'metro', 'Sindonews'),
(195, 'mahasiswi unpad raih 3 medali juara catur tingkat asia', 'Minggu, 30 Oktober 2022 - 08:39 WIB', 'edukasi', 'Sindonews'),
(196, 'jelang persija jakarta vs baya surabaya liga 1 2022-2023 aji santoso waspada main lap macan mayor', '15 Desember 2022 17:31 WIB', 'bola', 'Okezone'),
(197, 'ifw 2023 siap lahir desainer muda kualitas internasional tinggal budaya indonesia', '15 Desember 2022 15:55 WIB', 'lifestyle', 'Okezone'),
(198, 'beda terima mahasiswa baru unair tahun 2023 catat baik', '15 Desember 2022 15:53 WIB', 'kampus', 'Okezone'),
(199, 'wakil ketua dprd jatim langsung periksa tiba gedung kpk', '15 Desember 2022 15:17 WIB', 'nasional', 'Okezone'),
(200, 'headset jalan lintas rel pemuda tewas sambar kereta', '15 Desember 2022 14:20 WIB', 'news', 'Okezone'),
(201, '6 jenderal tni ad karier cemerlang lahir kota surabaya akhir pahlawan revolusi', 'Kamis, 15 Desember 2022 - 16:58 WIB', 'nasional', 'Sindonews'),
(202, 'ott kpk wakil ketua dprd jatim periksa polrestabes surabaya', 'Kamis, 15 Desember 2022 - 10:39 WIB', 'nasional', 'Sindonews'),
(203, 'ketua kpk benar tangkap tangan wakil ketua dprd jatim sts surabaya', 'Kamis, 15 Desember 2022 - 09:16 WIB', 'nasional', 'Sindonews'),
(204, 'wali kota eri cahyadi sukses dongkrak tumbuh ekonomi surabaya lalu program ekonomi rakyat', 'Rabu, 14 Desember 2022 - 07:30 WIB', 'daerah', 'Sindonews'),
(205, 'tragis warga surabaya tewas timpa batu air terjun madakaripura', 'Selasa, 13 Desember 2022 - 19:42 WIB', 'daerah', 'Sindonews'),
(206, 'deret tantang peluang hadap industri properti 2023', '15 Desember 2022 18:52 WIB', 'economy', 'Okezone'),
(207, 'terima lapor bank dunia sri mulyani ungkap gudang pr ekonomi indonesia', '15 Desember 2022 18:51 WIB', 'economy', 'Okezone'),
(208, 'kerja sama vision k-vision smartfren harap tumbuh', '15 Desember 2022 18:49 WIB', 'techno', 'Okezone'),
(209, 'peta titik rawan korupsi pemprov dki kpk jangan bansos awas kurang', '15 Desember 2022 18:41 WIB', 'nasional', 'Okezone'),
(210, '2 73 juta kendara prediksi tinggal jakarta libur nataru', '15 Desember 2022 18:41 WIB', 'economy', 'Okezone'),
(211, 'kader iring ahy kpu ketua dpd demokrat jakarta semangat wujud ubah', 'Kamis, 15 Desember 2022 - 19:01 WIB', 'metro', 'Sindonews'),
(212, 'macet jakarta tingkat', 'Kamis, 15 Desember 2022 - 17:44 WIB', 'metro', 'Sindonews'),
(213, 'heru budi curhat berat jadi pj gubernur dki jakarta', 'Kamis, 15 Desember 2022 - 16:17 WIB', 'metro', 'Sindonews'),
(214, 'polisi tunggu hasil autopsi mayat wanita simbah darah jalan raya bogor-jakarta', 'Kamis, 15 Desember 2022 - 14:19 WIB', 'metro', 'Sindonews'),
(215, 'mayat wanita simbah darah jalan raya bogor-jakarta keluarga hp hilang', 'Kamis, 15 Desember 2022 - 13:56 WIB', 'metro', 'Sindonews'),
(216, 'rentenir palembang aniaya pulung tak mampu bayar utang', 'Jum\'at, 23 Desember 2022 - 20:30 WIB', 'Video', 'Sindonews'),
(217, 'juergen klopp aku main liverpool tak baik manchester city', 'Jum\'at, 23 Desember 2022 - 20:03 WIB', 'sports', 'Sindonews'),
(218, 'pkb tegas sama gerindra tak pikir tinggal koalisi', 'Jum\'at, 23 Desember 2022 - 19:24 WIB', 'nasional', 'Sindonews'),
(219, 'gencar razia hotel padang tanjung balai puluh pasang tak resmi angkut tugas', 'Jum\'at, 23 Desember 2022 - 19:10 WIB', 'Video', 'Sindonews'),
(220, 'soal rsdc wisma atlet tutup satgas covid-19 sesuai jumlah efisien', 'Jum\'at, 23 Desember 2022 - 17:38 WIB', 'nasional', 'Sindonews'),
(221, 'bri dorong poklahsar bilvie pasar produk ikan bandeng hingga keluar negeri', '28 Maret 2022 19:11 WIB', 'economy', 'Okezone'),
(222, 'soal rsdc wisma atlet tutup satgas covid-19 sesuai jumlah efisien', 'Jum\'at, 23 Desember 2022 - 17:38 WIB', 'nasional', 'Sindonews'),
(223, 'pesawat rimbun air gelincir papua korban jiwa', 'Jum\'at, 23 Desember 2022 - 16:54 WIB', 'daerah', 'Sindonews'),
(224, 'positif covid-19 indonesia tambah 923 kasus tinggal 19 orang', 'Jum\'at, 23 Desember 2022 - 16:52 WIB', 'nasional', 'Sindonews'),
(225, 'voxpol center mayoritas masyarakat tuju capres 2024 orang jawa', 'Jum\'at, 23 Desember 2022 - 15:09 WIB', 'nasional', 'Sindonews'),
(226, 'perlu bingung 6 cara efektif hilang dahak bayi', 'Jum\'at, 23 Desember 2022 - 15:03 WIB', 'lifestyle', 'Sindonews'),
(227, 'sandiaga harap buku 1 500 inspirasi cipta demokrasi sahabat', '19 Desember 2022 17:35 WIB', 'news', 'Okezone'),
(228, 'sandiaga isi kuliah tamu ubaya angkat tema takar indonesia depan', '19 Desember 2022 17:25 WIB', 'news', 'Okezone'),
(229, 'beri kuliah umum ubaya ganjar pranowo ingat penting literasi digital', '21 Mei 2022 10:48 WIB', 'kampus', 'Okezone'),
(230, 'inovatif dosen mahasiswa ubaya rancang sepeda motor listrik', '06 April 2022 19:01 WIB', 'kampus', 'Okezone'),
(231, 'mahasiswa ubaya tinggal gunung tanggung mojokerto', '24 Januari 2022 11:13 WIB', 'kampus', 'Okezone'),
(232, 'jadi sangka aniaya mahasiswa disabilitas oknum dosen unja tahan polda jambi', 'Jum\'at, 23 Desember 2022 - 10:38 WIB', 'daerah', 'Sindonews'),
(233, 'dosen unesa tips manajemen waktu mahasiswa stres', 'Jum\'at, 23 Desember 2022 - 00:46 WIB', 'edukasi', 'Sindonews'),
(234, 'moonton gandeng ugm salur beasiswa puluh mahasiswa prestasi', 'Kamis, 22 Desember 2022 - 21:35 WIB', 'edukasi', 'Sindonews'),
(235, 'kenal kuliah jalur rpl manfaat mahasiswa', 'Kamis, 22 Desember 2022 - 18:25 WIB', 'edukasi', 'Sindonews'),
(236, 'inovasi mahasiswa its bambu jadi bahan bakar ganti batubara pltu', 'Kamis, 22 Desember 2022 - 09:00 WIB', 'edukasi', 'Sindonews'),
(237, 'optimis pariwisata tetap tumbuh 2023 sandiaga indonesia kuat hadap guncang apa', '20 Desember 2022 10:17 WIB', 'lifestyle', 'Okezone'),
(238, 'sandiaga harap buku 1 500 inspirasi cipta demokrasi sahabat', '19 Desember 2022 17:35 WIB', 'news', 'Okezone'),
(239, 'sandiaga isi kuliah tamu ubaya angkat tema takar indonesia depan', '19 Desember 2022 17:25 WIB', 'news', 'Okezone'),
(240, 'beri kuliah umum ubaya ganjar pranowo ingat penting literasi digital', '21 Mei 2022 10:48 WIB', 'kampus', 'Okezone'),
(241, 'inovatif dosen mahasiswa ubaya rancang sepeda motor listrik', '06 April 2022 19:01 WIB', 'kampus', 'Okezone'),
(242, 'hadir studium generale ubaya sandiaga kenal buku 1500 inspirasi', 'Senin, 19 Desember 2022 - 13:31 WIB', 'daerah', 'Sindonews'),
(243, 'ubaya gelar tunjuk wayang kulit babad wanamarta', 'Minggu, 04 September 2022 - 11:33 WIB', 'Photo', 'Sindonews'),
(244, 'ubaya spil resmi center of maritime logistics innovation', 'Kamis, 10 Maret 2022 - 23:09 WIB', 'edukasi', 'Sindonews'),
(245, 'erfando ilham mahasiswa ubaya tewas diklat cinta alam gunung tanggung', 'Minggu, 23 Januari 2022 - 18:02 WIB', 'daerah', 'Sindonews'),
(246, 'ukir prestasi pon xx papua mahasiswa ubaya raih beasiswa potong upp usp hingga 100 persen', 'Selasa, 19 Oktober 2021 - 18:38 WIB', 'Photo', 'Sindonews'),
(247, 'viral suporter asing piala dunia 2022 girang bendera palestina netizen barakallah', '08 Desember 2022 09:43 WIB', 'muslim', 'Okezone'),
(248, 'heboh batu mirip ikan raksasa muncul gurun arab saudi begini wujud', '07 Desember 2022 13:06 WIB', 'lifestyle', 'Okezone'),
(249, 'serba-serbi wamifest 2022 riah musisi nama indonesia hingga produser internasional', '06 Desember 2022 19:56 WIB', 'celebrity', 'Okezone'),
(250, 'sama produser lagu bts tra sihombing enrico octaviano produksi lagu cara on the spot wamifest 2022', '06 Desember 2022 07:27 WIB', 'celebrity', 'Okezone'),
(251, 'produser musik internasional matt cab tat tong semangat sambut wamifest 2022', '02 Desember 2022 18:44 WIB', 'celebrity', 'Okezone'),
(252, 'temu tra sigmund lin anies bahas target net zero emission 2050', 'Kamis, 19 Mei 2022 - 16:37 WIB', 'metro', 'Sindonews'),
(253, 'arkeolog temu berhala mata satu kota kuno tra', 'Minggu, 30 Januari 2022 - 17:40 WIB', 'sains', 'Sindonews'),
(254, 'ikan alam bidang logistik mahasiswa spil uk tra diri laboratorium', 'Sabtu, 20 November 2021 - 18:14 WIB', 'edukasi', 'Sindonews'),
(255, 'arkeolog temu bukti kota kuno tra pernah landa banjir besar', 'Senin, 18 Oktober 2021 - 23:28 WIB', 'sains', 'Sindonews'),
(256, 'tra eka korban bakar lapas tangerang bakal makam tpu menteng pulo', 'Selasa, 14 September 2021 - 08:16 WIB', 'metro', 'Sindonews');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
