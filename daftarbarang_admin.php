<?php
session_start();
if (empty($_SESSION['username_admin'])) {
  header("location:index.php?message=belum_login");
}
include 'koneksi_admin.php';

if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM barang WHERE nama_barang LIKE '%$search%' OR id_barang = '$search'";
} else {
    $sql = "SELECT * FROM barang";
}

$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Daftar Barang Admin</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet">

<style>
html, body {
    height: 100%;
    margin: 0;
}

body {
    background: url('foto/background.jpg') no-repeat center center fixed;
    background-size: cover;
}

/* overlay gelap */
.page-overlay {
    background-color: rgba(0,0,0,0.65);
    min-height: calc(100vh - 70px - 56px);
    padding: 30px 15px;
}

/* card konten */
.content-card {
    background: #fff;
    border-radius: 10px;
    padding: 25px;
}

/* table responsive */
.table thead th {
    white-space: nowrap;
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
            <li class="nav-item"><a class="nav-link" href="opsi_input.php">Input Barang</a></li>
            <li class="nav-item active"><a class="nav-link" href="#">Daftar Barang</a></li>
            <li class="nav-item"><a class="nav-link" href="laporan_admin.php">Laporan</a></li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<!-- MAIN CONTENT -->
<div class="page-overlay d-flex align-items-center">
    <div class="container">

        <div class="content-card shadow">

            <!-- SEARCH -->
            <form method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari barang...">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>

            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>Waktu Input</th>
                            <th>Nama Barang</th>
                            <th>ID Barang</th>
                            <th>Stok</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?= date('Y-m-d H:i:s', strtotime($row['waktu_input'])) ?></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= $row['id_barang'] ?></td>
                            <td><?= $row['stok_barang'] ?></td>
                            <td>
                                <a class="btn btn-outline-primary btn-sm"
                                   href="daftarbarang_edit.php?id_barang=<?= $row['id_barang'] ?>">
                                   Ubah
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-outline-danger btn-sm"
                                   href="daftarbarang_hapus.php?id_barang=<?= $row['id_barang'] ?>">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
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
