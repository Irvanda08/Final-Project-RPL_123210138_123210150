<?php
session_start();
if (empty($_SESSION['username_admin'])) {
  header("location:index.php?message=belum_login");
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
    <title>Admin Option</title>   
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css" rel="stylesheet" />
    <style>
        .center {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 60vh;
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
    <form method="POST" action="inputbarangkeluar_proses.php" class="form-small" id="form-input">
        <div class="form-group">
            <label>ID Barang</label>
            <input type="text" class="form-control" name="id_barangklr" id="id_barangklr" required>
        </div>
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama_barangklr" id="nama_barangklr" required>
        </div>
        <div class="form-group">
            <label>Jenis Barang</label>
            <input type="text" class="form-control" name="jenis_barangklr" id="jenis_barangklr" required>
        </div>
        <div class="form-group">
            <label>Harga Barang</label>
            <input type="number" class="form-control" name="harga_barangklr" id="harga_barangklr" min="1" required>
        </div>
        <div class="form-group">
            <label>Ukuran Barang</label>
            <input type="number" class="form-control" name="ukuran_barangklr" id="ukuran_barangklr" min="1" required>
        </div>
        <div class="form-group">
            <label>Stok Barang</label>
            <input type="number" class="form-control" name="stok_barangklr" id="stok_barangklr" min="1" required>
        </div>
        <button type="submit" class="btn btn-primary">Input</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
    </form>
    </div>
    <div class="center">
        <form method="GET" action="inputbarangkeluar_admin.php" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari barang..." name="search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
        <table class="table" style="width: 40%; margin-left:30px">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>ID Barang</th>
                    <th>Stok Barang</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($query)) {
                    $nama_barang = $row['nama_barang'];
                    $id_barang = $row['id_barang'];
                    $jenis_barang = $row['jenis_barang'];
                    $harga_barang = $row['harga_barang'];
                    $ukuran_barang = $row['ukuran_barang'];
                    $stok_barang = $row['stok_barang'];

                    echo "<tr onclick=\"fillForm('$id_barang', '$nama_barang', '$jenis_barang', '$harga_barang', '$ukuran_barang', '$stok_barang')\">";
                    echo "<td>$nama_barang</td>";
                    echo "<td>$id_barang</td>";
                    echo "<td>$stok_barang</td>";
                    echo "<td><a class='btn btn-outline-danger' href='inputbarangkeluaradmin_hapus.php?id_barang=".$row['id_barang']."'>Hapus</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <header>

        </table>
    </div>
    <script>
        // Fungsi untuk mengisi nilai form saat baris tabel diklik
        function fillForm(id, nama, jenis, harga, ukuran, stok) {
            document.getElementById("id_barangklr").value = id;
            document.getElementById("nama_barangklr").value = nama;
            document.getElementById("jenis_barangklr").value = jenis;
            document.getElementById("harga_barangklr").value = harga;
            document.getElementById("ukuran_barangklr").value = ukuran;
            document.getElementById("stok_barangklr").value = stok;
        }
    </script>



</body>

</html>