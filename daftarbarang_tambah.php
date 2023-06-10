<?php
session_start();
if (empty($_SESSION['username_admin'])) {
    header("location:index.php?message=belum_login");
}

include 'koneksi_admin.php';

if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];

    // Cek apakah ada parameter jumlah yang dikirimkan
    if (isset($_POST['jumlah'])) {
        $jumlah = $_POST['jumlah'];

        // Update stok barang
        $sql = "UPDATE barang SET stok_barang = stok_barang + $jumlah WHERE id_barang = '$id_barang'";
        mysqli_query($connect, $sql) or die(mysqli_error($connect));

        // Redirect kembali ke halaman daftarbarang_admin.php
        header("location: daftarbarang_admin.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Admin Option - Tambah Stok Barang</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Stok Barang</h1>
        <form method="POST" action="daftarbarang_tambah.php?id_barang=<?php echo $id_barang; ?>">
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Stok</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
