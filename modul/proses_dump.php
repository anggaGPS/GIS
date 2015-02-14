<?php
// membaca file koneksi.php
include "./include/koneksi_backup.php";

// membaca tabel-tabel yang dipilih dari form
$tabel = $_POST['tabel'];

// proses untuk menggabung nama-nama tabel yang dipilih
// sehingga menjadi sebuah string berbentuk 'tabel1 tabel2 tabel3 ...'

$listTabel = "";
foreach($tabel as $namatabel)
{
  $listTabel .= $namatabel." ";
}

// membentuk string command menjalankan mysqldump
// diasumsikan file mysqldump terletak di dalam folder C:\xampp\MySQL\bin

$command = "C:\xampp\MySQL\bin\mysqldump -u".$user." -p".$pass." ".$dbase." ".$listTabel." > ".$dbase.".sql";

// perintah untuk menjalankan perintah mysqldump dalam shell melalui PHP
exec($command);

// bagian perintah untuk proses download file hasil backup.

header("Content-Disposition: attachment; filename=".$dbase.".sql");
header("Content-type: application/download");
$fp  = fopen($dbase.".sql", 'r');
$content = fread($fp, filesize($dbase.".sql"));
fclose($fp);

echo $content;

exit;
?>