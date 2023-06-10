<?php
session_start();
if (empty($_SESSION['username_admin'])) {
    header("location:index.php?message=belum_login");
}

include 'koneksi_admin.php';

if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];

    // Cek apakah form telah di-submit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil data dari form
        $nama_barang = $_POST['nama_barang'];
        $jenis_barang = $_POST['jenis_barang'];
        $harga_barang = $_POST['harga_barang'];
        $ukuran_barang = $_POST['ukuran_barang'];
        $stok_barang = $_POST['stok_barang'];

        // Update data barang
        $sql = "UPDATE barang SET nama_barang = '$nama_barang', jenis_barang = '$jenis_barang', harga_barang = '$harga_barang', ukuran_barang = '$ukuran_barang', stok_barang = '$stok_barang' WHERE id_barang = '$id_barang'";
        mysqli_query($connect, $sql) or die(mysqli_error($connect));

        // Redirect kembali ke halaman daftarbarang_admin.php
        header("location: daftarbarang_admin.php");
    }

    // Query data barang berdasarkan ID
    $sql = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    // Cek apakah ID barang valid
    if (!$row) {
        die("ID Barang tidak valid");
    }
} else {
    die("ID Barang tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Admin Option - Edit Barang</title>
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
            background-color: #ff8000;
        }
        .container{
            margin: auto;
        }
        .form-group {
            width: 50%;
            margin: auto;
        }
    </style>
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
        <!-- Navbar -->
        <div class="container">           
        <br><center><h1>Edit Barang</h1></center>
                <form method="POST" action="daftarbarang_edit.php?id_barang=<?php echo $id_barang; ?>">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang:</label>
                        <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                            value="<?php echo $row['nama_barang']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_barang">Jenis Barang:</label>
                        <input type="text" class="form-control" id="jenis_barang" name="jenis_barang"
                            value="<?php echo $row['jenis_barang']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_barang">Harga Barang:</label>
                        <input type="number" class="form-control" id="harga_barang" name="harga_barang"
                            value="<?php echo $row['harga_barang']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="ukuran_barang">Ukuran Barang:</label>
                        <input type="number" class="form-control" id="ukuran_barang" name="ukuran_barang"
                            value="<?php echo $row['ukuran_barang']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="stok_barang">Stok Barang:</label>
                        <input type="number" class="form-control" id="stok_barang" name="stok_barang"
                            value="<?php echo $row['stok_barang']; ?>" required>
                    </div>
<br>
                    <center><button type="submit" class="btn btn-primary">Simpan</button></center>
                </form>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>