<?php
session_start();
if (empty($_SESSION['username_stafflain'])) {
  header("location:login_stafflain.php?message=belum_login");
  exit();
}

include 'koneksi_admin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pesan = $_POST['pesan'];

    // Query untuk memasukkan nilai textarea ke tabel permintaan
    $sql = "INSERT INTO permintaan VALUES ('$pesan')";

    if (mysqli_query($connect, $sql)) {
        // Jika query berhasil dijalankan
        $_SESSION['success_message'] = "Pesan berhasil dikirim.";
        header("Location: home_stafflain.php");
        exit();
    } else {
        // Jika terjadi kesalahan dalam query
        $_SESSION['error_message'] = "Terjadi kesalahan. Pesan gagal dikirim.";
        header("Location: home_stafflain.php");
        exit();
    }
} else {
    // Jika form tidak disubmit melalui metode POST
    header("Location: home_stafflain.php");
    exit();
}
?>
