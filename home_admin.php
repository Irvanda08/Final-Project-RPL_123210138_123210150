<?php 
session_start();
if (empty($_SESSION['username_admin'])) {
  header("location:index.php?message=belum_login");
}
?>

<head>
  <title>Home Admin</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />

</head>
<body>
  <style>
    body {
      background-color: #ffffff;
    }
  </style>
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

    <!-- Background image -->
    <div class="p-5 text-center bg-image" style="
      background-image: url('foto/background.jpg');
      height: 465px;
    ">
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
          <div class="text-white">
            <h1 class="mb-3">Selamat Datang , <?php echo $_SESSION['username_admin']; ?></h1>
          </div>
        </div>
      </div>
  </header>
  </footer>
  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: rgba(255, 255, 255, 1);">
    © 2023 Copyright:
    <a class="text-dark" href="https://kontraktor-mmmandiri.co.id/">PT. Muara Mitra Mandiri All rights reserved.</a>
  </div>
  <!-- Copyright -->
</body>

</html>