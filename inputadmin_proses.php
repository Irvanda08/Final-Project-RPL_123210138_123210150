<?php 
include 'koneksi_admin.php';
date_default_timezone_set('Asia/Jakarta');
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$jenis_barang = $_POST['jenis_barang'];
$harga_barang = $_POST['harga_barang'];
$ukuran_barang = $_POST['ukuran_barang'];
$stok_barang = $_POST['stok_barang'];
$waktu_input = date('Y-m-d H:i:s'); // Menggunakan fungsi date() untuk mendapatkan waktu saat ini


// Periksa apakah ID barang sudah ada sebelumnya
$sql_check_id = "SELECT id_barang FROM barang WHERE id_barang = '$id_barang'";
$query_check_id = mysqli_query($connect, $sql_check_id);

if (mysqli_num_rows($query_check_id) > 0) {
  echo "ID barang sudah ada sebelumnya. Silakan masukkan ID barang yang berbeda.";
} else {
  // Jika ID barang belum ada sebelumnya, lakukan proses input data
  $sql = "INSERT INTO barang (`id_barang`, `nama_barang`, `jenis_barang`, `harga_barang`, `ukuran_barang`, `stok_barang`, `waktu_input`) 
    VALUES('$id_barang', '$nama_barang', '$jenis_barang', '$harga_barang', '$ukuran_barang', '$stok_barang', '$waktu_input')";

  $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

  if ($query) {
    echo "<p>Input Data Barang Berhasil</p>";
    header("location:inputbarang_admin.php");
  } else {
    echo "Input Data Gagal.";
  }
}

?>
