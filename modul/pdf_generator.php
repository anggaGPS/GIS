<?php
include ('class.ezpdf.php');
$pdf = new Cezpdf();

// Atur margin
$pdf->ezSetCmMargins(2, 3, 3.3, 3);

// Header dan footer didefinisikan diantara openObject dan closeObject
$all = $pdf->openObject();

// Teks di tengah atas untuk judul header
$pdf->addText(240, 820, 16,'<b>Telkomsel Report</b>');
$pdf->addText(150, 800, 14,'<b>Mobile Advertising Customer Regional Bandung</b>');

// Garis atas untuk header
$pdf->line(10, 795, 578, 795);
$pdf->addText(150, 60, 14,'<b>Telkomsel PDF Report - by Firmansyah Wahyu</b>');

// Garis bawah untuk footer
$pdf->line(10, 50, 578, 50);

// Teks kiri bawah
$pdf->addText(30,34,8,'Dicetak pada tanggal: ' . date( 'd-m-Y, H:i:s'));

$pdf->closeObject();

// Tampilkan object di semua halaman
$pdf->addObject($all, 'all');

// Koneksi ke database dan tampilkan datanya 
mysql_connect("localhost", "root", "");
mysql_select_db("drasticdata");

$sql = mysql_query("SELECT * FROM country_map");

$i=1;
while($firman=mysql_fetch_array($sql)){
$data[$i]=array('No'=>$i,'Code'=>$firman[Code],'Nama Kecamatan'=>$firman[nama_kec],'Luas Area'=>$firman[Luas_Area],'Jumlah Penduduk'=>$firman[Jumlah_Penduduk],'Kepadatan'=>$firman[Kepadatan],'Pelanggan MA'=>$firman[Pelanggan_MA],'Koordinat'=>$firman[Coords]);
$i++;
}

/*
$i = 1;
while($r = mysql_fetch_array($sql)) { 
	$data[$i]=array('No'=>$i, 
                  'Nama Mahasiswa'=>$r[nama], 
                  'Alamat'=>$r[alamat]);
	$i++;
}
*/
// Tampilkan data dalam bentuk tabel
$pdf->ezTable($data, '', '', '');

// Penomoran halaman
$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();
?>
