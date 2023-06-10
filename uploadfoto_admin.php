<?php
session_start();
if (empty($_SESSION['username_admin'])) {
  header("location:index.php?message=belum_login");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Mengambil informasi file
  $foto = $_FILES['foto']['tmp_name'];
  $foto_type = $_FILES['foto']['type'];

  // Mengkoneksikan ke database
  $connect = mysqli_connect("localhost", "root", "", "mmm");

  // Mengecek koneksi
  if (!$connect) {
    die("Koneksi database gagal: " . mysqli_connect_error());
  }

  // Membaca data foto sebagai BLOB
  $foto_data = addslashes(file_get_contents($foto));

  // Menyimpan foto ke database
  $sql = "UPDATE admin_gudang SET foto_admin = '$foto_data' WHERE username_admin = '{$_SESSION['username_admin']}'";

  if (mysqli_query($connect, $sql)) {
    echo "Foto berhasil diunggah ke database.";
    header("Location: profil_admin.php");
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
  }

  // Menutup koneksi database
  mysqli_close($connect);
}
?>
