-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2021 at 06:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bakul`
--

CREATE TABLE `tbl_bakul` (
  `idbakul` int(255) NOT NULL,
  `idpengguna` varchar(255) NOT NULL,
  `iditem` int(255) NOT NULL,
  `kuantiti` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_bakul`
--

INSERT INTO `tbl_bakul` (`idbakul`, `idpengguna`, `iditem`, `kuantiti`) VALUES
(1, 'm-10921043@moe-dl.edu.my\r\n', 1, 1),
(2, 'm-11328@moe-dl.edu.my', 2, 1),
(3, 'm-113521@moe-dl.edu.my', 5, 2),
(4, 'm-11366@moe-dl.edu.my', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_belian`
--

CREATE TABLE `tbl_belian` (
  `idbelian` int(255) NOT NULL,
  `idpengguna` varchar(255) NOT NULL,
  `iditem` int(255) NOT NULL,
  `kuantitibelian` int(255) NOT NULL,
  `idresit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_belian`
--

INSERT INTO `tbl_belian` (`idbelian`, `idpengguna`, `iditem`, `kuantitibelian`, `idresit`) VALUES
(1, 'm-10921043@moe-dl.edu.my', 1, 2, 1),
(2, 'm-10921043@moe-dl.edu.my\r\n', 3, 1, 1),
(3, 'm-11366@moe-dl.edu.my', 1, 1, 2),
(4, 'm-11366@moe-dl.edu.my', 2, 1, 2),
(5, 'm-12250@moe-dl.edu.my', 5, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `iditem` int(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `hargaitem` decimal(6,2) NOT NULL,
  `gambaritem` varchar(255) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`iditem`, `item`, `hargaitem`, `gambaritem`, `stok`) VALUES
(1, 'Kertas A4', '10.00', 'gambar/A4.jpg', 10),
(2, 'Pen Biru', '1.10', 'gambar/penbirustabilo.jpg', 5),
(3, 'Pemadam', '0.90', 'gambar/pemadamsteadler.jpg', 5),
(4, 'Pen Hitam', '1.10', 'gambar/penhitamstabilo.jpg', 5),
(5, 'Pen Merah', '1.10', 'gambar/penmerahstabilo.jpg', 5),
(6, 'Biskut Keju', '0.50', 'gambar/biskutcheese.jpg', 10),
(7, 'Biskut Coklat', '0.50', 'gambar/biskutchocolate.jpg', 12),
(8, 'Air Mineral', '1.00', 'gambar/airmineral.jpg', 20),
(9, 'Krayon', '12.00', 'gambar/crayon.jpg', 10),
(10, 'Air Kotak Coklat', '2.00', 'gambar/chocolatemilk.jpg', 6),
(11, 'Pemadam', '0.90', 'gambar/pemadamfaber.jpg', 50),
(12, 'Air Kotak Anggur', '1.80', 'gambar/jusanggur.jpg', 10),
(13, 'Air Kotak Epal', '1.80', 'gambar/jusapple.jpg', 10),
(14, 'Air Mineral', '1.00', 'gambar/desa.jpg', 50),
(15, 'Biskut Asli', '1.50', 'gambar/oreo.jpg', 14),
(16, 'Biskut Coklat', '1.50', 'gambar/oreochocolate.jpg', 6),
(17, 'Air Kotak Susu Asli', '2.00', 'gambar/originalmilk.jpg', 10),
(18, 'Pen Biru', '0.60', 'gambar/penbiru.jpg', 9),
(19, 'Pen Hitam', '0.60', 'gambar/penhitam.jpg', 9),
(20, 'Pen Merah', '0.60', 'gambar/penmerah.jpg', 10),
(21, 'Pensel Warna', '4.50', 'gambar/penselwarna.jpg', 5),
(22, 'Pensel', '0.50', 'gambar/pensil.jpg', 20),
(23, 'Pocky Coklat', '3.00', 'gambar/pockychocolate.jpg', 8),
(24, 'Pocky Strawberi', '3.00', 'gambar/pockystrawberry.jpg', 8),
(25, 'Air Kotak Strawberi', '2.00', 'gambar/strawberrymilk.jpg', 8),
(26, 'Air Kotak Teh Bunga', '1.00', 'gambar/tehbunga.jpg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `idpengguna` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `katalaluan` varchar(225) NOT NULL,
  `masa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nilai` decimal(6,2) NOT NULL DEFAULT '0.00',
  `jenispengguna` varchar(2) NOT NULL,
  `ic` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`idpengguna`, `nama`, `katalaluan`, `masa`, `nilai`, `jenispengguna`, `ic`) VALUES
('g-111111', 'ADMIN', 'admin', '2021-08-03 03:00:09', '0.00', '1', '111111111111'),
('m-10921043@moe-dl.edu.my', ' NUR AIN AMIRA BINTI ZAINI', ' 7590503', '0000-00-00 00:00:00', '50.00', ' 2', ' 31084'),
('m-111', 'TESTER', '111', '2021-08-03 07:32:17', '100.00', '2', '111111111111'),
('m-11328@moe-dl.edu.my', ' MUHAMMAD SAIFULLIZAM BIN SAMSUL BAHRI', ' 7734367', '0000-00-00 00:00:00', '50.00', ' 2', ' 30881'),
('m-113521@moe-dl.edu.my', ' MUHAMAD AIMAN BIN HARITH AIMAN', ' 7608223', '0000-00-00 00:00:00', '50.00', ' 2', ' 30806'),
('m-113548@moe-dl.edu.my', ' AKMA IZZATI BINTI BAHRI', ' 7765287', '0000-00-00 00:00:00', '50.00', ' 2', ' 30938'),
('m-11366@moe-dl.edu.my', ' MUHAMAD DANIAL BIN MOHAMAD YUSRIZAN', ' 7659547', '0000-00-00 00:00:00', '50.00', ' 2', ' 30785'),
('m-11454524@moe-dl.edu.my', ' WAN XI LE', ' 7749921', '0000-00-00 00:00:00', '50.00', ' 2', ' 30858'),
('m-11507262@moe-dl.edu.my', ' TEO U YU', ' 7646671', '0000-00-00 00:00:00', '50.00', ' 2', ' 30776'),
('m-116018@moe-dl.edu.my', ' KHOO XIN HUI', ' 7718275', '0000-00-00 00:00:00', '50.00', ' 2', ' 30790'),
('m-11642884@moe-dl.edu.my', ' HOONG JIE FONG', ' 7904347', '0000-00-00 00:00:00', '50.00', ' 2', ' 30788'),
('m-11643076@moe-dl.edu.my', ' CHONG XI CHIN', ' 7688330', '0000-00-00 00:00:00', '50.00', ' 2', ' 30861'),
('m-116597@moe-dl.edu.my', ' LUVATAARANI A/P BASKAR', ' 7991481', '0000-00-00 00:00:00', '50.00', ' 2', ' 30923'),
('m-121365@moe-dl.edu.my', ' VISHALINI A/P SIVAM', ' 7653959', '0000-00-00 00:00:00', '50.00', ' 2', ' 30817'),
('m-12250@moe-dl.edu.my', ' TUSHAR DHIRRAN A/L VADIVELAN', ' 7698840', '0000-00-00 00:00:00', '50.00', ' 2', ' 30866'),
('m-12336@moe-dl.edu.my', ' KANAGASINGAM A/L TINESH NAIR', ' 7642969', '0000-00-00 00:00:00', '50.00', ' 2', ' 31086'),
('m-12401@moe-dl.edu.my', ' MURUGAN A/L YUTESH', ' 7699452', '0000-00-00 00:00:00', '50.00', ' 2', ' 30818');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resit`
--

CREATE TABLE `tbl_resit` (
  `idresit` int(255) NOT NULL,
  `masaresit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idpengguna` varchar(255) NOT NULL,
  `jumlahbayar` decimal(6,2) NOT NULL,
  `statusfastkop` varchar(15) NOT NULL DEFAULT 'Dalam proses',
  `statuspelanggan` varchar(15) NOT NULL DEFAULT 'Belum ambil'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_resit`
--

INSERT INTO `tbl_resit` (`idresit`, `masaresit`, `idpengguna`, `jumlahbayar`, `statusfastkop`, `statuspelanggan`) VALUES
(1, '2021-07-17 16:16:30', 'm-10921043@moe-dl.edu.my\r\n', '20.90', 'Selesai', 'Selesai'),
(2, '2021-07-17 16:17:27', 'm-11366@moe-dl.edu.my', '11.10', 'Pesanan siap', 'Belum ambil'),
(3, '2021-07-17 16:18:46', 'm-12250@moe-dl.edu.my', '1.10', 'Dalam proses', 'Belum ambil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bakul`
--
ALTER TABLE `tbl_bakul`
  ADD PRIMARY KEY (`idbakul`);

--
-- Indexes for table `tbl_belian`
--
ALTER TABLE `tbl_belian`
  ADD PRIMARY KEY (`idbelian`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`iditem`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `tbl_resit`
--
ALTER TABLE `tbl_resit`
  ADD PRIMARY KEY (`idresit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bakul`
--
ALTER TABLE `tbl_bakul`
  MODIFY `idbakul` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_belian`
--
ALTER TABLE `tbl_belian`
  MODIFY `idbelian` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `iditem` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_resit`
--
ALTER TABLE `tbl_resit`
  MODIFY `idresit` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
