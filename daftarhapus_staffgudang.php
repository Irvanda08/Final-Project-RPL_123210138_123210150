<?php
session_start();
if (empty($_SESSION['username_staff'])) {
    header("location:login_staffgudang.php?message=belum_login");
}

include 'koneksi_admin.php';

if (isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];

    // Hapus data barang berdasarkan ID
    $sql = "DELETE FROM barang WHERE id_barang = '$id_barang'";
    mysqli_query($connect, $sql) or die(mysqli_error($connect));

    // Redirect kembali ke halaman daftarbarang_admin.php
    header("location: daftarbarang_staffgudang.php");
} else {
    die("ID Barang tidak ditemukan");
}
?>