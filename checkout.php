<?php
ob_start(); // Start output buffering
include('koneksi.php');
include('templates/header.php');
include('templates/sidebar.php');

// Menampilkan semua error
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// The rest of your code...


// Asumsikan user_id disimpan di sesi setelah pengguna login
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // Jika tidak ada user_id di sesi, arahkan pengguna ke halaman login
    header('Location: login.php');
    exit;
}

// Ambil data dari keranjang belanja
$select_cart = mysqli_query($koneksi, "SELECT * FROM `cart` WHERE user_id = $user_id") or die('query failed');
$grand_total = 0;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Periksa</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Checkout Form -->
        <div class="card">
            <div class="card-body">
                <form action="checkout.php" method="post" id="checkoutForm" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Ringkasan Belanja -->
                            <div class="card">
                                <div class="card-header">
                                    Ringkasan Belanja
                                </div>
                                <div class="card-body">
                                    <?php while ($fetch_cart = mysqli_fetch_assoc($select_cart)) : ?>
                                        <p><?= $fetch_cart['name']; ?> (<?= $fetch_cart['quantity']; ?> x Rp. <?= number_format($fetch_cart['price'], 0, ',', '.'); ?>)</p>
                                        <?php $sub_total = $fetch_cart['quantity'] * $fetch_cart['price']; ?>
                                        <?php $grand_total += $sub_total; ?>
                                    <?php endwhile; ?>
                                </div>
                                <div class="card-footer">
                                    <strong>Total Belanja: Rp. <?= number_format($grand_total, 0, ',', '.'); ?> /-</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <!-- Informasi Pengiriman -->
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama_lengkap" value="<?= $_SESSION['nama']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat Pengiriman</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $_SESSION['user_alamat']; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Nomor Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $_SESSION['user_hp'];?>"required>
                        </div>

                        <div class="form-group">
                            <label for="pengiriman">Metode Pengiriman</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pengiriman" id="reguler" value="Reguler" required>
                                <label class="form-check-label" for="reguler">Reguler</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pengiriman" id="ekspres" value="Ekspres">
                                <label class="form-check-label" for="ekspres">Ekspres</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pengiriman" id="same_day" value="Same Day">
                                <label class="form-check-label" for="same_day">Same Day</label>
                            </div>
                        </div>

                        <!-- Opsi Pembayaran -->
                        <div class="form-group">
                            <label>Metode Pembayaran</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" id="bank_transfer" value="bank_transfer" required>
                                <label class="form-check-label" for="bank_transfer">Transfer Bank</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="metode_pembayaran" id="e_wallet" value="e_wallet">
                                <label class="form-check-label" for="e_wallet">E-wallet</label>
                            </div>
                            <!-- Tambahkan div untuk OVO dan DANA -->
                            <div class="form-group" id="ewalletField" style="display: none;">
                                <label for="ewallet_options">Pilih E-Wallet</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ewallet_options" id="dana" value="DANA" checked>
                                    <label class="form-check-label" for="dana">
                                        <img src="assets/img/dana.webp" alt="DANA" style="width: 50px; height: auto;">
                                    </label>
                                </div>

                                <!-- Tambahkan input untuk nomor e-wallet -->
                                <div class="form-group mt-3">
                                    <label for="no_ewallet">Nomor E-Wallet</label>
                                    <input type="text" class="form-control" id="no_ewallet" name="no_ewallet" placeholder="Masukkan nomor e-wallet" required>
                                </div>
                            </div>




                        </div>
                        
                        <!-- Detail Pembayaran berdasarkan pilihan -->
                        <div class="form-group" id="bankTransferField" style="display: none;">
                            <label for="no_rekening">Nomor Rekening Toko Aura</label>
                            <input type="text" class="form-control" id="no_rekening" name="no_rekening" value="12345678" readonly>

                            <label for="bukti_transfer">Upload Bukti Transfer</label>
                            <input type="file" class="form-control-file" id="bukti_transfer" name="bukti_transfer">

                            <!-- Pemberitahuan biaya admin -->
                            <p class="text-warning mt-2">Perlu diketahui bahwa setiap transaksi menggunakan transfer bank akan dikenakan biaya admin sebesar Rp. 3000.</p>
                        </div>



                        <div class="form-group" id="kartuKreditField" style="display: none;">
                            <label for="no_kartu_kredit">Nomor Kartu Kredit</label>
                            <input type="text" class="form-control" id="no_kartu_kredit" name="no_kartu_kredit">
                            <label for="nama_pemilik">Nama Pemilik Kartu</label>
                            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa</label>
                                    <input type="text" class="form-control" id="tanggal_kadaluarsa" name="tanggal_kadaluarsa" placeholder="MM/YYYY">
                                </div>
                                <div class="col-md-12">
                                    <label for="cvc">Kode CVC</label>
                                    <input type="text" class="form-control" id="cvc" name="cvc">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Tombol Submit -->
                    <div class="form-group mt-3">
                        <button type="submit" name="submit" class="btn btn-primary">Proses Checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php
if (isset($_POST['submit'])) {
    // Menampung data dari inputan
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $metode_pengiriman = $_POST['pengiriman'];
    $metode_pembayaran = $_POST['metode_pembayaran'];
    $no_e_wallet = isset($_POST['no_ewallet']) ? $_POST['no_ewallet'] : '';
    $no_rekening = isset($_POST['no_rekening']) ? $_POST['no_rekening'] : '';
    $no_kartu_kredit = isset($_POST['no_kartu_kredit']) ? $_POST['no_kartu_kredit'] : '';
    $nama_pemegang_kartu = isset($_POST['nama_pemilik']) ? $_POST['nama_pemilik'] : '';
    $tanggal_kadaluarsa = isset($_POST['tanggal_kadaluarsa']) ? $_POST['tanggal_kadaluarsa'] : '';
    $kode_cvc = isset($_POST['cvc']) ? $_POST['cvc'] : '';
    $bukti_transfer = '';

    // Proses upload bukti transfer jika ada
    if ($_FILES['bukti_transfer']['name']) {
        $uploadDir = 'uploads/';
        $fileName = basename($_FILES['bukti_transfer']['name']);
        $targetFilePath = $uploadDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Memeriksa apakah file yang diunggah adalah gambar
        $allowTypes = array('jpg', 'jpeg', 'png');
        if (in_array($fileType, $allowTypes)) {
            // Upload file ke server
            if (move_uploaded_file($_FILES['bukti_transfer']['tmp_name'], $targetFilePath)) {
                $bukti_transfer = $fileName;
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File harus berupa gambar (jpg, jpeg, png).";
        }
    }

    // Generate a unique tracking number
    $tracking_number = uniqid('SEN-');

     // Simpan data ke database
    $query = "INSERT INTO bayar (user_id, nama_lengkap, alamat, telepon, metode_pembayaran, no_e_wallet, no_rekening, no_kartu_kredit, nama_pemegang_kartu, tanggal_kadaluarsa, kode_cvc, bukti_transfer, tracking_number, metode_pengiriman, grand_total)
            VALUES ('$user_id', '$nama_lengkap', '$alamat', '$telepon', '$metode_pembayaran', '$no_e_wallet', '$no_rekening', '$no_kartu_kredit', '$nama_pemegang_kartu', '$tanggal_kadaluarsa', '$kode_cvc', '$bukti_transfer', '$tracking_number', '$metode_pengiriman', '$grand_total')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
        if ($metode_pembayaran == 'e_wallet') {
            // Arahkan ke halaman dummy pembayaran e-wallet
            header("Location: ewallet_payment.php?tracking_number=$tracking_number");
            exit;
        } else {
            echo "<script>alert('Data berhasil disimpan.');window.location='track.php?tracking_number=$tracking_number';</script>";
        }
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>


<!-- JavaScript untuk menampilkan input sesuai metode pembayaran yang dipilih -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var bankTransferField = document.getElementById('bankTransferField');
        var ewalletField = document.getElementById('ewalletField');
        var qrisField = document.getElementById('qrisField');
        var kartuKreditField = document.getElementById('kartuKreditField');

        var bankTransferRadio = document.getElementById('bank_transfer');
        var ewalletRadio = document.getElementById('e_wallet');
        var qrisRadio = document.getElementById('qris');
        var kartuKreditRadio = document.getElementById('kartu_kredit');

        bankTransferRadio.addEventListener('change', function() {
            if (bankTransferRadio.checked) {
                bankTransferField.style.display = 'block';
                ewalletField.style.display = 'none';
                qrisField.style.display = 'none';
                kartuKreditField.style.display = 'none';
            }
        });

        ewalletRadio.addEventListener('change', function() {
            if (ewalletRadio.checked) {
                bankTransferField.style.display = 'none';
                ewalletField.style.display = 'block';
                qrisField.style.display = 'none';
                kartuKreditField.style.display = 'none';
            }
        });

        qrisRadio.addEventListener('change', function() {
            if (qrisRadio.checked) {
                bankTransferField.style.display = 'none';
                ewalletField.style.display = 'none';
                qrisField.style.display = 'block';
                kartuKreditField.style.display = 'none';
            }
        });

        kartuKreditRadio.addEventListener('change', function() {
            if (kartuKreditRadio.checked) {
                bankTransferField.style.display = 'none';
                ewalletField.style.display = 'none';
                qrisField.style.display = 'none';
                kartuKreditField.style.display = 'block';
            }
        });
    });
</script>

<?php
include('templates/footer.php');
?>