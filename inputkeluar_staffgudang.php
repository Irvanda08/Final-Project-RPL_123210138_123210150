<?php 
include 'koneksi_admin.php';
date_default_timezone_set('Asia/Jakarta');
$id_barangklr = $_POST['id_barangklr'];
$nama_barangklr = $_POST['nama_barangklr'];
$jenis_barangklr = $_POST['jenis_barangklr'];
$harga_barangklr = $_POST['harga_barangklr'];
$ukuran_barangklr = $_POST['ukuran_barangklr'];
$stok_barangklr = $_POST['stok_barangklr'];
$waktu_inputklr = date('Y-m-d H:i:s'); // Menggunakan fungsi date() untuk mendapatkan waktu saat ini


// Periksa apakah ID barang sudah ada sebelumnya
$sql_check_id = "SELECT id_barang FROM barang WHERE id_barang = '$id_barang'";
$query_check_id = mysqli_query($connect, $sql_check_id);

if (mysqli_num_rows($query_check_id) > 0) {
  echo "ID barang sudah ada sebelumnya. Silakan masukkan ID barang yang berbeda.";
} else {
  // Jika ID barang belum ada sebelumnya, lakukan proses input data
  $sql = "INSERT INTO barang_keluar (`id_barangklr`, `nama_barangklr`, `jenis_barangklr`, `harga_barangklr`, `ukuran_barangklr`, `stok_barangklr`,`waktu_inputklr`) 
    VALUES('$id_barangklr', '$nama_barangklr', '$jenis_barangklr', '$harga_barangklr', '$ukuran_barangklr', '$stok_barangklr', '$waktu_inputklr')";

  $query = mysqli_query($connect, $sql) or die(mysqli_error($connect));

  if ($query) {
    echo "<p>Input Data Barang Berhasil</p>";
    header("location:inputbarangkeluar_staffgudang.php");
  } else {
    echo "Input Data Gagal.";
  }
}

?>
