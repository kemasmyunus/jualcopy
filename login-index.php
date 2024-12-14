<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TOKO OPTIK GRAND AURA</title>
  <!-- Responsive viewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="./assets/dist/css/adminlte.min.css">

</head>

<body>
  <div class="login-box">
    <div class="login-logo">
      <img src="assets/img/logo.jpg" alt="Logo">
    </div>
    <!-- Login buttons -->
    <div class="login-btn-container">
      <a class="btn btn-app bg-dark" href="login-pelanggan.php">
        <span class="badge bg-light">PELANGGAN</span>
        <i class="fas fa-user"></i> LOGIN PELANGGAN
      </a>
      <a class="btn btn-app bg-danger" href="login.php">
        <span class="badge bg-light">ADMIN</span>
        <i class="fas fa-user"></i> LOGIN ADMIN
      </a>
    </div>
    <h1 class="text-back">APLIKASI PENDATAAN PEMBELIAN DAN PENJUALAN BARANG OPTIK PADA TOKO OPTIK GRAND AURA BERBASIS WEB</h1>
  </div>

  <!-- jQuery -->
  <script src="./assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./assets/dist/js/adminlte.min.js"></script>

</body>

</html>
<style>
  body {
    font-family: 'Source Sans Pro', sans-serif;
    background: url('assets/img/bg.png') no-repeat center center fixed;
    background-size: cover;
    position: relative;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
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
    border-radius: 40px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    text-align: center;
    width: 200%;
    max-width: 500px;
    /* Increase max-width for better alignment */
    z-index: 1;
  }

  .login-logo img {
    width: 270px;
    border-radius: 90%;
    margin-bottom: 100px;
  }

  .btn-app {
    position: relative;
    width: 120px;
    /* Smaller width for better alignment */
    height: 120px;
    /* Smaller height for better alignment */
    border-radius: 50%;
    margin: 10px;
    background: #ffffff;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transition: all 0.3s;
    color: #333;
    font-size: 14px;
    /* Adjust font size for better fit */
    text-align: center;
    padding: 15px;
    line-height: 1.2;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-decoration: none;
  }

  .btn-app .badge {
    background-color: #fff;
    color: #333;
    position: absolute;
    top: -10px;
    right: -10px;
    border-radius: 50%;
    padding: 10px;
    font-size: 12px;
  }

  .btn-app:hover {
    transform: scale(1.05);
  }

  .text-back {
    color: #333;
    font-size: 18px;
    font-weight: bold;
    margin-top: 20px;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
  }

  .login-btn-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
    /* Adjust gap to control space between buttons */
    flex-wrap: wrap;
    /* Wrap buttons on smaller screens */
  }
</style>