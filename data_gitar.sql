-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2018 at 10:52 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_gitar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_nama` varchar(25) NOT NULL,
  `bank_pemilik` varchar(50) NOT NULL,
  `bank_norek` varchar(30) NOT NULL,
  `bank_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_nama`, `bank_pemilik`, `bank_norek`, `bank_file`) VALUES
(3, 'BCA', 'Rusdianto', '2213', '44a51714ef693e435ac6f2fecab02e58.jpg'),
(4, 'BRI', 'Rusdianto', '2253526', '45c5b86d6bcbfd54bd205d6778847af2.png');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_kode` varchar(15) NOT NULL,
  `list_id` int(11) NOT NULL,
  `barang_nama` varchar(50) NOT NULL,
  `barang_harga` int(11) NOT NULL,
  `barang_ket` text NOT NULL,
  `barang_gambar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_kode`, `list_id`, `barang_nama`, `barang_harga`, `barang_ket`, `barang_gambar`) VALUES
('GTR00X10', 24, 'Walnut', 200000, '', NULL),
('GTR00X2', 22, 'Right', 500000, '', NULL),
('GTR00X3', 22, 'Left', 200000, '', NULL),
('GTR00X4', 30, 'SS', 750000, 'aa', NULL),
('GTR00X5', 23, '24', 2222, 'asd', NULL),
('GTR00X6', 23, '25', 2342323, 'asdasdsa', NULL),
('GTR00X7', 21, '12', 200000, '', NULL),
('GTR00X71811', 24, 'Xtern', 250000, 'aaa', NULL),
('GTR00X8', 24, 'Mahogany', 300000, '', NULL),
('GTR00X89912', 31, 'Xneck', 720000, 'aa', NULL),
('GTR00X9', 24, 'Spruce', 350000, '', NULL),
('GTR00X96010', 24, 'XDirection 1', 500000, 'asd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_kode` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `shape_id` int(11) NOT NULL,
  `barang_kode` text NOT NULL,
  `cart_total` int(11) NOT NULL,
  `cart_message` text NOT NULL,
  `cart_status` enum('menunggu','proses','selesai') NOT NULL DEFAULT 'menunggu',
  `cart_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_kode`, `user_id`, `type_id`, `shape_id`, `barang_kode`, `cart_total`, `cart_message`, `cart_status`, `cart_tanggal`) VALUES
('CST00120180712205', 7, 5, 11, 'GTR00X3,GTR00X6,GTR00X1,GTR00X2', 631223, 'asdsad', 'selesai', '2018-07-11 23:58:10'),
('CST0022018071240', 6, 5, 12, 'GTR00X3,GTR00X6,GTR00X1,GTR00X2', 631223, 'ters', 'selesai', '2018-07-12 00:01:51'),
('CST00320180712639', 7, 5, 12, 'GTR00X3,GTR00X6,GTR00X1,GTR00X2', 631223, 'cece', 'selesai', '2018-07-12 00:02:07'),
('CST00420180712884', 7, 6, 11, 'GTR00X7,GTR00X5', 243111, 'tera', 'selesai', '2018-07-12 00:02:18'),
('CST00520180712479', 7, 6, 12, 'GTR00X4,GTR00X5', 250000, 'adsd', 'selesai', '2018-07-12 00:02:30'),
('CST0062018080122', 7, 5, 10, 'GTR00X2,GTR00X6', 2842323, 'asdasd', 'selesai', '2018-08-01 02:34:42'),
('CST00720180801699', 7, 5, 11, 'GTR00X7,GTR00X2', 700000, 'asdad', 'selesai', '2018-08-01 03:07:18'),
('CST00820180801182', 7, 5, 10, 'GTR00X7,GTR00X3', 400000, 'asdsad', 'menunggu', '2018-08-01 04:33:58'),
('CST00920180801935', 7, 5, 10, 'GTR00X2,GTR00X6', 2842323, '666\r\n', 'selesai', '2018-08-01 04:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `coment`
--

CREATE TABLE `coment` (
  `coment_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coment_isi` text NOT NULL,
  `coment_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coment`
--

INSERT INTO `coment` (`coment_id`, `topic_id`, `user_id`, `coment_isi`, `coment_tanggal`) VALUES
(1, 1, 6, 'apa ya?', '2018-07-10 17:00:00'),
(2, 1, 5, 'ratau', '2018-07-10 17:00:00'),
(3, 4, 5, '<p><b>gmna yaaaa</b></p>', '2018-07-10 18:41:12'),
(4, 1, 1, 'aaaaa', '2018-07-25 09:30:07'),
(5, 2, 1, '<p>aaa</p>', '2018-07-25 09:30:33'),
(6, 1, 7, '<p>aaaaaaaas</p>', '2018-07-25 09:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_jk` enum('L','P') NOT NULL,
  `user_tgl_lahir` date NOT NULL,
  `user_tel` char(12) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_foto` varchar(50) NOT NULL DEFAULT 'avatar-01,jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`user_id`, `user_nama`, `user_jk`, `user_tgl_lahir`, `user_tel`, `user_alamat`, `user_foto`) VALUES
(1, 'Aditya Dharmawan S', 'L', '2017-11-06', '082371373347', 'jl. antasar azhar', 'avatar-01.jpg'),
(2, 'Tes Penjual', 'L', '2017-11-07', '08888', 'jl.aaa', 'avatar-01.jpg'),
(3, 'black', 'L', '0000-00-00', '', '', 'avatar-01.jpg'),
(4, 'beni', 'L', '0000-00-00', '', '', 'avatar-01.jpg'),
(5, 'tukang beli', 'L', '0000-00-00', '', '', 'avatar-01.jpg'),
(6, 'ici', 'L', '0000-00-00', '', '', 'avatar-01.jpg'),
(7, 'Aryass', 'P', '2018-07-19', '02020', 'aaaaa', '1df171de73256dd45a35e455ad2c7cf1.jpg'),
(11, 'bro', 'L', '0000-00-00', '', '', 'avatar-01,jpg'),
(12, 'yoga', 'L', '0000-00-00', '', '', 'avatar-01,jpg'),
(13, 'PIMpim', 'L', '2018-09-24', '08222', 'aa', 'avatar-01,jpg');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `forum_id` int(11) NOT NULL,
  `forum_judul` varchar(50) NOT NULL,
  `forum_subjudul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_id`, `forum_judul`, `forum_subjudul`) VALUES
(1, 'Lounge', 'tempat berbicara sesuka hati'),
(2, 'Dispub', 'tempat diskusi public'),
(3, 'Tawa Sutra', 'Tes tawa1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(30) NOT NULL,
  `type_id` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `type_id`, `kategori_nama`) VALUES
(23, 5, 'General Option'),
(24, 5, 'Body Option'),
(27, 5, 'Neck Option'),
(28, 5, 'Fretboard Option'),
(29, 5, 'Component'),
(30, 6, 'General Option'),
(31, 6, 'Body Option'),
(32, 6, 'Neck Option'),
(33, 6, 'Fretboard Option'),
(34, 6, 'Component');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `list_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `list_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`list_id`, `kategori_id`, `list_nama`) VALUES
(21, 23, 'Number Of String'),
(22, 23, 'Orientation'),
(23, 23, 'Scale Lenght'),
(24, 24, 'Top Wood'),
(25, 24, 'Side Wood'),
(26, 24, 'Back Wood'),
(27, 24, 'Binding'),
(28, 24, 'Arm Rest'),
(29, 24, 'Color Type'),
(30, 24, 'Finish'),
(31, 27, 'Neck');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `ongkir_id` int(11) NOT NULL,
  `ongkir_provinsi` varchar(25) NOT NULL,
  `ongkir_biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`ongkir_id`, `ongkir_provinsi`, `ongkir_biaya`) VALUES
(1, 'ACEH', 50000),
(2, 'SUMATERA UTARA', 25000),
(3, 'SUMATERA BARAT', 30000),
(4, 'RIAU', 15000),
(5, 'JAMBI', 25000),
(6, 'SUMATERA SELATAN', 50000),
(7, 'BENGKULU', 14000),
(8, 'LAMPUNG', 13000),
(9, 'KEPULAUAN BANGKA BELITUNG', 16000),
(10, 'KEPULAUAN RIAU', 23000),
(11, 'DKI JAKARTA', 21000),
(12, 'JAWA BARAT', 28000),
(13, 'JAWA TENGAH', 50000),
(14, 'DI YOGYAKARTA', 25000),
(15, 'JAWA TIMUR', 30000),
(16, 'BANTEN', 15000),
(17, 'BALI', 25000),
(18, 'NUSA TENGGARA BARAT', 50000),
(19, 'NUSA TENGGARA TIMUR', 14000),
(20, 'KALIMANTAN BARAT', 13000),
(21, 'KALIMANTAN TENGAH', 16000),
(22, 'KALIMANTAN SELATAN', 23000),
(23, 'KALIMANTAN TIMUR', 21000),
(24, 'KALIMANTAN UTARA', 28000),
(25, 'SULAWESI UTARA', 50000),
(26, 'SULAWESI TENGAH', 25000),
(27, 'SULAWESI SELATAN', 30000),
(28, 'SULAWESI TENGGARA', 15000),
(29, 'GORONTALO', 25000),
(30, 'SULAWESI BARAT', 50000),
(31, 'MALUKU', 14000),
(32, 'MALUKU UTARA', 13000),
(33, 'PAPUA BARAT', 16000),
(34, 'PAPUA', 23000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(11) NOT NULL,
  `cart_kode` varchar(30) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `pembayaran_file` text NOT NULL,
  `pembayaran_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`pembayaran_id`, `cart_kode`, `bank_id`, `pembayaran_file`, `pembayaran_date`) VALUES
(4, 'CST00420180712884', 3, '22523d4131b1f36c505464b7f9c42cd5.png', '2018-07-12 07:06:49'),
(5, 'CST0022018071240', 4, '17c2e60462183bf142794e25e0921852.png', '2018-07-12 07:14:08'),
(6, 'CST00120180712205', 4, '46ab8b635f348366797a56b6924f8838.png', '2018-07-12 09:37:53'),
(7, 'CST00320180712639', 3, 'b04d487cadd773dde8190d54a691a248.jpg', '2018-07-24 15:29:52'),
(8, 'CST0062018080122', 3, 'b4858a635864491b94fb377721107ae2.jpg', '2018-08-01 09:45:41'),
(9, 'CST00720180801699', 3, '37df40e263a9126959cf23b36955bdce.jpg', '2018-08-01 11:23:01'),
(10, 'CST00920180801935', 4, '9e4d5235e264bb98413e4f4a9b17d1cb.jpg', '2018-08-01 11:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `pemesanan_id` int(11) NOT NULL,
  `cart_kode` varchar(30) NOT NULL,
  `ongkir_id` varchar(11) NOT NULL,
  `pemesanan_nama` varchar(50) NOT NULL,
  `pemesanan_tel` char(12) NOT NULL,
  `pemesanan_kota` varchar(25) NOT NULL,
  `pemesanan_alamat` text NOT NULL,
  `pemesanan_message` text NOT NULL,
  `pemesanan_total` int(11) NOT NULL,
  `pemesanan_diskon` int(11) NOT NULL DEFAULT '0',
  `pemesanan_status` enum('waiting','kadaluarsa','selesai','packing') NOT NULL,
  `pemesanan_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`pemesanan_id`, `cart_kode`, `ongkir_id`, `pemesanan_nama`, `pemesanan_tel`, `pemesanan_kota`, `pemesanan_alamat`, `pemesanan_message`, `pemesanan_total`, `pemesanan_diskon`, `pemesanan_status`, `pemesanan_date`) VALUES
(16, 'CST00120180712205', '4', 'adityads', '082222', 'Aceh barat', 'jl.aaaa', 'asd', 646223, 0, 'selesai', '2018-07-12 07:03:08'),
(17, 'CST00520180712479', '3', 'magnum', '080', 'asdsadsa', '', 'asdsa', 280000, 0, 'selesai', '2018-07-12 07:06:11'),
(18, 'CST00420180712884', '5', 'adsad', '080', 'palembang', 'jl.aaaa', 'hh', 268111, 0, 'selesai', '2018-07-12 07:06:35'),
(19, 'CST0022018071240', '15', 'asdasd', '08222', 'asdsadsa', 'sdsad', 'adasd', 661223, 0, 'selesai', '2018-07-12 07:13:56'),
(20, 'CST00320180712639', '6', 'idong', '213132', 'Palembang', 'Jslslslsls', '', 681223, 0, 'selesai', '2018-07-24 15:28:55'),
(22, 'CST0062018080122', '2', 'tespoin', '123', 'Aceh barat', 'aaa', 'aaaa', 2867323, 0, 'packing', '2018-08-01 09:45:32'),
(24, 'CST00720180801699', '1', 'adityads', '082222', 'Aceh barat', 'jl.aaa', '22', 749000, 1000, 'waiting', '2018-08-01 11:17:02'),
(25, 'CST00920180801935', '5', 'adityads', '082222', 'Aceh barat', 'jl.aaaa', '333', 2866323, 1000, 'selesai', '2018-08-01 11:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `pesan_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pemesanan_id` int(11) NOT NULL,
  `pesan_message` text NOT NULL,
  `pesan_file` text NOT NULL,
  `pesan_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`pesan_id`, `user_id`, `pemesanan_id`, `pesan_message`, `pesan_file`, `pesan_tanggal`) VALUES
(2, 7, 19, 'asdsad', 'e6430014be7afc567c68e57b03865b45.png', '2018-07-12 00:23:32'),
(3, 7, 18, 'adsa', '89900e63d2abb9dea01d4633f14bfa4f.png', '2018-07-12 02:38:10'),
(4, 7, 16, 'ads', 'ea0ac11a143db75472c7cda60e4fc819.png', '2018-07-12 02:38:17'),
(5, 7, 20, 'terimakasih', '71174a4520fed14f3209ff2e387a24dc.jpg', '2018-07-24 08:35:29'),
(6, 7, 17, '', '60f139b90503a6c37c460dd4311bfada.jpg', '2018-07-25 12:14:03'),
(7, 7, 25, 'aaa', 'd0c470afbbf0f2c65350ae437768dc2d.jpg', '2018-08-01 04:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `poin`
--

CREATE TABLE `poin` (
  `poin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaksi_kode` varchar(30) NOT NULL,
  `poin_jumlah` int(11) NOT NULL,
  `poin_status` enum('mendapatkan','menggunakan') NOT NULL,
  `poin_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poin`
--

INSERT INTO `poin` (`poin_id`, `user_id`, `transaksi_kode`, `poin_jumlah`, `poin_status`, `poin_tanggal`) VALUES
(1, 7, 'CST0062018080122', 10, 'mendapatkan', '2018-08-01 03:02:42'),
(4, 7, 'CST00720180801699', 1, 'menggunakan', '2018-08-01 04:17:02'),
(5, 7, 'CST00920180801935', 1, 'menggunakan', '2018-08-01 04:39:18'),
(6, 7, 'CST00920180801935', 10, 'mendapatkan', '2018-08-01 04:40:02');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `portfolio_judul` varchar(50) NOT NULL,
  `portfolio_keterangan` text NOT NULL,
  `portfolio_foto` text NOT NULL,
  `portfolio_tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`portfolio_id`, `user_id`, `portfolio_judul`, `portfolio_keterangan`, `portfolio_foto`, `portfolio_tanggal`) VALUES
(3, 7, 'Tress', 'tersadas adsad', 'd54519e76544093dfa6784272a90872a.jpg', '2018-07-10 15:38:36'),
(4, 7, 'Ta2', 'tersadas adsad', 'bc9debbcd6f374a4523725bfb1844a6c.png', '2018-07-10 15:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `repairmodif`
--

CREATE TABLE `repairmodif` (
  `rm_kode` varchar(15) NOT NULL,
  `rm_kategori_id` int(11) NOT NULL,
  `rm_nama` varchar(100) NOT NULL,
  `rm_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repairmodif`
--

INSERT INTO `repairmodif` (`rm_kode`, `rm_kategori_id`, `rm_nama`, `rm_harga`) VALUES
('RM1808012937', 4, 'Nickel / silver fret dressing (leveling, beveling, crowning & cleaning)', 125000),
('RM180801318', 1, '12-String acoustic restring + tuning', 15000),
('RM1808016571', 1, '6-String acoustic restring + tuning', 10000),
('RM1808017965', 5, 'Applying custom laser engrave logo (without repaint)', 200000),
('RM1808018259', 2, 'Routing body cavity for acoustic preamp installati', 125000),
('RM1808019244', 6, 'Fretboard re-radius (refretting is not included)', 75000);

-- --------------------------------------------------------

--
-- Table structure for table `rm_kategori`
--

CREATE TABLE `rm_kategori` (
  `rm_kategori_id` int(11) NOT NULL,
  `rm_kategori_nama` varchar(50) NOT NULL,
  `rm_kategori_jenis` enum('repair','modif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rm_kategori`
--

INSERT INTO `rm_kategori` (`rm_kategori_id`, `rm_kategori_nama`, `rm_kategori_jenis`) VALUES
(1, 'RESTRING', 'repair'),
(2, 'ELECTRONIC / PREAMP', 'modif'),
(4, 'FRETBOARD & NECK WORK', 'repair'),
(5, 'HEADSTOCK', 'modif'),
(6, 'FRETBOARD & NECK WORK', 'modif');

-- --------------------------------------------------------

--
-- Table structure for table `shape`
--

CREATE TABLE `shape` (
  `shape_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `shape_nama` varchar(50) NOT NULL,
  `shape_gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shape`
--

INSERT INTO `shape` (`shape_id`, `type_id`, `shape_nama`, `shape_gambar`) VALUES
(10, 5, 'Classical Guitar', 'faec89ef9532e0fa1da1cb11876c4cc6.jpg'),
(11, 5, 'Classical Venetian Cutaway', 'df1a4a8f1e0ca85e03064d9f55e47678.jpg'),
(12, 5, 'Dreadnought Venetian Cutaway', 'fa7c134cb390ebe4139d491cc80b2ee7.jpg'),
(13, 5, 'Dreadnought', 'b127243db00ac8bf12188f4889ec8a96.jpg'),
(14, 5, 'Parlour', '453ba7a052f4a2dde7aa909c2ba84eb9.jpg'),
(15, 6, 'Acoustic Bass Venetian Cutaway', 'b3a493bf2ea72ce0d2baa7f21942e5af.jpg'),
(16, 6, 'Acoustic Bass Florentine Cutaway', 'fdc063327e195c3e778b76460f1edf4b.jpg'),
(17, 6, 'Acoustic Bass Jumbo', '874fe000f6e3fa96ad6921ded6287e2b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_judul` varchar(50) NOT NULL,
  `topic_isi` text NOT NULL,
  `topic_tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `forum_id`, `user_id`, `topic_judul`, `topic_isi`, `topic_tanggal`) VALUES
(1, 1, 7, 'Apa itu hirarki?', '<p>gan permisi mau tanya apa itu hirarki?</p>', '2018-07-10 01:14:26'),
(2, 2, 7, 'Custom yang bagus gimana?', '<p>cara custom yg bagus gmna y?</p>', '2018-07-09 17:00:00'),
(3, 2, 7, 'tess', '<p><span style=\"background-color: rgb(255, 255, 0);\">asdasdasd</span></p>', '0000-00-00 00:00:00'),
(4, 2, 7, 'teasdada', '<p>ad</p><table class=\"table table-bordered\"><tbody><tr><td>ad</td><td><br></td></tr><tr><td>ad</td><td><br></td></tr></tbody></table><p><br></p>', '2018-07-10 17:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_nama` varchar(50) NOT NULL,
  `type_ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_nama`, `type_ket`) VALUES
(5, 'Acoustic Guitar', 'Acoustic&Classic'),
(6, 'Acoustic Bass', 'Acoustic');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(25) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_role` enum('admin','customer','pimpinan') NOT NULL DEFAULT 'customer',
  `user_last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_email`, `user_role`, `user_last_login`) VALUES
(1, 'adityads', '202cb962ac59075b964b07152d234b70', 'adityads@ymail.com', 'admin', '2017-12-13 14:12:43'),
(2, 'penjual', 'e120ea280aa50693d5568d0071456460', 'penjual@aaa.com', 'customer', '2017-12-06 01:25:20'),
(3, 'temon', 'e120ea280aa50693d5568d0071456460', 'bagus7474@gmail.com', 'customer', '2017-12-06 01:21:43'),
(4, 'beni', 'e120ea280aa50693d5568d0071456460', 'beni@gmail.com', 'customer', '2017-12-02 18:40:05'),
(5, 'pembeli', '202cb962ac59075b964b07152d234b70', 'pembeli@aaa.com', 'customer', '2017-12-06 01:30:08'),
(6, 'ocha', 'e120ea280aa50693d5568d0071456460', 'ici@g.com', 'customer', '2017-12-06 01:20:38'),
(7, 'anak', '202cb962ac59075b964b07152d234b70', 'asdsa@aaa.com', 'customer', '0000-00-00 00:00:00'),
(8, 'aaaaa', '513151b42773b97a2c596247f7204004', 'aaa@yahoo.com', 'customer', '0000-00-00 00:00:00'),
(9, 'idong', '513151b42773b97a2c596247f7204004', 'aaaaa@yahoo.com', 'customer', '0000-00-00 00:00:00'),
(10, 'ido', 'd41d8cd98f00b204e9800998ecf8427e', '', 'customer', '0000-00-00 00:00:00'),
(11, 'bro', 'e99a18c428cb38d5f260853678922e03', 'ay@gmail.com', 'customer', '0000-00-00 00:00:00'),
(12, 'yoga', '45a73564aacc33cff0bf8bf9e72370f5', 'y.hadisaputra@yahoo.com', 'customer', '0000-00-00 00:00:00'),
(13, 'pimpinan', '202cb962ac59075b964b07152d234b70', 'pimpinan@aaa.com', 'pimpinan', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_kode`),
  ADD KEY `id_list` (`list_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_kode`),
  ADD KEY `shape_id` (`shape_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `cart_ibfk_3` (`user_id`);

--
-- Indexes for table `coment`
--
ALTER TABLE `coment`
  ADD PRIMARY KEY (`coment_id`),
  ADD KEY `topic_id` (`topic_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD KEY `id_user` (`user_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forum_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`list_id`),
  ADD KEY `id_kategori` (`kategori_id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`ongkir_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`pembayaran_id`),
  ADD KEY `cart_kode` (`cart_kode`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`pemesanan_id`),
  ADD KEY `cart_kode` (`cart_kode`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`pesan_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pemesanan_id` (`pemesanan_id`);

--
-- Indexes for table `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`poin_id`),
  ADD KEY `transaksi_kode` (`transaksi_kode`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`portfolio_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `repairmodif`
--
ALTER TABLE `repairmodif`
  ADD PRIMARY KEY (`rm_kode`);

--
-- Indexes for table `rm_kategori`
--
ALTER TABLE `rm_kategori`
  ADD PRIMARY KEY (`rm_kategori_id`);

--
-- Indexes for table `shape`
--
ALTER TABLE `shape`
  ADD PRIMARY KEY (`shape_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `forum_id` (`forum_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `coment`
--
ALTER TABLE `coment`
  MODIFY `coment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `ongkir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `pembayaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `pemesanan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `pesan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `poin`
--
ALTER TABLE `poin`
  MODIFY `poin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rm_kategori`
--
ALTER TABLE `rm_kategori`
  MODIFY `rm_kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shape`
--
ALTER TABLE `shape`
  MODIFY `shape_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`list_id`) REFERENCES `list` (`list_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`shape_id`) REFERENCES `shape` (`shape_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coment`
--
ALTER TABLE `coment`
  ADD CONSTRAINT `coment_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `coment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD CONSTRAINT `detail_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`cart_kode`) REFERENCES `cart` (`cart_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`cart_kode`) REFERENCES `cart` (`cart_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`pemesanan_id`) REFERENCES `pemesanan` (`pemesanan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poin`
--
ALTER TABLE `poin`
  ADD CONSTRAINT `poin_ibfk_1` FOREIGN KEY (`transaksi_kode`) REFERENCES `cart` (`cart_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `poin_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shape`
--
ALTER TABLE `shape`
  ADD CONSTRAINT `shape_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`forum_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
