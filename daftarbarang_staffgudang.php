<?php
session_start();
if (empty($_SESSION['username_staff'])) {
  header("location:login_staffgudang.php?message=belum_login");
}

include 'koneksi_admin.php';

// Cek apakah ada parameter pencarian
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    // Lakukan query untuk mencari barang berdasarkan nama_barang
    $sql = "SELECT * FROM barang WHERE nama_barang LIKE '%$search%' OR id_barang = '$search'";
} else {
    // Tampilkan semua barang jika tidak ada parameter pencarian
    $sql = "SELECT * FROM barang";
}

$query = mysqli_query($connect, $sql) or die(mysqli_error($connect));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style2.css">
    <title>Daftar Barang Admin</title>
    <style>
        .center {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 79vh;
        }
        .container-fluid {
            height: 0vh;
        }
        body {
            background-color: #ff8040;
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
                            <a class="nav-link" aria-current="page" href="home_staffgudang.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="opsiinput_staffgudang.php">Input Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="daftarbarang_staffgudang.php">Daftar Barang</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="nav justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="logout_staffgudang.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Navbar -->
        <div class="center">
            <form method="GET" action="daftarbarang_staffgudang.php" class="mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari barang..." name="search">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table" style="width: 50%; margin-left:300px">
                    <thead>
                        <tr>
                            <th>Waktu Input</th>
                            <th>Nama Barang</th>
                            <th>ID Barang</th>
                            <th>Stok Barang</th>
                            <th colspan="2">Aksi</th>                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                while ($row = mysqli_fetch_assoc($query)) {
                    $waktu_input = date('Y-m-d H:i:s', strtotime($row['waktu_input']));
                    $nama_barang = $row['nama_barang'];
                    $id_barang = $row['id_barang'];
                    $stok_barang = $row['stok_barang'];
                
                    echo "<tr>";
                    echo "<td>$waktu_input</td>";
                    echo "<td>$nama_barang</td>";
                    echo "<td>$id_barang</td>";
                    echo "<td>$stok_barang</td>";
                    echo "<td><a class='btn btn-outline-danger' href='daftarhapus_staffgudang.php?id_barang=".$row['id_barang']."'>Hapus</a></td>";
                    echo "</tr>";
                }
                ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Copyright -->
        <div class="text-center text-dark p-3" style="background-color: rgba(255, 255, 255, 1);">
            © 2023 Copyright:
            <a class="text-dark" href="https://kontraktor-mmmandiri.co.id/">PT. Muara Mitra Mandiri All rights
                reserved.</a>
        </div>
        <!-- Copyright -->
</body>

</html>