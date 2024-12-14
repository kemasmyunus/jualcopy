-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 27 Okt 2024 pada 22.50
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

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
-- Struktur dari tabel `bayar`
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
  `status` varchar(100) NOT NULL DEFAULT 'SEDANG PROSES',
  `metode_pengiriman` varchar(50) DEFAULT NULL,
  `grand_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bayar`
--

INSERT INTO `bayar` (`id`, `user_id`, `nama_lengkap`, `alamat`, `telepon`, `metode_pembayaran`, `no_e_wallet`, `no_rekening`, `no_kartu_kredit`, `nama_pemegang_kartu`, `tanggal_kadaluarsa`, `kode_cvc`, `bukti_transfer`, `tracking_number`, `status`, `metode_pengiriman`, `grand_total`) VALUES
(1, 6, 'User', 'Jalan User ', '0866666666', 'bank_transfer', '', '12345678', '', '', '', '', '', 'SEN-66b4372670f3a', 'SELESAI', NULL, 0.00),
(2, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '', '12345678', '', '', '', '', '', 'SEN-6719c2de3ee0f', 'SEDANG PROSES', 'Same Day', 0.00),
(3, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '', '12345678', '', '', '', '', '', 'SEN-6719c35de8647', 'SEDANG PROSES', 'Ekspres', 0.00),
(4, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '21512312254', '12345678', '', '', '', '', '', 'SEN-6719ca0401b20', 'SEDANG PROSES', 'Ekspres', 0.00),
(5, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '21512312254', '12345678', '', '', '', '', '', 'SEN-6719ca6062e5b', 'SEDANG PROSES', 'Ekspres', 0.00),
(6, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '12321', '12345678', '', '', '', '', '', 'SEN-6719ca8ace6a5', 'SEDANG PROSES', 'Same Day', 0.00),
(7, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '12321', '12345678', '', '', '', '', '', 'SEN-6719caf7bc613', 'SEDANG PROSES', 'Same Day', 0.00),
(8, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '12321', '12345678', '', '', '', '', '', 'SEN-6719cb450e6e5', 'SEDANG PROSES', 'Same Day', 0.00),
(9, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '12321', '12345678', '', '', '', '', '', 'SEN-6719cb4ea7ec6', 'SEDANG PROSES', 'Same Day', 0.00),
(10, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '123213213', '12345678', '', '', '', '', '', 'SEN-6719cb5c8258c', 'SEDANG PROSES', 'Ekspres', 0.00),
(11, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '123213', '12345678', '', '', '', '', '', 'SEN-6719cb9fb876a', 'SEDANG PROSES', 'Ekspres', 0.00),
(12, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '3424234', '12345678', '', '', '', '', '', 'SEN-6719cbf9451d6', 'SEDANG PROSES', 'Same Day', 0.00),
(13, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '123', '12345678', '', '', '', '', '', 'SEN-6719cdc970eb1', 'SEDANG PROSES', 'Ekspres', 80000.00),
(14, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '23131', '12345678', '', '', '', '', '', 'SEN-6719cfa648427', 'SEDANG PROSES', 'Reguler', 80000.00),
(15, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '123123213', '12345678', '', '', '', '', '', 'SEN-6719d0afeb010', 'SEDANG PROSES', 'Ekspres', 80000.00),
(16, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '3424234', '12345678', '', '', '', '', '', 'SEN-6719d1b380ff5', 'SEDANG PROSES', 'Ekspres', 80000.00),
(17, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '213213', '12345678', '', '', '', '', '', 'SEN-6719d20fbf517', 'SEDANG PROSES', 'Ekspres', 80000.00),
(18, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '123123123', '12345678', '', '', '', '', '', 'SEN-6719d28d7695f', 'SEDANG PROSES', 'Ekspres', 80000.00),
(19, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '213123', '12345678', '', '', '', '', '', 'SEN-6719d2e4249f6', 'SEDANG PROSES', 'Ekspres', 80000.00),
(20, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '3333', '12345678', '', '', '', '', '', 'SEN-6719d697565e3', 'SEDANG PROSES', 'Ekspres', 80000.00),
(21, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '1231231', '12345678', '', '', '', '', '', 'SEN-6719d6f68e54e', 'SEDANG PROSES', 'Ekspres', 80000.00),
(22, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '321', '12345678', '', '', '', '', '', 'SEN-6719dc6763d4f', 'SEDANG PROSES', 'Ekspres', 80000.00),
(23, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '765', '12345678', '', '', '', '', '', 'SEN-6719dce387441', 'SEDANG PROSES', 'Ekspres', 80000.00),
(24, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '888', '12345678', '', '', '', '', '', 'SEN-6719de2a2fd0d', 'SEDANG PROSES', 'Reguler', 80000.00),
(25, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '765', '12345678', '', '', '', '', '', 'SEN-6719de6c6db5e', 'SEDANG PROSES', 'Ekspres', 80000.00),
(26, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '321', '12345678', '', '', '', '', '', 'SEN-6719df503d100', 'SEDANG PROSES', 'Ekspres', 80000.00),
(27, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '321', '12345678', '', '', '', '', '', 'SEN-6719e082a745a', 'SEDANG PROSES', 'Same Day', 80000.00),
(28, 6, 'User', 'Jalan User ', '0866666666', 'e_wallet', '4444', '12345678', '', '', '', '', '', 'SEN-6719e3c17fe43', 'SEDANG PROSES', 'Ekspres', 80000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
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
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`, `ukuran`, `warna`) VALUES
(1, 6, 'kacamata tembus pandang', 40000, 2, '3.jpeg', '2.0', 'Biru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_barang`
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
-- Dumping data untuk tabel `daftar_barang`
--

INSERT INTO `daftar_barang` (`id`, `nama`, `harga_beli`, `harga_jual`, `satuan`, `foto`, `merek`, `warna`) VALUES
(1, 'kacamata msss', '23233', '34455', '123', '1.jpeg', 'samsung', 'merah, biru, kuning, hitam, polos'),
(2, 'kacamata makro', '12000', '20000', '13', '2.png', 'srya', 'merah, biru, kuning, hitam, polos'),
(3, 'kacamata tembus pandang', '30000', '40000', '21', '3.jpeg', '15', 'merah, biru, kuning, hitam, polos'),
(4, 'kacamata back sey', '120000', '39000000', '18', 'bg.png', 'lessat', 'merah, biru, kuning, hitam, polos');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `komentar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id`, `nama`, `rating`, `komentar`) VALUES
(1, 'kacamata tembus pandang', '4', 'cobalagi'),
(2, 'kacamata msss', '5', 'bismilaah'),
(3, 'kacamata makro', '5', 'see you'),
(4, 'kacamata tembus pandang', '5', 'SUGOI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
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
-- Dumping data untuk tabel `karyawan`
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
-- Struktur dari tabel `konsul`
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
-- Dumping data untuk tabel `konsul`
--

INSERT INTO `konsul` (`id`, `nama`, `foto`, `tanggal`, `surat_keterangan`, `keterangan`) VALUES
(1, 'User', 'sakit mata.jpg', '2024-08-08', '', 'matacu atit'),
(2, 'User', 'sakit mata.jpg', '2024-08-08', '', 'macacu atit agi'),
(3, 'User', 'sakit mata.jpg', '2024-08-08', '', 'aduh atit'),
(4, 'User', 'sakit mata.jpg', '2024-08-08', '', 'atit matak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int(11) NOT NULL,
  `tracking_number` varchar(50) NOT NULL,
  `status` enum('belum_dibayar','sudah_dibayar') NOT NULL DEFAULT 'belum_dibayar',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `payment_status`
--

INSERT INTO `payment_status` (`id`, `tracking_number`, `status`, `updated_at`) VALUES
(1, 'SEN-6719d1b380ff5', 'sudah_dibayar', '2024-10-24 04:49:51'),
(2, 'SEN-6719d28d7695f', 'sudah_dibayar', '2024-10-24 04:52:40'),
(3, 'SEN-6719d28d7695f', 'sudah_dibayar', '2024-10-24 04:52:44'),
(4, 'SEN-6719d2e4249f6', 'sudah_dibayar', '2024-10-24 04:54:12'),
(5, 'SEN-6719d6f68e54e', 'sudah_dibayar', '2024-10-24 05:11:26'),
(6, 'SEN-6719dc6763d4f', 'sudah_dibayar', '2024-10-24 05:34:39'),
(7, ' SEN-6719dce387441', 'sudah_dibayar', '2024-10-24 05:39:18'),
(8, ' SEN-6719dce387441', 'sudah_dibayar', '2024-10-24 05:39:51'),
(9, 'SEN-6719de6c6db5e', 'sudah_dibayar', '2024-10-24 05:43:18'),
(10, 'SEN-6719df503d100', 'sudah_dibayar', '2024-10-24 05:47:00'),
(11, 'SEN-6719df503d100', 'sudah_dibayar', '2024-10-24 05:48:48'),
(12, 'SEN-6719df503d100', 'sudah_dibayar', '2024-10-24 05:49:00'),
(13, 'SEN-6719df503d100', 'sudah_dibayar', '2024-10-24 05:49:27'),
(14, 'SEN-6719df503d100', 'sudah_dibayar', '2024-10-24 05:50:02'),
(15, 'SEN-6719df503d100', 'sudah_dibayar', '2024-10-24 05:50:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
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
-- Dumping data untuk tabel `pelanggan`
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
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `ttd` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `ttd`) VALUES
(1, 'shindy oemardi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasi`
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
-- Dumping data untuk tabel `rekomendasi`
--

INSERT INTO `rekomendasi` (`id`, `pelanggan_id`, `product_id`, `quantity`, `color`, `size`) VALUES
(2, 6, 3, 2, 'Biru', '2.0'),
(3, 6, 2, 2, 'Kuning', '3.0'),
(4, 6, 4, 4, 'Kuning', '1.0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `daftar_barang`
--
ALTER TABLE `daftar_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konsul`
--
ALTER TABLE `konsul`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelanggan_id` (`pelanggan_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bayar`
--
ALTER TABLE `bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `daftar_barang`
--
ALTER TABLE `daftar_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konsul`
--
ALTER TABLE `konsul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD CONSTRAINT `rekomendasi_ibfk_1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rekomendasi_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `daftar_barang` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
