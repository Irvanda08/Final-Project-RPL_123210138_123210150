<?php
session_start();
if (empty($_SESSION['username_admin'])) {
  header("location:index.php?message=belum_login");
}

include 'koneksi_admin.php';

// Cek apakah ada parameter periode yang dikirim
if (isset($_GET['period'])) {
    $period = $_GET['period'];

    // Query awal untuk mendapatkan semua data barang
    $query = "SELECT * FROM barang WHERE 1=1";

    // Jika periode adalah '7days'
    if ($period === '7days') {
        $startDateTime = date('Y-m-d H:i:s', strtotime('-7 days'));
        $query .= " AND waktu_input >= '$startDateTime'";
    }
    // Jika periode adalah '1month'
    elseif ($period === '1month') {
        $startDateTime = date('Y-m-d H:i:s', strtotime('-1 month'));
        $query .= " AND waktu_input >= '$startDateTime'";
    }
    // Jika periode adalah '1year'
    elseif ($period === '1year') {
        $startDateTime = date('Y-m-d H:i:s', strtotime('-1 year'));
        $query .= " AND waktu_input >= '$startDateTime'";
    }
    // Jika periode adalah '3months'
    elseif ($period === '3months') {
        $startDateTime = date('Y-m-d H:i:s', strtotime('-3 months'));
        $query .= " AND waktu_input >= '$startDateTime'";
    }

    $query .= " ORDER BY waktu_input DESC";

    $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
} else {
    // Jika tidak ada parameter periode, tampilkan semua data barang
    $result = mysqli_query($connect, "SELECT * FROM barang ORDER BY waktu_input DESC") or die(mysqli_error($connect));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #b00000;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            align-items: center;
            justify-content: center;
            margin-left: 60px;
            background-color: #ffffff;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #ffffff;
        }
    </style>
</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <a class="navbar-brand" href="#">
                <img src="foto/mmm.jpeg" height="50" alt="MMM Logo" loading="lazy" />
            </a>
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                    aria-label="Toggle navigation">
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
        <br>
        <!-- Navbar -->
        <div class="container">
            <form action="" method="get" class="mb-3">
                <select name="period" id="period" class="form-select">
                    <option value="all">Tampilkan Semua</option>
                    <option value="7days">7 Hari Terakhir</option>
                    <option value="1month">1 Bulan Terakhir</option>
                    <option value="3months">3 Bulan Terakhir</option>
                    <option value="1year">1 Tahun Terakhir</option>
                </select>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <div class="judul" style="color: #ffffff;">
                <center>
                    <h1>Data Barang Masuk</h1>
                    <button type='button' class='btn btn-outline-primary'><a style="color: #ffffff;"
                            href="laporanbarangkeluar_admin.php">Laporan barang keluar</a></button>
                </center><br>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th>Harga Barang</th>
                        <th>Ukuran Barang</th>
                        <th>Stok Barang</th>
                        <th>Waktu Masuk</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['id_barang']; ?></td>
                        <td><?php echo $row['nama_barang']; ?></td>
                        <td><?php echo $row['jenis_barang']; ?></td>
                        <td><?php echo $row['harga_barang']; ?></td>
                        <td><?php echo $row['ukuran_barang']; ?></td>
                        <td><?php echo $row['stok_barang']; ?></td>
                        <td><?php echo $row['waktu_input']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <center><br>
                <button type="button" class="btn btn-outline-primary"><a style="color: #ffffff;"
                        href="laporan_barang_masuk.php" target="_blank">Lihat PDF</a></button>
            </center>
    </header>
</body>

</html>