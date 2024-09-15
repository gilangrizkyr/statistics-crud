-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 09 Sep 2024 pada 02.26
-- Versi server: 11.4.2-MariaDB-log
-- Versi PHP: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_karyawan`
--

DROP TABLE IF EXISTS `data_karyawan`;
CREATE TABLE `data_karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `pendidikan` enum('SLTA','D3','S1','S2','S3') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(11) DEFAULT NULL,
  `update_umur` int(11) DEFAULT NULL,
  `golongan` enum('II/C','II/D','III/A','III/B','III/C','III/D','IV/A','IV/B','IV/C','IV/D','IV/E') NOT NULL,
  `jabatan` enum('Wakil Ketua Tingkat Banding','Sekretaris Tingkat Banding Tipe B','Kepala Bagian','Panitera Pengganti Tingkat Banding','Kepala Sub Bagian','Pranata Keuangan APBN Pelaksanaan','Arsiparis Pelaksanaan Lanjutkan','Analisa Protokol','Pranata Komputer Ahli Muda','Pengadministrasi Persuratan','Analisa Pengelolaan Keuangan APBN','Pranata Keuangan APBN Penyelia','Pengadministrasi Perpustakaan','Penyusunan Laporan Keuangan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nama`, `jenis_kelamin`, `pendidikan`, `tanggal_lahir`, `umur`, `update_umur`, `golongan`, `jabatan`) VALUES
(5, 'Gilang Rizky Ramadhan', 'Laki-Laki', 'S3', '2002-11-11', 31, 0, 'II/C', 'Wakil Ketua Tingkat Banding'),
(6, 'Putra', 'Laki-Laki', 'S3', '1988-11-03', 31, 0, 'IV/D', 'Analisa Protokol'),
(8, 'Ramadhan', 'Laki-Laki', 'S3', '1984-09-03', 39, 0, 'IV/E', 'Wakil Ketua Tingkat Banding'),
(9, 'Manisa', 'Perempuan', 'D3', '1994-09-03', 29, 0, 'III/A', 'Wakil Ketua Tingkat Banding'),
(10, 'fazri', 'Laki-Laki', 'S3', '2024-09-03', 61, 0, 'III/B', 'Analisa Pengelolaan Keuangan APBN'),
(11, 'Gilang', 'Laki-Laki', 'S3', '1975-09-03', 48, 0, 'IV/A', 'Sekretaris Tingkat Banding Tipe B'),
(12, 'Kurniadi', 'Laki-Laki', 'D3', '1995-09-15', 28, 0, 'III/C', 'Pranata Keuangan APBN Pelaksanaan'),
(13, 'Ahmad Fauzi', 'Laki-Laki', 'S1', '1980-05-12', 44, 0, 'II/C', 'Wakil Ketua Tingkat Banding'),
(14, 'Siti Aisyah', 'Perempuan', 'D3', '1990-08-22', 34, 0, 'II/C', 'Arsiparis Pelaksanaan Lanjutkan'),
(15, 'Budi Santoso', 'Laki-Laki', 'D3', '1985-11-15', 38, 0, 'IV/B', 'Wakil Ketua Tingkat Banding'),
(16, 'Dewi Wulandari', 'Perempuan', 'S2', '1988-04-10', 36, 0, 'III/B', 'Wakil Ketua Tingkat Banding'),
(17, 'Rizky Pratama', 'Laki-Laki', 'S1', '1992-07-30', 32, 0, 'II/C', 'Wakil Ketua Tingkat Banding'),
(18, 'Nina Fitriani', 'Perempuan', 'D3', '1987-09-25', 36, 0, 'III/A', 'Wakil Ketua Tingkat Banding'),
(19, 'Joko Widodo', 'Laki-Laki', 'SLTA', '1983-02-18', 41, 0, 'II/C', 'Wakil Ketua Tingkat Banding'),
(20, 'Maya Sari', 'Perempuan', 'SLTA', '1981-12-05', 42, 0, 'II/C', 'Wakil Ketua Tingkat Banding'),
(21, 'Yudi Kurniawan', 'Laki-Laki', 'SLTA', '1991-06-17', 33, 0, 'IV/A', 'Wakil Ketua Tingkat Banding'),
(22, 'Lina Dewi', 'Perempuan', 'S2', '1989-01-29', 35, 0, 'II/C', 'Wakil Ketua Tingkat Banding'),
(23, 'Andi Setiawan', 'Laki-Laki', 'S1', '1993-10-14', 30, 0, 'II/C', 'Penyusunan Laporan Keuangan'),
(24, 'Wati Kusuma', 'Perempuan', 'SLTA', '1986-03-23', 38, 0, 'II/C', 'Pengadministrasi Perpustakaan'),
(25, 'Faisal Hadi', 'Laki-Laki', 'S2', '1984-07-08', 40, 0, 'IV/E', 'Pranata Keuangan APBN Penyelia'),
(26, 'Santi Rahayu', 'Perempuan', 'D3', '1992-05-20', 32, 0, 'IV/E', 'Analisa Pengelolaan Keuangan APBN'),
(27, 'Teguh Prasetyo', 'Laki-Laki', 'S1', '1990-11-12', 33, 0, 'IV/D', 'Pengadministrasi Persuratan'),
(28, 'Laila Amalia', 'Perempuan', 'D3', '1985-04-30', 39, 0, 'IV/C', 'Pranata Komputer Ahli Muda'),
(29, 'Hendra Wijaya', 'Laki-Laki', 'D3', '1988-08-19', 36, 0, 'IV/B', 'Analisa Protokol'),
(30, 'Nisa Oktaviani', 'Perempuan', 'S3', '1989-03-14', 35, 0, 'IV/A', 'Arsiparis Pelaksanaan Lanjutkan'),
(31, 'Rina Purnama', 'Perempuan', 'S2', '1991-09-22', 32, 0, 'III/D', 'Pranata Keuangan APBN Pelaksanaan'),
(32, 'Krisna Aji', 'Laki-Laki', 'SLTA', '1984-12-25', 39, 0, 'III/C', 'Kepala Sub Bagian'),
(33, 'Vina Widiastuti', 'Perempuan', 'S1', '1987-01-06', 37, 0, 'III/B', 'Panitera Pengganti Tingkat Banding'),
(34, 'Roni Setiadi', 'Laki-Laki', 'D3', '1992-11-03', 31, 0, 'III/A', 'Kepala Bagian'),
(35, 'Diana Fitri', 'Laki-Laki', 'S2', '1990-06-19', 34, 0, 'II/D', 'Sekretaris Tingkat Banding Tipe B'),
(51, 'Agung', 'Laki-Laki', 'S2', '1980-11-11', 43, 0, 'II/C', 'Wakil Ketua Tingkat Banding'),
(53, 'Agung H', 'Laki-Laki', 'S2', '1985-09-06', 39, NULL, 'IV/D', 'Pengadministrasi Perpustakaan');

--
-- Trigger `data_karyawan`
--
DROP TRIGGER IF EXISTS `before_data_karyawan_insert`;
DELIMITER $$
CREATE TRIGGER `before_data_karyawan_insert` BEFORE INSERT ON `data_karyawan` FOR EACH ROW BEGIN
    SET NEW.umur = TIMESTAMPDIFF(YEAR, NEW.tanggal_lahir, CURDATE());
END
$$
DELIMITER ;

-- SELECT (*) FROM data_karyawan;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
