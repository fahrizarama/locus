-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2020 at 06:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `locus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `admin_username` varchar(128) NOT NULL,
  `admin_password` varchar(128) NOT NULL,
  `admin_view_password` varchar(128) NOT NULL,
  `admin_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_username`, `admin_password`, `admin_view_password`, `admin_level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE `mainmenu` (
  `seq` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `active_menu` varchar(50) NOT NULL,
  `icon_class` varchar(50) NOT NULL,
  `link_menu` varchar(50) NOT NULL,
  `menu_akses` varchar(12) NOT NULL,
  `entry_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entry_user` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`seq`, `idmenu`, `nama_menu`, `active_menu`, `icon_class`, `link_menu`, `menu_akses`, `entry_date`, `entry_user`) VALUES
(9, 9, 'Beranda', '', 'fas fa-home fa-2x', 'Admin', '', '2020-04-18 06:02:37', NULL),
(27, 27, 'Setting Ukuran', '', 'fas fa-cogs fa-2x', 'Setting_ukuran', '', '2020-03-13 20:53:59', NULL),
(21, 21, 'Setting Title', '', 'fas fa-wrench fa-2x', 'Setting_title', '', '2020-03-13 20:51:06', NULL),
(22, 22, 'Setting User', '', 'fas fa-user fa-2x', 'setting_user', '', '2020-03-13 20:51:10', NULL),
(10, 10, 'Slider', '', 'fas fa-sliders-h fa-2x', 'C_slider', '', '2020-04-23 21:07:49', NULL),
(11, 11, 'Tentang', '', 'fas fa-info fa-2x', 'C_tentang', '', '2020-07-03 04:08:46', NULL),
(12, 12, 'Event', '', 'fas fa-list-ul fa-2x', 'C_event', '', '2020-07-03 06:22:48', NULL),
(15, 15, 'Galeri', '', 'fas fa-images fa-2x', 'C_galeri', '', '2020-07-03 03:37:51', NULL),
(14, 14, 'Promo', '', 'fas fa-gift fa-2x', 'C_promo', '', '2020-07-03 06:34:43', NULL),
(13, 13, 'Merchant Partner', '', 'fas fa-bar-chart fa-2x', 'C_partner', '', '2020-07-04 02:11:24', NULL),
(16, 16, 'Artikel', '', 'fas fa-file-text fa-2x', 'C_artikel', '', '2020-07-06 03:15:59', NULL),
(17, 17, 'Survey', '', 'fas fa-area-chart fa-2x', 'C_survey', '', '2020-07-06 03:15:59', NULL),
(18, 18, 'Komentar', '', 'fas fa-comment fa-2x', 'C_komentar', '', '2020-07-10 06:29:50', NULL),
(20, 20, 'Recruitment', '', 'fas fa-users fa-2x', 'C_recruitment', '', '2020-10-08 05:13:09', NULL),
(19, 19, 'Karyawan', '', 'fas fa-user-tie fa-2x', 'C_karyawan', '', '2020-10-08 05:13:01', NULL),
(28, 28, 'Akun Pembukuan', '', 'fas fa-book fa-2x', 'C_akun_pembukuan', '', '2020-10-22 23:20:31', NULL),
(29, 29, 'Transaksi', '', 'far fa-handshake fa-2x', 'C_transaksi', '', '2020-10-23 23:46:56', NULL),
(30, 30, 'Laporan', '', 'fas fa-chart-line fa-2x', 'C_laporan', '', '2020-10-26 05:55:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting_ukuran`
--

CREATE TABLE `setting_ukuran` (
  `id_setting_ukuran` int(11) NOT NULL,
  `ukuran_foto_slider` char(15) NOT NULL,
  `ukuran_foto_tentang` char(15) NOT NULL,
  `ukuran_foto_produk` char(15) NOT NULL,
  `ukuran_foto_galeri` char(15) NOT NULL,
  `footer` char(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_ukuran`
--

INSERT INTO `setting_ukuran` (`id_setting_ukuran`, `ukuran_foto_slider`, `ukuran_foto_tentang`, `ukuran_foto_produk`, `ukuran_foto_galeri`, `footer`) VALUES
(1, '1000x500', '1000x1000', '2000x2000', '400x500', '200x200');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id_sub` int(11) NOT NULL,
  `nama_sub` varchar(50) NOT NULL,
  `mainmenu_idmenu` int(11) NOT NULL,
  `active_sub` varchar(20) NOT NULL,
  `icon_class` varchar(100) NOT NULL,
  `link_sub` varchar(50) NOT NULL,
  `sub_akses` varchar(12) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entry_user` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_sub`, `nama_sub`, `mainmenu_idmenu`, `active_sub`, `icon_class`, `link_sub`, `sub_akses`, `entry_date`, `entry_user`) VALUES
(1, 'Entry User', 8, '', '', 'User', '', '2020-10-22 23:09:26', NULL),
(2, 'Kategori Produk', 4, '', '', 'Produk', '', '2017-10-18 21:34:17', NULL),
(3, 'Produk', 4, '', '', 'Produk/detail', '', '2017-10-18 21:34:26', NULL),
(4, 'Album', 5, '', '', 'Gallery', '', '2020-10-22 23:11:37', NULL),
(5, 'Foto', 5, '', '', 'Gallery/foto', '', '2020-10-22 23:10:24', NULL),
(6, 'Aset', 28, '', 'fas fa-money', 'C_akun_pembukuan/akun/1', '', '2020-11-07 14:31:19', NULL),
(7, 'Modal', 28, '', 'fas fa-bank', 'C_akun_pembukuan/akun/2', '', '2020-11-07 14:32:11', NULL),
(8, 'Pemasukan', 28, '', 'fas fa-share', 'C_akun_pembukuan/akun/3', '', '2020-11-07 14:32:18', NULL),
(9, 'Pengeluaran', 28, '', 'fas fa-reply', 'C_akun_pembukuan/akun/4', '', '2020-11-07 14:32:28', NULL),
(10, 'Hutang', 28, '', 'fas fa-hand-holding-usd', 'C_akun_pembukuan/akun/5', '', '2020-11-07 14:32:37', NULL),
(11, 'Piutang', 28, '', 'fas fa-comment-dollar', 'C_akun_pembukuan/akun/6', '', '2020-11-07 14:32:46', NULL),
(24, 'Jurnal Umum', 30, '', 'fas fa-chart-bar', 'C_laporan/jurnal_umum', '', '2020-10-28 01:54:40', NULL),
(25, 'Buku Besar', 30, '', 'fas fa-book', 'C_laporan/buku_besar', '', '2020-10-28 01:54:48', NULL),
(12, 'Pemasukan Tunai', 29, '', '', 'C_transaksi/pemasukan_tunai', '', '2020-10-28 01:47:39', NULL),
(13, 'Pemasukan Sebagai Piutang', 29, '', '', 'C_transaksi/pemasukan_piutang', '', '2020-10-28 01:49:05', NULL),
(14, 'Pengeluaran Tunai', 29, '', '', 'C_transaksi/pengeluaran_tunai', '', '2020-10-28 01:49:42', NULL),
(15, 'Pengeluaran Sebagai Hutang', 29, '', '', 'C_transaksi/pengeluaran_hutang', '', '2020-10-28 01:50:11', NULL),
(16, 'Tambah Hutang', 29, '', '', 'C_transaksi/tambah_hutang', '', '2020-10-28 01:50:42', NULL),
(17, 'Bayar Hutang', 29, '', '', 'C_laporan/data_hutang', '', '2020-10-28 05:24:01', NULL),
(18, 'Tambah Piutang', 29, '', '', 'C_transaksi/tambah_piutang', '', '2020-10-28 01:51:48', NULL),
(19, 'Penyetoran Piutang', 29, '', '', 'C_laporan/data_piutang', '', '2020-10-29 09:36:06', NULL),
(20, 'Tambah Modal', 29, '', '', 'C_transaksi/tambah_modal', '', '2020-10-28 01:53:03', NULL),
(21, 'Tarik Modal', 29, '', '', 'C_transaksi/tarik_modal', '', '2020-10-28 01:53:03', NULL),
(22, 'Pengalihan Aset', 29, '', '', 'C_transaksi/alih_aset', '', '2020-10-28 01:54:18', NULL),
(23, 'Set Saldo Awal', 29, '', '', 'C_transaksi/saldo_awal', '', '2020-10-28 01:54:18', NULL),
(33, 'Data Hutang', 30, '', 'fas fa-hand-holding-usd', 'C_laporan/data_hutang', '', '2020-10-28 04:56:45', NULL),
(34, 'Data Piutang', 30, '', 'fas fa-comment-dollar', 'C_laporan/data_piutang', '', '2020-10-29 09:30:48', NULL),
(35, 'Data Kontak', 30, '', 'far fa-address-book', 'C_laporan/data_kontak', '', '2020-10-29 11:03:37', NULL),
(26, 'Neraca Saldo', 30, '', 'fas fa-weight-hanging', 'C_laporan/neraca_saldo', '', '2020-11-08 15:35:43', NULL),
(27, 'Neraca', 30, '', 'fas fa-balance-scale', 'C_laporan/neraca', '', '2020-11-08 15:28:02', NULL),
(37, 'Daftar SOP', 19, '', 'fas fa-file-contract', 'C_sop', '', '2020-11-17 11:20:43', NULL),
(36, 'Daftar Karyawan', 19, '', 'fas fa-user-tie', 'C_karyawan', '', '2020-11-17 11:21:59', NULL),
(28, 'Laba Rugi', 30, '', 'fas fa-dollar-sign', 'C_laporan/laba_rugi', '', '2020-11-26 03:31:38', NULL),
(29, 'Saldo Akhir', 30, '', 'fas fa-money-bill-wave', 'C_laporan/saldo_akhir', '', '2020-11-30 06:46:11', NULL),
(38, 'Daftar Jabatan', 19, '', 'fas fa-briefcase', 'C_karyawan/jabatan', '', '2020-12-02 07:45:21', NULL),
(39, 'Daftar Merchant Partner', 13, '', 'fa fa-users', 'C_partner', '', '2020-12-04 02:34:11', NULL),
(40, 'Daftar Jenis Partner', 13, '', 'fas fa-thumbtack', 'C_partner/jenis_partner', '', '2020-12-04 02:39:06', NULL),
(41, 'Daftar Produk', 13, '', 'fas fa-tags', 'C_produk', '', '2020-12-04 02:39:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tab_akses_mainmenu`
--

CREATE TABLE `tab_akses_mainmenu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `c` int(11) DEFAULT 0,
  `r` int(11) DEFAULT 0,
  `u` int(11) DEFAULT 0,
  `d` int(11) DEFAULT 0,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entry_user` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_akses_mainmenu`
--

INSERT INTO `tab_akses_mainmenu` (`id`, `id_menu`, `id_level`, `c`, `r`, `u`, `d`, `entry_date`, `entry_user`) VALUES
(9, 9, 1, 0, 1, 0, 0, '2018-01-21 02:05:57', ''),
(10, 10, 1, 0, 1, 0, 0, '2018-12-28 08:29:38', ''),
(11, 11, 1, 0, 1, 0, 0, '2018-12-28 08:29:38', ''),
(12, 12, 1, 0, 1, 0, 0, '2018-12-28 08:29:38', ''),
(15, 15, 1, 0, 1, 0, 0, '2020-07-03 03:38:25', ''),
(18, 18, 1, 0, 1, 0, 0, '2020-07-10 06:30:31', ''),
(17, 17, 1, 0, 1, 0, 0, '2020-07-06 03:16:55', ''),
(16, 16, 1, 0, 1, 0, 0, '2020-07-06 03:16:55', ''),
(13, 13, 1, 0, 1, 0, 0, '2020-07-03 03:43:15', ''),
(14, 14, 1, 0, 1, 0, 0, '2020-07-03 03:37:01', ''),
(19, 19, 1, 0, 1, 0, 0, '2020-10-06 11:06:36', ''),
(20, 20, 1, 0, 1, 0, 0, '2020-10-08 05:11:39', ''),
(28, 28, 1, 0, 1, 0, 0, '2020-10-22 23:03:04', ''),
(29, 29, 1, 0, 1, 0, 0, '2020-10-23 02:59:37', ''),
(30, 30, 1, 0, 1, 0, 0, '2020-10-26 05:55:36', '');

-- --------------------------------------------------------

--
-- Table structure for table `tab_akses_submenu`
--

CREATE TABLE `tab_akses_submenu` (
  `id` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `c` int(11) DEFAULT 0,
  `r` int(11) DEFAULT 0,
  `u` int(11) DEFAULT 0,
  `d` int(11) DEFAULT 0,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entry_user` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tab_akses_submenu`
--

INSERT INTO `tab_akses_submenu` (`id`, `id_sub_menu`, `id_level`, `c`, `r`, `u`, `d`, `entry_date`, `entry_user`) VALUES
(1, 1, 1, 0, 1, 0, 0, '2017-10-14 21:45:40', ''),
(2, 2, 1, 0, 1, 0, 0, '2017-10-17 02:59:02', ''),
(3, 3, 1, 0, 0, 0, 0, '2017-10-19 08:12:32', ''),
(4, 4, 1, 0, 1, 0, 0, '2017-10-17 02:59:16', ''),
(5, 5, 1, 0, 0, 0, 0, '2017-10-19 08:12:33', ''),
(6, 6, 1, 0, 1, 0, 0, '2020-10-22 23:22:05', ''),
(7, 7, 1, 0, 1, 0, 0, '2020-10-22 23:31:15', ''),
(8, 8, 1, 0, 1, 0, 0, '2020-10-22 23:38:30', ''),
(9, 9, 1, 0, 1, 0, 0, '2020-10-22 23:38:30', ''),
(10, 10, 1, 0, 1, 0, 0, '2020-10-22 23:38:30', ''),
(11, 11, 1, 0, 1, 0, 0, '2020-10-22 23:38:30', ''),
(24, 24, 1, 0, 1, 0, 0, '2020-10-28 01:55:06', ''),
(25, 25, 1, 0, 1, 0, 0, '2020-10-28 01:55:18', ''),
(12, 12, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(13, 13, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(14, 14, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(15, 15, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(16, 16, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(17, 17, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(18, 18, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(19, 19, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(20, 20, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(21, 21, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(22, 22, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(23, 23, 1, 0, 1, 0, 0, '2020-10-28 01:57:39', ''),
(33, 33, 1, 0, 1, 0, 0, '2020-10-28 04:58:11', ''),
(34, 34, 1, 0, 1, 0, 0, '2020-10-29 09:31:09', ''),
(35, 35, 1, 0, 1, 0, 0, '2020-10-29 11:02:48', ''),
(26, 26, 1, 0, 1, 0, 0, '2020-11-06 09:46:16', ''),
(27, 27, 1, 0, 1, 0, 0, '2020-11-08 15:29:33', ''),
(36, 36, 1, 0, 1, 0, 0, '2020-11-17 11:18:15', ''),
(37, 37, 1, 0, 1, 0, 0, '2020-11-17 11:22:20', ''),
(28, 28, 1, 0, 1, 0, 0, '2020-11-26 03:32:25', ''),
(29, 29, 1, 0, 0, 0, 0, '2020-11-30 06:48:58', ''),
(38, 38, 1, 0, 1, 0, 0, '2020-12-02 07:45:44', ''),
(39, 39, 1, 0, 1, 0, 0, '2020-12-04 02:34:30', ''),
(40, 40, 1, 0, 1, 0, 0, '2020-12-04 02:39:39', ''),
(41, 41, 1, 0, 1, 0, 0, '2020-12-04 02:39:39', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` varchar(100) NOT NULL,
  `saldo_akun` decimal(15,2) NOT NULL,
  `kategori_akun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_akun`, `nama_akun`, `saldo_akun`, `kategori_akun`) VALUES
(1111, 'Kas', '10000000.00', 1),
(1112, 'Bank Mandiri', '12000000.00', 1),
(1113, 'Bank BTPN Jenius', '0.00', 1),
(2111, 'Modal Usaha', '0.00', 2),
(2112, 'Modal Bahan Pangan', '0.00', 2),
(3111, 'Pendapatan Usaha', '0.00', 3),
(4111, 'Biaya Gaji', '0.00', 4),
(5110, 'Pendapatan Diterima Dimuka', '0.00', 5),
(5111, 'Hutang Dagang', '0.00', 5),
(6111, 'Piutang Usaha', '0.00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_hutang`
--

CREATE TABLE `tbl_data_hutang` (
  `id_hutang` int(11) NOT NULL,
  `id_jurnal_umum` int(11) NOT NULL,
  `id_kontak` int(11) NOT NULL,
  `nilai` decimal(15,2) NOT NULL,
  `sisa` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_pembayaran_hutang`
--

CREATE TABLE `tbl_data_pembayaran_hutang` (
  `id_bayar_hutang` int(11) NOT NULL,
  `id_jurnal_umum` int(11) NOT NULL,
  `id_hutang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_penyetoran_piutang`
--

CREATE TABLE `tbl_data_penyetoran_piutang` (
  `id_penyetoran_piutang` int(11) NOT NULL,
  `id_jurnal_umum` int(11) NOT NULL,
  `id_piutang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_piutang`
--

CREATE TABLE `tbl_data_piutang` (
  `id_piutang` int(11) NOT NULL,
  `id_jurnal_umum` int(11) NOT NULL,
  `id_kontak` int(11) NOT NULL,
  `nilai` decimal(15,2) NOT NULL,
  `sisa` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `icon` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`, `icon`) VALUES
(1, 'Manager', '20e840e279a6dc045738ac4578a00e31.png'),
(4, 'Driver', 'b60dac40d81bf82fffdb202f1fd368c9.png'),
(5, 'Supervisor', '040d3b7d97493e6f40a03b889de5231b.png'),
(6, 'Security', '4068356150cf690687e1306bd4454b41.png'),
(7, 'HRD', 'f56e92bad1e25daf075710abb9b91bf3.png'),
(11, 'Kitchen', '84d0dec98de88a393ca511932d9ead25.png'),
(12, 'Waitress', 'b2c1aa6b80a1b44483be60c5d91fc453.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurnal_umum`
--

CREATE TABLE `tbl_jurnal_umum` (
  `id_jurnal_umum` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `ref` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurnal_umum`
--

INSERT INTO `tbl_jurnal_umum` (`id_jurnal_umum`, `tanggal_transaksi`, `keterangan`, `ref`) VALUES
(3, '2020-11-30', 'Pendapatan Usaha Mikro', ''),
(4, '2020-11-30', 'Saldo Awal Bulan Bank Mandiri', ''),
(5, '2020-12-02', 'Piutang Dari Kelvin', ''),
(6, '2020-12-17', 'Hutang ke Kelvin', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurnal_umum_detail`
--

CREATE TABLE `tbl_jurnal_umum_detail` (
  `id_detail_jurnal` int(11) NOT NULL,
  `id_jurnal_umum` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `debit_kredit` int(11) NOT NULL,
  `nilai` decimal(15,2) NOT NULL,
  `saldo` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurnal_umum_detail`
--

INSERT INTO `tbl_jurnal_umum_detail` (`id_detail_jurnal`, `id_jurnal_umum`, `id_akun`, `debit_kredit`, `nilai`, `saldo`) VALUES
(5, 3, 1111, 1, '5000000.00', '0.00'),
(6, 3, 3111, 2, '5000000.00', '0.00'),
(7, 4, 1112, 1, '7000000.00', '0.00'),
(8, 4, 0, 2, '7000000.00', '0.00'),
(9, 5, 6111, 1, '6500000.00', '0.00'),
(10, 5, 3111, 2, '6500000.00', '0.00'),
(11, 6, 1111, 1, '5000000.00', '0.00'),
(12, 6, 5111, 2, '5000000.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `foto` text NOT NULL,
  `nama_lengkap` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `NPWP` varchar(15) NOT NULL,
  `status_nikah` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_tgl_lahir` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `status_rumah` varchar(25) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `kebangsaan` varchar(50) NOT NULL,
  `suku` varchar(50) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `merokok` varchar(50) NOT NULL,
  `cacat_fisik` varchar(50) NOT NULL,
  `sakit_periodik` varchar(50) NOT NULL,
  `alergi` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `foto`, `nama_lengkap`, `email`, `password`, `NPWP`, `status_nikah`, `jenis_kelamin`, `tempat_tgl_lahir`, `agama`, `alamat`, `status_rumah`, `telephone`, `kebangsaan`, `suku`, `tinggi_badan`, `berat_badan`, `merokok`, `cacat_fisik`, `sakit_periodik`, `alergi`, `id_jabatan`, `status`) VALUES
(22, 'foto_diri.jpg', 'Ardan Satria', 'ardan.satria@gmail.com', 'OlJmDwZH', '-', 'belum menikah', 'laki-laki', 'Jambi, 10 Desember 1994', 'islam', 'Jalan Suparman No. 33', '', '0824791471', 'Indonesia', 'Madura', 180, 62, 'tidak', 'Berkacamata', 'tidak ada', 'tidak ada', 1, 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontak`
--

CREATE TABLE `tbl_kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kontak`
--

INSERT INTO `tbl_kontak` (`id`, `nama`, `telp`, `email`, `perusahaan`, `alamat`) VALUES
(2, 'Kelvin', '0987654321', 'kelvin@gmail.com', 'PT Bumi', 'Jalan Jalan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontak_darurat`
--

CREATE TABLE `tbl_kontak_darurat` (
  `id_kontak_darurat` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `hubungan` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telephone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kontak_darurat`
--

INSERT INTO `tbl_kontak_darurat` (`id_kontak_darurat`, `id_karyawan`, `nama`, `hubungan`, `alamat`, `telephone`) VALUES
(1, 22, 'Erik', 'Saudara Kandung', 'Jalan Suparman No. 33', '083621838');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemohon_pekerjaan`
--

CREATE TABLE `tbl_pemohon_pekerjaan` (
  `id_pemohon` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `jabatan_harapan` varchar(100) NOT NULL,
  `gaji_saat_ini` varchar(15) NOT NULL,
  `perolehan_gaji_dari` varchar(30) NOT NULL,
  `harapan_penghasilan` varchar(30) NOT NULL,
  `tanggal_siap_kerja` date NOT NULL,
  `transportasi` varchar(15) NOT NULL,
  `pernyataan` varchar(50) NOT NULL,
  `tempat_dibuat` varchar(20) NOT NULL,
  `tanggal_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pemohon_pekerjaan`
--

INSERT INTO `tbl_pemohon_pekerjaan` (`id_pemohon`, `id_karyawan`, `jabatan_harapan`, `gaji_saat_ini`, `perolehan_gaji_dari`, `harapan_penghasilan`, `tanggal_siap_kerja`, `transportasi`, `pernyataan`, `tempat_dibuat`, `tanggal_dibuat`) VALUES
(1, 22, 'HRD', '0', '-', '3000000', '2020-10-08', 'Sepeda Motor', '1', 'Malang', '2020-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan`
--

CREATE TABLE `tbl_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `jenjang` varchar(15) NOT NULL,
  `awal_tahun` int(11) NOT NULL,
  `akhir_tahun` int(11) NOT NULL,
  `nama_lembaga` varchar(30) NOT NULL,
  `alamat_lembaga` varchar(100) NOT NULL,
  `status_pendidikan` varchar(10) NOT NULL,
  `prestasi` varchar(15) NOT NULL,
  `foto_pendidikan` varchar(50) NOT NULL,
  `jenis_pendidikan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendidikan`
--

INSERT INTO `tbl_pendidikan` (`id_pendidikan`, `id_karyawan`, `jenjang`, `awal_tahun`, `akhir_tahun`, `nama_lembaga`, `alamat_lembaga`, `status_pendidikan`, `prestasi`, `foto_pendidikan`, `jenis_pendidikan`) VALUES
(16, 22, 'SD', 2006, 2010, 'SDN Paciran 1 Lamongan', 'Lamongan', 'BL', '0', 'd83cc64c05a945f089a475d437ec9d0d.jpg', 'Formal'),
(17, 22, 'PAUD', 2005, 2006, 'PAUD Paciran', 'Lamongan', 'L', '0', '', 'Non Formal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengalaman_organisasi`
--

CREATE TABLE `tbl_pengalaman_organisasi` (
  `id_pengalaman_organisasi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal_awal` year(4) NOT NULL,
  `tanggal_akhir` year(4) NOT NULL,
  `nama_organisasi` varchar(100) NOT NULL,
  `alamat_organisasi` varchar(100) NOT NULL,
  `bidang_organisasi` varchar(20) NOT NULL,
  `posisi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengalaman_organisasi`
--

INSERT INTO `tbl_pengalaman_organisasi` (`id_pengalaman_organisasi`, `id_karyawan`, `tanggal_awal`, `tanggal_akhir`, `nama_organisasi`, `alamat_organisasi`, `bidang_organisasi`, `posisi`) VALUES
(1, 22, 2018, 2020, 'HIMMASI', 'Jl. Veteran', 'Himpunan Mahasiswa', 'Anggota PSDM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penguasaan`
--

CREATE TABLE `tbl_penguasaan` (
  `id_penguasaan_bahasa` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `bahasa_asing` varchar(15) NOT NULL,
  `lisan` varchar(15) NOT NULL,
  `tulis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penguasaan_komputer`
--

CREATE TABLE `tbl_penguasaan_komputer` (
  `id_penguasaan_komputer` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama_aplikasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `id_partner` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_pokok` decimal(15,2) NOT NULL,
  `harga_jual_member` decimal(15,2) NOT NULL,
  `harga_publish` decimal(15,2) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_partner`, `nama_produk`, `harga_pokok`, `harga_jual_member`, `harga_publish`, `deskripsi`, `foto`) VALUES
(3, 8, 'Ayam Geprek Sambal Matah', '10000.00', '11500.00', '13000.00', '<p>Ayam geprek dengan cita rasa ala medan bosssss</p>', 'f2d6aec3bb84efe92d9d3db930ee4fa5.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referensi_pekerjaan`
--

CREATE TABLE `tbl_referensi_pekerjaan` (
  `id_referensi` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `alamat_pekerjaan` varchar(25) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `hubungan` varchar(25) NOT NULL,
  `prestasi` varchar(25) NOT NULL,
  `foto_referensi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat_kesehatan`
--

CREATE TABLE `tbl_riwayat_kesehatan` (
  `id_riwayat_kesehatan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `lama_sakit` int(11) NOT NULL,
  `nama_penyakit` varchar(20) NOT NULL,
  `cara_perawatan` varchar(100) NOT NULL,
  `hasil_perawatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat_kesehatan`
--

INSERT INTO `tbl_riwayat_kesehatan` (`id_riwayat_kesehatan`, `id_karyawan`, `tahun`, `lama_sakit`, `nama_penyakit`, `cara_perawatan`, `hasil_perawatan`) VALUES
(28, 22, 2009, 1, 'Tifus', 'Istirahat', 'Sembuh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat_pekerjaan`
--

CREATE TABLE `tbl_riwayat_pekerjaan` (
  `id_riwayat_pekerjaan` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `awal_tahun` year(4) NOT NULL,
  `akhir_tahun` year(4) NOT NULL,
  `nama_instansi` varchar(200) NOT NULL,
  `alamat_instansi` varchar(100) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `tugas_pekerjaan` varchar(50) NOT NULL,
  `alasan_berhenti` varchar(50) NOT NULL,
  `total_penghasilan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat_pekerjaan`
--

INSERT INTO `tbl_riwayat_pekerjaan` (`id_riwayat_pekerjaan`, `id_karyawan`, `awal_tahun`, `akhir_tahun`, `nama_instansi`, `alamat_instansi`, `jabatan`, `tugas_pekerjaan`, `alasan_berhenti`, `total_penghasilan`) VALUES
(1, 22, 2020, 2020, 'Elecomp Software House', 'Jl. Galunggung', 'Internship', 'Programming', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sop`
--

CREATE TABLE `tbl_sop` (
  `id_sop` int(11) NOT NULL,
  `bagian_sop` varchar(50) NOT NULL,
  `deskripsi_sop` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` text NOT NULL,
  `no_anggota` text NOT NULL,
  `anggota_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `nama_anggota`, `no_anggota`, `anggota_id`) VALUES
(2, 'Nurul Maulida', 'HMP02', 6),
(3, 'Hamzanul Ilhami', 'KRM01', 2),
(5, 'Luis Devvi Ratna', 'KRM03', 2),
(7, 'Putri Sholihah Ulfa', 'KRM02', 2),
(4, 'Laila Majnun', 'HMP03', 6),
(6, 'Ulil Aulia', 'MLC01', 8),
(1, 'Lila Andana Putri', 'KRM04', 2),
(8, 'Fajar Ali ', 'MLC02', 8),
(9, 'Yurike Wardani', 'KRM05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `judul_artikel` text NOT NULL,
  `deskripsi_artikel` text NOT NULL,
  `tanggal_artikel` date NOT NULL,
  `artikel_dilihat` int(11) NOT NULL,
  `foto_artikel` text NOT NULL,
  `status_artikel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `id_member`, `judul_artikel`, `deskripsi_artikel`, `tanggal_artikel`, `artikel_dilihat`, `foto_artikel`, `status_artikel`) VALUES
(1, 20, 'Cara Membuat Akun Instagram Menggunakan Android', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>', '2020-07-09', 102, 'artikel1.jpg', 0),
(10, 7, 'Cara Membuat Home Page di Facebook Melalui Android', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>\r\n', '2020-07-16', 74, 'artikel2.jpg', 1),
(12, 1, 'Penerapan Digital Marketing Menggunakan Social Media', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>\r\n', '2020-07-15', 28, 'artikel3.jpg', 1),
(17, 2, 'Perusahaan Besar Ini Sedang Meroket Saat Ini', '<p>Benar Sekali</p>\r\n', '2020-12-07', 0, '08a8fdee635fc7c0caf86b1818fdac26.png', 0),
(19, 3, 'Big Data Around The Worlds', '<p>Coba</p>\r\n', '2020-12-07', 0, '73a8edf9c0d44a526fc5f069b2c0f233.PNG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `id_event` int(11) NOT NULL,
  `judul_event` text NOT NULL,
  `poster_event` text NOT NULL,
  `deskripsi_event` text NOT NULL,
  `tanggal_event` date NOT NULL,
  `jam_event` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`id_event`, `judul_event`, `poster_event`, `deskripsi_event`, `tanggal_event`, `jam_event`) VALUES
(1, 'Festival Pesta Buah Lokal', 'event1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', '2020-09-14', '07:30'),
(2, 'Konser Amal Sukarela', 'event2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', '2020-09-15', '15:00'),
(3, 'Lomba Membaca Puisi', 'event3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', '2020-09-16', '07:00'),
(5, 'WEBINAR', 'dd7b5fe57df11e2030a5f4b739157016.png', '<p>Makanan enak</p>', '2020-09-19', '15:06'),
(6, 'Seminar Nasional', 'b76a262dfb7bd928cba4f6ae48d8630d.png', '<p>Seminar Ilmiah</p>', '2020-09-18', '16:00'),
(7, 'Foto Bersama', '3e147874b39a47bb34f45ca7fddbc97e.jpg', '<p>Makrab</p>', '2020-09-21', '10:00'),
(8, 'Jual Bareng Mitra', 'd83cc64c05a945f089a475d437ec9d0d.jpg', '<p>Jualan</p>', '2020-09-22', '11:00'),
(10, 'Be a Content Creator Fernandes', 'a41569a80248d765a37de6ea3fba5baf.jpg', '<p>Be a Content Creator Fernandes</p>', '2020-09-25', '09:00'),
(11, 'Seminar Nasional', '2e6e809216ccd5622a1a1d5e8cf78fe9.jpg', '<p>Seminar</p>', '2020-09-26', '09:00'),
(12, 'Sharing Digital Marketing ', '05839d7833aca71542ec18447c01d576.jpg', '<p>Sharing Digital Marketing&nbsp;</p>', '2020-09-25', '07:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id_galeri` int(11) NOT NULL,
  `foto_galeri` text NOT NULL,
  `deskripsi_foto` text NOT NULL,
  `tanggal_foto` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_galeri`, `foto_galeri`, `deskripsi_foto`, `tanggal_foto`) VALUES
(1, 'galeri_1.jpg', '<p>Kegiatan malam</p>', '2020-07-06'),
(2, 'galeri_2.jpg', '<p>Kegiatan lokakarya bersama</p>', '2020-07-07'),
(3, 'galeri_3.jpg', '<p>Minum Kopi Bersama&nbsp;</p>', '2020-07-08'),
(11, 'e3fc0eb3d77ac7a0219e2f7a666e75ea.png', '<p>Foto Bersama Kelurga ROG</p>', '2020-09-09'),
(15, '9a48bba9016ed2e79d279036c57c9d60.jpg', '<p>Event Kolaborasi UKM</p>', '2020-09-10'),
(16, '224c4806ab771833070390fea5247282.png', '<p>Event Jualan Bareng</p>', '2020-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_partner`
--

CREATE TABLE `tb_jenis_partner` (
  `id_jenis_partner` int(11) NOT NULL,
  `nama_jenis_partner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_partner`
--

INSERT INTO `tb_jenis_partner` (`id_jenis_partner`, `nama_jenis_partner`) VALUES
(1, 'Kuliner'),
(2, 'IT'),
(3, 'Legal'),
(4, 'Clothes'),
(5, 'Automotive');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori_member`
--

CREATE TABLE `tb_kategori_member` (
  `id_kategori` int(11) NOT NULL,
  `kategori_member` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori_member`
--

INSERT INTO `tb_kategori_member` (`id_kategori`, `kategori_member`) VALUES
(1, 'Personal'),
(2, 'Komunitas'),
(3, 'Instansi/Perusahaan'),
(4, 'Lembaga Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel` int(11) NOT NULL,
  `nama_komentar` text NOT NULL,
  `email_komentar` text NOT NULL,
  `no_tlp` text NOT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deskripsi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`id_komentar`, `id_artikel`, `nama_komentar`, `email_komentar`, `no_tlp`, `tanggal_komentar`, `deskripsi_komentar`) VALUES
(4, 12, 'Fitriana', 'fitri@gmail.com', '098', '2020-07-10 12:00:34', '<p>Good</p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -193px; top: 21px;\">&nbsp;</div>'),
(5, 10, 'Ummi Athiyah', 'ummi@gmail.com', '123456789', '2020-07-10 12:01:17', '<p>Good</p>'),
(6, 1, 'Laila Andini', 'laila@gmail.com', '123456', '2020-07-11 03:33:51', '<p>Bagus Sangat Membantu</p>'),
(7, 1, 'Muhammad Aliando', 'ali@gmail.com', '123456', '2020-07-11 03:34:25', '<p>Sangat Membantu</p>'),
(8, 1, 'Fitriana', 'ummi@gmail.com', '123456', '2020-07-11 03:34:56', '<p>Cottah</p>'),
(9, 10, 'Ummi Athiyah', 'ali@gmail.com', '098', '2020-07-11 03:35:21', '<p>Baguusssss</p>'),
(10, 12, 'Ummi Athiyah', 'ummi@gmail.com', '123456', '2020-07-11 03:35:43', '<p>Bagussssss</p>'),
(11, 12, 'Fitriana', 'laila@gmail.com', '123456', '2020-07-11 03:36:14', '<p>Cantik Banget</p>'),
(12, 1, 'Laila Andini', 'laila@gmail.com', '123456', '2020-12-03 03:26:03', '<p>Sangat Bagus</p>'),
(13, 12, 'Muhammad Aliando', 'ali@gmail.com', '123456', '2020-07-14 01:20:13', 'good article'),
(16, 1, 'Lila Andana', 'lila@gmail.com', '098765432', '2020-07-16 05:04:33', 'Sangat bagus membantu sekali '),
(18, 10, 'Ummi Athiyah', 'ummi@gmail.com', '123456', '2020-07-16 05:10:29', 'job'),
(22, 10, 'Laila Andini', 'ummi@gmail.com', '123456', '2020-07-17 04:15:59', 'Bagus Sekali');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `username` text NOT NULL,
  `nama_member` text NOT NULL,
  `password` text NOT NULL,
  `view_password` text NOT NULL,
  `profesi_member` text NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `no_anggota` text NOT NULL,
  `foto_kta` text NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `username`, `nama_member`, `password`, `view_password`, `profesi_member`, `anggota_id`, `no_anggota`, `foto_kta`, `id_kategori`) VALUES
(1, 'lila', 'Lila Andana Putri', 'ef34461dd10ecb394bde3f86707401aa', 'lila123', 'Profesor Teknik Informatika Universitas Negeri Malang', 2, 'KRM04', '', 1),
(2, 'kormal', 'Komunitas Rekayasa Perangkat Lunak Malang', 'e153a3e9592c039cf7607a4197ad6373', 'kormal123', 'Pimpinan Redaksi Radar Malang', 0, '', '', 2),
(3, 'bigdata', 'PT. Big Data  Comunity', '964cad331de7f911a40ba099dfda2af4', 'bigdat123', 'Eksekutif Produksi Coklat Klasik', 0, '', '6b316db43851c84718cd9ef85fc07688.png', 3),
(4, 'fajar', 'Fajar Ali ', '7bedc9fd30769590c992b8f7f23738f7', 'fajar123', 'Doktor Jaringan Universitas Brawijaya', 8, 'MLC02', '', 1),
(5, 'diknas', 'Dinas Pendidikan Kota Malang', '2a0c22d3d3f2a236d4c79a37333771d0', 'miftah123', 'Manajemen Pemasaran Mie Setan', 0, '', '', 4),
(6, 'himpi', 'Himpunan Pengusaha Muda Indonesia', 'e98834edca16e0583b8295a7704a6078', 'himpi123', 'Pimpinan Badan Pengamatan Distributor AQUA', 0, '', '', 2),
(7, 'yurike', 'Yurike Wardani', 'fee5520c93b4b948f40fc72837da6749', 'yurike123', 'Magister Teknik Komputer Piloteknik Negeri Malang', 2, 'KRM05', '', 1),
(8, 'maliciku', 'Malang Komunitas Cinta Kura - Kura', '13161c696e4fe729e9d901d1004c59e1', 'maliciku123', 'Pimpinan Editor JTV Malang', 0, '', '', 2),
(17, 'um_malang', 'Universitas Negeri Malang', 'b0a55ab6acef8b2359d6efb036a68a5b', 'ummalang123', '', 0, '', '', 4),
(18, 'uin_malang', 'Universitas Islam Maulana Malik Ibrahim Malang', '99a678e108efe1222865bcf24c164f0b', 'uinmalang123', '', 0, '', '', 4),
(19, 'elecomp_sh', 'Elecomp Software House', 'bf5ecf4c6fcd9d8ac138c0aa1dcd7f8e', 'elecompsh123', '', 0, '', '', 3),
(20, 'kelvin101', 'kelvin', 'dc0026f5522b59bff313ecf34181ddc7', 'kelvin123', 'Marketing', 0, '123123', 'd05b69b50a836ac04291021b480ef455.jpg', 1),
(23, 'kayama', 'Kharisma', '548d214d4e12221db08e917da1b32042', 'big123456', '', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_partner`
--

CREATE TABLE `tb_partner` (
  `id_partner` int(11) NOT NULL,
  `jenis_partner` int(11) NOT NULL,
  `nama_partner` text NOT NULL,
  `deskripsi_partner` text NOT NULL,
  `logo_partner` text NOT NULL,
  `website_partner` text NOT NULL,
  `email_partner` text NOT NULL,
  `kontak_partner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_partner`
--

INSERT INTO `tb_partner` (`id_partner`, `jenis_partner`, `nama_partner`, `deskripsi_partner`, `logo_partner`, `website_partner`, `email_partner`, `kontak_partner`) VALUES
(8, 1, 'Ayam Geprek Suka-Suka ', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>', 'team-1.jpg', 'www.ayamgepreksukasuka.com', 'ayamgepreksukasuka@gmail.com', '123456789'),
(9, 1, 'Boba Thai Tea', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'team-2.jpg', 'www.bobathaitea.com', 'bobathaitea@gmail.com', '123456789'),
(10, 1, 'Mie Skin Bledek ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'team-3.jpg', 'www.mieskinbledek.com', 'mieskinbledek@gmail.com', '123456789'),
(11, 2, 'Elecomp Software House', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'team-4.jpg', 'www.elecompsoftwarehouse.com', 'elecompsoftwarehouse@gmail.com', '123456789'),
(12, 2, 'Jukieta Studio', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'team-1.jpg', 'www.jukietastudio.com', 'jukietastudio@gmail.com', '123456789'),
(13, 3, 'Friday Konveksi ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'team-2.jpg', 'www.fridaykonveksi.com', 'fridaykonveksi@gmail.com', '123456789'),
(14, 3, 'Pandawa Printing', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'team-3.jpg', 'www.pandawaprinting.com', 'pandawaprinting@gmail.com', '123456789'),
(15, 1, 'Nana Thai Prek', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'team-4.jpg', 'www.nanathaiprek.com', 'nanathaiprek@gmail.com', '123456789'),
(16, 2, 'Reparasi Segala Elektronik', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', 'team-2.jpg', 'www.reparasisegalaelektronik.com', 'reparasisegalaelektronik@gmail.com', '123456789'),
(18, 1, 'Cwie Mie Bledek', '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacus quam, rhoncus id pharetra nec, viverra dignissim metus. Etiam at pellentesque lorem, ac placerat tortor. Cras blandit, tortor vitae laoreet vehicula, nisi urna aliquet eros, feugiat hendrerit felis libero a dolor. Nunc sagittis lacus et velit fringilla lobortis. Curabitur id elit in elit maximus elementum non non orci. Curabitur felis arcu, porta quis libero id, pharetra convallis lectus. Vivamus ultricies non metus in egestas</span></p>', '56f07ed95cd34a546ceee59acdd30901.png', 'CwieMie.co.id', 'cwiemiemlg@yahoo.com', '086426142141');

-- --------------------------------------------------------

--
-- Table structure for table `tb_promo`
--

CREATE TABLE `tb_promo` (
  `id_promo` int(11) NOT NULL,
  `judul_promo` text NOT NULL,
  `poster_promo` text NOT NULL,
  `deskripsi_promo` text NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_promo`
--

INSERT INTO `tb_promo` (`id_promo`, `judul_promo`, `poster_promo`, `deskripsi_promo`, `tanggal_mulai`, `tanggal_akhir`) VALUES
(1, 'Dimana ada sale pasti ada diskon ', 'promo-1.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>', '2020-09-21', '2020-09-22'),
(2, 'Cuci Gudang Diskon hingga 90%', 'promo-2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', '2020-07-07', '2020-07-11'),
(3, 'Gebyar Promo Ramadhan Mulai 0% - 70%', 'promo-3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.', '2020-07-10', '2020-07-17'),
(4, 'Harbolnas Sale', '1e983a63524dd41b0f682d55f4f56e98.png', '<p>Nonton Kejuaraan Bola dengan Harga uper murah</p>', '2020-09-04', '2020-09-19'),
(5, 'Murah Meriah POOL', '6628a5adf9b6250b39b26bf8b1d14a0a.png', '<p>Di judul udah keliatan kan, baca dong</p>', '2020-09-10', '2020-09-17'),
(10, 'Sale Up to 80%', 'cf2a0cc36b90f455a8a3ca8291d17421.jpg', '<p>Beli banyak gratis banyak</p>', '2020-09-25', '2020-09-29'),
(11, 'Harbolnas 9.9', 'c9fd6317596ce1fc2494d55fc3a3ef57.jpg', '<p>Lorem Ipsum</p>', '2020-09-17', '2020-09-20'),
(12, 'Promo Akhir Bulan', 'e766d6924a2bde3dd67b63327282d843.jpg', '<p>Promo akhir bulan bisa di datang ke Locus.id</p>', '2020-09-24', '2020-09-25'),
(13, 'Super Promo Flashsale', '243407adef16d7bfcfbec626e2219c78.jpg', '<p>Flash Sale akhir bulan</p>', '2020-09-25', '2020-09-29'),
(14, 'Promo buy 1 get 2', '9a51c99c5c625bba989149c99f19d99d.jpg', '<p>Beli 1 gratis 1</p>', '2020-09-25', '2020-09-28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_slider`
--

CREATE TABLE `tb_slider` (
  `id_slider` int(11) NOT NULL,
  `foto_slider` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_slider`
--

INSERT INTO `tb_slider` (`id_slider`, `foto_slider`) VALUES
(3, 'ea38b6d8de48e72d3484de0cd0417011.jpeg'),
(4, '7343bdd0917cfdb650e8628603e261da.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_survey`
--

CREATE TABLE `tb_survey` (
  `id_survey` int(11) NOT NULL,
  `nama` text NOT NULL,
  `no_tlp` text NOT NULL,
  `email` text NOT NULL,
  `deskripsi_survey` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_survey`
--

INSERT INTO `tb_survey` (`id_survey`, `nama`, `no_tlp`, `email`, `deskripsi_survey`) VALUES
(4, 'Lila Andana Fitri ', '123456789', 'zonqiliaf7899@gmail.com', '<p>Tampilan yang disajikan sangat baik dan nyaman di mata</p>'),
(5, 'Lila Andana Fitri ', '098765432', 'lilaaf7899@gmail.com', '<p>Good</p>'),
(6, 'Kharisma', 'lor', 'kharismaarya21@gmail.com', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tentang`
--

CREATE TABLE `tb_tentang` (
  `id_tentang` int(11) NOT NULL,
  `foto_tentang` text NOT NULL,
  `nama_depan` varchar(128) NOT NULL,
  `nama_belakang` varchar(128) NOT NULL,
  `deskripsi_tentang` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tentang`
--

INSERT INTO `tb_tentang` (`id_tentang`, `foto_tentang`, `nama_depan`, `nama_belakang`, `deskripsi_tentang`, `visi`, `misi`) VALUES
(1, 'foto_profil.jpg', 'Locus', 'Id Connection Lounge', 'Kami merupakan perusahaan yang menyediakan berbagai fasilitas mulai dari bisnis konsultan um-km dan dalam bidang it serta digital marketing.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tm_mahasiswa`
--

CREATE TABLE `tm_mahasiswa` (
  `fn_idmhs` int(11) NOT NULL,
  `fn_idpribadi` int(11) NOT NULL,
  `fv_namakampus` varchar(255) NOT NULL,
  `fv_jurusan` varchar(255) NOT NULL,
  `d_tahun_masuk` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_mahasiswa`
--

INSERT INTO `tm_mahasiswa` (`fn_idmhs`, `fn_idpribadi`, `fv_namakampus`, `fv_jurusan`, `d_tahun_masuk`) VALUES
(1, 1, 'Pendidikan Vokasi', 'Sistem Informasi', 2018);

-- --------------------------------------------------------

--
-- Table structure for table `tm_pekerjaan`
--

CREATE TABLE `tm_pekerjaan` (
  `fn_idpekerjaan` int(11) NOT NULL,
  `fn_idpribadi` int(11) NOT NULL,
  `fv_nama` varchar(255) NOT NULL,
  `fv_alamat` varchar(255) NOT NULL,
  `fv_notelp` varchar(255) NOT NULL,
  `fv_bidang_usaha` varchar(255) NOT NULL,
  `fv_web` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tm_pribadi`
--

CREATE TABLE `tm_pribadi` (
  `fn_idpribadi` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `fv_nama` varchar(255) NOT NULL,
  `fv_alamat` varchar(255) NOT NULL,
  `fv_noktp` varchar(255) NOT NULL,
  `fv_email` varchar(255) NOT NULL,
  `fv_nohp` varchar(50) NOT NULL,
  `f_fcktp` varchar(255) NOT NULL,
  `fv_gender` varchar(10) NOT NULL,
  `fv_organisasi` varchar(255) NOT NULL,
  `fv_keahlian` varchar(255) NOT NULL,
  `fd_tgl_lahir` date NOT NULL,
  `fv_status` varchar(10) NOT NULL,
  `fc_status_aktif` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_pribadi`
--

INSERT INTO `tm_pribadi` (`fn_idpribadi`, `id_member`, `fv_nama`, `fv_alamat`, `fv_noktp`, `fv_email`, `fv_nohp`, `f_fcktp`, `fv_gender`, `fv_organisasi`, `fv_keahlian`, `fd_tgl_lahir`, `fv_status`, `fc_status_aktif`) VALUES
(1, 23, 'Kharisma', 'Surabay', '135672999', 'kharismaarya21@gmail.com', '087654321', 'Annotation 2020-06-15 115502.png', 'pria', 'Tidak Ada', 'Programming', '1999-10-03', 'mahasiswa', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tm_riwayat_pendidikan`
--

CREATE TABLE `tm_riwayat_pendidikan` (
  `fn_idriwayat` int(11) NOT NULL,
  `fn_idpribadi` int(11) NOT NULL,
  `fv_nama` varchar(255) NOT NULL,
  `d_tahun` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tm_riwayat_pendidikan`
--

INSERT INTO `tm_riwayat_pendidikan` (`fn_idriwayat`, `fn_idpribadi`, `fv_nama`, `d_tahun`) VALUES
(1, 1, 'SMA 21 SURABAYA', 2015),
(2, 1, 'UNIVERSITAS BRAWIJAYA', 2018);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `mainmenu`
--
ALTER TABLE `mainmenu`
  ADD PRIMARY KEY (`seq`);

--
-- Indexes for table `setting_ukuran`
--
ALTER TABLE `setting_ukuran`
  ADD PRIMARY KEY (`id_setting_ukuran`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `tab_akses_mainmenu`
--
ALTER TABLE `tab_akses_mainmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tab_akses_submenu`
--
ALTER TABLE `tab_akses_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `tbl_data_hutang`
--
ALTER TABLE `tbl_data_hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indexes for table `tbl_data_pembayaran_hutang`
--
ALTER TABLE `tbl_data_pembayaran_hutang`
  ADD PRIMARY KEY (`id_bayar_hutang`);

--
-- Indexes for table `tbl_data_penyetoran_piutang`
--
ALTER TABLE `tbl_data_penyetoran_piutang`
  ADD PRIMARY KEY (`id_penyetoran_piutang`);

--
-- Indexes for table `tbl_data_piutang`
--
ALTER TABLE `tbl_data_piutang`
  ADD PRIMARY KEY (`id_piutang`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_jurnal_umum`
--
ALTER TABLE `tbl_jurnal_umum`
  ADD PRIMARY KEY (`id_jurnal_umum`);

--
-- Indexes for table `tbl_jurnal_umum_detail`
--
ALTER TABLE `tbl_jurnal_umum_detail`
  ADD PRIMARY KEY (`id_detail_jurnal`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kontak_darurat`
--
ALTER TABLE `tbl_kontak_darurat`
  ADD PRIMARY KEY (`id_kontak_darurat`);

--
-- Indexes for table `tbl_pemohon_pekerjaan`
--
ALTER TABLE `tbl_pemohon_pekerjaan`
  ADD PRIMARY KEY (`id_pemohon`);

--
-- Indexes for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tbl_pengalaman_organisasi`
--
ALTER TABLE `tbl_pengalaman_organisasi`
  ADD PRIMARY KEY (`id_pengalaman_organisasi`);

--
-- Indexes for table `tbl_penguasaan`
--
ALTER TABLE `tbl_penguasaan`
  ADD PRIMARY KEY (`id_penguasaan_bahasa`);

--
-- Indexes for table `tbl_penguasaan_komputer`
--
ALTER TABLE `tbl_penguasaan_komputer`
  ADD PRIMARY KEY (`id_penguasaan_komputer`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tbl_referensi_pekerjaan`
--
ALTER TABLE `tbl_referensi_pekerjaan`
  ADD PRIMARY KEY (`id_referensi`);

--
-- Indexes for table `tbl_riwayat_kesehatan`
--
ALTER TABLE `tbl_riwayat_kesehatan`
  ADD PRIMARY KEY (`id_riwayat_kesehatan`);

--
-- Indexes for table `tbl_riwayat_pekerjaan`
--
ALTER TABLE `tbl_riwayat_pekerjaan`
  ADD PRIMARY KEY (`id_riwayat_pekerjaan`);

--
-- Indexes for table `tbl_sop`
--
ALTER TABLE `tbl_sop`
  ADD PRIMARY KEY (`id_sop`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `tb_jenis_partner`
--
ALTER TABLE `tb_jenis_partner`
  ADD PRIMARY KEY (`id_jenis_partner`);

--
-- Indexes for table `tb_kategori_member`
--
ALTER TABLE `tb_kategori_member`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_partner`
--
ALTER TABLE `tb_partner`
  ADD PRIMARY KEY (`id_partner`);

--
-- Indexes for table `tb_promo`
--
ALTER TABLE `tb_promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indexes for table `tb_slider`
--
ALTER TABLE `tb_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tb_survey`
--
ALTER TABLE `tb_survey`
  ADD PRIMARY KEY (`id_survey`);

--
-- Indexes for table `tb_tentang`
--
ALTER TABLE `tb_tentang`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `tm_mahasiswa`
--
ALTER TABLE `tm_mahasiswa`
  ADD PRIMARY KEY (`fn_idmhs`);

--
-- Indexes for table `tm_pekerjaan`
--
ALTER TABLE `tm_pekerjaan`
  ADD PRIMARY KEY (`fn_idpekerjaan`);

--
-- Indexes for table `tm_pribadi`
--
ALTER TABLE `tm_pribadi`
  ADD PRIMARY KEY (`fn_idpribadi`);

--
-- Indexes for table `tm_riwayat_pendidikan`
--
ALTER TABLE `tm_riwayat_pendidikan`
  ADD PRIMARY KEY (`fn_idriwayat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6112;

--
-- AUTO_INCREMENT for table `tbl_data_hutang`
--
ALTER TABLE `tbl_data_hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_data_pembayaran_hutang`
--
ALTER TABLE `tbl_data_pembayaran_hutang`
  MODIFY `id_bayar_hutang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_data_penyetoran_piutang`
--
ALTER TABLE `tbl_data_penyetoran_piutang`
  MODIFY `id_penyetoran_piutang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_data_piutang`
--
ALTER TABLE `tbl_data_piutang`
  MODIFY `id_piutang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_jurnal_umum`
--
ALTER TABLE `tbl_jurnal_umum`
  MODIFY `id_jurnal_umum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_jurnal_umum_detail`
--
ALTER TABLE `tbl_jurnal_umum_detail`
  MODIFY `id_detail_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kontak_darurat`
--
ALTER TABLE `tbl_kontak_darurat`
  MODIFY `id_kontak_darurat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pemohon_pekerjaan`
--
ALTER TABLE `tbl_pemohon_pekerjaan`
  MODIFY `id_pemohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pendidikan`
--
ALTER TABLE `tbl_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_pengalaman_organisasi`
--
ALTER TABLE `tbl_pengalaman_organisasi`
  MODIFY `id_pengalaman_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_penguasaan`
--
ALTER TABLE `tbl_penguasaan`
  MODIFY `id_penguasaan_bahasa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_penguasaan_komputer`
--
ALTER TABLE `tbl_penguasaan_komputer`
  MODIFY `id_penguasaan_komputer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_referensi_pekerjaan`
--
ALTER TABLE `tbl_referensi_pekerjaan`
  MODIFY `id_referensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_riwayat_kesehatan`
--
ALTER TABLE `tbl_riwayat_kesehatan`
  MODIFY `id_riwayat_kesehatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_riwayat_pekerjaan`
--
ALTER TABLE `tbl_riwayat_pekerjaan`
  MODIFY `id_riwayat_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sop`
--
ALTER TABLE `tbl_sop`
  MODIFY `id_sop` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_jenis_partner`
--
ALTER TABLE `tb_jenis_partner`
  MODIFY `id_jenis_partner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kategori_member`
--
ALTER TABLE `tb_kategori_member`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_partner`
--
ALTER TABLE `tb_partner`
  MODIFY `id_partner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_promo`
--
ALTER TABLE `tb_promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_slider`
--
ALTER TABLE `tb_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_survey`
--
ALTER TABLE `tb_survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_tentang`
--
ALTER TABLE `tb_tentang`
  MODIFY `id_tentang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tm_mahasiswa`
--
ALTER TABLE `tm_mahasiswa`
  MODIFY `fn_idmhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tm_pekerjaan`
--
ALTER TABLE `tm_pekerjaan`
  MODIFY `fn_idpekerjaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_pribadi`
--
ALTER TABLE `tm_pribadi`
  MODIFY `fn_idpribadi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tm_riwayat_pendidikan`
--
ALTER TABLE `tm_riwayat_pendidikan`
  MODIFY `fn_idriwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
