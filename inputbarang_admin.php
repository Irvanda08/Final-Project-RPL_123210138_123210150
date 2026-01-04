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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Input Barang Admin</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>
html, body {
    height: 100%;
    margin: 0;
}

body {
    background: url('foto/background.jpg') no-repeat center center fixed;
    background-size: cover;
}

/* Overlay utama */
.page-overlay {
    background-color: rgba(0,0,0,0.65);
    min-height: calc(100vh - 70px - 56px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}

/* Card form */
.form-card {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    width: 100%;
    max-width: 500px;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand" href="#">
    <img src="foto/mmm.jpeg" height="50">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="home_admin.php">Home</a></li>
      <li class="nav-item active"><a class="nav-link" href="opsi_input.php">Input Barang</a></li>
      <li class="nav-item"><a class="nav-link" href="daftarbarang_admin.php">Daftar Barang</a></li>
      <li class="nav-item"><a class="nav-link" href="laporan_admin.php">Laporan</a></li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>

<!-- CONTENT -->
<div class="page-overlay">

  <div class="form-card shadow">

    <h4 class="text-center mb-4">Input Barang Masuk</h4>

    <?php
    if (isset($_GET['message']) && $_GET['message'] == 'id_exists') {
        echo '<div class="alert alert-danger">ID barang sudah ada. Gunakan ID lain.</div>';
    }
    ?>

    <form method="POST" action="inputadmin_proses.php">

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

      <button type="submit" class="btn btn-primary btn-block">
        Simpan Data
      </button>

    </form>
  </div>

</div>

<!-- FOOTER -->
<footer class="bg-light text-center text-dark py-3">
  © 2023 PT. Muara Mitra Mandiri —
  <a class="text-dark" href="https://kontraktor-mmmandiri.co.id/">All rights reserved</a>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
