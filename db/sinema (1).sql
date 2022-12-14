-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2023 at 12:41 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `bentuk_kerjasama`
--

CREATE TABLE `bentuk_kerjasama` (
  `id_bkerja` int(11) NOT NULL,
  `bkerja_nama` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bentuk_kerjasama`
--

INSERT INTO `bentuk_kerjasama` (`id_bkerja`, `bkerja_nama`, `date_created`, `date_updated`) VALUES
(1, 'GELAR GANDA / DOUBLE DEGREE', '2022-11-22 04:45:51', NULL),
(2, 'PROGRAM KEMBARAN / TWINNING PROGRAM', '2022-11-22 04:45:51', NULL),
(3, 'GELAR BERSAMA / JOINT DEGREE', '2022-11-22 04:46:20', '2022-11-22 13:24:42'),
(4, 'PERTUKARAN MAHASISWA / STUDENT EXCHANGE', '2022-11-22 04:46:30', NULL),
(5, 'PERTUKARAN DOSEN DAN STAF / FACULTY EXCHANGE', '2022-11-22 04:46:38', NULL),
(6, 'PENGEMBANGAN KURIKULUM / CURRICULUM DEVELOPMENT', '2022-11-22 04:46:48', NULL),
(7, 'PEMAGANGAN / INTERNSHIP', '2022-11-22 04:46:57', NULL),
(8, 'PENYERAPAN LULUSAN / ALUMNI EMPLOYMENT', '2022-11-22 04:47:10', NULL),
(9, 'KULIAH PENDEK, SUMMER PROGRAM, PROGRAM BERSAMA / SHORT COURSE', '2022-11-22 04:47:27', NULL),
(10, 'PENELITIAN BERSAMA / JOINT RESEARCH', '2022-11-22 04:47:35', NULL),
(11, 'PENGEMBANGAN PUSAT STUDI / RESEARCH CENTER DEVELOPMENT', '2022-11-22 04:47:47', NULL),
(12, 'PENGEMBANGAN PRODUK / PRODUCT DEVELOPMENT', '2022-11-22 04:47:56', NULL),
(13, 'PUBLIKASI BERSAMA / JOINT PUBLICATION', '2022-11-22 04:48:04', NULL),
(14, 'KONFERENSI DAN SEMINAR BERSAMA / JOINT CONFERENCE AND SEMINAR', '2022-11-22 04:48:13', NULL),
(15, 'PENGABDIAN MASYARAKAT / COMMUNITY SERVICE', '2022-11-22 04:48:21', NULL),
(16, 'RUMAH SAKIT PENDIDIKAN', '2022-11-22 04:48:29', NULL),
(17, 'PENERIMAAN MAHASISWA BARU (PMB)', '2022-11-22 04:48:38', NULL),
(18, 'PEMBERIAN BEASISWA', '2022-11-22 04:48:46', NULL),
(19, 'PELATIHAN DOSEN, STAF, DAN MAHASISWA / TRAINING FOR LECTURER', '2022-11-22 04:48:56', NULL),
(20, 'PENDAMPINGAN DAN KONSULTASI DI BIDANG PATEN, DESAIN TATA LETAK', '2022-11-22 04:49:12', NULL),
(21, 'PENDIDIKAN', '2022-11-22 04:49:22', NULL),
(22, 'POJOK PENGAWASAN BAWALU/BAWASLU CORNER, PUBLIKASI DATA DIGITA', '2022-11-22 04:49:35', NULL),
(23, 'TEACHING FACTORY', '2022-11-22 04:49:49', NULL),
(24, 'PENDIDIKAN KHUSUS PROFESI ADVOKAT', '2022-11-22 04:49:57', NULL),
(25, 'PEMUATAN BERITA, OPINI, PROFILE, ADVETORIAL, TULISAN LAIN', '2022-11-22 04:50:09', NULL),
(26, 'PENELITIAN', '2022-11-22 04:50:17', NULL),
(27, 'KEPANITERAAN KLINIK', '2022-11-22 04:50:24', NULL),
(28, 'SOSIALISASI, LITERASI, PENGHIMPUNAN, DAN PENGELOLAAN DANA WAKAF', '2022-11-22 04:50:33', NULL),
(29, 'PROGRAM MBKM', '2022-11-22 04:50:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fak` int(11) NOT NULL,
  `fak_kode` varchar(20) NOT NULL,
  `fak_nama` varchar(100) NOT NULL,
  `fak_ket` text NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fak`, `fak_kode`, `fak_nama`, `fak_ket`, `date_created`, `date_updated`) VALUES
(3, 'FIKES', 'Fakultas Ilmu kesehatan', '', '2022-11-25 17:00:00', NULL),
(4, 'FIKOM', 'Fakultas Ilmu Komputer', '', '2022-11-25 17:00:00', NULL),
(5, 'FEB', 'Fakultas Ekonomi dan Bisnis', '', '2022-11-25 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `judul_file` varchar(120) NOT NULL,
  `nama_file` varchar(120) NOT NULL,
  `tipe_file` varchar(20) NOT NULL,
  `ukuran_file` varchar(30) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tgl_entry` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `judul_file`, `nama_file`, `tipe_file`, `ukuran_file`, `file`, `tgl_entry`) VALUES
(1, 'dokumen pendukung', 'data.xls', 'xls', '300mb', 'img', '2022-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `situs_instansi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `situs_instansi`) VALUES
(1, 'LLDIKTI', 'https://lldikti6.kemdikbud.go.id/');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_dok`
--

CREATE TABLE `jenis_dok` (
  `id_jenis_dok` int(11) NOT NULL,
  `jenis_dok` varchar(255) NOT NULL,
  `jenis_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_dok`
--

INSERT INTO `jenis_dok` (`id_jenis_dok`, `jenis_dok`, `jenis_ket`) VALUES
(1, 'MEMORANDUM OR UNDERSTANDING / NOTA KESEPAHAMAN / PIAGAM KERJA', 'MOU'),
(2, 'IMPLEMENTATION ARRANGEMENT / PETUNJUK PELAKSANAAN TEKNIS', 'IA'),
(3, 'MEMORANDUM OF AGREEMENT / PERJANJIAN KERJASAMA', 'MOA                                                      ');

-- --------------------------------------------------------

--
-- Table structure for table `kerjasama`
--

CREATE TABLE `kerjasama` (
  `id_kerjasama` int(11) NOT NULL,
  `id_jenis_dok` int(11) NOT NULL,
  `id_fak` int(11) DEFAULT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `judul_kerjasama` varchar(500) CHARACTER SET latin1 NOT NULL,
  `deskripsi_kerjasama` text CHARACTER SET latin1,
  `status_kerjasama` enum('aktif','nonaktif') CHARACTER SET latin1 NOT NULL,
  `tanggal_awal` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `no_ref_kerjasama` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `file` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kerjasama`
--

INSERT INTO `kerjasama` (`id_kerjasama`, `id_jenis_dok`, `id_fak`, `id_unit`, `judul_kerjasama`, `deskripsi_kerjasama`, `status_kerjasama`, `tanggal_awal`, `tanggal_akhir`, `no_ref_kerjasama`, `file`, `date_created`, `date_updated`) VALUES
(1, 3, NULL, NULL, 'Apotek A-24 Kota Tegal', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi', 'aktif', '2021-11-16', '2021-11-16', '031/Univ.BHAMADA/KL/XI/2021', NULL, '2023-01-05 13:56:51', '2023-01-05 13:57:32'),
(2, 3, NULL, NULL, 'Apotek Banjaran Sehat Kab. Tegal', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi', 'aktif', '2021-11-16', '2026-11-15', '027/Univ.BHAMADA/KL/XI/2021', NULL, '2023-01-05 14:27:22', NULL),
(3, 3, NULL, NULL, 'Apotek Budi Farma Pangkah Kab. Tegal', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi', 'aktif', '2021-11-16', '2026-11-15', '027/Univ.BHAMADA/KL/XI/2021', NULL, '2023-01-05 14:36:36', NULL),
(4, 3, NULL, NULL, 'Apotek Budi Farma Putra Kab. Tegal', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi', 'aktif', '2021-11-16', '2026-11-15', '029/Univ.BHAMADA/KL/XI/2021', NULL, '2023-01-05 14:36:36', NULL),
(5, 3, NULL, NULL, 'Apotek Injaya Kab.Tegal\r\n', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi\r\n', 'aktif', '2021-11-16', '2026-11-15', '028/Univ.BHAMADA/KL/XI/2021\r\n', NULL, '2023-01-05 15:02:12', NULL),
(6, 3, NULL, NULL, 'Apotek Jenggul Tarub Kab.Tegal\r\n', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi\r\n', 'aktif', '2021-11-16', '2026-11-15', '021/Univ.BHAMADA/KL/XI/2021\r\n', NULL, '2023-01-05 15:02:12', NULL),
(7, 3, NULL, NULL, 'Apotek Nurani Kagok Kab. Tegal\r\n', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi\r\n', 'aktif', '2021-11-16', '2021-11-16', '022/Univ.BHAMADA/KL/XI/2021\r\n', NULL, '2023-01-05 15:02:12', NULL),
(8, 3, NULL, NULL, 'Apotek Nurani Kota Tegal\r\n', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi\r\n', 'aktif', '2021-11-16', '2026-11-15', '032/Univ.BHAMADA/KL/XI/2021\r\n', NULL, '2023-01-05 15:02:12', NULL),
(9, 3, NULL, NULL, 'Apotek Perintis Kab. Tegal\r\n', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi\r\n', 'aktif', '2021-11-16', '2026-11-15', '026/Univ.BHAMADA/KL/XI/2021\r\n', NULL, '2023-01-05 15:02:12', NULL),
(10, 3, NULL, NULL, 'Apotek Putri Dukuhwaru\r\n', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi\r\n', 'aktif', '2021-11-16', '2021-11-15', '023/Univ.BHAMADA/KL/XI/2021\r\n', NULL, '2023-01-05 15:02:12', NULL),
(11, 3, NULL, NULL, 'Apotek Saras Sehat Kab. Tegal\r\n', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi\r\n', 'aktif', '2021-11-16', '2026-11-15', '024/Univ.BHAMADA/KL/XI/2021\r\n', NULL, '2023-01-05 15:31:26', NULL),
(12, 3, NULL, NULL, 'Apotek Sugih Waras Kab. Tegal\r\n', 'Lahan Praktik Mahasiswa Prodi S1 Farmasi\r\n', 'aktif', '2022-04-19', '2026-04-19', '030/Univ.BHAMADA/KL/XI/2021\r\n', NULL, '2023-01-05 15:31:26', NULL),
(13, 3, NULL, NULL, 'Badan Pengembangan dan Pembinaan Bahasa Kementrian Pendidikan, Kebudayaan, Riset dan Teknologi\r\n', 'Pelaksanaan Tridharma PT dalam Pengembangan, Pembinaan, dan Perlindungan Kebahasaan serta Kesastraan\r\n', 'aktif', '2022-04-19', '2026-04-18', '012/Univ.BHAMADA/KL/IV/2022\r\n', NULL, '2023-01-05 15:31:26', NULL),
(14, 3, NULL, NULL, 'Badan Pusat Statistik (BPS) Kab. Tegal \r\n', 'Lahan Praktik Mahasiswa Prodi D4 K3\r\n', 'nonaktif', '2019-08-20', '2021-08-19', '-', NULL, '2023-01-05 15:31:26', NULL),
(15, 3, NULL, NULL, 'Balai Keselamatan dan Kesehatan Kerja Provinsi Jawa Tengah\r\n', 'Lahan Praktik Mahasiswa Prodi D4 K3\r\n', 'nonaktif', '2017-01-17', '2020-01-16', '-', NULL, '2023-01-05 15:31:26', NULL),
(16, 3, NULL, NULL, 'Balai Keselamatan dan Kesehatan Kerja Jakarta\r\n', 'Lahan Praktik Mahasiswa Prodi D4 K3\r\n', 'nonaktif', '2017-01-17', '2020-01-16', '-', NULL, '2023-01-05 15:31:26', NULL),
(17, 3, NULL, NULL, 'CV. Himpunan Karya\r\n', '', 'aktif', '2018-07-11', '2023-07-10', '181/STIKES-BMD/KL/VII/2018\r\n', NULL, '2023-01-05 15:31:26', NULL),
(18, 3, NULL, NULL, 'CV. Indo Makmur Persada\r\n', '', 'aktif', '2018-07-11', '2023-07-10', '180/STIKES-BMD/KL/VII/2018\r\n', NULL, '2023-01-05 15:31:26', NULL),
(19, 3, NULL, NULL, 'CV. Nata Karya\r\n', 'Tri Dharma Prodi DIV K3\r\n', 'aktif', '2018-07-11', '2023-07-10', '183/STIKES-BMD/KL/VII/2018\r\n', NULL, '2023-01-05 15:31:26', NULL),
(20, 3, NULL, NULL, 'CV. Pucuk Daun Lestari\r\n', '', 'aktif', '2018-01-18', '2018-01-27', '001/Univ.BHAMADA/KL/I/2022\r\n', NULL, '2023-01-05 15:31:26', NULL),
(21, 3, NULL, NULL, 'CV. Tiga Reksa Sejahtera\r\n', 'Tri Dharma Prodi DIV K3\r\n', 'aktif', '2018-07-11', '2023-07-10', '179/STIKES-BMD/KL/VII/2018', NULL, '2023-01-05 15:48:37', NULL),
(22, 3, NULL, NULL, 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak serta Pengendalian Penduduk dan Keluarga Berencana Kabupaten Tegal', 'Upaya Percepatan Penurunan Stunting Terintegrasi melalui Tridharma PT Penguatan Program Pembangunan Keluarga, Kependudukan dan KB', 'aktif', '2022-03-01', '2022-02-28', '', NULL, '2023-01-05 15:48:37', NULL),
(23, 3, NULL, NULL, 'Dinkes Kabupaten Tegal', 'Tri Dharma PT', 'aktif', '2020-12-23', '2023-12-22', '215/STIKES-BMD/KL/XII/2020', NULL, '2023-01-05 15:48:37', NULL),
(24, 3, NULL, NULL, 'Dinkes Kota Tegal', 'Tri Dharma PT', 'aktif', '2015-07-27', '2020-07-26', '220/STIKES-BMD/KL/I/2021', NULL, '2023-01-05 15:48:37', NULL),
(25, 3, NULL, NULL, 'Griya Hamil Sehat', 'Lahan Praktik Mahasiswa Prodi D3 Kebidanan\r\n', 'aktif', '2021-11-10', '2026-11-09', NULL, NULL, '2023-01-05 15:48:37', NULL),
(26, 3, NULL, NULL, 'Imus Institute of Science and Technology (IIST) Philippines', 'Lahan Praktik Mahasiswa Prodi D3 Kebidanan', 'aktif', '2021-11-10', '2026-11-09', '019/Univ.BHAMADA/KL/XI/2021\r\n', NULL, '2023-01-05 15:48:37', NULL),
(27, 3, NULL, NULL, 'KBIT Siti Khodijah Slawi', 'Pelaksanaan Pendidikan, Penelitian dan Pengabdian Masyarakat Prodi D3 Keperawatan Fakultas Ilmu Kesehatan', 'aktif', '2022-02-11', '2027-02-10', '009/Univ.BHAMADA.KL/II/2022', NULL, '2023-01-05 15:48:37', NULL),
(28, 3, NULL, NULL, 'Klinik Pratama Hibatullah Harjawinangun ', 'Lahan Praktik Mahasiswa Prodi D3 Kebidanan', 'aktif', '2021-10-01', '2026-09-30', '006/Univ.BHAMADA/KL/X/2021\r\n', NULL, '2023-01-05 15:48:37', NULL),
(29, 3, NULL, NULL, 'Lembaga Sertifikasi Profesi K3 Industri Buana Lestari', 'Tempat Penyelenggaraan uji kompetensi Keselamatan dan Kesehatan Kerja (K3)', 'nonaktif', '2021-12-06', '2024-12-05', '033/Univ.BHAMADA/KL/XII/2021', NULL, '2023-01-05 15:48:37', NULL),
(30, 3, NULL, NULL, 'Lyceum  of  the  Philippines  University (LPU) Philippines', 'Lyceum  of  the  Philippines  University (LPU) Philippines', 'aktif', '2019-01-17', '2024-01-16', NULL, NULL, '2023-01-05 15:48:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `telpon` bigint(13) NOT NULL,
  `email` varchar(256) NOT NULL,
  `instagram` varchar(256) NOT NULL,
  `alamat` text NOT NULL,
  `judul` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `banner` text NOT NULL,
  `logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `telpon`, `email`, `instagram`, `alamat`, `judul`, `deskripsi`, `banner`, `logo`) VALUES
(1, 89876543210, 'anp@gmail.com', 'anp', '<p>Jl. Anugerah Niagatama Perkasa</p>', 'PT. Anugrah Niagatama Perkasa', 'Hakshdkjahsdkjhashdkj', '', '29986_apple-touch-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `id_lembaga` int(11) NOT NULL,
  `lembaga_kode` varchar(20) NOT NULL,
  `lembaga_nama` varchar(255) NOT NULL,
  `lembaga_ket` text NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`id_lembaga`, `lembaga_kode`, `lembaga_nama`, `lembaga_ket`, `date_created`, `date_updated`) VALUES
(6, 'LPDN', 'LEMBAGA PENDIDIKAN (DALAM NEGERI)', '', '2022-11-22 02:35:40', NULL),
(7, 'LPLN', 'LEMBAGA PENDIDIKAN (LUAR NEGERI)', '', '2022-11-22 02:35:40', NULL),
(8, 'DKDILN', 'DUNIA KERJA DAN INDUSTRI (LUAR NEGERI)', '', '2022-11-22 02:35:40', NULL),
(9, 'ODN', 'ORGANISASI (DALAM NEGERI)', '', '2022-11-22 02:35:40', NULL),
(10, 'OLN', 'ORGANISASI (LUAR NEGERI)', '', '2022-11-22 02:35:40', NULL),
(11, 'LPDN', 'LEMBAGA PEMERINTAHAN (DALAM NEGERI)', '', '2022-11-22 02:35:40', NULL),
(12, 'LPLN', 'LEMBAGA PEMERINTAHAN (LUAR NEGERI)', '', '2022-11-22 02:35:40', NULL),
(13, 'IKDN', 'INSTANSI KESEHATAN (DALAM NEGERI)', '', '2022-11-22 02:35:40', NULL),
(14, 'IKLN', 'INSTANSI KESEHATAN (LUAR NEGERI)', '', '2022-11-22 02:35:40', NULL),
(15, 'PDLIDN', 'PESANTREN DAN LEMBAGA ISLAM (DALAM NEGERI)', '', '2022-11-22 02:35:40', NULL),
(16, 'PDLILN', 'PESANTREN DAN LEMBAGA ISLAM (LUAR NEGERI)', '', '2022-11-22 02:35:40', NULL),
(17, 'KDJDLN', 'KONSORSIUM DAN JEJARING (DALAM DAN LUAR NEGERI)', '', '2022-11-22 02:35:40', NULL),
(18, 'DKDIDN', 'DUNIA KERJA DAN INDUSTRI (DALAM NEGERI)', '                                                                              ', '2022-11-22 02:35:40', '2022-11-22 03:04:16'),
(19, 'LSKDN', 'LEMBAGA SERIFIKASI KEAHLIAN (DALAM NEGERI)', '', '2022-11-22 02:35:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE `negara` (
  `id` int(11) NOT NULL,
  `negara_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id`, `negara_nama`) VALUES
(1, 'Makau'),
(2, 'Monako'),
(3, 'Singapura'),
(4, 'Hong Kong'),
(5, 'Gibraltar'),
(6, 'Jalur Gaza'),
(7, 'Vatikan'),
(8, 'Malta'),
(9, 'Bermuda'),
(10, 'Maladewa'),
(11, 'Bahrain'),
(12, 'Bangladesh'),
(13, 'Guernsey'),
(14, 'Jersey'),
(15, 'Barbados'),
(16, 'Republik Cina (Taiwan)'),
(17, 'Nauru'),
(18, 'Mauritius'),
(19, 'Mayotte'),
(20, 'Korea Selatan'),
(21, 'San Marino'),
(22, 'Tuvalu'),
(23, 'Puerto Riko'),
(24, 'Tepi Barat'),
(25, 'Belanda'),
(26, 'Martinique'),
(27, 'Aruba'),
(28, 'Lebanon'),
(29, 'Belgia'),
(30, 'Jepang'),
(31, 'India'),
(32, 'Kepulauan Marshall'),
(33, 'Rwanda'),
(34, 'El Salvador'),
(35, 'Komoro'),
(36, 'Kepulauan Virgin'),
(37, 'Reunion'),
(38, 'Guam'),
(39, 'Sri Lanka'),
(40, 'Israel'),
(41, 'Saint Vincent dan Grenadines'),
(42, 'Filipina'),
(43, 'Haiti'),
(44, 'Samoa Amerika'),
(45, 'Saint Lucia'),
(46, 'Grenada'),
(47, 'Vietnam'),
(48, 'Guadeloupe'),
(49, 'Jamaika'),
(50, 'Britania Raya'),
(51, 'Jerman'),
(52, 'Antillen Belanda'),
(53, 'Burundi'),
(54, 'Trinidad dan Tobago'),
(55, 'Liechtenstein'),
(56, 'Pakistan'),
(57, 'Nepal'),
(58, 'Italia'),
(59, 'Korea Utara'),
(60, 'Sao Tome dan Principe'),
(61, 'Republik Dominika'),
(62, 'Swiss'),
(63, 'Luxembourg'),
(64, 'Seychelles'),
(65, 'Kepulauan Cayman'),
(66, 'Kepulauan Mariana Utara'),
(67, 'Antigua dan Barbuda'),
(68, 'Mikronesia'),
(69, 'Andorra'),
(70, 'Tonga'),
(71, 'Saint Kitts dan Nevis'),
(72, 'Kepulauan Virgin Inggris'),
(73, 'Atol Johnston'),
(74, 'Gambia'),
(75, 'Tokelau'),
(76, 'Nigeria'),
(77, 'Republik Rakyat Cina'),
(78, 'Guatemala'),
(79, 'Moldavia'),
(80, 'Kuwait'),
(81, 'Pulau Man'),
(82, 'Ceko'),
(83, 'Anguilla'),
(84, 'Thailand'),
(85, 'Kiribati'),
(86, 'Indonesia'),
(87, 'Denmark'),
(88, 'Albania'),
(89, 'Polandia'),
(90, 'Uganda'),
(91, 'Portugal'),
(92, 'Uni Eropa'),
(93, 'Slowakia'),
(94, 'Perancis (Metropolitan)'),
(95, 'Hongaria'),
(96, 'Serbia dan Montenegro'),
(97, 'Tanjung Verde'),
(98, 'Malawi'),
(99, 'Kuba'),
(100, 'Armenia'),
(101, 'Togo'),
(102, 'Suriah'),
(103, 'Slovenia'),
(104, 'Austria'),
(105, 'Romania'),
(106, 'Dominika'),
(107, 'Azerbaijan'),
(108, 'Montserrat'),
(109, 'Turki'),
(110, 'Kepulauan Cook'),
(111, 'Ghana'),
(112, 'Spanyol'),
(113, 'Siprus'),
(114, 'Sierra Leone'),
(115, 'Yunani'),
(116, 'Makedonia'),
(117, 'Kroasia'),
(118, 'Bosnia Herzegovina'),
(119, 'Kosta Rika'),
(120, 'Ukraina'),
(121, 'Mesir'),
(122, 'Qatar'),
(123, 'Kamboja'),
(124, 'Maroko'),
(125, 'Malaysia'),
(126, 'Timor Leste'),
(127, 'Swaziland'),
(128, 'Bulgaria'),
(129, 'Georgia'),
(130, 'Benin'),
(131, 'Ethiopia'),
(132, 'Brunei'),
(133, 'Polinesia Perancis'),
(134, 'Myanmar'),
(135, 'Yordania'),
(136, 'Honduras'),
(137, 'Tunisia'),
(138, 'Lesotho'),
(139, 'Samoa'),
(140, 'Uzbekistan'),
(141, 'Irak'),
(142, 'Kenya'),
(143, 'Wallis dan Futuna'),
(144, 'Irlandia'),
(145, 'Senegal'),
(146, 'Lithuania'),
(147, 'Meksiko'),
(148, 'Pantai Gading'),
(149, 'Pulau Norfolk'),
(150, 'Burkina Faso'),
(151, 'Tajikistan'),
(152, 'Belarus'),
(153, 'Fiji'),
(154, 'Bhutan'),
(155, 'Ekuador'),
(156, 'Kepulauan Turks dan Caicos'),
(157, 'Afganistan'),
(158, 'Palau'),
(159, 'Kepulauan Cocos'),
(160, 'Nikaragua'),
(161, 'Iran'),
(162, 'Yaman'),
(163, 'Guinea Bissau'),
(164, 'Tanzania'),
(165, 'Panama'),
(166, 'Guinea'),
(167, 'Kolombia'),
(168, 'Eritrea'),
(169, 'Afrika Selatan'),
(170, 'Latvia'),
(171, 'Kamerun'),
(172, 'Kepulauan Faroe'),
(173, 'Zimbabwe'),
(174, 'Liberia'),
(175, 'Uni Emirat Arab'),
(176, 'Madagaskar'),
(177, 'Amerika Serikat'),
(178, 'Estonia'),
(179, 'Saint Pierre dan Miquelon'),
(180, 'Venezuela'),
(181, 'Laos'),
(182, 'Kirgizia'),
(183, 'Republik Demokratik Kongo'),
(184, 'Mozambik'),
(185, 'Brasil'),
(186, 'Peru'),
(187, 'Bahama'),
(188, 'Chili'),
(189, 'Djibouti'),
(190, 'Swedia'),
(191, 'Uruguay'),
(192, 'Guinea Khatulistiwa'),
(193, 'Solomon'),
(194, 'Saint Helena'),
(195, 'Vanuatu'),
(196, 'Sudan'),
(197, 'Paraguay'),
(198, 'Finlandia'),
(199, 'Selandia Baru'),
(200, 'Zambia'),
(201, 'Argentina'),
(202, 'Norwegia'),
(203, 'Oman'),
(204, 'Aljazair'),
(205, 'Arab Saudi'),
(206, 'Somalia'),
(207, 'Belize'),
(208, 'Papua Nugini'),
(209, 'Kaledonia Baru'),
(210, 'Turkmenistan'),
(211, 'Mali'),
(212, 'Niger'),
(213, 'Angola'),
(214, 'Republik Kongo'),
(215, 'Rusia'),
(216, 'Bolivia'),
(217, 'Chad'),
(218, 'Libya'),
(219, 'Kazakhstan'),
(220, 'Gabon'),
(221, 'Guyana'),
(222, 'Kanada'),
(223, 'Rep Afrika Tengah'),
(224, 'Mauritania'),
(225, 'Islandia'),
(226, 'Botswana'),
(227, 'Suriname'),
(228, 'Australia'),
(229, 'Namibia'),
(230, 'Pulau Natal'),
(231, 'Guyana Perancis'),
(232, 'Mongolia'),
(233, 'Sahara Barat'),
(234, 'Kepulauan Pitcairn'),
(235, 'Kepulauan Falkland'),
(236, 'Svalbard'),
(237, 'Greenland');

-- --------------------------------------------------------

--
-- Table structure for table `negara_kategori`
--

CREATE TABLE `negara_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `negara_kategori`
--

INSERT INTO `negara_kategori` (`id_kategori`, `kategori_nama`) VALUES
(1, 'NATIONAL'),
(2, 'INTERNATIONAL');

-- --------------------------------------------------------

--
-- Table structure for table `tikm`
--

CREATE TABLE `tikm` (
  `id_ikm` int(11) NOT NULL,
  `puas` int(5) NOT NULL,
  `cukup` int(5) NOT NULL,
  `kurang` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tikm`
--

INSERT INTO `tikm` (`id_ikm`, `puas`, `cukup`, `kurang`) VALUES
(1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `unit_nama` varchar(255) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `unit_nama`, `status`, `date_created`, `date_updated`) VALUES
(1, 'BAAK', 'Y', '2022-11-25 17:00:00', '2022-12-01 07:13:24'),
(2, 'BAU', 'Y', '2022-11-25 17:00:00', '2022-12-01 07:13:27'),
(3, 'Laboratorium', 'Y', '2022-11-25 17:00:00', '2022-12-01 07:13:30'),
(4, 'Perpustakaan', 'Y', '2022-11-25 17:00:00', '2022-12-01 07:13:32'),
(5, 'LP2M', 'Y', '2022-11-25 17:00:00', '2022-12-01 07:13:34'),
(6, 'LPM', 'Y', '2022-11-25 17:00:00', '2022-12-01 07:13:35'),
(7, 'Sarana dan Prasarana', 'Y', '2022-11-25 17:00:00', '2022-12-01 07:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `id_univ` int(11) NOT NULL,
  `univ_nama` varchar(255) NOT NULL,
  `univ_alamat` text NOT NULL,
  `univ_telp` varchar(20) NOT NULL,
  `univ_wa` varchar(20) NOT NULL,
  `univ_email` varchar(50) NOT NULL,
  `univ_fax` varchar(50) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id_univ`, `univ_nama`, `univ_alamat`, `univ_telp`, `univ_wa`, `univ_email`, `univ_fax`, `date_created`, `date_updated`) VALUES
(1, 'universitas TRISAKTI', 'Jalan Kyai Tapa No. 1 Grogol\r\nJakarta Barat, Indonesia                                              ', '(62-21) 566 3232', '(+62) 882 1948 5674', 'humas@trisakti.ac.id', '(62-21) 564 4270', '2022-11-20 12:21:20', '2022-11-20 14:39:54'),
(2, 'udinus', 'semarang', '08232323', '0090232322', 'udinus@.gmail.com', '232323', '2022-11-20 13:23:50', NULL),
(3, 'Universitas Panca Sakti', 'Tegal', '02202022', '08232323232', 'user@gmail.com', '232323', '2022-11-25 05:30:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `level` enum('admin','superadmin','user') NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N',
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_user`, `level`, `blokir`, `status`) VALUES
(1, 'member', '17c4520f6cfd1ab53d8745e84681eb49', 'member', 'user', 'Y', 1),
(2, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin', 'admin', 'Y', 1),
(3, 'masruhin', '17c4520f6cfd1ab53d8745e84681eb49', 'masruhin', 'user', 'N', 1),
(4, 'sample', '17c4520f6cfd1ab53d8745e84681eb49', 'sample', 'user', 'Y', 0),
(5, 'user', '17c4520f6cfd1ab53d8745e84681eb49', 'user', 'user', 'Y', 0),
(6, 'masuk', 'f3770595e0cb4d9a988bd5da98d2187d', 'masuk', 'user', 'N', 0);

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `telpon` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat` text,
  `instagram` varchar(100) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Y','N') DEFAULT 'Y',
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `judul`, `deskripsi`, `telpon`, `email`, `alamat`, `instagram`, `date_created`, `date_updated`, `status`, `gambar`) VALUES
(5, '', '', '', '', '', '', '2023-01-05 15:55:14', NULL, 'Y', '2023-01-05_1.jpeg'),
(6, '', '', '', '', '', '', '2023-01-05 15:57:52', NULL, 'Y', '2023-01-05_dua.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bentuk_kerjasama`
--
ALTER TABLE `bentuk_kerjasama`
  ADD PRIMARY KEY (`id_bkerja`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fak`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `jenis_dok`
--
ALTER TABLE `jenis_dok`
  ADD PRIMARY KEY (`id_jenis_dok`);

--
-- Indexes for table `kerjasama`
--
ALTER TABLE `kerjasama`
  ADD PRIMARY KEY (`id_kerjasama`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indexes for table `negara`
--
ALTER TABLE `negara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `negara_kategori`
--
ALTER TABLE `negara_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tikm`
--
ALTER TABLE `tikm`
  ADD PRIMARY KEY (`id_ikm`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id_univ`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
