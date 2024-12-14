<?php
include('templates/header.php');
include('templates/sidebar.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Halaman Daftar Barang Terjual</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Barang</h3>
      </div>
      <div class="card-body">
        <table class="table table-bordered" id="example2">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama pelanggan</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include('koneksi.php'); //memanggil file koneksi

            // Adjusted SQL query to join `cart` with `pelanggan` to get the user name.
            $datas = mysqli_query(
              $koneksi,
              "SELECT c.id, p.nama AS nama_user, c.name, c.price, c.quantity, c.image 
              FROM cart c 
              JOIN pelanggan p ON c.user_id = p.id"
            )
              or die(mysqli_error($koneksi));

            $no = 1; //untuk pengurutan nomor

            //melakukan perulangan
            while ($row = mysqli_fetch_assoc($datas)) {
            ?>

              <tr>
                <td><?= $no; ?></td>
                <td><?= $row['nama_user']; ?></td>
                <td><?= $row['name']; ?></td>
                <td>Rp <?= rupiah($row['price']); ?></td>
                <td><?= $row['quantity']; ?></td>
                <td><a href="assets/img/<?= $row['image']; ?>"><img src="assets/img/<?= $row['image']; ?>" width="100"></a></td>
                <td style="text-align: center;">

                  <a href="barang.php?id=<?= $row['id']; ?>&status=hapus" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin hapus data ini?');">Hapus</a>
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
if ((isset($_GET['status'])) && ($_GET['status'] == 'hapus')) {
  $id = $_GET['id']; //menampung id
  //query hapus
  $datas = mysqli_query($koneksi, "DELETE FROM cart WHERE id ='$id'") or die(mysqli_error($koneksi));
  //alert dan redirect ke index.php
  echo "<script>alert('Data berhasil dihapus.');window.location='barang.php';</script>";
}
?>