<?php
session_start();
if (empty($_SESSION['username_admin'])) {
  header("location:index.php?message=belum_login");
}

include 'koneksi_admin.php';

if (isset($_GET['period'])) {
    $period = $_GET['period'];
    $query = "SELECT * FROM barang WHERE 1=1";

    if ($period === '7days') {
        $query .= " AND waktu_input >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
    } elseif ($period === '1month') {
        $query .= " AND waktu_input >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
    } elseif ($period === '3months') {
        $query .= " AND waktu_input >= DATE_SUB(NOW(), INTERVAL 3 MONTH)";
    } elseif ($period === '1year') {
        $query .= " AND waktu_input >= DATE_SUB(NOW(), INTERVAL 1 YEAR)";
    }

    $query .= " ORDER BY waktu_input DESC";
    $result = mysqli_query($connect, $query);
} else {
    $result = mysqli_query($connect, "SELECT * FROM barang ORDER BY waktu_input DESC");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Laporan Admin</title>

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

.page-overlay {
    background-color: rgba(0,0,0,0.65);
    min-height: calc(100vh - 70px - 56px);
    padding: 30px 15px;
}

.content-card {
    background: #fff;
    border-radius: 10px;
    padding: 25px;
}

.table th, .table td {
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
            <li class="nav-item"><a class="nav-link" href="daftarbarang_admin.php">Daftar Barang</a></li>
            <li class="nav-item active"><a class="nav-link" href="#">Laporan</a></li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<!-- CONTENT -->
<div class="page-overlay centered d-flex align-items-center">
    <div class="container">

        <div class="content-card shadow">

            <!-- FILTER -->
            <form method="get" class="row mb-4">
                <div class="col-md-4">
                    <select name="period" class="form-control">
                        <option value="all">Tampilkan Semua</option>
                        <option value="7days">7 Hari Terakhir</option>
                        <option value="1month">1 Bulan Terakhir</option>
                        <option value="3months">3 Bulan Terakhir</option>
                        <option value="1year">1 Tahun Terakhir</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Filter</button>
                </div>
            </form>

            <!-- TITLE -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="mb-0">Data Barang Masuk</h4>
                <a href="laporanbarangkeluar_admin.php" class="btn btn-outline-primary">
                    Laporan Barang Keluar
                </a>
            </div>

            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Ukuran</th>
                            <th>Stok</th>
                            <th>Waktu Masuk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $row['id_barang'] ?></td>
                            <td><?= $row['nama_barang'] ?></td>
                            <td><?= $row['jenis_barang'] ?></td>
                            <td><?= $row['harga_barang'] ?></td>
                            <td><?= $row['ukuran_barang'] ?></td>
                            <td><?= $row['stok_barang'] ?></td>
                            <td><?= $row['waktu_input'] ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <a href="laporan_barang_masuk.php" target="_blank" class="btn btn-outline-primary">
                    Lihat PDF
                </a>
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
