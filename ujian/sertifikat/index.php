<?php
require('fpdf/fpdf.php');

$filename = "Sertfikat Kenaikan Tingkat";


//mengambil nama sesuai login anggota
require('../../koneksi.php');
session_start();
$query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE Id_user = '". $_SESSION['level']."' ");
$name = ucwords($_SESSION['nama_lengkap']);

class PDF extends FPDF
{
    function Header()
    {
        $this->Image('serti.jpg',0,0,292);
    }
}

$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',30,50);
$pdf->Cell(0,160,$name,0,1,'C'); // Menggunakan variabel $name langsung
$pdf->Output('I', "$filename $name.pdf");
?>