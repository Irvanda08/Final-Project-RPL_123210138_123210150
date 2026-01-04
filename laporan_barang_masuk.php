<?php
require('fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
        // Logo
        $this->Image('foto/mmm.jpeg', 10, 10, 25);

        // Judul
        $this->SetFont('Arial','B',14);
        $this->Cell(0,8,'PT MUARA MITRA MANDIRI',0,1,'C');

        $this->SetFont('Arial','',11);
        $this->Cell(0,6,'LAPORAN DATA BARANG MASUK',0,1,'C');

        $this->SetFont('Arial','I',9);
        $this->Cell(0,6,'Periode: Seluruh Data',0,1,'C');

        // Garis pemisah
        $this->Ln(4);
        $this->SetLineWidth(0.5);
        $this->Line(10, 45, 200, 45);
        $this->Ln(8);
    }

    function Footer()
    {
        // Tanda tangan
        $this->SetY(-55);
        $this->SetFont('Arial','',10);
        $this->Cell(0,6,'Mengetahui,',0,1,'R');
        $this->Cell(0,6,'Admin Gudang',0,1,'R');
        $this->Ln(15);
        $this->Cell(0,6,'Nopri',0,1,'R');

        // Garis tanda tangan
        $this->Line(150, $this->GetY(), 190, $this->GetY());

        // Page number
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
    }

    function Content($result)
    {
        // Header tabel
        $this->Ln(20);

        $this->SetFont('Arial','B',10);
        $this->SetFillColor(220,220,220);

        $this->Cell(20,8,'ID',1,0,'C',true);
        $this->Cell(35,8,'Nama Barang',1,0,'C',true);
        $this->Cell(30,8,'Jenis',1,0,'C',true);
        $this->Cell(25,8,'Harga',1,0,'C',true);
        $this->Cell(20,8,'Ukuran',1,0,'C',true);
        $this->Cell(15,8,'Stok',1,0,'C',true);
        $this->Cell(35,8,'Waktu Masuk',1,1,'C',true);

        // Isi tabel
        $this->SetFont('Arial','',9);

        while ($row = mysqli_fetch_assoc($result)) {
            $this->Cell(20,8,$row['id_barang'],1,0,'C');
            $this->Cell(35,8,$row['nama_barang'],1,0);
            $this->Cell(30,8,$row['jenis_barang'],1,0);
            $this->Cell(25,8,'Rp '.number_format($row['harga_barang'],0,',','.'),1,0,'R');
            $this->Cell(20,8,$row['ukuran_barang'],1,0,'C');
            $this->Cell(15,8,$row['stok_barang'],1,0,'C');
            $this->Cell(35,8,date('d-m-Y H:i', strtotime($row['waktu_input'])),1,1,'C');
        }
    }
}

// Init PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Ambil data
include 'koneksi_admin.php';
$result = mysqli_query($connect, "SELECT * FROM barang ORDER BY waktu_input DESC");

// Render konten
$pdf->Content($result);

// Output
$pdf->Output('laporan_barang_masuk.pdf', 'I');
?>
