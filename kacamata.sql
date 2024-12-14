-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2024 at 03:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kacamata`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `no_e_wallet` varchar(50) DEFAULT NULL,
  `no_rekening` varchar(50) DEFAULT NULL,
  `no_kartu_kredit` varchar(50) DEFAULT NULL,
  `nama_pemegang_kartu` varchar(100) DEFAULT NULL,
  `tanggal_kadaluarsa` varchar(10) DEFAULT NULL,
  `kode_cvc` varchar(10) DEFAULT NULL,
  `bukti_transfer` varchar(255) DEFAULT NULL,
  `tracking_number` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'SEDANG PROSES'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id`, `user_id`, `nama_lengkap`, `alamat`, `telepon`, `metode_pembayaran`, `no_e_wallet`, `no_rekening`, `no_kartu_kredit`, `nama_pemegang_kartu`, `tanggal_kadaluarsa`, `kode_cvc`, `bukti_transfer`, `tracking_number`, `status`) VALUES
(1, 6, 'User', 'Jalan User ', '0866666666', 'bank_transfer', '', '12345678', '', '', '', '', '', 'SEN-66b4372670f3a', 'SELESAI');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`, `ukuran`, `warna`) VALUES
(1, 6, 'kacamata tembus pandang', 40000, 2, '3.jpeg', '2.0', 'Biru');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_barang`
--

CREATE TABLE `daftar_barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `harga_beli` varchar(50) NOT NULL,
  `harga_jual` varchar(50) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `warna` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_barang`
--

INSERT INTO `daftar_barang` (`id`, `nama`, `harga_beli`, `harga_jual`, `satuan`, `foto`, `merek`, `warna`) VALUES
(1, 'kacamata msss', '23233', '34455', '123', '1.jpeg', 'samsung', 'merah, biru, kuning, hitam, polos'),
(2, 'kacamata makro', '12000', '20000', '13', '2.png', 'srya', 'merah, biru, kuning, hitam, polos'),
(3, 'kacamata tembus pandang', '30000', '40000', '21', '3.jpeg', '15', 'merah, biru, kuning, hitam, polos'),
(4, 'kacamata back sey', '120000', '39000000', '18', 'bg.png', 'lessat', 'merah, biru, kuning, hitam, polos');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `komentar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `rating`, `komentar`) VALUES
(1, 'kacamata tembus pandang', '4', 'cobalagi'),
(2, 'kacamata msss', '5', 'bismilaah'),
(3, 'kacamata makro', '5', 'see you'),
(4, 'kacamata tembus pandang', '5', 'SUGOI');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `kelamin` varchar(100) NOT NULL,
  `no_hp` int(11) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `status_aktif` varchar(20) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `nip` varchar(20) NOT NULL,
  `pendidikan` enum('SD','SMP','SMA','D3','S1','S2','S3') DEFAULT NULL,
  `gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_karyawan`, `kelamin`, `no_hp`, `tanggal`, `agama`, `jabatan`, `alamat`, `status_aktif`, `username`, `password`, `nip`, `pendidikan`, `gaji`) VALUES
(1, 'Asada Shino', 'P', 812345671, '2024-01-01', 'islam', 'Admin', 'Jl. Nihonggo Jozu', 'aktif', 'asada.shino', '123', 'NIP001', 'D3', 10000000),
(2, 'Shiori Asagiri', 'P', 812345672, '2024-01-02', 'islam', 'Pimpinan', 'Jl. Ekseplosion', 'aktif', 'shiori.asagiri', '123', 'NIP002', 'SMA', 8000000),
(3, 'Nodoka Manabe', 'P', 812345673, '2024-01-03', 'islam', 'Pimpinan', 'Jl. Ara-ara', 'aktif', 'nodoka.manabe', '123', 'NIP003', 'SMA', 8000000),
(4, 'Mirai Kuriyama', 'L', 812345674, '2024-01-04', 'islam', 'Pimpinan', 'Jl. Yare-yare', 'aktif', 'mirai.kuriyama', '123', 'NIP004', 'SMA', 8000000),
(5, 'Yuki Nagato', 'L', 812345675, '2024-01-05', 'islam', 'Pimpinan', 'Jl. Mendouksai', 'aktif', 'yuki.nagato', '123', 'NIP005', 'SMA', 8000000),
(6, 'Admin', 'L', 89999999, '1996-03-02', 'islam', 'Pimpinan', 'Jalan Banjarmasin', 'aktif', 'admin', 'admin', 'NIP1', 'S3', 20000000);

-- --------------------------------------------------------

--
-- Table structure for table `konsul`
--

CREATE TABLE `konsul` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `surat_keterangan` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konsul`
--

INSERT INTO `konsul` (`id`, `nama`, `foto`, `tanggal`, `surat_keterangan`, `keterangan`) VALUES
(1, 'User', 'sakit mata.jpg', '2024-08-08', '', 'matacu atit'),
(2, 'User', 'sakit mata.jpg', '2024-08-08', '', 'macacu atit agi'),
(3, 'User', 'sakit mata.jpg', '2024-08-08', '', 'aduh atit'),
(4, 'User', 'sakit mata.jpg', '2024-08-08', '', 'atit matak');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `umur` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `hp` varchar(18) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verifikasi` enum('sudah_verifikasi','waiting','data_tidak_valid') DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `kelamin` enum('Pria','Wanita') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode`, `nama`, `umur`, `alamat`, `hp`, `username`, `password`, `verifikasi`, `email`, `tgl_daftar`, `kelamin`) VALUES
(1, 'A01', 'Kiyoko Shimizu', '25', 'Jl. Haikyuu', '0812345676', 'kiyoko.shimizu', '123', 'sudah_verifikasi', 'kiyoko@example.com', '2024-01-06', 'Wanita'),
(2, 'A01', 'Maki Zenin', '27', 'Jl. Jujutsu', '0812345677', 'maki.zenin', '123', 'sudah_verifikasi', 'maki@example.com', '2024-01-07', 'Wanita'),
(3, 'A01', 'Sarutobi Ayame', '30', 'Jl. Gintama', '0812345678', 'sarutobi.ayame', '123', 'sudah_verifikasi', 'sarutobi@example.com', '2024-01-08', 'Wanita'),
(4, 'A01', 'Ai Mie', '22', 'Jl. Landak', '0812345679', 'ai.mie', '123', 'sudah_verifikasi', 'ai@example.com', '2024-01-09', 'Wanita'),
(5, 'A01', 'Nano Eiai', '24', 'Jl. Effisien', '0812345680', 'nano.eiai', '123', 'sudah_verifikasi', 'nano@example.com', '2024-01-10', 'Wanita'),
(6, 'SH0002', 'User', '21', 'Jalan User', '0866666666', 'user', 'user', 'sudah_verifikasi', 'user@gmail.com', '2024-08-08', 'Pria');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `ttd` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `ttd`) VALUES
(1, 'shindy oemardi');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id` int(11) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id`, `pelanggan_id`, `product_id`, `quantity`, `color`, `size`) VALUES
(2, 6, 3, 2, 'Biru', '2.0'),
(3, 6, 2, 2, 'Kuning', '3.0'),
(4, 6, 4, 4, 'Kuning', '1.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_barang`
--
ALTER TABLE `daftar_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsul`
--
ALTER TABLE `konsul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_barang`
--
ALTER TABLE `daftar_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konsul`
--
ALTER TABLE `konsul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD CONSTRAINT `rekomendasi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekomendasi_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `daftar_barang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
