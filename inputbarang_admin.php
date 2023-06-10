<?php
session_start();
if (empty($_SESSION['username_admin'])) {
  header("location:index.php?message=belum_login");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style2.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <title>Input Barang Admin</title>
    <style>
        body{
            background-color: #800000;
        }
        table{
            text-align: center;
        }
        .container {
            margin-top: 50px;
        }
        .off {
        color: grey;
        }
        .on {
            color: white;
        }
        .alert-1{
            background: #0fb9b1;
        }
        .alert-1 span{
            background: #2bcbba;
        }
    </style>
<body>
  <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="#">
        <img src="foto/mmm.jpeg" height="50" alt="MMM Logo" loading="lazy" />
      </a>
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="home_admin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="opsi_input.php">Input Barang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="daftarbarang_admin.php">Daftar Barang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="laporan_admin.php">Laporan</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="nav justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Navbar -->
  <div class="container" style=" height: 375px;">
    <?php
    if (isset($_GET['message'])) {
        $message = $_GET['message'];
        if ($message == 'id_exists') {
            echo '<div class="alert alert-danger" role="alert">ID barang sudah ada sebelumnya. Silakan masukkan ID barang yang berbeda.</div>';
        }
        }
    ?>
    <form method="POST" action="inputadmin_proses.php" class="form-small">
      <div class="form-group">
        <label>ID Barang</label>
        <input type="text" class="form-control" name="id_barang" required>
      </div>
      <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" class="form-control" name="nama_barang" required>
      </div>
      <div class="form-group">
        <label>Jenis Barang</label>
        <input type="text" class="form-control" name="jenis_barang" required>
      </div>
      <div class="form-group">
        <label>Harga Barang</label>
        <input type="number" class="form-control" name="harga_barang" required>
      </div>
      <div class="form-group">
        <label>Ukuran Barang</label>
        <input type="number" class="form-control" name="ukuran_barang" required>
      </div>
      <div class="form-group">
        <label>Stok Barang</label>
        <input type="number" class="form-control" name="stok_barang" required>
      </div>
      <button type="submit" class="btn btn-primary">Input</button>
    </form>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: rgba(255, 255, 255, 1); ">
    © 2023 Copyright:
    <a class="text-dark" href="https://kontraktor-mmmandiri.co.id/">PT. Muara Mitra Mandiri All rights reserved.</a>
  </div>
  <!-- Copyright -->
</body>
</html>
