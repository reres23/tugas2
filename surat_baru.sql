-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2016 at 04:11 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda_kegiatan`
--

CREATE TABLE IF NOT EXISTS `agenda_kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_kegiatan` date NOT NULL,
  `kegiatan` text NOT NULL,
  `tempat_kegiatan` varchar(100) NOT NULL,
  `id_pegawai` bigint(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_kegiatan`),
  KEY `id_pegawai` (`id_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `agenda_kegiatan`
--

INSERT INTO `agenda_kegiatan` (`id_kegiatan`, `tanggal_kegiatan`, `kegiatan`, `tempat_kegiatan`, `id_pegawai`, `keterangan`) VALUES
(1, '2016-04-01', 'upacara', 'plasa senayan', 101, 'haiii kamu!!');

-- --------------------------------------------------------

--
-- Table structure for table `detail_disposisi`
--

CREATE TABLE IF NOT EXISTS `detail_disposisi` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `no_jabatan` int(11) NOT NULL,
  `agenda_disposisi` int(11) NOT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `no_jabatan` (`no_jabatan`),
  KEY `agenda_disposisi` (`agenda_disposisi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `detail_disposisi`
--

INSERT INTO `detail_disposisi` (`id_detail`, `no_jabatan`, `agenda_disposisi`) VALUES
(23, 1, 59),
(26, 1, 61),
(27, 4, 61),
(28, 1, 62),
(29, 4, 62),
(37, 4, 59),
(38, 4, 59),
(39, 3, 59),
(40, 3, 59),
(41, 4, 59),
(42, 6, 59),
(43, 6, 59),
(44, 5, 59),
(45, 6, 59);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Wakil Kepala Sekolah 3'),
(2, 'Bendahara Sekolah'),
(3, 'Kepala Sekolah'),
(4, 'Satpam Sekolah'),
(5, 'Penjaga Sekolah'),
(6, 'Teknikal Mesin'),
(7, ' ');

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE IF NOT EXISTS `klasifikasi` (
  `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT,
  `kode_klasifikasi` varchar(30) NOT NULL,
  `nama_klasifikasi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_klasifikasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id_klasifikasi`, `kode_klasifikasi`, `nama_klasifikasi`, `keterangan`) VALUES
(1, '123', 'undangan', 'undangan'),
(2, '124', 'organisasi', 'organisasi');

-- --------------------------------------------------------

--
-- Table structure for table `lembar_disposisi`
--

CREATE TABLE IF NOT EXISTS `lembar_disposisi` (
  `no_agenda_disposisi` int(11) NOT NULL AUTO_INCREMENT,
  `instruksi` text,
  `catatan` text,
  `agenda_masuk` int(11) NOT NULL,
  PRIMARY KEY (`no_agenda_disposisi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `lembar_disposisi`
--

INSERT INTO `lembar_disposisi` (`no_agenda_disposisi`, `instruksi`, `catatan`, `agenda_masuk`) VALUES
(59, 'coba coba dan coba', 'terusss', 10),
(61, 'asd ', 'asd', 12),
(62, 'coba terusss iii', 'coba terusss iii', 15);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `nip_pegawai` bigint(50) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `status_pegawai` enum('aktif','nonaktif') NOT NULL,
  PRIMARY KEY (`nip_pegawai`),
  KEY `id_posisi` (`id_posisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`nip_pegawai`, `nama_pegawai`, `email`, `foto`, `id_posisi`, `status_pegawai`) VALUES
(9, 'wer', 'wer', 'foto_pegawai/wer.jpg', 1, 'aktif'),
(101, 'ami', 'ami@gmail.com', 'foto_pegawai/ami.jpg', 2, 'aktif'),
(200, 'asa', 'asa', 'foto_pegawai/asa.jpg', 1, ''),
(234, 'w', 'w', 'foto_pegawai/w.jpg', 1, 'aktif'),
(250, 'oke', 'oke', 'foto_pegawai/oke.jpg', 2, ''),
(789, 'asd', 'asd', 'foto_pegawai/asd.jpg', 3, 'aktif'),
(900, 'uuu', 'uuu', 'foto_pegawai/uuu.jpg', 3, 'aktif'),
(1000, 'reres', '100@gmail.com', 'foto_pegawai/reres.png', 1, ''),
(1111, 'aku', 'aku@gmail.com', 'foto_pegawai/uu.jpg', 3, 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE IF NOT EXISTS `surat_keluar` (
  `no_agenda_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat_keluar` varchar(50) NOT NULL,
  `tanggal_surat_keluar` date NOT NULL,
  `tanggal_dikirim` date DEFAULT NULL,
  `klasifikasi` int(11) NOT NULL,
  `tujuan_surat` varchar(50) NOT NULL,
  `keterangan` text,
  `file_surat` varchar(50) NOT NULL,
  PRIMARY KEY (`no_agenda_keluar`),
  KEY `klasifikasi` (`klasifikasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`no_agenda_keluar`, `no_surat_keluar`, `tanggal_surat_keluar`, `tanggal_dikirim`, `klasifikasi`, `tujuan_surat`, `keterangan`, `file_surat`) VALUES
(3, '23/sv', '2016-04-01', '2016-04-01', 1, 'mari', 'surat\r\nkkkk', '23_sv.jpg'),
(4, '002', '2016-04-28', '2016-04-02', 2, 'aku', 'kamu iyaa kamuu', '002.png'),
(5, 'tyyyy', '2016-04-27', '2016-04-29', 2, 'fds', 'fdsf', 'tyyyy.png'),
(7, 'we', '0000-00-00', '2016-04-07', 1, 'aa', 'aa', 'we.png'),
(8, '678', '0000-00-00', '1900-12-22', 1, 'wer', 'wer', '678.png');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE IF NOT EXISTS `surat_masuk` (
  `no_agenda_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat_masuk` varchar(50) NOT NULL,
  `tanggal_surat_masuk` date NOT NULL,
  `tanggal_surat_diterima` date NOT NULL,
  `klasifikasi` int(11) NOT NULL,
  `jenis_surat` enum('surat khusus','surat umum') NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `keterangan` text,
  `file_surat` varchar(50) NOT NULL,
  PRIMARY KEY (`no_agenda_masuk`),
  KEY `klasifikasi` (`klasifikasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`no_agenda_masuk`, `no_surat_masuk`, `tanggal_surat_masuk`, `tanggal_surat_diterima`, `klasifikasi`, `jenis_surat`, `asal_surat`, `keterangan`, `file_surat`) VALUES
(7, '10/sv/as', '2016-04-27', '2016-04-28', 2, 'surat khusus', 'asa', 'makan', '10_sv_as.png'),
(9, 'a', '2016-04-20', '2016-04-20', 2, 'surat umum', 'a', 'a', 's_masuk/a.jpg'),
(10, 'a/a/a/a', '2016-05-04', '2016-05-03', 1, 'surat umum', 'aaaa', 'uuhhh', 's_masuk/a_a_a_a.png'),
(12, 'ass/aa', '2017-01-01', '2017-01-07', 2, 'surat khusus', 'asas', 'asa', 'ass_aa.png'),
(14, 'qwe', '2016-04-21', '2016-04-22', 1, 'surat khusus', 'qwqw', 'qwqw', 'qwe.png'),
(15, '890', '2016-05-26', '2016-05-28', 1, 'surat umum', 'ert', 'ert', '890.jpg'),
(16, '12/sv/sd', '2016-05-12', '2016-05-28', 2, 'surat umum', 'sampai mana', 'sampai mana', '12_sv_sd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `auth_key` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `nip` bigint(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `fk_nip` (`nip`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `status`, `created_at`, `updated_at`, `role`, `nip`) VALUES
(1, 'admin', 'OrkM75tkO4ReaptgqnRyZjG2AxbZ1_EJ', '$2y$13$IASGaDr957zcwls/LUUuVe8r15X9Vgc7EJSOw8J6wPhmkonqlR7oC', 10, 0, 1461902785, 10, 1000),
(4, 'ami', 'RoFQOJ-15LIYvaxF1XBIci75Ly5EVJQm', '$2y$13$q2g2jS05FJkYU2zr6YZxCe1QlUVHvEd9HEuJp6GjHz8HVreffTWbC', 10, 0, 1462007155, 20, 101),
(6, 'reres', 'N4Xjsd47Ilz7vPptdQW-DP-m64I32YtI', '$2y$13$TfrIj22AMcMc3S6KfsgDj.mjwhSJDJuSeEJz1ycJd2uGQIsHMyxb.', 10, 0, 1461313769, 30, 1000),
(14, 'asaaa', 'AB-mFTGh3zT18V3lsVhsTqi2I4Cg9GhJ', '$2y$13$f2qhI1an0kiWNLvlI.sMyu0xuCiJ8CHmOmqgURUDnndtVM/dJa3oi', 10, 0, 1462075934, 30, 200),
(16, 'we', 'gValGFSJaM0wVa9yd0ekCLxTMvSB0g20', '$2y$13$BLidHhvqminq1dSQHCOkXeH4uZGRTQEjfrGemS6bCYAOgW9e5naeG', 10, 1462150330, 1462150330, 20, 9);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda_kegiatan`
--
ALTER TABLE `agenda_kegiatan`
  ADD CONSTRAINT `agenda_kegiatan_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`nip_pegawai`);

--
-- Constraints for table `detail_disposisi`
--
ALTER TABLE `detail_disposisi`
  ADD CONSTRAINT `detail_disposisi_ibfk_1` FOREIGN KEY (`no_jabatan`) REFERENCES `jabatan` (`id_jabatan`),
  ADD CONSTRAINT `detail_disposisi_ibfk_2` FOREIGN KEY (`agenda_disposisi`) REFERENCES `lembar_disposisi` (`no_agenda_disposisi`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_posisi`) REFERENCES `jabatan` (`id_jabatan`);

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `surat_keluar_ibfk_1` FOREIGN KEY (`klasifikasi`) REFERENCES `klasifikasi` (`id_klasifikasi`);

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `surat_masuk_ibfk_1` FOREIGN KEY (`klasifikasi`) REFERENCES `klasifikasi` (`id_klasifikasi`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_nip` FOREIGN KEY (`nip`) REFERENCES `pegawai` (`nip_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
