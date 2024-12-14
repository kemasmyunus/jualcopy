<?php
include('koneksi.php');
include('templates/header.php');
include('templates/sidebar.php');

if (isset($_GET['tracking_number'])) {
    $tracking_number = $_GET['tracking_number'];

    // Ambil informasi pembayaran berdasarkan tracking number
    $query = mysqli_query($koneksi, "SELECT * FROM bayar WHERE tracking_number = '$tracking_number'") or die('query failed');
    $data = mysqli_fetch_assoc($query);

    // Ambil status pembayaran
    $statusQuery = mysqli_query($koneksi, "SELECT status FROM payment_status WHERE tracking_number = '$tracking_number'") or die('query failed');
    $statusData = mysqli_fetch_assoc($statusQuery);
    $payment_status = $statusData ? $statusData['status'] : 'belum_dibayar'; // Default jika tidak ada status

    if (!$data) {
        echo "<script>alert('Pembayaran tidak ditemukan.');window.location='checkout.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Tidak ada nomor pelacakan.');window.location='checkout.php';</script>";
    exit;
}

// Tentukan warna dan pesan berdasarkan status pembayaran
if ($payment_status == 'sudah_dibayar') {
    $bgColor = 'bg-success'; // Warna hijau untuk pembayaran sukses
    $message = 'Transaksi Sukses! Pembayaran sudah berhasil dilakukan.';
} else {
    $bgColor = 'bg-warning'; // Warna kuning untuk belum dibayar
    $message = 'Pembayaran belum dilakukan. Silakan lakukan pembayaran.';
}
?>

<!-- Content Wrapper. Contains page content -->
<style>
    .text-black {
        color: black !important; /* Memastikan warna teks selalu hitam */
    }
</style>

<div class="content-wrapper <?= $bgColor ?>">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-black">Pembayaran Dana</h1> <img src="assets/img/dana.webp" alt="DANA" style="width: 100px; ">

                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <h4 class="text-black">Instruksi Pembayaran</h4>
                <p class="text-black">Silakan lakukan pembayaran melalui e-wallet pilihan Anda (<?= $data['no_e_wallet'] ?>).</p>

                <!-- Menampilkan rincian pembayaran -->
                <h5 class="text-black">Total: Rp. <?= number_format($data['grand_total'], 0, ',', '.'); ?></h5>
                <p class="text-black">ID Pembayaran: <?= $tracking_number; ?></p>

                <div class="alert alert-info text-black">
                    <strong>Informasi:</strong> Pastikan Anda melakukan pembayaran sebelum batas waktu yang ditentukan. Bukti pembayaran akan diproses secara otomatis.
                </div>

                <h5 class="text-black">Detail Pembayaran</h5>
                <p class="text-black"><strong>Nomor Dana:</strong> <?= $data['no_e_wallet'] ?></p>
                <p class="text-black"><strong>Nama:</strong> <?= $data['nama_lengkap'] ?></p>
                <p class="text-black"><strong>Total yang harus dibayar:</strong> Rp. <?= number_format($data['grand_total'], 0, ',', '.'); ?></p>

                <p class="h4 text-black"><?= $message ?></p>

                <a href="track.php?tracking_number=<?= $tracking_number ?>" class="btn btn-primary">Lacak Pesanan</a>
            </div>
        </div>
    </section>
</div>

<?php
include('templates/footer.php');
?>
