-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 05:03 PM
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
(1, 'BM/I/011', 'Informatika', 'teradapat dua prodi pada fakultas ini                              ', '2022-11-21 02:11:26', '2022-11-21 15:10:04'),
(2, 'asdasd', 'Kedokteran', 'asdsd                                                            ', '2022-11-21 02:45:08', '2022-11-21 02:56:14');

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
(3, 'MEMORANDUM OF AGREEMENT / PERJANJIAN KERJASAMA', '');

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
(1, 'LMG01', 'LEMBAGA PENDIDIKAN (DALAM NEGERI)', '', '2022-11-20 17:00:00', NULL),
(2, 'LMG02', 'LEMBAGA PENDIDIKAN (LUAR NEGERI)', '', '2022-11-20 17:00:00', NULL),
(3, 'LMG03', 'DUNIA KERJA DAN INDUSTRI (LUAR NEGERI)', '   dunia industri                           ', '2022-11-20 17:00:00', '2022-11-21 15:37:44'),
(4, 'LMG04', 'ORGANISASI (DALAM NEGERI)', '                              ', '2022-11-21 15:32:29', NULL);

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
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `unit_kode` varchar(20) NOT NULL,
  `unit_nama` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `unit_kode`, `unit_nama`, `date_created`, `date_updated`) VALUES
(1, '', 'Biro Administrasi Umum', '2022-11-19 17:00:00', '2022-11-20 07:38:35'),
(2, '', 'Fakultas Ekonomi dan Bisnis', '2022-11-19 17:00:00', NULL),
(3, '', 'Fakultas Teknik Informatika', '2022-11-20 07:22:46', '2022-11-20 07:38:23'),
(5, '', 'Pascasarjana', '2022-11-20 14:17:45', NULL),
(6, '', 'Biro Keuangan', '2022-11-20 14:17:45', NULL),
(7, '', 'Lembaga Pengembangan Kemahasiswaan dan Alumni', '2022-11-20 14:17:45', NULL),
(8, '', 'Biro Sumber Daya Insani', '2022-11-20 14:17:45', NULL),
(9, '', 'Direktorat Pemakmuran Masjid', '2022-11-20 14:17:45', NULL),
(10, '', 'Satuan Pengendalian Internal', '2022-11-20 14:17:45', NULL),
(11, '', 'UPT Perpustakaan', '2022-11-20 14:17:45', NULL),
(12, '', 'UPT Pemasaran dan Kehumasan', '2022-11-20 14:17:45', NULL),
(13, '', 'Biro Hukum', '2022-11-20 14:17:45', NULL),
(14, '', 'Biro Administrasi Umum', '2022-11-20 14:17:45', NULL),
(15, '', 'Biro Administrasi Akademik', '2022-11-20 14:17:45', NULL),
(16, '', 'Lembaga Penelitian dan Pengembangan Masyarakat', '2022-11-20 14:17:45', NULL);

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
(2, 'udinus', 'semarang', '08232323', '0090232322', 'udinus@.gmail.com', '232323', '2022-11-20 13:23:50', NULL);

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
  `blokir` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_user`, `level`, `blokir`) VALUES
(1, 'member', '17c4520f6cfd1ab53d8745e84681eb49', 'member', 'user', 'Y'),
(2, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'superadmin', 'admin', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fak`);

--
-- Indexes for table `jenis_dok`
--
ALTER TABLE `jenis_dok`
  ADD PRIMARY KEY (`id_jenis_dok`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_dok`
--
ALTER TABLE `jenis_dok`
  MODIFY `id_jenis_dok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id_lembaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `negara`
--
ALTER TABLE `negara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `negara_kategori`
--
ALTER TABLE `negara_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id_univ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
