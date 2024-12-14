<?php
include('templates/header.php');
include('templates/sidebar.php');

// Cek apakah pengguna sudah login dan user_id tersedia di sesi
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    // Jika tidak ada user_id di sesi, arahkan pengguna ke halaman login
    header('Location: login.php');
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
                    <h1>Pelacakan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered" id="example2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Metode Pembayaran</th>
                            <th>Kode Pengiriman</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include('koneksi.php'); // Memanggil file koneksi

                        // Menentukan query SQL berdasarkan level pengguna
                        if ($_SESSION['level'] == 'admin') {
                            // Admin: tampilkan semua data
                            $query = "SELECT * FROM bayar";
                        } else {
                            // Pengguna biasa: filter berdasarkan user_id
                            $query = "SELECT * FROM bayar WHERE user_id = '$user_id'";
                        }

                        $datas = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));

                        $no = 1; // Untuk pengurutan nomor

                        // Melakukan perulangan untuk menampilkan data
                        while ($row = mysqli_fetch_assoc($datas)) {
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama_lengkap']; ?></td>
                                <td><?= $row['alamat']; ?></td>
                                <td><?= $row['telepon']; ?></td>
                                <td><?= $row['metode_pembayaran']; ?></td>
                                <td><?= $row['tracking_number']; ?></td>
                                <td><?= $row['status']; ?></td> <!-- Kolom status -->
                                <td style="text-align: center;">
                                    <?php if ($_SESSION['level'] == 'admin') { ?>
                                        <a href="edit-status.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="pelacakan.php?id=<?= $row['id']; ?>&status=hapus" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?');">Hapus</a>
                                    <?php } ?>
                                    <?php if ($_SESSION['level'] == 'pelanggan') { ?>
                                        <!-- Opsi aksi tambahan untuk pelanggan jika diperlukan -->
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include('templates/footer.php');
?>

<?php
// Bagian ini untuk menghapus data
if ((isset($_GET['status'])) && ($_GET['status'] == 'hapus')) {
    $id = $_GET['id']; // Menampung id transaksi yang akan dihapus

    // Query hapus data transaksi berdasarkan id
    $datas = mysqli_query($koneksi, "DELETE FROM bayar WHERE id ='$id'") or die(mysqli_error($koneksi));

    // Alert dan redirect ke pelacakan.php setelah data dihapus
    echo "<script>alert('Data berhasil dihapus.');window.location='pelacakan.php';</script>";
}
?>