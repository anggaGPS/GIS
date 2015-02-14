<?php
include "koneksi.php";

$x = $_GET['x'];
$y = $_GET['y'];
$nama = $_GET['nama'];
$alamat  = $_GET['alamat'];
$kapasitas  = $_GET['kapasitas'];
$isi  = $_GET['isi'];
$rusak  = $_GET['rusak'];
$wsucc  = $_GET['wsucc'];
$kosong  = $_GET['kosong'];
$idrk  = $_GET['idrk'];


$masuk = mysql_query("insert into dp values(null,'$nama','$alamat','$kapasitas','$isi','$rusak','$wsucc','$kosong','$idrk',$x,$y)");
if($masuk){
    echo "berhasil";
}else{
    echo "gagal";
}
?>
