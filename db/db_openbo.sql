-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 11:01 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_openbo`
--
CREATE DATABASE IF NOT EXISTS `db_openbo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_openbo`;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id_jawaban` int(11) NOT NULL AUTO_INCREMENT,
  `id_pertanyaan` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `status` enum('pilih','tidak') NOT NULL,
  `isi_jawaban` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jawaban`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_pertanyaan`, `id_pengguna`, `status`, `isi_jawaban`, `waktu`) VALUES
(4, 11, 7, 'tidak', 'Menurut saya tidak ada yang salah', '2020-11-06 02:51:37'),
(5, 8, 1, 'pilih', 'lah mana saya tau saya kan ikan', '2020-11-06 05:16:25'),
(6, 14, 8, 'tidak', 'caranya adalah :\r\n\r\nLuas = 1/2 x Alas x Tinggi', '2020-11-06 02:51:37'),
(8, 15, 11, 'pilih', 'Saya tidak tau kak', '2020-11-06 10:34:27'),
(9, 15, 11, 'tidak', 'Saya belum tau kak', '2020-11-05 22:33:59'),
(10, 16, 11, 'tidak', 'Sistem reproduksi adalah sistem untuk menggandakan individu menggunakan organ reproduksi', '2020-11-06 03:16:58'),
(11, 14, 12, 'pilih', 'Caranya adalah menggunakan rumus luas segitiga, yaitu : luas = 1/2*alas*tinggi', '2020-11-06 16:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Matematika'),
(2, 'Ilmu Komputer'),
(3, 'Ilmu Pengetahuan Alam'),
(6, 'Ilmu Pengetahuan Sosial'),
(7, 'Ilmu Hukum');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kata_sandi` varchar(50) NOT NULL,
  `peran` enum('pengguna','admin') NOT NULL,
  `jenjang_pendidikan` enum('sd','smp','sma','kuliah','lainnya') NOT NULL,
  `fotoprofil` text NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `nama_pengguna`, `email`, `kata_sandi`, `peran`, `jenjang_pendidikan`, `fotoprofil`) VALUES
(1, 'user1', 'user1', 'user@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'pengguna', 'kuliah', 'default.png'),
(2, 'user2', 'user2', 'user2@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'pengguna', 'sd', 'default.png'),
(3, 'user3', 'user3', 'user3@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'pengguna', 'sma', 'default.png'),
(7, 'Abdurrafi Yahya', 'rapyhy', 'rafiyahya@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'pengguna', 'kuliah', 'rapyhy-1604652909.jpg'),
(8, 'Reonaldi Patalangi', 'reo', 'reo@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'pengguna', 'kuliah', 'default.png'),
(10, 'Hermawan Paramata', 'admin', 'admin@admin.com', 'e00cf25ad42683b3df678c61f42c6bda', 'admin', 'lainnya', 'default.png'),
(11, 'Indah Putri Anjayani', 'indah', 'admin@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'pengguna', 'kuliah', 'indah-1604659207.jpg'),
(12, 'Muhammad Al-Fariz', 'm.fariz', 'fariz@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda', 'pengguna', 'kuliah', 'm.fariz-1604679156.jpg'),
(13, 'Guntur Mentemas', 'guntur00', 'guntur@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'pengguna', 'kuliah', 'guntur00-1604821821.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `status` enum('belum','terjawab') NOT NULL,
  `isi_pertanyaan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pertanyaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_pengguna`, `id_kategori`, `status`, `isi_pertanyaan`, `waktu`) VALUES
(8, 7, 2, 'terjawab', 'bang mau tanya kalo query untuk CRUD itu bagaimana, soalnya saya dari tadi nyari ga pernah ketemu bang', '2020-11-06 05:16:25'),
(14, 7, 1, 'terjawab', 'Bagimana cara menghitung luas segitiga?', '2020-11-06 16:14:52'),
(15, 7, 7, 'terjawab', 'Apa pengertian ilmu hukum menurut para ahli', '2020-11-06 10:34:28'),
(16, 7, 3, 'belum', 'Mohon jelaskan tentang sistem reproduksi', '2020-11-06 03:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_jumlah_buka`
--

CREATE TABLE IF NOT EXISTS `rekam_jumlah_buka` (
  `id_rekam` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  PRIMARY KEY (`id_rekam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE IF NOT EXISTS `rekomendasi` (
  `id_rekomendasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  PRIMARY KEY (`id_rekomendasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `suka`
--

CREATE TABLE IF NOT EXISTS `suka` (
  `id_suka` int(11) NOT NULL AUTO_INCREMENT,
  `id_pertanyaan` int(11) NOT NULL,
  `id_jawaban` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  PRIMARY KEY (`id_suka`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `suka`
--

INSERT INTO `suka` (`id_suka`, `id_pertanyaan`, `id_jawaban`, `id_pengguna`) VALUES
(8, 7, 2, 8),
(16, 7, 2, 1),
(22, 8, 5, 2),
(25, 7, 2, 2),
(26, 15, 8, 11),
(27, 8, 5, 13),
(28, 14, 11, 13);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
