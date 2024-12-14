<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TOKO OPTIK GRAND AURA</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page back" style="background-image: url('assets/img/bg.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
  <div class="login-box">
    <div class="login-logo">

      <img src="" style="width: 320px;">
      <br>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg text-danger">LOGIN ADMIN</p>

        <form action="" method="post" role="form">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="ketikkan username.." name="username" required="" autofocus="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="ketikkan password.." name="password" required="">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-success float-right " name="submit" value="simpan">Login sekarang!</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
    <div class="row">
      <div class="col-sm-12">

      </div>
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="./assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./assets/dist/js/adminlte.min.js"></script>

</body>

</html>

<?php

include('koneksi.php');

if (isset($_POST['submit'])) {
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($koneksi, "SELECT karyawan.* from karyawan where username = '$username' and password = '$password'");

  $cek = mysqli_num_rows($result);

  if ($cek > 0) {
    $data = mysqli_fetch_assoc($result);

    $_SESSION['username'] = $username;
    $_SESSION['status'] = 'sudah_login';
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['level'] = 'admin';
    $_SESSION['nama'] = $data['nama_karyawan'];

    header("location:index.php");
  } else {
    echo "<script>alert('Gagal Login! Username / Password Salah.');window.location='login.php';</script>";
  }
}
?>
<style>
  body {
    font-family: 'Source Sans Pro', sans-serif;
    background: url('assets/img/bg.webp') no-repeat center center fixed;
    background-size: cover;
    margin: 0;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    overflow: hidden;
    position: relative;
  }

  /* Dark overlay for background image */
  body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    z-index: -1;
  }

  .login-box {
    background: rgba(255, 255, 255, 0.9);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    text-align: center;
    width: 100%;
    max-width: 400px;
    z-index: 1;
  }

  .login-logo img {
    width: 120px;
    border-radius: 50%;
    margin-bottom: 20px;
  }

  .login-card-body {
    padding: 20px;
  }

  .login-box-msg {
    font-size: 20px;
    font-weight: bold;
    color: #dc3545;
  }

  .input-group-text {
    background-color: #007bff;
    color: white;
  }

  .input-group .form-control {
    border-right: 0;
  }

  .input-group-append .input-group-text {
    border-left: 0;
  }

  .btn-success {
    background-color: #28a745;
    border-color: #28a745;
    transition: background-color 0.3s, transform 0.3s;
  }

  .btn-success:hover {
    background-color: #218838;
    transform: scale(1.05);
  }

  .card {
    background: rgba(255, 255, 255, 0.95);
    border: none;
  }

  .card-body {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
  }
</style>