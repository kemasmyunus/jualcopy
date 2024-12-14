<?php
include('koneksi.php');
include('templates/header.php');
include('templates/sidebar.php');

// Get the tracking number from the URL
if (isset($_GET['tracking_number'])) {
    $tracking_number = $_GET['tracking_number'];

    // Query to fetch order details based on the tracking number
    $query = "SELECT * FROM bayar WHERE tracking_number='$tracking_number'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
        $order = mysqli_fetch_assoc($result);
    } else {
        echo "<p>Nomor pelacakan tidak valid. Silakan periksa lagi.</p>";
        exit;
    }
} else {
    echo "<p>Tidak ada nomor pelacakan yang disediakan.</p>";
    exit;
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pelacakan Pesanan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Order Details -->
        <div class="card">
            <div class="card-body">
                <h3>Detail Pesanan</h3>
                <p><strong>Nama Lengkap:</strong> <?= htmlspecialchars($order['nama_lengkap']); ?></p>
                <p><strong>Alamat:</strong> <?= htmlspecialchars($order['alamat']); ?></p>
                <p><strong>Nomor Telepon:</strong> <?= htmlspecialchars($order['telepon']); ?></p>
                <p><strong>Metode Pembayaran:</strong> <?= htmlspecialchars($order['metode_pembayaran']); ?></p>
                <p><strong>Kode Pengiriman:</strong> <?= htmlspecialchars($order['tracking_number']); ?></p>
                <p><strong>Metode Pengiriman:</strong> <?= htmlspecialchars($order['metode_pengiriman']); ?></p>
                <p><strong>Status:</strong> <?= htmlspecialchars($order['status']); ?></p> <!-- Menampilkan status -->
            </div>
        </div>
    </section>
</div>

<?php
include('templates/footer.php');
?>