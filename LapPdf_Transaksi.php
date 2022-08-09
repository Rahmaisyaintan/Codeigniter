<?php
//koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "jual";
$conn = mysqli_connect($host, $user, $pass,$dbnm);
if (!$conn) {
 die ("Server MySQL tidak terhubung karena".mysqli_error());
}
//akhir koneksi
#ambil data di tabel dan masukkan ke array
$query = "SELECT * FROM tbl_transaksi ORDER BY no_order";
$sql = mysqli_query ($conn,$query);
$data = array();
while ($row = mysqli_fetch_assoc($sql)) {
array_push($data, $row);
}
#setting judul laporan dan header tabel
$judul = "LAPORAN TRANSAKSI PENJUALAN";
$header = array(
 array("label"=>"ID Transaksi", "length"=>35, "align"=>"L"),
 array("label"=>"ID Pelanggan", "length"=>35, "align"=>"L"),
 array("label"=>"No Order", "length"=>35, "align"=>"L"),
 array("label"=>"Tgl Order", "length"=>35,"align"=>"L"),
 array("label"=>"Nama Penerima", "length"=>35, "align"=>"L"),
 array("label"=>"Hp Penerima", "length"=>35,"align"=>"L"),
 array("label"=>"Provinsi", "length"=>35, "align"=>"L"),
 array("label"=>"Kota", "length"=>35,"align"=>"L"),
 array("label"=>"Alamat", "length"=>35, "align"=>"L"),
 array("label"=>"Kode Pos", "length"=>35,"align"=>"L"),
 array("label"=>"Ekspedisi", "length"=>35, "align"=>"L"),
 array("label"=>"paket", "length"=>35,"align"=>"L"),
 array("label"=>"estimasi", "length"=>35, "align"=>"L"),
 array("label"=>"ongkir", "length"=>35,"align"=>"L"),
 array("label"=>"Berat", "length"=>35, "align"=>"L"),
 array("label"=>"Grand Total", "length"=>35,"align"=>"L"),
 array("label"=>"Total Bayar", "length"=>35, "align"=>"L"),
 array("label"=>"Status Bayar", "length"=>35,"align"=>"L"),
 array("label"=>"Bukti Bayar", "length"=>35, "align"=>"L"),
 array("label"=>"Atas Nama", "length"=>35,"align"=>"L"),
 array("label"=>"Nama Bank", "length"=>35, "align"=>"L"),
 array("label"=>"No Rek", "length"=>35,"align"=>"L"),
 array("label"=>"Status Order", "length"=>35, "align"=>"L"),
 array("label"=>"No Resi", "length"=>35,"align"=>"L"),
 
);
#sertakan library FPDF dan bentuk objek
require_once ("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
#tampilkan judul laporan
$pdf->SetFont('Arial','B','16');
$pdf->Cell(0,20, $judul, '0', 1, 'C');
#buat header tabel
$pdf->SetFont('Arial','','10');
$pdf->SetFillColor(355,0,0);
$pdf->SetTextColor(355);
$pdf->SetDrawColor(128,0,0);
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0',
   $kolom['align'], true);
   }
   $pdf->Ln();
   #tampilkan data tabelnya
   $pdf->SetFillColor(224,235,355);
   $pdf->SetTextColor(0);
   $pdf->SetFont('');
   $fill=false;
   foreach ($data as $baris) {
    $i = 0;
    foreach ($baris as $cell) {
    $pdf->Cell($header[$i]['length'], 5, $cell, 1, '0',
   $kolom['align'], $fill);
    $i++;
   }
    $fill = !$fill;
   $pdf->Ln();
   }
   #output file PDF
   $pdf->Output();
   ?>