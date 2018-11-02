-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 08. Januari 2018 jam 01:35
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `nip` int(20) NOT NULL,
  `nama_dosen` varchar(200) NOT NULL,
  `jekel` char(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `jekel`, `email`, `no_telp`, `alamat`) VALUES
(97465, 'yaya', 'L', 'yaya@gmail.com', '082354762346', 'JL.Anduring'),
(123456, 'Bambang', 'L', 'bambang@gmail.com', '082354762345', 'Jl.Raya Andalas'),
(2147483647, 'Bambang', 'L', 'bam@gmai.com', '082354762348', 'Jl.Setia Budi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(50) NOT NULL,
  `jenjang` varchar(25) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `jenjang`) VALUES
(1, 'Teknologi Informasi', 'D3/D4'),
(6, 'Teknik Mesin', 'D3/D4'),
(9, 'Teknik Elektro', 'D3/D4'),
(10, 'Teknik Sipil', 'D3/D4'),
(11, 'Bahasa Inggris', 'D3'),
(12, 'Akuntansi', 'D3/D4'),
(13, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `jekel` char(1) NOT NULL,
  `email` varchar(25) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  PRIMARY KEY (`nim`),
  KEY `id_jurusan` (`id_jurusan`),
  KEY `id_prodi` (`id_prodi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `jekel`, `email`, `id_jurusan`, `id_prodi`, `no_telp`, `alamat`) VALUES
('160102016', 'Vadil Fijrinal Dirja', 'L', 'dirjafadil@gmail.com', 1, 12, '081363533898', 'Jl.Lubuk Buaya'),
('1601081011', 'Rafki Mauliadi', 'L', 'rafki@gmail.com', 1, 12, '082367981209', 'Limau Manih'),
('1601081024', 'Annisa Rilwadi', 'P', 'annisaril03gmail.com', 1, 12, '082387969285', 'JL. Pampangan No.9'),
('1601081026', 'Nike Nelmala Sari', 'P', 'nike@gmail.com', 6, 10, '082345632154', 'pasar baru'),
('160108103', 'abdur rahimi', 'P', 'abdur03gmail.com', 1, 12, '082387969285', 'Jl.pasar Raya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE IF NOT EXISTS `matakuliah` (
  `kode` varchar(100) NOT NULL,
  `nama_makul` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `jam` int(11) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`kode`, `nama_makul`, `sks`, `jam`) VALUES
('001', 'Arsitektur Komputer', 2, 2),
('002', 'Praktek Sistem Operasi', 1, 3),
('003', 'Sistem Operasi', 3, 3),
('004', 'Praktek Pemrograman Web', 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_prodi` varchar(50) NOT NULL,
  `jenjang` varchar(25) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  PRIMARY KEY (`id_prodi`),
  KEY `id_jurusan` (`id_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `jenjang`, `id_jurusan`) VALUES
(10, 'Teknik Manufaktur', 'D4', 6),
(11, 'Teknik Alat Berat', 'D3', 6),
(12, 'Teknik Komputer', 'D3', 1),
(13, 'Bahasa Inggris', 'D3', 11),
(14, 'Akuntansi', 'D4', 12),
(15, 'Teknik Elektronika', 'D4', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b', 'administrator');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
