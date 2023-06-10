<?php
session_start();
if (empty($_SESSION['username_admin'])) {
  header("location:index.php?message=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Profil Admin</title>
    <style>
        .navbar {
            width: 200px;
            height: 100vh;
            position: fixed;
            background-color: #f8f9fa;
            padding: 10px;
        }
        .navbar .nav-link {
            border: 1px solid #6a4a3a;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: #f8f9fa;
            color: #6a4a3a;
            padding: 8px 10px;
            text-decoration: none;
        }
        .navbar .nav-link.active,
        .navbar .nav-link:hover {
            background-color: #6a4a3a;
            color: white;
        }
        .navbar ul {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="home_admin.php">Beranda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="profil_admin.php">Profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="opsi_input.php">Input Barang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="daftarbarang_admin.php">Daftar Barang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="laporanbarang_admin.php">Laporan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <div class="container" style="margin-left: 220px;">
            <form action="uploadfoto_admin.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="foto" accept="image/*" required>
                <input type="submit" value="Upload">
            </form>
            <?php
            include 'koneksi_admin.php';

            // Periksa apakah session admin tersedia
            if (isset($_SESSION['username_admin'])) {
                // Ambil username admin dari session
                $username = $_SESSION['username_admin'];
    
                // Query untuk mendapatkan profil admin berdasarkan username
                $query = "SELECT nip_admin, nama_admin, no_telpon, alamat_admin, foto_admin FROM admin_gudang WHERE username_admin = '$username'";
                $result = mysqli_query($connect, $query);
    
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    // Tampilkan data profil admin
                    if ($row['foto_admin'] != null) {
                        echo '<img src="data:foto/jpg;base64,' . base64_encode($row['foto_admin']) . '" alt="Foto Admin" width="94.5px" height="141.73px" style="border-radius: 30%;">';
                    } else {
                        echo '<img src="default_photo.jpg" alt="Default Photo" width="120" height="160">';
                    }
                    
                    echo "<p>NIP: " . $row['nip_admin'] . "</p>";
                    echo "<p>Nama: " . $row['nama_admin'] . "</p>";
                    echo "<p>No. Telepon: " . $row['no_telpon'] . "</p>";
                    echo "<p>Alamat: " . $row['alamat_admin'] . "</p>";
                } else {
                    echo "Profil admin tidak ditemukan.";
                }
            } else {
                echo "Session admin tidak tersedia.";
            }
    
            // Tutup koneksi database
            mysqli_close($connect);
            ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
