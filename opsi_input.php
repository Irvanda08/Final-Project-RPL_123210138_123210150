<?php
session_start();
if (empty($_SESSION['username_admin'])) {
  header("location:index.php?message=belum_login");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Option</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">

  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #ffffff;
    }
  </style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="foto/mmm.jpeg" height="50" alt="MMM Logo">
    </a>

    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01">
      <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarExample01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="home_admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="opsi_input.php">Input Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="daftarbarang_admin.php">Daftar Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="laporan_admin.php">Laporan</a>
        </li>
      </ul>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="flex-grow-1">

  <div class="bg-image d-flex align-items-center justify-content-center text-center"
    style="
      background-image: url('foto/background.jpg');
      background-size: cover;
      background-position: center;
      height: calc(100vh - 70px - 56px);
    ">

    <div class="mask w-100 h-100 d-flex align-items-center justify-content-center"
      style="background-color: rgba(0,0,0,0.6);">

      <div class="text-white">

        <a class="btn btn-outline-light btn-lg mb-2" href="inputbarang_admin.php">
          Input Barang Masuk
        </a>
        <p class="small">(Untuk memasukkan barang yang belum diinput)</p>

        <a class="btn btn-outline-light btn-lg mt-3 mb-2" href="inputbarangkeluar_admin.php">
          Input Barang Keluar
        </a>
        <p class="small">(Untuk mengubah data barang)</p>

      </div>

    </div>
  </div>

</main>


<!-- ===== FOOTER ===== -->
<footer class="bg-light text-center text-dark py-3">
  © 2023
  <a class="text-dark fw-bold" href="https://kontraktor-mmmandiri.co.id/">
    PT. Muara Mitra Mandiri
  </a>
  — All rights reserved.
</footer>

</body>
</html>
