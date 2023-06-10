<?php
require('fpdf.php');

class PDF extends FPDF
{
    // Header
    function Header()
    {
        // Add PT MMM logo
        $this->Image('foto/mmm.jpeg', 10, 10, 30); // Adjust the image path and position as needed

        // Move "Data Barang" header to the center
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, 'Data Barang Keluar', 0, 1, 'C');
        $this->Ln(10);
    }

    // Footer
    // Footer
function Footer()
{
    // Warehouse admin name and signature box
    $this->SetY(-60);
    $this->SetFont('Arial', '', 12);
    $this->SetX(-60); // Set X position to align to the right
    $this->Cell(0, 10, 'Admin Gudang:', 0, 1, 'R');
    $this->SetX(-60); // Set X position to align to the right
    $this->Cell(0, 30, 'Nopri', 0, 1, 'R');
    $this->Cell(60, 10, '', 'T', 0, 'C'); // Signature box

    // Page number
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 8);
    $this->Cell(0, 10, 'Page '.$this->PageNo().'/{nb}', 0, 0, 'C');
}


    // Content
    // Content
function Content($result)
{
    $this->SetFont('Arial', '', 12);
    
    // Add extra line break before the table
    $this->Ln(40);
    
    $this->Cell(20, 10, 'ID', 1, 0, 'C');
    $this->Cell(30, 10, 'Nama', 1, 0, 'C');
    $this->Cell(30, 10, 'Jenis', 1, 0, 'C');
    $this->Cell(25, 10, 'Harga', 1, 0, 'C');
    $this->Cell(25, 10, 'Ukuran', 1, 0, 'C');
    $this->Cell(15, 10, 'Stok', 1, 0, 'C');
    $this->Cell(40, 10, 'Waktu Keluar', 1, 1, 'C');

    while ($row = mysqli_fetch_assoc($result)) {
        $this->Cell(20, 10, $row['id_barangklr'], 1, 0, 'C');
        $this->Cell(30, 10, $row['nama_barangklr'], 1, 0, 'C');
        $this->Cell(30, 10, $row['jenis_barangklr'], 1, 0, 'C');
        $this->Cell(25, 10, $row['harga_barangklr'], 1, 0, 'C');
        $this->Cell(25, 10, $row['ukuran_barangklr'], 1, 0, 'C');
        $this->Cell(15, 10, $row['stok_barangklr'], 1, 0, 'C');
        $this->Cell(40, 10, $row['waktu_inputklr'], 1, 1, 'C');
    }
}

}

// Membuat objek PDF
$pdf = new PDF();

// Membuat halaman PDF
$pdf->AddPage();

// Mengambil data dari database
include 'koneksi_admin.php';
$result = mysqli_query($connect, "SELECT * FROM barang_keluar ORDER BY waktu_inputklr DESC") or die(mysqli_error($connect));

// Menambahkan konten ke halaman PDF
$pdf->Content($result);

// Menampilkan laporan PDF
$pdf->Output('laporan_barang_keluar.pdf', 'I');
?>
