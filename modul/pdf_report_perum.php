<?php

//sambungkan ke class pdf
include ('class.ezpdf.php');
$pdf = new Cezpdf();

// Atur margin
$pdf->ezSetCmMargins(2, 3, 3, 3);

// Header dan footer didefinisikan diantara openObject dan closeObject
$all = $pdf->openObject();

// Teks di tengah atas untuk judul header
$pdf->addText(240, 820, 16,'<b>LAPORAN PERUMAHAN BOGOR</b>');
$pdf->addText(150, 800, 14,'<b>Consumer Service Division PT. Telkom Bogor</b>');

// Garis atas untuk header
$pdf->line(10, 795, 578, 795);
$pdf->addText(150, 60, 14,'<b>Dilaporkan oleh Divisi Consumer Service</b>');

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

$sql = mysql_query("SELECT * FROM `perumahan`");

$i=1;
while($r=mysql_fetch_array($sql)){
$data[$i]=array('No'=>$i,
				'Nama Perumahan'=>$r[nama_perum],
				'Alamat'=>$r[alamat],
				'Daerah'=>$r[daerah],
				'Jumlah Dibangun'=>$r[jumlah_dibangun],
				'Sudah Dibangun'=>$r[sudah_dibangun],
				'Latitude'=>$r[lat],
				'Longitude'=>$r[lng]);
$i++;
}

// Tampilkan data dalam bentuk tabel
$pdf->ezTable($data, '', '', '');

// Penomoran halaman
$pdf->ezStartPageNumbers(320, 15, 8);
$pdf->ezStream();

?>
