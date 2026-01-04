<?php 
session_start();
if (empty($_SESSION['username_admin'])) {
  header("location:index.php?message=belum_login");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <title>Home Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />

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
        <img src="foto/mmm.jpeg" height="50" alt="MMM Logo" />
      </a>

      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#navbarExample01">
        <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarExample01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" href="home_admin.php">Home</a>
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

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-danger" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- ===== MAIN CONTENT ===== -->
  <main class="flex-grow-1">

    <!-- Hero Section -->
    <div class="p-5 text-center bg-image"
      style="background-image: url('foto/background.jpg'); min-height: 750px;">
      <div class="mask d-flex justify-content-center align-items-center"
        style="background-color: rgba(0, 0, 0, 0.6); min-height: 650px;">
        <div class="text-white">
          <h1 class="mb-3">
            Selamat Datang, <?php echo $_SESSION['username_admin']; ?>
          </h1>
          <p class="lead">
            Sistem Informasi Stok Gudang PT. Muara Mitra Mandiri
          </p>
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
