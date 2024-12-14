<img src="assets/img/dana.webp" alt="DANA" style="width: 100px; left; "></br>
<?php
include('koneksi.php');

if (isset($_POST['tracking_number'])) {
    $tracking_number = $_POST['tracking_number'];
    // Perbarui status pembayaran menjadi sudah_dibayar
    $updateQuery = "INSERT INTO payment_status (tracking_number, status) VALUES ('$tracking_number', 'sudah_dibayar')
                    ON DUPLICATE KEY UPDATE status = 'sudah_dibayar'";

    if (mysqli_query($koneksi, $updateQuery)) {
        echo "Status pembayaran berhasil diperbarui.";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<form action="update_payment_status.php" method="post">
    <label for="tracking_number">Nomor Pelacakan:</label>
    <input type="text" id="tracking_number" name="tracking_number" required>
    <button type="submit">Perbarui Status Pembayaran</button>
</form>
