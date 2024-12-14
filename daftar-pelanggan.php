<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TOKO KACAMATA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    /* Custom Styles */
    body {
      font-family: 'Source Sans Pro', sans-serif;
      background: url('assets/img/bg.png') no-repeat;
      background-size: 100% 100%;
      margin: 0;
      min-height: 10vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #000;
    }

    .card {
      background: rgba(255, 255, 255, 0.95);
      border-radius: 5px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
      width: 40%;
      max-width: 800px;
      margin: 5px;
      overflow: hidden;
    }

    .card-header {
      background-color: #dc3545;
      color: white;
      text-align: center;
      padding: 10px;
      font-size: 2rem;
      font-weight: bold;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 50px;
    }

    .card-body {
      padding: 10px;
      color: #000;
    }

    .form-group {
      margin-bottom: 2rem;
    }

    .form-control {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
      color: #000;
    }

    .form-control::placeholder {
      color: #888;
    }

    .btn-warning {
      background-color: #ffc107;
      border-color: #ffc107;
      color: #fff;
      padding: 12px 24px;
      border-radius: 5px;
      font-size: 1rem;
      transition: background-color 0.3s, transform 0.3s;
    }

    .btn-warning:hover {
      background-color: #e0a800;
      transform: scale(1.05);
    }
  </style>
</head>

<body>
  <?php
  include 'koneksi.php';
  $query = mysqli_query($koneksi, "SELECT max(kode) as kodeTerbesar FROM pelanggan");
  $data = mysqli_fetch_array($query);
  $kode = $data['kodeTerbesar'];

  $urutan = (int) substr($kode, 2); // Assuming 'SH' prefix, adjust if needed
  $urutan++;

  $huruf = "SH";
  $kode = $huruf . sprintf("%04s", $urutan);

  ?>
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">DAFTAR PELANGGAN</h3>
    </div>
    <div class="card-body">
      <form action="" method="post" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label>Kode</label>
          <input type="text" name="kode" value="<?= $kode; ?>" required class="form-control">
        </div>
        <div class="form-group">
          <label>Nama</label>
          <input type="text" name="nama" required class="form-control">
        </div>
        <div class="form-group">
          <label>Umur</label>
          <input type="text" name="umur" required class="form-control">
        </div>
        <div class="form-group">
          <label>Jenis Kelamin</label>
          <select class="form-control" name="kelamin" required>
            <option value="">Pilih</option>
            <option value="Pria">Pria</option>
            <option value="Wanita">Wanita</option>
          </select>
        </div>
        <div class="form-group">
          <label>No Hp</label>
          <input type="text" name="hp" required class="form-control">
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" required class="form-control">
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" required class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" required class="form-control">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" required class="form-control">
        </div>
        <button type="submit" class="btn btn-warning" name="submit" value="simpan">Simpan Data</button>
      </form>
    </div>
  </div>

  <!-- JavaScript -->
  <script src="./assets/plugins/jquery/jquery.min.js"></script>
  <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/dist/js/adminlte.min.js"></script>
</body>

</html>

<?php
include 'koneksi.php';

//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
if (isset($_POST['submit'])) {
  $nama = $_POST['nama'];
  $umur = $_POST['umur'];
  $email = $_POST['email'];
  $kode = $_POST['kode'];
  $kelamin = $_POST['kelamin'];
  $hp = $_POST['hp'];
  $image = $_POST['image'];
  $alamat = $_POST['alamat'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $tgl_daftar = date('Y-m-d');

  // Insert new user into the database
  $insert_query = mysqli_query($koneksi, "INSERT INTO pelanggan (nama,umur,hp,alamat,username,password,email,kode,verifikasi,tgl_daftar,kelamin) VALUES ('$nama','$umur','$hp','$alamat','$username','$password','$email','$kode','waiting','$tgl_daftar','$kelamin')");

  if ($insert_query) {
    echo "<script>alert('Berhasil Daftar, tunggu verifikasi admin.');window.location='login-pelanggan.php';</script>";
  } else {
    echo "<script>alert('Gagal menyimpan data. Silakan coba lagi.');window.location='daftar-pelanggan.php';</script>";
  }
}
?>